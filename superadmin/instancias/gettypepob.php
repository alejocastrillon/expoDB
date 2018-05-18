<?php 
session_start();
if(!isset($_SESSION['id'])||!isset($_SESSION['name'])||!isset($_SESSION['dist']))die(header("location:default.php"));
require_once '../class/class.tipo_pob.php';
$codpob=tipo_pob::singleton();
$datapob=$codpob->getpob();
echo $datapob;
?>