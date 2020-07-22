<?php 
session_start();
require 'connection.php';       
?>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            
        </title>
        
        <?php include 'dependencies.php'; ?>
        <style>
            html,body {
                background: #efefef;
                font-family: "Arial";
            }

            .container {
                max-width: 1250px;
                margin: 30px auto 30px;
                padding: 0 !important;
                width: 90%;
                background-color: #fff;
                box-shadow: 0 3px 6px rgba(0,0,0,0.10), 0 3px 6px rgba(0,0,0,0.10);
                position: relative;
            }
            
            .update_profile
            {
                position: absolute;
                top:-110vh;
                width: 100%;
                height: 100%;
                background-color: rgba(128,128,128,0.8); 
                z-index:4;
                visibility: hidden;
                transition: 0.5s ease-in-out;
            }
            
            
            .update_profile_content{
                
                background-color: #FBF4DE;
            }
            .update_profile_content .preview div:first-child
            {
                width: calc( 100% - 40px );
                padding: 20px;
                height: 360px;
            }
            
            header {
                background: #eee;
                background-repeat: no-repeat;
                background-position: center;
                background-size: cover;
                background-color: red;
                height: 250px;
                position: relative;
            }



            @media (max-width:800px) {
                header {
                    height: 150px;
                } 

            }

            main {
                padding: 20px 20px 0px 20px;
            }

            .left {
                display: flex;
                align-items: center;
                justify-content: center;
                flex-direction: column;
                transition: 0.3s;
            }

            .photo {
                width: 200px;
                height: 200px;
                margin-top: -120px;
                border-radius: 100px;
                border: 4px solid #fff;
                
            }
            @keyframes profile
            {
                0%{position:absolute;
                   width: 200px;
                   height: 200px;
                   margin-top: -120px;
                   border-radius: 100px;
                }
                100%{
                   width: 300px;
                   height:500px;
                   margin-top: -120px;
                   border-radius: 100px;
                }
            }
            .active {
                width: 20px;
                height: 20px;
                border-radius: 20px;
                position: absolute;
                right: calc(50% - 70px);
                top: 75px;
                background-color: #FFC107;
                border: 3px solid #fff;
            }

            @media (max-width:990px) {
                .active {
                    right: calc(50% - 60px);
                    top: 50px;
                } 
            }

            .name {
                margin-top: 20px;
                font-family: "Open Sans";
                font-weight: 600;
                font-size: 18pt;
                color: #777;
            }

            .info {
                margin-top: -5px;
                margin-bottom: 5px;
                font-family: 'Montserrat', sans-serif;
                font-size: 11pt;
                color: #aaa;
            }

            .stats {
                margin-top: 25px;
                text-align: center;
                padding-bottom: 20px;
                border-bottom: 1px solid #ededed;
                font-family: 'Montserrat', sans-serif;
            }


            .number-stat {
                padding: 0px;
                font-size: 14pt;
                font-weight: bold;
                font-family: 'Montserrat', sans-serif;
                color: #aaa;
            }

            .desc-stat {
                margin-top: -10px;
                font-size: 20px;
                color: #bbb;
                text-align: center;
            }
            .like:hover {
                color:#F9BE4F;
            }
            .desc {
                text-align: center;
                margin-top: 25px;
                margin: 25px 40px;
                color: #999;
                font-size: 11pt;
                font-family: "Open Sans";
                padding-bottom: 25px;
                border-bottom: 1px solid #ededed;
                position: relative;
            }

            

            .right {
                padding: 0 25px 0 25px !important;
                overflow-y: auto;
                
            }

            .nav {
                display: inline-flex;
            }

            .nav li {
                margin: 40px 30px 0 10px;
                cursor: pointer;
                font-size: 13pt;
                text-transform: uppercase;
                font-family: 'Montserrat', sans-serif;
                font-weight: 500;
                color: #F9BE4F;
                border-bottom: 2px solid #F9BE4F;
            }

          

            .follow {
                position: absolute;
                right: 8%;
                top: 35px;
                font-size: 11pt;
                background-color: #F9BE4F;
                color: #fff;
                padding: 8px 15px;
                cursor: pointer;
                transition: all .4s;
                font-family: 'Montserrat', sans-serif;
                font-weight: 400;
                display: none;
            }

            .follow:hover {
                box-shadow: 0 0 15px rgba(0,0,0,0.2), 0 0 15px rgba(0,0,0,0.2);
            }

            @media (max-width:990px) {
                .nav {
                    display: none;
                }

                .follow {
                    width: 50%;
                    margin-left: 25%;
                    display: block;
                    position: unset;
                    text-align: center;
                    display: block;

                }
            }
            .gallery  {
                margin-top: 35px;
            }

            .gallery div {
                margin-bottom: 30px;
            }

            .gallery img {
                box-shadow: 0 3px 6px rgba(0,0,0,0.10), 0 3px 6px rgba(0,0,0,0.10);
                width: auto; 
                height: auto;
                cursor: pointer;
                width: 100%;
            }
            
            .edit
            {
                position: absolute;
                background-color: #F9BE4F;
                border: 2px solid rgba(237, 235, 235,1);
                border-radius: 50%;
                cursor: pointer;
                box-shadow: 0 3px 6px rgba(0,0,0,0.10), 0 3px 6px rgba(0,0,0,0.10);
                color: white;
            }
            
            header .edit
            {
                right: 10px;  
                bottom: 10px;
                font-size: 25px;
                padding: 5px;
            }
            .photo-left .edit
            {
                right: calc(50% - 90px);
                top: 20px;
                padding: 3px;
               
            }
            .edit:hover
            {
                box-shadow: 3px 3px 3px rgba(0,0,0,0);
            }
            .desc .edit{
                right: 2px;
                bottom: 2px;
                box-shadow: none;
                font-size:  15px;
                padding: 4px;
            }
            .desc .edit:hover
            {
                box-shadow: 0 3px 6px rgba(0,0,0,0.10), 0 3px 6px rgba(0,0,0,0.10);
            }
            .progress {
                display: none;
                padding: 2px;
                background: rgba(0, 0, 0, 0.25);
                border-radius: 6px;
                -webkit-box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.25), 0 1px rgba(255, 255, 255, 0.08);
                box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.25), 0 1px rgba(255, 255, 255, 0.08);
                height: 20px;
                width:90%;
                margin-left: 5%;
            }

            .progress-bar {
                height: 16px;
                border-radius: 4px;
                background-image: -webkit-linear-gradient(top, rgba(255, 255, 255, 0.3), rgba(255, 255, 255, 0.05));
                background-image: -moz-linear-gradient(top, rgba(255, 255, 255, 0.3), rgba(255, 255, 255, 0.05));
                background-image: -o-linear-gradient(top, rgba(255, 255, 255, 0.3), rgba(255, 255, 255, 0.05));
                background-image: linear-gradient(to bottom, rgba(255, 255, 255, 0.3), rgba(255, 255, 255, 0.05));
                -webkit-transition: 0.4s linear;
                -moz-transition: 0.4s linear;
                -o-transition: 0.4s linear;
                transition: 0.4s linear;
                -webkit-transition-property: width, background-color;
                -moz-transition-property: width, background-color;
                -o-transition-property: width, background-color;
                transition-property: width, background-color;
                -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, 0.25), inset 0 1px rgba(255, 255, 255, 0.1);
                box-shadow: 0 0 1px 1px rgba(0, 0, 0, 0.25), inset 0 1px rgba(255, 255, 255, 0.1);
                display: flex;
                align-items: center;
                justify-content: center;
            }
            .delete_button_wrapper{
                
                position: absolute;
                width: calc(100% - 30px);
                padding-right: 15px;
                padding-left: 15px;
                height: 100%;
                background-color: rgba(0,0,0,0.8);
                top:0;
                display: flex;
                align-items: center;
                justify-content: center;
                transition: .3s;
                opacity: 0;
            }
            .delete_button_wrapper button{
                background-color: red;
                padding: 5px 10px;
                color: white;
                border: none;
            }
            .delete_button_wrapper:hover{
                opacity: 1;
            }

            form{
                padding: 20px;
            }
            label
            {
                padding-top: 10px;
            }
            form input[type=text],form input[type=email],form input[type=tel],form input[type=password]
            {
                width: 100%;
                padding: 8px 20px;
                margin: 8px 0;
                display: inline-block;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box;
            }
            
            .form input[type=submit]{
                background-color: #F9BE4F;
                padding: 5px 10px;
                color: white;
                border: none;
                margin-top: 10px;
            }

            .message{
                color:#F9BE4F;display:flex;align-items:center;justify-content:center;border:3px dashed;height:300px;width:90%;margin-left: 5%;
            }
             @media (max-width:992px){
                 header .edit{
                     font-size: 20px;
                     padding: 3px;
                 }
                 .photo-left .edit{
                     font-size: 15px;
                     padding: 3px;
                 }
                 .form{
                    display: none;
                 }
                                }
            
        </style>
    </head>
    <body>
        <?php
        $query = "SELECT * FROM users where id='".$_SESSION['id']."'";
        $result = mysqli_query($connection, $query)
                or die($query . " " . mysqli_error($connection));
        
        while($rows=mysqli_fetch_array($result))
 {
            ?>
        
        <div class="container">
            <div class="update_profile">
                <div class="col-lg-6 col-sm-6 col-lg-offset-3 col-sm-offset-3 col-xs-12">
                    <div class="close_wrapper">
                        <span class="close_btn" onclick="close_update_profile_window()">x</span>
                        <div class="update_profile_content">
                            
                        </div>
                    </div>
                </div>
            </div>
            <header style="  background-image: url('img/back-img.PNG');">
                           </header>
            <main>
                <div class="row">
                    <div class="left col-lg-4">
                        <div class="photo-left">
                            <img class="photo" src="<?php echo $rows['profile_img_url'] ?>">
                            <span class="material-icons edit" onclick="update_profile_img()" title="Change profile image">
                                create
                            </span>
                        </div>
                        <h4 class="name"><?php echo $rows['name'] ?></h4>
                        <form id="update_details_form" class="form"action="update_user_details.php">
                            <label for="name">Name:</label><br>
                            <input type="text" id="name" name="name" value="<?php echo $rows['name'] ?>"><br>
                                <label for="email">Email:</label><br>
                                <input type="email" id="email" name="email" value="<?php echo $rows['email'] ?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"><br>
                                <label for="contact">Contact:</label><br>
                                <input type="tel" id="contact" name="contact" value="<?php echo $rows['contact'] ?>" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" oninvalid="this.setCustomValidity('Enter valid format eg. 9876543210')" oninput="this.setCustomValidity('')"><br>
                                <label for="city">City:</label><br>
                                <input type="text" id="city" name="city" value="<?php echo $rows['city'] ?>"><br>
                                <label for="address">Address:</label><br>
                                <input type="text" id="address" name="address" value="<?php echo $rows['address'] ?>"><br>

                                <input type="submit" value="Update">
                        </form>
                        
                        <form id="update_password" class="form">
                            <label for="oldpass">Old Password:</label><br>
                            <input type="password" id="oldpass" name="oldpass" value="" pattern=".{6,}" required=""><br>
                            <label for="newpass">New Password:</label><br>
                            <input type="password" id="newpass" name="newpass" value="" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" oninvalid="this.setCustomValidity('Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters')" oninput="this.setCustomValidity('')"  required><br>
                            <label for="confpass">Confirm New Password:</label><br>
                            <input type="password" id="confpass" name="confpass" value="" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" oninvalid="this.setCustomValidity('Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters')" oninput="this.setCustomValidity('')"  required><br>
                            <input type="submit" value="Change Password">
                        </form>
                                                
                    </div>
                    <div class="right col-lg-8">
                        <ul class="nav">
                            <li>Advertisement Posts</li>
                        </ul>
                        <span class="follow" onclick="displayEditField()">Edit Info.</span>
                        <div class="row gallery">
                            <?php 
                                        $query = "SELECT * FROM ad_info where user_id=". $_SESSION['id']; 
                                $result = mysqli_query($connection, $query)
                                        or die($query . " " . mysqli_error($connection));
                                $isAdsAvailable = false;
                                while ($ad_rows = mysqli_fetch_array($result)) {
                                    $isAdsAvailable = true;
                                    $query = "SELECT image_url FROM ad_images where ad_id='" . $ad_rows['ad_id'] . "' LIMIT 1";
                                    $result_image = mysqli_query($connection, $query)
                                            or die($query . " " . mysqli_error($connection));
                                
                                    ?>
                            
                            
                            <div class="col-md-4">
                                <?php  
                                while ($url = mysqli_fetch_array($result_image)) {
                                ?>
                                <img src="uploads/<?php echo $url['image_url']?>"/>
                                <div class="delete_button_wrapper"><button onclick="deleteAd('<?php echo $ad_rows['ad_id'];?>')">Delete Ad</button></div>
                                <?php 
                                }
                                ?>
                            </div>
                            
                            <?php
                                }
                                if(!$isAdsAvailable)
                                    echo '<div class="message"><p>Nothing to show yet. Post some ads.</p><div>';
                                ?>
                            
                        </div>
                    </div>
               </div>
         </main>
        </div>
        <?php 
 }
 ?>
        <script>
            
            function displayEditField(){
                if($(".form").css('display')=='none')
                {
                    $(".form").css({'display':'block'});
                    $(".follow").text('Hide Edit Fields');
                }
                else
                {
                    $(".form").css({'display':'none'});
                    $(".follow").text('Edit Info.');
                }
            }
            
    
    
    
    $("#update_details_form").submit(function(e) {

    e.preventDefault(); // avoid to execute the actual submit of the form.

    var form = $(this);
    var url = form.attr('action');
    
    $.ajax({
           type: "POST",
           url: url,
           data: form.serialize(), // serializes the form's elements.
           success: function(data)
           {
               
               if(data == 1)
               {
                   alert("Details Updated Sucessfully");
                   location. reload(true);
                   // show response from the php script.
           }else
               alert(data);
       }
         });

    
});





$("#update_password").submit(function(e) {

    e.preventDefault(); // avoid to execute the actual submit of the form.
    if($("input[name=newpass]").val()!= $("input[name=confpass]").val())
    {
        alert('New password and confirm password do not match');
        return;
    }
    var form = $(this);
    
    $.ajax({
           type: "POST",
           url: 'update_password.php',
           data: form.serialize(), // serializes the form's elements.
           success: function(data)
           {
               location.reload();

               alert(data);
       }
         });

    
});



function deleteAd(id)
{ 
    //alert(id);
     $.ajax({
           type: "GET",
           url: "delete_ad.php?ad_id="+id,
           data: '',
           success: function(data)
           {
               if(data == 1)
               {
                   location. reload(true);
         // show response from the php script.
           }
           else
               alert(data);
       }
         });
}
            </script>
    </body>
</html>
