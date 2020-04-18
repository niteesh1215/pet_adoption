<?php
    session_start();
    require 'check_if_added.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="shortcut icon" href="img/lifestyleStore.png" />
        <title>Petmania</title>
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
            <div class="container">
                <div class="jumbotron">
                    <h1>Welcome to Petmania</h1>
					<br>
					<h2> Pets available for adoption</h2>
                    <p>Are you looking for a pet ? there are many, they are looking for a new home</p>
                </div> 
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="thumbnail">
                            <a href="cart.php">
                                <img src="img/Rottweiler.jpg" alt="Rottweiler">
                            </a>
                            <center>
                                <div class="caption">
                                    <h3>Rottweiler </h3>
                                    <p>Color: Black Age:3 years Tag:yellow with color</p>
                                    <?php if(!isset($_SESSION['email'])){  ?>
                                        <p><a href="login.php" role="button" class="btn btn-primary btn-block">Click here for details</a></p>
                                        <?php
                                        }
                                        else{
                                            if(check_if_added_to_cart(1)){
                                                echo '<a href="#" class=btn btn-block btn-success disabled>Added to Wishlist</a>';
                                            }else{
                                                ?>
                                                <a href="cart_add.php?id=1" class="btn btn-block btn-primary" name="add" value="add" class="btn btn-block btr-primary">Add to Wishlist</a>
                                                <?php
                                            }
                                        }
                                        ?>
                                    
                                </div>
                            </center>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="thumbnail">
                            <a href="cart.php">
                                <img src="img/German_Shepherd.jpeg" alt="German Shepherd">
                            </a>
                            <center>
                                <div class="caption">
                                    <h3>German Shepherd</h3>
                                    <p>Color:Black Brown Age:3 years Tag:yellow</p>
                                    <?php if(!isset($_SESSION['email'])){  ?>
                                        <p><a href="login.php" role="button" class="btn btn-primary btn-block">Add to Wishlist</a></p>
                                        <?php
                                        }
                                        else{
                                            if(check_if_added_to_cart(2)){
                                                echo '<a href="#" class=btn btn-block btn-success disabled>Added to cart</a>';
                                            }else{
                                                ?>
                                                <a href="cart_add.php?id=2" class="btn btn-block btn-primary" name="add" value="add" class="btn btn-block btr-primary">Add to Wishlist</a>
                                                <?php
                                            }
                                        }
                                        ?>
                                </div>
                            </center>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="thumbnail">
                            <a href="cart.php">
                                <img src="img/Bulldog.jpeg" alt="Bulldog">
                            </a>
                            <center>
                                <div class="caption">
                                    <h3>Bulldog</h3>
                                    <p>Color: White brown Typ:Purebred size: medium</p>
                                    <?php if(!isset($_SESSION['email'])){  ?>
                                        <p><a href="login.php" role="button" class="btn btn-primary btn-block">Add to Wishlist</a></p>
                                        <?php
                                        }
                                        else{
                                            if(check_if_added_to_cart(3)){
                                                echo '<a href="#" class=btn btn-block btn-success disabled>Added to cart</a>';
                                            }else{
                                                ?>
                                                <a href="cart_add.php?id=3" class="btn btn-block btn-primary" name="add" value="add" class="btn btn-block btr-primary">Add to Wishlist</a>
                                                <?php
                                            }
                                        }
                                        ?>
                                </div>
                            </center>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="thumbnail">
                            <a href="cart.php">
                                <img src="img/Poodle.jpg" alt="Poodle">
                            </a>
                            <center>
                                <div class="caption">
                                    <h3>Poodle (Standard)</h3>
                                    <p>Color: White brown Typ:Purebred size: medium</p>
                                    <?php if(!isset($_SESSION['email'])){  ?>
                                        <p><a href="login.php" role="button" class="btn btn-primary btn-block">add to wishlist</a></p>
                                        <?php
                                        }
                                        else{
                                            if(check_if_added_to_cart(4)){
                                                echo '<a href="#" class=btn btn-block btn-success disabled>Added to cart</a>';
                                            }else{
                                                ?>
                                                <a href="cart_add.php?id=4" class="btn btn-block btn-primary " name="add" value="add" class="btn btn-block btr-primary">Add to Wishlist</a>
                                                <?php
                                            }
                                        }
                                        ?>
                                </div>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
            <br><br><br><br><br><br><br><br>
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
