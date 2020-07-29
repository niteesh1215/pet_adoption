<?php
session_start();
require 'connection.php';

$query="SELECT id,lost_name,lost_breed,lost_species,img1 FROM lost_pets";
$result = mysqli_query( $connection,$query) 
  or die ($query. " ".mysqli_error($connection));
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
        <div style="margin-top: 110px">
<?php
while($rows=mysqli_fetch_array($result))
 {
    
    echo '<div class="col-xs-6 col-sm-6 col-md-4 col-lg-2 column">
                <div class="card">';

    
        echo '<img src="' . $rows['img1'] . '" class="img-responsive">';
    
    echo '<div class="card_body">' .
    '<h6 class="">' . $rows['lost_name'] . '</h6>'
            . '<p>'.$rows['lost_species'].' &#9679; '.$rows['lost_breed'].'</p>'
            . '</div>';

    
     /*if(isset($_SESSION['id'])){
        
        $query="SELECT * FROM wishlist where ad_id =".$rows['ad_id']." and user_id =".$_SESSION['id'];
        $result_wishlist = mysqli_query( $connection,$query) 
         or die ($query. " ".mysqli_error($connection));
        switch (mysqli_num_rows($result_wishlist))
        {
        case 0:echo'<div class="circle_avatar"><span class="material-icons favorites noselect"  onclick=favorite_toggle(this,"'.$rows['ad_id'].'")>favorite_border</span></div>';break;
        case 1:echo'<div class="circle_avatar"><span class="material-icons favorites noselect"  style="color:#F9575C;" onclick=favorite_toggle(this,"'.$rows['ad_id'].'")>favorite</span></div>';break;
        }
    }
 else {
     $message="'Please Login/Signup to add this item to your wishlist'";
     echo '<div class="circle_avatar"><span class="material-icons favorites noselect"  onclick="alert('.$message.');">favorite_border</span></div>';
 }*/
     echo'<div id="'.$rows['id'].'" class="more_info_btn"><a href="#">More info</a></div>'
    . '</div>'
             . '</div>';
}
//displaypetsdetails.php?id='.$rows['ad_id'].'

?></div>
         <?php include 'post-ad-part-1.php';?>
    </body>
</html>

