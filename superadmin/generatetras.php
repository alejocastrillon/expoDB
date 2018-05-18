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
			<li><a href="#generate">Generar Excel de Traslados</a></li>
		</ul>
		<div id="generate">
			<p>
				<label>Ingrese la fecha de comienzo:</label>
				<input type="text" id="fechacom">
			</p>
			<p>
				<label>Ingrese la fecha de final:</label>
				<input type="text" id="fechafin">
			</p>
			<button onClick="GenerateTras()">Generar Excel</button>
		</div>
	</div>
</body>
<script type="text/javascript">
$(document).ready(function(){
	$(".forms").tabs();
	$("#fechacom, #fechafin").datepicker({
		yearRange:"1900:",
		showAnim: "explode",
		dateFormat:"dd/mm/yy",
		monthNames:["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"],
		monthNamesShort:["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"],
		dayNamesMin: [ "Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sab" ],
		changeYear:true,
		changeMonth:true,
		maxDate:0
	})
})
</script>