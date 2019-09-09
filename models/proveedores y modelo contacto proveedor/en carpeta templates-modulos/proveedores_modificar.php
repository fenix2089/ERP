<?php
	require_once("../../models/proveedores_model.php");
	// Actualizar categoria
	$id = $_GET['id'];
	$services = new Proveedores();
	$query = "SELECT * FROM proveedores WHERE id_proveedor = '$id'";
	$result = $services->ObtenerP($query);

	foreach ($result as $key => $res) 
	{
		$idp = $res['id_proveedor'];
		$nombre = $res['nombre'];
		$direccion= $res['direccion'];
        $tf = $res['telefono_fijo'];
        $cel = $res['celular'];
        $email = $res['email'];
        $id_c = $res['id_contacto'];
	}
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		 <meta charset="utf-8" />
	    <link rel="apple-touch-icon" sizes="76x76" href="../../img/apple-icon.png" />
	    <link rel="icon" type="image/png" href="../../img/favicon.png" />
	    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="UTF-8">
		<title>Actualizar proveedores</title>
		<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
	    <meta name="viewport" content="width=device-width" />
	    <link href="../../css/bootstrap.min.css" rel="stylesheet" />
	    <link href="../../css/material-dashboard.css?v=1.2.0" rel="stylesheet" />
	    <link href="../../css/demo.css" rel="stylesheet" />
	    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
	    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
	</head>
	<body>
		<?php include"../body/navmain.php";?>
		<div class="content">
		  <div class="container-fluid">
		  	<div class="row">
		  		 <div class="col-md-8">
		  		 	<div class="card">
		  		 		<div class="card-header" data-background-color="purple">
		                      <h4 class="title">Proveedores</h4>
		                      <p class="category">Actualizar</p>
		                  </div>
		                  <div class="card-content">
		                  	<form action="#" method="POST">
		                  		<div  class="row">
                                  <div class="col-md-12">
                                      <div class="form-group label-floating">
                                          <label class="control-label">Código</label>
                                          <input type="text" name="id_p" id=""  value="<?php echo $idp;?>"class="form-control">
                                      </div>
                                      <div class="form-group label-floating">
                                          <label class="control-label">Nombre</label>
                                          <input type="text" name="nom_p" id="nom_p" value="<?php echo $nombre;?>" class="form-control">
                                      </div>
                                      <div class="form-group label-floating">
                                          <label class="control-label">Dirección</label>
                                          <input type="text" name="dir_p" id="dir_p" value="<?php echo $direccion;?>" class="form-control">
                                      </div>
                                       <div class="form-group label-floating">
                                          <label class="control-label">Telefono Fijo</label>
                                          <input type="text" name="tel_p" id="tel_p" value="<?php echo $tf;?>" class="form-control">
                                      </div>
                                       <div class="form-group label-floating">
                                          <label class="control-label">Celular</label>
                                          <input type="text" name="cel_p" id="cel_p" value="<?php echo $cel;?>" class="form-control">
                                      </div>
                                       <div class="form-group label-floating">
                                          <label class="control-label">Email</label>
                                          <input type="text" name="ema_p" id="ema_p" value="<?php echo $email;?>" class="form-control">
                                      </div>
                                       <div class="form-group label-floating">
                                          <label class="control-label">Código Contacto</label>
                                          <input type="text" name="cont_p" id="cont_p" value="<?php echo $id_c;?>" class="form-control">
                                      </div>
                                  </div>
                              	</div>
                        		 <button type="submit" name="btn_prov" class="btn btn-primary pull-right">Actualizar proveedor</button>
                              <div class="clearfix"></div>
							</form>
<?php 
if (isset($_POST['btn_prov']))
{
 	if (empty($_POST['nom_p'])) {
		echo "El campo nombre está vacío";
	}
	elseif (empty($_POST['dir_p'])) {
		echo "El campo direccion está vacío";
	}
	elseif (empty($_POST['tel_p'])) {
		echo "El campo telefono está vacío";
	}
	elseif (empty($_POST['cel_p'])) {
		echo "El campo celular está vacío";
	}
	elseif (empty($_POST['ema_p'])) {
		echo "El campo nombre está vacío";
	}
	elseif (empty($_POST['cont_p'])){
		echo "El campo nombre está vacío";
	}
	else
	{
		$asd = $services->ActualizarP($_POST['id_p'], $_POST['nom_p'], $_POST['dir_p'], $_POST['tel_p'], $_POST['cel_p'], $_POST['ema_p'], $_POST['cont_p']);
	}
 }
?>
							<div class="text-left">
							    <a href="../../controllers/controller_proveedores.php"><button class="btn btn-danger">Cancelar</button></a>
							</div>
		                  </div>
		  		 	</div>
		  		 </div>
		  	</div>
		  </div>
	<footer> <?php include"../body/footermain.php";?></footer>
	</body>
	<footer> <?php include"../body/footermain2.php";?></footer>
</html>

