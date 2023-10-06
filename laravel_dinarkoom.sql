-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2023 at 02:10 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_dinarkoom`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dir` tinyint(4) NOT NULL COMMENT '0 => right - 1 => left',
  `image` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `dir`, `image`, `url`, `created_at`, `updated_at`) VALUES
(1, 0, 'banners/gKzJxPef7oeAUF2TrlKnJiNt9dbDoNluykEXglVx.jpg', 'https://www.google.com/', '2023-10-06 06:47:31', '2023-10-06 08:19:14'),
(2, 1, 'banners/8n3ql96dNZRuaKKPXoG8moE2bZNVvwVMqG15te7N.jpg', 'https://www.google.com/', '2023-10-06 06:47:43', '2023-10-06 08:19:33');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `message` longtext NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 => admin did''nt replay',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `replay_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `phone`, `message`, `status`, `created_at`, `updated_at`, `replay_id`) VALUES
(1, 'Anita Stracke', 'your.email+fakedata86281@gmail.com', '239-447-0781', 'Voluptatibus quod quidem eum necessitatibus a iure ut quam.', 1, '2023-09-29 20:21:20', '2023-09-29 23:41:11', NULL),
(2, 'Lia Gottlieb', 'your.email+fakedata27330@gmail.com', '840-541-5594', 'Doloremque eaque aliquid porro pariatur voluptas aperiam porro beatae odio.', 1, '2023-09-29 20:23:09', '2023-10-01 03:15:13', NULL),
(4, 'Test User', 'test@example.com', '(737) 437-0101', '<p>this in not what happend</p>', 0, '2023-09-29 23:41:11', '2023-09-29 23:41:11', 1),
(5, 'Alycia Beatty', 'your.email+fakedata23413@gmail.com', '011-683-7815', 'Nostrum possimus pariatur quaerat repudiandae sunt at.', 0, '2023-10-01 03:10:35', '2023-10-01 03:10:35', NULL),
(6, 'Test Admin', 'test@example.com', '(737) 437-0101', '<p>;lj;lkj;lksadjf;lkajdsf;lajds;lfja;dsl</p>', 0, '2023-10-01 03:15:13', '2023-10-01 03:15:13', 2),
(7, 'Jessyca Beier', 'your.email+fakedata74497@gmail.com', '299-826-5128', 'Eligendi debitis dolorem adipisci voluptatibus inventore ipsa laborum adipisci.', 0, '2023-10-06 06:02:48', '2023-10-06 06:02:48', NULL),
(8, 'Kareem Casper', 'your.email+fakedata77888@gmail.com', '971-239-7987', 'Optio consectetur minus eaque pariatur nemo vero sapiente dolorum reiciendis.', 1, '2023-10-06 06:11:08', '2023-10-06 06:53:38', NULL),
(9, 'Admin', 'test@example.com', '(737) 437-0101', '<h3>falsdfjasldf;ja</h3>', 0, '2023-10-06 06:53:38', '2023-10-06 06:53:38', 8),
(10, 'Nikolas Conroy', 'your.email+fakedata88013@gmail.com', '450-589-0699', 'Itaque minus molestiae quia ipsum qui.', 1, '2023-10-06 07:45:13', '2023-10-06 08:24:29', NULL),
(11, 'Super Admin', 'test@example.com', '(737) 437-0101', '<h3>sfjasldjfalsjdfa;sd</h3>', 0, '2023-10-06 08:24:29', '2023-10-06 08:24:29', 10);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `price` double(8,2) NOT NULL,
  `offer` double(8,2) NOT NULL DEFAULT 0.00,
  `month` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 => false - 1 => true',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `thumbnail`, `user_id`, `price`, `offer`, `month`, `qty`, `active`, `created_at`, `updated_at`) VALUES
(1, 'images/5bgyRG5kMmKw4d5k2UIs9rMwQ5S9KssdW3K5JoPQ.jpg', 2, 380.00, 337.00, '10', 99, 0, '2023-10-01 03:13:55', '2023-10-06 06:44:41'),
(2, 'images/1wqSPiOsvuZm8BIy28OiF499NSSOcCSeYMnFO8wF.png', 2, 383.00, 0.00, '10', 9996, 1, '2023-10-02 18:46:09', '2023-10-06 08:20:32');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_09_26_180340_create_contact_us_table', 1),
(7, '2023_09_28_120022_create_banners_table', 1),
(8, '2023_09_28_170058_create_images_table', 1),
(9, '2023_09_29_174816_create_text_pages_table', 1),
(10, '2023_09_30_020925_add_replay_id_to_contact_us_table', 2),
(11, '2023_09_30_025325_add_last_activity_column_to_users', 3),
(12, '2023_09_30_034541_create_settings_table', 4),
(13, '2023_09_30_121153_create_relative_types_table', 5),
(14, '2023_09_30_121305_create_relatives_table', 5),
(15, '2023_10_01_155742_add_images_to_settings_table', 6),
(16, '2023_10_02_161931_add_guest_columns_to_users_table', 7),
(19, '2023_10_02_192927_create_orders_table', 8),
(20, '2023_10_03_154329_create_permission_tables', 9),
(22, '2023_10_04_173918_add_address_to_orders_table', 10),
(24, '2023_10_04_174717_create_notifications_table', 11),
(26, '2023_10_05_061531_create_winners_table', 12),
(27, '2023_10_05_115427_add_code_to_orders_table', 13),
(28, '2023_10_05_182046_add_value_to_winners_table', 14),
(29, '2023_10_06_055554_add_welcome_message_to_settings_table', 15);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 2),
(1, 'App\\Models\\User', 16),
(2, 'App\\Models\\User', 3),
(2, 'App\\Models\\User', 9),
(2, 'App\\Models\\User', 11),
(3, 'App\\Models\\User', 12),
(3, 'App\\Models\\User', 19),
(3, 'App\\Models\\User', 20),
(3, 'App\\Models\\User', 23),
(4, 'App\\Models\\User', 22);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title_en` varchar(255) NOT NULL,
  `title_ar` varchar(255) NOT NULL,
  `title_ur` varchar(255) NOT NULL,
  `title_fil` varchar(255) NOT NULL,
  `body_en` text NOT NULL,
  `body_ar` text NOT NULL,
  `body_ur` text NOT NULL,
  `body_fil` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `user_id`, `title_en`, `title_ar`, `title_ur`, `title_fil`, `body_en`, `body_ar`, `body_ur`, `body_fil`, `created_at`, `updated_at`) VALUES
(7, 12, 'en', 'ar', 'ur', 'fil', 'en', 'ar', 'ur', 'fil', '2023-10-06 04:55:21', '2023-10-06 04:55:21'),
(8, 16, 'en', 'ar', 'ur', 'fil', 'en', 'ar', 'ur', 'fil', '2023-10-06 04:55:21', '2023-10-06 04:55:21'),
(9, 19, 'en', 'ar', 'ur', 'fil', 'en', 'ar', 'ur', 'fil', '2023-10-06 04:55:21', '2023-10-06 04:55:21'),
(10, 20, 'en', 'ar', 'ur', 'fil', 'en', 'ar', 'ur', 'fil', '2023-10-06 04:55:21', '2023-10-06 04:55:21'),
(13, 3, 'en', 'ar', 'ur', 'fil', 'teeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeest', 'teeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeest', 'teeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeest', 'teeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeest', '2023-10-06 06:46:28', '2023-10-06 06:46:28'),
(14, 9, 'en', 'ar', 'ur', 'fil', 'teeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeest', 'teeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeest', 'teeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeest', 'teeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeest', '2023-10-06 06:46:28', '2023-10-06 06:46:28'),
(15, 10, 'en', 'ar', 'ur', 'fil', 'teeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeest', 'teeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeest', 'teeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeest', 'teeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeest', '2023-10-06 06:46:28', '2023-10-06 06:46:28'),
(16, 11, 'en', 'ar', 'ur', 'fil', 'teeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeest', 'teeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeest', 'teeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeest', 'teeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeest', '2023-10-06 06:46:28', '2023-10-06 06:46:28'),
(17, 12, 'en', 'ar', 'ur', 'fil', 'teeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeest', 'teeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeest', 'teeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeest', 'teeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeest', '2023-10-06 06:46:28', '2023-10-06 06:46:28'),
(18, 13, 'en', 'ar', 'ur', 'fil', 'teeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeest', 'teeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeest', 'teeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeest', 'teeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeest', '2023-10-06 06:46:28', '2023-10-06 06:46:28'),
(19, 14, 'en', 'ar', 'ur', 'fil', 'teeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeest', 'teeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeest', 'teeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeest', 'teeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeest', '2023-10-06 06:46:28', '2023-10-06 06:46:28'),
(20, 15, 'en', 'ar', 'ur', 'fil', 'teeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeest', 'teeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeest', 'teeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeest', 'teeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeest', '2023-10-06 06:46:28', '2023-10-06 06:46:28'),
(21, 16, 'en', 'ar', 'ur', 'fil', 'teeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeest', 'teeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeest', 'teeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeest', 'teeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeest', '2023-10-06 06:46:28', '2023-10-06 06:46:28'),
(22, 17, 'en', 'ar', 'ur', 'fil', 'teeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeest', 'teeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeest', 'teeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeest', 'teeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeest', '2023-10-06 06:46:28', '2023-10-06 06:46:28'),
(23, 18, 'en', 'ar', 'ur', 'fil', 'teeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeest', 'teeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeest', 'teeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeest', 'teeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeest', '2023-10-06 06:46:28', '2023-10-06 06:46:28'),
(24, 19, 'en', 'ar', 'ur', 'fil', 'teeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeest', 'teeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeest', 'teeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeest', 'teeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeest', '2023-10-06 06:46:28', '2023-10-06 06:46:28'),
(25, 20, 'en', 'ar', 'ur', 'fil', 'teeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeest', 'teeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeest', 'teeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeest', 'teeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeest', '2023-10-06 06:46:28', '2023-10-06 06:46:28'),
(26, 22, 'en', 'ar', 'ur', 'fil', 'teeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeest', 'teeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeest', 'teeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeest', 'teeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeest', '2023-10-06 06:46:28', '2023-10-06 06:46:28'),
(27, 23, 'en', 'ar', 'ur', 'fil', 'teeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeest', 'teeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeest', 'teeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeest', 'teeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeest', '2023-10-06 06:46:28', '2023-10-06 06:46:28'),
(28, 2, 'Senior Assurance Director', 'Paige', 'Paige', 'Paige', 'Labore exercitationem dolore mollitia.', 'International Metrics Analyst', 'International Metrics Analyst', 'International Metrics Analyst', '2023-10-06 08:18:03', '2023-10-06 08:18:03'),
(29, 3, 'Senior Assurance Director', 'Paige', 'Paige', 'Paige', 'Labore exercitationem dolore mollitia.', 'International Metrics Analyst', 'International Metrics Analyst', 'International Metrics Analyst', '2023-10-06 08:18:03', '2023-10-06 08:18:03'),
(30, 9, 'Senior Assurance Director', 'Paige', 'Paige', 'Paige', 'Labore exercitationem dolore mollitia.', 'International Metrics Analyst', 'International Metrics Analyst', 'International Metrics Analyst', '2023-10-06 08:18:03', '2023-10-06 08:18:03'),
(31, 10, 'Senior Assurance Director', 'Paige', 'Paige', 'Paige', 'Labore exercitationem dolore mollitia.', 'International Metrics Analyst', 'International Metrics Analyst', 'International Metrics Analyst', '2023-10-06 08:18:03', '2023-10-06 08:18:03'),
(32, 11, 'Senior Assurance Director', 'Paige', 'Paige', 'Paige', 'Labore exercitationem dolore mollitia.', 'International Metrics Analyst', 'International Metrics Analyst', 'International Metrics Analyst', '2023-10-06 08:18:03', '2023-10-06 08:18:03'),
(33, 12, 'Senior Assurance Director', 'Paige', 'Paige', 'Paige', 'Labore exercitationem dolore mollitia.', 'International Metrics Analyst', 'International Metrics Analyst', 'International Metrics Analyst', '2023-10-06 08:18:03', '2023-10-06 08:18:03'),
(34, 13, 'Senior Assurance Director', 'Paige', 'Paige', 'Paige', 'Labore exercitationem dolore mollitia.', 'International Metrics Analyst', 'International Metrics Analyst', 'International Metrics Analyst', '2023-10-06 08:18:03', '2023-10-06 08:18:03'),
(35, 14, 'Senior Assurance Director', 'Paige', 'Paige', 'Paige', 'Labore exercitationem dolore mollitia.', 'International Metrics Analyst', 'International Metrics Analyst', 'International Metrics Analyst', '2023-10-06 08:18:03', '2023-10-06 08:18:03'),
(36, 15, 'Senior Assurance Director', 'Paige', 'Paige', 'Paige', 'Labore exercitationem dolore mollitia.', 'International Metrics Analyst', 'International Metrics Analyst', 'International Metrics Analyst', '2023-10-06 08:18:04', '2023-10-06 08:18:04'),
(37, 16, 'Senior Assurance Director', 'Paige', 'Paige', 'Paige', 'Labore exercitationem dolore mollitia.', 'International Metrics Analyst', 'International Metrics Analyst', 'International Metrics Analyst', '2023-10-06 08:18:04', '2023-10-06 08:18:04'),
(38, 17, 'Senior Assurance Director', 'Paige', 'Paige', 'Paige', 'Labore exercitationem dolore mollitia.', 'International Metrics Analyst', 'International Metrics Analyst', 'International Metrics Analyst', '2023-10-06 08:18:04', '2023-10-06 08:18:04'),
(39, 18, 'Senior Assurance Director', 'Paige', 'Paige', 'Paige', 'Labore exercitationem dolore mollitia.', 'International Metrics Analyst', 'International Metrics Analyst', 'International Metrics Analyst', '2023-10-06 08:18:04', '2023-10-06 08:18:04'),
(40, 19, 'Senior Assurance Director', 'Paige', 'Paige', 'Paige', 'Labore exercitationem dolore mollitia.', 'International Metrics Analyst', 'International Metrics Analyst', 'International Metrics Analyst', '2023-10-06 08:18:04', '2023-10-06 08:18:04'),
(41, 20, 'Senior Assurance Director', 'Paige', 'Paige', 'Paige', 'Labore exercitationem dolore mollitia.', 'International Metrics Analyst', 'International Metrics Analyst', 'International Metrics Analyst', '2023-10-06 08:18:04', '2023-10-06 08:18:04'),
(42, 22, 'Senior Assurance Director', 'Paige', 'Paige', 'Paige', 'Labore exercitationem dolore mollitia.', 'International Metrics Analyst', 'International Metrics Analyst', 'International Metrics Analyst', '2023-10-06 08:18:04', '2023-10-06 08:18:04'),
(43, 23, 'Senior Assurance Director', 'Paige', 'Paige', 'Paige', 'Labore exercitationem dolore mollitia.', 'International Metrics Analyst', 'International Metrics Analyst', 'International Metrics Analyst', '2023-10-06 08:18:04', '2023-10-06 08:18:04');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `image_id` bigint(20) UNSIGNED NOT NULL,
  `date` datetime NOT NULL,
  `relative_id` bigint(20) UNSIGNED DEFAULT NULL,
  `invoice_id` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 => faild - 1 => success',
  `address` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `code`, `user_id`, `image_id`, `date`, `relative_id`, `invoice_id`, `status`, `address`, `created_at`, `updated_at`) VALUES
(27, '20231006-0003', 22, 1, '2023-10-06 09:33:43', NULL, '123413241234', 0, NULL, '2023-10-06 06:33:43', '2023-10-06 06:33:43'),
(30, '20231006-0004', 2, 2, '2023-10-06 11:20:32', 5, '123413241234', 0, NULL, '2023-10-06 08:20:32', '2023-10-06 08:20:32');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'show statistics', 'web', '2023-10-03 14:13:46', '2023-10-03 14:13:46'),
(2, 'view users', 'web', '2023-10-03 14:13:46', '2023-10-03 14:13:46'),
(3, 'edit users', 'web', '2023-10-03 14:13:46', '2023-10-03 14:13:46'),
(4, 'delete users', 'web', '2023-10-03 14:13:46', '2023-10-03 14:13:46'),
(5, 'view relatives', 'web', '2023-10-03 14:13:46', '2023-10-03 14:13:46'),
(6, 'edit relatives', 'web', '2023-10-03 14:13:46', '2023-10-03 14:13:46'),
(7, 'delete relatives', 'web', '2023-10-03 14:13:46', '2023-10-03 14:13:46'),
(8, 'view relative type', 'web', '2023-10-03 14:13:46', '2023-10-03 14:13:46'),
(9, 'edit relative type', 'web', '2023-10-03 14:13:46', '2023-10-03 14:13:46'),
(10, 'delete relative type', 'web', '2023-10-03 14:13:46', '2023-10-03 14:13:46'),
(11, 'view images', 'web', '2023-10-03 14:13:46', '2023-10-03 14:13:46'),
(12, 'edit images', 'web', '2023-10-03 14:13:46', '2023-10-03 14:13:46'),
(13, 'delete images', 'web', '2023-10-03 14:13:46', '2023-10-03 14:13:46'),
(14, 'active images', 'web', '2023-10-03 14:13:47', '2023-10-03 14:13:47'),
(15, 'view ads', 'web', '2023-10-03 14:13:47', '2023-10-03 14:13:47'),
(16, 'edit ads', 'web', '2023-10-03 14:13:47', '2023-10-03 14:13:47'),
(17, 'view orders', 'web', '2023-10-03 14:13:47', '2023-10-03 14:13:47'),
(18, 'delete orders', 'web', '2023-10-03 14:13:47', '2023-10-03 14:13:47'),
(19, 'view about', 'web', '2023-10-03 14:13:47', '2023-10-03 14:13:47'),
(20, 'edit about', 'web', '2023-10-03 14:13:47', '2023-10-03 14:13:47'),
(21, 'view terms', 'web', '2023-10-03 14:13:47', '2023-10-03 14:13:47'),
(22, 'edit terms', 'web', '2023-10-03 14:13:47', '2023-10-03 14:13:47'),
(23, 'view settings', 'web', '2023-10-03 14:13:47', '2023-10-03 14:13:47'),
(24, 'edit settings', 'web', '2023-10-03 14:13:47', '2023-10-03 14:13:47'),
(25, 'view messages', 'web', '2023-10-03 14:13:47', '2023-10-03 14:13:47'),
(26, 'replay messages', 'web', '2023-10-03 14:13:47', '2023-10-03 14:13:47'),
(27, 'delete messages', 'web', '2023-10-03 14:13:47', '2023-10-03 14:13:47'),
(28, 'add users', 'web', '2023-10-03 16:35:01', '2023-10-03 16:35:01'),
(29, 'add relatives', 'web', '2023-10-03 16:35:01', '2023-10-03 16:35:01'),
(30, 'add relative type', 'web', '2023-10-03 16:35:01', '2023-10-03 16:35:01'),
(31, 'add images', 'web', '2023-10-03 16:35:01', '2023-10-03 16:35:01'),
(32, 'add roles', 'web', '2023-10-03 16:35:01', '2023-10-03 16:35:01'),
(33, 'see dashboard', 'web', '2023-10-03 16:35:01', '2023-10-03 16:35:01'),
(34, 'export users pdf', 'web', '2023-10-06 04:57:30', '2023-10-06 04:57:30'),
(35, 'export users excel', 'web', '2023-10-06 04:57:30', '2023-10-06 04:57:30'),
(36, 'search users', 'web', '2023-10-06 04:57:30', '2023-10-06 04:57:30'),
(37, 'view winners', 'web', '2023-10-06 04:57:30', '2023-10-06 04:57:30'),
(38, 'add winners', 'web', '2023-10-06 04:57:30', '2023-10-06 04:57:30'),
(39, 'edit winners', 'web', '2023-10-06 04:57:30', '2023-10-06 04:57:30'),
(40, 'delete winners', 'web', '2023-10-06 04:57:30', '2023-10-06 04:57:30'),
(41, 'search winners', 'web', '2023-10-06 04:57:30', '2023-10-06 04:57:30'),
(42, 'active winners', 'web', '2023-10-06 04:57:30', '2023-10-06 04:57:30'),
(43, 'export winners pdf', 'web', '2023-10-06 04:57:30', '2023-10-06 04:57:30'),
(44, 'export winners excel', 'web', '2023-10-06 04:57:30', '2023-10-06 04:57:30'),
(45, 'search relatives', 'web', '2023-10-06 04:57:30', '2023-10-06 04:57:30'),
(46, 'export relatives pdf', 'web', '2023-10-06 04:57:30', '2023-10-06 04:57:30'),
(47, 'export relatives excel', 'web', '2023-10-06 04:57:30', '2023-10-06 04:57:30'),
(48, 'view notification', 'web', '2023-10-06 04:57:30', '2023-10-06 04:57:30'),
(49, 'send notification', 'web', '2023-10-06 04:57:31', '2023-10-06 04:57:31'),
(50, 'delete notification', 'web', '2023-10-06 04:57:31', '2023-10-06 04:57:31'),
(51, 'search orders', 'web', '2023-10-06 04:57:31', '2023-10-06 04:57:31'),
(52, 'export orders pdf', 'web', '2023-10-06 04:57:31', '2023-10-06 04:57:31'),
(53, 'export orders excel', 'web', '2023-10-06 04:57:31', '2023-10-06 04:57:31');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `relatives`
--

CREATE TABLE `relatives` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `relative_type_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `civil_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `relatives`
--

INSERT INTO `relatives` (`id`, `user_id`, `relative_type_id`, `name`, `civil_id`, `created_at`, `updated_at`) VALUES
(2, 2, 3, 'Troy Halvorson', 'Erie', '2023-09-30 16:46:27', '2023-09-30 16:46:27'),
(4, 2, 3, 'Ebba Ward', 'Hillsboro', '2023-09-30 17:02:14', '2023-09-30 17:02:14'),
(5, 2, 3, 'Burdette Wunsch', 'Livonia', '2023-09-30 17:02:25', '2023-09-30 17:02:25'),
(6, 2, 3, 'Jayden Moore', 'Diamond Bar', '2023-09-30 17:02:36', '2023-09-30 17:02:36'),
(7, 2, 2, 'Gretchen Friesen', 'Westminster', '2023-09-30 17:02:50', '2023-09-30 17:02:50'),
(8, 2, 2, 'Kirstin Kris', 'North Bethesda', '2023-09-30 17:39:44', '2023-09-30 17:39:44'),
(9, 2, 2, 'test user', '0000000000', '2023-10-04 13:27:45', '2023-10-04 13:27:45'),
(10, 3, 3, 'Gerard ||', '12345678901235789111', '2023-10-04 13:30:56', '2023-10-04 13:30:56'),
(11, 23, 3, 'Mikel Davis', '362', '2023-10-06 06:42:38', '2023-10-06 06:42:38'),
(13, 11, 2, 'Twila Goyette', '1234578923456789', '2023-10-06 08:11:37', '2023-10-06 08:11:37');

-- --------------------------------------------------------

--
-- Table structure for table `relative_types`
--

CREATE TABLE `relative_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_ur` varchar(255) NOT NULL,
  `name_fil` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `relative_types`
--

INSERT INTO `relative_types` (`id`, `name_ar`, `name_en`, `name_ur`, `name_fil`, `created_at`, `updated_at`) VALUES
(2, 'Alvena', 'Tavares', 'Modesto', 'Muller', '2023-09-30 10:35:15', '2023-09-30 10:35:15'),
(3, 'Winnifred', 'Narciso', 'Laurence', 'Greenholt', '2023-09-30 10:35:48', '2023-09-30 10:35:48'),
(4, 'Josie', 'Skylar', 'Suzanne', 'VonRueden', '2023-10-06 08:12:43', '2023-10-06 08:12:43');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'super admin', 'web', '2023-10-03 15:37:31', '2023-10-03 15:37:31'),
(2, 'admin', 'web', '2023-10-03 15:43:34', '2023-10-03 15:43:34'),
(3, 'client', 'web', '2023-10-03 15:47:42', '2023-10-03 15:47:42'),
(4, 'guest', 'web', '2023-10-06 05:01:59', '2023-10-06 05:01:59'),
(5, 'editor', 'web', '2023-10-06 08:26:39', '2023-10-06 08:26:39');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(2, 2),
(3, 1),
(4, 1),
(5, 1),
(5, 2),
(6, 1),
(6, 5),
(7, 1),
(8, 1),
(8, 2),
(9, 1),
(10, 1),
(11, 1),
(11, 2),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(15, 2),
(16, 1),
(17, 1),
(17, 2),
(18, 1),
(19, 1),
(19, 2),
(19, 5),
(20, 1),
(20, 5),
(21, 1),
(21, 2),
(21, 5),
(22, 1),
(22, 5),
(23, 1),
(23, 2),
(23, 5),
(24, 1),
(25, 1),
(25, 2),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(33, 2),
(34, 1),
(34, 5),
(35, 1),
(35, 5),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` longtext NOT NULL,
  `name_ar` longtext NOT NULL,
  `name_ur` longtext NOT NULL,
  `name_fil` longtext NOT NULL,
  `description_en` longtext DEFAULT NULL,
  `description_ar` longtext DEFAULT NULL,
  `description_ur` longtext DEFAULT NULL,
  `description_fil` longtext DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `whatsapp` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `pinterest` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `snapchat` varchar(255) DEFAULT NULL,
  `tiktok` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `facebook_icon` varchar(255) DEFAULT NULL,
  `whatsapp_icon` varchar(255) DEFAULT NULL,
  `youtube_icon` varchar(255) DEFAULT NULL,
  `twitter_icon` varchar(255) DEFAULT NULL,
  `linkedin_icon` varchar(255) DEFAULT NULL,
  `pinterest_icon` varchar(255) DEFAULT NULL,
  `instagram_icon` varchar(255) DEFAULT NULL,
  `snapchat_icon` varchar(255) DEFAULT NULL,
  `tiktok_icon` varchar(255) DEFAULT NULL,
  `home_gif_image` varchar(255) DEFAULT NULL,
  `welcome_en` longtext DEFAULT NULL,
  `welcome_ar` longtext DEFAULT NULL,
  `welcome_ur` longtext DEFAULT NULL,
  `welcome_fil` longtext DEFAULT NULL,
  `logout_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name_en`, `name_ar`, `name_ur`, `name_fil`, `description_en`, `description_ar`, `description_ur`, `description_fil`, `logo`, `facebook`, `youtube`, `whatsapp`, `linkedin`, `twitter`, `pinterest`, `instagram`, `snapchat`, `tiktok`, `phone`, `email`, `address`, `created_at`, `updated_at`, `facebook_icon`, `whatsapp_icon`, `youtube_icon`, `twitter_icon`, `linkedin_icon`, `pinterest_icon`, `instagram_icon`, `snapchat_icon`, `tiktok_icon`, `home_gif_image`, `welcome_en`, `welcome_ar`, `welcome_ur`, `welcome_fil`, `logout_time`) VALUES
(2, 'Dinarkoom', 'دینارکوم', 'دینارکوم', 'Dinarkoom', 'A program and website for selling digital photos and then holding draws for buyers to choose a winner.', 'برنامج وموقع لبيع الصور الرقمية ومن ثم اجراء سحوبات على المشترين لاختيار فائز منهم.', 'ایک پروگرام اور ویب سائٹ ڈیجیٹل تصاویر بیچنے اور پھر خریداروں کے لیے ایک فاتح کا انتخاب کرنے کے لیے قرعہ اندازی کا انعقاد۔', 'Isang programa at website para sa pagbebenta ng mga digital na larawan at pagkatapos ay paghawak ng mga draw para sa mga mamimili upang pumili ng isang panalo.', 'logo/SdYIB5ID9JIlGWIo8opdsiDSs0yRFOAidcKP6pmQ.png', NULL, 'https://www.youtube.com/', 'https://www.youtube.com/', 'https://www.linkedin.com/', 'https://twitter.com/', 'https://www.pinterest.com/', 'https://www.instagram.com/', 'https://www.snapchat.com/', 'https://www.tiktok.com/', '2823544415', 'your.email+fakedata17345@gmail.com', '3346 Bergnaum Heights', '2023-09-30 06:27:45', '2023-10-06 08:31:05', 'social/HTkrsHSJJNJRh7cZDXgjAHniUZ7uOUOE546AwZ6o.png', 'social/NjJrX1nO4yk9Ho1AN81OcCWLJVs0uRqlkGxKYXQe.png', 'social/dxxa1XO27ewQoFuT4iSL60Hu9g3A38H6KC6mV8Z1.png', 'social/9jgBDPtbpSXVhAOMf6rLh3qT72GIVELBpZdFbJm0.png', 'social/IU3NucBcUOLCiRcCNkvvTcRDthQZU4D9CqWcpA7y.png', 'social/M7pmwPfs5F9vcKuUNkO6UQZ24lBFDGLnk4Omy8am.png', 'social/B0cLsDlwgYVyOBQPJFioCBCpZUHFvKUO1dV3cD5M.png', 'social/mwXDCnbV0ITg3gVTYMPtlk8HQctG4xgGn7jzUJbC.png', 'social/h4yyMSgH6xN6RtJMa3GkarVP6VmzM56owFvNBEJK.png', NULL, '<h3>wellcome to our site</h3>', '<h3>مرحبا بك فى موقعنا</h3>', '<h3>ہماری سائٹ پر خوش آمدید</h3>', '<h3>maligayang pagdating sa aming site</h3>', 15);

-- --------------------------------------------------------

--
-- Table structure for table `text_pages`
--

CREATE TABLE `text_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` tinyint(4) NOT NULL COMMENT '0 => aboutus - 1 => terms',
  `content_ar` longtext NOT NULL,
  `content_en` longtext NOT NULL,
  `content_ur` longtext NOT NULL,
  `content_fil` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `text_pages`
--

INSERT INTO `text_pages` (`id`, `type`, `content_ar`, `content_en`, `content_ur`, `content_fil`, `created_at`, `updated_at`) VALUES
(1, 0, '<h2>مرحبا بكم في ديناركوم</h2><ol><li>اولا&nbsp;</li><li>ثاينيا</li></ol>', '<h2>welcome to dinarkoom</h2><ol><li>first&nbsp;</li><li>second</li></ol>', '<h2>دینارکوم میں خوش آمدید</h2>', '<h2>welcome sa dinarkoom</h2><p>&nbsp;</p><p>sadfsasd</p><ol><li>asfdasd</li><li>asdfasdf</li></ol><ul><li>asfasdf</li><li>sdfsd</li></ul>', '2023-10-06 06:51:21', '2023-10-06 08:22:47'),
(2, 1, '<h2>welcome sa dinarkoom</h2>', '<p>welcome sa dinarkoom</p>', '<p>welcome sa dinarkoom</p>', '<p>welcome sa dinarkoom</p>', '2023-10-06 06:52:23', '2023-10-06 06:52:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` tinyint(1) NOT NULL DEFAULT 2 COMMENT '0 => super_admin 1 => admin 2 => users 3 => guest',
  `is_online` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 => offline 1 => online',
  `civil_id` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `addition_phone` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `last_activity` timestamp NULL DEFAULT NULL,
  `is_guest` tinyint(1) NOT NULL DEFAULT 0,
  `guest_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `is_online`, `civil_id`, `phone`, `addition_phone`, `remember_token`, `created_at`, `updated_at`, `deleted_at`, `last_activity`, `is_guest`, `guest_token`) VALUES
(2, 'Super Admin', 'test@example.com', '2023-09-29 23:00:28', '$2y$10$ZBInAskZgLYL7BA6YlNTaecpP05jodbUG5ekq/LZkuv8jSpNmQ7pW', 0, 1, '363186', '(737) 437-0101', '409-646-5316', 'p2MaS6QnZGnAJBxGaNLIkyfj8g71kB9CwusS9WoBQqsCFVxkraQN3hKVOAuJ', '2023-09-29 23:00:28', '2023-10-06 08:31:14', NULL, '2023-10-06 08:31:14', 0, NULL),
(3, 'test', 'zzz@zzz.com', NULL, '$2y$10$zFAGfGukYE6AabnWRHyl9uIny/kKm2ytOdtt96mzs.U3BTRXoKrCC', 2, 0, '123456789', '12357890', '23456789', NULL, '2023-09-30 16:36:26', '2023-09-30 16:36:26', NULL, NULL, 0, NULL),
(9, 'admin zakaria', 'z@z.com', '2023-10-03 16:07:51', '$2y$10$WbnAd2y3nep8VsN5O8lbIuNy46QmTcOkHC03twxw/FrWY.r/7ZTqq', 2, 1, '1234567890', '123456789', '123456789', 'BuZO67VBaueFgkNKW6KL2Rzj3W5XE3f6xD1bbbmo3nTSfCrNopicu3ZdUiKl', '2023-10-03 16:06:50', '2023-10-05 16:03:30', NULL, '2023-10-05 16:03:30', 0, NULL),
(10, 'Adeline Gerhold', 'your.email+fakedata65262@gmail.com', NULL, '$2y$10$N4l5CN.LEzwOs.OTfmlltu607y2Rswfa0f6pw4NTR72Cd7DvhSSa.', 2, 0, '150', '677-891-6198', '986-195-7394', NULL, '2023-10-04 17:26:55', '2023-10-04 17:29:34', NULL, '2023-10-04 17:29:34', 0, NULL),
(11, 'Casimer Jaskolski', 'your.email+fakedata43392@gmail.com', NULL, '$2y$10$3kOxwMea5uCwW3dib1U75eXDKCu9ZigFCD4akKcMoMQUiprMNUqDa', 2, 0, '69', '397-748-6209', '840-697-3896', NULL, '2023-10-04 17:29:49', '2023-10-04 17:32:13', NULL, '2023-10-04 17:32:13', 0, NULL),
(12, 'Maymie Bernier', 'your.email+fakedata44153@gmail.com', NULL, '$2y$10$MP7LgX5feTmdiCT7xXjz9OhawqNfkZOYbG2emHQsf1QRRjTWY26gC', 2, 0, '134', '331-080-8420', '747-434-9411', NULL, '2023-10-04 17:32:34', '2023-10-04 17:32:34', NULL, NULL, 0, NULL),
(13, 'Bill Zboncak', 'your.email+fakedata16303@gmail.com', NULL, NULL, 3, 0, 'Mayaguez', '944-636-5796', '093-182-0322', NULL, '2023-10-05 08:05:24', '2023-10-05 08:05:24', NULL, NULL, 0, NULL),
(14, 'zakaria', 'z@guest.com', NULL, NULL, 3, 0, '0101010', '0101010', '0101010', NULL, '2023-10-05 08:29:02', '2023-10-05 08:29:02', NULL, NULL, 0, NULL),
(15, 'cccccc', 'email@adsa.asdfa', NULL, NULL, 3, 0, 'cccccccc', '123456', '76543', NULL, '2023-10-05 09:45:44', '2023-10-05 09:45:44', NULL, NULL, 0, NULL),
(16, 'dinrakoom', 'feltantawi88@gmail.com', NULL, '$2y$10$BqsJnPhlS.PGAT8sWt4rPusG34Dio5JgomOBeEDs17J/m.4ZAgf6C', 2, 0, '0000000000', '0000000000', '0000000000', NULL, '2023-10-05 14:00:17', '2023-10-05 14:10:23', NULL, '2023-10-05 14:10:23', 0, NULL),
(17, 'zakaria', 'zz@zz.com', NULL, NULL, 3, 0, '999999999', '999999999', '999999999', NULL, '2023-10-05 14:11:44', '2023-10-05 14:11:44', NULL, NULL, 0, NULL),
(18, 'zakaria', 'zz@zz.com', NULL, NULL, 3, 0, '999999999', '999999999', '999999999', NULL, '2023-10-05 14:19:03', '2023-10-05 14:19:03', NULL, NULL, 0, NULL),
(19, 'new user', 'zzzzz@zzzzz.com', NULL, '$2y$10$zJEqNh2PeM25dwNefuMH0O/3DYD1remroYqzGLZEQ2QP1aYEilTge', 2, 0, '101010', '101010', '101010', NULL, '2023-10-06 03:28:16', '2023-10-06 03:34:32', NULL, '2023-10-06 03:28:50', 0, NULL),
(20, 'Orin Connelly', 'your.email+fakedata22233@gmail.com', NULL, '$2y$10$Dnz/N6YmdNbZQ.T4pW9Kue2mQyFA4T/7RckqpTBvZUGLqwsrrtjgK', 2, 0, '365', '099-942-4173', '714-203-4385', NULL, '2023-10-06 03:34:44', '2023-10-06 03:38:02', NULL, '2023-10-06 03:35:10', 0, NULL),
(22, 'test guest', 'test@test.com', NULL, NULL, 3, 0, '0000000000', '0000000000', '0000000000', NULL, '2023-10-06 06:29:23', '2023-10-06 06:29:23', NULL, NULL, 0, NULL),
(23, 'Marisol', 'your.email+fakedata48804@gmail.com', '2023-10-06 06:39:19', '$2y$10$StBAZP0dfHYZF74S8YnRt.9mTlgvRFYcL0dgf.pm9llxMaeLw4NOi', 2, 0, '444444444444', '880-171-6433', '022-748-1534', NULL, '2023-10-06 06:37:46', '2023-10-06 08:06:14', NULL, '2023-10-06 06:49:17', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `winners`
--

CREATE TABLE `winners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `month` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0 => not active - 1 => active',
  `value` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `winners`
--

INSERT INTO `winners` (`id`, `user_id`, `admin_id`, `month`, `status`, `value`, `created_at`, `updated_at`) VALUES
(3, 11, 2, '10', 0, '1000', '2023-10-05 04:45:26', '2023-10-06 08:09:39'),
(6, 11, 2, '10', 0, '', '2023-10-05 04:45:26', '2023-10-05 04:56:59'),
(7, 11, 2, '10', 0, '', '2023-10-05 04:45:26', '2023-10-05 04:56:59'),
(8, 11, 2, '10', 0, '', '2023-10-05 04:45:26', '2023-10-05 04:56:59'),
(9, 11, 2, '10', 0, '', '2023-10-05 04:45:26', '2023-10-05 04:56:59'),
(10, 11, 2, '10', 0, '', '2023-10-05 04:45:26', '2023-10-05 04:56:59'),
(11, 11, 2, '10', 0, '', '2023-10-05 04:45:26', '2023-10-05 04:56:59'),
(12, 11, 2, '10', 0, '', '2023-10-05 04:45:26', '2023-10-05 04:56:59'),
(13, 11, 2, '10', 0, '', '2023-10-05 04:45:26', '2023-10-05 04:56:59'),
(14, 11, 2, '10', 0, '', '2023-10-05 04:45:26', '2023-10-05 04:56:59'),
(15, 11, 2, '10', 0, '', '2023-10-05 04:45:26', '2023-10-05 04:56:59'),
(16, 11, 2, '10', 0, '', '2023-10-05 04:45:26', '2023-10-05 04:56:59'),
(17, 11, 2, '10', 0, '', '2023-10-05 04:45:26', '2023-10-05 04:56:59'),
(18, 11, 2, '10', 0, '', '2023-10-05 04:45:26', '2023-10-05 04:56:59'),
(19, 11, 2, '10', 0, '', '2023-10-05 04:45:26', '2023-10-05 04:56:59'),
(20, 11, 2, '10', 0, '', '2023-10-05 04:45:26', '2023-10-05 04:56:59'),
(21, 11, 2, '10', 0, '', '2023-10-05 04:45:26', '2023-10-05 04:56:59'),
(22, 11, 2, '10', 0, '', '2023-10-05 04:45:26', '2023-10-05 04:56:59'),
(23, 11, 2, '10', 0, '', '2023-10-05 04:45:26', '2023-10-05 04:56:59'),
(24, 11, 2, '10', 0, '', '2023-10-05 04:45:26', '2023-10-05 04:56:59'),
(25, 11, 2, '10', 0, '', '2023-10-05 04:45:26', '2023-10-05 04:56:59'),
(26, 11, 2, '10', 0, '', '2023-10-05 04:45:26', '2023-10-05 04:56:59'),
(27, 11, 2, '10', 0, '', '2023-10-05 04:45:26', '2023-10-05 04:56:59'),
(28, 11, 2, '10', 0, '', '2023-10-05 04:45:26', '2023-10-05 04:56:59'),
(29, 11, 2, '10', 0, '', '2023-10-05 04:45:26', '2023-10-05 04:56:59'),
(30, 11, 2, '10', 0, '', '2023-10-05 04:45:26', '2023-10-05 04:56:59'),
(31, 11, 2, '10', 0, '', '2023-10-05 04:45:26', '2023-10-05 04:56:59'),
(32, 11, 2, '10', 0, '', '2023-10-05 04:45:26', '2023-10-05 04:56:59'),
(33, 11, 2, '10', 0, '', '2023-10-05 04:45:26', '2023-10-05 04:56:59'),
(34, 11, 2, '10', 0, '', '2023-10-05 04:45:26', '2023-10-05 04:56:59'),
(35, 12, 2, '10', 0, '230', '2023-10-05 15:30:43', '2023-10-06 06:38:51'),
(36, 18, 2, '10', 1, '10000', '2023-10-06 08:09:39', '2023-10-06 08:09:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contact_us_replay_id_foreign` (`replay_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `images_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_user_id_foreign` (`user_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_image_id_foreign` (`image_id`),
  ADD KEY `orders_relative_id_foreign` (`relative_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `relatives`
--
ALTER TABLE `relatives`
  ADD PRIMARY KEY (`id`),
  ADD KEY `relatives_user_id_foreign` (`user_id`),
  ADD KEY `relatives_relative_type_id_foreign` (`relative_type_id`);

--
-- Indexes for table `relative_types`
--
ALTER TABLE `relative_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `text_pages`
--
ALTER TABLE `text_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `winners`
--
ALTER TABLE `winners`
  ADD PRIMARY KEY (`id`),
  ADD KEY `winners_user_id_foreign` (`user_id`),
  ADD KEY `winners_admin_id_foreign` (`admin_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `relatives`
--
ALTER TABLE `relatives`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `relative_types`
--
ALTER TABLE `relative_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `text_pages`
--
ALTER TABLE `text_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `winners`
--
ALTER TABLE `winners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD CONSTRAINT `contact_us_replay_id_foreign` FOREIGN KEY (`replay_id`) REFERENCES `contact_us` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_image_id_foreign` FOREIGN KEY (`image_id`) REFERENCES `images` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_relative_id_foreign` FOREIGN KEY (`relative_id`) REFERENCES `relatives` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `relatives`
--
ALTER TABLE `relatives`
  ADD CONSTRAINT `relatives_relative_type_id_foreign` FOREIGN KEY (`relative_type_id`) REFERENCES `relative_types` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `relatives_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `winners`
--
ALTER TABLE `winners`
  ADD CONSTRAINT `winners_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `winners_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
