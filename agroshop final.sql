-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-12-2023 a las 07:08:41
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
-- Base de datos: `agroshop`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historialcompra`
--

CREATE TABLE `historialcompra` (
  `id_historialcompra` int(11) NOT NULL,
  `hc_producto` varchar(255) NOT NULL,
  `hc_total` varchar(255) NOT NULL,
  `hc_detalle` varchar(255) NOT NULL,
  `hc_estado` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `id_producto` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `observacion`
--

CREATE TABLE `observacion` (
  `id_observacion` int(11) NOT NULL,
  `obs_descripcion` varchar(255) NOT NULL,
  `obs_estado` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `id_pedido` int(11) NOT NULL,
  `ped_ref` varchar(255) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `ped_estadop` varchar(255) NOT NULL,
  `ped_totalf` varchar(255) NOT NULL,
  `ped_fecha` date NOT NULL,
  `ped_token` varchar(255) NOT NULL,
  `ped_estado` int(10) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`id_pedido`, `ped_ref`, `id_usuario`, `ped_estadop`, `ped_totalf`, `ped_fecha`, `ped_token`, `ped_estado`) VALUES
(34, 'D3vBS', 21, '1', '36333', '2023-12-02', '01ab3991b18d0f14624b8edac9cd778126778b9b41c0c8d0da922bd272a72fbf', 1),
(35, 'oUNL', 21, '1', '14140', '2023-12-02', '01ab9514caefcd5fe1ea97dad882577f3d1f667cfb8cf3d4cea96ab7024c77c1', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidodatos`
--

CREATE TABLE `pedidodatos` (
  `id_pedidodatos` int(11) NOT NULL,
  `pdd_ref` varchar(255) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `pdd_nombre` varchar(255) NOT NULL,
  `pdd_precio` varchar(255) NOT NULL,
  `pdd_cantidad` varchar(255) NOT NULL,
  `pdd_total` varchar(255) NOT NULL,
  `pdd_estado` int(10) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedidodatos`
--

INSERT INTO `pedidodatos` (`id_pedidodatos`, `pdd_ref`, `id_producto`, `pdd_nombre`, `pdd_precio`, `pdd_cantidad`, `pdd_total`, `pdd_estado`) VALUES
(36, 'D3vBS', 38, 'Piña', '1950', '2', '3900', 1),
(37, 'D3vBS', 39, 'Sandia ', '4190', '4', '16760', 1),
(38, 'D3vBS', 40, 'Melones ', '3990', '1', '3990', 1),
(39, 'oUNL', 37, 'Mandarinas', '2200', '1', '2200', 1),
(40, 'oUNL', 41, 'Granada', '1900', '2', '3800', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL,
  `pro_imagen` varchar(255) NOT NULL,
  `pro_nombre` varchar(255) NOT NULL,
  `pro_descripcion` varchar(255) NOT NULL,
  `pro_precio` varchar(255) NOT NULL,
  `pro_stock` varchar(255) NOT NULL,
  `pro_tipo` varchar(255) NOT NULL,
  `pro_estado` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `id_usuario` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `id_tipoproducto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `pro_imagen`, `pro_nombre`, `pro_descripcion`, `pro_precio`, `pro_stock`, `pro_tipo`, `pro_estado`, `id_usuario`, `id_unit`, `id_tipoproducto`) VALUES
(27, 'imagenes/fotonoticia_20180508110600_1200.jpg', 'Naranjas', 'Las Naranjas estan en pallet de 112 kg aprox. y esta compuesto por 8 cajas de 14 kg cada una.', '128990', '1200', '1', 1, 22, 3, 1),
(28, 'imagenes/564704609_174935756_1706x960.webp', 'Platanos', 'Los platanos estan en pallet de 184 kg aprox. y esta compuesto por 8 cajas de 23 kg cada una.', '96000', '1200', '1', 1, 22, 3, 1),
(29, 'imagenes/a580f165-4fdf-4eba-8824-ac6db1a29525.webp', 'Uvas', 'Las uvas estan en pallet de 72 kg aprox. y esta compuesto por 8 cajas de 9 kg cada una.', '179280', '1200', '1', 1, 22, 3, 1),
(30, 'imagenes/120297559_1639899092843362_5224770539628615895_n.jpg', 'Melon', 'Los Melones estan en pallet de 136 kg aprox. y esta compuesto por 8 cajas de 17 kg cada una.', '21400', '800', '1', 1, 23, 5, 1),
(31, 'imagenes/manzana.webp', 'Manzanas ', 'Las Manzanas estan en cajas de 14kg cada una.', '25990', '700', '1', 1, 23, 5, 1),
(32, 'imagenes/7834734F-AD1A-405C-A132-0A8C7D800D1C.jpeg', 'Mandarinas', 'Las Mandarinas estan en cajas de 14kg cada una.', '29400', '800', '1', 1, 23, 5, 1),
(33, 'imagenes/Pera-Verde-Caja-14-Kg.webp', 'Peras ', 'Las Peras estan en pallet de 112 kg aprox. y esta compuesto por 8 cajas de 14 kg cada una.', '199920', '1200', '1', 1, 24, 3, 1),
(34, 'imagenes/Pera-Verde-Caja-14-Kg.webp', 'Peras', 'Las Peras estan en cajas de 14 kg cada una.', '24990', '700', '1', 1, 24, 5, 1),
(35, 'imagenes/bandeja-frutilla.jpg', 'Frutillas ', 'Frutillas sin imperfecciones, se entregan en bolsa', '4190', '200', '2', 1, 25, 2, 1),
(36, 'imagenes/fotonoticia_20180508110600_1200.jpg', 'Naranjas ', 'Naranjas con imperfecciones, se entregan en envase de plastico.', '2590', '100', '2', 1, 25, 2, 1),
(37, 'imagenes/7834734F-AD1A-405C-A132-0A8C7D800D1C.jpeg', 'Mandarinas', 'Mandarinas imperfectas, se entregan en envase plastico', '2200', '150', '2', 1, 25, 2, 1),
(38, 'imagenes/Piasencaja-5b368acfc9e77c001a59d5ea.jpg', 'Piña', 'Piña por unidad', '1950', '100', '2', 1, 26, 1, 1),
(39, 'imagenes/pexels-engin-akyurt-2894205.jpg', 'Sandia ', 'Sandia ', '4190', '150', '2', 1, 26, 1, 1),
(40, 'imagenes/120297559_1639899092843362_5224770539628615895_n.jpg', 'Melones ', '2 MELONES X $3990\r\n', '3990', '120', '2', 1, 26, 1, 1),
(41, 'imagenes/840_560.jpg', 'Granada', 'Granada x kilo', '1900', '120', '2', 1, 27, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoproducto`
--

CREATE TABLE `tipoproducto` (
  `id_tipoproducto` int(11) NOT NULL,
  `nombre_tpro` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipoproducto`
--

INSERT INTO `tipoproducto` (`id_tipoproducto`, `nombre_tpro`) VALUES
(1, 'Fruta'),
(2, 'Verdura');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipousuario`
--

CREATE TABLE `tipousuario` (
  `id_tipousuario` int(11) NOT NULL,
  `tus_nombre` varchar(255) NOT NULL,
  `tus_estado` int(10) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipousuario`
--

INSERT INTO `tipousuario` (`id_tipousuario`, `tus_nombre`, `tus_estado`) VALUES
(1, 'administrador', 1),
(2, 'productor', 1),
(3, 'comerciante', 1),
(4, 'cliente', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidad_medida`
--

CREATE TABLE `unidad_medida` (
  `id_unit` int(11) NOT NULL,
  `unit_tipo` varchar(255) NOT NULL,
  `id_tipousuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `unidad_medida`
--

INSERT INTO `unidad_medida` (`id_unit`, `unit_tipo`, `id_tipousuario`) VALUES
(1, 'Unidad', 3),
(2, 'Kg', 3),
(3, 'Pallet', 2),
(4, 'Saco', 2),
(5, 'Caja', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `usu_nombre` varchar(255) NOT NULL,
  `usu_apellido` varchar(255) NOT NULL,
  `usu_rut` varchar(255) NOT NULL,
  `usu_email` varchar(255) NOT NULL,
  `usu_pass` varchar(255) NOT NULL,
  `usu_usuario` varchar(255) NOT NULL,
  `usu_telefono` varchar(255) NOT NULL,
  `usu_direccion` varchar(255) NOT NULL,
  `id_tipousuario` int(11) NOT NULL,
  `usu_estado` int(10) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `usu_nombre`, `usu_apellido`, `usu_rut`, `usu_email`, `usu_pass`, `usu_usuario`, `usu_telefono`, `usu_direccion`, `id_tipousuario`, `usu_estado`) VALUES
(1, 'admin', 'admin', '21213231-2', 'a@a.com', '1234', 'admin', '123456789', 'a', 1, 1),
(19, 'productor', 'productor', '21740432-4', 'productor@empresa.com', '1234', 'productor', '912345678', 'direccion 123', 2, 1),
(20, 'comerciante', 'comerciante', '21543978-2', 'comerciante@empresa.com', '1234', 'comerciante', '912345678', 'direccion 111', 3, 1),
(21, 'cliente', 'cliente', '13244978-1', 'cliente@gmail.com', '1234', 'cliente', '912345678', 'direccion 123', 4, 1),
(22, 'Alejandro', 'Flores ', '218458423-2', 'alejandro21@gmail.com', '1234', 'alejandro', '987654321', 'el manzano 421', 2, 1),
(23, 'Kevin ', 'Lopez', '22423765-2', 'kevin1@gmail.com', '1234', 'kevin', '987654321', 'el manzano 543', 2, 1),
(24, 'Nicolas ', 'Quilondran', '12598543-2', 'nicolas2@gmail.com', '1234', 'nicolas', '987654321', 'el manzano 1241', 2, 1),
(25, 'Felipe', 'Quinteros', '18543764-5', 'felipe12@gmail.com', '1234', 'felipe', '987654321', 'av. brasil 743', 3, 1),
(26, 'Francisco ', 'Araya', '19543765-3', 'francis@gmail.com', '1234', 'francisco', '987654321', 'av. brasil 6543', 3, 1),
(27, 'Cristian', 'Henríquez', '17536758-2', 'cristian12@gmail.com', '1234', 'cristian', '987654321', 'av. brasil 7653', 3, 1),
(28, 'Franco ', 'Venega', '19342657-2', 'franco@gmail.com', '1234', 'franco', '987654321', 'el manzano 1543', 4, 1),
(29, 'Javier', 'Gonzales ', '16554365-3', 'javier21@gmail.com', '1234', 'javier', '987654321', 'Independecia 1231', 4, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `historialcompra`
--
ALTER TABLE `historialcompra`
  ADD PRIMARY KEY (`id_historialcompra`),
  ADD KEY `historialcompra_ibfk_1` (`id_usuario`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `observacion`
--
ALTER TABLE `observacion`
  ADD PRIMARY KEY (`id_observacion`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `pedidodatos`
--
ALTER TABLE `pedidodatos`
  ADD PRIMARY KEY (`id_pedidodatos`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `producto_ibfk_2` (`id_unit`),
  ADD KEY `id_tipoproducto` (`id_tipoproducto`);

--
-- Indices de la tabla `tipoproducto`
--
ALTER TABLE `tipoproducto`
  ADD PRIMARY KEY (`id_tipoproducto`);

--
-- Indices de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  ADD PRIMARY KEY (`id_tipousuario`) USING BTREE;

--
-- Indices de la tabla `unidad_medida`
--
ALTER TABLE `unidad_medida`
  ADD PRIMARY KEY (`id_unit`),
  ADD KEY `unidad_medida_ibfk_1` (`id_tipousuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `historialcompra`
--
ALTER TABLE `historialcompra`
  MODIFY `id_historialcompra` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `observacion`
--
ALTER TABLE `observacion`
  MODIFY `id_observacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `pedidodatos`
--
ALTER TABLE `pedidodatos`
  MODIFY `id_pedidodatos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `tipoproducto`
--
ALTER TABLE `tipoproducto`
  MODIFY `id_tipoproducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  MODIFY `id_tipousuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `unidad_medida`
--
ALTER TABLE `unidad_medida`
  MODIFY `id_unit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `historialcompra`
--
ALTER TABLE `historialcompra`
  ADD CONSTRAINT `historialcompra_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `historialcompra_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`);

--
-- Filtros para la tabla `observacion`
--
ALTER TABLE `observacion`
  ADD CONSTRAINT `observacion_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pedidodatos`
--
ALTER TABLE `pedidodatos`
  ADD CONSTRAINT `pedidodatos_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `producto_ibfk_2` FOREIGN KEY (`id_unit`) REFERENCES `unidad_medida` (`id_unit`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `producto_ibfk_3` FOREIGN KEY (`id_tipoproducto`) REFERENCES `tipoproducto` (`id_tipoproducto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `unidad_medida`
--
ALTER TABLE `unidad_medida`
  ADD CONSTRAINT `unidad_medida_ibfk_1` FOREIGN KEY (`id_tipousuario`) REFERENCES `tipousuario` (`id_tipousuario`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
