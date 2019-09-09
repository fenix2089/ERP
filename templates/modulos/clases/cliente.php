<?php
	/// esta es la clase de cliente

	require_once('../../../models/conexion2.php');

	class Cliente{

		public $cliente_id;
		public $nombres;
		public $apellidos;
		public $direccion;
		public $telefono;
		public $categoria;
		public $datos;
		public $cn;

		function __construct($nombres=false, $apellidos=false, $direccion=false, $telefono=false, $categoria=false){
			$this->nombres=$nombres;
			$this->apellidos=$apellidos;
			$this->direccion=$direccion;
			$this->telefono=$telefono;
			$this->categoria=$categoria;

			$this->datos=array();


			$this->cn=new mysqli('localhost', 'root', '', 'bd');
		}
		
		public function getNombres(){
			return $this->nombres;
		}
		public function getApellidos(){
			return $this->apellidos;
		}
		public function getDireccion(){
			return $this->direccion;
		}
		public function getTelefono(){
			return $this->telefono;
		}
		public function getCategoria(){
			return $this->categoria;
		}

		public function setNombres(){
			$this->nombres=$nombres;
		}
		public function setApellidos(){
			$this->apellidos=$apellidos;
		}
		public function setDireccion(){
			$this->dir=$dir;
		}
		public function setTelefono(){
			$this->telefono=$telefono;
		}
		public function setCategoria(){
			$this->categoria=$categoria;
		}

		public function Registrar(){
			$nombres=$this->getNombres();
			$apellidos=$this->getApellidos();
			$direccion=$this->getDireccion();
			$telefono=$this->getTelefono();
			$categoria=$this->getCategoria();

			$consulta="INSERT INTO `clientes`(`nombres`, `apellidos`, `direccion`, `telefono`, `categoria`)";
			$consulta .=" VALUES ('$nombres', '$apellidos', '$direccion', '$telefono', '$categoria')";
			echo $consulta;

			$resultado=$this->cn->query($consulta);

			if ($resultado)
				return true;

			return false;
			 
		}
		public function Ver(){
			$consulta2="SELECT * FROM 'clientes'";

			$resultado2=$this->cn->query($consulta2);

			while($fila=mysqli_fetch_object($resultado2)){
				$this->datos[]=$fila;
			}
			return $this->datos;
		}

		public function mostrar($sql){
			$c=new Db();
			$conexion=$c->conectar();

			$result=mysqli_query($conexion, $sql);

			return mysqli_fetch_all($result, MYSQLI_ASSOC);
		}

		public function Actualizar(){
			
		}
		public function Eliminar(){
			
		}
		public function BuscarPorId(){
			
		}
	}
?>