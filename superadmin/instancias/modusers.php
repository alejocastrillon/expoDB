<?php
	session_start();
	if(!isset($_SESSION['id'])||!isset($_SESSION['name'])||!isset($_SESSION['dist']))die(header("location:default.php"));
	require_once '../class/class.usuario.php';
	$modusers=usuario::singleton();
	$modusers->moduser($_POST['nombre1'], $_POST['nombre2'], $_POST['apellido1'], $_POST['apellido2'], $_POST['fechanac'], $_POST['dpto'], $_POST['ciudad'], $_POST['codmun'], $_POST['pass'], $_POST['iduser']);
?>