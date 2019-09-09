<div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title">Empleados</h4>
                            <p class="category"></p>
                        </div>
                        <div class="card-content table-responsive">

<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c=Alumno&a=Crud">Nuevo Empleado</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th style="width:80px;"></th>
            <th style="width:80px;">Código</th>
            <!--th style="width:100px;">DUI</th-->
            <th style="width:100px;">Empleado</th>
            <th style="width:100px;">Correo</th>
            <th style="width:100px;">Celular</th>
             <th style="width:100px;">Dirección</th>
            <!--th style="width:100px;">Sexo</th-->
            <!--th style="width:100px;">Nacimiento</th -->
            <th style="width:50px;">Edad</th>
            <th style="width:100px;">Cargo</th>
            <th style="width:60px;"></th>
            <th style="width:60px;"></th>
        </tr>
    </thead>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr>
            <td>
                <?php if($r->__GET('Foto') != ''): ?>
                    <img src="../../uploads/Empleados/<?php echo $r->__GET('Foto'); ?>" style="width:100%;" />
                <?php endif; ?> 
            </td>
            <td><?php echo $r->__GET('id'); ?></td>
            <!--td><?php /*echo /*$r->__GET('DUI'); */?></td-->
            <td><?php echo $r->__GET('Nombre').' '.$r->__GET('Apellido'); ?></td>
            <td><?php echo $r->__GET('Correo'); ?></td>
            <td><?php echo $r->__GET('telefono'); ?></td>
            <td><?php echo $r->__GET('direccion'); ?></td>
            <!--td><?php /*echo $r->__GET('Sexo') == 1 ? 'Hombre' : 'Mujer';*/ ?></td-->
            <!--td><?php /*echo $r->__GET('FechaNacimiento'); */?></td-->
            <td><?php echo $r->__GET('Edad'); ?></td>
            <td><?php echo $r->__GET('cargo'); ?></td>
            <td>
                <a href="?c=Alumno&a=Crud&id=<?php echo $r->id; ?>"><button class="btn btn-primary  btn-sm">Editar</button></a>
            </td>
            <td>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Alumno&a=Eliminar&id=<?php echo $r->id; ?>"><button class="btn btn-danger  btn-sm">Eliminar</button></a>
            </td>
        </tr>
    <?php endforeach; ?>
    
    <tfoot>
        <tr>
            <td colspan="8" class="text-center">
                <!--a href="?c=Alumno&a=excel">Exportar a Excel</a-->
            </td>
        </tr>
    </tfoot>
</table> 
 <footer class="footer">
        <div class="container-fluid">
        </div>
    </footer>
    </div>
    </div>
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