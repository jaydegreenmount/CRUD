-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2018 at 08:58 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `romma_social`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bookingID` int(11) NOT NULL,
  `customerID` int(11) NOT NULL,
  `booking_name` varchar(255) DEFAULT NULL,
  `booking_time` varchar(255) DEFAULT NULL,
  `guests` varchar(10) DEFAULT NULL,
  `special_requests` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bookingID`, `customerID`, `booking_name`, `booking_time`, `guests`, `special_requests`) VALUES
(1, 1, 'Jane party', '5:00pm', '6', 'Outside sitting, please.'),
(2, 2, 'Jim\'s 40th', '6:30pm', '10', 'Birthday cake, please.'),
(4, 0, 'dd', '12:50:30', '1', '22'),
(5, 0, 'Test1', '12:50:30', '5', 'table inside'),
(6, 0, 'test2', '19:00pm', '18', 'none'),
(7, 0, 'edit booking test', '3', '3', 'testing edit'),
(8, 0, 'Test', '01:30pm', '8', 'no'),
(9, 0, 'test2', '1246', '1', ''),
(11, 6, 'Test7', '12:00pm', '20000', 'none'),
(12, 0, 'Testing', '15:00pm', '5', 'none'),
(13, 3, 'Testing', '15:00pm', '5', 'none'),
(15, 2, 'create booking test', '09:45am', '30000', 'Creating booking test');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerID` int(11) NOT NULL,
  `customer_first_name` varchar(255) DEFAULT NULL,
  `customer_surname` varchar(255) DEFAULT NULL,
  `customer_number` varchar(10) DEFAULT NULL,
  `customer_email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerID`, `customer_first_name`, `customer_surname`, `customer_number`, `customer_email`) VALUES
(2, 'Barry', 'T', '74102585', 'jimmy_bobby@email.com.au'),
(3, 'Luke', 'G', '05946', 'luke@email.com'),
(6, 'Brooke', 'Scott', '2586532', 'brooke@email.com'),
(7, 'Tam', 'Bam', '856423653', 'tam@email.com'),
(8, 'Teddy', 'Bam', '684556', 'bigted@email.com'),
(9, 'Tam', 'T', '34567', 'bigted@email.com'),
(11, 'Create Customer', 'Working', '52152', 'working@email.com'),
(12, 'edit working', 'Class', '0404044404', 'classtest@email.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bookingID`),
  ADD KEY `fk_customerID` (`customerID`) USING BTREE;

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `bookingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
