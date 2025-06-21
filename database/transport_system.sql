-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 31, 2024 at 05:41 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `transport_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

DROP TABLE IF EXISTS `bookings`;
CREATE TABLE IF NOT EXISTS `bookings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `registration_number` varchar(50) NOT NULL,
  `seat_number` varchar(50) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `registration_number`, `seat_number`, `phone_number`) VALUES
(1, 'MZ 1234', '', '0990770515'),
(2, 'MZ 1234', '', '0990770515');

-- --------------------------------------------------------

--
-- Table structure for table `bus_tb`
--

DROP TABLE IF EXISTS `bus_tb`;
CREATE TABLE IF NOT EXISTS `bus_tb` (
  `id` int NOT NULL AUTO_INCREMENT,
  `registration_number` varchar(100) NOT NULL,
  `capacity` varchar(100) NOT NULL,
  `price` varchar(50) NOT NULL,
  `route` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `bus_tb`
--

INSERT INTO `bus_tb` (`id`, `registration_number`, `capacity`, `price`, `route`) VALUES
(1, 'MZ 1234', '50', '10000', 'Mzuzu-Lilongwe'),
(3, 'mn 1234', '40', '2000', 'lilongwe-mangochi');

-- --------------------------------------------------------

--
-- Table structure for table `route_tb`
--

DROP TABLE IF EXISTS `route_tb`;
CREATE TABLE IF NOT EXISTS `route_tb` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `via_cities` varchar(100) NOT NULL,
  `registration_number` varchar(100) NOT NULL,
  `cost` varchar(100) NOT NULL,
  `departure_date` date NOT NULL,
  `departure_time` time NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `route_tb`
--

INSERT INTO `route_tb` (`ID`, `via_cities`, `registration_number`, `cost`, `departure_date`, `departure_time`) VALUES
(2, 'lilongwe-mzuzu', 'MC 3478', '20000', '2023-12-30', '01:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_tb`
--

DROP TABLE IF EXISTS `user_tb`;
CREATE TABLE IF NOT EXISTS `user_tb` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `PHONE` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `USERNAME` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `PASWORD` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_tb`
--

INSERT INTO `user_tb` (`ID`, `PHONE`, `USERNAME`, `PASWORD`) VALUES
(4, '0990770515', 'chrispine', 'UMODZI'),
(3, '0990770515', 'chrispine', 'UMODZI'),
(5, '0990770515', 'chrispin', '123456'),
(6, '0990770515', 'blessings', '12345678');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
