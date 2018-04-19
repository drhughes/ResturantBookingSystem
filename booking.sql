-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2014 at 10:10 PM
-- Server version: 5.5.40-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ResturantBooking`
--
CREATE DATABASE IF NOT EXISTS ResturantBooking;
-- --------------------------------------------------------

--
-- Table structure for table `ResturantBooking`
--

CREATE TABLE IF NOT EXISTS `booking` (
  `customerID` int(11) NOT NULL,
  `tableID` int(11) NOT NULL,
  `bookingTime` time NOT NULL,
  `bookingDate` date NOT NULL,
  PRIMARY KEY (`customerID`,`tableID`,`bookingTime`,`bookingDate`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`customerID`, `tableID`, `bookingTime`, `bookingDate`) VALUES
(1, 1, '09:00:00', '2014-12-25'),
(1, 1, '14:00:00', '2014-12-25'),
(1, 2, '09:00:00', '2014-12-25'),
(1, 3, '16:00:00', '2014-12-25'),
(1, 4, '10:00:00', '2014-12-26'),
(1, 5, '16:00:00', '2014-12-25'),
(2, 1, '12:00:00', '2015-01-01'),
(2, 1, '15:00:00', '2014-12-25'),
(2, 2, '12:00:00', '2015-01-01'),
(2, 4, '15:00:00', '2014-12-25');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `customerID` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(30) NOT NULL,
  `surname` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`customerID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerID`, `firstname`, `surname`, `email`) VALUES
(1, 'David', 'Hughes', 'dhughes@halesowen.ac.uk'),
(2, 'Joe', 'Smith', 'jsmith@email.com'),
(3, 'Jane', 'Doe', 'jdoe@email.com');

-- --------------------------------------------------------

--
-- Table structure for table `resturantTable`
--

CREATE TABLE IF NOT EXISTS `resturantTable` (
  `tableID` int(11) NOT NULL AUTO_INCREMENT,
  `tableLocation` varchar(20) NOT NULL,
  `seatsAtTable` int(11) NOT NULL,
  PRIMARY KEY (`tableID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `resturantTable`
--

INSERT INTO `resturantTable` (`tableID`, `tableLocation`, `seatsAtTable`) VALUES
(1, 'balcony', 4),
(2, 'balcony', 4),
(3, 'balcony', 2),
(4, 'balcony', 6),
(5, 'balcony', 4);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
