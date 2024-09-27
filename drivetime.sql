-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 27, 2024 at 02:41 PM
-- Server version: 8.0.30
-- PHP Version: 8.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `drivetime`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` int NOT NULL,
  `car_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `daily_rent_price` decimal(8,2) NOT NULL,
  `availability` tinyint(1) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `name`, `brand`, `model`, `year`, `car_type`, `daily_rent_price`, `availability`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Chevrolet Suburban', 'Toyota', 'RAV4', 2022, 'SUV', 750.00, 1, 'cars/car1.jpg', '2024-09-19 08:02:03', '2024-09-19 08:02:03'),
(2, 'Accord Chevrolet', 'Honda', 'Accord', 2021, 'Sedan', 650.00, 0, 'cars/car2.jpg', '2024-09-19 08:02:03', '2024-09-26 10:18:31'),
(3, 'Explorer Suburban', 'Ford', 'Explorer', 2023, 'Cuv', 800.00, 1, 'cars/car3.jpg', '2024-09-19 08:02:03', '2024-09-19 08:02:03'),
(4, 'Civic Chevrolet ', 'Cheavrolet', 'Civic', 2020, 'Cabriolet', 600.00, 0, 'cars/car4.jpg', '2024-09-19 08:02:03', '2024-09-27 04:50:21'),
(5, 'Model 3 Chevrolet ', 'Acura', 'Model 3', 2024, 'Sedan', 900.00, 0, 'cars/car5.jpg', '2024-09-19 08:02:03', '2024-09-26 10:10:38'),
(6, 'CX-5 Suburban', 'Mazda', 'CX-5', 2022, 'SUV', 700.00, 1, 'cars/car6.jpg', '2024-09-19 08:02:03', '2024-09-19 08:02:03'),
(7, 'Camry Civic ', 'Bentley', 'Camry', 2021, 'Pickup', 680.00, 1, 'cars/car7.jpg', '2024-09-19 08:02:03', '2024-09-19 08:02:03'),
(8, 'Highlander CX-4', 'Toyota', 'Highlander', 2023, 'Supercar', 850.00, 1, 'cars/car8.jpg', '2024-09-19 08:02:03', '2024-09-19 08:02:03'),
(9, 'Altima Primo', 'Nissan', 'Altima', 2020, 'Sedan', 620.00, 1, 'cars/car9.jpg', '2024-09-19 08:02:03', '2024-09-19 08:02:03'),
(10, 'CR-V Highlander', 'Ferrari', 'CR-V', 2024, 'SUV', 780.00, 1, 'cars/car10.jpg', '2024-09-19 08:02:03', '2024-09-19 08:02:03'),
(13, 'Jamalia Prince', 'Tesla', 'Model 2', 2005, 'Sedan', 460.00, 1, 'cars/car11.jpg', '2024-09-23 09:17:12', '2024-09-23 09:58:58'),
(14, 'Cody Knapp', 'Mercedes', 'CX-4', 2002, 'Cabriolet', 465.00, 1, 'cars/car12.jpg', '2024-09-23 10:19:37', '2024-09-23 10:19:37');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_09_17_042736_create_cars_table', 1),
(6, '2024_09_17_042746_create_rentals_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rentals`
--

CREATE TABLE `rentals` (
  `id` bigint UNSIGNED NOT NULL,
  `rental_uid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `car_id` bigint UNSIGNED NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `total_cost` decimal(8,2) NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `remark` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rentals`
--

INSERT INTO `rentals` (`id`, `rental_uid`, `user_id`, `car_id`, `start_date`, `end_date`, `total_cost`, `status`, `remark`, `created_at`, `updated_at`) VALUES
(1, 'DT2409RS0001', 3, 4, '2024-09-27', '2024-10-01', 3000.00, 1, NULL, '2024-09-26 10:10:38', '2024-09-27 04:50:21'),
(2, 'DT2409RS0002', 3, 2, '2024-09-27', '2024-09-28', 1300.00, 2, NULL, '2024-09-26 10:18:31', '2024-09-26 10:18:31');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('iVuw5DzS9VKMTLzBgTniPuUWtuMBODWuon2oNXRF', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:130.0) Gecko/20100101 Firefox/130.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoidlpGSzA0QUdDTDBiNlVWR1cwTk1NODFHRVFmTkp6bThjWlJGTFlPWiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly9kcml2ZXRpbWUudGVzdC9hZG1pbi9yZW50YWxzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjQ6ImF1dGgiO2E6MTp7czoyMToicGFzc3dvcmRfY29uZmlybWVkX2F0IjtpOjE3Mjc0MTI4ODk7fX0=', 1727435635);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone`, `address`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Sharif Uddin Ahamed', 'fsuuaas@gmail.com', NULL, '$2y$12$ZTVQcmSIg3lD5BOlIs22heAQdEHNjubKAgzHKCLv8EFVJISameBfy', NULL, NULL, 'admin', NULL, '2024-09-17 08:43:16', '2024-09-17 08:43:16'),
(2, 'Eve Eaton', 'mefeqeme@mailinator.com', NULL, '$2y$12$yYov5I0d.sPjV338xlg8cepq1rQdXcjTLAQkJq9ZoxIh49CRqCdcm', NULL, NULL, 'customer', NULL, '2024-09-17 08:43:53', '2024-09-17 08:43:53'),
(3, 'Abel Evans', 'dahoruroj@mailinator.com', NULL, '$2y$12$vTIjfSm.J7UqDhYuS1M6DOV5cHna8hTUNU0i6Caaxf06Js4sN9lpC', '+971589161080', 'zcxczcxzcx', 'customer', NULL, '2024-09-18 23:49:58', '2024-09-26 10:17:16'),
(4, 'Denise Lopez', 'xaboko@mailinator.com', NULL, '$2y$12$m.g1qOfXif.BsGcrNQ3XQeNmpOQMH0YwQm5UHHWtWfQFbRx0Z7eiK', NULL, NULL, 'customer', NULL, '2024-09-25 09:30:30', '2024-09-25 09:30:30'),
(5, 'Kelsie Haney', 'latylaje@mailinator.com', NULL, '$2y$12$euDG.sj/mZAnLTI2xw9D6O1xAjWEpB9f9F4iRjwngQpbBRVFxpgu.', NULL, NULL, 'customer', NULL, '2024-09-25 10:15:35', '2024-09-25 10:15:35'),
(6, 'Hu Pickett', 'zetuw@mailinator.com', NULL, '$2y$12$8q6tZXQ66ZrK6IlnTJPS1OMC.FHwVtwIgNd8BAjwBkuQZJlSmO.iq', NULL, NULL, 'customer', NULL, '2024-09-25 10:16:30', '2024-09-25 10:16:30'),
(7, 'Kadeem Lott', 'tumojacis@mailinator.com', NULL, '$2y$12$IRy9j1p6h78jzcPaFzjYgOnOaCx.X8CEgXlMpVOj9eUh2NL04Zxh2', NULL, NULL, 'customer', NULL, '2024-09-25 10:17:11', '2024-09-25 10:17:11'),
(8, 'Neil Howe', 'sirytesov@mailinator.com', NULL, '$2y$12$djHpQgMdjNyMJSmZ9lqmG.49XsFjbf3EHJs5srqIVd4Mv.Chgu/EK', NULL, NULL, 'customer', NULL, '2024-09-25 10:20:05', '2024-09-25 10:20:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `rentals`
--
ALTER TABLE `rentals`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rentals_rental_uid_unique` (`rental_uid`),
  ADD KEY `rentals_user_id_foreign` (`user_id`),
  ADD KEY `rentals_car_id_foreign` (`car_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rentals`
--
ALTER TABLE `rentals`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rentals`
--
ALTER TABLE `rentals`
  ADD CONSTRAINT `rentals_car_id_foreign` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`),
  ADD CONSTRAINT `rentals_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
