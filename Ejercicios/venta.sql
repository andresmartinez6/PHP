

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `nif` varchar(9) NOT NULL,
  `nombre` varchar(15) NOT NULL,
  `edad` int(2) DEFAULT NULL,
  `usuario` varchar(10) DEFAULT NULL,
  `pass` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`nif`, `nombre`, `edad`, `usuario`, `pass`) VALUES
('11111111E', 'Andrés', 28, 'andres', 'andres'),
('22222222D', 'Julia', 31, 'julia', 'julia'),
('33333333V', 'Alejandro', 27, 'alex', 'alex'),
('44444444Z', 'Iria', 35, 'iria', 'iria'),
('55555555U', 'Paula', 29, 'paula', 'paula'),
('66666666K', 'Rogelio', 35, 'roge', 'roge'),
('77777777X', 'Héctor', 25, 'hector', 'hector'),
('88888888F', 'Luis', 25, 'luis', 'luis'),
('99999999R', 'Carmen', 25, 'carmen', 'carmen');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `cod` int(2) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `precio` double(4,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`cod`, `descripcion`, `precio`) VALUES
(1, 'Chocolate', 0.25),
(2, 'Azúcar', 1.50),
(3, 'Harina', 1.25),
(4, 'Colorante', 1.50),
(5, 'Molde 1', 15.25),
(6, 'Obleas', 0.35),
(7, 'Levadura', 0.75),
(8, 'Molde 2', 13.50),
(9, 'Sacarina', 1.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `cliente` varchar(9) NOT NULL,
  `producto` int(2) NOT NULL,
  `fecha` date NOT NULL,
  `cantidad` double(4,2) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`cliente`, `producto`, `fecha`, `cantidad`, `estado`) VALUES
('11111111E', 1, '2023-04-20', 0.20, 'p'),
('11111111E', 1, '2023-04-22', 1.20, 'p'),
('11111111E', 1, '2023-04-26', 2.00, NULL),
('11111111E', 2, '2023-04-24', 1.00, NULL),
('11111111E', 3, '2023-04-20', 5.00, NULL),
('11111111E', 4, '2023-04-24', 0.25, NULL),
('11111111E', 5, '2023-04-25', 1.00, 'p'),
('11111111E', 6, '2023-04-21', 12.00, NULL),
('11111111E', 8, '2023-04-22', 2.00, NULL),
('22222222D', 2, '2023-04-20', 1.00, 'p'),
('22222222D', 2, '2023-04-23', 1.00, 'p'),
('22222222D', 5, '2023-04-21', 1.00, 'p'),
('22222222D', 6, '2023-04-25', 21.00, 'p'),
('22222222D', 7, '2023-04-22', 0.15, 'p'),
('33333333V', 1, '2023-04-27', 1.30, 'p'),
('33333333V', 2, '2023-04-20', 2.00, NULL),
('33333333V', 2, '2023-04-22', 2.00, 'p'),
('33333333V', 2, '2023-04-24', 1.00, NULL),
('33333333V', 4, '2023-04-21', 0.25, 'p'),
('33333333V', 6, '2023-04-21', 10.00, NULL),
('33333333V', 6, '2023-04-23', 10.00, NULL),
('33333333V', 6, '2023-04-26', 19.00, 'p'),
('33333333V', 7, '2023-04-26', 0.55, 'p'),
('44444444Z', 2, '2023-04-21', 1.00, 'p'),
('44444444Z', 2, '2023-04-22', 1.00, 'p'),
('44444444Z', 4, '2023-04-27', 0.35, 'p'),
('44444444Z', 5, '2023-04-24', 1.00, 'p'),
('44444444Z', 5, '2023-04-26', 1.00, 'p'),
('44444444Z', 7, '2023-04-24', 0.35, 'p'),
('55555555U', 3, '2023-04-21', 3.50, 'p'),
('55555555U', 6, '2023-04-22', 15.00, 'p'),
('66666666K', 1, '2023-04-24', 1.50, 'p'),
('66666666K', 4, '2023-04-23', 0.75, 'p'),
('66666666K', 7, '2023-04-25', 0.50, 'p'),
('88888888F', 1, '2023-04-27', 1.10, 'p'),
('88888888F', 4, '2023-04-26', 0.25, 'p'),
('88888888F', 8, '2023-04-25', 1.00, NULL),
('99999999R', 2, '2023-04-26', 1.00, 'p'),
('99999999R', 5, '2023-04-26', 1.00, NULL),
('99999999R', 9, '2023-04-25', 0.75, 'p');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`nif`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`cod`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`cliente`,`producto`,`fecha`),
  ADD KEY `fk_ven_pro` (`producto`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `fk_ven_cli` FOREIGN KEY (`cliente`) REFERENCES `cliente` (`nif`),
  ADD CONSTRAINT `fk_ven_pro` FOREIGN KEY (`producto`) REFERENCES `producto` (`cod`);
