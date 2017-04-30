-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2017 at 11:16 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quotations`
--

-- --------------------------------------------------------

--
-- Table structure for table `agents`
--

CREATE TABLE `agents` (
  `agentId` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agents`
--

INSERT INTO `agents` (`agentId`, `name`, `password`) VALUES
(100, 'Haswin Vidanage', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `dbquot`
--

CREATE TABLE `dbquot` (
  `orderNo` int(11) NOT NULL,
  `width` int(11) DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `guides` varchar(100) DEFAULT NULL,
  `side` varchar(100) DEFAULT NULL,
  `hand1` varchar(100) DEFAULT NULL,
  `hand2` varchar(100) DEFAULT NULL,
  `color` varchar(100) DEFAULT NULL,
  `position` varchar(100) DEFAULT NULL,
  `title` varchar(10) DEFAULT NULL,
  `fname` varchar(100) DEFAULT NULL,
  `lname` varchar(100) DEFAULT NULL,
  `streetadd` varchar(150) DEFAULT NULL,
  `address` varchar(150) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `postal` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `comment` varchar(500) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `agentID` int(11) DEFAULT NULL,
  `approved` varchar(4) DEFAULT 'no',
  `orderDate` date DEFAULT NULL,
  `salesComments` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dbquot`
--

INSERT INTO `dbquot` (`orderNo`, `width`, `height`, `guides`, `side`, `hand1`, `hand2`, `color`, `position`, `title`, `fname`, `lname`, `streetadd`, `address`, `city`, `state`, `postal`, `country`, `email`, `mobile`, `comment`, `total`, `agentID`, `approved`, `orderDate`, `salesComments`) VALUES
(1, 1000, 500, 'Yes', 'Left', 'Black Smooth 2 channel c/w holder', 'Black Smooth 2 channel c/w holder', 'Fir green', 'Inside Face Fit Installation', 'Mr', 'Haswin ', 'Vidanage', 'sample', 'sample', 'sample', 'sample', 'sample', 'Sri Lanka', 'sample@mail.com', '0778989898', 'samplesample', 150000, 100, 'yes', '2015-04-28', 'Contact your regional manager and proceed.'),
(2, 1000, 2000, 'Yes', 'Left', 'Black Smooth 4 channel c/w holder', 'Black Smooth 2 channel c/w holder', 'White', 'External Face Fit Installation', 'Mr', 'Dinuka', 'Prasad', 'sample', 'sample', 'sample', 'sample', 'sample', 'Sri Lanka', 'sample@gmail.com', '0777778888', 'samplesample', 150000, 100, 'yes', '2015-04-28', 'Contact your regional manager and proceed.'),
(3, 500, 6000, 'Yes', 'Left', 'Black Smooth 2 channel c/w holder', 'Black Smooth 2 channel c/w holder', 'Light Beige', 'Inbetween Opening Installation - Roll Facing Inwards', 'Mr', 'Madu', 'Madu', 'sample', 'sample', 'sample', 'sample', 'sample', 'Sri Lanka', 'sample@mail.com', '0778889999', 'samplesample', 150000, 100, 'yes', '2015-04-28', 'Contact your regional manager and proceed.'),
(4, 999, 6020, 'Yes', 'Left', 'Black Smooth 2 channel c/w holder', 'Black Smooth 2 channel c/w holder', 'Fir green', 'Inside Face Fit Installation', 'Mr', 'Nimasha', 'Nim', 'sample', 'sample', 'sample', 'sample', 'sample', 'Sri Lanka', 'sample@mail.com', '0778890990', 'samplesample', 150000, 100, 'no', '2015-04-28', 'Cancel order No Stocks.'),
(5, 880, 6696, 'Yes', 'Left', 'Black Smooth 2 channel c/w holder', 'Black Smooth 2 channel c/w holder', 'Fir green', 'Inside Face Fit Installation', 'Mr', 'John', 'Doe', 'sample', 'sample', 'sample', 'sample', 'sample', 'Sri Lanka', 'sample@mail.com', '0778889977', 'samplesample', 150000, 100, 'no', '2015-04-29', 'Cancel order No Materials.'),
(6, 550, 999, 'Yes', 'Left', 'Black Smooth 2 channel c/w holder', 'Black Smooth 2 channel c/w holder', 'Fir green', 'Inside Face Fit Installation', 'Mr', 'Kevin', 'Durrant', 'sample', 'sample', 'sample', 'sample', 'sample', 'Sri Lanka', 'sample@mail.com', '0777779888', 'samplesample', 150000, 100, 'no', '2015-04-29', 'Cancel order No Stocks.'),
(7, 8500, 8000, 'Yes', 'Left', 'Black Smooth 2 channel c/w holder', 'Black Smooth 2 channel c/w holder', 'Fir green', 'Inside Face Fit Installation', 'Mr', 'Michael', 'Jordan', 'sample', 'sample', 'sample', 'sample', 'sample', 'Sri Lanka', 'sample@mail.com', '0777787878', 'samplesample', 150000, 100, 'yes', '2015-04-29', 'Contact your regional manager and proceed.'),
(8, 8900, 8900, 'Yes', 'Left', 'Black Smooth 2 channel c/w holder', 'Black Smooth 2 channel c/w holder', 'Fir green', 'Inside Face Fit Installation', 'Mr', 'Ray', 'Doe', 'sample', 'sample', 'sample', 'sample', 'sample', 'Sri Lanka', 'sample@mail.com', '0777777878', 'samplesample', 150000, 100, 'no', '2015-04-29', 'Cancel order No Stocks.'),
(9, 800, 8020, 'Yes', 'Left', 'Black Smooth 2 channel c/w holder', 'Black Smooth 2 channel c/w holder', 'Anthracite', 'Inbetween Opening Installation - Roll Facing Outwards', 'Mr', 'David', 'Hass', 'sample', 'sample', 'sample', 'sample', 'sample', 'Sri Lanka', 'sample@mail.com', '0789899989', 'samplesample', 150000, 100, 'no', '2015-04-29', NULL),
(10, 500, 6006, 'Yes', 'Left', 'Black Smooth 2 channel c/w holder', 'Black Smooth 2 channel c/w holder', 'Fir green', 'Inside Face Fit Installation', 'Mrs', 'Dina', 'Joe', 'sample', 'sample', 'sample', 'sample', 'sample', 'Sri Lanka', 'sample@mail.com', '0778899989', 'samplesample', 150000, 100, 'no', '2015-04-29', NULL),
(11, 545, 5454, 'Yes', 'Left', 'Black Smooth 2 channel c/w holder', 'Black Smooth 2 channel c/w holder', 'Fir green', 'Inside Face Fit Installation', 'Mr', 'Ross', 'Tail', 'sample', 'sample', 'sample', 'sample', 'sample', 'Sri Lanka', 'sample@mail.com', '0788988989', 'samplesample', 150000, 100, 'no', '2015-04-29', 'Declined'),
(12, 5500, 660, 'Yes', 'Left', 'Black Smooth 2 channel c/w holder', 'Black Smooth 2 channel c/w holder', 'Fir green', 'Inside Face Fit Installation', 'Mr', 'Dave', 'Sim', 'sample', 'sample', 'sample', 'sample', 'sample', 'Sri Lanka', 'sample@mail.com', '0778787897', 'samplesample', 150000, 100, 'yes', '2015-04-30', 'Contact your regional manager and proceed.'),
(13, 8800, 650, 'Yes', 'Left', 'Black Smooth 2 channel c/w holder', 'Black Smooth 2 channel c/w holder', 'Fir green', 'Inside Face Fit Installation', 'Mr', 'Naduni', 'Madara', 'sample', 'sample', 'sample', 'sample', 'sample', 'Sri Lanka', 'sample@mail.com', '0777798798', 'samplesample', 150000, 100, 'no', '2015-04-30', 'Cancel order No Stocks.'),
(14, 8000, 8908, 'Yes', 'Left', 'Black Smooth 2 channel c/w holder', 'Black Smooth 2 channel c/w holder', 'Fir green', 'Inside Face Fit Installation', 'Mr', 'Jack', 'Been', 'sample', 'sample', 'sample', 'sample', 'sample', 'Sri Lanka', 'sample@mail.com', '0777877878', 'samplesample', 150000, 100, 'yes', '2015-04-30', 'Contact your regional manager and proceed.');

-- --------------------------------------------------------

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
(1, 'std', 'std', 'std', 'admin', 'student'),
(2, 'sara', 'carter', 'sarac', 'saracarter123', 'student'),
(3, 'john', 'doe', 'johnd', 'johndoe123', 'student'),
(4, 'Johny ', 'depp  ', 'johnnyd', 'johnydepp123', 'student'),
(5, 'Jim ', 'Cook  ', 'jimc', 'jimcook123', 'student'),
(6, 'mila', 'kunis', 'milak', 'milakunis123', 'lecturer'),
(7, 'devin ', 'ball', 'devinb', 'devinball123', 'lecturer'),
(8, 'sam', 'smith', 'sams', 'samsmith123', 'lecturer'),
(9, 'adminSales', 'adminSales', 'adminSales', 'admin', 'sales'),
(10, 'lec', 'lec', 'lec', 'admin', 'lecturer'),
(11, 'HashRegT1 ', 'regt1  ', 'regt1', 'admin ', 'agent '),
(12, 'testreg2 ', 'testreg2  ', 'testreg2', 'testreg2 ', 'agent '),
(13, 'regtest3 ', 'regtest3  ', 'regtest3', 'regtest3 ', 'agent '),
(14, 'reg4 ', 'reg4  ', 'reg4', 'reg4 ', 'agent '),
(15, 'reg5 ', 'reg5  ', 'reg5', 'reg5 ', 'agent '),
(16, 'reg6 ', 'reg6  ', 'reg6', 'reg6 ', 'agent '),
(17, 'reg7 ', 'reg7  ', 'reg7', 'reg7 ', 'agent '),
(18, 'Reg7 ', 'Reg7  ', 'Reg7', 'Reg7 ', 'agent '),
(19, 'reg8 ', 'reg8  ', 'reg8', 'reg8 ', 'agent '),
(20, 'reg9 ', 'reg9  ', 'reg9', 'reg9 ', 'agent '),
(21, 'lec10 ', 'lec10  ', 'lec10', 'lec10 ', 'agent '),
(22, 'qad1 ', 'qad1  ', 'qad1', 'qad1 ', 'agent '),
(23, 'qwe1 ', 'qwe1  ', 'qwe1', 'qwe1 ', 'agent '),
(24, 'q ', 'q  ', 'q', 'q ', 'agent ');

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
(3434, 'sdfsd', 1, '2018-02-02', '14:01:00', '02:34:00', '              3443'),
(3, 'hashi', 1, '2017-04-06', '02:01:00', '14:01:00', '        yfftftftff      '),
(1, 'teddy', 123456, '2017-01-01', '01:00:00', '01:00:00', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(6, 'lec', 3, '2017-04-21', '01:00:00', '02:00:00', '              jajdhsjhdshdksjhdjkshfkfhd'),
(7, 'zone', 4, '2018-02-02', '04:06:00', '05:06:00', '              hajhdjas'),
(2, 'lec', 1, '2017-03-02', '15:45:00', '04:04:00', '              4535'),
(2, 'lec', 2, '2018-02-02', '14:01:00', '14:01:00', '              wewewe'),
(3, 'lec', 1, '2017-04-09', '02:01:00', '14:01:00', '              eweweww'),
(1, 'haswin', 99, '2017-01-01', '01:00:00', '01:00:00', '              test'),
(8, 'lec', 1221, '2017-01-01', '03:00:00', '01:01:00', 'qweqe'),
(5, 'asdad', 123132, '2018-01-01', '01:00:00', '01:00:00', 'sadasdasd       '),
(2, 'qwe123', 1299, '2017-01-01', '01:00:00', '01:00:00', 'qwerty              '),
(3, 'hash', 9876, '2017-01-01', '01:00:00', '01:00:00', '12123 comment              '),
(1, 'hashd', 987, '2017-01-01', '01:00:00', '01:00:00', '0987              '),
(1, '10', 123, '2017-01-01', '01:00:00', '01:00:00', 'waht  '),
(2, '10', 1232, '2017-01-01', '01:00:00', '01:00:00', 'Whatever              '),
(1, '10', 1321, '2017-01-01', '01:00:00', '01:00:00', 'Whatever   '),
(1, '10', 12311, '2017-01-01', '01:00:00', '01:00:00', 'Whatever      '),
(2, '10', 666, '2017-01-01', '01:00:00', '13:00:00', 'DamienJ              '),
(3, '10', 333, '2017-01-01', '01:00:00', '01:00:00', 'MJ         '),
(2, '10', 9802, '2017-01-01', '01:00:00', '01:00:00', 'asdasd             '),
(1, '10', 123457, '2017-04-22', '03:00:00', '01:00:00', 'ddevsadadsad'),
(3, '10', 123458, '2017-04-22', '20:43:00', '21:43:00', '  My Meeting Note'),
(1, '10', 123459, '2017-04-22', '21:40:00', '22:40:00', '  Time Test NOW!'),
(1, '10', 123460, '2017-04-22', '22:35:00', '23:35:00', 'GOOD MORNING !');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agents`
--
ALTER TABLE `agents`
  ADD PRIMARY KEY (`agentId`);

--
-- Indexes for table `dbquot`
--
ALTER TABLE `dbquot`
  ADD PRIMARY KEY (`orderNo`),
  ADD KEY `fk_agents` (`agentID`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`empId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dbquot`
--
ALTER TABLE `dbquot`
  MODIFY `orderNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `empId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `dbquot`
--
ALTER TABLE `dbquot`
  ADD CONSTRAINT `fk_agents` FOREIGN KEY (`agentID`) REFERENCES `agents` (`agentId`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
