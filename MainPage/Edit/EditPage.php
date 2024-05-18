<?php 
session_start();

include($_SERVER['DOCUMENT_ROOT'].'/PHPDependable/connection.php');
include($_SERVER['DOCUMENT_ROOT'].'/PHPDependable/functions.php');

check_login($con);

$query = "select * from food_db";
$result = mysqli_query($con,$query);

$_SESSION['id']=$_GET['id'];
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="EditPage.css" />
  </head>
  <body>
    <div>
      <div class="siteWrap">
        <div class="sidePanel">
          <div class="upperSide">Diet Buddy</div>
          <div class="lowerSide">
            <ul class="navBar">
              <a href=""><li>Dashboard</li></a>
              <a href=""><li>Chart</li></a>
              <a href=""><li>Today</li></a>
              <a href=""><li style="color: white">Food List</li></a>
            </ul>
          </div>
        </div>
        <div class="rightPanel">
          <div class="upper">
            <div class="UserLoc">Food List</div>
            <a href="/PHPDependable/Logout.php" class="Logout" id="Logout"
              ><div>Logout</div></a>
            >
          </div>
          <div class="mainContent" style="color: black"> <?php echo $_SESSION['id'];?></div>
        </div>
      </div>
    </div>
  </body>
</html>
