-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-08-2020 a las 21:45:39
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pvd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `item` int(11) NOT NULL,
  `id_admin` varchar(15) NOT NULL,
  `nombre_admin` varchar(50) NOT NULL,
  `apellido_admin` varchar(50) NOT NULL,
  `telefono_admin` varchar(20) NOT NULL,
  `contrasena` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`item`, `id_admin`, `nombre_admin`, `apellido_admin`, `telefono_admin`, `contrasena`) VALUES
(1, '1092352752', 'JONATHAN DAVID', 'VILLAMIZAR MARIÑO', '3157162159', 'digital20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `computador`
--

CREATE TABLE `computador` (
  `num_compu` int(5) NOT NULL,
  `estado` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `computador`
--

INSERT INTO `computador` (`num_compu`, `estado`) VALUES
(1, 'LIBRE'),
(2, 'OCUPADO'),
(3, 'LIBRE'),
(4, 'LIBRE'),
(5, 'LIBRE'),
(6, 'LIBRE'),
(7, 'LIBRE'),
(8, 'LIBRE'),
(9, 'LIBRE'),
(10, 'LIBRE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `item` int(15) NOT NULL,
  `id_usuario` varchar(15) NOT NULL,
  `nombre_usuario` varchar(50) NOT NULL,
  `apellido_usuario` varchar(50) NOT NULL,
  `telefono_usuario` varchar(20) NOT NULL,
  `direccion_usuario` varchar(50) NOT NULL,
  `rango_edad` varchar(30) NOT NULL,
  `discapacidad` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`item`, `id_usuario`, `nombre_usuario`, `apellido_usuario`, `telefono_usuario`, `direccion_usuario`, `rango_edad`, `discapacidad`) VALUES
(1, '1234567', 'DIEGO ESTEFANO', 'CAÑAS', '312431563', 'CALLE 4 56-74 BELLAVISTA', 'ADOLESCENCIA(12-18)', 'NO'),
(2, '1654156', 'LINA ANDREA', 'VERA', '65456454', 'KRA 12 23-21 SANTANDER', 'JUVENTUD(14-26)', 'NO'),
(3, '3213545', 'JOHANA ', 'GOMEZ SALDARRIAGA', '5713598', 'CALLE 3 11-20 SAN GREGORIO', 'ADULTO(27-59)', 'NO'),
(4, '321654', 'MARCOS ANDRES', 'VASQUEZ LOPERA', '16544645645', 'CARRERA 7 89-98 SANTANDER', 'INFANCIA(6-11)', 'NO'),
(5, '6546544', 'LUIS RODOLFO', 'MARIÑO', '5454544', 'CALLE 1 1-124 SANTANDER', 'JUVENTUD(14-26)', 'NO'),
(6, '9876543', 'DIANA CAROLINA', 'CHACON MARQUEZ', '96661564548', 'MZN 4 78-54 LA PARADA', 'ADULTO MAYOR(60 Ó MAS )', 'SI');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `item` (`item`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `item_usuario` (`item`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admin`
--
ALTER TABLE `admin`
  MODIFY `item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `item` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
