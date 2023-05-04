-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-03-2023 a las 03:01:30
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `vetamalia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aplica`
--

CREATE TABLE `aplica` (
  `cedula_propietario` int(15) NOT NULL,
  `historial` int(50) NOT NULL,
  `codigo_vacuna` int(50) NOT NULL,
  `fecha_consulta` date NOT NULL,
  `dosis` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistente`
--

CREATE TABLE `asistente` (
  `cedula_asistente` int(15) NOT NULL,
  `login` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `asistente`
--

INSERT INTO `asistente` (`cedula_asistente`, `login`, `password`, `status`) VALUES
(12480910, 'jimenez', 'jimenez', 'activo'),
(28308177, 'user', 'user', 'activo'),
(330627032, 'lui', 'lui', 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cita`
--

CREATE TABLE `cita` (
  `cedula_asistente` int(15) NOT NULL,
  `cedula_propietario` int(15) NOT NULL,
  `historial` int(50) NOT NULL,
  `fecha_cita` date NOT NULL,
  `motivo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cita`
--

INSERT INTO `cita` (`cedula_asistente`, `cedula_propietario`, `historial`, `fecha_cita`, `motivo`) VALUES
(28308177, 13980710, 15, '2023-03-18', 'marsasa'),
(28308177, 28308177, 8, '2023-03-22', 'adasdsa'),
(12480910, 28308188, 17, '2023-03-31', 'ando engermo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clase`
--

CREATE TABLE `clase` (
  `codigo_phylum` int(70) NOT NULL,
  `descripcion` varchar(150) NOT NULL,
  `codigo_clase` int(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clase`
--

INSERT INTO `clase` (`codigo_phylum`, `descripcion`, `codigo_clase`) VALUES
(11, 'Mammalia', 10),
(11, 'Sauropsida', 11),
(11, 'Aves', 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consulta`
--

CREATE TABLE `consulta` (
  `cedula_propietario` int(15) NOT NULL,
  `historial` int(50) NOT NULL,
  `cedula_medico` int(15) NOT NULL,
  `fecha_consulta` date NOT NULL,
  `motivo` text NOT NULL,
  `rxm` varchar(50) NOT NULL,
  `pxm` varchar(50) NOT NULL,
  `temperatura` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `consulta`
--

INSERT INTO `consulta` (`cedula_propietario`, `historial`, `cedula_medico`, `fecha_consulta`, `motivo`, `rxm`, `pxm`, `temperatura`) VALUES
(28308177, 14, 28308177, '2023-03-17', 'Masd', '12', '12', '12'),
(28308188, 17, 1234567, '2023-03-10', 'mas', '12', '12', '12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especie`
--

CREATE TABLE `especie` (
  `codigo_genero` int(70) NOT NULL,
  `descripcion` varchar(150) NOT NULL,
  `codigo_especie` int(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `especie`
--

INSERT INTO `especie` (`codigo_genero`, `descripcion`, `codigo_especie`) VALUES
(6, 'Equus ferus', 22),
(7, 'Canis familiaris', 23),
(8, 'Felis silvestris', 24),
(9, 'Chelonoidis carbonaria', 25),
(10, 'Sus scrofa', 26),
(11, 'Capra aegagrus', 27),
(12, 'Gallus  gallus', 28),
(13, 'Ovis orientalis', 29),
(14, 'Oryctolagus cuniculus', 30);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `familia`
--

CREATE TABLE `familia` (
  `codigo_orden` int(70) NOT NULL,
  `descripcion` varchar(150) NOT NULL,
  `codigo_familia` int(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `familia`
--

INSERT INTO `familia` (`codigo_orden`, `descripcion`, `codigo_familia`) VALUES
(16, 'Equidae', 8),
(17, 'Canidae', 9),
(17, 'Felidae', 10),
(18, 'Testudinidae', 11),
(19, 'Suidae', 12),
(19, 'Bovidae', 13),
(20, 'Phasianidae', 14),
(21, 'Leporidae', 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `codigo_familia` int(70) NOT NULL,
  `descripcion` varchar(150) NOT NULL,
  `codigo_genero` int(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`codigo_familia`, `descripcion`, `codigo_genero`) VALUES
(8, 'Equus', 6),
(9, 'Canis', 7),
(10, 'Felis', 8),
(11, 'Chelonoidis', 9),
(12, 'Sus', 10),
(13, 'Capra', 11),
(14, 'Gallus', 12),
(13, 'Ovis', 13),
(15, 'Oryctolagus', 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mascota`
--

CREATE TABLE `mascota` (
  `cedula_propietario` int(15) NOT NULL,
  `cedula_asistente` int(15) NOT NULL,
  `historial` int(255) NOT NULL,
  `nombre_mascota` varchar(50) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `fecha_registro` date NOT NULL,
  `codigo_especie` int(70) NOT NULL,
  `sexo` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `mascota`
--

INSERT INTO `mascota` (`cedula_propietario`, `cedula_asistente`, `historial`, `nombre_mascota`, `fecha_nacimiento`, `fecha_registro`, `codigo_especie`, `sexo`) VALUES
(28308177, 28308177, 8, 'Luke', '2023-03-20', '2023-03-20', 22, 'Masculino'),
(28308177, 28308177, 14, 'Killua', '2023-03-10', '2023-03-18', 23, 'Masculino'),
(13980710, 28308177, 15, 'Coco', '2023-03-04', '2023-03-10', 23, 'Femenino'),
(13980710, 28308177, 16, 'kasandra', '2022-11-11', '2023-03-07', 25, 'Masculino'),
(28308188, 12480910, 17, 'goku', '2023-03-05', '2023-03-31', 23, 'Masculino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicina`
--

CREATE TABLE `medicina` (
  `codigo_medicina` int(150) NOT NULL,
  `nombre_medicina` varchar(150) NOT NULL,
  `costo` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `medicina`
--

INSERT INTO `medicina` (`codigo_medicina`, `nombre_medicina`, `costo`) VALUES
(6, 'Aminoval 120 ml Multivitamina para mascotas', 10),
(7, 'NexGard 10-25kg pastilla  / Tableta  contra pulgas y garrapatas', 16),
(8, 'NexGard 25-50kg pastilla / Tableta  Contra Pulgas y Garrapatas', 25),
(9, 'NexGard 4-10kg Pastilla / Tableta Contra Pulgas y Garrapatas', 18),
(10, 'NexGard 2-4kg Pastilla / Tableta Contra Pulgas y Garrapatas', 15),
(11, 'Vetcuten 30gr Crema Triple Para Mascotas', 10.5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medico`
--

CREATE TABLE `medico` (
  `cedula_medico` int(15) NOT NULL,
  `colegiatura` int(11) NOT NULL,
  `titulo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `medico`
--

INSERT INTO `medico` (`cedula_medico`, `colegiatura`, `titulo`) VALUES
(1234567, 1231231, 'bachiller'),
(28308177, 1321231231, 'veterinario'),
(32458710, 541452, 'bachiller');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden`
--

CREATE TABLE `orden` (
  `codigo_clase` int(70) NOT NULL,
  `descripcion` varchar(150) NOT NULL,
  `codigo_orden` int(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `orden`
--

INSERT INTO `orden` (`codigo_clase`, `descripcion`, `codigo_orden`) VALUES
(10, 'Perissodactyla', 16),
(10, 'Carnivora', 17),
(11, 'Testudines', 18),
(10, 'Artiodactyla', 19),
(12, 'Galliformes', 20),
(10, 'Lagomorpha', 21);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `cedula` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`cedula`, `nombre`, `apellido`) VALUES
(1234567, 'juan', 'gutierrez'),
(7654321, 'maria', 'mendoza'),
(12480910, 'Joaquin', 'Gutierrez'),
(13980710, 'Katiuska Elena', 'Salazar hernandez'),
(28308177, 'Ricardo Andrés ', 'Balducci Hernandez'),
(28308188, 'Ricardo Andrés ', 'Jimenez'),
(32458710, 'Rafael Alejandro', 'Zabala Hernandez'),
(330627032, 'luis', 'santos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `phylum`
--

CREATE TABLE `phylum` (
  `codigo_reino` int(70) NOT NULL,
  `descripcion` varchar(150) NOT NULL,
  `codigo_phylum` int(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `phylum`
--

INSERT INTO `phylum` (`codigo_reino`, `descripcion`, `codigo_phylum`) VALUES
(1, 'Acanthocephala', 1),
(1, 'Acoelomorpha', 2),
(1, 'Annelida', 4),
(1, 'Brachiopoda', 5),
(1, 'Bryozoa', 6),
(1, 'Chordata', 11),
(1, 'Chaetognatha', 22),
(1, 'Cnidaria	', 23),
(1, 'Ctenophora', 24),
(1, 'Cycliophora	', 25),
(1, 'Echinodermata', 26),
(1, 'Echiura	', 27),
(1, 'Entoprocta', 28),
(1, 'Gastrotrichia', 29),
(1, 'Gnathostomulida', 30),
(1, 'Hemichordata', 31),
(1, 'Kinorhyncha', 32),
(1, 'Loricifera', 33),
(1, 'Micrognathozoa', 34),
(1, 'Mollusca', 35),
(1, 'Monoblastozoa', 36),
(1, 'Myxozoa', 37),
(1, 'Nematoda', 38),
(1, 'Nematomorpha', 39),
(1, 'Nemertea', 40),
(1, 'Onychophora', 41),
(1, 'Orthonectida', 42),
(1, 'Phoronida', 43),
(1, 'Placozoa', 44),
(1, 'Platyhelminthes', 45),
(1, 'Pogonophora', 46),
(1, 'Porifera', 47),
(1, 'Priapulida', 48),
(1, 'Rhombozoa', 49),
(1, 'Rotifera', 50),
(1, 'Sipuncula', 51),
(1, 'Tardigrada', 52),
(1, 'Xenoturbellida', 53);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propietario`
--

CREATE TABLE `propietario` (
  `cedula_propietario` int(15) NOT NULL,
  `direccion` text NOT NULL,
  `telefono` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `propietario`
--

INSERT INTO `propietario` (`cedula_propietario`, `direccion`, `telefono`) VALUES
(7654321, 'el poblado', '4120951000'),
(13980710, 'Urbanización Sabanamar, Calle las marites.', '4120951000'),
(28308177, 'Urbanización Sabanamar, calle las Marites, centro comercial AB', '123123'),
(28308188, 'alcantara', '04120955000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `receta`
--

CREATE TABLE `receta` (
  `cedula_propietario` int(20) NOT NULL,
  `historial` int(50) NOT NULL,
  `codigo_medicina` int(50) NOT NULL,
  `fecha_consulta` date NOT NULL,
  `cantidad` varchar(50) NOT NULL,
  `tiempo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `receta`
--

INSERT INTO `receta` (`cedula_propietario`, `historial`, `codigo_medicina`, `fecha_consulta`, `cantidad`, `tiempo`) VALUES
(28308188, 17, 10, '2023-03-10', '12', '12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reino`
--

CREATE TABLE `reino` (
  `codigo_reino` int(20) NOT NULL,
  `descripcion` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `reino`
--

INSERT INTO `reino` (`codigo_reino`, `descripcion`) VALUES
(1, 'Animalia'),
(2, 'Plantae');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vacuna`
--

CREATE TABLE `vacuna` (
  `codigo_vacuna` int(150) NOT NULL,
  `nombre_vacuna` varchar(150) NOT NULL,
  `costo` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `vacuna`
--

INSERT INTO `vacuna` (`codigo_vacuna`, `nombre_vacuna`, `costo`) VALUES
(6, 'Distemper', 2),
(7, 'Parvovirus', 3),
(8, 'Hepatitis infecciosa', 3),
(9, 'Acenovirus canino II', 5),
(10, 'Leptospirosis', 1.2),
(11, 'vacuna contra la rabia', 1.5),
(12, 'moquillo', 1.2),
(13, 'Polivalente', 2.5),
(14, 'Trivalente', 2.5),
(15, 'Tetravalente', 1.2),
(16, 'Giardia', 30);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aplica`
--
ALTER TABLE `aplica`
  ADD PRIMARY KEY (`fecha_consulta`,`cedula_propietario`,`historial`,`codigo_vacuna`) USING BTREE,
  ADD KEY `cedula_propietario` (`cedula_propietario`),
  ADD KEY `historial` (`historial`),
  ADD KEY `codigo_vacuna` (`codigo_vacuna`);

--
-- Indices de la tabla `asistente`
--
ALTER TABLE `asistente`
  ADD UNIQUE KEY `cedula_asistente` (`cedula_asistente`) USING BTREE;

--
-- Indices de la tabla `cita`
--
ALTER TABLE `cita`
  ADD PRIMARY KEY (`cedula_propietario`,`historial`,`fecha_cita`),
  ADD KEY `historial` (`historial`),
  ADD KEY `cita_ibfk_1` (`cedula_asistente`);

--
-- Indices de la tabla `clase`
--
ALTER TABLE `clase`
  ADD PRIMARY KEY (`codigo_clase`),
  ADD KEY `codigo_phylum` (`codigo_phylum`);

--
-- Indices de la tabla `consulta`
--
ALTER TABLE `consulta`
  ADD PRIMARY KEY (`cedula_propietario`,`historial`,`fecha_consulta`),
  ADD KEY `historial` (`historial`),
  ADD KEY `cedula_medico` (`cedula_medico`),
  ADD KEY `fecha_consulta` (`fecha_consulta`);

--
-- Indices de la tabla `especie`
--
ALTER TABLE `especie`
  ADD PRIMARY KEY (`codigo_especie`),
  ADD KEY `codigo_genero` (`codigo_genero`);

--
-- Indices de la tabla `familia`
--
ALTER TABLE `familia`
  ADD PRIMARY KEY (`codigo_familia`),
  ADD KEY `codigo_orden` (`codigo_orden`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`codigo_genero`),
  ADD KEY `codigo_familia` (`codigo_familia`);

--
-- Indices de la tabla `mascota`
--
ALTER TABLE `mascota`
  ADD PRIMARY KEY (`historial`),
  ADD KEY `cedula_asistente` (`cedula_asistente`),
  ADD KEY `cedula_propietario` (`cedula_propietario`),
  ADD KEY `codigo_especie` (`codigo_especie`);

--
-- Indices de la tabla `medicina`
--
ALTER TABLE `medicina`
  ADD PRIMARY KEY (`codigo_medicina`);

--
-- Indices de la tabla `medico`
--
ALTER TABLE `medico`
  ADD UNIQUE KEY `cedula_medico` (`cedula_medico`) USING BTREE;

--
-- Indices de la tabla `orden`
--
ALTER TABLE `orden`
  ADD PRIMARY KEY (`codigo_orden`),
  ADD KEY `codigo_clase` (`codigo_clase`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`cedula`);

--
-- Indices de la tabla `phylum`
--
ALTER TABLE `phylum`
  ADD PRIMARY KEY (`codigo_phylum`),
  ADD KEY `codigo_reino` (`codigo_reino`);

--
-- Indices de la tabla `propietario`
--
ALTER TABLE `propietario`
  ADD UNIQUE KEY `cedula_propietario` (`cedula_propietario`) USING BTREE;

--
-- Indices de la tabla `receta`
--
ALTER TABLE `receta`
  ADD PRIMARY KEY (`fecha_consulta`,`cedula_propietario`,`historial`,`codigo_medicina`) USING BTREE,
  ADD KEY `cedula_propietario` (`cedula_propietario`),
  ADD KEY `historial` (`historial`),
  ADD KEY `codigo_medicina` (`codigo_medicina`);

--
-- Indices de la tabla `reino`
--
ALTER TABLE `reino`
  ADD PRIMARY KEY (`codigo_reino`);

--
-- Indices de la tabla `vacuna`
--
ALTER TABLE `vacuna`
  ADD PRIMARY KEY (`codigo_vacuna`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clase`
--
ALTER TABLE `clase`
  MODIFY `codigo_clase` int(70) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `especie`
--
ALTER TABLE `especie`
  MODIFY `codigo_especie` int(70) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `familia`
--
ALTER TABLE `familia`
  MODIFY `codigo_familia` int(70) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `codigo_genero` int(70) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `mascota`
--
ALTER TABLE `mascota`
  MODIFY `historial` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `medicina`
--
ALTER TABLE `medicina`
  MODIFY `codigo_medicina` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `orden`
--
ALTER TABLE `orden`
  MODIFY `codigo_orden` int(70) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `phylum`
--
ALTER TABLE `phylum`
  MODIFY `codigo_phylum` int(70) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT de la tabla `reino`
--
ALTER TABLE `reino`
  MODIFY `codigo_reino` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `vacuna`
--
ALTER TABLE `vacuna`
  MODIFY `codigo_vacuna` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `aplica`
--
ALTER TABLE `aplica`
  ADD CONSTRAINT `aplica_ibfk_1` FOREIGN KEY (`fecha_consulta`) REFERENCES `consulta` (`fecha_consulta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `aplica_ibfk_2` FOREIGN KEY (`cedula_propietario`) REFERENCES `consulta` (`cedula_propietario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `aplica_ibfk_3` FOREIGN KEY (`historial`) REFERENCES `consulta` (`historial`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `aplica_ibfk_4` FOREIGN KEY (`codigo_vacuna`) REFERENCES `vacuna` (`codigo_vacuna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `asistente`
--
ALTER TABLE `asistente`
  ADD CONSTRAINT `asistente_ibfk_1` FOREIGN KEY (`cedula_asistente`) REFERENCES `persona` (`cedula`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cita`
--
ALTER TABLE `cita`
  ADD CONSTRAINT `cita_ibfk_1` FOREIGN KEY (`cedula_asistente`) REFERENCES `mascota` (`cedula_asistente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cita_ibfk_2` FOREIGN KEY (`cedula_propietario`) REFERENCES `mascota` (`cedula_propietario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cita_ibfk_3` FOREIGN KEY (`historial`) REFERENCES `mascota` (`historial`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `clase`
--
ALTER TABLE `clase`
  ADD CONSTRAINT `clase_ibfk_1` FOREIGN KEY (`codigo_phylum`) REFERENCES `phylum` (`codigo_phylum`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `consulta`
--
ALTER TABLE `consulta`
  ADD CONSTRAINT `consulta_ibfk_1` FOREIGN KEY (`cedula_propietario`) REFERENCES `mascota` (`cedula_propietario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `consulta_ibfk_2` FOREIGN KEY (`historial`) REFERENCES `mascota` (`historial`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `consulta_ibfk_3` FOREIGN KEY (`cedula_medico`) REFERENCES `medico` (`cedula_medico`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `especie`
--
ALTER TABLE `especie`
  ADD CONSTRAINT `especie_ibfk_1` FOREIGN KEY (`codigo_genero`) REFERENCES `genero` (`codigo_genero`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `familia`
--
ALTER TABLE `familia`
  ADD CONSTRAINT `familia_ibfk_1` FOREIGN KEY (`codigo_orden`) REFERENCES `orden` (`codigo_orden`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `genero`
--
ALTER TABLE `genero`
  ADD CONSTRAINT `genero_ibfk_1` FOREIGN KEY (`codigo_familia`) REFERENCES `familia` (`codigo_familia`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `mascota`
--
ALTER TABLE `mascota`
  ADD CONSTRAINT `mascota_ibfk_4` FOREIGN KEY (`cedula_asistente`) REFERENCES `asistente` (`cedula_asistente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mascota_ibfk_5` FOREIGN KEY (`cedula_propietario`) REFERENCES `propietario` (`cedula_propietario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mascota_ibfk_6` FOREIGN KEY (`codigo_especie`) REFERENCES `especie` (`codigo_especie`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `medico`
--
ALTER TABLE `medico`
  ADD CONSTRAINT `medico_ibfk_1` FOREIGN KEY (`cedula_medico`) REFERENCES `persona` (`cedula`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `orden`
--
ALTER TABLE `orden`
  ADD CONSTRAINT `orden_ibfk_1` FOREIGN KEY (`codigo_clase`) REFERENCES `clase` (`codigo_clase`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `phylum`
--
ALTER TABLE `phylum`
  ADD CONSTRAINT `phylum_ibfk_1` FOREIGN KEY (`codigo_reino`) REFERENCES `reino` (`codigo_reino`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `propietario`
--
ALTER TABLE `propietario`
  ADD CONSTRAINT `propietario_ibfk_1` FOREIGN KEY (`cedula_propietario`) REFERENCES `persona` (`cedula`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `receta`
--
ALTER TABLE `receta`
  ADD CONSTRAINT `receta_ibfk_1` FOREIGN KEY (`fecha_consulta`) REFERENCES `consulta` (`fecha_consulta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `receta_ibfk_2` FOREIGN KEY (`cedula_propietario`) REFERENCES `consulta` (`cedula_propietario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `receta_ibfk_3` FOREIGN KEY (`historial`) REFERENCES `consulta` (`historial`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `receta_ibfk_4` FOREIGN KEY (`codigo_medicina`) REFERENCES `medicina` (`codigo_medicina`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
