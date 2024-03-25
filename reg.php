<?php 
session_start();

include("db_connect.php");

if($_SERVER['REQUEST_METHOD'] == "POST") {
    
    $name = $_POST['name'];
    $username = $_POST['user'];
    $email = $_POST['email'];
    $password = $_POST['pass'];
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script type='text/javascript'> alert('Invalid email format!')</script>";
    } else {
        $check_username_query = "SELECT * FROM users WHERE user='$username' LIMIT 1";
        $check_username_result = mysqli_query($conn, $check_username_query);

        $check_email_query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
        $check_email_result = mysqli_query($conn, $check_email_query);

        if(mysqli_num_rows($check_username_result) > 0) {
            echo "<script type='text/javascript'> alert('Username already exists!')</script>";
        } elseif(mysqli_num_rows($check_email_result) > 0) {
            echo "<script type='text/javascript'> alert('Email already exists!')</script>";
        } else {
            $query = "INSERT INTO users (name, user, email, pass) VALUES ('$name', '$username', '$email', '$password')";
            mysqli_query($conn, $query);
            echo "<script type='text/javascript'> alert('Registration successful!')</script>";
            header("location: login.php");
            exit();
        }
    }
}
?>


<!DOCTYPE html>
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
        <input type="text" placeholder="Name" name="name" required>
        <i class='bx bxs-user'></i>
      </div>
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
      <button type="submit" class="btn">Register</button>
      <div class="register-link">
        <p>Already have an account? <a href="login.php">Login now!</a></p>
      </div>
    </form>
  </div>
</body>
</html>
