-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2021 at 02:24 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `beem`
--

-- --------------------------------------------------------

--
-- Table structure for table `available_dates`
--

CREATE TABLE `available_dates` (
  `ID` int(11) NOT NULL,
  `DATE` date NOT NULL,
  `BOOKED` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `available_dates`
--

INSERT INTO `available_dates` (`ID`, `DATE`, `BOOKED`) VALUES
(1, '2021-07-25', 0),
(2, '2021-07-26', 0),
(3, '2021-07-27', 0),
(4, '2021-07-28', 0),
(5, '2021-07-29', 0),
(6, '2021-07-30', 0),
(7, '2021-07-31', 0),
(8, '2021-08-01', 0),
(9, '2021-08-02', 0),
(10, '2021-08-03', 0),
(11, '2021-08-04', 0),
(12, '2021-08-05', 0),
(13, '2021-08-06', 0),
(14, '2021-08-07', 0),
(15, '2021-08-08', 0),
(16, '2021-08-09', 0),
(17, '2021-08-10', 0),
(18, '2021-08-11', 0),
(19, '2021-08-12', 0),
(20, '2021-08-13', 0);

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `ID` int(11) NOT NULL,
  `Name` text NOT NULL,
  `DOBirth` date NOT NULL,
  `Age` int(11) NOT NULL,
  `Phone_Number` bigint(20) NOT NULL,
  `Conditions` text NOT NULL,
  `VaccineDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `table`
--


--
-- Indexes for table `available_dates`
--
ALTER TABLE `available_dates`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `available_dates`
--
ALTER TABLE `available_dates`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=180;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
