<?php
if (!isset($_SESSION)){
    session_start();   
}

if(!isset($_SESSION["admin"])){
    header('Location: login.php');
    exit;
}