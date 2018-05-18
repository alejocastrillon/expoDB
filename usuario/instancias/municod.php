<?php
	session_start();
	if(!isset($_SESSION['id'])||!isset($_SESSION['name'])||!isset($_SESSION['dist']))die(header("location:default.php"));
	require_once '../class/class.municipios.php';
	$municipios=municipios::singleton();
	$municipios->getmuni($_GET['cod']);
?>