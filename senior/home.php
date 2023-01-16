<?php
session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PU Carpool</title>
    <link rel="stylesheet" href="./css/Home.css">
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

    <h1 class='intr'>Welcome to PU Carpool!</h1>
      <img class="img2" src="./images/pulogo.png" alt="Phonicia University Logo">

        <h1 class='heading'>What is PU Carpool?</h1>
        <h3 class='tex'>PU Carpool is a website developed to help Phoenicia University students 
        find rides to and from the university with other students.
        </h3>

        <hr class="hr1" ></hr>

        <h1 class='heading1'>How do i find a ride?</h1>
        <h3 class='tex'>On PU Carpool, finding a ride is really simple, you dont even need to sign 
        in! Just click on the 'Find Ride' item in the navigation bar and you will be able to find all 
        the available rides with the name, location, available seats, fee (if there is one), phone 
        number and email of the driver.
        </h3>

        <hr class="hr1" ></hr>

        <h1 class='heading1'>How do i offer a ride?</h1>
        <h3 class='tex1'>To offer A ride, first you will have to sign up, then sign in, then press
        the 'Offer Ride' item in the navigation bar. there, you will be asked to fill in some 
        information. To edit your ride, just go to the Find Ride page and press 'Delete My Ride' 
        to delete your offered ride, then go back to the Offer Ride page and add a new ride.

        </h3>

        <br></br>

</body>
</html>