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
    <script src="FoodList.js"></script>
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
            <a href="/PHPDependable/Logout.php" class="Logout" id="Logout"><div>Logout</div></a>
          </div>
          <div class="mainContent">
            <table class="contentTable">
              <tr>
                <td>Food Name</td>
                <td>Fat (/100g)</td>
                <td>Carbohydrate (/100g)</td>
                <td>Protein (/100g)</td>
                <td>Edit</td>
                <td>Delete</td>
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
                </tr>
                  <?php
                }
                ?>
              
            </table>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
