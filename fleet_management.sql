-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2023 at 11:03 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fleet_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `trip_id` bigint(20) UNSIGNED NOT NULL,
  `trip_stop_id` bigint(20) UNSIGNED NOT NULL,
  `bus_id` bigint(20) UNSIGNED NOT NULL,
  `seat_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `trip_id`, `trip_stop_id`, `bus_id`, `seat_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, 1, '2023-04-04 18:30:38', '2023-04-04 18:30:38'),
(2, 1, 1, 1, 7, 1, '2023-04-04 18:37:50', '2023-04-04 18:56:56'),
(4, 1, 1, 1, 3, 1, '2023-04-04 18:55:07', '2023-04-04 18:55:07');

-- --------------------------------------------------------

--
-- Table structure for table `buses`
--

CREATE TABLE `buses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bus_code` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buses`
--

INSERT INTO `buses` (`id`, `bus_code`, `created_at`, `updated_at`) VALUES
(1, 123, '2023-04-04 18:01:36', '2023-04-04 18:01:36'),
(2, 124, '2023-04-04 18:02:48', '2023-04-04 18:02:48'),
(3, 125, '2023-04-04 18:02:52', '2023-04-04 18:02:52'),
(4, 126, '2023-04-04 18:02:57', '2023-04-04 18:02:57'),
(6, 127, '2023-04-04 18:03:17', '2023-04-04 18:06:10'),
(7, 555, '2023-04-04 18:20:46', '2023-04-04 18:20:46');

-- --------------------------------------------------------

--
-- Table structure for table `buses_seats`
--

CREATE TABLE `buses_seats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bus_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buses_seats`
--

INSERT INTO `buses_seats` (`id`, `bus_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2023-04-04 18:12:34', '2023-04-04 18:12:34'),
(2, 1, '2023-04-04 18:12:41', '2023-04-04 18:12:41'),
(3, 1, '2023-04-04 18:12:42', '2023-04-04 18:12:42'),
(4, 1, '2023-04-04 18:12:43', '2023-04-04 18:12:43'),
(5, 1, '2023-04-04 18:12:45', '2023-04-04 18:12:45'),
(6, 1, '2023-04-04 18:12:46', '2023-04-04 18:12:46'),
(7, 1, '2023-04-04 18:12:47', '2023-04-04 18:12:47'),
(8, 1, '2023-04-04 18:12:48', '2023-04-04 18:12:48'),
(9, 1, '2023-04-04 18:12:50', '2023-04-04 18:12:50'),
(10, 1, '2023-04-04 18:12:51', '2023-04-04 18:12:51'),
(11, 1, '2023-04-04 18:12:53', '2023-04-04 18:12:53'),
(12, 1, '2023-04-04 18:12:54', '2023-04-04 18:12:54'),
(13, 2, '2023-04-04 18:13:05', '2023-04-04 18:13:05'),
(14, 2, '2023-04-04 18:13:07', '2023-04-04 18:13:07'),
(15, 2, '2023-04-04 18:13:08', '2023-04-04 18:13:08'),
(16, 2, '2023-04-04 18:13:10', '2023-04-04 18:13:10'),
(17, 2, '2023-04-04 18:13:11', '2023-04-04 18:13:11'),
(18, 2, '2023-04-04 18:13:12', '2023-04-04 18:13:12'),
(19, 2, '2023-04-04 18:13:13', '2023-04-04 18:13:13'),
(20, 2, '2023-04-04 18:13:15', '2023-04-04 18:13:15'),
(21, 2, '2023-04-04 18:13:16', '2023-04-04 18:13:16'),
(22, 2, '2023-04-04 18:13:17', '2023-04-04 18:13:17'),
(23, 2, '2023-04-04 18:13:18', '2023-04-04 18:13:18'),
(24, 2, '2023-04-04 18:13:19', '2023-04-04 18:13:19'),
(26, 7, '2023-04-04 18:20:46', '2023-04-04 18:20:46'),
(27, 7, '2023-04-04 18:20:46', '2023-04-04 18:20:46'),
(28, 7, '2023-04-04 18:20:46', '2023-04-04 18:20:46'),
(29, 7, '2023-04-04 18:20:46', '2023-04-04 18:20:46'),
(30, 7, '2023-04-04 18:20:46', '2023-04-04 18:20:46'),
(31, 7, '2023-04-04 18:20:46', '2023-04-04 18:20:46'),
(32, 7, '2023-04-04 18:20:46', '2023-04-04 18:20:46'),
(33, 7, '2023-04-04 18:20:46', '2023-04-04 18:20:46'),
(34, 7, '2023-04-04 18:20:46', '2023-04-04 18:20:46'),
(35, 7, '2023-04-04 18:20:46', '2023-04-04 18:20:46'),
(36, 7, '2023-04-04 18:20:46', '2023-04-04 18:20:46'),
(37, 7, '2023-04-04 18:20:46', '2023-04-04 18:20:46');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'cairo', '2023-04-03 20:22:35', '2023-04-03 20:22:35'),
(2, 'giza', '2023-04-03 20:23:48', '2023-04-03 20:23:48'),
(5, 'asyut', '2023-04-03 20:25:08', '2023-04-03 21:23:37'),
(7, 'alfayyum', '2023-04-03 21:24:24', '2023-04-03 21:24:24'),
(8, 'alminya', '2023-04-03 21:24:30', '2023-04-03 21:24:30'),
(9, 'alexandria', '2023-04-03 21:32:38', '2023-04-03 21:32:38'),
(12, 'suiz', '2023-04-03 21:33:20', '2023-04-03 21:34:48');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_04_03_194751_create_cities_table', 1),
(6, '2023_04_03_194807_create_trips_table', 1),
(7, '2023_04_03_194829_create_trips_stops_table', 1),
(8, '2023_04_03_194908_create_bookings_table', 1),
(9, '2023_04_04_151658_add_is_admin_to_users_table', 2),
(10, '2023_04_04_192940_create_buses_table', 3),
(11, '2023_04_04_193658_create_buses_table', 4),
(12, '2023_04_04_193721_create_buses_seats_table', 4),
(13, '2023_04_04_194834_add_columns_to_bookings_table', 5);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 12, 'API TOKEN', 'a2e845034805abb09da75e670a6c25549da794cadfeb25ff41d078c27529bc90', '[\"*\"]', NULL, '2023-04-04 13:30:39', '2023-04-04 13:30:39'),
(2, 'App\\Models\\User', 1, 'API TOKEN', 'baa511ec8d1c17c570cdd3121b9e814af75373a9ea8e6312c3af5b53ef63ea17', '[\"*\"]', NULL, '2023-04-04 13:38:48', '2023-04-04 13:38:48'),
(3, 'App\\Models\\User', 1, 'API TOKEN', 'd9c102734a5aab262401219472f9d2cb57190b49aff0bd9d7db17b3757bbe83c', '[\"*\"]', NULL, '2023-04-04 13:51:28', '2023-04-04 13:51:28'),
(4, 'App\\Models\\User', 1, 'Sanctom+Socialite', 'cd2659a8a8e274f392a58f448c7778717fb9cf2d080964df8c5822685e2351db', '[\"*\"]', NULL, '2023-04-04 13:54:00', '2023-04-04 13:54:00'),
(5, 'App\\Models\\User', 1, 'Sanctom+Socialite', '9950c2a429193604df33f9fd897926b277d05fe1b15f6181cbb7aed680c382b9', '[\"*\"]', NULL, '2023-04-04 13:57:31', '2023-04-04 13:57:31'),
(6, 'App\\Models\\User', 1, 'Sanctom', 'debc267b178e65533ffbd61776b2a823127041fb60b0302035adc1aeeae950e1', '[\"*\"]', NULL, '2023-04-04 14:33:12', '2023-04-04 14:33:12'),
(7, 'App\\Models\\User', 1, 'Sanctom', '6822894299582300ce40e5704363470a79edf0f3fbdbd7dcd7c59b78fccd77a3', '[\"*\"]', '2023-04-04 15:19:29', '2023-04-04 15:14:16', '2023-04-04 15:19:29'),
(8, 'App\\Models\\User', 12, 'Sanctom', '1dd89c588b5a9f89faa58b02dd91442b66ec7009db402a47aed2fbf0b75d6058', '[\"*\"]', '2023-04-04 15:43:27', '2023-04-04 15:20:40', '2023-04-04 15:43:27'),
(9, 'App\\Models\\User', 1, 'Sanctom', '91d62bd519d4ba240a50e573d2a69d70cb8b5d774a31be5d3770c09b79c917f6', '[\"*\"]', '2023-04-04 16:13:48', '2023-04-04 16:10:59', '2023-04-04 16:13:48'),
(10, 'App\\Models\\User', 3, 'Sanctom', '9663079f07f322567d1bdbef36443c036d30c7fa25a9cdb8b0ac17540c38c132', '[\"*\"]', '2023-04-04 16:16:14', '2023-04-04 16:16:10', '2023-04-04 16:16:14'),
(11, 'App\\Models\\User', 1, 'Sanctom', 'b8f3e3bdd05d2e9eaf40222b4df94bf783352a1664ccba9a969d18edbdb10435', '[\"*\"]', '2023-04-04 18:57:21', '2023-04-04 16:16:20', '2023-04-04 18:57:21');

-- --------------------------------------------------------

--
-- Table structure for table `trips`
--

CREATE TABLE `trips` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_city` bigint(20) UNSIGNED NOT NULL,
  `end_city` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `deprature_time` time NOT NULL,
  `arrival_time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trips`
--

INSERT INTO `trips` (`id`, `title`, `start_city`, `end_city`, `date`, `deprature_time`, `arrival_time`, `created_at`, `updated_at`) VALUES
(1, 'From Cairo to Asyut', 1, 5, '2023-04-04', '03:22:00', '12:30:00', NULL, NULL),
(2, 'From Cairo to Asyut', 1, 5, '2023-04-04', '03:22:00', '12:30:00', '2023-04-04 10:25:44', '2023-04-04 10:29:38'),
(5, 'From Cairo to Asyut', 1, 5, '2023-04-04', '03:22:00', '12:30:00', '2023-04-04 08:36:13', '2023-04-04 08:36:13'),
(8, 'From Cairo to Asyut', 1, 5, '2023-04-04', '03:22:00', '12:30:00', '2023-04-04 08:40:10', '2023-04-04 08:40:10'),
(9, 'From Cairo to Asyut', 1, 5, '2023-04-04', '03:22:00', '12:30:00', '2023-04-04 08:42:21', '2023-04-04 08:42:21');

-- --------------------------------------------------------

--
-- Table structure for table `trips_stops`
--

CREATE TABLE `trips_stops` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `trip_id` bigint(20) UNSIGNED NOT NULL,
  `start_city` bigint(20) UNSIGNED NOT NULL,
  `end_city` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `deprature_time` time NOT NULL,
  `arrival_time` time NOT NULL,
  `cost` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trips_stops`
--

INSERT INTO `trips_stops` (`id`, `trip_id`, `start_city`, `end_city`, `date`, `deprature_time`, `arrival_time`, `cost`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 7, '2023-04-04', '03:22:00', '04:30:00', 40, '2023-04-04 10:19:46', '2023-04-04 10:19:46'),
(2, 1, 1, 8, '2023-04-04', '05:00:00', '12:30:00', 80, '2023-04-04 10:19:46', '2023-04-04 10:19:46'),
(3, 2, 1, 7, '2023-04-04', '03:22:00', '04:30:00', 45, '2023-04-04 10:19:46', '2023-04-04 10:29:38'),
(4, 2, 1, 8, '2023-04-04', '05:00:00', '12:30:00', 100, '2023-04-04 10:19:46', '2023-04-04 10:29:38'),
(8, 5, 1, 7, '2023-04-04', '03:22:00', '04:30:00', 40, '2023-04-04 08:36:13', '2023-04-04 08:36:13'),
(9, 5, 1, 8, '2023-04-04', '05:00:00', '12:30:00', 80, '2023-04-04 08:36:13', '2023-04-04 08:36:13'),
(13, 8, 1, 7, '2023-04-04', '03:22:00', '04:30:00', 40, '2023-04-04 08:40:10', '2023-04-04 08:40:10'),
(14, 8, 1, 8, '2023-04-04', '05:00:00', '12:30:00', 80, '2023-04-04 08:40:10', '2023-04-04 08:40:10'),
(15, 9, 1, 7, '2023-04-04', '03:22:00', '04:30:00', 40, '2023-04-04 08:42:21', '2023-04-04 08:42:21'),
(16, 9, 1, 8, '2023-04-04', '05:00:00', '12:30:00', 80, '2023-04-04 08:42:21', '2023-04-04 08:42:21'),
(22, 2, 1, 5, '2023-04-04', '05:00:00', '01:30:00', 90, '2023-04-04 10:19:46', '2023-04-04 10:23:39'),
(23, 2, 1, 5, '2023-04-04', '05:00:00', '01:30:00', 90, '2023-04-04 10:19:46', '2023-04-04 10:25:44'),
(24, 2, 1, 5, '2023-04-04', '05:00:00', '01:30:00', 90, '2023-04-04 10:19:46', '2023-04-04 10:28:49'),
(25, 2, 1, 5, '2023-04-04', '05:00:00', '01:30:00', 90, '2023-04-04 10:19:46', '2023-04-04 10:29:13'),
(26, 2, 1, 5, '2023-04-04', '05:00:00', '01:30:00', 90, '2023-04-04 10:29:38', '2023-04-04 10:29:38');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`, `is_admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ashraf Diab', 'admin@gmail.com', '01020869595', '$2y$10$Fp.N4Su11rwxu0xsXSX1SO7ms.ikZdc.BEMAXkBmI0MNpbvwO8QW6', 1, NULL, '2023-04-03 22:05:36', '2023-04-03 22:05:36'),
(3, 'Ali Hassna', 'ali@gmail.com', '01009120160', '$2y$10$9oFa.wWLPmhhl2Xt2JWmC.p9gczAEDM6cB0cnNWcIIYRBBd/hey3S', 0, NULL, '2023-04-03 22:06:26', '2023-04-03 22:06:26'),
(5, 'Menna Mohammed', 'menna@gmail.com', '01225410123', '$2y$10$hpfmmDbx0oBkooLSJE02jOgcCr68XzIH6UUZ6HzHiC6.AQYs0Slha', 0, NULL, '2023-04-03 22:06:51', '2023-04-03 22:06:51'),
(6, 'test3', 'test3@gmail.com', '01225410121', '$2y$10$kHy/UWYhTbFiVYTA48Fc5.ipt3B2CArdX0rg9MprF.sfy8OLrtL32', 0, NULL, '2023-04-03 22:07:15', '2023-04-03 22:10:45'),
(8, 'Akram Ali', 'akram@gmail.com', '01005987456', '$2y$10$liF.LhbU4iwLMembrX5yDOWRJeDCYTkyOySmWGpbwAPN6yrNR0Zp2', 0, NULL, '2023-04-04 13:23:34', '2023-04-04 13:23:34'),
(11, 'Akram Ali', 'akram1@gmail.com', '01005987451', '$2y$10$nym8LuXcy3PBdk7YB1XuMO0OFl/DuZ.nhW2wPDAadr6hWxkrfAYSm', 0, NULL, '2023-04-04 13:25:01', '2023-04-04 13:25:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookings_trip_id_foreign` (`trip_id`),
  ADD KEY `bookings_trip_stop_id_foreign` (`trip_stop_id`),
  ADD KEY `bookings_user_id_foreign` (`user_id`),
  ADD KEY `bookings_bus_id_foreign` (`bus_id`),
  ADD KEY `bookings_seat_id_foreign` (`seat_id`);

--
-- Indexes for table `buses`
--
ALTER TABLE `buses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buses_seats`
--
ALTER TABLE `buses_seats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `buses_seats_bus_id_foreign` (`bus_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cities_name_unique` (`name`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `trips`
--
ALTER TABLE `trips`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trips_start_city_foreign` (`start_city`),
  ADD KEY `trips_end_city_foreign` (`end_city`);

--
-- Indexes for table `trips_stops`
--
ALTER TABLE `trips_stops`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trips_stops_trip_id_foreign` (`trip_id`),
  ADD KEY `trips_stops_start_city_foreign` (`start_city`),
  ADD KEY `trips_stops_end_city_foreign` (`end_city`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `buses`
--
ALTER TABLE `buses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `buses_seats`
--
ALTER TABLE `buses_seats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `trips`
--
ALTER TABLE `trips`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `trips_stops`
--
ALTER TABLE `trips_stops`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_bus_id_foreign` FOREIGN KEY (`bus_id`) REFERENCES `buses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bookings_seat_id_foreign` FOREIGN KEY (`seat_id`) REFERENCES `buses_seats` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bookings_trip_id_foreign` FOREIGN KEY (`trip_id`) REFERENCES `trips` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bookings_trip_stop_id_foreign` FOREIGN KEY (`trip_stop_id`) REFERENCES `trips_stops` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bookings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `buses_seats`
--
ALTER TABLE `buses_seats`
  ADD CONSTRAINT `buses_seats_bus_id_foreign` FOREIGN KEY (`bus_id`) REFERENCES `buses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trips`
--
ALTER TABLE `trips`
  ADD CONSTRAINT `trips_end_city_foreign` FOREIGN KEY (`end_city`) REFERENCES `cities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `trips_start_city_foreign` FOREIGN KEY (`start_city`) REFERENCES `cities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trips_stops`
--
ALTER TABLE `trips_stops`
  ADD CONSTRAINT `trips_stops_end_city_foreign` FOREIGN KEY (`end_city`) REFERENCES `cities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `trips_stops_start_city_foreign` FOREIGN KEY (`start_city`) REFERENCES `cities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `trips_stops_trip_id_foreign` FOREIGN KEY (`trip_id`) REFERENCES `trips` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
