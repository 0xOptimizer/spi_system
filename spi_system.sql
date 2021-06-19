-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2021 at 11:57 AM
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
(3, '60bf510d64ba8', 'uploads/60bf510d64ba8/image5.jpg', 'first', 'middle', 'last', 'name ext', '2021-06-02', '1231233', '', 'test', '2', '2021-06-09 10:31:40 PM'),
(5, '60bf51ea655f9', 'uploads/60bf51ea655f9/image4.jpg', 'joshua', 'yanag', 'santos', '', '2021-06-03', '1231231313', '', '', NULL, '2021-06-08 01:18:14 PM');

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
(20, '60bf510d64ba8', 'Jun 19, 2021', '4:27:46 PM', 'Saturday', 0, NULL, '2021-06-19 10:27:46 AM');

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
(1, '60bf510d64ba8', 'asd', '$2y$10$YjnkPt1NYiRK2wWW4WgpCud3QtLhNRhSkEXqeLs3rH.A7lz1wpOD2');

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
(14, '60bf510d64ba8', 'asd', NULL, 'Desktop: Chrome 91.0.4472.106', 'Windows 7', '::1', 1, '2021-06-19 11:09:42 AM');

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
  `Comment` varchar(255) DEFAULT NULL,
  `DateAdded` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subjects_list`
--

INSERT INTO `subjects_list` (`ID`, `SubjectCode`, `Description`, `Schedule`, `Course`, `Section`, `Comment`, `DateAdded`) VALUES
(1, 'AAA', 'AaaaaaaaAAAAAAAAAAA', 'ASDF', 'ASDF', '111', NULL, '2021-06-06 10:43:27 PM'),
(2, 'ABC123', 'Alphabets & Numbers', 'Tuesday 6:00 - 7:30 PM', 'BSCS', '801', NULL, '2021-06-08 01:16:22 PM'),
(3, 'RMN123', 'Roman Numerals', 'Wedsneday 3:00 to 6:00 PM', 'BSCS', '101', NULL, '2021-06-08 01:18:55 PM');

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `employees_login`
--
ALTER TABLE `employees_login`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employees_login_history`
--
ALTER TABLE `employees_login_history`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `subjects_list`
--
ALTER TABLE `subjects_list`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
