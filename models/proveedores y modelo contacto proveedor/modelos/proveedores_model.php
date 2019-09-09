<?php
	include_once 'conexion_mysqli.php';
	class Proveedores extends DbConfig
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
		function InsertarP($id, $nombre, $direccion, $telefono_fijo, $celular, $email, $id_contacto)
		{
			self::setNames();
			$query = "INSERT INTO proveedores(id_proveedor, nombre, direccion, telefono_fijo, celular, email, id_contacto) VALUES ('$id', '$nombre', '$direcion', '$telefono_fijo', '$celular', '$email', '$id_contacto')";

			$result = $this->connection->query($query) or die ("Error al consultar datos".mysqli_error($this->connection));

			if ($result) {
				echo "<script>
              	 		 	alert('Proveedores Guardada');
                			window.location= './proveedores.php'
                	</script>";
				return true;

			} else {
				echo "<script>
              	 		 	alert('Error al guardar Proveedores');
                			window.location= './proveedores.php'
                	</script>";
				return false;
			}
		}
		// Mostrar o Listar Categorias
		function ConsultarP()
		{
			self::setNames();
			$query = "SELECT * FROM proveedores";

			$result = $this->connection->query($query) or die ("Error al consultar datos".mysqli_error($this->connection));

			foreach ($this->connection->query($query) as $res) {
				$this->servicio[] = $res;
			}
			return $this->servicio;
			$this->connection = null;

		}
		//Obtener datos especificos
		function ObtenerP($query)
		{
			self::setNames();
			$result = $this->connection->query($query);

			if ($result == false) {
				return false;
			}

			$rows = array();

			while ($row = $result->fetch_assoc()) {
				$rows[] = $row;
			}

			return $rows;
		}
		// Modificar proveedores
		function ActualizarP($id, $nombre, $direccion, $telefono_fijo, $celular, $email, $id_contacto)
		{
			self::setNames();
			$query = "UPDATE proveedores SET id_proveedor = '$id', nombre ='$nombre',direccion='$direccion', telefono_fijo=$telefono_fijo,celular='$celular', email='$email', id_contacto = '$id_contacto' WHERE id_proveedor = '$id'";
			$result = $this->connection->query($query) or die ("Error al consultar datos".mysqli_error($this->connection));

			if ($result) {
				echo "<script>
              	 		 	alert('Proveedores Actualizada');
                			window.location= '../../controllers/controller_proveedores.php'
                	</script>";
				return true;

			} else {
				echo "<script>
              	 		 	alert('Error al actualizar Proveedores');
                			window.location= '../../controllers/controller_proveedores.php'
                	</script>";
				return false;
			}
		}
		// Eliminar
		function EliminarP($ide)
		{
			self::setNames();
			$query = "DELETE FROM proveedores WHERE  id_proveedor = '$ide'";
			$result = $this->connection->query($query) or die ("Error al consultar datos".mysqli_error($this->connection));

			if ($result) {
				echo "<script>
              	 		 	alert('Proveedor Eliminado');
                			window.location= '../../controllers/controller_proveedores.php'
                	</script>";
				return true;

			} else {
				echo "<script>
              	 		 	alert('Error al eliminar Proveedor');
                			window.location= '../../controllers/controller_proveedores.php'
                	</script>";
				return false;
			}
		}
	}
 ?>
