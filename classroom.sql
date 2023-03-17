-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2022 at 06:47 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `classroom`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'admin123'),
('Harsh', '4455');

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `Assignid` int(255) NOT NULL,
  `Assignsubject` varchar(255) NOT NULL,
  `Assignteacher` varchar(255) NOT NULL,
  `Assignfile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`Assignid`, `Assignsubject`, `Assignteacher`, `Assignfile`) VALUES
(7, 'Mechanical Engineering-1', 'Steve Smith', 'Assignments/Black, White and Green Tree Southview Recreation Logo.jpg'),
(9, 'Data structure', 'Tejash Shah', 'Assignments/photo.jpg'),
(11, 'Backtracking', 'Tejash Shah', 'Assignments/Screenshot (65).png'),
(12, 'Mechanical Engineering-1', 'Steve Smith', 'Assignments/MCA 101 RDBMS (2021)-1.pdf'),
(13, 'Mechanical Engineering-1', 'Steve Smith', 'Assignments/mihir_6thSem.pdf'),
(14, 'Mechanical Engineering-1', 'Steve Smith', 'Assignments/RESUME_VIKAS new 1.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `Classid` int(255) NOT NULL,
  `Classcode` varchar(255) NOT NULL,
  `Teachername` varchar(255) NOT NULL,
  `Classname` varchar(255) NOT NULL,
  `Classtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`Classid`, `Classcode`, `Teachername`, `Classname`, `Classtime`) VALUES
(20, '8755433', 'Harry', 'Electronic Science', '2021-11-25 23:15:00'),
(31, '1769532', 'Harry', 'Electromagnetic', '2021-11-18 21:48:00'),
(32, '5565729', 'Steve Smith', 'Mechanical Engineering-1', '2021-11-26 16:25:00'),
(48, '9688285', 'Steve Smith', 'Mechanical-2', '2021-11-26 01:20:00'),
(53, '3686060', 'Steve Smith', 'Base Mechanical Engg.', '2021-11-24 22:27:00'),
(55, '7788528', 'Steve Smith', 'Mechanical concepts', '2021-11-25 23:30:00'),
(60, '9793852', 'Tejash Shah', 'Backtracking', '2021-11-26 00:05:00'),
(61, '6024599', 'Tejash Shah', 'Backtracking', '2021-11-26 00:05:00'),
(62, '6373684', 'Tejash Shah', 'Tamil', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `exam_details`
--

CREATE TABLE `exam_details` (
  `Sid` int(11) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Marks` varchar(11) NOT NULL,
  `Marks2` varchar(11) NOT NULL,
  `Marks3` varchar(11) NOT NULL,
  `Total` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam_details`
--

INSERT INTO `exam_details` (`Sid`, `Name`, `Marks`, `Marks2`, `Marks3`, `Total`) VALUES
(26, 'Somprakash', '2', '5', '2', 9),
(19, 'Harry', '5', '8', '5', 18),
(15, 'Ganesh', '6', '8', '6', 20);

-- --------------------------------------------------------

--
-- Table structure for table `faculty_review`
--

CREATE TABLE `faculty_review` (
  `reviewid` int(11) NOT NULL,
  `Facultyname` varchar(20) NOT NULL,
  `Message` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty_review`
--

INSERT INTO `faculty_review` (`reviewid`, `Facultyname`, `Message`) VALUES
(1, 'Tejas', 'Better'),
(2, 'Tejas', 'Better');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `Staffid` int(255) NOT NULL,
  `StaffName` varchar(255) NOT NULL,
  `StaffEmail` varchar(255) NOT NULL,
  `StaffPassword` varchar(255) NOT NULL,
  `StaffBranch` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`Staffid`, `StaffName`, `StaffEmail`, `StaffPassword`, `StaffBranch`) VALUES
(3, 'Steve Smith', 'stevsmith@gmail.com', 'steve223', 'Mechanical Eng.'),
(4, 'Tejash Shah', 'tejas@gmail.com', 'tejas@223', 'Computer Eng.'),
(5, 'Saravanan', 'Sara@gmail.com', '1234', 'Computer Eng.');

-- --------------------------------------------------------

--
-- Table structure for table `studentdata`
--

CREATE TABLE `studentdata` (
  `Sid` int(255) NOT NULL,
  `StudentName` varchar(255) NOT NULL,
  `StudentEmail` varchar(255) NOT NULL,
  `StudentPassword` varchar(255) NOT NULL,
  `Phone` varchar(255) NOT NULL,
  `Branch` varchar(255) NOT NULL,
  `token` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studentdata`
--

INSERT INTO `studentdata` (`Sid`, `StudentName`, `StudentEmail`, `StudentPassword`, `Phone`, `Branch`, `token`) VALUES
(15, 'Ganesh', 'saurav4724@gmail.com', 'ganesh', '8785774874', 'Electrical Engineering', '3d654c243d3daca4d1c0'),
(17, 'Kamal', 'xodima8135@keagenan.com', 'kamal', '8787747485', 'Mechanical Engineering', 'a3a941f5674a0a54a4c0'),
(19, 'Harry', 'harili5697@jasmne.com', 'harry', '8574874587', 'Electrical Engineering', '3b0f0e63b84f79a507ec'),
(20, 'Mihir', 'pecana9168@mainctu.com', 'mihir', '8758748574', 'Civil Engineering', '3b41df0eb4886f75695c'),
(21, 'Garry', 'pecana9168@mainctu.com', 'garry', '8758577485', 'Electrical Engineering', '4c0f559c2c32d65d4671'),
(25, 'Somprakash', 'som.pradhan145@gmail.com', 'som', '8748747478', 'Electrical Engineering', '99cb81eaf39f8cc7cb1d'),
(26, 'Somprakash', 'saurav4724@gmail.com', 'som', '8748747478', 'Electrical Engineering', 'f4ebf02e9370103dea73'),
(28, 'Sam', 'sam1@gmail.com', 'Patel', '4645631321', 'Civil Engineering', '876bb93bcf55627073f2'),
(29, 'Som pradhan', 'som.pradhan1455@gmail.com', 'Patel', '4645631321', 'Civil Engineering', 'ff413b6f45b1671e220a');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`Assignid`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`Classid`);

--
-- Indexes for table `faculty_review`
--
ALTER TABLE `faculty_review`
  ADD PRIMARY KEY (`reviewid`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`Staffid`);

--
-- Indexes for table `studentdata`
--
ALTER TABLE `studentdata`
  ADD PRIMARY KEY (`Sid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignment`
--
ALTER TABLE `assignment`
  MODIFY `Assignid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `Classid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `faculty_review`
--
ALTER TABLE `faculty_review`
  MODIFY `reviewid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `Staffid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `studentdata`
--
ALTER TABLE `studentdata`
  MODIFY `Sid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
