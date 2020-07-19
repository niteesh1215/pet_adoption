<?php

session_start();
        require("connection.php");
        if($_SERVER['REQUEST_METHOD']=='GET')
        {
            $query="DELETE FROM ad_info WHERE ad_id= '".$_GET['ad_id']."'";
    $result = mysqli_query( $connection,$query) 
    or die ("error occured <br> ".$query. " ".mysqli_error($connection));

    $query = "SELECT image_url FROM ad_images where ad_id='" . $_GET['ad_id']."'" ;
    
    $result_image = mysqli_query($connection, $query)
            or die($query . " " . mysqli_error($connection));
    while ($url = mysqli_fetch_array($result_image)) {
         unlink("uploads/".$url['image_url']);
    }
    $query="DELETE FROM ad_images WHERE ad_id= '".$_GET['ad_id']."'";
    $result = mysqli_query( $connection,$query) 
    or die ("error occured <br> ".$query. " ".mysqli_error($connection));
     
    
    echo 1;
    return;
}
