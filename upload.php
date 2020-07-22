<?php 	
        session_start();
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
                                $query="insert into ad_images(ad_id,image_url) values('".$_SESSION['ad_id']."','".$fileNameNew."')";
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
                    $pet_name=filter_var($_POST['pet_name'], FILTER_SANITIZE_STRING);
                    $pet_category=filter_var($_POST['pet_category'], FILTER_SANITIZE_STRING);
                    $breed=filter_var($_POST['breed'], FILTER_SANITIZE_STRING);
                    $gender;
                    if(filter_var($_POST['gender'], FILTER_SANITIZE_STRING)== "Male")
                    {
                        $gender=0;
                    }
                    else
                    {
                        $gender=1;
                    }
                    $age=filter_var($_POST['age'],  FILTER_SANITIZE_NUMBER_INT);
                    $age_type=filter_var($_POST['age_type'], FILTER_SANITIZE_STRING);
                    $size= getValue(filter_var($_POST['size'],  FILTER_SANITIZE_STRING));
                    $vaccinated=getValue(filter_var($_POST['vaccinated'],  FILTER_SANITIZE_STRING));
                    $neutured=getValue(filter_var($_POST['neutured'],  FILTER_SANITIZE_STRING));
                    $weight=filter_var($_POST['weight'],  FILTER_SANITIZE_NUMBER_INT);
                    $city_village=filter_var($_POST['city_village'], FILTER_SANITIZE_STRING);
                    $district=filter_var($_POST['district'], FILTER_SANITIZE_STRING);
                    $state=filter_var($_POST['state'], FILTER_SANITIZE_STRING);
                    $description=filter_var($_POST['description'], FILTER_SANITIZE_STRING);
                    $about_pet=filter_var($_POST['about_pet'], FILTER_SANITIZE_STRING);
                    $adoption_rules=filter_var($_POST['adoption_rules'], FILTER_SANITIZE_STRING);
                    
                    $ad_id= rand(100000000,999999999).time();
                    $user_id=$_SESSION['id'];
                    $_SESSION['ad_id']=$ad_id;
                    $query="insert into ad_info(ad_id,user_id,pet_name,pet_category,breed,gender,age,age_type,size,vaccinated,neutured,weight,city_village,district,state,description,about_pet,adoption_rules)".
                            " values('". $ad_id."','".$user_id."','".$pet_name."','".$pet_category."','".$breed."',".$gender.",".$age.",'".$age_type."',".$size.",".$vaccinated.",".$neutured.",".$weight.",'".$city_village."','".$district."','".$state."','".$description."','".$about_pet."','".$adoption_rules."')";
                            
                    $result = mysqli_query( $connection,$query) 
                        or die ($query. " ".mysqli_error($connection));
                    
                    
                }
                
              
                $name=basename($_FILES['photo']['name']);
                    if(isset($_POST['pet_name']))
                    {
                        upload_details($connection);
                    }
                    upload($connection);
                
        
        }

        mysqli_close($connection);