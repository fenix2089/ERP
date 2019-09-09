<?php 
  session_start();
  if (!isset($_SESSION['usuario'])) {
    header('Location: index.php');
  }
  require_once("../../models/producto_model.php");
  $servicio = new Producto;
  $datos = $servicio->Mostrar($_GET['id_p']);
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
              <div class="col-md-8">
                  <div class="card">
                    <?php
                      for ($i = 0; $i < count($datos); $i++) 
                      {
                    ?>
                      <div class="card-header" data-background-color="purple">
                          <h4 class="title">Editar Producto</h4>
                          <p class="category">Código Producto = <?php echo $datos[$i]["id_producto"]; ?></p>
                      </div>
                      <div class="card-content">
                          <form action="#" method="POST" enctype="multipart/form-data">
                            <div class="row">
                              <div class="col-md-12" hidden>
                                  <div class="form-group label-floating">
                                      <label class="control-label">id_producto</label>
                                      <input type="text" name="id_p" class="form-control" value="<?php echo $datos[$i]["id_producto"]; ?>" required>
                                  </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-12">
                                  <div class="form-group label-floating">
                                      <label class="control-label">Código</label>
                                      <input type="text" name="cod_p"class="form-control" value="<?php echo $datos[$i]["id_producto"]; ?>" required>
                                  </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-12">
                                  <div class="form-group label-floating">
                                      <label class="control-label">Producto</label>
                                      <input type="text" name="nom_p"class="form-control" value="<?php echo $datos[$i]["nombre_p"]; ?>" required>
                                  </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-12">
                                  <div class="form-group label-floating">
                                      <label class="control-label">Descripción</label>
                                      <input type="text" name="des_p" class="form-control" value="<?php echo $datos[$i]["descripcion"]; ?>" required>
                                  </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-12">
                                  <div class="form-group label-floating">
                                      <label class="control-label">Unidad</label>
                                      <input type="text" name="uni_p" class="form-control" value="<?php echo $datos[$i]["unidad"]; ?>" required>
                                  </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-12">
                                  <div class="form-group label-floating">
                                      <label class="control-label">Precio de compra</label>
                                      <input type="text" name="prec_p" class="form-control" value="<?php echo $datos[$i]["precio_compra"]; ?>" required>
                                  </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-12">
                                  <div class="form-group label-floating">
                                      <label class="control-label">Precio de venta</label>
                                      <input type="text" name="prev_p" class="form-control" value="<?php echo $datos[$i]["precio_venta"]; ?>" required>
                                  </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-12">
                                  <div class="form-group label-floating">
                                      <label class="control-label">Estado</label>
                                      <input type="text" name="est_p" class="form-control" value="<?php echo $datos[$i]["estado"]; ?>" required>
                                  </div>
                              </div>
                            </div>
                        <?php 
                          }
                        ?>
                            <button type="submit" class="btn btn-primary pull-right" name="btn_actu">Actualizar</button>
                            <div class="clearfix"></div>
                          </form>
                          <?php  
                            if (isset($_POST['btn_actu'])) 
                            {
                              include_once'../../models/producto_model.php';
                              $nuevo = new Producto;
                              $asd = $nuevo->Update($_POST['id_p'], $_POST['cod_p'], $_POST['nom_p'],$_POST['des_p'], $_POST['uni_p'], $_POST['prec_p'], $_POST['prev_p'], $_POST['est_p']);
                            }
                          ?>
                        <div class="text-left">
                          <a href="inventario.php"><button class="btn btn-danger">Cancelar</button></a>
                        </div>
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
