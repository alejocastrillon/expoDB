<?php 
session_start();
if(!isset($_SESSION['id'])||!isset($_SESSION['name'])||!isset($_SESSION['dist']))die(header("location:../../default.php"));
require_once '../class/class.maestro.php';
$form=Maestro::singleton();
$newform=$form->carnetizar($_GET['id']);
?>
<html>
<head>
	<title></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="icon" type="image/ico" href="../../imagenes/favicon.ico">
	<link rel="stylesheet" type="text/css" href="../../css/imprimirformaster.css">
	<script type="text/javascript" src="../../js/jquery-1.10.2.js"></script>
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
<a href="imprimiractaentregamaster.php?id=<?=$_GET['id']?>">Imprimir Acta de Entrega</a>
<?php  
foreach($newform as $dataform):
?>
<div id="supersalud">
	<img src="../../imagenes/supersalud.jpg">
</div>
<div id="contenedor">
	<div class="encabezado">
		<p>REPÚBLICA DE COLOMBIA</p>
		<p>SISTEMA GENERAL DE SEGURIDAD SOCIAL EN SALUD</p>
		<p>SUPERINTENDENCIA NACIONAL DE SALUD</p>
	</div>
	<div class="header">
		<p>Fecha de Radicación</p>
		<table border='1'>
			<tr>
				<td>
					<?=substr($dataform['Fecha_Realizacion'], 0, 1)?>
				</td>
				<td>
					<?=substr($dataform['Fecha_Realizacion'], 1, 1)?>
				</td>
			</tr>
		</table>
		<table border='1'>
			<tr>
				<td>
					<?=substr($dataform['Fecha_Realizacion'], 3, 1)?>
				</td>
				<td>
					<?=substr($dataform['Fecha_Realizacion'], 4, 1)?>
				</td>
			</tr>
		</table>
		<table border='1'>
			<tr>
				<td>
					<?=substr($dataform['Fecha_Realizacion'], 8, 1)?>
				</td>
				<td>
					<?=substr($dataform['Fecha_Realizacion'], 9, 1)?>
				</td>
			</tr>
		</table>
		<p>Número de Radicación</p>
		<table border='1'>
			<tr>
				<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
			</tr>
		</table>
	</div>
	<div class="header">
		<div id="logo">
		</div>
		<div id="ent">
			<p><b>EPS-S AMBUQ ESS</b></p>
			<p>NIT. 818.000.140-0</p>
			<p>CÓDIGO ESS-076</p>
		</div>
	</div>
	<div id="content">
		<h6>FORMULARIO ÚNICO DE AFILIACIÓN E INSCRIPCIÓN RÉGIMEN SUBSIDIADO - PARA BENEFICIARIOS DEL SUBSIDIO EN SALUD</h6>
		<div class="head" style="margin-top:-20px">
			<p>I. Información para ser diligenciada por el beneficiario</p>
			<p>No. del Formulario  <?=$dataform['Formulario']?></p>
		</div>
		<div id="form">
			<div style="width:30%;border-left:none">
				Fecha de inscripción a la EPS-S	
			</div>
			<div style="width:10%">
				DIA <?=substr($dataform['Fecha_Realizacion'], 0, 1).substr($dataform['Fecha_Realizacion'], 1, 1)?>
			</div>
			<div style="width:14%">
				MES <?=substr($dataform['Fecha_Realizacion'], 3, 1).substr($dataform['Fecha_Realizacion'], 4, 1)?>
			</div>
			<div style="width:11%">
				AÑO <?=substr($dataform['Fecha_Realizacion'], 6, 1).substr($dataform['Fecha_Realizacion'], 7, 1).substr($dataform['Fecha_Realizacion'], 8, 1).substr($dataform['Fecha_Realizacion'], 9, 1)?>
			</div>
			<div style="width:30.5%">
				No. FICHA SISBEN  <?=$dataform['Ficha']?>
			</div>
			<div style="width:99.4%; text-align:center; border-left:none">
				Identificacion del Beneficiario Cabeza de Familia
			</div>
			<div style="width:32.5%;border-bottom:none;border-left:none">
				1.er Apellido
			</div>
			<div style="width:32.5%;border-bottom:none">
				2.do Apellido (o de casada)
			</div>
			<div style="width:31%;border-bottom:none">
				Nombres:
			</div>
			<div style="width:32.5%;border-left:none">
				<?=$dataform['Apellido_1']?>
			</div>
			<div style="width:32.5%;">
				<?=$dataform['Apellido_2']?>
			</div>
			<div style="width:32.35%;">
				<?=$dataform['Nombre_1']." ".$dataform['Nombre_2']?>
			</div>
			<div style="width:30%;border-left:none">
				Documento de Identidad
			</div>
			<?php 
			if($dataform['Tipo_Documento']=="CC")
			{
				$y="<div style='background:url(../../imagenes/equis.gif);background-size:100% 100%;text-align:center;width:4%'>CC</div><div style='text-align:center;width:4%'>TI</div><div style='text-align:center;width:4%'>RC</div><div style='text-align:center;width:4%'>ASI</div><div style='text-align:center;width:4%'>MSI</div>";
			}
			else if($dataform['Tipo_Documento']=="TI")
			{
				$y="<div style='text-align:center;width:4%'>CC</div><div style='background:url(../../imagenes/equis.gif);background-size:100% 100%;text-align:center;width:4%'>TI</div><div style='text-align:center;width:4%'>RC</div><div style='text-align:center;width:4%'>ASI</div><div style='text-align:center;width:4%'>MSI</div>";
			}
			else if($dataform['Tipo_Documento']=="RC")
			{
				$y="<div style='text-align:center;width:4%'>CC</div><div style='text-align:center;width:4%'>TI</div><div style='background:url(../../imagenes/equis.gif);background-size:100% 100%;text-align:center;width:4%'>RC</div><div style='text-align:center;width:4%'>ASI</div><div style='text-align:center;width:4%'>MSI</div>";
			}
			echo $y; 
			?>
			<div style="width:43.65%">
				Número Documento: <?=$dataform['Numero_Identificacion_Afil']?>
			</div>
			<div style="width:22%;border-left:none">
				Fecha de Nacimiento
			</div>
			<div style="width:5%">
				Día
			</div>
			<div style="width:10.85%">
				<?=substr($dataform['Fecha_Nacimiento'], 0, 2)?>
			</div>
			<div style="width:5%">
				Mes
			</div>
			<div style="width:14%">
				<?=substr($dataform['Fecha_Nacimiento'], 3, 2)?>
			</div>
			<div style="width:5%">
				Año
			</div>
			<div style="width:8%">
				<?=substr($dataform['Fecha_Nacimiento'], 6, 4)?>
			</div>
			<div style="width:7%">
				Sexo
			</div>
			<?php 
			if($dataform['Genero_afiliado']=="M")
			{
				$sex="<div style='background:url(../../imagenes/equis.gif);background-size:100% 100%;width:7%;text-align:center'>M</div><div style='width:7%;text-align:center'>F</div>";
			}
			else
			{
				$sex="<div style='width:7%;text-align:center'>M</div><div style='background:url(../../imagenes/equis.gif);background-size:100% 100%;width:7%;text-align:center'>F</div>";
			}
			echo $sex;
			?>
			<div style="width:49.1%;border-left:none">
				Numero de Beneficiarios integrantes del Grupo Familiar
			</div>
			<div style="width:49%">
				Direccion donde vive: <?=$dataform['Direccion']?>
			</div>
			<div style="width:37%;border-left:none">
				Teléfonos: <?=$dataform['Telefono']?>
			</div>
			<div style="width:30%">
				E-MAIL:
			</div>
			<div style="width:15%">
				Área donde vive
			</div>
			<?php  
			if($dataform['Zona']=="U")
			{
				$zone="<div style='background:url(../../imagenes/equis.gif);background-size:100% 100%;width:6.5%;text-align:center'>Urbana</div><div style='width:6.5%;text-align:center'>Rural</div>";
			}
			else
			{
				$zone="<div style:'width:6.5%;text-align:center'>Urbana</div><div style='background:url(../../imagenes/equis.gif);background-size:100% 100%;width:6.5%;text-align:center'>Rural</div>";
			}
			echo $zone;
			?>
			<div style="width:32%;border-left:none">
				Departamento: Valle
			</div>
			<?php  
			if($dataform['Codigo_Mpio_af']==20)
			{
				$municipio="ALCALA";
			}
			else if($dataform['Codigo_Mpio_af']==41)
			{
				$municipio="ANSERMANUEVO";
			}
			else if($dataform['Codigo_Mpio_af']==100)
			{
				$municipio="BOLIVAR";
			}
			else if($dataform['Codigo_Mpio_af']==126)
			{
				$municipio="CALIMA-DARIEN";
			}
			else if($dataform['Codigo_Mpio_af']==147)
			{
				$municipio="CARTAGO";
			}
			else if($dataform['Codigo_Mpio_af']==246)
			{
				$municipio="EL CAIRO";
			}
			else if($dataform['Codigo_Mpio_af']==318)
			{
				$municipio="GUACARI";
			}
			else if($dataform['Codigo_Mpio_af']==400)
			{
				$municipio="LA UNION";
			}
			else if($dataform['Codigo_Mpio_af']==497)
			{
				$municipio="OBANDO";
			}
			else if($dataform['Codigo_Mpio_af']==823)
			{
				$municipio="TORO";
			}
			?>
			<div style="width:34%">
				Municipio: <?=$municipio?>
			</div>
			<div style="width:31%">
				Vereda 
			</div>
			<div style="width:33%;border-left:none">
				Corregimiento:
			</div>
			<div style="width:25%">
				Caserio:
			</div>
			<div style="width:39.3%">
				Resguardo Indigena:
			</div>
			<div style="width:37%;border-left:none">
				Estaba anteriormente afiliado a algun regimen
			</div>
			<div style="width:5%;text-align:center">
				SI
			</div>
			<div style="width:5%;text-align:center">
				NO
			</div>
			<div style="width:33.5%">
				Régimen al que estaba afiliado antes
			</div>
			<div style="width:7%">
				Contrib.
			</div>
			<div style="width:7%">
				Subsi.
			</div>
			<div style="width:99.2%;border-left:none">
				Nombre de la entidad a la que estaba afiliado:
			</div>
			<div style="width:13%;border-left:none;text-align:center">
				Discapacitada
			</div>
			<div style="width:3%;text-align:center">
				SI
			</div>
			<div style="width:3%;text-align:center">
				NO
			</div>
			<div style="width:29.5%;text-align:center">
				TIPO DISCAPACIDAD
			</div>
			<div style="width:15%;text-align:center">
				FÍSICA
			</div>
			<div style="width:15%;text-align:center">
				PSÍQUICA
			</div>
			<div style="width:15%;text-align:center">
				SENSORIAL
			</div>
			<div style="width:99.2%;border-left:none;text-align:center">
				Identificación de los Beneficiarios integrantes del Grupo Familiar
			</div>
			<table>
				<tr>
					<th style="width:32%">Nombre</th><th style="width:20%">No. Doc</th><th>Tp.Doc</th><th>Parentesco</th><th>Sexo</th><th>Fecha Nacimiento</th><th style="border-right:none">Tipo Discapacidad</th>
				</tr>
				<tr>
					<td style="border-left:none"></td><td></td><td></td><td></td><td></td><td></td><td></td>
				</tr>
				<tr>
					<td style="border-left:none"></td><td></td><td></td><td></td><td></td><td></td><td></td>
				</tr>
				<tr>
					<td style="border-left:none"></td><td></td><td></td><td></td><td></td><td></td><td></td>
				</tr>
				<tr>
					<td style="border-left:none"></td><td></td><td></td><td></td><td></td><td></td><td></td>
				</tr>
				<tr>
					<td style="border-left:none"></td><td></td><td></td><td></td><td></td><td></td><td></td>
				</tr>
				<tr>
					<td style="border-left:none"></td><td></td><td></td><td></td><td></td><td></td><td></td>
				</tr>
				<tr>
					<td style="border-left:none"></td><td></td><td></td><td></td><td></td><td></td><td></td>
				</tr>
				<tr>
					<td style="border-left:none"></td><td></td><td></td><td></td><td></td><td></td><td></td>
				</tr>
				<tr>
					<td style="border-left:none"></td><td></td><td></td><td></td><td></td><td></td><td></td>
				</tr>
				<tr>
					<td style="border-left:none"></td><td></td><td></td><td></td><td></td><td></td><td></td>
				</tr>
			</table>
			<div style="width:99.2%;border-left:none">
				Observaciones:
			</div>
			<div style="width:99.2%;border-left:none;clear:both;height:125px;border-bottom:none">
				<h4 style="margin-top:-1px">DECLARACIÓN JURADA</h4>
				<p style="width:95%;text-align:center;margin:0 auto;margin-top:-5px;">
					Bajo la gravedad de juramento declaro que ni yo ni ningun integrante del grupo familiar está afiliado a otra EPS-S o al régimen contributivo.
				</p>
				<p style="margin:0 auto;text-align:center;margin-top:20px;">
					_____________________________________________________________________
					<br>
					Firma ó Numero Documento de Identificacion del Beneficiario Cabeza de Familia
				</p>
				<p style="width:95%;text-align:center;margin:0 auto;margin-top:7px;">
					NOTA: Si es un menor de edad firma el Representante Legal ó Cabeza de Familia, si no saben firmar deben estampar la huella digital del dedo indice derecho. La discapacidad debe estar certificada por el medio autorizado conforme a las normas vigentes.
				</p>
			</div>
		</div>
		<div class="head">
			<p>
				II- Información para ser diligenciada por la entidad territorial
			</p>
		</div>
		<div id="form">
			<div style="border-left:none;width:18%;text-align:center">
				ESTRATO SOCIO
			</div>
			<div style="width:39.6%;text-align:center">
				NIVEL SISBEN
			</div>
			<div style="width:39.6%;text-align:center;border-left:none">
				OTRA IDENTIFICACION
			</div>
			<div style="border-left:none;width:18%;text-align:center">
				ECONÓMICO
			</div>
			<div style='text-align:center;width:11%'>
				UNO (1)
			</div>
			<div style='width:11%;text-align:center'>
				DOS (2)
			</div>
			<div style='width:11%;text-align:center'>
				TRES (3)
			</div>
			<div style='width:11%;text-align:center'>
				Indigena
			</div>
			<div style='width:11%;text-align:center'>
				Indigente
			</div>
			<div style='width:20%;text-align:center'>
				Menor Abandonado
			</div>
			<div style="width:31%;border-left:none;border-bottom:none;height:25px">
				Municipio
			</div>
			<div style="width:12%;height:25px;text-align:center">
				Fecha Ficha SISBEN
			</div>
			<div style="width:14%;height:25px;border-bottom:none">
				No. Ficha SISBEN
			</div>
			<div style="width:12%;height:25px;text-align:center;border-bottom:none">
				Puntaje SISBEN:
			</div>
			<div style="width:9%;height:25px;text-align:center;border-bottom:none">
				Cabeza de Familia:
			</div>
			<div style="width:7.75%;height:25px">
			</div>
			<div style="width:7.75%;height:25px">
			</div>
			<div style="width:31%;border-left:none;border-bottom:none">
			</div>
			<div style="width:3.38%">
				DD
			</div>
			<div style="width:3.38%">
				MM
			</div>
			<div style="width:3.38%">
				AA
			</div>
			<div style="width:14%;border-bottom:none">
			</div>
			<div style="width:12%;border-bottom:none">
			</div>
			<div style="width:9.1%;border-bottom:none">
			</div>
			<div style="width:7.75%;border-bottom:none">
			</div>
			<div style="width:7.75%;border-bottom:none">
			</div>
			<div style="width:31%;border-left:none;clear:both">
			</div>
			<div style="width:3.38%">
			</div>
			<div style="width:3.38%">
			</div>
			<div style="width:3.38%">
			</div>
			<div style="width:14%">
			</div>
			<div style="width:12%">
			</div>
			<div style="width:9.1%">
			</div>
			<div style="width:7.75%">
			</div>
			<div style="width:7.75%">
			</div>
			<div style="width:40%;border-left:none;border-bottom:none;clear:both">
				RADICACIÓN EN LA ENTIDAD TERRITORIAL
			</div>
			<div style="width:16%;border-bottom:none;text-align:center">
				Fecha validación
			</div>
			<div style="width:35%;border-bottom:none">
				Datos del funcionario que realiza la verificación
			</div>
			<div style="width:9.45%;border-left:none;text-align:center">
				DIA
			</div>
			<div style="width:9.45%;border-left:none;text-align:center">
				MES
			</div>
			<div style="width:9.45%;border-left:none;text-align:center">
				AÑO
			</div>
			<div style="width:9.45%;border-left:none;text-align:center">
				HORA
			</div>
			<div style="width:15.9%">
			</div>
			<div style="width:35%;border-bottom:none">
				<br>
				NOMBRE:
			</div>
			<div style="width:9.37%;border-left:none;clear:both">
			</div>
			<div style="width:9.37%">
			</div>
			<div style="width:9.37%">
			</div>
			<div style="width:9.37%">
			</div>
			<div style="width:4.6%;border-bottom:none;text-align:center">
				DD
			</div>
			<div style="width:4.6%;border-bottom:none;text-align:center">
				MM
			</div>
			<div style="width:4.6%;border-bottom:none;text-align:center">
				AA
			</div>
			<div style="width:34.5%;border-bottom:none">
			</div>
			<div style="width:9.42%;border-left:none;clear:both;height:40px">
			</div>
			<div style="width:9.42%;border-left:none;height:40px">
			</div>
			<div style="width:9.42%;border-left:none;height:40px">
			</div>
			<div style="width:9.42%;border-left:none;height:40px">
			</div>
			<div style="width:4.8%;height:40px;border-bottom:none">
			</div>
			<div style="width:4.75%;height:40px;border-bottom:none">
			</div>
			<div style="width:4.6%;height:40px;border-bottom:none">
			</div>
			<div style="width:34.5%;border-bottom:none;height:40px">
				<br>
				FIRMA:
				<br>
				<br>
				CÉDULA:
			</div>
			<div style="width:40%;border-left:none;clear:both">
				NOMBREY CEDULA DE QUIEN RECIBE
			</div>
			<div style="width:4.8%">
			</div>
			<div style="width:4.75%">
			</div>
			<div style="width:4.6%">
			</div>
			<div style="width:41.2%">
			</div>
			<div style="width:40%;border-left:none;border-bottom:none;clear:both">
				OBSERVACIONES
			</div>
			<div style="width:4.8%;border-bottom:none">
			</div>
			<div style="width:4.75%;border-bottom:none">
			</div>
			<div style="width:4.6%;border-bottom:none">
			</div>
			<div style="width:41.2%;border-bottom:none">
			</div>
		</div>
		<div class="head">
			<p>
				III. Información para ser diligenciada por la EPS-S
			</p>
		</div>
		<div id="form">
			<div style="width:99.2%;border-left:none;height:44px">
				<p style="margin-top:20px">
					________________         _______________________      ______________________    ____________________     _______________________
				</p>
				<p style="margin-left:13px;float:left;margin-top:-10px;">
					Contrato No.
				</p>
				<p style="margin-left:80px;float:left;margin-top:-10px">
					Revisado
				</p>
				<p style="margin-left:90px;float:left;margin-top:-10px">
					Grabado
				</p>
				<p style="margin-left:90px;float:left;margin-top:-10px">
					Validado
				</p>
				<p style="margin-left:60px;float:left;margin-top:-10px">
					Fecha de Carnetización
				</p>
			</div>
			<div style="width:99.2%;border-left:none;border-bottom:none;height:60px;line-height:150%">
				Datos del promotor que diligencia el formulario
				<br>
				NOMBRE:
				<br>
				FIRMA:
				<br>
				CÉDULA:
			</div>
		</div>
	</div>
</div>
<?php 
endforeach;
?>
</body>
</html>