-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2023 at 06:44 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laundrybasket`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_registration`
--

CREATE TABLE `admin_registration` (
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone_no` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_registration`
--

INSERT INTO `admin_registration` (`user_name`, `email`, `password`, `phone_no`) VALUES
('Nikhild0399', 'nikhild0399@gmail.com', '121715', '7477230781');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customerfeedback`
--

CREATE TABLE `customerfeedback` (
  `user_name` varchar(255) NOT NULL,
  `pid` int(255) NOT NULL,
  `laundry_name` varchar(255) NOT NULL,
  `ratings` enum('Positive','Negative') NOT NULL,
  `comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customerfeedback`
--

INSERT INTO `customerfeedback` (`user_name`, `pid`, `laundry_name`, `ratings`, `comment`) VALUES
('Nikhild0399', 32, 'KamalLaundry', 'Positive', 'good service');

-- --------------------------------------------------------

--
-- Table structure for table `customer_registration`
--

CREATE TABLE `customer_registration` (
  `user_id` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(15) NOT NULL,
  `phone_no` bigint(10) NOT NULL,
  `street` varchar(255) NOT NULL,
  `landmark` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_registration`
--

INSERT INTO `customer_registration` (`user_id`, `user_name`, `email`, `password`, `phone_no`, `street`, `landmark`, `city`, `state`) VALUES
('Nikhild0399@7477230781', 'Nikhild0399', 'nikhild0399@gmail.com', '071215', 7477230781, 'no 2', 'vallabh nagar', 'Indore', 'Madhya Pradesh'),
('Pranjal31@9981022476', 'Pranjal31', 'pranjalsavlarock31@gmail.com', 'Pranjal_5555', 9981022476, 'sgsits campus', 'sarojini naidu', 'indore', 'Madhya Pradesh'),
('UsvatZehra@7222979980', 'UsvatZehra', 'usvat456@gmail.com', 'Usvat@456', 7222979980, 'yeshwant Road', 'Golden Gate SGSITS college', 'Indore', 'Madhya Pradesh');

-- --------------------------------------------------------

--
-- Table structure for table `owner_registration`
--

CREATE TABLE `owner_registration` (
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `laundry_name` varchar(255) NOT NULL,
  `laundry_id` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `phone_no` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `owner_registration`
--

INSERT INTO `owner_registration` (`user_name`, `email`, `user_id`, `password`, `laundry_name`, `laundry_id`, `location`, `phone_no`) VALUES
('KamalSingh', 'kamallaundry67@gmail.com', 'KamalSingh@6269231504', 'Kamal@34567', 'KamalLaundry', 'KamalLaundry@6269231504', 'Malwa Mill Indore', 6269231504),
('PraveenKumar', 'modernlaundry00@gmail.com', 'PraveenKumar@8989408113', 'Praveen343434', 'Modern Laundry Dyers & Drycleaners', 'Modern Laundry Dyers & Drycleaners@8989408113', 'Shop No.10, Geeta Bhawan Complex, Near Geeta Bhawan Mandir, Indore', 8989408113),
('SyamaDevi', 'rainbowdry@gmail.com', 'SyamaDevi@7898361001', 'Rainbow_Dry*00', 'Rainbow Dry & Dry Cleaning', 'Rainbow Dry & Dry Cleaning@7898361001', 'bhawarkua Indore', 7898361001),
('RameshSharma', 'ramesh2023@gmail.com', 'RameshSharma@9424349494', 'Ramesh*789', 'RameshLaundry', 'RameshLaundry@9424349494', 'Regal Colony Indore', 9424349494);

-- --------------------------------------------------------

--
-- Table structure for table `placeorder`
--

CREATE TABLE `placeorder` (
  `pid` int(255) NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `laundry_name` varchar(255) NOT NULL,
  `datein` date NOT NULL,
  `dateOut` date NOT NULL,
  `location` varchar(255) NOT NULL,
  `phone_no` varchar(255) NOT NULL,
  `serviceStatus` enum('F','NF') NOT NULL DEFAULT 'NF',
  `total_amount` decimal(10,3) NOT NULL,
  `orderStatus` enum('A','R','P') NOT NULL DEFAULT 'P'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `placeorder`
--

INSERT INTO `placeorder` (`pid`, `service_name`, `quantity`, `user_name`, `laundry_name`, `datein`, `dateOut`, `location`, `phone_no`, `serviceStatus`, `total_amount`, `orderStatus`) VALUES
(28, 'washing', 10, 'UsvatZehra', 'KamalLaundry', '2023-09-24', '2023-09-30', 'Sgsits College Indore', '7222979980', 'F', '100.000', 'A'),
(31, 'washing', 15, 'Nikhild0399', 'KamalLaundry', '2023-10-07', '2023-10-08', 'vallabh nagar indore', '8989408113', 'F', '150.000', ''),
(32, 'drying', 12, 'Nikhild0399', 'KamalLaundry', '2023-10-07', '2023-11-01', 'vallabh nagar indore', '7477230781', 'NF', '60.000', 'P');

-- --------------------------------------------------------

--
-- Table structure for table `provided_by`
--

CREATE TABLE `provided_by` (
  `service_id` int(255) NOT NULL,
  `laundry_name` varchar(255) NOT NULL,
  `cost_per_unit` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `provided_by`
--

INSERT INTO `provided_by` (`service_id`, `laundry_name`, `cost_per_unit`) VALUES
(1, 'KamalLaundry', '10.00'),
(4, 'KamalLaundry', '5.00'),
(2, 'KamalLaundry', '15.00'),
(1, 'Modern Laundry Dyers & Drycleaners', '15.00'),
(4, 'Modern Laundry Dyers & Drycleaners', '25.00'),
(2, 'Modern Laundry Dyers & Drycleaners', '20.00');

-- --------------------------------------------------------

--
-- Table structure for table `services_type`
--

CREATE TABLE `services_type` (
  `service_id` int(255) NOT NULL,
  `service_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services_type`
--

INSERT INTO `services_type` (`service_id`, `service_name`) VALUES
(1, 'washing'),
(2, 'ironing'),
(3, 'dying'),
(4, 'drying'),
(5, 'stain Removal'),
(6, 'lint Removal');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_registration`
--
ALTER TABLE `admin_registration`
  ADD PRIMARY KEY (`user_name`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`name`,`email`);

--
-- Indexes for table `customerfeedback`
--
ALTER TABLE `customerfeedback`
  ADD KEY `pid` (`pid`),
  ADD KEY `customerfeedback_ibfk_1` (`laundry_name`),
  ADD KEY `customerfeedback_ibfk_3` (`user_name`);

--
-- Indexes for table `customer_registration`
--
ALTER TABLE `customer_registration`
  ADD PRIMARY KEY (`user_name`);

--
-- Indexes for table `owner_registration`
--
ALTER TABLE `owner_registration`
  ADD PRIMARY KEY (`laundry_name`),
  ADD UNIQUE KEY `laundry_name` (`laundry_name`);

--
-- Indexes for table `placeorder`
--
ALTER TABLE `placeorder`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `laundry_name` (`laundry_name`),
  ADD KEY `service_name` (`service_name`),
  ADD KEY `user_name` (`user_name`);

--
-- Indexes for table `provided_by`
--
ALTER TABLE `provided_by`
  ADD KEY `service_id` (`service_id`),
  ADD KEY `laundry_name` (`laundry_name`);

--
-- Indexes for table `services_type`
--
ALTER TABLE `services_type`
  ADD PRIMARY KEY (`service_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `placeorder`
--
ALTER TABLE `placeorder`
  MODIFY `pid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customerfeedback`
--
ALTER TABLE `customerfeedback`
  ADD CONSTRAINT `customerfeedback_ibfk_1` FOREIGN KEY (`laundry_name`) REFERENCES `owner_registration` (`laundry_name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `customerfeedback_ibfk_2` FOREIGN KEY (`pid`) REFERENCES `placeorder` (`pid`),
  ADD CONSTRAINT `customerfeedback_ibfk_3` FOREIGN KEY (`user_name`) REFERENCES `customer_registration` (`user_name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `placeorder`
--
ALTER TABLE `placeorder`
  ADD CONSTRAINT `placeorder_ibfk_1` FOREIGN KEY (`laundry_name`) REFERENCES `owner_registration` (`laundry_name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `placeorder_ibfk_3` FOREIGN KEY (`user_name`) REFERENCES `customer_registration` (`user_name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `provided_by`
--
ALTER TABLE `provided_by`
  ADD CONSTRAINT `provided_by_ibfk_1` FOREIGN KEY (`service_id`) REFERENCES `services_type` (`service_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `provided_by_ibfk_2` FOREIGN KEY (`laundry_name`) REFERENCES `owner_registration` (`laundry_name`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
