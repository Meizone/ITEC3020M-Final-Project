<?php


session_start();

if(isset($_SESSION[""])){   
    unset($_SESSION[""]);
}

header("Location: /RegistrationForms/Login.php");
die();