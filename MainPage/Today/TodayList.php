<?php 
session_start();

include($_SERVER['DOCUMENT_ROOT'].'/PHPDependable/connection.php');
include($_SERVER['DOCUMENT_ROOT'].'/PHPDependable/functions.php');

check_login($con);

$id = $_SESSION['user_id'];

$query = "select food_db.* from food_db, chart_db where '$id' = chart_db.user_id and food_db.food_id = chart_db.food_id";
$result = mysqli_query($con,$query);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="TodayList.css" />
  </head>
  <body>
    <div>
      <div class="siteWrap">
        <div class="sidePanel">
          <div class="upperSide">Diet Buddy</div>
          <div class="lowerSide">
            <ul class="navBar">
              <a href="/MainPage/main.php"><li>Chart</li></a>
              <a href="/MainPage/Today/TodayList.php" style="color: white"><li>Today</li></a>
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
            <div class="UserLoc">Today List</div>
            <div class="Logout"><a href="/PHPDependable/Logout.php" id="Logout">Logout</a></div>
          </div>
          <div class="mainContent">
            <table class="contentTable">
              <tr>
                <td>Food Name</td>
                <td>Fat (/100g)</td>
                <td>Carbohydrate (/100g)</td>
                <td>Protein (/100g)</td>
                <td>Remove from Today</td>
              </tr>
              <tr>
                <?php 
                $totalFat = 0;
                $totalCarb = 0;
                $totalPro = 0;
                while($row = mysqli_fetch_assoc($result)) 
                {
                  ?>
                  <td><?php echo $row['food_item']; ?></td>
                  <td><?php echo $row['fat']; ?></td>
                  <td><?php echo $row['carb']; ?></td>
                  <td><?php echo $row['protein']; ?></td>
                  <td><a onclick="return confirm('Are you sure you would like to remove <?php echo $row['food_item']; ?> from today')" href="/PHPDependable/remove_item_today.php?id=<?php echo $row['food_id']; ?>">Remove From Today</a></td>
                  <?php 
                  $totalFat += $row['fat'];
                  $totalCarb += $row['carb'];
                  $totalPro += $row['protein'];
                  ?>

                </tr>
                  <?php
                }
                ?>
                <tr>
                <td>Total</td>
                <td><?php echo $totalFat; ?></td>
                <td><?php echo $totalFat; ?></td>
                <td><?php echo $totalPro; ?></td>
                
                <td><a onclick="return confirm('Are you sure you would like to clear today')" href="/PHPDependable/clear_today.php">Clear Today</a></td>
                </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
