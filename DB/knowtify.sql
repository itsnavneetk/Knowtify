-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2017 at 03:54 PM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `knowtify`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `iid` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `name` varchar(18) COLLATE utf8_bin NOT NULL,
  `value` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `descp` varchar(24) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`iid`, `sid`, `name`, `value`, `stock`, `descp`) VALUES
(1, 1, 'book', 300, 50, 'Kane and Abel'),
(2, 1, 'earphones', 900, 30, 'soundproof jbl earphones'),
(3, 1, 'watch', 1200, 5, 'fastrack'),
(4, 1, 'pen', 25, 20, 'cello'),
(5, 1, 'phone', 5, 40000, 'samsung galaxy'),
(6, 1, 'muffin', 30, 100, 'strawberry muffin'),
(7, 1, 'bag', 700, 50, 'brown waterproof bag'),
(8, 1, 'umbrella', 300, 50, 'yellow umbrella'),
(9, 2, 'butter chicken', 300, 30, 'indian'),
(10, 2, 'chicken noodles', 200, 30, 'chinese'),
(11, 2, 'chicken manuchrian', 120, 24, 'chinese'),
(12, 2, 'veg sandwiches', 125, 20, 'sandwich'),
(13, 2, 'veg nodles', 150, 20, 'chinese'),
(14, 2, 'chicken biryani', 130, 10, 'indian'),
(15, 2, 'veg biryani', 70, 20, 'indian'),
(16, 2, 'prawn curry', 300, 5, 'coastal'),
(17, 3, 'ES lab manual', 300, 50, 'IT'),
(18, 3, 'DAA lab manual', 300, 50, 'IT'),
(19, 3, 'ITT lab manual', 300, 50, 'IT'),
(20, 3, 'LCT lab manual', 300, 50, 'EEE'),
(21, 3, 'OS lab manual', 300, 50, 'CCE'),
(22, 3, 'Antenna lab manual', 300, 50, 'ECE'),
(23, 3, 'EM lab manual', 300, 50, 'EEE'),
(24, 3, 'FLAT lab manual', 300, 50, 'CSE');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `sid` varchar(30) COLLATE utf8_bin NOT NULL,
  `lat` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `longi` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `place` varchar(30) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`sid`, `lat`, `longi`, `place`) VALUES
('1', '13.3483965', '74.790832', 'Campus Store'),
('2', '13.3451917', '74.7944905', 'Apoorva Mess'),
('3', '13.3518949', '74.7909307', 'HigginBotham\'s');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `uid` int(30) NOT NULL,
  `uname` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `password` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `type` varchar(30) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`uid`, `uname`, `password`, `type`) VALUES
(1, 'navneet', 'navneet', '1'),
(2, 'kaivan', 'kaivan', '1'),
(3, 'aeshani', 'aeshani', '0'),
(4, 'yash', 'yash', '0'),
(5, 'bharat', 'bharat', '1'),
(6, 'saumya', 'saumya', '0');

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `oid` varchar(30) COLLATE utf8_bin NOT NULL,
  `value` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `promo` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `validity` varchar(30) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

CREATE TABLE `shop` (
  `sid` int(11) NOT NULL,
  `name` varchar(7) COLLATE utf8_bin NOT NULL,
  `descp` varchar(16) COLLATE utf8_bin NOT NULL,
  `open` int(11) NOT NULL,
  `close` int(11) NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `shop`
--

INSERT INTO `shop` (`sid`, `name`, `descp`, `open`, `close`, `uid`) VALUES
(1, 'navneet', 'this is 1st shop', 9, 22, 1),
(2, 'kaivan', 'This is Apoorva ', 9, 23, 2),
(3, 'bharat', 'This is Higginbo', 10, 22, 5);

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `uid` int(11) NOT NULL,
  `name` varchar(7) COLLATE utf8_bin NOT NULL,
  `email` int(11) NOT NULL,
  `phone` varchar(17) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`uid`, `name`, `email`, `phone`) VALUES
(1, 'navneet', 2147483647, 'navneet@gmail.com'),
(2, 'kaivan', 2147483647, 'kaivan@gmail.com'),
(3, 'aeshani', 2147483647, 'aeshani@gmail.com'),
(4, 'yash', 2147483647, 'yash@gmail.com'),
(5, 'bharat', 2147483647, 'bharat@gmail.com'),
(6, 'saumya', 2147483647, 'saumya@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`iid`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`oid`);

--
-- Indexes for table `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `iid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `uid` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `shop`
--
ALTER TABLE `shop`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `userinfo`
--
ALTER TABLE `userinfo`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
