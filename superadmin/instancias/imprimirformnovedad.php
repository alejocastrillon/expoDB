<?php 
session_start();
if(!isset($_SESSION['id'])||!isset($_SESSION['name'])||!isset($_SESSION['dist']))die(header("location:../../default.php"));
require_once '../class/class.novedad.php';
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
	<link rel="stylesheet" type="text/css" href="../../css/imprimirform.css">
	<link rel="stylesheet" type="text/css" href="../../css/jquery-ui-1.10.4.custom.css" media="screen">
	<script type="text/javascript">
	$(document).ready(function(){
		window.print();
	});
	</script>
	<style type="text/css" media="print">
	a{
		display: none;
	}
	</style>
</head>
<body>
	<?php 
		if($_GET['nov']=="N04")
		{
			foreach ($newcarnet as $dataform):
	?>
	<a href="imprimirtrasladonov.php?id=<?=$dataform['Numero_Identificacion_Afil']?>&nov=<?=$_GET['nov']?>">Imprimir traslado</a>
	<div class="title">
		<p>REPUBLICA DE COLOMBIA</p>
		<p>SISTEMA GENERAL DE SEGURIDAD SOCIAL EN SALUD MINISTERIO DE SALUD-SUPERINTENDENCIA</p>
		<p>NACIONAL DE SALUD</p>
		<p>FORMULARIO UNICO DE REGISTRO DE NOVEDADES Y TRASLADOS ENTRE EPS-S</p>
		<p>PARA BENEFICIARIOS DEL SUBSIDIO EN SALUD</p>
	</div>
	<div class="logo">
	</div>
	<div class="contenido">
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
		?>
		<div class="firstencabezado">
			<p>
				1. Radicacion del Formulario
			</p>
		</div>
		<div class='ficha'>
			<p>
				No.Ficha  
				<b>
					<?=$dataform['FICHA']?>
				</b>
			</p>
		</div>
		<div class="numform">
			<p>
				No.Formulario  
				<b>
					<?=$dataform['Formulario']?>
				</b>
			</p>
		</div>
		<section>
			<div class="arsretiro">
				<p>
					RAZON SOCIAL DE LA ARS DE LA CUAL SE RETIRA
				</p>
				<div class="recipiente">
					EPS S AMBUQ <?=$antmunicipio?>
				</div>
			</div>
			<div class="tramite">
				<p>
					TRAMITE
				</p>
				<div class="recipiente">
				</div>
			</div>
			<div class="arstraslado">
				<p>
					RAZON SOCIAL DE LA ARS A LA CUAL DESEA TRASLADARSE
				</p>
				<div class="recipiente">
					EPS S AMBUQ <?=$municipio?>
				</div>
			</div>
			<div class="fecharadicaret">
				<p>
					FECHA DE RADICACION
				</p>
				<div class="recipiente">
				</div>
			</div>
			<div class="numeroradicaret">
				<p>
					NUMERO DE RADICACION
				</p>
				<div class="recipiente">
				</div>
			</div>
			<div class="traslado">
				<p>
					TRASLADO
				</p>
				<div class="recipiente">
				</div>
			</div>
			<div class="fecharadicaent">
				<p>
					FECHA DE RADICACION
				</p>
				<div class="recipiente">
					<b>
						<?=$dataform['Fecha_Realizacion']?>
					</b>
				</div>
			</div>
			<div class="numeroradicaent">
				<p>
					NUMERO DE RADICACION
				</p>
				<div class="recipiente">
				</div>
			</div>
			<div class="nombrefirma">
				<p>
					NOMBRE, FIRMA Y CEDULA DE QUIEN RECIBE
				</p>
				<div class="recipiente">
				</div>
			</div>
			<div class="regnovedad">
				<p>
					REGISTRO DE NOVEDAD
				</p>
				<div class="recipiente">
				</div>
			</div>
			<div class="nombrefirma1">
				<p>
					NOMBRE, FIRMA Y CEDULA DE QUIEN RECIBE
				</p>
				<div class="recipiente">
				</div>
			</div>
		</section>
		<div>
			<p>
				2. Información del Beneficiario Cabeza de Familia
			</p>
		</div>
		<section>
			<div class="apellido1">
				<p>
					PRIMER APELLIDO
				</p>
				<div class="recipiente">
					<?=$dataform['Apellido_1']?>
				</div>
			</div>
			<div class="apellido2">
				<p>
					SEGUNDO APELLIDO (o de Casada)
				</p>
				<div class="recipiente">
					<?=$dataform['Apellido_2']?>
				</div>
			</div>
			<div class="nombre">
				<p>
					NOMBRES
				</p>
				<div class="recipiente">
					<?=$dataform['Nombre_1']." ".$dataform['Nombre_2']?>
				</div>
			</div>
			<div class="tipo">
				<p>
					T.DOCUMENTO
				</p>
				<div class="recipiente">
					<?=$dataform['Tipo_Documento']?>
				</div>
			</div>
			<div class="numerodoc">
				<p>
					NUMERO DOCUMENTO
				</p>
				<div class="recipiente">
					<?=$dataform['Numero_Identificacion_Afil']?>
				</div>
			</div>
			<div class="direccion">
				<p>
					DIRECCION DONDE VIVE
				</p>
				<div class="recipiente">
					<?=$dataform['DIRECCION']?>
				</div>
			</div>
			<div class="sector">
				<p>
					SECTOR
				</p>
				<div class="recipiente">
				</div>
			</div>
			<div class="telefono">
				<p>
					TELEFONO
				</p>
				<div class="recipiente">
					<?=$dataform['TELEFONO']?>
				</div>
			</div>
			<div class="area">
				<p>
					AREA DONDE VIVE
				</p>
				<div class="recipiente">
					<?=$dataform['zona']?>
				</div>
			</div>
			<div class="dpto">
				<p>
					DEPARTAMENTO
				</p>
				<div class="recipiente">
					VALLE
				</div>
			</div>
			<div class="mpio">
				<p>
					MUNICIPIO
				</p>
				<div class="recipiente">
					<?php
					echo $municipio;
					?>
				</div>
			</div>
			<div class="corver">
				<p>
					CORREGIMIENTO/VEREDA
				</p>
				<div class="recipiente">
				</div>
			</div>
			<div class="beneficiarios">
				<p>
					BENEFICIARIOS DEL NUCLEO FAMILIAR
				</p>
				<div class="recipiente">
				</div>
			</div>
			<p style="float:left">
				NUCLEO FAMILIAR
			</p>
		</section>
		<table>
			<tr>
				<th>Orden</th><th>Nombres y Apellidos</th><th>N.Documento</th><th>T.Documento</th><th>F.Nacimiento</th><th>Sexo</th><th>Discapacidad</th>
			</tr>
			<tr>
				<td></td><td><?=$dataform['Apellido_1']." ".$dataform['Apellido_2']." ".$dataform['Nombre_1']." ".$dataform['Nombre_2']?></td><td><?=$dataform['Numero_Identificacion_Afil']?></td><td><?=$dataform['Tipo_Documento']?></td><td><?=$dataform['Fecha_Nacimiento']?></td><td><?=$dataform['Genero_afiliado']?></td><td></td>
			</tr>
		</table>
		<div>
			<p>
				3. Registro de Novedades
			</p>
		</div>
		<section>
			<div class="tiponov">
				<p>
					TIPO DE NOVEDAD
				</p>
				<div class="recipiente">
					TRASLADO
				</div>
			</div>
			<div class="nombrefirma2">
				<p>
					APELLIDOS Y NOMBRES DEL BENEFICIARIO ACTUAL
				</p>
				<div class="recipiente">
					<b>
						<?=$dataform['Apellido_1']." ".$dataform['Apellido_2']." ".$dataform['Nombre_1']." ".$dataform['Nombre_2']?>
					</b>
				</div>
			</div>
			<div class="tipo2">
				<p>
					TIPO Y
				</p>
				<div class="recipiente">
					<b>
						<?=$dataform['Tipo_Documento']?>
					</b>
				</div>
			</div>
			<div class="numerodoc2">
				<p>
					NUMERO DE DOCUMENTO
				</p>
				<div class="recipiente">
					<b>
						<?=$dataform['Numero_Identificacion_Afil']?>
					</b>
				</div>
			</div>
			<div class="fechanac" style="margin-left:5px">
				<p>
					F.NACIMIENTO
				</p>
				<div class="recipiente">
					<b>
						<?=$dataform['Fecha_Nacimiento']?>
					</b>
				</div>
			</div>
			<div class="sexo">
				<p>
					SEXO
				</p>
				<div class="recipiente">
					<b>
						<?=$dataform['Genero_afiliado']?>
					</b>
				</div>
			</div>
			<div class="novedad">
				<p>
					NOVEDAD
				</p>
				<div class="recipiente">
					<?=$dataform['Observacion']?>
				</div>
			</div>
			<div class="nameschange">
				<p>
					APELLIDOS Y NOMBRES DEL BENEFICIARIO A CORREGIR
				</p>
				<div class="recipiente">
				</div>
			</div>
			<div class="tipo2">
				<p>
					TIPO Y
				</p>
				<div class="recipiente">
				</div>
			</div>
			<div class="numerodoc2">
				<p>
					NUMERO DE DOCUMENTO
				</p>
				<div class="recipiente">
				</div>
			</div>
			<div class="mpio2">
				<p>
					NUEVO MUNICIPIO DE RESIDENCIA
				</p>
				<div class="recipiente">
					<?=$municipio?>
				</div>
			</div>
			<div class="direccion">
				<p>
					NUEVA DIRECCION
				</p>
				<div class="recipiente">
					<?=$dataform['DIRECCION']?>
				</div>
			</div>
			<div class="codigo">
				<p>
					CODIGO
				</p>
				<div class="recipiente">
				</div>
			</div>
			<div class="telefono" style="margin-left:10px">
				<p>
					TELEFONO
				</p>
				<div class="recipiente">
					<?=$dataform['TELEFONO']?>
				</div>
			</div>
			<div class="corver">
				<p>
					CORREGIMIENTO/VEREDA
				</p>
				<div class="recipiente">
				</div>
			</div>
			<div class="recipiente" style="float:left;margin-top:10px;height:140px;width:98.5%;padding:4px;">
				<p>DECLARACION JURADA</p>
				<p style="text-align:justify">
					Bajo la gravedad de juramento declaro que este traslado de ARS se ha efecutado en fomra voluntaria y bajo los parametros de libre escogencia; la información registrada para el traslado y/o la novedad es cierta
				</p>
				<div style="margin-left:25%;border-top:1px solid #000;width:350px;margin-top:40px">
					Firma y Numero de Documento de Identificación de Beneficiario Cabeza de Familia
				</div>
				<p style="text-align:justify"><b>Nota:</b> Si es un menor de edad, firma el Representante Legal ó Cabeza de Familia, si no sabe firmar deberán estampar la huella dactilar del dedo indice derecho</p>
			</div>
		</section>
		<div>
			<p>
				4. Información para ser diligenciada por la entidad territorial
			</p>
		</div>
		<section>
			<div class="radicado">
				<p>
					RADICADO EN LA ENTIDAD TERRITORIAL
				</p>
				<div class="recipiente" style="width:49%;float:left">
				</div>
				<div class="recipiente" style="width:49%;float:right">
				</div>
			</div>
			<div class="nombrefirma1">
				<p>
					NOMBRE Y CEDULA DE QUIEN RECIBE
				</p>
				<div class="recipiente">
				</div>
			</div>
			<div class="observacion">
				<p>
					OBSERVACION
				</p>
				<div class="recipiente">
				</div>
			</div>
		</section>
	</div>
	<?php 
		endforeach;
	}
	else
	{
		echo "No se puede imprimir el formulario";
	}
	?>
</body>
</html>