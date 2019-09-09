<?php 
	include_once 'conexion_mysqli.php';
	class OrdenesAbastecimiento extends DbConfig
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

		function Insertar_orden_compra($id_detalle_ab, $fecha, $hora, $id_empleado)
		{	
			self::setNames();
			$query = "INSERT INTO orden_abastecimiento(id_detalle_ab, fecha, hora, id_empleado)	 
			   VALUES ('$id_detalle_ab', '$fecha', '$hora', '$id_empleado')";

			$result = $this->connection->query($query) or die ("Error al consultar datos".mysqli_error($this->connection));

			if ($result) 
			{
				echo "<script>
		      	 		 	alert('Orden registrada');
		        			window.location= 'reabastecer.php'
		        	</script>";
				return true;

			} 
			else 
			{
				echo "<script>
		      	 		 	alert('Error al registrar orden');
		        			window.location= 'reabastecer.php'
		        	</script>";
				return false;
			}

		}

		function ConsultarOrden()
		{
			$query = "SELECT * FROM Orden";

			$result = $this->connection->query($query) or die ("Error al consultar datos".mysqli_error($this->connection));

            foreach ($this->connection->query($query) as $res) {
                $this->servicio[] = $res;
            }
            return $this->servicio;
            $this->connection = null;
		}
		/*------------------------------------------------------------------*/
		function ConsultaAbastecer()
		{
			self::setNames();
			$query = "SELECT * FROM Abastecer";
			$result = $this->connection->query($query) or die ("Error al consultar datos".mysqli_error($this->connection));

            foreach ($this->connection->query($query) as $res) {
                $this->servicio[] = $res;
            }
            return $this->servicio;
            $this->connection = null;
		}

		function MostrarAbastecer($id)
		{
			self::setNames();
			$query = "SELECT * FROM Abastecer where ID ='$id' ";
			$result = $this->connection->query($query) or die ("Error al consultar datos".mysqli_error($this->connection));

            foreach ($this->connection->query($query) as $res) {
                $this->servicio[] = $res;
            }
            return $this->servicio;
            $this->connection = null;
		}
	}
?>