-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-07-2026 a las 17:45:47
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mundo_animal`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `animales`
--

CREATE TABLE `animales` (
  `id` int(11) NOT NULL,
  `nombre_animal` varchar(50) DEFAULT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `otro_tipo` varchar(50) DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL,
  `nombre_dueno` varchar(50) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `animales`
--

INSERT INTO `animales` (`id`, `nombre_animal`, `tipo`, `otro_tipo`, `edad`, `color`, `nombre_dueno`, `telefono`, `correo`, `direccion`) VALUES
(5, 'Kira ', 'Gato', '', 8, 'Blanco', 'Gerth', '04243139180', 'valguo@gmail.com', 'Maracay'),
(6, 'Rockky', 'Otro', 'Lobo', 7, 'Negro', 'Naeth', '04244425637', 'donacame16@gmail.com', 'Guarenas, Miranda'),
(7, 'Pepe', 'Ave', '', 10, 'Azul y Amarillo', 'Stephan', '04140000000', 'mendez@gmail.com', 'Barquisimeto'),
(8, 'Encaje Antiguo', 'Otro', 'Iguana', 6, 'Verde', 'Chases', '04128735792', 'gerth@gmail.com', 'Caracas'),
(9, 'Luna', 'Perro', '', 7, 'Gris', 'Samanta', '04249852573', 'coreastm@gmail.com', 'San Juan de los Morros'),
(10, 'Alex', 'Otro', 'Lince ', 3, 'Rayado', 'Tony', '04168338011', 'jarvis2099@gmail.com', 'Colonia Tovar');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `animales`
--
ALTER TABLE `animales`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `animales`
--
ALTER TABLE `animales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
