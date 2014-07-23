-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2014 at 09:50 AM
-- Server version: 5.6.11
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `wf3_ticket`
--
CREATE DATABASE IF NOT EXISTS `wf3_ticket` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `wf3_ticket`;

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE IF NOT EXISTS `ticket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `level` int(11) NOT NULL,
  `dateCreated` datetime NOT NULL,
  `dateResolved` datetime DEFAULT NULL,
  `isResolved` tinyint(1) NOT NULL,
  `note` varchar(255) NOT NULL,
  `student` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`id`, `level`, `dateCreated`, `dateResolved`, `isResolved`, `note`, `student`) VALUES
(1, 0, '2014-07-23 07:41:30', NULL, 0, 'dfa', 'guillaume'),
(2, 0, '2014-07-23 07:42:57', '2014-07-23 08:18:55', 1, 'dfa', 'guillaume'),
(3, 0, '2014-07-23 07:45:44', '2014-07-23 08:18:10', 1, 'dfa', 'guillaume'),
(4, 0, '2014-07-23 07:45:58', '2014-07-23 08:17:45', 1, 'dfa', 'guillaume'),
(5, 0, '2014-07-23 07:47:53', NULL, 0, 'dfa', 'charles'),
(6, 2, '2014-07-23 07:48:16', '2014-07-23 08:22:01', 1, 'dfa', 'guillaume'),
(7, 0, '2014-07-23 07:48:41', '2014-07-23 08:09:34', 1, 'dfa', 'guillaume'),
(8, 0, '2014-07-23 07:48:58', '2014-07-23 08:09:39', 1, 'dfa', 'guillaume'),
(9, 0, '2014-07-23 07:49:28', '2014-07-23 08:19:28', 1, 'dfa', 'guillaume'),
(10, 2, '2014-07-23 08:22:17', NULL, 0, 'yo', 'guillaume'),
(11, 1, '2014-07-23 08:24:02', NULL, 0, 'qwerewr', 'guillaume'),
(12, 1, '2014-07-23 08:24:52', NULL, 0, 'qwerewr', 'guillaume'),
(13, 1, '2014-07-23 08:25:47', NULL, 0, 'qwerewr', 'guillaume');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
