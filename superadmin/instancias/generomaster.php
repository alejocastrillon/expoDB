<?php  
require_once '../class/class.maestro.php';
$excel=Maestro::singleton();
$myexcel=$excel->generateexcel($_GET['beging'],$_GET['finish']);
?>