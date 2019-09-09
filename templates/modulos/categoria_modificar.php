<?php
	require_once("../../models/categorias_model.php");
	// Actualizar categoria
	$id = $_GET['id'];
	$services = new Categoria();
	$query = "SELECT * FROM categorias WHERE id_categoria = '$id'";
	$result = $services->Obtener($query);

	foreach ($result as $key => $res) {
		$id = $res['id_categoria'];
		$nombre = $res['nombre'];
		$estado = $res['estado'];
	}

	if (isset($_POST['btn_cat'])) 
	{
    	if (empty($_POST['nom_c'])) {
        	echo "El campo nombre está vacío";
    	}elseif (empty($_POST['est_c'])) {
        	echo "El campo estado está vacío";
    	}else{
        	$asd = $services->Actualizar($_POST['id_c'], $_POST['nom_c'], $_POST['est_c']);
      }
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
		<title>Actualizar categoria</title>
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
		                      <h4 class="title">Categoria</h4>
		                      <p class="category">Actualizar</p>
		                  </div>
		                  <div class="card-content">
		                  	<form action="#" method="POST">
		                  		<div hidden class="row">
                                  <div class="col-md-12">
                                      <div class="form-group label-floating">
                                          <label class="control-label">Id</label>
                                          <input type="text" name="id_c" id=""  value="<?php echo $id;?>"class="form-control">
                                      </div>
                                  </div>
                              	</div>
                              	<div class="row">
                                  <div class="col-md-12">
                                      <div class="form-group label-floating">
                                          <label class="control-label">Nombre</label>
                                          <input type="text" name="nom_c" id="nom_c" value="<?php echo $nombre;?>" class="form-control">
                                      </div>
                                  </div>
                              	</div>
                              	<div class="row">
                                  <div class="col-md-12">
                                      <div class="form-group label-floating">
                                          <label class="control-label">Estado</label>
                                          <select type="text" name="est_c" id="" class="form-control" required>
                                          	<?php  
                                          		if ($estado == 1) 
												{
													$on = "Activo";
													$off = "Desactivó";
											?>
													<option value="$estado"><?php echo $on; ?></option>
													<option value="" disabled>Cambiar Estado</option>
													<option value="2"><?php echo $off; ?></option>
											<?php
												}
												elseif ($estado = 2) {
													$off = "Desactivó";
													$on = "Activo";
											?>
													 <option value="$estado"><?php echo $off; ?></option>
													 <option value="" disabled>Cambiar Estado</option>
													 <option value="1"><?php echo $on; ?></option>

											<?php
												}
                                          	?>
                                          </select>
                                      </div>
                                  </div>
                              	</div>
                              		 <button type="submit" name="btn_cat" class="btn btn-primary pull-right">Actualizar categoria</button>
                              <div class="clearfix"></div>
							</form>
							<div class="text-left">
							    <a href="../../controllers/controller_categorias.php"><button class="btn btn-danger">Cancelar</button></a>
							</div>
		                  </div>
		  		 	</div>
		  		 </div>
		  	</div>
		  </div>
	</body>
</html>

