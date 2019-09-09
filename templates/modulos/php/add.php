
<?php
	require '../clases/cliente.php';
	
	$nombres=$_POST['nombres'];
	$apellidos=$_POST['apellidos'];
	$direccion=$_POST['direccion'];
	$telefono=$_POST['telefono'];
	$categoria=$_POST['categoria'];

	echo "<pre>";
	print_r($_POST);

	$cliente=new Cliente($nombres, $apellidos, $direccion, $telefono, $categoria);

	$resultado=$cliente->Registrar();

	if ($resultado){
		header("location:../clientes.php");
	}else{
		echo "<br>";
		echo "<br>";
		exit(json_encode(array('estado'=>false, 'mensaje'=>'error al registrar')));
	}

	echo "<br>";
	var_dump($resultado);

?>