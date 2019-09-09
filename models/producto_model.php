<?php
    include_once 'conexion_mysqli.php';
    class Producto extends DbConfig
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
        function Insertar($id_producto, $codigo, $nombre, $descripcion, $unidad, $precio_compra, $precio_venta, $estado, $ruta, $id_proveedor, $id_categoria)
        {   
            self::setNames();
            $query = "INSERT INTO productos(id_producto, codigo, nombre_p, descripcion, unidad, precio_compra, precio_venta, estado, imagen, id_proveedor, id_categoria) VALUES ('$id_producto', '$codigo', '$nombre', '$descripcion', '$unidad', '$precio_compra', '$precio_venta', '$estado', '$ruta', '$id_proveedor', '$id_categoria')";
            
            $result = $this->connection->query($query) or die ("Error al consultar datos".mysqli_error($this->connection));

            if ($result) {
                echo "<script>
                            alert('producto Guardado');
                            window.location= 'inventario.php'
                    </script>";
                return true;

            } else {
                echo "<script>
                            alert('Error al guardar producto');
                            window.location= 'inventario.php'
                    </script>";
                return false;
            }
        }
        // Mostrar o Listar producto
        function Consultar()
        {   
            self::setNames();
            $query = "SELECT * FROM productos";
            
            $result = $this->connection->query($query) or die ("Error al consultar datos".mysqli_error($this->connection));

            foreach ($this->connection->query($query) as $res) {
                $this->servicio[] = $res;
            }
            return $this->servicio;
            $this->connection = null;
            
        }

        function Mostrar($id_p)
        {   
            self::setNames();
            $query = "SELECT * FROM productos WHERE id_producto = '$id_p'";
            
            $result = $this->connection->query($query) or die ("Error al consultar datos".mysqli_error($this->connection));

            foreach ($this->connection->query($query) as $res) {
                $this->servicio[] = $res;
            }
            return $this->servicio;
            $this->connection = null;
            
        }

        function Update($id_producto, $codigo, $nombre, $descripcion, $unidad, $precio_compra, $precio_venta, $estado)
        {   
            self::setNames();
            $query = "UPDATE productos SET codigo = '$codigo' , nombre_p = '$nombre' , descripcion = '$descripcion', unidad = '$unidad' , precio_compra = '$precio_compra' , precio_venta = '$precio_venta', estado = '$estado' WHERE id_producto = '$id_producto'";
            
            $result = $this->connection->query($query) or die ("Error al consultar datos".mysqli_error($this->connection));

            if ($result) {
                echo "<script>
                            alert('Producto Actualizado');
                            window.location= 'inventario.php'
                    </script>";
                return true;

            } else {
                echo "<script>
                            alert('Error al actualizar producto');
                            window.location= 'inventario.php'
                    </script>";
                return false;
            }
        }    
    }
/*--------------------------------------------------------------------------------------*/
/*--------------------------------------------------------------------------------------*/
/*--------------------------------------------------------------------------------------*/
/*--------------------------------------------------------------------------------------*/
/*--------------------------------------------------------------------------------------*/
/*--------------------------------------------------------------------------------------*/
    class InventarioP extends DbConfig
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
        function Insertar($id_producto, $stock_up)
        {   
            self::setNames();
            $query = "INSERT INTO inventario_prod (id_producto, stock_up) VALUES ('$id_producto', '$stock_up')";
            
            $result = $this->connection->query($query) or die ("Error al consultar datos".mysqli_error($this->connection));

            if ($result) {
                echo "<script>
                            alert('Producto agregado a inventario');
                            window.location= 'inventario.php'
                    </script>";
                return true;

            } else {
                echo "<script>
                            alert('Error al agregar producto a inventario');
                            window.location= 'inventario.php'
                    </script>";
                return false;
            }
        }
        function ConsultarEmpleados()
        {
            self::setNames();
            $query = "SELECT id, Nombre, Apellido FROM empleados";

            $result = $this->connection->query($query) or die ("Error al consultar datos".mysqli_error($this->connection));

            foreach ($this->connection->query($query) as $res) {
                $this->servicio[] = $res;
            }
            return $this->servicio;
            $this->connection = null;
        }

        // Mostrar o Listar producto en inventario
        function Consultar()
        {   
            self::setNames();
            $query = "SELECT * FROM lista_productos order by ID_INVENTARIO";
            
            $result = $this->connection->query($query) or die ("Error al consultar datos".mysqli_error($this->connection));

            foreach ($this->connection->query($query) as $res) {
                $this->servicio[] = $res;
            }
            return $this->servicio;
            $this->connection = null;
            
        }

        function Consultar1($id_e, $fi, $ff, $id_compra)
        {   
            self::setNames();
            $query = "SELECT * FROM detalle_compra WHERE ID_EMPLEADO = '$id_e' AND ORDEN_COMPRA = $id_compra AND F BETWEEN  '$fi' AND '$ff'";
            
            $result = $this->connection->query($query) or die ("Error al consultar datos".mysqli_error($this->connection));

            foreach ( $result as $res) {
                $this->servicio[] = $res;
            }
            return $this->servicio;
            $this->connection = null;    
        }

        function Consultar2($id_e, $fi, $ff, $id_compra)
        {   
            self::setNames();
            $query = "SELECT    sum(TOTAL_COMPRA) as TOTAL_F, 
                                EMPLEADO, 
                                sum(PRECIOC) as TPRE,
                                sum(TOTAL_PRODUCTOS) as TP,
                                sum(DESCUENTO) as DESCU,
                                PROVEEDOR,
                                CODRECIBO,
                                FECHA_COMPRA
                         FROM detalle_compra WHERE ID_EMPLEADO = '$id_e' AND ORDEN_COMPRA = $id_compra AND F BETWEEN  '$fi' AND '$ff'";
            
            $resultado=$this->connection->query($query) or die ("Error al consultar alumno".mysqli_error($this->connection));
            $filas=$resultado->fetch_assoc();
            return [
              $filas['TOTAL_F'],
              $filas['EMPLEADO'],
              $filas['TPRE'],
              $filas['TP'],
              $filas['DESCU'],
              $filas['PROVEEDOR'],
              $filas['CODRECIBO'],
            ];
        }

         function Consultar3()
        {   
            self::setNames();
            $query = "SELECT * FROM detalle_compra";
            
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
            $query = "SELECT    sum(TOTAL_COMPRA) as TOTAL_F,
                                sum(TOTAL_PRODUCTOS) as TP
                         FROM detalle_compra";
            
            $resultado=$this->connection->query($query) or die ("Error al consultar alumno".mysqli_error($this->connection));
            $filas=$resultado->fetch_assoc();
            return [
              $filas['TOTAL_F'],
              $filas['TP'],
            ];
        }
    }  
?>
            