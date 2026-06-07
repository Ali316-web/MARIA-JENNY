-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2026 at 06:52 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `m&j store`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_to_cart`
--

CREATE TABLE `add_to_cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `pro_id` int(11) DEFAULT NULL,
  `pro_qty` int(11) DEFAULT NULL,
  `pro_price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `add_to_cart`
--

INSERT INTO `add_to_cart` (`cart_id`, `user_id`, `pro_id`, `pro_qty`, `pro_price`) VALUES
(23, 6, 70, 1, 11000),
(24, 6, 71, 2, 7000),
(25, 10, 70, 1, 11000),
(26, 10, 30, 1, 0),
(36, 6, 72, 1, 5000);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) DEFAULT NULL,
  `cat_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_image`) VALUES
(4, 'Jewllery', 'necklace.jfif'),
(5, 'Cosmetics', 'cosmetic.jfif');

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `checkout_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `work_phone` varchar(50) DEFAULT NULL,
  `cell_no` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `order_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`checkout_id`, `user_id`, `name`, `address`, `email`, `work_phone`, `cell_no`, `dob`, `category`, `remarks`, `order_id`, `created_at`) VALUES
(1, 6, 'zaid', 'c55 karachi', 'mutahirali115@gmail.com', '000888555333', '000888555333', '2026-01-18', 'Cosmetics', 'good', 1, '2026-01-18 17:50:07'),
(2, 11, 'muhib', 'malir', 'muhib@gmail.com', '000888555333', '000888555333', '2020-01-14', 'Cosmetics', 'good', 2, '2026-01-19 05:42:47');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(50) DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `total_amount`, `order_date`, `status`) VALUES
(1, 6, 5000, '2026-01-18 17:50:07', 'finished'),
(2, 11, 30000, '2026-01-19 05:42:47', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price_at_purchase` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`item_id`, `order_id`, `product_id`, `quantity`, `price_at_purchase`) VALUES
(1, 1, 72, 1, 5000),
(2, 2, 7, 2, 10000),
(3, 2, 25, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_quality` varchar(255) NOT NULL,
  `product_quantity` varchar(255) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `product_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_price`, `product_description`, `product_quality`, `product_quantity`, `subcategory_id`, `product_image`) VALUES
(1, 'GOLD RING', 2500, 'PREMIUM GOLD RING', 'GREAT', '100', 2, 'gold ring.jfif'),
(2, 'GOLD RING 2', 2500, 'PREMIUM GOLD RING', 'GREAT', '100', 2, 'gold ring 2.jfif'),
(3, 'Diamond Necklace', 3500, 'PREMIUM DIAMOND NECKLACE', 'GREAT', '100', 1, 'diamond necklace.jfif'),
(4, 'Diamond Ring', 5000, 'Premium Ring', 'Great ', '100', 1, 'Jewelry _ Amazon_com.jpg'),
(5, 'Diamond Ring 2', 4000, 'Premium Ring', 'Great ', '100', 1, 'The Adelina Rae 5CT Emerald Cut Moissanite Ring - 14K Solid Gold _ US_ 8 _ UK_AU_ P _ EU_ 57.jpg'),
(6, 'Diamond Necklace', 9000, 'Premium Necklace', 'Great ', '100', 1, 'Crystal Necklace, Pearl Drop Necklace, Crystal Bridal Necklace, Wedding Necklace, DENISE - Etsy.jpg'),
(7, 'Diamond Necklace 2', 10000, 'Premium Necklace', 'Great ', '100', 1, 'diamond necklace (2).jfif'),
(8, 'Silver Ring', 3000, 'Premium Ring', 'Great ', '100', 6, '925 Sterling Silver Moissanite Solitaire Ring - Silver _ 6.jpg'),
(9, 'Silver Ring 2', 5000, 'Premium Ring', 'Great ', '100', 6, 'Minimalist 925 Sterling Silver Ring - Women _ 6.jpg'),
(10, 'Silver Necklace', 5000, 'Premium Necklace', 'Great ', '100', 6, 'silver necklace.jfif'),
(11, 'Silver Necklace 2', 5000, 'Premium Necklace', 'Great ', '100', 6, 'Colar de corrente Minimalista.jpg'),
(12, 'Lipstick 1', 2000, 'Premium lipstick', 'Great ', '100', 7, 'One of These Red Lipsticks Is Sold Somewhere in the World Every 8 Seconds.jpg'),
(14, 'Lipstick 2', 2000, 'Premium lipstick', 'Great ', '100', 7, 'Mac Retro Matte Lipstick in “Flat Out Fabulous”.jpg'),
(15, 'Lipstick 3', 2000, 'Premium lipstick', 'Great ', '100', 7, 'download.jpg'),
(16, 'Lipstick 4', 2000, 'Premium lipstick', 'Great ', '100', 7, 'tannermmann on LTK.jpg'),
(17, 'Lipstick 5', 2000, 'Premium lipstick', 'Great ', '100', 7, 'Makeup Png.jpg'),
(18, 'Lipstick 6', 2000, 'Premium lipstick', 'Great ', '100', 7, 'download (2).jpg'),
(19, 'Lipstick 7', 2000, 'Premium lipstick', 'Great ', '100', 7, 'Los 10 labiales mate MÁS VENDIDOS de MAC (1).jpg'),
(20, 'Lipstick 8', 2000, 'Premium lipstick', 'Great ', '100', 7, 'You’re Missing Out If You Haven’t Tried These Best-Selling MAC Cream Lipsticks.jpg'),
(21, 'Perfume 1', 3000, 'Premium Perfume', 'Great', '100', 8, 'Perfume 1.jpg'),
(22, 'Perfume 2', 3000, 'Premium Perfume', 'Great ', '100', 8, 'Perfume 2.jpg'),
(23, 'Perfume 3', 3000, 'Premium Perfume', 'Great ', '100', 8, 'Perfume 3.jpg'),
(24, 'Perfume 4', 4000, 'Premium Perfume', 'Great', '100', 8, 'Perfume 4.jpg'),
(25, 'Perfume 5', 5000, 'Premium Perfume', 'Great ', '100', 8, 'Perfume 5.jpg'),
(26, 'Perfume 6', 4000, 'Premium Perfume', 'Great ', '100', 8, 'Perfume 6.jpg'),
(27, 'Perfume 7', 4000, 'Premium Perfume', 'Great ', '100', 8, 'Perfume 7.jpg'),
(28, 'Foundation 1', 5000, 'Premium Foundation ', 'Great', '100', 7, 'Foundation 1.jpg'),
(29, 'Foundation 2', 10000, 'Premium Foundation ', 'Great', '100', 7, 'Foundation 2.jfif'),
(30, 'Foundation 3', 8000, 'Premium Foundation ', 'Great', '100', 7, 'Foundation 3.jpg'),
(31, 'Foundation 4', 5000, 'Premium Foundation ', 'Great ', '100', 7, 'Foundation 4.jfif'),
(32, 'Foundation 5', 5000, 'Premium Foundation ', 'Great', '100', 7, 'Foundation 5.jpg'),
(33, 'Foundation 6', 7000, 'Premium Foundation ', 'Great', '100', 7, 'Foundation 6.jpg'),
(34, 'Foundation 7', 4000, 'Premium Foundation ', 'Great', '100', 7, 'Foundation 7.jpg'),
(35, 'Foundation 8', 12000, 'Premium Foundation ', 'Great ', '100', 7, 'Foundation 8.jpg'),
(36, 'Foundation 9', 5000, 'Premium Foundation ', 'Great', '100', 7, 'Foundation 9.jpg'),
(37, 'Foundation 10', 6000, 'Premium Foundation ', 'Great ', '100', 7, 'Foundation 10.jpg'),
(38, 'Skincare 1', 2000, 'Premium Skincare', 'Great ', '100', 10, 'Skincare 1.jpg'),
(39, 'Skincare 2', 2000, 'Premium Skincare', 'Great', '100', 10, 'Skincare 2.jpg'),
(40, 'Skincare 3', 2000, 'Premium Skincare', 'Great ', '100', 10, 'Skincare 3.jpg'),
(41, 'Skincare 4', 2000, 'Premium Skincare', 'Great', '100', 10, 'Skincare 4.jpg'),
(42, 'Skincare 5', 3000, 'Premium Skincare', 'Great', '100', 10, 'Skincare 5.jpg'),
(43, 'Skincare 6 ', 4000, 'Premium Skincare', 'Great', '100', 10, 'Skincare 6.jpg'),
(44, 'Skincare 7', 4000, 'Premium Skincare', 'Great ', '100', 10, 'Skincare 7.jpg'),
(45, 'Skincare 8', 3000, 'Premium Skincare', 'Great', '100', 10, 'Skincare 8.jpg'),
(46, 'Skincare 9', 4000, 'Premium Skincare', 'Great ', '100', 10, 'Skincare 9.jpg'),
(47, 'Skincare 10', 4000, 'Premium Skincare', 'Great ', '100', 10, 'Skincare 10.jpg'),
(48, 'Skincare 11', 5000, 'Premium Skincare', 'Great ', '100', 10, 'Skincare 11.jpg'),
(49, 'Skincare 12', 7000, 'Premium Skincare', 'Great', '100', 10, 'Skincare 12.jpg'),
(50, 'Skincare 13', 5000, 'Premium Skincare', 'Great ', '100', 10, 'Skincare 13.jpg'),
(51, 'Skincare 14', 5000, 'Premium Skincare', 'Great ', '100', 10, 'Skincare 14.jpg'),
(52, 'Skincare 15', 4000, 'Premium Skincare', 'Great ', '100', 10, 'Skincare 15.jpg'),
(53, 'Skincare 16', 4000, 'Premium Skincare', 'Great ', '100', 10, 'Skincare 16.jpg'),
(54, 'Skincare 17', 5000, 'Premium Skincare', 'Great ', '100', 10, 'Skincare 17.jpg'),
(55, 'Skincare 18', 5000, 'Premium Skincare', 'Great', '100', 10, 'Skincare 18.jpg'),
(56, 'Skincare 19', 5000, 'Premium Skincare', 'Great ', '100', 10, 'Skincare 19.jpg'),
(57, 'Skincare 20', 3000, 'Premium Skincare', 'Great', '100', 10, 'Skincare 20.jpg'),
(58, 'Skincare 21', 3000, 'Premium Skincare', 'Great', '100', 10, 'Skincare 21.jpg'),
(59, 'Skincare 22', 3000, 'Premium Skincare', 'Great ', '100', 10, 'Skincare 22.jpg'),
(60, 'Skincare 23', 4000, 'Premium Skincare', 'Great ', '100', 10, 'Skincare 23.jpg'),
(61, 'Skincare 24', 6000, 'Premium Skincare', 'Great ', '100', 10, 'Skincare 24.jpg'),
(62, 'Skincare 25', 12000, 'Premium Skincare', 'Great ', '100', 10, 'Skincare 25.jpg'),
(63, 'Skincare 26', 10000, 'Premium Skincare', 'Great ', '100', 10, 'Skincare 26.jpg'),
(64, 'Foundation 11', 15000, 'Premium Foundation ', 'Great ', '100', 7, 'Foundation 11.jpg'),
(65, 'Foundation 12', 8000, 'Premium Foundation ', 'Great ', '100', 7, 'Foundation 12.jpg'),
(66, 'Foundation 13', 3000, 'Premium Foundation ', 'Great ', '100', 7, 'Foundation 13.jpg'),
(67, 'Foundation 14', 8000, 'Premium Foundation ', 'Great ', '100', 7, 'Foundation 14.jpg'),
(68, 'Foundation 15', 5000, 'Premium Foundation ', 'Great ', '100', 7, 'Foundation 15.jpg'),
(69, 'Foundation 16', 4000, 'Premium Foundation ', 'Great ', '100', 7, 'Foundation 16.jpg'),
(70, 'Foundation 17', 11000, 'Premium Foundation ', 'Great ', '100', 10, 'Foundation 17.jpg'),
(71, 'Foundation 18 ', 7000, 'Premium Foundation ', 'Great ', '100', 7, 'Foundation 18.jpg'),
(72, 'Foundation 19', 5000, 'Premium Foundation ', 'Great ', '100', 7, 'Foundation 19.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `PASSWORD` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `name`, `email`, `PASSWORD`, `role`) VALUES
(5, 'MUTAHIR ALI', 'mutahirali115@gmail.com', '12345', 'admin'),
(6, 'zaid', 'zaid@gmail.com', '123', 'user'),
(8, 'Fasahat', 'fasahat@gmail.com', '12345    ', 'user'),
(9, 'ali', 'ali@gmail.com', '123456', 'user'),
(10, 'AFFAN KHAN', 'affan@gmail.com', '123456', 'user'),
(11, 'muhib', 'muhib@gmail.com', '123456', 'user'),
(12, 'AFFAN KHAN', 'imaffankhan1@gmail.com', '123456', 'user'),
(13, 'syed', 'safdarnaqvi137@gmail.com', '123456', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `subcat_id` int(11) NOT NULL,
  `subcat_name` varchar(255) NOT NULL,
  `subcat_image` text DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`subcat_id`, `subcat_name`, `subcat_image`, `category_id`) VALUES
(1, 'Diamond', 'diamond necklace.jfif', 4),
(2, 'Gold', 'gold necklace.jfif', 4),
(6, 'Silver', 'silver necklace.jfif', 4),
(7, 'Make up', 'Makeup front.jpg', 5),
(8, 'Perfumes', 'Perfume front.jpg', 5),
(10, 'Skin Care', 'Skincare.front.jpg', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_to_cart`
--
ALTER TABLE `add_to_cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `pro_id` (`pro_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`checkout_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `subcategory_id` (`subcategory_id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`subcat_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_to_cart`
--
ALTER TABLE `add_to_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `checkout_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `subcat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `add_to_cart`
--
ALTER TABLE `add_to_cart`
  ADD CONSTRAINT `add_to_cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `register` (`id`),
  ADD CONSTRAINT `add_to_cart_ibfk_2` FOREIGN KEY (`pro_id`) REFERENCES `product` (`product_id`);

--
-- Constraints for table `checkout`
--
ALTER TABLE `checkout`
  ADD CONSTRAINT `checkout_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `register` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `register` (`id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`subcategory_id`) REFERENCES `sub_category` (`subcat_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
