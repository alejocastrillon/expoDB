<?php  
session_start();
if(!isset($_SESSION['id'])||!isset($_SESSION['name'])||!isset($_SESSION['dist']))die(header("location:../default.php"));
require_once 'class/class.novedad.php';
$insnov=Novedad::singleton();
if($_POST['codnov']=="N01")
{
	$insnov->insnov($_POST['codnov'],$_POST['observacion'],$_POST['tipodoc'],$_POST['iddoc'],$_POST['apellido1'],$_POST['apellido2'],$_POST['nombre1'],$_POST['nombre2'],$_POST['fechanac'],$_POST['dptoafi'],$_POST['ciudadafi'],$_POST['valor1'],$_POST['valor2'],$_POST['valor3'],$_POST['valor4'],$_POST['direccion'],$_POST['telefono'],$_POST['ficha'],$_POST['nivel'],$_POST['formulario'],$_POST['tipopob']);
}
else if($_POST['codnov']=="N02"||$_POST['codnov']=="N03"||$_POST['codnov']=="N04")
{
	$insnov->insnov($_POST['codnov'],$_POST['observacion'],$_POST['tipodoc'],$_POST['iddoc'],$_POST['apellido1'],$_POST['apellido2'],$_POST['nombre1'],$_POST['nombre2'],$_POST['fechanac'],$_POST['dptoafi'],$_POST['ciudadafi'],$_POST['valor1'],$_POST['valor2'],"","",$_POST['direccion'],$_POST['telefono'],$_POST['ficha'],$_POST['nivel'],$_POST['formulario'],$_POST['tipopob']);
}
else if($_POST['codnov']=="N09")
{
	$insnov->insnov($_POST['codnov'],$_POST['observacion'],$_POST['tipodoc'],$_POST['iddoc'],$_POST['apellido1'],$_POST['apellido2'],$_POST['nombre1'],$_POST['nombre2'],$_POST['fechanac'],$_POST['dptoafi'],$_POST['ciudadafi'],"","","","","","","","","","");
}
else if($_POST['codnov']=="N14"||$_POST['codnov']=="N17"||$_POST['codnov']=="N20"||$_POST['codnov']=="N21") 
{
	$insnov->insnov($_POST['codnov'],$_POST['observacion'],$_POST['tipodoc'],$_POST['iddoc'],$_POST['apellido1'],$_POST['apellido2'],$_POST['nombre1'],$_POST['nombre2'],$_POST['fechanac'],$_POST['dptoafi'],$_POST['ciudadafi'],$_POST['valor1'],"","","","","","","","","");
}
?>