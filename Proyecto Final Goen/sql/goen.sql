-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 14-05-2016 a las 12:40:20
-- Versión del servidor: 10.1.10-MariaDB
-- Versión de PHP: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `goen`
--
CREATE DATABASE IF NOT EXISTS `goen` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `goen`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `idcurso` int(11) NOT NULL,
  `idmodulo` int(11) NOT NULL,
  `diasmodulo` varchar(27) COLLATE utf8_spanish_ci NOT NULL,
  `horarioinicio` time NOT NULL,
  `horariofin` time NOT NULL,
  `fechainicio` date NOT NULL,
  `fechafin` date NOT NULL,
  `cupos` int(11) NOT NULL,
  `cuposdisponibles` int(11) NOT NULL,
  `idprofesor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`idcurso`, `idmodulo`, `diasmodulo`, `horarioinicio`, `horariofin`, `fechainicio`, `fechafin`, `cupos`, `cuposdisponibles`, `idprofesor`) VALUES
(1, 1, 'Lunes', '09:00:00', '10:00:00', '2016-05-01', '2016-05-31', 20, 16, 9),
(2, 2, 'Martes', '13:00:00', '18:00:00', '2016-05-02', '2016-05-31', 20, 18, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datospersonales`
--

CREATE TABLE `datospersonales` (
  `id` int(6) NOT NULL,
  `cedula` varchar(12) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `genero` varchar(10) NOT NULL,
  `email` varchar(150) NOT NULL,
  `telefono` varchar(12) NOT NULL,
  `ciudad` varchar(50) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `direccion` varchar(20) NOT NULL,
  `datoactivo` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `datospersonales`
--

INSERT INTO `datospersonales` (`id`, `cedula`, `nombre`, `apellido`, `genero`, `email`, `telefono`, `ciudad`, `estado`, `direccion`, `datoactivo`) VALUES
(8, '19546948', 'Miguel', 'Guarucano', 'masculino', 'm@guaruca.no', '0414-1234567', 'Maracaibo', 'Zulia', 'El Hediondito', 1),
(10, '18122997', 'Jesus', 'Ordoñez', 'masculino', 'Jordonez@gmail.com', '0414-6809281', 'Maracaibo', 'Zulia', 'La Rinconada', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulos`
--

CREATE TABLE `modulos` (
  `idmodulo` int(11) NOT NULL,
  `nombremodulo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `idtipomodulo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `modulos`
--

INSERT INTO `modulos` (`idmodulo`, `nombremodulo`, `idtipomodulo`) VALUES
(1, 'M0', 1),
(2, 'Origami', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `idpago` int(6) NOT NULL,
  `numeropago` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` datetime NOT NULL,
  `descripcionpago` varchar(500) COLLATE utf8_spanish_ci DEFAULT NULL,
  `imgpago` varchar(2000) COLLATE utf8_spanish_ci NOT NULL,
  `idusuario` int(6) NOT NULL,
  `pagoconfirmado` tinyint(1) NOT NULL,
  `idcurso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`idpago`, `numeropago`, `fecha`, `descripcionpago`, `imgpago`, `idusuario`, `pagoconfirmado`, `idcurso`) VALUES
(24, '0102', '2016-05-13 09:25:07', 'pago', '11013-05-2016.png', 10, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `rolid` int(6) NOT NULL,
  `nombrerol` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`rolid`, `nombrerol`) VALUES
(1, 'administrador'),
(2, 'usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiposmodulos`
--

CREATE TABLE `tiposmodulos` (
  `idtipomodulo` int(11) NOT NULL,
  `nombretipomodulo` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tiposmodulos`
--

INSERT INTO `tiposmodulos` (`idtipomodulo`, `nombretipomodulo`) VALUES
(1, 'Convencional'),
(2, 'No Convencional');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(6) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `clave` varchar(20) NOT NULL,
  `id` int(6) NOT NULL,
  `rolid` int(6) DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `usuario`, `clave`, `id`, `rolid`) VALUES
(9, 'mguarucano', '123456', 8, 2),
(10, 'jordonez', '12345', 10, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarioscursos`
--

CREATE TABLE `usuarioscursos` (
  `idusuario` int(11) NOT NULL,
  `idcurso` int(11) NOT NULL,
  `cursoactual` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Relaciona los usuarios con los cursos';

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`idcurso`),
  ADD KEY `idmodulo` (`idmodulo`),
  ADD KEY `idprofesor` (`idprofesor`);

--
-- Indices de la tabla `datospersonales`
--
ALTER TABLE `datospersonales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `modulos`
--
ALTER TABLE `modulos`
  ADD PRIMARY KEY (`idmodulo`),
  ADD KEY `idtipomodulo` (`idtipomodulo`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`idpago`),
  ADD KEY `idusuario` (`idusuario`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`rolid`);

--
-- Indices de la tabla `tiposmodulos`
--
ALTER TABLE `tiposmodulos`
  ADD PRIMARY KEY (`idtipomodulo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`),
  ADD KEY `id` (`id`),
  ADD KEY `rolid` (`rolid`);

--
-- Indices de la tabla `usuarioscursos`
--
ALTER TABLE `usuarioscursos`
  ADD PRIMARY KEY (`idusuario`,`idcurso`),
  ADD KEY `fk_curso_usuariocurso` (`idcurso`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `curso`
--
ALTER TABLE `curso`
  MODIFY `idcurso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `datospersonales`
--
ALTER TABLE `datospersonales`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de la tabla `modulos`
--
ALTER TABLE `modulos`
  MODIFY `idmodulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `idpago` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `rolid` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tiposmodulos`
--
ALTER TABLE `tiposmodulos`
  MODIFY `idtipomodulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `curso`
--
ALTER TABLE `curso`
  ADD CONSTRAINT `fk_modulo_curso` FOREIGN KEY (`idmodulo`) REFERENCES `modulos` (`idtipomodulo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_usuario_profesor_curso` FOREIGN KEY (`idprofesor`) REFERENCES `usuario` (`idusuario`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Filtros para la tabla `modulos`
--
ALTER TABLE `modulos`
  ADD CONSTRAINT `fk_tipomodulo_modulo` FOREIGN KEY (`idtipomodulo`) REFERENCES `tiposmodulos` (`idtipomodulo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD CONSTRAINT `fk_idusuario_pagos` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_id` FOREIGN KEY (`id`) REFERENCES `datospersonales` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_rolid` FOREIGN KEY (`rolid`) REFERENCES `roles` (`rolid`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarioscursos`
--
ALTER TABLE `usuarioscursos`
  ADD CONSTRAINT `fk_curso_usuariocurso` FOREIGN KEY (`idcurso`) REFERENCES `curso` (`idcurso`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_usuario_usuariocurso` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
