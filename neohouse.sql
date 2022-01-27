-- phpMyAdmin SQL Dump
-- version 5.2.0-rc1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 26-01-2022 a las 17:08:57
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
-- Base de datos: `neohouse`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tab_categoria`
--

CREATE TABLE `tab_categoria` (
  `id` tinyint NOT NULL,
  `cat_nombre` varchar(40) NOT NULL,
  `cat_activo` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `tab_categoria`
--

INSERT INTO `tab_categoria` (`id`, `cat_nombre`, `cat_activo`) VALUES
(1, 'Personajes', '1'),
(2, 'Texto', '1'),
(3, 'Objetos', '1'),
(4, 'Otros', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tab_cliente`
--

CREATE TABLE `tab_cliente` (
  `id` int NOT NULL,
  `cli_nombre` varchar(120) DEFAULT NULL,
  `cli_apellidos` varchar(120) DEFAULT NULL,
  `cli_email` varchar(120) DEFAULT NULL,
  `cli_clave` varchar(255) DEFAULT NULL,
  `cli_estado` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `tab_cliente`
--

INSERT INTO `tab_cliente` (`id`, `cli_nombre`, `cli_apellidos`, `cli_email`, `cli_clave`, `cli_estado`) VALUES
(1, 'Edgar', 'Poma', 'lenonpoma@gmail.com', '12345', '1'),
(2, 'Isabella ', 'Montoya ', 'isabellam.montoya.im@gmail.com ', '4678', '1'),
(3, 'Melissa', 'Dumas', 'mdumas@gmail.com', '04367', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tab_compra`
--

CREATE TABLE `tab_compra` (
  `id` int NOT NULL,
  `com_fecha` datetime DEFAULT NULL,
  `precio_total` float DEFAULT NULL,
  `cli_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tab_compra_detalle`
--

CREATE TABLE `tab_compra_detalle` (
  `id` int NOT NULL,
  `cod_id` int DEFAULT NULL,
  `pro_id` int DEFAULT NULL,
  `det_cantidad` int DEFAULT NULL,
  `det_color` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tab_producto`
--

CREATE TABLE `tab_producto` (
  `id` int NOT NULL,
  `cat_id` tinyint DEFAULT NULL,
  `pro_nombre` varchar(100) DEFAULT NULL,
  `pro_descripcion` varchar(255) DEFAULT NULL,
  `pro_precio` float DEFAULT NULL,
  `pro_tamaño` varchar(20) DEFAULT NULL,
  `pro_activo` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tab_user`
--

CREATE TABLE `tab_user` (
  `id` int NOT NULL,
  `user` varchar(125) NOT NULL,
  `pass` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `tab_user`
--

INSERT INTO `tab_user` (`id`, `user`, `pass`) VALUES
(1, 'adminNLS', '659454c72935a37772189b6f4a25d72b'),
(2, 'isabellam.montoya.im@gmail.com', 'd84cb4c8d90f9f7429db81ef5ae58a7c'),
(3, '18100102@ue.edu.pe', 'c71fc34d162fe4d62d8d4e86ecf132b3');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tab_categoria`
--
ALTER TABLE `tab_categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tab_cliente`
--
ALTER TABLE `tab_cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tab_compra`
--
ALTER TABLE `tab_compra`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_cliente` (`cli_id`);

--
-- Indices de la tabla `tab_compra_detalle`
--
ALTER TABLE `tab_compra_detalle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cod_com` (`cod_id`),
  ADD KEY `pro_id` (`pro_id`);

--
-- Indices de la tabla `tab_producto`
--
ALTER TABLE `tab_producto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indices de la tabla `tab_user`
--
ALTER TABLE `tab_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tab_categoria`
--
ALTER TABLE `tab_categoria`
  MODIFY `id` tinyint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tab_cliente`
--
ALTER TABLE `tab_cliente`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tab_compra`
--
ALTER TABLE `tab_compra`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tab_compra_detalle`
--
ALTER TABLE `tab_compra_detalle`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tab_producto`
--
ALTER TABLE `tab_producto`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tab_user`
--
ALTER TABLE `tab_user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tab_compra`
--
ALTER TABLE `tab_compra`
  ADD CONSTRAINT `fk_cli_id` FOREIGN KEY (`cli_id`) REFERENCES `tab_cliente` (`id`);

--
-- Filtros para la tabla `tab_compra_detalle`
--
ALTER TABLE `tab_compra_detalle`
  ADD CONSTRAINT `fk_cod_id` FOREIGN KEY (`cod_id`) REFERENCES `tab_compra` (`id`),
  ADD CONSTRAINT `fk_pro_id` FOREIGN KEY (`pro_id`) REFERENCES `tab_producto` (`id`);

--
-- Filtros para la tabla `tab_producto`
--
ALTER TABLE `tab_producto`
  ADD CONSTRAINT `fk_cat_id` FOREIGN KEY (`cat_id`) REFERENCES `tab_categoria` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
