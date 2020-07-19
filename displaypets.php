<?php
    session_start();
    require 'connection.php';
  
?>
<html>
    <head>
        <title></title>
        <link rel="shortcut icon" href="img/Bulldog.jpeg" />
        
        <?php include 'dependencies.php'; ?>
        
    </head>
    <body>
        <?php
          include 'header.php';
        ?> 
        
 <div id="dynamic_content">
            
 </div>       
 <div class="display_ads">
            
           
              
            
</div>            
            
        <!--    <div class="col-sm-6 col-md-4 col-lg-3 column">
                <div class="card">
                    <img src="" class="img-responsive">
                    <div class="name_favorite_align">
                        <h6 class="">charlie</h6> 
                        <div>
                            <p style="color: #ed2ccb; padding-right: 8px; font-size: 30px;text-align: center; margin: 0;">F</p>
                            <span class="material-icons favorites noselect"  onclick="favorite_toggle(this)">favorite_border</span>
                        </div>
                        
                    </div>
              
                     <div class="more_info_btn"><a href="#">More info</a></div>
                        
                </div>
            </div>
            
             
            <div class="col-sm-6 col-md-4 col-lg-3 column">
                <div class="card">
                    <img src="data:image/jpeg;base64,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" class="img-responsive">
                    <div class="name_favorite_align">
                        <h6 class="">charlie</h6> 
                        <div>
                            <p style="color: #02b2fb; padding-right: 8px; font-size: 30px;text-align: center; margin: 0;">M</p>
                            <span class="material-icons favorites noselect"  onclick="favorite_toggle(this)">favorite_border</span>
                        </div>
                        
                    </div>
              
                     <div class="more_info_btn"><a href="#">More info</a></div>
                   
                </div>
            </div>
            
            
                
        </div>-->
         <?php include 'post-ad-part-1.php';?>
         
            <script>
                
                
                
                 
                    $(document).ready(function(){
                        
                        var search =  '<?php if(strlen($_GET['search']) != 0) echo $_GET['search']; ?>';
                        if(search.length !==0 )
                        {
                            $('.search').val(search);
                            searchAds();
                        }
                        else
                        {
                            fetchAds();
                        }
                        
                    });
                
                
                function fetchAds() { 
                    
                        const formData = new FormData();
                        formData.append('start',start);
                        $.ajax({
                        url:'retriveAds.php',
                        method: 'POST',
                        data: formData,
                        cache: false,
                        processData: false,
                        contentType: false,
                        success: function (data) {
                             //console.log(data);
                            
                             start+=12;
                             if(data != "")
                             {
                                $('.display_ads').append(data);
                                processing=false;
                             }
                             else
                             {
                                 $('.display_ads').append('<p class="col-lg-12 column" style=" width:100%;text-align:center;font-size:20px;color:#F9575C">Nothing more to load</p>');
                             }
                             
                          },
                        error(data) {
                          console.log(data);
                        }
                        });
                    

                    }
                
                $(document).scroll(function(e){
                    
                   
                    if(processing) return;
                    
                    // grab the scroll amount and the window height
                    var scrollAmount = $(window).scrollTop();
                    var documentHeight = $(document).height();

                    // calculate the percentage the user has scrolled down the page
                    var scrollPercent = (scrollAmount / documentHeight) * 100;
                   

                    if(scrollPercent > 50) {
                        // run a function called doSomething
                       processing=true;
                       if(search_load)
                       {
                           fetchSearchResults();
                       }
                       else
                       {
                          
                          fetchAds();
                       }
                    }

                   

                });
                
                
                
                
            </script>
    </body>
</html>
