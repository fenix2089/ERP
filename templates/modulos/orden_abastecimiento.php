<?php
  session_start();
  if (!isset($_SESSION['usuario'])) {
    header('Location: ../../index.php');
  }
  require_once("../../models/producto_model.php");
  $services = new InventarioP();
  $datos = $services->ConsultarEmpleados(); 
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../../img/apple-icon.png"/>
    <link rel="icon" type="image/png" href="../../img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Reabastecer</title>
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
                      <h4 class="title">Orden de Reabastecer</h4>
                  </div>
                  <div class="card-content table-responsive">
                    <form action="#" method="POST">
                        <div>
                            <label for="">Id Orden</label>
                            <div>
                              <input type="number" step="any" name="id_o" class="form-control" required>
                            </div>
                        </div>
                        <div>
                            <label for="">Fecha</label>
                            <div>
                              <input type="date" name="fecha" class="form-control" required>
                            </div>
                        </div>
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
                        </div>
                        <button type="sunmit" name="btn_g" class="btn btn-primary">Guardar</button>
                    </form>
                    <?php  
                      if (isset($_POST['btn_g'])) 
                      {
                        include("../../models/model_orden_abastecimiento.php");
                        date_default_timezone_set('America/El_Salvador');
                        $hora= Date('h:i:s A');
                        $nuevo = new OrdenesAbastecimiento();
                        $asd = $nuevo->Insertar_orden_compra($_POST['id_o'], $_POST['fecha'], $hora, $_POST['id_e']);
                      }
                    ?>
                  </div>
              </div>
          </div>
      </div>
    </div>
    <footer> <?php include"../body/footermain.php";?></footer>
  </body>
    <footer> <?php include"../body/footermain2.php";?></footer>
</html>
