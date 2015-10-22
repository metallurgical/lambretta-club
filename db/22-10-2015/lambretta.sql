-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2015 at 07:00 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lambretta`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`admin_id` int(5) NOT NULL,
  `admin_username` varchar(30) NOT NULL,
  `admin_password` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_username`, `admin_password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
`event_id` int(11) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `text` varchar(255) NOT NULL,
  `event_description` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `start_date`, `end_date`, `text`, `event_description`) VALUES
(6, '2015-10-23 10:00:00', '2015-10-26 16:10:00', 'G konvoi', '<p>\r\n	mmi mimimim jmiimimim miim</p>\r\n'),
(7, '2015-10-21 02:07:00', '2015-10-22 04:23:00', 'Ad reunion', '<p>\r\n	asdasdasdasd asdasd</p>\r\n'),
(8, '2015-10-30 04:22:00', '2015-10-31 06:20:28', 'Ad perjumpaan sek2 lambrett', '<p>\r\n	asdasd sfasdfs asdfasdfasd asdfas asdfasdf asdfasdf asdfasdf asdfasdf asdfasdf</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `events1`
--

CREATE TABLE IF NOT EXISTS `events1` (
`event_id` int(5) NOT NULL,
  `event_title` varchar(255) NOT NULL,
  `event_description` text NOT NULL,
  `event_date_start` datetime NOT NULL,
  `event_date_end` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events1`
--

INSERT INTO `events1` (`event_id`, `event_title`, `event_description`, `event_date_start`, `event_date_end`) VALUES
(1, 'bbbvbvb1', '<p>\r\n	dfgdfgdfg1</p>\r\n', '2015-10-14 07:24:16', '2015-10-22 12:41:40');

-- --------------------------------------------------------

--
-- Table structure for table `event_join`
--

CREATE TABLE IF NOT EXISTS `event_join` (
`event_join_id` int(5) NOT NULL,
  `event_id` int(5) NOT NULL,
  `member_id` int(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_join`
--

INSERT INTO `event_join` (`event_join_id`, `event_id`, `member_id`) VALUES
(11, 6, 2),
(12, 7, 2);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
`member_id` int(5) NOT NULL,
  `member_username` varchar(30) NOT NULL,
  `member_password` varchar(30) NOT NULL,
  `member_email` varchar(255) NOT NULL,
  `member_ic` varchar(255) NOT NULL,
  `member_name` varchar(255) NOT NULL,
  `member_gender` varchar(15) NOT NULL,
  `member_address` text NOT NULL,
  `member_date_created` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`member_id`, `member_username`, `member_password`, `member_email`, `member_ic`, `member_name`, `member_gender`, `member_address`, `member_date_created`) VALUES
(2, 'qwe', '123', 'ddd12', '55512', 'bbb2', 'hhh12', '<p>	www12222</p>', '2015-10-16 11:59:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
 ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `events1`
--
ALTER TABLE `events1`
 ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `event_join`
--
ALTER TABLE `event_join`
 ADD PRIMARY KEY (`event_join_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
 ADD PRIMARY KEY (`member_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `admin_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `events1`
--
ALTER TABLE `events1`
MODIFY `event_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `event_join`
--
ALTER TABLE `event_join`
MODIFY `event_join_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
MODIFY `member_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
