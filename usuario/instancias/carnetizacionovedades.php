<?php 
session_start();
if(!isset($_SESSION['id'])||!isset($_SESSION['name'])||!isset($_SESSION['dist']))die(header("location:../../default.php"));
require_once '../../superadmin/class/class.novedad.php';
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
	<link rel="stylesheet" type="text/css" href="../../css/imprimircarnet.css">
	<link rel="stylesheet" type="text/css" href="../../css/jquery-ui-1.10.4.custom.css" media="screen">
	<style type="text/css" media="print">
	a{
		display: none;
	}
	</style>
	<script type="text/javascript">
	$(document).ready(function(){
		window.print();
		$("a").button({
			icons:{
				primary:"ui-icon-print"
			}
		});
	});
	function FormTraslado(id)
	{
		window.location.assign("imprimirform.php?id="+id);
	}
	</script>
</head>
<body>
	<div id="contenedoracarnet">
		<?php  
		if($_GET['nov']=="N04")
		{
			echo "<a href='../../superadmin/instancias/imprimirformnovedad.php?id=".$_GET['id']."&nov=".$_GET['nov']."'>Imprimir formulario</a>";
		}
		else
		{
			echo "<a href='../../superadmin/instancias/imprimiractaentregaotrasnov.php?id=".$_GET['id']."&nov=".$_GET['nov']."'>Imprimir Acta de Entrega</a>";
		}
		foreach ($newcarnet as $datacarnet) 
		{
			if($datacarnet['Codigo_Mpio_afi']==20)
			{
				$municipio="ALCALA";
			}
			else if($datacarnet['Codigo_Mpio_afi']==147)
			{
				$municipio="CARTAGO";
			}
			if($datacarnet['Codigo_Novedad']=="N01")
			{
				echo "<p id='numcarnet'>".$datacarnet['Numero_Carnet']."</p>";
				echo "<div id='nombreapellido'>".strtoupper($datacarnet['Apellido_1']." ".$datacarnet['Apellido_2']." ".$datacarnet['Nombre_1']." ".$datacarnet['Nombre_2'])."</div>";
				echo "<div id='discapacidades'>N</div>";
				echo "<div id='numafili'>".$datacarnet['Valor_2']."</div>";
				echo "<div id='tipodoc'>".$datacarnet['Valor_1']."</div>";
				echo "<div id='nivel'>".$datacarnet['NIVEL']."</div>";
				echo "<div id='zona'>".$datacarnet['zona']."</div>";
				echo "<div id='vigencia'>INDEFINIDO</div>";
				echo "<div id='municipio'>".$municipio."</div>";
				echo "<div id='sexo'>".$datacarnet['Genero_afiliado']."</div>";
				echo "<div id='fechaafiliacion'>".$datacarnet['Fecha_Novedad']."</div>";
				echo "<div id='fechanac'>".$datacarnet['Valor_3']."</div>";
				echo "<div id='ficha'>".$datacarnet['FICHA']."</div>";
			}
			else if($datacarnet['Codigo_Novedad']=="N02")
			{
				echo "<p id='numcarnet'>".$datacarnet['Numero_Carnet']."</p>";
				echo "<div id='nombreapellido'>".strtoupper($datacarnet['Apellido_1']." ".$datacarnet['Apellido_2']." ".$datacarnet['Valor_1']." ".$datacarnet['Valor_2'])."</div>";
				echo "<div id='discapacidades'>N</div>";
				echo "<div id='numafili'>".$datacarnet['Numero_Identificacion_Afil']."</div>";
				echo "<div id='tipodoc'>".$datacarnet['Tipo_Documento']."</div>";
				echo "<div id='nivel'>".$datacarnet['NIVEL']."</div>";
				echo "<div id='zona'>".$datacarnet['zona']."</div>";
				echo "<div id='vigencia'>INDEFINIDO</div>";
				echo "<div id='municipio'>".$municipio."</div>";
				echo "<div id='sexo'>".$datacarnet['Genero_afiliado']."</div>";
				echo "<div id='fechaafiliacion'>".$datacarnet['Fecha_Novedad']."</div>";
				echo "<div id='fechanac'>".$datacarnet['Fecha_Nacimiento']."</div>";
				echo "<div id='ficha'>".$datacarnet['FICHA']."</div>";
			}
			else if($datacarnet['Codigo_Novedad']=="N03")
			{
				echo "<p id='numcarnet'>".$datacarnet['Numero_Carnet']."</p>";
				echo "<div id='nombreapellido'>".strtoupper($datacarnet['Valor_1']." ".$datacarnet['Valor_2']." ".$datacarnet['Nombre_1']." ".$datacarnet['Nombre_2'])."</div>";
				echo "<div id='discapacidades'>N</div>";
				echo "<div id='numafili'>".$datacarnet['Numero_Identificacion_Afil']."</div>";
				echo "<div id='tipodoc'>".$datacarnet['Tipo_Documento']."</div>";
				echo "<div id='nivel'>".$datacarnet['NIVEL']."</div>";
				echo "<div id='zona'>".$datacarnet['zona']."</div>";
				echo "<div id='vigencia'>INDEFINIDO</div>";
				echo "<div id='municipio'>".$municipio."</div>";
				echo "<div id='sexo'>".$datacarnet['Genero_afiliado']."</div>";
				echo "<div id='fechaafiliacion'>".$datacarnet['Fecha_Novedad']."</div>";
				echo "<div id='fechanac'>".$datacarnet['Fecha_Nacimiento']."</div>";
				echo "<div id='ficha'>".$datacarnet['FICHA']."</div>";
			}
			else if($datacarnet['Codigo_Novedad']=="N04")
			{
				echo "<p id='numcarnet'>".$datacarnet['Numero_Carnet']."</p>";
				echo "<div id='nombreapellido'>".strtoupper($datacarnet['Apellido_1']." ".$datacarnet['Apellido_2']." ".$datacarnet['Nombre_1']." ".$datacarnet['Nombre_2'])."</div>";
				echo "<div id='discapacidades'>N</div>";
				echo "<div id='numafili'>".$datacarnet['Numero_Identificacion_Afil']."</div>";
				echo "<div id='tipodoc'>".$datacarnet['Tipo_Documento']."</div>";
				echo "<div id='nivel'>".$datacarnet['NIVEL']."</div>";
				echo "<div id='zona'>".$datacarnet['zona']."</div>";
				echo "<div id='vigencia'>INDEFINIDO</div>";
				if($datacarnet['Valor_2']==20)
				{
					$newmuni="ALCALA";
				}
				else if($datacarnet['Valor_2']==41)
				{
					$newmuni="ANSERMANUEVO";
				}
				else if($datacarnet['Valor_2']==100)
				{
					$newmuni="BOLIVAR";
				}
				else if($datacarnet['Valor_2']==126)
				{
					$newmuni="CALIMA";
				}
				else if($datacarnet['Valor_2']==147)
				{
					$newmuni="CARTAGO";
				}
				else if($datacarnet['Valor_2']==246)
				{
					$newmuni="EL CAIRO";
				}
				else if($datacarnet['Valor_2']==318)
				{
					$newmuni="GUACARI";
				}
				else if($datacarnet['Valor_2']==400)
				{
					$newmuni="LA UNION";
				}
				else if($datacarnet['Valor_2']==497)
				{
					$newmuni="OBANDO";
				}
				else if($datacarnet['Valor_2']==823)
				{
					$newmuni="TORO";
				}
				echo "<div id='municipio'>".$newmuni."</div>";
				echo "<div id='sexo'>".$datacarnet['Genero_afiliado']."</div>";
				echo "<div id='fechaafiliacion'>".$datacarnet['Fecha_Novedad']."</div>";
				echo "<div id='fechanac'>".$datacarnet['Fecha_Nacimiento']."</div>";
				echo "<div id='ficha'>".$datacarnet['FICHA']."</div>";
			}
			else if($datacarnet['Codigo_Novedad']=="N17")
			{
				echo "<p id='numcarnet'>".$datacarnet['Numero_Carnet']."</p>";
				echo "<div id='nombreapellido'>".strtoupper($datacarnet['Apellido_1']." ".$datacarnet['Apellido_2']." ".$datacarnet['Nombre_1']." ".$datacarnet['Nombre_2'])."</div>";
				echo "<div id='discapacidades'>N</div>";
				echo "<div id='numafili'>".$datacarnet['Numero_Identificacion_Afil']."</div>";
				echo "<div id='tipodoc'>".$datacarnet['Tipo_Documento']."</div>";
				echo "<div id='nivel'>".$datacarnet['NIVEL']."</div>";
				echo "<div id='zona'>".$datacarnet['zona']."</div>";
				echo "<div id='vigencia'>INDEFINIDO</div>";
				echo "<div id='municipio'>".$municipio."</div>";
				echo "<div id='sexo'>".$datacarnet['Valor_1']."</div>";
				echo "<div id='fechaafiliacion'>".$datacarnet['Fecha_Novedad']."</div>";
				echo "<div id='fechanac'>".$datacarnet['Fecha_Nacimiento']."</div>";
				echo "<div id='ficha'>".$datacarnet['FICHA']."</div>";
			}
			else if($datacarnet['Codigo_Novedad']=="N20")
			{
				echo "<p id='numcarnet'>".$datacarnet['Numero_Carnet']."</p>";
				echo "<div id='nombreapellido'>".strtoupper($datacarnet['Apellido_1']." ".$datacarnet['Apellido_2']." ".$datacarnet['Nombre_1']." ".$datacarnet['Nombre_2'])."</div>";
				echo "<div id='discapacidades'>N</div>";
				echo "<div id='numafili'>".$datacarnet['Numero_Identificacion_Afil']."</div>";
				echo "<div id='tipodoc'>".$datacarnet['Tipo_Documento']."</div>";
				echo "<div id='nivel'>".$datacarnet['Valor_1']."</div>";
				echo "<div id='zona'>".$datacarnet['zona']."</div>";
				echo "<div id='vigencia'>INDEFINIDO</div>";
				echo "<div id='municipio'>".$municipio."</div>";
				echo "<div id='sexo'>".$datacarnet['Genero_afiliado']."</div>";
				echo "<div id='fechaafiliacion'>".$datacarnet['Fecha_Novedad']."</div>";
				echo "<div id='fechanac'>".$datacarnet['Fecha_Nacimiento']."</div>";
				echo "<div id='ficha'>".$datacarnet['FICHA']."</div>";
			}
			else if($datacarnet['Codigo_Novedad']=="N21")
			{
				echo "<p id='numcarnet'>".$datacarnet['Numero_Carnet']."</p>";
				echo "<div id='nombreapellido'>".strtoupper($datacarnet['Apellido_1']." ".$datacarnet['Apellido_2']." ".$datacarnet['Nombre_1']." ".$datacarnet['Nombre_2'])."</div>";
				echo "<div id='discapacidades'>N</div>";
				echo "<div id='numafili'>".$datacarnet['Numero_Identificacion_Afil']."</div>";
				echo "<div id='tipodoc'>".$datacarnet['Tipo_Documento']."</div>";
				echo "<div id='nivel'>".$datacarnet['NIVEL']."</div>";
				echo "<div id='zona'>".$datacarnet['zona']."</div>";
				echo "<div id='vigencia'>INDEFINIDO</div>";
				echo "<div id='municipio'>".$municipio."</div>";
				echo "<div id='sexo'>".$datacarnet['Genero_afiliado']."</div>";
				echo "<div id='fechaafiliacion'>".$datacarnet['Fecha_Novedad']."</div>";
				echo "<div id='fechanac'>".$datacarnet['Fecha_Nacimiento']."</div>";
				echo "<div id='ficha'>".$datacarnet['FICHA']."</div>";
			}
		}
		?>
	</div>
</body>
</html>