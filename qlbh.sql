-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2021 at 12:59 PM
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

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`stt`, `id_buyer`, `id_product`, `quantity`, `price`) VALUES
(6, 3, 3, 2, 10000),
(8, 3, 3, 5, 10000);

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
(5, '230982.jpg', 3),
(6, 'ab2.jpg', 3),
(7, 'img1.jpg', 4),
(8, 'img2.jpg', 5),
(9, 'img3.jpg', 5),
(10, 'img31.jpg', 6),
(11, 'img4.jpg', 6),
(13, 'img32.jpg', 4);

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
(3, 'Sản phẩm test', 10000, 7, 'Đây là sản phẩm test', 6, 3),
(4, 'Sản phẩm test2', 10000, 7, 'Đây là sản phẩm test2', 13, 0),
(5, 'Sản phẩm test3', 10000, 7, 'Đây là sản phẩm test3', 9, 0),
(6, 'Sản phẩm test4', 90000, 7, 'Đây là sản phẩm test4', 11, 0);

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
(7, 'User người bán', '012345689', 'Địa chỉ người bán', 2, 'nguoiban', 'nguoiban');

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
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
