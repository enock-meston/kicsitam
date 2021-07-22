-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 22, 2021 at 08:51 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kicsitam`
--

-- --------------------------------------------------------

--
-- Table structure for table `durable-student-Asset`
--

CREATE TABLE `durable-student-Asset` (
  `did` int(11) NOT NULL,
  `assetname` varchar(45) NOT NULL,
  `serialNumber` varchar(40) NOT NULL,
  `ToolImage` varchar(200) NOT NULL,
  `studentID` int(11) NOT NULL,
  `MAC Adress` varchar(100) NOT NULL,
  `QR-Code` varchar(100) NOT NULL,
  `QR-CodeImage` varchar(100) NOT NULL,
  `PostedDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `returningDate` date NOT NULL,
  `Active_Status` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `durable-student-Asset`
--
ALTER TABLE `durable-student-Asset`
  ADD PRIMARY KEY (`did`),
  ADD KEY `studentID` (`studentID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `durable-student-Asset`
--
ALTER TABLE `durable-student-Asset`
  MODIFY `did` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `durable-student-Asset`
--
ALTER TABLE `durable-student-Asset`
  ADD CONSTRAINT `durable-student-Asset_ibfk_1` FOREIGN KEY (`studentID`) REFERENCES `tblstudent` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
