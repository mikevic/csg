-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 01, 2013 at 06:32 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `csg`
--

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE IF NOT EXISTS `info` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `ext` varchar(4) NOT NULL,
  `origin` varchar(100) NOT NULL,
  `dest` varchar(100) NOT NULL,
  `exp` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`id`, `firstName`, `lastName`, `ext`, `origin`, `dest`, `exp`) VALUES
(43, 'Michael', 'Victor', 'jpg', 'Bangalore', 'Chennai', 'Hello'),
(44, 'Michael', 'Victor', 'jpg', 'Bangalore', 'Chennai', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec quis eros id tortor tempus imperdiet elementum vitae purus. Vestibulum at magna est. Donec viverra ligula leo, sit amet vulputate nibh pellentesque in. Integer elementum ultrices ipsum, tristique sodales mi ultricies eu.'),
(45, 'Michael', 'Victor', 'jpg', 'Bangalore', 'Chennai', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec quis eros id tortor tempus imperdiet elementum vitae purus. Vestibulum at magna est. Donec viverra ligula leo, sit amet vulputate nibh pellentesque in. Integer elementum ultrices ipsum, tristique sodales mi ultricies eu.');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
