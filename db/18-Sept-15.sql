-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2015 at 03:56 AM
-- Server version: 5.5.36
-- PHP Version: 5.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lokhitnidhi`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE IF NOT EXISTS `employees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `introducer_code` varchar(20) DEFAULT NULL,
  `pan_number` varchar(20) DEFAULT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `employee_code` varchar(25) NOT NULL,
  `emailid` varchar(120) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` enum('Male','Female','Others') NOT NULL DEFAULT 'Male',
  `userid` varchar(20) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `gardian_name` varchar(100) DEFAULT NULL,
  `gardian_relation` varchar(50) DEFAULT NULL,
  `mobile_number` varchar(15) DEFAULT NULL,
  `nominee_name` varchar(100) DEFAULT NULL,
  `nominee_relation` varchar(100) DEFAULT NULL,
  `nominee_address` varchar(100) DEFAULT NULL,
  `country_id` int(11) DEFAULT '1',
  `state_id` int(11) DEFAULT NULL,
  `city_id` varchar(150) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `member_id` varchar(20) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL,
  `is_deleted` tinyint(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `employee_code` (`employee_code`),
  UNIQUE KEY `idx_members_customer_id` (`member_id`),
  UNIQUE KEY `member_id` (`member_id`),
  UNIQUE KEY `Unique_Member_Id` (`member_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `company_id`, `branch_id`, `role_id`, `introducer_code`, `pan_number`, `firstname`, `lastname`, `employee_code`, `emailid`, `dob`, `gender`, `userid`, `password`, `gardian_name`, `gardian_relation`, `mobile_number`, `nominee_name`, `nominee_relation`, `nominee_address`, `country_id`, `state_id`, `city_id`, `address`, `member_id`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`) VALUES
(1, 1, 1, 3, NULL, NULL, 'Shiv Kumar', 'Tyagi', '100100000001', 'sktyagi12345@gmail.com', NULL, 'Male', 'sktyagi', '827ccb0eea8a706c4c34a16891f84e7b', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 1, '2015-09-17 23:52:15', 0, '2015-09-17 18:22:29', 0, 0),
(2, 1, 1, 3, NULL, NULL, 'Amit', 'Verma', '100100000002', 'amitv@jmdlr.com', NULL, 'Male', 'amitv', '827ccb0eea8a706c4c34a16891f84e7b', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 1, '2015-09-17 23:52:15', 0, '2015-09-17 18:26:00', 0, 0),
(3, 1, 2, 3, NULL, NULL, 'Satyendra', 'Vashnov', '100200000001', 'satyendrav@jmdlr.com', NULL, 'Male', 'satyendrav', '827ccb0eea8a706c4c34a16891f84e7b', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, '2015-09-17 23:52:15', 0, '2015-09-17 18:26:01', 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
