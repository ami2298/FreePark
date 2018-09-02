-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2018 at 10:25 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `parking`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'Amit@143');

-- --------------------------------------------------------

--
-- Table structure for table `parkinguser`
--

CREATE TABLE `parkinguser` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `moodle` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `parkinguser`
--

INSERT INTO `parkinguser` (`id`, `first_name`, `last_name`, `moodle`, `password`, `phone`, `created`, `modified`, `status`) VALUES
(4, 'Amit', 'Prajapati', '15104014', 'c40cb7a4e8412fe48b4e432d020728bf', '9923874104', '2018-03-29 06:42:28', '2018-03-29 06:42:28', '1'),
(5, 'Amit', 'Prajapati', '15104014', 'c40cb7a4e8412fe48b4e432d020728bf', '9923874104', '2018-03-29 06:48:55', '2018-03-29 06:48:55', '1'),
(6, 'Amisha', 'Karia', '15104008', 'e10adc3949ba59abbe56e057f20f883e', '8681248531', '2018-03-29 07:31:31', '2018-03-29 07:31:31', '1'),
(7, 'Lavina ', 'Budhwani', '16204019', '25f9e794323b453885f5181f1b624d0b', '9765558727', '2018-03-30 08:56:47', '2018-03-30 08:56:47', '1'),
(8, 'Abhishek ', 'Prajapati', '15104010', 'e10adc3949ba59abbe56e057f20f883e', '9022501810', '2018-04-12 05:52:45', '2018-04-12 05:52:45', '1'),
(9, 'Suman', 'Prajapati', '15104015', 'c40cb7a4e8412fe48b4e432d020728bf', '9765558727', '2018-04-12 06:01:52', '2018-04-12 06:01:52', '1'),
(10, 'Amit', 'Prajapati', '15104020', 'c40cb7a4e8412fe48b4e432d020728bf', '8899665544', '2018-04-12 06:08:59', '2018-04-12 06:08:59', '1');

-- --------------------------------------------------------

--
-- Table structure for table `plot_detail`
--

CREATE TABLE `plot_detail` (
  `plot_id` int(11) NOT NULL,
  `plotname` varchar(200) NOT NULL,
  `area` varchar(20) NOT NULL,
  `moodle_id` varchar(20) NOT NULL DEFAULT 'Not Booked',
  `student_name` varchar(50) NOT NULL DEFAULT 'Not Booked',
  `fromtime` varchar(20) NOT NULL DEFAULT 'Not Set',
  `totime` varchar(20) NOT NULL DEFAULT 'Not Set',
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plot_detail`
--

INSERT INTO `plot_detail` (`plot_id`, `plotname`, `area`, `moodle_id`, `student_name`, `fromtime`, `totime`, `status`) VALUES
(1, 'parking', 'Flagarea', 'No User', 'No User', 'Not Set', 'Not Set', 'Available'),
(2, 'Plot_1', 'Flagarea', 'No User', 'No User', 'Not Set', 'Not Set', 'Available'),
(4, 'Plot', 'Flagarea', 'No User', 'No User', 'Not Set', 'Not Set', 'Available'),
(5, 'Plot', '5', 'No User', 'No User', 'Not Set', 'Not Set', 'Available'),
(6, 'Plot_1', 'Flagarea', 'No User', 'No User', 'Not Set', 'Not Set', 'Available'),
(7, 'Plot', '5', 'No User', 'No User', 'Not Set', 'Not Set', 'Available'),
(8, ', ,m ,', 'Flagarea', 'No User', 'No User', 'Not Set', 'Not Set', 'Available');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `parkinguser`
--
ALTER TABLE `parkinguser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plot_detail`
--
ALTER TABLE `plot_detail`
  ADD PRIMARY KEY (`plot_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `parkinguser`
--
ALTER TABLE `parkinguser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `plot_detail`
--
ALTER TABLE `plot_detail`
  MODIFY `plot_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
