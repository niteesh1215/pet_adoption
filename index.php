<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        
        <title>Welcome to the Petmania</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!-- latest compiled and minified CSS -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
        <!-- jquery library -->
        <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>
        <!-- Latest compiled and minified javascript -->
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <!-- External CSS -->
        <link rel="stylesheet" href="css/style.css" type="text/css">
        <link rel="stylesheet" href="css/search.css" type="text/css">
    </head>
    <body>
	 
        <div>
           <?php
            require 'header.php';
           ?>
           <div id="bannerImage">
               <div class="container">
                   <center>
                   <div id="bannerContent">
                       <h1>Greatness of a Nation Be Judged by How It Treats Its Animals .</h1>
                       <p>Adopting a pet or finding a new house for the pet</p>
                       <a href="products.php" class="btn btn-primary">Click here to see all the cute pets</a>
                   </div>
                   </center>
               </div>
           </div>
           <div class="container">
               <div class="row">
                   <div class="col-xs-4">
                       <div  class="thumbnail">
                           <a href="products.php">
                                <img src="img/dogs.jpg" alt="Camera">
                           </a>
                           <center>
                                <div class="caption">
                                        <p id="autoResize">Dogs</p>
                                        <p>Choose dog pet.</p>
                                </div>
                           </center>
                       </div>
                   </div>
                   <div class="col-xs-4">
                       <div class="thumbnail">
                           <a href="products.php">
                               <img src="img/cats.jpg" alt="Cats">
                           </a>
                           <center>
                                <div class="caption">
                                    <p id="autoResize">Cats</p>
                                    <p>A family of Meawwwww</p>
                                </div>
                           </center>
                       </div>
                   </div>
                   <div class="col-xs-4">
                       <div class="thumbnail">
                           <a href="products.php">
                               <img src="img/fishes.jpg" alt="Fishes">
                           </a>
                           <center>
                               <div class="caption">
                                   <p id="autoResize">Fishes</p>
                                   <p>Cutes Fishes.</p>
                               </div>
                           </center>
                       </div>
                   </div>
               </div>
           </div>
            <br><br> <br><br><br><br>
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