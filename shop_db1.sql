-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2023 at 02:58 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop_db1`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(255) NOT NULL,
  `user_id` int(20) NOT NULL,
  `pid` int(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` varchar(20) NOT NULL,
  `quantity` varchar(20) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `pid`, `name`, `price`, `quantity`, `image`) VALUES
(25, 1, 2, 'product 2', '200', '1', 'slider2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(255) NOT NULL,
  `user_id` int(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `user_id`, `name`, `email`, `phone`, `message`) VALUES
(2, 1, 'ria', 'riachalke@gmail.com', '8546595845', 'its very nice to see this things'),
(3, 1, 'sam', 'samrana@gmail.com', '855886568', 'its very nice to see this things'),
(4, 1, 'mick', 'micki@gmail.com', '855886568', 'its very nice '),
(7, 1, 'nilya', 'nileshtambekar@gmail.com', '5654546545', 'tfgygyghjjnjhuhlhulhh');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `method` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `total_product` varchar(255) NOT NULL,
  `total_price` varchar(255) NOT NULL,
  `placed_on` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `user_id`, `name`, `phone`, `email`, `method`, `address`, `total_product`, `total_price`, `placed_on`, `payment_status`) VALUES
(2, 1, '', '', 'nikhiltambekar27@gmail.com', 'paytm', 'flate no.SAWARKAR NAGAR THANE 6,,THANE,Maharastra,400606', ',product 2(4),product 1(2)', '1000', 'Thu-Sep-2023', 'complete'),
(3, 9, '', '', 'nikhiltambekar27@gmail.com', 'paypal', 'flate no.SAWARKAR NAGAR THANE 6,,THANE,MAHARASHTRA,400606', ',product 1(1),product 2(1)', '300', 'Thu-Sep-2023', 'complete'),
(4, 1, '', '', 'nikhiltambekar27@gmail.com', 'cash on delivery', 'flate no.SAWARKAR NAGAR THANE 6,,THANE,Maharastra,400606', ',product 2(3),product 1(1)', '700', 'Thu-Sep-2023', ''),
(5, 1, '', '', 'nikhiltambekar27@gmail.com', 'cash on delivery', 'flate no.SAWARKAR NAGAR THANE 6,,THANE,MAHARASHTRA,400606', '', '0', 'Thu-Sep-2023', ''),
(6, 1, '', '', 'nikhiltambekar27@gmail.com', 'cash on delivery', 'flate no.SAWARKAR NAGAR THANE 6,,THANE,MAHARASHTRA,400606', '', '0', 'Thu-Sep-2023', ''),
(7, 1, '', '', '', '', 'flate no.,,,,', '', '0', 'Thu-Sep-2023', ''),
(8, 1, '', '', 'nikhiltambekar27@gmail.com', 'cash on delivery', 'flate no.SAWARKAR NAGAR THANE 6,,THANE,MAHARASHTRA,400606', '', '0', 'Thu-Sep-2023', ''),
(9, 1, '', '', 'nikhil@gmail.com', 'credit card', 'flate no.SAWARKAR NAGAR THANE 6,,THANE,Maharastra,400606', '', '0', 'Thu-Sep-2023', ''),
(10, 1, '', '', 'nileshtambekar@gmail.com', 'paytm', 'flate no.SAWARKAR NAGAR THANE 6,,THANE,Maharastra,400606', ',product 3(1),product 1(1),product 2(1)', '700', 'Thu-Sep-2023', ''),
(11, 1, '', '', 'chirag@gmail.com', 'paytm', 'flate no.SAWARKAR NAGAR THANE 6,,THANE,Maharastra,400606', ',product 2(6)', '1200', 'Thu-Sep-2023', ''),
(12, 1, '', '', 'chirag@gmail.com', 'paytm', 'flate no.SAWARKAR NAGAR THANE 6,,THANE,Maharastra,400606', '', '0', 'Thu-Sep-2023', ''),
(13, 1, '', '', 'nikhiltambekar27@gmail.com', 'cash on delivery', 'flate no.SAWARKAR NAGAR THANE 6,,THANE,MAHARASHTRA,400606', 'product 2(1)', '200', 'Thu-Sep-2023', ''),
(14, 1, '', '', 'nikhiltambekar27@gmail.com', 'cash on delivery', 'flate no.SAWARKAR NAGAR THANE 6,,THANE,MAHARASHTRA,400606', '', '0', 'Thu-Sep-2023', ''),
(15, 1, '', '', 'nikhiltambekar27@gmail.com', 'cash on delivery', 'flate no.SAWARKAR NAGAR THANE 6,,THANE,MAHARASHTRA,400606', '', '0', 'Thu-Sep-2023', ''),
(16, 1, '', '', 'nikhiltambekar27@gmail.com', 'cash on delivery', 'flate no.SAWARKAR NAGAR THANE 6,,THANE,MAHARASHTRA,400606', ',product 2(1)', '200', 'Thu-Sep-2023', ''),
(17, 1, '', '', '', '', 'flate no.,,,,', '', '0', 'Thu-Sep-2023', 'pending'),
(18, 11, '', '', 'ankit@gmail.com', 'paytm', 'flate no.gdfyfgyuftugy,,dryftuyujgh2324354,3545465,fgfhfghg', ',product 2(1),product 1(6)', '800', 'Sat-Sep-2023', '');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `product_detail` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `product_detail`, `image`) VALUES
(1, 'product 1', '100', 'first product of the web site', 'slider4.jpg'),
(2, 'product 2', '200', 'second product of website', 'slider2.jpg'),
(13, 'product 3', '400', 'this is product 3', 'slider1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `user_type`) VALUES
(1, 'nilesh', 'nileshtambekar@gmail.com', 'admin@12', 'user'),
(5, 'nikhil', 'nikhiltambekar27@gmail.com', 'admin', 'user'),
(6, 'nilya', 'nilyatambekar@gmail.com', 'admin', 'admin'),
(7, 'chirag', 'chiragmokal@gmail.com', '123456', 'user'),
(8, 'abhi', 'abhi@gmail.com', 'abhi', 'user'),
(9, 'namdev', 'namdev@gmail.com', '12', 'user'),
(10, 'amisha', 'amisha@gmail.com', 'amisha', 'user'),
(11, 'ankit', 'ankit@gmail.com', '1233@', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `pid` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
