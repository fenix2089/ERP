<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../../img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../../img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link rel="stylesheet" href="../../css/style.css" />
    <title>Dashboard</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <link href="../../css/bootstrap.min.css" rel="stylesheet" />
    <link href="../../css/material-dashboard.css?v=1.2.0" rel="stylesheet" />
    <link href="../../css/demo.css" rel="stylesheet" />
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
    <script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
</head>

<body>
    <div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="../../img/iconos/erp2.png">
        <div class="logo">
            <a href="../../templates/panel_control.php" class="simple-text">
                <img src="../../img/iconos/erp2.png" width="100px" alt="">
            </a>
        </div>
        <div class="sidebar-wrapper">
            <ul class="nav">
                <li>
                    <a href="reabastecer.php">
                        <i class="material-icons">equalizer</i>
                        <p>Reabastecer</p>
                    </a>
                </li>
                 <li>
                    <a href="producto.php">
                        <i class="material-icons">equalizer</i>
                        <p>Productos</p>
                    </a>
                </li>
                <li>
                    <a href="../../templates/modulos/mainpage2.php">
                        <i class="material-icons">add_shopping_cart</i>
                        <p>Ventas</p>
                    </a>
                </li>
                <li>
                    <a href="../../templates/modulos/clientes.php">
                        <i class="material-icons">content_paste</i>
                        <p>Clientes</p>
                    </a>
                </li>
                <li>
                    <a href="../../templates/modulos/inventario.php">
                        <i class="material-icons">library_books</i>
                        <p>Inventario</p>
                    </a>
                </li>
                <li>
                    <a href="./consultas_recibos_compra.php">
                        <i class="material-icons">library_books</i>
                        <p>Recibos de Compras</p>
                    </a>
                </li>
                <li>
                    <a href="./consultas_recibos_venta.php">
                        <i class="material-icons">library_books</i>
                        <p>Recibos de Ventas</p>
                    </a>
                </li>
                <li>
                    <a href="../../templates/modulos/reporteinv.php">
                        <i class="material-icons">bubble_chart</i>
                        <p>Reporte de inventario</p>
                    </a>
                </li>
                <li>
                 <a href="../../templates/modulos/proveedores.php">
                     <i class="material-icons">airport_shuttle</i>
                     <p>Proveedores</p>
                 </a>
             </li>
             <li>
                <a href="../../templates/modulos/categorias.php">
                    <i class="material-icons">view_module</i>
                    <p>Categorias</p>
                </a>
            </li>
            <li>
                <a href="../../templates/modulos/lista_empleados.php">
                    <i class="material-icons">assignment_ind</i>
                    <p>RRHH</p>
                </a>
            </li>
            </ul>
        </div>
    </div>
    <div class="main-panel">
        <nav class="navbar navbar-transparent navbar-absolute">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="material-icons">person</i>
                                <p class="hidden-lg hidden-md">Profile</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
