<?php
session_start();
if(!isset($_SESSION['id'])||!isset($_SESSION['name'])||!isset($_SESSION['dist']))die(header("location:default.php"));
require_once 'class/class.usuario.php';
$delete=usuario::singleton();
$delete->deleteuser($_GET['id']);
?>