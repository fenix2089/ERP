<?php
  session_start();
  if (!isset($_SESSION['usuario'])) {
    header('Location: ../../index.php');
  }
  require_once("../../models/model_cliente.php");
  $services = new Clientes();
  $datos = $services->Consultar();
  $nservices = new Clientes();
  $ndatos = $nservices->CCategorias();
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../../img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../../img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Dashboard</title>
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
              <div class="col-md-9">
                  <div class="card">
                      <div class="card-header" data-background-color="purple">
                          <h4 class="title">Directorio de clientes</h4>
                          <p class="category"></p>
                      </div>
                      <div class="card-content table-responsive">
                          <table class="table">
                              <thead class="text-primary">
                                  <th>Código</th>
                                  <th>Cliente</th>
                                  <th>Direccion</th>
                                  <th>Email</th>
                                  <th>Telefono</th>
                                  <th>Id C</th>
                                  <th>Actualizar</th>
                                  <th>Eliminar</th>
                              </thead>
                              <tbody>
                            <?php  
                               for ($i = 0; $i < count($datos); $i++) {
                            ?>
                                  <tr>
                                    <td><?php echo $datos[$i]['id_cliente']; ?></td>
                                    <td><?php echo $datos[$i]['nombre_c'].' '.$datos[$i]['apellido_c']; ?></td>
                                    <td><?php echo $datos[$i]['direccion_c']; ?></td>
                                    <td><?php echo $datos[$i]['correo']; ?></td>
                                    <td><?php echo $datos[$i]['telefono']; ?></td>
                                    <td><?php echo $datos[$i]['tipo_cliente']; ?></td>
                                    <td><a href="./editar_cliente?id_c=<?php echo $datos[$i]['id_cliente']; ?>"><button class="btn btn-primary btn-sm" >Actualizar</button></a></td>
                                    <td><a href="#?id_c=<?php echo $datos[$i]['id_cliente']; ?>"><button class="btn btn-danger btn-sm" >Eliminar</button></a></td>
                                  </tr>
                            <?php
                                }
                            ?>
                              </tbody>
                          </table>
                      </div>
                      <br><br>
                      <a href="agregar.php"><button type="submit" class="btn btn-primary pull-right"> Agregar cliente</button></a>
                      <div class="clearfix"></div>
                  </div>
              </div>
              <div class="col-md-3">
                  <div class="card">
                      <div class="card-header" data-background-color="purple">
                          <h4 class="title">Categoria de clientes</h4>
                          <p class="category"></p>
                      </div>
                      <div class="card-content table-responsive">
                        <table class="table">
                          <thead class="text-primary">
                            <th>ID Categoria</th>
                            <th>Nombre categoria</th>
                          </thead>
                          <tbody>
                          <?php  
                             for ($i = 0; $i < count($ndatos); $i++) {
                          ?>
                            <tr>
                          
                              <td><?php echo $ndatos[$i]['id_cat_cliente']; ?></td>
                              <td><?php echo $ndatos[$i]['nombre_cat']; ?></td>
                          
                            </tr>
                          <?php
                              }
                          ?>
                          </tbody>
                        </table>
                      </div>
                  </div>
              </div>

  <footer> <?php include"../body/footermain.php";?></footer>
</body>
  <footer> <?php include"../body/footermain2.php";?></footer>

</html>
