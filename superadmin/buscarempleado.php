<?php 
	session_start();
	if(!isset($_SESSION['id'])||!isset($_SESSION['name'])||!isset($_SESSION['dist']))die(header("location:default.php"));
	require_once 'class/class.usuario.php';
	$allusers=usuario::singleton();
	if(!empty($_GET['param']))
	{
		$users=$allusers->getallusers($_GET['param']);
	}
	else
	{
		$users=$allusers->getallusers("");
	}
?>
<html>
<head>
	<title></title>
</head>
<body>
	<p>
		<label>Buscar:</label>
		<input type="search" onkeyup="buscaremp(this.value)"/>
	</p>
	<div id="contentuser">
		<table border='1'>
			<th>Documento de Identidad</th><th>Primer Nombre</th><th>Segundo Nombre</th><th>Primer Apellido</th><th>Segundo Apellido</th><th>Fecha de Nacimiento</th><th>Departamento</th><th>Ciudad</th><th>Municipio Encargado</th><th colspan='2'>Acciones</th>
			<?php 
			foreach($users as $data)
			{
				echo "\n<tr>";
				echo "\n<td>".$data['iduser']."</td><td id='nombre1".$data['iduser']."'>".$data['nombre1']."</td><td id='nombre2".$data['iduser']."'>".$data['nombre2']."</td><td id='apellido1".$data['iduser']."'>".$data['apellido1']."</td><td id='apellido2".$data['iduser']."'>".$data['apellido2']."</td><td>".$data['fechanac']."</td><td>".$data['dptonac']."</td><td>".$data['ciudad']."</td><td>".$data['Desmun']."</td><td><button onClick='Modificaremp(".$data['iduser'].")'>Modificar</button></td><td><button onClick='Eliminaremp(".$data['iduser'].")'>Eliminar</button></td>";
				echo "\n</tr>";
			}
			?>
		</table>
	</div>
</body>
</html>