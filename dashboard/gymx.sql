-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2023 at 06:17 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

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
-- Table structure for table `membership_plans`
--

CREATE TABLE `membership_plans` (
  `membership_id` int(11) NOT NULL,
  `membership_dur` varchar(20) DEFAULT NULL,
  `membership_amount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `membership_plans`
--

INSERT INTO `membership_plans` (`membership_id`, `membership_dur`, `membership_amount`) VALUES
(1, '3 Months', 300),
(2, '6 Months', 600),
(3, '9 Months', 900);

-- --------------------------------------------------------

--
-- Table structure for table `members_list`
--

CREATE TABLE `members_list` (
  `img_dir` varchar(255) NOT NULL,
  `Enrollment_no` int(10) NOT NULL,
  `Client_name` varchar(100) NOT NULL,
  `Present_address` varchar(255) NOT NULL,
  `phone_no` int(10) NOT NULL,
  `DOB` date NOT NULL,
  `Medical_issues` varchar(255) NOT NULL,
  `Em_name` varchar(100) NOT NULL,
  `Em_address` varchar(255) NOT NULL,
  `Em_phone_no` int(10) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `members_list`
--

INSERT INTO `members_list` (`img_dir`, `Enrollment_no`, `Client_name`, `Present_address`, `phone_no`, `DOB`, `Medical_issues`, `Em_name`, `Em_address`, `Em_phone_no`, `status`) VALUES
('', 1, 'shrey', 'cortalim', 2147483647, '2023-12-14', 'none', 'vincent', 'cortalim', 2147483647, 1),
('', 2, 'vincent', 'cortalim', 2147483647, '2023-12-14', 'none', 'shrey', 'cortalim', 2147483647, 1),
('', 3, 'ifan', 'cortalim', 2147483647, '2023-12-01', 'none', 'shrey', 'cortalim', 2147483647, 0),
('', 4, 'cavan', 'cortalim', 2147483647, '2023-12-16', 'none', 'vincent', 'cortalim', 2147483647, 1),
('', 5, 'christin', 'cortalim', 2147483647, '2023-12-14', 'none', 'shrey', 'cortalim', 2147483647, 0),
('', 6, 'anushka', 'cortalim', 2147483647, '2023-12-31', 'none', 'ifan', 'vasco', 2147483647, 0),
('', 11, 'myrtle', 'verna', 2147483647, '2022-01-15', 'none', 'shrey', 'cortalim', 2147483647, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `membership_plans`
--
ALTER TABLE `membership_plans`
  ADD PRIMARY KEY (`membership_id`);

--
-- Indexes for table `members_list`
--
ALTER TABLE `members_list`
  ADD PRIMARY KEY (`Enrollment_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `members_list`
--
ALTER TABLE `members_list`
  MODIFY `Enrollment_no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
