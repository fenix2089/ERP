<?php
	include_once("../../models/listas.php");
	$crud = new Listas();
	/**/
	$update = $crud->Consultar();
	/**/
	session_start();
	if (!isset($_SESSION['usuario'])) {
		header('Location: index.php');
	}
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Lista Usuarios</title>
		<link href="../../public/img/erp/logo.png" type="image/x-icon" rel="shortcut icon" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
		<meta charset="UTF-8"><link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js"></script>
		<script type="text/javascript" src="../../public/js/js.js"></script>
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.css">
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.js"></script>
	</head>
	<body>
		<?php include"../body/nav_2.php";?><br>
		<div class="container">
			<div class="row">
				<div class="col s4">
					<table class="table highlight" border="1">
						<tr>
							<td><b>N°</b></td>
							<td><b>Usuario</b></td>
							<td><b>Tipo</b></td>
						</tr>
						<?php
							$cont=0; /*CONTADOR A 0*/
							$cont++; /*CONTADOR A 0+1*/
							for ($i = 0; $i < count($update); $i++) {
						?>
						<tr>
							<td><?php echo $update[$i]["Id"];; ?></td>
							<td><?php echo $update[$i]["nombre"];; ?></td>
							<td><?php echo $update[$i]["tipo"];; ?></td>
						</tr>
						<?php
							}
						?>
					</table>
				</div>
			</div>
		</div>
	</body>
</html>