<?php  
session_start();
if(!isset($_SESSION['id'])||!isset($_SESSION['name'])||!isset($_SESSION['dist']))die(header("location:../default.php"));
require_once '../class/class.novedad.php';
$insnov=Novedad::singleton();
if($_POST['codnov']=="N01")
{
	$insnov->insnov($_POST['codnov'],strtoupper($_POST['observacion']),$_POST['tipodoc'],$_POST['iddoc'],strtoupper($_POST['apellido1']),strtoupper($_POST['apellido2']),strtoupper($_POST['nombre1']),strtoupper($_POST['nombre2']),$_POST['fechanac'],$_POST['dptoafi'],$_POST['ciudadafi'],strtoupper($_POST['valor1']),strtoupper($_POST['valor2']),strtoupper($_POST['valor3']),strtoupper($_POST['valor4']),strtoupper($_POST['direccion']),$_POST['telefono'],$_POST['ficha'],$_POST['nivel'],$_POST['tipopob'],strtoupper($_POST['zona']),strtoupper($_POST['genero']));
}
else if($_POST['codnov']=="N02"||$_POST['codnov']=="N03"||$_POST['codnov']=="N04")
{
	$insnov->insnov($_POST['codnov'],strtoupper($_POST['observacion']),$_POST['tipodoc'],$_POST['iddoc'],strtoupper($_POST['apellido1']),strtoupper($_POST['apellido2']),strtoupper($_POST['nombre1']),strtoupper($_POST['nombre2']),$_POST['fechanac'],$_POST['dptoafi'],$_POST['ciudadafi'],strtoupper($_POST['valor1']),strtoupper($_POST['valor2'])," "," ",strtoupper($_POST['direccion']),$_POST['telefono'],$_POST['ficha'],$_POST['nivel'],$_POST['tipopob'],strtoupper($_POST['zona']),strtoupper($_POST['genero']));
}
else if($_POST['codnov']=="N09")
{
	$insnov->insnov($_POST['codnov'],strtoupper($_POST['observacion']),$_POST['tipodoc'],$_POST['iddoc'],strtoupper($_POST['apellido1']),strtoupper($_POST['apellido2']),strtoupper($_POST['nombre1']),strtoupper($_POST['nombre2']),$_POST['fechanac'],$_POST['dptoafi'],$_POST['ciudadafi']," "," "," "," "," "," "," "," "," "," ");
}
else if($_POST['codnov']=="N14"||$_POST['codnov']=="N17"||$_POST['codnov']=="N20"||$_POST['codnov']=="N21") 
{
	$insnov->insnov($_POST['codnov'],strtoupper($_POST['observacion']),$_POST['tipodoc'],$_POST['iddoc'],strtoupper($_POST['apellido1']),strtoupper($_POST['apellido2']),strtoupper($_POST['nombre1']),strtoupper($_POST['nombre2']),$_POST['fechanac'],$_POST['dptoafi'],$_POST['ciudadafi'],strtoupper($_POST['valor1'])," "," "," ",strtoupper($_POST['direccion']),$_POST['telefono'],$_POST['ficha'],$_POST['nivel'],$_POST['tipopob'],strtoupper($_POST['zona']),strtoupper($_POST['genero']));
}
?>