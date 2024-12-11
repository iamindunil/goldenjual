-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2023 at 10:43 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `fullname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `check_in` varchar(50) NOT NULL,
  `check_out` varchar(50) NOT NULL,
  `no_of_guests` varchar(50) NOT NULL,
  `nic` varchar(50) NOT NULL,
  `adults` varchar(50) NOT NULL,
  `children` varchar(50) NOT NULL,
  `hall_type` varchar(50) NOT NULL,
  `event` varchar(50) NOT NULL,
  `fav_language` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`fullname`, `email`, `phone_number`, `check_in`, `check_out`, `no_of_guests`, `nic`, `adults`, `children`, `hall_type`, `event`, `fav_language`) VALUES
('vidura nirmal', 'viduranirmal@gmail.com', '234333', '2023-10-16', '2023-10-28', '9', '200216602610', '400', '300', '4', '4', 'Night time'),
('vidura nirmal', 'viduranirmal@gmail.com', '234333', '2023-10-16', '2023-10-24', '2', '123456', '400', '100', '3', '4', 'Day time');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
