-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-02-2023 a las 01:14:32
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
-- Base de datos: `reservas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agenda`
--

CREATE TABLE `agenda` (
  `id` int(10) NOT NULL,
  `title` varchar(150) DEFAULT NULL,
  `body` text NOT NULL,
  `url` varchar(150) NOT NULL,
  `class` varchar(45) NOT NULL DEFAULT 'event-important',
  `start` varchar(15) NOT NULL,
  `end` varchar(15) NOT NULL,
  `inicio_normal` varchar(50) NOT NULL,
  `final_normal` varchar(50) NOT NULL,
  `idusu` bigint(20) NOT NULL,
  `idres` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracion`
--

CREATE TABLE `configuracion` (
  `idcof` int(11) NOT NULL,
  `nitcof` varchar(100) NOT NULL,
  `titcof` varchar(100) NOT NULL,
  `imgcof` varchar(255) NOT NULL,
  `descof` varchar(255) NOT NULL,
  `piecof` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dominio`
--

CREATE TABLE `dominio` (
  `iddom` int(11) NOT NULL,
  `nomdom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `dominio`
--

INSERT INTO `dominio` (`iddom`, `nomdom`) VALUES
(1, 'Categorías'),
(2, 'Tipo documento');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagina`
--

CREATE TABLE `pagina` (
  `idpag` bigint(20) NOT NULL,
  `nompag` varchar(255) CHARACTER SET latin1 NOT NULL,
  `rutpag` varchar(255) CHARACTER SET latin1 NOT NULL,
  `mospag` tinyint(1) NOT NULL,
  `ordpag` int(11) NOT NULL,
  `icopag` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pagina`
--

INSERT INTO `pagina` (`idpag`, `nompag`, `rutpag`, `mospag`, `ordpag`, `icopag`) VALUES
(1002, 'Página', 'views/vpag.php', 1, 42, 'bx bxs-file'),
(1003, 'Perfil', 'views/vpef.php', 1, 43, 'bx bx-id-card'),
(1004, 'Dominio', 'views/vdom.php', 1, 44, 'bx bxs-data'),
(1005, 'Valor', 'views/vval.php', 1, 45, 'bx bx-box'),
(1006, 'Configuración', 'views/vcon.php', 1, 46, 'bx bxs-cog'),
(1007, 'Usuarios', 'views/vusu.php', 1, 21, 'bx bxs-group'),
(1008, 'Inicio', 'views/vres.php', 1, 1, 'bx bxs-home'),
(1024, 'Agenda', 'views/vage.php', 1, 3, 'bx bx-library');

-- --------------------------------------------------------

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
(1024, 1);

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
-- Estructura de tabla para la tabla `reservar`
--

CREATE TABLE `reservar` (
  `idres` bigint(11) NOT NULL,
  `idusu` bigint(20) NOT NULL,
  `fecini` time NOT NULL,
  `fecend` time NOT NULL,
  `diares` date NOT NULL,
  `actres` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `reservar`
--

INSERT INTO `reservar` (`idres`, `idusu`, `fecini`, `fecend`, `diares`, `actres`) VALUES
(1, 1, '07:00:00', '08:00:00', '2022-12-07', 1),
(2, 1, '08:00:00', '09:00:00', '2022-12-07', 2),
(3, 1, '09:00:00', '10:00:00', '2022-12-07', 2),
(4, 1, '10:00:00', '11:00:00', '2022-12-07', 2),
(5, 1, '11:00:00', '12:00:00', '2022-12-07', 2),
(6, 1, '12:00:00', '13:00:00', '2022-12-07', 2),
(7, 1, '13:00:00', '14:00:00', '2022-12-07', 2),
(8, 1, '14:00:00', '15:00:00', '2022-12-07', 2),
(9, 1, '16:00:00', '17:00:00', '2022-12-07', 2),
(10, 1, '17:00:00', '18:00:00', '2022-12-07', 2),
(11, 1, '18:00:00', '19:00:00', '2022-12-07', 2),
(12, 1, '19:00:00', '20:00:00', '2022-12-07', 2);

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
(1, 31, 1006148721, 'Daniel', 'Ramos', 1, 'e2dd1a14f537e10073491253925de0dbdf6ff4cf', 'admin@reservas.com', 1, NULL, '', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valor`
--

CREATE TABLE `valor` (
  `idval` int(11) NOT NULL,
  `nomval` varchar(255) NOT NULL,
  `iddom` int(11) NOT NULL,
  `parval` varchar(255) NOT NULL,
  `act` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `valor`
--

INSERT INTO `valor` (`idval`, `nomval`, `iddom`, `parval`, `act`) VALUES
(1, 'A1', 1, '', 1),
(2, 'B1', 1, '', 1),
(3, 'C1', 1, '', 1),
(31, 'Cédula de ciudadanía', 2, '', 1),
(32, 'Cédula de extranjería', 2, '', 1),
(33, 'Pasaporte', 2, '', 1),
(34, 'Tarjeta de Identidad', 2, '', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idusu` (`idusu`),
  ADD KEY `idres` (`idres`);

--
-- Indices de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  ADD PRIMARY KEY (`idcof`);

--
-- Indices de la tabla `dominio`
--
ALTER TABLE `dominio`
  ADD PRIMARY KEY (`iddom`);

--
-- Indices de la tabla `pagina`
--
ALTER TABLE `pagina`
  ADD PRIMARY KEY (`idpag`);

--
-- Indices de la tabla `pagper`
--
ALTER TABLE `pagper`
  ADD KEY `idpag` (`idpag`),
  ADD KEY `idper` (`idper`);

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`idper`);

--
-- Indices de la tabla `reservar`
--
ALTER TABLE `reservar`
  ADD PRIMARY KEY (`idres`),
  ADD KEY `idusu` (`idusu`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusu`),
  ADD KEY `tdocusu` (`tdocusu`),
  ADD KEY `idper` (`idper`);

--
-- Indices de la tabla `valor`
--
ALTER TABLE `valor`
  ADD PRIMARY KEY (`idval`),
  ADD KEY `FK_iddom` (`iddom`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  MODIFY `idcof` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `dominio`
--
ALTER TABLE `dominio`
  MODIFY `iddom` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `perfil`
--
ALTER TABLE `perfil`
  MODIFY `idper` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `reservar`
--
ALTER TABLE `reservar`
  MODIFY `idres` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusu` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `valor`
--
ALTER TABLE `valor`
  MODIFY `idval` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `agenda`
--
ALTER TABLE `agenda`
  ADD CONSTRAINT `agenda_ibfk_1` FOREIGN KEY (`idusu`) REFERENCES `usuario` (`idusu`),
  ADD CONSTRAINT `agenda_ibfk_2` FOREIGN KEY (`idres`) REFERENCES `reservar` (`idres`);

--
-- Filtros para la tabla `pagper`
--
ALTER TABLE `pagper`
  ADD CONSTRAINT `pagper_ibfk_1` FOREIGN KEY (`idper`) REFERENCES `perfil` (`idper`),
  ADD CONSTRAINT `pagper_ibfk_2` FOREIGN KEY (`idpag`) REFERENCES `pagina` (`idpag`);

--
-- Filtros para la tabla `reservar`
--
ALTER TABLE `reservar`
  ADD CONSTRAINT `reservar_ibfk_1` FOREIGN KEY (`idusu`) REFERENCES `usuario` (`idusu`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`idper`) REFERENCES `perfil` (`idper`);

--
-- Filtros para la tabla `valor`
--
ALTER TABLE `valor`
  ADD CONSTRAINT `valor_ibfk_1` FOREIGN KEY (`iddom`) REFERENCES `dominio` (`iddom`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
