<?php 
session_start();
if(!isset($_SESSION['id'])||!isset($_SESSION['name'])||!isset($_SESSION['dist']))die(header("location:../../default.php"));
require_once '../class/class.traslados.php';
$carnet=traslados::singleton();
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
	function FormTraslado(id)
	{
		window.location.assign("imprimirformtraslado.php?id="+id);
	}
	</script>
</head>
<body>
	<button onClick="FormTraslado($('#numafili').html())">Imprimir formulario</button>
	<div id="contenedoracarnet">
		<?php  
		foreach ($newcarnet as $datacarnet) 
		{
			echo "<p id='numcarnet'>".$datacarnet['Numero_Carnet']."</p>";
			echo "<div id='nombreapellido'>".strtoupper($datacarnet['Apellido1']." ".$datacarnet['Apellido2']." ".$datacarnet['Nombre1']." ".$datacarnet['Nombre2'])."</div>";
			echo "<div id='discapacidades'>N</div>";
			echo "<div id='numafili'>".$datacarnet['Numero_IdentificacionAfil']."</div>";
			echo "<div id='tipodoc'>".$datacarnet['TipoDocumento']."</div>";
			echo "<div id='nivel'>".$datacarnet['Nivel_Sisben']."</div>";
			echo "<div id='zona'>".$datacarnet['zona']."</div>";
			echo "<div id='vigencia'>INDEFINIDO</div>";
			if($datacarnet['Codigo_Mpio_afi']==20)
			{
				$municipio="ALCALA";
			}
			else if($datacarnet['Codigo_Mpio_afi']==41)
			{
				$municipio="ANSERMANUEVO";
			}
			else if($datacarnet['Codigo_Mpio_afi']==100)
			{
				$municipio="BOLIVAR";
			}
			else if($datacarnet['Codigo_Mpio_afi']==126)
			{
				$municipio="CALIMA-DARIEN";
			}
			else if($datacarnet['Codigo_Mpio_afi']==147)
			{
				$municipio="CARTAGO";
			}
			else if($datacarnet['Codigo_Mpio_afi']==246)
			{
				$municipio="EL CAIRO";
			}
			else if($datacarnet['Codigo_Mpio_afi']==318)
			{
				$municipio="GUACARI";
			}
			else if($datacarnet['Codigo_Mpio_afi']==400)
			{
				$municipio="LA UNION";
			}
			else if($datacarnet['Codigo_Mpio_afi']==497)
			{
				$municipio="OBANDO";
			}
			else if($datacarnet['Codigo_Mpio_afi']==823)
			{
				$municipio="TORO";
			}
			echo "<div id='municipio'>".$municipio."</div>";
			echo "<div id='sexo'>".$datacarnet['Genero_afiliado']."</div>";
			echo "<div id='fechaafiliacion'>".$datacarnet['Fecha_Afiliacion_entidad']."</div>";
			echo "<div id='fechanac'>".$datacarnet['FechaNacimiento']."</div>";
			echo "<div id='ficha'>".$datacarnet['Ficha']."</div>";
		}
		?>
	</div>
</body>
</html>