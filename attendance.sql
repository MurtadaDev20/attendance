-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2023 at 12:11 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attendance`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Email` varchar(150) NOT NULL,
  `Password` int(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `Username`, `Email`, `Password`) VALUES
(1, 'Murtada', 'Murtada@gmail.com', 1212);

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Date` date NOT NULL DEFAULT current_timestamp(),
  `today` varchar(200) NOT NULL,
  `time` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `emp_id`, `Name`, `Date`, `today`, `time`) VALUES
(28, 56, 'محمد يوسف', '2023-03-10', '', '21:17:12'),
(30, 53, 'مرتضى', '2023-03-10', '', '21:17:29'),
(43, 57, 'سعدون محمد', '2023-03-10', '', '10:08:01 PM'),
(44, 57, 'سعدون محمد', '2023-03-10', '', '10:08:05 PM'),
(45, 57, 'سعدون محمد', '2023-03-10', '', '10:08:10 PM'),
(46, 57, 'سعدون محمد', '2023-03-10', '', '10:08:15 PM'),
(47, 56, 'محمد يوسف', '2023-03-10', '', '10:08:23 PM'),
(48, 56, 'محمد يوسف', '2023-03-10', '', '10:08:27 PM'),
(49, 56, 'محمد يوسف', '2023-03-10', '', '10:08:29 PM'),
(50, 56, 'محمد يوسف', '2023-03-10', '', '10:08:34 PM'),
(51, 55, 'سجاد', '2023-03-10', '', '10:08:46 PM'),
(52, 55, 'سجاد', '2023-03-10', '', '10:08:50 PM'),
(53, 55, 'سجاد', '2023-03-10', '', '10:08:54 PM'),
(54, 53, 'مرتضى', '2023-03-10', '', '10:09:02 PM'),
(55, 53, 'مرتضى', '2023-03-10', '', '10:09:06 PM'),
(56, 53, 'مرتضى', '2023-03-10', '', '10:09:10 PM'),
(57, 53, 'مرتضى', '2023-03-10', '', '10:09:15 PM'),
(58, 55, 'سجاد', '2023-03-10', '', '10:49:33 PM'),
(59, 55, 'سجاد', '2023-03-10', '', '10:52:43 PM'),
(60, 55, 'سجاد', '2023-03-10', 'Friday', '10:54:36 PM');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `FullName` varchar(100) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `Address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `FullName`, `Password`, `Address`) VALUES
(53, 'مرتضى', '1234', 'بغداد'),
(55, 'سجاد', '1212', 'الزعفرانية'),
(56, 'محمد يوسف', '12312355', 'الحلة'),
(57, 'سعدون محمد', '123432', 'الغزاليه'),
(58, 'كريم ياسين', '12312344', 'الغزالية');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
