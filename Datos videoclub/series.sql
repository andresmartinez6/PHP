-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-02-2022 a las 22:02:56
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `series`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `socio` bigint(20) UNSIGNED NOT NULL,
  `serie` bigint(20) UNSIGNED NOT NULL,
  `fecha` date NOT NULL,
  `texto` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comentario`
--

INSERT INTO `comentario` (`socio`, `serie`, `fecha`, `texto`) VALUES
(5, 2, '2022-02-20', 'Que la fuerza te acompañe!'),
(5, 3, '2022-02-20', 'Increible Película !!'),
(5, 5, '2022-02-20', 'Esta serie siempre sorprende...'),
(6, 2, '2022-02-20', 'Mi saga fav'),
(6, 5, '2022-02-20', 'Demasiado amarillos...');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lanzamientos`
--

CREATE TABLE `lanzamientos` (
  `serie` bigint(20) UNSIGNED NOT NULL,
  `plataforma` bigint(20) UNSIGNED NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `lanzamientos`
--

INSERT INTO `lanzamientos` (`serie`, `plataforma`, `fecha`) VALUES
(1, 1, '2022-01-28'),
(1, 3, '2022-01-22'),
(2, 1, '2021-12-23'),
(2, 2, '2022-01-25'),
(2, 3, '2022-02-16'),
(3, 1, '2022-02-09'),
(3, 2, '2022-01-19'),
(4, 3, '2022-02-01'),
(5, 1, '2022-02-16'),
(5, 2, '2022-03-15'),
(5, 3, '2021-12-17'),
(6, 2, '2021-12-21'),
(6, 3, '2022-02-10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plataformas`
--

CREATE TABLE `plataformas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(55) NOT NULL,
  `activo` set('0','1') NOT NULL,
  `logotipo` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `plataformas`
--

INSERT INTO `plataformas` (`id`, `nombre`, `activo`, `logotipo`) VALUES
(1, 'Netflix', '1', '1.jpg'),
(2, 'HBO', '1', '2.png'),
(3, 'Disney +', '1', '3.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `series`
--

CREATE TABLE `series` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(1000) NOT NULL,
  `foto` varchar(55) NOT NULL,
  `activo` set('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `series`
--

INSERT INTO `series` (`id`, `nombre`, `descripcion`, `foto`, `activo`) VALUES
(1, 'Canta 2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras vestibulum suscipit enim ut pharetra. Donec tincidunt mollis vulputate. Pellentesque lobortis interdum scelerisque. Nulla varius ex non lectus hendrerit, eget ornare massa vulputate. Nulla convallis, nibh vitae sagittis condimentum, justo nulla aliquam purus, non tincidunt turpis augue sed ex. In vel turpis et sapien feugiat consequat eu et erat. Nunc quis mi vel enim consectetur rhoncus a in neque. Sed pretium eget tortor at finibus. Fusce congue tellus ac nisl imperdiet, eu ullamcorper velit dapibus. Nulla rutrum sem et pellentesque cursus. Nunc tristique, justo nec sagittis iaculis, metus libero molestie arcu, sit amet aliquam eros enim vitae sem. Maecenas vitae iaculis nulla. Quisque eu lorem nec ligula faucibus venenatis vitae in felis.\r\n\r\nSuspendisse potenti. Morbi eu tellus eu tortor aliquam accumsan vel quis est. Nulla facilisi. Aenean quis hendrerit massa, a tristique felis. Nullam ut urna eu justo vulputate malesua', '1.jpg', '1'),
(2, 'Star Wars', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras vestibulum suscipit enim ut pharetra. Donec tincidunt mollis vulputate. Pellentesque lobortis interdum scelerisque. Nulla varius ex non lectus hendrerit, eget ornare massa vulputate. Nulla convallis, nibh vitae sagittis condimentum, justo nulla aliquam purus, non tincidunt turpis augue sed ex. In vel turpis et sapien feugiat consequat eu et erat. Nunc quis mi vel enim consectetur rhoncus a in neque. Sed pretium eget tortor at finibus. Fusce congue tellus ac nisl imperdiet, eu ullamcorper velit dapibus. Nulla rutrum sem et pellentesque cursus. Nunc tristique, justo nec sagittis iaculis, metus libero molestie arcu, sit amet aliquam eros enim vitae sem. Maecenas vitae iaculis nulla. Quisque eu lorem nec ligula faucibus venenatis vitae in felis.\r\n\r\nSuspendisse potenti. Morbi eu tellus eu tortor aliquam accumsan vel quis est. Nulla facilisi. Aenean quis hendrerit massa, a tristique felis. Nullam ut urna eu justo vulputate malesua', '2.jpg', '1'),
(3, 'Al filo del mañana', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras vestibulum suscipit enim ut pharetra. Donec tincidunt mollis vulputate. Pellentesque lobortis interdum scelerisque. Nulla varius ex non lectus hendrerit, eget ornare massa vulputate. Nulla convallis, nibh vitae sagittis condimentum, justo nulla aliquam purus, non tincidunt turpis augue sed ex. In vel turpis et sapien feugiat consequat eu et erat. Nunc quis mi vel enim consectetur rhoncus a in neque. Sed pretium eget tortor at finibus. Fusce congue tellus ac nisl imperdiet, eu ullamcorper velit dapibus. Nulla rutrum sem et pellentesque cursus. Nunc tristique, justo nec sagittis iaculis, metus libero molestie arcu, sit amet aliquam eros enim vitae sem. Maecenas vitae iaculis nulla. Quisque eu lorem nec ligula faucibus venenatis vitae in felis.\r\n\r\nSuspendisse potenti. Morbi eu tellus eu tortor aliquam accumsan vel quis est. Nulla facilisi. Aenean quis hendrerit massa, a tristique felis. Nullam ut urna eu justo vulputate malesua', '3.jpg', '1'),
(4, 'Juego de Tronos', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras vestibulum suscipit enim ut pharetra. Donec tincidunt mollis vulputate. Pellentesque lobortis interdum scelerisque. Nulla varius ex non lectus hendrerit, eget ornare massa vulputate. Nulla convallis, nibh vitae sagittis condimentum, justo nulla aliquam purus, non tincidunt turpis augue sed ex. In vel turpis et sapien feugiat consequat eu et erat. Nunc quis mi vel enim consectetur rhoncus a in neque. Sed pretium eget tortor at finibus. Fusce congue tellus ac nisl imperdiet, eu ullamcorper velit dapibus. Nulla rutrum sem et pellentesque cursus. Nunc tristique, justo nec sagittis iaculis, metus libero molestie arcu, sit amet aliquam eros enim vitae sem. Maecenas vitae iaculis nulla. Quisque eu lorem nec ligula faucibus venenatis vitae in felis.\r\n\r\nSuspendisse potenti. Morbi eu tellus eu tortor aliquam accumsan vel quis est. Nulla facilisi. Aenean quis hendrerit massa, a tristique felis. Nullam ut urna eu justo vulputate malesua', '4.jpg', '1'),
(5, 'Los Simpsons', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras vestibulum suscipit enim ut pharetra. Donec tincidunt mollis vulputate. Pellentesque lobortis interdum scelerisque. Nulla varius ex non lectus hendrerit, eget ornare massa vulputate. Nulla convallis, nibh vitae sagittis condimentum, justo nulla aliquam purus, non tincidunt turpis augue sed ex. In vel turpis et sapien feugiat consequat eu et erat. Nunc quis mi vel enim consectetur rhoncus a in neque. Sed pretium eget tortor at finibus. Fusce congue tellus ac nisl imperdiet, eu ullamcorper velit dapibus. Nulla rutrum sem et pellentesque cursus. Nunc tristique, justo nec sagittis iaculis, metus libero molestie arcu, sit amet aliquam eros enim vitae sem. Maecenas vitae iaculis nulla. Quisque eu lorem nec ligula faucibus venenatis vitae in felis.\r\n\r\nSuspendisse potenti. Morbi eu tellus eu tortor aliquam accumsan vel quis est. Nulla facilisi. Aenean quis hendrerit massa, a tristique felis. Nullam ut urna eu justo vulputate malesua', '5.jpg', '1'),
(6, 'Vikingos', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras vestibulum suscipit enim ut pharetra. Donec tincidunt mollis vulputate. Pellentesque lobortis interdum scelerisque. Nulla varius ex non lectus hendrerit, eget ornare massa vulputate. Nulla convallis, nibh vitae sagittis condimentum, justo nulla aliquam purus, non tincidunt turpis augue sed ex. In vel turpis et sapien feugiat consequat eu et erat. Nunc quis mi vel enim consectetur rhoncus a in neque. Sed pretium eget tortor at finibus. Fusce congue tellus ac nisl imperdiet, eu ullamcorper velit dapibus. Nulla rutrum sem et pellentesque cursus. Nunc tristique, justo nec sagittis iaculis, metus libero molestie arcu, sit amet aliquam eros enim vitae sem. Maecenas vitae iaculis nulla. Quisque eu lorem nec ligula faucibus venenatis vitae in felis.\r\n\r\nSuspendisse potenti. Morbi eu tellus eu tortor aliquam accumsan vel quis est. Nulla facilisi. Aenean quis hendrerit massa, a tristique felis. Nullam ut urna eu justo vulputate malesua', '6.jpg', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `socios`
--

CREATE TABLE `socios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(55) NOT NULL,
  `nick` varchar(55) NOT NULL,
  `pass` varchar(32) NOT NULL,
  `activo` set('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `socios`
--

INSERT INTO `socios` (`id`, `nombre`, `nick`, `pass`, `activo`) VALUES
(0, 'Administrador', 'admin', '67f43efc5701784db1504e4993d7e393', '1'),
(5, 'Esteban', 'shame', '041ad97a76bbcb1ded1c022579dd130d', '1'),
(6, 'David', 'david', 'cd814a6d704446565a6bd346ff6b9d47', '1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`socio`,`serie`),
  ADD KEY `ce_coment_serie` (`serie`);

--
-- Indices de la tabla `lanzamientos`
--
ALTER TABLE `lanzamientos`
  ADD PRIMARY KEY (`serie`,`plataforma`),
  ADD KEY `ce_lanz_plataf` (`plataforma`);

--
-- Indices de la tabla `plataformas`
--
ALTER TABLE `plataformas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indices de la tabla `series`
--
ALTER TABLE `series`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indices de la tabla `socios`
--
ALTER TABLE `socios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `plataformas`
--
ALTER TABLE `plataformas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `series`
--
ALTER TABLE `series`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `socios`
--
ALTER TABLE `socios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `ce_coment_serie` FOREIGN KEY (`serie`) REFERENCES `series` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ce_coment_socios` FOREIGN KEY (`socio`) REFERENCES `socios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `lanzamientos`
--
ALTER TABLE `lanzamientos`
  ADD CONSTRAINT `ce_lanz_plataf` FOREIGN KEY (`plataforma`) REFERENCES `plataformas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ce_lanz_series` FOREIGN KEY (`serie`) REFERENCES `series` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
