-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 22-07-2024 a las 21:30:17
-- Versión del servidor: 10.5.20-MariaDB
-- Versión de PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `id20437740_db_sistema`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`id20437740_alejito24`@`%` PROCEDURE `botonactivarbitacora` (IN `iddocumentou` INT(11), IN `id_activacion` VARCHAR(50))  NO SQL BEGIN
        update bitacora set usuario_que_activo=id_activacion,fecha_activacion=NOW()
         WHERE id_documento=iddocumentou;
       END$$

CREATE DEFINER=`id20437740_alejito24`@`%` PROCEDURE `botonactivarbitacorab2` (IN `iddocumentou` INT(11), IN `id_activacion` VARCHAR(50))  NO SQL BEGIN
        update bitacorab2 set usuario_que_activo=id_activacion,fecha_activacion=NOW()
         WHERE id_documento=iddocumentou;
       END$$

CREATE DEFINER=`id20437740_alejito24`@`%` PROCEDURE `botonactivarbitacorab3` (IN `iddocumentou` INT(11), IN `id_activacion` VARCHAR(50))  NO SQL BEGIN
        update bitacorab3 set usuario_que_activo=id_activacion,fecha_activacion=NOW()
         WHERE id_documento=iddocumentou;
       END$$

CREATE DEFINER=`id20437740_alejito24`@`%` PROCEDURE `botonactivarbitacorab4` (IN `iddocumentou` INT(11), IN `id_activacion` VARCHAR(50))  NO SQL BEGIN
        update bitacorab4 set usuario_que_activo=id_activacion,fecha_activacion=NOW()
         WHERE id_documento=iddocumentou;
       END$$

CREATE DEFINER=`id20437740_alejito24`@`%` PROCEDURE `botonactivarbitacorab5` (IN `iddocumentou` INT(11), IN `id_activacion` VARCHAR(50))  NO SQL BEGIN
        update bitacorab5 set usuario_que_activo=id_activacion,fecha_activacion=NOW()
         WHERE id_documento=iddocumentou;
       END$$

CREATE DEFINER=`id20437740_alejito24`@`%` PROCEDURE `botonactivarbitacorab6` (IN `iddocumentou` INT(11), IN `id_activacion` VARCHAR(50))  NO SQL BEGIN
        update bitacorab6 set usuario_que_activo=id_activacion,fecha_activacion=NOW()
         WHERE id_documento=iddocumentou;
       END$$

CREATE DEFINER=`id20437740_alejito24`@`%` PROCEDURE `botonactivarbodega` (IN `idbodegau` INT(11), IN `id_activacion` VARCHAR(50))  NO SQL BEGIN
        update bodega set usuario_que_activo=id_activacion,fecha_activacion=NOW()
         WHERE id_bodega=idbodegau;
       END$$

CREATE DEFINER=`id20437740_alejito24`@`%` PROCEDURE `botonactivardocumentos` (IN `iddocumentou` INT(11), IN `id_activacion` VARCHAR(50))  NO SQL BEGIN
        update documento_activo set usuario_que_activo=id_activacion,fecha_activacion=NOW()
         WHERE id_documento=iddocumentou;
       END$$

CREATE DEFINER=`id20437740_alejito24`@`%` PROCEDURE `botonactivarusuario` (IN `idusuariou` INT(11), IN `id_activacion` VARCHAR(50))  NO SQL BEGIN
        update usuario set usuario_que_activo=id_activacion, usuario_que_modifico_documento=id_activacion,fecha_activacion=NOW()
         WHERE idusuario=idusuariou;
       END$$

CREATE DEFINER=`id20437740_alejito24`@`%` PROCEDURE `botondesactivarbitacora` (IN `iddocumentou` INT(11), IN `id_eliminacion` VARCHAR(50))  NO SQL BEGIN
        update bitacora set usuario_que_desactivo=id_eliminacion,fecha_desactivacion=NOW()
         WHERE id_documento=iddocumentou;
       END$$

CREATE DEFINER=`id20437740_alejito24`@`%` PROCEDURE `botondesactivarbitacorab2` (IN `iddocumentou` INT(11), IN `id_eliminacion` VARCHAR(50))  NO SQL BEGIN
        update bitacorab2 set usuario_que_desactivo=id_eliminacion,fecha_desactivacion=NOW()
         WHERE id_documento=iddocumentou;
       END$$

CREATE DEFINER=`id20437740_alejito24`@`%` PROCEDURE `botondesactivarbitacorab3` (IN `iddocumentou` INT(11), IN `id_eliminacion` VARCHAR(50))  NO SQL BEGIN
        update bitacorab3 set usuario_que_desactivo=id_eliminacion,fecha_desactivacion=NOW()
         WHERE id_documento=iddocumentou;
       END$$

CREATE DEFINER=`id20437740_alejito24`@`%` PROCEDURE `botondesactivarbitacorab4` (IN `iddocumentou` INT(11), IN `id_eliminacion` VARCHAR(50))  NO SQL BEGIN
        update bitacorab4 set usuario_que_desactivo=id_eliminacion,fecha_desactivacion=NOW()
         WHERE id_documento=iddocumentou;
       END$$

CREATE DEFINER=`id20437740_alejito24`@`%` PROCEDURE `botondesactivarbitacorab5` (IN `iddocumentou` INT(11), IN `id_eliminacion` VARCHAR(50))  NO SQL BEGIN
        update bitacorab5 set usuario_que_desactivo=id_eliminacion,fecha_desactivacion=NOW()
         WHERE id_documento=iddocumentou;
       END$$

CREATE DEFINER=`id20437740_alejito24`@`%` PROCEDURE `botondesactivarbitacorab6` (IN `iddocumentou` INT(11), IN `id_eliminacion` VARCHAR(50))  NO SQL BEGIN
        update bitacorab6 set usuario_que_desactivo=id_eliminacion,fecha_desactivacion=NOW()
         WHERE id_documento=iddocumentou;
       END$$

CREATE DEFINER=`id20437740_alejito24`@`%` PROCEDURE `botondesactivarbodega` (IN `idbodegau` INT(11), IN `id_eliminacion` VARCHAR(50))  NO SQL BEGIN
        update bodega set usuario_que_desactivo=id_eliminacion,fecha_desactivacion=NOW()
         WHERE id_bodega=idbodegau;
       END$$

CREATE DEFINER=`id20437740_alejito24`@`%` PROCEDURE `botondesactivardocumentos` (IN `iddocumentou` INT(11), IN `id_eliminacion` VARCHAR(50))  NO SQL BEGIN
        update documento_activo set usuario_que_desactivo=id_eliminacion,fecha_desactivacion=NOW()
         WHERE id_documento=iddocumentou;
       END$$

CREATE DEFINER=`id20437740_alejito24`@`%` PROCEDURE `botondesactivarusuario` (IN `idusuariou` INT(11), IN `id_eliminacion` VARCHAR(50))  NO SQL BEGIN
DECLARE usu_eliminacion varchar(50);
set usu_eliminacion= (select nombre from usuario where idusuario=idusuariou limit 1);
        update usuario set usuario_que_desactivo=id_eliminacion, usuario_que_modifico_documento=id_eliminacion,fecha_desactivacion=NOW()
         WHERE idusuario=idusuariou;
       END$$

CREATE DEFINER=`id20437740_alejito24`@`%` PROCEDURE `registro_edicion_bitacora` (IN `nombreu` VARCHAR(50), IN `fk_usuario_que_modifico_bitacorau` VARCHAR(50))  NO SQL BEGIN
        insert into modificacion_bitacoras (nombre,fk_usuario_que_modifico_documento,fecha_modificacion) values(nombreu,fk_usuario_que_modifico_bitacorau,NOW());
       END$$

CREATE DEFINER=`id20437740_alejito24`@`%` PROCEDURE `registro_edicion_bodegas` (IN `nombreu` VARCHAR(50), IN `usuario_que_modifico_bodegau` VARCHAR(50))  NO SQL BEGIN
        insert into modificacion_bodegas (nombre,fk_usuario_que_modifico_documento,fecha_modificacion) values(nombreu,usuario_que_modifico_bodegau,NOW());
       END$$

CREATE DEFINER=`id20437740_alejito24`@`%` PROCEDURE `registro_edicion_documentos` (IN `numero_documentou` VARCHAR(50), IN `fk_usuario_que_modifico_documentou` VARCHAR(50))  NO SQL BEGIN
        insert into modificacion_documentos (numero_documento,fk_usuario_que_modifico_documento	,fecha_modificacion) values(numero_documentou,fk_usuario_que_modifico_documentou,NOW());
       END$$

CREATE DEFINER=`id20437740_alejito24`@`%` PROCEDURE `registro_edicion_usuarios` (IN `nombreu` VARCHAR(50), IN `usuario_que_modifico_usuariou` VARCHAR(50))  NO SQL BEGIN
        insert into modificacion_usuarios (nombre,usuario_que_modifico_documento,fecha_modificacion) values(nombreu,usuario_que_modifico_usuariou,NOW());
       END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacora`
--

CREATE TABLE `bitacora` (
  `id_documento` int(11) NOT NULL,
  `nombre` varchar(60) DEFAULT NULL,
  `ci_ruc_pas` varchar(20) DEFAULT NULL,
  `num_identificacion` varchar(20) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `fecha_prestamo` date DEFAULT NULL,
  `fecha_entrega` date DEFAULT NULL,
  `observaciones` varchar(300) DEFAULT NULL,
  `condicion` tinyint(1) DEFAULT NULL,
  `usuario_que_creo_documento` varchar(50) DEFAULT NULL,
  `fk_usuario_que_modifico_documento` int(11) DEFAULT NULL,
  `fecha_modificacion` date DEFAULT NULL,
  `usuario_que_activo` varchar(50) DEFAULT NULL,
  `fecha_activacion` varchar(50) DEFAULT NULL,
  `usuario_que_desactivo` varchar(50) DEFAULT NULL,
  `fecha_desactivacion` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `bitacora`
--

INSERT INTO `bitacora` (`id_documento`, `nombre`, `ci_ruc_pas`, `num_identificacion`, `telefono`, `fecha_prestamo`, `fecha_entrega`, `observaciones`, `condicion`, `usuario_que_creo_documento`, `fk_usuario_que_modifico_documento`, `fecha_modificacion`, `usuario_que_activo`, `fecha_activacion`, `usuario_que_desactivo`, `fecha_desactivacion`) VALUES
(3, 'bitacora bodega 1 entregada', 'CÉDULA', '1723794655', '0987751209', '2023-04-11', '2023-04-11', 'ninguna', 1, 'Alejandro Arroyo Mera', 2, '2023-04-12', 'Alejandro Arroyo Mera', '2023-04-12 06:40:11', 'Alejandro Arroyo Mera', '2023-04-12 06:39:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacorab2`
--

CREATE TABLE `bitacorab2` (
  `id_documento` int(11) NOT NULL,
  `nombre` varchar(60) DEFAULT NULL,
  `ci_ruc_pas` varchar(20) DEFAULT NULL,
  `num_identificacion` varchar(20) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `fecha_prestamo` date DEFAULT NULL,
  `fecha_entrega` date DEFAULT NULL,
  `observaciones` varchar(300) DEFAULT NULL,
  `condicion` tinyint(1) DEFAULT NULL,
  `usuario_que_creo_documento` varchar(50) DEFAULT NULL,
  `fk_usuario_que_modifico_documento` int(11) DEFAULT NULL,
  `fecha_modificacion` date DEFAULT NULL,
  `usuario_que_activo` varchar(50) DEFAULT NULL,
  `fecha_activacion` varchar(50) DEFAULT NULL,
  `usuario_que_desactivo` varchar(50) DEFAULT NULL,
  `fecha_desactivacion` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `bitacorab2`
--

INSERT INTO `bitacorab2` (`id_documento`, `nombre`, `ci_ruc_pas`, `num_identificacion`, `telefono`, `fecha_prestamo`, `fecha_entrega`, `observaciones`, `condicion`, `usuario_que_creo_documento`, `fk_usuario_que_modifico_documento`, `fecha_modificacion`, `usuario_que_activo`, `fecha_activacion`, `usuario_que_desactivo`, `fecha_desactivacion`) VALUES
(2, 'modificado', 'CÉDULA', 'Alejo1234', '00000000', '2023-04-11', '2023-04-11', 'ninguna', 1, 'Alejandro Arroyo Mera', 1, '2023-04-12', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacorab3`
--

CREATE TABLE `bitacorab3` (
  `id_documento` int(11) NOT NULL,
  `nombre` varchar(60) DEFAULT NULL,
  `ci_ruc_pas` varchar(20) DEFAULT NULL,
  `num_identificacion` varchar(20) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `fecha_prestamo` date DEFAULT NULL,
  `fecha_entrega` date DEFAULT NULL,
  `observaciones` varchar(300) DEFAULT NULL,
  `condicion` tinyint(1) DEFAULT NULL,
  `usuario_que_creo_documento` varchar(50) DEFAULT NULL,
  `fk_usuario_que_modifico_documento` int(11) DEFAULT NULL,
  `fecha_modificacion` date DEFAULT NULL,
  `usuario_que_activo` varchar(50) DEFAULT NULL,
  `fecha_activacion` varchar(50) DEFAULT NULL,
  `usuario_que_desactivo` varchar(50) DEFAULT NULL,
  `fecha_desactivacion` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `bitacorab3`
--

INSERT INTO `bitacorab3` (`id_documento`, `nombre`, `ci_ruc_pas`, `num_identificacion`, `telefono`, `fecha_prestamo`, `fecha_entrega`, `observaciones`, `condicion`, `usuario_que_creo_documento`, `fk_usuario_que_modifico_documento`, `fecha_modificacion`, `usuario_que_activo`, `fecha_activacion`, `usuario_que_desactivo`, `fecha_desactivacion`) VALUES
(2, 'Olga Tañon cañon', 'CÉDULA', 'sadasdasdadas', 'sadasdsa', '2023-04-11', '2023-04-11', 'sadsdas', 1, 'Alejandro Arroyo Mera', 1, '2023-04-11', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacorab4`
--

CREATE TABLE `bitacorab4` (
  `id_documento` int(11) NOT NULL,
  `nombre` varchar(60) DEFAULT NULL,
  `ci_ruc_pas` varchar(20) DEFAULT NULL,
  `num_identificacion` varchar(20) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `fecha_prestamo` date DEFAULT NULL,
  `fecha_entrega` date DEFAULT NULL,
  `observaciones` varchar(300) DEFAULT NULL,
  `condicion` tinyint(1) DEFAULT NULL,
  `usuario_que_creo_documento` varchar(50) DEFAULT NULL,
  `fk_usuario_que_modifico_documento` int(11) DEFAULT NULL,
  `fecha_modificacion` varchar(50) DEFAULT NULL,
  `usuario_que_activo` varchar(50) DEFAULT NULL,
  `fecha_activacion` varchar(50) DEFAULT NULL,
  `usuario_que_desactivo` varchar(50) DEFAULT NULL,
  `fecha_desactivacion` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `bitacorab4`
--

INSERT INTO `bitacorab4` (`id_documento`, `nombre`, `ci_ruc_pas`, `num_identificacion`, `telefono`, `fecha_prestamo`, `fecha_entrega`, `observaciones`, `condicion`, `usuario_que_creo_documento`, `fk_usuario_que_modifico_documento`, `fecha_modificacion`, `usuario_que_activo`, `fecha_activacion`, `usuario_que_desactivo`, `fecha_desactivacion`) VALUES
(2, 'ultimo pa', 'CÉDULA', '65465465', '4544654564', '2023-04-11', '2023-06-11', 'ninguna', 1, 'Alejandro Arroyo Mera', 1, '2023-04-11', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacorab5`
--

CREATE TABLE `bitacorab5` (
  `id_documento` int(11) NOT NULL,
  `nombre` varchar(60) DEFAULT NULL,
  `ci_ruc_pas` varchar(20) DEFAULT NULL,
  `num_identificacion` varchar(20) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `fecha_prestamo` date DEFAULT NULL,
  `fecha_entrega` date DEFAULT NULL,
  `observaciones` varchar(300) DEFAULT NULL,
  `condicion` tinyint(1) DEFAULT NULL,
  `usuario_que_creo_documento` varchar(50) DEFAULT NULL,
  `fk_usuario_que_modifico_documento` int(11) DEFAULT NULL,
  `fecha_modificacion` date DEFAULT NULL,
  `usuario_que_activo` varchar(50) DEFAULT NULL,
  `fecha_activacion` varchar(50) DEFAULT NULL,
  `usuario_que_desactivo` varchar(50) DEFAULT NULL,
  `fecha_desactivacion` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacorab6`
--

CREATE TABLE `bitacorab6` (
  `id_documento` int(11) NOT NULL,
  `nombre` varchar(60) DEFAULT NULL,
  `ci_ruc_pas` varchar(20) DEFAULT NULL,
  `num_identificacion` varchar(20) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `fecha_prestamo` date DEFAULT NULL,
  `fecha_entrega` date DEFAULT NULL,
  `observaciones` varchar(300) DEFAULT NULL,
  `condicion` tinyint(1) DEFAULT NULL,
  `usuario_que_creo_documento` varchar(50) DEFAULT NULL,
  `fk_usuario_que_modifico_documento` int(11) DEFAULT NULL,
  `fecha_modificacion` date DEFAULT NULL,
  `usuario_que_activo` varchar(50) DEFAULT NULL,
  `fecha_activacion` varchar(50) DEFAULT NULL,
  `usuario_que_desactivo` varchar(50) DEFAULT NULL,
  `fecha_desactivacion` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `bitacorab6`
--

INSERT INTO `bitacorab6` (`id_documento`, `nombre`, `ci_ruc_pas`, `num_identificacion`, `telefono`, `fecha_prestamo`, `fecha_entrega`, `observaciones`, `condicion`, `usuario_que_creo_documento`, `fk_usuario_que_modifico_documento`, `fecha_modificacion`, `usuario_que_activo`, `fecha_activacion`, `usuario_que_desactivo`, `fecha_desactivacion`) VALUES
(2, 'PESeiro', 'CÉDULA', 'jknkjn', 'kjnkjnjk', '2023-04-11', '2023-04-11', 'n j kjn', 1, 'Alejandro Arroyo', 1, '2023-04-11', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bodega`
--

CREATE TABLE `bodega` (
  `id_bodega` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `ciudad` varchar(100) DEFAULT NULL,
  `condicion` tinyint(1) DEFAULT NULL,
  `usuario_que_creo_documento` varchar(50) DEFAULT NULL,
  `fk_usuario_que_modifico_documento` int(11) DEFAULT NULL,
  `fecha_modificacion` date DEFAULT NULL,
  `usuario_que_activo` varchar(50) DEFAULT NULL,
  `fecha_activacion` varchar(50) DEFAULT NULL,
  `usuario_que_desactivo` varchar(50) DEFAULT NULL,
  `fecha_desactivacion` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `bodega`
--

INSERT INTO `bodega` (`id_bodega`, `nombre`, `direccion`, `ciudad`, `condicion`, `usuario_que_creo_documento`, `fk_usuario_que_modifico_documento`, `fecha_modificacion`, `usuario_que_activo`, `fecha_activacion`, `usuario_que_desactivo`, `fecha_desactivacion`) VALUES
(1, 'Bodega 1', 'Calle Pedro Vicente Maldonado, parque metropolitano del sur', 'Quito', 1, NULL, NULL, NULL, 'Alejandro Arroyo', '2023-04-11 21:59:14', 'Alejandro Arroyo', '2023-04-11 21:58:40'),
(2, 'Bodega 2', 'Centro de la ciudad', 'Guayaquill', 1, NULL, NULL, NULL, 'Alejandro Arroyo Mera', '2023-04-12 04:38:46', 'Alejandro Arroyo Mera', '2023-04-12 03:57:39'),
(3, 'Bodega 3', 'cerquita', 'Cuenca', 1, NULL, NULL, NULL, 'Alejandro Arroyo Mera', '2023-04-12 03:57:55', 'Alejandro Arroyo Mera', '2023-04-12 03:57:52'),
(4, 'Bodega 4', 'Muy lejos de aqui pana', 'Esmeraldas', 1, NULL, NULL, NULL, '', '', '', ''),
(5, 'Bodega 5', 'Cerca del mar', 'Manta', 1, NULL, NULL, NULL, '', '', '', ''),
(6, 'Bodega 6', 'Muy muy lejos', 'El carmen Ecuador', 1, NULL, NULL, NULL, 'Alejandro Arroyo', '2023-04-11 22:00:07', 'Alejandro Arroyo', '2023-04-11 21:59:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documento`
--

CREATE TABLE `documento` (
  `id_documento` int(11) NOT NULL,
  `nombre` varchar(70) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `codigo` varchar(20) NOT NULL,
  `fecha` datetime NOT NULL,
  `direccion` varchar(250) NOT NULL,
  `remitente` varchar(120) NOT NULL,
  `asunto` varchar(256) DEFAULT NULL,
  `destinatario` varchar(100) NOT NULL,
  `area` varchar(100) NOT NULL,
  `condicion` tinyint(1) DEFAULT NULL,
  `autor` varchar(100) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `observaciones` varchar(256) NOT NULL,
  `fk_id_tipo_documento` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documento_activo`
--

CREATE TABLE `documento_activo` (
  `id_documento` int(11) NOT NULL,
  `numero_documento` varchar(50) NOT NULL,
  `fecha_creacion` date NOT NULL,
  `asunto_documento` varchar(300) NOT NULL,
  `cargo_remitente_documento` varchar(60) NOT NULL,
  `empresa_documento` varchar(100) NOT NULL,
  `anaquel_archivo_documento` varchar(100) DEFAULT NULL,
  `caja_anaquel_documento` varchar(100) NOT NULL,
  `carpeta_documento` varchar(100) NOT NULL,
  `lugar_dentro_de_la_carpeta` varchar(100) NOT NULL,
  `direccion_electronica_documento` varchar(150) NOT NULL,
  `remitente` varchar(60) NOT NULL,
  `destinatario` varchar(60) NOT NULL,
  `cargo_destinatario` varchar(60) NOT NULL,
  `criterio1` varchar(60) NOT NULL,
  `criterio2` varchar(60) NOT NULL,
  `criterio3` varchar(60) NOT NULL,
  `criterio4` varchar(60) NOT NULL,
  `criterio5` varchar(60) NOT NULL,
  `criterio6` varchar(60) NOT NULL,
  `condicion` tinyint(1) NOT NULL,
  `fk_bodega_archivo_documento` int(11) NOT NULL,
  `usuario_que_creo_documento` varchar(50) NOT NULL,
  `fk_usuario_que_modifico_documento` int(11) NOT NULL,
  `fecha_modificacion` date NOT NULL,
  `usuario_que_activo` varchar(50) DEFAULT NULL,
  `fecha_activacion` varchar(50) DEFAULT NULL,
  `usuario_que_desactivo` varchar(50) DEFAULT NULL,
  `fecha_desactivacion` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `documento_activo`
--

INSERT INTO `documento_activo` (`id_documento`, `numero_documento`, `fecha_creacion`, `asunto_documento`, `cargo_remitente_documento`, `empresa_documento`, `anaquel_archivo_documento`, `caja_anaquel_documento`, `carpeta_documento`, `lugar_dentro_de_la_carpeta`, `direccion_electronica_documento`, `remitente`, `destinatario`, `cargo_destinatario`, `criterio1`, `criterio2`, `criterio3`, `criterio4`, `criterio5`, `criterio6`, `condicion`, `fk_bodega_archivo_documento`, `usuario_que_creo_documento`, `fk_usuario_que_modifico_documento`, `fecha_modificacion`, `usuario_que_activo`, `fecha_activacion`, `usuario_que_desactivo`, `fecha_desactivacion`) VALUES
(6, 'Documento de prueba 1', '2023-04-03', 'importante', 'jefe', 'empresa', '1', 'caja N°1', 'carpeta 5', 'primero', '1680916244.jpg', 'Alejandro Arroyo', 'Mario Pérez', 'administrador', '1', '2', '3', '4', '5', '6', 1, 6, 'Alejandro Arroyo', 1, '2024-05-09', 'Alejandro Arroyo Mera', '2023-08-03 02:45:15', 'Alejandro Arroyo Mera', '2023-08-03 02:44:43'),
(7, 'Documento de prueba 2', '2023-04-04', 'as', 'as', 'kjnjkq', 'jnj', 'jknjk', 'jkkjn', 'jnjk', '1682044784.pdf', 'kjn k', 'JNJ', 'kjn j', 'KJNJK', '', '', '', '', '', 1, 2, 'Michael Tapia', 2, '2023-04-20', '', '', 'Michael Tapia', '2023-04-04 17:32:28'),
(8, 'Documento de prueba 3', '2023-04-04', 'jnnn', 'kjnkjn', 'kjnjknkj', 'kjnjknkj', 'jknkjn', 'jnkjnjkn', 'hjjhbjh', '', 'jknkjn', 'jknkjn', 'kjnjkn', 'hjkl', '', '', '', '', '', 1, 1, 'Michael Tapia', 1, '2023-04-20', 'Michael Tapia', '2023-04-12 03:27:08', 'Michael Tapia', '2023-04-12 03:27:04'),
(9, 'Documento de prueba 4', '2023-04-04', 'yuioghjk', 'yuiokjhyu', 'fghjklñ', 'gbuhinjomk,l.ñ', 'lkmvghnj', 'gvhjbnkn', 'fghjklm,', '1680648931.jpg', 'hbinjokmp', 'ghjkm', 'klj', 'hhjh', '', '', '', '', '', 1, 1, 'Michael Tapia', 1, '2023-04-20', 'Alejandro Arroyo', '2023-04-12 01:03:04', 'Alejandro Arroyo', '2023-04-12 01:02:58'),
(10, 'Documento de prueba 5', '2023-04-04', 'ggggggggggg', 'bjbbbb', 'kjkk', 'jhbjh', 'kjjkkj', 'ghjkl', 'kjhkl', '1680649409.jpg', 'jknjk', 'jnkjn', 'njjknk', 'bjhkl', '', '', '', '', '', 1, 1, 'Michael Tapia', 1, '2023-04-20', '', '', 'Michael Tapia', '2023-04-04 18:04:47'),
(11, 'Deuxh', '2023-04-04', 'fghjk', 'ghjkl', 'gthjk', 'hjjhjhj', 'hjhhjhj', ',m nk', 'kjbkj', '1680650070.jpg', 'jknkj', 'jknjn', 'kjnkj', 'kjkj', '', '', '', '', '', 1, 4, 'Michael Tapia', 3, '2023-04-07', 'Alejandro Arroyo', '2023-04-07 14:26:32', 'Michael angelo', '2023-04-07 14:25:53'),
(12, 'prueba 15', '2023-04-06', 'kkkkkk', 'hhhb', 'bhhb', 'hjjhjhj', 'jnknj', 'jnjjn', 'kjnjkn', '1680793803.pdf', 'ijioj', 'ijioj', 'ijoiij', 'uno', '', '', '', '', '', 1, 3, 'Alejandro Arroyo', 18, '2023-04-07', 'Alejandro Arroyo', '2023-04-08 01:00:09', 'Alejandro Arroyo', '2023-04-07 13:43:53'),
(13, 'ocultar usuario 2', '2023-04-06', 'ghjk', 'hjklkj', 'hbhbb', 'jjbjbj', 'jbjbjb', 'jbjbjb', 'lknlknkl', '1680827032.jpg', 'jknjkj', 'jknkj', 'klnkjnkj', 'kkkm', '3', 't', 'j', 'j', 'j', 1, 1, 'Alejandro Arroyo', 18, '2023-04-07', '', '', '', ''),
(14, 'prueba de fuego modificado', '2023-04-07', 'importante', 'Jefe', 'INEC', '2', '44', '7', 'u', '1680886228.pdf', 'oko', 'kkk', 'kmlkm', 'esto', 'esta', 'excelente', '', '', '', 1, 2, 'prueba final', 22, '2023-04-07', 'prueba final', '2023-04-07 12:04:37', 'prueba final', '2023-04-07 12:04:07'),
(15, 'superusuariosaurio', '2023-04-07', 'hello', 'jjiiii', 'kmmimi', 'jjj', 'hbhb', 'kjjnk', 'jjnjnj', '1680892153.pdf', 'jnkj', 'jnjkk', 'kjnkjk', 'jnjn', 'jj', 'nnn', 'ni', '', '', 1, 3, 'Alejandro Arroyo', 1, '2023-04-11', 'Alejandro Arroyo', '2023-04-07 13:36:15', 'Alejandro Arroyo', '2023-04-07 13:30:20'),
(16, 'hey arnold', '2023-04-07', 'jknjkn', 'kjnkjn', 'kjnkjn', 'kjnkjn', 'kjnkj', 'jnnkjnkj', 'gujikl', '1680920217.jpg', 'ioo', 'jknk', 'nn', 'hy', '', '', '', '', '', 1, 5, 'Michael t', 1, '2023-04-11', 'Alejandro Arroyo', '2023-04-12 01:03:49', 'Alejandro Arroyo', '2023-04-08 22:47:09'),
(17, 'Movil', '2023-04-09', 'R', 'E', 'E', 'R', 'F', 'S', 'R', '1681072226.jpg', 'D', 'W', 'E', 'D', '', '', '', '', '', 1, 4, 'Alejandro Arroyo', 18, '2023-04-09', NULL, NULL, NULL, NULL),
(18, 'documento 3 de la bodega 3', '2023-04-09', 'asdasd', 'asdsada', 'sdasdsa', 'adasda', 'adssada', 'dfsdfds', 'sdada', '1681077476.jpg', 'sdada', 'asdasd', 'asdasda', 'cr', '', '', '', '', '', 1, 3, 'movil', 12, '2023-04-09', 'movil', '2023-04-09 21:59:48', 'movil', '2023-04-09 21:58:08'),
(19, '20 de abril', '2023-04-20', 'uihiuh', 'uihiu', 'hhjbhb', '8', 'kjnkj', 'jnj', 'kjnkjn', '1682000065.pdf', 'asdas', 'kjnkj', 'ygygy', 'lllllo4', '', '', '', '', '', 1, 1, 'Alejandro Arroyo Mera', 1, '2023-04-20', NULL, NULL, NULL, NULL),
(20, 'hyhy', '2023-04-20', 'iuhuhi', 'iuhiuh', 'jhbghgj', 'jhbjh', 'hjbjh', 'hjbhjbjh', 'hbhjb', '1680916244.jpg', 'hbhjb', 'kjnk', 'kjnjn', 'dfdf', '', '', '', '', '', 1, 6, 'Alejandro Arroyo', 1, '2023-04-20', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modificacion_bitacoras`
--

CREATE TABLE `modificacion_bitacoras` (
  `id_modificacion` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `fk_usuario_que_modifico_documento` varchar(50) DEFAULT NULL,
  `fecha_modificacion` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `modificacion_bitacoras`
--

INSERT INTO `modificacion_bitacoras` (`id_modificacion`, `nombre`, `fk_usuario_que_modifico_documento`, `fecha_modificacion`) VALUES
(1, 'bitacora bodega 1', 'Alejandro Arroyo Mera', '2023-04-12 03:48:46'),
(2, 'bitacora bodega 1 entregada', 'Michael Tapia', '2023-04-12 03:49:47'),
(3, 'modificado', 'Alejandro Arroyo Mera', '2023-04-12 04:00:28'),
(4, 'PESeiro', 'Alejandro Arroyo Mera', '2023-04-12 04:21:07'),
(5, 'Olga Tañon cañon', 'Alejandro Arroyo Mera', '2023-04-12 04:55:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modificacion_bodegas`
--

CREATE TABLE `modificacion_bodegas` (
  `id_modificacion` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `fk_usuario_que_modifico_documento` varchar(50) DEFAULT NULL,
  `fecha_modificacion` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `modificacion_bodegas`
--

INSERT INTO `modificacion_bodegas` (`id_modificacion`, `nombre`, `fk_usuario_que_modifico_documento`, `fecha_modificacion`) VALUES
(1, 'Bodega 6', 'Alejandro Arroyo', '2023-04-11 21:30:12'),
(2, 'Bodega 6', 'Alejandro Arroyo', '2023-04-11 22:03:34'),
(3, 'Bodega 2', 'Alejandro Arroyo', '2023-04-12 00:19:54'),
(4, 'Bodega 2', 'Alejandro Arroyo', '2023-04-12 00:21:40'),
(5, 'bodega 7', 'Alejandro Arroyo', '2023-04-12 00:35:42'),
(6, 'Bodega 3', 'Alejandro Arroyo', '2023-04-12 00:38:50'),
(7, 'Bodega 3', 'Alejandro Arroyo', '2023-04-12 00:40:18'),
(8, 'Bodega 3', 'Alejandro Arroyo', '2023-04-12 00:40:55'),
(9, 'bodega 7', 'Alejandro Arroyo', '2023-04-12 00:41:12'),
(10, 'Bodega 2', 'Alejandro Arroyo', '2023-04-12 00:44:43'),
(11, 'Bodega 2', 'Alejandro Arroyo', '2023-04-12 00:48:17'),
(12, 'Bodega 4', 'Alejandro Arroyo', '2023-04-12 00:50:14'),
(13, 'Bodega 4', 'Alejandro Arroyo', '2023-04-12 00:52:34'),
(14, 'Bodega 9', 'Alejandro Arroyo', '2023-04-12 00:57:24'),
(15, 'Bodega 2', 'Alejandro Arroyo Mera', '2023-04-12 04:39:06'),
(16, 'Bodega 4', 'Alejandro Arroyo Mera', '2023-04-12 04:39:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modificacion_documentos`
--

CREATE TABLE `modificacion_documentos` (
  `id_modificacion` int(11) NOT NULL,
  `numero_documento` varchar(50) NOT NULL,
  `fk_usuario_que_modifico_documento` varchar(50) NOT NULL,
  `fecha_modificacion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `modificacion_documentos`
--

INSERT INTO `modificacion_documentos` (`id_modificacion`, `numero_documento`, `fk_usuario_que_modifico_documento`, `fecha_modificacion`) VALUES
(1, '11', '3', '2023-04-06 01:11:30'),
(2, 'nekkkk', '0', '2023-04-06 01:20:12'),
(3, 'yaff', '', '2023-04-06 01:25:17'),
(4, 'por fin', '', '2023-04-06 01:32:53'),
(5, 'qque tal', '', '2023-04-06 01:33:41'),
(6, 'come on', '', '2023-04-06 01:35:47'),
(7, 'sheet', '', '2023-04-06 01:42:29'),
(8, 'uuuu', '', '2023-04-06 01:47:19'),
(9, 'SO', '0', '2023-04-06 01:53:28'),
(10, 'y asi?', '0', '2023-04-06 01:54:48'),
(11, 'a mimir?', 'Nicole Arroyo', '2023-04-06 01:55:40'),
(12, 'not this sheet again', 'yo', '2023-04-06 01:56:00'),
(13, 'fuck', '', '2023-04-06 01:58:05'),
(14, 'kjkj', 'Victor Ocampo', '2023-04-06 01:59:09'),
(15, 'no?', '', '2023-04-06 01:59:59'),
(16, 'jaja', '', '2023-04-06 02:00:31'),
(17, 'jese', '', '2023-04-06 02:02:23'),
(18, 'lo se, funcionará', '', '2023-04-06 02:03:12'),
(19, 'lo comprendi', '0', '2023-04-06 02:08:33'),
(20, '', '0', '2023-04-06 02:09:42'),
(21, 'dale', '0', '2023-04-06 02:10:07'),
(22, 'mmm', '0', '2023-04-06 02:10:56'),
(23, 'venga', '0', '2023-04-06 02:12:03'),
(24, 'este', '0', '2023-04-06 02:12:56'),
(25, 'dale sha', 'Alejandro A ', '2023-04-06 02:13:39'),
(26, 'vengache', 'Alejandro Arroyo', '2023-04-06 02:14:53'),
(27, 'si o no', 'Alejandro Arroyo', '2023-04-06 02:16:20'),
(28, 'vengache', 'Alejandro Arroyo', '2023-04-06 02:16:52'),
(29, 'vengache', 'Alejandro Arroyo', '2023-04-06 02:18:06'),
(30, 'vamonos', 'Nicole Arroyo', '2023-04-06 02:19:08'),
(31, 'asi mejor', 'Nicole Arroyo', '2023-04-06 09:51:07'),
(32, 'prueba final parte 12', 'Alejandro Arroyo', '2023-04-06 10:10:54'),
(33, 'pruebalo', 'Alejandro Arroyo', '2023-04-06 14:57:15'),
(34, 'kaka', 'Alejandro Arroyo', '2023-04-06 14:57:25'),
(35, 'kaka', 'Alejandro Arroyo', '2023-04-06 14:57:38'),
(36, 'kaka', 'Michael Tapielalo', '2023-04-06 15:01:56'),
(37, 'numero_documentoas', 'Alejandro Arroyo', '2023-04-06 18:40:57'),
(38, 'kaka', 'Alejandro Arroyo', '2023-04-06 18:46:38'),
(39, 'ocultar usuario 2', 'Alejandro Arroyo', '2023-04-06 19:24:51'),
(40, 'kaka', 'Alejandro Arroyo', '2023-04-06 19:32:04'),
(41, 'prueba de fuego', 'Alejandro Arroyo', '2023-04-07 11:52:01'),
(42, 'prueba de fuego modificado', 'prueba final', '2023-04-07 11:54:27'),
(43, 'superusuario', 'Alejandro Arroyo', '2023-04-07 13:29:26'),
(44, 'prueba del caos', 'Nicole Arroyo', '2023-04-07 13:41:12'),
(45, 'prueba 14', 'Nicole Arroyo', '2023-04-07 13:43:20'),
(46, 'prueba 15', 'Alejandro Arroyo', '2023-04-07 13:44:06'),
(47, 'superusuarion', 'Nicole Arroyo', '2023-04-07 14:23:15'),
(48, 'Deux', 'Michael angelo', '2023-04-07 14:25:01'),
(49, '447', 'Alejandro Arroyo', '2023-04-08 01:32:47'),
(50, 'jaaa', 'Alejandro Arroyo', '2023-04-08 01:47:53'),
(51, 'jaaa', 'Alejandro Arroyo', '2023-04-08 02:07:43'),
(52, 'momomom', 'Alejandro Arroyo', '2023-04-08 03:07:50'),
(53, 'documento 3 de la bodega 3', 'movil', '2023-04-09 22:01:00'),
(54, 'modificado', 'Michael Tapia', '2023-04-12 03:27:00'),
(55, 'hey arnold', 'Alejandro Arroyo Mera', '2023-04-12 04:22:31'),
(56, 'superusuariosaurio', 'Alejandro Arroyo Mera', '2023-04-12 04:24:13'),
(57, '20 de abril', 'Alejandro Arroyo Mera', '2023-04-20 14:08:47'),
(58, '20 de abril', 'Alejandro Arroyo Mera', '2023-04-20 14:11:32'),
(59, '20 de abril', 'Alejandro Arroyo Mera', '2023-04-20 14:14:25'),
(60, 'Documento de prueba 1', 'Alejandro Arroyo Mera', '2023-04-20 23:15:31'),
(61, 'Documento de prueba 2', 'Alejandro Arroyo Mera', '2023-04-20 23:15:38'),
(62, 'Documento de prueba 3', 'Alejandro Arroyo Mera', '2023-04-20 23:15:44'),
(63, 'Documento de prueba 4', 'Alejandro Arroyo Mera', '2023-04-20 23:15:54'),
(64, 'Documento de prueba 5', 'Alejandro Arroyo Mera', '2023-04-20 23:16:02'),
(65, 'Documento de prueba 1', 'Alejandro Arroyo Mera', '2023-04-20 23:18:03'),
(66, 'Documento de prueba 1', 'Alejandro Arroyo Mera', '2023-04-20 23:19:24'),
(67, 'Documento de prueba 2', 'Michael Tapioca', '2023-04-21 02:38:59'),
(68, 'Documento de prueba 2', 'Michael Tapioca', '2023-04-21 02:39:44'),
(69, 'Documento de prueba 1', 'Alejandro Arroyo Mera', '2024-05-09 21:29:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modificacion_usuarios`
--

CREATE TABLE `modificacion_usuarios` (
  `id_modificacion` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `usuario_que_modifico_documento` varchar(50) NOT NULL,
  `fecha_modificacion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `modificacion_usuarios`
--

INSERT INTO `modificacion_usuarios` (`id_modificacion`, `nombre`, `usuario_que_modifico_documento`, `fecha_modificacion`) VALUES
(43, 'Victor Ocampi', 'Alejandro Arroyo Mera', '2023-04-12 04:24:53'),
(44, 'Michael Tapioca', 'Alejandro Arroyo Mera', '2023-04-12 04:25:11'),
(45, 'usuario nuevecito', 'Alejandro Arroyo Mera', '2023-04-12 04:26:22'),
(46, 'Victor Ocampi', 'Alejandro Arroyo Mera', '2023-04-12 04:28:08'),
(47, 'Michael Tapioca', 'Alejandro Arroyo Mera', '2023-04-21 01:10:32'),
(48, 'Michael Tapioca', 'Alejandro Arroyo Mera', '2023-04-21 01:13:00'),
(49, 'Michael Tapioca', 'Alejandro Arroyo Mera', '2023-04-21 01:15:31'),
(50, 'Michael Tapia', 'Alejandro Arroyo Mera', '2023-12-28 02:45:13'),
(51, 'usuario nuevecito', 'Michael Tapia', '2024-04-29 20:46:15'),
(52, 'usuario nuevecito', 'usuario nuevecito', '2024-04-29 20:47:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso`
--

CREATE TABLE `permiso` (
  `idpermiso` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `permiso`
--

INSERT INTO `permiso` (`idpermiso`, `nombre`) VALUES
(1, 'Nivel 1 Gestion de documentos'),
(2, 'Nivel 2'),
(3, 'Nivel 3 Acceso');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_documento`
--

CREATE TABLE `tipo_documento` (
  `idtipodocumento` int(11) NOT NULL,
  `nombre` varchar(70) NOT NULL,
  `condicion` tinyint(1) DEFAULT NULL,
  `descripcion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_documento`
--

INSERT INTO `tipo_documento` (`idtipodocumento`, `nombre`, `condicion`, `descripcion`) VALUES
(27, 'MEMORANDO', 1, 'Mensaje escrito que se usa para comunicar algo de manera interna en una empresa; se trata de un anuncio breve que sirve para recordar una actividad o un tema en específico a los empleados.'),
(42, 'OFICIO', 1, 'Un oficio se refiere a una comunicación formal que informa sobre diferentes tipos de órdenes, disposiciones, solicitudes, gestiones y procedimientos en el marco de una determinada institución'),
(43, 'Nuevo tipo de documento 2', 1, 'Es una prueba'),
(44, 'Bodega1', 1, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `tipo_documento` varchar(20) NOT NULL,
  `num_documento` varchar(20) NOT NULL,
  `direccion` varchar(256) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `cargo` varchar(100) NOT NULL,
  `login` varchar(20) NOT NULL,
  `clave` varchar(64) NOT NULL,
  `imagen` varchar(50) NOT NULL,
  `fk_bodega_usuario` varchar(50) NOT NULL,
  `condicion` tinyint(4) NOT NULL DEFAULT 1,
  `usuario_que_creo_documento` varchar(50) NOT NULL,
  `fecha_creacion` date NOT NULL,
  `usuario_que_modifico_documento` varchar(50) NOT NULL,
  `fecha_modificacion` date NOT NULL,
  `usuario_que_activo` varchar(50) DEFAULT NULL,
  `fecha_activacion` varchar(50) DEFAULT NULL,
  `usuario_que_desactivo` varchar(50) DEFAULT NULL,
  `fecha_desactivacion` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nombre`, `tipo_documento`, `num_documento`, `direccion`, `telefono`, `email`, `cargo`, `login`, `clave`, `imagen`, `fk_bodega_usuario`, `condicion`, `usuario_que_creo_documento`, `fecha_creacion`, `usuario_que_modifico_documento`, `fecha_modificacion`, `usuario_que_activo`, `fecha_activacion`, `usuario_que_desactivo`, `fecha_desactivacion`) VALUES
(1, 'Alejandro Arroyo Mera', 'cédula', '1723794655', 'asdsadas', '0987751209', 'alejoarroyo24@outlook.com', 'jefe', 'admin', 'admin', '1681266542.jpg', '3', 1, 'Alejandro Arroyo', '2023-04-11', 'alejandro Arroyo', '2023-04-11', NULL, NULL, NULL, NULL),
(2, 'Michael Tapia', 'cédula', '1723794655', 'Calle Pedro Vicente Maldonado, parque metropolitano del sur', '0987751209', 'alejoarroyo24@outlook.com', 'Jefe', 'Michael1', 'alejito24', '1681265511.png', '1', 1, 'alejandro Arroyo', '2023-04-11', 'Alejandro Arroyo Mera', '2023-12-27', NULL, NULL, NULL, NULL),
(3, 'Victor Ocampi', 'cédula', 'sadadasd', 'Calle Pedro Vicente Maldonado, parque metropolitano del sur', '0987751209', 'alejoarroyo24@outlook.com', 'Ejecutivo', 'victor1', 'alejito24', '1681265571.jpg', '5', 1, 'alejandro Arroyo', '2023-04-11', 'Alejandro Arroyo Mera', '2023-04-11', 'Alejandro Arroyo Mera', '2023-04-21 01:06:02', 'Alejandro Arroyo Mera', '2023-04-21 01:05:51'),
(4, 'usuario nuevecito', 'cédula', '5345424', 'asdasdsadasa', '0987751209', 'alejoarroyo24@outlook.com', 'Ejecutivo', 'usuario1', 'alejito24', '1681266317.jpg', '4', 1, 'alejandro Arroyo', '2023-04-11', 'usuario nuevecito', '2024-04-29', 'Alejandro Arroyo Mera', '2023-04-12 03:20:46', 'Alejandro Arroyo Mera', '2023-04-12 03:20:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_permiso`
--

CREATE TABLE `usuario_permiso` (
  `idusuario_permiso` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `idpermiso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `usuario_permiso`
--

INSERT INTO `usuario_permiso` (`idusuario_permiso`, `idusuario`, `idpermiso`) VALUES
(2, 0, 3),
(3, 0, 3),
(4, 0, 3),
(5, 0, 2),
(6, 0, 3),
(12, 1, 3),
(16, 3, 2),
(20, 2, 3),
(23, 4, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  ADD PRIMARY KEY (`id_documento`),
  ADD KEY `rel_usuario_modificacion_documento` (`fk_usuario_que_modifico_documento`);

--
-- Indices de la tabla `bitacorab2`
--
ALTER TABLE `bitacorab2`
  ADD PRIMARY KEY (`id_documento`);

--
-- Indices de la tabla `bitacorab3`
--
ALTER TABLE `bitacorab3`
  ADD PRIMARY KEY (`id_documento`);

--
-- Indices de la tabla `bitacorab4`
--
ALTER TABLE `bitacorab4`
  ADD PRIMARY KEY (`id_documento`);

--
-- Indices de la tabla `bitacorab5`
--
ALTER TABLE `bitacorab5`
  ADD PRIMARY KEY (`id_documento`);

--
-- Indices de la tabla `bitacorab6`
--
ALTER TABLE `bitacorab6`
  ADD PRIMARY KEY (`id_documento`);

--
-- Indices de la tabla `bodega`
--
ALTER TABLE `bodega`
  ADD PRIMARY KEY (`id_bodega`);

--
-- Indices de la tabla `documento`
--
ALTER TABLE `documento`
  ADD PRIMARY KEY (`id_documento`),
  ADD KEY `i_codigo` (`codigo`),
  ADD KEY `i_fecha_documento` (`fecha`),
  ADD KEY `i_remitente` (`remitente`),
  ADD KEY `i_asunto` (`asunto`),
  ADD KEY `i_destinatario` (`destinatario`),
  ADD KEY `i_area` (`area`),
  ADD KEY `i_autor_documento` (`autor`),
  ADD KEY `i_estado_documento` (`estado`),
  ADD KEY `rel_documento_tipo_documento` (`fk_id_tipo_documento`);

--
-- Indices de la tabla `documento_activo`
--
ALTER TABLE `documento_activo`
  ADD PRIMARY KEY (`id_documento`),
  ADD KEY `rel_bodega_documento` (`fk_bodega_archivo_documento`),
  ADD KEY `criterio1` (`criterio1`,`criterio2`,`criterio3`,`criterio4`,`criterio5`,`criterio6`),
  ADD KEY `rel_usuario_creacion_documento` (`fk_usuario_que_modifico_documento`);

--
-- Indices de la tabla `modificacion_bitacoras`
--
ALTER TABLE `modificacion_bitacoras`
  ADD PRIMARY KEY (`id_modificacion`);

--
-- Indices de la tabla `modificacion_bodegas`
--
ALTER TABLE `modificacion_bodegas`
  ADD PRIMARY KEY (`id_modificacion`);

--
-- Indices de la tabla `modificacion_documentos`
--
ALTER TABLE `modificacion_documentos`
  ADD PRIMARY KEY (`id_modificacion`);

--
-- Indices de la tabla `modificacion_usuarios`
--
ALTER TABLE `modificacion_usuarios`
  ADD PRIMARY KEY (`id_modificacion`);

--
-- Indices de la tabla `permiso`
--
ALTER TABLE `permiso`
  ADD PRIMARY KEY (`idpermiso`);

--
-- Indices de la tabla `tipo_documento`
--
ALTER TABLE `tipo_documento`
  ADD PRIMARY KEY (`idtipodocumento`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`),
  ADD UNIQUE KEY `login_UNIQUE` (`login`),
  ADD KEY `rel_usuario_bodega` (`fk_bodega_usuario`);

--
-- Indices de la tabla `usuario_permiso`
--
ALTER TABLE `usuario_permiso`
  ADD PRIMARY KEY (`idusuario_permiso`),
  ADD KEY `rel_usuario_permiso_usuario` (`idusuario`),
  ADD KEY `rel_usuario_permiso_permiso` (`idpermiso`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  MODIFY `id_documento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `bitacorab2`
--
ALTER TABLE `bitacorab2`
  MODIFY `id_documento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `bitacorab3`
--
ALTER TABLE `bitacorab3`
  MODIFY `id_documento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `bitacorab4`
--
ALTER TABLE `bitacorab4`
  MODIFY `id_documento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `bitacorab5`
--
ALTER TABLE `bitacorab5`
  MODIFY `id_documento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `bitacorab6`
--
ALTER TABLE `bitacorab6`
  MODIFY `id_documento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `bodega`
--
ALTER TABLE `bodega`
  MODIFY `id_bodega` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `documento`
--
ALTER TABLE `documento`
  MODIFY `id_documento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `documento_activo`
--
ALTER TABLE `documento_activo`
  MODIFY `id_documento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `modificacion_bitacoras`
--
ALTER TABLE `modificacion_bitacoras`
  MODIFY `id_modificacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `modificacion_bodegas`
--
ALTER TABLE `modificacion_bodegas`
  MODIFY `id_modificacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `modificacion_documentos`
--
ALTER TABLE `modificacion_documentos`
  MODIFY `id_modificacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT de la tabla `modificacion_usuarios`
--
ALTER TABLE `modificacion_usuarios`
  MODIFY `id_modificacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT de la tabla `permiso`
--
ALTER TABLE `permiso`
  MODIFY `idpermiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuario_permiso`
--
ALTER TABLE `usuario_permiso`
  MODIFY `idusuario_permiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
