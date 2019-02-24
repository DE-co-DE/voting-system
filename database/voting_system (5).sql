-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2019 at 08:21 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `announced`, `announce_date`, `winner_name`, `votes`) VALUES
(1, 'true', '2019-02-24', '', 0),
(2, 'true', '2019-02-24', '', 0);

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
  `is_nominee` varchar(100) NOT NULL,
  `profile_pic` varchar(500) NOT NULL,
  `post` varchar(255) NOT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `user_type`, `first_name`, `last_name`, `email`, `mobile_no`, `password`, `department`, `year`, `otp`, `is_nominee`, `profile_pic`, `post`, `status`) VALUES
(4, 'nominee', 'pradeep', 'yadav', 'deep7rd@gmail.com', '8452062425', '123', 'IT', '2015', 8116, '', '', 'TPO', 'pending'),
(5, 'student', 'deepak', 'yadav', 'deepak@gmail.com', '8452062425', '123', 'IT', '2015', 7951, '', '', '', NULL),
(6, 'nominee', 'deep', 'yadav', 'deep7@gmail.com', '8452062425', '123', 'BE', '2016', 9271, 'nominee', '', 'treasurer', 'accepted'),
(8, 'student', 'abc', 'xyz', 'deepakyadav.web@gmail.com', '8452062425', '123', 'BA', '4th year', 4931, '', '', '', NULL);

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
(2, NULL, '0000-00-00', '0000-00-00', '2019-02-23', NULL, NULL, NULL);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
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
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;