-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2020 at 11:10 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tlurtc`
--

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`, `address`, `phone`, `created_at`, `updated_at`) VALUES
(6, 'Ms Mobile', NULL, NULL, '2020-07-20 08:45:27', '2020-07-20 08:45:27'),
(7, 'Ms Mobile', NULL, NULL, '2020-07-20 08:48:56', '2020-07-20 08:48:56'),
(8, 'Ms Mobile', NULL, NULL, '2020-07-20 09:00:38', '2020-07-20 09:00:38'),
(9, 'ha nam', NULL, NULL, '2020-07-20 09:09:02', '2020-07-20 09:09:02');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `phone`, `address`, `ip`, `message`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Phạm văn thạo', 'pvt.html@gmail.com', '1626475767', 'Hanoi', '14.231.23.134', 'tôi cần tư vấn về cai này', 1, '2020-07-21 08:38:25', '2020-07-21 22:34:24'),
(2, 'thành nguyễn', 'thanhnm@wru.vn', '032128129', 'Hà nội', '192.182.123.12', 'tôi cần tư vấn ai tư vấn cho tôi cáitôi cần ttôi cần tư vấn ai tư vấn cho tôi cáitôi cần tư vấn ai tư vấn cho tôi cáitôi cần tư vấn ai tư vấn cho tôi cáitôi cần tư vấn ai tư vấn cho tôi cái', 1, '2020-07-22 01:47:06', '2020-07-21 22:34:22');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `zoom_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `content`, `user_id`, `zoom_id`, `created_at`) VALUES
(1, 'hello', 11, '941bcabb', '1595309597787'),
(2, 'xin chao ban', 11, '941bcabb', '1595309826750');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_07_08_032731_create_zooms_table', 1),
(5, '2020_07_08_032838_create_messages_table', 1),
(6, '2020_07_20_141342_create_companies_table', 1),
(7, '2020_07_20_141408_create_customers_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `type` tinyint(4) NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `type`, `phone`, `password`, `company_id`, `created_at`, `updated_at`) VALUES
(3, 'Phạm văn 58pm', 'pvt.html@gmail.com', NULL, 1, NULL, '$2y$10$p9Z5Hr6h9q9WHrgt/laYSe4QgSO1qkHx912rKB2GV5u4cydZbedre', 8, '2020-07-20 09:00:38', '2020-07-20 09:00:38'),
(7, 'user', 'user@gmail.com', NULL, 2, '1626475767', '$2y$10$5WEdO1UGJ/JDsGvHjir9tOFHwXRxcHvz8gORqaLpTGyZhUZUjay7u', 8, '2020-07-20 16:05:55', '2020-07-20 19:08:18'),
(10, 'nhom nhom', 's10thanhlong1@gmail.com', NULL, 2, '326475767', '$2y$10$ip21mhvdjUIe1/rv7QDFmOwWGhKqQnuX.Ml/aHzbVWnGAshyUNAu.', 8, '2020-07-20 16:14:11', '2020-07-20 16:14:11'),
(11, 'nhom nhom 123', 's12thanhlong@gmail.com', NULL, 2, '326475767', '$2y$10$IyzQUFx3AmUQ.pIMU5HQ0.yikILedQyRuVGoY/Y/sjrQ/cXnDXojq', 8, '2020-07-20 16:19:08', '2020-07-21 17:42:57'),
(12, 'nhom nhom', 's13thanhlong@gmail.com', NULL, 2, '326475767', '$2y$10$1dE1LQSjXMATJB6b.b/LX.QtlxwSwEg4aool4VilDIyRYUZJ1EHTK', 8, '2020-07-20 19:32:12', '2020-07-20 19:32:12'),
(22, 'thaopv', 'user1@gmail.com', NULL, 2, '09467812', '$2y$10$TXVLmHBuQUFBpek59edVau85hgIjds7fzecBcFt5Le/o9PnTlkhrG', 8, '2020-07-20 21:31:00', '2020-07-20 21:31:00'),
(23, 'nhom nhom', '123pvt.html@gmail.com', NULL, 2, '326475767', '$2y$10$zICLQPYGukKvnld3QeC6y.EK1ggT31IsPb/dDkjatoKo4c4L56tpu', 8, '2020-07-20 21:32:09', '2020-07-20 21:32:09'),
(24, 'super admin', 'admin@gmail.com', NULL, 0, NULL, '$2y$10$p9Z5Hr6h9q9WHrgt/laYSe4QgSO1qkHx912rKB2GV5u4cydZbedre', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `zooms`
--

CREATE TABLE `zooms` (
  `id` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `zooms`
--

INSERT INTO `zooms` (`id`, `customer_id`, `created_at`, `updated_at`) VALUES
('941bcabb', 0, NULL, NULL),
('4c014095', 0, NULL, NULL),
('69a89c18', 0, NULL, NULL),
('cc492366', 0, NULL, NULL),
('753d3fa1', 0, NULL, NULL),
('cca19efb', 0, NULL, NULL),
('ce72577e', 0, NULL, NULL),
('d8330003', 0, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
