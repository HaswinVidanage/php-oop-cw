-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2017 at 05:24 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coursework`
--

-- --------------------------------------------------------
create database coursework;
use coursework;
--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `empId` int(11) NOT NULL,
  `fName` varchar(20) DEFAULT NULL,
  `lName` varchar(20) DEFAULT NULL,
  `uName` varchar(20) DEFAULT NULL,
  `pWord` varchar(20) DEFAULT NULL,
  `access` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`empId`, `fName`, `lName`, `uName`, `pWord`, `access`) VALUES
(1, 'Hashinika', 'Lakshani', 'Hashi', 'admin', 'student'),
(2, 'Sara', 'Carter', 'sarac', 'saracarter123', 'student'),
(3, 'James', 'Dough', 'johnd', 'johndoe123', 'student'),
(4, 'Johny ', 'depp  ', 'johnnyd', 'johnydepp123', 'student'),
(5, 'Jim ', 'Cook  ', 'jimc', 'jimcook123', 'student'),
(6, 'Mila', 'Kunis', 'milak', 'milakunis123', 'lecturer'),
(7, 'Haswin ', 'Vidanage', 'haswind', 'haswind123', 'lecturer'),
(8, 'sam', 'smith', 'sams', 'samsmith123', 'lecturer'),
(10, 'John', 'Doe', 'John', 'admin', 'lecturer');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `StudentId` int(10) NOT NULL,
  `lecId` text NOT NULL,
  `sessionNo` int(11) NOT NULL,
  `sesDate` date NOT NULL,
  `startTime` time NOT NULL,
  `endTime` time NOT NULL,
  `meetingNotes` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`StudentId`, `lecId`, `sessionNo`, `sesDate`, `startTime`, `endTime`, `meetingNotes`) VALUES
(1, '10', 1, '2017-04-30', '17:21:00', '18:21:00', 'This is a test of the meeting notes. Session Id should be 1.\r\n'),
(1, '10', 2, '2017-04-30', '17:21:00', '18:21:00', 'Meeting Notes of Session Number 2. Meeting went good.'),
(2, '10', 3, '2017-04-30', '17:22:00', '18:22:00', '  Session Number 3 was done. Sarah has done well.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`empId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `empId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
