<?php  
require_once '../class/class.novedad.php';
$excel=Novedad::singleton();
$myexcel=$excel->generateexcel($_GET['beging'],$_GET['finish']);
?>