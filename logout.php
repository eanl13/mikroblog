<?php
session_start();
include_once 'Login.php';

$Login = new Login();

$logoutResult = $Login->logout();//true veya false döner

if ( $logoutResult == true ){
    header('Location: '. 'index.php');
    exit;
}