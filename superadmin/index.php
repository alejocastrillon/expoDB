<?php 
session_start();
if(!isset($_SESSION['id'])||!isset($_SESSION['name'])||!isset($_SESSION['dist'])||($_SESSION['dist']!="superadmin"))die(header("location:../default.php"));
?>
<html>
<head>
	<title>Afiliaciones.:|:.Barrios Unidos de Quibdo</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="icon" type="image/ico" href="../imagenes/favicon.ico">
	<link rel="stylesheet" type="text/css" href="../css/estilo.css">
	<link rel="stylesheet" type="text/css" href="../css/jquery-ui-1.10.4.custom.css">
	<script type="text/javascript" src="../js/jquery-1.10.2.js"></script>
	<script type="text/javascript" src="../js/jquery-ui-1.10.4.custom.js"></script>
	<script type="text/javascript" src="js/funciones.js"></script>
	<style type="text/css">
		.forms select:focus{
			box-shadow: 0px 0px 10px #FFF;
		}
		.forms input:focus{
			box-shadow: 0px 0px 10px #FFF;
		}
		.forms textarea:focus{
			box-shadow: 0px 0px 10px #FFF;
		}
	</style>
</head>
<body>
<header>
	<div id="contesess">
		<?php 
		echo "<p>".$_SESSION['name']."</p>";
		?>
	</div>
</header>
<aside>
	<ul id="menu">
		<li><a href="javascript:void(0)" onClick="Page('home')">Home</a></li>
		<li><a href="javascript:void(0)">Empleados</a>
			<ul>
				<li><a href="javascript:void(0)" onClick="Page('buscarempleado')">Buscar Empleado</a></li>
				<li><a href="javascript:void(0)" onClick="Page('registrarempleado')">Registrar Nuevo Empleado</a></li>
			</ul>
		</li>
		<li><a href="javascript:void(0)" onClick="Page('novedades')">Novedades</a></li>
		<li><a href="javascript:void(0)" onClick="Page('traslados')">Traslados</a></li>
		<li><a href="javascript:void(0)" onClick="Page('maestro')">Maestro</a></li>
		<li><a href="javascript:void(0)" onClick="Page('fosyga')">Fosyga</a></li>
		<li><a href="javascript:void(0)">Documentos</a>
			<ul>
				<li><a href="javascript:void(0)" onClick="Page('generatenov')">Generar Novedades</a></li>
				<li><a href="javascript:void(0)" onClick="Page('generatetras')">Generar Traslados</a></li>
				<li><a href="javascript:void(0)" onClick="Page('generatemaster')">Generar Maestro</a></li>
			</ul>
		</li>
		<li><a href="javascript:void(0)" onClick="Page('solicitudtraslado')">Solicitudes de Traslado</a></li>
		<li><a href="destroy.php">Cerrar Sesion</a></li>
	</ul>
</aside>
<section id="content">
	<div class="opacity">
		<div class='progressbar'></div>
	</div>
</section>
<footer>
</footer>
</body>
</html>