-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 17, 2016 at 09:14 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `purchase`
--

-- --------------------------------------------------------

--
-- Table structure for table `aprover`
--

CREATE TABLE `aprover` (
  `Sl No` int(3) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Password` varchar(32) NOT NULL,
  `Designation` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aprover`
--

INSERT INTO `aprover` (`Sl No`, `Name`, `Password`, `Designation`) VALUES
(1, 'Ripon Patgiri', 'e4422a7fc9384201b765cba24c1c962b', 'Assistant Professor, CSE'),
(2, 'Nidul Sinha', '22ff35fccb497932c3b259221af3c837', 'HOD, CSE'),
(3, 'N.V. Deshpande', 'd2eded42c42bb20d18b9cbeb319d478f', 'Director'),
(4, 'Sambhu', 'c618511b8d8da2bb0f60638bba569cd5', 'Staff, Purchase Section');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` bigint(6) NOT NULL,
  `sl no` bigint(6) NOT NULL,
  `order no and date` varchar(50) NOT NULL,
  `date of receipt` date NOT NULL,
  `build no and date` varchar(50) NOT NULL,
  `name of firm` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  `quantity` int(6) NOT NULL,
  `rate` double(10,2) NOT NULL,
  `initial of hod` varchar(150) NOT NULL,
  `Aproval` varchar(12) NOT NULL DEFAULT 'Not Aproved',
  `remarks` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `sl no`, `order no and date`, `date of receipt`, `build no and date`, `name of firm`, `description`, `quantity`, `rate`, `initial of hod`, `Aproval`, `remarks`) VALUES
(4, 0, '1', '2016-12-31', '123', 'asdf', 'sda', 1, 12.05, '', 'Not Aproved', ''),
(5, 0, '123', '2015-04-30', '123123', 'sdfsdf', 'sfasdf', 2, 326.34, '', 'Not Aproved', 'dfg'),
(6, 0, '1', '0000-00-00', '112', 'dasfasdf', 'fdasdfasdfasdf', 12, 11.11, '', 'Not Aproved', '212');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(3) NOT NULL,
  `name` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`) VALUES
(1, 'User', '1a1dc91c907325c69271ddf0c944bc72');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aprover`
--
ALTER TABLE `aprover`
  ADD PRIMARY KEY (`Sl No`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `build no and date` (`build no and date`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aprover`
--
ALTER TABLE `aprover`
  MODIFY `Sl No` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
