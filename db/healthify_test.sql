-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 18, 2021 at 12:01 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `healthify_test`
--

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
('admin', '5', 1636112894),
('chef', '3', 1636111142),
('client', '10', 1636558188),
('client', '4', 1636111142),
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
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `totalprice` int(11) NOT NULL,
  `userprofilesid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_userprofile_id_cart` (`userprofilesid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cart_meals`
--

DROP TABLE IF EXISTS `cart_meals`;
CREATE TABLE IF NOT EXISTS `cart_meals` (
  `cartid` int(11) NOT NULL,
  `mealsid` int(11) NOT NULL,
  KEY `fk_cart_id_cartmeal` (`cartid`),
  KEY `fk_meals_id_cartmeal` (`mealsid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inforestaurants`
--

DROP TABLE IF EXISTS `inforestaurants`;
CREATE TABLE IF NOT EXISTS `inforestaurants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(15) NOT NULL,
  `adress` varchar(75) NOT NULL,
  `celphone` int(9) NOT NULL,
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
  `calories` float NOT NULL,
  `proteins` float NOT NULL,
  `carbohidrates` float NOT NULL,
  `fats` float NOT NULL,
  `fibers` float NOT NULL,
  `weight` decimal(3,0) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `meals`
--

DROP TABLE IF EXISTS `meals`;
CREATE TABLE IF NOT EXISTS `meals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(10) NOT NULL,
  `totalcalories` float NOT NULL,
  `totalproteins` float NOT NULL,
  `totalcarbohidrates` float NOT NULL,
  `totalfats` float NOT NULL,
  `totalfibers` float NOT NULL,
  `price` decimal(3,0) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `meal_ingredients`
--

DROP TABLE IF EXISTS `meal_ingredients`;
CREATE TABLE IF NOT EXISTS `meal_ingredients` (
  `mealsid` int(11) NOT NULL,
  `ingredientsid` int(11) NOT NULL,
  KEY `fk_ingredientsid_mealingredients` (`ingredientsid`),
  KEY `fk_meals_id_mealingredients` (`mealsid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Table structure for table `minerals`
--

DROP TABLE IF EXISTS `minerals`;
CREATE TABLE IF NOT EXISTS `minerals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` int(11) NOT NULL,
  `ingredientsid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_ingredientsid_minerals` (`ingredientsid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
CREATE TABLE IF NOT EXISTS `reservations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reservedday` date NOT NULL,
  `reservedtime` timestamp NOT NULL,
  `userprofilesid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_userprofile_id` (`userprofilesid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `sales_mealsidsales` int(11) NOT NULL,
  `sales_mealsidmeal` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_userprofile_id_reviews` (`userprofilesid`),
  KEY `fk_salesmeals_idmeal_reviews` (`sales_mealsidmeal`),
  KEY `fk_salesmeals_idsales_reviews` (`sales_mealsidsales`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

DROP TABLE IF EXISTS `sales`;
CREATE TABLE IF NOT EXISTS `sales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datetime` datetime NOT NULL,
  `precototal` decimal(3,0) NOT NULL,
  `paidamount` decimal(3,0) NOT NULL,
  `paymentmethod` set('cash','card','mbway') NOT NULL,
  `userprofilesid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_userprofile_id_sales` (`userprofilesid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sales_meals`
--

DROP TABLE IF EXISTS `sales_meals`;
CREATE TABLE IF NOT EXISTS `sales_meals` (
  `salesid` int(11) NOT NULL,
  `mealid` int(11) NOT NULL,
  `sellingprice` decimal(3,0) NOT NULL,
  KEY `fk_meal_id_salesmeals` (`mealid`),
  KEY `fk_sales_id_salesmeals` (`salesid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sales_state`
--

DROP TABLE IF EXISTS `sales_state`;
CREATE TABLE IF NOT EXISTS `sales_state` (
  `userprofilesid` int(11) NOT NULL,
  `salesid` int(11) NOT NULL,
  `state` set('paid','not paid') NOT NULL,
  KEY `fk_userprofile_id_salesstate` (`userprofilesid`),
  KEY `fk_sales_id_salesstate` (`salesid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

DROP TABLE IF EXISTS `schedules`;
CREATE TABLE IF NOT EXISTS `schedules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `day` date NOT NULL,
  `weekday` varchar(10) NOT NULL,
  `firstentry` time NOT NULL,
  `firstexit` time NOT NULL,
  `secondentry` time NOT NULL,
  `secondexit` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

DROP TABLE IF EXISTS `tables`;
CREATE TABLE IF NOT EXISTS `tables` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `state` set('vacant','occupied') NOT NULL DEFAULT 'vacant',
  `reservationsid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_reservations_id` (`reservationsid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `verification_token`) VALUES
(2, 'testeuser', 'IA_ROg-7282xyzU7Eb0x9Ip0z6PhW9ZK', '$2y$13$DpRGCCjE5qk2RqGRWrsL1.8UF9LpQSJx5duJTPnQD9rb7Y3zN3NNG', NULL, 'tiago.gil277@gmail.com', 10, 1634293795, 1634293795, '0HHcgxm6BfuNjOH9vwHra6rj9MLPdlOW_1634293795'),
(5, 'admin', 'GmkIltBSetHrfbFpRL2669P7WqWGshGG', '$2y$13$osVyRKNcEjuJECi0Oja/SOEQ1w5nl43EO/xVEhjnvFE/uEJGETPGC', NULL, 'admin@hoje.pt', 10, 1636112894, 1636112894, 'ewMU_207-OoIxy63axz_h5Yl2rh2NK-C_1636112894'),
(9, 'Pedro', '873xUmF4aWMTVH8wl-iUdJPCxGhorKcv', '$2y$13$b/XsHQcekFuVzyf5fhAqj.1/hL4ga4MioTaqwtBVF68UbqUPaXacC', NULL, 'pedro@hoje.teste', 10, 1636545266, 1636545266, '-9wWSBIU44B7PvO7mwiklcVD_hATzKJl_1636545266'),
(10, 'defesa', 'JqarnlK4bpe8b8iqDhKanoxb9pEO9vRW', '$2y$13$lBp8KR48Pm1kUgvcrX1ak.SBWk5eo/g8k.W1MIHRuT8BOO2eqJtle', NULL, 'wieuvbn@sdvs.pt', 10, 1636558188, 1636558188, '6QZEdWRFEiVfxJ0g6aer-8s6NSOM5Ngs_1636558188');

-- --------------------------------------------------------

--
-- Table structure for table `userprofiles`
--

DROP TABLE IF EXISTS `userprofiles`;
CREATE TABLE IF NOT EXISTS `userprofiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nif` int(9) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `cellphone` int(9) NOT NULL,
  `street` varchar(20) NOT NULL,
  `door` int(11) NOT NULL,
  `floor` int(11) DEFAULT NULL,
  `city` varchar(15) NOT NULL,
  `nib` char(25) DEFAULT NULL,
  `userid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_user_id` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `userschedulesregistry`
--

DROP TABLE IF EXISTS `userschedulesregistry`;
CREATE TABLE IF NOT EXISTS `userschedulesregistry` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_entry` datetime NOT NULL,
  `employee_exit` datetime NOT NULL,
  `userprofilesid` int(11) NOT NULL,
  `schedulesid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_schedules_id` (`schedulesid`),
  KEY `fk_userprofiles_id` (`userprofilesid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vitamins`
--

DROP TABLE IF EXISTS `vitamins`;
CREATE TABLE IF NOT EXISTS `vitamins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` int(11) NOT NULL,
  `ingredientsid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_ingredientsid_vitamins` (`ingredientsid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `fk_userprofile_id_cart` FOREIGN KEY (`userprofilesid`) REFERENCES `userprofiles` (`id`);

--
-- Constraints for table `cart_meals`
--
ALTER TABLE `cart_meals`
  ADD CONSTRAINT `fk_cart_id_cartmeal` FOREIGN KEY (`cartid`) REFERENCES `cart` (`id`),
  ADD CONSTRAINT `fk_meals_id_cartmeal` FOREIGN KEY (`mealsid`) REFERENCES `meals` (`id`);

--
-- Constraints for table `meal_ingredients`
--
ALTER TABLE `meal_ingredients`
  ADD CONSTRAINT `fk_ingredientsid_mealingredients` FOREIGN KEY (`ingredientsid`) REFERENCES `ingredients` (`id`),
  ADD CONSTRAINT `fk_meals_id_mealingredients` FOREIGN KEY (`mealsid`) REFERENCES `meals` (`id`);

--
-- Constraints for table `minerals`
--
ALTER TABLE `minerals`
  ADD CONSTRAINT `fk_ingredientsid_minerals` FOREIGN KEY (`ingredientsid`) REFERENCES `ingredients` (`id`);

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `fk_userprofile_id` FOREIGN KEY (`userprofilesid`) REFERENCES `userprofiles` (`id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `fk_salesmeals_idmeal_reviews` FOREIGN KEY (`sales_mealsidmeal`) REFERENCES `sales_meals` (`mealid`),
  ADD CONSTRAINT `fk_salesmeals_idsales_reviews` FOREIGN KEY (`sales_mealsidsales`) REFERENCES `sales_meals` (`salesid`),
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
-- Constraints for table `sales_state`
--
ALTER TABLE `sales_state`
  ADD CONSTRAINT `fk_sales_id_salesstate` FOREIGN KEY (`salesid`) REFERENCES `sales` (`id`),
  ADD CONSTRAINT `fk_userprofile_id_salesstate` FOREIGN KEY (`userprofilesid`) REFERENCES `userprofiles` (`id`);

--
-- Constraints for table `tables`
--
ALTER TABLE `tables`
  ADD CONSTRAINT `fk_reservations_id` FOREIGN KEY (`reservationsid`) REFERENCES `reservations` (`id`);

--
-- Constraints for table `userprofiles`
--
ALTER TABLE `userprofiles`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`userid`) REFERENCES `user` (`id`);

--
-- Constraints for table `userschedulesregistry`
--
ALTER TABLE `userschedulesregistry`
  ADD CONSTRAINT `fk_schedules_id` FOREIGN KEY (`schedulesid`) REFERENCES `schedules` (`id`),
  ADD CONSTRAINT `fk_userprofiles_id` FOREIGN KEY (`userprofilesid`) REFERENCES `userprofiles` (`id`);

--
-- Constraints for table `vitamins`
--
ALTER TABLE `vitamins`
  ADD CONSTRAINT `fk_ingredientsid_vitamins` FOREIGN KEY (`ingredientsid`) REFERENCES `ingredients` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
