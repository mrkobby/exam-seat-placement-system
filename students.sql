-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2018 at 06:56 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `studentID` varchar(10) NOT NULL,
  `firstname` varchar(10) DEFAULT NULL,
  `lastname` varchar(10) DEFAULT NULL,
  `spassword` varchar(40) DEFAULT NULL,
  PRIMARY KEY (id),
  UNIQUE KEY studentID (studentID,id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`studentID`, `firstname`, `lastname`, `spassword`) VALUES
('040914001', 'Kobby', 'Acquah', '123456'),
('040914002', 'Wisdom', 'Gohoho', '123456'),
('040914003', 'Caleb', 'Frimpong', '123456'),
('040914004', 'Nana', 'Afranie', '123456'),
('040914005', 'Desmond', 'Duodu', '123456'),
('040914006', 'Reginald', 'Dzamposu', '123456'),
('040914007', 'Jude', 'Boateng', '123456'),
('040914008', 'Ben', 'Seikbo', '123456'),
('040914009', 'Generous', 'George', '123456'),
('040914010', 'Hamza', 'Buhari', '123456'),
('040914011', 'Leslie', 'Edem', '123456'),
('040914012', 'George', 'Frimpong', '123456'),
('040914013', 'Ebemezer', 'Essel', '123456'),
('040914014', 'Kojo', 'Amposah', '123456'),
('040914015', 'Larry', 'Aboagye', '123456'),
('040914016', 'Elias', 'Clarkson', '123456'),
('040914017', 'Prince', 'Ajavon', '123456'),
('040914018', 'Godwin', 'Abpogpe', '123456'),
('040914019', 'Bright', 'Ansah', '123456'),
('040914020', 'Henry', 'Asare', '123456'),
('040914021', 'Clement', 'Ntow', '123456'),
('040914022', 'Mike', 'Mullender', '123456'),
('040914023', 'Kwesi', 'Arthur', '123456'),
('040914024', 'John', 'Adjei', '123456'),
('040914025', 'Ben', 'Ohene', '123456'),
('040914026', 'Sandra', 'Ansah', '123456'),
('040914027', 'Barbara', 'Adu', '123456'),
('040914028', 'Samuel', 'Odame', '123456'),
('040914029', 'Ophelia', 'Opoku', '123456'),
('040914030', 'Mirielle', 'Mensah', '123456'),
('040914031', 'Agnes', 'Danso', '123456'),
('040914032', 'Kwadwo', 'Asamoah', '123456'),
('040914033', 'Lesley', 'Zougah', '123456'),
('040914034', 'Paul', 'Thomas', '123456'),
('040915004', 'joseph', 'arhin', '123456');

--
-- Indexes for dumped tables
--

