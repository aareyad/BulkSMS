-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2019 at 07:29 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bulk_sms`
--

-- --------------------------------------------------------

--
-- Table structure for table `bulksms_contact_list`
--

CREATE TABLE `bulksms_contact_list` (
  `id` int(11) NOT NULL,
  `number` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `contact_id` int(11) NOT NULL DEFAULT '0',
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bulksms_smsbox`
--

CREATE TABLE `bulksms_smsbox` (
  `id` int(11) NOT NULL,
  `number` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `send_by` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` int(11) NOT NULL COMMENT '1=success,2=failed,3=pending',
  `api_respons` text COLLATE utf8_unicode_ci,
  `error_message` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bulksms_smsbox`
--

INSERT INTO `bulksms_smsbox` (`id`, `number`, `message`, `send_by`, `created_at`, `updated_at`, `status`, `api_respons`, `error_message`) VALUES
(1, '8801834728267', 'hello', 1, '2017-08-02 23:19:55', '2017-08-02 23:19:55', 1, NULL, NULL),
(2, '8801515283558', 'hello', 1, '2017-08-02 23:20:00', '2017-08-02 23:20:00', 1, NULL, NULL),
(3, '8801821595568', 'jk kjkljl', 7, '2018-09-05 10:40:26', '2018-09-05 10:40:26', 1, NULL, NULL),
(4, '8801821595568', 'Hi Reyad,\r\nHow are you?', 12, '2018-09-05 10:45:57', '2018-09-05 10:45:57', 1, NULL, NULL),
(5, '8801814812929', 'Hi', 1, '2018-10-21 11:29:37', '2018-10-21 11:29:37', 1, NULL, NULL),
(6, '8801834728267', 'Hello', 1, '2018-10-22 08:51:30', '2018-10-22 08:51:30', 1, NULL, NULL),
(7, '8801814812929', 'Hello', 1, '2018-10-22 08:51:35', '2018-10-22 08:51:35', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bulksms_sms_credit`
--

CREATE TABLE `bulksms_sms_credit` (
  `id` int(11) NOT NULL,
  `client_id` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `admin_id` int(11) NOT NULL,
  `sale_credit` decimal(10,2) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `bulksms_sms_credit`
--

INSERT INTO `bulksms_sms_credit` (`id`, `client_id`, `admin_id`, `sale_credit`, `created_at`, `updated_at`) VALUES
(1, '7', 1, '30.00', '2017-08-02 19:03:50', '2017-08-02 19:03:50'),
(2, '7', 1, '500.00', '2017-08-02 19:05:11', '2017-08-02 19:05:11'),
(3, '8', 1, '40.00', '2018-09-04 12:18:39', '2018-09-04 12:18:39'),
(4, '12', 1, '50.00', '2018-09-05 10:44:32', '2018-09-05 10:44:32');

-- --------------------------------------------------------

--
-- Table structure for table `bulksms_users`
--

CREATE TABLE `bulksms_users` (
  `id` int(11) NOT NULL,
  `first_name` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT '1=active,0=inactive',
  `role` int(11) NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `contact_number` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `sms_credit` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `bulksms_users`
--

INSERT INTO `bulksms_users` (`id`, `first_name`, `last_name`, `username`, `password`, `role`, `email`, `contact_number`, `image`, `status`, `created_at`, `updated_at`, `sms_credit`) VALUES
(1, 'Ali', 'Akbar', 'aliakbar', '$2y$10$1tkd2NWwqyHwtwQBV8c.J.umZYbfF1FYR49AjARi5LvHcQgBfHaj6', 1, 'aliakbar.reyad@gmail.com', '01309712256', NULL, 1, '2018-10-22 11:56:28', '0000-00-00 00:00:00', '4.00'),
(7, 'Salman', 'Coyon', 'coyon', '$2y$10$XZ9Oibe8bV9KGzSWVGKiAeho0GWjMHW2s4xcbz0TGAeDBizVf.fgS', 2, 'coyon@hotmail.com', '01688535060', NULL, 1, '2018-10-22 11:57:43', '2017-07-26 07:16:35', '529.00'),
(8, 'Manzur', 'Ahmed', 'pohicezezy', '$2y$10$hZbqrTWdyMhRNwC4FWSSce3ihsIdlNpO/tftH/MR3aFq9FfdxtiXC', 2, 'manzur@hotmail.com', '01515283558', NULL, 1, '2018-10-22 11:58:29', '2017-08-01 21:37:30', '40.00'),
(9, 'Arifur', 'Rahman', 'petykod', '$2y$10$.u/c3TfJi48ZQn73UdX2K.cHvzQ45B7IjdOh1I24Wv78K725n/BYu', 2, 'arif@gmail.com', NULL, NULL, 1, '2018-10-22 11:59:32', '2017-08-01 21:37:58', '42.00'),
(12, 'Selim', 'Reza', 'aliakbar', '$2y$10$2BHSwxKq/i9AWmNOws8Ke.hDLWQP1WPoAkRa4CWu0nZGuxp8vLzGO', 2, 'selim@gmail.com', '----', NULL, 1, '2018-10-22 12:00:01', '2018-09-04 12:22:44', '49.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bulksms_contact_list`
--
ALTER TABLE `bulksms_contact_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bulksms_smsbox`
--
ALTER TABLE `bulksms_smsbox`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bulksms_sms_credit`
--
ALTER TABLE `bulksms_sms_credit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bulksms_users`
--
ALTER TABLE `bulksms_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bulksms_contact_list`
--
ALTER TABLE `bulksms_contact_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bulksms_smsbox`
--
ALTER TABLE `bulksms_smsbox`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `bulksms_sms_credit`
--
ALTER TABLE `bulksms_sms_credit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `bulksms_users`
--
ALTER TABLE `bulksms_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
