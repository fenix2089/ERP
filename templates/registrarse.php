<?php/*
	session_start();
	if (!isset($_SESSION['usuario'])) {
		header('Location: index.php');
	}*/
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Nuevo Usuario</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="../public/img/erp/logo.png" type="image/x-icon" rel="shortcut icon" />
		<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
		<meta charset="UTF-8">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js"></script>
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.css">
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.js"></script>
	</head>
	<body>
	<header>
	</header><br>
		<div class="row">
			<div class="col s4">
				
			</div>
			<div class=" white-text col s4 grey darken-3"><br>
				<div class="cyan darken-2">
					<span style="display:block;text-align:center;">
						<i class="large material-icons center">person_add</i><br>
						<h5>Nuevo Usuario</h5><br>
					</span><br>
				</div>
				<div>
					<form class="w3-container" action="../controllers/controller_login.php" method="post">
						<p>
							<label class="w3-label">Nombre de usuario o correo electrónico</label>
							<input class="w3-input w3-border" type="text" name="usuario" required autocomplete="off">
						</p>
						<p>
							<label class="w3-label">Password</label>
							<input class="w3-input w3-border" type="password" name="pas" required>
						</p>
						<p>
							<label class="w3-label">Tipo</label>
							<select class="w3-input w3-border white-text  grey darken-3" name="tipo" id="tipo" required>
								<option value="" disabled selected>Seleccione Tipo</option>
								<option value="admin">admin</option>
								<option value="operador">operador</option>
							</select>
						</p>
						<p>
							<input type="hidden" name="registrarse" value="registrarse">
							<button class="btn waves-effect cyan darken-2" type="submit" name="action">
								Crear<i class="material-icons right">perm_identity</i>
							</button>
							<a class="btn waves-effect red lighten-1" href="panel_control.php">
								<span style="color: #FFF;" >Cancelar<i class="material-icons right">cancelar</i>
								</span>
							</a>
						</p>
					</form><br>
					
				</div>
			</div>
			<div class="col s4">
				
			</div>
		</div>
	<?php include"./body/footer.php";?>
	</body>
</html>