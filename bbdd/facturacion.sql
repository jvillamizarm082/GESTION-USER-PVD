-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-10-2018 a las 00:51:58
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `facturacion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nombre` varchar(120) NOT NULL,
  `descripcion` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `nombre`, `descripcion`) VALUES
(1, 'Bebidas', '(Gaseosas, jugos, agua en bolsa, agua en botella)'),
(2, 'Empaquetados', '(Doritos, papas, Detoditos, Cheetos)'),
(3, 'Lacteos', 'Lacteos'),
(4, 'Enlatados', 'Enlatados');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `codigo` double NOT NULL,
  `nombre` varchar(120) NOT NULL,
  `apellido` varchar(120) NOT NULL,
  `telefono` double NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`codigo`, `nombre`, `apellido`, `telefono`, `email`) VALUES
(12348765, 'Alberto', 'Pereira', 345352121, 'Alberto@gmail.com'),
(60325344, 'Andres', 'Arias', 3115956654, 'asdasda'),
(88226017, 'Gregorio Antonio', 'Suarez Vera', 320546789, 'gregorio@gmail.com'),
(99226045, 'Betty', 'Vera', 3225685845, 'Betty@gmail.com'),
(99226254, 'Luz Stella', 'Arias Herrera', 3157424705, 'stella@gmail.com'),
(100489325, 'Ronald David', 'Amaya Arias', 3165489785, 'Ronald@gmail.com'),
(108954621, 'Blanca', 'OrdoÃ±ez', 5874125, 'Blanca@gmail.com'),
(457896321, 'Pedro', 'Blanco', 3222654788, 'asdasd'),
(603245687, 'Cristina', 'Sarmiento', 5874125, 'Cristina@gmail.com'),
(995821475, 'Esteban', 'Pabon', 322569854, 'esteban@gmail.com'),
(1004896944, 'Heilyn Fabiola', 'Perez Rosas', 3165427896, 'FabiolaP@gmail.com'),
(1004996944, 'Mario', 'Mojica', 3115956654, 'asdasdas'),
(1005052514, 'Karla vanesa', 'Velasquez Sanabria', 31456212, 'karla@gmail.com'),
(1005654781, 'William', 'Castellanos', 5874125, 'William@gmail.com'),
(1090223564, 'Sharity', 'Sanabria Arias', 3165187421, 'sharity@gmail.com'),
(1090658451, 'Claudia', 'Sarmiento', 356647851, 'Claudia@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle`
--

CREATE TABLE `detalle` (
  `num_detalle` double NOT NULL,
  `id_factura` double NOT NULL,
  `id_producto` double NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalle`
--

INSERT INTO `detalle` (`num_detalle`, `id_factura`, `id_producto`, `cantidad`, `precio`) VALUES
(1, 1, 1, 2, '40.000'),
(2, 1, 1, 2, '40.000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `num_factura` double NOT NULL,
  `id_cliente` double NOT NULL,
  `fecha` date NOT NULL,
  `num_pago` double NOT NULL,
  `id_vendedor` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`num_factura`, `id_cliente`, `fecha`, `num_pago`, `id_vendedor`) VALUES
(1, 88226017, '2018-10-29', 1, 60325344),
(2, 12348765, '2018-10-20', 1, 60325344);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modo_pago`
--

CREATE TABLE `modo_pago` (
  `num_pago` double NOT NULL,
  `nombre` varchar(120) NOT NULL,
  `otros_detalles` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `modo_pago`
--

INSERT INTO `modo_pago` (`num_pago`, `nombre`, `otros_detalles`) VALUES
(1, 'Contado', ''),
(2, 'Credito', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` double NOT NULL,
  `nombre` varchar(120) NOT NULL,
  `precio` varchar(120) NOT NULL,
  `stock` int(120) NOT NULL,
  `categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `nombre`, `precio`, `stock`, `categoria`) VALUES
(1, 'Doritos', '2000', 12, 2),
(2, 'Gaseosa Postobon', '2500', 24, 1),
(3, 'Gaterode', '2500', 20, 1),
(4, 'Papas Margaritas', '1200', 24, 2),
(5, 'Detodito', '2000', 30, 2),
(6, 'Detodito Grande', '4000', 30, 2),
(7, 'Leche Deslactosada 1Lt', '2600', 20, 3),
(8, 'Leche entera 1Lt', '2300', 20, 3),
(9, 'Choclitos', '1000', 30, 2),
(10, 'Pringles', '6000', 10, 2),
(11, 'Atun Enlatado', '1300', 20, 4),
(12, 'Sardinas', '1600', 18, 4),
(13, 'Cheetos', '1000', 24, 2),
(14, 'Boliqueso', '1200', 24, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vendedor`
--

CREATE TABLE `vendedor` (
  `id_vendedor` double NOT NULL,
  `nombre` varchar(120) NOT NULL,
  `apellido` varchar(120) NOT NULL,
  `direccion` varchar(120) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `telefono` double NOT NULL,
  `email` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vendedor`
--

INSERT INTO `vendedor` (`id_vendedor`, `nombre`, `apellido`, `direccion`, `fecha_nacimiento`, `telefono`, `email`) VALUES
(60325344, 'Cesar', 'Bolado', '', '0000-00-00', 3162218072, 'cesarbolado@gmail.com'),
(1004996944, 'Mario', 'Mojica', 'Cll 29', '2018-10-02', 3115956654, 'mamojica44@misena.edu.co'),
(1004996945, 'Andres', 'Arias', 'Cll 29', '2018-10-02', 3115956654, 'andresarias140@gmail.com'),
(1090494180, 'Astrid', 'Medina', 'Aeropuerto', '1996-01-26', 3202170116, 'Astridmedina27@gmail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `detalle`
--
ALTER TABLE `detalle`
  ADD PRIMARY KEY (`num_detalle`),
  ADD KEY `num_factura` (`id_factura`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`num_factura`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `num_pago` (`num_pago`),
  ADD KEY `id_vendedor` (`id_vendedor`);

--
-- Indices de la tabla `modo_pago`
--
ALTER TABLE `modo_pago`
  ADD PRIMARY KEY (`num_pago`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `categoria` (`categoria`);

--
-- Indices de la tabla `vendedor`
--
ALTER TABLE `vendedor`
  ADD PRIMARY KEY (`id_vendedor`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle`
--
ALTER TABLE `detalle`
  ADD CONSTRAINT `detalle_ibfk_1` FOREIGN KEY (`id_factura`) REFERENCES `factura` (`num_factura`),
  ADD CONSTRAINT `detalle_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`);

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `factura_ibfk_2` FOREIGN KEY (`id_vendedor`) REFERENCES `vendedor` (`id_vendedor`),
  ADD CONSTRAINT `factura_ibfk_3` FOREIGN KEY (`num_pago`) REFERENCES `modo_pago` (`num_pago`),
  ADD CONSTRAINT `factura_ibfk_4` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`codigo`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`categoria`) REFERENCES `categoria` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
