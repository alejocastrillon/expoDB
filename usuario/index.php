<?php 
session_start();
if(!isset($_SESSION['id'])||!isset($_SESSION['name'])||!isset($_SESSION['dist']))die(header("location:../default.php"));
?>
<html>
<head>
	<title>Afiliaciones.:|:.Barrios Unidos de Quibdo</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="icon" type="image/ico" href="../imagenes/favicon.ico">
	<script type="text/javascript" src="../js/jquery-1.10.2.js"></script>
	<script type="text/javascript" src="../js/jquery-ui-1.10.4.custom.js"></script>
	<script type="text/javascript" src="js/funcionesusuario.js"></script>
	<link rel="stylesheet" type="text/css" href="css/jquery-ui-1.10.4.custom.css">
	<link rel="stylesheet" type="text/css" href="../css/estilo.css">
	<style type="text/css">
		.forms select:focus{
			box-shadow: 0px 0px 10px #333;
		}
		.forms input:focus{
			box-shadow: 0px 0px 10px #333;
		}
		.forms textarea:focus{
			box-shadow: 0px 0px 10px #333;
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
			<li><a href="javascript:void(0)">Home</a></li>
			<li><a href="javascript:void(0)" onClick="Page('novedades')">Novedad</a></li></li>
			<li><a href="javascript:void(0)" onClick="Page('traslados')">Traslados</a></li>
			<li><a href="javascript:void(0)" onClick="Page('maestro')">Maestro</a></li>
			<li><a href="javascript:void(0)" onClick="Page('fosyga')">Fosyga</a></li>
			<li><a href="javascript:void(0)">Solicitud de Traslado</a></li>
			<li><a href="../superadmin/destroy.php">Cerrar Sesion</a></li>
		</ul>
	</aside>
	<section id="content">
	</section>	
	<footer>
	</footer>
</body>

</html>