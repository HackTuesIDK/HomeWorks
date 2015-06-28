-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2015 at 12:30 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tues`
--

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE IF NOT EXISTS `classes` (
`UID` int(10) unsigned NOT NULL,
  `name` tinytext NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`UID`, `name`) VALUES
(1, '8Ð'),
(2, '8Ð‘'),
(3, '8Ð’'),
(4, '8Ð“'),
(5, '9Ð'),
(6, '9Ð‘'),
(7, '9Ð’'),
(8, '9Ð“'),
(9, '10Ð'),
(10, '10Ð‘'),
(11, '10Ð’'),
(12, '10Ð“'),
(13, '11Ð'),
(14, '11Ð‘'),
(15, '11Ð’'),
(16, '11Ð“'),
(17, '12Ð'),
(18, '12Ð‘'),
(19, '12Ð’'),
(20, '12Ð“');

-- --------------------------------------------------------

--
-- Table structure for table `homeworks`
--

CREATE TABLE IF NOT EXISTS `homeworks` (
`UID` int(10) unsigned NOT NULL,
  `SubjectID` int(10) unsigned NOT NULL,
  `Description` text NOT NULL,
  `Posted` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `IP` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE IF NOT EXISTS `tasks` (
  `ClassID` int(10) unsigned NOT NULL,
  `HWID` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
 ADD PRIMARY KEY (`UID`);

--
-- Indexes for table `homeworks`
--
ALTER TABLE `homeworks`
 ADD PRIMARY KEY (`UID`), ADD UNIQUE KEY `UID` (`UID`), ADD KEY `SubjectID` (`SubjectID`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
 ADD KEY `ClassID` (`ClassID`,`HWID`), ADD KEY `HWID` (`HWID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
MODIFY `UID` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `homeworks`
--
ALTER TABLE `homeworks`
MODIFY `UID` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`HWID`) REFERENCES `homeworks` (`UID`),
ADD CONSTRAINT `tasks_ibfk_2` FOREIGN KEY (`ClassID`) REFERENCES `classes` (`UID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
