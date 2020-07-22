<?php 
session_start();
require 'connection.php';       
?>
<html>   
<head>
    <?php include 'dependencies.php'; ?>
<style>
    
*{
  box-sizing: border-box;
}

.mySlides img {
  vertical-align: middle;
  height: 550px;
  box-shadow: 0 3px 6px rgba(0,0,0,0.10), 0 3px 6px rgba(0,0,0,0.10);
  
}

.container{
    margin-top: 110px;
}


@media (max-width:990px) {
    .mySlides img{
    width:100%;
    height: auto;
    }
    
   .container{
    margin-top: 80px;
}
    
   }

/* Position the image container (needed to position the left and right arrows) */
.container {
  position: relative;
  display: flex;
  justify-content: center;
  align-content: center;
  flex-direction: column;
}

/* Hide the images by default */
.mySlides {
  display: none;
  justify-content: center;
  margin: 20px;
 
}

/* Add a pointer when hovering over the thumbnail images */
.cursor {
  cursor: pointer;
}




/* Six columns side by side */
.img-row {
  display: flex;
  justify-content: center;
}

.img-column img{
    height: 100px;
    box-shadow: 0 3px 6px rgba(0,0,0,0.10), 0 3px 6px rgba(0,0,0,0.10);
}

@media (max-width:990px) {
    .img-column img{
        height: 50px;
        
    }
            }

/* Add a transparency effect for thumnbail images */
.demo {
  opacity: 0.6;
}

.active,
.demo:hover {
  opacity: 1;
}

.side{
    padding-right: 50px;
}

@media (max-width:990px) {
    .side{
    padding-right: 15px;
}
            }

.shape{
    margin: 20px 0px;
    padding: 20px;
    width: 100%;
   
    background-color:#FBF4DE;
}
.details div {
    display: flex;
    width:  100%;
}

.details h4{
    font-size: 30px;
    font-weight: bold;
    padding-bottom: 20px;
    color: #F9575C;
    text-transform: capitalize;
}

.details div span{
    color: #F9BE4F;
    margin-right: 20px;
    font-weight: bold;
    font-size: 15px;
}

.description h4{
    font-size: 20px;
    font-weight: bold;
    line-height: 40px;
    color:#F9BE4F;
    border-bottom:  #F9575C 2px solid;
}

.description p{
    font-size:  17px;
}

.about_and_rules{
    margin: 0  40px;
}

@media (max-width:990px) {
    .about_and_rules{
    margin: 0  0px;
}

.top-margin{
    margin-top:20px;
}
            }
</style>
</head>
<body>

 <?php
            require 'header.php';
           ?> 
        <div id="dynamic_content">
            
        </div>
<?php 

$query="SELECT * FROM ad_info where ad_id = '".$_GET['id']."'";
$result = mysqli_query( $connection,$query) 
  or die ($query. " ".mysqli_error($connection));

$img_urls = Array(5);
$index=0;
while($rows=mysqli_fetch_array($result))
 {
    $query = "SELECT image_url FROM ad_images where ad_id='" . $rows['ad_id'] . "'";
    $result_image = mysqli_query($connection, $query)
            or die($query . " " . mysqli_error($connection));
 
?>
<div class="container col-xs-12 col-sm-12 col-md-6 col-lg-6 column">
    <?php while ($url = mysqli_fetch_array($result_image)) { $img_urls[$index++]=$url['image_url'];?>
  <div class="mySlides">
      <img src="uploads/<?php echo $url['image_url']; ?>" >
  </div>
    <?php }?>


  <div class="img-row">
      <?php $i=0;while ($i<$index) {?>
    <div class="img-column">
        <img class="demo cursor" src="uploads/<?php echo $img_urls[$i]; ?>"  onclick="currentSlide(<?php echo ++$i; ?>)" >
    </div>
      <?php }?>   
  </div>
    
</div>
    
    <div class=" top-margin side container col-xs-12 col-sm-12 col-md-6 col-lg-6 column">
        <div class="shape details">
        <h4> <?php echo $rows['pet_name']; ?></h4>
        <div> <span>Breed :</span> <p><?php echo $rows['breed']; ?> </p></div>
        <div> <span>Age :</span> <p><?php echo $rows['age'].' '.$rows['age_type']; ?></p></div>
        <div> <span>Weight (KGs):</span> <p>
            <?php switch ($rows['weight'])
                {
                    case -1 : echo 'Unknown';break;
                    default : echo $rows['weight'];
                } ?> 
            </p></div>
        <div> <span>Size :</span> <p><?php 
                switch ($rows['size'])
                {
                    case 0 : echo 'Small';break;
                    case 1 : echo 'Medium';break;
                    case 2 : echo 'Large';break;
                }
         
        ?> </p></div>
        <div> <span>Vaccinated :</span> <p><?php 
        switch ($rows['vaccinated'])
                {
                    case -1 : echo 'Unknown';break;
                    case 0 : echo 'No';break;
                    case 1 : echo 'Yes';break;
                }
        ?> </p></div>
        <div> <span>Nurtured :</span> <p><?php 
        switch ($rows['neutured'])
                {
                    case -1 : echo 'Unknown';break;
                    case 0 : echo 'No';break;
                    case 1 : echo 'Yes';break;
                }
        ?> </p></div>
        <div> <span>Address :</span> <p><?php echo $rows['city_village'].', '.$rows['district'].', '.$rows['state']; ?> </p></div>
        <?php if(isset($_SESSION['email'])){ 
            $email=$_SESSION['email'];
            $email = str_replace('@', '[at]', $email);
            $email = str_replace('.', '[dot]', $email);
        
        ?>
          <div> <span>Email :</span> <p><?php  echo $email; ?> </p></div>
       <?php } else {?>
          <div> <span>Email :</span> <p>Login/Signup to view</p></div>
       <?php } ?>
        </div>
        <?php
        if(trim($rows['description']) != '')
        {
        ?>
        <div class="shape description">
            <h4> Description </h4>
            <p><?php echo $rows['description']; ?> </p>
        </div>
        <?php
        }
        ?>
    </div>

     <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 column">
       <div class = "about_and_rules">
                     <?php 
        if(trim($rows['about_pet']) != '')
        {
        ?>

        <div class="shape description ">
            <h4> About Pet </h4>
            <p> <?php echo $rows['about_pet']; ?></p>
        </div>
         <?php
        } 
                     if(trim($rows['adoption_rules']) != '')
        {
        ?>
           <div class="shape description " style="margin-top: 40px;">
            <h4> Adoption Rules </h4>
            <p> <?php echo $rows['adoption_rules']; ?></p>
        </div>
                     <?php
        }
                     ?>
         </div>
    </div>
    <?php 
 }
    ?>
<script>
var slideIndex = 1;
showSlides(slideIndex);

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "flex";
  dots[slideIndex-1].className += " active";
}
</script>
  
 <?php include 'post-ad-part-1.php';?>
</body>
</html>
