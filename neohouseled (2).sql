-- phpMyAdmin SQL Dump
-- version 5.2.0-rc1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 23-01-2022 a las 04:10:31
-- Versión del servidor: 8.0.28
-- Versión de PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `neohouseled`
--
CREATE DATABASE IF NOT EXISTS `neohouseled` DEFAULT CHARACTER SET utf8mb4;
USE `neohouseled`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Admin`
--

CREATE TABLE `tab_admin` (
  `admin_id` int NOT NULL,
  `admin_email` varchar(120) NOT NULL,
  `admin_clave` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Categoría`
--

CREATE TABLE `tab_categoría` (
  `cat_id` tinyint NOT NULL,
  `cat_nombre` varchar(40) NOT NULL,
  `cat_activo` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `Categoría`
--

INSERT INTO `tab_categoría` (`cat_id`, `cat_nombre`, `cat_activo`) VALUES
(1, 'Personajes', '1'),
(2, 'Texto', '1'),
(3, 'Objetos', '1'),
(4, 'Otros', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tab_clientes`
--

CREATE TABLE `tab_clientes` (
  `cli_id` int NOT NULL,
  `cli_nombre` varchar(120) NOT NULL,
  `cli_apellidos` varchar(120) NOT NULL,
  `cli_email` varchar(120) NOT NULL,
  `cli_clave` varchar(120) NOT NULL,
  `cli_estado` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Compra`
--

CREATE TABLE `tab_compra` (
  `cod_com` int NOT NULL,
  `comp_fecha` datetime NOT NULL,
  `precio_total` float NOT NULL,
  `cli_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tab_compra_detalle`
--

CREATE TABLE `tab_compra_detalle` (
  `cod_det` int NOT NULL,
    `cod_com` int NOT NULL,
  `prod_id` int NOT NULL,
  `det_cantidad` int NOT NULL,
  `det_color` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Productos`
--

CREATE TABLE `tab_producto` (
  `prod_id` int NOT NULL,
  `cat_id` tinyint NOT NULL,
  `pro_nombre` varchar(100) NOT NULL,
  `pro_descrpcion` varchar(255) NOT NULL,
  `pro_precio` float NOT NULL,
  `pro_tamaño` varchar(20) NOT NULL,
  `pro_activo` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Admin`
--
ALTER TABLE `tab_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indices de la tabla `tab_categoria`
--
ALTER TABLE `tab_categoría`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indices de la tabla `tab_cliente`
--
ALTER TABLE `tab_cliente`
  ADD PRIMARY KEY (`cli_id`);

--
-- Indices de la tabla `Compra`
--
ALTER TABLE `tab_compra`
  ADD PRIMARY KEY (`cod_comp`);

--
-- Indices de la tabla `Productos`
--
ALTER TABLE `tab_producto`
  ADD PRIMARY KEY (`pro_id`);
  
  ALTER TABLE `tab_compra` ADD CONSTRAINT `tab_compra`_`cli_id`_`tab_clientes`_`cli_id` FOREIGN KEY (`cli_id`) REFERENCES `tab_clientes`(`cli_id`);

ALTER TABLE `tab_compra_detalle` ADD CONSTRAINT `tab_compra_detalle`_`cod_com`_`tab_compra`_`cod_com` FOREIGN KEY (`cod_com`) REFERENCES `tab_compra`(`cod_com`);

ALTER TABLE `tab_compra_detalle` ADD CONSTRAINT `tab_compra_detalle`_`prod_id`_`tab_producto`_`prod_id` FOREIGN KEY (`prod_id`) REFERENCES `tab_producto`(`prod_id`);

ALTER TABLE `tab_producto` ADD CONSTRAINT `tab_producto`_`cat_id`_tab_categoría_`cat_id` FOREIGN KEY (`cat_id`) REFERENCES tab_categoría(`cat_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
