-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-01-2022 a las 15:09:56
-- Versión del servidor: 10.1.32-MariaDB
-- Versión de PHP: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ghxumdmy_neonledstore`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tab_categorias`
--

CREATE TABLE `tab_categorias` (
  `id` int(11) NOT NULL,
  `cat_nombre` varchar(255) NOT NULL,
  `cat_imagen` varchar(255) NOT NULL,
  `cat_link` varchar(255) NOT NULL,
  `cat_estado` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `tab_categorias`
--

INSERT INTO `tab_categorias` (`id`, `cat_nombre`, `cat_imagen`, `cat_link`, `cat_estado`) VALUES
(1, 'Careros3', 'abc.jpg', 'abc.com', 'ACTIVO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tab_clientes`
--

CREATE TABLE `tab_clientes` (
  `id` int(11) NOT NULL,
  `cli_nombre` varchar(150) NOT NULL,
  `cli_apellidos` varchar(255) NOT NULL,
  `cli_email` varchar(255) NOT NULL,
  `cli_clave` varchar(255) NOT NULL,
  `token` varchar(100) NOT NULL,
  `cli_estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `tab_clientes`
--

INSERT INTO `tab_clientes` (`id`, `cli_nombre`, `cli_apellidos`, `cli_email`, `cli_clave`, `token`, `cli_estado`) VALUES
(43, '222224', 'HOLA', '2222', '2222', '', 0),
(46, 'cliente', 'cliente2', 'cleinte@gmail', '123', '', 1),
(47, 'abcd', 'NO LISTADO', '123', '123', '', 0),
(48, 'ESTADO3', '2333', '333', '333', '', 1),
(49, 'aaaaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaa', '111111', '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tab_color`
--

CREATE TABLE `tab_color` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) COLLATE utf32_spanish_ci NOT NULL,
  `rgb` varchar(100) COLLATE utf32_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

--
-- Volcado de datos para la tabla `tab_color`
--

INSERT INTO `tab_color` (`id`, `nombre`, `rgb`) VALUES
(7, 'rojo', '#ff0000'),
(8, 'negro24', '#000000'),
(12, 'Verde', '#00f510');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tab_listacompra`
--

CREATE TABLE `tab_listacompra` (
  `id` int(11) NOT NULL,
  `com_cliente` int(11) NOT NULL,
  `com_producto` int(11) NOT NULL,
  `com_precio` decimal(6,2) NOT NULL,
  `com_cantidad` int(11) NOT NULL,
  `com_total` decimal(10,2) NOT NULL,
  `com_imagen` varchar(255) NOT NULL,
  `com_tamano` varchar(100) NOT NULL,
  `com_estado` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tab_producto`
--

CREATE TABLE `tab_producto` (
  `id` int(11) NOT NULL,
  `pro_categoria` int(11) NOT NULL,
  `pro_nombre` varchar(100) CHARACTER SET ujis NOT NULL,
  `pro_descripcion` varchar(255) NOT NULL,
  `pro_precio` decimal(6,2) NOT NULL,
  `pro_imagen` varchar(200) NOT NULL,
  `pro_tamano` varchar(255) DEFAULT NULL,
  `pro_estado` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `tab_producto`
--

INSERT INTO `tab_producto` (`id`, `pro_categoria`, `pro_nombre`, `pro_descripcion`, `pro_precio`, `pro_imagen`, `pro_tamano`, `pro_estado`) VALUES
(1, 1, 'amogus3', 'un led de un meme ahora en vr', '100.00', 'aa.jpg', 'x', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tab_productoxcolor`
--

CREATE TABLE `tab_productoxcolor` (
  `id` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_color` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

--
-- Volcado de datos para la tabla `tab_productoxcolor`
--

INSERT INTO `tab_productoxcolor` (`id`, `id_producto`, `id_color`) VALUES
(7, 1, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tab_user`
--

CREATE TABLE `tab_user` (
  `id` int(11) NOT NULL,
  `user` varchar(125) NOT NULL,
  `pass` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tab_user`
--

INSERT INTO `tab_user` (`id`, `user`, `pass`) VALUES
(1, 'adminNLS', '$2y$10$LgeWXAVuGEPOgd5LCSg.A.YF/PoSVhPBpTX4P9MApwRR6axty84dK');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tab_categorias`
--
ALTER TABLE `tab_categorias`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indices de la tabla `tab_clientes`
--
ALTER TABLE `tab_clientes`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indices de la tabla `tab_color`
--
ALTER TABLE `tab_color`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tab_listacompra`
--
ALTER TABLE `tab_listacompra`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `com_cliente` (`com_cliente`) USING BTREE,
  ADD KEY `com_producto` (`com_producto`) USING BTREE;

--
-- Indices de la tabla `tab_producto`
--
ALTER TABLE `tab_producto`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `pro_categoria` (`pro_categoria`) USING BTREE;

--
-- Indices de la tabla `tab_productoxcolor`
--
ALTER TABLE `tab_productoxcolor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_color` (`id_color`),
  ADD KEY `fk_id_producto` (`id_producto`);

--
-- Indices de la tabla `tab_user`
--
ALTER TABLE `tab_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tab_categorias`
--
ALTER TABLE `tab_categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tab_clientes`
--
ALTER TABLE `tab_clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de la tabla `tab_color`
--
ALTER TABLE `tab_color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `tab_listacompra`
--
ALTER TABLE `tab_listacompra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tab_producto`
--
ALTER TABLE `tab_producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tab_productoxcolor`
--
ALTER TABLE `tab_productoxcolor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tab_user`
--
ALTER TABLE `tab_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tab_listacompra`
--
ALTER TABLE `tab_listacompra`
  ADD CONSTRAINT `tab_listacompra_ibfk_1` FOREIGN KEY (`com_cliente`) REFERENCES `tab_clientes` (`id`),
  ADD CONSTRAINT `tab_listacompra_ibfk_2` FOREIGN KEY (`com_producto`) REFERENCES `tab_producto` (`id`);

--
-- Filtros para la tabla `tab_producto`
--
ALTER TABLE `tab_producto`
  ADD CONSTRAINT `tab_producto_ibfk_1` FOREIGN KEY (`pro_categoria`) REFERENCES `tab_categorias` (`id`);

--
-- Filtros para la tabla `tab_productoxcolor`
--
ALTER TABLE `tab_productoxcolor`
  ADD CONSTRAINT `fk_id_color` FOREIGN KEY (`id_color`) REFERENCES `tab_color` (`id`),
  ADD CONSTRAINT `fk_id_producto` FOREIGN KEY (`id_producto`) REFERENCES `tab_producto` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
