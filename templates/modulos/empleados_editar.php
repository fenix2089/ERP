<div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title">Empleados</h4>
                            <p class="category"></p>
                        </div>
                        <div class="card-content table-responsive">
<div class="form-group">
    <h4 class="form-group">
    <?php echo $alm->__GET('id') != null ? $alm->__GET('Nombre').' '. $alm->__GET('Apellido') : 'Nuevo Registro'; ?>
    </h4>
</div>

<ol class="breadcrumb">
  <li><a href="?c=Alumno">Lista Empleados</a></li>
  <li class="active"><?php echo $alm->__GET('id') != null ? $alm->__GET('Nombre') : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-alumno" action="?c=Alumno&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $alm->__GET('id'); ?>" />
     <div class="form-group">
        <label>DUI</label>
        <input type="text" name="DUI" id="dui" value="<?php echo $alm->__GET('DUI'); ?>" class="form-control" placeholder="00000000-0" data-validacion-tipo="requerido|max:10" required/>
    </div>
    <div class="form-group">
        <label>Nombres</label>
        <input type="text" name="Nombre" value="<?php echo $alm->__GET('Nombre'); ?>" class="form-control" placeholder="Ingrese su nombre" data-validacion-tipo="requerido|min:3" required/>
    </div>
    
    <div class="form-group">
        <label>Apellidos</label>
        <input type="text" name="Apellido" value="<?php echo $alm->__GET('Apellido'); ?>" class="form-control" placeholder="Ingrese su apellido" data-validacion-tipo="requerido|min:3" required/>
    </div>
    
    <div class="form-group">
        <label>Correo</label>
        <input type="text" name="Correo" value="<?php echo $alm->__GET('Correo'); ?>" class="form-control" placeholder="Ingrese su correo electrónico" data-validacion-tipo="requerido|email" required/>
    </div>
    <div class="form-group">
        <label>Direccion</label>
        <textarea name="direccion" id="direccion" value="<?php echo $alm->__GET('direccion'); ?>" class="form-control" placeholder="Ingrese su domicilio" data-validacion-tipo="requerido|direccion" cols="20" rows="3" required><?php echo $alm->__GET('direccion'); ?></textarea>
    </div>
    <div class="form-group">
        <label>Teléfono</label>
        <input type="text" name="telefono" id="movil" value="<?php echo $alm->__GET('telefono'); ?>" class="form-control" placeholder="000-0000-0000" data-validacion-tipo="requerido|N° celular" required/>
    </div>
    <div class="form-group">
        <label>CuentaBancaria</label>
        <input type="text" name="CuentaBancaria" value="<?php echo $alm->__GET('CuentaBancaria'); ?>" class="form-control" placeholder="Ingrese su número celular" data-validacion-tipo="requerido|N° cuenta" required/>
    </div>
    <div class="form-group">
        <label>SeguridadSocial</label>
        <input type="text" name="SeguridadSocial" value="<?php echo $alm->__GET('SeguridadSocial'); ?>" class="form-control" placeholder="Ingrese su número celular" data-validacion-tipo="requerido|N° cuenta" required/>
    </div>
    <div class="form-group">
        <label>Sexo</label>
        <select name="Sexo" class="form-control" required>
            <option <?php echo $alm->__GET('Sexo') == 1 ? 'selected' : ''; ?> value="1">Masculino</option>
            <option <?php echo $alm->__GET('Sexo') == 2 ? 'selected' : ''; ?> value="2">Femenino</option>
        </select>
    </div>
    
    <div class="form-group">
        <label>Fecha de nacimiento</label>
        <input  type="date" name="FechaNacimiento" value="<?php echo $alm->__GET('FechaNacimiento'); ?>" class="form-control datepicker" placeholder="Ingrese su fecha de nacimiento" data-validacion-tipo="requerido" required/>
    </div>
    <div class="form-group">
        <label>Cargo</label>
        <input  type="text" name="cargo" id="cargo" value="<?php echo $alm->__GET('cargo'); ?>" class="form-control" placeholder="Ingrese su cargo" data-validacion-tipo="requerido" autocomplete="off" required/>
    </div>
    <div class="form-group">
        <label>Fecha de registro</label>
        <input  type="date" name="FechaRegistro" value="<?php echo $alm->__GET('FechaRegistro'); ?>" class="form-control datepicker" placeholder="Ingrese la fecha de registro" data-validacion-tipo="requerido" required/>
    </div>
    <div class="row">
        <div class="col-xs-6">
            <div class="form-group">
                <label>Foto</label>
                <input type="hidden" name="Foto" value="<?php echo $alm->__GET('Foto'); ?>" />
                <input type="file"  name="Foto" placeholder="Ingrese una imagen"  required/>
            </div>     
        </div>
        <div class="col-xs-6">
            <?php if($alm->__GET('Foto') != ''): ?>
                <div class="img-thumbnail text-center">
                    <img src="../../uploads/Empleados/<?php echo $alm->__GET('Foto'); ?>" style="width:50%;" />
                </div>
            <?php endif; ?>            
        </div>
    </div>
    
    <hr />
   
    <div class="text-right">
        <button class="btn btn-primary">Guardar</button>
    </div>
</form>
     <div class="text-left">
        <a href="./lista_empleados.php"><button class="btn btn-danger">Cancelar</button></a>
    </div>
 <footer class="footer">
        <div class="container-fluid">
        </div>
    </footer>
    </div>
    </div>
</body>
    <script>
    $(document).ready(function(){
        $("#frm-alumno").submit(function(){
            return $(this).validate();
        });
    })
    </script>
  <!--   Core JS Files   -->
    <script src="../../js/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="../../js/bootstrap.min.js" type="text/javascript"></script>
    <script src="../../js/material.min.js" type="text/javascript"></script>
    <script src="../../js/jquery.maskedinput.min.js" type="text/javascript"></script>
    <script src="../../js/mask.js" type="text/javascript"></script>
    <script src="../../js/ini.js" type="text/javascript"></script>
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