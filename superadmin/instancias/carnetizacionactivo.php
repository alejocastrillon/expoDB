<?php 
session_start();
if(!isset($_SESSION['id'])||!isset($_SESSION['name'])||!isset($_SESSION['dist']))die(header("location:../../default.php"));
require_once '../class/class.activos_fosyga.php';
$carnet=ActivosFosyga::singleton();
$newcarnet=$carnet->carnetizar($_GET['id']);
?>
<html>
<head>
	<title></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="icon" type="image/ico" href="../../imagenes/favicon.ico">
	<script type="text/javascript" src="../../js/jquery-1.10.2.js"></script>
	<script type="text/javascript" src="../../js/jquery-ui-1.10.4.custom.js"></script>
	<link rel="stylesheet" type="text/css" href="../../css/imprimircarnet.css">
	<link rel="stylesheet" type="text/css" href="../../css/jquery-ui-1.10.4.custom.css" media="screen">
	<style type="text/css" media="print">
	button{
		display: none;
	}
	</style>
	<script type="text/javascript">
	$(document).ready(function(){
		window.print();
		$("button").button({
			icons:{
				primary:"ui-icon-print"
			}
		});
	});
	function FormActivo(id)
	{
		window.location.assign("imprimirformactivo.php?id="+id);
	}
	</script>
</head>
<body>
	<button onClick="FormActivo($('#numafili').html())">Imprimir formulario</button>
	<div id="contenedoracarnet">
		<?php  
		foreach ($newcarnet as $datacarnet) 
		{
			echo "<p id='numcarnet'>".$datacarnet['numero_carnet']."</p>";
			echo "<div id='nombreapellido'>".strtoupper($datacarnet['Apellido_1']." ".$datacarnet['Apellido_2']." ".$datacarnet['Nombre_1']." ".$datacarnet['Nombre_2'])."</div>";
			echo "<div id='discapacidades'>N</div>";
			echo "<div id='numafili'>".$datacarnet['Numero_Identificacion_Afil']."</div>";
			echo "<div id='tipodoc'>".$datacarnet['Tipo_Documento']."</div>";
			echo "<div id='nivel'>".$datacarnet['nivelsisben']."</div>";
			echo "<div id='zona'>".$datacarnet['zona']."</div>";
			echo "<div id='vigencia'>INDEFINIDO</div>";
			if($datacarnet['MUNICIPIO']==20)
			{
				$municipio="ALCALA";
			}
			else if($datacarnet['MUNICIPIO']==41)
			{
				$municipio="ANSERMANUEVO";
			}
			else if($datacarnet['MUNICIPIO']==100)
			{
				$municipio="BOLIVAR";
			}
			else if($datacarnet['MUNICIPIO']==126)
			{
				$municipio="CALIMA-DARIEN";
			}
			else if($datacarnet['MUNICIPIO']==147)
			{
				$municipio="CARTAGO";
			}
			else if($datacarnet['MUNICIPIO']==246)
			{
				$municipio="EL CAIRO";
			}
			else if($datacarnet['MUNICIPIO']==318)
			{
				$municipio="GUACARI";
			}
			else if($datacarnet['MUNICIPIO']==400)
			{
				$municipio="LA UNION";
			}
			else if($datacarnet['MUNICIPIO']==497)
			{
				$municipio="OBANDO";
			}
			else if($datacarnet['MUNICIPIO']==823)
			{
				$municipio="TORO";
			}
			echo "<div id='municipio'>".$municipio."</div>";
			echo "<div id='sexo'>".$datacarnet['sexo']."</div>";
			echo "<div id='fechaafiliacion'>".$datacarnet['fecha_afiliacion']."</div>";
			echo "<div id='fechanac'>".$datacarnet['Fecha_Nacimiento']."</div>";
			echo "<div id='ficha'>".$datacarnet['ficha']."</div>";
		}
		?>
	</div>
</body>
</html>