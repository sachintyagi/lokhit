
DROP TABLE IF EXISTS `employees`;

CREATE TABLE IF NOT EXISTS `employees` (
`id` int(11) NOT NULL,
  `user_id` varchar(100) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
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
  `status` tinyint(2) NOT NULL DEFAULT '0' COMMENT '1=>Active,0=>In Active'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

INSERT INTO `employees` (`id`, `user_id`, `password`, `first_name`, `last_name`, `blood_group`, `phone_no`, `mobile_no`, `father_name`, `mother_name`, `email`, `spouse_name`, `company_id`, `role_id`, `branch_id`, `address`, `city`, `state_id`, `country_id`, `pincode`, `per_address`, `per_city`, `per_state_id`, `per_country_id`, `per_pincode`, `per_phone_no`, `per_mobile_no`, `photo`, `created_at`, `created_by`, `updated_at`, `updated_by`, `status`) VALUES
(1, 'sachint', '827ccb0eea8a706c4c34a16891f84e7b', 'Sachin ', 'Tyagi', 'A+', '24242424234', '24242424234', 'Amit', 'Amita', 'sachin@in.com', 'Mamta', 1, 6, 1, 'Test Address', 'Delhi', 1, 95, '214141', 'Test', 'Delhi', 1, 95, 2424242, '2532525252', '2252525252', NULL, '2015-09-02 05:26:42', 1, '2015-09-02 16:29:55', 1, 1),
(3, 'amit', '', 'AAABB', 'Bbbbb', 'A+', '32667325667', '3578353578', 'DDDJ', 'MMMM', 'sfs@afflf.com', 'MMMaaa', 1, 4, 2, 'aaf af af a ', 'Cccccccccc', 2, 95, '353635', 'sdg sg sgsg c', 'Ddddddddddddd', 3, 95, 355252, '2525222525', '23525252525', NULL, '2015-09-02 19:49:30', 1, '2015-09-02 17:49:30', 1, 1);

ALTER TABLE `employees`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `email_id` (`email`), ADD UNIQUE KEY `user_id` (`user_id`);

ALTER TABLE `employees`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;

DROP TABLE IF EXISTS `users`;

alter table `employees` add column `employee_code` varchar(10) NULL after `last_name`;