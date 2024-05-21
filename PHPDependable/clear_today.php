<?php
session_start();

include($_SERVER['DOCUMENT_ROOT'].'/PHPDependable/connection.php');


$query = "delete from chart_db";
mysqli_query($con, $query) or die(mysqli_error($con));


header("Location: /MainPage/Today/TodayList.php");
die();