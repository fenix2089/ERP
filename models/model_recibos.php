<?php  
	include_once 'conexion_mysqli.php';
	class Recibos extends DbConfig
	{
		private $servicio;

		public function __construct()
		{
			parent::__construct();
			$this->servicio = array();
		}
		// Especificar formato de codificación de caracteres
		private function setNames() {
			return $this->connection->query("SET NAMES 'utf8'");
		}
		//Insertar a la base de datos
		function Recibocompra($orden)
		{
			self::setNames();
			$query = "INSERT INTO recibo_de_abastecimiento(id_orden_abastecimiento) VALUES('$orden')";
			
			$result = $this->connection->query($query) or die ("Error al consultar datos".mysqli_error($this->connection));

			if ($result) 
			{
				echo "<script>
		      	 		 	alert('Recibo creado');
		        			window.location= 'reabastecer.php'
		        	</script>";
				return true;

			} 
			else 
			{
				echo "<script>
		      	 		 	alert('Error al crear recibo');
		        			window.location= 'reabastecer.php'
		        	</script>";
				return false;
			}
		}

		function Reciboventa($orden)
		{
			self::setNames();
			$query = "INSERT INTO recibo_de_venta(id_orden_venta) VALUES('$orden')";
			
			$result = $this->connection->query($query) or die ("Error al consultar datos".mysqli_error($this->connection));

			if ($result) 
			{
				echo "<script>
		      	 		 	alert('Recibo creado');
		        			window.location= 'consultas_recibos_venta.php'
		        	</script>";
				return true;

			} 
			else 
			{
				echo "<script>
		      	 		 	alert('Error al crear recibo');
		        			window.location= 'consultas_recibos_venta.php'
		        	</script>";
				return false;
			}
		}
	}
?>