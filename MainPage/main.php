<?php 
session_start();

include($_SERVER['DOCUMENT_ROOT'].'/PHPDependable/connection.php');
include($_SERVER['DOCUMENT_ROOT'].'/PHPDependable/functions.php');


$user_data = check_login($con);

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <div class="container">
      <div class="siteWrap">
        <div class="sidePanel">
          <div class="upperSide">Diet Buddy</div>
          <div class="lowerSide">
            <ul class="navBar">
              <a href="/MainPage/main.php" style="color: white"><li>Dashboard</li></a>
              <a href=""><li>Chart</li></a>
              <a href="/MainPage/Today/TodayList.php"><li>Today</li></a>
              <a href="/MainPage/DashboardContents/FoodList.php"><li>Food List</li></a>
            </ul>
          </div>
        </div>
        <div class="rightPanel">
          <div class="upper">
            <div class="UserLoc">Dashboard</div>
            <a href="/PHPDependable/Logout.php" class="Logout" id="Logout">Logout</a>
          </div>
          <div class="mainContent">
            <div class="card1"></div>
            <div class="card2"></div>
            <div class="card3"></div>
          </div>
        </div>
      </div>
      <div class="bottomCopyright">Test</div>
    </div>
  </body>
</html>
