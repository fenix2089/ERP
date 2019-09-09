<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header" data-background-color="purple">
						<h4 class="title">Proveedores</h4>
						<p class="category">Lista de Proveedores</p>
					</div>
					<div class="card-content table-responsive">
						<table class="table">
							<thead class="text-primary">
								<th><b>Código Proveedor</b></th>
								<th><b>Nombre</b></th>
								<th><b>Direccion</b></th>
								<th><b>Telefono</b></th>
								<th><b>Celular</b></th>
								<th><b>Email</b></th>
								<th><b>Contacto</b></th>
								<th><b> </b></th>
							</thead>

							<?php
							$cont=0; /*CONTADOR A 0*/
							$cont++; /*CONTADOR A 0+1*/
							for ($i = 0; $i < count($datos); $i++) {
							?>
							<tbody>
								<tr>
									<td><?php echo $datos[$i]["id_proveedor"]; ?></td>
									<td><?php echo $datos[$i]["nombre"]; ?></td>
									<td><?php echo $datos[$i]["direccion"]; ?></td>
									<td><?php echo $datos[$i]["telefono_fijo"]; ?></td>
									<td><?php echo $datos[$i]["celular"]; ?></td>
									<td><?php echo $datos[$i]["email"]; ?></td>
									<td><?php echo $datos[$i]["id_contacto"]; ?></td>
									<td>
										<a href="../templates/modulos/proveedores_modificar.php?id=<?php echo $datos[$i]["id_proveedor"];?>"><button class="btn btn-primary btn-sm">Modificar</button></a>

										<a href="../templates/modulos/proveedores_eliminar.php?ide=<?php echo $datos[$i]["id_proveedor"];?>"><button class="btn btn-danger btn-sm">Eliminar</button></a>
									</td>
								</tr>
							</tbody>
							<?php
							}
							?>
						</table>
					</div>
				</div>
			</div>

			<footer class="footer">
				<div class="container-fluid">
				</div>
			</footer>
		</div>
	</div>
</body>
<!--   Core JS Files   -->
<script src="../js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="../js/bootstrap.min.js" type="text/javascript"></script>
<script src="../js/material.min.js" type="text/javascript"></script>
<!--  Charts Plugin -->
<script src="../js/chartist.min.js"></script>
<!--  Dynamic Elements plugin -->
<script src="../js/arrive.min.js"></script>
<!--  PerfectScrollbar Library -->
<script src="../js/perfect-scrollbar.jquery.min.js"></script>
<!--  Notifications Plugin    -->
<script src="../js/bootstrap-notify.js"></script>
<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!-- Material Dashboard javascript methods -->
<script src="../js/material-dashboard.js?v=1.2.0"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="../js/demo.js"></script>
<script type="text/javascript">
	$(document).ready(function() {

		// Javascript method's body can be found in assets/js/demos.js
		demo.initDashboardPageCharts();

	});
</script>
</html>
