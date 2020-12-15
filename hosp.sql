-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2020 at 02:49 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hosp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(600) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'secret');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `username` varchar(600) NOT NULL,
  `date` varchar(60) NOT NULL,
  `time` varchar(120) NOT NULL,
  `mobile` int(11) NOT NULL,
  `doctor` varchar(600) NOT NULL,
  `reason` varchar(600) NOT NULL,
  `status` varchar(60) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `fullname` varchar(600) NOT NULL,
  `username` varchar(600) NOT NULL,
  `email` varchar(120) NOT NULL,
  `mobile` int(11) NOT NULL,
  `specialist` varchar(600) NOT NULL,
  `gender` varchar(600) NOT NULL,
  `password` varchar(600) NOT NULL,
  `image` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `fullname`, `username`, `email`, `mobile`, `specialist`, `gender`, `password`, `image`) VALUES
(4, 'Malik Collier', 'myxazumyd', 'necihy@mailinator.com', 0, 'Aperiam qui laborum', 'At et mollit et nisi', 'Inventore duis est ', ''),
(5, 'Daquan Kemp', 'lelubugyz', 'rydepihup@mailinator.com', 555555, 'Iusto exercitationem', 'Voluptatem In tempo', 'Consequuntur ipsum ', '1836795632-MicrosoftTeams-image (1).png'),
(6, 'Pranavan Nadarajah', 'Pranavan', 'rajelyl@mailinator.com', 55, 'Kidney', 'Male', '123', '1840516445-72a47a2d90b2b4f83ced03131d42f0bf.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `username` varchar(600) NOT NULL,
  `date` varchar(600) NOT NULL,
  `time` varchar(600) NOT NULL,
  `total` double NOT NULL,
  `status` varchar(600) NOT NULL DEFAULT 'UnPaid'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `id` int(11) NOT NULL,
  `username` varchar(600) NOT NULL,
  `date` varchar(60) NOT NULL,
  `time` varchar(120) NOT NULL,
  `medicines` varchar(600) NOT NULL,
  `note` varchar(6000) NOT NULL,
  `doctor` varchar(600) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(600) NOT NULL,
  `username` varchar(600) NOT NULL,
  `email` varchar(600) NOT NULL,
  `mobile` int(11) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(60) NOT NULL,
  `password` varchar(600) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `email`, `mobile`, `age`, `gender`, `password`) VALUES
(7, 'Nadarajah Pranvan ', 'Pranavan', 'npranavan28@gmail.com', 779563651, 24, 'Male', '123'),
(12, 'Rana Dagu', 'Rana', 'sunnsea@emirates.net.ae', 656, 28, 'Male', '55454');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
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
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
