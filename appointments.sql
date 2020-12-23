-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Dec 23, 2020 at 11:00 AM
-- Server version: 8.0.18
-- PHP Version: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `appointments`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

DROP TABLE IF EXISTS `appointments`;
CREATE TABLE IF NOT EXISTS `appointments` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `start_time` datetime NOT NULL,
  `finish_time` datetime NOT NULL,
  `price` decimal(15,2) DEFAULT NULL,
  `status` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'D',
  `comments` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `employee_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `client_fk_360714` (`client_id`),
  KEY `employee_fk_360715` (`employee_id`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `start_time`, `finish_time`, `price`, `status`, `comments`, `created_at`, `updated_at`, `deleted_at`, `client_id`, `employee_id`, `user_id`) VALUES
(43, '2020-12-18 19:30:00', '2020-12-18 20:30:00', NULL, 'A', NULL, '2020-12-18 15:25:57', '2020-12-23 08:57:37', NULL, 19, 2, NULL),
(40, '2020-12-17 15:00:00', '2020-12-17 18:00:00', NULL, 'A', 'any comment', '2020-12-17 06:07:10', '2020-12-23 08:57:45', NULL, 19, 6, NULL),
(39, '2020-12-17 13:00:00', '2020-12-17 14:00:00', NULL, 'A', 'dental cleanup', '2020-12-17 05:52:53', '2020-12-21 06:33:52', '2020-12-21 06:33:52', 19, 3, NULL),
(38, '2020-12-17 09:00:00', '2020-12-17 11:00:00', NULL, 'A', 'dental cleaning', '2020-12-17 05:26:05', '2020-12-17 05:34:21', NULL, 17, 2, NULL),
(37, '2020-12-17 05:30:00', '2020-12-17 07:00:00', NULL, 'A', 'dental check', '2020-12-17 05:11:28', '2020-12-17 05:34:51', '2020-12-17 05:34:51', 2, 1, NULL),
(44, '2020-12-25 12:56:00', '2020-12-25 13:56:00', NULL, 'A', NULL, '2020-12-23 08:56:45', '2020-12-23 08:57:22', NULL, 19, 1, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
