-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2017 at 07:18 AM
-- Server version: 5.5.57-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `c9`
--

-- --------------------------------------------------------

--
-- Table structure for table `adoptees`
--

CREATE TABLE IF NOT EXISTS `adoptees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `type` tinytext NOT NULL,
  `breed` varchar(50) NOT NULL,
  `yob` year(4) NOT NULL COMMENT 'Year of Birth',
  `color` varchar(50) NOT NULL,
  `pictureURL` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `adoptees`
--

INSERT INTO `adoptees` (`id`, `name`, `type`, `breed`, `yob`, `color`, `pictureURL`, `description`) VALUES
(1, 'Charlie', 'Dog', 'Golden Retriever', 2011, 'Golden Brown', 'charlie.jpg', 'I''m a very cute dog!'),
(2, 'Carl', 'Cat', 'Tabby', 2015, 'Grey', 'carl.jpg', 'The most adorable kitty you''ll ever meet.'),
(3, 'Samantha', 'Panda', 'Chinese', 2010, 'Black/White', 'samantha.jpg', 'I love bamboo and climbing things!'),
(4, 'Ted', 'Sloth', 'Sloth', 2014, 'Grey', 'ted.jpg', 'I enjoy laying around and doing nothing all day... just like you in the weekends.'),
(5, 'Sally', 'Cat', 'Tabby', 2012, 'Black', 'sally.jpg', 'Looking for a loving home. I am most definitely NOT bad luck.'),
(6, 'Alex', 'Lion', 'Wild', 2013, 'Golden Brown', 'alex.jpg', 'Adopt me! I promise I''ll try not to eat you.');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
