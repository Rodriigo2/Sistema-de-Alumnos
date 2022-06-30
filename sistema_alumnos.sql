-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 22-06-2022 a las 15:10:56
-- Versión del servidor: 5.7.31
-- Versión de PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistema_alumnos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

DROP TABLE IF EXISTS `alumnos`;
CREATE TABLE IF NOT EXISTS `alumnos` (
  `id_alumno` int(11) NOT NULL AUTO_INCREMENT,
  `dni` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(120) COLLATE utf8_spanish_ci NOT NULL,
  `sexo` int(11) NOT NULL,
  `fecha_nacimiento` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `lugar_nacimiento` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `nacionalidad` int(11) NOT NULL,
  `cuil` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `secundario` int(11) NOT NULL,
  `lugar_secundario` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `alergias` int(11) NOT NULL,
  `tipo_alergia` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `enfermedad` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_alumno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuotas`
--

DROP TABLE IF EXISTS `cuotas`;
CREATE TABLE IF NOT EXISTS `cuotas` (
  `id_cuotas` int(11) NOT NULL AUTO_INCREMENT,
  `datos` int(11) NOT NULL,
  `fecha` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `mes_pago` int(11) NOT NULL,
  `importe` int(11) NOT NULL,
  PRIMARY KEY (`id_cuotas`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `cuotas`
--

INSERT INTO `cuotas` (`id_cuotas`, `datos`, `fecha`, `mes_pago`, `importe`) VALUES
(1, 8, '19/06/2002', 7, 4500),
(3, 8, '22/07/2022', 8, 4500);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

DROP TABLE IF EXISTS `cursos`;
CREATE TABLE IF NOT EXISTS `cursos` (
  `cod_curso` int(11) NOT NULL,
  `nombre_curso` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`cod_curso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`cod_curso`, `nombre_curso`) VALUES
(1, 'Primero'),
(2, 'Segundo'),
(3, 'Tercero'),
(4, 'Cuarto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidades`
--

DROP TABLE IF EXISTS `especialidades`;
CREATE TABLE IF NOT EXISTS `especialidades` (
  `id_especialidad` int(11) NOT NULL AUTO_INCREMENT,
  `desc_especialidad` varchar(60) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`id_especialidad`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `especialidades`
--

INSERT INTO `especialidades` (`id_especialidad`, `desc_especialidad`) VALUES
(1, 'Técnico Superior en Analista programador Web'),
(2, 'Técnico Superior en Automatización y Robótica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generos`
--

DROP TABLE IF EXISTS `generos`;
CREATE TABLE IF NOT EXISTS `generos` (
  `id_genero` int(11) NOT NULL,
  `desc_genero` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`id_genero`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `generos`
--

INSERT INTO `generos` (`id_genero`, `desc_genero`) VALUES
(1, 'Femenino'),
(2, 'Masculino'),
(3, 'Sin especificar'),
(4, 'Otro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inasistencias`
--

DROP TABLE IF EXISTS `inasistencias`;
CREATE TABLE IF NOT EXISTS `inasistencias` (
  `id_inasistencia` int(11) NOT NULL AUTO_INCREMENT,
  `datos` int(11) NOT NULL,
  `curso` int(11) NOT NULL,
  `fecha` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`id_inasistencia`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `inasistencias`
--

INSERT INTO `inasistencias` (`id_inasistencia`, `datos`, `curso`, `fecha`) VALUES
(1, 7, 1, '19/06/20022');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripciones`
--

DROP TABLE IF EXISTS `inscripciones`;
CREATE TABLE IF NOT EXISTS `inscripciones` (
  `id_inscripcion` int(11) NOT NULL AUTO_INCREMENT,
  `alumno` int(11) NOT NULL,
  `especialidad` int(11) NOT NULL,
  `curso` int(11) NOT NULL,
  PRIMARY KEY (`id_inscripcion`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `inscripciones`
--

INSERT INTO `inscripciones` (`id_inscripcion`, `alumno`, `especialidad`, `curso`) VALUES
(13, 8, 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `justificaciones`
--

DROP TABLE IF EXISTS `justificaciones`;
CREATE TABLE IF NOT EXISTS `justificaciones` (
  `id_justificacion` int(11) NOT NULL AUTO_INCREMENT,
  `datos` int(11) NOT NULL,
  `fecha` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `motivo` varchar(120) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_inasistencia` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`id_justificacion`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `justificaciones`
--

INSERT INTO `justificaciones` (`id_justificacion`, `datos`, `fecha`, `motivo`, `fecha_inasistencia`) VALUES
(1, 0, '19/06/2022', 'dasdasdasdasd', '15/04/2022'),
(2, 8, '23123', 'dsadas', '23412312'),
(3, 8, '27/11/2008', 'asdsad', '27/11/2022'),
(4, 8, '21321', 'asdasd', '12321'),
(5, 8, 'asdas', 'asdasdas', 'asdasdsa'),
(6, 8, 'asdsad', 'dasdas', 'asdas'),
(7, 8, 'asdsad', 'dasdas', 'asdas'),
(8, 8, '12321', 'asdasd', '123213');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mes_pago`
--

DROP TABLE IF EXISTS `mes_pago`;
CREATE TABLE IF NOT EXISTS `mes_pago` (
  `id_mes` int(11) NOT NULL AUTO_INCREMENT,
  `des_mes` varchar(40) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`id_mes`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `mes_pago`
--

INSERT INTO `mes_pago` (`id_mes`, `des_mes`) VALUES
(1, 'Matricula'),
(2, 'Enero'),
(3, 'Febrero'),
(4, 'Marzo'),
(5, 'Abril'),
(6, 'Mayo'),
(7, 'Junio'),
(8, 'Julio'),
(9, 'Agosto'),
(10, 'Septiembre'),
(11, 'Octubre'),
(12, 'Noviembre'),
(13, 'Diciembre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nacionalidades`
--

DROP TABLE IF EXISTS `nacionalidades`;
CREATE TABLE IF NOT EXISTS `nacionalidades` (
  `nacionalidad` int(11) NOT NULL AUTO_INCREMENT,
  `desc_nacion` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`nacionalidad`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `nacionalidades`
--

INSERT INTO `nacionalidades` (`nacionalidad`, `desc_nacion`) VALUES
(1, 'Argentino'),
(2, 'Paraguayo'),
(3, 'Uruguayo'),
(4, 'Brasilero');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `cod_us` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `clave` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `codestado` int(11) NOT NULL,
  `email` varchar(120) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`cod_us`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`cod_us`, `nombre`, `clave`, `codestado`, `email`) VALUES
(1, 'rodrigo', 'peralta', 1, 'rodrigoperaltaaa@hotmail.com'),
(2, 'rodrigo2', 'rodri44', 0, 'rodrigoperalta2@gmail.com'),
(3, 'prueba', 'prueba', 1, 'prueba@hotmail.com'),
(4, 'prueba2', 'prueba2', 0, 'prueba2@hotmail.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
