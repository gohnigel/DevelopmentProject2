-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2019 at 11:18 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `salon`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bookingid` varchar(225) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(20) NOT NULL,
  `full_name` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `status` varchar(225) NOT NULL,
  `notes` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bookingid`, `date`, `time`, `full_name`, `email`, `status`, `notes`) VALUES
('5ca9db90d5ddd', '2019-05-10', '14:06', 'Staff Member', 'isal@salon.com', 'Canceled', ''),
('5cb5eaae3281e', '2019-05-25', '14:00', 'Staff Member', 'nigel@salon.com', 'Completed', 'Used a salon package but didnt use the conditioner included'),
('5cb5eabc11665', '2019-05-25', '14:00', 'Staff Member', 'nigel@salon.com', 'Confirmed', ''),
('5cb5eacd3e410', '2019-05-12', '17:00', 'Staff Member', 'nigel@salon.com', 'Canceled', ''),
('5cb5eade733f5', '2019-05-05', '12:00', 'Staff Member', 'nigel@salon.com', 'Confirmed', ''),
('5cb5eb3492151', '2019-05-01', '13:30', 'Staff Member', 'Ignatius@salon.com', 'Confirmed', ''),
('5cb5eb447723d', '2019-04-10', '18:30', 'Staff Member', 'Ignatius@salon.com', 'pending', ''),
('5cb5eb51dc323', '2019-05-19', '17:30', 'Staff Member', 'Ignatius@salon.com', 'Confirmed', ''),
('5cb5eb773e65d', '2019-05-18', '18:30', 'Staff Member', 'Ignatius@salon.com', 'Confirmed', ''),
('5cb5ebba197a4', '2019-05-12', '16:30', 'Staff Member', 'isal@salon.com', 'pending', ''),
('5cb5ebcaf0520', '2019-05-17', '15:30', 'Staff Member', 'isal@salon.com', 'Completed', 'No Notes Added'),
('5cb5ebd98ead7', '2019-05-02', '18:30', 'Staff Member', 'isal@salon.com', 'pending', ''),
('5ccd30475a486', '0000-00-00', '01:00', 'Staff Member', 'isal@salon.com', 'pending', ''),
('5ccd308f89282', '2019-05-27', '17:06', 'Staff Member', 'isal@salon.com', 'Canceled', '');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `message` varchar(225) NOT NULL,
  `status` varchar(10) NOT NULL,
  `user` varchar(225) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `type` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_desc` varchar(225) NOT NULL,
  `item_code` varchar(225) NOT NULL,
  `total` int(10) NOT NULL,
  `qty` int(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(225) NOT NULL,
  `customer` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_desc`, `item_code`, `total`, `qty`, `date`, `status`, `customer`) VALUES
(5, 'Shampoo', 'Hair7890', 60, 50, '2019-05-08 14:47:34', 'Preparing Your Order', 'isal@salon.com'),
(6, 'Hair Wax', 'Styling9872', 13, 50, '2019-05-08 14:47:35', 'Preparing Your Order', 'isal@salon.com'),
(7, 'Hair Mousse', 'Styling9874', 19, 25, '2019-05-08 14:47:41', 'Preparing Your Order', 'isal@salon.com'),
(8, 'Conditioner', 'Hair7898', 126, 25, '2019-05-08 14:47:51', 'Preparing Your Order', 'isal@salon.com'),
(9, 'Hair Wax', 'Styling9872', 13, 49, '2019-05-11 07:04:08', 'Preparing Your Order', 'isal@salon.com'),
(10, 'Hair Wax', 'Styling9872', 13, 48, '2019-05-11 07:06:05', 'Preparing Your Order', 'isal@salon.com'),
(11, 'Hair Wax', 'Styling9872', 13, 47, '2019-05-11 07:08:46', 'Preparing Your Order', 'isal@salon.com'),
(12, 'Hair Wax', 'Styling9872', 13, 46, '2019-05-11 07:09:55', 'Preparing Your Order', 'isal@salon.com'),
(13, 'Hair Wax', 'Styling9872', 13, 45, '2019-05-11 07:09:55', 'Preparing Your Order', 'isal@salon.com'),
(14, 'Hair Wax', 'Styling9872', 13, 44, '2019-05-11 07:09:55', 'Preparing Your Order', 'isal@salon.com'),
(15, 'Hair Wax', 'Styling9872', 13, 43, '2019-05-11 07:09:55', 'Preparing Your Order', 'isal@salon.com');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_code` varchar(60) NOT NULL,
  `product_name` varchar(60) NOT NULL,
  `product_brand` varchar(255) NOT NULL,
  `product_desc` tinytext NOT NULL,
  `qty` int(5) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_code`, `product_name`, `product_brand`, `product_desc`, `qty`, `price`, `image`) VALUES
(26, 'Styling9872', 'Hair Wax', 'Bad Labs', 'Hair Wax For Men ', 42, '13.00', ''),
(27, 'Styling9873', 'Hair Gel', 'Garnier', 'Hair Gel For men 300ml', 15, '7.00', ''),
(28, 'Hair7890', 'Shampoo', 'Sunsilk', 'Shampoo (SunSilk) 500ML', 47, '20.00', ''),
(29, 'Hair7898', 'Conditioner', 'Sunsilk', 'Sun Silk Conditioner 330 ML', 18, '18.00', ''),
(30, 'Styling9874', 'Hair Mousse', 'HERBIVORE BOTANICALS', 'Hair Mousse 8 oz/240 ml', 24, '19.00', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `email` varchar(225) NOT NULL,
  `full_name` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `phone` int(10) NOT NULL,
  `role` varchar(50) NOT NULL,
  `image` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`email`, `full_name`, `password`, `phone`, `role`, `image`) VALUES
('Ignatius@salon.com', 'Ignatius Ting Moi Ing ', '1234', 11111111, 'client', ''),
('isal@salon.com', 'Isal Korale', '1234', 12345678, 'client', 0x696d616765732f70726f66696c652e706e67),
('nigel@salon.com', 'Nigel Goh Tze Fei', '1234', 1111111, 'client', ''),
('staff@salon.com', 'Staff Member', '1234', 1111111, 'admin', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bookingid`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_code` (`product_code`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`email`) REFERENCES `users` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
