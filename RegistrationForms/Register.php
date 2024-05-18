<?php 
session_start();

include($_SERVER['DOCUMENT_ROOT'].'/PHPDependable/connection.php');
include($_SERVER['DOCUMENT_ROOT'].'/PHPDependable/functions.php');

if($_SERVER['REQUEST_METHOD'] == "POST")
{
  $user_name = $_POST['user_name'];
  $password = $_POST['password'];

  if(!empty($user_name) && !empty($password))
  {
    $user_id = rand_num(10);
    $query = "insert into users (user_id, user_name,password) values ('$user_id', '$user_name','$password')";
    mysqli_query($con, $query) or die(mysqli_error($con));

    header("Location: /RegistrationForms/Login.php");
    die();
  }
}
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="regLog.css" />
  </head>
  <body>
    <script src="regLog.js"></script>
    <div class="siteWrapper">
      <div class="topHeader"><p>Diet Buddy</p></div>
      <div class="mainContent">
        <form method="post">
          <div style="font-size: 30px">Signup</div>
          <div style="font-size: 15px">Please fill in your credentials</div>
          <p>Username</p>
          <div style="display: flex; gap: 20px; margin-bottom: 20px">
            <input
              class="usernameField"
              type="text"
              name="user_name"
              placeholder="Username"
            />
          </div>
          <p>Password</p>
          <input
            class="passwordField"
            type="password"
            name="password"
            placeholder="password"
          />
          <div style="margin-top: 10px">
            <input type="submit" value="Signup" />
            <p>Already have an account? <a href="Login.php">Login Here</a></p>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>
