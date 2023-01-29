<?php
session_start();
require 'db/db.php';

if($_SERVER['REQUEST_METHOD'] == "POST"){ 

    $stmt = $con->prepare("DELETE FROM users WHERE username=?");
    $stmt->bind_param("s", $_SESSION["username"]);
    $stmt->execute();

    header("Location: findride.php");
  }

?>