<?php
	session_start();
	if (!isset($_SESSION['usuario'])) {
		header('Location: ../index.php');
	}
	require_once("../models/proveedores_model.php");
	$services = new Proveedores();
	$datos = $services->ConsultarP();
	include"../templates/body/header.php";
	require_once("../templates/modulos/lista_proveedores.php");

?>