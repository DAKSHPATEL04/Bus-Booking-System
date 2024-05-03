-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3305
-- Generation Time: Jul 10, 2023 at 06:31 AM
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
-- Database: `bus`
--

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

CREATE TABLE `bus` (
  `id` int(11) NOT NULL,
  `busname` varchar(20) NOT NULL,
  `busnumber` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`id`, `busname`, `busnumber`) VALUES
(1, 'Raj Travel', '0001'),
(2, 'Atish Travel', '0002'),
(3, 'Prince Travel', '0003');

-- --------------------------------------------------------

--
-- Table structure for table `route`
--

CREATE TABLE `route` (
  `id` int(11) NOT NULL,
  `busnumber` int(11) NOT NULL,
  `busname` varchar(20) NOT NULL,
  `departure` varchar(20) NOT NULL,
  `duration` varchar(20) NOT NULL,
  `arrival` varchar(20) NOT NULL,
  `aseats` varchar(20) NOT NULL,
  `fare` varchar(20) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `route`
--

INSERT INTO `route` (`id`, `busnumber`, `busname`, `departure`, `duration`, `arrival`, `aseats`, `fare`, `date`) VALUES
(8, 101, 'Raj Travel', 'Surat', '12:00', 'Navsari', '15', '400', '2022-04-06'),
(12, 102, 'Pk Travel', 'Surat', '17:05', 'Navsari', '10', '500', '2022-04-07'),
(14, 103, 'Shreenath Travels', 'Navsari', '17:00', 'Mumbai', '20', '850', '2022-04-07'),
(15, 104, 'Gujarat Travels', 'Surat', '07:30', 'Amerli', '20', '1000', '2022-04-08'),
(16, 105, 'Rama Travels', 'Vapi', '14:05', 'Bardoli', '15', '580', '2022-04-06'),
(17, 106, 'Air Bus', 'Daman', '08:50', 'Surat', '20', '500', '2022-04-06'),
(18, 102, 'Atish travel', 'Navsari', '20:44', 'Surat', '20', '300', '2023-02-03'),
(19, 109, '62698', 'Navsari', '08:57', 'Surat', '15', '400', '2023-02-03'),
(20, 110, 'Atish travel', 'Navsari', '14:00', 'Surat', '15', '200', '2023-03-02'),
(21, 111, 'Bca', 'Navsari', '08:05', 'Surat', '15', '400', '2023-02-04');

-- --------------------------------------------------------

--
-- Table structure for table `seats`
--

CREATE TABLE `seats` (
  `busnumber` varchar(155) NOT NULL,
  `seat_booked` varchar(155) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `pname` varchar(20) NOT NULL,
  `busnumber` varchar(20) NOT NULL,
  `busname` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `departure` varchar(20) NOT NULL,
  `duration` varchar(20) NOT NULL,
  `arrival` varchar(20) NOT NULL,
  `seat` varchar(20) NOT NULL,
  `fare` varchar(20) NOT NULL,
  `pay` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`id`, `uid`, `pname`, `busnumber`, `busname`, `date`, `departure`, `duration`, `arrival`, `seat`, `fare`, `pay`) VALUES
(134, 4, 'Atish', '101', 'Raj Travel', '2022-04-06', 'Surat', '12:00', 'Navsari', '3', '600', 'Net Banking'),
(136, 4, 'DakshPatel', '101', 'Raj Travel', '2022-04-06', 'Surat', '12:00', 'Navsari', '4', '800', 'Cash');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `username` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `username`, `password`, `created_at`) VALUES
(2, 'Prince Leuva', '8160882816', 'pkk', 'Prince12', NULL),
(4, 'Atish Patel', '7410852200', 'A30', '123', NULL),
(13, 'Pravin', '7894561230', 'Pravin', '123', NULL),
(15, 'krish', '7894561230', 'krish', 'Atish30', NULL),
(16, 'Daksh', '7410852963', 'dkk', 'Daksh123', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `userss`
--

CREATE TABLE `userss` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `dob` date DEFAULT NULL,
  `img` blob NOT NULL,
  `address` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `pincode` varchar(50) DEFAULT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userss`
--

INSERT INTO `userss` (`id`, `name`, `username`, `password`, `dob`, `img`, `address`, `city`, `state`, `pincode`, `created_at`) VALUES
(4, 'Atish Patel', 'A30', '1234', '2001-06-17', '', '16 Ashok nagar, Eru char rasth ,vijalpore', 'NAVSARI', 'Gujarat', '396450', '2022-03-15'),
(5, 'prince', 'prince', 'Atish30', NULL, '', NULL, NULL, NULL, NULL, '2022-03-15'),
(7, 'Pravin', 'pravin', 'Pravin12', NULL, '', NULL, NULL, NULL, NULL, '2022-03-24'),
(8, 'Keyur', 'kk', '123', NULL, '', NULL, NULL, NULL, NULL, '2022-03-24'),
(9, 'Daksh', 'dk', '123', NULL, '', NULL, NULL, NULL, NULL, '2022-03-24'),
(10, 'mihir', 'mi', '1234', NULL, '', NULL, NULL, NULL, NULL, '2022-03-24'),
(11, 'Raja', 'rj', '1234', NULL, '', NULL, NULL, NULL, NULL, '2022-03-26'),
(12, 'kumble', 'jumbo', '12345', NULL, '', NULL, NULL, NULL, NULL, '2022-03-30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `route`
--
ALTER TABLE `route`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seats`
--
ALTER TABLE `seats`
  ADD PRIMARY KEY (`busnumber`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userss`
--
ALTER TABLE `userss`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bus`
--
ALTER TABLE `bus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `route`
--
ALTER TABLE `route`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `userss`
--
ALTER TABLE `userss`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
