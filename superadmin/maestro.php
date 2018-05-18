<?php 
session_start();
if(!isset($_SESSION['id'])||!isset($_SESSION['name'])||!isset($_SESSION['dist']))die(header("location:default.php"));
?>
<html>
<head>
	<title></title>
</head>
<body>
<div class="forms">
	<ul>
		<li><a href="#datospersonales">Datos Personales</a></li>
		<li><a href="#datosresidencia">Datos de Lugar de Residencia</a></li>
	</ul>
	<div id="datospersonales">
		<p>
			<label>Ingrese el numero de documento de identidad de la madre:</label>
			<input type="text" id="CC_MADRE">
		</p>
		<p>
			<label>Seleccione el tipo de documento del nuevo afiliado:</label>
			<select id="tipodoc">
				<option value="">Seleccione....</option>
				<option value="RC">Registro Civil</option>
				<option value="TI">Tarjeta de Identidad</option>
				<option value="CC">Cedula de Ciudadania</option>
				<option value="CE">Cedula de Extranjeria</option>
			</select>
		</p>
		<p>
			<label>Ingrese el numero de identificacion del nuevo afiliado:</label>
			<input type="text" id="numeroafil">
		</p>
		<p>
			<label>Ingrese el primer apellido del nuevo afiliado:</label>
			<input type="text" id="apellido1">
		</p>
		<p>
			<label>Ingrese el segundo apellido del nuevo afiliado:</label>
			<input type="text" id="apellido2">
		</p>
		<p>
			<label>Ingrese el primer nombre del nuevo afiliado:</label>
			<input type="text" id="nombre1">
		</p>
		<p>
			<label>Ingrese el segundo nombre del nuevo afiliado:</label>
			<input type="text" id="nombre2">
		</p>
		<p>
			<label>Ingrese la fecha de nacimiento del nuevo afiliado:</label>
			<input type="text" id="fechanac">
		</p>
		<p>
			<label>Genero del nuevo afiliado:</label>
			<br/>
			<input type="radio" name="genero" id="Genero_afil_fosygaM" value="M">Masculino
			<br/>
			<input type="radio" name="genero" id="Genero_afil_fosygaF" value="F">Femenino
		</p>
	</div>
	<div id="datosresidencia">
		<p>
			<label>Seleccione el municipio de afiliacion:</label>
			<select id="Codigo_Mpio_afi">
				<option value="">Seleccione...</option>
				<?php 
					require_once 'class/class.datos_varios.php';
    	           	$datos=datos_varios::singleton();
	               	$data=$datos->getmun();
	               	foreach ($data as $fila) 
					{
						echo "<option value='".$fila['CODIGO']."'>".$fila['Desmun']."</option>";
		 			} 
				?>
			</select>
		</p>
		<p>
			<label>Seleccione la zona de residencia:</label>
			<select id="zona">
				<option value="">Seleccione....</option>
				<option value="U">Urbana</option>
				<option value="R">Rural</option>
			</select>
		</p>
		<p>
			<label>Seleccione el tipo de poblacion</label>
			<select id='tipopob'>
				<?php 
					require_once 'class/class.tipo_pob.php';
					$codpob=tipo_pob::singleton();
					$datapob=$codpob->getpob();
					echo $datapob;
				?>
			</select>
		</p>
		<p>
			<label>Seleccione el nivel del sisben del nuevo afiliado:</label>
			<select id="nivel">
				<option value="">Seleccione...</option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="N">No tiene sisben</option>
			</select>
		</p>
		<p>
			<label>Observacion</label>
			<select id="observacion">
				<?php  
				require_once 'class/class.observaciones.php';
				$dataoption=observaciones::singleton();
				$datos=$dataoption->getoptionobservaciones();
				?>
			</select>
		</p>
		<p>
			<label>Ingrese la direccion de domicilio del afiliado:</label>
			<input type="text" id="direccion">
		</p>
		<p>
			<label>Ingrese el telefono del afiliado:</label>
			<input type="text" id="telefono">
		</p>
		<p>
			<label>Ingrese la ficha del sisben</label>
			<input type="text" id="ficha">
		</p>
		<button onClick="RegistraMaestro()">Registrar</button>
	</div>
</div>
</body>
<script type="text/javascript">
$(document).ready(function(){
	$(".forms").tabs();
	$("button").button();
	$("#fechanac").datepicker({
		yearRange:"1900:",
		showAnim: "explode",
		dateFormat:"dd/mm/yy",
		monthNames:["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"],
		monthNamesShort:["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"],
		dayNamesMin: [ "Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sab" ],
		changeYear:true,
		changeMonth:true,
		maxDate:0
	});
});
</script>
</html>