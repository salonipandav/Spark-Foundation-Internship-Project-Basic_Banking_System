-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2021 at 04:19 PM
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
-- Database: `spbank`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers details`
--

CREATE TABLE `customers details` (
  `Name` varchar(20) NOT NULL,
  `E-mail` text NOT NULL,
  `A/c no` int(11) NOT NULL,
  `Balance` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers details`
--

INSERT INTO `customers details` (`Name`, `E-mail`, `A/c no`, `Balance`) VALUES
('Saloni', 's@gmail.com', 1, 1000),
('Raj', 'r@gmail.com', 2, 2000),
('Mohit', 'm@gmail.com', 3, 3000),
('Sweety', 's@gmail.com', 4, 4000),
('Snehal', 'sa@gmail.com', 5, 5000),
('Rahul', 'ra@gmail.com', 6, 6000),
('Shailu', 'sa@gmail.com', 7, 7000),
('Megha', 'ma@gmail.com', 8, 8000),
('Shreyash', 'sh@gmail.com', 9, 9000),
('Manisha', 'mah@gmail.com', 10, 10000);

-- --------------------------------------------------------

--
-- Table structure for table `transition details`
--

CREATE TABLE `transition details` (
  `Sender` varchar(20) NOT NULL,
  `Reciever` text NOT NULL,
  `Amount Transferred` int(11) NOT NULL,
  `Date and Time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
