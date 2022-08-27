-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2022 at 12:32 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sms`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_on` varchar(100) NOT NULL,
  `is_active` varchar(10) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_on` timestamp(3) NOT NULL DEFAULT current_timestamp(3) ON UPDATE current_timestamp(3),
  `is_active` varchar(100) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `created_by`, `created_on`, `is_active`) VALUES
(1, 'BSc in CSE', 'Monir', '2022-08-10 06:15:23.000', '1'),
(2, 'BSc in EEE', 'Monir', '2022-08-08 06:16:21.000', '1'),
(3, 'BSc in ETE', 'Monir', '2022-08-08 06:16:21.000', '1'),
(4, 'BSc in Architecture ', 'Monir', '2022-08-08 06:16:21.000', '1'),
(5, 'BSc in Pharmacy', 'Monir', '2022-08-08 06:16:21.000', '1');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` int(10) NOT NULL,
  `dept_id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_on` timestamp(3) NOT NULL DEFAULT current_timestamp(3) ON UPDATE current_timestamp(3),
  `is_active` varchar(100) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `dept_id`, `name`, `created_by`, `created_on`, `is_active`) VALUES
(1, 1, 'A', 'Monir', '2022-08-25 06:30:19.540', '1'),
(2, 1, 'B', 'Monir', '2022-08-25 06:30:27.600', '1'),
(3, 1, 'C', 'Monir', '2022-08-25 06:30:33.675', '1'),
(4, 1, 'D', 'Monir', '2022-08-25 06:30:33.675', '1'),
(5, 1, 'E', 'Monir', '2022-08-25 06:30:33.675', '1'),
(6, 1, 'F', 'Monir', '2022-08-25 06:30:33.675', '1'),
(7, 1, 'G', 'Monir', '2022-08-25 06:30:33.675', '1'),
(8, 1, 'H', 'Monir', '2022-08-25 06:30:33.675', '1'),
(9, 1, 'I', 'Monir', '2022-08-25 06:30:33.675', '1'),
(10, 1, 'J', 'Monir', '2022-08-25 06:30:33.675', '1'),
(11, 1, 'K', 'Monir', '2022-08-25 06:30:33.675', '1'),
(12, 1, 'L', 'Monir', '2022-08-25 06:30:33.675', '1'),
(13, 1, 'M', 'Monir', '2022-08-25 06:30:33.675', '1'),
(14, 1, 'N', 'Monir', '2022-08-25 06:30:33.675', '1'),
(15, 1, 'O', 'Monir', '2022-08-25 06:30:33.675', '1'),
(16, 2, 'A', 'Monir', '2022-08-25 06:30:33.675', '1'),
(17, 2, 'B', 'Monir', '2022-08-25 06:30:33.675', '1'),
(18, 2, 'C', 'Monir', '2022-08-25 06:30:33.675', '1'),
(19, 2, 'D', 'Monir', '2022-08-25 06:30:33.675', '1'),
(20, 2, 'E', 'Monir', '2022-08-25 06:30:33.675', '1'),
(21, 2, 'F', 'Monir', '2022-08-25 06:30:33.675', '1'),
(22, 3, 'A', 'Monir', '2022-08-25 06:30:33.675', '1'),
(23, 3, 'B', 'Monir', '2022-08-25 06:30:33.675', '1'),
(24, 3, 'C', 'Monir', '2022-08-25 06:30:33.675', '1'),
(25, 3, 'D', 'Monir', '2022-08-25 06:30:33.675', '1'),
(26, 4, 'A', 'Monir', '2022-08-25 06:30:33.675', '1'),
(27, 3, 'B', 'Monir', '2022-08-25 06:30:33.675', '1'),
(28, 4, 'A', 'Monir', '2022-08-25 06:30:33.675', '1'),
(29, 4, 'B', 'Monir', '2022-08-25 06:45:23.093', '1'),
(30, 5, 'A', 'Monir', '2022-08-25 06:45:23.093', '1');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `sex` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `section_id` int(10) NOT NULL,
  `created_by` int(10) NOT NULL,
  `created_at` timestamp(3) NOT NULL DEFAULT current_timestamp(3) ON UPDATE current_timestamp(3),
  `is_active` varchar(100) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `date`, `sex`, `email`, `contact`, `address`, `dept_id`, `course_id`, `section_id`, `created_by`, `created_at`, `is_active`) VALUES
(1, 'monir', '', 'male', 'a@gmail.com', '892377823', 'dhaka', 1, 2, 4, 23, '0000-00-00 00:00:00.000', '1'),
(2, '', '', '', '', '', '', 0, 0, 0, 0, '2022-08-25 09:46:42.775', '1'),
(3, 'Demo Product', '2022-08-26', '', 'junior3973@gmail.com', '12345', 'dhaka', 4, 0, 28, 0, '2022-08-25 09:47:34.145', '1'),
(4, 'Noman', '2022-08-25', '', 'saiyad@gmail.com', '12345', 'dhaka', 3, 0, 25, 0, '2022-08-25 10:13:52.894', '1'),
(5, 'Asiqul', '2022-08-26', '', 'monircse3973@gmail.com', '12345', 'dhaka', 4, 0, 29, 0, '2022-08-25 10:17:10.086', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
