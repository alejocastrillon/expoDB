<?php 
session_start();
if(!isset($_SESSION['id'])||!isset($_SESSION['name'])||!isset($_SESSION['dist']))die(header("location:default.php"));
require_once 'class/class.codigos_novedades.php';
$codnov=codigos_novedades::singleton();
$datanov=$codnov->getnov();
?>
<html>
<head>
	<title></title>
</head>
<body>
	<div class="forms">
		<ul>
			<li><a href="#datosprin">Datos Principales</a></li>
			<li><a href="#datosmod">Modificacion de Datos</a></li>
			<li><a href="#datossisben">Sisben</a></li>
		</ul>
		<div id="datosprin">
			<p>
				<label>Observaciones:</label>
				<select id="observacion">
					<option value="">Seleccione el tipo de observacion</option>
					<?php  
					require_once 'class/class.observaciones.php';
					$dataoption=observaciones::singleton();
					$datos=$dataoption->getoptionobservaciones();
					?>
				</select>
			</p>
			<p>
				<label>Tipo de Documento</label>
				<select id="tipodocumento">
					<option value="">Seleccione...</option>
					<option value="CC">Cedula de Ciudadania</option>
					<option value="TI">Tarjeta de identidad</option>
					<option value="RC">Registro Civil</option>
				</select>
			</p>
			<p>
				<label>Ingrese el documento del afiliado:</label>
				<input type="text" id="idafiliado"/>
			</p>
			<p>
				<label>Primer Apellido:</label>
				<input type="text" id="apellido1" placeholder="Primer Apellido"/>
			</p>
			<p>
				<label>Segundo Apellido:</label>
				<input type="text" id="apellido2" placeholder="Segundo Apellido"/>
			</p>
			<p>
				<label>Primer Nombre</label>
				<input type="text" id="nombre1" placeholder="Primer Nombre"/>
			</p>
			<p>
				<label>Segundo Nombre:</label>
				<input type="text" id="nombre2" placeholder="Segundo Nombre"/>
			</p>
			<p>
				<label>Fecha de Nacimiento:</label>
				<input type="text" id="fechanac" placeholder="dd/mm/AAAA"/>
			</p>
			<p>
				<label>Departamento de Afiliacion</label>
				<select id="dptoafi" onChange="CiudadCod(this.value)">
					<option value=''>Seleccione...</option>
					<option value="91">Amazonas</option>
            		<option value="5">Antioquia</option>
                	<option value="81">Arauca</option>
                	<option value="8">Atlántico</option>
                	<option value="13">Bolívar</option>
                	<option value="15">Boyacá</option>
               		<option value="17">Caldas</option>
	                <option value="18">Caquetá</option>
    	            <option value="85">Casanare</option>
                	<option value="19">Cauca</option>
        	        <option value="20">Cesar</option>
            	    <option value="27">Chocó</option>
	                <option value="23">Córdoba</option>
    	            <option value="25">Cundinamarca</option>
        	        <option value="94">Guainía</option>
            	    <option value="95">Guaviare</option>
                	<option value="44">Guajira</option>
	                <option value="41">Huila</option>
    	            <option value="47">Magdalena</option>
        	        <option value="50">Meta</option>
            	    <option value="52">Nariño</option>
                	<option value="54">Norte de Santander</option>
	                <option value="86">Putumayo</option>
    	            <option value="63">Quindío</option>
                	<option value="66">Risaralda</option>
        	        <option value="88">San Andrés</option>
            	    <option value="68">Santander</option>
                	<option value="70">Sucre</option>
	                <option value="73">Tolima</option>
    	            <option value="76">Valle del Cauca</option>
        	        <option value="97">Vaupés</option>
            	    <option value="99">Vichada</option>
				</select>
			</p>
			<p>
				<label>Ciudad de Afiliacion:</label>
				<select id="ciudadafi">
					<option value=''>Seleccione primero el departamento..</option>
				</select>
			</p>
		</div>
		<div id="datosmod">
			<p>
				<label>Tipo de Novedad:</label>
				<select id="tiponov" onChange="CamposNovedad(this.value)">
					<?php 
					echo $datanov;
					?>
				</select>
			</p>
			<p id="camposnov">
			</p>
		</div>
		<div id="datossisben">
			<p>
				<label>Ficha del Sisben</label>
				<input type='text' id='ficha'/>
			</p>
			<p>
				<label>Nivel de Sisben</label>
				<select id='nivel'>
					<option value=''>Seleccione...</option>
					<option value='1'>1</option>
					<option value='2'>2</option>
					<option value='3'>3</option>
					<option value='N'>No tiene sisben</option>
				</select>
			</p>
			<p>
				<label>Escoga el tipo de poblacion</label>
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
				<label>Seleccione el area donde vive:</label>
				<select id="zona">
					<option value="">Seleccione...</option>
					<option value="U">Urbana</option>
					<option value="R">Rural</option>
				</select>
			</p>
			<p>
				<label>Seleccione el genero del afiliado:</label>
				<br/>
				<input type="radio" name="genero" id="Genero_afiliadoM" value="M">Masculino
				<br/>
				<input type="radio" name="genero" id="Genero_afiliadoF" value="F">Femenino
			</p>
			<div id="button">
			</div>
		</div>
	</div>
</body>
<script type="text/javascript">
$(document).ready(function(){
	$(".forms").tabs();
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
function CiudadCod(id)
{
	$.ajax({
		url:"instancias/municod.php?cod="+id,
		type:"GET",
		success:function(data)
		{
			$("#ciudadafi").html(data);
		}
	});
}
function CamposNovedad(type)
{
	if(type=="N01")
	{
		x="<label>Ingrese el tipo de documento del usuario</label><select id='valor1'><option value=''>Seleccione...</option><option value='CC'>Cedula de Ciudadania</option><option value='TI'>Tarjeta de Identidad</option><option value='RC'>Registro Civil</option></select><label>Ingrese el numero de identificacion:</label><input type='text' id='valor2'/><label>Fecha de Nacimiento</label><input type='text' id='valor3'/><label>Tipo de actualizacion</label><select id='valor4'><option value=''>Seleccione...</option><option value='1'>Cambio del numero de identificacion o la fecha de nacimiento</option><option value='0'>Cambio del Tipo de Documento</option></select><label>Direccion de Domicilio</label><input type='text' id='direcciondomi'/><label>Telefono</label><input type='text' id='telefono'/>";
		$("#button").empty();
		$("#button").append("<button onClick=Registrarnov('"+type+"')>Registrar</button>");
		$("button").button();
	}
	else if(type=="N02")
	{
		x="<label>Ingrese el primer nombre</label><input type='text' id='valor1'/><label>Ingrese el Segundo nombre</label><input type='text' id='valor2'/><label>Direccion de Domicilio</label><input type='text' id='direcciondomi'/><label>Telefono</label><input type='text' id='telefono'/>";
		$("#button").empty();
		$("#button").append("<button onClick=Registrarnov('"+type+"')>Registrar</button>");
		$("button").button();
	}
	else if(type=="N03")
	{
		x="<label>Ingrese el primer apellido</label><input type='text' id='valor1'/><label>Ingrese el segundo apellido</label><input type='text' id='valor2'/><label>Direccion de Domicilio</label><input type='text' id='direcciondomi'/><label>Telefono</label><input type='text' id='telefono'/>";
		$("#button").empty();
		$("#button").append("<button onClick=Registrarnov('"+type+"')>Registrar</button>");
		$("button").button();
	}
	else if(type=="N04")
	{
		x="<input type='hidden' value='76' id='valor1'/><label>Escoga el municipio</label><select id='valor2'><option value=''>Seleccione...</option><option value='20'>Alcala</option><option value='41'>Ansermanuevo</option><option value='100'>Bolivar</option><option value='126'>Calima-Darien</option><option value='147'>Cartago</option><option value='246'>El Cairo</option><option value='318'>Guacari</option><option value='400'>La Union</option><option value='497'>Obando</option><option value='823'>Toro</option></select><label>Direccion de Domicilio</label><input type='text' id='direcciondomi'/><label>Telefono</label><input type='text' id='telefono'/>";
		$("#button").empty();
		$("#button").append("<button onClick=Registrarnov('"+type+"')>Registrar</button>");
		$("button").button();
	}
	else if(type=="N19"||type=="N22")
	{
		$("<div>Tipo de novedad no valido</div>").dialog({
			modal:true,
			title:'Validacion',
			buttons:{
				"Aceptar":function()
				{
					$(this).dialog("close");
				}
			}
		});
		$("#button").empty();
	}
	else if(type=="N09"||type=="N21"||type=="N20")
	{
		x="";
		$("#button").empty();
		$("#button").append("<button onClick=Registrarnov('"+type+"')>Registrar</button>");
		$("button").button();
	}
	else if(type=="N14")
	{
		x="<input type='hidden' value='RE' id='valor1'/>";
		$("#button").empty();
		$("#button").append("<button onClick=Registrarnov('"+type+"')>Registrar</button>");
		$("button").button();
	}
	else if(type="N17")
	{
		x="<label>Direccion de Domicilio</label><input type='text' id='direcciondomi'/><label>Telefono</label><input type='text' id='telefono'/>";
		$("#button").empty();
		$("#button").append("<button onClick=Registrarnov('"+type+"')>Registrar</button>");
		$("button").button();

	}
	$("#camposnov").html(x);
	$("#valor3").datepicker({
		yearRange:"1900:",
		showAnim: "explode",
		dateFormat:"dd/mm/yy",
		monthNames:["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"],
		monthNamesShort:["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"],
		dayNamesMin: [ "Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sab" ],
		changeYear:true,
		changeMonth:true
	});
}
</script>
</html>