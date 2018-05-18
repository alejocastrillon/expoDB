<?php 
session_start();
if(!isset($_SESSION['id'])||!isset($_SESSION['name'])||!isset($_SESSION['dist']))die(header("location:../../default.php"));
require_once '../class/class.traslados.php';
$carnet=traslados::singleton();
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
if($acta['Codigo_Mpio_afi']==20)
{
	$municipio="ALCALA";
}
else if($acta['Codigo_Mpio_afi']==41)
{
	$municipio="ANSERMANUEVO";
}
else if($acta['Codigo_Mpio_afi']==100)
{
	$municipio="BOLIVAR";
}
else if($acta['Codigo_Mpio_afi']==126)
{
	$municipio="CALIMA-DARIEN";
}
else if($acta['Codigo_Mpio_afi']==147)
{
	$municipio="CARTAGO";
}
else if($acta['Codigo_Mpio_afi']==246)
{
	$municipio="EL CAIRO";
}
else if($acta['Codigo_Mpio_afi']==318)
{
	$municipio="GUACARI";
}
else if($acta['Codigo_Mpio_afi']==400)
{
	$municipio="LA UNION";
}
else if($acta['Codigo_Mpio_afi']==497)
{
	$municipio="OBANDO";
}
else if($acta['Codigo_Mpio_afi']==823)
{
	$municipio="TORO";
}
switch ($acta['Tipo_Poblacion_Beneficiarios_subsidio']) 
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
	<p>FICHA SISBEN: <?=$acta['Ficha']?></p>
	<p>VIGENCIA: INDEFINIDO</p>
</div>
<div class="columna">
	<p>DEPARTAMETO: VALLE</p>
	<p>TIPO POBLACION: <?=$tipopob?></p>
</div>
<div id="contenido">
	<p>DIRECCION USUARIO: <?=$acta['Direccion']?></p>
	<p>Yo, <?=$acta['Apellido1']." ".$acta['Apellido2']." ".$acta['Nombre1']." ".$acta['Nombre2']?>, identificado con <?=$acta['TipoDocumento']?> Nº <?=$acta['Numero_IdentificacionAfil']?>, manifiesto haber recibido a satisfacción mi carnet de afiliación al Régimen Subsidiado en Salud como los de mi grupo familiar, tal como se relaciona a continuación</p>
	<table>
		<tr>
			<th>Nº</th><th>Nombres y Apellidos</th><th>Novedad</th>
		</tr>
		<tr>
			<td>1</td><td><?=$acta['Apellido1']." ".$acta['Apellido2']." ".$acta['Nombre1']." ".$acta['Nombre2']?></td><td><?=$acta['OBSERVACION']?></td>
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
		<p>Datos Adicionales: Email:______________________________________ Tel: <?=$acta['Telefono']?></p>
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