-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2019 at 10:10 AM
-- Server version: 10.1.36-MariaDB
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
-- Database: `customer_orders`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) UNSIGNED NOT NULL,
  `first_name` varchar(25) DEFAULT NULL,
  `last_name` varchar(25) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address1` varchar(30) DEFAULT NULL,
  `address2` varchar(30) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `postal_code` varchar(15) DEFAULT NULL,
  `country` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `first_name`, `last_name`, `email`, `phone`, `address1`, `address2`, `city`, `state`, `postal_code`, `country`) VALUES
(1, 'John', 'D', 'johnd@gmail.com', '1111111', 'Line 1 Street name', 'Addr Line 2', 'Auckland', NULL, '1010', 'New Zealand'),
(2, 'Anne', 'S', 'anne@test123.com', '22222222', '345 Commerce Street', 'Addr Line 2', 'Auckland', NULL, '1010', 'New Zealand'),
(3, 'Jane', 'G', 'gjane@somedom.com', '455666666', '34 Glengarry Road', 'Addr Line 2', 'Glen Eden', NULL, '0000', 'New Zealand'),
(4, 'Joe', 'B', 'bj001@test55.com', '4645645', '34 Harbour Green', 'Addr Line 2', 'Cincinnati', 'Ohio', '346754', 'USA'),
(5, 'Neem', 'De', 'dennem@ttdom.com', '56367744334', '456 ', 'Some Str', 'Mount Eden', ' ', ' ', 'New Zealand'),
(6, 'Shay', 'Nuruk', 'Nuruks@testdom345.com', '1234567890', '123', 'Port Str', 'Auckland', '', '1010', 'New Zealand'),
(7, 'Neeha', 'B', 'hnee@ttdom54.com', '5663434333', '63', 'West Str', 'New Glen', '', '1012', 'New Zealand'),
(11, 'Test first', 'Last', 'test@ttdom.com', '', '3', '', '', '', '', ''),
(12, 'Shyannn', 'Nutruik', 'Nutruik@test123dom.com', '1234567890', '123', 'Some Street', 'Auckland', '', '1010', 'New Zealand'),
(14, 'Testfirst', 'Last', 'test@testdom.com', '476544443', '3', 'SomeStr', 'SomeCity', 'SomeState', '1111', 'SomeCtry');

-- --------------------------------------------------------

--
-- Table structure for table `customer_order`
--

CREATE TABLE `customer_order` (
  `id` int(11) UNSIGNED NOT NULL,
  `customer_id` int(11) UNSIGNED DEFAULT NULL,
  `item_id` int(11) UNSIGNED DEFAULT NULL,
  `order_quantity` decimal(7,0) DEFAULT NULL,
  `order_date` date DEFAULT NULL,
  `delivery_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_order`
--

INSERT INTO `customer_order` (`id`, `customer_id`, `item_id`, `order_quantity`, `order_date`, `delivery_date`) VALUES
(1, 1, 3, '2', '2019-02-01', '2019-02-13'),
(2, 2, 1, '1', '2019-02-02', '2019-02-20'),
(3, 1, 2, '3', '2019-02-01', '2019-02-20'),
(4, 1, 4, '3', '2019-02-01', '2019-02-14'),
(10, 3, 2, '3', '2019-02-12', '2019-02-20'),
(11, 4, 4, '5', '2019-02-07', '2019-02-21');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(11) UNSIGNED NOT NULL,
  `item_code` varchar(10) DEFAULT NULL,
  `item_name` varchar(30) DEFAULT NULL,
  `item_description` varchar(100) DEFAULT NULL,
  `item_quantity` decimal(11,2) DEFAULT NULL,
  `reorder_level` decimal(7,2) DEFAULT NULL,
  `reorder_quantity` decimal(9,2) DEFAULT NULL,
  `unit_price` decimal(7,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `item_code`, `item_name`, `item_description`, `item_quantity`, `reorder_level`, `reorder_quantity`, `unit_price`) VALUES
(1, '1011A', 'Apple Mac', 'Mac OSx', '150.00', '50.00', '200.00', '999.99'),
(2, '2011P', 'Printer 1010', 'Inc Jet Printer', '200.00', '150.00', '250.00', '50.00'),
(3, 'M3001', 'Mouse', 'Bluetooth Mouse', '275.00', '175.00', '200.00', '10.00'),
(4, 'MP001', 'Mouse Pad', 'Colorful Mouse pad with arm rest', '80.00', '70.00', '100.00', '2.50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_order`
--
ALTER TABLE `customer_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `customer_order`
--
ALTER TABLE `customer_order`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
