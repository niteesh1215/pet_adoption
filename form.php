<?php
    require 'connection.php';
    session_start();
    if(isset($_SESSION['email'])){
        header('location: products.php');
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="shortcut icon" href="img/petmania.jpg" />
        <title>Petmania Sign Up</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- latest compiled and minified CSS -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
        <!-- jquery library -->
        <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>
        <!-- Latest compiled and minified javascript -->
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <!-- External CSS -->
        <link rel="stylesheet" href="css/style.css" type="text/css">
    </head>
    <body>
        <div>
            <?php
                require 'header.php';
            ?>
            <br><br>
            <div class="container">
                <div class="row">
                    <div class="col-xs-4 col-xs-offset-4">
                        <h1><b>Pet Form</b></h1>
                        <form method="post" action="user_registration_script.php">
                            <div class="form-group">
                                <input type="text" class="form-control" name="pet_Name" placeholder="Pet Name" required="true">
                            </div>
                            <div class="form-group">
                            <label for="Gender">Gender:</label>
                            <select id="gender">
                            <option value="male">Male</option>
                            <option value="Female">Female</option>
                            </select>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="age" placeholder="Age" required="true">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="size" placeholder="Size" required="true">
                            </div>
                            <div class="form-group">
                            <label for="Gender">vaccinated:</label>
                            <select id="vaccinated">
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                            </select>
                            </div>
                            <div class="form-group">
                            <label for="nuetured">Nuetured:</label>
                            <select id="nueture">
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                            </select>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="weight" placeholder="Weight" required="true">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="city_village" placeholder="City" required="true">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="district" placeholder="District Name" required="true">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="state" placeholder="State" required="true">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="description" placeholder="Descriptoin" required="true">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="about_pet" placeholder="About Pet" required="true">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="adoption_rules" placeholder="Adoption Rules" required="true">
                            </div>
                               
                           
                           
                           
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Submit">
                            </div>
                       </form>
                    </div>
                </div>
            </div>
            <br><br><br><br><br><br>
           <footer class="footer">
               <div class="container">
                <center>
                    <p> Looking for a pet or finding a new home for a pet. Petmania is here for you</P>
               </center>
               </div>
           </footer>

        </div>
    </body>
</html>
