-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2018 at 01:35 AM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `exam_placement`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`firstname`, `lastname`, `email`, `password`) VALUES
('Joseph', 'Arhin', 'josephmacleanarhin@outlook.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `bbal100_timetable`
--

CREATE TABLE `bbal100_timetable` (
  `Course_ID` varchar(8) NOT NULL,
  `Course_Name` varchar(50) NOT NULL,
  `Date` date NOT NULL,
  `Time` varchar(30) NOT NULL,
  `Lecturer` varchar(30) NOT NULL,
  `Venue` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bbal200_timetable`
--

CREATE TABLE `bbal200_timetable` (
  `Course_ID` varchar(8) NOT NULL,
  `Course_Name` varchar(50) NOT NULL,
  `Date` date NOT NULL,
  `Time` varchar(30) NOT NULL,
  `Lecturer` varchar(30) NOT NULL,
  `Venue` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bbal300_timetable`
--

CREATE TABLE `bbal300_timetable` (
  `Course_ID` varchar(8) NOT NULL,
  `Course_Name` varchar(50) NOT NULL,
  `Date` date NOT NULL,
  `Time` date NOT NULL,
  `Lecturer` varchar(30) NOT NULL,
  `Venue` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bbal400_timetable`
--

CREATE TABLE `bbal400_timetable` (
  `Course_ID` varchar(8) NOT NULL,
  `Course_Name` varchar(50) NOT NULL,
  `Date` date NOT NULL,
  `Time` varchar(30) NOT NULL,
  `Lecturer` varchar(30) NOT NULL,
  `Venue` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bitl100_timetable`
--

CREATE TABLE `bitl100_timetable` (
  `Course_ID` varchar(8) NOT NULL,
  `Course_Name` varchar(50) NOT NULL,
  `Date` date NOT NULL,
  `Time` varchar(30) NOT NULL,
  `Lecturer` varchar(40) NOT NULL,
  `Venue` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bitl100_timetable`
--

INSERT INTO `bitl100_timetable` (`Course_ID`, `Course_Name`, `Date`, `Time`, `Lecturer`, `Venue`) VALUES
('ict 224', 'Introduction To Information Systems', '2018-04-16', 'Afternoon | 02:00PM', 'Abigail Wiafe', ''),
('it 330', 'Advanced visual basic', '2018-04-18', 'Afternoon | 02:00PM', 'Dr. Forgor Lempogo', '');

-- --------------------------------------------------------

--
-- Table structure for table `bitl200_timetable`
--

CREATE TABLE `bitl200_timetable` (
  `Course_ID` varchar(8) NOT NULL,
  `Course_Name` varchar(50) NOT NULL,
  `Date` date NOT NULL,
  `Time` varchar(30) NOT NULL,
  `Lecturer` varchar(30) NOT NULL,
  `Venue` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bitl200_timetable`
--

INSERT INTO `bitl200_timetable` (`Course_ID`, `Course_Name`, `Date`, `Time`, `Lecturer`, `Venue`) VALUES
('IT 204', 'JAVA PROGRAMMING', '2018-07-09', 'Afternoon | 02:00PM', 'DR. WILFRED ASUNKA', 'C1, C4, C5, C6, B2, B3, AUD'),
('IT 206', 'ALGORITHM AND DATA STRUCTURES', '2018-07-10', 'Morning | 9:00AM', 'DR. WILLIAM BROWN ACQUAYE', 'C1, C4, C5, C9, C10, B4, AUD'),
('IT 222', 'DATABASE DESIGN AND MANAGEMENT ', '2018-07-12', 'Morning | 9:00AM', 'MR. ISAAC BAFFOUR SENKYIRI', 'C1, C2, C5, C10, C14, G6, AUD'),
('IT 232', 'DIGITAL COMPUTER DESIGN ', '2018-07-16', 'Afternoon | 02:00PM', 'MR. ANDREWS AGYENIM BOATENG', 'C1, C2, C5, C10, C14, G6, AUD'),
('IT 242', 'DATA COMMUNICATION AND NETWORKS', '2018-07-18', 'Morning | 9:00AM', 'MR. JONATHAN K. KORTO', 'C1, C4, C5, C10, C14, C16, AUD'),
('IT 274', 'BASIC ECONOMICS', '2018-07-20', 'Morning | 9:00AM', 'MRS. LILIAN ARTHUR', 'C1, C4, C9, C10, G6, B4,CI4'),
('IT 276', 'PRINCIPLES OF ENTREPRENEURSHIP', '2018-07-23', 'Afternoon | 02:00PM', 'MS. AFIA NYARKO BOAKYE', 'C1,  C4, C5, C9, G6, B4, B3 ');

-- --------------------------------------------------------

--
-- Table structure for table `bitl300_timetable`
--

CREATE TABLE `bitl300_timetable` (
  `Course_ID` varchar(8) NOT NULL,
  `Course_Name` varchar(50) NOT NULL,
  `Date` date NOT NULL,
  `Time` varchar(30) NOT NULL,
  `Lecturer` varchar(30) NOT NULL,
  `Venue` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bitl400_timetable`
--

CREATE TABLE `bitl400_timetable` (
  `Course_ID` varchar(8) NOT NULL,
  `Course_Name` varchar(50) NOT NULL,
  `Date` date NOT NULL,
  `Time` varchar(30) NOT NULL,
  `Lecturer` varchar(30) NOT NULL,
  `Venue` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bitl400_timetable`
--

INSERT INTO `bitl400_timetable` (`Course_ID`, `Course_Name`, `Date`, `Time`, `Lecturer`, `Venue`) VALUES
('ict 224', 'advanced java technologies', '2018-07-19', 'Afternoon | 02:00PM', 'george anni', 'aud, c1, c5, g6, aud'),
('it 330', 'introduction to information system', '2018-07-17', 'Afternoon | 02:00PM', 'abigail wiafe', 'g5, g6, aud'),
('itf 232', 'advanced visual basic', '2018-07-27', 'Morning | 9:00AM', 'Dr. forgor lempogo', 'aud, c1, c5, g6, aud');

-- --------------------------------------------------------

--
-- Table structure for table `btel100_timetable`
--

CREATE TABLE `btel100_timetable` (
  `Course_ID` varchar(8) NOT NULL,
  `Course_Name` varchar(50) NOT NULL,
  `Date` date NOT NULL,
  `Time` varchar(30) NOT NULL,
  `Lecturer` varchar(30) NOT NULL,
  `Venue` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `btel200_timetable`
--

CREATE TABLE `btel200_timetable` (
  `Course_ID` varchar(8) NOT NULL,
  `Course_Name` varchar(50) NOT NULL,
  `Date` date NOT NULL,
  `Time` varchar(30) NOT NULL,
  `Lecturer` varchar(30) NOT NULL,
  `Venue` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `btel300_timetable`
--

CREATE TABLE `btel300_timetable` (
  `Course_ID` varchar(8) NOT NULL,
  `Course_Name` varchar(50) NOT NULL,
  `Date` date NOT NULL,
  `Time` varchar(30) NOT NULL,
  `Lecturer` varchar(30) NOT NULL,
  `Venue` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `btel400_timetable`
--

CREATE TABLE `btel400_timetable` (
  `Course_ID` varchar(8) NOT NULL,
  `Course_Name` varchar(50) NOT NULL,
  `Date` date NOT NULL,
  `Time` varchar(30) NOT NULL,
  `Lecturer` varchar(30) NOT NULL,
  `Venue` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hall`
--

CREATE TABLE `hall` (
  `id` int(11) NOT NULL,
  `hall_name` varchar(50) NOT NULL,
  `rows` int(11) NOT NULL,
  `cols` int(11) NOT NULL,
  `seats` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hall`
--

INSERT INTO `hall` (`id`, `hall_name`, `rows`, `cols`, `seats`) VALUES
(8, 'C2', 13, 6, 72),
(9, 'C10', 5, 4, 16),
(12, 'c4', 3, 10, 30),
(13, 'c1', 3, 10, 10),
(14, 'b1', 3, 10, 30),
(15, 'b2', 3, 10, 30),
(16, 'b3', 3, 10, 30),
(17, 'c5', 3, 10, 30),
(18, 'c6', 3, 10, 30),
(19, 'c11', 3, 10, 30);

-- --------------------------------------------------------

--
-- Table structure for table `placement`
--

CREATE TABLE `placement` (
  `id` int(11) NOT NULL,
  `studentID` varchar(15) NOT NULL,
  `programme` varchar(10) NOT NULL,
  `course_code` varchar(10) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `hall` varchar(50) NOT NULL,
  `seat` varchar(10) NOT NULL,
  `exam_date` date NOT NULL,
  `exam_time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `studentID` varchar(10) NOT NULL,
  `firstname` varchar(10) DEFAULT NULL,
  `lastname` varchar(10) DEFAULT NULL,
  `spassword` varchar(40) DEFAULT NULL,
  `programme` varchar(10) NOT NULL,
  `timetable` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `studentID`, `firstname`, `lastname`, `spassword`, `programme`, `timetable`) VALUES
(43, '040914001', 'Timmy', 'Essel', '123', 'BIT L100', 'BITL100_timetable'),
(44, '040914002', 'Kwabena', 'Aboagye', '123', 'BIT L200', 'BITL200_timetable'),
(45, '040914003', 'Harry', 'Eran', '123456789', 'BIT L100', 'BITL100_timetable'),
(46, '040914004', 'Patrick', 'Acquah', '123456789', 'DIT L200', 'DITL200_timetable'),
(48, '040914234', 'generous', 'george', '123456789', 'BIT L400', 'BITL400_timetable'),
(49, '040914006', 'joseph', 'abuanor', '123456789', 'BIT L400', 'BITL400_timetable'),
(50, '040914428', 'nii', 'dromo', '123456789', 'BIT L400', 'BITL400_timetable'),
(51, '040914007', 'roberta', 'bataka', '123456789', 'BIT L400', 'BITL400_timetable'),
(52, '040914008', 'mike', 'mullender', '123456789', 'BIT L400', 'BITL400_timetable'),
(53, '040914009', 'clement ', 'oku-ntow', '123456789', 'BIT L400', 'BITL400_timetable'),
(54, '040914188', 'desmond', 'duodu', '123456789', 'BIT L400', 'BITL400_timetable'),
(55, '040914233', 'daniel', 'dela', '123456789', 'BIT L400', 'BITL400_timetable'),
(56, '040914296', 'wisdom', 'gohoho', '123456789', 'BIT L400', 'BITL400_timetable'),
(57, '040914291', 'prince', 'ajavon', '123456789', 'BIT L400', 'BITL400_timetable'),
(58, '040914277', 'francis', 'dzamposu', '123456789', 'BIT L400', 'BITL400_timetable'),
(59, '040914406', 'jude', 'boateng', '123456789', 'BIT L400', 'BITL400_timetable'),
(60, '040914407', 'Paul', 'thomas-bru', '123456789', 'BIT L400', 'BITL400_timetable'),
(61, '040914409', 'ben', 'seikbo', '123456789', 'BIT L400', 'BITL400_timetable'),
(62, '040914222', 'george', 'adu-frimpo', '123456789', 'BIT L400', 'BITL400_timetable'),
(63, '040914223', 'simon', 'aphour', '123456789', 'BIT L400', 'BITL400_timetable'),
(64, '040914224', 'hamza', 'buhari', '123456789', 'BIT L400', 'BITL400_timetable'),
(65, '040914225', 'leslie', 'acquah', '123456789', 'BIT L400', 'BITL400_timetable'),
(66, '040914226', 'richardson', 'scotches', '123456789', 'BIT L400', 'BITL400_timetable'),
(67, '040914227', 'gonab', 'tekson', '123456789', 'BIT L400', 'BITL400_timetable');

-- --------------------------------------------------------

--
-- Table structure for table `timetable`
--

CREATE TABLE `timetable` (
  `id` int(11) NOT NULL,
  `course_id` varchar(10) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `programme` varchar(10) NOT NULL,
  `exam_date` date NOT NULL,
  `exam_time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timetable`
--

INSERT INTO `timetable` (`id`, `course_id`, `course_name`, `programme`, `exam_date`, `exam_time`) VALUES
(5, 'IT445', 'Introduction to information system', 'BIT L100', '2018-07-02', 'Afternoon | 02:00PM'),
(7, 'IT567', 'Advanced visual basic', 'BIT L100', '2018-07-05', 'Morning | 9:00AM'),
(8, 'it221', 'compilers and translators', 'BIT L400', '2014-04-18', 'Morning | 9:00AM');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `bbal100_timetable`
--
ALTER TABLE `bbal100_timetable`
  ADD PRIMARY KEY (`Course_ID`);

--
-- Indexes for table `bbal200_timetable`
--
ALTER TABLE `bbal200_timetable`
  ADD PRIMARY KEY (`Course_ID`);

--
-- Indexes for table `bbal300_timetable`
--
ALTER TABLE `bbal300_timetable`
  ADD PRIMARY KEY (`Course_ID`);

--
-- Indexes for table `bbal400_timetable`
--
ALTER TABLE `bbal400_timetable`
  ADD PRIMARY KEY (`Course_ID`);

--
-- Indexes for table `bitl100_timetable`
--
ALTER TABLE `bitl100_timetable`
  ADD PRIMARY KEY (`Course_ID`);

--
-- Indexes for table `bitl200_timetable`
--
ALTER TABLE `bitl200_timetable`
  ADD PRIMARY KEY (`Course_ID`);

--
-- Indexes for table `bitl300_timetable`
--
ALTER TABLE `bitl300_timetable`
  ADD PRIMARY KEY (`Course_ID`);

--
-- Indexes for table `bitl400_timetable`
--
ALTER TABLE `bitl400_timetable`
  ADD PRIMARY KEY (`Course_ID`);

--
-- Indexes for table `btel100_timetable`
--
ALTER TABLE `btel100_timetable`
  ADD PRIMARY KEY (`Course_ID`);

--
-- Indexes for table `btel200_timetable`
--
ALTER TABLE `btel200_timetable`
  ADD PRIMARY KEY (`Course_ID`);

--
-- Indexes for table `btel300_timetable`
--
ALTER TABLE `btel300_timetable`
  ADD PRIMARY KEY (`Course_ID`);

--
-- Indexes for table `btel400_timetable`
--
ALTER TABLE `btel400_timetable`
  ADD PRIMARY KEY (`Course_ID`);

--
-- Indexes for table `hall`
--
ALTER TABLE `hall`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `placement`
--
ALTER TABLE `placement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `studentID` (`studentID`,`id`);

--
-- Indexes for table `timetable`
--
ALTER TABLE `timetable`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `course_id` (`course_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hall`
--
ALTER TABLE `hall`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `placement`
--
ALTER TABLE `placement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `timetable`
--
ALTER TABLE `timetable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
