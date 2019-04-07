-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2019 at 06:26 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `voting_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(150) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user_type`, `name`, `email`, `password`) VALUES
(1, 'admin', 'deepak', 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` int(11) NOT NULL,
  `announced` varchar(255) NOT NULL,
  `announce_date` date NOT NULL,
  `winner_name` varchar(255) NOT NULL,
  `votes` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile_no` varchar(255) NOT NULL,
  `password` varchar(300) NOT NULL,
  `department` varchar(255) NOT NULL,
  `year` varchar(100) NOT NULL,
  `otp` int(255) NOT NULL,
  `otp_expire` varchar(100) DEFAULT NULL,
  `is_nominee` varchar(100) NOT NULL,
  `profile_pic` varchar(500) NOT NULL,
  `post` varchar(255) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `acheivements` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `user_type`, `first_name`, `last_name`, `email`, `mobile_no`, `password`, `department`, `year`, `otp`, `otp_expire`, `is_nominee`, `profile_pic`, `post`, `status`, `acheivements`) VALUES
(18, '', '', '', 'chetangdhamake@ieee.org', '', '', '', '', 0, NULL, '', '', '', '', NULL),
(19, '', '', '', 'poojamahadeshigvan@gmail.com', '', '', '', '', 0, NULL, '', '', '', NULL, NULL),
(20, '', '', '', '1shindetejashree@gmail.com', '', '', '', '', 0, NULL, '', '', '', NULL, NULL),
(21, '', '', '', 'jyotiparab301097@gmail.com', '', '', '', '', 0, NULL, '', '', '', NULL, NULL),
(22, '', '', '', 'yredkar9@gmail.com', '', '', '', '', 0, NULL, '', '', '', NULL, NULL),
(23, '', '', '', 'riturkadam@gmail.com', '', '', '', '', 0, NULL, '', '', '', NULL, NULL),
(24, '', '', '', 'mithilbaria98@gmail.com', '', '', '', '', 0, NULL, '', '', '', NULL, NULL),
(25, '', '', '', 'omicarsobike@gmail.com', '', '', '', '', 0, NULL, '', '', '', NULL, NULL),
(26, '', '', '', 'vedantsatam2gmail.com', '', '', '', '', 0, NULL, '', '', '', NULL, NULL),
(27, '', '', '', 'pwprajakta2909@gmail.com', '', '', '', '', 0, NULL, '', '', '', NULL, NULL),
(28, '', '', '', 'chavanankita017@gmail.com', '', '', '', '', 0, NULL, '', '', '', NULL, NULL),
(29, '', '', '', 'ashumane61997@gmail.com', '', '', '', '', 0, NULL, '', '', '', NULL, NULL),
(30, '', '', '', 'ankita4kamble@gmail.com', '', '', '', '', 0, NULL, '', '', '', NULL, NULL),
(31, '', '', '', 'sonalfarad21@gmail.com', '', '', '', '', 0, NULL, '', '', '', NULL, NULL),
(32, '', '', '', 'yashodhantamhankar@gmail.com', '', '', '', '', 0, NULL, '', '', '', NULL, NULL),
(33, '', '', '', 'akashhingade@gmail.com', '', '', '', '', 0, NULL, '', '', '', NULL, NULL),
(34, '', '', '', 'niketdjogale@gmail.com', '', '', '', '', 0, NULL, '', '', '', NULL, NULL),
(35, '', '', '', 'ishanpdusane56@gmail.com', '', '', '', '', 0, NULL, '', '', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `start_vote`
--

CREATE TABLE `start_vote` (
  `id` int(255) NOT NULL,
  `start` varchar(255) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `result_date` date DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `winner` varchar(255) DEFAULT NULL,
  `total_vote` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `start_vote`
--

INSERT INTO `start_vote` (`id`, `start`, `start_date`, `end_date`, `result_date`, `user_id`, `winner`, `total_vote`) VALUES
(2, NULL, '2019-02-13', '2019-06-05', '2019-06-13', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `voting_details`
--

CREATE TABLE `voting_details` (
  `id` int(255) NOT NULL,
  `voter_id` varchar(255) NOT NULL,
  `voter` varchar(255) NOT NULL,
  `voted` varchar(255) NOT NULL,
  `voted_post` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `voting_details`
--

INSERT INTO `voting_details` (`id`, `voter_id`, `voter`, `voted`, `voted_post`) VALUES
(3, '', 'deepak@gmail.com', 'deep7@gmail.com', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `start_vote`
--
ALTER TABLE `start_vote`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voting_details`
--
ALTER TABLE `voting_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `start_vote`
--
ALTER TABLE `start_vote`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `voting_details`
--
ALTER TABLE `voting_details`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
