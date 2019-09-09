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
                          <h4 class="title">Categoria</h4>
                          <p class="category">Registrar</p>
                      </div>
                      <div class="card-content">
                          <form action="#" method="POST">
                              <div hidden class="row">
                                  <div class="col-md-12">
                                      <div class="form-group label-floating">
                                          <label class="control-label">Id</label>
                                          <input type="text" name="id_c" id="" class="form-control">
                                      </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-12">
                                      <div class="form-group label-floating">
                                          <label class="control-label">Nombre</label>
                                          <input type="text" name="nom_c" id="" class="form-control" required>
                                      </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-12">
                                      <div class="form-group label-floating">
                                          <label>Estado</label>
                                          <select type="text" name="est_c" id="" class="form-control" required>
                                            <option value="" disabled selected>Seleccione Estado</option>
                                            <option value="1">ON</option>
                                            <option value="2">OFF</option>
                                          </select>
                                      </div>
                                  </div>
                              </div>
                              <button type="submit" name="btn_cat" class="btn btn-primary pull-right">Agregar categoria</button>
                              <div class="clearfix"></div>
                          </form>
                          <?php
                                if (isset($_POST['btn_cat'])) {
                                   if (empty($_POST['nom_c'])) {
                                    echo "El campo nombre está vacío";
                                  }elseif (empty($_POST['est_c'])) {
                                    echo "El campo estado está vacío";
                                  }else{
                                    include("../../models/categorias_model.php");
                                    $nuevo = new Categoria();
                                    $asd = $nuevo->Insertar($_POST['id_c'], $_POST['nom_c'], $_POST['est_c']);
                                  }
                                }
                            ?>
                      </div>
                      <a href="../../controllers/controller_categorias.php"> <button type="submit" class="btn btn-primary pull-left">Ver Categorias</button></a>
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
