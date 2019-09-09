<?php 
	require_once('conexion.php');
	require_once('usuario.php');
	
	class CrudUsuario{

		public function __construct(){}

		//inserta los datos del usuario
		public function insertar($usuario){
			$db=Db::conectar();
			$insert=$db->prepare('INSERT INTO usuarios VALUES(NULL,:nombre, :clave, :tipo)');
			$insert->bindValue('nombre',$usuario->getNombre());
			//encripta la clave
			$pass=password_hash($usuario->getClave(),PASSWORD_DEFAULT);
			$insert->bindValue('clave',$pass);
			$insert->bindValue('tipo',$usuario->getTipo());
			$insert->execute();
		}

		//obtiene el usuario para el login
		public function obtenerUsuario($nombre, $clave){
			$db=Db::conectar();
			$select=$db->prepare('SELECT * FROM usuarios WHERE nombre=:nombre');//AND clave=:clave  and tipo=:tipo
			$select->bindValue('nombre',$nombre);
			$select->execute();
			$registro=$select->fetch();
			$usuario=new Usuario();
			//verifica si la clave es conrrecta
			if (password_verify($clave, $registro['clave'])) {				
				//si es correcta, asigna los valores que trae desde la base de datos
				$usuario->setId($registro['Id']);
				$usuario->setNombre($registro['nombre']);
				$usuario->setClave($registro['clave']);
				$usuario->setTipo($registro['tipo']);
			}			
			return $usuario;
		}

		//busca el nombre del usuario si existe
		public function buscarUsuario($nombre){
			$db=Db::conectar();
			$select=$db->prepare('SELECT * FROM usuarios WHERE nombre=:nombre');
			$select->bindValue('nombre',$nombre);
			$select->execute();
			$registro=$select->fetch();
			if($registro['Id']!=NULL){
				$usado=False;
			}else{
				$usado=True;
			}	
			return $usado;
		}

		public function getServicios() {
			$db=Db::conectar();
			$select=$db->prepare('SELECT * FROM usuarios');
			$registro=$select->fetch();
			foreach ($db->query($select) as $res) {
				$db[] = $res;
			}
			return $db;
			$db = null;
		}
	}
?>