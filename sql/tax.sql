-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2018 at 04:38 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tax`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`) VALUES
(1, 'admin', 'tax@admin.com', '25e4ee4e9229397b6b17776bfceaf8e7');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `user_id_number` int(11) NOT NULL,
  `payment_type` text NOT NULL,
  `payment_mode` text NOT NULL,
  `date_payed` varchar(50) NOT NULL,
  `time_payed` varchar(50) NOT NULL,
  `valid_untill` varchar(50) NOT NULL,
  `amount` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `user_id_number`, `payment_type`, `payment_mode`, `date_payed`, `time_payed`, `valid_untill`, `amount`) VALUES
(1, 35098765, 'weekly', 'mpesa', '02/18/2018', '06:06pm', '02/25/2018', '225.00'),
(5, 36566580, 'daily', 'mpesa', '02/19/2018', '05:35pm', '02/20/2018', '70.00'),
(6, 35678909, 'monthly', 'mpesa', '02/18/2018', '08:20pm', '02/28/2018', '650.00'),
(7, 35781223, 'daily', 'mpesa', '02/21/2018', '09:14am', '02/20/2018', '92.00');

-- --------------------------------------------------------

--
-- Table structure for table `payments_report`
--

CREATE TABLE `payments_report` (
  `id` int(11) NOT NULL,
  `user_id_number` int(11) NOT NULL,
  `payment_type` text NOT NULL,
  `payment_mode` text NOT NULL,
  `date_payed` varchar(50) NOT NULL,
  `time_payed` varchar(50) NOT NULL,
  `valid_untill` varchar(50) NOT NULL,
  `amount` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments_report`
--

INSERT INTO `payments_report` (`id`, `user_id_number`, `payment_type`, `payment_mode`, `date_payed`, `time_payed`, `valid_untill`, `amount`) VALUES
(1, 35098765, 'monthly', 'mpesa', '02/18/2018', '02:44pm', '02/28/2018', '610.00'),
(2, 35098765, 'daily', 'mpesa', '02/18/2018', '03:37pm', '02/19/2018', '150.00'),
(3, 35098765, 'weekly', 'mpesa', '02/18/2018', '04:03pm', '02/25/2018', '360.00'),
(4, 35098765, 'daily', 'mpesa', '02/18/2018', '04:59pm', '02/19/2018', '40.00'),
(6, 35098765, 'daily', 'mpesa', '02/18/2018', '05:00pm', '02/19/2018', '60.00'),
(7, 36566580, 'daily', 'mpesa', '02/16/2018', '05:34pm', '02/17/2018', '85.00'),
(8, 35098765, 'weekly', 'mpesa', '02/18/2018', '06:06pm', '02/25/2018', '225.00'),
(9, 35678909, 'daily', 'mpesa', '02/18/2018', '06:19pm', '02/19/2018', '60.00'),
(10, 35678909, 'daily', 'mpesa', '02/18/2018', '07:07pm', '02/19/2018', '100.00'),
(11, 35678909, 'monthly', 'mpesa', '02/18/2018', '08:20pm', '02/28/2018', '650.00'),
(12, 36566580, 'daily', 'mpesa', '02/18/2018', '08:22pm', '02/19/2018', '70.00'),
(13, 35781223, 'monthly', 'mpesa', '02/18/2018', '09:34pm', '02/28/2018', '510.00'),
(14, 35781223, 'daily', 'mpesa', '02/19/2018', '07:56am', '02/20/2018', '120.00'),
(15, 35781223, 'weekly', 'mpesa', '02/19/2018', '08:03am', '02/26/2018', '225.00'),
(16, 35781223, 'monthly', 'mpesa', '02/19/2018', '08:24am', '02/28/2018', '1100.00'),
(17, 35781223, 'monthly', 'mpesa', '02/19/2018', '09:17am', '02/28/2018', '780.00'),
(18, 35781223, 'monthly', 'mpesa', '02/19/2018', '09:33am', '02/28/2018', '780.00'),
(19, 35781223, 'daily', 'mpesa', '02/19/2018', '09:34am', '02/20/2018', '92.00'),
(20, 35781223, 'daily', 'mpesa', '02/16/2018', '09:34am', '02/17/2018', '92.00'),
(23, 35781223, 'daily', 'mpesa', '02/19/2018', '04:56pm', '02/18/2018', '92.00'),
(24, 36566580, 'daily', 'mpesa', '02/19/2018', '05:35pm', '02/20/2018', '70.00'),
(25, 35781223, 'daily', 'mpesa', '02/19/2018', '05:37pm', '02/18/2018', '92.00'),
(26, 35781223, 'daily', 'mpesa', '02/19/2018', '05:37pm', '02/19/2018', '92.00'),
(27, 35781223, 'daily', 'mpesa', '02/21/2018', '09:14am', '02/20/2018', '92.00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` text NOT NULL,
  `password` varchar(100) NOT NULL,
  `location` text NOT NULL,
  `id_number` int(8) NOT NULL,
  `phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `location`, `id_number`, `phone`) VALUES
(6, 'Peter mason', 'masonpita@gmail.com', '5bbcf97ba651eb9d3f1ff526f63c91a0', '', 35098765, ''),
(7, 'Oliver Tweesty', 'olivertweesty32@gmail.com', 'ee1e0c9af70ad19be6e36468ed82502f', 'kitale', 35678909, ''),
(8, 'Augustine Owuor', 'augustinetreezy@gmail.com', 'd8c8af643684315eafeccd2cf7d40826', '', 36566580, ''),
(10, 'Nebster Malash', 'trizzletimberlake@gmail.com', '669bd0746acf74811d192f266d4dbc97', '', 35781223, '0789564251'),
(13, 'John Doe', '', '52ab27009bd8f3433c99ea67cd80d0bb', '', 36568945, '0715977451');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments_report`
--
ALTER TABLE `payments_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_number` (`id_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `payments_report`
--
ALTER TABLE `payments_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
