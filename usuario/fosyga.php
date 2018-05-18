<?php 
session_start();
if(!isset($_SESSION['id'])||!isset($_SESSION['name'])||!isset($_SESSION['dist']))die(header("location:../default.php"));
?>
<html>
<head>
	<title></title>
</head>
<body>
<div class="forms">
	<ul>
		<li><a href="#datosactivos">Activos en FOSYGA</a></li>
	</ul>
	<div id="datosactivos">
		<p>
			<label>Seleccione el tipo de documento:</label>
			<select id="tipodoc">
				<option>Seleccione..</option>
				<option value="RC">Registro Civil</option>
				<option value="TI">Tarjeta de Identidad</option>
				<option value="CC">Cedula de Ciudadania</option>
				<option value="CE">Cedula de Extranjeria</option>
			</select>
		</p>
		<p>
			<label>Ingrese el numero de identificacion:</label>
			<input type="text" id="num_afi">
		</p>
		<p>
			<label>Ingrese el primer apellido:</label>
			<input type="text" id="apellido1">
		</p>
		<p>
			<label>Ingrese el segundo apellido:</label>
			<input type="text" id="apellido2">
		</p>
		<p>
			<label>Ingrese el primer nombre:</label>
			<input type="text" id="nombre1">
		</p>
		<p>
			<label>Ingrese el segundo nombre:</label>
			<input type="text" id="nombre2">
		</p>
		<p>
			<label>Ingrese la fecha de nacimiento</label>
			<input type="text" id="fechanac">
		</p>
		<p>
			<label>Ingrese la fecha de afiliacion a esta entidad:</label>
			<input type="text" id="fecha_entidad">
		</p>
		<p>
			<label>Ingrese el numero de ficha del sisben:</label>
			<input type="text" id="ficha">
		</p>
		<p>
			<label>Ingrese la direccion de domicilio:</label>
			<input type="text" id="direccion">
		</p>
		<p>
			<label>Seleccione la zona de residencia:</label>
			<select id="zona">
				<option value="">Selecccione...</option>
				<option value="U">Urbana</option>
				<option value="R">Rural</option>
			</select>
		</p>
		<p>
			<label>Ingrese el numero telefonico:</label>
			<input type="text" id="telefono">
		</p>
		<p>
			<label>Genero del nuevo afiliado:</label>
			<br/>
			<input type="radio" name="genero" id="Genero_afil_fosygaM" value="M">Masculino
			<br/>
			<input type="radio" name="genero" id="Genero_afil_fosygaF" value="F">Femenino
		</p>
		<p>
			<label>Seleccione el nivel del sisben:</label>
			<select id="nivelsisben">
				<option value="">Seleccione...</option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="N">No tiene sisben</option>
			</select>
		</p>
		<button onClick="RegistrarActiFos()">Registrar</button>
	</div>
</div>
</body>
<script type="text/javascript">
$(document).ready(function(){
	$(".forms").tabs();
	$("button").button();
	$("#fechanac, #fecha_entidad").datepicker({
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