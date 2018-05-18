<?php 
session_start();
if(!isset($_SESSION['id'])||!isset($_SESSION['name'])||!isset($_SESSION['dist']))die(header("location:../../default.php"));
require_once '../class/class.novedad.php';
$carnet=Novedad::singleton();
$datosacta=$carnet->Carnetizar($_GET['id'],$_GET['nov']);
?>
<html>
<head>
	<title></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="icon" type="image/ico" href="../../imagenes/favicon.ico">
	<script type="text/javascript" src="../../js/jquery-1.10.2.js"></script>
	<link rel="stylesheet" type="text/css" href="../../css/imprimiracta.css">
</head>
<script type="text/javascript">
$(document).ready(function(){
	window.print();
});
</script>
<body>
<div id="logo"></div>
<div class="header">
	<h2>AMBUQ</h2>
	<h3>ESS076</h3>
	<h3>FORMATO DE VERIFICACION DE ENTREGA DE CARNETS Y MATERIAL</h3>
	<h3>DE INFORMACION DEL USUARIO</h3>
</div>
<?php  
foreach($datosacta as $acta):
?>
<?php 
if($acta['Valor_2']==20)
{
	$municipio="ALCALA";
}
else if($acta['Valor_2']==41)
{
	$municipio="ANSERMANUEVO";
}
else if($acta['Valor_2']==100)
{
	$municipio="BOLIVAR";
}
else if($acta['Valor_2']==126)
{
	$municipio="CALIMA-DARIEN";
}
else if($acta['Valor_2']==147)
{
	$municipio="CARTAGO";
}
else if($acta['Valor_2']==246)
{
	$municipio="EL CAIRO";
}
else if($acta['Valor_2']==318)
{
	$municipio="GUACARI";
}
else if($acta['Valor_2']==400)
{
	$municipio="LA UNION";
}
else if($acta['Valor_2']==497)
{
	$municipio="OBANDO";
}
else if($acta['Valor_2']==823)
{
	$municipio="TORO";
}
switch ($acta['Tipo_Poblacion']) 
{
	case 1:
		$tipopob="Habitante de la calle";
		break;
	case 2:
		$tipopob="Poblacion a Cargo de ICBF";
		break;
	case 3:
		$tipopob="Madres Comunitarias";
		break;
	case 4:
		$tipopob="Artistas, Autores y Compositores";
		break;
	case 5:
		$tipopob="Sisbenizada";
		break;
	case 6:
		$tipopob="Menores desvinculados del conflicto armado";
		break;
	case 7:
		$tipopob="Poblacion Discapacitada";
		break;
	case 8:
		$tipopob="Poblacion Desmovilizada";
		break;
	case 9:
		$tipopob="Desplazamiento Forzado";
		break;
	case 10:
		$tipopob="Poblacion Infantil vulnerable bajo proteccion de instituciones diferentes al ICBF";
		break;
	default:
		# code...
		break;
}
?>
<div class="columna">
	<p>MUNICIPIO: <?=$municipio?></p>
	<p>FICHA SISBEN: <?=$acta['FICHA']?></p>
	<p>VIGENCIA: INDEFINIDO</p>
</div>
<div class="columna">
	<p>DEPARTAMETO: VALLE</p>
	<p>TIPO POBLACION: <?=$tipopob?></p>
</div>
<div id="contenido">
	<p>DIRECCION USUARIO: <?=$acta['DIRECCION']?></p>
	<p>Yo, <?=$acta['Apellido_1']." ".$acta['Apellido_2']." ".$acta['Nombre_1']." ".$acta['Nombre_2']?>, identificado con <?=$acta['Tipo_Documento']?> Nº <?=$acta['Numero_Identificacion_Afil']?>, manifiesto haber recibido a satisfacción mi carnet de afiliación al Régimen Subsidiado en Salud como los de mi grupo familiar, tal como se relaciona a continuación</p>
	<table>
		<tr>
			<th>Nº</th><th>Nombres y Apellidos</th><th>Novedad</th>
		</tr>
		<tr>
			<td>1</td><td><?=$acta['Apellido_1']." ".$acta['Apellido_2']." ".$acta['Nombre_1']." ".$acta['Nombre_2']?></td><td><?=$acta['Observacion']?></td>
		</tr>
	</table>
	<p>Recibi: Carnets, Red de Servicios, Plan de Beneficios, Carta de Derechos y Deberes del afiliado y del paciente y Carta de Desempeño.</p>
	<div class="othersection">
		<p>Fecha de entrega: <?=$acta['Fecha_Realizacion']?></p>
		<p>Encuesta de Verificacion de entrega de Carta Derecho y Deberes del afiliado y del paciente y Carta de Desempeño</p>
		<ol style="float:left;width:80%;font-size:11px;margin-left:-25px;">
			<li>¿Previo al diligenciamiento del formulario de afiliacion, la EPS le hizo entrega de la carta de derecho y deberes del afiliado y del paciente?</li>
			<li>¿Previo al diligenciamiento del formulario de afiliacion, la EPS le hizo entrega de la carta de desempeño donde se presenta de manera clara su pesto en el Ranking?</li>
			<li>¿Leyo el contenido de la carta de derechos y deberes del afiliado y del paciente?</li>
			<li>¿Leyo el contenido de la carta de desempeño de la EPS?</li>
			<li>¿Si tuvo alguna duda sobre el contenido de la informacion fue asesorado adecuadamente por la EPS?</li>
		</ol>
		<div style="width:15%;float:right;font-size:10px">
			<p>SI <img src="../../imagenes/CHULO.jpg">  NO___</p>
			<p>SI <img src="../../imagenes/CHULO.jpg">  NO___</p>
			<p>SI <img src="../../imagenes/CHULO.jpg">  NO___</p>
			<p>SI <img src="../../imagenes/CHULO.jpg">  NO___</p>
			<p>SI <img src="../../imagenes/CHULO.jpg">  NO___</p>
		</div>
	</div>
	<div class="huella">
		<p style="margin-top:40%">HUELLA</p>
	</div>
	<div class="datosadicionales">
		<p>Datos Adicionales: Email:______________________________________ Tel: <?=$acta['TELEFONO']?></p>
		<div class="firma" style="float:left">
			Firma Quien recibe
		</div>
		<div class="firma" style="float:right">
			Firma del funcionario que entrega
		</div>
	</div>
</div>
<?php  
endforeach;
?>
</body>