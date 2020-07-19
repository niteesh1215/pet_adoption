<?php
session_start();
        require("connection.php");
        if($_SERVER['REQUEST_METHOD']=='POST')
        {
            $query = "UPDATE users SET name = '".$_POST['name']."',email='".$_POST['email']."',contact='".$_POST['contact']."',city='".$_POST['city']."',address='".$_POST['address']."' WHERE id=".$_SESSION['id'];
    $result = mysqli_query($connection, $query)
            or die("Error in updating details <br> " . $query . " " . mysqli_error($connection));
    echo 1;
    return;
}


