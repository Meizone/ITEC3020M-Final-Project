<?php 
session_start();

include($_SERVER['DOCUMENT_ROOT'].'/PHPDependable/connection.php');
include($_SERVER['DOCUMENT_ROOT'].'/PHPDependable/functions.php');


$user_data = check_login($con);

$id = $_SESSION['user_id'];
$query = "select count(*) from food_db, chart_db where '$id' = chart_db.user_id and food_db.food_id = chart_db.food_id";
$length = mysqli_query($con,$query);

$query = "select food_db.* from food_db, chart_db where '$id' = chart_db.user_id and food_db.food_id = chart_db.food_id";
$result = mysqli_query($con,$query);

$a_f = array();
$a_c = array();
$a_p = array();

while($row = mysqli_fetch_assoc($result)) 
{
  array_push($a_f,array($row['food_item'], $row['fat']));
  array_push($a_c,array($row['food_item'], $row['carb']));
  array_push($a_p,array($row['food_item'], $row['protein']));
}
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
<input type="hidden" id="fat_data" name="fat_data" value='<?php echo json_encode($a_f);?>';>
<input type="hidden" id="carb_data" name="carb_data" value='<?php echo json_encode($a_c);?>';>
<input type="hidden" id="protein_data" name="protein_data" value='<?php echo json_encode($a_p);?>';>
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
            <div class="Chart1" id="Chart1">
              <div id="fatChart" style="width: 100%; height: 100%; margin: 5px;"></div>
            </div>
            <div class="Chart2" id="Chart2">
              <div id="carbChart" style="width: 100%; height: 100%; margin: 5px;"></div>
            </div>
            <div class="Chart3" id="Chart3">
              <div id="proteinChart" style="width: 100%; height: 100%; margin: 5px;"></div>
            </div>
            <div class="Chart4" id="detail_view">
              Click on any of the charts to view detailed data
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
  <script src="DetailViewChange.js"></script>
</html>
