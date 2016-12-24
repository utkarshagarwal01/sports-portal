-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 24, 2016 at 02:44 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `revels17`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `participant`
--

CREATE TABLE `participant` (
  `ID` int(11) NOT NULL,
  `NAME` text NOT NULL,
  `REGNO` varchar(25) NOT NULL,
  `CLG_NAME` text NOT NULL,
  `EMAIL` text NOT NULL,
  `PHONE` varchar(15) NOT NULL,
  `GENDER` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `participant`
--

INSERT INTO `participant` (`ID`, `NAME`, `REGNO`, `CLG_NAME`, `EMAIL`, `PHONE`, `GENDER`) VALUES
(7, 'Amit Ram', '12435128AR', 'VIT Vellore', 'amit.ram12@gmail.com', '+9877762537323', 'Male'),
(8, 'Post Babu', 'PST26352112', 'Anpad', 'postkaro69@gmail.com', '6969009932', 'Male'),
(9, 'Adolf Hitler', 'EKTATTA01', 'College of Judaism', 'igotonlyoneball@gmail.com', '6961017990', 'Male'),
(10, 'fuddu', '786786876786', 'fuddi''', 'fuddukifuddi@gmail.com', '12345546566', 'Female'),
(16, 'Latika D''Souza', '12434', 'Virgin Mary''s College', 'latika##$@gmail.com', '43874638746', 'Female'),
(17, 'XYZ', '12334ARQ', 'College', 'xyz@gmail.com', '12981289732', 'Male'),
(18, 'Whore', '6969696969', 'Strip University', 'callme69@fuckme.com', '9818696969', 'Female'),
(19, 'Randua', '3231RAN3321', 'Randuo ka College', 'gandmedede@gmail.com', '110110110110', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `TEAM_ID` int(11) NOT NULL,
  `D_ID` int(11) NOT NULL,
  `REGNO` varchar(15) NOT NULL,
  `NAME` text NOT NULL,
  `GENDER` text NOT NULL,
  `SPORT` text NOT NULL,
  `PAYMENT` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`TEAM_ID`, `D_ID`, `REGNO`, `NAME`, `GENDER`, `SPORT`, `PAYMENT`) VALUES
(199, 7, '12435128AR', 'Amit Ram', 'Male', 'football', 1),
(199, 8, 'PST26352112', 'Post Babu', 'Male', 'football', 1),
(199, 9, 'EKTATTA01', 'Adolf Hitler', 'Male', 'football', 1),
(71, 10, '786786876786', 'fuddu', 'Female', 'basketball', 1),
(71, 16, '12434', 'Latika D''Souza', 'Female', 'basketball', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`) VALUES
('kshitij', 'rana');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `participant`
--
ALTER TABLE `participant`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`D_ID`),
  ADD KEY `D_ID` (`D_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `participant`
--
ALTER TABLE `participant`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
