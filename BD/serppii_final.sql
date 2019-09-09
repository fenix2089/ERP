-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 04-06-2018 a las 16:42:59
-- Versión del servidor: 5.7.19
-- Versión de PHP: 7.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `serppii`
--

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `abastecer`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `abastecer`;
CREATE TABLE IF NOT EXISTS `abastecer` (
`Id_Pedido` int(11)
,`ID` int(11)
,`PRODUCTO` varchar(100)
,`STOCK` int(11)
,`PRECIO_COMPRA` decimal(10,2)
,`PRECIO_VENTA` decimal(10,2)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `asistencia_empleados`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `asistencia_empleados`;
CREATE TABLE IF NOT EXISTS `asistencia_empleados` (
`ID_EMPLEADO` int(11)
,`EMPLEADO` varchar(101)
,`FECHA_ENTRADA` date
,`FECHA_SALIDA` date
,`HORA_ENTRADA` time
,`HORA_SALIDA` time
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE IF NOT EXISTS `categorias` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nombre`, `estado`) VALUES
(1, 'Zapatos', 1),
(2, 'Electrónicos', 2),
(3, 'Línea Blanca', 2),
(4, 'Carros', 2),
(5, 'Ropa', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_clientes`
--

DROP TABLE IF EXISTS `categoria_clientes`;
CREATE TABLE IF NOT EXISTS `categoria_clientes` (
  `id_cat_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_cat` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_cat_cliente`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria_clientes`
--

INSERT INTO `categoria_clientes` (`id_cat_cliente`, `nombre_cat`) VALUES
(1, 'VIP'),
(2, 'Bronce'),
(3, 'Silver'),
(4, 'Gold');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `id_cliente` varchar(10) NOT NULL,
  `nombre_c` varchar(100) NOT NULL,
  `apellido_c` varchar(100) NOT NULL,
  `direccion_c` text NOT NULL,
  `telefono` int(11) NOT NULL,
  `correo` text NOT NULL,
  `tipo_cliente` int(11) NOT NULL,
  PRIMARY KEY (`id_cliente`),
  KEY `clientes_ibfk_1` (`tipo_cliente`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nombre_c`, `apellido_c`, `direccion_c`, `telefono`, `correo`, `tipo_cliente`) VALUES
('230', 'Israel', 'orellana', 'San Salvador', 12345678, 'rigorellana@live.com', 1),
('330', 'Rigoberto', 'Orellana', 'San Salvador', 12345678, 'rigorellana@outlook.com', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto_proveedores`
--

DROP TABLE IF EXISTS `contacto_proveedores`;
CREATE TABLE IF NOT EXISTS `contacto_proveedores` (
  `id_contacto` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `apellido` varchar(100) DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  `email` text,
  PRIMARY KEY (`id_contacto`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `contacto_proveedores`
--

INSERT INTO `contacto_proveedores` (`id_contacto`, `nombre`, `apellido`, `telefono`, `email`) VALUES
(1, 'gbgjhvfhjgvfg', 'vcfghjvchgvcfhg', 1234567891, 'gvfedhjvgfedd@gmail.com'),
(2, 'Joel Manager BMW', 'fwf', 35456566, 'jbmw@gmail.com');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `detalle_compra`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `detalle_compra`;
CREATE TABLE IF NOT EXISTS `detalle_compra` (
`ORDEN_COMPRA` int(11)
,`FECHA_COMPRA` date
,`ID_EMPLEADO` int(11)
,`EMPLEADO` varchar(101)
,`ID_PRODUCTO` int(11)
,`PRODUCTO` varchar(100)
,`PRECIOC` decimal(10,2)
,`PRECIOV` decimal(10,2)
,`TOTAL_PRODUCTOS` int(11)
,`DESCUENTO` decimal(10,2)
,`TOTAL_COMPRA` decimal(10,2)
,`ID_PROVEEDOR` varchar(200)
,`PROVEEDOR` varchar(100)
,`F` date
,`CODRECIBO` int(11)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_dorden_abastecimiento`
--

DROP TABLE IF EXISTS `detalle_dorden_abastecimiento`;
CREATE TABLE IF NOT EXISTS `detalle_dorden_abastecimiento` (
  `id_d_orden` int(11) NOT NULL AUTO_INCREMENT,
  `id_detalle_ab` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `precio_unitario` decimal(10,2) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `descuento` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `fecha_c` date DEFAULT NULL,
  PRIMARY KEY (`id_d_orden`),
  KEY `detalle_dorden_abastecimiento_ibfk_1` (`id_detalle_ab`),
  KEY `ddetalle_dorden_abastecimiento_ibfk_2` (`id_producto`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_orden_venta`
--

DROP TABLE IF EXISTS `detalle_orden_venta`;
CREATE TABLE IF NOT EXISTS `detalle_orden_venta` (
  `id_d_orden` int(11) NOT NULL AUTO_INCREMENT,
  `id_orden_venta` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `precio_unitario` decimal(10,2) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `descuento` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `fecha` date NOT NULL,
  `hora` text NOT NULL,
  PRIMARY KEY (`id_d_orden`),
  KEY `detalle_orden_venta_ibfk_1` (`id_orden_venta`),
  KEY `ddetalle_orden_venta_ibfk_2` (`id_producto`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `detalle_venta`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `detalle_venta`;
CREATE TABLE IF NOT EXISTS `detalle_venta` (
`ID_VENTA` int(11)
,`FECHA_ORDEN` date
,`EMPLEADO` varchar(101)
,`ID_CLIENTE` varchar(10)
,`ID_EMPLEADO` int(11)
,`CLIENTE` varchar(201)
,`ID_PRODUCTO` int(11)
,`PRODUCTO` varchar(100)
,`PRECIO_PRODUCTO` decimal(10,2)
,`TOTAL_PRODUCTOS` int(11)
,`DESCUENTO` decimal(10,2)
,`PRECIO_A_PAGAR` decimal(10,2)
,`FECHA_DESPACHADA` date
,`CODRECIBO` int(11)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

DROP TABLE IF EXISTS `empleados`;
CREATE TABLE IF NOT EXISTS `empleados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `DUI` varchar(15) NOT NULL,
  `Nombre` varchar(50) NOT NULL DEFAULT '0',
  `Apellido` varchar(50) NOT NULL DEFAULT '0',
  `direccion` text,
  `telefono` varchar(20) DEFAULT NULL,
  `CuentaBancaria` varchar(100) DEFAULT NULL,
  `SeguridadSocial` varchar(100) DEFAULT NULL,
  `Sexo` tinyint(4) NOT NULL DEFAULT '0',
  `FechaNacimiento` varchar(50) DEFAULT NULL,
  `cargo` varchar(100) NOT NULL,
  `FechaRegistro` varchar(20) DEFAULT NULL,
  `Correo` varchar(50) NOT NULL,
  `Foto` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id`, `DUI`, `Nombre`, `Apellido`, `direccion`, `telefono`, `CuentaBancaria`, `SeguridadSocial`, `Sexo`, `FechaNacimiento`, `cargo`, `FechaRegistro`, `Correo`, `Foto`) VALUES
(14, '04570283-3', 'Rigoberto Israel', 'Orellana Orellana', 'SS', '(503)-7252-4374', '5465465652', '5265426456', 1, '1992-01-04', 'Gerente', '2018-06-02', 'rigorellana@live.com', '180604122413-oo02121930.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrada_empleados`
--

DROP TABLE IF EXISTS `entrada_empleados`;
CREATE TABLE IF NOT EXISTS `entrada_empleados` (
  `id_entrada` int(11) NOT NULL AUTO_INCREMENT,
  `id_empleado` int(11) NOT NULL,
  `fecha_entrada` date DEFAULT NULL,
  `hora_entrada` time DEFAULT NULL,
  PRIMARY KEY (`id_entrada`),
  KEY `entrada_empleados_ibfk_1` (`id_empleado`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario_prod`
--

DROP TABLE IF EXISTS `inventario_prod`;
CREATE TABLE IF NOT EXISTS `inventario_prod` (
  `id_i_p` int(11) NOT NULL AUTO_INCREMENT,
  `id_producto` int(11) NOT NULL,
  `stock_up` int(11) NOT NULL,
  PRIMARY KEY (`id_i_p`),
  KEY `inventario_prod_ibfk_1` (`id_producto`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `inventario_prod`
--

INSERT INTO `inventario_prod` (`id_i_p`, `id_producto`, `stock_up`) VALUES
(1, 1010, 0),
(2, 1011, 0),
(3, 1012, 0),
(6, 1013, 0);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `lista_productos`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `lista_productos`;
CREATE TABLE IF NOT EXISTS `lista_productos` (
`ID_INVENTARIO` int(11)
,`ID_PRODUCTO` int(11)
,`PRODUCTO` varchar(100)
,`PRECIOC` decimal(10,2)
,`PRECIOV` decimal(10,2)
,`FOTO` text
,`STOCK` int(11)
,`ESTADO` tinyint(1)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `orden`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `orden`;
CREATE TABLE IF NOT EXISTS `orden` (
`OrdenD` int(11)
,`Empleado` varchar(101)
,`Fecha` date
,`Hora` text
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `ordenes_ventas`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `ordenes_ventas`;
CREATE TABLE IF NOT EXISTS `ordenes_ventas` (
`OrdenV` int(11)
,`Fecha` date
,`Hora` text
,`Empleado` varchar(101)
,`Cliente` varchar(201)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden_abastecimiento`
--

DROP TABLE IF EXISTS `orden_abastecimiento`;
CREATE TABLE IF NOT EXISTS `orden_abastecimiento` (
  `id_detalle_ab` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` text NOT NULL,
  `id_empleado` int(11) NOT NULL,
  PRIMARY KEY (`id_detalle_ab`),
  KEY `orden_abastecimiento_ibfk_1` (`id_empleado`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden_venta`
--

DROP TABLE IF EXISTS `orden_venta`;
CREATE TABLE IF NOT EXISTS `orden_venta` (
  `id_orden_venta` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` text NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `id_cliente` varchar(10) NOT NULL,
  PRIMARY KEY (`id_orden_venta`),
  KEY `orden_venta_ibfk_1` (`id_empleado`),
  KEY `orden_venta_ibfk_2` (`id_cliente`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

DROP TABLE IF EXISTS `productos`;
CREATE TABLE IF NOT EXISTS `productos` (
  `id_producto` int(11) NOT NULL,
  `codigo` varchar(100) NOT NULL,
  `nombre_p` varchar(100) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `unidad` varchar(100) DEFAULT NULL,
  `precio_compra` decimal(10,2) NOT NULL,
  `precio_venta` decimal(10,2) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `imagen` text,
  `id_proveedor` varchar(100) DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_producto`),
  KEY `productos_ibfk_1` (`id_proveedor`),
  KEY `productos_ibfk_2` (`id_categoria`)
) ENGINE=MyISAM AUTO_INCREMENT=1014 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `codigo`, `nombre_p`, `descripcion`, `unidad`, `precio_compra`, `precio_venta`, `estado`, `imagen`, `id_proveedor`, `id_categoria`) VALUES
(1010, '1010', 'Tenis Puma', 'Color Negro  y Morado', 'Pares', '70.00', '119.99', 1, '../../uploads/productos/tenis-puma-smash-perf-363722-03-D_NQ_NP_887720-MLM26489551583_122017-F.jpg', 'PUMAUSA', 1),
(1011, '1010', 'Tenis Puma RedBull', 'Color Gris y Blanco', 'Pares', '85.00', '125.00', 1, '../../uploads/productos/puma_red_bull_racing_wings_navyblue.jpg', 'PUMAUSA', 1),
(1012, '1012', 'Puma Mercury', 'Galaxy', 'Pares', '85.00', '100.00', 1, '../../uploads/productos/PUMA Mercury Low S1P ESD SRC Safety Calzado grey - blue L25r7603_LRG.jpg', 'PUMAUSA', 1),
(1013, '1013', 'Botines Puma', 'Negros', 'Pares', '65.99', '100.00', 1, '../../uploads/productos/zapatillas-puma-ignite-evoknit-botines-para-hombre-ndph-D_NQ_NP_937325-MPE25427262007_032017-F.jpg', 'PUMAUSA', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

DROP TABLE IF EXISTS `proveedores`;
CREATE TABLE IF NOT EXISTS `proveedores` (
  `id_proveedor` varchar(200) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `direccion` text,
  `telefono_fijo` int(11) DEFAULT NULL,
  `celular` int(11) DEFAULT NULL,
  `email` text,
  `id_contacto` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_proveedor`),
  KEY `proveedores_ibfk_1` (`id_contacto`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id_proveedor`, `nombre`, `direccion`, `telefono_fijo`, `celular`, `email`, `id_contacto`) VALUES
('PUMAUSA', 'PUMA EEUU', 'USA', 12345678, 112131, 'puma_usa@gmail.com', 1),
('BMW35', 'Bayerische Motoren Werke AG', '', 54463, 64456, 'bmw@live.com', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recibo_de_abastecimiento`
--

DROP TABLE IF EXISTS `recibo_de_abastecimiento`;
CREATE TABLE IF NOT EXISTS `recibo_de_abastecimiento` (
  `id_recibo` int(11) NOT NULL AUTO_INCREMENT,
  `id_orden_abastecimiento` int(11) NOT NULL,
  PRIMARY KEY (`id_recibo`),
  KEY `recibo_de_abastecimiento_ibfk_1` (`id_orden_abastecimiento`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recibo_de_venta`
--

DROP TABLE IF EXISTS `recibo_de_venta`;
CREATE TABLE IF NOT EXISTS `recibo_de_venta` (
  `id_recibo` int(11) NOT NULL AUTO_INCREMENT,
  `id_orden_venta` int(11) NOT NULL,
  PRIMARY KEY (`id_recibo`),
  KEY `recibo_de_venta_ibfk_1` (`id_orden_venta`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salida_empleados`
--

DROP TABLE IF EXISTS `salida_empleados`;
CREATE TABLE IF NOT EXISTS `salida_empleados` (
  `id_salida` int(11) NOT NULL AUTO_INCREMENT,
  `id_empleado` int(11) NOT NULL,
  `fecha_salida` date DEFAULT NULL,
  `hora_salida` time DEFAULT NULL,
  PRIMARY KEY (`id_salida`),
  KEY `salida_empleados_ibfk_1` (`id_empleado`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `Id` int(255) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `clave` varchar(255) DEFAULT NULL,
  `tipo` varchar(50) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Id`, `nombre`, `clave`, `tipo`) VALUES
(1, 'admin', '$2y$10$EMDcekhh8P6jxZ0ThnP9hOR/dkjREYhvj5WxYMcMYHfZsyiMza60u', 'admin');

-- --------------------------------------------------------

--
-- Estructura para la vista `abastecer`
--
DROP TABLE IF EXISTS `abastecer`;

CREATE ALGORITHM=UNDEFINED DEFINER=`u888333438_erp`@`mysql.hostinger.com` SQL SECURITY DEFINER VIEW `abastecer`  AS  select `inventario_prod`.`id_i_p` AS `Id_Pedido`,`inventario_prod`.`id_producto` AS `ID`,`productos`.`nombre_p` AS `PRODUCTO`,`inventario_prod`.`stock_up` AS `STOCK`,`productos`.`precio_compra` AS `PRECIO_COMPRA`,`productos`.`precio_venta` AS `PRECIO_VENTA` from (`inventario_prod` join `productos` on((`inventario_prod`.`id_producto` = `productos`.`id_producto`))) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `asistencia_empleados`
--
DROP TABLE IF EXISTS `asistencia_empleados`;

CREATE ALGORITHM=UNDEFINED DEFINER=`u888333438_erp`@`mysql.hostinger.com` SQL SECURITY DEFINER VIEW `asistencia_empleados`  AS  select `e`.`id` AS `ID_EMPLEADO`,concat(`e`.`Nombre`,' ',`e`.`Apellido`) AS `EMPLEADO`,`i`.`fecha_entrada` AS `FECHA_ENTRADA`,`o`.`fecha_salida` AS `FECHA_SALIDA`,`i`.`hora_entrada` AS `HORA_ENTRADA`,`o`.`hora_salida` AS `HORA_SALIDA` from ((`entrada_empleados` `i` join `empleados` `e` on((`i`.`id_empleado` = `e`.`id`))) join `salida_empleados` `o` on((`o`.`id_empleado` = `e`.`id`))) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `detalle_compra`
--
DROP TABLE IF EXISTS `detalle_compra`;

CREATE ALGORITHM=UNDEFINED DEFINER=`u888333438_erp`@`mysql.hostinger.com` SQL SECURITY DEFINER VIEW `detalle_compra`  AS  select `d`.`id_detalle_ab` AS `ORDEN_COMPRA`,`o`.`fecha` AS `FECHA_COMPRA`,`o`.`id_empleado` AS `ID_EMPLEADO`,concat(`e`.`Nombre`,' ',`e`.`Apellido`) AS `EMPLEADO`,`p`.`id_producto` AS `ID_PRODUCTO`,`p`.`nombre_p` AS `PRODUCTO`,`p`.`precio_compra` AS `PRECIOC`,`p`.`precio_venta` AS `PRECIOV`,`d`.`cantidad` AS `TOTAL_PRODUCTOS`,`d`.`descuento` AS `DESCUENTO`,`d`.`total` AS `TOTAL_COMPRA`,`s`.`id_proveedor` AS `ID_PROVEEDOR`,`s`.`nombre` AS `PROVEEDOR`,`d`.`fecha_c` AS `F`,`r`.`id_recibo` AS `CODRECIBO` from (((((`detalle_dorden_abastecimiento` `d` join `orden_abastecimiento` `o` on((`d`.`id_detalle_ab` = `o`.`id_detalle_ab`))) join `recibo_de_abastecimiento` `r` on((`r`.`id_orden_abastecimiento` = `o`.`id_detalle_ab`))) join `productos` `p` on((`d`.`id_producto` = `p`.`id_producto`))) join `proveedores` `s` on((`p`.`id_proveedor` = `s`.`id_proveedor`))) join `empleados` `e` on((`o`.`id_empleado` = `e`.`id`))) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `detalle_venta`
--
DROP TABLE IF EXISTS `detalle_venta`;

CREATE ALGORITHM=UNDEFINED DEFINER=`u888333438_erp`@`mysql.hostinger.com` SQL SECURITY DEFINER VIEW `detalle_venta`  AS  select `o`.`id_orden_venta` AS `ID_VENTA`,`o`.`fecha` AS `FECHA_ORDEN`,concat(`e`.`Nombre`,' ',`e`.`Apellido`) AS `EMPLEADO`,`c`.`id_cliente` AS `ID_CLIENTE`,`e`.`id` AS `ID_EMPLEADO`,concat(`c`.`nombre_c`,' ',`c`.`apellido_c`) AS `CLIENTE`,`p`.`id_producto` AS `ID_PRODUCTO`,`p`.`nombre_p` AS `PRODUCTO`,`d`.`precio_unitario` AS `PRECIO_PRODUCTO`,`d`.`cantidad` AS `TOTAL_PRODUCTOS`,`d`.`descuento` AS `DESCUENTO`,`d`.`total` AS `PRECIO_A_PAGAR`,`d`.`fecha` AS `FECHA_DESPACHADA`,`r`.`id_recibo` AS `CODRECIBO` from (((((`detalle_orden_venta` `d` join `orden_venta` `o` on((`d`.`id_orden_venta` = `o`.`id_orden_venta`))) join `recibo_de_venta` `r` on((`o`.`id_orden_venta` = `r`.`id_recibo`))) join `clientes` `c` on((`o`.`id_cliente` = `c`.`id_cliente`))) join `productos` `p` on((`d`.`id_producto` = `p`.`id_producto`))) join `empleados` `e` on((`o`.`id_empleado` = `e`.`id`))) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `lista_productos`
--
DROP TABLE IF EXISTS `lista_productos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`u888333438_erp`@`mysql.hostinger.com` SQL SECURITY DEFINER VIEW `lista_productos`  AS  select `inventario_prod`.`id_i_p` AS `ID_INVENTARIO`,`inventario_prod`.`id_producto` AS `ID_PRODUCTO`,`productos`.`nombre_p` AS `PRODUCTO`,`productos`.`precio_compra` AS `PRECIOC`,`productos`.`precio_venta` AS `PRECIOV`,`productos`.`imagen` AS `FOTO`,`inventario_prod`.`stock_up` AS `STOCK`,`productos`.`estado` AS `ESTADO` from (`inventario_prod` join `productos` on((`inventario_prod`.`id_producto` = `productos`.`id_producto`))) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `orden`
--
DROP TABLE IF EXISTS `orden`;

CREATE ALGORITHM=UNDEFINED DEFINER=`u888333438_erp`@`mysql.hostinger.com` SQL SECURITY DEFINER VIEW `orden`  AS  select `o`.`id_detalle_ab` AS `OrdenD`,concat(`e`.`Nombre`,' ',`e`.`Apellido`) AS `Empleado`,`o`.`fecha` AS `Fecha`,`o`.`hora` AS `Hora` from (`orden_abastecimiento` `o` join `empleados` `e` on((`o`.`id_empleado` = `e`.`id`))) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `ordenes_ventas`
--
DROP TABLE IF EXISTS `ordenes_ventas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`u888333438_erp`@`mysql.hostinger.com` SQL SECURITY DEFINER VIEW `ordenes_ventas`  AS  select `o`.`id_orden_venta` AS `OrdenV`,`o`.`fecha` AS `Fecha`,`o`.`hora` AS `Hora`,concat(`e`.`Nombre`,' ',`e`.`Apellido`) AS `Empleado`,concat(`c`.`nombre_c`,' ',`c`.`apellido_c`) AS `Cliente` from ((`orden_venta` `o` join `empleados` `e` on((`o`.`id_empleado` = `e`.`id`))) join `clientes` `c` on((`o`.`id_cliente` = `c`.`id_cliente`))) ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
