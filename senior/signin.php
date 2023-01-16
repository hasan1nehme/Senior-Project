
<?php
  require 'db/db.php';
  session_start();
  $errors = array();

  if($_SERVER['REQUEST_METHOD'] == "POST"){
    $userdata = array();

    $username = $_POST["uname"];
    $password = $_POST["password"];

    $query = "SELECT * FROM auth WHERE username=? LIMIT 1";
    $stmt = $con->prepare($query);
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_array(MYSQLI_ASSOC)){
      array_push($userdata, $row);
    }
    $userCount = $result->num_rows;
    $stmt->close();
    
    if($userCount > 0){
      $valid = false; 

      $query = "SELECT * FROM auth WHERE password=? AND username=? LIMIT 1";
      $stmt = $con->prepare($query);
      $stmt->bind_param('ss', $password, $username);
      $stmt->execute();

      $result = $stmt->get_result();
      $passCount = $result->num_rows;
      $stmt->close();

      if($passCount > 0){
        $valid = true;
      }

      if($valid){
        $_SESSION["username"] = $userdata[0]["username"];
        $_SESSION["number"] = $userdata[0]["number"];
        $_SESSION["email"] = $userdata[0]["email"];
        $_SESSION["fname"] = $userdata[0]["fname"];
        $_SESSION["lname"] = $userdata[0]["lname"];

        header("Location: home.php");
      }
      else{
        array_push($errors, "Wrong credentials!");
      }
    }
    else{
      array_push($errors, "Wrong credentials!");
    }
  }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PU Carpool</title>
    <link rel="stylesheet" href="./css/Signin.css">
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
          <div class="title">Sign In</div>
      <div class="form">
        <form action="signin.php" method="POST">
        <div class="input-container">
            <label>User Name </label>
            <input type="text" name="uname" required />
            
          </div>
          <div class="input-container">
            <label>Password </label>
            <input type="text" name="password" required />
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