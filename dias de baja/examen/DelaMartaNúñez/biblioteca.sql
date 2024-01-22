-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-11-2023 a las 13:15:10
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `biblioteca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `codigo` int(2) NOT NULL,
  `titulo` varchar(20) NOT NULL,
  `autor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`codigo`, `titulo`, `autor`) VALUES
(1, 'Libro 1', 'Autor 1'),
(2, 'Libro 2', 'Autor 3'),
(3, 'Libro 3', 'Autor 2'),
(4, 'Libro 4', 'Autor 3'),
(5, 'Libro 5', 'Autor 2'),
(6, 'Libro 6', 'Autor 2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamos`
--

CREATE TABLE `prestamos` (
  `cod_socio` int(2) NOT NULL,
  `cod_libro` int(2) NOT NULL,
  `fecha_retirada` date NOT NULL,
  `fecha_devolucion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `prestamos`
--

INSERT INTO `prestamos` (`cod_socio`, `cod_libro`, `fecha_retirada`, `fecha_devolucion`) VALUES
(1, 1, '2023-11-04', '2023-11-05'),
(1, 3, '2023-11-19', NULL),
(1, 4, '2023-11-12', '2023-11-21'),
(1, 6, '2023-11-27', NULL),
(2, 3, '2023-11-07', '2023-11-10'),
(2, 5, '2023-11-18', '2023-11-28'),
(3, 1, '2023-11-12', NULL),
(3, 4, '2023-11-25', '2023-11-28'),
(4, 4, '2023-11-15', '2023-11-22'),
(4, 6, '2023-11-24', '2023-11-27'),
(5, 3, '2023-11-26', '2023-11-27'),
(5, 6, '2023-11-29', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `socios`
--

CREATE TABLE `socios` (
  `codigo` int(2) NOT NULL,
  `nombre` varchar(20) CHARACTER SET utf8 NOT NULL,
  `telefono` varchar(9) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `socios`
--

INSERT INTO `socios` (`codigo`, `nombre`, `telefono`) VALUES
(1, 'Ramón Torres', '111111111'),
(2, 'María López', '222222222'),
(3, 'Paloma Ruiz', '333333333'),
(4, 'Isabel Perea', '444444444'),
(5, 'Luisa Mar', '555555555'),
(6, 'Pedro Macías', '666666666'),
(7, 'Teresa Vílchez', '777777777'),
(8, 'Ricardo Mu', '888888888'),
(9, 'Muriel Mina', '999999999');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `prestamos`
--
ALTER TABLE `prestamos`
  ADD PRIMARY KEY (`cod_socio`,`cod_libro`,`fecha_retirada`),
  ADD KEY `cod_producto` (`cod_libro`);

--
-- Indices de la tabla `socios`
--
ALTER TABLE `socios`
  ADD PRIMARY KEY (`codigo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
