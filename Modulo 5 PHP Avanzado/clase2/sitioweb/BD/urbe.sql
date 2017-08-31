-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-03-2016 a las 18:50:50
-- Versión del servidor: 10.1.8-MariaDB
-- Versión de PHP: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `urbe`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datospersonales`
--

CREATE TABLE `datospersonales` (
  `id` int(6) NOT NULL,
  `cedula` varchar(8) NOT NULL DEFAULT '',
  `nombre` varchar(30) NOT NULL DEFAULT '',
  `apellido` varchar(30) NOT NULL DEFAULT '',
  `genero` char(1) NOT NULL DEFAULT '',
  `edocivil` char(1) NOT NULL DEFAULT '',
  `fechanac` date NOT NULL,
  `correo` varchar(80) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `datospersonales`
--

INSERT INTO `datospersonales` (`id`, `cedula`, `nombre`, `apellido`, `genero`, `edocivil`, `fechanac`, `correo`) VALUES
(1, '19546948', 'miguel', 'guarucano', 'M', 'p', '1990-07-03', 'miguel.guarucano@gmail.com'),
(2, '19546950', 'miguel', 'guarucano', 'M', 'p', '0000-00-00', 'miguel.guarucano@gmail.com'),
(3, '19546951', 'miguel', 'guarucano', 'M', 'p', '0000-00-00', 'miguel.guarucano@gmail.com'),
(4, '19546952', 'miguel', 'guarucano', 'M', 'p', '1990-12-03', 'miguel.guarucano@gmail.com'),
(5, '19546953', 'miguel', 'guarucano', 'M', 'p', '1990-12-03', 'miguel.guarucano@gmail.com'),
(6, '19546954', 'miguel', 'guarucano', 'M', 'p', '1990-12-03', 'miguel.guarucano@gmail.com'),
(7, '19546955', 'miguel', 'guarucano', 'M', 'p', '1990-07-03', 'miguel.guarucano@gmail.com'),
(8, '19546956', 'miguel', 'guarucano', 'M', 'p', '2016-03-08', 'miguel.guarucano@gmail.com'),
(9, '19546954', 'miguel', 'guarucano', 'M', 's', '1990-07-03', 'miguel.guarucano@gmail.com'),
(10, '19546954', 'miguel', 'guarucano', 'M', 's', '1990-07-03', 'miguel.guarucano@gmail.com'),
(11, '19546954', 'miguel', 'guarucano', 'M', 's', '1990-07-03', 'miguel.guarucano@gmail.com'),
(12, '19546957', 'miguel', 'guarucano', 'M', 's', '1990-07-03', 'miguel.guarucano@gmail.com'),
(13, '19546958', 'miguel', 'guarucano', 'M', 's', '1990-07-03', 'miguel.guarucano@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hobies`
--

CREATE TABLE `hobies` (
  `idhobie` int(6) NOT NULL,
  `nombrehobie` varchar(30) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `hobies`
--

INSERT INTO `hobies` (`idhobie`, `nombrehobie`) VALUES
(1, 'Nadar'),
(2, 'Caminar'),
(3, 'Dormir');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hobiesdp`
--

CREATE TABLE `hobiesdp` (
  `idhobiedp` int(6) NOT NULL,
  `id` int(6) NOT NULL,
  `idhobie` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `hobiesdp`
--

INSERT INTO `hobiesdp` (`idhobiedp`, `id`, `idhobie`) VALUES
(1, 6, 1),
(2, 6, 2),
(3, 6, 3),
(4, 7, 2),
(5, 7, 3),
(6, 8, 1),
(7, 8, 2),
(8, 9, 1),
(9, 9, 2),
(10, 9, 3),
(11, 10, 1),
(12, 10, 2),
(13, 10, 3),
(14, 11, 1),
(15, 11, 2),
(16, 11, 3),
(17, 12, 1),
(18, 12, 2),
(19, 12, 3),
(20, 13, 1),
(21, 13, 2),
(22, 13, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(6) NOT NULL,
  `usuario` varchar(20) NOT NULL DEFAULT '',
  `clave` varchar(20) NOT NULL DEFAULT '',
  `id` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `usuario`, `clave`, `id`) VALUES
(1, 'guaru', '123', 5),
(2, 'guaru', 'asd', 6),
(3, 'guaru', 'asd', 7),
(4, 'Guaru', '19546948', 8),
(5, 'Guaru', '19546948', 9),
(6, 'Guaru', 'asd', 10),
(7, 'Guaru', 'asd', 11),
(8, 'Guarucano', 'asd', 12),
(9, 'Guarucanoa', 'asd', 13);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `datospersonales`
--
ALTER TABLE `datospersonales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `hobies`
--
ALTER TABLE `hobies`
  ADD PRIMARY KEY (`idhobie`);

--
-- Indices de la tabla `hobiesdp`
--
ALTER TABLE `hobiesdp`
  ADD PRIMARY KEY (`idhobiedp`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `datospersonales`
--
ALTER TABLE `datospersonales`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `hobies`
--
ALTER TABLE `hobies`
  MODIFY `idhobie` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `hobiesdp`
--
ALTER TABLE `hobiesdp`
  MODIFY `idhobiedp` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
