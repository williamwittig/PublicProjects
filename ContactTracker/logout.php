<?php
session_start();
if(!isset($_SESSION['user'])){
    require("includes/functions.php");
    header("Location: https://capulus-bibemus.greenriverdev.com/305-Team/MedContact/login.php");
    exit();
}else{
    $_SESSION = [];
    session_destroy();
    setcookie('PHPSESSID', '', time()-3600, '/', '',0 , 0);
    header("Location: https://capulus-bibemus.greenriverdev.com/305-Team/MedContact/loggedout.php");
}