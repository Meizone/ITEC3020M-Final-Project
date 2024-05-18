<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "login_db";

try {
    $con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
} catch (Exception $e) {
    echo"Error". $e->getMessage() ."";
}