<?php 
session_start();
require 'connection.php';

$query="SELECT ad_id,pet_name,gender FROM ad_info limit ".$_POST['start']." , 12";
$result = mysqli_query( $connection,$query) 
  or die ($query. " ".mysqli_error($connection));



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