<?php

session_start();
require("connection.php");

if($_SERVER['REQUEST_METHOD']=='POST')
        {
$old_pass =md5(md5(mysqli_real_escape_string($connection,$_POST['oldpass'])));
$new_pass=md5(md5(mysqli_real_escape_string($connection,$_POST['newpass'])));
    
    $query="SELECT * from users where password= BINARY '$old_pass' and id=".$_SESSION['id'];

$result = mysqli_query( $connection,$query) 
 or die ("wrong old pass <br> ".$query. " ".mysqli_error($connection));
$rows=mysqli_fetch_array($result);


if(mysqli_num_rows($result) == 0)
{
    echo 'Please Enter Correct Old Password';
    return;
}
    $query="UPDATE users SET password= '$new_pass' WHERE password= BINARY '$old_pass' and id=".$_SESSION['id'];
    $result = mysqli_query( $connection,$query) 
  or die ("Incorrect old password <br>".$query. " ".mysqli_error($connection));
 echo"Password updated successfully";
}

