<?php 
session_start();

include($_SERVER['DOCUMENT_ROOT'].'/PHPDependable/connection.php');
include($_SERVER['DOCUMENT_ROOT'].'/PHPDependable/functions.php');

check_login($con);



$_food_id=$_GET['id'];


$query = "select * from food_db where food_id = '$_food_id' limit 1";
$result = mysqli_query($con,$query);
$edit_item = mysqli_fetch_assoc($result);



if($_SERVER['REQUEST_METHOD'] == "POST")
{
  $food_id = $_POST['item_name'];
  $fat = $_POST['fat'];
  $carb = $_POST['carb'];
  $protein = $_POST['protein'];

  if(!empty($food_id))
  {
    $query = "update food_db set food_item='$food_id' ";
    if(strlen($fat) > 0)
    {
      $query .= ",fat='$fat' ";
    }
    if (strlen($carb) > 0)
    {
      $query .= ",carb='$carb' ";
    }
    if (strlen($protein) > 0)
    {
      $query .= ",protein='$protein' ";
    }
    $query .= " where food_id='$_food_id';";
    mysqli_query($con, $query) or die(mysqli_error($con));
    header("Location: /MainPage/DashboardContents/FoodList.php");
    die();
  }
  else
  {    echo'<script type="text/JavaScript"> 
    alert("Item Name must not be empty");
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
    <link rel="stylesheet" href="EditPage.css" />
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
              <a href="/MainPage/DashboardContents/FoodList.php"><li>Food List</li></a>
            </ul>
          </div>
          <div class="copyRightSide"> 
            <p>© 2024 Nathan Nguyen. Student ID: 217152695. <br>
            All rights reserved. <br>
            Website Created for ITEC3020 Program at York University</p>
          </div>
        </div>
        <div class="rightPanel" style="display: flexbox">
          <div class="upper">
            <div class="Logout"><a href="/PHPDependable/Logout.php" id="Logout">Logout</a></div>
          </div>
          <div class="mainContent">
            <form method="post">
              <div style="font-size: 30px">"<?php echo $edit_item['food_item']?>"</div>
              <div style="font-size: 15px">Data Editor</div>
              <p>Item Name</p>
              <input
                class="usernameField"
                type="text"
                name="item_name"
                placeholder="item-name"
              />
              <p>Fat Content per 100g</p>
              <input
                class="passwordField"
                type="text"
                name="fat"
                placeholder="<?php echo $edit_item['fat']?>"
              />
              <p>Carbohydrate Content per 100g</p>
              <input
                class="passwordField"
                type="text"
                name="carb"
                placeholder="<?php echo $edit_item['carb']?>"
              />
              <p>Protein Content per 100g</p>
              <input
                class="passwordField"
                type="text"
                name="protein"
                placeholder="<?php echo $edit_item['protein']?>"
              />
              <div style="margin-top: 10px">
                <input type="submit" value="edit" />
                <p>
                  <a href="/MainPage/DashboardContents/FoodList.php"
                    >Return to FoodList</a
                  >
                </p>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
