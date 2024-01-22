-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-01-2024 a las 21:15:29
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inmobiliaria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `motivo` varchar(50) NOT NULL,
  `lugar` varchar(50) NOT NULL,
  `id_cliente` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`id`, `fecha`, `hora`, `motivo`, `lugar`, `id_cliente`) VALUES
(1, '2023-12-07', '10:04:00', 'Explorar juntos las características excepcionales ', 'Avenida Juan Carlos 4', 10),
(2, '2023-10-07', '12:05:00', 'Cita para Descubrir tu Nuevo Hogar', 'Avenida Juan Carlos 4', 9),
(3, '2023-12-16', '13:05:00', 'Invitación Personalizada: Descubre tu Futuro', '456 Avenida Serenidad', 11),
(4, '2023-12-02', '12:06:00', 'Encuentro para Descubrir tu Rincón Perfecto', '789 Calle Encanto', 12),
(5, '2023-12-13', '03:45:00', 'Tu Futuro Comienza', '01 Paseo Tranquilo', 11),
(6, '2023-11-11', '13:10:00', 'Descubre la Elegancia', '222 Avenida Exclusiva', 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `direccion` varchar(30) NOT NULL,
  `telefono1` varchar(12) NOT NULL,
  `telefono2` varchar(12) DEFAULT NULL,
  `nombre_usuario` varchar(30) NOT NULL,
  `pass` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `apellidos`, `direccion`, `telefono1`, `telefono2`, `nombre_usuario`, `pass`) VALUES
(0, '', '', '', '', '', 'admin', 'c3284d0f94606de1fd2af172aba15bf3'),
(7, 'Juan', 'Martínez López', 'Calle Gran Vía, 123', '612345678', '678901234', '', ''),
(8, 'Manuel', 'Fernández Pérez', 'Plaza del Sol, 789', '687890123', '679012345', '', ''),
(9, 'David', 'Sánchez Martín', 'Paseo de la Castellana, 210', '645678901', '654321098', '', ''),
(10, 'María', 'Pérez González', 'Calle Real, 567', '678901234', '678901234', '', ''),
(11, 'Javier', 'López Hernández', 'Avenida de la Libertad, 876', '687890123', '', '', ''),
(12, 'Marta', 'Gómez Rodríguez', 'Callejón de los Sueños, 543', '679012345', '', '', ''),
(13, 'Carlos', 'Martínez Pérez', 'Ronda de la Luna, 987', '612345678', '679012345', '', ''),
(14, 'Isabel', 'Ruiz Sánchez', 'Callejón Sin Salida, 234', '654321098', '612345678', '', ''),
(23, 'David', 'De la Marta Núñez', 'Calle Mano de Hierro 9 4º izqu', '635637791', '', 'Daviddsk', '34087ab649f7e759e1ad2df99c0b72fc');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inmuebles`
--

CREATE TABLE `inmuebles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `direccion` varchar(30) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `precio` float(9,2) NOT NULL,
  `imagen` varchar(50) NOT NULL,
  `id_cliente` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `inmuebles`
--

INSERT INTO `inmuebles` (`id`, `direccion`, `descripcion`, `precio`, `imagen`, `id_cliente`) VALUES
(1, 'Plaza del Sol, 789', 'Lujoso inmueble en plena plaza del sol con muchas comodidades', 1000000.00, 'casa.jpg', NULL),
(2, 'Calle Robles, 101', 'Bienvenido a esta exclusiva residencia que combina a la perfección el lujo contemporáneo con un dise', 8000000.00, 'foto.jpg.jpg', 7),
(3, 'Paseo de la Playa, 210', 'Título: Encantadora Casa Familiar con Encanto Histórico  Descripción: Sumérgete en la historia y el ', 10000000.00, 'pexels-binyamin-mellish-106399.jpg', NULL),
(4, 'Avenida Principal, 456', 'Descubre el encanto de lo histórico y lo moderno en esta casa única. Ubicada en un vecindario arbola', 1000000.00, 'pexels-binyamin-mellish-186077.jpg', 8),
(5, 'Avenida del Parque, 456', 'Este elegante apartamento ofrece un estilo de vida moderno con un toque de lujo. Con impresionantes ', 5000000.00, 'pexels-pixabay-164558.jpg', 23);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titular` varchar(20) NOT NULL,
  `contenido` text NOT NULL,
  `imagen` varchar(50) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`id`, `titular`, `contenido`, `imagen`, `fecha`) VALUES
(5, 'Nuevo proyecto resid', 'Te presentamos nuestro último proyecto residencial en Granada, una fusión perfecta de exclusividad y confort. Descubre viviendas diseñadas con elegancia y atención al detalle, ubicadas estratégicamente en el corazón de esta ciudad andaluza. Desde modernos apartamentos con vistas panorámicas hasta acogedores estudios, cada residencia ofrece un espacio que refleja calidad y estilo de vida contemporáneo. El proyecto incorpora comodidades modernas, zonas verdes y una arquitectura distintiva que armoniza con el entorno histórico. Conviértete en parte de esta experiencia única y descubre la combinación perfecta de exclusividad y confort en el corazón de Granada.', 'baratos-1.jpg.optimal.jpg.jpg', '2023-12-12'),
(6, 'Viviendas sostenible', 'Te presentamos nuestro último proyecto residencial en Granada, una fusión perfecta de exclusividad y confort. Descubre viviendas diseñadas con elegancia y atención al detalle, ubicadas estratégicamente en el corazón de esta ciudad andaluza.', 'bueno.jpg', '2023-12-16'),
(7, 'Lujo andaluz: Propie', 'Experimenta el verdadero lujo andaluz con nuestras propiedades exclusivas en Granada. Desde majestuosas villas con jardines exuberantes hasta elegantes pisos con vistas panorámicas, estas residencias ofrecen un estilo de vida excepcional en una de las ciudades más cautivadoras de España. Cada propiedad refleja la elegancia y el lujo, fusionando el encanto andaluz con comodidades modernas. Descubre la excelencia en cada detalle, desde acabados de alta gama hasta servicios personalizados. Si buscas un hogar que trascienda las expectativas, nuestras propiedades exclusivas en Granada te ofrecen una vida llena de opulencia y distinción.', 'pexels-binyamin-mellish-186077.jpg', '2023-08-31'),
(8, 'Viviendas con encant', 'Sumérgete en la auténtica esencia andaluza con nuestras exclusivas propiedades en Granada. Desde casas tradicionales con patios llenos de flores hasta modernos pisos que capturan la esencia del estilo de vida único de la región. Cada propiedad que ofrecemos cuenta una historia de tradición y modernidad, fusionando la arquitectura andaluza con las comodidades contemporáneas. En la ciudad de Granada, donde la historia se mezcla con la vida moderna, nuestras viviendas reflejan la riqueza cultural y la calidez de este rincón del sur de España. Descubre la autenticidad en cada rincón de tu nuevo hogar y deja que la esencia de Granada se convierta en parte de tu vida diaria.', 'pexels-expect-best-323780.jpg', '2023-11-10'),
(9, 'Granada, una joya en', 'En el pintoresco escenario de Granada, te ofrecemos un abanico de oportunidades únicas en el mercado inmobiliario. Desde encantadores apartamentos con vistas a la Alhambra hasta modernas residencias en el corazón del Albayzín, nuestra inmobiliaria está comprometida en ayudarte a encontrar el hogar de tus sueños. Con más de dos décadas de experiencia, conocemos cada rincón de esta ciudad andaluza y hemos seleccionado cuidadosamente propiedades que reflejan la esencia de Granada. Descubre la fusión entre la rica historia de la ciudad y las comodidades modernas en cada rincón de nuestros listados. Ya sea que busques la tranquilidad de la Vega de Granada o la vitalidad del centro histórico, estamos aquí para convertir tus sueños inmobiliarios en realidad. ¡Explora con nosotros y encuentra tu lugar en esta joya del sur de España!', 'pexels-fomstock-com-1115804.jpg', '2023-12-01'),
(10, 'Inversiones intelige', 'Granada no solo es un lugar encantador para vivir, sino también una oportunidad de inversión excepcional. Nuestra inmobiliaria te presenta un análisis del mercado en constante crecimiento en esta ciudad andaluza. Desde apartamentos en el animado centro hasta encantadoras casas en los suburbios, hay opciones para todos los inversores. Descubre cómo el mercado inmobiliario de Granada ofrece rendimientos sólidos y crecimiento a largo plazo. Con un equipo de expertos en el mercado local, estamos aquí para guiarte en cada paso de tu viaje de inversión. ¡Aprovecha el auge del mercado inmobiliario en Granada y haz inversiones inteligentes que perduren!', 'pexels-pixabay-280229.jpg', '2023-10-06');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `fk_cit_cli` (`id_cliente`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indices de la tabla `inmuebles`
--
ALTER TABLE `inmuebles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `fk_inm_cli` (`id_cliente`);

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `inmuebles`
--
ALTER TABLE `inmuebles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `fk_cit_cli` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `inmuebles`
--
ALTER TABLE `inmuebles`
  ADD CONSTRAINT `fk_inm_cli` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
