-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-06-2022 a las 01:01:52
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_correadaniela`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoría` int(11) NOT NULL,
  `nombre` varchar(30) CHARACTER SET utf8mb4 NOT NULL,
  `activo` int(11) NOT NULL DEFAULT 1,
  `fecha_alta` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fecha_modifica` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoría`, `nombre`, `activo`, `fecha_alta`, `fecha_modifica`) VALUES
(1, 'Decoración', 1, '2022-05-24 13:48:44', NULL),
(2, 'Bazar', 1, '2022-05-24 13:48:44', NULL),
(3, 'Set Matero', 1, '2022-06-19 22:02:11', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consulta`
--

CREATE TABLE `consulta` (
  `id_consulta` smallint(3) NOT NULL,
  `nombre` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `apellido` varchar(30) CHARACTER SET utf8mb4 NOT NULL,
  `email` varchar(30) CHARACTER SET utf8mb4 NOT NULL,
  `motivo` varchar(30) CHARACTER SET utf8mb4 NOT NULL,
  `texto_consulta` text CHARACTER SET utf8mb4 NOT NULL,
  `activo` int(11) NOT NULL DEFAULT 1,
  `id_perfil` int(2) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `consulta`
--

INSERT INTO `consulta` (`id_consulta`, `nombre`, `apellido`, `email`, `motivo`, `texto_consulta`, `activo`, `id_perfil`, `fecha`) VALUES
(20, 'Mar', 'C', 'marc@gmail.com', 'consulta', 'f', 0, 3, '2022-06-19 00:03:18'),
(25, 'Maria', 'M', 'mari@gmail.com', 'Saludo', 'Hola', 0, 3, '2022-06-19 00:03:20'),
(27, 'Gabriel', 'Fernandez', 'gabF@gmail.com', 'Consulta Mates Rolan', 'Buenas tardes, vi en sus redes sociales que venden los Mates Rolan, pero no los encontré en a página. Me gustaría saber cuándo van a estar disponibles nuevamente. Gracias.', 1, 3, '2022-06-19 17:52:48'),
(29, 'Maria', 'Dominguez', 'MarDominguez@gmail.com', 'Agradecimiento', 'Ya me llegaron los productos que compré la semana pasada, llegaron en perfecto estado, estoy muy conforme con la calidad. Muchas gracias.', 1, 3, '2022-06-19 05:07:28'),
(30, 'Damaris', 'Encina', 'dam123@gmail.com', 'Envío', 'Hola, me gustaría saber cuánto tiempo más o menos tardan en despechar los pedidos. Desde ya muchas gracias.', 1, 3, '2022-06-18 22:00:52'),
(31, 'Agustin', 'Pintos', 'pagustin@gmail.com', 'Venta por mayor', 'Hola, me gustaría saber si trabajan con ventas al por mayor y si hay algún tipo de descuento para revendedores. Graciasss', 1, 3, '2022-06-18 22:02:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_venta`
--

CREATE TABLE `detalle_venta` (
  `id_detVenta` int(11) NOT NULL,
  `id_venta` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `detalle_cantidad` int(11) NOT NULL,
  `detalle_precio` decimal(10,0) NOT NULL,
  `detalle_subtotal` decimal(10,2) NOT NULL,
  `activo` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `detalle_venta`
--

INSERT INTO `detalle_venta` (`id_detVenta`, `id_venta`, `id_producto`, `detalle_cantidad`, `detalle_precio`, `detalle_subtotal`, `activo`) VALUES
(10, 12, 17, 1, '230', '230.00', 1),
(11, 14, 15, 2, '90', '180.00', 1),
(12, 14, 21, 1, '450', '450.00', 1),
(17, 17, 2, 1, '1900', '1900.00', 1),
(18, 17, 16, 1, '300', '300.00', 1),
(21, 19, 25, 3, '1900', '5700.00', 1),
(22, 20, 25, 2, '1900', '3800.00', 1),
(23, 21, 26, 1, '1500', '1500.00', 1),
(24, 21, 22, 1, '250', '250.00', 1),
(25, 21, 20, 1, '800', '800.00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mediopago`
--

CREATE TABLE `mediopago` (
  `id_medioPago` int(11) NOT NULL,
  `tipo` varchar(30) NOT NULL,
  `activo` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `mediopago`
--

INSERT INTO `mediopago` (`id_medioPago`, `tipo`, `activo`) VALUES
(1, 'Efectivo', 1),
(2, 'Tarjeta de Crédito', 1),
(3, 'Tarjeta de Débito', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE `perfil` (
  `id_perfil` int(11) NOT NULL,
  `nombre` varchar(30) CHARACTER SET utf8mb4 NOT NULL,
  `activo` tinyint(4) NOT NULL DEFAULT 1,
  `fecha_alta` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fecha_modifica` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`id_perfil`, `nombre`, `activo`, `fecha_alta`, `fecha_modifica`) VALUES
(1, 'Administrador', 1, '2022-05-17 12:28:27', NULL),
(2, 'Usuario', 1, '2022-05-17 12:29:17', NULL),
(3, 'visita', 1, '2022-05-18 00:26:57', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `cod_producto` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `categoría` int(11) NOT NULL,
  `nombre` varchar(30) CHARACTER SET utf8mb4 NOT NULL,
  `stock` int(11) NOT NULL DEFAULT 1,
  `precio_unidad` decimal(10,2) NOT NULL DEFAULT 0.00,
  `disponible` int(2) NOT NULL DEFAULT 1,
  `descripcion` varchar(500) COLLATE utf8_spanish_ci DEFAULT NULL,
  `img_producto` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_alta` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fecha_modifica` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `cod_producto`, `categoría`, `nombre`, `stock`, `precio_unidad`, `disponible`, `descripcion`, `img_producto`, `fecha_alta`, `fecha_modifica`) VALUES
(1, '110123', 1, 'Mate', 150, '200.00', 0, 'Mate azul', '567876_3.png', '2022-06-18 20:46:38', '2022-06-18 18:46:38'),
(2, '12345678', 2, 'Termo', 104, '1900.00', 1, 'Termo Azul', '1655675504_767ad6a81d182b664e0d.png.png', '2022-06-19 21:51:44', '2022-06-19 19:51:44'),
(14, '2334', 1, 'Cuadro', 90, '250.00', 1, 'Cuadro decorativo', '1655675614_89f9ece9cc03a7a184bf.png.png', '2022-06-19 21:53:34', '2022-06-19 19:53:34'),
(15, '23456', 2, 'Taza', 137, '90.00', 1, 'Taza de porcelana resistente', '1655675631_3d843860f48f5b74f844.png.png', '2022-06-19 21:53:51', '2022-06-19 19:53:51'),
(16, '1234', 3, 'Set Mate', 169, '300.00', 1, 'Incluye: azucarera, yerbera y mate', '1655675651_d41a60d0a1b9ce4e39b4.png.png', '2022-06-19 22:02:44', '2022-06-19 20:02:44'),
(17, '23344', 1, 'Luna ', 88, '230.00', 1, 'Material: acero inoxidable', '1655675665_46d0e268dd308fb75617.png.png', '2022-06-19 21:54:25', '2022-06-19 19:54:25'),
(18, '567876', 1, 'Frascos', 99, '180.00', 1, 'Material: vidrio', '1655675678_3b63682e34abb11180e6.png.png', '2022-06-19 21:54:38', '2022-06-19 19:54:38'),
(20, '4456566', 2, 'Mate Listo', 217, '800.00', 1, 'Mate todo en uno, listo para tomar.', '1655675695_20ff621f272d582239df.png.png', '2022-06-19 22:40:06', '2022-06-19 20:40:06'),
(21, '45672', 2, 'Vaso Térmico', 11, '450.00', 1, 'Color: sin elección', '1655675716_0d28f95bbc5d93bc636d.png.png', '2022-06-19 21:55:16', '2022-06-19 19:55:16'),
(22, '34564', 3, 'Set Yerbera y Azucarera', 44, '250.00', 1, 'Combo 2x1 -  Color: sin elección', '1655675733_36393e78d6de5a9b0a5a.png.png', '2022-06-19 22:40:05', '2022-06-19 20:40:05'),
(23, '43543', 1, 'Maceta', 23, '150.00', 1, 'Material: plástico - Color: Sin elección', '1655675749_307913045291b36f5c46.png.png', '2022-06-19 21:55:49', '2022-06-19 19:55:49'),
(25, '353466', 2, 'Termo Mega', 10, '1900.00', 1, 'Color: Caramelo', '1655675763_4790ffbdabb732019238.png.png', '2022-06-19 21:56:03', '2022-06-19 19:56:03'),
(26, '1543543', 2, 'Botella ', 11, '1500.00', 1, 'Material: Aluminio - Capacidad: 150ml', '1655676269_6228f19efaef1855d6b5.png.png', '2022-06-19 22:40:05', '2022-06-19 20:40:05'),
(27, '345678765', 2, 'Mate ', 40, '850.00', 1, 'Recubierto de cuero - Color: verde militar - No incluye bombilla', '1655676381_c5674be968ac66f7b65c.png.png', '2022-06-19 20:06:21', '2022-06-19 20:06:21'),
(28, '4567765', 2, 'Mate', 40, '850.00', 1, 'Recubierto de cuero - Color: blanco - No incluye bombilla', '1655676471_8dc34fd4d327b52e3fee.png.png', '2022-06-19 20:07:51', '2022-06-19 20:07:51'),
(29, '345654', 3, 'Set n°1', 21, '2100.00', 1, 'Incluye: termo, mate y bombilla - Color: Naranja', '1655676742_ac99cd81de24aee84091.png.png', '2022-06-19 22:13:10', '2022-06-19 20:13:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincias`
--

CREATE TABLE `provincias` (
  `id_provincia` int(11) NOT NULL,
  `nombre` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `activo` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `provincias`
--

INSERT INTO `provincias` (`id_provincia`, `nombre`, `activo`) VALUES
(1, 'Buenos Aires', 1),
(2, 'Ciudad Autónoma de Buenos Aires', 1),
(3, 'Catamarca', 1),
(4, 'Chaco', 1),
(5, 'Chubut', 1),
(6, 'Córdoba', 1),
(7, 'Corrientes', 1),
(8, 'Entre Ríos', 1),
(9, 'Formosa', 1),
(10, 'Jujuy', 1),
(11, 'La Pampa', 1),
(12, 'La Rioja', 1),
(13, 'Mendoza', 1),
(14, 'Misiones', 1),
(15, 'Neuquén', 1),
(16, 'Río Negro', 1),
(17, 'Salta', 1),
(18, 'San Juan', 1),
(19, 'San Luís', 1),
(20, 'Santa Cruz', 1),
(21, 'Santa Fe', 1),
(22, 'Santiago del  Estero', 1),
(23, 'Tierra del Fuego, Antártida e Islas de Atlántico Sur', 1),
(24, 'Tucumán', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(30) CHARACTER SET utf8mb4 NOT NULL,
  `apellido` varchar(30) CHARACTER SET utf8mb4 NOT NULL,
  `email` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `usuario` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `contraseña` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` bigint(20) DEFAULT NULL,
  `id_provincia` int(2) DEFAULT NULL,
  `ciudad` varchar(60) COLLATE utf8_spanish_ci DEFAULT NULL,
  `direccion` varchar(70) COLLATE utf8_spanish_ci DEFAULT NULL,
  `activo` int(11) NOT NULL DEFAULT 1,
  `perfil_id` int(11) NOT NULL DEFAULT 2,
  `fecha_alta` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fecha_modifica` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellido`, `email`, `usuario`, `contraseña`, `telefono`, `id_provincia`, `ciudad`, `direccion`, `activo`, `perfil_id`, `fecha_alta`, `fecha_modifica`) VALUES
(14, 'Peter', 'Parker', 'peter@gmail.com', 'peter', '$2y$10$pzttAM/9hUhSmJnNYxAcV.fUt8fmkHMyZ.uOuc7tddS', NULL, 7, 'Saladas', 'B° Sc', 0, 2, '2022-06-19 17:52:02', '2022-06-19 15:52:02'),
(15, 'Dani', 'Correa', 'cdaniela.cdc@gmail.com', 'Danic', '$2y$10$zYvZNSrhlgT/l2927vkWtuxwQSBcOTzAaMOu424RfctYVEih1XJgi', 3794540940, 7, 'Corrientes', 'Lisandro Segovia 2549', 1, 2, '2022-06-19 20:02:49', '2022-06-19 18:02:49'),
(17, 'Fernando', 'Felix', 'admin@gmail.com', 'Administrador', '$2y$10$TIY9tDZ2uVwYHkNlrWG.Qe3Ast61BHWV3fbT3EgP0ZTp3kUHYBiIm', 3795456754, 1, 'Lomas de Zamora', '', 1, 1, '2022-06-19 02:38:41', '2022-06-19 00:38:41'),
(20, 'Yamila', 'Paré', 'yamilap@gmail.com', 'YamiP', '$2y$10$g.j68kScusCSvLPWIsR86eFN7rlAAwQQ.mASxD0Da7Sdb5KAqZJj6', 3794678900, 7, 'Goya', 'Las heras 1314', 0, 2, '2022-06-19 22:32:42', '2022-06-19 20:32:42'),
(23, 'Gabriel', 'Leguiza', 'gabL@gmail.com', 'GabiL', '$2y$10$G/9a0/mhZ0YSwZrL.VWuYeZKJchE9pfvOslQpJSbCvH52YC6SWF3S', 3794678567, 2, 'Palermo', 'Zona Sur', 1, 2, '2022-06-19 02:44:37', '2022-06-19 00:44:36'),
(24, 'Anyelen', 'Ibarrola', 'anyeIb@gmail.com', 'AnyeIb', '$2y$10$z49m5XTQBfcpOtqTJSC0Pe.gHa/J./xIZ54TDmEAaGthT1ZA2xeZe', 3777564321, 7, 'Saladas', 'Córdoba 1441', 1, 2, '2022-06-19 22:39:44', '2022-06-19 20:39:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id_venta` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_medioPago` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `activo` int(11) NOT NULL DEFAULT 1,
  `fecha_venta` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id_venta`, `id_cliente`, `id_medioPago`, `total`, `activo`, `fecha_venta`) VALUES
(12, 15, 3, '230.00', 1, '2022-06-19 17:45:55'),
(14, 15, 1, '630.00', 1, '2022-06-18 15:48:49'),
(17, 23, 3, '2200.00', 1, '2022-06-19 02:45:02'),
(19, 15, 1, '5700.00', 0, '2022-06-19 22:19:02'),
(20, 15, 1, '3800.00', 0, '2022-06-19 22:18:57'),
(21, 24, 2, '2550.00', 1, '2022-06-19 22:40:06');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoría`);

--
-- Indices de la tabla `consulta`
--
ALTER TABLE `consulta`
  ADD PRIMARY KEY (`id_consulta`),
  ADD KEY `id_usuario` (`id_perfil`);

--
-- Indices de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD PRIMARY KEY (`id_detVenta`),
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_venta` (`id_venta`),
  ADD KEY `id_venta_2` (`id_venta`);

--
-- Indices de la tabla `mediopago`
--
ALTER TABLE `mediopago`
  ADD PRIMARY KEY (`id_medioPago`);

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`id_perfil`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `categoría` (`categoría`);

--
-- Indices de la tabla `provincias`
--
ALTER TABLE `provincias`
  ADD PRIMARY KEY (`id_provincia`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `fk_perfil_usuario` (`perfil_id`),
  ADD KEY `id_provincia` (`id_provincia`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_medioPago` (`id_medioPago`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoría` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `consulta`
--
ALTER TABLE `consulta`
  MODIFY `id_consulta` smallint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  MODIFY `id_detVenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `mediopago`
--
ALTER TABLE `mediopago`
  MODIFY `id_medioPago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `perfil`
--
ALTER TABLE `perfil`
  MODIFY `id_perfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `provincias`
--
ALTER TABLE `provincias`
  MODIFY `id_provincia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `consulta`
--
ALTER TABLE `consulta`
  ADD CONSTRAINT `fk_perfil` FOREIGN KEY (`id_perfil`) REFERENCES `perfil` (`id_perfil`);

--
-- Filtros para la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD CONSTRAINT `id_producto` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`),
  ADD CONSTRAINT `id_venta` FOREIGN KEY (`id_venta`) REFERENCES `ventas` (`id_venta`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fk_categoria` FOREIGN KEY (`categoría`) REFERENCES `categorias` (`id_categoría`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_perfil_usuario` FOREIGN KEY (`perfil_id`) REFERENCES `perfil` (`id_perfil`),
  ADD CONSTRAINT `fk_provincia_usuario` FOREIGN KEY (`id_provincia`) REFERENCES `provincias` (`id_provincia`);

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `id_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `id_medioPago` FOREIGN KEY (`id_medioPago`) REFERENCES `mediopago` (`id_medioPago`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
