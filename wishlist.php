<?php
session_start();
require 'connection.php';
$query="SELECT ad_id FROM wishlist where user_id ='".$_SESSION['id']."'";
$result = mysqli_query( $connection,$query) 
  or die ($query. " ".mysqli_error($connection));

echo'<div class="close_wrapper"><span class="close_btn" onclick="close_dynamic_window()">x</span>'
. '<div class="wishlist scroll">'
.'<header><span class="material-icons">favorite</span>WISHLIST</header>';
        $i=0;
        while ($rows = mysqli_fetch_array($result)) {
            $i++;
        $query = "SELECT image_url FROM ad_images where ad_id=". $rows['ad_id']." LIMIT 1";
        $result_image = mysqli_query($connection, $query)
            or die($query . " " . mysqli_error($connection));
        $query = "SELECT pet_name,available FROM ad_info where ad_id=". $rows['ad_id']." LIMIT 1";
        $result_ad_info = mysqli_query($connection, $query)
            or die($query . " " . mysqli_error($connection));
       
            echo'<div class="ad-row col-xs-6 col-sm-6 col-md-10 col-md-offset-1 col-lg-offset-1 col-lg-10 " id="'.$i.'row">'.
                '<div><span class="material-icons" title="remove from cart" onclick=remove_from_wishlist('.$rows['ad_id'].',0,"'.$i.'row")>highlight_off</span>';
                
            while ($url = mysqli_fetch_array($result_image)) {
                echo '<img src="uploads/' . $url['image_url'] . '">';
            }
            echo'</div>';
            while ($ad_info = mysqli_fetch_array($result_ad_info)) {
                
                echo '<p class="name" style="font-weight:bold;">'.$ad_info['pet_name'].' </p>';
                switch ($ad_info['available'])
                {
                    case NULL:
                    case 1 :echo '<p class="status" style="color:#675444;">Available</p>';break;
                    case 0 :echo '<p class="status" style="color:red;">No longer available</p>';break;
                    
                }
                
            }
               
            echo'<div id="'.$rows['ad_id'].'" class="more_info_btn"><a href="displaypetsdetails.php?id='.$rows['ad_id'].'">More info</a></div></div>'; 
        }
    
echo '</div></div>';  
return;
 ?>