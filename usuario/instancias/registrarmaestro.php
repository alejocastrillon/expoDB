<?php 
session_start();
if(!isset($_SESSION['id'])||!isset($_SESSION['name'])||!isset($_SESSION['dist']))die(header("location:../../default.php"));
require_once '../../superadmin/class/class.maestro.php';
$insmaster=Maestro::singleton();
$insmaster->insmaestro($_POST['ccmadre'],$_POST['tipodocumento'],$_POST['numeroafiliado'],strtoupper($_POST['apellido1']),strtoupper($_POST['apellido2']),strtoupper($_POST['nombre1']),strtoupper($_POST['nombre2']),$_POST['fechanac'],$_POST['genero'],$_SESSION['dist'],$_POST['zona'],$_POST['tipopob'],$_POST['nivel'],strtoupper($_POST['observacion']),strtoupper($_POST['direccion']),$_POST['telefono'],$_POST['ficha']);
?>