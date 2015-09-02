INSERT INTO `lokhitnidhi`.`users` (`id`, `name`, `userid`, `password`, `email`, `address`, `role_id`, `branch_id`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`) VALUES (NULL, 'Satyendra Kumar Varshney', 'SatyendraV', '800c53a3a17d4bf63867ace27d0acede', 'satyendra_varshney@yahoo.com', NULL, '3', '2', '1', '2015-08-27 00:00:00', '1', CURRENT_TIMESTAMP, '1', '0');

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL,
  `is_deleted` tinyint(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

/*Data for the table `roles` */

insert  into `roles`(`id`,`name`,`status`,`created_at`,`created_by`,`updated_at`,`updated_by`,`is_deleted`) values (1,'Developer',1,'2015-07-09 09:15:20',1,'2015-09-02 16:13:28',1,0),(2,'Owner',1,'2015-07-09 09:15:20',1,'2015-09-02 16:13:30',1,0),(3,'Sale Manager',1,'2015-07-09 09:15:20',1,'2015-09-02 16:15:46',1,0),(4,'Sales Executive',1,'2015-07-09 09:15:20',1,'2015-09-02 16:14:53',1,0),(5,'Sales Officer',1,'2015-07-09 09:15:20',1,'2015-09-02 16:14:59',1,0),(6,'Marketing Executive',1,'2015-07-09 09:15:20',1,'2015-09-02 16:15:04',1,0),(7,'Marketing Officer',1,'2015-07-09 09:15:20',1,'2015-09-02 16:15:10',1,0),(8,'Development Executive',1,'2015-07-09 09:15:20',1,'2015-09-02 16:15:15',1,0),(9,'Development Manager',1,'2015-07-09 09:15:20',1,'2015-09-02 16:15:22',1,0),(10,'Regional Manager',1,'2015-07-09 09:15:20',1,'2015-09-02 16:15:27',1,0),(11,'Zonal Manager',1,'2015-07-09 09:15:20',1,'2015-09-02 16:15:33',1,0),(12,'Sr. Zonal Manager',1,'2015-07-09 09:15:20',1,'2015-09-02 16:15:38',1,0),(13,'Marketing Manager',1,'2015-09-02 16:14:10',1,'2015-09-02 16:15:44',1,0);

alter table `lokhitnidhi`.`roles` add column `sort` int(2) DEFAULT '1' NULL after `status`;

update `roles` set `id`='2',`name`='Owner',`status`='1',`sort`='2',`created_at`='2015-07-09 09:15:20',`created_by`='1',`updated_by`='1',`is_deleted`='0' where `id`='2';
update `roles` set `id`='3',`name`='Sale Master',`status`='1',`sort`='3',`created_at`='2015-07-09 09:15:20',`created_by`='1',`updated_by`='1',`is_deleted`='0' where `id`='3';
update `roles` set `id`='4',`name`='Sales Executive',`status`='1',`sort`='4',`created_at`='2015-07-09 09:15:20',`created_by`='1',`updated_by`='1',`is_deleted`='0' where `id`='4';
update `roles` set `id`='5',`name`='Sales Officer',`status`='1',`sort`='5',`created_at`='2015-07-09 09:15:20',`created_by`='1',`updated_by`='1',`is_deleted`='0' where `id`='5';
update `roles` set `id`='6',`name`='Marketing Executive',`status`='1',`sort`='6',`created_at`='2015-07-09 09:15:20',`created_by`='1',`updated_by`='1',`is_deleted`='0' where `id`='6';
update `roles` set `id`='7',`name`='Marketing Officer',`status`='1',`sort`='7',`created_at`='2015-07-09 09:15:20',`created_by`='1',`updated_by`='1',`is_deleted`='0' where `id`='7';
update `roles` set `id`='8',`name`='Development Executive',`status`='1',`sort`='8',`created_at`='2015-07-09 09:15:20',`created_by`='1',`updated_by`='1',`is_deleted`='0' where `id`='8';
update `roles` set `id`='9',`name`='Development Manager',`status`='1',`sort`='9',`created_at`='2015-07-09 09:15:20',`created_by`='1',`updated_by`='1',`is_deleted`='0' where `id`='9';
update `roles` set `id`='10',`name`='Regional Manager',`status`='1',`sort`='10',`created_at`='2015-07-09 09:15:20',`created_by`='1',`updated_by`='1',`is_deleted`='0' where `id`='10';
update `roles` set `id`='11',`name`='Zonal Manager',`status`='1',`sort`='11',`created_at`='2015-07-09 09:15:20',`created_by`='1',`updated_by`='1',`is_deleted`='0' where `id`='11';
update `roles` set `id`='12',`name`='Sr. Zonal Manager',`status`='1',`sort`='12',`created_at`='2015-07-09 09:15:20',`created_by`='1',`updated_by`='1',`is_deleted`='0' where `id`='12';
update `roles` set `id`='13',`name`='Marketing Manager',`status`='1',`sort`='13',`created_at`='2015-09-02 16:14:10',`created_by`='1',`updated_by`='1',`is_deleted`='0' where `id`='13';