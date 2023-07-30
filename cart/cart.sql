-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2022 at 04:54 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cart`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `name` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`name`, `password`) VALUES
('prashanth', 'hi\r\n'),
('admin', 'admin'),
('vicky', '12'),
('vicky', '12');

-- --------------------------------------------------------

--
-- Table structure for table `index_table`
--

CREATE TABLE `index_table` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `index_table`
--

INSERT INTO `index_table` (`id`, `product_name`, `product_image`) VALUES
(5, 'Clothings', 'https://i.pinimg.com/474x/d2/5e/1c/d25e1cb0454d5bf7e36353d70ca3a425--messages-sweatshirts.jpg'),
(6, 'Mobiles', 'https://www.pricenow.com.pk/templates/yootheme/cache/apple_iPhone12-7ca37201.webp'),
(7, 'Laptops', 'https://www.xda-developers.com/files/2021/04/Best-HP-laptops.jpg'),
(8, 'Headphones', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRHwCypSpUyvU3GmjemFelwJ5xOjg04nmj93A&usqp=CAU');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp(),
  `user_name` varchar(25) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `time`, `user_name`, `product_name`, `qty`) VALUES
(1, '2022-07-30 10:59:14', 'prashanth', 'Skullcandy earbuds', 3),
(2, '2022-08-02 20:40:33', 'prashanth', 'Adidas T-shirt', 1),
(4, '2022-08-02 21:47:06', 'hello', 'iPhone 12 Pro Max', 1),
(9, '2022-08-02 23:25:10', 'hello', 'Skullcandy earbuds', 2);

-- --------------------------------------------------------

--
-- Table structure for table `product_table`
--

CREATE TABLE `product_table` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_image` varchar(255) DEFAULT NULL,
  `product_price` int(11) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_table`
--

INSERT INTO `product_table` (`id`, `product_name`, `product_image`, `product_price`, `category`) VALUES
(17, 'Adidas T-shirt', 'https://m.media-amazon.com/images/I/71t+ZJ+WB-L._UY879_.jpg', 1499, 'Clothings'),
(19, 'Samsung Galaxy S22', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSigAAnczA2k00k0eoGRpGYn-p56l8_f_-lcA&usqp=CAU', 109999, 'Mobiles'),
(20, 'JBL Tune 500BT', 'https://m.media-amazon.com/images/I/61TEw1TsqTS._SX522_.jpg', 2939, 'Headphones'),
(21, 'iPhone 13 Pro Max', 'https://cdn.dxomark.com/wp-content/uploads/medias/post-95593/Apple-iPhone-13-Pro-Max-featured-image-packshot-review.jpg', 115900, 'Mobiles'),
(22, 'MacBook pro', 'https://www.apple.com/v/macbook-pro-14-and-16/b/images/overview/hero/intro__ewz1ro7xs14y_large.jpg', 115590, 'Laptops');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `user_name` varchar(25) NOT NULL,
  `number` bigint(20) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `user_name`, `number`, `password`) VALUES
(9, 'prashanth', 9943893210, '49f68a5c8493ec2c0bf489821c21fc3b'),
(13, 'Admin', 9876543210, '202cb962ac59075b964b07152d234b70'),
(14, 'shaswath', 9876543210, '202cb962ac59075b964b07152d234b70'),
(16, 'hello', 7894561230, '49f68a5c8493ec2c0bf489821c21fc3b'),
(19, 'user', 9876543210, '5d41402abc4b2a76b9719d911017c592'),
(20, 'joe', 7, '49f68a5c8493ec2c0bf489821c21fc3b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `index_table`
--
ALTER TABLE `index_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_table`
--
ALTER TABLE `product_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `index_table`
--
ALTER TABLE `index_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `product_table`
--
ALTER TABLE `product_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
