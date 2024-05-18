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
    $query = "select * from users where user_name = '$user_name' limit 1";

    $result = mysqli_query($con, $query);
    if(mysqli_num_rows($result) > 0)
    {
      $user_data = mysqli_fetch_assoc($result);
      if(($user_data)['password'] === $password)
      {
        $_SESSION['user_id'] = $user_data['user_id'];
        header("Location: /MainPage/main.php");
        die();
      }
    }
    echo'<script type="text/JavaScript"> 
    alert("Username or Password was incorrect");
    </script>';
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
    <div class="siteWrapper">
      <div class="topHeader"><p>Diet Buddy</p></div>
      <div class="mainContent">
        <form method="post">
          <div style="font-size: 30px">Login</div>
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
            <input type="submit" value="Login" />
            <p>Don't have an account? <a href="Register.php">Sign up Here</a></p>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>
