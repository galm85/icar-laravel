-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jan 09, 2021 at 08:35 AM
-- Server version: 5.7.26
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `icarlaravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `article` text NOT NULL,
  `url` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `article`, `url`, `image`, `updated_at`, `created_at`) VALUES
(2, 'Sports Cars', 'this is the sports car categorie', 'sports-car', 'sport_cars.jpg', '2020-12-27 20:34:11', '2020-12-27 20:34:11'),
(3, 'Luxury Cars', 'this is the luxury car categories', 'luxurt-car', 'luxury-cars.jpg', '2020-12-30 16:39:41', '2020-12-30 16:39:41'),
(4, 'SUV Cars', 'this is the suv cars category', 'suv-cars', 'suv_cars.jpg', '2020-12-30 16:39:41', '2020-12-30 16:39:41');

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE `contents` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `article` text NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`id`, `menu_id`, `title`, `article`, `updated_at`, `created_at`) VALUES
(1, 1, 'About icar shop', 'nisl velit, vestibulum at elit dictum, pulvinar maximus neque. Donec finibus facilisis lobortis. Integer venenatis vestibulum feugiat. Suspendisse mollis varius eleifend. Vivamus euismod enim mauris, sed rutrum nunc viverra quis. Phasellus quis malesuada sapien. Duis blandit lacus tincidunt, tincidunt dolor in, bibendum urna. Maecenas sed imperdiet augue. Aliquam bibendum ligula scelerisque, bibendum arcu dictum, interdum turpis. Morbi convallis semper sem i', '2021-01-03 19:29:24', '2021-01-03 19:29:24'),
(2, 1, 'Our shop in israel', 'rtis ex blandit rutrum. Ut vitae nibh venenatis magna pharetra scelerisque sed ac enim. Praesent vulputate elit at felis venenatis, nec bibendum velit auctor. Nulla in diam placerat ligula laoreet sagittis. Nunc pharetra gravida consequat. Suspendisse ac lacus nisl. Morbi ac tortor magna. Nunc rutrum augue nec porttitor tempor. Duis interdum malesuada ante eu aliquet. Pellentesque augue mauris, accumsan et porta quis, maxi', '2021-01-03 19:30:03', '2021-01-03 19:30:03'),
(3, 2, 'iCar services', 'tempus tellus. Integer vel placerat odio. Nam luctus pellentesque ex at dignissim. Sed blandit ante risus. Maecenas viverra dapibus blandit. Phasellus accumsan placerat libero vel dictum. Sed non rutrum quam. Nullam vulputate consectetur leo vel eleifend. Quisque orci lacus, eleifend eu mollis eget, pharetra eu sapien', '2021-01-03 19:30:59', '2021-01-03 19:30:59');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `link` varchar(255) NOT NULL,
  `menu_title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `link`, `menu_title`, `url`, `updated_at`, `created_at`) VALUES
(1, 'About us', 'About page', 'about-us', '2021-01-03 16:41:51', '2021-01-03 16:41:51'),
(2, 'Services', 'Services page', 'our-services', '2021-01-03 17:00:35', '2021-01-03 17:00:35'),
(3, 'Contact us', 'Contact', 'contact-us', '2021-01-03 17:01:09', '2021-01-03 17:01:09');

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
(1, '2020_12_27_202219_create_table_categorie', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `data` text NOT NULL,
  `total` decimal(8,2) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `data`, `total`, `updated_at`, `created_at`) VALUES
(1, 6, 'a:3:{i:5;a:6:{s:2:\"id\";s:1:\"5\";s:4:\"name\";s:11:\"Rolls Royce\";s:5:\"price\";d:80000;s:8:\"quantity\";i:1;s:10:\"attributes\";a:0:{}s:10:\"conditions\";a:0:{}}i:4;a:6:{s:2:\"id\";s:1:\"4\";s:4:\"name\";s:14:\"Mercedes Bentz\";s:5:\"price\";d:90000;s:8:\"quantity\";i:2;s:10:\"attributes\";a:0:{}s:10:\"conditions\";a:0:{}}i:1;a:6:{s:2:\"id\";s:1:\"1\";s:4:\"name\";s:15:\"Ferrarri Italia\";s:5:\"price\";d:150000;s:8:\"quantity\";i:3;s:10:\"attributes\";a:0:{}s:10:\"conditions\";a:0:{}}}', '710000.00', '2021-01-02 16:26:24', '2021-01-02 16:26:24'),
(2, 4, 'a:2:{i:1;a:6:{s:2:\"id\";s:1:\"1\";s:4:\"name\";s:15:\"Ferrarri Italia\";s:5:\"price\";d:150000;s:8:\"quantity\";i:1;s:10:\"attributes\";a:0:{}s:10:\"conditions\";a:0:{}}i:7;a:6:{s:2:\"id\";s:1:\"7\";s:4:\"name\";s:6:\"Nissan\";s:5:\"price\";d:8000;s:8:\"quantity\";i:1;s:10:\"attributes\";a:0:{}s:10:\"conditions\";a:0:{}}}', '158000.00', '2021-01-02 16:27:59', '2021-01-02 16:27:59');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `categorie_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `article` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `categorie_id`, `title`, `article`, `image`, `url`, `price`, `updated_at`, `created_at`) VALUES
(1, 2, 'Ferrarri Italia', 'this is the basic ferrari car model', 'ferrari-1.jpg', 'ferrari-italia', '150000.00', '2020-12-30 19:46:41', '2020-12-30 19:46:41'),
(3, 2, 'Lamburguini Diablo', 'the classic lamburguini model', 'lamburguini.jpg', 'lamburguini', '250000.00', '2020-12-30 19:52:10', '2020-12-30 19:52:10'),
(4, 3, 'Mercedes Bentz', 'the classic car', 'mercedes.jpg', 'mercedes', '90000.00', '2020-12-30 19:55:58', '2020-12-30 19:55:58'),
(5, 3, 'Rolls Royce', 'The classica Rolls royce', 'rolls-royce.jpg', 'rolls-royce', '80000.00', '2020-12-30 19:55:58', '2020-12-30 19:55:58'),
(6, 4, 'Toyota', 'the basic toyota suv', 'toyota_suv.jpg', 'toyota', '9000.00', '2020-12-30 19:57:27', '2020-12-30 19:57:27'),
(7, 4, 'Nissan', 'the classic nissan SUV', 'nissan.jpg', 'nissan', '8000.00', '2020-12-30 19:57:27', '2020-12-30 19:57:27');

-- --------------------------------------------------------

--
-- Table structure for table `table_categorie`
--

CREATE TABLE `table_categorie` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `article` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `updated_at`, `created_at`) VALUES
(1, '-', '-', '-', '2021-01-02 10:10:09', '2021-01-02 10:10:09'),
(2, '--', '--', '--', '2021-01-02 10:10:09', '2021-01-02 10:10:09'),
(3, 'Admin', 'admin@gmail.com', '$2y$10$QxcH83H0IxWg5cW/6aLLQunsGDvh.EMGzFAtQJAu0ZjbIgGAW8gZG', '2021-01-02 10:11:30', '2021-01-02 10:11:30'),
(4, 'Gal Mizrahi', 'galm85@email.com', '$2y$10$QxcH83H0IxWg5cW/6aLLQunsGDvh.EMGzFAtQJAu0ZjbIgGAW8gZG', '2021-01-02 10:13:32', '2021-01-02 10:13:32'),
(5, 'Ben Mizrahi', 'benm88@email.com', '$2y$10$QxcH83H0IxWg5cW/6aLLQunsGDvh.EMGzFAtQJAu0ZjbIgGAW8gZG', '2021-01-02 10:13:32', '2021-01-02 10:13:32'),
(6, 'Adele', 'adele@email.com', '$2y$10$YOPGTa4j6Q3MP.ikFbTBYOrE45Z8wgkOY9VHhcrIU.xYTOyCqJ9qW', '2021-01-02 13:27:16', '2021-01-02 13:27:16');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `uid` int(11) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`uid`, `role`) VALUES
(3, 6),
(4, 7),
(5, 7),
(6, 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `url` (`url`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `url` (`url`);

--
-- Indexes for table `table_categorie`
--
ALTER TABLE `table_categorie`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `url` (`url`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `table_categorie`
--
ALTER TABLE `table_categorie`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
