<?php 
      session_start();

      include("db_connect.php");

      if($_SERVER['REQUEST_METHOD'] == "POST") {
    
        $username = $_POST['user'];
        $password = $_POST['pass'];

        if(!empty($username) && !empty($password) && !empty($username) && !is_numeric($email)) {
            $query = "select * from users where user = '$username' limit 1";
            $result = mysqli_query($conn , $query);

            if($result) {
              if($result && mysqli_num_rows($result)>0) {
                $user_data = mysqli_fetch_assoc($result);

                if($user_data['pass'] == $password){
                  header("location: home.php");
                }
              }
            }
            echo "<script type='text/javascript'> alert('incorrect username/password!')</script>";

      }
      else {
        echo "<script type='text/javascript'> alert('incorrect username/password!')</script>";

      }
    }



?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>login to fithub</title>
  <link rel="stylesheet" href="login.css">
  <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>

  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
  <div class="wrapper">
    <form action="login.php" method="POST">
      <h1>Login</h1>
      <div class="input-box">
        <input type="text" name="user" placeholder="Username" required>
        <i class='bx bxs-user'></i>
      </div>
      <div class="input-box">
        <input type="password" name="pass" placeholder="Password" required>
        <i class='bx bxs-lock-alt' ></i>
      </div>
      <button type="submit" class="btn">Login</button>
      <div class="register-link">
        <p>Dont have an account? <a href="reg.php">Register</a></p>
      </div>
    </form>
  </div>
</body>
</html>