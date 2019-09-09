<?php
  session_start();
  if (!isset($_SESSION['usuario'])) {
    header('Location: ../../index.php');
  }
  require_once("../../models/model_cliente.php");
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
              <div class="col-md-8">
                  <div class="card">
                      <div class="card-header" data-background-color="purple">
                          <h4 class="title">Agregar cliente</h4>
                          <p class="category"></p>
                      </div>
                      <div class="card-content">
                          <form action="#" method="POST">
                               <div class="row">
                                  <div class="col-md-12">
                                      <div class="form-group label-floating">
                                          <label class="control-label">Código</label>
                                          <input type="text" class="form-control" name="id" required>
                                      </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-12">
                                      <div class="form-group label-floating">
                                          <label class="control-label">Nombre</label>
                                          <input type="text" class="form-control" name="nom" required>
                                      </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-12">
                                      <div class="form-group label-floating">
                                          <label class="control-label">Apellido</label>
                                          <input type="text" class="form-control" name="ape" required>
                                      </div>
                                  </div>
                              </div>
                               <div class="row">
                                  <div class="col-md-12">
                                      <div class="form-group label-floating">
                                          <label class="control-label">Dirección</label>
                                          <input type="text" class="form-control" name="dir" required>
                                      </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-12">
                                      <div class="form-group label-floating">
                                          <label class="control-label">Telefono</label>
                                          <input type="text" class="form-control" name="tel" required>
                                      </div>
                                  </div>
                                </div>
                                <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Email</label>
                                        <input type="text" class="form-control" name="correo" required>
                                    </div>
                                </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-12">
                                      <div class="form-group label-floating">
                                          <label class="control-label">Categoria</label><br>
                                          <select type="text" class="form-control" name="id_cc" required>
                                          <option disabled selected>Seleccione Categoria</option>
                                      <?php  
                                         for ($i = 0; $i < count($ndatos); $i++) {
                                      ?>    
                                          <option value="<?php echo $ndatos[$i]['id_cat_cliente']; ?>"><?php echo $ndatos[$i]['nombre_cat']; ?></option>
                                      <?php
                                          }
                                      ?>    
                                          </select>
                                      </div>
                                  </div>
                              </div>

                              <button type="submit" name="btn_cc" class="btn btn-primary pull-right">Agregar cliente</button>
                              <div class="clearfix"></div>
                          </form>
                          <?php  
                            if (isset($_POST['btn_cc'])) 
                            {
                              require_once("../../models/model_cliente.php");
                              $services = new Clientes();
                              $datos = $services->Insertar($_POST['id'], $_POST['nom'], $_POST['ape'], $_POST['dir'], $_POST['tel'], $_POST['correo'], $_POST['id_cc']);
                            }
                          ?>
                      </div>
                  </div>
              </div>
              <div class="col-md-4">
                  <div class="card card-profile">
                      <div class="card-avatar">
                          <a href="#pablo">
                              <img class="img" src="../assets/img/faces/marc.jpg" />
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
