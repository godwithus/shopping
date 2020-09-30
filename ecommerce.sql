-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 30, 2020 at 04:07 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `verification_token`) VALUES
(1, 'admin', 'iXLozOercQtTznZkmuquKHYwvqVvwWZU', '$2y$13$ugXoKJanm4FtAO.TPeVgy.tk/wN5x2NXLxknrpM1viik4oNgAdF8a', NULL, 'emmanuel@emmanuel.com', 10, 1598836632, 1598836632, '');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `created_at`) VALUES
(2, 'Ladies_Clothes', '2020-09-29 03:09:25'),
(3, 'Bags', '2020-09-29 03:09:38'),
(4, 'Men_Clothes', '2020-09-29 03:09:52'),
(10, 'Trousers', '2020-09-29 03:11:45'),
(11, 'Shirts', '2020-09-29 03:12:12');

-- --------------------------------------------------------

--
-- Table structure for table `contact_form`
--

CREATE TABLE `contact_form` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `body` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact_form`
--

INSERT INTO `contact_form` (`id`, `name`, `email`, `subject`, `body`, `created_at`) VALUES
(1, 'Emmanuel', 'emma@g.com', 'The Subject', 'SASASAS', NULL),
(2, 'Emmanel', 'emma@g.com', 'The Subject', 'aasasas', '2020-09-02 17:55:26');

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1598836402),
('m130524_201442_init', 1598836408),
('m190124_110200_add_verification_token_column_to_user_table', 1598836409);

-- --------------------------------------------------------

--
-- Table structure for table `picture`
--

CREATE TABLE `picture` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `picture`
--

INSERT INTO `picture` (`id`, `product_id`, `image`, `created_at`) VALUES
(1, 3, '1599698850922.gif', '2020-09-10 00:47:30'),
(2, 3, '1599698851774.jpg', '2020-09-10 00:47:31'),
(3, 3, '1599698851921.jpg', '2020-09-10 00:47:31'),
(4, 3, '1599699041810.jpg', '2020-09-10 00:50:41'),
(5, 3, '1599699041729.jpg', '2020-09-10 00:50:41'),
(6, 3, '1599699042375.jpg', '2020-09-10 00:50:42'),
(7, 3, '1599699042164.jpg', '2020-09-10 00:50:42'),
(8, 3, '1599699042671.jpg', '2020-09-10 00:50:42'),
(9, 1, '1599699075818.jpg', '2020-09-10 00:51:15'),
(10, 1, '1599699075655.jpg', '2020-09-10 00:51:15'),
(11, 1, '1599855707728.jpg', '2020-09-11 20:21:47'),
(12, 1, '1599855707578.jpg', '2020-09-11 20:21:47'),
(13, 1, '1599855707954.jpg', '2020-09-11 20:21:47'),
(14, 2, '1599855755123.jpg', '2020-09-11 20:22:35'),
(15, 2, '1599855755470.jpg', '2020-09-11 20:22:35'),
(16, 2, '1599855755786.jpg', '2020-09-11 20:22:35');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `ikey` varchar(50) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `avalability` varchar(50) NOT NULL,
  `prod_condition` varchar(100) NOT NULL,
  `brand` varchar(100) NOT NULL,
  `stock` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `user_email`, `name`, `description`, `ikey`, `amount`, `quantity`, `avalability`, `prod_condition`, `brand`, `stock`, `image`, `status`, `created_at`) VALUES
(5, 0, 'emmanuel@emmanuel.com', 'Note Books', 'Get a Exercise Book for any Event ', '160134752745', '18', 60, '1', '2', 'Laba', 1, 'spiral-notebook-mockups.jpg', 1, '2020-09-29 02:45:27'),
(6, 1, 'emmanuel@emmanuel.com', 'Note Books', 'Note Books', '16013503301', '6', 6, '1', '2', 'Laba', 67, 'preview.jpg', 1, '2020-09-29 03:32:10'),
(7, 2, 'emmanuel@emmanuel.com', 'lkllk', 'lklkl;klk', '160135036755', '50', 6, '0', '2', 'nike', 67, 'download (1).jpg', 1, '2020-09-29 03:32:47'),
(8, 4, 'emmanuel@emmanuel.com', 'Polo', 'A new Collection of Polos', '160140277941', '200', 3, '1', '2', 'nike', 9, '20161208_084413-420x315.jpg', 1, '2020-09-29 18:06:19'),
(9, 4, 'emmanuel@emmanuel.com', 'Gown', 'Graduation Gown', '160143613826', '50', 6, '1', '2', 'kjc', 3, 'pexels-photo-949587.jpeg', 1, '2020-09-30 03:22:18');

-- --------------------------------------------------------

--
-- Table structure for table `product_container`
--

CREATE TABLE `product_container` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_container`
--

INSERT INTO `product_container` (`id`, `name`, `created_at`) VALUES
(1, 'Old', '2020-09-09 18:49:41'),
(2, 'New', '2020-09-09 18:49:41'),
(3, 'Special', '2020-09-09 18:50:25'),
(4, 'Single', '2020-09-09 18:50:25');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `verification_token`) VALUES
(1, 'emmanuel', 'iXLozOercQtTznZkmuquKHYwvqVvwWZU', '$2y$13$ugXoKJanm4FtAO.TPeVgy.tk/wN5x2NXLxknrpM1viik4oNgAdF8a', NULL, 'emmanuel@emmanuel.com', 10, 1598836632, 1598836632, ''),
(2, 'femifemi', '6E0FkduVCnMb2JgenLu6a3JIN7KmbhaO', '$2y$13$lc80nSKCI8RrbZB8Uaklvu7F8CJ8dMzp6zdwgee26TDQHgSRrEnNy', NULL, 'femifemi@femi.com', 10, 1598836784, 1598836784, 'Ghb3uFD7xS7NrIsPUw_MBV31EIJ-PsxB_1598836784'),
(3, 'pelumipelumi', 'H5Ops67JvGJpCUzkkm9CEnAZxb_xxM6Y', '$2y$13$TM8Dqax1PisA/d2rb8p39uScqNZ/74uu.xnKu0IXa.6DSDm/KEdQe', NULL, 'pelumipelumi@pelumi.com', 10, 1598838657, 1598838657, 'tVw9Xk6MUcbevUw16FcAT1u_Qod0eUnk_1598838657');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `user_id`, `category_id`, `created_at`) VALUES
(10, 1, 4, '2020-09-30 03:19:34'),
(11, 1, 2, '2020-09-30 03:19:46'),
(12, 1, 1, '2020-09-30 03:19:57'),
(13, 1, 0, '2020-09-30 03:20:07'),
(14, 1, 4, '2020-09-30 03:22:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_form`
--
ALTER TABLE `contact_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `picture`
--
ALTER TABLE `picture`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_container`
--
ALTER TABLE `product_container`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `contact_form`
--
ALTER TABLE `contact_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `picture`
--
ALTER TABLE `picture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product_container`
--
ALTER TABLE `product_container`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
