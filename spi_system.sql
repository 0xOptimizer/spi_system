-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2021 at 09:14 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spi_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `ID` int(11) NOT NULL,
  `UserID` varchar(255) DEFAULT NULL,
  `Image` varchar(255) DEFAULT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `MiddleName` varchar(255) DEFAULT NULL,
  `LastName` varchar(255) DEFAULT NULL,
  `NameExtension` varchar(255) DEFAULT NULL,
  `DateOfBirth` varchar(255) DEFAULT NULL,
  `ContactNumber` varchar(255) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `Comment` varchar(255) DEFAULT NULL,
  `Privilege` varchar(2) DEFAULT NULL COMMENT '0 = None; 1 = Normal; 2 = Admin; 3 = Developer',
  `DateAdded` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`ID`, `UserID`, `Image`, `FirstName`, `MiddleName`, `LastName`, `NameExtension`, `DateOfBirth`, `ContactNumber`, `Address`, `Comment`, `Privilege`, `DateAdded`) VALUES
(1, '60bc6643380bb', 'uploads/60bc6643380bb/119885521_653071058972274_4010704502296133963_n.jpg', 'chiruno', '', 'borger', '', '', '', '', '', NULL, '2021-06-06 08:08:03 AM'),
(2, '60bc665d1fb9c', 'uploads/60bc665d1fb9c/23.jpg', 'test', '4', 'test', '', '', 'test', '', '', NULL, '2021-06-06 10:01:37 AM'),
(3, '60bf510d64ba8', 'uploads/60bf510d64ba8/image5.jpg', 'first', 'middle', 'last', 'name ext', '2021-06-02', '1231233', '', 'test', '2', '2021-07-13 09:14:20 AM');

-- --------------------------------------------------------

--
-- Table structure for table `employees_attendance`
--

CREATE TABLE `employees_attendance` (
  `ID` int(11) NOT NULL,
  `UserID` varchar(255) DEFAULT NULL,
  `Date` varchar(100) DEFAULT NULL,
  `Time` varchar(100) DEFAULT NULL,
  `Day` varchar(50) DEFAULT NULL,
  `LogType` tinyint(1) DEFAULT NULL COMMENT '1 = Clock In; 0 = Clock Out',
  `Comment` varchar(255) DEFAULT NULL,
  `DateAdded` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employees_attendance`
--

INSERT INTO `employees_attendance` (`ID`, `UserID`, `Date`, `Time`, `Day`, `LogType`, `Comment`, `DateAdded`) VALUES
(1, 'N/A', 'May 28, 2021', '5:53:28 PM', 'Friday', 1, 'hiasdadaaaasdaaasdxzczxcaaaaaasdad', '2021-05-28 11:53:29 AM'),
(2, 'N/A', 'May 28, 2021', '5:53:31 PM', 'Friday', 0, 'asdfgasdasdaufjdakjafiueaifuaifuflkjlzxckjasdkasla', '2021-05-28 11:53:31 AM'),
(3, 'N/A', 'May 28, 2021', '5:53:46 PM', 'Friday', 1, 'helloasdasdaaaaaaaasdaasdasdaasdasdtest', '2021-05-28 11:53:47 AM'),
(4, 'N/A', 'May 29, 2021', '5:30:47 AM', 'Saturday', 0, 'jkjhjhjjjjhkjhjkhkhjjjjjjjkasd', '2021-05-28 11:30:48 PM'),
(5, 'N/A', 'May 29, 2021', '2:57:42 PM', 'Saturday', 1, 'aa', '2021-05-29 08:57:43 AM'),
(6, 'N/A', 'May 29, 2021', '2:57:43 PM', 'Saturday', 0, 'asdadvalue', '2021-05-29 08:57:43 AM'),
(7, 'N/A', 'May 29, 2021', '2:57:43 PM', 'Saturday', 1, 'a', '2021-05-29 08:57:43 AM'),
(8, 'N/A', 'May 29, 2021', '2:57:43 PM', 'Saturday', 0, NULL, '2021-05-29 08:57:43 AM'),
(9, 'N/A', 'May 29, 2021', '2:57:43 PM', 'Saturday', 1, NULL, '2021-05-29 08:57:43 AM'),
(10, 'N/A', 'May 29, 2021', '2:57:43 PM', 'Saturday', 0, NULL, '2021-05-29 08:57:44 AM'),
(11, 'N/A', 'May 29, 2021', '2:57:44 PM', 'Saturday', 1, '<div onmousemove=\"alert(123);\">', '2021-05-29 08:57:44 AM'),
(12, 'N/A', 'May 29, 2021', '2:57:44 PM', 'Saturday', 0, 'asdasd', '2021-05-29 08:57:44 AM'),
(13, 'N/A', 'May 29, 2021', '2:57:44 PM', 'Saturday', 1, '<script type=\"text/javscript\">alert(1);</script>', '2021-05-29 08:57:44 AM'),
(14, 'N/A', 'May 29, 2021', '2:57:44 PM', 'Saturday', 0, '<b>Helasdlo</b>', '2021-05-29 08:57:44 AM'),
(15, 'N/A', 'May 29, 2021', '2:57:44 PM', 'Saturday', 1, 'asd', '2021-05-29 08:57:44 AM'),
(16, 'N/A', 'May 29, 2021', '2:57:44 PM', 'Saturday', 0, 'aaaa', '2021-05-29 08:57:45 AM'),
(17, 'N/A', 'May 29, 2021', '2:57:44 PM', 'Saturday', 1, 'asdadaaa', '2021-05-29 08:57:45 AM'),
(18, 'N/A', 'May 29, 2021', '2:57:45 PM', 'Saturday', 0, 'asdadasd', '2021-05-29 08:57:45 AM'),
(19, '60bf510d64ba8', 'Jun 16, 2021', '6:19:27 AM', 'Wednesday', 1, NULL, '2021-06-16 12:19:28 AM'),
(20, '60bf510d64ba8', 'Jun 19, 2021', '4:27:46 PM', 'Saturday', 0, NULL, '2021-06-19 10:27:46 AM'),
(21, '60bf510d64ba8', 'Jul 6, 2021', '5:19:04 AM', 'Thursday', 1, NULL, '2021-06-30 11:19:05 PM'),
(22, '60bf510d64ba8', 'Jul 6, 2021', '5:19:06 AM', 'Thursday', 0, NULL, '2021-06-30 11:19:07 PM'),
(23, '60bf510d64ba8', 'Jul 5, 2021', '7:03:28 AM', 'Thursday', 1, NULL, '2021-07-01 01:03:29 AM'),
(24, '60bf510d64ba8', 'Jul 5, 2021', '9:03:36 PM', 'Thursday', 0, NULL, '2021-07-01 01:03:36 AM'),
(25, '60bf510d64ba8', 'Jul 6, 2021', '9:08:14 PM', 'Tuesday', 1, NULL, '2021-07-06 03:08:15 PM'),
(26, '60bf510d64ba8', 'Jul 6, 2021', '11:59:33 PM', 'Tuesday', 0, NULL, '2021-07-06 05:59:33 PM'),
(27, '60bf510d64ba8', 'Jul 7, 2021', '12:53:45 AM', 'Wednesday', 1, NULL, '2021-07-06 06:53:46 PM'),
(28, '60bf510d64ba8', 'Jul 7, 2021', '12:53:45 AM', 'Wednesday', 0, NULL, '2021-07-06 06:53:46 PM'),
(29, '60bf510d64ba8', 'Jul 7, 2021', '12:53:46 AM', 'Wednesday', 1, NULL, '2021-07-06 06:53:46 PM'),
(30, '60bf510d64ba8', 'Jul 7, 2021', '12:53:54 AM', 'Wednesday', 0, NULL, '2021-07-06 06:53:54 PM');

-- --------------------------------------------------------

--
-- Table structure for table `employees_login`
--

CREATE TABLE `employees_login` (
  `ID` int(11) NOT NULL,
  `UserID` varchar(255) DEFAULT NULL,
  `LoginEmail` varchar(255) DEFAULT NULL,
  `LoginPassword` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employees_login`
--

INSERT INTO `employees_login` (`ID`, `UserID`, `LoginEmail`, `LoginPassword`) VALUES
(1, '60bf510d64ba8', 'admin', '$2y$10$wwa2SWPK1P1E.24TsBJUGu7Xn8eRBDliJkxeMMeo8QoHc1wGks7ie');

-- --------------------------------------------------------

--
-- Table structure for table `employees_login_history`
--

CREATE TABLE `employees_login_history` (
  `ID` int(11) NOT NULL,
  `UserID` varchar(255) DEFAULT NULL,
  `LoginEmail` varchar(255) DEFAULT NULL,
  `LoginPassword` varchar(255) DEFAULT NULL,
  `Agent` varchar(255) DEFAULT NULL,
  `Platform` varchar(255) DEFAULT NULL,
  `IPAddress` varchar(255) DEFAULT NULL,
  `Success` tinyint(1) DEFAULT NULL COMMENT '0 = failed; 1 = success',
  `DateAdded` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employees_login_history`
--

INSERT INTO `employees_login_history` (`ID`, `UserID`, `LoginEmail`, `LoginPassword`, `Agent`, `Platform`, `IPAddress`, `Success`, `DateAdded`) VALUES
(1, '60bf510d64ba8', 'first', 'middle', 'last', 'name ext', NULL, NULL, NULL),
(2, '60bf510d64ba8', 'first', 'middle', 'last', 'name ext', NULL, NULL, '2021-06-15 07:51:48 PM'),
(3, '60bf510d64ba8', 'first', 'middle', 'last', 'name ext', NULL, NULL, '2021-06-16 12:19:18 AM'),
(4, '60bf510d64ba8', 'first', 'middle', 'last', 'name ext', NULL, NULL, '2021-06-17 02:46:41 AM'),
(5, '60bf510d64ba8', 'first', 'middle', 'last', 'name ext', NULL, NULL, '2021-06-17 02:46:41 AM'),
(6, '60bf510d64ba8', 'asd', '1', 'Desktop: Chrome 91.0.4472.101', 'Windows 7', '::1', 1, '2021-06-17 03:07:25 AM'),
(7, '60bf510d64ba8', 'asd', '1', 'Desktop: Chrome 91.0.4472.101', 'Windows 7', '::1', 1, '2021-06-17 03:07:34 AM'),
(8, '60bf510d64ba8', 'asd', '1', 'Desktop: Chrome 91.0.4472.101', 'Windows 7', '::1', 1, '2021-06-17 03:07:34 AM'),
(9, '60bf510d64ba8', 'asd', NULL, 'Desktop: Chrome 91.0.4472.101', 'Windows 7', '::1', 1, '2021-06-17 03:10:42 AM'),
(10, NULL, 'asdad', 'asdasd', 'Desktop: Chrome 91.0.4472.101', 'Windows 7', '::1', 0, '2021-06-17 03:11:27 AM'),
(11, NULL, 'asdasdasd', 'asdasdsad', 'Desktop: Chrome 91.0.4472.101', 'Windows 7', '::1', 0, '2021-06-17 03:11:31 AM'),
(12, '60bf510d64ba8', 'asd', NULL, 'Desktop: Chrome 91.0.4472.106', 'Windows 7', '::1', 1, '2021-06-19 10:27:32 AM'),
(13, '60bf510d64ba8', 'asd', NULL, 'Desktop: Chrome 91.0.4472.106', 'Windows 7', '::1', 1, '2021-06-19 10:27:32 AM'),
(14, '60bf510d64ba8', 'asd', NULL, 'Desktop: Chrome 91.0.4472.106', 'Windows 7', '::1', 1, '2021-06-19 11:09:42 AM'),
(15, NULL, 'asd', 'asd', 'Desktop: Chrome 91.0.4472.114', 'Windows 7', '::1', 0, '2021-06-30 11:35:12 AM'),
(16, '60bf510d64ba8', 'asd', NULL, 'Desktop: Chrome 91.0.4472.114', 'Windows 7', '::1', 1, '2021-06-30 11:35:14 AM'),
(17, '60bf510d64ba8', 'asd', NULL, 'Desktop: Chrome 91.0.4472.114', 'Windows 7', '::1', 1, '2021-06-30 03:11:18 PM'),
(18, '60bf510d64ba8', 'asd', NULL, 'Desktop: Chrome 91.0.4472.114', 'Windows 7', '::1', 1, '2021-06-30 11:02:38 PM'),
(19, NULL, 'asd', '`1', 'Desktop: Chrome 91.0.4472.114', 'Windows 7', '::1', 0, '2021-07-01 06:43:03 AM'),
(20, '60bf510d64ba8', 'asd', NULL, 'Desktop: Chrome 91.0.4472.114', 'Windows 7', '::1', 1, '2021-07-01 06:43:05 AM'),
(21, '60bf510d64ba8', 'asd', NULL, 'Desktop: Chrome 91.0.4472.114', 'Windows 7', '::1', 1, '2021-07-01 12:47:21 PM'),
(22, '60bf510d64ba8', 'asd', NULL, 'Desktop: Chrome 91.0.4472.114', 'Windows 7', '::1', 1, '2021-07-03 10:52:49 AM'),
(23, '60bf510d64ba8', 'asd', NULL, 'Desktop: Chrome 91.0.4472.114', 'Windows 7', '::1', 1, '2021-07-03 02:19:29 PM'),
(24, '60bf510d64ba8', 'asd', NULL, 'Desktop: Chrome 91.0.4472.124', 'Windows 7', '::1', 1, '2021-07-04 11:03:08 AM'),
(25, '60bf510d64ba8', 'asd', NULL, 'Desktop: Chrome 91.0.4472.124', 'Windows 7', '::1', 1, '2021-07-04 11:03:08 AM'),
(26, '60bf510d64ba8', 'asd', NULL, 'Desktop: Chrome 91.0.4472.124', 'Windows 7', '::1', 1, '2021-07-06 09:38:29 AM'),
(27, '60bf510d64ba8', 'asd', NULL, 'Desktop: Chrome 91.0.4472.124', 'Windows 7', '::1', 1, '2021-07-06 09:38:29 AM'),
(28, '60bf510d64ba8', 'asd', NULL, 'Desktop: Chrome 91.0.4472.124', 'Windows 7', '::1', 1, '2021-07-06 03:07:06 PM'),
(29, '60bf510d64ba8', 'asd', NULL, 'Desktop: Chrome 91.0.4472.124', 'Windows 7', '::1', 1, '2021-07-06 05:53:38 PM'),
(30, '60bf510d64ba8', 'asd', NULL, 'Desktop: Chrome 91.0.4472.124', 'Windows 7', '::1', 1, '2021-07-08 10:08:57 AM'),
(31, NULL, 'asd', '1', 'Desktop: Chrome 91.0.4472.124', 'Windows 7', '::1', 0, '2021-07-08 01:03:48 PM'),
(32, NULL, 'asd', '1', 'Desktop: Chrome 91.0.4472.124', 'Windows 7', '::1', 0, '2021-07-08 01:03:48 PM'),
(33, '60bf510d64ba8', 'asd', NULL, 'Desktop: Chrome 91.0.4472.124', 'Windows 7', '::1', 1, '2021-07-08 01:05:10 PM'),
(34, NULL, 'asd', '1', 'Desktop: Chrome 91.0.4472.124', 'Windows 7', '::1', 0, '2021-07-09 07:07:13 AM'),
(35, NULL, 'asd', '1', 'Desktop: Chrome 91.0.4472.124', 'Windows 7', '::1', 0, '2021-07-09 07:07:14 AM'),
(36, '60bf510d64ba8', 'asd', NULL, 'Desktop: Chrome 91.0.4472.124', 'Windows 7', '::1', 1, '2021-07-09 07:07:16 AM'),
(37, '60bf510d64ba8', 'asd', NULL, 'Desktop: Chrome 91.0.4472.124', 'Windows 7', '::1', 1, '2021-07-09 07:07:16 AM'),
(38, '60bf510d64ba8', 'asd', NULL, 'Desktop: Chrome 91.0.4472.124', 'Windows 7', '::1', 1, '2021-07-10 12:38:16 AM'),
(39, '60bf510d64ba8', 'asd', NULL, 'Desktop: Chrome 91.0.4472.124', 'Windows 7', '::1', 1, '2021-07-10 12:38:16 AM'),
(40, '60bf510d64ba8', 'asd', NULL, 'Desktop: Chrome 91.0.4472.124', 'Windows 7', '::1', 1, '2021-07-10 10:39:50 AM'),
(41, '60bf510d64ba8', 'asd', NULL, 'Desktop: Chrome 91.0.4472.124', 'Windows 7', '::1', 1, '2021-07-13 09:14:07 AM'),
(42, '60bf510d64ba8', 'asd', NULL, 'Desktop: Chrome 91.0.4472.124', 'Windows 7', '::1', 1, '2021-07-13 09:14:07 AM'),
(43, '60bf510d64ba8', 'admin', NULL, 'Desktop: Chrome 91.0.4472.124', 'Windows 7', '::1', 1, '2021-07-13 09:14:27 AM');

-- --------------------------------------------------------

--
-- Table structure for table `subjects_list`
--

CREATE TABLE `subjects_list` (
  `ID` int(11) NOT NULL,
  `SubjectCode` varchar(255) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `Schedule` varchar(255) DEFAULT NULL,
  `Course` varchar(255) DEFAULT NULL,
  `Section` varchar(255) DEFAULT NULL,
  `Color` varchar(255) DEFAULT NULL,
  `Assigned` text DEFAULT NULL COMMENT 'UserID of teachers assigned',
  `Comment` varchar(255) DEFAULT NULL,
  `DateAdded` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subjects_list`
--

INSERT INTO `subjects_list` (`ID`, `SubjectCode`, `Description`, `Schedule`, `Course`, `Section`, `Color`, `Assigned`, `Comment`, `DateAdded`) VALUES
(1, 'AAA', 'AaaaaaaaAAAAAAAAAAA', 'ASDF', 'ASDF', '111', NULL, NULL, NULL, '2021-06-06 10:43:27 PM'),
(2, 'ABC123', 'Alphabets & Numbers', 'Tuesday 6:00 - 7:30 PM', 'BSCS', '801', NULL, NULL, NULL, '2021-06-08 01:16:22 PM'),
(3, 'RMN123', 'Roman Numerals', 'Wedsneday 3:00 to 6:00 PM', 'BSCS', '101', NULL, NULL, NULL, '2021-06-08 01:18:55 PM');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `employees_attendance`
--
ALTER TABLE `employees_attendance`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `employees_login`
--
ALTER TABLE `employees_login`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `employees_login_history`
--
ALTER TABLE `employees_login_history`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `subjects_list`
--
ALTER TABLE `subjects_list`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `employees_attendance`
--
ALTER TABLE `employees_attendance`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `employees_login`
--
ALTER TABLE `employees_login`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employees_login_history`
--
ALTER TABLE `employees_login_history`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `subjects_list`
--
ALTER TABLE `subjects_list`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
