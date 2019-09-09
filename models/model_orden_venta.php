<?php 
	include_once 'conexion_mysqli.php'; 
	class Ordenesv extends DbConfig
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

		function Ordenventa($id_orden, $fecha, $hora, $id_empleado,$id_cliente)
		{	
			self::setNames();
			$query = "INSERT INTO  orden_venta(id_orden_venta, fecha, hora, id_empleado, id_cliente) VALUES('$id_orden', '$fecha', '$hora', '$id_empleado', '$id_cliente')";
			
			$result = $this->connection->query($query) or die ("Error al consultar datos".mysqli_error($this->connection));

			if ($result) 
			{
				echo "<script>
		      	 		 	alert('Orden de venta creada');
		        			window.location= 'mainpage2.php'
		        	</script>";
				return true;

			} 
			else 
			{
				echo "<script>
		      	 		 	alert('Error al crear orden de venta');
		        			window.location= 'mainpage2.php'
		        	</script>";
				return false;
			}
			
		}

		function Consultar()
		{	
			self::setNames();
			$query = "SELECT * FROM ordenes_ventas";
			
			$result = $this->connection->query($query) or die ("Error al consultar datos".mysqli_error($this->connection));

			foreach ($this->connection->query($query) as $res) {
				$this->servicio[] = $res;
			}
			return $this->servicio;
			$this->connection = null;
			
		}

		function Consultar1($id_e, $fi, $ff, $id_venta, $id_cliente)
        {   
            self::setNames();
            $query = "SELECT * FROM detalle_venta WHERE ID_EMPLEADO = '$id_e' AND ID_VENTA = $id_venta AND FECHA_DESPACHADA BETWEEN  '$fi' AND '$ff' AND ID_CLIENTE = $id_cliente";
            
            $result = $this->connection->query($query) or die ("Error al consultar datos".mysqli_error($this->connection));

            foreach ( $result as $res) {
                $this->servicio[] = $res;
            }
            return $this->servicio;
            $this->connection = null;    
        }

        function Consultar2($id_e, $fi, $ff, $id_venta, $id_cliente)
        {   
            self::setNames();
            $query = "SELECT    sum(PRECIO_A_PAGAR) as TOTAL_F, 
                                EMPLEADO, 
                                sum(PRECIO_PRODUCTO) as TPRE,
                                sum(TOTAL_PRODUCTOS) as TP,
                                sum(DESCUENTO) as DESCU,
                                CODRECIBO,
                                FECHA_ORDEN,
                                CLIENTE
                         FROM detalle_venta WHERE ID_EMPLEADO = '$id_e' AND ID_VENTA = $id_venta AND FECHA_DESPACHADA BETWEEN  '$fi' AND '$ff' AND ID_CLIENTE= $id_cliente";
            
            $resultado=$this->connection->query($query) or die ("Error al consultar alumno".mysqli_error($this->connection));
            $filas=$resultado->fetch_assoc();
            return [
              $filas['TOTAL_F'],
              $filas['EMPLEADO'],
              $filas['TPRE'],
              $filas['TP'],
              $filas['DESCU'],
              $filas['CLIENTE'],
              $filas['CODRECIBO'],
            ];
        }

         function Consultar3()
        {   
            self::setNames();
            $query = "SELECT * FROM detalle_venta";
            
            $result = $this->connection->query($query) or die ("Error al consultar datos".mysqli_error($this->connection));

            foreach ( $result as $res) {
                $this->servicio[] = $res;
            }
            return $this->servicio;
            $this->connection = null;
            
        }

        function Consultar4()
        {   
            self::setNames();
            $query = "SELECT    sum(PRECIO_A_PAGAR) as TOTAL_F,
                                sum(TOTAL_PRODUCTOS) as TP
                         FROM detalle_venta";
            
            $resultado=$this->connection->query($query) or die ("Error al consultar alumno".mysqli_error($this->connection));
            $filas=$resultado->fetch_assoc();
            return [
              $filas['TOTAL_F'],
              $filas['TP'],
            ];
        }
	}
?>