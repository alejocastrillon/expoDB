<?php  
session_start();
if(!isset($_SESSION['id'])||!isset($_SESSION['name'])||!isset($_SESSION['dist']))die(header("location:../../default.php"));
require_once '../../superadmin/class/class.activos_fosyga.php';
$newactive=ActivosFosyga::singleton();
$newactive->insactive($_POST['tipodoc'],$_POST['numafi'],strtoupper($_POST['apellido1']),strtoupper($_POST['apellido2']),strtoupper($_POST['nombre1']),strtoupper($_POST['nombre2']),$_POST['fechanac'],$_SESSION['dist'],$_POST['fecha_afiliacion'],$_POST['ficha'],strtoupper($_POST['direccion']),$_POST['zona'],$_POST['telefono'],$_POST['sexo'],$_POST['nivelsisben']);
?>