-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2018 at 02:23 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `won_wed`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `c_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`c_id`, `cat_name`) VALUES
(1, 'Hotels'),
(2, 'Photography'),
(3, 'Floral'),
(4, 'Designers'),
(5, 'Vehicles'),
(6, 'Wedding Planners'),
(7, 'Dancers'),
(8, 'Designers');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `image_name` longtext NOT NULL,
  `posting_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `sender_email` varchar(255) NOT NULL,
  `sender_name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `message` varchar(1024) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `postings`
--

CREATE TABLE `postings` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `contact_number` char(12) NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  `address` varchar(300) NOT NULL,
  `price_from` int(11) NOT NULL,
  `price_to` int(11) NOT NULL,
  `cover_image` longtext NOT NULL,
  `website_link` varchar(500) NOT NULL,
  `fb_link` varchar(500) NOT NULL,
  `insta_link` varchar(500) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `postings`
--

INSERT INTO `postings` (`id`, `title`, `category`, `content`, `contact_number`, `contact_email`, `address`, `price_from`, `price_to`, `cover_image`, `website_link`, `fb_link`, `insta_link`, `status`) VALUES
(1, 'samara hotel', '1', 'qwertrtqerrrrrrrrrrr', '0713216547', 'shavi@g.lk', 'earg', 450, 2000, 'fghsfgh', '', '', '', 1),
(2, 'd', '1', 'I am not editable', '6', 's@g.lk', 'rg', 5, 5, 'hdt', '5', '', '', 0),
(3, 'd', '2', 'I am not editable', '6', 's@g.lk', 'rg', 5, 5, 'hdt', '5', '', '', 0),
(4, 'photo 2', '2', 'm Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen bo', '0714569874', 'user@yahoo.com', '6525, weyrfgwey rd, colombo', 450, 985, 'r5yyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyy', 'www.uyefgwufyewyff.lk', '', '', 0),
(5, 'photo 2', '2', 'm Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen bo', '0714569874', 'user@yahoo.com', '6525, weyrfgwey rd, colombo', 450, 985, 'r5yyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyy', 'www.uyefgwufyewyff.lk', '', '', 0),
(6, 'photo 2', '4', 'm Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen bo', '0714569874', 'user@yahoo.com', '6525, weyrfgwey rd, colombo', 450, 985, 'r5yyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyy', 'www.uyefgwufyewyff.lk', '', '', 0),
(7, 'photo 2', '4', 'm Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen bo', '0714569874', 'user@yahoo.com', '6525, weyrfgwey rd, colombo', 450, 985, 'r5yyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyy', 'www.uyefgwufyewyff.lk', '', '', 0),
(8, 'photo 2', '4', 'm Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen bo', '0714569874', 'user@yahoo.com', '6525, weyrfgwey rd, colombo', 450, 985, 'r5yyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyy', 'www.uyefgwufyewyff.lk', '', '', 0),
(9, 'photo 2', '3', 'm Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen bo', '0714569874', 'user@yahoo.com', '6525, weyrfgwey rd, colombo', 450, 985, 'r5yyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyy', 'www.uyefgwufyewyff.lk', '', '', 0),
(10, 'photo 2', '5', 'm Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen bo', '0714569874', 'user@yahoo.com', '6525, weyrfgwey rd, colombo', 450, 985, 'r5yyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyy', 'www.uyefgwufyewyff.lk', '', '', 0),
(11, 'photo 2', '4', 'm Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen bo', '0714569874', 'user@yahoo.com', '6525, weyrfgwey rd, colombo', 450, 985, 'r5yyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyy', 'www.uyefgwufyewyff.lk', '', '', 0),
(12, 'photo 2', '4', 'm Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen bo', '0714569874', 'user@yahoo.com', '6525, weyrfgwey rd, colombo', 450, 985, 'r5yyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyy', 'www.uyefgwufyewyff.lk', '', '', 0),
(13, 'photo 2', '3', 'm Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen bo', '0714569874', 'user@yahoo.com', '6525, weyrfgwey rd, colombo', 450, 985, 'r5yyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyy', 'www.uyefgwufyewyff.lk', '', '', 0),
(14, 'photo 2', '4', 'm Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen bo', '0714569874', 'user@yahoo.com', '6525, weyrfgwey rd, colombo', 450, 985, 'r5yyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyy', 'www.uyefgwufyewyff.lk', '', '', 0),
(15, 'photo 2', '6', 'm Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen bo', '0714569874', 'user@yahoo.com', '6525, weyrfgwey rd, colombo', 450, 985, 'r5yyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyy', 'www.uyefgwufyewyff.lk', '', '', 0),
(16, 'photo 2', '7', 'm Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen bo', '0714569874', 'user@yahoo.com', '6525, weyrfgwey rd, colombo', 450, 985, 'r5yyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyy', 'www.uyefgwufyewyff.lk', '', '', 0),
(17, 'photo 2', '8', 'm Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen bo', '0714569874', 'user@yahoo.com', '6525, weyrfgwey rd, colombo', 450, 985, 'r5yyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyy', 'www.uyefgwufyewyff.lk', '', '', 0),
(18, 'photo 2', '4', 'm Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen bo', '0714569874', 'user@yahoo.com', '6525, weyrfgwey rd, colombo', 450, 985, 'r5yyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyy', 'www.uyefgwufyewyff.lk', '', '', 0),
(19, 'photo 2', '8', 'm Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen bo', '0714569874', 'user@yahoo.com', '6525, weyrfgwey rd, colombo', 450, 985, 'r5yyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyy', 'www.uyefgwufyewyff.lk', '', '', 0),
(20, 'photo 2', '4', 'm Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen bo', '0714569874', 'user@yahoo.com', '6525, weyrfgwey rd, colombo', 450, 985, 'r5yyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyy', 'www.uyefgwufyewyff.lk', '', '', 0),
(21, 'photo 2', '4', 'm Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen bo', '0714569874', 'user@yahoo.com', '6525, weyrfgwey rd, colombo', 450, 985, 'r5yyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyy', 'www.uyefgwufyewyff.lk', '', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `postings`
--
ALTER TABLE `postings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `postings`
--
ALTER TABLE `postings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
