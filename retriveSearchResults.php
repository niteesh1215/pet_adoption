<?php
session_start();
require 'connection.php';

if($_POST['start']==0)
{
    $gender=Array("male","female");
    $column_array=Array("pet_name","pet_category","breed","gender","age","size","vaccinated","neutured","weight","city_village","district","state");
    $size=Array("small","medium","large");
    $result;
    function hasWord($word, $txt) {
       if (stripos($txt, $word) !== false) return true;
        else return false;
    }

    $search_text=filter_var($_POST['search'], FILTER_SANITIZE_STRING);
    $search_query="SELECT ad_id,pet_name,gender FROM ad_info where";
    for($i=0;$i<12;$i++)
    {
        $query="SELECT DISTINCT ".$column_array[$i]." FROM ad_info";
        $result = mysqli_query( $connection,$query) 
          or die ($query. " ".mysqli_error($connection));

    while($rows=mysqli_fetch_array($result))
    {
        switch($column_array[$i])
        {
        case "gender":for($j=0;$j<1;$j++)
                      {
                        switch(hasWord($gender[$j], $search_text))
                        {
                            case 1:$search_query=$search_query." ".$column_array[$i]."=".$j." AND";
                        }
                      } break;
        case "vaccinated" :   switch(hasWord("vaccinated", $search_text))
                             {
                                case 1:$search_query=$search_query." ".$column_array[$i]."= 1 AND";
                             } break;
        case "neutured" :   switch(hasWord("neutured", $search_text))
                             {
                                case 1:$search_query=$search_query." ".$column_array[$i]."= 1 AND";
                             } break;
        case "size"     :   for($j=0;$j<3;$j++)
                            {
                                switch(hasWord($size[$j], $search_text))
                                {
                                    case 1:$search_query=$search_query." ".$column_array[$i]."=".$j." AND";
                                }
                            } break;
        case "weight"   :   switch(hasWord($rows[$column_array[$i]]." "."kg", $search_text))
                            {
                                case 1:$search_query=$search_query." ".$column_array[$i]."=".$rows[$column_array[$i]]." AND" ;break;
                            }  break;

        case "age"      :   switch(hasWord($rows[$column_array[$i]]." "."year", $search_text))
                            {
                                case 1:$search_query=$search_query." ".$column_array[$i]."=".$rows[$column_array[$i]]." AND age_type='Years(s)' AND";break;
                                case 0: switch(hasWord($rows[$column_array[$i]]." "."month", $search_text))
                                        {
                                             case 1:$search_query=$search_query." ".$column_array[$i]."=".$rows[$column_array[$i]]." AND age_type='Month(s)' AND";break;
                                        }   

                            }break;
        default:             switch(hasWord($rows[$column_array[$i]], $search_text))
                             {
                                case 1:$search_query=$search_query." ".$column_array[$i]."='".$rows[$column_array[$i]]."' AND";

                             }

        }
       if($column_array[$i] == "gender" or $column_array[$i] == "size") break;
    }
    }

    $search_query =substr($search_query, 0, -3);
    $_SESSION['search_query']=$search_query;
    
    $result = mysqli_query( $connection,$search_query." limit 12") 
      or die ($query. " ".mysqli_error($connection));
}
 else 
{
    
    $result = mysqli_query( $connection,$_SESSION['search_query']." "."limit ".$_POST['start']." , 12") 
      or die ($query. " ".mysqli_error($connection));
}

while($rows=mysqli_fetch_array($result))
 {
    $query = "SELECT image_url FROM ad_images where ad_id='" . $rows['ad_id'] . "' LIMIT 1";
    $result_image = mysqli_query($connection, $query)
            or die($query . " " . mysqli_error($connection));

    echo '<div class="col-sm-6 col-md-4 col-lg-3 column">
                <div class="card">';

    while ($url = mysqli_fetch_array($result_image)) {
        echo '<img src="uploads/' . $url['image_url'] . '" class="img-responsive">';
    }
    echo '<div class="name_favorite_align">' .
    '<h6 class="">' . $rows['pet_name'] . '</h6>'
    . '<div>';

    switch ($rows['gender']) {
        case -1: echo '<p style="color: yellow; padding-right: 8px; font-size: 30px;text-align: center; margin: 0;">N.K.</p>';
            break;
        case 0: echo '<p style="color: #02b2fb; padding-right: 8px; font-size: 30px;text-align: center; margin: 0;">M</p>';
            break;
        case 1: echo '<p style="color: #ed2ccb; padding-right: 8px; font-size: 30px;text-align: center; margin: 0;">F</p>';
            break;
    }
    echo'<span class="material-icons favorites noselect"  onclick="favorite_toggle(this)">favorite_border</span>'
    . '</div>'
    . '</div>'
    . '<div id="'.$rows['ad_id'].'" class="more_info_btn"><a href="#">More info</a></div>'
    . '</div>'
    . '</div>';
}
return;