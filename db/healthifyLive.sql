-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 12, 2022 at 01:04 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `healthify`
--

drop database IF EXISTS healthify;
create database healthify;
use healthify;

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

DROP TABLE IF EXISTS `auth_assignment`;
CREATE TABLE IF NOT EXISTS `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  KEY `idx-auth_assignment-user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin', '1', 1636111142),
('admin', '5', 1641436339),
('chef', '3', 1636111142),
('client', '11', 1637596605),
('client', '12', 1637596695),
('client', '13', 1637597156),
('client', '14', 1637599697),
('client', '15', 1637602659),
('client', '16', 1638458790),
('client', '19', 1641436546),
('client', '20', 1641436573),
('client', '21', 1641549961),
('client', '22', 1641549987),
('client', '23', 1641550026),
('client', '24', 1641748242),
('client', '25', 1641748767),
('client', '26', 1641749328),
('client', '27', 1642873961),
('client', '28', 1644575277),
('client', '4', 1636111142),
('staff', '10', 1641418428),
('staff', '17', 1641415558),
('staff', '18', 1641436377),
('staff', '2', 1636391102),
('staff', '9', 1636546059);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

DROP TABLE IF EXISTS `auth_item`;
CREATE TABLE IF NOT EXISTS `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('accessBackend', 2, 'Access the Back-Office', NULL, NULL, 1636111142, 1636111142),
('admin', 1, NULL, NULL, NULL, 1636111142, 1636111142),
('chef', 1, NULL, NULL, NULL, 1636111142, 1636111142),
('client', 1, NULL, NULL, NULL, 1636111142, 1636111142),
('createPost', 2, 'Create a post', NULL, NULL, 1636111142, 1636111142),
('staff', 1, NULL, NULL, NULL, 1636111142, 1636111142),
('updatePost', 2, 'Update post', NULL, NULL, 1636111142, 1636111142);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

DROP TABLE IF EXISTS `auth_item_child`;
CREATE TABLE IF NOT EXISTS `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('admin', 'accessBackend'),
('chef', 'accessBackend'),
('staff', 'accessBackend'),
('client', 'createPost'),
('admin', 'staff'),
('admin', 'updatePost');

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

DROP TABLE IF EXISTS `auth_rule`;
CREATE TABLE IF NOT EXISTS `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `calendar`
--

DROP TABLE IF EXISTS `calendar`;
CREATE TABLE IF NOT EXISTS `calendar` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Date',
  `val` int(11) NOT NULL COMMENT 'Value',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userprofilesid` int(11) NOT NULL,
  `mealsid` int(11) NOT NULL,
  `sellingprice` decimal(10,2) NOT NULL,
  `itemquantity` int(11) NOT NULL,
  `state` varchar(11) DEFAULT 'active',
  `mesa` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_usercart_id` (`userprofilesid`),
  KEY `fk_mealcart_id` (`mealsid`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `userprofilesid`, `mealsid`, `sellingprice`, `itemquantity`, `state`, `mesa`) VALUES
(1, 1, 1, '13.50', 2, 'paid', NULL),
(2, 1, 1, '13.50', 5, 'paid', NULL),
(17, 3, 2, '14.99', 1, 'active', NULL),
(31, 6, 5, '7.50', 1, 'paid', 1),
(32, 6, 7, '1.00', 1, 'paid', 1),
(33, 6, 1, '14.99', 1, 'paid', 1),
(34, 6, 5, '7.50', 1, 'paid', 1),
(35, 6, 6, '5.50', 1, 'paid', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `description`) VALUES
(1, 'entradas', 'Entradas/petiscos'),
(2, 'sopas', 'Sopas'),
(3, 'carne', 'Pratos de carne'),
(4, 'peixe', 'Pratos de peixe'),
(5, 'vegan', 'Pratos apenas com proteína vegetal'),
(6, 'sobremesa', 'Sobremesas'),
(7, 'bebidas', 'Bebidas');

-- --------------------------------------------------------

--
-- Table structure for table `inforestaurants`
--

DROP TABLE IF EXISTS `inforestaurants`;
CREATE TABLE IF NOT EXISTS `inforestaurants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(15) NOT NULL,
  `adress` varchar(75) NOT NULL,
  `cellphone` int(9) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nif` int(9) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

DROP TABLE IF EXISTS `ingredients`;
CREATE TABLE IF NOT EXISTS `ingredients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(15) NOT NULL,
  `sugar_g` float NOT NULL,
  `calories` float NOT NULL,
  `protein_g` float NOT NULL,
  `carbohydrates_total_g` float NOT NULL,
  `fat_saturated_g` float NOT NULL,
  `fat_total_g` float NOT NULL,
  `fiber_g` float NOT NULL,
  `cholesterol_mg` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ingredients`
--

INSERT INTO `ingredients` (`id`, `name`, `sugar_g`, `calories`, `protein_g`, `carbohydrates_total_g`, `fat_saturated_g`, `fat_total_g`, `fiber_g`, `cholesterol_mg`) VALUES
(1, 'Bife de vaca', 0, 291.9, 26.6, 0, 7.8, 19.7, 0, 87),
(2, 'Ovo', 0.4, 147, 12.5, 0.7, 3.1, 9.7, 0, 371),
(3, 'Batata frita', 0.3, 312.5, 3.4, 42.1, 2.3, 14.4, 3.8, 0),
(4, 'Peito de frango', 0, 166.2, 31, 0, 1, 3.5, 0, 85),
(5, 'Arroz', 0.1, 127.4, 2.7, 28.4, 0.1, 0.3, 0.4, 0),
(6, 'Canela', 2.2, 245.3, 4, 82.2, 0.4, 1.3, 52.1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `meals`
--

DROP TABLE IF EXISTS `meals`;
CREATE TABLE IF NOT EXISTS `meals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `categoryid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_meals_id_category` (`categoryid`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meals`
--

INSERT INTO `meals` (`id`, `name`, `price`, `description`, `categoryid`) VALUES
(1, 'Bitoque', '14.99', 'Bife com ovo', 3),
(2, 'Bacalhau com natas', '14.99', 'Bacalhau servido com natas', 4),
(3, 'Pão de alho', '2.50', 'Pão de alho tostado no forno', 1),
(4, 'Sopa de peixe', '5.50', 'Sopa de peixe com delícias do mar e coentros', 2),
(5, 'Tofu com sementes de sésamo', '7.50', 'Prato de tofu preparado com sementes de sésamo em óleo de girassol', 5),
(6, 'Baba de camelo', '5.50', 'Baba de camelo cremosa e suava preparada na casa', 6),
(7, 'Brisa', '1.00', 'Refrigerante com gás importado diretamente das ilhas da Madeira', 7),
(9, 'Arroz Doce', '2.50', 'Arroz Doce caseiro', 6);

-- --------------------------------------------------------

--
-- Table structure for table `meal_ingredients`
--

DROP TABLE IF EXISTS `meal_ingredients`;
CREATE TABLE IF NOT EXISTS `meal_ingredients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `serving_size_g` float DEFAULT NULL,
  `total_sugar_g` float NOT NULL,
  `total_calories` float NOT NULL,
  `total_protein_g` float NOT NULL,
  `total_carbohydrates_total_g` float NOT NULL,
  `total_fat_saturated_g` float NOT NULL,
  `total_fat_total_g` float NOT NULL,
  `total_fiber_g` float NOT NULL,
  `total_cholesterol_mg` float NOT NULL,
  `mealsid` int(11) NOT NULL,
  `ingredientsid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_ingredientsid_mealingredients` (`ingredientsid`),
  KEY `fk_meals_id_mealingredients` (`mealsid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meal_ingredients`
--

INSERT INTO `meal_ingredients` (`id`, `serving_size_g`, `total_sugar_g`, `total_calories`, `total_protein_g`, `total_carbohydrates_total_g`, `total_fat_saturated_g`, `total_fat_total_g`, `total_fiber_g`, `total_cholesterol_mg`, `mealsid`, `ingredientsid`) VALUES
(1, 100, 0, 291.9, 26.6, 0, 7.8, 19.7, 0, 87, 1, 1),
(2, 100, 0.4, 147, 12.5, 0.7, 3.1, 9.7, 0, 371, 1, 2),
(3, 100, 0.3, 312.5, 3.4, 42.1, 2.3, 14.4, 3.8, 0, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

DROP TABLE IF EXISTS `migration`;
CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1634117830),
('m130524_201442_init', 1634117833),
('m140506_102106_rbac_init', 1634117983),
('m170907_052038_rbac_add_index_on_auth_assignment_user_id', 1634117983),
('m180523_151638_rbac_updates_indexes_without_prefix', 1634117983),
('m190124_110200_add_verification_token_column_to_user_table', 1634117833),
('m200409_110543_rbac_update_mssql_trigger', 1634117983);

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
CREATE TABLE IF NOT EXISTS `reservations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reservedday` date NOT NULL,
  `reservedtime` enum('almoco','jantar') NOT NULL,
  `userprofilesid` int(11) NOT NULL,
  `tableid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_userprofile_id` (`userprofilesid`),
  KEY `fk_table_id` (`tableid`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `reservedday`, `reservedtime`, `userprofilesid`, `tableid`) VALUES
(21, '2022-01-31', 'jantar', 2, 1),
(22, '2022-02-09', 'almoco', 5, 1),
(23, '2022-02-10', 'almoco', 3, 1),
(24, '2022-02-11', 'jantar', 3, 2),
(25, '2022-02-12', 'almoco', 3, 1),
(28, '2022-02-18', 'almoco', 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE IF NOT EXISTS `reviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rating` decimal(1,0) DEFAULT NULL,
  `review` varchar(255) DEFAULT NULL,
  `userprofilesid` int(11) NOT NULL,
  `mealsid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_userprofile_id_reviews` (`userprofilesid`),
  KEY `fk_meals_id` (`mealsid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `rating`, `review`, `userprofilesid`, `mealsid`) VALUES
(1, '5', 'Optima', 1, 1),
(2, '5', 'estava boa', 1, 1),
(3, '5', 'estava boa', 1, 1),
(4, '5', 'estava boa', 1, 1),
(6, '4', 'Teste com 4', 4, 9);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

DROP TABLE IF EXISTS `sales`;
CREATE TABLE IF NOT EXISTS `sales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `salesday` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `precototal` decimal(10,2) NOT NULL,
  `discount` decimal(10,2) DEFAULT NULL,
  `paidamount` decimal(10,2) NOT NULL,
  `paymentmethod` set('cash','card') NOT NULL,
  `paymentstate` varchar(11) NOT NULL,
  `userprofilesid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_userprofile_id_sales` (`userprofilesid`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `salesday`, `precototal`, `discount`, `paidamount`, `paymentmethod`, `paymentstate`, `userprofilesid`) VALUES
(1, '2022-01-06 01:31:06', '15.00', '0.00', '15.00', 'card', 'paid', 3),
(2, '2022-01-06 02:48:44', '2.50', '0.00', '2.50', 'cash', 'not', 4),
(3, '2022-01-09 16:27:39', '27.00', NULL, '27.00', 'card', 'paid', 1),
(4, '2022-01-09 16:37:44', '27.00', NULL, '27.00', 'card', 'paid', 1),
(5, '2022-01-09 18:12:45', '27.00', NULL, '27.00', 'card', 'paid', 1),
(6, '2022-01-10 10:27:13', '94.50', NULL, '94.50', 'card', 'paid', 1),
(7, '2022-02-12 12:28:56', '23.49', NULL, '23.49', 'card', 'paid', 6),
(8, '2022-02-12 12:29:37', '23.49', NULL, '23.49', 'card', 'paid', 6),
(9, '2022-02-12 12:32:18', '23.49', NULL, '23.49', 'card', 'paid', 6),
(10, '2022-02-12 12:35:38', '23.49', NULL, '23.49', 'card', 'paid', 6),
(11, '2022-02-12 12:42:59', '23.49', NULL, '23.49', 'card', 'paid', 6),
(12, '2022-02-12 12:45:08', '23.49', NULL, '23.49', 'card', 'paid', 6),
(13, '2022-02-12 12:46:09', '23.49', NULL, '23.49', 'card', 'paid', 6),
(14, '2022-02-12 12:46:50', '23.49', NULL, '23.49', 'card', 'paid', 6),
(15, '2022-02-12 12:47:33', '23.49', NULL, '23.49', 'card', 'paid', 6),
(16, '2022-02-12 12:51:09', '23.49', NULL, '23.49', 'card', 'paid', 6),
(17, '2022-02-12 12:52:54', '23.49', NULL, '23.49', 'card', 'paid', 6),
(18, '2022-02-12 12:53:11', '0.00', NULL, '0.00', 'card', 'paid', 6),
(19, '2022-02-12 12:58:09', '13.00', NULL, '13.00', 'card', 'paid', 6);

-- --------------------------------------------------------

--
-- Table structure for table `sales_meals`
--

DROP TABLE IF EXISTS `sales_meals`;
CREATE TABLE IF NOT EXISTS `sales_meals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `salesid` int(11) NOT NULL,
  `mealid` int(11) NOT NULL,
  `sellingprice` decimal(10,2) NOT NULL,
  `itemquantity` int(11) NOT NULL,
  `state` varchar(11) DEFAULT 'waiting',
  `mesa` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_meal_id_salesmeals` (`mealid`),
  KEY `fk_sales_id_salesmeals` (`salesid`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_meals`
--

INSERT INTO `sales_meals` (`id`, `salesid`, `mealid`, `sellingprice`, `itemquantity`, `state`, `mesa`) VALUES
(1, 1, 9, '5.99', 1, 'done', 1),
(2, 2, 9, '2.50', 2, 'done', 1),
(3, 3, 1, '13.50', 2, 'done', 1),
(4, 4, 1, '13.50', 2, 'done', 1),
(5, 5, 1, '13.50', 2, 'waiting', 2),
(6, 6, 1, '13.50', 2, 'waiting', 2),
(7, 6, 1, '13.50', 5, 'waiting', 2),
(8, 19, 5, '7.50', 1, 'preparing', 1),
(9, 19, 6, '5.50', 1, 'waiting', 1);

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

DROP TABLE IF EXISTS `schedules`;
CREATE TABLE IF NOT EXISTS `schedules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `day` datetime DEFAULT CURRENT_TIMESTAMP,
  `userprofilesid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_userprofiles_id` (`userprofilesid`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `day`, `userprofilesid`) VALUES
(7, '2022-01-10 09:40:35', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

DROP TABLE IF EXISTS `tables`;
CREATE TABLE IF NOT EXISTS `tables` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `state` set('occupied','free','reserved') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tables`
--

INSERT INTO `tables` (`id`, `state`) VALUES
(1, 'occupied'),
(2, 'occupied'),
(3, 'free'),
(4, 'free');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `verification_token`) VALUES
(2, 'testeuser', 'IA_ROg-7282xyzU7Eb0x9Ip0z6PhW9ZK', '$2y$13$DpRGCCjE5qk2RqGRWrsL1.8UF9LpQSJx5duJTPnQD9rb7Y3zN3NNG', NULL, 'tiago.gil277@gmail.com', 10, 1634293795, 1634293795, '0HHcgxm6BfuNjOH9vwHra6rj9MLPdlOW_1634293795'),
(5, 'admin', 'GmkIltBSetHrfbFpRL2669P7WqWGshGG', '$2y$13$osVyRKNcEjuJECi0Oja/SOEQ1w5nl43EO/xVEhjnvFE/uEJGETPGC', NULL, 'admin@hoje.pt', 10, 1636112894, 1636112894, 'ewMU_207-OoIxy63axz_h5Yl2rh2NK-C_1636112894'),
(9, 'Pedro', '873xUmF4aWMTVH8wl-iUdJPCxGhorKcv', '$2y$13$b/XsHQcekFuVzyf5fhAqj.1/hL4ga4MioTaqwtBVF68UbqUPaXacC', NULL, 'pedro@hoje.teste', 10, 1636545266, 1636545266, '-9wWSBIU44B7PvO7mwiklcVD_hATzKJl_1636545266'),
(10, 'defesa', 'JqarnlK4bpe8b8iqDhKanoxb9pEO9vRW', '$2y$13$lBp8KR48Pm1kUgvcrX1ak.SBWk5eo/g8k.W1MIHRuT8BOO2eqJtle', NULL, 'wieuvbn@sdvs.pt', 10, 1636558188, 1636558188, '6QZEdWRFEiVfxJ0g6aer-8s6NSOM5Ngs_1636558188'),
(11, 'qweqw', 'n7AGM3RxIS0RAVtwrLjAx8GATbF0qbNP', '$2y$13$sKlqllcUOzrjkFSnANk1POhfhL8aOGcLA1rcuyIH35.ltvGPFdjqa', NULL, 'wqew2@sda.pe', 0, 1637596605, 1637596605, 'MtTHjDEESQjCVQDXdnhK67u_qumAokXs_1637596605'),
(12, 'qweqwa', 'mtV85qYOD6D-RWmb7EsNkCMLH2DB79ra', '$2y$13$gApIsGdW5CTqAnig8KFYF.cVwr.mE8QKxTK6p1R3CvJ5kH7tvNdLm', NULL, 'wqew2@sda.pea', 0, 1637596695, 1637596695, 'POXFBmzmgDDqYzUddTTWDIrPDinQGgz8_1637596695'),
(13, 'aqweqwa', 'sDM1kj0KrLx1Pq9uuEZbKi4iWLw9S5Xs', '$2y$13$qxebr.BGZ/CLyVB7F8AVy.X.slwndLJCJYB/a19bcljELSfpjEclO', NULL, 'wqew2@sda.peaa', 0, 1637597156, 1637597156, 'KIUzYjeCZMZDnJWhtf5c-GzCw5xgVbXv_1637597156'),
(14, 'asda', 'o6TUBCcALIDlrOSmTDZEHGrreK7q1_N3', '$2y$13$CBYn09vBmqBVDVnLghZ1tOmvAFl8hkTZX6EAc4yMWTTDLs2dBz6a.', NULL, 'qwerty@asda.poa', 0, 1637599697, 1637599697, '0-sBEJjYf4pdP5BPOTk6wlkhQA9Vqvlk_1637599697'),
(15, 'testenovo', 'rS0fkhvZmhizOTi6g37dRjbwPTs1kuHW', '$2y$13$JpRGiDIbsVtrS2.T.GcU.u8tqzbMfuWKcA1XpbZ/cUCB82K6gSR96', NULL, 'testenovo@escola.pt', 0, 1637602659, 1637602659, 'xn9nUVQCi0ullaHMYCBuZqvWLzBDf8vp_1637602659'),
(16, 'UserTest', 'leCoTDhnSejhSl5rghOawbAy1diLQmAV', '$2y$13$4qtHeoCeLq7GSxvRXeRA3uyjRPqvB0U06dFG1O3M0NwWhTq47eul.', NULL, 'aulateste@teste.pt', 10, 1638458790, 1638458790, 'XYeKLunbyQSULf3Ig-zaGY-SKi8bMNEY_1638458790'),
(18, 'leonor', 'e3tSNN8a4abo0xr1R9vedvq121Ms698y', '$2y$13$DEa/aaSZCMHRmvfz7x.OzuK0j0N8Ir1rLf.Il1fM6bqgmWCakaofq', NULL, 'leonor@leonor.pt', 10, 1641418438, 1641418438, 'DXwk-pyoMfZcc7NKfNDZLg60gqCXt1xj_1641418438'),
(20, 'testedeutilizador', 'qWwxMhsCOxCSroV5WLV5wdQcj5gORX75', '$2y$13$bQsgfhkjxWOIOEW5bN5XPudEE2WUwJfeCrFddGUwg1A1WE6RBd9qi', NULL, 'testenovo@teste.pt', 10, 1641436573, 1641436573, 'ZEvPXc2Bhu7nyxlsQHB1bTEMF5KiOvV__1641436573'),
(21, 'defesa_1', 'KklJKvvXxF4n54L8hGjDqR4pacAl9Hhg', '$2y$13$Yb8IHb/GGNacC0/tjZNWjubBQi/Slyw5QzTpfoh71Z3ZAyWWWSpeG', NULL, 'defesa@1.pt', 10, 1641549961, 1641549961, 'w40mtv8d0tcgEWF75IP_ldiTTZkmMf_d_1641549961'),
(22, 'defesa_2', 'aDKhbkfI8hShX95mAyiB6KY-vMOeuH6Z', '$2y$13$7jRJaLykLzEtYJ3BdWPdpe1H5tsbdpqcxziIX7OuPL1iFY1EfwFfG', NULL, 'defesa@2.pt', 10, 1641549987, 1641549987, '2iDHeyFaaL7ViNVzC47B4kPOQ5_oNJdv_1641549987'),
(23, 'defesa_3', '0qJ_aoKZT_f96fLf6QTKkezzk1BggERQ', '$2y$13$IEzBGV3N7LnJI4DN6KuOwO2Bqu4zhBOmXlcmc.3CERqZsF6wi1pTW', NULL, 'defesa@3.pt', 10, 1641550026, 1641550026, 'smKX1CiL5ekqXP-9heV_1dbHVV9qtN7I_1641550026'),
(26, 'curlDELETE', 'ycHHq6xSlqsvkgy81xixh9h32sI6Ne_s', '$2y$13$9YrvDhxQz4ADOpjeoaweNOGk.eL/M2ZgJqqFY0YcV8Ayc/u5uzhby', NULL, 'curl@DELETE.pt', 10, 1641749328, 1641749328, 'FQ0gPgjC-LVWDOzu3zEkEmqyTsEUsX8-_1641749328'),
(27, 'tonnyjohnny213', 'q6_m2ZBUJnT1B7rr54aIdI01-gVBizn3', '$2y$13$Z8UKI4D1wBn3oTuefmmT5umUQ002WOBDq0s/uaAOmeOwHOJxTXq3.', NULL, 'tonny.mail@testing.com', 10, 1642873961, 1642873961, '4rZw62nPLe_5I8qoI2rkTXl-UJ02eO4b_1642873961'),
(28, 'manufixe', 'eZi27CzxcY7mcOtv6PU69ZJDxWgV_7Vr', '$2y$13$RQXWTxTP9vS./FmdAjYXBeNsHIAojjJCdNA6ZQGZyFeG8lTUBXwYu', NULL, 'manu@fixe.pt', 10, 1644575277, 1644575277, 'QBfEU-IQo7NNbtp4zX1gwX90sYftZ0Pv_1644575277');

-- --------------------------------------------------------

--
-- Table structure for table `userprofiles`
--

DROP TABLE IF EXISTS `userprofiles`;
CREATE TABLE IF NOT EXISTS `userprofiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nif` int(9) NOT NULL,
  `name` varchar(20) NOT NULL,
  `cellphone` int(9) NOT NULL,
  `street` varchar(20) NOT NULL,
  `door` int(11) NOT NULL,
  `floor` int(11) DEFAULT NULL,
  `city` varchar(15) NOT NULL,
  `nib` char(25) DEFAULT NULL,
  `userid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_user_id` (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userprofiles`
--

INSERT INTO `userprofiles` (`id`, `nif`, `name`, `cellphone`, `street`, `door`, `floor`, `city`, `nib`, `userid`) VALUES
(1, 987654321, 'pedro Lourenço', 987654321, 'fewf', 21, NULL, 'Leiria', NULL, 9),
(2, 987654321, 'Miguel', 987654321, 'fewf', 21, 1, 'Leiria', NULL, 9),
(3, 123456789, 'Tiago Gil', 123456789, 'Rua Dom João IV', 45, 0, 'Santarém', NULL, 5),
(4, 987654321, 'Manuel', 789456123, 'Rua Dom João IV', 45, 2, 'Santarém', NULL, 20),
(5, 987654321, 'Pedro Lourenço', 987654321, 'fewf', 21, NULL, 'Leiria', NULL, 9),
(6, 235236235, 'Manuel Jorge', 960309940, 'Morro do Lena 2', 45, 45, 'Uranus', NULL, 28);

-- --------------------------------------------------------

--
-- Table structure for table `userschedulesregistry`
--

DROP TABLE IF EXISTS `userschedulesregistry`;
CREATE TABLE IF NOT EXISTS `userschedulesregistry` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_entry` datetime DEFAULT CURRENT_TIMESTAMP,
  `employee_exit` datetime DEFAULT CURRENT_TIMESTAMP,
  `schedulesid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_schedules_id` (`schedulesid`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userschedulesregistry`
--

INSERT INTO `userschedulesregistry` (`id`, `employee_entry`, `employee_exit`, `schedulesid`) VALUES
(28, '2022-01-10 09:40:35', '2022-01-10 09:40:45', 7);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `fk_mealcart_id` FOREIGN KEY (`mealsid`) REFERENCES `meals` (`id`),
  ADD CONSTRAINT `fk_usercart_id` FOREIGN KEY (`userprofilesid`) REFERENCES `userprofiles` (`id`);

--
-- Constraints for table `meals`
--
ALTER TABLE `meals`
  ADD CONSTRAINT `fk_meals_id_category` FOREIGN KEY (`categoryid`) REFERENCES `category` (`id`);

--
-- Constraints for table `meal_ingredients`
--
ALTER TABLE `meal_ingredients`
  ADD CONSTRAINT `fk_ingredientsid_mealingredients` FOREIGN KEY (`ingredientsid`) REFERENCES `ingredients` (`id`),
  ADD CONSTRAINT `fk_meals_id_mealingredients` FOREIGN KEY (`mealsid`) REFERENCES `meals` (`id`);

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `fk_table_id` FOREIGN KEY (`tableid`) REFERENCES `tables` (`id`),
  ADD CONSTRAINT `fk_userprofile_id` FOREIGN KEY (`userprofilesid`) REFERENCES `userprofiles` (`id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `fk_meals_id` FOREIGN KEY (`mealsid`) REFERENCES `meals` (`id`),
  ADD CONSTRAINT `fk_userprofile_id_reviews` FOREIGN KEY (`userprofilesid`) REFERENCES `userprofiles` (`id`);

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `fk_userprofile_id_sales` FOREIGN KEY (`userprofilesid`) REFERENCES `userprofiles` (`id`);

--
-- Constraints for table `sales_meals`
--
ALTER TABLE `sales_meals`
  ADD CONSTRAINT `fk_meal_id_salesmeals` FOREIGN KEY (`mealid`) REFERENCES `meals` (`id`),
  ADD CONSTRAINT `fk_sales_id_salesmeals` FOREIGN KEY (`salesid`) REFERENCES `sales` (`id`);

--
-- Constraints for table `schedules`
--
ALTER TABLE `schedules`
  ADD CONSTRAINT `fk_userprofiles_id` FOREIGN KEY (`userprofilesid`) REFERENCES `userprofiles` (`id`);

--
-- Constraints for table `userprofiles`
--
ALTER TABLE `userprofiles`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`userid`) REFERENCES `user` (`id`);

--
-- Constraints for table `userschedulesregistry`
--
ALTER TABLE `userschedulesregistry`
  ADD CONSTRAINT `fk_schedules_id` FOREIGN KEY (`schedulesid`) REFERENCES `schedules` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
