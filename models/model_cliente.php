<?php  
	include_once 'conexion_mysqli.php';
	class Clientes extends DbConfig
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

		function Insertar($id_cliente, $nombre, $apellido, $dir, $tel, $correo, $id_cc)
		{
			self::setNames();
			$query = "INSERT INTO clientes (id_cliente, nombre_c, apellido_c, direccion_c, telefono, correo, tipo_cliente) VALUES('$id_cliente', '$nombre', '$apellido', '$dir', '$tel', '$correo', '$id_cc')";
			$result = $this->connection->query($query) or die ("Error al consultar datos".mysqli_error($this->connection));

			if ($result) {
				echo "<script>
              	 		 	alert('Categoria Guardada');
                			window.location= './clientes.php'
                	</script>";
				return true;

			} else {
				echo "<script>
              	 		 	alert('Error al guardar Categoria');
                			window.location= './clientes.php'
                	</script>";
				return false;
			}
		}

		function Consultar()
		{	
			self::setNames();
			$query = "SELECT * FROM clientes";
			
			$result = $this->connection->query($query) or die ("Error al consultar datos".mysqli_error($this->connection));

			foreach ($this->connection->query($query) as $res) {
				$this->servicio[] = $res;
			}
			return $this->servicio;
			$this->connection = null;
			
		}

		function CCategorias()
		{	
			self::setNames();
			$query = "SELECT * FROM categoria_clientes";
			
			$result = $this->connection->query($query) or die ("Error al consultar datos".mysqli_error($this->connection));

			foreach ($this->connection->query($query) as $res) {
				$this->servicio[] = $res;
			}
			return $this->servicio;
			$this->connection = null;
			
		}
	}
?>