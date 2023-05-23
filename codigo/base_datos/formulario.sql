-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 14-05-2021 a las 03:17:42
-- Versión del servidor: 8.0.21
-- Versión de PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `formulario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dir`
--

DROP TABLE IF EXISTS `dir`;
CREATE TABLE IF NOT EXISTS `dir` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cuenta` int NOT NULL,
  `banco` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cuota` int NOT NULL,
  `telefono` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `dir`
--

INSERT INTO `dir` (`id`, `name`, `cuenta`, `banco`, `cuota`, `telefono`) VALUES
(1, 'Luis', 1092834761, 'BBVA', 2500, 220191482);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensual`
--

DROP TABLE IF EXISTS `mensual`;
CREATE TABLE IF NOT EXISTS `mensual` (
  `mes` int NOT NULL,
  `total` int NOT NULL,
  `falta` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `mensual`
--

INSERT INTO `mensual` (`mes`, `total`, `falta`) VALUES
(5, 1000, 'Profesor'),
(5, 1000, 'Profesor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarjeta`
--

DROP TABLE IF EXISTS `tarjeta`;
CREATE TABLE IF NOT EXISTS `tarjeta` (
  `id` int NOT NULL,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `num` int NOT NULL,
  `mes` int NOT NULL,
  `anio` int NOT NULL,
  `cvv` int NOT NULL,
  `monto` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tarjeta`
--

INSERT INTO `tarjeta` (`id`, `nombre`, `num`, `mes`, `anio`, `cvv`, `monto`) VALUES
(21, 'Luis Gomez', 2147483647, 1, 22, 123, 2000),
(20, 'Luis Alberto Gomez', 2147483647, 1, 23, 123, 2000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `contra` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cumple` date NOT NULL,
  `taxi` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cuota` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nom`, `email`, `contra`, `cumple`, `taxi`, `cuota`) VALUES
(18, 'Dirigente', 'dirigente@mail.com', 'dirigente123', '1998-07-14', 'la-gc-22', 'NO PAGADA'),
(19, 'Profesor', 'yomero@profesor.com', '123456', '1994-05-22', 'yo94mero', 'NO PAGADA'),
(20, 'Prueba 1', 'prueba1@mail.com', '123', '1990-03-11', '12lmdq', 'PAGADA'),
(21, 'Luis Alberto', 'luis@mail.com', '123456', '1998-07-14', 'GLQ12', 'PAGADA');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
