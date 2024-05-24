<?php 
session_start();

include($_SERVER['DOCUMENT_ROOT'].'/PHPDependable/connection.php');
include($_SERVER['DOCUMENT_ROOT'].'/PHPDependable/functions.php');

check_login($con);



if($_SERVER['REQUEST_METHOD'] == "POST")
{
  $food_id = $_POST['item_name'];
  $fat = $_POST['fat'];
  $carb = $_POST['carb'];
  $protein = $_POST['protein'];

  if(!empty($food_id))
  {
    $query = "insert into food_db(food_item, fat, carb, protein) VALUES ('$food_id','$fat','$carb','$protein')";
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
    <link rel="stylesheet" href="AddPage.css" />
  </head>
  <body>
    <div>
      <div class="siteWrap">
        <div class="sidePanel">
          <div class="upperSide">
          <img src="/Logo/Logo.PNG" alt="Logo Image">
          </div>
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
              <div style="font-size: 30px">"Add New Item"</div>
              <div style="font-size: 15px">Enter details below</div>
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
                placeholder="fat"
              />
              <p>Carbohydrate Content per 100g</p>
              <input
                class="passwordField"
                type="text"
                name="carb"
                placeholder="Carbohydrate"
              />
              <p>Protein Content per 100g</p>
              <input
                class="passwordField"
                type="text"
                name="protein"
                placeholder="Protein"
              />
              <div style="margin-top: 10px">
                <input type="submit" value="Add" />
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
