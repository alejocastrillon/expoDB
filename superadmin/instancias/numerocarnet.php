<?php 
require_once '../class/class.novedad.php';
$numcarnet=Novedad::singleton();
$numcarnet->getnumcarnet($_GET['mun']);
?>