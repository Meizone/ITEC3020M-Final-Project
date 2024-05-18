<?php
session_start();

include($_SERVER['DOCUMENT_ROOT'].'/PHPDependable/connection.php');
include($_SERVER['DOCUMENT_ROOT'].'/PHPDependable/functions.php');

if(isset($_GET['id'])){   
    $food_id = $_GET['id'];

    $query = "delete from food_db where food_id ='$food_id'";
    mysqli_query($con, $query) or die(mysqli_error($con));
}

header("Location: /MainPage/DashboardContents/FoodList.php");
die();