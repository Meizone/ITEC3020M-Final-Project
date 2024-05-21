<?php 
session_start();

include($_SERVER['DOCUMENT_ROOT'].'/PHPDependable/connection.php');
include($_SERVER['DOCUMENT_ROOT'].'/PHPDependable/functions.php');

check_login($con);

$query = "select * from food_db";
$result = mysqli_query($con,$query);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="FoodList.css" />
  </head>
  <body>
    <div>
      <div class="siteWrap">
        <div class="sidePanel">
          <div class="upperSide">Diet Buddy</div>
          <div class="lowerSide">
            <ul class="navBar">
            <a href="/MainPage/main.php"><li>Chart</li></a>
              <a href="/MainPage/Today/TodayList.php"><li>Today</li></a>
              <a href="/MainPage/DashboardContents/FoodList.php"><li style="color: white;">Food List</li></a>
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
            <div class="UserLoc">Food List</div>
            <div class="Logout"><a href="/PHPDependable/Logout.php" id="Logout">Logout</a></div>
          </div>
          <div style="display: flex; align-items: center; width: 100%; align-content: center; left:300px;"><a href="/MainPage/Add/AddPage.php" style="margin:auto;">Add New Item</a></div>
          <div class="mainContent">
            <table class="contentTable">
              <tr>
                <td>Food Name</td>
                <td>Fat (/100g)</td>
                <td>Carbohydrate (/100g)</td>
                <td>Protein (/100g)</td>
                <td>Edit</td>
                <td>Delete</td>
                <td>Add to Today</td>
              </tr>
              <tr>
                <?php 
                
                while($row = mysqli_fetch_assoc($result)) 
                {
                  ?>
                  <td><?php echo $row['food_item']; ?></td>
                  <td><?php echo $row['fat']; ?></td>
                  <td><?php echo $row['carb']; ?></td>
                  <td><?php echo $row['protein']; ?></td>
                  <td><a href="/MainPage/Edit/EditPage.php?id=<?php echo $row['food_id']; ?>">Edit</a></td>
                  <td><a onclick="return confirm('Are you sure you would like to delete <?php echo $row['food_item']; ?> ')" href="/PHPDependable/delete_item.php?id=<?php echo $row['food_id']; ?>">Delete</a></td>
                  <td><a href="/PHPDependable/AddToday.php?id=<?php echo $row['food_id']; ?>">Add</a></td>
                </tr>
                  <?php
                }
                ?>
            </table>
            <div class="Feedback_Layer">
              <script type="text/JavaScript">
                var itemAdded = localStorage.getItem("Item");

                console.log(itemAdded);
                if(itemAdded)
                {
                  var layer = document.querySelector('.Feedback_Layer');
                  var paragraph = document.createElement('p');
                  paragraph.textContent = "Item Successfully Added: " + itemAdded;
                  layer.appendChild(paragraph);
                }
              </script>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
