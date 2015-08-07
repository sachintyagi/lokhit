ALTER TABLE `member_investments` ADD `deposit_amount` FLOAT(10,2) NULL DEFAULT NULL AFTER `start_ammount`;


CREATE TABLE IF NOT EXISTS `plans` (
`id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `status` tinyint(1) DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL,
  `is_deleted` tinyint(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `name`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`) VALUES
(1, 'FD', 1, '2015-07-02 19:25:24', 1, '2015-07-08 17:07:49', 1, 0),
(2, 'RD', 1, '2015-07-02 19:25:24', 1, '2015-07-08 17:07:49', 1, 0),
(3, 'DDS', 1, '2015-07-02 19:25:24', 1, '2015-08-01 15:44:17', 1, 0),
(4, 'MIS', 1, '2015-07-02 19:25:24', 1, '2015-08-01 15:44:14', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `plans_details`
--

CREATE TABLE IF NOT EXISTS `plans_details` (
`id` int(11) NOT NULL,
  `plan_id` int(11) DEFAULT NULL,
  `duration` varchar(10) DEFAULT NULL,
  `duration_type` varchar(1) NOT NULL DEFAULT 'M',
  `installment_type` varchar(255) DEFAULT NULL,
  `interest_rate` varchar(5) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL,
  `is_deleted` tinyint(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `plans_details`
--

INSERT INTO `plans_details` (`id`, `plan_id`, `duration`, `duration_type`, `installment_type`, `interest_rate`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`) VALUES
(1, 1, '12', 'M', 'One Time', '10.5', 1, '2015-07-09 08:52:37', 1, '2015-08-01 21:17:42', 1, 0),
(2, 1, '24', 'M', 'One Time', '11', 1, '2015-07-09 08:54:30', 1, '2015-08-01 21:17:47', 1, 0),
(3, 1, '36', 'M', 'One Time', '11.5', 1, '2015-07-09 08:54:31', 1, '2015-08-01 21:17:52', 1, 0),
(4, 1, '60', 'M', 'One Time', '12', 1, '2015-07-09 08:54:31', 1, '2015-08-01 21:18:16', 1, 0),
(5, 2, '36', 'M', 'Yearly', '12', 1, '2015-07-09 09:04:43', 1, '2015-08-01 21:54:51', 1, 0),
(6, 2, '36', 'M', 'Half Yearly', '12', 1, '2015-07-09 09:04:43', 1, '2015-08-01 21:54:51', 1, 0),
(7, 2, '36', 'M', 'Quaterly', '12', 1, '2015-07-09 09:04:43', 1, '2015-08-01 21:54:51', 1, 0),
(8, 2, '36', 'M', 'Monthly', '12', 1, '2015-07-09 09:04:43', 1, '2015-08-01 21:54:51', 1, 0),
(9, 2, '60', 'M', 'Yearly', '12.5', 1, '2015-07-09 09:04:43', 1, '2015-07-09 09:04:43', 1, 0),
(10, 2, '60', 'M', 'Half Yearly', '12.5', 1, '2015-07-09 09:04:43', 1, '2015-07-09 09:04:43', 1, 0),
(11, 2, '60', 'M', 'Quaterly', '12.5', 1, '2015-07-09 09:04:43', 1, '2015-07-09 09:04:43', 1, 0),
(12, 2, '60', 'M', 'Monthly', '12.5', 1, '2015-07-09 09:04:43', 1, '2015-07-09 09:04:43', 1, 0),
(13, 3, '365', 'D', 'Per Day', '5', 1, '2015-07-09 09:04:43', 1, '2015-07-09 09:04:43', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `plan_formula_test`
--

CREATE TABLE IF NOT EXISTS `plan_formula_test` (
`id` int(11) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `plan_details_id` int(11) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `deposit_amount` varchar(255) NOT NULL,
  `maturity_ammount` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=130 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `plan_formula_test`
--

INSERT INTO `plan_formula_test` (`id`, `plan_id`, `plan_details_id`, `amount`, `deposit_amount`, `maturity_ammount`) VALUES
(1, 1, 1, '1000', '1000', '1105'),
(2, 1, 1, '2000', '2000', '2210'),
(3, 1, 1, '5000', '5000', '5525'),
(4, 1, 1, '7500', '7500', '8287'),
(5, 1, 1, '10000', '10000', '11050'),
(6, 1, 1, '15000', '15000', '16575'),
(7, 1, 1, '20000', '20000', '22100'),
(8, 1, 1, '25000', '25000', '27625'),
(9, 1, 1, '50000', '50000', '55250'),
(10, 1, 1, '100000', '100000', '110500'),
(11, 1, 2, '1000', '1000', '1232'),
(12, 1, 2, '2000', '2000', '2464'),
(13, 1, 2, '5000', '5000', '6160'),
(14, 1, 2, '7500', '7500', '9240'),
(15, 1, 2, '10000', '10000', '12321'),
(16, 1, 2, '15000', '15000', '18481'),
(17, 1, 2, '20000', '20000', '24642'),
(18, 1, 2, '25000', '25000', '30802'),
(19, 1, 2, '50000', '50000', '61605'),
(20, 1, 2, '100000', '100000', '123210'),
(21, 1, 3, '1000', '1000', '1386'),
(22, 1, 3, '2000', '2000', '2772'),
(23, 1, 3, '5000', '5000', '6931'),
(24, 1, 3, '7500', '7500', '10396'),
(25, 1, 3, '10000', '10000', '13862'),
(26, 1, 3, '15000', '15000', '20793'),
(27, 1, 3, '20000', '20000', '27724'),
(28, 1, 3, '25000', '25000', '34655'),
(29, 1, 3, '50000', '50000', '69310'),
(30, 1, 4, '100000', '100000', '138620'),
(31, 1, 4, '1000', '1000', '1762'),
(32, 1, 4, '2000', '2000', '3524'),
(33, 1, 4, '5000', '5000', '8810'),
(34, 1, 4, '7500', '7500', '13215'),
(35, 1, 4, '10000', '10000', '17620'),
(36, 1, 4, '15000', '15000', '26430'),
(37, 1, 4, '20000', '20000', '35240'),
(38, 1, 4, '25000', '25000', '44050'),
(39, 1, 4, '50000', '50000', '88100'),
(40, 1, 4, '100000', '100000', '176200'),
(41, 2, 5, '1190', '3600', '4308'),
(42, 2, 5, '2380', '7200', '8616'),
(43, 2, 5, '3570', '10800', '12924'),
(44, 2, 5, '4760', '14400', '17232'),
(45, 2, 5, '5950', '18000', '21540'),
(46, 2, 5, '7140', '21600', '25884'),
(47, 2, 5, '8330', '25200', '30155'),
(48, 2, 5, '9520', '28800', '34463'),
(49, 2, 5, '10710', '32400', '38771'),
(50, 2, 5, '11900', '36000', '43079'),
(51, 2, 6, '595', '3600', '4308'),
(52, 2, 6, '1190', '7200', '8616'),
(53, 2, 6, '1785', '10800', '12924'),
(54, 2, 6, '2380', '14400', '17232'),
(55, 2, 6, '2975', '18000', '21540'),
(56, 2, 6, '3570', '21600', '25884'),
(57, 2, 6, '4165', '25200', '30155'),
(58, 2, 6, '4760', '28800', '34463'),
(59, 2, 6, '5355', '32400', '38771'),
(60, 2, 6, '5950', '36000', '43079'),
(61, 2, 7, '298', '3600', '4308'),
(62, 2, 7, '595', '7200', '8616'),
(63, 2, 7, '894', '10800', '12924'),
(64, 2, 7, '1192', '14400', '17232'),
(65, 2, 7, '1490', '18000', '21540'),
(66, 2, 7, '1788', '21600', '25884'),
(67, 2, 7, '2086', '25200', '30155'),
(68, 2, 7, '2384', '28800', '34463'),
(69, 2, 7, '2682', '32400', '38771'),
(70, 2, 7, '2980', '36000', '43079'),
(71, 2, 8, '100', '3600', '4308'),
(72, 2, 8, '200', '7200', '8616'),
(73, 2, 8, '300', '10800', '12924'),
(74, 2, 8, '400', '14400', '17232'),
(75, 2, 8, '500', '18000', '21540'),
(76, 2, 8, '600', '21600', '25884'),
(77, 2, 8, '700', '25200', '30155'),
(78, 2, 8, '800', '28800', '34463'),
(79, 2, 8, '900', '32400', '38771'),
(80, 2, 8, '1000', '36000', '43079'),
(81, 2, 9, '1190', '6000', '8211'),
(82, 2, 9, '2380', '12000', '8616'),
(83, 2, 9, '3570', '18000', '24634'),
(84, 2, 9, '4760', '24000', '32646'),
(85, 2, 9, '5950', '30000', '41047'),
(86, 2, 9, '7140', '36000', '49269'),
(87, 2, 9, '8330', '42000', '57480'),
(88, 2, 9, '9520', '48000', '65692'),
(89, 2, 9, '10710', '54000', '73903'),
(90, 2, 9, '11900', '60000', '82115'),
(91, 2, 10, '595', '6000', '8211'),
(92, 2, 10, '1190', '12000', '8616'),
(93, 2, 10, '1785', '18000', '24634'),
(94, 2, 10, '2380', '24000', '32646'),
(95, 2, 10, '2975', '30000', '41047'),
(96, 2, 10, '3570', '36000', '49269'),
(97, 2, 10, '4165', '42000', '57480'),
(98, 2, 10, '4760', '48000', '65692'),
(99, 2, 10, '5355', '54000', '73903'),
(100, 2, 10, '5950', '60000', '82115'),
(101, 2, 11, '298', '6000', '8211'),
(102, 2, 11, '596', '12000', '8616'),
(103, 2, 11, '894', '18000', '24634'),
(104, 2, 11, '1192', '24000', '32646'),
(105, 2, 11, '1490', '30000', '41047'),
(106, 2, 11, '1788', '36000', '49269'),
(107, 2, 11, '2086', '42000', '57480'),
(108, 2, 11, '2384', '48000', '65692'),
(109, 2, 11, '2682', '54000', '73903'),
(110, 2, 11, '2980', '60000', '82115'),
(111, 2, 12, '100', '6000', '8211'),
(112, 2, 12, '200', '12000', '8616'),
(113, 2, 12, '300', '18000', '24634'),
(114, 2, 12, '400', '24000', '32646'),
(115, 2, 12, '500', '30000', '41047'),
(116, 2, 12, '600', '36000', '49269'),
(117, 2, 12, '700', '42000', '57480'),
(118, 2, 12, '800', '48000', '65692'),
(119, 2, 12, '900', '54000', '73903'),
(120, 2, 12, '1000', '60000', '82115'),
(121, 3, 13, '100', '36500', '38325'),
(122, 3, 13, '200', '73000', '76650'),
(123, 3, 13, '300', '109500', '114975'),
(124, 3, 13, '400', '146000', '153300'),
(125, 3, 13, '500', '182500', '191625'),
(126, 3, 13, '600', '219000', '229950'),
(127, 3, 13, '700', '255500', '268275'),
(128, 3, 13, '900', '325500', '341775'),
(129, 3, 13, '1000', '365000', '383250');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plans_details`
--
ALTER TABLE `plans_details`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plan_formula_test`
--
ALTER TABLE `plan_formula_test`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `plans_details`
--
ALTER TABLE `plans_details`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `plan_formula_test`
--
ALTER TABLE `plan_formula_test`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=130;