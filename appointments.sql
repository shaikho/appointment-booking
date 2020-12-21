-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Dec 17, 2020 at 02:04 PM
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
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `start_time`, `finish_time`, `price`, `status`, `comments`, `created_at`, `updated_at`, `deleted_at`, `client_id`, `employee_id`, `user_id`) VALUES
(41, '2020-12-17 11:45:00', '2020-12-17 14:45:00', NULL, 'D', NULL, '2020-12-17 07:48:12', '2020-12-17 07:48:12', NULL, 19, 2, NULL),
(40, '2020-12-17 15:00:00', '2020-12-17 18:00:00', NULL, 'P', 'any comment', '2020-12-17 06:07:10', '2020-12-17 07:48:32', NULL, 19, 6, NULL),
(39, '2020-12-17 13:00:00', '2020-12-17 14:00:00', NULL, 'A', 'dental cleanup', '2020-12-17 05:52:53', '2020-12-17 06:00:27', NULL, 19, 3, NULL),
(38, '2020-12-17 09:00:00', '2020-12-17 11:00:00', NULL, 'A', 'dental cleaning', '2020-12-17 05:26:05', '2020-12-17 05:34:21', NULL, 17, 2, NULL),
(37, '2020-12-17 05:30:00', '2020-12-17 07:00:00', NULL, 'A', 'dental check', '2020-12-17 05:11:28', '2020-12-17 05:34:51', '2020-12-17 05:34:51', 2, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `appointment_service`
--

DROP TABLE IF EXISTS `appointment_service`;
CREATE TABLE IF NOT EXISTS `appointment_service` (
  `appointment_id` int(10) UNSIGNED NOT NULL,
  `service_id` int(10) UNSIGNED NOT NULL,
  KEY `appointment_id_fk_360720` (`appointment_id`),
  KEY `service_id_fk_360720` (`service_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointment_service`
--

INSERT INTO `appointment_service` (`appointment_id`, `service_id`) VALUES
(11, 1),
(11, 2),
(11, 3),
(11, 4),
(11, 5),
(11, 6),
(11, 7),
(11, 8),
(11, 9),
(11, 10),
(12, 5),
(13, 2),
(14, 1),
(14, 2),
(14, 3),
(14, 4),
(14, 5),
(14, 6),
(14, 7),
(14, 8),
(14, 9),
(14, 10),
(15, 4),
(15, 9),
(15, 10),
(16, 4),
(16, 6),
(16, 7),
(16, 10),
(17, 2),
(17, 4),
(17, 6),
(17, 8),
(17, 10),
(18, 3),
(18, 6),
(18, 8),
(18, 9),
(19, 3),
(19, 7),
(19, 8),
(20, 3),
(20, 7),
(20, 8),
(21, 2),
(22, 2),
(22, 3),
(22, 5),
(22, 6),
(22, 7),
(22, 8),
(22, 9),
(23, 5),
(24, 5),
(25, 3),
(25, 4),
(25, 7),
(25, 9),
(25, 10),
(26, 7),
(27, 1),
(27, 2),
(27, 3),
(27, 4),
(27, 5),
(27, 6),
(27, 7),
(27, 8),
(27, 9),
(27, 10),
(28, 5),
(29, 3),
(30, 2),
(30, 6),
(30, 9),
(30, 10),
(31, 2),
(31, 3),
(31, 5),
(31, 7),
(31, 9),
(32, 2),
(32, 3),
(32, 5),
(32, 7),
(32, 9),
(33, 2),
(33, 3),
(33, 4),
(33, 6),
(33, 8),
(33, 9),
(34, 2),
(34, 3),
(34, 4),
(34, 5),
(34, 9),
(36, 2),
(36, 3),
(36, 4),
(36, 5),
(36, 6),
(36, 9),
(37, 3),
(38, 3),
(39, 2),
(40, 11),
(41, 5);

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `phone`, `email`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Candice Hessel III', '(352) 858-3330 x897', 'vito.halvorson@west.org', '2020-12-11 20:02:15', '2020-12-11 20:02:15', NULL),
(2, 'Alexys McCullough', '(570) 398-4883 x0880', 'owilkinson@kuvalis.com', '2020-12-11 20:02:15', '2020-12-11 20:02:15', NULL),
(3, 'Miss Genesis Hoeger', '767.356.8441 x7868', 'turner.jacinthe@gleichner.com', '2020-12-11 20:02:15', '2020-12-11 20:02:15', NULL),
(4, 'Maximus Pfannerstill Sr.', '(693) 289-8319', 'abecker@goldner.com', '2020-12-11 20:02:15', '2020-12-11 20:02:15', NULL),
(5, 'Janie Konopelski', '921.916.1219', 'grant.ocie@abshire.com', '2020-12-11 20:02:15', '2020-12-11 20:02:15', NULL),
(6, 'Nella Fadel', '+13756921967', 'grant.shawna@jast.info', '2020-12-11 20:02:15', '2020-12-11 20:02:15', NULL),
(7, 'Verda Rowe', '474.775.6170 x59043', 'graciela.swift@yahoo.com', '2020-12-11 20:02:15', '2020-12-11 20:02:15', NULL),
(8, 'Miss Eudora O\'Connell', '568-440-7046', 'zjohns@yahoo.com', '2020-12-11 20:02:15', '2020-12-11 20:02:15', NULL),
(9, 'Frank Kovacek', '518.614.0813 x83565', 'lindsay.miller@mraz.com', '2020-12-11 20:02:15', '2020-12-11 20:02:15', NULL),
(10, 'Jarvis O\'Keefe', '1-612-739-0067', 'arjun.pagac@erdman.com', '2020-12-11 20:02:15', '2020-12-11 20:02:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
CREATE TABLE IF NOT EXISTS `employees` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `email`, `phone`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Vernice Walker', 'bette.quitzon@yahoo.com', '951.412.1911', '2020-12-11 20:02:15', '2020-12-11 20:02:15', NULL),
(2, 'Frederick Bradtke', 'corwin.estell@yahoo.com', '1-216-845-9930 x80051', '2020-12-11 20:02:15', '2020-12-11 20:02:15', NULL),
(3, 'Charlotte Dickens', 'murray.greta@kiehn.com', '1-790-873-1018', '2020-12-11 20:02:15', '2020-12-11 20:02:15', NULL),
(4, 'Dr. Barry Balistreri II', 'qbednar@cremin.com', '1-914-879-0774 x0122', '2020-12-11 20:02:15', '2020-12-11 20:02:15', NULL),
(5, 'Arnoldo Nikolaus', 'homenick.sallie@hotmail.com', '426.806.2924 x119', '2020-12-11 20:02:15', '2020-12-11 20:02:15', NULL),
(6, 'eyes department', 'eye@eyes.com', '0509999999', '2020-12-17 06:05:10', '2020-12-17 06:05:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee_service`
--

DROP TABLE IF EXISTS `employee_service`;
CREATE TABLE IF NOT EXISTS `employee_service` (
  `employee_id` int(10) UNSIGNED NOT NULL,
  `service_id` int(10) UNSIGNED NOT NULL,
  KEY `employee_id_fk_360622` (`employee_id`),
  KEY `service_id_fk_360622` (`service_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_service`
--

INSERT INTO `employee_service` (`employee_id`, `service_id`) VALUES
(6, 11);

-- --------------------------------------------------------

--
-- Table structure for table `limitations`
--

DROP TABLE IF EXISTS `limitations`;
CREATE TABLE IF NOT EXISTS `limitations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `limitation` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `limit` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `limitations`
--

INSERT INTO `limitations` (`id`, `limitation`, `limit`, `deleted_at`, `updated_at`, `created_at`) VALUES
(1, 'allowed_days', '[6,5]', NULL, '2020-12-17 08:03:30', NULL),
(2, 'maximum_appointments_per_day', '7', NULL, '2020-12-17 08:02:26', NULL),
(3, 'appointment_duration_per_day', '3', NULL, '2020-12-12 11:43:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

DROP TABLE IF EXISTS `media`;
CREATE TABLE IF NOT EXISTS `media` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `model_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collection_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `conversions_disk` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` bigint(20) UNSIGNED NOT NULL,
  `manipulations` json NOT NULL,
  `custom_properties` json NOT NULL,
  `responsive_images` json NOT NULL,
  `order_column` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `media_model_type_model_id_index` (`model_type`,`model_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(3, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(4, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(5, '2016_06_01_000004_create_oauth_clients_table', 1),
(6, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(7, '2019_09_19_000000_create_media_table', 1),
(8, '2019_09_19_000001_create_permissions_table', 1),
(9, '2019_09_19_000002_create_roles_table', 1),
(10, '2019_09_19_000003_create_users_table', 1),
(11, '2019_09_19_000004_create_services_table', 1),
(12, '2019_09_19_000005_create_employees_table', 1),
(13, '2019_09_19_000006_create_clients_table', 1),
(14, '2019_09_19_000007_create_appointments_table', 1),
(15, '2019_09_19_000008_create_permission_role_pivot_table', 1),
(16, '2019_09_19_000009_create_role_user_pivot_table', 1),
(17, '2019_09_19_000010_create_employee_service_pivot_table', 1),
(18, '2019_09_19_000011_create_appointment_service_pivot_table', 1),
(19, '2019_09_19_000012_add_relationship_fields_to_appointments_table', 1),
(20, '2020_12_04_164638_add_appointment_status_to_appointments_table', 1),
(21, '2020_12_05_190958_add_gender_age_to_users_table', 1),
(22, '2020_12_11_133456_add_phone_to_users_table', 1),
(23, '2020_12_11_171926_create_limitations_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

DROP TABLE IF EXISTS `oauth_access_tokens`;
CREATE TABLE IF NOT EXISTS `oauth_access_tokens` (
  `id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

DROP TABLE IF EXISTS `oauth_auth_codes`;
CREATE TABLE IF NOT EXISTS `oauth_auth_codes` (
  `id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_auth_codes_user_id_index` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

DROP TABLE IF EXISTS `oauth_clients`;
CREATE TABLE IF NOT EXISTS `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

DROP TABLE IF EXISTS `oauth_personal_access_clients`;
CREATE TABLE IF NOT EXISTS `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

DROP TABLE IF EXISTS `oauth_refresh_tokens`;
CREATE TABLE IF NOT EXISTS `oauth_refresh_tokens` (
  `id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'user_management_access', '2019-09-19 10:14:15', '2019-09-19 10:14:15', NULL),
(2, 'permission_create', '2019-09-19 10:14:15', '2019-09-19 10:14:15', NULL),
(3, 'permission_edit', '2019-09-19 10:14:15', '2019-09-19 10:14:15', NULL),
(4, 'permission_show', '2019-09-19 10:14:15', '2019-09-19 10:14:15', NULL),
(5, 'permission_delete', '2019-09-19 10:14:15', '2019-09-19 10:14:15', NULL),
(6, 'permission_access', '2019-09-19 10:14:15', '2019-09-19 10:14:15', NULL),
(7, 'role_create', '2019-09-19 10:14:15', '2019-09-19 10:14:15', NULL),
(8, 'role_edit', '2019-09-19 10:14:15', '2019-09-19 10:14:15', NULL),
(9, 'role_show', '2019-09-19 10:14:15', '2019-09-19 10:14:15', NULL),
(10, 'role_delete', '2019-09-19 10:14:15', '2019-09-19 10:14:15', NULL),
(11, 'role_access', '2019-09-19 10:14:15', '2019-09-19 10:14:15', NULL),
(12, 'user_create', '2019-09-19 10:14:15', '2019-09-19 10:14:15', NULL),
(13, 'user_edit', '2019-09-19 10:14:15', '2019-09-19 10:14:15', NULL),
(14, 'user_show', '2019-09-19 10:14:15', '2019-09-19 10:14:15', NULL),
(15, 'user_delete', '2019-09-19 10:14:15', '2019-09-19 10:14:15', NULL),
(16, 'user_access', '2019-09-19 10:14:15', '2019-09-19 10:14:15', NULL),
(17, 'service_create', '2019-09-19 10:14:15', '2019-09-19 10:14:15', NULL),
(18, 'service_edit', '2019-09-19 10:14:15', '2019-09-19 10:14:15', NULL),
(19, 'service_show', '2019-09-19 10:14:15', '2019-09-19 10:14:15', NULL),
(20, 'service_delete', '2019-09-19 10:14:15', '2019-09-19 10:14:15', NULL),
(21, 'service_access', '2019-09-19 10:14:15', '2019-09-19 10:14:15', NULL),
(22, 'employee_create', '2019-09-19 10:14:15', '2019-09-19 10:14:15', NULL),
(23, 'employee_edit', '2019-09-19 10:14:15', '2019-09-19 10:14:15', NULL),
(24, 'employee_show', '2019-09-19 10:14:15', '2019-09-19 10:14:15', NULL),
(25, 'employee_delete', '2019-09-19 10:14:15', '2019-09-19 10:14:15', NULL),
(26, 'employee_access', '2019-09-19 10:14:15', '2019-09-19 10:14:15', NULL),
(32, 'appointment_create', '2019-09-19 10:14:15', '2019-09-19 10:14:15', NULL),
(33, 'appointment_edit', '2019-09-19 10:14:15', '2019-09-19 10:14:15', NULL),
(34, 'appointment_show', '2019-09-19 10:14:15', '2019-09-19 10:14:15', NULL),
(35, 'appointment_delete', '2019-09-19 10:14:15', '2019-09-19 10:14:15', NULL),
(36, 'appointment_access', '2019-09-19 10:14:15', '2019-09-19 10:14:15', NULL),
(41, 'draft_appointment_access', '2019-09-19 10:14:15', '2019-09-19 10:14:15', NULL),
(37, 'pending_appointment_access', '2019-09-19 10:14:15', '2019-09-19 10:14:15', NULL),
(38, 'approved_appointment_access', '2019-09-19 10:14:15', '2019-09-19 10:14:15', NULL),
(39, 'approve_appointments', '2019-09-19 10:14:15', '2019-09-19 10:14:15', NULL),
(40, 'decline_appointments', '2019-09-19 10:14:15', '2019-09-19 10:14:15', NULL),
(42, 'submit_appointments', '2019-09-19 10:14:15', '2019-09-19 10:14:15', NULL),
(43, 'limitations_management', '2020-12-11 20:58:57', '2020-12-11 20:58:57', NULL),
(44, 'limitations_edit', '2020-12-11 21:15:48', '2020-12-11 21:15:48', NULL),
(45, 'all_appointments', '2020-12-17 04:37:06', '2020-12-17 04:37:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

DROP TABLE IF EXISTS `permission_role`;
CREATE TABLE IF NOT EXISTS `permission_role` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL,
  KEY `role_id_fk_360589` (`role_id`),
  KEY `permission_id_fk_360589` (`permission_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 16),
(1, 17),
(1, 18),
(1, 19),
(1, 20),
(1, 21),
(1, 22),
(1, 23),
(1, 24),
(1, 25),
(1, 26),
(1, 32),
(1, 33),
(1, 34),
(1, 35),
(1, 36),
(1, 41),
(1, 37),
(1, 38),
(1, 39),
(1, 40),
(1, 42),
(2, 19),
(2, 21),
(2, 14),
(2, 13),
(2, 24),
(1, 44),
(2, 26),
(2, 32),
(2, 33),
(2, 34),
(2, 35),
(2, 36),
(2, 41),
(2, 37),
(2, 38),
(1, 43),
(2, 16),
(2, 42),
(4, 34),
(4, 36),
(4, 45),
(3, 14),
(3, 16),
(3, 17),
(3, 18),
(3, 19),
(3, 20),
(3, 21),
(3, 22),
(3, 23),
(3, 24),
(3, 25),
(3, 26),
(3, 32),
(3, 33),
(3, 34),
(3, 35),
(3, 36),
(3, 37),
(3, 38),
(3, 39),
(3, 40),
(3, 43),
(3, 44),
(3, 45);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', '2019-09-19 10:08:28', '2019-09-19 10:08:28', NULL),
(2, 'Customer', '2019-09-19 10:08:28', '2019-09-19 10:08:28', NULL),
(3, 'Organization', '2019-09-19 10:08:28', '2019-09-19 10:08:28', NULL),
(4, 'receptionist', '2020-12-15 07:20:43', '2020-12-15 07:20:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

DROP TABLE IF EXISTS `role_user`;
CREATE TABLE IF NOT EXISTS `role_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  KEY `user_id_fk_360598` (`user_id`),
  KEY `role_id_fk_360598` (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(1, 1),
(2, 2),
(3, 2),
(4, 2),
(5, 2),
(6, 2),
(7, 2),
(8, 2),
(9, 2),
(10, 2),
(11, 2),
(12, 4),
(13, 3),
(14, 2),
(15, 2),
(16, 2),
(17, 2),
(18, 2),
(19, 2),
(20, 2),
(21, 2);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(15,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `price`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'esse', '21.00', '2020-12-11 20:02:15', '2020-12-11 20:02:15', NULL),
(2, 'commodi', '93.00', '2020-12-11 20:02:15', '2020-12-11 20:02:15', NULL),
(3, 'praesentium', '78.00', '2020-12-11 20:02:15', '2020-12-11 20:02:15', NULL),
(4, 'illo', '56.00', '2020-12-11 20:02:15', '2020-12-11 20:02:15', NULL),
(5, 'consequatur', '13.00', '2020-12-11 20:02:15', '2020-12-11 20:02:15', NULL),
(6, 'cumque', '35.00', '2020-12-11 20:02:15', '2020-12-11 20:02:15', NULL),
(7, 'tempore', '21.00', '2020-12-11 20:02:15', '2020-12-11 20:02:15', NULL),
(8, 'rerum', '24.00', '2020-12-11 20:02:15', '2020-12-11 20:02:15', NULL),
(9, 'nostrum', '13.00', '2020-12-11 20:02:15', '2020-12-11 20:02:15', NULL),
(10, 'voluptas', '20.00', '2020-12-11 20:02:15', '2020-12-11 20:02:15', NULL),
(11, 'eye checkup', '1000.00', '2020-12-17 06:04:36', '2020-12-17 06:04:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `age`, `gender`, `email`, `phone`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', NULL, NULL, 'admin@admin.com', NULL, NULL, '$2y$10$5jMSFqk0WtypLxWTcknMHOd2WiNDuE3C6ElThTSiQsSZuR/pIx.2G', NULL, '2019-09-19 10:08:28', '2019-09-19 10:08:28', NULL),
(2, 'TEST', '100', 'M', 'test@test.com', '0908648033', NULL, '$2y$10$n0bhKB7/2aJljAduUbpWiuqiNNSVUguhJStYC//.uxhhSSbDUAgL2', NULL, '2020-12-11 20:05:04', '2020-12-12 18:50:09', NULL),
(3, 'Duncan Chen', '9', 'F', 'alsotest@alsotest.com', '0509999999', NULL, '$2y$10$9v2It0Vsv0Dv6vAJX5KbReecqiN4FRUFhbhBnS/BIgmskGBYlR7Fq', NULL, '2020-12-11 20:30:03', '2020-12-12 07:13:24', NULL),
(9, 'Paula Lynch', '39', 'M', 'lyke3ve@mailinator.com', '0509999999', NULL, '$2y$10$1GnNJc3hMZMvEMWMWAQ3YuG3EkAp3IsgwRzwfuELAP//5uKhHMzha', NULL, '2020-12-16 13:37:45', '2020-12-16 13:37:45', NULL),
(8, 'Emma Hardy', '0', 'M', 'cuni@mailinator.com', '0908648033', NULL, '$2y$10$JRqfNO3ng8yqTRPpT.B4LOqF3HiUVvCkTVlDuT2R1zqyhNmlIwHpi', NULL, '2020-12-16 13:36:43', '2020-12-16 13:36:43', NULL),
(17, 'Emma Hardy', '0', 'F', 'cadugori@mailinator.com', '0908648033', NULL, '$2y$10$16zuQzcX3v70gkWsTNTV6uEIT9NB4jFO3mIlRjJ/nR/Iwmt285.cy', NULL, '2020-12-16 13:36:22', '2020-12-16 13:36:22', NULL),
(10, 'Emma Hardy', '24', 'M', 'peq4of@mailinator.com', '0908648033', NULL, '$2y$10$CcneN7lXlEBLx5AUTj9g3.DHiSJTu8gOlSOSDTR2q.D1RDg7YetUS', NULL, '2020-12-16 13:39:29', '2020-12-16 13:39:29', NULL),
(14, 'Martina Carver', '92', 'M', 'qefylaxix@mailinator.com', '0908648033', NULL, '$2y$10$lDYddZAD8YvBZRdAOL5bwe8.H6P/cZufrPl.WHi/XVTqmDQWQzP9u', NULL, '2020-12-17 05:06:26', '2020-12-17 05:06:26', NULL),
(12, 'receiption', NULL, NULL, 'receiption@receiption.com', NULL, NULL, '$2y$10$3IHcfzg9t89H.gWPf9/jR.QAqFOBnXFpoMu0srByxz7.a2CwKwLYe', NULL, '2020-12-17 04:38:02', '2020-12-17 04:38:02', NULL),
(13, 'Organization', NULL, NULL, 'organization@organization.com', NULL, NULL, '$2y$10$xR3H7qBXQYvOE8y9f3EuruDbOdv57RvdwZvA73TMKyiBHDEVnDL2m', NULL, '2020-12-17 05:05:36', '2020-12-17 05:05:36', NULL),
(19, 'shaikh diya', '24', 'M', 'alshak.diya@hotmail.com', '0908648033', '2020-12-17 07:50:25', '$2y$10$NV1Ry.SW4QQzRJQweeEhMuTUoqz4Ev68uDBklWeZc8oyrGNfXckxa', NULL, '2020-12-17 05:50:05', '2020-12-17 09:07:14', NULL),
(20, 'Paula Lynch', '30', 'M', 'zoxyhi4japi@mailinator.com', '0509999999', NULL, '$2y$10$Ug7/c0nXQn2TKGh5TYMbX.v4kMKKhDuQrQMVJUNvnl4MMXNcD9heK', NULL, '2020-12-17 11:12:18', '2020-12-17 11:12:18', NULL),
(21, 'shaikh diya aldeen', '91', 'F', 'als33hak.diya@outlook.com', '0908648033', NULL, '$2y$10$JWYc7SJL7TaLzCk0UoOlf.nZM.ShVIgLuzEvrG4Zbmd8a8kCYgvUC', NULL, '2020-12-17 11:12:41', '2020-12-17 11:12:41', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
