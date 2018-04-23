-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 22-04-2018 a las 15:08:06
-- Versión del servidor: 5.7.21-0ubuntu0.16.04.1
-- Versión de PHP: 7.1.14-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `noblex`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `attributegroups`
--

CREATE TABLE `attributegroups` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `attributegroups`
--

INSERT INTO `attributegroups` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Pantalla', '2018-04-20 21:38:56', '2018-04-20 21:38:56'),
(2, 'Conectividad', '2018-04-20 21:38:56', '2018-04-20 21:38:56'),
(3, 'Audio', '2018-04-20 21:38:56', '2018-04-20 21:38:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `attributes`
--

CREATE TABLE `attributes` (
  `id` int(10) UNSIGNED NOT NULL,
  `attributegroup_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `attributes`
--

INSERT INTO `attributes` (`id`, `attributegroup_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Resolucion', '2018-04-20 21:38:56', '2018-04-20 21:38:56'),
(2, 1, 'Tasa de refresco', '2018-04-20 21:38:56', '2018-04-20 21:38:56'),
(3, 2, 'Puertos', '2018-04-20 21:38:56', '2018-04-20 21:38:56'),
(4, 2, 'Bluetooth', '2018-04-20 21:38:56', '2018-04-20 21:38:56'),
(5, 3, 'Salida de Audio', '2018-04-20 21:38:56', '2018-04-20 21:38:56'),
(6, 3, 'Potencia de parlantes', '2018-04-20 21:38:56', '2018-04-20 21:38:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `attribute_category`
--

CREATE TABLE `attribute_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `attribute_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `attribute_category_product`
--

CREATE TABLE `attribute_category_product` (
  `id` int(10) UNSIGNED NOT NULL,
  `attribute_category_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `value` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `brands`
--

CREATE TABLE `brands` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `brands`
--

INSERT INTO `brands` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Noblex', '2018-04-20 21:38:56', '2018-04-20 21:38:56'),
(2, 'Atma', '2018-04-20 21:38:56', '2018-04-20 21:38:56'),
(3, 'Sharp', '2018-04-20 21:38:56', '2018-04-20 21:38:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `root_id` int(11) NOT NULL DEFAULT '0',
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `feautured_product` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menu` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `name`, `url`, `root_id`, `image`, `visible`, `created_at`, `updated_at`, `feautured_product`, `menu`) VALUES
(1, 'Raiz', NULL, 0, NULL, 0, '2018-04-20 21:38:56', '2018-04-20 21:38:56', NULL, 0),
(7, 'Smartphone', 'smartphone', 1, NULL, 1, '2018-04-20 22:09:44', '2018-04-21 20:59:26', NULL, 0),
(8, 'Subcat', 'subcat', 7, NULL, 1, '2018-04-21 20:25:20', '2018-04-21 20:25:20', NULL, 0),
(9, 'E-reader', 'e-reader', 1, NULL, 1, '2018-04-21 20:59:49', '2018-04-21 20:59:49', NULL, 0),
(10, 'Audio', 'audio', 1, NULL, 1, '2018-04-21 21:00:01', '2018-04-21 21:00:01', NULL, 0),
(11, 'TV', 'tv', 1, NULL, 1, '2018-04-21 21:00:15', '2018-04-21 22:13:25', NULL, 0),
(12, 'Tables', 'tables', 1, NULL, 1, '2018-04-21 21:00:29', '2018-04-21 21:52:39', 'asdasdas', 0),
(13, 'Otros', 'otros', 1, NULL, 1, '2018-04-21 21:00:39', '2018-04-22 04:47:37', NULL, 1),
(14, 'Smart 4k', 'smart-4k', 11, NULL, 1, '2018-04-21 21:05:00', '2018-04-22 04:01:59', 'asdasdas', 1),
(15, 'Smart', 'smart', 11, NULL, 1, '2018-04-21 21:05:16', '2018-04-22 04:55:40', '1s2f35g', 1),
(17, 'Led', 'led', 11, NULL, 1, '2018-04-22 15:58:02', '2018-04-22 15:58:02', NULL, 0),
(18, 'Led', 'led', 11, NULL, 1, '2018-04-22 15:58:26', '2018-04-22 15:58:26', NULL, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category_feature`
--

CREATE TABLE `category_feature` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `feature_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category_info_interes`
--

CREATE TABLE `category_info_interes` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `text` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `category_info_interes`
--

INSERT INTO `category_info_interes` (`id`, `category_id`, `text`, `url`) VALUES
(1, 14, '¿Qué es 4k?', 'http://www.google.com'),
(2, 14, '¿Cómo funciona XMotion?', 'http://www.sarasa.net'),
(3, 14, '¿Que aplicaciones traen los equipos?', 'http://www.sopososo.net'),
(4, 14, 'A ver', 'http://www.naaaaa.org'),
(5, 15, 'Esto tiene que ver', 'http://www.unlink.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `features`
--

CREATE TABLE `features` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `features`
--

INSERT INTO `features` (`id`, `name`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Play & Share', 'Description 1', NULL, '2018-04-20 21:38:57', '2018-04-20 21:38:57'),
(2, 'HDMI', 'Description 2', NULL, '2018-04-20 21:38:57', '2018-04-20 21:38:57'),
(3, 'Bluetooth', 'Description 3', NULL, '2018-04-20 21:38:57', '2018-04-20 21:38:57'),
(4, 'TDA', 'Description 4', NULL, '2018-04-20 21:38:57', '2018-04-20 21:38:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `feature_product`
--

CREATE TABLE `feature_product` (
  `id` int(10) UNSIGNED NOT NULL,
  `feature_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_04_12_153304_create_categories_table', 1),
(4, '2018_04_13_164923_create_brands_table', 1),
(5, '2018_04_13_165531_create_products_table', 1),
(6, '2018_04_13_170807_create_products_media_table', 1),
(7, '2018_04_13_171511_create_attributegroups_table', 1),
(8, '2018_04_13_174708_create_attributes_table', 1),
(9, '2018_04_13_175619_create_attribute_category_table', 1),
(10, '2018_04_13_180301_create_attribute_category_product_table', 1),
(11, '2018_04_16_200605_create_relatedproducts_table', 1),
(12, '2018_04_19_161928_create_features_table', 1),
(13, '2018_04_19_164048_create_category_feature_table', 1),
(14, '2018_04_19_182333_create_feature_product_table', 1),
(16, '2018_04_21_182755_add_field_feautured_product_to_categories', 2),
(19, '2018_04_21_185442_create_info_interes_table', 3),
(20, '2018_04_22_005337_add_menu_field_to_categories', 4),
(23, '2018_04_22_033120_create_widgets_table', 5),
(24, '2018_04_22_034044_create_widgets_media_table', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `sku` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `sku`, `name`, `brand_id`, `category_id`, `short_description`, `description`, `featured`, `active`, `created_at`, `updated_at`) VALUES
(1, 'asdasdas', 'DA65X6500X', 3, 14, 'LED TV Smart 65" Full UHD', 'asdasdasdasd', 1, 1, '2018-04-21 21:37:23', '2018-04-21 21:37:23'),
(2, '1s2f35g', 'Tv Noblex 32\'', 1, 14, 'Aliquam erat volutpat.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut feugiat auctor purus, eu volutpat dolor facilisis sed. Morbi maximus tristique arcu. Donec vitae orci justo. Sed massa orci, hendrerit quis egestas quis, tempor eu dui. Aliquam erat volutpat. Aenean urna ante, auctor vel ligula eget, consectetur finibus nisi. Suspendisse potenti. Maecenas sapien diam, gravida vitae maximus vel, bibendum sit amet risus. Ut vehicula ac mi sed volutpat. Fusce pretium id tortor non pharetra.', 1, 1, '2018-04-22 04:54:47', '2018-04-22 04:54:47'),
(3, 'sslaefg', 'Otro producto', 2, 14, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque mollis vel dolor non pellentesque. Vestibulum ac diam eget enim scelerisque cursus at ut turpis. Ut non blandit nulla. Vivamus viverra rutrum bibendum. Maecenas a augue in nisl gravida pretium vehicula sit amet neque. Ut convallis risus justo, et tincidunt ipsum tincidunt non. Fusce hendrerit volutpat sapien vel pulvinar. Sed neque augue, sagittis quis mi at, sagittis condimentum neque.', 1, 1, '2018-04-22 05:10:04', '2018-04-22 05:10:04'),
(4, 'asdasdaaaaa', 'asdasd', 2, 1, 'asdasdasd', 'asdasdasda', 0, 0, '2018-04-22 08:07:35', '2018-04-22 08:07:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products_media`
--

CREATE TABLE `products_media` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `source` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('image','document','video') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'image',
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `position` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `products_media`
--

INSERT INTO `products_media` (`id`, `product_id`, `source`, `type`, `featured`, `position`, `created_at`, `updated_at`) VALUES
(1, 1, 'productos/W9sURAEeWTKLI1pIULs8nfvTxtdlpXvW8oj7RtfY.png', 'image', 1, 1, '2018-04-21 21:38:13', '2018-04-21 21:38:13'),
(2, 1, 'productos/Qg2WzIuVUPOqRrT2h1Vy7fXvLupTwTnj2xS1pj6C.png', 'image', 0, 1, '2018-04-21 21:38:13', '2018-04-21 21:38:13'),
(3, 2, 'productos/DmJCc6SLa5WHEA1VeexpJVMepuQ9LJUdXRA2060b.png', 'image', 0, 1, '2018-04-22 04:55:28', '2018-04-22 04:55:28'),
(4, 2, 'productos/Vr5o019om3EtCi1xghI39E4jJjz15vS8BMRjOWlC.png', 'image', 1, 1, '2018-04-22 04:55:28', '2018-04-22 04:55:28'),
(5, 3, 'productos/Wnjw6eQO8oJkafEHLIzqfYMwh4hAbQQV9o4XlT28.png', 'image', 0, 1, '2018-04-22 05:10:47', '2018-04-22 05:10:47'),
(6, 3, 'productos/GBSScCGn5gsc4BcUz4PJLLbnLVQiAplKYkSJ9azF.png', 'image', 1, 1, '2018-04-22 05:10:47', '2018-04-22 05:10:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `relatedproducts`
--

CREATE TABLE `relatedproducts` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `product_relationship_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'fede@lavacoders.com', '$2y$10$Pup2A1i5.76RvVWICdSE4.W2r/LBTyXqDsEQGtYHMJDyuBUkVoVk2', 'BjqC4Kd8st', '2018-04-20 21:38:56', '2018-04-20 21:38:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `widgets`
--

CREATE TABLE `widgets` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `type` int(11) NOT NULL DEFAULT '1',
  `btn_text` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `position` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `show_prods` tinyint(1) NOT NULL DEFAULT '0',
  `features` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `widgets`
--

INSERT INTO `widgets` (`id`, `title`, `description`, `type`, `btn_text`, `url`, `category_id`, `position`, `active`, `show_prods`, `features`) VALUES
(3, 'Conocé nuestra línea y disfrutá del mundial', 'Experimentá la emoción de ver imágenes en la mejor definición y resolución. Accedé a lo mejor de Internet.', 1, 'Ver Todos', NULL, NULL, 3, 1, 0, 1),
(4, 'Verdadera alta definición', '<p>Verdadera alta definición</p>\r\n<span>Hablamos de verdadera alta resolución. 4k es la abreviatura de de 4.000 píxeles (4096 x 2160 píxeles)</span>', 4, NULL, NULL, 14, 2, 1, 1, 0),
(5, 'Box x 4', NULL, 6, NULL, NULL, NULL, 4, 1, 0, 0),
(6, 'Banner', NULL, 2, NULL, NULL, NULL, 6, 1, 0, 0),
(7, 'Slider', NULL, 7, NULL, NULL, NULL, 0, 1, 0, 0),
(9, NULL, NULL, 1, NULL, NULL, NULL, 1, 1, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `widgets_media`
--

CREATE TABLE `widgets_media` (
  `id` int(10) UNSIGNED NOT NULL,
  `widget_id` int(10) UNSIGNED NOT NULL,
  `source` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('image','video') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'image',
  `position` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `widgets_media`
--

INSERT INTO `widgets_media` (`id`, `widget_id`, `source`, `type`, `position`, `created_at`, `updated_at`, `title`, `description`, `link`) VALUES
(23, 3, 'widgets/TIFO85MrRU8eNVid5OnM98uSn2SH0nXrB096vSFU.png', 'image', 1, NULL, NULL, 'Conocé nuestra línea y disfrutá del mundial', 'Experimentá la emoción de ver imágenes en la mejor definición y resolución. Accedé a lo mejor de Internet.', 'http://www.linkdelbanner.com'),
(29, 6, 'widgets/bIPUXFqFmcuP69PpjfRZIjgyXpl2CO4BBbI3zye7.png', 'image', 0, NULL, NULL, NULL, NULL, NULL),
(79, 7, 'widgets/IqINFGkBnpNJVvS1MnnHP4blW0lU2cbl4wEM3kJH.png', 'image', 13, NULL, NULL, 'Nuevos smartphones inspirados en vos', 'Sabemos la importancia que le das a al comunicación. Nuestra línea está inspirada en vos y fue creada 100% pensando en tu comodidad.', 'http://www.google.com'),
(80, 7, 'widgets/5DiwU29IuQZUJkZlCZY9S2FOSHKmtHr9StrofYij.png', 'image', 14, NULL, NULL, 'Tecnología al alcance de tu mano', 'Ahora podés: Atender el teléfono, desbloquear el reloj y navegar el menú mediante el movimiento de tu muñeca, gracias a la función Smart Gesture. Y más!', 'http://www.clarin.com.ar'),
(81, 7, '', 'image', 2, NULL, NULL, '', '', NULL),
(82, 7, '', 'image', 3, NULL, NULL, '', '', NULL),
(83, 7, '', 'image', 3, NULL, NULL, '', '', NULL),
(84, 7, '', 'image', 3, NULL, NULL, '', '', NULL),
(86, 9, 'widgets/oLqYUIn1DETFUDabWiFmHbzszFGE5wakBMKbM4U9.png', 'image', 4, NULL, NULL, 'Tecnología al alcance de tu mano', 'Ahora podés: Atender el teléfono, desbloquear el reloj y navegar el menú mediante el movimiento de tu muñeca, gracias a la función Smart Gesture. Y más!', 'http://www.otrolink.com'),
(87, 4, 'widgets/D9q2B3w5lq4Oa4xoqP8rERiHhu5yoXnPEHu3Z6gm.mp4', 'video', 2, NULL, NULL, NULL, NULL, NULL),
(88, 4, 'widgets/tMqx8eiWsVXmNazhL17dbQdB3f4SUVyyAAMRKOgw.mp4', 'video', 3, NULL, NULL, NULL, NULL, NULL),
(89, 4, 'widgets/6845LOik2WZqOBjLWElbVBHeJ5s19XxxHjP5LWC7.mp4', 'video', 4, NULL, NULL, NULL, NULL, NULL),
(90, 5, 'widgets/PIk92HVH4dCt0tBE3RouOBGFltGylpejThiAQ7Ij.png', 'image', 6, NULL, NULL, NULL, NULL, 'http://www.promo1.com'),
(91, 5, 'widgets/hQxgsyJZ6SQyTeOiGBcCF0mKITEusOoL9LnLEtk8.png', 'image', 7, NULL, NULL, NULL, NULL, 'http://www.promo2.com'),
(92, 5, 'widgets/qMuHH3oopp4PKPUnFXWaegGV86GqFk6CNJDmzs97.png', 'image', 8, NULL, NULL, NULL, NULL, 'http://www.promo3.com'),
(93, 5, 'widgets/aqps7lzsHm1Tdlf5bkbL9gefNaHk2ieUattc9AdK.png', 'image', 10, NULL, NULL, NULL, NULL, 'http://www.promo1.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `attributegroups`
--
ALTER TABLE `attributegroups`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attributes_attributegroup_id_foreign` (`attributegroup_id`);

--
-- Indices de la tabla `attribute_category`
--
ALTER TABLE `attribute_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attribute_category_category_id_foreign` (`category_id`),
  ADD KEY `attribute_category_attribute_id_foreign` (`attribute_id`);

--
-- Indices de la tabla `attribute_category_product`
--
ALTER TABLE `attribute_category_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attribute_category_product_attribute_category_id_foreign` (`attribute_category_id`),
  ADD KEY `attribute_category_product_product_id_foreign` (`product_id`);

--
-- Indices de la tabla `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_feautured_product_foreign` (`feautured_product`);

--
-- Indices de la tabla `category_feature`
--
ALTER TABLE `category_feature`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_feature_category_id_foreign` (`category_id`),
  ADD KEY `category_feature_feature_id_foreign` (`feature_id`);

--
-- Indices de la tabla `category_info_interes`
--
ALTER TABLE `category_info_interes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_info_interes_category_id_foreign` (`category_id`);

--
-- Indices de la tabla `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `feature_product`
--
ALTER TABLE `feature_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `feature_product_feature_id_foreign` (`feature_id`),
  ADD KEY `feature_product_product_id_foreign` (`product_id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_sku_unique` (`sku`),
  ADD KEY `products_brand_id_foreign` (`brand_id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indices de la tabla `products_media`
--
ALTER TABLE `products_media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_media_product_id_foreign` (`product_id`);

--
-- Indices de la tabla `relatedproducts`
--
ALTER TABLE `relatedproducts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `relatedproducts_product_id_foreign` (`product_id`),
  ADD KEY `relatedproducts_product_relationship_id_foreign` (`product_relationship_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `widgets`
--
ALTER TABLE `widgets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `widgets_category_id_foreign` (`category_id`);

--
-- Indices de la tabla `widgets_media`
--
ALTER TABLE `widgets_media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `widgets_media_widget_id_foreign` (`widget_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `attributegroups`
--
ALTER TABLE `attributegroups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `attribute_category`
--
ALTER TABLE `attribute_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `attribute_category_product`
--
ALTER TABLE `attribute_category_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT de la tabla `category_feature`
--
ALTER TABLE `category_feature`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `category_info_interes`
--
ALTER TABLE `category_info_interes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `features`
--
ALTER TABLE `features`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `feature_product`
--
ALTER TABLE `feature_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `products_media`
--
ALTER TABLE `products_media`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `relatedproducts`
--
ALTER TABLE `relatedproducts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `widgets`
--
ALTER TABLE `widgets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT de la tabla `widgets_media`
--
ALTER TABLE `widgets_media`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `attributes`
--
ALTER TABLE `attributes`
  ADD CONSTRAINT `attributes_attributegroup_id_foreign` FOREIGN KEY (`attributegroup_id`) REFERENCES `attributegroups` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `attribute_category`
--
ALTER TABLE `attribute_category`
  ADD CONSTRAINT `attribute_category_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `attribute_category_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `attribute_category_product`
--
ALTER TABLE `attribute_category_product`
  ADD CONSTRAINT `attribute_category_product_attribute_category_id_foreign` FOREIGN KEY (`attribute_category_id`) REFERENCES `attribute_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `attribute_category_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_feautured_product_foreign` FOREIGN KEY (`feautured_product`) REFERENCES `products` (`sku`);

--
-- Filtros para la tabla `category_feature`
--
ALTER TABLE `category_feature`
  ADD CONSTRAINT `category_feature_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `category_feature_feature_id_foreign` FOREIGN KEY (`feature_id`) REFERENCES `features` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `category_info_interes`
--
ALTER TABLE `category_info_interes`
  ADD CONSTRAINT `category_info_interes_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `feature_product`
--
ALTER TABLE `feature_product`
  ADD CONSTRAINT `feature_product_feature_id_foreign` FOREIGN KEY (`feature_id`) REFERENCES `features` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `feature_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Filtros para la tabla `products_media`
--
ALTER TABLE `products_media`
  ADD CONSTRAINT `products_media_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `relatedproducts`
--
ALTER TABLE `relatedproducts`
  ADD CONSTRAINT `relatedproducts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `relatedproducts_product_relationship_id_foreign` FOREIGN KEY (`product_relationship_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `widgets`
--
ALTER TABLE `widgets`
  ADD CONSTRAINT `widgets_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;

--
-- Filtros para la tabla `widgets_media`
--
ALTER TABLE `widgets_media`
  ADD CONSTRAINT `widgets_media_widget_id_foreign` FOREIGN KEY (`widget_id`) REFERENCES `widgets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
