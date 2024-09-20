-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-06-2024 a las 00:21:31
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `elgarbanzo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `Doc_cliente` int(11) NOT NULL,
  `Nombre_cliente` text NOT NULL,
  `Correo_cliente` varchar(40) NOT NULL,
  `Direccion_cliente` varchar(40) NOT NULL,
  `Nit_cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`Doc_cliente`, `Nombre_cliente`, `Correo_cliente`, `Direccion_cliente`, `Nit_cliente`) VALUES
(88, 'jesus', 'ebwruecbwe@gmail.com', 'ceiba', 0),
(1092531646, 'Marlen ortega', 'no@yahoo', 'la cabrera1', 0),
(1093592445, 'Erick perez', 'erick@fesc.edu.co', 'la cabrera1', 0),
(1094048318, 'Walter Velasco', 'est_we_velasco@fesc.edu.co', 'Prados Norte', 0),
(1116778016, 'Sebastian Gallego', 'est_js_gallego@gmail.com', 'Vegas del rio', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `Cod_factura` int(11) NOT NULL,
  `Doc_cliente` int(11) NOT NULL,
  `Fecha_factura` timestamp NOT NULL DEFAULT current_timestamp(),
  `Pastel_yuca` int(11) NOT NULL,
  `Pastel_pollo` int(11) NOT NULL,
  `Pastel_garbanzo` int(11) NOT NULL,
  `Pastel_mixto` int(11) NOT NULL,
  `Papa_rellena` int(11) NOT NULL,
  `Pastel_arroz_carne` int(11) NOT NULL,
  `Subtotal_factura` int(11) NOT NULL,
  `Total_factura` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`Cod_factura`, `Doc_cliente`, `Fecha_factura`, `Pastel_yuca`, `Pastel_pollo`, `Pastel_garbanzo`, `Pastel_mixto`, `Papa_rellena`, `Pastel_arroz_carne`, `Subtotal_factura`, `Total_factura`) VALUES
(5, 1116778016, '2024-05-26 16:33:03', 3, 0, 2, 3, 0, 0, 14400, 17136),
(7, 1116778016, '2024-05-26 18:04:47', 2, 0, 1, 1, 3, 1, 15000, 17850),
(8, 1116778016, '2024-05-26 18:05:07', 2, 4, 1, 0, 3, 0, 18700, 22253),
(9, 1116778016, '2024-05-26 18:07:46', 2, 4, 1, 0, 3, 0, 18700, 22253),
(10, 1116778016, '2024-05-26 18:15:19', 2, 2, 2, 2, 2, 2, 21600, 25704),
(11, 1116778016, '2024-05-26 18:15:56', 2, 1, 1, 1, 1, 1, 12800, 15232),
(12, 1116778016, '2024-05-26 18:17:45', 2, 1, 1, 1, 1, 1, 12800, 15232),
(14, 1116778016, '2024-05-26 19:16:06', 2, 1, 0, 1, 2, 0, 11600, 13804),
(15, 1094048318, '2024-06-11 11:38:40', 50, 50, 50, 50, 50, 50, 540000, 642600),
(16, 1094048318, '2024-06-11 11:44:32', 1, 0, 0, 0, 1, 0, 4000, 4760),
(17, 1094048318, '2024-06-11 11:49:24', 0, 0, 0, 0, 1, 0, 2000, 2380),
(18, 1116778016, '2024-06-11 12:29:47', 99, 99, 99, 99, 99, 99, 1069200, 1272348),
(19, 1116778016, '2024-06-11 12:29:47', 99, 99, 99, 99, 99, 99, 1069200, 1272348),
(20, 1116778016, '2024-06-11 12:29:47', 99, 99, 99, 99, 99, 99, 1069200, 1272348),
(21, 1116778016, '2024-06-11 12:29:47', 99, 99, 99, 99, 99, 99, 1069200, 1272348),
(22, 1116778016, '2024-06-11 12:29:47', 99, 99, 99, 99, 99, 99, 1069200, 1272348),
(23, 1116778016, '2024-06-11 12:29:47', 99, 99, 99, 99, 99, 99, 1069200, 1272348),
(24, 1116778016, '2024-06-11 12:29:47', 99, 99, 99, 99, 99, 99, 1069200, 1272348),
(25, 1116778016, '2024-06-11 12:29:47', 99, 99, 99, 99, 99, 99, 1069200, 1272348),
(26, 1116778016, '2024-06-11 12:29:47', 99, 99, 99, 99, 99, 99, 1069200, 1272348),
(27, 1116778016, '2024-06-11 12:29:47', 99, 99, 99, 99, 99, 99, 1069200, 1272348),
(28, 1116778016, '2024-06-11 12:29:47', 99, 99, 99, 99, 99, 99, 1069200, 1272348),
(29, 1116778016, '2024-06-11 12:29:47', 99, 99, 99, 99, 99, 99, 1069200, 1272348),
(30, 1116778016, '2024-06-11 12:32:09', 99, 99, 99, 99, 99, 99, 1069200, 1272348),
(31, 1116778016, '2024-06-11 12:32:09', 99, 99, 99, 99, 99, 99, 1069200, 1272348),
(32, 1116778016, '2024-06-11 12:32:09', 99, 99, 99, 99, 99, 99, 1069200, 1272348),
(33, 1116778016, '2024-06-11 12:32:09', 99, 99, 99, 99, 99, 99, 1069200, 1272348),
(34, 1116778016, '2024-06-11 12:32:09', 99, 99, 99, 99, 99, 99, 1069200, 1272348),
(35, 1116778016, '2024-06-11 12:32:09', 99, 99, 99, 99, 99, 99, 1069200, 1272348),
(36, 1116778016, '2024-06-11 12:32:09', 99, 99, 99, 99, 99, 99, 1069200, 1272348),
(37, 1116778016, '2024-06-11 12:32:09', 99, 99, 99, 99, 99, 99, 1069200, 1272348),
(38, 1116778016, '2024-06-11 12:32:09', 99, 99, 99, 99, 99, 99, 1069200, 1272348),
(39, 1116778016, '2024-06-11 12:32:09', 99, 99, 99, 99, 99, 99, 1069200, 1272348),
(40, 1116778016, '2024-06-11 12:32:09', 99, 99, 99, 99, 99, 99, 1069200, 1272348),
(41, 1116778016, '2024-06-11 12:32:09', 99, 99, 99, 99, 99, 99, 1069200, 1272348),
(42, 1116778016, '2024-06-11 12:33:40', 99, 99, 99, 99, 99, 99, 1069200, 1272348),
(43, 1116778016, '2024-06-11 12:33:40', 99, 99, 99, 99, 99, 99, 1069200, 1272348),
(44, 1116778016, '2024-06-11 12:33:40', 99, 99, 99, 99, 99, 99, 1069200, 1272348),
(45, 1116778016, '2024-06-11 12:33:40', 99, 99, 99, 99, 99, 99, 1069200, 1272348),
(46, 1116778016, '2024-06-11 12:33:40', 99, 99, 99, 99, 99, 99, 1069200, 1272348),
(47, 1116778016, '2024-06-11 12:33:40', 99, 99, 99, 99, 99, 99, 1069200, 1272348),
(48, 1116778016, '2024-06-11 12:33:40', 99, 99, 99, 99, 99, 99, 1069200, 1272348),
(49, 1116778016, '2024-06-11 12:33:40', 99, 99, 99, 99, 99, 99, 1069200, 1272348),
(50, 1116778016, '2024-06-11 12:33:40', 99, 99, 99, 99, 99, 99, 1069200, 1272348),
(51, 1116778016, '2024-06-11 12:33:40', 99, 99, 99, 99, 99, 99, 1069200, 1272348),
(52, 1116778016, '2024-06-11 12:33:40', 99, 99, 99, 99, 99, 99, 1069200, 1272348),
(53, 1116778016, '2024-06-11 12:33:40', 99, 99, 99, 99, 99, 99, 1069200, 1272348),
(54, 1116778016, '2024-06-11 12:37:24', 99, 99, 99, 99, 99, 99, 1069200, 1272348),
(55, 1116778016, '2024-06-11 12:37:24', 99, 99, 99, 99, 99, 99, 1069200, 1272348),
(56, 1116778016, '2024-06-11 12:37:24', 99, 99, 99, 99, 99, 99, 1069200, 1272348),
(57, 1116778016, '2024-06-11 12:37:24', 99, 99, 99, 99, 99, 99, 1069200, 1272348),
(58, 1116778016, '2024-06-11 12:37:24', 99, 99, 99, 99, 99, 99, 1069200, 1272348),
(59, 1116778016, '2024-06-11 12:37:24', 99, 99, 99, 99, 99, 99, 1069200, 1272348),
(60, 1116778016, '2024-06-11 12:37:24', 99, 99, 99, 99, 99, 99, 1069200, 1272348),
(61, 1116778016, '2024-06-11 12:37:24', 99, 99, 99, 99, 99, 99, 1069200, 1272348),
(62, 1116778016, '2024-06-11 12:37:24', 99, 99, 99, 99, 99, 99, 1069200, 1272348),
(63, 1116778016, '2024-06-11 12:37:24', 99, 99, 99, 99, 99, 99, 1069200, 1272348),
(64, 1116778016, '2024-06-11 12:37:24', 99, 99, 99, 99, 99, 99, 1069200, 1272348),
(65, 1116778016, '2024-06-11 12:37:24', 99, 99, 99, 99, 99, 99, 1069200, 1272348),
(66, 1116778016, '2024-06-11 12:37:46', 99, 99, 99, 99, 99, 99, 1069200, 1272348),
(67, 1116778016, '2024-06-11 12:37:46', 99, 99, 99, 99, 99, 99, 1069200, 1272348),
(68, 1116778016, '2024-06-11 12:37:46', 99, 99, 99, 99, 99, 99, 1069200, 1272348),
(69, 1116778016, '2024-06-11 12:37:46', 99, 99, 99, 99, 99, 99, 1069200, 1272348),
(70, 1116778016, '2024-06-11 12:37:46', 99, 99, 99, 99, 99, 99, 1069200, 1272348),
(71, 1116778016, '2024-06-11 12:37:46', 99, 99, 99, 99, 99, 99, 1069200, 1272348),
(72, 1116778016, '2024-06-11 12:37:47', 99, 99, 99, 99, 99, 99, 1069200, 1272348),
(73, 1116778016, '2024-06-11 12:37:47', 99, 99, 99, 99, 99, 99, 1069200, 1272348),
(74, 1116778016, '2024-06-11 12:37:47', 99, 99, 99, 99, 99, 99, 1069200, 1272348),
(75, 1116778016, '2024-06-11 12:37:47', 99, 99, 99, 99, 99, 99, 1069200, 1272348),
(76, 1116778016, '2024-06-11 12:37:47', 99, 99, 99, 99, 99, 99, 1069200, 1272348),
(77, 1116778016, '2024-06-11 12:37:47', 99, 99, 99, 99, 99, 99, 1069200, 1272348),
(78, 1116778016, '2024-06-11 12:41:35', 99, 99, 99, 99, 99, 99, 1069200, 1272348),
(80, 1092531646, '2024-06-13 03:07:04', 13, 7, 19, 18, 2, 10, 120500, 143395),
(81, 1116778016, '2024-06-13 14:53:27', 9, 0, 2, 6, 12, 4, 62600, 74494);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingredientes`
--

CREATE TABLE `ingredientes` (
  `Cod_ingrediente` varchar(3) NOT NULL,
  `Nombre_ingrediente` text NOT NULL,
  `Cantidad_ingrediente` double NOT NULL,
  `Tipo_cantidad` varchar(5) NOT NULL,
  `Precio_ingrediente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ingredientes`
--

INSERT INTO `ingredientes` (`Cod_ingrediente`, `Nombre_ingrediente`, `Cantidad_ingrediente`, `Tipo_cantidad`, `Precio_ingrediente`) VALUES
('I01', 'Harina de trigo', 45.75, 'Kg', 3000),
('I02', 'Aceite', 44.239999999999995, 'Kg', 6000),
('I03', 'Harina de maíz', 29.630000000000003, 'Kg', 4000),
('I04', 'Guiso', 9.424, 'Kg', 3000),
('I05', 'Carne Molida', 21.535, 'Kg', 20000),
('I06', 'Pechuga', 98.2225, 'Kg', 15000),
('I07', 'Yuca', 46.300000000000004, 'Kg', 2500),
('I08', 'Papa', 99.71, 'Kg', 2500),
('I09', 'Sal', 49.674, 'Kg', 2000),
('I10', 'Arroz', 49.346000000000004, 'Kg', 5000),
('I11', 'Huevos', 457.5, 'Ud', 600),
('I12', 'Garbanzo', 49.97, 'Kg', 5000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `iniciarsesion`
--

CREATE TABLE `iniciarsesion` (
  `user` text NOT NULL,
  `contraseña` text NOT NULL,
  `rol` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `iniciarsesion`
--

INSERT INTO `iniciarsesion` (`user`, `contraseña`, `rol`) VALUES
('user1', '1234', 'ADMINISTRADOR'),
('user2', '1234', 'DOMICILIARIO'),
('user3', '1234', 'VENDEDOR');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pasteles`
--

CREATE TABLE `pasteles` (
  `Cod_pastel` varchar(3) NOT NULL,
  `Nombre_pastel` text NOT NULL,
  `Precio_fabricacion` int(11) NOT NULL,
  `Precio_venta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pasteles`
--

INSERT INTO `pasteles` (`Cod_pastel`, `Nombre_pastel`, `Precio_fabricacion`, `Precio_venta`) VALUES
('P01', 'Pastel_yuca', 926, 2000),
('P02', 'Pastel_pollo', 930, 1800),
('P03', 'Pastel_mixto', 904, 1800),
('P04', 'Pastel_arroz_carne', 802, 1700),
('P05', 'Pastel_garbanzo', 446, 1500),
('P06', 'Papa_rellena', 1066, 2000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `validacioniniciarsesion`
--

CREATE TABLE `validacioniniciarsesion` (
  `cuser` text NOT NULL,
  `ccontraseña` text NOT NULL,
  `crol` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `validacioniniciarsesion`
--

INSERT INTO `validacioniniciarsesion` (`cuser`, `ccontraseña`, `crol`) VALUES
('user1', '1234', '23232'),
('user1', '1234', 'ADMIN'),
('user1', '1234', 'ADMIN'),
('', '', ''),
('', '', ''),
('', '', ''),
('', '', ''),
('', '', ''),
('', '', ''),
('', '', ''),
('', '', ''),
('', '', ''),
('', '', ''),
('', '', ''),
('', '', ''),
('', '', ''),
('', '', ''),
('', '', ''),
('', '', ''),
('user1', '1234', 'ADMIN'),
('', '', ''),
('', '', ''),
('', '', ''),
('', '', ''),
('', '', ''),
('', '', ''),
('', '', ''),
('', '', ''),
('', '', ''),
('', '', ''),
('', '', ''),
('user1', '1234', 'ADMIN'),
('user1', '1234', 'ADMIN'),
('user1', '1234', 'ADMIN'),
('user1', '1234', 'ADMIN'),
('user1', '1234', 'ADMIN'),
('', '', ''),
('', '', ''),
('', '', ''),
('', '', ''),
('fsdfs', 'sdfsd', 'sdfsd'),
('fsdfs', 'sdfsd', 'sdfsd'),
('fsdfs', 'sdfsd', 'sdfsd'),
('fsdfs', 'sdfsd', 'sdfsd'),
('fsdfs', 'sdfsd', 'sdfsd'),
('fsdfs', 'sdfsd', 'sdfsd'),
('fsdfs', 'sdfsd', 'sdfsd'),
('fsdfs', 'sdfsd', 'sdfsd'),
('fsdfs', 'sdfsd', 'sdfsd'),
('dada', 'adas', 'asda'),
('user1', '1234', 'ADMIN'),
('', '', ''),
('user1', '1234', 'ADMIN'),
('', '', ''),
('user1', '1234', 'ADMIN'),
('user1', '1234', 'ADMIN'),
('user1', '1234', 'ADMINISTRADOR'),
('user1', '1234', 'ADMIN'),
('user1', '1234', 'ADMINISTRADOR');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`Doc_cliente`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`Cod_factura`),
  ADD KEY `Doc_cliente` (`Doc_cliente`);

--
-- Indices de la tabla `ingredientes`
--
ALTER TABLE `ingredientes`
  ADD PRIMARY KEY (`Cod_ingrediente`);

--
-- Indices de la tabla `pasteles`
--
ALTER TABLE `pasteles`
  ADD PRIMARY KEY (`Cod_pastel`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `Cod_factura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`Doc_cliente`) REFERENCES `clientes` (`Doc_cliente`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
