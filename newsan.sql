/*
 Navicat Premium Data Transfer

 Source Server         : LOCAL
 Source Server Type    : MySQL
 Source Server Version : 50638
 Source Host           : localhost
 Source Database       : newsan

 Target Server Type    : MySQL
 Target Server Version : 50638
 File Encoding         : utf-8

 Date: 05/22/2018 10:55:28 AM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `attribute_category`
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
--  Table structure for `attribute_category_product`
-- ----------------------------
DROP TABLE IF EXISTS `attribute_category_product`;
CREATE TABLE `attribute_category_product` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `attribute_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `value` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `attribute_category_product_attribute_category_id_foreign` (`attribute_id`),
  KEY `attribute_category_product_product_id_foreign` (`product_id`),
  CONSTRAINT `attribute_category_product_attribute_category_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `attribute_category_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
--  Records of `attribute_category_product`
-- ----------------------------
BEGIN;
INSERT INTO `attribute_category_product` VALUES ('3', '2', '2', '100ms', null, null), ('4', '5', '2', 'Digital', null, null), ('6', '7', '2', 'test', null, null), ('7', '1', '8', '4K2K 3840x2160 px', null, null), ('8', '2', '8', '60hz', null, null), ('9', '9', '8', '8ms', null, null), ('10', '3', '8', 'HDMIx4 - USBx3', null, null), ('11', '4', '8', 'Si', null, null), ('12', '5', '8', 'Optica', null, null);
COMMIT;

-- ----------------------------
--  Table structure for `attributegroups`
-- ----------------------------
DROP TABLE IF EXISTS `attributegroups`;
CREATE TABLE `attributegroups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
--  Records of `attributegroups`
-- ----------------------------
BEGIN;
INSERT INTO `attributegroups` VALUES ('1', 'Pantalla', '2018-04-20 18:38:56', '2018-04-20 18:38:56'), ('2', 'Conectividad', '2018-04-20 18:38:56', '2018-04-20 18:38:56'), ('3', 'Audio', '2018-04-20 18:38:56', '2018-04-20 18:38:56'), ('4', 'Resolucion', '2018-04-24 15:20:08', '2018-04-24 15:20:08'), ('5', 'Aplicaciones', '2018-04-24 15:21:00', '2018-04-24 15:21:00'), ('6', 'aa', '2018-04-24 15:21:35', '2018-04-24 15:37:13'), ('7', 'Aspecto', '2018-04-25 12:41:54', '2018-04-25 12:41:54');
COMMIT;

-- ----------------------------
--  Table structure for `attributes`
-- ----------------------------
DROP TABLE IF EXISTS `attributes`;
CREATE TABLE `attributes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `attributegroup_id` int(10) unsigned DEFAULT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `attributes_attributegroup_id_foreign` (`attributegroup_id`),
  CONSTRAINT `attributes_attributegroup_id_foreign` FOREIGN KEY (`attributegroup_id`) REFERENCES `attributegroups` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
--  Records of `attributes`
-- ----------------------------
BEGIN;
INSERT INTO `attributes` VALUES ('1', '1', 'Resolucion', '2018-04-20 18:38:56', '2018-04-20 18:38:56'), ('2', '1', 'Tasa de refresco', '2018-04-20 18:38:56', '2018-04-20 18:38:56'), ('3', '2', 'Puertos', '2018-04-20 18:38:56', '2018-04-20 18:38:56'), ('4', '2', 'Bluetooth', '2018-04-20 18:38:56', '2018-04-20 18:38:56'), ('5', '3', 'Salida de Audio', '2018-04-20 18:38:56', '2018-04-20 18:38:56'), ('6', '3', 'Potencia de parlantes', '2018-04-20 18:38:56', '2018-04-24 15:48:54'), ('7', null, 'dsadas', '2018-04-24 15:55:13', '2018-04-24 15:55:13'), ('8', null, 'Frigorias', '2018-04-25 12:38:50', '2018-04-25 12:38:50'), ('9', null, 'Tiempo de respuesta', '2018-05-18 05:14:11', '2018-05-18 05:14:11');
COMMIT;

-- ----------------------------
--  Table structure for `brands`
-- ----------------------------
DROP TABLE IF EXISTS `brands`;
CREATE TABLE `brands` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
--  Records of `brands`
-- ----------------------------
BEGIN;
INSERT INTO `brands` VALUES ('1', 'Noblex', '2018-04-20 18:38:56', '2018-04-20 18:38:56');
COMMIT;

-- ----------------------------
--  Table structure for `categories`
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
  `banner` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_target` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `categories_feautured_product_foreign` (`feautured_product`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
--  Records of `categories`
-- ----------------------------
BEGIN;
INSERT INTO `categories` VALUES ('1', 'Raiz', null, '0', null, '0', '2018-04-20 18:38:56', '2018-04-20 18:38:56', null, '0', null, null, null, null, null, null), ('7', 'Smartphones', 'smartphones', '1', null, '1', '2018-04-20 19:09:44', '2018-05-18 03:23:38', null, '0', '4', null, null, 'categories/MBBfwmkXLRKMeQYy2ViREhDPjvoTVPxKFDFOGYzu.jpeg', null, null), ('8', 'Subcat', 'subcat', '7', null, '1', '2018-04-21 17:25:20', '2018-04-21 17:25:20', null, '0', null, null, null, null, null, null), ('9', 'E-reader', 'e-reader', '1', null, '1', '2018-04-21 17:59:49', '2018-04-23 23:47:19', null, '0', '3', null, null, null, null, null), ('10', 'Audio', 'audio', '1', 'categories/RPssm4MnUJ8WIYfPHiElaNIQ5Q3zNAL6E8oyMNyO.png', '1', '2018-04-21 18:00:01', '2018-04-25 18:26:17', null, '0', '1', null, null, null, null, null), ('11', 'TV', 'tv', '1', null, '1', '2018-04-21 18:00:15', '2018-04-24 04:40:54', null, '0', '0', 0x54656c657669736f726573, null, null, null, null), ('12', 'Tablets', 'tablets', '1', 'categories/IkjPEVlhQtXrFdvFGNzhzPpqqmRh4C8XQS5kMqT0.png', '1', '2018-04-21 18:00:29', '2018-05-02 14:36:20', 'DI49X6500', '0', '6', 0x5461626c657473207061726120766f73, 'Las mejores tablets para disfrutar.', null, null, null), ('13', 'Otros', 'otros', '1', null, '1', '2018-04-21 18:00:39', '2018-04-23 23:47:44', null, '0', '7', null, null, null, null, null), ('14', 'Smart 4k', 'smart-4k', '11', 'categories/QIK6hWtIgNMariw3GYSp6pVHjgwi942TXBj8p7UD.png', '1', '2018-04-21 18:05:00', '2018-05-02 16:51:58', 'DI49X6500', '1', null, 0x4d7563686f206dc3a1732071756520756e2074656c657669736f72, 'Experimentá la emoción de ver imágenes en la mejor definición y resolución. Accedé a lo mejor de Internet.', 'categories/EyVXK2na1yshXChgmQQCavfSLMSYFRcLgaAMnn9F.png', 'http://www.google.com.ar', '_blank'), ('15', 'Smart TV', 'smart-tv', '11', 'categories/VAH6LwqZy1MUeLWuAznUIUHMVH5VsBik8cUFkLwj.png', '1', '2018-04-21 18:05:16', '2018-04-24 04:44:57', 'DI49X6500', '0', null, 0x416c746120646566696e696369c3b36e207920656e74726574656e696d69656e746f, 'Disfrutá de la más alta calidad de imagen, conectate a Internet y accedé a un mundo de aplicaciones y herramientas.', null, null, null), ('17', 'Led TV', 'led-tv', '11', null, '1', '2018-04-22 12:58:02', '2018-05-17 17:43:43', null, '1', null, null, null, null, null, null), ('19', 'Aires Acondicionados', 'aires-acondicionados', '1', null, '1', '2018-04-23 23:43:20', '2018-04-23 23:47:07', null, '0', '2', null, null, null, null, null), ('20', 'Smartwatch', 'smartwatch', '1', null, '1', '2018-04-23 23:47:36', '2018-05-18 03:21:49', null, '0', '5', null, null, 'categories/Eulu2qxRHMFH0Z5R4kt7vUW4y5xRLzgrV0kczf8c.jpeg', null, null), ('21', '4 way Slim', '4-way-slim', '10', null, '1', '2018-04-23 23:56:53', '2018-04-23 23:56:53', null, '0', null, null, null, null, null, null), ('22', 'Mirror', 'mirror', '10', null, '1', '2018-04-23 23:57:01', '2018-04-23 23:57:01', null, '0', null, null, null, null, null, null), ('23', 'Smart Inverter', 'smart-inverter', '10', null, '1', '2018-04-23 23:57:08', '2018-04-23 23:57:08', null, '0', null, null, null, null, null, null), ('24', 'Camara Deportiva', 'camara-deportiva', '13', null, '1', '2018-04-23 23:57:44', '2018-04-23 23:57:44', null, '0', null, null, null, null, null, null), ('25', 'Cargador Portatil', 'cargador-portatil', '13', null, '1', '2018-04-23 23:57:53', '2018-04-23 23:57:53', null, '0', null, null, null, null, null, null), ('26', 'Computacion', 'computacion', '13', null, '1', '2018-04-23 23:58:01', '2018-04-23 23:58:01', null, '0', null, null, null, null, null, null), ('27', 'DVD', 'dvd', '13', null, '1', '2018-04-23 23:58:12', '2018-04-23 23:58:12', null, '0', null, null, null, null, null, null), ('28', 'Telefonia Fija', 'telefonia-fija', '13', null, '1', '2018-04-23 23:58:20', '2018-04-23 23:58:20', null, '0', null, null, null, null, null, null);
COMMIT;

-- ----------------------------
--  Table structure for `category_customer`
-- ----------------------------
DROP TABLE IF EXISTS `category_customer`;
CREATE TABLE `category_customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `category_customer`
-- ----------------------------
BEGIN;
INSERT INTO `category_customer` VALUES ('1', '2', '10'), ('3', '2', '19'), ('4', '2', '12'), ('5', '3', '9');
COMMIT;

-- ----------------------------
--  Table structure for `category_feature`
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
--  Records of `category_feature`
-- ----------------------------
BEGIN;
INSERT INTO `category_feature` VALUES ('1', '14', '5', null, null), ('4', '14', '4', null, null), ('5', '14', '7', null, null), ('6', '15', '5', null, null), ('7', '15', '6', null, null), ('8', '15', '4', null, null), ('9', '12', '3', null, null), ('10', '12', '1', null, null), ('11', '12', '4', null, null);
COMMIT;

-- ----------------------------
--  Table structure for `category_info_interes`
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
--  Records of `category_info_interes`
-- ----------------------------
BEGIN;
INSERT INTO `category_info_interes` VALUES ('1', '14', '¿Qué es 4k?', 'http://www.google.com'), ('2', '14', '¿Cómo funciona XMotion?', 'http://www.sarasa.net'), ('3', '14', '¿Que aplicaciones traen los equipos?', 'http://www.sopososo.net'), ('5', '15', 'Esto tiene que ver', 'http://www.unlink.com');
COMMIT;

-- ----------------------------
--  Table structure for `contacts`
-- ----------------------------
DROP TABLE IF EXISTS `contacts`;
CREATE TABLE `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `contacts`
-- ----------------------------
BEGIN;
INSERT INTO `contacts` VALUES ('1', '1', 'Damian', 'Lobalzo', 'dlobalzo@gmail.com', 'Prueba', '2018-05-15 15:35:36', '2018-05-15 15:35:36'), ('2', '1', 'Damian', 'Lobalzo', 'dlobalzo@gmail.com', 'Prueba', '2018-05-17 16:38:47', '2018-05-17 16:38:47');
COMMIT;

-- ----------------------------
--  Table structure for `customers`
-- ----------------------------
DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `gender` enum('M','F') NOT NULL,
  `birth` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `customers`
-- ----------------------------
BEGIN;
INSERT INTO `customers` VALUES ('2', 'Damian', 'Lobalzo', 'dlobalzo@gmail.com', '$2y$10$XA0dQ2lAhTqXD2JuQtJWG.dhGnox0XE4P6c7RHGnZkYC1jEp9KhjW', '8Mx5exWPQ4K4SgvIUoCZie4bOiQTGZo5a0tOZkDxYCI2EdegenXQSXQy7cUU', 'M', '1982-11-01', '2018-05-18 03:17:56', '2018-05-10 03:37:37'), ('3', 'Damian', 'Lobalzo', 'dlobalzo@id4you.com', '$2y$10$kvmWbev/D4xzTAsN8rwqJ.RyHXanXIN1pDYcGABKIbExrOd0IKnme', null, 'M', '1982-11-01', '2018-05-16 15:45:10', '2018-05-16 15:45:10');
COMMIT;

-- ----------------------------
--  Table structure for `email_subjects`
-- ----------------------------
DROP TABLE IF EXISTS `email_subjects`;
CREATE TABLE `email_subjects` (
  `subject_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`subject_id`,`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `email_subjects`
-- ----------------------------
BEGIN;
INSERT INTO `email_subjects` VALUES ('1', 'dlobalzo@gmail.com', '2018-05-15 14:48:04', '2018-05-15 14:48:04'), ('2', 'dlobalzo@id4you.com', '2018-05-15 14:48:17', '2018-05-15 14:48:17');
COMMIT;

-- ----------------------------
--  Table structure for `feature_product`
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
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
--  Records of `feature_product`
-- ----------------------------
BEGIN;
INSERT INTO `feature_product` VALUES ('13', '5', '2', '2018-04-26 15:32:14', '2018-04-26 15:32:14'), ('14', '3', '2', '2018-04-26 15:32:14', '2018-04-26 15:32:14'), ('15', '2', '2', '2018-04-26 15:32:14', '2018-04-26 15:32:14'), ('16', '3', '4', '2018-04-26 15:32:31', '2018-04-26 15:32:31'), ('17', '2', '4', '2018-04-26 15:32:31', '2018-04-26 15:32:31'), ('18', '1', '4', '2018-04-26 15:32:31', '2018-04-26 15:32:31'), ('19', '6', '5', '2018-05-02 14:07:51', '2018-05-02 14:07:51'), ('20', '1', '2', '2018-05-18 05:20:26', '2018-05-18 05:20:26'), ('21', '1', '8', '2018-05-18 13:54:19', '2018-05-18 13:54:19'), ('22', '12', '8', '2018-05-18 13:54:19', '2018-05-18 13:54:19'), ('23', '13', '8', '2018-05-18 13:54:19', '2018-05-18 13:54:19'), ('24', '14', '8', '2018-05-18 13:54:19', '2018-05-18 13:54:19');
COMMIT;

-- ----------------------------
--  Table structure for `features`
-- ----------------------------
DROP TABLE IF EXISTS `features`;
CREATE TABLE `features` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_featured` varbinary(500) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
--  Records of `features`
-- ----------------------------
BEGIN;
INSERT INTO `features` VALUES ('1', 'Play & Share', 'Description 1', null, null, '2018-04-20 18:38:57', '2018-04-20 18:38:57'), ('2', 'HDMI', 'Description 2', null, null, '2018-04-20 18:38:57', '2018-04-20 18:38:57'), ('3', 'Bluetooth', 'Description 3', 'features/NiIzRD06eJgTsViG5STu9m9b5nIry9488fHH4Mfj.png', 0x66656174757265732f59573235694872594f3878596957416d324b4e366b4d424e6d5868523965356e64466435745759702e706e67, '2018-04-20 18:38:57', '2018-05-02 15:09:01'), ('4', 'TDA', 'Description 4', null, null, '2018-04-20 18:38:57', '2018-04-20 18:38:57'), ('5', '4K', 'Esta es la descripcion del 4K.', 'features/UTR7mYynqCG7ORqEcQLb0E5VKsZrHpazS6KsBZRN.png', null, '2018-04-24 02:30:00', '2018-04-24 02:30:00'), ('6', 'Sound', 'Descripcion de sound', 'features/rQSNjQ40995BTTuQ5nKVzyBHogaQN67AbSPS1dVh.png', null, '2018-04-24 03:22:55', '2018-04-24 03:22:55'), ('7', 'XMotion', null, 'features/bKqMJXSCk9C0ETn4c7BPYhrWR5rXx4jgHhvvmg9c.png', null, '2018-04-24 03:28:06', '2018-04-24 03:28:06'), ('10', 'sad', null, null, null, '2018-04-24 15:11:33', '2018-04-24 15:11:33'), ('11', 'dsadas', 'dsad', null, null, '2018-05-16 13:49:46', '2018-05-16 13:49:46'), ('12', ' HDMI / USB / VGA', null, null, null, '2018-05-18 05:14:11', '2018-05-18 05:14:11'), ('13', ' Bluetooth', null, null, null, '2018-05-18 05:14:11', '2018-05-18 05:14:11'), ('14', ' TDA', null, null, null, '2018-05-18 05:14:11', '2018-05-18 05:14:11');
COMMIT;

-- ----------------------------
--  Table structure for `migrations`
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
--  Records of `migrations`
-- ----------------------------
BEGIN;
INSERT INTO `migrations` VALUES ('1', '2014_10_12_000000_create_users_table', '1'), ('2', '2014_10_12_100000_create_password_resets_table', '1'), ('3', '2018_04_12_153304_create_categories_table', '1'), ('4', '2018_04_13_164923_create_brands_table', '1'), ('5', '2018_04_13_165531_create_products_table', '1'), ('6', '2018_04_13_170807_create_products_media_table', '1'), ('7', '2018_04_13_171511_create_attributegroups_table', '1'), ('8', '2018_04_13_174708_create_attributes_table', '1'), ('9', '2018_04_13_175619_create_attribute_category_table', '1'), ('10', '2018_04_13_180301_create_attribute_category_product_table', '1'), ('11', '2018_04_16_200605_create_relatedproducts_table', '1'), ('12', '2018_04_19_161928_create_features_table', '1'), ('13', '2018_04_19_164048_create_category_feature_table', '1'), ('14', '2018_04_19_182333_create_feature_product_table', '1'), ('16', '2018_04_21_182755_add_field_feautured_product_to_categories', '2'), ('19', '2018_04_21_185442_create_info_interes_table', '3'), ('20', '2018_04_22_005337_add_menu_field_to_categories', '4'), ('23', '2018_04_22_033120_create_widgets_table', '5'), ('24', '2018_04_22_034044_create_widgets_media_table', '5');
COMMIT;

-- ----------------------------
--  Table structure for `newsletters`
-- ----------------------------
DROP TABLE IF EXISTS `newsletters`;
CREATE TABLE `newsletters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `newsletters`
-- ----------------------------
BEGIN;
INSERT INTO `newsletters` VALUES ('1', 'Damian', 'dlobalzo@gmail.com', '2018-05-05 04:43:42', '2018-05-05 04:43:42'), ('2', 'Dasdas', 'dada@dad.com', '2018-05-08 07:54:43', '2018-05-08 07:54:43'), ('3', 'Damian', 'dlobalzo@id4you.com', '2018-05-10 03:38:56', '2018-05-10 03:38:56');
COMMIT;

-- ----------------------------
--  Table structure for `pages`
-- ----------------------------
DROP TABLE IF EXISTS `pages`;
CREATE TABLE `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `url` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `visible` tinyint(4) NOT NULL,
  `footer` tinyint(4) NOT NULL,
  `template_id` int(11) NOT NULL,
  `position` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `pages`
-- ----------------------------
BEGIN;
INSERT INTO `pages` VALUES ('1', 'Acerca de Noblex', 'acerca-de-noblex', '<div class=\"intro\">\r\n<h2 class=\"section_text\">Noblex es una de las m&aacute;s reconocidas marcas de origen nacional. Todos sus procesos se vieron siempre cruzados por un gran compromiso con la calidad y la innovaci&oacute;n tecnol&oacute;gica.</h2>\r\n<img src=\"../../../assets/imgs/imagenes/institucional.png\" alt=\"Lo mejor de la tecnolog&iacute;a es compartirla\" width=\"697\" height=\"184\" />\r\n<p>A&ntilde;o tras a&ntilde;o desde 1935, la marca mantuvo siempre su nivel de excelencia y su amplia y eficiente red de distribuci&oacute;n comercial y servicios t&eacute;cnicos. De esta manera no s&oacute;lo sostuvo, sino que increment&oacute; el &eacute;xito en cada lanzamiento de sus nuevos productos. Noblex ofrece al consumidor una <strong>amplia gama de productos</strong> ideados para brindar bienestar y comodidad. Desde sus legendarios <strong>televisores</strong>, radios y combinados de sonido que han brillado en miles de hogares argentinos, hasta los m&aacute;s actuales <strong>DVD\'s</strong>, <strong>acondicionadores de aire, microondas y reproductores port&aacute;tiles</strong>.</p>\r\n</div>\r\n<div class=\"institucional_info\">\r\n<div class=\"item\">\r\n<p><strong>78 a&ntilde;os</strong> en los hogares de los argentinos.</p>\r\n</div>\r\n<div class=\"item\">\r\n<p><strong>+ 5000</strong> puntos de venta<br />en todo el pa&iacute;s.</p>\r\n</div>\r\n<div class=\"item\">\r\n<p><strong>1.500.000</strong> Radio Noblex Carina,<br />la m&aacute;s vendida en Argentina.</p>\r\n</div>\r\n<div class=\"item\">\r\n<p><strong>65\"</strong> pulgadas, tienen<br />los nuevos LED TV.</p>\r\n</div>\r\n</div>\r\n<div class=\"text_block\">\r\n<div class=\"image\"><img src=\"../../../assets/imgs/imagenes/institucional_2.png\" alt=\"Noblex\" width=\"342\" height=\"206\" /></div>\r\n<div class=\"text\">\r\n<h3>Logros</h3>\r\n<p>Noblex lleva <strong>78 a&ntilde;os creando bienestar en los hogares argentinos</strong>, lo que la convierte, sin lugar a dudas, en una de las marcas con mayor historia y trayectoria del pa&iacute;s. Pero est&aacute; claro que el tiempo de permanencia no ser&iacute;a nada si no fuera porque Noblex, adem&aacute;s, logr&oacute; lo que toda marca sue&ntilde;a. Esto es: <strong>ganarse el coraz&oacute;n y la confianza de sus consumidores</strong>. Y esto es as&iacute;, porque a lo largo de toda su vida como marca, Noblex se ha esforzado como ninguna otra en ofrecer el mayor valor en forma de productos-servicios, de tecnolog&iacute;a y dise&ntilde;o avanzados, con una alta confiabilidad operativa. Esa es la base para lograr la fuerte y c&aacute;lida relaci&oacute;n que Noblex tiene con sus consumidores.</p>\r\n</div>\r\n</div>\r\n<div class=\"text_block\">\r\n<div class=\"text\">\r\n<h3>Historia</h3>\r\n<p>A <strong>mediados de 1935 naci&oacute; Nobleza Radio</strong>, empresa pionera en la fabricaci&oacute;n de radios en la Argentina. Su fundador fue <strong>Armando Pla, y su primer producto fabricado la radio el&eacute;ctrica Noblesse</strong>, que logr&oacute; r&aacute;pidamente una fuerte aceptaci&oacute;n a nivel nacional. Diez a&ntilde;os despu&eacute;s lleg&oacute; un nuevo &eacute;xito: se lanz&oacute; al mercado el Combinado Nobleza. Pero la verdadera revoluci&oacute;n llegar&iacute;a con la aparici&oacute;n de sus primeros televisores blanco y negro y la primera radio a transistores del pa&iacute;s: el receptor TS 8. Sobre esa base se desarrolla y se fabrica el mayor &eacute;xito de ventas de radio de la Argentina: <strong>la radio Noblex Carina</strong>. Corr&iacute;an los a&ntilde;os 60, y los cambios tecnol&oacute;gicos se aceleraban cada vez m&aacute;s. Noblex comienza a invertir fuerte en investigaci&oacute;n y desarrollo de nuevos productos. Con ese nuevo impulso nace Noblex Micro 9, el primer televisor transistorizado port&aacute;til.</p>\r\n</div>\r\n<div class=\"image\"><img src=\"../../../assets/imgs/imagenes/institucional_3.png\" alt=\"Noblex Carina - El mayor &eacute;xito de ventas\" width=\"342\" height=\"206\" /></div>\r\n</div>', '1', '1', '1', '0', '2018-05-16 12:05:12', '2018-05-16 15:05:12'), ('2', 'Legales', 'legales', '<p>Al ingresar al Web Site de NOBLEX ARGENTINA S.A.. (En adelante NOBLEX ARGENTINA S.A.) Usted reconoce y acepta los siguientes t&eacute;rminos y condiciones. De no concordar con dichos t&eacute;rminos NO UTILICE este site. La informaci&oacute;n legal se aplica a todas las p&aacute;ginas de NOBLEX ARGENTINA S.A. Web Site, a menos que est&eacute; expl&iacute;citamente identificado lo contrario en alguna p&aacute;gina espec&iacute;fica.</p>\r\n<h2>Ingrese bajo su propia responsabilidad</h2>\r\n<p>Al ingresar a este sitio usted reconoce y acepta que su uso es bajo su responsabilidad y que ninguna de las partes involucradas en la creaci&oacute;n, producci&oacute;n de este Web Site, es responsable de cualquier perjuicio directo, incidental, consecuente, indirecto o de p&eacute;rdida, costo o gasto alguno (incluyendo pero no limit&aacute;ndose a honorarios legales, peritos o cualquier otro desembolso) que pueda surgir directa o indirectamente a trav&eacute;s de su acceso, uso o browsing del site o a trav&eacute;s del downloading de material, textos, datos, im&aacute;genes, videos o audios de este site, incluyendo pero no limitado a lo causado por un virus, defectos, acci&oacute;n humana o inacci&oacute;n del sistema inform&aacute;tico, l&iacute;nea telef&oacute;nica, hardware, software, errores en el programa, fallas o demoras en transmisiones o en conexiones con la red.</p>\r\n<h2>No existe garant&iacute;a sobre contenidos</h2>\r\n<p>Informaci&oacute;n o materiales: aunque las especificaciones, caracter&iacute;sticas, ilustraciones, equipos y otra informaci&oacute;n contenida en el site se basan en informaci&oacute;n actualizada, y a&uacute;n cuando NOBLEX ARGENTINA S.A. se esfuerza por asegurar que todo el material del site sea correcto, no podemos garantizar su precisi&oacute;n.</p>\r\n<p>Todo contenido, informaci&oacute;n y material contenido en este site es provisto &ldquo;tal cual es&rdquo;, sin garant&iacute;a alguna, ya sea expresa o impl&iacute;cita, incluyendo pero no limitados a la garant&iacute;a impl&iacute;cita de comercializaci&oacute;n, aptitud para un prop&oacute;sito determinado.</p>\r\n<p>Los copyrights pertenecen a NOBLEX ARGENTINA S.A.:NOBLEX ARGENTINA S.A. es propietario del copyright del site, as&iacute; como tambi&eacute;n del dominio, y ninguna secci&oacute;n de &eacute;stos, incluyendo pero no limitados a texto, audio o video podr&aacute; ser utilizada en este sentido sin el consentimiento por escrito de NOBLEX ARGENTINA S.A. a menos que as&iacute; sea indicado. Sin renunciar a los derechos mencionados usted puede bajar una copia del material en este site s&oacute;lo para su uso personal y no comercial, siempre que no borre o modifique cualquier copyright, marca o notificaci&oacute;n de propiedad. Toda modificaci&oacute;n, reenv&iacute;o o uso de este material en este site con cual fuese el prop&oacute;sito, constituye una violaci&oacute;n a los derechos legales de NOBLEX ARGENTINA S.A.</p>\r\n<p>El nombre NOBLEX ARGENTINA S.A., los logos y marcas pertenecen a NOBLEX ARGENTINA S.A.:Al ingresar a este sitio usted reconoce y acepta que el nombre, logo y marca contenidos en este site son propiedad o licencia de NOBLEX ARGENTINA S.A. y no podr&aacute;n utilizarlos sin su previa autorizaci&oacute;n por escrito. NOBLEX ARGENTINA S.A. har&aacute; cumplir su derecho de propiedad intelectual, siendo los sonidos, gr&aacute;ficos, tablas, textos, videos, informaci&oacute;n o im&aacute;genes de lugares o personas propiedad de NOBLEX ARGENTINA S.A., estando expresamente prohibida su utilizaci&oacute;n salvo previa autorizaci&oacute;n escrita de NOBLEX ARGENTINA S.A.. El uso de estos materiales est&aacute; prohibido a menos que estuviese espec&iacute;ficamente previsto en este site. El uso desautorizado de estos materiales ser&aacute; motivo de demanda por da&ntilde;os y perjuicios, incluyendo pero no limitados a aquellos relacionados con la violaci&oacute;n de marcas, copyrights, derechos de privacidad o publicidad.</p>\r\n<p>Uso de informaci&oacute;n son confidencialidad</p>\r\n<p>Al ingresar a este site usted reconoce y acepta que toda comunicaci&oacute;n, datos o material que transmita a este site, de cualquier forma y con cualquier motivo, no ser&aacute; considerada confidencial o patentada, salvo que sea indicado en forma expresa lo contrario. M&aacute;s a&uacute;n, tambi&eacute;n reconoce y acepta que toda idea, concepto, t&eacute;cnicas, procedimientos, m&eacute;todos, sistemas, dise&ntilde;os, planes, tablas u otro material que transmita a este site importa la expresa autorizaci&oacute;n a NOBLEX ARGENTINA S.A. para su utilizaci&oacute;n en cualquier lugar, momento y con cualquier prop&oacute;sito.</p>\r\n<h2>Conducta ilegal</h2>\r\n<p>No env&iacute;e o transmita a este site material pornogr&aacute;fico, obsceno, profano, difamatorio, injurioso, amenazante, ilegal u otro que pueda alentar o constituir conductas consideradas ofensa criminal y/o que puedan generar responsabilidad civil. No obstante NOBLEX ARGENTINA S.A. u otras partes involucradas en la creaci&oacute;n, producci&oacute;n o prestaci&oacute;n de este site pueden monitorear o revisar transmisiones, env&iacute;os, discusiones o chats, NOBLEX ARGENTINA S.A. y todas las partes involucradas en la creaci&oacute;n, producci&oacute;n o prestaci&oacute;n de este site no asumen responsabilidad u obligaci&oacute;n alguna que pueda surgir del contenido incluyendo pero no limitados a reclamos de difamaci&oacute;n, calumnias, injurias, obscenidad, pornograf&iacute;a, o mala interpretaci&oacute;n.<br />Hiperlinks</p>\r\n<p>&nbsp;</p>\r\n<p>Aunque este site pueda estar ligado a otros sites, NOBLEX ARGENTINA S.A. no realiza directa o indirectamente cualquier aprobaci&oacute;n, asociaci&oacute;n, auspicio, promoci&oacute;n o afiliaci&oacute;n con el site en cuesti&oacute;n a menos que est&eacute; espec&iacute;ficamente establecido. Al ingresar a este site usted reconoce y acepta que NOBLEX ARGENTINA S.A. no haya revisado todos los sites ligados a &eacute;ste y que no sea responsable del contenido de las p&aacute;ginas fuera del site o de cualquier otro site ligado a &eacute;ste. El linking a cualquier p&aacute;gina fuera del site u otros sites corre por su propia responsabilidad.</p>\r\n<h2>Revisi&oacute;n de esta p&aacute;gina</h2>\r\n<p>NOBLEX ARGENTINA S.A. se reserva el derecho a revisar esta informaci&oacute;n legal en cualquier momento y por cualquier motivo, como as&iacute; tambi&eacute;n el derecho a realizar modificaciones dentro del site cuando lo considere necesario, a su libre arbitrio, sin necesidad de notificaci&oacute;n alguna. Al ingresar a este site usted reconoce y acepta que la p&aacute;gina puede estar sujeta a dichas revisiones. Sugerimos visitar peri&oacute;dicamente esta p&aacute;gina del site para revisar dichos t&eacute;rminos y condiciones.</p>\r\n<p>SI USTED NO EST&Aacute; DE ACUERDO CON ESTOS T&Eacute;RMINOS, LE SUGERIMOS NO UTILIZAR ESTE SITIO.</p>', '1', '1', '2', '1', '2018-05-16 12:05:12', '2018-05-16 15:05:12');
COMMIT;

-- ----------------------------
--  Table structure for `password_resets`
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
--  Table structure for `products`
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sku` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varbinary(200) DEFAULT NULL,
  `tag` varbinary(3) DEFAULT NULL,
  `brand_id` int(10) unsigned NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `manual` varbinary(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_brand_id_foreign` (`brand_id`),
  KEY `products_category_id_foreign` (`category_id`),
  KEY `products_sku_unique` (`sku`) USING BTREE,
  CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
--  Records of `products`
-- ----------------------------
BEGIN;
INSERT INTO `products` VALUES ('2', 'DI49X6500', 'Tv Noblex 32\'', null, 0x4e4557, '1', '14', 'LED TV Smart 65\" Full UHD', 'Conectividad para todos tus dispositivos 4K2K (3840 x 2160 pixeles) Bluetooth', '1', '1', null, '2018-04-22 01:54:47', '2018-04-26 14:56:11'), ('4', '4234324', 'LED TV Smart 49″ 4K UHD', null, '', '1', '14', 'adsa', 'fdsfds', '1', '1', null, '2018-04-25 18:08:27', '2018-05-18 13:07:37'), ('5', 'TETE001', 'Test', null, 0x323022, '1', '14', 'sarasa', 'dsadsa', '0', '1', 0x70726f647563746f732f53667172734a6f76724f637a4279735041596b42687930636b747773576562744d514643384745522e706466, '2018-05-02 14:07:51', '2018-05-18 13:07:44'), ('8', 'DA65X6500X', 'LED TV Smart 65\" Full UHD', 0x6c65642d74762d736d6172742d36352d70756c67616461732d66756c6c2d756864, 0x363522, '1', '17', 'Más Smart, más diversión.', 'Conectividad para todos tus dispositivos 4K2K (3840x2160 pixels). Bluetooth.', '0', '1', null, '2018-05-18 13:54:19', '2018-05-18 13:54:19');
COMMIT;

-- ----------------------------
--  Table structure for `products_media`
-- ----------------------------
DROP TABLE IF EXISTS `products_media`;
CREATE TABLE `products_media` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(10) unsigned NOT NULL,
  `source` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('image','document','image_featured','image_featured_background','image_thumb') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'image',
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `position` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_media_product_id_foreign` (`product_id`),
  CONSTRAINT `products_media_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
--  Records of `products_media`
-- ----------------------------
BEGIN;
INSERT INTO `products_media` VALUES ('17', '2', 'productos/destacada.png', 'image_featured', '0', '1', '2018-04-25 03:09:01', '2018-04-25 03:09:01'), ('18', '2', 'productos/bg_2.png', 'image_featured_background', '0', '1', '2018-04-25 03:09:18', '2018-04-25 03:09:18'), ('19', '2', 'productos/J75cBPI1aXT3HzJEG41Opb6kJfKkAf4b1TFmNJdl.png', 'image', '0', '1', '2018-04-25 03:14:58', '2018-04-25 03:14:58'), ('20', '2', 'productos/FMX1g5yzPrV4MDRCGALL2Up9jS4OLFO3DQzcJnIJ.png', 'image', '0', '1', '2018-04-25 04:06:00', '2018-04-25 04:06:00'), ('21', '2', 'productos/cXWGEVIUNLWQXLzO3hYgvOGPqx1AqFJHgZQnXEwH.png', 'image', '0', '1', '2018-04-25 04:06:08', '2018-04-25 04:06:08'), ('22', '2', 'productos/CWbFcnd4SVsIp9Lvan4EwJQc0x4V4NJaV3HHvnbp.png', 'image_thumb', '0', '1', '2018-04-25 04:06:15', '2018-04-25 04:06:15'), ('23', '4', 'productos/banner-tv.png', 'image_featured', '0', '1', '2018-04-25 18:25:25', '2018-04-25 18:25:25'), ('40', '8', 'productos/product_1.png', 'image_thumb', '0', '1', '2018-05-18 13:54:19', '2018-05-18 13:54:19');
COMMIT;

-- ----------------------------
--  Table structure for `relatedproducts`
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
--  Table structure for `sectionproducts`
-- ----------------------------
DROP TABLE IF EXISTS `sectionproducts`;
CREATE TABLE `sectionproducts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(10) unsigned NOT NULL,
  `position` tinyint(255) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `source` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alignment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sectionproducts_product_id_foreign` (`product_id`),
  CONSTRAINT `sectionproducts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
--  Records of `sectionproducts`
-- ----------------------------
BEGIN;
INSERT INTO `sectionproducts` VALUES ('1', '2', '1', 'aaa', 'bbb', 'ccc', 'sectionproducts/qQL6RbSRiDk5vK9iO59m3lkgw7B7u9Ud2g1MWEpx.png', 'derecha', '2018-04-24 22:41:25', '2018-04-24 22:41:25');
COMMIT;

-- ----------------------------
--  Table structure for `story_tag`
-- ----------------------------
DROP TABLE IF EXISTS `story_tag`;
CREATE TABLE `story_tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `story_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `story_id` (`story_id`),
  KEY `tag_id` (`tag_id`),
  CONSTRAINT `story_id` FOREIGN KEY (`story_id`) REFERENCES `stories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tag_id` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `subjects`
-- ----------------------------
DROP TABLE IF EXISTS `subjects`;
CREATE TABLE `subjects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(80) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `subjects`
-- ----------------------------
BEGIN;
INSERT INTO `subjects` VALUES ('1', 'Atención al cliente', '2018-05-15 14:48:04', '2018-05-15 14:48:04'), ('2', 'Ventas Corporativas', '2018-05-15 14:48:17', '2018-05-15 14:48:17');
COMMIT;

-- ----------------------------
--  Table structure for `tags`
-- ----------------------------
DROP TABLE IF EXISTS `tags`;
CREATE TABLE `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `tags`
-- ----------------------------
BEGIN;
INSERT INTO `tags` VALUES ('1', 'testa', '2018-05-10 02:11:13', '2018-05-10 05:11:13'), ('2', 'dsdsad', '2018-05-16 14:49:39', '2018-05-16 14:49:39');
COMMIT;

-- ----------------------------
--  Table structure for `templates`
-- ----------------------------
DROP TABLE IF EXISTS `templates`;
CREATE TABLE `templates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `reference` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `templates`
-- ----------------------------
BEGIN;
INSERT INTO `templates` VALUES ('1', 'Institucional', 'institucional'), ('2', 'Legales', 'legales');
COMMIT;

-- ----------------------------
--  Table structure for `themes`
-- ----------------------------
DROP TABLE IF EXISTS `themes`;
CREATE TABLE `themes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `themes`
-- ----------------------------
BEGIN;
INSERT INTO `themes` VALUES ('2', 'Noticias', '2018-05-10 05:26:17', '2018-05-10 05:26:17'), ('3', 'Lanzamientos', '2018-05-10 05:26:22', '2018-05-10 05:26:22');
COMMIT;

-- ----------------------------
--  Table structure for `stories`
-- ----------------------------
DROP TABLE IF EXISTS `stories`;
CREATE TABLE `stories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `url` varchar(200) NOT NULL,
  `subtitle` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `date` date DEFAULT NULL,
  `visible` tinyint(4) NOT NULL,
  `theme_id` int(11) NOT NULL,
  `image` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` tinyint(11) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
--  Records of `users`
-- ----------------------------
BEGIN;
INSERT INTO `users` VALUES ('1', 'admin', 'dlobalzo@id4you.com', '$2y$10$3mxkK6E6LVFt0CGgNGxFZe0Fbjq8DbuzJBbqmexjSrBk5HAmt4.SW', '1', 'T55Y3bakSvcTW0kvH9S4Ag5k6hcoG7Em7yfgnDwOMEc7D4cR9xa5GpT3IM4V', '2018-04-20 18:38:56', '2018-05-15 15:43:26'), ('2', 'Usuario Normal', 'dlobalzo@gmail.com', '$2y$10$Yf9dkQMoYpNwGyIHdJEjsOvPXKAWDDE9mZhMzNrfJwsO9892TdMWy', '0', 'hIyMrNoXOLksrNi32uUYqliMTAMEQ6eVHTCaEnNzGYiS4tcl8PuOK5vfCWwF', '2018-05-15 16:12:15', '2018-05-15 16:12:15');
COMMIT;

-- ----------------------------
--  Table structure for `widgets`
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
  `always` tinyint(4) NOT NULL,
  `metadata` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `widgets_category_id_foreign` (`category_id`),
  CONSTRAINT `widgets_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
--  Records of `widgets`
-- ----------------------------
BEGIN;
INSERT INTO `widgets` VALUES ('36', 'Smartwatch', null, '1', null, null, '20', '0', '1', '0', '0', '1', '0', null), ('37', 'Smart TV', null, '3', null, null, '14', '2', '1', '1', '0', '1', '0', null), ('38', 'Banner Arg', null, '2', null, null, null, '7', '1', '0', '0', '1', '1', null), ('39', null, null, '7', null, null, null, '0', '1', '0', '0', '1', '0', null), ('40', 'TV Mundial', null, '8', null, null, '14', '1', '1', '0', '1', '1', '0', null), ('41', 'Promobox Mercado Libre', null, '5', null, null, null, '3', '1', '0', '0', '1', '0', null), ('42', 'Promobox Tablets', null, '5', null, null, '12', '4', '1', '0', '0', '1', '0', null), ('43', 'Promobox Headphones', null, '5', null, null, '26', '6', '0', '0', '0', '0', '0', null), ('44', 'Promobox E-Reader', null, '5', null, null, '9', '5', '1', '0', '0', '0', '0', null), ('45', 'Test promobox', null, '5', null, null, '7', '8', '1', '0', '0', '1', '0', null);
COMMIT;

-- ----------------------------
--  Table structure for `widgets_media`
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
  `description` text COLLATE utf8mb4_unicode_ci,
  `link` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_target` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT '_self',
  PRIMARY KEY (`id`),
  KEY `widgets_media_widget_id_foreign` (`widget_id`),
  CONSTRAINT `widgets_media_widget_id_foreign` FOREIGN KEY (`widget_id`) REFERENCES `widgets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=185 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
--  Records of `widgets_media`
-- ----------------------------
BEGIN;
INSERT INTO `widgets_media` VALUES ('172', '36', 'widgets/baXjS2UJz9JVlYMdAm48DhUFKxPpPG8Do57gQ3YB.png', 'image', '0', null, null, 'Tecnología al alcance de tu mano', '', 'Ahora podés: Atender el teléfono, desbloquear el reloj y navegar el menú mediante el movimiento de tu muñeca, gracias a la función Smart Gesture. Y más!', 'http://www.google.com.ar', '_blank'), ('173', '36', 'widgets/I1eum5hMxQDxEZ5cwluuiLpPifC474vd6cFafNAI.png', 'video', '1', null, null, null, '', null, 'https://www.youtube.com/watch?v=-rbU5q-WxEM&feature=youtu.be', null), ('174', '36', 'widgets/4BP6ZNRRhtLrXkXOf0IM7OXZbgY5UrNGQtrYil0M.png', 'video', '2', null, null, null, '', null, 'https://www.youtube.com/watch?v=-rbU5q-WxEM&feature=youtu.be', null), ('175', '36', 'widgets/jcqTmNEhDqgDuQLiP56HJcOcLbP4TekC3qFaEXsh.png', 'video', '3', null, null, null, '', null, 'https://www.youtube.com/watch?v=-rbU5q-WxEM&feature=youtu.be', null), ('176', '37', 'widgets/ZNFDiYBCQBs1WB5yjCIcribXgFQAKOuI7kBHrQlP.png', 'video', '0', null, null, 'Verdadera alta definición', 0x566976c3ad20656c206d756e6469616c206d656a6f722071756520656e20656c206573746164696f, 'Hablamos de verdadera alta resolución. 4k es la abreviatura de de 4.000 píxeles (4096 x 2160 píxeles)', 'https://www.youtube.com/watch?v=-rbU5q-WxEM&feature=youtu.be', null), ('177', '38', 'widgets/vRoerPuYYsDrZvqZOHdV4qO7uSv98CiWKwqEHu42.png', 'image', '0', null, null, null, '', null, 'http://www.lanacion.com', null), ('178', '39', 'widgets/ZuOuWdGqfin9TSTB6CEGMRRhVSgfUg4GMZMyLvB5.png', 'image', '1', null, null, 'Nuevos smartphones inspirados en vos', '', 'Sabemos la importancia que le das a la comunicacion. Nuestra linea esta inspirada en vos y fue creada 100% pensando en tu comodidad.', 'http://www.google.com.ar', '_self'), ('179', '40', 'widgets/w4bQCfk8oiOBBBDrXAGAL3WMA175VY89SJJeznDd.png', 'image', '0', null, null, 'Conoce nuestra linea y disfruta del mundial.', 0x4578706572696d656e74c3a1206c6120656d6f6369c3b36e2064652076657220696dc3a167656e657320656e206c61206d656a6f7220646566696e696369c3b36e2079207265736f6c756369c3b36e2e204163636564c3a92061206c6f206d656a6f7220646520496e7465726e65742e, null, 'http://beta.noblex.dam/smart-4k', null), ('180', '41', 'widgets/BB7kgdzTgZPic3Nj812wD5KEYPASw1kajwNLzc0m.png', 'image', '0', null, null, null, '', null, null, null), ('181', '42', 'widgets/6NASR6BNYbN0aHcx4n7vcwnb8y3Ediul6Cw0P23l.png', 'image', '0', null, null, null, '', null, null, null), ('182', '43', 'widgets/hpryYt1neTAhrnKgjF5Gw2D9LNO8SyXoobAEyaU2.png', 'image', '0', null, null, null, '', null, null, '_self'), ('183', '44', 'widgets/HfsTPIUj27C7RgU8KueNi53UWYBvFcrwmkGxr2t3.png', 'image', '0', null, null, null, '', null, null, null), ('184', '45', 'widgets/z2WpQ3RDCXbH1LPxO5cN9lwZF7Lj8fzDFshToeFz.jpeg', 'image', '0', null, null, null, '', null, null, '_self');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
