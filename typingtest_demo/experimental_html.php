<?php
session_start();
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
  $loggedin = true;
}else{
  $loggedin = false;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Typing Test</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide"><!--heading font-->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css"><!--icons from icon scout for logo-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <link rel="stylesheet" type="text/css" href="experimental_css.css">

</head>

<body>
   <!---heading and logo-->
  <div class="heading"><i class="uil uil-keyboard"></i>Type-Runner</div> 

  <!--container wraps everything-->
    <div class="container">

      <div class="stats">
        <p> <i class="fa-solid fa-stopwatch fa-shake"></i> Time: <span id="timer">0s</span></p>
        <p><i class="fa-solid fa-triangle-exclamation "></i> Mistakes:  <span id="mistakes">0</span></p>
      </div>
      <div
        id="quote"
        onmousedown="return false"
        onselectstart="return false">
      </div>

  <!-- text input area -->
    <textarea
        rows="3"
        id="quote-input" 
        placeholder="Type here when the test starts..">
    </textarea>

  <!-- start-stop-reload buttons -->
    <div id="start-test">
        <button id="start" onclick="startTest()"><a class="start">Start Test</a></button> <!--js onlclick starts test-->
    </div>
    <div id="stop-test">
        <button id="stop" onclick="displayResult()"  onclick = "stop()"><a>Stop Test</a></button> <!--js onclick stops test -->
    </div>
    <div id="reload" >
        <button  type="button" onClick="window.location.reload()"><a>Reload Page</a></button> <!--reloads window evrytime user clicks on reload-->
    </div>
        <div class="result">
          <h3>Result  <i class="fa-solid fa-cog"></i></h3>
             <div class="wrapper">
               <p>Accuracy: <span id="accuracy"></span></p>
               <p>Speed: <span id="wpm"></span> wpm</p>
             </div>
        </div>
 </div>

 <!-- inbuilt login form -->
 <div class="inblt_lgn"> 
  <div id="lgbt">
    <?php
  if(!$loggedin){?>
    <a class="lgbt" href="LoginPageModule.php">Login/Sign-up</a>
  <?php } ?>

  <?php if($loggedin){ ?>
    <a class="lgbt" href="logout.php" >Logout</a>
  <?php } ?>
  </div>
</div>

 <!--light and dark themes-->
<div id="light">
   <a href="#" id="lm">light mode <i class="uil uil-sun"></i></a>
</div>
<div id="dark">
    <a href="#" id="dm">dark mode <i class="uil uil-moon"></i></a>
</div>

<!-- side navigation -->
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="#">Home <i class="uil uil-home"></i></a>
  <a href="#">About us <i class="uil uil-cloud-info"></i></a>
  <a href="#">Contact <i class="uil uil-phone"></i></a>
  <a class="text">Get your typing certificate</a>
  <a class="gold"> gold certificate</a>
  
</div>
<div class="opnicn"><span  onclick="openNav()">&#9776; Menu</span></div>

<!-- get your certificate -->
<!-- <div class="typ-cert">
  <a href="certificate_code.html" class="text">Get your typing certificate</a>
</div> -->


<div class="foot">
  <div class="socialmedia">
   <a href="#"><i class="uil uil-facebook"></i></a>
   <a href="#"><i class="uil uil-instagram"></i></a>
   <a href="#"><i class="uil uil-twitter"></i></a>
   <a href="#"><i class="uil uil-whatsapp"></i></a>
   <a href="#"><i class="uil uil-linkedin"></i></a>
  </div>
</div>

<script src="experimental_js.js"></script>
</body>
</html>

