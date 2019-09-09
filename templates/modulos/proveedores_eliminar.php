<?php  
	require_once("../../models/proveedores_model.php");
	//Eliminar categoria
	$ide = $_GET['ide'];
	$services = new Proveedores();
	$del = $services->EliminarP($ide);
?>