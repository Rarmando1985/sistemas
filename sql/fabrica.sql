-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-11-2023 a las 04:36:29
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `fabrica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agencia`
--

CREATE TABLE `agencia` (
  `id_agencia` int(11) NOT NULL,
  `cod_agencia` int(11) NOT NULL,
  `Agencia` varchar(50) NOT NULL,
  `id_sector` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `agencia`
--

INSERT INTO `agencia` (`id_agencia`, `cod_agencia`, `Agencia`, `id_sector`) VALUES
(14, 13, 'Central', 5),
(16, 1, 'Parroquia', 5),
(57, 3, '19 Calle', 5),
(58, 6, 'Seta Avenida', 5),
(59, 7, 'Terminal', 5),
(60, 10, 'Zona 5', 5),
(61,   11, 'Vista Hermosa', 5),
(62, 12, 'Atlantis', 5),
(63, 13, 'Oficinas Centrales', 5),
(64, 14, 'Trebol', 5),
(65, 15, 'Molino de las Flores', 5),
(66, 16, 'San Francisco', 5),
(67, 17, 'Aguilar Bartres', 5),
(68, 19, 'Barillas', 21),
(69, 20, 'Huehuetenango', 21),
(70, 21, 'Quetzaltenango1', 25);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id_comentario` int(11) NOT NULL,
  `expediente` varchar(30) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `comentarios` varchar(800) NOT NULL,
  `fechahora` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id_comentario`, `expediente`, `usuario`, `estado`, `comentarios`, `fechahora`) VALUES
(1, '20230823225244', 'Rony', 'Ingresado', 'Ingresado', '2023-08-24 04:52:44'),
(2, '20230823225244', 'Rony', 'Enviado', '', '2023-08-24 04:53:48'),
(3, '20230823225244', 'Rony', 'Analisis', '', '2023-08-24 04:54:08'),
(4, '20230823225244', 'Rony', 'Analisis', '', '2023-08-24 04:54:10'),
(5, '20230823225244', 'Rony', 'Espera_comite', 'Escribe aquí tus comentarios', '2023-08-24 04:54:42'),
(6, '20230823225244', 'Rony', 'Comite', '', '2023-08-24 04:55:16'),
(7, '20230823225244', 'Rony', 'Autorizado', 'Escribe aquí tus comentarios', '2023-08-24 04:55:27'),
(8, '', 'Rony', '', '', '2023-08-24 16:25:28'),
(9, '', 'Rony', '', '', '2023-08-24 16:25:42'),
(10, '', 'Rony', '', '', '2023-08-24 16:26:06'),
(11, '20230824112558', 'Rony', 'Ingresado', 'Ingresado', '2023-08-24 17:25:58'),
(12, '20230824112623', 'Rony', 'Ingresado', 'Ingresado', '2023-08-24 17:26:23'),
(13, '20230824112623', 'Rony', 'Enviado', 'ok', '2023-08-24 17:29:39'),
(14, '20230824112623', 'Rony', 'Analisis', '', '2023-08-24 17:31:16'),
(15, '20230824112623', 'Rony', 'Espera_comite', 'Escribe aquí tus comentarios', '2023-08-24 17:34:42'),
(16, '20230824112623', 'Rony', '', 'Se subio archivo Bitácora 4to Bim23.pdf ljlkj', '2023-08-24 17:36:20'),
(17, '20230824112623', 'Rony', 'Comite', '', '2023-08-24 17:39:14'),
(18, '20230824112623', 'Rony', 'Autorizado', 'Escribe aquí tus comentarios', '2023-08-24 17:41:59'),
(19, '20230824112623', 'Rony', '', 'Se subio archivo Res_JM-47-2022.pdf ', '2023-08-24 17:47:33'),
(20, '20230824112558', 'Rony', 'Enviado', '', '2023-10-30 16:36:13'),
(21, '20230824112558', 'Rony', 'Analisis', '', '2023-10-30 16:37:59'),
(22, '20230824112558', 'Rony', 'Espera_comite', 'Escribe aquí tus comentarios', '2023-10-30 16:38:43'),
(23, '20230824112558', 'Rony', 'Comite', '', '2023-10-30 16:39:13'),
(24, '20230824112558', 'Rony', 'Autorizado', 'Escribe aquí tus comentarios', '2023-10-30 16:39:53'),
(25, '20230824112558', 'Rony', 'Autorizado', 'Escribe aquí tus comentarios', '2023-10-30 16:40:06'),
(26, '20230824112558', 'Rony', 'Autorizado', 'Escribe aquí tus comentarios', '2023-10-30 16:40:31'),
(27, '20230824112558', 'Rony', 'Autorizado', 'Escribe aquí tus comentarios', '2023-10-30 16:45:00'),
(28, '20231030105107', 'Rony', 'Ingresado', 'Ingresado', '2023-10-30 16:51:07'),
(29, '20231030105434', 'Rony', 'Ingresado', 'Ingresado', '2023-10-30 16:54:34'),
(30, '20231030110426', 'Rony', 'Ingresado', 'Ingresado', '2023-10-30 17:04:26'),
(31, '20231030115928', 'Rony', 'Ingresado', 'Ingresado', '2023-10-30 17:59:28'),
(32, '20231030115928', 'Rony', 'Enviado', 'OK', '2023-10-30 18:03:40'),
(33, '20231030115928', 'Rony', 'Analisis', '', '2023-10-30 18:05:08'),
(34, '20231030115928', 'Rony', 'Espera_comite', 'recomendado', '2023-10-30 18:06:43'),
(35, '20231030115928', 'Rony', 'Comite', '', '2023-10-30 18:08:30'),
(36, '20231030115928', 'Rony', 'Autorizado', 'Escribe aquí tus comentarios', '2023-10-30 18:09:33'),
(37, '20231030105107', 'Rony', 'Enviado', '', '2023-11-18 04:23:08'),
(38, '20231030105107', 'Rony', 'Analisis', '', '2023-11-18 04:23:55'),
(39, '20231030105434', 'Rony', 'Enviado', '', '2023-11-29 03:06:40'),
(40, '20231030105434', 'Rony', 'Analisis', '', '2023-11-29 03:07:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `convenios`
--

CREATE TABLE `convenios` (
  `idconveio` int(4) NOT NULL,
  `codigoconvenio` varchar(8) NOT NULL,
  `empresa` varchar(50) NOT NULL,
  `corporacion` varchar(50) NOT NULL,
  `direccion` varchar(150) NOT NULL,
  `contacto` varchar(80) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `contacto2` varchar(80) NOT NULL,
  `tel2` varchar(80) NOT NULL,
  `referidapor` varchar(80) NOT NULL,
  `tconvenio` varchar(80) NOT NULL,
  `tasa` decimal(8,2) NOT NULL,
  `tasacf` int(3) NOT NULL,
  `prospeccion` decimal(8,2) NOT NULL,
  `plazocf` int(3) NOT NULL,
  `plazcosf` int(3) NOT NULL,
  `sf1año` int(3) NOT NULL,
  `sf2año` int(3) NOT NULL,
  `sf3año` int(3) NOT NULL,
  `sf4año` int(3) NOT NULL,
  `sf5año` int(3) NOT NULL,
  `cf1año` int(3) NOT NULL,
  `cf2año` int(3) NOT NULL,
  `cf3año` int(3) NOT NULL,
  `cf4año` int(3) NOT NULL,
  `cf5año` int(3) NOT NULL,
  `estado` varchar(15) NOT NULL,
  `formamedir` varchar(20) NOT NULL,
  `rcimax` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `convenios`
--

INSERT INTO `convenios` (`idconveio`, `codigoconvenio`, `empresa`, `corporacion`, `direccion`, `contacto`, `tel`, `contacto2`, `tel2`, `referidapor`, `tconvenio`, `tasa`, `tasacf`, `prospeccion`, `plazocf`, `plazcosf`, `sf1año`, `sf2año`, `sf3año`, `sf4año`, `sf5año`, `cf1año`, `cf2año`, `cf3año`, `cf4año`, `cf5año`, `estado`, `formamedir`, `rcimax`) VALUES
(1, '001', 'Lecleire', 'Lecleire', 'kjdfslkj', 'sdfsadf', '3214', 'kkljlk', '3245', 'mlkmkl', 'Al Trabajador', '14.25', 13, '1.00', 4, 5, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 'Activo', 'tabla', 35),
(2, '002', 'MPRH', 'MEGAPACA', 'PALIN', 'DSLKFLASJDKF', '54654', 'LFKJSDLKASJFL', '546546', '54\r\n45\r\n54', 'Al Trabajador', '14.00', 13, '1.50', 4, 5, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 'Activo', 'tabla', 35),
(3, '003', 'Principie de Paz', '---', 'zona 12', 'ñldkfgljds', '656564', 'dfmglsdmfg', '4545', 'ñfklñasdkfñkd', 'Pastores', '13.00', 12, '1.20', 60, 48, 5, 4, 3, 2, 1, 10, 9, 8, 7, 6, 'Activo', 'rci', 35);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `myguests`
--

CREATE TABLE `myguests` (
  `id` int(6) UNSIGNED NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(3) NOT NULL,
  `producto` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `producto`) VALUES
(1, 'Fiduciario'),
(2, 'Convenio'),
(3, 'Ampliaciones'),
(4, 'Fiduciario_Testigo_Fiador'),
(5, 'Fiduciario_Fiador_Testigo'),
(7, 'Fiduciario_ Codeudor'),
(8, 'Fiduciario_Testigo_Codeudor'),
(9, 'Fiduciario_Fiador_Codeudor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pruebs`
--

CREATE TABLE `pruebs` (
  `id` int(6) UNSIGNED NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(3) NOT NULL,
  `rol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `rol`) VALUES
(1, 'Master'),
(2, 'Jefe_Analisis'),
(3, 'Promotor'),
(4, 'Supervisor'),
(5, 'Analista'),
(6, 'Administrador'),
(7, 'Reporteria'),
(8, 'Consultas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sector`
--

CREATE TABLE `sector` (
  `id_sector` int(11) NOT NULL,
  `sector` varchar(50) NOT NULL,
  `id_supervisor` int(11) NOT NULL,
  `supervisor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sector`
--

INSERT INTO `sector` (`id_sector`, `sector`, `id_supervisor`, `supervisor`) VALUES
(1, 'Administrativa', 1, ''),
(2, 'Central', 2, 'Oscar Mendoza'),
(5, 'Metropolitana', 3, 'Oscar Mendoza'),
(6, 'Mipymes', 4, 'LUCRECIA FRANCO'),
(21, 'Noroccidente', 5, 'Yenny Valiente'),
(23, 'Nororiente', 6, 'Maynor Recinos'),
(24, 'Sur', 7, 'Marvin Castillo'),
(25, 'Suroccidente', 8, 'Ubaldo Papa'),
(26, 'Centro', 9, 'Hector Castellanos'),
(27, 'Cobros', 10, 'Julio Ordoñez');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes`
--

CREATE TABLE `solicitudes` (
  `id_solicitud` int(11) NOT NULL,
  `solicitud` varchar(20) NOT NULL,
  `fechahora` timestamp NULL DEFAULT current_timestamp(),
  `garntia` varchar(20) NOT NULL,
  `id_sector` int(3) NOT NULL,
  `sector` varchar(30) NOT NULL,
  `id_supervisor` int(3) NOT NULL,
  `supervisor` varchar(50) NOT NULL,
  `id_agencia` int(3) NOT NULL,
  `agencia` varchar(30) NOT NULL,
  `subproducto` varchar(30) NOT NULL,
  `ncliente` varchar(90) NOT NULL,
  `dpicliente` varchar(20) NOT NULL,
  `dpiletras` varchar(150) NOT NULL,
  `fnac` date NOT NULL,
  `edad` int(3) NOT NULL,
  `direccion` varchar(500) NOT NULL,
  `municipio` varchar(50) NOT NULL,
  `departamento` varchar(40) NOT NULL,
  `genero` varchar(10) NOT NULL,
  `ecivil` varchar(15) NOT NULL,
  `nacionalidad` varchar(30) NOT NULL,
  `profesion` varchar(80) NOT NULL,
  `ltrabajo` varchar(80) NOT NULL,
  `fingreso` date NOT NULL,
  `tiempolaboral` decimal(6,0) NOT NULL,
  `puesto` varchar(80) NOT NULL,
  `ingresos` decimal(20,2) NOT NULL,
  `montosolicitado` decimal(20,2) NOT NULL,
  `plazomeses` int(3) NOT NULL,
  `tasa` decimal(10,2) NOT NULL,
  `cuota` decimal(20,2) NOT NULL,
  `prospeccion` decimal(5,2) NOT NULL,
  `Comentarios` varchar(5000) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `testigo` varchar(100) NOT NULL,
  `dpitestigo` varchar(20) NOT NULL,
  `dpitestigoletras` varchar(150) NOT NULL,
  `usatestigo` tinyint(1) NOT NULL,
  `ugarantia` tinyint(1) NOT NULL,
  `codgarantia` int(2) NOT NULL,
  `tgarantia` varchar(50) NOT NULL,
  `nomgarantia` varchar(70) NOT NULL,
  `fnacgarantia` date NOT NULL,
  `edadgarantia` int(3) NOT NULL,
  `direcciongarantia` varchar(150) NOT NULL,
  `municipio1` varchar(50) NOT NULL,
  `departamento1` varchar(50) NOT NULL,
  `generogarantia` varchar(20) NOT NULL,
  `ecivilgarantia` varchar(20) NOT NULL,
  `nacionalidadgarantia` varchar(50) NOT NULL,
  `profesiongarantia` varchar(80) NOT NULL,
  `trabajogarantia` varchar(150) NOT NULL,
  `finiciogarantia` date NOT NULL,
  `tlabgarantia` int(3) NOT NULL,
  `puestogarantia` varchar(80) NOT NULL,
  `ingresosgarantia1` decimal(20,2) NOT NULL,
  `dpigarantia` varchar(20) NOT NULL,
  `dpiletrasgarantia` varchar(150) NOT NULL,
  `usatestigo1` tinyint(1) NOT NULL,
  `testigo1` varchar(80) NOT NULL,
  `dpitestigo1` varchar(20) NOT NULL,
  `dpitestigoletras1` varchar(150) NOT NULL,
  `analista` varchar(20) NOT NULL,
  `fechapago` int(2) NOT NULL,
  `destino` varchar(80) NOT NULL,
  `acta` int(6) NOT NULL,
  `fechacomite` timestamp NOT NULL DEFAULT current_timestamp(),
  `punto` varchar(10) NOT NULL,
  `inciso` varchar(5) NOT NULL,
  `usuarioingreso` varchar(20) NOT NULL,
  `correoingreso` varchar(100) NOT NULL,
  `correosupervisor` varchar(100) NOT NULL,
  `correoanalista` varchar(100) NOT NULL,
  `fechaanalisis` timestamp(6) NOT NULL DEFAULT '0000-00-00 00:00:00.000000',
  `promotor` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `solicitudes`
--

INSERT INTO `solicitudes` (`id_solicitud`, `solicitud`, `fechahora`, `garntia`, `id_sector`, `sector`, `id_supervisor`, `supervisor`, `id_agencia`, `agencia`, `subproducto`, `ncliente`, `dpicliente`, `dpiletras`, `fnac`, `edad`, `direccion`, `municipio`, `departamento`, `genero`, `ecivil`, `nacionalidad`, `profesion`, `ltrabajo`, `fingreso`, `tiempolaboral`, `puesto`, `ingresos`, `montosolicitado`, `plazomeses`, `tasa`, `cuota`, `prospeccion`, `Comentarios`, `estado`, `testigo`, `dpitestigo`, `dpitestigoletras`, `usatestigo`, `ugarantia`, `codgarantia`, `tgarantia`, `nomgarantia`, `fnacgarantia`, `edadgarantia`, `direcciongarantia`, `municipio1`, `departamento1`, `generogarantia`, `ecivilgarantia`, `nacionalidadgarantia`, `profesiongarantia`, `trabajogarantia`, `finiciogarantia`, `tlabgarantia`, `puestogarantia`, `ingresosgarantia1`, `dpigarantia`, `dpiletrasgarantia`, `usatestigo1`, `testigo1`, `dpitestigo1`, `dpitestigoletras1`, `analista`, `fechapago`, `destino`, `acta`, `fechacomite`, `punto`, `inciso`, `usuarioingreso`, `correoingreso`, `correosupervisor`, `correoanalista`, `fechaanalisis`, `promotor`) VALUES
(1, '20230823225244', '2023-08-24 04:52:44', 'Fiduciaria', 5, 'Metropolitana', 3, 'Oscar Mendoza', 13, 'Oficinas Centrales', 'Fiduciario', 'Rony Armando Choche Perez', '1633312190101', 'un billón seiscientos treinta tres mil millones trescientos doce millónes ciento noventa mil ciento uno', '1985-07-27', 37, 'Aldea El Pajon Lote 343 A zona 7, Municipio de Santa Catarina Pinula, Departamento de Guatemala', 'Santa Catarina Pinula', 'Guatemala', 'Masculino', 'Soltero', 'Guatemalteco', 'Licenciado en Informática y Administración de Negocios', 'Banco Inmobiliario', '2018-07-22', '5', 'Analista de Convenios', '4000.00', '5000.00', 36, '14.25', '171.51', '1.50', 'rt', 'Autorizado', '', '', 'cero', 0, 0, 0, 'fiador', '', '1985-07-27', 37, '', '', '', 'Masculino', 'Soltero', '', '', '', '2018-07-22', 5, '', '0.00', '', 'cero', 0, '', '', 'cero', 'Rony', 5, 'Gastos Personales', 12341, '2023-09-30 06:00:00', 'Cuarto', '', 'Rony', 'rarmando1985@gmail.com', 'rarmando1985@gmail.com', '', '2023-08-24 04:54:10.000000', 'DAniel vivar'),
(2, '20230824112558', '2023-08-24 17:25:58', 'Fiduciaria', 5, 'Metropolitana', 3, 'Oscar Mendoza', 13, 'Oficinas Centrales', 'Fiduciario', 'Rony Armando Choche Perez', '1633312190101', 'un billón seiscientos treinta tres mil millones trescientos doce millónes ciento noventa mil ciento uno', '1985-07-27', 37, 'Aldea El Pajon Lote 343 A zona 7, Municipio de Santa Catarina Pinula, Departamento de Guatemala', 'Santa Catarina Pinula', 'Guatemala', 'Masculino', 'Soltero', 'Guatemalteco', 'Licenciado en Informática y Administración de Negocios', 'Banco Inmobiliario', '2018-07-22', '5', 'Analista de Convenios', '4000.00', '10000.00', 36, '18.00', '361.55', '1.00', 'Comentario', 'Autorizado', '', '', 'cero', 0, 0, 0, 'fiador', '', '1985-07-27', 37, '', '', '', 'Masculino', 'Soltero', '', '', '', '2018-07-22', 5, '', '0.00', '', 'cero', 0, '', '', 'cero', 'Rony', 10, 'Gastos Personales', 1302, '2023-11-05 06:00:00', 'Cuarto', '', 'Rony', 'rarmando1985@gmail.com', 'rarmando1985@gmail.com', '', '2023-10-30 16:37:59.000000', 'Nelson Monerroso'),
(3, '20230824112623', '2023-08-24 17:26:23', 'Fiduciaria', 5, 'Metropolitana', 3, 'Oscar Mendoza', 13, 'Oficinas Centrales', 'Fiduciario', 'Rony Armando Choche Perez', '1633312190101', 'un billón seiscientos treinta tres mil millones trescientos doce millónes ciento noventa mil ciento uno', '1985-07-27', 37, 'Aldea El Pajon Lote 343 A zona 7, Municipio de Santa Catarina Pinula, Departamento de Guatemala', 'Santa Catarina Pinula', 'Guatemala', 'Masculino', 'Soltero', 'Guatemalteco', 'Licenciado en Informática y istración de Negocios', 'Banco Inmobiliario', '2018-07-22', '5', 'Analista de Convenios', '4000.00', '10000.00', 36, '18.00', '361.55', '1.00', 'Comentario', 'Autorizado', '', '', 'cero', 0, 0, 0, 'fiador', '', '1985-07-27', 37, '', '', '', 'Masculino', 'Soltero', '', '', '', '2018-07-22', 5, '', '0.00', '', 'cero', 0, '', '', 'cero', 'Rony', 10, 'Gastos Personales', 1280, '2023-08-25 06:00:00', 'Cuarto', '', 'Rony', 'rarmando1985@gmail.com', 'rarmando1985@gmail.com', '', '2023-08-24 17:31:16.000000', 'Nelson Monerroso'),
(4, '20231030105107', '2023-10-30 16:51:07', 'Fiduciaria', 5, 'Metropolitana', 3, 'Oscar Mendoza', 13, 'Oficinas Centrales', 'Fiduciario', 'EDGAR ESTUARDO CABNAL CACAO', '1934759601601', 'un billón novecientos treinta cuatro mil millones setecientos cincuenta nueve millónes seiscientos un mil seiscientos uno', '1983-12-03', 39, 'DIAGONAL 4 9-96D, ZONA 9', 'COBAN', 'ALTA VERAPAZ', 'Masculino', 'Soltero', 'GUATEMALTECO', 'SUPERVISOR', 'INDUSTRIAS CHIQUIBUL', '2018-07-22', '5', 'SUPERVISOR', '5000.00', '20000.00', 24, '18.25', '1000.94', '1.00', 'LFKLSDJ', 'Analisis', '', '', 'cero', 0, 0, 0, 'fiador', '', '1985-07-27', 38, '', '', '', 'Masculino', 'Soltero', '', '', '', '2018-07-22', 5, '', '0.00', '', 'cero', 0, '', '', 'cero', 'Rony', 5, 'Gastos Personales', 0, '2023-10-30 16:51:07', '', '', 'Rony', 'rarmando1985@gmail.com', 'rarmando1985@gmail.com', '', '2023-11-18 04:23:55.000000', 'Nelson Monerroso'),
(5, '20231030105434', '2023-10-30 16:54:34', 'Fiduciaria', 5, 'Metropolitana', 3, 'Oscar Mendoza', 13, 'Oficinas Centrales', 'Fiduciario', 'EDGAR ESTUARDO CABNAL CACAO', '1934759601601', 'un billón novecientos treinta cuatro mil millones setecientos cincuenta nueve millónes seiscientos un mil seiscientos uno', '1983-12-03', 39, 'DIAGONAL 4 9-96D, ZONA 9', 'COBAN', 'ALTA VERAPAZ', 'Masculino', 'Soltero', 'GUATEMALTECO', 'SUPERVISOR', 'INDUSTRIAS CHIQUIBUL', '2018-07-22', '5', 'SUPERVISOR', '5000.00', '20000.00', 24, '18.25', '1000.94', '1.00', 'LFKLSDJ', 'Analisis', '', '', 'cero', 0, 0, 0, 'fiador', '', '1985-07-27', 38, '', '', '', 'Masculino', 'Soltero', '', '', '', '2018-07-22', 5, '', '0.00', '', 'cero', 0, '', '', 'cero', 'Rony', 5, 'Gastos Personales', 0, '2023-10-30 16:54:34', '', '', 'Rony', 'rarmando1985@gmail.com', 'rarmando1985@gmail.com', '', '2023-11-29 03:07:06.000000', 'Nelson Monerroso'),
(6, '20231030110426', '2023-10-30 17:04:26', 'Fiduciaria', 5, 'Metropolitana', 3, 'Oscar Mendoza', 13, 'Oficinas Centrales', 'Fiduciario', 'ADOLFO GIOVANNI SOTO PEREZ', '1993345361711', 'un billón novecientos noventa tres mil millones trescientos cuarenta cinco millónes trescientos sesenta un mil setecientos onceo', '1980-04-15', 43, 'RIO DULCE SECTOR IGLESIA PENTECOSTES, ZONA 0', 'LIVINGSTON', 'IZABAL', 'Masculino', 'Casado', 'GUATEMALTECO', 'PASTOR', 'IGLESIA DE DIOS AMERICA EN GUATEMALA', '2000-03-01', '23', 'PASTOR', '5000.00', '20000.00', 36, '20.00', '743.32', '1.00', 'Pastor fundador de Mision, con mas de 20 iglesias en el pais.', 'Ingresado', '', '', 'cero', 0, 0, 0, 'fiador', '', '1985-07-27', 38, '', '', '', 'Masculino', 'Soltero', '', '', '', '2018-07-22', 5, '', '0.00', '', 'cero', 0, '', '', 'cero', '', 5, 'Gastos Personales', 0, '2023-10-30 17:04:26', '', '', 'Rony', 'rarmando1985@gmail.com', 'rarmando1985@gmail.com', '', '0000-00-00 00:00:00.000000', 'Nelson Monerroso'),
(7, '20231030115928', '2023-10-30 17:59:28', 'Fiduciaria', 5, 'Metropolitana', 3, 'Oscar Mendoza', 13, 'Oficinas Centrales', 'Fiduciario', 'ADOLFO GIOVANNI SOTO PEREZ', '1993345361711', 'un billón novecientos noventa tres mil millones trescientos cuarenta cinco millónes trescientos sesenta un mil setecientos onceo', '1980-04-15', 43, 'RIO DULCE SECTOR IGLESIA PENTECOSTES, ZONA 0', 'LIVINGSTON', 'IZABAL', 'Masculino', 'Casado', 'GUATEMALTECO', 'PASTOR', 'IGLESIA DE DIOS AMERICA EN GUATEMALA', '2000-03-01', '23', 'PASTOR', '5000.00', '20000.00', 36, '20.00', '743.32', '1.00', 'Pastor fundador de Mision, con mas de 20 iglesias en el pais.', 'Autorizado', '', '', 'cero', 0, 0, 0, 'codeudor', '', '1985-07-27', 38, '', '', '', 'Masculino', 'Soltero', '', '', '', '2018-07-22', 5, '', '0.00', '', 'cero', 0, '', '', 'cero', 'Rony', 5, 'Gastos Personales', 1302, '2023-11-01 06:00:00', 'Cuarto', '', 'Rony', 'rarmando1985@gmail.com', 'rarmando1985@gmail.com', '', '2023-10-30 18:05:08.000000', 'Nelson Monerroso');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `rol_id` int(11) NOT NULL,
  `codigoempleado` varchar(8) NOT NULL,
  `nombrecolaborador` varchar(150) NOT NULL,
  `correo` varchar(80) NOT NULL,
  `id_sector` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `username`, `password`, `rol_id`, `codigoempleado`, `nombrecolaborador`, `correo`, `id_sector`) VALUES
(1, 'Rony', 'Rony1', 1, '', '', 'rarmando1985@gmail.com', 0),
(2, 'Choche', 'a+', 3, '4733', 'Sergio Villeda', 'sergio.villeda@bancoinmobiliario.com.gt', 0),
(7, 'Rony', 'sf', 5, '', '', 'rony.choche@bancoinmobiliario.com.gt', 0),
(8, 'Dvivar', '1234', 2, '5458', 'Daniel Vivar', 'rony.choche@bancoinmobiliario.com.gt', 21),
(13, 'Maynor', '12345', 4, '545', 'Oscar Mendoza', 'rarmando1985@gmail.com', 5),
(19, 'sdvilleda', 'Zdianita', 5, '', 'Sergio Villeda', 'sergio.villeda@bancoinmobiliario.com.gt', 0),
(20, 'Rony1', 'Rony1', 1, '', 'Sergio Villeda', 'daniel.vivar@bancoinmobiliario.com.gt', 25),
(21, 'Rony2', 'Rony1', 4, '', 'Sergio Villeda', 'sergio.villeda@bancoinmobiliario.com.gt', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `agencia`
--
ALTER TABLE `agencia`
  ADD PRIMARY KEY (`id_agencia`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id_comentario`);

--
-- Indices de la tabla `convenios`
--
ALTER TABLE `convenios`
  ADD PRIMARY KEY (`idconveio`);

--
-- Indices de la tabla `myguests`
--
ALTER TABLE `myguests`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `pruebs`
--
ALTER TABLE `pruebs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sector`
--
ALTER TABLE `sector`
  ADD PRIMARY KEY (`id_sector`);

--
-- Indices de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  ADD PRIMARY KEY (`id_solicitud`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rol_id` (`rol_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `agencia`
--
ALTER TABLE `agencia`
  MODIFY `id_agencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `convenios`
--
ALTER TABLE `convenios`
  MODIFY `idconveio` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `myguests`
--
ALTER TABLE `myguests`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `pruebs`
--
ALTER TABLE `pruebs`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `sector`
--
ALTER TABLE `sector`
  MODIFY `id_sector` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  MODIFY `id_solicitud` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
