-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-04-2015 a las 00:57:14
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `supply`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'Agricultura y Alimentos', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Auto y Transporte', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Bolsos, Zapatos y Accesorios', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Electrónica', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Maquinaria, Piezas y Herramientas Industriales', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Metalurgia, productos químicos, caucho y plásticos', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Packaging, Publicidad y Oficina', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Regalos, Deportes y juguetes', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'Salud y Bienestar', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas`
--

CREATE TABLE IF NOT EXISTS `empresas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `pais_id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `imagen` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `web` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `postal` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=18 ;

--
-- Volcado de datos para la tabla `empresas`
--

INSERT INTO `empresas` (`id`, `user_id`, `pais_id`, `nombre`, `slug`, `descripcion`, `imagen`, `email`, `web`, `direccion`, `telefono`, `postal`, `created_at`, `updated_at`) VALUES
(1, 1, 826, 'Juan Topo Asociados', 'juan-topo-asociados', 'Hola descripciones  de la empresa  Juan Topo Gomez\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Enim, tenetur, quasi! Voluptatibus harum veritatis, vel asperiores, voluptas aliquam qui saepe dignissimos ullam delectus, tempore officiis quidem odit laborum optio officia.', '86509.jpg', 'eerprueba@asd.com', 'https://www.google.com.co/', 'Calle Falsa 1234', '787878787', '123', '2015-03-12 15:51:03', '2015-03-27 21:08:39'),
(2, 2, 188, 'genius', 'genius', 'hola mundo', '89138.jpg', 'jefersonpatino444@yahoo.es', 'https://www.google.com.co/', 'calle 35', '454545', '4545', '2015-03-12 22:30:35', '2015-03-12 22:32:07'),
(3, 3, 840, 'Super Heroes', 'super-heroes', '', '', 'prueba@asd.com', 'https://www.google.com.co/', 'Calle falsa 123', '12315456', '', '2015-03-18 16:11:02', '2015-03-18 22:23:05'),
(4, 4, 0, 'Jhon doe', 'jhon-doe', '', '', '', '', '', '', '', '2015-03-19 19:49:51', '2015-03-19 19:49:51'),
(5, 5, 0, 'Jhon doe2', 'jhon-doe2', '', '', '', '', '', '', '', '2015-03-19 19:50:55', '2015-03-19 19:50:55'),
(6, 6, 0, 'Juan Topo2', 'juan-topo2', '', '', '', '', '', '', '', '2015-03-19 19:53:28', '2015-03-19 19:53:28'),
(7, 7, 0, 'Juan Topo24', 'juan-topo24', '', '', '', '', '', '', '', '2015-03-19 19:54:27', '2015-03-19 19:54:27'),
(8, 8, 0, 'Juan Topo246', 'juan-topo246', '', '', '', '', '', '', '', '2015-03-19 19:54:57', '2015-03-19 19:54:57'),
(9, 9, 0, 'Juan Topo2464', 'juan-topo2464', '', '', '', '', '', '', '', '2015-03-19 19:55:33', '2015-03-19 19:55:33'),
(10, 10, 0, 'Juan Topo24644', 'juan-topo24644', '', '', '', '', '', '', '', '2015-03-19 20:02:02', '2015-03-19 20:02:02'),
(11, 11, 578, 'Juan Topi', 'juan-topi', '', '16861.jpg', 'prueba@asd.com', 'https://www.google.com.co/', 'Calle 62 No 87c 21 Sur', '565656', '', '2015-03-19 20:03:30', '2015-03-19 22:51:52'),
(12, 12, 170, 'huawei', 'huawei', 'Hoaaaaaaa', '', 'prueba@asd.com', 'https://www.google.com.co/', 'Calle re falsa 555', '12315456', '8521', '2015-03-25 17:42:59', '2015-03-25 17:43:56'),
(13, 13, 0, 'Jhon doe asociados', 'jhon-doe-asociados', '', '', '', '', '', '', '', '2015-03-25 17:44:46', '2015-03-25 17:44:46'),
(14, 14, 276, 'apple', 'apple', 'holaaaaaa', '', 'ghghg@hgh.com', 'https://www.google.com.co/', 'jhjhjh', '78787', '767676', '2015-03-25 20:20:21', '2015-03-25 20:22:37'),
(15, 15, 170, 'janus', 'janus', 'sdsdsd', '', 'prueba@asd.com', 'https://www.google.com.co/', 'Calle falsa 123', '33434', '232323', '2015-03-30 21:41:49', '2015-03-30 22:26:04'),
(16, 16, 170, 'Aventure', 'aventure', 'dfdfdf', '', 'prueba@asd.com', 'https://www.google.com.co/', 'NA', '12315456', '454545', '2015-03-30 22:35:17', '2015-03-30 22:35:38'),
(17, 17, 0, 'dsdsd', 'dsdsd', '', '', '', '', '', '', '', '2015-03-31 17:54:21', '2015-03-31 17:54:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `groups_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `img_productos`
--

CREATE TABLE IF NOT EXISTS `img_productos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `producto_id` int(11) NOT NULL,
  `imagen` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `img_productos`
--

INSERT INTO `img_productos` (`id`, `producto_id`, `imagen`, `created_at`, `updated_at`) VALUES
(1, 1, '46204.jpg', '2015-03-27 20:08:13', '2015-03-27 20:08:13'),
(2, 3, '90662.png', '2015-03-27 20:14:19', '2015-03-27 20:14:19'),
(3, 3, '51863.png', '2015-03-27 20:14:19', '2015-03-27 20:14:19'),
(4, 3, '99121.png', '2015-03-27 20:14:19', '2015-03-27 20:14:19'),
(5, 4, '79744.jpg', '2015-03-27 20:48:15', '2015-03-27 20:48:15'),
(6, 9, '86081.png', '2015-03-30 15:42:37', '2015-03-30 15:42:37'),
(7, 9, '64957.jpg', '2015-03-30 15:42:38', '2015-03-30 15:42:38'),
(8, 9, '55541.png', '2015-03-30 15:42:38', '2015-03-30 15:42:38'),
(9, 10, '15700.jpg', '2015-03-31 17:55:49', '2015-03-31 17:55:49'),
(10, 10, '17114.jpg', '2015-03-31 17:55:49', '2015-03-31 17:55:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `importador`
--

CREATE TABLE IF NOT EXISTS `importador` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `perfil_empresa_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `pais_origen` int(11) NOT NULL,
  `pais_destino` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `info_sias`
--

CREATE TABLE IF NOT EXISTS `info_sias` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `empresa_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `intereses_importador`
--

CREATE TABLE IF NOT EXISTS `intereses_importador` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `empresa_id` int(11) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `productos` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `intereses_importador`
--

INSERT INTO `intereses_importador` (`id`, `empresa_id`, `categoria_id`, `productos`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'café, arroz, frutas', '2015-03-30 21:22:55', '2015-03-30 21:22:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `intereses_transporte`
--

CREATE TABLE IF NOT EXISTS `intereses_transporte` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `empresa_id` int(11) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `intereses_transporte`
--

INSERT INTO `intereses_transporte` (`id`, `empresa_id`, `categoria_id`, `created_at`, `updated_at`) VALUES
(1, 15, 1, '2015-03-30 22:04:22', '2015-03-30 22:04:22'),
(2, 15, 1, '2015-03-30 22:25:27', '2015-03-30 22:25:27'),
(3, 15, 1, '2015-03-30 22:26:19', '2015-03-30 22:26:19'),
(4, 15, 1, '2015-03-30 22:26:32', '2015-03-30 22:26:32'),
(5, 15, 8, '2015-03-30 22:29:22', '2015-03-30 22:29:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2012_12_06_225921_migration_cartalyst_sentry_install_users', 1),
('2012_12_06_225929_migration_cartalyst_sentry_install_groups', 1),
('2012_12_06_225945_migration_cartalyst_sentry_install_users_groups_pivot', 1),
('2012_12_06_225988_migration_cartalyst_sentry_install_throttle', 1),
('2014_12_26_141238_create_perfil_table', 2),
('2014_12_29_121542_create_rol_table', 3),
('2014_12_30_175616_add_sluggable_columns', 4),
('2014_12_30_175722_add_sluggable_columns', 5),
('2015_03_11_123823_create_categorias_table', 6),
('2015_03_11_124324_create_perfil_empresa_table', 7),
('2015_03_11_124732_create_empresas_table', 8),
('2015_03_11_164004_create_exportador_table', 9),
('2015_03_11_164405_create_importador_table', 10),
('2015_03_11_164548_create_transportador_table', 11),
('2015_03_11_164711_create_sias_table', 12),
('2015_03_11_164931_create_productos_table', 13),
('2015_03_11_165847_create_pais_table', 14),
('2015_03_24_122653_create_unidades_table', 15),
('2015_03_26_154221_crate_img_productos_table', 16),
('2015_03_30_125905_create_intereses_importador_table', 17),
('2015_03_30_140508_create_ruta_importador', 18),
('2015_03_30_163413_create_ruta_trasnporte_table', 19),
('2015_03_30_163611_create_intereses_transporte_table', 19),
('2015_03_30_174908_create_sias_categoria_interes', 20),
('2015_03_30_175152_create_sias_paises_operacion', 21),
('2015_03_30_180454_create_info_sias_table', 22);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paises`
--

CREATE TABLE IF NOT EXISTS `paises` (
  `id` smallint(3) unsigned zerofill NOT NULL,
  `iso2` char(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `iso3` char(3) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `prefijo` smallint(5) unsigned NOT NULL,
  `nombre` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `continente` varchar(16) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `subcontinente` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `iso_moneda` varchar(3) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `nombre_moneda` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `iso2` (`iso2`),
  UNIQUE KEY `iso3` (`iso3`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `paises`
--

INSERT INTO `paises` (`id`, `iso2`, `iso3`, `prefijo`, `nombre`, `continente`, `subcontinente`, `iso_moneda`, `nombre_moneda`) VALUES
(004, 'AF', 'AFG', 93, 'Afganistán', 'Asia', NULL, 'AFN', 'Afgani afgano'),
(008, 'AL', 'ALB', 355, 'Albania', 'Europa', NULL, 'ALL', 'Lek albanés'),
(010, 'AQ', 'ATA', 672, 'Antártida', 'Antártida', NULL, NULL, NULL),
(012, 'DZ', 'DZA', 213, 'Argelia', 'África', NULL, 'DZD', 'Dinar algerino'),
(016, 'AS', 'ASM', 1684, 'Samoa Americana', 'Oceanía', NULL, NULL, NULL),
(020, 'AD', 'AND', 376, 'Andorra', 'Europa', NULL, 'EUR', 'Euro'),
(024, 'AO', 'AGO', 244, 'Angola', 'África', NULL, 'AOA', 'Kwanza angoleño'),
(028, 'AG', 'ATG', 1268, 'Antigua y Barbuda', 'América', 'El Caribe', NULL, NULL),
(031, 'AZ', 'AZE', 994, 'Azerbaiyán', 'Asia', NULL, 'AZM', 'Manat azerbaiyano'),
(032, 'AR', 'ARG', 54, 'Argentina', 'América', 'América del Sur', 'ARS', 'Peso argentino'),
(036, 'AU', 'AUS', 61, 'Australia', 'Oceanía', NULL, 'AUD', 'Dólar australiano'),
(040, 'AT', 'AUT', 43, 'Austria', 'Europa', NULL, 'EUR', 'Euro'),
(044, 'BS', 'BHS', 1242, 'Bahamas', 'América', 'El Caribe', 'BSD', 'Dólar bahameño'),
(048, 'BH', 'BHR', 973, 'Bahréin', 'Asia', NULL, 'BHD', 'Dinar bahreiní'),
(050, 'BD', 'BGD', 880, 'Bangladesh', 'Asia', NULL, 'BDT', 'Taka de Bangladesh'),
(051, 'AM', 'ARM', 374, 'Armenia', 'Asia', NULL, 'AMD', 'Dram armenio'),
(052, 'BB', 'BRB', 1246, 'Barbados', 'América', 'El Caribe', 'BBD', 'Dólar de Barbados'),
(056, 'BE', 'BEL', 32, 'Bélgica', 'Europa', NULL, 'EUR', 'Euro'),
(060, 'BM', 'BMU', 1441, 'Bermudas', 'América', 'El Caribe', 'BMD', 'Dólar de Bermuda'),
(064, 'BT', 'BTN', 975, 'Bhután', 'Asia', NULL, 'BTN', 'Ngultrum de Bután'),
(068, 'BO', 'BOL', 591, 'Bolivia', 'América', 'América del Sur', 'BOB', 'Boliviano'),
(070, 'BA', 'BIH', 387, 'Bosnia y Herzegovina', 'Europa', NULL, 'BAM', 'Marco convertible de Bosnia-Herzegovina'),
(072, 'BW', 'BWA', 267, 'Botsuana', 'África', NULL, 'BWP', 'Pula de Botsuana'),
(074, 'BV', 'BVT', 0, 'Isla Bouvet', NULL, NULL, NULL, NULL),
(076, 'BR', 'BRA', 55, 'Brasil', 'América', 'América del Sur', 'BRL', 'Real brasileño'),
(084, 'BZ', 'BLZ', 501, 'Belice', 'América', 'América Central', 'BZD', 'Dólar de Belice'),
(086, 'IO', 'IOT', 0, 'Territorio Británico del Océano Índico', NULL, NULL, NULL, NULL),
(090, 'SB', 'SLB', 677, 'Islas Salomón', 'Oceanía', NULL, 'SBD', 'Dólar de las Islas Salomón'),
(092, 'VG', 'VGB', 1284, 'Islas Vírgenes Británicas', 'América', 'El Caribe', NULL, NULL),
(096, 'BN', 'BRN', 673, 'Brunéi', 'Asia', NULL, 'BND', 'Dólar de Brunéi'),
(100, 'BG', 'BGR', 359, 'Bulgaria', 'Europa', NULL, 'BGN', 'Lev búlgaro'),
(104, 'MM', 'MMR', 95, 'Myanmar', 'Asia', NULL, 'MMK', 'Kyat birmano'),
(108, 'BI', 'BDI', 257, 'Burundi', 'África', NULL, 'BIF', 'Franco burundés'),
(112, 'BY', 'BLR', 375, 'Bielorrusia', 'Europa', NULL, 'BYR', 'Rublo bielorruso'),
(116, 'KH', 'KHM', 855, 'Camboya', 'Asia', NULL, 'KHR', 'Riel camboyano'),
(120, 'CM', 'CMR', 237, 'Camerún', 'África', NULL, NULL, NULL),
(124, 'CA', 'CAN', 1, 'Canadá', 'América', 'América del Norte', 'CAD', 'Dólar canadiense'),
(132, 'CV', 'CPV', 238, 'Cabo Verde', 'África', NULL, 'CVE', 'Escudo caboverdiano'),
(136, 'KY', 'CYM', 1345, 'Islas Caimán', 'América', 'El Caribe', 'KYD', 'Dólar caimano (de Islas Caimán)'),
(140, 'CF', 'CAF', 236, 'República Centroafricana', 'África', NULL, NULL, NULL),
(144, 'LK', 'LKA', 94, 'Sri Lanka', 'Asia', NULL, 'LKR', 'Rupia de Sri Lanka'),
(148, 'TD', 'TCD', 235, 'Chad', 'África', NULL, NULL, NULL),
(152, 'CL', 'CHL', 56, 'Chile', 'América', 'América del Sur', 'CLP', 'Peso chileno'),
(156, 'CN', 'CHN', 86, 'China', 'Asia', NULL, 'CNY', 'Yuan Renminbi de China'),
(158, 'TW', 'TWN', 886, 'Taiwán', 'Asia', NULL, 'TWD', 'Dólar taiwanés'),
(162, 'CX', 'CXR', 61, 'Isla de Navidad', 'Oceanía', NULL, NULL, NULL),
(166, 'CC', 'CCK', 61, 'Islas Cocos', 'Óceanía', NULL, NULL, NULL),
(170, 'CO', 'COL', 57, 'Colombia', 'América', 'América del Sur', 'COP', 'Peso colombiano'),
(174, 'KM', 'COM', 269, 'Comoras', 'África', NULL, 'KMF', 'Franco comoriano (de Comoras)'),
(175, 'YT', 'MYT', 262, 'Mayotte', 'África', NULL, NULL, NULL),
(178, 'CG', 'COG', 242, 'Congo', 'África', NULL, NULL, NULL),
(180, 'CD', 'COD', 243, 'República Democrática del Congo', 'África', NULL, 'CDF', 'Franco congoleño'),
(184, 'CK', 'COK', 682, 'Islas Cook', 'Oceanía', NULL, NULL, NULL),
(188, 'CR', 'CRI', 506, 'Costa Rica', 'América', 'América Central', 'CRC', 'Colón costarricense'),
(191, 'HR', 'HRV', 385, 'Croacia', 'Europa', NULL, 'HRK', 'Kuna croata'),
(192, 'CU', 'CUB', 53, 'Cuba', 'América', 'El Caribe', 'CUP', 'Peso cubano'),
(196, 'CY', 'CYP', 357, 'Chipre', 'Europa', NULL, 'CYP', 'Libra chipriota'),
(203, 'CZ', 'CZE', 420, 'República Checa', 'Europa', NULL, 'CZK', 'Koruna checa'),
(204, 'BJ', 'BEN', 229, 'Benín', 'África', NULL, NULL, NULL),
(208, 'DK', 'DNK', 45, 'Dinamarca', 'Europa', NULL, 'DKK', 'Corona danesa'),
(212, 'DM', 'DMA', 1767, 'Dominica', 'América', 'El Caribe', NULL, NULL),
(214, 'DO', 'DOM', 1809, 'República Dominicana', 'América', 'El Caribe', 'DOP', 'Peso dominicano'),
(218, 'EC', 'ECU', 593, 'Ecuador', 'América', 'América del Sur', NULL, NULL),
(222, 'SV', 'SLV', 503, 'El Salvador', 'América', 'América Central', 'SVC', 'Colón salvadoreño'),
(226, 'GQ', 'GNQ', 240, 'Guinea Ecuatorial', 'África', NULL, NULL, NULL),
(231, 'ET', 'ETH', 251, 'Etiopía', 'África', NULL, 'ETB', 'Birr etíope'),
(232, 'ER', 'ERI', 291, 'Eritrea', 'África', NULL, 'ERN', 'Nakfa eritreo'),
(233, 'EE', 'EST', 372, 'Estonia', 'Europa', NULL, 'EEK', 'Corona estonia'),
(234, 'FO', 'FRO', 298, 'Islas Feroe', 'Europa', NULL, NULL, NULL),
(238, 'FK', 'FLK', 500, 'Islas Malvinas', 'América', 'América del Sur', 'FKP', 'Libra malvinense'),
(239, 'GS', 'SGS', 0, 'Islas Georgias del Sur y Sandwich del Sur', 'América', 'América del Sur', NULL, NULL),
(242, 'FJ', 'FJI', 679, 'Fiyi', 'Oceanía', NULL, 'FJD', 'Dólar fijiano'),
(246, 'FI', 'FIN', 358, 'Finlandia', 'Europa', NULL, 'EUR', 'Euro'),
(248, 'AX', 'ALA', 0, 'Islas Gland', 'Europa', NULL, NULL, NULL),
(250, 'FR', 'FRA', 33, 'Francia', 'Europa', NULL, 'EUR', 'Euro'),
(254, 'GF', 'GUF', 0, 'Guayana Francesa', 'América', 'América del Sur', NULL, NULL),
(258, 'PF', 'PYF', 689, 'Polinesia Francesa', 'Oceanía', NULL, NULL, NULL),
(260, 'TF', 'ATF', 0, 'Territorios Australes Franceses', NULL, NULL, NULL, NULL),
(262, 'DJ', 'DJI', 253, 'Yibuti', 'África', NULL, 'DJF', 'Franco yibutiano'),
(266, 'GA', 'GAB', 241, 'Gabón', 'África', NULL, NULL, NULL),
(268, 'GE', 'GEO', 995, 'Georgia', 'Europa', NULL, 'GEL', 'Lari georgiano'),
(270, 'GM', 'GMB', 220, 'Gambia', 'África', NULL, 'GMD', 'Dalasi gambiano'),
(275, 'PS', 'PSE', 0, 'Palestina', 'Asia', NULL, NULL, NULL),
(276, 'DE', 'DEU', 49, 'Alemania', 'Europa', NULL, 'EUR', 'Euro'),
(288, 'GH', 'GHA', 233, 'Ghana', 'África', NULL, 'GHC', 'Cedi ghanés'),
(292, 'GI', 'GIB', 350, 'Gibraltar', 'Europa', NULL, 'GIP', 'Libra de Gibraltar'),
(296, 'KI', 'KIR', 686, 'Kiribati', 'Oceanía', NULL, NULL, NULL),
(300, 'GR', 'GRC', 30, 'Grecia', 'Europa', NULL, 'EUR', 'Euro'),
(304, 'GL', 'GRL', 299, 'Groenlandia', 'América', 'América del Norte', NULL, NULL),
(308, 'GD', 'GRD', 1473, 'Granada', 'América', 'El Caribe', NULL, NULL),
(312, 'GP', 'GLP', 0, 'Guadalupe', 'América', 'El Caribe', NULL, NULL),
(316, 'GU', 'GUM', 1671, 'Guam', 'Oceanía', NULL, NULL, NULL),
(320, 'GT', 'GTM', 502, 'Guatemala', 'América', 'América Central', 'GTQ', 'Quetzal guatemalteco'),
(324, 'GN', 'GIN', 224, 'Guinea', 'África', NULL, 'GNF', 'Franco guineano'),
(328, 'GY', 'GUY', 592, 'Guyana', 'América', 'América del Sur', 'GYD', 'Dólar guyanés'),
(332, 'HT', 'HTI', 509, 'Haití', 'América', 'El Caribe', 'HTG', 'Gourde haitiano'),
(334, 'HM', 'HMD', 0, 'Islas Heard y McDonald', 'Oceanía', NULL, NULL, NULL),
(336, 'VA', 'VAT', 39, 'Ciudad del Vaticano', 'Europa', NULL, NULL, NULL),
(340, 'HN', 'HND', 504, 'Honduras', 'América', 'América Central', 'HNL', 'Lempira hondureño'),
(344, 'HK', 'HKG', 852, 'Hong Kong', 'Asia', NULL, 'HKD', 'Dólar de Hong Kong'),
(348, 'HU', 'HUN', 36, 'Hungría', 'Europa', NULL, 'HUF', 'Forint húngaro'),
(352, 'IS', 'ISL', 354, 'Islandia', 'Europa', NULL, 'ISK', 'Króna islandesa'),
(356, 'IN', 'IND', 91, 'India', 'Asia', NULL, 'INR', 'Rupia india'),
(360, 'ID', 'IDN', 62, 'Indonesia', 'Asia', NULL, 'IDR', 'Rupiah indonesia'),
(364, 'IR', 'IRN', 98, 'Irán', 'Asia', NULL, 'IRR', 'Rial iraní'),
(368, 'IQ', 'IRQ', 964, 'Iraq', 'Asia', NULL, 'IQD', 'Dinar iraquí'),
(372, 'IE', 'IRL', 353, 'Irlanda', 'Europa', NULL, 'EUR', 'Euro'),
(376, 'IL', 'ISR', 972, 'Israel', 'Asia', NULL, 'ILS', 'Nuevo shéquel israelí'),
(380, 'IT', 'ITA', 39, 'Italia', 'Europa', NULL, 'EUR', 'Euro'),
(384, 'CI', 'CIV', 225, 'Costa de Marfil', 'África', NULL, NULL, NULL),
(388, 'JM', 'JAM', 1876, 'Jamaica', 'América', 'El Caribe', 'JMD', 'Dólar jamaicano'),
(392, 'JP', 'JPN', 81, 'Japón', 'Asia', NULL, 'JPY', 'Yen japonés'),
(398, 'KZ', 'KAZ', 7, 'Kazajstán', 'Asia', NULL, 'KZT', 'Tenge kazajo'),
(400, 'JO', 'JOR', 962, 'Jordania', 'Asia', NULL, 'JOD', 'Dinar jordano'),
(404, 'KE', 'KEN', 254, 'Kenia', 'África', NULL, 'KES', 'Chelín keniata'),
(408, 'KP', 'PRK', 850, 'Corea del Norte', 'Asia', NULL, 'KPW', 'Won norcoreano'),
(410, 'KR', 'KOR', 82, 'Corea del Sur', 'Asia', NULL, 'KRW', 'Won surcoreano'),
(414, 'KW', 'KWT', 965, 'Kuwait', 'Asia', NULL, 'KWD', 'Dinar kuwaití'),
(417, 'KG', 'KGZ', 996, 'Kirguistán', 'Asia', NULL, 'KGS', 'Som kirguís (de Kirguistán)'),
(418, 'LA', 'LAO', 856, 'Laos', 'Asia', NULL, 'LAK', 'Kip lao'),
(422, 'LB', 'LBN', 961, 'Líbano', 'Asia', NULL, 'LBP', 'Libra libanesa'),
(426, 'LS', 'LSO', 266, 'Lesotho', 'África', NULL, 'LSL', 'Loti lesotense'),
(428, 'LV', 'LVA', 371, 'Letonia', 'Europa', NULL, 'LVL', 'Lat letón'),
(430, 'LR', 'LBR', 231, 'Liberia', 'África', NULL, 'LRD', 'Dólar liberiano'),
(434, 'LY', 'LBY', 218, 'Libia', 'África', NULL, 'LYD', 'Dinar libio'),
(438, 'LI', 'LIE', 423, 'Liechtenstein', 'Europa', NULL, NULL, NULL),
(440, 'LT', 'LTU', 370, 'Lituania', 'Europa', NULL, 'LTL', 'Litas lituano'),
(442, 'LU', 'LUX', 352, 'Luxemburgo', 'Europa', NULL, 'EUR', 'Euro'),
(446, 'MO', 'MAC', 853, 'Macao', 'Asia', NULL, 'MOP', 'Pataca de Macao'),
(450, 'MG', 'MDG', 261, 'Madagascar', 'África', NULL, 'MGA', 'Ariary malgache'),
(454, 'MW', 'MWI', 265, 'Malaui', 'África', NULL, 'MWK', 'Kwacha malauiano'),
(458, 'MY', 'MYS', 60, 'Malasia', 'Asia', NULL, 'MYR', 'Ringgit malayo'),
(462, 'MV', 'MDV', 960, 'Maldivas', 'Asia', NULL, 'MVR', 'Rufiyaa maldiva'),
(466, 'ML', 'MLI', 223, 'Malí', 'África', NULL, NULL, NULL),
(470, 'MT', 'MLT', 356, 'Malta', 'Europa', NULL, 'MTL', 'Lira maltesa'),
(474, 'MQ', 'MTQ', 0, 'Martinica', 'América', 'El Caribe', NULL, NULL),
(478, 'MR', 'MRT', 222, 'Mauritania', 'África', NULL, 'MRO', 'Ouguiya mauritana'),
(480, 'MU', 'MUS', 230, 'Mauricio', 'África', NULL, 'MUR', 'Rupia mauricia'),
(484, 'MX', 'MEX', 52, 'México', 'América', 'América del Norte', 'MXN', 'Peso mexicano'),
(492, 'MC', 'MCO', 377, 'Mónaco', 'Europa', NULL, NULL, NULL),
(496, 'MN', 'MNG', 976, 'Mongolia', 'Asia', NULL, 'MNT', 'Tughrik mongol'),
(498, 'MD', 'MDA', 373, 'Moldavia', 'Europa', NULL, 'MDL', 'Leu moldavo'),
(499, 'ME', 'MNE', 382, 'Montenegro', 'Europa', NULL, NULL, NULL),
(500, 'MS', 'MSR', 1664, 'Montserrat', 'América', 'El Caribe', NULL, NULL),
(504, 'MA', 'MAR', 212, 'Marruecos', 'África', NULL, 'MAD', 'Dirham marroquí'),
(508, 'MZ', 'MOZ', 258, 'Mozambique', 'África', NULL, 'MZM', 'Metical mozambiqueño'),
(512, 'OM', 'OMN', 968, 'Omán', 'Asia', NULL, 'OMR', 'Rial omaní'),
(516, 'NA', 'NAM', 264, 'Namibia', 'África', NULL, 'NAD', 'Dólar namibio'),
(520, 'NR', 'NRU', 674, 'Nauru', 'Oceanía', NULL, NULL, NULL),
(524, 'NP', 'NPL', 977, 'Nepal', 'Asia', NULL, 'NPR', 'Rupia nepalesa'),
(528, 'NL', 'NLD', 31, 'Países Bajos', 'Europa', NULL, 'EUR', 'Euro'),
(530, 'AN', 'ANT', 599, 'Antillas Holandesas', 'América', 'El Caribe', 'ANG', 'Florín antillano neerlandés'),
(533, 'AW', 'ABW', 297, 'Aruba', 'América', 'El Caribe', 'AWG', 'Florín arubeño'),
(540, 'NC', 'NCL', 687, 'Nueva Caledonia', 'Oceanía', NULL, NULL, NULL),
(548, 'VU', 'VUT', 678, 'Vanuatu', 'Oceanía', NULL, 'VUV', 'Vatu vanuatense'),
(554, 'NZ', 'NZL', 64, 'Nueva Zelanda', 'Oceanía', NULL, 'NZD', 'Dólar neozelandés'),
(558, 'NI', 'NIC', 505, 'Nicaragua', 'América', 'América Central', 'NIO', 'Córdoba nicaragüense'),
(562, 'NE', 'NER', 227, 'Níger', 'África', NULL, NULL, NULL),
(566, 'NG', 'NGA', 234, 'Nigeria', 'África', NULL, 'NGN', 'Naira nigeriana'),
(570, 'NU', 'NIU', 683, 'Niue', 'Oceanía', NULL, NULL, NULL),
(574, 'NF', 'NFK', 0, 'Isla Norfolk', 'Oceanía', NULL, NULL, NULL),
(578, 'NO', 'NOR', 47, 'Noruega', 'Europa', NULL, 'NOK', 'Corona noruega'),
(580, 'MP', 'MNP', 1670, 'Islas Marianas del Norte', 'Oceanía', NULL, NULL, NULL),
(581, 'UM', 'UMI', 0, 'Islas Ultramarinas de Estados Unidos', NULL, NULL, NULL, NULL),
(583, 'FM', 'FSM', 691, 'Micronesia', 'Oceanía', NULL, NULL, NULL),
(584, 'MH', 'MHL', 692, 'Islas Marshall', 'Oceanía', NULL, NULL, NULL),
(585, 'PW', 'PLW', 680, 'Palaos', 'Oceanía', NULL, NULL, NULL),
(586, 'PK', 'PAK', 92, 'Pakistán', 'Asia', NULL, 'PKR', 'Rupia pakistaní'),
(591, 'PA', 'PAN', 507, 'Panamá', 'América', 'América Central', 'PAB', 'Balboa panameña'),
(598, 'PG', 'PNG', 675, 'Papúa Nueva Guinea', 'Oceanía', NULL, 'PGK', 'Kina de Papúa Nueva Guinea'),
(600, 'PY', 'PRY', 595, 'Paraguay', 'América', 'América del Sur', 'PYG', 'Guaraní paraguayo'),
(604, 'PE', 'PER', 51, 'Perú', 'América', 'América del Sur', 'PEN', 'Nuevo sol peruano'),
(608, 'PH', 'PHL', 63, 'Filipinas', 'Asia', NULL, 'PHP', 'Peso filipino'),
(612, 'PN', 'PCN', 870, 'Islas Pitcairn', 'Oceanía', NULL, NULL, NULL),
(616, 'PL', 'POL', 48, 'Polonia', 'Europa', NULL, 'PLN', 'zloty polaco'),
(620, 'PT', 'PRT', 351, 'Portugal', 'Europa', NULL, 'EUR', 'Euro'),
(624, 'GW', 'GNB', 245, 'Guinea-Bissau', 'África', NULL, NULL, NULL),
(626, 'TL', 'TLS', 670, 'Timor Oriental', 'Asia', NULL, NULL, NULL),
(630, 'PR', 'PRI', 1, 'Puerto Rico', 'América', 'El Caribe', NULL, NULL),
(634, 'QA', 'QAT', 974, 'Qatar', 'Asia', NULL, 'QAR', 'Rial qatarí'),
(638, 'RE', 'REU', 262, 'Reunión', 'África', NULL, NULL, NULL),
(642, 'RO', 'ROU', 40, 'Rumania', 'Europa', NULL, 'RON', 'Leu rumano'),
(643, 'RU', 'RUS', 7, 'Rusia', 'Asia', NULL, 'RUB', 'Rublo ruso'),
(646, 'RW', 'RWA', 250, 'Ruanda', 'África', NULL, 'RWF', 'Franco ruandés'),
(654, 'SH', 'SHN', 290, 'Santa Helena', 'África', NULL, 'SHP', 'Libra de Santa Helena'),
(659, 'KN', 'KNA', 1869, 'San Cristóbal y Nieves', 'América', 'El Caribe', NULL, NULL),
(660, 'AI', 'AIA', 1264, 'Anguila', 'América', 'El Caribe', NULL, NULL),
(662, 'LC', 'LCA', 1758, 'Santa Lucía', 'América', 'El Caribe', NULL, NULL),
(666, 'PM', 'SPM', 508, 'San Pedro y Miquelón', 'América', 'América del Norte', NULL, NULL),
(670, 'VC', 'VCT', 1784, 'San Vicente y las Granadinas', 'América', 'El Caribe', NULL, NULL),
(674, 'SM', 'SMR', 378, 'San Marino', 'Europa', NULL, NULL, NULL),
(678, 'ST', 'STP', 239, 'Santo Tomé y Príncipe', 'África', NULL, 'STD', 'Dobra de Santo Tomé y Príncipe'),
(682, 'SA', 'SAU', 966, 'Arabia Saudí', 'Asia', NULL, 'SAR', 'Riyal saudí'),
(686, 'SN', 'SEN', 221, 'Senegal', 'África', NULL, NULL, NULL),
(688, 'RS', 'SRB', 381, 'Serbia', 'Europa', NULL, NULL, NULL),
(690, 'SC', 'SYC', 248, 'Seychelles', 'África', NULL, 'SCR', 'Rupia de Seychelles'),
(694, 'SL', 'SLE', 232, 'Sierra Leona', 'África', NULL, 'SLL', 'Leone de Sierra Leona'),
(702, 'SG', 'SGP', 65, 'Singapur', 'Asia', NULL, 'SGD', 'Dólar de Singapur'),
(703, 'SK', 'SVK', 421, 'Eslovaquia', 'Europa', NULL, 'SKK', 'Corona eslovaca'),
(704, 'VN', 'VNM', 84, 'Vietnam', 'Asia', NULL, 'VND', 'Dong vietnamita'),
(705, 'SI', 'SVN', 386, 'Eslovenia', 'Europa', NULL, NULL, NULL),
(706, 'SO', 'SOM', 252, 'Somalia', 'África', NULL, 'SOS', 'Chelín somalí'),
(710, 'ZA', 'ZAF', 27, 'Sudáfrica', 'África', NULL, 'ZAR', 'Rand sudafricano'),
(716, 'ZW', 'ZWE', 263, 'Zimbabue', 'África', NULL, 'ZWL', 'Dólar zimbabuense'),
(724, 'ES', 'ESP', 34, 'España', 'Europa', NULL, 'EUR', 'Euro'),
(732, 'EH', 'ESH', 0, 'Sahara Occidental', 'África', NULL, NULL, NULL),
(736, 'SD', 'SDN', 249, 'Sudán', 'África', NULL, 'SDD', 'Dinar sudanés'),
(740, 'SR', 'SUR', 597, 'Surinam', 'América', 'América del Sur', 'SRD', 'Dólar surinamés'),
(744, 'SJ', 'SJM', 0, 'Svalbard y Jan Mayen', 'Europa', NULL, NULL, NULL),
(748, 'SZ', 'SWZ', 268, 'Suazilandia', 'África', NULL, 'SZL', 'Lilangeni suazi'),
(752, 'SE', 'SWE', 46, 'Suecia', 'Europa', NULL, 'SEK', 'Corona sueca'),
(756, 'CH', 'CHE', 41, 'Suiza', 'Europa', NULL, 'CHF', 'Franco suizo'),
(760, 'SY', 'SYR', 963, 'Siria', 'Asia', NULL, 'SYP', 'Libra siria'),
(762, 'TJ', 'TJK', 992, 'Tayikistán', 'Asia', NULL, 'TJS', 'Somoni tayik (de Tayikistán)'),
(764, 'TH', 'THA', 66, 'Tailandia', 'Asia', NULL, 'THB', 'Baht tailandés'),
(768, 'TG', 'TGO', 228, 'Togo', 'África', NULL, NULL, NULL),
(772, 'TK', 'TKL', 690, 'Tokelau', 'Oceanía', NULL, NULL, NULL),
(776, 'TO', 'TON', 676, 'Tonga', 'Oceanía', NULL, 'TOP', 'Pa''anga tongano'),
(780, 'TT', 'TTO', 1868, 'Trinidad y Tobago', 'América', 'El Caribe', 'TTD', 'Dólar de Trinidad y Tobago'),
(784, 'AE', 'ARE', 971, 'Emiratos Árabes Unidos', 'Asia', NULL, 'AED', 'Dirham de los Emiratos Árabes Unidos'),
(788, 'TN', 'TUN', 216, 'Túnez', 'África', NULL, 'TND', 'Dinar tunecino'),
(792, 'TR', 'TUR', 90, 'Turquía', 'Asia', NULL, 'TRY', 'Lira turca'),
(795, 'TM', 'TKM', 993, 'Turkmenistán', 'Asia', NULL, 'TMM', 'Manat turcomano'),
(796, 'TC', 'TCA', 1649, 'Islas Turcas y Caicos', 'América', 'El Caribe', NULL, NULL),
(798, 'TV', 'TUV', 688, 'Tuvalu', 'Oceanía', NULL, NULL, NULL),
(800, 'UG', 'UGA', 256, 'Uganda', 'África', NULL, 'UGX', 'Chelín ugandés'),
(804, 'UA', 'UKR', 380, 'Ucrania', 'Europa', NULL, 'UAH', 'Grivna ucraniana'),
(807, 'MK', 'MKD', 389, 'Macedonia', 'Europa', NULL, 'MKD', 'Denar macedonio'),
(818, 'EG', 'EGY', 20, 'Egipto', 'África', NULL, 'EGP', 'Libra egipcia'),
(826, 'GB', 'GBR', 44, 'Reino Unido', 'Europa', NULL, 'GBP', 'Libra esterlina (libra de Gran Bretaña)'),
(834, 'TZ', 'TZA', 255, 'Tanzania', 'África', NULL, 'TZS', 'Chelín tanzano'),
(840, 'US', 'USA', 1, 'Estados Unidos', 'América', 'América del Norte', 'USD', 'Dólar estadounidense'),
(850, 'VI', 'VIR', 1340, 'Islas Vírgenes de los Estados Unidos', 'América', 'El Caribe', NULL, NULL),
(854, 'BF', 'BFA', 226, 'Burkina Faso', 'África', NULL, NULL, NULL),
(858, 'UY', 'URY', 598, 'Uruguay', 'América', 'América del Sur', 'UYU', 'Peso uruguayo'),
(860, 'UZ', 'UZB', 998, 'Uzbekistán', 'Asia', NULL, 'UZS', 'Som uzbeko'),
(862, 'VE', 'VEN', 58, 'Venezuela', 'América', 'América del Sur', 'VEB', 'Bolívar venezolano'),
(876, 'WF', 'WLF', 681, 'Wallis y Futuna', 'Oceanía', NULL, NULL, NULL),
(882, 'WS', 'WSM', 685, 'Samoa', 'Oceanía', NULL, 'WST', 'Tala samoana'),
(887, 'YE', 'YEM', 967, 'Yemen', 'Asia', NULL, 'YER', 'Rial yemení (de Yemen)'),
(894, 'ZM', 'ZMB', 260, 'Zambia', 'África', NULL, 'ZMK', 'Kwacha zambiano');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE IF NOT EXISTS `perfil` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rol` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `imagen` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`id`, `rol`, `imagen`, `created_at`, `updated_at`) VALUES
(1, 'Exportador', 'icon_exportar.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Importador', 'icon_importar.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Transportador', 'icon_transportar.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'SIA', 'icon_sias.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil_empresa`
--

CREATE TABLE IF NOT EXISTS `perfil_empresa` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `empresa_id` int(11) NOT NULL,
  `perfil_id` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `perfil_empresa`
--

INSERT INTO `perfil_empresa` (`id`, `empresa_id`, `perfil_id`, `estado`, `created_at`, `updated_at`) VALUES
(1, 10, 2, 1, '2015-03-19 20:02:02', '2015-03-19 20:02:02'),
(2, 11, 2, 1, '2015-03-19 20:03:30', '2015-03-19 20:03:30'),
(3, 1, 1, 1, '2015-03-19 20:03:30', '2015-04-01 22:56:18'),
(4, 12, 1, 1, '2015-03-25 17:42:59', '2015-03-25 17:42:59'),
(5, 13, 3, 1, '2015-03-25 17:44:46', '2015-03-25 17:44:46'),
(6, 14, 1, 1, '2015-03-25 20:20:21', '2015-03-25 20:46:21'),
(7, 15, 3, 1, '2015-03-30 21:41:49', '2015-03-30 21:41:49'),
(8, 16, 4, 1, '2015-03-30 22:35:17', '2015-03-30 22:35:17'),
(9, 17, 1, 1, '2015-03-31 17:54:22', '2015-03-31 17:54:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `categoria_id` int(11) NOT NULL,
  `empresa_id` int(11) NOT NULL,
  `codigo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `produccion_mes` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `venta_minima` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `stock` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `unidad_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `categoria_id`, `empresa_id`, `codigo`, `nombre`, `slug`, `descripcion`, `produccion_mes`, `venta_minima`, `stock`, `unidad_id`, `created_at`, `updated_at`) VALUES
(6, 1, 1, '454545', 'Arduino', 'arduino', 'fgfgfg', '32323', '323', '12', 4, '2015-03-30 14:38:40', '2015-03-30 14:38:40'),
(7, 1, 1, '4545', 'repuestos para maquinas', 'repuestos-para-maquinas', 'eeeer', '32323', '23', '23', 6, '2015-03-30 14:39:08', '2015-03-30 14:39:08'),
(9, 1, 1, '3434', 'Nuevo Carro', 'nuevo-carro', 'erererer dfer ererer ererer', '3434', '323', '23', 6, '2015-03-30 15:42:37', '2015-03-30 15:42:37'),
(10, 1, 17, '54545', 'erer', 'erer', 'dererer', '43434', '3434', '434', 4, '2015-03-31 17:55:48', '2015-03-31 17:55:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ruta_exportador`
--

CREATE TABLE IF NOT EXISTS `ruta_exportador` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `perfil_empresa_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `pais_origen` int(11) NOT NULL,
  `pais_destino` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=17 ;

--
-- Volcado de datos para la tabla `ruta_exportador`
--

INSERT INTO `ruta_exportador` (`id`, `perfil_empresa_id`, `producto_id`, `pais_origen`, `pais_destino`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 826, 8, '2015-03-27 20:08:13', '2015-03-27 20:08:13'),
(2, 3, 1, 826, 276, '2015-03-27 20:08:13', '2015-03-27 20:08:13'),
(3, 3, 2, 826, 4, '2015-03-27 20:11:15', '2015-03-27 20:11:15'),
(4, 3, 3, 826, 4, '2015-03-27 20:14:18', '2015-03-27 20:14:18'),
(5, 3, 3, 826, 8, '2015-03-27 20:14:18', '2015-03-27 20:14:18'),
(6, 3, 4, 826, 8, '2015-03-27 20:48:14', '2015-03-27 20:48:14'),
(7, 3, 5, 826, 4, '2015-03-27 21:09:18', '2015-03-27 21:09:18'),
(8, 3, 6, 826, 4, '2015-03-30 14:38:40', '2015-03-30 14:38:40'),
(9, 3, 7, 826, 8, '2015-03-30 14:39:08', '2015-03-30 14:39:08'),
(10, 3, 8, 826, 4, '2015-03-30 14:47:52', '2015-03-30 14:47:52'),
(11, 3, 9, 826, 276, '2015-03-30 15:42:37', '2015-03-30 15:42:37'),
(12, 9, 10, 40, 8, '2015-03-31 17:55:48', '2015-03-31 17:55:48'),
(13, 9, 10, 40, 276, '2015-03-31 17:55:48', '2015-03-31 17:55:48'),
(14, 9, 10, 40, 20, '2015-03-31 17:55:48', '2015-03-31 17:55:48'),
(15, 9, 10, 40, 24, '2015-03-31 17:55:48', '2015-03-31 17:55:48'),
(16, 9, 10, 40, 660, '2015-03-31 17:55:48', '2015-03-31 17:55:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ruta_importador`
--

CREATE TABLE IF NOT EXISTS `ruta_importador` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `intereses_importador_id` int(11) NOT NULL,
  `pais_destino` int(11) NOT NULL,
  `pais_origen` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `ruta_importador`
--

INSERT INTO `ruta_importador` (`id`, `intereses_importador_id`, `pais_destino`, `pais_origen`, `created_at`, `updated_at`) VALUES
(1, 1, 826, 76, '2015-03-30 21:22:55', '2015-03-30 21:22:55'),
(2, 1, 826, 170, '2015-03-30 21:22:55', '2015-03-30 21:22:55'),
(3, 1, 826, 218, '2015-03-30 21:22:55', '2015-03-30 21:22:55'),
(4, 1, 826, 604, '2015-03-30 21:22:56', '2015-03-30 21:22:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ruta_transporte`
--

CREATE TABLE IF NOT EXISTS `ruta_transporte` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `intereses_transporte_id` int(11) NOT NULL,
  `pais_destino` int(11) NOT NULL,
  `pais_origen` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `ruta_transporte`
--

INSERT INTO `ruta_transporte` (`id`, `intereses_transporte_id`, `pais_destino`, `pais_origen`, `created_at`, `updated_at`) VALUES
(1, 1, 8, 276, '2015-03-30 22:04:22', '2015-03-30 22:04:22'),
(2, 1, 276, 276, '2015-03-30 22:04:22', '2015-03-30 22:04:22'),
(3, 2, 4, 276, '2015-03-30 22:25:27', '2015-03-30 22:25:27'),
(4, 2, 8, 276, '2015-03-30 22:25:27', '2015-03-30 22:25:27'),
(5, 2, 276, 276, '2015-03-30 22:25:27', '2015-03-30 22:25:27'),
(6, 2, 20, 276, '2015-03-30 22:25:27', '2015-03-30 22:25:27'),
(7, 2, 28, 276, '2015-03-30 22:25:27', '2015-03-30 22:25:27'),
(8, 2, 530, 276, '2015-03-30 22:25:27', '2015-03-30 22:25:27'),
(9, 3, 4, 170, '2015-03-30 22:26:19', '2015-03-30 22:26:19'),
(10, 4, 12, 170, '2015-03-30 22:26:32', '2015-03-30 22:26:32'),
(11, 5, 4, 170, '2015-03-30 22:29:22', '2015-03-30 22:29:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sias`
--

CREATE TABLE IF NOT EXISTS `sias` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `perfil_empresa_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `pais` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sias_categoria_interes`
--

CREATE TABLE IF NOT EXISTS `sias_categoria_interes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `empresa_id` int(11) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `sias_categoria_interes`
--

INSERT INTO `sias_categoria_interes` (`id`, `empresa_id`, `categoria_id`, `created_at`, `updated_at`) VALUES
(1, 16, 1, '2015-03-30 23:11:48', '2015-03-30 23:11:48'),
(2, 16, 2, '2015-03-30 23:11:48', '2015-03-30 23:11:48'),
(3, 16, 2, '2015-03-30 23:19:45', '2015-03-30 23:19:45'),
(4, 16, 2, '2015-03-30 23:20:45', '2015-03-30 23:20:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sias_paises_operacion`
--

CREATE TABLE IF NOT EXISTS `sias_paises_operacion` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `empresa_id` int(11) NOT NULL,
  `pais_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `sias_paises_operacion`
--

INSERT INTO `sias_paises_operacion` (`id`, `empresa_id`, `pais_id`, `created_at`, `updated_at`) VALUES
(1, 16, 4, '2015-03-30 23:20:45', '2015-03-30 23:20:45'),
(2, 16, 8, '2015-03-30 23:20:45', '2015-03-30 23:20:45'),
(3, 16, 276, '2015-03-30 23:20:45', '2015-03-30 23:20:45'),
(4, 16, 51, '2015-03-30 23:20:45', '2015-03-30 23:20:45'),
(5, 16, 533, '2015-03-30 23:20:45', '2015-03-30 23:20:45'),
(6, 16, 36, '2015-03-30 23:20:45', '2015-03-30 23:20:45'),
(7, 16, 52, '2015-03-30 23:20:45', '2015-03-30 23:20:45'),
(8, 16, 56, '2015-03-30 23:20:45', '2015-03-30 23:20:45'),
(9, 16, 84, '2015-03-30 23:20:45', '2015-03-30 23:20:45'),
(10, 16, 60, '2015-03-30 23:20:45', '2015-03-30 23:20:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `throttle`
--

CREATE TABLE IF NOT EXISTS `throttle` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned DEFAULT NULL,
  `ip_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `attempts` int(11) NOT NULL DEFAULT '0',
  `suspended` tinyint(1) NOT NULL DEFAULT '0',
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `last_attempt_at` timestamp NULL DEFAULT NULL,
  `suspended_at` timestamp NULL DEFAULT NULL,
  `banned_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `throttle_user_id_index` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=23 ;

--
-- Volcado de datos para la tabla `throttle`
--

INSERT INTO `throttle` (`id`, `user_id`, `ip_address`, `attempts`, `suspended`, `banned`, `last_attempt_at`, `suspended_at`, `banned_at`) VALUES
(1, 1, '127.0.0.1', 0, 0, 0, NULL, NULL, NULL),
(2, 2, '127.0.0.1', 0, 0, 0, NULL, NULL, NULL),
(3, 3, '127.0.0.1', 0, 0, 0, NULL, NULL, NULL),
(4, 4, '127.0.0.1', 0, 0, 0, NULL, NULL, NULL),
(5, 9, NULL, 0, 0, 0, NULL, NULL, NULL),
(6, 10, NULL, 0, 0, 0, NULL, NULL, NULL),
(7, 11, NULL, 0, 0, 0, NULL, NULL, NULL),
(8, 12, NULL, 0, 0, 0, NULL, NULL, NULL),
(9, 13, NULL, 0, 0, 0, NULL, NULL, NULL),
(10, 14, NULL, 0, 0, 0, NULL, NULL, NULL),
(11, 15, NULL, 0, 0, 0, NULL, NULL, NULL),
(12, 16, NULL, 0, 0, 0, NULL, NULL, NULL),
(13, 17, NULL, 0, 0, 0, NULL, NULL, NULL),
(14, 18, NULL, 0, 0, 0, NULL, NULL, NULL),
(15, 4, '192.168.1.113', 0, 0, 0, NULL, NULL, NULL),
(16, 4, '192.168.1.121', 0, 0, 0, NULL, NULL, NULL),
(17, 19, NULL, 0, 0, 0, NULL, NULL, NULL),
(18, 20, NULL, 0, 0, 0, NULL, NULL, NULL),
(19, 21, NULL, 0, 0, 0, NULL, NULL, NULL),
(20, 22, NULL, 0, 0, 0, NULL, NULL, NULL),
(21, 23, NULL, 0, 0, 0, NULL, NULL, NULL),
(22, 24, NULL, 0, 0, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transportador`
--

CREATE TABLE IF NOT EXISTS `transportador` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `perfil_empresa_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `pais_origen` int(11) NOT NULL,
  `pais_destino` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidades`
--

CREATE TABLE IF NOT EXISTS `unidades` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `unidades`
--

INSERT INTO `unidades` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'Sacos', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Galones', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'litros', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Kilos', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Libras', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Unidades', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `activated` tinyint(1) NOT NULL DEFAULT '0',
  `activation_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `activated_at` timestamp NULL DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `persist_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reset_password_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_activation_code_index` (`activation_code`),
  KEY `users_reset_password_code_index` (`reset_password_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=18 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `email`, `first_name`, `last_name`, `password`, `permissions`, `activated`, `activation_code`, `activated_at`, `last_login`, `persist_code`, `reset_password_code`, `created_at`, `updated_at`) VALUES
(1, 'jefersonpatino@yahoo.es', 'Jefferson Rivera', NULL, '$2y$10$Gtc3X5xMDE9B5kfBEujrDemVGC.QcgxQH3zFtsVBkHtKkvMPjhqFi', NULL, 1, '1JG7NevXNVUm0BUUgXT1AljLqlpNtkWmpettpG8Wi6', NULL, '2015-04-01 14:22:44', '$2y$10$TNOfjIDd4j8hNY354Rw3ZeTkHr4ZKdfwIq7HmY53zizxNBp46cIS2', NULL, '2015-03-12 15:51:02', '2015-04-01 14:22:44'),
(2, 'hola@yahoo.es', 'Jun doe', NULL, '$2y$10$9OB8B0yAgwef8bo4LiQQyuNubWpPMqilSdkN1C2o7olpWe0wem55m', NULL, 1, 'QQ2rmfvfV4drSmyCt6lz4ZvdzOKEB5FcD2g0Go28gg', NULL, '2015-03-12 22:30:35', '$2y$10$RfzkdOX6DoWX6Io.G7eBN.dN8hfi4OlNPx4Yup3vIldrpnTYpRBfK', NULL, '2015-03-12 22:30:35', '2015-03-12 22:30:35'),
(3, 'prueba@asd.com', 'Jeffer', NULL, '$2y$10$E.2Zt3sFehGguZzZy7jO3u1xw.udD4vhb7mV6nitgrY6.A6zB00fq', NULL, 1, 'PThRwvrzhI8V95N7Yy9shsZDEghgutckMrQDyt5i7Y', NULL, '2015-03-31 17:53:46', '$2y$10$J4zjK3mmpik5ON7rf3FdluRLdqbH0FJS96x4M6mjIo/.sUi.fuEdW', NULL, '2015-03-18 16:11:02', '2015-03-31 17:53:46'),
(4, 'prueba2@asd.com', 'Jeffer', NULL, '$2y$10$CKOWzGo0NQho7fvBCqnqTO5x1sj/Kwj6RNQbGn4BHuyqZ101IgOy6', NULL, 1, NULL, NULL, NULL, NULL, NULL, '2015-03-19 19:49:51', '2015-03-19 19:49:51'),
(5, 'prueba2@asd.com2', 'Jeffer', NULL, '$2y$10$1vmmm3uLf.IbjiO.rtvop.UG3OdPsPYmtNwS9.nWuJ9eNXKsPLyqu', NULL, 1, NULL, NULL, NULL, NULL, NULL, '2015-03-19 19:50:55', '2015-03-19 19:50:55'),
(6, 'prueba@asd.com3', 'Jeffer', NULL, '$2y$10$3/6JaDYTH5ik9mQQMWS2cuRih5fYLqV.klbYAM8ukZyK/ipM.Ts7O', NULL, 1, NULL, NULL, NULL, NULL, NULL, '2015-03-19 19:53:28', '2015-03-19 19:53:28'),
(7, 'prueba@asd.com34', 'Jeffer', NULL, '$2y$10$lOiHYxDUHdDuMDy9XlCbkeajdgfKG5TputzgeICCZPJW9UiY4wHLe', NULL, 1, NULL, NULL, NULL, NULL, NULL, '2015-03-19 19:54:27', '2015-03-19 19:54:27'),
(8, 'prueba@asd.com346', 'Jeffer', NULL, '$2y$10$uUc0Tzn6DaEgT5af1dt9auZP27v6pAIWuilU.jTId6umtnTxZ6Iq.', NULL, 1, NULL, NULL, NULL, NULL, NULL, '2015-03-19 19:54:57', '2015-03-19 19:54:57'),
(9, 'prueba@asd.com3464', 'Jeffer', NULL, '$2y$10$dfAnuwkzjp8hYAjdMqfNSuAMzBAvs6JskOiTXGt7z7ehCxd3jAlZ.', NULL, 1, NULL, NULL, NULL, NULL, NULL, '2015-03-19 19:55:33', '2015-03-19 19:55:33'),
(10, 'prueba@asd.com34643', 'Jeffer', NULL, '$2y$10$51UO2bdWLC5DajxPHj3XC.gBH/OQ6k4mfofM5Un5l/mcfQsZrdhy6', NULL, 1, NULL, NULL, NULL, NULL, NULL, '2015-03-19 20:02:02', '2015-03-19 20:02:02'),
(11, 'prueba@asd.co', 'Jeffer', NULL, '$2y$10$bk75hUTSQUYkVxlAFhQyuucX0hxLcrwdrivIl3g8loDaNbfAh4NuO', NULL, 1, NULL, NULL, '2015-03-19 20:03:30', '$2y$10$FpYL/r0YBts1d0i7v7OSCex/KDX/pMM1VZR9MuQLj1hrh3Mpu6E02', NULL, '2015-03-19 20:03:30', '2015-03-19 20:03:30'),
(12, 'jefersonpatino@yahoo.ess', 'Jhon Doe', NULL, '$2y$10$Nw/T9SLP6B96vzbv8pZA3eUALWZSdMdPDGji9IXH2q9lMKmJEcQ7.', NULL, 1, NULL, NULL, '2015-03-25 17:42:59', '$2y$10$9m5S5MW.KotMxXBe65lKvumeRBLAQ3bzJYCFEmPHYq5hFqKaC343K', NULL, '2015-03-25 17:42:59', '2015-03-25 17:42:59'),
(13, 'prueba@asd.com.co', 'Jeffer', NULL, '$2y$10$S.hCC3DAKSRTlHcEg1sYkOkYdqTUPA5GHBQWNyGqJO3wkKQLJT976', NULL, 1, NULL, NULL, '2015-03-25 17:44:46', '$2y$10$CdHO2ZrIsVNv7Oq5UbfW4unwY3Z0XMwoye.WPH.XTrOieXsfW7Fh2', NULL, '2015-03-25 17:44:46', '2015-03-25 17:44:46'),
(14, 'algo@algo.com', 'Jhon Doe', NULL, '$2y$10$SBvK0Kpr9xZ76CyuJLjch.axmWMXuG1hjwUBeIt3AHXXQDFSR2fTO', NULL, 1, NULL, NULL, '2015-03-25 20:20:22', '$2y$10$uaGNTGuyUCaxi7Jth66H3eQzE2oHO180SUTgbPKmsfSDQPHg//Xb6', NULL, '2015-03-25 20:20:21', '2015-03-25 20:20:22'),
(15, 'transporte@asd.com', 'juan Gomez', NULL, '$2y$10$Y1mRVLrzSyAldnSf420IGO3DBw5ED8xNlv1/08nSFg/7qDcDwWMa.', NULL, 1, NULL, NULL, '2015-03-31 14:12:06', '$2y$10$c4cZ.ZGIeJ0Hf2KJS2z81.WU2xBsiH3XfYQbdrbNfgULjeX./I1FS', NULL, '2015-03-30 21:41:49', '2015-03-31 14:12:06'),
(16, 'sias@asd.com', 'Juan topo', NULL, '$2y$10$fTwJ5ADjiYL88YxHCP73uuE4P9ERfhxqpwC..O/E608OXewxRBB6W', NULL, 1, NULL, NULL, '2015-03-30 22:35:17', '$2y$10$jXxSRyoe9n6i41y9RmXGFO.bCKztU7kqf0gLQsTKGJY2wn4K1rf1G', NULL, '2015-03-30 22:35:17', '2015-03-30 22:35:17'),
(17, 'prueba@asd.com.co.es', 'sdsdsd', NULL, '$2y$10$2Po2WxxppZerXfYdPeRmmunTreWyPsVg9LUpWUNudSmm5Pqq3wX.6', NULL, 1, NULL, NULL, '2015-03-31 17:54:22', '$2y$10$.17jyWex.FZo2A/5QyjBOuOpSktNte9jr.fjz6agciFXaOBs4fhDe', NULL, '2015-03-31 17:54:21', '2015-03-31 17:54:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_groups`
--

CREATE TABLE IF NOT EXISTS `users_groups` (
  `user_id` int(10) unsigned NOT NULL,
  `group_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
