<?php
  session_start();
  if (!isset($_SESSION['usuario'])) {
    header('Location: ../../index.php');
  }
  require_once("../../models/producto_model.php");
  $services = new InventarioP();
  $datos = $services->ConsultarEmpleados();
  
  require_once("../../models/model_orden_abastecimiento.php");
  $nservices = new OrdenesAbastecimiento();
  $ndatos = $nservices->ConsultarOrden();

?>
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
</head>

<body>
  <?php include"../body/navmain.php";?>
  <div class="content">
      <div class="container-fluid">
          <div class="row">
            <div class="col-md-4">
                  <div class="card">
                      <div class="card-header" data-background-color="purple">
                          <h4 class="title">Generar Recibo de Reabastecimiento</h4>
                          <p class="category"></p>
                      </div>
                      <div class="card-content">
                        <form action="#" method="POST">
                          <select name="id_o" class="form-control">
                            <option disabled selected>Selecione código de orden</option>
                        <?php  
                            for ($i = 0; $i < count($ndatos); $i++) {
                          ?>
                            <option value="<?php echo $ndatos[$i]['OrdenD']; ?>"><?php echo "Orden = ".$ndatos[$i]['OrdenD'].' Realizada por = '.$ndatos[$i]['Empleado'].'| Fecha: '.$ndatos[$i]['Fecha']; ?>
                            </option>
                          <?php
                            }
                          ?>
                          </select>
                          <button type="sunmit" name="btn_recibo" class="btn btn-primary pull-right">Crear recibo</button>
                        </form>
                        <?php 
                          if (isset($_POST['btn_recibo'])) 
                          {
                            include("../../models/model_recibos.php");
                            
                            $nuevo = new Recibos();

                            $recibo= $nuevo->Recibocompra($_POST['id_o']);
                          }
                        ?>
                      </div>
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="card">
                      <div class="card-header" data-background-color="purple">
                          <h4 class="title">Buscar Recibo de Reabastecimiento</h4>
                          <p class="category"></p>
                      </div>
                      <div class="card-content">
                          <form action="recibo_de_compra.php" method="POST">
                              <div class="row">
                                  <div class="col-md-8">
                                      <div class="form-group label-floating">
                                          <label>Empleado</label>
                                          <select type="int" name="id_e" id="id_e" class="form-control" required>
                                            <option value="" disabled selected>Seleccione Empleado</option>
                                        <?php  
                                         for ($i = 0; $i < count($datos); $i++) {
                                         ?>
                                            <option value="<?php echo $datos[$i]["id"]; ?>"><?php echo $datos[$i]["Nombre"]. ' '.$datos[$i]["Apellido"]; ?></option>
                                        <?php
                                          }
                                        ?>
                                          </select>

                                          <label for="">Orden de compra</label>
                                          <select name="id_o" class="form-control">
                                            <option disabled selected>Selecione código de orden</option>
                                        <?php  
                                            for ($i = 0; $i < count($ndatos); $i++) {
                                          ?>
                                            <option value="<?php echo $ndatos[$i]['OrdenD']; ?>"><?php echo "Orden = ".$ndatos[$i]['OrdenD'].' Realizada por = '.$ndatos[$i]['Empleado'].'| Fecha: '.$ndatos[$i]['Fecha']; ?>
                                            </option>
                                          <?php
                                            }
                                          ?>
                                          </select>
                                      </div>
                                  </div>
                                  <div class="col-md-8">
                                      <div class="form-group label-floating">
                                          <label>Fecha Inicial</label>
                                          <input class="form-control" id="fi" name="fi" type="date" required>
                                      </div>
                                      <div class="form-group label-floating">
                                          <label>Fecha Final</label>
                                          <input placeholder="" id="ff" name="ff" type="date" class="form-control" required>
                                      </div>
                                 </div>
                               </div>
                                 <button type="submit" name="btn_brc" class="btn btn-primary pull-right">Buscar Recibo de Compra</button>
                               <div class="clearfix"></div>
                          </form>
                      </div>
                  </div>
              </div>
              <div class="col-md-4">
                  <div class="card card-profile">
                      <div class="card-avatar">
                          <a href="#pablo">
                              <img class="img" src="img/faces/marc.jpg" />
                          </a>
                      </div>
                      <div class="content">
                          <h6 class="category text-gray">Tips</h6>
                          <h4 class="card-title">Administrador</h4>
                          <p class="card-content">
                              Sabias que desde esta pestaña se pueden añadir productos a tu inventario y puede ir moviéndote a través del menu principal.
                          </p>
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
