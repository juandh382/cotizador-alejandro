-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-06-2022 a las 06:31:02
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tutoriales`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivos`
--

CREATE TABLE `archivos` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `fecha` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `ruta` varchar(200) NOT NULL,
  `tipo` varchar(200) NOT NULL,
  `size` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `archivos`
--

INSERT INTO `archivos` (`id`, `name`, `fecha`, `description`, `ruta`, `tipo`, `size`) VALUES
(154, 'claudio', '2022-06-14', '123', 'verplanilla.pdf', 'application/pdf', 56940);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `idCliente` int(11) NOT NULL,
  `rutCliente` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `nombreCompleto` varchar(200) COLLATE utf8mb4_spanish_ci NOT NULL,
  `fechaIncorporacion` date NOT NULL,
  `tipoPersona` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `direccion` varchar(40) COLLATE utf8mb4_spanish_ci NOT NULL,
  `telefono` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`idCliente`, `rutCliente`, `nombreCompleto`, `fechaIncorporacion`, `tipoPersona`, `direccion`, `telefono`) VALUES
(1, '18.123.432-2', 'Juan Perez', '2017-06-06', 'Natural', 'Los Olmos #123', 98762343),
(3, '17.123.342-1', 'Jose Soto', '2017-06-05', 'Natural', 'Los Alerces #123', 87234354),
(4, '16.132.154-1', 'Claudio Perez', '2017-07-04', 'JurÃ­dica', 'La Florida #12', 98761234),
(5, '18.434.234-2', 'Patricio Alvez', '2017-07-12', 'Natural', 'Consistorial #123', 92348712),
(6, '16.145.765-2', 'Javier MuÃ±oz', '2017-07-17', 'Natural', 'Grecia #123', 94387612),
(7, '178763210', 'sadasd', '2022-06-09', 'Natural', 'asdas', 12312);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `nombre` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `pwd` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `perfil` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nombre`, `pwd`, `perfil`) VALUES
(42, 'admin', '$2y$10$Ur8T9g0L8I9oJqHverLeaemg1JFpAzPUxQdY0gqQV0tC115zTAva2', 'Administrador'),
(43, 'elamigos', '$2y$10$zRIk4JOQzF7Mla4KXAeZdui1TyPJo/Lhjd8b6gD2hV8AN4oSBWM8K', 'Usuario'),
(44, 'ola', '$2y$10$jhw9tRdH/M/bYa8hDKuNkenfSQPz8x2K5ZxZilMc3HEuELqtWS2QG', 'Usuario'),
(45, 'comoestas', '$2y$10$EKWWLGn6bE5402MZ3NqEqusYqLqgDS93l7GYFaXkKsVvAzw.udAyy', 'Usuario'),
(46, 'nick', '$2y$10$uO5CW9BFXFODzkWunJso.eSzLOlbRg8omWrD700lv0DUQ/U.JHe82', 'Administrador'),
(47, 'david', '$2y$10$0Vmfp88Mt.Nfeo30SioE8OdrTdRCIw.NZ5jwZ9uDfM7cfSnk4p7hm', 'Usuario'),
(48, 'adela', '$2y$10$Yyon8x.Sy/I8DW9rDuab/uq7ZexhFXKO21NIxdaRV0b1mGs3IgrQK', 'Usuario');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `archivos`
--
ALTER TABLE `archivos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idCliente`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `archivos`
--
ALTER TABLE `archivos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
