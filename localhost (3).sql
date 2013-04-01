-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 01, 2013 at 03:47 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kwartir_pramuka`
--
CREATE DATABASE `kwartir_pramuka` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `kwartir_pramuka`;

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE IF NOT EXISTS `activities` (
  `activity_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(256) NOT NULL,
  `description` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `flag_modified` int(1) DEFAULT '0',
  `image` varchar(256) NOT NULL,
  `active` int(1) DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`activity_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`activity_id`, `title`, `description`, `user_id`, `flag_modified`, `image`, `active`, `created`, `modified`) VALUES
(1, 'Tabur bunga', 'Varius etiam malesuada bibeum donec sit amet orci augue tristique eros amet risus. Mollis malesuada ipsum primis in faucibus orci luctus. Mollis malesuada primis in faucibus luctus ultrces posuere cubilia nis velit porttitor euismod pharetra interetiam laoreet gitis placerat magna sit amet massa.', 1, 0, 'error.jpg', 1, '2013-03-20 23:33:36', '2013-03-20 23:33:41');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE IF NOT EXISTS `banners` (
  `banner_id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(256) NOT NULL,
  `title` varchar(256) DEFAULT NULL,
  `url` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`banner_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `banners`
--


-- --------------------------------------------------------

--
-- Table structure for table `cms`
--

CREATE TABLE IF NOT EXISTS `cms` (
  `cms_id` int(11) NOT NULL AUTO_INCREMENT,
  `description` text NOT NULL,
  `image` varchar(256) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`cms_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `cms`
--

INSERT INTO `cms` (`cms_id`, `description`, `image`, `user_id`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla iaculis aliquet augue, varius purus\r\n				sollicitudin eget. Donec tellus nunc, sollicitudin eu congue tempor, dapibus et metus. Fusce ac\r\n				ipsum at magna accumsan scelerisque sedon dolor. Mauris consectetur tortor elit laoreet feugiat.\r\n				Maecenas facilisis dui ut mi mollis at fermentum lacus euismod. Donec in nibh sem sagittis molestie.\r\n				Vivamus ultrices, urna vel vestibulum faucibus, nisl sapien semper ligula, ac vehicula urna justo\r\n				quis elit. Nulla purus nunc, aliquet vel tincidunt quis, semper et ante. Fusce ultrices commodo dolor\r\n				id fermentum. Vestibulum sem urna, mollis id vestibulum sed, viverra at est. Vestibulum pretium, leo\r\n				et tincidunt ultrices, neque diam posuere orci, amet vulputate enim quam eu magna. Vestibulum ante\r\n				ipsum primis faucibus orci luctus et ultrices posuere cubilia curae.\r\n				Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla iaculis aliquet augue, varius purus\r\n				sollicitudin eget. Donec tellus nunc, sollicitudin eu congue tempor, dapibus et metus. Fusce ac\r\n				ipsum at magna accumsan scelerisque sedon dolor. Mauris consectetur tortor elit laoreet feugiat.\r\n				Maecenas facilisis dui ut mi mollis at fermentum lacus euismod. Donec in nibh sem sagittis molestie.\r\n				Vivamus ultrices, urna vel vestibulum faucibus, nisl sapien semper ligula, ac vehicula urna justo\r\n				quis elit. Nulla purus nunc, aliquet vel tincidunt quis, semper et ante. Fusce ultrices commodo dolor\r\n				id fermentum. Vestibulum sem urna, mollis id vestibulum sed, viverra at est. Vestibulum pretium, leo\r\n				et tincidunt ultrices, neque diam posuere orci, amet vulputate enim quam eu magna. Vestibulum ante\r\n				ipsum primis faucibus orci luctus et ultrices posuere cubilia curae.', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `contact_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `message` text NOT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`contact_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `contacts`
--


-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `event_id` int(6) NOT NULL AUTO_INCREMENT,
  `title` varchar(256) NOT NULL,
  `event_description` text,
  `from` date NOT NULL,
  `to` date DEFAULT NULL,
  `clock` time DEFAULT NULL,
  `location` varchar(256) NOT NULL,
  `active` int(1) DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`event_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `title`, `event_description`, `from`, `to`, `clock`, `location`, `active`, `created`, `modified`) VALUES
(1, 'jambore', 'bertempat di gua terlarang, dengan suasana mistis tingkat tinggi', '2013-03-20', '2013-03-24', '10:00:00', 'cibubur', 1, '2013-03-20 22:47:47', '2013-03-20 22:47:52');

-- --------------------------------------------------------

--
-- Table structure for table `forgots`
--

CREATE TABLE IF NOT EXISTS `forgots` (
  `id_forgot` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `new_password` varchar(256) NOT NULL,
  `code_activation` varchar(256) NOT NULL,
  `completed` int(1) DEFAULT '0',
  `created_forgot` datetime DEFAULT NULL,
  PRIMARY KEY (`id_forgot`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `forgots`
--

INSERT INTO `forgots` (`id_forgot`, `user_id`, `new_password`, `code_activation`, `completed`, `created_forgot`) VALUES
(1, 1, '19900731', 'fc4KeXXJtp6KGyYUPwdM9LO8cQZYs6Z1', 1, '2013-03-24 04:28:07');

-- --------------------------------------------------------

--
-- Table structure for table `gallery_detail`
--

CREATE TABLE IF NOT EXISTS `gallery_detail` (
  `gallery_detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `gallery_header_id` int(11) NOT NULL,
  `title` varchar(128) DEFAULT NULL,
  `image` varchar(256) NOT NULL,
  `active` int(1) NOT NULL DEFAULT '1',
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`gallery_detail_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `gallery_detail`
--


-- --------------------------------------------------------

--
-- Table structure for table `gallery_headers`
--

CREATE TABLE IF NOT EXISTS `gallery_headers` (
  `gallery_header_id` int(11) NOT NULL AUTO_INCREMENT,
  `title_gallery` varchar(256) NOT NULL,
  `photo_primer` varchar(256) NOT NULL,
  `active_header` int(1) DEFAULT '1',
  `created` datetime NOT NULL,
  PRIMARY KEY (`gallery_header_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `gallery_headers`
--

INSERT INTO `gallery_headers` (`gallery_header_id`, `title_gallery`, `photo_primer`, `active_header`, `created`) VALUES
(1, 'apa aja boleh', 'dsfdsf.png', 1, '2013-03-20 22:16:57');

-- --------------------------------------------------------

--
-- Table structure for table `inventories`
--

CREATE TABLE IF NOT EXISTS `inventories` (
  `inventory_id` int(11) NOT NULL AUTO_INCREMENT,
  `item` varchar(256) NOT NULL,
  `qty` int(11) NOT NULL,
  `limit_to_notif` int(11) NOT NULL,
  PRIMARY KEY (`inventory_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `inventories`
--


-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE IF NOT EXISTS `logs` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `description_log` text NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`log_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `logs`
--


-- --------------------------------------------------------

--
-- Table structure for table `print_logs`
--

CREATE TABLE IF NOT EXISTS `print_logs` (
  `log_print_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `user_id_printed` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`log_print_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `print_logs`
--


-- --------------------------------------------------------

--
-- Table structure for table `profile_visibilities`
--

CREATE TABLE IF NOT EXISTS `profile_visibilities` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `user_id` int(6) NOT NULL,
  `v_phone` int(1) NOT NULL DEFAULT '1',
  `v_address` int(1) NOT NULL DEFAULT '1',
  `v_email` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `profile_visibilities`
--

INSERT INTO `profile_visibilities` (`id`, `user_id`, `v_phone`, `v_address`, `v_email`) VALUES
(1, 4, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `status_prints`
--

CREATE TABLE IF NOT EXISTS `status_prints` (
  `status_print_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `user_printer_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `last_print` datetime DEFAULT NULL,
  PRIMARY KEY (`status_print_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `status_prints`
--


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `role_id` int(2) NOT NULL,
  `name` varchar(256) NOT NULL,
  `birthday` varchar(25) NOT NULL,
  `hometown` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `gender` enum('male','female') NOT NULL DEFAULT 'male',
  `blood_type` enum('A','B','AB','O') DEFAULT NULL,
  `religius` varchar(128) NOT NULL,
  `address` text NOT NULL,
  `NIP` char(17) DEFAULT NULL,
  `phone` varchar(15) NOT NULL,
  `gugus_depan` varchar(15) NOT NULL,
  `kwartir_ranting` varchar(15) NOT NULL,
  `password` varchar(128) NOT NULL,
  `activation_code` varchar(128) NOT NULL,
  `status` int(1) DEFAULT '1',
  `active` int(1) DEFAULT '0',
  `deleted` int(1) DEFAULT '0',
  `image` varchar(256) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `birthday`, `hometown`, `email`, `gender`, `blood_type`, `religius`, `address`, `NIP`, `phone`, `gugus_depan`, `kwartir_ranting`, `password`, `activation_code`, `status`, `active`, `deleted`, `image`, `created`, `modified`) VALUES
(2, 1, 'Batik Ismoyo', '27 March 2013', 'Jakarta', 'iksan46asik@gmail.com', 'male', 'AB', 'Kristen', 'sdasdsafds', '0917-0201-130001', '2147483647', '01', '02', '56d4e09f3688348ef4cb5251d1a9ca03', 'pDQIkFmbtgmGuS4dPORz56d4e09f36', 0, 0, 0, NULL, '2013-03-17 10:49:58', '2013-03-17 10:49:58'),
(3, 1, 'iksan', '5 March 2013', 'Jakarta', 'ican46asik@yahoo.com', 'male', 'AB', 'Islam', 'jl. cipinang muara 3 rt 008/04 no.1 jatinegara jakarta timur', NULL, '081210462110', '04', '01', '56d4e09f3688348ef4cb5251d1a9ca03', 'E0KvP704wdaX1E4l4nDs56d4e09f36', 1, 0, 0, NULL, '2013-03-24 04:43:31', '2013-03-24 04:43:31'),
(4, 1, 'muchamad ichsan', '12 March 2013', 'Jakarta', 'iksan.iksan@yopmail.com', 'male', 'AB', 'Islam', 'fghfh fdh gfh fgh fgh fgh fg hfghfghfg', '0917-0301-130007', '2147483647', '01', '03', '6df698afca6ba074d0c508881a7c231b', '3c6qBDyYgo79DHogOVfF56d4e09f36', 1, 1, 0, 'b3912b07ff6a088ed1cf7e430dfa9785JCE0.jpeg', '2013-03-24 05:45:39', '2013-03-30 22:57:00'),
(11, 1, 'muchamad ichsan', '31 July 1990', 'Jakarta', 'muhammad.iksan3107@gmail.com', 'male', 'AB', 'Islam', 'jl.cpinang muara 3', '0917-0102-130008', '081210462110', '02', '01', '56d4e09f3688348ef4cb5251d1a9ca03', '8GbT9Zjk7FIaup4U4ivu56d4e09f36', 1, 1, 0, NULL, '2013-03-31 08:36:06', '2013-03-31 08:36:06');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
