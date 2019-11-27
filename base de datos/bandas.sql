-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-11-2019 a las 04:23:25
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
  `cantidad_canciones` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `banda`
--

INSERT INTO `banda` (`id_banda`, `banda`, `anio`, `cantidad_canciones`) VALUES
(1, 'Iron Maiden', 1978, 133),
(2, 'AC/DC', 1976, 232),
(3, 'Metallica', 1972, 523),
(4, 'Three day grace', 1983, 142);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `id_comentario` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_evento` int(11) NOT NULL,
  `comentario` text DEFAULT NULL,
  `puntaje` int(11) DEFAULT NULL,
  `fecha` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comentario`
--

INSERT INTO `comentario` (`id_comentario`, `id_usuario`, `id_evento`, `comentario`, `puntaje`, `fecha`) VALUES
(1, 7, 2, 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Autem aperiam illum perferendis. Voluptatibus eveniet, alias ex tempore ipsum nemo culpa omnis odio suscipit aut voluptas inventore porro eaque repellendus modi.', 5, '2019-11-27T03:15:48+00:00'),
(2, 11, 2, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quidem ea, provident eius, sapiente tenetur aut laborum dolorem reiciendis doloribus distinctio eligendi esse quia eum repellat consequatur hic nihil! Accusamus, expedita!', 1, '2019-11-27T03:17:12+00:00'),
(3, 11, 3, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quidem ea, provident eius, sapiente tenetur aut laborum dolorem reiciendis doloribus distinctio eligendi esse quia eum repellat consequatur hic nihil! Accusamus, expedita!', 2, '2019-11-27T03:17:25+00:00'),
(4, 11, 1, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quidem ea, provident eius, sapiente tenetur aut laborum dolorem reiciendis doloribus distinctio eligendi esse quia eum repellat consequatur hic nihil! Accusamus, expedita!', 4, '2019-11-27T03:17:34+00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

CREATE TABLE `evento` (
  `id_evento` int(11) NOT NULL,
  `id_banda` int(11) NOT NULL,
  `evento` text DEFAULT NULL,
  `ciudad` text NOT NULL,
  `detalle` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `evento`
--

INSERT INTO `evento` (`id_evento`, `id_banda`, `evento`, `ciudad`, `detalle`) VALUES
(1, 1, 'Rock in Rio', 'Rio de janeiro', 'Conocido como El festival más grande del mundo'),
(2, 1, 'OzzFest', 'New York Usa', 'Ozzfest es un festival anual de rock'),
(3, 1, 'Rock \'n roll', 'San Diego', 'Lorem lorem sarasa sarasa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen_evento`
--

CREATE TABLE `imagen_evento` (
  `id_imagen` int(11) NOT NULL,
  `id_evento` int(11) NOT NULL,
  `ruta` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `imagen_evento`
--

INSERT INTO `imagen_evento` (`id_imagen`, `id_evento`, `ruta`) VALUES
(1, 2, 'images/eventos/5ddddca4b95b25.72191112.png'),
(4, 3, 'images/eventos/5dddde6c5b7a75.54539926.jpg'),
(6, 3, 'images/eventos/5ddddedbc40be0.91139367.jpg'),
(7, 1, 'images/eventos/5ddddfd78fdcb4.35368109.jpg'),
(8, 1, 'images/eventos/5ddde002cb4d33.76777838.jpg'),
(9, 1, 'images/eventos/5ddde040350762.65110833.jpg'),
(10, 1, 'images/eventos/5ddde048def952.50331152.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(24) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `pregunta` varchar(24) NOT NULL,
  `respuesta` varchar(255) NOT NULL,
  `admin` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `email`, `password`, `pregunta`, `respuesta`, `admin`) VALUES
(7, 'tomas', 'tomasarras@gmail.com', '$2y$10$ryLAjw9CJt/KBouViTUhCu2N.TTCg1awz110OaUUUm2sGY7lMIz3m', 'apodo', '$2y$10$3bKQClJAjiE838Z94ZxOHOerChI7zAuZm86KpGoaQK316etP8yC7S', 1),
(8, 'laLechuza', 'jeremiascaballero@gmail.com', '$2y$10$BcJ6yVpYeaAiZ8tcxgS6Ru8W9Zo8UdeOhp6gcu7hZ5DJXKFz3dMwy', 'apodo', '$2y$10$o3tyxdPie3d4J6OlM/ziueRbTq2Sw7gcdw1XIxA78qoxpaBTe.m/O', 0),
(9, 'admin', 'admin@admin', '$2y$10$oX4EnnvBy.UzS3vDEUazyOeaFGoqMnJeVKXIuzffXbujRrITAueFi', 'perro', '$2y$10$I3tea0Q/EfNy01Qwg7lCC.NaBAHExe6imggcv2qaJtoM4TxUzKUYO', 1),
(10, 'user', 'otro@otroUser.com', '$2y$10$wo2xmBMqOuuSQ6PvDprsAeLJnOdjirIwtzSqmnVtI3WNH1cVJFdBm', 'perro', '$2y$10$H7bLC3ZU2IVQkmE6gDavMu/rg46DC3a3Pv7kDSUR8Zffj.5Safl0W', 0),
(11, 'user3', 'q@q', '$2y$10$yu2oQ4frjXdW0qt66.SdEe0q1.Ob4LMueCHaWX1Q2LsdmHvoBlEQG', 'perro', '$2y$10$bDzX2LsOzrrkrDShyvR9hONvhVG/llY5w0Mqw5giU9h5XtDY3oZ8q', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `banda`
--
ALTER TABLE `banda`
  ADD PRIMARY KEY (`id_banda`);

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id_comentario`);

--
-- Indices de la tabla `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`id_evento`),
  ADD KEY `id_banda` (`id_evento`),
  ADD KEY `fk_banda` (`id_banda`);

--
-- Indices de la tabla `imagen_evento`
--
ALTER TABLE `imagen_evento`
  ADD PRIMARY KEY (`id_imagen`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `banda`
--
ALTER TABLE `banda`
  MODIFY `id_banda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `evento`
--
ALTER TABLE `evento`
  MODIFY `id_evento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `imagen_evento`
--
ALTER TABLE `imagen_evento`
  MODIFY `id_imagen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
