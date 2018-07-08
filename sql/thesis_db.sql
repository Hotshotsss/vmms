-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2018 at 07:55 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
  `password` varchar(55) DEFAULT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts_tbl`
--

INSERT INTO `accounts_tbl` (`user_id`, `user_type`, `last_name`, `first_name`, `middle_ini`, `username`, `password`, `date`) VALUES
(1, 'Administrator', 'admin', 'admin', 'admin', 'admin', 'admin', '2018-06-02'),
(2, 'MainGate', 'main', 'main', 'main', 'main', 'main', '2018-06-03'),
(4, 'Monitoring', 'moni', 'moni', 'moni', 'moni', 'moni', '2018-06-04'),
(6, 'ExitGate', 'exit', 'exit', 'exit', 'exit', 'exit', '2018-06-05');

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
  `payment_status` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car_tbl`
--

INSERT INTO `car_tbl` (`car_id`, `car_plate`, `vehicle_model`, `vehicle_type`, `vehicle_flatrate`, `vehicle_flathour`, `vehicle_reason`, `vehicle_timein`, `vehicle_timeout`, `vehicle_hours`, `vehicle_penalty`, `vehicle_total`, `vehicle_location`, `payment_status`, `created_at`, `updated_at`) VALUES
(7, 'ABC123', 'Pajero', 'Four Wheels', '40.00', '10.00', 'Inquire', '2018-03-13 12:00:00 AM', '2018-03-13 04:48:37 AM', '4.80', '18.00', '58.00', 'Old Gym', 'Paid', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'CDE321', 'Toyota Vios', 'Four Wheels', '40.00', '10.00', 'Visit', '2018-03-13 04:17:52 AM', '2018-03-13 04:49:40 AM', '0.52', '0.00', '40.00', 'Old Gym', 'Paid', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'QWE654', 'Honda Civic', 'Four Wheels', '40.00', '10.00', 'Visit', '2018-03-13 04:29:46 AM', '2018-03-13 04:58:07 AM', '0.47', '0.00', '40.00', 'Patio Minerva', 'Paid', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'ABC123', 'Honda Civic', 'Four Wheels', '40.00', '10.00', 'Test', '2018-03-13 06:01:24 PM', '2018-03-13 11:32:30 PM', '5.52', '25.17', '65.17', NULL, 'Paid', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'DSA123', 'Navarra', 'Four Wheels', '40.00', '10.00', 'Visit', '2018-03-13 11:45:37 PM', '2018-03-13 11:46:24 PM', '0.00', '0.00', '40.00', 'Old Gym', 'Paid', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'QWE321', 'Jeepney', 'Four Wheels', '40.00', '10.00', 'Visit', '2018-03-14 12:15:37 AM', '2018-03-14 12:16:50 AM', '0.02', '0.00', '40.00', 'Old Gym', 'Paid', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'TRE123', 'Ambulance', 'Four Wheels', '40.00', '10.00', 'Emergency', '2018-03-13 01:41:36 AM', '2018-03-14 02:39:20 AM', '24.95', '219.50', '259.50', NULL, 'Paid', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, '123123', 'Kawasaki', 'Two Wheels', '40.00', '10.00', 'tambay', '2018-03-13 01:41:36 AM', '2018-03-14 02:39:20 AM', '24.95', '219.50', '259.50', NULL, NULL, '2018-06-24 09:21:55', '2018-06-24 09:21:55');

-- --------------------------------------------------------

--
-- Table structure for table `car_types`
--

CREATE TABLE `car_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `car_types`
--

INSERT INTO `car_types` (`id`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Four Wheeler', NULL, NULL),
(2, 'Single', NULL, NULL),
(3, '0', '2018-07-01 01:26:53', '2018-07-01 01:26:53'),
(4, '2 wheels', '2018-07-02 23:20:49', '2018-07-02 23:20:49');

-- --------------------------------------------------------

--
-- Table structure for table `employee_schedules`
--

CREATE TABLE `employee_schedules` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `from` date NOT NULL,
  `to` date NOT NULL,
  `time_in` time NOT NULL,
  `time_out` time NOT NULL,
  `repeater` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_07_05_125418_create_parking_violations_table', 2);

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
-- Table structure for table `parkings`
--

CREATE TABLE `parkings` (
  `id` int(10) UNSIGNED NOT NULL,
  `car_type_id` int(11) NOT NULL,
  `location_id` int(11) DEFAULT NULL,
  `vehicle_model` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plate_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parking_reason` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_in` datetime NOT NULL,
  `time_out` datetime DEFAULT NULL,
  `violation` int(11) DEFAULT NULL,
  `penalty` decimal(11,2) DEFAULT NULL,
  `detailed_location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parkings`
--

INSERT INTO `parkings` (`id`, `car_type_id`, `location_id`, `vehicle_model`, `plate_number`, `parking_reason`, `time_in`, `time_out`, `violation`, `penalty`, `detailed_location`, `payment_status`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'Elantra', 'mq15740', 'Yeyyy', '2018-06-26 12:51:10', '2018-07-01 10:45:43', 0, '123.00', NULL, NULL, '2018-06-26 04:51:10', '2018-07-06 05:40:39'),
(2, 1, 3, 'Fit', 'CAB123', 'Wala lang', '2018-07-01 09:41:19', '2018-07-01 10:46:35', 0, '123.00', NULL, NULL, '2018-07-01 01:41:19', '2018-07-06 05:41:02'),
(3, 1, NULL, 'Fit', 'CAB123', 'Wala lang', '2018-07-01 09:44:11', '2018-07-01 16:57:28', 0, '123.00', NULL, NULL, '2018-07-01 01:44:11', '2018-07-01 08:57:28'),
(4, 1, NULL, 'Fit', 'CAB123', 'asdasd', '2018-07-01 09:44:47', '2018-07-03 12:06:01', 0, '123.00', NULL, NULL, '2018-07-01 01:44:47', '2018-07-03 04:06:01'),
(5, 1, 5, 'Jazz', 'EFG123', 'lalala', '2018-07-01 10:19:08', NULL, 0, NULL, NULL, NULL, '2018-07-01 02:19:08', '2018-07-06 04:18:36'),
(6, 1, 7, 'Montero Sport', 'HIJ123', 'hehehe', '2018-07-01 10:19:41', NULL, 0, NULL, NULL, NULL, '2018-07-01 02:19:41', '2018-07-06 04:21:11'),
(7, 1, NULL, 'Jeep', 'KLM123', 'huehuehue', '2018-07-01 10:20:22', '2018-07-03 07:35:50', 0, NULL, NULL, NULL, '2018-07-01 02:20:22', '2018-07-02 23:35:50'),
(8, 1, NULL, 'afasfasda', 'NOP123', 'adasdasd', '2018-07-01 10:20:54', '2018-07-01 10:53:23', 0, NULL, NULL, NULL, '2018-07-01 02:20:54', '2018-07-01 02:53:23');

-- --------------------------------------------------------

--
-- Table structure for table `parking_locations`
--

CREATE TABLE `parking_locations` (
  `id` int(10) UNSIGNED NOT NULL,
  `parking_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `slots_available` int(20) DEFAULT NULL,
  `number_of_slots` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parking_locations`
--

INSERT INTO `parking_locations` (`id`, `parking_name`, `description`, `slots_available`, `number_of_slots`, `created_at`, `updated_at`) VALUES
(1, 'Old Gym', '', 0, 250, NULL, NULL),
(2, 'Patio Minerva', '', 0, 250, NULL, NULL),
(3, 'PGT', '', 0, 250, NULL, NULL),
(4, 'Centennial Gym', '', 0, 250, NULL, NULL),
(5, 'Entrance', '', 0, 250, NULL, NULL),
(7, 'hehe', 'sds', NULL, 250, '2018-07-06 04:03:19', '2018-07-06 04:03:19');

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
-- Table structure for table `parking_violations`
--

CREATE TABLE `parking_violations` (
  `id` int(10) UNSIGNED NOT NULL,
  `parking_id` int(11) NOT NULL,
  `violation_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parking_violations`
--

INSERT INTO `parking_violations` (`id`, `parking_id`, `violation_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2018-07-05 05:02:53', '2018-07-05 05:02:53'),
(2, 1, 2, '2018-07-05 05:23:18', '2018-07-05 05:23:18'),
(3, 1, 1, '2018-07-05 05:23:24', '2018-07-05 05:23:24'),
(4, 6, 1, '2018-07-05 06:00:22', '2018-07-05 06:00:22'),
(5, 6, 1, '2018-07-05 06:10:44', '2018-07-05 06:10:44');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rates`
--

CREATE TABLE `rates` (
  `id` int(10) UNSIGNED NOT NULL,
  `car_id` int(11) NOT NULL,
  `standard_rate` int(11) NOT NULL,
  `hour_rate` int(11) NOT NULL,
  `standard_hours` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint(4) NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `type`, `username`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'admin', 0, 'admin', '$2y$10$6voEjGmGmaO9O.9IYuOcg.b/5LmgdCH49sDYlCYn3Jc/GCz8qYYq.', 'mx9GqUTKRIcUwfgJXy3SBEQ4VmYcKJ4sJgQKmjwtZ1JXLhvOVXBe020ev1x2', '2018-06-23 21:41:48', '2018-06-23 21:41:48'),
(3, 'gate', 1, 'gate', '$2y$10$6voEjGmGmaO9O.9IYuOcg.b/5LmgdCH49sDYlCYn3Jc/GCz8qYYq.', 'a5pdPKp4D9X71990Y9Dd0GWL6fL4nO0Yj34MPXWInlNX9cCdi8Y9oy5nCKX3', '2018-05-31 16:00:00', '2018-06-10 16:00:00'),
(4, 'monitoring', 2, 'monitoring', '$2y$10$6voEjGmGmaO9O.9IYuOcg.b/5LmgdCH49sDYlCYn3Jc/GCz8qYYq.', 'BLMKNr4cbPhFhUJZCkULf1c1PTRh2VWfRJrPoF8wZECtIY7FZSiSpPpwtbvC', NULL, NULL);

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

-- --------------------------------------------------------

--
-- Table structure for table `violation`
--

CREATE TABLE `violation` (
  `id` int(11) NOT NULL,
  `violation` varchar(20) NOT NULL,
  `penalty` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `violation`
--

INSERT INTO `violation` (`id`, `violation`, `penalty`) VALUES
(1, 'Double Parking', '50'),
(2, 'Lost ticket', '50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts_tbl`
--
ALTER TABLE `accounts_tbl`
  ADD PRIMARY KEY (`user_id`);

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
-- Indexes for table `car_types`
--
ALTER TABLE `car_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_schedules`
--
ALTER TABLE `employee_schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hour_tbl`
--
ALTER TABLE `hour_tbl`
  ADD PRIMARY KEY (`rate_id`);

--
-- Indexes for table `main_tbl`
--
ALTER TABLE `main_tbl`
  ADD PRIMARY KEY (`receipt_number`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `or_tbl`
--
ALTER TABLE `or_tbl`
  ADD PRIMARY KEY (`or_id`);

--
-- Indexes for table `parkings`
--
ALTER TABLE `parkings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parking_locations`
--
ALTER TABLE `parking_locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parking_tbl`
--
ALTER TABLE `parking_tbl`
  ADD PRIMARY KEY (`parking_id`);

--
-- Indexes for table `parking_violations`
--
ALTER TABLE `parking_violations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `rates`
--
ALTER TABLE `rates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rate_tbl`
--
ALTER TABLE `rate_tbl`
  ADD PRIMARY KEY (`rate_id`);

--
-- Indexes for table `space_tbl`
--
ALTER TABLE `space_tbl`
  ADD PRIMARY KEY (`space_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`username`);

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
-- Indexes for table `violation`
--
ALTER TABLE `violation`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts_tbl`
--
ALTER TABLE `accounts_tbl`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `account_tbl`
--
ALTER TABLE `account_tbl`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `car_tbl`
--
ALTER TABLE `car_tbl`
  MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `car_types`
--
ALTER TABLE `car_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employee_schedules`
--
ALTER TABLE `employee_schedules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hour_tbl`
--
ALTER TABLE `hour_tbl`
  MODIFY `rate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `main_tbl`
--
ALTER TABLE `main_tbl`
  MODIFY `receipt_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `or_tbl`
--
ALTER TABLE `or_tbl`
  MODIFY `or_id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `parkings`
--
ALTER TABLE `parkings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `parking_locations`
--
ALTER TABLE `parking_locations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `parking_tbl`
--
ALTER TABLE `parking_tbl`
  MODIFY `parking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `parking_violations`
--
ALTER TABLE `parking_violations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `rates`
--
ALTER TABLE `rates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rate_tbl`
--
ALTER TABLE `rate_tbl`
  MODIFY `rate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `space_tbl`
--
ALTER TABLE `space_tbl`
  MODIFY `space_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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

--
-- AUTO_INCREMENT for table `violation`
--
ALTER TABLE `violation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
