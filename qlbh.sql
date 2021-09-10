-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2021 at 05:34 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qlbh`
--
CREATE DATABASE `qlbh` CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `qlbh`;
-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permission` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `password`, `permission`) VALUES
('admin', 'admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `buy_product`
--

CREATE TABLE `buy_product` (
  `id_product` int(11) UNSIGNED NOT NULL,
  `id_buyer` int(11) UNSIGNED NOT NULL,
  `price` double NOT NULL,
  `ship_addr` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `payment_method` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `stt` int(11) UNSIGNED NOT NULL,
  `id_buyer` int(11) UNSIGNED NOT NULL,
  `id_product` int(11) UNSIGNED NOT NULL,
  `quantity` smallint(5) UNSIGNED NOT NULL,
  `price` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `img`
--

CREATE TABLE `img` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_product` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `img`
--

INSERT INTO `img` (`id`, `name`, `id_product`) VALUES
(18, '1.jpg', 8),
(19, 'ban-phim-co-akko-3084-v2-asa-black-pink-02-1_05cf1ef889164fc7b33af553b84a0c28.jpg', 8),
(20, 'ban-phim-co-akko-3084-v2-asa-black-pink-04-1_dbcc663f1bc745719ba9c638ba7b4861.jpg', 8),
(21, 'base-k55-rgb-pro-config-gallery-k55-rgb-pro-01_383e5e6b6c1448ec8ea2774436fc35bb.jpg', 9),
(22, '-base-k55-rgb-pro-config-gallery-k55-rgb-pro-23_6f011f0aced9460f8fca38b98d753791.jpg', 9),
(23, '-base-k55-rgb-pro-config-gallery-k55-rgb-pro-26_c277e990eda54e6fa04f6d9ea47f6f8f.jpg', 9),
(24, 'gearvn-ban-phim-co-corsair-k100-rgb-6_f086eb11aece48d597ca227aaa6d6b3c.png', 10),
(25, 'gearvn-ban-phim-co-corsair-k100-rgb-1_3acef0197e654548a2114db3ae6e69cb.png', 10),
(26, 'gearvn-ban-phim-co-corsair-k100-rgb-4_5f8aa0cb982a4438afec52f8dfb87c12.png', 10),
(27, 'techzones-corsair-k65-rgb-mini-60-3_0a94af5bd4034e6fa2c6f6fc4dd310f2.jpg', 11),
(28, 'techzones-corsair-k65-rgb-mini-60-5_46138cbf42a84a7ca9ba8aab8b04a2f3.jpg', 11),
(29, 'techzones-corsair-k65-rgb-mini-60-2_2dd0b97bfc8949f6a8cd635cfee12b9c.jpg', 11),
(30, 'n_com-products-ban-phim-co-akko-3084-silent-bluetooth-akko-switch-v2-2_5568b6c68ac8443eb9d25da81f7eb137.jpg', 12),
(31, 'n_com-products-ban-phim-co-akko-3084-silent-bluetooth-akko-switch-v2-4_2a814fcfc31f47a4a56e8162dc437856.jpg', 12),
(32, 'n_com-products-ban-phim-co-akko-3084-silent-bluetooth-akko-switch-v2-7_549ae49421bb4f4291f9588d2aba1c55.jpg', 12),
(33, 'chuot-game-akko-lw325-black-lightweight-1_4eb9f9f3b8fc4dc99552bc412fc84bb0.jpg', 13),
(34, 'chuot-game-akko-lw325-black-lightweight-2_3ce0555329be424f9d34e15bad9d51c9.jpg', 13),
(35, 'chuot-game-akko-lw325-black-lightweight-5_6a675aa299ba46ff90a3bd87082bc30c.jpg', 13),
(36, '1_(1).jpg', 14),
(37, 'hyperx-cloud-stinger-gaming-headset-top-1475573758381_1475666344_194.jpg', 14),
(38, 'kingston_hx_hscs_bk_ee_images_1741362753.jpg', 14),
(39, 'razer-kraken-x-mercury-4_f606d7fc63514147a9a4928aaf0b2ab4.png', 15),
(40, 'gearvn-razer-kraken-x-mercury-2_7be19db5bb2c44c089c6b88772ce49b1_grande.jpg', 15),
(41, 'gearvn-razer-kraken-x-mercury-1_8d5a8809482a4d9dbf8c3e63aa0b5a94_grande.jpg', 15),
(42, '-ca-9011181-na-gallery-virtuoso-se-brown-20_c5e5bb5fbc884c9d8c217fd1ce975dd3.png', 16),
(43, '-ca-9011181-na-gallery-virtuoso-se-brown-22_71cc3fc81f6e4f89838c81dfb7a300a8.png', 16),
(44, '-ca-9011181-na-gallery-virtuoso-se-brown-01_925fbcaeb9894d5d826ee9f4b805618e.png', 16),
(46, 'ps51.jpg', 18),
(47, 'ps5_1.jpg', 18),
(48, 'ps5_2.jpg', 18),
(49, 'headphone_1.jpg', 19),
(50, 'headphone_2.jpg', 19),
(51, 'mouse.png', 20),
(52, 'keyboard.png', 21);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `userid` int(11) UNSIGNED NOT NULL,
  `description` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `avt` int(11) UNSIGNED NOT NULL,
  `instock` int(10) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `userid`, `description`, `avt`, `instock`) VALUES
(8, 'Akko 3084 v2 ASA – Black Pink', 1490000, 8, 'Đây là Akko 3084 v2 ASA – Black Pink', 20, 80),
(9, 'Corsair K55 RGB Pro', 1050000, 7, 'Đây là Corsair K55 RGB Pro', 23, 100),
(10, 'Corsair K100 RGB', 4810000, 7, 'Đây là Corsair K100 RGB', 26, 20),
(11, 'Corsair K65 RGB MINI', 2590000, 7, 'Đây là Corsair K65 RGB MINI', 29, 180),
(12, 'Akko 3084 Silent Bluetooth (Akko switch v2)', 1590000, 8, 'Đây là Akko 3084 Silent Bluetooth (Akko switch v2)', 30, 80),
(13, 'Akko LW325 Black (Lightweight)', 590000, 8, 'Đây là Akko LW325 Black (Lightweight)', 33, 200),
(14, 'HyperX Cloud Stinger', 1190000, 9, 'Đây là HyperX Cloud Stinger', 36, 150),
(15, 'Razer Kraken X Mercury', 1390000, 9, 'Đây là Razer Kraken X Mercury', 40, 80),
(16, 'Corsair Virtuoso RGB Wireless SE Espresso', 5490000, 9, 'Đây là Corsair Virtuoso RGB Wireless SE Espresso', 44, 10),
(18, 'PlayStation 5 (Black/ White)', 25000000, 11, 'Kế thừa những tinh hoa từ người tiền nhiệm PS4, Sony PlayStation 5 là cỗ máy chiến game không thể thiếu của mọi game thủ. Với cấu hình nâng cấp mạnh mẽ, vận hành nhanh nhạy và hỗ trợ lên độ phân giải lên đến 8K, không khó để khẳng định PlayStation 5 sẽ nâng cấp trải nghiệm gaming lên tầm cao mới.', 48, 30),
(19, 'Tai Nghe Gaming Logitech G335 (White/ Black)', 1590000, 10, 'Đây là Tai Nghe Gaming Logitech G335', 50, 20),
(20, 'Chuột Logitech G502 Hero KDA', 1799000, 10, 'Đây là Chuột Logitech G502 Hero KDA', 51, 30),
(21, 'Bàn Phím Logitech G PRO KDA', 3269000, 10, 'Đây là Bàn Phím Logitech G PRO KDA', 52, 50);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phonenum` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `addr` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `permission` tinyint(1) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `phonenum`, `addr`, `permission`, `username`, `pass`) VALUES
(3, 'User người mua', '012345789', 'Địa chỉ người mua', 1, 'nguoimua', 'nguoimua'),
(7, 'User shop 1', '012345689', 'Địa chỉ Shop 1', 2, 'shop1', 'shop1'),
(8, 'User shop 2', '093029321', 'Địa chỉ shop 2', 2, 'shop2', 'shop2'),
(9, 'User shop 3', '0919329435', 'Địa chỉ Shop 3', 2, 'shop3', 'shop3'),
(10, 'User shop 4', '0930293323', 'Địa chỉ Shop 4', 2, 'shop4', 'shop4'),
(11, 'User shop 5', '0987654321', 'Địa chỉ Shop 5', 2, 'shop5', 'shop5');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buy_product`
--
ALTER TABLE `buy_product`
  ADD PRIMARY KEY (`id_product`,`id_buyer`),
  ADD UNIQUE KEY `id_product` (`id_product`),
  ADD KEY `FK_BP_USER` (`id_buyer`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`stt`,`id_buyer`,`id_product`),
  ADD KEY `id_buyer` (`id_buyer`),
  ADD KEY `id_product` (`id_product`);

--
-- Indexes for table `img`
--
ALTER TABLE `img`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_img_product` (`id_product`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_PRODUCT_USER` (`userid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `stt` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `img`
--
ALTER TABLE `img`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buy_product`
--
ALTER TABLE `buy_product`
  ADD CONSTRAINT `FK_BP_PRODUCT` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `FK_BP_USER` FOREIGN KEY (`id_buyer`) REFERENCES `user` (`id`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`id_buyer`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`);

--
-- Constraints for table `img`
--
ALTER TABLE `img`
  ADD CONSTRAINT `fk_img_product` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK_PRODUCT_USER` FOREIGN KEY (`userid`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
