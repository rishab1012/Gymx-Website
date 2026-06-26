-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2024 at 06:08 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gymx`
--

-- --------------------------------------------------------

--
-- Table structure for table `members_list`
--

CREATE TABLE `members_list` (
  `Enrollment_no` int(10) NOT NULL,
  `Client_name` varchar(100) NOT NULL,
  `Present_address` varchar(255) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `phone_no` bigint(10) NOT NULL,
  `DOB` date NOT NULL,
  `Medical_issues` varchar(255) NOT NULL,
  `start_date` date DEFAULT NULL,
  `Em_name` varchar(100) NOT NULL,
  `Em_address` varchar(255) NOT NULL,
  `Em_phone_no` bigint(10) NOT NULL,
  `M_status` tinyint(1) NOT NULL,
  `plan_id` int(11) DEFAULT NULL,
  `end_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `members_list`
--

INSERT INTO `members_list` (`Enrollment_no`, `Client_name`, `Present_address`, `Email`, `phone_no`, `DOB`, `Medical_issues`, `start_date`, `Em_name`, `Em_address`, `Em_phone_no`, `M_status`, `plan_id`, `end_date`) VALUES
(1, 'shrey', 'cortalim', 'shreyvernekar09@gmail.com', 8788849750, '1997-01-02', 'none', '2024-02-07', 'vincent', 'cortalim', 8723492983, 0, 1, '2024-03-13'),
(2, 'vincent', 'cortalim', 'vincentgu32@gmai.com', 7499405648, '2002-04-17', 'none', '2024-01-22', 'shrey', 'cortalim', 8723894723, 1, 1, '2024-02-26'),
(3, 'anushka', 'cortalim', 'b21641@fragnelcollege.edu.in', 8478345792, '2011-12-26', 'none', '2024-01-24', 'shrey', 'cortalim', 8788849750, 1, 1, NULL),
(4, 'cavan', 'cortalim', 'cavan@gmail.com', 8478345792, '2011-12-26', 'none', '2024-01-25', 'shrey', 'cortalim', 8723894723, 0, 1, NULL),
(5, 'ifan', 'vasco', 'ifan@gmail.com', 8478345792, '2011-12-26', 'none', '2024-01-25', 'shrey', 'cortalim', 8723894723, 0, 1, NULL),
(6, 'christin', 'vasco', 'Christin@gmail.com', 8478345792, '2011-12-26', 'none', '2024-01-25', 'shrey', 'cortalim', 8723894723, 0, 1, NULL),
(7, 'Rishab', 'vasco', 'Rishab@gmail.com', 8478345792, '2011-12-26', 'none', '2024-01-25', 'shrey', 'cortalim', 8723894723, 0, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` int(10) NOT NULL,
  `Plans_details` text NOT NULL,
  `Amount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `Plans_details`, `Amount`) VALUES
(1, '1 month', 1500),
(2, '3 month', 2700),
(3, '6 month', 5400),
(4, '12 month', 10800);

-- --------------------------------------------------------

--
-- Table structure for table `trainers_list`
--

CREATE TABLE `trainers_list` (
  `trainer_id` int(10) NOT NULL,
  `trainer_img_dir` varchar(200) NOT NULL,
  `trainer_name` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `trainer_email` varchar(100) NOT NULL,
  `trainer_phone_no` bigint(10) NOT NULL,
  `trainer_dob` date NOT NULL,
  `trainer_address` varchar(200) NOT NULL,
  `trainer_joining_date` date NOT NULL,
  `trainer_salary` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trainers_list`
--

INSERT INTO `trainers_list` (`trainer_id`, `trainer_img_dir`, `trainer_name`, `gender`, `trainer_email`, `trainer_phone_no`, `trainer_dob`, `trainer_address`, `trainer_joining_date`, `trainer_salary`) VALUES
(2, '', 'shrey', 'male', 'shreyvernekar09@gmail.com', 8788849750, '2002-04-03', 'cortalim', '2024-02-03', 25000),
(3, '', 'vincent', 'male', 'vincent@gmail.com', 9867543128, '0000-00-00', 'pazentar', '0000-00-00', 20000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `verification_code` varchar(255) NOT NULL,
  `is_verified` int(10) NOT NULL DEFAULT 0,
  `resettoken` varchar(255) DEFAULT NULL,
  `resettokenexpire` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `verification_code`, `is_verified`, `resettoken`, `resettokenexpire`) VALUES
(43, 'cavan', 'shreyvernekar09@gmail.com', '$2y$10$saYA6JL/C5cXg.2m2u6zY.VbLZmuBcZqUfszluatra9Ivmx910x22', '04debf02dc84cd0f4eab2d511d00d50f', 1, 'a660a07f259756f6701b', '2024-02-05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `members_list`
--
ALTER TABLE `members_list`
  ADD PRIMARY KEY (`Enrollment_no`),
  ADD KEY `id` (`plan_id`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trainers_list`
--
ALTER TABLE `trainers_list`
  ADD PRIMARY KEY (`trainer_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `members_list`
--
ALTER TABLE `members_list`
  MODIFY `Enrollment_no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `trainers_list`
--
ALTER TABLE `trainers_list`
  MODIFY `trainer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `members_list`
--
ALTER TABLE `members_list`
  ADD CONSTRAINT `members_list_ibfk_1` FOREIGN KEY (`plan_id`) REFERENCES `plans` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
