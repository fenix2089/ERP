<?php
class AlumnoModel
{
	private $pdo;

	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = new PDO('mysql:host=localhost;dbname=serppii', 'root', '');
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Listar()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT id, DUI, Nombre, Correo, Apellido, Foto, Sexo, FechaNacimiento, cargo, FechaRegistro, TIMESTAMPDIFF(YEAR, FechaNacimiento, CURDATE()) AS Edad, CuentaBancaria, SeguridadSocial, telefono, direccion FROM empleados");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$alm = new Alumno();

				$alm->__SET('id', $r->id);
				$alm->__SET('Nombre', $r->Nombre);
				$alm->__SET('Apellido', $r->Apellido);
        $alm->__SET('Correo', $r->Correo);
        $alm->__SET('Foto', $r->Foto);
				$alm->__SET('Sexo', $r->Sexo);
				$alm->__SET('FechaNacimiento', $r->FechaNacimiento);
				$alm->__SET('cargo', $r->cargo);
				$alm->__SET('FechaRegistro', $r->FechaRegistro);
				$alm->__SET('Edad', $r->Edad);
				$alm->__SET('direccion', $r->direccion);
				$alm->__SET('DUI', $r->DUI);
				$alm->__SET('telefono', $r->telefono);
				$alm->__SET('CuentaBancaria', $r->CuentaBancaria);
				$alm->__SET('SeguridadSocial', $r->SeguridadSocial);
				$result[] = $alm;
			}

			return $result;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($id)
	{
		try
		{
			$stm = $this->pdo
			          ->prepare("SELECT id, DUI, Nombre, Correo, Apellido, Foto, Sexo, FechaNacimiento, cargo, FechaRegistro, TIMESTAMPDIFF(YEAR, FechaNacimiento, CURDATE()) AS Edad, CuentaBancaria, SeguridadSocial, telefono, direccion FROM empleados WHERE id = ?");


			$stm->execute(array($id));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$alm = new Alumno();

			$alm->__SET('id', $r->id);
			$alm->__SET('Nombre', $r->Nombre);
      $alm->__SET('Correo', $r->Correo);
			$alm->__SET('Apellido', $r->Apellido);
      $alm->__SET('Foto', $r->Foto);
			$alm->__SET('Sexo', $r->Sexo);
			$alm->__SET('FechaNacimiento', $r->FechaNacimiento);
			$alm->__SET('cargo', $r->cargo);
			$alm->__SET('FechaRegistro', $r->FechaRegistro);
			$alm->__SET('Edad', $r->Edad);
			$alm->__SET('direccion', $r->direccion);
			$alm->__SET('DUI', $r->DUI);
			$alm->__SET('telefono', $r->telefono);
			$alm->__SET('CuentaBancaria', $r->CuentaBancaria);
			$alm->__SET('SeguridadSocial', $r->SeguridadSocial);
			return $alm;
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($id)
	{
		try
		{
			$stm = $this->pdo->prepare("DELETE FROM empleados WHERE id = ?");

			$stm->execute(array($id));
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Actualizar(Alumno $data)
	{
		try
		{
			$sql = "UPDATE empleados SET
						DUI 	        = ?,
						Nombre          = ?,
						Apellido        = ?,
						direccion       = ?,
						telefono        = ?,
						CuentaBancaria  = ?,
						SeguridadSocial = ?,
						Sexo            = ?,
						FechaNacimiento = ?,
						cargo			= ?,
						FechaRegistro	= ?,
                        Correo          = ?,
                        Foto            = ?
				    WHERE id = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				array(
					$data->__GET('DUI'),
					$data->__GET('Nombre'),
					$data->__GET('Apellido'),
					$data->__GET('direccion'),
					$data->__GET('telefono'),
					$data->__GET('CuentaBancaria'),
					$data->__GET('SeguridadSocial'),
					$data->__GET('Sexo'),
					$data->__GET('FechaNacimiento'),
					$data->__GET('cargo'),
					$data->__GET('FechaRegistro'),
                    $data->__GET('Correo'),
                    $data->__GET('Foto'),
					$data->__GET('id')
					)
				);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Alumno $data)
	{
		try
		{
		$sql = "INSERT INTO empleados (DUI,Nombre,Apellido,direccion,telefono,CuentaBancaria,SeguridadSocial,Sexo,FechaNacimiento,cargo,FechaRegistro,Correo,Foto)
		        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
			array(
				$data->__GET('DUI'),
				$data->__GET('Nombre'),
				$data->__GET('Apellido'),
				$data->__GET('direccion'),
				$data->__GET('telefono'),
				$data->__GET('CuentaBancaria'),
				$data->__GET('SeguridadSocial'),
				$data->__GET('Sexo'),
				$data->__GET('FechaNacimiento'),
				$data->__GET('cargo'),
				$data->__GET('FechaRegistro'),
                $data->__GET('Correo'),
                $data->__GET('Foto'),
				)
			);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}
}
