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

  <div class="content">
      <div class="container-fluid">
          <div class="row">
              <div class="col-md-8">
                  <div class="card">
                      <div class="card-header" data-background-color="purple">
                          <h4 class="title">Modificar registro de asistencias</h4>
                          <p class="category"></p>
                      </div>
                      <div class="card-content">
                          <form>
                              <div class="row">
                                  <div class="col-md-12">
                                      <div class="form-group label-floating">
                                          <label class="control-label">Nombre completo Empleado<!--realmente es el id, pero mostrar nombre--></label>
                                          <input type="text" class="form-control">
                                      </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-12">
                                      <div class="form-group label-floating">
                                          <label class="control-label">Tipo<!--llave foranea--></label>
                                          <input type="text" class="form-control">
                                      </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-12">
                                      <div class="form-group label-floating">
                                          <label class="control-label">Entradas<!--llave foranea--></label>
                                          <input type="text" class="form-control">
                                      </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-12">
                                      <div class="form-group label-floating">
                                          <label class="control-label">Salidas<!--llave foranea--></label>
                                          <input type="text" class="form-control">
                                      </div>
                                  </div>
                              </div>
                              <button type="submit" class="btn btn-primary pull-right">Guardar Asistencia</button>
                              <div class="clearfix"></div>
                          </form>
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
                              Sabias que... Siempre es bueno marcar hora de llegada y salida, para evitar inconvenientes en planilla.
                          </p>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>

  <footer> <?php include"../body/footermain.php";?></footer>
</body>
<!--   Core JS Files   -->
<script src="../../js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="../../js/bootstrap.min.js" type="text/javascript"></script>
<script src="../../js/material.min.js" type="text/javascript"></script>
<!--  Charts Plugin -->
<script src="../../js/chartist.min.js"></script>
<!--  Dynamic Elements plugin -->
<script src="../../js/arrive.min.js"></script>
<!--  PerfectScrollbar Library -->
<script src="../../js/perfect-scrollbar.jquery.min.js"></script>
<!--  Notifications Plugin    -->
<script src="../../js/bootstrap-notify.js"></script>
<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!-- Material Dashboard javascript methods -->
<script src="../../js/material-dashboard.js?v=1.2.0"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="../../js/demo.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

        // Javascript method's body can be found in assets/js/demos.js
        demo.initDashboardPageCharts();

    });
</script>

</html>
