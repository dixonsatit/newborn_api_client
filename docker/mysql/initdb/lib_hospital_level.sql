-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Nov 17, 2016 at 04:43 PM
-- Server version: 10.1.18-MariaDB-1~jessie
-- PHP Version: 5.6.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nb_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `lib_hospital_level`
--

CREATE TABLE `lib_hospital_level` (
  `seq` int(4) NOT NULL,
  `level_name` varchar(5) DEFAULT NULL,
  `detail` varchar(50) DEFAULT NULL,
  `remark` text,
  `lastupdate` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lib_hospital_level`
--

INSERT INTO `lib_hospital_level` (`seq`, `level_name`, `detail`, `remark`, `lastupdate`) VALUES
(1, 'SC', 'มหาวิทยาลัย', NULL, NULL),
(10, 'A', NULL, NULL, NULL),
(20, 'S', NULL, NULL, NULL),
(31, 'M1', NULL, NULL, NULL),
(32, 'M2', NULL, NULL, NULL),
(41, 'F1', NULL, NULL, NULL),
(42, 'F2', NULL, NULL, NULL),
(43, 'F3', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lib_hospital_level`
--
ALTER TABLE `lib_hospital_level`
  ADD PRIMARY KEY (`seq`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
