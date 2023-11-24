-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2023 at 05:29 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kepriblog`
--

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_11_11_034628_create_post_table', 1),
(6, '2023_11_11_053137_create_category_table', 1),
(7, '2023_11_20_140224_create_categoryd_table', 1),
(8, '2023_11_22_232516_create_destination_table', 1),
(9, '2023_11_23_141624_create_order_table', 1);

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_category`
--

CREATE TABLE `tb_category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_category`
--

INSERT INTO `tb_category` (`id`, `category_name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Trending', 'trending', '2023-11-24 08:28:58', '2023-11-24 08:28:58'),
(2, 'Tour Tips', 'tour-tips', '2023-11-24 08:28:58', '2023-11-24 08:28:58'),
(3, 'Destination Info', 'destination-info', '2023-11-24 08:28:58', '2023-11-24 08:28:58');

-- --------------------------------------------------------

--
-- Table structure for table `tb_categoryd`
--

CREATE TABLE `tb_categoryd` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_categoryd`
--

INSERT INTO `tb_categoryd` (`id`, `category_name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Tanjungpinang City', 'tanjungpinang-city', '2023-11-24 08:28:58', '2023-11-24 08:28:58'),
(2, 'Batam City', 'batam-city', '2023-11-24 08:28:58', '2023-11-24 08:28:58'),
(3, 'Bintan Island', 'bintan-island', '2023-11-24 08:28:58', '2023-11-24 08:28:58'),
(4, 'Karimun Island', 'karimun-island', '2023-11-24 08:28:58', '2023-11-24 08:28:58'),
(5, 'Natuna Island', 'natuna-island', '2023-11-24 08:28:58', '2023-11-24 08:28:58'),
(6, 'Lingga Island', 'lingga-island', '2023-11-24 08:28:58', '2023-11-24 08:28:58'),
(7, 'Anambas Island', 'anambas-island', '2023-11-24 08:28:58', '2023-11-24 08:28:58');

-- --------------------------------------------------------

--
-- Table structure for table `tb_destination`
--

CREATE TABLE `tb_destination` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `package_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_d_id` bigint(20) UNSIGNED NOT NULL,
  `package_price` int(11) NOT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `package_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `package_picture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_destination`
--

INSERT INTO `tb_destination` (`id`, `package_name`, `category_d_id`, `package_price`, `time`, `package_content`, `slug`, `package_picture`, `created_at`, `updated_at`) VALUES
(1, 'One Day Tour Lagoi Bay', 3, 1000, '1 Day 1 Night', '<div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eget luctus orci. Nullam ullamcorper, neque quis ultricies fermentum, sem risus rutrum massa, eu vehicula dui ligula eu dui. In hac habitasse platea dictumst. Nullam tempor magna neque, id lobortis orci congue et. Suspendisse dapibus fermentum lorem. Praesent a sapien ut leo accumsan hendrerit sit amet ac turpis. Vivamus nibh erat, elementum at leo non, aliquam tincidunt metus. Cras at tincidunt tellus. Nullam ultrices posuere cursus. Vestibulum pellentesque sagittis congue. Sed eu dui lorem. Vivamus sed eros pulvinar tortor maximus aliquet. Vivamus sodales massa ac eros mollis ullamcorper et nec erat. Sed mollis nisl ac mauris finibus faucibus. Mauris tempor quam vitae vulputate aliquet.</div>\n                               <div>Donec malesuada dapibus ex, vel faucibus diam accumsan in. Pellentesque porttitor metus et lorem ullamcorper ultricies. Suspendisse potenti. Suspendisse interdum justo sit amet sapien faucibus tincidunt. Vestibulum consectetur ornare enim. Proin efficitur sapien at mi porta, sed condimentum nisl vehicula. Aliquam erat volutpat. Donec fringilla ut libero hendrerit viverra. Fusce arcu nisi, elementum ut tellus id, cursus ornare magna. Nulla volutpat nunc nulla</div>', 'one-day-tour-lagoi-bay', 'assets/img/bintan-lagoi-bay.jpg', '2023-11-24 08:28:58', '2023-11-24 08:28:58'),
(2, 'One Day Tour Batam,', 2, 250, '1 Day', '<div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eget luctus orci. Nullam ullamcorper, neque quis ultricies fermentum, sem risus rutrum massa, eu vehicula dui ligula eu dui. In hac habitasse platea dictumst. Nullam tempor magna neque, id lobortis orci congue et. Suspendisse dapibus fermentum lorem. Praesent a sapien ut leo accumsan hendrerit sit amet ac turpis. Vivamus nibh erat, elementum at leo non, aliquam tincidunt metus. Cras at tincidunt tellus. Nullam ultrices posuere cursus. Vestibulum pellentesque sagittis congue. Sed eu dui lorem. Vivamus sed eros pulvinar tortor maximus aliquet. Vivamus sodales massa ac eros mollis ullamcorper et nec erat. Sed mollis nisl ac mauris finibus faucibus. Mauris tempor quam vitae vulputate aliquet.</div>\n                               <div>Donec malesuada dapibus ex, vel faucibus diam accumsan in. Pellentesque porttitor metus et lorem ullamcorper ultricies. Suspendisse potenti. Suspendisse interdum justo sit amet sapien faucibus tincidunt. Vestibulum consectetur ornare enim. Proin efficitur sapien at mi porta, sed condimentum nisl vehicula. Aliquam erat volutpat. Donec fringilla ut libero hendrerit viverra. Fusce arcu nisi, elementum ut tellus id, cursus ornare magna. Nulla volutpat nunc nulla</div>', 'one-day-tour-batam', 'assets/img/batam-city.jpg', '2023-11-24 08:28:58', '2023-11-24 08:28:58'),
(3, 'One Day Tour Penyengat Island', 1, 250, '1 Day', '<div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eget luctus orci. Nullam ullamcorper, neque quis ultricies fermentum, sem risus rutrum massa, eu vehicula dui ligula eu dui. In hac habitasse platea dictumst. Nullam tempor magna neque, id lobortis orci congue et. Suspendisse dapibus fermentum lorem. Praesent a sapien ut leo accumsan hendrerit sit amet ac turpis. Vivamus nibh erat, elementum at leo non, aliquam tincidunt metus. Cras at tincidunt tellus. Nullam ultrices posuere cursus. Vestibulum pellentesque sagittis congue. Sed eu dui lorem. Vivamus sed eros pulvinar tortor maximus aliquet. Vivamus sodales massa ac eros mollis ullamcorper et nec erat. Sed mollis nisl ac mauris finibus faucibus. Mauris tempor quam vitae vulputate aliquet.</div>\n                               <div>Donec malesuada dapibus ex, vel faucibus diam accumsan in. Pellentesque porttitor metus et lorem ullamcorper ultricies. Suspendisse potenti. Suspendisse interdum justo sit amet sapien faucibus tincidunt. Vestibulum consectetur ornare enim. Proin efficitur sapien at mi porta, sed condimentum nisl vehicula. Aliquam erat volutpat. Donec fringilla ut libero hendrerit viverra. Fusce arcu nisi, elementum ut tellus id, cursus ornare magna. Nulla volutpat nunc nulla</div>', 'one-day-tour-lagoi-bay', 'assets/img/penyengat.jpg', '2023-11-24 08:28:58', '2023-11-24 08:28:58');

-- --------------------------------------------------------

--
-- Table structure for table `tb_order`
--

CREATE TABLE `tb_order` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `package_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int(11) NOT NULL,
  `total_price` bigint(20) NOT NULL,
  `status` enum('Unpaid','Paid') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_order`
--

INSERT INTO `tb_order` (`id`, `name`, `package_name`, `phone`, `email`, `qty`, `total_price`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Sam', 'One Day Tour Lagoi Bay', '098765432', 'sama@gmail.com', 1, 1000000, 'Unpaid', '2023-11-24 08:29:04', '2023-11-24 08:29:04'),
(2, 'Sam', 'One Day Tour Lagoi Bay', '098765432', 'sama@gmail.com', 1, 1000000, 'Unpaid', '2023-11-24 08:29:46', '2023-11-24 08:29:46'),
(3, 'Sam', 'One Day Tour Lagoi Bay', '098765432', 'sama@gmail.com', 1, 1000000, 'Unpaid', '2023-11-24 08:30:25', '2023-11-24 08:30:25'),
(4, 'Sam', 'One Day Tour Lagoi Bay', '098765432', 'sama@gmail.com', 1, 1000000, 'Unpaid', '2023-11-24 08:30:36', '2023-11-24 08:30:36'),
(5, 'Sam', 'One Day Tour Lagoi Bay', '098765432', 'sama@gmail.com', 1, 1000000, 'Unpaid', '2023-11-24 08:35:10', '2023-11-24 08:35:10'),
(6, 'Sam', 'One Day Tour Lagoi Bay', '098765432', 'sama@gmail.com', 1, 1000000, 'Unpaid', '2023-11-24 08:35:26', '2023-11-24 08:35:26'),
(7, 'Sam', 'One Day Tour Lagoi Bay', '098765432', 'sama@gmail.com', 1, 1000000, 'Unpaid', '2023-11-24 08:35:31', '2023-11-24 08:35:31'),
(8, 'Sam', 'One Day Tour Lagoi Bay', '098765432', 'sama@gmail.com', 1, 1000000, 'Unpaid', '2023-11-24 08:37:21', '2023-11-24 08:37:21'),
(9, 'Sam', 'One Day Tour Lagoi Bay', '098765432', 'sama@gmail.com', 1, 1000000, 'Unpaid', '2023-11-24 08:37:25', '2023-11-24 08:37:25'),
(10, 'Sam', 'One Day Tour Lagoi Bay', '098765432', 'sama@gmail.com', 1, 1000000, 'Unpaid', '2023-11-24 08:37:31', '2023-11-24 08:37:31'),
(11, 'sampin', 'One Day Tour Lagoi Bay', '987654321', 'sampin@gmail.com', 1, 1000000, 'Unpaid', '2023-11-24 08:49:52', '2023-11-24 08:49:52'),
(12, 'Sampin', 'One Day Tour Lagoi Bay', '08994879433', 'sampin@gmail.com', 2, 2000000, 'Unpaid', '2023-11-24 08:50:43', '2023-11-24 08:50:43');

-- --------------------------------------------------------

--
-- Table structure for table `tb_post`
--

CREATE TABLE `tb_post` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `creator` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `post_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_picture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_post`
--

INSERT INTO `tb_post` (`id`, `creator`, `category_id`, `post_title`, `post_content`, `slug`, `post_picture`, `created_at`, `updated_at`) VALUES
(1, 'Kepri Escapes', 1, '11 Tour Destination in Riau Islands, One of them Features Thousands of Statues', '<div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eget luctus orci. Nullam ullamcorper, neque quis ultricies fermentum, sem risus rutrum massa, eu vehicula dui ligula eu dui. In hac habitasse platea dictumst. Nullam tempor magna neque, id lobortis orci congue et. Suspendisse dapibus fermentum lorem. Praesent a sapien ut leo accumsan hendrerit sit amet ac turpis. Vivamus nibh erat, elementum at leo non, aliquam tincidunt metus. Cras at tincidunt tellus. Nullam ultrices posuere cursus. Vestibulum pellentesque sagittis congue. Sed eu dui lorem. Vivamus sed eros pulvinar tortor maximus aliquet. Vivamus sodales massa ac eros mollis ullamcorper et nec erat. Sed mollis nisl ac mauris finibus faucibus. Mauris tempor quam vitae vulputate aliquet.</div>\n                               <div>Donec malesuada dapibus ex, vel faucibus diam accumsan in. Pellentesque porttitor metus et lorem ullamcorper ultricies. Suspendisse potenti. Suspendisse interdum justo sit amet sapien faucibus tincidunt. Vestibulum consectetur ornare enim. Proin efficitur sapien at mi porta, sed condimentum nisl vehicula. Aliquam erat volutpat. Donec fringilla ut libero hendrerit viverra. Fusce arcu nisi, elementum ut tellus id, cursus ornare magna. Nulla volutpat nunc nulla</div>', '11-tour-destination-in-riau-islands-one-of-them-features-thousands-of-statues', 'assets/img/kelenteng-senggarang.jpg', '2023-11-24 08:28:58', '2023-11-24 08:28:58'),
(2, 'Kepri Escapes', 2, '5 Frugal Traveling Tips That We Must Apply When On Vacation', '<div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eget luctus orci. Nullam ullamcorper, neque quis ultricies fermentum, sem risus rutrum massa, eu vehicula dui ligula eu dui. In hac habitasse platea dictumst. Nullam tempor magna neque, id lobortis orci congue et. Suspendisse dapibus fermentum lorem. Praesent a sapien ut leo accumsan hendrerit sit amet ac turpis. Vivamus nibh erat, elementum at leo non, aliquam tincidunt metus. Cras at tincidunt tellus. Nullam ultrices posuere cursus. Vestibulum pellentesque sagittis congue. Sed eu dui lorem. Vivamus sed eros pulvinar tortor maximus aliquet. Vivamus sodales massa ac eros mollis ullamcorper et nec erat. Sed mollis nisl ac mauris finibus faucibus. Mauris tempor quam vitae vulputate aliquet.</div>\n                               <div>Donec malesuada dapibus ex, vel faucibus diam accumsan in. Pellentesque porttitor metus et lorem ullamcorper ultricies. Suspendisse potenti. Suspendisse interdum justo sit amet sapien faucibus tincidunt. Vestibulum consectetur ornare enim. Proin efficitur sapien at mi porta, sed condimentum nisl vehicula. Aliquam erat volutpat. Donec fringilla ut libero hendrerit viverra. Fusce arcu nisi, elementum ut tellus id, cursus ornare magna. Nulla volutpat nunc nulla</div>', '5-frugal-traveling-tips-that-we-must-apply-when-on-vacation', 'assets/img/tips.jpg', '2023-11-24 08:28:58', '2023-11-24 08:28:58'),
(3, 'Kepri Escapes', 3, '7 Tourist Destinations in The Riau Islands That Make You Feel At Home', '<div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eget luctus orci. Nullam ullamcorper, neque quis ultricies fermentum, sem risus rutrum massa, eu vehicula dui ligula eu dui. In hac habitasse platea dictumst. Nullam tempor magna neque, id lobortis orci congue et. Suspendisse dapibus fermentum lorem. Praesent a sapien ut leo accumsan hendrerit sit amet ac turpis. Vivamus nibh erat, elementum at leo non, aliquam tincidunt metus. Cras at tincidunt tellus. Nullam ultrices posuere cursus. Vestibulum pellentesque sagittis congue. Sed eu dui lorem. Vivamus sed eros pulvinar tortor maximus aliquet. Vivamus sodales massa ac eros mollis ullamcorper et nec erat. Sed mollis nisl ac mauris finibus faucibus. Mauris tempor quam vitae vulputate aliquet.</div>\n                               <div>Donec malesuada dapibus ex, vel faucibus diam accumsan in. Pellentesque porttitor metus et lorem ullamcorper ultricies. Suspendisse potenti. Suspendisse interdum justo sit amet sapien faucibus tincidunt. Vestibulum consectetur ornare enim. Proin efficitur sapien at mi porta, sed condimentum nisl vehicula. Aliquam erat volutpat. Donec fringilla ut libero hendrerit viverra. Fusce arcu nisi, elementum ut tellus id, cursus ornare magna. Nulla volutpat nunc nulla</div>', '7-tourist-destinations-in-the-riau-islands-that-make-you-feel-at-home', 'assets/img/pulau-ranoh.jpg', '2023-11-24 08:28:58', '2023-11-24 08:28:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'KepriEscapes', 'KepriEscapes@gmail.com', '00000', NULL, '$2y$12$Uf.x7gH3GIPbNT.neaSTLeVPZs8rI8Ek7dAeeNtNpvg4qQ7LYP.nu', 0, NULL, '2023-11-24 08:28:58', '2023-11-24 08:28:58'),
(2, 'Sampin', 'sampin@gmail.com', '08994879433', NULL, '$2y$12$Qh9b.KThK3YsZKnjWfQBr.YtJNZjKgbKpBD49JOguwpw/DJeBc4MC', 1, NULL, '2023-11-24 08:28:58', '2023-11-24 08:28:58');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `tb_category`
--
ALTER TABLE `tb_category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tb_category_category_name_unique` (`category_name`),
  ADD UNIQUE KEY `tb_category_slug_unique` (`slug`);

--
-- Indexes for table `tb_categoryd`
--
ALTER TABLE `tb_categoryd`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tb_categoryd_category_name_unique` (`category_name`),
  ADD UNIQUE KEY `tb_categoryd_slug_unique` (`slug`);

--
-- Indexes for table `tb_destination`
--
ALTER TABLE `tb_destination`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_post`
--
ALTER TABLE `tb_post`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_category`
--
ALTER TABLE `tb_category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_categoryd`
--
ALTER TABLE `tb_categoryd`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_destination`
--
ALTER TABLE `tb_destination`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_order`
--
ALTER TABLE `tb_order`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_post`
--
ALTER TABLE `tb_post`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
