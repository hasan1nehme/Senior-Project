<?php
require 'db/db.php';
session_start();

$data = array();

$query = "SELECT * FROM users";
$stmt = $con->prepare($query);
$stmt->execute();
$result = $stmt->get_result();

while ($row = mysqli_fetch_array($result)){
  array_push($data, $row);
}
$stmt->close();
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PU Carpool</title>
    <link rel="stylesheet" href="./css/Findride.css">
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
      
      
        
      <?php if(isset($_SESSION['username']) && count($data) > 0){?>
        
          <form action="delete.php" method="POST">
            <div class="button-container">
              <input class='btn1' type="submit"  value="Delete My Ride(s)"/>
            </div>
          </form>
         
        <?php }?>
        <?php 
        if(count($data) != 0){
          foreach($data as $i => $val) {?>
        <div class='box1'>
        <h3 class='fi'>Name:   </h3>
        <p class='pp'><?php echo $val["fname"], ' ', $val["lname"] ?></p>
        <br></br>

        <h3 class='fi'>Location:   </h3>
        <p class='pp'><?php echo $val["location"] ?></p>
        <br></br>

        <h3 class='fi'>Available Seats:   </h3>
        <p class='pp' ><?php echo $val["seats"] ?></p>
        <br></br>

        <h3 class='fi'>Fee:   </h3>
        <p class='pp' >
          <?php
          if($val["fee"] == 'FREE'){
            echo $val["fee"];
          }
          else{
            echo $val["fee"].' L.L.';           
          }
          ?>
        
        </p>
        <br></br>

        <h3 class='fi'>Phone Number:    </h3>
        <p class='pp' ><?php echo $val["number"] ?></p>
        <br></br>

        <h3 class='fi'>Email:   </h3>
        <p class='pp'><?php echo $val["email"] ?></p>
          </div>
        
          <?php }}
            else{echo "<h4 class='box12'><p class='finaltxt'>No Available Rides</h4></div>";}
          ?>
</body>
</html>