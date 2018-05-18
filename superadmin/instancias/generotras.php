<?php  
require_once '../class/class.traslados.php';
$excel=traslados::singleton();
$myexcel=$excel->generateexcel($_GET['beging'],$_GET['finish']);
?>