-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 02, 2021 at 04:46 PM
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
-- Database: `healthify`
--
drop database if exists healthify;
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
('admin', '5', 1636112894),
('chef', '3', 1636111142),
('client', '10', 1636558188),
('client', '11', 1637596605),
('client', '12', 1637596695),
('client', '13', 1637597156),
('client', '14', 1637599697),
('client', '15', 1637602659),
('client', '16', 1638458790),
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ingredients`
--

INSERT INTO `ingredients` (`id`, `name`, `calories`, `proteins`, `carbohidrates`, `fats`, `fibers`, `weight`) VALUES
(1, 'Laranja', 50.4, 0.9, 12.4, 0.1, 2.2, '100');

-- --------------------------------------------------------

--
-- Table structure for table `meals`
--

DROP TABLE IF EXISTS `meals`;
CREATE TABLE IF NOT EXISTS `meals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `totalcalories` float DEFAULT NULL,
  `totalproteins` float DEFAULT NULL,
  `totalcarbohidrates` float DEFAULT NULL,
  `totalfats` float DEFAULT NULL,
  `totalfibers` float DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `category` enum('entree','soup','meat','fish','vegan','drinks','dessert') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meals`
--

INSERT INTO `meals` (`id`, `name`, `totalcalories`, `totalproteins`, `totalcarbohidrates`, `totalfats`, `totalfibers`, `price`, `description`, `category`) VALUES
(1, 'Chocolate', 666, 666, 666, 666, 666, '27.00', 'Tastes plenty good', 'dessert'),
(2, 'Smelly Fish', 313, 313, 313, 313, 313, '9.99', 'Pretty evil', 'fish'),
(3, 'Canteen Secret Meat', 125, 125, 125, 125, 125, '14.99', 'So secret you won\'t even know what you\'re eating', 'meat'),
(4, 'Areias o Camelo', 852, 852, 852, 852, 852, '10.69', 'Tem muita bossa e pouco pelo', 'dessert'),
(5, 'Coca-Cola Man', 696, 696, 696, 696, 696, '5.69', 'It\'s coca-cola man, what else?', 'drinks');

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
  `salesday` timestamp NULL DEFAULT NULL,
  `precototal` decimal(10,2) NOT NULL,
  `discount` decimal(10,2) DEFAULT NULL,
  `paidamount` decimal(10,2) DEFAULT NULL,
  `paymentmethod` set('cash','card','mbway') DEFAULT NULL,
  `paymentstate` enum('paid','not paid') NOT NULL,
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
  `sellingprice` decimal(10,2) NOT NULL,
  `itemquantity` int(11) NOT NULL,
  KEY `fk_meal_id_salesmeals` (`mealid`),
  KEY `fk_sales_id_salesmeals` (`salesid`)
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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
(16, 'UserTest', 'leCoTDhnSejhSl5rghOawbAy1diLQmAV', '$2y$13$4qtHeoCeLq7GSxvRXeRA3uyjRPqvB0U06dFG1O3M0NwWhTq47eul.', NULL, 'aulateste@teste.pt', 10, 1638458790, 1638458790, 'XYeKLunbyQSULf3Ig-zaGY-SKi8bMNEY_1638458790');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
--
-- Dumping data for table `userprofiles`
--

INSERT INTO `userprofiles` (`id`, `nif`, `name`, `cellphone`, `street`, `door`, `floor`, `city`, `nib`, `userid`) VALUES
(1, 987654321, 'pedro Lourenço', 987654321, 'fewf', 21, NULL, 'Leiria', NULL, 9),
(2, 123456789, 'testes signup 4th', 987654321, 'fewf', 21, 1, 'Leiria', NULL, 15);

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
-- ------------------------------------------
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
  ADD CONSTRAINT `fk_userprofile_id_reviews` FOREIGN KEY (`userprofilesid`) REFERENCES `userprofiles` (`id`),
  ADD CONSTRAINT `fk_salesmeals_idmeal_reviews` FOREIGN KEY (`sales_mealsidmeal`) REFERENCES `sales_meals` (`mealid`),
  ADD CONSTRAINT `fk_salesmeals_idsales_reviews` FOREIGN KEY (`sales_mealsidsales`) REFERENCES `sales_meals` (`salesid`);
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
-- CONSTRAINTS FOR TABLES
--
-- Constraints for table `vitamins`
--
ALTER TABLE `vitamins`
  ADD CONSTRAINT `fk_ingredientsid_vitamins` FOREIGN KEY (`ingredientsid`) REFERENCES `ingredients` (`id`);
-- ------------------------------------------
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
