-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-10-2023 a las 20:17:05
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ayr`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_movimientos`
--

CREATE TABLE `historial_movimientos` (
  `id` int(11) NOT NULL,
  `inventario_id` int(11) NOT NULL,
  `accion` varchar(50) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha_movimiento` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `historial_movimientos`
--

INSERT INTO `historial_movimientos` (`id`, `inventario_id`, `accion`, `cantidad`, `fecha_movimiento`) VALUES
(4, 2, 'quitar', 10, '2023-09-25'),
(8, 3, 'agregar', 10, '2023-09-27'),
(13, 2, 'agregar', 15, '2023-09-26'),
(15, 3, 'quitar', 16, '2023-09-26'),
(18, 4, 'agregar', 7, '2023-09-26'),
(26, 4, 'agregar', 10, '2023-09-29'),
(27, 12, 'agregar', 5, '2023-10-02'),
(29, 14, 'agregar', 10, '2023-10-02'),
(30, 13, 'quitar', 2, '2023-10-02'),
(31, 15, 'quitar', 6, '2023-10-02'),
(32, 15, 'agregar', 8, '2023-10-02'),
(34, 1, 'agregar', 5, '2023-10-02'),
(39, 1, 'agregar', 2, '2023-10-02'),
(40, 1, 'agregar', 2, '2023-10-02'),
(42, 2, 'quitar', 8, '2023-10-03'),
(43, 6, 'agregar', 3, '2023-10-03'),
(44, 9, 'quitar', 3, '2023-10-03'),
(45, 10, 'agregar', 2, '2023-10-03'),
(46, 9, 'quitar', 2, '2023-10-03'),
(47, 9, 'agregar', 6, '2023-10-03'),
(48, 16, 'quitar', 5, '2023-10-09'),
(49, 16, 'agregar', 8, '2023-10-09'),
(50, 2, 'quitar', 7, '2023-10-09'),
(51, 2, 'quitar', 1, '2023-10-09'),
(52, 2, 'agregar', 4, '2023-10-09'),
(61, 2, 'agregar', 1, '2023-10-09'),
(62, 2, 'quitar', 1, '2023-10-09');

--
-- Disparadores `historial_movimientos`
--
DELIMITER $$
CREATE TRIGGER `actualizar_stock` AFTER INSERT ON `historial_movimientos` FOR EACH ROW BEGIN
    DECLARE stock_actual DECIMAL(10,2);
    
    
    SELECT stock INTO stock_actual FROM inventario WHERE Id = NEW.inventario_id;
    
    
    IF NEW.accion = 'agregar' THEN
        UPDATE inventario SET stock = stock_actual + NEW.cantidad WHERE Id = NEW.inventario_id;
    ELSEIF NEW.accion = 'quitar' THEN
        UPDATE inventario SET stock = stock_actual - NEW.cantidad WHERE Id = NEW.inventario_id;
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `proveedor` varchar(55) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `instalacion` decimal(10,2) NOT NULL,
  `venta` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`id`, `nombre`, `proveedor`, `descripcion`, `precio`, `instalacion`, `venta`, `stock`) VALUES
(1, 'Ferulas #9', 'autoclimas', '3060ti', '110.00', '250.00', '300.00', 13),
(2, 'Ferulas #10', 'refripartes', '10400fk', '110.00', '350.00', '400.00', -1),
(3, 'válvula de calefacción', 'refripartes', '2080s', '1500.00', '3000.00', '3000.00', 20),
(4, 'balero 11-512', 'autoclimas', '12800ks', '1000.00', '2000.00', '3000.00', 12),
(5, 'compresor ', 'autoclimas', 'zt6958', '3000.00', '6900.00', '4000.00', 10),
(6, 'válvula de calefacción 2', 'refripartes', 'cpk1080', '1000.00', '1500.00', '2000.00', 13),
(7, 'balero 15-869', 'autoclimas', '1090ti', '800.00', '900.00', '1000.00', 10),
(8, 'Balero 12700k', 'refripartes', '11700k', '900.00', '2000.00', '1800.00', 9),
(9, 'Resistencias #4', 'autoclimas', '4080su', '700.00', '900.00', '1000.00', 10),
(10, 'Refigeracion liquida', 'autoclimas', '5030xt', '1700.00', '1900.00', '3000.00', 11),
(11, 'compresor 1714xt', 'refripartes', '10400gt', '600.00', '1600.00', '2600.00', 9),
(12, 'Actuadores 523', 'autoclimas', 'TX3010Zv2', '700.00', '1000.00', '1400.00', 20),
(13, 'conectores', 'refripartes', 'cn4071tits', '600.00', '700.00', '800.00', 13),
(14, 'soplador doble', 'autoclimas', 'sp2gt1650s', '200.00', '600.00', '600.00', 25),
(15, 'balero 19000', 'refripartes', 'bagtx1650ti', '500.00', '700.00', '900.00', 12),
(16, 'relevadores 1050ti', 'refripartes', 'TX3010Z1050', '1500.00', '1900.00', '2300.00', 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `id` int(11) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `costo` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `historial_movimientos`
--
ALTER TABLE `historial_movimientos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inventario_id` (`inventario_id`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `historial_movimientos`
--
ALTER TABLE `historial_movimientos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `historial_movimientos`
--
ALTER TABLE `historial_movimientos`
  ADD CONSTRAINT `historial_movimientos_ibfk_1` FOREIGN KEY (`inventario_id`) REFERENCES `inventario` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
