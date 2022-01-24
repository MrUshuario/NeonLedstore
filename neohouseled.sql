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

CREATE TABLE `Admin` (
  `Admin_id` int NOT NULL,
  `Admin_email` varchar(120) NOT NULL,
  `Admin_clave` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Categoría`
--

CREATE TABLE `Categoría` (
  `Cat_id` tinyint NOT NULL,
  `Cat_nombre` varchar(40) NOT NULL,
  `Cat_activo` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `Categoría`
--

INSERT INTO `Categoría` (`Cat_id`, `Cat_nombre`, `Cat_activo`) VALUES
(1, 'Personajes', '1'),
(2, 'Texto', '1'),
(3, 'Objetos', '1'),
(4, 'Otros', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Cliente`
--

CREATE TABLE `Cliente` (
  `Cli_id` int NOT NULL,
  `Cli_nombre` varchar(120) NOT NULL,
  `Cli_apellidos` varchar(120) NOT NULL,
  `Cli_email` varchar(120) NOT NULL,
  `Cli_clave` varchar(120) NOT NULL,
  `Cli_estado` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Compra`
--

CREATE TABLE `Compra` (
  `Cod_compra` int NOT NULL,
  `Compra_fecha` datetime NOT NULL,
  `Precio_total` float NOT NULL,
  `Cli_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Compra_detalle`
--

CREATE TABLE `Compra_detalle` (
  `Cod_compra` int NOT NULL,
  `Prod_id` int NOT NULL,
  `Det_cantidad` int NOT NULL,
  `Det_color` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Productos`
--

CREATE TABLE `Productos` (
  `Prod_id` int NOT NULL,
  `Cat_id` tinyint NOT NULL,
  `Prod_nombre` varchar(100) NOT NULL,
  `Prod_descrpcion` varchar(255) NOT NULL,
  `Prod_precio` float NOT NULL,
  `Prod_tamaño` varchar(20) NOT NULL,
  `Prod_activo` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Admin`
--
ALTER TABLE `Admin`
  ADD PRIMARY KEY (`Admin_id`);

--
-- Indices de la tabla `Categoría`
--
ALTER TABLE `Categoría`
  ADD PRIMARY KEY (`Cat_id`);

--
-- Indices de la tabla `Cliente`
--
ALTER TABLE `Cliente`
  ADD PRIMARY KEY (`Cli_id`);

--
-- Indices de la tabla `Compra`
--
ALTER TABLE `Compra`
  ADD PRIMARY KEY (`Cod_compra`);

--
-- Indices de la tabla `Productos`
--
ALTER TABLE `Productos`
  ADD PRIMARY KEY (`Prod_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
