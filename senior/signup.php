<?php
  require 'db/db.php';
  session_start();
  $errors = array();

  if($_SERVER['REQUEST_METHOD'] == "POST"){
    $email = $_POST["email"];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $number = $_POST["number"];
    $username = $_POST["uname"];
    $password = $_POST["password"];

    if(strlen($number) == 8){
      if(is_int((int)$number)){

        $query = "SELECT * FROM auth WHERE username=? LIMIT 1";
        $stmt = $con->prepare($query);
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result();
    
        $userCount = $result->num_rows;
        $stmt->close();
        
        if($userCount <= 0){
          
          $query1 = "SELECT * FROM auth WHERE email=? LIMIT 1";
          $stmt1 = $con->prepare($query1);
          $stmt1->bind_param('s', $email);
          $stmt1->execute();
          $result1 = $stmt1->get_result();
      
          $userCount1 = $result1->num_rows;
          $stmt1->close();

        if ($userCount1 <= 0) {
          
          $stmt = $con->prepare("INSERT INTO auth (username, password, fname, lname, email, number) VALUES (?, ?, ?, ?, ?, ?)");
          $stmt->bind_param("ssssss", $username, $password, $fname, $lname, $email, $number);

          if ($stmt->execute()) {
            header("Location: signin.php");
          } else {
            array_push($errors, "Signup failed.");
          }
        } 
        else {
          array_push($errors, "Email invalid.");
        }
        }
        else{
          array_push($errors, "Username invalid.");
        }
      }
    }
    else{
      array_push($errors, "Phone invalid.");
    }
  }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PU Carpool</title>
    <link rel="stylesheet" href="./css/Signup.css">
    
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
        <div class="title">Sign Up</div>
        
    <div class="form">
      <form action="signup.php" method="POST">
      <div class="input-container">
          <label>First Name </label>
          <input type="text" name="fname" required />
          
        </div>
        <div class="input-container">
          <label>Last Name </label>
          <input type="text" name="lname" required />
          
        </div>
        <div class="input-container">
          <label>Username </label>
          <input type="text" name="uname" required />
          
        </div>
        <div class="input-container">
          <label>Email </label>
          <input type="text" name="email" required />
          
        </div>
        <div class="input-container">
          <label>Password </label>
          <input type="text" name="password" required />
         
        </div>
        <div class="input-container">
          <label>Phone number </label>
          <input type="text" name="number" required />
          
        </div>
        <div class="button-container">
          <input type="submit" />
        </div>
        <div><?php if (count($errors) != 0) { 
            foreach($errors as $e){
              echo "<h3 class='ty'>".$e."</h3>";
            }
            }?></div>
      </form>
    </div>
      </div>
    </div>
</div>
    
</body>
</html>