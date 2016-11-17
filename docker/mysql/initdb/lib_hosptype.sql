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
-- Table structure for table `lib_hosptype`
--

CREATE TABLE `lib_hosptype` (
  `typecode` varchar(6) NOT NULL,
  `typename` varchar(50) NOT NULL,
  `level` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=tis620 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `lib_hosptype`
--

INSERT INTO `lib_hosptype` (`typecode`, `typename`, `level`) VALUES
('01', 'สำนักงานสาธารณสุขจังหวัด', '1'),
('02', 'สำนักงานสาธารณสุขอำเภอ/กิ่งอำเภอ', '2'),
('03', 'สถานีอนามัย', '5'),
('04', 'สถานบริการสาธารณสุขชุมชน', '5'),
('05', 'โรงพยาบาลศูนย์', '8'),
('06', 'โรงพยาบาลทั่วไป', '7'),
('07', 'โรงพยาบาลชุมชน', '6'),
('08', 'ศูนย์สุขภาพชุมชน ของ รพ.', '5'),
('09', 'ศูนย์สุขภาพชุมชน สธ.', '5'),
('10', 'ศูนย์วิชาการ', '9'),
('11', 'โรงพยาบาล นอก สป.สธ.', '9'),
('12', 'โรงพยาบาล นอก สธ.', '9'),
('13', 'ศูนย์บริการสาธารณสุข', '4'),
('14', 'ศูนย์สุขภาพชุมชน นอก สธ.', '4'),
('15', 'โรงพยาบาลเอกชน', '5'),
('16', 'คลินิกเอกชน', '3'),
('17', 'โรงพยาบาล/ศูนย์บริการสาธารณสุข สาขา', '5'),
('18', 'โรงพยาบาลส่งเสริมสุขภาพตำบล', '5');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lib_hosptype`
--
ALTER TABLE `lib_hosptype`
  ADD PRIMARY KEY (`typecode`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
