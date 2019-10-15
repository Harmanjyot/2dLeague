-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2019 at 07:01 PM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `2dleague`
--

-- --------------------------------------------------------

--
-- Table structure for table `matchesplayed`
--

CREATE TABLE `matchesplayed` (
  `userID` int(11) NOT NULL,
  `matchesWon` int(11) NOT NULL,
  `matchesLost` int(11) NOT NULL,
  `matchesPlayed` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matchesplayed`
--

INSERT INTO `matchesplayed` (`userID`, `matchesWon`, `matchesLost`, `matchesPlayed`) VALUES
(4, 3, 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `playerdetails`
--

CREATE TABLE `playerdetails` (
  `userID` int(11) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `emailID` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `playerdetails`
--

INSERT INTO `playerdetails` (`userID`, `userName`, `emailID`, `Password`) VALUES
(4, 'infant_Drake', 'harmanrayat@gmail.com', '$2y$10$FUpS.wGer6uW8oymnjbdc.zu/.cQYi08.oIeJROHqaskccOHZ63Q6');

-- --------------------------------------------------------

--
-- Table structure for table `playerscore`
--

CREATE TABLE `playerscore` (
  `userID` int(11) NOT NULL,
  `goals` int(11) NOT NULL,
  `saves` int(11) NOT NULL,
  `shots` int(11) NOT NULL,
  `savesMissed` int(11) NOT NULL,
  `scoreTotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `playerscore`
--

INSERT INTO `playerscore` (`userID`, `goals`, `saves`, `shots`, `savesMissed`, `scoreTotal`) VALUES
(4, 5, 6, 10, 20, 10);

-- --------------------------------------------------------

--
-- Table structure for table `verified`
--

CREATE TABLE `verified` (
  `userID` int(11) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `vkey` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `verified`
--

INSERT INTO `verified` (`userID`, `userName`, `email`, `Password`, `status`, `vkey`) VALUES
(4, 'infant_Drake', 'harmanrayat@gmail.com', '$2y$10$FUpS.wGer6uW8oymnjbdc.zu/.cQYi08.oIeJROHqaskccOHZ63Q6', 1, '863d05aaa88468554c2c3d2eafb0b40e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `matchesplayed`
--
ALTER TABLE `matchesplayed`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `playerdetails`
--
ALTER TABLE `playerdetails`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `userID` (`userID`),
  ADD UNIQUE KEY `userName` (`userName`),
  ADD UNIQUE KEY `emailID` (`emailID`);

--
-- Indexes for table `playerscore`
--
ALTER TABLE `playerscore`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `verified`
--
ALTER TABLE `verified`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `userName` (`userName`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `vkey` (`vkey`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `verified`
--
ALTER TABLE `verified`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `matchesplayed`
--
ALTER TABLE `matchesplayed`
  ADD CONSTRAINT `matchesplayed_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `verified` (`userID`) ON DELETE CASCADE;

--
-- Constraints for table `playerdetails`
--
ALTER TABLE `playerdetails`
  ADD CONSTRAINT `playerdetails_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `verified` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `playerscore`
--
ALTER TABLE `playerscore`
  ADD CONSTRAINT `playerscore_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `verified` (`userID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
