<?php 
	session_start();
	if(!isset($_SESSION['id'])||!isset($_SESSION['name'])||!isset($_SESSION['dist']))die(header("location:default.php"));
	require_once '../class/class.datos_varios.php';
	$datos=datos_varios::singleton();
	$data=$datos->getmun();
	$i=0;
	header('Content-type:text/xml');
	echo "<?xml version='1.0' encoding='utf-8'?>";
	echo "<municipios>";
	foreach ($data as $fila) 
	{
		echo "<municipio>";
		echo "<codigo>".$fila['CODIGO']."</codigo>";
		echo "<nombre>".$fila['Desmun']."</nombre>";
		echo "</municipio>";
		$datos=array("campocod".$i=>$fila['CODIGO'],"campodes".$i=>$fila['Desmun'],"totaldata"=>$i);
	}
	echo "</municipios>";
?>