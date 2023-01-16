<?php
require 'db/db.php';
session_start();
if(!isset($_SESSION["username"])){
  header("Location: signin.php");
  die();
}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PU Carpool</title>
    <link rel="stylesheet" href="./css/Profile.css">
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
        <div class="login-form">
          <div class="title">Profile</div>
          <div class="form">
            <form >
            <div class="input-container">
                <h3 class="pr1">Name</h3>
                <label class="ed" name="aname" required ><?php echo $_SESSION['fname'], " ", $_SESSION['lname']?></label>
                
              </div>
              <div class="input-container">
              <h3 class="pr1">UserName</h3>
                <label class="ed" name="uname" required ><?php echo $_SESSION['username']?></label>
                
              </div>
              <div class="input-container">
              <h3 class="pr1">Email</h3>
                <label class="ed" name="email" required ><?php echo $_SESSION['email']?></label>
                
              </div>
              <div class="input-container">
                <h3 class="pr1">Phone Number</h3>
                <label class="ed" name="number" required ><?php echo $_SESSION['number']?></label>
                
              </div>
              
            </form>
          </div>
        </div>
      </div>
    
</body>
</html>