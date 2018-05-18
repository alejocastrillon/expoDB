<?php 
session_start();
if(!isset($_SESSION['id'])||!isset($_SESSION['name'])||!isset($_SESSION['dist']))die(header("location:../../default.php"));
require_once '../class/class.Novedad.php';
$carnet=Novedad::singleton();
$newcarnet=$carnet->Carnetizar($_GET['id'],$_GET['nov']);
?>
<html>
<head>
	<title></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="icon" type="image/ico" href="../../imagenes/favicon.ico">
	<script type="text/javascript" src="../../js/jquery-1.10.2.js"></script>
	<script type="text/javascript" src="../../js/jquery-ui-1.10.4.custom.js"></script>
	<link rel="stylesheet" type="text/css" href="../../css/imprimirtraslado.css">
	<link rel="stylesheet" type="text/css" href="../../css/jquery-ui-1.10.4.custom.css" media="screen">
	<style type="text/css" media="print">
	a{
		display: none;
	}
	</style>
	<script type="text/javascript">
	$(document).ready(function(){
		window.print();
	});
	</script>
	</head>
<body>
	<?php
		echo "<a href='imprimiractaentreganov.php?id=".$_GET['id']."&nov=".$_GET['nov']."'>Imprimir acta de entrega</a>";  
		foreach ($newcarnet as $dataform):
	?>
	<div>
		<p>Fecha: <?=$dataform['Fecha_Realizacion']?></p>
	</div>
	<div class="encabezado">
		<p>Señores:</p>
		<p><b>EPSS ASOCIACION MUTUAL BARRIOS UNIDOS DE QUIBDÓ</b></p>
		<p>CARTAGO VALLE</p>
	</div>
	<div class="ref">
		<p><b>REF:</b> SOLICITUD DE TRASLADO</p>
	</div>
	<div class="saludo">
		<p>Cordial Saludo:</p>
	</div>
	<?php
		if($dataform['Codigo_Mpio_afi']==20)
		{
			$antmunicipio="ALCALA";
		}
		else if($dataform['Codigo_Mpio_afi']==41)
		{
			$antmunicipio="ANSERMANUEVO";
		}
		else if($dataform['Codigo_Mpio_afi']==100)
		{
			$antmunicipio="BOLIVAR";
		}
		else if($dataform['Codigo_Mpio_afi']==126)
		{
			$antmunicipio="CALIMA-DARIEN";
		}
		else if($dataform['Codigo_Mpio_afi']==147)
		{
			$antmunicipio="CARTAGO";		
		}
		else if($dataform['Codigo_Mpio_afi']==246)
		{
			$antmunicipio="EL CAIRO";
		}
		else if($dataform['Codigo_Mpio_afi']==318)
		{
			$antmunicipio="GUACARI";
		}
		else if($dataform['Codigo_Mpio_afi']==400)
		{
			$antmunicipio="LA UNION";
		}
		else if($dataform['Codigo_Mpio_afi']==497)
		{
			$antmunicipio="OBANDO";
		}
		else if($dataform['Codigo_Mpio_afi']==823)
		{
			$antmunicipio="TORO";
		}
		if($dataform['Valor_2']==20)
		{
			$municipio="ALCALA";
		}
		else if($dataform['Valor_2']==41)
		{
			$municipio="ANSERMANUEVO";
		}
		else if($dataform['Valor_2']==100)
		{
			$municipio="BOLIVAR";
		}
		else if($dataform['Valor_2']==126)
		{
			$municipio="CALIMA-DARIEN";
		}
		else if($dataform['Valor_2']==147)
		{
			$municipio="CARTAGO";		
		}
		else if($dataform['Valor_2']==246)
		{
			$municipio="EL CAIRO";
		}
		else if($dataform['Valor_2']==318)
		{
			$municipio="GUACARI";
		}
		else if($dataform['Valor_2']==400)
		{
			$municipio="LA UNION";
		}
		else if($dataform['Valor_2']==497)
		{
			$municipio="OBANDO";
		}
		else if($dataform['Valor_2']==823)
		{
			$municipio="TORO";
		}
		if($dataform['Tipo_Documento']=="TI"||$dataform['Tipo_Documento']=="RC")
		{
			echo "Yo, ___________________________________________________________________ identificado (a) con CC. No.____________________________________ Actuando en nombre propio y/o en representacion de ".$dataform['Nombre_1']." ".$dataform['Nombre_2']." ".$dataform['Apellido_1']." ".$dataform['Apellido_2'].", en mi calidad de _______________________________, ante ustedes acudo de forma libre y espontánea con el fin de solicitar mi traslado y el de mi grupo familiar, abajo relacionado de la EPS AMBUQ EPS del municipio de ".$antmunicipio." a esta entidad en el municipio de ".$municipio;
		}
		else
		{
			echo "Yo, ".$dataform['Nombre_1']." ".$dataform['Nombre_2']." ".$dataform['Apellido_1']." ".$dataform['Apellido_2']." identificado (a) con CC. No. ".$dataform['Numero_Identificacion_Afil']." actuando en nombre propio, ante ustedes acudo de forma libre y espontánea con el fin de solicitar mi traslado y el de mi grupo familiar, abajo relacionado de la EPS AMBUQ EPS del municipio de ".$antmunicipio." a esta entidad en el municipio ".$municipio;
		} 
	?>
	<?php 
	endforeach;
	?>
	<table border="1">
		<tr>
			<th>T_DOC</th><th>DOCUMENTO</th><th>NOMBRES Y APELLIDOS</th><th>SISBEN</th>
		</tr>
		<tr>
			<td></td><td></td><td></td><td></td>
		</tr>
		<tr>
			<td></td><td></td><td></td><td></td>
		</tr>
		<tr>
			<td></td><td></td><td></td><td></td>
		</tr>
		<tr>
			<td></td><td></td><td></td><td></td>
		</tr>
		<tr>
			<td></td><td></td><td></td><td></td>
		</tr>
		<tr>
			<td></td><td></td><td></td><td></td>
		</tr>
		<tr>
			<td></td><td></td><td></td><td></td>
		</tr>
		<tr>
			<td></td><td></td><td></td><td></td>
		</tr>
		<tr>
			<td></td><td></td><td></td><td></td>
		</tr>
	</table>
	<div style="margin-top:40px;">
		ATENTAMENTE,
	</div>
	<div style="width:46%;float:left;margin-top:80px;">
		<div style="width:100%;border-bottom:1px solid #000">
		</div>
		<div style="margin-top:20px;clear:both">
			<div style="width:18%;float:left">
				CC.______________________________
			</div>
		</div>
	</div>
	<div style="float:right;width:100px;height:100px;border:1px solid #000;text-align:center;padding-top:5%">
		<p style="color:#333">
			Huella
		</p>
	</div>
</body>
</html>