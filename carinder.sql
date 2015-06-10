-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2015 at 04:36 PM
-- Server version: 5.5.40-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

 
--
-- Database: `carfinder`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `town_id` int(11) NOT NULL,
  `user_name` varchar(25) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `email` varchar(45) NOT NULL,
  `mobile_no` int(20) NOT NULL COMMENT 'Use for sms',
  `adress_1` varchar(25) NOT NULL,
  `adress_street` varchar(25) NOT NULL,
  `status` varchar(10) NOT NULL,
  `auth` varchar(200) DEFAULT NULL,
  `user_password` varchar(250) DEFAULT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `user_type` char(1) DEFAULT NULL COMMENT 'A - admin,\nC - call center',
  PRIMARY KEY (`admin_id`),
  KEY `fk_admin_town1` (`town_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `town_id`, `user_name`, `first_name`, `last_name`, `email`, `mobile_no`, `adress_1`, `adress_street`, `status`, `auth`, `user_password`, `image`, `created`, `modified`, `user_type`) VALUES
(1, 10, 'madhuranga', 'Madhuranga', 'Senadheera', 'lilan.maduranga@gmail.com', 712077519, 'Aruggala', 'Dehiowita', 'A', 'sssssss', 'b24331b1a138cde62aa1f679164fc62f23lj1235lj34oje3ltoew9lknln', 'default.jpg', '2014-06-01 10:04:59', '2014-08-29 10:15:07', NULL),
(2, 8, 'adminsahan', 'Sahan', 'Perera', 'admin@sahan.com', 775200003, 'Gampaha', 'Gampaha', 'A', 'sdf', '47bce5c74f589f4867dbd57e9ca9f80823lj1235lj34oje3ltoew9lknln', 'default.jpg', '2014-08-29 10:08:01', '2014-08-29 10:08:01', NULL),
(3, 10, '', 'Madhuranga', 'Senadheera', 'lilan.maduranga@gmail.com', 712077519, 'Aruggala', 'Dehiowita', '', NULL, NULL, 'default.jpg', '2014-08-30 08:00:14', '2014-08-30 08:00:14', NULL),
(4, 10, '', 'Madhuranga', 'Senadheera', 'lilan.maduranga@gmail.com', 712077519, 'Aruggala', 'Dehiowita', '', NULL, NULL, 'default.jpg', '2014-08-30 08:02:38', '2014-08-30 08:02:38', NULL),
(5, 10, '', 'Madhuranga', 'Senadheera', 'lilan.maduranga@gmail.com', 712077519, 'Aruggala', 'Dehiowita', '', NULL, NULL, 'default.jpg', '2014-08-30 08:03:22', '2014-08-30 08:03:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bookmark_location`
--

CREATE TABLE IF NOT EXISTS `bookmark_location` (
  `bookmark_location_id` int(11) NOT NULL AUTO_INCREMENT,
  `driver_id` int(11) NOT NULL,
  `town_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `note` blob,
  `priority` int(11) DEFAULT NULL,
  `lat` float DEFAULT NULL,
  `lon` float DEFAULT NULL,
  `status` char(1) DEFAULT NULL COMMENT 'A-Avaialabel , D - Delete',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`bookmark_location_id`),
  KEY `fk_bookmark_location_driver1` (`driver_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE IF NOT EXISTS `brand` (
  `brand_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(10) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`brand_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_id`, `name`, `image`, `created`, `modified`) VALUES
(1, 'Toyota', 'toyota-cars-logo-emblem.jpg', '2014-08-29 00:59:58', '2014-08-29 00:59:58'),
(2, 'Honda', 'honda-cars-logo-emblem.jpg', '2014-08-29 09:48:03', '2014-08-29 09:48:03'),
(3, 'Bajaj', '2.jpg', '2014-08-29 09:50:18', '2014-08-29 09:50:36');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
  `chat_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_id` int(11) DEFAULT NULL,
  `driver_id` int(11) DEFAULT NULL,
  `massage` varchar(45) DEFAULT NULL,
  `status` char(1) DEFAULT 'A' COMMENT 'A = active\nI = Deleted',
  `read` char(5) NOT NULL DEFAULT 'NTR' COMMENT 'R= read,NTR = not read',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`chat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`chat_id`, `admin_id`, `driver_id`, `massage`, `status`, `read`, `created`, `modified`) VALUES
(1, NULL, 1, 'hi', 'A', 'NTR', '2014-08-28 23:56:21', '2014-08-28 23:56:21'),
(2, 1, NULL, 'hi', 'A', 'NTR', '2014-08-29 01:07:36', '2014-08-29 01:07:36'),
(3, NULL, 4, 'hi', 'A', 'NTR', '2014-08-29 01:08:06', '2014-08-29 01:08:06'),
(4, NULL, 2, 'Hello', 'A', 'NTR', '2014-08-29 01:17:07', '2014-08-29 01:17:07'),
(5, NULL, 2, 'Ah haaaa????', 'A', 'NTR', '2014-08-29 01:17:46', '2014-08-29 01:17:46'),
(6, NULL, 4, 'kastiya moko wenne chat karanawa wage', 'A', 'NTR', '2014-08-29 01:18:31', '2014-08-29 01:18:31'),
(7, NULL, 2, 'Ne he kos kotanawa', 'A', 'NTR', '2014-08-29 01:20:04', '2014-08-29 01:20:04'),
(8, NULL, 1, 'Pissu nathnam sok', 'A', 'NTR', '2014-08-29 02:35:17', '2014-08-29 02:35:17'),
(9, 2, NULL, 'hellow', 'A', 'NTR', '2014-08-29 12:17:16', '2014-08-29 12:17:16'),
(10, 1, NULL, 'sss', 'A', 'NTR', '2014-08-30 00:48:49', '2014-08-30 00:48:49'),
(11, 1, NULL, 'test', 'A', 'NTR', '2014-08-30 00:49:12', '2014-08-30 00:49:12'),
(12, 1, NULL, 'Hire available in Nugegoda', 'A', 'NTR', '2014-08-30 20:39:30', '2014-08-30 20:39:30');

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('05670bc12ad8273b709197004f1e5c2f', '10.240.205.139', 'Mozilla/5.0 (Windows NT 6.1; rv:36.0) Gecko/20100101 Firefox/36.0', 1429815709, ''),
('08ea087839fa8ed4f50c3da55bc359ab', '10.240.205.139', 'Mozilla/5.0 (Windows NT 6.1; rv:36.0) Gecko/20100101 Firefox/36.0', 1429815434, ''),
('1a21ea9922383b2e127542ef8b56e654', '10.240.205.139', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:33.0) Gecko/20100101 Firefox/33.0', 1429764523, 'a:9:{s:9:"user_data";s:0:"";s:7:"user_id";s:1:"1";s:9:"user_name";s:10:"madhuranga";s:9:"user_type";s:5:"admin";s:10:"first_name";s:10:"Madhuranga";s:9:"last_name";s:10:"Senadheera";s:10:"user_email";s:25:"lilan.maduranga@gmail.com";s:18:"user_profile_image";s:11:"default.jpg";s:8:"loggedin";b:1;}'),
('1e07f744a3d1c99203ed499d7cfbb97c', '10.240.205.139', 'Mozilla/5.0 (Windows NT 6.1; rv:36.0) Gecko/20100101 Firefox/36.0', 1429815263, ''),
('362b2d88b96a9f1aa5545408ca0d5c46', '10.240.49.97', 'Mozilla/5.0 (Windows NT 6.1; rv:36.0) Gecko/20100101 Firefox/36.0', 1429815344, ''),
('3678b02cffc1d28d70f38ed98720ae82', '10.240.49.97', 'Mozilla/5.0 (Windows NT 6.1; rv:36.0) Gecko/20100101 Firefox/36.0', 1429816004, ''),
('3f844d7e427a2ac1a9bdef6452195791', '10.240.205.139', 'Mozilla/5.0 (Windows NT 6.1; rv:36.0) Gecko/20100101 Firefox/36.0', 1429815916, ''),
('40b984e83d6deacd1f9749274057f5db', '10.240.49.97', 'Mozilla/5.0 (Windows NT 6.1; rv:36.0) Gecko/20100101 Firefox/36.0', 1429815885, ''),
('438cd1f4bf180042ae1553473e8add09', '10.240.205.139', 'Mozilla/5.0 (Windows NT 6.1; rv:36.0) Gecko/20100101 Firefox/36.0', 1429815764, ''),
('4404d72f64232fe056a8a0d7d879752e', '10.240.49.97', 'Mozilla/5.0 (Windows NT 6.1; rv:36.0) Gecko/20100101 Firefox/36.0', 1429815524, ''),
('5319bae33cae74464388f06e4ac84af4', '10.240.49.97', 'Mozilla/5.0 (Windows NT 6.1; rv:36.0) Gecko/20100101 Firefox/36.0', 1429816127, ''),
('6652445a046d803528f0db39c2a0a433', '10.240.49.97', 'Mozilla/5.0 (Windows NT 6.1; rv:36.0) Gecko/20100101 Firefox/36.0', 1429815794, ''),
('70178687d55857029b5407e9e572ee24', '10.240.205.139', 'Mozilla/5.0 (Windows NT 6.1; rv:36.0) Gecko/20100101 Firefox/36.0', 1429815944, ''),
('745e1651fb710b98e26d7ac0397d573f', '10.240.49.97', 'Mozilla/5.0 (Windows NT 6.1; rv:36.0) Gecko/20100101 Firefox/36.0', 1429815584, ''),
('80bce7d0526b71bc7f66cace71df8e4b', '10.240.49.97', 'Mozilla/5.0 (Windows NT 6.1; rv:36.0) Gecko/20100101 Firefox/36.0', 1429815734, ''),
('83dc121c996c37420470be743c2ede56', '10.240.49.97', 'Mozilla/5.0 (Windows NT 6.1; rv:36.0) Gecko/20100101 Firefox/36.0', 1429816094, ''),
('93a2e8a1a8c57a4183e8016df727cafc', '10.240.49.97', 'Mozilla/5.0 (Windows NT 6.1; rv:36.0) Gecko/20100101 Firefox/36.0', 1429815974, ''),
('9e6e5e51c045ab58b67f097f685f32c4', '10.240.49.97', 'Mozilla/5.0 (Windows NT 6.1; rv:36.0) Gecko/20100101 Firefox/36.0', 1429815824, ''),
('a3fb2f014c0a5926a81ba3dbd3f1cb8c', '10.240.205.139', 'Mozilla/5.0 (Windows NT 6.1; rv:36.0) Gecko/20100101 Firefox/36.0', 1429815326, 'a:9:{s:9:"user_data";s:0:"";s:7:"user_id";s:1:"5";s:9:"user_name";s:5:"suren";s:9:"user_type";s:6:"driver";s:10:"first_name";s:5:"Suren";s:9:"last_name";s:7:"Shanaka";s:18:"user_profile_image";s:11:"default.jpg";s:11:"user_status";s:1:"A";s:8:"loggedin";b:1;}'),
('a7095d811ffb7f064016a351810b7996', '10.240.49.97', 'Mozilla/5.0 (Windows NT 6.1; rv:36.0) Gecko/20100101 Firefox/36.0', 1429815404, ''),
('a7f6065eae3f3504762b117126992848', '10.240.49.97', 'Mozilla/5.0 (Windows NT 6.1; rv:36.0) Gecko/20100101 Firefox/36.0', 1429815374, ''),
('af2ce4736c8de5dc666ec1549dab5dfa', '10.240.49.97', 'Mozilla/5.0 (Windows NT 6.1; rv:36.0) Gecko/20100101 Firefox/36.0', 1429815644, ''),
('b33fc2725602f167d9ce7f44f48a4dd9', '10.240.49.97', 'Mozilla/5.0 (Windows NT 6.1; rv:36.0) Gecko/20100101 Firefox/36.0', 1429816034, ''),
('bb993466ebdb7a23bb6427384aa338a7', '10.240.49.97', 'Mozilla/5.0 (Windows NT 6.1; rv:36.0) Gecko/20100101 Firefox/36.0', 1429815854, ''),
('c1ac155edf292698f3cb8658124c1a4d', '10.240.205.139', 'Mozilla/5.0 (Windows NT 6.1; rv:36.0) Gecko/20100101 Firefox/36.0', 1429815315, 'a:9:{s:9:"user_data";s:0:"";s:7:"user_id";s:1:"5";s:9:"user_name";s:5:"suren";s:9:"user_type";s:6:"driver";s:10:"first_name";s:5:"Suren";s:9:"last_name";s:7:"Shanaka";s:18:"user_profile_image";s:11:"default.jpg";s:11:"user_status";s:1:"A";s:8:"loggedin";b:1;}'),
('c3c36df092f4e04c5bc69cd02afde392', '10.240.49.97', 'Mozilla/5.0 (Windows NT 6.1; rv:36.0) Gecko/20100101 Firefox/36.0', 1429815679, ''),
('e299351ed0efc3fc942c980f490623ed', '10.240.49.97', 'Mozilla/5.0 (Windows NT 6.1; rv:36.0) Gecko/20100101 Firefox/36.0', 1429815554, ''),
('e831c2372d1fdbeb29f931d9cf80db44', '10.240.205.139', 'Mozilla/5.0 (Windows NT 6.1; rv:36.0) Gecko/20100101 Firefox/36.0', 1429815614, ''),
('f0a59af11dd7f6ebe77169ae415e0c3c', '10.240.49.97', 'Mozilla/5.0 (Windows NT 6.1; rv:36.0) Gecko/20100101 Firefox/36.0', 1429816064, ''),
('f2a14ed08c4b4f5bd974583f052c73d2', '10.240.49.97', 'Mozilla/5.0 (Windows NT 6.1; rv:36.0) Gecko/20100101 Firefox/36.0', 1429815464, ''),
('fba1d3c08950205860ea2b7ee3db3138', '10.240.49.97', 'Mozilla/5.0 (Windows NT 6.1; rv:36.0) Gecko/20100101 Firefox/36.0', 1429815494, '');

-- --------------------------------------------------------

--
-- Table structure for table `device`
--

CREATE TABLE IF NOT EXISTS `device` (
  `device_id` int(11) NOT NULL AUTO_INCREMENT,
  `vehicle_id` int(11) NOT NULL,
  `status` varchar(10) NOT NULL COMMENT 'active, inactive',
  `authenticate_code` varchar(250) NOT NULL,
  `device_expire_date` datetime DEFAULT NULL,
  `imei` varchar(20) NOT NULL,
  `note` varchar(120) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `image` varchar(100) DEFAULT 'default.jpg',
  PRIMARY KEY (`device_id`),
  KEY `fk_device_vehicle1` (`vehicle_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE IF NOT EXISTS `driver` (
  `driver_id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(244) NOT NULL DEFAULT 'default.jpg',
  `admin_id` int(11) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `address_1` varchar(100) NOT NULL,
  `address_2` varchar(100) DEFAULT NULL COMMENT 'town name',
  `town_id` int(11) DEFAULT NULL,
  `nic` varchar(11) NOT NULL,
  `licen_no` varchar(20) NOT NULL,
  `license_type` char(5) DEFAULT NULL COMMENT 'Lite=Lite vehicle,  Heavy-Heavy',
  `m_tel` varchar(20) NOT NULL COMMENT 'mobile',
  `h_tel` varchar(20) NOT NULL COMMENT 'home_tel',
  `auth_code` varchar(200) DEFAULT NULL,
  `status` char(1) NOT NULL COMMENT 'A -Active\nD - Dactive',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `password` varchar(70) DEFAULT '47bce5c74f589f4867dbd57e9ca9f80823lj1235lj34oje3ltoew9lknln',
  `new_password` varchar(50) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `leave_date` datetime DEFAULT NULL COMMENT 'leave date of the job',
  `new_password_requst_date` datetime DEFAULT NULL,
  `licen_expire_date` date DEFAULT NULL,
  `drivercol` varchar(45) DEFAULT 'driver_img.jpg',
  PRIMARY KEY (`driver_id`),
  KEY `fk_driver_admin1` (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`driver_id`, `image`, `admin_id`, `user_name`, `first_name`, `last_name`, `address_1`, `address_2`, `town_id`, `nic`, `licen_no`, `license_type`, `m_tel`, `h_tel`, `auth_code`, `status`, `created`, `modified`, `password`, `new_password`, `dob`, `leave_date`, `new_password_requst_date`, `licen_expire_date`, `drivercol`) VALUES
(1, 'default.jpg', 1, 'madhuranga', 'Madhuranga', 'Senadheera', 'Kirulapona', 'Kirulapona', NULL, '902261397V', '123246598', 'LITE', '71207519', '2134235234', NULL, 'A', NULL, '2014-08-30 11:26:09', NULL, NULL, '1997-03-28', '0000-00-00 00:00:00', NULL, '0000-00-00', 'driver_img.jpg'),
(2, 'default.jpg', 0, 'nadeesha', 'Nadeesha', 'Eranjan', 'Kelaniya', 'Kelaniya', NULL, '903428768V', '1234568789', 'LITE', '123465798', '123456798', NULL, 'A', '2014-08-28 23:40:30', '2014-08-30 07:21:04', NULL, NULL, '1995-08-28', '2014-08-30 07:20:00', NULL, '2014-10-04', 'driver_img.jpg'),
(3, 'default.jpg', 0, 'ashfan', 'Ashfan', 'Ahamed', 'Colombo', '', NULL, '922331910', 'B123465', 'LITE', '0711427545', '0332270070', NULL, 'A', '2014-08-28 23:59:24', '2014-08-28 23:59:24', '47bce5c74f589f4867dbd57e9ca9f80823lj1235lj34oje3ltoew9lknln', NULL, '2014-08-28', NULL, NULL, '2014-08-28', 'driver_img.jpg'),
(4, 'default.jpg', 0, 'sahan', 'Sahan', 'Perera', 'Gampaha', '', NULL, '9212345678', 'B123465', 'LITE', '123465798', '12345678', NULL, 'A', '2014-08-29 00:12:40', '2014-08-29 00:12:40', '47bce5c74f589f4867dbd57e9ca9f80823lj1235lj34oje3ltoew9lknln', NULL, '2014-08-29', NULL, NULL, '2014-08-29', 'driver_img.jpg'),
(5, 'default.jpg', 0, 'suren', 'Suren', 'Shanaka', 'Mathara', 'Mathara', NULL, '2342323423', 'H2345678', 'LITE', '1234567890', '123456789', NULL, 'A', '2014-08-29 10:42:34', '2014-08-29 10:42:34', '47bce5c74f589f4867dbd57e9ca9f80823lj1235lj34oje3ltoew9lknln', NULL, '0000-00-00', NULL, NULL, '2013-08-28', 'driver_img.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `food_place`
--

CREATE TABLE IF NOT EXISTS `food_place` (
  `food_place_id` int(11) NOT NULL AUTO_INCREMENT,
  `driver_id` int(11) DEFAULT NULL,
  `town_id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `lat` varchar(10) NOT NULL,
  `lon` varchar(10) NOT NULL,
  `note` varchar(45) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `d_reject` char(1) DEFAULT NULL COMMENT 'A-accept;\nR-reject',
  `image` varchar(200) DEFAULT 'default.jpg',
  PRIMARY KEY (`food_place_id`),
  KEY `fk_food_place_driver1` (`driver_id`),
  KEY `fk_food_place_town1` (`town_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `food_place`
--

INSERT INTO `food_place` (`food_place_id`, `driver_id`, `town_id`, `name`, `lat`, `lon`, `note`, `created`, `modified`, `d_reject`, `image`) VALUES
(1, 4, 8, 'Rasa Bojun', '7.087385', '80.01368', '', '2014-08-29 12:57:07', '2014-08-29 12:57:07', NULL, 'default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `fuel_center`
--

CREATE TABLE IF NOT EXISTS `fuel_center` (
  `fuel_center_id` int(11) NOT NULL AUTO_INCREMENT,
  `driver_id` int(11) DEFAULT NULL,
  `name` varchar(45) NOT NULL,
  `town_id` int(11) NOT NULL,
  `lat` varchar(15) DEFAULT NULL,
  `lon` varchar(15) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `d_reject` char(1) DEFAULT 'A' COMMENT 'A-accept;R-reject',
  `note` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`fuel_center_id`),
  KEY `fk_fuel_shed_town1` (`town_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `fuel_center`
--

INSERT INTO `fuel_center` (`fuel_center_id`, `driver_id`, `name`, `town_id`, `lat`, `lon`, `created`, `modified`, `d_reject`, `note`) VALUES
(1, 4, 'Laugfs Gas Station', 1, '6.865677', '79.885065', '2014-08-29 01:00:58', '2014-08-29 01:00:58', 'A', ''),
(2, NULL, 'Nawinna Fuel Station', 1, '6.852822', '79.918041', '2014-08-29 01:12:58', '2014-08-29 01:12:58', '', ''),
(3, NULL, 'fuel Station', 2, '6.843125', '79.929205', '2014-08-29 01:15:30', '2014-08-29 01:15:30', NULL, ''),
(4, NULL, 'Lanka Filling Station', 5, '6.840228', '79.975897', '2014-08-29 01:18:58', '2014-08-29 01:18:58', NULL, ''),
(5, NULL, 'Lanka Petrolium', 3, '6.889145', '79.902222', '2014-08-29 01:21:11', '2014-08-29 01:21:11', NULL, ''),
(6, NULL, 'Rajagiriya Filling Station', 3, '6.908658', '79.898531', '2014-08-29 01:22:49', '2014-08-29 01:22:49', NULL, ''),
(7, NULL, 'Sisira Enterprises Fuel Station', 4, '6.844535', '80.012857', '2014-08-29 01:24:35', '2014-08-29 01:24:35', NULL, ''),
(8, NULL, 'IOC Fuel Station', 6, '6.904619', '79.972642', '2014-08-29 01:27:20', '2014-08-29 01:27:20', NULL, ''),
(9, NULL, 'IOC Fuel Station', 7, '6.878780', '79.871721', '2014-08-29 01:37:51', '2014-08-29 01:37:51', NULL, ''),
(10, NULL, 'Gampaha fuel station', 8, '7.072607', '80.015661', '2014-08-29 02:08:39', '2014-08-29 02:08:39', NULL, ''),
(11, NULL, 'Yakkala Fuel Station', 8, '7.084957', '80.032998', '2014-08-29 02:10:15', '2014-08-29 02:10:15', NULL, ''),
(12, NULL, 'Lanka Filling Station', 9, '79.915821', '79.915821', '2014-08-29 02:12:37', '2014-08-29 02:12:37', NULL, ''),
(13, NULL, 'Lanka IOC -Filling Station', 10, '6.923575', '79.868544', '2014-08-29 02:14:15', '2014-08-29 02:14:15', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `fuel_refill`
--

CREATE TABLE IF NOT EXISTS `fuel_refill` (
  `fuel_refill_id` int(11) NOT NULL AUTO_INCREMENT,
  `status` char(2) NOT NULL DEFAULT 'A' COMMENT 'A,D',
  `vehicle_id` int(11) NOT NULL,
  `driver_id` int(11) DEFAULT NULL,
  `fuel_center_id` int(11) DEFAULT NULL,
  `note` varchar(100) DEFAULT NULL,
  `date` datetime NOT NULL,
  `liter` int(11) NOT NULL,
  `fuel_unit_price` int(11) DEFAULT NULL,
  `reciept_img` varchar(100) NOT NULL DEFAULT 'default.jpg',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`fuel_refill_id`),
  KEY `fk_fuel_refill_fuel_shed1` (`fuel_center_id`),
  KEY `fk_fuel_refill_driver1` (`driver_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `fuel_refill`
--

INSERT INTO `fuel_refill` (`fuel_refill_id`, `status`, `vehicle_id`, `driver_id`, `fuel_center_id`, `note`, `date`, `liter`, `fuel_unit_price`, `reciept_img`, `created`, `modified`) VALUES
(1, 'A', 0, 2, 4, '', '2014-08-15 20:50:00', 5, 56, 'default.jpg', '2014-08-30 20:51:11', '2014-08-30 20:51:11');

-- --------------------------------------------------------

--
-- Table structure for table `fuel_type`
--

CREATE TABLE IF NOT EXISTS `fuel_type` (
  `fuel_type_id` int(2) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`fuel_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `fuel_type`
--

INSERT INTO `fuel_type` (`fuel_type_id`, `name`, `created`, `modified`) VALUES
(1, 'Diesel', '2014-08-29 01:00:26', '2014-08-29 01:00:26'),
(2, 'Petroliam', '2014-08-29 09:51:08', '2014-08-29 09:51:08');

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE IF NOT EXISTS `hotel` (
  `hotel_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `address` varchar(100) NOT NULL,
  `driver_id` int(11) DEFAULT NULL,
  `town_id` int(11) DEFAULT NULL,
  `lat` varchar(15) DEFAULT NULL,
  `lon` varchar(15) DEFAULT NULL,
  `rating` char(1) DEFAULT NULL COMMENT 'A - available\nN-notavailbale',
  `room_available` char(1) DEFAULT NULL COMMENT 'A - available\nN-notavailbale',
  `note` varchar(120) DEFAULT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`hotel_id`),
  KEY `fk_hotel_driver1` (`driver_id`),
  KEY `fk_hotel_town1` (`town_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`hotel_id`, `name`, `address`, `driver_id`, `town_id`, `lat`, `lon`, `rating`, `room_available`, `note`, `image`, `created`, `modified`) VALUES
(1, 'Hilton Colombo Residences', 'Hilton Colombo Residences Union Place Colombo 02 00200', 4, 10, '6.920338', '79.855927', '5', '1', '', 'default.jpg', '2014-08-29 02:21:52', '2014-08-29 02:21:52'),
(2, 'Saketha Madura', 'Saketha Madura Medagama Gampaha', 0, 8, '7.089463', '79.999877', '3', '8', '', 'default.jpg', '2014-08-29 12:26:13', '2014-08-29 12:26:13'),
(3, 'Mount Lavinia Hotel', 'Mount Lavinia Hotel, Hotel Road, Dehiwala-Mount Lavinia, Western Province', 0, 10, '6.833139', '79.862011', '4', '6', '', 'default.jpg', '2014-08-29 12:34:04', '2014-08-29 12:34:04'),
(4, 'Hotel Red Rose', 'Santhanampitiya Road, Nugegoda, Western Province', 2, 1, NULL, '79.908450', '3', '8', '', 'default.jpg', '2014-08-29 12:38:54', '2014-08-29 12:38:54'),
(5, 'Galle Face Hotel', 'Galle Face colombo', 0, 0, '79.845992', '79.845992', '4', '5', '', 'default.jpg', '2014-08-29 12:53:17', '2014-08-29 12:53:17');

-- --------------------------------------------------------

--
-- Table structure for table `inform_car`
--

CREATE TABLE IF NOT EXISTS `inform_car` (
  `inform_car_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(5) DEFAULT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `town_id` int(11) NOT NULL COMMENT 'from nearest town',
  `address_1` varchar(45) NOT NULL,
  `address_2` varchar(45) DEFAULT NULL,
  `m_tel` varchar(15) NOT NULL,
  `request_date` date NOT NULL,
  `request_time` time NOT NULL,
  `admin_note` varchar(255) DEFAULT NULL,
  `status` char(3) DEFAULT NULL COMMENT 'S = Send Taxi\n',
  `d_status` char(1) DEFAULT 'A' COMMENT 'A-Availabe, D-Delete',
  `admin_id` int(11) DEFAULT NULL,
  `website_booking_id` int(11) DEFAULT NULL,
  `driver_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`inform_car_id`),
  KEY `fk_website_booking_admin1` (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `inform_car`
--

INSERT INTO `inform_car` (`inform_car_id`, `title`, `first_name`, `last_name`, `town_id`, `address_1`, `address_2`, `m_tel`, `request_date`, `request_time`, `admin_note`, `status`, `d_status`, `admin_id`, `website_booking_id`, `driver_id`, `created`, `modified`) VALUES
(1, 'Mr', 'Suren', 'Shanaka', 1, 'Kirulapona', 'Dehiowita', '123456789', '2014-08-08', '18:00:00', '', 'SV', 'A', 1, 1, 1, '2014-08-29 23:51:57', '2014-08-30 11:05:55'),
(2, 'Mr', 'Suren', 'Shanaka', 1, 'Kirulapona', 'Dehiowita', '123456789', '2014-08-08', '18:00:00', '', 'SV', 'A', 1, 1, 2, '2014-08-30 11:02:33', '2014-08-30 11:06:15'),
(3, 'Mr', 'Suren', 'Shanaka', 8, 'Nugegoda', 'Kelaniya', '1234567890', '2014-08-30', '20:00:00', '', 'SV', 'A', 1, 1, NULL, '2014-08-30 19:59:20', '2014-08-30 19:59:20');

-- --------------------------------------------------------

--
-- Table structure for table `journey`
--

CREATE TABLE IF NOT EXISTS `journey` (
  `journey_id` int(11) NOT NULL AUTO_INCREMENT,
  `start_time` datetime NOT NULL,
  `end_time` datetime DEFAULT NULL,
  `start_place` varchar(45) NOT NULL,
  `end_place` varchar(45) DEFAULT NULL,
  `vehicle_id` int(11) NOT NULL,
  `driver_id` int(11) NOT NULL,
  `start_town_id` int(11) DEFAULT NULL,
  `end_town_id` int(11) DEFAULT NULL,
  `km` int(11) NOT NULL DEFAULT '0',
  `pasenger_count` int(11) DEFAULT NULL,
  `cash` int(11) DEFAULT NULL,
  `meter_value` int(15) DEFAULT NULL,
  `note` varchar(250) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `start_lat` varchar(45) DEFAULT NULL,
  `start_lon` varchar(45) DEFAULT NULL,
  `end_lat` varchar(45) DEFAULT NULL,
  `end_lon` varchar(45) DEFAULT NULL,
  `status` char(5) NOT NULL DEFAULT 'A' COMMENT 'A-Available, D-Delete',
  PRIMARY KEY (`journey_id`),
  KEY `fk_journey_vehicle1` (`vehicle_id`),
  KEY `fk_journey_driver1` (`driver_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `journey`
--

INSERT INTO `journey` (`journey_id`, `start_time`, `end_time`, `start_place`, `end_place`, `vehicle_id`, `driver_id`, `start_town_id`, `end_town_id`, `km`, `pasenger_count`, `cash`, `meter_value`, `note`, `created`, `modified`, `start_lat`, `start_lon`, `end_lat`, `end_lon`, `status`) VALUES
(1, '2014-08-29 02:00:00', '2014-08-29 02:00:00', 'Nugegoda', 'Maharagama', 1, 1, 1, 2, 12, 12, 122, NULL, '', '2014-08-29 01:07:20', '2014-08-29 01:07:20', NULL, NULL, NULL, NULL, 'A'),
(2, '2014-08-29 02:31:00', '2014-08-29 07:00:00', 'Nugegoda', 'Maharagama', 1, 1, 2, 1, 20, 23, 45, 0, 'Ghj', '2014-08-29 02:34:16', '2014-08-30 17:37:48', NULL, NULL, NULL, NULL, 'A'),
(3, '2014-08-10 17:39:00', '2014-08-10 17:39:00', 'Maharagama Town', 'Henarathgoda botanical garden', 1, 2, 2, 8, 45, 5, 4000, 0, '', '2014-08-29 13:06:05', '2014-08-30 17:39:43', NULL, NULL, NULL, NULL, 'A'),
(4, '2014-01-06 07:00:00', '2014-08-03 08:00:00', 'Visakha Vidyalaya', 'Townhall', 1, 4, 3, 10, 19, 15, 1500, NULL, '', '2014-08-30 00:22:23', '2014-08-30 00:22:23', NULL, NULL, NULL, NULL, 'A'),
(5, '2014-01-15 09:00:00', '2014-01-15 04:00:00', 'Rail way Station', 'Colombo', 4, 3, 8, 10, 32, 3, 1500, NULL, '', '2014-08-30 00:46:35', '2014-08-30 00:46:35', NULL, NULL, NULL, NULL, 'A'),
(6, '2014-02-12 10:00:00', '2014-02-12 11:00:00', 'Delkada', 'Ragama Railway Station', 3, 5, 11, 9, 26, 15, 5000, NULL, '', '2014-08-30 00:48:46', '2014-08-30 00:48:46', NULL, NULL, NULL, NULL, 'A'),
(7, '2014-03-14 07:00:00', '2014-03-14 09:00:00', 'Pannipitiya', 'Openarc', 2, 5, 5, 7, 15, 2, 2500, NULL, '', '2014-08-30 00:50:52', '2014-08-30 00:50:52', NULL, NULL, NULL, NULL, 'A'),
(8, '2014-04-20 05:00:00', '2014-03-20 07:00:00', 'Gampaha bustand', 'Malabe Town', 3, 3, 8, 6, 20, 5000, 2500, 0, '', '2014-08-30 00:54:03', '2014-08-30 18:12:37', NULL, NULL, NULL, NULL, 'A'),
(9, '2014-05-03 04:00:00', '2014-05-03 05:00:00', 'Colombo', 'MaharagamaTown', 2, 4, 10, 2, 10, 1800, 1200, 0, '', '2014-08-30 00:56:43', '2014-08-30 17:34:57', NULL, NULL, NULL, NULL, 'A'),
(10, '2014-06-28 02:00:00', '2014-06-28 00:31:00', 'Delkada', 'Gampaha Hospital', 3, 1, 11, 8, 15, 23, 500, NULL, '', '2014-08-30 00:59:32', '2014-08-30 00:59:32', NULL, NULL, NULL, NULL, 'A'),
(11, '2014-06-18 01:31:00', '2014-06-18 01:31:00', 'Colombo', 'Police station', 3, 2, 0, 10, 35, 1250, 0, 0, '', '2014-08-30 01:02:06', '2014-08-30 18:10:34', NULL, NULL, NULL, NULL, 'A'),
(12, '2014-07-11 11:00:00', '2014-08-30 01:31:00', 'Pannipitiya', 'Colombo', 2, 4, 5, 3, 40, 50, 1500, 0, '', '2014-08-30 01:04:12', '2014-08-30 17:33:09', NULL, NULL, NULL, NULL, 'A'),
(13, '2014-07-11 01:31:00', '2014-07-11 01:31:00', 'Openarc', 'Gampaha', 2, 2, 7, 8, 40, 6, 1500, 0, '', '2014-08-30 01:07:03', '2014-08-30 18:09:02', NULL, NULL, NULL, NULL, 'A'),
(14, '2014-08-20 16:31:00', '2014-08-30 21:00:00', 'Nugegoda', 'Delkada', 1, 3, 4, 11, 10, 4, 2000, 0, '', '2014-08-30 16:38:12', '2014-08-30 18:11:43', NULL, NULL, NULL, NULL, 'A'),
(15, '2014-07-15 16:49:00', '2014-08-15 19:00:00', 'Maharagama', 'Gampaha', 4, 1, 2, 8, 35, 12, 14000, 2500, '', '2014-08-30 16:48:56', '2014-08-30 17:27:08', NULL, NULL, NULL, NULL, 'A'),
(16, '2014-07-09 15:00:00', '2014-07-09 19:00:00', 'Maharaama Town', 'Colombo Town', 1, 3, 2, 10, 25, 12, 2500, 0, '', '2014-08-30 17:25:59', '2014-08-30 18:14:00', NULL, NULL, NULL, NULL, 'A'),
(17, '2014-01-13 17:00:00', '2014-01-13 18:00:00', 'Maharagama Town', 'Ragama Railway Station', 2, 5, 2, 9, 25, 3, 4000, NULL, '', '2014-08-30 17:49:31', '2014-08-30 17:49:31', NULL, NULL, NULL, NULL, 'A'),
(18, '2014-02-10 17:00:00', '2014-02-02 19:00:00', 'Maharagama Town', 'Henarathgoda botanical garden', 1, 4, 2, 8, 10, 15, 8500, 0, '', '2014-08-30 17:58:28', '2014-08-30 18:19:59', NULL, NULL, NULL, NULL, 'A'),
(19, '2014-02-19 17:31:00', '2014-02-19 19:00:00', 'Kotte Town', 'Malabe Town', 4, 3, 3, 6, 15, 3, 500, 0, '', '2014-08-30 18:02:20', '2014-08-30 18:14:58', NULL, NULL, NULL, NULL, 'A'),
(20, '2014-04-17 16:00:00', '2014-04-17 18:00:00', 'Delkada Town', 'pannipitiya', 4, 5, 11, 5, 12, 3, 300, NULL, '', '2014-08-30 18:07:17', '2014-08-30 18:07:17', NULL, NULL, NULL, NULL, 'A'),
(21, '2014-03-28 18:18:00', '2014-08-30 18:19:00', 'Colombo', 'Henarathgoda botanical garden', 1, 2, 10, 8, 25, 5, 4000, 0, '', '2014-08-30 18:18:12', '2014-08-30 18:19:02', NULL, NULL, NULL, NULL, 'A'),
(22, '2014-08-30 19:00:00', '2014-08-30 21:00:00', 'Maharagama', 'Gampaha', 2, 4, 2, 8, 20, 32, 1200, 0, '', '2014-08-30 18:23:17', '2014-08-30 18:25:13', NULL, NULL, NULL, NULL, 'A'),
(23, '2014-06-24 18:31:00', '2014-06-24 18:31:00', 'Delkada', 'Colombo', 4, 4, 11, 10, 25, 3, 1000, NULL, '', '2014-08-30 18:23:38', '2014-08-30 18:23:38', NULL, NULL, NULL, NULL, 'A'),
(24, '2014-08-30 16:00:00', '2014-08-30 20:00:00', 'Maharagama', 'Homagama', 1, 2, 2, 4, 12, 13, 1120, NULL, '', '2014-08-30 18:32:10', '2014-08-30 18:32:10', NULL, NULL, NULL, NULL, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE IF NOT EXISTS `notification` (
  `notification_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_id` int(11) NOT NULL,
  `driver_id` int(11) NOT NULL,
  `messsage` varchar(180) NOT NULL,
  `call_center_id` int(11) NOT NULL,
  `status` char(1) NOT NULL COMMENT 'driver receive status',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `d_reject` char(1) DEFAULT NULL COMMENT 'A-accept;\nR-reject',
  PRIMARY KEY (`notification_id`),
  KEY `fk_driver_notification_admin1` (`admin_id`),
  KEY `fk_driver_notification_driver1` (`driver_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE IF NOT EXISTS `salary` (
  `salary_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_id` int(11) NOT NULL,
  `driver_id` int(11) NOT NULL,
  `cash` int(11) NOT NULL,
  `paid_date` datetime NOT NULL,
  `note` varchar(220) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `type` char(10) DEFAULT 'SALARY' COMMENT 'SALARY = salary,ADVANCE = advance, LOAN=Loan',
  `status` char(5) DEFAULT NULL COMMENT 'A = active, D = Delete',
  PRIMARY KEY (`salary_id`),
  KEY `fk_salary_driver1` (`driver_id`),
  KEY `fk_salary_admin1` (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`salary_id`, `admin_id`, `driver_id`, `cash`, `paid_date`, `note`, `created`, `modified`, `type`, `status`) VALUES
(1, 1, 1, 12, '2014-08-14 18:59:00', '', '2014-08-30 18:59:17', '2014-08-30 18:59:17', 'LOAN', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `today_vehicle_driver`
--

CREATE TABLE IF NOT EXISTS `today_vehicle_driver` (
  `today_vehicle_driver_id` int(11) NOT NULL AUTO_INCREMENT,
  `vehicle_id` int(11) NOT NULL,
  `driver_id` int(11) NOT NULL,
  `note` varchar(256) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `start_time` datetime DEFAULT NULL COMMENT 'harfday fullday',
  `end_time` datetime DEFAULT NULL,
  `status` char(1) NOT NULL DEFAULT 'A' COMMENT 'A-Available, D-Delete',
  PRIMARY KEY (`today_vehicle_driver_id`),
  KEY `fk_journey_vehicle1` (`vehicle_id`),
  KEY `fk_journey_driver1` (`driver_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `today_vehicle_driver`
--

INSERT INTO `today_vehicle_driver` (`today_vehicle_driver_id`, `vehicle_id`, `driver_id`, `note`, `created`, `modified`, `start_time`, `end_time`, `status`) VALUES
(1, 1, 1, 'ssdsd', '2014-08-29 10:25:59', '2014-08-29 12:07:39', '2014-08-29 21:00:00', '2014-08-29 18:00:00', 'A'),
(2, 1, 1, '', '2014-08-29 11:48:47', '2014-08-29 11:48:47', '2014-08-30 22:18:00', '0000-00-00 00:00:00', 'A'),
(3, 2, 4, '', '2014-08-30 11:23:45', '2014-08-30 11:23:45', '2014-08-30 09:00:00', '2014-08-30 16:00:00', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `town`
--

CREATE TABLE IF NOT EXISTS `town` (
  `town_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `lat` varchar(15) DEFAULT NULL,
  `lon` varchar(15) DEFAULT NULL,
  `driver_id` int(11) DEFAULT NULL,
  `status` char(1) NOT NULL DEFAULT 'A' COMMENT 'Availeble, D-Deleted',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`town_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `town`
--

INSERT INTO `town` (`town_id`, `name`, `lat`, `lon`, `driver_id`, `status`, `created`, `modified`) VALUES
(1, 'Nugegoda', '6.863532', '79.901644', 4, 'A', '2014-08-29 00:25:25', '2014-08-29 00:25:25'),
(2, 'Maharagama', '6.849730', '79.925257', 4, 'A', '2014-08-29 00:27:13', '2014-08-29 00:27:13'),
(3, 'Sri Jayawardenepura Kotte', '6.896025', '79.903590', 4, 'A', '2014-08-29 00:28:43', '2014-08-29 00:28:43'),
(4, 'Homagama', '6.840788', '80.012913', 4, 'A', '2014-08-29 00:30:11', '2014-08-29 00:30:11'),
(5, 'Pannipitiya', '6.841328', '79.964795', 4, 'A', '2014-08-29 00:31:39', '2014-08-29 00:31:39'),
(6, 'Malabe', '6.903256', '79.956506', 4, 'A', '2014-08-29 00:35:24', '2014-08-29 00:35:24'),
(7, 'kirulapone', '6.8824593', '79.879007', 4, 'A', '2014-08-29 01:36:56', '2014-08-29 01:36:56'),
(8, 'Gampaha', '7.0914384', '79.999819', 4, 'A', '2014-08-29 02:02:33', '2014-08-29 02:02:33'),
(9, 'Ragama', '7.0431421', '79.915734', 4, 'A', '2014-08-29 02:03:53', '2014-08-29 02:03:53'),
(10, 'Colombo', '6.9268954', '79.861288', 4, 'A', '2014-08-29 02:06:22', '2014-08-29 02:06:22'),
(11, 'Delkada', '6.8626684', '79.901379', 1, 'A', '2014-08-29 12:58:17', '2014-08-29 12:58:17'),
(12, 'Hikkaduwa', '6.92707900', '79.861243', 5, 'A', '2014-08-30 20:26:38', '2014-08-30 20:26:38');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE IF NOT EXISTS `vehicle` (
  `vehicle_id` int(11) NOT NULL AUTO_INCREMENT,
  `brand_id` int(11) NOT NULL,
  `vehicle_type_id` int(11) NOT NULL,
  `register_no` varchar(15) NOT NULL,
  `color` varchar(10) NOT NULL,
  `image` varchar(100) NOT NULL DEFAULT 'default.jpg',
  `tank_liter` int(11) DEFAULT NULL,
  `auth` varchar(200) DEFAULT NULL,
  `status` char(1) DEFAULT NULL COMMENT 'A-Available, I-not availabel',
  `starting_km` int(11) NOT NULL DEFAULT '1' COMMENT 'Vehicle initial km',
  `maintain_km` int(11) NOT NULL DEFAULT '3000',
  `fuel_type_id` int(2) NOT NULL COMMENT 'Petrol\nDiesel\n',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`vehicle_id`),
  KEY `fk_vehicle_Brand1` (`brand_id`),
  KEY `fk_vehicle_vehicle_type_id1` (`vehicle_type_id`),
  KEY `fk_vehicle_fuel_type1` (`fuel_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`vehicle_id`, `brand_id`, `vehicle_type_id`, `register_no`, `color`, `image`, `tank_liter`, `auth`, `status`, `starting_km`, `maintain_km`, `fuel_type_id`, `created`, `modified`) VALUES
(1, 1, 1, 'PA-2721', '#ffffff', 'default.jpg', 23, NULL, 'A', 60000, 75000, 1, '2014-08-29 01:02:21', '2014-08-29 01:02:21'),
(2, 1, 2, 'KR-5018', '#ff0000', 'Sports_Car-128.png', 15, NULL, 'A', 56000, 100000, 2, '2014-08-30 00:27:15', '2014-08-30 00:27:15'),
(3, 1, 1, '256-6062', '#3d85c6', 'Delivery_Van-512.png', 20, NULL, 'A', 150000, 250000, 1, '2014-08-30 00:31:42', '2014-08-30 00:31:42'),
(4, 3, 3, 'AAX-1111', '#ff0000', '217592-Royalty-Free-RF-Clipart-Illustration-Of-An-Outlined-3-Wheeler-Tuk-Tuk.png', 10, NULL, 'A', 0, 1000, 2, '2014-08-30 00:44:20', '2014-08-30 00:44:20');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_log`
--

CREATE TABLE IF NOT EXISTS `vehicle_log` (
  `vehicle_log_id` int(11) NOT NULL AUTO_INCREMENT,
  `vehicle_id` int(11) NOT NULL,
  `driver_id` int(11) NOT NULL,
  `vehicle_status_id` int(11) NOT NULL,
  `town_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `lat` varchar(15) DEFAULT NULL,
  `lon` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`vehicle_log_id`),
  KEY `fk_vehicle_log_driver` (`driver_id`),
  KEY `fk_vehicle_log_vehicle1` (`vehicle_id`),
  KEY `fk_vehicle_log_vehicle_status1` (`vehicle_status_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `vehicle_log`
--

INSERT INTO `vehicle_log` (`vehicle_log_id`, `vehicle_id`, `driver_id`, `vehicle_status_id`, `town_id`, `created`, `modified`, `lat`, `lon`) VALUES
(1, 1, 1, 2, 10, '2014-08-29 09:52:01', '2014-08-29 09:52:01', '6.9340099', '79.844195'),
(2, 3, 2, 1, 5, '2014-08-30 11:39:13', '2014-08-30 11:39:13', '6.9340099', '79.844577');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_status`
--

CREATE TABLE IF NOT EXISTS `vehicle_status` (
  `vehicle_status_id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(10) NOT NULL COMMENT 'A-Available\nH- Hire\nB - Break down\nO- off\n',
  `image` varchar(45) DEFAULT 'default.jpg',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`vehicle_status_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `vehicle_status`
--

INSERT INTO `vehicle_status` (`vehicle_status_id`, `status`, `image`, `created`, `modified`) VALUES
(1, 'Hire', 'default.png', '2014-08-29 09:29:21', '2014-08-29 09:29:21'),
(2, 'Offline', 'default.png', '2014-08-29 09:29:40', '2014-08-29 09:29:40'),
(4, 'Away', 'default.png', '2014-08-29 09:30:35', '2014-08-29 09:30:35'),
(5, 'Break Down', 'default.png', '2014-08-29 09:31:50', '2014-08-29 09:31:50');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_type`
--

CREATE TABLE IF NOT EXISTS `vehicle_type` (
  `vehicle_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(10) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`vehicle_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `vehicle_type`
--

INSERT INTO `vehicle_type` (`vehicle_type_id`, `type`, `created`, `modified`) VALUES
(1, 'Van', '2014-08-29 01:01:55', '2014-08-29 01:01:55'),
(2, 'Car', '2014-08-29 01:02:03', '2014-08-29 01:02:03'),
(3, 'Threewheel', '2014-08-29 09:32:49', '2014-08-29 09:32:49');

-- --------------------------------------------------------

--
-- Table structure for table `website_booking`
--

CREATE TABLE IF NOT EXISTS `website_booking` (
  `website_booking_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(5) DEFAULT NULL,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `address_1` varchar(45) DEFAULT NULL,
  `address_2` varchar(45) DEFAULT NULL,
  `town_id` int(11) DEFAULT NULL,
  `m_tel` varchar(15) DEFAULT NULL,
  `request_date` date DEFAULT NULL,
  `request_time` time DEFAULT NULL,
  `note` varchar(225) DEFAULT NULL,
  `admin_note` varchar(255) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `status` char(3) NOT NULL DEFAULT 'NTR' COMMENT 'NTR=Not read,R = Read, SV = Send Taxi, I = Ignore , IT = Informed the Vehicle',
  `user_verify` char(5) DEFAULT NULL COMMENT 'VU = Valid User, IVU =In valid user',
  `admin_id` int(11) DEFAULT NULL,
  `d_status` char(2) NOT NULL DEFAULT 'A' COMMENT 'A vaialbel, D-Delete',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`website_booking_id`),
  KEY `fk_website_booking_admin1` (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `website_booking`
--

INSERT INTO `website_booking` (`website_booking_id`, `title`, `first_name`, `last_name`, `address_1`, `address_2`, `town_id`, `m_tel`, `request_date`, `request_time`, `note`, `admin_note`, `email`, `status`, `user_verify`, `admin_id`, `d_status`, `created`, `modified`) VALUES
(1, 'Mr', 'maduranga', 'seenadeera', 'NUGEGODA', 'COLOMBO', 2, '0727361790', '2014-01-02', '00:00:09', NULL, NULL, NULL, 'NTR', NULL, NULL, 'A', '2014-08-29 06:18:06', '2014-08-29 06:18:06'),
(2, 'Mr', 'Suren', 'Shanaka', 'Kirulapona', 'Dehiowita', 1, '123456789', '2014-08-08', '18:00:00', NULL, '', '', 'SV', 'VU', 1, 'A', '2014-08-29 12:23:30', '2014-08-30 11:02:22'),
(3, 'Mr', 'Pradeep', 'Rajapaksha', 'Nugegoda', 'Dehiwala', 1, '1234567890', '2014-08-13', '21:00:00', NULL, NULL, NULL, 'NTR', NULL, NULL, 'A', '2014-08-29 12:47:27', '2014-08-29 12:47:27'),
(4, 'Mr', 'Suren', 'Shanaka', 'Nugegoda', 'Kelaniya', 8, '1234567890', '2014-08-30', '20:00:00', NULL, '', '', 'SV', 'VU', 1, 'A', '2014-08-30 19:58:30', '2014-08-30 19:59:12');

-- --------------------------------------------------------

--
-- Table structure for table `website_news`
--

CREATE TABLE IF NOT EXISTS `website_news` (
  `website_news_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `content` varchar(250) NOT NULL,
  `pub_date` varchar(45) NOT NULL COMMENT 'publish_date\n',
  `status` char(1) NOT NULL COMMENT 'P - publish,\nN -notpublish,\n',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `exp_date` datetime DEFAULT NULL,
  PRIMARY KEY (`website_news_id`),
  KEY `fk_website_news_admin1` (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `website_news`
--

INSERT INTO `website_news` (`website_news_id`, `admin_id`, `title`, `content`, `pub_date`, `status`, `created`, `modified`, `exp_date`) VALUES
(1, 0, 'Test', '<p>test</p>', '2014-08-21', 'D', '2014-08-30 09:18:58', '2014-08-30 20:20:19', '2014-08-27 00:00:00'),
(2, 0, 'Family''s have special', '<p><span >Family''s have special price to the trip package on this vacation time 17th, 18th, 19th</span></p>', '2014-08-21', 'A', '2014-08-30 20:19:16', '2014-08-30 20:19:16', '2014-09-20 00:00:00'),
(3, 0, 'New Chrysler 300C car is avail', '<p><span >New Chrysler 300C car is available for self driving</span></p>', '2014-08-28', 'A', '2014-08-30 20:20:00', '2014-08-30 20:20:00', '2014-10-07 00:00:00'),
(4, 0, 'Wedding heiring.', '<p><span >Old 1926 Ford Model T is available for Wedding heiring.</span></p>', '2014-08-20', 'A', '2014-08-30 20:24:20', '2014-08-30 20:24:20', '2014-09-06 00:00:00'),
(5, 0, 'Airport pickup availabel', '<p><span >Airport pickup has seasonal offerings on price.</span></p>', '2014-08-03', 'A', '2014-08-30 20:24:51', '2014-08-30 20:24:51', '2014-09-06 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `website_package`
--

CREATE TABLE IF NOT EXISTS `website_package` (
  `website_package_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `pub_date` varchar(45) NOT NULL COMMENT 'publish_date\n',
  `exp_date` datetime DEFAULT NULL,
  `content` varchar(250) NOT NULL,
  `image` varchar(255) DEFAULT 'default.jpg',
  `status` char(1) NOT NULL COMMENT 'A - publish,\nD - notpublish,\n',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `type` int(11) DEFAULT NULL COMMENT '1 = Wedding,\n2 = Normal\n3 = \n',
  PRIMARY KEY (`website_package_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `website_package`
--

INSERT INTO `website_package` (`website_package_id`, `admin_id`, `title`, `pub_date`, `exp_date`, `content`, `image`, `status`, `created`, `modified`, `type`) VALUES
(1, 1, 'sd', '2014-08-12', '2014-08-28 00:00:00', '<p>sdf</p>', 'default.jpg', 'A', '2014-08-29 12:12:29', '2014-08-29 12:13:54', 1);
--
-- Database: `ci_angular`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL DEFAULT 'default.jpg',
  `username` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `admin_level_id` int(10) DEFAULT NULL,
  `last_login` datetime NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `enable` tinyint(3) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `firstname`, `lastname`, `email`, `image`, `username`, `password`, `admin_level_id`, `last_login`, `created`, `modified`, `enable`) VALUES
(1, 'admin', 'admin', 'admin@madframework.com', 'default.jpg', 'admin', 'd41d8cd98f00b204e9800998ecf8427e0123456789hello', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_option`
--

CREATE TABLE IF NOT EXISTS `tbl_option` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `option_name` text,
  `variable_name` text,
  `option_value` text,
  `scale` varchar(100) DEFAULT NULL,
  `option_type` varchar(100) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_option`
--

INSERT INTO `tbl_option` (`id`, `option_name`, `variable_name`, `option_value`, `scale`, `option_type`, `created`, `modified`) VALUES
(1, 'Site name', 'site_name', 'Mad framework', '13', 'string', '2014-10-10 20:18:05', '2014-10-10 20:18:14'),
(2, 'Address', 'address1', 'Kirulaponne', '11', '1', '2014-10-10 20:20:49', '2014-10-10 20:20:51');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_option_type`
--

CREATE TABLE IF NOT EXISTS `tbl_option_type` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `option_type` varchar(50) DEFAULT NULL,
  `enable` tinyint(3) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE IF NOT EXISTS `tbl_users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `password` varchar(128) NOT NULL,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
--
-- Database: `madframework`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `admin_level_id` int(10) DEFAULT NULL,
  `last_login` datetime NOT NULL,
  `image` varchar(100) NOT NULL DEFAULT 'default.jpg',
  `enable` tinyint(3) DEFAULT '1',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `firstname`, `lastname`, `email`, `username`, `password`, `admin_level_id`, `last_login`, `image`, `enable`, `created`, `modified`) VALUES
(1, 'admin', 'admin', 'admin@madframework.com', 'admin', 'd41d8cd98f00b204e9800998ecf8427e0123456789hello', 1, '0000-00-00 00:00:00', 'default.jpg', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_driver`
--

CREATE TABLE IF NOT EXISTS `tbl_driver` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL DEFAULT 'default.jpg',
  `username` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `last_login` datetime NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `enable` tinyint(3) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_driver`
--

INSERT INTO `tbl_driver` (`id`, `firstname`, `lastname`, `email`, `image`, `username`, `password`, `last_login`, `created`, `modified`, `enable`) VALUES
(1, 'driver', 'driver', 'driver@madframework.com', 'default.jpg', 'driver', 'd41d8cd98f00b204e9800998ecf8427e0123456789hello', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_option`
--

CREATE TABLE IF NOT EXISTS `tbl_option` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `option_name` text,
  `variable_name` text,
  `option_value` text,
  `scale` varchar(100) DEFAULT NULL,
  `option_type` varchar(100) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_option`
--

INSERT INTO `tbl_option` (`id`, `option_name`, `variable_name`, `option_value`, `scale`, `option_type`, `created`, `modified`) VALUES
(1, 'Site name', 'site_name', 'MadFramework', '13', 'string', '2014-10-10 20:18:05', '2014-10-10 20:18:14'),
(2, 'Address', 'address1', 'Kirulaponne', '11', '1', '2014-10-10 20:20:49', '2014-10-10 20:20:51'),
(3, 'Telephone Number', 'tel_no', '0712077519', '10', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_option_type`
--

CREATE TABLE IF NOT EXISTS `tbl_option_type` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `option_type` varchar(50) DEFAULT NULL,
  `enable` tinyint(3) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_option_type`
--

INSERT INTO `tbl_option_type` (`id`, `option_type`, `enable`, `created`, `modified`) VALUES
(1, 'string', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE IF NOT EXISTS `tbl_users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `password` varchar(128) NOT NULL,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
--
-- Database: `panasa`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE IF NOT EXISTS `assignment` (
  `asg_id` int(11) NOT NULL AUTO_INCREMENT,
  `bth_id` int(11) NOT NULL,
  `sub_id` int(11) NOT NULL,
  `asin_description` varchar(5000) NOT NULL,
  `assign_upload` varchar(5000) NOT NULL,
  `asg_add_date` date NOT NULL,
  `asg_expire_date` date NOT NULL,
  `asg_status` char(1) NOT NULL COMMENT 'A - active, I - Inactive',
  PRIMARY KEY (`asg_id`),
  KEY `bth_id` (`bth_id`,`sub_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`asg_id`, `bth_id`, `sub_id`, `asin_description`, `assign_upload`, `asg_add_date`, `asg_expire_date`, `asg_status`) VALUES
(12, 20, 24, '<p>create a docx file about test automation</p>', 'C:/xampp/htdocs/panasa/uploads/assignments/assignments/assignmentnew2.txt', '2015-04-17', '2015-04-01', 'A'),
(10, 21, 27, '<p>prepare a presentation to above attachment.attachment change. please reffer</p>', 'C:/xampp/htdocs/panasa/uploads/assignments/assignments/assignmentnew.txt', '2015-04-15', '2015-05-05', 'A'),
(9, 16, 26, '<p>final assignment</p>', 'C:/xampp/htdocs/panasa/uploads/assignments/assignments/Assignment_01.docx', '2015-04-08', '2015-05-30', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `assignment_answer`
--

CREATE TABLE IF NOT EXISTS `assignment_answer` (
  `asgan_id` int(11) NOT NULL AUTO_INCREMENT,
  `asg_id` int(11) NOT NULL,
  `stu_id` int(11) NOT NULL,
  `bth_id` int(11) NOT NULL,
  `sub_id` int(11) NOT NULL,
  `asgan_file_name` varchar(255) NOT NULL,
  `asgan_submit_date` date NOT NULL,
  `marked_answer` varchar(5000) NOT NULL,
  `asgan_status` char(1) NOT NULL COMMENT 'A- active, I- inactive',
  PRIMARY KEY (`asgan_id`),
  KEY `asg_id` (`asg_id`,`stu_id`,`bth_id`,`sub_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `assignment_answer`
--

INSERT INTO `assignment_answer` (`asgan_id`, `asg_id`, `stu_id`, `bth_id`, `sub_id`, `asgan_file_name`, `asgan_submit_date`, `marked_answer`, `asgan_status`) VALUES
(5, 10, 65, 21, 27, 'C:/xampp/htdocs/panasa/uploads/assignments/answers/errors.txt', '2015-04-15', '', 'A'),
(4, 10, 65, 21, 27, 'C:/xampp/htdocs/panasa/uploads/assignments/answers/E1220411001.doc', '2015-04-15', '', 'I'),
(6, 12, 64, 20, 24, 'C:/xampp/htdocs/panasa/uploads/assignments/answers/assignmentnew.txt', '2015-04-17', '', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE IF NOT EXISTS `batch` (
  `bth_id` int(11) NOT NULL AUTO_INCREMENT,
  `cl_id` int(11) NOT NULL,
  `bth_name` varchar(150) NOT NULL,
  `bth_description` varchar(255) NOT NULL,
  `bth_start_date` date NOT NULL,
  `bth_end_date` date NOT NULL,
  `bth_status` char(1) NOT NULL COMMENT 'A-active, I-inactive',
  PRIMARY KEY (`bth_id`),
  KEY `cl_id` (`cl_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`bth_id`, `cl_id`, `bth_name`, `bth_description`, `bth_start_date`, `bth_end_date`, `bth_status`) VALUES
(15, 34, '2011 intake', '', '2015-01-26', '2015-02-19', 'C'),
(14, 33, '2011 intake', 'complete', '2015-01-26', '2015-04-26', 'C'),
(16, 33, '2015 intake', 'This course will help to improve your knowledge in advanced topics in software engineering which is important to develop high quality, dependable and critical systems. Course has been designed to provide you both theoretical and practical aspects of advan', '2014-12-28', '2015-04-30', 'C'),
(21, 34, '2015 week day batch', '', '2015-04-01', '2015-07-31', 'A'),
(19, 25, '2015 week day batch', 'This course will help to improve your knowledge in advanced topics in software engineering which is important to develop high quality, dependable and critical systems. Course has been designed to provide you both theoretical and practical aspects of advan', '2015-04-01', '2015-08-31', 'A'),
(20, 33, '2015 week end batch', 'This course will help to improve your knowledge in advanced topics in software engineering which is important to develop high quality, dependable and critical systems. Course has been designed to provide you both theoretical and practical aspects of advan', '2015-04-01', '2015-08-31', 'A'),
(22, 34, '2015 week end batch', '', '2015-04-01', '2015-07-31', 'A'),
(23, 35, '2015 week day batch', '', '2015-04-01', '2015-07-31', 'A'),
(24, 35, '2015 week end batch', '', '2015-04-01', '2015-07-31', 'A'),
(25, 25, '2015 week end batch', '', '2015-04-01', '2015-07-31', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `class_schedule`
--

CREATE TABLE IF NOT EXISTS `class_schedule` (
  `clshe_id` int(11) NOT NULL AUTO_INCREMENT,
  `bth_id` int(11) NOT NULL,
  `cls_id` int(11) NOT NULL,
  `sub_id` int(11) NOT NULL,
  `stf_id` int(11) NOT NULL,
  `clshe_date` date NOT NULL,
  `clshe_start_time` time NOT NULL,
  `clshe_end_time` time NOT NULL,
  `clshe_status` char(1) NOT NULL COMMENT 'A-active,I-inactive',
  PRIMARY KEY (`clshe_id`),
  KEY `bth_id` (`bth_id`),
  KEY `cls_id` (`cls_id`),
  KEY `sub_id` (`sub_id`),
  KEY `stf_id` (`stf_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=71 ;

--
-- Dumping data for table `class_schedule`
--

INSERT INTO `class_schedule` (`clshe_id`, `bth_id`, `cls_id`, `sub_id`, `stf_id`, `clshe_date`, `clshe_start_time`, `clshe_end_time`, `clshe_status`) VALUES
(30, 20, 1, 26, 32, '2015-04-12', '08:00:00', '10:30:00', 'I'),
(50, 20, 1, 24, 32, '2015-04-13', '08:00:00', '08:30:00', 'I'),
(52, 20, 1, 24, 27, '2015-04-13', '08:00:00', '08:30:00', 'I'),
(53, 20, 1, 24, 32, '2015-04-13', '08:00:00', '08:30:00', 'I'),
(54, 20, 1, 24, 32, '2015-04-13', '08:00:00', '10:30:00', 'I'),
(55, 20, 1, 24, 32, '2015-04-13', '08:00:00', '10:30:00', 'I'),
(68, 20, 1, 24, 27, '2015-04-13', '07:30:00', '09:30:00', 'A'),
(58, 20, 5, 25, 25, '2015-04-12', '08:00:00', '08:30:00', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `classroom`
--

CREATE TABLE IF NOT EXISTS `classroom` (
  `cls_id` int(11) NOT NULL AUTO_INCREMENT,
  `cls_name` varchar(255) NOT NULL,
  `cls_description` varchar(255) NOT NULL,
  `cls_no_of_student` int(11) NOT NULL,
  `cls_status` char(1) NOT NULL COMMENT 'A - active, I-inactive',
  PRIMARY KEY (`cls_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `classroom`
--

INSERT INTO `classroom` (`cls_id`, `cls_name`, `cls_description`, `cls_no_of_student`, `cls_status`) VALUES
(1, 'A1-1', 'Block A class no 1', 52, 'A'),
(3, 'A1-2', 'Block A class umber 2', 30, 'A'),
(4, 'A2-1', 'Block 2 Class number 2\r\nGolle road block', 20, 'A'),
(5, 'A2-3', 'Bloack 2 class number 2 \r\nGall road class', 15, 'A'),
(6, 'B1-1', 'Block B first class room', 22, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `crs_id` int(11) NOT NULL AUTO_INCREMENT,
  `crs_code` varchar(255) NOT NULL,
  `crs_name` varchar(255) NOT NULL,
  `crs_description` varchar(5000) NOT NULL,
  `crs_status` char(1) NOT NULL COMMENT 'A- active, I -Inactive',
  PRIMARY KEY (`crs_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`crs_id`, `crs_code`, `crs_name`, `crs_description`, `crs_status`) VALUES
(22, 'HNDIT', 'Higher National Diploma in Information Technology (HNDIT)', 'The Higher National Diploma in Information Technology (HND?IT) programme was developed and commenced in the year 2000 with the objective of producing the middle level IT professional required for the new millennium.', 'A'),
(21, 'HNDA', 'Higher National Diploma in Accountancy - (HNDA)', 'After completing HNDA program, the HNDA holders can start their carrier as registered auditor and audit companies except public companies. The syllabus of the HNDA programme was recently revised by taking into the account of the syllabus of the Institute of Chartered Accountants of Sri Lanka and some other syllabuses. The HNDA programme is conducted over four years on full time and part time basis.  we has been conducting this programme from its inception in 1965 with the mission of creating excellent higher national diploma holders who are competent enough and equipped with modern technology in the fields of accounting and finance in order to contribute for the sustainable development of the country.', 'A'),
(23, 'BIT', 'Bachelor of Information Technology ', 'I have a form where on submit i want to show a success msg ,and once it appear i want to fadeout.I am using this code,but not working,I am using live because on load that div is not present,on successful submission of form I am loading that div,hope so my words are clear,any help ll be great.', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `course_level`
--

CREATE TABLE IF NOT EXISTS `course_level` (
  `cl_id` int(11) NOT NULL AUTO_INCREMENT,
  `cl_code` varchar(255) NOT NULL,
  `crs_id` int(11) NOT NULL,
  `cl_name` varchar(100) NOT NULL,
  `cl_description` varchar(5000) NOT NULL,
  `cl_duration` varchar(25) NOT NULL,
  `duration1` int(11) NOT NULL,
  `duration_text1` char(10) NOT NULL,
  `duration2` int(11) NOT NULL,
  `duration_text2` char(10) NOT NULL,
  `cl_status` char(1) NOT NULL,
  PRIMARY KEY (`cl_id`),
  KEY `crs_id` (`crs_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `course_level`
--

INSERT INTO `course_level` (`cl_id`, `cl_code`, `crs_id`, `cl_name`, `cl_description`, `cl_duration`, `duration1`, `duration_text1`, `duration2`, `duration_text2`, `cl_status`) VALUES
(23, '', 18, 'c', '', '', 1, 'Month', 0, 'Day', 'A'),
(33, 'SEM1', 22, 'Year 1 - Semester 1', 'First semester of the course. ', '', 6, 'Month', 0, 'Day', 'A'),
(32, 'SEM8', 21, 'Year 4 - Semester 2', '', '', 6, 'Month', 0, 'Day', 'A'),
(31, 'SEM7', 21, 'Year 4 - Semester 1', '', '', 6, 'Month', 0, 'Day', 'A'),
(30, 'SEM6', 21, 'Year 3 - Semester 2', 'Year 3 - Semester 2 with 6 subjets', '', 6, 'Month', 0, 'Day', 'A'),
(27, 'SEM3', 21, 'Year 2 - Semester 1', 'There are 5 subjects', '', 6, 'Month', 0, 'Day', 'A'),
(28, 'SEM4', 21, 'Year 2 - Semester 2', 'Year 2 - Semester 2', '', 6, 'Month', 0, 'Day', 'A'),
(29, 'SEM5', 21, 'Year 3 - Semester 1', 'Year 3 - Semester 1', '', 6, 'Month', 0, 'Day', 'A'),
(26, 'SEM2', 21, 'Year 1 - Semester 2', 'There are 6 subjects', '', 6, 'Month', 0, 'Day', 'A'),
(25, 'SEM1', 21, 'Year 1 - Semester 1', 'There are 5 subjects', '', 6, 'Month', 0, 'Day', 'A'),
(34, 'SEM2', 22, ' Year 1 - Semester 2', '', '', 6, 'Month', 0, 'Day', 'A'),
(35, 'SEM3', 22, 'Year 2 - Semester 1', '', '', 6, 'Month', 0, 'Day', 'A'),
(36, 'SEM4', 22, 'Year 2 - Semester 2', '', '', 6, 'Month', 0, 'Day', 'A'),
(37, 'SEM1', 23, 'Level 1- Semester 1', '', '', 6, 'Month', 0, 'Day', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `course_role_detail`
--

CREATE TABLE IF NOT EXISTS `course_role_detail` (
  `crd_id` int(11) NOT NULL AUTO_INCREMENT,
  `crs_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `stf_id` int(11) NOT NULL,
  `crd_description` varchar(255) NOT NULL,
  `crd_status` char(1) NOT NULL,
  `add_date` date NOT NULL,
  `modified_date` date NOT NULL,
  PRIMARY KEY (`crd_id`),
  KEY `crs_id` (`crs_id`),
  KEY `role_id` (`role_id`),
  KEY `stf_id` (`stf_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=63 ;

--
-- Dumping data for table `course_role_detail`
--

INSERT INTO `course_role_detail` (`crd_id`, `crs_id`, `role_id`, `stf_id`, `crd_description`, `crd_status`, `add_date`, `modified_date`) VALUES
(42, 21, 3, 31, '', 'A', '2015-02-14', '2015-02-14'),
(41, 21, 3, 27, '', 'A', '2015-02-14', '2015-02-14'),
(40, 21, 2, 33, '', 'A', '2015-02-14', '2015-02-14'),
(39, 22, 2, 1, '', 'I', '2015-02-14', '2015-02-14'),
(38, 21, 2, 1, '', 'I', '2015-02-14', '2015-02-14'),
(37, 22, 3, 26, '', 'A', '2015-02-14', '2015-02-14'),
(36, 22, 3, 33, '', 'I', '2015-02-14', '2015-02-14'),
(35, 22, 3, 31, '', 'I', '2015-02-14', '2015-02-14'),
(34, 22, 3, 27, '', 'A', '2015-02-14', '2015-02-14'),
(33, 22, 3, 25, '', 'I', '2015-02-14', '2015-02-14'),
(32, 22, 3, 1, '', 'I', '2015-02-14', '2015-02-14'),
(31, 22, 3, 1, '', 'I', '2015-02-14', '2015-02-14'),
(30, 22, 3, 32, '', 'I', '2015-02-14', '2015-02-14'),
(29, 22, 3, 31, '', 'I', '2015-02-14', '2015-02-14'),
(28, 22, 3, 28, '', 'I', '2015-02-14', '2015-02-14'),
(27, 22, 3, 24, '', 'I', '2015-02-14', '2015-02-14'),
(26, 22, 3, 27, '', 'I', '2015-02-14', '2015-02-14'),
(25, 22, 3, 33, '', 'I', '2015-02-14', '2015-02-14'),
(24, 22, 3, 32, '', 'I', '2015-02-14', '2015-02-14'),
(23, 22, 3, 31, '', 'I', '2015-02-14', '2015-02-14'),
(22, 22, 3, 28, '', 'I', '2015-02-14', '2015-02-14'),
(43, 21, 3, 32, '', 'A', '2015-02-14', '2015-02-14'),
(44, 22, 3, 1, '', 'A', '2015-03-18', '2015-03-18'),
(45, 22, 3, 25, '', 'A', '2015-03-18', '2015-03-18'),
(46, 22, 3, 32, '', 'A', '2015-03-18', '2015-03-18'),
(47, 22, 3, 37, '', 'A', '2015-03-18', '2015-03-18'),
(48, 21, 3, 26, '', 'A', '2015-03-18', '2015-03-18'),
(49, 23, 2, 24, '', 'I', '2015-03-18', '2015-03-18'),
(50, 23, 3, 27, '', 'A', '2015-03-18', '2015-03-18'),
(51, 23, 3, 28, '', 'A', '2015-03-18', '2015-03-18'),
(52, 23, 3, 31, '', 'A', '2015-03-18', '2015-03-18'),
(53, 23, 3, 33, '', 'A', '2015-03-18', '2015-03-18'),
(54, 22, 2, 24, '', 'I', '2015-04-07', '2015-04-07'),
(55, 22, 2, 27, '', 'I', '2015-04-13', '2015-04-13'),
(56, 22, 2, 32, '', 'A', '2015-04-13', '2015-04-13'),
(57, 23, 2, 31, '', 'A', '2015-04-13', '2015-04-13'),
(58, 22, 2, 24, '', 'A', '2015-04-16', '2015-04-16'),
(59, 22, 2, 25, '', 'A', '2015-04-16', '2015-04-16'),
(60, 22, 2, 40, '', 'A', '2015-04-16', '2015-04-16'),
(61, 22, 2, 27, '', 'A', '2015-04-16', '2015-04-16'),
(62, 22, 2, 28, '', 'A', '2015-04-16', '2015-04-16');

-- --------------------------------------------------------

--
-- Table structure for table `employee_role`
--

CREATE TABLE IF NOT EXISTS `employee_role` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(50) NOT NULL,
  `role_description` varchar(150) NOT NULL,
  `role_status` char(1) NOT NULL COMMENT 'A- active, I -Inactive',
  PRIMARY KEY (`role_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `employee_role`
--

INSERT INTO `employee_role` (`role_id`, `role_name`, `role_description`, `role_status`) VALUES
(1, 'Manager', '', 'A'),
(2, 'Course Coordinator', 'Course cordinaters can cordinate the courses. all functionalitys of corses are allowed', 'A'),
(3, 'Lecture', '', 'A'),
(4, 'Front officer', 'Front officer is a person who do student registration ', 'A'),
(8, 'Admin', 'System Administrator has the all access to the system\r\n', 'A'),
(9, 'Attendence Marker', 'He is the person who mark the attendence', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

CREATE TABLE IF NOT EXISTS `forum` (
  `frm_id` int(11) NOT NULL AUTO_INCREMENT,
  `frm_title` varchar(150) NOT NULL,
  `frm_name` varchar(255) NOT NULL,
  `frm_description` varchar(255) NOT NULL,
  `frm_add_by` int(11) NOT NULL,
  `frm_add_date` datetime NOT NULL,
  `frm_added_type` varchar(15) NOT NULL,
  `frm_status` char(1) NOT NULL,
  PRIMARY KEY (`frm_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `forum`
--

INSERT INTO `forum` (`frm_id`, `frm_title`, `frm_name`, `frm_description`, `frm_add_by`, `frm_add_date`, `frm_added_type`, `frm_status`) VALUES
(1, 'test', 'test', 'booruwa buddhika', 24, '2015-03-05 00:00:00', 'staff', 'I'),
(2, 'test', 'test', 'booruwa buddhika', 64, '2015-03-05 00:00:00', 'student', 'I'),
(12, 'athukorala', 'shermila athukorala', '', 40, '2015-04-15 00:00:00', 'staff', 'I'),
(14, 'Subjects are missing', '', 'My Subjects are missing from subject list. So i cannot upload assignments. Please activate it.', 40, '2015-04-15 00:00:00', 'staff', 'A'),
(15, 'Loggin issue', '', 'I cant logging to the system', 40, '2015-04-15 00:00:00', 'staff', 'A'),
(21, 'dsf', '', 'dsf', 40, '2015-04-15 00:00:00', 'staff', 'I'),
(25, 'My Subject missinig', '', 'I registered for HNDIT level 2 but in the system it display HNDIT level1 .please corect it', 65, '2015-04-16 00:00:00', 'student', 'I'),
(26, 'classes reschedule', '', 'Dear student,\r\ncan you come on this friday', 27, '2015-04-16 04:40:36', 'staff', 'P'),
(27, 'When is start the classes after new year vacation', '', 'When is start the classes after new year vacation', 24, '2015-04-16 08:05:56', 'staff', 'P');

-- --------------------------------------------------------

--
-- Table structure for table `forum_answer`
--

CREATE TABLE IF NOT EXISTS `forum_answer` (
  `frans_id` int(11) NOT NULL AUTO_INCREMENT,
  `frm_id` int(11) NOT NULL,
  `frans_answer` varchar(255) NOT NULL,
  `answer_id` int(11) NOT NULL,
  `add_by` int(11) NOT NULL,
  `add_type` varchar(10) NOT NULL,
  `frans_date_time` datetime NOT NULL,
  `frans_status` char(1) NOT NULL COMMENT 'A - active, I-inactive',
  PRIMARY KEY (`frans_id`),
  KEY `frm_id` (`frm_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `forum_answer`
--

INSERT INTO `forum_answer` (`frans_id`, `frm_id`, `frans_answer`, `answer_id`, `add_by`, `add_type`, `frans_date_time`, `frans_status`) VALUES
(1, 1, 'dsf', 0, 0, '', '2015-03-07 01:09:34', 'P'),
(2, 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.', 0, 0, '', '2015-03-07 01:45:02', 'P'),
(3, 1, 'Ww wwwww wwwww wwwww', 0, 0, '', '2015-03-24 10:52:54', 'P'),
(4, 15, 'there is a server issue. it will fixed on tommorw', 0, 40, 'staff', '2015-04-16 12:44:23', 'A'),
(5, 15, 'Is the issue resolve???', 0, 40, 'staff', '2015-04-16 01:57:01', 'A'),
(6, 15, 'Plese participate to tis forum. i need to know whether the issue has been resolve or not', 0, 40, 'staff', '2015-04-16 02:07:27', 'A'),
(7, 15, 'Yes now i can loggin to the system. thanks', 6, 40, 'staff', '2015-04-16 02:15:19', 'A'),
(8, 15, 'NO not yet resolve', 4, 40, 'staff', '2015-04-16 03:26:13', 'A'),
(9, 14, 'Done.Please check', 0, 40, 'staff', '2015-04-16 04:12:47', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE IF NOT EXISTS `marks` (
  `mrk_id` int(11) NOT NULL AUTO_INCREMENT,
  `bth_id` int(11) NOT NULL,
  `stu_id` int(11) NOT NULL,
  `sub_id` int(11) NOT NULL,
  `asg_id` int(11) NOT NULL,
  `mark` int(11) NOT NULL,
  PRIMARY KEY (`mrk_id`),
  KEY `bth_id` (`bth_id`,`stu_id`,`sub_id`,`asg_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`mrk_id`, `bth_id`, `stu_id`, `sub_id`, `asg_id`, `mark`) VALUES
(2, 20, 64, 24, 12, 52);

-- --------------------------------------------------------

--
-- Table structure for table `parent`
--

CREATE TABLE IF NOT EXISTS `parent` (
  `prnt_id` int(11) NOT NULL AUTO_INCREMENT,
  `stu_id` int(11) NOT NULL,
  `prnt_name` varchar(150) NOT NULL,
  `prnt_contact_number` varchar(10) NOT NULL,
  `prnt_username` varchar(255) NOT NULL,
  `prnt_password` varchar(255) NOT NULL,
  `prnt_status` char(1) NOT NULL COMMENT 'A-active, I-inactive',
  `decript_pwd` varchar(255) NOT NULL,
  `prnt_email` varchar(255) NOT NULL,
  PRIMARY KEY (`prnt_id`),
  KEY `stu_id` (`stu_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `parent`
--

INSERT INTO `parent` (`prnt_id`, `stu_id`, `prnt_name`, `prnt_contact_number`, `prnt_username`, `prnt_password`, `prnt_status`, `decript_pwd`, `prnt_email`) VALUES
(1, 58, 'Herath', '', 'Herath', 'f265febecffd119a4014513228e1c8c1', 'A', 'gayani', 'herath@gmail.com'),
(5, 62, '', '', 'gayesha', '75a82bcfcb53f2bf03418a5b094606f1', 'A', 'gayesha', ''),
(3, 60, 'Pemarathna', '', 'Pemarathna', '4c43bcb7082f5b50543b6addce8879c9', 'A', 'uthpala', 'pemarathna@gmail.com'),
(4, 61, '', '', 'kamal', 'c1252f9387001f56b6aa3f90c9929fc6', 'A', 'kamak', ''),
(6, 63, 'Rathnawathi', '', 'Rathnawathi', '9e1a86bf2c4cb7952e4611123558d1be', 'A', 'surani', 'rathna@gmail.com'),
(7, 64, '', '', 'kumudu', '975ebcfd133d71891ba4046dcb7fe376', 'A', 'kumudu', ''),
(8, 65, 'Nimal', '', 'Nimal', '9e423cca0e2efab9aa09a13c778a8ced', 'A', 'ajith', ''),
(9, 66, '', '', 'sahan', '4d31c1775848402b16905e7a07a85218', 'A', 'sahan', ''),
(10, 67, 'Nihal', '', 'Nihal', 'a06d5a9a676577c1161de595cb566368', 'A', 'rasika', 'nihal@gmail.com'),
(11, 68, '', '', 'buddhika', 'e8145d8bac54200e2aa51a0b3afc30e9', 'A', 'buddhka', '');

-- --------------------------------------------------------

--
-- Table structure for table `payment_history`
--

CREATE TABLE IF NOT EXISTS `payment_history` (
  `history_id` int(11) NOT NULL AUTO_INCREMENT,
  `reg_id` int(11) NOT NULL,
  `add_by` int(11) NOT NULL,
  `payment` int(11) NOT NULL,
  `add_date` date NOT NULL,
  PRIMARY KEY (`history_id`),
  KEY `reg_id` (`reg_id`,`add_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `payment_history`
--

INSERT INTO `payment_history` (`history_id`, `reg_id`, `add_by`, `payment`, `add_date`) VALUES
(12, 98, 40, 9000, '2015-04-11'),
(13, 99, 40, 9000, '2015-04-11'),
(14, 100, 40, 9000, '2015-04-11'),
(15, 101, 40, 9000, '2015-04-11'),
(16, 102, 40, 10, '2015-04-11'),
(17, 103, 40, 10, '2015-04-11'),
(18, 104, 40, 5000, '2015-04-15'),
(19, 105, 40, 5000, '2015-04-15'),
(20, 106, 40, 5, '2015-04-15');

-- --------------------------------------------------------

--
-- Table structure for table `payment_installment`
--

CREATE TABLE IF NOT EXISTS `payment_installment` (
  `pis_id` int(11) NOT NULL AUTO_INCREMENT,
  `cl_id` int(11) NOT NULL,
  `pis_name` varchar(150) NOT NULL,
  `pis_amount` varchar(255) NOT NULL,
  `pis_description` varchar(255) NOT NULL,
  `pis_status` char(1) NOT NULL COMMENT 'A - active, I - Inactive',
  PRIMARY KEY (`pis_id`),
  KEY `cl_id` (`cl_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `payment_installment`
--

INSERT INTO `payment_installment` (`pis_id`, `cl_id`, `pis_name`, `pis_amount`, `pis_description`, `pis_status`) VALUES
(1, 16, 'test', '5000', '', 'A'),
(7, 34, 'PAY-HNDIT-2', '24,000', 'LKR 24000 by 4 payment installments 9000,5000,5000', 'A'),
(3, 33, 'HNDIT-PAY-Y1S2', '24000', '', 'A'),
(5, 35, 'HNDIT-PAY-Y2S1 ', '45000', '', 'I'),
(6, 25, 'PAY-HNDA-1', '50000', '', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `payment_installment_plan`
--

CREATE TABLE IF NOT EXISTS `payment_installment_plan` (
  `pip_id` int(11) NOT NULL AUTO_INCREMENT,
  `pis_id` int(11) NOT NULL,
  `pip_number` int(11) NOT NULL,
  `pip_amount` int(11) NOT NULL,
  `pip_description` varchar(255) NOT NULL,
  `pip_status` char(1) NOT NULL COMMENT 'A - active, I - Inactive',
  PRIMARY KEY (`pip_id`),
  KEY `pis_id` (`pis_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `payment_installment_plan`
--

INSERT INTO `payment_installment_plan` (`pip_id`, `pis_id`, `pip_number`, `pip_amount`, `pip_description`, `pip_status`) VALUES
(43, 3, 0, 5000, '', 'A'),
(40, 3, 1, 5000, '', 'I'),
(39, 3, 0, 5000, '', 'I'),
(5, 3, 0, 9000, '', 'I'),
(6, 3, 1, 5000, '', 'I'),
(7, 3, 2, 5000, '', 'I'),
(8, 3, 3, 5000, '', 'I'),
(9, 4, 0, 10000, '', 'A'),
(10, 4, 1, 5000, '', 'A'),
(11, 4, 2, 5000, '', 'A'),
(12, 4, 3, 10000, '', 'A'),
(13, 4, 4, 10000, '', 'A'),
(14, 4, 5, 14000, '', 'A'),
(27, 7, 3, 5000, '', 'A'),
(26, 7, 2, 5000, '', 'A'),
(25, 7, 1, 5000, '', 'A'),
(24, 7, 0, 9000, '', 'A'),
(19, 6, 0, 10000, '', 'A'),
(20, 6, 1, 10000, '', 'A'),
(21, 6, 2, 10000, '', 'A'),
(22, 6, 3, 10000, '', 'A'),
(23, 6, 4, 10000, '', 'A'),
(41, 3, 0, 5000, '', 'I'),
(42, 3, 1, 5000, '', 'I'),
(44, 3, 1, 5000, '', 'A'),
(45, 3, 2, 9000, '', 'A'),
(46, 3, 3, 5000, '', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE IF NOT EXISTS `registration` (
  `reg_id` int(11) NOT NULL AUTO_INCREMENT,
  `reg_code` varchar(255) NOT NULL,
  `stu_id` int(11) NOT NULL,
  `bth_id` int(11) NOT NULL,
  `pis_id` int(11) NOT NULL,
  `reg_date` date NOT NULL,
  `reg_fee` int(11) NOT NULL,
  `reg_payment_discount` int(11) NOT NULL,
  `final_fee` int(11) NOT NULL,
  `reg_discount_description` varchar(255) NOT NULL,
  `reg_status` char(10) NOT NULL,
  PRIMARY KEY (`reg_id`),
  KEY `stu_id` (`stu_id`),
  KEY `bth_id` (`bth_id`,`pis_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=107 ;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`reg_id`, `reg_code`, `stu_id`, `bth_id`, `pis_id`, `reg_date`, `reg_fee`, `reg_payment_discount`, `final_fee`, `reg_discount_description`, `reg_status`) VALUES
(104, 'PNS-REG-104', 67, 20, 3, '2015-04-15', 5000, 5000, 14000, '', 'A'),
(103, 'PNS-REG-103', 66, 19, 6, '2015-04-11', 10, 0, 49990, '', 'A'),
(102, 'PNS-REG-102', 65, 19, 6, '2015-04-11', 10, 0, 49990, '', 'A'),
(101, 'PNS-REG-101', 64, 20, 3, '2015-04-11', 9000, 0, 15000, '', 'A'),
(100, 'PNS-REG-100', 62, 18, 3, '2015-04-11', 9000, 0, 15000, '', 'A'),
(99, 'PNS-REG-99', 63, 16, 3, '2015-04-11', 9000, 0, 15000, '', 'A'),
(98, 'PNS-REG-1', 62, 16, 3, '2015-04-11', 9000, 0, 15000, '', 'A'),
(105, 'PNS-REG-105', 68, 20, 3, '2015-04-15', 5000, 1000, 18000, '', 'A'),
(106, 'PNS-REG-106', 65, 21, 7, '2015-04-15', 5, 0, 19, '', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `stf_id` int(11) NOT NULL AUTO_INCREMENT,
  `stf_title` char(5) NOT NULL,
  `stf_fname` varchar(50) NOT NULL,
  `stf_lname` varchar(50) NOT NULL,
  `stf_address1` varchar(255) NOT NULL,
  `stf_address2` varchar(255) NOT NULL,
  `stf_district` varchar(255) NOT NULL,
  `stf_city` varchar(100) NOT NULL,
  `stf_mobile` varchar(15) NOT NULL,
  `stf_home_contact` varchar(15) NOT NULL,
  `stf_nic` varchar(10) NOT NULL,
  `stf_dob` date NOT NULL,
  `stf_email` varchar(100) NOT NULL,
  `stf_username` varchar(50) NOT NULL,
  `stf_password` varchar(255) NOT NULL,
  `stf_decript_pwd` text NOT NULL,
  `stf_status` char(1) NOT NULL,
  `stf_role_id` int(11) NOT NULL,
  `image_path` varchar(5000) NOT NULL,
  `token` varchar(5000) NOT NULL,
  `token_time` datetime NOT NULL,
  `token_status` char(1) NOT NULL COMMENT 'A- Active, I-Inactive',
  PRIMARY KEY (`stf_id`),
  KEY `stf_role_id` (`stf_role_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`stf_id`, `stf_title`, `stf_fname`, `stf_lname`, `stf_address1`, `stf_address2`, `stf_district`, `stf_city`, `stf_mobile`, `stf_home_contact`, `stf_nic`, `stf_dob`, `stf_email`, `stf_username`, `stf_password`, `stf_decript_pwd`, `stf_status`, `stf_role_id`, `image_path`, `token`, `token_time`, `token_status`) VALUES
(24, 'Mr', 'Sasindu', 'Jayamal', 'Nittabuwa', '', '', 'Gampaha', '0114225224', '0145289631', '444444444V', '2014-10-29', 'sasindu@gmail.com', 'sasindu', '5a75e38f365c8013ce7c46c48bf3b126', 'sasindu', 'A', 2, 'C:/xampp/htdocs/panasa/uploads/profile_images/staff/1.png', '', '0000-00-00 00:00:00', ''),
(25, 'Ms', 'Gyani ', 'Randika', 'No 105/04, Lunugama', '', '', 'Gampaha', '0722568963', '0745896896', '887548696V', '2011-11-28', 'gayani@gmail.com', 'gayani', 'f265febecffd119a4014513228e1c8c1', 'gayani', 'A', 3, '', '', '0000-00-00 00:00:00', ''),
(40, 'Ms', 'Lanaka', 'Pubudu', 'makola', '', '', 'makola', '0114225224', '0177455452', '222222222V', '0000-00-00', 'lanka@gmail.com', 'lanka', '557a2fa47edc99a633852e9ec3acd716', 'lanka', 'A', 8, 'C:/xampp/htdocs/panasa/uploads/profile_images/staff/8.png', '', '0000-00-00 00:00:00', ''),
(27, 'Ms', 'Dilini', 'Madusha', 'Makola', '', '', 'Kiribathgoda', '0722158562', '0745896844', '886548696V', '2014-02-09', 'dilini@gmail.com', 'dilini', '44c5273d512d8790f36aa226a40e5b58', 'dilini', 'A', 3, 'C:/xampp/htdocs/panasa/uploads/profile_images/staff/2.jpg', '', '0000-00-00 00:00:00', ''),
(28, 'Ms', 'Pesika', 'Ransimala', 'Kuda uduwa', '', '', 'Horana', '0722568963', '0745896844', '117548696V', '2013-04-29', 'peshika@gmail.com', 'peshika', '38b3559ebad8dc308d2c1b4da23eeddc', 'peshika', 'A', 4, '', '', '0000-00-00 00:00:00', ''),
(31, 'Ms', 'Chathuranga', 'De Mel', 'Hanwella', '', '', 'Homagama', '0722158562', '0722254252', '877361608V', '2014-01-02', 'chathuranga@gmail.com', 'chathuranga', '80f76146e6dd82f3264aaedfce62a88a', 'chathuranga', 'A', 3, '', '', '0000-00-00 00:00:00', 'I'),
(32, 'Ms', 'Shermila', 'Athukorala', 'Suduwella', '', '', 'Madampe', '0722158562', '0745896844', '877361608V', '1982-08-20', 'shermila@gmail.com', 'shermila', '211b8a5df756694859ca2dcdea159886', 'shermila', 'A', 3, '', '', '0000-00-00 00:00:00', ''),
(33, 'Mr', 'Nimal', 'Perera', 'Jayabima', '', '', 'ssss', '0722254252', '0722254252', '877361608V', '1987-08-23', 'nimalperera@gmail.com', 'nimal', 'e088f2a18812b8b90e235430874a0762', 'nimal', 'A', 1, '', '', '0000-00-00 00:00:00', ''),
(34, 'Ms', 'Nimantha', 'Vishwajith', 'Puttlam', '', '0', 'Puttlam', '0722254252', '0322332492', '877361608V', '0000-00-00', 'nimantha@gmail.com', 'nimantha', 'cefc10f1447898c039b1f8e00f41c61c', 'nimantha', 'A', 2, '', '', '0000-00-00 00:00:00', ''),
(37, 'Ms', 'Gamini', 'Thilakarathna', 'No 150, Nittambuwa', '', '', '', '0722158562', '0177455452', '875469215V', '0000-00-00', 'gamini@gmail.com', 'gamini', '87aacb6edd48be7ff818908f5ba0794c', 'gamini', 'A', 4, '', '', '0000-00-00 00:00:00', ''),
(38, 'Ms', 'Shanika', 'Dilrukshi', 'Nuegoda ', '', 'Colombo', 'Colombo', '0114225224', '0145289631', '147852369V', '2015-01-01', 'shanika@gmail.com', 'shanika', '67960bca024d33026b16e283883fd3c0', 'shanika', 'A', 3, '', '', '0000-00-00 00:00:00', ''),
(41, 'Ms', 'Gamini', 'Dissanayaka', '152,Weerakatiya, Higuraggoda', '120, highlevelRD, wijerama', '', 'Higurakgoda', '4452589626', '1254789358', '875895325V', '0000-00-00', 'gaminidisa@gmail.com', 'gaminid', '87aacb6edd48be7ff818908f5ba0794c', 'gamini', 'A', 4, '', '', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `stu_id` int(11) NOT NULL AUTO_INCREMENT,
  `stu_code` varchar(255) NOT NULL,
  `stu_title` varchar(5) NOT NULL,
  `stu_fname` varchar(50) NOT NULL,
  `stu_lname` varchar(50) NOT NULL,
  `stu_address1` varchar(150) NOT NULL,
  `stu_address2` varchar(150) NOT NULL,
  `stu_district` varchar(150) NOT NULL,
  `stu_city` varchar(50) NOT NULL,
  `stu_mobile` varchar(15) NOT NULL,
  `stu_home_contact` varchar(15) NOT NULL,
  `stu_nic` varchar(10) NOT NULL,
  `stu_dob` date NOT NULL,
  `stu_email` varchar(255) NOT NULL,
  `stu_username` varchar(255) NOT NULL,
  `stu_password` varchar(255) NOT NULL,
  `stu_decript_pwd` varchar(255) NOT NULL,
  `stu_status` char(1) NOT NULL COMMENT 'A- Active, I- Inactive',
  `image_path` varchar(5000) NOT NULL,
  PRIMARY KEY (`stu_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=69 ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`stu_id`, `stu_code`, `stu_title`, `stu_fname`, `stu_lname`, `stu_address1`, `stu_address2`, `stu_district`, `stu_city`, `stu_mobile`, `stu_home_contact`, `stu_nic`, `stu_dob`, `stu_email`, `stu_username`, `stu_password`, `stu_decript_pwd`, `stu_status`, `image_path`) VALUES
(67, 'PNS-STU-67', 'Ms', 'Rasika', 'Dayan', 'gampaha,Colombo', 'Colombo', '', 'gampaha', '07222542525', '0322332492', '877361607V', '1987-06-12', 'rasika@gmail.com', 'rasika', 'a06d5a9a676577c1161de595cb566368', 'rasika', 'A', ''),
(63, 'PNS-STU-63', 'Ms', 'Surani', 'Hemachandra', 'Colombo', 'Colombo', '', 'Gampaha', '0752451589', '', '877361602V', '1989-03-22', 'surani@gmail.com', 'surani', '9e1a86bf2c4cb7952e4611123558d1be', 'surani', 'A', ''),
(64, 'PNS-STU-64', 'Ms', 'Kumudu', 'Nisansala', 'Nugegoda', '', '', '', '', '', '877361603V', '0000-00-00', '', 'kumudu', '975ebcfd133d71891ba4046dcb7fe376', 'kumudu', 'A', 'C:/xampp/htdocs/panasa/uploads/profile_images/student/40.jpg'),
(65, 'PNS-STU-65', 'Mr', 'Ajith', 'Sumanasiri', 'Toduwawa', 'Chilaw', '', 'Thoduwawa', '0751896458', '0854589656', '877361604V', '0000-00-00', 'ajith@gmail.com', 'ajith', '9e423cca0e2efab9aa09a13c778a8ced', 'ajith', 'A', 'C:/xampp/htdocs/panasa/uploads/profile_images/student/10.jpg'),
(66, 'PNS-STU-66', 'Mr', 'Sahan', 'Perera', 'Nittambuwa', '', '', '', '', '', '877361606V', '0000-00-00', '', 'sahan', '4d31c1775848402b16905e7a07a85218', 'sahan', 'A', ''),
(68, 'PNS-STU-68', 'Ms', 'Shashi ', 'Prabha', 'gampaha', '', '', '', '', '', '877361608V', '1987-05-20', 'buddhika@gmail.com', 'buddhika', 'e8145d8bac54200e2aa51a0b3afc30e9', 'buddhka', 'A', ''),
(16, 'PNS-STU-1', 'Mr', 'Gayesha', 'Hettiarachchi', 'lunuwila. ', '', '', '', '', '', '877361601V', '1983-07-07', 'gayesha@gmail.com', 'gayesha', '75a82bcfcb53f2bf03418a5b094606f1', 'gayesha', 'A', '');

-- --------------------------------------------------------

--
-- Table structure for table `student_payment`
--

CREATE TABLE IF NOT EXISTS `student_payment` (
  `stpay_id` int(11) NOT NULL AUTO_INCREMENT,
  `reg_id` int(11) NOT NULL,
  `stpay_payment_number` int(11) NOT NULL,
  `stpay_installment_amount` int(11) NOT NULL,
  `stpay_due_date` date NOT NULL,
  `stpay_amount` int(11) NOT NULL,
  `stpay_date` date NOT NULL,
  `stpay_status` char(25) NOT NULL,
  PRIMARY KEY (`stpay_id`),
  KEY `reg_id` (`reg_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=167 ;

--
-- Dumping data for table `student_payment`
--

INSERT INTO `student_payment` (`stpay_id`, `reg_id`, `stpay_payment_number`, `stpay_installment_amount`, `stpay_due_date`, `stpay_amount`, `stpay_date`, `stpay_status`) VALUES
(164, 106, 2, 5000, '2015-05-15', 0, '0000-00-00', 'NotPaid'),
(141, 101, 0, 9000, '2015-04-11', 9000, '2015-04-11', 'Paid'),
(142, 101, 1, 5000, '2015-05-11', 0, '0000-00-00', 'NotPaid'),
(133, 99, 0, 9000, '2014-12-11', 9000, '2015-04-11', 'Paid'),
(130, 98, 1, 5000, '2015-01-11', 0, '0000-00-00', 'NotPaid'),
(138, 100, 1, 5000, '2015-05-11', 0, '0000-00-00', 'NotPaid'),
(147, 102, 2, 10000, '2015-06-11', 0, '0000-00-00', 'NotPaid'),
(146, 102, 1, 10000, '2015-05-11', 0, '0000-00-00', 'NotPaid'),
(131, 98, 2, 5000, '2015-02-11', 0, '0000-00-00', 'NotPaid'),
(145, 102, 0, 10000, '2015-04-11', 10000, '2015-04-11', 'Paid'),
(144, 101, 3, 5000, '2015-07-11', 0, '0000-00-00', 'NotPaid'),
(143, 101, 2, 5000, '2015-06-11', 0, '0000-00-00', 'NotPaid'),
(132, 98, 3, 5000, '2015-03-11', 0, '0000-00-00', 'NotPaid'),
(140, 100, 3, 5000, '2015-07-11', 0, '0000-00-00', 'NotPaid'),
(139, 100, 2, 5000, '2015-06-11', 0, '0000-00-00', 'NotPaid'),
(137, 100, 0, 9000, '2015-04-11', 9000, '2015-04-11', 'Paid'),
(134, 99, 1, 5000, '2015-01-11', 5000, '2015-04-15', 'Paid'),
(149, 102, 4, 10000, '2015-08-11', 0, '0000-00-00', 'NotPaid'),
(163, 106, 3, 5000, '2015-04-15', 0, '0000-00-00', 'NotPaid'),
(162, 105, 3, 5000, '2015-07-15', 0, '0000-00-00', 'NotPaid'),
(135, 99, 2, 5000, '2015-02-11', 5000, '2015-04-15', 'Paid'),
(161, 105, 2, 9000, '2015-06-15', 0, '0000-00-00', 'NotPaid'),
(160, 105, 1, 5000, '2015-05-15', 4000, '2015-04-15', 'Paid'),
(159, 105, 0, 4000, '2015-04-15', 5000, '2015-04-15', 'Paid'),
(136, 99, 3, 5000, '2015-03-11', 5000, '2015-04-15', 'Paid'),
(158, 104, 3, 5000, '2015-07-15', 0, '0000-00-00', 'NotPaid'),
(157, 104, 2, 9000, '2015-06-15', 0, '0000-00-00', 'NotPaid'),
(156, 104, 1, 5000, '2015-05-15', 0, '0000-00-00', 'NotPaid'),
(155, 104, 0, 5000, '2015-04-15', 0, '2015-04-15', 'Not Paid'),
(154, 103, 4, 10000, '2015-08-11', 0, '0000-00-00', 'NotPaid'),
(153, 103, 3, 10000, '2015-07-11', 0, '0000-00-00', 'NotPaid'),
(152, 103, 2, 10000, '2015-06-11', 0, '0000-00-00', 'NotPaid'),
(129, 98, 0, 9000, '2014-12-11', 9000, '2015-04-11', 'Paid'),
(151, 103, 1, 10000, '2015-05-11', 0, '0000-00-00', 'NotPaid'),
(150, 103, 0, 10000, '2015-04-11', 10000, '2015-04-11', 'Paid'),
(148, 102, 3, 10000, '2015-07-11', 0, '0000-00-00', 'NotPaid'),
(165, 106, 1, 5000, '2015-06-15', 0, '0000-00-00', 'NotPaid'),
(166, 106, 0, 9000, '2015-07-15', 5, '2015-04-15', 'Paid');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
  `sub_id` int(11) NOT NULL AUTO_INCREMENT,
  `cl_id` int(11) NOT NULL,
  `sub_name` varchar(150) NOT NULL,
  `sub_code` varchar(255) NOT NULL,
  `sub_description` varchar(5000) NOT NULL,
  `sub_status` char(1) NOT NULL COMMENT 'A - active, I-inactive',
  PRIMARY KEY (`sub_id`),
  KEY `cl_id` (`cl_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`sub_id`, `cl_id`, `sub_name`, `sub_code`, `sub_description`, `sub_status`) VALUES
(1, 13, 'web designing', '', 'This module will help us to develop computer programs that utilize computer resources in an effective manner. This course is about how data can be arranged in a computer’s memory or disk storage in an efficient and effective manner and how we can manipulaThis module will help us to develop computer programs that utilize computer resources in an effective manner. This course is about how data can be arranged in a computer’s memory or disk storage in an efficient and effective manner and how we can manipulaThis module will help us to develop computer programs that utilize computer resources in an effective manner. This course is about how data can be arranged in a computer’s memory or disk storage in an efficient and effective manner and how we can manipulaThis module will help us to develop computer programs that utilize computer resources in an effective manner. This course is about how data can be arranged in a computer’s memory or disk storage in an efficient and effective manner and how we can manipula', 'A'),
(2, 13, 'test', '', '', 'A'),
(3, 25, 'Fundamentals of Financial Accounting - HNDA  1101', 'HNDA-1101', '', 'A'),
(4, 25, 'Business Mathematics - HNDA  1102', 'HNDA-1102', '', 'A'),
(5, 25, 'Commercial Awareness - HNDA   1103', ' HNDA   1103', '', 'A'),
(6, 25, 'Business Communication I - HNDA   1104', 'HNDA   1104', '', 'A'),
(7, 25, 'Introduction to Computers - HNDA   1105', 'HNDA   1105', '', 'A'),
(8, 26, 'Intermediate Financial Accounting - HNDA  1201', 'HNDA  1201', '', 'A'),
(9, 26, 'Statistical Analysis for Management', '', '', 'A'),
(10, 26, 'Micro & Macro Economics - HNDA   1203', '', '', 'A'),
(11, 26, 'Business Communication II -HNDA   1204', 'HNDA   1204', '', 'A'),
(12, 26, 'Computer Applications - HNDA   1205', 'HNDA   1205', '', 'A'),
(13, 29, 'Advanced Financial Accounting -HNDA  2101', 'HNDA  2101', '', 'A'),
(14, 29, 'Operations Research -HNDA  2102', 'HNDA  2102', '', 'A'),
(15, 29, 'Principles of Auditing & Taxation - HNDA 2103', ' HNDA 2103', '', 'A'),
(16, 29, 'Business Communication III -HNDA 2104', 'HNDA 2104', '', 'A'),
(17, 29, 'Database Management Systems & Data Analysis - HNDA 2105', 'HNDA 2105', '', 'A'),
(18, 28, 'Cost & Management Accounting - HNDA  2201', 'HNDA  2201', '', 'A'),
(19, 28, 'Computer Applications for Accounting - HNDA  2202', 'HNDA  2202', '', 'A'),
(20, 28, 'Marketing Management - HNDA 2203', 'HNDA 2203', '', 'A'),
(21, 33, 'Personal Computer Applications ', 'PC App', 'The Personal Computer Applications program offers a wide variety of courses in the most popular computer applications.\r\nDesktop Publishing and Web applications courses are offered on both the Windows and Macintosh platforms.\r\n\r\nMost classes are offered in a one-credit-hour format so that students can schedule and combine courses for maximum flexibility. Morning, afternoon, and evening sections are available at a variety of times as well as online.', 'I'),
(22, 33, 'Computer Hardware - HNDIT11023', 'CH', 'The programme aims at providing hardware technicians and Network Administrators with a versatile knowledge in the computer hardware and networking field. Main Objective of this course is to establish Computer Hardware Technicians and Network administrators who are capable of configuring computer system/ network for usage starting from identifying customer requirements through giving a lifelong service to a customer.', 'I'),
(23, 33, 'Structured Programming - HNDIT11034', 'SP', 'In keeping with the heretical title of his paper, Knuth introduces a fourth theme: There are times when the programmer should put gotos into his code, rather than take them out. For example, gotos can be used to convert recursion to iteration; or to implement coroutines; or to eliminate Boolean variables by branching into common code. In this context, Knuth suggests the following strategy: First, write the program in a structured manner to convince yourself that it is correct; then, transform it into an efficient program, possibly by introducing some goto statements; and, finally, leave the original structured code behind as documentation, so that subsequent readers can understand how the transformation took place. Whether the average programmer would go through these steps in an orderly, formal way is something worth pondering. My own suspicion is that it won''t work, but I''m often branded a skeptic.', 'A'),
(24, 33, 'Data Representation and Organization - HNDIT11042', 'DARP', '', 'A'),
(25, 33, 'Database Management Systems -HNDIT11052', 'DBMS', 'This course relies on primary readings from the database community to introduce graduate students to the foundations of database systems, focusing on basics such as the relational algebra and data model, schema normalization, query optimization, and transactions. It is designed for students who have taken 6.033 (or equivalent); no prior database experience is assumed, though students who have taken an undergraduate course in databases are encouraged to attend.', 'A'),
(26, 33, 'Web Development -HNDIT11062', 'Web', '', 'A'),
(27, 34, 'Object Oriented Programming - HNDIT12094', 'HNDIT12094', '', 'A'),
(28, 34, 'Graphics and Multimedia - HNDIT12103', 'HNDIT12103', '', 'A'),
(29, 34, 'Data Structures and Algorithms - HNDIT12112', 'HNDIT12112', '', 'A'),
(30, 34, 'Systems Analysis and Design -HNDIT12123', 'HNDIT12123', '', 'A'),
(31, 34, 'Data Communications and Networks - HNDIT12133', 'HNDIT12133', '', 'A'),
(33, 34, 'sadasd', 'DASDASDSSS', '', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `subject_lecture_detail`
--

CREATE TABLE IF NOT EXISTS `subject_lecture_detail` (
  `sld_id` int(11) NOT NULL AUTO_INCREMENT,
  `bth_id` int(11) NOT NULL,
  `sub_id` int(11) NOT NULL,
  `stf_id` int(11) NOT NULL,
  `sld_description` varchar(255) NOT NULL,
  `sld_status` char(1) NOT NULL COMMENT 'A - active, I-inactive',
  PRIMARY KEY (`sld_id`),
  KEY `sub_id` (`sub_id`,`stf_id`),
  KEY `bth_id` (`bth_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `subject_lecture_detail`
--

INSERT INTO `subject_lecture_detail` (`sld_id`, `bth_id`, `sub_id`, `stf_id`, `sld_description`, `sld_status`) VALUES
(25, 21, 28, 28, '', 'A'),
(24, 21, 27, 25, '', 'A'),
(23, 20, 24, 32, '', 'A'),
(22, 20, 24, 25, '', 'A'),
(21, 20, 24, 24, '', 'A'),
(20, 20, 26, 32, '', 'A'),
(19, 20, 25, 25, '', 'A'),
(18, 20, 24, 27, '', 'A'),
(17, 20, 23, 37, '', 'A');
--
-- Database: `phpmyadmin`
--

-- --------------------------------------------------------

--
-- Table structure for table `pma__bookmark`
--

CREATE TABLE IF NOT EXISTS `pma__bookmark` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `query` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks' AUTO_INCREMENT=3 ;

--
-- Dumping data for table `pma__bookmark`
--

INSERT INTO `pma__bookmark` (`id`, `dbase`, `user`, `label`, `query`) VALUES
(1, 'sellingp_lily', 'webmadhuranga', '1', '-- SELECT * FROM (SELECT * FROM `rdvisits` order by `id` DESC) as `rdvisits_tbl` group by `rdvisits_tbl.subdId`\r\n-- SELECT * FROM `rdvisits` order by `id` DESC\r\n\r\nSELECT * FROM (SELECT * FROM `rdvisits` order by `id` DESC) as `rdvisits_tbl` '),
(2, 'sellingp_lily', 'webmadhuranga', '1', '-- SELECT * FROM (SELECT * FROM `rdvisits` order by `id` DESC) as `rdvisits_tbl` group by `rdvisits_tbl.subdId`\r\n-- SELECT * FROM `rdvisits` order by `id` DESC\r\n\r\nSELECT * FROM (SELECT * FROM `rdvisits` order by `id` DESC) as `rdvisits_tbl`  group by `rdvisits_tbl`.`subdId`');

-- --------------------------------------------------------

--
-- Table structure for table `pma__column_info`
--

CREATE TABLE IF NOT EXISTS `pma__column_info` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pma__designer_coords`
--

CREATE TABLE IF NOT EXISTS `pma__designer_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `x` int(11) DEFAULT NULL,
  `y` int(11) DEFAULT NULL,
  `v` tinyint(4) DEFAULT NULL,
  `h` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`db_name`,`table_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for Designer';

-- --------------------------------------------------------

--
-- Table structure for table `pma__history`
--

CREATE TABLE IF NOT EXISTS `pma__history` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sqlquery` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  KEY `username` (`username`,`db`,`table`,`timevalue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pma__pdf_pages`
--

CREATE TABLE IF NOT EXISTS `pma__pdf_pages` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `page_nr` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `page_descr` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT '',
  PRIMARY KEY (`page_nr`),
  KEY `db_name` (`db_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pma__recent`
--

CREATE TABLE IF NOT EXISTS `pma__recent` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Dumping data for table `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('webmadhuranga', '[{"db":"sellingp_lily","table":"rdvisits"},{"db":"sellingp_lily","table":"users"},{"db":"carfinder","table":"admin"},{"db":"sellingp_lily","table":"sub_dealers"},{"db":"panasa","table":"assignment"},{"db":"madframework","table":"tbl_admin"},{"db":"madframework","table":"tbl_option"},{"db":"madframework","table":"tbl_option_type"},{"db":"madframework","table":"tbl_driver"},{"db":"madframework","table":"tbl_users"}]');

-- --------------------------------------------------------

--
-- Table structure for table `pma__relation`
--

CREATE TABLE IF NOT EXISTS `pma__relation` (
  `master_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  KEY `foreign_field` (`foreign_db`,`foreign_table`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_coords`
--

CREATE TABLE IF NOT EXISTS `pma__table_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT '0',
  `x` float unsigned NOT NULL DEFAULT '0',
  `y` float unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_info`
--

CREATE TABLE IF NOT EXISTS `pma__table_info` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`db_name`,`table_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_uiprefs`
--

CREATE TABLE IF NOT EXISTS `pma__table_uiprefs` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `prefs` text COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`username`,`db_name`,`table_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

--
-- Dumping data for table `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('webmadhuranga', 'sellingp_lily', 'rdvisits', '{"sorted_col":"`id` DESC"}', '2015-04-23 04:14:44');

-- --------------------------------------------------------

--
-- Table structure for table `pma__tracking`
--

CREATE TABLE IF NOT EXISTS `pma__tracking` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `version` int(10) unsigned NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8_bin NOT NULL,
  `schema_sql` text COLLATE utf8_bin,
  `data_sql` longtext COLLATE utf8_bin,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8_bin DEFAULT NULL,
  `tracking_active` int(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`db_name`,`table_name`,`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__userconfig`
--

CREATE TABLE IF NOT EXISTS `pma__userconfig` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `config_data` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';
--
-- Database: `sellingp_lily`
--

-- --------------------------------------------------------

--
-- Table structure for table `apps`
--

CREATE TABLE IF NOT EXISTS `apps` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `appName` varchar(255) DEFAULT NULL,
  `iconPath` text,
  `appPath` text,
  `type` varchar(255) DEFAULT 'ac',
  `access` varchar(255) DEFAULT 'full',
  `timeSatmp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `apps`
--

INSERT INTO `apps` (`id`, `appName`, `iconPath`, `appPath`, `type`, `access`, `timeSatmp`) VALUES
(3, 'Distributors', 'img/icons/42.png', 'regionalDistributors/window.php', 'ac', 'full', '2015-01-04 10:03:56'),
(4, 'Users', 'img/icons/Man%202.png', 'userManagement/window.php', 'ac', 'full', '0000-00-00 00:00:00'),
(14, 'Return', 'img/icons/undo_yellow.png', 'return/window.php', 'ac', 'full', '2015-01-26 05:07:53'),
(6, 'To Do List', 'img/icons/Report.png', 'to_do/window.php', 'ac', 'full', '0000-00-00 00:00:00'),
(7, 'Documents', 'img/icons/Catalog.png', 'noaccess.php', 'in', 'full', '0000-00-00 00:00:00'),
(8, 'Inventory', 'img/icons/55.png', 'productManager/window.php', 'ac', 'full', '2015-01-14 10:20:57'),
(9, 'Reports', 'img/icons/Catalog.png', 'reports/window.php', 'in', 'full', '0000-00-00 00:00:00'),
(10, 'Relese', 'img/icons/message-bubble-send-icon.png', 'relese/window.php', 'ac', 'full', '2015-01-26 04:09:36'),
(11, 'Developer ', 'img/icons/24.png', 'lahiru/window.php', 'in', 'full', '2015-01-05 05:13:47'),
(12, 'Rep', 'img/icons/99.png', 'rep/window.php', 'ac', 'full', '2015-01-04 11:18:44'),
(13, 'Billing', 'img/icons/electronic-billing-machine-icon.png', 'billing/window.php', 'ac', 'full', '2015-01-26 04:25:13');

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE IF NOT EXISTS `area` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `area` text,
  `areaType` varchar(255) NOT NULL,
  `timeSatmp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`id`, `area`, `areaType`, `timeSatmp`) VALUES
(1, 'TownHall', 'ac', '2015-01-30 09:47:12'),
(2, 'Maharagama', 'ac', '2015-01-30 09:43:36'),
(3, 'Homagama', 'ac', '2015-01-30 09:46:37'),
(4, 'Kottawa', 'ac', '2015-01-30 09:46:49');

-- --------------------------------------------------------

--
-- Table structure for table `credit_invoices`
--

CREATE TABLE IF NOT EXISTS `credit_invoices` (
  `_id` int(11) NOT NULL AUTO_INCREMENT,
  `sub_dealer_id` int(11) NOT NULL,
  `payment_type` varchar(100) DEFAULT NULL,
  `amount` float NOT NULL,
  `location_latitude` float DEFAULT NULL,
  `location_longitude` float DEFAULT NULL,
  `note` text,
  `user_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `distributors`
--

CREATE TABLE IF NOT EXISTS `distributors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `companyName` varchar(255) DEFAULT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `Area` varchar(255) DEFAULT NULL,
  `District` varchar(255) DEFAULT NULL,
  `Province` varchar(255) DEFAULT NULL,
  `Country` varchar(255) DEFAULT NULL,
  `Phone1` varchar(255) DEFAULT NULL,
  `Phone2` varchar(255) DEFAULT NULL,
  `Fax` varchar(255) DEFAULT NULL,
  `eMail` varchar(255) DEFAULT NULL,
  `creditLimit` varchar(255) DEFAULT NULL,
  `Target` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `distributors`
--

INSERT INTO `distributors` (`id`, `companyName`, `Name`, `Address`, `Area`, `District`, `Province`, `Country`, `Phone1`, `Phone2`, `Fax`, `eMail`, `creditLimit`, `Target`) VALUES
(1, NULL, 'Sharma', NULL, NULL, 'Select Districts', 'Select Province', 'Select Country', NULL, NULL, NULL, NULL, NULL, NULL),
(2, NULL, 'Gunith', NULL, NULL, 'Select Districts', 'Select Province', 'Select Country', NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'Swadeshi', 'Nalinda', 'Kadawatha\r\nKiribathgoda', NULL, '5', '9', 'LK', '01123478972', '071744892', '83902-84903', 'Nalinda@gmail.com', '50000', '890330'),
(4, NULL, 'Lahiru', NULL, NULL, 'Select Districts', 'Select Province', 'Select Country', NULL, NULL, NULL, 'lahiru@yahoo.com', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE IF NOT EXISTS `inventory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `productId` int(11) DEFAULT NULL,
  `lastStok` varchar(200) DEFAULT NULL,
  `date` varchar(40) DEFAULT NULL,
  `time` varchar(40) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  `adminNote` varchar(255) DEFAULT NULL,
  `stokType` varchar(100) DEFAULT NULL,
  `receiveStock` varchar(100) DEFAULT NULL,
  `warehouseId` varchar(100) DEFAULT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `distributorId` varchar(100) DEFAULT NULL,
  `addUser` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `productId`, `lastStok`, `date`, `time`, `userId`, `adminNote`, `stokType`, `receiveStock`, `warehouseId`, `time_stamp`, `distributorId`, `addUser`) VALUES
(1, 16, '1000', '2015-02-18', '10:20', 115, 'no', 'in', '1000', '115', '2015-02-17 18:30:00', '1', 115);

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE IF NOT EXISTS `invoice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `issuedBy` varchar(255) DEFAULT NULL,
  `sDealerid` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `locationLat` varchar(255) DEFAULT NULL,
  `locationLen` varchar(255) DEFAULT NULL,
  `paymentType` varchar(255) DEFAULT NULL,
  `paymentAmount` float NOT NULL,
  `delivered` tinyint(1) NOT NULL DEFAULT '0',
  `adminNort` varchar(255) DEFAULT NULL,
  `othe1` varchar(255) DEFAULT NULL,
  `othe2` varchar(255) DEFAULT NULL,
  `timeSatmp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `distributorId` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_items`
--

CREATE TABLE IF NOT EXISTS `invoice_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoiceId` varchar(255) DEFAULT NULL,
  `proName` varchar(255) DEFAULT NULL,
  `prounitePrice` varchar(255) DEFAULT NULL,
  `qty` varchar(255) DEFAULT NULL,
  `total` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `subDealerId` varchar(255) DEFAULT NULL,
  `paymentType` varchar(255) DEFAULT NULL,
  `invoiceBy` varchar(255) DEFAULT NULL,
  `timeSatmp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `paid_amount` varchar(200) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `logged_user`
--

CREATE TABLE IF NOT EXISTS `logged_user` (
  `_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `access_token` varchar(50) NOT NULL,
  `logged_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `distributer_id` int(11) NOT NULL,
  PRIMARY KEY (`_id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `logged_user`
--

INSERT INTO `logged_user` (`_id`, `user_id`, `access_token`, `logged_time`, `distributer_id`) VALUES
(1, 51, '4d1916000d83d68cce75382c40a724744ce99737', '2015-02-17 04:26:35', 0),
(3, 115, '87c1d4e1541e7681d76ff165b4ed1f370ef934a1', '2015-02-25 08:18:39', 1);

-- --------------------------------------------------------

--
-- Table structure for table `productbrand`
--

CREATE TABLE IF NOT EXISTS `productbrand` (
  `brandId` int(11) NOT NULL AUTO_INCREMENT,
  `brandName` varchar(255) NOT NULL,
  `brandDescription` text NOT NULL,
  `brandType` varchar(255) NOT NULL,
  `other1` int(11) NOT NULL,
  `other2` int(11) NOT NULL,
  PRIMARY KEY (`brandId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `productbrand`
--

INSERT INTO `productbrand` (`brandId`, `brandName`, `brandDescription`, `brandType`, `other1`, `other2`) VALUES
(1, 'Samsong', 'Mobile and Other Electric', 'ac', 0, 0),
(2, 'CocaCola', 'Beverge', 'ac', 0, 0),
(3, 'Lux', 'sope', 'ac', 0, 0),
(4, 'Pepsi', 'klka', 'ac', 0, 0),
(5, 'Lahila', 'shop', 'ac', 0, 0),
(6, 'Laal', 'Papadam', 'in', 0, 0),
(7, 'Sudantha', 'Tooth Past', 'ac', 0, 0),
(8, 'Clougard', 'Tooth Pest', 'ac', 0, 0),
(9, 'MD', 'Jam etc;', 'ac', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `productcategory`
--

CREATE TABLE IF NOT EXISTS `productcategory` (
  `categoryId` int(11) NOT NULL AUTO_INCREMENT,
  `categoryName` varchar(255) NOT NULL,
  `catDescription` varchar(255) NOT NULL,
  `subCatId` int(11) DEFAULT NULL,
  `categoryType` varchar(255) NOT NULL,
  PRIMARY KEY (`categoryId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `productcategory`
--

INSERT INTO `productcategory` (`categoryId`, `categoryName`, `catDescription`, `subCatId`, `categoryType`) VALUES
(1, 'Footwaer', 'DSI', NULL, 'ac'),
(2, 'Food', 'Foods', NULL, 'ac'),
(3, 'Beverage', 'Soft Drinks', NULL, 'ac'),
(4, 'Clothes', 'Trouses,T-shirt & etc', NULL, 'ia'),
(5, 'Packet', 'Packet Foods', NULL, 'ac'),
(6, 'Furniture', 'Tables,Chairs and etc;', NULL, 'in'),
(7, 'Salsa', 'Dance item', NULL, 'ac'),
(8, 'Vehicle', 'All Moter vehicals', NULL, 'ac'),
(9, 'Spair parts', 'Vehicle parts', NULL, 'in');

-- --------------------------------------------------------

--
-- Table structure for table `productcolour`
--

CREATE TABLE IF NOT EXISTS `productcolour` (
  `colourId` int(11) NOT NULL AUTO_INCREMENT,
  `colourName` varchar(255) DEFAULT NULL,
  `clour_description` text,
  `colurType` varchar(255) DEFAULT NULL,
  `colorcode` varchar(255) DEFAULT NULL,
  `other2` int(11) DEFAULT NULL,
  PRIMARY KEY (`colourId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `productcolour`
--

INSERT INTO `productcolour` (`colourId`, `colourName`, `clour_description`, `colurType`, `colorcode`, `other2`) VALUES
(15, 'Low', 'Dark Blue', 'ac', '#5440b5', NULL),
(14, 'Low Black', 'Low Balck', 'ac', '#7f7f7f', NULL),
(13, 'hjk', NULL, 'ac', '#000000', NULL),
(12, 'Rod', 'Rot', 'ac', '#e14d85', NULL),
(11, 'Lahiru', 'Greeno', 'ac', '#12b457', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `productdesign`
--

CREATE TABLE IF NOT EXISTS `productdesign` (
  `designId` int(11) NOT NULL AUTO_INCREMENT,
  `designname` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `destype` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`designId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `productdetails`
--

CREATE TABLE IF NOT EXISTS `productdetails` (
  `productDetailId` int(11) NOT NULL AUTO_INCREMENT,
  `productId` int(11) NOT NULL,
  `sizeId` int(11) NOT NULL,
  `colourId` int(11) NOT NULL,
  `materialId` int(11) NOT NULL,
  `brandId` int(11) NOT NULL,
  `categoryId` int(11) NOT NULL,
  `itemprice` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `designId` int(11) NOT NULL,
  PRIMARY KEY (`productDetailId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `productmaster`
--

CREATE TABLE IF NOT EXISTS `productmaster` (
  `proMasterId` int(11) DEFAULT NULL,
  `proId` int(11) NOT NULL AUTO_INCREMENT,
  `proName` varchar(255) DEFAULT NULL,
  `proDescription` varchar(255) DEFAULT NULL,
  `supplierId` int(11) DEFAULT NULL,
  `sizeId` int(11) DEFAULT NULL,
  `colourId` int(11) DEFAULT NULL,
  `materialId` int(11) DEFAULT NULL,
  `brandId` int(11) DEFAULT NULL,
  `categoryId` int(11) DEFAULT NULL,
  `buyingPrice` float DEFAULT '0',
  `sellingPrice` float DEFAULT '0',
  `status` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `designId` int(11) DEFAULT NULL,
  `other5` int(11) DEFAULT NULL,
  `discount` varchar(20) DEFAULT '0',
  `discountType` varchar(20) DEFAULT NULL,
  `wholesalePrice` varchar(30) DEFAULT NULL,
  `exDate` varchar(30) DEFAULT NULL,
  `wholesaleMargin` varchar(20) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `barcode` varchar(100) DEFAULT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `weightClass` varchar(255) DEFAULT NULL,
  `weightAmount` int(255) DEFAULT NULL,
  `expiryDate` date DEFAULT NULL,
  `manufacturingDate` date DEFAULT NULL,
  PRIMARY KEY (`proId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `productmaster`
--

INSERT INTO `productmaster` (`proMasterId`, `proId`, `proName`, `proDescription`, `supplierId`, `sizeId`, `colourId`, `materialId`, `brandId`, `categoryId`, `buyingPrice`, `sellingPrice`, `status`, `image`, `level`, `designId`, `other5`, `discount`, `discountType`, `wholesalePrice`, `exDate`, `wholesaleMargin`, `userid`, `barcode`, `time_stamp`, `weightClass`, `weightAmount`, `expiryDate`, `manufacturingDate`) VALUES
(4, 19, 'anchor milk powder', 'milk powder from Fontera.', NULL, NULL, 12, NULL, 1, 6, 300, 325, 'in', 'xxxxx', 34, NULL, NULL, '5', 'LKR', '290', NULL, '34', 51, 'vvvvv', '2015-01-30 05:21:33', '1', 400, NULL, NULL),
(3, 18, 'Milo', 'Chocklet Drink', NULL, NULL, 12, NULL, 2, 2, 300, 360, 'ac', 'xxxxxx', 34, NULL, NULL, '5', 'LKR', '295', NULL, '40', 51, 'xxxxxx', '2015-01-30 04:47:50', '1', 400, NULL, NULL),
(2, 17, 'Anchor milk powder', 'Anchor milk powder ,400g packet', NULL, NULL, 13, NULL, 1, 1, 300, 325, 'ac', 'xxxxxxxxxxxxxxxxxxxxxx', 20, NULL, NULL, '5', 'percentage', '275.00', NULL, '400', 51, 'CCCCCCCCCCCCCCCCC', '2015-01-30 04:42:45', '1', 200, NULL, NULL),
(4, 20, 'anchor milk powder', 'milk powder from Fontera.', NULL, NULL, 12, NULL, 1, 6, 300, 325, 'in', 'xxxxx', 34, NULL, NULL, '5', 'LKR', '290', NULL, '34', 51, 'vvvvv', '2015-01-30 05:21:37', '1', 400, NULL, NULL),
(4, 21, 'anchor milk powder', 'milk powder from Fontera.', NULL, NULL, 12, NULL, 1, 6, 400, 325, 'in', 'xxxxx', 34, NULL, NULL, '5', 'LKR', '300', NULL, '45', 51, 'wwwwwwwwww', '2015-01-30 05:22:29', '1', 500, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `productmaterial`
--

CREATE TABLE IF NOT EXISTS `productmaterial` (
  `materialId` int(11) NOT NULL AUTO_INCREMENT,
  `materialName` varchar(255) NOT NULL,
  `mat_description` text NOT NULL,
  `mat_type` varchar(255) NOT NULL,
  PRIMARY KEY (`materialId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `productsize`
--

CREATE TABLE IF NOT EXISTS `productsize` (
  `sizeId` int(11) NOT NULL AUTO_INCREMENT,
  `sizename` varchar(255) DEFAULT NULL,
  `sizeDescription` varchar(11) DEFAULT NULL,
  `sizetype` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`sizeId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `productsize`
--

INSERT INTO `productsize` (`sizeId`, `sizename`, `sizeDescription`, `sizetype`) VALUES
(8, 'Middle', '100g--500g', 'ac'),
(7, 'small', '50g', 'ac');

-- --------------------------------------------------------

--
-- Table structure for table `producttype`
--

CREATE TABLE IF NOT EXISTS `producttype` (
  `productTypeId` int(11) NOT NULL,
  `productTypeName` varchar(255) NOT NULL,
  `other` int(11) NOT NULL,
  PRIMARY KEY (`productTypeId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `productweight`
--

CREATE TABLE IF NOT EXISTS `productweight` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `symbol` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `productweight`
--

INSERT INTO `productweight` (`id`, `name`, `symbol`, `type`) VALUES
(1, 'Mili grams', '', 'ia'),
(2, 'Kilos', '', 'ia'),
(3, 'Grams', '', 'ia');

-- --------------------------------------------------------

--
-- Table structure for table `rdlocations`
--

CREATE TABLE IF NOT EXISTS `rdlocations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lat` varchar(255) DEFAULT NULL,
  `len` varchar(255) DEFAULT NULL,
  `lon` varchar(255) DEFAULT NULL,
  `acu` varchar(255) DEFAULT NULL,
  `rdId` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `subDealerId` varchar(255) DEFAULT NULL,
  `other` varchar(255) DEFAULT NULL,
  `other2` varchar(255) DEFAULT NULL,
  `timeSatmp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rdroots`
--

CREATE TABLE IF NOT EXISTS `rdroots` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(255) DEFAULT NULL,
  `rootNo` varchar(255) DEFAULT NULL,
  `rdId` varchar(255) DEFAULT NULL,
  `rdName` varchar(255) DEFAULT NULL,
  `assignBy` varchar(255) DEFAULT NULL,
  `timeSatmp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `rdroots`
--

INSERT INTO `rdroots` (`id`, `date`, `rootNo`, `rdId`, `rdName`, `assignBy`, `timeSatmp`) VALUES
(1, '2015-04-20', NULL, NULL, NULL, NULL, '2015-04-20 13:43:16');

-- --------------------------------------------------------

--
-- Table structure for table `rdtraking`
--

CREATE TABLE IF NOT EXISTS `rdtraking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(255) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `lat` varchar(255) DEFAULT NULL,
  `len` varchar(255) DEFAULT NULL,
  `lon` varchar(255) DEFAULT NULL,
  `rdId` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `timeSatmp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `battertLavel` varchar(122) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=247 ;

--
-- Dumping data for table `rdtraking`
--

INSERT INTO `rdtraking` (`id`, `date`, `time`, `lat`, `len`, `lon`, `rdId`, `location`, `timeSatmp`, `battertLavel`) VALUES
(1, '2015-02-18', '11:06:41', '6.8331794', NULL, '79.9648104', '115', NULL, '2015-02-18 05:36:41', '89'),
(2, '2015-02-18', '11:06:42', '6.8331794', NULL, '79.9648104', '115', NULL, '2015-02-18 05:36:41', '89'),
(3, '2015-02-18', '11:08:47', '6.8331793', NULL, '79.9648094', '115', NULL, '2015-02-18 07:21:07', '89'),
(4, '2015-02-18', '11:08:47', '6.8331793', NULL, '79.9648094', '115', NULL, '2015-02-18 07:21:07', '89'),
(5, '2015-02-23', '19:12:10', '6.8334134', NULL, '79.9648891', '115', NULL, '2015-02-26 03:28:04', '58'),
(6, '2015-02-28', '15:57:54', '7.0903689', NULL, '80.2831006', '115', NULL, '2015-03-01 07:26:03', '60'),
(7, '2015-02-28', '16:59:00', '7.0903372', NULL, '80.2831581', '115', NULL, '2015-03-01 07:26:03', '51'),
(8, '2015-02-28', '17:56:21', '7.0908069', NULL, '80.2802552', '115', NULL, '2015-03-01 07:26:03', '42'),
(9, '2015-02-28', '18:57:29', '7.0930738', NULL, '80.2783222', '115', NULL, '2015-03-01 07:26:03', '37'),
(10, '2015-02-28', '19:57:48', '7.0926265', NULL, '80.2782999', '115', NULL, '2015-03-01 07:26:03', '32'),
(11, '2015-02-28', '21:02:41', '7.0927121', NULL, '80.2782822', '115', NULL, '2015-03-01 07:26:03', '25'),
(12, '2015-02-28', '21:57:05', '7.0928593', NULL, '80.2786165', '115', NULL, '2015-03-01 07:26:03', '15'),
(13, '2015-02-28', '23:01:47', '7.0902857', NULL, '80.2830448', '115', NULL, '2015-03-01 07:26:03', '8'),
(14, '2015-03-01', '0:00:51', '7.0905106', NULL, '80.2832258', '115', NULL, '2015-03-01 07:26:03', '38'),
(15, '2015-03-01', '1:00:42', '7.0903869', NULL, '80.2830708', '115', NULL, '2015-03-01 07:26:03', '73'),
(16, '2015-03-01', '2:03:19', '7.0903812', NULL, '80.283074', '115', NULL, '2015-03-01 07:26:03', '100'),
(17, '2015-03-01', '2:03:19', '7.0903812', NULL, '80.283074', '115', NULL, '2015-03-01 07:26:03', '100'),
(18, '2015-03-01', '2:03:19', '7.0903812', NULL, '80.283074', '115', NULL, '2015-03-01 07:26:03', '100'),
(19, '2015-03-01', '2:03:20', '7.0903812', NULL, '80.283074', '115', NULL, '2015-03-01 07:26:03', '100'),
(20, '2015-03-01', '2:03:20', '7.0903812', NULL, '80.283074', '115', NULL, '2015-03-01 07:26:03', '100'),
(21, '2015-03-01', '2:03:20', '7.0903812', NULL, '80.283074', '115', NULL, '2015-03-01 07:26:03', '100'),
(22, '2015-03-01', '2:03:20', '7.0903812', NULL, '80.283074', '115', NULL, '2015-03-01 07:26:03', '100'),
(23, '2015-03-01', '2:03:20', '7.0903812', NULL, '80.283074', '115', NULL, '2015-03-01 07:26:03', '100'),
(24, '2015-03-01', '2:03:20', '7.0903812', NULL, '80.283074', '115', NULL, '2015-03-01 07:26:03', '100'),
(25, '2015-03-01', '2:03:20', '7.0903812', NULL, '80.283074', '115', NULL, '2015-03-01 07:26:03', '100'),
(26, '2015-03-01', '2:03:20', '7.0903812', NULL, '80.283074', '115', NULL, '2015-03-01 07:26:03', '100'),
(27, '2015-03-01', '2:57:59', '7.0901043', NULL, '80.2826578', '115', NULL, '2015-03-01 07:26:03', '100'),
(28, '2015-03-01', '3:58:22', '7.0902237', NULL, '80.2829011', '115', NULL, '2015-03-01 07:26:03', '100'),
(29, '2015-03-01', '5:04:04', '7.0903602', NULL, '80.2829537', '115', NULL, '2015-03-01 07:26:03', '100'),
(30, '2015-03-01', '6:01:18', '7.0904239', NULL, '80.282854', '115', NULL, '2015-03-01 07:26:03', '100'),
(31, '2015-03-01', '7:00:58', '7.0900995', NULL, '80.2829001', '115', NULL, '2015-03-01 07:26:03', '100'),
(32, '2015-03-01', '8:04:13', '7.0903425', NULL, '80.2828206', '115', NULL, '2015-03-01 07:26:03', '100'),
(33, '2015-03-01', '9:01:18', '7.0902699', NULL, '80.2828021', '115', NULL, '2015-03-01 07:26:03', '100'),
(34, '2015-03-01', '9:56:55', '7.0904471', NULL, '80.2828484', '115', NULL, '2015-03-01 07:26:03', '100'),
(35, '2015-03-01', '10:56:33', '7.090891', NULL, '80.280903', '115', NULL, '2015-03-01 07:26:03', '97'),
(36, '2015-03-01', '11:56:45', '6.950594', NULL, '80.2137155', '115', NULL, '2015-03-01 07:26:03', '95'),
(37, '2015-03-01', '12:56:11', '6.8563624', NULL, '80.0896108', '115', NULL, '2015-03-01 07:29:25', '89'),
(38, '2015-03-01', '13:56:40', '6.8345317', NULL, '79.965201', '115', NULL, '2015-03-01 10:03:41', '84'),
(39, '2015-03-01', '13:56:40', '6.8345317', NULL, '79.965201', '115', NULL, '2015-03-01 10:03:41', '84'),
(40, '2015-03-01', '13:56:40', '6.8345317', NULL, '79.965201', '115', NULL, '2015-03-01 10:03:41', '84'),
(41, '2015-03-01', '13:56:40', '6.8345317', NULL, '79.965201', '115', NULL, '2015-03-01 10:03:41', '84'),
(42, '2015-03-01', '13:56:40', '6.8345317', NULL, '79.965201', '115', NULL, '2015-03-01 10:03:41', '84'),
(43, '2015-03-01', '13:56:40', '6.8345317', NULL, '79.965201', '115', NULL, '2015-03-01 10:03:41', '84'),
(44, '2015-03-01', '13:56:40', '6.8345317', NULL, '79.965201', '115', NULL, '2015-03-01 10:03:41', '84'),
(45, '2015-03-01', '13:56:40', '6.8345317', NULL, '79.965201', '115', NULL, '2015-03-01 10:03:41', '84'),
(46, '2015-03-01', '13:56:40', '6.8345317', NULL, '79.965201', '115', NULL, '2015-03-01 10:03:41', '84'),
(47, '2015-03-01', '13:56:40', '6.8345317', NULL, '79.965201', '115', NULL, '2015-03-01 10:03:41', '84'),
(48, '2015-03-01', '13:56:40', '6.8345317', NULL, '79.965201', '115', NULL, '2015-03-01 10:03:41', '84'),
(49, '2015-03-01', '13:56:40', '6.8345317', NULL, '79.965201', '115', NULL, '2015-03-01 10:03:41', '84'),
(50, '2015-03-01', '13:56:40', '6.8345317', NULL, '79.965201', '115', NULL, '2015-03-01 10:03:41', '84'),
(51, '2015-03-01', '13:56:40', '6.8345317', NULL, '79.965201', '115', NULL, '2015-03-01 10:03:41', '84'),
(52, '2015-03-01', '13:56:40', '6.8345317', NULL, '79.965201', '115', NULL, '2015-03-01 10:03:41', '84'),
(53, '2015-03-01', '13:56:40', '6.8345317', NULL, '79.965201', '115', NULL, '2015-03-01 10:03:41', '84'),
(54, '2015-03-01', '13:56:41', '6.8345317', NULL, '79.965201', '115', NULL, '2015-03-01 10:03:41', '84'),
(55, '2015-03-01', '13:56:41', '6.8345317', NULL, '79.965201', '115', NULL, '2015-03-01 10:03:41', '84'),
(56, '2015-03-01', '13:56:41', '6.8345317', NULL, '79.965201', '115', NULL, '2015-03-01 10:03:41', '84'),
(57, '2015-03-01', '13:56:41', '6.8345317', NULL, '79.965201', '115', NULL, '2015-03-01 10:03:41', '84'),
(58, '2015-03-01', '13:56:41', '6.8345317', NULL, '79.965201', '115', NULL, '2015-03-01 10:03:41', '84'),
(59, '2015-03-01', '13:56:41', '6.8345317', NULL, '79.965201', '115', NULL, '2015-03-01 10:03:41', '84'),
(60, '2015-03-01', '13:56:41', '6.8345317', NULL, '79.965201', '115', NULL, '2015-03-01 10:03:41', '84'),
(61, '2015-03-01', '14:59:31', '6.8345808', NULL, '79.9651164', '115', NULL, '2015-03-01 10:03:41', '80'),
(62, '2015-03-01', '15:56:02', '6.8344791', NULL, '79.9649952', '115', NULL, '2015-03-01 17:27:27', '62'),
(63, '2015-03-01', '15:56:02', '6.8344791', NULL, '79.9649952', '115', NULL, '2015-03-01 17:27:27', '62'),
(64, '2015-03-01', '15:56:02', '6.8344791', NULL, '79.9649952', '115', NULL, '2015-03-01 17:27:27', '62'),
(65, '2015-03-01', '15:56:02', '6.8344791', NULL, '79.9649952', '115', NULL, '2015-03-01 17:27:27', '62'),
(66, '2015-03-01', '15:56:02', '6.8344791', NULL, '79.9649952', '115', NULL, '2015-03-01 17:27:27', '62'),
(67, '2015-03-01', '15:56:02', '6.8344791', NULL, '79.9649952', '115', NULL, '2015-03-01 17:27:27', '62'),
(68, '2015-03-01', '15:56:02', '6.8344791', NULL, '79.9649952', '115', NULL, '2015-03-01 17:27:27', '62'),
(69, '2015-03-01', '15:56:02', '6.8344791', NULL, '79.9649952', '115', NULL, '2015-03-01 17:27:27', '62'),
(70, '2015-03-01', '15:56:02', '6.8344791', NULL, '79.9649952', '115', NULL, '2015-03-01 17:27:27', '62'),
(71, '2015-03-01', '15:56:02', '6.8344791', NULL, '79.9649952', '115', NULL, '2015-03-01 17:27:27', '62'),
(72, '2015-03-01', '15:56:02', '6.8344791', NULL, '79.9649952', '115', NULL, '2015-03-01 17:27:27', '62'),
(73, '2015-03-01', '15:56:03', '6.8344791', NULL, '79.9649952', '115', NULL, '2015-03-01 17:27:27', '62'),
(74, '2015-03-01', '15:56:03', '6.8344791', NULL, '79.9649952', '115', NULL, '2015-03-01 17:27:27', '62'),
(75, '2015-03-01', '15:56:03', '6.8344791', NULL, '79.9649952', '115', NULL, '2015-03-01 17:27:27', '62'),
(76, '2015-03-01', '15:56:03', '6.8344791', NULL, '79.9649952', '115', NULL, '2015-03-01 17:27:27', '62'),
(77, '2015-03-01', '15:56:03', '6.8344791', NULL, '79.9649952', '115', NULL, '2015-03-01 17:27:27', '62'),
(78, '2015-03-01', '15:56:03', '6.8344791', NULL, '79.9649952', '115', NULL, '2015-03-01 17:27:27', '62'),
(79, '2015-03-01', '15:56:03', '6.8344791', NULL, '79.9649952', '115', NULL, '2015-03-01 17:27:27', '62'),
(80, '2015-03-01', '15:56:03', '6.8344791', NULL, '79.9649952', '115', NULL, '2015-03-01 17:27:27', '62'),
(81, '2015-03-01', '15:56:03', '6.8344791', NULL, '79.9649952', '115', NULL, '2015-03-01 17:27:27', '62'),
(82, '2015-03-01', '15:56:03', '6.8344791', NULL, '79.9649952', '115', NULL, '2015-03-01 17:27:27', '62'),
(83, '2015-03-01', '15:56:03', '6.8344791', NULL, '79.9649952', '115', NULL, '2015-03-01 17:27:27', '62'),
(84, '2015-03-01', '15:56:03', '6.8344791', NULL, '79.9649952', '115', NULL, '2015-03-01 17:27:27', '62'),
(85, '2015-03-01', '15:56:03', '6.8344791', NULL, '79.9649952', '115', NULL, '2015-03-01 17:27:27', '62'),
(86, '2015-03-01', '15:56:03', '6.8344791', NULL, '79.9649952', '115', NULL, '2015-03-01 17:27:27', '62'),
(87, '2015-03-01', '17:11:43', '6.9167587', NULL, '79.8631092', '115', NULL, '2015-03-01 17:27:27', '58'),
(88, '2015-03-01', '17:57:30', '6.9188351', NULL, '79.8667519', '115', NULL, '2015-03-01 17:27:27', '52'),
(89, '2015-03-01', '17:57:30', '6.9188351', NULL, '79.8667519', '115', NULL, '2015-03-01 17:27:27', '52'),
(90, '2015-03-01', '17:57:30', '6.9188351', NULL, '79.8667519', '115', NULL, '2015-03-01 17:27:27', '52'),
(91, '2015-03-01', '17:57:30', '6.9188351', NULL, '79.8667519', '115', NULL, '2015-03-01 17:27:27', '52'),
(92, '2015-03-01', '17:57:30', '6.9188351', NULL, '79.8667519', '115', NULL, '2015-03-01 17:27:27', '52'),
(93, '2015-03-01', '17:57:30', '6.9188351', NULL, '79.8667519', '115', NULL, '2015-03-01 17:27:27', '52'),
(94, '2015-03-01', '17:57:30', '6.9188351', NULL, '79.8667519', '115', NULL, '2015-03-01 17:27:27', '52'),
(95, '2015-03-01', '17:57:30', '6.9188351', NULL, '79.8667519', '115', NULL, '2015-03-01 17:27:27', '52'),
(96, '2015-03-01', '17:57:30', '6.9188351', NULL, '79.8667519', '115', NULL, '2015-03-01 17:27:27', '52'),
(97, '2015-03-01', '17:57:31', '6.9188351', NULL, '79.8667519', '115', NULL, '2015-03-01 17:27:27', '52'),
(98, '2015-03-01', '17:57:31', '6.9188351', NULL, '79.8667519', '115', NULL, '2015-03-01 17:27:27', '52'),
(99, '2015-03-01', '17:57:31', '6.9188351', NULL, '79.8667519', '115', NULL, '2015-03-01 17:27:27', '52'),
(100, '2015-03-01', '17:57:31', '6.9188351', NULL, '79.8667519', '115', NULL, '2015-03-01 17:27:27', '52'),
(101, '2015-03-01', '17:57:31', '6.9188351', NULL, '79.8667519', '115', NULL, '2015-03-01 17:27:27', '52'),
(102, '2015-03-01', '17:57:31', '6.9188351', NULL, '79.8667519', '115', NULL, '2015-03-01 17:27:27', '52'),
(103, '2015-03-01', '17:58:08', '6.9188351', NULL, '79.8667519', '115', NULL, '2015-03-01 17:27:27', '52'),
(104, '2015-03-01', '17:59:37', '6.9188351', NULL, '79.8667519', '115', NULL, '2015-03-01 17:27:27', '52'),
(105, '2015-03-01', '17:59:37', '6.9188351', NULL, '79.8667519', '115', NULL, '2015-03-01 17:27:27', '52'),
(106, '2015-03-01', '17:59:37', '6.9188351', NULL, '79.8667519', '115', NULL, '2015-03-01 17:27:27', '52'),
(107, '2015-03-01', '17:59:38', '6.9188351', NULL, '79.8667519', '115', NULL, '2015-03-01 17:27:27', '52'),
(108, '2015-03-01', '17:59:38', '6.9188351', NULL, '79.8667519', '115', NULL, '2015-03-01 17:27:27', '52'),
(109, '2015-03-01', '17:59:38', '6.9188351', NULL, '79.8667519', '115', NULL, '2015-03-01 17:27:27', '52'),
(110, '2015-03-01', '17:59:38', '6.9188351', NULL, '79.8667519', '115', NULL, '2015-03-01 17:27:27', '52'),
(111, '2015-03-01', '17:59:38', '6.9188351', NULL, '79.8667519', '115', NULL, '2015-03-01 17:27:27', '52'),
(112, '2015-03-01', '17:59:38', '6.9188351', NULL, '79.8667519', '115', NULL, '2015-03-01 17:27:27', '52'),
(113, '2015-03-01', '17:59:38', '6.9188351', NULL, '79.8667519', '115', NULL, '2015-03-01 17:27:27', '52'),
(114, '2015-03-01', '17:59:38', '6.9188351', NULL, '79.8667519', '115', NULL, '2015-03-01 17:27:27', '52'),
(115, '2015-03-01', '19:02:32', '6.8464356', NULL, '79.9491223', '115', NULL, '2015-03-01 17:27:27', '52'),
(116, '2015-03-01', '19:57:13', '6.8344566', NULL, '79.9649407', '115', NULL, '2015-03-01 17:27:27', '50'),
(117, '2015-03-01', '21:05:36', '6.8332269', NULL, '79.9650112', '115', NULL, '2015-03-01 17:27:27', '46'),
(118, '2015-03-01', '22:06:21', '6.8333346', NULL, '79.9651085', '115', NULL, '2015-03-01 17:27:27', '44'),
(119, '2015-03-01', '23:09:01', '6.8333314', NULL, '79.9639656', '115', NULL, '2015-03-01 19:18:13', '37'),
(120, '2015-03-01', '23:56:51', '6.841362', NULL, '79.9652296', '115', NULL, '2015-03-01 19:18:13', '29'),
(121, '2015-03-02', '16:22:46', '6.8783586', NULL, '79.9242336', '115', NULL, '2015-03-02 10:58:51', '84'),
(122, '2015-03-02', '16:22:46', '6.8783586', NULL, '79.9242336', '115', NULL, '2015-03-02 10:58:51', '84'),
(123, '2015-03-02', '16:22:46', '6.8783586', NULL, '79.9242336', '115', NULL, '2015-03-02 10:58:51', '84'),
(124, '2015-03-02', '16:22:46', '6.8783586', NULL, '79.9242336', '115', NULL, '2015-03-02 10:58:51', '84'),
(125, '2015-03-02', '16:22:46', '6.8783586', NULL, '79.9242336', '115', NULL, '2015-03-02 10:58:51', '84'),
(126, '2015-03-02', '16:22:46', '6.8783586', NULL, '79.9242336', '115', NULL, '2015-03-02 10:58:51', '84'),
(127, '2015-03-02', '16:22:46', '6.8783586', NULL, '79.9242336', '115', NULL, '2015-03-02 10:58:51', '84'),
(128, '2015-03-02', '16:22:46', '6.8783586', NULL, '79.9242336', '115', NULL, '2015-03-02 10:58:51', '84'),
(129, '2015-03-02', '16:22:46', '6.8783586', NULL, '79.9242336', '115', NULL, '2015-03-02 10:58:51', '84'),
(130, '2015-03-02', '16:22:46', '6.8783586', NULL, '79.9242336', '115', NULL, '2015-03-02 10:58:51', '84'),
(131, '2015-03-02', '16:22:46', '6.8783586', NULL, '79.9242336', '115', NULL, '2015-03-02 10:58:51', '84'),
(132, '2015-03-02', '16:22:46', '6.8783586', NULL, '79.9242336', '115', NULL, '2015-03-02 10:58:51', '84'),
(133, '2015-03-02', '16:22:46', '6.8783586', NULL, '79.9242336', '115', NULL, '2015-03-02 10:58:51', '84'),
(134, '2015-03-02', '16:22:46', '6.8783586', NULL, '79.9242336', '115', NULL, '2015-03-02 10:58:51', '84'),
(135, '2015-03-02', '16:22:47', '6.8783586', NULL, '79.9242336', '115', NULL, '2015-03-02 10:58:51', '84'),
(136, '2015-03-02', '16:22:47', '6.8783586', NULL, '79.9242336', '115', NULL, '2015-03-02 10:58:51', '84'),
(137, '2015-03-02', '16:22:47', '6.8783586', NULL, '79.9242336', '115', NULL, '2015-03-02 10:58:51', '84'),
(138, '2015-03-02', '16:22:47', '6.8783586', NULL, '79.9242336', '115', NULL, '2015-03-02 10:58:51', '84'),
(139, '2015-03-02', '16:22:47', '6.8783586', NULL, '79.9242336', '115', NULL, '2015-03-02 10:58:51', '84'),
(140, '2015-03-02', '16:22:47', '6.8783586', NULL, '79.9242336', '115', NULL, '2015-03-02 10:58:51', '84'),
(141, '2015-03-02', '16:22:47', '6.8783586', NULL, '79.9242336', '115', NULL, '2015-03-02 10:58:51', '84'),
(142, '2015-03-02', '16:22:47', '6.8783586', NULL, '79.9242336', '115', NULL, '2015-03-02 10:58:51', '84'),
(143, '2015-03-02', '16:22:47', '6.8783586', NULL, '79.9242336', '115', NULL, '2015-03-02 10:58:51', '84'),
(144, '2015-03-02', '16:22:47', '6.8783586', NULL, '79.9242336', '115', NULL, '2015-03-02 10:58:51', '84'),
(145, '2015-03-02', '16:22:47', '6.8783586', NULL, '79.9242336', '115', NULL, '2015-03-02 10:58:51', '84'),
(146, '2015-03-02', '16:22:47', '6.8783586', NULL, '79.9242336', '115', NULL, '2015-03-02 10:58:51', '84'),
(147, '2015-03-02', '16:22:47', '6.8783586', NULL, '79.9242336', '115', NULL, '2015-03-02 10:58:51', '84'),
(148, '2015-03-02', '16:22:47', '6.8783586', NULL, '79.9242336', '115', NULL, '2015-03-02 10:58:51', '84'),
(149, '2015-03-02', '16:22:47', '6.8783586', NULL, '79.9242336', '115', NULL, '2015-03-02 10:58:51', '84'),
(150, '2015-03-02', '16:22:47', '6.8783586', NULL, '79.9242336', '115', NULL, '2015-03-02 10:58:51', '84'),
(151, '2015-03-02', '16:22:47', '6.8783586', NULL, '79.9242336', '115', NULL, '2015-03-02 10:58:51', '84'),
(152, '2015-03-02', '16:22:47', '6.8783586', NULL, '79.9242336', '115', NULL, '2015-03-02 10:58:51', '84'),
(153, '2015-03-02', '16:22:47', '6.8783586', NULL, '79.9242336', '115', NULL, '2015-03-02 10:58:51', '84'),
(154, '2015-03-02', '16:28:48', '6.8729296', NULL, '79.9133841', '115', NULL, '2015-03-02 11:25:55', '81'),
(155, '2015-03-02', '16:28:48', '6.8729296', NULL, '79.9133841', '115', NULL, '2015-03-02 11:25:55', '81'),
(156, '2015-03-02', '16:28:48', '6.8729296', NULL, '79.9133841', '115', NULL, '2015-03-02 11:25:55', '81'),
(157, '2015-03-02', '16:28:48', '6.8729296', NULL, '79.9133841', '115', NULL, '2015-03-02 11:25:55', '81'),
(158, '2015-03-02', '16:28:48', '6.8729296', NULL, '79.9133841', '115', NULL, '2015-03-02 11:25:55', '81'),
(159, '2015-03-02', '16:28:48', '6.8729296', NULL, '79.9133841', '115', NULL, '2015-03-02 11:25:55', '81'),
(160, '2015-03-02', '16:28:48', '6.8729296', NULL, '79.9133841', '115', NULL, '2015-03-02 11:25:55', '81'),
(161, '2015-03-02', '16:28:48', '6.8729296', NULL, '79.9133841', '115', NULL, '2015-03-02 11:25:55', '81'),
(162, '2015-03-02', '16:28:48', '6.8729296', NULL, '79.9133841', '115', NULL, '2015-03-02 11:25:55', '81'),
(163, '2015-03-02', '16:28:48', '6.8729296', NULL, '79.9133841', '115', NULL, '2015-03-02 11:25:55', '81'),
(164, '2015-03-02', '16:28:48', '6.8729296', NULL, '79.9133841', '115', NULL, '2015-03-02 11:25:55', '81'),
(165, '2015-03-02', '16:28:48', '6.8729296', NULL, '79.9133841', '115', NULL, '2015-03-02 11:25:55', '81'),
(166, '2015-03-02', '16:28:48', '6.8729296', NULL, '79.9133841', '115', NULL, '2015-03-02 11:25:55', '81'),
(167, '2015-03-02', '16:28:48', '6.8729296', NULL, '79.9133841', '115', NULL, '2015-03-02 11:25:55', '81'),
(168, '2015-03-02', '16:28:48', '6.8729296', NULL, '79.9133841', '115', NULL, '2015-03-02 11:25:55', '81'),
(169, '2015-03-02', '16:28:48', '6.8729296', NULL, '79.9133841', '115', NULL, '2015-03-02 11:25:55', '81'),
(170, '2015-03-02', '16:28:48', '6.8729296', NULL, '79.9133841', '115', NULL, '2015-03-02 11:25:55', '81'),
(171, '2015-03-02', '16:28:48', '6.8729296', NULL, '79.9133841', '115', NULL, '2015-03-02 11:25:55', '81'),
(172, '2015-03-02', '16:28:48', '6.8729296', NULL, '79.9133841', '115', NULL, '2015-03-02 11:25:55', '81'),
(173, '2015-03-02', '16:28:48', '6.8729296', NULL, '79.9133841', '115', NULL, '2015-03-02 11:25:55', '81'),
(174, '2015-03-02', '16:28:48', '6.8729296', NULL, '79.9133841', '115', NULL, '2015-03-02 11:25:55', '81'),
(175, '2015-03-02', '16:28:48', '6.8729296', NULL, '79.9133841', '115', NULL, '2015-03-02 11:25:55', '81'),
(176, '2015-03-02', '16:28:48', '6.8729296', NULL, '79.9133841', '115', NULL, '2015-03-02 11:25:55', '81'),
(177, '2015-03-02', '16:32:54', '6.8750266', NULL, '79.9171008', '115', NULL, '2015-03-02 11:25:55', '79'),
(178, '2015-03-02', '16:32:54', '6.8750266', NULL, '79.9171008', '115', NULL, '2015-03-02 11:25:55', '79'),
(179, '2015-03-02', '16:32:54', '6.8750266', NULL, '79.9171008', '115', NULL, '2015-03-02 11:25:55', '79'),
(180, '2015-03-02', '16:32:54', '6.8750266', NULL, '79.9171008', '115', NULL, '2015-03-02 11:25:55', '79'),
(181, '2015-03-02', '16:32:54', '6.8750266', NULL, '79.9171008', '115', NULL, '2015-03-02 11:25:55', '79'),
(182, '2015-03-02', '16:32:54', '6.8750266', NULL, '79.9171008', '115', NULL, '2015-03-02 11:25:55', '79'),
(183, '2015-03-02', '16:32:54', '6.8750266', NULL, '79.9171008', '115', NULL, '2015-03-02 11:25:55', '79'),
(184, '2015-03-02', '16:32:54', '6.8750266', NULL, '79.9171008', '115', NULL, '2015-03-02 11:25:55', '79'),
(185, '2015-03-02', '16:32:54', '6.8750266', NULL, '79.9171008', '115', NULL, '2015-03-02 11:25:55', '79'),
(186, '2015-03-02', '16:32:54', '6.8750266', NULL, '79.9171008', '115', NULL, '2015-03-02 11:25:55', '79'),
(187, '2015-03-02', '16:32:55', '6.8750266', NULL, '79.9171008', '115', NULL, '2015-03-02 11:25:55', '79'),
(188, '2015-03-02', '16:28:48', '6.8729296', NULL, '79.9133841', '115', NULL, '2015-03-02 11:25:57', '81'),
(189, '2015-03-02', '16:28:48', '6.8729296', NULL, '79.9133841', '115', NULL, '2015-03-02 11:25:57', '81'),
(190, '2015-03-02', '16:28:48', '6.8729296', NULL, '79.9133841', '115', NULL, '2015-03-02 11:25:57', '81'),
(191, '2015-03-02', '16:28:48', '6.8729296', NULL, '79.9133841', '115', NULL, '2015-03-02 11:25:57', '81'),
(192, '2015-03-02', '16:28:48', '6.8729296', NULL, '79.9133841', '115', NULL, '2015-03-02 11:25:57', '81'),
(193, '2015-03-02', '16:28:48', '6.8729296', NULL, '79.9133841', '115', NULL, '2015-03-02 11:25:57', '81'),
(194, '2015-03-02', '16:28:48', '6.8729296', NULL, '79.9133841', '115', NULL, '2015-03-02 11:25:57', '81'),
(195, '2015-03-02', '16:28:48', '6.8729296', NULL, '79.9133841', '115', NULL, '2015-03-02 11:25:57', '81'),
(196, '2015-03-02', '16:28:48', '6.8729296', NULL, '79.9133841', '115', NULL, '2015-03-02 11:25:57', '81'),
(197, '2015-03-02', '16:28:48', '6.8729296', NULL, '79.9133841', '115', NULL, '2015-03-02 11:25:57', '81'),
(198, '2015-03-02', '16:28:48', '6.8729296', NULL, '79.9133841', '115', NULL, '2015-03-02 11:25:57', '81'),
(199, '2015-03-02', '16:28:48', '6.8729296', NULL, '79.9133841', '115', NULL, '2015-03-02 11:25:57', '81'),
(200, '2015-03-02', '16:28:48', '6.8729296', NULL, '79.9133841', '115', NULL, '2015-03-02 11:25:57', '81'),
(201, '2015-03-02', '16:28:48', '6.8729296', NULL, '79.9133841', '115', NULL, '2015-03-02 11:25:57', '81'),
(202, '2015-03-02', '16:28:48', '6.8729296', NULL, '79.9133841', '115', NULL, '2015-03-02 11:25:57', '81'),
(203, '2015-03-02', '16:28:48', '6.8729296', NULL, '79.9133841', '115', NULL, '2015-03-02 11:25:57', '81'),
(204, '2015-03-02', '16:28:48', '6.8729296', NULL, '79.9133841', '115', NULL, '2015-03-02 11:25:57', '81'),
(205, '2015-03-02', '16:28:48', '6.8729296', NULL, '79.9133841', '115', NULL, '2015-03-02 11:25:57', '81'),
(206, '2015-03-02', '16:28:48', '6.8729296', NULL, '79.9133841', '115', NULL, '2015-03-02 11:25:57', '81'),
(207, '2015-03-02', '16:28:48', '6.8729296', NULL, '79.9133841', '115', NULL, '2015-03-02 11:25:57', '81'),
(208, '2015-03-02', '16:28:48', '6.8729296', NULL, '79.9133841', '115', NULL, '2015-03-02 11:25:57', '81'),
(209, '2015-03-02', '16:28:48', '6.8729296', NULL, '79.9133841', '115', NULL, '2015-03-02 11:25:57', '81'),
(210, '2015-03-02', '16:28:48', '6.8729296', NULL, '79.9133841', '115', NULL, '2015-03-02 11:25:57', '81'),
(211, '2015-03-02', '16:32:54', '6.8750266', NULL, '79.9171008', '115', NULL, '2015-03-02 11:25:57', '79'),
(212, '2015-03-02', '16:32:54', '6.8750266', NULL, '79.9171008', '115', NULL, '2015-03-02 11:25:57', '79'),
(213, '2015-03-02', '16:32:54', '6.8750266', NULL, '79.9171008', '115', NULL, '2015-03-02 11:25:57', '79'),
(214, '2015-03-02', '16:32:54', '6.8750266', NULL, '79.9171008', '115', NULL, '2015-03-02 11:25:57', '79'),
(215, '2015-03-02', '16:32:54', '6.8750266', NULL, '79.9171008', '115', NULL, '2015-03-02 11:25:57', '79'),
(216, '2015-03-02', '16:32:54', '6.8750266', NULL, '79.9171008', '115', NULL, '2015-03-02 11:25:57', '79'),
(217, '2015-03-02', '16:32:54', '6.8750266', NULL, '79.9171008', '115', NULL, '2015-03-02 11:25:57', '79'),
(218, '2015-03-02', '16:32:54', '6.8750266', NULL, '79.9171008', '115', NULL, '2015-03-02 11:25:57', '79'),
(219, '2015-03-02', '16:32:54', '6.8750266', NULL, '79.9171008', '115', NULL, '2015-03-02 11:25:57', '79'),
(220, '2015-03-02', '16:32:54', '6.8750266', NULL, '79.9171008', '115', NULL, '2015-03-02 11:25:57', '79'),
(221, '2015-03-02', '16:32:55', '6.8750266', NULL, '79.9171008', '115', NULL, '2015-03-02 11:25:57', '79'),
(222, '2015-03-02', '16:55:52', '6.9039643', NULL, '79.955188', '115', NULL, '2015-03-02 15:22:28', '69'),
(223, '2015-03-02', '16:55:52', '6.9039643', NULL, '79.955188', '115', NULL, '2015-03-02 15:22:28', '69'),
(224, '2015-03-02', '16:55:52', '6.9039643', NULL, '79.955188', '115', NULL, '2015-03-02 15:22:28', '69'),
(225, '2015-03-02', '16:55:52', '6.9039643', NULL, '79.955188', '115', NULL, '2015-03-02 15:22:28', '69'),
(226, '2015-03-02', '16:55:52', '6.9039643', NULL, '79.955188', '115', NULL, '2015-03-02 15:22:28', '69'),
(227, '2015-03-02', '16:55:52', '6.9039643', NULL, '79.955188', '115', NULL, '2015-03-02 15:22:28', '69'),
(228, '2015-03-02', '16:55:52', '6.9039643', NULL, '79.955188', '115', NULL, '2015-03-02 15:22:28', '69'),
(229, '2015-03-02', '16:55:52', '6.9039643', NULL, '79.955188', '115', NULL, '2015-03-02 15:22:28', '69'),
(230, '2015-03-02', '16:55:53', '6.9039643', NULL, '79.955188', '115', NULL, '2015-03-02 15:22:28', '69'),
(231, '2015-03-02', '16:55:53', '6.9039643', NULL, '79.955188', '115', NULL, '2015-03-02 15:22:28', '69'),
(232, '2015-03-02', '17:57:22', '6.8935351', NULL, '79.9264779', '115', NULL, '2015-03-02 15:22:28', '60'),
(233, '2015-03-02', '17:57:22', '6.8935351', NULL, '79.9264779', '115', NULL, '2015-03-02 15:22:28', '60'),
(234, '2015-03-02', '17:57:22', '6.8935351', NULL, '79.9264779', '115', NULL, '2015-03-02 15:22:28', '60'),
(235, '2015-03-02', '17:57:22', '6.8935351', NULL, '79.9264779', '115', NULL, '2015-03-02 15:22:28', '60'),
(236, '2015-03-02', '17:57:22', '6.8935351', NULL, '79.9264779', '115', NULL, '2015-03-02 15:22:28', '60'),
(237, '2015-03-02', '17:57:22', '6.8935351', NULL, '79.9264779', '115', NULL, '2015-03-02 15:22:28', '60'),
(238, '2015-03-02', '17:57:22', '6.8935351', NULL, '79.9264779', '115', NULL, '2015-03-02 15:22:28', '60'),
(239, '2015-03-02', '17:57:22', '6.8935351', NULL, '79.9264779', '115', NULL, '2015-03-02 15:22:28', '60'),
(240, '2015-03-03', '11:15:29', '6.8334838', NULL, '79.9648151', '115', NULL, '2015-03-03 06:07:10', '96'),
(241, '2015-03-03', '11:37:08', '6.8517021', NULL, '79.9351737', '115', NULL, '2015-03-03 16:48:04', '89'),
(242, '2015-03-03', '11:39:36', '6.8517538', NULL, '79.935252', '115', NULL, '2015-03-03 16:48:04', '88'),
(243, '2015-03-03', '12:41:01', '6.8522176', NULL, '79.9282077', '115', NULL, '2015-03-03 16:48:04', '79'),
(244, '2015-03-15', '13:11:04', '6.8708123', NULL, '79.8863118', '115', NULL, '2015-03-15 11:41:17', '93'),
(245, '2015-03-23', '21:07:23', '6.8345142', NULL, '79.9648918', '115', NULL, '2015-03-23 16:01:05', '70'),
(246, '2015-02-25', '23:53:26', '6.8344677', NULL, '79.9650106', '115', NULL, '2015-04-07 05:02:01', '53');

-- --------------------------------------------------------

--
-- Table structure for table `rdvisits`
--

CREATE TABLE IF NOT EXISTS `rdvisits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rdID` varchar(255) DEFAULT NULL,
  `rdUser` varchar(255) DEFAULT NULL,
  `subdId` varchar(255) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `lat` varchar(255) DEFAULT NULL,
  `len` varchar(255) DEFAULT NULL,
  `acu` varchar(255) DEFAULT NULL,
  `subdName` varchar(255) DEFAULT NULL,
  `isitpossible` varchar(255) DEFAULT 'Yes',
  `timeSatmp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `rdvisits`
--

INSERT INTO `rdvisits` (`id`, `rdID`, `rdUser`, `subdId`, `ip`, `time`, `date`, `lat`, `len`, `acu`, `subdName`, `isitpossible`, `timeSatmp`) VALUES
(1, '115', 'appfi', '1', '192.168.1.10', '11:07:55', '2015-02-18', '6.8331793', '79.9648094', '23.7770004272', 'test', '1', '2015-02-18 07:21:07'),
(2, '115', 'appfi', '2', '192.168.1.10', '11:07:55', '2015-02-18', '6.8331793', '79.9648094', '23.7770004272', 'test', '1', '2015-04-23 03:45:40'),
(3, '115', 'appfi', '1', '192.168.1.10', '11:07:55', '2015-02-18', '6.8331793', '79.9648094', '23.7770004272', 'test', '1', '2015-02-18 07:21:07');

-- --------------------------------------------------------

--
-- Table structure for table `relesemaster`
--

CREATE TABLE IF NOT EXISTS `relesemaster` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(20) DEFAULT NULL,
  `time` varchar(20) DEFAULT NULL,
  `ammount` varchar(20) DEFAULT NULL,
  `user` int(11) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `uto` int(11) DEFAULT NULL,
  `warehouse` int(11) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `states` varchar(255) DEFAULT NULL,
  `distributor` int(11) DEFAULT NULL,
  `reType` varchar(20) DEFAULT 'in',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `relesemasterinfo`
--

CREATE TABLE IF NOT EXISTS `relesemasterinfo` (
  `poDetailsId` int(11) NOT NULL AUTO_INCREMENT,
  `purchaseOrderId` int(11) DEFAULT NULL,
  `productId` int(11) DEFAULT NULL,
  `sizeId` int(11) DEFAULT NULL,
  `qty` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `colourId` int(11) DEFAULT NULL,
  `recievedQty` int(111) DEFAULT NULL,
  `delivered` int(11) DEFAULT NULL,
  `deference` int(11) DEFAULT NULL,
  `other4` int(11) DEFAULT NULL,
  PRIMARY KEY (`poDetailsId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `return_invoice_items`
--

CREATE TABLE IF NOT EXISTS `return_invoice_items` (
  `_id` int(11) NOT NULL AUTO_INCREMENT,
  `return_invoice_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` float NOT NULL,
  `selling_price` float NOT NULL,
  `damaged` tinyint(1) NOT NULL,
  `note` text,
  PRIMARY KEY (`_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `return_invoices`
--

CREATE TABLE IF NOT EXISTS `return_invoices` (
  `_id` int(11) NOT NULL AUTO_INCREMENT,
  `original_invoice_id` int(11) NOT NULL,
  `sub_dealer_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `location_latitude` float DEFAULT NULL,
  `location_longitude` float DEFAULT NULL,
  `note` text,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rootlist`
--

CREATE TABLE IF NOT EXISTS `rootlist` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `rootName` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `rd` varchar(255) DEFAULT NULL,
  `timeSatmp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `rootlist`
--

INSERT INTO `rootlist` (`ID`, `rootName`, `type`, `rd`, `timeSatmp`) VALUES
(1, 'dgtfset', 'ac', '0', '2015-01-29 10:47:34'),
(2, 'RootName', 'ac', '0', '2015-02-03 07:47:04');

-- --------------------------------------------------------

--
-- Table structure for table `sdstock`
--

CREATE TABLE IF NOT EXISTS `sdstock` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `currentQt` varchar(255) DEFAULT NULL,
  `totalActive` varchar(255) DEFAULT NULL,
  `subDid` varchar(255) DEFAULT NULL,
  `productId` varchar(255) DEFAULT NULL,
  `invoice` varchar(255) DEFAULT NULL,
  `timeSatmp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `stockin`
--

CREATE TABLE IF NOT EXISTS `stockin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `proid` int(11) DEFAULT NULL,
  `bach` varchar(30) DEFAULT NULL,
  `dateOne` varchar(10) DEFAULT NULL,
  `dateTwo` varchar(10) DEFAULT NULL,
  `qut` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sub_dealers`
--

CREATE TABLE IF NOT EXISTS `sub_dealers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `epin` varchar(255) DEFAULT NULL,
  `ivr` varchar(255) DEFAULT NULL,
  `mobileNo` varchar(255) DEFAULT NULL,
  `landNo` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `rootNo` varchar(255) DEFAULT NULL,
  `rdId` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `locationLati` varchar(255) NOT NULL DEFAULT '0',
  `locationLen` varchar(255) NOT NULL DEFAULT '0',
  `area` varchar(255) DEFAULT '0',
  `type` varchar(255) DEFAULT NULL,
  `adminNort` varchar(255) DEFAULT NULL,
  `idNo` text,
  `creditLimit` float NOT NULL DEFAULT '0',
  `credit_amount` int(11) DEFAULT '0',
  `target` text,
  `areaName` text,
  `tagetUpdate` text,
  `timeSatmp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `distributorID` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `sub_dealers`
--

INSERT INTO `sub_dealers` (`id`, `name`, `epin`, `ivr`, `mobileNo`, `landNo`, `email`, `rootNo`, `rdId`, `address`, `locationLati`, `locationLen`, `area`, `type`, `adminNort`, `idNo`, `creditLimit`, `credit_amount`, `target`, `areaName`, `tagetUpdate`, `timeSatmp`, `distributorID`) VALUES
(1, 'test', NULL, NULL, '0771', '01114', 'parinda@hhh.com', 'RootName', '115', 'helllo', '6.8331792', '79.9648093', '0', 'Active', NULL, '8824', 50, 0, NULL, NULL, NULL, '2015-02-18 05:34:56', '1'),
(2, 'kanatgtha', NULL, NULL, '8888', '8888', 'ggg@ggg.com', 'RootName', '115', 'fggg', '0', '0', '0', 'Active', NULL, '888', 20, 0, NULL, NULL, NULL, '2015-03-14 11:11:11', '1'),
(3, 'ddd', NULL, NULL, '8888', '8888', 'ggg@ggg.com', 'RootName', '114', 'fggg', '0', '0', '0', 'Active', NULL, '888', 20, 0, NULL, NULL, NULL, '2015-04-22 08:15:08', '1'),
(4, 'gg', NULL, NULL, '8888', '8888', 'ggg@ggg.com', 'RootName', '116', 'fggg', '0', '0', '0', 'Active', NULL, '888', 20, 0, NULL, NULL, NULL, '2015-04-22 08:15:11', '2');

-- --------------------------------------------------------

--
-- Table structure for table `systemlogs`
--

CREATE TABLE IF NOT EXISTS `systemlogs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `massage` text,
  `user` varchar(255) NOT NULL,
  `riskLeval` varchar(255) NOT NULL,
  `logFrom` text,
  `timeSatmp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=196 ;

--
-- Dumping data for table `systemlogs`
--

INSERT INTO `systemlogs` (`id`, `date`, `time`, `massage`, `user`, `riskLeval`, `logFrom`, `timeSatmp`) VALUES
(1, '25/01/2015', '8:14 PM', ' Browsing ', 'admin', 'low', 'syscommSingIn', '2015-01-25 14:44:35'),
(2, '26/01/2015', '9:17 AM', ' Browsing ', 'admin', 'low', 'syscommSingIn', '2015-01-26 03:47:02'),
(3, '26-01-15', '9:17 AM', 'View Sub Dealers ', 'admin', 'low', 'SubDealers', '2015-01-26 03:47:59'),
(4, '26-01-15', '10:43 AM', 'View Sub Dealers ', 'admin', 'low', 'SubDealers', '2015-01-26 05:13:49'),
(5, '27/01/2015', '9:15 AM', ' Browsing ', 'admin', 'low', 'syscommSingIn', '2015-01-27 03:45:07'),
(6, '28/01/2015', '9:27 AM', ' Browsing ', 'admin', 'low', 'syscommSingIn', '2015-01-28 03:57:46'),
(7, '28/01/2015', '11:20 AM', ' Browsing ', 'admin', 'low', 'syscommSingIn', '2015-01-28 05:50:10'),
(8, '29/01/2015', '9:04 AM', ' Browsing ', 'admin', 'low', 'syscommSingIn', '2015-01-29 03:34:29'),
(9, '29-01-15', '9:18 AM', 'View Sub Dealers ', 'admin', 'low', 'SubDealers', '2015-01-29 03:48:25'),
(10, '29-01-15', '9:18 AM', 'Going To Add Sub Dealers', 'admin', 'low', 'SubDealers', '2015-01-29 03:48:28'),
(11, '29-01-15', '9:18 AM', 'View Sub Dealers ', 'admin', 'low', 'SubDealers', '2015-01-29 03:48:31'),
(12, '29/01/2015', '9:18 AM', ' View Sub Dealers ', 'admin', 'low', 'SubDealers', '2015-01-29 03:48:43'),
(13, '29-01-15', '9:18 AM', 'Going To Add Sub Dealers', 'admin', 'low', 'SubDealers', '2015-01-29 03:48:46'),
(14, '29-01-15', '9:19 AM', 'View Sub Dealers ', 'admin', 'low', 'SubDealers', '2015-01-29 03:49:56'),
(15, '29/01/2015', '11:39 AM', ' Browsing ', 'admin', 'low', 'syscommSingIn', '2015-01-29 06:09:08'),
(16, '29/01/2015', '2:26 PM', ' Browsing ', 'admin', 'low', 'syscommSingIn', '2015-01-29 08:56:43'),
(17, '29/01/2015', '3:39 PM', ' Browsing ', 'admin', 'low', 'syscommSingIn', '2015-01-29 10:09:17'),
(18, '29/01/2015', '3:39 PM', ' View User ', 'admin', 'low', 'User', '2015-01-29 10:09:26'),
(19, '29/01/2015', '3:42 PM', ' View User ', 'admin', 'low', 'User', '2015-01-29 10:12:30'),
(20, '29/01/2015', '4:12 PM', ' Browsing ', 'admin', 'low', 'syscommSingIn', '2015-01-29 10:42:39'),
(21, '29/01/2015', '4:15 PM', ' Browsing ', 'admin', 'low', 'syscommSingIn', '2015-01-29 10:45:23'),
(22, '30/01/2015', '9:34 AM', ' Browsing ', 'admin', 'low', 'syscommSingIn', '2015-01-30 04:04:56'),
(23, '30/01/2015', '9:47 AM', ' Browsing ', 'admin', 'low', 'syscommSingIn', '2015-01-30 04:17:18'),
(24, '30/01/2015', '10:21 AM', ' Browsing ', 'admin', 'low', 'syscommSingIn', '2015-01-30 04:51:51'),
(25, '30/01/2015', '10:56 AM', ' Browsing ', 'admin', 'low', 'syscommSingIn', '2015-01-30 05:26:32'),
(26, '30/01/2015', '2:02 PM', ' Browsing ', 'admin', 'low', 'syscommSingIn', '2015-01-30 08:32:53'),
(27, '03/02/2015', '10:20 AM', ' Browsing ', 'admin', 'low', 'syscommSingIn', '2015-02-03 04:50:27'),
(28, '03/02/2015', '1:18 PM', ' Browsing ', 'lily', 'low', 'syscommSingIn', '2015-02-03 07:48:08'),
(29, '03/02/2015', '1:19 PM', ' Browsing ', 'admin', 'low', 'syscommSingIn', '2015-02-03 07:49:38'),
(30, '04/02/2015', '9:22 AM', ' Browsing ', 'admin', 'low', 'syscommSingIn', '2015-02-04 03:52:16'),
(31, '07/02/2015', '5:03 PM', ' Browsing ', 'admin', 'low', 'syscommSingIn', '2015-02-07 11:33:59'),
(32, '08/02/2015', '9:51 AM', ' Browsing ', 'admin', 'low', 'syscommSingIn', '2015-02-08 04:21:35'),
(33, '09/02/2015', '5:02 PM', ' Browsing ', 'admin', 'low', 'syscommSingIn', '2015-02-09 11:32:43'),
(34, '09-02-15', '5:03 PM', 'View Sub Dealers ', 'admin', 'low', 'SubDealers', '2015-02-09 11:33:10'),
(35, '09/02/2015', '5:03 PM', ' View User ', 'admin', 'low', 'User', '2015-02-09 11:33:19'),
(36, '10/02/2015', '9:50 AM', ' Browsing ', 'admin', 'low', 'syscommSingIn', '2015-02-10 04:20:19'),
(37, '10-02-15', '9:50 AM', 'View Sub Dealers ', 'admin', 'low', 'SubDealers', '2015-02-10 04:20:34'),
(38, '10-02-15', '9:50 AM', 'View Sub Dealers ', 'admin', 'low', 'SubDealers', '2015-02-10 04:20:39'),
(39, '10-02-15', '9:50 AM', 'View Sub Dealers ', 'admin', 'low', 'SubDealers', '2015-02-10 04:20:58'),
(40, '10-02-15', '9:51 AM', 'Going To Add Sub Dealers', 'admin', 'low', 'SubDealers', '2015-02-10 04:21:20'),
(41, '10-02-15', '10:03 AM', 'View Sub Dealers ', 'admin', 'low', 'SubDealers', '2015-02-10 04:33:39'),
(42, '10-02-15', '10:03 AM', 'Going To Add Sub Dealers', 'admin', 'low', 'SubDealers', '2015-02-10 04:33:42'),
(43, '10-02-15', '10:04 AM', 'View Sub Dealers ', 'admin', 'low', 'SubDealers', '2015-02-10 04:34:22'),
(44, '10-02-15', '10:05 AM', 'View Sub Dealers ', 'admin', 'low', 'SubDealers', '2015-02-10 04:35:05'),
(45, '10-02-15', '10:05 AM', 'Going To Add Sub Dealers', 'admin', 'low', 'SubDealers', '2015-02-10 04:35:05'),
(46, '10-02-15', '10:06 AM', 'View Sub Dealers ', 'admin', 'low', 'SubDealers', '2015-02-10 04:36:26'),
(47, '10-02-15', '10:06 AM', 'View Sub Dealers ', 'admin', 'low', 'SubDealers', '2015-02-10 04:36:28'),
(48, '2015-02-10', '10:07 AM', 'Going To Adjust a Creadit Invoice of ', 'admin', 'low', NULL, '2015-02-10 04:37:17'),
(49, '10/02/2015', '10:06 PM', ' Browsing ', 'admin', 'low', 'syscommSingIn', '2015-02-10 16:36:45'),
(50, '16/02/2015', '4:31 PM', ' Browsing ', 'admin', 'low', 'syscommSingIn', '2015-02-16 11:01:23'),
(51, '16-02-15', '4:31 PM', 'View Sub Dealers ', 'admin', 'low', 'SubDealers', '2015-02-16 11:01:34'),
(52, '16-02-15', '4:31 PM', 'Going To Add Sub Dealers', 'admin', 'low', 'SubDealers', '2015-02-16 11:01:40'),
(53, '16-02-15', '4:31 PM', 'View Sub Dealers ', 'admin', 'low', 'SubDealers', '2015-02-16 11:01:57'),
(54, '16-02-15', '4:32 PM', 'Going To Add Sub Dealers', 'admin', 'low', 'SubDealers', '2015-02-16 11:02:00'),
(55, '18/02/2015', '10:31 AM', ' Browsing ', 'admin', 'low', 'syscommSingIn', '2015-02-18 05:01:37'),
(56, '18-02-15', '10:32 AM', 'View Sub Dealers ', 'admin', 'low', 'SubDealers', '2015-02-18 05:02:28'),
(57, '18-02-15', '10:32 AM', 'Going To Add Sub Dealers', 'admin', 'low', 'SubDealers', '2015-02-18 05:02:29'),
(58, '18-02-15', '10:32 AM', 'View Sub Dealers ', 'admin', 'low', 'SubDealers', '2015-02-18 05:02:31'),
(59, '18-02-15', '10:32 AM', 'View Sub Dealers ', 'admin', 'low', 'SubDealers', '2015-02-18 05:02:45'),
(60, '18-02-15', '10:32 AM', 'View Sub Dealers ', 'admin', 'low', 'SubDealers', '2015-02-18 05:02:46'),
(61, '18/02/2015', '10:32 AM', ' View User ', 'admin', 'low', 'User', '2015-02-18 05:02:53'),
(62, '18/02/2015', '10:50 AM', ' View User ', 'admin', 'low', 'User', '2015-02-18 05:20:38'),
(63, '18/02/2015', '10:50 AM', 'appfi Edit ', 'admin', 'low', 'User', '2015-02-18 05:20:46'),
(64, '18/02/2015', '10:50 AM', ' View User ', 'admin', 'low', 'User', '2015-02-18 05:20:46'),
(65, '18-02-15', '10:51 AM', 'View Route ', 'admin', 'low', 'Distributers', '2015-02-18 05:21:11'),
(66, '18/02/2015', '10:52 AM', ' View User ', 'admin', 'low', 'User', '2015-02-18 05:22:48'),
(67, '18/02/2015', '10:55 AM', ' View User ', 'admin', 'low', 'User', '2015-02-18 05:25:35'),
(68, '18-02-15', '11:04 AM', 'View Sub Dealers ', 'admin', 'low', 'SubDealers', '2015-02-18 05:34:47'),
(69, '18-02-15', '11:04 AM', 'View Sub Dealers ', 'admin', 'low', 'SubDealers', '2015-02-18 05:34:49'),
(70, '18-02-15', '11:04 AM', 'View Sub Dealers ', 'admin', 'low', 'SubDealers', '2015-02-18 05:34:51'),
(71, '18-02-15', '11:05 AM', 'Going To Add Sub Dealers', 'admin', 'low', 'SubDealers', '2015-02-18 05:35:00'),
(72, '18-02-15', '11:05 AM', 'View Sub Dealers ', 'admin', 'low', 'SubDealers', '2015-02-18 05:35:02'),
(73, '18-02-15', '11:05 AM', 'View Sub Dealers ', 'admin', 'low', 'SubDealers', '2015-02-18 05:35:03'),
(74, '18-02-15', '11:05 AM', 'View test Status ', 'admin', 'low', 'SubDealers', '2015-02-18 05:35:05'),
(75, '18-02-15', '11:05 AM', 'View test Invoice ', 'admin', 'low', 'SubDealers', '2015-02-18 05:35:05'),
(76, '18-02-15', '11:05 AM', 'View test Invoice ', 'admin', 'low', 'SubDealers', '2015-02-18 05:35:21'),
(77, '24/02/2015', '12:01 PM', ' Browsing ', 'admin', 'low', 'syscommSingIn', '2015-02-24 06:31:50'),
(78, '25/02/2015', '1:46 PM', ' Browsing ', 'admin', 'low', 'syscommSingIn', '2015-02-25 08:16:32'),
(79, '25/02/2015', '1:46 PM', ' Browsing ', 'admin', 'low', 'syscommSingIn', '2015-02-25 08:16:33'),
(80, '25-02-15', '1:46 PM', 'View Sub Dealers ', 'admin', 'low', 'SubDealers', '2015-02-25 08:16:59'),
(81, '25-02-15', '1:47 PM', 'Going To Add Sub Dealers', 'admin', 'low', 'SubDealers', '2015-02-25 08:17:03'),
(82, '25-02-15', '1:58 PM', 'View Sub Dealers ', 'admin', 'low', 'SubDealers', '2015-02-25 08:28:59'),
(83, '25-02-15', '1:59 PM', 'Going To Add Sub Dealers', 'admin', 'low', 'SubDealers', '2015-02-25 08:29:03'),
(84, '25-02-15', '1:59 PM', 'View Sub Dealers ', 'admin', 'low', 'SubDealers', '2015-02-25 08:29:04'),
(85, '25-02-15', '2:29 PM', 'View Sub Dealers ', 'admin', 'low', 'SubDealers', '2015-02-25 08:59:10'),
(86, '25/02/2015', '4:47 PM', ' Browsing ', 'admin', 'low', 'syscommSingIn', '2015-02-25 11:17:40'),
(87, '25-02-15', '4:47 PM', 'View Sub Dealers ', 'admin', 'low', 'SubDealers', '2015-02-25 11:17:48'),
(88, '25-02-15', '4:47 PM', 'Going To Add Sub Dealers', 'admin', 'low', 'SubDealers', '2015-02-25 11:17:54'),
(89, '25-02-15', '4:48 PM', 'View Sub Dealers ', 'admin', 'low', 'SubDealers', '2015-02-25 11:18:54'),
(90, '25-02-15', '4:49 PM', 'Going To Add Sub Dealers', 'admin', 'low', 'SubDealers', '2015-02-25 11:19:12'),
(91, '25-02-15', '4:49 PM', 'Going To Add Sub Dealers', 'admin', 'low', 'SubDealers', '2015-02-25 11:19:13'),
(92, '25-02-15', '4:49 PM', 'Going To Add Sub Dealers', 'admin', 'low', 'SubDealers', '2015-02-25 11:19:13'),
(93, '25-02-15', '4:51 PM', 'View Sub Dealers ', 'admin', 'low', 'SubDealers', '2015-02-25 11:21:54'),
(94, '25-02-15', '4:53 PM', 'View Sub Dealers ', 'admin', 'low', 'SubDealers', '2015-02-25 11:23:03'),
(95, '25-02-15', '4:53 PM', 'View Sub Dealers ', 'admin', 'low', 'SubDealers', '2015-02-25 11:23:04'),
(96, '25-02-15', '4:53 PM', 'Going To Add Sub Dealers', 'admin', 'low', 'SubDealers', '2015-02-25 11:23:04'),
(97, '25-02-15', '4:53 PM', 'View Sub Dealers ', 'admin', 'low', 'SubDealers', '2015-02-25 11:23:05'),
(98, '25-02-15', '4:53 PM', 'View test Status ', 'admin', 'low', 'SubDealers', '2015-02-25 11:23:15'),
(99, '25-02-15', '4:53 PM', 'View test Invoice ', 'admin', 'low', 'SubDealers', '2015-02-25 11:23:16'),
(100, '25-02-15', '4:53 PM', 'View Sub Dealers ', 'admin', 'low', 'SubDealers', '2015-02-25 11:23:28'),
(101, '25-02-15', '4:53 PM', 'View test Status ', 'admin', 'low', 'SubDealers', '2015-02-25 11:23:39'),
(102, '25-02-15', '4:53 PM', 'View test Invoice ', 'admin', 'low', 'SubDealers', '2015-02-25 11:23:40'),
(103, '25-02-15', '4:53 PM', 'View Sub Dealers ', 'admin', 'low', 'SubDealers', '2015-02-25 11:23:44'),
(104, '25-02-15', '4:53 PM', 'View Sub Dealers ', 'admin', 'low', 'SubDealers', '2015-02-25 11:23:45'),
(105, '25-02-15', '4:54 PM', 'View test Status ', 'admin', 'low', 'SubDealers', '2015-02-25 11:24:33'),
(106, '25-02-15', '4:54 PM', 'View test Invoice ', 'admin', 'low', 'SubDealers', '2015-02-25 11:24:34'),
(107, '25-02-15', '4:54 PM', 'Going To Add Sub Dealers', 'admin', 'low', 'SubDealers', '2015-02-25 11:24:53'),
(108, '25/02/2015', '6:00 PM', ' Browsing ', 'admin', 'low', 'syscommSingIn', '2015-02-25 12:30:34'),
(109, '25-02-15', '6:10 PM', 'View Sub Dealers ', 'admin', 'low', 'SubDealers', '2015-02-25 12:40:28'),
(110, '25-02-15', '6:10 PM', 'View Sub Dealers ', 'admin', 'low', 'SubDealers', '2015-02-25 12:40:29'),
(111, '25-02-15', '6:10 PM', 'Going To Add Sub Dealers', 'admin', 'low', 'SubDealers', '2015-02-25 12:40:33'),
(112, '25-02-15', '6:10 PM', 'View Sub Dealers ', 'admin', 'low', 'SubDealers', '2015-02-25 12:40:37'),
(113, '25-02-15', '6:10 PM', 'View test Status ', 'admin', 'low', 'SubDealers', '2015-02-25 12:40:41'),
(114, '25-02-15', '6:10 PM', 'View test Invoice ', 'admin', 'low', 'SubDealers', '2015-02-25 12:40:42'),
(115, '25-02-15', '6:11 PM', 'View Sub Dealers ', 'admin', 'low', 'SubDealers', '2015-02-25 12:41:29'),
(116, '25-02-15', '6:11 PM', 'View Sub Dealers ', 'admin', 'low', 'SubDealers', '2015-02-25 12:41:29'),
(117, '25-02-15', '6:11 PM', 'View Sub Dealers ', 'admin', 'low', 'SubDealers', '2015-02-25 12:41:38'),
(118, '25-02-15', '6:11 PM', 'View test Status ', 'admin', 'low', 'SubDealers', '2015-02-25 12:41:43'),
(119, '25-02-15', '6:11 PM', 'View test Invoice ', 'admin', 'low', 'SubDealers', '2015-02-25 12:41:44'),
(120, '25-02-15', '6:12 PM', 'View Sub Dealers ', 'admin', 'low', 'SubDealers', '2015-02-25 12:42:37'),
(121, '25-02-15', '6:12 PM', 'View test Status ', 'admin', 'low', 'SubDealers', '2015-02-25 12:42:44'),
(122, '25-02-15', '6:12 PM', 'View test Invoice ', 'admin', 'low', 'SubDealers', '2015-02-25 12:42:45'),
(123, '25-02-15', '6:13 PM', 'View Sub Dealers ', 'admin', 'low', 'SubDealers', '2015-02-25 12:43:00'),
(124, '05/03/2015', '4:45 PM', ' Browsing ', 'admin', 'low', 'syscommSingIn', '2015-03-05 11:15:36'),
(125, '05-03-15', '4:46 PM', 'View Sub Dealers ', 'admin', 'low', 'SubDealers', '2015-03-05 11:16:25'),
(126, '05-03-15', '4:46 PM', 'View test Status ', 'admin', 'low', 'SubDealers', '2015-03-05 11:16:28'),
(127, '05-03-15', '4:46 PM', 'View test Invoice ', 'admin', 'low', 'SubDealers', '2015-03-05 11:16:56'),
(128, '05/03/2015', '4:54 PM', ' Browsing ', 'admin', 'low', 'syscommSingIn', '2015-03-05 11:24:32'),
(129, '30/03/2015', '6:29 PM', ' Browsing ', 'admin', 'low', 'syscommSingIn', '2015-03-30 12:59:51'),
(130, '30-03-15', '6:30 PM', 'View Sub Dealers ', 'admin', 'low', 'SubDealers', '2015-03-30 13:00:21'),
(131, '30-03-15', '6:30 PM', 'View kanatgtha Status ', 'admin', 'low', 'SubDealers', '2015-03-30 13:00:29'),
(132, '30-03-15', '6:30 PM', 'View kanatgtha Invoice ', 'admin', 'low', 'SubDealers', '2015-03-30 13:00:30'),
(133, '06/04/2015', '10:25 AM', ' Browsing ', 'admin', 'low', 'syscommSingIn', '2015-04-06 04:55:17'),
(134, '06-04-15', '10:25 AM', 'View Sub Dealers ', 'admin', 'low', 'SubDealers', '2015-04-06 04:55:55'),
(135, '06-04-15', '10:26 AM', 'View Sub Dealers ', 'admin', 'low', 'SubDealers', '2015-04-06 04:56:03'),
(136, '06-04-15', '10:26 AM', 'View kanatgtha Status ', 'admin', 'low', 'SubDealers', '2015-04-06 04:56:27'),
(137, '06-04-15', '10:26 AM', 'View kanatgtha Invoice ', 'admin', 'low', 'SubDealers', '2015-04-06 04:56:28'),
(138, '06-04-15', '10:26 AM', 'Going To Add Sub Dealers', 'admin', 'low', 'SubDealers', '2015-04-06 04:56:38'),
(139, '06-04-15', '10:27 AM', 'View Sub Dealers ', 'admin', 'low', 'SubDealers', '2015-04-06 04:57:50'),
(140, '15/04/2015', '12:30 PM', ' Browsing ', 'admin', 'low', 'syscommSingIn', '2015-04-15 07:00:41'),
(141, '20/04/2015', '2:54 PM', ' Browsing ', 'admin', 'low', 'syscommSingIn', '2015-04-20 09:24:15'),
(142, '20-04-15', '2:54 PM', 'View Sub Dealers ', 'admin', 'low', 'SubDealers', '2015-04-20 09:24:27'),
(143, '20-04-15', '2:54 PM', 'Going To Add Sub Dealers', 'admin', 'low', 'SubDealers', '2015-04-20 09:24:37'),
(144, '20-04-15', '2:54 PM', 'View Sub Dealers ', 'admin', 'low', 'SubDealers', '2015-04-20 09:24:38'),
(145, '20-04-15', '2:54 PM', 'View Sub Dealers ', 'admin', 'low', 'SubDealers', '2015-04-20 09:24:46'),
(146, '20/04/2015', '2:54 PM', ' View User ', 'admin', 'low', 'User', '2015-04-20 09:24:53'),
(147, '20-04-15', '2:55 PM', 'View Sub Dealers ', 'admin', 'low', 'SubDealers', '2015-04-20 09:25:25'),
(148, '20-04-15', '6:16 PM', 'View Sub Dealers ', 'admin', 'low', 'SubDealers', '2015-04-20 12:46:15'),
(149, '20-04-15', '6:16 PM', 'View Sub Dealers ', 'admin', 'low', 'SubDealers', '2015-04-20 12:46:17'),
(150, '20-04-15', '6:17 PM', 'View Sub Dealers ', 'admin', 'low', 'SubDealers', '2015-04-20 12:47:03'),
(151, '20-04-15', '6:18 PM', 'View Sub Dealers ', 'admin', 'low', 'SubDealers', '2015-04-20 12:48:50'),
(152, '20-04-15', '6:18 PM', 'View kanatgtha Status ', 'admin', 'low', 'SubDealers', '2015-04-20 12:48:53'),
(153, '20-04-15', '6:18 PM', 'View kanatgtha Invoice ', 'admin', 'low', 'SubDealers', '2015-04-20 12:48:53'),
(154, '20-04-15', '6:19 PM', 'View Sub Dealers ', 'admin', 'low', 'SubDealers', '2015-04-20 12:49:08'),
(155, '20/04/2015', '6:23 PM', ' View User ', 'admin', 'low', 'User', '2015-04-20 12:53:58'),
(156, '20-04-15', '6:27 PM', 'View Sub Dealers ', 'admin', 'low', 'SubDealers', '2015-04-20 12:57:57'),
(157, '20-04-15', '6:27 PM', 'Going To Add Sub Dealers', 'admin', 'low', 'SubDealers', '2015-04-20 12:57:59'),
(158, '20-04-15', '6:28 PM', 'View Sub Dealers ', 'admin', 'low', 'SubDealers', '2015-04-20 12:58:56'),
(159, '20-04-15', '6:28 PM', 'Going To Add Sub Dealers', 'admin', 'low', 'SubDealers', '2015-04-20 12:58:58'),
(160, '20-04-15', '6:50 PM', 'View Sub Dealers ', 'admin', 'low', 'SubDealers', '2015-04-20 13:20:41'),
(161, '20-04-15', '6:51 PM', 'View amila Status ', 'admin', 'low', 'Distributers', '2015-04-20 13:21:03'),
(162, '20-04-15', '6:51 PM', 'View akalanka Status ', 'admin', 'low', 'Distributers', '2015-04-20 13:21:31'),
(163, '20-04-15', '7:04 PM', 'View Sub Dealers ', 'admin', 'low', 'SubDealers', '2015-04-20 13:34:24'),
(164, '20-04-15', '7:04 PM', 'View kanatgtha Status ', 'admin', 'low', 'SubDealers', '2015-04-20 13:34:25'),
(165, '20-04-15', '7:04 PM', 'View kanatgtha Invoice ', 'admin', 'low', 'SubDealers', '2015-04-20 13:34:27'),
(166, '20-04-15', '7:06 PM', 'View Sub Dealers ', 'admin', 'low', 'SubDealers', '2015-04-20 13:36:06'),
(167, '20-04-15', '7:06 PM', 'View Sub Dealers ', 'admin', 'low', 'SubDealers', '2015-04-20 13:36:06'),
(168, '20-04-15', '7:06 PM', 'View Sub Dealers ', 'admin', 'low', 'SubDealers', '2015-04-20 13:36:07'),
(169, '20-04-15', '7:06 PM', 'View kanatgtha Status ', 'admin', 'low', 'SubDealers', '2015-04-20 13:36:12'),
(170, '20-04-15', '7:06 PM', 'View kanatgtha Invoice ', 'admin', 'low', 'SubDealers', '2015-04-20 13:36:12'),
(171, '20-04-15', '7:07 PM', 'View Sub Dealers ', 'admin', 'low', 'SubDealers', '2015-04-20 13:37:54'),
(172, '20-04-15', '7:08 PM', 'View kanatgtha Status ', 'admin', 'low', 'SubDealers', '2015-04-20 13:38:11'),
(173, '20-04-15', '7:08 PM', 'View kanatgtha Invoice ', 'admin', 'low', 'SubDealers', '2015-04-20 13:38:11'),
(174, '20-04-15', '7:08 PM', 'View kanatgtha Invoice ', 'admin', 'low', 'SubDealers', '2015-04-20 13:38:26'),
(175, '20-04-15', '7:08 PM', 'View kanatgtha Invoice ', 'admin', 'low', 'SubDealers', '2015-04-20 13:38:27'),
(176, '20-04-15', '7:08 PM', 'View Sub Dealers ', 'admin', 'low', 'SubDealers', '2015-04-20 13:38:42'),
(177, '20-04-15', '7:08 PM', 'View kanatgtha Status ', 'admin', 'low', 'SubDealers', '2015-04-20 13:38:44'),
(178, '20-04-15', '7:08 PM', 'View kanatgtha Invoice ', 'admin', 'low', 'SubDealers', '2015-04-20 13:38:44'),
(179, '20-04-15', '7:10 PM', 'View akalanka Status ', 'admin', 'low', 'Distributers', '2015-04-20 13:40:31'),
(180, '20-04-15', '7:13 PM', 'View Route ', 'admin', 'low', 'Distributers', '2015-04-20 13:43:04'),
(181, '20-04-15', '7:13 PM', 'View Route ', 'admin', 'low', 'Distributers', '2015-04-20 13:43:17'),
(182, '20-04-15', '7:22 PM', 'View akalanka Status ', 'admin', 'low', 'Distributers', '2015-04-20 13:52:12'),
(183, '20-04-15', '7:32 PM', 'View Sub Dealers ', 'admin', 'low', 'SubDealers', '2015-04-20 14:02:37'),
(184, '20-04-15', '7:32 PM', 'Going To Add Sub Dealers', 'admin', 'low', 'SubDealers', '2015-04-20 14:02:39'),
(185, '20-04-15', '7:32 PM', 'View Sub Dealers ', 'admin', 'low', 'SubDealers', '2015-04-20 14:02:57'),
(186, '20-04-15', '7:33 PM', 'Going To Add Sub Dealers', 'admin', 'low', 'SubDealers', '2015-04-20 14:03:00'),
(187, '20-04-15', '7:33 PM', 'View Sub Dealers ', 'admin', 'low', 'SubDealers', '2015-04-20 14:03:05'),
(188, '20-04-15', '7:33 PM', 'Going To Add Sub Dealers', 'admin', 'low', 'SubDealers', '2015-04-20 14:03:10'),
(189, '20-04-15', '7:33 PM', 'View Sub Dealers ', 'admin', 'low', 'SubDealers', '2015-04-20 14:03:16'),
(190, '20-04-15', '7:33 PM', 'View test Status ', 'admin', 'low', 'SubDealers', '2015-04-20 14:03:57'),
(191, '20-04-15', '7:33 PM', 'View test Invoice ', 'admin', 'low', 'SubDealers', '2015-04-20 14:03:58'),
(192, '20-04-15', '7:33 PM', 'View Sub Dealers ', 'admin', 'low', 'SubDealers', '2015-04-20 14:03:59'),
(193, '20-04-15', '7:34 PM', 'Going To Add Sub Dealers', 'admin', 'low', 'SubDealers', '2015-04-20 14:04:05'),
(194, '20-04-15', '7:34 PM', 'View Sub Dealers ', 'admin', 'low', 'SubDealers', '2015-04-20 14:04:22'),
(195, '20/04/2015', '7:51 PM', ' Browsing ', 'admin', 'low', 'syscommSingIn', '2015-04-20 14:21:25');

-- --------------------------------------------------------

--
-- Table structure for table `todolist`
--

CREATE TABLE IF NOT EXISTS `todolist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(255) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `timeSatmp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `rdId` varchar(20) DEFAULT NULL,
  `subdealerId` varchar(20) DEFAULT NULL,
  `type` varchar(50) NOT NULL DEFAULT 'pending',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `fullName` varchar(255) DEFAULT NULL,
  `phoneNo` varchar(255) DEFAULT NULL,
  `phoneNoland` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `area` varchar(255) DEFAULT NULL,
  `regdate` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `key` text,
  `timeSatmp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `warehouseId` varchar(200) DEFAULT NULL,
  `distributorID` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=116 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `fullName`, `phoneNo`, `phoneNoland`, `role`, `area`, `regdate`, `type`, `key`, `timeSatmp`, `warehouseId`, `distributorID`) VALUES
(51, 'admin', 'admin', 'a', 'Test Admin', NULL, NULL, 'Admin', NULL, NULL, 'Active', '2838023a778dfaecdc212708f721b788', '2015-01-11 09:33:56', '12', '0'),
(115, 'appfi', 'appfi', NULL, NULL, NULL, NULL, 'rep', NULL, NULL, 'Active', NULL, '2015-02-18 05:20:46', NULL, '1'),
(114, 'akalanka', 'akalanka', 'akalankaw@gmail.com', 'Akalanka', '0711111111', '0711111111', 'rep', NULL, NULL, 'Active', NULL, '2015-01-14 05:25:56', NULL, '1'),
(113, 'amila', 'amila', 'amila@amil.com', 'amila parinda', '0715548473', '6736436736', 'rep', NULL, NULL, 'Active', NULL, '2015-01-13 18:15:25', NULL, '0'),
(112, 'lily', 'lily', 'lily@lilydigital.com', 'Lily Digital', '071', '011', 'Admin', NULL, NULL, 'Active', NULL, '2015-01-13 17:40:25', NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `warehouse`
--

CREATE TABLE IF NOT EXISTS `warehouse` (
  `warehouseId` int(11) NOT NULL AUTO_INCREMENT,
  `warehouseName` varchar(255) DEFAULT NULL,
  `warehouseAdd1` varchar(255) DEFAULT NULL,
  `warehouseAdd2` varchar(255) DEFAULT NULL,
  `warehouseAdd3` varchar(255) DEFAULT NULL,
  `warehouseTel` int(111) DEFAULT NULL,
  `warehouseTel2` int(111) DEFAULT NULL,
  `warehouseAdduserid` int(11) DEFAULT NULL,
  `warehouseAddDate` date DEFAULT NULL,
  `warehouseAddTime` time DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `wareEmail` varchar(255) DEFAULT NULL,
  `wareCountry` varchar(255) DEFAULT NULL,
  `openTime` varchar(255) DEFAULT NULL,
  `closeTime` varchar(255) DEFAULT NULL,
  `other1` int(11) DEFAULT NULL,
  `vehicale` varchar(255) DEFAULT 'no',
  PRIMARY KEY (`warehouseId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
