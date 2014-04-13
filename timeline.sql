-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 13, 2014 at 09:29 PM
-- Server version: 5.5.34
-- PHP Version: 5.4.6-1ubuntu1.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `timeline`
--

-- --------------------------------------------------------

--
-- Table structure for table `content_data`
--

CREATE TABLE IF NOT EXISTS `content_data` (
  `content_id` int(11) NOT NULL AUTO_INCREMENT,
  `content_title` varchar(150) NOT NULL COMMENT 'Allow Max char limit of 150',
  `content_desc` text NOT NULL,
  `content_start` varchar(20) NOT NULL,
  `content_end` varchar(20) NOT NULL,
  `content_revision_history` int(11) NOT NULL DEFAULT '1',
  `content_updated_by` int(11) NOT NULL COMMENT 'user id who updates the content',
  `content_modified_on` varchar(20) NOT NULL,
  `content_created_on` varchar(20) NOT NULL,
  PRIMARY KEY (`content_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `content_manage_tags`
--

CREATE TABLE IF NOT EXISTS `content_manage_tags` (
  `content_id` int(11) NOT NULL COMMENT 'From Content table',
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `timeline_tags`
--

CREATE TABLE IF NOT EXISTS `timeline_tags` (
  `tag_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Unique Tag Id Auto Incremented',
  `tag_name` text NOT NULL COMMENT 'Unique Tag Name',
  `tag_description` text NOT NULL COMMENT 'Description to explain about each tags',
  PRIMARY KEY (`tag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
