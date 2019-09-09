<?php 
	require_once('../models/usuario.php');
	require_once('../models/crud_usuario.php');
	require_once('../models/conexion.php');

	//inicio de sesion
	session_start();

	$usuario=new Usuario();
	$crud=new CrudUsuario();
	//verifica si la variable registrarse está definida
	//se da que está definida cuando el usuario se loguea, ya que la envía en la petición
	if (isset($_POST['registrarse'])) {
		$usuario->setNombre($_POST['usuario']);
		$usuario->setClave($_POST['pas']);
		$usuario->setTipo($_POST['tipo']);
		if ($crud->buscarUsuario($_POST['usuario'])) {
			$crud->insertar($usuario);
			header('Location: ../templates/panel_control.php');
		}else{
			header('Location: ../templates/error.php?mensaje=El nombre de usuario ya existe');
		}		
		
	}elseif (isset($_POST['entrar'])) { //verifica si la variable entrar está definida
		$usuario=$crud->obtenerUsuario($_POST['usuario'],$_POST['pas']);
		// si el id del objeto retornado no es null, quiere decir que encontro un registro en la base
		if ($usuario->getId()!=NULL AND $usuario->getTipo()!="operador") {
			$_SESSION['usuario']=$usuario; //si el usuario se encuentra, crea la sesión de usuario Admin
			header('Location: ../templates/panel_control.php'); //envia a la página que simula la cuenta
		}else if ($usuario->getId()!=NULL AND $usuario->getTipo()!="admin") {
			$_SESSION['usuario']=$usuario; //si el usuario operador se encuentra, crea la sesión Operador
			header('Location: ../templates/modulos/panel_operador.php'); //envia a la página que simula la cuenta
		}else{
			header('Location: ../templates/error.php?mensaje=Tus nombre de usuario o clave son incorrectos'); // cuando los datos son incorrectos envia a la página de error
		}
	}elseif(isset($_GET['salir'])){ // cuando presiona el botòn salir
		header('Location: ../index.php');
		unset($_SESSION['usuario']); //destruye la sesión
	}
?>