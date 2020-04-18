<?php
    require 'connection.php';
    session_start();
    if(isset($_SESSION['email'])){
        header('location: displaypets.php');
    }
?>

<!DOCTYPE html>
<html>
    <head>
        
        <title>Petmania Sign Up</title>
        <?php include 'dependencies.php'; ?>
    </head>
    <body>
        <div>
            <?php
                require 'header.php';
            ?>
            <br><br>
            <div class="signup login">
                <div class="row">
                    <div class="col-lg-4 col-sm-6 col-lg-offset-4 col-sm-offset-3">
                        <div class="panel">
                        <div class="panel-heading">
                                <h3>SIGN UP</h3>
                            </div>
                        <div class="panel-body">
                            <p class="signup_fail" style="text-align: center; color: red;"></p>
                            <form id="signUpForm" method="post" >
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" placeholder="Name" required="true">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" placeholder="Email" required="true" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
                            </div> 
                            <div class="form-group">
                                <input type="password" class="form-control pass" name="password" placeholder="Password (min. 8 characters)" required="true" pattern=".{6,}">
                            </div>
                            
                             <div class="form-group">
                                <input type="password" class="form-control confirm-pass" name="password" placeholder="Confirm Password" required="true" pattern=".{6,}">
                                <p class="confirm-pass-invalid" style="text-align: center; color: red;"></p>
                            </div>
                            
                            <div class="form-group"> 
                                <input type="tel" class="form-control" name="contact" placeholder="Contact" required="true" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" oninvalid="this.setCustomValidity('Enter valid format eg. 9876543210')" oninput="this.setCustomValidity('')">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="city" placeholder="City" required="true">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="state" placeholder="State" required="true">
                            </div>
                            <div class="form-group center">
                                <input type="submit" class="btn " value="Sign Up">
                            </div>
                        </form>
                        </div>
                    </div>
                    </div>
                </div>
                <script>
                $('#signUpForm').submit(function (e) {
                    
                    e.preventDefault();
                    
                    const formData = new FormData(this);
                    
                    if($('.pass').val()!== $('.confirm-pass').val() )
                    {
                        $('.confirm-pass-invalid').empty();
                        $('.confirm-pass-invalid').append("Password doesn't match.")
                        return;
                    }
                    else
                    {
                        $('.confirm-pass-invalid').empty();
                    }
                     $.ajax({
                        url:'user_registration_script.php',
                        method: 'POST',
                        data: formData,
                        cache: false,
                        processData: false,
                        contentType: false,
                        success: function (data) {
                              switch(data)
                              {
                                  case '1' :window.location.replace('displaypets.php'); break;
                                  default:  $('.signup_fail').empty();$('.signup_fail').append(data);
                              }


                          },
                        error(data) {
                          console.log(data);
                        },
                    });
                });
            </script>
            </div>
            

        </div>
    </body>
</html>
