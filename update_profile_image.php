<?php
        session_start();
        require("connection.php");
        if($_SERVER['REQUEST_METHOD']=='POST')
        {
            $exist=false;
            $name = basename($_FILES['photo']['name']);
            $fileNameNew =$_SESSION['id'].time().".jpg";
            $path = 'profile_img/' . $fileNameNew;
            if ($_FILES["photo"]["size"] > 5000000) {
                $response = (object)array();
                $response->status = 2;
                $response->img_path = null;
                $response_json=json_encode($response);
                echo $response_json;
                unset($_POST);
                return;
            }
             else if (!empty($name)) {

                if (move_uploaded_file($_FILES["photo"]["tmp_name"], $path)) {
                  
                    
                        $query = "SELECT profile_img_url FROM users where id = ".$_SESSION['id'];
                        $result = mysqli_query($connection, $query)
                        or die($query . " " . mysqli_error($connection));
                        
                        while ($rows = mysqli_fetch_array($result)) {
                            if(file_exists($rows['profile_img_url']) &&($rows['profile_img_url'] =! 'profile_img/default.jpg'))
                                
                                unlink($rows['profile_img_url']);
                        }
                        
                        $query = "update users set update_timestamp ='". date('Y-m-d H:i:s')."', profile_img_url = '".$path."' where id=".$_SESSION['id'];
                        
                        $result = mysqli_query($connection, $query)
                        or die($query . " " . mysqli_error($connection));
                       
                        $response = (object)array();
                        
                        $response->status = 1;
                        $response->img_path = $path;
                        $response_json=json_encode($response);
                        echo $response_json;
                        unset($_POST);
                        return;
                        //echo "<br>Uploaded successfully";
                    }
                } 
                   $response = (object)array();
                   $response->status = 0;
                   $response->img_path = null;
                   $response_json=json_encode($response);
                   echo $response_json;
                   unset($_POST);
                   return;
                    //echo "Upload unsucessful";
        }


    