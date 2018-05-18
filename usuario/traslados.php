<?php 
session_start();
if(!isset($_SESSION['id'])||!isset($_SESSION['name'])||!isset($_SESSION['dist']))die(header("../location:default.php"));
?>
<html>
<head>
	<title></title>
</head>
<body>
	<div class="forms">
		<ul>
			<li><a href="#datosfosyga">Datos Fosyga</a></li>
			<li><a href="#datoscedula">Datos Documento</a></li>
			<li><a href="#datatraslado">Datos de Traslado</a></li>
		</ul>
		<div id="datosfosyga">
			<p>
				<label>Seleccione el tipo de documento que aparece en Fosyga</label>
				<select id="Tipo_Document_fosyga">
					<option value="">Seleccione tipo de documento</option>
					<option value="CC">Cedula de Ciudadania</option>
					<option value="RC">Registro Civil</option>
					<option value="TI">Tarjeta de Identidad</option>
					<option value="CE">Cedula de Extranjeria</option>
				</select>
			</p>
			<p>
				<label>Ingrese el numero de documento que aparece en Fosyga:</label>
				<input type="text" id="Numero_Identificacion_Afil_fosyga">
			</p>
			<p>
				<label>Ingrese el primer apellido que aparece en Fosyga:</label>
				<input type="text" id="Apellido_1_fosyga">
			</p>
			<p>
				<label>Ingrese el segundo apellido que aparece en Fosyga:</label>
				<input type="text" id="Apellido_2_fosyga">
			</p>
			<p>
				<label>Ingrese el primer nombre que aparece en Fosyga:</label>
				<input type="text" id="Nombre_1_fosyga">
			</p>
			<p>
				<label>Ingrese el segundo nombre que aparece en Fosyga:</label>
				<input type="text" id="Nombre_2_fosyga">
			</p>
			<p>
				<label>Ingrese la fecha de nacimiento que aparece en Fosyga:</label>
				<input type="text" id="Fecha_Nacimiento_fosyga">
			</p>
			<p>
				<label>Genero del Afiliado que aparece en Fosyga:</label>
				<br/>
				<input type="radio" name="sexofosyga" id="Genero_afil_fosygaM" value="M">Masculino
				<br/>
				<input type="radio" name="sexofosyga" id="Genero_afil_fosygaF" value="F">Femenino
			</p>
		</div>
		<div id="datoscedula">
			<p>
				<label>Seleccione el tipo de documento</label>
				<select id="Tipo_Documento">
					<option value="">Seleccione tipo de documento</option>
					<option value="CC">Cedula de Ciudadania</option>
					<option value="RC">Registro Civil</option>
					<option value="TI">Tarjeta de Identidad</option>
					<option value="CE">Cedula de Extranjeria</option>
				</select>
			</p>
			<p>
				<label>Ingrese el numero de documento:</label>
				<input type="text" id="Numero_IdentificacionAfil">
			</p>
			<p>
				<label>Ingrese el primer apellido:</label>
				<input type="text" id="Apellido1">
			</p>
			<p>
				<label>Ingrese el segundo apellido:</label>
				<input type="text" id="Apellido2">
			</p>
			<p>
				<label>Ingrese el primer nombre:</label>
				<input type="text" id="Nombre1">
			</p>
			<p>
				<label>Ingrese el segundo nombre:</label>
				<input type="text" id="Nombre2">
			</p>
			<p>
				<label>Ingrese la fecha de nacimiento:</label>
				<input type="text" id="FechaNacimiento">
			</p>
			<p>
				<label>Genero del Afiliado</label>
				<br/>
				<input type="radio" name="sexocedula" id="Genero_afiliadoM" value="M">Masculino
				<br/>
				<input type="radio" name="sexocedula" id="Genero_afiliadoF" value="F">Femenino
			</p>
		</div>
		<div id="datatraslado">
			<p>
				<label>Seleccione la zona residencial</label>
				<select id="zona">
					<option value="">Seleccione la zona residencial</option>
					<option value="U">Urbana</option>
					<option value="R">Rural</option>
				</select>
			</p>
			<p>
				<label>Seleccione el tipo de poblacion</label>
				<select id='Tipopob'>
					<?php 
						require_once '../superadmin/class/class.tipo_pob.php';
						$codpob=tipo_pob::singleton();
						$datapob=$codpob->getpob();
						echo $datapob;
					?>
				</select>
			</p>
			<p>
				<label>Seleccione el nivel del sisben</label>
				<select id="Nivel_Sisben">
					<option value="">Seleccione nivel de sisben</option>
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
					require_once '../superadmin/class/class.observaciones.php';
					$dataoption=observaciones::singleton();
					$datos=$dataoption->getoptionobservaciones();
					?>
				</select>
			</p>
			<p>
				<label>Estado que aparece en FOSYGA:</label>
				<select id="estado">
					<option value="">Seleccione...</option>
					<option value="ACTIVO">ACTIVO</option>
					<option value="RETIRADO">RETIRADO</option>
					<option value="DESAFILIADO">DESAFILIADO</option>
				</select>
			</p>
			<p>
				<label>Seleccione la eps del afiliado:</label>
				<select id="EPSS">
					<option value="">Seleccione...</option>
					<?php  
						require_once '../superadmin/class/class.epss.php';
						$geteps=epss::singleton();
						$dataeps=$geteps->geteps();
						foreach($dataeps as $eps)
						{
							echo "<option value='".$eps['NOMBRE_EPS']."'>".$eps['NOMBRE_EPS']."</option>";
						}
					?>
				</select>
			</p>
			<p>
				<label>Departamento de Afiliacion</label>
				<select id="DPTO" onChange="CiudadCod(this.value)">
					<option value=''>Seleccione...</option>
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
			</p>
			<p>
				<label>Ciudad de Afiliacion:</label>
				<select id="MUNICIPIO">
					<option value=''>Seleccione...</option>
				</select>
			</p>
			<p>
				<label>Ingrese la direccion de domicilio:</label>
				<input type="text" id="Direccion">
			</p>
			<p>
				<label>Ingrese el numero de telefono:</label>
				<input type="text" id="Telefono">
			</p>
			<p>
				<label>Ingrese el numero de ficha del sisben:</label>
				<input type="text" id="Ficha">
			</p>
			<button onClick="RegistrarTraslado()">Registrar Traslado</button>
		</div>
	</div>
</body>
<script type="text/javascript">
$(document).ready(function(){
	$(".forms").tabs();
	$("#Fecha_Nacimiento_fosyga, #FechaNacimiento").datepicker({
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
			$("#MUNICIPIO").html(xmlhttp.responseText);
		}
	}
	xmlhttp.open("GET","../superadmin/instancias/nommuni.php?cod="+cod, true);
	xmlhttp.send();
}
</script>
</html>