<?php  
  session_start();
  if (!isset($_SESSION['usuario'])) {
    header('Location: ../../index.php');
  }
  require_once("../../models/producto_model.php");
  $services = new InventarioP();
  $datos = $services->Consultar();

  require_once("../../models/model_cliente.php");
  $consulta = new Clientes();
  $consul= $consulta->Consultar();

  require_once("../../models/model_empleado.php");
  $consulta2 = new Empleados();
  $consul2= $consulta2->Consultar();
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../../img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../../img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Ventas</title>
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
            <div class="row">
             <div class="col-md-4">
                <div class="card">
                    <div class="card-header" data-background-color="purple">
                        <h4 class="title">Orden de venta</h4>
                    </div>
                    <div class="card-content table-responsive">
                      <form action="#" method="POST">
                        <label for="">Código de venta</label>
                        <input type="int" name="id_v" class="form-control" required>

                        <label for="">Fecha</label>
                        <input type="date" name="fecha" class="form-control" required>

                        <label for="">Empleado</label>
                        <select name="id_empleado" id="" class="form-control" required>
                          <option disabled selected="">Seleccione Empleado</option>
                        <?php
                          for ($i = 0; $i < count($consul2); $i++) {
                        ?>
                          <option value="<?php echo $consul2[$i]["id"]; ?>"><?php echo $consul2[$i]["Nombre"].' '.$consul2[$i]["Apellido"]; ?></option>
                        <?php 
                          }
                        ?>
                        </select>

                        <label for="">Cliente</label>
                        <select name="id_clientes" id="" class="form-control" required>
                          <option disabled selected="">Selecione Cliente</option>
                         <?php
                          for ($i = 0; $i < count($consul); $i++) {
                        ?>
                          <option value="<?php echo $consul[$i]["id_cliente"]; ?>"><?php echo $consul[$i]["nombre_c"].' '.$consul[$i]["apellido_c"]; ?></option>
                        <?php 
                          }
                        ?>
                        </select>

                        <button type="submit" class="btn btn-primary" name="btn_orden_venta">Crear orden</button>
                      </form>
                      <?php  
                        if (isset($_POST['btn_orden_venta'])) 
                        {
                            include("../../models/model_orden_venta.php");
                            
                            date_default_timezone_set('America/El_Salvador');
                            $hora= Date('h:i:s A');

                            $nuevo = new Ordenesv();

                            $orden= $nuevo->Ordenventa($_POST['id_v'], $_POST['fecha'], $hora, $_POST['id_empleado'], $_POST['id_clientes']);
                        }
                      ?>
                    </div>
                </div>
              </div>
              <div class="col-md-8">
                  <div class="card">
                      <div class="card-header" data-background-color="purple">
                          <h4 class="title">Ventas</h4>
                          <p class="category">Selecciona el producto que quieras vender</p>
                          <p class="category">Lista de productos disponibles y no disponibles</p>
                      </div>
                      <div class="card-content ">
                        <table class="table table-responsive">
                          <thead class="text-primary">
                            <th></th>
                            <th><b>Cod Producto</b></th>
                            <th><b>Producto</b></th>
                            <th><b>Precio Venta</b></th>
                            <th><b>Stock</b></th>
                            <th><b>Estado</b></th>
                            <th><b>Accion</b></th>
                          </thead>
                            
                          <?php
                            for ($i = 0; $i < count($datos); $i++) {
                          ?>
                          <tbody>
                            <tr>
                              <td>
                                 <div class="img">
                                  <img src="<?php echo $datos[$i]["FOTO"];?>" style="width:70%;" alt="Producto">
                                </div>
                              </td>
                              <td><?php echo $datos[$i]["ID_PRODUCTO"]; ?></td>
                              <td><?php echo $datos[$i]["PRODUCTO"]; ?></td>
                              <td><?php echo $datos[$i]["PRECIOV"]; ?></td>
                              <td><?php echo $datos[$i]["STOCK"]; ?></td>
                            <?php  
                              $estado = $datos[$i]["ESTADO"];
                              $stock = $datos[$i]["STOCK"];
                              if ($estado == 1 and $stock > 0) 
                              {
                                $on = "Disponible";
                            ?>    
                                <td><?php echo $on; ?></td>
                            <?php
                              }
                              elseif ($estado == 2 and $stock <= 0) 
                              { 
                                $off = "No Disponible";
                            ?>    
                                <td><?php echo $off; ?></td>
                            <?php 
                              }elseif ($estado == 1 and $stock <= 0) {
                                $off = "No Disponible";
                            ?>    
                                <td><?php echo $off; ?></td>
                            <?php 
                              }
                            ?>
                              <!--td>
                                <a href="../templates/modulos/categoria_modificar.php?id=<?php echo $datos[$i]["id_categoria"];?>"><button class="btn btn-primary btn-sm">Modificar</button></a>

                                <a href="../templates/modulos/categoria_eliminar.php?ide=<?php echo $datos[$i]["id_categoria"];?>"><button class="btn btn-danger btn-sm">Eliminar</button></a>
                              </td-->
                               <td><a href="./vender_producto.php?id=<?php echo $datos[$i]['ID_PRODUCTO']; ?>"><button class="btn btn-primary btn-sm" name="btn_vender">Vender</button></a></td>
                            </tr>
                           
                          </tbody>
                          <?php
                            }
                          ?>
                        </table>
                        </div>
                  </div>
              </div>

  <footer> <?php include"../body/footermain.php";?></footer>
</body>
  <footer> <?php include"../body/footermain2.php";?></footer>

</html>
