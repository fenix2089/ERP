<?php
  session_start();
  if (!isset($_SESSION['usuario'])) {
    header('Location: ../../index.php');
  }  
  

  require_once("../../models/model_orden_abastecimiento.php");
  $id_pr = $_POST['id_p'];
  $services = new OrdenesAbastecimiento();

  $nservices = new OrdenesAbastecimiento();
  
  $datos = $services->MostrarAbastecer($id_pr);
  
  $ndatos = $nservices->ConsultarOrden();
  
  
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
          <div class="col-md-12">
              <div class="card">
                  <div class="card-header" data-background-color="purple">
                      <h4 class="title">Producto a Abastecer Código: <?php echo "<b>".$id_pr."</b> "; ?></h4>
                  </div>
                  <div class="card-content table-responsive">
                    <form action="../../models/model_abastecimiento.php" method="POST">
                      <div class="row">
                        <div class="col-md-6">
                        
                          <legend><b>Inventario Actual</b></legend>
                          <?php  
                            for ($i = 0; $i < count($datos); $i++) {
                          ?>

                          <label for="">Código Producto</label>
                          <input type="int" name="id_pr" value="<?php echo $datos[$i]["ID"]; ?>" class="form-control"   required>

                          <label for="">Código Inventario</label>
                          <input type="int" name="id_inv" value="<?php echo $datos[$i]["Id_Pedido"]; ?>" class="form-control"   required>

                          <label for="">Producto</label>
                          <input disabled  type="int" name="npro" value="<?php echo $datos[$i]["PRODUCTO"]; ?>" class="form-control"  required>

                          <label for="">Stock</label>
                          <input type="int" name="stock" value="<?php echo $datos[$i]["STOCK"]; ?>" class="form-control"  required>

                          <label for="">Precio Unitario</label>
                          <input type="int" name="precio" value="<?php echo $datos[$i]["PRECIO_COMPRA"]; ?>" class="form-control"  required>
                        <?php
                          }
                        ?>
                        </div>
                        <div class="col-md-6">
                        
                          <legend><b>Detalle de abastecimiento</b></legend>
                          <label for="">Código Orden</label>
                          
                          <select id="iddto" name="iddto" class="form-control"  required>
                            <option selected disabled>Selecione Orden</option>
                          <?php  
                            for ($i = 0; $i < count($ndatos); $i++) {
                          ?>
                            <option value="<?php echo $ndatos[$i]['OrdenD']; ?>"><?php echo "Orden = ".$ndatos[$i]['OrdenD'].' Realizada por = '.$ndatos[$i]['Empleado'].'| Fecha: '.$ndatos[$i]['Fecha']; ?>
                            </option>
                          <?php
                            }
                          ?>
                          </select>
                          
                          <label for="">Cantida a Abastecer</label>
                          <input type="float" name="c_abas"  class="form-control"  required>

                          <label for="">Precio Unitario</label>
                          <input type="float" name="nprecio" class="form-control"  required>

                          <label for="">% Descuento</label>
                          <input type="float" name="descu"  class="form-control"  required>

                          <label for="">Fecha</label>
                          <input type="date" name="fecha"  class="form-control"  required>
                        
                        </div>
                        <button class="btn btn-primary" name="btn_abas">Procesar</button>
                      </div>
                    </form>
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
