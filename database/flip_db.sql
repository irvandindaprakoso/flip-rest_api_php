-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 20, 2019 at 04:03 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flip_db`
--

CREATE DATABASE IF NOT EXISTS `flip_db`;
USE `flip_db`
-- --------------------------------------------------------

--
-- Table structure for table `disburse`
--

CREATE TABLE `disburse` (
  `id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `status` enum('SUCCESS','CANCELLED','PENDING') NOT NULL,
  `time_served` varchar(25) NOT NULL,
  `bank_code` varchar(12) NOT NULL,
  `account_number` varchar(10) NOT NULL,
  `remark` varchar(30) NOT NULL,
  `receipt` text,
  `disburse_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `disburse`
--

INSERT INTO `disburse` (`id`, `amount`, `status`, `time_served`, `bank_code`, `account_number`, `remark`, `receipt`, `disburse_id`) VALUES
(25, 10000, 'SUCCESS', '2019-11-19 21:57:19', 'bca', '1234567890', '111', 'https://flip-receipt.oss-ap-southeast-5.aliyuncs.com/debit_receipt/126316_3d07f9fef9612c7275b3c36f7e1e5762.jpg', '3744843344'),
(26, 10000, 'PENDING', '2019-11-19 21:14:51', '008', '1234567890', 'test6', 'https://flip-receipt.oss-ap-southeast-5.aliyuncs.com/debit_receipt/126316_3d07f9fef9612c7275b3c36f7e1e5762.jpg', '6471070337'),
(27, 10000, 'SUCCESS', '2019-11-19 21:57:27', '009', '1234567890', 'test7', 'https://flip-receipt.oss-ap-southeast-5.aliyuncs.com/debit_receipt/126316_3d07f9fef9612c7275b3c36f7e1e5762.jpg', '3546649241');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `disburse`
--
ALTER TABLE `disburse`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `disburse_id` (`disburse_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `disburse`
--
ALTER TABLE `disburse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
