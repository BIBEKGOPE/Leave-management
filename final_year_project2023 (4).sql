-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 12, 2023 at 05:56 AM
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
-- Table structure for table `employee_leaves`
--

CREATE TABLE `employee_leaves` (
  `recd_id` int(20) NOT NULL COMMENT 'serial number',
  `emp_id` int(11) NOT NULL COMMENT 'employee id',
  `l_id` int(11) NOT NULL COMMENT 'leave id',
  `r_from` date NOT NULL COMMENT 'date from',
  `r_to` date NOT NULL COMMENT 'date to',
  `nod` int(20) NOT NULL COMMENT 'no of days',
  `des` text NOT NULL COMMENT 'description',
  `status` varchar(255) NOT NULL COMMENT 'status of leave',
  `forward_status` varchar(255) NOT NULL COMMENT 'pricipal status',
  `coment` varchar(255) NOT NULL COMMENT 'comment for hod',
  `prin_coment` varchar(255) NOT NULL COMMENT 'comment by principal'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_leaves`
--

INSERT INTO `employee_leaves` (`recd_id`, `emp_id`, `l_id`, `r_from`, `r_to`, `nod`, `des`, `status`, `forward_status`, `coment`, `prin_coment`) VALUES
(25, 41, 1, '2023-06-12', '2023-06-14', 2, 'sick ', 'approved', 'princi', 'hello god', 'you can go'),
(26, 39, 1, '2023-06-13', '2023-06-15', 2, 'hellol', 'approved', 'princi', 'hi', 'done'),
(27, 39, 1, '2023-06-13', '2023-06-14', 1, 'najanu', 'approved', 'princi', 'helloo', 'ok'),
(28, 41, 1, '2023-06-13', '2023-06-14', 1, 'sorry', 'pending', 'applied', '', ''),
(29, 43, 1, '2023-06-12', '2023-06-13', 1, 'gooo', 'pending', 'applied', '', ''),
(30, 44, 1, '2023-06-13', '2023-06-14', 1, 'gooo', 'approved', 'princi', 'hrllo', 'w\r\nyou can go');

-- --------------------------------------------------------

--
-- Table structure for table `emp_data`
--

CREATE TABLE `emp_data` (
  `emp_id` int(20) NOT NULL COMMENT 'serial number',
  `emp_f_name` varchar(255) NOT NULL COMMENT 'employee first name',
  `emp_m_name` varchar(255) NOT NULL COMMENT 'employee middle name',
  `emp_l_name` varchar(255) NOT NULL COMMENT 'employee last name',
  `emp_email` varchar(255) NOT NULL COMMENT 'employee email',
  `emp_mobn` varchar(255) NOT NULL COMMENT 'employee mobile num',
  `emp_adres` varchar(255) NOT NULL COMMENT 'employee address',
  `emp_rgdate` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'employee resistration date',
  `e_pass` varchar(255) NOT NULL COMMENT 'employee password',
  `d_id` int(11) NOT NULL COMMENT 'department id',
  `des_id` int(11) NOT NULL COMMENT 'designation id',
  `role_id` int(11) NOT NULL COMMENT 'roles id',
  `leftdays` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emp_data`
--

INSERT INTO `emp_data` (`emp_id`, `emp_f_name`, `emp_m_name`, `emp_l_name`, `emp_email`, `emp_mobn`, `emp_adres`, `emp_rgdate`, `e_pass`, `d_id`, `des_id`, `role_id`, `leftdays`) VALUES
(39, 'angat', '', 'gope', '345@gmail.com', '7896645322', 'hugrajuli', '2023-06-12 01:37:49', '3456', 1, 6, 3, ''),
(40, 'piyush', 'kumar', 'prasad', '789@gmail.com', '6788543456', 'lakhimpur', '2023-06-12 01:38:59', '1234', 11, 5, 2, ''),
(41, 'ajay', '', 'gope', 'gope@gmail.com', '6785785467', 'tezpur', '2023-06-12 01:40:06', '3456', 1, 2, 1, ''),
(43, 'bibek', '', 'gope', '123@gmail.com', '6001847191', 'dhekiajuli', '2023-06-12 02:44:18', '1234', 11, 12, 4, ''),
(44, 'lakhya', '', 'borah', '6321@gmail.com', '6001847191', 'NLP,ward no 9,Bazzarpatti near Hari Mandir', '2023-06-12 09:22:15', '1234', 15, 2, 1, ''),
(45, 'sila', '', 'goope', '21@gmail.com', '6001847191', 'NLP,ward no 9,Bazzarpatti near Hari Mandir', '2023-06-12 09:23:25', '3456', 15, 6, 3, '');

-- --------------------------------------------------------

--
-- Table structure for table `emp_dept`
--

CREATE TABLE `emp_dept` (
  `d_id` int(20) NOT NULL COMMENT 'department id',
  `d_name` varchar(255) NOT NULL COMMENT 'departmrnt name'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emp_dept`
--

INSERT INTO `emp_dept` (`d_id`, `d_name`) VALUES
(1, 'com science'),
(11, 'administrativ'),
(15, 'zoology'),
(16, 'botany'),
(17, 'mathmatics'),
(18, 'physics'),
(19, 'chemistry'),
(20, 'Antropology');

-- --------------------------------------------------------

--
-- Table structure for table `emp_desig`
--

CREATE TABLE `emp_desig` (
  `des_id` int(20) NOT NULL COMMENT 'designation id',
  `des_name` varchar(255) NOT NULL COMMENT 'designation name'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emp_desig`
--

INSERT INTO `emp_desig` (`des_id`, `des_name`) VALUES
(2, 'bearer'),
(5, 'librarian'),
(6, 'faculty'),
(12, 'assistant'),
(13, 'lab assistan'),
(14, 'helper'),
(15, 'Lecturer');

-- --------------------------------------------------------

--
-- Table structure for table `emp_leaverept`
--

CREATE TABLE `emp_leaverept` (
  `recd_id` int(20) NOT NULL COMMENT 'employee id',
  `l_id` int(20) NOT NULL COMMENT 'leave id',
  `available` int(20) NOT NULL COMMENT 'available days'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `emp_recd`
--

CREATE TABLE `emp_recd` (
  `emp_id` int(11) NOT NULL,
  `recd_id` int(11) NOT NULL
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
(1, 'casual leav', 15),
(2, 'maternity leave', 180),
(3, 'earn leave', 30),
(4, 'half pay leave', 20),
(5, 'commutative leave', 240),
(6, 'child leave', 750);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(20) NOT NULL COMMENT 'roles',
  `name` varchar(255) NOT NULL COMMENT 'role_names'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `name`) VALUES
(1, 'employee'),
(2, 'pinky'),
(3, 'hod'),
(4, 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee_leaves`
--
ALTER TABLE `employee_leaves`
  ADD PRIMARY KEY (`recd_id`),
  ADD KEY `employee_leaves` (`emp_id`),
  ADD KEY `l_id` (`l_id`);

--
-- Indexes for table `emp_data`
--
ALTER TABLE `emp_data`
  ADD PRIMARY KEY (`emp_id`),
  ADD KEY `d_id` (`d_id`),
  ADD KEY `des_id` (`des_id`),
  ADD KEY `emp_data` (`role_id`);

--
-- Indexes for table `emp_dept`
--
ALTER TABLE `emp_dept`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `emp_desig`
--
ALTER TABLE `emp_desig`
  ADD PRIMARY KEY (`des_id`);

--
-- Indexes for table `emp_leaverept`
--
ALTER TABLE `emp_leaverept`
  ADD KEY `l_id` (`l_id`),
  ADD KEY `emp_leaverept_ibfk_1` (`recd_id`);

--
-- Indexes for table `emp_recd`
--
ALTER TABLE `emp_recd`
  ADD KEY `emp_id` (`emp_id`),
  ADD KEY `recd_id` (`recd_id`);

--
-- Indexes for table `leave_type`
--
ALTER TABLE `leave_type`
  ADD PRIMARY KEY (`l_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee_leaves`
--
ALTER TABLE `employee_leaves`
  MODIFY `recd_id` int(20) NOT NULL AUTO_INCREMENT COMMENT 'serial number', AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `emp_data`
--
ALTER TABLE `emp_data`
  MODIFY `emp_id` int(20) NOT NULL AUTO_INCREMENT COMMENT 'serial number', AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `emp_dept`
--
ALTER TABLE `emp_dept`
  MODIFY `d_id` int(20) NOT NULL AUTO_INCREMENT COMMENT 'department id', AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `emp_desig`
--
ALTER TABLE `emp_desig`
  MODIFY `des_id` int(20) NOT NULL AUTO_INCREMENT COMMENT 'designation id', AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `leave_type`
--
ALTER TABLE `leave_type`
  MODIFY `l_id` int(20) NOT NULL AUTO_INCREMENT COMMENT 'leave id', AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee_leaves`
--
ALTER TABLE `employee_leaves`
  ADD CONSTRAINT `employee_leaves` FOREIGN KEY (`emp_id`) REFERENCES `emp_data` (`emp_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `employee_leaves_ibfk_1` FOREIGN KEY (`l_id`) REFERENCES `leave_type` (`l_id`) ON UPDATE CASCADE;

--
-- Constraints for table `emp_data`
--
ALTER TABLE `emp_data`
  ADD CONSTRAINT `emp_data_ibfk_1` FOREIGN KEY (`d_id`) REFERENCES `emp_dept` (`d_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `emp_data_ibfk_2` FOREIGN KEY (`des_id`) REFERENCES `emp_desig` (`des_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `emp_data_ibfk_3` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`) ON UPDATE CASCADE;

--
-- Constraints for table `emp_leaverept`
--
ALTER TABLE `emp_leaverept`
  ADD CONSTRAINT `emp_leaverept_ibfk_1` FOREIGN KEY (`recd_id`) REFERENCES `employee_leaves` (`recd_id`),
  ADD CONSTRAINT `emp_leaverept_ibfk_2` FOREIGN KEY (`l_id`) REFERENCES `leave_type` (`l_id`);

--
-- Constraints for table `emp_recd`
--
ALTER TABLE `emp_recd`
  ADD CONSTRAINT `emp_recd_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `emp_data` (`emp_id`),
  ADD CONSTRAINT `emp_recd_ibfk_2` FOREIGN KEY (`recd_id`) REFERENCES `employee_leaves` (`recd_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
