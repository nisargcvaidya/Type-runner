<?php

// Start a new or resume an existing session
session_start();

// Check if the user is logged in
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){

    // Get the username from the session
    $user_name = $_SESSION['user_name'];

    include 'dbconnect.php';

    // Query the database to retrieve the username
    $sql = "SELECT user_name FROM users WHERE user_name = '$user_name'";
    $result = mysqli_query($conn, $sql);

    // Check if the query returned any rows
    if(mysqli_num_rows($result) > 0){

        // Fetch the row as an associative array
        $row = mysqli_fetch_assoc($result);

        // Retrieve the user_name from the row
        $user_name = $row['user_name'];

    }

    $user_info = array('user_name' => $user_name);

    $user_info_json = json_encode($user_info);

    echo "<script>var userInfo = $user_info_json;</script> ";

    // Close the connection
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="certificate_code_gold.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
<link href="https://fonts.googleapis.com/css2?family=Lobster:wght@700&display=swap" rel="stylesheet">
</head>
    <body>
        <div class="container">
          <div class="content">
          
          
            <div class="logo">
              <i class="uil uil-keyboard"></i>Type-Runner
            </div>

            <div class="marquee">
                Golden Typing certificate 
            </div>

            <div class="assignment">
                This certificate is presented by Type-runner to
            </div>

            <div class="person"></div>

            <div class="reason">
               for typing 70+ words per minute...
            </div>
        
        </div>
</div>
        <div><button id="download-button">Download as PDF</button></div>
    </body>

    <script>
        document.querySelector('.person').innerHTML = userInfo.user_name;
</script>

<script  src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js">
  
  function generatePDF() {
    // Create a new jsPDF instance
    var doc = new jsPDF();

    // Define the HTML element that will be converted to PDF
    var certificate = document.querySelector(".container");

    // Generate the PDF from the HTML element
    doc.html(certificate, {
      callback: function () {
        // Save the PDF as a file
        doc.save("typing_certificate.pdf");
      },
    });
  }

  // Attach the generatePDF function to the download button
  var downloadButton = document.getElementById("download-button");
  downloadButton.addEventListener("click", generatePDF);
</script>
</html>