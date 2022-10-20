-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-10-2022 a las 08:03:21
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
-- Base de datos: `inventario`
--

DELIMITER $$
--
-- Procedimientos
--
DROP PROCEDURE IF EXISTS `sp_buscar_bien`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_buscar_bien` (IN `codigo` VARCHAR(10))   BEGIN
	DECLARE des_completo VARCHAR(50);
	IF  codigo=(select pat_codigo from  patrimonio  where pat_codigo=codigo) 
	THEN
	select pat_descripcion as des_completo, pat_serie from patrimonio where pat_codigo=codigo;
    ELSE 
		SET des_completo='No existe el bien';
        SELECT des_completo;
    END IF;
END$$

DROP PROCEDURE IF EXISTS `sp_buscar_personal`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_buscar_personal` (IN `dni` VARCHAR(8))   BEGIN
	DECLARE nombre_completo VARCHAR(50);
	IF  dni=(select per_dni from  personal  where per_dni=dni) 
	THEN
	select concat( per_nombre,' ', per_apellido) as nombre_completo from personal where per_dni=dni;
    ELSE 
		SET nombre_completo='Personal inexistente';
        SELECT nombre_completo;
    END IF;
END$$

DROP PROCEDURE IF EXISTS `sp_electrodomestico_actualizar`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_electrodomestico_actualizar` (IN `id` INT, IN `codigo` VARCHAR(8), IN `descripcion` VARCHAR(50), IN `marca` VARCHAR(50), IN `modelo` VARCHAR(50), IN `color` VARCHAR(45), IN `estado` VARCHAR(15), IN `disponibilidad` VARCHAR(10), IN `cat` INT)   BEGIN
set cat=(select cat_id from categoria where cat_id=cat);
update patrimonio
set pat_codigo=codigo, pat_descripcion=descripcion, pat_marca=marca, 
pat_modelo=modelo, pat_color=color, pat_estado=estado,
pat_disponibilidad=disponibilidad,cat_id=cat
where pat_id=id;
END$$

DROP PROCEDURE IF EXISTS `sp_electrodomestico_editar`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_electrodomestico_editar` (IN `id` INT)   BEGIN
select pat_id,pat_codigo,pat_descripcion,pat_marca,pat_modelo,pat_color,pat_estado,
pat_disponibilidad,categoria.cat_id from patrimonio inner join categoria
on patrimonio.cat_id=categoria.cat_id
where pat_id=id ;
END$$

DROP PROCEDURE IF EXISTS `sp_electrodomestico_eliminar`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_electrodomestico_eliminar` (IN `id` INT)   BEGIN
delete from patrimonio where pat_id=id;
END$$

DROP PROCEDURE IF EXISTS `sp_electrodomestico_insertar`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_electrodomestico_insertar` (IN `codigo` VARCHAR(8), IN `descripcion` VARCHAR(50), IN `marca` VARCHAR(50), IN `modelo` VARCHAR(50), IN `color` VARCHAR(45), IN `estado` VARCHAR(15), IN `disponibilidad` VARCHAR(10), IN `cat` INT)   BEGIN
declare id int;
set id=(select cat_id from categoria where cat_id=cat);
insert into patrimonio(pat_codigo,pat_descripcion,pat_marca,pat_modelo,
pat_color,pat_estado,pat_disponibilidad,cat_id) 
values(codigo,descripcion,marca,modelo,color,estado,disponibilidad,id);
END$$

DROP PROCEDURE IF EXISTS `sp_electrodomestico_listar`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_electrodomestico_listar` ()   BEGIN
select pat_id,pat_codigo,pat_descripcion,pat_marca,pat_modelo,pat_color,pat_estado,
pat_disponibilidad
from  patrimonio inner join categoria on patrimonio.cat_id=categoria.cat_id
where patrimonio.cat_id=4;
END$$

DROP PROCEDURE IF EXISTS `sp_equipo_actualizar`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_equipo_actualizar` (IN `id` INT, IN `codigo` VARCHAR(8), IN `descripcion` VARCHAR(50), IN `marca` VARCHAR(50), IN `modelo` VARCHAR(50), IN `serie` VARCHAR(50), IN `color` VARCHAR(45), IN `estado` VARCHAR(15), IN `disponibilidad` VARCHAR(10), IN `cat` INT)   BEGIN
set cat=(select cat_id from categoria where cat_id=cat);
update patrimonio
set pat_codigo=codigo, pat_descripcion=descripcion, pat_marca=marca, 
pat_modelo=modelo, pat_serie=serie, pat_color=color, pat_estado=estado,
pat_disponibilidad=disponibilidad,cat_id=cat
where pat_id=id;
END$$

DROP PROCEDURE IF EXISTS `sp_equipo_editar`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_equipo_editar` (IN `id` INT)   BEGIN
select pat_id,pat_codigo,pat_descripcion,pat_marca,pat_modelo,pat_serie,pat_color,pat_estado,
pat_disponibilidad,categoria.cat_id from patrimonio inner join categoria
on patrimonio.cat_id=categoria.cat_id
where pat_id=id ;
END$$

DROP PROCEDURE IF EXISTS `sp_equipo_eliminar`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_equipo_eliminar` (IN `id` INT)   BEGIN
delete from patrimonio where pat_id=id;
END$$

DROP PROCEDURE IF EXISTS `sp_equipo_insertar`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_equipo_insertar` (IN `codigo` VARCHAR(8), IN `descripcion` VARCHAR(50), IN `marca` VARCHAR(50), IN `modelo` VARCHAR(50), IN `serie` VARCHAR(50), IN `color` VARCHAR(45), IN `estado` VARCHAR(15), IN `disponibilidad` VARCHAR(10), IN `cat` INT)   BEGIN
declare id int;
set id=(select cat_id from categoria where cat_id=cat);
insert into patrimonio(pat_codigo,pat_descripcion,pat_marca,pat_modelo,pat_serie,
pat_color,pat_estado,pat_disponibilidad,cat_id) 
values(codigo,descripcion,marca,modelo,serie,color,estado,disponibilidad,id);
END$$

DROP PROCEDURE IF EXISTS `sp_equipo_listar`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_equipo_listar` ()   BEGIN
select pat_id,pat_codigo,pat_descripcion,pat_marca,pat_serie,pat_color,pat_estado,
pat_disponibilidad
from  patrimonio inner join categoria on patrimonio.cat_id=categoria.cat_id
where patrimonio.cat_id=1;
END$$

DROP PROCEDURE IF EXISTS `sp_listar_movimiento`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_listar_movimiento` ()   BEGIN
select pat_id,pat_codigo,pat_descripcion,pat_marca,pat_serie,pat_color,pat_estado,
pat_disponibilidad,concat(per_nombre,' ', per_apellido) as nombres
from  patrimonio inner join movimiento on patrimonio.pat_id=movimiento.pat_id 
inner join personal on movimiento.per_id=personal.per_id;
END$$

DROP PROCEDURE IF EXISTS `sp_mobiliario_actualizar`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_mobiliario_actualizar` (IN `id` INT, IN `codigo` VARCHAR(8), IN `descripcion` VARCHAR(50), IN `marca` VARCHAR(50), IN `dimension` VARCHAR(50), IN `color` VARCHAR(45), IN `estado` VARCHAR(15), IN `disponibilidad` VARCHAR(10), IN `cat` INT)   BEGIN
set cat=(select cat_id from categoria where cat_id=cat);
update patrimonio
set pat_codigo=codigo, pat_descripcion=descripcion, pat_marca=marca, 
pat_dimension=dimension, pat_color=color, pat_estado=estado,
pat_disponibilidad=disponibilidad,cat_id=cat
where pat_id=id;
END$$

DROP PROCEDURE IF EXISTS `sp_mobiliario_editar`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_mobiliario_editar` (IN `id` INT)   BEGIN
select pat_id,pat_codigo,pat_descripcion,pat_marca,pat_dimension,pat_color,pat_estado,
pat_disponibilidad,categoria.cat_id from patrimonio inner join categoria
on patrimonio.cat_id=categoria.cat_id
where pat_id=id ;
END$$

DROP PROCEDURE IF EXISTS `sp_mobiliario_eliminar`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_mobiliario_eliminar` (IN `id` INT)   BEGIN
delete from patrimonio where pat_id=id;
END$$

DROP PROCEDURE IF EXISTS `sp_mobiliario_insertar`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_mobiliario_insertar` (IN `codigo` VARCHAR(8), IN `descripcion` VARCHAR(50), IN `marca` VARCHAR(50), IN `dimension` VARCHAR(50), IN `color` VARCHAR(45), IN `estado` VARCHAR(15), IN `disponibilidad` VARCHAR(10), IN `cat` INT)   BEGIN
declare id int;
set id=(select cat_id from categoria where cat_id=cat);
insert into patrimonio(pat_codigo,pat_descripcion,pat_marca,pat_dimension,
pat_color,pat_estado,pat_disponibilidad,cat_id) 
values(codigo,descripcion,marca,dimension,color,estado,disponibilidad,id);
END$$

DROP PROCEDURE IF EXISTS `sp_mobiliario_listar`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_mobiliario_listar` ()   BEGIN
select pat_id,pat_codigo,pat_descripcion,pat_marca,pat_dimension,pat_color,pat_estado,
pat_disponibilidad
from  patrimonio inner join categoria on patrimonio.cat_id=categoria.cat_id
where patrimonio.cat_id=2;
END$$

DROP PROCEDURE IF EXISTS `sp_movimiento_actualizar`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_movimiento_actualizar` (IN `id` INT, IN `fecha` DATE, IN `dni` VARCHAR(8), IN `tipo` INT, IN `codigo` VARCHAR(10), IN `disponibilidad` VARCHAR(45))   BEGIN
declare personal_id int;
declare patrimonio_id int;
START TRANSACTION;
set personal_id =(select per_id from personal where per_dni=dni);
set patrimonio_id = (select pat_id from patrimonio where pat_codigo=codigo);
update movimiento set mov_fecha=fecha,tmov_id=tipo,per_id=personal_id,pat_id=patrimonio_id
where mov_id=id;

#para insertar el dsp en patrimonio
update patrimonio set pat_disponibilidad=disponibilidad where pat_id=patrimonio_id;
COMMIT;
END$$

DROP PROCEDURE IF EXISTS `sp_movimiento_editar`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_movimiento_editar` (IN `id` INT)   BEGIN
select movimiento.mov_id,mov_fecha,per_dni, concat( per_nombre,' ', per_apellido) as nombre_completo, tmov_id,
pat_codigo, pat_descripcion,patrimonio.pat_id, pat_serie, pat_disponibilidad from  patrimonio inner join movimiento on 
patrimonio.pat_id=movimiento.pat_id inner join personal on movimiento.per_id=personal.per_id
where movimiento.mov_id=id; 
END$$

DROP PROCEDURE IF EXISTS `sp_movimiento_eliminar`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_movimiento_eliminar` (IN `id` INT)   BEGIN
delete from movimiento where mov_id=id;
END$$

DROP PROCEDURE IF EXISTS `sp_movimiento_insertar`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_movimiento_insertar` (IN `fecha` DATE, IN `dni` VARCHAR(8), IN `t_movimiento` INT, IN `codigo` VARCHAR(10), IN `disponibilidad` VARCHAR(45))   BEGIN
declare personal_id int;
declare patrimonio_id int;
declare tipo int;
START TRANSACTION;
set personal_id =(select per_id from personal where per_dni=dni);
set patrimonio_id = (select pat_id from patrimonio where pat_codigo=codigo);
#set tipo = (select tmov_id from tipo_movimiento where tmov_descripcion=t_movimiento);
insert into movimiento (mov_fecha,tmov_id,per_id,pat_id)
values (fecha,t_movimiento,personal_id,patrimonio_id);
#para insertar el dsp en patrimonio
update patrimonio set pat_disponibilidad=disponibilidad where pat_id=patrimonio_id;
COMMIT;

END$$

DROP PROCEDURE IF EXISTS `sp_movimiento_listar`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_movimiento_listar` ()   BEGIN
select mov_id,pat_codigo,pat_descripcion,pat_marca,pat_serie,pat_color,pat_estado,
pat_disponibilidad,tmov_descripcion,concat(per_nombre,' ', per_apellido) as nombres, mov_fecha
from  patrimonio inner join movimiento on patrimonio.pat_id=movimiento.pat_id 
inner join personal on movimiento.per_id=personal.per_id inner join tipo_movimiento on
movimiento.tmov_id=tipo_movimiento.tmov_id;
END$$

DROP PROCEDURE IF EXISTS `sp_personal_actualizar`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_personal_actualizar` (IN `id` INT(11), IN `dni` VARCHAR(8), IN `nombre` VARCHAR(45), IN `apellido` VARCHAR(45), IN `correo` VARCHAR(45), IN `direccion` VARCHAR(45), IN `celular` VARCHAR(12), IN `area` VARCHAR(45), IN `piso` VARCHAR(45), IN `tipo` INT(11))   BEGIN
set tipo=(select tper_id from tipo_personal where tper_id=tipo);
update personal
set per_dni=dni, per_nombre=nombre, per_apellido=apellido, 
per_correo=correo, per_direccion=direccion, per_celular=celular, per_area=area,
per_piso=piso,tper_id=tipo
where per_id=id;
END$$

DROP PROCEDURE IF EXISTS `sp_personal_editar`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_personal_editar` (IN `id` INT(11))   BEGIN
select personal.* from personal inner join tipo_personal
on personal.tper_id=tipo_personal.tper_id
where per_id=id ;
END$$

DROP PROCEDURE IF EXISTS `sp_personal_eliminar`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_personal_eliminar` (IN `id` INT)   BEGIN
delete from personal where per_id=id;
END$$

DROP PROCEDURE IF EXISTS `sp_personal_insertar`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_personal_insertar` (IN `dni` VARCHAR(8), IN `nombre` VARCHAR(45), IN `apellido` VARCHAR(45), IN `correo` VARCHAR(45), IN `direccion` VARCHAR(45), IN `celular` VARCHAR(12), IN `area` VARCHAR(45), IN `piso` VARCHAR(45), IN `tipo` INT(11))   BEGIN
declare id int;
set id=(select tper_id from tipo_personal where tper_modalidad=tipo);
insert into personal(per_dni,per_nombre,per_apellido,per_correo,per_direccion,per_celular,per_area,per_piso,tper_id) 
values(dni,nombre,apellido,correo,direccion,celular,area,piso,tipo);
END$$

DROP PROCEDURE IF EXISTS `sp_personal_listar`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_personal_listar` ()   BEGIN
select per_id, per_dni, concat(per_nombre,' ', per_apellido) as nombres,per_correo,per_area ,tper_modalidad
from  personal inner join tipo_personal  
on personal.tper_id=tipo_personal.tper_id;
END$$

DROP PROCEDURE IF EXISTS `sp_vehiculo_actualizar`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_vehiculo_actualizar` (IN `id` INT, IN `codigo` VARCHAR(8), IN `descripcion` VARCHAR(50), IN `marca` VARCHAR(50), IN `modelo` VARCHAR(50), IN `color` VARCHAR(45), IN `placa` VARCHAR(45), IN `anio` VARCHAR(45), IN `estado` VARCHAR(15), IN `disponibilidad` VARCHAR(10), IN `cat` INT)   BEGIN
set cat=(select cat_id from categoria where cat_id=cat);
update patrimonio
set pat_codigo=codigo, pat_descripcion=descripcion, pat_marca=marca, 
pat_modelo=modelo, pat_color=color, pat_placa=placa, pat_anio=anio,pat_estado=estado,
pat_disponibilidad=disponibilidad,cat_id=cat
where pat_id=id;
END$$

DROP PROCEDURE IF EXISTS `sp_vehiculo_editar`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_vehiculo_editar` (IN `id` INT)   BEGIN
select pat_id,pat_codigo,pat_descripcion,pat_marca,pat_modelo,pat_color,pat_placa,pat_anio,
pat_estado,pat_disponibilidad,categoria.cat_id from patrimonio inner join categoria
on patrimonio.cat_id=categoria.cat_id
where pat_id=id ;
END$$

DROP PROCEDURE IF EXISTS `sp_vehiculo_eliminar`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_vehiculo_eliminar` (IN `id` INT)   BEGIN
delete from patrimonio where pat_id=id;
END$$

DROP PROCEDURE IF EXISTS `sp_vehiculo_insertar`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_vehiculo_insertar` (IN `codigo` VARCHAR(8), IN `descripcion` VARCHAR(50), IN `marca` VARCHAR(50), IN `modelo` VARCHAR(50), IN `color` VARCHAR(45), IN `placa` VARCHAR(45), IN `anio` VARCHAR(45), IN `estado` VARCHAR(15), IN `disponibilidad` VARCHAR(10), IN `cat` INT)   BEGIN
declare id int;
set id=(select cat_id from categoria where cat_id=cat);
insert into patrimonio(pat_codigo,pat_descripcion,pat_marca,pat_modelo,
pat_color,pat_placa,pat_anio,pat_estado,pat_disponibilidad,cat_id) 
values(codigo,descripcion,marca,modelo,color,placa,anio,estado,disponibilidad,id);
END$$

DROP PROCEDURE IF EXISTS `sp_vehiculo_listar`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_vehiculo_listar` ()   BEGIN
select pat_id,pat_codigo,pat_descripcion,pat_marca,pat_modelo,pat_color,pat_placa,pat_anio,
pat_estado,pat_disponibilidad
from  patrimonio inner join categoria on patrimonio.cat_id=categoria.cat_id
where patrimonio.cat_id=3;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE `categoria` (
  `cat_id` int(11) NOT NULL,
  `cat_descripcion` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`cat_id`, `cat_descripcion`) VALUES
(1, 'Equipo'),
(2, 'Mobiliario'),
(3, 'Vehículo'),
(4, 'Electrodoméstico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimiento`
--

DROP TABLE IF EXISTS `movimiento`;
CREATE TABLE `movimiento` (
  `mov_id` int(11) NOT NULL,
  `mov_fecha` date DEFAULT NULL,
  `tmov_id` int(11) NOT NULL,
  `per_id` int(11) NOT NULL,
  `pat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `movimiento`
--

INSERT INTO `movimiento` (`mov_id`, `mov_fecha`, `tmov_id`, `per_id`, `pat_id`) VALUES
(2, '2022-08-28', 3, 4, 3),
(7, '2022-08-09', 1, 5, 2),
(25, '2022-05-25', 3, 5, 19);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `patrimonio`
--

DROP TABLE IF EXISTS `patrimonio`;
CREATE TABLE `patrimonio` (
  `pat_id` int(11) NOT NULL,
  `pat_codigo` varchar(10) DEFAULT NULL,
  `pat_descripcion` varchar(50) DEFAULT NULL,
  `pat_marca` varchar(50) DEFAULT NULL,
  `pat_modelo` varchar(50) DEFAULT NULL,
  `pat_serie` varchar(50) DEFAULT NULL,
  `pat_dimension` varchar(45) DEFAULT NULL,
  `pat_color` varchar(45) DEFAULT NULL,
  `pat_placa` varchar(45) DEFAULT NULL,
  `pat_anio` varchar(45) DEFAULT NULL,
  `pat_estado` varchar(15) DEFAULT NULL,
  `pat_disponibilidad` varchar(10) DEFAULT NULL,
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `patrimonio`
--

INSERT INTO `patrimonio` (`pat_id`, `pat_codigo`, `pat_descripcion`, `pat_marca`, `pat_modelo`, `pat_serie`, `pat_dimension`, `pat_color`, `pat_placa`, `pat_anio`, `pat_estado`, `pat_disponibilidad`, `cat_id`) VALUES
(2, '23456', 'Monitor', 'Lenovo', 'E1-0984dc', 'dgfbhd234', NULL, 'Negro', NULL, NULL, 'Bueno', 'No', 1),
(3, '34567', 'Tablet', 'Lenovo', 'A10s', '4543235', NULL, 'plomo', NULL, NULL, 'no operativo', 'No', 1),
(9, '18345', 'CPU', 'HP', 'HP 2010', '4gdu123445', NULL, 'Negro', NULL, NULL, 'Bueno', 'No', 1),
(17, '34562', 'Silla', NULL, NULL, NULL, '45x35x100', 'Marron', NULL, NULL, 'Regular', 'No', 2),
(18, '12349', 'Moto', 'Onda', 'TERY', NULL, NULL, 'rojo', 'XR-7YT', '2014', 'Regular', 'Si', 3),
(19, '23458', 'Refrigeradora', 'Samsung', 'HYJOQ', NULL, NULL, 'Plomo', NULL, NULL, 'Regular', 'No', 4),
(20, '12367', 'Camioneta', 'Nissan', NULL, NULL, NULL, 'Blanco', 'AX-7TYUI', '2020', 'Regular', 'No', 3),
(23, '23445', 'Escritorio', NULL, NULL, NULL, '134x120x67', 'Negro', NULL, NULL, 'Regular', 'No', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

DROP TABLE IF EXISTS `personal`;
CREATE TABLE `personal` (
  `per_id` int(11) NOT NULL,
  `per_dni` varchar(8) DEFAULT NULL,
  `per_nombre` varchar(45) DEFAULT NULL,
  `per_apellido` varchar(45) DEFAULT NULL,
  `per_correo` varchar(45) DEFAULT NULL,
  `per_direccion` varchar(45) DEFAULT NULL,
  `per_celular` varchar(12) DEFAULT NULL,
  `per_area` varchar(45) DEFAULT NULL,
  `per_piso` varchar(45) DEFAULT NULL,
  `tper_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`per_id`, `per_dni`, `per_nombre`, `per_apellido`, `per_correo`, `per_direccion`, `per_celular`, `per_area`, `per_piso`, `tper_id`) VALUES
(4, '71374320', 'Katiusca', 'Truyenque Ramos', 'ramos@gmail.com', 'Av. Rosales s/n', '984858315', 'Secretaría', '3', 2),
(5, '71371112', 'Luis', 'Castañeda', 'anibal.cas@inei.gob.pe', 'Av. sol', '984858315', 'Direccion', '3', 1),
(13, '71374345', 'Ladislao', 'Costillo Camacho', 'lcostillo@inei.gob.pe', NULL, '984858111', 'Informática', '1', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_movimiento`
--

DROP TABLE IF EXISTS `tipo_movimiento`;
CREATE TABLE `tipo_movimiento` (
  `tmov_id` int(11) NOT NULL,
  `tmov_descripcion` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_movimiento`
--

INSERT INTO `tipo_movimiento` (`tmov_id`, `tmov_descripcion`) VALUES
(1, 'Préstamo'),
(2, 'Baja'),
(3, 'Asignar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_personal`
--

DROP TABLE IF EXISTS `tipo_personal`;
CREATE TABLE `tipo_personal` (
  `tper_id` int(11) NOT NULL,
  `tper_modalidad` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_personal`
--

INSERT INTO `tipo_personal` (`tper_id`, `tper_modalidad`) VALUES
(1, 'Nombrado'),
(2, 'Cas'),
(3, 'Locación');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `email_verifiet_ad` timestamp NULL DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verifiet_ad`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'lcostillo', 'lcostillo@inei.gob.pe', NULL, '$2y$10$n9JgjC45Jj9lD11n8sl9u.BzmKIdNd3eiMOBL3IWq41vUW6wItsUi', NULL, '2022-10-08 03:38:30', '2022-10-08 03:38:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `usu_id` int(11) NOT NULL,
  `usu_name` varchar(45) DEFAULT NULL,
  `usu_correo` varchar(45) DEFAULT NULL,
  `usu_telefono` varchar(45) DEFAULT NULL,
  `usu_password` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usu_id`, `usu_name`, `usu_correo`, `usu_telefono`, `usu_password`) VALUES
(1, 'lcostillo', 'lcostillo@inei.gob.pe', '987456321', '@odei-apurimac@');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indices de la tabla `movimiento`
--
ALTER TABLE `movimiento`
  ADD PRIMARY KEY (`mov_id`),
  ADD UNIQUE KEY `pat_id_UNIQUE` (`pat_id`),
  ADD KEY `fk_movimiento_tipo_movimiento1` (`tmov_id`),
  ADD KEY `fk_movimiento_personal1` (`per_id`);

--
-- Indices de la tabla `patrimonio`
--
ALTER TABLE `patrimonio`
  ADD PRIMARY KEY (`pat_id`),
  ADD UNIQUE KEY `pat_codigo_UNIQUE` (`pat_codigo`),
  ADD KEY `fk_patrimonio_categoria` (`cat_id`);

--
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`per_id`),
  ADD UNIQUE KEY `per_dni_UNIQUE` (`per_dni`),
  ADD KEY `fk_personal_tipo_personal1` (`tper_id`);

--
-- Indices de la tabla `tipo_movimiento`
--
ALTER TABLE `tipo_movimiento`
  ADD PRIMARY KEY (`tmov_id`);

--
-- Indices de la tabla `tipo_personal`
--
ALTER TABLE `tipo_personal`
  ADD PRIMARY KEY (`tper_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usu_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `movimiento`
--
ALTER TABLE `movimiento`
  MODIFY `mov_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `patrimonio`
--
ALTER TABLE `patrimonio`
  MODIFY `pat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `personal`
--
ALTER TABLE `personal`
  MODIFY `per_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `tipo_movimiento`
--
ALTER TABLE `tipo_movimiento`
  MODIFY `tmov_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipo_personal`
--
ALTER TABLE `tipo_personal`
  MODIFY `tper_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `movimiento`
--
ALTER TABLE `movimiento`
  ADD CONSTRAINT `fk_movimiento_patrimonio1` FOREIGN KEY (`pat_id`) REFERENCES `patrimonio` (`pat_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_movimiento_personal1` FOREIGN KEY (`per_id`) REFERENCES `personal` (`per_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_movimiento_tipo_movimiento1` FOREIGN KEY (`tmov_id`) REFERENCES `tipo_movimiento` (`tmov_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `patrimonio`
--
ALTER TABLE `patrimonio`
  ADD CONSTRAINT `fk_patrimonio_categoria` FOREIGN KEY (`cat_id`) REFERENCES `categoria` (`cat_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `personal`
--
ALTER TABLE `personal`
  ADD CONSTRAINT `fk_personal_tipo_personal1` FOREIGN KEY (`tper_id`) REFERENCES `tipo_personal` (`tper_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
