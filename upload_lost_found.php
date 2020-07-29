<?php
session_start();
        require("connection.php");
        if($_SERVER['REQUEST_METHOD']=='POST')
        {
                function upload($connection)
                {
                    $name=basename($_FILES['photo']['name']);
                    $fileNameNew = rand(222, 999).time().$name;
                    $path = 'lost_found/'.$fileNameNew;
                    if (file_exists($path)) 
                    {
                        upload($connection);
                    }
                    /*else if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";}*/
                    else if ($_FILES["photo"]["size"]> 10000000) 
                    {
                            echo  2;
                            unset($_POST);
                            return;
                    }

                    else if(!empty($name))
                    {

                            if(move_uploaded_file($_FILES["photo"]["tmp_name"], $path))
                            {
                                $table;
                                if($_SESSION['type'] == 'lost')
                                {
                                    $table = 'lost_pets';
                                }else{
                                    $table = 'found_pets';
                                }
                                
                                $count = $_SESSION['img_count'];
                                $_SESSION['img_count'] = $_SESSION['img_count'] +1;
                                
                                $id = $_SESSION['lost_found_id'];
                                
                                $query="update $table set img$count ='$path' where id=$id";
                                
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
                
                
                
                function getValue($choice)
                {
                    switch ($choice)
                    {
                        case "Unknown": return -1;
                        case "No":return 0;
                        case "Yes": return 1;
                        case '-1': return -1;
                        case "Small": return 0;
                        case "Medium": return 1;
                        case "Large": return 2;
                        default : return 2;
                        
                            
                    }
                }
                
                function upload_details($connection)
                {
                    
                    $form_type=filter_var($_POST['type'], FILTER_SANITIZE_STRING);
                    $age=filter_var($_POST['age'],  FILTER_SANITIZE_NUMBER_INT);
                    $name=filter_var($_POST['name'], FILTER_SANITIZE_STRING);
                    $breed=filter_var($_POST['breed'], FILTER_SANITIZE_STRING);
                    $address=filter_var($_POST['name'], FILTER_SANITIZE_STRING);
                    $species=filter_var($_POST['species'], FILTER_SANITIZE_STRING);
                    $description=filter_var($_POST['description'], FILTER_SANITIZE_STRING);
                   
                    
                    $ad_id= rand(100000000,999999999).time();
                    
                    $_SESSION['img_count'] = 1;
                    
                    if($form_type == 'lost')
                    {
                    $_SESSION['type']='lost';    
                    $query="insert into lost_pets(lost_name,lost_breed,lost_age,lost_address,lost_species,description)".
                            " values('". $name."','".$breed."',".$age.",'".$address."','".$species."','".$description."')";
                    }else{
                        $_SESSION['type']='found';  
                        $query="insert into found_pets(found_name,found_breed,found_address,found_species,description)".
                            " values('". $name."','".$breed."','".$address."','".$species."','".$description."')";   
                    }    
                    $result = mysqli_query( $connection,$query) 
                        or die ($query. " ".mysqli_error($connection));
                    
                    $_SESSION['lost_found_id']=mysqli_insert_id($connection);
                    
                }
                
              
                $name=basename($_FILES['photo']['name']);
                
                    if(isset($_POST['type']))
                    {
                        upload_details($connection);
                    }
                    upload($connection);
                
        
        }

        mysqli_close($connection);

