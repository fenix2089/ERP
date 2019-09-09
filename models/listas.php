<?php  
	include_once 'conexion_mysqli.php';
	class Listas extends DbConfig
	{
		private $servicio;

		public function __construct()
		{
			parent::__construct();
			$this->servicio = array();
		}
		/**/
		function Consultar()
		{	
			$query = "SELECT * FROM usuarios ";
			
			$result = $this->connection->query($query) or die ("Error al consultar datos".mysqli_error($this->connection));

			foreach ($this->connection->query($query) as $res) {
				$this->servicio[] = $res;
			}
			return $this->servicio;
			$this->connection = null;
			
		}
	}	
?>