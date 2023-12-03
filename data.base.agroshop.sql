-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-09-2023 a las 04:07:40
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
-- Estructura de tabla para la tabla `estadopedido`
--

CREATE TABLE `estadopedido` (
  `id_estadopedido` int(11) NOT NULL,
  `etp_estado` varchar(255) NOT NULL,
  `id_productoventa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL,
  `pro_imagen` varchar(255) NOT NULL,
  `pro_nombre` varchar(255) NOT NULL,
  `pro_descripcion` varchar(255) NOT NULL,
  `pro_categoria` varchar(255) NOT NULL,
  `pro_precio` varchar(255) NOT NULL,
  `pro_stock` varchar(255) NOT NULL,
  `pro_estado` int(10) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productoinventario`
--

CREATE TABLE `productoinventario` (
  `id_productoinventario` int(11) NOT NULL,
  `pri_cantidad` int(11) NOT NULL,
  `pri_estado` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `id_usuario` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productoventa`
--

CREATE TABLE `productoventa` (
  `id_productoventa` int(11) NOT NULL,
  `id_pruducto` int(11) NOT NULL,
  `prv_cantidad` int(11) NOT NULL,
  `prv_total` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `usu_nombre` varchar(255) NOT NULL,
  `usu_apellido` varchar(255) NOT NULL,
  `usu_email` varchar(255) NOT NULL,
  `usu_pass` varchar(255) NOT NULL,
  `usu_apodo` varchar(255) NOT NULL,
  `usu_telefono` varchar(255) NOT NULL,
  `usu_direccion` varchar(255) NOT NULL,
  `usu_estado` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `id_tipousuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `usu_nombre`, `usu_apellido`, `usu_email`, `usu_pass`, `usu_apodo`, `usu_telefono`, `usu_direccion`, `usu_estado`, `id_tipousuario`) VALUES
(1, 'admin', 'mini', 'a@a.com', '1234', 'pepe', '123456789', 'direccion 123', 1, 1),
(2, 'antonio', 'varas', 'a@el.com', '4321', 'juan', '987654321', 'papas ', 1, 2),
(3, 'franco', 'gonzales', 'a@al.com', '2312', 'franco', '987654312', 'limon', 1, 3),
(4, 'alejandro', 'vegas', 'a@ql.com', '4567', 'jano', '123456789', 'adadada', 1, 4);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `estadopedido`
--
ALTER TABLE `estadopedido`
  ADD PRIMARY KEY (`id_estadopedido`);

--
-- Indices de la tabla `historialcompra`
--
ALTER TABLE `historialcompra`
  ADD PRIMARY KEY (`id_historialcompra`);

--
-- Indices de la tabla `observacion`
--
ALTER TABLE `observacion`
  ADD PRIMARY KEY (`id_observacion`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `productoinventario`
--
ALTER TABLE `productoinventario`
  ADD PRIMARY KEY (`id_productoinventario`);

--
-- Indices de la tabla `productoventa`
--
ALTER TABLE `productoventa`
  ADD PRIMARY KEY (`id_productoventa`);

--
-- Indices de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  ADD PRIMARY KEY (`id_tipousuario`) USING BTREE;

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `estadopedido`
--
ALTER TABLE `estadopedido`
  MODIFY `id_estadopedido` int(11) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productoventa`
--
ALTER TABLE `productoventa`
  MODIFY `id_productoventa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  MODIFY `id_tipousuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
