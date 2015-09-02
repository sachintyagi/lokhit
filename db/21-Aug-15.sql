CREATE TABLE IF NOT EXISTS `branches` (
`id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `code` varchar(20) DEFAULT NULL,
  `phone_no` varchar(11) NOT NULL,
  `mobile_no` varchar(13) NOT NULL,
  `address` varchar(500) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `pincode` int(6) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1=>Active,0=>Inactive',
  `created_by` int(11) NOT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE IF NOT EXISTS `companies` (
`id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `phone_no` varchar(11) NOT NULL,
  `mobile_no` varchar(13) NOT NULL,
  `address` varchar(500) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `pincode` int(6) NOT NULL,
  `logo` varchar(100) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1=>Active,0=>Inactive',
  `created_by` int(11) NOT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
`id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `code` varchar(4) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=233 ;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `code`, `status`) VALUES
(1, 'Andorra', 'AD', 1),
(2, 'Afghanistan', 'AF', 1),
(3, 'Antigua And Barbuda', 'AG', 1),
(4, 'Anguilla', 'AI', 1),
(5, 'Albania', 'AL', 1),
(6, 'Armenia', 'AM', 1),
(7, 'Angola', 'AO', 1),
(8, 'Argentina', 'AR', 1),
(9, 'Austria', 'AT', 1),
(10, 'Australia', 'AU', 1),
(11, 'Aruba', 'AW', 1),
(12, 'Azerbaijan', 'AZ', 1),
(13, 'Bosnia And Herzegovina', 'BA', 1),
(14, 'Barbados', 'BB', 1),
(15, 'Bangladesh', 'BD', 1),
(16, 'Belgium', 'BE', 1),
(17, 'Burkina faso', 'BF', 1),
(18, 'Bulgaria', 'BG', 1),
(19, 'Bahrain', 'BH', 1),
(20, 'Burundi', 'BI', 1),
(21, 'Benin', 'BJ', 1),
(22, 'Bermuda', 'BM', 1),
(23, 'Brunei Darussalam', 'BN', 1),
(24, 'Bolivia', 'BO', 1),
(25, 'Brazil', 'BR', 1),
(26, 'Bahamas', 'BS', 1),
(27, 'Bhutan', 'BT', 1),
(28, 'Botswana', 'BW', 1),
(29, 'Belarus', 'BY', 1),
(30, 'Belize', 'BZ', 1),
(31, 'Canada', 'CA', 1),
(32, 'Cocos (Keeling) Islands', 'CC', 1),
(33, 'Congo, The Democratic Republic Of The', 'CD', 1),
(34, 'Central African Republic', 'CF', 1),
(35, 'Congo', 'CG', 1),
(36, 'Switzerland', 'CH', 1),
(37, 'Cote d''ivoire', 'CI', 1),
(38, 'Cook islands', 'CK', 1),
(39, 'Chile', 'CL', 1),
(40, 'Cameroon', 'CM', 1),
(41, 'China', 'CN', 1),
(42, 'Colombia', 'CO', 1),
(43, 'Costa rica', 'CR', 1),
(44, 'Cuba', 'CU', 1),
(45, 'Cape verde', 'CV', 1),
(46, 'Christmas Island', 'CX', 1),
(47, 'Cyprus', 'CY', 1),
(48, 'Czech Republic', 'CZ', 1),
(49, 'Germany', 'DE', 1),
(50, 'Djibouti', 'DJ', 1),
(51, 'Denmark', 'DK', 1),
(52, 'Dominica', 'DM', 1),
(53, 'Dominican Republic', 'DO', 1),
(54, 'Algeria', 'DZ', 1),
(55, 'Ecuador', 'EC', 1),
(56, 'Estonia', 'EE', 1),
(57, 'Egypt', 'EG', 1),
(58, 'Western Sahara', 'EH', 1),
(59, 'Eritrea', 'ER', 1),
(60, 'Spain', 'ES', 1),
(61, 'Ethiopia', 'ET', 1),
(62, 'Finland', 'FI', 1),
(63, 'Fiji', 'FJ', 1),
(64, 'Falkland Islands (Malvinas)', 'FK', 1),
(65, 'Micronesia, Federated States Of', 'FM', 1),
(66, 'Faroe Islands', 'FO', 1),
(67, 'France', 'FR', 1),
(68, 'Gabon', 'GA', 1),
(69, 'United Kingdom', 'GB', 1),
(70, 'Grenada', 'GD', 1),
(71, 'Georgia', 'GE', 1),
(72, 'French Guiana', 'GF', 1),
(73, 'Guernsey', 'GG', 1),
(74, 'Ghana', 'GH', 1),
(75, 'Gibraltar', 'GI', 1),
(76, 'Greenland', 'GL', 1),
(77, 'Gambia', 'GM', 1),
(78, 'Guinea', 'GN', 1),
(79, 'Guadeloupe', 'GP', 1),
(80, 'Equatorial Guinea', 'GQ', 1),
(81, 'Greece', 'GR', 1),
(82, 'South Georgia And The South Sandwich Islands', 'GS', 1),
(83, 'Guatemala', 'GT', 1),
(84, 'Guinea-bissau', 'GW', 1),
(85, 'Guyana', 'GY', 1),
(86, 'Hong Kong', 'HK', 1),
(87, 'Honduras', 'HN', 1),
(88, 'Croatia', 'HR', 1),
(89, 'Haiti', 'HT', 1),
(90, 'Hungary', 'HU', 1),
(91, 'Indonesia', 'ID', 1),
(92, 'Ireland', 'IE', 1),
(93, 'Israel', 'IL', 1),
(94, 'Isle Of Man', 'IM', 1),
(95, 'India', 'IN', 1),
(96, 'Iraq', 'IQ', 1),
(97, 'Iran, Islamic Republic Of', 'IR', 1),
(98, 'Iceland', 'IS', 1),
(99, 'Italy', 'IT', 1),
(100, 'Jersey', 'JE', 1),
(101, 'Jamaica', 'JM', 1),
(102, 'Jordan', 'JO', 1),
(103, 'Japan', 'JP', 1),
(104, 'Kenya', 'KE', 1),
(105, 'Kyrgyzstan', 'KG', 1),
(106, 'Cambodia', 'KH', 1),
(107, 'Kiribati', 'KI', 1),
(108, 'Comoros', 'KM', 1),
(109, 'Saint Kitts And Nevis', 'KN', 1),
(110, 'Korea, Democratic People''s Republic Of', 'KP', 1),
(111, 'Korea, Republic Of', 'KR', 1),
(112, 'Kuwait', 'KW', 1),
(113, 'Cayman Islands', 'KY', 1),
(114, 'Kazakhstan', 'KZ', 1),
(115, 'Lao People''s Democratic Republic', 'LA', 1),
(116, 'Lebanon', 'LB', 1),
(117, 'Saint lucia', 'LC', 1),
(118, 'Liechtenstein', 'LI', 1),
(119, 'Sri lanka', 'LK', 1),
(120, 'Liberia', 'LR', 1),
(121, 'Lesotho', 'LS', 1),
(122, 'Lithuania', 'LT', 1),
(123, 'Luxembourg', 'LU', 1),
(124, 'Latvia', 'LV', 1),
(125, 'Libyan Arab Jamahiriya', 'LY', 1),
(126, 'Morocco', 'MA', 1),
(127, 'Monaco', 'MC', 1),
(128, 'Moldova, Republic Of', 'MD', 1),
(129, 'Montenegro', 'ME', 1),
(130, 'Madagascar', 'MG', 1),
(131, 'Marshall Islands', 'MH', 1),
(132, 'Macedonia', 'MK', 1),
(133, 'Mali', 'ML', 1),
(134, 'Myanmar', 'MM', 1),
(135, 'Mongolia', 'MN', 1),
(136, 'Macao', 'MO', 1),
(137, 'Northern Mariana Islands', 'MP', 1),
(138, 'Martinique', 'MQ', 1),
(139, 'Mauritania', 'MR', 1),
(140, 'Montserrat', 'MS', 1),
(141, 'Malta', 'MT', 1),
(142, 'Mauritius', 'MU', 1),
(143, 'Maldives', 'MV', 1),
(144, 'Malawi', 'MW', 1),
(145, 'Mexico', 'MX', 1),
(146, 'Malaysia', 'MY', 1),
(147, 'Mozambique', 'MZ', 1),
(148, 'Namibia', 'NA', 1),
(149, 'New Caledonia', 'NC', 1),
(150, 'Niger', 'NE', 1),
(151, 'Norfolk Island', 'NF', 1),
(152, 'Nigeria', 'NG', 1),
(153, 'Nicaragua', 'NI', 1),
(154, 'Netherlands', 'NL', 1),
(155, 'Norway', 'NO', 1),
(156, 'Nepal', 'NP', 1),
(157, 'Nauru', 'NR', 1),
(158, 'Niue', 'NU', 1),
(159, 'New Zealand', 'NZ', 1),
(160, 'Oman', 'OM', 1),
(161, 'Panama', 'PA', 1),
(162, 'Peru', 'PE', 1),
(163, 'French Polynesia', 'PF', 1),
(164, 'Papua New Guinea', 'PG', 1),
(165, 'Philippines', 'PH', 1),
(166, 'Pakistan', 'PK', 1),
(167, 'Poland', 'PL', 1),
(168, 'Saint Pierre And Miquelon', 'PM', 1),
(169, 'Pitcairn', 'PN', 1),
(170, 'Palestinian Territory', 'PS', 1),
(171, 'Portugal', 'PT', 1),
(172, 'Palau', 'PW', 1),
(173, 'Paraguay', 'PY', 1),
(174, 'Qatar', 'QA', 1),
(175, 'Reunion', 'RE', 1),
(176, 'Romania', 'RO', 1),
(177, 'Serbia', 'RS', 1),
(178, 'Russian Federation', 'RU', 1),
(179, 'Rwanda', 'RW', 1),
(180, 'Saudi Arabia', 'SA', 1),
(181, 'Solomon Islands', 'SB', 1),
(182, 'Seychelles', 'SC', 1),
(183, 'Sudan', 'SD', 1),
(184, 'Sweden', 'SE', 1),
(185, 'Singapore', 'SG', 1),
(186, 'Saint Helena', 'SH', 1),
(187, 'Slovenia', 'SI', 1),
(188, 'Svalbard And Jan Mayen', 'SJ', 1),
(189, 'Slovakia', 'SK', 1),
(190, 'Sierra Leone', 'SL', 1),
(191, 'San Marino', 'SM', 1),
(192, 'Senegal', 'SN', 1),
(193, 'Somalia', 'SO', 1),
(194, 'Suriname', 'SR', 1),
(195, 'Sao Tome And Principe', 'ST', 1),
(196, 'El Salvador', 'SV', 1),
(197, 'Syrian Arab Republic', 'SY', 1),
(198, 'Swaziland', 'SZ', 1),
(199, 'Turks And Caicos Islands', 'TC', 1),
(200, 'Chad', 'TD', 1),
(201, 'French Southern Territories', 'TF', 1),
(202, 'Togo', 'TG', 1),
(203, 'Thailand', 'TH', 1),
(204, 'Tajikistan', 'TJ', 1),
(205, 'Tokelau', 'TK', 1),
(206, 'Turkmenistan', 'TM', 1),
(207, 'Tunisia', 'TN', 1),
(208, 'Tonga', 'TO', 1),
(209, 'Turkey', 'TR', 1),
(210, 'Trinidad And Tobago', 'TT', 1),
(211, 'Tuvalu', 'TV', 1),
(212, 'Taiwan', 'TW', 1),
(213, 'Tanzania, United Republic Of', 'TZ', 1),
(214, 'Ukraine', 'UA', 1),
(215, 'Uganda', 'UG', 1),
(216, 'United Arab Emirates', 'AE', 1),
(217, 'United States', 'US', 1),
(218, 'Uruguay', 'UY', 1),
(219, 'Uzbekistan', 'UZ', 1),
(220, 'Saint Vincent And The Grenadines', 'VC', 1),
(221, 'Venezuela', 'VE', 1),
(222, 'Virgin Islands, British', 'VG', 1),
(223, 'Virgin Islands, U.S.', 'VI', 1),
(224, 'Vietnam', 'VN', 1),
(225, 'Vanuatu', 'VU', 1),
(226, 'Wallis And Futuna', 'WF', 1),
(227, 'Samoa', 'WS', 1),
(228, 'Yemen', 'YE', 1),
(229, 'Mayotte', 'YT', 1),
(230, 'South Africa', 'ZA', 1),
(231, 'Zambia', 'ZM', 1),
(232, 'Zimbabwe', 'ZW', 1);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE IF NOT EXISTS `employees` (
`id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `blood_group` varchar(5) DEFAULT NULL,
  `phone_no` varchar(11) NOT NULL,
  `mobile_no` varchar(13) NOT NULL,
  `father_name` varchar(100) NOT NULL,
  `mother_name` varchar(100) NOT NULL,
  `email_id` varchar(100) NOT NULL,
  `spouse_name` varchar(100) DEFAULT NULL,
  `company_id` int(11) NOT NULL,
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
  `per_phone_no` varchar(11) NOT NULL,
  `per_mobile_no` varchar(13) NOT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '0' COMMENT '1=>Active,0=>In Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `employee_educations`
--

CREATE TABLE IF NOT EXISTS `employee_educations` (
`id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `certificate` varchar(250) DEFAULT NULL,
  `university` varchar(250) DEFAULT NULL,
  `year` int(4) DEFAULT NULL,
  `percentage` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `employee_experiences`
--

CREATE TABLE IF NOT EXISTS `employee_experiences` (
`id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `previous_employer` varchar(200) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `employee_from` varchar(10) NOT NULL,
  `employee_to` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE IF NOT EXISTS `menus` (
`id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `iconurl` varchar(100) DEFAULT NULL,
  `is_navigation` tinyint(2) NOT NULL COMMENT '1=>Navigation,0=>Not',
  `active` tinyint(2) NOT NULL DEFAULT '0' COMMENT '1=>Active,0=>In Active',
  `created_at` datetime NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `description`, `parent_id`, `iconurl`, `is_navigation`, `active`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'Manage Members', 'Manage Members', 0, NULL, 0, 1, '2015-08-15 04:10:47', 0, NULL, NULL),
(2, 'Members', '', 1, NULL, 1, 1, '2015-08-15 04:25:23', 0, NULL, NULL),
(3, 'Manage Investments', 'Investments', 0, NULL, 1, 1, '2015-08-15 04:27:17', 0, NULL, NULL),
(4, 'Investors', '', 3, NULL, 1, 1, '2015-08-15 04:27:58', 0, NULL, NULL),
(5, 'New Installment', '', 3, NULL, 1, 1, '2015-08-15 04:28:54', 0, NULL, NULL),
(6, 'Manage Company', '', 0, NULL, 1, 1, '2015-08-15 04:29:30', 0, NULL, NULL),
(7, 'Companies', '', 6, NULL, 1, 1, '2015-08-15 04:30:02', 0, NULL, NULL),
(8, 'Branches', '', 6, NULL, 1, 1, '2015-08-15 04:30:37', 0, NULL, NULL),
(9, 'Manage Navigations', '', 0, NULL, 1, 1, '2015-08-15 04:31:21', 0, NULL, NULL),
(10, 'Menus', '', 9, NULL, 1, 1, '2015-08-15 04:32:16', 0, NULL, NULL),
(11, 'Manage Employee', '', 0, NULL, 1, 1, '2015-08-15 04:32:57', 0, NULL, NULL),
(12, 'Employees', '', 11, NULL, 1, 1, '2015-08-15 04:33:29', 0, NULL, NULL),
(13, 'Roles', '', 11, NULL, 1, 1, '2015-08-15 04:40:08', 0, NULL, NULL),
(14, 'Test', '', 7, NULL, 1, 1, '2015-08-16 09:08:41', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_permissions`
--

CREATE TABLE IF NOT EXISTS `role_permissions` (
`id` int(11) NOT NULL,
  `role_id` int(2) NOT NULL,
  `is_insert` tinyint(2) NOT NULL,
  `is_update` tinyint(2) NOT NULL,
  `is_delete` tinyint(2) NOT NULL,
  `is_view` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

drop table `states`;

--
-- Table structure for table `states`
--

CREATE TABLE IF NOT EXISTS `states` (
`id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `countryid` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`, `countryid`, `status`) VALUES
(1, 'Andhra Pradesh', 95, 1),
(2, 'Arunachal Pradesh', 95, 1),
(3, 'Andaman and Nicobar Islands', 95, 1),
(4, 'Assam', 95, 1),
(5, 'Bihar', 95, 1),
(6, 'Chandigarh', 95, 1),
(7, 'Chhattisgarh', 95, 1),
(8, 'Dadra and Nagar Haveli', 95, 1),
(9, 'Daman and Diu', 95, 1),
(10, 'Delhi', 95, 1),
(11, 'Goa', 95, 1),
(12, 'Gujarat', 95, 1),
(13, 'Haryana', 95, 1),
(14, 'Himachal Pradesh', 95, 1),
(15, 'Jammu and Kashmir', 95, 1),
(16, 'Jharkhand', 95, 1),
(17, 'Karnataka', 95, 1),
(18, 'Kerala', 95, 1),
(19, 'Lakshadweep', 95, 1),
(20, 'Madhya Pradesh', 95, 1),
(21, 'Maharashtra', 95, 1),
(22, 'Manipur', 95, 1),
(23, 'Meghalaya', 95, 1),
(24, 'Mizoram', 95, 1),
(25, 'Nagaland', 95, 1),
(26, 'Orissa', 95, 1),
(27, 'Pondicherry', 95, 1),
(28, 'Punjab', 95, 1),
(29, 'Rajasthan', 95, 1),
(30, 'Sikkim', 95, 1),
(31, 'Tamil Nadu', 95, 1),
(32, 'Telangana', 95, 1),
(33, 'Tripura', 95, 1),
(34, 'Uttaranchal', 95, 1),
(35, 'Uttar Pradesh', 95, 1),
(36, 'West Bengal', 95, 1);

-- --------------------------------------------------------

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `name_UNIQUE` (`name`), ADD UNIQUE KEY `code_UNIQUE` (`code`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `email_id` (`email_id`);

--
-- Indexes for table `employee_educations`
--
ALTER TABLE `employee_educations`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_experiences`
--
ALTER TABLE `employee_experiences`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_permissions`
--
ALTER TABLE `role_permissions`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=233;
--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `employee_educations`
--
ALTER TABLE `employee_educations`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `employee_experiences`
--
ALTER TABLE `employee_experiences`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `role_permissions`
--
ALTER TABLE `role_permissions`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;