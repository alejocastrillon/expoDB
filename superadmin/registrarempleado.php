<?php 
	session_start();
	if(!isset($_SESSION['id'])||!isset($_SESSION['name'])||!isset($_SESSION['dist']))die(header("location:default.php"));
	require_once 'class/class.datos_varios.php';
	$datos=datos_varios::singleton();
	$data=$datos->getmun();
?>
<html>
<head>
	<title></title>
	<script type="text/javascript" src="js/ciudad.js"></script>
</head>
<body>
<div class="forms">
	<ul>
		<li><a href="#datosemp">Datos Personales</a></li>
		<li><a href="#lugarfechanac">Lugar y fecha de Nacimiento</a></li>
		<li><a href="#moduser">Usuario</a></li>
	</ul>
	<div id="datosemp">
		<p>
			<label>Ingrese el numero de identificacion del nuevo empleado:</label>
			<input type="text" id="iduser"/>
		</p>
		<p>
			<label>Ingrese el primer nombre:</label>
			<input type="text" id="nombre1"/>
		</p>
		<p>
			<label>Ingrese el segundo nombre:</label>
			<input type="text" id="nombre2"/>
		</p>
		<p>
			<label>Ingrese el primer apellido:</label>
			<input type="text" id="apellido1"/>
		</p>
		<p>
			<label>Ingrese el segundo apellido:</label>
			<input type="text" id="apellido2"/>
		</p>
	</div>
	<div id="lugarfechanac">
		<p>
			<label>Seleccione la fecha de nacimiento:</label>
			<input type="text" id="fechanac"/>
		</p>
		<p>
			<label>Seleccione el departamento de nacimiento:</label>
		</p>
		<select id="departamento" onChange="CiudadCod(this.value)">
			<option value="0">Escoga su departamento</option>
          	<option value="AMAZONAS">Amazonas</option>
			<option value="ANTIOQUIA">Antioquia</option>
			<option value="ARAUCA">Arauca</option>
			<option value="ATLANTICO">Atlantico</option>
			<option value="BOGOTA">Bogota</option>
			<option value="BOLIVAR">Bolivar</option>
			<option value="BOYACA">Boyaca</option>
			<option value="CALDAS">Caldas</option>
			<option value="CAQUETA">Caqueta</option>
			<option value="CASANARE">Casanare</option>
			<option value="CAUCA">Cauca</option>
			<option value="CESAR">Cesar</option>
			<option value="CORDOBA">Cordoba</option>
			<option value="CUNDINAMARCA">Cundinamarca</option>
			<option value="CHOCO">Choco</option>
			<option value="GUAINIA">Guainia</option>
			<option value="GUAVIARE">Guaviare</option>
			<option value="HUILA">Huila</option>
			<option value="LA GUAJIRA">La Guajira</option>
			<option value="MAGDALENA">Magdalena</option>
			<option value="META">Meta</option>
			<option value="NARIÑO">Nariño</option>
			<option value="N. DE SANTANDER">Norte de Santander</option>
			<option value="PUTUMAYO">Putumayo</option>
			<option value="QUINDIO">Quindio</option>
			<option value="RISARALDA">Risaralda</option>
			<option value="SAN ANDRES">San Andres</option>
			<option value="SANTANDER">Santander</option>
			<option value="SUCRE">Sucre</option>
			<option value="TOLIMA">Tolima</option>
			<option value="VALLE DEL CAUCA">Valle del Cauca</option>
			<option value="VAUPES">Vaupes</option>	
			<option value="VICHADA">Vichada</option>
		</select>
		<p>
			<label>Seleccione la ciudad de nacimiento:</label>
		</p>
		<select id="ciudad">
			<option value="">Seleccione...</option>
		</select>
	</div>
	<div id="moduser">
		<p>
			<label>Seleccione el municipio a asignar al nuevo empleado</label>
		</p>
		<select id="codmun">
			<option value=''>Seleccione...</option>
			<?php
			foreach ($data as $fila) 
			{
				echo "<option value='".$fila['CODIGO']."'>".$fila['Desmun']."</option>";
			} 
			?>
		</select>
		<p>
			<label>Ingrese el nombre de usuario:</label>
			<input type="text" id="nameuser"/>
		</p>
		<p id="mostrcontr">
			<label>¿Desea <a href="javascript:void(0)" onClick="Contrasena('manual')">ingresar una contraseña</a> o que <a href="javascript:void(0)" onClick="Contrasena('generar')"> se genere la contraseña?</a></label>
		</p>
		<button onClick="RegEmp()">Registrar</button>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function(){
	$(".forms").tabs();
	$("#fechanac").datepicker({
		yearRange:"1900:",
		showAnim: "explode",
		dateFormat:"yy/mm/dd",
		monthNames:["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"],
		monthNamesShort:["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"],
		dayNamesMin: [ "Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sab" ],
		changeYear:true,
		changeMonth:true
	});
	$("button").button();
});
function CiudadCod(cod)
{
	var xmlhttp;
	if(window.XMLHttpRequest)
	{
		xmlhttp=new XMLHttpRequest();
	}
	else
	{
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function()
	{
		if(xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			$("#ciudad").html(xmlhttp.responseText);
		}
	}
	xmlhttp.open("GET","instancias/nommuni.php?cod="+cod, true);
	xmlhttp.send();
}
</script>
</body>
</html>