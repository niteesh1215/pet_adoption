<?php
    session_start();
    session_unset();
    session_destroy();
?>
<!DOCTYPE html>
<html>
    <head>
        
        <title>Petmania Logout</title>
        <?php include 'dependencies.php'; ?>
    </head>
    <body>
        <div>
            <?php
                require 'header.php';
            ?>
            <br>
            <div class="container login" style="margin-top: 200px;">
			
                <div class="row">
                    <div class="col-lg-4 col-sm-6 col-lg-offset-4 col-sm-offset-3">
                        <div class="panel panel-primary">
                            <div class="panel-heading"></div>
                            <div class="panel-body">
				
                                <script>
                                    var count=5;
                                    
                                    var timer= window.setInterval(function(){
                                        $('.countdown').empty();
                                        $('.countdown').append(--count);
                                        if(count === 0)
                                        {
                                            window.clearInterval(timer);
                                            window.location.replace('index.php');
                                        }
                                    },1000);
                                </script>
							
                                <p>You have been logged out. Redirecting to home page in <span class="countdown" style="font-size: 15px; color:gray;padding: 0 3px;">5</span> seconds.</p>
							
                            </div>
                        </div>
                    </div>
                </div>
				
            </div>
			
		
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
