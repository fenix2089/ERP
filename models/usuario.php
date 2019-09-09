<?php 
	/*
	*
	*
	*/
	class Usuario{
		private $id;
		private $nombre;
		private $clave;
		private $tipo;

		public function getId(){
			return $this->id;
		}

		public function setId($id){
			$this->id = $id;
		}

		public function getNombre(){
			return $this->nombre;
		}

		public function setNombre($nombre){
			$this->nombre = $nombre;
		}

		public function getClave(){
			return $this->clave;
		}

		public function setClave($clave){
			$this->clave = $clave;
		}

		public function getTipo(){
			return $this->tipo;
		}

		public function setTipo($tipo){
			$this->tipo = $tipo;
		}
	}
?>