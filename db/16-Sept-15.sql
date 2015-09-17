/*
SQLyog Enterprise - MySQL GUI v7.02 
MySQL - 5.5.36 : Database - lokhitnidhi
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`lokhitnidhi` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `lokhitnidhi`;

/*Table structure for table `employees` */

DROP TABLE IF EXISTS `employees`;

CREATE TABLE `employees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `introducer_code` varchar(20) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `employees` */

insert  into `employees`(`id`,`company_id`,`branch_id`,`role_id`,`introducer_code`,`firstname`,`lastname`,`employee_code`,`emailid`,`dob`,`gender`,`userid`,`password`,`gardian_name`,`gardian_relation`,`mobile_number`,`nominee_name`,`nominee_relation`,`nominee_address`,`country_id`,`state_id`,`city_id`,`address`,`member_id`,`status`,`created_at`,`created_by`,`updated_at`,`updated_by`,`is_deleted`) values (1,1,1,3,'2353456346','Shiv Kumar','Tyagi','100100000001','sktyagi12345@gmail.com','2015-09-01','Male','100100000001',NULL,'Surendra Tyagi',NULL,'9891274404','Mamta Tyagi','Wife','Test address',95,35,'Noida','This is address aaa','',1,'2015-09-16 21:10:27',1,'2015-09-17 00:40:27',1,0),(2,1,1,3,NULL,'Amit','Verma','100100000002','amitv@lokhitnidhi.com',NULL,'Male',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'100100000002',1,'2015-09-15 22:52:25',0,'2015-09-17 00:42:14',0,0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
