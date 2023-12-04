-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-12-2023 a las 04:49:12
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `iesanjuan`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acudiente`
--

CREATE TABLE `acudiente` (
  `id_acudiente` int(11) NOT NULL,
  `tipo_id` text NOT NULL,
  `nombre` text NOT NULL,
  `apellidos` text NOT NULL,
  `n_celular` int(11) NOT NULL,
  `correo` text NOT NULL,
  `direccion` text NOT NULL,
  `parentesco` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `acudiente`
--

INSERT INTO `acudiente` (`id_acudiente`, `tipo_id`, `nombre`, `apellidos`, `n_celular`, `correo`, `direccion`, `parentesco`) VALUES
(50960111, 'CC', 'Antonia', 'Ochoa', 399039022, 'no tiene', 'corregimiento raicero', 'Madre'),
(50960112, 'CC', 'Claudia', 'Ospino', 1325263637, 'no tiene', 'corr flecha', 'Tia'),
(50960119, 'CC', 'Diana ', 'Hoyos Mendez', 2147483647, 'dhoyosm@gmail.com', 'corregimiento del retiro', 'Madre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `id_estudiante` int(11) NOT NULL,
  `tipo_id` text NOT NULL,
  `nombre` text NOT NULL,
  `apellidos` text NOT NULL,
  `fecha_n` date NOT NULL,
  `edad` int(11) NOT NULL,
  `genero` text NOT NULL,
  `direccion` text NOT NULL,
  `discapacidad` text NOT NULL,
  `pais_origen` text NOT NULL,
  `correo` text NOT NULL,
  `sisben` text NOT NULL,
  `sector` text NOT NULL,
  `calendario` text NOT NULL,
  `dane` int(20) NOT NULL,
  `estado` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`id_estudiante`, `tipo_id`, `nombre`, `apellidos`, `fecha_n`, `edad`, `genero`, `direccion`, `discapacidad`, `pais_origen`, `correo`, `sisben`, `sector`, `calendario`, `dane`, `estado`) VALUES
(1007838013, 'TI', 'Pepito', 'causil', '2008-04-04', 15, 'm', 'corregimiento flecha sevilla', 'No', 'Colombia', 'pepito@gmail.com', 'A2', 'Oficial', 'A', 1234567890, 'Activo'),
(1007838083, 'TI', 'Maria Paula', 'Ricardo Hoyos', '2010-08-02', 13, 'F', 'corregimiento retiro de los perez', 'No', 'Colombia', 'mariap@gmail.com', 'A3', 'Oficial', 'A', 1234567890, 'Activo'),
(1007838093, 'TI', 'Jose Ivan', 'Hoyos Ochoa', '2009-09-10', 14, 'm', 'corregimiento raicero', 'No', 'Colombia', 'joser@gmail.com', 'C5', 'Oficial', 'A', 1234567890, 'oficial');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante_acudiente`
--

CREATE TABLE `estudiante_acudiente` (
  `id_estudiante` int(11) NOT NULL,
  `id_acudiente` int(11) NOT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estudiante_acudiente`
--

INSERT INTO `estudiante_acudiente` (`id_estudiante`, `id_acudiente`, `fecha`) VALUES
(1007838013, 50960112, '2023-01-02'),
(1007838083, 50960119, '2023-01-17'),
(1007838093, 50960111, '2023-02-02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante_sede`
--

CREATE TABLE `estudiante_sede` (
  `id_estudiante` int(11) NOT NULL,
  `id_sede` int(11) NOT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estudiante_sede`
--

INSERT INTO `estudiante_sede` (`id_estudiante`, `id_sede`, `fecha`) VALUES
(1007838013, 3, '2023-01-02'),
(1007838083, 1, '2023-01-17'),
(1007838093, 2, '2023-02-02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grado_grupo`
--

CREATE TABLE `grado_grupo` (
  `id_grado` int(11) NOT NULL,
  `id_grupo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `grado_grupo`
--

INSERT INTO `grado_grupo` (`id_grado`, `id_grupo`) VALUES
(8, 1),
(8, 2),
(9, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matricula`
--

CREATE TABLE `matricula` (
  `id_estudiante` int(11) NOT NULL,
  `id_grado` int(11) NOT NULL,
  `id_grupo` int(11) NOT NULL,
  `fecha_matricula` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `matricula`
--

INSERT INTO `matricula` (`id_estudiante`, `id_grado`, `id_grupo`, `fecha_matricula`) VALUES
(1007838013, 9, 4, '2023-01-02'),
(1007838083, 8, 2, '2023-01-17'),
(1007838093, 8, 1, '2023-02-02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sede`
--

CREATE TABLE `sede` (
  `id_sede` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `direccion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sede`
--

INSERT INTO `sede` (`id_sede`, `nombre`, `direccion`) VALUES
(1, 'Retiro de los perez', 'corregimiento retiro de los perez'),
(2, 'raicero', 'corr raicero'),
(3, 'Flecha sevilla', 'corr flechas');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acudiente`
--
ALTER TABLE `acudiente`
  ADD PRIMARY KEY (`id_acudiente`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`id_estudiante`);

--
-- Indices de la tabla `estudiante_acudiente`
--
ALTER TABLE `estudiante_acudiente`
  ADD PRIMARY KEY (`id_estudiante`,`id_acudiente`),
  ADD KEY `id_acudiente` (`id_acudiente`);

--
-- Indices de la tabla `estudiante_sede`
--
ALTER TABLE `estudiante_sede`
  ADD PRIMARY KEY (`id_estudiante`,`id_sede`),
  ADD KEY `id_sede` (`id_sede`);

--
-- Indices de la tabla `grado_grupo`
--
ALTER TABLE `grado_grupo`
  ADD PRIMARY KEY (`id_grado`,`id_grupo`);

--
-- Indices de la tabla `matricula`
--
ALTER TABLE `matricula`
  ADD PRIMARY KEY (`id_estudiante`,`id_grado`,`id_grupo`),
  ADD KEY `id_grado` (`id_grado`,`id_grupo`);

--
-- Indices de la tabla `sede`
--
ALTER TABLE `sede`
  ADD PRIMARY KEY (`id_sede`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `estudiante_acudiente`
--
ALTER TABLE `estudiante_acudiente`
  ADD CONSTRAINT `estudiante_acudiente_ibfk_1` FOREIGN KEY (`id_estudiante`) REFERENCES `estudiante` (`id_estudiante`),
  ADD CONSTRAINT `estudiante_acudiente_ibfk_2` FOREIGN KEY (`id_acudiente`) REFERENCES `acudiente` (`id_acudiente`);

--
-- Filtros para la tabla `estudiante_sede`
--
ALTER TABLE `estudiante_sede`
  ADD CONSTRAINT `estudiante_sede_ibfk_1` FOREIGN KEY (`id_estudiante`) REFERENCES `estudiante` (`id_estudiante`),
  ADD CONSTRAINT `estudiante_sede_ibfk_2` FOREIGN KEY (`id_sede`) REFERENCES `sede` (`id_sede`);

--
-- Filtros para la tabla `matricula`
--
ALTER TABLE `matricula`
  ADD CONSTRAINT `matricula_ibfk_1` FOREIGN KEY (`id_estudiante`) REFERENCES `estudiante` (`id_estudiante`),
  ADD CONSTRAINT `matricula_ibfk_2` FOREIGN KEY (`id_grado`,`id_grupo`) REFERENCES `grado_grupo` (`id_grado`, `id_grupo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
