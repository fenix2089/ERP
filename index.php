<?php
	session_start();
	unset($_SESSION['usuario']);
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Login</title>
		<link href="./public/img/erp/logo.png" type="image/x-icon" rel="shortcut icon" />
		<link rel="STYLESHEET" type="text/css"  href="./public/css/fondo.css" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
		<meta charset="UTF-8"><link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js"></script>
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.css">
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.js"></script>
	</head>
	<body>
	<header>
		<div class="container purple center-align transparente">
			<span class="white-text light-blue darken-4"><h4>SERP PRO II</h4></span>
		</div>
	</header><br>
		<div class="row">
			<div class="col s5">
			  <div class="card-header  white-text col s2 grey darken-3 center-align transparente" data-background-color="purple">
			      <h6 class="title" style="text-align: center;">Control Asistencia de Empleados</h6>
			  </div>
			  <div>
			      <div class="col s6">
			        <a href="#"><button>Entrada</button></a>
			      </div><br><br>
			      <div class="col s6">
			         <a href="#"><button>Salida</button></a>
			      </div>
			  </div>
			</div>
			<div class=" white-text col s2 grey darken-3 center-align transparente" ><br>
				<div class="w3-container purple"><br>
					<span style="display:block;text-align:center;" >
						<i class="large material-icons center">people</i><br>
						<h6><b>Iniciar sesión</b></h6>
					</span><br>
				</div>
					<form class="" action="./controllers/controller_login.php" method="post">
						<p>
							<label class="white-text"><b>Usuario</b></label>
							<input class="w3-input w3-border " type="text" name="usuario" required autocomplete="off">
						</p>
						<p>
							<label class="white-text"><b>Password</b></label>
							<input class="w3-input w3-border" type="password" name="pas" required>
						</p>
						<p>
							<input type="hidden" name="entrar" value="entrar">
							<button class="btn waves-effect purple" type="submit" name="action">Acceder <i class="material-icons right">lock_open</i></button>
						</p>
					</form><br>
				</div>
			<div class="col s5 right-align transparente">
				<img src="./public/img/erp/logo.png" width="39%" height="39%" alt="ERP PII"><br>
			</div>
		</div>
	<footer>
		<?php include"./templates/body/footer.php";?>
	</footer>
	</body>
</html>