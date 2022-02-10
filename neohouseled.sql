-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-02-2022 a las 16:20:31
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
-- Base de datos: `neohouseled`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tab_categoria`
--

CREATE TABLE `tab_categoria` (
  `id` tinyint(4) NOT NULL,
  `cat_nombre` varchar(40) NOT NULL,
  `cat_activo` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tab_categoria`
--

INSERT INTO `tab_categoria` (`id`, `cat_nombre`, `cat_activo`) VALUES
(1, 'Personajes', '1'),
(2, 'Texto', '1'),
(4, 'Otros', '1'),
(5, 'Objetos', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tab_cliente`
--

CREATE TABLE `tab_cliente` (
  `id` int(11) NOT NULL,
  `cli_nombre` varchar(120) DEFAULT NULL,
  `cli_apellidos` varchar(120) DEFAULT NULL,
  `cli_email` varchar(120) DEFAULT NULL,
  `cli_clave` varchar(255) DEFAULT NULL,
  `cli_estado` char(1) DEFAULT NULL,
  `cli_telefono` varchar(10) NOT NULL,
  `cli_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tab_cliente`
--

INSERT INTO `tab_cliente` (`id`, `cli_nombre`, `cli_apellidos`, `cli_email`, `cli_clave`, `cli_estado`, `cli_telefono`, `cli_rol`) VALUES
(1, 'Edgaredit', 'Poma', 'lenonpoma@gmail.com', '12345', '0', '14156', 1),
(2, 'Isabella ', 'Montoya ', 'isabellam.montoya.im@gmail.com ', '4678', '1', '14523', 2),
(3, 'Melissaedit', 'Dumas', 'mdumas@gmail.com', '04367', '0', '1545', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tab_compra`
--

CREATE TABLE `tab_compra` (
  `id` int(11) NOT NULL,
  `com_fecha` datetime DEFAULT NULL,
  `precio_total` float DEFAULT NULL,
  `cli_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tab_compra`
--

INSERT INTO `tab_compra` (`id`, `com_fecha`, `precio_total`, `cli_id`) VALUES
(1, '2022-02-01 00:00:00', 5000, 2),
(2, '2022-02-01 00:00:00', 2000, 3),
(5, '2022-02-11 00:00:00', 2000, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tab_compra_detalle`
--

CREATE TABLE `tab_compra_detalle` (
  `id` int(11) NOT NULL,
  `cod_id` int(11) DEFAULT NULL,
  `pro_id` int(11) DEFAULT NULL,
  `det_cantidad` int(11) DEFAULT NULL,
  `det_color` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tab_compra_detalle`
--

INSERT INTO `tab_compra_detalle` (`id`, `cod_id`, `pro_id`, `det_cantidad`, `det_color`) VALUES
(1, 1, 12, 2, 'verde'),
(2, 1, 10, 3, 'rojo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tab_producto`
--

CREATE TABLE `tab_producto` (
  `id` int(11) NOT NULL,
  `cat_id` tinyint(4) DEFAULT NULL,
  `pro_nombre` varchar(100) DEFAULT NULL,
  `pro_descripcion` varchar(255) DEFAULT NULL,
  `pro_precio` float DEFAULT NULL,
  `pro_tamano` varchar(20) DEFAULT NULL,
  `pro_activo` char(1) DEFAULT NULL,
  `pro_imagen` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tab_producto`
--

INSERT INTO `tab_producto` (`id`, `cat_id`, `pro_nombre`, `pro_descripcion`, `pro_precio`, `pro_tamano`, `pro_activo`, `pro_imagen`) VALUES
(1, 4, 'Corazones de angel y diablo', 'Corazones de angel y diablo de neón', 349, '30cmX40cm', '', 0),
(2, 4, 'Diamante ', 'Diamante en neón ', 239, '30cmX40cm', '1', 0),
(3, 2, 'DO NOT ENTER', 'Letrero de DO NOT ENTER en neón ', 339, '40cmX40cm', '1', 0),
(4, 1, 'Flamenco ', 'Flamenco en neón ', 299, '40cmX40cm', '', 0),
(6, 4, 'Labios ', 'Labios en neón ', 259, '40cmX20cm', '1', 0),
(8, 2, 'TIK TOK', 'Letrero TIK TOK en neón ', 349, '35cmX30cm', '1', 0),
(9, 2, 'LOVE X3', 'Letrero LOVEX3 en neón ', 329, '30cmX30cm', '1', 0),
(10, 4, 'OJOS', 'Letrero OJOS  en neón ', 299, '40cmX30cm', '1', 0),
(11, 4, 'PESTAÑAS', 'Letrero de PESTAÑAS  en neón ', 229, '40cmX20cm', '1', 0),
(12, 4, 'HELADO', 'Paleta de helado en neón ', 219, '30cmX20cm', '1', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tab_roles`
--

CREATE TABLE `tab_roles` (
  `id` int(11) NOT NULL,
  `rol_nombre` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tab_roles`
--

INSERT INTO `tab_roles` (`id`, `rol_nombre`) VALUES
(1, 'admin'),
(2, 'cliente');

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
(1, 'adminNLS', '$2y$10$LgeWXAVuGEPOgd5LCSg.A.YF/PoSVhPBpTX4P9MApwRR6axty84dK'),
(2, 'isabellam.montoya.im@gmail.com', 'd84cb4c8d90f9f7429db81ef5ae58a7c'),
(3, '18100102@ue.edu.pe', 'c71fc34d162fe4d62d8d4e86ecf132b3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tab_visitantes`
--

CREATE TABLE `tab_visitantes` (
  `id` int(11) NOT NULL,
  `vis_nombre` varchar(120) DEFAULT NULL,
  `vis_apellidos` varchar(120) DEFAULT NULL,
  `vis_email` varchar(120) DEFAULT NULL,
  `vis_telefono` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tab_visitantes`
--

INSERT INTO `tab_visitantes` (`id`, `vis_nombre`, `vis_apellidos`, `vis_email`, `vis_telefono`) VALUES
(1, 'Visitante1', 'Visitapellido', 'visita@gmail.com', '151515');

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cli_rol` (`cli_rol`);

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
-- Indices de la tabla `tab_roles`
--
ALTER TABLE `tab_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tab_user`
--
ALTER TABLE `tab_user`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tab_visitantes`
--
ALTER TABLE `tab_visitantes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tab_categoria`
--
ALTER TABLE `tab_categoria`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tab_cliente`
--
ALTER TABLE `tab_cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `tab_compra`
--
ALTER TABLE `tab_compra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tab_compra_detalle`
--
ALTER TABLE `tab_compra_detalle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tab_producto`
--
ALTER TABLE `tab_producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `tab_user`
--
ALTER TABLE `tab_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tab_visitantes`
--
ALTER TABLE `tab_visitantes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tab_cliente`
--
ALTER TABLE `tab_cliente`
  ADD CONSTRAINT `fk_cli_rol` FOREIGN KEY (`cli_rol`) REFERENCES `tab_roles` (`id`);

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
