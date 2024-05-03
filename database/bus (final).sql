-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 19, 2024 at 06:10 AM
-- Server version: 8.0.31
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

DROP TABLE IF EXISTS `bus`;
CREATE TABLE IF NOT EXISTS `bus` (
  `id` int NOT NULL,
  `busname` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `busnumber` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
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
-- Table structure for table `chatbot`
--

DROP TABLE IF EXISTS `chatbot`;
CREATE TABLE IF NOT EXISTS `chatbot` (
  `id` int NOT NULL AUTO_INCREMENT,
  `queries` varchar(300) NOT NULL,
  `replies` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `chatbot`
--

INSERT INTO `chatbot` (`id`, `queries`, `replies`) VALUES
(1, 'Hi', 'Hello How Are You?'),
(2, 'I want to book a ticket.', 'I\'m glad, that you want to book a ticket.                              \n Step 1: first you have to enter the source and destination detail with give date.                             \n Step 2:Then after that select the bus you want to travel.');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `id` int NOT NULL AUTO_INCREMENT,
  `uid` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `number` int NOT NULL,
  `subject` varchar(20) NOT NULL,
  `message` varchar(100) NOT NULL,
  `reply` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `uid`, `name`, `email`, `number`, `subject`, `message`, `reply`) VALUES
(1, 1, 'Atish Patel', 'amzonprime393@gmail.com', 2147483647, 'Need Better Service ', 'Hello How R u?', 'good'),
(2, 7, 'Ansh', 'Ansh@email.com', 2147483647, 'very good', 'hello', '');

-- --------------------------------------------------------

--
-- Table structure for table `route`
--

DROP TABLE IF EXISTS `route`;
CREATE TABLE IF NOT EXISTS `route` (
  `id` int NOT NULL AUTO_INCREMENT,
  `busnumber` int NOT NULL,
  `busname` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `departure` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `duration` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `arrival` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `aseats` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fare` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `datee` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `route`
--

INSERT INTO `route` (`id`, `busnumber`, `busname`, `departure`, `duration`, `arrival`, `aseats`, `fare`, `datee`) VALUES
(26, 789, 'MCA Travel', 'Surat', '12:07', 'Navsari', '38', '300', '2024-04-17'),
(27, 111, 'test1', 'surat', '02:12', 'navsari', '42', '150', '2024-03-24'),
(28, 777, 'test', 'surat', '01:00', 'navsari', '50', '200', '2024-03-21'),
(29, 999, 'ddd', 'surat', '12:07', 'navsari', '46', '300', '2024-03-31');

-- --------------------------------------------------------

--
-- Table structure for table `seats`
--

DROP TABLE IF EXISTS `seats`;
CREATE TABLE IF NOT EXISTS `seats` (
  `busnumber` varchar(155) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `seat_booked` varchar(155) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

DROP TABLE IF EXISTS `tbladmin`;
CREATE TABLE IF NOT EXISTS `tbladmin` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `AdminName` char(50) DEFAULT NULL,
  `UserName` char(50) DEFAULT NULL,
  `MobileNumber` bigint DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
(1, 'test', 'admin', 1357245424, 'adminbp@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2019-07-25 06:21:50');

-- --------------------------------------------------------

--
-- Table structure for table `tblappointment`
--

DROP TABLE IF EXISTS `tblappointment`;
CREATE TABLE IF NOT EXISTS `tblappointment` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `AptNumber` varchar(80) DEFAULT NULL,
  `Name` varchar(120) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `PhoneNumber` bigint DEFAULT NULL,
  `AptDate` varchar(120) DEFAULT NULL,
  `AptTime` varchar(120) DEFAULT NULL,
  `Services` varchar(120) DEFAULT NULL,
  `ApplyDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Remark` varchar(250) NOT NULL,
  `Status` varchar(50) NOT NULL,
  `RemarkDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblappointment`
--

INSERT INTO `tblappointment` (`ID`, `AptNumber`, `Name`, `Email`, `PhoneNumber`, `AptDate`, `AptTime`, `Services`, `ApplyDate`, `Remark`, `Status`, `RemarkDate`) VALUES
(1, '261064124', 'Tomal', 'komal@gmail.com', 1798797897, '7/27/2019', '4:00pm', '1', '2019-07-26 04:48:25', 'Accepted', '1', '2019-11-23 03:11:06'),
(2, '985645887', 'Ashish', 'Kash@gmail.com', 1654654654, '7/29/2019', '4:30pm', 'Deluxe Pedicure', '2019-07-26 05:04:38', 'Rejected', '2', '2019-11-23 03:11:01'),
(3, '965887988', 'Sangeeta', 'san@gmail.com', 1646464646, '8/20/2019', '2:30pm', 'Loreal Hair Color(Full)', '2019-08-19 12:35:30', 'we will wait', '1', '2019-11-22 09:45:40'),
(4, '578797544', 'Anjuman', 'phpgurukulofficial@gmail.com', 123456789, '8/30/2019', '1:30am', 'Test', '2019-08-21 16:13:13', '', '', '2019-11-23 03:11:24'),
(5, '899118550', 'Badal', 'bgfdh@fdfdsf.com', 1234235423, '8/27/2019', '1:30am', 'Loreal Hair Color(Full)', '2019-08-21 16:14:14', '', '', '2019-11-23 03:14:43'),
(6, '621107928', 'Arman', 'abc@gmail.com', 1234567890, '8/27/2019', '1:30am', 'Rebonding', '2019-08-21 16:22:25', 'Testing', '2', '2019-11-23 03:14:49'),
(7, '437812041', 'Parvez', 'parvez@gmail.com', 124355444, '11/27/2019', '12:30am', 'Hair removal (Men)', '2019-11-23 03:29:19', '', '', '2019-11-23 03:29:34');

-- --------------------------------------------------------

--
-- Table structure for table `tblcustomers`
--

DROP TABLE IF EXISTS `tblcustomers`;
CREATE TABLE IF NOT EXISTS `tblcustomers` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(120) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint DEFAULT NULL,
  `Gender` enum('Female','Male','Transgender') DEFAULT NULL,
  `Details` mediumtext,
  `CreationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcustomers`
--

INSERT INTO `tblcustomers` (`ID`, `Name`, `Email`, `MobileNumber`, `Gender`, `Details`, `CreationDate`, `UpdationDate`) VALUES
(1, 'Sunita Islam', 'sislam@gmail.com', 1546464646, 'Female', 'Taking Hair Spa', '2019-07-26 11:09:10', '2019-11-22 09:43:40'),
(2, 'MD. Rahul ', 'ruhul@gmail.com', 1565565656, 'Male', 'Taken haircut by him', '2019-07-26 11:10:02', '2019-11-22 09:43:29'),
(3, 'Khusbu', 'kh123@gmail.com', 1946445464, 'Female', 'Bru Pluck', '2019-07-26 11:10:28', '2019-11-22 09:43:52'),
(4, 'Sangeeta ', 'san@gmail.com', 1646464646, 'Female', 'Taking Body Spa', '2019-08-19 13:38:58', '2019-11-22 09:41:36'),
(5, 'Sanjida', 'sanjida1@gmail.com', 1234567890, 'Female', 'Haircut', '2019-08-21 16:24:53', '2019-11-22 09:41:53');

-- --------------------------------------------------------

--
-- Table structure for table `tblinvoice`
--

DROP TABLE IF EXISTS `tblinvoice`;
CREATE TABLE IF NOT EXISTS `tblinvoice` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Userid` int DEFAULT NULL,
  `ServiceId` int DEFAULT NULL,
  `BillingId` int DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblinvoice`
--

INSERT INTO `tblinvoice` (`id`, `Userid`, `ServiceId`, `BillingId`, `PostingDate`) VALUES
(1, 2, 2, 621839533, '2019-07-30 15:33:22'),
(2, 2, 5, 621839533, '2019-06-04 15:33:22'),
(3, 2, 6, 621839533, '2019-07-30 15:33:22'),
(4, 2, 7, 621839533, '2019-07-30 15:33:22'),
(5, 1, 1, 904156433, '2019-07-30 15:40:42'),
(6, 1, 2, 904156433, '2019-07-30 15:40:42'),
(7, 1, 3, 904156433, '2019-07-30 15:40:42'),
(8, 1, 4, 904156433, '2019-07-30 15:40:42'),
(9, 3, 1, 225057023, '2019-07-30 16:03:32'),
(10, 3, 8, 225057023, '2019-07-30 16:03:32'),
(11, 3, 1, 970548035, '2019-07-31 04:42:45'),
(12, 3, 6, 970548035, '2019-07-31 04:42:45'),
(13, 3, 9, 970548035, '2019-07-31 04:42:45'),
(14, 4, 2, 942476283, '2019-08-19 13:39:13'),
(15, 4, 12, 942476283, '2019-08-19 13:39:13'),
(16, 5, 3, 297018570, '2019-08-21 16:25:27'),
(17, 5, 4, 297018570, '2019-08-21 16:25:27'),
(18, 5, 8, 297018570, '2019-08-21 16:25:27');

-- --------------------------------------------------------

--
-- Table structure for table `tblpage`
--

DROP TABLE IF EXISTS `tblpage`;
CREATE TABLE IF NOT EXISTS `tblpage` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `PageType` varchar(200) DEFAULT NULL,
  `PageTitle` mediumtext,
  `PageDescription` mediumtext,
  `Email` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint DEFAULT NULL,
  `UpdationDate` date DEFAULT NULL,
  `Timing` varchar(200) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpage`
--

INSERT INTO `tblpage` (`ID`, `PageType`, `PageTitle`, `PageDescription`, `Email`, `MobileNumber`, `UpdationDate`, `Timing`) VALUES
(1, 'aboutus', 'About Us', '        Our main focus is on quality and hygiene. Our Parlour is well equipped with advanced technology equipments and provides best quality services. Our staff is well trained and experienced, offering advanced services in Skin, Hair and Body Shaping that will provide you with a luxurious experience that leave you feeling relaxed and stress free. The specialities in the parlour are, apart from regular bleachings and Facials, many types of hairstyles, Bridal and cine make-up and different types of Facials &amp; fashion hair colourings.', 'bpms@admin.com', 25656546, NULL, ''),
(2, 'contactus', 'Contact Us', 'UIU, Satarkul, Dhaka-1212', 'bpms@admin.com', 1723465141, NULL, '10:30 am to 7:30 pm');

-- --------------------------------------------------------

--
-- Table structure for table `tblservices`
--

DROP TABLE IF EXISTS `tblservices`;
CREATE TABLE IF NOT EXISTS `tblservices` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `ServiceName` varchar(200) DEFAULT NULL,
  `Cost` int DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblservices`
--

INSERT INTO `tblservices` (`ID`, `ServiceName`, `Cost`, `CreationDate`) VALUES
(1, 'O3 Facial (Women)', 1200, '2019-07-25 11:22:38'),
(2, 'Fruit Facial (Women)', 500, '2019-07-25 11:22:53'),
(3, 'Charcol Facial (Women)', 1000, '2019-07-25 11:23:10'),
(4, 'Deluxe Menicure (Women)', 500, '2019-07-25 11:23:34'),
(5, 'Deluxe Pedicure (Women)', 600, '2019-07-25 11:23:47'),
(6, 'Normal Menicure (Women)', 300, '2019-07-25 11:24:01'),
(7, 'Normal Pedicure (Women)', 400, '2019-07-25 11:24:19'),
(8, 'U-Shape Hair Cut (Men)', 250, '2019-07-25 11:24:38'),
(9, 'Layer Haircut (Men)', 550, '2019-07-25 11:24:53'),
(10, 'Rebonding (Men)', 3999, '2019-07-25 11:25:08'),
(11, 'Loreal Hair Color(Men Full)', 1200, '2019-07-25 11:25:35'),
(12, 'Shaving (Men)', 1500, '2019-08-19 13:36:27'),
(14, 'Skin Care (Men)', 100, '2019-08-21 15:45:50'),
(15, 'Hair removal (Men)', 200, '2019-08-21 16:23:23');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

DROP TABLE IF EXISTS `ticket`;
CREATE TABLE IF NOT EXISTS `ticket` (
  `id` int NOT NULL AUTO_INCREMENT,
  `uid` int NOT NULL,
  `pname` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `busnumber` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `busname` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date` date NOT NULL,
  `departure` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `duration` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `arrival` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `seat` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fare` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pay` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `bus_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=205 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`id`, `uid`, `pname`, `busnumber`, `busname`, `date`, `departure`, `duration`, `arrival`, `seat`, `fare`, `pay`, `bus_id`) VALUES
(164, 1, 'Atish Patel', '789', 'MCA Travel', '2023-08-28', 'Surat', '12:07', 'Navsari', 'A1,A2,A12', '900.00', 'Cash', 26),
(165, 1, 'ansh', '789', 'MCA Travel', '2023-08-28', 'Surat', '12:07', 'Navsari', 'A3', '300.00', 'Cash', 26),
(166, 1, 'karan', '789', 'MCA Travel', '2023-08-28', 'Surat', '12:07', 'Navsari', 'A4', '300.00', 'Cash', 26),
(167, 1, 'karan', '789', 'MCA Travel', '2023-08-28', 'Surat', '12:07', 'Navsari', 'A16', '300.00', 'select', 26),
(168, 1, 'ansh', '789', 'MCA Travel', '2023-08-28', 'Surat', '12:07', 'Navsari', 'A5,A6,A32,A34', '1200.00', 'select', 26),
(170, 1, 'daksh', '789', 'MCA Travel', '2023-08-30', 'Surat', '12:07', 'Navsari', 'A30', '300.00', 'Cash', 26),
(171, 1, 'keyur', '789', 'MCA Travel', '2023-08-30', 'Surat', '12:07', 'Navsari', 'A35', '300.00', 'select', 26),
(188, 1, 'ansh p patel', '789', 'MCA Travel', '2024-04-17', 'Surat', '12:07', 'Navsari', 'A17', '300.00', 'Cash', 26),
(189, 1, 'karan', '789', 'MCA Travel', '2024-04-17', 'Surat', '12:07', 'Navsari', 'A7', '300.00', 'Cash', 26),
(190, 1, 'ansh', '789', 'MCA Travel', '2024-04-17', 'Surat', '12:07', 'Navsari', 'A41,A42,A46,A47', '1200.00', 'Cash', 26),
(192, 17, 'abc', '111', 'test1', '2024-03-24', 'surat', '02:12', 'navsari', 'A8', '150.00', 'Net Banking', 27),
(193, 17, 'dgf', '111', 'test1', '2024-03-24', 'surat', '02:12', 'navsari', 'A14', '150.00', 'select', 27),
(194, 17, 'dgf', '111', 'test1', '2024-03-24', 'surat', '02:12', 'navsari', 'A37', '150.00', 'Cash', 27),
(198, 17, 'test', '111', 'test1', '2024-03-24', 'surat', '02:12', 'navsari', 'A1', '150.00', 'Net Banking', 27),
(199, 17, 'ansh', '111', 'test1', '2024-03-24', 'surat', '02:12', 'navsari', 'A2,A3,A6,A7', '600.00', 'Net Banking', 27),
(200, 1, 'daksh', '111', 'test1', '2024-03-24', 'surat', '02:12', 'navsari', 'A4', '150.00', 'Net Banking', 27),
(201, 7, 'test', '999', 'ddd', '2024-03-31', 'surat', '12:07', 'navsari', 'A1', '300.00', 'Cash', 29),
(202, 7, 'test', '999', 'ddd', '2024-03-31', 'surat', '12:07', 'navsari', 'A2', '300.00', 'Cash', 29),
(203, 7, 'test', '999', 'ddd', '2024-03-31', 'surat', '12:07', 'navsari', 'A3', '300.00', 'Cash', 29),
(204, 7, 'test', '999', 'ddd', '2024-03-31', 'surat', '12:07', 'navsari', 'A4', '300.00', 'Cash', 29);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `username`, `password`, `created_at`) VALUES
(4, 'Atish Patel', '7410852200', 'A30', '123', NULL),
(16, 'Daksh', '7410852963', 'Daku', 'Daksh123', NULL),
(17, 'Ansh', '8401143865', 'Ansh', '123', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `userss`
--

DROP TABLE IF EXISTS `userss`;
CREATE TABLE IF NOT EXISTS `userss` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `dob` date DEFAULT NULL,
  `image` varchar(60) DEFAULT NULL,
  `address` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `city` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `state` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `pincode` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `userss`
--

INSERT INTO `userss` (`id`, `name`, `username`, `password`, `dob`, `image`, `address`, `city`, `state`, `pincode`, `created_at`) VALUES
(1, 'Daksh Patel', 'a30', '123', '2023-03-01', 'Atish Patel.jpeg', '16  floor-4,navsari,gujrat', 'NAVSARI ', 'Gujarat', '396450  ', '2023-08-23 00:00:00'),
(2, 'Pravin', 'PKK', '@30Patel', '2023-07-31', 'Pravin - 2023.08.17 - 06.15.37am.jpg', '16  floor-4,navsari,gujrat', 'NAVSARI               ', 'Gujarat', '396450                              ', '2023-08-16 00:00:00'),
(4, 'mohit', 'mohit', 'Mohit@123', NULL, 'final.jpg', NULL, NULL, NULL, NULL, '2023-08-30 07:46:41'),
(5, 'Abhay', 'abhay', '$2y$10$xiu5vqe.RmY3n', NULL, '44.jpg', NULL, NULL, NULL, NULL, '2023-11-06 09:25:17'),
(7, 'Ansh', 'Ansh', 'Ansh@123', NULL, 'Ansh.jpeg', NULL, NULL, NULL, NULL, '2024-03-02 10:12:08'),
(8, 'sudhir pal', 'sudhir', '$2y$10$1o813D245NKH8', NULL, 'images (3).jpeg', NULL, NULL, NULL, NULL, '2024-03-09 13:32:02'),
(9, 'Neha', 'Neh01', '$2y$10$9GBblKRkfAml6', NULL, 'images (3).jpeg', NULL, NULL, NULL, NULL, '2024-03-09 13:34:03'),
(14, 'test', 'test', 'Test@123', NULL, 'images (3).jpeg', NULL, NULL, NULL, NULL, '2024-03-09 22:33:17');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
