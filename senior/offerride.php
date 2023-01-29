<?php
require 'db/db.php';
session_start();
$errors = array();

if(!isset($_SESSION["username"])){
  header("Location: signin.php");
  die();
}

if($_SERVER['REQUEST_METHOD'] == "POST"){

  $location = $_POST['location'];
  $seats = $_POST['seats'];
  $fee = $_POST['fee'];
  $valid = true;

  if((int)$seats <= 0 || !is_int((int)$seats)){
    array_push($errors, "Seat invalid");
    $valid = false;
  }

  if($fee != ""){
    if((int)$fee <= 0 || !is_int((int)$seats)){
      array_push($errors, "Fee invalid.");
      $valid = false;
    }
  }
  else{
    $fee = "FREE";
  }

  if($valid){
    $email = $_SESSION["email"];
    $fname = $_SESSION["fname"];
    $lname = $_SESSION["lname"];
    $number = $_SESSION["number"];
    $username = $_SESSION["username"];

    $stmt = $con->prepare("INSERT INTO users (fname, lname, username, email, number, location, seats, fee) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssss", $fname, $lname, $username, $email, $number, $location, $seats, $fee);
    $stmt->execute();
  }
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PU Carpool</title>
    <link rel="stylesheet" href="./css/Offerride.css">
</head>
<body>

    <nav class="navbar">
      
        <div class="name"><img class="img1" src="./images/logo.png" alt="PU Carpool Logo"><p class='hello'>PU Carpool</p></div>
        <ul class="nav-links">
          <div class="menu">
            <li><a href="home.php">Home</a></li>
            <li><a href="findride.php">Find Ride</a></li>
            <li><a href="offerride.php">Offer Ride</a></li>
            <?php
            if(isset($_SESSION["username"])){
              echo '<li class="li1"><a href="profile.php">'.$_SESSION["username"].'</a></li>';
              echo '<li><a href="logout.php">Logout</a></li>';
            }
            else{
              echo '<li><a href="signup.php">Sign Up</a></li>
              <li><a href="signin.php">Sign In</a></li>';
            }
            ?>
          </div>
        </ul>
      </nav>

      <div class="app">
        <div class="signup-form">
          <div class="title">Offer Ride</div>
          
      <div class="form">
        <form action="offerride.php" method="POST">
            
          <div class="input-container">
            <label>Location </label>
            <input type="text" name="location" required />
          </div>

          <div class="input-container">
            <label>Available Seats </label>
            <input type="text" name="seats" required />            
          </div>

          <div class="input-container">
            <label>Fee L.L. (keep empty if no fee)</label>
            <input type="text" name="fee" />  
          </div>
          
          <div class="button-container">
            <input type="submit" />
          </div>

          <div><?php if (count($errors) != 0) { 
            foreach($errors as $e){
              echo "<h3>".$e."</h3>";
            }
            }?></div>
        </form>
      </div>
        </div>
      </div>
  </div>
    
</body>
</html>