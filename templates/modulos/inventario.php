<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../../img/apple-icon.png"/>
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
              <div class="col-md-12">
                  <div class="card">
                      <div class="card-header" data-background-color="purple">
                          <h4 class="title">En esta pestaña puedes escoger que es lo que deseas ingresar al inventario</h4>
                          <p class="category">Selecciona uno de los 2 botones</p>
                      </div>
                      <br><br><br><br>
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
                        <a href="ingresar_producto_a_inventario.php"><button type="submit" class="btn btn-primary pull-left"> Agregar Producto a Inventario</button></a>
                        <a href="producto.php"><button type="submit" class="btn btn-primary pull-left"> Agregar producto</button></a>
                         <a href="lista_inv_p.php"> <button type="submit" class="btn btn-primary pull-left">Ver Inventario</button></a>
                  </div>
              </div>

  <footer> <?php include"../body/footermain.php";?></footer>
</body>
  <footer> <?php include"../body/footermain2.php";?></footer>
</html>
