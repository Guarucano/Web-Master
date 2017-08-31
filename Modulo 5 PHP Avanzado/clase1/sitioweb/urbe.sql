-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-02-2016 a las 18:24:15
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
  `cedula` varchar(8) DEFAULT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `apellido` varchar(30) DEFAULT NULL,
  `genero` char(1) DEFAULT NULL,
  `edocivil` varchar(1) DEFAULT NULL,
  `fechanac` date DEFAULT NULL,
  `correo` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `datospersonales`
--

INSERT INTO `datospersonales` (`id`, `cedula`, `nombre`, `apellido`, `genero`, `edocivil`, `fechanac`, `correo`) VALUES
(1, '19546948', 'Miguel', 'Guarucano', 'M', NULL, '1990-07-03', 'miguel.guarucano@gmail.com'),
(2, NULL, 'Rebeca', 'Bracho', 'F', '', NULL, NULL),
(3, NULL, 'mario', 'guaru', 'M', 'p', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hobies`
--

CREATE TABLE `hobies` (
  `idhobies` int(6) NOT NULL,
  `nombrehobie` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `hobies`
--

INSERT INTO `hobies` (`idhobies`, `nombrehobie`) VALUES
(1, 'nadar'),
(2, 'caminar'),
(3, 'dormir');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hobiesdp`
--

CREATE TABLE `hobiesdp` (
  `idhobiesdp` int(6) NOT NULL,
  `id` int(6) DEFAULT NULL,
  `idhobies` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(6) NOT NULL,
  `usuario` varchar(20) DEFAULT NULL,
  `clave` varchar(20) DEFAULT NULL,
  `id` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `usuario`, `clave`, `id`) VALUES
(1, 'Guaru', '19546948', NULL);

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
  ADD PRIMARY KEY (`idhobies`);

--
-- Indices de la tabla `hobiesdp`
--
ALTER TABLE `hobiesdp`
  ADD PRIMARY KEY (`idhobiesdp`);

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
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `hobies`
--
ALTER TABLE `hobies`
  MODIFY `idhobies` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `hobiesdp`
--
ALTER TABLE `hobiesdp`
  MODIFY `idhobiesdp` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
