-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-10-2019 a las 20:47:10
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.1.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bandas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banda`
--

CREATE TABLE `banda` (
  `id_banda` int(11) NOT NULL,
  `banda` text NOT NULL,
  `anio` int(11) DEFAULT NULL,
  `cantidadCanciones` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `banda`
--

INSERT INTO `banda` (`id_banda`, `banda`, `anio`, `cantidadCanciones`) VALUES
(1, 'Iron maiden', 1800, 20),
(6, 'sabaleta', 1999, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

CREATE TABLE `evento` (
  `id` int(11) NOT NULL,
  `id_banda` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `detalle` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `evento`
--

INSERT INTO `evento` (`id`, `id_banda`, `nombre`, `detalle`) VALUES
(2, 1, 'Lolapalooza', 'no fue nadie xd'),
(4, 1, 'otro', 'asfasf'),
(9, 1, 'caca', 'koko'),
(96, 6, 'sabaleta', 'xd');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `banda`
--
ALTER TABLE `banda`
  ADD PRIMARY KEY (`id_banda`);

--
-- Indices de la tabla `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_banda` (`id`),
  ADD KEY `fk_banda` (`id_banda`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `banda`
--
ALTER TABLE `banda`
  MODIFY `id_banda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `evento`
--
ALTER TABLE `evento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `evento`
--
ALTER TABLE `evento`
  ADD CONSTRAINT `fk_banda` FOREIGN KEY (`id_banda`) REFERENCES `banda` (`id_banda`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
