-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2017 at 09:18 PM
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
  `code` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `name` varchar(18) COLLATE utf8_bin NOT NULL,
  `price` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `descp` varchar(24) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`code`, `sid`, `name`, `price`, `stock`, `descp`) VALUES
(1, 1, 'book', 300, 50, 'Kane and Abel'),
(2, 1, 'earphones', 900, 30, 'soundproof jbl earphones'),
(3, 1, 'watch', 1200, 5, 'fastrack'),
(4, 1, 'pen', 25, 20, 'cello'),
(5, 1, 'phone', 40000, 5, 'samsung galaxy'),
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
  `sid` int(30) NOT NULL,
  `lat` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `longi` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `place` varchar(30) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`sid`, `lat`, `longi`, `place`) VALUES
(1, '13.3483965', '74.790832', 'Campus Store'),
(2, '13.3451917', '74.7944905', 'Apoorva Mess'),
(3, '13.3518949', '74.7909307', 'HigginBotham\'s'),
(4, '13.346335', '74.794151', 'Food Court'),
(5, '13.349235', '74.789686', 'Aditya Mess'),
(6, '12.349235', '73.789686', 'Some far location'),
(7, '14.349235', '75.789686', 'Some far location');

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
-- Table structure for table `order1`
--

CREATE TABLE `order1` (
  `oid` int(100) NOT NULL,
  `sid` int(10) NOT NULL,
  `item` varchar(100) COLLATE utf8_bin NOT NULL,
  `quantity` varchar(10) COLLATE utf8_bin NOT NULL,
  `price` varchar(100) COLLATE utf8_bin NOT NULL,
  `uid` varchar(100) COLLATE utf8_bin NOT NULL,
  `ownerId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `order1`
--

INSERT INTO `order1` (`oid`, `sid`, `item`, `quantity`, `price`, `uid`, `ownerId`) VALUES
(65, 1, 'book', '3', '300', 'aeshani', 0),
(66, 1, 'watch', '2', '1200', 'aeshani', 0),
(67, 1, 'pen', '1', '25', 'aeshani', 0);

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

CREATE TABLE `shop` (
  `sid` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_bin NOT NULL,
  `descp` varchar(140) COLLATE utf8_bin NOT NULL,
  `open` int(11) NOT NULL,
  `close` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `html` varchar(200) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `shop`
--

INSERT INTO `shop` (`sid`, `name`, `descp`, `open`, `close`, `uid`, `html`) VALUES
(1, 'Campus Store', 'This is campus store', 9, 22, 1, ''),
(2, 'Apoorva Mess', 'Varied options and low prices plus food quality is amazing', 9, 23, 2, ''),
(3, 'HigginBotham\'s', 'This is Higginbotham\'s', 10, 17, 5, ''),
(4, 'Food Court', 'The ambience of this place is just amazing coupled with the quality food', 6, 23, 2, ''),
(5, 'Aditya Mess', 'Decent food at affordable rates and the staff are friendly', 6, 23, 2, ''),
(6, 'Some far location', 'They offer rolls, baked cakes, samosas, puffs and coffee/tea ', 1, 25, 2, ''),
(7, 'Some far location', 'Some far location', 1, 25, 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `uid` int(11) NOT NULL,
  `name` varchar(7) COLLATE utf8_bin NOT NULL,
  `email` varchar(11) COLLATE utf8_bin NOT NULL,
  `phone` varchar(17) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`uid`, `name`, `email`, `phone`) VALUES
(1, 'navneet', '2147483647', 'navneet@gmail.com'),
(2, 'kaivan', '2147483647', 'kaivan@gmail.com'),
(3, 'aeshani', '2147483647', 'aeshani@gmail.com'),
(4, 'yash', '2147483647', 'yash@gmail.com'),
(5, 'bharat', '2147483647', 'bharat@gmail.com'),
(6, 'saumya', '2147483647', 'saumya@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`code`);

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
-- Indexes for table `order1`
--
ALTER TABLE `order1`
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
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `sid` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `uid` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `order1`
--
ALTER TABLE `order1`
  MODIFY `oid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT for table `shop`
--
ALTER TABLE `shop`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `userinfo`
--
ALTER TABLE `userinfo`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
