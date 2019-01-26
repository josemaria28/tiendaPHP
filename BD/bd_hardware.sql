-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-01-2019 a las 23:28:01
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.0.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_hardware`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `DNI` varchar(9) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `Direccion` varchar(30) NOT NULL,
  `Usuario` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Tipo` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`DNI`, `Nombre`, `Direccion`, `Usuario`, `Password`, `Tipo`) VALUES
('d1', 'josemaria', 'josemaria', 'josemaria', 'josemaria', 'admin'),
('d2', 'juan', 'juan', 'juan', 'juan', 'usuario'),
('d3', 'maria', 'maria', 'maria', 'maria', 'usuario'),
('d4', 'pepe', 'pepe', 'pepe', 'pepe', 'usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `familia`
--

CREATE TABLE `familia` (
  `COD` varchar(10) NOT NULL,
  `NOMBRE` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `familia`
--

INSERT INTO `familia` (`COD`, `NOMBRE`) VALUES
('Externo', 'Perifericos'),
('Interno', 'Hardware');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lineas`
--

CREATE TABLE `lineas` (
  `Num_Pedido` int(4) NOT NULL,
  `Num_linea` int(6) NOT NULL,
  `Producto` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `Num_Pedido` int(4) NOT NULL,
  `DNI` varchar(9) DEFAULT NULL,
  `Fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Total_pedido` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`Num_Pedido`, `DNI`, `Fecha`, `Total_pedido`) VALUES
(1, 'd1', '2019-01-16 19:46:57', 1),
(2, 'd4', '2019-01-16 19:47:22', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `COD` varchar(12) NOT NULL,
  `Nombre` varchar(200) NOT NULL,
  `nombre_corto` varchar(50) NOT NULL,
  `Descripcion` text NOT NULL,
  `PVP` float(10,2) NOT NULL,
  `Familia` varchar(15) NOT NULL,
  `Stock` int(3) NOT NULL,
  `Foto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`COD`, `Nombre`, `nombre_corto`, `Descripcion`, `PVP`, `Familia`, `Stock`, `Foto`) VALUES
('AMD-1900X', 'AMD Ryzen Threadripper 1900X 3.8 GHz', 'AMD Ryzen Threadripper 1900X', '    Hasta 8 núcleos y 16 subprocesos para cargas de trabajo creativo de asombrosa velocidad.\r\n    La inaudita posibilidad de usar 64 carriles PCIe® Gen3 para satisfacer las grandes necesidades de GPU y NVMe.\r\n    20 MB de caché combinada para obtener acceso rápido a grandes conjuntos de datos.\r\n    DDR4 de cuatro canales compatible con ECC para brindar un rendimiento confiable.', 323.56, 'Interno', 8, ''),
('G-B450M-DS3H', 'Gigabyte B450M DS3H', 'Gigabyte B450M', 'Las placas base GIGABYTE serie 400 maximizan el potencial de su PC con la tecnología AMD StoreMI. StoreMI acelera los dispositivos de almacenamiento tradicionales para reducir los tiempos de arranque y mejorar la experiencia general del usuario. Esta utilidad fácil de usar combina la velocidad de las SSD con la alta capacidad de las unidades de disco duro en una sola unidad, mejora las velocidades de lectura / escritura del dispositivo para que coincida con las SSD, aumenta el rendimiento de los datos a un valor increíble y transforma las PC de uso cotidiano a un sistema impulsado por el rendimiento.', 70.00, 'Interno', 4, ''),
('i7-8700K', 'Intel Core i7-8700K 3.7Ghz BOX', 'Core i7-8700K', 'Te presentamos el Intel Core i7-8700K, un procesador de 8ª Generación, con socket Intel 1151.', 54.00, 'Interno', 2, ''),
('K-A400', 'Kingston A400 SSD 120GB', 'Kingston A400', '    Arranques, cargas y transferencias de archivos todos con mayor rapidez\r\n    Más fiable y duradera que las unidades de disco duro\r\n    Varias capacidades, para almacenar las aplicaciones o sustituir del todo unidades de disco duro.', 41.30, 'Interno', 2, ''),
('LK-K120', 'Logitech Keyboard K120 Teclado USB', 'Logitech Keyboard', 'Escritura cómoda. Disfrutará de teclas planas que apenas hacen ruido y un diseño estándar con teclas F y teclado numérico de tamaño normal.', 21.00, 'Externo', 9, ''),
('LW-M570', 'Logitech Wireless Trackball M570', 'Logitech Wireless Trackball', 'Comodidad prolongada\r\nTrabaje con un trackball estable de diseño contorneado, cómodo para la mano y también para el brazo.\r\nPequeño, pero muy útil\r\nLogitech® Unifying es un minúsculo receptor inalámbrico que puede permanecer conectado al ordenador portátil y permite conectar dispositivos compatibles cuando se necesitan.\r\nSuperpotencia\r\nCon 18 meses de uso alimentado por una sola pila AA, puede que hasta se olvide de que el trackball necesita pilas.*', 32.00, 'Externo', 4, '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`DNI`);

--
-- Indices de la tabla `familia`
--
ALTER TABLE `familia`
  ADD PRIMARY KEY (`COD`);

--
-- Indices de la tabla `lineas`
--
ALTER TABLE `lineas`
  ADD PRIMARY KEY (`Num_Pedido`),
  ADD UNIQUE KEY `U_linea` (`Num_linea`),
  ADD KEY `FK_PRODUCTO` (`Producto`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`Num_Pedido`),
  ADD UNIQUE KEY `DNI` (`DNI`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`COD`),
  ADD UNIQUE KEY `U_Corto` (`nombre_corto`),
  ADD KEY `FK_NUMERO_Familia` (`Familia`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `lineas`
--
ALTER TABLE `lineas`
  MODIFY `Num_linea` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `Num_Pedido` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `lineas`
--
ALTER TABLE `lineas`
  ADD CONSTRAINT `FK_NUMERO_PEDIDO` FOREIGN KEY (`Num_Pedido`) REFERENCES `pedidos` (`Num_Pedido`),
  ADD CONSTRAINT `FK_PRODUCTO` FOREIGN KEY (`Producto`) REFERENCES `producto` (`COD`);

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `FK_DNI` FOREIGN KEY (`DNI`) REFERENCES `clientes` (`DNI`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `FK_NUMERO_Familia` FOREIGN KEY (`Familia`) REFERENCES `familia` (`COD`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
