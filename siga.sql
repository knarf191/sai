-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-02-2017 a las 17:55:03
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `siga`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentos_vales_gasolina`
--

CREATE TABLE `documentos_vales_gasolina` (
  `folio_vale` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `no_documento` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `gasolinera` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `litros` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `costo_total` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Tabla para las facturas asociadas a los vales';

--
-- Volcado de datos para la tabla `documentos_vales_gasolina`
--

INSERT INTO `documentos_vales_gasolina` (`folio_vale`, `fecha`, `no_documento`, `gasolinera`, `litros`, `costo_total`) VALUES
('1', '2017-02-10', '588', 'Qualli', '60', '924'),
('21', '2017-02-17', '74563', 'Qualli', '10', '154'),
('3', '2017-02-10', '921', 'Del Golfo', '50', '770'),
('4', '2017-02-11', '900', 'Del Golfo', '50', '770'),
('5', '2017-02-16', '890', 'Del Golfo', '20', '500'),
('6', '2017-02-11', '855', 'Qualli', '50', '770');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entradas_computo`
--

CREATE TABLE `entradas_computo` (
  `folio` int(11) NOT NULL,
  `codigo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  `unidad` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `departamento` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `proveedor` varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  `documento` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `costo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `responsable` varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Control de entrada de materiales y/o herramientas';

--
-- Volcado de datos para la tabla `entradas_computo`
--

INSERT INTO `entradas_computo` (`folio`, `codigo`, `descripcion`, `unidad`, `departamento`, `cantidad`, `proveedor`, `documento`, `costo`, `responsable`, `fecha`) VALUES
(1, 'IM0001', 'IMPRESORAS XEROX MOD. 458C', 'pieza', 'Computo', '3', 'Officedepot', '745', '7500', 'Heber M. Reyes Fajardo', '2017-02-16'),
(2, 'MAU001', 'MAUSE OPTICO MCA. ACTECK', 'pieza', 'Computo', '5', 'Officedepot', '562', '425', 'Heber M. Reyes Fajardo', '2017-02-16'),
(3, 'IM0001', 'IMPRESORAS XEROX MOD. 458C', 'pieza', 'Computo', '4', 'Officedepot', '124', '10000', 'Heber M. Reyes Fajardo', '2017-02-16'),
(4, 'MAU001', 'MAUSE OPTICO MCA. ACTECK', 'pieza', 'Computo', '8', 'Officedepot', '7416', '680', 'Heber M. Reyes Fajardo', '2017-02-17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entradas_ornato`
--

CREATE TABLE `entradas_ornato` (
  `folio` int(11) NOT NULL,
  `codigo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  `unidad` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `departamento` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `proveedor` varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  `documento` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `costo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `responsable` varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Control de entrada de materiales y/o herramientas';

--
-- Volcado de datos para la tabla `entradas_ornato`
--

INSERT INTO `entradas_ornato` (`folio`, `codigo`, `descripcion`, `unidad`, `departamento`, `cantidad`, `proveedor`, `documento`, `costo`, `responsable`, `fecha`) VALUES
(1, 'BO0001', 'BOLSAS NEGRAS PARA BASURA', 'pieza', 'Limpieza', '10', 'Tlapaleria Mi tiendita', '1152', '150', 'Heber M. Reyes Fajardo', '2017-02-16'),
(2, 'MA0001', 'MACHETES', 'pieza', 'Ornato', '8', 'Tlapaleria Mi tiendita', '563', '680', 'Heber M. Reyes Fajardo', '2017-02-16'),
(3, 'MA0001', 'MACHETES', 'pieza', 'Ornato', '12', 'Tlapaleria Mi tiendita', '896', '1020', 'Heber M. Reyes Fajardo', '2017-02-16'),
(4, 'BO0001', 'BOLSAS NEGRAS PARA BASURA', 'pieza', 'Limpieza', '12', 'Tlapaleria Mi tiendita', '7415', '180', 'Heber M. Reyes Fajardo', '2017-02-17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entradas_papeleria`
--

CREATE TABLE `entradas_papeleria` (
  `folio` int(11) NOT NULL,
  `codigo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  `unidad` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `departamento` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `proveedor` varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  `documento` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `costo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `responsable` varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Control de entrada de materiales y/o herramientas';

--
-- Volcado de datos para la tabla `entradas_papeleria`
--

INSERT INTO `entradas_papeleria` (`folio`, `codigo`, `descripcion`, `unidad`, `departamento`, `cantidad`, `proveedor`, `documento`, `costo`, `responsable`, `fecha`) VALUES
(1, 'HO0001', 'PAQUETES 100 HOJAS BLANCAS T/CARTA', 'pieza', 'Papeleria', '20', 'Officedepot', '785', '1700', 'Heber M. Reyes Fajardo', '2017-02-16'),
(2, 'TIJ001', 'TIJERAS MCA. BARRILITO', 'pieza', 'Oficina', '5', 'Papeleria Jenny', '563', '125', 'Heber M. Reyes Fajardo', '2017-02-16'),
(3, 'TIJ001', 'TIJERAS MCA. BARRILITO', 'pieza', 'Oficina', '7', 'Papeleria Jenny', '123', '175', 'Heber M. Reyes Fajardo', '2017-02-16'),
(4, 'TIJ001', 'TIJERAS MCA. BARRILITO', 'pieza', 'Oficina', '4', 'Papeleria Jenny', '785', '100', 'Heber M. Reyes Fajardo', '2017-02-17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lubricantes`
--

CREATE TABLE `lubricantes` (
  `folio` int(11) NOT NULL,
  `cantidad` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `concepto` varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  `p_unit` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `importe` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Tabla contenedora del listado del vale de lubricantes';

--
-- Volcado de datos para la tabla `lubricantes`
--

INSERT INTO `lubricantes` (`folio`, `cantidad`, `concepto`, `p_unit`, `importe`) VALUES
(1, '1', 'Lt Aceite Castrol', '120', '120'),
(1, '2', 'Lts Lubricante p/frenos', '180', '360'),
(2, '2', 'Lts Aceite Castrol', '', ''),
(3, '3', 'Lts Lubricante p/frenos', '', ''),
(4, '1', 'Lt Liquido p/frenos', '', ''),
(4, '2', 'Lts Aceite Castrol', '', ''),
(4, '3', 'Lts Lubricante p/frenos', '', ''),
(5, '1', 'Lts Aceite Castrol', '120', '120'),
(5, '2', 'Lts Lubricante p/frenos', '180', '360');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material_salida_computo`
--

CREATE TABLE `material_salida_computo` (
  `id` int(50) NOT NULL,
  `codigo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Tabla que con tiene los materiales que le han dado salida';

--
-- Volcado de datos para la tabla `material_salida_computo`
--

INSERT INTO `material_salida_computo` (`id`, `codigo`, `descripcion`, `cantidad`) VALUES
(1, 'IM0001', 'IMPRESORAS XEROX MOD. 458C', '1'),
(1, 'MAU001', 'MAUSE OPTICO MCA. ACTECK', '2'),
(2, 'IM0001', 'IMPRESORAS XEROX MOD. 458C', '2'),
(2, 'MAU001', 'MAUSE OPTICO MCA. ACTECK', '4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material_salida_ornato`
--

CREATE TABLE `material_salida_ornato` (
  `id` int(50) NOT NULL,
  `codigo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Tabla que con tiene los materiales que le han dado salida';

--
-- Volcado de datos para la tabla `material_salida_ornato`
--

INSERT INTO `material_salida_ornato` (`id`, `codigo`, `descripcion`, `cantidad`) VALUES
(1, 'BO0001', 'BOLSAS NEGRAS PARA BASURA', '2'),
(1, 'MA0001', 'MACHETES', '5'),
(2, 'BO0001', 'BOLSAS NEGRAS PARA BASURA', '9'),
(2, 'MA0001', 'MACHETES', '6');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material_salida_papeleria`
--

CREATE TABLE `material_salida_papeleria` (
  `id` int(50) NOT NULL,
  `codigo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Tabla que con tiene los materiales que le han dado salida';

--
-- Volcado de datos para la tabla `material_salida_papeleria`
--

INSERT INTO `material_salida_papeleria` (`id`, `codigo`, `descripcion`, `cantidad`) VALUES
(1, 'HO0001', 'PAQUETES 100 HOJAS BLANCAS T/CARTA', '6'),
(1, 'TIJ001', 'TIJERAS MCA. BARRILITO', '2'),
(2, 'HO0001', 'PAQUETES 100 HOJAS BLANCAS T/CARTA', '2'),
(2, 'TIJ001', 'TIJERAS MCA. BARRILITO', '4'),
(3, 'HO0001', 'PAQUETES 100 HOJAS BLANCAS T/CARTA', '3'),
(3, 'TIJ001', 'TIJERAS MCA. BARRILITO', '2'),
(4, 'HO0001', 'PAQUETES 100 HOJAS BLANCAS T/CARTA', '1'),
(5, 'HO0001', 'PAQUETES 100 HOJAS BLANCAS T/CARTA', '2'),
(6, 'HO0001', 'PAQUETES 100 HOJAS BLANCAS T/CARTA', '1'),
(7, 'HO0001', 'PAQUETES 100 HOJAS BLANCAS T/CARTA', '2'),
(7, 'TIJ001', 'TIJERAS MCA. BARRILITO', '1'),
(8, 'HO0001', 'PAQUETES 100 HOJAS BLANCAS T/CARTA', '1'),
(8, 'TIJ001', 'TIJERAS MCA. BARRILITO', '2'),
(9, 'HO0001', 'PAQUETES 100 HOJAS BLANCAS T/CARTA', '1'),
(9, 'TIJ001', 'TIJERAS MCA. BARRILITO', '3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicamentos`
--

CREATE TABLE `medicamentos` (
  `folio` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `medicamento` varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  `p_unit` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `importe` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `medicamentos`
--

INSERT INTO `medicamentos` (`folio`, `cantidad`, `medicamento`, `p_unit`, `importe`) VALUES
('2', '1', 'caja de paracetamol 500 grs', '85', '85'),
('1', '2', 'cajas de iboprofeno', '88', '176'),
('1', '2', 'cajas paracetamol 500 grs', '56', '112'),
('1', '2', 'clorfenamina', '150', '300'),
('2', '2', 'clorfenamina', '45', '90');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden_medica`
--

CREATE TABLE `orden_medica` (
  `folio` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `ficha` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `solicita` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `categoria` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `contrato` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `personal` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `beneficiario` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `parentesco` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `departamento` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `documento` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `farmacia` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Tabla contenedora de órdenes médicas';

--
-- Volcado de datos para la tabla `orden_medica`
--

INSERT INTO `orden_medica` (`folio`, `fecha`, `ficha`, `solicita`, `categoria`, `contrato`, `personal`, `beneficiario`, `parentesco`, `departamento`, `documento`, `farmacia`) VALUES
(1, '2017-01-17', '99', 'Veronica Correa Miguel', 'Auxiliar', 'Planta', 'Sindicalizada', 'Ella misma', 'Ella misma', 'Proteccion Civil', '', ''),
(2, '2017-01-17', '191', 'Frank Reyes Martinez', 'Administrativo', 'Eventual', 'De confianza', 'Ingri Anais Silvestre de la Cruz', 'Conyugue', 'Tesoreria', '', ''),
(3, '2017-02-02', '199', 'Veronica Correa Miguel', 'Auxiliar', 'Eventual', 'De confianza', 'Ella misma', 'Ella misma', 'Proteccion Civil', '0150', 'union centro'),
(4, '2017-02-02', '199', 'Veronica Correa Miguel', 'Auxiliar', 'Eventual', 'De confianza', 'Ella misma', 'Ella misma', 'Proteccion Civil', '0150', 'union centro'),
(5, '2017-02-02', '99', 'Frank Reyes Martinez', 'Auxiliar', 'Planta', 'Sindicalizada', 'El mismo', 'El mismo', 'Presidencia', '0191', 'Union'),
(6, '2017-02-02', '99', 'Frank Reyes Martinez', 'Auxiliar', 'Planta', 'Sindicalizada', 'El mismo', 'El mismo', 'Presidencia', '0191', 'Union'),
(7, '2017-02-02', '191', 'Frank Reyes Martinez', 'Auxiliar', 'Planta', 'Sindicalizada', 'El mismo', 'El mismo', 'Presidencia', '0191', 'union'),
(8, '2017-02-02', '191', 'Frank Reyes Martinez', 'Auxiliar', 'Planta', 'Sindicalizada', 'El mismo', 'El mismo', 'Presidencia', '0191', 'union'),
(9, '2017-02-02', '99', 'Veronica Correa Miguel', 'Administrativo', 'Planta', 'Sindicalizada', 'Ella misma', 'Ella misma', 'Proteccion Civil', '0320', 'union'),
(10, '2017-02-02', '99', 'Veronica Correa Miguel', 'Auxiliar', 'Planta', 'Sindicalizada', 'Ella misma', 'Ella misma', 'Proteccion Civil', '0425', 'union'),
(11, '2017-02-02', '201', 'Ing. Salvador Bahena Viveros', 'Administrativo', 'Eventual', 'Evetual', 'El mismo', 'El mismo', 'DIF', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `id` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `user` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `modulo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `ver` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `agregar` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `editar` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `eliminar` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Tabla contenedora de los permisos de usuarios';

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`id`, `user`, `modulo`, `ver`, `agregar`, `editar`, `eliminar`) VALUES
('2', 'administrador', 'insumos', 'false', 'false', 'false', 'false'),
('2', 'administrador', 'inventario', 'true', 'false', 'false', 'false'),
('2', 'administrador', 'medicamentos', 'true', 'true', 'true', 'true'),
('2', 'administrador', 'usuarios', 'false', 'false', 'false', 'false'),
('2', 'administrador', 'vales', 'true', 'true', 'true', 'true'),
('3', 'auxiliar', 'insumos', 'false', 'false', 'false', 'false'),
('3', 'auxiliar', 'inventario', 'false', 'true', 'true', 'true'),
('3', 'auxiliar', 'medicamentos', 'true', 'true', 'false', 'false'),
('3', 'auxiliar', 'usuarios', 'false', 'false', 'false', 'false'),
('3', 'auxiliar', 'vales', 'true', 'true', 'true', 'false'),
('4', 'auxiliar2', 'insumos', 'true', 'true', 'true', 'false'),
('4', 'auxiliar2', 'inventario', 'true', 'false', 'false', 'false'),
('4', 'auxiliar2', 'medicamentos', 'true', 'true', 'false', 'false'),
('4', 'auxiliar2', 'usuarios', 'false', 'false', 'false', 'false'),
('4', 'auxiliar2', 'vales', 'true', 'false', 'false', 'true'),
('1', 'root', 'insumos', 'true', 'true', 'true', 'true'),
('1', 'root', 'inventario', 'true', 'true', 'true', 'true'),
('1', 'root', 'medicamentos', 'true', 'true', 'true', 'true'),
('1', 'root', 'usuarios', 'true', 'true', 'true', 'true'),
('1', 'root', 'vales', 'true', 'true', 'true', 'true');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recargas_saldo`
--

CREATE TABLE `recargas_saldo` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `saldo_anterior` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `recarga` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `saldo_actual` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `personal` varchar(70) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Tabla que contiene las recargas de saldo a las gasolineras';

--
-- Volcado de datos para la tabla `recargas_saldo`
--

INSERT INTO `recargas_saldo` (`id`, `fecha`, `saldo_anterior`, `recarga`, `saldo_actual`, `personal`) VALUES
(1, '2017-01-26', '', '500', '500', 'Frank Reyes'),
(2, '2017-01-26', '500', '1000', '1500', 'Frank Reyes'),
(3, '2017-01-26', '1500', '500', '2000', 'Frank Reyes'),
(4, '2017-01-26', '2000', '500', '2500', 'Frank Reyes'),
(5, '2017-01-26', '2500', '2000', '2652', 'Frank Reyes'),
(6, '2017-01-27', '2652', '1000', '3421', 'Salvador Bahena Viveros'),
(7, '2017-01-28', '3421', '20000', '15182', 'Frank Reyes'),
(8, '2017-02-17', '15182', '3000', '18028', 'Frank Reyes Martinez');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `refacciones`
--

CREATE TABLE `refacciones` (
  `folio` int(11) NOT NULL,
  `cantidad` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `concepto` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `p_unit` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `importe` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `refacciones`
--

INSERT INTO `refacciones` (`folio`, `cantidad`, `concepto`, `p_unit`, `importe`) VALUES
(5, '1', '', '88', '88'),
(6, '1', 'abc', '500', '500'),
(6, '2', 'def', '400', '800'),
(6, '3', 'ghi', '300', '900'),
(7, '2', 'Aceite Castrol', '120', '240'),
(7, '3', 'Filtro aceite', '180', '540'),
(7, '1', 'Filtro Gasolina', '500', '500'),
(7, '1', 'Llanta rin 16', '1800', '1800'),
(8, '2', 'Filtros para aceite', '250', '500'),
(8, '3', 'Rotulas', '300', '900'),
(9, '1', 'Lts Aceite Castrol', '120', '120'),
(10, '2', 'Filtros para aceite', '600', '1200'),
(11, '3', 'Filtros para aceite', '600', '1800');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salidas_computo`
--

CREATE TABLE `salidas_computo` (
  `folio` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `solicita` varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  `departamento` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `salidas_computo`
--

INSERT INTO `salidas_computo` (`folio`, `fecha`, `solicita`, `departamento`) VALUES
(1, '2017-02-16', 'Frank Reyes Martinez', 'Presidencia'),
(2, '2017-02-17', 'Frank Reyes Martinez', 'Presidencia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salidas_ornato`
--

CREATE TABLE `salidas_ornato` (
  `folio` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `solicita` varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  `departamento` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `salidas_ornato`
--

INSERT INTO `salidas_ornato` (`folio`, `fecha`, `solicita`, `departamento`) VALUES
(1, '2017-02-16', 'Frank Reyes Martinez', 'Presidencia'),
(2, '2017-02-17', 'Frank Reyes Martinez', 'Ornato');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salidas_papeleria`
--

CREATE TABLE `salidas_papeleria` (
  `folio` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `solicita` varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  `departamento` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `salidas_papeleria`
--

INSERT INTO `salidas_papeleria` (`folio`, `fecha`, `solicita`, `departamento`) VALUES
(1, '2017-02-16', 'Frank Reyes Martinez', 'Presidencia'),
(2, '2017-02-16', 'Frank Reyes Martinez', 'Presidencia'),
(3, '2017-02-16', ' Frank Reyes Martinez', 'Presidencia'),
(4, '2017-02-16', 'Frank Reyes Martinez', 'Presidencia'),
(5, '2017-02-16', 'Frank Reyes Martinez', 'Presidencia'),
(6, '2017-02-16', 'Frank Reyes Martinez', 'Presidencia'),
(7, '2017-02-16', 'Frank Reyes Martinez', 'Presidencia'),
(8, '2017-02-16', 'Frank Reyes Martinez', 'Presidencia'),
(9, '2017-02-17', 'Frank Reyes Martinez', 'Presidencia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud_medicamentos`
--

CREATE TABLE `solicitud_medicamentos` (
  `folio` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `solicita` varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  `ficha` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `documento` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `farmacia` varchar(70) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Alamacenamiento de solicitudes de medicamentos';

--
-- Volcado de datos para la tabla `solicitud_medicamentos`
--

INSERT INTO `solicitud_medicamentos` (`folio`, `fecha`, `solicita`, `ficha`, `documento`, `farmacia`) VALUES
(1, '2017-02-02', 'Veronica Correa Miguel', 'Protección Civil', '320', 'UNION'),
(2, '2017-02-16', 'Frank Reyes Martinez', 'Comunicación y Difusion', '589', 'SIMILARES');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud_refacciones`
--

CREATE TABLE `solicitud_refacciones` (
  `folio` int(11) NOT NULL,
  `solicita` varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  `chofer` varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `departamento` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vehiculo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `placas` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `econ` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `refaccionaria` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `estatus` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `solicitud_refacciones`
--

INSERT INTO `solicitud_refacciones` (`folio`, `solicita`, `chofer`, `fecha`, `departamento`, `vehiculo`, `placas`, `econ`, `refaccionaria`, `estatus`) VALUES
(6, 'Ing. Salvador Bahena Viveros', 'Sr. Tomas Gomez', '2017-01-22', 'DIF', 'Jeep Blanco', 'VZ-YX2-UJ1', 'N/A', 'Nipon', 'Pendiente'),
(7, 'Veronica Correa Miguel', 'Sr. Miguel Hernandez', '2017-01-22', 'Presidencia', 'Jetta Color Negro', 'XVZ-UK2-LM', 'N/A', '2000', 'Pendiente'),
(8, 'Ing. Salvador Bahena Viveros', 'Sr. Tomas Gomez', '2017-01-29', 'DIF', 'Jeep', 'N/A', 'N/A', 'Nipo', 'Entregado'),
(9, 'Ing. Salvador Bahena Viveros', 'Sr. Miguel Martinez', '2017-01-30', 'DIF', 'Jeep Blanco', 'XVZ-YV-2M', 'N/A', '2000', 'Pendiente'),
(10, 'Dr. Miguel Angel Bahena Viveros', 'Sr. Miguel Martinez', '2017-01-30', 'Presidencia', 'Jeep Blanco', 'XVZ-YV-2M', 'N/A', 'Nipon', 'Pendiente'),
(11, 'Ing. Salvador Bahena Viveros', 'Sr. Miguel Martinez', '2017-01-30', 'DIF', 'Jeep Blanco', 'XVZ-YV-2M', 'N/A', 'Nipon', 'Pendiente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stock_computo`
--

CREATE TABLE `stock_computo` (
  `id` int(20) NOT NULL,
  `codigo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  `unidad` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `departamento` varchar(70) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `stock_computo`
--

INSERT INTO `stock_computo` (`id`, `codigo`, `descripcion`, `unidad`, `cantidad`, `departamento`) VALUES
(1, 'IM0001', 'IMPRESORAS XEROX MOD. 458C', 'pieza', '4', 'Computo'),
(2, 'MAU001', 'MAUSE OPTICO MCA. ACTECK', 'pieza', '7', 'Computo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stock_ornato`
--

CREATE TABLE `stock_ornato` (
  `id` int(20) NOT NULL,
  `codigo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  `unidad` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `departamento` varchar(70) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `stock_ornato`
--

INSERT INTO `stock_ornato` (`id`, `codigo`, `descripcion`, `unidad`, `cantidad`, `departamento`) VALUES
(1, 'BO0001', 'BOLSAS NEGRAS PARA BASURA', 'pieza', '11', 'Limpieza'),
(2, 'MA0001', 'MACHETES', 'pieza', '9', 'Ornato');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stock_papeleria`
--

CREATE TABLE `stock_papeleria` (
  `id` int(20) NOT NULL,
  `codigo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  `unidad` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `departamento` varchar(70) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `stock_papeleria`
--

INSERT INTO `stock_papeleria` (`id`, `codigo`, `descripcion`, `unidad`, `cantidad`, `departamento`) VALUES
(1, 'HO0001', 'PAQUETES 100 HOJAS BLANCAS T/CARTA', 'pieza', '1', 'Papeleria'),
(2, 'TIJ001', 'TIJERAS MCA. BARRILITO', 'pieza', '2', 'Oficina');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(20) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `user` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vales` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `medicamentos` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `insumos` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `inventario` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `usuarios` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Tabla contenedora de los usuarios y permisos';

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `user`, `password`, `vales`, `medicamentos`, `insumos`, `inventario`, `usuarios`) VALUES
(1, 'Administrador', 'root', 'root', 'true', 'true', 'true', 'true', 'true'),
(2, 'Frank Reyes ', 'administrador', 'admin-123', 'true', 'true', 'false', 'true', 'false'),
(3, 'karen Correa', 'auxiliar', 'aux-321', 'true', 'true', 'false', 'false', 'false'),
(4, 'Veronica Lugo', 'auxiliar2', 'aux-123', 'true', 'true', 'true', 'false', 'false');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vales_gasolina`
--

CREATE TABLE `vales_gasolina` (
  `folio` int(20) NOT NULL,
  `folio_asoc` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `solicita` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `chofer` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `unidad` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `no_econ` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `placas` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `litros` int(50) NOT NULL,
  `departamento` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `km` int(50) NOT NULL,
  `gasolinera` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(70) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Tabla que contiene los datos de los vales de gasolina';

--
-- Volcado de datos para la tabla `vales_gasolina`
--

INSERT INTO `vales_gasolina` (`folio`, `folio_asoc`, `fecha`, `solicita`, `chofer`, `unidad`, `no_econ`, `placas`, `litros`, `departamento`, `km`, `gasolinera`, `descripcion`) VALUES
(1, '298', '2017-01-13', 'Dr. Miguel Angel Bahena Viveros', 'Sr. Diego Martínez', 'Jeep Color Negro', 'N/A', 'VZ-X9Y-X89', 60, 'Presidencia', 100, 'Qualli', 'Gasolina Magna'),
(2, '500', '2017-01-13', 'Ing. Salvador Bahena Viveros', 'Sr. Tomas Gomez', 'Volksvage color blanco', 'N/A', 'VZ-X1Y-X56', 20, 'DIF', 60, 'Del Golfo', 'Diesel'),
(3, '', '2017-01-13', 'Ing. Salvador Bahena Viveros', 'Sr. Tomas Gomez', 'Chevrolet color rojo', 'N/A', 'VZ-X1Y-X56', 50, 'DIF', 80, 'Del Golfo', 'Gasolina Magna'),
(4, '', '2017-01-26', 'Ing. Salvador Bahena Viveros', 'Sr. Tomas Gomez', 'Volksvage color blanco', 'N/A', 'VZ-X1Y-X56', 50, 'DIF', 90, 'Del Golfo', 'Gasolina Magna'),
(5, '', '2017-01-27', 'Veronica Correa Miguel', 'Sr. Tomas Gomez', 'Chevrolet color rojo', 'N/A', 'VZ-X1Y-X56', 20, 'Presidencia', 60, 'Del Golfo', 'Gasolina Magna'),
(6, '', '2017-01-27', 'Dr. Miguel Angel Bahena Viveros', 'Sr. Tomas Gomez', 'Jeep Color Blanco', 'N/A', 'VZ-X1Y-X56', 50, 'Presidencia', 90, 'Qualli', 'Gasolina Magna'),
(7, '', '2017-01-29', 'Veronica Correa Miguel', 'Sr. Tomas Gomez', 'Volksvage color blanco', 'N/A', 'VZ-X1Y-X56', 15, 'Presidencia', 90, 'Del Golfo', 'Gasolina Magna'),
(8, '', '2017-01-30', 'Dr. Miguel Angel Bahena Viveros', 'Sr. Tomas Gomez', 'Jeep Color Blanco', 'N/A', 'VZ-X1Y-X56', 50, 'Presidencia', 90, 'Del Golfo', 'Gasolina Magna'),
(9, '', '2017-01-30', 'Ing. Salvador Bahena Viveros', 'Sr. Tomas Gomez', 'Chevrolet color rojo', 'N/A', 'VZ-X1Y-X56', 50, 'DIF', 60, 'Qualli', 'Gasolina Magna'),
(10, '', '2017-01-30', 'Veronica Correa Miguel', 'Sr. Tomas Gomez', 'Volksvage color blanco', 'N/A', 'VZ-X1Y-X56', 10, 'Tesoreria', 60, 'Del Golfo', 'Gasolina Magna'),
(11, '', '2017-01-30', 'Ing. Salvador Bahena Viveros', 'Sr. Tomas Gomez', 'Volksvage color blanco', 'N/A', 'VZ-X1Y-X56', 15, 'DIF', 60, 'Del Golfo', 'Gasolina Magna'),
(12, '', '2017-01-30', 'Dr. Miguel Angel Bahena Viveros', 'Sr. Tomas Gomez', 'Jeep Color Blanco', 'N/A', 'VZ-X1Y-X56', 10, 'Presidencia', 80, 'Qualli', 'Gasolina Magna'),
(13, '', '2017-01-30', 'Ing. Salvador Bahena Viveros', 'Sr. Tomas Gomez', 'Volksvage color blanco', 'N/A', 'VZ-X1Y-X56', 10, 'DIF', 90, 'Del Golfo', 'Gasolina Magna'),
(14, '', '2017-01-30', 'Veronica Correa Miguel', 'Sr. Tomas Gomez', 'Chevrolet color rojo', 'N/A', 'VZ-X1Y-X56', 10, 'Proteccion Civil', 60, 'Del Golfo', 'Gasolina Magna'),
(15, '', '2017-01-30', 'Veronica Correa Miguel', 'Sr. Tomas Gomez', 'Chevrolet color rojo', 'N/A', 'VZ-X1Y-X56', 10, 'Proteccion Civil', 60, 'Del Golfo', 'Gasolina Magna'),
(16, '', '2017-01-30', 'Ing. Salvador Bahena Viveros', 'Sr. Tomas Gomez', 'Jeep Color Blanco', 'N/A', 'VZ-X1Y-X56', 10, 'DIF', 90, 'Del Golfo', 'Gasolina Magna'),
(17, '', '2017-01-30', 'Dr. Miguel Angel Bahena Viveros', 'Sr. Tomas Gomez', 'Volksvage color blanco', 'N/A', 'VZ-X1Y-X56', 30, 'Presidencia', 90, 'Qualli', 'Gasolina Magna'),
(18, '', '2017-01-30', 'Veronica Correa Miguel', 'Sr. Tomas Gomez', 'Chevrolet color rojo', 'N/A', 'VZ-X1Y-X56', 30, 'Proteccion Civil', 80, 'Qualli', 'Gasolina Magna'),
(19, '', '2017-02-10', 'Dr. Miguel Angel Bahena Viveros', 'Sr.', 'Jeep Color Blanco', 'N/A', 'N/A', 20, 'Presidencia', 0, 'Qualli', 'Gasolina Magna'),
(20, '790', '2017-02-10', 'Veronica Correa Miguel', 'Ella misma', 'Volksvage color rojo', 'N/A', 'VZ-X1Y-X56', 50, 'Proteccion Civil', 8000, 'Del Golfo', 'Gasolina Magna'),
(21, '478', '2017-02-17', 'Dr. Miguel Angel Bahena Viveros', 'El mismo', 'Jeep Color Blanco', 'N/A', 'N/A', 10, 'Presidencia', 0, 'Qualli', 'Gasolina Magna');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vales_lubricante`
--

CREATE TABLE `vales_lubricante` (
  `folio` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `solicita` varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  `chofer` varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  `vehiculo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `departamento` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `placas` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `econ` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `refaccionaria` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `vales_lubricante`
--

INSERT INTO `vales_lubricante` (`folio`, `fecha`, `solicita`, `chofer`, `vehiculo`, `departamento`, `placas`, `econ`, `refaccionaria`) VALUES
(1, '2017-01-23', 'Ing. Salvador Bahena Viveros', 'Sr. Tomas Gomez', 'Jetta Color Negro', 'DIF', 'XVZ-YJ2-UV', 'N/A', 'Liliana'),
(2, '2017-01-23', 'Dr. Miguel Angel Bahena Viveros', 'Sr. Miguel Martinez', 'Volksvage Banco', 'Presidencia', 'VZX-U2J-W3', 'N/A', 'Liliana'),
(3, '2017-01-23', 'Veronica Correa Miguel', 'Ella misma', 'Jetta Negro', 'Presidencia', 'VZX-UJ4-MN', 'N/A', 'Liliana'),
(4, '2017-01-23', 'Ing. Salvador Bahena Viveros', 'Sr. Miguel Torres', 'Jeep Blanco', 'DIF', 'XVZ-J2U-MN', 'N/A', 'Liliana'),
(5, '2017-01-30', 'Dr. Miguel Angel Bahena Viveros', 'Sr. Miguel Gomez', 'N/A', 'Presidencia', 'N/A', 'N/A', 'Liliana');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `documentos_vales_gasolina`
--
ALTER TABLE `documentos_vales_gasolina`
  ADD PRIMARY KEY (`folio_vale`);

--
-- Indices de la tabla `entradas_computo`
--
ALTER TABLE `entradas_computo`
  ADD PRIMARY KEY (`folio`,`codigo`,`descripcion`),
  ADD UNIQUE KEY `folio` (`folio`);

--
-- Indices de la tabla `entradas_ornato`
--
ALTER TABLE `entradas_ornato`
  ADD PRIMARY KEY (`folio`,`codigo`,`descripcion`),
  ADD UNIQUE KEY `folio` (`folio`);

--
-- Indices de la tabla `entradas_papeleria`
--
ALTER TABLE `entradas_papeleria`
  ADD PRIMARY KEY (`folio`,`codigo`,`descripcion`),
  ADD UNIQUE KEY `folio` (`folio`);

--
-- Indices de la tabla `lubricantes`
--
ALTER TABLE `lubricantes`
  ADD PRIMARY KEY (`folio`,`concepto`);

--
-- Indices de la tabla `material_salida_computo`
--
ALTER TABLE `material_salida_computo`
  ADD PRIMARY KEY (`id`,`codigo`);

--
-- Indices de la tabla `material_salida_ornato`
--
ALTER TABLE `material_salida_ornato`
  ADD PRIMARY KEY (`id`,`codigo`);

--
-- Indices de la tabla `material_salida_papeleria`
--
ALTER TABLE `material_salida_papeleria`
  ADD PRIMARY KEY (`id`,`codigo`);

--
-- Indices de la tabla `medicamentos`
--
ALTER TABLE `medicamentos`
  ADD PRIMARY KEY (`medicamento`,`folio`);

--
-- Indices de la tabla `orden_medica`
--
ALTER TABLE `orden_medica`
  ADD PRIMARY KEY (`folio`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`user`,`modulo`);

--
-- Indices de la tabla `recargas_saldo`
--
ALTER TABLE `recargas_saldo`
  ADD PRIMARY KEY (`id`,`fecha`);

--
-- Indices de la tabla `refacciones`
--
ALTER TABLE `refacciones`
  ADD PRIMARY KEY (`folio`,`concepto`);

--
-- Indices de la tabla `salidas_computo`
--
ALTER TABLE `salidas_computo`
  ADD PRIMARY KEY (`folio`);

--
-- Indices de la tabla `salidas_ornato`
--
ALTER TABLE `salidas_ornato`
  ADD PRIMARY KEY (`folio`);

--
-- Indices de la tabla `salidas_papeleria`
--
ALTER TABLE `salidas_papeleria`
  ADD PRIMARY KEY (`folio`);

--
-- Indices de la tabla `solicitud_medicamentos`
--
ALTER TABLE `solicitud_medicamentos`
  ADD PRIMARY KEY (`folio`);

--
-- Indices de la tabla `solicitud_refacciones`
--
ALTER TABLE `solicitud_refacciones`
  ADD PRIMARY KEY (`folio`);

--
-- Indices de la tabla `stock_computo`
--
ALTER TABLE `stock_computo`
  ADD PRIMARY KEY (`codigo`,`descripcion`);

--
-- Indices de la tabla `stock_ornato`
--
ALTER TABLE `stock_ornato`
  ADD PRIMARY KEY (`codigo`,`descripcion`);

--
-- Indices de la tabla `stock_papeleria`
--
ALTER TABLE `stock_papeleria`
  ADD PRIMARY KEY (`codigo`,`descripcion`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `vales_gasolina`
--
ALTER TABLE `vales_gasolina`
  ADD PRIMARY KEY (`folio`);

--
-- Indices de la tabla `vales_lubricante`
--
ALTER TABLE `vales_lubricante`
  ADD PRIMARY KEY (`folio`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `entradas_computo`
--
ALTER TABLE `entradas_computo`
  MODIFY `folio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `entradas_ornato`
--
ALTER TABLE `entradas_ornato`
  MODIFY `folio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `entradas_papeleria`
--
ALTER TABLE `entradas_papeleria`
  MODIFY `folio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `orden_medica`
--
ALTER TABLE `orden_medica`
  MODIFY `folio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `recargas_saldo`
--
ALTER TABLE `recargas_saldo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `salidas_computo`
--
ALTER TABLE `salidas_computo`
  MODIFY `folio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `salidas_ornato`
--
ALTER TABLE `salidas_ornato`
  MODIFY `folio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `salidas_papeleria`
--
ALTER TABLE `salidas_papeleria`
  MODIFY `folio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `solicitud_medicamentos`
--
ALTER TABLE `solicitud_medicamentos`
  MODIFY `folio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `solicitud_refacciones`
--
ALTER TABLE `solicitud_refacciones`
  MODIFY `folio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `vales_gasolina`
--
ALTER TABLE `vales_gasolina`
  MODIFY `folio` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT de la tabla `vales_lubricante`
--
ALTER TABLE `vales_lubricante`
  MODIFY `folio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
