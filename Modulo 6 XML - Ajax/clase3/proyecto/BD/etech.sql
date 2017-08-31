-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-04-2016 a las 07:46:34
-- Versión del servidor: 10.1.9-MariaDB
-- Versión de PHP: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `etech`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE `cargo` (
  `id_cargo` int(6) NOT NULL,
  `nombre_cargo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`id_cargo`, `nombre_cargo`) VALUES
(1, 'Ingeniero'),
(2, 'Recursos Humanos'),
(3, 'Chofer'),
(4, 'Arquitecto'),
(5, 'Programador'),
(6, 'Abogado'),
(7, 'Ninguno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajador`
--

CREATE TABLE `trabajador` (
  `id_trabajador` int(6) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `cedula` varchar(8) NOT NULL,
  `correo` varchar(30) NOT NULL,
  `id_cargo` int(6) NOT NULL,
  `status_trabajador` varchar(8) NOT NULL,
  `status_bd` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `trabajador`
--

INSERT INTO `trabajador` (`id_trabajador`, `nombre`, `apellido`, `cedula`, `correo`, `id_cargo`, `status_trabajador`, `status_bd`) VALUES
(1, 'MiguelMarco', 'Guarucano Velasco', '19546948', 'miguel@gmail.com', 7, 'Inactivo', 'Eliminado'),
(2, 'Rebeca', 'Bracho', '19546949', 'rebeca@gmail.com', 4, 'Activo', 'Eliminado'),
(3, 'Rebeca', 'Bracho', '19546950', 'rebeca@gmail.com', 1, 'Activo', 'En BD'),
(4, 'Rebeca', 'Bracho', '19546951', 'rebeca@gmail.com', 6, 'Activo', 'En BD'),
(5, 'Miguel', 'Guarucano Velasco', '19546954', 'miguel@gmail.com', 2, 'Activo', 'En BD'),
(6, 'Rebeca', 'Bracho', '22057256', 'rebeca@gmail.com', 4, 'Activo', 'En BD'),
(7, 'Miguel', 'Guarucano Velasco', '19546956', 'miguel@gmail.com', 4, 'Activo', 'En BD'),
(8, 'Miguel', 'Guarucano Velasco', '19549852', 'miguel@gmail.com', 3, 'Activo', 'Eliminado'),
(9, 'Mario', 'guarucano', '12312355', 'rebeca@gmail.com', 3, 'Activo', 'Eliminado'),
(10, 'Miguel', 'Guarucano Velasco', '19575434', 'miguel@gmail.com', 7, 'Inactivo', 'En BD'),
(11, 'Miguel', 'Guarucano Velasco', '19546346', 'miguel@gmail.com', 5, 'Activo', 'Eliminado'),
(12, 'Miguel', 'Guarucano Velasco', '19546546', 'miguel@gmail.com', 1, 'Activo', 'Eliminado'),
(13, 'Rebeca', 'Bracho', '19587452', 'rebeca@gmail.com', 7, 'Inactivo', 'Eliminado'),
(14, 'Miguel', 'Guarucano Velasco', '19546556', 'miguel@gmail.com', 1, 'Activo', 'Eliminado'),
(15, 'Miguel', 'Guarucano Velasco', '19584585', '123@asd.com', 2, 'Activo', 'En BD'),
(16, 'Rebeca', 'Bracho', '22056572', 'rebeca@gmail.com', 6, 'Activo', 'En BD');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`id_cargo`);

--
-- Indices de la tabla `trabajador`
--
ALTER TABLE `trabajador`
  ADD PRIMARY KEY (`id_trabajador`),
  ADD KEY `id_cargo` (`id_cargo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
  MODIFY `id_cargo` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `trabajador`
--
ALTER TABLE `trabajador`
  MODIFY `id_trabajador` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `trabajador`
--
ALTER TABLE `trabajador`
  ADD CONSTRAINT `trabajador_ibfk_1` FOREIGN KEY (`id_cargo`) REFERENCES `cargo` (`id_cargo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
