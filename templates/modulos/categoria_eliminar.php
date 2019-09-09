<?php  
	require_once("../../models/categorias_model.php");
	//Eliminar categoria
	$ide = $_GET['ide'];
	$services = new Categoria();
	$del = $services->Eliminar($ide);
?>