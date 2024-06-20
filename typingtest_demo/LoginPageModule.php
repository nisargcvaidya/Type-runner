<!-----------------------------------------php code---------------------------------->
<?php
session_start();
$login = false;
$showAlert = false;

if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'dbconnect.php';

    $user_name = $_POST["user_name"];
    $password = $_POST["password"];

    // Prepare statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM users WHERE user_name = ? AND password = ?");
    $stmt->bind_param("ss", $user_name, $password);
    $stmt->execute();

    // Store the result
    $result = $stmt->get_result();
    $num = $result->num_rows;

    if($num == 1){
        $login = true;
        $row = $result->fetch_assoc();
        $_SESSION['loggedin'] = true;
        $_SESSION['user_name'] = $user_name;

        header("location: experimental_html.php");
    }
    else{
        $showAlert = true;
    }

    $stmt->close();
    $conn->close();
}
?>

<!-----------------------------------------html code------------------------------->
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login Form</title>
  <link href="https://fonts.googleapis.com/css?family=Assistant:400,700" rel="stylesheet">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
 

<!----------------------------------------css code-------------------------------->
<style>
body {
        background: #61fd83;
        font-family: Assistant, sans-serif;
        justify-content: center;
      }
.login {
    background-color: #17e644;
    position: absolute;
    top: 50%;
    left: 50%;
    width: 400px;
    padding: 40px;
    transform: translate(-50% ,-50%);
    box-shadow: 0 5px 10px #000000;
    border-radius: 10px;
}
.login h1{
    margin: 0 0 30px;
    padding: 0;
    color: #ffff;
    text-align: center;
}
.login .box input{
    position: relative;
    width: 100%;
    padding: 5px 0;
    font-size: 16px;
    color: #252525;
    margin-bottom: 30px;
    border: none;
    border-bottom: 1px solid #ffffff;
    outline: none;
    background: transparent;
}
.login .box label{
    position: relative;
    left: 0;
    top: -55px;
    padding: 10px 0;
    font-size: 16px;
    color: #ffffff;
    pointer-events: none;
    transition: 0.8s;
}
.login .box input:focus~label,
.login .box input:valid~label {
    top: -85px;
    left: 0;
    color: #000000;
    font-size: 16px;
}
#submit {
    padding: 10px 20px;
    color: #252525;
    font-size: 16px;
    text-decoration: none;
    text-transform: uppercase;
    overflow: hidden;
    transition: 0.5s;
    letter-spacing: 4px;
    border: 1px solid #55ACEE;
    margin: auto;
}
#submit:hover {
    background-color: #11a83e;
    color: #FFFFFF;
    border-radius: 5px;
    box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;
}
.button {
    display: flex;
    flex-direction: row;
    margin-top: 20px;
}
#register {
    font-size: 14px;
    text-decoration: none;
    color: #ffffff;    
    width: 85%;
    text-align: right;
    margin-top: -20px;
    margin-left: 30px;
}
#register a {
    margin: auto;
    color: #000000;
    text-decoration: none;
    
}
a {
    transition: 3s;
}

/* background animation */
body{
  background: #33ff5f;
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
<!-- partial:index.partial.html -->

<!-- background haml -->
<div class="ripple-background">
  <div class="circle xxlarge shade1"></div>
  <div class="circle xlarge shade2"></div>
  <div class="circle large shade3"></div>
  <div class="circle mediun shade4"></div>
  <div class="circle small shade5"></div>
</div>


<div class="login">
    
  <h1><i class="uil uil-keyboard"></i>Type-runner</h1>
  <p>Welcome back runner...</p>
  <form action="\typingtest_demo\LoginPageModule.php" method="post">
      <div class="box">
          <input type="text" name="user_name" id="username" required="">
          <label>Username</label>                
      </div>
  
      <div class="box">
          <input type="password" name="password" id="password" required="">  
          <label>Password</label>              
      </div>
    
      <div class="'button">
          <button id="submit" type="submit" name="save">Log in</button>
          <div id="register">
          Don't have an account ? 
          <a href="RegisterModule.php">Register</a>
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
