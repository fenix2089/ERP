<?php  
	class Categoria
	{
		private $servicio;
		private $db;
		// Conexion a la base de datos
		public function __construct() {
			$this->servicio = array();
			$this->db = new PDO('mysql:host=localhost;dbname=serppii', "root", "");
		}
		// Especificar formato de codificación de caracteres
		private function setNames() {
			return $this->db->query("SET NAMES 'utf8'");
		}
		//Insertar a la base de datos
		public function Insertar($id, $nombre, $estado) 
		{
			self::setNames();
			$sql = "INSERT INTO categorias(nombre, estado) VALUES ('$nombre', '$estado')";
			$result = $this->db->query($sql);

			if ($result) {
				echo "<script>
              	 		 	alert('Categoria Guardada');
                			window.location= '../templates/modulos/categorias.php'
                	</script>";
				return true;

			} else {
				echo "<script>
              	 		 	alert('Error al guardar Categoria');
                			window.location= '../templates/modulos/categorias.php'
                	</script>";
				return false;
			}
		}
		
	}
?>