<?php 	
        require("connection.php");
        if($_SERVER['REQUEST_METHOD']=='POST')
        {
                function upload($connection)
                {
                    $name=basename($_FILES['photo']['name']);
                    $fileNameNew = rand(222, 999).time().".".$name;
                    $path = 'uploads/'.$fileNameNew;
                    if (file_exists($path)) 
                    {
                        upload($connection);
                    }
                    /*else if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";}*/
                    else if ($_FILES["photo"]["size"]> 2000000) 
                    {
                            echo  2;
                            unset($_POST);
                            return;
                    }

                    else if(!empty($name))
                    {

                            if(move_uploaded_file($_FILES["photo"]["tmp_name"], $path))
                            {
                                $query="insert into imageurl(url) values('".$fileNameNew."')";
                                if(!(mysqli_query($connection, $query)))
                                {
                                    echo 'Database insert Unsucessful: '. mysqli_error($connection);
                                }
                                else
                                {
                                    echo  1;
                                    unset($_POST);
                                    return;
                                    //echo "<br>Uploaded successfully";
                                }
                            }
                            else 
                            {
                                echo  0;
                                unset($_POST);
                                return;
                                //echo "Upload unsucessful";
                            }
                    }
                    
	
                }
                
              
                    $name=basename($_FILES['photo']['name']);
                    upload($connection);
                
        
        }

        mysqli_close($connection);