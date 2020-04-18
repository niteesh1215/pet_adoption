<?php
    require 'connection.php';
    session_start();
    $email=mysqli_real_escape_string($connection,$_POST['email']);
    $regex_email="/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[_a-z0-9-]+)*(\.[a-z]{2,3})$/";
    if(!preg_match($regex_email,$email)){
        echo 0;
        return;
    }
    $password=md5(md5(mysqli_real_escape_string($connection,$_POST['password'])));
    if(strlen($password)<8){
        echo "Password should have atleast 8 characters.";
    }
    $user_authentication_query="select id,email from users where email='$email' and password='$password'";
    $user_authentication_result=mysqli_query($connection,$user_authentication_query) or die(mysqli_error($connection));
    $rows_fetched=mysqli_num_rows($user_authentication_result);
    if($rows_fetched==0){
        //no user
        //redirecting to same login page
        echo 0;
        return;
    }else{
        $row=mysqli_fetch_array($user_authentication_result);
        $_SESSION['email']=$email;
        $_SESSION['id']=$row['id'];  //user id
        echo 1;
        return;
    }
    
