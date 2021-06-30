-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2021 at 07:25 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

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
-- Table structure for table `studentbookingtbl`
--

CREATE TABLE `studentbookingtbl` (
  `bid` int(11) NOT NULL,
  `toolID` int(11) NOT NULL,
  `studentID` int(11) NOT NULL,
  `studentOption` varchar(18) NOT NULL,
  `purpose` varchar(150) NOT NULL,
  `BookedDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `returnDate` date NOT NULL,
  `ActiveStatus` int(5) NOT NULL,
  `BookStatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `c_id` int(11) NOT NULL,
  `CategoryName` varchar(45) NOT NULL,
  `Description` varchar(100) NOT NULL,
  `Is_Active` int(5) NOT NULL,
  `PostDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`c_id`, `CategoryName`, `Description`, `Is_Active`, `PostDate`) VALUES
(1, 'Computer', 'all personal computers must be in this category except computer laptops', 1, '2021-06-21 19:23:32'),
(2, 'Laptop', 'all Laptops must be in this category', 1, '2021-06-21 19:24:27'),
(3, 'iPads', 'all iPads must be in this Category', 1, '2021-06-21 20:35:03'),
(4, 'Projector', 'all Projector must be in this Categories', 1, '2021-06-23 15:02:46'),
(5, 'PP pointer laser', 'All PP pointer laser', 1, '2021-06-23 15:18:24');

-- --------------------------------------------------------

--
-- Table structure for table `tblstudent`
--

CREATE TABLE `tblstudent` (
  `id` int(11) NOT NULL,
  `Firstname` varchar(45) NOT NULL,
  `Lastname` varchar(45) NOT NULL,
  `email` varchar(50) NOT NULL,
  `class` varchar(6) NOT NULL,
  `department` varchar(12) NOT NULL,
  `profilePicture` varchar(200) NOT NULL,
  `password` varchar(18) NOT NULL,
  `AddedDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `Active_Status` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblstudent`
--

INSERT INTO `tblstudent` (`id`, `Firstname`, `Lastname`, `email`, `class`, `department`, `profilePicture`, `password`, `AddedDate`, `Active_Status`) VALUES
(1, 'gatare', 'emm', 'gatare@gmail.com', 'l2', 'IT', '0eb07b9d0c1a9a542ec5a567db66416b.jpg', '123', '2021-06-23 11:10:37', 1),
(2, 'claude', 'gashumba', 'gashumba@gmail.com', 'l3', 'RRE', '650580b75c0e03d3f6a13689899fe6d1.png', '123', '2021-06-23 11:26:44', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbltools`
--

CREATE TABLE `tbltools` (
  `id` int(11) NOT NULL,
  `Toolname` varchar(45) NOT NULL,
  `ToolImage` varchar(200) NOT NULL,
  `ToolCategory` varchar(11) NOT NULL,
  `ToolDescription` varchar(100) NOT NULL,
  `isAllowedBy` varchar(11) NOT NULL,
  `ActiveStatus` int(5) NOT NULL,
  `response_status` int(11) NOT NULL,
  `PostedDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbltools`
--

INSERT INTO `tbltools` (`id`, `Toolname`, `ToolImage`, `ToolCategory`, `ToolDescription`, `isAllowedBy`, `ActiveStatus`, `response_status`, `PostedDate`) VALUES
(1, 'Hp probook enock', '1e6ae4ada992769567b71815f124fac5.jpg', '2', 'HP laptop 6470b has serial number of CNU343C71J', 'student', 1, 0, '2021-06-21 20:31:10'),
(2, 'windows ipad', 'd6f75c8e536992277cfe22018e8a7d19.jpg', '3', 'windows iPad', 'student', 1, 0, '2021-06-21 20:35:42'),
(3, 'Hp proBook 6470b', 'c13471728a554cabc9e56fe42c9b7a52.jpg', '2', 'HP laptop 6470b has serial number of CNU343C71J', 'student', 1, 0, '2021-06-21 20:36:55'),
(4, 'Sony projector', '2d99ae9e904f880eef8feb4e61882b79.jpg', '4', 'Sony 123 projector', 'teacher', 1, 0, '2021-06-23 15:03:32'),
(5, 'Acer projector', 'b9fb9d37bdf15a699bc071ce49baea53.jpg', '4', 'Acer 27J projector', 'teacher', 1, 0, '2021-06-23 15:04:08'),
(6, '21 pointer', '9e6a616dbccf1f65810a30ca594b2f11.jpg', '5', '21 pointer', 'teacher', 1, 0, '2021-06-23 15:19:35'),
(7, ' pp pen red laser pointer', 'd08213c436a853e74a3069bb6c9e4968.jpg', '5', ' pp pen red laser pointer', 'student', 1, 0, '2021-06-23 15:20:23'),
(8, 'wi-fi pen red laser pointer', '082815eca1dbe251682c73d9b681eaa3.jpg', '5', 'wi-fi pen red laser pointer', 'student', 1, 0, '2021-06-23 15:20:59'),
(9, 'windows pc', '55ccf27d26d7b23839986b6ae2e447ab.jpg', '2', 'windows pc and has windows 10', 'student', 1, 0, '2021-06-23 15:46:40'),
(10, 'Acer', 'efc1a80c391be252d7d777a437f86870.jpg', '2', 'acer ', 'student', 1, 0, '2021-06-23 18:24:37'),
(11, 'HP envy 32', '5af9f260d85e2151c5615d6b6ade9a6b.jpg', '1', 'HP envy 32', 'student', 1, 0, '2021-06-28 06:52:14');

-- --------------------------------------------------------

--
-- Table structure for table `teacherbookingtbl`
--

CREATE TABLE `teacherbookingtbl` (
  `tbid` int(11) NOT NULL,
  `toolID` int(11) NOT NULL,
  `teacherID` int(11) NOT NULL,
  `staffOption` varchar(18) NOT NULL,
  `purpose` varchar(150) NOT NULL,
  `BookedDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `returnDate` date NOT NULL,
  `ActiveStatus` int(5) NOT NULL,
  `BookStatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `teachertbl`
--

CREATE TABLE `teachertbl` (
  `tid` int(11) NOT NULL,
  `Firstname` varchar(45) NOT NULL,
  `Lastname` varchar(45) NOT NULL,
  `phoneNumber` varchar(16) NOT NULL,
  `email` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(18) NOT NULL,
  `ActiveStatus` int(11) NOT NULL,
  `AddedDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachertbl`
--

INSERT INTO `teachertbl` (`tid`, `Firstname`, `Lastname`, `phoneNumber`, `email`, `username`, `password`, `ActiveStatus`, `AddedDate`) VALUES
(1, 'enock', 'meston', '0783982872', 'enock11@gmail.com', 'enock', '123', 1, '2021-06-23 12:02:20');

-- --------------------------------------------------------

--
-- Table structure for table `usertbl`
--

CREATE TABLE `usertbl` (
  `uid` int(11) NOT NULL,
  `Firstname` varchar(45) NOT NULL,
  `Lastname` varchar(45) NOT NULL,
  `phoneNumber` varchar(16) NOT NULL,
  `email` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(18) NOT NULL,
  `ActiveStatus` int(11) NOT NULL,
  `AddedDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertbl`
--

INSERT INTO `usertbl` (`uid`, `Firstname`, `Lastname`, `phoneNumber`, `email`, `username`, `password`, `ActiveStatus`, `AddedDate`) VALUES
(1, 'enock', 'ndagijimana', '0783982872', 'ndagijimanaenock11@gmail.com', 'enock', '123', 1, '2021-06-21 15:57:25'),
(2, 'emanuel', 'Gatare', '0783982873', 'gatare11@gmail.com', 'gatare', '123', 1, '2021-06-21 17:30:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `studentbookingtbl`
--
ALTER TABLE `studentbookingtbl`
  ADD PRIMARY KEY (`bid`),
  ADD KEY `studentbookingtbl_ibfk_1` (`studentID`),
  ADD KEY `toolID` (`toolID`);

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `tblstudent`
--
ALTER TABLE `tblstudent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbltools`
--
ALTER TABLE `tbltools`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacherbookingtbl`
--
ALTER TABLE `teacherbookingtbl`
  ADD PRIMARY KEY (`tbid`),
  ADD KEY `toolID` (`toolID`),
  ADD KEY `teacherID` (`teacherID`);

--
-- Indexes for table `teachertbl`
--
ALTER TABLE `teachertbl`
  ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `usertbl`
--
ALTER TABLE `usertbl`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `studentbookingtbl`
--
ALTER TABLE `studentbookingtbl`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblstudent`
--
ALTER TABLE `tblstudent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbltools`
--
ALTER TABLE `tbltools`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `teacherbookingtbl`
--
ALTER TABLE `teacherbookingtbl`
  MODIFY `tbid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `teachertbl`
--
ALTER TABLE `teachertbl`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `usertbl`
--
ALTER TABLE `usertbl`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `studentbookingtbl`
--
ALTER TABLE `studentbookingtbl`
  ADD CONSTRAINT `studentbookingtbl_ibfk_1` FOREIGN KEY (`studentID`) REFERENCES `tblstudent` (`id`),
  ADD CONSTRAINT `studentbookingtbl_ibfk_2` FOREIGN KEY (`toolID`) REFERENCES `tbltools` (`id`);

--
-- Constraints for table `teacherbookingtbl`
--
ALTER TABLE `teacherbookingtbl`
  ADD CONSTRAINT `teacherbookingtbl_ibfk_1` FOREIGN KEY (`toolID`) REFERENCES `tbltools` (`id`),
  ADD CONSTRAINT `teacherbookingtbl_ibfk_2` FOREIGN KEY (`teacherID`) REFERENCES `teachertbl` (`tid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
