<!-----------------------------------------php code---------------------------------->
<?php
$showAlert = false;

if($_SERVER["REQUEST_METHOD"] == "POST"){

    include 'dbconnect.php';

    $user_name = $_POST["user_name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];

    $existSql = "SELECT * FROM `users` WHERE user_name = '$user_name'";
    $result = mysqli_query($conn, $existSql);
    $numExistRows = mysqli_num_rows($result);
    if($numExistRows > 0){
        // $exists = true;
        $showAlert = "Username Already Exists";
    }
    else{
        // $exists = false; 
        if(($password == $cpassword)){
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `users` (`user_name`, `email`, `password`, `dt`) VALUES ('$user_name','$email','$password',current_timestamp())";
            $result = mysqli_query($conn, $sql);

            header("location: LoginPageModule.php");
        }
        else{
            $showAlert = "Passwords do not match";
        }
    }
}
?>

<!-----------------------------------------html code------------------------------->
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Registeration Form</title>
  <link href="https://fonts.googleapis.com/css?family=Assistant:400,700" rel="stylesheet">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
 
  <!----------------------------------------css code-------------------------------->
<style>
body {
        background: #3db7fd;
        font-family: Assistant, sans-serif;
        justify-content: center;
      }
.register {
    background-color: #206ccf;
    position: absolute;
    top: 50%;
    left: 50%;
    width: 400px;
    padding: 35px;
    transform: translate(-50% ,-50%);
    box-shadow: 0 5px 10px #55ACEE;
    border-radius: 10px;
}
.register h1{
    margin: 0 0 30px;
    margin-bottom: 55px;
    padding: 0;
    color: #ffffff;
    text-align: center;
}
.register .box input{
    position: relative;
    width: 100%;
    font-size: 16px;
    color: #252525;
    margin-bottom: 30px;
    border: none;
    border-bottom: 1px solid #55ACEE;
    outline: none;
    background: transparent;
}
.register .box label{
    position: relative;
    left: 0;
    top: -55px;
    padding: 10px 0;
    font-size: 16px;
    color: #ffffff;
    pointer-events: none;
    transition: 0.8s;
}
.register .box input:focus~label,
.register .box input:valid~label {
    top: -85px;
    left: 0;
    color: #55ACEE;
    font-size: 16px;
}
#submit {
    padding: 10px 20px;
    background-color: #232fd8;
    color: white;
    font-size: 16px;
    text-decoration: none;
    text-align: center;
    text-transform: uppercase;
    overflow: hidden;
    transition: 0.5s;
    letter-spacing: 4px;
    border: none;
    border-radius: 5px;
    margin:auto;
    width: 11rem;
}
#submit:hover {
    background-color: #9ec7e7;
    color: #1f4eeb;
    border-radius: 5px;
    box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;
}
#register {
    font-size: 14px;
    text-decoration: none;
    color: #2947f0;    
    width: 85%;
    text-align: right;
    margin-top: -20px;
    border-radius: 5px;
    margin-left: 30px;
}
#register a {
    margin: auto;
    color: #ffffff;
    text-decoration: none;
    
}
#login {
    font-size: 14px;
    text-decoration: none;
    color: #ffffff;    
    width: 85%;
    text-align: right;
    margin-top: -20px;
    margin-left: 3.5rem;
}
#login a {
    margin: auto;
    color: #000000;
    text-decoration: none;
    
}
/* .register .box {
    margin-top: -30px;
} */
a {
    transition: 3s;
}


/* background animation */
body{
  background: #4694ec;
}
 
.circle{
  position: absolute;
  border-radius: 50%;
  background: white;
  animation: ripple 12s infinite;
  box-shadow: 0px 0px 1px 0px #50b978;
}

.small{
  width: 100px;
  height: 100px;
  left: -100px;
  bottom: -100px;
}
.medium{
  width: 300px;
  height: 300px;
  left: -200px;
  bottom: -200px;
}
.large{
  width: 500px;
  height: 500px;
  left: -300px;
  bottom: -300px;
}
.xlarge{
  width: 700px;
  height: 700px;
  left: -400px;
  bottom: -400px;
}
.xxlarge{
  width: 900px;
  height: 900px;
  left: -500px;
  bottom: -500px;
}

.shade1{
  opacity: 0.2;
}
.shade2{
  opacity: 0.5;
}
.shade3{
  opacity: 0.7;
}
.shade4{
  opacity: 0.8;
}
.shade5{
  opacity: 0.9;
}

@keyframes ripple{
  0%{
    transform: scale(0.8);
  }
  50%{
    transform: scale(1.2);
  }
  100%{
    transform: scale(0.8);
  }
}
  </style>
</head>

<body>

<!-- background haml -->
<div class="ripple-background">
  <div class="circle xxlarge shade1"></div>
  <div class="circle xlarge shade2"></div>
  <div class="circle large shade3"></div>
  <div class="circle mediun shade4"></div>
  <div class="circle small shade5"></div>
</div>

<div class="register">
    <h1><i class="uil uil-keyboard"></i>Type-runner</h1>
    <form action="/typingtest_demo/RegisterModule.php" method="post">
        <div class="box">
            <input type="text" id="username" name="user_name" required= "">
            <label for="username">Username</label><br>
        </div>
        
        <div class="box">
            <input type="email" id="mail" name="email" required="">
            <label for="email">Email</label>
        </div>

        <div class="box">    
            <input type="Password" id="password" name="password" required="">                 
            <label for="password">Password</label><br>
        </div>
        <div class="box">
            <input type="Password" id="confirm-password" name="cpassword" required="">
            <label for="cpassword">Confirm password</label>
        </div>
        
        <div class="button">
            <button id="submit" type="submit" href="#">Register</button>
            <div id="login">
                Already have an account ? 
                <a href="LoginPageModule.php">Log in</a>
            </div>
        </div>
    </form>
</div>

<!----------------------------------------------------javascript--------------------------------->
  <script>
     var btnLogin = document.getElementById('lgn');
     var idLogin = document.getElementById('login');
     var username = document.getElementById('username');
     btnLogin.onclick = function(){
      idLogin.innerHTML = '<p>We\'re happy to see you again, </p><h1>' +username.value+ '</h1>';
    }
  </script>
</body>
</html>
