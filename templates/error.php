<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Error</title>
		<link href="../public/img/erp/logo.png" type="image/x-icon" rel="shortcut icon" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
		<meta charset="UTF-8">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js"></script>
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.css">
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.js"></script>
	</head>
	<body class="grey lighten-1">
		<header>

		</header>
		<div class="container"><br>
			<div class="">
				<?php  
					if ($_GET['mensaje'] == "El nombre de usuario ya existe") {
				?>
						 	<button class="btn waves-effect red lighten-1">
						 		<a class="brand-logo white-text" href='./panel_control.php'><i class="material-icons right">arrow_back</i>Intentar otro nombre de usuario</a>
						 	</button><br>
				<?php
						 	echo $_GET['mensaje'] ;
						 	echo "<img src='../public/img/error/erroru.png' width='350' height'200' alt='Error Usuario'><br>";
					}
					else if ($_GET['mensaje'] =="Tus nombre de usuario o clave son incorrectos") 
					{
				?>
						<button class="btn waves-effect red lighten-1">
							<a class="brand-logo white-text" href='../index.php'><i class="material-icons right">arrow_back</i>Regresar a Login</a>
						</button><br>
				<?php   
						echo $_GET['mensaje'];
						echo "<img src='../public/img/error/error300.png'  alt='Error Usuario'><br>";
					}
				?>
			</div>
		</div>
	</body>
</html>