<?php
	session_start();
	if (!isset($_SESSION['usuario'])) {
		header('Location: index.php');
	}
	require_once("../models/categorias_model.php");
	$services = new Categoria();
	$datos = $services->Consultar();
	include"../templates/body/header.php";
	require_once("../templates/modulos/lista_categorias.php");

?>