-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-03-2024 a las 03:16:14
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bibliotec`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro`
--

CREATE TABLE `libro` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `tipo` varchar(100) DEFAULT NULL,
  `editorial` varchar(100) DEFAULT NULL,
  `año` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `libro`
--

INSERT INTO `libro` (`id`, `nombre`, `tipo`, `editorial`, `año`) VALUES
(2, 'prueba', 'prueba', 'prueba', '2024-02-23'),
(3, '[value-2]', '[value-3]', '[value-4]', '2024-03-09'),
(4, 'prueba2', 'prueba2', 'prueba2', '0000-00-00'),
(5, 'prueba3', 'prueba', 'prueba', '2024-03-11'),
(6, 'prueba4', 'prueba2', 'prueba', '0000-00-00'),
(7, 'prueba2', 'prueba', 'prueba', '0000-00-00'),
(8, 'prueba2', 'prueba', '22222222222', '0000-00-00'),
(9, 'santiago', 'prueba2', 'prueba', '0000-00-00'),
(10, 'sss', 'ssss', 'ssss', '2024-03-10'),
(11, 'santiago', 'vela', 'caicedo', '2024-03-10'),
(12, 'santiago', 'prueba2', 'prueba2', '2024-03-10'),
(13, 'santiago', 'prueba2', 'prueba2', '2024-03-10'),
(14, 'santiago', 'prueba2', 'prueba2', '2024-03-10'),
(15, 'santiago', 'prueba2', 'prueba2', '2024-03-10'),
(17, 'santiago 211', '2222222222222222222', '22222222222', '2024-03-11');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `libro`
--
ALTER TABLE `libro`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `libro`
--
ALTER TABLE `libro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
