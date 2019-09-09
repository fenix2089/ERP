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
  <?php include"../body/mmEmp.html"; ?>

      <div class="container-fluid">
          <div class="row">
              <div class="col-md-12">
                  <div class="card">
                      <div class="card-header" data-background-color="purple">
                          <h4 class="title">Salidas Recientes</h4>
                          <p class="category"></p>
                      </div>
                      <div class="card-content table-responsive">
                          <table class="table">
                              <thead class="text-primary">
                                  <th>Nombre Completo Empleado</th>
                                  <th>Fecha y Hora</th>
                                  <th>Acciones</th>
                              </thead>
                              <tbody>
                                  <tr>
                                    <td>nombre</td>
                                    <td>fecha hora</td>
                                    <td><a href="modificarSal.php" class="btn btn-primary btn-sm" role="button">Modificar</a></td>
                                  </tr>
                              </tbody>
                          </table>
                      </div>
                      <br><br><br><br><br><br>
                      <br><br><br><br><br><br>
                      <br><br><br><br><br><br>
                      <br><br><br><br><br><br>
                      <a href="agregarSal.php"><button type="submit" class="btn btn-primary pull-right"> Registrar salidas</button></a>
                      <div class="clearfix"></div>
                  </div>
              </div>

  <footer> <?php include"../body/footermain.php";?></footer>
</body>
  <footer> <?php include"../body/footermain2.php";?></footer>

</html>
