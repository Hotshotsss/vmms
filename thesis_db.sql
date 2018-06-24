-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2018 at 03:33 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thesis_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts_tbl`
--

CREATE TABLE `accounts_tbl` (
  `user_id` int(11) NOT NULL,
  `user_type` varchar(55) DEFAULT NULL,
  `last_name` varchar(55) DEFAULT NULL,
  `first_name` varchar(55) DEFAULT NULL,
  `middle_ini` varchar(55) DEFAULT NULL,
  `username` varchar(55) DEFAULT NULL,
  `password` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts_tbl`
--

INSERT INTO `accounts_tbl` (`user_id`, `user_type`, `last_name`, `first_name`, `middle_ini`, `username`, `password`) VALUES
(1, 'Administrator', 'admin', 'admin', 'admin', 'admin', 'admin'),
(2, 'MainGate', 'main', 'main', 'main', 'main', 'main'),
(4, 'Monitoring', 'moni', 'moni', 'moni', 'moni', 'moni'),
(6, 'ExitGate', 'exit', 'exit', 'exit', 'exit', 'exit');

-- --------------------------------------------------------

--
-- Table structure for table `main_tbl`
--

CREATE TABLE `main_tbl` (
  `receipt_number` int(11) NOT NULL,
  `plate_number` varchar(55) DEFAULT NULL,
  `time_in` varchar(6) DEFAULT NULL,
  `vehicle_type` varchar(55) DEFAULT NULL,
  `purpose` varchar(55) DEFAULT NULL,
  `date` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `main_tbl`
--

INSERT INTO `main_tbl` (`receipt_number`, `plate_number`, `time_in`, `vehicle_type`, `purpose`, `date`) VALUES
(1, 'vdvdv', '2017-1', '', 'option1', NULL),
(2, 'cddv', '0000-0', '2 Wheels', 'Hospital', NULL),
(3, 'vvkdvkd', '0000-0', '2 Wheels', 'University', NULL),
(4, 'k n kvndkvn', '0000-0', '3 Wheels', 'Hospital', NULL),
(5, 'ffbfbf', '0000-0', '4 Wheels', 'Guest', NULL),
(6, 'bfbfbfb', '0000-0', '3 Wheels', 'Guest', NULL),
(7, 'vddsvs', '0000-0', '4 Wheels', 'Hospital', NULL),
(8, 'vsvvdfv', '0000-0', '4 Wheels', 'Hospital', NULL),
(9, 'vsdvsvsdvsdv', '0000-0', '3 Wheels', 'University', ''),
(10, 'ijwifjw', '0000-0', '3 Wheels', 'Guest', ''),
(11, 'wqwqwqew', '0000-0', '3 Wheels', 'Guest', ''),
(12, 'woewoekwoekw', '2010-0', '4 Wheels', 'Drop By', ''),
(13, 'vdfvdfbfdb', '2010-0', '3 Wheels', 'Hospital', NULL),
(14, 'dsvsdvsdv', '0000-0', '3 Wheels', 'Guest', NULL),
(15, 'csdvsdv', '10:13:', '3 Wheels', 'Guest', NULL),
(16, 'iyoouoyfy', '10:16:', '3 Wheels', 'Drop By', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `space_tbl`
--

CREATE TABLE `space_tbl` (
  `space_id` int(11) NOT NULL,
  `allocation_space` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `space_tbl`
--

INSERT INTO `space_tbl` (`space_id`, `allocation_space`) VALUES
(1, 1000),
(2, 100),
(3, 55),
(4, 30),
(5, 500),
(6, 10),
(7, 1500),
(8, 0),
(9, 100);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts_tbl`
--
ALTER TABLE `accounts_tbl`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `main_tbl`
--
ALTER TABLE `main_tbl`
  ADD PRIMARY KEY (`receipt_number`);

--
-- Indexes for table `space_tbl`
--
ALTER TABLE `space_tbl`
  ADD PRIMARY KEY (`space_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts_tbl`
--
ALTER TABLE `accounts_tbl`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `main_tbl`
--
ALTER TABLE `main_tbl`
  MODIFY `receipt_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `space_tbl`
--
ALTER TABLE `space_tbl`
  MODIFY `space_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
