-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-11-2022 a las 00:39:06
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `Reserva`
--





--
-- Estructura de tabla para la tabla `pagper`
--

CREATE TABLE `pagper` (
  `idpag` bigint(20) NOT NULL,
  `idper` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pagper`
--

INSERT INTO `pagper` (`idpag`, `idper`) VALUES
(1002, 1),
(1003, 1),
(1004, 1),
(1005, 1),
(1006, 1),
(1007, 1),
(1008, 1),
(1024, 1),
(1020, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE `perfil` (
  `idper` int(11) NOT NULL,
  `nomper` varchar(70) NOT NULL,
  `pagprin` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`idper`, `nomper`, `pagprin`) VALUES
(1, 'Super Administrador', 1002),
(2, 'Administrador', 1002),
(3, 'Usuario', 1002);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusu` bigint(20) NOT NULL,
  `tdocusu` int(11) DEFAULT NULL,
  `ndocusu` bigint(20) NOT NULL,
  `nomusu` varchar(70) NOT NULL,
  `apeusu` varchar(50) NOT NULL,
  `idper` int(11) NOT NULL,
  `pasusu` varchar(70) NOT NULL,
  `emausu` varchar(70) DEFAULT NULL,
  `actusu` tinyint(1) NOT NULL,
  `fotusu` varchar(255) DEFAULT NULL,
  `telusu` varchar(15) NOT NULL,
  `claolv` varchar(255) DEFAULT NULL,
  `fecholv` datetime DEFAULT NULL,
  `idgoogle` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusu`, `tdocusu`, `ndocusu`, `nomusu`, `apeusu`, `idper`, `pasusu`, `emausu`, `actusu`, `fotusu`, `telusu`, `claolv`, `fecholv`, `idgoogle`) VALUES
(1, 1, 1006148721, 'Johan Esteban', 'Barco Torres', 1, 'e2dd1a14f537e10073491253925de0dbdf6ff4cf', 'admin@famacha.com', 1, NULL, '', NULL, NULL, NULL);







--
-- Indices de la tabla `pagper`
--
ALTER TABLE `pagper`
  ADD KEY `idpag` (`idpag`),
  ADD KEY `idper` (`idper`);



--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusu`),
  ADD KEY `tdocusu` (`tdocusu`),
  ADD KEY `idper` (`idper`);

--








--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusu` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;


--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`idper`) REFERENCES `perfil` (`idper`),
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`tdocusu`) REFERENCES `valor` (`idval`);



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
