<?php
session_start();
require 'connection.php';
if($_POST['flag'] == 1)
{
    $query="insert into wishlist(ad_id,user_id) values('".$_POST['id']."','".$_SESSION['id']."')";
    if (!(mysqli_query($connection, $query))) {
        echo false;
    } else {
        echo true;
    }
    mysqli_close($connection);
    unset($_POST);
    return;
}
elseif ($_POST['flag'] == 0) {
    $query="delete from wishlist where ad_id ='".$_POST['id']."' and user_id='".$_SESSION['id']."'"; 
    if (!(mysqli_query($connection, $query))) {
        echo false;
    } else {
        echo true;
    }
    mysqli_close($connection);
    unset($_POST);
    return;
}
