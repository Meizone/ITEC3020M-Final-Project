<?php
session_start();

include($_SERVER['DOCUMENT_ROOT'].'/PHPDependable/connection.php');

    $food_id = $_GET['id'];
    $user_id = $_SESSION['user_id'];
    $query = "insert into chart_db (user_id, food_id) values ('$user_id', '$food_id')";
    mysqli_query($con, $query) or die(mysqli_error($con));


    $query = "select food_item from food_db where food_id = '$food_id' limit 1";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_array($result);
    $name = $row['food_item'];
    echo'<script type="text/JavaScript"> 
    localStorage.setItem("Item"," '.$name.'");
    window.location.href = "/MainPage/DashboardContents/FoodList.php";
    </script>';

