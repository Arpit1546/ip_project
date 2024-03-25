<?php 
  session_start();

  include("db_connect.php");

  if($_SERVER['REQUEST_METHOD'] == "POST") {
    
    $username = $_POST['user'];
    $email = $_POST['email'];
    $password = $_POST['pass'];
    
    if(!empty($username) && !empty($password) && !empty($username) && !is_numeric($email)) {
      $query = "insert into users (user, email, pass) values ('$username', '$email', '$password')";

      mysqli_query($conn, $query);

      echo "<script type='text/javascript'> alert('Registration successfull')</script>";
    }
    else {
      echo "<script type='text/javascript'> alert('Enter valid credentials')</script>";

    }
    

  }


?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>register on fithub</title>
  <link rel="stylesheet" href="login.css">
  <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>

  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
  <div class="wrapper">
    <form method="POST">
      <h1>Register</h1>
      <div class="input-box">
        <input type="text" placeholder="Username" name="user" required>
        <i class='bx bxs-user'></i>
      </div>

      <div class="input-box">
        <input type="text" placeholder="Email" name="email" required>
        <i class='bx bx-envelope'></i>
      </div>
      
      <div class="input-box">
        <input type="password" placeholder="Password" name="pass" required>
        <i class='bx bxs-lock-alt' ></i>
      </div>
      
      <button type="submit" class="btn">Login</button>
      <div class="register-link">
        <p>Already have an account? <a href="login.php">Login now!</a></p>
      </div>
    </form>
  </div>
</body>
</html>
