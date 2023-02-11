-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2023 at 05:33 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `essam_digital`
--

-- --------------------------------------------------------

--
-- Table structure for table `matengenezo`
--

CREATE TABLE `matengenezo` (
  `id` int(50) UNSIGNED NOT NULL,
  `matumizi` varchar(300) NOT NULL,
  `kiasi` int(20) NOT NULL,
  `maoni` varchar(300) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `matengenezo`
--

INSERT INTO `matengenezo` (`id`, `matumizi`, `kiasi`, `maoni`, `date_added`, `date_updated`) VALUES
(1, 'kununua mafuta', 0, '', '2023-02-09 19:24:34', NULL),
(2, 'buyying solor', 0, '', '2023-02-09 19:27:07', NULL),
(3, 'buyying solor', 300000, 'some coments goes here', '2023-02-09 19:29:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `odazote`
--

CREATE TABLE `odazote` (
  `id` int(30) UNSIGNED NOT NULL,
  `jina_la_mteja` text NOT NULL,
  `mawasiliano` int(20) NOT NULL,
  `huduma` text NOT NULL,
  `bajeti` int(50) NOT NULL,
  `materials` text DEFAULT NULL,
  `matumizi` int(10) NOT NULL,
  `baki` int(10) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `odazote`
--

INSERT INTO `odazote` (`id`, `jina_la_mteja`, `mawasiliano`, `huduma`, `bajeti`, `materials`, `matumizi`, `baki`, `date_added`) VALUES
(1, 'Jonasani kimara', 76888090, 'kuchapisha', 800000, 'papers, wino', 20000, 780000, '2023-02-09 05:41:33'),
(2, 'Jonasani kimara', 76888090, 'kuchapisha', 800000, 'papers, wino', 20000, 780000, '2023-02-09 05:41:53'),
(3, 'Jonasani kimara', 76888090, 'kuchapisha', 800000, 'papers, wino', 20000, 780000, '2023-02-09 05:41:57'),
(4, 'Mengi kimaro', 76099988, 'bango', 6000000, 'mbao, karatasi ngumu', 70000, 5930000, '2023-02-09 05:43:09'),
(5, 'Joseph miaa', 712234456, 'resume ', 100000, 'paper', 25000, 75000, '2023-02-09 06:05:20'),
(6, 'Kiliani samu', 876655443, 'documents A4', 30000, 'paper 10', 2000, 28000, '2023-02-09 06:06:59'),
(7, 'megela mwala', 2147483647, 'football t-shirt', 70000, 't-shirt xl, wino ', 18050, 51950, '2023-02-09 06:08:53'),
(8, 'Mikumi', 47878778, 'kipeperushi ', 260000, 'paper A4, wino X 2', 28500, 231500, '2023-02-09 06:11:06'),
(9, 'Mingiwa kali', 75654764, 'kuprint magazeti ', 50000, 'paper A4, wino X 2', 5000, 45000, '2023-02-09 06:19:11'),
(10, 'Kasimu Joma', 738869696, 'kuprint magazeti ', 650000, 'documents jdj', 100000, 550000, '2023-02-09 06:22:08'),
(11, 'Hamisi Maganda ', 77666787, 'car-branding', 2000000, 'plastics, tails, rangi ,wino', 200000, 1800000, '2023-02-09 06:24:12'),
(12, 'Quboy Izzo', 6890667, 'Hotel-branding', 5000000, 'plastics, tails, rangi ,wino', 500000, 4500000, '2023-02-09 06:30:39'),
(13, 'megela mwala', 63465675, 'documents A4', 90000, 'sheet, ink', 10000, 80000, '2023-02-09 12:13:22'),
(14, 'Jonasani kimara', 712234456, 'documents A4', 7000000, 'wino, papers', 70000, 6930000, '2023-02-10 11:59:12'),
(15, 'megela mwala', 6890667, 'Bussness card printing', 800000, 'hard paper, ink', 25000, 775000, '2023-02-10 12:00:16'),
(16, 'Makidaki', 95636536, 'kuprint magazeti ', 1000000, 'wino,papers', 20000, 980000, '2023-02-10 12:01:20'),
(17, 'Joseph miaa', 75535554, 'documents A4', 40000, 'wino,papers', 4000, 36000, '2023-02-10 12:02:36'),
(18, 'Jonasani kimara', 712234456, 'kuchapisha', 800000, 'kkkkikkok', 9000, 791000, '2023-02-10 17:46:35'),
(19, 'Joseph miaa', 712234456, 'bango', 100000, 'kkkkmmjjkmkj=50000', 50000, 50000, '2023-02-10 17:50:23'),
(20, 'Amaina zen', 7244355, 'kadi za harusi', 600000, 'wino,papers', 10000, 590000, '2023-02-11 06:18:54');

-- --------------------------------------------------------

--
-- Table structure for table `salaries`
--

CREATE TABLE `salaries` (
  `id` int(50) UNSIGNED NOT NULL,
  `username` text NOT NULL,
  `kiasi` int(20) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `salaries`
--

INSERT INTO `salaries` (`id`, `username`, `kiasi`, `date_added`, `date_updated`) VALUES
(1, 'kad-3', 40000, '2023-02-09 15:34:19', NULL),
(2, 'James', 7000, '2023-02-09 15:36:17', NULL),
(3, 'admin', 300000, '2023-02-09 15:38:24', NULL),
(4, 'Kado', 100000, '2023-02-10 17:54:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `salio_la_mwezi`
--

CREATE TABLE `salio_la_mwezi` (
  `id` int(50) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `kiasi` int(20) NOT NULL,
  `chanzo` varchar(40) NOT NULL,
  `date_payed` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `salio_la_mwezi`
--

INSERT INTO `salio_la_mwezi` (`id`, `date`, `kiasi`, `chanzo`, `date_payed`, `date_updated`) VALUES
(1, '2000-07-17', 7000, 'NMB', '2023-02-09 18:48:08', NULL),
(2, '2023-09-12', 4000000, 'CRDB', '2023-02-09 18:48:43', NULL),
(3, '2023-02-17', 40000, 'NMB', '2023-02-09 18:49:23', NULL),
(4, '2023-02-24', 4600000, 'NMB', '2023-02-09 18:49:44', NULL),
(5, '2023-03-04', 500000, 'NMB', '2023-02-09 18:50:23', NULL),
(6, '2023-02-25', 4000000, 'NMB', '2023-02-09 18:51:06', NULL),
(7, '2023-02-16', 1000000, 'M-pesa', '2023-02-09 18:51:58', NULL),
(8, '2023-02-08', 4000000, 'M-Pesa lipa', '2023-02-10 13:43:51', NULL),
(9, '2023-02-01', 500000, 'CRDB', '2023-02-10 17:56:39', NULL),
(10, '0000-00-00', 0, 'NMB', '2023-02-10 21:47:39', NULL),
(11, '2023-02-11', 1000000, 'Cash', '2023-02-11 06:46:07', NULL),
(12, '2023-02-11', 305000, 'Tigopesa lipa', '2023-02-11 06:46:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) UNSIGNED NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `cheo` text NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `cheo`, `date_added`) VALUES
(1, 'admin', 'admin123', 'adminstrator', '2023-02-09 04:27:48'),
(2, 'kado-3', 'kado25', 'staff', '2023-02-09 15:14:42'),
(3, 'king25', '1234', 'Adminstrator', '2023-02-10 11:04:45'),
(4, 'kadoboy', '0000', 'staff', '2023-02-10 17:55:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `matengenezo`
--
ALTER TABLE `matengenezo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `odazote`
--
ALTER TABLE `odazote`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salaries`
--
ALTER TABLE `salaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salio_la_mwezi`
--
ALTER TABLE `salio_la_mwezi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `matengenezo`
--
ALTER TABLE `matengenezo`
  MODIFY `id` int(50) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `odazote`
--
ALTER TABLE `odazote`
  MODIFY `id` int(30) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `salaries`
--
ALTER TABLE `salaries`
  MODIFY `id` int(50) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `salio_la_mwezi`
--
ALTER TABLE `salio_la_mwezi`
  MODIFY `id` int(50) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
