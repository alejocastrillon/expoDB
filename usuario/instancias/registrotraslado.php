<?php  
session_start();
if(!isset($_SESSION['id'])||!isset($_SESSION['name'])||!isset($_SESSION['dist']))die(header("location:../default.php"));
require_once '../../superadmin/class/class.traslados.php';
$traslado=traslados::singleton();
$traslado->instraslado($_POST['Tipo_Document_fosyga'],$_POST['Numero_Identificacion_Afil_fosyga'],$_POST['Apellido_1_fosyga'],$_POST['Apellido_2_fosyga'],$_POST['Nombre_1_fosyga'],$_POST['Nombre_2_fosyga'],$_POST['Fecha_Nacimiento_fosyga'],$_POST['Genero_afil_fosyga'],$_POST['Tipo_Documento'],$_POST['Numero_IdentificacionAfil'],$_POST['Apellido1'],$_POST['Apellido2'],$_POST['Nombre1'],$_POST['Nombre2'],$_POST['FechaNacimiento'],$_POST['Genero_afiliado'],$_SESSION['dist'],$_POST['zona'],$_POST['Tipopob'],$_POST['Nivel_Sisben'],$_POST['observacion'],$_POST['estado'],$_POST['EPSS'],$_POST['MUNICIPIO'],$_POST['DPTO'],$_POST['Direccion'],$_POST['Telefono'],$_POST['Ficha']);
?>