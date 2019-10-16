-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2019 at 08:08 PM
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
-- Table structure for table `admindetails`
--

CREATE TABLE `admindetails` (
  `userName` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admindetails`
--

INSERT INTO `admindetails` (`userName`, `Password`) VALUES
('Admin', '$2y$10$ApkRpE.I4lIJp5gM4y5gt.8MBRMLdQC4O9s.u/jae0GD9yfyRnKT.');

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
(6, 0, 1, 5),
(7, 5, 0, 5);

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
(6, 'infant_Drake', 'harmanrayat@gmail.com', '$2y$10$7nZ8dVY6PG1iRnZHKPmtQeoHNL1CJ/JqJfU7QWRbi0eP3TwgmusiS'),
(7, 'finch01', 'finchflinch01@gmail.com', '$2y$10$Ir.XlQjJj4cUmaKNoA/vc.ROfpJPFnkyyLTlQbCgnPPr.IWrRqqA.');

-- --------------------------------------------------------

--
-- Table structure for table `playerscore`
--

CREATE TABLE `playerscore` (
  `userID` int(11) NOT NULL,
  `saves` int(11) NOT NULL,
  `goals` int(11) NOT NULL,
  `savesMissed` int(11) NOT NULL,
  `scoreTotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `playerscore`
--

INSERT INTO `playerscore` (`userID`, `saves`, `goals`, `savesMissed`, `scoreTotal`) VALUES
(6, 38, 38, 284, 82),
(7, 54, 40, 42, 119);

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
(6, 'infant_Drake', 'harmanrayat@gmail.com', '$2y$10$7nZ8dVY6PG1iRnZHKPmtQeoHNL1CJ/JqJfU7QWRbi0eP3TwgmusiS', 1, '23fe37bd429e3a5e334931e1c78d0748'),
(7, 'finch01', 'finchflinch01@gmail.com', '$2y$10$Ir.XlQjJj4cUmaKNoA/vc.ROfpJPFnkyyLTlQbCgnPPr.IWrRqqA.', 1, '907f23aa3b068e6bd1f9639cdf2be24e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admindetails`
--
ALTER TABLE `admindetails`
  ADD UNIQUE KEY `Password` (`Password`);

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
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
