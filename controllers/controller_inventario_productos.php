<?php  
	session_start();
	if (!isset($_SESSION['usuario'])) {
		header('Location: ../index.php');
	}
	require_once("../models/producto_model.php");
	$services = new InventarioP();
	$datos = $services->Consultar();
	include"../templates/body/header.php";
	require_once("../templates/modulos/lista_inv_p.php");
?>