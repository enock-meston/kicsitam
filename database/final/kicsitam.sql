-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 13, 2021 at 09:10 AM
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
-- Table structure for table `commenttbl`
--

CREATE TABLE `commenttbl` (
  `cid` int(11) NOT NULL,
  `staffreporttbl` varchar(11) NOT NULL,
  `studentreporttbl` varchar(11) NOT NULL,
  `comment` varchar(150) NOT NULL,
  `postedDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `ActiveStatus` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `commenttbl`
--

INSERT INTO `commenttbl` (`cid`, `staffreporttbl`, `studentreporttbl`, `comment`, `postedDate`, `ActiveStatus`) VALUES
(5, '20', '', 'i give you all', '2021-07-12 08:18:21', 1),
(6, '', '', '', '2021-07-12 08:28:27', 1),
(7, '', '', '', '2021-07-12 08:28:42', 1),
(8, '', '', '', '2021-07-12 08:28:45', 1),
(9, '', '', '', '2021-07-12 08:28:48', 1),
(10, '', '', '', '2021-07-12 08:28:51', 1),
(11, '', '', '', '2021-07-12 08:28:59', 1),
(12, '', '', '', '2021-07-12 08:29:03', 1);

-- --------------------------------------------------------

--
-- Table structure for table `crashedassettbl`
--

CREATE TABLE `crashedassettbl` (
  `id` int(11) NOT NULL,
  `toolID` int(11) NOT NULL,
  `BookerName` varchar(11) NOT NULL,
  `CrashedDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `Status` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `financetbl`
--

CREATE TABLE `financetbl` (
  `fid` int(11) NOT NULL,
  `Firstname` varchar(45) NOT NULL,
  `Lastname` varchar(45) NOT NULL,
  `phoneNumber` varchar(16) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(18) NOT NULL,
  `ActiveStatus` int(11) NOT NULL,
  `AddedDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `financetbl`
--

INSERT INTO `financetbl` (`fid`, `Firstname`, `Lastname`, `phoneNumber`, `email`, `username`, `password`, `ActiveStatus`, `AddedDate`) VALUES
(1, 'Adelle', 'Mushikiwabo', '0783982874', 'adelle@gmail.com', 'adelle', '123', 1, '2021-07-01 05:36:04');

-- --------------------------------------------------------

--
-- Table structure for table `qrcodeasset`
--

CREATE TABLE `qrcodeasset` (
  `id` int(11) NOT NULL,
  `serialnumber` varchar(50) NOT NULL,
  `datebooking` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `qrcodeasset`
--

INSERT INTO `qrcodeasset` (`id`, `serialnumber`, `datebooking`, `status`) VALUES
(1, 'Agfjfj', '2021-07-03 22:10:44', 0),
(2, 'A001-enock', '2021-07-03 22:11:50', 1),
(3, 'A002-mushime', '2021-07-03 22:12:15', 1),
(4, 'A003-Erick', '2021-07-03 22:12:29', 1),
(5, '009-SHAD', '2021-07-05 12:17:15', 0),
(6, '009-SHAD', '2021-07-05 12:19:57', 0),
(7, '009-SHAD', '2021-07-05 12:20:02', 0),
(8, '009-SHAD', '2021-07-05 12:20:06', 0),
(9, '009-SHAD', '2021-07-05 12:20:35', 0);

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
  `returnDate` datetime NOT NULL,
  `ActiveStatus` int(5) NOT NULL,
  `BookStatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentbookingtbl`
--

INSERT INTO `studentbookingtbl` (`bid`, `toolID`, `studentID`, `studentOption`, `purpose`, `BookedDate`, `returnDate`, `ActiveStatus`, `BookStatus`) VALUES
(5, 1, 2, 'secondary', 'i need to finish my work', '2021-07-07 12:32:41', '2021-07-07 00:00:00', 1, 1),
(6, 3, 2, 'secondary', 'me to', '2021-07-07 12:33:00', '2021-07-15 00:00:00', 1, 1),
(7, 9, 2, 'secondary', 'another one', '2021-07-07 12:33:21', '2021-07-08 00:00:00', 1, 1),
(8, 7, 2, 'primary', 'hello', '2021-07-07 12:33:52', '2021-07-08 00:00:00', 1, 1),
(9, 10, 2, 'secondary', 'i need to finish work', '2021-07-07 18:05:39', '2021-07-09 00:00:00', 1, 1),
(10, 8, 2, 'secondary', 'ntiza', '2021-07-07 18:06:35', '2021-07-08 00:00:00', 1, 1);

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
(5, 'PP pointer laser', 'All PP pointer laser', 1, '2021-06-23 15:18:24'),
(6, 'Camera', 'All cameras must be in this Category', 1, '2021-07-05 15:26:54');

-- --------------------------------------------------------

--
-- Table structure for table `tblstaffreport`
--

CREATE TABLE `tblstaffreport` (
  `id` int(11) NOT NULL,
  `staffnames` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `staffOption` varchar(18) NOT NULL,
  `Assetname` varchar(45) NOT NULL,
  `purpose` varchar(100) NOT NULL,
  `bookedDate` varchar(45) NOT NULL,
  `returnedDate` varchar(45) NOT NULL,
  `ReportDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblstaffreport`
--

INSERT INTO `tblstaffreport` (`id`, `staffnames`, `email`, `staffOption`, `Assetname`, `purpose`, `bookedDate`, `returnedDate`, `ReportDate`) VALUES
(9, 'enock  meston', 'enock11@gmail.com', 'secondary', 'Sony projector', 'hello', '2021-07-07 14:38:36', '2021-07-07', '2021-07-07 12:44:27'),
(10, 'enock  meston', 'enock11@gmail.com', 'secondary', 'Sony projector', 'hello', '2021-07-07 14:38:36', '2021-07-07', '2021-07-07 12:59:46'),
(11, 'enock  meston', 'enock11@gmail.com', 'secondary', 'Acer projector', 'i need projector', '2021-07-07 14:38:58', '2021-07-07', '2021-07-07 13:01:33'),
(12, 'enock  meston', 'enock11@gmail.com', 'secondary', 'Acer projector', 'i need projector', '2021-07-07 14:38:58', '2021-07-07', '2021-07-07 13:02:52'),
(13, 'enock  meston', 'enock11@gmail.com', 'secondary', '21 pointer', 'jb', '2021-07-07 14:43:21', '2021-07-07', '2021-07-07 13:03:43'),
(14, 'enock  meston', 'enock11@gmail.com', 'primary', 'Hp probook enock', 'j', '2021-07-07 15:12:10', '2021-07-14', '2021-07-07 13:12:22'),
(15, 'enock  meston', 'enock11@gmail.com', 'secondary', 'Hp proBook 6470b', 'j', '2021-07-07 15:15:56', '2021-07-07', '2021-07-07 13:59:58'),
(16, 'enock  meston', 'enock11@gmail.com', 'secondary', 'Sony projector', 'i need to finish my course', '2021-07-08 16:52:50', '2021-07-09 20:53:00', '2021-07-08 14:53:22'),
(17, 'muhirwa  Allen', 'allen@gmail.com', 'secondary', 'Acer projector', 'i need to finish my work', '2021-07-10 20:47:49', '2021-07-10 21:47:00', '2021-07-12 08:29:36');

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
(1, 'gatare', 'emm', 'gatare@gmail.com', 'l2', 'IT', '0eb07b9d0c1a9a542ec5a567db66416b.jpg', 'gatare@gmail.com', '2021-06-23 11:10:37', 1),
(2, 'claude', 'gashumba', 'gashumba@gmail.com', 'l3', 'RRE', '650580b75c0e03d3f6a13689899fe6d1.png', '123', '2021-06-23 11:26:44', 1),
(3, '$firstname', '$lastname', '$email', '$class', '$department', '$newprofile', '$password', '2021-07-09 13:09:47', 1),
(4, 'muhora', 'david', 'david@gmail.com', 'l2', 'IT', '519ec7a4a11bdec22b4177e905eb97b3.jpg', '123@123123', '2021-07-09 13:24:42', 1),
(5, 'manzi', 'dawid', 'manzi@gmail.com', 'Grade ', 'RRE', '8eea2779082255cc79940394ef31b76c.JPG', '1234@1234', '2021-07-09 13:33:10', 1),
(6, 'rene', 'uzamukunda', 'rene@gmail.com', 'g3', 'IT', '8eea2779082255cc79940394ef31b76c.JPG', '1234@1234', '2021-07-09 13:42:11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblstudentreport`
--

CREATE TABLE `tblstudentreport` (
  `id` int(11) NOT NULL,
  `studentnames` varchar(60) NOT NULL,
  `class` varchar(12) NOT NULL,
  `stuOption` varchar(18) NOT NULL,
  `Assetname` varchar(45) NOT NULL,
  `purpose` varchar(100) NOT NULL,
  `bookedDate` varchar(45) NOT NULL,
  `returnedDate` varchar(45) NOT NULL,
  `ReportDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblstudentreport`
--

INSERT INTO `tblstudentreport` (`id`, `studentnames`, `class`, `stuOption`, `Assetname`, `purpose`, `bookedDate`, `returnedDate`, `ReportDate`) VALUES
(17, 'claude  gashumba', 'l3', 'primary', 'Hp probook enock', 'nkf', '2021-07-06 22:00:52', '2021-07-07', '2021-07-06 20:02:32'),
(18, '  ', '', '', '', '', '', '', '2021-07-06 20:03:25'),
(19, '$names', '$calss', '$option', '$assetname', '$pur', '$bookDate', '$returnDate', '2021-07-07 12:25:13'),
(20, 'claude  gashumba', 'l3', 'primary', 'Hp proBook 6470b', 'j', '2021-07-07 14:26:31', '2021-07-07', '2021-07-07 12:27:58'),
(21, 'claude  gashumba', 'l3', 'Select Option', 'windows ipad', 'h', '2021-07-07 14:27:05', '2021-07-08', '2021-07-07 12:29:27'),
(22, 'claude  gashumba', 'l3', 'secondary', 'Hp probook enock', 'i need to finish my work', '2021-07-07 14:32:41', '2021-07-07', '2021-07-07 12:34:16'),
(23, 'claude  gashumba', 'l3', 'secondary', 'Hp proBook 6470b', 'me to', '2021-07-07 14:33:00', '2021-07-15', '2021-07-07 12:34:53'),
(24, 'claude  gashumba', 'l3', 'secondary', 'windows pc', 'another one', '2021-07-07 14:33:21', '2021-07-08', '2021-07-07 12:35:08'),
(25, 'claude  gashumba', 'l3', 'primary', ' pp pen red laser pointer', 'hello', '2021-07-07 14:33:52', '2021-07-08', '2021-07-07 12:35:26'),
(26, 'claude  gashumba', 'l3', 'secondary', 'Acer', 'i need to finish work', '2021-07-07 20:05:39', '2021-07-09', '2021-07-07 18:08:45'),
(27, 'claude  gashumba', 'l3', 'secondary', 'wi-fi pen red laser pointer', 'ntiza', '2021-07-07 20:06:35', '2021-07-08', '2021-07-07 18:09:45');

-- --------------------------------------------------------

--
-- Table structure for table `tbltools`
--

CREATE TABLE `tbltools` (
  `id` int(11) NOT NULL,
  `Toolname` varchar(45) NOT NULL,
  `ToolImage` varchar(200) NOT NULL,
  `QRimage` varchar(100) NOT NULL,
  `serial_number` varchar(100) NOT NULL,
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

INSERT INTO `tbltools` (`id`, `Toolname`, `ToolImage`, `QRimage`, `serial_number`, `ToolCategory`, `ToolDescription`, `isAllowedBy`, `ActiveStatus`, `response_status`, `PostedDate`) VALUES
(1, 'Hp probook enock', '1e6ae4ada992769567b71815f124fac5.jpg', '', 'CNU343C71J', '2', 'HP laptop 6470b has serial number of CNU343C71J', 'student', 1, 0, '2021-06-21 20:31:10'),
(2, 'windows ipad', 'd6f75c8e536992277cfe22018e8a7d19.jpg', '', '', '3', 'windows iPad', 'student', 1, 0, '2021-06-21 20:35:42'),
(3, 'Hp proBook 6470b', 'c13471728a554cabc9e56fe42c9b7a52.jpg', '', '', '2', 'HP laptop 6470b has serial number of CNU343C71J', 'student', 1, 0, '2021-06-21 20:36:55'),
(4, 'Sony projector', '2d99ae9e904f880eef8feb4e61882b79.jpg', '', '', '4', 'Sony 123 projector', 'teacher', 1, 0, '2021-06-23 15:03:32'),
(5, 'Acer projector', 'b9fb9d37bdf15a699bc071ce49baea53.jpg', '', '', '4', 'Acer 27J projector', 'teacher', 3, 0, '2021-06-23 15:04:08'),
(6, '21 pointer', '9e6a616dbccf1f65810a30ca594b2f11.jpg', '', '', '5', '21 pointer', 'teacher', 1, 0, '2021-06-23 15:19:35'),
(7, ' pp pen red laser pointer', 'd08213c436a853e74a3069bb6c9e4968.jpg', '', '', '5', ' pp pen red laser pointer', 'student', 1, 0, '2021-06-23 15:20:23'),
(8, 'wi-fi pen red laser pointer', '082815eca1dbe251682c73d9b681eaa3.jpg', '', '', '5', 'wi-fi pen red laser pointer', 'student', 1, 0, '2021-06-23 15:20:59'),
(9, 'windows pc', '55ccf27d26d7b23839986b6ae2e447ab.jpg', '', '', '2', 'windows pc and has windows 10', 'student', 1, 0, '2021-06-23 15:46:40'),
(10, 'Acer', 'efc1a80c391be252d7d777a437f86870.jpg', '', '', '2', 'acer ', 'student', 1, 0, '2021-06-23 18:24:37'),
(11, 'HP envy 32', '5af9f260d85e2151c5615d6b6ade9a6b.jpg', '', '', '1', 'HP envy 32', 'student', 1, 0, '2021-06-28 06:52:14'),
(12, 'Doc Camera', 'df601d474e74986abf79d0774bd05ace.jpg', 'img/Doc Camera 1234.png', 'Doc Camera 1234 - enock ndagijimana', '6', 'Doc Camera 1234', 'teacher', 1, 0, '2021-07-11 05:04:27');

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
  `returnDate` datetime NOT NULL,
  `ActiveStatus` int(5) NOT NULL,
  `BookStatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacherbookingtbl`
--

INSERT INTO `teacherbookingtbl` (`tbid`, `toolID`, `teacherID`, `staffOption`, `purpose`, `BookedDate`, `returnDate`, `ActiveStatus`, `BookStatus`) VALUES
(20, 5, 5, 'secondary', 'i need to finish my work', '2021-07-10 18:47:49', '2021-07-10 21:47:00', 1, 1);

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
(1, 'enock', 'meston', '0783982872', 'enock11@gmail.com', 'enock', '123@1234', 1, '2021-06-23 12:02:20'),
(2, 'muhire', 'jean luc', '', 'muhirej@gmail.com', 'muhire', '123', 1, '2021-07-09 13:13:38'),
(3, 'Ndayisaba', 'clarise', '', 'nda@gmail.com', 'clarise', '123@12345', 1, '2021-07-09 13:37:27'),
(4, 'mucyo', 'JMV', '', 'mucyo@gmail.com', 'mucyo', '123@1234', 1, '2021-07-09 13:40:37'),
(5, 'muhirwa', 'Allen', '', 'allen@gmail.com', 'allen', 'allen@123', 1, '2021-07-09 13:45:20'),
(6, 'Uwimana', 'Chantal', '', 'uwimana@gmail.com', 'uwimana', '1234@1234', 2, '2021-07-11 09:46:09');

-- --------------------------------------------------------

--
-- Table structure for table `te_qrcodeasset`
--

CREATE TABLE `te_qrcodeasset` (
  `id` int(11) NOT NULL,
  `serialnumber` varchar(50) NOT NULL,
  `datebooking` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `te_qrcodeasset`
--

INSERT INTO `te_qrcodeasset` (`id`, `serialnumber`, `datebooking`, `status`) VALUES
(1, 'IT-001-Muhire', '2021-07-10 17:32:35', 1),
(2, 'IT-002-Muhire 22', '2021-07-10 17:33:40', 0),
(3, 'IT-002-Muhire 22', '2021-07-10 17:43:43', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tichethelptbl`
--

CREATE TABLE `tichethelptbl` (
  `id` int(11) NOT NULL,
  `persontohelp` varchar(110) NOT NULL,
  `helper` varchar(11) NOT NULL,
  `priority` varchar(15) NOT NULL,
  `category` varchar(15) NOT NULL,
  `description` varchar(200) NOT NULL,
  `ChoosedDate` varchar(100) NOT NULL,
  `PostedDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `ActiveStatus` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tichethelptbl`
--

INSERT INTO `tichethelptbl` (`id`, `persontohelp`, `helper`, `priority`, `category`, `description`, `ChoosedDate`, `PostedDate`, `ActiveStatus`) VALUES
(4, 'claude gashumba', '2', 'medium', 'software', 'j', '2021-07-03', '2021-07-03 17:34:18', 0),
(5, 'enock meston', '1', 'low', 'email', 'hlp', '2021-07-10', '2021-07-03 17:46:51', 1),
(6, '$names', '', '$priority', '$category', '$description', '$date', '2021-07-07 16:55:17', 0),
(7, 'ug  ugo', '', 'low', '', 'jh', '2021-07-07 to 2021-07-08', '2021-07-07 16:56:33', 1),
(8, 'nks  w', '', 'medium', 'network', 'jpds', '2021-07-08 to 2021-07-08', '2021-07-07 16:58:33', 1),
(9, 'ga  ga', '', 'medium', 'hardware', 'hello', '2021-07-08T19:24 to 2021-07-09T19:24', '2021-07-08 17:24:32', 1);

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
(1, 'enock', 'ndagijimana', '0783982872', 'ndagijimanaenock11@gmail.com', 'enock', '1234@1234', 1, '2021-06-21 15:57:25'),
(2, 'emanuel', 'Gatare', '0783982873', 'gatare11@gmail.com', 'gatare', '123', 1, '2021-06-21 17:30:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `commenttbl`
--
ALTER TABLE `commenttbl`
  ADD PRIMARY KEY (`cid`),
  ADD KEY `staffreporttbl` (`staffreporttbl`),
  ADD KEY `studentreporttbl` (`studentreporttbl`);

--
-- Indexes for table `crashedassettbl`
--
ALTER TABLE `crashedassettbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `financetbl`
--
ALTER TABLE `financetbl`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `qrcodeasset`
--
ALTER TABLE `qrcodeasset`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `tblstaffreport`
--
ALTER TABLE `tblstaffreport`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblstudent`
--
ALTER TABLE `tblstudent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblstudentreport`
--
ALTER TABLE `tblstudentreport`
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
-- Indexes for table `te_qrcodeasset`
--
ALTER TABLE `te_qrcodeasset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tichethelptbl`
--
ALTER TABLE `tichethelptbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usertbl`
--
ALTER TABLE `usertbl`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `commenttbl`
--
ALTER TABLE `commenttbl`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `crashedassettbl`
--
ALTER TABLE `crashedassettbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `financetbl`
--
ALTER TABLE `financetbl`
  MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `qrcodeasset`
--
ALTER TABLE `qrcodeasset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `studentbookingtbl`
--
ALTER TABLE `studentbookingtbl`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblstaffreport`
--
ALTER TABLE `tblstaffreport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tblstudent`
--
ALTER TABLE `tblstudent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblstudentreport`
--
ALTER TABLE `tblstudentreport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbltools`
--
ALTER TABLE `tbltools`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `teacherbookingtbl`
--
ALTER TABLE `teacherbookingtbl`
  MODIFY `tbid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `teachertbl`
--
ALTER TABLE `teachertbl`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `te_qrcodeasset`
--
ALTER TABLE `te_qrcodeasset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tichethelptbl`
--
ALTER TABLE `tichethelptbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
