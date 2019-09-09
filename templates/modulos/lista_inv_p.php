<?php  
	session_start();
	if (!isset($_SESSION['usuario'])) {
		header('Location: ../../index.php');
	}
	require_once("../../models/producto_model.php");
	$services = new InventarioP();
	$datos = $services->Consultar();
	include"../body/header2.php";
?>
	  <div class="content">
	      <div class="container-fluid">
	          <div class="row">
	              <div class="col-md-12">
	                  <div class="card">
	                      <div class="card-header" data-background-color="purple">
	                          <h4 class="title">Inventario de Productos</h4>
	                          <p class="category">Lista de productos disponibles y no disponibles</p>
	                      </div>
	                      <div class="card-content ">
	                           <table class="table table-responsive">
	                          	<thead class="text-primary">
	                          		<th></th>
	                          		<th><b>Cod Inventario</b></th>
									<th><b>Cod Producto</b></th>
									<th><b>Producto</b></th>
									<th><b>Precio Compra</b></th>
									<th><b>Precio Venta</b></th>
									<th><b>Stock</b></th>
									<th><b>Estado</b></th>
									<th><b>Actualizar</b></th>
									<th><b>Eliminar</b></th>
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
										<td><?php echo $datos[$i]["ID_INVENTARIO"]; ?></td>
										<td><?php echo $datos[$i]["ID_PRODUCTO"]; ?></td>
										<td><?php echo $datos[$i]["PRODUCTO"]; ?></td>
										<td><?php echo $datos[$i]["PRECIOC"]; ?></td>
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
										<td><a href="./editar_producto.php?id_p=<?php echo $datos[$i]["ID_PRODUCTO"]; ?>"><button class="btn btn-primary btn-sm">Editar</button></a></td>
										<td><a href="#?id_p=<?php echo $datos[$i]["ID_PRODUCTO"]; ?>"><button class="btn btn-danger btn-sm">Eliminar</button></a></td>
									</tr>
								</tbody>
								<?php
									}
								?>
							</table>
							 <div class="text-left">
						        <a href="inventario.php"><button class="btn btn-danger">Regresar</button></a>
						    </div>
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
	<script src="../../js/jquery-3.2.1.min.js" type="text/javascript"></script>
	<script src="../../js/bootstrap.min.js" type="text/javascript"></script>
	<script src="../../js/material.min.js" type="text/javascript"></script>
	<!--  Charts Plugin -->
	<script src="../../js/chartist.min.js"></script>
	<!--  Dynamic Elements plugin -->
	<script src="../js/arrive.min.js"></script>
	<!--  PerfectScrollbar Library -->
	<script src="../../js/perfect-scrollbar.jquery.min.js"></script>
	<!--  Notifications Plugin    -->
	<script src="../js/bootstrap-notify.js"></script>
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
