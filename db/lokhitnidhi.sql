-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2015 at 07:13 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

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
-- Table structure for table `branches`
--

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
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `parent_id`, `company_id`, `name`, `code`, `phone_no`, `mobile_no`, `address`, `city`, `state_id`, `country_id`, `pincode`, `status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 1, 2, 'RST Noida', '111', '237892775', '234242', 'Test Addresss', 'Shamli', 3, 95, 35325352, 1, 0, '2015-08-06 06:02:44', 0, '2015-08-06 06:02:44'),
(2, 1, 2, 'RST Delhi', '112', '237892775', '234242', 'Test Addresss', 'Shamli', 3, 95, 35325352, 1, 0, '2015-08-06 06:03:31', 0, '2015-08-06 06:03:31'),
(3, 0, 2, 'Test', '113', '237892775', '234242', 'Test Addresss', 'Shamli', 3, 95, 35325352, 1, 0, '2015-08-06 06:05:10', 0, '2015-08-06 06:05:10'),
(4, 0, 5, 'Lokhit', '114', '237892775', '1241414', 'Test AAAA', 'Shamli', 2, 95, 35325352, 1, 0, '2015-08-21 02:51:07', 0, '2015-08-21 02:51:07'),
(5, 4, 5, 'Test11', '005115', '237892775', '234242', 'JSJSJ', 'Shamli', 2, 95, 35325352, 1, 0, '2015-08-21 05:09:15', 0, '2015-08-21 05:09:15');

-- --------------------------------------------------------

--
-- Table structure for table `branch_type`
--

CREATE TABLE IF NOT EXISTS `branch_type` (
`id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL,
  `is_deleted` tinyint(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `branch_type`
--

INSERT INTO `branch_type` (`id`, `name`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`) VALUES
(1, 'Head Branch', 1, '2015-07-08 16:48:05', 1, '2015-07-08 16:48:59', 1, 0),
(2, 'Sub Branch', 1, '2015-07-08 16:48:05', 1, '2015-07-08 16:48:59', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE IF NOT EXISTS `cities` (
`id` int(10) unsigned NOT NULL,
  `stateid` int(10) unsigned NOT NULL,
  `name` varchar(100) NOT NULL DEFAULT '',
  `status` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1466 ;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `stateid`, `name`, `status`) VALUES
(1, 1, 'Adilabad', 1),
(2, 1, 'Adoni', 1),
(3, 1, 'Amadalavalasa', 1),
(4, 1, 'Amalapuram', 1),
(5, 1, 'Anakapalle', 1),
(6, 1, 'Anantapur', 1),
(7, 1, 'Badepalle', 1),
(8, 1, 'Banganapalle', 1),
(9, 1, 'Bapatla', 1),
(10, 1, 'Bellampalle', 1),
(11, 1, 'Bethamcherla', 1),
(12, 1, 'Bhadrachalam', 1),
(13, 1, 'Bhainsa', 1),
(14, 1, 'Bheemunipatnam', 1),
(15, 1, 'Bhimavaram', 1),
(16, 1, 'Bhongir', 1),
(17, 1, 'Bobbili', 1),
(18, 1, 'Bodhan', 1),
(19, 1, 'Chilakaluripet', 1),
(20, 1, 'Chirala', 1),
(21, 1, 'Chittoor', 1),
(22, 1, 'Cuddapah', 1),
(23, 1, 'Devarakonda', 1),
(24, 1, 'Dharmavaram', 1),
(25, 1, 'Eluru', 1),
(26, 1, 'Farooqnagar', 1),
(27, 1, 'Gadwal', 1),
(28, 1, 'Gooty', 1),
(29, 1, 'Gudivada', 1),
(30, 1, 'Gudur', 1),
(31, 1, 'Guntakal', 1),
(32, 1, 'Guntur', 1),
(33, 1, 'Hanuman Junction', 1),
(34, 1, 'Hindupur', 1),
(35, 1, 'Hyderabad', 1),
(36, 1, 'Ichchapuram', 1),
(37, 1, 'Jaggaiahpet', 1),
(38, 1, 'Jagtial', 1),
(39, 1, 'Jammalamadugu', 1),
(40, 1, 'Jangaon', 1),
(41, 1, 'Kadapa', 1),
(42, 1, 'Kadiri', 1),
(43, 1, 'Kagaznagar', 1),
(44, 1, 'Kakinada', 1),
(45, 1, 'Kalyandurg', 1),
(46, 1, 'Kamareddy', 1),
(47, 1, 'Kandukur', 1),
(48, 1, 'Karimnagar', 1),
(49, 1, 'Kavali', 1),
(50, 1, 'Khammam', 1),
(51, 1, 'Koratla', 1),
(52, 1, 'Kothagudem', 1),
(53, 1, 'Kothapeta', 1),
(54, 1, 'Kovvur', 1),
(55, 1, 'Kurnool', 1),
(56, 1, 'Kyathampalle', 1),
(57, 1, 'Macherla', 1),
(58, 1, 'Machilipatnam', 1),
(59, 1, 'Madanapalle', 1),
(60, 1, 'Mahbubnagar', 1),
(61, 1, 'Mancherial', 1),
(62, 1, 'Mandamarri', 1),
(63, 1, 'Mandapeta', 1),
(64, 1, 'Manuguru', 1),
(65, 1, 'Markapur', 1),
(66, 1, 'Medak', 1),
(67, 1, 'Miryalaguda', 1),
(68, 1, 'Mogalthur', 1),
(69, 1, 'Nagari', 1),
(70, 1, 'Nagarkurnool', 1),
(71, 1, 'Nandyal', 1),
(72, 1, 'Narasapur', 1),
(73, 1, 'Narasaraopet', 1),
(74, 1, 'Narayanpet', 1),
(75, 1, 'Narsipatnam', 1),
(76, 1, 'Nellore', 1),
(77, 1, 'Nidadavole', 1),
(78, 1, 'Nirmal', 1),
(79, 1, 'Nizamabad', 1),
(80, 1, 'Nuzvid', 1),
(81, 1, 'Ongole', 1),
(82, 1, 'Palacole', 1),
(83, 1, 'Palasa Kasibugga', 1),
(84, 1, 'Palwancha', 1),
(85, 1, 'Parvathipuram', 1),
(86, 1, 'Pedana', 1),
(87, 1, 'Peddapuram', 1),
(88, 1, 'Pithapuram', 1),
(89, 1, 'Pondur', 1),
(90, 1, 'Ponnur', 1),
(91, 1, 'Proddatur', 1),
(92, 1, 'Punganur', 1),
(93, 1, 'Puttur', 1),
(94, 1, 'Rajahmundry', 1),
(95, 1, 'Rajam', 1),
(96, 1, 'Ramachandrapuram', 1),
(97, 1, 'Ramagundam', 1),
(98, 1, 'Rayachoti', 1),
(99, 1, 'Rayadurg', 1),
(100, 1, 'Renigunta', 1),
(101, 1, 'Repalle', 1),
(102, 1, 'Sadasivpet', 1),
(103, 1, 'Salur', 1),
(104, 1, 'Samalkot', 1),
(105, 1, 'Sangareddy', 1),
(106, 1, 'Sattenapalle', 1),
(107, 1, 'Siddipet', 1),
(108, 1, 'Singapur', 1),
(109, 1, 'Sircilla', 1),
(110, 1, 'Srikakulam', 1),
(111, 1, 'Srikalahasti', 1),
(112, 1, 'Suryapet', 1),
(113, 1, 'Tadepalligudem', 1),
(114, 1, 'Tadpatri', 1),
(115, 1, 'Tandur', 1),
(116, 1, 'Tanuku', 1),
(117, 1, 'Tenali', 1),
(118, 1, 'Tirupati', 1),
(119, 1, 'Tuni', 1),
(120, 1, 'Uravakonda', 1),
(121, 1, 'Venkatagiri', 1),
(122, 1, 'Vicarabad', 1),
(123, 1, 'Vijayawada', 1),
(124, 1, 'Vinukonda', 1),
(125, 1, 'Visakhapatnam', 1),
(126, 1, 'Vizianagaram', 1),
(127, 1, 'Wanaparthy', 1),
(128, 1, 'Warangal', 1),
(129, 1, 'Yellandu', 1),
(130, 1, 'Yemmiganur', 1),
(131, 1, 'Yerraguntla', 1),
(132, 1, 'Zahirabad', 1),
(133, 4, 'Abhayapuri', 1),
(134, 4, 'Amguri', 1),
(135, 4, 'Anandnagaar', 1),
(136, 4, 'Barpeta', 1),
(137, 4, 'Barpeta Road', 1),
(138, 4, 'Bilasipara', 1),
(139, 4, 'Bongaigaon', 1),
(140, 4, 'Dhekiajuli', 1),
(141, 4, 'Dhubri', 1),
(142, 4, 'Dibrugarh', 1),
(143, 4, 'Digboi', 1),
(144, 4, 'Diphu', 1),
(145, 4, 'Dispur', 1),
(146, 4, 'Gauripur', 1),
(147, 4, 'Goalpara', 1),
(148, 4, 'Golaghat', 1),
(149, 4, 'Guwahati', 1),
(150, 4, 'Haflong', 1),
(151, 4, 'Hailakandi', 1),
(152, 4, 'Hojai', 1),
(153, 4, 'Jorhat', 1),
(154, 4, 'Karimganj', 1),
(155, 4, 'Kokrajhar', 1),
(156, 4, 'Lanka', 1),
(157, 4, 'Lumding', 1),
(158, 4, 'Mangaldoi', 1),
(159, 4, 'Mankachar', 1),
(160, 4, 'Margherita', 1),
(161, 4, 'Mariani', 1),
(162, 4, 'Marigaon', 1),
(163, 4, 'Nagaon', 1),
(164, 4, 'Nalbari', 1),
(165, 4, 'North Lakhimpur', 1),
(166, 4, 'Rangia', 1),
(167, 4, 'Sibsagar', 1),
(168, 4, 'Silapathar', 1),
(169, 4, 'Silchar', 1),
(170, 4, 'Tezpur', 1),
(171, 4, 'Tinsukia', 1),
(172, 2, 'Along', 1),
(173, 2, 'Bomdila', 1),
(174, 2, 'Itanagar', 1),
(175, 2, 'Naharlagun', 1),
(176, 2, 'Pasighat', 1),
(177, 12, 'Ahmedabad', 1),
(178, 12, 'Amreli', 1),
(179, 12, 'Anand', 1),
(180, 12, 'Ankleshwar', 1),
(181, 12, 'Bharuch', 1),
(182, 12, 'Bhavnagar', 1),
(183, 12, 'Bhuj', 1),
(184, 12, 'Cambay', 1),
(185, 12, 'Dahod', 1),
(186, 12, 'Deesa', 1),
(187, 12, 'Dholka', 1),
(188, 12, 'Gandhinagar', 1),
(189, 12, 'Godhra', 1),
(190, 12, 'Himatnagar', 1),
(191, 12, 'Idar', 1),
(192, 12, 'Jamnagar', 1),
(193, 12, 'Junagadh', 1),
(194, 12, 'Kadi', 1),
(195, 12, 'Kalavad', 1),
(196, 12, 'Kalol', 1),
(197, 12, 'Kapadvanj', 1),
(198, 12, 'Karjan', 1),
(199, 12, 'Keshod', 1),
(200, 12, 'Khambhalia', 1),
(201, 12, 'Khambhat', 1),
(202, 12, 'Kheda', 1),
(203, 12, 'Khedbrahma', 1),
(204, 12, 'Kheralu', 1),
(205, 12, 'Kodinar', 1),
(206, 12, 'Lathi', 1),
(207, 12, 'Limbdi', 1),
(208, 12, 'Lunawada', 1),
(209, 12, 'Mahesana', 1),
(210, 12, 'Mahuva', 1),
(211, 12, 'Manavadar', 1),
(212, 12, 'Mandvi', 1),
(213, 12, 'Mangrol', 1),
(214, 12, 'Mansa', 1),
(215, 12, 'Mehmedabad', 1),
(216, 12, 'Modasa', 1),
(217, 12, 'Morvi', 1),
(218, 12, 'Nadiad', 1),
(219, 12, 'Navsari', 1),
(220, 12, 'Padra', 1),
(221, 12, 'Palanpur', 1),
(222, 12, 'Palitana', 1),
(223, 12, 'Pardi', 1),
(224, 12, 'Patan', 1),
(225, 12, 'Petlad', 1),
(226, 12, 'Porbandar', 1),
(227, 12, 'Radhanpur', 1),
(228, 12, 'Rajkot', 1),
(229, 12, 'Rajpipla', 1),
(230, 12, 'Rajula', 1),
(231, 12, 'Ranavav', 1),
(232, 12, 'Rapar', 1),
(233, 12, 'Salaya', 1),
(234, 12, 'Sanand', 1),
(235, 12, 'Savarkundla', 1),
(236, 12, 'Sidhpur', 1),
(237, 12, 'Sihor', 1),
(238, 12, 'Songadh', 1),
(239, 12, 'Surat', 1),
(240, 12, 'Talaja', 1),
(241, 12, 'Thangadh', 1),
(242, 12, 'Tharad', 1),
(243, 12, 'Umbergaon', 1),
(244, 12, 'Umreth', 1),
(245, 12, 'Una', 1),
(246, 12, 'Unjha', 1),
(247, 12, 'Upleta', 1),
(248, 12, 'Vadnagar', 1),
(249, 12, 'Vadodara', 1),
(250, 12, 'Valsad', 1),
(251, 12, 'Vapi', 1),
(252, 12, 'Vapi', 1),
(253, 12, 'Veraval', 1),
(254, 12, 'Vijapur', 1),
(255, 12, 'Viramgam', 1),
(256, 12, 'Visnagar', 1),
(257, 12, 'Vyara', 1),
(258, 12, 'Wadhwan', 1),
(259, 12, 'Wankaner', 1),
(260, 5, 'Amarpur', 1),
(261, 5, 'Araria', 1),
(262, 5, 'Areraj', 1),
(263, 5, 'Arrah', 1),
(264, 5, 'Asarganj', 1),
(265, 5, 'Aurangabad', 1),
(266, 5, 'Bagaha', 1),
(267, 5, 'Bahadurganj', 1),
(268, 5, 'Bairgania', 1),
(269, 5, 'Bakhtiarpur', 1),
(270, 5, 'Banka', 1),
(271, 5, 'Banmankhi Bazar', 1),
(272, 5, 'Barahiya', 1),
(273, 5, 'Barauli', 1),
(274, 5, 'Barbigha', 1),
(275, 5, 'Barh', 1),
(276, 5, 'Begusarai', 1),
(277, 5, 'Behea', 1),
(278, 5, 'Bettiah', 1),
(279, 5, 'Bhabua', 1),
(280, 5, 'Bhagalpur', 1),
(281, 5, 'Bihar Sharif', 1),
(282, 5, 'Bikramganj', 1),
(283, 5, 'Bodh Gaya', 1),
(284, 5, 'Buxar', 1),
(285, 5, 'Chandan Bara', 1),
(286, 5, 'Chanpatia', 1),
(287, 5, 'Chhapra', 1),
(288, 5, 'Colgong', 1),
(289, 5, 'Dalsinghsarai', 1),
(290, 5, 'Darbhanga', 1),
(291, 5, 'Daudnagar', 1),
(292, 5, 'Dehri-on-Sone', 1),
(293, 5, 'Dhaka', 1),
(294, 5, 'Dighwara', 1),
(295, 5, 'Dumraon', 1),
(296, 5, 'Fatwah', 1),
(297, 5, 'Forbesganj', 1),
(298, 5, 'Gaya', 1),
(299, 5, 'Gogri Jamalpur', 1),
(300, 5, 'Gopalganj', 1),
(301, 5, 'Hajipur', 1),
(302, 5, 'Hilsa', 1),
(303, 5, 'Hisua', 1),
(304, 5, 'Islampur', 1),
(305, 5, 'Jagdispur', 1),
(306, 5, 'Jamalpur', 1),
(307, 5, 'Jamui', 1),
(308, 5, 'Jehanabad', 1),
(309, 5, 'Jhajha', 1),
(310, 5, 'Jhanjharpur', 1),
(311, 5, 'Jogabani', 1),
(312, 5, 'Kanti', 1),
(313, 5, 'Katihar', 1),
(314, 5, 'Khagaria', 1),
(315, 5, 'Kharagpur', 1),
(316, 5, 'Kishanganj', 1),
(317, 5, 'Lakhisarai', 1),
(318, 5, 'Lalganj', 1),
(319, 5, 'Madhepura', 1),
(320, 5, 'Madhubani', 1),
(321, 5, 'Maharajganj', 1),
(322, 5, 'Mahnar Bazar', 1),
(323, 5, 'Makhdumpur', 1),
(324, 5, 'Maner', 1),
(325, 5, 'Manihari', 1),
(326, 5, 'Marhaura', 1),
(327, 5, 'Masaurhi', 1),
(328, 5, 'Mirganj', 1),
(329, 5, 'Mokameh', 1),
(330, 5, 'Motihari', 1),
(331, 5, 'Motipur', 1),
(332, 5, 'Munger', 1),
(333, 5, 'Murliganj', 1),
(334, 5, 'Muzaffarpur', 1),
(335, 5, 'Narkatiaganj', 1),
(336, 5, 'Naugachhia', 1),
(337, 5, 'Nawada', 1),
(338, 5, 'Nokha', 1),
(339, 5, 'Patna', 1),
(340, 5, 'Piro', 1),
(341, 5, 'Purnia', 1),
(342, 5, 'Rafiganj', 1),
(343, 5, 'Rajgir', 1),
(344, 5, 'Ramnagar', 1),
(345, 5, 'Raxaul Bazar', 1),
(346, 5, 'Revelganj', 1),
(347, 5, 'Rosera', 1),
(348, 5, 'Saharsa', 1),
(349, 5, 'Samastipur', 1),
(350, 5, 'Sasaram', 1),
(351, 5, 'Sheikhpura', 1),
(352, 5, 'Sheohar', 1),
(353, 5, 'Sherghati', 1),
(354, 5, 'Silao', 1),
(355, 5, 'Sitamarhi', 1),
(356, 5, 'Siwan', 1),
(357, 5, 'Sonepur', 1),
(358, 5, 'Sugauli', 1),
(359, 5, 'Sultanganj', 1),
(360, 5, 'Supaul', 1),
(361, 5, 'Warisaliganj', 1),
(362, 13, 'Ambala', 1),
(363, 13, 'Ambala', 1),
(364, 13, 'Asankhurd', 1),
(365, 13, 'Assandh', 1),
(366, 13, 'Ateli', 1),
(367, 13, 'Babiyal', 1),
(368, 13, 'Bahadurgarh', 1),
(369, 13, 'Barwala', 1),
(370, 13, 'Bhiwani', 1),
(371, 13, 'Charkhi Dadri', 1),
(372, 13, 'Cheeka', 1),
(373, 13, 'Ellenabad 2', 1),
(374, 13, 'Faridabad', 1),
(375, 13, 'Fatehabad', 1),
(376, 13, 'Ganaur', 1),
(377, 13, 'Gharaunda', 1),
(378, 13, 'Gohana', 1),
(379, 13, 'Gurgaon', 1),
(380, 13, 'Haibat(Yamuna Nagar)', 1),
(381, 13, 'Hansi', 1),
(382, 13, 'Hisar', 1),
(383, 13, 'Hodal', 1),
(384, 13, 'Jhajjar', 1),
(385, 13, 'Jind', 1),
(386, 13, 'Kaithal', 1),
(387, 13, 'Kalan Wali', 1),
(388, 13, 'Kalka', 1),
(389, 13, 'Karnal', 1),
(390, 13, 'Ladwa', 1),
(391, 13, 'Mahendragarh', 1),
(392, 13, 'Mandi Dabwali', 1),
(393, 13, 'Narnaul', 1),
(394, 13, 'Narwana', 1),
(395, 13, 'Palwal', 1),
(396, 13, 'Panchkula', 1),
(397, 13, 'Panipat', 1),
(398, 13, 'Pehowa', 1),
(399, 13, 'Pinjore', 1),
(400, 13, 'Rania', 1),
(401, 13, 'Ratia', 1),
(402, 13, 'Rewari', 1),
(403, 13, 'Rohtak', 1),
(404, 13, 'Safidon', 1),
(405, 13, 'Samalkha', 1),
(406, 13, 'Shahbad', 1),
(407, 13, 'Sirsa', 1),
(408, 13, 'Sohna', 1),
(409, 13, 'Sonipat', 1),
(410, 13, 'Taraori', 1),
(411, 13, 'Thanesar', 1),
(412, 13, 'Tohana', 1),
(413, 13, 'Yamunanagar', 1),
(414, 14, 'Arki', 1),
(415, 14, 'Baddi', 1),
(416, 14, 'Bilaspur', 1),
(417, 14, 'Chamba', 1),
(418, 14, 'Dalhousie', 1),
(419, 14, 'Dharamsala', 1),
(420, 14, 'Hamirpur', 1),
(421, 14, 'Mandi', 1),
(422, 14, 'Nahan', 1),
(423, 14, 'Shimla', 1),
(424, 14, 'Solan', 1),
(425, 14, 'Sundarnagar', 1),
(426, 15, 'Achabbal', 1),
(427, 15, 'Akhnoor', 1),
(428, 15, 'Anantnag', 1),
(429, 15, 'Arnia', 1),
(430, 15, 'Awantipora', 1),
(431, 15, 'Bandipore', 1),
(432, 15, 'Baramula', 1),
(433, 15, 'Kathua', 1),
(434, 15, 'Leh', 1),
(435, 15, 'Punch', 1),
(436, 15, 'Rajauri', 1),
(437, 15, 'Sopore', 1),
(438, 15, 'Srinagar', 1),
(439, 15, 'Udhampur', 1),
(440, 17, 'Arasikere', 1),
(441, 17, 'Bangalore', 1),
(442, 17, 'Belgaum', 1),
(443, 17, 'Bellary', 1),
(444, 17, 'Chamrajnagar', 1),
(445, 17, 'Chikkaballapur', 1),
(446, 17, 'Chintamani', 1),
(447, 17, 'Chitradurga', 1),
(448, 17, 'Gulbarga', 1),
(449, 17, 'Gundlupet', 1),
(450, 17, 'Hassan', 1),
(451, 17, 'Hospet', 1),
(452, 17, 'Hubli', 1),
(453, 17, 'Karkala', 1),
(454, 17, 'Karwar', 1),
(455, 17, 'Kolar', 1),
(456, 17, 'Kota', 1),
(457, 17, 'Lakshmeshwar', 1),
(458, 17, 'Lingsugur', 1),
(459, 17, 'Maddur', 1),
(460, 17, 'Madhugiri', 1),
(461, 17, 'Madikeri', 1),
(462, 17, 'Magadi', 1),
(463, 17, 'Mahalingpur', 1),
(464, 17, 'Malavalli', 1),
(465, 17, 'Malur', 1),
(466, 17, 'Mandya', 1),
(467, 17, 'Mangalore', 1),
(468, 17, 'Manvi', 1),
(469, 17, 'Mudalgi', 1),
(470, 17, 'Mudbidri', 1),
(471, 17, 'Muddebihal', 1),
(472, 17, 'Mudhol', 1),
(473, 17, 'Mulbagal', 1),
(474, 17, 'Mundargi', 1),
(475, 17, 'Mysore', 1),
(476, 17, 'Nanjangud', 1),
(477, 17, 'Pavagada', 1),
(478, 17, 'Puttur', 1),
(479, 17, 'Rabkavi Banhatti', 1),
(480, 17, 'Raichur', 1),
(481, 17, 'Ramanagaram', 1),
(482, 17, 'Ramdurg', 1),
(483, 17, 'Ranibennur', 1),
(484, 17, 'Robertson Pet', 1),
(485, 17, 'Ron', 1),
(486, 17, 'Sadalgi', 1),
(487, 17, 'Sagar', 1),
(488, 17, 'Sakleshpur', 1),
(489, 17, 'Sandur', 1),
(490, 17, 'Sankeshwar', 1),
(491, 17, 'Saundatti-Yellamma', 1),
(492, 17, 'Savanur', 1),
(493, 17, 'Sedam', 1),
(494, 17, 'Shahabad', 1),
(495, 17, 'Shahpur', 1),
(496, 17, 'Shiggaon', 1),
(497, 17, 'Shikapur', 1),
(498, 17, 'Shimoga', 1),
(499, 17, 'Shorapur', 1),
(500, 17, 'Shrirangapattana', 1),
(501, 17, 'Sidlaghatta', 1),
(502, 17, 'Sindgi', 1),
(503, 17, 'Sindhnur', 1),
(504, 17, 'Sira', 1),
(505, 17, 'Sirsi', 1),
(506, 17, 'Siruguppa', 1),
(507, 17, 'Srinivaspur', 1),
(508, 17, 'Talikota', 1),
(509, 17, 'Tarikere', 1),
(510, 17, 'Tekkalakota', 1),
(511, 17, 'Terdal', 1),
(512, 17, 'Tiptur', 1),
(513, 17, 'Tumkur', 1),
(514, 17, 'Udupi', 1),
(515, 17, 'Vijayapura', 1),
(516, 17, 'Wadi', 1),
(517, 17, 'Yadgir', 1),
(518, 17, 'Chikmagalur', 1),
(519, 17, 'Davanagere', 1),
(520, 17, 'Dharwad', 1),
(521, 17, 'Gadag', 1),
(522, 18, 'Adoor', 1),
(523, 18, 'Akathiyoor', 1),
(524, 18, 'Alappuzha', 1),
(525, 18, 'Ancharakandy', 1),
(526, 18, 'Aroor', 1),
(527, 18, 'Ashtamichira', 1),
(528, 18, 'Attingal', 1),
(529, 18, 'Avinissery', 1),
(530, 18, 'Chalakudy', 1),
(531, 18, 'Changanassery', 1),
(532, 18, 'Chendamangalam', 1),
(533, 18, 'Chengannur', 1),
(534, 18, 'Cherthala', 1),
(535, 18, 'Cheruthazham', 1),
(536, 18, 'Chittur-Thathamangalam', 1),
(537, 18, 'Chockli', 1),
(538, 18, 'Erattupetta', 1),
(539, 18, 'Guruvayoor', 1),
(540, 18, 'Irinjalakuda', 1),
(541, 18, 'Kadirur', 1),
(542, 18, 'Kalliasseri', 1),
(543, 18, 'Kalpetta', 1),
(544, 18, 'Kanhangad', 1),
(545, 18, 'Kanjikkuzhi', 1),
(546, 18, 'Kannur', 1),
(547, 18, 'Kasaragod', 1),
(548, 18, 'Kayamkulam', 1),
(549, 18, 'Kochi', 1),
(550, 18, 'Kodungallur', 1),
(551, 18, 'Kollam', 1),
(552, 18, 'Koothuparamba', 1),
(553, 18, 'Kothamangalam', 1),
(554, 18, 'Kottayam', 1),
(555, 18, 'Kozhikode', 1),
(556, 18, 'Kunnamkulam', 1),
(557, 18, 'Malappuram', 1),
(558, 18, 'Mattannur', 1),
(559, 18, 'Mavelikkara', 1),
(560, 18, 'Mavoor', 1),
(561, 18, 'Muvattupuzha', 1),
(562, 18, 'Nedumangad', 1),
(563, 18, 'Neyyattinkara', 1),
(564, 18, 'Ottappalam', 1),
(565, 18, 'Palai', 1),
(566, 18, 'Palakkad', 1),
(567, 18, 'Panniyannur', 1),
(568, 18, 'Pappinisseri', 1),
(569, 18, 'Paravoor', 1),
(570, 18, 'Pathanamthitta', 1),
(571, 18, 'Payyannur', 1),
(572, 18, 'Peringathur', 1),
(573, 18, 'Perinthalmanna', 1),
(574, 18, 'Perumbavoor', 1),
(575, 18, 'Ponnani', 1),
(576, 18, 'Punalur', 1),
(577, 18, 'Quilandy', 1),
(578, 18, 'Shoranur', 1),
(579, 18, 'Taliparamba', 1),
(580, 18, 'Thiruvalla', 1),
(581, 18, 'Thiruvananthapuram', 1),
(582, 18, 'Thodupuzha', 1),
(583, 18, 'Thrissur', 1),
(584, 18, 'Tirur', 1),
(585, 18, 'Vadakara', 1),
(586, 18, 'Vaikom', 1),
(587, 18, 'Varkala', 1),
(588, 20, 'Ashok Nagar', 1),
(589, 20, 'Balaghat', 1),
(590, 20, 'Betul', 1),
(591, 20, 'Bhopal', 1),
(592, 20, 'Burhanpur', 1),
(593, 20, 'Chhatarpur', 1),
(594, 20, 'Dabra', 1),
(595, 20, 'Datia', 1),
(596, 20, 'Dewas', 1),
(597, 20, 'Dhar', 1),
(598, 20, 'Fatehabad', 1),
(599, 20, 'Gwalior', 1),
(600, 20, 'Indore', 1),
(601, 20, 'Itarsi', 1),
(602, 20, 'Jabalpur', 1),
(603, 20, 'Katni', 1),
(604, 20, 'Kotma', 1),
(605, 20, 'Lahar', 1),
(606, 20, 'Lundi', 1),
(607, 20, 'Maharajpur', 1),
(608, 20, 'Mahidpur', 1),
(609, 20, 'Maihar', 1),
(610, 20, 'Malajkhand', 1),
(611, 20, 'Manasa', 1),
(612, 20, 'Manawar', 1),
(613, 20, 'Mandideep', 1),
(614, 20, 'Mandla', 1),
(615, 20, 'Mandsaur', 1),
(616, 20, 'Mauganj', 1),
(617, 20, 'Mhow Cantonment', 1),
(618, 20, 'Mhowgaon', 1),
(619, 20, 'Morena', 1),
(620, 20, 'Multai', 1),
(621, 20, 'Murwara', 1),
(622, 20, 'Nagda', 1),
(623, 20, 'Nainpur', 1),
(624, 20, 'Narsinghgarh', 1),
(625, 20, 'Narsinghgarh', 1),
(626, 20, 'Neemuch', 1),
(627, 20, 'Nepanagar', 1),
(628, 20, 'Niwari', 1),
(629, 20, 'Nowgong', 1),
(630, 20, 'Nowrozabad', 1),
(631, 20, 'Pachore', 1),
(632, 20, 'Pali', 1),
(633, 20, 'Panagar', 1),
(634, 20, 'Pandhurna', 1),
(635, 20, 'Panna', 1),
(636, 20, 'Pasan', 1),
(637, 20, 'Pipariya', 1),
(638, 20, 'Pithampur', 1),
(639, 20, 'Porsa', 1),
(640, 20, 'Prithvipur', 1),
(641, 20, 'Raghogarh-Vijaypur', 1),
(642, 20, 'Rahatgarh', 1),
(643, 20, 'Raisen', 1),
(644, 20, 'Rajgarh', 1),
(645, 20, 'Ratlam', 1),
(646, 20, 'Rau', 1),
(647, 20, 'Rehli', 1),
(648, 20, 'Rewa', 1),
(649, 20, 'Sabalgarh', 1),
(650, 20, 'Sagar', 1),
(651, 20, 'Sanawad', 1),
(652, 20, 'Sarangpur', 1),
(653, 20, 'Sarni', 1),
(654, 20, 'Satna', 1),
(655, 20, 'Sausar', 1),
(656, 20, 'Sehore', 1),
(657, 20, 'Sendhwa', 1),
(658, 20, 'Seoni', 1),
(659, 20, 'Seoni-Malwa', 1),
(660, 20, 'Shahdol', 1),
(661, 20, 'Shajapur', 1),
(662, 20, 'Shamgarh', 1),
(663, 20, 'Sheopur', 1),
(664, 20, 'Shivpuri', 1),
(665, 20, 'Shujalpur', 1),
(666, 20, 'Sidhi', 1),
(667, 20, 'Sihora', 1),
(668, 20, 'Singrauli', 1),
(669, 20, 'Sironj', 1),
(670, 20, 'Sohagpur', 1),
(671, 20, 'Tarana', 1),
(672, 20, 'Tikamgarh', 1),
(673, 20, 'Ujhani', 1),
(674, 20, 'Ujjain', 1),
(675, 20, 'Umaria', 1),
(676, 20, 'Vidisha', 1),
(677, 20, 'Wara Seoni', 1),
(678, 21, 'Kolhapur', 1),
(679, 21, 'Ahmednagar', 1),
(680, 21, 'Akola', 1),
(681, 21, 'Amravati', 1),
(682, 21, 'Aurangabad', 1),
(683, 21, 'Baramati', 1),
(684, 21, 'Chalisgaon', 1),
(685, 21, 'Chinchani', 1),
(686, 21, 'Devgarh', 1),
(687, 21, 'Dhule', 1),
(688, 21, 'Dombivli', 1),
(689, 21, 'Durgapur', 1),
(690, 21, 'Ichalkaranji', 1),
(691, 21, 'Jalna', 1),
(692, 21, 'Kalyan', 1),
(693, 21, 'Latur', 1),
(694, 21, 'Loha', 1),
(695, 21, 'Lonar', 1),
(696, 21, 'Lonavla', 1),
(697, 21, 'Mahad', 1),
(698, 21, 'Mahuli', 1),
(699, 21, 'Malegaon', 1),
(700, 21, 'Malkapur', 1),
(701, 21, 'Manchar', 1),
(702, 21, 'Mangalvedhe', 1),
(703, 21, 'Mangrulpir', 1),
(704, 21, 'Manjlegaon', 1),
(705, 21, 'Manmad', 1),
(706, 21, 'Manwath', 1),
(707, 21, 'Mehkar', 1),
(708, 21, 'Mhaswad', 1),
(709, 21, 'Miraj', 1),
(710, 21, 'Morshi', 1),
(711, 21, 'Mukhed', 1),
(712, 21, 'Mul', 1),
(713, 21, 'Mumbai', 1),
(714, 21, 'Murtijapur', 1),
(715, 21, 'Nagpur', 1),
(716, 21, 'Nalasopara', 1),
(717, 21, 'Nanded-Waghala', 1),
(718, 21, 'Nandgaon', 1),
(719, 21, 'Nandura', 1),
(720, 21, 'Nandurbar', 1),
(721, 21, 'Narkhed', 1),
(722, 21, 'Nashik', 1),
(723, 21, 'Navi Mumbai', 1),
(724, 21, 'Nawapur', 1),
(725, 21, 'Nilanga', 1),
(726, 21, 'Osmanabad', 1),
(727, 21, 'Ozar', 1),
(728, 21, 'Pachora', 1),
(729, 21, 'Paithan', 1),
(730, 21, 'Palghar', 1),
(731, 21, 'Pandharkaoda', 1),
(732, 21, 'Pandharpur', 1),
(733, 21, 'Panvel', 1),
(734, 21, 'Parbhani', 1),
(735, 21, 'Parli', 1),
(736, 21, 'Parola', 1),
(737, 21, 'Partur', 1),
(738, 21, 'Pathardi', 1),
(739, 21, 'Pathri', 1),
(740, 21, 'Patur', 1),
(741, 21, 'Pauni', 1),
(742, 21, 'Pen', 1),
(743, 21, 'Phaltan', 1),
(744, 21, 'Pulgaon', 1),
(745, 21, 'Pune', 1),
(746, 21, 'Purna', 1),
(747, 21, 'Pusad', 1),
(748, 21, 'Rahuri', 1),
(749, 21, 'Rajura', 1),
(750, 21, 'Ramtek', 1),
(751, 21, 'Ratnagiri', 1),
(752, 21, 'Raver', 1),
(753, 21, 'Risod', 1),
(754, 21, 'Sailu', 1),
(755, 21, 'Sangamner', 1),
(756, 21, 'Sangli', 1),
(757, 21, 'Sangole', 1),
(758, 21, 'Sasvad', 1),
(759, 21, 'Satana', 1),
(760, 21, 'Satara', 1),
(761, 21, 'Savner', 1),
(762, 21, 'Sawantwadi', 1),
(763, 21, 'Shahade', 1),
(764, 21, 'Shegaon', 1),
(765, 21, 'Shendurjana', 1),
(766, 21, 'Shirdi', 1),
(767, 21, 'Shirpur-Warwade', 1),
(768, 21, 'Shirur', 1),
(769, 21, 'Shrigonda', 1),
(770, 21, 'Shrirampur', 1),
(771, 21, 'Sillod', 1),
(772, 21, 'Sinnar', 1),
(773, 21, 'Solapur', 1),
(774, 21, 'Soyagaon', 1),
(775, 21, 'Talegaon Dabhade', 1),
(776, 21, 'Talode', 1),
(777, 21, 'Tasgaon', 1),
(778, 21, 'Tirora', 1),
(779, 21, 'Tuljapur', 1),
(780, 21, 'Tumsar', 1),
(781, 21, 'Uran', 1),
(782, 21, 'Uran Islampur', 1),
(783, 21, 'Wadgaon Road', 1),
(784, 21, 'Wai', 1),
(785, 21, 'Wani', 1),
(786, 21, 'Wardha', 1),
(787, 21, 'Warora', 1),
(788, 21, 'Warud', 1),
(789, 21, 'Washim', 1),
(790, 21, 'Yevla', 1),
(791, 22, 'Kakching', 1),
(792, 22, 'Lilong', 1),
(793, 22, 'Mayang Imphal', 1),
(794, 22, 'Thoubal', 1),
(795, 23, 'Jowai', 1),
(796, 23, 'Nongstoin', 1),
(797, 23, 'Shillong', 1),
(798, 23, 'Tura', 1),
(799, 24, 'Aizawl', 1),
(800, 24, 'Champhai', 1),
(801, 24, 'Lunglei', 1),
(802, 24, 'Saiha', 1),
(803, 25, 'Dimapur', 1),
(804, 25, 'Kohima', 1),
(805, 25, 'Mokokchung', 1),
(806, 25, 'Tuensang', 1),
(807, 25, 'Wokha', 1),
(808, 25, 'Zunheboto', 1),
(809, 26, 'Anandapur', 1),
(810, 26, 'Anugul', 1),
(811, 26, 'Asika', 1),
(812, 26, 'Balangir', 1),
(813, 26, 'Balasore', 1),
(814, 26, 'Baleshwar', 1),
(815, 26, 'Bamra', 1),
(816, 26, 'Barbil', 1),
(817, 26, 'Bargarh', 1),
(818, 26, 'Bargarh', 1),
(819, 26, 'Baripada', 1),
(820, 26, 'Basudebpur', 1),
(821, 26, 'Belpahar', 1),
(822, 26, 'Bhadrak', 1),
(823, 26, 'Bhawanipatna', 1),
(824, 26, 'Bhuban', 1),
(825, 26, 'Bhubaneswar', 1),
(826, 26, 'Biramitrapur', 1),
(827, 26, 'Brahmapur', 1),
(828, 26, 'Brajrajnagar', 1),
(829, 26, 'Byasanagar', 1),
(830, 26, 'Cuttack', 1),
(831, 26, 'Debagarh', 1),
(832, 26, 'Dhenkanal', 1),
(833, 26, 'Gunupur', 1),
(834, 26, 'Hinjilicut', 1),
(835, 26, 'Jagatsinghapur', 1),
(836, 26, 'Jajapur', 1),
(837, 26, 'Jaleswar', 1),
(838, 26, 'Jatani', 1),
(839, 26, 'Jeypur', 1),
(840, 26, 'Jharsuguda', 1),
(841, 26, 'Joda', 1),
(842, 26, 'Kantabanji', 1),
(843, 26, 'Karanjia', 1),
(844, 26, 'Kendrapara', 1),
(845, 26, 'Kendujhar', 1),
(846, 26, 'Khordha', 1),
(847, 26, 'Koraput', 1),
(848, 26, 'Malkangiri', 1),
(849, 26, 'Nabarangapur', 1),
(850, 26, 'Paradip', 1),
(851, 26, 'Parlakhemundi', 1),
(852, 26, 'Pattamundai', 1),
(853, 26, 'Phulabani', 1),
(854, 26, 'Puri', 1),
(855, 26, 'Rairangpur', 1),
(856, 26, 'Rajagangapur', 1),
(857, 26, 'Raurkela', 1),
(858, 26, 'Rayagada', 1),
(859, 26, 'Sambalpur', 1),
(860, 26, 'Soro', 1),
(861, 26, 'Sunabeda', 1),
(862, 26, 'Sundargarh', 1),
(863, 26, 'Talcher', 1),
(864, 26, 'Titlagarh', 1),
(865, 26, 'Umarkote', 1),
(866, 28, 'Ahmedgarh', 1),
(867, 28, 'Amritsar', 1),
(868, 28, 'Barnala', 1),
(869, 28, 'Batala', 1),
(870, 28, 'Bathinda', 1),
(871, 28, 'Bhagha Purana', 1),
(872, 28, 'Budhlada', 1),
(873, 28, 'Chandigarh', 1),
(874, 28, 'Dasua', 1),
(875, 28, 'Dhuri', 1),
(876, 28, 'Dinanagar', 1),
(877, 28, 'Faridkot', 1),
(878, 28, 'Fazilka', 1),
(879, 28, 'Firozpur', 1),
(880, 28, 'Firozpur Cantt.', 1),
(881, 28, 'Giddarbaha', 1),
(882, 28, 'Gobindgarh', 1),
(883, 28, 'Gurdaspur', 1),
(884, 28, 'Hoshiarpur', 1),
(885, 28, 'Jagraon', 1),
(886, 28, 'Jaitu', 1),
(887, 28, 'Jalalabad', 1),
(888, 28, 'Jalandhar', 1),
(889, 28, 'Jalandhar Cantt.', 1),
(890, 28, 'Jandiala', 1),
(891, 28, 'Kapurthala', 1),
(892, 28, 'Karoran', 1),
(893, 28, 'Kartarpur', 1),
(894, 28, 'Khanna', 1),
(895, 28, 'Kharar', 1),
(896, 28, 'Kot Kapura', 1),
(897, 28, 'Kurali', 1),
(898, 28, 'Longowal', 1),
(899, 28, 'Ludhiana', 1),
(900, 28, 'Malerkotla', 1),
(901, 28, 'Malout', 1),
(902, 28, 'Mansa', 1),
(903, 28, 'Maur', 1),
(904, 28, 'Moga', 1),
(905, 28, 'Mohali', 1),
(906, 28, 'Morinda', 1),
(907, 28, 'Mukerian', 1),
(908, 28, 'Muktsar', 1),
(909, 28, 'Nabha', 1),
(910, 28, 'Nakodar', 1),
(911, 28, 'Nangal', 1),
(912, 28, 'Nawanshahr', 1),
(913, 28, 'Pathankot', 1),
(914, 28, 'Patiala', 1),
(915, 28, 'Patran', 1),
(916, 28, 'Patti', 1),
(917, 28, 'Phagwara', 1),
(918, 28, 'Phillaur', 1),
(919, 28, 'Qadian', 1),
(920, 28, 'Raikot', 1),
(921, 28, 'Rajpura', 1),
(922, 28, 'Rampura Phul', 1),
(923, 28, 'Rupnagar', 1),
(924, 28, 'Samana', 1),
(925, 28, 'Sangrur', 1),
(926, 28, 'Sirhind Fatehgarh Sahib', 1),
(927, 28, 'Sujanpur', 1),
(928, 28, 'Sunam', 1),
(929, 28, 'Talwara', 1),
(930, 28, 'Tarn Taran', 1),
(931, 28, 'Urmar Tanda', 1),
(932, 28, 'Zira', 1),
(933, 28, 'Zirakpur', 1),
(934, 29, 'Ajmer', 1),
(935, 29, 'Alwar', 1),
(936, 29, 'Bandikui', 1),
(937, 29, 'Baran', 1),
(938, 29, 'Barmer', 1),
(939, 29, 'Bikaner', 1),
(940, 29, 'Fatehpur', 1),
(941, 29, 'Jaipur', 1),
(942, 29, 'Jaisalmer', 1),
(943, 29, 'Jodhpur', 1),
(944, 29, 'Kota', 1),
(945, 29, 'Lachhmangarh', 1),
(946, 29, 'Ladnu', 1),
(947, 29, 'Lakheri', 1),
(948, 29, 'Lalsot', 1),
(949, 29, 'Losal', 1),
(950, 29, 'Makrana', 1),
(951, 29, 'Malpura', 1),
(952, 29, 'Mandalgarh', 1),
(953, 29, 'Mandawa', 1),
(954, 29, 'Mangrol', 1),
(955, 29, 'Merta City', 1),
(956, 29, 'Mount Abu', 1),
(957, 29, 'Nadbai', 1),
(958, 29, 'Nagar', 1),
(959, 29, 'Nagaur', 1),
(960, 29, 'Nargund', 1),
(961, 29, 'Nasirabad', 1),
(962, 29, 'Nathdwara', 1),
(963, 29, 'Navalgund', 1),
(964, 29, 'Nawalgarh', 1),
(965, 29, 'Neem-Ka-Thana', 1),
(966, 29, 'Nelamangala', 1),
(967, 29, 'Nimbahera', 1),
(968, 29, 'Nipani', 1),
(969, 29, 'Niwai', 1),
(970, 29, 'Nohar', 1),
(971, 29, 'Nokha', 1),
(972, 29, 'Pali', 1),
(973, 29, 'Phalodi', 1),
(974, 29, 'Phulera', 1),
(975, 29, 'Pilani', 1),
(976, 29, 'Pilibanga', 1),
(977, 29, 'Pindwara', 1),
(978, 29, 'Pipar City', 1),
(979, 29, 'Prantij', 1),
(980, 29, 'Pratapgarh', 1),
(981, 29, 'Raisinghnagar', 1),
(982, 29, 'Rajakhera', 1),
(983, 29, 'Rajaldesar', 1),
(984, 29, 'Rajgarh (Alwar)', 1),
(985, 29, 'Rajgarh (Churu', 1),
(986, 29, 'Rajsamand', 1),
(987, 29, 'Ramganj Mandi', 1),
(988, 29, 'Ramngarh', 1),
(989, 29, 'Ratangarh', 1),
(990, 29, 'Rawatbhata', 1),
(991, 29, 'Rawatsar', 1),
(992, 29, 'Reengus', 1),
(993, 29, 'Sadri', 1),
(994, 29, 'Sadulshahar', 1),
(995, 29, 'Sagwara', 1),
(996, 29, 'Sambhar', 1),
(997, 29, 'Sanchore', 1),
(998, 29, 'Sangaria', 1),
(999, 29, 'Sardarshahar', 1),
(1000, 29, 'Sawai Madhopur', 1),
(1001, 29, 'Shahpura', 1),
(1002, 29, 'Shahpura', 1),
(1003, 29, 'Sheoganj', 1),
(1004, 29, 'Sikar', 1),
(1005, 29, 'Sirohi', 1),
(1006, 29, 'Sojat', 1),
(1007, 29, 'Sri Madhopur', 1),
(1008, 29, 'Sujangarh', 1),
(1009, 29, 'Sumerpur', 1),
(1010, 29, 'Suratgarh', 1),
(1011, 29, 'Taranagar', 1),
(1012, 29, 'Todabhim', 1),
(1013, 29, 'Todaraisingh', 1),
(1014, 29, 'Tonk', 1),
(1015, 29, 'Udaipur', 1),
(1016, 29, 'Udaipurwati', 1),
(1017, 29, 'Vijainagar', 1),
(1018, 30, 'Gangtok', 1),
(1019, 31, 'Arakkonam', 1),
(1020, 31, 'Arcot', 1),
(1021, 31, 'Aruppukkottai', 1),
(1022, 31, 'Bhavani', 1),
(1023, 31, 'Chengalpattu', 1),
(1024, 31, 'Chennai', 1),
(1025, 31, 'Chinna salem', 1),
(1026, 31, 'Coimbatore', 1),
(1027, 31, 'Coonoor', 1),
(1028, 31, 'Cuddalore', 1),
(1029, 31, 'Dharmapuri', 1),
(1030, 31, 'Dindigul', 1),
(1031, 31, 'Erode', 1),
(1032, 31, 'Gudalur', 1),
(1033, 31, 'Gudalur', 1),
(1034, 31, 'Gudalur', 1),
(1035, 31, 'Kanchipuram', 1),
(1036, 31, 'Karaikudi', 1),
(1037, 31, 'Karungal', 1),
(1038, 31, 'Karur', 1),
(1039, 31, 'Kollankodu', 1),
(1040, 31, 'Lalgudi', 1),
(1041, 31, 'Madurai', 1),
(1042, 31, 'Nagapattinam', 1),
(1043, 31, 'Nagercoil', 1),
(1044, 31, 'Namagiripettai', 1),
(1045, 31, 'Namakkal', 1),
(1046, 31, 'Nandivaram-Guduvancheri', 1),
(1047, 31, 'Nanjikottai', 1),
(1048, 31, 'Natham', 1),
(1049, 31, 'Nellikuppam', 1),
(1050, 31, 'Neyveli', 1),
(1051, 31, 'O Valley', 1),
(1052, 31, 'Oddanchatram', 1),
(1053, 31, 'P.N.Patti', 1),
(1054, 31, 'Pacode', 1),
(1055, 31, 'Padmanabhapuram', 1),
(1056, 31, 'Palani', 1),
(1057, 31, 'Palladam', 1),
(1058, 31, 'Pallapatti', 1),
(1059, 31, 'Pallikonda', 1),
(1060, 31, 'Panagudi', 1),
(1061, 31, 'Panruti', 1),
(1062, 31, 'Paramakudi', 1),
(1063, 31, 'Parangipettai', 1),
(1064, 31, 'Pattukkottai', 1),
(1065, 31, 'Perambalur', 1),
(1066, 31, 'Peravurani', 1),
(1067, 31, 'Periyakulam', 1),
(1068, 31, 'Periyasemur', 1),
(1069, 31, 'Pernampattu', 1),
(1070, 31, 'Pollachi', 1),
(1071, 31, 'Polur', 1),
(1072, 31, 'Ponneri', 1),
(1073, 31, 'Pudukkottai', 1),
(1074, 31, 'Pudupattinam', 1),
(1075, 31, 'Puliyankudi', 1),
(1076, 31, 'Punjaipugalur', 1),
(1077, 31, 'Rajapalayam', 1),
(1078, 31, 'Ramanathapuram', 1),
(1079, 31, 'Rameshwaram', 1),
(1080, 31, 'Rasipuram', 1),
(1081, 31, 'Salem', 1),
(1082, 31, 'Sankarankoil', 1),
(1083, 31, 'Sankari', 1),
(1084, 31, 'Sathyamangalam', 1),
(1085, 31, 'Sattur', 1),
(1086, 31, 'Shenkottai', 1),
(1087, 31, 'Sholavandan', 1),
(1088, 31, 'Sholingur', 1),
(1089, 31, 'Sirkali', 1),
(1090, 31, 'Sivaganga', 1),
(1091, 31, 'Sivagiri', 1),
(1092, 31, 'Sivakasi', 1),
(1093, 31, 'Srivilliputhur', 1),
(1094, 31, 'Surandai', 1),
(1095, 31, 'Suriyampalayam', 1),
(1096, 31, 'Tenkasi', 1),
(1097, 31, 'Thammampatti', 1),
(1098, 31, 'Thanjavur', 1),
(1099, 31, 'Tharamangalam', 1),
(1100, 31, 'Tharangambadi', 1),
(1101, 31, 'Theni Allinagaram', 1),
(1102, 31, 'Thirumangalam', 1),
(1103, 31, 'Thirunindravur', 1),
(1104, 31, 'Thiruparappu', 1),
(1105, 31, 'Thirupuvanam', 1),
(1106, 31, 'Thiruthuraipoondi', 1),
(1107, 31, 'Thiruvallur', 1),
(1108, 31, 'Thiruvarur', 1),
(1109, 31, 'Thoothukudi', 1),
(1110, 31, 'Thuraiyur', 1),
(1111, 31, 'Tindivanam', 1),
(1112, 31, 'Tiruchendur', 1),
(1113, 31, 'Tiruchengode', 1),
(1114, 31, 'Tiruchirappalli', 1),
(1115, 31, 'Tirukalukundram', 1),
(1116, 31, 'Tirukkoyilur', 1),
(1117, 31, 'Tirunelveli', 1),
(1118, 31, 'Tirupathur', 1),
(1119, 31, 'Tirupathur', 1),
(1120, 31, 'Tiruppur', 1),
(1121, 31, 'Tiruttani', 1),
(1122, 31, 'Tiruvannamalai', 1),
(1123, 31, 'Tiruvethipuram', 1),
(1124, 31, 'Tittakudi', 1),
(1125, 31, 'Udhagamandalam', 1),
(1126, 31, 'Udumalaipettai', 1),
(1127, 31, 'Unnamalaikadai', 1),
(1128, 31, 'Usilampatti', 1),
(1129, 31, 'Uthamapalayam', 1),
(1130, 31, 'Uthiramerur', 1),
(1131, 31, 'Vadakkuvalliyur', 1),
(1132, 31, 'Vadalur', 1),
(1133, 31, 'Vadipatti', 1),
(1134, 31, 'Valparai', 1),
(1135, 31, 'Vandavasi', 1),
(1136, 31, 'Vaniyambadi', 1),
(1137, 31, 'Vedaranyam', 1),
(1138, 31, 'Vellakoil', 1),
(1139, 31, 'Vellore', 1),
(1140, 31, 'Vikramasingapuram', 1),
(1141, 31, 'Viluppuram', 1),
(1142, 31, 'Virudhachalam', 1),
(1143, 31, 'Virudhunagar', 1),
(1144, 31, 'Viswanatham', 1),
(1145, 31, 'Chennai', 1),
(1146, 31, 'Coimbatore', 1),
(1147, 33, 'Agartala', 1),
(1148, 33, 'Badharghat', 1),
(1149, 33, 'Dharmanagar', 1),
(1150, 33, 'Indranagar', 1),
(1151, 33, 'Jogendranagar', 1),
(1152, 33, 'Kailasahar', 1),
(1153, 33, 'Khowai', 1),
(1154, 33, 'Pratapgarh', 1),
(1155, 33, 'Udaipur', 1),
(1156, 35, 'Achhnera', 1),
(1157, 35, 'Adari', 1),
(1158, 35, 'Agra', 1),
(1159, 35, 'Aligarh', 1),
(1160, 35, 'Allahabad', 1),
(1161, 35, 'Amroha', 1),
(1162, 35, 'Azamgarh', 1),
(1163, 35, 'Bahraich', 1),
(1164, 35, 'Ballia', 1),
(1165, 35, 'Balrampur', 1),
(1166, 35, 'Banda', 1),
(1167, 35, 'Bareilly', 1),
(1168, 35, 'Chandausi', 1),
(1169, 35, 'Dadri', 1),
(1170, 35, 'Deoria', 1),
(1171, 35, 'Etawah', 1),
(1172, 35, 'Fatehabad', 1),
(1173, 35, 'Fatehpur', 1),
(1174, 35, 'Fatehpur', 1),
(1175, 35, 'Greater Noida', 1),
(1176, 35, 'Hamirpur', 1),
(1177, 35, 'Hardoi', 1),
(1178, 35, 'Jajmau', 1),
(1179, 35, 'Jaunpur', 1),
(1180, 35, 'Jhansi', 1),
(1181, 35, 'Kalpi', 1),
(1182, 35, 'Kanpur', 1),
(1183, 35, 'Kota', 1),
(1184, 35, 'Laharpur', 1),
(1185, 35, 'Lakhimpur', 1),
(1186, 35, 'Lal Gopalganj Nindaura', 1),
(1187, 35, 'Lalganj', 1),
(1188, 35, 'Lalitpur', 1),
(1189, 35, 'Lar', 1),
(1190, 35, 'Loni', 1),
(1191, 35, 'Lucknow', 1),
(1192, 35, 'Mathura', 1),
(1193, 35, 'Meerut', 1),
(1194, 35, 'Modinagar', 1),
(1195, 35, 'Muradnagar', 1),
(1196, 35, 'Nagina', 1),
(1197, 35, 'Najibabad', 1),
(1198, 35, 'Nakur', 1),
(1199, 35, 'Nanpara', 1),
(1200, 35, 'Naraura', 1),
(1201, 35, 'Naugawan Sadat', 1),
(1202, 35, 'Nautanwa', 1),
(1203, 35, 'Nawabganj', 1),
(1204, 35, 'Nehtaur', 1),
(1205, 35, 'NOIDA', 1),
(1206, 35, 'Noorpur', 1),
(1207, 35, 'Obra', 1),
(1208, 35, 'Orai', 1),
(1209, 35, 'Padrauna', 1),
(1210, 35, 'Palia Kalan', 1),
(1211, 35, 'Parasi', 1),
(1212, 35, 'Phulpur', 1),
(1213, 35, 'Pihani', 1),
(1214, 35, 'Pilibhit', 1),
(1215, 35, 'Pilkhuwa', 1),
(1216, 35, 'Powayan', 1),
(1217, 35, 'Pukhrayan', 1),
(1218, 35, 'Puranpur', 1),
(1219, 35, 'Purquazi', 1),
(1220, 35, 'Purwa', 1),
(1221, 35, 'Rae Bareli', 1),
(1222, 35, 'Rampur', 1),
(1223, 35, 'Rampur Maniharan', 1),
(1224, 35, 'Rasra', 1),
(1225, 35, 'Rath', 1),
(1226, 35, 'Renukoot', 1),
(1227, 35, 'Reoti', 1),
(1228, 35, 'Robertsganj', 1),
(1229, 35, 'Rudauli', 1),
(1230, 35, 'Rudrapur', 1),
(1231, 35, 'Sadabad', 1),
(1232, 35, 'Safipur', 1),
(1233, 35, 'Saharanpur', 1),
(1234, 35, 'Sahaspur', 1),
(1235, 35, 'Sahaswan', 1),
(1236, 35, 'Sahawar', 1),
(1237, 35, 'Sahjanwa', 1),
(1238, 35, 'Sambhal', 1),
(1239, 35, 'Samdhan', 1),
(1240, 35, 'Samthar', 1),
(1241, 35, 'Sandi', 1),
(1242, 35, 'Sandila', 1),
(1243, 35, 'Sardhana', 1),
(1244, 35, 'Seohara', 1),
(1245, 35, 'Shahganj', 1),
(1246, 35, 'Shahjahanpur', 1),
(1247, 35, 'Shamli', 1),
(1248, 35, 'Sherkot', 1),
(1249, 35, 'Shikohabad', 1),
(1250, 35, 'Shishgarh', 1),
(1251, 35, 'Siana', 1),
(1252, 35, 'Sikanderpur', 1),
(1253, 35, 'Sikandra Rao', 1),
(1254, 35, 'Sikandrabad', 1),
(1255, 35, 'Sirsaganj', 1),
(1256, 35, 'Sirsi', 1),
(1257, 35, 'Sitapur', 1),
(1258, 35, 'Soron', 1),
(1259, 35, 'Suar', 1),
(1260, 35, 'Sultanpur', 1),
(1261, 35, 'Sumerpur', 1),
(1262, 35, 'Tanda', 1),
(1263, 35, 'Tanda', 1),
(1264, 35, 'Tetri Bazar', 1),
(1265, 35, 'Thakurdwara', 1),
(1266, 35, 'Thana Bhawan', 1),
(1267, 35, 'Tilhar', 1),
(1268, 35, 'Tirwaganj', 1),
(1269, 35, 'Tulsipur', 1),
(1270, 35, 'Tundla', 1),
(1271, 35, 'Unnao', 1),
(1272, 35, 'Utraula', 1),
(1273, 35, 'Varanasi', 1),
(1274, 35, 'Vrindavan', 1),
(1275, 35, 'Warhapur', 1),
(1276, 35, 'Zaidpur', 1),
(1277, 35, 'Zamania', 1),
(1278, 36, 'Calcutta', 1),
(1279, 36, 'Alipurduar', 1),
(1280, 36, 'Arambagh', 1),
(1281, 36, 'Asansol', 1),
(1282, 36, 'Baharampur', 1),
(1283, 36, 'Bally', 1),
(1284, 36, 'Balurghat', 1),
(1285, 36, 'Bankura', 1),
(1286, 36, 'Barakar', 1),
(1287, 36, 'Barasat', 1),
(1288, 36, 'Bardhaman', 1),
(1289, 36, 'Bidhan Nagar', 1),
(1290, 36, 'Chinsura', 1),
(1291, 36, 'Contai', 1),
(1292, 36, 'Cooch Behar', 1),
(1293, 36, 'Darjeeling', 1),
(1294, 36, 'Durgapur', 1),
(1295, 36, 'Haldia', 1),
(1296, 36, 'Howrah', 1),
(1297, 36, 'Islampur', 1),
(1298, 36, 'Jhargram', 1),
(1299, 36, 'Kharagpur', 1),
(1300, 36, 'Kolkata', 1),
(1301, 36, 'Mainaguri', 1),
(1302, 36, 'Mal', 1),
(1303, 36, 'Mathabhanga', 1),
(1304, 36, 'Medinipur', 1),
(1305, 36, 'Memari', 1),
(1306, 36, 'Monoharpur', 1),
(1307, 36, 'Murshidabad', 1),
(1308, 36, 'Nabadwip', 1),
(1309, 36, 'Naihati', 1),
(1310, 36, 'Panchla', 1),
(1311, 36, 'Pandua', 1),
(1312, 36, 'Paschim Punropara', 1),
(1313, 36, 'Purulia', 1),
(1314, 36, 'Raghunathpur', 1),
(1315, 36, 'Raiganj', 1),
(1316, 36, 'Rampurhat', 1),
(1317, 36, 'Ranaghat', 1),
(1318, 36, 'Sainthia', 1),
(1319, 36, 'Santipur', 1),
(1320, 36, 'Siliguri', 1),
(1321, 36, 'Sonamukhi', 1),
(1322, 36, 'Srirampore', 1),
(1323, 36, 'Suri', 1),
(1324, 36, 'Taki', 1),
(1325, 36, 'Tamluk', 1),
(1326, 36, 'Tarakeswar', 1),
(1327, 10, 'New Delhi', 1),
(1329, 11, 'Aldona', 1),
(1330, 11, 'Curchorem Cacora', 1),
(1331, 11, 'Madgaon', 1),
(1332, 11, 'Mapusa', 1),
(1333, 11, 'Margao', 1),
(1334, 11, 'Marmagao', 1),
(1335, 11, 'Panaji', 1),
(1336, 27, 'Karaikal', 1),
(1337, 27, 'Mahe', 1),
(1338, 27, 'Pondicherry', 1),
(1339, 27, 'Yanam', 1),
(1340, 16, 'Amlabad', 1),
(1341, 16, 'Ara', 1),
(1342, 16, 'Barughutu', 1),
(1343, 16, 'Bokaro Steel City', 1),
(1344, 16, 'Chaibasa', 1),
(1345, 16, 'Chakradharpur', 1),
(1346, 16, 'Chandrapura', 1),
(1347, 16, 'Chatra', 1),
(1348, 16, 'Chirkunda', 1),
(1349, 16, 'Churi', 1),
(1350, 16, 'Daltonganj', 1),
(1351, 16, 'Deoghar', 1),
(1352, 16, 'Dhanbad', 1),
(1353, 16, 'Dumka', 1),
(1354, 16, 'Garhwa', 1),
(1355, 16, 'Ghatshila', 1),
(1356, 16, 'Giridih', 1),
(1357, 16, 'Godda', 1),
(1358, 16, 'Gomoh', 1),
(1359, 16, 'Gumia', 1),
(1360, 16, 'Gumla', 1),
(1361, 16, 'Hazaribag', 1),
(1362, 16, 'Hussainabad', 1),
(1363, 16, 'Jamshedpur', 1),
(1364, 16, 'Jamtara', 1),
(1365, 16, 'Jhumri Tilaiya', 1),
(1366, 16, 'Khunti', 1),
(1367, 16, 'Lohardaga', 1),
(1368, 16, 'Madhupur', 1),
(1369, 16, 'Mihijam', 1),
(1370, 16, 'Musabani', 1),
(1371, 16, 'Pakaur', 1),
(1372, 16, 'Patratu', 1),
(1373, 16, 'Phusro', 1),
(1374, 16, 'Ramngarh', 1),
(1375, 16, 'Ranchi', 1),
(1376, 16, 'Sahibganj', 1),
(1377, 16, 'Saunda', 1),
(1378, 16, 'Simdega', 1),
(1379, 16, 'Tenu Dam-cum- Kathhara', 1),
(1380, 7, 'Ahiwara', 1),
(1381, 7, 'Akaltara', 1),
(1382, 7, 'Ambagarh Chowki', 1),
(1383, 7, 'Ambikapur', 1),
(1384, 7, 'Arang', 1),
(1385, 7, 'Bade Bacheli', 1),
(1386, 7, 'Balod', 1),
(1387, 7, 'Baloda Bazar', 1),
(1388, 7, 'Bemetra', 1),
(1389, 7, 'Bhatapara', 1),
(1390, 7, 'Bilaspur', 1),
(1391, 7, 'Birgaon', 1),
(1392, 7, 'Champa', 1),
(1393, 7, 'Chirmiri', 1),
(1394, 7, 'Dalli-Rajhara', 1),
(1395, 7, 'Dhamtari', 1),
(1396, 7, 'Dipka', 1),
(1397, 7, 'Dongargarh', 1),
(1398, 7, 'Durg-Bhilai Nagar', 1),
(1399, 7, 'Gobranawapara', 1),
(1400, 7, 'Jagdalpur', 1),
(1401, 7, 'Janjgir', 1),
(1402, 7, 'Jashpurnagar', 1),
(1403, 7, 'Kanker', 1),
(1404, 7, 'Kawardha', 1),
(1405, 7, 'Kondagaon', 1),
(1406, 7, 'Korba', 1),
(1407, 7, 'Mahasamund', 1),
(1408, 7, 'Mahendragarh', 1),
(1409, 7, 'Mungeli', 1),
(1410, 7, 'Naila Janjgir', 1),
(1411, 7, 'Raigarh', 1),
(1412, 7, 'Raipur', 1),
(1413, 7, 'Rajnandgaon', 1),
(1414, 7, 'Sakti', 1),
(1415, 7, 'Tilda Newra', 1),
(1416, 34, 'Nainital', 1),
(1417, 34, 'Almora', 1),
(1418, 34, 'Pitoragarh', 1),
(1419, 34, 'Udhamsingh Nagar', 1),
(1420, 34, 'Bageshwar', 1),
(1421, 34, 'Champawat', 1),
(1422, 34, 'Garhwal(Pauri)', 1),
(1423, 34, 'Tehri-Garhwal', 1),
(1424, 34, 'Chamoli( Gopeshwar )', 1),
(1425, 34, 'Uttarkashi', 1),
(1426, 34, 'Dehradun', 1),
(1427, 34, 'Rudraprayag', 1),
(1428, 34, 'Haridwar', 1),
(1429, 9, 'Dama', 1),
(1430, 9, 'Diu', 1),
(1431, 3, 'Andaman', 1),
(1432, 3, 'Nicobar', 1),
(1433, 32, 'Adilabad', 1),
(1434, 32, 'Hyderabad', 1),
(1435, 32, 'Karimnagar', 1),
(1436, 32, 'Khammam', 1),
(1437, 32, 'Mahbubnagar', 1),
(1438, 32, 'Medak', 1),
(1439, 32, 'Miryalaguda', 1),
(1440, 32, 'Nalgonda', 1),
(1441, 32, 'Nizamabad', 1),
(1442, 32, 'Ramagundam', 1),
(1443, 32, 'Rangareddy', 1),
(1444, 32, 'Sangareddy', 1),
(1445, 32, 'Suryapet', 1),
(1446, 32, 'Warangal', 1),
(1463, 6, 'Chandigarh', 1),
(1464, 35, 'Biznor', 1),
(1465, 35, 'Hapur', 1);

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
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`, `phone_no`, `mobile_no`, `address`, `city`, `state_id`, `country_id`, `pincode`, `logo`, `status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'One97', '237892775', '23424', 'Test Addressa', 'Shamli', 5, 95, 35325352, 'gh5fq1438837681.jpg', 1, 0, '2015-08-06 03:57:45', 0, '2015-08-06 03:57:45'),
(2, 'RST', '237892775', '234242', 'Test Address', 'Noida', 2, 95, 35325352, 'gTeXK1438833553.jpg', 1, 0, '2015-08-06 03:59:13', 0, '2015-08-06 03:59:13'),
(4, 'HCL', '23523525', '234242', 'Test AAAAA', 'Delhi', 7, 95, 35325352, 'ghkl01438837776.gif', 0, 0, '2015-08-06 05:09:36', 0, '2015-08-06 05:09:36'),
(5, 'Lokhit', '237892775', '234242', 'Test Address', 'Shamli', 3, 95, 35325352, 'BNC2f1440125423.jpg', 1, 0, '2015-08-21 02:50:23', 0, '2015-08-21 02:50:23');

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
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
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
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
`id` int(11) NOT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `emailid` varchar(120) NOT NULL,
  `dob` date NOT NULL,
  `gender` enum('Male','Female','Others') NOT NULL DEFAULT 'Male',
  `password` varchar(50) NOT NULL,
  `gardian_name` varchar(100) NOT NULL,
  `mobile_number` varchar(15) NOT NULL,
  `nominee_name` varchar(100) NOT NULL,
  `nominee_relation` varchar(100) NOT NULL,
  `nominee_address` varchar(100) NOT NULL,
  `country_id` int(11) NOT NULL DEFAULT '1',
  `state_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `address` varchar(500) NOT NULL,
  `member_id` varchar(20) NOT NULL,
  `status` tinyint(1) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL,
  `is_deleted` tinyint(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `branch_id`, `firstname`, `lastname`, `emailid`, `dob`, `gender`, `password`, `gardian_name`, `mobile_number`, `nominee_name`, `nominee_relation`, `nominee_address`, `country_id`, `state_id`, `city_id`, `address`, `member_id`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`) VALUES
(1, 1, 'AMIT', 'VERMA', 'amitvermabijnor@gmail.com', '0000-00-00', 'Male', '', 'SH. RAM KRISHAN', '9719347359', 'SMT.ANUPAMA ', 'WIFE', 'MOH. BUKHARA, VIDUR KUTI ROAD BIJNOR 246701', 1, 35, 1464, 'MOH. BUKHARA, VIDUR KUTI ROAD BIJNOR 246701', '101-00000001', 1, NULL, 0, '2015-07-16 05:21:28', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `member_installments`
--

CREATE TABLE IF NOT EXISTS `member_installments` (
`id` int(11) NOT NULL,
  `investment_id` int(11) DEFAULT NULL,
  `ammount` float(10,2) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL,
  `is_deleted` tinyint(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `member_installments`
--

INSERT INTO `member_installments` (`id`, `investment_id`, `ammount`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`) VALUES
(1, 1, 2380.00, 1, '2015-08-05 05:24:55', 0, '2015-08-05 05:24:55', 0, 0),
(2, 2, 10710.00, 1, '2015-08-08 12:35:19', 0, '2015-08-08 12:35:19', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `member_investments`
--

CREATE TABLE IF NOT EXISTS `member_investments` (
`id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `member_id` varchar(15) DEFAULT NULL,
  `plan_id` int(11) DEFAULT NULL,
  `plan_details_id` int(11) DEFAULT NULL,
  `cf_number` varchar(30) NOT NULL,
  `period` varchar(15) NOT NULL,
  `interest_rate` varchar(5) NOT NULL,
  `repayable_to` varchar(15) DEFAULT NULL,
  `installment_type` varchar(255) NOT NULL,
  `installment_no` int(11) DEFAULT '1',
  `installment_date` varchar(100) DEFAULT NULL,
  `total_installment` int(11) NOT NULL DEFAULT '1',
  `last_installment_date` date DEFAULT NULL,
  `final_ammount` float(10,2) NOT NULL DEFAULT '1.00',
  `start_ammount` float(10,2) NOT NULL DEFAULT '0.00',
  `deposit_amount` float(10,2) DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `member_investments`
--

INSERT INTO `member_investments` (`id`, `branch_id`, `member_id`, `plan_id`, `plan_details_id`, `cf_number`, `period`, `interest_rate`, `repayable_to`, `installment_type`, `installment_no`, `installment_date`, `total_installment`, `last_installment_date`, `final_ammount`, `start_ammount`, `deposit_amount`, `start_date`, `end_date`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 1, '101-00000001', 2, 36, 'RD-60M-00000001', '60 Months', '12', 'Self', '5', 1, '5th Aug of every year', 1, NULL, 26430.00, 2380.00, 15000.00, '2015-08-05 05:22:59', '2018-08-05 05:24:06', 0, NULL, 0, '2015-08-21 02:15:38'),
(2, 1, '101-00000001', 2, 60, 'RD-36M-00000002', '36 Months', '12', 'Self', '9', 1, '8th Aug of every year', 1, NULL, 43079.00, 10710.00, 36000.00, '2015-08-08 12:34:50', '2020-08-08 12:35:12', 0, NULL, 0, '2015-08-21 02:15:38');

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
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
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
-- Table structure for table `plans`
--

CREATE TABLE IF NOT EXISTS `plans` (
`id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `status` tinyint(1) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL,
  `is_deleted` tinyint(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `name`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`) VALUES
(1, 'FD', 1, '2015-07-02 19:25:24', 1, '2015-07-09 00:07:49', 1, 0),
(2, 'RD', 1, '2015-07-02 19:25:24', 1, '2015-07-09 00:07:49', 1, 0),
(3, 'DDS', 1, '2015-07-02 19:25:24', 1, '2015-08-01 22:44:17', 1, 0),
(4, 'MIS', 1, '2015-07-02 19:25:24', 1, '2015-08-01 22:44:14', 1, 0);

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
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL,
  `is_deleted` tinyint(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `plans_details`
--

INSERT INTO `plans_details` (`id`, `plan_id`, `duration`, `duration_type`, `installment_type`, `interest_rate`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`) VALUES
(1, 1, '12', 'M', 'One Time', '10.5', 1, '2015-07-09 08:52:37', 1, '2015-08-02 04:17:42', 1, 0),
(2, 1, '24', 'M', 'One Time', '11', 1, '2015-07-09 08:54:30', 1, '2015-08-02 04:17:47', 1, 0),
(3, 1, '36', 'M', 'One Time', '11.5', 1, '2015-07-09 08:54:31', 1, '2015-08-02 04:17:52', 1, 0),
(4, 1, '60', 'M', 'One Time', '12', 1, '2015-07-09 08:54:31', 1, '2015-08-02 04:18:16', 1, 0),
(5, 2, '36', 'M', 'Yearly', '12', 1, '2015-07-09 09:04:43', 1, '2015-08-02 04:54:51', 1, 0),
(6, 2, '36', 'M', 'Half Yearly', '12', 1, '2015-07-09 09:04:43', 1, '2015-08-02 04:54:51', 1, 0),
(7, 2, '36', 'M', 'Quaterly', '12', 1, '2015-07-09 09:04:43', 1, '2015-08-02 04:54:51', 1, 0),
(8, 2, '36', 'M', 'Monthly', '12', 1, '2015-07-09 09:04:43', 1, '2015-08-02 04:54:51', 1, 0),
(9, 2, '60', 'M', 'Yearly', '12.5', 1, '2015-07-09 09:04:43', 1, '2015-07-09 16:04:43', 1, 0),
(10, 2, '60', 'M', 'Half Yearly', '12.5', 1, '2015-07-09 09:04:43', 1, '2015-07-09 16:04:43', 1, 0),
(11, 2, '60', 'M', 'Quaterly', '12.5', 1, '2015-07-09 09:04:43', 1, '2015-07-09 16:04:43', 1, 0),
(12, 2, '60', 'M', 'Monthly', '12.5', 1, '2015-07-09 09:04:43', 1, '2015-07-09 16:04:43', 1, 0),
(13, 3, '180', 'D', 'Per Day', '5', 1, '2015-07-09 09:04:43', 1, '2015-08-21 02:16:00', 1, 0),
(14, 3, '365', 'D', 'Per Day', '5.5', 1, '2015-08-18 00:00:00', 1, '2015-08-21 02:28:43', 1, 0),
(15, 3, '365', 'D', 'Per Day', '5.5', 1, '2015-08-18 00:00:00', 1, '2015-08-21 02:30:04', 1, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=141 ;

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
(30, 1, 3, '100000', '100000', '138620'),
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
(82, 2, 9, '2380', '12000', '16423'),
(83, 2, 9, '3570', '18000', '24634'),
(84, 2, 9, '4760', '24000', '32646'),
(85, 2, 9, '5950', '30000', '41057'),
(86, 2, 9, '7140', '36000', '49269'),
(87, 2, 9, '8330', '42000', '57480'),
(88, 2, 9, '9520', '48000', '65692'),
(89, 2, 9, '10710', '54000', '73903'),
(90, 2, 9, '11900', '60000', '82115'),
(91, 2, 10, '595', '6000', '8211'),
(92, 2, 10, '1190', '12000', '16423'),
(93, 2, 10, '1785', '18000', '24634'),
(94, 2, 10, '2380', '24000', '32646'),
(95, 2, 10, '2975', '30000', '41057'),
(96, 2, 10, '3570', '36000', '49269'),
(97, 2, 10, '4165', '42000', '57480'),
(98, 2, 10, '4760', '48000', '65692'),
(99, 2, 10, '5355', '54000', '73903'),
(100, 2, 10, '5950', '60000', '82115'),
(101, 2, 11, '298', '6000', '8211'),
(102, 2, 11, '596', '12000', '16423'),
(103, 2, 11, '894', '18000', '24634'),
(104, 2, 11, '1192', '24000', '32646'),
(105, 2, 11, '1490', '30000', '41057'),
(106, 2, 11, '1788', '36000', '49269'),
(107, 2, 11, '2086', '42000', '57480'),
(108, 2, 11, '2384', '48000', '65692'),
(109, 2, 11, '2682', '54000', '73903'),
(110, 2, 11, '2980', '60000', '82115'),
(111, 2, 12, '100', '6000', '8211'),
(112, 2, 12, '200', '12000', '16423'),
(113, 2, 12, '300', '18000', '24634'),
(114, 2, 12, '400', '24000', '32646'),
(115, 2, 12, '500', '30000', '41057'),
(116, 2, 12, '600', '36000', '49269'),
(117, 2, 12, '700', '42000', '57480'),
(118, 2, 12, '800', '48000', '65692'),
(119, 2, 12, '900', '54000', '73903'),
(120, 2, 12, '1000', '60000', '82115'),
(121, 3, 13, '100', '1800', '18450'),
(122, 3, 13, '200', '36000', '36900'),
(123, 3, 13, '300', '54000', '55350'),
(124, 3, 13, '400', '72000', '73800'),
(125, 3, 13, '500', '90000', '92250'),
(126, 3, 13, '600', '108000', '110700'),
(127, 3, 13, '700', '126000', '129150'),
(128, 3, 13, '900', '144000', '147600'),
(129, 3, 13, '1000', '162000', '166050'),
(130, 3, 13, '1000', '180000', '184500'),
(131, 3, 14, '100', '36500', '38507'),
(132, 3, 14, '200', '73000', '77015'),
(133, 3, 14, '300', '109500', '115522'),
(134, 3, 14, '400', '146000', '154030'),
(135, 3, 14, '500', '182500', '192537'),
(136, 3, 14, '600', '219000', '231045'),
(137, 3, 14, '700', '255000', '265992'),
(138, 3, 14, '800', '292000', '308060'),
(139, 3, 14, '900', '325500', '343402'),
(140, 3, 14, '1000', '365000', '385075');

-- --------------------------------------------------------

--
-- Table structure for table `plan_installments`
--

CREATE TABLE IF NOT EXISTS `plan_installments` (
`id` int(11) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `value` varchar(10) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `plan_installments`
--

INSERT INTO `plan_installments` (`id`, `plan_id`, `name`, `value`) VALUES
(1, 1, 'One Time', '1'),
(2, 2, 'Monthly', '12'),
(3, 2, 'Quaterly', '4'),
(4, 2, 'Half Yearly', '2'),
(5, 2, 'Yearly', '1'),
(6, 3, 'Per Day', '365');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
`id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL,
  `is_deleted` tinyint(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`) VALUES
(1, 'Owner', 1, '2015-07-09 09:15:20', 1, '2015-07-09 09:15:20', 1, 0),
(2, 'Developer', 1, '2015-07-09 09:15:20', 1, '2015-07-09 09:15:20', 1, 0),
(3, 'Sales Executive', 1, '2015-07-09 09:15:20', 1, '2015-07-09 09:15:20', 1, 0),
(4, 'Sales Officer', 1, '2015-07-09 09:15:20', 1, '2015-07-09 09:15:20', 1, 0),
(5, 'Marketing Executive', 1, '2015-07-09 09:15:20', 1, '2015-07-09 09:15:20', 1, 0),
(6, 'Marketing Officer', 1, '2015-07-09 09:15:20', 1, '2015-07-09 09:15:20', 1, 0),
(7, 'Development Executive', 1, '2015-07-09 09:15:20', 1, '2015-07-09 09:15:20', 1, 0),
(8, 'Development Manager', 1, '2015-07-09 09:15:20', 1, '2015-07-09 09:15:20', 1, 0),
(9, 'Regional Manager', 1, '2015-07-09 09:15:20', 1, '2015-07-09 09:15:20', 1, 0),
(10, 'Zonal Manager', 1, '2015-07-09 09:15:20', 1, '2015-07-09 09:15:20', 1, 0),
(11, 'Sr. Zonal Manager', 1, '2015-07-09 09:15:20', 1, '2015-07-09 09:15:20', 1, 0),
(12, 'Marketing Manager', 1, '2015-07-09 09:15:20', 1, '2015-07-09 09:15:20', 1, 0);

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

-- --------------------------------------------------------

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
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `name` varchar(150) DEFAULT NULL,
  `userid` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` text,
  `role_id` int(11) NOT NULL DEFAULT '0',
  `branch_id` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL,
  `is_deleted` tinyint(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `userid`, `password`, `email`, `address`, `role_id`, `branch_id`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`) VALUES
(1, 'Sachin Tyagi', 'sachint', '827ccb0eea8a706c4c34a16891f84e7b', 'sachin.tyagirc@gmail.com', 'Test address', 1, 1, 1, '2015-07-09 10:46:46', 1, '2015-08-21 02:15:39', 1, 0),
(2, 'Hardeep Sharma', 'hardeeps', '827ccb0eea8a706c4c34a16891f84e7b', 'hardeep@gmail.com', 'Test address', 2, 1, 1, '2015-07-09 10:48:47', 1, '2015-08-21 02:15:39', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branch_type`
--
ALTER TABLE `branch_type`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `name_UNIQUE` (`name`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
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
-- Indexes for table `members`
--
ALTER TABLE `members`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `idx_members_customer_id` (`member_id`) COMMENT 'Customer id will be unique', ADD UNIQUE KEY `member_id` (`member_id`), ADD UNIQUE KEY `member_id_2` (`member_id`);

--
-- Indexes for table `member_installments`
--
ALTER TABLE `member_installments`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_investments`
--
ALTER TABLE `member_investments`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `cf_number` (`cf_number`), ADD UNIQUE KEY `cf_number_2` (`cf_number`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
 ADD PRIMARY KEY (`id`);

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
-- Indexes for table `plan_installments`
--
ALTER TABLE `plan_installments`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `name_UNIQUE` (`name`);

--
-- Indexes for table `role_permissions`
--
ALTER TABLE `role_permissions`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `userid_UNIQUE` (`userid`), ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `branch_type`
--
ALTER TABLE `branch_type`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1466;
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
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `member_installments`
--
ALTER TABLE `member_installments`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `member_investments`
--
ALTER TABLE `member_investments`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `plans_details`
--
ALTER TABLE `plans_details`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `plan_formula_test`
--
ALTER TABLE `plan_formula_test`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=141;
--
-- AUTO_INCREMENT for table `plan_installments`
--
ALTER TABLE `plan_installments`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `role_permissions`
--
ALTER TABLE `role_permissions`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
