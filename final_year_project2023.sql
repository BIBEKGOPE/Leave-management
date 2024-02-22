-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 08, 2023 at 03:02 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final_year_project2023`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee-record`
--

CREATE TABLE `employee-record` (
  `emp_id` int(20) NOT NULL,
  `recd_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `employee_leaves`
--

CREATE TABLE `employee_leaves` (
  `recd_id` int(20) NOT NULL COMMENT 'id for emp leaves recors',
  `emp_id` int(20) NOT NULL COMMENT 'employee id',
  `l_id` int(20) NOT NULL COMMENT 'leave id',
  `r_from` date NOT NULL COMMENT 'date from',
  `r_to` date NOT NULL COMMENT 'date to',
  `des` text NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_leaves`
--

INSERT INTO `employee_leaves` (`recd_id`, `emp_id`, `l_id`, `r_from`, `r_to`, `des`, `status`) VALUES
(1, 2, 1, '2023-05-02', '2023-05-11', '', ''),
(2, 1, 1, '2023-05-02', '2023-05-04', 'hi', 'pending'),
(3, 1, 1, '2023-05-02', '2023-05-04', 'hi', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `emp_data`
--

CREATE TABLE `emp_data` (
  `emp_id` int(20) NOT NULL COMMENT 'serial number',
  `emp_f_name` varchar(255) NOT NULL COMMENT 'employee first name',
  `emp_m_name` varchar(255) NOT NULL COMMENT 'employee middle name',
  `emp_l_name` varchar(255) NOT NULL COMMENT 'employee last name',
  `emp_dept` varchar(255) NOT NULL COMMENT 'employee department',
  `emp_design` varchar(255) NOT NULL COMMENT 'employee designation',
  `emp_email` varchar(255) NOT NULL COMMENT 'employee email',
  `emp_mobn` varchar(255) NOT NULL COMMENT 'employee mobile num',
  `emp_rgdate` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'employee resistration date',
  `e_pass` varchar(255) NOT NULL COMMENT 'employee password'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emp_data`
--

INSERT INTO `emp_data` (`emp_id`, `emp_f_name`, `emp_m_name`, `emp_l_name`, `emp_dept`, `emp_design`, `emp_email`, `emp_mobn`, `emp_rgdate`, `e_pass`) VALUES
(1, 'bibek ', '', 'gope', 'com science', 'ceo', 'gope@gmail.com', '897654324', '2023-05-05 07:33:15', ''),
(2, 'angat', '', 'gope', 'medical', 'cto', 'bibek@gmail.com', '677889990', '2023-05-05 07:43:32', '4567');

-- --------------------------------------------------------

--
-- Table structure for table `emp_leave`
--

CREATE TABLE `emp_leave` (
  `emp_id` int(20) NOT NULL COMMENT 'employee id',
  `l_id` int(20) NOT NULL COMMENT 'leave type id',
  `available` int(20) NOT NULL COMMENT 'available leave days'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `leave_type`
--

CREATE TABLE `leave_type` (
  `l_id` int(20) NOT NULL COMMENT 'leave id',
  `l_type` varchar(255) NOT NULL COMMENT 'leave types',
  `max_l_day` int(20) NOT NULL COMMENT 'maximum no of days for leave'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `leave_type`
--

INSERT INTO `leave_type` (`l_id`, `l_type`, `max_l_day`) VALUES
(1, 'casual leave', 15);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee-record`
--
ALTER TABLE `employee-record`
  ADD KEY `emp_id` (`emp_id`),
  ADD KEY `recd_id` (`recd_id`);

--
-- Indexes for table `employee_leaves`
--
ALTER TABLE `employee_leaves`
  ADD PRIMARY KEY (`recd_id`),
  ADD KEY `emp_id` (`emp_id`),
  ADD KEY `l_id` (`l_id`);

--
-- Indexes for table `emp_data`
--
ALTER TABLE `emp_data`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `emp_leave`
--
ALTER TABLE `emp_leave`
  ADD KEY `emp_leave` (`emp_id`),
  ADD KEY `l_id` (`l_id`);

--
-- Indexes for table `leave_type`
--
ALTER TABLE `leave_type`
  ADD PRIMARY KEY (`l_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee_leaves`
--
ALTER TABLE `employee_leaves`
  MODIFY `recd_id` int(20) NOT NULL AUTO_INCREMENT COMMENT 'id for emp leaves recors', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `emp_data`
--
ALTER TABLE `emp_data`
  MODIFY `emp_id` int(20) NOT NULL AUTO_INCREMENT COMMENT 'serial number', AUTO_INCREMENT=102;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee-record`
--
ALTER TABLE `employee-record`
  ADD CONSTRAINT `employee-record_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `emp_data` (`emp_id`),
  ADD CONSTRAINT `employee-record_ibfk_2` FOREIGN KEY (`recd_id`) REFERENCES `employee_leaves` (`recd_id`);

--
-- Constraints for table `employee_leaves`
--
ALTER TABLE `employee_leaves`
  ADD CONSTRAINT `employee_leaves_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `emp_data` (`emp_id`),
  ADD CONSTRAINT `employee_leaves_ibfk_2` FOREIGN KEY (`l_id`) REFERENCES `leave_type` (`l_id`);

--
-- Constraints for table `emp_leave`
--
ALTER TABLE `emp_leave`
  ADD CONSTRAINT `emp_leave` FOREIGN KEY (`emp_id`) REFERENCES `emp_data` (`emp_id`),
  ADD CONSTRAINT `emp_leave_ibfk_1` FOREIGN KEY (`l_id`) REFERENCES `leave_type` (`l_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
