-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 15, 2020 at 07:46 PM
-- Server version: 8.0.22-0ubuntu0.20.04.3
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mts`
--

-- --------------------------------------------------------

--
-- Table structure for table `email_verify`
--

CREATE TABLE `email_verify` (
  `id` int NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `public_space`
--

CREATE TABLE `public_space` (
  `id` int NOT NULL,
  `name` varchar(128) NOT NULL,
  `address` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(512) NOT NULL,
  `qr_in` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `qr_out` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `actived` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `public_space`
--

INSERT INTO `public_space` (`id`, `name`, `address`, `email`, `password`, `qr_in`, `qr_out`, `created`, `actived`) VALUES
(1, 'Amplaz', 'Yogya', 'gayuh@gmail.com', '$2y$10$vOkgwCc8hv9inAF8Jw4fxuAPq5DbNpumxmMAyINmOPIHEwCQ7XnBy', NULL, NULL, '2020-12-04 15:00:57', 0),
(2, 'Lippo Plaza', 'Yogyakarta', 'gayuhri369@gmail.com', '$2y$10$GTzNwvdQoguFRBSFOhr.4O3jICxPmrPrp7/aLflL1scCuYj9WNm4u', NULL, NULL, '2020-12-05 01:29:37', 0),
(3, 'Lippo Plaza', 'Yogyakarta', 'gayidho369@gmail.com', '$2y$10$bVY5QCmqP20QpACh/5yYvedgMiH6UhCTE7MO2GxZG4SGfJMTJ57WK', NULL, NULL, '2020-12-05 01:30:33', 1),
(4, 'Ambarrukmo Plaza', 'Yogyakarta', '369@gmail.com', '$2y$10$2Wonf8lP6CYpKqvOacwUDu/uA88Ovsnao7IS5mpunI3QCMOcdBn/m', 'https://192.168.43.229/mts/visitor/check_in/4', 'https://192.168.43.229/mts/visitor/check_out/4', '2020-12-05 03:35:47', 1),
(5, 'Ambarrukmo Plaza', 'Yogyakarta', '69@gmail.com', '$2y$10$Pi6uhCbP4aE6h.SgYU18F.eJZn4WRXfUsBupLoo5e0t7h9.Oh1fsK', 'https://192.168.43.229/mts/visitor/check_in/5', 'https://192.168.43.229/mts/visitor/check_out/5', '2020-12-05 03:50:17', 1),
(6, 'Ambarrukmo Plaza', 'Yogyakarta', 'gayuhridhosdd369@gmail.com', '$2y$10$HIAIWGRy4GhCMGrvncoOFuLNeqlMPYZPBnLppCB8JbdUh41IH51se', 'https://192.168.43.229/mts/visitor/check_in/6', 'https://192.168.43.229/mts/visitor/check_out/6', '2020-12-05 03:56:24', 1),
(7, 'Ambarrukmo Plaza', 'Yogyakarta', 'gayuhridsasasho369@gmail.com', '$2y$10$7vOFEcZMoDK6V9vwXxrMxu4gZ.PTQzCanxGzEzT9uDGeuRWWnK2hC', 'https://192.168.43.229/mts/visitor/check_in/7', 'https://192.168.43.229/mts/visitor/check_out/7', '2020-12-05 04:05:48', 1),
(8, 'Ambarrukmo Plaza', 'Yogyakarta', 'gayuxzzhridho369@gmail.com', '$2y$10$.s6ypnBacK3IhwuupxtGAeBoOn246EAYjrwDg5bVAeHeDiEvzYEtK', 'https://192.168.43.229/mts/visitor/check_in/8', 'https://192.168.43.229/mts/visitor/check_out/8', '2020-12-05 04:07:03', 1),
(9, 'Ambarrukmo Plaza', 'Banjarnegara', 'gayuhridaaaho369@gmail.com', '$2y$10$gZ7q4Q9D00fUvWVFLDbkGuW/V5YESPPcclQjAB7Q5iOnh1lmegi2u', 'https://192.168.43.229/mts/visitor/check_in/9', 'https://192.168.43.229/mts/visitor/check_out/9', '2020-12-05 04:10:52', 1),
(10, 'Ambarrukmo Plaza', 'Yogyakarta', 'gayqqquhridho369@gmail.com', '$2y$10$4sRqHIU4NGWYOEbsu3Rcz.H6ZYoIQagtlsEHltsrKFjDohFRypxBS', 'https://192.168.43.229/mts/visitor/check_in/10', 'https://192.168.43.229/mts/visitor/check_out/10', '2020-12-05 04:17:14', 1),
(22, 'Ambarrukmo Plaza', 'Yogyakarta', 'ggayuhridho369@gmail.com', '$2y$10$10e4zq5RDCrZqYC.av2ztuJFYt1W9nymuBMjFpQW44Ac4Owtq5S0K', '22-in', '22-out', '2020-12-05 05:46:43', 1),
(23, 'Malioboro Mall', 'Yogyakarta', 'gayuhridho369@gmail.com', '$2y$10$rjZfYs2hoxBloh773LwKUeaTdXA4RufJaMDtEBa3Zz18gw2dWpHYu', 'visitor/check_in/23', 'visitor/check_out/23', '2020-12-08 15:44:39', 1);

-- --------------------------------------------------------

--
-- Table structure for table `record`
--

CREATE TABLE `record` (
  `id` int NOT NULL,
  `phone` varchar(128) NOT NULL,
  `public_space_id` int NOT NULL,
  `check_in` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `check_out` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `record`
--

INSERT INTO `record` (`id`, `phone`, `public_space_id`, `check_in`, `check_out`) VALUES
(2, '085540616206', 22, '2020-12-05 18:16:47', '2020-12-09 14:56:25'),
(3, '081392101909', 22, '2020-12-06 05:14:02', '2020-12-07 18:23:23'),
(4, '085540616206', 22, '2020-12-07 02:01:04', '2020-12-09 14:56:32'),
(5, '085540616206', 22, '2020-12-07 11:39:50', '2020-12-09 14:56:34'),
(6, '085540616206', 22, '2020-12-07 12:09:26', '2020-12-09 14:56:37'),
(7, '081392101909', 22, '2020-12-07 12:18:54', '2020-12-07 19:06:27'),
(8, '081392101909', 22, '2020-12-07 17:31:34', '2020-12-07 18:55:53'),
(9, '081392101909', 22, '2020-12-07 18:02:34', '2020-12-07 18:55:39'),
(10, '081392101909', 22, '2020-12-07 18:23:01', '2020-12-07 18:51:07'),
(11, '081392101909', 22, '2020-12-07 18:47:50', '2020-12-07 18:48:27'),
(12, '081392101909', 22, '2020-12-07 18:54:01', '2020-12-07 18:54:47'),
(15, '081392101909', 22, '2020-12-07 19:34:12', '2020-12-07 19:45:05'),
(18, '081392101909', 22, '2020-12-08 04:02:35', '2020-12-08 04:26:55'),
(21, '081392101909', 22, '2020-12-08 05:05:08', '2020-12-08 05:06:52'),
(22, '081392101909', 22, '2020-12-08 05:07:08', '2020-12-08 05:07:16'),
(23, '081392101909', 2, '2020-12-08 05:07:22', '2020-12-08 05:07:40'),
(24, '081392101909', 22, '2020-12-08 05:17:01', '2020-12-08 05:17:24'),
(25, '081392101909', 22, '2020-12-08 05:55:10', '2020-12-08 06:01:37'),
(26, '081392101909', 22, '2020-12-08 06:02:31', '2020-12-08 06:40:47'),
(27, '081392101909', 22, '2020-12-08 08:41:20', '2020-12-08 08:41:29'),
(28, '081392101909', 22, '2020-12-08 08:41:36', '2020-12-08 08:42:45'),
(29, '081392101909', 22, '2020-12-08 08:42:57', '2020-12-08 12:26:55'),
(30, '081392101909', 22, '2020-12-08 12:25:40', '2020-12-08 12:28:29'),
(31, '081392101909', 22, '2020-12-08 12:30:43', '2020-12-08 12:50:53'),
(32, '081392101909', 22, '2020-12-08 12:53:35', '2020-12-08 12:54:42'),
(33, '081392101909', 22, '2020-12-08 13:25:23', '2020-12-08 13:25:59'),
(34, '085540616206', 23, '2020-12-09 10:48:30', '2020-12-11 06:07:48'),
(35, '085540616206', 22, '2020-12-10 13:24:49', '2020-12-10 13:33:34'),
(36, '087889342772', 23, '2020-12-11 07:24:00', '2020-12-11 07:24:24'),
(37, '087889342772', 23, '2020-12-11 07:25:27', '2020-12-11 07:25:44'),
(38, '081392101909', 23, '2020-12-11 07:32:05', '2020-12-11 07:50:14'),
(39, '081392101909', 23, '2020-12-11 08:06:39', '2020-12-11 09:20:00'),
(40, '081392101909', 23, '2020-12-11 11:43:51', '2020-12-11 12:12:27'),
(41, '081392101909', 22, '2020-12-11 11:58:02', '2020-12-11 12:12:39'),
(44, '081392101909', 22, '2020-12-11 12:32:48', '2020-12-11 14:05:10'),
(47, '081392101909111', 22, '2020-12-11 16:54:37', '2020-12-11 17:08:00'),
(48, '085540616206', 22, '2020-12-11 17:17:41', '2020-12-11 17:17:59'),
(49, '085540616206', 22, '2020-12-11 17:29:35', '2020-12-11 17:29:55'),
(50, '085540616206', 2, '2020-12-11 17:31:50', '2020-12-11 17:32:19'),
(51, '081392101909', 22, '2020-12-11 17:41:59', '2020-12-11 17:42:13'),
(52, '081392101909', 2, '2020-12-11 17:42:18', '2020-12-11 17:42:30'),
(53, '081392101909', 2, '2020-12-11 17:42:40', '2020-12-11 17:43:07'),
(54, '081392101909', 22, '2020-12-11 17:44:12', '2020-12-11 17:49:36'),
(55, '085540616206', 22, '2020-12-11 17:58:49', '2020-12-11 17:59:21'),
(56, '085540616206', 2, '2020-12-11 17:59:47', '2020-12-11 17:59:55'),
(57, '085540616206', 2, '2020-12-11 18:00:19', '2020-12-11 18:00:39'),
(58, '085540616206', 22, '2020-12-11 18:02:48', '2020-12-11 18:03:05'),
(59, '085540616206', 23, '2020-12-15 06:02:22', '2020-12-15 06:03:09'),
(60, '085540616206', 23, '2020-12-15 06:04:18', '2020-12-15 06:13:37');

-- --------------------------------------------------------

--
-- Table structure for table `sms_verify`
--

CREATE TABLE `sms_verify` (
  `id` int NOT NULL,
  `phone` varchar(128) NOT NULL,
  `token` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sms_verify`
--

INSERT INTO `sms_verify` (`id`, `phone`, `token`) VALUES
(55, '122333333377711', '5fd39eb6f0b8d'),
(63, '081392101909', '5fd845f114093');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `email_verify`
--
ALTER TABLE `email_verify`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `public_space`
--
ALTER TABLE `public_space`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `record`
--
ALTER TABLE `record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms_verify`
--
ALTER TABLE `sms_verify`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `email_verify`
--
ALTER TABLE `email_verify`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `public_space`
--
ALTER TABLE `public_space`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `record`
--
ALTER TABLE `record`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `sms_verify`
--
ALTER TABLE `sms_verify`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
