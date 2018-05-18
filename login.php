<?php 
session_start();
require_once 'class/class.loginusers.php';
$validate=LoginUsers::singleton();
$validate->Login($_POST['nameuser'],$_POST['pass'],$_POST['rol']);
?>