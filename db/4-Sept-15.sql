alter table `member_investments` add column `employee_code` varchar(15) NULL after `end_date`;

DROP TABLE IF EXISTS `employees`;

CREATE TABLE `employees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(100) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `employee_code` varchar(10) DEFAULT NULL,
  `blood_group` varchar(5) DEFAULT NULL,
  `phone_no` varchar(11) NOT NULL,
  `mobile_no` varchar(13) NOT NULL,
  `father_name` varchar(100) NOT NULL,
  `mother_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `spouse_name` varchar(100) DEFAULT NULL,
  `company_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `address` varchar(250) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `pincode` varchar(6) NOT NULL,
  `per_address` varchar(250) NOT NULL,
  `per_city` varchar(100) NOT NULL,
  `per_state_id` int(11) NOT NULL,
  `per_country_id` int(11) NOT NULL,
  `per_pincode` int(6) DEFAULT NULL,
  `per_phone_no` varchar(11) DEFAULT NULL,
  `per_mobile_no` varchar(13) DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '0' COMMENT '1=>Active,0=>In Active',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_id` (`email`),
  UNIQUE KEY `user_id` (`user_id`),
  UNIQUE KEY `NewIndex1` (`employee_code`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

/*Data for the table `employees` */

insert  into `employees`(`id`,`user_id`,`password`,`first_name`,`last_name`,`employee_code`,`blood_group`,`phone_no`,`mobile_no`,`father_name`,`mother_name`,`email`,`spouse_name`,`company_id`,`role_id`,`branch_id`,`address`,`city`,`state_id`,`country_id`,`pincode`,`per_address`,`per_city`,`per_state_id`,`per_country_id`,`per_pincode`,`per_phone_no`,`per_mobile_no`,`photo`,`created_at`,`created_by`,`updated_at`,`updated_by`,`status`) values 
(1,'sktyagi','827ccb0eea8a706c4c34a16891f84e7b','Shiv Kumar','Tyagi','10010001','A+','24242424234','24242424234','Na','na','sktyagi12345@gmail.com','Na',1,2,1,'Na','Bijnor',1,95,'214141','Na','Na',35,95,2424242,'2532525252','2252525252',NULL,'2015-09-02 05:26:42',1,'2015-09-02 16:29:55',1,1),
(2,'amitv','827ccb0eea8a706c4c34a16891f84e7b','Amit','Verma','10010002','A+','32667325667','3578353578','na','na','amitvermabijnor@gmail.com','na',1,2,1,'na','Bijnor',2,95,'353635','sdg sg sgsg c','na',35,95,355252,'2525222525','23525252525',NULL,'2015-09-02 19:49:30',1,'2015-09-02 17:49:30',1,1),
(3,'SatyendraV','800c53a3a17d4bf63867ace27d0acede','Satyendra Kumar','Varshney','10020001','A+','98932434959','989324349593','na','na','satyendra_varshney@yahoo.com','na',1,3,2,'na','na',35,95,'214324','As same as abow','Chandoshi',35,95,214324,'21432424324','3243242',NULL,'2015-09-03 19:03:21',1,'2015-09-03 22:33:21',1,1),
(4,'sachint','827ccb0eea8a706c4c34a16891f84e7b','Sachin','Tyagi','10010003','A+','9891274404','9891274404','na','na','sachin.tyagirc@gmail.com','na',1,1,1,'na','na',35,95,'250001','na','Meerut',35,95,250001,'9891274404','9891274404',NULL,'2015-09-04 23:50:56',1,'2015-09-04 23:50:56',1,1);

