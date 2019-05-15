-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2019 at 07:49 PM
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
('5cdc19444851d', '2019-05-31', '17:30', 'Jessica ', 'isal@salon.com', 'Resheduled', ''),
('5cdc196ad7aa7', '2019-05-28', '13:30', 'James Cliff', 'isal@salon.com', 'Canceled', ''),
('5cdc19dd5e3d0', '2019-05-27', '18:30', 'Henry Feng', 'isal@salon.com', 'Completed', 'Used a salon package but didnt use the conditioner included'),
('5cdc3e33d4922', '2019-05-19', '14:05', 'Henry Feng', 'isal@salon.com', 'Confirmed', ''),
('5cdc3e4c22aed', '2019-05-29', '13:30', 'James Cliff', 'isal@salon.com', 'pending', ''),
('5cdc5032404cc', '2019-05-30', '14:06', 'Henry Feng', 'user1@salon.com', 'Canceled', ''),
('5cdc504942a47', '2019-05-30', '15:03', 'James Cliff', 'user1@salon.com', 'Confirmed', '');

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

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `message`, `status`, `user`, `date`, `type`) VALUES
(1, 'Your Recent Appointment has been Confirmed', 'unread', 'isal@salon.com', '2019-05-15 13:54:14', 'update'),
(2, 'Your Receive A New Order', 'unread', 'staff@salon.com', '2019-05-15 16:23:32', 'cart'),
(3, 'Your Receive A New Order', 'unread', 'staff@salon.com', '2019-05-15 16:30:40', 'cart'),
(4, 'Your Receive A New Order', 'unread', 'staff@salon.com', '2019-05-15 17:44:59', 'cart'),
(5, 'Your Receive A New Order', 'unread', 'staff@salon.com', '2019-05-15 17:44:59', 'cart'),
(6, 'Your Recent Appointment has been Confirmed', 'unread', 'isal@salon.com', '2019-05-15 17:46:24', 'update'),
(7, 'Your Recent Appointment has been Cancelled, Please Contact us for more information', 'unread', 'user1@salon.com', '2019-05-15 17:46:25', 'update'),
(8, 'Your Recent Appointment has been Confirmed', 'unread', 'user1@salon.com', '2019-05-15 17:46:26', 'update');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_ref` varchar(225) NOT NULL,
  `order_desc` varchar(225) NOT NULL,
  `item_code` varchar(225) NOT NULL,
  `total` int(10) NOT NULL,
  `qty` int(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(225) NOT NULL,
  `customer` varchar(225) NOT NULL,
  `shipping_add` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_ref`, `order_desc`, `item_code`, `total`, `qty`, `date`, `status`, `customer`, `shipping_add`) VALUES
(26, 'Order5cdc3d0466bed', 'Hair Wax', 'Styling9873', 42, 50, '2019-05-15 16:23:32', 'Preparing Your Order', 'isal@salon.com', 'USS, JALAN SIMPANG TIGA,KUCHING , SARAWAK 93350'),
(27, 'Order5cdc3eb053413', 'Pomade', 'Styling9877', 270, 20, '2019-05-15 16:30:40', 'Preparing Your Order', 'isal@salon.com', 'USS, JALAN SIMPANG TIGA,KUCHING , SARAWAK 93350'),
(28, 'Order5cdc501b50269', 'Hair Spray', 'Styling9800', 54, 50, '2019-05-15 17:44:59', 'Preparing Your Order', 'user1@salon.com', 'A801 JAZZ SUITES, JALAN WAN ALWI, KUCHING 93350'),
(29, 'Order5cdc501b50269', 'Pomade', 'Styling9874', 30, 15, '2019-05-15 17:44:59', 'Preparing Your Order', 'user1@salon.com', 'A801 JAZZ SUITES, JALAN WAN ALWI, KUCHING 93350');

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
(31, 'Styling9872', 'Shampoo', 'Bad Labs', 'Caveman Cleaner 3-in-1 Hair Face Body Shampoo 400ml', 50, '13.00', 'badlabs.jpg'),
(32, 'Styling9873', 'Hair Wax', 'Bad Labs', 'Lock & Load Solid Texture Hair Wax 70g', 47, '14.00', 'badlab1.JPG'),
(34, 'Styling9877', 'Pomade', 'GATSBY', 'Dressing Pomade Classic Tight Classic Look 80g', 11, '30.00', 'pomade.JPG'),
(40, 'Styling9874', 'Pomade', 'Gatsby Dressing ', 'Gatsby Dressing Pomade Ultimate Lock 80G', 10, '6.00', 'gatbsy.JPG'),
(42, 'Styling9800', 'Hair Spray', 'GATSBY', 'Gatsby Set&Keep Super Hard', 47, '18.00', 'spray.JPG');

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
  `cust_add` varchar(225) NOT NULL,
  `image` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`email`, `full_name`, `password`, `phone`, `role`, `cust_add`, `image`) VALUES
('isal@salon.com', 'Isal Korale', '1234', 111111111, 'client', 'USS, JALAN SIMPANG TIGA,KUCHING , SARAWAK 93350', 0x555345522e706e67),
('staff1@salon.com', 'James Cliff', '1234', 771711556, 'admin', '', ''),
('staff2@salon.com', 'Henry Feng', '1234', 1111111, 'admin', '', ''),
('staff3@salon.com', 'Jessica ', '1234', 771711556, 'admin', '', ''),
('user1@salon.com', 'Jamie', '1234', 1155546565, 'client', 'A801 JAZZ SUITES, JALAN WAN ALWI, KUCHING 93350', 0x555345522e706e67);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

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
