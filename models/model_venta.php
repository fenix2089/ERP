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
    
    $resta= $v1 - $v2; 

    $precio_c= $_POST['precio']; // precio unitario actual
    

    $desc= $_POST['descu']; // descuento
    $idorden = $_POST['iddto']; // orden id detalle 
    $n_precio = $_POST['precio']; // precio unitario del producto vendido
    
    date_default_timezone_set('America/El_Salvador');
    $hora= Date('h:i:s A');

    $operacion1 = $v2*$n_precio;
    
    $operacion2 = $operacion1*$desc;
    
    $operacion3 = $operacion1-$operacion2;

    if ($v1 <= 0 or $v1 < $v2) 
	{
		echo "<script>
	  	 		 	alert('Error no se puede realizar la venta no tenemos el articulo disponible');
	    			window.location= '../templates/modulos/mainpage2.php'
	    	</script>";
	}
	elseif ($v1 >= $v2) 
	{
		$query2 = "UPDATE inventario_prod SET stock_up = '$resta' WHERE id_i_p = '$id'";

		$result2 = $mysqli->query($query2) or die ("Error al consultar datos".mysqli_error($mysqli));



		$query3 = "INSERT INTO detalle_orden_venta(id_orden_venta, id_producto, precio_unitario, cantidad, descuento, total, fecha, hora) VALUES  ('$idorden','$id_pr', '$n_precio','$v2', '$desc', '$operacion3', '$fecha', '$hora')";
		
		$result3 = $mysqli->query($query3) or die ("Error al consultar datos".mysqli_error($mysqli));

		if ($result2 and $result3) 
		{
			echo "<script>
		  	 		 	alert('Producto Vendido');
		    			window.location= '../templates/modulos/mainpage2.php'
		    	</script>";
			return true;

		} 
		else 
		{
			echo "<script>
		  	 		 	alert('Error al Vender Producto');
		    			window.location= '../templates/modulos/mainpage2.php'
		    	</script>";
			return false;
		}
	}
  $mysqli->close();
?>