-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-05-2025 a las 18:06:19
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
-- Base de datos: `db_internado`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE `cargo` (
  `id_cargo` int(11) NOT NULL,
  `cargo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`id_cargo`, `cargo`) VALUES
(1, 'administrador'),
(2, 'enfermeria'),
(3, 'jefe_enfermeria'),
(4, 'medico'),
(5, 'jefe_medico'),
(6, 'psicologia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_medico`
--

CREATE TABLE `detalle_medico` (
  `id` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `diagnostico` text DEFAULT NULL,
  `judicial` varchar(50) DEFAULT NULL,
  `fecha_inf_judicial` date NOT NULL,
  `ficha` varchar(100) DEFAULT NULL,
  `sala` varchar(20) DEFAULT NULL,
  `estado` varchar(100) DEFAULT NULL,
  `deposito` varchar(100) DEFAULT NULL,
  `obs` varchar(250) NOT NULL,
  `fecha_registro` timestamp NULL DEFAULT current_timestamp(),
  `fecha_actualizacion` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detalle_medico`
--

INSERT INTO `detalle_medico` (`id`, `id_paciente`, `diagnostico`, `judicial`, `fecha_inf_judicial`, `ficha`, `sala`, `estado`, `deposito`, `obs`, `fecha_registro`, `fecha_actualizacion`) VALUES
(12, 22, 'f-31', 'judicial', '2025-05-03', '1', 'clinica', '', '', '', '2025-05-03 22:34:33', '2025-05-03 22:35:18'),
(13, 23, 'f-20', 'no judicial', '0000-00-00', '2', 'colectiva', 'permiso', '', '', '2025-05-03 22:37:16', '2025-05-03 22:38:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `mensaje` text NOT NULL,
  `leido` tinyint(1) DEFAULT 0,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`id`, `sender_id`, `receiver_id`, `mensaje`, `leido`, `fecha`) VALUES
(0, 16, 3, 'hola', 1, '2025-04-27 18:27:50'),
(0, 15, 3, 'hola psicologa, sabes que este usuario amerita una evaluacion?', 1, '2025-04-27 18:34:45'),
(0, 3, 15, 'gracias compañero por avisar', 1, '2025-04-27 18:35:23'),
(0, 16, 3, 'g', 1, '2025-04-27 18:40:45'),
(0, 3, 16, 'hola dr. tengo una urgencia en sala de seguridad', 1, '2025-04-27 18:52:39'),
(0, 16, 3, 'recibido', 1, '2025-04-27 18:52:55'),
(0, 3, 4, 'hola', 1, '2025-04-27 19:46:02'),
(0, 3, 4, 'hola', 1, '2025-04-27 19:46:08'),
(0, 3, 4, 'f', 1, '2025-04-27 19:46:37'),
(0, 3, 15, 'gddd', 1, '2025-04-27 21:25:34'),
(0, 16, 3, 'HOLA', 1, '2025-04-27 22:55:48'),
(0, 16, 3, 'hola', 1, '2025-04-27 23:18:39'),
(0, 16, 3, 'buena noche', 1, '2025-04-27 23:38:14'),
(0, 16, 3, 'G', 1, '2025-04-28 09:24:34'),
(0, 16, 3, 'hola', 1, '2025-04-28 11:24:53'),
(0, 16, 3, 'fff', 1, '2025-04-28 11:28:49'),
(0, 16, 3, 'gggg', 1, '2025-04-28 11:29:14'),
(0, 3, 16, 'good morning', 1, '2025-04-28 11:44:57'),
(0, 16, 3, 'buen dia amigo', 1, '2025-04-28 16:15:51'),
(0, 3, 4, 'hola lic teresa', 1, '2025-04-28 16:37:43'),
(0, 4, 15, 'holah', 1, '2025-04-28 21:16:07'),
(0, 4, 3, 'buenas noche lic Juan', 1, '2025-04-29 23:58:46'),
(0, 3, 4, 'Hola', 0, '2025-05-03 18:22:22'),
(0, 16, 3, 'hola juan esteban', 1, '2025-05-03 23:52:30'),
(0, 3, 16, 'buenas noche dr.', 1, '2025-05-03 23:53:00'),
(0, 3, 16, 'hola', 1, '2025-05-04 00:01:46'),
(0, 3, 16, 'ggdg', 1, '2025-05-04 00:02:06'),
(0, 16, 3, 'bncbbcgdg', 1, '2025-05-04 00:03:45'),
(0, 16, 3, 'gdgdg', 1, '2025-05-04 00:03:54'),
(0, 16, 3, 'gggg', 1, '2025-05-04 00:05:40'),
(0, 16, 3, 'gggg', 1, '2025-05-04 00:06:34'),
(0, 16, 3, 'kgkmdkg', 1, '2025-05-04 00:18:59'),
(0, 16, 3, 'mlklk', 1, '2025-05-04 00:23:20'),
(0, 16, 3, 'dgdgsg', 1, '2025-05-04 00:35:26'),
(0, 16, 3, 'jjjhjhh', 1, '2025-05-04 00:45:09'),
(0, 16, 3, 'fhfhfhf', 1, '2025-05-04 00:45:34'),
(0, 16, 3, 'grgrgr', 1, '2025-05-04 00:45:58'),
(0, 3, 16, 'mbdnbknbknb', 1, '2025-05-04 00:47:48'),
(0, 3, 16, 'bfbfbfbf', 1, '2025-05-04 00:48:20'),
(0, 16, 3, 'kmfkmfkb', 1, '2025-05-04 00:48:53'),
(0, 16, 3, 'Hola', 1, '2025-05-04 01:03:51'),
(0, 3, 16, 'kgkgkgkgkg', 1, '2025-05-04 01:04:23'),
(0, 3, 16, 'mvmvv', 1, '2025-05-04 01:04:32'),
(0, 3, 4, 'hola', 0, '2025-05-04 12:47:18'),
(0, 16, 3, 'Hola', 1, '2025-05-04 14:09:19'),
(0, 16, 3, 'Hola', 1, '2025-05-04 14:10:05'),
(0, 3, 4, 'hola', 0, '2025-05-04 22:51:18'),
(0, 16, 3, 'Hola', 1, '2025-05-04 23:23:03'),
(0, 16, 3, 'J', 1, '2025-05-04 23:24:17'),
(0, 3, 16, 'jbjb', 1, '2025-05-04 23:25:07'),
(0, 3, 16, ',jbkb', 1, '2025-05-04 23:25:17'),
(0, 16, 3, 'Hhjwkkw', 1, '2025-05-04 23:25:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `cedula` varchar(20) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `archivo` varchar(255) DEFAULT NULL,
  `direccion` text DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `pais` varchar(100) DEFAULT NULL,
  `responsable` varchar(200) DEFAULT NULL,
  `id_usuario` int(11) NOT NULL,
  `estado` varchar(100) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `sala` varchar(20) NOT NULL,
  `fecha_egreso` date NOT NULL,
  `dia_internacion` int(10) DEFAULT NULL,
  `observacion` varchar(100) NOT NULL,
  `fecha_registro` date NOT NULL DEFAULT current_timestamp(),
  `fecha_actualizacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`id`, `nombre`, `apellido`, `cedula`, `fecha_nacimiento`, `archivo`, `direccion`, `telefono`, `pais`, `responsable`, `id_usuario`, `estado`, `fecha_ingreso`, `sala`, `fecha_egreso`, `dia_internacion`, `observacion`, `fecha_registro`, `fecha_actualizacion`) VALUES
(22, 'JUAN', 'LUGO', '4493380', '1987-12-26', '1000', 'CALLE1', '0986447000', 'PARAGUAY', 'YO', 3, 'internado', '2025-05-03', 'clinica', '0000-00-00', NULL, '', '2025-05-04', '2025-05-05 16:04:52'),
(23, 'ESTEBAN', 'BENITEZ', '4423385', '1986-12-26', '1001', 'CALLE2', '0986447416', 'ARGENTINA', 'YO', 3, 'permiso', '2025-05-03', 'seguridad', '2025-05-04', 1, 'con familiar', '2025-05-04', '2025-05-03 22:38:55');

--
-- Disparadores `pacientes`
--
DELIMITER $$
CREATE TRIGGER `calcular_dias_internacion_insert` BEFORE INSERT ON `pacientes` FOR EACH ROW BEGIN
  IF NEW.fecha_egreso IS NOT NULL THEN
    SET NEW.dia_internacion = DATEDIFF(NEW.fecha_egreso, NEW.fecha_ingreso);
  END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `calcular_dias_internacion_update` BEFORE UPDATE ON `pacientes` FOR EACH ROW BEGIN
  IF NEW.fecha_egreso IS NOT NULL AND NEW.fecha_egreso <> OLD.fecha_egreso THEN
    SET NEW.dia_internacion = DATEDIFF(NEW.fecha_egreso, NEW.fecha_ingreso);
  END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contraseña` varchar(255) NOT NULL,
  `id_cargo` int(11) DEFAULT NULL,
  `estado` enum('online','offline') DEFAULT 'offline',
  `foto_perfil` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `usuario`, `email`, `contraseña`, `id_cargo`, `estado`, `foto_perfil`) VALUES
(3, 'Juan Lugo', 'juan', 'juan505l@hotmail.com', '$2y$10$ol.KrGPMR6gVEWknlwGCK.QMxzn/w4Fhc9u/sVT7jBEzlX2VZpo1e', 1, 'online', ''),
(4, 'Teresa Espinola', 'Teresa', '', '$2y$10$M476rQgxTSBoCdMYgNgAt.8pToHb6r39N1fkc5S6BvMSV37Yze2g2', 3, 'offline', ''),
(15, 'Psicologia', 'Psicologia', '', '$2y$10$vNpPtyO/70wuHSC/NcY55uCiJWirFFHcMwqs0se831p1pcC6qQvMe', 6, 'offline', ''),
(16, 'Medico', 'medico', '', '$2y$10$OqamLA9Q22No05nX7H6h..3ZXtqD01L9RxjeE783rwuEbT.VVT0MS', 4, 'online', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`id_cargo`);

--
-- Indices de la tabla `detalle_medico`
--
ALTER TABLE `detalle_medico`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_paciente` (`id_paciente`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `usuario` (`usuario`),
  ADD KEY `id_cargo` (`id_cargo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
  MODIFY `id_cargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `detalle_medico`
--
ALTER TABLE `detalle_medico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_medico`
--
ALTER TABLE `detalle_medico`
  ADD CONSTRAINT `detalle_medico_ibfk_1` FOREIGN KEY (`id_paciente`) REFERENCES `pacientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD CONSTRAINT `pacientes_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_cargo`) REFERENCES `cargo` (`id_cargo`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
