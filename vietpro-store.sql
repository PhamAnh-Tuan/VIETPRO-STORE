-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2021 at 09:52 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vietpro-store`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(10) UNSIGNED NOT NULL,
  `cat_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_parent_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`, `cat_slug`, `cat_parent_id`, `created_at`, `updated_at`) VALUES
(1, 'Nam', 'nam', 0, NULL, NULL),
(2, 'Áo Nam', 'ao-nam', 1, NULL, NULL),
(4, 'Nữ', 'nu', 0, NULL, NULL),
(5, 'Áo Nữ', 'ao-nu', 4, NULL, NULL),
(6, 'Quần Nữ', 'quan-nu', 4, NULL, NULL),
(7, 'Áo Nam Công Sở', 'ao-nam-cong-so', 2, '2021-01-14 16:40:54', '2021-01-14 16:40:54');

-- --------------------------------------------------------

--
-- Table structure for table `category_product`
--

CREATE TABLE `category_product` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_product`
--

INSERT INTO `category_product` (`id`, `category_id`, `product_id`, `created_at`, `updated_at`) VALUES
(3, 2, 5, NULL, NULL),
(4, 2, 6, NULL, NULL),
(5, 7, 7, NULL, NULL),
(6, 5, 8, NULL, NULL),
(7, 6, 9, NULL, NULL),
(8, 5, 10, NULL, NULL),
(12, 5, 14, NULL, NULL),
(13, 2, 15, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `id` int(10) UNSIGNED NOT NULL,
  `cmt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`id`, `cmt`, `address`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '145818594', 'da nang', 2, NULL, NULL);

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
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2020_12_15_111619_create_users_table', 1),
(3, '2020_12_15_123842_create_categories_table', 1),
(4, '2020_12_15_124128_create_orders_table', 1),
(5, '2020_12_15_124733_create_order_detail_table', 1),
(6, '2020_12_15_125858_create_products_table', 1),
(7, '2020_12_16_131317_create_info_table', 1),
(8, '2020_12_25_120430_create_category_product_table', 1),
(9, '2021_01_02_085228_create_social_accounts_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail`
--

CREATE TABLE `orderdetail` (
  `ord_detail_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ord_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orderdetail`
--

INSERT INTO `orderdetail` (`ord_detail_id`, `code`, `name`, `price`, `quantity`, `image`, `ord_id`, `created_at`, `updated_at`) VALUES
(1, 'AS', 'ao nam sinh vien', 5000, 5, 'ao.jpg', 1, NULL, NULL),
(2, 'AM', 'ao nam sinh vien 1', 6000, 2, 'aomi.jpg', 1, NULL, NULL),
(3, 'QA', 'ao nam sinh vien 2', 6000, 1, 'quanau.jpg', 1, NULL, NULL),
(4, 'QA', 'ao nam sinh vien 3', 7000, 9, 'aoquan.jpg', 1, NULL, NULL),
(5, 'AS', 'ao nam sinh vien 4', 5000, 5, 'ao.jpg', 2, NULL, NULL),
(6, 'AM', 'ao nam sinh vien 5', 6000, 2, 'aomi.jpg', 2, NULL, NULL),
(7, 'QA', 'ao nam sinh vien 6', 6000, 1, 'quanau.jpg', 2, NULL, NULL),
(8, 'QA', 'ao nam sinh vien 7', 7000, 9, 'aoquan.jpg', 2, NULL, NULL),
(9, 'AS', 'ao nam sinh vien 8', 5000, 5, 'ao.jpg', 3, NULL, NULL),
(10, 'AM', 'ao nam sinh vien 9', 6000, 2, 'aomi.jpg', 3, NULL, NULL),
(11, 'QA', 'ao nam sinh vien 10', 6000, 1, 'quanau.jpg', 3, NULL, NULL),
(12, 'QA', 'ao nam sinh vien 11', 7000, 9, 'aoquan.jpg', 4, NULL, NULL),
(13, 'QN03', 'Quần Nam Kaki Xám', 100000, 1, 'quan-kaki-xam-chuot-dam-qk171-9770.jpg', 5, '2021-01-14 17:59:39', '2021-01-14 17:59:39'),
(14, 'QN02', 'Quần Kaki Nâu', 100000, 1, 'quan-kaki-nauqk178-10366.jpg', 5, '2021-01-14 17:59:39', '2021-01-14 17:59:39'),
(15, 'QN03', 'Quần Nam Kaki Xám', 100000, 1, 'quan-kaki-xam-chuot-dam-qk171-9770.jpg', 6, '2021-01-14 18:02:33', '2021-01-14 18:02:33'),
(16, 'QN02', 'Quần Kaki Nâu', 100000, 1, 'quan-kaki-nauqk178-10366.jpg', 6, '2021-01-14 18:02:33', '2021-01-14 18:02:33'),
(17, 'QN03', 'Quần Nam Kaki Xám', 100000, 1, 'quan-kaki-xam-chuot-dam-qk171-9770.jpg', 7, '2021-01-14 18:06:06', '2021-01-14 18:06:06'),
(18, 'QN02', 'Quần Kaki Nâu', 100000, 1, 'quan-kaki-nauqk178-10366.jpg', 7, '2021-01-14 18:06:06', '2021-01-14 18:06:06'),
(19, 'AN01', 'Áo Nữ Phối Viền', 100000, 1, 'ao-nu-phoi-vien.jpg', 8, '2021-01-17 07:55:12', '2021-01-17 07:55:12'),
(20, 'AK001111', 'Áo Nam Hè Thu', 100000, 1, 'ao-so-mi-hoa-tiet-den-asm1223-10191.jpg', 8, '2021-01-17 07:55:13', '2021-01-17 07:55:13'),
(21, 'AN01', 'Áo Nữ Phối Viền', 100000, 1, 'ao-nu-phoi-vien.jpg', 9, '2021-01-17 08:05:23', '2021-01-17 08:05:23'),
(22, 'AK001111', 'Áo Nam Hè Thu', 100000, 1, 'ao-so-mi-hoa-tiet-den-asm1223-10191.jpg', 9, '2021-01-17 08:05:23', '2021-01-17 08:05:23'),
(23, 'AN01', 'Áo Nữ Phối Viền', 100000, 1, 'ao-nu-phoi-vien.jpg', 10, '2021-01-17 08:07:28', '2021-01-17 08:07:28'),
(24, 'AK001111', 'Áo Nam Hè Thu', 100000, 1, 'ao-so-mi-hoa-tiet-den-asm1223-10191.jpg', 10, '2021-01-17 08:07:28', '2021-01-17 08:07:28'),
(25, 'AN01', 'Áo Nữ Phối Viền', 100000, 1, 'ao-nu-phoi-vien.jpg', 11, '2021-01-17 08:07:52', '2021-01-17 08:07:52'),
(26, 'AK001111', 'Áo Nam Hè Thu', 100000, 1, 'ao-so-mi-hoa-tiet-den-asm1223-10191.jpg', 11, '2021-01-17 08:07:52', '2021-01-17 08:07:52'),
(27, 'AN01', 'Áo Nữ Phối Viền', 100000, 1, 'ao-nu-phoi-vien.jpg', 12, '2021-01-17 08:10:35', '2021-01-17 08:10:35'),
(28, 'AK001111', 'Áo Nam Hè Thu', 100000, 1, 'ao-so-mi-hoa-tiet-den-asm1223-10191.jpg', 12, '2021-01-17 08:10:35', '2021-01-17 08:10:35'),
(29, 'AN01', 'Áo Nữ Phối Viền', 100000, 1, 'ao-nu-phoi-vien.jpg', 13, '2021-01-17 08:16:24', '2021-01-17 08:16:24'),
(30, 'AK001111', 'Áo Nam Hè Thu', 100000, 1, 'ao-so-mi-hoa-tiet-den-asm1223-10191.jpg', 13, '2021-01-17 08:16:24', '2021-01-17 08:16:24'),
(31, 'AN01', 'Áo Nữ Phối Viền', 100000, 1, 'ao-nu-phoi-vien.jpg', 14, '2021-01-17 08:17:32', '2021-01-17 08:17:32'),
(32, 'AK001111', 'Áo Nam Hè Thu', 100000, 1, 'ao-so-mi-hoa-tiet-den-asm1223-10191.jpg', 14, '2021-01-17 08:17:32', '2021-01-17 08:17:32'),
(33, 'AN01', 'Áo Nữ Phối Viền', 100000, 1, 'ao-nu-phoi-vien.jpg', 15, '2021-01-17 08:18:14', '2021-01-17 08:18:14'),
(34, 'AK001111', 'Áo Nam Hè Thu', 100000, 1, 'ao-so-mi-hoa-tiet-den-asm1223-10191.jpg', 15, '2021-01-17 08:18:14', '2021-01-17 08:18:14'),
(35, 'AN01', 'Áo Nữ Phối Viền', 100000, 1, 'ao-nu-phoi-vien.jpg', 16, '2021-01-17 08:31:43', '2021-01-17 08:31:43'),
(36, 'AK001111', 'Áo Nam Hè Thu', 100000, 1, 'ao-so-mi-hoa-tiet-den-asm1223-10191.jpg', 16, '2021-01-17 08:31:43', '2021-01-17 08:31:43'),
(37, 'AN01', 'Áo Nữ Phối Viền', 100000, 1, 'ao-nu-phoi-vien.jpg', 17, '2021-01-17 08:35:26', '2021-01-17 08:35:26'),
(38, 'AK001111', 'Áo Nam Hè Thu', 100000, 1, 'ao-so-mi-hoa-tiet-den-asm1223-10191.jpg', 17, '2021-01-17 08:35:26', '2021-01-17 08:35:26');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `ord_id` int(10) UNSIGNED NOT NULL,
  `ord_fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ord_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ord_email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ord_phone` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ord_total` decimal(18,2) NOT NULL,
  `ord_state` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`ord_id`, `ord_fullname`, `ord_address`, `ord_email`, `ord_phone`, `ord_total`, `ord_state`, `created_at`, `updated_at`) VALUES
(1, 'chu van huy', 'Hung yen', 'vanhuy@gmail.com', '0371975858', '3.00', 0, NULL, NULL),
(2, 'Chu van hoang', 'ha noi', 'vanhoang@gmail.com', '0359555', '2.00', 0, NULL, NULL),
(3, 'Hoang Van Cong', 'ha noi', 'vanhoang@gmail.com', '0359555', '3.00', 0, NULL, NULL),
(4, 'Dan chi binh', 'ha noi', 'chibinh@gmail.com', '035945858', '7.00', 0, NULL, NULL),
(5, 'chu van huy', 'Hà nội 2', 'huyhong76119@yahoo.com', '0374970903', '242.00', 0, '2021-01-14 17:59:39', '2021-01-14 17:59:39'),
(6, 'chu van huy', 'Hà nội 2', 'huyhong76119@yahoo.com', '0374970903', '242.00', 0, '2021-01-14 18:02:33', '2021-01-14 18:02:33'),
(7, 'Lung Thi Linh', 'Hà nội 2', 'huyhong76119@yahoo.com', '0374970903', '242.00', 0, '2021-01-14 18:06:06', '2021-01-14 18:06:06'),
(8, 'Linh Thi Lung Linh', 'da nang', 'dothuykieu@gmail.com', '0374970903', '200.00', 0, '2021-01-17 07:55:10', '2021-01-17 07:55:10'),
(9, 'Phuong The Ngoc', 'da nang', 'dothuykieu@gmail.com', '0374970903', '200.00', 0, '2021-01-17 08:05:22', '2021-01-17 08:05:22'),
(10, 'Phuong The Ngoc', 'da nang', 'dothuykieu@gmail.com', '0374970903', '200.00', 0, '2021-01-17 08:07:28', '2021-01-17 08:07:28'),
(11, 'Phuong The Ngoc 1', 'da nang', 'dothuykieu@gmail.com', '0374970903', '200.00', 0, '2021-01-17 08:07:51', '2021-01-17 08:07:51'),
(12, 'Phuong The Ngoc 2', 'da nang', 'dothuykieu@gmail.com', '0374970903', '200.00', 0, '2021-01-17 08:10:34', '2021-01-17 08:10:34'),
(13, 'Phuong The Ngoc 2', 'da nang', 'dothuykieu@gmail.com', '0374970903', '200.00', 0, '2021-01-17 08:16:24', '2021-01-17 08:16:24'),
(14, 'Hoang Phi Hong', 'da nang', 'dothuykieu@gmail.com', '0374970903', '200.00', 0, '2021-01-17 08:17:31', '2021-01-17 08:17:31'),
(15, 'Hoang Phi Hong', 'da nang', 'dothuykieu@gmail.com', '0374970903', '200.00', 0, '2021-01-17 08:18:13', '2021-01-17 08:18:13'),
(16, 'OZAWOAAAA', 'da nang', 'dothuykieu@gmail.com', '0374970903', '200.00', 0, '2021-01-17 08:31:42', '2021-01-17 08:31:42'),
(17, 'OZAWOAAAA', 'da nang', 'dothuykieu@gmail.com', '0374970903', '200.00', 0, '2021-01-17 08:35:25', '2021-01-17 08:35:25');

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `prd_id` int(10) UNSIGNED NOT NULL,
  `prd_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prd_code` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prd_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prd_price` int(11) NOT NULL,
  `prd_featured` int(11) NOT NULL,
  `prd_state` int(11) NOT NULL,
  `prd_info` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `prd_describer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `prd_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prd_id`, `prd_name`, `prd_code`, `prd_slug`, `prd_price`, `prd_featured`, `prd_state`, `prd_info`, `prd_describer`, `prd_image`, `cat_id`, `created_at`, `updated_at`) VALUES
(5, 'Áo Nam Hè Thu', 'AK001111', 'ao-nam-he-thu', 100000, 0, 1, 'tt', 'mt', 'ao-so-mi-hoa-tiet-den-asm1223-10191.jpg', 2, '2021-01-14 17:35:19', '2021-01-14 17:35:19'),
(6, 'Áo Nam Thu Đông', 'AK001111', 'ao-nam-thu-dong', 100000, 0, 1, 'tt', 'mt', 'ao-so-mi-ca-ro-xam-xanh-asm1228-10199.jpg', 2, '2021-01-14 17:40:09', '2021-01-14 17:40:09'),
(7, 'Áo Nam Công Sở', 'AoNam01', 'ao-nam-cong-so', 100000, 0, 1, 'tt', 'mt', 'ao-so-mi-trang-kem-asm836-8193.jpg', 7, '2021-01-14 17:40:40', '2021-01-14 17:40:40'),
(8, 'Áo Nữ Hè Thu', 'AN01', 'ao-nu-he-thu', 100000, 0, 1, 'tt', 'mt', 'Ao_nu_so_mi_cham_bi.jpg', 5, '2021-01-14 17:41:11', '2021-01-14 17:41:11'),
(9, 'Quần Nữ Sơ MI Cổ Đục', 'QN02', 'quan-nu-so-mi-co-duc', 100000, 0, 1, 'tt', 'mt', 'ao-nu-so-mi-co-co-duc.jpg', 6, '2021-01-14 17:41:54', '2021-01-14 17:41:54'),
(10, 'Áo Nữ Phối Viền', 'AN01', 'ao-nu-phoi-vien', 100000, 0, 1, 'tt', 'mt', 'ao-nu-phoi-vien.jpg', 5, '2021-01-14 17:42:30', '2021-01-14 17:42:30'),
(14, 'Áo Nữ Thời Trang', 'AN04', 'ao-nu-thoi-trang', 11111, 0, 1, 'TT', 'MT', 'images (7).jfif', 5, '2021-01-14 17:45:24', '2021-01-14 17:45:24'),
(15, 'Áo Nữ Hè Thu', 'AK001111xxz', 'ao-nu-he-thu', 100000, 0, 1, 'tt', 'mt', 'images.jfif', 2, '2021-01-17 06:06:35', '2021-01-17 06:06:54');

-- --------------------------------------------------------

--
-- Table structure for table `social_accounts`
--

CREATE TABLE `social_accounts` (
  `user_id` int(11) NOT NULL,
  `provider_user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_phone` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_level` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_email`, `password`, `user_fullname`, `user_address`, `user_phone`, `provider`, `provider_id`, `remember_token`, `user_level`, `created_at`, `updated_at`, `avatar`) VALUES
(1, 'dothuykieu@gmail.com', '$2y$10$pnzlc.CasidkZej15TTeGuSuR5MZeCAkiPUPfQeLtQEk088ityrQK', 'Đỗ Thúy Kiều', 'hưng yên', '0374970903', NULL, NULL, '', 1, NULL, '2021-01-17 06:41:40', 'do-thuy-kieu_40.jpg'),
(2, 'quantrimang@gmail.com', '$2y$10$Hoq7KjawKmGW.dVtmsTocO9dSAZSyaJvwK/aU.sUTCrGv2bmAbfLa', 'quản trị xinh trai', 'Hà nội', '0374970904', NULL, NULL, '', 2, NULL, NULL, NULL),
(3, 'dev055@gmail.com', '$2y$10$OFV299E7Z6lZ/oXwap41n.nwCa6.bDXxFMJjYM7H8cyyhdJC0A5/C', 'huy xấu trai', 'hưng yên 2', '0374970903', '', '', 'hưng yên 2', 1, '2021-01-17 06:08:22', '2021-01-17 06:08:22', NULL),
(4, 'dev055@gmail.com', '$2y$10$ZNpVEyRXXPiyEynaIkCEU.j8jUbDBur4Qt7JPEVO3oQoAQ3H0uPmG', 'huy xấu trai', 'hưng yên 3', '0374970903', '', '', 'hưng yên 3', 1, '2021-01-17 06:12:10', '2021-01-17 06:12:10', ''),
(5, 'dev055@gmail.com', '$2y$10$b4ELUqfAGyyVDtEhCSlhF.k.CuFfpvCxFfwln/.ak17BePkQMtICm', 'chu van huy', 'hưng yên 4', '0374970903', '', '', 'hưng yên 4', 1, '2021-01-17 06:15:44', '2021-01-17 06:15:44', ''),
(6, 'admin5@gmail.com', '$2y$10$AJ3URQTTvjJ1EookpE.wbOEuFPUz0UMXeXW8KKftQJtejQiVfgzdq', 'HuyVan', 'hưng yên 5', '0374970903', '', '', 'hưng yên 5', 1, '2021-01-17 06:16:58', '2021-01-17 06:27:45', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `category_product`
--
ALTER TABLE `category_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_product_category_id_foreign` (`category_id`),
  ADD KEY `category_product_product_id_foreign` (`product_id`);

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `info_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`ord_detail_id`),
  ADD KEY `orderdetail_ord_id_foreign` (`ord_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ord_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`prd_id`),
  ADD KEY `products_cat_id_foreign` (`cat_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `category_product`
--
ALTER TABLE `category_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orderdetail`
--
ALTER TABLE `orderdetail`
  MODIFY `ord_detail_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `ord_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `prd_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category_product`
--
ALTER TABLE `category_product`
  ADD CONSTRAINT `category_product_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `category_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`prd_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `info`
--
ALTER TABLE `info`
  ADD CONSTRAINT `info_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD CONSTRAINT `orderdetail_ord_id_foreign` FOREIGN KEY (`ord_id`) REFERENCES `orders` (`ord_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_cat_id_foreign` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
