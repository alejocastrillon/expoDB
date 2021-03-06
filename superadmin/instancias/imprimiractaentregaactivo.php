<?php 
session_start();
if(!isset($_SESSION['id'])||!isset($_SESSION['name'])||!isset($_SESSION['dist']))die(header("location:../../default.php"));
require_once '../class/class.activos_fosyga.php';
$carnet=ActivosFosyga::singleton();
$datosacta=$carnet->carnetizar($_GET['id']);
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
if($acta['MUNICIPIO']==20)
{
	$municipio="ALCALA";
}
else if($acta['MUNICIPIO']==41)
{
	$municipio="ANSERMANUEVO";
}
else if($acta['MUNICIPIO']==100)
{
	$municipio="BOLIVAR";
}
else if($acta['MUNICIPIO']==126)
{
	$municipio="CALIMA-DARIEN";
}
else if($acta['MUNICIPIO']==147)
{
	$municipio="CARTAGO";
}
else if($acta['MUNICIPIO']==246)
{
	$municipio="EL CAIRO";
}
else if($acta['MUNICIPIO']==318)
{
	$municipio="GUACARI";
}
else if($acta['MUNICIPIO']==400)
{
	$municipio="LA UNION";
}
else if($acta['MUNICIPIO']==497)
{
	$municipio="OBANDO";
}
else if($acta['MUNICIPIO']==823)
{
	$municipio="TORO";
}

?>
<div class="columna">
	<p>MUNICIPIO: <?=$municipio?></p>
	<p>FICHA SISBEN: <?=$acta['ficha']?></p>
	<p>VIGENCIA: INDEFINIDO</p>
</div>
<div class="columna">
	<p>DEPARTAMETO: VALLE</p>
	<p>TIPO POBLACION:</p>
</div>
<div id="contenido">
	<p>DIRECCION USUARIO: <?=$acta['direccion']?></p>
	<p>Yo, <?=$acta['Apellido_1']." ".$acta['Apellido_2']." ".$acta['Nombre_1']." ".$acta['Nombre_2']?>, identificado con <?=$acta['Tipo_Documento']?> Nº <?=$acta['Numero_Identificacion_Afil']?>, manifiesto haber recibido a satisfacción mi carnet de afiliación al Régimen Subsidiado en Salud como los de mi grupo familiar, tal como se relaciona a continuación</p>
	<table>
		<tr>
			<th>Nº</th><th>Nombres y Apellidos</th><th>Novedad</th>
		</tr>
		<tr>
			<td>1</td><td><?=$acta['Apellido_1']." ".$acta['Apellido_2']." ".$acta['Nombre_1']." ".$acta['Nombre_2']?></td><td><?=$acta['NOVEDAD']?></td>
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
		<p>Datos Adicionales: Email:______________________________________ Tel: <?=$acta['telefono']?></p>
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
</html>