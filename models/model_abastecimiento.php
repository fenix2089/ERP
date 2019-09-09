<?php 
	$mysqli = new mysqli("localhost", "root", "", "serppii");

	/* verificar la conexión */
	if ($mysqli->connect_errno) {
	    printf("Conexión fallida: %s\n", $mysqli->connect_error);
	    exit();
	}

    $id= $_POST['id_inv']; // id inventario
    $id_pr= $_POST['id_pr']; // id producto
    $fecha = $_POST['fecha']; // fecha
    $v1= $_POST['stock']; // stock actual
    $v2= $_POST['c_abas']; // cantidad a agregar al stock
    
    $suma= $v1 + $v2; 

    $precio_c= $_POST['precio']; // precio unitario actual
    

    $desc= $_POST['descu']; // descuento
    $idorden = $_POST['iddto']; // orden id detalle 
    $n_precio = $_POST['nprecio']; // precio unitario nuevo
    

    $operacion1 = $v2*$n_precio;
    
    $operacion2 = $operacion1*$desc;
    
    $operacion3 = $operacion1-$operacion2;

	
		$query1 = "UPDATE productos SET precio_compra = '$n_precio' WHERE id_producto = '$id_pr'";

		$result1 = $mysqli->query($query1) or die ("Error al consultar datos".mysqli_error($mysqli));


		$query2 = "UPDATE inventario_prod SET stock_up = '$suma' WHERE id_i_p = '$id'";

		$result2 = $mysqli->query($query2) or die ("Error al consultar datos".mysqli_error($mysqli));



		$query3 = "INSERT INTO detalle_dorden_abastecimiento(id_detalle_ab, id_producto, precio_unitario, cantidad, descuento, total, fecha_c) 
		   VALUES  ('$idorden','$id_pr', '$n_precio','$v2', '$desc', '$operacion3', '$fecha')";
		
		$result3 = $mysqli->query($query3) or die ("Error al consultar datos".mysqli_error($mysqli));

		if ($result1 and $result2 and $result3) 
		{
			echo "<script>
		  	 		 	alert('Producto Abastecido');
		    			window.location= '../templates/modulos/reabastecer.php'
		    	</script>";
			return true;

		} 
		else 
		{
			echo "<script>
		  	 		 	alert('Error al Abastecer Producto');
		    			window.location= '../templates/modulos/reabastecer.php'
		    	</script>";
			return false;
		}
	
  $mysqli->close();
?>