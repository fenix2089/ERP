<!doctype html>
<html lang="es">
	<head>
	    <meta charset="utf-8" />
	    <link rel="apple-touch-icon" sizes="76x76" href="../../img/apple-icon.png" />
	    <link rel="icon" type="image/png" href="../../img/favicon.png" />
	    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	    <title>Consulta Recibos de Compras</title>
	    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
	    <meta name="viewport" content="width=device-width" />
	    <link href="../../css/bootstrap.min.css" rel="stylesheet" />
	    <link href="../../css/material-dashboard.css?v=1.2.0" rel="stylesheet" />
	    <link href="../../css/demo.css" rel="stylesheet" />
	    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
	    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
		<meta charset="UTF-8"><link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	    <!-- Compiled and minified JavaScript -->
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
	    <style type="text/css" media="print">
			.oculto {display:none}
		</style>
		<style media='print'>
			.button{display:none;} /* esto oculta los input cuando imprimes */
		</style>
		<style type="text/css">
			.transparente{
				opacity: 0.8;
				-moz-opacity: 0.8;
				filter: alpha(opacity=80);
				-khtml-opacity: 0.8;
			}
		</style>
	</head>
<?php  
	require_once("../../models/producto_model.php");

	$id_e = $_POST['id_e'];
	$fi = $_POST['fi'];
	$ff = $_POST['ff'];
	$id_compra = $_POST['id_o'];

	$services = new InventarioP();
	$datos = $services->Consultar1($id_e, $fi, $ff, $id_compra);
	$datos2 = $services->Consultar2($id_e, $fi, $ff, $id_compra);

	date_default_timezone_set('America/El_Salvador');
	$fecha = Date('d/M/Y');
	$hora= Date('h:i:s A');
?>
<?php  
		if ($datos == false) {
			echo "<div class='container'> <b><h6> No se encuentran registros de abastecimientos para el empleado con ID # ";
			echo $id_e;
			echo "</h6></b>";		
?>
			<a href="./consultas_recibos_compra.php"><button class="oculto  btn red darken-4" type='button' value='cancelar' />Regresar</button></a>
			</div>
<?php
		}
		elseif ($datos == true) 
		{
		
		date_default_timezone_set('America/El_Salvador');
		$fecha = Date('d/M/Y');
		$hora= Date('h:i:s A');
?>
	<body>
		<div class="content"><br><br>
			<div class="container-fluid">
				<div class="row">
					<div class="col-12 col-sm-12 col-md-12">
						<div class="card ">
							<div class="card-header oculto" data-background-color="purple">
								<h6 class="title">Recibo de Abastecimiento</h6>
							</div>
							<div class="card-content">
								<div class="row">
									<div class="col s6">
										<img  src="../../public/img/erp/logo.png"  style="width: 39%;" >
									</div>
									<div class="col s6 " style="font-weight: bold;">
										<label for="">N° RECIBO: </label><?php printf('%010d', $datos2[6]); ?><br>
										<label for="">DIRECIÓN : </label><br>
										<label for="">PROVEEDOR : </label><?php echo " ". $datos2[5]; ?><br>
									</div>
									<div class="col s12">
										<table class="table highlight">
									  	<thead>
									  	</thead>
									  	<tbody>
									  		<tr>
												<td colspan="9" style="text-left: right;"><b><label for="">EMPLEADO:  </label> <?php echo $datos2[1]; ?></b></td>
											</tr>
											<tr>
												<td colspan="9"><label for=""><b>FECHA: </b></label><?php echo $fecha; ?> &nbsp;&nbsp;&nbsp; <label for=""><b>HORA: </b></label><?php echo $hora; ?> </td>
											</tr>
									  	</tbody>
									  	<thead>
											<th><b>ID</b></th>
											<th><b>FECHA</b></th>
											<th><b>PRODUCTO</b></th>
											<th><b>PRECIO</b></th>
											<th><b>CANTIDAD</b></th>
											<th><b>DESCUENTO</b></th>
											<th><b>TOTAL FINAL</b></th>
									  	</thead>
										<?php
											for ($i = 0; $i < count($datos); $i++) {
										?>
										<tbody>
											
											<tr>
												<td><?php echo $datos[$i]["ID_PRODUCTO"]; ?></td>
												<td><?php echo $datos[$i]["FECHA_COMPRA"]; ?></td>
												<td><?php echo $datos[$i]["PRODUCTO"]; ?></td>
												<td> $ <?php echo number_format($datos[$i]["PRECIOC"],2); ?></td>
												<td><?php echo $datos[$i]["TOTAL_PRODUCTOS"]; ?></td>
												<td><?php echo $datos[$i]["DESCUENTO"]; ?></td>
												<td colspan="3"><?php echo  '$'.number_format($datos[$i]["TOTAL_COMPRA"],2); ?></td>
											</tr>
										<?php
											}
										?>	
											<tr style="font-weight: bold;">
												<b>
													<td  style="text-align: right;">TOTAL</td>
													<td  style="text-align: right;"></td>
													<td  style="text-align: right;"></td>
													<td  style="text-align: right;"></td>
													<td  colspan="1" style="text-align: right;"><?php echo $datos2[3]; ?> </td>
													<td  colspan="1" style="text-align: right;"><?php echo $datos2[4].'%'; ?></td>
													<td  colspan="2"style="text-align: right;"> <?php echo '$'.number_format($datos2[0],2); ?> </td>
												</b>
											</tr>
										</tbody>
									</table><br><br>
									<a class=" button" href="./consultas_recibos_compra.php"><button class=" button  btn red darken-4" type='button' value='cancelar' />Cancelar</button></a>
									<button class="oculto btn btn-primary" type='submit' name onclick='window.print();' value='Imprimir' />Imprimir</button>
										<?php
										}
										?>	
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<footer class="oculto"> <?php include"../body/footermain.php";?></footer>
	</body>
		<footer class="oculto"> <?php include"../body/footermain2.php";?></footer>
</html>