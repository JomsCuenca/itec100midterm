-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2021 at 10:33 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `itec100db`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `ActivityID` int(11) NOT NULL,
  `Activity_UserID` int(255) NOT NULL,
  `Activity` varchar(255) NOT NULL,
  `Activity_Date` varchar(255) NOT NULL,
  `Activity_Time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`ActivityID`, `Activity_UserID`, `Activity`, `Activity_Date`, `Activity_Time`) VALUES
(52, 2, 'Change Password Attempt', '04-26-2021', '12:39:07 pm'),
(53, 2, 'Change Password Attempt', '04-26-2021', '12:39:46 pm'),
(54, 2, 'Change Password Success', '04-26-2021', '12:40:54 pm'),
(55, 3, 'Login Attempt', '04-26-2021', '12:45:31 pm'),
(56, 3, 'Login Success', '04-26-2021', '12:45:41 pm'),
(57, 3, 'Logout', '04-26-2021', '01:26:19 pm'),
(58, 5, 'Login Attempt', '04-26-2021', '01:34:51 pm'),
(59, 5, 'Login Success', '04-26-2021', '01:34:58 pm'),
(60, 5, 'Logout', '04-26-2021', '01:41:27 pm'),
(61, 2, 'Change Password Attempt', '04-26-2021', '01:41:45 pm'),
(62, 2, 'Change Password Success', '04-26-2021', '01:42:23 pm'),
(63, 2, 'Login Attempt', '04-26-2021', '01:42:37 pm'),
(64, 2, 'Login Success', '04-26-2021', '01:42:44 pm'),
(65, 2, 'Logout', '04-26-2021', '01:55:11 pm'),
(66, 1, 'Login Attempt', '04-26-2021', '01:55:20 pm'),
(67, 1, 'Login Success', '04-26-2021', '01:55:27 pm'),
(68, 1, 'Logout', '04-26-2021', '01:56:27 pm'),
(69, 1, 'Login Attempt', '04-26-2021', '02:25:19 pm'),
(70, 1, 'Login Success', '04-26-2021', '02:25:30 pm'),
(71, 1, 'Logout', '04-26-2021', '02:26:38 pm'),
(72, 1, 'Login Attempt', '04-26-2021', '02:27:52 pm'),
(73, 1, 'Login Success', '04-26-2021', '02:28:57 pm'),
(74, 1, 'Logout', '04-26-2021', '02:30:14 pm'),
(75, 2, 'Change Password Attempt', '04-26-2021', '02:31:14 pm'),
(76, 1, 'Login Attempt', '04-26-2021', '02:32:31 pm'),
(77, 1, 'Login Success', '04-26-2021', '02:33:10 pm'),
(78, 1, 'Logout', '04-26-2021', '02:34:20 pm'),
(79, 2, 'Login Attempt', '04-26-2021', '02:35:19 pm'),
(80, 2, 'Login Success', '04-26-2021', '02:36:58 pm'),
(81, 2, 'Logout', '04-26-2021', '02:47:19 pm'),
(82, 1, 'Login Attempt', '04-26-2021', '02:49:50 pm'),
(83, 1, 'Login Success', '04-26-2021', '02:50:36 pm'),
(84, 1, 'Logout', '04-26-2021', '02:51:48 pm'),
(85, 2, 'Login Attempt', '04-26-2021', '02:53:08 pm'),
(86, 2, 'Login Success', '04-26-2021', '02:53:47 pm'),
(87, 2, 'Logout', '04-26-2021', '02:55:16 pm'),
(88, 2, 'Change Password Attempt', '04-26-2021', '02:55:40 pm'),
(89, 2, 'Change Password Success', '04-26-2021', '02:56:45 pm'),
(90, 2, 'Login Attempt', '04-26-2021', '02:57:55 pm'),
(91, 1, 'Login Attempt', '04-26-2021', '03:00:28 pm'),
(92, 1, 'Login Success', '04-26-2021', '03:00:37 pm'),
(93, 1, 'Logout', '04-26-2021', '03:02:51 pm');

-- --------------------------------------------------------

--
-- Table structure for table `codetable`
--

CREATE TABLE `codetable` (
  `ID` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Code` int(6) NOT NULL,
  `Date` varchar(20) NOT NULL,
  `TimeIssued` varchar(20) NOT NULL,
  `TimeExpires` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `codetable`
--

INSERT INTO `codetable` (`ID`, `Username`, `Code`, `Date`, `TimeIssued`, `TimeExpires`) VALUES
(1, 'ADMIN', 252857, '03-22-2021', '01:30:49 pm', '01:31:49 pm'),
(2, 'ADMIN', 603979, '03-22-2021', '01:32:00 pm', '01:33:00 pm'),
(3, 'ADMIN', 736180, '03-22-2021', '01:32:38 pm', '01:33:38 pm'),
(4, 'ADMIN', 245177, '03-22-2021', '01:50:10 pm', '01:55:10 pm'),
(5, 'ADMIN', 453470, '03-22-2021', '01:52:13 pm', '01:57:13 pm'),
(6, 'ADMIN', 694433, '03-22-2021', '02:01:57 pm', '02:06:57 pm'),
(7, 'ADMIN', 747867, '03-22-2021', '02:07:59 pm', '02:08:59 pm'),
(8, 'ADMIN', 368936, '03-22-2021', '02:16:39 pm', '02:21:39 pm'),
(9, 'ADMIN', 701900, '03-22-2021', '02:18:16 pm', '02:23:16 pm'),
(10, 'ADMIN', 122572, '03-22-2021', '02:27:09 pm', '02:32:09 pm'),
(11, 'ADMIN', 961310, '03-22-2021', '02:28:29 pm', '02:33:29 pm'),
(12, 'ADMIN', 135579, '03-22-2021', '02:34:48 pm', '02:35:48 pm'),
(13, 'ADMIN', 509014, '03-22-2021', '02:36:53 pm', '02:41:53 pm'),
(14, 'ADMIN', 839452, '04-25-2021', '05:49:45 pm', '05:54:45 pm'),
(15, 'ADMIN', 886760, '04-25-2021', '05:58:05 pm', '06:03:05 pm'),
(16, 'ADMIN', 996536, '04-25-2021', '06:07:31 pm', '06:12:31 pm'),
(17, 'ADMIN', 544920, '04-25-2021', '06:09:28 pm', '06:14:28 pm'),
(18, 'ADMIN', 290549, '04-25-2021', '06:29:49 pm', '06:34:49 pm'),
(19, 'ADMIN', 824994, '04-25-2021', '06:31:45 pm', '06:36:45 pm'),
(20, 'ADMIN', 168622, '04-25-2021', '06:33:27 pm', '06:38:27 pm'),
(21, 'ADMIN', 213909, '04-25-2021', '06:42:20 pm', '06:47:20 pm'),
(22, 'ADMIN', 655632, '04-25-2021', '06:56:25 pm', '07:01:25 pm'),
(23, 'ADMIN', 359746, '04-25-2021', '07:01:29 pm', '07:06:29 pm'),
(24, 'ADMIN', 402014, '04-25-2021', '08:28:48 pm', '08:33:48 pm'),
(25, 'ADMIN', 558537, '04-25-2021', '08:30:13 pm', '08:35:13 pm'),
(26, 'ADMIN', 381744, '04-25-2021', '10:34:23 pm', '10:39:23 pm'),
(27, 'ADMIN', 679828, '04-26-2021', '12:02:07 am', '12:07:07 am'),
(28, 'ADMIN', 622570, '04-26-2021', '12:05:02 am', '12:10:02 am'),
(29, 'ADMIN', 254211, '04-26-2021', '12:22:49 am', '12:27:49 am'),
(30, 'joms', 144818, '04-26-2021', '12:29:02 am', '12:34:02 am'),
(31, 'joms', 205465, '04-26-2021', '12:36:07 am', '12:41:07 am'),
(32, 'ADMIN', 179229, '04-26-2021', '01:34:55 am', '01:39:55 am'),
(33, 'smoj', 655634, '04-26-2021', '01:45:05 am', '01:50:05 am'),
(34, 'cuencs', 810723, '04-26-2021', '01:46:44 am', '01:51:44 am'),
(35, 'ADMIN', 899864, '04-26-2021', '01:48:12 am', '01:53:12 am'),
(36, 'smoj', 733432, '04-26-2021', '12:45:31 pm', '12:50:31 pm'),
(37, 'JohnDoe', 321068, '04-26-2021', '01:34:51 pm', '01:39:51 pm'),
(38, 'joms', 640638, '04-26-2021', '01:42:37 pm', '01:47:37 pm'),
(39, 'ADMIN', 191594, '04-26-2021', '01:55:20 pm', '02:00:20 pm'),
(40, 'ADMIN', 174602, '04-26-2021', '02:25:19 pm', '02:30:19 pm'),
(41, 'ADMIN', 279112, '04-26-2021', '02:27:52 pm', '02:32:52 pm'),
(42, 'ADMIN', 920048, '04-26-2021', '02:32:31 pm', '02:37:31 pm'),
(43, 'joms', 281748, '04-26-2021', '02:35:19 pm', '02:40:19 pm'),
(44, 'ADMIN', 417916, '04-26-2021', '02:49:50 pm', '02:54:50 pm'),
(45, 'joms', 859150, '04-26-2021', '02:53:08 pm', '02:58:08 pm'),
(46, 'joms', 307671, '04-26-2021', '02:57:55 pm', '03:02:55 pm'),
(47, 'ADMIN', 131262, '04-26-2021', '03:00:28 pm', '03:05:28 pm');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `UserID` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`UserID`, `Username`, `Email`, `Password`) VALUES
(1, 'ADMIN', 'admin@gmail.com', 'ADMIN123'),
(2, 'joms', 'joms@gmail.com', 'Jomspassword123@'),
(3, 'smoj', 'smoj@gmail.com', 'Smoj123!'),
(4, 'cuencs', 'cuenca@yahoo.com', 'Cuencs123@'),
(5, 'JohnDoe', 'johndoe@email.com', 'Johndoe123!');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`ActivityID`);

--
-- Indexes for table `codetable`
--
ALTER TABLE `codetable`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `ActivityID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `codetable`
--
ALTER TABLE `codetable`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
