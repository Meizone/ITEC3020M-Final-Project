<?php
session_start();

include($_SERVER['DOCUMENT_ROOT'].'/PHPDependable/connection.php');

    $food_id = $_GET['id'];
    $user_id = $_SESSION['user_id'];
    $query = "insert into chart_db (user_id, food_id) values ('$user_id', '$food_id')";
    mysqli_query($con, $query) or die(mysqli_error($con));
header("Location: /MainPage/DashboardContents/FoodList.php");
die();