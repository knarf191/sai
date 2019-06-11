-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-11-2017 a las 17:14:18
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sai`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `cliente` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `encargado` varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `cliente`, `direccion`, `encargado`, `telefono`, `email`) VALUES
(1, 'Bama Jaltipan Morelos', 'Morelos Esq Galeana', '', '9222641234', 'bamajaltipanmorelos@bama.com.mx'),
(2, 'Bama Transismica', 'Zamora Esq. Transismica', 'Hugo Fonseca', '9222646512', 'bamajaltipantransismica@bama.com.mx'),
(3, 'PARTICULAR', 'CONOCIDO', 'N/A', 'N/A', 'N/A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_carga_chofer`
--

CREATE TABLE `datos_carga_chofer` (
  `folio` int(20) NOT NULL,
  `fecha` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `chofer` varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  `ruta` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `datos_carga_chofer`
--

INSERT INTO `datos_carga_chofer` (`folio`, `fecha`, `chofer`, `ruta`) VALUES
(1, '2017-04-22', 'Jose Perez', 'Coatzacoalcos'),
(2, '2017-04-29', 'Victor', 'Acayucan'),
(3, '2017-11-04', 'JOSE PEREZ', 'ACAYUCAN');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `produccion`
--

CREATE TABLE `produccion` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `producto` varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  `registra` varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Tabla contenedora de los productos en stock';

--
-- Volcado de datos para la tabla `produccion`
--

INSERT INTO `produccion` (`id`, `fecha`, `producto`, `registra`, `cantidad`) VALUES
(1, '2017-04-22', 'Platano Dulce 100 grs', 'Frank Reyes Martinez', '500'),
(2, '2017-04-22', 'Platano Salado 100 grs', 'Frank Reyes Martinez', '800'),
(3, '2017-04-22', 'Chicarron c/chile', 'Frank Reyes Martinez', '200'),
(4, '2017-04-22', 'Platano Enchilado 100 grs', 'Frank Reyes Martinez', '400'),
(5, '2017-04-22', 'Platano Dulce 100 grs', 'Frank Reyes Martinez', '300'),
(6, '2017-04-24', 'Cacahuate Enchilado 80 grs', 'Frank Reyes Martinez', '300'),
(7, '2017-04-22', 'Refresco Manzana', 'Frank Reyes Martinez', '2000'),
(8, '2017-04-22', 'Refresco Durazno', 'Frank Reyes Martinez', '2000'),
(9, '2017-04-29', 'Platano Dulce 100 grs', 'Frank Reyes Martinez', '50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_carga_chofer`
--

CREATE TABLE `productos_carga_chofer` (
  `folio` int(20) NOT NULL,
  `cantidad` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `producto` varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  `venta` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `regreso` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `merma` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `sin_comprobar` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productos_carga_chofer`
--

INSERT INTO `productos_carga_chofer` (`folio`, `cantidad`, `producto`, `venta`, `regreso`, `merma`, `sin_comprobar`) VALUES
(1, '150', 'Cacahuate Enchilado 80 grs', '120', '25', '3', '2'),
(1, '50', 'Chicarron c/chile', '48', '2', '0', '0'),
(1, '80', 'Platano Dulce 100 grs', '75', '3', '0', '2'),
(1, '200', 'Platano Enchilado 100 grs', '200', '0', '0', '0'),
(1, '100', 'Platano Salado 100 grs', '80', '15', '0', '5'),
(2, '50', 'Platano Dulce 100 grs', '40', '8', '2', '0'),
(2, '200', 'Platano Salado 100 grs', '180', '15', '3', '2'),
(3, '150', 'Platano Dulce 100 grs', '', '', '', ''),
(3, '100', 'Platano Salado 100 grs', '', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_venta_tienda`
--

CREATE TABLE `producto_venta_tienda` (
  `id` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `producto` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `precio` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `impuesto` varchar(15) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `producto_venta_tienda`
--

INSERT INTO `producto_venta_tienda` (`id`, `cantidad`, `producto`, `precio`, `impuesto`) VALUES
('1', '120', 'Cacahuate Enchilado 80 grs', '8', '8'),
('1', '50', 'Chicharron c/chile', '12', '8'),
('1', '80', 'Platano Dulce 100 grs', '10', '8'),
('1', '200', 'Refrescos Durazno', '12', '16'),
('1', '100', 'Refrescos Manzana', '12', '16'),
('2', '100', 'Platano Dulce 100 grs', '12', '8'),
('2', '50', 'Platano Salado 100 grs', '13', '8'),
('3', '2', 'Chicharrones c/chile', '15', '8'),
('4', '5', 'Chicarron c/chile', '15', '8'),
('5', '25', 'Platano Dulce 100 grs', '12.5', '8'),
('5', '50', 'Platano Salado 100 grs', '12.5', '8'),
('6', '50', 'Platano Dulce 100 grs', '15', '0'),
('6', '30', 'Refresco Durazno', '12', '8'),
('7', '2', 'Platano Salado 100 grs', '16', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stock`
--

CREATE TABLE `stock` (
  `id` int(11) NOT NULL,
  `producto` varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Productos en stock';

--
-- Volcado de datos para la tabla `stock`
--

INSERT INTO `stock` (`id`, `producto`, `cantidad`) VALUES
(1, 'Platano Dulce 100 grs', '570'),
(2, 'Platano Salado 100 grs', '398'),
(3, 'Chicarron c/chile', '145'),
(4, 'Platano Enchilado 100 grs', '200'),
(5, 'Cacahuate Enchilado 80 grs', '150'),
(6, 'Refresco Manzana', '2000'),
(7, 'Refresco Durazno', '2000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  `user` varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  `chofer` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `produccion` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `clientes` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `ventas` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `usuarios` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `user`, `password`, `chofer`, `produccion`, `clientes`, `ventas`, `usuarios`) VALUES
(1, 'Administrador', 'root', 'root', 'true', 'true', 'true', 'true', 'true'),
(2, 'Frank', 'administrador', '123456', 'false', 'false', 'true', 'false', 'false');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta_producto`
--

CREATE TABLE `venta_producto` (
  `id` int(11) NOT NULL,
  `producto` varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `cliente` varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_pedido` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `venta_producto`
--

INSERT INTO `venta_producto` (`id`, `producto`, `cantidad`, `cliente`, `fecha_pedido`) VALUES
(1, 'Cacahuate Enchilado 80 grs', '120', 'Bama Jaltipan Morelos', '2017-04-22'),
(2, 'Refrescos Manzana', '100', 'Bama Jaltipan Morelos', '2017-04-22'),
(3, 'Chicharron c/chile', '50', 'Bama Jaltipan Morelos', '2017-04-22'),
(4, 'Platano Dulce 100 grs', '80', 'Bama Jaltipan Morelos', '2017-04-22'),
(5, 'Refrescos Durazno', '200', 'Bama Jaltipan Morelos', '2017-04-22'),
(6, 'Platano Dulce 100 grs', '100', 'Bama Jaltipan Transismica', '2017-04-24'),
(7, 'Platano Salado 100 grs', '50', 'Bama Jaltipan Transismica', '2017-04-24'),
(8, 'Chicharrones c/chile', '2', 'Particular', '2017-04-22'),
(9, 'Chicarron c/chile', '5', 'Particular', '2017-04-22'),
(10, 'Platano Dulce 100 grs', '25', 'Bama Jaltipan Morelos', '2017-04-29'),
(11, 'Platano Salado 100 grs', '50', 'Bama Jaltipan Morelos', '2017-04-29'),
(12, 'Platano Dulce 100 grs', '50', 'Bama Jaltipan Morelos', '2017-11-04'),
(13, 'Refresco Durazno', '30', 'Bama Jaltipan Morelos', '2017-11-04'),
(14, 'Platano Salado 100 grs', '2', 'PARTICULAR', '2017-11-04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta_tienda`
--

CREATE TABLE `venta_tienda` (
  `id` int(11) NOT NULL,
  `cliente` varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  `recibo` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `factura` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `estatus` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `vendedor` varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  `metodo_pago` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `forma_pago` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_pedido` date NOT NULL,
  `fecha_entrega` date NOT NULL,
  `fecha_pago` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `venta_tienda`
--

INSERT INTO `venta_tienda` (`id`, `cliente`, `recibo`, `factura`, `estatus`, `vendedor`, `metodo_pago`, `forma_pago`, `fecha_pedido`, `fecha_entrega`, `fecha_pago`) VALUES
(1, 'Bama Jaltipan Morelos', '247', 'N/A', 'Pendiente', 'Hugo Fonseca', 'Transferencia', 'Credito', '2017-04-22', '2017-04-24', '2017-05-15'),
(2, 'Bama Jaltipan Transismica', '693', 'N/A', 'Pendiente', 'Hugo Fonseca', 'Transferencia', 'Credito', '2017-04-24', '2017-04-27', '2017-05-22'),
(3, 'Particular', '0', '0', '0', 'Frank Reyes', '0', '0', '2017-04-22', '0000-00-00', '0000-00-00'),
(4, 'Particular', '0', '0', '0', 'Frank Reyes', '0', '0', '2017-04-22', '0000-00-00', '0000-00-00'),
(5, 'Bama Jaltipan Morelos', '450', 'na', 'Pendiente', 'victor', 'Transferencia', 'Credito', '2017-04-29', '2017-05-02', '2017-05-26'),
(6, 'Bama Jaltipan Morelos', '', '', 'Pendiente', 'JOSE PEREZ', 'Transferencia', 'Credito', '2017-11-04', '2017-11-04', '2017-11-04'),
(7, 'PARTICULAR', '0', '0', '0', 'RICARDO GONZALEZ', '0', '0', '2017-11-04', '0000-00-00', '0000-00-00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `datos_carga_chofer`
--
ALTER TABLE `datos_carga_chofer`
  ADD PRIMARY KEY (`folio`);

--
-- Indices de la tabla `produccion`
--
ALTER TABLE `produccion`
  ADD PRIMARY KEY (`id`,`producto`);

--
-- Indices de la tabla `productos_carga_chofer`
--
ALTER TABLE `productos_carga_chofer`
  ADD PRIMARY KEY (`folio`,`producto`);

--
-- Indices de la tabla `producto_venta_tienda`
--
ALTER TABLE `producto_venta_tienda`
  ADD PRIMARY KEY (`id`,`producto`);

--
-- Indices de la tabla `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `producto` (`producto`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`,`nombre`,`user`);

--
-- Indices de la tabla `venta_producto`
--
ALTER TABLE `venta_producto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `venta_tienda`
--
ALTER TABLE `venta_tienda`
  ADD PRIMARY KEY (`id`,`cliente`,`recibo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `datos_carga_chofer`
--
ALTER TABLE `datos_carga_chofer`
  MODIFY `folio` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `produccion`
--
ALTER TABLE `produccion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `venta_producto`
--
ALTER TABLE `venta_producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `venta_tienda`
--
ALTER TABLE `venta_tienda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
