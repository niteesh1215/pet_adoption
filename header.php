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
        if($('.display_ads').css('height') === undefined && $('.search').val().trim()!=="" )
            document.location = "displaypets.php?search="+$('.search').val();
        start=0;
        $('.display_ads').empty();
        fetchSearchResults();
        search_load=true;
    }
    
    function login()
    {
         //document.getElementById("dynamic_content").innerHTML='<object type="text/php" data="login.php" ></object>';
         $("#dynamic_content").css("visibility","visible");
         $("#dynamic_content").load("login.php");
    }
    
    function signUp()
    {
        $("#dynamic_content").css("visibility","visible");
        $("#dynamic_content").load("signup.php");
    }
    
    function logOut()
    {
        $("#dynamic_content").css("visibility","visible");
        $("#dynamic_content").load("logout.php");
    }
    function wishlist()
    {
        $("#dynamic_content").css("visibility","visible");
        $("#dynamic_content").empty();
        $.ajax({
                    url: 'wishlist.php',
                    method: 'POST',
                    data: '',
                    cache: false,
                    processData: false,
                    contentType: false,
                    success: function (data) 
                    {   
                        $("#dynamic_content").append(data);
                    },
                    error(data) {
                        console.log(data);
                    }
                });     
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
                           <li><a href="javascript:wishlist();"><span class="glyphicon glyphicon-shopping-cart"></span> Wishlist</a></li>
                           <li><a href="profile_page.php"><span class="glyphicon glyphicon-cog"></span> Profile Settings</a></li>
                           <li><a href="javascript:logOut();"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                           <?php
                           }else{
                            ?>
                           
                            <li><a href="javascript:signUp();"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                           <li><a href="javascript:login();"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                           <?php
                           }
                           ?>
            </ul>
            
            <div class="toggle" onclick="toggle()"></div>
</header>



