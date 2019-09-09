<?php
  session_start();
  if (!isset($_SESSION['usuario'])) {
    header('Location: ../../index.php');
  }  
  require_once("../../models/model_orden_abastecimiento.php");
  $services = new OrdenesAbastecimiento();
  
  $datos = $services->ConsultaAbastecer();
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
          <div class="col-md-6">
              <div class="card">
                  <div class="card-header" data-background-color="purple">
                      <h4 class="title">Orden de Reabastecer</h4>
                  </div>
                  <div class="card-content table-responsive">
                      <a href="./orden_abastecimiento.php"><button class="btn btn-primary">Crear Orden</button></a>
                  </div>
              </div>
          </div>
          <div class="col-md-6">
              <div class="card">
                  <div class="card-header" data-background-color="purple">
                      <h4 class="title">Reabastecer Producto</h4>
                  </div>
                  <div class="card-content table-responsive">
                      <form action="./abastecer.php" method="POST">
                        <div>
                            <label for="">Código Producto</label>
                            <div>
                              <select name="id_p" id="id_p" class="form-control" required>
                                <option value="" disabled selected>Selcione Producto</option>
                                <?php  
                                   for ($i = 0; $i < count($datos); $i++) {
                                ?>
                                      <option value="<?php echo $datos[$i]["ID"]; ?>"><?php echo $datos[$i]["PRODUCTO"]; ?></option>
                                <?php
                                    }
                                ?>
                              </select>
                            </div>
                        </div>
                        <button type="submit" id="btn_b" name="btn_b" class="btn btn-primary">Buscar</button>
                      </form>
                  </div>
              </div>
          </div>
      </div>
    </div>
    <footer> <?php include"../body/footermain.php";?></footer>
  </body>
    <footer> <?php include"../body/footermain2.php";?></footer>
</html>
