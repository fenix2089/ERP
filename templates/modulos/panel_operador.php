<?php 
	session_start();
	if (!isset($_SESSION['usuario'])) {
		header('Location: index.php');
	}
?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Módulos</title>
		<link href="../../public/img/erp/logo.png" type="image/x-icon" rel="shortcut icon" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
		<meta charset="UTF-8">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js"></script>
		<script type="text/javascript" src="../../public/js/js.js"></script>
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.css">
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.js"></script>
	</head>
	<body>
		<?php include"../body/nav_operador.php";?><br><br><br>
		<div class="container">
			Panel del Operador o en dado caso de la persona encargada de realizar las ventas y facturaciones. <br>
			Aqui poner los accesos a modulos de catalogo de Productos, Ventas, Clientes, Facturación.
		</div>
	</body>
</html>