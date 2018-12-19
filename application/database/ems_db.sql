-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2018 at 08:37 AM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `employee_mgt`
--

-- --------------------------------------------------------

--
-- Table structure for table `leave`
--

CREATE TABLE `leave` (
  `id` int(11) NOT NULL,
  `user_name` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `leave_type` varchar(255) NOT NULL,
  `leave_start` date NOT NULL,
  `leave_end` date NOT NULL,
  `leave_days` int(11) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leave`
--

INSERT INTO `leave` (`id`, `user_name`, `user_id`, `leave_type`, `leave_start`, `leave_end`, `leave_days`, `status`) VALUES
(121, 'Harry Potter', 6, 'Casual', '2018-06-28', '2018-06-29', 0, 'Approved'),
(128, 'Harry Potter', 6, 'Annual', '2018-08-18', '2018-08-20', 0, 'Disapproved'),
(130, 'admin1', 8, 'Annual', '2018-08-25', '2018-08-26', 1, 'Disapproved'),
(131, 'john cena', 48, 'Annual', '2018-08-31', '2018-09-01', 0, 'Approved'),
(132, 'admin1', 8, 'Annual', '2018-08-25', '2018-08-28', 0, ''),
(139, 'admin1', 8, 'Casual', '2018-08-28', '2018-08-30', 0, ''),
(152, 'Harry Potters', 6, 'Annual', '2018-08-08', '2018-08-11', 3, 'Disapproved'),
(153, 'Harry Potters', 6, 'Annual', '2018-08-30', '2018-08-31', 1, 'Pending'),
(154, 'Harry Potters', 6, 'Casual', '2018-08-30', '2018-08-31', 1, 'Approved'),
(155, 'shavindi', 90, 'Casual', '2018-08-30', '2018-09-01', 2, 'Pending'),
(156, 'Harry Potter', 6, 'Casual', '2018-08-30', '2018-08-31', 1, 'Pending'),
(157, 'Harry Potter', 6, 'Annual', '2018-08-30', '2018-08-31', 1, 'Pending'),
(158, 'Harry Potter', 6, 'Annual', '2018-08-30', '2018-08-31', 2, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `designation` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `total_leave_left` int(11) NOT NULL,
  `annual_left` int(11) NOT NULL,
  `casual_left` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `login_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `username`, `designation`, `email`, `mobile`, `total_leave_left`, `annual_left`, `casual_left`, `password`, `login_status`) VALUES
(6, 2, 'Harry Potter', 'HP', 'UI/UX Designer', 'emp11@gmail.com', '0718293', 0, 14, 7, 'e11111', 'active'),
(8, 1, 'admin1', 'a1', '', 'shavindipathirana@gmail.com', '', 0, 14, 7, 'admin1', ''),
(45, 0, 'Employee Two', 'e2', 'Graphic Designer', 'hesara.p@gmail.com', '1237894560', 0, 14, 7, 'uyfufy', 'active'),
(48, 2, 'john cena', 'erfgrg', 'QA Engineer', 'john@gmail.com', '9632587410', 0, 14, 7, 'john123', 'active'),
(92, 2, '', 'emp 50', 'Intern', 'employee50@gmail.com', '', 0, 14, 7, '', ''),
(93, 2, '', 'william', 'Graphic Designer', 'william@yahoo.com', '', 0, 14, 7, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`role_id`, `role_name`) VALUES
(1, 'admin'),
(2, 'employee');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `leave`
--
ALTER TABLE `leave`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `leave`
--
ALTER TABLE `leave`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
