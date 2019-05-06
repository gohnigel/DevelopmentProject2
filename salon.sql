-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2019 at 09:41 AM
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
('5cb5eb3492151', '2019-05-01', '13:30', 'Staff Member', 'Ignatius@salon.com', 'pending', ''),
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
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` varchar(50) NOT NULL,
  `product_code` varchar(225) NOT NULL,
  `product_name` varchar(225) NOT NULL,
  `product_desc` varchar(225) NOT NULL,
  `price` int(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `total` int(10) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_code`, `product_name`, `product_brand`, `product_desc`, `qty`, `price`) VALUES
(24, 'Q123', 'Shampoo', 'dede', 'cdecdcd', 12, '12.00');

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
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

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
