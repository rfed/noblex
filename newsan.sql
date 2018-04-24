/*
 Navicat MySQL Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50638
 Source Host           : 127.0.0.1:3306
 Source Schema         : newsan

 Target Server Type    : MySQL
 Target Server Version : 50638
 File Encoding         : 65001

 Date: 24/04/2018 10:53:08
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for attribute_category
-- ----------------------------
DROP TABLE IF EXISTS `attribute_category`;
CREATE TABLE `attribute_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(10) unsigned NOT NULL,
  `attribute_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `attribute_category_category_id_foreign` (`category_id`),
  KEY `attribute_category_attribute_id_foreign` (`attribute_id`),
  CONSTRAINT `attribute_category_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`) ON DELETE CASCADE,
  CONSTRAINT `attribute_category_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Table structure for attribute_category_product
-- ----------------------------
DROP TABLE IF EXISTS `attribute_category_product`;
CREATE TABLE `attribute_category_product` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `attribute_category_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `value` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `attribute_category_product_attribute_category_id_foreign` (`attribute_category_id`),
  KEY `attribute_category_product_product_id_foreign` (`product_id`),
  CONSTRAINT `attribute_category_product_attribute_category_id_foreign` FOREIGN KEY (`attribute_category_id`) REFERENCES `attribute_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `attribute_category_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Table structure for attributegroups
-- ----------------------------
DROP TABLE IF EXISTS `attributegroups`;
CREATE TABLE `attributegroups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of attributegroups
-- ----------------------------
BEGIN;
INSERT INTO `attributegroups` VALUES (1, 'Pantalla', '2018-04-20 18:38:56', '2018-04-20 18:38:56');
INSERT INTO `attributegroups` VALUES (2, 'Conectividad', '2018-04-20 18:38:56', '2018-04-20 18:38:56');
INSERT INTO `attributegroups` VALUES (3, 'Audio', '2018-04-20 18:38:56', '2018-04-20 18:38:56');
COMMIT;

-- ----------------------------
-- Table structure for attributes
-- ----------------------------
DROP TABLE IF EXISTS `attributes`;
CREATE TABLE `attributes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `attributegroup_id` int(10) unsigned NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `attributes_attributegroup_id_foreign` (`attributegroup_id`),
  CONSTRAINT `attributes_attributegroup_id_foreign` FOREIGN KEY (`attributegroup_id`) REFERENCES `attributegroups` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of attributes
-- ----------------------------
BEGIN;
INSERT INTO `attributes` VALUES (1, 1, 'Resolucion', '2018-04-20 18:38:56', '2018-04-20 18:38:56');
INSERT INTO `attributes` VALUES (2, 1, 'Tasa de refresco', '2018-04-20 18:38:56', '2018-04-20 18:38:56');
INSERT INTO `attributes` VALUES (3, 2, 'Puertos', '2018-04-20 18:38:56', '2018-04-20 18:38:56');
INSERT INTO `attributes` VALUES (4, 2, 'Bluetooth', '2018-04-20 18:38:56', '2018-04-20 18:38:56');
INSERT INTO `attributes` VALUES (5, 3, 'Salida de Audio', '2018-04-20 18:38:56', '2018-04-20 18:38:56');
INSERT INTO `attributes` VALUES (6, 3, 'Potencia de parlantes', '2018-04-20 18:38:56', '2018-04-20 18:38:56');
COMMIT;

-- ----------------------------
-- Table structure for brands
-- ----------------------------
DROP TABLE IF EXISTS `brands`;
CREATE TABLE `brands` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of brands
-- ----------------------------
BEGIN;
INSERT INTO `brands` VALUES (1, 'Noblex', '2018-04-20 18:38:56', '2018-04-20 18:38:56');
INSERT INTO `brands` VALUES (2, 'Atma', '2018-04-20 18:38:56', '2018-04-20 18:38:56');
INSERT INTO `brands` VALUES (3, 'Sharp', '2018-04-20 18:38:56', '2018-04-20 18:38:56');
COMMIT;

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `root_id` int(11) NOT NULL DEFAULT '0',
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `feautured_product` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menu` tinyint(1) NOT NULL DEFAULT '0',
  `position` int(255) DEFAULT NULL,
  `title` varbinary(200) DEFAULT NULL,
  `description` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `categories_feautured_product_foreign` (`feautured_product`),
  CONSTRAINT `categories_feautured_product_foreign` FOREIGN KEY (`feautured_product`) REFERENCES `products` (`sku`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of categories
-- ----------------------------
BEGIN;
INSERT INTO `categories` VALUES (1, 'Raiz', NULL, 0, NULL, 0, '2018-04-20 18:38:56', '2018-04-20 18:38:56', NULL, 0, NULL, NULL, NULL);
INSERT INTO `categories` VALUES (7, 'Smartphones', 'smartphones', 1, NULL, 1, '2018-04-20 19:09:44', '2018-04-23 23:47:56', NULL, 0, 4, NULL, NULL);
INSERT INTO `categories` VALUES (8, 'Subcat', 'subcat', 7, NULL, 1, '2018-04-21 17:25:20', '2018-04-21 17:25:20', NULL, 0, NULL, NULL, NULL);
INSERT INTO `categories` VALUES (9, 'E-reader', 'e-reader', 1, NULL, 1, '2018-04-21 17:59:49', '2018-04-23 23:47:19', NULL, 0, 3, NULL, NULL);
INSERT INTO `categories` VALUES (10, 'Audio', 'audio', 1, NULL, 1, '2018-04-21 18:00:01', '2018-04-23 23:47:04', NULL, 0, 1, NULL, NULL);
INSERT INTO `categories` VALUES (11, 'TV', 'tv', 1, NULL, 1, '2018-04-21 18:00:15', '2018-04-24 04:40:54', NULL, 0, 0, 0x54656C657669736F726573, NULL);
INSERT INTO `categories` VALUES (12, 'Tables', 'tables', 1, NULL, 1, '2018-04-21 18:00:29', '2018-04-23 23:47:44', 'asdasdas', 0, 6, NULL, NULL);
INSERT INTO `categories` VALUES (13, 'Otros', 'otros', 1, NULL, 1, '2018-04-21 18:00:39', '2018-04-23 23:47:44', NULL, 0, 7, NULL, NULL);
INSERT INTO `categories` VALUES (14, 'Smart 4k', 'smart-4k', 11, 'categories/QIK6hWtIgNMariw3GYSp6pVHjgwi942TXBj8p7UD.png', 1, '2018-04-21 18:05:00', '2018-04-24 03:45:50', 'asdasdas', 0, NULL, 0x4D7563686F206DC3A1732071756520756E2074656C657669736F72, 'Experimentá la emoción de ver imágenes en la mejor definición y resolución. Accedé a lo mejor de Internet.');
INSERT INTO `categories` VALUES (15, 'Smart TV', 'smart-tv', 11, 'categories/VAH6LwqZy1MUeLWuAznUIUHMVH5VsBik8cUFkLwj.png', 1, '2018-04-21 18:05:16', '2018-04-24 04:44:57', '1s2f35g', 0, NULL, 0x416C746120646566696E696369C3B36E207920656E74726574656E696D69656E746F, 'Disfrutá de la más alta calidad de imagen, conectate a Internet y accedé a un mundo de aplicaciones y herramientas.');
INSERT INTO `categories` VALUES (17, 'Led TV', 'led-tv', 11, NULL, 1, '2018-04-22 12:58:02', '2018-04-23 23:55:33', NULL, 0, NULL, NULL, NULL);
INSERT INTO `categories` VALUES (19, 'Aires Acondicionados', 'aires-acondicionados', 1, NULL, 1, '2018-04-23 23:43:20', '2018-04-23 23:47:07', NULL, 0, 2, NULL, NULL);
INSERT INTO `categories` VALUES (20, 'Smartwatch', 'smartwatch', 1, NULL, 1, '2018-04-23 23:47:36', '2018-04-23 23:47:44', NULL, 0, 5, NULL, NULL);
INSERT INTO `categories` VALUES (21, '4 way Slim', '4-way-slim', 10, NULL, 1, '2018-04-23 23:56:53', '2018-04-23 23:56:53', NULL, 0, NULL, NULL, NULL);
INSERT INTO `categories` VALUES (22, 'Mirror', 'mirror', 10, NULL, 1, '2018-04-23 23:57:01', '2018-04-23 23:57:01', NULL, 0, NULL, NULL, NULL);
INSERT INTO `categories` VALUES (23, 'Smart Inverter', 'smart-inverter', 10, NULL, 1, '2018-04-23 23:57:08', '2018-04-23 23:57:08', NULL, 0, NULL, NULL, NULL);
INSERT INTO `categories` VALUES (24, 'Camara Deportiva', 'camara-deportiva', 13, NULL, 1, '2018-04-23 23:57:44', '2018-04-23 23:57:44', NULL, 0, NULL, NULL, NULL);
INSERT INTO `categories` VALUES (25, 'Cargador Portatil', 'cargador-portatil', 13, NULL, 1, '2018-04-23 23:57:53', '2018-04-23 23:57:53', NULL, 0, NULL, NULL, NULL);
INSERT INTO `categories` VALUES (26, 'Computacion', 'computacion', 13, NULL, 1, '2018-04-23 23:58:01', '2018-04-23 23:58:01', NULL, 0, NULL, NULL, NULL);
INSERT INTO `categories` VALUES (27, 'DVD', 'dvd', 13, NULL, 1, '2018-04-23 23:58:12', '2018-04-23 23:58:12', NULL, 0, NULL, NULL, NULL);
INSERT INTO `categories` VALUES (28, 'Telefonia Fija', 'telefonia-fija', 13, NULL, 1, '2018-04-23 23:58:20', '2018-04-23 23:58:20', NULL, 0, NULL, NULL, NULL);
COMMIT;

-- ----------------------------
-- Table structure for category_feature
-- ----------------------------
DROP TABLE IF EXISTS `category_feature`;
CREATE TABLE `category_feature` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(10) unsigned NOT NULL,
  `feature_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category_feature_category_id_foreign` (`category_id`),
  KEY `category_feature_feature_id_foreign` (`feature_id`),
  CONSTRAINT `category_feature_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `category_feature_feature_id_foreign` FOREIGN KEY (`feature_id`) REFERENCES `features` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of category_feature
-- ----------------------------
BEGIN;
INSERT INTO `category_feature` VALUES (1, 14, 5, NULL, NULL);
INSERT INTO `category_feature` VALUES (2, 14, 1, NULL, NULL);
INSERT INTO `category_feature` VALUES (3, 14, 6, NULL, NULL);
INSERT INTO `category_feature` VALUES (4, 14, 4, NULL, NULL);
INSERT INTO `category_feature` VALUES (5, 14, 7, NULL, NULL);
INSERT INTO `category_feature` VALUES (6, 15, 5, NULL, NULL);
INSERT INTO `category_feature` VALUES (7, 15, 6, NULL, NULL);
INSERT INTO `category_feature` VALUES (8, 15, 4, NULL, NULL);
COMMIT;

-- ----------------------------
-- Table structure for category_info_interes
-- ----------------------------
DROP TABLE IF EXISTS `category_info_interes`;
CREATE TABLE `category_info_interes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(10) unsigned NOT NULL,
  `text` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category_info_interes_category_id_foreign` (`category_id`),
  CONSTRAINT `category_info_interes_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of category_info_interes
-- ----------------------------
BEGIN;
INSERT INTO `category_info_interes` VALUES (1, 14, '¿Qué es 4k?', 'http://www.google.com');
INSERT INTO `category_info_interes` VALUES (2, 14, '¿Cómo funciona XMotion?', 'http://www.sarasa.net');
INSERT INTO `category_info_interes` VALUES (3, 14, '¿Que aplicaciones traen los equipos?', 'http://www.sopososo.net');
INSERT INTO `category_info_interes` VALUES (4, 14, 'A ver', 'http://www.naaaaa.org');
INSERT INTO `category_info_interes` VALUES (5, 15, 'Esto tiene que ver', 'http://www.unlink.com');
COMMIT;

-- ----------------------------
-- Table structure for feature_product
-- ----------------------------
DROP TABLE IF EXISTS `feature_product`;
CREATE TABLE `feature_product` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `feature_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `feature_product_feature_id_foreign` (`feature_id`),
  KEY `feature_product_product_id_foreign` (`product_id`),
  CONSTRAINT `feature_product_feature_id_foreign` FOREIGN KEY (`feature_id`) REFERENCES `features` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `feature_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Table structure for features
-- ----------------------------
DROP TABLE IF EXISTS `features`;
CREATE TABLE `features` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of features
-- ----------------------------
BEGIN;
INSERT INTO `features` VALUES (1, 'Play & Share', 'Description 1', NULL, '2018-04-20 18:38:57', '2018-04-20 18:38:57');
INSERT INTO `features` VALUES (2, 'HDMI', 'Description 2', NULL, '2018-04-20 18:38:57', '2018-04-20 18:38:57');
INSERT INTO `features` VALUES (3, 'Bluetooth', 'Description 3', NULL, '2018-04-20 18:38:57', '2018-04-20 18:38:57');
INSERT INTO `features` VALUES (4, 'TDA', 'Description 4', NULL, '2018-04-20 18:38:57', '2018-04-20 18:38:57');
INSERT INTO `features` VALUES (5, '4K', 'Esta es la descripcion del 4K.', 'features/UTR7mYynqCG7ORqEcQLb0E5VKsZrHpazS6KsBZRN.png', '2018-04-24 02:30:00', '2018-04-24 02:30:00');
INSERT INTO `features` VALUES (6, 'Sound', 'Descripcion de sound', 'features/rQSNjQ40995BTTuQ5nKVzyBHogaQN67AbSPS1dVh.png', '2018-04-24 03:22:55', '2018-04-24 03:22:55');
INSERT INTO `features` VALUES (7, 'XMotion', NULL, 'features/bKqMJXSCk9C0ETn4c7BPYhrWR5rXx4jgHhvvmg9c.png', '2018-04-24 03:28:06', '2018-04-24 03:28:06');
COMMIT;

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
BEGIN;
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2018_04_12_153304_create_categories_table', 1);
INSERT INTO `migrations` VALUES (4, '2018_04_13_164923_create_brands_table', 1);
INSERT INTO `migrations` VALUES (5, '2018_04_13_165531_create_products_table', 1);
INSERT INTO `migrations` VALUES (6, '2018_04_13_170807_create_products_media_table', 1);
INSERT INTO `migrations` VALUES (7, '2018_04_13_171511_create_attributegroups_table', 1);
INSERT INTO `migrations` VALUES (8, '2018_04_13_174708_create_attributes_table', 1);
INSERT INTO `migrations` VALUES (9, '2018_04_13_175619_create_attribute_category_table', 1);
INSERT INTO `migrations` VALUES (10, '2018_04_13_180301_create_attribute_category_product_table', 1);
INSERT INTO `migrations` VALUES (11, '2018_04_16_200605_create_relatedproducts_table', 1);
INSERT INTO `migrations` VALUES (12, '2018_04_19_161928_create_features_table', 1);
INSERT INTO `migrations` VALUES (13, '2018_04_19_164048_create_category_feature_table', 1);
INSERT INTO `migrations` VALUES (14, '2018_04_19_182333_create_feature_product_table', 1);
INSERT INTO `migrations` VALUES (16, '2018_04_21_182755_add_field_feautured_product_to_categories', 2);
INSERT INTO `migrations` VALUES (19, '2018_04_21_185442_create_info_interes_table', 3);
INSERT INTO `migrations` VALUES (20, '2018_04_22_005337_add_menu_field_to_categories', 4);
INSERT INTO `migrations` VALUES (23, '2018_04_22_033120_create_widgets_table', 5);
INSERT INTO `migrations` VALUES (24, '2018_04_22_034044_create_widgets_media_table', 5);
COMMIT;

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sku` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_id` int(10) unsigned NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `products_sku_unique` (`sku`),
  KEY `products_brand_id_foreign` (`brand_id`),
  KEY `products_category_id_foreign` (`category_id`),
  CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `sectionproducts`;
CREATE TABLE `sectionproducts` (
 `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
 `product_id` int(10) unsigned NOT NULL,
 `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
 `subtitle` text COLLATE utf8mb4_unicode_ci,
 `description` text COLLATE utf8mb4_unicode_ci,
 `source` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
 `alignment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
 `created_at` timestamp NULL DEFAULT NULL,
 `updated_at` timestamp NULL DEFAULT NULL,
 PRIMARY KEY (`id`),
 KEY `sectionproducts_product_id_foreign` (`product_id`),
 CONSTRAINT `sectionproducts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
-- ----------------------------
-- Records of products
-- ----------------------------
BEGIN;
INSERT INTO `products` VALUES (1, 'asdasdas', 'DA65X6500X', 3, 14, 'LED TV Smart 65\" Full UHD', 'asdasdasdasd', 1, 1, '2018-04-21 18:37:23', '2018-04-21 18:37:23');
INSERT INTO `products` VALUES (2, '1s2f35g', 'Tv Noblex 32\'', 1, 14, 'Aliquam erat volutpat.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut feugiat auctor purus, eu volutpat dolor facilisis sed. Morbi maximus tristique arcu. Donec vitae orci justo. Sed massa orci, hendrerit quis egestas quis, tempor eu dui. Aliquam erat volutpat. Aenean urna ante, auctor vel ligula eget, consectetur finibus nisi. Suspendisse potenti. Maecenas sapien diam, gravida vitae maximus vel, bibendum sit amet risus. Ut vehicula ac mi sed volutpat. Fusce pretium id tortor non pharetra.', 1, 1, '2018-04-22 01:54:47', '2018-04-22 01:54:47');
INSERT INTO `products` VALUES (3, 'sslaefg', 'Otro producto', 2, 14, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque mollis vel dolor non pellentesque. Vestibulum ac diam eget enim scelerisque cursus at ut turpis. Ut non blandit nulla. Vivamus viverra rutrum bibendum. Maecenas a augue in nisl gravida pretium vehicula sit amet neque. Ut convallis risus justo, et tincidunt ipsum tincidunt non. Fusce hendrerit volutpat sapien vel pulvinar. Sed neque augue, sagittis quis mi at, sagittis condimentum neque.', 1, 1, '2018-04-22 02:10:04', '2018-04-22 02:10:04');
INSERT INTO `products` VALUES (4, 'asdasdaaaaa', 'asdasd', 2, 1, 'asdasdasd', 'asdasdasda', 0, 0, '2018-04-22 05:07:35', '2018-04-22 05:07:35');
COMMIT;

-- ----------------------------
-- Table structure for products_media
-- ----------------------------
DROP TABLE IF EXISTS `products_media`;
CREATE TABLE `products_media` (
 `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
 `product_id` int(10) unsigned NOT NULL,
 `source` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
 `type` enum('image', 'image_featured', 'image_featured_background', 'image_thumb', 'document') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'image',
 `featured` tinyint(1) NOT NULL DEFAULT '0',
 `position` int(10) unsigned NOT NULL,
 `created_at` timestamp NULL DEFAULT NULL,
 `updated_at` timestamp NULL DEFAULT NULL,
 PRIMARY KEY (`id`),
 KEY `products_media_product_id_foreign` (`product_id`),
 CONSTRAINT `products_media_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of products_media
-- ----------------------------
BEGIN;
INSERT INTO `products_media` VALUES (1, 1, 'productos/W9sURAEeWTKLI1pIULs8nfvTxtdlpXvW8oj7RtfY.png', 'image_desktop', 1, 1, '2018-04-21 18:38:13', '2018-04-21 18:38:13');
INSERT INTO `products_media` VALUES (2, 1, 'productos/Qg2WzIuVUPOqRrT2h1Vy7fXvLupTwTnj2xS1pj6C.png', 'image_desktop', 0, 1, '2018-04-21 18:38:13', '2018-04-21 18:38:13');
INSERT INTO `products_media` VALUES (3, 2, 'productos/DmJCc6SLa5WHEA1VeexpJVMepuQ9LJUdXRA2060b.png', 'image_desktop', 0, 1, '2018-04-22 01:55:28', '2018-04-22 01:55:28');
INSERT INTO `products_media` VALUES (4, 2, 'productos/Vr5o019om3EtCi1xghI39E4jJjz15vS8BMRjOWlC.png', 'image_desktop', 1, 1, '2018-04-22 01:55:28', '2018-04-22 01:55:28');
INSERT INTO `products_media` VALUES (5, 3, 'productos/Wnjw6eQO8oJkafEHLIzqfYMwh4hAbQQV9o4XlT28.png', 'image_desktop', 0, 1, '2018-04-22 02:10:47', '2018-04-22 02:10:47');
INSERT INTO `products_media` VALUES (6, 3, 'productos/GBSScCGn5gsc4BcUz4PJLLbnLVQiAplKYkSJ9azF.png', 'image_desktop', 1, 1, '2018-04-22 02:10:47', '2018-04-22 02:10:47');
COMMIT;

-- ----------------------------
-- Table structure for relatedproducts
-- ----------------------------
DROP TABLE IF EXISTS `relatedproducts`;
CREATE TABLE `relatedproducts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(10) unsigned NOT NULL,
  `product_relationship_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `relatedproducts_product_id_foreign` (`product_id`),
  KEY `relatedproducts_product_relationship_id_foreign` (`product_relationship_id`),
  CONSTRAINT `relatedproducts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `relatedproducts_product_relationship_id_foreign` FOREIGN KEY (`product_relationship_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
BEGIN;
INSERT INTO `users` VALUES (1, 'admin', 'fede@lavacoders.com', '$2y$10$Pup2A1i5.76RvVWICdSE4.W2r/LBTyXqDsEQGtYHMJDyuBUkVoVk2', 'LfVSUi67tAqna0C6flpYGAfxXL5u6CaoqksASaS0JORMlKk57mW1sN3F8Nls', '2018-04-20 18:38:56', '2018-04-20 18:38:56');
COMMIT;

-- ----------------------------
-- Table structure for widgets
-- ----------------------------
DROP TABLE IF EXISTS `widgets`;
CREATE TABLE `widgets` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `type` int(11) NOT NULL DEFAULT '1',
  `btn_text` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(10) unsigned DEFAULT NULL,
  `position` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `show_prods` tinyint(1) NOT NULL DEFAULT '0',
  `features` tinyint(1) NOT NULL DEFAULT '0',
  `home` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `widgets_category_id_foreign` (`category_id`),
  CONSTRAINT `widgets_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of widgets
-- ----------------------------
BEGIN;
INSERT INTO `widgets` VALUES (3, 'Conocé nuestra línea y disfrutá del mundial', 'Experimentá la emoción de ver imágenes en la mejor definición y resolución. Accedé a lo mejor de Internet.', 1, 'Ver Todos', NULL, NULL, 3, 1, 0, 1, 0);
INSERT INTO `widgets` VALUES (4, 'Verdadera alta definición', '<p>Verdadera alta definición</p>\r\n<span>Hablamos de verdadera alta resolución. 4k es la abreviatura de de 4.000 píxeles (4096 x 2160 píxeles)</span>', 4, NULL, NULL, 14, 2, 1, 1, 0, 1);
INSERT INTO `widgets` VALUES (5, 'Box x 4', NULL, 3, NULL, NULL, NULL, 4, 1, 0, 1, 1);
INSERT INTO `widgets` VALUES (6, 'Banner', NULL, 2, NULL, NULL, NULL, 6, 1, 0, 0, 0);
INSERT INTO `widgets` VALUES (7, 'Lorem ipsum dolor sit amet, consectet', NULL, 7, NULL, NULL, NULL, 0, 1, 0, 0, 1);
INSERT INTO `widgets` VALUES (9, NULL, NULL, 1, NULL, NULL, NULL, 1, 1, 0, 0, 0);
INSERT INTO `widgets` VALUES (25, 'Widget de 3 video', NULL, 4, NULL, NULL, NULL, 7, 0, 0, 0, 0);
INSERT INTO `widgets` VALUES (26, 'Widget de imagen con 3 videos', NULL, 1, NULL, NULL, NULL, 8, 0, 0, 0, 0);
INSERT INTO `widgets` VALUES (27, NULL, NULL, 1, NULL, NULL, NULL, 9, 0, 0, 0, 0);
INSERT INTO `widgets` VALUES (28, NULL, NULL, 1, NULL, NULL, NULL, 10, 0, 0, 0, 0);
INSERT INTO `widgets` VALUES (29, NULL, NULL, 1, NULL, NULL, NULL, 11, 0, 0, 0, 0);
COMMIT;

-- ----------------------------
-- Table structure for widgets_media
-- ----------------------------
DROP TABLE IF EXISTS `widgets_media`;
CREATE TABLE `widgets_media` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `widget_id` int(10) unsigned NOT NULL,
  `source` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('image','video') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'image',
  `position` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitle` varbinary(200) DEFAULT NULL,
  `description` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `widgets_media_widget_id_foreign` (`widget_id`),
  CONSTRAINT `widgets_media_widget_id_foreign` FOREIGN KEY (`widget_id`) REFERENCES `widgets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=150 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of widgets_media
-- ----------------------------
BEGIN;
INSERT INTO `widgets_media` VALUES (23, 3, 'widgets/TIFO85MrRU8eNVid5OnM98uSn2SH0nXrB096vSFU.png', 'image', 1, NULL, NULL, 'Conocé nuestra línea y disfrutá del mundial', NULL, 'Experimentá la emoción de ver imágenes en la mejor definición y resolución. Accedé a lo mejor de Internet.', 'http://www.linkdelbanner.com');
INSERT INTO `widgets_media` VALUES (29, 6, 'widgets/bIPUXFqFmcuP69PpjfRZIjgyXpl2CO4BBbI3zye7.png', 'image', 0, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `widgets_media` VALUES (79, 7, 'widgets/IqINFGkBnpNJVvS1MnnHP4blW0lU2cbl4wEM3kJH.png', 'image', 1, NULL, NULL, 'Este es el texto ahora 1', NULL, 'Sabemos la importancia que le das a al comunicación. Nuestra línea está inspirada en vos y fue creada 100% pensando en tu comodidad.', 'http://www.google.com');
INSERT INTO `widgets_media` VALUES (80, 7, 'widgets/5DiwU29IuQZUJkZlCZY9S2FOSHKmtHr9StrofYij.png', 'image', 0, NULL, NULL, 'Tecnología al alcance de tu mano', NULL, 'Ahora podés: Atender el teléfono, desbloquear el reloj y navegar el menú mediante el movimiento de tu muñeca, gracias a la función Smart Gesture. Y más!', 'http://www.clarin.com.ar');
INSERT INTO `widgets_media` VALUES (87, 4, 'widgets/D9q2B3w5lq4Oa4xoqP8rERiHhu5yoXnPEHu3Z6gm.mp4', 'video', 2, NULL, NULL, NULL, NULL, NULL, 'https://www.youtube.com/watch?v=Fsql523bSj4');
INSERT INTO `widgets_media` VALUES (88, 4, 'widgets/tMqx8eiWsVXmNazhL17dbQdB3f4SUVyyAAMRKOgw.mp4', 'video', 3, NULL, NULL, NULL, NULL, NULL, 'https://www.youtube.com/watch?v=BxKCX-UvPrI&t=2s');
INSERT INTO `widgets_media` VALUES (89, 4, 'widgets/6845LOik2WZqOBjLWElbVBHeJ5s19XxxHjP5LWC7.mp4', 'video', 4, NULL, NULL, NULL, NULL, NULL, 'https://www.youtube.com/watch?v=B2EI65ZEqYQ');
INSERT INTO `widgets_media` VALUES (133, 5, NULL, 'video', 0, NULL, NULL, NULL, NULL, NULL, 'https://vimeo.com/channels/staffpicks/256386290');
INSERT INTO `widgets_media` VALUES (138, 28, NULL, 'image', 0, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `widgets_media` VALUES (139, 28, NULL, 'video', 1, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `widgets_media` VALUES (140, 28, NULL, 'video', 2, NULL, NULL, NULL, NULL, NULL, 'https://www.youtube.com/watch?v=B2EI65ZEqYQ');
INSERT INTO `widgets_media` VALUES (141, 28, NULL, 'video', 3, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `widgets_media` VALUES (142, 9, NULL, 'image', 0, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `widgets_media` VALUES (143, 9, NULL, 'image', 0, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `widgets_media` VALUES (144, 9, NULL, 'image', 1, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `widgets_media` VALUES (145, 9, NULL, 'image', 2, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `widgets_media` VALUES (146, 29, NULL, 'video', 0, NULL, NULL, 'Tecnología al alcance de tu mano', NULL, 'Ahora podés: Atender el teléfono, desbloquear el reloj y navegar el menú mediante el movimiento de tu muñeca, gracias a la función Smart Gesture. Y más!', NULL);
INSERT INTO `widgets_media` VALUES (147, 29, NULL, 'image', 1, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `widgets_media` VALUES (148, 29, NULL, 'image', 2, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `widgets_media` VALUES (149, 29, NULL, 'image', 3, NULL, NULL, NULL, NULL, NULL, NULL);
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
