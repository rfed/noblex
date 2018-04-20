-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 20-04-2018 a las 17:16:58
-- Versión del servidor: 5.7.21-0ubuntu0.16.04.1
-- Versión de PHP: 7.1.16-1+ubuntu16.04.1+deb.sury.org+1

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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `name`, `url`, `root_id`, `image`, `visible`, `created_at`, `updated_at`) VALUES
(1, 'Raiz', NULL, 0, NULL, 0, '2018-04-20 21:38:56', '2018-04-20 21:38:56'),
(6, 'Cat 2', 'cat-2', 1, NULL, 1, '2018-04-20 21:41:34', '2018-04-20 21:53:09'),
(7, 'Cat 3', 'cat-3', 1, NULL, 0, '2018-04-20 22:09:44', '2018-04-20 22:09:44');

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
(14, '2018_04_19_182333_create_feature_product_table', 1);

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
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `category_feature`
--
ALTER TABLE `category_feature`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_feature_category_id_foreign` (`category_id`),
  ADD KEY `category_feature_feature_id_foreign` (`feature_id`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `category_feature`
--
ALTER TABLE `category_feature`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `products_media`
--
ALTER TABLE `products_media`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
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
-- Filtros para la tabla `category_feature`
--
ALTER TABLE `category_feature`
  ADD CONSTRAINT `category_feature_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `category_feature_feature_id_foreign` FOREIGN KEY (`feature_id`) REFERENCES `features` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
