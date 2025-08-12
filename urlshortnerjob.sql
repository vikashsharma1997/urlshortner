-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2025 at 08:50 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `urlshortnerjob`
--

-- --------------------------------------------------------

--
-- Table structure for table `analytics`
--

CREATE TABLE `analytics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `urlid` bigint(20) UNSIGNED NOT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `hit_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `analytics`
--

INSERT INTO `analytics` (`id`, `urlid`, `ip`, `hit_at`, `created_at`, `updated_at`) VALUES
(3, 2, '127.0.0.1', '2025-08-12 07:46:29', '2025-08-12 07:46:29', '2025-08-12 07:46:29'),
(4, 3, '127.0.0.1', '2025-08-12 07:51:57', '2025-08-12 07:51:57', '2025-08-12 07:51:57'),
(5, 2, '127.0.0.1', '2025-08-12 12:11:14', '2025-08-12 12:11:14', '2025-08-12 12:11:14'),
(6, 4, '127.0.0.1', '2025-08-12 12:18:46', '2025-08-12 12:18:46', '2025-08-12 12:18:46');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Blue Horizon Technologies', NULL, NULL),
(2, 'GreenLeaf Industries', NULL, NULL),
(3, 'SwiftWave Solutions', NULL, NULL),
(4, 'IronPeak Manufacturing', NULL, NULL),
(5, 'BrightPath Consulting', NULL, NULL),
(6, 'NextGen Software Labs', NULL, NULL),
(7, 'SkyBridge Logistics', NULL, NULL),
(8, 'UrbanEdge Realty', NULL, NULL),
(9, 'Suncrest Energy', NULL, NULL),
(10, 'EverTrust Financial', NULL, NULL),
(11, 'NovaCore Systems', NULL, NULL),
(12, 'RedOak Timberworks', NULL, NULL),
(13, 'Starlight Media', NULL, NULL),
(14, 'PrimeWave Networks', NULL, NULL),
(15, 'ClearView Analytics', NULL, NULL),
(16, 'BrightForge Tools', NULL, NULL),
(17, 'AquaPure Waterworks', NULL, NULL),
(18, 'WhitePeak Consulting', NULL, NULL),
(19, 'SteelLine Fabrication', NULL, NULL),
(20, 'AmberSky Studios', NULL, NULL),
(21, 'GreenRoots Farming Co.', NULL, NULL),
(22, 'TechSphere Innovations', NULL, NULL),
(23, 'GoldenGate Imports', NULL, NULL),
(24, 'NorthStar Travel', NULL, NULL),
(25, 'CloudStream IT Solutions', NULL, NULL),
(26, 'EchoPoint Communications', NULL, NULL),
(27, 'BrightLeaf Marketing', NULL, NULL),
(28, 'VantagePoint Security', NULL, NULL),
(29, 'SummitWorks Construction', NULL, NULL),
(30, 'SilverLine Designs', NULL, NULL),
(31, 'CrystalClear Optics', NULL, NULL),
(32, 'TrueNorth Shipping', NULL, NULL),
(33, 'IronGate Hardware', NULL, NULL),
(34, 'BlueSky Apparel', NULL, NULL),
(35, 'BrightWave Digital', NULL, NULL),
(36, 'EverBright Healthcare', NULL, NULL),
(37, 'EcoFlow Energy', NULL, NULL),
(38, 'Redstone Solutions', NULL, NULL),
(39, 'ClearPath Legal', NULL, NULL),
(40, 'Skyline Interiors', NULL, NULL),
(41, 'NextStep Robotics', NULL, NULL),
(42, 'PureHarvest Organics', NULL, NULL),
(43, 'BrightTech Gadgets', NULL, NULL),
(44, 'UrbanGlow Lighting', NULL, NULL),
(45, 'BlueRiver Foods', NULL, NULL),
(46, 'SmartEdge Electronics', NULL, NULL),
(47, 'GoldenLeaf Brewing Co.', NULL, NULL),
(48, 'TrueWave Marine', NULL, NULL),
(49, 'IronRoot Engineering', NULL, NULL),
(50, 'BrightSky Ventures', NULL, NULL);

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_08_12_074354_create_roles_table', 2),
(5, '2025_08_12_083726_create_companies_table', 3),
(6, '2025_08_12_101544_create_short_urls_table', 4),
(7, '2025_08_12_130530_create_analytics_table', 5);

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
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', NULL, NULL),
(2, 'Admin', NULL, NULL),
(3, 'Member', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('x2ygKln7a3dd5kjGLN4U6Kxj11VCbTwVhw6rJZ7g', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoibjZKQVQ1ejJUaDNCU2dXd01SUVFzR3doYWRvdlpMRU53YVJMRTJmSyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjIxOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO30=', 1755023871),
('zXvd2G7hJrUODO0Cp550iaakfsd4MPoXc8R8RZ3B', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiaDd3bjZJUlgyNmdnVHVHdElCVVVRSGRDV2pyeVczZ2NndUJQRnJ2YyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI3OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvc3cuanMiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1755023848);

-- --------------------------------------------------------

--
-- Table structure for table `short_urls`
--

CREATE TABLE `short_urls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userid` bigint(20) UNSIGNED NOT NULL,
  `companyid` bigint(20) UNSIGNED DEFAULT NULL,
  `original_url` varchar(255) NOT NULL,
  `shorten_url` varchar(255) NOT NULL,
  `shortcode` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `short_urls`
--

INSERT INTO `short_urls` (`id`, `userid`, `companyid`, `original_url`, `shorten_url`, `shortcode`, `created_at`, `updated_at`) VALUES
(2, 9, 20, 'https://laravel.com/docs/12.x/authentication', 'http://127.0.0.1:8000/d9fkEr', 'd9fkEr', '2025-08-12 07:09:04', '2025-08-12 07:33:43'),
(3, 9, 20, 'https://www.speedtest.net/', 'http://127.0.0.1:8000/0wnwnC', '0wnwnC', '2025-08-12 07:51:50', '2025-08-12 07:51:50'),
(4, 3, 20, 'https://sembark.com/', 'http://127.0.0.1:8000/mZL0lU', 'mZL0lU', '2025-08-12 10:43:24', '2025-08-12 10:43:24');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `roleid` bigint(20) UNSIGNED NOT NULL,
  `companyid` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `roleid`, `companyid`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'John Super', 'super@urlshortner.com', NULL, '$2y$12$.fTmz6LNAJX3VsqNT9/aJOvjcUVBKWr2ZRLad2lfsdxCEG6sVlMi6', 'Tcb9ciSDVVaWg7wLdGU0v99DLNFDSWAs3WMJgJIbzear7GYIZVC361x3Q18E', '2025-08-12 02:24:28', '2025-08-12 02:24:28'),
(2, 2, 20, 'Alice Admin', 'admin@urlshortner.com', NULL, '$2y$12$fEFOwKlhSIFt2mqjlfW/o.KSthCoAhWx30TO4i59fFAReKM54y5ZC', 'YFB444qqdc', '2025-08-12 02:24:28', '2025-08-12 02:24:28'),
(3, 3, 20, 'Mike Member', 'member@urlshortner.com', NULL, '$2y$12$/Lie21IrLjFlDTWzbEZfeuv5VuNfUG.RxKsO8HokcvEAFY.z/mO/K', 'jRNdWO6LYwOyQGWh6oiAXV0HMRLA9PQG3NHPDqCiA4MoG4fpvuMx0FgzyFHy', '2025-08-12 02:24:28', '2025-08-12 02:24:28'),
(9, 2, 20, 'Vikash', 'vk893061@gmail.com', NULL, '$2y$12$BzOPyV74RvP5uEEsC24CfeN6quboo6CKdw54vW/reQo64g5Sx4E0u', NULL, '2025-08-12 05:43:38', '2025-08-12 05:43:38'),
(10, 3, 20, 'Siddharth Sharma', 'thesiddharthofficial@gmail.com', NULL, '$2y$12$SPvb5yBnjYd4qcz5wQuNdeQWEhcScW5EO.boGzR998BoRF4dshxPu', NULL, '2025-08-12 06:41:03', '2025-08-12 06:41:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `analytics`
--
ALTER TABLE `analytics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `analytics_urlid_index` (`urlid`);

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
-- Indexes for table `companies`
--
ALTER TABLE `companies`
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
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `short_urls`
--
ALTER TABLE `short_urls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `short_urls_userid_index` (`userid`),
  ADD KEY `short_urls_companyid_index` (`companyid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `roleid` (`roleid`),
  ADD KEY `companyid` (`companyid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `analytics`
--
ALTER TABLE `analytics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `short_urls`
--
ALTER TABLE `short_urls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
