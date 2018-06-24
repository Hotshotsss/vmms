-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2018 at 09:55 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `parking`
--
CREATE DATABASE IF NOT EXISTS `thesis_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `thesis_db`;

-- --------------------------------------------------------

--
-- Table structure for table `account_tbl`
--

CREATE TABLE `account_tbl` (
  `account_id` int(11) NOT NULL,
  `user_type` varchar(255) DEFAULT NULL,
  `user_fname` varchar(255) DEFAULT NULL,
  `user_mname` varchar(255) DEFAULT NULL,
  `user_lname` varchar(255) DEFAULT NULL,
  `user_bday` varchar(255) DEFAULT NULL,
  `user_age` int(11) DEFAULT NULL,
  `user_address` varchar(255) DEFAULT NULL,
  `user_uname` varchar(255) DEFAULT NULL,
  `user_pword` varchar(255) DEFAULT NULL,
  `user_location` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account_tbl`
--

INSERT INTO `account_tbl` (`account_id`, `user_type`, `user_fname`, `user_mname`, `user_lname`, `user_bday`, `user_age`, `user_address`, `user_uname`, `user_pword`, `user_location`) VALUES
(1, 'Security Guard', 'Juan', 'Amor', 'Dela Cruz', '5/16/1993', 24, 'QC', 'juan', '123', 'Patio Minerva');

-- --------------------------------------------------------

--
-- Table structure for table `car_tbl`
--

CREATE TABLE `car_tbl` (
  `car_id` int(11) NOT NULL,
  `car_plate` varchar(255) DEFAULT NULL,
  `vehicle_model` varchar(255) DEFAULT NULL,
  `vehicle_type` varchar(255) DEFAULT NULL,
  `vehicle_flatrate` decimal(11,2) DEFAULT NULL,
  `vehicle_flathour` decimal(11,2) DEFAULT NULL,
  `vehicle_reason` varchar(255) DEFAULT NULL,
  `vehicle_timein` varchar(255) DEFAULT NULL,
  `vehicle_timeout` varchar(255) DEFAULT NULL,
  `vehicle_hours` decimal(11,2) DEFAULT NULL,
  `vehicle_penalty` decimal(11,2) DEFAULT NULL,
  `vehicle_total` decimal(11,2) DEFAULT NULL,
  `vehicle_location` varchar(255) DEFAULT NULL,
  `payment_status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car_tbl`
--

INSERT INTO `car_tbl` (`car_id`, `car_plate`, `vehicle_model`, `vehicle_type`, `vehicle_flatrate`, `vehicle_flathour`, `vehicle_reason`, `vehicle_timein`, `vehicle_timeout`, `vehicle_hours`, `vehicle_penalty`, `vehicle_total`, `vehicle_location`, `payment_status`) VALUES
(7, 'ABC123', 'Pajero', 'Four Wheels', '40.00', '10.00', 'Inquire', '2018-03-13 12:00:00 AM', '2018-03-13 04:48:37 AM', '4.80', '18.00', '58.00', 'Old Gym', 'Paid'),
(8, 'CDE321', 'Toyota Vios', 'Four Wheels', '40.00', '10.00', 'Visit', '2018-03-13 04:17:52 AM', '2018-03-13 04:49:40 AM', '0.52', '0.00', '40.00', 'Old Gym', 'Paid'),
(9, 'QWE654', 'Honda Civic', 'Four Wheels', '40.00', '10.00', 'Visit', '2018-03-13 04:29:46 AM', '2018-03-13 04:58:07 AM', '0.47', '0.00', '40.00', 'Patio Minerva', 'Paid'),
(10, 'ABC123', 'Honda Civic', 'Four Wheels', '40.00', '10.00', 'Test', '2018-03-13 06:01:24 PM', '2018-03-13 11:32:30 PM', '5.52', '25.17', '65.17', NULL, 'Paid'),
(11, 'DSA123', 'Navarra', 'Four Wheels', '40.00', '10.00', 'Visit', '2018-03-13 11:45:37 PM', '2018-03-13 11:46:24 PM', '0.00', '0.00', '40.00', 'Old Gym', 'Paid'),
(12, 'QWE321', 'Jeepney', 'Four Wheels', '40.00', '10.00', 'Visit', '2018-03-14 12:15:37 AM', '2018-03-14 12:16:50 AM', '0.02', '0.00', '40.00', 'Old Gym', 'Paid'),
(13, 'TRE123', 'Ambulance', 'Four Wheels', '40.00', '10.00', 'Emergency', '2018-03-13 01:41:36 AM', '2018-03-14 02:39:20 AM', '24.95', '219.50', '259.50', NULL, 'Paid');

-- --------------------------------------------------------

--
-- Table structure for table `hour_tbl`
--

CREATE TABLE `hour_tbl` (
  `rate_id` int(11) NOT NULL,
  `vehicle_type` varchar(50) DEFAULT NULL,
  `hour_rate` double(11,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hour_tbl`
--

INSERT INTO `hour_tbl` (`rate_id`, `vehicle_type`, `hour_rate`) VALUES
(2, 'Two Wheels', 0),
(4, 'Drop off', 0),
(5, 'Four Wheels', 10);

-- --------------------------------------------------------

--
-- Table structure for table `or_tbl`
--

CREATE TABLE `or_tbl` (
  `or_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `car_id` int(11) DEFAULT NULL,
  `vehicle_total` decimal(11,2) DEFAULT NULL,
  `or_date` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `or_tbl`
--

INSERT INTO `or_tbl` (`or_id`, `car_id`, `vehicle_total`, `or_date`) VALUES
(000001, 10, '65.17', '2018-03-13 11:32:32 PM'),
(000002, 11, '40.00', '2018-03-13 11:46:26 PM'),
(000003, 12, '40.00', '2018-03-14 12:17:03 AM'),
(000004, 13, '259.50', '2018-03-14 02:39:48 AM');

-- --------------------------------------------------------

--
-- Table structure for table `parking_tbl`
--

CREATE TABLE `parking_tbl` (
  `parking_id` int(11) NOT NULL,
  `parking_name` varchar(100) DEFAULT NULL,
  `parking_size` int(11) DEFAULT NULL,
  `parking_description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parking_tbl`
--

INSERT INTO `parking_tbl` (`parking_id`, `parking_name`, `parking_size`, `parking_description`) VALUES
(1, 'Patio Minerva', 100, 'Near Gate 5'),
(3, 'Old Gym', 200, 'Located near CBT Building');

-- --------------------------------------------------------

--
-- Table structure for table `rate_tbl`
--

CREATE TABLE `rate_tbl` (
  `rate_id` int(11) NOT NULL,
  `vehicle_type` varchar(50) DEFAULT NULL,
  `vehicle_rate` double(11,0) DEFAULT NULL,
  `vehicle_hour` double(11,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rate_tbl`
--

INSERT INTO `rate_tbl` (`rate_id`, `vehicle_type`, `vehicle_rate`, `vehicle_hour`) VALUES
(2, 'Two Wheels', 40, 3),
(3, 'Drop off', 0, 0),
(4, 'Three Wheels', 40, 3),
(5, 'Four Wheels', 40, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_tbl`
--

CREATE TABLE `user_tbl` (
  `user_id` int(11) NOT NULL,
  `user_type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`user_id`, `user_type`) VALUES
(2, 'Administrator'),
(3, 'User'),
(4, 'Security Guard');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_tbl`
--

CREATE TABLE `vehicle_tbl` (
  `vehicle_id` int(11) NOT NULL,
  `vehicle_type` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle_tbl`
--

INSERT INTO `vehicle_tbl` (`vehicle_id`, `vehicle_type`) VALUES
(1, 'Two Wheels'),
(2, 'Three Wheels'),
(4, 'Four Wheels'),
(5, 'Drop off');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_tbl`
--
ALTER TABLE `account_tbl`
  ADD PRIMARY KEY (`account_id`);

--
-- Indexes for table `car_tbl`
--
ALTER TABLE `car_tbl`
  ADD PRIMARY KEY (`car_id`);

--
-- Indexes for table `hour_tbl`
--
ALTER TABLE `hour_tbl`
  ADD PRIMARY KEY (`rate_id`);

--
-- Indexes for table `or_tbl`
--
ALTER TABLE `or_tbl`
  ADD PRIMARY KEY (`or_id`);

--
-- Indexes for table `parking_tbl`
--
ALTER TABLE `parking_tbl`
  ADD PRIMARY KEY (`parking_id`);

--
-- Indexes for table `rate_tbl`
--
ALTER TABLE `rate_tbl`
  ADD PRIMARY KEY (`rate_id`);

--
-- Indexes for table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `vehicle_tbl`
--
ALTER TABLE `vehicle_tbl`
  ADD PRIMARY KEY (`vehicle_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_tbl`
--
ALTER TABLE `account_tbl`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `car_tbl`
--
ALTER TABLE `car_tbl`
  MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `hour_tbl`
--
ALTER TABLE `hour_tbl`
  MODIFY `rate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `or_tbl`
--
ALTER TABLE `or_tbl`
  MODIFY `or_id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `parking_tbl`
--
ALTER TABLE `parking_tbl`
  MODIFY `parking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rate_tbl`
--
ALTER TABLE `rate_tbl`
  MODIFY `rate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_tbl`
--
ALTER TABLE `user_tbl`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vehicle_tbl`
--
ALTER TABLE `vehicle_tbl`
  MODIFY `vehicle_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
