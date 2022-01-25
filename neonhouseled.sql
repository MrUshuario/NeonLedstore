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
-- Estructura de tabla para la tabla `User`
--

CREATE TABLE tab_user (
  user_id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  user_email varchar(120) NOT NULL,
  user_clave varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------
--Volcado de datos para la tabla user--

INSERT INTO tab_user (user_id, user_email, user_clave) VALUES

(1, 'isabellam.montoya.im@gmail.com ' , 'esan2018');
(2, '18100102@ue.edu.pe' , 'Itis1812');
-- Estructura de tabla para la tabla `tab_categoria`
--

CREATE TABLE tab_categoria (
  cat_id tinyint NOT NULL PRIMARY KEY AUTO_INCREMENT,
  cat_nombre varchar(40) NOT NULL,
  cat_activo char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla tab_categoria`
--

INSERT INTO tab_categoria (cat_id, cat_nombre,cat_activo) VALUES
(1, 'Personajes', '1'),
(2, 'Texto', '1'),
(3, 'Objetos', '1'),
(4, 'Otros', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tab_cliente`
--

CREATE TABLE tab_cliente (
  cli_id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  cli_nombre varchar(120) NULL,
  cli_apellidos varchar(120) NULL,
  cli_email varchar(120) NULL,
  cli_clave varchar(255) NULL,
  cli_estado char(1) NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Compra`
--

CREATE TABLE tab_compra (
  cod_com int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  com_fecha datetime NULL,
  precio_total float NULL,
  cli_id int,
  CONSTRAINT FK_cliente FOREIGN KEY (cli_id) REFERENCES tab_cliente(cli_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------


--
-- Estructura de tabla para la tabla `Productos`
--

CREATE TABLE tab_producto (
  pro_id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  cat_id tinyint,
  pro_nombre varchar(100) NULL,
  pro_descrpcion varchar(255) NULL,
  pro_precio float NULL,
  pro_tamaño varchar(20) NULL,
  pro_activo char(1) NULL,
  FOREIGN KEY (cat_id) REFERENCES tab_categoria(cat_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Estructura de tabla para la tabla `tab_compra_detalle`
--

CREATE TABLE tab_compra_detalle (
  cod_det int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  cod_com int,
  pro_id int,
  det_cantidad int NULL,
  det_color varchar(30) NULL,
  FOREIGN KEY (cod_com) REFERENCES tab_compra(cod_com),
  FOREIGN KEY (pro_id) REFERENCES tab_producto(pro_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
