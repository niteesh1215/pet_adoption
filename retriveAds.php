<?php 
session_start();
require 'connection.php';

$query="SELECT ad_id,pet_name,pet_category,breed FROM ad_info limit ".$_POST['start']." , 12";
$result = mysqli_query( $connection,$query) 
  or die ($query. " ".mysqli_error($connection));



while($rows=mysqli_fetch_array($result))
 {
    $query = "SELECT image_url FROM ad_images where ad_id='" . $rows['ad_id'] . "' LIMIT 1";
    $result_image = mysqli_query($connection, $query)
            or die($query . " " . mysqli_error($connection));

    echo '<div class="col-xs-6 col-sm-6 col-md-4 col-lg-2 column">
                <div class="card">';

    while ($url = mysqli_fetch_array($result_image)) {
        echo '<img src="uploads/' . $url['image_url'] . '" class="img-responsive">';
    }
    echo '<div class="card_body">' .
    '<h6 class="">' . $rows['pet_name'] . '</h6>'
            . '<p>'.$rows['pet_category'].' &#9679; '.$rows['breed'].'</p>'
            . '</div>';

    
     if(isset($_SESSION['id'])){
        
        $query="SELECT * FROM wishlist where ad_id =".$rows['ad_id']." and user_id =".$_SESSION['id'];
        $result_wishlist = mysqli_query( $connection,$query) 
         or die ($query. " ".mysqli_error($connection));
        switch (mysqli_num_rows($result_wishlist))
        {
        case 0:echo'<div class="circle_avatar"><span class="material-icons favorites noselect"  onclick=favorite_toggle(this,"'.$rows['ad_id'].'")>favorite_border</span></div>';break;
        case 1:echo'<div class="circle_avatar"><span class="material-icons favorites noselect"  style="color:#F9575C;" onclick=favorite_toggle(this,"'.$rows['ad_id'].'")>favorite</span></div>';break;
        }
    }
 else {
     $message="'Please Login/Signup to add this item to your wishlist'";
     echo '<div class="circle_avatar"><span class="material-icons favorites noselect"  onclick="alert('.$message.');">favorite_border</span></div>';
 }
     echo'<div id="'.$rows['ad_id'].'" class="more_info_btn"><a href="displaypetsdetails.php?id='.$rows['ad_id'].'">More info</a></div>'
    . '</div>'
             . '</div>';
}

return;