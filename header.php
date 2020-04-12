<script type="text/javascript">
    var start=0,processing=false;
    var search_load=false;
    
    function toggle()
    {
        var header=document.getElementById("header");
        header.classList.toggle('active');
    }
    
    function fetchSearchResults()
    {
       const formData = new FormData();
        formData.append('search',$('.search').val());
        if($('.search').val().trim()==="")search_load=false;
        formData.append('start',start);

                $.ajax({
                    url: 'retriveSearchResults.php',
                    method: 'POST',
                    data: formData,
                    cache: false,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        
                             start+=12;
                             if(data !== "")
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
    
    
    function searchAds()
    {
        start=0;
        $('.display_ads').empty();
        fetchSearchResults();
        search_load=true;
    }
</script>
<header id="header" class="">
            <a href="index.php" class="logo"><span class="material-icons" style="font-size: 35px; margin-right:  8px; color:rgb(249, 87, 92);">pets</span><p>Petmania</p></a>
            
            <div class="search-area">
                    <div>
                        <input type="text" value="" name="search" class="search " placeholder="What are you looking for ?">
                        <div class="search-btn" onclick="searchAds()"><span class="glyphicon glyphicon-search  noselect"></span></div>
                    </div>
            </div>
            <ul onclick="toggle()">
                <li>
                
                </li>
                <li><a href="javascript:void(0)" id='postAdLink' ><span class="glyphicon glyphicon-open"></span> Post Ad. </a></li>
                <?php
                           if(isset($_SESSION['email'])){
                           ?>
                           <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Wishlist</a></li>
                           <li><a href="settings.php"><span class="glyphicon glyphicon-cog"></span> Acount Settings</a></li>
                           <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                           <?php
                           }else{
                            ?>
                           
                            <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                           <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                           <?php
                           }
                           ?>
            </ul>
            
            <div class="toggle" onclick="toggle()"></div>
</header>



<!--<nav class="navbar navbar-inverse navabar-fixed-top">
               <div class="container">
                   <div class="navbar-header">
                       <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                           <span class="icon-bar"></span>
                           <span class="icon-bar"></span>
                           <span class="icon-bar"></span>
                       </button>
                       <a href="index.php" class="navbar-brand"><span class="material-icons" style="font-size: 35px; margin-right:  8px; color:rgb(249, 87, 92);">pets</span><p>Petmania</p></a>
                   </div>
                   
                   
                   <div class="collapse navbar-collapse" id="myNavbar">
                       <ul class="nav navbar-nav navbar-right">
                           <li><a href="javascript:void(0)" id='postAdLink'style=" padding : 11px 10px; border: 4px solid rgb(249, 87, 92);border-radius: 355px 45px 225px 75px/15px 225px 15px 255px;"><span class="glyphicon glyphicon-open"></span> Post Ad. </a></li>
                           <?php
                           if(isset($_SESSION['email'])){
                           ?>
                           <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Wishlist</a></li>
                           <li><a href="settings.php"><span class="glyphicon glyphicon-cog"></span> Acount Settings</a></li>
                           <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                           <?php
                           }else{
                            ?>
                           
                            <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                           <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                           <?php
                           }
                           ?>
                           <li>
                               <div class="search-box">
                                   <input type="text" placeholder="What are you looking for?"/><span></span>
                               </div>
                           </li>
                       </ul>
                   </div>
               </div>
    <script>
        var searchBox = document.querySelectorAll('.search-box input[type="text"] + span');

searchBox.forEach(elm => {
  elm.addEventListener('click', () => {
    elm.previousElementSibling.value = '';
  });
});
    </script>
</nav> -->