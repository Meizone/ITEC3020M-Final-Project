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
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript"></script>
    <script src="chartScript.js"></script>
  </head>
  <body>
    <div>
      <div class="siteWrap">
        <div class="sidePanel">
          <div class="upperSide">Diet Buddy</div>
          <div class="lowerSide">
            <ul class="navBar">
              <a href="/MainPage/main.php"><li style="color: white;">Chart</li></a>
              <a href="/MainPage/Today/TodayList.php"><li>Today</li></a>
              <a href="/MainPage/DashboardContents/FoodList.php"><li>Food List</li></a>
            </ul>
          </div>
          <div class="copyRightSide"> 
            <p>© 2024 Nathan Nguyen. Student ID: 217152695. <br>
            All rights reserved. <br>
            Website Created for ITEC3020 Program at York University</p>
          </div>
        </div>
        <div class="rightPanel">
          <div class="upper">
            <div class="UserLoc">Chart Breakdown</div>
            <div class="Logout"><a href="/PHPDependable/Logout.php" id="Logout">Logout</a></div>
          </div>
          <div class="mainContent">
            <div class="Chart1">
              <div id="fatChart" style="width: 100%; height: 100%; margin: 5px;"></div>
            </div>
            <div class="Chart2">
              <div id="carbChart" style="width: 100%; height: 100%; margin: 5px;"></div>
            </div>
            <div class="Chart3">
              <div id="proteinChart" style="width: 100%; height: 100%; margin: 5px;"></div>
            </div>
            <div class="Chart4"></div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
