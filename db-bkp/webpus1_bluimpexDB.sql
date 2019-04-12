-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 12, 2019 at 04:23 AM
-- Server version: 5.5.52-38.3-log
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webpus1_bluimpexDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `ip_address` varchar(16) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `user_agent` varchar(150) COLLATE utf8_bin NOT NULL,
  `last_activity` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `user_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('113770b50548c985b4572e2707602a5b', '66.102.8.6', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.119 Safari/537.36', 1555055948, ''),
('139554d9265680c94e9866e5cbfaac24', '223.190.100.33', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36', 1555058763, 'a:10:{s:10:\"admin_user\";s:5:\"admin\";s:7:\"adm_key\";s:1:\"1\";s:10:\"admin_type\";s:1:\"2\";s:8:\"admin_id\";s:1:\"1\";s:15:\"admin_logged_in\";b:1;s:11:\"currency_id\";s:1:\"3\";s:13:\"currency_code\";s:3:\"IND\";s:11:\"symbol_left\";s:3:\"Rs.\";s:12:\"symbol_right\";s:0:\"\";s:14:\"currency_value\";s:6:\"1.0000\";}'),
('27f860861aa354ee7ed7add30d2446d8', '223.190.100.33', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36', 1555060787, 'a:11:{s:10:\"admin_user\";s:5:\"admin\";s:7:\"adm_key\";s:1:\"1\";s:10:\"admin_type\";s:1:\"2\";s:8:\"admin_id\";s:1:\"1\";s:15:\"admin_logged_in\";b:1;s:11:\"currency_id\";s:1:\"3\";s:13:\"currency_code\";s:3:\"IND\";s:11:\"symbol_left\";s:3:\"Rs.\";s:12:\"symbol_right\";s:0:\"\";s:14:\"currency_value\";s:6:\"1.0000\";s:11:\"recent_view\";a:3:{i:0;s:1:\"4\";i:1;s:1:\"9\";i:2;s:2:\"15\";}}'),
('2f9d705706877e3badcc637de1c0acdc', '223.190.100.33', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36', 1555055940, ''),
('93c801544660f1f5fe371948687ae194', '122.160.79.192', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.121 Safari/537.3', 1555053542, 'a:1:{s:11:\"recent_view\";a:1:{i:0;s:1:\"4\";}}'),
('aef93ea14e0272995d00dd0933affcb5', '223.190.100.33', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36', 1555060788, 'a:12:{s:9:\"user_data\";s:0:\"\";s:10:\"admin_user\";s:5:\"admin\";s:7:\"adm_key\";s:1:\"1\";s:10:\"admin_type\";s:1:\"2\";s:8:\"admin_id\";s:1:\"1\";s:15:\"admin_logged_in\";b:1;s:11:\"currency_id\";s:1:\"3\";s:13:\"currency_code\";s:3:\"IND\";s:11:\"symbol_left\";s:3:\"Rs.\";s:12:\"symbol_right\";s:0:\"\";s:14:\"currency_value\";s:6:\"1.0000\";s:11:\"recent_view\";a:1:{i:0;s:2:\"15\";}}');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_type` enum('1','2') NOT NULL DEFAULT '2' COMMENT '1= super admin , 2= other',
  `admin_key` varchar(15) NOT NULL,
  `admin_username` varchar(50) NOT NULL,
  `admin_password` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_cs DEFAULT NULL,
  `admin_email` varchar(255) NOT NULL DEFAULT '',
  `litigation_days` int(5) NOT NULL,
  `admin_last_login` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `address` text NOT NULL,
  `city` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `phone` varchar(50) NOT NULL,
  `fax` varchar(50) NOT NULL,
  `contact_person` varchar(50) NOT NULL,
  `contact_phone` varchar(50) NOT NULL,
  `contact_email` varchar(50) NOT NULL,
  `tax` decimal(10,2) NOT NULL DEFAULT '0.00',
  `app_version_android` varchar(20) NOT NULL DEFAULT '1.2',
  `app_version_ios` varchar(20) NOT NULL DEFAULT '1.1',
  `post_date` date NOT NULL,
  `site_name` varchar(200) NOT NULL,
  `site_url` varchar(200) NOT NULL,
  `site_phone_no` varchar(200) NOT NULL,
  `site_email` varchar(200) NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_type`, `admin_key`, `admin_username`, `admin_password`, `admin_email`, `litigation_days`, `admin_last_login`, `address`, `city`, `country`, `phone`, `fax`, `contact_person`, `contact_phone`, `contact_email`, `tax`, `app_version_android`, `app_version_ios`, `post_date`, `site_name`, `site_url`, `site_phone_no`, `site_email`, `status`) VALUES
(1, '2', '1', 'admin', 'admin1', 'info@blueimpax.com', 0, '0000-00-00 00:00:00', 'O-57, Near Metro Pillar No:230, West Patel Nagar, New Delhi Nearest Metro Station Shadipur', 'New Delhi', 'India', '09891268568', '', '', '', '', 0.00, '1.2', '1.1', '0000-00-00', 'Blu Impex', 'webpulse.co/blu-impex', '011-45548568, 09891268568, 09871695957', 'info@blueimpax.com', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_city`
--

CREATE TABLE `tbl_city` (
  `id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `title` varchar(250) DEFAULT NULL,
  `temp_title` varchar(250) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1' COMMENT '''0''=Inactive,''1''=Active,''2''=Deleted'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_city`
--

INSERT INTO `tbl_city` (`id`, `state_id`, `country_id`, `title`, `temp_title`, `created_at`, `status`) VALUES
(1, 14, 1, 'Allahabad', 'allahabad', '2019-04-05 14:17:48', '1'),
(2, 15, 1, 'Indore', 'indore', '2019-04-05 14:19:16', '1'),
(3, 0, 1, 'Jaipur', 'jaipur', '2019-04-05 14:22:56', '1'),
(4, 0, 1, 'Nagpur', 'nagpur', '2019-04-05 14:23:23', '1'),
(5, 0, 1, 'Dhanbad', 'dhanbad', '2019-04-05 14:23:56', '1'),
(6, 0, 1, 'Raipur', 'raipur', '2019-04-05 14:24:45', '1'),
(7, 0, 1, 'Vijayawada', 'vijayawada', '2019-04-05 14:25:07', '1'),
(8, 0, 1, 'Rajahmundry', 'rajahmundry', '2019-04-05 14:25:22', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_country`
--

CREATE TABLE `tbl_country` (
  `id` int(11) NOT NULL,
  `country_name` varchar(250) NOT NULL,
  `country_temp_name` varchar(250) NOT NULL,
  `created_at` datetime NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1' COMMENT '''0''=Inactive,''1''=Active,''2''=Deleted'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_country`
--

INSERT INTO `tbl_country` (`id`, `country_name`, `country_temp_name`, `created_at`, `status`) VALUES
(1, 'India', 'india', '2019-04-01 09:08:28', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_courier_company`
--

CREATE TABLE `tbl_courier_company` (
  `company_id` int(11) NOT NULL,
  `company_name` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `zip_code` text COLLATE utf8_unicode_ci NOT NULL,
  `added_date` datetime DEFAULT NULL,
  `status` enum('1','2','3') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `xls_type` enum('Y','N') COLLATE utf8_unicode_ci DEFAULT 'N' COMMENT 'Y=Yes,N=No'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_faq`
--

CREATE TABLE `tbl_faq` (
  `faq_id` int(11) NOT NULL,
  `faq_parent_id` int(11) NOT NULL DEFAULT '0',
  `faq_question` varchar(225) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `faq_question_p` varchar(250) DEFAULT NULL,
  `faq_answer` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `faq_answer_p` text,
  `sort_order` int(11) DEFAULT NULL,
  `status` enum('1','2','3') NOT NULL DEFAULT '1',
  `faq_date_added` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_faq`
--

INSERT INTO `tbl_faq` (`faq_id`, `faq_parent_id`, `faq_question`, `faq_question_p`, `faq_answer`, `faq_answer_p`, `sort_order`, `status`, `faq_date_added`) VALUES
(55, 0, 'Lorem Ipsum', NULL, '<p><strong>Lorem Ipsum</strong><span style=\"color:rgb(0, 0, 0); font-family:open sans,arial,sans-serif; font-size:14px\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</span></p>', NULL, NULL, '1', '2018-01-15 14:16:09');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_newsletters`
--

CREATE TABLE `tbl_newsletters` (
  `subscriber_id` int(11) NOT NULL,
  `subscriber_name` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `subscriber_email` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` enum('0','1','2') DEFAULT '1' COMMENT '1=Active,0=Deactive,2=Deleted',
  `mail_status` enum('1','0') DEFAULT '0' COMMENT '1=Yes,0=No',
  `subscribe_date` datetime DEFAULT NULL,
  `mail_sent_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_newsletters`
--

INSERT INTO `tbl_newsletters` (`subscriber_id`, `subscriber_name`, `subscriber_email`, `status`, `mail_status`, `subscribe_date`, `mail_sent_date`) VALUES
(1, NULL, 'test@gmail.com', '1', '0', NULL, NULL),
(2, NULL, '0', '1', '0', NULL, NULL),
(3, NULL, '0', '1', '0', NULL, NULL),
(4, NULL, '0', '1', '0', NULL, NULL),
(5, NULL, '0', '1', '0', NULL, NULL),
(6, NULL, '0', '1', '0', NULL, NULL),
(7, NULL, '0', '1', '0', NULL, NULL),
(8, NULL, '0', '1', '0', NULL, NULL),
(9, NULL, '0', '1', '0', NULL, NULL),
(10, NULL, '0', '1', '0', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_newsletter_groups`
--

CREATE TABLE `tbl_newsletter_groups` (
  `newsletter_groups_id` int(11) NOT NULL,
  `group_name` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('1','0') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '1' COMMENT '1=Actice,0=Inactive',
  `groups_created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_newsletter_group_subscriber`
--

CREATE TABLE `tbl_newsletter_group_subscriber` (
  `group_subscriber_id` int(11) NOT NULL,
  `newsletter_groups_id` int(11) NOT NULL,
  `subscriber_id` int(11) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_states`
--

CREATE TABLE `tbl_states` (
  `id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `title` varchar(250) DEFAULT NULL,
  `temp_title` varchar(250) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1' COMMENT '''0''=Inactive,''1''=Active,''2''=Deleted'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_states`
--

INSERT INTO `tbl_states` (`id`, `country_id`, `title`, `temp_title`, `created_at`, `status`) VALUES
(1, 1, 'Gujrat', 'gujrat', '2019-04-01 09:09:42', '1'),
(3, 1, 'Mumbai', 'mumbai', '2019-04-05 13:57:54', '1'),
(4, 1, 'Kolkata', 'kolkata', '2019-04-05 13:58:09', '1'),
(5, 1, 'Chennai', 'chennai', '2019-04-05 14:02:24', '1'),
(6, 1, 'Hyderabad', 'hyderabad', '2019-04-05 14:02:54', '1'),
(8, 1, 'Bhubaneswar', 'bhubaneswar', '2019-04-05 14:04:21', '1'),
(9, 1, 'Visakhapatnam', 'visakhapatnam', '2019-04-10 06:14:20', '1'),
(10, 1, 'Patna', 'patna', '2019-04-05 14:05:27', '1'),
(11, 1, 'Lucknow', 'lucknow', '2019-04-05 14:06:09', '1'),
(12, 1, 'Ranchi', 'ranchi', '2019-04-05 14:11:36', '1'),
(13, 1, 'Raipur', 'raipur', '2019-04-05 14:12:16', '1'),
(14, 1, 'Uttar Pradesh', 'uttarpradesh', '2019-04-05 14:17:09', '1'),
(15, 1, 'Madhya Pradesh', 'madhyapradesh', '2019-04-05 14:18:48', '1'),
(17, 1, 'Indore', 'indore', '2019-04-11 11:27:54', '1'),
(18, 1, 'Allahabad', 'allahabad', '2019-04-11 11:28:26', '1'),
(19, 1, 'Jaipur', 'jaipur', '2019-04-11 11:28:40', '1'),
(20, 1, 'Jammu', 'jammu', '2019-04-11 11:28:56', '1'),
(21, 1, 'Pune', 'pune', '2019-04-11 11:29:19', '1'),
(22, 1, 'Nagpur', 'nagpur', '2019-04-11 11:29:35', '1'),
(23, 1, 'Dhanbad', 'dhanbad', '2019-04-11 11:29:57', '1'),
(24, 1, 'Vijayawada', 'vijayawada', '2019-04-11 11:30:28', '1'),
(25, 1, 'Rajahmundry', 'rajahmundry', '2019-04-11 11:30:51', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_zip_location`
--

CREATE TABLE `tbl_zip_location` (
  `zip_location_id` int(11) NOT NULL,
  `location_name` varchar(32) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `zip_code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cod` enum('N','Y') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'N',
  `added_date` datetime DEFAULT NULL,
  `status` enum('1','2','3') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `xls_type` enum('Y','N') COLLATE utf8_unicode_ci DEFAULT 'N' COMMENT 'Y=Yes,N=No'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_zip_location`
--

INSERT INTO `tbl_zip_location` (`zip_location_id`, `location_name`, `zip_code`, `cod`, `added_date`, `status`, `xls_type`) VALUES
(1654, 'Sansad Marg', '110001', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1655, 'Indraprastha', '110002', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1656, 'Lodi Road', '110003', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1657, 'Rashtrapati Bhawan', '110004', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1658, 'Karol Bagh', '110005', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1659, 'Delhi G.P.O.', '110006', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1660, 'Roop Nagar', '110007', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1661, 'Patel Nagar West', '110008', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1662, 'Nirankari Colony', '110009', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1663, 'R R Hospital', '110010', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1664, 'Nirman Bhawan', '110011', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1665, 'Inderpuri', '110012', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1666, 'Hazrat Nizamuddin', '110013', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1667, 'Jungpura', '110014', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1668, 'Ramesh Nagar', '110015', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1669, 'Green Park Market', '110016', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1670, 'Malviya Nagar (South Delhi)', '110017', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1671, 'Ashok Nagar (West Delhi)', '110018', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1672, 'Kalkaji', '110019', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1673, 'Okhla Industrial Estate', '110020', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1674, 'Moti Bagh', '110021', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1675, 'R K Puram Sector - 6 Postal SB', '110022', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1676, 'Sarojini Nagar', '110023', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1677, 'Defence Colony (South Delhi)', '110024', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1678, 'New Friends Colony', '110025', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1679, 'Punjabi Bagh', '110026', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1680, 'Janta Market', '110027', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1681, 'Naraina Industrial Estate', '110028', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1682, 'Nauroji Nagar', '110029', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1683, 'Gadaipur', '110030', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1684, 'Gandhi Nagar Bazar', '110031', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1685, 'Shahdara', '110032', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1686, 'Adrash Nagar', '110033', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1687, 'Rani Bagh', '110034', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1688, 'Ganeshpura', '110035', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1689, 'Alipur', '110036', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1690, 'Gurgaon Road', '110037', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1691, 'A F Rajokari', '110038', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1692, 'Bawana', '110039', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1693, 'Narela', '110040', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1694, 'Nangloi', '110041', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1695, 'Badli (North West Delhi)', '110042', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1696, 'Najafgarh', '110043', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1697, 'Badarpur (South Delhi)', '110044', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1698, 'Palam Village', '110045', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1699, 'Sagarpur', '110046', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1700, 'Arjungarh', '110047', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1701, 'Masjid Moth', '110048', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1702, 'Gautam Nagar', '110049', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1703, 'Krishna Nagar', '110051', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1704, 'Ashok Vihar', '110052', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1705, 'Brahampuri', '110053', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1706, 'District Courts (North Delhi)', '110054', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1707, 'Multani Dhanda', '110055', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1708, 'Shakur Basti Depot', '110056', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1709, 'Vasant Vihar-1', '110057', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1710, 'Jail Road (West Delhi)', '110058', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1711, 'Uttam Nagar', '110059', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1712, 'Rajender Nagar', '110060', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1713, 'Bijwasan', '110061', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1714, 'Khanpur (South Delhi)', '110062', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1715, 'Paschim Vihar', '110063', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1716, 'Maya Puri', '110064', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1717, 'Sant Nagar (South Delhi)', '110065', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1718, 'R K Puram (Main)', '110066', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1719, 'JNU New Campus', '110067', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1720, 'Ignou', '110068', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1721, 'Union Public Service Commission', '110069', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1722, 'Vasant Kunj', '110070', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1723, 'Chhawla', '110071', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1724, 'CRPF Jharoda Kalan', '110072', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1725, 'Ujwa', '110073', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1726, 'Chattarpur', '110074', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1727, 'Dwarka Sec-6', '110075', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1728, 'Sarita Vihar', '110076', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1729, 'Bagdola', '110077', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1730, 'N.S.I.T. Dwarka', '110078', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1731, 'Kanjhawla', '110081', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1732, 'Khera Kalan', '110082', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1733, 'Mangolpuri S Block', '110083', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1734, 'Burari', '110084', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1735, 'Rithala', '110085', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1736, 'Begumpur', '110086', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1737, 'Jwala Puri', '110087', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1738, 'Haiderpur', '110088', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1739, 'Rohini Sector 15', '110089', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1740, 'Patparganj', '110091', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1741, 'Yozna Vihar', '110092', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1742, 'Loni Road Housing Complex', '110093', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1743, 'Sonia Vihar', '110094', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1744, 'Jhilmil', '110095', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1745, 'Ghazipur', '110096', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1746, 'Faridabad NIT', '121001', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1747, 'Faridabad City', '121002', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1748, 'Mathura Road Faridabad', '121003', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1749, 'N.T.P.C./sector-10 Faridabad', '121004', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1750, 'Jawahar Colony Faridabad', '121005', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1751, 'G.T. Road Faridabad', '121006', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1752, 'Escortsnagar Faridabad', '121007', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1753, 'Faridabad Sector 29', '121008', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1754, 'Surajkund Faridabad', '121009', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1755, 'Palwal', '121102', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1756, 'Gurgaon', '122001', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1757, 'DLF QE', '122002', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1758, 'Gurgaon Sector 45', '122003', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1759, 'Narsinghpur', '122004', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1760, 'Air Force', '122005', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1761, 'Railwary Road', '122006', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1762, 'Industrial Estate (Gurgaon)', '122007', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1763, 'DLF Ph-II', '122008', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1764, 'Galleria DLF-IV', '122009', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1765, 'DLF Ph-III', '122010', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1766, 'Gurgaon Sector 56', '122011', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1767, 'Palam Road', '122015', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1768, 'Industrial Complex Dundahera', '122016', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1769, 'Palam Vihar (Gurgaon)', '122017', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1770, 'Gurgaon South City II', '122018', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1771, 'Nsg Camp Manesar', '122051', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1772, 'Bawal', '123501', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1773, 'Rohtak', '124001', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1774, 'Hisar', '125001', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1775, 'Ha U Hisar', '125004', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1776, 'Vidut Nagar Hisar', '125005', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1777, 'T C Hansi', '125033', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1778, 'Satroad Khurd', '125044', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1779, 'Nai Mandi Fatehabad', '125050', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1780, 'Rattia', '125051', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1781, 'Mandi Adampur', '125052', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1782, 'Bhattu Kalan', '125053', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1783, 'Sirsa', '125055', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1784, 'Abubshahar', '125104', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1785, 'Bhiwani', '127021', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1786, 'Bahalgarh', '131021', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1787, 'Industrial Estate Kundli', '131028', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1788, 'Karnal', '132001', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1789, 'Indri', '132041', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1790, 'Samalkha', '132101', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1791, 'Panipat', '132103', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1792, 'Panipat Khadi Ashram', '132104', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1793, 'Panipat NFL', '132106', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1794, 'Taraori', '132116', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1795, 'Panipat Refinary', '132140', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1796, 'Ambala G.P.O.', '133001', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1797, 'Kuldeep Nagar', '133004', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1798, 'Babyal', '133005', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1799, 'Ind-estate', '133006', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1800, 'Ambala City', '134003', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1801, 'Baldev Nagar', '134007', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1802, 'Chandi Mandir', '134107', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1803, 'G.K. Panchkula', '134108', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1804, 'Panchkula Sector 8', '134109', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1805, 'Panchkula Sector 4', '134112', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1806, 'Sector 15 Panchkula', '134113', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1807, 'Mansa  Devi Sec-5', '134114', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1808, 'Panchkula Sector 12', '134115', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1809, 'Sector 20 Panchkula', '134116', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1810, 'Yamunanagar', '135001', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1811, 'Jagdhari Work Shop', '135002', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1812, 'Jagadhri', '135003', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1813, 'Pundri', '136026', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1814, 'Kaithal', '136027', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1815, 'Chika', '136034', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1816, 'Pehowa', '136128', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1817, 'Ladwa', '136132', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1818, 'Shahabad(M)', '136135', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1819, 'Nangal Dam', '140124', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1820, 'Bhanam', '140126', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1821, 'Rajpura', '140401', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1822, 'Lalru', '140501', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1823, 'Derabassi', '140507', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1824, 'Zirakpur', '140603', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1825, 'Ludhiana', '141001', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1826, 'Model Town (Ludhiana)', '141002', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1827, 'Shimlapuri', '141003', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1828, 'P.A.U.', '141004', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1829, 'Gne College', '141006', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1830, 'Basti Jodhewal', '141007', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1831, 'Madhopuri', '141008', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1832, 'Moti Nagar', '141010', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1833, 'Rajguru Nagar', '141012', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1834, 'Basant Avenue', '141013', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1835, 'Daba Road', '141014', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1836, 'Mundian Kalan', '141015', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1837, 'Lohora', '141016', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1838, 'Jugiana', '141017', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1839, 'Amritsar G.P.O.', '143001', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1840, 'Khalsa College', '143002', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1841, 'J.F.Mill', '143003', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1842, 'Guru Nanak Dev University', '143005', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1843, 'New Amritsar', '143006', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1844, 'Rayon & Silk Mill', '143104', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1845, 'Batala', '143505', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1846, 'Gurdaspur', '143521', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1847, 'Jalandhar City', '144001', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1848, 'Athola', '144002', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1849, 'Model Town (Jalandhar)', '144003', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1850, 'Hoshiarpur Road', '144004', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1851, 'Jalandhar Cantt', '144005', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1852, 'BSF Campus', '144006', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1853, 'Ladhewali', '144007', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1854, 'Adarsh Nagar (Jalandhar)', '144008', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1855, 'Chogitti', '144009', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1856, 'Dhanowali', '144010', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1857, 'R.E.C. Jalandhar', '144011', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1858, 'Reru', '144012', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1859, 'Nagra (Jalandhar)', '144013', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1860, 'Tower Town Colony', '144014', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1861, 'Basti Bawa Khel', '144021', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1862, 'Garha (Jalandhar)', '144022', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1863, 'Dakoha', '144023', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1864, 'Suranussi', '144027', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1865, 'Rurka Kalan', '144031', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1866, 'Samrai', '144032', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1867, 'Jandiala', '144033', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1868, 'Bundala (Jalandhar)', '144034', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1869, 'Partappura', '144035', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1870, 'Bilga', '144036', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1871, 'Pasla', '144037', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1872, 'Nurmahal', '144039', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1873, 'Nakoder', '144040', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1874, 'Mehatpur (Jalandhar)', '144041', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1875, 'Shankar', '144042', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1876, 'Sarih', '144043', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1877, 'Sidhwan R.S.', '144044', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1878, 'Tanda (Gurdaspur)', '144203', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1879, 'Mukerian', '144211', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1880, 'Talwara Township', '144216', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1881, 'Dhesian Kahna', '144311', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1882, 'Phagwara', '144401', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1883, 'Satnampura', '144402', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1884, 'Ranipur (Kapurthala)', '144403', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1885, 'Narur', '144405', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1886, 'Domeli', '144407', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1887, 'Panchhat', '144408', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1888, 'Phillaur', '144410', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1889, 'Apra', '144416', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1890, 'Baharwal', '144505', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1891, 'Mahil Gailan', '144506', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1892, 'Mokandpur', '144507', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1893, 'Naura', '144508', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1894, 'Nawanshahar', '144514', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1895, 'Jadla', '144515', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1896, 'Rahon', '144517', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1897, 'Saroa', '144524', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1898, 'Mehandpur', '144526', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1899, 'Garhshanker', '144527', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1900, 'Rampur Bilron', '144528', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1901, 'Kapurthala', '144601', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1902, 'Rail Coach Factory', '144602', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1903, 'Sheikhupur (Kapurthala)', '144620', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1904, 'Begowal', '144621', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1905, 'Bholath', '144622', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1906, 'Kala Sanghian', '144623', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1907, 'Nadala', '144624', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1908, 'Sidhwan Dona', '144625', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1909, 'Dalla', '144626', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1910, 'Thatha Jadid', '144628', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1911, 'Lohian', '144629', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1912, 'Bopa Rai Kalan (Jalandhar)', '144630', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1913, 'Chachoki', '144632', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1914, 'Shahkot', '144702', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1915, 'Jagatjit Nagar', '144802', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1916, 'Dialpur', '144803', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1917, 'Dhilwan', '144804', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1918, 'Pattar Kalan', '144806', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1919, 'Raipur Pir Bux Wala', '144819', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1920, 'Pathankot', '145001', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1921, 'Hoshiarpur', '146001', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1922, 'Sadhu Ashram', '146021', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1923, 'Piplanwala', '146022', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1924, 'Bajwara', '146023', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1925, 'Factory Area Chohal', '146024', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1926, 'Purhiran', '146111', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1927, 'Patiala', '147001', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1928, 'University(Patiala)', '147002', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1929, 'Gurbax Colony', '147003', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1930, 'Tripri', '147004', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1931, 'Majithia Enclave', '147005', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1932, 'Nabha', '147201', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1933, 'Mandigobindgarh', '147301', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1934, 'Sangrur', '148001', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1935, 'Malerkotla', '148023', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1936, 'Alloarakh', '148026', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1937, 'Barnala', '148101', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1938, 'Bathinda', '151001', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1939, 'Gndtp Bathinda', '151002', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1940, 'Nfl Bathinda', '151003', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1941, 'Bathinda Cantt', '151004', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1942, 'Railway Colony (Bathinda)', '151005', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1943, 'Bhucho Mandi', '151101', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1944, 'Ballian Wali', '151103', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1945, 'Goniana Mandi', '151201', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1946, 'Faridkot', '151203', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1947, 'Kotkapura', '151204', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1948, 'Raman', '151301', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1949, 'Mansa (Mansa)', '151505', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1950, 'Ferozepur', '152001', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1951, 'Ferozepur City', '152002', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1952, 'Jalalabad (W)', '152024', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1953, 'Muktsar', '152026', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1954, 'Gidderbaha', '152101', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1955, 'Malout', '152107', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1956, 'Abohar', '152116', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1957, 'Fazilka', '152123', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1958, 'Vidhansadan', '160001', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1959, 'Hallomajra', '160002', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1960, 'Aerodrome', '160003', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1961, 'Airforce Highground', '160004', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1962, 'Sector 8(Chandgarh)', '160009', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1963, 'Sector 10 (Chandigarh)', '160011', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1964, 'Sector 12 (Chandigarh)', '160012', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1965, 'Sector 14 (Chandigarh)', '160014', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1966, 'Sector 15 Chandigarh', '160015', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1967, 'Chandigarh G.P.O.', '160017', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1968, 'Sector 18 (Chandigarh)', '160018', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1969, 'Sector 19 (Chandigarh)', '160019', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1970, 'Sector 20 (Chandigarh)', '160020', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1971, 'Sector 21 (Chandigarh)', '160022', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1972, 'Sector 23 ( Chandigarh)', '160023', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1973, 'Maloya Colony', '160025', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1974, 'Sector 29 (Chandigarh)', '160030', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1975, 'Sector 36 (Chandigarh)', '160036', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1976, 'Sector 44 (Chandigarh)', '160047', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1977, 'Chandigarh Sector 55', '160055', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1978, 'Chandigarh Sector 59', '160059', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1979, 'Chandigarh Sector 61', '160062', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1980, 'Chandigarh Sector 71', '160071', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1981, 'Manimajra', '160101', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1982, 'Naya Gaon (Mohali)', '160103', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1983, 'Ambedkarchowk', '171004', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1984, 'New Shimla', '171009', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1985, 'Baddi', '173205', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1986, 'Chambaghat', '173213', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1987, 'Una', '174303', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1988, 'Mehatpur (Una)', '174315', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1989, 'Dari', '176057', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1990, 'Dharamsala Cantt', '176216', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1991, 'Khaniara', '176218', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1992, 'Jammu', '180001', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1993, 'Talab Tillo', '180002', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1994, 'Jammu Cantt', '180003', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1995, 'Gandhinagar', '180004', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1996, 'Karan Nagar (Jammu)', '180005', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1997, 'Bain Bajalta', '180006', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1998, 'Janipur', '180007', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(1999, 'Gangyal', '180010', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(2000, 'Sainik Colony', '180011', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(2001, 'New Fruit Market', '180012', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(2002, 'Roopnagar Jammu Tawi', '180013', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(2003, 'Chani Himat', '180015', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(2004, 'Miran Sahib', '181101', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(2005, 'Paloura', '181121', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(2006, 'Bantalab', '181123', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(2007, 'Bsf Camp Paloura', '181124', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(2008, 'Bari Brahmna', '181133', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(2009, 'Bathindi', '181152', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(2010, 'Muthi', '181205', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(2011, 'Udhampur', '182101', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(2012, 'Garhi (Udhampur)', '182121', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(2013, 'Kishtwar', '182204', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(2014, 'Katra (Udhampur)', '182301', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(2015, 'Reasi', '182311', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(2016, 'Kathua', '184101', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(2017, 'I/e Kathua', '184102', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(2018, 'Mini Sectt Kathua', '184104', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(2019, 'Samba', '184121', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(2020, 'Dialachak', '184144', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(2021, 'Rajouri', '185131', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(2022, 'Sunderbani', '185153', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(2023, 'Srinagar G.P.O.', '190001', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(2024, 'Fateh Kadal', '190002', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(2025, 'Rainawari', '190003', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(2026, 'Batwara', '190004', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(2027, 'Sanat Nagar', '190005', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(2028, 'Kashmir University', '190006', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(2029, 'Sk Airport', '190007', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(2030, 'Jawahar Nagar (Srinagar)', '190008', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(2031, 'Batamaloo', '190009', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(2032, 'Karan Nagar (Srinagar)', '190010', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(2033, 'Noushara', '190011', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(2034, 'Zainakote', '190012', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(2035, 'Hyderpora', '190014', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(2036, 'Natipora', '190015', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(2037, 'Parimpora', '190017', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(2038, 'Pantha Chowk', '191101', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(2039, 'Wuyan', '191102', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(2040, 'Ganderbal', '191201', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(2041, 'Anantnag', '192101', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(2042, 'Khanabal', '192102', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(2043, 'Seer Kanil Gund', '192129', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(2044, 'Pulwama', '192301', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(2045, 'Shopin', '192303', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(2046, 'Baramulla', '193101', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(2047, 'Sopore', '193201', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(2048, 'Kupwara', '193222', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(2049, 'Magam', '193401', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(2050, 'Ghaziabad', '201001', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(2051, 'Vivekanand Nagar', '201002', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(2052, 'Meerut Road', '201003', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(2053, 'Hindon Air Field', '201004', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(2054, 'Sahibabad', '201005', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(2055, 'Chikamberpur', '201006', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(2056, 'Mohan Nagar (Ghaziabad)', '201007', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(2057, 'Ghaziabad City', '201009', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(2058, 'Bharat Nagar (Ghaziabad)', '201010', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(2059, 'Chander Nagar', '201011', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(2060, 'Kaushambi', '201012', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(2061, 'Shipra Sun City', '201014', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(2062, 'Modi Nagar', '201204', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(2063, 'Noida', '201301', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(2064, 'Noida Sector 30', '201303', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(2065, 'Maharishi Nagar', '201304', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(2066, 'Nepz Post Office', '201305', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(2067, 'I.A. Surajpur', '201306', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(2068, 'Noida Sector 34', '201307', 'N', '2014-02-01 04:48:02', '1', 'Y'),
(2069, 'Noida Sector 62', '201309', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2070, 'Aligarh Muslim University', '202002', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2071, 'Bilari', '202411', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2072, 'Chandausi', '202412', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2073, 'Bulandshahr', '203001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2074, 'Kanpur', '208001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2075, 'Nawabganj', '208002', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2076, 'Anwarganj', '208003', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2077, 'Kanpur Cantt.', '208004', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2078, 'Hns Nagar', '208005', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2079, 'Govind Nagar (Kanpur Nagar)', '208006', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2080, 'Harjinder Nagar', '208007', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2081, 'Chakeri Aerodrum', '208008', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2082, 'Armapore', '208009', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2083, 'Shiwans Tanney', '208010', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2084, 'Yashoda Nagar', '208011', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2085, 'Kaushalpuri', '208012', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2086, 'Dmsrde', '208013', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2087, 'Juhi Colony', '208014', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2088, 'New Pac Lines', '208015', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2089, 'Iit', '208016', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2090, 'Nsi', '208017', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2091, 'Rawatpur', '208019', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2092, 'Panki (Kanpur Nagar)', '208020', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2093, 'N H Road', '208021', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2094, 'Ratan Lal Nagar', '208022', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2095, 'Munshipurwa', '208023', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2096, 'Bima Vihar', '208024', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2097, 'Naveen Nagar', '208025', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2098, 'Indira Nagar (Kanpur Nagar)', '208026', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2099, 'Barra', '208027', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2100, 'Fatehgarh', '209601', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2101, 'Central Jail', '209602', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2102, 'Aligarh (Farrukhabad)', '209621', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2103, 'Amratpur', '209622', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2104, 'Gurusahaiganj', '209722', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2105, 'Chhipatti', '209725', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2106, 'Makrand Nagar', '209726', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2107, 'Saraimira', '209727', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2108, 'Sikanderpur (Kannauj)', '209729', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2109, 'Tirwa', '209732', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2110, 'Thathia', '209734', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2111, 'Sarai Prayag', '209735', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2112, 'Khairnagar', '209736', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2113, 'Umarda', '209738', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2114, 'Sakrawa', '209747', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2115, 'Unnao', '209801', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2116, 'Nawabganj (Unnao)', '209859', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2117, 'Magarwara', '209862', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2118, 'Banda', '210001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2119, 'Chitrakot', '210204', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2120, 'Agarahunda', '210205', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2121, 'Allahabad', '211001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2122, 'Allahabad Kty.', '211002', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2123, 'Allahabad City', '211003', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2124, 'Cavellary Lines', '211004', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2125, 'Allahabad Fort', '211005', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2126, 'Allahpur', '211006', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2127, 'Agriculture Institute', '211007', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2128, 'Arail', '211008', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2129, 'Udyog Nagar (Allahabad)', '211009', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2130, 'I T I, Naini', '211010', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2131, 'Rajrooppur', '211011', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2132, 'Bamrauli', '211012', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2133, 'Phaphamau', '211013', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2134, 'C D A (P)', '211014', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2135, 'Karela Bagh', '211016', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2136, 'Allahabad High Court', '211017', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2137, 'Public Service Commission', '211018', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2138, 'Ghiya Ngr', '212404', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2139, 'Varanasi', '221001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2140, 'Varanasi Cantt', '221002', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2141, 'Vsi Shivpur', '221003', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2142, 'West Colony', '221004', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2143, 'Malviya Nagar (Varanasi)', '221005', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2144, 'Babatpur Ad', '221006', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2145, 'Sarnath', '221007', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2146, 'Aurangabad (Varanasi)', '221010', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2147, 'Manduadih', '221103', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2148, 'Harhua', '221105', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2149, 'Industrial Estate (Varanasi)', '221106', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2150, 'Bazardiha', '221109', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2151, 'Motinagar (Faizabad)', '224201', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2152, 'Barabanki Sugar Mill', '225002', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2153, 'Lucknow G.P.O.', '226001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2154, 'Arjunganj', '226002', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2155, 'Lucknow Chowk', '226003', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2156, 'Charbagh', '226004', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2157, 'Sujanpura', '226005', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2158, 'Sant Market', '226006', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2159, 'Nadwa', '226007', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2160, 'Sarojini Nagar', '226008', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2161, 'Amausi Ad', '226009', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2162, 'Gomtinagar', '226010', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2163, 'Manaknagar', '226011', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2164, '32 Bn PAC', '226012', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2165, 'Iim Mubarakpur', '226013', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2166, 'Sgpgi', '226014', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2167, 'Cimap', '226015', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2168, 'Ghazipur (Lucknow)', '226016', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2169, 'Alamnagar', '226017', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2170, 'Aminabad Park', '226018', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2171, 'Industria Area Chinhat', '226019', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2172, 'D M Road', '226020', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2173, 'Batha Sabauli', '226021', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2174, 'Kalyanpur (Lucknow)', '226022', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2175, 'Manasnagar', '226023', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2176, 'Aliganj Extension', '226024', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2177, 'B R A University', '226025', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2178, 'Raebarely', '229001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2179, 'ITI (Raebareli)', '229010', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2180, 'Fursatganj', '229302', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2181, 'Munshiganj (Raebareli)', '229405', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2182, 'Mirzapur', '231001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2183, 'Ghazipur', '233001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2184, 'Shahjahanpur', '242001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2185, 'I.A. Babrala', '242021', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2186, 'Powayan', '242401', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2187, 'Bareilly', '243001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2188, 'Air Force Station Bareilly', '243002', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2189, 'Baljati', '243003', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2190, 'ITBP Bareilly', '243004', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2191, 'Marwari Ganj', '243005', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2192, 'R.K.University', '243006', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2193, 'Moradabad', '244001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2194, 'Amroha', '244221', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2195, 'Dhanaura', '244231', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2196, 'Hasanpur (Jyotiba Phule Nagar)', '244241', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2197, 'Chaukhandi', '244713', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2198, 'Ramnagar (Nainital)', '244715', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2199, 'Rampur', '244901', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2200, 'Hapur', '245101', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2201, 'Kotdwara', '246149', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2202, 'Bijnor', '246701', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2203, 'Chandpur', '246725', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2204, 'Nehtaur', '246733', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2205, 'Seohara', '246746', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2206, 'Dhampur', '246761', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2207, 'Nagina (Bijnor)', '246762', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2208, 'Najibabad', '246763', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2209, 'Saharanpur', '247001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2210, 'Dehradun G.P.O.', '248001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2211, 'Clementtown', '248002', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2212, 'Dehradun Cantt', '248003', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2213, 'I.I.P.', '248005', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2214, 'Newforest', '248006', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2215, 'Ambiwala', '248007', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2216, 'Raipur(O.F)', '248008', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2217, 'Rajpur (Dehradun)', '248009', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2218, 'Seemadwar', '248146', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2219, 'Haridwar', '249401', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2220, 'Bahadrabad', '249402', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2221, 'BHEL (Haridwar)', '249403', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2222, 'Ambuwala', '249404', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2223, 'Arya Nagar (Haridwar)', '249407', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2224, 'Meerut Cantt', '250001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2225, 'Meerut City', '250002', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2226, 'I. E. Partapur', '250103', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2227, 'Sitapur', '261001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2228, 'H.S. Mills', '261121', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2229, 'Sittarganj', '262405', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2230, 'Aira Estate', '262722', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2231, 'Haldwani', '263139', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2232, 'Kichha', '263148', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2233, 'Gadarpur', '263152', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2234, 'Rudarpur', '263153', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2235, 'Arogyamandir', '273003', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2236, 'Ashok Nagar (Gorakhpur)', '273004', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2237, 'Gita Press', '273005', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2238, 'Gita Vatika', '273006', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2239, 'Kunraghat', '273008', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2240, 'Gorakhpur University', '273009', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2241, 'M.M.M.E.College', '273010', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2242, 'GR Railway Station', '273012', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2243, 'B.R.D Medical College', '273013', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2244, 'Gorakhnath Mandir', '273015', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2245, 'Shivpur (Gorakhpur)', '273412', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2246, 'Ballia', '277001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2247, 'Agra', '282001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2248, 'Gokulpura', '282002', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2249, 'Agra Fort', '282003', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2250, 'Agra University', '282004', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2251, 'New Agra', '282005', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2252, 'Bamrauli Katara', '282006', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2253, 'Sikandra (Agra)', '282007', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2254, 'Kheria Airport', '282008', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2255, 'C.O.D.', '282009', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2256, 'Shahaganj (Agra)', '282010', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2257, 'Firozabad', '283203', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2258, 'Bundelkhand University', '284128', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2259, 'Orai', '285001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2260, 'Alwar', '301001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2261, 'MOTIDOONGRI', '301002', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2262, 'Khazuri Bass', '301018', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2263, 'Bhiwadi', '301019', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2264, 'Matasya Ind. Area', '301030', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2265, 'Khairthal', '301404', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2266, 'Kishan Garh Bass', '301405', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2267, 'Ballupura', '301408', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2268, 'Bahror', '301701', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2269, 'Majari Kalan', '301703', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2270, 'Mandhan', '301704', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2271, 'Neemrana', '301705', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2272, 'Shahjahanpur', '301706', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2273, 'Tapukara', '301707', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2274, 'Kutina', '301708', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2275, 'Jaipur G.P.O.', '302001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2276, 'Amer Road', '302002', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2277, 'Jaipur City', '302003', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2278, 'Jawahar Nagar', '302004', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2279, 'High Court (Jaipur)', '302005', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2280, 'Jaipur R.S.', '302006', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2281, 'Jhotwara', '302012', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2282, 'Akhepura', '302013', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2283, 'Gandhi Nagar (Jaipur)', '302015', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2284, 'Shastri Nagar', '302016', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2285, 'Malviya Nagar (Jaipur)', '302017', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2286, 'Durgapura', '302018', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2287, 'Shyam Nagar (Jaipur)', '302019', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2288, 'Mansarovar', '302020', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2289, 'Vaishali Nagar', '302021', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2290, 'Sitapura Industrial Area', '302022', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2291, 'Jagatpura', '302025', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2292, 'Pratap Nagar Housing Board', '302033', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2293, 'Ananantwada', '303313', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2294, 'Ajmer', '305001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2295, 'Adarsh Nagar (Ajmer)', '305002', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2296, 'Ajai Nagra', '305003', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2297, 'Chorsiawas', '305004', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2298, 'Crpf Ajmer', '305005', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2299, 'Gc Road Ajmer', '305007', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2300, 'Pushkar', '305022', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2301, 'Nasirabad', '305601', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2302, 'Madanganj Kishangarh', '305801', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2303, 'Dhan Mandi - Kishan Garh', '305802', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2304, 'Beawar [Raj]', '305901', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2305, 'Pali Marwar', '306401', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2306, 'Bhilwara', '311001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2307, 'Suwana', '311011', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2308, 'Chittorgarh', '312001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2309, 'Cement Factory', '312021', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2310, 'Udaipur Station Road', '313001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2311, 'Udaipur H Magri', '313002', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2312, 'Udaipur Industrial Area', '313003', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2313, 'Udaipur', '313004', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2314, 'Badgaon', '313011', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2315, 'Bharatpur', '321001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2316, 'Kota', '324001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2317, 'Kota Jn.', '324002', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2318, 'Industerial Estate Kota', '324003', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2319, 'Udyog Puri Kota', '324004', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2320, 'Mahaveer Nagar Kota', '324005', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2321, 'Kota City', '324006', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2322, 'New Grain Mandi Kota', '324007', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2323, 'Thermal Colony Kota', '324008', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2324, 'Dadabari Kota', '324009', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2325, 'Banswara', '327001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2326, 'Churu', '331001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2327, 'Ramgarh Bazar', '331024', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2328, 'Sikar', '332001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2329, 'Khoor', '332023', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2330, 'Losal', '332025', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2331, 'Piprali', '332027', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2332, 'Banthod', '332301', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2333, 'Bagri', '332311', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2334, 'Ranoli (Sikar)', '332403', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2335, 'Bhopatpura', '332404', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2336, 'Khatushyamjika', '332602', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2337, 'Danta', '332702', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2338, 'Danta Ramgarh', '332703', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2339, 'Athbigha', '332709', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2340, 'Bhudoli', '332713', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2341, 'Srimadhopur', '332715', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2342, 'Bikaner', '334001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2343, 'Pawanpuri (Bikaner)', '334003', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2344, 'Bangalanagar', '334004', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2345, 'Bichhwal Ind.Area', '334006', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2346, 'Sriganganagar', '335001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2347, 'Hanumangarh Jn.', '335512', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2348, 'Amarpura Theri', '335513', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2349, 'Nagaur', '341001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2350, 'Jodhpur', '342001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2351, 'Gandhi Maidan', '342003', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2352, 'Jhalamand', '342005', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2353, 'Jodhpur Laxmi Nagar', '342006', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2354, 'Jodhpur K.U.M. Mandore Road', '342007', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2355, 'Nandanwan', '342008', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2356, 'Jodhpur Agency', '342011', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2357, 'Boranada', '342012', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2358, 'Sangaria (Jodhpur)', '342013', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2359, 'Shergarh (Jodhpur)', '342022', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2360, 'Balesar', '342023', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2361, 'Soorsagar', '342024', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2362, 'Setrawa', '342025', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2363, 'Jodhpur BSF Trg Centre', '342026', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2364, 'Banar', '342027', 'N', '2014-02-01 04:48:03', '1', 'Y');
INSERT INTO `tbl_zip_location` (`zip_location_id`, `location_name`, `zip_code`, `cod`, `added_date`, `status`, `xls_type`) VALUES
(2365, 'Tena', '342028', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2366, 'Rajkot', '360001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2367, 'Kherdi', '360002', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2368, 'Anandpar Navagam', '360003', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2369, 'Mavdi', '360004', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2370, 'Rajkot Sau Uni Area', '360005', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2371, 'Rajkot Bhomeshwar Plot', '360006', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2372, 'Rajkot  Raiya Road', '360007', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2373, 'Rajkot Metoda Gidc', '360021', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2374, 'Jasdan', '360050', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2375, 'Jamnagar', '361001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2376, 'Bedeshwar', '361002', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2377, 'Aerodromme', '361003', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2378, 'Udyognagar', '361004', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2379, 'Digvijay Plot', '361005', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2380, 'Khodiyar Colony', '361006', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2381, 'Gulabnagar', '361007', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2382, 'Medical Campus', '361008', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2383, 'Junagadh', '362001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2384, 'Junagadh Joshipura', '362002', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2385, 'Junagadh Bhavnath', '362004', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2386, 'Dolatpara', '362037', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2387, 'Akhodad So', '362220', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2388, 'Keshod Akshaygadh', '362229', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2389, 'Veraval', '362265', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2390, 'Veraval Rayon Factory', '362266', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2391, 'Veraval Udyognagar', '362269', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2392, 'Surendranagar', '363001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2393, 'Surendranagar M.P.S.C.', '363002', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2394, 'Morbi GIDC', '363641', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2395, 'Morbi Ppw', '363642', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2396, 'Bhavnagar', '364001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2397, 'Adhewada', '364002', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2398, 'Bhavnagar Para', '364003', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2399, 'Bhavnagar Chitra', '364004', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2400, 'Bhavnagar Anandnagar', '364005', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2401, 'Bhavnagar Kumbharwada', '364006', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2402, 'Bhuj', '370001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2403, 'Anjar', '370110', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2404, 'Bhachau', '370140', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2405, 'Gandhidham', '370201', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2406, 'Udaynagar', '370203', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2407, 'Adipur', '370205', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2408, 'Kandla Harbour', '370210', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2409, 'Kandla Free Trade Zone', '370230', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2410, 'Mundra', '370421', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2411, 'Ahmedabad G.P.O.', '380001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2412, 'Revdibazar', '380002', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2413, 'Shahpur (Ahmedabad)', '380004', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2414, 'Sabarmati', '380005', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2415, 'Ambawadi (Ahmedabad)', '380006', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2416, 'Anandnagar (Ahmedabad)', '380007', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2417, 'Vasisthnagar', '380008', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2418, 'Navrangpura', '380009', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2419, 'Shastrinagar (Ahmedabad)', '380013', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2420, 'Navjivan', '380014', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2421, 'Ambawadi Vistar', '380015', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2422, 'Meghaningar', '380016', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2423, 'Saraspur', '380018', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2424, 'Railway Colony (Ahmedabad)', '380019', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2425, 'Gomtipur', '380021', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2426, 'Behrampura', '380022', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2427, 'Rakhial', '380023', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2428, 'Asarwa Ext South', '380024', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2429, 'Naroda Road', '380025', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2430, 'Amraiwadi', '380026', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2431, 'Gandhi Ashram (Ahmedabad)', '380027', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2432, 'Bhairavnath Road', '380028', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2433, 'Ghodasar (Ahmedabad)', '380050', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2434, 'Jivraj Park', '380051', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2435, 'Memnagar', '380052', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2436, 'Bodakdev', '380054', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2437, 'Juhapura', '380055', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2438, 'Bopal', '380058', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2439, 'Thaltej', '380059', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2440, 'Gujrat High Court', '380060', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2441, 'Ghatlodia', '380061', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2442, 'Sola H B C', '380063', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2443, '(Gandhinagar) Sector 6', '382006', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2444, '(Gandhinagar) Sector 7', '382007', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2445, 'Gandhinagar (Gujarat)', '382010', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2446, '(Gandhinagar) Sector 16', '382016', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2447, '(Gandhinagar) Sector 19', '382021', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2448, '(Gandhinagar) Sector 22', '382024', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2449, '(Gandhinagar) Sector 28', '382028', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2450, 'Changodar', '382213', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2451, 'Naroda', '382330', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2452, 'Kubernagar B A', '382340', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2453, 'Krishnanagar (Ahmedabad)', '382345', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2454, 'Khodiyarnagar', '382350', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2455, 'Narol', '382405', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2456, 'Odhav', '382415', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2457, 'Chandkheda Society Area', '382424', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2458, 'Aslali', '382427', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2459, 'Vatva', '382440', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2460, 'Isanpur', '382443', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2461, 'Digvijaynagar', '382470', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2462, 'Sardarnagar', '382475', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2463, 'Ranip', '382480', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2464, 'Chandlodia', '382481', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2465, 'Bhildi', '385530', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2466, 'Nadiad', '387001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2467, 'Bilodara', '387002', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2468, 'Anand', '388001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2469, 'Anand Agri Inst  (Anand)', '388110', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2470, 'Vallabh  Vidyanagar', '388120', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2471, 'Vithal Udyognagar', '388121', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2472, 'Karamsad', '388325', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2473, 'Vadodara', '390001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2474, 'Fateganj', '390002', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2475, 'Chemical Industries', '390003', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2476, 'Pratapnagar (Vadodara)', '390004', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2477, 'Fatepura (Vadodara)', '390006', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2478, 'Alkapuri', '390007', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2479, 'Eme', '390008', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2480, 'Sharadnagar', '390009', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2481, 'M.I. Estate', '390010', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2482, 'Manjalpur', '390011', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2483, 'Atladara', '390012', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2484, 'Maneja', '390013', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2485, 'Makarpura', '390014', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2486, 'Industrial Estate (Vadodara)', '390016', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2487, 'Wadi S.N. Road', '390017', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2488, 'Karelibaug', '390018', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2489, 'Ajwa Road', '390019', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2490, 'Akota', '390020', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2491, 'T B Sanatorium', '390021', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2492, 'Harni Colony', '390022', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2493, 'Subhanpura', '390023', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2494, 'Chhani Rd', '390024', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2495, 'Devaliya', '391121', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2496, 'Bajwa', '391310', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2497, 'Jawahar Nagar (Vadodara)', '391320', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2498, 'Petrochemical  T Ship', '391345', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2499, 'Petrochemical', '391346', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2500, 'Ranoli (Vadodara)', '391350', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2501, 'Padra', '391440', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2502, 'Fartilizer Nagar', '391750', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2503, 'Vaghodia', '391760', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2504, 'Tundav', '391775', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2505, 'Bharuch', '392001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2506, 'Ankleshwar', '393001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2507, 'Ankleshwar IE', '393002', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2508, 'Amroli', '394107', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2509, 'Udhna', '394210', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2510, 'Pandesara', '394221', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2511, 'Sachin', '394230', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2512, 'Nandniketan', '394270', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2513, 'Kadodara', '394327', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2514, 'Bhatha', '394510', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2515, 'Kribhconagar', '394515', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2516, 'Adityanagar', '394516', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2517, 'Kosam', '394520', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2518, 'Bardoli', '394601', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2519, 'Nanpura', '395001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2520, 'Khatodara', '395002', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2521, 'Surat', '395003', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2522, 'Dabholi', '395004', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2523, 'Rander', '395005', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2524, 'Varachha Road', '395006', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2525, 'Abhva', '395007', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2526, 'A. K. Road', '395008', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2527, 'Adajan Dn', '395009', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2528, 'Bombay Market', '395010', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2529, 'Bhestan', '395023', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2530, 'Valsad', '396001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2531, 'Atul', '396020', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2532, 'Dharampur (Valsad)', '396050', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2533, 'Killa Pardi', '396125', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2534, 'Umargam', '396170', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2535, 'Udvada R.S.', '396185', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2536, 'Vapi', '396191', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2537, 'Dadra', '396193', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2538, 'Vapi I.E.', '396195', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2539, 'Daman', '396210', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2540, 'Moti Daman', '396220', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2541, 'Silvassa', '396230', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2542, 'Naroli', '396235', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2543, 'Karad Daman Project', '396240', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2544, 'Bilimora', '396321', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2545, 'Kabilpore', '396424', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2546, 'Navsari', '396445', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2547, 'Sisodra', '396463', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2548, 'Satem', '396466', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2549, 'Ugat', '396469', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2550, 'Vedchha', '396472', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2551, 'Vesma', '396475', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2552, 'Anaval', '396510', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2553, 'Chikhli (Navsari)', '396521', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2554, 'Degam', '396530', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2555, 'Fadvel', '396540', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2556, 'Rankuva', '396560', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2557, 'Digendranagar', '396570', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2558, 'Vansda', '396580', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2559, 'Unai', '396590', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2560, 'Mumbai G.P.O.', '400001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2561, 'Kalbadevi', '400002', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2562, 'Masjid', '400003', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2563, 'Girgaon', '400004', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2564, 'Colaba', '400005', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2565, 'Malabar Hill', '400006', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2566, 'Tardeo', '400007', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2567, 'Mumbai Central', '400008', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2568, 'Chinchbunder', '400009', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2569, 'Mazgaon', '400010', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2570, 'Chinchpokli', '400011', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2571, 'Parel', '400012', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2572, 'Delisle Road', '400013', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2573, 'Dadar', '400014', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2574, 'Sewri', '400015', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2575, 'Mahim', '400016', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2576, 'Dharavi', '400017', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2577, 'Worli', '400018', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2578, 'Matunga', '400019', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2579, 'Churchgate', '400020', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2580, 'Nariman Point', '400021', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2581, 'Sion', '400022', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2582, 'Nehru Nagar (Mumbai)', '400024', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2583, 'Prabhadevi', '400025', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2584, 'Gowalia Tank', '400026', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2585, 'V J B Udyan', '400027', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2586, 'Shivaji Park (Mumbai)', '400028', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2587, 'Santacruz P&t Colony', '400029', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2588, 'Worli Sea Face', '400030', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2589, 'Wadala', '400031', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2590, 'Mantralaya (Mumbai)', '400032', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2591, 'Reay Road', '400033', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2592, 'Haji Ali', '400034', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2593, 'Rajbhavan (Mumbai)', '400035', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2594, 'Antop Hill', '400037', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2595, 'Bhandup East', '400042', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2596, 'Shivaji Nagar (Mumbai)', '400043', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2597, 'Juhu', '400049', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2598, 'Bandra West', '400050', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2599, 'Bandra(East)', '400051', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2600, 'Khar Colony', '400052', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2601, 'Andheri', '400053', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2602, 'Santacruz(West)', '400054', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2603, 'Santacruz(East)', '400055', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2604, 'Vileparle(West)', '400056', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2605, 'Vileeparle (East)', '400057', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2606, 'Andheri Railway Station', '400058', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2607, 'J.B. Nagar', '400059', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2608, 'Jogeshwari East', '400060', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2609, 'Vesava', '400061', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2610, 'Goregaon East', '400063', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2611, 'Malad', '400064', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2612, 'Nagari Niwara', '400065', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2613, 'Borivali East', '400066', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2614, 'Charkop', '400067', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2615, 'Dahisar', '400068', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2616, 'Nagardas Road', '400069', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2617, 'Kurla', '400070', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2618, 'Chembur', '400071', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2619, 'Sakinaka', '400072', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2620, 'Mahul Road', '400074', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2621, 'Pant Nagar', '400075', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2622, 'Powai Iit', '400076', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2623, 'Rajawadi', '400077', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2624, 'Bhandup West', '400078', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2625, 'Vikhroli', '400079', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2626, 'Mulund West', '400080', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2627, 'Mulund East', '400081', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2628, 'Mulund Colony', '400082', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2629, 'Kannamwar Nagar', '400083', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2630, 'Barve Nagar', '400084', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2631, 'BARC', '400085', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2632, 'Ghatkopar West', '400086', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2633, 'Nitie', '400087', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2634, 'Govandi', '400088', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2635, 'Tilak Nagar (Mumbai)', '400089', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2636, 'Borivali', '400091', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2637, 'Borivali West', '400092', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2638, 'Chakala Midc', '400093', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2639, 'Anushakti Nagar', '400094', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2640, 'Kharodi', '400095', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2641, 'Seepz', '400096', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2642, 'Malad East', '400097', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2643, 'Vidyanagari', '400098', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2644, 'Airport (Mumbai)', '400099', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2645, 'Kandivali East', '400101', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2646, 'Jogeshwari West', '400102', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2647, 'Mandapeshwar', '400103', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2648, 'Goregaon (Mumbai)', '400104', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2649, 'Thane', '400601', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2650, 'Naupada (Thane)', '400602', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2651, 'Kopri Colony', '400603', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2652, 'Wagle I.E.', '400604', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2653, 'Kalwa', '400605', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2654, 'Jekegram', '400606', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2655, 'Sandozbaugh', '400607', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2656, 'Balkum', '400608', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2657, 'Apna Bazar', '400610', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2658, 'Konkan Bhavan', '400614', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2659, 'Ghansoli', '400701', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2660, 'Turbhe', '400703', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2661, 'Sanpada', '400705', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2662, 'Nerul Sec-48', '400706', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2663, 'Airoli', '400708', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2664, 'Kopar Khairne', '400709', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2665, 'Millenium Business Park', '400710', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2666, 'Bhayander West', '401101', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2667, 'Umbarpada', '401102', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2668, 'Bhayander East', '401105', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2669, 'Mira Road', '401107', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2670, 'Bassein', '401201', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2671, 'Vasai Road E', '401202', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2672, 'Sopara', '401203', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2673, 'Papdi', '401207', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2674, 'Vasai East IE', '401208', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2675, 'Nallosapare E', '401209', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2676, 'Arnala', '401302', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2677, 'Virar', '401303', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2678, 'Panaji', '403001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2679, 'Caranzalem', '403002', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2680, 'Nio Dona Paula', '403004', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2681, 'Santa Cruz', '403005', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2682, 'Ribandar', '403006', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2683, 'Betim', '403101', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2684, 'Neura', '403104', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2685, 'Goa -velha', '403108', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2686, 'N B Verem', '403109', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2687, 'Corlim IE', '403110', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2688, 'Reis Magos', '403114', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2689, 'Cundaim I.E.', '403115', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2690, 'Bambolim Camp', '403201', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2691, 'Bambolim Complex', '403202', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2692, 'Pilar (North Goa)', '403203', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2693, 'St. Lourence', '403204', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2694, 'Goa University', '403206', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2695, 'Ponda', '403401', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2696, 'Velha-goa', '403402', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2697, 'Mardol', '403404', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2698, 'Tisca', '403406', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2699, 'Betora I.E.', '403409', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2700, 'Porvorim', '403501', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2701, 'Tivim', '403502', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2702, 'Mapusa', '403507', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2703, 'Anjuna', '403509', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2704, 'Parra', '403510', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2705, 'Saligao', '403511', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2706, 'Colvale', '403513', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2707, 'Sinquerim', '403515', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2708, 'Calangute', '403516', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2709, 'Siolim', '403517', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2710, 'Secretariat (North Goa)', '403521', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2711, 'Tivim Ie', '403526', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2712, 'Margao', '403601', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2713, 'Fatorda', '403602', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2714, 'Cuncolim', '403703', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2715, 'Navelim', '403707', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2716, 'Colva', '403708', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2717, 'St. Jose De Areal', '403709', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2718, 'Chicalim', '403711', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2719, 'Cansaulim', '403712', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2720, 'Majorda', '403713', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2721, 'Benaulim', '403716', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2722, 'Carmona', '403717', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2723, 'Varca', '403721', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2724, 'Verna', '403722', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2725, 'Zuarinagar', '403726', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2726, 'Navelim Camp', '403729', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2727, 'Cavelossim', '403731', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2728, 'A.P.Terminal', '403801', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2729, 'Vasco-Da-Gama', '403802', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2730, 'Mormugao', '403803', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2731, 'Sada', '403804', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2732, 'Bogmalo', '403806', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2733, 'Kharghar', '410210', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2734, 'Lonavala', '410401', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2735, 'Kamshet', '410405', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2736, 'Chakan', '410501', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2737, 'Rajgurunagar', '410505', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2738, 'Talegaon G H', '410507', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2739, 'Pune', '411001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2740, 'Pune City', '411002', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2741, 'Khadki', '411003', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2742, 'Deccan Gymkhana', '411004', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2743, 'Shivajinagar', '411005', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2744, 'Yerwada', '411006', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2745, 'Aundh', '411007', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2746, 'N.C.L. Pune', '411008', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2747, 'Parvati', '411009', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2748, 'Kasba Peth', '411011', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2749, 'Dapodi', '411012', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2750, 'Hadpsar I.E.', '411013', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2751, 'Vadgaon Sheri', '411014', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2752, 'Vishrantwadi', '411015', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2753, 'Gokhalenagar', '411016', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2754, 'Pimpri Colony', '411017', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2755, 'Nehrunagar', '411018', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2756, 'M.Phulenagar', '411019', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2757, 'Range Hills', '411020', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2758, 'Armament', '411021', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2759, 'Srpf', '411022', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2760, 'Bhosari I.E.', '411026', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2761, 'Aundh Camp', '411027', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2762, 'Hadapsar', '411028', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2763, 'Sadashiv Peth', '411030', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2764, 'C M E', '411031', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2765, 'Airport (Pune)', '411032', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2766, 'Chinchwadga0n', '411033', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2767, 'Kasarwadi', '411034', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2768, 'Akurdi', '411035', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2769, 'Mundhva AV', '411036', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2770, 'Market Yard (Pune)', '411037', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2771, 'Kothrud', '411038', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2772, 'Bhosarigoan', '411039', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2773, 'Wanowarie', '411040', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2774, 'Vadgaon Budruk', '411041', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2775, 'Swargate', '411042', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2776, 'Dhankawadi', '411043', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2777, 'Yamunanagar', '411044', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2778, 'N.I.A.', '411045', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2779, 'Katraj', '411046', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2780, 'Lohogaon', '411047', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2781, 'N I B M', '411048', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2782, 'Anandnagar (Pune)', '411051', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2783, 'Karvenagar', '411052', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2784, 'Infotech  Park (Hinjawadi)', '411057', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2785, 'Warje', '411058', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2786, 'Dehu Road Cantt', '412101', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2787, 'Vadgaon (Pune)', '412106', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2788, 'Loni Kalbhor', '412201', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2789, 'Vagholi', '412207', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2790, 'Talegaon Dhamdhere', '412208', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2791, 'Koregaon Bhima', '412216', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2792, 'Midc Ranjangaon Ganpati', '412220', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2793, 'Manjari Farm', '412307', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2794, 'Phursungi', '412308', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2795, 'Wai', '412803', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2796, 'Panchagani', '412805', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2797, 'Mahabaleshwar', '412806', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2798, 'Solapur', '413001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2799, 'Solapur Mkt', '413002', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2800, 'Zilla Nayalaya Solapur', '413003', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2801, 'Jule Solapur', '413004', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2802, 'Market Yard Solapur', '413005', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2803, 'Midc Solapur', '413006', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2804, 'Solapur City', '413007', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2805, 'Jamkhed', '413201', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2806, 'Osmanabad', '413501', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2807, 'Murud', '413510', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2808, 'Ahmedpur (Latur)', '413515', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2809, 'Awalkonda', '413517', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2810, 'Nilanga', '413521', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2811, 'Tilaknagar Latur', '413531', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2812, 'Shrigonda', '413701', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2813, 'Rahuri', '413705', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2814, 'Rahuri Factory', '413706', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2815, 'Shrirampur', '413709', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2816, 'Kolhar (Ahmed Nagar)', '413710', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2817, 'Loni Kurd', '413713', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2818, 'Belapur', '413715', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2819, 'Deolali -pravara', '413716', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2820, 'Tilaknagar (Ahmed Nagar)', '413720', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2821, 'Rahuri MPKV', '413722', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2822, 'Loni Bk', '413736', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2823, 'Babhleshwar', '413737', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2824, 'Ahmednagar', '414001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2825, 'Ahmednagar Camp', '414002', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2826, 'Savedi Road', '414003', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2827, 'Ahmednagar R.S.', '414005', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2828, 'Tisgaon', '414106', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2829, 'Chichondi Patil', '414201', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2830, 'Supa (Ahmed Nagar)', '414301', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2831, 'Parner', '414302', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2832, 'Vridheshwar SSK', '414505', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2833, 'Nevasa', '414603', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2834, 'Kashti', '414701', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2835, 'Satara', '415001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2836, 'Mangalwar Peth Satara', '415002', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2837, 'Sangamnagar Satara', '415003', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2838, 'Midc Satara', '415004', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2839, 'Karad', '415110', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2840, 'Vite', '415311', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2841, 'Chiplun', '415605', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2842, 'Ratnagiri', '415612', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2843, 'Bhoke', '415639', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2844, 'Dapoli', '415712', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2845, 'Kolhapur RS', '416001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2846, 'Shaniwar Peth (Kolhapur)', '416002', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2847, 'Kolhapur', '416003', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2848, 'Shivaji University', '416004', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2849, 'Gur Market Yard', '416005', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2850, 'Kasba Bavada', '416006', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2851, 'Kalamba', '416007', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2852, 'Rajarampuri', '416008', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2853, 'Phulewadi', '416010', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2854, 'Jaysingpur', '416101', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2855, 'Hatkalangada', '416109', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2856, 'Jawaharnagar Ichalkaranji', '416117', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2857, 'R K Nagar Ichalkaranji', '416121', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2858, 'Ashte', '416301', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2859, 'Palus', '416310', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2860, 'Madhavnagar', '416406', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2861, 'Miraj', '416410', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2862, 'Willingdon College Sangli', '416415', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2863, 'Sangli', '416416', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2864, 'Kupwad MIDC Area', '416436', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2865, 'Ulhasnagar-1', '421001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2866, 'Ulhasnagar-2', '421002', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2867, 'Ulhasnagar-4', '421004', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2868, 'Ulhasnagar-5', '421005', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2869, 'Dombivali', '421201', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2870, 'Vishnunagar', '421202', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2871, 'Dombivali I.A.', '421203', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2872, 'Manpada', '421204', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2873, 'Kalyan City', '421301', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2874, 'Dandekarwadi', '421302', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2875, 'Ganeshwadi (Thane)', '421306', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2876, 'Ambernath', '421501', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2877, 'O.E.Ambernath', '421502', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2878, 'Nashik', '422001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2879, 'Gole Colony', '422002', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2880, 'Panchvati', '422003', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2881, 'Akrale', '422004', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2882, 'H P T College', '422005', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2883, 'Gandhi Nagar (Nashik)', '422006', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2884, 'Satpur Township', '422007', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2885, 'Trimurti Chowk', '422008', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2886, 'Indira Nagar (Nashik)', '422009', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2887, 'Ambad A.S.', '422010', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2888, 'Dwarka Corner', '422011', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2889, 'Sawarkar Nagar', '422013', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2890, 'Nashik Road', '422101', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2891, 'Nashik Road Camp', '422102', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2892, 'Sinnar', '422103', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2893, 'TP Station Eklahre', '422105', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2894, 'Ind. Est. Malegaon Sinnar', '422113', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2895, 'Ojhar', '422206', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2896, 'Ojhar T.S.', '422207', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2897, 'Pimpalgaon Baswant', '422209', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2898, 'Ojhar A.F. Stn.', '422221', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2899, 'Vinchur', '422305', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2900, 'Lasalgaon', '422306', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2901, 'Ghoti', '422402', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2902, 'Igatpuri', '422403', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2903, 'Akole', '422601', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2904, 'Sangamner', '422605', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2905, 'Chandwad', '423101', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2906, 'Malegaon Camp', '423105', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2907, 'Nandgaon', '423106', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2908, 'Rahata', '423107', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2909, 'Kopergaon', '423601', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2910, 'Kolpewadi', '423602', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2911, 'Dhule', '424001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2912, 'Dhule Deopur', '424002', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2913, 'Dhule Market Yard', '424004', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2914, 'Dhule Midc', '424006', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2915, 'Chalisgaon', '424101', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2916, 'Bhadgaon', '424105', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2917, 'Pachora', '424201', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2918, 'Jamner (Jalgaon)', '424206', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2919, 'Mohadi Laling', '424311', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2920, 'Jalgaon', '425001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2921, 'M.J.College Jalgaon', '425002', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2922, 'Audyogik Vasahat Jalgaon', '425003', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2923, 'Dharangaon (Jalgaon)', '425105', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2924, 'Chopda', '425107', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2925, 'Erandol', '425109', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2926, 'Parola', '425111', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2927, 'Bhusawal', '425201', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2928, 'Yawal', '425301', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2929, 'Varangaon', '425305', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2930, 'Old Muktainagar', '425306', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2931, 'Deepnagar', '425307', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2932, 'Amalner (Jalgaon)', '425401', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2933, 'Shirpur', '425405', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2934, 'Dondaicha', '425408', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2935, 'Nandurbar', '425412', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2936, 'Savda', '425502', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2937, 'Faizpur', '425503', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2938, 'Aurangabad (MH)', '431001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2939, 'Aurangabad Cantonment', '431002', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2940, 'Nizamganj', '431003', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2941, 'Begumpura', '431004', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2942, 'Osmanpura', '431005', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2943, 'Chikalthana Industrial Area', '431006', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2944, 'Chikalthana', '431007', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2945, 'Ellora', '431102', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2946, 'Waluj', '431133', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2947, 'Bajaj Nagar Midc Waluj', '431136', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2948, 'Jalna', '431203', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2949, 'Dadahari Wadgaon', '431515', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2950, 'Ambajogai', '431517', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2951, 'Parli Tps', '431520', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2952, 'Nagpur GPO', '440001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2953, 'Nagpur City', '440002', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2954, 'Imamwada', '440003', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2955, 'Bezonbagh', '440004', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2956, 'Nagpur Airport', '440005', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2957, 'Seminary Hills', '440006', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2958, 'Vayusena Nagar', '440007', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2959, 'Bagadganj', '440008', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2960, 'Dighori Naka', '440009', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2961, 'Gandhi Nagar (Nagpur)', '440010', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2962, 'Congress Nagar (Nagpur)', '440012', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2963, 'Borgaon Road', '440013', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2964, 'Jaripatka', '440014', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2965, 'Narendra Nagar (Nagpur)', '440015', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2966, 'Indl.Area Nagpur', '440016', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2967, 'Dr.Ambedkar Marg', '440017', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2968, 'Mominpura', '440018', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2969, 'C.R.P.F. Nagpur', '440019', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2970, 'Neeri', '440020', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2971, 'A.D. Project', '440021', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2972, 'Laxmi Nagar (Nagpur)', '440022', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2973, 'Wadi (Nagpur)', '440023', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2974, 'Ayodhya Nagar', '440024', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2975, 'Ujwal Nagar (Nagpur)', '440025', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2976, 'Uppalwadi', '440026', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2977, 'Parvati Nagar', '440027', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2978, 'MIDC Nagpur', '440028', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2979, 'Mankapur (Nagpur)', '440030', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2980, 'Mahal (Nagpur)', '440032', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2981, 'University Campus (Nagpur)', '440033', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2982, 'Mhalginagar', '440034', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2983, 'Kalmna Market Yard', '440035', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2984, 'Kamthi', '441001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2985, 'Kamthi City', '441002', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2986, 'Industrial Area Butibori', '441122', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2987, 'Gondia', '441601', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2988, 'Gondia City', '441614', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2989, 'Tirora', '441911', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2990, 'Wardha', '442001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2991, 'Wardha Ganj', '442003', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2992, 'Manas Mandir-Wardha', '442005', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2993, 'Akpo Wardha', '442006', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2994, 'Sewagram', '442102', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2995, 'Chandrapur', '442401', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2996, 'Pathanpura', '442402', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2997, 'Babupeth', '442403', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2998, 'Amravati', '444601', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(2999, 'Amravati Camp', '444602', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3000, 'Shivaji Nagar (Amravati)', '444603', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3001, 'V.M.V. (Amravati)', '444604', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3002, 'Rajapeth', '444605', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3003, 'Congress Nagar (Amravati)', '444606', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3004, 'Badnera Town', '444607', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3005, 'Badnera', '444701', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3006, 'Paratwada', '444805', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3007, 'Achalpur City', '444806', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3008, 'Nandgaon Peth', '444901', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3009, 'Chandur Railway', '444904', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3010, 'Yavatmal', '445001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3011, 'Indore G.P.O.', '452001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3012, 'Indore Cloth Market', '452002', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3013, 'Indore Malwa Mill', '452003', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3014, 'Bijasan Road', '452005', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3015, 'Army Head Quarter', '452006', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3016, 'Indore Nagar', '452007', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3017, 'Lokmanya Nagar Indore', '452009', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3018, 'Indore DDU Nagar', '452010', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3019, 'Indore R.S.S.Nagar', '452011', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3020, 'Rajendra Nagar (Indore)', '452012', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3021, 'Indore Cat', '452013', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3022, 'Khatiwala Tank', '452014', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3023, 'Indore Industrial Area', '452015', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3024, 'Indore Kanadia Road', '452016', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3025, 'Indore Tillaknagar', '452018', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3026, 'Kasturbagram', '452020', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3027, 'Rao', '453331', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3028, 'Pithampur III', '454774', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3029, 'Pithampur', '454775', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3030, 'Dewas', '455001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3031, 'Ujjain', '456001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3032, 'Ujjain  Bherugarh', '456003', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3033, 'Ujjain  City', '456006', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3034, 'Ujjain  Kothi', '456010', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3035, 'Ratlam', '457001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3036, 'Neemuch', '458441', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3037, 'Athanair', '460110', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3038, 'Sarni', '460447', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3039, 'Sp Mills Hoshangabad', '461005', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3040, 'Seoni Malwa', '461223', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3041, 'Bhopal G.P.O.', '462001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3042, 'Vidya Vihar', '462002', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3043, 'C.T.T.Nagar', '462003', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3044, 'Satpura', '462004', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3045, 'M.A.C.T.', '462007', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3046, 'Barkhedi', '462008', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3047, 'Balampur', '462010', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3048, 'Arera Hills', '462011', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3049, 'Regional College', '462013', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3050, '1100 Qrts.', '462016', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3051, 'Bhel', '462022', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3052, 'Govindpura', '462023', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3053, 'H.E. Hospital', '462024', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3054, 'University (Bhopal)', '462026', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3055, 'Dak Bhawan', '462027', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3056, 'Air Port', '462030', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3057, '3 EME Centre', '462031', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3058, 'Gandhi Nagar (Bhopal)', '462036', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3059, 'Peoples Campus', '462037', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3060, 'M.L. Nagar', '462038', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3061, 'Trilanga', '462039', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3062, 'Ayodhaya Nagar', '462041', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3063, 'Kolar Road', '462042', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3064, 'Mandideep', '462046', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3065, 'Vidisha', '464001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3066, 'Sagar Cantt', '470001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3067, 'Sagar City', '470002', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3068, 'Sagar University', '470003', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3069, 'Sagar Makronia Camp', '470004', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3070, 'Guna', '473001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3071, 'Shivpuri', '473551', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3072, 'Lashkar', '474001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3073, 'Defence Colony (Gwalior)', '474002', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3074, 'Gwalior City', '474003', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3075, 'Birla Nagar', '474004', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3076, 'Gwalior Residency', '474005', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3077, 'Morar', '474006', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3078, 'Moti Mahal', '474007', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3079, 'Gwalior Fort', '474008', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3080, 'Phalka Bazar', '474009', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3081, 'Moti Jheel', '474010', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3082, 'R.K Puri Gwalior', '474011', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3083, 'S.P. Ashram', '474012', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3084, 'Bahadurpur', '474020', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3085, 'Dabra', '475110', 'N', '2014-02-01 04:48:03', '1', 'Y');
INSERT INTO `tbl_zip_location` (`zip_location_id`, `location_name`, `zip_code`, `cod`, `added_date`, `status`, `xls_type`) VALUES
(3086, 'Bhandair', '475335', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3087, 'Morena', '476001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3088, 'Bhind', '477001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3089, 'Gohad', '477116', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3090, 'Malanpur', '477117', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3091, 'Ibsb Bhilai', '490001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3092, 'Civic Centre Bhilai', '490006', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3093, 'Bhilai West', '490009', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3094, 'Khursipar Bhilai', '490011', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3095, 'Khoka Bhilai', '490023', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3096, 'Durg', '491001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3097, 'Raipur', '492001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3098, 'Mantralaya Raipur', '492002', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3099, 'Urla', '492003', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3100, 'Pandri', '492004', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3101, 'Ravigram', '492006', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3102, 'Shanker Nagar', '492007', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3103, 'W.R.S.Colony', '492008', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3104, 'Raipur Ganj', '492009', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3105, 'Ravi Shankar University', '492010', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3106, 'Sunder Nagar', '492013', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3107, 'Tatibandh', '492099', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3108, 'Hirmi', '493195', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3109, 'Grasim Vihar Rawan', '493196', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3110, 'Watgan', '493229', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3111, 'Rawan', '493331', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3112, 'Hyderabad G.P.O.', '500001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3113, 'Hyderabad Jubilee', '500002', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3114, 'Secunderabad', '500003', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3115, 'Khairatabad', '500004', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3116, 'Crp Camp (Hyderabad)', '500005', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3117, 'Karwan Sahu', '500006', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3118, 'Administrative Buildings', '500007', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3119, 'Appa Himayathsagar', '500008', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3120, 'Manovikasnagar', '500009', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3121, 'Alwal', '500010', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3122, 'Bowenpally', '500011', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3123, 'Afzalgunj', '500012', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3124, 'Amberpet', '500013', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3125, 'Hakimpet', '500014', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3126, 'Trimulgherry', '500015', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3127, 'Begumpet', '500016', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3128, 'Lallapet', '500017', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3129, 'Bharat Nagar Colony', '500018', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3130, 'Lingampalli', '500019', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3131, 'Ashoknagar (Hyderabad)', '500020', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3132, 'EME Records', '500021', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3133, 'Central Secretariat', '500022', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3134, 'Yakutpura', '500023', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3135, 'Sahifa', '500024', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3136, 'Padmaraonagar', '500025', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3137, 'Nehrunagar (Hyderabad)', '500026', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3138, 'Stn Kachiguda', '500027', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3139, 'Murad Nagar (Hyderabad)', '500028', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3140, 'Old Mla Quarters', '500029', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3141, 'Rajendranagar (K.V.Rangareddy)', '500030', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3142, 'Ibrahim Bagh Lines', '500031', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3143, 'Gachibowli', '500032', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3144, 'Jubilee Hills', '500033', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3145, 'Banjara Hills', '500034', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3146, 'Huda Residential Complex', '500035', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3147, 'Malakpet Colony', '500036', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3148, 'Balanagar Township', '500037', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3149, 'Sanjeev Reddy Nagar', '500038', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3150, 'Peerzadiguda', '500039', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3151, 'Aphb Colony Moulali', '500040', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3152, 'Raj Bhawan (Hyderabad)', '500041', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3153, 'Hal (Hyderabad)', '500042', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3154, 'Vidyanagar (Hyderabad)', '500044', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3155, 'A.Gs. Staff Quarters', '500045', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3156, 'CUC', '500046', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3157, 'Anandbagh', '500047', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3158, 'Hyderguda', '500048', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3159, 'Miyapur', '500049', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3160, 'Chandanagar', '500050', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3161, 'Hindustan Cables Ltd', '500051', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3162, 'Svpnpa', '500052', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3163, 'Falaknuma', '500053', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3164, 'HMT Township', '500054', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3165, 'IDA Jeedimetla', '500055', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3166, 'Neredmet', '500056', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3167, 'Vijay Nagar Colony (Hyderabad)', '500057', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3168, 'Kanchanbagh', '500058', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3169, 'Saidabad (Hyderabad)', '500059', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3170, 'P & T Colony (K.V.Rangareddy)', '500060', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3171, 'Sitaphalmandi', '500061', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3172, 'Dr As Rao Nagar', '500062', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3173, 'LIC Division', '500063', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3174, 'Bahadurpura', '500064', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3175, 'Fatehdarwaza', '500065', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3176, 'High Court (Hyderabad)', '500066', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3177, 'Suchitra Junction', '500067', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3178, 'Gsi(Sr) Bandlaguda', '500068', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3179, 'R.C.Imarat', '500069', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3180, 'Sarada Nagar', '500070', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3181, 'Rail Nilayam', '500071', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3182, 'KPHB Colony', '500072', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3183, 'Srinagar Colony', '500073', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3184, 'L B Nagar', '500074', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3185, 'C.B.I.T', '500075', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3186, 'I.E.Nacharam', '500076', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3187, 'Kattedan Ie', '500077', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3188, 'Nisa Hakimpet', '500078', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3189, 'Vaishalinagar', '500079', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3190, 'Gandhinagar (Hyderabad)', '500080', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3191, 'Cyberabad', '500081', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3192, 'I.M.Colony', '500082', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3193, 'Kothaguda (K.V.Rangareddy)', '500084', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3194, 'Jntu Kukat Pally', '500085', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3195, 'Allembylines', '500087', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3196, 'Puppalaguda', '500089', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3197, 'Nizampet', '500090', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3198, 'Hydershahkote', '500091', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3199, 'Boduppal', '500092', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3200, 'Vikasnagar (Hyderabad)', '500093', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3201, 'Sainikpuri', '500094', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3202, 'Putlibowli', '500095', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3203, 'Film Nagar', '500096', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3204, 'Meerpet', '500097', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3205, 'Medipalli', '500098', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3206, 'Shamshabad (K.V.Rangareddy)', '501218', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3207, 'Medchal', '501401', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3208, 'Sanghinagar', '501511', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3209, 'Ramoji Film City', '501512', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3210, 'A.I.E. R.C.puram', '502032', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3211, 'Kodakandla', '502312', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3212, 'Narsapur (Medak)', '502313', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3213, 'Chetlapotharam', '502319', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3214, 'Icrisat', '502324', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3215, 'Aie Bollaram', '502325', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3216, 'Rudraram', '502329', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3217, 'Nizamabad', '503001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3218, 'Subhashnagar (Nizamabad)', '503002', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3219, 'Amrad', '503003', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3220, 'Adilabad', '504001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3221, 'Karimnagar', '505001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3222, 'Hanamkonda', '506001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3223, 'Warangal', '506002', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3224, 'Khammam', '507001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3225, 'Nalgonda', '508001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3226, 'Mahabubnagar', '509001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3227, 'Anantapur', '515001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3228, 'Anantapur Engg College', '515002', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3229, 'Sri Venkateswara Puram', '515003', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3230, 'Motilal Street', '515004', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3231, 'Cuddapah', '516001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3232, 'Buddayapalli', '516002', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3233, 'Ravindra Nagar', '516003', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3234, 'Chinna Musali Reddy Palli', '516004', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3235, 'Proddatur', '516360', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3236, 'Chittoor', '517001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3237, 'Tirupati', '517501', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3238, 'S.V.Agricultural College', '517502', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3239, 'Tiruchanoor', '517503', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3240, 'Tirumala (Chittoor)', '517504', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3241, 'Perumallapalle', '517505', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3242, 'Settipalli', '517506', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3243, 'A.P.H.B.Colony', '517507', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3244, 'Kurnool', '518001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3245, 'Bukkapuram', '518002', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3246, 'SAP Camp-kNL', '518003', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3247, 'Bhagya Nagar-kurnool', '518004', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3248, 'Ashoknagar (Kurnool)', '518005', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3249, 'Balaji Nagar', '518006', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3250, 'Vijayawada', '520001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3251, 'Buckinghampet', '520002', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3252, 'Gandhinagaram (Vijayawada)', '520003', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3253, 'Gunadala', '520004', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3254, 'Autonagar', '520007', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3255, 'A.P.U.H.S', '520008', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3256, 'Chandramoulipuram', '520010', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3257, 'Besant Road', '520011', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3258, 'A.P.H.B.Colony', '520012', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3259, 'Krishnalanka', '520013', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3260, 'Machilipatnam', '521001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3261, 'Bus Stand(Guntur)', '522001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3262, 'Guntur', '522002', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3263, 'Choutra(Guntur)', '522003', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3264, 'A.T.Agraharam(Guntur)', '522004', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3265, 'Nallapadu', '522005', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3266, 'Chowdaripeta(Guntur)', '522006', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3267, 'Bapatla', '522101', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3268, 'Tenali', '522201', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3269, 'Ongole', '523001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3270, 'Kurnool Road (O)', '523002', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3271, 'Chirala', '523155', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3272, 'Nellore', '524001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3273, 'A.C.Nagar', '524002', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3274, 'Dargamitta', '524003', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3275, 'Andhrakesari Nagar', '524004', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3276, 'Polytechnic (Nellore)', '524005', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3277, 'Visakhapatnam', '530001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3278, 'D.C. Buildings', '530002', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3279, 'A U Engg College', '530003', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3280, 'Waltair R S', '530004', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3281, 'Gandhigram', '530005', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3282, 'Industrial Estate', '530007', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3283, 'IRSD Area', '530008', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3284, 'Aerodrome', '530009', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3285, 'Malkapuram', '530011', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3286, 'Autonagar', '530012', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3287, 'P & T Colony (VM)', '530013', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3288, 'Naval Base', '530014', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3289, 'Akkayyapalem', '530016', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3290, 'L B Colony', '530017', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3291, 'Marripalem', '530018', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3292, 'Dabagardens', '530020', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3293, 'H B Colony', '530022', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3294, 'Gajuwaka', '530026', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3295, 'Butchirajupalem', '530027', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3296, 'Simhachalam', '530028', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3297, 'R R V Puram', '530029', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3298, 'Devada', '530031', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3299, 'Visakhapatnam Port', '530035', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3300, 'Pothinamallayapalem', '530041', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3301, 'Visalakshinagar', '530043', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3302, 'Gitam Engg. College', '530045', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3303, 'Vepagunta (Visakhapatnam)', '530047', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3304, 'Madhurawada', '530048', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3305, 'Srikakulam', '532001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3306, 'Kakinada', '533001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3307, 'Church Square', '533002', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3308, 'Bhaskarnagar', '533003', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3309, 'Gandhinagar(KKD)', '533004', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3310, 'Apiic', '533005', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3311, 'Indrapalem', '533006', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3312, 'Rajahmundry', '533101', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3313, 'Konthamuru', '533102', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3314, 'Danavaipeta', '533103', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3315, 'Aryapuram', '533104', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3316, 'Govt College (E Godavari)', '533105', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3317, 'APHB Colony', '533106', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3318, 'Eluru', '534001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3319, 'Ashok Ngr (W Godavari)', '534002', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3320, 'Ankannagudem', '534003', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3321, 'Chataparru', '534004', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3322, 'Tadepalligudem', '534101', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3323, 'Bhimavaram', '534201', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3324, 'Annavaram', '534202', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3325, 'Tanuku', '534211', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3326, 'Palakol', '534260', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3327, 'Chittavaram', '534275', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3328, 'Vizianagaram City', '535001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3329, 'Bangalore G.P.O.', '560001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3330, 'Bangalore City', '560002', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3331, 'Malleswaram', '560003', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3332, 'Basavanagudi', '560004', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3333, 'Fraser Town', '560005', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3334, 'J.C.Nagar', '560006', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3335, 'Air Force Hospital', '560007', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3336, 'H.A.L II Stage', '560008', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3337, 'Blore Dist Off Bldg', '560009', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3338, 'Rajajinagar', '560010', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3339, 'Jayangar III Block', '560011', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3340, 'Science Institute', '560012', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3341, 'Jalahalli', '560013', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3342, 'Jalahalli East', '560014', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3343, 'Jalahalli West', '560015', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3344, 'Krishnarajapuram R S', '560016', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3345, 'Vimanapura', '560017', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3346, 'Chamrajpet Bazar', '560018', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3347, 'Gaviopuram Extension', '560019', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3348, 'Seshadripuram', '560020', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3349, 'Gayathrinagar', '560021', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3350, 'Yeshwanthpur Bazar', '560022', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3351, 'Magadi Road', '560023', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3352, 'Anandnagar (Bangalore)', '560024', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3353, 'Museum Road', '560025', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3354, 'Bapujinagar (Bangalore)', '560026', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3355, 'Sampangiramnagar', '560027', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3356, 'Tyagrajnagar', '560028', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3357, 'Dharmaram College', '560029', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3358, 'Adugodi', '560030', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3359, 'R T Nagar', '560032', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3360, 'Malkand Lines', '560033', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3361, 'Agara', '560034', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3362, 'Carmelaram', '560035', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3363, 'Devasandra', '560036', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3364, 'Doddanekkundi', '560037', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3365, 'Indiranagar Com. Complex', '560038', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3366, 'Nayandahalli', '560039', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3367, 'Vijayanagar (Bangalore)', '560040', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3368, 'Jayanagar', '560041', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3369, 'Sivan Chetty Gardens', '560042', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3370, 'Banaswadi', '560043', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3371, 'Arabic College', '560045', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3372, 'Benson Town', '560046', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3373, 'Viveknagar (Bangalore)', '560047', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3374, 'Mahadevapura', '560048', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3375, 'Bhattarahalli', '560049', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3376, 'Ashoknagar (Bangalore)', '560050', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3377, 'H.K.P. Road', '560051', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3378, 'Chickpet', '560053', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3379, 'Mathikere', '560054', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3380, 'Malleswaram West', '560055', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3381, 'Bnagalore Viswavidalaya', '560056', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3382, 'Peenya Dasarahalli', '560057', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3383, 'Laggere', '560058', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3384, 'Rv Niketan', '560059', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3385, 'Kengeri', '560060', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3386, 'Chikkalasandra', '560061', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3387, 'Doddakallasandra', '560062', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3388, 'A F Station Yelahanka', '560063', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3389, 'Attur', '560064', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3390, 'G.K.V.K.', '560065', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3391, 'Whitefield', '560066', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3392, 'Kadugodi', '560067', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3393, 'Begur', '560068', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3394, 'B Sk II Stage', '560070', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3395, 'Domlur', '560071', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3396, 'Nagarbhavi', '560072', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3397, 'Bagalgunte', '560073', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3398, 'Jeevabhimanagar', '560075', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3399, 'Bannerghatta Road', '560076', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3400, 'Shivarama Karanth Ngr', '560077', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3401, 'J P Nagar', '560078', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3402, 'Basaveshwaranagar', '560079', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3403, 'Sadashivanagar', '560080', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3404, 'Udaypura', '560082', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3405, 'Bannerghatta', '560083', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3406, 'Kacharakanahalli', '560084', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3407, 'Banashankari III Stage', '560085', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3408, 'Mahalakshmipuram Layout', '560086', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3409, 'Vartur', '560087', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3410, 'Hessarghatta', '560088', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3411, 'Hessarghatta Lake', '560089', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3412, 'Chikkabanavara', '560090', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3413, 'Bapagrama', '560091', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3414, 'Sahakaranagar P.O', '560092', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3415, 'C.V.Raman Nagar', '560093', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3416, 'ISRO Anthariksha Bhavan', '560094', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3417, 'Koramangala VI Bk', '560095', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3418, 'Kanteeravanagar', '560096', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3419, 'Vidyaranyapura', '560097', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3420, 'Rajarajeshwarinagar', '560098', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3421, 'Bommasandra Indl Est', '560099', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3422, 'Electronics City', '560100', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3423, 'HSR Layout', '560102', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3424, 'Bellandur', '560103', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3425, 'Hampinagar', '560104', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3426, 'Jigani', '560105', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3427, 'Blore Intl Airport', '560300', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3428, 'Anekal', '562106', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3429, 'Mysore', '570001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3430, 'Gokulam', '570002', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3431, 'Note Mudran Nagar', '570003', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3432, 'Chamundi Extension', '570004', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3433, 'Mysore Law Courts', '570005', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3434, 'Manasagangothri', '570006', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3435, 'Narasimha Raja Mohalla', '570007', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3436, 'Asokapuram', '570008', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3437, 'Saraswathipuram', '570009', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3438, 'Chamundi Betta', '570010', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3439, 'Siddarthanagar Nagar', '570011', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3440, 'Jayalakshmipuram (My)', '570012', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3441, 'Jayanagar (My)', '570014', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3442, 'Bannimantap', '570015', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3443, 'Hebbal Layout', '570016', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3444, 'Hinkal', '570017', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3445, 'Belavadi', '570018', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3446, 'Jyothinagar (Mysore)', '570019', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3447, 'Brindavan Extension', '570020', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3448, 'Ramakrishna Ngr (My)', '570022', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3449, 'Jt Extension', '570023', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3450, 'Krishna Raja Mohalla', '570024', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3451, 'Nanjangud', '571301', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3452, 'Mangalore', '575001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3453, 'Balmatta', '575002', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3454, 'District Courts (Kannada)', '575003', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3455, 'Bijai', '575004', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3456, 'Kulshekar', '575005', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3457, 'Ashoknagar(MR)', '575006', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3458, 'Padil', '575007', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3459, 'Konchady', '575008', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3460, 'Panambur', '575010', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3461, 'Baikampady', '575011', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3462, 'Kulur', '575013', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3463, 'Surathkal', '575014', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3464, 'Kavur', '575015', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3465, 'Permannur', '575017', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3466, 'Nithyanandanagar', '575018', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3467, 'Kulai', '575019', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3468, 'Ullal', '575020', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3469, 'Srinivasnagar', '575025', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3470, 'Vamanjoor', '575028', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3471, 'Katipalla', '575030', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3472, 'Udupi', '576101', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3473, 'Kunjibettu', '576102', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3474, 'Ambalapadi', '576103', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3475, 'Davangere', '577001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3476, 'Basavanahal', '577002', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3477, 'Rm Yard- Davanagere', '577003', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3478, 'Cg Hospital', '577004', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3479, 'Bapuji Vidyanagara', '577005', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3480, 'Chikmagalur', '577101', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3481, 'Chikmagalur ZP', '577102', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3482, 'Shimoga', '577201', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3483, 'Chitradurga', '577501', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3484, 'Chikkagondanahally', '577502', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3485, 'Dharwad', '580001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3486, 'Dharwad S D M E college', '580002', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3487, 'Dharwad K V V', '580003', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3488, 'Dharwad Vidyagiri', '580004', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3489, 'Dharwad U A S', '580005', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3490, 'Dharwad M J Nagar', '580006', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3491, 'Aravatagi', '580007', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3492, 'Dharwad K.C.Park', '580008', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3493, 'Dharwad Sattur', '580009', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3494, 'Hubli', '580020', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3495, 'Hubli KMC', '580021', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3496, 'Byahatti', '580023', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3497, 'Anchatageri', '580024', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3498, 'Amragol', '580025', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3499, 'Adaragunchi', '580028', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3500, 'Hubli Bharat Mill', '580029', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3501, 'Gokul', '580030', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3502, 'Hubli Eng College', '580031', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3503, 'Hubli Vijayanagar', '580032', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3504, 'Airani', '581115', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3505, 'Gadag', '582101', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3506, 'Bellary', '583101', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3507, 'Bandihatti', '583102', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3508, 'Asundi', '583103', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3509, 'Allipur', '583104', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3510, 'Bhujanganagar', '583119', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3511, 'Hospet', '583201', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3512, 'Hospet N C C', '583203', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3513, 'Vidyanagar (Bellary)', '583275', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3514, 'Raichur', '584101', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3515, 'Askihal', '584102', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3516, 'Anehosur', '584122', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3517, 'Manvi', '584123', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3518, 'Shaktinagar (Raichur)', '584170', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3519, 'Gulbarga', '585101', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3520, 'Bhopal Tegnoor', '585102', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3521, 'GB Bahamanipura', '585103', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3522, 'Asta', '585104', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3523, 'GB Ggh', '585105', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3524, 'GB Jnanaganga', '585106', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3525, 'Bijapur', '586101', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3526, 'Bijapur Sainik School', '586102', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3527, 'Bijapur Vijaya College', '586103', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3528, 'Ainapur', '586104', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3529, 'Belgaum', '590001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3530, 'Alarwad', '590003', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3531, 'Belgaum M. Vadgaon', '590005', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3532, 'Angol', '590006', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3533, 'Udyambag', '590008', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3534, 'Belgaum Records MLI', '590009', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3535, 'Aluminium Factory', '590010', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3536, 'Hindawadi', '590011', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3537, 'Peeranwadi', '590014', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3538, 'Chennai G.P.O.', '600001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3539, 'Anna Road', '600002', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3540, 'Park Town', '600003', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3541, 'Mylapore', '600004', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3542, 'Chepauk', '600005', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3543, 'Greams Road', '600006', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3544, 'Vepery', '600007', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3545, 'Egmore ND', '600008', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3546, 'Fort St George', '600009', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3547, 'Kilpauk Medical College', '600010', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3548, 'Perambur North', '600011', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3549, 'Decosters Road', '600012', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3550, 'Rayapuram', '600013', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3551, 'Lloyds Estate', '600014', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3552, 'Guindy North', '600015', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3553, 'St.Thomas Mount', '600016', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3554, 'Thygarayanagar', '600017', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3555, 'Pr. Accountant General', '600018', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3556, 'Kaladipet', '600019', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3557, 'Adyar (Chennai)', '600020', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3558, 'Cemetry Road', '600021', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3559, 'Rajbhavan (Chennai)', '600022', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3560, 'Aynavaram', '600023', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3561, 'Kodambakkam', '600024', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3562, 'Engg College (Chennai)', '600025', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3563, 'Vadapalani', '600026', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3564, 'Raja Annamalaipuram', '600028', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3565, 'Aminjikarai', '600029', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3566, 'Shenoy Nagar', '600030', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3567, 'Chetput', '600031', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3568, 'Ekkaduthangal', '600032', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3569, 'Mambalam R.S.', '600033', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3570, 'Loyola College', '600034', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3571, 'Nandanam', '600035', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3572, 'Indian Institute Of Tech', '600036', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3573, 'Mogappair', '600037', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3574, 'Icf Colony', '600038', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3575, 'Vyasar Nagar Colony', '600039', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3576, 'Anna Nagar (Chennai)', '600040', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3577, 'Neelankarai', '600041', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3578, 'Velacheri', '600042', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3579, 'Pallavaram', '600043', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3580, 'Bharathipuram (Kanchipuram)', '600044', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3581, 'Tambaram', '600045', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3582, 'Tambaram IAF', '600046', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3583, 'Tambaram Sanatorium', '600047', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3584, 'Kolapakkam', '600048', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3585, 'Rajajinagar', '600049', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3586, 'Jagadambigainagar', '600050', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3587, 'Madhavaram Milk Colony', '600051', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3588, 'Alamathi', '600052', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3589, 'Ambattur', '600053', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3590, 'Avadi Camp', '600054', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3591, 'Avadi IAF', '600055', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3592, 'Iyyappanthangal', '600056', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3593, 'Ennore RS', '600057', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3594, 'Ambattur Indl Estate', '600058', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3595, 'Christian Coll Tambaram', '600059', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3596, 'Madhavaram (Tiruvallur)', '600060', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3597, 'Nanganallur Bazaar', '600061', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3598, 'Srinivasanagar (Kanch)', '600063', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3599, 'Chitlapakkam', '600064', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3600, 'CRP camp (Tiruvallur)', '600065', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3601, 'Manali (Tiruvallur)', '600068', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3602, 'Kunnathur (Kanchipuram)', '600069', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3603, 'Anakaputhur', '600070', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3604, 'Kamarajnagar', '600071', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3605, 'Arignar Anna Nagar', '600072', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3606, 'Gowriwakkam', '600073', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3607, 'Polichalur', '600074', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3608, 'Pammal East', '600075', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3609, 'Korattur RS', '600076', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3610, 'Thiruverkadu', '600077', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3611, 'Kalaignar Karunanidhi Ngr', '600078', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3612, 'Korattur', '600080', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3613, 'Tondiarpet Bazaar', '600081', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3614, 'Agaram', '600082', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3615, 'Ashoknagar (Chennai)', '600083', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3616, 'Flowers Road', '600084', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3617, 'Kotturpuram', '600085', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3618, 'Gopalapuram (Chennai)', '600086', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3619, 'Alwarthirunagar', '600087', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3620, 'Adambakkam', '600088', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3621, 'Nandambakkam Kudiyiruppu', '600089', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3622, 'Besantnagar', '600090', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3623, 'Madipakkam', '600091', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3624, 'Koyambedu Market', '600092', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3625, 'Saligramam', '600093', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3626, 'Choolaimedu', '600094', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3627, 'Maduravoyal', '600095', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3628, 'Perungudi', '600096', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3629, 'Karapakkam', '600097', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3630, 'Sidco Estate', '600098', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3631, 'Kolathur', '600099', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3632, 'Medavakkam', '600100', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3633, 'Anna Nagar Western Extn', '600101', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3634, 'Anna Nagar East', '600102', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3635, 'High Court Building (Chennai)', '600104', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3636, 'Arumbakkam', '600106', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3637, 'Koyambedu', '600107', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3638, 'Broadway', '600108', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3639, 'Ponniammanmedu', '600110', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3640, 'Choolai', '600112', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3641, 'Tidel Park', '600113', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3642, 'Pazhavanthangal', '600114', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3643, 'Injambakkam', '600115', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3644, 'Alapakkam', '600116', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3645, 'Bharathinagar', '600117', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3646, 'Kodungaiyur', '600118', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3647, 'Sholinganallur', '600119', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3648, 'Mangadu', '600122', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3649, 'Madambakkam', '600126', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3650, 'Pondicherry', '605001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3651, 'Sri Aurobindo Ashram', '605002', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3652, 'Muthialpet', '605003', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3653, 'Mudaliarpet', '605004', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3654, 'Nellithoppe', '605005', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3655, 'Dhanvantry Nagar', '605006', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3656, 'Lawspet', '605008', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3657, 'Thattanchavady', '605009', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3658, 'Reddiyarpalayam', '605010', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3659, 'Venkata Nagar', '605011', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3660, 'Padmini  Nagar', '605012', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3661, 'Saram(Py)', '605013', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3662, 'Kottakuppam', '605104', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3663, 'Valavanur', '605108', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3664, 'Valudavur', '605502', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3665, 'Tiruchirappalli', '620001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3666, 'Rock Fort', '620002', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3667, 'Woriur Bazaar', '620003', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3668, 'Ambikapuram (Tiruchi)', '620004', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3669, 'EVR Nagar', '620005', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3670, 'Srirangam', '620006', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3671, 'Tiruchirappalli Airport', '620007', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3672, 'Clock Tower (Tiruchi)', '620008', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3673, 'Ramjeenagar', '620009', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3674, 'Industrial Colony', '620010', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3675, 'Melakalkandarkottai', '620011', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3676, 'Craw Ford Colony', '620012', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3677, 'Thiruverumbur', '620013', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3678, 'Admin Office(BHEL)', '620014', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3679, 'Regional Engineering College', '620015', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3680, 'Ordnance Estate - TR', '620016', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3681, 'Puthur', '620017', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3682, 'Thillai Nagar', '620018', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3683, 'Pappakurichi Kattur', '620019', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3684, 'Jamal Mohamed College', '620020', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3685, 'K.K.Nagar (Tiruchi)', '620021', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3686, 'Thuvakudimalai', '620022', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3687, 'Khajanagar', '620023', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3688, 'Bharathidasan Univ', '620024', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3689, 'Hapf Township', '620025', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3690, 'Annanagar', '620026', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3691, 'Madurai', '625001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3692, 'Tallakulam', '625002', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3693, 'Alagappa Nagar', '625003', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3694, 'Pasumalai', '625004', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3695, 'Thiruparankundram', '625005', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3696, 'Pandian Nagar', '625006', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3697, 'Denobli Press', '625007', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3698, 'Kappalur Indl.Estate', '625008', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3699, 'Anuppanadi Housing Board', '625009', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3700, 'Jaihindpuram', '625011', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3701, 'Avanivapuram', '625012', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3702, 'Chatrapatti', '625014', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3703, 'Thiagarajar Engg Coll', '625015', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3704, 'Arasaradi', '625016', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3705, 'Anaiyur', '625017', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3706, 'Kumaram', '625018', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3707, 'Nagamalai', '625019', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3708, 'Andarkottaram', '625020', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3709, 'Kanchipuram', '631501', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3710, 'Balchettychatram', '631551', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3711, 'Karaipettai', '631552', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3712, 'Enathur', '631561', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3713, 'Ayyampettai', '631601', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3714, 'Walajabad', '631605', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3715, 'Hasthampatti', '636007', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3716, 'Arisipalayam', '636009', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3717, 'Govt. College Of Engg', '636011', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3718, 'Karuppur', '636012', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3719, 'Salem Steel Plant', '636013', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3720, 'Fairlands', '636016', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3721, 'Coimbatore', '641001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3722, 'Rathinasabapathy Puram', '641002', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3723, 'Lawley Road', '641003', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3724, 'Gandhimaanagar', '641004', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3725, 'Singanallur', '641005', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3726, 'Ganapathy', '641006', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3727, 'S.B.Institute', '641007', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3728, 'Kuniamuthur', '641008', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3729, 'Ramnagar Coimbatore', '641009', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3730, 'Perur (Coimbatore)', '641010', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3731, 'Saibaba Mission', '641011', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3732, 'Gandhipuram (Coimbatore)', '641012', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3733, 'Govt.College Of Technology', '641013', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3734, 'Coimbatore Aerodrome', '641014', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3735, 'Uppilipalayam', '641015', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3736, 'Ondipudur', '641016', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3737, 'Vadamadurai Kurudampalayam', '641017', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3738, 'Coimbatore Central', '641018', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3739, 'Coimbatore Press Colony', '641019', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3740, 'Naickenpalayam', '641020', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3741, 'Coimbatore Industrial Estate', '641021', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3742, 'N.G.G.O Colony', '641022', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3743, 'Konavaikalpalayam', '641023', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3744, 'Sundarapuram', '641024', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3745, 'Velandipalayam', '641025', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3746, 'Komarapalayam Coimbatore', '641026', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3747, 'Rathinapuri', '641027', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3748, 'Sowripalayam', '641028', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3749, 'Cherannagar', '641029', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3750, 'Kavundampalayam Colony', '641030', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3751, 'Narasimhanaickenpalayam', '641031', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3752, 'Othakkalmandapam', '641032', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3753, 'Neelikonampalayam', '641033', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3754, 'Tudiyalur', '641034', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3755, 'Saravanampatti', '641035', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3756, 'Nanjundapuram', '641036', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3757, 'Pappanaickenpalayam', '641037', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3758, 'Kuppakonanpudur', '641038', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3759, 'Telungupalayam', '641039', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3760, 'Pappanaickenpudur', '641041', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3761, 'Kovaipudur', '641042', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3762, 'Sahs College', '641043', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3763, 'Siddhapudur', '641044', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3764, 'Krishnaswamy Nagar', '641045', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3765, 'Bharathiyar University', '641046', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3766, 'Jothipuram', '641047', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3767, 'Tirupur', '641601', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3768, 'Kallampalayam Road', '641602', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3769, 'Ayyankalipalayam', '641603', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3770, 'Arasampalayam', '641604', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3771, 'Veerapandi (Coimbatore)', '641605', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3772, 'Vijayapuram (Coimbatore)', '641606', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3773, 'Tirupur East', '641607', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3774, 'Anuppapalayam', '641652', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3775, 'Avanash', '641654', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3776, 'Iduvampalayam', '641687', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3777, 'Kannur', '670001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3778, 'Civil Station Kannur', '670002', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3779, 'Kannur City', '670003', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3780, 'Pallikunnu', '670004', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3781, 'Kakkat', '670005', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3782, 'Chovva', '670006', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3783, 'Thottada', '670007', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3784, 'Alavil', '670008', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3785, 'Azhikode', '670009', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3786, 'Valapattanam', '670010', 'N', '2014-02-01 04:48:03', '1', 'Y');
INSERT INTO `tbl_zip_location` (`zip_location_id`, `location_name`, `zip_code`, `cod`, `added_date`, `status`, `xls_type`) VALUES
(3787, 'Chirakkal', '670011', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3788, 'Kannur Thana', '670012', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3789, 'Burnacherry', '670013', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3790, 'Chalad', '670014', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3791, 'Kannur District Hospital', '670017', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3792, 'Thazhe Chovva', '670018', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3793, 'Calicut', '673001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3794, 'Chalapuram', '673002', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3795, 'Kallai-kozhikode', '673003', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3796, 'Calicut City', '673004', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3797, 'East Hill', '673005', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3798, 'Eranhipalam', '673006', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3799, 'Mankavu', '673007', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3800, 'Calicut Medical College', '673008', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3801, 'Malaparamba', '673009', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3802, 'Karaparamba', '673010', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3803, 'Nadakavu', '673011', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3804, 'Marikunnu', '673012', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3805, 'Guruvayurappan College', '673014', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3806, 'Beypore', '673015', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3807, 'Kuthiravattom', '673016', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3808, 'Chevayur', '673017', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3809, 'Calicut Arts & Science College', '673018', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3810, 'Pantheerankavu', '673019', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3811, 'Calicut Civil Station', '673020', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3812, 'Puthiyangadi', '673021', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3813, 'Nallalam', '673027', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3814, 'Arakinar', '673028', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3815, 'Tiruvannur Nada', '673029', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3816, 'Calicut Beach', '673032', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3817, 'Vadakara', '673101', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3818, 'Iim Kozhikode Campus', '673570', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3819, 'Calicut University', '673635', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3820, 'Tenhipalam', '673636', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3821, 'Kondotti', '673638', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3822, 'Calicut Airport', '673647', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3823, 'Tirur(kerala)', '676101', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3824, 'Bettath Pudiangadi', '676102', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3825, 'Thalakkadathur', '676103', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3826, 'Trikkandiyur', '676104', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3827, 'Thekkummuri', '676105', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3828, 'Ponmundam', '676106', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3829, 'Pookayil Bazar', '676107', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3830, 'Triprangode', '676108', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3831, 'Niramaruthur', '676109', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3832, 'Karuvambram', '676123', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3833, 'Tirunavaya', '676301', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3834, 'Tanur-MBR', '676302', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3835, 'Vengara MLP', '676304', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3836, 'Cherumukku', '676306', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3837, 'Tanalur', '676307', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3838, 'Mooniyur', '676311', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3839, 'Tayyalingal', '676320', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3840, 'Edarikode', '676501', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3841, 'Kottakkal', '676503', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3842, 'Kodur-malabar', '676504', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3843, 'Malappuram', '676505', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3844, 'Kottilangadi', '676506', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3845, 'Randathani', '676510', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3846, 'Downhill', '676519', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3847, 'Othukkungal', '676528', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3848, 'Edavanna', '676541', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3849, 'Kalpakancheri', '676551', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3850, 'Valancheri', '676552', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3851, 'Kadampuzha', '676553', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3852, 'Palakkad', '678001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3853, 'Olavakkot', '678002', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3854, 'Kalpathi', '678003', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3855, 'Nurani', '678004', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3856, 'Chokkanathapuram', '678005', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3857, 'Pallipuram PG', '678006', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3858, 'Chandranagar', '678007', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3859, 'Palakkad Engineering College', '678008', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3860, 'Kallekulangara', '678009', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3861, 'Sekharipuram', '678010', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3862, 'Ambikapuram (Palakkad)', '678011', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3863, 'Vadakanthara', '678012', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3864, 'Kunnathurmedu', '678013', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3865, 'Palakkad City', '678014', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3866, 'Angadipuram', '679321', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3867, 'Amminikkad', '679322', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3868, 'Wandoor', '679328', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3869, 'Nilambur', '679329', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3870, 'Kolathur-MLP', '679338', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3871, 'Anamangad', '679357', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3872, 'Kuttippuram', '679571', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3873, 'Edapal', '679576', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3874, 'Ponani', '679577', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3875, 'Vattamkulam', '679578', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3876, 'Kaladi-MLP', '679582', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3877, 'Ponani Nagaram', '679583', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3878, 'Thrissur', '680001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3879, 'Punkunnu', '680002', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3880, 'Ayyanthole', '680003', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3881, 'Poothole', '680004', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3882, 'Thrissur East', '680005', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3883, 'Kuriachira', '680006', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3884, 'Kurkancheri', '680007', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3885, 'Cherur', '680008', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3886, 'Thrissur Engg College', '680009', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3887, 'Viyyur', '680010', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3888, 'Kanattukara', '680011', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3889, 'Pullazhi', '680012', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3890, 'Kuttur (Thrissur)', '680013', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3891, 'Puthur-Thrissur', '680014', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3892, 'Thrissur City', '680020', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3893, 'Thrissur R S', '680021', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3894, 'Irinjalakuda', '680121', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3895, 'Irinjalakuda North', '680125', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3896, 'Chalakudi', '680307', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3897, 'Chavakkad', '680506', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3898, 'Kochi', '682001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3899, 'Mattancherry Jetty', '682002', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3900, 'Willingdon Island', '682003', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3901, 'Thoppumpady', '682005', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3902, 'Palluruthy', '682006', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3903, 'Kumbalangi', '682007', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3904, 'North End', '682009', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3905, 'Ernakulam', '682011', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3906, 'Pachalam', '682012', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3907, 'Thevara', '682013', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3908, 'Perumanur', '682015', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3909, 'Ernakulam Hindi Prachar Sabha', '682016', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3910, 'Kaloor', '682017', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3911, 'Ernakulam North', '682018', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3912, 'Vyttila', '682019', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3913, 'Kadavanthara', '682020', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3914, 'Thrikkakara', '682021', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3915, 'Kochi University', '682022', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3916, 'Vaduthala', '682023', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3917, 'Edapally', '682024', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3918, 'Palarivattom', '682025', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3919, 'Elamakkara', '682026', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3920, 'Vennala', '682028', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3921, 'Matsyapuri', '682029', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3922, 'Kakkanad', '682030', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3923, 'Ernakulam High Court', '682031', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3924, 'Thammanam', '682032', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3925, 'Changampuzha Nagar', '682033', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3926, 'Cheranallur', '682034', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3927, 'Ernakulam College', '682035', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3928, 'Panampilly Nagar', '682036', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3929, 'Cochin Special Economic Zone', '682037', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3930, 'Poonithura', '682038', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3931, 'Kochi Palace', '682301', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3932, 'Ambalamugal', '682302', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3933, 'Ambalamedu', '682303', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3934, 'Maradu', '682304', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3935, 'Aluva', '683101', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3936, 'Kalamassery', '683104', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3937, 'Thaikkattukara', '683106', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3938, 'Kochi Airport', '683111', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3939, 'Perumbavoor', '683542', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3940, 'Angamally', '683572', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3941, 'Angamally South', '683573', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3942, 'Athani (Ernakulam)', '683585', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3943, 'Kottayam', '686001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3944, 'Kottayam Collectorate', '686002', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3945, 'Kottayam West', '686003', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3946, 'Muttambalam', '686004', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3947, 'Nattassery S H Mount', '686006', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3948, 'Pallom', '686007', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3949, 'Gandhi Nagar (Kottayam)', '686008', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3950, 'Rubber Board', '686009', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3951, 'Vadavathoor', '686010', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3952, 'Puthupalli', '686011', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3953, 'Aymanam', '686015', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3954, 'Manganam', '686018', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3955, 'Changanacherry', '686101', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3956, 'Perunna', '686102', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3957, 'Vazhappally West', '686103', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3958, 'Kurisummoodu', '686104', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3959, 'Thrickodithanam', '686105', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3960, 'Changanacherry Industrialnagar', '686106', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3961, 'Alappuzha', '688001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3962, 'Thiruvampady Junction', '688002', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3963, 'Sanathanapuram', '688003', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3964, 'Punnapra', '688004', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3965, 'Avalukkunnu', '688006', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3966, 'Alappuzha North', '688007', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3967, 'Thumpoly', '688008', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3968, 'Pazhaveedu', '688009', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3969, 'Alappuzha District Hospital', '688011', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3970, 'Alappuzha Bazar', '688012', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3971, 'Thathampally', '688013', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3972, 'Pathirappally', '688521', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3973, 'Kalavoor', '688522', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3974, 'Cherthala', '688524', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3975, 'Mannancherry', '688538', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3976, 'Mayithara Market', '688539', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3977, 'Tiruvalla', '689101', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3978, 'Kavumbhagom', '689102', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3979, 'Kuttapuzha', '689103', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3980, 'Valanjavattom', '689104', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3981, 'Manjady Jn', '689105', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3982, 'Kuttur (Pathanamthitta)', '689106', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3983, 'Muthoor', '689107', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3984, 'Peringara', '689108', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3985, 'Tiruvanvandur', '689109', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3986, 'Podiyadi', '689110', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3987, 'Tiruvalla RS', '689111', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3988, 'Thirumoolapuram', '689115', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3989, 'Chengannur', '689121', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3990, 'Kurampala South', '689501', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3991, 'Aranmula', '689533', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3992, 'Vallamkulam', '689541', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3993, 'Eraviperoor', '689542', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3994, 'Puramattom', '689543', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3995, 'Vennikulam', '689544', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3996, 'Thadiyur', '689545', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3997, 'Othera', '689546', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3998, 'Pullad', '689548', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(3999, 'Kunnamthanam', '689581', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4000, 'Kaviyoor', '689582', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4001, 'Mallappally East', '689584', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4002, 'Chengaroor', '689594', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4003, 'Kozhencherry College', '689641', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4004, 'Elanthur', '689643', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4005, 'Pathanamthitta', '689645', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4006, 'Omallur-kla', '689647', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4007, 'Cherukole Kozhencherri', '689650', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4008, 'Ranny', '689672', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4009, 'Mylapra Town', '689678', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4010, 'Kundayam', '689695', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4011, 'Piravanthur', '689696', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4012, 'Mavelikara', '690101', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4013, 'Thattarambalam', '690103', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4014, 'Cherukole', '690104', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4015, 'Chettikulangara', '690106', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4016, 'Kallumala', '690110', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4017, 'Kayangulam', '690502', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4018, 'Pallickal', '690503', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4019, 'Cheppaud', '690507', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4020, 'Muttom-alleppey', '690511', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4021, 'Nangiarkulangara', '690513', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4022, 'Haripad', '690514', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4023, 'Karthikappally', '690516', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4024, 'Karunagappaly', '690518', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4025, 'Mynagappally', '690519', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4026, 'Poruvazhy', '690520', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4027, 'Sasthamcottah', '690521', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4028, 'Sooranad', '690522', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4029, 'Thazhava', '690523', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4030, 'Thevalakkara', '690524', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4031, 'Clappana', '690525', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4032, 'Ochira', '690526', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4033, 'Puthuppally', '690527', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4034, 'Vavvakkavu', '690528', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4035, 'Pullikanakku', '690537', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4036, 'Arinallur', '690538', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4037, 'S R P Market', '690539', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4038, 'Kunnathur East', '690540', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4039, 'Athinad North', '690542', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4040, 'Prayar', '690547', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4041, 'Perungala', '690559', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4042, 'Sooranad North', '690561', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4043, 'Alumkadavu', '690573', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4044, 'Manappally North', '690574', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4045, 'Kollam', '691001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4046, 'Asramom', '691002', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4047, 'Kavanad', '691003', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4048, 'Kallumthazham', '691004', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4049, 'T K M College', '691005', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4050, 'Pallithottam', '691006', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4051, 'Thangasserry', '691007', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4052, 'Kadappakada', '691008', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4053, 'Thevally', '691009', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4054, 'Vadakkevila', '691010', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4055, 'Eravipuram', '691011', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4056, 'Thirumullavaram', '691012', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4057, 'Kollam Civil Station', '691013', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4058, 'Chandanathope', '691014', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4059, 'Thekkevila', '691016', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4060, 'Uliyakovil', '691019', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4061, 'Thattamala', '691020', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4062, 'Pattathanam', '691021', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4063, 'Bhoothakulam', '691302', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4064, 'Mayyanad', '691303', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4065, 'Punalur', '691305', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4066, 'Anchal', '691306', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4067, 'Edamon', '691307', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4068, 'Thenmala', '691308', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4069, 'Kalthuruthy', '691309', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4070, 'Kulathupuzha', '691310', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4071, 'Channapettah', '691311', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4072, 'Eroor (Kollam)', '691312', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4073, 'Thekkumbhagom', '691319', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4074, 'Elampal', '691322', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4075, 'Valacode', '691331', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4076, 'Punalur Paper Mills', '691332', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4077, 'Tholicode', '691333', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4078, 'Nedungolam', '691334', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4079, 'West Kallada', '691500', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4080, 'Ambipoika', '691501', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4081, 'East Kallada', '691502', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4082, 'Mulavana', '691503', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4083, 'Ezhukone', '691505', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4084, 'Kottarakara', '691506', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4085, 'Puthur-kollam', '691507', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4086, 'Kunnicode', '691508', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4087, 'Kuzhimathicaud', '691509', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4088, 'Oyur', '691510', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4089, 'Vellimon', '691511', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4090, 'Odanavattom', '691512', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4091, 'Karingannur', '691516', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4092, 'Cheppara', '691520', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4093, 'Kulakada', '691521', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4094, 'Pattazhy', '691522', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4095, 'Adur( Kla)', '691523', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4096, 'Elamannur', '691524', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4097, 'Mannady (Pathanamthitta)', '691530', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4098, 'Pulamon', '691531', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4099, 'Valakom', '691532', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4100, 'Chadayamangalam', '691534', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4101, 'Nilamel', '691535', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4102, 'Kadakkal', '691536', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4103, 'Pooyapally', '691537', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4104, 'Vettikavala', '691538', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4105, 'Veliyam', '691540', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4106, 'Madathara', '691541', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4107, 'Kaithacode', '691543', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4108, 'Kadambanad', '691552', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4109, 'Kadambanad South', '691553', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4110, 'Chengamanad Jn', '691557', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4111, 'Chithara', '691559', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4112, 'Kalayapuram', '691560', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4113, 'Pallickal-kottarakara', '691566', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4114, 'Kottiyam', '691571', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4115, 'Adichanallur', '691573', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4116, 'Parippally', '691574', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4117, 'Kannanallur', '691576', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4118, 'Mukathala', '691577', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4119, 'Kalluvathukkal', '691578', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4120, 'Karamcode', '691579', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4121, 'Chavara Bridge', '691583', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4122, 'Chavara South', '691584', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4123, 'Mukundapuram', '691585', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4124, 'Umayanallur I E', '691589', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4125, 'Perinad', '691601', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4126, 'Kanjavely', '691602', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4127, 'Thiruvananthapuram G.P.O.', '695001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4128, 'Karamana', '695002', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4129, 'Kaudiar', '695003', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4130, 'Pattom Palace', '695004', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4131, 'Ambalamukku', '695005', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4132, 'Thiruvananthapuram  Beach', '695007', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4133, 'Vallakkadavoo', '695008', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4134, 'Manacaud', '695009', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4135, 'Sasthamangalam', '695010', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4136, 'Cheruvikkal', '695011', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4137, 'Poojapura Junction', '695012', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4138, 'Thycaud', '695014', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4139, 'Thiruvananthapuram  Engg College', '695016', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4140, 'Sreekaryam', '695017', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4141, 'Titanium', '695021', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4142, 'Attakulangara', '695023', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4143, 'Chakkai', '695024', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4144, 'PMG Jn', '695033', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4145, 'Thiruvananthapuram  University', '695034', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4146, 'Vanchiyoor Junction', '695035', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4147, 'Thiruvananthapuram  Chalai', '695036', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4148, 'Kaimanam', '695040', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4149, 'Karyavattom', '695581', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4150, 'Kolkatta G.P.O.', '700001', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4151, 'Cossipore', '700002', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4152, 'Amrita Bazar Partika', '700003', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4153, 'R.G.Kar Medical College', '700004', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4154, 'Ahritola', '700005', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4155, 'Beadon Street', '700006', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4156, 'Barabazar', '700007', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4157, 'Barisha', '700008', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4158, 'Parsibagan', '700009', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4159, 'Beleghata', '700010', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4160, 'Narkeldanga', '700011', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4161, 'Bowbazar (Kolkata)', '700012', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4162, 'Dharmatala', '700013', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4163, 'Asylum Lane', '700014', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4164, 'Sales Tax Building', '700015', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4165, 'Park Street', '700016', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4166, 'Circus Avenue', '700017', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4167, 'Bartala', '700018', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4168, 'Ballygunge RS', '700019', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4169, 'A.J.C.Bose Road', '700020', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4170, 'Fort William', '700021', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4171, 'Bakery Road', '700022', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4172, 'Khiddirpore', '700023', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4173, 'Garden Reach', '700024', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4174, 'Bhawanipore', '700025', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4175, 'Kalighat', '700026', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4176, 'Alipore', '700027', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4177, 'Dumdum', '700028', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4178, 'Dover Lane', '700029', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4179, 'Ashokegarh', '700030', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4180, 'Dhakuria', '700031', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4181, 'Bijoygarh', '700032', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4182, 'Tollygunge', '700033', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4183, 'Behala Municipal Market', '700034', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4184, 'Alambazar', '700035', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4185, 'Baranagar', '700036', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4186, 'Belgachia Road', '700037', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4187, 'Sahapur', '700038', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4188, 'Bediadanga', '700039', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4189, 'Netaji Nagar (Kolkata)', '700040', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4190, 'Paschim Putiari', '700041', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4191, 'Kasba (Kolkata)', '700042', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4192, 'Sonai (Kolkata)', '700043', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4193, 'Badartala', '700044', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4194, 'Lake Gardens', '700045', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4195, 'Abinash Chaowdhury Lane', '700046', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4196, 'Ganguly Bagan', '700047', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4197, 'Patipukur', '700048', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4198, 'Nimta', '700049', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4199, 'Sinthee', '700050', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4200, 'Birati', '700051', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4201, 'Kendriya Vihar', '700052', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4202, 'Kalabagan', '700053', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4203, 'Bengal Chemical', '700054', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4204, 'Bangur Avenue', '700055', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4205, 'Belgharia', '700056', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4206, 'Ariadaha', '700057', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4207, 'Kamarhati', '700058', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4208, 'Desh Bandhu Nagar', '700059', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4209, 'Mahendra Banerjee Road', '700060', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4210, 'Jairampur (Kolkata)', '700061', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4211, 'W.B.Governors Camp.', '700062', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4212, 'Kalagachia (Kolkata)', '700063', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4213, 'Bidhan Nagar AE Market', '700064', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4214, 'Durganagar', '700065', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4215, 'Bidhangarh', '700066', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4216, 'Lily Biscuit', '700067', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4217, 'Jodhpur Park', '700068', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4218, 'Esplanade', '700069', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4219, 'Bansdroni', '700070', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4220, 'Little Russel Street', '700071', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4221, 'Hindustan Building', '700072', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4222, 'Chittaranjan Avenue (Kolkata)', '700073', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4223, 'Dumdum Road', '700074', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4224, 'Garfa', '700075', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4225, 'Dakshineswar', '700076', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4226, 'Bediapara', '700077', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4227, 'Haltu', '700078', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4228, 'Italghacha', '700079', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4229, 'Jessore Road', '700080', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4230, 'Rajbari Colony', '700081', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4231, 'Haridevpur', '700082', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4232, 'Nandan Nagar', '700083', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4233, 'Garia Garden', '700084', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4234, 'K.G Bose Sarani', '700085', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4235, 'Baghajatin', '700086', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4236, 'New Market', '700087', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4237, 'Brace Bridge', '700088', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4238, 'Kalindi Housing Estate', '700089', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4239, 'Netaji Colony', '700090', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4240, 'Bidhan Nagar CK Market', '700091', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4241, 'Regent Estate', '700092', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4242, 'Purba Putiary', '700093', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4243, 'Panchasayar', '700094', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4244, 'Golf Green', '700095', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4245, 'Brahmapur', '700096', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4246, 'Purbachal', '700097', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4247, 'Bidhan Nagar Sai Complex', '700098', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4248, 'Kalikapur', '700099', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4249, 'Vip Nagar', '700100', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4250, 'Prafulla Kanan', '700101', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4251, 'Krishnapur (North 24 Parganas)', '700102', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4252, 'Narendrapur', '700103', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4253, 'Amgachi', '700104', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4254, 'Chowbhanga', '700105', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4255, 'Bidhan Nagar IB Market', '700106', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4256, 'E.K.T', '700107', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4257, 'ISI Po', '700108', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4258, 'Agarpara', '700109', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4259, 'Jugberia', '700110', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4260, 'Ghola Bazar', '700111', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4261, 'Pansila', '700112', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4262, 'Natagarh', '700113', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4263, 'Panihati', '700114', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4264, 'Sukchar (North 24 Parganas)', '700115', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4265, 'B.D.Sopan', '700116', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4266, 'Khardah', '700117', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4267, 'Rahara', '700118', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4268, 'Bandipur', '700119', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4269, 'Nilganj Bazaar', '700121', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4270, 'Anandapuri', '700122', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4271, 'Barrackpore RS', '700123', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4272, 'Rajarhat', '700135', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4273, 'Rajarhat Gopalpur', '700136', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4274, 'Bawali Chandipur', '700137', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4275, 'Pujali', '700138', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4276, 'Vivekananda Pally', '700139', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4277, 'Batanagar', '700140', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4278, 'Mahestala', '700141', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4279, 'Santosh Pur (Maheshtala)so', '700142', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4280, 'Sarkarpool', '700143', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4281, 'Baruipur', '700144', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4282, 'Malancha Mahinagar', '700145', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4283, 'Kodalia', '700146', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4284, 'Subhas Gram', '700147', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4285, 'Harinavi', '700148', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4286, 'Chowhati', '700149', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4287, 'Sonarpur', '700150', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4288, 'Dakshin Jagatdal', '700151', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4289, 'Panchpota', '700152', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4290, 'Laskar Pur', '700153', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4291, 'Boral', '700154', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4292, 'New Town', '700156', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4293, 'Howrah', '711101', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4294, 'Baisnabpara Bazar', '711102', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4295, 'Andul Road', '711103', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4296, 'Chakraberia', '711104', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4297, 'Dasnagar', '711105', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4298, 'Salkia', '711106', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4299, 'Ghusuri', '711107', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4300, 'Netajigarh', '711108', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4301, 'Bakultala', '711109', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4302, 'Bally Goswami Rd', '711201', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4303, 'Belur Bazar', '711202', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4304, 'Bhattanagar', '711203', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4305, 'A.Guha Road', '711204', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4306, 'Abhoynagar', '711205', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4307, 'Pacharul', '711225', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4308, 'Ghoshpara (Howrah)', '711227', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4309, 'Andul -mouri', '711302', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4310, 'Bagnan', '711303', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4311, 'Banipur (Howrah)', '711304', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4312, 'Bauria', '711305', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4313, 'Kulgachia', '711306', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4314, 'Chackasi', '711307', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4315, 'Chengail', '711308', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4316, 'Delta Mil', '711309', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4317, 'Fortgloster', '711310', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4318, 'Mugkalyan', '711312', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4319, 'Bharat Cooperative', '711313', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4320, 'Uluberia', '711315', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4321, 'Uluberia R.S', '711316', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4322, 'Panchla', '711322', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4323, 'J.P.Hat', '711328', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4324, 'Amta', '711401', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4325, 'Bankra', '711403', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4326, 'Domjur', '711405', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4327, 'Makardaha', '711409', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4328, 'Begri', '711411', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4329, 'Chinsurah', '712101', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4330, 'Chinsurah RS', '712102', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4331, 'BIKRAMNAGORE BALI', '712103', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4332, 'Keotalatbagan', '712104', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4333, 'Buroshibtala (Hooghly)', '712105', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4334, 'Bandel Junction', '712123', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4335, 'Bhadreswar', '712124', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4336, 'Rajabazar (Hooghly)', '712125', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4337, 'Boraichanditala', '712136', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4338, 'Magra', '712148', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4339, 'Pandua', '712149', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4340, 'Serampore', '712201', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4341, 'Mahesh -1', '712202', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4342, 'Mallickpara', '712203', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4343, 'Chatra (Hooghly)', '712204', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4344, 'Angus', '712221', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4345, 'Baidyabati', '712222', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4346, 'Sheoraphuli', '712223', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4347, 'Bhadrakali', '712232', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4348, 'Hindmotor', '712233', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4349, 'Criper Road', '712235', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4350, 'Makhla', '712245', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4351, 'Nabagram (Hooghly)', '712246', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4352, 'Raghunathpur (Hooghly)', '712247', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4353, 'Bangurpark', '712248', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4354, 'Prabasnagar', '712249', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4355, 'Rajendra Avenue', '712258', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4356, 'Janai', '712304', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4357, 'Begampur (Hooghly)', '712306', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4358, 'Khanpur (Hooghly)', '712308', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4359, 'Dankuni Coal Complex', '712310', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4360, 'Haripal', '712403', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4361, 'Khamarchandi', '712405', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4362, 'Nalikul', '712407', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4363, 'Singur', '712409', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4364, 'Bansberia Bazar', '712502', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4365, 'Burdwan', '713101', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4366, 'Belkas', '713102', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4367, 'Chotonilpur', '713103', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4368, 'Durgapur', '713201', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4369, 'Durgapur C Zone', '713202', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4370, 'Amrai', '713203', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4371, 'Benachity Market', '713204', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4372, 'Durgapur Steel Town East', '713205', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4373, 'Durgapur Abl Township', '713206', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4374, 'Durgapur Thermal Power Station', '713207', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4375, 'Durgapur ASP SB Bureau', '713208', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4376, 'Durgapur Mg Avenue', '713209', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4377, 'Durgapur Heavy Engg Plant', '713210', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4378, 'Durgapur Sagarbhanga Colony', '713211', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4379, 'Bidhannagar', '713212', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4380, 'Benachity', '713213', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4381, 'Amrabati', '713214', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4382, 'Angadpur', '713215', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4383, 'City Centre', '713216', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4384, 'Oyaria', '713217', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4385, 'Naudiha', '713218', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4386, 'Gopinathpur', '713219', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4387, 'Asansol', '713301', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4388, 'Dakhin Dhadka', '713302', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4389, 'B.B.College', '713303', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4390, 'Asansol Court', '713304', 'N', '2014-02-01 04:48:03', '1', 'Y'),
(4391, 'Burnpur Mkt', '713325', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4392, 'Chotodighari', '713326', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4393, 'Amladahi', '713331', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4394, 'Kanyapur', '713341', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4395, 'Kendua', '713343', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4396, 'Raniganj', '713347', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4397, 'Radhanagar Rly Colony', '713372', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4398, 'Midnapore', '721101', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4399, 'Alinan', '721137', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4400, 'Balarampur', '721301', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4401, 'Kharagpur Technology', '721302', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4402, 'Dharenda', '721304', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4403, 'Inda', '721305', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4404, 'Hijli', '721306', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4405, 'Contai', '721401', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4406, 'Basudevpur', '721602', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4407, 'Haldia', '721604', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4408, 'Haldia Port', '721605', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4409, 'H.I.T', '721606', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4410, 'Haldia T.S', '721607', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4411, 'Tamluk', '721636', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4412, 'Bankura', '722101', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4413, 'Adityapur', '731204', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4414, 'Santiniketan', '731235', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4415, 'Malda', '732101', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4416, 'Jhaljhalia Railway Colony', '732102', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4417, 'Mukdumpur', '732103', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4418, 'Old Malda', '732128', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4419, 'Narayanpur (Malda)', '732141', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4420, 'Mangalbari', '732142', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4421, 'Kaliachak', '732201', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4422, 'Balurghat', '733101', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4423, 'Debinagar', '733123', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4424, 'Akhanagar', '733129', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4425, 'Karnojora', '733130', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4426, 'Raiganj', '733134', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4427, 'Siliguri', '734001', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4428, 'Pradhan Nagar', '734003', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4429, 'Dabgram', '734004', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4430, 'Siliguri Bazar', '734005', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4431, 'Rabindra Sarani', '734006', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4432, 'Bhaktinagar', '734007', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4433, 'Sukna', '734009', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4434, 'Matigara', '734010', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4435, 'Kadamtala (Darjiling)', '734011', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4436, 'Sushrut Nagar', '734012', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4437, 'North Bengal University', '734013', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4438, 'Bagdogra', '734014', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4439, 'Mahananda Project', '734015', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4440, 'Darjeeling', '734101', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4441, 'Lake Town (Darjiling)', '734401', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4442, 'Jalpaiguri', '735101', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4443, 'Jpg.Govt Engg College', '735102', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4444, 'Banarhat', '735202', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4445, 'Binnaguri', '735203', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4446, 'Birpara Bazar', '735204', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4447, 'Alok Jhari', '735224', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4448, 'Cooch Behar', '736101', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4449, 'Alipurduar New Town', '736121', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4450, 'Alipurduar Court', '736122', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4451, 'Alipurduar Junction', '736123', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4452, 'New Market Jaigaon', '736182', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4453, 'Gangtok', '737101', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4454, 'Kalyani', '741235', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4455, 'Bengal Enamel', '743122', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4456, 'Bhatpara', '743123', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4457, 'ESD (M)', '743124', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4458, 'Golghar', '743125', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4459, 'Kankinara', '743126', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4460, 'Feeder Road', '743127', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4461, 'Athpur', '743128', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4462, 'Fingapara', '743129', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4463, 'Garulia', '743133', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4464, 'Nabanagar', '743136', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4465, 'Bagermore', '743145', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4466, 'Naihati Anandabazar', '743165', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4467, 'Gorifa', '743166', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4468, 'Birlapur', '743318', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4469, 'Agarhati', '743329', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4470, 'Diamond Harbour', '743331', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4471, 'Magrahat', '743355', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4472, 'Sarisha', '743368', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4473, 'Dakshin Barasat', '743372', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4474, 'Usthi', '743375', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4475, 'Bakrahat', '743377', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4476, 'Bawali', '743384', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4477, 'Baduria', '743401', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4478, 'Basirhat', '743411', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4479, 'Bhangar (NF)', '743502', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4480, 'Bishnupur (South 24 Parganas)', '743503', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4481, 'Fatehpur (South 24 Parganas)', '743513', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4482, 'Madarat', '743610', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4483, 'Port Blair', '744101', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4484, 'Chatham', '744102', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4485, 'Brijgunj', '744103', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4486, 'Aberdeen  Bazar', '744104', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4487, 'Bhubaneswar G.P.O.', '751001', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4488, 'Bankual', '751002', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4489, 'Andharua', '751003', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4490, 'Utkal University', '751004', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4491, 'Sainik School (Khorda)', '751005', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4492, 'Budheswari Colony', '751006', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4493, 'Saheed Nagar', '751007', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4494, 'Rajbhawan (Khorda)', '751008', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4495, 'Ashok Nagar (Khorda)', '751009', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4496, 'Rasulgarh', '751010', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4497, 'C R P Lines', '751011', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4498, 'Nayapalli', '751012', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4499, 'Regional Research Laboratory', '751013', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4500, 'Bhubaneswar Court', '751014', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4501, 'I R C Village', '751015', 'N', '2014-02-01 04:48:04', '1', 'Y');
INSERT INTO `tbl_zip_location` (`zip_location_id`, `location_name`, `zip_code`, `cod`, `added_date`, `status`, `xls_type`) VALUES
(4502, 'Chandra Sekhar Pur', '751016', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4503, 'Mancheswar', '751017', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4504, 'Badagarh Brit Colony', '751018', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4505, 'Dumduma Housing Board Colony', '751019', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4506, 'Aerodrome Area', '751020', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4507, 'Sailashree Vihar', '751021', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4508, 'Acharya Vihar', '751022', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4509, 'S.E Rly.Proj. Complex', '751023', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4510, 'K I I T', '751024', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4511, 'G.G.P.Colony', '751025', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4512, 'Khandagiri', '751030', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4513, 'Khurda', '752055', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4514, 'Pallahat', '752056', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4515, 'P N College', '752057', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4516, 'Balianta', '752101', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4517, 'Cuttack G.P.O.', '753001', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4518, 'Chandinchowk', '753002', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4519, 'Chhatra Bazar', '753003', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4520, 'Chauliaganj', '753004', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4521, 'Barabati Stadium', '753005', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4522, 'C R R I (Cuttack)', '753006', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4523, 'Medical College (Cuttack)', '753007', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4524, 'Kanika Rajbati', '753008', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4525, 'Rajabagicha', '753009', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4526, 'Industrial Estate (Cuttack)', '753010', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4527, 'Gopalpur (Cuttack)', '753011', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4528, 'A D Market', '753012', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4529, 'Kalyani Nagar', '753013', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4530, 'Avinab Bidanasi', '753014', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4531, 'Barang', '754005', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4532, 'Jagatpur (Cuttack)', '754021', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4533, 'Birol', '754025', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4534, 'Kujang', '754141', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4535, 'Barakolikhala', '754142', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4536, 'Ppl Township', '754145', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4537, 'Andhari', '755019', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4538, 'Ferro Chrome Project', '755020', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4539, 'Balasore', '756001', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4540, 'Sunhat', '756002', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4541, 'Badasindhia', '756003', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4542, 'Remuna', '756019', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4543, 'Mitrapur', '756020', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4544, 'Chandipur', '756025', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4545, 'Baliapal', '756026', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4546, 'Rupsa', '756028', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4547, 'Basta', '756029', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4548, 'Jaleswar', '756032', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4549, 'Angula', '756045', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4550, 'Kuruda', '756056', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4551, 'Bhadrak', '756100', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4552, 'Amroli', '756101', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4553, 'Randiahat', '756135', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4554, 'Bhadrak Bypass', '756181', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4555, 'Baripada', '757001', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4556, 'Takatpur', '757003', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4557, 'Betnoti', '757025', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4558, 'Bhadubeda', '757037', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4559, 'Ambadiha', '757041', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4560, 'Rairangpur', '757043', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4561, 'Puruna Baripada', '757102', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4562, 'Keonjhargarh', '758001', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4563, 'Bodapalasa', '758002', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4564, 'Barbil', '758035', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4565, 'Matkambeda', '758036', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4566, 'Angul', '759122', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4567, 'Hakimpada', '759143', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4568, 'Nalconagar', '759145', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4569, 'Berhampur(GM)', '760001', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4570, 'Banthapalli', '760002', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4571, 'Gosaninuagam', '760003', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4572, 'Baidyanathpur', '760004', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4573, 'Berhampur RS', '760005', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4574, 'Panigrahipentho', '760006', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4575, 'Berhampur University', '760007', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4576, 'Industrial Estates', '760008', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4577, 'Nabeen', '760009', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4578, 'Engineering School', '760010', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4579, 'Gopalpur (Ganjam)', '761002', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4580, 'Ambagaon', '761012', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4581, 'Chatrapur', '761020', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4582, 'Ganjam', '761026', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4583, 'Khallikote RS', '761029', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4584, 'Khallikote', '761030', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4585, 'B.L.N.Pur', '761032', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4586, 'Chandulli', '761102', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4587, 'Aska', '761110', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4588, 'Bhanjanagar', '761126', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4589, 'Parlakhemundi', '761200', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4590, 'Sunabeda-1', '763001', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4591, 'R Zone(Sunabeda)', '763002', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4592, 'D.P.Camp, Sunabeda', '763003', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4593, 'Nad, Sunabeda', '763004', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4594, 'Damanjodi', '763008', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4595, 'Jeypore(K)', '764001', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4596, 'Jeypore(K) R.S.', '764002', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4597, 'Jeypore(K) Irrigation Colony', '764004', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4598, 'Koraput', '764020', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4599, 'A.Malkangiri', '764021', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4600, 'Semiliguda', '764036', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4601, 'Borigumma', '764056', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4602, 'Nabarangpur', '764059', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4603, 'Umerkote', '764073', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4604, 'Rayagada(K)', '765001', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4605, 'Rayagada S.F.', '765002', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4606, 'J.K.Pur', '765017', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4607, 'Bhawanipatna', '766001', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4608, 'Bhawanipatna G.Chowk', '766002', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4609, 'Kesinga', '766012', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4610, 'Junagarh', '766014', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4611, 'Dharamgarh', '766015', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4612, 'Khariar Road', '766104', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4613, 'Badi', '766107', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4614, 'Balangir', '767001', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4615, 'Balangir', '767002', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4616, 'Patnagarh', '767025', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4617, 'Belpara', '767026', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4618, 'Sambalpur', '768001', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4619, 'Mudipara', '768002', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4620, 'Khetrajpur', '768003', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4621, 'Budharaja', '768004', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4622, 'Dhanupali', '768005', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4623, 'Remed', '768006', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4624, 'Bargarh', '768028', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4625, 'Jharsuguda', '768201', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4626, 'K.M. Road Jharsuguda', '768202', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4627, 'Industrial Estate Jharsuguda S', '768203', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4628, 'O.M.P. Line Jharsuguda', '768204', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4629, 'Bandhbahal Colony', '768211', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4630, 'Kolabira', '768213', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4631, 'Laikera', '768215', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4632, 'Brajarajnagar', '768216', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4633, 'Belpahar Rs', '768217', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4634, 'Belpahar', '768218', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4635, 'Orient Colliery Brajarajnagar', '768233', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4636, 'Rourkela', '769001', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4637, 'Rourkela - 2', '769002', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4638, 'Rourkela - 3', '769003', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4639, 'Rourkela - 4', '769004', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4640, 'Rourkela - 5', '769005', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4641, 'Rourkela - 6', '769006', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4642, 'Rourkela - 7', '769007', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4643, 'Rourkela - 8', '769008', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4644, 'Rourkela - 9', '769009', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4645, 'Rourkela - 10', '769010', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4646, 'Rourkela - 11', '769011', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4647, 'Uditnagar', '769012', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4648, 'Rourkela - 13', '769013', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4649, 'Rourkela - 14', '769014', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4650, 'Rourkela - 15', '769015', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4651, 'Jagda', '769042', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4652, 'Sundargarh', '770001', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4653, 'Sundargarh', '770002', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4654, 'Ranibandha', '770017', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4655, 'Kalunga', '770031', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4656, 'Bandomunda', '770032', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4657, 'Damdapara', '770033', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4658, 'PIET Mandiakudar', '770034', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4659, 'Bisra', '770036', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4660, 'Guwahati G.P.O.', '781001', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4661, 'Silpukhuri', '781003', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4662, 'Kharguli', '781004', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4663, 'Dispur', '781005', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4664, 'Assam Sachivalaya', '781006', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4665, 'Ulubari', '781007', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4666, 'Rehabari', '781008', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4667, 'Bharalumukh', '781009', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4668, 'Kamakhya', '781010', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4669, 'Gotanagar', '781011', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4670, 'Pandu', '781012', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4671, 'Jalukbari', '781013', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4672, 'Guwahati University', '781014', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4673, 'Guwahati Airport', '781015', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4674, 'Gopinathnagar', '781016', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4675, 'Azara', '781017', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4676, 'Binovanagar', '781018', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4677, 'Kahilipara', '781019', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4678, 'Noonmati', '781020', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4679, 'Bamunimaidan', '781021', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4680, 'Khanapara', '781022', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4681, 'Amerigog', '781023', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4682, 'Zoo Road', '781024', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4683, 'Ambari Fatasil', '781025', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4684, 'Narangi', '781026', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4685, 'Satgaon', '781027', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4686, 'Beltola', '781028', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4687, 'Basistha', '781029', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4688, 'North Guwahati', '781030', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4689, 'Amingaon', '781031', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4690, 'Rupnagar', '781032', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4691, 'Odalbakra', '781034', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4692, 'Garchuk', '781035', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4693, 'Panjabari', '781037', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4694, 'Hatigaon Chariali', '781038', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4695, 'I I T', '781039', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4696, 'Barpeta Road', '781315', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4697, 'Howly', '781316', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4698, 'Sorbhog', '781317', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4699, 'Goalpara', '783101', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4700, 'Bongaigaon', '783380', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4701, 'New Bongaigaon', '783381', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4702, 'Dhaligaon', '783385', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4703, 'Tezpur', '784001', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4704, 'Jorhat', '785001', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4705, 'Barbheta', '785004', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4706, 'Jorhat Air Field', '785005', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4707, 'Jorhat Reserch Lab', '785006', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4708, 'Jorhat Engg College', '785007', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4709, 'Cinnamara', '785008', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4710, 'Na Ali Dhekiajuli', '785009', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4711, 'Chengeli Gaon', '785010', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4712, 'Bahana', '785101', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4713, 'Golaghat', '785621', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4714, 'Sivasagar', '785640', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4715, 'Nazira', '785685', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4716, 'Dibrugarh', '786001', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4717, 'Assam Medical College', '786002', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4718, 'Central Revenue Building', '786003', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4719, 'Dibrugarh University', '786004', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4720, 'Jalan Nagar', '786005', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4721, 'Barbaruah', '786007', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4722, 'Tinsukia', '786125', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4723, 'Netaji Road', '786151', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4724, 'Digboi', '786171', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4725, 'Margherita', '786181', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4726, 'Parbatpur', '786623', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4727, 'North Lakhimpur', '787001', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4728, 'Silchar', '788001', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4729, 'Malugram', '788002', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4730, 'Tarapur (Cachar)', '788003', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4731, 'G C College', '788004', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4732, 'Nirjuli', '791109', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4733, 'Naharlagun', '791110', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4734, 'Shillong G.P.O.', '793001', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4735, 'Iewduh', '793002', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4736, 'Laitumkhrah', '793003', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4737, 'Rilbong', '793004', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4738, 'Aizawl', '796001', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4739, 'Kulikawn', '796005', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4740, 'Chandmary', '796007', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4741, 'Vaivakawn', '796009', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4742, 'Ramhlun', '796012', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4743, 'Kohima', '797001', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4744, 'Dimapur', '797112', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4745, 'Agartala', '799001', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4746, 'Ramnagar (West Tripura)', '799002', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4747, 'Arundhutinagar', '799003', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4748, 'Agartala College', '799004', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4749, 'Abhoynagar', '799005', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4750, 'Kunjaban', '799006', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4751, 'Dhaleswar', '799007', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4752, 'Khayerpur', '799008', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4753, 'Agartala Aerodrome', '799009', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4754, 'Agartala ONGC', '799014', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4755, 'Patna G.P.O.', '800001', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4756, 'Kadamkuan', '800003', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4757, 'Bankipore', '800004', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4758, 'Patna University', '800005', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4759, 'Gulzarbagh', '800007', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4760, 'Patna City', '800008', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4761, 'Sadaquat Ashram', '800010', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4762, 'Dighaghat', '800011', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4763, 'Digha (Patna)', '800012', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4764, 'Patliputra', '800013', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4765, 'Sheikhpura', '800014', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4766, 'Patna Sectt.', '800015', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4767, 'Rajendra Nagar (Patna)', '800016', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4768, 'B.S.E. Board', '800017', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4769, 'Bataganj', '800018', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4770, 'C.D.A', '800019', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4771, 'Ashok Nagar (Patna)', '800020', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4772, 'Vidyut Parisad', '800021', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4773, 'B.G. Camp/raj Bhawan', '800022', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4774, 'L.B.S Nagar', '800023', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4775, 'Keshari Nagar', '800024', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4776, 'Ashiananagar', '800025', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4777, 'Kumhrar', '800026', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4778, 'Bhagalpur', '812001', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4779, 'Bhagalpur City', '812002', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4780, 'Barari', '812003', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4781, 'Champanagar', '812004', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4782, 'Mirjanhat', '812005', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4783, 'Nathnagar', '812006', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4784, 'T. N. B College', '812007', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4785, 'Sabour', '813210', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4786, 'Gaya', '823001', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4787, 'Kharkhura', '823002', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4788, 'Bokaro Steel City', '827001', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4789, 'Sector- III', '827003', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4790, 'Sector- IV', '827004', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4791, 'Sector-VI', '827006', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4792, 'Sector- IX', '827009', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4793, 'B.S.City R.S.', '827010', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4794, 'Marafari Colony', '827012', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4795, 'Garga Check Post', '827013', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4796, 'Balidih', '827014', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4797, 'Jamshedpur', '831001', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4798, 'Tatanagar', '831002', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4799, 'Golmuri', '831003', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4800, 'Birsanagar', '831004', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4801, 'Kadma', '831005', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4802, 'Jugsalai', '831006', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4803, 'Burma Mines', '831007', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4804, 'Indranagar', '831008', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4805, 'Agrico', '831009', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4806, 'Telco G.M Office', '831010', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4807, 'Sonari (East Singhbhum)', '831011', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4808, 'Mango', '831012', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4809, 'Adityapur', '831013', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4810, 'Baridih Colony', '831017', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4811, 'Gamharia', '832108', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4812, 'Adityapur Industrial Area', '832109', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4813, 'Ranchi G.P.O.', '834001', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4814, 'Doranda', '834002', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4815, 'Hatia (Ranchi)', '834003', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4816, 'Satellite Colony', '834004', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4817, 'Hehal', '834005', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4818, 'Boreya', '834006', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4819, 'Ranchi University', '834008', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4820, 'Bariatu', '834009', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4821, 'Namkum', '834010', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4822, 'Bettiah', '845438', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4823, 'Laheriasarai', '846001', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4824, 'S.H.M.C', '846002', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4825, 'Begusarai', '851101', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4826, 'Barauni', '851112', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4827, 'B.Deorhi', '851113', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4828, 'Barauni Oil Refinery', '851114', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4829, 'Refinery Township', '851117', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4830, 'Ullao', '851134', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4831, 'Gautam Nagar', '110050', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4832, 'Noida', '110101', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4833, 'Noida', '110103', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4834, 'Noida', '110104', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4835, 'Noida', '110105', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4836, 'Noida', '110106', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4837, 'Noida', '110107', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4838, 'Noida', '110108', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4839, 'Noida', '110109', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4840, 'Noida', '110110', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4841, 'Noida', '110112', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4842, 'Noida', '110113', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4843, 'Noida', '110114', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4844, 'Noida', '110115', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4845, 'Noida', '110116', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4846, 'Noida', '110117', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4847, 'Noida', '110118', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4848, 'Noida', '110119', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4849, 'Noida', '110120', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4850, 'Noida', '110122', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4851, 'Noida', '110124', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4852, 'Noida', '110125', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4853, 'Noida', '110301', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4854, 'Noida', '110302', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4855, 'Noida', '110501', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4856, 'Noida', '110502', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4857, 'Noida', '110503', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4858, 'Noida', '110504', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4859, 'Noida', '110510', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4860, 'Noida', '110511', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4861, 'Noida', '110512', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4862, 'Noida', '110601', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4863, 'Noida', '110602', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4864, 'Noida', '110603', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4865, 'Noida', '110604', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4866, 'Noida', '110605', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4867, 'Noida', '110606', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4868, 'Noida', '110607', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4869, 'Noida', '110608', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4870, 'Noida', '110609', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4871, 'Gurgaon Sector 56', '122012', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4872, 'Gurgaon South City II', '122050', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4873, 'IMT Manesar', '122100', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4874, 'Tauru', '122106', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4875, 'Hisar', '125002', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4876, 'Hisar', '125003', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4877, 'B.S.F Hisar', '125021', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4878, 'Satroad Khurd', '125046', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4879, 'Nilokheri', '132118', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4880, 'Neoltha', '132151', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4881, 'Ambala City', '134002', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4882, 'Derabassi', '140506', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4883, 'Gne College', '141005', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4884, 'Moti Nagar', '141009', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4885, 'Rajguru Nagar', '141011', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4886, 'Khanna', '141304', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4887, 'Khanna', '141309', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4888, 'Khanna', '141310', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4889, 'J.F.Mill', '143004', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4890, 'Pratapnagar (Amritsar)', '143021', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4891, 'Pasla', '144038', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4892, 'Airforce Highground', '160008', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4893, 'Sector 8(Chandgarh)', '160010', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4894, 'Sector 15 Chandigarh', '160016', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4895, 'Maloya Colony', '160026', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4896, 'Sector 29 (Chandigarh)', '160031', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4897, 'Sector 29 (Chandigarh)', '160035', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4898, 'Sector 36 (Chandigarh)', '160046', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4899, 'Sector 44 (Chandigarh)', '160051', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4900, 'Chandigarh Sector 55', '160056', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4901, 'Chandigarh Sector 55', '160058', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4902, 'Chandigarh Sector 59', '160061', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4903, 'Dhakaoli', '166031', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4904, 'Janipur', '180008', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4905, 'Janipur', '180009', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4906, 'Roopnagar Jammu Tawi', '180014', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4907, 'Agra Chak', '181104', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4908, 'Dul Hasti Project', '182220', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4909, 'Natipora', '190016', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4910, 'Khrew', '191104', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4911, 'Noida', '201300', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4912, 'Noida Sector 34', '201308', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4913, 'Nsi', '208018', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4914, 'Baikuthpur', '209261', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4915, 'Amratpur', '209624', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4916, 'C D A (P)', '211015', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4917, 'Defence Colony', '248110', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4918, 'I. E. Partapur', '250102', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4919, 'Alwar', '300155', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4920, 'Jaipur R.S.', '302007', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4921, 'Jaipur R.S.', '302008', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4922, 'Jaipur R.S.', '302009', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4923, 'Jaipur R.S.', '302010', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4924, 'Jaipur R.S.', '302011', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4925, 'Sitapura Industrial Area', '302023', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4926, 'Kanota', '303101', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4927, 'Jhilai', '304230', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4928, 'Crpf Ajmer', '305006', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4929, 'Koodan', '332032', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4930, 'Bikaner', '334002', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4931, 'Bangalanagar', '334005', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4932, 'Hindumalkote', '339230', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4933, 'Jodhpur', '342002', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4934, 'Jodhpur', '342004', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4935, 'Nandanwan', '342009', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4936, 'Nandanwan', '342010', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4937, 'Sangaria (Jodhpur)', '342014', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4938, 'Sangaria (Jodhpur)', '342015', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4939, 'Sangaria (Jodhpur)', '342016', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4940, 'Sangaria (Jodhpur)', '342017', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4941, 'Sangaria (Jodhpur)', '342018', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4942, 'Sangaria (Jodhpur)', '342019', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4943, 'Sangaria (Jodhpur)', '342020', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4944, 'Sangaria (Jodhpur)', '342021', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4945, 'Tena', '342029', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4946, 'Tena', '342030', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4947, 'Gandhidham', '370202', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4948, 'Revdibazar', '380003', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4949, 'Navrangpura', '380010', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4950, 'Navrangpura', '380012', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4951, 'Meghaningar', '380017', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4952, 'Memnagar', '380053', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4953, '(Gandhinagar) Sector 6', '382001', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4954, '(Gandhinagar) Sector 6', '382002', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4955, '(Gandhinagar) Sector 6', '382003', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4956, '(Gandhinagar) Sector 6', '382004', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4957, '(Gandhinagar) Sector 6', '382005', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4958, '(Gandhinagar) Sector 7', '382008', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4959, '(Gandhinagar) Sector 7', '382009', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4960, 'Gandhinagar (Gujarat)', '382011', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4961, 'Gandhinagar (Gujarat)', '382015', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4962, 'Gandhinagar (Gujarat)', '382020', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4963, 'Gandhinagar (Gujarat)', '382023', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4964, 'Gandhinagar (Gujarat)', '382029', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4965, 'Crpf Campus G Nagar', '382044', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4966, 'Naroda', '382325', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4967, 'Khodiyarnagar', '382346', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4968, 'Dabhoda', '382352', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4969, 'Odhav', '382410', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4970, 'Fatepura (Vadodara)', '390005', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4971, 'Industrial Estate (Vadodara)', '390015', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4972, 'Zadeshwar', '392002', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4973, 'Althan', '395011', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4974, 'Degam', '396528', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4975, 'Nariman Point', '400023', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4976, 'Antop Hill', '400036', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4977, 'Fort', '400038', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4978, 'Fort', '400039', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4979, 'Goregaon East', '400062', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4980, 'Borivali', '400090', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4981, 'Apna Bazar', '400609', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4982, 'Thane', '401205', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4983, 'Nallosapare E', '401210', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4984, 'Nio Dona Paula', '403003', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4985, 'Reis Magos', '403112', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4986, 'Ponda', '403325', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4987, 'Mardol', '403405', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4988, 'Tisca', '403407', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4989, 'Colvale', '403514', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4990, 'Siolim', '403518', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4991, 'Siolim', '403519', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4992, 'Fatorda', '403604', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4993, 'Parvati', '411010', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4994, 'Hadapsar', '411029', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4995, 'Infotech  Park (Hinjawadi)', '411053', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4996, 'Dehu Road Cantt', '411111', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4997, 'Dehu Road Cantt', '411201', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4998, 'Dasve Lavasa', '412111', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(4999, 'Miri', '414410', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5000, 'Phulewadi', '416009', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5001, 'ICO Spinning Mills', '416129', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5002, 'Ulhasnagar-4', '421003', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5003, 'Dhule Market Yard', '424003', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5004, 'Congress Nagar (Nagpur)', '440011', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5005, 'MIDC Nagpur', '440029', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5006, 'Mangrul Dastgir', '444712', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5007, 'Bijasan Road', '452004', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5008, 'Lokmanya Nagar Indore', '452008', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5009, 'Kasturbagram', '452019', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5010, 'Kasturbagram', '452056', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5011, 'Ujjain', '456002', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5012, 'Ujjain  Bherugarh', '456004', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5013, 'Ujjain  Bherugarh', '456005', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5014, 'Ujjain  City', '456007', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5015, 'Ujjain  City', '456008', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5016, 'Ujjain  City', '456009', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5017, 'Ratlam', '457002', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5018, 'Neemuch', '458442', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5019, 'Neemuch', '458445', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5020, 'Satpura', '462005', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5021, 'Satpura', '462006', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5022, 'Arera Hills', '462012', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5023, 'Regional College', '462014', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5024, 'Regional College', '462015', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5025, '1100 Qrts.', '462017', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5026, '1100 Qrts.', '462018', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5027, '1100 Qrts.', '462019', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5028, '1100 Qrts.', '462021', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5029, 'H.E. Hospital', '462025', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5030, 'Dak Bhawan', '462029', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5031, '3 EME Centre', '462032', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5032, 'RGPV', '462034', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5033, 'RGPV', '462035', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5034, 'Sagar Makronia Camp', '470005', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5035, 'Khursipar Bhilai', '490012', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5036, 'Khursipar Bhilai', '490013', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5037, 'I E Bhilai', '490027', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5038, 'Grasim Vihar Rawan', '493211', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5039, 'Medipalli', '500123', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5040, 'Medipalli', '500195', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5041, 'Medipalli', '500409', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5042, 'Medipalli', '500484', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5043, 'Medipalli', '500486', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5044, 'Medipalli', '500594', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5045, 'Medipalli', '500890', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5046, 'Raipole', '501507', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5047, 'Uppal (Karim Nagar)', '505002', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5048, 'Autonagar', '520006', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5049, 'Gudur', '524006', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5050, 'Gandhigram (Visakhapatnam)', '530006', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5051, 'Dabagardens', '530019', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5052, 'Turangi', '533008', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5053, 'R T Nagar', '560031', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5054, 'Arabic College', '560044', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5055, 'H.K.P. Road', '560052', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5056, 'B Sk II Stage', '560069', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5057, 'Jeevabhimanagar', '560074', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5058, 'Udaypura', '560081', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5059, 'Bangalore International Airport', '560106', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5060, 'Jayanagar (Mysore)', '570013', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5061, 'Ramakrishna Nagar (Mysore)', '570021', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5062, 'Kodangallu', '574158', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5063, 'Kodangallu', '574183', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5064, 'Panambur', '575009', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5065, 'Kulur', '575012', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5066, 'Permannur', '575016', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5067, 'Ullal', '575021', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5068, 'Vamanjoor', '575026', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5069, 'Katipalla', '576001', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5070, 'Dharwad Sattur', '580010', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5071, 'Byahatti', '580022', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5072, 'Hospet N C C', '583202', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5073, 'Vidyanagar (Bellary)', '583273', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5074, 'Ainapur', '586105', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5075, 'Ainapur', '586106', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5076, 'Ainapur', '586107', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5077, 'Belgaum', '590002', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5078, 'Alarwad', '590004', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5079, 'Udyambag', '590007', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5080, 'Hindawadi', '590012', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5081, 'Hindawadi', '590013', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5082, 'Peeranwadi', '590015', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5083, 'Vadapalani', '600027', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5084, 'Kalaignar Karunanidhi Nagar', '600079', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5085, 'High Court Building (Ch)', '600105', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5086, 'Ponniammanmedu', '600111', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5087, 'Uttukottai', '602101', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5088, 'Uttukottai', '602102', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5089, 'Uttukottai', '602104', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5090, 'Villupuram', '605604', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5091, 'Villupuram', '605606', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5092, 'Anuppanadi Housing Board', '625010', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5093, 'Ayyankarkulam', '631503', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5094, 'Telungupalayam', '641040', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5095, 'Tirupur East', '641608', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5096, 'Kannur', '666738', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5097, 'Chalad', '670015', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5098, 'Chalad', '670016', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5099, 'Marikunnu', '673013', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5100, 'Puthiyangadi', '673024', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5101, 'Puthiyangadi', '673025', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5102, 'Puthiyangadi', '673026', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5103, 'Tiruvannur Nada', '673031', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5104, 'Calicut Beach', '673037', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5105, 'Niramaruthur', '676110', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5106, 'Karuvambram', '676126', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5107, 'Karuvambram', '676206', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5108, 'Tayyalingal', '676322', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5109, 'Palakkad', '676621', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5110, 'Palakkad', '676622', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5111, 'Palakkad City', '678015', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5112, 'Palakkad City', '678016', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5113, 'Palakkad City', '678017', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5114, 'Palakkad City', '678018', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5115, 'Palakkad City', '678019', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5116, 'Palakkad City', '678020', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5117, 'Puthur-Thrissur', '680015', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5118, 'Puthur-Thrissur', '680016', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5119, 'Puthur-Thrissur', '680018', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5120, 'Thevara', '682014', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5121, 'Thottakkattukara', '683109', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5122, 'Mekkad', '683592', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5123, 'Chengalam South', '686023', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5124, 'Chengalam South', '686038', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5125, 'Chengalam South', '686039', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5126, 'Changanacherry IndNgr', '686107', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5127, 'Changanacherry IndNgr', '686108', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5128, 'Pazhaveedu', '688010', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5129, 'Pallippuram', '688544', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5130, 'Azhiyadathuchira', '689114', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5131, 'Kozhencherry College', '689629', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5132, 'Mylapra Town', '689681', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5133, 'Thannithode', '689706', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5134, 'Kulasekharapuram', '690543', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5135, 'Kumarapuram (Alappuzha)', '690553', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5136, 'Kumarapuram (Alappuzha)', '690557', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5137, 'Sooranad North', '690564', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5138, 'Sooranad North', '690567', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5139, 'Sooranad North', '690568', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5140, 'Sooranad North', '690569', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5141, 'Thekkevila', '691017', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5142, 'Thekkevila', '691018', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5143, 'Eroor (Kollam)', '691315', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5144, 'Eroor (Kollam)', '691316', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5145, 'Eroor (Kollam)', '691317', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5146, 'Eroor (Kollam)', '691318', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5147, 'Thekkumbhagom', '691320', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5148, 'Thekkumbhagom', '691321', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5149, 'Elampal', '691324', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5150, 'Elampal', '691326', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5151, 'Elampal', '691329', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5152, 'Elampal', '691330', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5153, 'Odanavattom', '691514', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5154, 'Karingannur', '691517', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5155, 'Karingannur', '691518', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5156, 'Karingannur', '691519', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5157, 'Enathu', '691529', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5158, 'Vettikavala', '691539', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5159, 'Madathara', '691542', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5160, 'Kaithacode', '691544', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5161, 'Kaithacode', '691545', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5162, 'Kaithacode', '691546', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5163, 'Kaithacode', '691547', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5164, 'Kaithacode', '691548', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5165, 'Kaithacode', '691550', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5166, 'Kalayapuram', '691562', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5167, 'Karamcode', '691580', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5168, 'Mukundapuram', '691587', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5169, 'Mukundapuram', '691588', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5170, 'Kanjavely', '691604', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5171, 'Kanjavely', '691623', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5172, 'Kanjavely', '691625', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5173, 'Thiruvananthapuram', '695037', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5174, 'PTP Nagar', '695039', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5175, 'Kaimanam', '695041', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5176, 'Sapuipara', '711224', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5177, 'Ghoshpara (Howrah)', '711247', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5178, 'Mugkalyan', '711311', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5179, 'Radhadasi', '711320', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5180, 'Radhadasi', '711321', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5181, 'Panchla', '711323', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5182, 'Amta', '711402', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5183, 'Domjur', '711406', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5184, 'Pandua', '712150', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5185, 'Chatra (Hooghly)', '712205', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5186, 'Sheoraphuli', '712224', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5187, 'Dankuni', '712344', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5188, 'Bonbirsingha', '722222', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5189, 'Pradhan Nagar', '734002', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5190, 'Lake Town (Darjiling)', '734403', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5191, 'Lake Town (Darjiling)', '734404', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5192, 'Lake Town (Darjiling)', '734405', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5193, 'Bagdogra Air Port', '734422', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5194, 'Birlapur', '743313', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5195, 'Kulpi', '743353', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5196, 'Nam Khana', '743358', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5197, 'Sarisha', '743369', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5198, 'Bishnupur', '743505', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5199, 'Bishnupur', '743506', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5200, 'Bodra', '743508', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5201, 'Bodra', '743511', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5202, 'Bodra', '743512', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5203, 'G.G.P.Colony', '751026', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5204, 'G.G.P.Colony', '751027', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5205, 'G.G.P.Colony', '751028', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5206, 'G.G.P.Colony', '751029', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5207, 'Khandagiri', '751031', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5208, 'Engineering School', '760011', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5209, 'Guwahati G.P.O.', '781002', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5210, 'Jorhat', '785002', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5211, 'Aizawl', '796002', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5212, 'Aizawl', '796003', 'N', '2014-02-01 04:48:04', '1', 'Y'),
(5213, 'Kasmar', '827611', 'N', '2014-02-01 04:48:04', '', 'Y'),
(5214, 'Test Location', '112201', 'Y', '2014-08-28 11:24:36', '1', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `wl_attributes`
--

CREATE TABLE `wl_attributes` (
  `id` int(11) NOT NULL,
  `name` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `type` enum('textbox','textarea','radio button','checkbox','dropdown','multi select','select') COLLATE utf8_unicode_ci DEFAULT 'textarea',
  `is_cart_mandatory` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `is_product_mandatory` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `status` enum('0','1','2') COLLATE utf8_unicode_ci DEFAULT '1',
  `recv_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `wl_attributes`
--

INSERT INTO `wl_attributes` (`id`, `name`, `type`, `is_cart_mandatory`, `is_product_mandatory`, `status`, `recv_date`) VALUES
(3, 'Size', 'select', '1', '1', '0', '2017-10-01 19:30:04'),
(0, 'Color', 'select', '1', '1', '0', '2017-11-09 06:18:28');

-- --------------------------------------------------------

--
-- Table structure for table `wl_attributes_lable`
--

CREATE TABLE `wl_attributes_lable` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `name` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('0','1','2') COLLATE utf8_unicode_ci DEFAULT '1',
  `recv_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `wl_attributes_lable`
--

INSERT INTO `wl_attributes_lable` (`id`, `parent_id`, `name`, `status`, `recv_date`) VALUES
(1, 1, 'White', '1', '2017-10-01 18:56:35'),
(2, 1, 'Black', '1', '2017-10-01 18:58:30'),
(3, 1, 'Orange', '1', '2017-10-01 19:01:33'),
(4, 3, 'S', '1', '2017-10-01 19:30:24'),
(5, 3, 'M', '1', '2017-10-01 19:30:29'),
(6, 3, 'L', '1', '2017-10-01 19:30:35'),
(7, 8, 'pool', '1', '2017-10-01 19:41:48'),
(8, 8, 'wifi', '1', '2017-10-01 19:41:52'),
(9, 8, 'tv', '1', '2017-10-01 19:41:56'),
(13, 6, 'Business', '1', '2017-10-01 19:42:47'),
(14, 6, 'E-Comm', '1', '2017-10-01 19:42:53'),
(0, 0, 'Red', '1', '2017-11-09 06:18:38'),
(0, 0, 'Blue', '1', '2017-11-09 06:18:54'),
(0, 0, 'Green', '1', '2017-11-09 06:19:03');

-- --------------------------------------------------------

--
-- Table structure for table `wl_auto_respond_mails`
--

CREATE TABLE `wl_auto_respond_mails` (
  `id` int(11) NOT NULL,
  `email_section` varchar(80) NOT NULL,
  `email_subject` varchar(200) NOT NULL,
  `email_content` text NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1',
  `updated_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wl_auto_respond_mails`
--

INSERT INTO `wl_auto_respond_mails` (`id`, `email_section`, `email_subject`, `email_content`, `status`, `updated_on`) VALUES
(1, 'Registration ', 'Welcome  to {site_name}', '<table border=\"0\" style=\"width:100%\">\n <tbody>\n  <tr>\n   <td colspan=\"2\"><strong>Hi {mem_name},</strong></td>\n  </tr>\n  <tr>\n   <td colspan=\"2\">We are happy to have you as the newest member of {site_name}</td>\n  </tr>\n  <tr>\n   <td colspan=\"2\">This is a registration email as per the details submitted by you. You are now registered on {site_name} with the following details:</td>\n  </tr>\n  <tr>\n   <td colspan=\"2\">&nbsp;</td>\n  </tr>\n  <tr>\n   <td><strong>Email ID:</strong></td>\n   <td>{username}</td>\n  </tr>\n  <tr>\n   <td><strong>Password:</strong></td>\n   <td>{password}</td>\n  </tr>\n  <tr>\n   <td colspan=\"2\">&nbsp;</td>\n  </tr>\n  <tr>\n   <td colspan=\"2\">We hope you will visit us again soon and put these special services to work for you.<br />\n   Please feel free to contact us if you have any questions at all.</td>\n  </tr>\n  <tr>\n   <td colspan=\"2\">&nbsp;</td>\n  </tr>\n  <tr>\n   <td colspan=\"2\">{link}</td>\n  </tr>\n  <tr>\n   <td colspan=\"2\">&nbsp;</td>\n  </tr>\n  <tr>\n   <td colspan=\"2\">Thank you.<br />\n   {site_name} Customer Service<br />\n   Email: {admin_email}</td>\n  </tr>\n  <tr>\n   <td colspan=\"2\" style=\"text-align:center\">&copy; 2016 {site_name}. All right reserved.</td>\n  </tr>\n </tbody>\n</table>', '1', '2013-05-09 18:12:12'),
(2, 'Forgot Password', 'Forgot Password', '<table border=\"0\" style=\"width:100%\">\n  <tbody>\n    <tr>\n      <td colspan=\"2\"><strong>Hi {mem_name},</strong></td>\n    </tr>\n    <tr>\n      <td colspan=\"2\">We received a request to reset the password for your account.</td>\n    </tr>\n    <tr>\n      <td colspan=\"2\">If you requested a reset for your account, click the link below. If you didn’t make this request, please ignore this email.</td>\n    </tr>\n    <tr>\n      <td colspan=\"2\">&nbsp;</td>\n    </tr>\n    <tr>\n      <td colspan=\"2\">{link}</td>\n    </tr>\n\n    <tr>\n      <td colspan=\"2\">&nbsp;</td>\n    </tr>\n    <tr>\n      <td colspan=\"2\">Thank you.<br />\n        {site_name} Customer Service<br />\n        Email: {admin_email}</td>\n    </tr>\n    <tr>\n      <td colspan=\"2\" style=\"text-align:center\">&copy; 2017 {site_name}. All right reserved.</td>\n    </tr>\n  </tbody>\n</table>', '1', '2013-05-08 05:01:25'),
(3, 'Refer To Friends', 'Refer a Friend', '<table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border:2px solid #e9e9e9; margin-top:10px; width:600px\">\n <tbody>\n  <tr>\n   <td style=\"text-align:left\">Hi {friend_name}, &nbsp;ggg</td>\n  </tr>\n  <tr>\n   <td>\n   <p>{your_name} has recommended this {text}, as {your_name} thinks you would like it.<br />\n   <br />\n   To view the Deal details please click on the following link.<br />\n   <br />\n   {site_link}</p>\n\n   <p>Thanks and Regards,</p>\n\n   <p>{site_name} Team</p>\n   </td>\n  </tr>\n  <tr>\n   <td style=\"text-align:center\">&copy; 2013 {site_name}. All right reserved.</td>\n  </tr>\n </tbody>\n</table>', '1', '2013-05-08 17:11:47'),
(4, 'Enquiry ', 'Enquiry Received on', '<table border=\"0\" width=\"100%\">\r\n  <tbody>\r\n    <tr>\r\n      <td colspan=\"2\">\r\n        <strong>Dear {mem_name}</strong></td>\r\n    </tr>\r\n    <tr>\r\n      <td colspan=\"2\">\r\n        Enquiry&nbsp; has been submitted with following info :</td>\r\n    </tr>\r\n    <tr>\r\n      <td colspan=\"2\">\r\n        &nbsp;</td>\r\n    </tr>\r\n    <tr>\r\n      <td width=\"26%\">\r\n        <strong>Name : </strong></td>\r\n      <td>\r\n        <span style=\"margin-top: 15px;\">{user_name}</span></td>\r\n    </tr>\r\n    <tr>\r\n      <td width=\"26%\">\r\n        <strong>Email : </strong></td>\r\n      <td>\r\n        <span style=\"margin-top: 15px;\">{email}</span></td>\r\n    </tr>\r\n\r\n    <tr>\r\n      <td>\r\n        <strong>Message : </strong></td>\r\n      <td>\r\n        <span style=\"margin-top: 15px;\">{comments}</span></td>\r\n    </tr>\r\n    <tr>\r\n      <td colspan=\"2\">\r\n        &nbsp;</td>\r\n    </tr>\r\n  </tbody>\r\n</table>\r\n<br />\r\n<span style=\"margin-top: 15px;\">Thank you.<br />\r\n  {site_name} Customer Service<br />\r\n  Email: {admin_email} </span>', '1', '2012-05-09 16:46:26'),
(5, 'Contact Us', 'Enquiry Received on', '<table border=\"0\" width=\"100%\">\n  <tbody>\n    <tr>\n      <td colspan=\"2\">\n        <strong>Dear {mem_name}</strong></td>\n    </tr>\n    <tr>\n      <td colspan=\"2\">\n        Enquiry&nbsp; has been submitted with following info :</td>\n    </tr>\n    <tr>\n      <td colspan=\"2\">\n        &nbsp;</td>\n    </tr>\n    <tr>\n      <td width=\"26%\">\n        <strong>Email : </strong></td>\n      <td>\n        <span style=\"margin-top: 15px;\">{email}</span></td>\n    </tr>\n		<tr>\n      <td>\n        <strong>Contact No. : </strong></td>\n      <td>\n        <span style=\"margin-top: 15px;\">{phone}</span></td>\n    </tr>\n	 <tr>\n      <td>\n        <strong>Country : </strong></td>\n      <td>\n        <span style=\"margin-top: 15px;\">{country}</span></td>\n    </tr>\n    <tr>  \n      <td>\n        <strong>Message : </strong></td>\n      <td>\n        <span style=\"margin-top: 15px;\">{message}</span></td>\n    </tr>\n    <tr>\n      <td colspan=\"2\">\n        &nbsp;</td>\n    </tr>\n  </tbody>\n</table>\n<br />\n<span style=\"margin-top: 15px;\">\n  Thank you.<br />\n  {site_name} Customer Service<br />\n  Email: info@ashina.com\n</span>', '1', '2011-12-17 10:51:08'),
(6, 'Product Enquiry', 'Product Enquiry Received on {site_name}', '<table border=\"0\" width=\"100%\">\n  <tbody>\n    <tr>\n      <td colspan=\"2\">\n        <strong>Dear {mem_name}</strong></td>\n    </tr>\n    <tr>\n      <td colspan=\"2\">\n        {body_text}</td>\n    </tr>\n    <tr>\n      <td colspan=\"2\">\n        &nbsp;</td>\n    </tr>    \n    <tr>\n      <td width=\"26%\">\n        <strong>Enquiry For :</strong></td>\n      <td>\n        <span style=\"margin-top: 15px;\">{enq}</span></td>\n    </tr>\n    <tr>\n      <td width=\"26%\">\n        <strong>Name :</strong></td>\n      <td>\n        <span style=\"margin-top: 15px;\">{name}</span></td>\n    </tr>\n    <tr>\n      <td width=\"26%\">\n        <strong>Email :</strong></td>\n      <td>\n        <span style=\"margin-top: 15px;\">{email}</span></td>\n    </tr>\n    <tr>\n      <td width=\"26%\">\n        <strong>Mobile Number :</strong></td>\n      <td>\n        <span style=\"margin-top: 15px;\">{mobile}</span></td>\n    </tr>\n    <tr>\n      <td width=\"26%\">\n        <strong>Phone Number :</strong></td>\n      <td>\n        <span style=\"margin-top: 15px;\">{phone}</span></td>\n    </tr>\n    <tr>\n      <td>\n        <strong>Enquiry :</strong></td>\n      <td>\n        <span style=\"margin-top: 15px;\">{comments}</span></td>\n    </tr>\n    <tr>\n      <td colspan=\"2\">\n        &nbsp;</td>\n    </tr>\n\n  </tbody>\n</table>\n<br />\n<span style=\"margin-top: 15px;\">Thank you.<br />\n  {site_name} Customer Service<br />\n  Email: {admin_email} </span>', '1', NULL),
(7, 'Registration  Mail Admin', 'New member is registered', '<table border=\"0\" style=\"width:100%\">\r\n														<tbody>\r\n															<tr>\r\n																			<td colspan=\"2\"><strong>Hi Admin,</strong></td>\r\n															</tr>\r\n															<tr>\r\n																			<td colspan=\"2\">You have new member registered on {site_name} with the following details:</td>\r\n															</tr>\r\n															<tr>\r\n																			<td colspan=\"2\">&nbsp;</td>\r\n															</tr>\r\n															<tr>\r\n																			<td><strong>Email ID:</strong></td>\r\n																			<td>{username}</td>\r\n															</tr>\r\n															<tr>\r\n																			<td><strong>Password:</strong></td>\r\n																			<td>{password}</td>\r\n															</tr>\r\n															<tr>\r\n																			<td colspan=\"2\">&nbsp;</td>\r\n															</tr>\r\n															<tr>\r\n																			<td colspan=\"2\">&nbsp;</td>\r\n															</tr>\r\n															<tr>\r\n																			<td colspan=\"2\">Thank you.<br />\r\n																			{site_name} Customer Service<br />\r\n																			Email: {admin_email}</td>\r\n															</tr>\r\n															<tr>\r\n																			<td colspan=\"2\" style=\"text-align:center\">&copy; {year} {site_name}. All rights reserved.</td>\r\n															</tr>\r\n														</tbody>\r\n                          </table>', '1', '2013-05-09 18:12:12'),
(8, 'Enquiry ', 'New Enquiry Received!', '<table border=\"0\" width=\"100%\">\n  <tbody>\n    <tr>\n      <td colspan=\"2\">\n        <strong>Dear {mem_name}</strong></td>\n    </tr>\n    <tr>\n      <td colspan=\"2\">\n        Enquiry&nbsp; has been submitted with following info :</td>\n    </tr>\n    <tr>\n      <td colspan=\"2\">\n        &nbsp;</td>\n    </tr>\n    <tr>\n      <td width=\"26%\">\n        <strong>Name : </strong></td>\n      <td>\n        <span style=\"margin-top: 15px;\">{mem_name}</span></td>\n    </tr>\n    <tr>\n      <td width=\"26%\">\n        <strong>Email : </strong></td>\n      <td>\n        <span style=\"margin-top: 15px;\">{email}</span></td>\n    </tr>\n	<tr>\n      <td>\n        <strong>Contact NO. : </strong></td>\n      <td>\n        <span style=\"margin-top: 15px;\">{phone}</span></td>\n    </tr>\n	 <tr>\n      <td>\n        <strong>Country : </strong></td>\n      <td>\n        <span style=\"margin-top: 15px;\">{country}</span></td>\n    </tr>\n    <tr>\n      <td>\n        <strong>Message : </strong></td>\n      <td>\n        <span style=\"margin-top: 15px;\">{message}</span></td>\n    </tr>\n	\n    <tr>\n      <td colspan=\"2\">\n        &nbsp;</td>\n    </tr>\n    <tr>\n      <td colspan=\"2\">\n        &nbsp;{link} to login</td>\n    </tr>\n  </tbody>\n</table>\n<br />\n<span style=\"margin-top: 15px;\">Thank you.<br />\n  {site_name} Customer Service<br />\n  Email: {admin_email} </span>', '1', '2012-05-09 16:46:26');

-- --------------------------------------------------------

--
-- Table structure for table `wl_banners`
--

CREATE TABLE `wl_banners` (
  `banner_id` int(11) NOT NULL,
  `ban_title` varchar(500) NOT NULL,
  `banner_position` varchar(100) DEFAULT NULL,
  `banner_image` varchar(200) DEFAULT NULL,
  `banner_url` varchar(170) DEFAULT NULL,
  `banner_page` varchar(30) DEFAULT NULL COMMENT 'Like : home page,category page',
  `status` enum('1','0') DEFAULT '1' COMMENT '1=Actice,0=Inactive',
  `clicks` int(11) NOT NULL DEFAULT '0',
  `banner_added_date` datetime DEFAULT NULL,
  `banner_start_date` datetime DEFAULT NULL,
  `banner_end_date` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wl_banners`
--

INSERT INTO `wl_banners` (`banner_id`, `ban_title`, `banner_position`, `banner_image`, `banner_url`, `banner_page`, `status`, `clicks`, `banner_added_date`, `banner_start_date`, `banner_end_date`) VALUES
(1, 'Pasta/ macaroni  Making Machine', 'Index Slider', 'pasta-mecaroni-making-machine1odB.jpg', '', 'index', '1', 0, '2019-01-03 10:49:16', NULL, NULL),
(2, 'Paper Pencil Making Machine', 'Index Uppper 1', 'pen-machineQO0C.jpg', '', 'index', '1', 0, '2019-01-03 10:49:38', NULL, NULL),
(3, 'Noodles Making Machine', 'Index Uppper 2', 'noodles-making-machinehzr9.jpg', '', 'index', '1', 0, '2019-01-03 10:49:55', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wl_blog`
--

CREATE TABLE `wl_blog` (
  `article_id` int(11) NOT NULL,
  `post_date` datetime NOT NULL,
  `article_title` varchar(223) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `article_title_p` varchar(220) DEFAULT NULL,
  `friendly_url` varchar(250) NOT NULL,
  `blog_author` varchar(80) DEFAULT NULL,
  `short_desc` text,
  `short_desc_p` text,
  `article_desc` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `article_desc_p` text,
  `article_image` varchar(250) DEFAULT NULL,
  `display_order` bigint(20) NOT NULL DEFAULT '0',
  `status` enum('0','1','2') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '1' COMMENT '0=Inactive,1=Active'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wl_blog`
--

INSERT INTO `wl_blog` (`article_id`, `post_date`, `article_title`, `article_title_p`, `friendly_url`, `blog_author`, `short_desc`, `short_desc_p`, `article_desc`, `article_desc_p`, `article_image`, `display_order`, `status`) VALUES
(10, '2019-02-18 12:35:13', 'Blu impex', 'Blu impex Blog 1', '', 'Blu Impex', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam natus earum, et accusamus obcaecati ex accusantium est veniam minima ut modi aliquam aliquid quos sunt in eligendi voluptas repellendus. Nulla!', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam natus earum, et accusamus obcaecati ex accusantium est veniam minima ut modi aliquam aliquid quos sunt in eligendi voluptas repellendus. Nulla!', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam natus earum, et accusamus obcaecati ex accusantium est veniam minima ut modi aliquam aliquid quos sunt in eligendi voluptas repellendus. Nulla!</p>\n', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam natus earum, et accusamus obcaecati ex accusantium est veniam minima ut modi aliquam aliquid quos sunt in eligendi voluptas repellendus. Nulla!</p>\n', 'blog27Q4K.jpg', 0, '1');

-- --------------------------------------------------------

--
-- Table structure for table `wl_blog_comment`
--

CREATE TABLE `wl_blog_comment` (
  `comment_id` bigint(20) NOT NULL,
  `ref_article_id` bigint(20) NOT NULL,
  `mem_id` bigint(20) NOT NULL DEFAULT '0',
  `mem_name` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `mem_email` varchar(200) DEFAULT NULL,
  `comment` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `rating` int(1) DEFAULT NULL,
  `status` enum('0','1','2') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '0' COMMENT '0=Inactive,1=Active,2=Delete',
  `post_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `up_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wl_brands`
--

CREATE TABLE `wl_brands` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `brand_alt` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `friendly_url` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `brand_image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `brand_description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `sort_order` int(3) DEFAULT NULL,
  `date_added` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` enum('0','1','2') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '1' COMMENT '1=active,0=inactive,2=deleted'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `wl_brands`
--

INSERT INTO `wl_brands` (`brand_id`, `brand_name`, `brand_alt`, `friendly_url`, `brand_image`, `brand_description`, `sort_order`, `date_added`, `date_modified`, `status`) VALUES
(32, 'HP', 'HP', '01', 'hp3Mpb.png', NULL, NULL, '2018-01-15 14:09:28', '0000-00-00 00:00:00', '1'),
(33, 'Lenovo', 'Lenovo', '02', 'Lenovo2a3Y.png', NULL, NULL, '2018-01-15 14:09:37', '0000-00-00 00:00:00', '1'),
(34, 'Apple', 'Apple', '03', 'applenOtO.png', NULL, NULL, '2018-01-15 14:09:46', '0000-00-00 00:00:00', '1'),
(35, 'Acer', 'Acer', '04', 'acerAk48.png', NULL, NULL, '2018-01-15 14:09:54', '0000-00-00 00:00:00', '1'),
(36, 'Toshiba', 'Toshiba', '05', 'ToshibaGysk.png', NULL, NULL, '2018-01-15 14:10:02', '0000-00-00 00:00:00', '1'),
(37, 'Dell', 'Dell', '06', 'dellZbSp.png', NULL, NULL, '2018-01-15 14:10:28', '0000-00-00 00:00:00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `wl_categories`
--

CREATE TABLE `wl_categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `category_name_p` varchar(220) COLLATE utf8_bin DEFAULT NULL,
  `category_alt` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `friendly_url` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `category_image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `bg_image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `dispatch_time` varchar(250) COLLATE utf8_bin DEFAULT NULL,
  `coupon_code` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `coupon_value` varchar(10) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `home_menu` enum('1','0') COLLATE utf8_bin NOT NULL DEFAULT '0',
  `sort_order` int(3) DEFAULT NULL,
  `date_added` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` enum('0','1','2') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '1' COMMENT '1=active,0=inactive,2=deleted',
  `category_banner` varchar(500) COLLATE utf8_bin NOT NULL,
  `category_shortdescription` longtext COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `wl_categories`
--

INSERT INTO `wl_categories` (`category_id`, `category_name`, `category_name_p`, `category_alt`, `friendly_url`, `category_image`, `bg_image`, `category_description`, `parent_id`, `dispatch_time`, `coupon_code`, `coupon_value`, `home_menu`, `sort_order`, `date_added`, `date_modified`, `status`, `category_banner`, `category_shortdescription`) VALUES
(1, 'Products', '0', 'Products', 'products', '', NULL, '<p><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:times new roman; font-size:12pt\">Blu Impex is a reputed manufacturer, supplier, and exporter of the best quality industrial products that are used in the food sector and in the paper industry, as well as other industries like art and handicraft. Our top-notch products are exported to countries across the world in Asia and Africa.&nbsp;</span></p>\n\n<p dir=\"ltr\" style=\"text-align:justify\"><strong>Product Range</strong></p>\n\n<p dir=\"ltr\" style=\"text-align:justify\"><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:times new roman; font-size:12pt\">We have products that are widely used in the food industry that include </span><strong>Macaroni Making Machine</strong><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:times new roman; font-size:12pt\">, </span><strong>Automatic Noodles Making Machine</strong><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:times new roman; font-size:12pt\">. Our products for the paper and handicraft industry include </span><strong>Waste Paper Making Machine</strong><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:times new roman; font-size:12pt\"> and </span><strong>Direct Filling Pen Making Machine</strong><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:times new roman; font-size:12pt\">. </span></p>\n\n<p><strong>Why Blu Impex?</strong></p>\n\n<p dir=\"ltr\" style=\"text-align:justify\"><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:times new roman; font-size:12pt\">From the time of our inception, Blu Impex has been striving hard to provide the products that the industry needs. Our products have a strong focus on quality, with quality assurance being the key function in our company. The best quality product that is superior in nature is the reason why companies can buy from us.</span></p>\n\n<div>&nbsp;</div>\n', 0, '0', '0', '0', '0', NULL, '2019-03-08 08:03:49', '0000-00-00 00:00:00', '1', '', 'Blu Impex is a reputed manufacturer, supplier, and exporter of the best quality industrial products that are used in the food sector and in the paper industry, as well as other industries like art and handicraft. Our top-notch products are exported to countries across the world in Asia and Africa.'),
(2, 'Pen Making Machine', '0', 'Pen Making Machine', 'pen-making-machine', 'pen-making-machinezUPt.jpg', NULL, '<p dir=\"ltr\" style=\"text-align:justify\"><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:times new roman; font-size:12pt\">Blu Impex is among the best </span><strong>Pen Making Machine manufacturers</strong><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:times new roman; font-size:12pt\">. The machines we make are useful in the paper and stationery industry. Companies that manufacture pens can purchase our machines and use them to make the best quality of pens. The use of latest technology and excellent materials ensure the quality of the equipment.</span></p>\n\n<p><strong style=\"text-align:justify\">Features</strong></p>\n\n<p dir=\"ltr\" style=\"text-align:justify\"><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:times new roman; font-size:12pt\">This </span><strong>Pen making machine in delhi</strong><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:times new roman; font-size:12pt\"> is made of stainless steel. It makes use of PLC controls for its operation. It is effective to use, easy to operate and has a production capacity of 10,000 per hour. This makes it suitable for big companies that are involved in manufacturing pens. The equipment is highly durable.</span></p>\n\n<p><strong style=\"text-align:justify\">Why buy from us?</strong></p>\n\n<p><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:times new roman; font-size:12pt\">Blu Impex is without doubt one of the top </span><strong>Pen making machine suppliers</strong><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:times new roman; font-size:12pt\"> and offers the best quality machines. The equipment has a good workload and is easy to maintain. The company provides support for maintenance if required.</span></p>\n', 1, '0', '0', '0', '0', NULL, '2019-03-08 08:04:04', '0000-00-00 00:00:00', '1', '', 'Blu Impex is among the best Pen Making Machine manufacturers. The machines we make are useful in the paper and stationery industry. Companies that manufacture pens can purchase our machines and use them to make the best quality of pens. The use of latest technology and excellent materials ensure the quality of the equipment.'),
(5, 'Noodles Making Machine', '0', 'Noodles Making Machine', 'noodles-making-machine', 'automatic-noodles-making-machine1XOF.jpg', NULL, '<p dir=\"ltr\" style=\"text-align:justify\"><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:times new roman; font-size:12pt\">Noodles are a favorite food for people today. Noodles products sell fast, whether it is noodles that one can prepare at home or noodles in restaurants. The sale of noodles has increased and there is also a demand for quality equipment to make noodles. Blu Impex has made a name for itself as the leading </span><strong>Noodles Making Machine manufacturers</strong><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:times new roman; font-size:12pt\">. </span></p>\n\n<p><strong>Products</strong></p>\n\n<p dir=\"ltr\" style=\"text-align:justify\"><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:times new roman; font-size:12pt\">The </span><strong>Noodles making machine in Delhi</strong><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:times new roman; font-size:12pt\"> that Blu Impex manufactures are of best quality. There are three types of machines that the company offers. Automatic Noodles Making Machine, Fully automatic noodles making machine and semi-automatic noodles making machine. The machines are suitable for food-related industries. </span></p>\n\n<p><strong>Why buy from us?</strong></p>\n\n<p><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:times new roman; font-size:12pt\">Blu Impex is the leading </span><strong>Noodles making machine suppliers</strong><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:times new roman; font-size:12pt\">. The company manufactures equipment that is built to quality specifications. Durability, reliability, and performance are the key features of this equipment. This ensures that their products can prepare the best quality noodles.</span></p>\n', 1, '0', '0', '0', '0', NULL, '2019-03-08 08:04:49', '0000-00-00 00:00:00', '1', '', 'Noodles are a favorite food for people today. Noodles products sell fast, whether it is noodles that one can prepare at home or noodles in restaurants. The sale of noodles has increased and there is also a demand for quality equipment to make noodles. Blu Impex has made a name for itself as the leading Noodles Making Machine manufacturers.'),
(9, 'Paper Pencil Making Machine', '0', 'Paper Pencil Making Machine', 'paper-pencil-making-machine', 'paper-pencil-making-machinedSIh.jpg', NULL, '<p dir=\"ltr\" style=\"text-align:justify\"><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:times new roman; font-size:12pt\">Blu Impex is a leading name in the stationery market as they are the best </span><strong>Paper Pencil Making Machine manufacturers</strong><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:times new roman; font-size:12pt\">. Stationery companies produce paper for writing and printing. They also make pencils. When these companies are looking for the best company who can supply equipment, Blu Implex would be the best choice, thanks to its focus on quality.</span></p>\n\n<p dir=\"ltr\" style=\"text-align:justify\"><strong>Products</strong></p>\n\n<p dir=\"ltr\" style=\"text-align:justify\"><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:times new roman; font-size:12pt\">When you are planning to buy </span><strong>Paper Pencil making machine in Delhi</strong><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:times new roman; font-size:12pt\"> you can consider Blu Impex because of its range of products and top performing quality equipment. The company makes newspaper pencil making machine, waste paper pencil making machine and automatic pencil making machine.</span></p>\n\n<p dir=\"ltr\" style=\"text-align:justify\"><strong>Why buy from us?</strong></p>\n\n<p dir=\"ltr\" style=\"text-align:justify\"><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:times new roman; font-size:12pt\">Blu Impex has made a name for itself in the paper and stationery market as the leading &nbsp;</span><strong>Paper Pencil making machine suppliers</strong><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:times new roman; font-size:12pt\">. The focus on quality and superior performance is why industries should buy the equipment of their choice from this company.</span></p>\n\n<div>&nbsp;</div>\n', 1, '0', '0', '0', '0', NULL, '2019-03-08 08:05:53', '0000-00-00 00:00:00', '1', '', 'Blu Impex is a leading name in the stationery market as they are the best Paper Pencil Making Machine manufacturers. Stationery companies produce paper for writing and printing. They also make pencils. When these companies are looking for the best company who can supply equipment, Blu Implex would be the best choice, thanks to its focus on quality.'),
(10, 'Newspaper Pencil Making Machine', '0', 'Newspaper Pencil Making Machine', 'paper-pencil-making-machine/newspaper-pencil-making-machine', '', NULL, '<p dir=\"ltr\" style=\"text-align:justify\"><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:times new roman; font-size:12pt\">Companies that give a lot of importance to protecting the equipment can recycle old products. Old newspapers can be recycled to make wood, which can then be used to make pencils. This would be a piece of very cost-effective equipment. Blu Impex is among the leading </span><strong>Newspaper Pencil Making Machine manufacturers</strong><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:times new roman; font-size:12pt\">. They produce good quality pencils.</span></p>\n\n<p><strong>Features</strong></p>\n\n<p dir=\"ltr\" style=\"text-align:justify\"><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:times new roman; font-size:12pt\">This </span><strong>Newspaper Pencil making machine in Delhi</strong><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:times new roman; font-size:12pt\"> is environment-friendly. It makes use of recycling, where old newspapers and other papers can be used to make pencils. The quality of the pencils would be good and it uses&nbsp;recycling process that is good for the environment.</span></p>\n\n<p><strong>Why buy from us?</strong></p>\n\n<p dir=\"ltr\" style=\"text-align:justify\"><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:times new roman; font-size:12pt\">Blu Impex is the top </span><strong>Newspaper Pencil making machine suppliers.</strong><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:times new roman; font-size:12pt\"> You can buy cost-effective equipment that makes use of recycled newspaper to procure pencils. This is definitely a value for money proposition. The overall quality and durability of the machine are why you should buy from us.</span></p>\n\n<div>&nbsp;</div>\n', 9, '0', '0', '0', '0', NULL, '2019-03-08 08:06:05', '0000-00-00 00:00:00', '1', '', 'Companies that give a lot of importance to protecting the equipment can recycle old products. Old newspapers can be recycled to make wood, which can then be used to make pencils. This would be very cost-effective equipment. Blu Impex is among the leading Newspaper Pencil Making Machine manufacturers. They produce good quality pencils.'),
(11, 'Waste Paper pencil Making Machine', '0', 'Waste Paper pencil Making Machine', 'paper-pencil-making-machine/waste-paper-pencil-making-machine', '', NULL, '<p dir=\"ltr\" style=\"text-align:justify\"><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:times new roman; font-size:12pt\">If you are looking for the best </span><strong>Waste Paper Pencil Making Machine manufacturers</strong><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:times new roman; font-size:12pt\"> then Blu Impex is the one to consider. This company manufactures the best quality pencil making machines that make use of all kind of waste paper. The machine is environment-friendly and it is a good way to save costs through recycling. </span></p>\n\n<p><strong>Features</strong></p>\n\n<p dir=\"ltr\" style=\"text-align:justify\"><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:times new roman; font-size:12pt\">The </span><strong>Waste Paper Pencil making machine in delhi</strong><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:times new roman; font-size:12pt\"> is the perfect example of recycling. It is this feature of the product that makes it one of the ideal equipment for companies that produce stationery. It is of good quality offering good performance. Above all, it helps in saving money for the company.</span></p>\n\n<p><strong>Why buy from us?</strong></p>\n\n<p><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:times new roman; font-size:12pt\">You should buy from Blu Impex as they are the best </span><strong>Waste Paper Pencil making machine suppliers.</strong><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:times new roman; font-size:12pt\"> The company&rsquo;s wide range of products, its focus on quality, and its service after delivery are the reasons you should buy from them.</span></p>\n', 9, '0', '0', '0', '0', NULL, '2019-03-08 08:06:21', '0000-00-00 00:00:00', '1', '', 'If you are looking for the best Waste Paper Pencil Making Machine manufacturers then Blu Impex is the one to consider. This company manufactures the best quality pencil making machines that make use of all kind of waste paper. The machine is environment-friendly and it is a good way to save costs through recycling. '),
(12, 'Automatic pencil Making Machine', '0', 'Automatic pencil Making Machine', 'paper-pencil-making-machine/automatic-pencil-making-machine', 'paper-pencil-making-machinehJHP.jpg', NULL, '<p dir=\"ltr\" style=\"text-align:justify\"><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:times new roman; font-size:12pt\">Blu Impex is the leading </span><strong>Automatic Pencil Making Machine manufacturers</strong><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:times new roman; font-size:12pt\"> in the country whose products are popular in the Indian market and the foreign market. Top quality automatic pencil making machines are produced by the company. This equipment is suitable for stationery companies who produce in bulk. </span></p>\n\n<p><strong>Features</strong></p>\n\n<p dir=\"ltr\" style=\"text-align:justify\"><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:times new roman; font-size:12pt\">The </span><strong>Automatic Pencil making machine in delhi</strong><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:times new roman; font-size:12pt\"> is automatic and easy to manage. It uses the power of 14.4 W. It is electrically driven and can manufacture the best quality of pencils. The machine weighs 550 kg. The machine produced using the latest technology and best equipment is highly durable.</span></p>\n\n<p><strong>Why buy from us?</strong></p>\n\n<p><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:times new roman; font-size:12pt\">The reason you should buy from Blu Impex the best </span><strong>Automatic Pencil making machine suppliers</strong><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:times new roman; font-size:12pt\"> is the quality they assure. Every product manufactured, supplied, and exported by the company is of the best quality. The equipment guarantees great performance and is ideal for heavy duty production. Maintenance and support are also provided by the company.</span></p>\n', 9, '0', '0', '0', '0', NULL, '2019-03-08 08:06:33', '0000-00-00 00:00:00', '1', '', 'Blu Impex is the leading Automatic Pencil Making Machine manufacturers in the country whose products are popular in the Indian market and the foreign market. Top quality automatic pencil making machines are produced by the company. This equipment is suitable for stationery companies who produce in bulk. '),
(13, 'Pasta macaroni  Making Machine', '0', 'Pasta/ macaroni  Making Machine', 'pasta/-macaroni-making-machine', 'pasta-machine-250x250lCXj.jpg', NULL, '<p dir=\"ltr\" style=\"text-align:justify\"><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:times new roman; font-size:12pt\">Food processing companies come out with pasta and macaroni products that are very popular. Preparing pasta and macaroni is no longer a problem thanks to the modern equipment available for the same. You can get the best quality machines from Blu Impex, one of the leading </span><strong>Pasta / Macaroni Making Machine manufacturers</strong><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:times new roman; font-size:12pt\">. </span></p>\n\n<p><strong>Features</strong></p>\n\n<p dir=\"ltr\" style=\"text-align:justify\"><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:times new roman; font-size:12pt\">The </span><strong>Pasta / Macaroni making machine in Delhi</strong><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:times new roman; font-size:12pt\"> is ideal for industries in the food sector. They can use this machine to make varieties of pasta as well as macaroni. The highest quality of past/macaroni can be made by using this machine. The quality the machines have is the distinct feature and its unique selling point </span></p>\n\n<p><strong>Why buy from us?</strong></p>\n\n<p><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:times new roman; font-size:12pt\">Quality is the reason why you should buy from Blu Impex the best </span><strong>Pasta / Macaroni making machine suppliers.</strong><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:times new roman; font-size:12pt\"> Its equipment and machinery are built to perfection and of the best quality, you can get in the market.</span></p>\n', 1, '0', '0', '0', '0', NULL, '2019-03-08 08:06:47', '0000-00-00 00:00:00', '1', '', 'Food processing companies come out with pasta and macaroni products that are very popular. Preparing pasta and macaroni is no longer a problem thanks to the modern equipment available for the same. You can get the best quality machines from Blu Impex, one of the leading Pasta / Macaroni Making Machine manufacturers.'),
(14, 'Automatic Pasta/ macaroni Making Machine', '0', 'Automatic Pasta/ macaroni Making Machine', 'pasta/-macaroni-making-machine/automatic-pasta/-macaroni-making-machine', 'pasta-machine-250x2505EI4.jpg', NULL, '<p dir=\"ltr\" style=\"text-align:justify\"><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:times new roman; font-size:12pt\">Blu Impex, the No. 1 </span><strong>Automatic Pasta / Macaroni Making Machine manufacturers</strong><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:times new roman; font-size:12pt\"> in the country offer an automatic pasta and macaroni making machine. This is best suited for companies who are into mass production. They can easily and conveniently produce best quality pasta and macaroni for the market using this machine.</span></p>\n\n<p><strong>Features</strong></p>\n\n<p dir=\"ltr\" style=\"text-align:justify\"><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:times new roman; font-size:12pt\">The </span><strong>Automatic Pasta / Macaroni making machine in Delhi</strong><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:times new roman; font-size:12pt\"> is an excellent option for industries to prepare pasta/macaroni in large quantities. The machine can produce 150 kg of product per hour. It is an electrically operated machine consuming 10 KW. It weighs 1500 kg and is delivered through wooden packing</span><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:times new roman; font-size:12pt\">&nbsp;&nbsp; &nbsp;</span><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:times new roman; font-size:12pt\"> </span></p>\n\n<p><strong>Why buy from us?</strong></p>\n\n<p><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:times new roman; font-size:12pt\">Blu Impex being the top </span><strong>Automatic Pasta / Macaroni making machine suppliers </strong><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:times new roman; font-size:12pt\">provides the best quality equipment. When you buy from them, you can rest assured of having durable equipment that performs as per your requirements without facing any kind of troubles.</span></p>\n', 13, '0', '0', '0', '0', NULL, '2019-03-08 08:07:00', '0000-00-00 00:00:00', '1', '', 'Blu Impex, the No. 1 Automatic Pasta / Macaroni Making Machine manufacturers in the country offer an automatic pasta and macaroni making machine. This is best suited for companies who are into mass production. They can easily and conveniently produce best quality pasta and macaroni for the market using this machine.'),
(15, 'Non Woven Bag Making Machine', '0', 'Non Woven Bag Making Machine', 'non-woven-bag-making-machine', 'non-woven-bag-making-machinekkJa.jpg', NULL, '<p dir=\"ltr\" style=\"text-align:justify\"><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:times new roman; font-size:12pt\">Now that plastic has been banned, there is a demand for bags. Earlier people would go for shopping empty-handed and return with covers containing items. With the focus on being environment-friendly, people have again started using shopping bags. Blu Impex is the No. 1 </span><strong>Non-Woven Bag Making Machine manufacturers</strong><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:times new roman; font-size:12pt\"> in the country. The non-woven bags these machines produce are durable and strong.</span></p>\n\n<p dir=\"ltr\" style=\"text-align:justify\"><strong>Products</strong></p>\n\n<p dir=\"ltr\" style=\"text-align:justify\"><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:times new roman; font-size:12pt\">The </span><strong>Non-Woven Bag making the machine in Delhi</strong><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:times new roman; font-size:12pt\"> come in different types. There is an automatic non-woven bag making machine. A fully automatic non-woven box and bag making machine are available. This produces higher output with minimum human intervention. Ultrasonic sealing machine is also available from Blu Impex.</span><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:times new roman; font-size:12pt\">&nbsp;&nbsp; &nbsp;</span><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:times new roman; font-size:12pt\"> </span></p>\n\n<p><strong>Why buy from us?</strong></p>\n\n<p><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:times new roman; font-size:12pt\">Blu Impex is top </span><strong>Non-Woven Bag making machine suppliers </strong><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:times new roman; font-size:12pt\">whose products are popular in the market. The range of products they offer and quality is why you should buy from them.</span></p>\n', 1, '0', '0', '0', '0', NULL, '2019-03-08 08:07:19', '0000-00-00 00:00:00', '1', '', 'Now that plastic has been banned, there is a demand for bags. Earlier people would go for shopping empty-handed and return with covers containing items. With the focus on being environmentally friendly, people have again started using shopping bags. Blu Impex is the No. 1 Non-Woven Bag Making Machine manufacturers in the country. The non-woven bags these machines produce are durable and strong.'),
(16, 'Automatic Non woven Bag Making Machine', '0', 'Automatic Non woven Bag Making Machine', 'non-woven-bag-making-machine/automatic-non-woven-bag-making-machine', 'Automatic_Non-woven_Bag_Making_Machine_semiUbM4.jpg', NULL, '<p dir=\"ltr\" style=\"text-align:justify\"><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:times new roman; font-size:12pt\">Blu Impex is top </span><strong>Automatic Non-Woven Bag Making Machine manufacturers</strong><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:times new roman; font-size:12pt\"> in the country. The machines provided by the company are automatic and can be used easily and conveniently. &nbsp;They are ideal for companies in the handicraft or paper industry who produce bags. These bags would be strong and handy to use.</span></p>\n\n<p><strong>Features</strong></p>\n\n<p dir=\"ltr\" style=\"text-align:justify\"><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:times new roman; font-size:12pt\">The </span><strong>Automatic Non-Woven Bag Making Machine in Delhi </strong><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:times new roman; font-size:12pt\">has a production capacity of around 80 &ndash; 100 pieces per hour. Minimum human intervention is needed saving effort, manpower, and time. This leads to savings for the company. Bag sizes of different dimensions can be produced using this machine. It needs 220V current and is 100 kg in weight. </span><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:times new roman; font-size:12pt\">&nbsp;&nbsp; &nbsp;</span><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:times new roman; font-size:12pt\"> </span></p>\n\n<p><strong>Why buy from us?</strong></p>\n\n<p><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:times new roman; font-size:12pt\">You can buy from Blu Impex the leading </span><strong>Automatic Non-Woven Bag Making Machine supplier </strong><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:times new roman; font-size:12pt\">because of the performance, durability, service and top quality of the machines they supply and export all over the world.</span></p>\n', 15, '0', '0', '0', '0', NULL, '2019-03-08 08:07:31', '0000-00-00 00:00:00', '1', '', 'Blu Impex is top Automatic Non-Woven Bag Making Machine manufacturers in the country. The machines provided by the company are automatic and can be used easily and conveniently.  They are ideal for companies in the handicraft or paper industry who produce bags. These bags would be strong and handy to use.'),
(17, 'Fully Automatic Non woven Box Bag Making Machine', '0', 'Fully Automatic Non woven Box Bag Making Machine', 'non-woven-bag-making-machine/fully-automatic-non-woven-box-bag-making-machine', 'Automatic_Non_Woven_Bag_Making_MachineinPP.jpg', NULL, '<p dir=\"ltr\" style=\"text-align:justify\"><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:times new roman; font-size:12pt\">Blu Impex is known in the market as the best </span><strong>Fully Automatic Non-Woven Box Bag Making Machine manufacturers</strong><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:times new roman; font-size:12pt\">. The machines provided by the company are fully automatic and ensures a great saving in time, effort and cost. The top quality equipment can be used for making bags as well as boxes.</span></p>\n\n<p><strong>Features</strong></p>\n\n<p dir=\"ltr\" style=\"text-align:justify\"><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:times new roman; font-size:12pt\">The </span><strong>Fully Automatic Non-Woven Box Bag Making Machine in Delhi </strong><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:times new roman; font-size:12pt\">has a production capacity of around 100 &ndash; 120 pieces per hour. It needs 15 KW voltage to operate. The machine produces bags of the size 200 to 600 mm in size. They are ideal for use as shopping bags. </span><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:times new roman; font-size:12pt\">&nbsp;&nbsp; &nbsp;</span><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:times new roman; font-size:12pt\"> </span></p>\n\n<p><strong>Why buy from us?</strong></p>\n\n<p><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:times new roman; font-size:12pt\">You should buy from Blu Impex who are the best </span><strong>Fully Automatic Non-Woven Box Bag Making Machine supplier. </strong><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:times new roman; font-size:12pt\">The reasons are simple &ndash; top quality equipment that works as per your needs and are durable and reliable. The equipment is truly value for money.</span></p>\n', 15, '0', '0', '0', '0', NULL, '2019-03-08 08:07:43', '0000-00-00 00:00:00', '1', '', 'Blu Impex is known in the market as the best Fully Automatic Non-Woven Box Bag Making Machine manufacturers. The machines provided by the company are fully automatic and ensures a great saving in time, effort and cost. The top quality equipment can be used for making bags as well as boxes.'),
(18, 'Ultrasonic sealing machine', '0', 'Ultrasonic sealing machine', 'non-woven-bag-making-machine/ultrasonic-sealing-machine', 'Ultra_Sonic_Sealing_MachineUlN2.jpg', NULL, '<p dir=\"ltr\" style=\"text-align:justify\"><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:times new roman; font-size:12pt\">The best of the </span><strong>Ultrasonic Sealing Machine manufacturers</strong><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:times new roman; font-size:12pt\"> is Blu Impex. The company makes an excellent quality of ultrasonic This machine is ideal to make bags quickly and efficiently. It is easy to operate and is of the best quality. The machine is reliable and would be suitable for small companies that produce bags.</span></p>\n\n<p><strong>Features</strong></p>\n\n<p dir=\"ltr\" style=\"text-align:justify\"><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:times new roman; font-size:12pt\">The </span><strong>Ultrasonic Sealing Machine in Delhi </strong><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:times new roman; font-size:12pt\">that you buy is suitable to produce bags at a working speed of around 15 meters per minute. The equipment is very handy and easy to use and you can sew and stitch the bags easily without any problems. It weighs 90 kg and has a roller size of 0 &ndash; 60 mm. </span><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:times new roman; font-size:12pt\">&nbsp;&nbsp; &nbsp;</span><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:times new roman; font-size:12pt\"> </span></p>\n\n<p><strong>Why buy from us?</strong></p>\n\n<p><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:times new roman; font-size:12pt\">If you are looking for the best quality and durable ultrasonic sealing machine for producing bags, then you should buy from us. We are Blu Impex are the best </span><strong>Ultrasonic Sealing Machine supplier </strong><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:times new roman; font-size:12pt\">producing high-quality equipment.</span></p>\n', 15, '0', '0', '0', '0', NULL, '2019-03-08 08:07:56', '0000-00-00 00:00:00', '1', '', 'The best of the Ultrasonic Sealing Machine manufacturers is Blu Impex. The company makes an excellent quality of ultrasonic This machine is ideal to make bags quickly and efficiently. It is easy to operate and is of the best quality. The machine is reliable and would be suitable for small companies that produce bags.');

-- --------------------------------------------------------

--
-- Table structure for table `wl_cms_pages`
--

CREATE TABLE `wl_cms_pages` (
  `page_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `page_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `friendly_url` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `page_description` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `page_short_description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `page_description_p` longtext,
  `image` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('0','1','2') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '1' COMMENT '0=Inactive,1=Active,2=Deleted',
  `page_updated_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wl_cms_pages`
--

INSERT INTO `wl_cms_pages` (`page_id`, `parent_id`, `page_name`, `friendly_url`, `page_description`, `page_short_description`, `page_description_p`, `image`, `status`, `page_updated_date`) VALUES
(1, 0, 'About Us', 'about-us', '<p><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:times new roman; font-size:12pt\">Blu Impex was established in the year 2016. We use the best quality of materials and modern equipment that makes use of the latest technology. This ensures that our equipment, whether </span><strong>Automatic Pasta Making Machine<span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:times new roman; font-size:12pt\"> or </span>Direct Filling Pen Making Machine</strong><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:times new roman; font-size:12pt\"> are the best in the industry.</span></p>\n\n<p><strong>Experience</strong></p>\n\n<p><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:times new roman; font-size:12pt\">Blu Impex has been established by Mr. S Krishna Mohan Janapa Reddy, who is the company&rsquo;s CEO. With an MBA degree and a PDGM qualification in Strategic Management, he has steered the company to success in a very short time. He is backed by a team of professionals who are well-experienced in the industry. </span></p>\n\n<p><strong>Our Goal</strong></p>\n\n<p><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:times new roman; font-size:12pt\">Our goal is to offer the best solutions that are of top quality and are available at the most competitive rates. We strive to achieve a name for ourselves in the market by providing innovative products that not just meet but exceed expectations of our valued clients.</span></p>\n', '', '<p>Somos Mercadomoz.com, o primeiro e maior supermercado online de Mo&ccedil;ambique. A marca mercadomoz est&aacute; registrada e gerenciada pela A Doropeni Comercial Limitada para fornecer solu&ccedil;&otilde;es de com&eacute;rcio eletr&ocirc;nico aos fornecedores que podem vender seus produtos atrav&eacute;s do nosso canal on-line chamado mercadomoz. Come&ccedil;amos nossas opera&ccedil;&otilde;es a partir de 1&ordm; de dezembro de 2017 com o objetivo de fornecer solu&ccedil;&otilde;es de com&eacute;rcio eletr&ocirc;nico on-line para que voc&ecirc; possa comprar produtos dom&eacute;sticos on-line e receber entrega em casa ou onde quiser. Nossos produtos s&atilde;o os melhores em qualidade e pre&ccedil;os razo&aacute;veis.<br />\nN&oacute;s sempre fazemos a reestrutura&ccedil;&atilde;o para aumentar a lucratividade dos clientes. Nosso supermercado on-line patrocinado por grandes gigantes de Mo&ccedil;ambique no campo de Vendas e FMCG. Nossos clientes podem ser um membro de nosso mercado, eles podem fazer seu pedido diretamente no site e receber a entrega no local selecionado. Estamos aqui para reduzir sua dor de cabe&ccedil;a de ir ao mercado, selecionar os produtos, ficar em uma longa fila e pagar.<br />\nA Mercadomoz oferece servi&ccedil;os sem complica&ccedil;&otilde;es para tornar a sua vida simples para que voc&ecirc; possa investir seu tempo onde quer que voc&ecirc; queira. N&oacute;s sempre consideramos e trabalhamos para a satisfa&ccedil;&atilde;o do cliente. A Mercadomoz consiste em mais de 5000 produtos com diferentes categorias como supermercado, alimentos e bebidas, materiais pl&aacute;sticos, cozinha, limpeza, m&oacute;veis, produtos de a&ccedil;os, cosm&eacute;ticos e produtos essenciais. Estamos direcionados para alcan&ccedil;ar mais de 10 mil produtos na nossa plataforma para fornecer mais precis&atilde;o na compra com verdades no seu comportamento de compras.<br />\nSomos apoiados e patrocinados pela Recheio Cash &amp; Carry, pela Jumbo City Cash &amp; Carry, pela Cogef Trading Lda, pela Aone Mobiliaro e pela Funda&ccedil;&atilde;o Rizwan Adatia.</p>\n', '', '1', '2019-03-29 11:03:28'),
(2, 0, 'Terms & Conditions', 'terms-conditions', '<h3>Miscellaneous terms related to the website</h3>\n\n<p>This page is a legal contract between You and Glorious IT and displays some rights according to which, Glorious IT may control data, information, software, graphics, photographs and more that Glorious IT and its Subsidiaries may make available to you. Make sure that when we say &ldquo;you&rdquo;, &ldquo;your&rdquo;, &ldquo;yourself&rdquo;, we mean it by the customer and by &ldquo;us&rdquo;, &ldquo;we&rdquo;, &ldquo;ourself&rdquo;, we mean it by Glorious IT.</p>\n\n<h3>Rules for the unauthorized access of the websites</h3>\n\n<p>Any other use of the websites beyond the permitted limits is prohibited. Any other use of this website beyond the permitted uses is prohibited. This is because all rights in this website remain the property of Glorious IT.</p>\n\n<p>It is to be well-noted that any unauthorized use of this website may result in the copyright laws violation. We do not want that to happen and, therefore, We have given You examples of things to avoid in Our Acceptable Use Policy found here Glorious IT Acceptable Use Policy. You must follow Glorious IT&rsquo;s Acceptable Use Policy whenever you use this website or any services offered from this website.</p>\n\n<h3>Our authorization regarding your account</h3>\n\n<p>We or You may terminate Your use of this website at any time. Your use of this website will automatically terminate in the event You breach any of These Terms. To clarify:</p>\n\n<p>We have full authority to terminate, suspend or modify your registration anytime without any notice and for any reason.</p>\n\n<p>You may discontinue Your access to and use of this website at any time. You must immediately destroy the downloaded or printed material or any copies in case of an automatic termination in an event.</p>\n\n<h3>Rules for accessing this website</h3>\n\n<p>You are responsible for complying with the terms through any account in case, You access this website. There are some materials that will only be available to You if You have an account. You agree to provide true, accurate, current, and complete information for so long as You use this website. You are solely responsible for maintaining all equipment, services and software needed for access as it is your account. It is also Your responsibility to maintain the confidentiality of Your password(s). You must immediately notify us in case, you notice any sort of breaching of your account for the security purposes.</p>\n\n<p>Sometimes, We collect certain personal information about You solely in connection with Your access and use of this website.Glorious IT&#39;s use of that information is governed by the provisions of the Glorious IT Online Privacy Statement.</p>\n\n<p>We have full right to change the password or restrict your access to your account in case, we find any unseemly content or activity.</p>\n\n<h3>Our permission for the use of this website</h3>\n\n<p>You are free to use this website for your personal or business related work only if you are buying our products for the use in your business.</p>\n\n<p>We hereby grant You a limited, personal, non-exclusive and non-transferable license to use and to display the Materials. Your right to use the Materials is conditioned on Your compliance with These Terms. You do not possess any right to modify, edit, copy, reproduce, create derivative works of, reverse engineer, alter, enhance or in any way.</p>\n\n<p>We would suggest you go through our Privacy policy first before you make any copies of any website.</p>\n\n<h3>Disclaimers</h3>\n\n<p>Without limiting the generality of the foregoing, Glorious IT makes no warranty that this website will meet your requirements or that this website will be uninterrupted, timely, secure, or error free or that defects in this website will be corrected. Glorious IT makes no warranty as to the results that may be obtained from the use of this website or as to the accuracy or reliability of any information obtained through this website.</p>\n\n<h3>Your voluntarily submissions</h3>\n\n<p>You agree that you are solely responsible for all of your User Submissions and that any such User Submission is considered non-confidential. These submissions can be through the chat rooms, customer ratings, review areas and community. These submissions may be on the software, music, sound, photographs, graphics or any video. Moreover, Glorious IT does not guarantee that You will have any recourse through Glorious ITor any third party to edit or delete any User Submission You have submitted.</p>\n\n<p>By submitting any User Submission, You represent and warrant that:</p>\n\n<ul>\n <li>You are at least 13 years old.</li>\n <li>You have paid and will pay in full all license fees, clearance fees, and other financial obligations, of any kind, arising from any use or commercial exploitation of your User Submissions.</li>\n <li>You are above 18 and know the difference between good and bad. Any illegal activity on the website by you will make us terminate your account forever.</li>\n <li>Any information contained in your User Submission is not known by you to be false, inaccurate, or misleading.</li>\n</ul>\n\n<h3>Linking To this website</h3>\n\n<p>We consider links very important and convenient and that&rsquo;s why we allow you to create certain links from other websites to this website. Again, you must comply with the following terms and conditions if you provide anyone with a link to this website:</p>\n\n<ul>\n <li>You may link to, but may not copy, any Materials.</li>\n <li>You may only use and reproduce a Glorious IT logo or trademark if You follow our trademark and logo usage policy found here.</li>\n <li>You are not allowed to create any border around the materials.</li>\n <li>You are not permitted to state that Glorious IT endorses any services or product of some website which Glorious IT doesn&rsquo;t.</li>\n <li>You are not allowed to establish false relation with Glorious IT.</li>\n <li>You shall not present false or misleading information about Glorious IT, its products, or its services.</li>\n <li>The website that links to this website shall not contain content that could be construed as distasteful, offensive, or controversial.</li>\n <li>The website that links to this website shall contain only content that is appropriate for all age groups.</li>\n</ul>\n\n<h3>Links To Third-Party Websites</h3>\n\n<p>We think links are convenient, and so We have provided links on this website to third-party websites. If You use these links, You will leave this website. Glorious IT is not obligated to:</p>\n\n<ul>\n <li>Review any third-party websites that You link to from this website.</li>\n <li>Control any of the third-party website.</li>\n <li>Handle any of the third-party websites whether it is a product, service or any content available through them.</li>\n <li>Manage any content or link that might be created by you from other websites to this website.</li>\n</ul>\n\n<p>Therefore, Glorious IT does not endorse or make any representations about such third-party websites. It doesn&rsquo;t represent any information, software, products and services that may be obtained from using them.</p>\n\n<p>Glorious IT is not responsible for accessing any of the third party website links by you. You do so entirely at Your own risk. You are suggested to go through the privacy policies and terms &amp; conditions for those third-party websites.</p>\n', '', '<p style=\"text-align:justify\">ESTES TERMOS PADR&Atilde;O DE VENDA (&quot;CONDI&Ccedil;&Otilde;ES DE VENDA&quot;) &Eacute; UM REGISTO ELETR&Ocirc;NICO SOB A FORMA DE UM CONTRATO ELETR&Ocirc;NICO FORMADO E REGRAS DE APLICA&Ccedil;&Atilde;O E AS DISPOSI&Ccedil;&Otilde;ES RELATIVAS AOS DOCUMENTOS ELECTR&Oacute;NICOS / REGISTOS EM DIVERSOS ESTATUTOS. ESTES TERMOS E CONDI&Ccedil;&Otilde;ES DE VENDA N&Atilde;O EXIGEM QUALQUER CONTROLO F&Iacute;SICO, ELETR&Ocirc;NICO OU ASSINATURA DIGITAL.<br />\n<br />\nESTES TERMOS DE VENDA &Eacute; UM DOCUMENTO JURIDICAMENTE VINCULATIVO ENTRE O COMPRADOR E O VENDEDOR ONDE O VENDEDOR FEZ A OFERTA PARA VENDER OS PRODUTOS POR LISTAR OS MESMOS SOBRE O SITE E O COMPRADOR ACEITOU A OFERTA DO VENDEDOR AO CONCORDAR EM COMPRAR O PRODUTO POR ELE OFERECIDO NO SITE. ESTES TERMOS DE VENDA SER&Atilde;O EFICAZES E VINCULATIVOS PARA O VENDEDOR SOBRE A PUBLICIDADE, EXPONDO E CRIANDO UMA LISTA DO PRODUTO NO SITE, E DEVE SER EFICAZ E VINCULATIVO PARA O COMPRADOR AP&Oacute;S O COMPRADOR CONCORDAR EM ADQUIRIR OS PRODUTOS ASSIM ENUMERADOS PELO VENDEDOR.<br />\n<br />\nNestes Termos de venda, um usu&aacute;rio (seja usu&aacute;rio Convidado ou Usu&aacute;rio registado), que compre diversos produtos (conforme definido abaixo) do vendedor no site, localizado no URL&nbsp; e sob o nome e o estilo &quot;Mercadomoz&quot; (no site) &eacute; referido como &quot;Comprador&quot; e o vendedor &eacute; referido como um indiv&iacute;duo ou qualquer entidade jur&iacute;dica que lista, anuncia, exp&otilde;e , oferece para a venda, disponibiliza, publicita, vende e entrega os produtos atrav&eacute;s do site para o comprador (referido como &quot;Vendedor&quot;). Estas condi&ccedil;&otilde;es de venda descrevem, nomeadamente, os termos da oferta de venda/venda, aceita&ccedil;&atilde;o de oferta para venda pelo comprador e a compra de bens e servi&ccedil;os (&quot;Produtos&quot;) atrav&eacute;s do Website do vendedor. Estes Termos venda tamb&eacute;m cont&eacute;m certas declara&ccedil;&otilde;es e ren&uacute;ncias feitas por&nbsp; AdoropeniComercialLimitada (AdoropeniComercial&quot;), que ser&atilde;o obrigat&oacute;rias para o comprador e o vendedor, conforme o caso. &Agrave;s vezes, tanto o comprador e o vendedor s&atilde;o referidos colectivamente como &quot;voc&ecirc;&quot; com as suas varia&ccedil;&otilde;es gramaticais e as express&otilde;es similares.<br />\n<br />\nPOR FAVOR, LEIA ESTES TERMOS CUIDADOSAMENTE ANTES DE LISTAR QUALQUER PRODUTO, OU ANTES, DE COMPRAR QUALQUER PRODUTO. ESTES TERMOS E CONDI&Ccedil;&Otilde;ES DE VENDA, AL&Eacute;M DE DIVERSOS ACORDOS, TERMOS DE PRIVACIDADE, TERMOS DE USO, E TODAS AS OUTRAS POL&Iacute;TICAS DO SITE. O VENDEDOR PODE INCLUIR OUTROS CONFLITANTES OU TERMOS E CONDI&Ccedil;&Otilde;ES DE VENDA NA LISTAGEM DO PRODUTO OU DESCRI&Ccedil;&Atilde;O DO PRODUTO, TAL COMO DISPONIBILIZADOS NO SITE (&quot;TERMOS ADICIONAIS DE VENDA&quot;). SE HOUVER ALGUM CONFLITO ENTRE ESTES TERMOS DE VENDA E AS CONDI&Ccedil;&Otilde;ES DE VENDA, E OS TERMOS ADICIONAIS DE VENDA DEVEM TER PRECED&Ecirc;NCIA PARA A EXTENS&Atilde;O DE TAIS CONFLITOS E, EM RELA&Ccedil;&Atilde;O A ESSA VENDA. SE UM VENDEDOR N&Atilde;O CONCORDA COM ESTES TERMOS E CONDI&Ccedil;&Otilde;ES DE VENDA, POR FAVOR, N&Atilde;O LISTA NEM FAZ QUALQUER OFERTA DE VENDA DE QUALQUER PRODUTO NO SITE E SE UM COMPRADOR N&Atilde;O CONCORDA COM ESTES TERMOS E CONDI&Ccedil;&Otilde;ES DE VENDA E CONDI&Ccedil;&Otilde;ES ADICIONAIS DE VENDA, POR FAVOR, N&Atilde;O COMPRE OU TENTA COMPRAR QUALQUER PRODUTO LISTADO NO SITE.<br />\n<br />\nEstes termos de venda s&atilde;o sujeitos a revis&atilde;o a qualquer momento e, portanto, ambos os compradores e vendedores s&atilde;o solicitados a ler cuidadosamente estes termos e condi&ccedil;&otilde;es de venda do tempo ao tempo antes de qualquer produto ou antes de fazer qualquer compra dos produtos. Os termos revistos de venda ser&atilde;o disponibilizados no site. Se esse mecanismo &eacute; fornecido, voc&ecirc; pode determinar quando estes Termos de Venda foram modificados pela &uacute;ltima vez, consultando a legenda &quot;&Uacute;LTIMA ACTUALIZA&Ccedil;&Atilde;O&quot; fornecido acima.<br />\n<br />\nVoc&ecirc; &eacute; solicitado a visitar regularmente o site para ver as informa&ccedil;&otilde;es dos Termos de venda actualizadas. &Eacute; sua responsabilidade verificar estes Termos de Venda periodicamente para mudan&ccedil;as e o comprador tamb&eacute;m deve verificar os Termos Adicionais de venda do vendedor sobre o produto. Voc&ecirc; pode ser solicitado a fornecer o seu consentimento espec&iacute;fico para quaisquer atualiza&ccedil;&otilde;es de maneira espec&iacute;fica antes de qualquer utiliza&ccedil;&atilde;o do site e servi&ccedil;os relacionados. Se n&atilde;o separar o consentimento &eacute; procurado, seu uso continuado do site ap&oacute;s essas altera&ccedil;&otilde;es e modifica&ccedil;&otilde;es ao Website ou a estes Termos de Venda constituir&aacute; a sua aceita&ccedil;&atilde;o de tais altera&ccedil;&otilde;es ou modifica&ccedil;&otilde;es.</p>\n\n<p style=\"text-align:justify\"><strong>1. OFERTA E ACEITA&Ccedil;&Atilde;O DO PRODUTO</strong><br />\n<strong>1.1</strong> O vendedor faz uma oferta para vender os produtos listados no site do vendedor e do comprador ap&oacute;s concordar em comprar os produtos listados pelo vendedor aceita tal oferta de venda pelo vendedor. Por conseguinte, o contrato de Venda do produto &eacute; ser um contrato bilateral entre o comprador e o vendedor. AdoropeniComercialis &eacute; um terceiro benefici&aacute;rio sob esse contrato bilateral. O Comprador entende e concorda que a oferta de venda do produto, o vendedor n&atilde;o &eacute; um absoluto ou uma oferta condicional. Tal oferta de venda, o vendedor &eacute; objecto de rep&uacute;dio pelo vendedor a qualquer momento antes da entrega do produto para o comprador e sem qualquer obriga&ccedil;&atilde;o de atribuir ou fornecer qualquer raz&atilde;o para tal rep&uacute;dio e sem qualquer consentimento do comprador e sem qualquer responsabilidade ou qualquer outra obriga&ccedil;&atilde;o para com o comprador. O vendedor e o Comprador entendem e concordam que o AdoropeniComercial tem o direito de cancelar qualquer venda, Listagem ou aceita&ccedil;&atilde;o (i) por qualquer motivo, o vendedor, em conformidade com o acordo, os termos de venda, Website de Termos de Uso, Pol&iacute;tica de Privacidade ou ao abrigo de qualquer contrato ou pol&iacute;tica entre AdoropeniComercial , por um lado, e o vendedor ou o comprador, por outro lado, ou (ii) sob uma ordem ou instru&ccedil;&atilde;o de quaisquer direitos legais, quase-judiciais ou autoridade judicial.</p>\n\n<p style=\"text-align:justify\"><strong>2. PRODUTO(S)</strong><br />\n<strong>2.1</strong> O Mercadomoz tamb&eacute;m respeita os direitos de propriedade intelectual de todas as entidades. Se voc&ecirc; acredita que os seus direitos de propriedade intelectual foram violados de qualquer maneira, por favor, preencha e envie o Formul&aacute;rio de aviso de viola&ccedil;&atilde;o de propriedade intelectual (&quot;aviso de viola&ccedil;&atilde;o PI&quot;) prevista no anexo abaixo. Favor enviar o IP devidamente arquivado fora de Aviso de infrac&ccedil;&atilde;o via e-mail para Customercare@mercadomoz.com. Qualquer documento preenchido incompleto ou incorretamente, poder&aacute; n&atilde;o ser considerado.<br />\n<br />\n<strong>2.2 </strong>A disponibilidade do produto sob a oferta de Venda est&aacute; sujeita a altera&ccedil;&otilde;es sem aviso pr&eacute;vio antes da compra do produto pelo comprador. No entanto, pode haver circunst&acirc;ncias em que o produto pode n&atilde;o estar dispon&iacute;vel para ser entregue ao comprador, ap&oacute;s a transa&ccedil;&atilde;o de compra. Nesse caso, o vendedor pode cancelar ou instruir o Mercadomoz para cancelar essa transa&ccedil;&atilde;o de compra sem qualquer recurso ao comprador e sem qualquer responsabilidade para o vendedor ou para Mercadomoz. Se a ordem do comprador &eacute; cancelada, ap&oacute;s o pagamento ter sido processado, o referido montante ser&aacute; revertido / remetido para o comprador, quer para a conta banc&aacute;ria fornecida pelo comprador para essa invers&atilde;o, ou o instrumento de pagamento do comprador a partir do qual o pagamento foi feito, ou de qualquer outro instrumento de pagamento pr&eacute;-pago conta do comprador. O AdoropeniComercial tem o crit&eacute;rio de determinar o modo de revers&atilde;o das op&ccedil;&otilde;es acima.</p>\n', '', '1', '2018-02-14 15:08:39'),
(3, 0, 'Privacy Policy', 'privacy-policy', '<h3>Provided information with your consent</h3>\n\n<p>There are times, however, when we may need information from you. You can visit Glorious IT&#39;s websites without telling us who you are and without giving any directly identifying personal information about yourself. You can provide us with your personal information for example, we may collect the personal information about the timings when you place an order on our website and other information too such as name, address, email address, phone numbers, payment card information. Other information may include product or software experience, social security number (or equivalent national identification number), date of birth and other information you choose to provide. Glorious IT uses this information to facilitate order processing and to enable us to contact you if a problem arises with your order.</p>\n\n<p>Additionally, if you purchase a product requiring service, your personal information may be used to obtain a credit report, if necessary. Please note that if you do not provide us with personal information where required, we may not be able to provide you with the products or services you have requested.</p>\n\n<p>We may ask you for and collect personal information at other times, including when you enter sweepstakes, a contest or other promotion; when you subscribe to receive Glorious IT marketing communications or newsletters; when you complete surveys; when you participate in a user forum or blog; or when you interact with Glorious IT at a trade show, conference or similar event. We use the information you provide to help us design and improve our website and our products, to customize your online experience, to provide advice and purchase recommendations, and for other purposes consistent with this policy.</p>\n\n<p>Glorious IT also conducts research on our users&#39; demographics (e.g. age, gender), interests, and behavior based on the information provided to us when making a purchase, during a promotion, from surveys and from our server log files. We do this to better understand and serve you. In order to prevent the identification of any individual&rsquo;s personal information, this research is compiled and analyzed on an aggregated basis.</p>\n\n<p>Finally, we may also ask for your personal information when you express an interest in employment opportunities at Glorious IT by submitting an application through our websites. The information we collect from you will be made apparent at the time you are submitting your application, and we will use this information only to evaluate your employment candidacy.</p>\n\n<h3>Automatically collected information about you</h3>\n\n<p>Our web server logs collect the domain names and certain related data of visitors to our websites automatically (such as their IP address or device identifier). This information does not identify our visitors directly, and is used to measure number of visits, average time spent on a Glorious IT website, pages viewed and website usage information. We use this information to meet legal or regulatory requirements; to measure the use of our sites; to improve the content of our sites; and to provide tailored advertisements. This information is not used in a form that would enable direct identification of any of our visitors. We may collect this information using cookies, as explained below under the section &quot;Does Glorious IT user cookies, web beacons, analytics and related technologies for online advertising and other purposes?&quot;</p>\n\n<h3>Cookies to store your details automatically</h3>\n\n<p>In order to offer and provide a customized website experience, Glorious IT may use cookies to store and help track information about you. Cookies are the small junks of data that get collected in our database whenever you browse anything on our site. Glorious IT uses cookies to help remind us who you are and to help you navigate our sites during your visits. Cookies enable us to save passwords and preferences for you so you won&#39;t have to re-enter them each time you visit. We also use cookies in order to determine relevant interest based advertisements to serve the user.</p>\n\n<p>Glorious IT may also use cookies to measure traffic patterns and which areas of the Glorious IT site you have visited and your visiting patterns. Glorious IT may use this information to understand how our users navigate our site and to determine common traffic patterns, including what site the user came from. We use this information to simplify site navigation, to make product recommendations and to help design our site in order to make your experience more efficient and enjoyable. The use of cookies is relatively standard. Most browsers are initially set up to accept cookies. However, if you prefer not to store cookies, you can choose to:</p>\n\n<ul>\n <li>not use our sites</li>\n <li>set your browser to notify you when you receive a cookie</li>\n <li>set your browser to refuse to accept cookies</li>\n <li>delete our cookies after visiting our site</li>\n</ul>\n\n<p>Do-Not-Track signals sent by certain browsers. You should also understand that some features of the Glorious IT website may not function properly if you don&#39;t accept cookies.</p>\n\n<p>If you do not know how to control or delete cookies, or would like to opt-out of receiving certain targeted ads based on your browsing history, we recommend that you visit http://www.networkadvertising.org/choices/, www.aboutads.info, or www.youronlinechoices.eu for detailed guidance, including opt-out instructions.</p>\n\n<p>If you would like to opt-out of Google Analytics for Display Advertisers and/or opt out of the customized Google Display Network, you may do so by visiting Google&#39;s Ads Preferences Manager. You may also wish to utilize the Google Analytics Opt-out Browser Add-on to opt-out of Google Analytics. For information on how to do this on the browser of your product or mobile device, you will need to refer to your browser&#39;s or mobile device&#39;s help menu or product manual.</p>\n\n<h3>Your created personalized links</h3>\n\n<p>On occasion, we may personalize and customize websites for certain visitors. Based on your previous interactions with Glorious IT and information you provided us, you may find these sites customized with the products that we may find interesting to you. When you visit these websites, we may modify the site right according to the information about your visit. Any invitation to one of these websites must be personalized in an email.</p>\n\n<p>If you choose to visit one of these websites, Glorious IT will collect information about your visits and associate with other information about you and your relationship with Glorious IT. If you do not want your information to be used in this way, please do not visit these sites.</p>\n\n<h3>Information gathered from a different source</h3>\n\n<p>Just to validate your provided information, we may supplement your information with other available information from time to time. To provide you with the better service, we maintain the accuracy of the information that we collect.</p>\n\n<h3>After you order something</h3>\n\n<p>If you request or order something from a Glorious IT website, such as a product or service, a callback, or specific marketing materials, we will use the information you provide to fulfill your request. To help us do this, we may share information with others, for instance, other parts of Glorious IT, Glorious IT&#39;s service providers, vendors, suppliers, financial institutions, shipping companies, postal or government authorities (e.g., Customs authorities) involved in the fulfillment of your request.</p>\n\n<h3>How do we secure your information?</h3>\n\n<p>Glorious IT implements appropriate technical and organizational measures and processes to protect your personal information and to maintain its quality both during transmission and once it is received. For example, we use encryption when transmitting sensitive information such as a credit card number to help us to keep your information secure.</p>\n', '', '<p style=\"text-align: justify;\"><strong>7. LEI APLIC&Aacute;VEL</strong><br />\nEstes Termos de venda ser&atilde;o regidos de acordo com as leis de Mo&ccedil;ambique, sem refer&ecirc;ncia a conflito dos princ&iacute;pios das leis. Voc&ecirc; concorda que estes Termos de venda s&atilde;o exclusivamente para seu benef&iacute;cio. N&atilde;o s&atilde;o para o benef&iacute;cio de qualquer outra pessoa, excepto os seus sucessores e cession&aacute;rios autorizados.</p>\n\n<p style=\"text-align: justify;\"><strong>8. DECLARA&Ccedil;&Atilde;O DE EXONERA&Ccedil;&Atilde;O DE RESPONSABILIDADE PELO ADOROPENI COMERCIAL</strong><br />\n<strong>8.1</strong> O PAPEL DO ADOROPENI COMERCIAL &Eacute; DE UM INTERMEDI&Aacute;RIO, SOB A FORMA DE UM MERCADO ONLINE E &Eacute; LIMITADO PARA GERIR O SITE PARA LEVAR O VENDEDOR A EXPOR, DIVULGAR, EXIBIR, DISPONIBILIZAR E OFERECER-SE PARA VENDER OS PRODUTOS E PERMITIR QUE O COMPRADOR PARA ADQUIRIR OS PRODUTOS OFERECIDOS E OUTROS SERVI&Ccedil;OS &nbsp;<br />\nCONEXOS, PARA FACILITAR AS TRANSAC&Ccedil;&Otilde;ES ENTRE VENDEDORES E COMPRADORES. POR CONSEGUINTE, O CONTRATO DE VENDA DE QUALQUER DOS PRODUTOS SER&Aacute; UM CONTRATO BILATERAL ENTRE O VENDEDOR E O COMPRADOR. EM NENHUM MOMENTO, ADOROPENI COMERCIAL DEVE&nbsp; TER QUAISQUER OBRIGA&Ccedil;&Otilde;ES OU RESPONSABILIDADES EM RELA&Ccedil;&Atilde;O A ESTE CONTRATO, NEM&nbsp; O ADOROPENI COMERCIAL DE TER QUALQUER T&Iacute;TULO NOS PRODUTOS. O T&Iacute;TULO DOS PRODUTOS E DE OUTROS DIREITOS E INTERESSE NOS PRODUTOS DEVEM PASSAR DIRECTAMENTE PARA O COMPRADOR DO VENDEDOR.</p>\n\n<p style=\"text-align: justify;\"><strong>8.2</strong> ESTES TERMOS DE VENDA N&Atilde;O DEVEM ALTERAR OU MODIFICAR QUAISQUER ACORDOS, CONTRATOS, TERMOS OU POL&Iacute;TICAS ENTRE O COMPRADOR OU O VENDEDOR DE UM LADO E&nbsp; ADOROPENI COMERCIAL POR OUTRO LADO.</p>\n\n<p style=\"text-align: justify;\"><strong>8.3</strong> ADOROPENI COMERCIAL N&Atilde;O CONTROLA, APOIA OU ACEITA A RESPONSABILIDADE POR QUALQUER PRODUTO (INCLUINDO, MAS N&Atilde;O LIMITADO A, CAT&Aacute;LOGOS) OFERECIDO PELOS VENDEDORES, ACESS&Iacute;VEL ATRAV&Eacute;S DO SITE OU DE QUAISQUER SITES VINCULADOS. ADOROPENI COMERCIAL N&Atilde;O FAZ REPRESENTA&Ccedil;&Otilde;ES OU GARANTIAS DE QUALQUER TIPO, E N&Atilde;O PODE SER RESPONS&Aacute;VEL POR, O VENDEDOR OU QUAISQUER TERCEIROS, SEUS PRODUTOS, INCLUINDO REPRESENTA&Ccedil;&Otilde;ES RELATIVAS &Agrave; COMERCIALIZA&Ccedil;&Atilde;O, ADEQUA&Ccedil;&Atilde;O DE UM PRODUTO OU SERVI&Ccedil;O PARA UM DETERMINADO PROP&Oacute;SITO E N&Atilde;O-VIOLA&Ccedil;&Atilde;O DE PROPRIEDADE INTELECTUAL DE TERCEIROS. QUAISQUER TRANSA&Ccedil;&Otilde;ES QUE O COMPRADOR POSSA TER COM TERCEIROS EST&Atilde;O EM RISCO DO COMPRADOR. OS PRODUTOS DEVEM SER OBJECTO DE VENDEDOR. OS TERMOS DA GARANTIA, SERVI&Ccedil;O E MANUTEN&Ccedil;&Atilde;O,&nbsp; E&nbsp; O ADOROPENI COMERCIAL N&Atilde;O ACEITA QUALQUER RESPONSABILIDADE PARA A MESMA. O ADOROPENI COMERCIAL TAMB&Eacute;M N&Atilde;O ACEITA QUALQUER RESPONSABILIDADE PELA UTILIZA&Ccedil;&Atilde;O DOS PRODUTOS PELO COMPRADOR.</p>\n\n<p style=\"text-align: justify;\"><strong>8.4</strong> O ADOROPENI COMERCIAL ESPECIFICAMENTE SE ISENTA DE QUALQUER RESPONSABILIDADE COM RELA&Ccedil;&Atilde;O A QUALQUER CONTE&Uacute;DO ILEGAL, INFRATOR, FALSO, DUPLICA&Ccedil;&Atilde;O, ENGANOSO, DEFEITUOSO OU FALSIFICADO, REMODELADO, PRODUTOS FORA DO PRAZO ADQUIRIDOS PELO COMPRADOR A APARTIR DO VENDEDOR E O ADOROPENI COMERCIAL N&Atilde;O ASSUME QUALQUER RESPONSABILIDADE, CASO O PRODUTO ADQUIRIDO OU APROVEITADO PELO COMPRADOR DO VENDEDOR N&Atilde;O &Eacute; EXATAMENTE DE ACORDO COM AS ESPECIFICA&Ccedil;&Otilde;ES DETALHADAS NA CONFIRMA&Ccedil;&Atilde;O DO PEDIDO DE COMPRA.</p>\n\n<p style=\"text-align: justify;\"><strong>8.5</strong> O AdoropeniComercial &eacute; de maneira nenhuma respons&aacute;vel ou suscept&iacute;vel pela oferta para fins de venda ou venda do produto pelo vendedor ao comprador, a sua entrega, os termos de garantia (se houver) relacionados com o produto e a devolu&ccedil;&atilde;o, restitui&ccedil;&atilde;o ou cancelamento de compra de quaisquer produtos.</p>\n\n<p style=\"text-align: justify;\"><strong>8.6</strong> A AdoropeniComercial n&atilde;o garante que o pre&ccedil;o de venda previsto pelo vendedor do produto seja preciso, adequado e v&aacute;lido. Qualquer erro no pre&ccedil;o de venda deve ser atribu&iacute;do unicamente ao vendedor e n&atilde;o a AdoropeniComercial. Os Pre&ccedil;os, a descri&ccedil;&atilde;o do produto e a disponibilidade do produto s&atilde;o de responsabilidade do vendedor.</p>\n\n<p style=\"text-align: justify;\"><strong>8.7</strong> O comprador reconhece expressamente que o vendedor, ao vender o produto com defeito ser&aacute; respons&aacute;vel perante o comprador por quaisquer reivindica&ccedil;&otilde;es que o comprador possa ter em rela&ccedil;&atilde;o ao tal produto defeituoso e&nbsp;&nbsp; a AdoropeniComercial de forma nenhuma n&atilde;o ser&aacute;&nbsp; respons&aacute;vel pelo mesmo.</p>\n\n<p style=\"text-align: justify;\"><strong>8.8</strong> O AdoropeniComercial n&atilde;o assume qualquer responsabilidade pela n&atilde;o-disponibilidade do produto, a entrega do produto directamente pelo vendedor e a instala&ccedil;&atilde;o do produto, quando necess&aacute;rio.</p>\n', '', '1', '2018-02-14 15:06:03'),
(4, 0, 'Contact Us', 'contact-us', '<div class=\"box1 border1\">\n<h3>Our Address</h3>\n\n<p>Swati Mishra</p>\n\n<p>33/33A, Street No. 307, Industrial Area<br />\nNew Delhi - 110035, INDIA</p>\n\n<p>Phone Number : <strong>905-452-9669</strong> <strong>/</strong> Fax Number : <strong>905-452-9559</strong></p>\n</div>\n\n<div class=\"box2 border1\">\n<h3>Customer Care</h3>\n\n<p>Want to know about our products or queries give us a call or drop a line.</p>\n\n<p>Phone number : <strong>0124-6128000</strong><br />\nEmail us : <a class=\"uu\" href=\"#\">customercare@swatimishra.com</a></p>\n</div>\n', '', NULL, '', '2', '2017-01-27 16:17:46'),
(6, 0, 'Legal Disclaimer', 'legal-disclaimer', '<p><strong><img alt=\"\" src=\"http://localhost/khuzam_industries/uploaded_files/userfiles/images/about-us.jpg\" style=\"float:right; height:189px; width:267px\" />Shopping that helps you make the right choice</strong><br />\r\nWe offer Shopping that is stylish, trendy and reliable &ndash; the Shopping that is light on your pockets, the Shopping that offers all of your favourite brands and more, the Shopping that is simpler, easier, faster and always Online.<br />\r\n<br />\r\nAt Review Real Estate, we understand shopping better, and therefore, we strive to offer you the best of fashion and elegance. We showcase products from all categories such as clothing, footwear, jewellery, accessories, home &amp; living, personal care, and exotic cosmetics.<br />\r\n<strong>Review Real Estate &ndash; the 24 x7 Online Fashion &amp; Lifestyle Store for everyone</strong><br />\r\nForget the fashion streets of the world. We, at Review Real Estate, have all that you need to glam up your lifestyle. From extensive range of men&rsquo;s shirts to exotic .<br />\r\n<br />\r\n<strong>Review Real Estate &ndash; the 24 x7 Online Fashion &amp; Lifestyle Store for everyone</strong><br />\r\nForget the fashion streets of the world. We, at Review Real Estate, have all that you need to glam up your lifestyle. From extensive range of men&rsquo;s shirts to exotic dresses for women to funkiest clothes for kids to matching footwear, sports shoes and accessories for everyone, we purvey diversity of choices under one umbrella. at 0124-6128000 (ctr).</p>\r\n\r\n<ul>\r\n <li>A user friendly interface</li>\r\n <li>Find out and sort suitable partners.</li>\r\n <li>Free registration and online customer support.</li>\r\n <li>Best-in-class match-making services.</li>\r\n <li>Combine varied colors of caste, religion, mother-tongue, communities.</li>\r\n <li>A user friendly interface</li>\r\n <li>Find out and sort suitable partners.</li>\r\n <li>Find out and sort suitable partners.</li>\r\n <li>Best-in-class match-making services.</li>\r\n <li>Free registration and online customer support.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Review Real Estate &ndash; the 24 x7 Online Fashion &amp; Lifestyle Store for everyone</strong><br />\r\nForget the fashion streets of the world. We, at Review Real Estate, have all that you need to glam up your lifestyle. From extensive range of men&rsquo;s shirts to exotic dresses for women to funkiest clothes for kids to matching footwear, sports shoes and accessories for everyone, we purvey diversity of choices under one umbrella. Your Review Real Estate Online Shop has arrived! Do not miss the attractive best buy prices and super discount offers. Get more, pay lesser! Drop a line at care@jabong.com for any query or give us a call at 0124-6128000 (ctr).</p>\r\n', '', NULL, '', '2', '2014-07-24 12:19:34'),
(9, 0, 'Benefits of Registration', 'register', '<div class=\"p10 fs11 bg-gray mt5 border1 mt10\"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500. </div>\r\n        <div class=\"mylist mt25 ml2\" style=\"min-height:130px\">\r\n          <p>Taxes included Login Right</p>\r\n          <p>One voucher valid for one person only</p>\r\n          <p>Can purchase multiple voucher for gifting</p>\r\n          <p>Prior booking mandatory (Call - 080-26646598, 9538995052)</p>\r\n          <p>Discount Coupon can be redeemed in multiple visits</p>\r\n        </div>', '', NULL, '', '2', '2014-08-13 11:12:23'),
(10, 0, 'Help', 'help', '<p><strong>Shopping that helps you make the right choice</strong><br />\r\nWe offer Shopping that is stylish, trendy and reliable &ndash; the Shopping that is light on your pockets, the Shopping that offers all of your favourite brands and more, the Shopping that is simpler, easier, faster and always Online.<br />\r\n<br />\r\nAt Review Real Estate, we understand shopping better, and therefore, we strive to offer you the best of fashion and elegance. We showcase products from all categories such as clothing, footwear, jewellery, accessories, home &amp; living, personal care, and exotic cosmetics.<br />\r\n<strong>Review Real Estate &ndash; the 24 x7 Online Fashion &amp; Lifestyle Store for everyone</strong><br />\r\nForget the fashion streets of the world. We, at Review Real Estate, have all that you need to glam up your lifestyle. From extensive range of men&rsquo;s shirts to exotic .<br />\r\n<br />\r\n<strong>Review Real Estate &ndash; the 24 x7 Online Fashion &amp; Lifestyle Store for everyone</strong><br />\r\nForget the fashion streets of the world. We, at Review Real Estate, have all that you need to glam up your lifestyle. From extensive range of men&rsquo;s shirts to exotic dresses for women to funkiest clothes for kids to matching footwear, sports shoes and accessories for everyone, we purvey diversity of choices under one umbrella. at 0124-6128000 (ctr).</p>\r\n\r\n<ul>\r\n <li>A user friendly interface</li>\r\n <li>Find out and sort suitable partners.</li>\r\n <li>Free registration and online customer support.</li>\r\n <li>Best-in-class match-making services.</li>\r\n <li>Combine varied colors of caste, religion, mother-tongue, communities.</li>\r\n <li>A user friendly interface</li>\r\n <li>Find out and sort suitable partners.</li>\r\n <li>Find out and sort suitable partners.</li>\r\n <li>Best-in-class match-making services.</li>\r\n <li>Free registration and online customer support.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Review Real Estate &ndash; the 24 x7 Online Fashion &amp; Lifestyle Store for everyone</strong><br />\r\nForget the fashion streets of the world. We, at Review Real Estate, have all that you need to glam up your lifestyle. From extensive range of men&rsquo;s shirts to exotic dresses for women to funkiest clothes for kids to matching footwear, sports shoes and accessories for everyone, we purvey diversity of choices under one umbrella. Your Review Real Estate Online Shop has arrived! Do not miss the attractive best buy prices and super discount offers. Get more, pay lesser! Drop a line at care@jabong.com for any query or give us a call at 0124-6128000 (ctr).</p>\r\n', '', NULL, '', '2', '2014-07-24 12:17:14'),
(12, 0, 'Sitemap', 'sitemap', '<p style=\"text-align:justify\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\n', NULL, NULL, '', '1', '2018-01-31 08:25:15'),
(13, 0, 'Home', 'home', '<p><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:times new roman; font-size:12pt\">Welcome to <strong>Blu Impex</strong>. We are the leading manufacturer, supplier, and exporter of a range of Industrial machines. Our products are used by the food industry, paper industry, art, and handicraft industry among others. Our reputation in the market has been acquired thanks to our strong focus on quality, which we follow in every process. </span></p>\n', NULL, NULL, '', '1', '2019-04-12 10:45:54');

-- --------------------------------------------------------

--
-- Table structure for table `wl_colors`
--

CREATE TABLE `wl_colors` (
  `color_id` int(11) NOT NULL,
  `color_name` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `color_code` varchar(16) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `color_date_added` datetime DEFAULT NULL,
  `color_date_updated` datetime DEFAULT NULL,
  `sort_order` int(3) DEFAULT NULL,
  `status` enum('0','1','2') COLLATE latin1_general_ci NOT NULL DEFAULT '1' COMMENT '0=Inactive,1=Active,2=Delete'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `wl_colors`
--

INSERT INTO `wl_colors` (`color_id`, `color_name`, `color_code`, `color_date_added`, `color_date_updated`, `sort_order`, `status`) VALUES
(1, 'Blue', '0000FF', '2013-06-07 05:39:02', '2014-07-10 10:50:28', NULL, '1'),
(2, 'Green', '008000', '2013-11-25 11:52:39', '2014-07-10 10:59:31', NULL, '1'),
(3, 'Red', 'FF0000', '2013-11-26 09:43:27', '2014-07-10 10:50:14', NULL, '1'),
(4, 'Yellow', 'FFFF00', '2014-02-25 10:16:20', '2014-07-10 10:56:28', NULL, '1'),
(5, 'Black', '000000', '2014-06-04 19:59:04', '2014-07-10 10:56:16', NULL, '1'),
(6, 'Ivory', 'FFFFF0', '2014-06-25 08:30:16', '2014-07-10 10:56:02', NULL, '1'),
(7, 'Grey', '808080', '2014-06-25 08:30:59', '2014-07-10 10:52:44', NULL, '1'),
(8, 'White', 'FFFFFF', '2014-06-25 08:31:17', '2014-07-10 10:49:54', NULL, '1'),
(9, 'Brown', '8B4513', '2014-06-25 08:31:51', '2014-07-10 10:55:48', NULL, '1'),
(10, 'Purple', '800080', '2014-06-25 08:32:36', '2014-07-10 10:54:16', NULL, '1'),
(11, 'Navy Blue', '000080', '2014-06-25 08:39:13', '2014-07-10 10:51:18', NULL, '1'),
(12, 'Beige', 'F5F5DC', '2014-06-25 08:47:51', '2014-07-10 10:52:12', NULL, '1'),
(13, 'Orange', 'FFA500', '2014-06-25 09:08:05', '2014-07-10 10:55:29', NULL, '1'),
(16, 'Khaki', 'F0E68C', '2014-07-08 18:55:00', '2014-07-10 10:55:20', NULL, '1'),
(17, 'Tan', 'D2B48C', '2014-07-08 18:57:33', '2014-07-10 10:53:44', NULL, '1'),
(18, 'Cameo', 'Cameo', '2014-07-08 18:57:40', NULL, NULL, '1'),
(19, 'Pink', 'FFC0CB', '2014-07-09 12:40:16', '2014-07-10 10:53:57', NULL, '1'),
(20, 'Dark Green', 'DGreen', '2014-07-09 13:05:29', NULL, NULL, '1'),
(21, 'Coffee', '6F4E37', '2014-07-09 13:05:50', '2014-07-10 11:06:18', NULL, '1'),
(22, 'Wine Red', 'Wred', '2014-07-09 13:06:14', NULL, NULL, '1'),
(23, 'Sky Blue', '87CEEB', '2014-07-09 13:06:23', '2014-07-10 10:54:33', NULL, '1'),
(24, 'Apricot', 'Aprct', '2014-07-09 13:36:24', NULL, NULL, '1'),
(25, 'Silver', 'C0C0C0', '2014-07-09 14:07:49', '2014-07-10 10:52:33', NULL, '1'),
(26, 'Gold', 'FFD700', '2014-07-09 14:08:21', '2014-07-10 11:01:15', NULL, '1'),
(27, 'Rose', 'FF007F', '2014-07-09 14:10:07', '2014-07-10 11:07:40', NULL, '1'),
(28, 'Teal', '008080', '2014-07-10 10:57:10', NULL, NULL, '1'),
(29, 'Light Blue', 'ADD8E6', '2014-07-10 10:58:10', NULL, NULL, '1'),
(30, 'magenta', 'FF00FF', '2014-07-10 10:58:39', NULL, NULL, '1'),
(31, 'Lime Green', '00FF00', '2014-07-10 10:59:46', NULL, NULL, '1'),
(32, 'Maroon', '800000', '2014-07-10 11:00:00', NULL, NULL, '1'),
(33, 'Cyan', '00FFFF', '2014-07-10 11:00:17', NULL, NULL, '1'),
(34, 'Chocolate', '4E2E28', '2014-07-10 11:00:49', '2014-07-10 11:07:08', NULL, '1'),
(35, 'Dark Red', '8B0000', '2014-07-10 11:03:14', NULL, NULL, '1'),
(36, 'Patterned', 'ffffff', '2014-07-16 19:27:18', '2014-08-12 05:58:51', NULL, '1'),
(37, 'Cream', '000000', '2017-09-05 18:34:39', NULL, NULL, '1'),
(38, 'Chiku', '000000', '2017-09-06 12:15:56', NULL, NULL, '1'),
(39, 'Light Brown', '000000', '2017-09-06 12:40:02', NULL, NULL, '1'),
(40, 'Pink Flower', '000000', '2017-09-06 12:43:15', NULL, NULL, '1'),
(41, 'Parrot Green', '000000', '2017-09-06 13:17:40', NULL, NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `wl_countries`
--

CREATE TABLE `wl_countries` (
  `country_id` int(11) NOT NULL,
  `name` varchar(128) COLLATE utf8_bin NOT NULL,
  `iso_code_2` varchar(2) COLLATE utf8_bin NOT NULL DEFAULT '',
  `iso_code_3` varchar(3) COLLATE utf8_bin NOT NULL DEFAULT '',
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `wl_countries`
--

INSERT INTO `wl_countries` (`country_id`, `name`, `iso_code_2`, `iso_code_3`, `status`) VALUES
(1, 'Afghanistan', 'AF', 'AFG', 1),
(2, 'Albania', 'AL', 'ALB', 1),
(3, 'Algeria', 'DZ', 'DZA', 1),
(4, 'American Samoa', 'AS', 'ASM', 1),
(5, 'Andorra', 'AD', 'AND', 1),
(6, 'Angola', 'AO', 'AGO', 1),
(7, 'Anguilla', 'AI', 'AIA', 1),
(8, 'Antarctica', 'AQ', 'ATA', 1),
(9, 'Antigua and Barbuda', 'AG', 'ATG', 1),
(10, 'Argentina', 'AR', 'ARG', 1),
(11, 'Armenia', 'AM', 'ARM', 1),
(12, 'Aruba', 'AW', 'ABW', 1),
(13, 'Australia', 'AU', 'AUS', 1),
(14, 'Austria', 'AT', 'AUT', 1),
(15, 'Azerbaijan', 'AZ', 'AZE', 1),
(16, 'Bahamas', 'BS', 'BHS', 1),
(17, 'Bahrain', 'BH', 'BHR', 1),
(18, 'Bangladesh', 'BD', 'BGD', 1),
(19, 'Barbados', 'BB', 'BRB', 1),
(20, 'Belarus', 'BY', 'BLR', 1),
(21, 'Belgium', 'BE', 'BEL', 1),
(22, 'Belize', 'BZ', 'BLZ', 1),
(23, 'Benin', 'BJ', 'BEN', 1),
(24, 'Bermuda', 'BM', 'BMU', 1),
(25, 'Bhutan', 'BT', 'BTN', 1),
(26, 'Bolivia', 'BO', 'BOL', 1),
(27, 'Bosnia and Herzegowina', 'BA', 'BIH', 1),
(28, 'Botswana', 'BW', 'BWA', 1),
(29, 'Bouvet Island', 'BV', 'BVT', 1),
(30, 'Brazil', 'BR', 'BRA', 1),
(31, 'British Indian Ocean Territory', 'IO', 'IOT', 1),
(32, 'Brunei Darussalam', 'BN', 'BRN', 1),
(33, 'Bulgaria', 'BG', 'BGR', 1),
(34, 'Burkina Faso', 'BF', 'BFA', 1),
(35, 'Burundi', 'BI', 'BDI', 1),
(36, 'Cambodia', 'KH', 'KHM', 1),
(37, 'Cameroon', 'CM', 'CMR', 1),
(38, 'Canada', 'CA', 'CAN', 1),
(39, 'Cape Verde', 'CV', 'CPV', 1),
(40, 'Cayman Islands', 'KY', 'CYM', 1),
(41, 'Central African Republic', 'CF', 'CAF', 1),
(42, 'Chad', 'TD', 'TCD', 1),
(43, 'Chile', 'CL', 'CHL', 1),
(44, 'China', 'CN', 'CHN', 1),
(45, 'Christmas Island', 'CX', 'CXR', 1),
(46, 'Cocos (Keeling) Islands', 'CC', 'CCK', 1),
(47, 'Colombia', 'CO', 'COL', 1),
(48, 'Comoros', 'KM', 'COM', 1),
(49, 'Congo', 'CG', 'COG', 1),
(50, 'Cook Islands', 'CK', 'COK', 1),
(51, 'Costa Rica', 'CR', 'CRI', 1),
(52, 'Cote D\'Ivoire', 'CI', 'CIV', 1),
(53, 'Croatia', 'HR', 'HRV', 1),
(54, 'Cuba', 'CU', 'CUB', 1),
(55, 'Cyprus', 'CY', 'CYP', 1),
(56, 'Czech Republic', 'CZ', 'CZE', 1),
(57, 'Denmark', 'DK', 'DNK', 1),
(58, 'Djibouti', 'DJ', 'DJI', 1),
(59, 'Dominica', 'DM', 'DMA', 1),
(60, 'Dominican Republic', 'DO', 'DOM', 1),
(61, 'East Timor', 'TP', 'TMP', 1),
(62, 'Ecuador', 'EC', 'ECU', 1),
(63, 'Egypt', 'EG', 'EGY', 1),
(64, 'El Salvador', 'SV', 'SLV', 1),
(65, 'Equatorial Guinea', 'GQ', 'GNQ', 1),
(66, 'Eritrea', 'ER', 'ERI', 1),
(67, 'Estonia', 'EE', 'EST', 1),
(68, 'Ethiopia', 'ET', 'ETH', 1),
(69, 'Falkland Islands (Malvinas)', 'FK', 'FLK', 1),
(70, 'Faroe Islands', 'FO', 'FRO', 1),
(71, 'Fiji', 'FJ', 'FJI', 1),
(72, 'Finland', 'FI', 'FIN', 1),
(73, 'France', 'FR', 'FRA', 1),
(74, 'France, Metropolitan', 'FX', 'FXX', 1),
(75, 'French Guiana', 'GF', 'GUF', 1),
(76, 'French Polynesia', 'PF', 'PYF', 1),
(77, 'French Southern Territories', 'TF', 'ATF', 1),
(78, 'Gabon', 'GA', 'GAB', 1),
(79, 'Gambia', 'GM', 'GMB', 1),
(80, 'Georgia', 'GE', 'GEO', 1),
(81, 'Germany', 'DE', 'DEU', 1),
(82, 'Ghana', 'GH', 'GHA', 1),
(83, 'Gibraltar', 'GI', 'GIB', 1),
(84, 'Greece', 'GR', 'GRC', 1),
(85, 'Greenland', 'GL', 'GRL', 1),
(86, 'Grenada', 'GD', 'GRD', 1),
(87, 'Guadeloupe', 'GP', 'GLP', 1),
(88, 'Guam', 'GU', 'GUM', 1),
(89, 'Guatemala', 'GT', 'GTM', 1),
(90, 'Guinea', 'GN', 'GIN', 1),
(91, 'Guinea-bissau', 'GW', 'GNB', 1),
(92, 'Guyana', 'GY', 'GUY', 1),
(93, 'Haiti', 'HT', 'HTI', 1),
(94, 'Heard and Mc Donald Islands', 'HM', 'HMD', 1),
(95, 'Honduras', 'HN', 'HND', 1),
(96, 'Hong Kong', 'HK', 'HKG', 1),
(97, 'Hungary', 'HU', 'HUN', 1),
(98, 'Iceland', 'IS', 'ISL', 1),
(99, 'India', 'IN', 'IND', 1),
(100, 'Indonesia', 'ID', 'IDN', 1),
(101, 'Iran (Islamic Republic of)', 'IR', 'IRN', 1),
(102, 'Iraq', 'IQ', 'IRQ', 1),
(103, 'Ireland', 'IE', 'IRL', 1),
(104, 'Israel', 'IL', 'ISR', 1),
(105, 'Italy', 'IT', 'ITA', 1),
(106, 'Jamaica', 'JM', 'JAM', 1),
(107, 'Japan', 'JP', 'JPN', 1),
(108, 'Jordan', 'JO', 'JOR', 1),
(109, 'Kazakhstan', 'KZ', 'KAZ', 1),
(110, 'Kenya', 'KE', 'KEN', 1),
(111, 'Kiribati', 'KI', 'KIR', 1),
(112, 'North Korea', 'KP', 'PRK', 1),
(113, 'Korea, Republic of', 'KR', 'KOR', 1),
(114, 'Kuwait', 'KW', 'KWT', 1),
(115, 'Kyrgyzstan', 'KG', 'KGZ', 1),
(116, 'Lao People\'s Democratic Republic', 'LA', 'LAO', 1),
(117, 'Latvia', 'LV', 'LVA', 1),
(118, 'Lebanon', 'LB', 'LBN', 1),
(119, 'Lesotho', 'LS', 'LSO', 1),
(120, 'Liberia', 'LR', 'LBR', 1),
(121, 'Libyan Arab Jamahiriya', 'LY', 'LBY', 1),
(122, 'Liechtenstein', 'LI', 'LIE', 1),
(123, 'Lithuania', 'LT', 'LTU', 1),
(124, 'Luxembourg', 'LU', 'LUX', 1),
(125, 'Macau', 'MO', 'MAC', 1),
(126, 'Macedonia', 'MK', 'MKD', 1),
(127, 'Madagascar', 'MG', 'MDG', 1),
(128, 'Malawi', 'MW', 'MWI', 1),
(129, 'Malaysia', 'MY', 'MYS', 1),
(130, 'Maldives', 'MV', 'MDV', 1),
(131, 'Mali', 'ML', 'MLI', 1),
(132, 'Malta', 'MT', 'MLT', 1),
(133, 'Marshall Islands', 'MH', 'MHL', 1),
(134, 'Martinique', 'MQ', 'MTQ', 1),
(135, 'Mauritania', 'MR', 'MRT', 1),
(136, 'Mauritius', 'MU', 'MUS', 1),
(137, 'Mayotte', 'YT', 'MYT', 1),
(138, 'Mexico', 'MX', 'MEX', 1),
(139, 'Micronesia, Federated States of', 'FM', 'FSM', 1),
(140, 'Moldova, Republic of', 'MD', 'MDA', 1),
(141, 'Monaco', 'MC', 'MCO', 1),
(142, 'Mongolia', 'MN', 'MNG', 1),
(143, 'Montserrat', 'MS', 'MSR', 1),
(144, 'Morocco', 'MA', 'MAR', 1),
(145, 'Mozambique', 'MZ', 'MOZ', 1),
(146, 'Myanmar', 'MM', 'MMR', 1),
(147, 'Namibia', 'NA', 'NAM', 1),
(148, 'Nauru', 'NR', 'NRU', 1),
(149, 'Nepal', 'NP', 'NPL', 1),
(150, 'Netherlands', 'NL', 'NLD', 1),
(151, 'Netherlands Antilles', 'AN', 'ANT', 1),
(152, 'New Caledonia', 'NC', 'NCL', 1),
(153, 'New Zealand', 'NZ', 'NZL', 1),
(154, 'Nicaragua', 'NI', 'NIC', 1),
(155, 'Niger', 'NE', 'NER', 1),
(156, 'Nigeria', 'NG', 'NGA', 1),
(157, 'Niue', 'NU', 'NIU', 1),
(158, 'Norfolk Island', 'NF', 'NFK', 1),
(159, 'Northern Mariana Islands', 'MP', 'MNP', 1),
(160, 'Norway', 'NO', 'NOR', 1),
(161, 'Oman', 'OM', 'OMN', 1),
(162, 'Pakistan', 'PK', 'PAK', 1),
(163, 'Palau', 'PW', 'PLW', 1),
(164, 'Panama', 'PA', 'PAN', 1),
(165, 'Papua New Guinea', 'PG', 'PNG', 1),
(166, 'Paraguay', 'PY', 'PRY', 1),
(167, 'Peru', 'PE', 'PER', 1),
(168, 'Philippines', 'PH', 'PHL', 1),
(169, 'Pitcairn', 'PN', 'PCN', 1),
(170, 'Poland', 'PL', 'POL', 1),
(171, 'Portugal', 'PT', 'PRT', 1),
(172, 'Puerto Rico', 'PR', 'PRI', 1),
(173, 'Qatar', 'QA', 'QAT', 1),
(174, 'Reunion', 'RE', 'REU', 1),
(175, 'Romania', 'RO', 'ROM', 1),
(176, 'Russian Federation', 'RU', 'RUS', 1),
(177, 'Rwanda', 'RW', 'RWA', 1),
(178, 'Saint Kitts and Nevis', 'KN', 'KNA', 1),
(179, 'Saint Lucia', 'LC', 'LCA', 1),
(180, 'Saint Vincent and the Grenadines', 'VC', 'VCT', 1),
(181, 'Samoa', 'WS', 'WSM', 1),
(182, 'San Marino', 'SM', 'SMR', 1),
(183, 'Sao Tome and Principe', 'ST', 'STP', 1),
(184, 'Saudi Arabia', 'SA', 'SAU', 1),
(185, 'Senegal', 'SN', 'SEN', 1),
(186, 'Seychelles', 'SC', 'SYC', 1),
(187, 'Sierra Leone', 'SL', 'SLE', 1),
(188, 'Singapore', 'SG', 'SGP', 1),
(189, 'Slovak Republic', 'SK', 'SVK', 1),
(190, 'Slovenia', 'SI', 'SVN', 1),
(191, 'Solomon Islands', 'SB', 'SLB', 1),
(192, 'Somalia', 'SO', 'SOM', 1),
(193, 'South Africa', 'ZA', 'ZAF', 1),
(194, 'South Georgia &amp; South Sandwich Islands', 'GS', 'SGS', 1),
(195, 'Spain', 'ES', 'ESP', 1),
(196, 'Sri Lanka', 'LK', 'LKA', 1),
(197, 'St. Helena', 'SH', 'SHN', 1),
(198, 'St. Pierre and Miquelon', 'PM', 'SPM', 1),
(199, 'Sudan', 'SD', 'SDN', 1),
(200, 'Suriname', 'SR', 'SUR', 1),
(201, 'Svalbard and Jan Mayen Islands', 'SJ', 'SJM', 1),
(202, 'Swaziland', 'SZ', 'SWZ', 1),
(203, 'Sweden', 'SE', 'SWE', 1),
(204, 'Switzerland', 'CH', 'CHE', 1),
(205, 'Syrian Arab Republic', 'SY', 'SYR', 1),
(206, 'Taiwan', 'TW', 'TWN', 1),
(207, 'Tajikistan', 'TJ', 'TJK', 1),
(208, 'Tanzania, United Republic of', 'TZ', 'TZA', 1),
(209, 'Thailand', 'TH', 'THA', 1),
(210, 'Togo', 'TG', 'TGO', 1),
(211, 'Tokelau', 'TK', 'TKL', 1),
(212, 'Tonga', 'TO', 'TON', 1),
(213, 'Trinidad and Tobago', 'TT', 'TTO', 1),
(214, 'Tunisia', 'TN', 'TUN', 1),
(215, 'Turkey', 'TR', 'TUR', 1),
(216, 'Turkmenistan', 'TM', 'TKM', 1),
(217, 'Turks and Caicos Islands', 'TC', 'TCA', 1),
(218, 'Tuvalu', 'TV', 'TUV', 1),
(219, 'Uganda', 'UG', 'UGA', 1),
(220, 'Ukraine', 'UA', 'UKR', 1),
(221, 'United Arab Emirates', 'AE', 'ARE', 1),
(222, 'United Kingdom', 'GB', 'GBR', 1),
(223, 'United States', 'US', 'USA', 1),
(224, 'United States Minor Outlying Islands', 'UM', 'UMI', 1),
(225, 'Uruguay', 'UY', 'URY', 1),
(226, 'Uzbekistan', 'UZ', 'UZB', 1),
(227, 'Vanuatu', 'VU', 'VUT', 1),
(228, 'Vatican City State (Holy See)', 'VA', 'VAT', 1),
(229, 'Venezuela', 'VE', 'VEN', 1),
(230, 'Viet Nam', 'VN', 'VNM', 1),
(231, 'Virgin Islands (British)', 'VG', 'VGB', 1),
(232, 'Virgin Islands (U.S.)', 'VI', 'VIR', 1),
(233, 'Wallis and Futuna Islands', 'WF', 'WLF', 1),
(234, 'Western Sahara', 'EH', 'ESH', 1),
(235, 'Yemen', 'YE', 'YEM', 1),
(236, 'Yugoslavia', 'YU', 'YUG', 1),
(237, 'Democratic Republic of Congo', 'CD', 'COD', 1),
(238, 'Zambia', 'ZM', 'ZMB', 1),
(239, 'Zimbabwe', 'ZW', 'ZWE', 1);

-- --------------------------------------------------------

--
-- Table structure for table `wl_coupan_users`
--

CREATE TABLE `wl_coupan_users` (
  `cpn_usr_id` int(11) NOT NULL,
  `coupan_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `added_by` enum('WEB','API') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wl_coupan_users`
--

INSERT INTO `wl_coupan_users` (`cpn_usr_id`, `coupan_id`, `user_id`, `added_by`) VALUES
(1, 2, 1, 'API');

-- --------------------------------------------------------

--
-- Table structure for table `wl_currencies`
--

CREATE TABLE `wl_currencies` (
  `currency_id` int(11) NOT NULL,
  `title` varchar(32) COLLATE utf8_bin NOT NULL DEFAULT '',
  `code` varchar(3) COLLATE utf8_bin NOT NULL DEFAULT '',
  `symbol_left` varchar(12) COLLATE utf8_bin NOT NULL,
  `symbol_right` varchar(12) COLLATE utf8_bin NOT NULL,
  `decimal_place` char(1) COLLATE utf8_bin DEFAULT NULL,
  `value` float(15,4) DEFAULT NULL,
  `is_default` enum('Y','N') COLLATE utf8_bin NOT NULL DEFAULT 'N',
  `curr_image` varchar(255) COLLATE utf8_bin NOT NULL,
  `status` enum('1','0') COLLATE utf8_bin NOT NULL DEFAULT '1',
  `date_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `wl_currencies`
--

INSERT INTO `wl_currencies` (`currency_id`, `title`, `code`, `symbol_left`, `symbol_right`, `decimal_place`, `value`, `is_default`, `curr_image`, `status`, `date_modified`) VALUES
(1, 'US Dollar', 'USD', '$', '', '2', 0.0200, 'N', 'usov2L.png', '1', '2010-10-30 09:59:24'),
(2, 'Pound Sterling ', 'GBP', 'Â£', '', '2', 0.0100, 'N', 'ukA8iT.png', '1', '2010-10-30 09:59:24'),
(3, 'India', 'IND', 'Rs.', '', '2', 1.0000, 'Y', 'aexCXt.png', '1', '2010-10-30 09:59:24');

-- --------------------------------------------------------

--
-- Table structure for table `wl_customers`
--

CREATE TABLE `wl_customers` (
  `customers_id` int(11) NOT NULL,
  `title` tinyint(2) DEFAULT NULL,
  `user_name` varchar(80) NOT NULL COMMENT 'customer  email  id used as username',
  `profile_picture` varchar(250) DEFAULT NULL,
  `password` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` enum('M','F') CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT 'M',
  `birth_date` date DEFAULT NULL,
  `customer_photo` varchar(32) DEFAULT NULL,
  `user_location` varchar(255) DEFAULT NULL,
  `phone_number` varchar(32) DEFAULT NULL,
  `mobile_number` varchar(32) DEFAULT NULL,
  `find_us` varchar(20) DEFAULT NULL,
  `actkey` varchar(32) NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '0' COMMENT '0=Inactive,1=Active,2=Deleted ',
  `is_verified` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0=unverfied,1=verfied',
  `login_type` enum('normal','facebook','google') NOT NULL DEFAULT 'normal',
  `account_created_date` datetime DEFAULT NULL,
  `current_login` datetime NOT NULL,
  `last_login_date` datetime DEFAULT NULL,
  `ip_address` varchar(25) NOT NULL,
  `is_blocked` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0=unblocked,1=blocked',
  `block_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `number_of_login_try` int(4) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wl_customers_address_book`
--

CREATE TABLE `wl_customers_address_book` (
  `address_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `mtitle` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `first_name` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `landmark` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zipcode` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reciv_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `address_type` enum('Bill','Ship') COLLATE utf8_unicode_ci DEFAULT 'Bill',
  `default_address` enum('N','Y') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'N',
  `default_status` enum('Y','N') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `wl_customers_address_book`
--

INSERT INTO `wl_customers_address_book` (`address_id`, `customer_id`, `mtitle`, `first_name`, `last_name`, `address`, `landmark`, `mobile`, `zipcode`, `phone`, `fax`, `city`, `state`, `country`, `reciv_date`, `address_type`, `default_address`, `default_status`) VALUES
(1, 39, NULL, 'John Martin', NULL, 'Address', 'Delhi, India', '123456789', '', NULL, NULL, 'City of Industry, CA, United States', 'Delhi, India', 'Mozambique', '2018-01-03 04:15:05', 'Ship', 'N', 'N'),
(2, 39, NULL, 'John Martin', NULL, 'Address', 'Delhi, India', '123456789', '', NULL, NULL, 'City of Industry, CA, United States', 'Delhi, India', 'Mozambique', '2018-01-03 04:15:05', 'Bill', 'N', 'N'),
(3, 40, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-01-16 07:57:50', 'Bill', 'N', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `wl_customer_token`
--

CREATE TABLE `wl_customer_token` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `token_id` text NOT NULL,
  `status` enum('T','F') DEFAULT NULL COMMENT '''F''=Inactive,''T''=Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wl_discount_coupans`
--

CREATE TABLE `wl_discount_coupans` (
  `cpn_id` int(11) NOT NULL,
  `cpn_type` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0=Fixed/1=Percentage',
  `cpn_code` text NOT NULL,
  `cpn_name` text NOT NULL,
  `cpn_rate` int(11) NOT NULL,
  `minimum_amount_for_coupan_apply` decimal(10,2) DEFAULT NULL,
  `cpn_start_date` date NOT NULL,
  `cpn_end_date` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '0=Deactive/1=Active/2=Deleted'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wl_enquiry`
--

CREATE TABLE `wl_enquiry` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `type` enum('1','2','3','4') NOT NULL DEFAULT '3' COMMENT '1=Enquiries,2=Suggestioin,3=Contact us,4=Product Query',
  `product_service` varchar(220) DEFAULT NULL,
  `email` varchar(200) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) DEFAULT NULL,
  `order_no` varchar(250) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `company_name` varchar(60) DEFAULT NULL,
  `country` varchar(200) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `phone_number` varchar(200) DEFAULT NULL,
  `mobile_number` varchar(30) DEFAULT NULL,
  `address` varchar(220) DEFAULT NULL,
  `zipcode` varchar(10) DEFAULT NULL,
  `message` text NOT NULL,
  `back_time` varchar(255) DEFAULT NULL,
  `status` enum('1','2') NOT NULL,
  `reply_status` enum('Y','N') NOT NULL DEFAULT 'N',
  `receive_date` datetime NOT NULL,
  `post_date` varchar(20000) NOT NULL,
  `en_url` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wl_enquiry`
--

INSERT INTO `wl_enquiry` (`id`, `product_id`, `type`, `product_service`, `email`, `first_name`, `last_name`, `order_no`, `subject`, `company_name`, `country`, `state`, `city`, `phone_number`, `mobile_number`, `address`, `zipcode`, `message`, `back_time`, `status`, `reply_status`, `receive_date`, `post_date`, `en_url`) VALUES
(1, NULL, '3', NULL, 'madhuranjan00@gmail.com', 'Pragati Maidan Exhibition', NULL, '', '', NULL, NULL, NULL, NULL, NULL, '9718987547', 'New Delhi, Delhi, India', NULL, ' sasas', NULL, '1', 'N', '0000-00-00 00:00:00', '', 'http://www.webpulse.co/stec/about-us.html'),
(2, NULL, '3', NULL, 'madhuranjan00@gmail.com', 'Madhu Ranjan', NULL, '', '', NULL, NULL, NULL, NULL, NULL, '9718987547', 'New Delhi, Delhi, India', NULL, ' sdssd', NULL, '1', 'N', '0000-00-00 00:00:00', '', 'http://www.webpulse.co/stec/about-us.html'),
(3, NULL, '3', NULL, 'kaka@gmail.com', 'Madhu Ranjan', NULL, '', '', NULL, NULL, NULL, NULL, NULL, '9718987547', 'new', NULL, ' dsds', NULL, '1', 'N', '0000-00-00 00:00:00', '', 'http://www.webpulse.co/stec/our-product.html'),
(4, NULL, '3', NULL, 'madhuranjan00@gmail.com', 'Madhu Ranjan', NULL, '', '', NULL, NULL, NULL, NULL, NULL, '9718987547', 'new dw', NULL, ' sasas', NULL, '1', 'N', '0000-00-00 00:00:00', '', 'http://www.webpulse.co/stec/our-product.html'),
(5, NULL, '3', NULL, 'madhuranjan00@gmail.com', 'Madhu Ranjan', NULL, '', '', NULL, NULL, NULL, NULL, NULL, '9718987547', 'New Delhi, Delhi, India', NULL, ' sasa', NULL, '1', 'N', '0000-00-00 00:00:00', '', 'http://www.webpulse.co/stec/contact-us.html'),
(6, NULL, '3', NULL, 'kirpanand@webpulseindia.com', 'Vicky Jha', NULL, '', '', NULL, NULL, NULL, NULL, NULL, '9910505554', 'Delhi, India', NULL, ' gr', NULL, '1', 'N', '0000-00-00 00:00:00', '', 'http://www.webpulse.co/stec/about-us.html'),
(7, NULL, '3', NULL, 'bittu.wps@gmail.com', 'Bittu Yadav', NULL, '', '', NULL, NULL, NULL, NULL, NULL, '8860634853', 'New Delhi', NULL, ' Testing.', NULL, '1', 'N', '0000-00-00 00:00:00', '', 'http://www.webpulse.co/shriankenterprise/variable-vane-pump-vp-series.html'),
(8, NULL, '3', NULL, 'b2yadav12@gmail.com', 'Bittu Yadav', NULL, '', '', NULL, NULL, NULL, NULL, NULL, '8860634853', 'New Delhi', NULL, ' This is Testing.', NULL, '1', 'N', '0000-00-00 00:00:00', '', 'http://www.webpulse.co/shriankenterprise/variable-vane-pump-vp-series.html'),
(9, NULL, '3', NULL, 'b2yadav12@gmail.com', 'Bittu Yadav', NULL, '', '', NULL, NULL, NULL, NULL, NULL, '8860634853', 'New Delhi', NULL, ' Testing.', NULL, '1', 'N', '0000-00-00 00:00:00', '', 'http://www.webpulse.co/shriankenterprise/variable-vane-pump-vp-series.html'),
(10, NULL, '3', NULL, 'b2yadav12@gmail.com', 'Bittu Yadav', NULL, '', '', NULL, NULL, NULL, NULL, NULL, '8860634853', 'New Delhi', NULL, ' Testing.', NULL, '1', 'N', '0000-00-00 00:00:00', '', 'http://www.webpulse.co/shriankenterprise/variable-vane-pump-vp-series.html'),
(11, NULL, '3', NULL, 'b2yadav12@gmail.com', 'Bittu Yadav', NULL, '', '', NULL, NULL, NULL, NULL, NULL, '8860634853', 'New Delhi', NULL, ' Testing.', NULL, '1', 'N', '0000-00-00 00:00:00', '', 'http://www.webpulse.co/shriankenterprise/variable-vane-pump-vp-series.html'),
(12, NULL, '3', NULL, 'bittu.wps@gmail.com', 'Bittu Yadav', NULL, '', '', NULL, NULL, NULL, NULL, NULL, '8860634853', 'New Delhi', NULL, ' Testing.', NULL, '1', 'N', '0000-00-00 00:00:00', '', 'http://www.webpulse.co/shriankenterprise/variable-vane-pump-vp-series.html'),
(13, NULL, '3', NULL, 'bittu.wps@gmail.com', 'Bittu Yadav', NULL, '', '', NULL, NULL, NULL, NULL, NULL, '8860634853', 'New Delhi', NULL, ' Testing.', NULL, '1', 'N', '0000-00-00 00:00:00', '', 'http://www.webpulse.co/shriankenterprise/variable-vane-pump-vp-series.html'),
(14, NULL, '3', NULL, 'b2yadav12@gmail.com', 'Bittu Yadav', NULL, '', '', NULL, NULL, NULL, NULL, NULL, '8860634853', 'Tester Road, Snohomish, WA, USA', NULL, ' Test Message', NULL, '1', 'N', '0000-00-00 00:00:00', '', 'http://www.webpulse.co/shriankenterprise/vickers-replacement-vane-pumps.html'),
(15, NULL, '3', NULL, 'b2yadav12@gmail.com', 'Sanjay Yadav', NULL, '', '', NULL, NULL, NULL, NULL, NULL, '8826648669', 'New Delhi, Delhi, India', NULL, ' Side bar enquiry Testing.', NULL, '1', 'N', '0000-00-00 00:00:00', '', 'http://www.webpulse.co/shriankenterprise/vickers-replacement-vane-pumps.html'),
(16, NULL, '3', NULL, 'b2yadav12@gmail.com', 'Ankit Gupta', NULL, '', '', NULL, NULL, NULL, NULL, NULL, '8860634853', 'New Delhi, Delhi, India', NULL, ' This Is About Us Page Testing Enquiry.', NULL, '1', 'N', '0000-00-00 00:00:00', '', 'http://www.webpulse.co/shriankenterprise/about-us'),
(17, NULL, '3', NULL, 'bittu.wps@gmail.com', 'Bittu Yadav', NULL, '', '', NULL, NULL, NULL, NULL, NULL, '8860634853', 'sdsd', NULL, ' sdsdsd', NULL, '1', 'N', '0000-00-00 00:00:00', '', 'http://www.webpulse.co/shriankenterprise/'),
(18, NULL, '3', NULL, 'madhu@gmail.com', 'Amit Yadav', NULL, '', '', NULL, NULL, NULL, NULL, NULL, '8860634853', 'France', NULL, ' Call Back Enquiry', NULL, '1', 'N', '0000-00-00 00:00:00', '', 'http://www.webpulse.co/shriankenterprise/'),
(19, NULL, '3', NULL, 'satyam@gmail.com', 'Satyam Singh', NULL, '', '', NULL, NULL, NULL, NULL, NULL, '8860634853', 'South Africa', NULL, ' Testing', NULL, '1', 'N', '0000-00-00 00:00:00', '', 'http://www.webpulse.co/shriankenterprise/hydrank-hvp-series-pumps'),
(20, NULL, '3', NULL, 'kirpanand@webpulseindia.com', 'Vicky Jha', NULL, '', '', NULL, NULL, NULL, NULL, NULL, '9910505554', 'Delhi', NULL, ' kjasdkj kjshdj', NULL, '1', 'N', '0000-00-00 00:00:00', '', 'http://www.webpulse.co/shriankenterprise/velijan-vane-pump/velijan-pump'),
(21, NULL, '3', NULL, 'bittu.wps@gmail.com', 'Bittu Yadav', NULL, '', '', NULL, NULL, NULL, NULL, NULL, '8860634853', 'New Delhi', NULL, ' Testing', NULL, '1', 'N', '0000-00-00 00:00:00', '', 'http://www.webpulse.co/blu-impex/products/pen-making-machine.html'),
(22, NULL, '3', NULL, 'php@webpulseindia.com', 'Komal', NULL, '', '', NULL, NULL, NULL, NULL, NULL, '8860634853', 'New York, NY, USA', NULL, ' Enquiry Testing.', NULL, '1', 'N', '0000-00-00 00:00:00', '', 'http://www.webpulse.co/blu-impex/blog'),
(23, NULL, '3', NULL, 'cs@webpulseindia.com', 'test', NULL, '', '', NULL, NULL, NULL, NULL, NULL, '8447811680', 'Delhi, India', NULL, ' dfh', NULL, '1', 'N', '0000-00-00 00:00:00', '', 'http://www.webpulse.co/blu-impex/'),
(24, NULL, '3', NULL, 'bittu.wps@gmail.com', 'Bittu Yadav', NULL, '', '', NULL, NULL, NULL, NULL, NULL, '8860634853', 'New Delhi', NULL, ' Testing Blu Impax', NULL, '1', 'N', '0000-00-00 00:00:00', '', 'http://www.webpulse.co/blu-impex/noodles-making-machine/automatic-noodles-making-machine.html'),
(25, NULL, '3', NULL, 'bittu.wps@gmail.com', 'Bittu Yadav', NULL, '', '', NULL, NULL, NULL, NULL, NULL, '8860634853', 'California, USA', NULL, ' Contact Sidebar enquiry.', NULL, '1', 'N', '0000-00-00 00:00:00', '', 'http://www.webpulse.co/blu-impex/noodles-making-machine/automatic-noodles-making-machine.html'),
(26, NULL, '3', NULL, 'chandan@gmail.com', 'Chandan Singh', NULL, '', '', NULL, NULL, NULL, NULL, NULL, '8860634853', 'California', NULL, ' AM NOODLES MAKING MACHINE Product Enquiry.', NULL, '1', 'N', '0000-00-00 00:00:00', '', 'http://www.webpulse.co/blu-impex/patna/automatic-noodles-making-machine.html');

-- --------------------------------------------------------

--
-- Table structure for table `wl_enquiry1`
--

CREATE TABLE `wl_enquiry1` (
  `ID` int(9) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mobile_number` varchar(200) NOT NULL,
  `message` varchar(500) NOT NULL,
  `post_date` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `wl_fullset`
--

CREATE TABLE `wl_fullset` (
  `setId` int(11) NOT NULL,
  `category_id` int(11) NOT NULL COMMENT 'parent_id= last level of category ',
  `category_links` varchar(80) NOT NULL,
  `catalog_name` varchar(255) NOT NULL,
  `catalog_alt` varchar(100) DEFAULT NULL,
  `friendly_url` varchar(110) DEFAULT NULL,
  `catalog_code` varchar(64) NOT NULL,
  `catalog_qty` decimal(10,2) NOT NULL DEFAULT '0.00',
  `catalog_description` text NOT NULL COMMENT 'full description',
  `catalog_price` decimal(10,2) DEFAULT NULL,
  `catalog_discounted_price` decimal(10,2) DEFAULT NULL,
  `catalog_image` varchar(160) DEFAULT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1' COMMENT '1=active,0=inactive,2=deleted',
  `catalog_added_date` datetime NOT NULL,
  `catalog_updated_date` datetime DEFAULT NULL,
  `catalog_viewed` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wl_fullset`
--

INSERT INTO `wl_fullset` (`setId`, `category_id`, `category_links`, `catalog_name`, `catalog_alt`, `friendly_url`, `catalog_code`, `catalog_qty`, `catalog_description`, `catalog_price`, `catalog_discounted_price`, `catalog_image`, `status`, `catalog_added_date`, `catalog_updated_date`, `catalog_viewed`) VALUES
(1, 32, '32,1', 'Princess Vol - 6', 'Princess Vol - 6', 'princess-vol-6', 'Princess Vol - 6', 15.00, '', 20235.00, 0.00, '3801QLri.jpg', '1', '2017-09-06 16:50:04', '2017-09-16 17:22:45', 0),
(2, 26, '26,1', 'Gaon Ki Gori', 'Gaon Ki Gori', 'gaon-ki-gori', 'Gaon Ki Gori', 10.00, '<p>fgffgdfh g hd fh dgt hfdhfdg</p>', 6650.00, 5850.00, '78pZd.jpg', '1', '2017-09-06 17:03:23', '2017-09-19 11:31:43', 0),
(3, 51, '51,22', 'Ghunghat', 'Ghunghat', 'ghunghat', 'Ghunghat', 8.00, '', 13592.00, 0.00, '32008JyrW.jpg', '1', '2017-09-06 17:14:36', '2017-09-16 17:21:53', 0),
(4, 26, '26,1', 'Kuthumpully', 'Kuthumpully', 'kuthumpully', 'Kuthumpully', 21.00, '', 13125.00, 0.00, '27869-AzUWS.jpg', '1', '2017-09-06 17:25:36', '2017-09-16 17:21:27', 0),
(5, 26, '26,1', 'Neel Kamal', 'Neel Kamal', 'neel-kamal', 'Neel Kamal', 12.00, '', 10500.00, 0.00, 'Neel_KamalvznP.jpg', '1', '2017-09-06 17:30:37', '2017-09-16 17:20:55', 0),
(6, 49, '49,22', 'Wedding Lahenga', 'Wedding Lahenga', 'wedding-lahenga', 'Wedding Lahenga', 4.00, '', 41460.00, 0.00, '123RCqQ.jpeg', '1', '2017-09-06 17:42:14', '2017-09-16 17:16:23', 0);

-- --------------------------------------------------------

--
-- Table structure for table `wl_fullset_media`
--

CREATE TABLE `wl_fullset_media` (
  `id` int(10) UNSIGNED NOT NULL,
  `fullset_id` int(10) UNSIGNED NOT NULL,
  `media_type` enum('photo','video','pdf') NOT NULL DEFAULT 'photo',
  `media` varchar(255) NOT NULL,
  `is_default` enum('Y','N') NOT NULL DEFAULT 'N',
  `sort_order` int(11) DEFAULT NULL,
  `media_date_added` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wl_fullset_media`
--

INSERT INTO `wl_fullset_media` (`id`, `fullset_id`, `media_type`, `media`, `is_default`, `sort_order`, `media_date_added`) VALUES
(1, 6, 'photo', 'wedding_lehengamWsV.jpeg', 'Y', NULL, '2017-09-16 17:16:23'),
(2, 5, 'photo', 'wedding_lehengamWsV.jpeg', 'Y', NULL, '2017-09-16 17:17:07'),
(3, 5, 'photo', 'neelkamalb7Jv.jpg', 'Y', NULL, '2017-09-16 17:17:37'),
(4, 5, 'photo', 'neelkamalb7Jv.jpg', 'Y', NULL, '2017-09-16 17:19:33'),
(5, 4, 'photo', 'kuthumpaliUWNz.jpg', 'Y', NULL, '2017-09-16 17:21:27'),
(6, 3, 'photo', 'ghunghat07FX.jpg', 'Y', NULL, '2017-09-16 17:21:53'),
(7, 2, 'photo', 'gaon_ki_gori71MV.jpg', 'Y', NULL, '2017-09-16 17:22:19'),
(8, 1, 'photo', 'princessvfrK.jpg', 'Y', NULL, '2017-09-16 17:22:45'),
(9, 2, 'photo', 'gaon_ki_gori71MV.jpg', 'Y', NULL, '2017-09-19 11:31:43'),
(10, 2, 'photo', '10akeO.jpg', 'N', NULL, '2017-09-19 11:31:43'),
(11, 2, 'photo', '9FWu4.jpg', 'N', NULL, '2017-09-19 11:31:43'),
(12, 2, 'photo', '8D3Hm.jpg', 'N', NULL, '2017-09-19 11:31:43'),
(13, 2, 'photo', '7Y3ef.jpg', 'N', NULL, '2017-09-19 11:31:43'),
(14, 2, 'photo', '6tstY.jpg', 'N', NULL, '2017-09-19 11:31:43'),
(15, 2, 'photo', '5XYgG.jpg', 'N', NULL, '2017-09-19 11:31:43'),
(16, 2, 'photo', '4wE1T.jpg', 'N', NULL, '2017-09-19 11:31:43'),
(17, 2, 'photo', '3IPrA.jpg', 'N', NULL, '2017-09-19 11:31:43'),
(18, 2, 'photo', '20Mlv.jpg', 'N', NULL, '2017-09-19 11:31:43'),
(19, 2, 'photo', '1O0Ii.jpg', 'N', NULL, '2017-09-19 11:31:43');

-- --------------------------------------------------------

--
-- Table structure for table `wl_ip_details`
--

CREATE TABLE `wl_ip_details` (
  `login_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `ip_address` varchar(20) NOT NULL,
  `recv_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wl_ip_details`
--

INSERT INTO `wl_ip_details` (`login_id`, `member_id`, `ip_address`, `recv_date`) VALUES
(1, 1, '::1', '2017-06-02 12:44:13'),
(2, 1, '::1', '2017-06-02 12:45:57'),
(3, 1, '::1', '2017-06-06 14:16:18'),
(4, 1, '::1', '2017-06-08 04:14:04'),
(5, 1, '::1', '2017-06-08 13:11:00'),
(6, 1, '::1', '2017-06-10 10:07:08'),
(7, 1, '::1', '2017-06-14 07:47:38'),
(8, 1, '::1', '2017-06-14 13:42:37'),
(9, 1, '::1', '2017-06-21 10:23:37'),
(10, 1, '::1', '2017-06-21 10:24:46'),
(11, 1, '::1', '2017-07-21 09:55:15'),
(12, 1, '::1', '2017-07-27 09:58:50'),
(13, 4, '49.35.13.184', '2017-09-23 09:27:46'),
(14, 8, '122.160.40.116', '2017-09-29 12:38:41'),
(15, 9, '122.176.173.95', '2017-10-03 11:21:57'),
(16, 15, '::1', '2017-10-12 10:34:05'),
(17, 15, '::1', '2017-10-12 11:05:01'),
(18, 15, '::1', '2017-10-12 11:05:24'),
(19, 15, '::1', '2017-10-12 11:06:14'),
(20, 15, '::1', '2017-10-12 11:06:39'),
(21, 15, '::1', '2017-10-12 11:09:02'),
(22, 15, '::1', '2017-10-12 11:18:09'),
(23, 15, '::1', '2017-10-12 11:22:26'),
(24, 15, '::1', '2017-10-12 11:48:57'),
(25, 15, '::1', '2017-10-12 11:49:33'),
(26, 15, '::1', '2017-10-12 11:50:12'),
(27, 15, '::1', '2017-10-12 12:22:28'),
(28, 15, '::1', '2017-10-12 12:25:54'),
(29, 15, '::1', '2017-10-13 07:53:15'),
(30, 15, '::1', '2017-10-13 10:59:25'),
(31, 15, '::1', '2017-10-13 11:18:13'),
(32, 15, '::1', '2017-10-13 11:54:14'),
(33, 15, '::1', '2017-10-13 11:59:26'),
(34, 15, '::1', '2017-10-13 12:16:42'),
(35, 15, '122.176.165.23', '2017-10-16 05:01:50'),
(36, 15, '122.176.165.23', '2017-10-16 09:31:26'),
(37, 15, '122.176.165.23', '2017-10-16 09:33:10'),
(38, 15, '122.176.165.23', '2017-10-16 09:56:30'),
(39, 15, '122.176.165.23', '2017-10-16 11:36:18'),
(40, 15, '122.176.165.23', '2017-10-16 12:05:17'),
(41, 15, '122.176.165.23', '2017-10-16 12:12:46'),
(42, 15, '122.176.165.23', '2017-10-16 12:13:02'),
(43, 15, '122.176.165.23', '2017-10-16 12:18:20'),
(44, 15, '122.176.165.23', '2017-10-16 14:00:09'),
(45, 18, '122.176.165.23', '2017-10-16 14:48:29'),
(46, 15, '122.176.163.82', '2017-10-17 04:08:43'),
(47, 15, '122.176.163.82', '2017-10-17 11:58:40'),
(48, 19, '197.249.5.239', '2017-10-17 13:59:02'),
(49, 21, '171.61.144.184', '2017-10-24 05:09:48'),
(50, 21, '171.61.144.184', '2017-10-24 05:10:23'),
(51, 21, '171.61.144.184', '2017-10-24 08:47:35'),
(52, 15, '122.176.175.131', '2017-11-04 08:52:01'),
(53, 19, '41.138.225.241', '2017-11-14 12:39:26'),
(54, 19, '41.138.225.241', '2017-11-14 12:42:49'),
(55, 23, '197.218.89.117', '2017-11-15 05:23:00'),
(56, 19, '41.138.236.80', '2017-12-01 07:34:28'),
(57, 15, '106.222.41.129', '2017-12-01 18:51:38'),
(58, 15, '122.176.171.172', '2017-12-02 04:45:39'),
(59, 19, '41.138.229.195', '2017-12-02 07:40:05'),
(60, 24, '197.218.82.141', '2017-12-02 10:33:13'),
(61, 28, '197.235.62.150', '2017-12-11 11:08:19'),
(62, 28, '197.235.60.86', '2017-12-11 12:29:30'),
(63, 19, '197.158.1.70', '2017-12-11 12:31:52'),
(64, 29, '197.235.190.9', '2017-12-11 12:34:26'),
(65, 28, '197.235.60.86', '2017-12-11 13:19:46'),
(66, 30, '197.158.1.70', '2017-12-11 13:35:29'),
(67, 26, '41.138.227.30', '2017-12-12 06:29:20'),
(68, 26, '41.138.227.30', '2017-12-12 06:53:16'),
(69, 15, '122.176.171.8', '2017-12-12 07:44:08'),
(70, 26, '197.249.55.91', '2017-12-12 07:44:22'),
(71, 29, '197.249.55.91', '2017-12-12 09:53:21'),
(72, 19, '197.249.30.251', '2017-12-13 10:29:29'),
(73, 19, '197.249.30.251', '2017-12-13 12:41:19'),
(74, 19, '197.249.30.251', '2017-12-13 14:33:06'),
(75, 19, '197.249.30.251', '2017-12-13 14:34:19'),
(76, 19, '197.249.30.251', '2017-12-15 09:26:06'),
(77, 28, '197.235.108.41', '2017-12-18 10:55:06'),
(78, 35, '197.249.36.145', '2017-12-20 13:07:45'),
(79, 35, '197.249.36.145', '2017-12-20 13:10:29'),
(80, 20, '122.176.163.169', '2017-12-21 05:53:05'),
(81, 20, '122.176.163.169', '2017-12-21 06:08:39'),
(82, 20, '122.176.163.169', '2017-12-21 06:31:22'),
(83, 34, '197.249.30.251', '2017-12-21 13:33:20'),
(84, 35, '197.249.36.145', '2017-12-21 14:30:39'),
(85, 20, '122.176.164.37', '2017-12-22 06:49:20'),
(86, 34, '197.249.30.251', '2017-12-22 13:08:54'),
(87, 34, '197.249.30.251', '2017-12-22 14:40:59'),
(88, 34, '197.235.69.109', '2017-12-22 18:36:05'),
(89, 34, '197.249.30.251', '2017-12-26 07:05:13'),
(90, 39, '::1', '2017-12-29 11:05:56'),
(91, 39, '::1', '2017-12-29 11:07:48'),
(92, 39, '::1', '2017-12-29 12:15:11'),
(93, 39, '::1', '2018-01-03 04:12:45');

-- --------------------------------------------------------

--
-- Table structure for table `wl_meta_tags`
--

CREATE TABLE `wl_meta_tags` (
  `meta_id` int(11) NOT NULL,
  `is_fixed` enum('Y','N','L') NOT NULL DEFAULT 'N',
  `entity_type` varchar(80) DEFAULT NULL COMMENT 'name of controllers  ',
  `entity_id` int(11) NOT NULL DEFAULT '0',
  `page_url` varchar(200) NOT NULL,
  `meta_title` varchar(1000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `meta_description` varchar(1500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `meta_keyword` varchar(1500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `page_heading` varchar(250) NOT NULL,
  `page_content` text NOT NULL,
  `category_links` varchar(200) NOT NULL,
  `keyword_1` varchar(100) NOT NULL,
  `keyword_2` varchar(100) NOT NULL,
  `keyword_3` varchar(100) NOT NULL,
  `parent_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wl_meta_tags`
--

INSERT INTO `wl_meta_tags` (`meta_id`, `is_fixed`, `entity_type`, `entity_id`, `page_url`, `meta_title`, `meta_description`, `meta_keyword`, `page_heading`, `page_content`, `category_links`, `keyword_1`, `keyword_2`, `keyword_3`, `parent_id`) VALUES
(1, 'N', 'home/index', 0, 'home', 'Industrial Machinery Manufacturer,Supplier,Exporter Delhi For Food, Paper, Art & Handicraft industry', 'industrial machinery manufacturers in delhi, industrial machinery supplier in delhi, industrial machinery exporter in delhi, industrial machinery manufacturing companies delhi', 'Blue Impex is a leading Manufacturer, Supplier and Exporter of Industrial Machinery in Delhi, India. Call +91 9891268568, Industrial Machinery for Food, Paper, Art & Handicraft industry.', '', '', '', '', '', '', 0),
(3, 'Y', 'users', 0, 'login', 'Login', 'Login', 'Login', '', '', '', '', '', '', 0),
(4, 'Y', 'cart/add_to_cart', 0, 'add_to_cart', 'add_to_cart', 'add_to_cart', 'add_to_cart', '', '', '', '', '', '', 0),
(5, 'Y', 'users/register', 0, 'register', 'register', 'register', 'register', '', '', '', '', '', '', 0),
(6, 'Y', 'users/login', 0, 'login', 'login', 'login', 'login', '', '', '', '', '', '', 0),
(7, 'Y', 'members/myaccount', 0, 'myaccount', 'myaccount', 'myaccount', 'myaccount', '', '', '', '', '', '', 0),
(8, 'Y', 'members/edit_account', 0, 'edit_account', 'edit_account', 'edit_account', 'edit_account', '', '', '', '', '', '', 0),
(9, 'Y', 'members/myorders', 0, 'myorders', 'myorders', 'myorders', 'myorders', '', '', '', '', '', '', 0),
(10, 'Y', 'members/wishlist', 0, 'wishlist', 'wishlist', 'wishlist', 'wishlist', '', '', '', '', '', '', 0),
(11, 'Y', 'users/logout', 0, 'logout', 'logout', 'logout', 'logout', '', '', '', '', '', '', 0),
(12, 'Y', 'cart/checkout', 0, 'checkout', 'checkout', 'checkout', 'checkout', '', '', '', '', '', '', 0),
(13, 'N', 'pages/index', 0, 'about-us', 'Top Industrial Machinery Manufacturing Companies Delhi | Blue Impex', 'top industrial machinery manufacturing companies Delhi, best industrial machinery manufacturing companies Delhi', 'Blue Impex is known as Top Industrial Machinery Manufacturing Companies Delhi, India. We offer top quality Machines for Food, Paper, Art & Handicraft industry at most competitive rates.', '', '', '', '', '', '', 0),
(14, 'Y', 'pages/index', 0, 'terms', 'terms', 'terms', 'terms', '', '', '', '', '', '', 0),
(15, 'Y', 'pages/index', 0, 'privacy_policy', 'privacy', 'privacy', 'privacy', '', '', '', '', '', '', 0),
(18, 'Y', 'pages/contactus', 0, 'contactus', 'contactus', 'contactus', 'contactus', '', '', '', '', '', '', 0),
(19, 'Y', 'pages/index', 0, 'shipping_policy', 'thanks', 'thanks', 'thanks', '', '', '', '', '', '', 0),
(20, 'Y', 'members/myorders', 0, 'myorders', 'myorders', 'myorders', 'myorders', '', '', '', '', '', '', 0),
(21, 'Y', 'members/address', 0, 'address', 'address', 'address', 'address', '', '', '', '', '', '', 0),
(22, 'Y', 'pages/index', 0, 'delivery_returns', 'How to Download', 'How to Download', 'How to Download', '', '', '', '', '', '', 0),
(23, 'Y', 'category', 0, 'category', 'Category', 'Category', 'Category', '', '', '', '', '', '', 0),
(24, 'Y', 'pages/bulk_orders', 0, 'bulk_orders', 'Bulk Orders', 'Bulk Orders', 'Bulk Orders', '', '', '', '', '', '', 0),
(478, 'Y', 'pages/sell_with_us', 0, 'sell-with-us', 'Sell With Us', 'Sell With Us', 'Sell With Us', '', '', '', '', '', '', 0),
(479, 'Y', 'pages/sell_with_us', 0, 'sell-with-us', 'Sell With Us', 'Sell With Us', 'Sell With Us', '', '', '', '', '', '', 0),
(1280, 'Y', 'pages/marketarea', 0, 'market-area', 'Market Area', 'Market Area', 'Market Area', '', '', '', '', '', '', 0),
(1370, 'N', 'themes/index', 4, 'test-theme', 'test theme', 'test theme', 'theme, test', '', '', '', '', '', '', 0),
(1375, 'N', 'category/index', 1, 'products', 'Products', 'Products', 'Products', '', '', '', '', '', '', 0),
(1376, 'N', 'category/index', 2, 'pen-making-machine', 'Pen Making Machine', 'Pen Making Machine', 'Machine, Making', '', '', '', '', '', '', 0),
(1379, 'N', 'category/index', 5, 'noodles-making-machine', 'Noodles Making Machine', 'Noodles Making Machine', 'Machine, Making, Noodles', '', '', '', '', '', '', 0),
(1383, 'N', 'category/index', 9, 'paper-pencil-making-machine', 'Paper Pencil Making Machine', 'Paper Pencil Making Machine', 'Machine, Making, Pencil, Paper', '', '', '', '', '', '', 0),
(1384, 'N', 'category/index', 10, 'paper-pencil-making-machine/newspaper-pencil-making-machine', 'Newspaper Pencil Making Machine', 'Newspaper Pencil Making Machine', 'Machine, Making, Pencil, Newspaper', '', '', '', '', '', '', 0),
(1385, 'N', 'category/index', 11, 'paper-pencil-making-machine/waste-paper-pencil-making-machine', 'Waste Paper pencil Making Machine', 'Waste Paper pencil Making Machine', 'Machine, Making, pencil, Paper, Waste', '', '', '', '', '', '', 0),
(1386, 'N', 'category/index', 12, 'paper-pencil-making-machine/automatic-pencil-making-machine', 'Automatic pencil Making Machine', 'Automatic pencil Making Machine', 'Machine, Making, pencil, Automatic', '', '', '', '', '', '', 0),
(1387, 'N', 'category/index', 13, 'pasta/-macaroni-making-machine', 'Pasta/ macaroni Making Machine', 'Pasta/ macaroni Making Machine', 'Machine, Making, macaroni, Pasta', '', '', '', '', '', '', 0),
(1388, 'N', 'category/index', 14, 'pasta/-macaroni-making-machine/automatic-pasta/-macaroni-making-machine', 'Automatic Pasta/ macaroni Making Machine', 'Automatic Pasta/ macaroni Making Machine', 'Machine, Making, macaroni, Pasta, Automatic', '', '', '', '', '', '', 0),
(1389, 'N', 'category/index', 15, 'non-woven-bag-making-machine', 'Non Woven Bag Making Machine', 'Non Woven Bag Making Machine', 'Machine, Making, Woven', '', '', '', '', '', '', 0),
(1390, 'N', 'category/index', 16, 'non-woven-bag-making-machine/automatic-non-woven-bag-making-machine', 'Automatic Non woven Bag Making Machine', 'Automatic Non woven Bag Making Machine', 'Machine, Making, woven, Automatic', '', '', '', '', '', '', 0),
(1391, 'N', 'category/index', 17, 'non-woven-bag-making-machine/fully-automatic-non-woven-box-bag-making-machine', 'Fully Automatic Non woven Box Bag Making Machine', 'Fully Automatic Non woven Box Bag Making Machine', 'Machine, Making, woven, Automatic, Fully', '', '', '', '', '', '', 0),
(1392, 'N', 'category/index', 18, 'non-woven-bag-making-machine/ultrasonic-sealing-machine', 'Ultrasonic sealing machine', 'Ultrasonic sealing machine', 'machine, sealing, Ultrasonic', '', '', '', '', '', '', 0),
(1393, 'Y', 'pages/index', 0, 'terms-conditions', 'terms', 'terms', 'terms', '', '', '', '', '', '', 0),
(1394, 'Y', 'pages/index', 0, 'privacy-policy', 'privacy', 'privacy', 'privacy', '', '', '', '', '', '', 0),
(1395, 'Y', 'pages/contactus', 0, 'contact-us', 'Contact Us', 'Contact Us', 'Contact Us', '', '', '', '', '', '', 0),
(1396, 'Y', 'pages/index', 0, 'shipping_policy', 'thanks', 'thanks', 'thanks', '', '', '', '', '', '', 0),
(1397, 'Y', 'pages/index', 0, 'delivery_returns', 'How to Download', 'How to Download', 'How to Download', '', '', '', '', '', '', 0),
(1398, 'Y', 'pages/bulk_orders', 0, 'bulk_orders', 'Bulk Orders', 'Bulk Orders', 'Bulk Orders', '', '', '', '', '', '', 0),
(1399, 'Y', 'pages/index', 0, 'return-refund-and-cancellation-policy', 'return-refund-and-cancellation-policy', 'return-refund-and-cancellation-policy', 'return-refund-and-cancellation-policy', '', '', '', '', '', '', 0),
(1400, 'Y', 'pages/aboutus', 0, 'about-us', 'About Us', 'About Us\r\n', 'About Us\r\n', '', '', '', '', '', '', 0),
(1401, 'Y', 'pages/index', 0, 'quality-assurance', 'Quality Assurance -  Glorious IT ', 'Quality Assurance -  Glorious IT ', 'Quality Assurance -  Glorious IT ', '', '', '', '', '', '', 0),
(1402, 'Y', 'pages/index', 0, 'sitemap', 'Sitemap', 'Sitemap', 'Sitemap', '', '', '', '', '', '', 0),
(1403, 'Y', 'pages/index', 0, 'home', 'Scientific & Technological Equipment Corporation', 'Scientific & Technological Equipment Corporation', 'Scientific & Technological Equipment Corporation', '', '', '', '', '', '', 0),
(1404, 'Y', 'pages/marketarea', 0, 'market-area', 'Glorious IT | Buy Used Laptops and Computers Online in India', 'Looking for Used Laptops or Computers? Buy Used Laptops and Computers Online from Glorious IT at low price from Delhi. Call us at (+91) 9891048026 / 9211752002 to get best deals on our quality products.', 'Buy Used Laptops Online, Used Computers Online in Delhi, Used Computers Online in India, Buy Used Computers, Buy Used Computers Store in India, Buy Used Computers Online in India, Used Computers Online Store in Delhi India', '', '', '', '', '', '', 0),
(1405, 'Y', 'pages/achievements', 0, 'our-achievements', 'Our Achievements', 'Our Achievements\r\n', 'About Us\r\n', '', '', '', '', '', '', 0),
(1406, 'Y', 'pages/sitemap', 0, 'sitemap', 'Sitemap', 'Sitemap\r\n', 'Sitemap\r\n', '', '', '', '', '', '', 0),
(1407, 'L', NULL, 0, 'assam', '', '', NULL, '', '', '', '', '', '', 0),
(1408, 'L', 'home/index', 1, 'india', 'India', 'India', 'India', '0', '0', '0', '', '', '', 0),
(1409, 'L', 'home/index', 1, 'gujrat', 'Gujrat', 'Gujrat', 'Gujrat', 'Gujrat', '', '0', '', '', '', 0),
(1410, 'N', 'blog/index', 0, 'blog', 'Blog Industrial Machinery | Blue Impex', '', '', '', '', '', '', '', '', 0),
(1411, 'N', 'pages/contactus', 0, 'contact-us', 'Contact Blue Impex | Industrial Machinery Manufacturing Manufacturer,Supplier,Exporter', 'Contact Blue Impex - Industrial Machinery Manufacturing Manufacturer,Supplier,Exporter at O-57, Near Metro Pillar No:230, West Patel Nagar, New Delhi, Phone- 011-45548568, 09891268568, 09871695957', '', '', '', '', '', '', '', 0),
(1412, 'L', 'home/index', 2, 'newdelhi', '', '', '', '', '', '3,2,1,4,2,1,6,5,1,7,5,1,8,5,1,10,9,1,11,9,1,12,9,1,14,13,1,16,15,1,17,15,1,18,15,1', '', '', '', 0),
(1413, 'L', 'home/index', 3, 'mumbai', '', '', '', 'Mumbai', '', '3,2,1,4,2,1,6,5,1,7,5,1,8,5,1,10,9,1,11,9,1,12,9,1,14,13,1,16,15,1,17,15,1,18,15,1', '', '', '', 0),
(1414, 'L', 'home/index', 4, 'kolkata', '', '', '', 'Kolkata', '', '3,2,1,4,2,1,6,5,1,7,5,1,8,5,1,10,9,1,11,9,1,12,9,1,14,13,1,16,15,1,17,15,1,18,15,1', '', '', '', 0),
(1415, 'L', 'home/index', 5, 'chennai', '', '', '', '', '', '3,2,1,4,2,1,6,5,1,7,5,1,8,5,1,10,9,1,11,9,1,12,9,1,14,13,1,16,15,1,17,15,1,18,15,1', '', '', '', 0),
(1416, 'L', 'home/index', 6, 'hyderabad', '', '', '', '', '', '3,2,1,4,2,1,6,5,1,7,5,1,8,5,1,10,9,1,11,9,1,12,9,1,14,13,1,16,15,1,17,15,1,18,15,1', '', '', '', 0),
(1418, 'L', 'home/index', 8, 'bhubaneswar', '', '', '', '', '', '3,2,1,4,2,1,6,5,1,7,5,1,8,5,1,10,9,1,11,9,1,12,9,1,14,13,1,16,15,1,17,15,1,18,15,1', '', '', '', 0),
(1419, 'L', 'home/index', 9, 'vishakapatnam', '', '', '', '', '', '3,2,1,4,2,1,6,5,1,7,5,1,8,5,1,10,9,1,11,9,1,12,9,1,14,13,1,16,15,1,17,15,1,18,15,1', '', '', '', 0),
(1420, 'L', 'home/index', 10, 'patna', '', '', '', '', '', '3,2,1,4,2,1,6,5,1,7,5,1,8,5,1,10,9,1,11,9,1,12,9,1,14,13,1,16,15,1,17,15,1,18,15,1', '', '', '', 0),
(1421, 'L', 'home/index', 11, 'lucknow', '', '', '', '', '', '3,2,1,4,2,1,6,5,1,7,5,1,8,5,1,10,9,1,11,9,1,12,9,1,14,13,1,16,15,1,17,15,1,18,15,1', '', '', '', 0),
(1422, 'L', 'home/index', 12, 'ranchi', '', '', '', '', '', '3,2,1,4,2,1,6,5,1,7,5,1,8,5,1,10,9,1,11,9,1,12,9,1,14,13,1,16,15,1,17,15,1,18,15,1', '', '', '', 0),
(1423, 'L', 'home/index', 13, 'raipur', '', '', '', '', '', '3,2,1,4,2,1,6,5,1,7,5,1,8,5,1,10,9,1,11,9,1,12,9,1,14,13,1,16,15,1,17,15,1,18,15,1', '', '', '', 0),
(1424, 'L', 'home/index', 14, 'uttarpradesh', '', '', '', '', '', '3,2,1,4,2,1,6,5,1,7,5,1,8,5,1,10,9,1,11,9,1,12,9,1,14,13,1,16,15,1,17,15,1,18,15,1', '', '', '', 0),
(1425, 'L', 'home/index', 1, 'allahabad', '', '', '', '', '', '3,2,1,4,2,1,6,5,1,7,5,1,8,5,1,10,9,1,11,9,1,12,9,1,14,13,1,16,15,1,17,15,1,18,15,1', '', '', '', 0),
(1426, 'L', 'home/index', 15, 'madhyapradesh', '', '', '', 'Madhya Pradesh', '', '3,2,1,4,2,1,6,5,1,7,5,1,8,5,1,10,9,1,11,9,1,12,9,1,14,13,1,16,15,1,17,15,1,18,15,1', '', '', '', 0),
(1427, 'L', 'home/index', 2, 'indore', '', '', '', 'Indore', '', '3,2,1,4,2,1,6,5,1,7,5,1,8,5,1,10,9,1,11,9,1,12,9,1,14,13,1,16,15,1,17,15,1,18,15,1', '', '', '', 0),
(1428, 'L', 'home/index', 3, 'jaipur', '', '', '', 'Jaipur', '', '3,2,1,4,2,1,6,5,1,7,5,1,8,5,1,10,9,1,11,9,1,12,9,1,14,13,1,16,15,1,17,15,1,18,15,1', '', '', '', 0),
(1429, 'L', 'home/index', 4, 'nagpur', '', '', '', 'Nagpur', '', '3,2,1,4,2,1,6,5,1,7,5,1,8,5,1,10,9,1,11,9,1,12,9,1,14,13,1,16,15,1,17,15,1,18,15,1', '', '', '', 0),
(1430, 'L', 'home/index', 5, 'dhanbad', '', '', '', 'Dhanbad', '', '3,2,1,4,2,1,6,5,1,7,5,1,8,5,1,10,9,1,11,9,1,12,9,1,14,13,1,16,15,1,17,15,1,18,15,1', '', '', '', 0),
(1431, 'L', 'home/index', 16, 'ranchi', '', '', '', 'Ranchi', '', '3,2,1,4,2,1,6,5,1,7,5,1,8,5,1,10,9,1,11,9,1,12,9,1,14,13,1,16,15,1,17,15,1,18,15,1', '', '', '', 0),
(1432, 'L', 'home/index', 6, 'raipur', '', '', '', 'Raipur', '', '3,2,1,4,2,1,6,5,1,7,5,1,8,5,1,10,9,1,11,9,1,12,9,1,14,13,1,16,15,1,17,15,1,18,15,1', '', '', '', 0),
(1433, 'L', 'home/index', 7, 'vijayawada', '', '', '', 'Vijayawada', '', '3,2,1,4,2,1,6,5,1,7,5,1,8,5,1,10,9,1,11,9,1,12,9,1,14,13,1,16,15,1,17,15,1,18,15,1', '', '', '', 0),
(1434, 'L', 'home/index', 8, 'rajahmundry', '', '', '', 'Rajahmundry', '', '3,2,1,4,2,1,6,5,1,7,5,1,8,5,1,10,9,1,11,9,1,12,9,1,14,13,1,16,15,1,17,15,1,18,15,1', '', '', '', 0),
(1435, 'N', 'products/detail', 2, 'dzxcxcxc', 'dzxcxcxc', '', '', '', '', '', '', '', '', 0),
(1436, 'N', 'products/detail', 3, 'radha-krishna-bamboo-wood-notebook', 'Radha Krishna Bamboo Wood Notebook', 'dsdsdsds', 'dsdsdsds', '', '', '', '', '', '', 0),
(1437, 'N', 'products/detail', 4, 'pen-making-machine-1', 'Pen Making Machine 1', 'Product Details: Minimum Order Quantity 1 Unit Brand BI Production Capacity 10000 Power Consumption 320 V Material of Construction Stainless steel Control Type PLC', 'Construction, Material, Consumption, Stainless, steel, Type, Control, Power, Capacity, Order, Minimum, Details, Quantity, Unit, Production, Brand, Product', '', '', '', '', '', '', 0),
(1438, 'N', 'products/detail', 5, 'manual-pen-making-machine', 'Manual Pen Making Machine', 'Minimum Order Quantity 1 Piece Production Capacity 3000 - 4000 Pcs/ Hour Power Consumption Manual Machine Material Steel Surface Treatment Painted With Backed support from experts, we are occupied in providing a flawless', 'Manual, Machine, flawless, series, occupied, support, experts, providing, Making, Longer, life, maintenance, quality, Features, valuable, customers, Backed, Painted, Capacity, Hour', '', '', '', '', '', '', 0),
(1439, 'N', 'products/detail', 6, 'automatic-pen-making-machine', 'Automatic Pen Making Machine', 'Minimum Order Quantity 1 Piece Driven Type Electric Power Source 2 Phase /220 V Machine Material Steel Machine Type Automatic', 'Machine, Type, Phase, Material, Automatic, Steel, Source, Electric, Quantity, Order, Piece, Driven, Minimum, Power', '', '', '', '', '', '', 0),
(1440, 'N', 'products/detail', 7, 'automatic-noodles-making-machine', 'Automatic Noodles Making Machine', 'Minimum Order Quantity 1 Set Automatic Grade Automatic Machine Power (kw) 0-40 Machine Type 7-Stage Condition New Phase single Dimension (Millimeter) 13.5 Warranty 2years Weight (kg) 790 Model Number BIN 6-252 Number Of', 'Number, Automatic, Machine, years, Warranty, Millimeter, Weight, Model, Roller, Dimension, Output, Motor, Phase, Grade, Quantity, Order, Power, Type, Minimum, Condition', '', '', '', '', '', '', 0),
(1441, 'N', 'products/detail', 8, 'am-noodles-making-machine', 'AM Noodles Making Machine', 'Output 150-200 Machine Type 2- Stage Machine Power (kw) 0-40 Condition New Voltage (V) 220 Motor Power (HP) 3kw Weight (kg) 550 Capacity (kg/Hr) 180-200kg/hr Roller Shatter Length (inch) 13.5 Model Number BI-5-212 Number', 'Power, Number, Automatic, Roller, Machine, Model, inch, years, Grade, Length, Warranty, Capacity, Condition, Stage, Type, Voltage, Motor, Output, Weight, Shatter', '', '', '', '', '', '', 0),
(1442, 'N', 'products/detail', 9, 'sam-noodles-making-machine', 'SAM Noodles Making Machine', 'Output 60 Kg/hr Machine Power (kw) 0-40 Machine Type 2- Stage Condition New Automatic Grade Semi-Automatic Cutter Size 11 inch No. Of Bearing 4 Machine Weight 185 Kg', 'Machine, Size, Cutter, inch, Bearing, Weight, Semi-Automatic, Automatic, Type, Power, Stage, Condition, Output, Grade', '', '', '', '', '', '', 0),
(1443, 'N', 'products/detail', 10, 'ultra-sonic-sealing-machine', 'Ultra Sonic Sealing Machine', 'Minimum Order Quantity 1 Unit Brand BI-515 Capacity 0-15mtr/min Ultrasonic Sewing Machine/ Lace Cutting\nOutput: 1800w\nVoltage: 220v\nRoller Size: 0-60mmWorking Speed: 0-15mtr/min\nNet Weight:90kg   Additional Information:', 'Additional, Information, Weight, Speed, mmWorking, Delivery, Time, Cover, Packaing, Details, Packaging, days, Size, Roller, Brand, Capacity, Unit, Quantity, Order, Ultrasonic', '', '', '', '', '', '', 0),
(1444, 'N', 'products/detail', 11, 'automatic-non-woven-bag-making-machine', 'Automatic Non Woven Bag Making Machine', 'Minimum Order Quantity 1 Unit Type Of Bag Shopping Bag Bag Material Other Capacity 100-120 (Pieces per hour) Brand Blu Voltage 15Kw Condition New Power 220v-380v Max Bag Length 200-600mm Max Bag Width 100-800mm Bag Size', 'Type, Size, Width, Length, Power, Machine, Automatic, woven, Fabric, Model, Condition, Fully, Brand, Shopping, Unit, Quantity, Order, Material, Other, Minimum', '', '', '', '', '', '', 0),
(1445, 'N', 'pages/videos', 0, 'videos', '', '', NULL, '', '', '', '', '', '', 0),
(1446, 'N', 'products/detail', 12, 'semi-automatic-non-woven-bag-making-machine', 'Semi Automatic Non-woven Bag Making Machine', 'Minimum Order Quantity 1 1 Set Usage/Application New Type Of Bag Shopping Bag Max Bag Length 300-400 mm, 100-200 mm, 1-100 mm, 400-500 mm, 200-300 mm Capacity(Pieces per hour) 80-100 Bag Size (inch) 100-200mm, 200-300mm,', 'Impex, Brand, Condition, inch, Model, BINW-, Weight, Machine, Voltage, Size, hour, Application, Usage, Quantity, Order, Type, Shopping, Pieces, Capacity, Length', '', '', '', '', '', '', 0),
(1447, 'N', 'products/detail', 13, 'automatic-paper-pencil-making-machine', 'Automatic Paper Pencil Making Machine', 'Product Details: Minimum Order Quantity 1 Set Power(W) 14.4 Driven Type Electric Cylinder Head Volume 95-130cm3 Machine Weight 550 Kg Backed by a team of knowledgeable professionals, we are an identified firm in the', 'Machine, identified, firm, professionals, knowledgeable, team, market, providing, PaperPencil, Making, Automatic, range, extensive, Backed, Weight, Quantity, Power, Order, Minimum, Details', '', '', '', '', '', '', 0),
(1448, 'N', 'products/detail', 14, 'pasta-making-machine', 'Pasta Making Machine', 'Minimum Order Quantity 1 Unit Machine Type Automatic Capacity 150 kg/h Power Consumption 10KW Weight 1500 kg Machine Material Stainless Steel Power 30 kW Voltage 220 V Driven Type Electric We offer to our honored patrons', 'Machine, Power, patrons, Type, Additional, Information, Code, Item, rates, avail, product, affordable, Mode, Transfer, Packaging, Details, Wooden, Packing, days, Time', '', '', '', '', '', '', 0),
(1449, 'L', 'home/index', 17, 'indore', '', '', '', '', '', '0', '', '', '', 0),
(1450, 'L', 'home/index', 18, 'allahabad', '', '', '', '', '', '0', '', '', '', 0),
(1451, 'L', 'home/index', 19, 'jaipur', '', '', '', '', '', '0', '', '', '', 0),
(1452, 'L', 'home/index', 20, 'jammu', '', '', '', '', '', '0', '', '', '', 0),
(1453, 'L', 'home/index', 21, 'pune', '', '', '', '', '', '0', '', '', '', 0),
(1454, 'L', 'home/index', 22, 'nagpur', '', '', '', '', '', '0', '', '', '', 0),
(1455, 'L', 'home/index', 23, 'dhanbad', '', '', '', '', '', '0', '', '', '', 0),
(1456, 'L', 'home/index', 24, 'vijayawada', '', '', '', '', '', '0', '', '', '', 0),
(1457, 'L', 'home/index', 25, 'rajahmundry', '', '', '', '', '', '0', '', '', '', 0),
(1458, 'N', 'products/detail', 15, 'automatic-noodles-making-machines', 'Automatic Noodles Making Machines', 'Blu Impex is one of the top Automatic Noodles Making Machine manufacturers. Companies in the food product industry that make noodles and sell them in the market would find them handy. The top companies that mass produce', 'noodles, Machine, Automatic, Number, product, Power, Type, -Stage, Phase, Grade, Order, Quantity, Dimension, Millimeter, single, Weight, Output, Only, Condition, Motor', '', '', '', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `wl_meta_tags_old`
--

CREATE TABLE `wl_meta_tags_old` (
  `meta_id` int(11) NOT NULL,
  `is_fixed` enum('Y','N','L') NOT NULL DEFAULT 'N',
  `entity_type` varchar(80) DEFAULT NULL COMMENT 'name of controllers  ',
  `entity_id` int(11) NOT NULL DEFAULT '0',
  `page_url` varchar(200) NOT NULL,
  `meta_title` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `meta_description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `meta_keyword` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `keyword_1` varchar(100) DEFAULT NULL,
  `keyword_2` varchar(100) DEFAULT NULL,
  `keyword_3` varchar(100) DEFAULT NULL,
  `parent_id` bigint(20) NOT NULL,
  `page_heading` varchar(250) NOT NULL,
  `page_content` text,
  `category_links` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wl_meta_tags_old`
--

INSERT INTO `wl_meta_tags_old` (`meta_id`, `is_fixed`, `entity_type`, `entity_id`, `page_url`, `meta_title`, `meta_description`, `meta_keyword`, `keyword_1`, `keyword_2`, `keyword_3`, `parent_id`, `page_heading`, `page_content`, `category_links`) VALUES
(2, 'Y', 'products', 0, 'products', 'products', 'products', 'products', NULL, NULL, NULL, 0, '', '', ''),
(3, 'Y', 'users', 0, 'login', 'Login', 'Login', 'Login', NULL, NULL, NULL, 0, '', '', ''),
(4, 'Y', 'cart/add_to_cart', 0, 'add_to_cart', 'add_to_cart', 'add_to_cart', 'add_to_cart', NULL, NULL, NULL, 0, '', '', ''),
(5, 'Y', 'users/register', 0, 'register', 'register', 'register', 'register', NULL, NULL, NULL, 0, '', '', ''),
(6, 'Y', 'users/login', 0, 'login', 'login', 'login', 'login', NULL, NULL, NULL, 0, '', '', ''),
(7, 'Y', 'members/myaccount', 0, 'myaccount', 'myaccount', 'myaccount', 'myaccount', NULL, NULL, NULL, 0, '', '', ''),
(8, 'Y', 'members/edit_account', 0, 'edit_account', 'edit_account', 'edit_account', 'edit_account', NULL, NULL, NULL, 0, '', '', ''),
(9, 'Y', 'members/myorders', 0, 'myorders', 'myorders', 'myorders', 'myorders', NULL, NULL, NULL, 0, '', '', ''),
(10, 'Y', 'members/wishlist', 0, 'wishlist', 'wishlist', 'wishlist', 'wishlist', NULL, NULL, NULL, 0, '', '', ''),
(11, 'Y', 'users/logout', 0, 'logout', 'logout', 'logout', 'logout', NULL, NULL, NULL, 0, '', '', ''),
(12, 'Y', 'cart/checkout', 0, 'checkout', 'checkout', 'checkout', 'checkout', NULL, NULL, NULL, 0, '', '', ''),
(14, 'Y', 'pages/index', 0, 'terms-conditions', 'terms', 'terms', 'terms', NULL, NULL, NULL, 0, '', '', ''),
(15, 'Y', 'pages/index', 0, 'privacy-policy', 'privacy', 'privacy', 'privacy', NULL, NULL, NULL, 0, '', '', ''),
(18, 'Y', 'pages/contactus', 0, 'contact-us', 'Contact Us', 'Contact Us', 'Contact Us', NULL, NULL, NULL, 0, '', '', ''),
(19, 'Y', 'pages/index', 0, 'shipping_policy', 'thanks', 'thanks', 'thanks', NULL, NULL, NULL, 0, '', '', ''),
(21, 'Y', 'members/address', 0, 'address', 'address', 'address', 'address', NULL, NULL, NULL, 0, '', '', ''),
(160, 'Y', 'pages/index', 0, 'delivery_returns', 'How to Download', 'How to Download', 'How to Download', NULL, NULL, NULL, 0, '', '', ''),
(325, 'Y', 'pages/bulk_orders', 0, 'bulk_orders', 'Bulk Orders', 'Bulk Orders', 'Bulk Orders', NULL, NULL, NULL, 0, '', '', ''),
(357, 'Y', 'products/new_arrival', 0, 'new-arrival', 'new arrival products', 'new arrival products', 'new arrival products', NULL, NULL, NULL, 0, '', '', ''),
(358, 'Y', 'products/featured', 0, 'featured', 'featured products', 'featured products', 'featured products', NULL, NULL, NULL, 0, '', '', ''),
(400, 'Y', 'products', 0, 'search', 'Search Result', 'Search Result', 'Search Result', NULL, NULL, NULL, 0, '', '', ''),
(512, 'Y', 'fullset', 0, 'fullset', 'Catalog', 'Catalog', 'Catalog', NULL, NULL, NULL, 0, '', '', ''),
(615, 'Y', 'pages/index', 0, 'return-refund-and-cancellation-policy', 'return-refund-and-cancellation-policy', 'return-refund-and-cancellation-policy', 'return-refund-and-cancellation-policy', NULL, NULL, NULL, 0, '', '', ''),
(2366, 'Y', 'pages/aboutus', 0, 'about-us', 'About Us', 'About Us\r\n', 'About Us\r\n', NULL, NULL, NULL, 0, '', '', ''),
(2414, 'Y', 'pages/index', 0, 'quality-assurance', 'Quality Assurance -  Glorious IT ', 'Quality Assurance -  Glorious IT ', 'Quality Assurance -  Glorious IT ', NULL, NULL, NULL, 0, '', '', ''),
(2415, 'Y', 'pages/index', 0, 'sitemap', 'Sitemap', 'Sitemap', 'Sitemap', NULL, NULL, NULL, 0, '', '', ''),
(2417, 'Y', 'pages/index', 0, 'home', 'Scientific & Technological Equipment Corporation', 'Scientific & Technological Equipment Corporation', 'Scientific & Technological Equipment Corporation', NULL, NULL, NULL, 0, '', '', ''),
(2425, 'N', 'home', 0, 'home', 'Shri Ank Enterprise Private Limited', 'Shri Ank Enterprise Private Limited', 'Shri Ank Enterprise Private Limited', NULL, NULL, NULL, 0, '', '', ''),
(2627, 'Y', 'pages/marketarea', 0, 'market-area', 'Glorious IT | Buy Used Laptops and Computers Online in India', 'Looking for Used Laptops or Computers? Buy Used Laptops and Computers Online from Glorious IT at low price from Delhi. Call us at (+91) 9891048026 / 9211752002 to get best deals on our quality products.', 'Buy Used Laptops Online, Used Computers Online in Delhi, Used Computers Online in India, Buy Used Computers, Buy Used Computers Store in India, Buy Used Computers Online in India, Used Computers Online Store in Delhi India', NULL, NULL, NULL, 0, '', '', ''),
(3529, 'Y', 'pages/achievements', 0, 'our-achievements', 'Our Achievements', 'Our Achievements\r\n', 'About Us\r\n', NULL, NULL, NULL, 0, '', '', ''),
(3530, 'Y', 'pages/sitemap', 0, 'sitemap', 'Sitemap', 'Sitemap\r\n', 'Sitemap\r\n', NULL, NULL, NULL, 0, '', '', ''),
(3531, 'N', 'blog/details', 3, 'cement-autoclave-testing-equipment-uses-and-features', 'Cement Autoclave Testing Equipment Uses and Features', 'Building and construction world largely and mainly depends on the cement and concrete to build robust structures. To perform accelerated tests, they use cement/concrete testing equipment like cement autoclave on the', 'cement, concrete, autoclave, accelerated, tests, mixture, equipment, determine, performing, Cement, strength, quality, testing, ideal, perform, largely, world, construction, mainly, depends', NULL, NULL, NULL, 0, '', '', ''),
(3532, 'N', 'blog/details', 3, 'cements-autoclave-testing-equipment-uses-and-features', 'Cement Autoclave Testing Equipment Uses and Features', 'Building and construction world largely and mainly depends on the cement and concrete to build robust structures. To perform accelerated tests, they use cement/concrete testing equipment like cement autoclave on the', 'cement, concrete, autoclave, accelerated, tests, mixture, equipment, determine, performing, Cement, strength, quality, testing, ideal, perform, largely, world, construction, mainly, depends', NULL, NULL, NULL, 0, '', '', ''),
(3533, 'N', 'blog/details', 3, 'cements-autoclaves-testing-equipment-uses-and-features', 'Cement Autoclave Testing Equipment Uses and Features', 'Building and construction world largely and mainly depends on the cement and concrete to build robust structures. To perform accelerated tests, they use cement/concrete testing equipment like cement autoclave on the', 'cement, concrete, autoclave, accelerated, tests, mixture, equipment, determine, performing, Cement, strength, quality, testing, ideal, perform, largely, world, construction, mainly, depends', NULL, NULL, NULL, 0, '', '', ''),
(3534, 'N', 'blog/details', 6, 'everything-you-need-to-know-about-cement-testing-equipment', 'Everything You Need to Know about Cement Testing Equipment', 'What is a Cement Testing Equipment? A cement testing equipment is a machine which is used to process the raw materials that are used in the processing of cement or concrete. It is also known as cement mill. This machine', 'used, mill, cement, ball, materials, machine, system, circuit, This, advantages, electricity, grinding, balls, There, buying, steel, metal, These, Ball, power', NULL, NULL, NULL, 0, '', '', ''),
(3535, 'N', 'blog/details', 7, 'ultimate-facts-about-moisture-meter', 'Ultimate Facts about Moisture Meter', 'There are some facts about the moisture meter which is used in many industries to measure the percentage of water in a particular substance. By using this machine, you can find out whether the given substance needs', 'moisture, wood, content, shrinkage, meter, changes, ratio, different, There, certain, tangential, radial, material, This, example, substance, varieties, properties, overall, paper', NULL, NULL, NULL, 0, '', '', ''),
(3536, 'N', 'blog/details', 8, 'automatic-test-equipment', 'Automatic Test Equipment', 'What is an Automatic Test Equipment? The automatic test equipment or automated test equipment is an apparatus that conducts tests on a certain device and this procedure is known as a device under test (DUT). DUT can also', 'test, device, equipment, electronic, devices, systems, industry, instruments, measure, checks, measurements, product, Apart, waveform, supplies, digital, quickly, Automatic, semiconductor, integrated', NULL, NULL, NULL, 0, '', '', ''),
(3549, 'N', 'category/index', 1, 'our-products', 'Dension Design Vane Pumps', 'Dension Design Vane Pumps', 'Pumps, Vane, Design, Dension', NULL, NULL, NULL, 0, '', '', ''),
(3550, 'N', 'category/index', 2, 'tokimec-type-vane-pumps', 'Tokimec Type Vane Pumps', 'Tokimec Type Vane Pumps', 'Pumps, Vane, Type, Tokimec', NULL, NULL, NULL, 0, '', '', ''),
(3551, 'N', 'category/index', 3, 'vickers-replacement-vane-pumps', 'Vickers Replacement Vane Pumps', 'Vickers Replacement Vane Pumps', 'Pumps, Vane, Replacement, Vickers', NULL, NULL, NULL, 0, '', '', ''),
(3552, 'N', 'category/index', 4, 'velijan-vane-pump', 'Velijan Vane Pump', 'Velijan Vane Pump', 'Pump, Vane, Velijan', NULL, NULL, NULL, 0, '', '', ''),
(3553, 'N', 'category/index', 5, 'hydrank-hvp-series-pumps', 'Hydrank HVP Series Pumps', 'Hydrank HVP Series Pumps', 'Pumps, Series, Hydrank', NULL, NULL, NULL, 0, '', '', ''),
(3554, 'N', 'category/index', 6, 'hydraulic-directional-control-valves', 'Hydraulic Directional control valves', 'Hydraulic Directional control valves', 'valves, control, Directional, Hydraulic', NULL, NULL, NULL, 0, '', '', ''),
(3555, 'N', 'category/index', 7, 'variable-vane-pump-vp-series', 'Variable vane pump-VP Series', 'Variable vane pump-VP Series', 'Series, pump-VP, vane, Variable', NULL, NULL, NULL, 0, '', '', ''),
(3556, 'N', 'category/index', 8, 'cartrdige-kits', 'Cartrdige Kits', 'Cartrdige Kits', 'Kits, Cartrdige', NULL, NULL, NULL, 0, '', '', ''),
(3557, 'N', 'category/index', 9, 'proportional-valves', 'Proportional Valves', 'Proportional Valves', 'Valves, Proportional', NULL, NULL, NULL, 0, '', '', ''),
(3558, 'N', 'category/index', 11, 'proportional-valves/denison-vane-pump', 'DENISON VANE PUMP', 'DENISON VANE PUMP', 'PUMP, VANE, DENISON', NULL, NULL, NULL, 0, '', '', ''),
(3559, 'N', 'category/index', 12, 'proportional-valves/vane-pump', 'Vane Pump', 'Vane Pump', 'Pump, Vane', NULL, NULL, NULL, 0, '', '', ''),
(3560, 'N', 'category/index', 13, 'proportional-valves/hydraulic-vane-pump', 'Hydraulic Vane Pump', 'Hydraulic Vane Pump', 'Pump, Vane, Hydraulic', NULL, NULL, NULL, 0, '', '', ''),
(3561, 'N', 'category/index', 14, 'proportional-valves/denison-hydraulic-pump', 'Denison Hydraulic Pump', 'Denison Hydraulic Pump', 'Pump, Hydraulic, Denison', NULL, NULL, NULL, 0, '', '', ''),
(3562, 'N', 'category/index', 15, 'proportional-valves/denison-hydraulic-vane-pump', 'Denison Hydraulic Vane Pump', 'Denison Hydraulic Vane Pump', 'Pump, Vane, Hydraulic, Denison', NULL, NULL, NULL, 0, '', '', ''),
(3563, 'N', 'category/index', 16, 'tokimec-type-vane-pumps/tokimec-type-triple-vane-pump', 'Tokimec Type Triple Vane Pump', 'Tokimec Type Triple Vane Pump', 'Pump, Vane, Triple, Type, Tokimec', NULL, NULL, NULL, 0, '', '', ''),
(3564, 'N', 'category/index', 17, 'tokimec-type-vane-pumps/tokimec-sqp-pump', 'Tokimec SQP Pump', 'Tokimec SQP Pump', 'Pump, Tokimec', NULL, NULL, NULL, 0, '', '', ''),
(3565, 'N', 'category/index', 18, 'tokimec-type-vane-pumps/tokimec-type-single-vane-pump', 'Tokimec Type Single Vane Pump', 'Tokimec Type Single Vane Pump', 'Pump, Vane, Single, Type, Tokimec', NULL, NULL, NULL, 0, '', '', ''),
(3566, 'N', 'category/index', 19, 'tokimec-type-vane-pumps/tokimec-type-double-vane-pump', 'Tokimec Type Double Vane Pump', 'Tokimec Type Double Vane Pump', 'Pump, Vane, Double, Type, Tokimec', NULL, NULL, NULL, 0, '', '', ''),
(3567, 'N', 'category/index', 20, 'tokimec-type-vane-pumps/tokimec-type-double-pump-h-sqp-43', 'Tokimec Type Double Pump H-SQP 43', 'Tokimec Type Double Pump H-SQP 43', 'H-SQP, Pump, Double, Type, Tokimec', NULL, NULL, NULL, 0, '', '', ''),
(3568, 'N', 'category/index', 21, 'tokimec-type-vane-pumps/tokimec-type-triple-vane-pump-h-sqp-321', 'Tokimec Type Triple Vane Pump H-SQP 321', 'Tokimec Type Triple Vane Pump H-SQP 321', 'Pump, H-SQP, Vane, Triple, Type, Tokimec', NULL, NULL, NULL, 0, '', '', ''),
(3569, 'N', 'category/index', 22, 'tokimec-type-vane-pumps/tokimec-type-double-pump-h-sqp-21', 'Tokimec Type Double Pump H-SQP 21', 'Tokimec Type Double Pump H-SQP 21', 'H-SQP, Pump, Double, Type, Tokimec', NULL, NULL, NULL, 0, '', '', ''),
(3570, 'N', 'category/index', 23, 'vickers-replacement-vane-pumps/vickers-type-hydraulic-vane-pump', 'Vickers Type Hydraulic Vane Pump', 'Vickers Type Hydraulic Vane Pump', 'Pump, Vane, Hydraulic, Type, Vickers', NULL, NULL, NULL, 0, '', '', ''),
(3571, 'N', 'category/index', 24, 'vickers-replacement-vane-pumps/vickers-type-vane-pump', 'Vickers Type Vane Pump', 'Vickers Type Vane Pump', 'Pump, Vane, Type, Vickers', NULL, NULL, NULL, 0, '', '', ''),
(3572, 'N', 'category/index', 25, 'vickers-replacement-vane-pumps/vickers-type-single-vane-pump', 'Vickers Type Single vane Pump', 'Vickers Type Single vane Pump', 'Pump, vane, Single, Type, Vickers', NULL, NULL, NULL, 0, '', '', ''),
(3573, 'N', 'category/index', 26, 'vickers-replacement-vane-pumps/vickers-type-double-vane-pump-h-4525v', 'Vickers Type Double Vane Pump H-4525V', 'Vickers Type Double Vane Pump H-4525V', 'Pump, Vane, Double, Type, Vickers', NULL, NULL, NULL, 0, '', '', ''),
(3574, 'N', 'category/index', 27, 'velijan-vane-pump/velijan-pump', 'Velijan Pump', 'Velijan Pump', 'Pump, Velijan', NULL, NULL, NULL, 0, '', '', ''),
(3575, 'N', 'category/index', 28, 'velijan-vane-pump/velijan-double-vane-pump', 'Velijan Double vane pump', 'Velijan Double vane pump', 'pump, vane, Double, Velijan', NULL, NULL, NULL, 0, '', '', ''),
(3576, 'N', 'category/index', 29, 'velijan-vane-pump/velijan-triple-vane-pump', 'Velijan Triple Vane Pump', 'Velijan Triple Vane Pump', 'Pump, Vane, Triple, Velijan', NULL, NULL, NULL, 0, '', '', ''),
(3577, 'N', 'category/index', 30, 'velijan-vane-pump/velijan-vt6ee-double-vane-pump', 'Velijan VT6EE Double vane Pump', 'Velijan VT6EE Double vane Pump', 'Pump, vane, Double, Velijan', NULL, NULL, NULL, 0, '', '', ''),
(3578, 'N', 'category/index', 31, 'velijan-vane-pump/velijan-single-vane-pump', 'Velijan Single vane pump', 'Velijan Single vane pump', 'pump, vane, Single, Velijan', NULL, NULL, NULL, 0, '', '', ''),
(3579, 'N', 'category/index', 32, 'velijan-vane-pump/velijan-hydraulic-vane-pump', 'Velijan Hydraulic vane Pump', 'Velijan Hydraulic vane Pump', 'Pump, vane, Hydraulic, Velijan', NULL, NULL, NULL, 0, '', '', ''),
(3580, 'N', 'blog/details', 9, '', 'Denison Design Vane Pumps', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam natus earum, et accusamus obcaecati ex accusantium est veniam minima ut modi aliquam aliquid quos sunt in eligendi voluptas repellendus. Nulla!', 'aliquam, aliquid, modi, minima, veniam, quos, sunt, Nulla, repellendus, voluptas, eligendi, accusantium, obcaecati, consectetur, amet, dolor, ipsum, adipisicing, elit, accusamus', NULL, NULL, NULL, 0, '', '', ''),
(3581, 'N', 'blog/details', 10, 'tokimec-type-h-sqp-cartridge-kits', 'TOKIMEC Type H-SQP Cartridge Kits', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam natus earum, et accusamus obcaecati ex accusantium est veniam minima ut modi aliquam aliquid quos sunt in eligendi voluptas repellendus. Nulla!', 'aliquam, aliquid, modi, minima, veniam, quos, sunt, Nulla, repellendus, voluptas, eligendi, accusantium, obcaecati, consectetur, amet, dolor, ipsum, adipisicing, elit, accusamus', NULL, NULL, NULL, 0, '', '', ''),
(3582, 'N', 'blog/details', 11, 'hydraulic-direction-control-valve-cetop-3-ng-7', 'Hydraulic Direction Control Valve - CETOP 3 / NG 6', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam natus earum, et accusamus obcaecati ex accusantium est veniam minima ut modi aliquam aliquid quos sunt in eligendi voluptas repellendus. Nulla!', 'aliquam, aliquid, modi, minima, veniam, quos, sunt, Nulla, repellendus, voluptas, eligendi, accusantium, obcaecati, consectetur, amet, dolor, ipsum, adipisicing, elit, accusamus', NULL, NULL, NULL, 0, '', '', ''),
(3583, 'N', 'category/index', 33, 'hydrank-hvp-series-pumps/velijan-pump', 'Velijan Pump', 'Velijan Pump', 'Pump, Velijan', NULL, NULL, NULL, 0, '', '', ''),
(3584, 'N', 'category/index', 34, 'hydrank-hvp-series-pumps/velijan-double-vane-pump', 'Velijan Double vane pump', 'Velijan Double vane pump', 'pump, vane, Double, Velijan', NULL, NULL, NULL, 0, '', '', ''),
(3585, 'N', 'category/index', 35, 'hydrank-hvp-series-pumps/velijan-triple-vane-pump', 'Velijan Triple Vane Pump', 'Velijan Triple Vane Pump', 'Pump, Vane, Triple, Velijan', NULL, NULL, NULL, 0, '', '', ''),
(3586, 'N', 'category/index', 36, 'hydrank-hvp-series-pumps/velijan-vt6ee-double-vane-pump', 'Velijan VT6EE Double vane Pump', 'Velijan VT6EE Double vane Pump', 'Pump, vane, Double, Velijan', NULL, NULL, NULL, 0, '', '', ''),
(3587, 'N', 'category/index', 37, 'hydrank-hvp-series-pumps/velijan-single-vane-pump', 'Velijan Single vane pump', 'Velijan Single vane pump', 'pump, vane, Single, Velijan', NULL, NULL, NULL, 0, '', '', ''),
(3588, 'N', 'category/index', 38, 'hydrank-hvp-series-pumps/velijan-hydraulic-vane-pump', 'Velijan Hydraulic vane Pump', 'Velijan Hydraulic vane Pump', 'Pump, vane, Hydraulic, Velijan', NULL, NULL, NULL, 0, '', '', ''),
(3589, 'N', 'category/index', 39, 'hydraulic-directional-control-valves/hydraulic-diirection-control-valve-cetop-3/ng-6', 'Hydraulic Diirection Control Valve - CETOP 3/NG 6', 'Hydraulic Diirection Control Valve - CETOP 3/NG 6', 'CETOP, Valve, Control, Diirection, Hydraulic', NULL, NULL, NULL, 0, '', '', ''),
(3590, 'N', 'category/index', 40, 'hydraulic-directional-control-valves/hydraulic-direction-control-valve-cetop-7-/-ng-16', 'Hydraulic Direction Control valve - CETOP 7 / NG 16', 'Hydraulic Direction Control valve - CETOP 7 / NG 16', 'CETOP, valve, Control, Direction, Hydraulic', NULL, NULL, NULL, 0, '', '', ''),
(3591, 'N', 'category/index', 41, 'hydraulic-directional-control-valves/hydraulic-direction-control-valve-cetop-8/ng-25', 'Hydraulic Direction Control valve - CETOP 8/NG 25', 'Hydraulic Direction Control valve - CETOP 8/NG 25', 'CETOP, valve, Control, Direction, Hydraulic', NULL, NULL, NULL, 0, '', '', ''),
(3592, 'N', 'category/index', 42, 'hydraulic-directional-control-valves/hydraulic-direction-control-valve-cetop-5/ng-10', 'Hydraulic Direction Control valve - CETOP 5/NG 10', 'Hydraulic Direction Control valve - CETOP 5/NG 10', 'CETOP, valve, Control, Direction, Hydraulic', NULL, NULL, NULL, 0, '', '', ''),
(3593, 'N', 'category/index', 43, 'variable-vane-pump-vp-series/vp2-variable-vane-pump', 'VP2 Variable vane Pump', 'VP2 Variable vane Pump', 'Pump, vane, Variable', NULL, NULL, NULL, 0, '', '', ''),
(3594, 'N', 'category/index', 44, 'variable-vane-pump-vp-series/vp1-variable-vane-pump', 'VP1 variable vane pump', 'VP1 variable vane pump', 'pump, vane, variable', NULL, NULL, NULL, 0, '', '', ''),
(3595, 'N', 'category/index', 45, 'cartrdige-kits/vickers-pump-replacement-cartridge-kits', 'Vickers Pump Replacement cartridge Kits', 'Vickers Pump Replacement cartridge Kits', 'Kits, cartridge, Replacement, Pump, Vickers', NULL, NULL, NULL, 0, '', '', ''),
(3596, 'N', 'category/index', 46, 'cartrdige-kits/tokimec-type-h-sqp-cartridge-kits', 'Tokimec Type H-SQP Cartridge Kits', 'Tokimec Type H-SQP Cartridge Kits', 'Kits, Cartridge, H-SQP, Type, Tokimec', NULL, NULL, NULL, 0, '', '', ''),
(3597, 'N', 'category/index', 47, 'cartrdige-kits/velijan-cartridge-kits', 'Velijan Cartridge Kits', 'Velijan Cartridge Kits', 'Kits, Cartridge, Velijan', NULL, NULL, NULL, 0, '', '', ''),
(3598, 'N', 'category/index', 48, 'proportional-valves/yuken-type-proportional-valves-efbg-series', 'YUKEN type Proportional Valves EFBG Series', 'YUKEN type Proportional Valves EFBG Series', 'EFBG, Series, Valves, Proportional, type, YUKEN', NULL, NULL, NULL, 0, '', '', ''),
(3599, 'N', 'category/index', 49, 'hydrank-hvp-series-pumps/vane-pump-h-vp1020', 'Vane Pump H-Vp1020', 'Vane Pump H-Vp1020', 'H-Vp, Pump, Vane', NULL, NULL, NULL, 0, '', '', ''),
(3600, 'N', 'category/index', 10, 'dension-design-vane-pumps', '', '', NULL, NULL, NULL, NULL, 0, '', '', ''),
(3601, 'N', 'products/detail', 1, 'radha-krishna-bamboo-wood-notebook', 'Radha Krishna Bamboo Wood Notebook', '', '', NULL, NULL, NULL, 0, '', '', ''),
(3602, 'L', 'home/index', 5, 'bihar', 'Bihar', 'Bihar', 'Bihar', NULL, NULL, NULL, 0, 'Bihar', 'Bihar', '0'),
(3603, 'L', 'home/index', 7, 'chhattisgarh', 'Chhattisgarh', 'Chhattisgarh', 'Chhattisgarh', NULL, NULL, NULL, 0, 'Chhattisgarh', 'Chhattisgarh', '0'),
(3604, 'L', 'home/index', 12, 'gujarat', 'Gujarat', 'Gujarat', 'Gujarat', NULL, NULL, NULL, 0, 'Gujarat', 'Gujarat', '0'),
(3605, 'L', 'home/index', 13, 'haryana', 'Haryana', 'Haryana', 'Haryana', NULL, NULL, NULL, 0, 'Haryana', 'Haryana', '0'),
(3606, 'L', 'home/index', 24, 'mizoram', 'Mizoram', 'Mizoram', 'Mizoram', NULL, NULL, NULL, 0, 'Mizoram', 'Mizoram', '0'),
(3607, 'L', 'home/index', 28, 'punjab', 'Punjab', 'Punjab', 'Punjab', NULL, NULL, NULL, 0, 'Punjab', 'Punjab', '0'),
(3608, 'L', 'home/index', 35, 'uttarakhand', 'Uttarakhand', 'Uttarakhand', 'Uttarakhand', NULL, NULL, NULL, 0, 'Uttarakhand', 'Uttarakhand', '0'),
(3609, 'L', 'home/index', 4, 'assam', 'Assam', 'Assam', 'Assam', NULL, NULL, NULL, 0, 'Assam', NULL, '0'),
(3610, 'L', 'home/index', 5, 'bihar', 'Bihar', 'Bihar', 'Bihar', NULL, NULL, NULL, 0, 'Bihar', 'Bihar', '0'),
(3611, 'L', 'home/index', 6, 'chandigarh', 'Chandigarh', 'Chandigarh', 'Chandigarh', NULL, NULL, NULL, 0, 'Chandigarh', NULL, '0'),
(3612, 'L', 'home/index', 7, 'chhattisgarh', 'Chhattisgarh', 'Chhattisgarh', 'Chhattisgarh', NULL, NULL, NULL, 0, 'Chhattisgarh', 'Chhattisgarh', '0'),
(3613, 'L', 'home/index', 10, 'delhi', 'Delhi', 'Delhi', 'Delhi', NULL, NULL, NULL, 0, 'Delhi', NULL, '0'),
(3614, 'L', 'home/index', 11, 'goa', 'Goa', 'Goa', 'Goa', NULL, NULL, NULL, 0, 'Goa', NULL, '0'),
(3615, 'L', 'home/index', 12, 'gujarat', 'Gujarat', 'Gujarat', 'Gujarat', NULL, NULL, NULL, 0, 'Gujarat', 'Gujarat', '0'),
(3616, 'L', 'home/index', 13, 'haryana', 'Haryana', 'Haryana', 'Haryana', NULL, NULL, NULL, 0, 'Haryana', 'Haryana', '0'),
(3617, 'L', 'home/index', 16, 'jharkhand', 'Jharkhand', 'Jharkhand', 'Jharkhand', NULL, NULL, NULL, 0, 'Jharkhand', NULL, '0'),
(3618, 'L', 'home/index', 17, 'karnataka', 'Karnataka', 'Karnataka', 'Karnataka', NULL, NULL, NULL, 0, 'Karnataka', NULL, '0'),
(3619, 'L', 'home/index', 18, 'kerala', 'Kerala', 'Kerala', 'Kerala', NULL, NULL, NULL, 0, 'Kerala', NULL, '0'),
(3620, 'L', 'home/index', 19, 'lakshadweep', 'Lakshadweep', 'Lakshadweep', 'Lakshadweep', NULL, NULL, NULL, 0, 'Lakshadweep', NULL, '0'),
(3621, 'L', 'home/index', 21, 'maharashtra', 'Maharashtra', 'Maharashtra', 'Maharashtra', NULL, NULL, NULL, 0, 'Maharashtra', NULL, '0'),
(3622, 'L', 'home/index', 22, 'manipur', 'Manipur', 'Manipur', 'Manipur', NULL, NULL, NULL, 0, 'Manipur', NULL, '0'),
(3623, 'L', 'home/index', 23, 'meghalaya', 'Meghalaya', 'Meghalaya', 'Meghalaya', NULL, NULL, NULL, 0, 'Meghalaya', NULL, '0'),
(3624, 'L', 'home/index', 24, 'mizoram', 'Mizoram', 'Mizoram', 'Mizoram', NULL, NULL, NULL, 0, 'Mizoram', 'Mizoram', '0'),
(3625, 'L', 'home/index', 25, 'nagaland', 'Nagaland', 'Nagaland', 'Nagaland', NULL, NULL, NULL, 0, 'Nagaland', NULL, '0'),
(3626, 'L', 'home/index', 26, 'odisha', 'Odisha', 'Odisha', 'Odisha', NULL, NULL, NULL, 0, 'Odisha', NULL, '0'),
(3627, 'L', 'home/index', 27, 'puducherry', 'Puducherry', 'Puducherry', 'Puducherry', NULL, NULL, NULL, 0, 'Puducherry', NULL, '0'),
(3628, 'L', 'home/index', 28, 'punjab', 'Punjab', 'Punjab', 'Punjab', NULL, NULL, NULL, 0, 'Punjab', 'Punjab', '0'),
(3629, 'L', 'home/index', 29, 'rajasthan', 'Rajasthan', 'Rajasthan', 'Rajasthan', NULL, NULL, NULL, 0, 'Rajasthan', NULL, '0'),
(3630, 'L', 'home/index', 30, 'sikkim', 'Sikkim', 'Sikkim', 'Sikkim', NULL, NULL, NULL, 0, 'Sikkim', NULL, '0'),
(3631, 'L', 'home/index', 32, 'telangana', 'Telangana', 'Telangana', 'Telangana', NULL, NULL, NULL, 0, 'Telangana', NULL, '0'),
(3632, 'L', 'home/index', 33, 'tripura', 'Tripura', 'Tripura', 'Tripura', NULL, NULL, NULL, 0, 'Tripura', NULL, '0'),
(3633, 'L', 'home/index', 35, 'uttarakhand', 'Uttarakhand', 'Uttarakhand', 'Uttarakhand', NULL, NULL, NULL, 0, 'Uttarakhand', 'Uttarakhand', '0');

-- --------------------------------------------------------

--
-- Table structure for table `wl_notifications`
--

CREATE TABLE `wl_notifications` (
  `notifyId` bigint(20) NOT NULL,
  `customers_id` bigint(20) NOT NULL,
  `message` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `readStatus` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `received_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wl_order`
--

CREATE TABLE `wl_order` (
  `order_id` int(11) NOT NULL,
  `customers_id` int(11) NOT NULL DEFAULT '0',
  `invoice_number` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `first_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `phone` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` text,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'In case of user login  user_name  ',
  `billing_title` varchar(10) DEFAULT NULL,
  `billing_name` varchar(100) DEFAULT NULL,
  `billing_address` varchar(223) DEFAULT NULL,
  `billing_landmark` varchar(250) DEFAULT NULL,
  `billing_phone` varchar(50) DEFAULT NULL,
  `billing_fax` varchar(50) DEFAULT NULL,
  `billing_zipcode` varchar(50) DEFAULT NULL,
  `billing_country` varchar(100) DEFAULT NULL,
  `billing_state` varchar(50) DEFAULT NULL,
  `billing_city` varchar(50) DEFAULT NULL,
  `shipping_title` varchar(10) DEFAULT NULL,
  `shipping_name` varchar(100) DEFAULT NULL,
  `shipping_address` varchar(223) DEFAULT NULL,
  `shipping_landmark` varchar(250) DEFAULT NULL,
  `shipping_phone` varchar(50) DEFAULT NULL,
  `shipping_fax` varchar(50) DEFAULT NULL,
  `shipping_zipcode` varchar(50) DEFAULT NULL,
  `shipping_country` varchar(100) DEFAULT NULL,
  `shipping_state` varchar(50) DEFAULT NULL,
  `shipping_city` varchar(50) DEFAULT NULL,
  `last_shopping_comment` text,
  `shipping_method` varchar(100) DEFAULT NULL,
  `discount_coupon_id` varchar(40) DEFAULT NULL,
  `coupon_discount_amount` float(10,2) DEFAULT '0.00',
  `shipping_amount` float(10,2) DEFAULT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `previous_cart_total` decimal(10,2) DEFAULT NULL,
  `vat_amount` decimal(15,2) DEFAULT NULL,
  `vat_applied_cent` float(10,2) NOT NULL DEFAULT '0.00',
  `cod_amount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `idcard_no` varchar(250) DEFAULT NULL,
  `pickup_point` varchar(250) DEFAULT NULL,
  `currency_code` char(3) DEFAULT NULL,
  `currency_value` decimal(14,2) DEFAULT NULL,
  `order_status` enum('Pending','Closed','Canceled','Dispatched','Delivered','Ready For Dispatch','Rejected','Deleted','Returned') NOT NULL DEFAULT 'Pending' COMMENT '''Pending'',''Closed'',''Canceled'',''Delivered'',''Ready For Dispatch'',''Rejected'',''Deleted'',''Returned''',
  `order_received_date` datetime DEFAULT '0000-00-00 00:00:00',
  `expected_delivery_date` date NOT NULL DEFAULT '0000-00-00',
  `order_delivery_date` datetime DEFAULT '0000-00-00 00:00:00',
  `payment_method` varchar(200) DEFAULT NULL,
  `courier_company_id` int(11) DEFAULT NULL,
  `courier_partner` varchar(250) DEFAULT NULL,
  `tracking_code` varchar(200) DEFAULT NULL,
  `tracking_text` text,
  `payment_status` enum('Paid','Unpaid') NOT NULL DEFAULT 'Unpaid',
  `paymentResponse` text,
  `added_by` enum('WEB','API') DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wl_order`
--

INSERT INTO `wl_order` (`order_id`, `customers_id`, `invoice_number`, `first_name`, `last_name`, `phone`, `mobile`, `email`, `billing_title`, `billing_name`, `billing_address`, `billing_landmark`, `billing_phone`, `billing_fax`, `billing_zipcode`, `billing_country`, `billing_state`, `billing_city`, `shipping_title`, `shipping_name`, `shipping_address`, `shipping_landmark`, `shipping_phone`, `shipping_fax`, `shipping_zipcode`, `shipping_country`, `shipping_state`, `shipping_city`, `last_shopping_comment`, `shipping_method`, `discount_coupon_id`, `coupon_discount_amount`, `shipping_amount`, `total_amount`, `previous_cart_total`, `vat_amount`, `vat_applied_cent`, `cod_amount`, `idcard_no`, `pickup_point`, `currency_code`, `currency_value`, `order_status`, `order_received_date`, `expected_delivery_date`, `order_delivery_date`, `payment_method`, `courier_company_id`, `courier_partner`, `tracking_code`, `tracking_text`, `payment_status`, `paymentResponse`, `added_by`) VALUES
(1, 39, 'HK_1', 'John Martin', '', NULL, NULL, 'shashikant@webpulseindia.com', '0', 'John Martin', 'Address', 'Delhi, India', '123456789', NULL, '', 'Mozambique', 'Delhi, India', 'City of Industry, CA, United States', '', 'John Martin', 'Address', 'Delhi, India', '123456789', NULL, '', 'Mozambique', 'Delhi, India', 'City of Industry, CA, United States', '', 'none', '0', 0.00, 0.00, 18000.00, NULL, 0.00, 0.00, 50.00, '12345', '0', 'IND', 1.00, 'Pending', '2018-01-03 06:16:00', '0000-00-00', '0000-00-00 00:00:00', 'Cash', NULL, NULL, NULL, NULL, 'Unpaid', NULL, NULL),
(2, 39, 'HK_2', 'John Martin', '', NULL, NULL, 'shashikant@webpulseindia.com', '0', 'John Martin', 'Address', 'Delhi, India', '123456789', NULL, '', 'Mozambique', 'Delhi, India', 'City of Industry, CA, United States', '', 'John Martin', 'Address', 'Delhi, India', '123456789', NULL, '', 'Mozambique', 'Delhi, India', 'City of Industry, CA, United States', '', 'none', '0', 0.00, 0.00, 4500.00, NULL, 0.00, 0.00, 50.00, '1233455', '0', 'IND', 1.00, 'Pending', '2018-01-03 06:29:53', '0000-00-00', '0000-00-00 00:00:00', 'Cash', NULL, NULL, NULL, NULL, 'Unpaid', NULL, NULL),
(3, 39, 'HK_3', 'John Martin', '', NULL, NULL, 'shashikant@webpulseindia.com', '0', 'John Martin', 'Address', 'Delhi, India', '123456789', NULL, '', 'Mozambique', 'Delhi, India', 'City of Industry, CA, United States', '', 'John Martin', 'Address', 'Delhi, India', '123456789', NULL, '', 'Mozambique', 'Delhi, India', 'City of Industry, CA, United States', '', 'none', '0', 0.00, 0.00, 4500.00, NULL, 0.00, 0.00, 50.00, '445', '0', 'IND', 1.00, 'Pending', '2018-01-03 06:34:09', '0000-00-00', '0000-00-00 00:00:00', 'Cash', NULL, NULL, NULL, NULL, 'Unpaid', NULL, NULL),
(4, 39, 'HK_4', 'John Martin', '', NULL, NULL, 'shashikant@webpulseindia.com', '0', 'John Martin', 'Address', 'Delhi, India', '123456789', NULL, '', 'Mozambique', 'Delhi, India', 'City of Industry, CA, United States', '', 'John Martin', 'Address', 'Delhi, India', '123456789', NULL, '', 'Mozambique', 'Delhi, India', 'City of Industry, CA, United States', '', 'none', '0', 0.00, 0.00, 4500.00, NULL, 0.00, 0.00, 50.00, '1212121212', '0', 'IND', 1.00, 'Pending', '2018-01-03 06:40:46', '0000-00-00', '0000-00-00 00:00:00', 'Cash', NULL, NULL, NULL, NULL, 'Unpaid', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wl_orders_products`
--

CREATE TABLE `wl_orders_products` (
  `orders_products_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `products_id` int(11) DEFAULT NULL,
  `product_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_code` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_image` longblob NOT NULL,
  `product_price` float(10,2) DEFAULT NULL,
  `quantity` int(10) NOT NULL DEFAULT '0',
  `product_attributes` text,
  `store` tinyint(3) DEFAULT NULL,
  `product_type` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 = product, 1 = catalog',
  `shipping_charge` decimal(11,2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wl_orders_products`
--

INSERT INTO `wl_orders_products` (`orders_products_id`, `order_id`, `products_id`, `product_name`, `product_code`, `product_image`, `product_price`, `quantity`, `product_attributes`, `store`, `product_type`, `shipping_charge`) VALUES
(1, 25, 1, 'ASUS ZenWatch', '01', 0x474946383961d007d007c400003f3f3fbfbfbf7f7f7f0f0f0f5f5f5f1f1f1fcfcfcfdfdfdfefefef9f9f9f8f8f8f2f2f2f4f4f4f6f6f6fafafaf000000ffffff00000000000000000000000000000000000000000000000000000000000000000000000000000000000000000021f90400000000002c00000000d007d0070005ff20248e64699e68aaae6cebbe702ccf746ddf78aeef7cefffc0a070482c1a8fc8a472c96c3a9fd0a8744aad5aafd8ac76cbed7abfe0b0784c2e9bcfe8b47acd6ebbdff0b87c4eafdbeff8bc7ecfeffbff808182838485868788898a8b8c8d8e8f909192939495969798999a9b9c9d9e9fa0a1a2a3a4a5a6a7a8a9aaabacadaeafb0b1b2b3b4b5b6b7b8b9babbbcbdbebfc0c1c2c3c4c5c6c7c8c9cacbcccdcecfd0d1d2d3d4d5d6d7d8d9dadbdcdddedfe0e1e2e3e4e5e6e7e8e9eaebecedeeeff0f1f2f3f4f5f6f7f8f9fafbfcfdfeff00030a1c48b0a0c18308132a5cc8b0a1c38710234a9c48b1a2c58b18336adcc8b1a3c78f20438a1c49b2a4c9932853ffaa5cc9b2a5cb973063ca9c49b3a6cd9b3873eadcc9b3a7cf9f40830a1d4ab4a8d1a348932a5dcab4a9d3a750a34a9d4ab5aad5ab58b36addcab5abd7af60c38a1d4bb6acd9b368d3aa5dcbb6addbb770e3ca9d4bb7aeddbb78f3eaddcbb7afdfbf80030b1e4cb8b0e1c388132b5eccb8b1e3c790234b9e4cb9b2e5cb98336bdeccb9b3e7cfa0438b1e4dbab4e9d3a853ab5ecdbab5ebd7b063cb9e4dbbb6eddbb873ebdecdbbb7efdfc0830b1f4ebcb8f1e3c8932b5fcebcb9f3e7d0a34b9f4ebdbaf5ebd8b36bdfcebdbbf7efe0c38b1f4fbebcf9f3e8d3ab5fcfbebdfbf7f0e3cb9f4fbfbefdfbf8f3ebdfcfbfbfffff000628e080041668e0810826a8e0ff820c36e8e083104628e184145668e1851866a8e1861c76e8e187208628e288249668e28928a6a8e28a2cb6e8e28b30c628e38c34d668e38d38e6a8e38e3cf6e8e38f400629e490441669e4914826a9e4924c36e9e493504629e594545669e5955866a9e5965c76e9e597608629e698649669e69968a6a9e69a6cb6e9e69b70c629e79c74d669e79d78e6a9e79e7cf6e9e79f80062ae8a084166ae8a18826aae8a28c36eae8a390462ae9a494566ae9a59866aae9a69c76eae9a7a0862aeaa8a4966aeaa9a8a6aaeaaaacb6eaeaabb0c62aebacb4d66aebadb8e6aaebaebcf6eaebafc0062becb0c4166becb1c826abecb2cc36ebecb3d0462bedb4d4566bedffb5d866abedb6dc76ebedb7e0862beeb8e4966beeb9e8a6abeebaecb6ebeebbf0c62befbcf4d66befbdf8e6abefbefcf6ebefbf00072cf0c004176cf0c10827acf0c20c37ecf0c310472cf1c414576cf1c51867acf1c61c77ecf1c720872cf2c824976cf2c928a7acf2ca2cb7ecf2cb30c72cf3cc34d76cf3cd38e7acf3ce3cf7ecf3cf40072df4d044176df4d14827adf4d24c37edf4d350472df5d454576df5d55867adf5d65c77edf5d760872df6d864976df6d968a7adf6da6cb7edf6db70c72df7dc74d76df7dd78e7adf7de7cf7edf7df80072ef8e084176ef8e18827aef8e28c37eef8e390472ef9e494576ef9e59867aef9e69c77eef9e7a0872efaffe8a4976efae9a8a7aefaeaacb7eefaebb0c72efbecb4d76efbedb8e7aefbeebcf7eefbefc0072ffcf0c4176ffcf1c827affcf2cc37effcf3d0472ffdf4d4576ffdf5d867affdf6dc77effdf7e0872ffef8e4976ffef9e8a7affefaecb7effefbf0c72ffffcf4d76ffffdf8e7affffefcf7efffff000ca0000748c0021af080084ca00217c8c0063af081108ca0042748c10a5af08218cca00637c8c10e7af083200ca1084748c2129af084284ca10a57c8c216baf085308ca10c6748c31adaf08638cca10e77c8c31efaf087400ca2108748c4221af188484ca21297c8c4263af189508ca214a748c52a5af18a58cca216b7c8c52e7af18b600ca318c748c6ff329af18c684ca31ad7c8c636baf18d708ca31ce748c73adaf18e78cca31ef7c8c73efaf18f800ca4200749c8421af290884ca42217c9c8463af291908ca4242749c94a5af29298cca42637c9c94e7af293a00ca5284749ca529af294a84ca52a57c9ca56baf295b08ca52c6749cb5adaf296b8cca52e77c9cb5efaf297c00ca6308749cc621af398c84ca63297c9cc663af399d08ca634a749cd6a5af39ad8cca636b7c9cd6e7af39be00ca738c749ce729af39ce84ca73ad7c9ce76baf39df08ca73ce749cf7adaf39ef8cca73ef7c9cf7efaf39f000da840074ad0821af4a0084da84217cad0863af4a1108da844274ad18a5af4a218cda84637cad18e7afff4a3200da948474ad2929af4a4284da94a57cad296baf4a5308da94c674ad39adaf4a638cda94e77cad39efaf4a7400daa50874ad4a21af5a8484daa5297cad4a63af5a9508daa54a74ad5aa5af5aa58cdaa56b7cad5ae7af5ab600dab58c74ad6b29af5ac684dab5ad7cad6b6baf5ad708dab5ce74ad7badaf5ae78cdab5ef7cad7befaf5af800dac60074bd8c21af6b0884dac6217cbd8c63af6b1908dac64274bd9ca5af6b298cdac6637cbd9ce7af6b3a00dad68474bdad29af6b4a84dad6a57cbdad6baf6b5b08dad6c674bdbdadaf6b6b8cdad6e77cbdbdefaf6b7c00dae70874bdce21af7b8c84dae7297cbdce63af7b9d08dae74a74bddea5af7baffd8cdae76b7cbddee7af7bbe00daf78c74bdef29af7bce84daf7ad7cbdef6baf7bdf08daf7ce74bdffadaf7bef8cdaf7ef7cbdffefaf7bf000eb080074ce0021bf8c0084eb08217cce0063bf8c1108eb084274ce10a5bf8c218ceb08637cce10e7bf8c3200eb188474ce2129bf8c4284eb18a57cce216bbf8c5308eb18c674ce31adbf8c638ceb18e77cce31efbf8c7400eb290874ce4221bf9c8484eb29297cce4263bf9c9508eb294a74ce52a5bf9ca58ceb296b7cce52e7bf9cb600eb398c74ce6329bf9cc684eb39ad7cce636bbf9cd708eb39ce74ce73adbf9ce78ceb39ef7cce73efbf9cf800eb4a0074de8421bfad0884eb4a217cde8463bfad1908effb4a4274de94a5bfad298ceb4a637cde94e7bfad3a00eb5a8474dea529bfad4a84eb5aa57cdea56bbfad5b08eb5ac674deb5adbfad6b8ceb5ae77cdeb5efbfad7c00eb6b0874dec621bfbd8c84eb6b297cdec663bfbd9d08eb6b4a74ded6a5bfbdad8ceb6b6b7cded6e7bfbdbe00eb7b8c74dee729bfbdce84eb7bad7cdee76bbfbddf08eb7bce74def7adbfbdef8ceb7bef7cdef7efbfbdf000fb8c0074ef0821bfce0084fb8c217cef0863bfce1108fb8c4274ef18a5bfce218cfb8c637cef18e7bfce3200fb9c8474ef2929bfce4284fb9ca572e9c033840000d0000001e40f39adb9ce60b00000304908000c0c8000910000100b0809b1b9de632dfb902ff028000d5064000333fbad4a7fe80053420014d2f11021cd080a253fdeb371f000004e080acd733e6324fbbdad7cef6b603c0004d4880dbe74e7799830101096000d8f73ef5050800ee993040dd07cf76c00341f0844f3cdd0d2f05c42bfef16b4fc0180e00f9c4f7e1000af03adf377f73ab335e0b68afbce8474f7ab77ffe8a51e7fcd709d00401a81eec5e7080de5f4f7b9c2bc0ec940840eda7eef320e87ef79c1740151400fce08f81f8c53f7aefef8080cc27fff50568c001b690fae75bfffacae762f5ad3ffd25b81efb5b4080000a807dd513a0fb93f8fdf597ff03f597dfe800a8c2ecdf6f74e18b61fed86fc01d0e408001d09ff300207958b07dffff5780afc77e584480c9c77ade577e59207efe67807cc700e80709eef77c08d80317688055108112f800f617061e887d0b5007fcf7819c57000258050a88822e68741968452d587c157804df777d58a00023f88254777e91b081c517833b0084ff27844b60002f18825f4084cf57836d80000dc0832968844c308352e88254284556b87b0c980437687d5660009a77855f37000a6081e5978537c084efa7844f807c28e8865d1085ffb7826e90003b48865fc700b8f7045ba88705a88650f487b5d78745f085cf570588088854b700a787086c487b82580391887df12705f8278172c80563587e5dc8060840888c587303e00052208aa3b87edaf77f9b3804ff8b587c5370009d988a53370076980895a87a934803b9888352908705d88a5970000638006ee000c0488b53f7894d808aca1884ab487f036088aee88051808ccfc87704408d84d08b9bb78b33e08d18180548988461900012f88865f08ad9d877dc7804ced88e92188df4278c40c08ebb170570288f5fb700ef1808e2b877e0280301597cf67804e8688e6090896da80608c090fce88e4e108f11f98df4f87ed38804f8587b50400015b97705a08e009986425090c077894fe0910af905c9787d25880608308b1f297505e084f0389324b94514697c36688d4da0923849750320927f6092543790316094f90805e4b7925d508e12f88f5d109341b977fe5885ff55697d48a9443bb979c6d893e0f79359598644d9074a29755bf90267497b654904c4c88307a98828688a65409563d98f5209045d799735979648b4977c778b42b091b427967c598b6da9076b098325298567e80409e9949c8882cc787732799836c7004b00987ce99747c49960570060e98b4ab08f98697419d98d3909048ba97a9ae90440e98271390508e082a24906a019918f8904b999959e6944bd497582798f3e89040e709a78a99ad8f79b2bd09a9cf7954dd09492a90591f98189690574889c54779d3b109c41c99c44e49d34690484f97a4a60002da99d0f50997ee09c7dd99852c89d3ef09670f905b12981bbf905d5a99e47f79237c99f7c079eff43249e52379c3e509eaa97047609a047979f45b99aed77850e8a04fb19872cf98228e90507909e003a9bddc9a002799105e89f83599c45909d201a76f22907ee4973028a022d3a8186599f4f2985794905041a9136a99729fa752f1a44399a7dd518964610a31549a2ed09a13e60a460079d4a209dd38905088a7d74d905a6d9a336c79e3c8aa56829a20598a1c449a444800050caa535e7a17310a33f6a024c0a762baa03f449a35c10a453a77f5db0a1667a743bea0374ca8f6bfa437d7a737f5a0253ba79a3898205c07697f97f03b0a777a0a6f0e9984b50a116ca05b52985b7c905f7f98139c7763ca8a57c9aa78ca993183aa4a43904782a8100b074ff2a007410f97eaf99a4cb19a99fba049b5aa95b709c57e8a88de7820c900044e9720d50a6f4c7ab3a10a8ed38a83d84ac36a7ac2250a87c6704b77a7d032000c64a027847ac4aaa98dbca036dfa75998a04dafa81680a9b6438a15610a805707b316000d36a7d763a04e2597af49a786fca95b51a04d0ba774510a76d78a328a0835ffaa0b3ea7b7a78ad3ce0af516a05e32a81b18a0550298de56a0207f0aac9e7a441209e98c4ac3687b033b0afb04704ef5a7c218903a11888b2aa8a064b86061a04948aab5910b152b805235b7c0be0b12a808def57a5196ba293c4b13507aa3800b25f37a6ff77953a50b3bbf7b0dc5ab0aca98742fb034acb8a5c70a5ff2fc8b355a0b0d717b5edcaa1b4c7b43fa0b19704b43587b33040b4544704689b9c3c30b5b467b66c00a92b7b85e15a040dab89730a88f16a056bbb7a3e809eef4704626b49644b735c4b037d7b744470b7b587b43de0b6aab7b77920b74f7bb047a0b5b2c9058c88a454c0b8b577b8e1b8b3f2eab39254b83407b72d90b8463704ba8a7d4319048bba7b188b07941ba17ad8b23ed0ba5738b14aa0bb6488ba4420b3d6c7b93ca0ba3727b9a12aa69464ba20f803c66b734300b99b87ae3b90aa54ca07b5bba48008ba3980a252c8bb49e0bd5788bb4d20be170bbc2fe0b99c47bc3c30b895c4bca959bca4cb035eab7aeccb03565b7cdcdb06d9ab818058b7ff4210bb78ab05ea6b80601b0505cc9342f0b2bb07b034e0becbab87e0bb02cf5b7342e0bbe3b8b8e537bb76d0bfdeca880e6c03972ac15a80b93cc8c14f20bcc907c04090c021dab3cafbb37a18bf3a50c1342704d2bb7760eab2a2dbb42a5bb97a88b54080c1727a05f92b85ce4a0347bc7be4bb03e6bb7b13ec02102cc3242cbf31cc032ebc774dbc03590c76c85b071e3c848cf8c53ef0c4999b05165bc451209e2c7c78d877c01f7ac591c4bc3487c23560c30f10042a0c7c6d0c044b4c7bf7cba2dd2ac68018c83b20c0038c05ca68c84a50bf0a6cb72e2904535cba8cb8c52f80c741f0c7af47c64030c2d717c26a10c63af0ad7c07ca32e0c96418c5ff4440caaa67ca7afc7ee83b03395cb4307caa11fcbf566ccb6d5b7ef76a03694c7b424c07a29c03ac0c76c1cc0344acc65460c6e33b050cdcb849f0ccaf17cb2b30c9733c8a969cbaf39b035d2c94a5597eaa4c06c38c03c5fc759cac03cc0cb35580c82fb8bf4390ce9b9c047b5c7bce6acd9044c735d7c73280c940507e702c04265c7b3b2ccc833ccaa3c8c837c0ce0618ce4110d05768c74a209e498c02d7bba5ba4cc9d85cc3dbbc86e547bd43d0cdb5e8c35a49ab7ae8ca2e80caa98c05d27c85bdec038ebc79266d030abd770c9d02f6fc48f85c7308adcd728c039aac8b4bf0cbaf17d3e25cd0c49c8ac79c03c9accc98d88e359d03e5b7d33d109cff4f7d0237ed4839fd9e43bbd136c0cf4a80c7136d05e3ccd1a378ce3700cfe48a052ffd752bcd77037d9efe6cabd757d52670d58d94d54897035e3dd5d8a7cf249d7cd91cca464dcea9f8d63930d3c17805ce09000ecd79446dd0d847d797bcb5b50c8663ab8cccb9d7ed6b894c30cfb527d95c30d63650ce21eb03289dd2d8697dc207d24697d408597e81bd03156cd83860d78c84d7797d039abd03e567d642e089933bd8643d8a83bad44c0d05887d941030cb52e7cece2bdccf6d7dff5cdb5c7dd7cff89bbbad03e0dc046b0d76b4fd06a24d89b408da1080d6695d05a7cd9110d0d620090560bd04071000f23ddff45ddff66ddfd4ac02b6bd48b86db8ffba5ddd3400dbcdc8d9b40bdde25dd83f90dc545b05eceddd22d0d89bd7d21addd381b0df8ad4dfa7dbd5004e90061eb67d1ddc4e6bbba968da24abda56c0dc471782ac7d731e6d0416be072f8e4818be9e1a4ee107fec34a80e25307e238aebdcf57002bbea6675900cf4bde37d0ddbc37023a7e73df2db81bce07317e4833fe00e89bdd841de25ef8e4828de5fefb7c00b0e492ddb70450e455e0d9093a020d5eda5869e37f10e58634e5ce3d02563edcd627e1ffcde6fcdbe1a1ebe5690e7f7cbd7b0eb0e43667e4776c7d190ae17ce7da4e8ee77de0e68534e5548eb85aae9693de03730e07e1cd8b869ede86ca03c577b2cf47e834a0e052e7862b6e73ffbe2dc9958e078e4e48903ec1977ee396cd04b1ee0699bee7170b01a4aed547bd7bf1d79ba27eca3d2ee8f93c91ab7e07ad3e48e289e4a8e9cab58eebb3de808cbe06b7cee160d8b72d1e037d2b7cc04e05c67de624f0ed9c97df3590ec7460ee8124d1a1feb1c7de9cedaed7ef3e06d59e943868e67b18c7b50777dd3e05c44e7360cbe9af97edaa3eed301eefe9ee80a049c32ef0ecd67ed1879a8805cee51f6cd9cc5ec7bc2dbb22b0ef5270ea3587aebb6e74d33dba04af07e80e481adb9abccbf0f43ef2966ef06130ef30e09e2220d4dbd9eb9f2b021c4f73c10e03f61ee12760de4d3ae02ccfea2eff4762fbf1a4b8cf455f0231ea042abfe53ddee5ffcfd7747dcee2f0cec42230d753f0d37b87c2e26e919bb9f46f50f2466f8d557f74b1fdf4943ef4b22df65d00f36b3f8e882e75212fc5c097755a7f8ad28d02001fb96beef08240f67e34b81cefd726a0f62ed0f4ade7f6a1ade70d9f7cbdf7f110fd02c0e79f790f057dcf791e8df43627d57f0ef815cef87a34b8676f74818df82da0f8b42efa5a00f789afb2407f74767e962178f94ff0f57c2792b1ff75e42e03823ff6e557afc20f00a99e80c559f8672bfaaa2feda00fde8ebff2198cfb5227f0140c7ccb67fb4eb0fb219d02d20f76b17dacacaf0690eee565e4bea57f73d98cfa2cb0fc5f1dfe58e0faa9ffc3c057f7d58cf122d0f37cb7f32e90f3ff0f00020c349225f2a0a9bab2ac58c2b13cd324d0e2f95af3bdff0383c09bae683c22932980b0e97c42a3d229b56abd62b3da2db7ebfd82c3e231b96c3ea3d3ea35bb4454166103786b0114d0e3d9405e97c6f7e1b489f105b60474151aa6289030040e4819be40282e3e08b01d5c32f22c703e4496bd810e9ada80a682329db6babec2c6caced2d6dadee2e6eaeef2ba9272c2002e22fa0897eea93efc25f73a5972126f3d1b668e28181e404d2b25906cf755ab5d831af034a49693fd5e367bad27c323b1b6d3d7dbdfe3e7ebeff3f7fbffe37b67080682398be6f130060c99aa650d017a4b164dcbb73ce13605eaf644219c6c232ad20997e6112751351cffa41219466020884f58c68bd902a1cb9a366fe2cca97327cf9e3e03320b06ad58502c20f3384c65f3289d890c39892c108800149845ec4404a5f24c2a4a344e80c23ac62a9d9f33c8ca4c4bd32cdbb66edfc28d2b772edd536895c4287869ad0c8e8b281635e377604da6709c1a4d598240a002500c35286118c9d632284135ea71f708027581dd6e4e0b8f6fddd2a64fa34ead7a356b5ea18ff41d9af07395c949921e73691b09e22bbb8b88bcdcc7a390df2b268e83bae61c28e23506e7d128e6b511b9d445af6aad7d3bf7eedebf83e77edd4f0c8c8ba8ce7e9858bd60dafe8c17e96d053e0e8460fb480f921c6909e821d748c589633ed0d7027ad3b967ffd678d81d149e830f4218a184135208cb8282c8c0d825cec5c6de7c0986e11f7fba4994482a342d78601024e5e11504222a51d918e65da2220fa998b412883e5dc8601fa45518a490431259a491e1f5c8c20c344e959e524fe5d69e87ff1488837cb59d08c37e700c288441796446028c49c8284602a9e4c7439229a4a3e394421c20809c73d259a79d77e299279d1c5ab1a68f4a0079a4a083125aa8a187dee3670a3468b8089ffdeda84da45e8c895761257251e50a3419808d109d06c261a5479419068b1bde914a9860288a82149a8272a514adfe6944a088e29aabaebbf2da6b15b4d2c0641f360af5e614b0ee80c6a8482c85a93459ca9191105b2ad1ffa5988aa5f1e522d6f6802c0ab762016c14de0eb305adb5ea00aeafebb2dbaebbef0a29ee0c8d7a3ac3b2b041b9d019f75677a92ab21e9b0ab710d00b47642b0672b01bd89e412eb137a6d2999b4f4a8aee21e65acca0baf072dcb1c71f83ace08ec896c9af1eeb512c65ca00918b02c0af4e79661f62fda02d1c0ec4a068a95f30c7499a9aa582f3c4513a93310b2fbf64b4681b87dcb4d34f431d752df29e75c90012c760327928134d86d63934fbaf892b43705f1e58f7006a1f688fa0731a9f3427c4d72c3c8cb1b140b41c08d24e9cabb40a4c4b1db8e083135e381554cb40b2bd93167d371873b710762a7b3fd1b20c70e721b40fd426c197db6708dbff5813e40ecc05e2a3fb9d02e542f49dfa03801b1ebbecb3d31ef5e9395bcdf608902b992f3bca327e4fdeaba34ef68b0903712a1caba2a2151a32735237c471b31a3c0d79f741fc10aec7037beddf831fbef886de0e83e2595b1f44deb8e90bd1f063775d492034f360b3126d2eecfc19051bf2b30f8a32cf74e94b1cf7b4f783d6a5ce7be35b20031be8c0ed940f060132448eaee5b88a194f0cbc4b1689c496290f466b6d3e501b1d4a070155ecac0bf60b951338d7071709f082dd2aa0ddb8a70a053e30873adc210f7712c11240af7fe89361e33218a201b6e37d1f9c9c0c94a704cdd5c08547a81b0acf40c26d3de18a7fa91e116b80bd3c18f07f364cff060e7b68c633a2318dbbf861092628ba6219715c48bcc2065520b958c14f363008a2c17ce0c42440b1045554d92514d68415f62190358c9ffa68a80504faad8c6a9c24252b69c951048f8ff881232361d6c52dd47151fe62e212f1589ef9f900919c99c120cb80b94b283279a930640ce348204766815600d8252f7be9cb5f023398c2f4252d2f69cc63223399b5ec640cdcd8076e85d255bedbe2bee6d80b253e8b943178251cd2864a56326c0c66bb84ee8020c51272d19633745d1881f64965c2339ef29c271bd808449f41ea9d78b36615a2a98c519a329ba08825047ad6141e9c13383468e51834f9cd2caae251e1e2e7477039517dd233a31add2847ffa3604f12e8651134f32760304a478aea029b25d55f0c84f39f1afc1109f8930c43c5c03fe445419574f0df45d5c9832f1ef49128ed28518b6a547a7ed482e5dadd500968522b9014a07a5ca972c099875be9540715a46938c5e04c43105496a080612e510ad4c32cb27d475d2b5bdbbad1a48e20a486984754b9a656af35f5162a9d6620ca14537c2da9493368590ab3a0454394533f38fa025c076bd12b34d6ad929d2c651f18d90d12a3aebec9eb46385b8bbdda7511654aa80eaee45024f0547e5d05036993403f271c566fee30eb63fbe4d9cae236b7ba055964e51a085668f6434fede76d6701dacdae9604a1a30ca358e8d8e4ce1614c57442569530ff5dc8d2969d69fddd6ebbebddef0e2eb2051d4a70b1345c2a94f73dcea2ea25c84a82afca8306f03dc26b4be0d24b14f60ae35c4458111696e8fad48bb5fd5571c16be003237842e25d2e1ca892de809d770a0fe6c771859b9de6f621b07db82e53a1cb85fb2e22b1d35285880f8752040420c52a5e318b57dc5a25b4534d054e308d6b6c63d58897609c885381d707bc08e7a2c2e6bdf00c409c84de9cf608b28a667ead70d3995521b69b5ce65dc120e459cdf8c65ade32977f9263062b810013962390a330667d5c19c24496c17ec994a13e6c9593f825c37cf3308061e2f997aa909e89cb5c3c6df694995d1e34a10b0d971cebf81275ce305f5bf2e300ffdb23cd9e5cb30cc6c39745ebc0bd4aad6a18a43c46ab7501d1930e68a0ab6ce853a33ad53841349895c65eee12d2d4145e6fa3f350df12bc98055b6db50e52db6196b2f6d332992976fd5c1c5adbd6d8aa5e36b39bed0b7efed5d5b51e51ac61cd326423d7969e2ec24c936c048992c0a0731643b4854d0d2a5b3b0c924e9ab29dedee77c37b68b25ee7a75feda8470b3a1febc660beab8b03e63dd90826cc1fb0bf60ee98dcbacf90ce36a98bbdf078433ce2120f354521496d0b377c0c67d637b6313eef1104bc082ec2740e38dcbc8277c1c807e744893d9a650183b0d4e99e38cd6b6e7387e71be663b4b721622c85905f9c4a1d1f72bebdadd512f03aff07fd6d5b4dbb20ee950f74bbd41cc3be9b20ea9b633deb37bf3a042cdecd6907d50c5c0ff2d0a9e0e31ab459a62430fad66ad0aa264f81e450a7039f5ddeee1f549d752fd73adffb4e68aeabdc685a48fa13d1d02a49a6b4ec6aa65e0db8998430013d079a2638a7bd40f8b9576b0b4f9f3a21145f95bdfb3df4a24ff0d8e5eea32d2403ee58307d7ca57a099fffd4f35aa304eb57104019d4de08aa8742ae319f0462a33719c0f742de8330f6d1233ff9351e3bdbff84faa68b818c779c2ad8d11a7b3b8fe0f22c183e0c526f2adf27e3f612f67cf5612c75c2283ffdea4ff5f1732f932d387eaea0f3beeb972ad08ccbc0df2d2847f35b30f0ee439f16e8ff1ff8b51e16f4de11f8dafd515fb23ddcfa39e003ead6f1f51f769c1f949941deec5e3314dfb1c51c0d945b0e7443e4e140dd9100fd111f012643cb1511ca7dc1061e10e841600ccae0311d1f04b85f3c6c81085a4a191ca011c01e2eb8e03e75e00c4ce00a50c50d3ec0d295600062c1e6a1602028e19f8d551904a13b35e00c62611666540df6200e6a813f715f17e8e0ef4ddfebe5d102ca80f6a94001a4dd2af980097641fc3de186694132245c29e19fc2e59c16f2611fc6530dfa96e06941e0f581f879811c3a5afdf5dc199aa10f202270fc0810c0e116a8e11ceac0ff41c100320b1954a18cdd9d1f8262282e500d1e4fea506232906016b4a1052affa26ce1211aca8013ca8421c6c0246a41115a621180dbe70de109f6a21e7e9c280ae3309a112906a2c570413260e22da2e24d7422bde5614ba14b1802a08759c107e62212d0e213c822387022f9f10d0c12e33892e3c79062294a9b50a9023566c1186aa3338263e5c463adc4d94231a1156862364a5e1674a10edc21cfb962597d623912644172cc391e63ad70813f999c00c663a43da414c26213fd492a2ea13552c1b6e9e36d608146d2c12e96df915520a31964499ae4ec9c63a209e2202a6343c1034e3ce3f5011a42fd490256230b9ed44636e215c0c3368696fdc91ce79de45012e5d3a464250e64d9c0c30fbea02a4cdeacfd22d14de429f9880a0affd23d52c123ea2412346438aac23232dc54dadd151665599ae5a1a4a44a2223ba35081878e4f2c0644472e04cf20012c2c13fd622564ac12a6e2512e06513f8d30330e52d45259625e5592266627e475a22e51e3e413f961618606347c465612e9e58c2803bf69510d8e215e0621114409e89e66826034836c15b024ae759262f92a562bae66b3e485aaaa542724163a64b0bc20358a2995c36d26ada1783104f673a992af82403e2d3eac1834d4ae54e0625fac1e6734267bc14986d0a25166865e61c223c74e53ec4a4ce45239b61473dd6807056413e729b0639653bc2c3d53c0e6f8ad16146677cca674fc866d7658c1740660e0c80694241373a173cfaff26bf61260c58dc53ca00794e016a1e81780224f6fd647b7d8182f2c64806dd7c5ae885e2d88c9d55db0d5e3c2c805536c167d2974e74e7f544647e22601320a81444938162817bd6805dea40060201025c67d835672262e88ef2685dd4a77da2cb174c668319564c282777c22861d2250f48e847aaa85eb226271427ce8d5b4e26271768e684aa636bf668977a693ffce88662082382020180a80f3880792ee84e94e8732d69fdc8c45fe6254642015fd2013b624134c969105067114ca91064a9960a24977e69a11a6a3bfc28903adf17c8a83ff2670fa0e88cb2699242e38066a64c6ce79ce2e41410221d30a80292937ac604039c690f20c090e22895ceffdca1b26aabe643a28aa8737241ac2ee89fa62102b1278952aa4c7e2711ca8401ad281404ea3e9641321c299fa6c5001c6b0d18c08d06648e92a4ab4aebb4d243a2da206d326a5a14c0b266dfb0bad9a406a83c862b48bd9f1304eb1334aaed89dd9e6901aada1ab7229db78ae4966a859ed8ebbde2ebbd0e26b5f2eb7c5a2bad5628338a460134c0cb1c4002785daeeaeab84a24730281b3c2818b1e28949ea6f0551b0575687812800380a8012800c402a5aaf6650ed068bf9a2c865aebb59e9ebca98598d90900a4ebe3f5449b3ad59b3a09713ec1b93641a4ae61c358aca8fac80200409e0000c872c29e5addc832d7c9322db5a62cc07e9d5b2aed88ceffecae7aa7a59a4f3c3caaa6569e71d6081ae8ac1024e4d4ea009eb21bd9926cd3aaadaba6acca52a018f8e7d49aad7a31ec5cf62a0da8e9253e06c572a62ac0abd7b6253fa2ed3bb2e5e0a240c9ae6de22666db06e698820102c4acef21aef058ad89d6ed08b8ab1164eac4d2691374aa9356138951e8e04a6c941aae0a4caee2aa2e51b6edd88a230934a925222ddddaacd9b927d4b240145ad5a6f6e757a641dee86e13b8eee07e28809d2eeaae6ef2a2ac38366eef8c01cf42dd7e9a05cdc64010f6290b94ea4d762d15442e0a586432b22ba89eaef41aeff11eaef2a2af7cb66dd9e4ed0e8e81bc625ef05edbe50a61ed7a02b4e42cdffec0f5aec0df5eff41e6ea2d17402fe60dc0dc8ea5f99e6ffa2a306cae2f3a962b19d8e8e0fa2f54daefa8616d0cc4adccee6de72a564489c3cfe6a0f91630cb1e6fea2ef009fb6103dbe9aa7e41044fedf776500593990c17193a4441d8fe0000e7806e7641ecea80ad3a810e83df0893f0e99a300a23311636f06cbea415b5afb9c1700cdfed0c4fb13d2a9a24e8ef1b86af1a3cb10b78810b932d1117b1e11e71129bf1032e31ff722819184017db50144bf105376cc80a8110ab001c6b6f95daaedfb2811d47ce17fbb1b92dc0d6121802a740199f71222bdf1233317ca68dd142715c506fd6d2af357082fc722eef3641062b01210b703260f213c0efa7912a261972022bff722a132323abb1e39e01185b221097211d87a5c3c209cb613107ff002407f01af870c91dd15622b2f19d322aabf23183222337b2637601028cb2c50c4028cff222bea22d0b41a3ce6e266f2f14b4b2f70e821bf76c182400381bcd00ecabde15f33023f33ad79c32ff72bfb0c10033c80218704e4c3257d130866d662e6b7210e06eff0e4220af80274741b3e662291b5e3163023b3374162ab3a2beee08f1b2c56c2e4fdc7356e4730d1b423d6bb31e4b8140ab00417f32ce6adc1346f31a78dda7a97343b3b4bb3d3450b542f38242019c733f5c744555725c61ec14e0309c0a8c29bc730b94ae1518b4ef21b41aa4f418ad744b33b5aa3d3444132a2526ffb5120cc0525370158b6b4657cdb050414f5b6e2ae0b10aa9c2a7ce6af7c2c302d4b4e99aaf5537755bff5d44e3b3236bc3546b6ef6fac44dab9656cb00644ef055eaf2cd1e674057aef00a00390b4c5fd32b02b3b55b33b6963d35044cf41a9f4200d0b5ae098048dff560d72c56d3c02f63761e8b561544360e7cf616c8f30354b42a268059ff16628feed42e7663cb36e9c1f53dd5366c118061fb6502d8355be07577aa6936efee360b6f4b9e4250b38070efc133db1901703482a4f36c4bb7cd3db6db32f31a240003e8761d3440694faf6657afd5066a6a5b713ffbc03fdfb12b6cb7775b010264f776e340016cec2c5476eac4f674e3777e576f03b4ff4a01304002b0b77eeb86009c8b7f2bc0730b78822b78d30440021038c8de99980540802ff84d188083330075086d03084000f47685837888874c8bb518858bb8591c0089b318829f788bbbf88bc3788ccbf88cd3788ddbf88de3788eebf88ef3788ffbf88f0379900bf9901379911bf9912379922bf9923379933bf9934379944bf9945379955bf9956379966bf9967379977bf9978379988bf9989379999bf999a3799aabf99ab3799bbbf99bc3799ccbf99cd3799ddbf99de3799eebf99ef3799ffbf99f037aa00bfaa0137aa11bfaa1237aa22bfaa2337aa33bfaa3437aa44bfaa4537aa55bfaa5637aa66bfaa6737aa77bfaa7837aa88bfaa8937aa99bfffaa9a37aaaabfaaab37aabbbfaabc37aaccbfaacd37aaddbfaade37aaeebfaaef37aaffbfaaf037bb00bfbb0137bb11bfbb1237bb22bfbb2337bb33bfbb3437bb44bfbb4537bb55bfbb5637bb66bfbb6737bb77bfbb7837bb88bfbb8937bb99bfbb9a37bbaabfbbab37bbbbbfbbbc37bbccbfbbcd37bbddbfbbde37bbeebfbbef37bbffbfbbf037cc00bfcc0137cc11bfcc1237cc22bfcc2337cc33bfcc3437cc44bfcc4537cc55bfcc5637cc66bfcc6737cc77bfcc7837cc88bfcc8937cc99bfcc9a3bc901cc068b2fc2e710102b43ccb7f3845c4bc680ef513ac7ccde7992b1880ce0f138b8f007ffb7c30bd45ce0f3dd19b82d01ffdd2f7929c28400000ff3ddc32bd2ff182d24ffdd5633d30457dcad7f869bb0c17b076120e022787d91778bd60b6c23356372c9c7d5aabf518f9b70070ecb3c9f56b2baddb73bd8883f40a9037103037f2b6c1b9b8760fecbd0af4bd2fea3581def62c147e0a1cbeddbb8e7ccf7de02f3e309a2fdee73d88c3f70328379a8ec620c4c3cc03c1e6777e35d33231d73d2e90be29d4777bf1364a57fe14b4bed2607ee62bf85999384178e11a604fe9e39d4ce4fe1e273ee50523806aed20cc7ef4d4be2746754217f3f2dbbe7e93fd4e15ee46c7b376f28c4c0c7e2d9ffef6a4be2d4c3f1c6cbfe5cfe1028c3f3a37ff19247fc6407ff4e3f7681741586f4e4ff6f1527e01fceb80fc8bff2f35bf3d083ce24896e603a5eacab6ee0bc7f24ccbcb89e73951f77e0bd00987c422b190f8295d412371098dc29aceaaf5ea0c48b7dcaef70b0e8bc7e4b2f98c4eabd7ecb6fb0d8fcbe7f4bafd0e3d608b83b261bf53570078d277a647a86378179058a22545e5888247873869b2482789d9e90460c0c69958e933ea894a0859cadaeafa0a1b2b3b4b5b6b7b8b9babbb0b9b904a124a36e0596089ca80e6fb2b126cd7d8b90a750ac82ba6bcdc3c37bdcc2d22b0b68da51bde5d7e125d9daebecedeeefe0e1f2f3f4f5f3fc3d0fd4d46808a30e7804a011a7cdcf439f3844e09392bf67a105c66509bb9892316642bb3b0ca388a1c73246c0832a4c891244bff9a3c893265ca61dc1694b986c9c19c06a80ea061b9cc2523845b323a51a902e72f9d9b3a4e1c90e48c4f231b8d3a15f111a8d4a954ab5abd8a35abd66a7fcaf91b830055c4374b8b143bd3b5dbd73acf3045ed51f609d0b4dcd6ca89fb144b03a59e9ae6edf876abe0c1840b1b3e8c38314801e66492b9d109c01c547bcf302ee7982dcf487d815eee96f9eedf723c3076c68577b42ac5ac5bbb7e0d3bb6ecd93e20772b3d86e6e9376d63a2b1cd0d379dde8e02d348ad432af065c2e320576da43998e738fc422f679cb6f6eddcbb7bff0efe55587367c7107774918d025468c6972b3f7c7314ea2780baef06dff9f5e064e89bb0bedf32d985476081061eff886082e1c1d44d7a5f08e58840703c3489646730c88d83bcc927cd6e2761884d5101fe925418fe9500e088a80ca8608b2ebe08638c32d6c3cf44128e41a123d2ad314827379651a3393fca71de6a9c75025490e50c49968abf68782426293ae9d68c565e8965965a6e590784dc5838068880e4b7c6259840f9204560ce5124202c4ee1a1495e2eb3261c2752594201767571e70853e299c89b5c0e4a68a1861e0a235de6ecf9859993309a86987b902986a25e69064d4f719264a95a1201da49655ff429c29fa0ee2128a2aaaeca6aabae6ef5d944a185d1a36f6ee886c98e61c4da18a6554639894abc62f6e9a993a0a9d0a6b3907a6aaaaf3e0b6db4d24eff5b0db343882a06ae938ca5c67289cc3a86b542601b479ba86a8a644ae2ea40ae1beb525927ba52e6f2ae93ce528b6fbefaeecbaf19f74d44a9170045f6463f67fc4b9eaf93dcbb02b32921fc5eb1c61637aab2b2d4ab22c3fd6ecc71c71e6f3c70473691c15e1be66241541921733432911c2ee1304a2b53d4729313575871baa8dd4cf1c73eff0c74d0f82a4911935fe49808b2620c4b08b762106d637c9902eb484a500b295a64006ccd75d75c7bcb91d235c4bcb3d65e9f8d76da6aafcd362842bf0d77dc725f592b47c890b19e8f6d204d88d85bd44dd1dd2e4f3d9fc520013e91e036cffb4300093400762aba26abf32d64cf8d79e69a6fce71a713f9ffe1c9e4c274a209199e9b23f5af8557ce695e59339e8700887b52faeab0db7239e7baefce7bef5ce6ed14b85fcc3e291b8e2622ba17c01b253c1b275fa1710ab98fb47c47cda7313d140acc69abbcc1d26bb8efe28f4f7ef9b261cc2e909e404a86a4589468da53ed9afc32e5b78f847e0ef3ab917d1eef263fb6f0bda27fe62ba0010f8840aafc25656198d9b7d6a02d47d48c647961a01b9e6785e84180800d59a07e58c785ab3922603fe0202c4c98c014aa70852c4c87034546068801c2698fe98405c5f042960d4e751d0261487248333b095009224cc4046136c456a0b0854c6ca2139f3893d1c02f0c91c342bccae089fd812182469922fd08d7c3fbff85848b1df122ff92e80304108f10d7830b1a4bb14428ca718e74ac6314d698b832308d1a69c060153448033c9a437117ac5f09dff80e41968390e040640dfc68051a9ac2917788a31d2f89c94cd2f17846a9dd174e8705bf6d618f7b4003273be2c93540d2081ab4e43b4ec99154a2c1953e28e21eae78481f2e8b929aeca52f7f39beea3d059030e01e168c2606beed81916210a6538809855516a195bc5487338d02cd5c8ab10bd2340b176889077002739ce42c27dc94d9114986b01300ec8231af804c30a09323ea3c433787404d5dda639e14a9677faa39832a96d27b55039f3ecd89d0842af463d7b9a117dc67051236ca1347144343cb65c8491e94ff1e177517406540ca3d5454a3dbbcd847178ad294aa544bf75c06fbb8004b2cbcf4a19d90a8175afa8b999a01a71e21282948c25383b5419c8f5c914f09612a71ac74a94c6daaa1c8f814337a41a056686317a0aa173460b58b7008ea398ecac7916cb58c1edde8168c4ab59f96ada44e6dab5bdf4a20aa72a49d50186b15fcb905b93ac1aa5dd0eb44e82a06af9a209f6c9d875fcd01d89c1516ace74a2b520dba58b84a76b294454c4c3b5906c19200975e90e11e740ad300c9d29e1975a359e17159549635b251e0a715a46a5ad6b282a895adad6d6f4b12881a45944a782743324bb00b8d88b75fd02c0908fb3d91e8b623c4fde6496310d22be03506b4ff15916c718bddec6a371eae4d6719ba6b84e6f620ba5588e7d14634dd30187704c82da848c0dbcfa13e1706e4bd2b6395bad6e46e77bffced6f3b7c6b84e51281b35cb8e631e377ac9b4c42c043203070c188c4d3be03c04560b0101c2c86eacea0be4e48ef0b34fc3afdfa77c4242e312c8c0b80d41a01b47960671928ec4dd23a22c59860b17a4b1b4009b703c52a2e828dbd00e218ac57047c95419085a863132b79c94c26835d8bf00d4516a1c85090728c2be5e2333c9908519e0495c130e407b457ad20d9f210baec882ff369be2f08f3981f9b5ff73679ce74ae33180e2b042dd8d20989fd819989f0631f587808b0fd029e75a0e749f4999b383e0eff9b6b71e89eee393aa278740b068dcffb5e21a99bb6b3a73f0d6a1a78f6b798c6814da500c42ba8b907937642a097306a8d40a0d4273875601b3d8323d722d63f99f5246cad5811efca13e26d98a52b9de4502b7bd923a6b5092cd46322147b06bceef018229d038782c1d92580f699bec8c3085f571ddcde6c0aa23d8469db4fd860e0305334fddb389399d9f4aeb7895bcd6515587908e685b71130ac846a1bc1c350c0f799f53d897edf1ac2eb96b33d0c2e0483ec5b080a0fb6c3c300f121009bbac76e64b2ed0df290bb15c6994e41c6730070ed7d7c0643ce663117a68293e320e5c5c5b5913b0e0b92e739e6383be3ca633b63e7febc0eba16b9d18fffee4b50ca3a05e52601e8bedd6e4c8cd60b4aef35d3c7cd0537fbdbeaf6a8fabbafceee7f0e9d069e203813708e3db4237ded6c67a2bb2fbc02740b61d53e9838c54d8409660e3be82a90bb0ee82e05ad3b36acf678bb0ed6e4f71c005edc616734c31b3eef5a14bded94afbc0ab17d82b1d85d7fea537418742e84424f755b2cd83c0eb4681e9b737cecb8c0bc09343f09d44f07ed7f96cbd6bf6e39b55b7ef7bcd79dc089800e99d7fa2598d8380dbc6e84917ee1f725e7f9089da77a38b1de16ccdff90a846f02e30f7ea06300bd10f4aecdc6c762f2bd2fbff93397eaa5ab20fd4e50fe16aa2f8457c7a0e9154103fb719f82fb17c1fd377e3c49c5ef0efffa677beb8709fc076438477f24207a39867595a47be7078111c831d857028c047f39507150e07a26b0782e408125207b5df0812360819890818e176e90076734320925987069377d2f607a3a207f67178348d68012a8833b183433680246b38124007e5c60783a607630108424d0813de0832500842da84ad1f7610f88074d48024fe80843687191d7054528048b368537b83800c8836568863f837cd2e602b5970353270569d8609d258630008742e0206c88036e5873fe077417170f75a8037738097a287439180380d87cb757049c166f67e8888fe833065605a9248089f87986c802eba5855d20894e408929480682673b64b80e9d68049f08737c3187ff106000de077707b88ac8868990488bb5482877a27717787adf0575a36482b304852ea08b27108237258536388b92178c2d308c26508c8a38805cd08a68b566b1e871c9688bd9a88d30d28c4e888493a06d5c90800f7082ab274107f38b2f908422108e60768c40408575d08d57f88d8ed08ed5888d29b03da840738e668d3e978fdb289003191e9568873080873860802de6795ce08ac377060619880859807df48e2c407ead20913900250979020bb97df81578eba26ef0f88f3088096da3922bc936cf48902f09930de19125305a1b89030b1805ebf800dae70288880360e86783180336790238997517696c27590933490235890946398a7ed803089000ffef7284e6488a4ac433ff16935de995246185241803f328964e56635b608a46b08435109622308464e99616c9870c9895d5d0960ff09679a78ad715007da90090d30df7a88284873b5b5904fdf89589a998b7907838d06f3a49884b40941cb80523380235e8038d79028f299468208a615497bba0993f68039d896086e98920f97f526952a8f98a8b099bb1c90b695904c8c294c08045a427057789984b409b6a1803b739022549039fc978acc90ebf996e32209ccc6006f9331a03409cc8189a95009d1dd19bb2a99ddb2907f025046e389925709534e09d87270570498e03619a30109e24309e3d609c83c97df2509e6d3803ed3902ef996bae798ad3499dffc87942fc699edc49a0055a0a7a2903e829982a579d2c809fce7906083a9698b0a08187942a909107ba8c30a0a0cf29a043209da709a003f4a13367a0278aa271f0a0e9b99f8f4206a35902d3e68585607fe978732eba53172a3df128072b5a717d8299fe58a2b5e69f611890ab35a423909d29caa44d1a9493b090335a94657097e588910d6906cdf90051fa9432068aabc985eda0a55cba60229aa47819a47439a2ae709d1cb1a44e0aa771ea0277096ceb05943460990f70a75d7a06745a54581a8a3aba413c1a077e5a9cb962a6253a00560a9a6baa9567aaa4722aa993fa03304a028025752af36b50e0932790a63460a92380a9eb997a7329a40d6a0bffa12a02a3ea0891299fae49009fda8761da9a90fa006f4aa9b97aa2e308957d52a42c809e35a89c3a50a151c0abb3ba07bfda02f1197e8eaa0bc7aaa680a0ac187aa604a09af888aa76d0a66aa2abddeaad29509f39a09a524a9a62f74044147bea09a5e365a3a5faa5c84a98ee10ae0ac9ae2f182e67ba000d30add277a4f265abb7faad014ba90f997d3eb05eb82a03c39a034778972ef702049b27069b92396aaa2ddaafa500b124607c076bae675a000a20ab169bad44f7af002bb027eba476fa039d10b23dd9736944aaee8a3c2b7b96815ab1377ab178a0b23ec0b2f75ab20320002d6ba4236b5d908ab0288bb402a9a550b9a35ef6620dfaa09bc805ff4bdbac80b0964226a8196a07540ba67b70b5ff69ab8b9aa8f14a0bdb3a11479bb4695b8b3ab9a53f40ae2570a73390a7c4f5b623c0b41a58913e50b7a2fa60ef1aad2be80e6c7bad10b0b7abeab3255b1183fbb764bb4bff8ab66a0bb966a8aa3ba904ebc5933d9080567a278a5ba9c557b99e6bb37e7baaceca98a02bb19b9a61884b935f7ba54ab997461bb9b1ab98e308869dc0b9a206a864f77cc295bb3560bba19b8a5149abd540bb4bf0bb78a7ba2570b7224bbad659b28f2bbbd16b7e79fa00cb3ba8f67a6dbb5b039d0a826840bdd6db278cfaa7a2cbbcc3cb0bdf7b9c8020be389bbc763b7baeeba18e2bbdf34b90194b029cabb03920b55050b8ff3f96bf27c0ba3160bf2380bf12da7fe4cbbecd5b0b032c0205bca1b0d8be0ab88580ab8cf24bbf176c8bdc1bb14ba0c12802bc56cb6a44bbbda6fb031dec7432db33c24bc1ea60c22270b9ac188b66ab1afea9b5c068c1188cc38e58b80fe0922dc0c00f10c03eec08e9d596fb2b053bdcc32cf0c341ac02ccdab58c5b0d481c054b8cbc11acb1215bc3af7ba6d09bc35d5c6f6cdb81f34a8cbc980829a7aaeb5b1bdda30462ec8c281c28d03804f000c6ad8509495cbe4d230079acc77bccc77d4c005c530e760cb62bdcb829c992878cc80020c85eccc821879e0f10a4ff0b916192950fbaaf2bf0c8914cc27b88c058a9c0b290c95120c905fbbe016900ff0a70975f05c742c088ead7c8af0ca7e358ac2dd0c20dfca2093603c2f9c28246a16f78bcee78b39e6cbeb920cbbe9cb7102cc22e1000a96c6eab9c1c9095ccb02ccd2f49bd8b1c147c3a066df9a33ae2bd75bc053f6cbd32e0c4f03a9feb50cddf8ccdd8fac934a0a5121c929d266f843ccdf3ac9da9bc966c5c8165209cede4b47daac64b80cf42b8709dccafd15c0af6bc05015d96c8bcce34308e23b0cb4d9bb30069d0f46cd18f58cb908c96994a06f8796ac625b42f90d19f3aca3439d0c1dba8c37c0b23bdd131fbce8d982dd498bef23c7e847ad1375d79254d02b3ecb204ad04380a033afd003cad0442cd8ed218ccf099b5369d06463dd448edd3ff09acd22f5d05463cc8505cd3f08bd35b5d797d62cd2bf0c35f2d030a6d550aad9fa30b08629d02617dc0283dd3580dcd84a0d610c0d60c3dd55190d12210a4591cbf13cdd57f4d798ffcb50a7dd47833c432d09697ac0282dd0584fdd4c01cd526e9d770c0d85ce0d8443db40d1dc27a93d2341da05a0dd8a10d722baad105d6b36360c20416aaae0a05a41db24e5ddac698d4997dd7b3e0da9c78da8558d13030b922f0a67c3db6e52cdac3fd88d48bd9b4dc09e11c48c8899f715b03c64d75c90dd96efdaaf0ac0ed0dd0519addcad3bd92ac0b67addd9704da2a04ddce5fd69a93c0089ac3659360696d9918eb0dd6c2975ea9d36ec8d82d45db59e7d0bffe84ddf6863df54cd756500db401cdec25db64c6dde09ae6479ed24aced03f8194f2772bb3dc0e02ae2e0583bdb576de0ba50e12372e11a2e9265d0db3c5ce0215ec1ddade029de64034e25974c9693638f68c0e24e52a4e3bcb81b9e0b33ae22d309dc10c0cc4bdae387bbdb2a4ee475e6d88072d6058d0501a359733dd6569ce42960e368addfb570e47892e43d7ee5256edd8549de450ee6db65c58f3d067b0b2942edb02e30e6c7bdac4bfde568b0e6ea5cdb474c516f8de3598de261aee7d945daa012d22b60c2c213d01ffee0631edb5b30e5772cdeb4d0e78022ab3d9ee820dee5273ee47b6ee9fbd5cea0c2c4609d084e1396565d5786ceba912eccff553e0b990e28570be99e00be086ed7a67ee9b1de64cc0c2ace1d0323182fa18ac64c68e8b62ee56e9ee76a40eb8062eb3dfec80f7084419eba6f2eebcdbe52230e2a112d03f4d702f839e13500ed8022ed4d0cec950e07d98e27db1ee46567e7267ee0cceeece9ae503a8e27971caa17719bdb3e03ecdee2f79dc25c0ed3ba40ef34eecc39b006e45eddf97eeec1aeee05af50577e2abb5e9a84302449e8e43180f0a0a2f0bf9ee192eded6f10f180a2f0e3fedf376eee857cf1062ff228f5c313c3c52c709bcd91660a66e8268be8ddaed97850f2c682b01c3fb101efca941ef323cff34b156613f3e7dc4e08f0a1599ed9f297799415cfdd210f7d477fe8ff381fe066e009d9a9ec55ccf43d8ff5be84eac6b2e9d74c086b51b727bf864e4fe02faff44949f0594af64b68f30fecf1933ef0579ff5737f49df7d330fdf02019d19013df10145f66a4dea4a3ee7ad60f713f3d56d7fd8508f7f3a3ff874eff80805eea722ef2fa0d30661bf8a7d6e644fb9661fd94bbff3c640f6118df89d5eee700ff29ffff8a98f490fbd95d71e0396ea6d439f0c9adfb6167af6d48aee61c0fa3c33e1abde09c9eeea720eebaa4ffcc094f1c6d2f732f8534de7eb4faef90a1ff8b43dfcad70fc09afc28bde057d0efcb92ffcd85ffcdfdf4b33cf33a0ee03b7190ab719df3420fe3743fe9908f38d5f09eb3f31ed2fd1729f023b4c64ffa52ff0a70fff20008923599a279aaa2bdbba2f1ccb335ddb379eeb3bdffb3f30281c128bc62332a95c329b4ea6e1219d52abd62b36abdd72bbd4a0c3ab4d4000e22c62183db3dbeef7d7168063033733ddfac4adf3fe3f5c0d1ee083d120a09dcce1df9e20a15463a4e42465a5e52566a6e62667a7e72768a8e892c0a3e9695d905f0384df025129aa2c6a22cddc632dcda2dfe848ec2c30a2aea9d1e9c1cc6e5e6f325daff33374b4f43475b5f53576b6f676c942f0f76a10b318401f9c009137f8ba1b6bcd2d612e32b1b33afbbd97bb22fd50187fccb837cbfe712b68f020c2840a17326ce8f0612804f82676790544819f047e0c0c9148f123168bb64cffc9dbf7c89947902aa7880448100801532d61047433f024c49c3a77f2ece9f327d0a042816824540000d2a44a97326dea34a9a9633fccbd2990670091a2808e3eedead569d47724efbcfca4f50fd7af6abf86354988c881530c86e11455b3cdd0bc7af7f2edebf72fe0c03d62125270e4ee193240acaa9c3b843020c3861e299e014f980dc4679c41fe23b988662f9569961d7c0addbcbaa1427b11ecfa35ecd8b267d3ae6d69c0238e467efd71fca333c5d1407013d25d84b71fdf322eff29e9527528e2808cc37aa4fc05eb2e439863760be8e65bdbe2c7932f6ffe3c7aa154af22e14e072bd1955283ac7fdffe117ccb633397e6541f4e7e45b807606ae1ff01810063fdb1901d17e07d971e84114a382185155aa80472795c47c47e3ea444d14c3f6448c786437418c3807038471a749f8c084789429ce802835b0481803d8f00e0488b9ed4a8c585410a392491451a39de8f587c361921a8fd90233efa88f3c892a03de2248a337ac7c828495e5125115e5a81258d0ada80a32c606267662662ea71249c71ca39279d7556f3e11fd41df748883bbc08ce8a3be0b951127fbad1670b29be1168993d7232681e7a564708a22ab859c50f0148670c8f06aec6a69da18a3a2aa9a59a1a833f80046884a26ea431154844a4fac7aa029af26a96b890e5e826b3fa512b11adb6816ba39ee610c0a55954da42b25338c8e5a9d1ff4a3b2db5d516099c864b98221c0f9bb213230fd892a82d65fae9ca1faf9a880b23b98470bb42b3901cdb4082b3bcbb66ba9ac45b88b5fdfafb2fc001f755af1f6a86f9080141304091c13c109c47c342c49bf0725a3ed7a400196bbc31c71d7bfc31c820b7f0301d114f4908c5f8621cf2c7042445b22c0310bba51f2cdb7c33ce1c170b48ce3dfbcc32a3020b3d34d1451b6dc27f7048ba2721c0ea70163bf30191f41b4b4faaaab9f1ecba52302c50ed86d54318da86d329eccbf51929d385f62c3bb30d0c9947cb3d37dd75978a91514c08cb46d837c4854f0144e0bd95dea6f48dc2de6704bde0db6daf30385a85e7c662e3516f5d79be239c8d391571ffdbfd39e8a18b0ee1c44d98e2b90e507ea33610a533717ac5e776caf98396226cfa9594d33e0beb05eece0bb3bf9f363af1c51b7f7c60db3611ef8e4034808f031c96cb04f3b16b8daef0caaca03cf53aea9e7dd333fb0ebe4dc193ff07eac8abbf3efbed6be3ab1f52177a2b108913227e0ff0e7213f12630f9bebf566773e36ac407f74e0df11fcc706fca16073d94bdff7062806b749b00d10741f0633a8c10d5ae279796b82fdbc103d20dca37942f020e140688a11be20845d581cbc2a881715a030722a7c040b1927433a2c2b823b0492f97ec8860b72b088463c22127b00b337f42e09a668a20e16b60e93e560896e80e2119e08c0eeac4d88365281ff15db80c562dc8e825ee4c2000ea7b23366c18c6cc402119328c739d2b18e22f89bbb9e20c514fe0072c150a3dfb8d7843ddab08516f3e11b9d95023c02e25e4720a41f02e7c6445ac19134a3a4bc7488c92cc4d18e9efc242891e7c7f83d6194910202238151b61d98f280a5341c0c5cc80518da6e93984a412be1804024e4b26a93b4e5182f89c95f6eb293a13c263293593448e641924ef85a1ba85883300222983960261d9cd90468b2419a2390e5166869365bde1205d8848336a1600a6f3a9073d6bc1839f9a5c978764e99f6bc273e87a6c53d782b5b3001872575b0cf27f4735c86945d17c9a982813aa1a0ec0a223d1fb000060ad096c4c4a431f3ffa9d18d727448e01c4323ce19082018907e42f86816026a04910ae4a0014ca84511274827b0b47cf38c2703285ad14d5e949219ed2850832ad4f1d4f00fbb4c422fdd90431e404a2644282a29f790d4362c5505284d05f6e29902a8eeaf11536543554fd0ceb7bd737c31bd69447f3ad4b5b2b5ad7c515d3623c1cd3348a907637d805a65005774cad51475b5ea21d7a85014ecb52a7d7dc45fc51a516f9a95a7108d285edd2ad9c952962fa9f443598be050c35e2418e2a4c165f39059226cd60de9042c421b3bcc1384960ea31d4269db705ac592b30080dce96ad14acfbc56b6b7befd2d35a0961149d4b40d47bdc15cdfb0caa7cd548f6d61c155aff059ffdad21305c2cd834a1ff9dc71dab2013acdc15dd1d6d344f216b8e63d2f7a35515c361c17a9eb0c426c0d2a84f59ea1bdbc7c6fa2023b5e219a73bbafa4926ebd0880e9c2d4b101266779d3abe005335809f13dc36cb7690a70e1605d7fc8ee0d1e2c8608abd33a2e88ae15085c82f0720d051af6028797905c2f50580424664701300c5ec8ee978d096e308e73ac631c80b80aaf252d7e82705d40d8f7063da6c28f611be4fca65698943cc191a79064219cb80bcb2dc31b01105689d1f8b169dd3198c32c661f28303194a0af1844dc82a646f26a8d3cb37ebf19e70327f2046516838c571ae717cfa2000d28b20ff81c2b2fef76cc863e34a25d50d83700fffa085fa56b10160d87c4f640d2c6a5c4a3c540e91244590a6ad65c97bbe15fa9fa3586325c40036edbba509b1ab252b871a2632debdeb299b3935871458270e7336c5950a648718729c5e497aaf6c925a8b5692b816b2ef450d07e00400312d0682e47b4c66784f5acb3ad6da10e190e5356f223a61d4b546485a192a87217ecdbe9077cdac5ac1641b799789b5193c0d91b464ac602a0eac3bc9bbbae8eecb6032ef08113bce0063f38c213aef08533bce10e7f38c4232ef18953bce216bf38c633aef18d73bce31eff38c8432ef29193bce4263f39ca53aef295b3bce52e7f39cc632ef399d3bce636bf39ce73aef39df3bce73eff39d0832ef4a113bde8ff463f3ad293aef4a533bde94e7f3ad4a32ef5a953bdea56bf3ad6b3aef5ad73bdeb5eff3ad8c32ef6b193bdec663f3bdad3aef6b5b3bded6e7f3bdce32ef7b9d3bdee76bf3bdef3aef7bdf3bdef7eff3be0032ff8c113bef0863f3ce213aff8c533bef18e7f3ce4232ff9c953bef296bf3ce633aff9cd73bef39eff3ce8432ffad193bef4a63f3dea53affad5b3bef5ae7f3dec632ffbd9d3bef6b6bf3dee73affbddf3bef7beff3df0832ffce113bff8c63f3ef293affce533bff9ce7f3ef4a32ffde953bffad6bf3ef6b3affded73bffbdeff3ef8c32ffef193bffce63f3ffad3affef5b3bffdee7f3ffce32ffff9d3bffef6bf3ffef3affffdf3bffffeffff3f0006a0000e200116a0011e200226a0022e200336a0033e200446a0044e200556a0055e200666a0066e200776a0077e200886a0088e200996a0099e200aa6a00aae200bb6a00bbe200cc6a00cce200dd6a00dde200ee6a00eee200ff6a00ffe201006a1100e211116a1111e211226a1122e211336a1133e211446a1144e211556a1155e211666a1166e211776a1177e211886a1188e211996a1199e211aa6a11aae211bb6a11bbe211cc6a11cce211dd6a11dde211ee6a11eee211ff6a11ffe212006a2200e222116a2211e222226a2222e222336a2233e222446a2244e222556a2255e222666a2266e222776a2277e222886a2288e222996a2299e222aa6ffa22aae222bb6a22bbe222cc6a22cce222dd6a22dde222ee6a22eee222ff6a22ffe223006a3300e233116a3311e233226a3322e233336a3333e233446a3344e233556a3355e233666a3366e233776a3377e233886a3388e233996a3399e233aa6a33aae233bb6a33bbe233cc6a33cce233dd6a33dde233ee6a33eee233ff6a33ffe234006a4400e244116a4411e244226a4422e244336a4433e244446a4444e244556a4455e244666a4466e244776a4477e244886a4488e244996a4499e244aa6a44aae244bb6a44bbe244cc6a44cce244dd6a44dde244ee6a44eee244ff6a44ffe245006a5500e255116a5511e255226a5522e255336a5533e255446a5544eff255556a5555e255666a5566e255776a5577e255886a5588e255996a5599e255aa6a55aae255bb6a55bbe255cc6a55cce255dd6a55dde255ee6a55eee255ff6a55ffe256006a6600e266116a6611e266226a6622e266336a6633e266446a6644e266556a6655e266666a6666e266776a6677e266886a6688e266996a6699e266aa6a66aae266bb6a66bbe266cc6a66cce266dd6a66dde266ee6a66eee266ff6a66ffe267006a7700e277116a7711e277226a7722e277336a7733e277446a7744e277556a7755e277666a7766e277776a7777e277886a7788e277996a7799e277aa6a77aae277bb6a77bbe277cc6a77cce277dd6a77dde277ee6a77eee277ff6ffa77ffe278006a8800e288116a8811e288226a8822e288336a8833e288446a8844e288556a8855e288666a8866e288776a8877e288886a8888e288996a8899e288aa6a88aae288bb6a88bbe288cc6a88cce288dd6a88dde288ee6a88eee288ff6a88ffe289006a9900e299116a9911e299226a9922e299336a9933e299446a9944e299556a9955e299666a9966e299776a9977e299886a9988e299996a9999e299aa6a99aae299bb6a99bbe299cc6a99cce299dd6a99dde299ee6a99eee299ff6a99ffe29a006aaa00e2aa116aaa11e2aa226aaa22e2aa336aaa33e2aa446aaa44e2aa556aaa55e2aa666aaa66e2aa776aaa77e2aa886aaa88e2aa996aaa99eff2aaaa6aaaaae2aabb6aaabbe2aacc6aaacce2aadd6aaadde2aaee6aaaeee2aaff6aaaffe2ab006abb00e2bb116abb11e2bb226abb22e2bb336abb33e2bb446abb44e2bb556abb55e2bb666abb66e2bb776abb77e2bb886abb88e2bb996abb99e2bbaa6abbaae2bbbb6abbbbe2bbcc6abbcce2bbdd6abbdde2bbee6abbeee2bbff6abbffe2bc006acc00e2cc116acc11e2cc226acc22e2cc336acc33e2cc446acc44e2cc556acc55e2cc666acc66e2cc776acc77e2cc886acc88e2cc996acc99e2ccaa6accaae2ccbb6accbbe2cccc6acccce2ccdd6accdde2ccee6acceee2ccff6accffe2cd006add00e2dd116add11e2dd226add22e2dd336add33e2dd446ffadd44e2dd556add55e2dd666add66e2dd776add77e2dd886add88e2dd996add99e2ddaa6addaae2ddbb6addbbe2ddcc6addcce2dddd6adddde2ddee6addeee2ddff6addffe2de006aee00e2ee116aee11e2ee226aee22e2ee336aee33e2ee446aee44e2ee556aee55e2ee666aee66e2ee776aee77e2ee886aee88e2ee996aee99e2eeaa6aeeaae2eebb6aeebbe2eecc6aeecce2eedd6aeedde2eeee6aeeeee2eeff6aeeffe2ef006aff00e2ff116aff11e2ff226aff22e2ff336aff33e2ff446aff44e2ff556aff55e2ff666aff66e2ff776aff77e2ff886aff88e2ff996aff99e2ffaa6affaae2ffbb6affbbe2ffcc6affcce2ffdd6affdde2ffee6affeeeff2ffff6affffe2f0007b0000f300117b0011f300227b0022f300337b0033f300447b0044f300557b0055f300667b0066f300777b0077f300887b0088f300997b0099f300aa7b00aaf300bb7b00bbf300cc7b00ccf300dd7b00ddf300ee7b00eef300ff7b00fff301007b1100f311117b1111f311227b1122f311337b1133f311447b1144f311557b1155f311667b1166f311777b1177f311887b1188f311997b1199f311aa7b11aaf311bb7b11bbf311cc7b11ccf311dd7b11ddf311ee7b11eef311ff7b11fff312007b2200f322117b2211f322227b2222f322337b2233f322447b2244f322557b2255f322667b2266f322777b2277f322887b2288f3229979fb2299f322aa7b22aaf322bb7b22bbf322cc7b22ccf322dd7b22ddf322ee7b22eef322ff7b22fff323007b3300f333117b3311f333227b3322f333337b3333f333447b3344f333557b3355f333667b3366f333777b3377f333887b3388f333997b3399f333aa7b33aaf333bb7b33bbf333cc7b33ccf333dd7b33ddf333ee7b33eef333ff7b33fff334007b4400f344117b4411f344227b4422f34433f6a0800003b, 4500.00, 1, NULL, NULL, '0', NULL);
INSERT INTO `wl_orders_products` (`orders_products_id`, `order_id`, `products_id`, `product_name`, `product_code`, `product_image`, `product_price`, `quantity`, `product_attributes`, `store`, `product_type`, `shipping_charge`) VALUES
(2, 26, 2, 'NEW ARRIVALS 02', '02', 0x474946383961d007d007c400003f3f3fbfbfbf7f7f7f0f0f0f5f5f5f1f1f1fcfcfcfdfdfdfefefef9f9f9f8f8f8f2f2f2f4f4f4f6f6f6fafafaf000000ffffff00000000000000000000000000000000000000000000000000000000000000000000000000000000000000000021f90400000000002c00000000d007d0070005ff20248e64699e68aaae6cebbe702ccf746ddf78aeef7cefffc0a070482c1a8fc8a472c96c3a9fd0a8744aad5aafd8ac76cbed7abfe0b0784c2e9bcfe8b47acd6ebbdff0b87c4eafdbeff8bc7ecfeffbff808182838485868788898a8b8c8d8e8f909192939495969798999a9b9c9d9e9fa0a1a2a3a4a5a6a7a8a9aaabacadaeafb0b1b2b3b4b5b6b7b8b9babbbcbdbebfc0c1c2c3c4c5c6c7c8c9cacbcccdcecfd0d1d2d3d4d5d6d7d8d9dadbdcdddedfe0e1e2e3e4e5e6e7e8e9eaebecedeeeff0f1f2f3f4f5f6f7f8f9fafbfcfdfeff00030a1c48b0a0c18308132a5cc8b0a1c38710234a9c48b1a2c58b18336adcc8b1a3c78f20438a1c49b2a4c9932853ffaa5cc9b2a5cb973063ca9c49b3a6cd9b3873eadcc9b3a7cf9f40830a1d4ab4a8d1a348932a5dcab4a9d3a750a34a9d4ab5aad5ab58b36addcab5abd7af60c38a1d4bb6acd9b368d3aa5dcbb6addbb770e3ca9d4bb7aeddbb78f3eaddcbb7afdfbf80030b1e4cb8b0e1c388132b5eccb8b1e3c790234b9e4cb9b2e5cb98336bdeccb9b3e7cfa0438b1e4dbab4e9d3a853ab5ecdbab5ebd7b063cb9e4dbbb6eddbb873ebdecdbbb7efdfc0830b1f4ebcb8f1e3c8932b5fcebcb9f3e7d0a34b9f4ebdbaf5ebd8b36bdfcebdbbf7efe0c38b1f4fbebcf9f3e8d3ab5fcfbebdfbf7f0e3cb9f4fbfbefdfbf8f3ebdfcfbfbfffff000628e080041668e0810826a8e0ff820c36e8e083104628e184145668e1851866a8e1861c76e8e187208628e288249668e28928a6a8e28a2cb6e8e28b30c628e38c34d668e38d38e6a8e38e3cf6e8e38f400629e490441669e4914826a9e4924c36e9e493504629e594545669e5955866a9e5965c76e9e597608629e698649669e69968a6a9e69a6cb6e9e69b70c629e79c74d669e79d78e6a9e79e7cf6e9e79f80062ae8a084166ae8a18826aae8a28c36eae8a390462ae9a494566ae9a59866aae9a69c76eae9a7a0862aeaa8a4966aeaa9a8a6aaeaaaacb6eaeaabb0c62aebacb4d66aebadb8e6aaebaebcf6eaebafc0062becb0c4166becb1c826abecb2cc36ebecb3d0462bedb4d4566bedffb5d866abedb6dc76ebedb7e0862beeb8e4966beeb9e8a6abeebaecb6ebeebbf0c62befbcf4d66befbdf8e6abefbefcf6ebefbf00072cf0c004176cf0c10827acf0c20c37ecf0c310472cf1c414576cf1c51867acf1c61c77ecf1c720872cf2c824976cf2c928a7acf2ca2cb7ecf2cb30c72cf3cc34d76cf3cd38e7acf3ce3cf7ecf3cf40072df4d044176df4d14827adf4d24c37edf4d350472df5d454576df5d55867adf5d65c77edf5d760872df6d864976df6d968a7adf6da6cb7edf6db70c72df7dc74d76df7dd78e7adf7de7cf7edf7df80072ef8e084176ef8e18827aef8e28c37eef8e390472ef9e494576ef9e59867aef9e69c77eef9e7a0872efaffe8a4976efae9a8a7aefaeaacb7eefaebb0c72efbecb4d76efbedb8e7aefbeebcf7eefbefc0072ffcf0c4176ffcf1c827affcf2cc37effcf3d0472ffdf4d4576ffdf5d867affdf6dc77effdf7e0872ffef8e4976ffef9e8a7affefaecb7effefbf0c72ffffcf4d76ffffdf8e7affffefcf7efffff000ca0000748c0021af080084ca00217c8c0063af081108ca0042748c10a5af08218cca00637c8c10e7af083200ca1084748c2129af084284ca10a57c8c216baf085308ca10c6748c31adaf08638cca10e77c8c31efaf087400ca2108748c4221af188484ca21297c8c4263af189508ca214a748c52a5af18a58cca216b7c8c52e7af18b600ca318c748c6ff329af18c684ca31ad7c8c636baf18d708ca31ce748c73adaf18e78cca31ef7c8c73efaf18f800ca4200749c8421af290884ca42217c9c8463af291908ca4242749c94a5af29298cca42637c9c94e7af293a00ca5284749ca529af294a84ca52a57c9ca56baf295b08ca52c6749cb5adaf296b8cca52e77c9cb5efaf297c00ca6308749cc621af398c84ca63297c9cc663af399d08ca634a749cd6a5af39ad8cca636b7c9cd6e7af39be00ca738c749ce729af39ce84ca73ad7c9ce76baf39df08ca73ce749cf7adaf39ef8cca73ef7c9cf7efaf39f000da840074ad0821af4a0084da84217cad0863af4a1108da844274ad18a5af4a218cda84637cad18e7afff4a3200da948474ad2929af4a4284da94a57cad296baf4a5308da94c674ad39adaf4a638cda94e77cad39efaf4a7400daa50874ad4a21af5a8484daa5297cad4a63af5a9508daa54a74ad5aa5af5aa58cdaa56b7cad5ae7af5ab600dab58c74ad6b29af5ac684dab5ad7cad6b6baf5ad708dab5ce74ad7badaf5ae78cdab5ef7cad7befaf5af800dac60074bd8c21af6b0884dac6217cbd8c63af6b1908dac64274bd9ca5af6b298cdac6637cbd9ce7af6b3a00dad68474bdad29af6b4a84dad6a57cbdad6baf6b5b08dad6c674bdbdadaf6b6b8cdad6e77cbdbdefaf6b7c00dae70874bdce21af7b8c84dae7297cbdce63af7b9d08dae74a74bddea5af7baffd8cdae76b7cbddee7af7bbe00daf78c74bdef29af7bce84daf7ad7cbdef6baf7bdf08daf7ce74bdffadaf7bef8cdaf7ef7cbdffefaf7bf000eb080074ce0021bf8c0084eb08217cce0063bf8c1108eb084274ce10a5bf8c218ceb08637cce10e7bf8c3200eb188474ce2129bf8c4284eb18a57cce216bbf8c5308eb18c674ce31adbf8c638ceb18e77cce31efbf8c7400eb290874ce4221bf9c8484eb29297cce4263bf9c9508eb294a74ce52a5bf9ca58ceb296b7cce52e7bf9cb600eb398c74ce6329bf9cc684eb39ad7cce636bbf9cd708eb39ce74ce73adbf9ce78ceb39ef7cce73efbf9cf800eb4a0074de8421bfad0884eb4a217cde8463bfad1908effb4a4274de94a5bfad298ceb4a637cde94e7bfad3a00eb5a8474dea529bfad4a84eb5aa57cdea56bbfad5b08eb5ac674deb5adbfad6b8ceb5ae77cdeb5efbfad7c00eb6b0874dec621bfbd8c84eb6b297cdec663bfbd9d08eb6b4a74ded6a5bfbdad8ceb6b6b7cded6e7bfbdbe00eb7b8c74dee729bfbdce84eb7bad7cdee76bbfbddf08eb7bce74def7adbfbdef8ceb7bef7cdef7efbfbdf000fb8c0074ef0821bfce0084fb8c217cef0863bfce1108fb8c4274ef18a5bfce218cfb8c637cef18e7bfce3200fb9c8474ef2929bfce4284fb9ca572e9c033840000d0000001e40f39adb9ce60b00000304908000c0c8000910000100b0809b1b9de632dfb902ff028000d5064000333fbad4a7fe80053420014d2f11021cd080a253fdeb371f000004e080acd733e6324fbbdad7cef6b603c0004d4880dbe74e7799830101096000d8f73ef5050800ee993040dd07cf76c00341f0844f3cdd0d2f05c42bfef16b4fc0180e00f9c4f7e1000af03adf377f73ab335e0b68afbce8474f7ab77ffe8a51e7fcd709d00401a81eec5e7080de5f4f7b9c2bc0ec940840eda7eef320e87ef79c1740151400fce08f81f8c53f7aefef8080cc27fff50568c001b690fae75bfffacae762f5ad3ffd25b81efb5b4080000a807dd513a0fb93f8fdf597ff03f597dfe800a8c2ecdf6f74e18b61fed86fc01d0e408001d09ff300207958b07dffff5780afc77e584480c9c77ade577e59207efe67807cc700e80709eef77c08d80317688055108112f800f617061e887d0b5007fcf7819c57000258050a88822e68741968452d587c157804df777d58a00023f88254777e91b081c517833b0084ff27844b60002f18825f4084cf57836d80000dc0832968844c308352e88254284556b87b0c980437687d5660009a77855f37000a6081e5978537c084efa7844f807c28e8865d1085ffb7826e90003b48865fc700b8f7045ba88705a88650f487b5d78745f085cf570588088854b700a787086c487b82580391887df12705f8278172c80563587e5dc8060840888c587303e00052208aa3b87edaf77f9b3804ff8b587c5370009d988a53370076980895a87a934803b9888352908705d88a5970000638006ee000c0488b53f7894d808aca1884ab487f036088aee88051808ccfc87704408d84d08b9bb78b33e08d18180548988461900012f88865f08ad9d877dc7804ced88e92188df4278c40c08ebb170570288f5fb700ef1808e2b877e0280301597cf67804e8688e6090896da80608c090fce88e4e108f11f98df4f87ed38804f8587b50400015b97705a08e009986425090c077894fe0910af905c9787d25880608308b1f297505e084f0389324b94514697c36688d4da0923849750320927f6092543790316094f90805e4b7925d508e12f88f5d109341b977fe5885ff55697d48a9443bb979c6d893e0f79359598644d9074a29755bf90267497b654904c4c88307a98828688a65409563d98f5209045d799735979648b4977c778b42b091b427967c598b6da9076b098325298567e80409e9949c8882cc787732799836c7004b00987ce99747c49960570060e98b4ab08f98697419d98d3909048ba97a9ae90440e98271390508e082a24906a019918f8904b999959e6944bd497582798f3e89040e709a78a99ad8f79b2bd09a9cf7954dd09492a90591f98189690574889c54779d3b109c41c99c44e49d34690484f97a4a60002da99d0f50997ee09c7dd99852c89d3ef09670f905b12981bbf905d5a99e47f79237c99f7c079eff43249e52379c3e509eaa97047609a047979f45b99aed77850e8a04fb19872cf98228e90507909e003a9bddc9a002799105e89f83599c45909d201a76f22907ee4973028a022d3a8186599f4f2985794905041a9136a99729fa752f1a44399a7dd518964610a31549a2ed09a13e60a460079d4a209dd38905088a7d74d905a6d9a336c79e3c8aa56829a20598a1c449a444800050caa535e7a17310a33f6a024c0a762baa03f449a35c10a453a77f5db0a1667a743bea0374ca8f6bfa437d7a737f5a0253ba79a3898205c07697f97f03b0a777a0a6f0e9984b50a116ca05b52985b7c905f7f98139c7763ca8a57c9aa78ca993183aa4a43904782a8100b074ff2a007410f97eaf99a4cb19a99fba049b5aa95b709c57e8a88de7820c900044e9720d50a6f4c7ab3a10a8ed38a83d84ac36a7ac2250a87c6704b77a7d032000c64a027847ac4aaa98dbca036dfa75998a04dafa81680a9b6438a15610a805707b316000d36a7d763a04e2597af49a786fca95b51a04d0ba774510a76d78a328a0835ffaa0b3ea7b7a78ad3ce0af516a05e32a81b18a0550298de56a0207f0aac9e7a441209e98c4ac3687b033b0afb04704ef5a7c218903a11888b2aa8a064b86061a04948aab5910b152b805235b7c0be0b12a808def57a5196ba293c4b13507aa3800b25f37a6ff77953a50b3bbf7b0dc5ab0aca98742fb034acb8a5c70a5ff2fc8b355a0b0d717b5edcaa1b4c7b43fa0b19704b43587b33040b4544704689b9c3c30b5b467b66c00a92b7b85e15a040dab89730a88f16a056bbb7a3e809eef4704626b49644b735c4b037d7b744470b7b587b43de0b6aab7b77920b74f7bb047a0b5b2c9058c88a454c0b8b577b8e1b8b3f2eab39254b83407b72d90b8463704ba8a7d4319048bba7b188b07941ba17ad8b23ed0ba5738b14aa0bb6488ba4420b3d6c7b93ca0ba3727b9a12aa69464ba20f803c66b734300b99b87ae3b90aa54ca07b5bba48008ba3980a252c8bb49e0bd5788bb4d20be170bbc2fe0b99c47bc3c30b895c4bca959bca4cb035eab7aeccb03565b7cdcdb06d9ab818058b7ff4210bb78ab05ea6b80601b0505cc9342f0b2bb07b034e0becbab87e0bb02cf5b7342e0bbe3b8b8e537bb76d0bfdeca880e6c03972ac15a80b93cc8c14f20bcc907c04090c021dab3cafbb37a18bf3a50c1342704d2bb7760eab2a2dbb42a5bb97a88b54080c1727a05f92b85ce4a0347bc7be4bb03e6bb7b13ec02102cc3242cbf31cc032ebc774dbc03590c76c85b071e3c848cf8c53ef0c4999b05165bc451209e2c7c78d877c01f7ac591c4bc3487c23560c30f10042a0c7c6d0c044b4c7bf7cba2dd2ac68018c83b20c0038c05ca68c84a50bf0a6cb72e2904535cba8cb8c52f80c741f0c7af47c64030c2d717c26a10c63af0ad7c07ca32e0c96418c5ff4440caaa67ca7afc7ee83b03395cb4307caa11fcbf566ccb6d5b7ef76a03694c7b424c07a29c03ac0c76c1cc0344acc65460c6e33b050cdcb849f0ccaf17cb2b30c9733c8a969cbaf39b035d2c94a5597eaa4c06c38c03c5fc759cac03cc0cb35580c82fb8bf4390ce9b9c047b5c7bce6acd9044c735d7c73280c940507e702c04265c7b3b2ccc833ccaa3c8c837c0ce0618ce4110d05768c74a209e498c02d7bba5ba4cc9d85cc3dbbc86e547bd43d0cdb5e8c35a49ab7ae8ca2e80caa98c05d27c85bdec038ebc79266d030abd770c9d02f6fc48f85c7308adcd728c039aac8b4bf0cbaf17d3e25cd0c49c8ac79c03c9accc98d88e359d03e5b7d33d109cff4f7d0237ed4839fd9e43bbd136c0cf4a80c7136d05e3ccd1a378ce3700cfe48a052ffd752bcd77037d9efe6cabd757d52670d58d94d54897035e3dd5d8a7cf249d7cd91cca464dcea9f8d63930d3c17805ce09000ecd79446dd0d847d797bcb5b50c8663ab8cccb9d7ed6b894c30cfb527d95c30d63650ce21eb03289dd2d8697dc207d24697d408597e81bd03156cd83860d78c84d7797d039abd03e567d642e089933bd8643d8a83bad44c0d05887d941030cb52e7cece2bdccf6d7dff5cdb5c7dd7cff89bbbad03e0dc046b0d76b4fd06a24d89b408da1080d6695d05a7cd9110d0d620090560bd04071000f23ddff45ddff66ddfd4ac02b6bd48b86db8ffba5ddd3400dbcdc8d9b40bdde25dd83f90dc545b05eceddd22d0d89bd7d21addd381b0df8ad4dfa7dbd5004e90061eb67d1ddc4e6bbba968da24abda56c0dc471782ac7d731e6d0416be072f8e4818be9e1a4ee107fec34a80e25307e238aebdcf57002bbea6675900cf4bde37d0ddbc37023a7e73df2db81bce07317e4833fe00e89bdd841de25ef8e4828de5fefb7c00b0e492ddb70450e455e0d9093a020d5eda5869e37f10e58634e5ce3d02563edcd627e1ffcde6fcdbe1a1ebe5690e7f7cbd7b0eb0e43667e4776c7d190ae17ce7da4e8ee77de0e68534e5548eb85aae9693de03730e07e1cd8b869ede86ca03c577b2cf47e834a0e052e7862b6e73ffbe2dc9958e078e4e48903ec1977ee396cd04b1ee0699bee7170b01a4aed547bd7bf1d79ba27eca3d2ee8f93c91ab7e07ad3e48e289e4a8e9cab58eebb3de808cbe06b7cee160d8b72d1e037d2b7cc04e05c67de624f0ed9c97df3590ec7460ee8124d1a1feb1c7de9cedaed7ef3e06d59e943868e67b18c7b50777dd3e05c44e7360cbe9af97edaa3eed301eefe9ee80a049c32ef0ecd67ed1879a8805cee51f6cd9cc5ec7bc2dbb22b0ef5270ea3587aebb6e74d33dba04af07e80e481adb9abccbf0f43ef2966ef06130ef30e09e2220d4dbd9eb9f2b021c4f73c10e03f61ee12760de4d3ae02ccfea2eff4762fbf1a4b8cf455f0231ea042abfe53ddee5ffcfd7747dcee2f0cec42230d753f0d37b87c2e26e919bb9f46f50f2466f8d557f74b1fdf4943ef4b22df65d00f36b3f8e882e75212fc5c097755a7f8ad28d02001fb96beef08240f67e34b81cefd726a0f62ed0f4ade7f6a1ade70d9f7cbdf7f110fd02c0e79f790f057dcf791e8df43627d57f0ef815cef87a34b8676f74818df82da0f8b42efa5a00f789afb2407f74767e962178f94ff0f57c2792b1ff75e42e03823ff6e557afc20f00a99e80c559f8672bfaaa2feda00fde8ebff2198cfb5227f0140c7ccb67fb4eb0fb219d02d20f76b17dacacaf0690eee565e4bea57f73d98cfa2cb0fc5f1dfe58e0faa9ffc3c057f7d58cf122d0f37cb7f32e90f3ff0f00020c349225f2a0a9bab2ac58c2b13cd324d0e2f95af3bdff0383c09bae683c22932980b0e97c42a3d229b56abd62b3da2db7ebfd82c3e231b96c3ea3d3ea35bb4454166103786b0114d0e3d9405e97c6f7e1b489f105b60474151aa6289030040e4819be40282e3e08b01d5c32f22c703e4496bd810e9ada80a682329db6babec2c6caced2d6dadee2e6eaeef2ba9272c2002e22fa0897eea93efc25f73a5972126f3d1b668e28181e404d2b25906cf755ab5d831af034a49693fd5e367bad27c323b1b6d3d7dbdfe3e7ebeff3f7fbffe37b67080682398be6f130060c99aa650d017a4b164dcbb73ce13605eaf644219c6c232ad20997e6112751351cffa41219466020884f58c68bd902a1cb9a366fe2cca97327cf9e3e03320b06ad58502c20f3384c65f3289d890c39892c108800149845ec4404a5f24c2a4a344e80c23ac62a9d9f33c8ca4c4bd32cdbb66edfc28d2b772edd536895c4287869ad0c8e8b281635e377604da6709c1a4d598240a002500c35286118c9d632284135ea71f708027581dd6e4e0b8f6fddd2a64fa34ead7a356b5ea18ff41d9af07395c949921e73691b09e22bbb8b88bcdcc7a390df2b268e83bae61c28e23506e7d128e6b511b9d445af6aad7d3bf7eedebf83e77edd4f0c8c8ba8ce7e9858bd60dafe8c17e96d053e0e8460fb480f921c6909e821d748c589633ed0d7027ad3b967ffd678d81d149e830f4218a184135208cb8282c8c0d825cec5c6de7c0986e11f7fba4994482a342d78601024e5e11504222a51d918e65da2220fa998b412883e5dc8601fa45518a490431259a491e1f5c8c20c344e959e524fe5d69e87ff1488837cb59d08c37e700c288441796446028c49c8284602a9e4c7439229a4a3e394421c20809c73d259a79d77e299279d1c5ab1a68f4a0079a4a083125aa8a187dee3670a3468b8089ffdeda84da45e8c895761257251e50a3419808d109d06c261a5479419068b1bde914a9860288a82149a8272a514adfe6944a088e29aabaebbf2da6b15b4d2c0641f360af5e614b0ee80c6a8482c85a93459ca9191105b2ad1ffa5988aa5f1e522d6f6802c0ab762016c14de0eb305adb5ea00aeafebb2dbaebbef0a29ee0c8d7a3ac3b2b041b9d019f75677a92ab21e9b0ab710d00b47642b0672b01bd89e412eb137a6d2999b4f4a8aee21e65acca0baf072dcb1c71f83ace08ec896c9af1eeb512c65ca00918b02c0af4e79661f62fda02d1c0ec4a068a95f30c7499a9aa582f3c4513a93310b2fbf64b4681b87dcb4d34f431d752df29e75c90012c760327928134d86d63934fbaf892b43705f1e58f7006a1f688fa0731a9f3427c4d72c3c8cb1b140b41c08d24e9cabb40a4c4b1db8e083135e381554cb40b2bd93167d371873b710762a7b3fd1b20c70e721b40fd426c197db6708dbff5813e40ecc05e2a3fb9d02e542f49dfa03801b1ebbecb3d31ef5e9395bcdf608902b992f3bca327e4fdeaba34ef68b0903712a1caba2a2151a32735237c471b31a3c0d79f741fc10aec7037beddf831fbef886de0e83e2595b1f44deb8e90bd1f063775d492034f360b3126d2eecfc19051bf2b30f8a32cf74e94b1cf7b4f783d6a5ce7be35b20031be8c0ed940f060132448eaee5b88a194f0cbc4b1689c496290f466b6d3e501b1d4a070155ecac0bf60b951338d7071709f082dd2aa0ddb8a70a053e30873adc210f7712c11240af7fe89361e33218a201b6e37d1f9c9c0c94a704cdd5c08547a81b0acf40c26d3de18a7fa91e116b80bd3c18f07f364cff060e7b68c633a2318dbbf861092628ba6219715c48bcc2065520b958c14f363008a2c17ce0c42440b1045554d92514d68415f62190358c9ffa68a80504faad8c6a9c24252b69c951048f8ff881232361d6c52dd47151fe62e212f1589ef9f900919c99c120cb80b94b283279a930640ce348204766815600d8252f7be9cb5f023398c2f4252d2f69cc63223399b5ec640cdcd8076e85d255bedbe2bee6d80b253e8b943178251cd2864a56326c0c66bb84ee8020c51272d19633745d1881f64965c2339ef29c271bd808449f41ea9d78b36615a2a98c519a329ba08825047ad6141e9c13383468e51834f9cd2caae251e1e2e7477039517dd233a31add2847ffa3604f12e8651134f32760304a478aea029b25d55f0c84f39f1afc1109f8930c43c5c03fe445419574f0df45d5c9832f1ef49128ed28518b6a547a7ed482e5dadd500968522b9014a07a5ca972c099875be9540715a46938c5e04c43105496a080612e510ad4c32cb27d475d2b5bdbbad1a48e20a486984754b9a656af35f5162a9d6620ca14537c2da9493368590ab3a0454394533f38fa025c076bd12b34d6ad929d2c651f18d90d12a3aebec9eb46385b8bbdda7511654aa80eaee45024f0547e5d05036993403f271c566fee30eb63fbe4d9cae236b7ba055964e51a085668f6434fede76d6701dacdae9604a1a30ca358e8d8e4ce1614c57442569530ff5dc8d2969d69fddd6ebbebddef0e2eb2051d4a70b1345c2a94f73dcea2ea25c84a82afca8306f03dc26b4be0d24b14f60ae35c4458111696e8fad48bb5fd5571c16be003237842e25d2e1ca892de809d770a0fe6c771859b9de6f621b07db82e53a1cb85fb2e22b1d35285880f8752040420c52a5e318b57dc5a25b4534d054e308d6b6c63d58897609c885381d707bc08e7a2c2e6bdf00c409c84de9cf608b28a667ead70d3995521b69b5ce65dc120e459cdf8c65ade32977f9263062b810013962390a330667d5c19c24496c17ec994a13e6c9593f825c37cf3308061e2f997aa909e89cb5c3c6df694995d1e34a10b0d971cebf81275ce305f5bf2e300ffdb23cd9e5cb30cc6c39745ebc0bd4aad6a18a43c46ab7501d1930e68a0ab6ce853a33ad53841349895c65eee12d2d4145e6fa3f350df12bc98055b6db50e52db6196b2f6d332992976fd5c1c5adbd6d8aa5e36b39bed0b7efed5d5b51e51ac61cd326423d7969e2ec24c936c048992c0a0731643b4854d0d2a5b3b0c924e9ab29dedee77c37b68b25ee7a75feda8470b3a1febc660beab8b03e63dd90826cc1fb0bf60ee98dcbacf90ce36a98bbdf078433ce2120f354521496d0b377c0c67d637b6313eef1104bc082ec2740e38dcbc8277c1c807e744893d9a650183b0d4e99e38cd6b6e7387e71be663b4b721622c85905f9c4a1d1f72bebdadd512f03aff07fd6d5b4dbb20ee950f74bbd41cc3be9b20ea9b633deb37bf3a042cdecd6907d50c5c0ff2d0a9e0e31ab459a62430fad66ad0aa264f81e450a7039f5ddeee1f549d752fd73adffb4e68aeabdc685a48fa13d1d02a49a6b4ec6aa65e0db8998430013d079a2638a7bd40f8b9576b0b4f9f3a21145f95bdfb3df4a24ff0d8e5eea32d2403ee58307d7ca57a099fffd4f35aa304eb57104019d4de08aa8742ae319f0462a33719c0f742de8330f6d1233ff9351e3bdbff84faa68b818c779c2ad8d11a7b3b8fe0f22c183e0c526f2adf27e3f612f67cf5612c75c2283ffdea4ff5f1732f932d387eaea0f3beeb972ad08ccbc0df2d2847f35b30f0ee439f16e8ff1ff8b51e16f4de11f8dafd515fb23ddcfa39e003ead6f1f51f769c1f949941deec5e3314dfb1c51c0d945b0e7443e4e140dd9100fd111f012643cb1511ca7dc1061e10e841600ccae0311d1f04b85f3c6c81085a4a191ca011c01e2eb8e03e75e00c4ce00a50c50d3ec0d295600062c1e6a1602028e19f8d551904a13b35e00c62611666540df6200e6a813f715f17e8e0ef4ddfebe5d102ca80f6a94001a4dd2af980097641fc3de186694132245c29e19fc2e59c16f2611fc6530dfa96e06941e0f581f879811c3a5afdf5dc199aa10f202270fc0810c0e116a8e11ceac0ff41c100320b1954a18cdd9d1f8262282e500d1e4fea506232906016b4a1052affa26ce1211aca8013ca8421c6c0246a41115a621180dbe70de109f6a21e7e9c280ae3309a112906a2c570413260e22da2e24d7422bde5614ba14b1802a08759c107e62212d0e213c822387022f9f10d0c12e33892e3c79062294a9b50a9023566c1186aa3338263e5c463adc4d94231a1156862364a5e1674a10edc21cfb962597d623912644172cc391e63ad70813f999c00c663a43da414c26213fd492a2ea13552c1b6e9e36d608146d2c12e96df915520a31964499ae4ec9c63a209e2202a6343c1034e3ce3f5011a42fd490256230b9ed44636e215c0c3368696fdc91ce79de45012e5d3a464250e64d9c0c30fbea02a4cdeacfd22d14de429f9880a0affd23d52c123ea2412346438aac23232dc54dadd151665599ae5a1a4a44a2223ba35081878e4f2c0644472e04cf20012c2c13fd622564ac12a6e2512e06513f8d30330e52d45259625e5592266627e475a22e51e3e413f961618606347c465612e9e58c2803bf69510d8e215e0621114409e89e66826034836c15b024ae759262f92a562bae66b3e485aaaa542724163a64b0bc20358a2995c36d26ada1783104f673a992af82403e2d3eac1834d4ae54e0625fac1e6734267bc14986d0a25166865e61c223c74e53ec4a4ce45239b61473dd6807056413e729b0639653bc2c3d53c0e6f8ad16146677cca674fc866d7658c1740660e0c80694241373a173cfaff26bf61260c58dc53ca00794e016a1e81780224f6fd647b7d8182f2c64806dd7c5ae885e2d88c9d55db0d5e3c2c805536c167d2974e74e7f544647e22601320a81444938162817bd6805dea40060201025c67d835672262e88ef2685dd4a77da2cb174c668319564c282777c22861d2250f48e847aaa85eb226271427ce8d5b4e26271768e684aa636bf668977a693ffce88662082382020180a80f3880792ee84e94e8732d69fdc8c45fe6254642015fd2013b624134c969105067114ca91064a9960a24977e69a11a6a3bfc28903adf17c8a83ff2670fa0e88cb2699242e38066a64c6ce79ce2e41410221d30a80292937ac604039c690f20c090e22895ceffdca1b26aabe643a28aa8737241ac2ee89fa62102b1278952aa4c7e2711ca8401ad281404ea3e9641321c299fa6c5001c6b0d18c08d06648e92a4ab4aebb4d243a2da206d326a5a14c0b266dfb0bad9a406a83c862b48bd9f1304eb1334aaed89dd9e6901aada1ab7229db78ae4966a859ed8ebbde2ebbd0e26b5f2eb7c5a2bad5628338a460134c0cb1c4002785daeeaeab84a24730281b3c2818b1e28949ea6f0551b0575687812800380a8012800c402a5aaf6650ed068bf9a2c865aebb59e9ebca98598d90900a4ebe3f5449b3ad59b3a09713ec1b93641a4ae61c358aca8fac80200409e0000c872c29e5addc832d7c9322db5a62cc07e9d5b2aed88ceffecae7aa7a59a4f3c3caaa6569e71d6081ae8ac1024e4d4ea009eb21bd9926cd3aaadaba6acca52a018f8e7d49aad7a31ec5cf62a0da8e9253e06c572a62ac0abd7b6253fa2ed3bb2e5e0a240c9ae6de22666db06e698820102c4acef21aef058ad89d6ed08b8ab1164eac4d2691374aa9356138951e8e04a6c941aae0a4caee2aa2e51b6edd88a230934a925222ddddaacd9b927d4b240145ad5a6f6e757a641dee86e13b8eee07e28809d2eeaae6ef2a2ac38366eef8c01cf42dd7e9a05cdc64010f6290b94ea4d762d15442e0a586432b22ba89eaef41aeff11eaef2a2af7cb66dd9e4ed0e8e81bc625ef05edbe50a61ed7a02b4e42cdffec0f5aec0df5eff41e6ea2d17402fe60dc0dc8ea5f99e6ffa2a306cae2f3a962b19d8e8e0fa2f54daefa8616d0cc4adccee6de72a564489c3cfe6a0f91630cb1e6fea2ef009fb6103dbe9aa7e41044fedf776500593990c17193a4441d8fe0000e7806e7641ecea80ad3a810e83df0893f0e99a300a23311636f06cbea415b5afb9c1700cdfed0c4fb13d2a9a24e8ef1b86af1a3cb10b78810b932d1117b1e11e71129bf1032e31ff722819184017db50144bf105376cc80a8110ab001c6b6f95daaedfb2811d47ce17fbb1b92dc0d6121802a740199f71222bdf1233317ca68dd142715c506fd6d2af357082fc722eef3641062b01210b703260f213c0efa7912a261972022bff722a132323abb1e39e01185b221097211d87a5c3c209cb613107ff002407f01af870c91dd15622b2f19d322aabf23183222337b2637601028cb2c50c4028cff222bea22d0b41a3ce6e266f2f14b4b2f70e821bf76c182400381bcd00ecabde15f33023f33ad79c32ff72bfb0c10033c80218704e4c3257d130866d662e6b7210e06eff0e4220af80274741b3e662291b5e3163023b3374162ab3a2beee08f1b2c56c2e4fdc7356e4730d1b423d6bb31e4b8140ab00417f32ce6adc1346f31a78dda7a97343b3b4bb3d3450b542f38242019c733f5c744555725c61ec14e0309c0a8c29bc730b94ae1518b4ef21b41aa4f418ad744b33b5aa3d3444132a2526ffb5120cc0525370158b6b4657cdb050414f5b6e2ae0b10aa9c2a7ce6af7c2c302d4b4e99aaf5537755bff5d44e3b3236bc3546b6ef6fac44dab9656cb00644ef055eaf2cd1e674057aef00a00390b4c5fd32b02b3b55b33b6963d35044cf41a9f4200d0b5ae098048dff560d72c56d3c02f63761e8b561544360e7cf616c8f30354b42a268059ff16628feed42e7663cb36e9c1f53dd5366c118061fb6502d8355be07577aa6936efee360b6f4b9e4250b38070efc133db1901703482a4f36c4bb7cd3db6db32f31a240003e8761d3440694faf6657afd5066a6a5b713ffbc03fdfb12b6cb7775b010264f776e340016cec2c5476eac4f674e3777e576f03b4ff4a01304002b0b77eeb86009c8b7f2bc0730b78822b78d30440021038c8de99980540802ff84d188083330075086d03084000f47685837888874c8bb518858bb8591c0089b318829f788bbbf88bc3788ccbf88cd3788ddbf88de3788eebf88ef3788ffbf88f0379900bf9901379911bf9912379922bf9923379933bf9934379944bf9945379955bf9956379966bf9967379977bf9978379988bf9989379999bf999a3799aabf99ab3799bbbf99bc3799ccbf99cd3799ddbf99de3799eebf99ef3799ffbf99f037aa00bfaa0137aa11bfaa1237aa22bfaa2337aa33bfaa3437aa44bfaa4537aa55bfaa5637aa66bfaa6737aa77bfaa7837aa88bfaa8937aa99bfffaa9a37aaaabfaaab37aabbbfaabc37aaccbfaacd37aaddbfaade37aaeebfaaef37aaffbfaaf037bb00bfbb0137bb11bfbb1237bb22bfbb2337bb33bfbb3437bb44bfbb4537bb55bfbb5637bb66bfbb6737bb77bfbb7837bb88bfbb8937bb99bfbb9a37bbaabfbbab37bbbbbfbbbc37bbccbfbbcd37bbddbfbbde37bbeebfbbef37bbffbfbbf037cc00bfcc0137cc11bfcc1237cc22bfcc2337cc33bfcc3437cc44bfcc4537cc55bfcc5637cc66bfcc6737cc77bfcc7837cc88bfcc8937cc99bfcc9a3bc901cc068b2fc2e710102b43ccb7f3845c4bc680ef513ac7ccde7992b1880ce0f138b8f007ffb7c30bd45ce0f3dd19b82d01ffdd2f7929c28400000ff3ddc32bd2ff182d24ffdd5633d30457dcad7f869bb0c17b076120e022787d91778bd60b6c23356372c9c7d5aabf518f9b70070ecb3c9f56b2baddb73bd8883f40a9037103037f2b6c1b9b8760fecbd0af4bd2fea3581def62c147e0a1cbeddbb8e7ccf7de02f3e309a2fdee73d88c3f70328379a8ec620c4c3cc03c1e6777e35d33231d73d2e90be29d4777bf1364a57fe14b4bed2607ee62bf85999384178e11a604fe9e39d4ce4fe1e273ee50523806aed20cc7ef4d4be2746754217f3f2dbbe7e93fd4e15ee46c7b376f28c4c0c7e2d9ffef6a4be2d4c3f1c6cbfe5cfe1028c3f3a37ff19247fc6407ff4e3f7681741586f4e4ff6f1527e01fceb80fc8bff2f35bf3d083ce24896e603a5eacab6ee0bc7f24ccbcb89e73951f77e0bd00987c422b190f8295d412371098dc29aceaaf5ea0c48b7dcaef70b0e8bc7e4b2f98c4eabd7ecb6fb0d8fcbe7f4bafd0e3d608b83b261bf53570078d277a647a86378179058a22545e5888247873869b2482789d9e90460c0c69958e933ea894a0859cadaeafa0a1b2b3b4b5b6b7b8b9babbb0b9b904a124a36e0596089ca80e6fb2b126cd7d8b90a750ac82ba6bcdc3c37bdcc2d22b0b68da51bde5d7e125d9daebecedeeefe0e1f2f3f4f5f3fc3d0fd4d46808a30e7804a011a7cdcf439f3844e09392bf67a105c66509bb9892316642bb3b0ca388a1c73246c0832a4c891244bff9a3c893265ca61dc1694b986c9c19c06a80ea061b9cc2523845b323a51a902e72f9d9b3a4e1c90e48c4f231b8d3a15f111a8d4a954ab5abd8a35abd66a7fcaf91b830055c4374b8b143bd3b5dbd73acf3045ed51f609d0b4dcd6ca89fb144b03a59e9ae6edf876abe0c1840b1b3e8c38314801e66492b9d109c01c547bcf302ee7982dcf487d815eee96f9eedf723c3076c68577b42ac5ac5bbb7e0d3bb6ecd93e20772b3d86e6e9376d63a2b1cd0d379dde8e02d348ad432af065c2e320576da43998e738fc422f679cb6f6eddcbb7bff0efe55587367c7107774918d025468c6972b3f7c7314ea2780baef06dff9f5e064e89bb0bedf32d985476081061eff886082e1c1d44d7a5f08e58840703c3489646730c88d83bcc927cd6e2761884d5101fe925418fe9500e088a80ca8608b2ebe08638c32d6c3cf44128e41a123d2ad314827379651a3393fca71de6a9c75025490e50c49968abf68782426293ae9d68c565e8965965a6e590784dc5838068880e4b7c6259840f9204560ce5124202c4ee1a1495e2eb3261c2752594201767571e70853e299c89b5c0e4a68a1861e0a235de6ecf9859993309a86987b902986a25e69064d4f719264a95a1201da49655ff429c29fa0ee2128a2aaaeca6aabae6ef5d944a185d1a36f6ee886c98e61c4da18a6554639894abc62f6e9a993a0a9d0a6b3907a6aaaaf3e0b6db4d24eff5b0db343882a06ae938ca5c67289cc3a86b542601b479ba86a8a644ae2ea40ae1beb525927ba52e6f2ae93ce528b6fbefaeecbaf19f74d44a9170045f6463f67fc4b9eaf93dcbb02b32921fc5eb1c61637aab2b2d4ab22c3fd6ecc71c71e6f3c70473691c15e1be66241541921733432911c2ee1304a2b53d4729313575871baa8dd4cf1c73eff0c74d0f82a4911935fe49808b2620c4b08b762106d637c9902eb484a500b295a64006ccd75d75c7bcb91d235c4bcb3d65e9f8d76da6aafcd362842bf0d77dc725f592b47c890b19e8f6d204d88d85bd44dd1dd2e4f3d9fc520013e91e036cffb4300093400762aba26abf32d64cf8d79e69a6fce71a713f9ffe1c9e4c274a209199e9b23f5af8557ce695e59339e8700887b52faeab0db7239e7baefce7bef5ce6ed14b85fcc3e291b8e2622ba17c01b253c1b275fa1710ab98fb47c47cda7313d140acc69abbcc1d26bb8efe28f4f7ef9b261cc2e909e404a86a4589468da53ed9afc32e5b78f847e0ef3ab917d1eef263fb6f0bda27fe62ba0010f8840aafc25656198d9b7d6a02d47d48c647961a01b9e6785e84180800d59a07e58c785ab3922603fe0202c4c98c014aa70852c4c87034546068801c2698fe98405c5f042960d4e751d0261487248333b095009224cc4046136c456a0b0854c6ca2139f3893d1c02f0c91c342bccae089fd812182469922fd08d7c3fbff85848b1df122ff92e80304108f10d7830b1a4bb14428ca718e74ac6314d698b832308d1a69c060153448033c9a437117ac5f09dff80e41968390e040640dfc68051a9ac2917788a31d2f89c94cd2f17846a9dd174e8705bf6d618f7b4003273be2c93540d2081ab4e43b4ec99154a2c1953e28e21eae78481f2e8b929aeca52f7f39beea3d059030e01e168c2606beed81916210a6538809855516a195bc5487338d02cd5c8ab10bd2340b176889077002739ce42c27dc94d9114986b01300ec8231af804c30a09323ea3c433787404d5dda639e14a9677faa39832a96d27b55039f3ecd89d0842af463d7b9a117dc67051236ca1347144343cb65c8491e94ff1e177517406540ca3d5454a3dbbcd847178ad294aa544bf75c06fbb8004b2cbcf4a19d90a8175afa8b999a01a71e21282948c25383b5419c8f5c914f09612a71ac74a94c6daaa1c8f814337a41a056686317a0aa173460b58b7008ea398ecac7916cb58c1edde8168c4ab59f96ada44e6dab5bdf4a20aa72a49d50186b15fcb905b93ac1aa5dd0eb44e82a06af9a209f6c9d875fcd01d89c1516ace74a2b520dba58b84a76b294454c4c3b5906c19200975e90e11e740ad300c9d29e1975a359e17159549635b251e0a715a46a5ad6b282a895adad6d6f4b12881a45944a782743324bb00b8d88b75fd02c0908fb3d91e8b623c4fde6496310d22be03506b4ff15916c718bddec6a371eae4d6719ba6b84e6f620ba5588e7d14634dd30187704c82da848c0dbcfa13e1706e4bd2b6395bad6e46e77bffced6f3b7c6b84e51281b35cb8e631e377ac9b4c42c043203070c188c4d3be03c04560b0101c2c86eacea0be4e48ef0b34fc3afdfa77c4242e312c8c0b80d41a01b47960671928ec4dd23a22c59860b17a4b1b4009b703c52a2e828dbd00e218ac57047c95419085a863132b79c94c26835d8bf00d4516a1c85090728c2be5e2333c9908519e0495c130e407b457ad20d9f210baec882ff369be2f08f3981f9b5ff73679ce74ae33180e2b042dd8d20989fd819989f0631f587808b0fd029e75a0e749f4999b383e0eff9b6b71e89eee393aa278740b068dcffb5e21a99bb6b3a73f0d6a1a78f6b798c6814da500c42ba8b907937642a097306a8d40a0d4273875601b3d8323d722d63f99f5246cad5811efca13e26d98a52b9de4502b7bd923a6b5092cd46322147b06bceef018229d038782c1d92580f699bec8c3085f571ddcde6c0aa23d8469db4fd860e0305334fddb389399d9f4aeb7895bcd6515587908e685b71130ac846a1bc1c350c0f799f53d897edf1ac2eb96b33d0c2e0483ec5b080a0fb6c3c300f121009bbac76e64b2ed0df290bb15c6994e41c6730070ed7d7c0643ce663117a68293e320e5c5c5b5913b0e0b92e739e6383be3ca633b63e7febc0eba16b9d18fffee4b50ca3a05e52601e8bedd6e4c8cd60b4aef35d3c7cd0537fbdbeaf6a8fabbafceee7f0e9d069e203813708e3db4237ded6c67a2bb2fbc02740b61d53e9838c54d8409660e3be82a90bb0ee82e05ad3b36acf678bb0ed6e4f71c005edc616734c31b3eef5a14bded94afbc0ab17d82b1d85d7fea537418742e84424f755b2cd83c0eb4681e9b737cecb8c0bc09343f09d44f07ed7f96cbd6bf6e39b55b7ef7bcd79dc089800e99d7fa2598d8380dbc6e84917ee1f725e7f9089da77a38b1de16ccdff90a846f02e30f7ea06300bd10f4aecdc6c762f2bd2fbff93397eaa5ab20fd4e50fe16aa2f8457c7a0e9154103fb719f82fb17c1fd377e3c49c5ef0efffa677beb8709fc076438477f24207a39867595a47be7078111c831d857028c047f39507150e07a26b0782e408125207b5df0812360819890818e176e90076734320925987069377d2f607a3a207f67178348d68012a8833b183433680246b38124007e5c60783a607630108424d0813de0832500842da84ad1f7610f88074d48024fe80843687191d7054528048b368537b83800c8836568863f837cd2e602b5970353270569d8609d258630008742e0206c88036e5873fe077417170f75a8037738097a287439180380d87cb757049c166f67e8888fe833065605a9248089f87986c802eba5855d20894e408929480682673b64b80e9d68049f08737c3187ff106000de077707b88ac8868990488bb5482877a27717787adf0575a36482b304852ea08b27108237258536388b92178c2d308c26508c8a38805cd08a68b566b1e871c9688bd9a88d30d28c4e888493a06d5c90800f7082ab274107f38b2f908422108e60768c40408575d08d57f88d8ed08ed5888d29b03da840738e668d3e978fdb289003191e9568873080873860802de6795ce08ac377060619880859807df48e2c407ead20913900250979020bb97df81578eba26ef0f88f3088096da3922bc936cf48902f09930de19125305a1b89030b1805ebf800dae70288880360e86783180336790238997517696c27590933490235890946398a7ed803089000ffef7284e6488a4ac433ff16935de995246185241803f328964e56635b608a46b08435109622308464e99616c9870c9895d5d0960ff09679a78ad715007da90090d30df7a88284873b5b5904fdf89589a998b7907838d06f3a49884b40941cb80523380235e8038d79028f299468208a615497bba0993f68039d896086e98920f97f526952a8f98a8b099bb1c90b695904c8c294c08045a427057789984b409b6a1803b739022549039fc978acc90ebf996e32209ccc6006f9331a03409cc8189a95009d1dd19bb2a99ddb2907f025046e389925709534e09d87270570498e03619a30109e24309e3d609c83c97df2509e6d3803ed3902ef996bae798ad3499dffc87942fc699edc49a0055a0a7a2903e829982a579d2c809fce7906083a9698b0a08187942a909107ba8c30a0a0cf29a043209da709a003f4a13367a0278aa271f0a0e9b99f8f4206a35902d3e68585607fe978732eba53172a3df128072b5a717d8299fe58a2b5e69f611890ab35a423909d29caa44d1a9493b090335a94657097e588910d6906cdf90051fa9432068aabc985eda0a55cba60229aa47819a47439a2ae709d1cb1a44e0aa771ea0277096ceb05943460990f70a75d7a06745a54581a8a3aba413c1a077e5a9cb962a6253a00560a9a6baa9567aaa4722aa993fa03304a028025752af36b50e0932790a63460a92380a9eb997a7329a40d6a0bffa12a02a3ea0891299fae49009fda8761da9a90fa006f4aa9b97aa2e308957d52a42c809e35a89c3a50a151c0abb3ba07bfda02f1197e8eaa0bc7aaa680a0ac187aa604a09af888aa76d0a66aa2abddeaad29509f39a09a524a9a62f74044147bea09a5e365a3a5faa5c84a98ee10ae0ac9ae2f182e67ba000d30add277a4f265abb7faad014ba90f997d3eb05eb82a03c39a034778972ef702049b27069b92396aaa2ddaafa500b124607c076bae675a000a20ab169bad44f7af002bb027eba476fa039d10b23dd9736944aaee8a3c2b7b96815ab1377ab178a0b23ec0b2f75ab20320002d6ba4236b5d908ab0288bb402a9a550b9a35ef6620dfaa09bc805ff4bdbac80b0964226a8196a07540ba67b70b5ff69ab8b9aa8f14a0bdb3a11479bb4695b8b3ab9a53f40ae2570a73390a7c4f5b623c0b41a58913e50b7a2fa60ef1aad2be80e6c7bad10b0b7abeab3255b1183fbb764bb4bff8ab66a0bb966a8aa3ba904ebc5933d9080567a278a5ba9c557b99e6bb37e7baaceca98a02bb19b9a61884b935f7ba54ab997461bb9b1ab98e308869dc0b9a206a864f77cc295bb3560bba19b8a5149abd540bb4bf0bb78a7ba2570b7224bbad659b28f2bbbd16b7e79fa00cb3ba8f67a6dbb5b039d0a826840bdd6db278cfaa7a2cbbcc3cb0bdf7b9c8020be389bbc763b7baeeba18e2bbdf34b90194b029cabb03920b55050b8ff3f96bf27c0ba3160bf2380bf12da7fe4cbbecd5b0b032c0205bca1b0d8be0ab88580ab8cf24bbf176c8bdc1bb14ba0c12802bc56cb6a44bbbda6fb031dec7432db33c24bc1ea60c22270b9ac188b66ab1afea9b5c068c1188cc38e58b80fe0922dc0c00f10c03eec08e9d596fb2b053bdcc32cf0c341ac02ccdab58c5b0d481c054b8cbc11acb1215bc3af7ba6d09bc35d5c6f6cdb81f34a8cbc980829a7aaeb5b1bdda30462ec8c281c28d03804f000c6ad8509495cbe4d230079acc77bccc77d4c005c530e760cb62bdcb829c992878cc80020c85eccc821879e0f10a4ff0b916192950fbaaf2bf0c8914cc27b88c058a9c0b290c95120c905fbbe016900ff0a70975f05c742c088ead7c8af0ca7e358ac2dd0c20dfca2093603c2f9c28246a16f78bcee78b39e6cbeb920cbbe9cb7102cc22e1000a96c6eab9c1c9095ccb02ccd2f49bd8b1c147c3a066df9a33ae2bd75bc053f6cbd32e0c4f03a9feb50cddf8ccdd8fac934a0a5121c929d266f843ccdf3ac9da9bc966c5c8165209cede4b47daac64b80cf42b8709dccafd15c0af6bc05015d96c8bcce34308e23b0cb4d9bb30069d0f46cd18f58cb908c96994a06f8796ac625b42f90d19f3aca3439d0c1dba8c37c0b23bdd131fbce8d982dd498bef23c7e847ad1375d79254d02b3ecb204ad04380a033afd003cad0442cd8ed218ccf099b5369d06463dd448edd3ff09acd22f5d05463cc8505cd3f08bd35b5d797d62cd2bf0c35f2d030a6d550aad9fa30b08629d02617dc0283dd3580dcd84a0d610c0d60c3dd55190d12210a4591cbf13cdd57f4d798ffcb50a7dd47833c432d09697ac0282dd0584fdd4c01cd526e9d770c0d85ce0d8443db40d1dc27a93d2341da05a0dd8a10d722baad105d6b36360c20416aaae0a05a41db24e5ddac698d4997dd7b3e0da9c78da8558d13030b922f0a67c3db6e52cdac3fd88d48bd9b4dc09e11c48c8899f715b03c64d75c90dd96efdaaf0ac0ed0dd0519addcad3bd92ac0b67addd9704da2a04ddce5fd69a93c0089ac3659360696d9918eb0dd6c2975ea9d36ec8d82d45db59e7d0bffe84ddf6863df54cd756500db401cdec25db64c6dde09ae6479ed24aced03f8194f2772bb3dc0e02ae2e0583bdb576de0ba50e12372e11a2e9265d0db3c5ce0215ec1ddade029de64034e25974c9693638f68c0e24e52a4e3bcb81b9e0b33ae22d309dc10c0cc4bdae387bbdb2a4ee475e6d88072d6058d0501a359733dd6569ce42960e368addfb570e47892e43d7ee5256edd8549de450ee6db65c58f3d067b0b2942edb02e30e6c7bdac4bfde568b0e6ea5cdb474c516f8de3598de261aee7d945daa012d22b60c2c213d01ffee0631edb5b30e5772cdeb4d0e78022ab3d9ee820dee5273ee47b6ee9fbd5cea0c2c4609d084e1396565d5786ceba912eccff553e0b990e28570be99e00be086ed7a67ee9b1de64cc0c2ace1d0323182fa18ac64c68e8b62ee56e9ee76a40eb8062eb3dfec80f7084419eba6f2eebcdbe52230e2a112d03f4d702f839e13500ed8022ed4d0cec950e07d98e27db1ee46567e7267ee0cceeece9ae503a8e27971caa17719bdb3e03ecdee2f79dc25c0ed3ba40ef34eecc39b006e45eddf97eeec1aeee05af50577e2abb5e9a84302449e8e43180f0a0a2f0bf9ee192eded6f10f180a2f0e3fedf376eee857cf1062ff228f5c313c3c52c709bcd91660a66e8268be8ddaed97850f2c682b01c3fb101efca941ef323cff34b156613f3e7dc4e08f0a1599ed9f297799415cfdd210f7d477fe8ff381fe066e009d9a9ec55ccf43d8ff5be84eac6b2e9d74c086b51b727bf864e4fe02faff44949f0594af64b68f30fecf1933ef0579ff5737f49df7d330fdf02019d19013df10145f66a4dea4a3ee7ad60f713f3d56d7fd8508f7f3a3ff874eff80805eea722ef2fa0d30661bf8a7d6e644fb9661fd94bbff3c640f6118df89d5eee700ff29ffff8a98f490fbd95d71e0396ea6d439f0c9adfb6167af6d48aee61c0fa3c33e1abde09c9eeea720eebaa4ffcc094f1c6d2f732f8534de7eb4faef90a1ff8b43dfcad70fc09afc28bde057d0efcb92ffcd85ffcdfdf4b33cf33a0ee03b7190ab719df3420fe3743fe9908f38d5f09eb3f31ed2fd1729f023b4c64ffa52ff0a70fff20008923599a279aaa2bdbba2f1ccb335ddb379eeb3bdffb3f30281c128bc62332a95c329b4ea6e1219d52abd62b36abdd72bbd4a0c3ab4d4000e22c62183db3dbeef7d7168063033733ddfac4adf3fe3f5c0d1ee083d120a09dcce1df9e20a15463a4e42465a5e52566a6e62667a7e72768a8e892c0a3e9695d905f0384df025129aa2c6a22cddc632dcda2dfe848ec2c30a2aea9d1e9c1cc6e5e6f325daff33374b4f43475b5f53576b6f676c942f0f76a10b318401f9c009137f8ba1b6bcd2d612e32b1b33afbbd97bb22fd50187fccb837cbfe712b68f020c2840a17326ce8f0612804f82676790544819f047e0c0c9148f123168bb64cffc9dbf7c89947902aa7880448100801532d61047433f024c49c3a77f2ece9f327d0a042816824540000d2a44a97326dea34a9a9633fccbd2990670091a2808e3eedead569d47724efbcfca4f50fd7af6abf86354988c881530c86e11455b3cdd0bc7af7f2edebf72fe0c03d62125270e4ee193240acaa9c3b843020c3861e299e014f980dc4679c41fe23b988662f9569961d7c0addbcbaa1427b11ecfa35ecd8b267d3ae6d69c0238e467efd71fca333c5d1407013d25d84b71fdf322eff29e9527528e2808cc37aa4fc05eb2e439863760be8e65bdbe2c7932f6ffe3c7aa154af22e14e072bd1955283ac7fdffe117ccb633397e6541f4e7e45b807606ae1ff01810063fdb1901d17e07d971e84114a382185155aa80472795c47c47e3ea444d14c3f6448c786437418c3807038471a749f8c084789429ce802835b0481803d8f00e0488b9ed4a8c585410a392491451a39de8f587c361921a8fd90233efa88f3c892a03de2248a337ac7c828495e5125115e5a81258d0ada80a32c606267662662ea71249c71ca39279d7556f3e11fd41df748883bbc08ce8a3be0b951127fbad1670b29be1168993d7232681e7a564708a22ab859c50f0148670c8f06aec6a69da18a3a2aa9a59a1a833f80046884a26ea431154844a4fac7aa029af26a96b890e5e826b3fa512b11adb6816ba39ee610c0a55954da42b25338c8e5a9d1ff4a3b2db5d516099c864b98221c0f9bb213230fd892a82d65fae9ca1faf9a880b23b98470bb42b3901cdb4082b3bcbb66ba9ac45b88b5fdfafb2fc001f755af1f6a86f9080141304091c13c109c47c342c49bf0725a3ed7a400196bbc31c71d7bfc31c820b7f0301d114f4908c5f8621cf2c7042445b22c0310bba51f2cdb7c33ce1c170b48ce3dfbcc32a3020b3d34d1451b6dc27f7048ba2721c0ea70163bf30191f41b4b4faaaab9f1ecba52302c50ed86d54318da86d329eccbf51929d385f62c3bb30d0c9947cb3d37dd75978a91514c08cb46d837c4854f0144e0bd95dea6f48dc2de6704bde0db6daf30385a85e7c662e3516f5d79be239c8d391571ffdbfd39e8a18b0ee1c44d98e2b90e507ea33610a533717ac5e776caf98396226cfa9594d33e0beb05eece0bb3bf9f363af1c51b7f7c60db3611ef8e4034808f031c96cb04f3b16b8daef0caaca03cf53aea9e7dd333fb0ebe4dc193ff07eac8abbf3efbed6be3ab1f52177a2b108913227e0ff0e7213f12630f9bebf566773e36ac407f74e0df11fcc706fca16073d94bdff7062806b749b00d10741f0633a8c10d5ae279796b82fdbc103d20dca37942f020e140688a11be20845d581cbc2a881715a030722a7c040b1927433a2c2b823b0492f97ec8860b72b088463c22127b00b337f42e09a668a20e16b60e93e560896e80e2119e08c0eeac4d88365281ff15db80c562dc8e825ee4c2000ea7b23366c18c6cc402119328c739d2b18e22f89bbb9e20c514fe0072c150a3dfb8d7843ddab08516f3e11b9d95023c02e25e4720a41f02e7c6445ac19134a3a4bc7488c92cc4d18e9efc242891e7c7f83d6194910202238151b61d98f280a5341c0c5cc80518da6e93984a412be1804024e4b26a93b4e5182f89c95f6eb293a13c263293593448e641924ef85a1ba85883300222983960261d9cd90468b2419a2390e5166869365bde1205d8848336a1600a6f3a9073d6bc1839f9a5c978764e99f6bc273e87a6c53d782b5b3001872575b0cf27f4735c86945d17c9a982813aa1a0ec0a223d1fb000060ad096c4c4a431f3ffa9d18d727448e01c4323ce19082018907e42f86816026a04910ae4a0014ca84511274827b0b47cf38c2703285ad14d5e949219ed2850832ad4f1d4f00fbb4c422fdd90431e404a2644282a29f790d4362c5505284d05f6e29902a8eeaf11536543554fd0ceb7bd737c31bd69447f3ad4b5b2b5ad7c515d3623c1cd3348a907637d805a65005774cad51475b5ea21d7a85014ecb52a7d7dc45fc51a516f9a95a7108d285edd2ad9c952962fa9f443598be050c35e2418e2a4c165f39059226cd60de9042c421b3bcc1384960ea31d4269db705ac592b30080dce96ad14acfbc56b6b7befd2d35a0961149d4b40d47bdc15cdfb0caa7cd548f6d61c155aff059ffdad21305c2cd834a1ff9dc71dab2013acdc15dd1d6d344f216b8e63d2f7a35515c361c17a9eb0c426c0d2a84f59ea1bdbc7c6fa2023b5e219a73bbafa4926ebd0880e9c2d4b101266779d3abe005335809f13dc36cb7690a70e1605d7fc8ee0d1e2c8608abd33a2e88ae15085c82f0720d051af6028797905c2f50580424664701300c5ec8ee978d096e308e73ac631c80b80aaf252d7e82705d40d8f7063da6c28f611be4fca65698943cc191a79064219cb80bcb2dc31b01105689d1f8b169dd3198c32c661f28303194a0af1844dc82a646f26a8d3cb37ebf19e70327f2046516838c571ae717cfa2000d28b20ff81c2b2fef76cc863e34a25d50d83700fffa085fa56b10160d87c4f640d2c6a5c4a3c540e91244590a6ad65c97bbe15fa9fa3586325c40036edbba509b1ab252b871a2632debdeb299b3935871458270e7336c5950a648718729c5e497aaf6c925a8b5692b816b2ef450d07e00400312d0682e47b4c66784f5acb3ad6da10e190e5356f223a61d4b546485a192a87217ecdbe9077cdac5ac1641b799789b5193c0d91b464ac602a0eac3bc9bbbae8eecb6032ef08113bce0063f38c213aef08533bce10e7f38c4232ef18953bce216bf38c633aef18d73bce31eff38c8432ef29193bce4263f39ca53aef295b3bce52e7f39cc632ef399d3bce636bf39ce73aef39df3bce73eff39d0832ef4a113bde8ff463f3ad293aef4a533bde94e7f3ad4a32ef5a953bdea56bf3ad6b3aef5ad73bdeb5eff3ad8c32ef6b193bdec663f3bdad3aef6b5b3bded6e7f3bdce32ef7b9d3bdee76bf3bdef3aef7bdf3bdef7eff3be0032ff8c113bef0863f3ce213aff8c533bef18e7f3ce4232ff9c953bef296bf3ce633aff9cd73bef39eff3ce8432ffad193bef4a63f3dea53affad5b3bef5ae7f3dec632ffbd9d3bef6b6bf3dee73affbddf3bef7beff3df0832ffce113bff8c63f3ef293affce533bff9ce7f3ef4a32ffde953bffad6bf3ef6b3affded73bffbdeff3ef8c32ffef193bffce63f3ffad3affef5b3bffdee7f3ffce32ffff9d3bffef6bf3ffef3affffdf3bffffeffff3f0006a0000e200116a0011e200226a0022e200336a0033e200446a0044e200556a0055e200666a0066e200776a0077e200886a0088e200996a0099e200aa6a00aae200bb6a00bbe200cc6a00cce200dd6a00dde200ee6a00eee200ff6a00ffe201006a1100e211116a1111e211226a1122e211336a1133e211446a1144e211556a1155e211666a1166e211776a1177e211886a1188e211996a1199e211aa6a11aae211bb6a11bbe211cc6a11cce211dd6a11dde211ee6a11eee211ff6a11ffe212006a2200e222116a2211e222226a2222e222336a2233e222446a2244e222556a2255e222666a2266e222776a2277e222886a2288e222996a2299e222aa6ffa22aae222bb6a22bbe222cc6a22cce222dd6a22dde222ee6a22eee222ff6a22ffe223006a3300e233116a3311e233226a3322e233336a3333e233446a3344e233556a3355e233666a3366e233776a3377e233886a3388e233996a3399e233aa6a33aae233bb6a33bbe233cc6a33cce233dd6a33dde233ee6a33eee233ff6a33ffe234006a4400e244116a4411e244226a4422e244336a4433e244446a4444e244556a4455e244666a4466e244776a4477e244886a4488e244996a4499e244aa6a44aae244bb6a44bbe244cc6a44cce244dd6a44dde244ee6a44eee244ff6a44ffe245006a5500e255116a5511e255226a5522e255336a5533e255446a5544eff255556a5555e255666a5566e255776a5577e255886a5588e255996a5599e255aa6a55aae255bb6a55bbe255cc6a55cce255dd6a55dde255ee6a55eee255ff6a55ffe256006a6600e266116a6611e266226a6622e266336a6633e266446a6644e266556a6655e266666a6666e266776a6677e266886a6688e266996a6699e266aa6a66aae266bb6a66bbe266cc6a66cce266dd6a66dde266ee6a66eee266ff6a66ffe267006a7700e277116a7711e277226a7722e277336a7733e277446a7744e277556a7755e277666a7766e277776a7777e277886a7788e277996a7799e277aa6a77aae277bb6a77bbe277cc6a77cce277dd6a77dde277ee6a77eee277ff6ffa77ffe278006a8800e288116a8811e288226a8822e288336a8833e288446a8844e288556a8855e288666a8866e288776a8877e288886a8888e288996a8899e288aa6a88aae288bb6a88bbe288cc6a88cce288dd6a88dde288ee6a88eee288ff6a88ffe289006a9900e299116a9911e299226a9922e299336a9933e299446a9944e299556a9955e299666a9966e299776a9977e299886a9988e299996a9999e299aa6a99aae299bb6a99bbe299cc6a99cce299dd6a99dde299ee6a99eee299ff6a99ffe29a006aaa00e2aa116aaa11e2aa226aaa22e2aa336aaa33e2aa446aaa44e2aa556aaa55e2aa666aaa66e2aa776aaa77e2aa886aaa88e2aa996aaa99eff2aaaa6aaaaae2aabb6aaabbe2aacc6aaacce2aadd6aaadde2aaee6aaaeee2aaff6aaaffe2ab006abb00e2bb116abb11e2bb226abb22e2bb336abb33e2bb446abb44e2bb556abb55e2bb666abb66e2bb776abb77e2bb886abb88e2bb996abb99e2bbaa6abbaae2bbbb6abbbbe2bbcc6abbcce2bbdd6abbdde2bbee6abbeee2bbff6abbffe2bc006acc00e2cc116acc11e2cc226acc22e2cc336acc33e2cc446acc44e2cc556acc55e2cc666acc66e2cc776acc77e2cc886acc88e2cc996acc99e2ccaa6accaae2ccbb6accbbe2cccc6acccce2ccdd6accdde2ccee6acceee2ccff6accffe2cd006add00e2dd116add11e2dd226add22e2dd336add33e2dd446ffadd44e2dd556add55e2dd666add66e2dd776add77e2dd886add88e2dd996add99e2ddaa6addaae2ddbb6addbbe2ddcc6addcce2dddd6adddde2ddee6addeee2ddff6addffe2de006aee00e2ee116aee11e2ee226aee22e2ee336aee33e2ee446aee44e2ee556aee55e2ee666aee66e2ee776aee77e2ee886aee88e2ee996aee99e2eeaa6aeeaae2eebb6aeebbe2eecc6aeecce2eedd6aeedde2eeee6aeeeee2eeff6aeeffe2ef006aff00e2ff116aff11e2ff226aff22e2ff336aff33e2ff446aff44e2ff556aff55e2ff666aff66e2ff776aff77e2ff886aff88e2ff996aff99e2ffaa6affaae2ffbb6affbbe2ffcc6affcce2ffdd6affdde2ffee6affeeeff2ffff6affffe2f0007b0000f300117b0011f300227b0022f300337b0033f300447b0044f300557b0055f300667b0066f300777b0077f300887b0088f300997b0099f300aa7b00aaf300bb7b00bbf300cc7b00ccf300dd7b00ddf300ee7b00eef300ff7b00fff301007b1100f311117b1111f311227b1122f311337b1133f311447b1144f311557b1155f311667b1166f311777b1177f311887b1188f311997b1199f311aa7b11aaf311bb7b11bbf311cc7b11ccf311dd7b11ddf311ee7b11eef311ff7b11fff312007b2200f322117b2211f322227b2222f322337b2233f322447b2244f322557b2255f322667b2266f322777b2277f322887b2288f3229979fb2299f322aa7b22aaf322bb7b22bbf322cc7b22ccf322dd7b22ddf322ee7b22eef322ff7b22fff323007b3300f333117b3311f333227b3322f333337b3333f333447b3344f333557b3355f333667b3366f333777b3377f333887b3388f333997b3399f333aa7b33aaf333bb7b33bbf333cc7b33ccf333dd7b33ddf333ee7b33eef333ff7b33fff334007b4400f344117b4411f344227b4422f34433f6a0800003b, 200.00, 1, NULL, NULL, '0', NULL);
INSERT INTO `wl_orders_products` (`orders_products_id`, `order_id`, `products_id`, `product_name`, `product_code`, `product_image`, `product_price`, `quantity`, `product_attributes`, `store`, `product_type`, `shipping_charge`) VALUES
(3, 26, 1, 'ASUS ZenWatch', '01', 0x474946383961d007d007c400003f3f3fbfbfbf7f7f7f0f0f0f5f5f5f1f1f1fcfcfcfdfdfdfefefef9f9f9f8f8f8f2f2f2f4f4f4f6f6f6fafafaf000000ffffff00000000000000000000000000000000000000000000000000000000000000000000000000000000000000000021f90400000000002c00000000d007d0070005ff20248e64699e68aaae6cebbe702ccf746ddf78aeef7cefffc0a070482c1a8fc8a472c96c3a9fd0a8744aad5aafd8ac76cbed7abfe0b0784c2e9bcfe8b47acd6ebbdff0b87c4eafdbeff8bc7ecfeffbff808182838485868788898a8b8c8d8e8f909192939495969798999a9b9c9d9e9fa0a1a2a3a4a5a6a7a8a9aaabacadaeafb0b1b2b3b4b5b6b7b8b9babbbcbdbebfc0c1c2c3c4c5c6c7c8c9cacbcccdcecfd0d1d2d3d4d5d6d7d8d9dadbdcdddedfe0e1e2e3e4e5e6e7e8e9eaebecedeeeff0f1f2f3f4f5f6f7f8f9fafbfcfdfeff00030a1c48b0a0c18308132a5cc8b0a1c38710234a9c48b1a2c58b18336adcc8b1a3c78f20438a1c49b2a4c9932853ffaa5cc9b2a5cb973063ca9c49b3a6cd9b3873eadcc9b3a7cf9f40830a1d4ab4a8d1a348932a5dcab4a9d3a750a34a9d4ab5aad5ab58b36addcab5abd7af60c38a1d4bb6acd9b368d3aa5dcbb6addbb770e3ca9d4bb7aeddbb78f3eaddcbb7afdfbf80030b1e4cb8b0e1c388132b5eccb8b1e3c790234b9e4cb9b2e5cb98336bdeccb9b3e7cfa0438b1e4dbab4e9d3a853ab5ecdbab5ebd7b063cb9e4dbbb6eddbb873ebdecdbbb7efdfc0830b1f4ebcb8f1e3c8932b5fcebcb9f3e7d0a34b9f4ebdbaf5ebd8b36bdfcebdbbf7efe0c38b1f4fbebcf9f3e8d3ab5fcfbebdfbf7f0e3cb9f4fbfbefdfbf8f3ebdfcfbfbfffff000628e080041668e0810826a8e0ff820c36e8e083104628e184145668e1851866a8e1861c76e8e187208628e288249668e28928a6a8e28a2cb6e8e28b30c628e38c34d668e38d38e6a8e38e3cf6e8e38f400629e490441669e4914826a9e4924c36e9e493504629e594545669e5955866a9e5965c76e9e597608629e698649669e69968a6a9e69a6cb6e9e69b70c629e79c74d669e79d78e6a9e79e7cf6e9e79f80062ae8a084166ae8a18826aae8a28c36eae8a390462ae9a494566ae9a59866aae9a69c76eae9a7a0862aeaa8a4966aeaa9a8a6aaeaaaacb6eaeaabb0c62aebacb4d66aebadb8e6aaebaebcf6eaebafc0062becb0c4166becb1c826abecb2cc36ebecb3d0462bedb4d4566bedffb5d866abedb6dc76ebedb7e0862beeb8e4966beeb9e8a6abeebaecb6ebeebbf0c62befbcf4d66befbdf8e6abefbefcf6ebefbf00072cf0c004176cf0c10827acf0c20c37ecf0c310472cf1c414576cf1c51867acf1c61c77ecf1c720872cf2c824976cf2c928a7acf2ca2cb7ecf2cb30c72cf3cc34d76cf3cd38e7acf3ce3cf7ecf3cf40072df4d044176df4d14827adf4d24c37edf4d350472df5d454576df5d55867adf5d65c77edf5d760872df6d864976df6d968a7adf6da6cb7edf6db70c72df7dc74d76df7dd78e7adf7de7cf7edf7df80072ef8e084176ef8e18827aef8e28c37eef8e390472ef9e494576ef9e59867aef9e69c77eef9e7a0872efaffe8a4976efae9a8a7aefaeaacb7eefaebb0c72efbecb4d76efbedb8e7aefbeebcf7eefbefc0072ffcf0c4176ffcf1c827affcf2cc37effcf3d0472ffdf4d4576ffdf5d867affdf6dc77effdf7e0872ffef8e4976ffef9e8a7affefaecb7effefbf0c72ffffcf4d76ffffdf8e7affffefcf7efffff000ca0000748c0021af080084ca00217c8c0063af081108ca0042748c10a5af08218cca00637c8c10e7af083200ca1084748c2129af084284ca10a57c8c216baf085308ca10c6748c31adaf08638cca10e77c8c31efaf087400ca2108748c4221af188484ca21297c8c4263af189508ca214a748c52a5af18a58cca216b7c8c52e7af18b600ca318c748c6ff329af18c684ca31ad7c8c636baf18d708ca31ce748c73adaf18e78cca31ef7c8c73efaf18f800ca4200749c8421af290884ca42217c9c8463af291908ca4242749c94a5af29298cca42637c9c94e7af293a00ca5284749ca529af294a84ca52a57c9ca56baf295b08ca52c6749cb5adaf296b8cca52e77c9cb5efaf297c00ca6308749cc621af398c84ca63297c9cc663af399d08ca634a749cd6a5af39ad8cca636b7c9cd6e7af39be00ca738c749ce729af39ce84ca73ad7c9ce76baf39df08ca73ce749cf7adaf39ef8cca73ef7c9cf7efaf39f000da840074ad0821af4a0084da84217cad0863af4a1108da844274ad18a5af4a218cda84637cad18e7afff4a3200da948474ad2929af4a4284da94a57cad296baf4a5308da94c674ad39adaf4a638cda94e77cad39efaf4a7400daa50874ad4a21af5a8484daa5297cad4a63af5a9508daa54a74ad5aa5af5aa58cdaa56b7cad5ae7af5ab600dab58c74ad6b29af5ac684dab5ad7cad6b6baf5ad708dab5ce74ad7badaf5ae78cdab5ef7cad7befaf5af800dac60074bd8c21af6b0884dac6217cbd8c63af6b1908dac64274bd9ca5af6b298cdac6637cbd9ce7af6b3a00dad68474bdad29af6b4a84dad6a57cbdad6baf6b5b08dad6c674bdbdadaf6b6b8cdad6e77cbdbdefaf6b7c00dae70874bdce21af7b8c84dae7297cbdce63af7b9d08dae74a74bddea5af7baffd8cdae76b7cbddee7af7bbe00daf78c74bdef29af7bce84daf7ad7cbdef6baf7bdf08daf7ce74bdffadaf7bef8cdaf7ef7cbdffefaf7bf000eb080074ce0021bf8c0084eb08217cce0063bf8c1108eb084274ce10a5bf8c218ceb08637cce10e7bf8c3200eb188474ce2129bf8c4284eb18a57cce216bbf8c5308eb18c674ce31adbf8c638ceb18e77cce31efbf8c7400eb290874ce4221bf9c8484eb29297cce4263bf9c9508eb294a74ce52a5bf9ca58ceb296b7cce52e7bf9cb600eb398c74ce6329bf9cc684eb39ad7cce636bbf9cd708eb39ce74ce73adbf9ce78ceb39ef7cce73efbf9cf800eb4a0074de8421bfad0884eb4a217cde8463bfad1908effb4a4274de94a5bfad298ceb4a637cde94e7bfad3a00eb5a8474dea529bfad4a84eb5aa57cdea56bbfad5b08eb5ac674deb5adbfad6b8ceb5ae77cdeb5efbfad7c00eb6b0874dec621bfbd8c84eb6b297cdec663bfbd9d08eb6b4a74ded6a5bfbdad8ceb6b6b7cded6e7bfbdbe00eb7b8c74dee729bfbdce84eb7bad7cdee76bbfbddf08eb7bce74def7adbfbdef8ceb7bef7cdef7efbfbdf000fb8c0074ef0821bfce0084fb8c217cef0863bfce1108fb8c4274ef18a5bfce218cfb8c637cef18e7bfce3200fb9c8474ef2929bfce4284fb9ca572e9c033840000d0000001e40f39adb9ce60b00000304908000c0c8000910000100b0809b1b9de632dfb902ff028000d5064000333fbad4a7fe80053420014d2f11021cd080a253fdeb371f000004e080acd733e6324fbbdad7cef6b603c0004d4880dbe74e7799830101096000d8f73ef5050800ee993040dd07cf76c00341f0844f3cdd0d2f05c42bfef16b4fc0180e00f9c4f7e1000af03adf377f73ab335e0b68afbce8474f7ab77ffe8a51e7fcd709d00401a81eec5e7080de5f4f7b9c2bc0ec940840eda7eef320e87ef79c1740151400fce08f81f8c53f7aefef8080cc27fff50568c001b690fae75bfffacae762f5ad3ffd25b81efb5b4080000a807dd513a0fb93f8fdf597ff03f597dfe800a8c2ecdf6f74e18b61fed86fc01d0e408001d09ff300207958b07dffff5780afc77e584480c9c77ade577e59207efe67807cc700e80709eef77c08d80317688055108112f800f617061e887d0b5007fcf7819c57000258050a88822e68741968452d587c157804df777d58a00023f88254777e91b081c517833b0084ff27844b60002f18825f4084cf57836d80000dc0832968844c308352e88254284556b87b0c980437687d5660009a77855f37000a6081e5978537c084efa7844f807c28e8865d1085ffb7826e90003b48865fc700b8f7045ba88705a88650f487b5d78745f085cf570588088854b700a787086c487b82580391887df12705f8278172c80563587e5dc8060840888c587303e00052208aa3b87edaf77f9b3804ff8b587c5370009d988a53370076980895a87a934803b9888352908705d88a5970000638006ee000c0488b53f7894d808aca1884ab487f036088aee88051808ccfc87704408d84d08b9bb78b33e08d18180548988461900012f88865f08ad9d877dc7804ced88e92188df4278c40c08ebb170570288f5fb700ef1808e2b877e0280301597cf67804e8688e6090896da80608c090fce88e4e108f11f98df4f87ed38804f8587b50400015b97705a08e009986425090c077894fe0910af905c9787d25880608308b1f297505e084f0389324b94514697c36688d4da0923849750320927f6092543790316094f90805e4b7925d508e12f88f5d109341b977fe5885ff55697d48a9443bb979c6d893e0f79359598644d9074a29755bf90267497b654904c4c88307a98828688a65409563d98f5209045d799735979648b4977c778b42b091b427967c598b6da9076b098325298567e80409e9949c8882cc787732799836c7004b00987ce99747c49960570060e98b4ab08f98697419d98d3909048ba97a9ae90440e98271390508e082a24906a019918f8904b999959e6944bd497582798f3e89040e709a78a99ad8f79b2bd09a9cf7954dd09492a90591f98189690574889c54779d3b109c41c99c44e49d34690484f97a4a60002da99d0f50997ee09c7dd99852c89d3ef09670f905b12981bbf905d5a99e47f79237c99f7c079eff43249e52379c3e509eaa97047609a047979f45b99aed77850e8a04fb19872cf98228e90507909e003a9bddc9a002799105e89f83599c45909d201a76f22907ee4973028a022d3a8186599f4f2985794905041a9136a99729fa752f1a44399a7dd518964610a31549a2ed09a13e60a460079d4a209dd38905088a7d74d905a6d9a336c79e3c8aa56829a20598a1c449a444800050caa535e7a17310a33f6a024c0a762baa03f449a35c10a453a77f5db0a1667a743bea0374ca8f6bfa437d7a737f5a0253ba79a3898205c07697f97f03b0a777a0a6f0e9984b50a116ca05b52985b7c905f7f98139c7763ca8a57c9aa78ca993183aa4a43904782a8100b074ff2a007410f97eaf99a4cb19a99fba049b5aa95b709c57e8a88de7820c900044e9720d50a6f4c7ab3a10a8ed38a83d84ac36a7ac2250a87c6704b77a7d032000c64a027847ac4aaa98dbca036dfa75998a04dafa81680a9b6438a15610a805707b316000d36a7d763a04e2597af49a786fca95b51a04d0ba774510a76d78a328a0835ffaa0b3ea7b7a78ad3ce0af516a05e32a81b18a0550298de56a0207f0aac9e7a441209e98c4ac3687b033b0afb04704ef5a7c218903a11888b2aa8a064b86061a04948aab5910b152b805235b7c0be0b12a808def57a5196ba293c4b13507aa3800b25f37a6ff77953a50b3bbf7b0dc5ab0aca98742fb034acb8a5c70a5ff2fc8b355a0b0d717b5edcaa1b4c7b43fa0b19704b43587b33040b4544704689b9c3c30b5b467b66c00a92b7b85e15a040dab89730a88f16a056bbb7a3e809eef4704626b49644b735c4b037d7b744470b7b587b43de0b6aab7b77920b74f7bb047a0b5b2c9058c88a454c0b8b577b8e1b8b3f2eab39254b83407b72d90b8463704ba8a7d4319048bba7b188b07941ba17ad8b23ed0ba5738b14aa0bb6488ba4420b3d6c7b93ca0ba3727b9a12aa69464ba20f803c66b734300b99b87ae3b90aa54ca07b5bba48008ba3980a252c8bb49e0bd5788bb4d20be170bbc2fe0b99c47bc3c30b895c4bca959bca4cb035eab7aeccb03565b7cdcdb06d9ab818058b7ff4210bb78ab05ea6b80601b0505cc9342f0b2bb07b034e0becbab87e0bb02cf5b7342e0bbe3b8b8e537bb76d0bfdeca880e6c03972ac15a80b93cc8c14f20bcc907c04090c021dab3cafbb37a18bf3a50c1342704d2bb7760eab2a2dbb42a5bb97a88b54080c1727a05f92b85ce4a0347bc7be4bb03e6bb7b13ec02102cc3242cbf31cc032ebc774dbc03590c76c85b071e3c848cf8c53ef0c4999b05165bc451209e2c7c78d877c01f7ac591c4bc3487c23560c30f10042a0c7c6d0c044b4c7bf7cba2dd2ac68018c83b20c0038c05ca68c84a50bf0a6cb72e2904535cba8cb8c52f80c741f0c7af47c64030c2d717c26a10c63af0ad7c07ca32e0c96418c5ff4440caaa67ca7afc7ee83b03395cb4307caa11fcbf566ccb6d5b7ef76a03694c7b424c07a29c03ac0c76c1cc0344acc65460c6e33b050cdcb849f0ccaf17cb2b30c9733c8a969cbaf39b035d2c94a5597eaa4c06c38c03c5fc759cac03cc0cb35580c82fb8bf4390ce9b9c047b5c7bce6acd9044c735d7c73280c940507e702c04265c7b3b2ccc833ccaa3c8c837c0ce0618ce4110d05768c74a209e498c02d7bba5ba4cc9d85cc3dbbc86e547bd43d0cdb5e8c35a49ab7ae8ca2e80caa98c05d27c85bdec038ebc79266d030abd770c9d02f6fc48f85c7308adcd728c039aac8b4bf0cbaf17d3e25cd0c49c8ac79c03c9accc98d88e359d03e5b7d33d109cff4f7d0237ed4839fd9e43bbd136c0cf4a80c7136d05e3ccd1a378ce3700cfe48a052ffd752bcd77037d9efe6cabd757d52670d58d94d54897035e3dd5d8a7cf249d7cd91cca464dcea9f8d63930d3c17805ce09000ecd79446dd0d847d797bcb5b50c8663ab8cccb9d7ed6b894c30cfb527d95c30d63650ce21eb03289dd2d8697dc207d24697d408597e81bd03156cd83860d78c84d7797d039abd03e567d642e089933bd8643d8a83bad44c0d05887d941030cb52e7cece2bdccf6d7dff5cdb5c7dd7cff89bbbad03e0dc046b0d76b4fd06a24d89b408da1080d6695d05a7cd9110d0d620090560bd04071000f23ddff45ddff66ddfd4ac02b6bd48b86db8ffba5ddd3400dbcdc8d9b40bdde25dd83f90dc545b05eceddd22d0d89bd7d21addd381b0df8ad4dfa7dbd5004e90061eb67d1ddc4e6bbba968da24abda56c0dc471782ac7d731e6d0416be072f8e4818be9e1a4ee107fec34a80e25307e238aebdcf57002bbea6675900cf4bde37d0ddbc37023a7e73df2db81bce07317e4833fe00e89bdd841de25ef8e4828de5fefb7c00b0e492ddb70450e455e0d9093a020d5eda5869e37f10e58634e5ce3d02563edcd627e1ffcde6fcdbe1a1ebe5690e7f7cbd7b0eb0e43667e4776c7d190ae17ce7da4e8ee77de0e68534e5548eb85aae9693de03730e07e1cd8b869ede86ca03c577b2cf47e834a0e052e7862b6e73ffbe2dc9958e078e4e48903ec1977ee396cd04b1ee0699bee7170b01a4aed547bd7bf1d79ba27eca3d2ee8f93c91ab7e07ad3e48e289e4a8e9cab58eebb3de808cbe06b7cee160d8b72d1e037d2b7cc04e05c67de624f0ed9c97df3590ec7460ee8124d1a1feb1c7de9cedaed7ef3e06d59e943868e67b18c7b50777dd3e05c44e7360cbe9af97edaa3eed301eefe9ee80a049c32ef0ecd67ed1879a8805cee51f6cd9cc5ec7bc2dbb22b0ef5270ea3587aebb6e74d33dba04af07e80e481adb9abccbf0f43ef2966ef06130ef30e09e2220d4dbd9eb9f2b021c4f73c10e03f61ee12760de4d3ae02ccfea2eff4762fbf1a4b8cf455f0231ea042abfe53ddee5ffcfd7747dcee2f0cec42230d753f0d37b87c2e26e919bb9f46f50f2466f8d557f74b1fdf4943ef4b22df65d00f36b3f8e882e75212fc5c097755a7f8ad28d02001fb96beef08240f67e34b81cefd726a0f62ed0f4ade7f6a1ade70d9f7cbdf7f110fd02c0e79f790f057dcf791e8df43627d57f0ef815cef87a34b8676f74818df82da0f8b42efa5a00f789afb2407f74767e962178f94ff0f57c2792b1ff75e42e03823ff6e557afc20f00a99e80c559f8672bfaaa2feda00fde8ebff2198cfb5227f0140c7ccb67fb4eb0fb219d02d20f76b17dacacaf0690eee565e4bea57f73d98cfa2cb0fc5f1dfe58e0faa9ffc3c057f7d58cf122d0f37cb7f32e90f3ff0f00020c349225f2a0a9bab2ac58c2b13cd324d0e2f95af3bdff0383c09bae683c22932980b0e97c42a3d229b56abd62b3da2db7ebfd82c3e231b96c3ea3d3ea35bb4454166103786b0114d0e3d9405e97c6f7e1b489f105b60474151aa6289030040e4819be40282e3e08b01d5c32f22c703e4496bd810e9ada80a682329db6babec2c6caced2d6dadee2e6eaeef2ba9272c2002e22fa0897eea93efc25f73a5972126f3d1b668e28181e404d2b25906cf755ab5d831af034a49693fd5e367bad27c323b1b6d3d7dbdfe3e7ebeff3f7fbffe37b67080682398be6f130060c99aa650d017a4b164dcbb73ce13605eaf644219c6c232ad20997e6112751351cffa41219466020884f58c68bd902a1cb9a366fe2cca97327cf9e3e03320b06ad58502c20f3384c65f3289d890c39892c108800149845ec4404a5f24c2a4a344e80c23ac62a9d9f33c8ca4c4bd32cdbb66edfc28d2b772edd536895c4287869ad0c8e8b281635e377604da6709c1a4d598240a002500c35286118c9d632284135ea71f708027581dd6e4e0b8f6fddd2a64fa34ead7a356b5ea18ff41d9af07395c949921e73691b09e22bbb8b88bcdcc7a390df2b268e83bae61c28e23506e7d128e6b511b9d445af6aad7d3bf7eedebf83e77edd4f0c8c8ba8ce7e9858bd60dafe8c17e96d053e0e8460fb480f921c6909e821d748c589633ed0d7027ad3b967ffd678d81d149e830f4218a184135208cb8282c8c0d825cec5c6de7c0986e11f7fba4994482a342d78601024e5e11504222a51d918e65da2220fa998b412883e5dc8601fa45518a490431259a491e1f5c8c20c344e959e524fe5d69e87ff1488837cb59d08c37e700c288441796446028c49c8284602a9e4c7439229a4a3e394421c20809c73d259a79d77e299279d1c5ab1a68f4a0079a4a083125aa8a187dee3670a3468b8089ffdeda84da45e8c895761257251e50a3419808d109d06c261a5479419068b1bde914a9860288a82149a8272a514adfe6944a088e29aabaebbf2da6b15b4d2c0641f360af5e614b0ee80c6a8482c85a93459ca9191105b2ad1ffa5988aa5f1e522d6f6802c0ab762016c14de0eb305adb5ea00aeafebb2dbaebbef0a29ee0c8d7a3ac3b2b041b9d019f75677a92ab21e9b0ab710d00b47642b0672b01bd89e412eb137a6d2999b4f4a8aee21e65acca0baf072dcb1c71f83ace08ec896c9af1eeb512c65ca00918b02c0af4e79661f62fda02d1c0ec4a068a95f30c7499a9aa582f3c4513a93310b2fbf64b4681b87dcb4d34f431d752df29e75c90012c760327928134d86d63934fbaf892b43705f1e58f7006a1f688fa0731a9f3427c4d72c3c8cb1b140b41c08d24e9cabb40a4c4b1db8e083135e381554cb40b2bd93167d371873b710762a7b3fd1b20c70e721b40fd426c197db6708dbff5813e40ecc05e2a3fb9d02e542f49dfa03801b1ebbecb3d31ef5e9395bcdf608902b992f3bca327e4fdeaba34ef68b0903712a1caba2a2151a32735237c471b31a3c0d79f741fc10aec7037beddf831fbef886de0e83e2595b1f44deb8e90bd1f063775d492034f360b3126d2eecfc19051bf2b30f8a32cf74e94b1cf7b4f783d6a5ce7be35b20031be8c0ed940f060132448eaee5b88a194f0cbc4b1689c496290f466b6d3e501b1d4a070155ecac0bf60b951338d7071709f082dd2aa0ddb8a70a053e30873adc210f7712c11240af7fe89361e33218a201b6e37d1f9c9c0c94a704cdd5c08547a81b0acf40c26d3de18a7fa91e116b80bd3c18f07f364cff060e7b68c633a2318dbbf861092628ba6219715c48bcc2065520b958c14f363008a2c17ce0c42440b1045554d92514d68415f62190358c9ffa68a80504faad8c6a9c24252b69c951048f8ff881232361d6c52dd47151fe62e212f1589ef9f900919c99c120cb80b94b283279a930640ce348204766815600d8252f7be9cb5f023398c2f4252d2f69cc63223399b5ec640cdcd8076e85d255bedbe2bee6d80b253e8b943178251cd2864a56326c0c66bb84ee8020c51272d19633745d1881f64965c2339ef29c271bd808449f41ea9d78b36615a2a98c519a329ba08825047ad6141e9c13383468e51834f9cd2caae251e1e2e7477039517dd233a31add2847ffa3604f12e8651134f32760304a478aea029b25d55f0c84f39f1afc1109f8930c43c5c03fe445419574f0df45d5c9832f1ef49128ed28518b6a547a7ed482e5dadd500968522b9014a07a5ca972c099875be9540715a46938c5e04c43105496a080612e510ad4c32cb27d475d2b5bdbbad1a48e20a486984754b9a656af35f5162a9d6620ca14537c2da9493368590ab3a0454394533f38fa025c076bd12b34d6ad929d2c651f18d90d12a3aebec9eb46385b8bbdda7511654aa80eaee45024f0547e5d05036993403f271c566fee30eb63fbe4d9cae236b7ba055964e51a085668f6434fede76d6701dacdae9604a1a30ca358e8d8e4ce1614c57442569530ff5dc8d2969d69fddd6ebbebddef0e2eb2051d4a70b1345c2a94f73dcea2ea25c84a82afca8306f03dc26b4be0d24b14f60ae35c4458111696e8fad48bb5fd5571c16be003237842e25d2e1ca892de809d770a0fe6c771859b9de6f621b07db82e53a1cb85fb2e22b1d35285880f8752040420c52a5e318b57dc5a25b4534d054e308d6b6c63d58897609c885381d707bc08e7a2c2e6bdf00c409c84de9cf608b28a667ead70d3995521b69b5ce65dc120e459cdf8c65ade32977f9263062b810013962390a330667d5c19c24496c17ec994a13e6c9593f825c37cf3308061e2f997aa909e89cb5c3c6df694995d1e34a10b0d971cebf81275ce305f5bf2e300ffdb23cd9e5cb30cc6c39745ebc0bd4aad6a18a43c46ab7501d1930e68a0ab6ce853a33ad53841349895c65eee12d2d4145e6fa3f350df12bc98055b6db50e52db6196b2f6d332992976fd5c1c5adbd6d8aa5e36b39bed0b7efed5d5b51e51ac61cd326423d7969e2ec24c936c048992c0a0731643b4854d0d2a5b3b0c924e9ab29dedee77c37b68b25ee7a75feda8470b3a1febc660beab8b03e63dd90826cc1fb0bf60ee98dcbacf90ce36a98bbdf078433ce2120f354521496d0b377c0c67d637b6313eef1104bc082ec2740e38dcbc8277c1c807e744893d9a650183b0d4e99e38cd6b6e7387e71be663b4b721622c85905f9c4a1d1f72bebdadd512f03aff07fd6d5b4dbb20ee950f74bbd41cc3be9b20ea9b633deb37bf3a042cdecd6907d50c5c0ff2d0a9e0e31ab459a62430fad66ad0aa264f81e450a7039f5ddeee1f549d752fd73adffb4e68aeabdc685a48fa13d1d02a49a6b4ec6aa65e0db8998430013d079a2638a7bd40f8b9576b0b4f9f3a21145f95bdfb3df4a24ff0d8e5eea32d2403ee58307d7ca57a099fffd4f35aa304eb57104019d4de08aa8742ae319f0462a33719c0f742de8330f6d1233ff9351e3bdbff84faa68b818c779c2ad8d11a7b3b8fe0f22c183e0c526f2adf27e3f612f67cf5612c75c2283ffdea4ff5f1732f932d387eaea0f3beeb972ad08ccbc0df2d2847f35b30f0ee439f16e8ff1ff8b51e16f4de11f8dafd515fb23ddcfa39e003ead6f1f51f769c1f949941deec5e3314dfb1c51c0d945b0e7443e4e140dd9100fd111f012643cb1511ca7dc1061e10e841600ccae0311d1f04b85f3c6c81085a4a191ca011c01e2eb8e03e75e00c4ce00a50c50d3ec0d295600062c1e6a1602028e19f8d551904a13b35e00c62611666540df6200e6a813f715f17e8e0ef4ddfebe5d102ca80f6a94001a4dd2af980097641fc3de186694132245c29e19fc2e59c16f2611fc6530dfa96e06941e0f581f879811c3a5afdf5dc199aa10f202270fc0810c0e116a8e11ceac0ff41c100320b1954a18cdd9d1f8262282e500d1e4fea506232906016b4a1052affa26ce1211aca8013ca8421c6c0246a41115a621180dbe70de109f6a21e7e9c280ae3309a112906a2c570413260e22da2e24d7422bde5614ba14b1802a08759c107e62212d0e213c822387022f9f10d0c12e33892e3c79062294a9b50a9023566c1186aa3338263e5c463adc4d94231a1156862364a5e1674a10edc21cfb962597d623912644172cc391e63ad70813f999c00c663a43da414c26213fd492a2ea13552c1b6e9e36d608146d2c12e96df915520a31964499ae4ec9c63a209e2202a6343c1034e3ce3f5011a42fd490256230b9ed44636e215c0c3368696fdc91ce79de45012e5d3a464250e64d9c0c30fbea02a4cdeacfd22d14de429f9880a0affd23d52c123ea2412346438aac23232dc54dadd151665599ae5a1a4a44a2223ba35081878e4f2c0644472e04cf20012c2c13fd622564ac12a6e2512e06513f8d30330e52d45259625e5592266627e475a22e51e3e413f961618606347c465612e9e58c2803bf69510d8e215e0621114409e89e66826034836c15b024ae759262f92a562bae66b3e485aaaa542724163a64b0bc20358a2995c36d26ada1783104f673a992af82403e2d3eac1834d4ae54e0625fac1e6734267bc14986d0a25166865e61c223c74e53ec4a4ce45239b61473dd6807056413e729b0639653bc2c3d53c0e6f8ad16146677cca674fc866d7658c1740660e0c80694241373a173cfaff26bf61260c58dc53ca00794e016a1e81780224f6fd647b7d8182f2c64806dd7c5ae885e2d88c9d55db0d5e3c2c805536c167d2974e74e7f544647e22601320a81444938162817bd6805dea40060201025c67d835672262e88ef2685dd4a77da2cb174c668319564c282777c22861d2250f48e847aaa85eb226271427ce8d5b4e26271768e684aa636bf668977a693ffce88662082382020180a80f3880792ee84e94e8732d69fdc8c45fe6254642015fd2013b624134c969105067114ca91064a9960a24977e69a11a6a3bfc28903adf17c8a83ff2670fa0e88cb2699242e38066a64c6ce79ce2e41410221d30a80292937ac604039c690f20c090e22895ceffdca1b26aabe643a28aa8737241ac2ee89fa62102b1278952aa4c7e2711ca8401ad281404ea3e9641321c299fa6c5001c6b0d18c08d06648e92a4ab4aebb4d243a2da206d326a5a14c0b266dfb0bad9a406a83c862b48bd9f1304eb1334aaed89dd9e6901aada1ab7229db78ae4966a859ed8ebbde2ebbd0e26b5f2eb7c5a2bad5628338a460134c0cb1c4002785daeeaeab84a24730281b3c2818b1e28949ea6f0551b0575687812800380a8012800c402a5aaf6650ed068bf9a2c865aebb59e9ebca98598d90900a4ebe3f5449b3ad59b3a09713ec1b93641a4ae61c358aca8fac80200409e0000c872c29e5addc832d7c9322db5a62cc07e9d5b2aed88ceffecae7aa7a59a4f3c3caaa6569e71d6081ae8ac1024e4d4ea009eb21bd9926cd3aaadaba6acca52a018f8e7d49aad7a31ec5cf62a0da8e9253e06c572a62ac0abd7b6253fa2ed3bb2e5e0a240c9ae6de22666db06e698820102c4acef21aef058ad89d6ed08b8ab1164eac4d2691374aa9356138951e8e04a6c941aae0a4caee2aa2e51b6edd88a230934a925222ddddaacd9b927d4b240145ad5a6f6e757a641dee86e13b8eee07e28809d2eeaae6ef2a2ac38366eef8c01cf42dd7e9a05cdc64010f6290b94ea4d762d15442e0a586432b22ba89eaef41aeff11eaef2a2af7cb66dd9e4ed0e8e81bc625ef05edbe50a61ed7a02b4e42cdffec0f5aec0df5eff41e6ea2d17402fe60dc0dc8ea5f99e6ffa2a306cae2f3a962b19d8e8e0fa2f54daefa8616d0cc4adccee6de72a564489c3cfe6a0f91630cb1e6fea2ef009fb6103dbe9aa7e41044fedf776500593990c17193a4441d8fe0000e7806e7641ecea80ad3a810e83df0893f0e99a300a23311636f06cbea415b5afb9c1700cdfed0c4fb13d2a9a24e8ef1b86af1a3cb10b78810b932d1117b1e11e71129bf1032e31ff722819184017db50144bf105376cc80a8110ab001c6b6f95daaedfb2811d47ce17fbb1b92dc0d6121802a740199f71222bdf1233317ca68dd142715c506fd6d2af357082fc722eef3641062b01210b703260f213c0efa7912a261972022bff722a132323abb1e39e01185b221097211d87a5c3c209cb613107ff002407f01af870c91dd15622b2f19d322aabf23183222337b2637601028cb2c50c4028cff222bea22d0b41a3ce6e266f2f14b4b2f70e821bf76c182400381bcd00ecabde15f33023f33ad79c32ff72bfb0c10033c80218704e4c3257d130866d662e6b7210e06eff0e4220af80274741b3e662291b5e3163023b3374162ab3a2beee08f1b2c56c2e4fdc7356e4730d1b423d6bb31e4b8140ab00417f32ce6adc1346f31a78dda7a97343b3b4bb3d3450b542f38242019c733f5c744555725c61ec14e0309c0a8c29bc730b94ae1518b4ef21b41aa4f418ad744b33b5aa3d3444132a2526ffb5120cc0525370158b6b4657cdb050414f5b6e2ae0b10aa9c2a7ce6af7c2c302d4b4e99aaf5537755bff5d44e3b3236bc3546b6ef6fac44dab9656cb00644ef055eaf2cd1e674057aef00a00390b4c5fd32b02b3b55b33b6963d35044cf41a9f4200d0b5ae098048dff560d72c56d3c02f63761e8b561544360e7cf616c8f30354b42a268059ff16628feed42e7663cb36e9c1f53dd5366c118061fb6502d8355be07577aa6936efee360b6f4b9e4250b38070efc133db1901703482a4f36c4bb7cd3db6db32f31a240003e8761d3440694faf6657afd5066a6a5b713ffbc03fdfb12b6cb7775b010264f776e340016cec2c5476eac4f674e3777e576f03b4ff4a01304002b0b77eeb86009c8b7f2bc0730b78822b78d30440021038c8de99980540802ff84d188083330075086d03084000f47685837888874c8bb518858bb8591c0089b318829f788bbbf88bc3788ccbf88cd3788ddbf88de3788eebf88ef3788ffbf88f0379900bf9901379911bf9912379922bf9923379933bf9934379944bf9945379955bf9956379966bf9967379977bf9978379988bf9989379999bf999a3799aabf99ab3799bbbf99bc3799ccbf99cd3799ddbf99de3799eebf99ef3799ffbf99f037aa00bfaa0137aa11bfaa1237aa22bfaa2337aa33bfaa3437aa44bfaa4537aa55bfaa5637aa66bfaa6737aa77bfaa7837aa88bfaa8937aa99bfffaa9a37aaaabfaaab37aabbbfaabc37aaccbfaacd37aaddbfaade37aaeebfaaef37aaffbfaaf037bb00bfbb0137bb11bfbb1237bb22bfbb2337bb33bfbb3437bb44bfbb4537bb55bfbb5637bb66bfbb6737bb77bfbb7837bb88bfbb8937bb99bfbb9a37bbaabfbbab37bbbbbfbbbc37bbccbfbbcd37bbddbfbbde37bbeebfbbef37bbffbfbbf037cc00bfcc0137cc11bfcc1237cc22bfcc2337cc33bfcc3437cc44bfcc4537cc55bfcc5637cc66bfcc6737cc77bfcc7837cc88bfcc8937cc99bfcc9a3bc901cc068b2fc2e710102b43ccb7f3845c4bc680ef513ac7ccde7992b1880ce0f138b8f007ffb7c30bd45ce0f3dd19b82d01ffdd2f7929c28400000ff3ddc32bd2ff182d24ffdd5633d30457dcad7f869bb0c17b076120e022787d91778bd60b6c23356372c9c7d5aabf518f9b70070ecb3c9f56b2baddb73bd8883f40a9037103037f2b6c1b9b8760fecbd0af4bd2fea3581def62c147e0a1cbeddbb8e7ccf7de02f3e309a2fdee73d88c3f70328379a8ec620c4c3cc03c1e6777e35d33231d73d2e90be29d4777bf1364a57fe14b4bed2607ee62bf85999384178e11a604fe9e39d4ce4fe1e273ee50523806aed20cc7ef4d4be2746754217f3f2dbbe7e93fd4e15ee46c7b376f28c4c0c7e2d9ffef6a4be2d4c3f1c6cbfe5cfe1028c3f3a37ff19247fc6407ff4e3f7681741586f4e4ff6f1527e01fceb80fc8bff2f35bf3d083ce24896e603a5eacab6ee0bc7f24ccbcb89e73951f77e0bd00987c422b190f8295d412371098dc29aceaaf5ea0c48b7dcaef70b0e8bc7e4b2f98c4eabd7ecb6fb0d8fcbe7f4bafd0e3d608b83b261bf53570078d277a647a86378179058a22545e5888247873869b2482789d9e90460c0c69958e933ea894a0859cadaeafa0a1b2b3b4b5b6b7b8b9babbb0b9b904a124a36e0596089ca80e6fb2b126cd7d8b90a750ac82ba6bcdc3c37bdcc2d22b0b68da51bde5d7e125d9daebecedeeefe0e1f2f3f4f5f3fc3d0fd4d46808a30e7804a011a7cdcf439f3844e09392bf67a105c66509bb9892316642bb3b0ca388a1c73246c0832a4c891244bff9a3c893265ca61dc1694b986c9c19c06a80ea061b9cc2523845b323a51a902e72f9d9b3a4e1c90e48c4f231b8d3a15f111a8d4a954ab5abd8a35abd66a7fcaf91b830055c4374b8b143bd3b5dbd73acf3045ed51f609d0b4dcd6ca89fb144b03a59e9ae6edf876abe0c1840b1b3e8c38314801e66492b9d109c01c547bcf302ee7982dcf487d815eee96f9eedf723c3076c68577b42ac5ac5bbb7e0d3bb6ecd93e20772b3d86e6e9376d63a2b1cd0d379dde8e02d348ad432af065c2e320576da43998e738fc422f679cb6f6eddcbb7bff0efe55587367c7107774918d025468c6972b3f7c7314ea2780baef06dff9f5e064e89bb0bedf32d985476081061eff886082e1c1d44d7a5f08e58840703c3489646730c88d83bcc927cd6e2761884d5101fe925418fe9500e088a80ca8608b2ebe08638c32d6c3cf44128e41a123d2ad314827379651a3393fca71de6a9c75025490e50c49968abf68782426293ae9d68c565e8965965a6e590784dc5838068880e4b7c6259840f9204560ce5124202c4ee1a1495e2eb3261c2752594201767571e70853e299c89b5c0e4a68a1861e0a235de6ecf9859993309a86987b902986a25e69064d4f719264a95a1201da49655ff429c29fa0ee2128a2aaaeca6aabae6ef5d944a185d1a36f6ee886c98e61c4da18a6554639894abc62f6e9a993a0a9d0a6b3907a6aaaaf3e0b6db4d24eff5b0db343882a06ae938ca5c67289cc3a86b542601b479ba86a8a644ae2ea40ae1beb525927ba52e6f2ae93ce528b6fbefaeecbaf19f74d44a9170045f6463f67fc4b9eaf93dcbb02b32921fc5eb1c61637aab2b2d4ab22c3fd6ecc71c71e6f3c70473691c15e1be66241541921733432911c2ee1304a2b53d4729313575871baa8dd4cf1c73eff0c74d0f82a4911935fe49808b2620c4b08b762106d637c9902eb484a500b295a64006ccd75d75c7bcb91d235c4bcb3d65e9f8d76da6aafcd362842bf0d77dc725f592b47c890b19e8f6d204d88d85bd44dd1dd2e4f3d9fc520013e91e036cffb4300093400762aba26abf32d64cf8d79e69a6fce71a713f9ffe1c9e4c274a209199e9b23f5af8557ce695e59339e8700887b52faeab0db7239e7baefce7bef5ce6ed14b85fcc3e291b8e2622ba17c01b253c1b275fa1710ab98fb47c47cda7313d140acc69abbcc1d26bb8efe28f4f7ef9b261cc2e909e404a86a4589468da53ed9afc32e5b78f847e0ef3ab917d1eef263fb6f0bda27fe62ba0010f8840aafc25656198d9b7d6a02d47d48c647961a01b9e6785e84180800d59a07e58c785ab3922603fe0202c4c98c014aa70852c4c87034546068801c2698fe98405c5f042960d4e751d0261487248333b095009224cc4046136c456a0b0854c6ca2139f3893d1c02f0c91c342bccae089fd812182469922fd08d7c3fbff85848b1df122ff92e80304108f10d7830b1a4bb14428ca718e74ac6314d698b832308d1a69c060153448033c9a437117ac5f09dff80e41968390e040640dfc68051a9ac2917788a31d2f89c94cd2f17846a9dd174e8705bf6d618f7b4003273be2c93540d2081ab4e43b4ec99154a2c1953e28e21eae78481f2e8b929aeca52f7f39beea3d059030e01e168c2606beed81916210a6538809855516a195bc5487338d02cd5c8ab10bd2340b176889077002739ce42c27dc94d9114986b01300ec8231af804c30a09323ea3c433787404d5dda639e14a9677faa39832a96d27b55039f3ecd89d0842af463d7b9a117dc67051236ca1347144343cb65c8491e94ff1e177517406540ca3d5454a3dbbcd847178ad294aa544bf75c06fbb8004b2cbcf4a19d90a8175afa8b999a01a71e21282948c25383b5419c8f5c914f09612a71ac74a94c6daaa1c8f814337a41a056686317a0aa173460b58b7008ea398ecac7916cb58c1edde8168c4ab59f96ada44e6dab5bdf4a20aa72a49d50186b15fcb905b93ac1aa5dd0eb44e82a06af9a209f6c9d875fcd01d89c1516ace74a2b520dba58b84a76b294454c4c3b5906c19200975e90e11e740ad300c9d29e1975a359e17159549635b251e0a715a46a5ad6b282a895adad6d6f4b12881a45944a782743324bb00b8d88b75fd02c0908fb3d91e8b623c4fde6496310d22be03506b4ff15916c718bddec6a371eae4d6719ba6b84e6f620ba5588e7d14634dd30187704c82da848c0dbcfa13e1706e4bd2b6395bad6e46e77bffced6f3b7c6b84e51281b35cb8e631e377ac9b4c42c043203070c188c4d3be03c04560b0101c2c86eacea0be4e48ef0b34fc3afdfa77c4242e312c8c0b80d41a01b47960671928ec4dd23a22c59860b17a4b1b4009b703c52a2e828dbd00e218ac57047c95419085a863132b79c94c26835d8bf00d4516a1c85090728c2be5e2333c9908519e0495c130e407b457ad20d9f210baec882ff369be2f08f3981f9b5ff73679ce74ae33180e2b042dd8d20989fd819989f0631f587808b0fd029e75a0e749f4999b383e0eff9b6b71e89eee393aa278740b068dcffb5e21a99bb6b3a73f0d6a1a78f6b798c6814da500c42ba8b907937642a097306a8d40a0d4273875601b3d8323d722d63f99f5246cad5811efca13e26d98a52b9de4502b7bd923a6b5092cd46322147b06bceef018229d038782c1d92580f699bec8c3085f571ddcde6c0aa23d8469db4fd860e0305334fddb389399d9f4aeb7895bcd6515587908e685b71130ac846a1bc1c350c0f799f53d897edf1ac2eb96b33d0c2e0483ec5b080a0fb6c3c300f121009bbac76e64b2ed0df290bb15c6994e41c6730070ed7d7c0643ce663117a68293e320e5c5c5b5913b0e0b92e739e6383be3ca633b63e7febc0eba16b9d18fffee4b50ca3a05e52601e8bedd6e4c8cd60b4aef35d3c7cd0537fbdbeaf6a8fabbafceee7f0e9d069e203813708e3db4237ded6c67a2bb2fbc02740b61d53e9838c54d8409660e3be82a90bb0ee82e05ad3b36acf678bb0ed6e4f71c005edc616734c31b3eef5a14bded94afbc0ab17d82b1d85d7fea537418742e84424f755b2cd83c0eb4681e9b737cecb8c0bc09343f09d44f07ed7f96cbd6bf6e39b55b7ef7bcd79dc089800e99d7fa2598d8380dbc6e84917ee1f725e7f9089da77a38b1de16ccdff90a846f02e30f7ea06300bd10f4aecdc6c762f2bd2fbff93397eaa5ab20fd4e50fe16aa2f8457c7a0e9154103fb719f82fb17c1fd377e3c49c5ef0efffa677beb8709fc076438477f24207a39867595a47be7078111c831d857028c047f39507150e07a26b0782e408125207b5df0812360819890818e176e90076734320925987069377d2f607a3a207f67178348d68012a8833b183433680246b38124007e5c60783a607630108424d0813de0832500842da84ad1f7610f88074d48024fe80843687191d7054528048b368537b83800c8836568863f837cd2e602b5970353270569d8609d258630008742e0206c88036e5873fe077417170f75a8037738097a287439180380d87cb757049c166f67e8888fe833065605a9248089f87986c802eba5855d20894e408929480682673b64b80e9d68049f08737c3187ff106000de077707b88ac8868990488bb5482877a27717787adf0575a36482b304852ea08b27108237258536388b92178c2d308c26508c8a38805cd08a68b566b1e871c9688bd9a88d30d28c4e888493a06d5c90800f7082ab274107f38b2f908422108e60768c40408575d08d57f88d8ed08ed5888d29b03da840738e668d3e978fdb289003191e9568873080873860802de6795ce08ac377060619880859807df48e2c407ead20913900250979020bb97df81578eba26ef0f88f3088096da3922bc936cf48902f09930de19125305a1b89030b1805ebf800dae70288880360e86783180336790238997517696c27590933490235890946398a7ed803089000ffef7284e6488a4ac433ff16935de995246185241803f328964e56635b608a46b08435109622308464e99616c9870c9895d5d0960ff09679a78ad715007da90090d30df7a88284873b5b5904fdf89589a998b7907838d06f3a49884b40941cb80523380235e8038d79028f299468208a615497bba0993f68039d896086e98920f97f526952a8f98a8b099bb1c90b695904c8c294c08045a427057789984b409b6a1803b739022549039fc978acc90ebf996e32209ccc6006f9331a03409cc8189a95009d1dd19bb2a99ddb2907f025046e389925709534e09d87270570498e03619a30109e24309e3d609c83c97df2509e6d3803ed3902ef996bae798ad3499dffc87942fc699edc49a0055a0a7a2903e829982a579d2c809fce7906083a9698b0a08187942a909107ba8c30a0a0cf29a043209da709a003f4a13367a0278aa271f0a0e9b99f8f4206a35902d3e68585607fe978732eba53172a3df128072b5a717d8299fe58a2b5e69f611890ab35a423909d29caa44d1a9493b090335a94657097e588910d6906cdf90051fa9432068aabc985eda0a55cba60229aa47819a47439a2ae709d1cb1a44e0aa771ea0277096ceb05943460990f70a75d7a06745a54581a8a3aba413c1a077e5a9cb962a6253a00560a9a6baa9567aaa4722aa993fa03304a028025752af36b50e0932790a63460a92380a9eb997a7329a40d6a0bffa12a02a3ea0891299fae49009fda8761da9a90fa006f4aa9b97aa2e308957d52a42c809e35a89c3a50a151c0abb3ba07bfda02f1197e8eaa0bc7aaa680a0ac187aa604a09af888aa76d0a66aa2abddeaad29509f39a09a524a9a62f74044147bea09a5e365a3a5faa5c84a98ee10ae0ac9ae2f182e67ba000d30add277a4f265abb7faad014ba90f997d3eb05eb82a03c39a034778972ef702049b27069b92396aaa2ddaafa500b124607c076bae675a000a20ab169bad44f7af002bb027eba476fa039d10b23dd9736944aaee8a3c2b7b96815ab1377ab178a0b23ec0b2f75ab20320002d6ba4236b5d908ab0288bb402a9a550b9a35ef6620dfaa09bc805ff4bdbac80b0964226a8196a07540ba67b70b5ff69ab8b9aa8f14a0bdb3a11479bb4695b8b3ab9a53f40ae2570a73390a7c4f5b623c0b41a58913e50b7a2fa60ef1aad2be80e6c7bad10b0b7abeab3255b1183fbb764bb4bff8ab66a0bb966a8aa3ba904ebc5933d9080567a278a5ba9c557b99e6bb37e7baaceca98a02bb19b9a61884b935f7ba54ab997461bb9b1ab98e308869dc0b9a206a864f77cc295bb3560bba19b8a5149abd540bb4bf0bb78a7ba2570b7224bbad659b28f2bbbd16b7e79fa00cb3ba8f67a6dbb5b039d0a826840bdd6db278cfaa7a2cbbcc3cb0bdf7b9c8020be389bbc763b7baeeba18e2bbdf34b90194b029cabb03920b55050b8ff3f96bf27c0ba3160bf2380bf12da7fe4cbbecd5b0b032c0205bca1b0d8be0ab88580ab8cf24bbf176c8bdc1bb14ba0c12802bc56cb6a44bbbda6fb031dec7432db33c24bc1ea60c22270b9ac188b66ab1afea9b5c068c1188cc38e58b80fe0922dc0c00f10c03eec08e9d596fb2b053bdcc32cf0c341ac02ccdab58c5b0d481c054b8cbc11acb1215bc3af7ba6d09bc35d5c6f6cdb81f34a8cbc980829a7aaeb5b1bdda30462ec8c281c28d03804f000c6ad8509495cbe4d230079acc77bccc77d4c005c530e760cb62bdcb829c992878cc80020c85eccc821879e0f10a4ff0b916192950fbaaf2bf0c8914cc27b88c058a9c0b290c95120c905fbbe016900ff0a70975f05c742c088ead7c8af0ca7e358ac2dd0c20dfca2093603c2f9c28246a16f78bcee78b39e6cbeb920cbbe9cb7102cc22e1000a96c6eab9c1c9095ccb02ccd2f49bd8b1c147c3a066df9a33ae2bd75bc053f6cbd32e0c4f03a9feb50cddf8ccdd8fac934a0a5121c929d266f843ccdf3ac9da9bc966c5c8165209cede4b47daac64b80cf42b8709dccafd15c0af6bc05015d96c8bcce34308e23b0cb4d9bb30069d0f46cd18f58cb908c96994a06f8796ac625b42f90d19f3aca3439d0c1dba8c37c0b23bdd131fbce8d982dd498bef23c7e847ad1375d79254d02b3ecb204ad04380a033afd003cad0442cd8ed218ccf099b5369d06463dd448edd3ff09acd22f5d05463cc8505cd3f08bd35b5d797d62cd2bf0c35f2d030a6d550aad9fa30b08629d02617dc0283dd3580dcd84a0d610c0d60c3dd55190d12210a4591cbf13cdd57f4d798ffcb50a7dd47833c432d09697ac0282dd0584fdd4c01cd526e9d770c0d85ce0d8443db40d1dc27a93d2341da05a0dd8a10d722baad105d6b36360c20416aaae0a05a41db24e5ddac698d4997dd7b3e0da9c78da8558d13030b922f0a67c3db6e52cdac3fd88d48bd9b4dc09e11c48c8899f715b03c64d75c90dd96efdaaf0ac0ed0dd0519addcad3bd92ac0b67addd9704da2a04ddce5fd69a93c0089ac3659360696d9918eb0dd6c2975ea9d36ec8d82d45db59e7d0bffe84ddf6863df54cd756500db401cdec25db64c6dde09ae6479ed24aced03f8194f2772bb3dc0e02ae2e0583bdb576de0ba50e12372e11a2e9265d0db3c5ce0215ec1ddade029de64034e25974c9693638f68c0e24e52a4e3bcb81b9e0b33ae22d309dc10c0cc4bdae387bbdb2a4ee475e6d88072d6058d0501a359733dd6569ce42960e368addfb570e47892e43d7ee5256edd8549de450ee6db65c58f3d067b0b2942edb02e30e6c7bdac4bfde568b0e6ea5cdb474c516f8de3598de261aee7d945daa012d22b60c2c213d01ffee0631edb5b30e5772cdeb4d0e78022ab3d9ee820dee5273ee47b6ee9fbd5cea0c2c4609d084e1396565d5786ceba912eccff553e0b990e28570be99e00be086ed7a67ee9b1de64cc0c2ace1d0323182fa18ac64c68e8b62ee56e9ee76a40eb8062eb3dfec80f7084419eba6f2eebcdbe52230e2a112d03f4d702f839e13500ed8022ed4d0cec950e07d98e27db1ee46567e7267ee0cceeece9ae503a8e27971caa17719bdb3e03ecdee2f79dc25c0ed3ba40ef34eecc39b006e45eddf97eeec1aeee05af50577e2abb5e9a84302449e8e43180f0a0a2f0bf9ee192eded6f10f180a2f0e3fedf376eee857cf1062ff228f5c313c3c52c709bcd91660a66e8268be8ddaed97850f2c682b01c3fb101efca941ef323cff34b156613f3e7dc4e08f0a1599ed9f297799415cfdd210f7d477fe8ff381fe066e009d9a9ec55ccf43d8ff5be84eac6b2e9d74c086b51b727bf864e4fe02faff44949f0594af64b68f30fecf1933ef0579ff5737f49df7d330fdf02019d19013df10145f66a4dea4a3ee7ad60f713f3d56d7fd8508f7f3a3ff874eff80805eea722ef2fa0d30661bf8a7d6e644fb9661fd94bbff3c640f6118df89d5eee700ff29ffff8a98f490fbd95d71e0396ea6d439f0c9adfb6167af6d48aee61c0fa3c33e1abde09c9eeea720eebaa4ffcc094f1c6d2f732f8534de7eb4faef90a1ff8b43dfcad70fc09afc28bde057d0efcb92ffcd85ffcdfdf4b33cf33a0ee03b7190ab719df3420fe3743fe9908f38d5f09eb3f31ed2fd1729f023b4c64ffa52ff0a70fff20008923599a279aaa2bdbba2f1ccb335ddb379eeb3bdffb3f30281c128bc62332a95c329b4ea6e1219d52abd62b36abdd72bbd4a0c3ab4d4000e22c62183db3dbeef7d7168063033733ddfac4adf3fe3f5c0d1ee083d120a09dcce1df9e20a15463a4e42465a5e52566a6e62667a7e72768a8e892c0a3e9695d905f0384df025129aa2c6a22cddc632dcda2dfe848ec2c30a2aea9d1e9c1cc6e5e6f325daff33374b4f43475b5f53576b6f676c942f0f76a10b318401f9c009137f8ba1b6bcd2d612e32b1b33afbbd97bb22fd50187fccb837cbfe712b68f020c2840a17326ce8f0612804f82676790544819f047e0c0c9148f123168bb64cffc9dbf7c89947902aa7880448100801532d61047433f024c49c3a77f2ece9f327d0a042816824540000d2a44a97326dea34a9a9633fccbd2990670091a2808e3eedead569d47724efbcfca4f50fd7af6abf86354988c881530c86e11455b3cdd0bc7af7f2edebf72fe0c03d62125270e4ee193240acaa9c3b843020c3861e299e014f980dc4679c41fe23b988662f9569961d7c0addbcbaa1427b11ecfa35ecd8b267d3ae6d69c0238e467efd71fca333c5d1407013d25d84b71fdf322eff29e9527528e2808cc37aa4fc05eb2e439863760be8e65bdbe2c7932f6ffe3c7aa154af22e14e072bd1955283ac7fdffe117ccb633397e6541f4e7e45b807606ae1ff01810063fdb1901d17e07d971e84114a382185155aa80472795c47c47e3ea444d14c3f6448c786437418c3807038471a749f8c084789429ce802835b0481803d8f00e0488b9ed4a8c585410a392491451a39de8f587c361921a8fd90233efa88f3c892a03de2248a337ac7c828495e5125115e5a81258d0ada80a32c606267662662ea71249c71ca39279d7556f3e11fd41df748883bbc08ce8a3be0b951127fbad1670b29be1168993d7232681e7a564708a22ab859c50f0148670c8f06aec6a69da18a3a2aa9a59a1a833f80046884a26ea431154844a4fac7aa029af26a96b890e5e826b3fa512b11adb6816ba39ee610c0a55954da42b25338c8e5a9d1ff4a3b2db5d516099c864b98221c0f9bb213230fd892a82d65fae9ca1faf9a880b23b98470bb42b3901cdb4082b3bcbb66ba9ac45b88b5fdfafb2fc001f755af1f6a86f9080141304091c13c109c47c342c49bf0725a3ed7a400196bbc31c71d7bfc31c820b7f0301d114f4908c5f8621cf2c7042445b22c0310bba51f2cdb7c33ce1c170b48ce3dfbcc32a3020b3d34d1451b6dc27f7048ba2721c0ea70163bf30191f41b4b4faaaab9f1ecba52302c50ed86d54318da86d329eccbf51929d385f62c3bb30d0c9947cb3d37dd75978a91514c08cb46d837c4854f0144e0bd95dea6f48dc2de6704bde0db6daf30385a85e7c662e3516f5d79be239c8d391571ffdbfd39e8a18b0ee1c44d98e2b90e507ea33610a533717ac5e776caf98396226cfa9594d33e0beb05eece0bb3bf9f363af1c51b7f7c60db3611ef8e4034808f031c96cb04f3b16b8daef0caaca03cf53aea9e7dd333fb0ebe4dc193ff07eac8abbf3efbed6be3ab1f52177a2b108913227e0ff0e7213f12630f9bebf566773e36ac407f74e0df11fcc706fca16073d94bdff7062806b749b00d10741f0633a8c10d5ae279796b82fdbc103d20dca37942f020e140688a11be20845d581cbc2a881715a030722a7c040b1927433a2c2b823b0492f97ec8860b72b088463c22127b00b337f42e09a668a20e16b60e93e560896e80e2119e08c0eeac4d88365281ff15db80c562dc8e825ee4c2000ea7b23366c18c6cc402119328c739d2b18e22f89bbb9e20c514fe0072c150a3dfb8d7843ddab08516f3e11b9d95023c02e25e4720a41f02e7c6445ac19134a3a4bc7488c92cc4d18e9efc242891e7c7f83d6194910202238151b61d98f280a5341c0c5cc80518da6e93984a412be1804024e4b26a93b4e5182f89c95f6eb293a13c263293593448e641924ef85a1ba85883300222983960261d9cd90468b2419a2390e5166869365bde1205d8848336a1600a6f3a9073d6bc1839f9a5c978764e99f6bc273e87a6c53d782b5b3001872575b0cf27f4735c86945d17c9a982813aa1a0ec0a223d1fb000060ad096c4c4a431f3ffa9d18d727448e01c4323ce19082018907e42f86816026a04910ae4a0014ca84511274827b0b47cf38c2703285ad14d5e949219ed2850832ad4f1d4f00fbb4c422fdd90431e404a2644282a29f790d4362c5505284d05f6e29902a8eeaf11536543554fd0ceb7bd737c31bd69447f3ad4b5b2b5ad7c515d3623c1cd3348a907637d805a65005774cad51475b5ea21d7a85014ecb52a7d7dc45fc51a516f9a95a7108d285edd2ad9c952962fa9f443598be050c35e2418e2a4c165f39059226cd60de9042c421b3bcc1384960ea31d4269db705ac592b30080dce96ad14acfbc56b6b7befd2d35a0961149d4b40d47bdc15cdfb0caa7cd548f6d61c155aff059ffdad21305c2cd834a1ff9dc71dab2013acdc15dd1d6d344f216b8e63d2f7a35515c361c17a9eb0c426c0d2a84f59ea1bdbc7c6fa2023b5e219a73bbafa4926ebd0880e9c2d4b101266779d3abe005335809f13dc36cb7690a70e1605d7fc8ee0d1e2c8608abd33a2e88ae15085c82f0720d051af6028797905c2f50580424664701300c5ec8ee978d096e308e73ac631c80b80aaf252d7e82705d40d8f7063da6c28f611be4fca65698943cc191a79064219cb80bcb2dc31b01105689d1f8b169dd3198c32c661f28303194a0af1844dc82a646f26a8d3cb37ebf19e70327f2046516838c571ae717cfa2000d28b20ff81c2b2fef76cc863e34a25d50d83700fffa085fa56b10160d87c4f640d2c6a5c4a3c540e91244590a6ad65c97bbe15fa9fa3586325c40036edbba509b1ab252b871a2632debdeb299b3935871458270e7336c5950a648718729c5e497aaf6c925a8b5692b816b2ef450d07e00400312d0682e47b4c66784f5acb3ad6da10e190e5356f223a61d4b546485a192a87217ecdbe9077cdac5ac1641b799789b5193c0d91b464ac602a0eac3bc9bbbae8eecb6032ef08113bce0063f38c213aef08533bce10e7f38c4232ef18953bce216bf38c633aef18d73bce31eff38c8432ef29193bce4263f39ca53aef295b3bce52e7f39cc632ef399d3bce636bf39ce73aef39df3bce73eff39d0832ef4a113bde8ff463f3ad293aef4a533bde94e7f3ad4a32ef5a953bdea56bf3ad6b3aef5ad73bdeb5eff3ad8c32ef6b193bdec663f3bdad3aef6b5b3bded6e7f3bdce32ef7b9d3bdee76bf3bdef3aef7bdf3bdef7eff3be0032ff8c113bef0863f3ce213aff8c533bef18e7f3ce4232ff9c953bef296bf3ce633aff9cd73bef39eff3ce8432ffad193bef4a63f3dea53affad5b3bef5ae7f3dec632ffbd9d3bef6b6bf3dee73affbddf3bef7beff3df0832ffce113bff8c63f3ef293affce533bff9ce7f3ef4a32ffde953bffad6bf3ef6b3affded73bffbdeff3ef8c32ffef193bffce63f3ffad3affef5b3bffdee7f3ffce32ffff9d3bffef6bf3ffef3affffdf3bffffeffff3f0006a0000e200116a0011e200226a0022e200336a0033e200446a0044e200556a0055e200666a0066e200776a0077e200886a0088e200996a0099e200aa6a00aae200bb6a00bbe200cc6a00cce200dd6a00dde200ee6a00eee200ff6a00ffe201006a1100e211116a1111e211226a1122e211336a1133e211446a1144e211556a1155e211666a1166e211776a1177e211886a1188e211996a1199e211aa6a11aae211bb6a11bbe211cc6a11cce211dd6a11dde211ee6a11eee211ff6a11ffe212006a2200e222116a2211e222226a2222e222336a2233e222446a2244e222556a2255e222666a2266e222776a2277e222886a2288e222996a2299e222aa6ffa22aae222bb6a22bbe222cc6a22cce222dd6a22dde222ee6a22eee222ff6a22ffe223006a3300e233116a3311e233226a3322e233336a3333e233446a3344e233556a3355e233666a3366e233776a3377e233886a3388e233996a3399e233aa6a33aae233bb6a33bbe233cc6a33cce233dd6a33dde233ee6a33eee233ff6a33ffe234006a4400e244116a4411e244226a4422e244336a4433e244446a4444e244556a4455e244666a4466e244776a4477e244886a4488e244996a4499e244aa6a44aae244bb6a44bbe244cc6a44cce244dd6a44dde244ee6a44eee244ff6a44ffe245006a5500e255116a5511e255226a5522e255336a5533e255446a5544eff255556a5555e255666a5566e255776a5577e255886a5588e255996a5599e255aa6a55aae255bb6a55bbe255cc6a55cce255dd6a55dde255ee6a55eee255ff6a55ffe256006a6600e266116a6611e266226a6622e266336a6633e266446a6644e266556a6655e266666a6666e266776a6677e266886a6688e266996a6699e266aa6a66aae266bb6a66bbe266cc6a66cce266dd6a66dde266ee6a66eee266ff6a66ffe267006a7700e277116a7711e277226a7722e277336a7733e277446a7744e277556a7755e277666a7766e277776a7777e277886a7788e277996a7799e277aa6a77aae277bb6a77bbe277cc6a77cce277dd6a77dde277ee6a77eee277ff6ffa77ffe278006a8800e288116a8811e288226a8822e288336a8833e288446a8844e288556a8855e288666a8866e288776a8877e288886a8888e288996a8899e288aa6a88aae288bb6a88bbe288cc6a88cce288dd6a88dde288ee6a88eee288ff6a88ffe289006a9900e299116a9911e299226a9922e299336a9933e299446a9944e299556a9955e299666a9966e299776a9977e299886a9988e299996a9999e299aa6a99aae299bb6a99bbe299cc6a99cce299dd6a99dde299ee6a99eee299ff6a99ffe29a006aaa00e2aa116aaa11e2aa226aaa22e2aa336aaa33e2aa446aaa44e2aa556aaa55e2aa666aaa66e2aa776aaa77e2aa886aaa88e2aa996aaa99eff2aaaa6aaaaae2aabb6aaabbe2aacc6aaacce2aadd6aaadde2aaee6aaaeee2aaff6aaaffe2ab006abb00e2bb116abb11e2bb226abb22e2bb336abb33e2bb446abb44e2bb556abb55e2bb666abb66e2bb776abb77e2bb886abb88e2bb996abb99e2bbaa6abbaae2bbbb6abbbbe2bbcc6abbcce2bbdd6abbdde2bbee6abbeee2bbff6abbffe2bc006acc00e2cc116acc11e2cc226acc22e2cc336acc33e2cc446acc44e2cc556acc55e2cc666acc66e2cc776acc77e2cc886acc88e2cc996acc99e2ccaa6accaae2ccbb6accbbe2cccc6acccce2ccdd6accdde2ccee6acceee2ccff6accffe2cd006add00e2dd116add11e2dd226add22e2dd336add33e2dd446ffadd44e2dd556add55e2dd666add66e2dd776add77e2dd886add88e2dd996add99e2ddaa6addaae2ddbb6addbbe2ddcc6addcce2dddd6adddde2ddee6addeee2ddff6addffe2de006aee00e2ee116aee11e2ee226aee22e2ee336aee33e2ee446aee44e2ee556aee55e2ee666aee66e2ee776aee77e2ee886aee88e2ee996aee99e2eeaa6aeeaae2eebb6aeebbe2eecc6aeecce2eedd6aeedde2eeee6aeeeee2eeff6aeeffe2ef006aff00e2ff116aff11e2ff226aff22e2ff336aff33e2ff446aff44e2ff556aff55e2ff666aff66e2ff776aff77e2ff886aff88e2ff996aff99e2ffaa6affaae2ffbb6affbbe2ffcc6affcce2ffdd6affdde2ffee6affeeeff2ffff6affffe2f0007b0000f300117b0011f300227b0022f300337b0033f300447b0044f300557b0055f300667b0066f300777b0077f300887b0088f300997b0099f300aa7b00aaf300bb7b00bbf300cc7b00ccf300dd7b00ddf300ee7b00eef300ff7b00fff301007b1100f311117b1111f311227b1122f311337b1133f311447b1144f311557b1155f311667b1166f311777b1177f311887b1188f311997b1199f311aa7b11aaf311bb7b11bbf311cc7b11ccf311dd7b11ddf311ee7b11eef311ff7b11fff312007b2200f322117b2211f322227b2222f322337b2233f322447b2244f322557b2255f322667b2266f322777b2277f322887b2288f3229979fb2299f322aa7b22aaf322bb7b22bbf322cc7b22ccf322dd7b22ddf322ee7b22eef322ff7b22fff323007b3300f333117b3311f333227b3322f333337b3333f333447b3344f333557b3355f333667b3366f333777b3377f333887b3388f333997b3399f333aa7b33aaf333bb7b33bbf333cc7b33ccf333dd7b33ddf333ee7b33eef333ff7b33fff334007b4400f344117b4411f344227b4422f34433f6a0800003b, 4500.00, 3, NULL, NULL, '0', NULL);
INSERT INTO `wl_orders_products` (`orders_products_id`, `order_id`, `products_id`, `product_name`, `product_code`, `product_image`, `product_price`, `quantity`, `product_attributes`, `store`, `product_type`, `shipping_charge`) VALUES
(4, 27, 1, 'ASUS ZenWatch', '01', 0x474946383961d007d007c400003f3f3fbfbfbf7f7f7f0f0f0f5f5f5f1f1f1fcfcfcfdfdfdfefefef9f9f9f8f8f8f2f2f2f4f4f4f6f6f6fafafaf000000ffffff00000000000000000000000000000000000000000000000000000000000000000000000000000000000000000021f90400000000002c00000000d007d0070005ff20248e64699e68aaae6cebbe702ccf746ddf78aeef7cefffc0a070482c1a8fc8a472c96c3a9fd0a8744aad5aafd8ac76cbed7abfe0b0784c2e9bcfe8b47acd6ebbdff0b87c4eafdbeff8bc7ecfeffbff808182838485868788898a8b8c8d8e8f909192939495969798999a9b9c9d9e9fa0a1a2a3a4a5a6a7a8a9aaabacadaeafb0b1b2b3b4b5b6b7b8b9babbbcbdbebfc0c1c2c3c4c5c6c7c8c9cacbcccdcecfd0d1d2d3d4d5d6d7d8d9dadbdcdddedfe0e1e2e3e4e5e6e7e8e9eaebecedeeeff0f1f2f3f4f5f6f7f8f9fafbfcfdfeff00030a1c48b0a0c18308132a5cc8b0a1c38710234a9c48b1a2c58b18336adcc8b1a3c78f20438a1c49b2a4c9932853ffaa5cc9b2a5cb973063ca9c49b3a6cd9b3873eadcc9b3a7cf9f40830a1d4ab4a8d1a348932a5dcab4a9d3a750a34a9d4ab5aad5ab58b36addcab5abd7af60c38a1d4bb6acd9b368d3aa5dcbb6addbb770e3ca9d4bb7aeddbb78f3eaddcbb7afdfbf80030b1e4cb8b0e1c388132b5eccb8b1e3c790234b9e4cb9b2e5cb98336bdeccb9b3e7cfa0438b1e4dbab4e9d3a853ab5ecdbab5ebd7b063cb9e4dbbb6eddbb873ebdecdbbb7efdfc0830b1f4ebcb8f1e3c8932b5fcebcb9f3e7d0a34b9f4ebdbaf5ebd8b36bdfcebdbbf7efe0c38b1f4fbebcf9f3e8d3ab5fcfbebdfbf7f0e3cb9f4fbfbefdfbf8f3ebdfcfbfbfffff000628e080041668e0810826a8e0ff820c36e8e083104628e184145668e1851866a8e1861c76e8e187208628e288249668e28928a6a8e28a2cb6e8e28b30c628e38c34d668e38d38e6a8e38e3cf6e8e38f400629e490441669e4914826a9e4924c36e9e493504629e594545669e5955866a9e5965c76e9e597608629e698649669e69968a6a9e69a6cb6e9e69b70c629e79c74d669e79d78e6a9e79e7cf6e9e79f80062ae8a084166ae8a18826aae8a28c36eae8a390462ae9a494566ae9a59866aae9a69c76eae9a7a0862aeaa8a4966aeaa9a8a6aaeaaaacb6eaeaabb0c62aebacb4d66aebadb8e6aaebaebcf6eaebafc0062becb0c4166becb1c826abecb2cc36ebecb3d0462bedb4d4566bedffb5d866abedb6dc76ebedb7e0862beeb8e4966beeb9e8a6abeebaecb6ebeebbf0c62befbcf4d66befbdf8e6abefbefcf6ebefbf00072cf0c004176cf0c10827acf0c20c37ecf0c310472cf1c414576cf1c51867acf1c61c77ecf1c720872cf2c824976cf2c928a7acf2ca2cb7ecf2cb30c72cf3cc34d76cf3cd38e7acf3ce3cf7ecf3cf40072df4d044176df4d14827adf4d24c37edf4d350472df5d454576df5d55867adf5d65c77edf5d760872df6d864976df6d968a7adf6da6cb7edf6db70c72df7dc74d76df7dd78e7adf7de7cf7edf7df80072ef8e084176ef8e18827aef8e28c37eef8e390472ef9e494576ef9e59867aef9e69c77eef9e7a0872efaffe8a4976efae9a8a7aefaeaacb7eefaebb0c72efbecb4d76efbedb8e7aefbeebcf7eefbefc0072ffcf0c4176ffcf1c827affcf2cc37effcf3d0472ffdf4d4576ffdf5d867affdf6dc77effdf7e0872ffef8e4976ffef9e8a7affefaecb7effefbf0c72ffffcf4d76ffffdf8e7affffefcf7efffff000ca0000748c0021af080084ca00217c8c0063af081108ca0042748c10a5af08218cca00637c8c10e7af083200ca1084748c2129af084284ca10a57c8c216baf085308ca10c6748c31adaf08638cca10e77c8c31efaf087400ca2108748c4221af188484ca21297c8c4263af189508ca214a748c52a5af18a58cca216b7c8c52e7af18b600ca318c748c6ff329af18c684ca31ad7c8c636baf18d708ca31ce748c73adaf18e78cca31ef7c8c73efaf18f800ca4200749c8421af290884ca42217c9c8463af291908ca4242749c94a5af29298cca42637c9c94e7af293a00ca5284749ca529af294a84ca52a57c9ca56baf295b08ca52c6749cb5adaf296b8cca52e77c9cb5efaf297c00ca6308749cc621af398c84ca63297c9cc663af399d08ca634a749cd6a5af39ad8cca636b7c9cd6e7af39be00ca738c749ce729af39ce84ca73ad7c9ce76baf39df08ca73ce749cf7adaf39ef8cca73ef7c9cf7efaf39f000da840074ad0821af4a0084da84217cad0863af4a1108da844274ad18a5af4a218cda84637cad18e7afff4a3200da948474ad2929af4a4284da94a57cad296baf4a5308da94c674ad39adaf4a638cda94e77cad39efaf4a7400daa50874ad4a21af5a8484daa5297cad4a63af5a9508daa54a74ad5aa5af5aa58cdaa56b7cad5ae7af5ab600dab58c74ad6b29af5ac684dab5ad7cad6b6baf5ad708dab5ce74ad7badaf5ae78cdab5ef7cad7befaf5af800dac60074bd8c21af6b0884dac6217cbd8c63af6b1908dac64274bd9ca5af6b298cdac6637cbd9ce7af6b3a00dad68474bdad29af6b4a84dad6a57cbdad6baf6b5b08dad6c674bdbdadaf6b6b8cdad6e77cbdbdefaf6b7c00dae70874bdce21af7b8c84dae7297cbdce63af7b9d08dae74a74bddea5af7baffd8cdae76b7cbddee7af7bbe00daf78c74bdef29af7bce84daf7ad7cbdef6baf7bdf08daf7ce74bdffadaf7bef8cdaf7ef7cbdffefaf7bf000eb080074ce0021bf8c0084eb08217cce0063bf8c1108eb084274ce10a5bf8c218ceb08637cce10e7bf8c3200eb188474ce2129bf8c4284eb18a57cce216bbf8c5308eb18c674ce31adbf8c638ceb18e77cce31efbf8c7400eb290874ce4221bf9c8484eb29297cce4263bf9c9508eb294a74ce52a5bf9ca58ceb296b7cce52e7bf9cb600eb398c74ce6329bf9cc684eb39ad7cce636bbf9cd708eb39ce74ce73adbf9ce78ceb39ef7cce73efbf9cf800eb4a0074de8421bfad0884eb4a217cde8463bfad1908effb4a4274de94a5bfad298ceb4a637cde94e7bfad3a00eb5a8474dea529bfad4a84eb5aa57cdea56bbfad5b08eb5ac674deb5adbfad6b8ceb5ae77cdeb5efbfad7c00eb6b0874dec621bfbd8c84eb6b297cdec663bfbd9d08eb6b4a74ded6a5bfbdad8ceb6b6b7cded6e7bfbdbe00eb7b8c74dee729bfbdce84eb7bad7cdee76bbfbddf08eb7bce74def7adbfbdef8ceb7bef7cdef7efbfbdf000fb8c0074ef0821bfce0084fb8c217cef0863bfce1108fb8c4274ef18a5bfce218cfb8c637cef18e7bfce3200fb9c8474ef2929bfce4284fb9ca572e9c033840000d0000001e40f39adb9ce60b00000304908000c0c8000910000100b0809b1b9de632dfb902ff028000d5064000333fbad4a7fe80053420014d2f11021cd080a253fdeb371f000004e080acd733e6324fbbdad7cef6b603c0004d4880dbe74e7799830101096000d8f73ef5050800ee993040dd07cf76c00341f0844f3cdd0d2f05c42bfef16b4fc0180e00f9c4f7e1000af03adf377f73ab335e0b68afbce8474f7ab77ffe8a51e7fcd709d00401a81eec5e7080de5f4f7b9c2bc0ec940840eda7eef320e87ef79c1740151400fce08f81f8c53f7aefef8080cc27fff50568c001b690fae75bfffacae762f5ad3ffd25b81efb5b4080000a807dd513a0fb93f8fdf597ff03f597dfe800a8c2ecdf6f74e18b61fed86fc01d0e408001d09ff300207958b07dffff5780afc77e584480c9c77ade577e59207efe67807cc700e80709eef77c08d80317688055108112f800f617061e887d0b5007fcf7819c57000258050a88822e68741968452d587c157804df777d58a00023f88254777e91b081c517833b0084ff27844b60002f18825f4084cf57836d80000dc0832968844c308352e88254284556b87b0c980437687d5660009a77855f37000a6081e5978537c084efa7844f807c28e8865d1085ffb7826e90003b48865fc700b8f7045ba88705a88650f487b5d78745f085cf570588088854b700a787086c487b82580391887df12705f8278172c80563587e5dc8060840888c587303e00052208aa3b87edaf77f9b3804ff8b587c5370009d988a53370076980895a87a934803b9888352908705d88a5970000638006ee000c0488b53f7894d808aca1884ab487f036088aee88051808ccfc87704408d84d08b9bb78b33e08d18180548988461900012f88865f08ad9d877dc7804ced88e92188df4278c40c08ebb170570288f5fb700ef1808e2b877e0280301597cf67804e8688e6090896da80608c090fce88e4e108f11f98df4f87ed38804f8587b50400015b97705a08e009986425090c077894fe0910af905c9787d25880608308b1f297505e084f0389324b94514697c36688d4da0923849750320927f6092543790316094f90805e4b7925d508e12f88f5d109341b977fe5885ff55697d48a9443bb979c6d893e0f79359598644d9074a29755bf90267497b654904c4c88307a98828688a65409563d98f5209045d799735979648b4977c778b42b091b427967c598b6da9076b098325298567e80409e9949c8882cc787732799836c7004b00987ce99747c49960570060e98b4ab08f98697419d98d3909048ba97a9ae90440e98271390508e082a24906a019918f8904b999959e6944bd497582798f3e89040e709a78a99ad8f79b2bd09a9cf7954dd09492a90591f98189690574889c54779d3b109c41c99c44e49d34690484f97a4a60002da99d0f50997ee09c7dd99852c89d3ef09670f905b12981bbf905d5a99e47f79237c99f7c079eff43249e52379c3e509eaa97047609a047979f45b99aed77850e8a04fb19872cf98228e90507909e003a9bddc9a002799105e89f83599c45909d201a76f22907ee4973028a022d3a8186599f4f2985794905041a9136a99729fa752f1a44399a7dd518964610a31549a2ed09a13e60a460079d4a209dd38905088a7d74d905a6d9a336c79e3c8aa56829a20598a1c449a444800050caa535e7a17310a33f6a024c0a762baa03f449a35c10a453a77f5db0a1667a743bea0374ca8f6bfa437d7a737f5a0253ba79a3898205c07697f97f03b0a777a0a6f0e9984b50a116ca05b52985b7c905f7f98139c7763ca8a57c9aa78ca993183aa4a43904782a8100b074ff2a007410f97eaf99a4cb19a99fba049b5aa95b709c57e8a88de7820c900044e9720d50a6f4c7ab3a10a8ed38a83d84ac36a7ac2250a87c6704b77a7d032000c64a027847ac4aaa98dbca036dfa75998a04dafa81680a9b6438a15610a805707b316000d36a7d763a04e2597af49a786fca95b51a04d0ba774510a76d78a328a0835ffaa0b3ea7b7a78ad3ce0af516a05e32a81b18a0550298de56a0207f0aac9e7a441209e98c4ac3687b033b0afb04704ef5a7c218903a11888b2aa8a064b86061a04948aab5910b152b805235b7c0be0b12a808def57a5196ba293c4b13507aa3800b25f37a6ff77953a50b3bbf7b0dc5ab0aca98742fb034acb8a5c70a5ff2fc8b355a0b0d717b5edcaa1b4c7b43fa0b19704b43587b33040b4544704689b9c3c30b5b467b66c00a92b7b85e15a040dab89730a88f16a056bbb7a3e809eef4704626b49644b735c4b037d7b744470b7b587b43de0b6aab7b77920b74f7bb047a0b5b2c9058c88a454c0b8b577b8e1b8b3f2eab39254b83407b72d90b8463704ba8a7d4319048bba7b188b07941ba17ad8b23ed0ba5738b14aa0bb6488ba4420b3d6c7b93ca0ba3727b9a12aa69464ba20f803c66b734300b99b87ae3b90aa54ca07b5bba48008ba3980a252c8bb49e0bd5788bb4d20be170bbc2fe0b99c47bc3c30b895c4bca959bca4cb035eab7aeccb03565b7cdcdb06d9ab818058b7ff4210bb78ab05ea6b80601b0505cc9342f0b2bb07b034e0becbab87e0bb02cf5b7342e0bbe3b8b8e537bb76d0bfdeca880e6c03972ac15a80b93cc8c14f20bcc907c04090c021dab3cafbb37a18bf3a50c1342704d2bb7760eab2a2dbb42a5bb97a88b54080c1727a05f92b85ce4a0347bc7be4bb03e6bb7b13ec02102cc3242cbf31cc032ebc774dbc03590c76c85b071e3c848cf8c53ef0c4999b05165bc451209e2c7c78d877c01f7ac591c4bc3487c23560c30f10042a0c7c6d0c044b4c7bf7cba2dd2ac68018c83b20c0038c05ca68c84a50bf0a6cb72e2904535cba8cb8c52f80c741f0c7af47c64030c2d717c26a10c63af0ad7c07ca32e0c96418c5ff4440caaa67ca7afc7ee83b03395cb4307caa11fcbf566ccb6d5b7ef76a03694c7b424c07a29c03ac0c76c1cc0344acc65460c6e33b050cdcb849f0ccaf17cb2b30c9733c8a969cbaf39b035d2c94a5597eaa4c06c38c03c5fc759cac03cc0cb35580c82fb8bf4390ce9b9c047b5c7bce6acd9044c735d7c73280c940507e702c04265c7b3b2ccc833ccaa3c8c837c0ce0618ce4110d05768c74a209e498c02d7bba5ba4cc9d85cc3dbbc86e547bd43d0cdb5e8c35a49ab7ae8ca2e80caa98c05d27c85bdec038ebc79266d030abd770c9d02f6fc48f85c7308adcd728c039aac8b4bf0cbaf17d3e25cd0c49c8ac79c03c9accc98d88e359d03e5b7d33d109cff4f7d0237ed4839fd9e43bbd136c0cf4a80c7136d05e3ccd1a378ce3700cfe48a052ffd752bcd77037d9efe6cabd757d52670d58d94d54897035e3dd5d8a7cf249d7cd91cca464dcea9f8d63930d3c17805ce09000ecd79446dd0d847d797bcb5b50c8663ab8cccb9d7ed6b894c30cfb527d95c30d63650ce21eb03289dd2d8697dc207d24697d408597e81bd03156cd83860d78c84d7797d039abd03e567d642e089933bd8643d8a83bad44c0d05887d941030cb52e7cece2bdccf6d7dff5cdb5c7dd7cff89bbbad03e0dc046b0d76b4fd06a24d89b408da1080d6695d05a7cd9110d0d620090560bd04071000f23ddff45ddff66ddfd4ac02b6bd48b86db8ffba5ddd3400dbcdc8d9b40bdde25dd83f90dc545b05eceddd22d0d89bd7d21addd381b0df8ad4dfa7dbd5004e90061eb67d1ddc4e6bbba968da24abda56c0dc471782ac7d731e6d0416be072f8e4818be9e1a4ee107fec34a80e25307e238aebdcf57002bbea6675900cf4bde37d0ddbc37023a7e73df2db81bce07317e4833fe00e89bdd841de25ef8e4828de5fefb7c00b0e492ddb70450e455e0d9093a020d5eda5869e37f10e58634e5ce3d02563edcd627e1ffcde6fcdbe1a1ebe5690e7f7cbd7b0eb0e43667e4776c7d190ae17ce7da4e8ee77de0e68534e5548eb85aae9693de03730e07e1cd8b869ede86ca03c577b2cf47e834a0e052e7862b6e73ffbe2dc9958e078e4e48903ec1977ee396cd04b1ee0699bee7170b01a4aed547bd7bf1d79ba27eca3d2ee8f93c91ab7e07ad3e48e289e4a8e9cab58eebb3de808cbe06b7cee160d8b72d1e037d2b7cc04e05c67de624f0ed9c97df3590ec7460ee8124d1a1feb1c7de9cedaed7ef3e06d59e943868e67b18c7b50777dd3e05c44e7360cbe9af97edaa3eed301eefe9ee80a049c32ef0ecd67ed1879a8805cee51f6cd9cc5ec7bc2dbb22b0ef5270ea3587aebb6e74d33dba04af07e80e481adb9abccbf0f43ef2966ef06130ef30e09e2220d4dbd9eb9f2b021c4f73c10e03f61ee12760de4d3ae02ccfea2eff4762fbf1a4b8cf455f0231ea042abfe53ddee5ffcfd7747dcee2f0cec42230d753f0d37b87c2e26e919bb9f46f50f2466f8d557f74b1fdf4943ef4b22df65d00f36b3f8e882e75212fc5c097755a7f8ad28d02001fb96beef08240f67e34b81cefd726a0f62ed0f4ade7f6a1ade70d9f7cbdf7f110fd02c0e79f790f057dcf791e8df43627d57f0ef815cef87a34b8676f74818df82da0f8b42efa5a00f789afb2407f74767e962178f94ff0f57c2792b1ff75e42e03823ff6e557afc20f00a99e80c559f8672bfaaa2feda00fde8ebff2198cfb5227f0140c7ccb67fb4eb0fb219d02d20f76b17dacacaf0690eee565e4bea57f73d98cfa2cb0fc5f1dfe58e0faa9ffc3c057f7d58cf122d0f37cb7f32e90f3ff0f00020c349225f2a0a9bab2ac58c2b13cd324d0e2f95af3bdff0383c09bae683c22932980b0e97c42a3d229b56abd62b3da2db7ebfd82c3e231b96c3ea3d3ea35bb4454166103786b0114d0e3d9405e97c6f7e1b489f105b60474151aa6289030040e4819be40282e3e08b01d5c32f22c703e4496bd810e9ada80a682329db6babec2c6caced2d6dadee2e6eaeef2ba9272c2002e22fa0897eea93efc25f73a5972126f3d1b668e28181e404d2b25906cf755ab5d831af034a49693fd5e367bad27c323b1b6d3d7dbdfe3e7ebeff3f7fbffe37b67080682398be6f130060c99aa650d017a4b164dcbb73ce13605eaf644219c6c232ad20997e6112751351cffa41219466020884f58c68bd902a1cb9a366fe2cca97327cf9e3e03320b06ad58502c20f3384c65f3289d890c39892c108800149845ec4404a5f24c2a4a344e80c23ac62a9d9f33c8ca4c4bd32cdbb66edfc28d2b772edd536895c4287869ad0c8e8b281635e377604da6709c1a4d598240a002500c35286118c9d632284135ea71f708027581dd6e4e0b8f6fddd2a64fa34ead7a356b5ea18ff41d9af07395c949921e73691b09e22bbb8b88bcdcc7a390df2b268e83bae61c28e23506e7d128e6b511b9d445af6aad7d3bf7eedebf83e77edd4f0c8c8ba8ce7e9858bd60dafe8c17e96d053e0e8460fb480f921c6909e821d748c589633ed0d7027ad3b967ffd678d81d149e830f4218a184135208cb8282c8c0d825cec5c6de7c0986e11f7fba4994482a342d78601024e5e11504222a51d918e65da2220fa998b412883e5dc8601fa45518a490431259a491e1f5c8c20c344e959e524fe5d69e87ff1488837cb59d08c37e700c288441796446028c49c8284602a9e4c7439229a4a3e394421c20809c73d259a79d77e299279d1c5ab1a68f4a0079a4a083125aa8a187dee3670a3468b8089ffdeda84da45e8c895761257251e50a3419808d109d06c261a5479419068b1bde914a9860288a82149a8272a514adfe6944a088e29aabaebbf2da6b15b4d2c0641f360af5e614b0ee80c6a8482c85a93459ca9191105b2ad1ffa5988aa5f1e522d6f6802c0ab762016c14de0eb305adb5ea00aeafebb2dbaebbef0a29ee0c8d7a3ac3b2b041b9d019f75677a92ab21e9b0ab710d00b47642b0672b01bd89e412eb137a6d2999b4f4a8aee21e65acca0baf072dcb1c71f83ace08ec896c9af1eeb512c65ca00918b02c0af4e79661f62fda02d1c0ec4a068a95f30c7499a9aa582f3c4513a93310b2fbf64b4681b87dcb4d34f431d752df29e75c90012c760327928134d86d63934fbaf892b43705f1e58f7006a1f688fa0731a9f3427c4d72c3c8cb1b140b41c08d24e9cabb40a4c4b1db8e083135e381554cb40b2bd93167d371873b710762a7b3fd1b20c70e721b40fd426c197db6708dbff5813e40ecc05e2a3fb9d02e542f49dfa03801b1ebbecb3d31ef5e9395bcdf608902b992f3bca327e4fdeaba34ef68b0903712a1caba2a2151a32735237c471b31a3c0d79f741fc10aec7037beddf831fbef886de0e83e2595b1f44deb8e90bd1f063775d492034f360b3126d2eecfc19051bf2b30f8a32cf74e94b1cf7b4f783d6a5ce7be35b20031be8c0ed940f060132448eaee5b88a194f0cbc4b1689c496290f466b6d3e501b1d4a070155ecac0bf60b951338d7071709f082dd2aa0ddb8a70a053e30873adc210f7712c11240af7fe89361e33218a201b6e37d1f9c9c0c94a704cdd5c08547a81b0acf40c26d3de18a7fa91e116b80bd3c18f07f364cff060e7b68c633a2318dbbf861092628ba6219715c48bcc2065520b958c14f363008a2c17ce0c42440b1045554d92514d68415f62190358c9ffa68a80504faad8c6a9c24252b69c951048f8ff881232361d6c52dd47151fe62e212f1589ef9f900919c99c120cb80b94b283279a930640ce348204766815600d8252f7be9cb5f023398c2f4252d2f69cc63223399b5ec640cdcd8076e85d255bedbe2bee6d80b253e8b943178251cd2864a56326c0c66bb84ee8020c51272d19633745d1881f64965c2339ef29c271bd808449f41ea9d78b36615a2a98c519a329ba08825047ad6141e9c13383468e51834f9cd2caae251e1e2e7477039517dd233a31add2847ffa3604f12e8651134f32760304a478aea029b25d55f0c84f39f1afc1109f8930c43c5c03fe445419574f0df45d5c9832f1ef49128ed28518b6a547a7ed482e5dadd500968522b9014a07a5ca972c099875be9540715a46938c5e04c43105496a080612e510ad4c32cb27d475d2b5bdbbad1a48e20a486984754b9a656af35f5162a9d6620ca14537c2da9493368590ab3a0454394533f38fa025c076bd12b34d6ad929d2c651f18d90d12a3aebec9eb46385b8bbdda7511654aa80eaee45024f0547e5d05036993403f271c566fee30eb63fbe4d9cae236b7ba055964e51a085668f6434fede76d6701dacdae9604a1a30ca358e8d8e4ce1614c57442569530ff5dc8d2969d69fddd6ebbebddef0e2eb2051d4a70b1345c2a94f73dcea2ea25c84a82afca8306f03dc26b4be0d24b14f60ae35c4458111696e8fad48bb5fd5571c16be003237842e25d2e1ca892de809d770a0fe6c771859b9de6f621b07db82e53a1cb85fb2e22b1d35285880f8752040420c52a5e318b57dc5a25b4534d054e308d6b6c63d58897609c885381d707bc08e7a2c2e6bdf00c409c84de9cf608b28a667ead70d3995521b69b5ce65dc120e459cdf8c65ade32977f9263062b810013962390a330667d5c19c24496c17ec994a13e6c9593f825c37cf3308061e2f997aa909e89cb5c3c6df694995d1e34a10b0d971cebf81275ce305f5bf2e300ffdb23cd9e5cb30cc6c39745ebc0bd4aad6a18a43c46ab7501d1930e68a0ab6ce853a33ad53841349895c65eee12d2d4145e6fa3f350df12bc98055b6db50e52db6196b2f6d332992976fd5c1c5adbd6d8aa5e36b39bed0b7efed5d5b51e51ac61cd326423d7969e2ec24c936c048992c0a0731643b4854d0d2a5b3b0c924e9ab29dedee77c37b68b25ee7a75feda8470b3a1febc660beab8b03e63dd90826cc1fb0bf60ee98dcbacf90ce36a98bbdf078433ce2120f354521496d0b377c0c67d637b6313eef1104bc082ec2740e38dcbc8277c1c807e744893d9a650183b0d4e99e38cd6b6e7387e71be663b4b721622c85905f9c4a1d1f72bebdadd512f03aff07fd6d5b4dbb20ee950f74bbd41cc3be9b20ea9b633deb37bf3a042cdecd6907d50c5c0ff2d0a9e0e31ab459a62430fad66ad0aa264f81e450a7039f5ddeee1f549d752fd73adffb4e68aeabdc685a48fa13d1d02a49a6b4ec6aa65e0db8998430013d079a2638a7bd40f8b9576b0b4f9f3a21145f95bdfb3df4a24ff0d8e5eea32d2403ee58307d7ca57a099fffd4f35aa304eb57104019d4de08aa8742ae319f0462a33719c0f742de8330f6d1233ff9351e3bdbff84faa68b818c779c2ad8d11a7b3b8fe0f22c183e0c526f2adf27e3f612f67cf5612c75c2283ffdea4ff5f1732f932d387eaea0f3beeb972ad08ccbc0df2d2847f35b30f0ee439f16e8ff1ff8b51e16f4de11f8dafd515fb23ddcfa39e003ead6f1f51f769c1f949941deec5e3314dfb1c51c0d945b0e7443e4e140dd9100fd111f012643cb1511ca7dc1061e10e841600ccae0311d1f04b85f3c6c81085a4a191ca011c01e2eb8e03e75e00c4ce00a50c50d3ec0d295600062c1e6a1602028e19f8d551904a13b35e00c62611666540df6200e6a813f715f17e8e0ef4ddfebe5d102ca80f6a94001a4dd2af980097641fc3de186694132245c29e19fc2e59c16f2611fc6530dfa96e06941e0f581f879811c3a5afdf5dc199aa10f202270fc0810c0e116a8e11ceac0ff41c100320b1954a18cdd9d1f8262282e500d1e4fea506232906016b4a1052affa26ce1211aca8013ca8421c6c0246a41115a621180dbe70de109f6a21e7e9c280ae3309a112906a2c570413260e22da2e24d7422bde5614ba14b1802a08759c107e62212d0e213c822387022f9f10d0c12e33892e3c79062294a9b50a9023566c1186aa3338263e5c463adc4d94231a1156862364a5e1674a10edc21cfb962597d623912644172cc391e63ad70813f999c00c663a43da414c26213fd492a2ea13552c1b6e9e36d608146d2c12e96df915520a31964499ae4ec9c63a209e2202a6343c1034e3ce3f5011a42fd490256230b9ed44636e215c0c3368696fdc91ce79de45012e5d3a464250e64d9c0c30fbea02a4cdeacfd22d14de429f9880a0affd23d52c123ea2412346438aac23232dc54dadd151665599ae5a1a4a44a2223ba35081878e4f2c0644472e04cf20012c2c13fd622564ac12a6e2512e06513f8d30330e52d45259625e5592266627e475a22e51e3e413f961618606347c465612e9e58c2803bf69510d8e215e0621114409e89e66826034836c15b024ae759262f92a562bae66b3e485aaaa542724163a64b0bc20358a2995c36d26ada1783104f673a992af82403e2d3eac1834d4ae54e0625fac1e6734267bc14986d0a25166865e61c223c74e53ec4a4ce45239b61473dd6807056413e729b0639653bc2c3d53c0e6f8ad16146677cca674fc866d7658c1740660e0c80694241373a173cfaff26bf61260c58dc53ca00794e016a1e81780224f6fd647b7d8182f2c64806dd7c5ae885e2d88c9d55db0d5e3c2c805536c167d2974e74e7f544647e22601320a81444938162817bd6805dea40060201025c67d835672262e88ef2685dd4a77da2cb174c668319564c282777c22861d2250f48e847aaa85eb226271427ce8d5b4e26271768e684aa636bf668977a693ffce88662082382020180a80f3880792ee84e94e8732d69fdc8c45fe6254642015fd2013b624134c969105067114ca91064a9960a24977e69a11a6a3bfc28903adf17c8a83ff2670fa0e88cb2699242e38066a64c6ce79ce2e41410221d30a80292937ac604039c690f20c090e22895ceffdca1b26aabe643a28aa8737241ac2ee89fa62102b1278952aa4c7e2711ca8401ad281404ea3e9641321c299fa6c5001c6b0d18c08d06648e92a4ab4aebb4d243a2da206d326a5a14c0b266dfb0bad9a406a83c862b48bd9f1304eb1334aaed89dd9e6901aada1ab7229db78ae4966a859ed8ebbde2ebbd0e26b5f2eb7c5a2bad5628338a460134c0cb1c4002785daeeaeab84a24730281b3c2818b1e28949ea6f0551b0575687812800380a8012800c402a5aaf6650ed068bf9a2c865aebb59e9ebca98598d90900a4ebe3f5449b3ad59b3a09713ec1b93641a4ae61c358aca8fac80200409e0000c872c29e5addc832d7c9322db5a62cc07e9d5b2aed88ceffecae7aa7a59a4f3c3caaa6569e71d6081ae8ac1024e4d4ea009eb21bd9926cd3aaadaba6acca52a018f8e7d49aad7a31ec5cf62a0da8e9253e06c572a62ac0abd7b6253fa2ed3bb2e5e0a240c9ae6de22666db06e698820102c4acef21aef058ad89d6ed08b8ab1164eac4d2691374aa9356138951e8e04a6c941aae0a4caee2aa2e51b6edd88a230934a925222ddddaacd9b927d4b240145ad5a6f6e757a641dee86e13b8eee07e28809d2eeaae6ef2a2ac38366eef8c01cf42dd7e9a05cdc64010f6290b94ea4d762d15442e0a586432b22ba89eaef41aeff11eaef2a2af7cb66dd9e4ed0e8e81bc625ef05edbe50a61ed7a02b4e42cdffec0f5aec0df5eff41e6ea2d17402fe60dc0dc8ea5f99e6ffa2a306cae2f3a962b19d8e8e0fa2f54daefa8616d0cc4adccee6de72a564489c3cfe6a0f91630cb1e6fea2ef009fb6103dbe9aa7e41044fedf776500593990c17193a4441d8fe0000e7806e7641ecea80ad3a810e83df0893f0e99a300a23311636f06cbea415b5afb9c1700cdfed0c4fb13d2a9a24e8ef1b86af1a3cb10b78810b932d1117b1e11e71129bf1032e31ff722819184017db50144bf105376cc80a8110ab001c6b6f95daaedfb2811d47ce17fbb1b92dc0d6121802a740199f71222bdf1233317ca68dd142715c506fd6d2af357082fc722eef3641062b01210b703260f213c0efa7912a261972022bff722a132323abb1e39e01185b221097211d87a5c3c209cb613107ff002407f01af870c91dd15622b2f19d322aabf23183222337b2637601028cb2c50c4028cff222bea22d0b41a3ce6e266f2f14b4b2f70e821bf76c182400381bcd00ecabde15f33023f33ad79c32ff72bfb0c10033c80218704e4c3257d130866d662e6b7210e06eff0e4220af80274741b3e662291b5e3163023b3374162ab3a2beee08f1b2c56c2e4fdc7356e4730d1b423d6bb31e4b8140ab00417f32ce6adc1346f31a78dda7a97343b3b4bb3d3450b542f38242019c733f5c744555725c61ec14e0309c0a8c29bc730b94ae1518b4ef21b41aa4f418ad744b33b5aa3d3444132a2526ffb5120cc0525370158b6b4657cdb050414f5b6e2ae0b10aa9c2a7ce6af7c2c302d4b4e99aaf5537755bff5d44e3b3236bc3546b6ef6fac44dab9656cb00644ef055eaf2cd1e674057aef00a00390b4c5fd32b02b3b55b33b6963d35044cf41a9f4200d0b5ae098048dff560d72c56d3c02f63761e8b561544360e7cf616c8f30354b42a268059ff16628feed42e7663cb36e9c1f53dd5366c118061fb6502d8355be07577aa6936efee360b6f4b9e4250b38070efc133db1901703482a4f36c4bb7cd3db6db32f31a240003e8761d3440694faf6657afd5066a6a5b713ffbc03fdfb12b6cb7775b010264f776e340016cec2c5476eac4f674e3777e576f03b4ff4a01304002b0b77eeb86009c8b7f2bc0730b78822b78d30440021038c8de99980540802ff84d188083330075086d03084000f47685837888874c8bb518858bb8591c0089b318829f788bbbf88bc3788ccbf88cd3788ddbf88de3788eebf88ef3788ffbf88f0379900bf9901379911bf9912379922bf9923379933bf9934379944bf9945379955bf9956379966bf9967379977bf9978379988bf9989379999bf999a3799aabf99ab3799bbbf99bc3799ccbf99cd3799ddbf99de3799eebf99ef3799ffbf99f037aa00bfaa0137aa11bfaa1237aa22bfaa2337aa33bfaa3437aa44bfaa4537aa55bfaa5637aa66bfaa6737aa77bfaa7837aa88bfaa8937aa99bfffaa9a37aaaabfaaab37aabbbfaabc37aaccbfaacd37aaddbfaade37aaeebfaaef37aaffbfaaf037bb00bfbb0137bb11bfbb1237bb22bfbb2337bb33bfbb3437bb44bfbb4537bb55bfbb5637bb66bfbb6737bb77bfbb7837bb88bfbb8937bb99bfbb9a37bbaabfbbab37bbbbbfbbbc37bbccbfbbcd37bbddbfbbde37bbeebfbbef37bbffbfbbf037cc00bfcc0137cc11bfcc1237cc22bfcc2337cc33bfcc3437cc44bfcc4537cc55bfcc5637cc66bfcc6737cc77bfcc7837cc88bfcc8937cc99bfcc9a3bc901cc068b2fc2e710102b43ccb7f3845c4bc680ef513ac7ccde7992b1880ce0f138b8f007ffb7c30bd45ce0f3dd19b82d01ffdd2f7929c28400000ff3ddc32bd2ff182d24ffdd5633d30457dcad7f869bb0c17b076120e022787d91778bd60b6c23356372c9c7d5aabf518f9b70070ecb3c9f56b2baddb73bd8883f40a9037103037f2b6c1b9b8760fecbd0af4bd2fea3581def62c147e0a1cbeddbb8e7ccf7de02f3e309a2fdee73d88c3f70328379a8ec620c4c3cc03c1e6777e35d33231d73d2e90be29d4777bf1364a57fe14b4bed2607ee62bf85999384178e11a604fe9e39d4ce4fe1e273ee50523806aed20cc7ef4d4be2746754217f3f2dbbe7e93fd4e15ee46c7b376f28c4c0c7e2d9ffef6a4be2d4c3f1c6cbfe5cfe1028c3f3a37ff19247fc6407ff4e3f7681741586f4e4ff6f1527e01fceb80fc8bff2f35bf3d083ce24896e603a5eacab6ee0bc7f24ccbcb89e73951f77e0bd00987c422b190f8295d412371098dc29aceaaf5ea0c48b7dcaef70b0e8bc7e4b2f98c4eabd7ecb6fb0d8fcbe7f4bafd0e3d608b83b261bf53570078d277a647a86378179058a22545e5888247873869b2482789d9e90460c0c69958e933ea894a0859cadaeafa0a1b2b3b4b5b6b7b8b9babbb0b9b904a124a36e0596089ca80e6fb2b126cd7d8b90a750ac82ba6bcdc3c37bdcc2d22b0b68da51bde5d7e125d9daebecedeeefe0e1f2f3f4f5f3fc3d0fd4d46808a30e7804a011a7cdcf439f3844e09392bf67a105c66509bb9892316642bb3b0ca388a1c73246c0832a4c891244bff9a3c893265ca61dc1694b986c9c19c06a80ea061b9cc2523845b323a51a902e72f9d9b3a4e1c90e48c4f231b8d3a15f111a8d4a954ab5abd8a35abd66a7fcaf91b830055c4374b8b143bd3b5dbd73acf3045ed51f609d0b4dcd6ca89fb144b03a59e9ae6edf876abe0c1840b1b3e8c38314801e66492b9d109c01c547bcf302ee7982dcf487d815eee96f9eedf723c3076c68577b42ac5ac5bbb7e0d3bb6ecd93e20772b3d86e6e9376d63a2b1cd0d379dde8e02d348ad432af065c2e320576da43998e738fc422f679cb6f6eddcbb7bff0efe55587367c7107774918d025468c6972b3f7c7314ea2780baef06dff9f5e064e89bb0bedf32d985476081061eff886082e1c1d44d7a5f08e58840703c3489646730c88d83bcc927cd6e2761884d5101fe925418fe9500e088a80ca8608b2ebe08638c32d6c3cf44128e41a123d2ad314827379651a3393fca71de6a9c75025490e50c49968abf68782426293ae9d68c565e8965965a6e590784dc5838068880e4b7c6259840f9204560ce5124202c4ee1a1495e2eb3261c2752594201767571e70853e299c89b5c0e4a68a1861e0a235de6ecf9859993309a86987b902986a25e69064d4f719264a95a1201da49655ff429c29fa0ee2128a2aaaeca6aabae6ef5d944a185d1a36f6ee886c98e61c4da18a6554639894abc62f6e9a993a0a9d0a6b3907a6aaaaf3e0b6db4d24eff5b0db343882a06ae938ca5c67289cc3a86b542601b479ba86a8a644ae2ea40ae1beb525927ba52e6f2ae93ce528b6fbefaeecbaf19f74d44a9170045f6463f67fc4b9eaf93dcbb02b32921fc5eb1c61637aab2b2d4ab22c3fd6ecc71c71e6f3c70473691c15e1be66241541921733432911c2ee1304a2b53d4729313575871baa8dd4cf1c73eff0c74d0f82a4911935fe49808b2620c4b08b762106d637c9902eb484a500b295a64006ccd75d75c7bcb91d235c4bcb3d65e9f8d76da6aafcd362842bf0d77dc725f592b47c890b19e8f6d204d88d85bd44dd1dd2e4f3d9fc520013e91e036cffb4300093400762aba26abf32d64cf8d79e69a6fce71a713f9ffe1c9e4c274a209199e9b23f5af8557ce695e59339e8700887b52faeab0db7239e7baefce7bef5ce6ed14b85fcc3e291b8e2622ba17c01b253c1b275fa1710ab98fb47c47cda7313d140acc69abbcc1d26bb8efe28f4f7ef9b261cc2e909e404a86a4589468da53ed9afc32e5b78f847e0ef3ab917d1eef263fb6f0bda27fe62ba0010f8840aafc25656198d9b7d6a02d47d48c647961a01b9e6785e84180800d59a07e58c785ab3922603fe0202c4c98c014aa70852c4c87034546068801c2698fe98405c5f042960d4e751d0261487248333b095009224cc4046136c456a0b0854c6ca2139f3893d1c02f0c91c342bccae089fd812182469922fd08d7c3fbff85848b1df122ff92e80304108f10d7830b1a4bb14428ca718e74ac6314d698b832308d1a69c060153448033c9a437117ac5f09dff80e41968390e040640dfc68051a9ac2917788a31d2f89c94cd2f17846a9dd174e8705bf6d618f7b4003273be2c93540d2081ab4e43b4ec99154a2c1953e28e21eae78481f2e8b929aeca52f7f39beea3d059030e01e168c2606beed81916210a6538809855516a195bc5487338d02cd5c8ab10bd2340b176889077002739ce42c27dc94d9114986b01300ec8231af804c30a09323ea3c433787404d5dda639e14a9677faa39832a96d27b55039f3ecd89d0842af463d7b9a117dc67051236ca1347144343cb65c8491e94ff1e177517406540ca3d5454a3dbbcd847178ad294aa544bf75c06fbb8004b2cbcf4a19d90a8175afa8b999a01a71e21282948c25383b5419c8f5c914f09612a71ac74a94c6daaa1c8f814337a41a056686317a0aa173460b58b7008ea398ecac7916cb58c1edde8168c4ab59f96ada44e6dab5bdf4a20aa72a49d50186b15fcb905b93ac1aa5dd0eb44e82a06af9a209f6c9d875fcd01d89c1516ace74a2b520dba58b84a76b294454c4c3b5906c19200975e90e11e740ad300c9d29e1975a359e17159549635b251e0a715a46a5ad6b282a895adad6d6f4b12881a45944a782743324bb00b8d88b75fd02c0908fb3d91e8b623c4fde6496310d22be03506b4ff15916c718bddec6a371eae4d6719ba6b84e6f620ba5588e7d14634dd30187704c82da848c0dbcfa13e1706e4bd2b6395bad6e46e77bffced6f3b7c6b84e51281b35cb8e631e377ac9b4c42c043203070c188c4d3be03c04560b0101c2c86eacea0be4e48ef0b34fc3afdfa77c4242e312c8c0b80d41a01b47960671928ec4dd23a22c59860b17a4b1b4009b703c52a2e828dbd00e218ac57047c95419085a863132b79c94c26835d8bf00d4516a1c85090728c2be5e2333c9908519e0495c130e407b457ad20d9f210baec882ff369be2f08f3981f9b5ff73679ce74ae33180e2b042dd8d20989fd819989f0631f587808b0fd029e75a0e749f4999b383e0eff9b6b71e89eee393aa278740b068dcffb5e21a99bb6b3a73f0d6a1a78f6b798c6814da500c42ba8b907937642a097306a8d40a0d4273875601b3d8323d722d63f99f5246cad5811efca13e26d98a52b9de4502b7bd923a6b5092cd46322147b06bceef018229d038782c1d92580f699bec8c3085f571ddcde6c0aa23d8469db4fd860e0305334fddb389399d9f4aeb7895bcd6515587908e685b71130ac846a1bc1c350c0f799f53d897edf1ac2eb96b33d0c2e0483ec5b080a0fb6c3c300f121009bbac76e64b2ed0df290bb15c6994e41c6730070ed7d7c0643ce663117a68293e320e5c5c5b5913b0e0b92e739e6383be3ca633b63e7febc0eba16b9d18fffee4b50ca3a05e52601e8bedd6e4c8cd60b4aef35d3c7cd0537fbdbeaf6a8fabbafceee7f0e9d069e203813708e3db4237ded6c67a2bb2fbc02740b61d53e9838c54d8409660e3be82a90bb0ee82e05ad3b36acf678bb0ed6e4f71c005edc616734c31b3eef5a14bded94afbc0ab17d82b1d85d7fea537418742e84424f755b2cd83c0eb4681e9b737cecb8c0bc09343f09d44f07ed7f96cbd6bf6e39b55b7ef7bcd79dc089800e99d7fa2598d8380dbc6e84917ee1f725e7f9089da77a38b1de16ccdff90a846f02e30f7ea06300bd10f4aecdc6c762f2bd2fbff93397eaa5ab20fd4e50fe16aa2f8457c7a0e9154103fb719f82fb17c1fd377e3c49c5ef0efffa677beb8709fc076438477f24207a39867595a47be7078111c831d857028c047f39507150e07a26b0782e408125207b5df0812360819890818e176e90076734320925987069377d2f607a3a207f67178348d68012a8833b183433680246b38124007e5c60783a607630108424d0813de0832500842da84ad1f7610f88074d48024fe80843687191d7054528048b368537b83800c8836568863f837cd2e602b5970353270569d8609d258630008742e0206c88036e5873fe077417170f75a8037738097a287439180380d87cb757049c166f67e8888fe833065605a9248089f87986c802eba5855d20894e408929480682673b64b80e9d68049f08737c3187ff106000de077707b88ac8868990488bb5482877a27717787adf0575a36482b304852ea08b27108237258536388b92178c2d308c26508c8a38805cd08a68b566b1e871c9688bd9a88d30d28c4e888493a06d5c90800f7082ab274107f38b2f908422108e60768c40408575d08d57f88d8ed08ed5888d29b03da840738e668d3e978fdb289003191e9568873080873860802de6795ce08ac377060619880859807df48e2c407ead20913900250979020bb97df81578eba26ef0f88f3088096da3922bc936cf48902f09930de19125305a1b89030b1805ebf800dae70288880360e86783180336790238997517696c27590933490235890946398a7ed803089000ffef7284e6488a4ac433ff16935de995246185241803f328964e56635b608a46b08435109622308464e99616c9870c9895d5d0960ff09679a78ad715007da90090d30df7a88284873b5b5904fdf89589a998b7907838d06f3a49884b40941cb80523380235e8038d79028f299468208a615497bba0993f68039d896086e98920f97f526952a8f98a8b099bb1c90b695904c8c294c08045a427057789984b409b6a1803b739022549039fc978acc90ebf996e32209ccc6006f9331a03409cc8189a95009d1dd19bb2a99ddb2907f025046e389925709534e09d87270570498e03619a30109e24309e3d609c83c97df2509e6d3803ed3902ef996bae798ad3499dffc87942fc699edc49a0055a0a7a2903e829982a579d2c809fce7906083a9698b0a08187942a909107ba8c30a0a0cf29a043209da709a003f4a13367a0278aa271f0a0e9b99f8f4206a35902d3e68585607fe978732eba53172a3df128072b5a717d8299fe58a2b5e69f611890ab35a423909d29caa44d1a9493b090335a94657097e588910d6906cdf90051fa9432068aabc985eda0a55cba60229aa47819a47439a2ae709d1cb1a44e0aa771ea0277096ceb05943460990f70a75d7a06745a54581a8a3aba413c1a077e5a9cb962a6253a00560a9a6baa9567aaa4722aa993fa03304a028025752af36b50e0932790a63460a92380a9eb997a7329a40d6a0bffa12a02a3ea0891299fae49009fda8761da9a90fa006f4aa9b97aa2e308957d52a42c809e35a89c3a50a151c0abb3ba07bfda02f1197e8eaa0bc7aaa680a0ac187aa604a09af888aa76d0a66aa2abddeaad29509f39a09a524a9a62f74044147bea09a5e365a3a5faa5c84a98ee10ae0ac9ae2f182e67ba000d30add277a4f265abb7faad014ba90f997d3eb05eb82a03c39a034778972ef702049b27069b92396aaa2ddaafa500b124607c076bae675a000a20ab169bad44f7af002bb027eba476fa039d10b23dd9736944aaee8a3c2b7b96815ab1377ab178a0b23ec0b2f75ab20320002d6ba4236b5d908ab0288bb402a9a550b9a35ef6620dfaa09bc805ff4bdbac80b0964226a8196a07540ba67b70b5ff69ab8b9aa8f14a0bdb3a11479bb4695b8b3ab9a53f40ae2570a73390a7c4f5b623c0b41a58913e50b7a2fa60ef1aad2be80e6c7bad10b0b7abeab3255b1183fbb764bb4bff8ab66a0bb966a8aa3ba904ebc5933d9080567a278a5ba9c557b99e6bb37e7baaceca98a02bb19b9a61884b935f7ba54ab997461bb9b1ab98e308869dc0b9a206a864f77cc295bb3560bba19b8a5149abd540bb4bf0bb78a7ba2570b7224bbad659b28f2bbbd16b7e79fa00cb3ba8f67a6dbb5b039d0a826840bdd6db278cfaa7a2cbbcc3cb0bdf7b9c8020be389bbc763b7baeeba18e2bbdf34b90194b029cabb03920b55050b8ff3f96bf27c0ba3160bf2380bf12da7fe4cbbecd5b0b032c0205bca1b0d8be0ab88580ab8cf24bbf176c8bdc1bb14ba0c12802bc56cb6a44bbbda6fb031dec7432db33c24bc1ea60c22270b9ac188b66ab1afea9b5c068c1188cc38e58b80fe0922dc0c00f10c03eec08e9d596fb2b053bdcc32cf0c341ac02ccdab58c5b0d481c054b8cbc11acb1215bc3af7ba6d09bc35d5c6f6cdb81f34a8cbc980829a7aaeb5b1bdda30462ec8c281c28d03804f000c6ad8509495cbe4d230079acc77bccc77d4c005c530e760cb62bdcb829c992878cc80020c85eccc821879e0f10a4ff0b916192950fbaaf2bf0c8914cc27b88c058a9c0b290c95120c905fbbe016900ff0a70975f05c742c088ead7c8af0ca7e358ac2dd0c20dfca2093603c2f9c28246a16f78bcee78b39e6cbeb920cbbe9cb7102cc22e1000a96c6eab9c1c9095ccb02ccd2f49bd8b1c147c3a066df9a33ae2bd75bc053f6cbd32e0c4f03a9feb50cddf8ccdd8fac934a0a5121c929d266f843ccdf3ac9da9bc966c5c8165209cede4b47daac64b80cf42b8709dccafd15c0af6bc05015d96c8bcce34308e23b0cb4d9bb30069d0f46cd18f58cb908c96994a06f8796ac625b42f90d19f3aca3439d0c1dba8c37c0b23bdd131fbce8d982dd498bef23c7e847ad1375d79254d02b3ecb204ad04380a033afd003cad0442cd8ed218ccf099b5369d06463dd448edd3ff09acd22f5d05463cc8505cd3f08bd35b5d797d62cd2bf0c35f2d030a6d550aad9fa30b08629d02617dc0283dd3580dcd84a0d610c0d60c3dd55190d12210a4591cbf13cdd57f4d798ffcb50a7dd47833c432d09697ac0282dd0584fdd4c01cd526e9d770c0d85ce0d8443db40d1dc27a93d2341da05a0dd8a10d722baad105d6b36360c20416aaae0a05a41db24e5ddac698d4997dd7b3e0da9c78da8558d13030b922f0a67c3db6e52cdac3fd88d48bd9b4dc09e11c48c8899f715b03c64d75c90dd96efdaaf0ac0ed0dd0519addcad3bd92ac0b67addd9704da2a04ddce5fd69a93c0089ac3659360696d9918eb0dd6c2975ea9d36ec8d82d45db59e7d0bffe84ddf6863df54cd756500db401cdec25db64c6dde09ae6479ed24aced03f8194f2772bb3dc0e02ae2e0583bdb576de0ba50e12372e11a2e9265d0db3c5ce0215ec1ddade029de64034e25974c9693638f68c0e24e52a4e3bcb81b9e0b33ae22d309dc10c0cc4bdae387bbdb2a4ee475e6d88072d6058d0501a359733dd6569ce42960e368addfb570e47892e43d7ee5256edd8549de450ee6db65c58f3d067b0b2942edb02e30e6c7bdac4bfde568b0e6ea5cdb474c516f8de3598de261aee7d945daa012d22b60c2c213d01ffee0631edb5b30e5772cdeb4d0e78022ab3d9ee820dee5273ee47b6ee9fbd5cea0c2c4609d084e1396565d5786ceba912eccff553e0b990e28570be99e00be086ed7a67ee9b1de64cc0c2ace1d0323182fa18ac64c68e8b62ee56e9ee76a40eb8062eb3dfec80f7084419eba6f2eebcdbe52230e2a112d03f4d702f839e13500ed8022ed4d0cec950e07d98e27db1ee46567e7267ee0cceeece9ae503a8e27971caa17719bdb3e03ecdee2f79dc25c0ed3ba40ef34eecc39b006e45eddf97eeec1aeee05af50577e2abb5e9a84302449e8e43180f0a0a2f0bf9ee192eded6f10f180a2f0e3fedf376eee857cf1062ff228f5c313c3c52c709bcd91660a66e8268be8ddaed97850f2c682b01c3fb101efca941ef323cff34b156613f3e7dc4e08f0a1599ed9f297799415cfdd210f7d477fe8ff381fe066e009d9a9ec55ccf43d8ff5be84eac6b2e9d74c086b51b727bf864e4fe02faff44949f0594af64b68f30fecf1933ef0579ff5737f49df7d330fdf02019d19013df10145f66a4dea4a3ee7ad60f713f3d56d7fd8508f7f3a3ff874eff80805eea722ef2fa0d30661bf8a7d6e644fb9661fd94bbff3c640f6118df89d5eee700ff29ffff8a98f490fbd95d71e0396ea6d439f0c9adfb6167af6d48aee61c0fa3c33e1abde09c9eeea720eebaa4ffcc094f1c6d2f732f8534de7eb4faef90a1ff8b43dfcad70fc09afc28bde057d0efcb92ffcd85ffcdfdf4b33cf33a0ee03b7190ab719df3420fe3743fe9908f38d5f09eb3f31ed2fd1729f023b4c64ffa52ff0a70fff20008923599a279aaa2bdbba2f1ccb335ddb379eeb3bdffb3f30281c128bc62332a95c329b4ea6e1219d52abd62b36abdd72bbd4a0c3ab4d4000e22c62183db3dbeef7d7168063033733ddfac4adf3fe3f5c0d1ee083d120a09dcce1df9e20a15463a4e42465a5e52566a6e62667a7e72768a8e892c0a3e9695d905f0384df025129aa2c6a22cddc632dcda2dfe848ec2c30a2aea9d1e9c1cc6e5e6f325daff33374b4f43475b5f53576b6f676c942f0f76a10b318401f9c009137f8ba1b6bcd2d612e32b1b33afbbd97bb22fd50187fccb837cbfe712b68f020c2840a17326ce8f0612804f82676790544819f047e0c0c9148f123168bb64cffc9dbf7c89947902aa7880448100801532d61047433f024c49c3a77f2ece9f327d0a042816824540000d2a44a97326dea34a9a9633fccbd2990670091a2808e3eedead569d47724efbcfca4f50fd7af6abf86354988c881530c86e11455b3cdd0bc7af7f2edebf72fe0c03d62125270e4ee193240acaa9c3b843020c3861e299e014f980dc4679c41fe23b988662f9569961d7c0addbcbaa1427b11ecfa35ecd8b267d3ae6d69c0238e467efd71fca333c5d1407013d25d84b71fdf322eff29e9527528e2808cc37aa4fc05eb2e439863760be8e65bdbe2c7932f6ffe3c7aa154af22e14e072bd1955283ac7fdffe117ccb633397e6541f4e7e45b807606ae1ff01810063fdb1901d17e07d971e84114a382185155aa80472795c47c47e3ea444d14c3f6448c786437418c3807038471a749f8c084789429ce802835b0481803d8f00e0488b9ed4a8c585410a392491451a39de8f587c361921a8fd90233efa88f3c892a03de2248a337ac7c828495e5125115e5a81258d0ada80a32c606267662662ea71249c71ca39279d7556f3e11fd41df748883bbc08ce8a3be0b951127fbad1670b29be1168993d7232681e7a564708a22ab859c50f0148670c8f06aec6a69da18a3a2aa9a59a1a833f80046884a26ea431154844a4fac7aa029af26a96b890e5e826b3fa512b11adb6816ba39ee610c0a55954da42b25338c8e5a9d1ff4a3b2db5d516099c864b98221c0f9bb213230fd892a82d65fae9ca1faf9a880b23b98470bb42b3901cdb4082b3bcbb66ba9ac45b88b5fdfafb2fc001f755af1f6a86f9080141304091c13c109c47c342c49bf0725a3ed7a400196bbc31c71d7bfc31c820b7f0301d114f4908c5f8621cf2c7042445b22c0310bba51f2cdb7c33ce1c170b48ce3dfbcc32a3020b3d34d1451b6dc27f7048ba2721c0ea70163bf30191f41b4b4faaaab9f1ecba52302c50ed86d54318da86d329eccbf51929d385f62c3bb30d0c9947cb3d37dd75978a91514c08cb46d837c4854f0144e0bd95dea6f48dc2de6704bde0db6daf30385a85e7c662e3516f5d79be239c8d391571ffdbfd39e8a18b0ee1c44d98e2b90e507ea33610a533717ac5e776caf98396226cfa9594d33e0beb05eece0bb3bf9f363af1c51b7f7c60db3611ef8e4034808f031c96cb04f3b16b8daef0caaca03cf53aea9e7dd333fb0ebe4dc193ff07eac8abbf3efbed6be3ab1f52177a2b108913227e0ff0e7213f12630f9bebf566773e36ac407f74e0df11fcc706fca16073d94bdff7062806b749b00d10741f0633a8c10d5ae279796b82fdbc103d20dca37942f020e140688a11be20845d581cbc2a881715a030722a7c040b1927433a2c2b823b0492f97ec8860b72b088463c22127b00b337f42e09a668a20e16b60e93e560896e80e2119e08c0eeac4d88365281ff15db80c562dc8e825ee4c2000ea7b23366c18c6cc402119328c739d2b18e22f89bbb9e20c514fe0072c150a3dfb8d7843ddab08516f3e11b9d95023c02e25e4720a41f02e7c6445ac19134a3a4bc7488c92cc4d18e9efc242891e7c7f83d6194910202238151b61d98f280a5341c0c5cc80518da6e93984a412be1804024e4b26a93b4e5182f89c95f6eb293a13c263293593448e641924ef85a1ba85883300222983960261d9cd90468b2419a2390e5166869365bde1205d8848336a1600a6f3a9073d6bc1839f9a5c978764e99f6bc273e87a6c53d782b5b3001872575b0cf27f4735c86945d17c9a982813aa1a0ec0a223d1fb000060ad096c4c4a431f3ffa9d18d727448e01c4323ce19082018907e42f86816026a04910ae4a0014ca84511274827b0b47cf38c2703285ad14d5e949219ed2850832ad4f1d4f00fbb4c422fdd90431e404a2644282a29f790d4362c5505284d05f6e29902a8eeaf11536543554fd0ceb7bd737c31bd69447f3ad4b5b2b5ad7c515d3623c1cd3348a907637d805a65005774cad51475b5ea21d7a85014ecb52a7d7dc45fc51a516f9a95a7108d285edd2ad9c952962fa9f443598be050c35e2418e2a4c165f39059226cd60de9042c421b3bcc1384960ea31d4269db705ac592b30080dce96ad14acfbc56b6b7befd2d35a0961149d4b40d47bdc15cdfb0caa7cd548f6d61c155aff059ffdad21305c2cd834a1ff9dc71dab2013acdc15dd1d6d344f216b8e63d2f7a35515c361c17a9eb0c426c0d2a84f59ea1bdbc7c6fa2023b5e219a73bbafa4926ebd0880e9c2d4b101266779d3abe005335809f13dc36cb7690a70e1605d7fc8ee0d1e2c8608abd33a2e88ae15085c82f0720d051af6028797905c2f50580424664701300c5ec8ee978d096e308e73ac631c80b80aaf252d7e82705d40d8f7063da6c28f611be4fca65698943cc191a79064219cb80bcb2dc31b01105689d1f8b169dd3198c32c661f28303194a0af1844dc82a646f26a8d3cb37ebf19e70327f2046516838c571ae717cfa2000d28b20ff81c2b2fef76cc863e34a25d50d83700fffa085fa56b10160d87c4f640d2c6a5c4a3c540e91244590a6ad65c97bbe15fa9fa3586325c40036edbba509b1ab252b871a2632debdeb299b3935871458270e7336c5950a648718729c5e497aaf6c925a8b5692b816b2ef450d07e00400312d0682e47b4c66784f5acb3ad6da10e190e5356f223a61d4b546485a192a87217ecdbe9077cdac5ac1641b799789b5193c0d91b464ac602a0eac3bc9bbbae8eecb6032ef08113bce0063f38c213aef08533bce10e7f38c4232ef18953bce216bf38c633aef18d73bce31eff38c8432ef29193bce4263f39ca53aef295b3bce52e7f39cc632ef399d3bce636bf39ce73aef39df3bce73eff39d0832ef4a113bde8ff463f3ad293aef4a533bde94e7f3ad4a32ef5a953bdea56bf3ad6b3aef5ad73bdeb5eff3ad8c32ef6b193bdec663f3bdad3aef6b5b3bded6e7f3bdce32ef7b9d3bdee76bf3bdef3aef7bdf3bdef7eff3be0032ff8c113bef0863f3ce213aff8c533bef18e7f3ce4232ff9c953bef296bf3ce633aff9cd73bef39eff3ce8432ffad193bef4a63f3dea53affad5b3bef5ae7f3dec632ffbd9d3bef6b6bf3dee73affbddf3bef7beff3df0832ffce113bff8c63f3ef293affce533bff9ce7f3ef4a32ffde953bffad6bf3ef6b3affded73bffbdeff3ef8c32ffef193bffce63f3ffad3affef5b3bffdee7f3ffce32ffff9d3bffef6bf3ffef3affffdf3bffffeffff3f0006a0000e200116a0011e200226a0022e200336a0033e200446a0044e200556a0055e200666a0066e200776a0077e200886a0088e200996a0099e200aa6a00aae200bb6a00bbe200cc6a00cce200dd6a00dde200ee6a00eee200ff6a00ffe201006a1100e211116a1111e211226a1122e211336a1133e211446a1144e211556a1155e211666a1166e211776a1177e211886a1188e211996a1199e211aa6a11aae211bb6a11bbe211cc6a11cce211dd6a11dde211ee6a11eee211ff6a11ffe212006a2200e222116a2211e222226a2222e222336a2233e222446a2244e222556a2255e222666a2266e222776a2277e222886a2288e222996a2299e222aa6ffa22aae222bb6a22bbe222cc6a22cce222dd6a22dde222ee6a22eee222ff6a22ffe223006a3300e233116a3311e233226a3322e233336a3333e233446a3344e233556a3355e233666a3366e233776a3377e233886a3388e233996a3399e233aa6a33aae233bb6a33bbe233cc6a33cce233dd6a33dde233ee6a33eee233ff6a33ffe234006a4400e244116a4411e244226a4422e244336a4433e244446a4444e244556a4455e244666a4466e244776a4477e244886a4488e244996a4499e244aa6a44aae244bb6a44bbe244cc6a44cce244dd6a44dde244ee6a44eee244ff6a44ffe245006a5500e255116a5511e255226a5522e255336a5533e255446a5544eff255556a5555e255666a5566e255776a5577e255886a5588e255996a5599e255aa6a55aae255bb6a55bbe255cc6a55cce255dd6a55dde255ee6a55eee255ff6a55ffe256006a6600e266116a6611e266226a6622e266336a6633e266446a6644e266556a6655e266666a6666e266776a6677e266886a6688e266996a6699e266aa6a66aae266bb6a66bbe266cc6a66cce266dd6a66dde266ee6a66eee266ff6a66ffe267006a7700e277116a7711e277226a7722e277336a7733e277446a7744e277556a7755e277666a7766e277776a7777e277886a7788e277996a7799e277aa6a77aae277bb6a77bbe277cc6a77cce277dd6a77dde277ee6a77eee277ff6ffa77ffe278006a8800e288116a8811e288226a8822e288336a8833e288446a8844e288556a8855e288666a8866e288776a8877e288886a8888e288996a8899e288aa6a88aae288bb6a88bbe288cc6a88cce288dd6a88dde288ee6a88eee288ff6a88ffe289006a9900e299116a9911e299226a9922e299336a9933e299446a9944e299556a9955e299666a9966e299776a9977e299886a9988e299996a9999e299aa6a99aae299bb6a99bbe299cc6a99cce299dd6a99dde299ee6a99eee299ff6a99ffe29a006aaa00e2aa116aaa11e2aa226aaa22e2aa336aaa33e2aa446aaa44e2aa556aaa55e2aa666aaa66e2aa776aaa77e2aa886aaa88e2aa996aaa99eff2aaaa6aaaaae2aabb6aaabbe2aacc6aaacce2aadd6aaadde2aaee6aaaeee2aaff6aaaffe2ab006abb00e2bb116abb11e2bb226abb22e2bb336abb33e2bb446abb44e2bb556abb55e2bb666abb66e2bb776abb77e2bb886abb88e2bb996abb99e2bbaa6abbaae2bbbb6abbbbe2bbcc6abbcce2bbdd6abbdde2bbee6abbeee2bbff6abbffe2bc006acc00e2cc116acc11e2cc226acc22e2cc336acc33e2cc446acc44e2cc556acc55e2cc666acc66e2cc776acc77e2cc886acc88e2cc996acc99e2ccaa6accaae2ccbb6accbbe2cccc6acccce2ccdd6accdde2ccee6acceee2ccff6accffe2cd006add00e2dd116add11e2dd226add22e2dd336add33e2dd446ffadd44e2dd556add55e2dd666add66e2dd776add77e2dd886add88e2dd996add99e2ddaa6addaae2ddbb6addbbe2ddcc6addcce2dddd6adddde2ddee6addeee2ddff6addffe2de006aee00e2ee116aee11e2ee226aee22e2ee336aee33e2ee446aee44e2ee556aee55e2ee666aee66e2ee776aee77e2ee886aee88e2ee996aee99e2eeaa6aeeaae2eebb6aeebbe2eecc6aeecce2eedd6aeedde2eeee6aeeeee2eeff6aeeffe2ef006aff00e2ff116aff11e2ff226aff22e2ff336aff33e2ff446aff44e2ff556aff55e2ff666aff66e2ff776aff77e2ff886aff88e2ff996aff99e2ffaa6affaae2ffbb6affbbe2ffcc6affcce2ffdd6affdde2ffee6affeeeff2ffff6affffe2f0007b0000f300117b0011f300227b0022f300337b0033f300447b0044f300557b0055f300667b0066f300777b0077f300887b0088f300997b0099f300aa7b00aaf300bb7b00bbf300cc7b00ccf300dd7b00ddf300ee7b00eef300ff7b00fff301007b1100f311117b1111f311227b1122f311337b1133f311447b1144f311557b1155f311667b1166f311777b1177f311887b1188f311997b1199f311aa7b11aaf311bb7b11bbf311cc7b11ccf311dd7b11ddf311ee7b11eef311ff7b11fff312007b2200f322117b2211f322227b2222f322337b2233f322447b2244f322557b2255f322667b2266f322777b2277f322887b2288f3229979fb2299f322aa7b22aaf322bb7b22bbf322cc7b22ccf322dd7b22ddf322ee7b22eef322ff7b22fff323007b3300f333117b3311f333227b3322f333337b3333f333447b3344f333557b3355f333667b3366f333777b3377f333887b3388f333997b3399f333aa7b33aaf333bb7b33bbf333cc7b33ccf333dd7b33ddf333ee7b33eef333ff7b33fff334007b4400f344117b4411f344227b4422f34433f6a0800003b, 4500.00, 1, NULL, NULL, '0', NULL);
INSERT INTO `wl_orders_products` (`orders_products_id`, `order_id`, `products_id`, `product_name`, `product_code`, `product_image`, `product_price`, `quantity`, `product_attributes`, `store`, `product_type`, `shipping_charge`) VALUES
(5, 1, 1, 'ASUS ZenWatch', '01', 0x474946383961d007d007c400003f3f3fbfbfbf7f7f7f0f0f0f5f5f5f1f1f1fcfcfcfdfdfdfefefef9f9f9f8f8f8f2f2f2f4f4f4f6f6f6fafafaf000000ffffff00000000000000000000000000000000000000000000000000000000000000000000000000000000000000000021f90400000000002c00000000d007d0070005ff20248e64699e68aaae6cebbe702ccf746ddf78aeef7cefffc0a070482c1a8fc8a472c96c3a9fd0a8744aad5aafd8ac76cbed7abfe0b0784c2e9bcfe8b47acd6ebbdff0b87c4eafdbeff8bc7ecfeffbff808182838485868788898a8b8c8d8e8f909192939495969798999a9b9c9d9e9fa0a1a2a3a4a5a6a7a8a9aaabacadaeafb0b1b2b3b4b5b6b7b8b9babbbcbdbebfc0c1c2c3c4c5c6c7c8c9cacbcccdcecfd0d1d2d3d4d5d6d7d8d9dadbdcdddedfe0e1e2e3e4e5e6e7e8e9eaebecedeeeff0f1f2f3f4f5f6f7f8f9fafbfcfdfeff00030a1c48b0a0c18308132a5cc8b0a1c38710234a9c48b1a2c58b18336adcc8b1a3c78f20438a1c49b2a4c9932853ffaa5cc9b2a5cb973063ca9c49b3a6cd9b3873eadcc9b3a7cf9f40830a1d4ab4a8d1a348932a5dcab4a9d3a750a34a9d4ab5aad5ab58b36addcab5abd7af60c38a1d4bb6acd9b368d3aa5dcbb6addbb770e3ca9d4bb7aeddbb78f3eaddcbb7afdfbf80030b1e4cb8b0e1c388132b5eccb8b1e3c790234b9e4cb9b2e5cb98336bdeccb9b3e7cfa0438b1e4dbab4e9d3a853ab5ecdbab5ebd7b063cb9e4dbbb6eddbb873ebdecdbbb7efdfc0830b1f4ebcb8f1e3c8932b5fcebcb9f3e7d0a34b9f4ebdbaf5ebd8b36bdfcebdbbf7efe0c38b1f4fbebcf9f3e8d3ab5fcfbebdfbf7f0e3cb9f4fbfbefdfbf8f3ebdfcfbfbfffff000628e080041668e0810826a8e0ff820c36e8e083104628e184145668e1851866a8e1861c76e8e187208628e288249668e28928a6a8e28a2cb6e8e28b30c628e38c34d668e38d38e6a8e38e3cf6e8e38f400629e490441669e4914826a9e4924c36e9e493504629e594545669e5955866a9e5965c76e9e597608629e698649669e69968a6a9e69a6cb6e9e69b70c629e79c74d669e79d78e6a9e79e7cf6e9e79f80062ae8a084166ae8a18826aae8a28c36eae8a390462ae9a494566ae9a59866aae9a69c76eae9a7a0862aeaa8a4966aeaa9a8a6aaeaaaacb6eaeaabb0c62aebacb4d66aebadb8e6aaebaebcf6eaebafc0062becb0c4166becb1c826abecb2cc36ebecb3d0462bedb4d4566bedffb5d866abedb6dc76ebedb7e0862beeb8e4966beeb9e8a6abeebaecb6ebeebbf0c62befbcf4d66befbdf8e6abefbefcf6ebefbf00072cf0c004176cf0c10827acf0c20c37ecf0c310472cf1c414576cf1c51867acf1c61c77ecf1c720872cf2c824976cf2c928a7acf2ca2cb7ecf2cb30c72cf3cc34d76cf3cd38e7acf3ce3cf7ecf3cf40072df4d044176df4d14827adf4d24c37edf4d350472df5d454576df5d55867adf5d65c77edf5d760872df6d864976df6d968a7adf6da6cb7edf6db70c72df7dc74d76df7dd78e7adf7de7cf7edf7df80072ef8e084176ef8e18827aef8e28c37eef8e390472ef9e494576ef9e59867aef9e69c77eef9e7a0872efaffe8a4976efae9a8a7aefaeaacb7eefaebb0c72efbecb4d76efbedb8e7aefbeebcf7eefbefc0072ffcf0c4176ffcf1c827affcf2cc37effcf3d0472ffdf4d4576ffdf5d867affdf6dc77effdf7e0872ffef8e4976ffef9e8a7affefaecb7effefbf0c72ffffcf4d76ffffdf8e7affffefcf7efffff000ca0000748c0021af080084ca00217c8c0063af081108ca0042748c10a5af08218cca00637c8c10e7af083200ca1084748c2129af084284ca10a57c8c216baf085308ca10c6748c31adaf08638cca10e77c8c31efaf087400ca2108748c4221af188484ca21297c8c4263af189508ca214a748c52a5af18a58cca216b7c8c52e7af18b600ca318c748c6ff329af18c684ca31ad7c8c636baf18d708ca31ce748c73adaf18e78cca31ef7c8c73efaf18f800ca4200749c8421af290884ca42217c9c8463af291908ca4242749c94a5af29298cca42637c9c94e7af293a00ca5284749ca529af294a84ca52a57c9ca56baf295b08ca52c6749cb5adaf296b8cca52e77c9cb5efaf297c00ca6308749cc621af398c84ca63297c9cc663af399d08ca634a749cd6a5af39ad8cca636b7c9cd6e7af39be00ca738c749ce729af39ce84ca73ad7c9ce76baf39df08ca73ce749cf7adaf39ef8cca73ef7c9cf7efaf39f000da840074ad0821af4a0084da84217cad0863af4a1108da844274ad18a5af4a218cda84637cad18e7afff4a3200da948474ad2929af4a4284da94a57cad296baf4a5308da94c674ad39adaf4a638cda94e77cad39efaf4a7400daa50874ad4a21af5a8484daa5297cad4a63af5a9508daa54a74ad5aa5af5aa58cdaa56b7cad5ae7af5ab600dab58c74ad6b29af5ac684dab5ad7cad6b6baf5ad708dab5ce74ad7badaf5ae78cdab5ef7cad7befaf5af800dac60074bd8c21af6b0884dac6217cbd8c63af6b1908dac64274bd9ca5af6b298cdac6637cbd9ce7af6b3a00dad68474bdad29af6b4a84dad6a57cbdad6baf6b5b08dad6c674bdbdadaf6b6b8cdad6e77cbdbdefaf6b7c00dae70874bdce21af7b8c84dae7297cbdce63af7b9d08dae74a74bddea5af7baffd8cdae76b7cbddee7af7bbe00daf78c74bdef29af7bce84daf7ad7cbdef6baf7bdf08daf7ce74bdffadaf7bef8cdaf7ef7cbdffefaf7bf000eb080074ce0021bf8c0084eb08217cce0063bf8c1108eb084274ce10a5bf8c218ceb08637cce10e7bf8c3200eb188474ce2129bf8c4284eb18a57cce216bbf8c5308eb18c674ce31adbf8c638ceb18e77cce31efbf8c7400eb290874ce4221bf9c8484eb29297cce4263bf9c9508eb294a74ce52a5bf9ca58ceb296b7cce52e7bf9cb600eb398c74ce6329bf9cc684eb39ad7cce636bbf9cd708eb39ce74ce73adbf9ce78ceb39ef7cce73efbf9cf800eb4a0074de8421bfad0884eb4a217cde8463bfad1908effb4a4274de94a5bfad298ceb4a637cde94e7bfad3a00eb5a8474dea529bfad4a84eb5aa57cdea56bbfad5b08eb5ac674deb5adbfad6b8ceb5ae77cdeb5efbfad7c00eb6b0874dec621bfbd8c84eb6b297cdec663bfbd9d08eb6b4a74ded6a5bfbdad8ceb6b6b7cded6e7bfbdbe00eb7b8c74dee729bfbdce84eb7bad7cdee76bbfbddf08eb7bce74def7adbfbdef8ceb7bef7cdef7efbfbdf000fb8c0074ef0821bfce0084fb8c217cef0863bfce1108fb8c4274ef18a5bfce218cfb8c637cef18e7bfce3200fb9c8474ef2929bfce4284fb9ca572e9c033840000d0000001e40f39adb9ce60b00000304908000c0c8000910000100b0809b1b9de632dfb902ff028000d5064000333fbad4a7fe80053420014d2f11021cd080a253fdeb371f000004e080acd733e6324fbbdad7cef6b603c0004d4880dbe74e7799830101096000d8f73ef5050800ee993040dd07cf76c00341f0844f3cdd0d2f05c42bfef16b4fc0180e00f9c4f7e1000af03adf377f73ab335e0b68afbce8474f7ab77ffe8a51e7fcd709d00401a81eec5e7080de5f4f7b9c2bc0ec940840eda7eef320e87ef79c1740151400fce08f81f8c53f7aefef8080cc27fff50568c001b690fae75bfffacae762f5ad3ffd25b81efb5b4080000a807dd513a0fb93f8fdf597ff03f597dfe800a8c2ecdf6f74e18b61fed86fc01d0e408001d09ff300207958b07dffff5780afc77e584480c9c77ade577e59207efe67807cc700e80709eef77c08d80317688055108112f800f617061e887d0b5007fcf7819c57000258050a88822e68741968452d587c157804df777d58a00023f88254777e91b081c517833b0084ff27844b60002f18825f4084cf57836d80000dc0832968844c308352e88254284556b87b0c980437687d5660009a77855f37000a6081e5978537c084efa7844f807c28e8865d1085ffb7826e90003b48865fc700b8f7045ba88705a88650f487b5d78745f085cf570588088854b700a787086c487b82580391887df12705f8278172c80563587e5dc8060840888c587303e00052208aa3b87edaf77f9b3804ff8b587c5370009d988a53370076980895a87a934803b9888352908705d88a5970000638006ee000c0488b53f7894d808aca1884ab487f036088aee88051808ccfc87704408d84d08b9bb78b33e08d18180548988461900012f88865f08ad9d877dc7804ced88e92188df4278c40c08ebb170570288f5fb700ef1808e2b877e0280301597cf67804e8688e6090896da80608c090fce88e4e108f11f98df4f87ed38804f8587b50400015b97705a08e009986425090c077894fe0910af905c9787d25880608308b1f297505e084f0389324b94514697c36688d4da0923849750320927f6092543790316094f90805e4b7925d508e12f88f5d109341b977fe5885ff55697d48a9443bb979c6d893e0f79359598644d9074a29755bf90267497b654904c4c88307a98828688a65409563d98f5209045d799735979648b4977c778b42b091b427967c598b6da9076b098325298567e80409e9949c8882cc787732799836c7004b00987ce99747c49960570060e98b4ab08f98697419d98d3909048ba97a9ae90440e98271390508e082a24906a019918f8904b999959e6944bd497582798f3e89040e709a78a99ad8f79b2bd09a9cf7954dd09492a90591f98189690574889c54779d3b109c41c99c44e49d34690484f97a4a60002da99d0f50997ee09c7dd99852c89d3ef09670f905b12981bbf905d5a99e47f79237c99f7c079eff43249e52379c3e509eaa97047609a047979f45b99aed77850e8a04fb19872cf98228e90507909e003a9bddc9a002799105e89f83599c45909d201a76f22907ee4973028a022d3a8186599f4f2985794905041a9136a99729fa752f1a44399a7dd518964610a31549a2ed09a13e60a460079d4a209dd38905088a7d74d905a6d9a336c79e3c8aa56829a20598a1c449a444800050caa535e7a17310a33f6a024c0a762baa03f449a35c10a453a77f5db0a1667a743bea0374ca8f6bfa437d7a737f5a0253ba79a3898205c07697f97f03b0a777a0a6f0e9984b50a116ca05b52985b7c905f7f98139c7763ca8a57c9aa78ca993183aa4a43904782a8100b074ff2a007410f97eaf99a4cb19a99fba049b5aa95b709c57e8a88de7820c900044e9720d50a6f4c7ab3a10a8ed38a83d84ac36a7ac2250a87c6704b77a7d032000c64a027847ac4aaa98dbca036dfa75998a04dafa81680a9b6438a15610a805707b316000d36a7d763a04e2597af49a786fca95b51a04d0ba774510a76d78a328a0835ffaa0b3ea7b7a78ad3ce0af516a05e32a81b18a0550298de56a0207f0aac9e7a441209e98c4ac3687b033b0afb04704ef5a7c218903a11888b2aa8a064b86061a04948aab5910b152b805235b7c0be0b12a808def57a5196ba293c4b13507aa3800b25f37a6ff77953a50b3bbf7b0dc5ab0aca98742fb034acb8a5c70a5ff2fc8b355a0b0d717b5edcaa1b4c7b43fa0b19704b43587b33040b4544704689b9c3c30b5b467b66c00a92b7b85e15a040dab89730a88f16a056bbb7a3e809eef4704626b49644b735c4b037d7b744470b7b587b43de0b6aab7b77920b74f7bb047a0b5b2c9058c88a454c0b8b577b8e1b8b3f2eab39254b83407b72d90b8463704ba8a7d4319048bba7b188b07941ba17ad8b23ed0ba5738b14aa0bb6488ba4420b3d6c7b93ca0ba3727b9a12aa69464ba20f803c66b734300b99b87ae3b90aa54ca07b5bba48008ba3980a252c8bb49e0bd5788bb4d20be170bbc2fe0b99c47bc3c30b895c4bca959bca4cb035eab7aeccb03565b7cdcdb06d9ab818058b7ff4210bb78ab05ea6b80601b0505cc9342f0b2bb07b034e0becbab87e0bb02cf5b7342e0bbe3b8b8e537bb76d0bfdeca880e6c03972ac15a80b93cc8c14f20bcc907c04090c021dab3cafbb37a18bf3a50c1342704d2bb7760eab2a2dbb42a5bb97a88b54080c1727a05f92b85ce4a0347bc7be4bb03e6bb7b13ec02102cc3242cbf31cc032ebc774dbc03590c76c85b071e3c848cf8c53ef0c4999b05165bc451209e2c7c78d877c01f7ac591c4bc3487c23560c30f10042a0c7c6d0c044b4c7bf7cba2dd2ac68018c83b20c0038c05ca68c84a50bf0a6cb72e2904535cba8cb8c52f80c741f0c7af47c64030c2d717c26a10c63af0ad7c07ca32e0c96418c5ff4440caaa67ca7afc7ee83b03395cb4307caa11fcbf566ccb6d5b7ef76a03694c7b424c07a29c03ac0c76c1cc0344acc65460c6e33b050cdcb849f0ccaf17cb2b30c9733c8a969cbaf39b035d2c94a5597eaa4c06c38c03c5fc759cac03cc0cb35580c82fb8bf4390ce9b9c047b5c7bce6acd9044c735d7c73280c940507e702c04265c7b3b2ccc833ccaa3c8c837c0ce0618ce4110d05768c74a209e498c02d7bba5ba4cc9d85cc3dbbc86e547bd43d0cdb5e8c35a49ab7ae8ca2e80caa98c05d27c85bdec038ebc79266d030abd770c9d02f6fc48f85c7308adcd728c039aac8b4bf0cbaf17d3e25cd0c49c8ac79c03c9accc98d88e359d03e5b7d33d109cff4f7d0237ed4839fd9e43bbd136c0cf4a80c7136d05e3ccd1a378ce3700cfe48a052ffd752bcd77037d9efe6cabd757d52670d58d94d54897035e3dd5d8a7cf249d7cd91cca464dcea9f8d63930d3c17805ce09000ecd79446dd0d847d797bcb5b50c8663ab8cccb9d7ed6b894c30cfb527d95c30d63650ce21eb03289dd2d8697dc207d24697d408597e81bd03156cd83860d78c84d7797d039abd03e567d642e089933bd8643d8a83bad44c0d05887d941030cb52e7cece2bdccf6d7dff5cdb5c7dd7cff89bbbad03e0dc046b0d76b4fd06a24d89b408da1080d6695d05a7cd9110d0d620090560bd04071000f23ddff45ddff66ddfd4ac02b6bd48b86db8ffba5ddd3400dbcdc8d9b40bdde25dd83f90dc545b05eceddd22d0d89bd7d21addd381b0df8ad4dfa7dbd5004e90061eb67d1ddc4e6bbba968da24abda56c0dc471782ac7d731e6d0416be072f8e4818be9e1a4ee107fec34a80e25307e238aebdcf57002bbea6675900cf4bde37d0ddbc37023a7e73df2db81bce07317e4833fe00e89bdd841de25ef8e4828de5fefb7c00b0e492ddb70450e455e0d9093a020d5eda5869e37f10e58634e5ce3d02563edcd627e1ffcde6fcdbe1a1ebe5690e7f7cbd7b0eb0e43667e4776c7d190ae17ce7da4e8ee77de0e68534e5548eb85aae9693de03730e07e1cd8b869ede86ca03c577b2cf47e834a0e052e7862b6e73ffbe2dc9958e078e4e48903ec1977ee396cd04b1ee0699bee7170b01a4aed547bd7bf1d79ba27eca3d2ee8f93c91ab7e07ad3e48e289e4a8e9cab58eebb3de808cbe06b7cee160d8b72d1e037d2b7cc04e05c67de624f0ed9c97df3590ec7460ee8124d1a1feb1c7de9cedaed7ef3e06d59e943868e67b18c7b50777dd3e05c44e7360cbe9af97edaa3eed301eefe9ee80a049c32ef0ecd67ed1879a8805cee51f6cd9cc5ec7bc2dbb22b0ef5270ea3587aebb6e74d33dba04af07e80e481adb9abccbf0f43ef2966ef06130ef30e09e2220d4dbd9eb9f2b021c4f73c10e03f61ee12760de4d3ae02ccfea2eff4762fbf1a4b8cf455f0231ea042abfe53ddee5ffcfd7747dcee2f0cec42230d753f0d37b87c2e26e919bb9f46f50f2466f8d557f74b1fdf4943ef4b22df65d00f36b3f8e882e75212fc5c097755a7f8ad28d02001fb96beef08240f67e34b81cefd726a0f62ed0f4ade7f6a1ade70d9f7cbdf7f110fd02c0e79f790f057dcf791e8df43627d57f0ef815cef87a34b8676f74818df82da0f8b42efa5a00f789afb2407f74767e962178f94ff0f57c2792b1ff75e42e03823ff6e557afc20f00a99e80c559f8672bfaaa2feda00fde8ebff2198cfb5227f0140c7ccb67fb4eb0fb219d02d20f76b17dacacaf0690eee565e4bea57f73d98cfa2cb0fc5f1dfe58e0faa9ffc3c057f7d58cf122d0f37cb7f32e90f3ff0f00020c349225f2a0a9bab2ac58c2b13cd324d0e2f95af3bdff0383c09bae683c22932980b0e97c42a3d229b56abd62b3da2db7ebfd82c3e231b96c3ea3d3ea35bb4454166103786b0114d0e3d9405e97c6f7e1b489f105b60474151aa6289030040e4819be40282e3e08b01d5c32f22c703e4496bd810e9ada80a682329db6babec2c6caced2d6dadee2e6eaeef2ba9272c2002e22fa0897eea93efc25f73a5972126f3d1b668e28181e404d2b25906cf755ab5d831af034a49693fd5e367bad27c323b1b6d3d7dbdfe3e7ebeff3f7fbffe37b67080682398be6f130060c99aa650d017a4b164dcbb73ce13605eaf644219c6c232ad20997e6112751351cffa41219466020884f58c68bd902a1cb9a366fe2cca97327cf9e3e03320b06ad58502c20f3384c65f3289d890c39892c108800149845ec4404a5f24c2a4a344e80c23ac62a9d9f33c8ca4c4bd32cdbb66edfc28d2b772edd536895c4287869ad0c8e8b281635e377604da6709c1a4d598240a002500c35286118c9d632284135ea71f708027581dd6e4e0b8f6fddd2a64fa34ead7a356b5ea18ff41d9af07395c949921e73691b09e22bbb8b88bcdcc7a390df2b268e83bae61c28e23506e7d128e6b511b9d445af6aad7d3bf7eedebf83e77edd4f0c8c8ba8ce7e9858bd60dafe8c17e96d053e0e8460fb480f921c6909e821d748c589633ed0d7027ad3b967ffd678d81d149e830f4218a184135208cb8282c8c0d825cec5c6de7c0986e11f7fba4994482a342d78601024e5e11504222a51d918e65da2220fa998b412883e5dc8601fa45518a490431259a491e1f5c8c20c344e959e524fe5d69e87ff1488837cb59d08c37e700c288441796446028c49c8284602a9e4c7439229a4a3e394421c20809c73d259a79d77e299279d1c5ab1a68f4a0079a4a083125aa8a187dee3670a3468b8089ffdeda84da45e8c895761257251e50a3419808d109d06c261a5479419068b1bde914a9860288a82149a8272a514adfe6944a088e29aabaebbf2da6b15b4d2c0641f360af5e614b0ee80c6a8482c85a93459ca9191105b2ad1ffa5988aa5f1e522d6f6802c0ab762016c14de0eb305adb5ea00aeafebb2dbaebbef0a29ee0c8d7a3ac3b2b041b9d019f75677a92ab21e9b0ab710d00b47642b0672b01bd89e412eb137a6d2999b4f4a8aee21e65acca0baf072dcb1c71f83ace08ec896c9af1eeb512c65ca00918b02c0af4e79661f62fda02d1c0ec4a068a95f30c7499a9aa582f3c4513a93310b2fbf64b4681b87dcb4d34f431d752df29e75c90012c760327928134d86d63934fbaf892b43705f1e58f7006a1f688fa0731a9f3427c4d72c3c8cb1b140b41c08d24e9cabb40a4c4b1db8e083135e381554cb40b2bd93167d371873b710762a7b3fd1b20c70e721b40fd426c197db6708dbff5813e40ecc05e2a3fb9d02e542f49dfa03801b1ebbecb3d31ef5e9395bcdf608902b992f3bca327e4fdeaba34ef68b0903712a1caba2a2151a32735237c471b31a3c0d79f741fc10aec7037beddf831fbef886de0e83e2595b1f44deb8e90bd1f063775d492034f360b3126d2eecfc19051bf2b30f8a32cf74e94b1cf7b4f783d6a5ce7be35b20031be8c0ed940f060132448eaee5b88a194f0cbc4b1689c496290f466b6d3e501b1d4a070155ecac0bf60b951338d7071709f082dd2aa0ddb8a70a053e30873adc210f7712c11240af7fe89361e33218a201b6e37d1f9c9c0c94a704cdd5c08547a81b0acf40c26d3de18a7fa91e116b80bd3c18f07f364cff060e7b68c633a2318dbbf861092628ba6219715c48bcc2065520b958c14f363008a2c17ce0c42440b1045554d92514d68415f62190358c9ffa68a80504faad8c6a9c24252b69c951048f8ff881232361d6c52dd47151fe62e212f1589ef9f900919c99c120cb80b94b283279a930640ce348204766815600d8252f7be9cb5f023398c2f4252d2f69cc63223399b5ec640cdcd8076e85d255bedbe2bee6d80b253e8b943178251cd2864a56326c0c66bb84ee8020c51272d19633745d1881f64965c2339ef29c271bd808449f41ea9d78b36615a2a98c519a329ba08825047ad6141e9c13383468e51834f9cd2caae251e1e2e7477039517dd233a31add2847ffa3604f12e8651134f32760304a478aea029b25d55f0c84f39f1afc1109f8930c43c5c03fe445419574f0df45d5c9832f1ef49128ed28518b6a547a7ed482e5dadd500968522b9014a07a5ca972c099875be9540715a46938c5e04c43105496a080612e510ad4c32cb27d475d2b5bdbbad1a48e20a486984754b9a656af35f5162a9d6620ca14537c2da9493368590ab3a0454394533f38fa025c076bd12b34d6ad929d2c651f18d90d12a3aebec9eb46385b8bbdda7511654aa80eaee45024f0547e5d05036993403f271c566fee30eb63fbe4d9cae236b7ba055964e51a085668f6434fede76d6701dacdae9604a1a30ca358e8d8e4ce1614c57442569530ff5dc8d2969d69fddd6ebbebddef0e2eb2051d4a70b1345c2a94f73dcea2ea25c84a82afca8306f03dc26b4be0d24b14f60ae35c4458111696e8fad48bb5fd5571c16be003237842e25d2e1ca892de809d770a0fe6c771859b9de6f621b07db82e53a1cb85fb2e22b1d35285880f8752040420c52a5e318b57dc5a25b4534d054e308d6b6c63d58897609c885381d707bc08e7a2c2e6bdf00c409c84de9cf608b28a667ead70d3995521b69b5ce65dc120e459cdf8c65ade32977f9263062b810013962390a330667d5c19c24496c17ec994a13e6c9593f825c37cf3308061e2f997aa909e89cb5c3c6df694995d1e34a10b0d971cebf81275ce305f5bf2e300ffdb23cd9e5cb30cc6c39745ebc0bd4aad6a18a43c46ab7501d1930e68a0ab6ce853a33ad53841349895c65eee12d2d4145e6fa3f350df12bc98055b6db50e52db6196b2f6d332992976fd5c1c5adbd6d8aa5e36b39bed0b7efed5d5b51e51ac61cd326423d7969e2ec24c936c048992c0a0731643b4854d0d2a5b3b0c924e9ab29dedee77c37b68b25ee7a75feda8470b3a1febc660beab8b03e63dd90826cc1fb0bf60ee98dcbacf90ce36a98bbdf078433ce2120f354521496d0b377c0c67d637b6313eef1104bc082ec2740e38dcbc8277c1c807e744893d9a650183b0d4e99e38cd6b6e7387e71be663b4b721622c85905f9c4a1d1f72bebdadd512f03aff07fd6d5b4dbb20ee950f74bbd41cc3be9b20ea9b633deb37bf3a042cdecd6907d50c5c0ff2d0a9e0e31ab459a62430fad66ad0aa264f81e450a7039f5ddeee1f549d752fd73adffb4e68aeabdc685a48fa13d1d02a49a6b4ec6aa65e0db8998430013d079a2638a7bd40f8b9576b0b4f9f3a21145f95bdfb3df4a24ff0d8e5eea32d2403ee58307d7ca57a099fffd4f35aa304eb57104019d4de08aa8742ae319f0462a33719c0f742de8330f6d1233ff9351e3bdbff84faa68b818c779c2ad8d11a7b3b8fe0f22c183e0c526f2adf27e3f612f67cf5612c75c2283ffdea4ff5f1732f932d387eaea0f3beeb972ad08ccbc0df2d2847f35b30f0ee439f16e8ff1ff8b51e16f4de11f8dafd515fb23ddcfa39e003ead6f1f51f769c1f949941deec5e3314dfb1c51c0d945b0e7443e4e140dd9100fd111f012643cb1511ca7dc1061e10e841600ccae0311d1f04b85f3c6c81085a4a191ca011c01e2eb8e03e75e00c4ce00a50c50d3ec0d295600062c1e6a1602028e19f8d551904a13b35e00c62611666540df6200e6a813f715f17e8e0ef4ddfebe5d102ca80f6a94001a4dd2af980097641fc3de186694132245c29e19fc2e59c16f2611fc6530dfa96e06941e0f581f879811c3a5afdf5dc199aa10f202270fc0810c0e116a8e11ceac0ff41c100320b1954a18cdd9d1f8262282e500d1e4fea506232906016b4a1052affa26ce1211aca8013ca8421c6c0246a41115a621180dbe70de109f6a21e7e9c280ae3309a112906a2c570413260e22da2e24d7422bde5614ba14b1802a08759c107e62212d0e213c822387022f9f10d0c12e33892e3c79062294a9b50a9023566c1186aa3338263e5c463adc4d94231a1156862364a5e1674a10edc21cfb962597d623912644172cc391e63ad70813f999c00c663a43da414c26213fd492a2ea13552c1b6e9e36d608146d2c12e96df915520a31964499ae4ec9c63a209e2202a6343c1034e3ce3f5011a42fd490256230b9ed44636e215c0c3368696fdc91ce79de45012e5d3a464250e64d9c0c30fbea02a4cdeacfd22d14de429f9880a0affd23d52c123ea2412346438aac23232dc54dadd151665599ae5a1a4a44a2223ba35081878e4f2c0644472e04cf20012c2c13fd622564ac12a6e2512e06513f8d30330e52d45259625e5592266627e475a22e51e3e413f961618606347c465612e9e58c2803bf69510d8e215e0621114409e89e66826034836c15b024ae759262f92a562bae66b3e485aaaa542724163a64b0bc20358a2995c36d26ada1783104f673a992af82403e2d3eac1834d4ae54e0625fac1e6734267bc14986d0a25166865e61c223c74e53ec4a4ce45239b61473dd6807056413e729b0639653bc2c3d53c0e6f8ad16146677cca674fc866d7658c1740660e0c80694241373a173cfaff26bf61260c58dc53ca00794e016a1e81780224f6fd647b7d8182f2c64806dd7c5ae885e2d88c9d55db0d5e3c2c805536c167d2974e74e7f544647e22601320a81444938162817bd6805dea40060201025c67d835672262e88ef2685dd4a77da2cb174c668319564c282777c22861d2250f48e847aaa85eb226271427ce8d5b4e26271768e684aa636bf668977a693ffce88662082382020180a80f3880792ee84e94e8732d69fdc8c45fe6254642015fd2013b624134c969105067114ca91064a9960a24977e69a11a6a3bfc28903adf17c8a83ff2670fa0e88cb2699242e38066a64c6ce79ce2e41410221d30a80292937ac604039c690f20c090e22895ceffdca1b26aabe643a28aa8737241ac2ee89fa62102b1278952aa4c7e2711ca8401ad281404ea3e9641321c299fa6c5001c6b0d18c08d06648e92a4ab4aebb4d243a2da206d326a5a14c0b266dfb0bad9a406a83c862b48bd9f1304eb1334aaed89dd9e6901aada1ab7229db78ae4966a859ed8ebbde2ebbd0e26b5f2eb7c5a2bad5628338a460134c0cb1c4002785daeeaeab84a24730281b3c2818b1e28949ea6f0551b0575687812800380a8012800c402a5aaf6650ed068bf9a2c865aebb59e9ebca98598d90900a4ebe3f5449b3ad59b3a09713ec1b93641a4ae61c358aca8fac80200409e0000c872c29e5addc832d7c9322db5a62cc07e9d5b2aed88ceffecae7aa7a59a4f3c3caaa6569e71d6081ae8ac1024e4d4ea009eb21bd9926cd3aaadaba6acca52a018f8e7d49aad7a31ec5cf62a0da8e9253e06c572a62ac0abd7b6253fa2ed3bb2e5e0a240c9ae6de22666db06e698820102c4acef21aef058ad89d6ed08b8ab1164eac4d2691374aa9356138951e8e04a6c941aae0a4caee2aa2e51b6edd88a230934a925222ddddaacd9b927d4b240145ad5a6f6e757a641dee86e13b8eee07e28809d2eeaae6ef2a2ac38366eef8c01cf42dd7e9a05cdc64010f6290b94ea4d762d15442e0a586432b22ba89eaef41aeff11eaef2a2af7cb66dd9e4ed0e8e81bc625ef05edbe50a61ed7a02b4e42cdffec0f5aec0df5eff41e6ea2d17402fe60dc0dc8ea5f99e6ffa2a306cae2f3a962b19d8e8e0fa2f54daefa8616d0cc4adccee6de72a564489c3cfe6a0f91630cb1e6fea2ef009fb6103dbe9aa7e41044fedf776500593990c17193a4441d8fe0000e7806e7641ecea80ad3a810e83df0893f0e99a300a23311636f06cbea415b5afb9c1700cdfed0c4fb13d2a9a24e8ef1b86af1a3cb10b78810b932d1117b1e11e71129bf1032e31ff722819184017db50144bf105376cc80a8110ab001c6b6f95daaedfb2811d47ce17fbb1b92dc0d6121802a740199f71222bdf1233317ca68dd142715c506fd6d2af357082fc722eef3641062b01210b703260f213c0efa7912a261972022bff722a132323abb1e39e01185b221097211d87a5c3c209cb613107ff002407f01af870c91dd15622b2f19d322aabf23183222337b2637601028cb2c50c4028cff222bea22d0b41a3ce6e266f2f14b4b2f70e821bf76c182400381bcd00ecabde15f33023f33ad79c32ff72bfb0c10033c80218704e4c3257d130866d662e6b7210e06eff0e4220af80274741b3e662291b5e3163023b3374162ab3a2beee08f1b2c56c2e4fdc7356e4730d1b423d6bb31e4b8140ab00417f32ce6adc1346f31a78dda7a97343b3b4bb3d3450b542f38242019c733f5c744555725c61ec14e0309c0a8c29bc730b94ae1518b4ef21b41aa4f418ad744b33b5aa3d3444132a2526ffb5120cc0525370158b6b4657cdb050414f5b6e2ae0b10aa9c2a7ce6af7c2c302d4b4e99aaf5537755bff5d44e3b3236bc3546b6ef6fac44dab9656cb00644ef055eaf2cd1e674057aef00a00390b4c5fd32b02b3b55b33b6963d35044cf41a9f4200d0b5ae098048dff560d72c56d3c02f63761e8b561544360e7cf616c8f30354b42a268059ff16628feed42e7663cb36e9c1f53dd5366c118061fb6502d8355be07577aa6936efee360b6f4b9e4250b38070efc133db1901703482a4f36c4bb7cd3db6db32f31a240003e8761d3440694faf6657afd5066a6a5b713ffbc03fdfb12b6cb7775b010264f776e340016cec2c5476eac4f674e3777e576f03b4ff4a01304002b0b77eeb86009c8b7f2bc0730b78822b78d30440021038c8de99980540802ff84d188083330075086d03084000f47685837888874c8bb518858bb8591c0089b318829f788bbbf88bc3788ccbf88cd3788ddbf88de3788eebf88ef3788ffbf88f0379900bf9901379911bf9912379922bf9923379933bf9934379944bf9945379955bf9956379966bf9967379977bf9978379988bf9989379999bf999a3799aabf99ab3799bbbf99bc3799ccbf99cd3799ddbf99de3799eebf99ef3799ffbf99f037aa00bfaa0137aa11bfaa1237aa22bfaa2337aa33bfaa3437aa44bfaa4537aa55bfaa5637aa66bfaa6737aa77bfaa7837aa88bfaa8937aa99bfffaa9a37aaaabfaaab37aabbbfaabc37aaccbfaacd37aaddbfaade37aaeebfaaef37aaffbfaaf037bb00bfbb0137bb11bfbb1237bb22bfbb2337bb33bfbb3437bb44bfbb4537bb55bfbb5637bb66bfbb6737bb77bfbb7837bb88bfbb8937bb99bfbb9a37bbaabfbbab37bbbbbfbbbc37bbccbfbbcd37bbddbfbbde37bbeebfbbef37bbffbfbbf037cc00bfcc0137cc11bfcc1237cc22bfcc2337cc33bfcc3437cc44bfcc4537cc55bfcc5637cc66bfcc6737cc77bfcc7837cc88bfcc8937cc99bfcc9a3bc901cc068b2fc2e710102b43ccb7f3845c4bc680ef513ac7ccde7992b1880ce0f138b8f007ffb7c30bd45ce0f3dd19b82d01ffdd2f7929c28400000ff3ddc32bd2ff182d24ffdd5633d30457dcad7f869bb0c17b076120e022787d91778bd60b6c23356372c9c7d5aabf518f9b70070ecb3c9f56b2baddb73bd8883f40a9037103037f2b6c1b9b8760fecbd0af4bd2fea3581def62c147e0a1cbeddbb8e7ccf7de02f3e309a2fdee73d88c3f70328379a8ec620c4c3cc03c1e6777e35d33231d73d2e90be29d4777bf1364a57fe14b4bed2607ee62bf85999384178e11a604fe9e39d4ce4fe1e273ee50523806aed20cc7ef4d4be2746754217f3f2dbbe7e93fd4e15ee46c7b376f28c4c0c7e2d9ffef6a4be2d4c3f1c6cbfe5cfe1028c3f3a37ff19247fc6407ff4e3f7681741586f4e4ff6f1527e01fceb80fc8bff2f35bf3d083ce24896e603a5eacab6ee0bc7f24ccbcb89e73951f77e0bd00987c422b190f8295d412371098dc29aceaaf5ea0c48b7dcaef70b0e8bc7e4b2f98c4eabd7ecb6fb0d8fcbe7f4bafd0e3d608b83b261bf53570078d277a647a86378179058a22545e5888247873869b2482789d9e90460c0c69958e933ea894a0859cadaeafa0a1b2b3b4b5b6b7b8b9babbb0b9b904a124a36e0596089ca80e6fb2b126cd7d8b90a750ac82ba6bcdc3c37bdcc2d22b0b68da51bde5d7e125d9daebecedeeefe0e1f2f3f4f5f3fc3d0fd4d46808a30e7804a011a7cdcf439f3844e09392bf67a105c66509bb9892316642bb3b0ca388a1c73246c0832a4c891244bff9a3c893265ca61dc1694b986c9c19c06a80ea061b9cc2523845b323a51a902e72f9d9b3a4e1c90e48c4f231b8d3a15f111a8d4a954ab5abd8a35abd66a7fcaf91b830055c4374b8b143bd3b5dbd73acf3045ed51f609d0b4dcd6ca89fb144b03a59e9ae6edf876abe0c1840b1b3e8c38314801e66492b9d109c01c547bcf302ee7982dcf487d815eee96f9eedf723c3076c68577b42ac5ac5bbb7e0d3bb6ecd93e20772b3d86e6e9376d63a2b1cd0d379dde8e02d348ad432af065c2e320576da43998e738fc422f679cb6f6eddcbb7bff0efe55587367c7107774918d025468c6972b3f7c7314ea2780baef06dff9f5e064e89bb0bedf32d985476081061eff886082e1c1d44d7a5f08e58840703c3489646730c88d83bcc927cd6e2761884d5101fe925418fe9500e088a80ca8608b2ebe08638c32d6c3cf44128e41a123d2ad314827379651a3393fca71de6a9c75025490e50c49968abf68782426293ae9d68c565e8965965a6e590784dc5838068880e4b7c6259840f9204560ce5124202c4ee1a1495e2eb3261c2752594201767571e70853e299c89b5c0e4a68a1861e0a235de6ecf9859993309a86987b902986a25e69064d4f719264a95a1201da49655ff429c29fa0ee2128a2aaaeca6aabae6ef5d944a185d1a36f6ee886c98e61c4da18a6554639894abc62f6e9a993a0a9d0a6b3907a6aaaaf3e0b6db4d24eff5b0db343882a06ae938ca5c67289cc3a86b542601b479ba86a8a644ae2ea40ae1beb525927ba52e6f2ae93ce528b6fbefaeecbaf19f74d44a9170045f6463f67fc4b9eaf93dcbb02b32921fc5eb1c61637aab2b2d4ab22c3fd6ecc71c71e6f3c70473691c15e1be66241541921733432911c2ee1304a2b53d4729313575871baa8dd4cf1c73eff0c74d0f82a4911935fe49808b2620c4b08b762106d637c9902eb484a500b295a64006ccd75d75c7bcb91d235c4bcb3d65e9f8d76da6aafcd362842bf0d77dc725f592b47c890b19e8f6d204d88d85bd44dd1dd2e4f3d9fc520013e91e036cffb4300093400762aba26abf32d64cf8d79e69a6fce71a713f9ffe1c9e4c274a209199e9b23f5af8557ce695e59339e8700887b52faeab0db7239e7baefce7bef5ce6ed14b85fcc3e291b8e2622ba17c01b253c1b275fa1710ab98fb47c47cda7313d140acc69abbcc1d26bb8efe28f4f7ef9b261cc2e909e404a86a4589468da53ed9afc32e5b78f847e0ef3ab917d1eef263fb6f0bda27fe62ba0010f8840aafc25656198d9b7d6a02d47d48c647961a01b9e6785e84180800d59a07e58c785ab3922603fe0202c4c98c014aa70852c4c87034546068801c2698fe98405c5f042960d4e751d0261487248333b095009224cc4046136c456a0b0854c6ca2139f3893d1c02f0c91c342bccae089fd812182469922fd08d7c3fbff85848b1df122ff92e80304108f10d7830b1a4bb14428ca718e74ac6314d698b832308d1a69c060153448033c9a437117ac5f09dff80e41968390e040640dfc68051a9ac2917788a31d2f89c94cd2f17846a9dd174e8705bf6d618f7b4003273be2c93540d2081ab4e43b4ec99154a2c1953e28e21eae78481f2e8b929aeca52f7f39beea3d059030e01e168c2606beed81916210a6538809855516a195bc5487338d02cd5c8ab10bd2340b176889077002739ce42c27dc94d9114986b01300ec8231af804c30a09323ea3c433787404d5dda639e14a9677faa39832a96d27b55039f3ecd89d0842af463d7b9a117dc67051236ca1347144343cb65c8491e94ff1e177517406540ca3d5454a3dbbcd847178ad294aa544bf75c06fbb8004b2cbcf4a19d90a8175afa8b999a01a71e21282948c25383b5419c8f5c914f09612a71ac74a94c6daaa1c8f814337a41a056686317a0aa173460b58b7008ea398ecac7916cb58c1edde8168c4ab59f96ada44e6dab5bdf4a20aa72a49d50186b15fcb905b93ac1aa5dd0eb44e82a06af9a209f6c9d875fcd01d89c1516ace74a2b520dba58b84a76b294454c4c3b5906c19200975e90e11e740ad300c9d29e1975a359e17159549635b251e0a715a46a5ad6b282a895adad6d6f4b12881a45944a782743324bb00b8d88b75fd02c0908fb3d91e8b623c4fde6496310d22be03506b4ff15916c718bddec6a371eae4d6719ba6b84e6f620ba5588e7d14634dd30187704c82da848c0dbcfa13e1706e4bd2b6395bad6e46e77bffced6f3b7c6b84e51281b35cb8e631e377ac9b4c42c043203070c188c4d3be03c04560b0101c2c86eacea0be4e48ef0b34fc3afdfa77c4242e312c8c0b80d41a01b47960671928ec4dd23a22c59860b17a4b1b4009b703c52a2e828dbd00e218ac57047c95419085a863132b79c94c26835d8bf00d4516a1c85090728c2be5e2333c9908519e0495c130e407b457ad20d9f210baec882ff369be2f08f3981f9b5ff73679ce74ae33180e2b042dd8d20989fd819989f0631f587808b0fd029e75a0e749f4999b383e0eff9b6b71e89eee393aa278740b068dcffb5e21a99bb6b3a73f0d6a1a78f6b798c6814da500c42ba8b907937642a097306a8d40a0d4273875601b3d8323d722d63f99f5246cad5811efca13e26d98a52b9de4502b7bd923a6b5092cd46322147b06bceef018229d038782c1d92580f699bec8c3085f571ddcde6c0aa23d8469db4fd860e0305334fddb389399d9f4aeb7895bcd6515587908e685b71130ac846a1bc1c350c0f799f53d897edf1ac2eb96b33d0c2e0483ec5b080a0fb6c3c300f121009bbac76e64b2ed0df290bb15c6994e41c6730070ed7d7c0643ce663117a68293e320e5c5c5b5913b0e0b92e739e6383be3ca633b63e7febc0eba16b9d18fffee4b50ca3a05e52601e8bedd6e4c8cd60b4aef35d3c7cd0537fbdbeaf6a8fabbafceee7f0e9d069e203813708e3db4237ded6c67a2bb2fbc02740b61d53e9838c54d8409660e3be82a90bb0ee82e05ad3b36acf678bb0ed6e4f71c005edc616734c31b3eef5a14bded94afbc0ab17d82b1d85d7fea537418742e84424f755b2cd83c0eb4681e9b737cecb8c0bc09343f09d44f07ed7f96cbd6bf6e39b55b7ef7bcd79dc089800e99d7fa2598d8380dbc6e84917ee1f725e7f9089da77a38b1de16ccdff90a846f02e30f7ea06300bd10f4aecdc6c762f2bd2fbff93397eaa5ab20fd4e50fe16aa2f8457c7a0e9154103fb719f82fb17c1fd377e3c49c5ef0efffa677beb8709fc076438477f24207a39867595a47be7078111c831d857028c047f39507150e07a26b0782e408125207b5df0812360819890818e176e90076734320925987069377d2f607a3a207f67178348d68012a8833b183433680246b38124007e5c60783a607630108424d0813de0832500842da84ad1f7610f88074d48024fe80843687191d7054528048b368537b83800c8836568863f837cd2e602b5970353270569d8609d258630008742e0206c88036e5873fe077417170f75a8037738097a287439180380d87cb757049c166f67e8888fe833065605a9248089f87986c802eba5855d20894e408929480682673b64b80e9d68049f08737c3187ff106000de077707b88ac8868990488bb5482877a27717787adf0575a36482b304852ea08b27108237258536388b92178c2d308c26508c8a38805cd08a68b566b1e871c9688bd9a88d30d28c4e888493a06d5c90800f7082ab274107f38b2f908422108e60768c40408575d08d57f88d8ed08ed5888d29b03da840738e668d3e978fdb289003191e9568873080873860802de6795ce08ac377060619880859807df48e2c407ead20913900250979020bb97df81578eba26ef0f88f3088096da3922bc936cf48902f09930de19125305a1b89030b1805ebf800dae70288880360e86783180336790238997517696c27590933490235890946398a7ed803089000ffef7284e6488a4ac433ff16935de995246185241803f328964e56635b608a46b08435109622308464e99616c9870c9895d5d0960ff09679a78ad715007da90090d30df7a88284873b5b5904fdf89589a998b7907838d06f3a49884b40941cb80523380235e8038d79028f299468208a615497bba0993f68039d896086e98920f97f526952a8f98a8b099bb1c90b695904c8c294c08045a427057789984b409b6a1803b739022549039fc978acc90ebf996e32209ccc6006f9331a03409cc8189a95009d1dd19bb2a99ddb2907f025046e389925709534e09d87270570498e03619a30109e24309e3d609c83c97df2509e6d3803ed3902ef996bae798ad3499dffc87942fc699edc49a0055a0a7a2903e829982a579d2c809fce7906083a9698b0a08187942a909107ba8c30a0a0cf29a043209da709a003f4a13367a0278aa271f0a0e9b99f8f4206a35902d3e68585607fe978732eba53172a3df128072b5a717d8299fe58a2b5e69f611890ab35a423909d29caa44d1a9493b090335a94657097e588910d6906cdf90051fa9432068aabc985eda0a55cba60229aa47819a47439a2ae709d1cb1a44e0aa771ea0277096ceb05943460990f70a75d7a06745a54581a8a3aba413c1a077e5a9cb962a6253a00560a9a6baa9567aaa4722aa993fa03304a028025752af36b50e0932790a63460a92380a9eb997a7329a40d6a0bffa12a02a3ea0891299fae49009fda8761da9a90fa006f4aa9b97aa2e308957d52a42c809e35a89c3a50a151c0abb3ba07bfda02f1197e8eaa0bc7aaa680a0ac187aa604a09af888aa76d0a66aa2abddeaad29509f39a09a524a9a62f74044147bea09a5e365a3a5faa5c84a98ee10ae0ac9ae2f182e67ba000d30add277a4f265abb7faad014ba90f997d3eb05eb82a03c39a034778972ef702049b27069b92396aaa2ddaafa500b124607c076bae675a000a20ab169bad44f7af002bb027eba476fa039d10b23dd9736944aaee8a3c2b7b96815ab1377ab178a0b23ec0b2f75ab20320002d6ba4236b5d908ab0288bb402a9a550b9a35ef6620dfaa09bc805ff4bdbac80b0964226a8196a07540ba67b70b5ff69ab8b9aa8f14a0bdb3a11479bb4695b8b3ab9a53f40ae2570a73390a7c4f5b623c0b41a58913e50b7a2fa60ef1aad2be80e6c7bad10b0b7abeab3255b1183fbb764bb4bff8ab66a0bb966a8aa3ba904ebc5933d9080567a278a5ba9c557b99e6bb37e7baaceca98a02bb19b9a61884b935f7ba54ab997461bb9b1ab98e308869dc0b9a206a864f77cc295bb3560bba19b8a5149abd540bb4bf0bb78a7ba2570b7224bbad659b28f2bbbd16b7e79fa00cb3ba8f67a6dbb5b039d0a826840bdd6db278cfaa7a2cbbcc3cb0bdf7b9c8020be389bbc763b7baeeba18e2bbdf34b90194b029cabb03920b55050b8ff3f96bf27c0ba3160bf2380bf12da7fe4cbbecd5b0b032c0205bca1b0d8be0ab88580ab8cf24bbf176c8bdc1bb14ba0c12802bc56cb6a44bbbda6fb031dec7432db33c24bc1ea60c22270b9ac188b66ab1afea9b5c068c1188cc38e58b80fe0922dc0c00f10c03eec08e9d596fb2b053bdcc32cf0c341ac02ccdab58c5b0d481c054b8cbc11acb1215bc3af7ba6d09bc35d5c6f6cdb81f34a8cbc980829a7aaeb5b1bdda30462ec8c281c28d03804f000c6ad8509495cbe4d230079acc77bccc77d4c005c530e760cb62bdcb829c992878cc80020c85eccc821879e0f10a4ff0b916192950fbaaf2bf0c8914cc27b88c058a9c0b290c95120c905fbbe016900ff0a70975f05c742c088ead7c8af0ca7e358ac2dd0c20dfca2093603c2f9c28246a16f78bcee78b39e6cbeb920cbbe9cb7102cc22e1000a96c6eab9c1c9095ccb02ccd2f49bd8b1c147c3a066df9a33ae2bd75bc053f6cbd32e0c4f03a9feb50cddf8ccdd8fac934a0a5121c929d266f843ccdf3ac9da9bc966c5c8165209cede4b47daac64b80cf42b8709dccafd15c0af6bc05015d96c8bcce34308e23b0cb4d9bb30069d0f46cd18f58cb908c96994a06f8796ac625b42f90d19f3aca3439d0c1dba8c37c0b23bdd131fbce8d982dd498bef23c7e847ad1375d79254d02b3ecb204ad04380a033afd003cad0442cd8ed218ccf099b5369d06463dd448edd3ff09acd22f5d05463cc8505cd3f08bd35b5d797d62cd2bf0c35f2d030a6d550aad9fa30b08629d02617dc0283dd3580dcd84a0d610c0d60c3dd55190d12210a4591cbf13cdd57f4d798ffcb50a7dd47833c432d09697ac0282dd0584fdd4c01cd526e9d770c0d85ce0d8443db40d1dc27a93d2341da05a0dd8a10d722baad105d6b36360c20416aaae0a05a41db24e5ddac698d4997dd7b3e0da9c78da8558d13030b922f0a67c3db6e52cdac3fd88d48bd9b4dc09e11c48c8899f715b03c64d75c90dd96efdaaf0ac0ed0dd0519addcad3bd92ac0b67addd9704da2a04ddce5fd69a93c0089ac3659360696d9918eb0dd6c2975ea9d36ec8d82d45db59e7d0bffe84ddf6863df54cd756500db401cdec25db64c6dde09ae6479ed24aced03f8194f2772bb3dc0e02ae2e0583bdb576de0ba50e12372e11a2e9265d0db3c5ce0215ec1ddade029de64034e25974c9693638f68c0e24e52a4e3bcb81b9e0b33ae22d309dc10c0cc4bdae387bbdb2a4ee475e6d88072d6058d0501a359733dd6569ce42960e368addfb570e47892e43d7ee5256edd8549de450ee6db65c58f3d067b0b2942edb02e30e6c7bdac4bfde568b0e6ea5cdb474c516f8de3598de261aee7d945daa012d22b60c2c213d01ffee0631edb5b30e5772cdeb4d0e78022ab3d9ee820dee5273ee47b6ee9fbd5cea0c2c4609d084e1396565d5786ceba912eccff553e0b990e28570be99e00be086ed7a67ee9b1de64cc0c2ace1d0323182fa18ac64c68e8b62ee56e9ee76a40eb8062eb3dfec80f7084419eba6f2eebcdbe52230e2a112d03f4d702f839e13500ed8022ed4d0cec950e07d98e27db1ee46567e7267ee0cceeece9ae503a8e27971caa17719bdb3e03ecdee2f79dc25c0ed3ba40ef34eecc39b006e45eddf97eeec1aeee05af50577e2abb5e9a84302449e8e43180f0a0a2f0bf9ee192eded6f10f180a2f0e3fedf376eee857cf1062ff228f5c313c3c52c709bcd91660a66e8268be8ddaed97850f2c682b01c3fb101efca941ef323cff34b156613f3e7dc4e08f0a1599ed9f297799415cfdd210f7d477fe8ff381fe066e009d9a9ec55ccf43d8ff5be84eac6b2e9d74c086b51b727bf864e4fe02faff44949f0594af64b68f30fecf1933ef0579ff5737f49df7d330fdf02019d19013df10145f66a4dea4a3ee7ad60f713f3d56d7fd8508f7f3a3ff874eff80805eea722ef2fa0d30661bf8a7d6e644fb9661fd94bbff3c640f6118df89d5eee700ff29ffff8a98f490fbd95d71e0396ea6d439f0c9adfb6167af6d48aee61c0fa3c33e1abde09c9eeea720eebaa4ffcc094f1c6d2f732f8534de7eb4faef90a1ff8b43dfcad70fc09afc28bde057d0efcb92ffcd85ffcdfdf4b33cf33a0ee03b7190ab719df3420fe3743fe9908f38d5f09eb3f31ed2fd1729f023b4c64ffa52ff0a70fff20008923599a279aaa2bdbba2f1ccb335ddb379eeb3bdffb3f30281c128bc62332a95c329b4ea6e1219d52abd62b36abdd72bbd4a0c3ab4d4000e22c62183db3dbeef7d7168063033733ddfac4adf3fe3f5c0d1ee083d120a09dcce1df9e20a15463a4e42465a5e52566a6e62667a7e72768a8e892c0a3e9695d905f0384df025129aa2c6a22cddc632dcda2dfe848ec2c30a2aea9d1e9c1cc6e5e6f325daff33374b4f43475b5f53576b6f676c942f0f76a10b318401f9c009137f8ba1b6bcd2d612e32b1b33afbbd97bb22fd50187fccb837cbfe712b68f020c2840a17326ce8f0612804f82676790544819f047e0c0c9148f123168bb64cffc9dbf7c89947902aa7880448100801532d61047433f024c49c3a77f2ece9f327d0a042816824540000d2a44a97326dea34a9a9633fccbd2990670091a2808e3eedead569d47724efbcfca4f50fd7af6abf86354988c881530c86e11455b3cdd0bc7af7f2edebf72fe0c03d62125270e4ee193240acaa9c3b843020c3861e299e014f980dc4679c41fe23b988662f9569961d7c0addbcbaa1427b11ecfa35ecd8b267d3ae6d69c0238e467efd71fca333c5d1407013d25d84b71fdf322eff29e9527528e2808cc37aa4fc05eb2e439863760be8e65bdbe2c7932f6ffe3c7aa154af22e14e072bd1955283ac7fdffe117ccb633397e6541f4e7e45b807606ae1ff01810063fdb1901d17e07d971e84114a382185155aa80472795c47c47e3ea444d14c3f6448c786437418c3807038471a749f8c084789429ce802835b0481803d8f00e0488b9ed4a8c585410a392491451a39de8f587c361921a8fd90233efa88f3c892a03de2248a337ac7c828495e5125115e5a81258d0ada80a32c606267662662ea71249c71ca39279d7556f3e11fd41df748883bbc08ce8a3be0b951127fbad1670b29be1168993d7232681e7a564708a22ab859c50f0148670c8f06aec6a69da18a3a2aa9a59a1a833f80046884a26ea431154844a4fac7aa029af26a96b890e5e826b3fa512b11adb6816ba39ee610c0a55954da42b25338c8e5a9d1ff4a3b2db5d516099c864b98221c0f9bb213230fd892a82d65fae9ca1faf9a880b23b98470bb42b3901cdb4082b3bcbb66ba9ac45b88b5fdfafb2fc001f755af1f6a86f9080141304091c13c109c47c342c49bf0725a3ed7a400196bbc31c71d7bfc31c820b7f0301d114f4908c5f8621cf2c7042445b22c0310bba51f2cdb7c33ce1c170b48ce3dfbcc32a3020b3d34d1451b6dc27f7048ba2721c0ea70163bf30191f41b4b4faaaab9f1ecba52302c50ed86d54318da86d329eccbf51929d385f62c3bb30d0c9947cb3d37dd75978a91514c08cb46d837c4854f0144e0bd95dea6f48dc2de6704bde0db6daf30385a85e7c662e3516f5d79be239c8d391571ffdbfd39e8a18b0ee1c44d98e2b90e507ea33610a533717ac5e776caf98396226cfa9594d33e0beb05eece0bb3bf9f363af1c51b7f7c60db3611ef8e4034808f031c96cb04f3b16b8daef0caaca03cf53aea9e7dd333fb0ebe4dc193ff07eac8abbf3efbed6be3ab1f52177a2b108913227e0ff0e7213f12630f9bebf566773e36ac407f74e0df11fcc706fca16073d94bdff7062806b749b00d10741f0633a8c10d5ae279796b82fdbc103d20dca37942f020e140688a11be20845d581cbc2a881715a030722a7c040b1927433a2c2b823b0492f97ec8860b72b088463c22127b00b337f42e09a668a20e16b60e93e560896e80e2119e08c0eeac4d88365281ff15db80c562dc8e825ee4c2000ea7b23366c18c6cc402119328c739d2b18e22f89bbb9e20c514fe0072c150a3dfb8d7843ddab08516f3e11b9d95023c02e25e4720a41f02e7c6445ac19134a3a4bc7488c92cc4d18e9efc242891e7c7f83d6194910202238151b61d98f280a5341c0c5cc80518da6e93984a412be1804024e4b26a93b4e5182f89c95f6eb293a13c263293593448e641924ef85a1ba85883300222983960261d9cd90468b2419a2390e5166869365bde1205d8848336a1600a6f3a9073d6bc1839f9a5c978764e99f6bc273e87a6c53d782b5b3001872575b0cf27f4735c86945d17c9a982813aa1a0ec0a223d1fb000060ad096c4c4a431f3ffa9d18d727448e01c4323ce19082018907e42f86816026a04910ae4a0014ca84511274827b0b47cf38c2703285ad14d5e949219ed2850832ad4f1d4f00fbb4c422fdd90431e404a2644282a29f790d4362c5505284d05f6e29902a8eeaf11536543554fd0ceb7bd737c31bd69447f3ad4b5b2b5ad7c515d3623c1cd3348a907637d805a65005774cad51475b5ea21d7a85014ecb52a7d7dc45fc51a516f9a95a7108d285edd2ad9c952962fa9f443598be050c35e2418e2a4c165f39059226cd60de9042c421b3bcc1384960ea31d4269db705ac592b30080dce96ad14acfbc56b6b7befd2d35a0961149d4b40d47bdc15cdfb0caa7cd548f6d61c155aff059ffdad21305c2cd834a1ff9dc71dab2013acdc15dd1d6d344f216b8e63d2f7a35515c361c17a9eb0c426c0d2a84f59ea1bdbc7c6fa2023b5e219a73bbafa4926ebd0880e9c2d4b101266779d3abe005335809f13dc36cb7690a70e1605d7fc8ee0d1e2c8608abd33a2e88ae15085c82f0720d051af6028797905c2f50580424664701300c5ec8ee978d096e308e73ac631c80b80aaf252d7e82705d40d8f7063da6c28f611be4fca65698943cc191a79064219cb80bcb2dc31b01105689d1f8b169dd3198c32c661f28303194a0af1844dc82a646f26a8d3cb37ebf19e70327f2046516838c571ae717cfa2000d28b20ff81c2b2fef76cc863e34a25d50d83700fffa085fa56b10160d87c4f640d2c6a5c4a3c540e91244590a6ad65c97bbe15fa9fa3586325c40036edbba509b1ab252b871a2632debdeb299b3935871458270e7336c5950a648718729c5e497aaf6c925a8b5692b816b2ef450d07e00400312d0682e47b4c66784f5acb3ad6da10e190e5356f223a61d4b546485a192a87217ecdbe9077cdac5ac1641b799789b5193c0d91b464ac602a0eac3bc9bbbae8eecb6032ef08113bce0063f38c213aef08533bce10e7f38c4232ef18953bce216bf38c633aef18d73bce31eff38c8432ef29193bce4263f39ca53aef295b3bce52e7f39cc632ef399d3bce636bf39ce73aef39df3bce73eff39d0832ef4a113bde8ff463f3ad293aef4a533bde94e7f3ad4a32ef5a953bdea56bf3ad6b3aef5ad73bdeb5eff3ad8c32ef6b193bdec663f3bdad3aef6b5b3bded6e7f3bdce32ef7b9d3bdee76bf3bdef3aef7bdf3bdef7eff3be0032ff8c113bef0863f3ce213aff8c533bef18e7f3ce4232ff9c953bef296bf3ce633aff9cd73bef39eff3ce8432ffad193bef4a63f3dea53affad5b3bef5ae7f3dec632ffbd9d3bef6b6bf3dee73affbddf3bef7beff3df0832ffce113bff8c63f3ef293affce533bff9ce7f3ef4a32ffde953bffad6bf3ef6b3affded73bffbdeff3ef8c32ffef193bffce63f3ffad3affef5b3bffdee7f3ffce32ffff9d3bffef6bf3ffef3affffdf3bffffeffff3f0006a0000e200116a0011e200226a0022e200336a0033e200446a0044e200556a0055e200666a0066e200776a0077e200886a0088e200996a0099e200aa6a00aae200bb6a00bbe200cc6a00cce200dd6a00dde200ee6a00eee200ff6a00ffe201006a1100e211116a1111e211226a1122e211336a1133e211446a1144e211556a1155e211666a1166e211776a1177e211886a1188e211996a1199e211aa6a11aae211bb6a11bbe211cc6a11cce211dd6a11dde211ee6a11eee211ff6a11ffe212006a2200e222116a2211e222226a2222e222336a2233e222446a2244e222556a2255e222666a2266e222776a2277e222886a2288e222996a2299e222aa6ffa22aae222bb6a22bbe222cc6a22cce222dd6a22dde222ee6a22eee222ff6a22ffe223006a3300e233116a3311e233226a3322e233336a3333e233446a3344e233556a3355e233666a3366e233776a3377e233886a3388e233996a3399e233aa6a33aae233bb6a33bbe233cc6a33cce233dd6a33dde233ee6a33eee233ff6a33ffe234006a4400e244116a4411e244226a4422e244336a4433e244446a4444e244556a4455e244666a4466e244776a4477e244886a4488e244996a4499e244aa6a44aae244bb6a44bbe244cc6a44cce244dd6a44dde244ee6a44eee244ff6a44ffe245006a5500e255116a5511e255226a5522e255336a5533e255446a5544eff255556a5555e255666a5566e255776a5577e255886a5588e255996a5599e255aa6a55aae255bb6a55bbe255cc6a55cce255dd6a55dde255ee6a55eee255ff6a55ffe256006a6600e266116a6611e266226a6622e266336a6633e266446a6644e266556a6655e266666a6666e266776a6677e266886a6688e266996a6699e266aa6a66aae266bb6a66bbe266cc6a66cce266dd6a66dde266ee6a66eee266ff6a66ffe267006a7700e277116a7711e277226a7722e277336a7733e277446a7744e277556a7755e277666a7766e277776a7777e277886a7788e277996a7799e277aa6a77aae277bb6a77bbe277cc6a77cce277dd6a77dde277ee6a77eee277ff6ffa77ffe278006a8800e288116a8811e288226a8822e288336a8833e288446a8844e288556a8855e288666a8866e288776a8877e288886a8888e288996a8899e288aa6a88aae288bb6a88bbe288cc6a88cce288dd6a88dde288ee6a88eee288ff6a88ffe289006a9900e299116a9911e299226a9922e299336a9933e299446a9944e299556a9955e299666a9966e299776a9977e299886a9988e299996a9999e299aa6a99aae299bb6a99bbe299cc6a99cce299dd6a99dde299ee6a99eee299ff6a99ffe29a006aaa00e2aa116aaa11e2aa226aaa22e2aa336aaa33e2aa446aaa44e2aa556aaa55e2aa666aaa66e2aa776aaa77e2aa886aaa88e2aa996aaa99eff2aaaa6aaaaae2aabb6aaabbe2aacc6aaacce2aadd6aaadde2aaee6aaaeee2aaff6aaaffe2ab006abb00e2bb116abb11e2bb226abb22e2bb336abb33e2bb446abb44e2bb556abb55e2bb666abb66e2bb776abb77e2bb886abb88e2bb996abb99e2bbaa6abbaae2bbbb6abbbbe2bbcc6abbcce2bbdd6abbdde2bbee6abbeee2bbff6abbffe2bc006acc00e2cc116acc11e2cc226acc22e2cc336acc33e2cc446acc44e2cc556acc55e2cc666acc66e2cc776acc77e2cc886acc88e2cc996acc99e2ccaa6accaae2ccbb6accbbe2cccc6acccce2ccdd6accdde2ccee6acceee2ccff6accffe2cd006add00e2dd116add11e2dd226add22e2dd336add33e2dd446ffadd44e2dd556add55e2dd666add66e2dd776add77e2dd886add88e2dd996add99e2ddaa6addaae2ddbb6addbbe2ddcc6addcce2dddd6adddde2ddee6addeee2ddff6addffe2de006aee00e2ee116aee11e2ee226aee22e2ee336aee33e2ee446aee44e2ee556aee55e2ee666aee66e2ee776aee77e2ee886aee88e2ee996aee99e2eeaa6aeeaae2eebb6aeebbe2eecc6aeecce2eedd6aeedde2eeee6aeeeee2eeff6aeeffe2ef006aff00e2ff116aff11e2ff226aff22e2ff336aff33e2ff446aff44e2ff556aff55e2ff666aff66e2ff776aff77e2ff886aff88e2ff996aff99e2ffaa6affaae2ffbb6affbbe2ffcc6affcce2ffdd6affdde2ffee6affeeeff2ffff6affffe2f0007b0000f300117b0011f300227b0022f300337b0033f300447b0044f300557b0055f300667b0066f300777b0077f300887b0088f300997b0099f300aa7b00aaf300bb7b00bbf300cc7b00ccf300dd7b00ddf300ee7b00eef300ff7b00fff301007b1100f311117b1111f311227b1122f311337b1133f311447b1144f311557b1155f311667b1166f311777b1177f311887b1188f311997b1199f311aa7b11aaf311bb7b11bbf311cc7b11ccf311dd7b11ddf311ee7b11eef311ff7b11fff312007b2200f322117b2211f322227b2222f322337b2233f322447b2244f322557b2255f322667b2266f322777b2277f322887b2288f3229979fb2299f322aa7b22aaf322bb7b22bbf322cc7b22ccf322dd7b22ddf322ee7b22eef322ff7b22fff323007b3300f333117b3311f333227b3322f333337b3333f333447b3344f333557b3355f333667b3366f333777b3377f333887b3388f333997b3399f333aa7b33aaf333bb7b33bbf333cc7b33ccf333dd7b33ddf333ee7b33eef333ff7b33fff334007b4400f344117b4411f344227b4422f34433f6a0800003b, 4500.00, 4, NULL, NULL, '0', NULL);
INSERT INTO `wl_orders_products` (`orders_products_id`, `order_id`, `products_id`, `product_name`, `product_code`, `product_image`, `product_price`, `quantity`, `product_attributes`, `store`, `product_type`, `shipping_charge`) VALUES
(6, 2, 1, 'ASUS ZenWatch', '01', 0x474946383961d007d007c400003f3f3fbfbfbf7f7f7f0f0f0f5f5f5f1f1f1fcfcfcfdfdfdfefefef9f9f9f8f8f8f2f2f2f4f4f4f6f6f6fafafaf000000ffffff00000000000000000000000000000000000000000000000000000000000000000000000000000000000000000021f90400000000002c00000000d007d0070005ff20248e64699e68aaae6cebbe702ccf746ddf78aeef7cefffc0a070482c1a8fc8a472c96c3a9fd0a8744aad5aafd8ac76cbed7abfe0b0784c2e9bcfe8b47acd6ebbdff0b87c4eafdbeff8bc7ecfeffbff808182838485868788898a8b8c8d8e8f909192939495969798999a9b9c9d9e9fa0a1a2a3a4a5a6a7a8a9aaabacadaeafb0b1b2b3b4b5b6b7b8b9babbbcbdbebfc0c1c2c3c4c5c6c7c8c9cacbcccdcecfd0d1d2d3d4d5d6d7d8d9dadbdcdddedfe0e1e2e3e4e5e6e7e8e9eaebecedeeeff0f1f2f3f4f5f6f7f8f9fafbfcfdfeff00030a1c48b0a0c18308132a5cc8b0a1c38710234a9c48b1a2c58b18336adcc8b1a3c78f20438a1c49b2a4c9932853ffaa5cc9b2a5cb973063ca9c49b3a6cd9b3873eadcc9b3a7cf9f40830a1d4ab4a8d1a348932a5dcab4a9d3a750a34a9d4ab5aad5ab58b36addcab5abd7af60c38a1d4bb6acd9b368d3aa5dcbb6addbb770e3ca9d4bb7aeddbb78f3eaddcbb7afdfbf80030b1e4cb8b0e1c388132b5eccb8b1e3c790234b9e4cb9b2e5cb98336bdeccb9b3e7cfa0438b1e4dbab4e9d3a853ab5ecdbab5ebd7b063cb9e4dbbb6eddbb873ebdecdbbb7efdfc0830b1f4ebcb8f1e3c8932b5fcebcb9f3e7d0a34b9f4ebdbaf5ebd8b36bdfcebdbbf7efe0c38b1f4fbebcf9f3e8d3ab5fcfbebdfbf7f0e3cb9f4fbfbefdfbf8f3ebdfcfbfbfffff000628e080041668e0810826a8e0ff820c36e8e083104628e184145668e1851866a8e1861c76e8e187208628e288249668e28928a6a8e28a2cb6e8e28b30c628e38c34d668e38d38e6a8e38e3cf6e8e38f400629e490441669e4914826a9e4924c36e9e493504629e594545669e5955866a9e5965c76e9e597608629e698649669e69968a6a9e69a6cb6e9e69b70c629e79c74d669e79d78e6a9e79e7cf6e9e79f80062ae8a084166ae8a18826aae8a28c36eae8a390462ae9a494566ae9a59866aae9a69c76eae9a7a0862aeaa8a4966aeaa9a8a6aaeaaaacb6eaeaabb0c62aebacb4d66aebadb8e6aaebaebcf6eaebafc0062becb0c4166becb1c826abecb2cc36ebecb3d0462bedb4d4566bedffb5d866abedb6dc76ebedb7e0862beeb8e4966beeb9e8a6abeebaecb6ebeebbf0c62befbcf4d66befbdf8e6abefbefcf6ebefbf00072cf0c004176cf0c10827acf0c20c37ecf0c310472cf1c414576cf1c51867acf1c61c77ecf1c720872cf2c824976cf2c928a7acf2ca2cb7ecf2cb30c72cf3cc34d76cf3cd38e7acf3ce3cf7ecf3cf40072df4d044176df4d14827adf4d24c37edf4d350472df5d454576df5d55867adf5d65c77edf5d760872df6d864976df6d968a7adf6da6cb7edf6db70c72df7dc74d76df7dd78e7adf7de7cf7edf7df80072ef8e084176ef8e18827aef8e28c37eef8e390472ef9e494576ef9e59867aef9e69c77eef9e7a0872efaffe8a4976efae9a8a7aefaeaacb7eefaebb0c72efbecb4d76efbedb8e7aefbeebcf7eefbefc0072ffcf0c4176ffcf1c827affcf2cc37effcf3d0472ffdf4d4576ffdf5d867affdf6dc77effdf7e0872ffef8e4976ffef9e8a7affefaecb7effefbf0c72ffffcf4d76ffffdf8e7affffefcf7efffff000ca0000748c0021af080084ca00217c8c0063af081108ca0042748c10a5af08218cca00637c8c10e7af083200ca1084748c2129af084284ca10a57c8c216baf085308ca10c6748c31adaf08638cca10e77c8c31efaf087400ca2108748c4221af188484ca21297c8c4263af189508ca214a748c52a5af18a58cca216b7c8c52e7af18b600ca318c748c6ff329af18c684ca31ad7c8c636baf18d708ca31ce748c73adaf18e78cca31ef7c8c73efaf18f800ca4200749c8421af290884ca42217c9c8463af291908ca4242749c94a5af29298cca42637c9c94e7af293a00ca5284749ca529af294a84ca52a57c9ca56baf295b08ca52c6749cb5adaf296b8cca52e77c9cb5efaf297c00ca6308749cc621af398c84ca63297c9cc663af399d08ca634a749cd6a5af39ad8cca636b7c9cd6e7af39be00ca738c749ce729af39ce84ca73ad7c9ce76baf39df08ca73ce749cf7adaf39ef8cca73ef7c9cf7efaf39f000da840074ad0821af4a0084da84217cad0863af4a1108da844274ad18a5af4a218cda84637cad18e7afff4a3200da948474ad2929af4a4284da94a57cad296baf4a5308da94c674ad39adaf4a638cda94e77cad39efaf4a7400daa50874ad4a21af5a8484daa5297cad4a63af5a9508daa54a74ad5aa5af5aa58cdaa56b7cad5ae7af5ab600dab58c74ad6b29af5ac684dab5ad7cad6b6baf5ad708dab5ce74ad7badaf5ae78cdab5ef7cad7befaf5af800dac60074bd8c21af6b0884dac6217cbd8c63af6b1908dac64274bd9ca5af6b298cdac6637cbd9ce7af6b3a00dad68474bdad29af6b4a84dad6a57cbdad6baf6b5b08dad6c674bdbdadaf6b6b8cdad6e77cbdbdefaf6b7c00dae70874bdce21af7b8c84dae7297cbdce63af7b9d08dae74a74bddea5af7baffd8cdae76b7cbddee7af7bbe00daf78c74bdef29af7bce84daf7ad7cbdef6baf7bdf08daf7ce74bdffadaf7bef8cdaf7ef7cbdffefaf7bf000eb080074ce0021bf8c0084eb08217cce0063bf8c1108eb084274ce10a5bf8c218ceb08637cce10e7bf8c3200eb188474ce2129bf8c4284eb18a57cce216bbf8c5308eb18c674ce31adbf8c638ceb18e77cce31efbf8c7400eb290874ce4221bf9c8484eb29297cce4263bf9c9508eb294a74ce52a5bf9ca58ceb296b7cce52e7bf9cb600eb398c74ce6329bf9cc684eb39ad7cce636bbf9cd708eb39ce74ce73adbf9ce78ceb39ef7cce73efbf9cf800eb4a0074de8421bfad0884eb4a217cde8463bfad1908effb4a4274de94a5bfad298ceb4a637cde94e7bfad3a00eb5a8474dea529bfad4a84eb5aa57cdea56bbfad5b08eb5ac674deb5adbfad6b8ceb5ae77cdeb5efbfad7c00eb6b0874dec621bfbd8c84eb6b297cdec663bfbd9d08eb6b4a74ded6a5bfbdad8ceb6b6b7cded6e7bfbdbe00eb7b8c74dee729bfbdce84eb7bad7cdee76bbfbddf08eb7bce74def7adbfbdef8ceb7bef7cdef7efbfbdf000fb8c0074ef0821bfce0084fb8c217cef0863bfce1108fb8c4274ef18a5bfce218cfb8c637cef18e7bfce3200fb9c8474ef2929bfce4284fb9ca572e9c033840000d0000001e40f39adb9ce60b00000304908000c0c8000910000100b0809b1b9de632dfb902ff028000d5064000333fbad4a7fe80053420014d2f11021cd080a253fdeb371f000004e080acd733e6324fbbdad7cef6b603c0004d4880dbe74e7799830101096000d8f73ef5050800ee993040dd07cf76c00341f0844f3cdd0d2f05c42bfef16b4fc0180e00f9c4f7e1000af03adf377f73ab335e0b68afbce8474f7ab77ffe8a51e7fcd709d00401a81eec5e7080de5f4f7b9c2bc0ec940840eda7eef320e87ef79c1740151400fce08f81f8c53f7aefef8080cc27fff50568c001b690fae75bfffacae762f5ad3ffd25b81efb5b4080000a807dd513a0fb93f8fdf597ff03f597dfe800a8c2ecdf6f74e18b61fed86fc01d0e408001d09ff300207958b07dffff5780afc77e584480c9c77ade577e59207efe67807cc700e80709eef77c08d80317688055108112f800f617061e887d0b5007fcf7819c57000258050a88822e68741968452d587c157804df777d58a00023f88254777e91b081c517833b0084ff27844b60002f18825f4084cf57836d80000dc0832968844c308352e88254284556b87b0c980437687d5660009a77855f37000a6081e5978537c084efa7844f807c28e8865d1085ffb7826e90003b48865fc700b8f7045ba88705a88650f487b5d78745f085cf570588088854b700a787086c487b82580391887df12705f8278172c80563587e5dc8060840888c587303e00052208aa3b87edaf77f9b3804ff8b587c5370009d988a53370076980895a87a934803b9888352908705d88a5970000638006ee000c0488b53f7894d808aca1884ab487f036088aee88051808ccfc87704408d84d08b9bb78b33e08d18180548988461900012f88865f08ad9d877dc7804ced88e92188df4278c40c08ebb170570288f5fb700ef1808e2b877e0280301597cf67804e8688e6090896da80608c090fce88e4e108f11f98df4f87ed38804f8587b50400015b97705a08e009986425090c077894fe0910af905c9787d25880608308b1f297505e084f0389324b94514697c36688d4da0923849750320927f6092543790316094f90805e4b7925d508e12f88f5d109341b977fe5885ff55697d48a9443bb979c6d893e0f79359598644d9074a29755bf90267497b654904c4c88307a98828688a65409563d98f5209045d799735979648b4977c778b42b091b427967c598b6da9076b098325298567e80409e9949c8882cc787732799836c7004b00987ce99747c49960570060e98b4ab08f98697419d98d3909048ba97a9ae90440e98271390508e082a24906a019918f8904b999959e6944bd497582798f3e89040e709a78a99ad8f79b2bd09a9cf7954dd09492a90591f98189690574889c54779d3b109c41c99c44e49d34690484f97a4a60002da99d0f50997ee09c7dd99852c89d3ef09670f905b12981bbf905d5a99e47f79237c99f7c079eff43249e52379c3e509eaa97047609a047979f45b99aed77850e8a04fb19872cf98228e90507909e003a9bddc9a002799105e89f83599c45909d201a76f22907ee4973028a022d3a8186599f4f2985794905041a9136a99729fa752f1a44399a7dd518964610a31549a2ed09a13e60a460079d4a209dd38905088a7d74d905a6d9a336c79e3c8aa56829a20598a1c449a444800050caa535e7a17310a33f6a024c0a762baa03f449a35c10a453a77f5db0a1667a743bea0374ca8f6bfa437d7a737f5a0253ba79a3898205c07697f97f03b0a777a0a6f0e9984b50a116ca05b52985b7c905f7f98139c7763ca8a57c9aa78ca993183aa4a43904782a8100b074ff2a007410f97eaf99a4cb19a99fba049b5aa95b709c57e8a88de7820c900044e9720d50a6f4c7ab3a10a8ed38a83d84ac36a7ac2250a87c6704b77a7d032000c64a027847ac4aaa98dbca036dfa75998a04dafa81680a9b6438a15610a805707b316000d36a7d763a04e2597af49a786fca95b51a04d0ba774510a76d78a328a0835ffaa0b3ea7b7a78ad3ce0af516a05e32a81b18a0550298de56a0207f0aac9e7a441209e98c4ac3687b033b0afb04704ef5a7c218903a11888b2aa8a064b86061a04948aab5910b152b805235b7c0be0b12a808def57a5196ba293c4b13507aa3800b25f37a6ff77953a50b3bbf7b0dc5ab0aca98742fb034acb8a5c70a5ff2fc8b355a0b0d717b5edcaa1b4c7b43fa0b19704b43587b33040b4544704689b9c3c30b5b467b66c00a92b7b85e15a040dab89730a88f16a056bbb7a3e809eef4704626b49644b735c4b037d7b744470b7b587b43de0b6aab7b77920b74f7bb047a0b5b2c9058c88a454c0b8b577b8e1b8b3f2eab39254b83407b72d90b8463704ba8a7d4319048bba7b188b07941ba17ad8b23ed0ba5738b14aa0bb6488ba4420b3d6c7b93ca0ba3727b9a12aa69464ba20f803c66b734300b99b87ae3b90aa54ca07b5bba48008ba3980a252c8bb49e0bd5788bb4d20be170bbc2fe0b99c47bc3c30b895c4bca959bca4cb035eab7aeccb03565b7cdcdb06d9ab818058b7ff4210bb78ab05ea6b80601b0505cc9342f0b2bb07b034e0becbab87e0bb02cf5b7342e0bbe3b8b8e537bb76d0bfdeca880e6c03972ac15a80b93cc8c14f20bcc907c04090c021dab3cafbb37a18bf3a50c1342704d2bb7760eab2a2dbb42a5bb97a88b54080c1727a05f92b85ce4a0347bc7be4bb03e6bb7b13ec02102cc3242cbf31cc032ebc774dbc03590c76c85b071e3c848cf8c53ef0c4999b05165bc451209e2c7c78d877c01f7ac591c4bc3487c23560c30f10042a0c7c6d0c044b4c7bf7cba2dd2ac68018c83b20c0038c05ca68c84a50bf0a6cb72e2904535cba8cb8c52f80c741f0c7af47c64030c2d717c26a10c63af0ad7c07ca32e0c96418c5ff4440caaa67ca7afc7ee83b03395cb4307caa11fcbf566ccb6d5b7ef76a03694c7b424c07a29c03ac0c76c1cc0344acc65460c6e33b050cdcb849f0ccaf17cb2b30c9733c8a969cbaf39b035d2c94a5597eaa4c06c38c03c5fc759cac03cc0cb35580c82fb8bf4390ce9b9c047b5c7bce6acd9044c735d7c73280c940507e702c04265c7b3b2ccc833ccaa3c8c837c0ce0618ce4110d05768c74a209e498c02d7bba5ba4cc9d85cc3dbbc86e547bd43d0cdb5e8c35a49ab7ae8ca2e80caa98c05d27c85bdec038ebc79266d030abd770c9d02f6fc48f85c7308adcd728c039aac8b4bf0cbaf17d3e25cd0c49c8ac79c03c9accc98d88e359d03e5b7d33d109cff4f7d0237ed4839fd9e43bbd136c0cf4a80c7136d05e3ccd1a378ce3700cfe48a052ffd752bcd77037d9efe6cabd757d52670d58d94d54897035e3dd5d8a7cf249d7cd91cca464dcea9f8d63930d3c17805ce09000ecd79446dd0d847d797bcb5b50c8663ab8cccb9d7ed6b894c30cfb527d95c30d63650ce21eb03289dd2d8697dc207d24697d408597e81bd03156cd83860d78c84d7797d039abd03e567d642e089933bd8643d8a83bad44c0d05887d941030cb52e7cece2bdccf6d7dff5cdb5c7dd7cff89bbbad03e0dc046b0d76b4fd06a24d89b408da1080d6695d05a7cd9110d0d620090560bd04071000f23ddff45ddff66ddfd4ac02b6bd48b86db8ffba5ddd3400dbcdc8d9b40bdde25dd83f90dc545b05eceddd22d0d89bd7d21addd381b0df8ad4dfa7dbd5004e90061eb67d1ddc4e6bbba968da24abda56c0dc471782ac7d731e6d0416be072f8e4818be9e1a4ee107fec34a80e25307e238aebdcf57002bbea6675900cf4bde37d0ddbc37023a7e73df2db81bce07317e4833fe00e89bdd841de25ef8e4828de5fefb7c00b0e492ddb70450e455e0d9093a020d5eda5869e37f10e58634e5ce3d02563edcd627e1ffcde6fcdbe1a1ebe5690e7f7cbd7b0eb0e43667e4776c7d190ae17ce7da4e8ee77de0e68534e5548eb85aae9693de03730e07e1cd8b869ede86ca03c577b2cf47e834a0e052e7862b6e73ffbe2dc9958e078e4e48903ec1977ee396cd04b1ee0699bee7170b01a4aed547bd7bf1d79ba27eca3d2ee8f93c91ab7e07ad3e48e289e4a8e9cab58eebb3de808cbe06b7cee160d8b72d1e037d2b7cc04e05c67de624f0ed9c97df3590ec7460ee8124d1a1feb1c7de9cedaed7ef3e06d59e943868e67b18c7b50777dd3e05c44e7360cbe9af97edaa3eed301eefe9ee80a049c32ef0ecd67ed1879a8805cee51f6cd9cc5ec7bc2dbb22b0ef5270ea3587aebb6e74d33dba04af07e80e481adb9abccbf0f43ef2966ef06130ef30e09e2220d4dbd9eb9f2b021c4f73c10e03f61ee12760de4d3ae02ccfea2eff4762fbf1a4b8cf455f0231ea042abfe53ddee5ffcfd7747dcee2f0cec42230d753f0d37b87c2e26e919bb9f46f50f2466f8d557f74b1fdf4943ef4b22df65d00f36b3f8e882e75212fc5c097755a7f8ad28d02001fb96beef08240f67e34b81cefd726a0f62ed0f4ade7f6a1ade70d9f7cbdf7f110fd02c0e79f790f057dcf791e8df43627d57f0ef815cef87a34b8676f74818df82da0f8b42efa5a00f789afb2407f74767e962178f94ff0f57c2792b1ff75e42e03823ff6e557afc20f00a99e80c559f8672bfaaa2feda00fde8ebff2198cfb5227f0140c7ccb67fb4eb0fb219d02d20f76b17dacacaf0690eee565e4bea57f73d98cfa2cb0fc5f1dfe58e0faa9ffc3c057f7d58cf122d0f37cb7f32e90f3ff0f00020c349225f2a0a9bab2ac58c2b13cd324d0e2f95af3bdff0383c09bae683c22932980b0e97c42a3d229b56abd62b3da2db7ebfd82c3e231b96c3ea3d3ea35bb4454166103786b0114d0e3d9405e97c6f7e1b489f105b60474151aa6289030040e4819be40282e3e08b01d5c32f22c703e4496bd810e9ada80a682329db6babec2c6caced2d6dadee2e6eaeef2ba9272c2002e22fa0897eea93efc25f73a5972126f3d1b668e28181e404d2b25906cf755ab5d831af034a49693fd5e367bad27c323b1b6d3d7dbdfe3e7ebeff3f7fbffe37b67080682398be6f130060c99aa650d017a4b164dcbb73ce13605eaf644219c6c232ad20997e6112751351cffa41219466020884f58c68bd902a1cb9a366fe2cca97327cf9e3e03320b06ad58502c20f3384c65f3289d890c39892c108800149845ec4404a5f24c2a4a344e80c23ac62a9d9f33c8ca4c4bd32cdbb66edfc28d2b772edd536895c4287869ad0c8e8b281635e377604da6709c1a4d598240a002500c35286118c9d632284135ea71f708027581dd6e4e0b8f6fddd2a64fa34ead7a356b5ea18ff41d9af07395c949921e73691b09e22bbb8b88bcdcc7a390df2b268e83bae61c28e23506e7d128e6b511b9d445af6aad7d3bf7eedebf83e77edd4f0c8c8ba8ce7e9858bd60dafe8c17e96d053e0e8460fb480f921c6909e821d748c589633ed0d7027ad3b967ffd678d81d149e830f4218a184135208cb8282c8c0d825cec5c6de7c0986e11f7fba4994482a342d78601024e5e11504222a51d918e65da2220fa998b412883e5dc8601fa45518a490431259a491e1f5c8c20c344e959e524fe5d69e87ff1488837cb59d08c37e700c288441796446028c49c8284602a9e4c7439229a4a3e394421c20809c73d259a79d77e299279d1c5ab1a68f4a0079a4a083125aa8a187dee3670a3468b8089ffdeda84da45e8c895761257251e50a3419808d109d06c261a5479419068b1bde914a9860288a82149a8272a514adfe6944a088e29aabaebbf2da6b15b4d2c0641f360af5e614b0ee80c6a8482c85a93459ca9191105b2ad1ffa5988aa5f1e522d6f6802c0ab762016c14de0eb305adb5ea00aeafebb2dbaebbef0a29ee0c8d7a3ac3b2b041b9d019f75677a92ab21e9b0ab710d00b47642b0672b01bd89e412eb137a6d2999b4f4a8aee21e65acca0baf072dcb1c71f83ace08ec896c9af1eeb512c65ca00918b02c0af4e79661f62fda02d1c0ec4a068a95f30c7499a9aa582f3c4513a93310b2fbf64b4681b87dcb4d34f431d752df29e75c90012c760327928134d86d63934fbaf892b43705f1e58f7006a1f688fa0731a9f3427c4d72c3c8cb1b140b41c08d24e9cabb40a4c4b1db8e083135e381554cb40b2bd93167d371873b710762a7b3fd1b20c70e721b40fd426c197db6708dbff5813e40ecc05e2a3fb9d02e542f49dfa03801b1ebbecb3d31ef5e9395bcdf608902b992f3bca327e4fdeaba34ef68b0903712a1caba2a2151a32735237c471b31a3c0d79f741fc10aec7037beddf831fbef886de0e83e2595b1f44deb8e90bd1f063775d492034f360b3126d2eecfc19051bf2b30f8a32cf74e94b1cf7b4f783d6a5ce7be35b20031be8c0ed940f060132448eaee5b88a194f0cbc4b1689c496290f466b6d3e501b1d4a070155ecac0bf60b951338d7071709f082dd2aa0ddb8a70a053e30873adc210f7712c11240af7fe89361e33218a201b6e37d1f9c9c0c94a704cdd5c08547a81b0acf40c26d3de18a7fa91e116b80bd3c18f07f364cff060e7b68c633a2318dbbf861092628ba6219715c48bcc2065520b958c14f363008a2c17ce0c42440b1045554d92514d68415f62190358c9ffa68a80504faad8c6a9c24252b69c951048f8ff881232361d6c52dd47151fe62e212f1589ef9f900919c99c120cb80b94b283279a930640ce348204766815600d8252f7be9cb5f023398c2f4252d2f69cc63223399b5ec640cdcd8076e85d255bedbe2bee6d80b253e8b943178251cd2864a56326c0c66bb84ee8020c51272d19633745d1881f64965c2339ef29c271bd808449f41ea9d78b36615a2a98c519a329ba08825047ad6141e9c13383468e51834f9cd2caae251e1e2e7477039517dd233a31add2847ffa3604f12e8651134f32760304a478aea029b25d55f0c84f39f1afc1109f8930c43c5c03fe445419574f0df45d5c9832f1ef49128ed28518b6a547a7ed482e5dadd500968522b9014a07a5ca972c099875be9540715a46938c5e04c43105496a080612e510ad4c32cb27d475d2b5bdbbad1a48e20a486984754b9a656af35f5162a9d6620ca14537c2da9493368590ab3a0454394533f38fa025c076bd12b34d6ad929d2c651f18d90d12a3aebec9eb46385b8bbdda7511654aa80eaee45024f0547e5d05036993403f271c566fee30eb63fbe4d9cae236b7ba055964e51a085668f6434fede76d6701dacdae9604a1a30ca358e8d8e4ce1614c57442569530ff5dc8d2969d69fddd6ebbebddef0e2eb2051d4a70b1345c2a94f73dcea2ea25c84a82afca8306f03dc26b4be0d24b14f60ae35c4458111696e8fad48bb5fd5571c16be003237842e25d2e1ca892de809d770a0fe6c771859b9de6f621b07db82e53a1cb85fb2e22b1d35285880f8752040420c52a5e318b57dc5a25b4534d054e308d6b6c63d58897609c885381d707bc08e7a2c2e6bdf00c409c84de9cf608b28a667ead70d3995521b69b5ce65dc120e459cdf8c65ade32977f9263062b810013962390a330667d5c19c24496c17ec994a13e6c9593f825c37cf3308061e2f997aa909e89cb5c3c6df694995d1e34a10b0d971cebf81275ce305f5bf2e300ffdb23cd9e5cb30cc6c39745ebc0bd4aad6a18a43c46ab7501d1930e68a0ab6ce853a33ad53841349895c65eee12d2d4145e6fa3f350df12bc98055b6db50e52db6196b2f6d332992976fd5c1c5adbd6d8aa5e36b39bed0b7efed5d5b51e51ac61cd326423d7969e2ec24c936c048992c0a0731643b4854d0d2a5b3b0c924e9ab29dedee77c37b68b25ee7a75feda8470b3a1febc660beab8b03e63dd90826cc1fb0bf60ee98dcbacf90ce36a98bbdf078433ce2120f354521496d0b377c0c67d637b6313eef1104bc082ec2740e38dcbc8277c1c807e744893d9a650183b0d4e99e38cd6b6e7387e71be663b4b721622c85905f9c4a1d1f72bebdadd512f03aff07fd6d5b4dbb20ee950f74bbd41cc3be9b20ea9b633deb37bf3a042cdecd6907d50c5c0ff2d0a9e0e31ab459a62430fad66ad0aa264f81e450a7039f5ddeee1f549d752fd73adffb4e68aeabdc685a48fa13d1d02a49a6b4ec6aa65e0db8998430013d079a2638a7bd40f8b9576b0b4f9f3a21145f95bdfb3df4a24ff0d8e5eea32d2403ee58307d7ca57a099fffd4f35aa304eb57104019d4de08aa8742ae319f0462a33719c0f742de8330f6d1233ff9351e3bdbff84faa68b818c779c2ad8d11a7b3b8fe0f22c183e0c526f2adf27e3f612f67cf5612c75c2283ffdea4ff5f1732f932d387eaea0f3beeb972ad08ccbc0df2d2847f35b30f0ee439f16e8ff1ff8b51e16f4de11f8dafd515fb23ddcfa39e003ead6f1f51f769c1f949941deec5e3314dfb1c51c0d945b0e7443e4e140dd9100fd111f012643cb1511ca7dc1061e10e841600ccae0311d1f04b85f3c6c81085a4a191ca011c01e2eb8e03e75e00c4ce00a50c50d3ec0d295600062c1e6a1602028e19f8d551904a13b35e00c62611666540df6200e6a813f715f17e8e0ef4ddfebe5d102ca80f6a94001a4dd2af980097641fc3de186694132245c29e19fc2e59c16f2611fc6530dfa96e06941e0f581f879811c3a5afdf5dc199aa10f202270fc0810c0e116a8e11ceac0ff41c100320b1954a18cdd9d1f8262282e500d1e4fea506232906016b4a1052affa26ce1211aca8013ca8421c6c0246a41115a621180dbe70de109f6a21e7e9c280ae3309a112906a2c570413260e22da2e24d7422bde5614ba14b1802a08759c107e62212d0e213c822387022f9f10d0c12e33892e3c79062294a9b50a9023566c1186aa3338263e5c463adc4d94231a1156862364a5e1674a10edc21cfb962597d623912644172cc391e63ad70813f999c00c663a43da414c26213fd492a2ea13552c1b6e9e36d608146d2c12e96df915520a31964499ae4ec9c63a209e2202a6343c1034e3ce3f5011a42fd490256230b9ed44636e215c0c3368696fdc91ce79de45012e5d3a464250e64d9c0c30fbea02a4cdeacfd22d14de429f9880a0affd23d52c123ea2412346438aac23232dc54dadd151665599ae5a1a4a44a2223ba35081878e4f2c0644472e04cf20012c2c13fd622564ac12a6e2512e06513f8d30330e52d45259625e5592266627e475a22e51e3e413f961618606347c465612e9e58c2803bf69510d8e215e0621114409e89e66826034836c15b024ae759262f92a562bae66b3e485aaaa542724163a64b0bc20358a2995c36d26ada1783104f673a992af82403e2d3eac1834d4ae54e0625fac1e6734267bc14986d0a25166865e61c223c74e53ec4a4ce45239b61473dd6807056413e729b0639653bc2c3d53c0e6f8ad16146677cca674fc866d7658c1740660e0c80694241373a173cfaff26bf61260c58dc53ca00794e016a1e81780224f6fd647b7d8182f2c64806dd7c5ae885e2d88c9d55db0d5e3c2c805536c167d2974e74e7f544647e22601320a81444938162817bd6805dea40060201025c67d835672262e88ef2685dd4a77da2cb174c668319564c282777c22861d2250f48e847aaa85eb226271427ce8d5b4e26271768e684aa636bf668977a693ffce88662082382020180a80f3880792ee84e94e8732d69fdc8c45fe6254642015fd2013b624134c969105067114ca91064a9960a24977e69a11a6a3bfc28903adf17c8a83ff2670fa0e88cb2699242e38066a64c6ce79ce2e41410221d30a80292937ac604039c690f20c090e22895ceffdca1b26aabe643a28aa8737241ac2ee89fa62102b1278952aa4c7e2711ca8401ad281404ea3e9641321c299fa6c5001c6b0d18c08d06648e92a4ab4aebb4d243a2da206d326a5a14c0b266dfb0bad9a406a83c862b48bd9f1304eb1334aaed89dd9e6901aada1ab7229db78ae4966a859ed8ebbde2ebbd0e26b5f2eb7c5a2bad5628338a460134c0cb1c4002785daeeaeab84a24730281b3c2818b1e28949ea6f0551b0575687812800380a8012800c402a5aaf6650ed068bf9a2c865aebb59e9ebca98598d90900a4ebe3f5449b3ad59b3a09713ec1b93641a4ae61c358aca8fac80200409e0000c872c29e5addc832d7c9322db5a62cc07e9d5b2aed88ceffecae7aa7a59a4f3c3caaa6569e71d6081ae8ac1024e4d4ea009eb21bd9926cd3aaadaba6acca52a018f8e7d49aad7a31ec5cf62a0da8e9253e06c572a62ac0abd7b6253fa2ed3bb2e5e0a240c9ae6de22666db06e698820102c4acef21aef058ad89d6ed08b8ab1164eac4d2691374aa9356138951e8e04a6c941aae0a4caee2aa2e51b6edd88a230934a925222ddddaacd9b927d4b240145ad5a6f6e757a641dee86e13b8eee07e28809d2eeaae6ef2a2ac38366eef8c01cf42dd7e9a05cdc64010f6290b94ea4d762d15442e0a586432b22ba89eaef41aeff11eaef2a2af7cb66dd9e4ed0e8e81bc625ef05edbe50a61ed7a02b4e42cdffec0f5aec0df5eff41e6ea2d17402fe60dc0dc8ea5f99e6ffa2a306cae2f3a962b19d8e8e0fa2f54daefa8616d0cc4adccee6de72a564489c3cfe6a0f91630cb1e6fea2ef009fb6103dbe9aa7e41044fedf776500593990c17193a4441d8fe0000e7806e7641ecea80ad3a810e83df0893f0e99a300a23311636f06cbea415b5afb9c1700cdfed0c4fb13d2a9a24e8ef1b86af1a3cb10b78810b932d1117b1e11e71129bf1032e31ff722819184017db50144bf105376cc80a8110ab001c6b6f95daaedfb2811d47ce17fbb1b92dc0d6121802a740199f71222bdf1233317ca68dd142715c506fd6d2af357082fc722eef3641062b01210b703260f213c0efa7912a261972022bff722a132323abb1e39e01185b221097211d87a5c3c209cb613107ff002407f01af870c91dd15622b2f19d322aabf23183222337b2637601028cb2c50c4028cff222bea22d0b41a3ce6e266f2f14b4b2f70e821bf76c182400381bcd00ecabde15f33023f33ad79c32ff72bfb0c10033c80218704e4c3257d130866d662e6b7210e06eff0e4220af80274741b3e662291b5e3163023b3374162ab3a2beee08f1b2c56c2e4fdc7356e4730d1b423d6bb31e4b8140ab00417f32ce6adc1346f31a78dda7a97343b3b4bb3d3450b542f38242019c733f5c744555725c61ec14e0309c0a8c29bc730b94ae1518b4ef21b41aa4f418ad744b33b5aa3d3444132a2526ffb5120cc0525370158b6b4657cdb050414f5b6e2ae0b10aa9c2a7ce6af7c2c302d4b4e99aaf5537755bff5d44e3b3236bc3546b6ef6fac44dab9656cb00644ef055eaf2cd1e674057aef00a00390b4c5fd32b02b3b55b33b6963d35044cf41a9f4200d0b5ae098048dff560d72c56d3c02f63761e8b561544360e7cf616c8f30354b42a268059ff16628feed42e7663cb36e9c1f53dd5366c118061fb6502d8355be07577aa6936efee360b6f4b9e4250b38070efc133db1901703482a4f36c4bb7cd3db6db32f31a240003e8761d3440694faf6657afd5066a6a5b713ffbc03fdfb12b6cb7775b010264f776e340016cec2c5476eac4f674e3777e576f03b4ff4a01304002b0b77eeb86009c8b7f2bc0730b78822b78d30440021038c8de99980540802ff84d188083330075086d03084000f47685837888874c8bb518858bb8591c0089b318829f788bbbf88bc3788ccbf88cd3788ddbf88de3788eebf88ef3788ffbf88f0379900bf9901379911bf9912379922bf9923379933bf9934379944bf9945379955bf9956379966bf9967379977bf9978379988bf9989379999bf999a3799aabf99ab3799bbbf99bc3799ccbf99cd3799ddbf99de3799eebf99ef3799ffbf99f037aa00bfaa0137aa11bfaa1237aa22bfaa2337aa33bfaa3437aa44bfaa4537aa55bfaa5637aa66bfaa6737aa77bfaa7837aa88bfaa8937aa99bfffaa9a37aaaabfaaab37aabbbfaabc37aaccbfaacd37aaddbfaade37aaeebfaaef37aaffbfaaf037bb00bfbb0137bb11bfbb1237bb22bfbb2337bb33bfbb3437bb44bfbb4537bb55bfbb5637bb66bfbb6737bb77bfbb7837bb88bfbb8937bb99bfbb9a37bbaabfbbab37bbbbbfbbbc37bbccbfbbcd37bbddbfbbde37bbeebfbbef37bbffbfbbf037cc00bfcc0137cc11bfcc1237cc22bfcc2337cc33bfcc3437cc44bfcc4537cc55bfcc5637cc66bfcc6737cc77bfcc7837cc88bfcc8937cc99bfcc9a3bc901cc068b2fc2e710102b43ccb7f3845c4bc680ef513ac7ccde7992b1880ce0f138b8f007ffb7c30bd45ce0f3dd19b82d01ffdd2f7929c28400000ff3ddc32bd2ff182d24ffdd5633d30457dcad7f869bb0c17b076120e022787d91778bd60b6c23356372c9c7d5aabf518f9b70070ecb3c9f56b2baddb73bd8883f40a9037103037f2b6c1b9b8760fecbd0af4bd2fea3581def62c147e0a1cbeddbb8e7ccf7de02f3e309a2fdee73d88c3f70328379a8ec620c4c3cc03c1e6777e35d33231d73d2e90be29d4777bf1364a57fe14b4bed2607ee62bf85999384178e11a604fe9e39d4ce4fe1e273ee50523806aed20cc7ef4d4be2746754217f3f2dbbe7e93fd4e15ee46c7b376f28c4c0c7e2d9ffef6a4be2d4c3f1c6cbfe5cfe1028c3f3a37ff19247fc6407ff4e3f7681741586f4e4ff6f1527e01fceb80fc8bff2f35bf3d083ce24896e603a5eacab6ee0bc7f24ccbcb89e73951f77e0bd00987c422b190f8295d412371098dc29aceaaf5ea0c48b7dcaef70b0e8bc7e4b2f98c4eabd7ecb6fb0d8fcbe7f4bafd0e3d608b83b261bf53570078d277a647a86378179058a22545e5888247873869b2482789d9e90460c0c69958e933ea894a0859cadaeafa0a1b2b3b4b5b6b7b8b9babbb0b9b904a124a36e0596089ca80e6fb2b126cd7d8b90a750ac82ba6bcdc3c37bdcc2d22b0b68da51bde5d7e125d9daebecedeeefe0e1f2f3f4f5f3fc3d0fd4d46808a30e7804a011a7cdcf439f3844e09392bf67a105c66509bb9892316642bb3b0ca388a1c73246c0832a4c891244bff9a3c893265ca61dc1694b986c9c19c06a80ea061b9cc2523845b323a51a902e72f9d9b3a4e1c90e48c4f231b8d3a15f111a8d4a954ab5abd8a35abd66a7fcaf91b830055c4374b8b143bd3b5dbd73acf3045ed51f609d0b4dcd6ca89fb144b03a59e9ae6edf876abe0c1840b1b3e8c38314801e66492b9d109c01c547bcf302ee7982dcf487d815eee96f9eedf723c3076c68577b42ac5ac5bbb7e0d3bb6ecd93e20772b3d86e6e9376d63a2b1cd0d379dde8e02d348ad432af065c2e320576da43998e738fc422f679cb6f6eddcbb7bff0efe55587367c7107774918d025468c6972b3f7c7314ea2780baef06dff9f5e064e89bb0bedf32d985476081061eff886082e1c1d44d7a5f08e58840703c3489646730c88d83bcc927cd6e2761884d5101fe925418fe9500e088a80ca8608b2ebe08638c32d6c3cf44128e41a123d2ad314827379651a3393fca71de6a9c75025490e50c49968abf68782426293ae9d68c565e8965965a6e590784dc5838068880e4b7c6259840f9204560ce5124202c4ee1a1495e2eb3261c2752594201767571e70853e299c89b5c0e4a68a1861e0a235de6ecf9859993309a86987b902986a25e69064d4f719264a95a1201da49655ff429c29fa0ee2128a2aaaeca6aabae6ef5d944a185d1a36f6ee886c98e61c4da18a6554639894abc62f6e9a993a0a9d0a6b3907a6aaaaf3e0b6db4d24eff5b0db343882a06ae938ca5c67289cc3a86b542601b479ba86a8a644ae2ea40ae1beb525927ba52e6f2ae93ce528b6fbefaeecbaf19f74d44a9170045f6463f67fc4b9eaf93dcbb02b32921fc5eb1c61637aab2b2d4ab22c3fd6ecc71c71e6f3c70473691c15e1be66241541921733432911c2ee1304a2b53d4729313575871baa8dd4cf1c73eff0c74d0f82a4911935fe49808b2620c4b08b762106d637c9902eb484a500b295a64006ccd75d75c7bcb91d235c4bcb3d65e9f8d76da6aafcd362842bf0d77dc725f592b47c890b19e8f6d204d88d85bd44dd1dd2e4f3d9fc520013e91e036cffb4300093400762aba26abf32d64cf8d79e69a6fce71a713f9ffe1c9e4c274a209199e9b23f5af8557ce695e59339e8700887b52faeab0db7239e7baefce7bef5ce6ed14b85fcc3e291b8e2622ba17c01b253c1b275fa1710ab98fb47c47cda7313d140acc69abbcc1d26bb8efe28f4f7ef9b261cc2e909e404a86a4589468da53ed9afc32e5b78f847e0ef3ab917d1eef263fb6f0bda27fe62ba0010f8840aafc25656198d9b7d6a02d47d48c647961a01b9e6785e84180800d59a07e58c785ab3922603fe0202c4c98c014aa70852c4c87034546068801c2698fe98405c5f042960d4e751d0261487248333b095009224cc4046136c456a0b0854c6ca2139f3893d1c02f0c91c342bccae089fd812182469922fd08d7c3fbff85848b1df122ff92e80304108f10d7830b1a4bb14428ca718e74ac6314d698b832308d1a69c060153448033c9a437117ac5f09dff80e41968390e040640dfc68051a9ac2917788a31d2f89c94cd2f17846a9dd174e8705bf6d618f7b4003273be2c93540d2081ab4e43b4ec99154a2c1953e28e21eae78481f2e8b929aeca52f7f39beea3d059030e01e168c2606beed81916210a6538809855516a195bc5487338d02cd5c8ab10bd2340b176889077002739ce42c27dc94d9114986b01300ec8231af804c30a09323ea3c433787404d5dda639e14a9677faa39832a96d27b55039f3ecd89d0842af463d7b9a117dc67051236ca1347144343cb65c8491e94ff1e177517406540ca3d5454a3dbbcd847178ad294aa544bf75c06fbb8004b2cbcf4a19d90a8175afa8b999a01a71e21282948c25383b5419c8f5c914f09612a71ac74a94c6daaa1c8f814337a41a056686317a0aa173460b58b7008ea398ecac7916cb58c1edde8168c4ab59f96ada44e6dab5bdf4a20aa72a49d50186b15fcb905b93ac1aa5dd0eb44e82a06af9a209f6c9d875fcd01d89c1516ace74a2b520dba58b84a76b294454c4c3b5906c19200975e90e11e740ad300c9d29e1975a359e17159549635b251e0a715a46a5ad6b282a895adad6d6f4b12881a45944a782743324bb00b8d88b75fd02c0908fb3d91e8b623c4fde6496310d22be03506b4ff15916c718bddec6a371eae4d6719ba6b84e6f620ba5588e7d14634dd30187704c82da848c0dbcfa13e1706e4bd2b6395bad6e46e77bffced6f3b7c6b84e51281b35cb8e631e377ac9b4c42c043203070c188c4d3be03c04560b0101c2c86eacea0be4e48ef0b34fc3afdfa77c4242e312c8c0b80d41a01b47960671928ec4dd23a22c59860b17a4b1b4009b703c52a2e828dbd00e218ac57047c95419085a863132b79c94c26835d8bf00d4516a1c85090728c2be5e2333c9908519e0495c130e407b457ad20d9f210baec882ff369be2f08f3981f9b5ff73679ce74ae33180e2b042dd8d20989fd819989f0631f587808b0fd029e75a0e749f4999b383e0eff9b6b71e89eee393aa278740b068dcffb5e21a99bb6b3a73f0d6a1a78f6b798c6814da500c42ba8b907937642a097306a8d40a0d4273875601b3d8323d722d63f99f5246cad5811efca13e26d98a52b9de4502b7bd923a6b5092cd46322147b06bceef018229d038782c1d92580f699bec8c3085f571ddcde6c0aa23d8469db4fd860e0305334fddb389399d9f4aeb7895bcd6515587908e685b71130ac846a1bc1c350c0f799f53d897edf1ac2eb96b33d0c2e0483ec5b080a0fb6c3c300f121009bbac76e64b2ed0df290bb15c6994e41c6730070ed7d7c0643ce663117a68293e320e5c5c5b5913b0e0b92e739e6383be3ca633b63e7febc0eba16b9d18fffee4b50ca3a05e52601e8bedd6e4c8cd60b4aef35d3c7cd0537fbdbeaf6a8fabbafceee7f0e9d069e203813708e3db4237ded6c67a2bb2fbc02740b61d53e9838c54d8409660e3be82a90bb0ee82e05ad3b36acf678bb0ed6e4f71c005edc616734c31b3eef5a14bded94afbc0ab17d82b1d85d7fea537418742e84424f755b2cd83c0eb4681e9b737cecb8c0bc09343f09d44f07ed7f96cbd6bf6e39b55b7ef7bcd79dc089800e99d7fa2598d8380dbc6e84917ee1f725e7f9089da77a38b1de16ccdff90a846f02e30f7ea06300bd10f4aecdc6c762f2bd2fbff93397eaa5ab20fd4e50fe16aa2f8457c7a0e9154103fb719f82fb17c1fd377e3c49c5ef0efffa677beb8709fc076438477f24207a39867595a47be7078111c831d857028c047f39507150e07a26b0782e408125207b5df0812360819890818e176e90076734320925987069377d2f607a3a207f67178348d68012a8833b183433680246b38124007e5c60783a607630108424d0813de0832500842da84ad1f7610f88074d48024fe80843687191d7054528048b368537b83800c8836568863f837cd2e602b5970353270569d8609d258630008742e0206c88036e5873fe077417170f75a8037738097a287439180380d87cb757049c166f67e8888fe833065605a9248089f87986c802eba5855d20894e408929480682673b64b80e9d68049f08737c3187ff106000de077707b88ac8868990488bb5482877a27717787adf0575a36482b304852ea08b27108237258536388b92178c2d308c26508c8a38805cd08a68b566b1e871c9688bd9a88d30d28c4e888493a06d5c90800f7082ab274107f38b2f908422108e60768c40408575d08d57f88d8ed08ed5888d29b03da840738e668d3e978fdb289003191e9568873080873860802de6795ce08ac377060619880859807df48e2c407ead20913900250979020bb97df81578eba26ef0f88f3088096da3922bc936cf48902f09930de19125305a1b89030b1805ebf800dae70288880360e86783180336790238997517696c27590933490235890946398a7ed803089000ffef7284e6488a4ac433ff16935de995246185241803f328964e56635b608a46b08435109622308464e99616c9870c9895d5d0960ff09679a78ad715007da90090d30df7a88284873b5b5904fdf89589a998b7907838d06f3a49884b40941cb80523380235e8038d79028f299468208a615497bba0993f68039d896086e98920f97f526952a8f98a8b099bb1c90b695904c8c294c08045a427057789984b409b6a1803b739022549039fc978acc90ebf996e32209ccc6006f9331a03409cc8189a95009d1dd19bb2a99ddb2907f025046e389925709534e09d87270570498e03619a30109e24309e3d609c83c97df2509e6d3803ed3902ef996bae798ad3499dffc87942fc699edc49a0055a0a7a2903e829982a579d2c809fce7906083a9698b0a08187942a909107ba8c30a0a0cf29a043209da709a003f4a13367a0278aa271f0a0e9b99f8f4206a35902d3e68585607fe978732eba53172a3df128072b5a717d8299fe58a2b5e69f611890ab35a423909d29caa44d1a9493b090335a94657097e588910d6906cdf90051fa9432068aabc985eda0a55cba60229aa47819a47439a2ae709d1cb1a44e0aa771ea0277096ceb05943460990f70a75d7a06745a54581a8a3aba413c1a077e5a9cb962a6253a00560a9a6baa9567aaa4722aa993fa03304a028025752af36b50e0932790a63460a92380a9eb997a7329a40d6a0bffa12a02a3ea0891299fae49009fda8761da9a90fa006f4aa9b97aa2e308957d52a42c809e35a89c3a50a151c0abb3ba07bfda02f1197e8eaa0bc7aaa680a0ac187aa604a09af888aa76d0a66aa2abddeaad29509f39a09a524a9a62f74044147bea09a5e365a3a5faa5c84a98ee10ae0ac9ae2f182e67ba000d30add277a4f265abb7faad014ba90f997d3eb05eb82a03c39a034778972ef702049b27069b92396aaa2ddaafa500b124607c076bae675a000a20ab169bad44f7af002bb027eba476fa039d10b23dd9736944aaee8a3c2b7b96815ab1377ab178a0b23ec0b2f75ab20320002d6ba4236b5d908ab0288bb402a9a550b9a35ef6620dfaa09bc805ff4bdbac80b0964226a8196a07540ba67b70b5ff69ab8b9aa8f14a0bdb3a11479bb4695b8b3ab9a53f40ae2570a73390a7c4f5b623c0b41a58913e50b7a2fa60ef1aad2be80e6c7bad10b0b7abeab3255b1183fbb764bb4bff8ab66a0bb966a8aa3ba904ebc5933d9080567a278a5ba9c557b99e6bb37e7baaceca98a02bb19b9a61884b935f7ba54ab997461bb9b1ab98e308869dc0b9a206a864f77cc295bb3560bba19b8a5149abd540bb4bf0bb78a7ba2570b7224bbad659b28f2bbbd16b7e79fa00cb3ba8f67a6dbb5b039d0a826840bdd6db278cfaa7a2cbbcc3cb0bdf7b9c8020be389bbc763b7baeeba18e2bbdf34b90194b029cabb03920b55050b8ff3f96bf27c0ba3160bf2380bf12da7fe4cbbecd5b0b032c0205bca1b0d8be0ab88580ab8cf24bbf176c8bdc1bb14ba0c12802bc56cb6a44bbbda6fb031dec7432db33c24bc1ea60c22270b9ac188b66ab1afea9b5c068c1188cc38e58b80fe0922dc0c00f10c03eec08e9d596fb2b053bdcc32cf0c341ac02ccdab58c5b0d481c054b8cbc11acb1215bc3af7ba6d09bc35d5c6f6cdb81f34a8cbc980829a7aaeb5b1bdda30462ec8c281c28d03804f000c6ad8509495cbe4d230079acc77bccc77d4c005c530e760cb62bdcb829c992878cc80020c85eccc821879e0f10a4ff0b916192950fbaaf2bf0c8914cc27b88c058a9c0b290c95120c905fbbe016900ff0a70975f05c742c088ead7c8af0ca7e358ac2dd0c20dfca2093603c2f9c28246a16f78bcee78b39e6cbeb920cbbe9cb7102cc22e1000a96c6eab9c1c9095ccb02ccd2f49bd8b1c147c3a066df9a33ae2bd75bc053f6cbd32e0c4f03a9feb50cddf8ccdd8fac934a0a5121c929d266f843ccdf3ac9da9bc966c5c8165209cede4b47daac64b80cf42b8709dccafd15c0af6bc05015d96c8bcce34308e23b0cb4d9bb30069d0f46cd18f58cb908c96994a06f8796ac625b42f90d19f3aca3439d0c1dba8c37c0b23bdd131fbce8d982dd498bef23c7e847ad1375d79254d02b3ecb204ad04380a033afd003cad0442cd8ed218ccf099b5369d06463dd448edd3ff09acd22f5d05463cc8505cd3f08bd35b5d797d62cd2bf0c35f2d030a6d550aad9fa30b08629d02617dc0283dd3580dcd84a0d610c0d60c3dd55190d12210a4591cbf13cdd57f4d798ffcb50a7dd47833c432d09697ac0282dd0584fdd4c01cd526e9d770c0d85ce0d8443db40d1dc27a93d2341da05a0dd8a10d722baad105d6b36360c20416aaae0a05a41db24e5ddac698d4997dd7b3e0da9c78da8558d13030b922f0a67c3db6e52cdac3fd88d48bd9b4dc09e11c48c8899f715b03c64d75c90dd96efdaaf0ac0ed0dd0519addcad3bd92ac0b67addd9704da2a04ddce5fd69a93c0089ac3659360696d9918eb0dd6c2975ea9d36ec8d82d45db59e7d0bffe84ddf6863df54cd756500db401cdec25db64c6dde09ae6479ed24aced03f8194f2772bb3dc0e02ae2e0583bdb576de0ba50e12372e11a2e9265d0db3c5ce0215ec1ddade029de64034e25974c9693638f68c0e24e52a4e3bcb81b9e0b33ae22d309dc10c0cc4bdae387bbdb2a4ee475e6d88072d6058d0501a359733dd6569ce42960e368addfb570e47892e43d7ee5256edd8549de450ee6db65c58f3d067b0b2942edb02e30e6c7bdac4bfde568b0e6ea5cdb474c516f8de3598de261aee7d945daa012d22b60c2c213d01ffee0631edb5b30e5772cdeb4d0e78022ab3d9ee820dee5273ee47b6ee9fbd5cea0c2c4609d084e1396565d5786ceba912eccff553e0b990e28570be99e00be086ed7a67ee9b1de64cc0c2ace1d0323182fa18ac64c68e8b62ee56e9ee76a40eb8062eb3dfec80f7084419eba6f2eebcdbe52230e2a112d03f4d702f839e13500ed8022ed4d0cec950e07d98e27db1ee46567e7267ee0cceeece9ae503a8e27971caa17719bdb3e03ecdee2f79dc25c0ed3ba40ef34eecc39b006e45eddf97eeec1aeee05af50577e2abb5e9a84302449e8e43180f0a0a2f0bf9ee192eded6f10f180a2f0e3fedf376eee857cf1062ff228f5c313c3c52c709bcd91660a66e8268be8ddaed97850f2c682b01c3fb101efca941ef323cff34b156613f3e7dc4e08f0a1599ed9f297799415cfdd210f7d477fe8ff381fe066e009d9a9ec55ccf43d8ff5be84eac6b2e9d74c086b51b727bf864e4fe02faff44949f0594af64b68f30fecf1933ef0579ff5737f49df7d330fdf02019d19013df10145f66a4dea4a3ee7ad60f713f3d56d7fd8508f7f3a3ff874eff80805eea722ef2fa0d30661bf8a7d6e644fb9661fd94bbff3c640f6118df89d5eee700ff29ffff8a98f490fbd95d71e0396ea6d439f0c9adfb6167af6d48aee61c0fa3c33e1abde09c9eeea720eebaa4ffcc094f1c6d2f732f8534de7eb4faef90a1ff8b43dfcad70fc09afc28bde057d0efcb92ffcd85ffcdfdf4b33cf33a0ee03b7190ab719df3420fe3743fe9908f38d5f09eb3f31ed2fd1729f023b4c64ffa52ff0a70fff20008923599a279aaa2bdbba2f1ccb335ddb379eeb3bdffb3f30281c128bc62332a95c329b4ea6e1219d52abd62b36abdd72bbd4a0c3ab4d4000e22c62183db3dbeef7d7168063033733ddfac4adf3fe3f5c0d1ee083d120a09dcce1df9e20a15463a4e42465a5e52566a6e62667a7e72768a8e892c0a3e9695d905f0384df025129aa2c6a22cddc632dcda2dfe848ec2c30a2aea9d1e9c1cc6e5e6f325daff33374b4f43475b5f53576b6f676c942f0f76a10b318401f9c009137f8ba1b6bcd2d612e32b1b33afbbd97bb22fd50187fccb837cbfe712b68f020c2840a17326ce8f0612804f82676790544819f047e0c0c9148f123168bb64cffc9dbf7c89947902aa7880448100801532d61047433f024c49c3a77f2ece9f327d0a042816824540000d2a44a97326dea34a9a9633fccbd2990670091a2808e3eedead569d47724efbcfca4f50fd7af6abf86354988c881530c86e11455b3cdd0bc7af7f2edebf72fe0c03d62125270e4ee193240acaa9c3b843020c3861e299e014f980dc4679c41fe23b988662f9569961d7c0addbcbaa1427b11ecfa35ecd8b267d3ae6d69c0238e467efd71fca333c5d1407013d25d84b71fdf322eff29e9527528e2808cc37aa4fc05eb2e439863760be8e65bdbe2c7932f6ffe3c7aa154af22e14e072bd1955283ac7fdffe117ccb633397e6541f4e7e45b807606ae1ff01810063fdb1901d17e07d971e84114a382185155aa80472795c47c47e3ea444d14c3f6448c786437418c3807038471a749f8c084789429ce802835b0481803d8f00e0488b9ed4a8c585410a392491451a39de8f587c361921a8fd90233efa88f3c892a03de2248a337ac7c828495e5125115e5a81258d0ada80a32c606267662662ea71249c71ca39279d7556f3e11fd41df748883bbc08ce8a3be0b951127fbad1670b29be1168993d7232681e7a564708a22ab859c50f0148670c8f06aec6a69da18a3a2aa9a59a1a833f80046884a26ea431154844a4fac7aa029af26a96b890e5e826b3fa512b11adb6816ba39ee610c0a55954da42b25338c8e5a9d1ff4a3b2db5d516099c864b98221c0f9bb213230fd892a82d65fae9ca1faf9a880b23b98470bb42b3901cdb4082b3bcbb66ba9ac45b88b5fdfafb2fc001f755af1f6a86f9080141304091c13c109c47c342c49bf0725a3ed7a400196bbc31c71d7bfc31c820b7f0301d114f4908c5f8621cf2c7042445b22c0310bba51f2cdb7c33ce1c170b48ce3dfbcc32a3020b3d34d1451b6dc27f7048ba2721c0ea70163bf30191f41b4b4faaaab9f1ecba52302c50ed86d54318da86d329eccbf51929d385f62c3bb30d0c9947cb3d37dd75978a91514c08cb46d837c4854f0144e0bd95dea6f48dc2de6704bde0db6daf30385a85e7c662e3516f5d79be239c8d391571ffdbfd39e8a18b0ee1c44d98e2b90e507ea33610a533717ac5e776caf98396226cfa9594d33e0beb05eece0bb3bf9f363af1c51b7f7c60db3611ef8e4034808f031c96cb04f3b16b8daef0caaca03cf53aea9e7dd333fb0ebe4dc193ff07eac8abbf3efbed6be3ab1f52177a2b108913227e0ff0e7213f12630f9bebf566773e36ac407f74e0df11fcc706fca16073d94bdff7062806b749b00d10741f0633a8c10d5ae279796b82fdbc103d20dca37942f020e140688a11be20845d581cbc2a881715a030722a7c040b1927433a2c2b823b0492f97ec8860b72b088463c22127b00b337f42e09a668a20e16b60e93e560896e80e2119e08c0eeac4d88365281ff15db80c562dc8e825ee4c2000ea7b23366c18c6cc402119328c739d2b18e22f89bbb9e20c514fe0072c150a3dfb8d7843ddab08516f3e11b9d95023c02e25e4720a41f02e7c6445ac19134a3a4bc7488c92cc4d18e9efc242891e7c7f83d6194910202238151b61d98f280a5341c0c5cc80518da6e93984a412be1804024e4b26a93b4e5182f89c95f6eb293a13c263293593448e641924ef85a1ba85883300222983960261d9cd90468b2419a2390e5166869365bde1205d8848336a1600a6f3a9073d6bc1839f9a5c978764e99f6bc273e87a6c53d782b5b3001872575b0cf27f4735c86945d17c9a982813aa1a0ec0a223d1fb000060ad096c4c4a431f3ffa9d18d727448e01c4323ce19082018907e42f86816026a04910ae4a0014ca84511274827b0b47cf38c2703285ad14d5e949219ed2850832ad4f1d4f00fbb4c422fdd90431e404a2644282a29f790d4362c5505284d05f6e29902a8eeaf11536543554fd0ceb7bd737c31bd69447f3ad4b5b2b5ad7c515d3623c1cd3348a907637d805a65005774cad51475b5ea21d7a85014ecb52a7d7dc45fc51a516f9a95a7108d285edd2ad9c952962fa9f443598be050c35e2418e2a4c165f39059226cd60de9042c421b3bcc1384960ea31d4269db705ac592b30080dce96ad14acfbc56b6b7befd2d35a0961149d4b40d47bdc15cdfb0caa7cd548f6d61c155aff059ffdad21305c2cd834a1ff9dc71dab2013acdc15dd1d6d344f216b8e63d2f7a35515c361c17a9eb0c426c0d2a84f59ea1bdbc7c6fa2023b5e219a73bbafa4926ebd0880e9c2d4b101266779d3abe005335809f13dc36cb7690a70e1605d7fc8ee0d1e2c8608abd33a2e88ae15085c82f0720d051af6028797905c2f50580424664701300c5ec8ee978d096e308e73ac631c80b80aaf252d7e82705d40d8f7063da6c28f611be4fca65698943cc191a79064219cb80bcb2dc31b01105689d1f8b169dd3198c32c661f28303194a0af1844dc82a646f26a8d3cb37ebf19e70327f2046516838c571ae717cfa2000d28b20ff81c2b2fef76cc863e34a25d50d83700fffa085fa56b10160d87c4f640d2c6a5c4a3c540e91244590a6ad65c97bbe15fa9fa3586325c40036edbba509b1ab252b871a2632debdeb299b3935871458270e7336c5950a648718729c5e497aaf6c925a8b5692b816b2ef450d07e00400312d0682e47b4c66784f5acb3ad6da10e190e5356f223a61d4b546485a192a87217ecdbe9077cdac5ac1641b799789b5193c0d91b464ac602a0eac3bc9bbbae8eecb6032ef08113bce0063f38c213aef08533bce10e7f38c4232ef18953bce216bf38c633aef18d73bce31eff38c8432ef29193bce4263f39ca53aef295b3bce52e7f39cc632ef399d3bce636bf39ce73aef39df3bce73eff39d0832ef4a113bde8ff463f3ad293aef4a533bde94e7f3ad4a32ef5a953bdea56bf3ad6b3aef5ad73bdeb5eff3ad8c32ef6b193bdec663f3bdad3aef6b5b3bded6e7f3bdce32ef7b9d3bdee76bf3bdef3aef7bdf3bdef7eff3be0032ff8c113bef0863f3ce213aff8c533bef18e7f3ce4232ff9c953bef296bf3ce633aff9cd73bef39eff3ce8432ffad193bef4a63f3dea53affad5b3bef5ae7f3dec632ffbd9d3bef6b6bf3dee73affbddf3bef7beff3df0832ffce113bff8c63f3ef293affce533bff9ce7f3ef4a32ffde953bffad6bf3ef6b3affded73bffbdeff3ef8c32ffef193bffce63f3ffad3affef5b3bffdee7f3ffce32ffff9d3bffef6bf3ffef3affffdf3bffffeffff3f0006a0000e200116a0011e200226a0022e200336a0033e200446a0044e200556a0055e200666a0066e200776a0077e200886a0088e200996a0099e200aa6a00aae200bb6a00bbe200cc6a00cce200dd6a00dde200ee6a00eee200ff6a00ffe201006a1100e211116a1111e211226a1122e211336a1133e211446a1144e211556a1155e211666a1166e211776a1177e211886a1188e211996a1199e211aa6a11aae211bb6a11bbe211cc6a11cce211dd6a11dde211ee6a11eee211ff6a11ffe212006a2200e222116a2211e222226a2222e222336a2233e222446a2244e222556a2255e222666a2266e222776a2277e222886a2288e222996a2299e222aa6ffa22aae222bb6a22bbe222cc6a22cce222dd6a22dde222ee6a22eee222ff6a22ffe223006a3300e233116a3311e233226a3322e233336a3333e233446a3344e233556a3355e233666a3366e233776a3377e233886a3388e233996a3399e233aa6a33aae233bb6a33bbe233cc6a33cce233dd6a33dde233ee6a33eee233ff6a33ffe234006a4400e244116a4411e244226a4422e244336a4433e244446a4444e244556a4455e244666a4466e244776a4477e244886a4488e244996a4499e244aa6a44aae244bb6a44bbe244cc6a44cce244dd6a44dde244ee6a44eee244ff6a44ffe245006a5500e255116a5511e255226a5522e255336a5533e255446a5544eff255556a5555e255666a5566e255776a5577e255886a5588e255996a5599e255aa6a55aae255bb6a55bbe255cc6a55cce255dd6a55dde255ee6a55eee255ff6a55ffe256006a6600e266116a6611e266226a6622e266336a6633e266446a6644e266556a6655e266666a6666e266776a6677e266886a6688e266996a6699e266aa6a66aae266bb6a66bbe266cc6a66cce266dd6a66dde266ee6a66eee266ff6a66ffe267006a7700e277116a7711e277226a7722e277336a7733e277446a7744e277556a7755e277666a7766e277776a7777e277886a7788e277996a7799e277aa6a77aae277bb6a77bbe277cc6a77cce277dd6a77dde277ee6a77eee277ff6ffa77ffe278006a8800e288116a8811e288226a8822e288336a8833e288446a8844e288556a8855e288666a8866e288776a8877e288886a8888e288996a8899e288aa6a88aae288bb6a88bbe288cc6a88cce288dd6a88dde288ee6a88eee288ff6a88ffe289006a9900e299116a9911e299226a9922e299336a9933e299446a9944e299556a9955e299666a9966e299776a9977e299886a9988e299996a9999e299aa6a99aae299bb6a99bbe299cc6a99cce299dd6a99dde299ee6a99eee299ff6a99ffe29a006aaa00e2aa116aaa11e2aa226aaa22e2aa336aaa33e2aa446aaa44e2aa556aaa55e2aa666aaa66e2aa776aaa77e2aa886aaa88e2aa996aaa99eff2aaaa6aaaaae2aabb6aaabbe2aacc6aaacce2aadd6aaadde2aaee6aaaeee2aaff6aaaffe2ab006abb00e2bb116abb11e2bb226abb22e2bb336abb33e2bb446abb44e2bb556abb55e2bb666abb66e2bb776abb77e2bb886abb88e2bb996abb99e2bbaa6abbaae2bbbb6abbbbe2bbcc6abbcce2bbdd6abbdde2bbee6abbeee2bbff6abbffe2bc006acc00e2cc116acc11e2cc226acc22e2cc336acc33e2cc446acc44e2cc556acc55e2cc666acc66e2cc776acc77e2cc886acc88e2cc996acc99e2ccaa6accaae2ccbb6accbbe2cccc6acccce2ccdd6accdde2ccee6acceee2ccff6accffe2cd006add00e2dd116add11e2dd226add22e2dd336add33e2dd446ffadd44e2dd556add55e2dd666add66e2dd776add77e2dd886add88e2dd996add99e2ddaa6addaae2ddbb6addbbe2ddcc6addcce2dddd6adddde2ddee6addeee2ddff6addffe2de006aee00e2ee116aee11e2ee226aee22e2ee336aee33e2ee446aee44e2ee556aee55e2ee666aee66e2ee776aee77e2ee886aee88e2ee996aee99e2eeaa6aeeaae2eebb6aeebbe2eecc6aeecce2eedd6aeedde2eeee6aeeeee2eeff6aeeffe2ef006aff00e2ff116aff11e2ff226aff22e2ff336aff33e2ff446aff44e2ff556aff55e2ff666aff66e2ff776aff77e2ff886aff88e2ff996aff99e2ffaa6affaae2ffbb6affbbe2ffcc6affcce2ffdd6affdde2ffee6affeeeff2ffff6affffe2f0007b0000f300117b0011f300227b0022f300337b0033f300447b0044f300557b0055f300667b0066f300777b0077f300887b0088f300997b0099f300aa7b00aaf300bb7b00bbf300cc7b00ccf300dd7b00ddf300ee7b00eef300ff7b00fff301007b1100f311117b1111f311227b1122f311337b1133f311447b1144f311557b1155f311667b1166f311777b1177f311887b1188f311997b1199f311aa7b11aaf311bb7b11bbf311cc7b11ccf311dd7b11ddf311ee7b11eef311ff7b11fff312007b2200f322117b2211f322227b2222f322337b2233f322447b2244f322557b2255f322667b2266f322777b2277f322887b2288f3229979fb2299f322aa7b22aaf322bb7b22bbf322cc7b22ccf322dd7b22ddf322ee7b22eef322ff7b22fff323007b3300f333117b3311f333227b3322f333337b3333f333447b3344f333557b3355f333667b3366f333777b3377f333887b3388f333997b3399f333aa7b33aaf333bb7b33bbf333cc7b33ccf333dd7b33ddf333ee7b33eef333ff7b33fff334007b4400f344117b4411f344227b4422f34433f6a0800003b, 4500.00, 1, NULL, NULL, '0', NULL);
INSERT INTO `wl_orders_products` (`orders_products_id`, `order_id`, `products_id`, `product_name`, `product_code`, `product_image`, `product_price`, `quantity`, `product_attributes`, `store`, `product_type`, `shipping_charge`) VALUES
(7, 3, 1, 'ASUS ZenWatch', '01', 0x474946383961d007d007c400003f3f3fbfbfbf7f7f7f0f0f0f5f5f5f1f1f1fcfcfcfdfdfdfefefef9f9f9f8f8f8f2f2f2f4f4f4f6f6f6fafafaf000000ffffff00000000000000000000000000000000000000000000000000000000000000000000000000000000000000000021f90400000000002c00000000d007d0070005ff20248e64699e68aaae6cebbe702ccf746ddf78aeef7cefffc0a070482c1a8fc8a472c96c3a9fd0a8744aad5aafd8ac76cbed7abfe0b0784c2e9bcfe8b47acd6ebbdff0b87c4eafdbeff8bc7ecfeffbff808182838485868788898a8b8c8d8e8f909192939495969798999a9b9c9d9e9fa0a1a2a3a4a5a6a7a8a9aaabacadaeafb0b1b2b3b4b5b6b7b8b9babbbcbdbebfc0c1c2c3c4c5c6c7c8c9cacbcccdcecfd0d1d2d3d4d5d6d7d8d9dadbdcdddedfe0e1e2e3e4e5e6e7e8e9eaebecedeeeff0f1f2f3f4f5f6f7f8f9fafbfcfdfeff00030a1c48b0a0c18308132a5cc8b0a1c38710234a9c48b1a2c58b18336adcc8b1a3c78f20438a1c49b2a4c9932853ffaa5cc9b2a5cb973063ca9c49b3a6cd9b3873eadcc9b3a7cf9f40830a1d4ab4a8d1a348932a5dcab4a9d3a750a34a9d4ab5aad5ab58b36addcab5abd7af60c38a1d4bb6acd9b368d3aa5dcbb6addbb770e3ca9d4bb7aeddbb78f3eaddcbb7afdfbf80030b1e4cb8b0e1c388132b5eccb8b1e3c790234b9e4cb9b2e5cb98336bdeccb9b3e7cfa0438b1e4dbab4e9d3a853ab5ecdbab5ebd7b063cb9e4dbbb6eddbb873ebdecdbbb7efdfc0830b1f4ebcb8f1e3c8932b5fcebcb9f3e7d0a34b9f4ebdbaf5ebd8b36bdfcebdbbf7efe0c38b1f4fbebcf9f3e8d3ab5fcfbebdfbf7f0e3cb9f4fbfbefdfbf8f3ebdfcfbfbfffff000628e080041668e0810826a8e0ff820c36e8e083104628e184145668e1851866a8e1861c76e8e187208628e288249668e28928a6a8e28a2cb6e8e28b30c628e38c34d668e38d38e6a8e38e3cf6e8e38f400629e490441669e4914826a9e4924c36e9e493504629e594545669e5955866a9e5965c76e9e597608629e698649669e69968a6a9e69a6cb6e9e69b70c629e79c74d669e79d78e6a9e79e7cf6e9e79f80062ae8a084166ae8a18826aae8a28c36eae8a390462ae9a494566ae9a59866aae9a69c76eae9a7a0862aeaa8a4966aeaa9a8a6aaeaaaacb6eaeaabb0c62aebacb4d66aebadb8e6aaebaebcf6eaebafc0062becb0c4166becb1c826abecb2cc36ebecb3d0462bedb4d4566bedffb5d866abedb6dc76ebedb7e0862beeb8e4966beeb9e8a6abeebaecb6ebeebbf0c62befbcf4d66befbdf8e6abefbefcf6ebefbf00072cf0c004176cf0c10827acf0c20c37ecf0c310472cf1c414576cf1c51867acf1c61c77ecf1c720872cf2c824976cf2c928a7acf2ca2cb7ecf2cb30c72cf3cc34d76cf3cd38e7acf3ce3cf7ecf3cf40072df4d044176df4d14827adf4d24c37edf4d350472df5d454576df5d55867adf5d65c77edf5d760872df6d864976df6d968a7adf6da6cb7edf6db70c72df7dc74d76df7dd78e7adf7de7cf7edf7df80072ef8e084176ef8e18827aef8e28c37eef8e390472ef9e494576ef9e59867aef9e69c77eef9e7a0872efaffe8a4976efae9a8a7aefaeaacb7eefaebb0c72efbecb4d76efbedb8e7aefbeebcf7eefbefc0072ffcf0c4176ffcf1c827affcf2cc37effcf3d0472ffdf4d4576ffdf5d867affdf6dc77effdf7e0872ffef8e4976ffef9e8a7affefaecb7effefbf0c72ffffcf4d76ffffdf8e7affffefcf7efffff000ca0000748c0021af080084ca00217c8c0063af081108ca0042748c10a5af08218cca00637c8c10e7af083200ca1084748c2129af084284ca10a57c8c216baf085308ca10c6748c31adaf08638cca10e77c8c31efaf087400ca2108748c4221af188484ca21297c8c4263af189508ca214a748c52a5af18a58cca216b7c8c52e7af18b600ca318c748c6ff329af18c684ca31ad7c8c636baf18d708ca31ce748c73adaf18e78cca31ef7c8c73efaf18f800ca4200749c8421af290884ca42217c9c8463af291908ca4242749c94a5af29298cca42637c9c94e7af293a00ca5284749ca529af294a84ca52a57c9ca56baf295b08ca52c6749cb5adaf296b8cca52e77c9cb5efaf297c00ca6308749cc621af398c84ca63297c9cc663af399d08ca634a749cd6a5af39ad8cca636b7c9cd6e7af39be00ca738c749ce729af39ce84ca73ad7c9ce76baf39df08ca73ce749cf7adaf39ef8cca73ef7c9cf7efaf39f000da840074ad0821af4a0084da84217cad0863af4a1108da844274ad18a5af4a218cda84637cad18e7afff4a3200da948474ad2929af4a4284da94a57cad296baf4a5308da94c674ad39adaf4a638cda94e77cad39efaf4a7400daa50874ad4a21af5a8484daa5297cad4a63af5a9508daa54a74ad5aa5af5aa58cdaa56b7cad5ae7af5ab600dab58c74ad6b29af5ac684dab5ad7cad6b6baf5ad708dab5ce74ad7badaf5ae78cdab5ef7cad7befaf5af800dac60074bd8c21af6b0884dac6217cbd8c63af6b1908dac64274bd9ca5af6b298cdac6637cbd9ce7af6b3a00dad68474bdad29af6b4a84dad6a57cbdad6baf6b5b08dad6c674bdbdadaf6b6b8cdad6e77cbdbdefaf6b7c00dae70874bdce21af7b8c84dae7297cbdce63af7b9d08dae74a74bddea5af7baffd8cdae76b7cbddee7af7bbe00daf78c74bdef29af7bce84daf7ad7cbdef6baf7bdf08daf7ce74bdffadaf7bef8cdaf7ef7cbdffefaf7bf000eb080074ce0021bf8c0084eb08217cce0063bf8c1108eb084274ce10a5bf8c218ceb08637cce10e7bf8c3200eb188474ce2129bf8c4284eb18a57cce216bbf8c5308eb18c674ce31adbf8c638ceb18e77cce31efbf8c7400eb290874ce4221bf9c8484eb29297cce4263bf9c9508eb294a74ce52a5bf9ca58ceb296b7cce52e7bf9cb600eb398c74ce6329bf9cc684eb39ad7cce636bbf9cd708eb39ce74ce73adbf9ce78ceb39ef7cce73efbf9cf800eb4a0074de8421bfad0884eb4a217cde8463bfad1908effb4a4274de94a5bfad298ceb4a637cde94e7bfad3a00eb5a8474dea529bfad4a84eb5aa57cdea56bbfad5b08eb5ac674deb5adbfad6b8ceb5ae77cdeb5efbfad7c00eb6b0874dec621bfbd8c84eb6b297cdec663bfbd9d08eb6b4a74ded6a5bfbdad8ceb6b6b7cded6e7bfbdbe00eb7b8c74dee729bfbdce84eb7bad7cdee76bbfbddf08eb7bce74def7adbfbdef8ceb7bef7cdef7efbfbdf000fb8c0074ef0821bfce0084fb8c217cef0863bfce1108fb8c4274ef18a5bfce218cfb8c637cef18e7bfce3200fb9c8474ef2929bfce4284fb9ca572e9c033840000d0000001e40f39adb9ce60b00000304908000c0c8000910000100b0809b1b9de632dfb902ff028000d5064000333fbad4a7fe80053420014d2f11021cd080a253fdeb371f000004e080acd733e6324fbbdad7cef6b603c0004d4880dbe74e7799830101096000d8f73ef5050800ee993040dd07cf76c00341f0844f3cdd0d2f05c42bfef16b4fc0180e00f9c4f7e1000af03adf377f73ab335e0b68afbce8474f7ab77ffe8a51e7fcd709d00401a81eec5e7080de5f4f7b9c2bc0ec940840eda7eef320e87ef79c1740151400fce08f81f8c53f7aefef8080cc27fff50568c001b690fae75bfffacae762f5ad3ffd25b81efb5b4080000a807dd513a0fb93f8fdf597ff03f597dfe800a8c2ecdf6f74e18b61fed86fc01d0e408001d09ff300207958b07dffff5780afc77e584480c9c77ade577e59207efe67807cc700e80709eef77c08d80317688055108112f800f617061e887d0b5007fcf7819c57000258050a88822e68741968452d587c157804df777d58a00023f88254777e91b081c517833b0084ff27844b60002f18825f4084cf57836d80000dc0832968844c308352e88254284556b87b0c980437687d5660009a77855f37000a6081e5978537c084efa7844f807c28e8865d1085ffb7826e90003b48865fc700b8f7045ba88705a88650f487b5d78745f085cf570588088854b700a787086c487b82580391887df12705f8278172c80563587e5dc8060840888c587303e00052208aa3b87edaf77f9b3804ff8b587c5370009d988a53370076980895a87a934803b9888352908705d88a5970000638006ee000c0488b53f7894d808aca1884ab487f036088aee88051808ccfc87704408d84d08b9bb78b33e08d18180548988461900012f88865f08ad9d877dc7804ced88e92188df4278c40c08ebb170570288f5fb700ef1808e2b877e0280301597cf67804e8688e6090896da80608c090fce88e4e108f11f98df4f87ed38804f8587b50400015b97705a08e009986425090c077894fe0910af905c9787d25880608308b1f297505e084f0389324b94514697c36688d4da0923849750320927f6092543790316094f90805e4b7925d508e12f88f5d109341b977fe5885ff55697d48a9443bb979c6d893e0f79359598644d9074a29755bf90267497b654904c4c88307a98828688a65409563d98f5209045d799735979648b4977c778b42b091b427967c598b6da9076b098325298567e80409e9949c8882cc787732799836c7004b00987ce99747c49960570060e98b4ab08f98697419d98d3909048ba97a9ae90440e98271390508e082a24906a019918f8904b999959e6944bd497582798f3e89040e709a78a99ad8f79b2bd09a9cf7954dd09492a90591f98189690574889c54779d3b109c41c99c44e49d34690484f97a4a60002da99d0f50997ee09c7dd99852c89d3ef09670f905b12981bbf905d5a99e47f79237c99f7c079eff43249e52379c3e509eaa97047609a047979f45b99aed77850e8a04fb19872cf98228e90507909e003a9bddc9a002799105e89f83599c45909d201a76f22907ee4973028a022d3a8186599f4f2985794905041a9136a99729fa752f1a44399a7dd518964610a31549a2ed09a13e60a460079d4a209dd38905088a7d74d905a6d9a336c79e3c8aa56829a20598a1c449a444800050caa535e7a17310a33f6a024c0a762baa03f449a35c10a453a77f5db0a1667a743bea0374ca8f6bfa437d7a737f5a0253ba79a3898205c07697f97f03b0a777a0a6f0e9984b50a116ca05b52985b7c905f7f98139c7763ca8a57c9aa78ca993183aa4a43904782a8100b074ff2a007410f97eaf99a4cb19a99fba049b5aa95b709c57e8a88de7820c900044e9720d50a6f4c7ab3a10a8ed38a83d84ac36a7ac2250a87c6704b77a7d032000c64a027847ac4aaa98dbca036dfa75998a04dafa81680a9b6438a15610a805707b316000d36a7d763a04e2597af49a786fca95b51a04d0ba774510a76d78a328a0835ffaa0b3ea7b7a78ad3ce0af516a05e32a81b18a0550298de56a0207f0aac9e7a441209e98c4ac3687b033b0afb04704ef5a7c218903a11888b2aa8a064b86061a04948aab5910b152b805235b7c0be0b12a808def57a5196ba293c4b13507aa3800b25f37a6ff77953a50b3bbf7b0dc5ab0aca98742fb034acb8a5c70a5ff2fc8b355a0b0d717b5edcaa1b4c7b43fa0b19704b43587b33040b4544704689b9c3c30b5b467b66c00a92b7b85e15a040dab89730a88f16a056bbb7a3e809eef4704626b49644b735c4b037d7b744470b7b587b43de0b6aab7b77920b74f7bb047a0b5b2c9058c88a454c0b8b577b8e1b8b3f2eab39254b83407b72d90b8463704ba8a7d4319048bba7b188b07941ba17ad8b23ed0ba5738b14aa0bb6488ba4420b3d6c7b93ca0ba3727b9a12aa69464ba20f803c66b734300b99b87ae3b90aa54ca07b5bba48008ba3980a252c8bb49e0bd5788bb4d20be170bbc2fe0b99c47bc3c30b895c4bca959bca4cb035eab7aeccb03565b7cdcdb06d9ab818058b7ff4210bb78ab05ea6b80601b0505cc9342f0b2bb07b034e0becbab87e0bb02cf5b7342e0bbe3b8b8e537bb76d0bfdeca880e6c03972ac15a80b93cc8c14f20bcc907c04090c021dab3cafbb37a18bf3a50c1342704d2bb7760eab2a2dbb42a5bb97a88b54080c1727a05f92b85ce4a0347bc7be4bb03e6bb7b13ec02102cc3242cbf31cc032ebc774dbc03590c76c85b071e3c848cf8c53ef0c4999b05165bc451209e2c7c78d877c01f7ac591c4bc3487c23560c30f10042a0c7c6d0c044b4c7bf7cba2dd2ac68018c83b20c0038c05ca68c84a50bf0a6cb72e2904535cba8cb8c52f80c741f0c7af47c64030c2d717c26a10c63af0ad7c07ca32e0c96418c5ff4440caaa67ca7afc7ee83b03395cb4307caa11fcbf566ccb6d5b7ef76a03694c7b424c07a29c03ac0c76c1cc0344acc65460c6e33b050cdcb849f0ccaf17cb2b30c9733c8a969cbaf39b035d2c94a5597eaa4c06c38c03c5fc759cac03cc0cb35580c82fb8bf4390ce9b9c047b5c7bce6acd9044c735d7c73280c940507e702c04265c7b3b2ccc833ccaa3c8c837c0ce0618ce4110d05768c74a209e498c02d7bba5ba4cc9d85cc3dbbc86e547bd43d0cdb5e8c35a49ab7ae8ca2e80caa98c05d27c85bdec038ebc79266d030abd770c9d02f6fc48f85c7308adcd728c039aac8b4bf0cbaf17d3e25cd0c49c8ac79c03c9accc98d88e359d03e5b7d33d109cff4f7d0237ed4839fd9e43bbd136c0cf4a80c7136d05e3ccd1a378ce3700cfe48a052ffd752bcd77037d9efe6cabd757d52670d58d94d54897035e3dd5d8a7cf249d7cd91cca464dcea9f8d63930d3c17805ce09000ecd79446dd0d847d797bcb5b50c8663ab8cccb9d7ed6b894c30cfb527d95c30d63650ce21eb03289dd2d8697dc207d24697d408597e81bd03156cd83860d78c84d7797d039abd03e567d642e089933bd8643d8a83bad44c0d05887d941030cb52e7cece2bdccf6d7dff5cdb5c7dd7cff89bbbad03e0dc046b0d76b4fd06a24d89b408da1080d6695d05a7cd9110d0d620090560bd04071000f23ddff45ddff66ddfd4ac02b6bd48b86db8ffba5ddd3400dbcdc8d9b40bdde25dd83f90dc545b05eceddd22d0d89bd7d21addd381b0df8ad4dfa7dbd5004e90061eb67d1ddc4e6bbba968da24abda56c0dc471782ac7d731e6d0416be072f8e4818be9e1a4ee107fec34a80e25307e238aebdcf57002bbea6675900cf4bde37d0ddbc37023a7e73df2db81bce07317e4833fe00e89bdd841de25ef8e4828de5fefb7c00b0e492ddb70450e455e0d9093a020d5eda5869e37f10e58634e5ce3d02563edcd627e1ffcde6fcdbe1a1ebe5690e7f7cbd7b0eb0e43667e4776c7d190ae17ce7da4e8ee77de0e68534e5548eb85aae9693de03730e07e1cd8b869ede86ca03c577b2cf47e834a0e052e7862b6e73ffbe2dc9958e078e4e48903ec1977ee396cd04b1ee0699bee7170b01a4aed547bd7bf1d79ba27eca3d2ee8f93c91ab7e07ad3e48e289e4a8e9cab58eebb3de808cbe06b7cee160d8b72d1e037d2b7cc04e05c67de624f0ed9c97df3590ec7460ee8124d1a1feb1c7de9cedaed7ef3e06d59e943868e67b18c7b50777dd3e05c44e7360cbe9af97edaa3eed301eefe9ee80a049c32ef0ecd67ed1879a8805cee51f6cd9cc5ec7bc2dbb22b0ef5270ea3587aebb6e74d33dba04af07e80e481adb9abccbf0f43ef2966ef06130ef30e09e2220d4dbd9eb9f2b021c4f73c10e03f61ee12760de4d3ae02ccfea2eff4762fbf1a4b8cf455f0231ea042abfe53ddee5ffcfd7747dcee2f0cec42230d753f0d37b87c2e26e919bb9f46f50f2466f8d557f74b1fdf4943ef4b22df65d00f36b3f8e882e75212fc5c097755a7f8ad28d02001fb96beef08240f67e34b81cefd726a0f62ed0f4ade7f6a1ade70d9f7cbdf7f110fd02c0e79f790f057dcf791e8df43627d57f0ef815cef87a34b8676f74818df82da0f8b42efa5a00f789afb2407f74767e962178f94ff0f57c2792b1ff75e42e03823ff6e557afc20f00a99e80c559f8672bfaaa2feda00fde8ebff2198cfb5227f0140c7ccb67fb4eb0fb219d02d20f76b17dacacaf0690eee565e4bea57f73d98cfa2cb0fc5f1dfe58e0faa9ffc3c057f7d58cf122d0f37cb7f32e90f3ff0f00020c349225f2a0a9bab2ac58c2b13cd324d0e2f95af3bdff0383c09bae683c22932980b0e97c42a3d229b56abd62b3da2db7ebfd82c3e231b96c3ea3d3ea35bb4454166103786b0114d0e3d9405e97c6f7e1b489f105b60474151aa6289030040e4819be40282e3e08b01d5c32f22c703e4496bd810e9ada80a682329db6babec2c6caced2d6dadee2e6eaeef2ba9272c2002e22fa0897eea93efc25f73a5972126f3d1b668e28181e404d2b25906cf755ab5d831af034a49693fd5e367bad27c323b1b6d3d7dbdfe3e7ebeff3f7fbffe37b67080682398be6f130060c99aa650d017a4b164dcbb73ce13605eaf644219c6c232ad20997e6112751351cffa41219466020884f58c68bd902a1cb9a366fe2cca97327cf9e3e03320b06ad58502c20f3384c65f3289d890c39892c108800149845ec4404a5f24c2a4a344e80c23ac62a9d9f33c8ca4c4bd32cdbb66edfc28d2b772edd536895c4287869ad0c8e8b281635e377604da6709c1a4d598240a002500c35286118c9d632284135ea71f708027581dd6e4e0b8f6fddd2a64fa34ead7a356b5ea18ff41d9af07395c949921e73691b09e22bbb8b88bcdcc7a390df2b268e83bae61c28e23506e7d128e6b511b9d445af6aad7d3bf7eedebf83e77edd4f0c8c8ba8ce7e9858bd60dafe8c17e96d053e0e8460fb480f921c6909e821d748c589633ed0d7027ad3b967ffd678d81d149e830f4218a184135208cb8282c8c0d825cec5c6de7c0986e11f7fba4994482a342d78601024e5e11504222a51d918e65da2220fa998b412883e5dc8601fa45518a490431259a491e1f5c8c20c344e959e524fe5d69e87ff1488837cb59d08c37e700c288441796446028c49c8284602a9e4c7439229a4a3e394421c20809c73d259a79d77e299279d1c5ab1a68f4a0079a4a083125aa8a187dee3670a3468b8089ffdeda84da45e8c895761257251e50a3419808d109d06c261a5479419068b1bde914a9860288a82149a8272a514adfe6944a088e29aabaebbf2da6b15b4d2c0641f360af5e614b0ee80c6a8482c85a93459ca9191105b2ad1ffa5988aa5f1e522d6f6802c0ab762016c14de0eb305adb5ea00aeafebb2dbaebbef0a29ee0c8d7a3ac3b2b041b9d019f75677a92ab21e9b0ab710d00b47642b0672b01bd89e412eb137a6d2999b4f4a8aee21e65acca0baf072dcb1c71f83ace08ec896c9af1eeb512c65ca00918b02c0af4e79661f62fda02d1c0ec4a068a95f30c7499a9aa582f3c4513a93310b2fbf64b4681b87dcb4d34f431d752df29e75c90012c760327928134d86d63934fbaf892b43705f1e58f7006a1f688fa0731a9f3427c4d72c3c8cb1b140b41c08d24e9cabb40a4c4b1db8e083135e381554cb40b2bd93167d371873b710762a7b3fd1b20c70e721b40fd426c197db6708dbff5813e40ecc05e2a3fb9d02e542f49dfa03801b1ebbecb3d31ef5e9395bcdf608902b992f3bca327e4fdeaba34ef68b0903712a1caba2a2151a32735237c471b31a3c0d79f741fc10aec7037beddf831fbef886de0e83e2595b1f44deb8e90bd1f063775d492034f360b3126d2eecfc19051bf2b30f8a32cf74e94b1cf7b4f783d6a5ce7be35b20031be8c0ed940f060132448eaee5b88a194f0cbc4b1689c496290f466b6d3e501b1d4a070155ecac0bf60b951338d7071709f082dd2aa0ddb8a70a053e30873adc210f7712c11240af7fe89361e33218a201b6e37d1f9c9c0c94a704cdd5c08547a81b0acf40c26d3de18a7fa91e116b80bd3c18f07f364cff060e7b68c633a2318dbbf861092628ba6219715c48bcc2065520b958c14f363008a2c17ce0c42440b1045554d92514d68415f62190358c9ffa68a80504faad8c6a9c24252b69c951048f8ff881232361d6c52dd47151fe62e212f1589ef9f900919c99c120cb80b94b283279a930640ce348204766815600d8252f7be9cb5f023398c2f4252d2f69cc63223399b5ec640cdcd8076e85d255bedbe2bee6d80b253e8b943178251cd2864a56326c0c66bb84ee8020c51272d19633745d1881f64965c2339ef29c271bd808449f41ea9d78b36615a2a98c519a329ba08825047ad6141e9c13383468e51834f9cd2caae251e1e2e7477039517dd233a31add2847ffa3604f12e8651134f32760304a478aea029b25d55f0c84f39f1afc1109f8930c43c5c03fe445419574f0df45d5c9832f1ef49128ed28518b6a547a7ed482e5dadd500968522b9014a07a5ca972c099875be9540715a46938c5e04c43105496a080612e510ad4c32cb27d475d2b5bdbbad1a48e20a486984754b9a656af35f5162a9d6620ca14537c2da9493368590ab3a0454394533f38fa025c076bd12b34d6ad929d2c651f18d90d12a3aebec9eb46385b8bbdda7511654aa80eaee45024f0547e5d05036993403f271c566fee30eb63fbe4d9cae236b7ba055964e51a085668f6434fede76d6701dacdae9604a1a30ca358e8d8e4ce1614c57442569530ff5dc8d2969d69fddd6ebbebddef0e2eb2051d4a70b1345c2a94f73dcea2ea25c84a82afca8306f03dc26b4be0d24b14f60ae35c4458111696e8fad48bb5fd5571c16be003237842e25d2e1ca892de809d770a0fe6c771859b9de6f621b07db82e53a1cb85fb2e22b1d35285880f8752040420c52a5e318b57dc5a25b4534d054e308d6b6c63d58897609c885381d707bc08e7a2c2e6bdf00c409c84de9cf608b28a667ead70d3995521b69b5ce65dc120e459cdf8c65ade32977f9263062b810013962390a330667d5c19c24496c17ec994a13e6c9593f825c37cf3308061e2f997aa909e89cb5c3c6df694995d1e34a10b0d971cebf81275ce305f5bf2e300ffdb23cd9e5cb30cc6c39745ebc0bd4aad6a18a43c46ab7501d1930e68a0ab6ce853a33ad53841349895c65eee12d2d4145e6fa3f350df12bc98055b6db50e52db6196b2f6d332992976fd5c1c5adbd6d8aa5e36b39bed0b7efed5d5b51e51ac61cd326423d7969e2ec24c936c048992c0a0731643b4854d0d2a5b3b0c924e9ab29dedee77c37b68b25ee7a75feda8470b3a1febc660beab8b03e63dd90826cc1fb0bf60ee98dcbacf90ce36a98bbdf078433ce2120f354521496d0b377c0c67d637b6313eef1104bc082ec2740e38dcbc8277c1c807e744893d9a650183b0d4e99e38cd6b6e7387e71be663b4b721622c85905f9c4a1d1f72bebdadd512f03aff07fd6d5b4dbb20ee950f74bbd41cc3be9b20ea9b633deb37bf3a042cdecd6907d50c5c0ff2d0a9e0e31ab459a62430fad66ad0aa264f81e450a7039f5ddeee1f549d752fd73adffb4e68aeabdc685a48fa13d1d02a49a6b4ec6aa65e0db8998430013d079a2638a7bd40f8b9576b0b4f9f3a21145f95bdfb3df4a24ff0d8e5eea32d2403ee58307d7ca57a099fffd4f35aa304eb57104019d4de08aa8742ae319f0462a33719c0f742de8330f6d1233ff9351e3bdbff84faa68b818c779c2ad8d11a7b3b8fe0f22c183e0c526f2adf27e3f612f67cf5612c75c2283ffdea4ff5f1732f932d387eaea0f3beeb972ad08ccbc0df2d2847f35b30f0ee439f16e8ff1ff8b51e16f4de11f8dafd515fb23ddcfa39e003ead6f1f51f769c1f949941deec5e3314dfb1c51c0d945b0e7443e4e140dd9100fd111f012643cb1511ca7dc1061e10e841600ccae0311d1f04b85f3c6c81085a4a191ca011c01e2eb8e03e75e00c4ce00a50c50d3ec0d295600062c1e6a1602028e19f8d551904a13b35e00c62611666540df6200e6a813f715f17e8e0ef4ddfebe5d102ca80f6a94001a4dd2af980097641fc3de186694132245c29e19fc2e59c16f2611fc6530dfa96e06941e0f581f879811c3a5afdf5dc199aa10f202270fc0810c0e116a8e11ceac0ff41c100320b1954a18cdd9d1f8262282e500d1e4fea506232906016b4a1052affa26ce1211aca8013ca8421c6c0246a41115a621180dbe70de109f6a21e7e9c280ae3309a112906a2c570413260e22da2e24d7422bde5614ba14b1802a08759c107e62212d0e213c822387022f9f10d0c12e33892e3c79062294a9b50a9023566c1186aa3338263e5c463adc4d94231a1156862364a5e1674a10edc21cfb962597d623912644172cc391e63ad70813f999c00c663a43da414c26213fd492a2ea13552c1b6e9e36d608146d2c12e96df915520a31964499ae4ec9c63a209e2202a6343c1034e3ce3f5011a42fd490256230b9ed44636e215c0c3368696fdc91ce79de45012e5d3a464250e64d9c0c30fbea02a4cdeacfd22d14de429f9880a0affd23d52c123ea2412346438aac23232dc54dadd151665599ae5a1a4a44a2223ba35081878e4f2c0644472e04cf20012c2c13fd622564ac12a6e2512e06513f8d30330e52d45259625e5592266627e475a22e51e3e413f961618606347c465612e9e58c2803bf69510d8e215e0621114409e89e66826034836c15b024ae759262f92a562bae66b3e485aaaa542724163a64b0bc20358a2995c36d26ada1783104f673a992af82403e2d3eac1834d4ae54e0625fac1e6734267bc14986d0a25166865e61c223c74e53ec4a4ce45239b61473dd6807056413e729b0639653bc2c3d53c0e6f8ad16146677cca674fc866d7658c1740660e0c80694241373a173cfaff26bf61260c58dc53ca00794e016a1e81780224f6fd647b7d8182f2c64806dd7c5ae885e2d88c9d55db0d5e3c2c805536c167d2974e74e7f544647e22601320a81444938162817bd6805dea40060201025c67d835672262e88ef2685dd4a77da2cb174c668319564c282777c22861d2250f48e847aaa85eb226271427ce8d5b4e26271768e684aa636bf668977a693ffce88662082382020180a80f3880792ee84e94e8732d69fdc8c45fe6254642015fd2013b624134c969105067114ca91064a9960a24977e69a11a6a3bfc28903adf17c8a83ff2670fa0e88cb2699242e38066a64c6ce79ce2e41410221d30a80292937ac604039c690f20c090e22895ceffdca1b26aabe643a28aa8737241ac2ee89fa62102b1278952aa4c7e2711ca8401ad281404ea3e9641321c299fa6c5001c6b0d18c08d06648e92a4ab4aebb4d243a2da206d326a5a14c0b266dfb0bad9a406a83c862b48bd9f1304eb1334aaed89dd9e6901aada1ab7229db78ae4966a859ed8ebbde2ebbd0e26b5f2eb7c5a2bad5628338a460134c0cb1c4002785daeeaeab84a24730281b3c2818b1e28949ea6f0551b0575687812800380a8012800c402a5aaf6650ed068bf9a2c865aebb59e9ebca98598d90900a4ebe3f5449b3ad59b3a09713ec1b93641a4ae61c358aca8fac80200409e0000c872c29e5addc832d7c9322db5a62cc07e9d5b2aed88ceffecae7aa7a59a4f3c3caaa6569e71d6081ae8ac1024e4d4ea009eb21bd9926cd3aaadaba6acca52a018f8e7d49aad7a31ec5cf62a0da8e9253e06c572a62ac0abd7b6253fa2ed3bb2e5e0a240c9ae6de22666db06e698820102c4acef21aef058ad89d6ed08b8ab1164eac4d2691374aa9356138951e8e04a6c941aae0a4caee2aa2e51b6edd88a230934a925222ddddaacd9b927d4b240145ad5a6f6e757a641dee86e13b8eee07e28809d2eeaae6ef2a2ac38366eef8c01cf42dd7e9a05cdc64010f6290b94ea4d762d15442e0a586432b22ba89eaef41aeff11eaef2a2af7cb66dd9e4ed0e8e81bc625ef05edbe50a61ed7a02b4e42cdffec0f5aec0df5eff41e6ea2d17402fe60dc0dc8ea5f99e6ffa2a306cae2f3a962b19d8e8e0fa2f54daefa8616d0cc4adccee6de72a564489c3cfe6a0f91630cb1e6fea2ef009fb6103dbe9aa7e41044fedf776500593990c17193a4441d8fe0000e7806e7641ecea80ad3a810e83df0893f0e99a300a23311636f06cbea415b5afb9c1700cdfed0c4fb13d2a9a24e8ef1b86af1a3cb10b78810b932d1117b1e11e71129bf1032e31ff722819184017db50144bf105376cc80a8110ab001c6b6f95daaedfb2811d47ce17fbb1b92dc0d6121802a740199f71222bdf1233317ca68dd142715c506fd6d2af357082fc722eef3641062b01210b703260f213c0efa7912a261972022bff722a132323abb1e39e01185b221097211d87a5c3c209cb613107ff002407f01af870c91dd15622b2f19d322aabf23183222337b2637601028cb2c50c4028cff222bea22d0b41a3ce6e266f2f14b4b2f70e821bf76c182400381bcd00ecabde15f33023f33ad79c32ff72bfb0c10033c80218704e4c3257d130866d662e6b7210e06eff0e4220af80274741b3e662291b5e3163023b3374162ab3a2beee08f1b2c56c2e4fdc7356e4730d1b423d6bb31e4b8140ab00417f32ce6adc1346f31a78dda7a97343b3b4bb3d3450b542f38242019c733f5c744555725c61ec14e0309c0a8c29bc730b94ae1518b4ef21b41aa4f418ad744b33b5aa3d3444132a2526ffb5120cc0525370158b6b4657cdb050414f5b6e2ae0b10aa9c2a7ce6af7c2c302d4b4e99aaf5537755bff5d44e3b3236bc3546b6ef6fac44dab9656cb00644ef055eaf2cd1e674057aef00a00390b4c5fd32b02b3b55b33b6963d35044cf41a9f4200d0b5ae098048dff560d72c56d3c02f63761e8b561544360e7cf616c8f30354b42a268059ff16628feed42e7663cb36e9c1f53dd5366c118061fb6502d8355be07577aa6936efee360b6f4b9e4250b38070efc133db1901703482a4f36c4bb7cd3db6db32f31a240003e8761d3440694faf6657afd5066a6a5b713ffbc03fdfb12b6cb7775b010264f776e340016cec2c5476eac4f674e3777e576f03b4ff4a01304002b0b77eeb86009c8b7f2bc0730b78822b78d30440021038c8de99980540802ff84d188083330075086d03084000f47685837888874c8bb518858bb8591c0089b318829f788bbbf88bc3788ccbf88cd3788ddbf88de3788eebf88ef3788ffbf88f0379900bf9901379911bf9912379922bf9923379933bf9934379944bf9945379955bf9956379966bf9967379977bf9978379988bf9989379999bf999a3799aabf99ab3799bbbf99bc3799ccbf99cd3799ddbf99de3799eebf99ef3799ffbf99f037aa00bfaa0137aa11bfaa1237aa22bfaa2337aa33bfaa3437aa44bfaa4537aa55bfaa5637aa66bfaa6737aa77bfaa7837aa88bfaa8937aa99bfffaa9a37aaaabfaaab37aabbbfaabc37aaccbfaacd37aaddbfaade37aaeebfaaef37aaffbfaaf037bb00bfbb0137bb11bfbb1237bb22bfbb2337bb33bfbb3437bb44bfbb4537bb55bfbb5637bb66bfbb6737bb77bfbb7837bb88bfbb8937bb99bfbb9a37bbaabfbbab37bbbbbfbbbc37bbccbfbbcd37bbddbfbbde37bbeebfbbef37bbffbfbbf037cc00bfcc0137cc11bfcc1237cc22bfcc2337cc33bfcc3437cc44bfcc4537cc55bfcc5637cc66bfcc6737cc77bfcc7837cc88bfcc8937cc99bfcc9a3bc901cc068b2fc2e710102b43ccb7f3845c4bc680ef513ac7ccde7992b1880ce0f138b8f007ffb7c30bd45ce0f3dd19b82d01ffdd2f7929c28400000ff3ddc32bd2ff182d24ffdd5633d30457dcad7f869bb0c17b076120e022787d91778bd60b6c23356372c9c7d5aabf518f9b70070ecb3c9f56b2baddb73bd8883f40a9037103037f2b6c1b9b8760fecbd0af4bd2fea3581def62c147e0a1cbeddbb8e7ccf7de02f3e309a2fdee73d88c3f70328379a8ec620c4c3cc03c1e6777e35d33231d73d2e90be29d4777bf1364a57fe14b4bed2607ee62bf85999384178e11a604fe9e39d4ce4fe1e273ee50523806aed20cc7ef4d4be2746754217f3f2dbbe7e93fd4e15ee46c7b376f28c4c0c7e2d9ffef6a4be2d4c3f1c6cbfe5cfe1028c3f3a37ff19247fc6407ff4e3f7681741586f4e4ff6f1527e01fceb80fc8bff2f35bf3d083ce24896e603a5eacab6ee0bc7f24ccbcb89e73951f77e0bd00987c422b190f8295d412371098dc29aceaaf5ea0c48b7dcaef70b0e8bc7e4b2f98c4eabd7ecb6fb0d8fcbe7f4bafd0e3d608b83b261bf53570078d277a647a86378179058a22545e5888247873869b2482789d9e90460c0c69958e933ea894a0859cadaeafa0a1b2b3b4b5b6b7b8b9babbb0b9b904a124a36e0596089ca80e6fb2b126cd7d8b90a750ac82ba6bcdc3c37bdcc2d22b0b68da51bde5d7e125d9daebecedeeefe0e1f2f3f4f5f3fc3d0fd4d46808a30e7804a011a7cdcf439f3844e09392bf67a105c66509bb9892316642bb3b0ca388a1c73246c0832a4c891244bff9a3c893265ca61dc1694b986c9c19c06a80ea061b9cc2523845b323a51a902e72f9d9b3a4e1c90e48c4f231b8d3a15f111a8d4a954ab5abd8a35abd66a7fcaf91b830055c4374b8b143bd3b5dbd73acf3045ed51f609d0b4dcd6ca89fb144b03a59e9ae6edf876abe0c1840b1b3e8c38314801e66492b9d109c01c547bcf302ee7982dcf487d815eee96f9eedf723c3076c68577b42ac5ac5bbb7e0d3bb6ecd93e20772b3d86e6e9376d63a2b1cd0d379dde8e02d348ad432af065c2e320576da43998e738fc422f679cb6f6eddcbb7bff0efe55587367c7107774918d025468c6972b3f7c7314ea2780baef06dff9f5e064e89bb0bedf32d985476081061eff886082e1c1d44d7a5f08e58840703c3489646730c88d83bcc927cd6e2761884d5101fe925418fe9500e088a80ca8608b2ebe08638c32d6c3cf44128e41a123d2ad314827379651a3393fca71de6a9c75025490e50c49968abf68782426293ae9d68c565e8965965a6e590784dc5838068880e4b7c6259840f9204560ce5124202c4ee1a1495e2eb3261c2752594201767571e70853e299c89b5c0e4a68a1861e0a235de6ecf9859993309a86987b902986a25e69064d4f719264a95a1201da49655ff429c29fa0ee2128a2aaaeca6aabae6ef5d944a185d1a36f6ee886c98e61c4da18a6554639894abc62f6e9a993a0a9d0a6b3907a6aaaaf3e0b6db4d24eff5b0db343882a06ae938ca5c67289cc3a86b542601b479ba86a8a644ae2ea40ae1beb525927ba52e6f2ae93ce528b6fbefaeecbaf19f74d44a9170045f6463f67fc4b9eaf93dcbb02b32921fc5eb1c61637aab2b2d4ab22c3fd6ecc71c71e6f3c70473691c15e1be66241541921733432911c2ee1304a2b53d4729313575871baa8dd4cf1c73eff0c74d0f82a4911935fe49808b2620c4b08b762106d637c9902eb484a500b295a64006ccd75d75c7bcb91d235c4bcb3d65e9f8d76da6aafcd362842bf0d77dc725f592b47c890b19e8f6d204d88d85bd44dd1dd2e4f3d9fc520013e91e036cffb4300093400762aba26abf32d64cf8d79e69a6fce71a713f9ffe1c9e4c274a209199e9b23f5af8557ce695e59339e8700887b52faeab0db7239e7baefce7bef5ce6ed14b85fcc3e291b8e2622ba17c01b253c1b275fa1710ab98fb47c47cda7313d140acc69abbcc1d26bb8efe28f4f7ef9b261cc2e909e404a86a4589468da53ed9afc32e5b78f847e0ef3ab917d1eef263fb6f0bda27fe62ba0010f8840aafc25656198d9b7d6a02d47d48c647961a01b9e6785e84180800d59a07e58c785ab3922603fe0202c4c98c014aa70852c4c87034546068801c2698fe98405c5f042960d4e751d0261487248333b095009224cc4046136c456a0b0854c6ca2139f3893d1c02f0c91c342bccae089fd812182469922fd08d7c3fbff85848b1df122ff92e80304108f10d7830b1a4bb14428ca718e74ac6314d698b832308d1a69c060153448033c9a437117ac5f09dff80e41968390e040640dfc68051a9ac2917788a31d2f89c94cd2f17846a9dd174e8705bf6d618f7b4003273be2c93540d2081ab4e43b4ec99154a2c1953e28e21eae78481f2e8b929aeca52f7f39beea3d059030e01e168c2606beed81916210a6538809855516a195bc5487338d02cd5c8ab10bd2340b176889077002739ce42c27dc94d9114986b01300ec8231af804c30a09323ea3c433787404d5dda639e14a9677faa39832a96d27b55039f3ecd89d0842af463d7b9a117dc67051236ca1347144343cb65c8491e94ff1e177517406540ca3d5454a3dbbcd847178ad294aa544bf75c06fbb8004b2cbcf4a19d90a8175afa8b999a01a71e21282948c25383b5419c8f5c914f09612a71ac74a94c6daaa1c8f814337a41a056686317a0aa173460b58b7008ea398ecac7916cb58c1edde8168c4ab59f96ada44e6dab5bdf4a20aa72a49d50186b15fcb905b93ac1aa5dd0eb44e82a06af9a209f6c9d875fcd01d89c1516ace74a2b520dba58b84a76b294454c4c3b5906c19200975e90e11e740ad300c9d29e1975a359e17159549635b251e0a715a46a5ad6b282a895adad6d6f4b12881a45944a782743324bb00b8d88b75fd02c0908fb3d91e8b623c4fde6496310d22be03506b4ff15916c718bddec6a371eae4d6719ba6b84e6f620ba5588e7d14634dd30187704c82da848c0dbcfa13e1706e4bd2b6395bad6e46e77bffced6f3b7c6b84e51281b35cb8e631e377ac9b4c42c043203070c188c4d3be03c04560b0101c2c86eacea0be4e48ef0b34fc3afdfa77c4242e312c8c0b80d41a01b47960671928ec4dd23a22c59860b17a4b1b4009b703c52a2e828dbd00e218ac57047c95419085a863132b79c94c26835d8bf00d4516a1c85090728c2be5e2333c9908519e0495c130e407b457ad20d9f210baec882ff369be2f08f3981f9b5ff73679ce74ae33180e2b042dd8d20989fd819989f0631f587808b0fd029e75a0e749f4999b383e0eff9b6b71e89eee393aa278740b068dcffb5e21a99bb6b3a73f0d6a1a78f6b798c6814da500c42ba8b907937642a097306a8d40a0d4273875601b3d8323d722d63f99f5246cad5811efca13e26d98a52b9de4502b7bd923a6b5092cd46322147b06bceef018229d038782c1d92580f699bec8c3085f571ddcde6c0aa23d8469db4fd860e0305334fddb389399d9f4aeb7895bcd6515587908e685b71130ac846a1bc1c350c0f799f53d897edf1ac2eb96b33d0c2e0483ec5b080a0fb6c3c300f121009bbac76e64b2ed0df290bb15c6994e41c6730070ed7d7c0643ce663117a68293e320e5c5c5b5913b0e0b92e739e6383be3ca633b63e7febc0eba16b9d18fffee4b50ca3a05e52601e8bedd6e4c8cd60b4aef35d3c7cd0537fbdbeaf6a8fabbafceee7f0e9d069e203813708e3db4237ded6c67a2bb2fbc02740b61d53e9838c54d8409660e3be82a90bb0ee82e05ad3b36acf678bb0ed6e4f71c005edc616734c31b3eef5a14bded94afbc0ab17d82b1d85d7fea537418742e84424f755b2cd83c0eb4681e9b737cecb8c0bc09343f09d44f07ed7f96cbd6bf6e39b55b7ef7bcd79dc089800e99d7fa2598d8380dbc6e84917ee1f725e7f9089da77a38b1de16ccdff90a846f02e30f7ea06300bd10f4aecdc6c762f2bd2fbff93397eaa5ab20fd4e50fe16aa2f8457c7a0e9154103fb719f82fb17c1fd377e3c49c5ef0efffa677beb8709fc076438477f24207a39867595a47be7078111c831d857028c047f39507150e07a26b0782e408125207b5df0812360819890818e176e90076734320925987069377d2f607a3a207f67178348d68012a8833b183433680246b38124007e5c60783a607630108424d0813de0832500842da84ad1f7610f88074d48024fe80843687191d7054528048b368537b83800c8836568863f837cd2e602b5970353270569d8609d258630008742e0206c88036e5873fe077417170f75a8037738097a287439180380d87cb757049c166f67e8888fe833065605a9248089f87986c802eba5855d20894e408929480682673b64b80e9d68049f08737c3187ff106000de077707b88ac8868990488bb5482877a27717787adf0575a36482b304852ea08b27108237258536388b92178c2d308c26508c8a38805cd08a68b566b1e871c9688bd9a88d30d28c4e888493a06d5c90800f7082ab274107f38b2f908422108e60768c40408575d08d57f88d8ed08ed5888d29b03da840738e668d3e978fdb289003191e9568873080873860802de6795ce08ac377060619880859807df48e2c407ead20913900250979020bb97df81578eba26ef0f88f3088096da3922bc936cf48902f09930de19125305a1b89030b1805ebf800dae70288880360e86783180336790238997517696c27590933490235890946398a7ed803089000ffef7284e6488a4ac433ff16935de995246185241803f328964e56635b608a46b08435109622308464e99616c9870c9895d5d0960ff09679a78ad715007da90090d30df7a88284873b5b5904fdf89589a998b7907838d06f3a49884b40941cb80523380235e8038d79028f299468208a615497bba0993f68039d896086e98920f97f526952a8f98a8b099bb1c90b695904c8c294c08045a427057789984b409b6a1803b739022549039fc978acc90ebf996e32209ccc6006f9331a03409cc8189a95009d1dd19bb2a99ddb2907f025046e389925709534e09d87270570498e03619a30109e24309e3d609c83c97df2509e6d3803ed3902ef996bae798ad3499dffc87942fc699edc49a0055a0a7a2903e829982a579d2c809fce7906083a9698b0a08187942a909107ba8c30a0a0cf29a043209da709a003f4a13367a0278aa271f0a0e9b99f8f4206a35902d3e68585607fe978732eba53172a3df128072b5a717d8299fe58a2b5e69f611890ab35a423909d29caa44d1a9493b090335a94657097e588910d6906cdf90051fa9432068aabc985eda0a55cba60229aa47819a47439a2ae709d1cb1a44e0aa771ea0277096ceb05943460990f70a75d7a06745a54581a8a3aba413c1a077e5a9cb962a6253a00560a9a6baa9567aaa4722aa993fa03304a028025752af36b50e0932790a63460a92380a9eb997a7329a40d6a0bffa12a02a3ea0891299fae49009fda8761da9a90fa006f4aa9b97aa2e308957d52a42c809e35a89c3a50a151c0abb3ba07bfda02f1197e8eaa0bc7aaa680a0ac187aa604a09af888aa76d0a66aa2abddeaad29509f39a09a524a9a62f74044147bea09a5e365a3a5faa5c84a98ee10ae0ac9ae2f182e67ba000d30add277a4f265abb7faad014ba90f997d3eb05eb82a03c39a034778972ef702049b27069b92396aaa2ddaafa500b124607c076bae675a000a20ab169bad44f7af002bb027eba476fa039d10b23dd9736944aaee8a3c2b7b96815ab1377ab178a0b23ec0b2f75ab20320002d6ba4236b5d908ab0288bb402a9a550b9a35ef6620dfaa09bc805ff4bdbac80b0964226a8196a07540ba67b70b5ff69ab8b9aa8f14a0bdb3a11479bb4695b8b3ab9a53f40ae2570a73390a7c4f5b623c0b41a58913e50b7a2fa60ef1aad2be80e6c7bad10b0b7abeab3255b1183fbb764bb4bff8ab66a0bb966a8aa3ba904ebc5933d9080567a278a5ba9c557b99e6bb37e7baaceca98a02bb19b9a61884b935f7ba54ab997461bb9b1ab98e308869dc0b9a206a864f77cc295bb3560bba19b8a5149abd540bb4bf0bb78a7ba2570b7224bbad659b28f2bbbd16b7e79fa00cb3ba8f67a6dbb5b039d0a826840bdd6db278cfaa7a2cbbcc3cb0bdf7b9c8020be389bbc763b7baeeba18e2bbdf34b90194b029cabb03920b55050b8ff3f96bf27c0ba3160bf2380bf12da7fe4cbbecd5b0b032c0205bca1b0d8be0ab88580ab8cf24bbf176c8bdc1bb14ba0c12802bc56cb6a44bbbda6fb031dec7432db33c24bc1ea60c22270b9ac188b66ab1afea9b5c068c1188cc38e58b80fe0922dc0c00f10c03eec08e9d596fb2b053bdcc32cf0c341ac02ccdab58c5b0d481c054b8cbc11acb1215bc3af7ba6d09bc35d5c6f6cdb81f34a8cbc980829a7aaeb5b1bdda30462ec8c281c28d03804f000c6ad8509495cbe4d230079acc77bccc77d4c005c530e760cb62bdcb829c992878cc80020c85eccc821879e0f10a4ff0b916192950fbaaf2bf0c8914cc27b88c058a9c0b290c95120c905fbbe016900ff0a70975f05c742c088ead7c8af0ca7e358ac2dd0c20dfca2093603c2f9c28246a16f78bcee78b39e6cbeb920cbbe9cb7102cc22e1000a96c6eab9c1c9095ccb02ccd2f49bd8b1c147c3a066df9a33ae2bd75bc053f6cbd32e0c4f03a9feb50cddf8ccdd8fac934a0a5121c929d266f843ccdf3ac9da9bc966c5c8165209cede4b47daac64b80cf42b8709dccafd15c0af6bc05015d96c8bcce34308e23b0cb4d9bb30069d0f46cd18f58cb908c96994a06f8796ac625b42f90d19f3aca3439d0c1dba8c37c0b23bdd131fbce8d982dd498bef23c7e847ad1375d79254d02b3ecb204ad04380a033afd003cad0442cd8ed218ccf099b5369d06463dd448edd3ff09acd22f5d05463cc8505cd3f08bd35b5d797d62cd2bf0c35f2d030a6d550aad9fa30b08629d02617dc0283dd3580dcd84a0d610c0d60c3dd55190d12210a4591cbf13cdd57f4d798ffcb50a7dd47833c432d09697ac0282dd0584fdd4c01cd526e9d770c0d85ce0d8443db40d1dc27a93d2341da05a0dd8a10d722baad105d6b36360c20416aaae0a05a41db24e5ddac698d4997dd7b3e0da9c78da8558d13030b922f0a67c3db6e52cdac3fd88d48bd9b4dc09e11c48c8899f715b03c64d75c90dd96efdaaf0ac0ed0dd0519addcad3bd92ac0b67addd9704da2a04ddce5fd69a93c0089ac3659360696d9918eb0dd6c2975ea9d36ec8d82d45db59e7d0bffe84ddf6863df54cd756500db401cdec25db64c6dde09ae6479ed24aced03f8194f2772bb3dc0e02ae2e0583bdb576de0ba50e12372e11a2e9265d0db3c5ce0215ec1ddade029de64034e25974c9693638f68c0e24e52a4e3bcb81b9e0b33ae22d309dc10c0cc4bdae387bbdb2a4ee475e6d88072d6058d0501a359733dd6569ce42960e368addfb570e47892e43d7ee5256edd8549de450ee6db65c58f3d067b0b2942edb02e30e6c7bdac4bfde568b0e6ea5cdb474c516f8de3598de261aee7d945daa012d22b60c2c213d01ffee0631edb5b30e5772cdeb4d0e78022ab3d9ee820dee5273ee47b6ee9fbd5cea0c2c4609d084e1396565d5786ceba912eccff553e0b990e28570be99e00be086ed7a67ee9b1de64cc0c2ace1d0323182fa18ac64c68e8b62ee56e9ee76a40eb8062eb3dfec80f7084419eba6f2eebcdbe52230e2a112d03f4d702f839e13500ed8022ed4d0cec950e07d98e27db1ee46567e7267ee0cceeece9ae503a8e27971caa17719bdb3e03ecdee2f79dc25c0ed3ba40ef34eecc39b006e45eddf97eeec1aeee05af50577e2abb5e9a84302449e8e43180f0a0a2f0bf9ee192eded6f10f180a2f0e3fedf376eee857cf1062ff228f5c313c3c52c709bcd91660a66e8268be8ddaed97850f2c682b01c3fb101efca941ef323cff34b156613f3e7dc4e08f0a1599ed9f297799415cfdd210f7d477fe8ff381fe066e009d9a9ec55ccf43d8ff5be84eac6b2e9d74c086b51b727bf864e4fe02faff44949f0594af64b68f30fecf1933ef0579ff5737f49df7d330fdf02019d19013df10145f66a4dea4a3ee7ad60f713f3d56d7fd8508f7f3a3ff874eff80805eea722ef2fa0d30661bf8a7d6e644fb9661fd94bbff3c640f6118df89d5eee700ff29ffff8a98f490fbd95d71e0396ea6d439f0c9adfb6167af6d48aee61c0fa3c33e1abde09c9eeea720eebaa4ffcc094f1c6d2f732f8534de7eb4faef90a1ff8b43dfcad70fc09afc28bde057d0efcb92ffcd85ffcdfdf4b33cf33a0ee03b7190ab719df3420fe3743fe9908f38d5f09eb3f31ed2fd1729f023b4c64ffa52ff0a70fff20008923599a279aaa2bdbba2f1ccb335ddb379eeb3bdffb3f30281c128bc62332a95c329b4ea6e1219d52abd62b36abdd72bbd4a0c3ab4d4000e22c62183db3dbeef7d7168063033733ddfac4adf3fe3f5c0d1ee083d120a09dcce1df9e20a15463a4e42465a5e52566a6e62667a7e72768a8e892c0a3e9695d905f0384df025129aa2c6a22cddc632dcda2dfe848ec2c30a2aea9d1e9c1cc6e5e6f325daff33374b4f43475b5f53576b6f676c942f0f76a10b318401f9c009137f8ba1b6bcd2d612e32b1b33afbbd97bb22fd50187fccb837cbfe712b68f020c2840a17326ce8f0612804f82676790544819f047e0c0c9148f123168bb64cffc9dbf7c89947902aa7880448100801532d61047433f024c49c3a77f2ece9f327d0a042816824540000d2a44a97326dea34a9a9633fccbd2990670091a2808e3eedead569d47724efbcfca4f50fd7af6abf86354988c881530c86e11455b3cdd0bc7af7f2edebf72fe0c03d62125270e4ee193240acaa9c3b843020c3861e299e014f980dc4679c41fe23b988662f9569961d7c0addbcbaa1427b11ecfa35ecd8b267d3ae6d69c0238e467efd71fca333c5d1407013d25d84b71fdf322eff29e9527528e2808cc37aa4fc05eb2e439863760be8e65bdbe2c7932f6ffe3c7aa154af22e14e072bd1955283ac7fdffe117ccb633397e6541f4e7e45b807606ae1ff01810063fdb1901d17e07d971e84114a382185155aa80472795c47c47e3ea444d14c3f6448c786437418c3807038471a749f8c084789429ce802835b0481803d8f00e0488b9ed4a8c585410a392491451a39de8f587c361921a8fd90233efa88f3c892a03de2248a337ac7c828495e5125115e5a81258d0ada80a32c606267662662ea71249c71ca39279d7556f3e11fd41df748883bbc08ce8a3be0b951127fbad1670b29be1168993d7232681e7a564708a22ab859c50f0148670c8f06aec6a69da18a3a2aa9a59a1a833f80046884a26ea431154844a4fac7aa029af26a96b890e5e826b3fa512b11adb6816ba39ee610c0a55954da42b25338c8e5a9d1ff4a3b2db5d516099c864b98221c0f9bb213230fd892a82d65fae9ca1faf9a880b23b98470bb42b3901cdb4082b3bcbb66ba9ac45b88b5fdfafb2fc001f755af1f6a86f9080141304091c13c109c47c342c49bf0725a3ed7a400196bbc31c71d7bfc31c820b7f0301d114f4908c5f8621cf2c7042445b22c0310bba51f2cdb7c33ce1c170b48ce3dfbcc32a3020b3d34d1451b6dc27f7048ba2721c0ea70163bf30191f41b4b4faaaab9f1ecba52302c50ed86d54318da86d329eccbf51929d385f62c3bb30d0c9947cb3d37dd75978a91514c08cb46d837c4854f0144e0bd95dea6f48dc2de6704bde0db6daf30385a85e7c662e3516f5d79be239c8d391571ffdbfd39e8a18b0ee1c44d98e2b90e507ea33610a533717ac5e776caf98396226cfa9594d33e0beb05eece0bb3bf9f363af1c51b7f7c60db3611ef8e4034808f031c96cb04f3b16b8daef0caaca03cf53aea9e7dd333fb0ebe4dc193ff07eac8abbf3efbed6be3ab1f52177a2b108913227e0ff0e7213f12630f9bebf566773e36ac407f74e0df11fcc706fca16073d94bdff7062806b749b00d10741f0633a8c10d5ae279796b82fdbc103d20dca37942f020e140688a11be20845d581cbc2a881715a030722a7c040b1927433a2c2b823b0492f97ec8860b72b088463c22127b00b337f42e09a668a20e16b60e93e560896e80e2119e08c0eeac4d88365281ff15db80c562dc8e825ee4c2000ea7b23366c18c6cc402119328c739d2b18e22f89bbb9e20c514fe0072c150a3dfb8d7843ddab08516f3e11b9d95023c02e25e4720a41f02e7c6445ac19134a3a4bc7488c92cc4d18e9efc242891e7c7f83d6194910202238151b61d98f280a5341c0c5cc80518da6e93984a412be1804024e4b26a93b4e5182f89c95f6eb293a13c263293593448e641924ef85a1ba85883300222983960261d9cd90468b2419a2390e5166869365bde1205d8848336a1600a6f3a9073d6bc1839f9a5c978764e99f6bc273e87a6c53d782b5b3001872575b0cf27f4735c86945d17c9a982813aa1a0ec0a223d1fb000060ad096c4c4a431f3ffa9d18d727448e01c4323ce19082018907e42f86816026a04910ae4a0014ca84511274827b0b47cf38c2703285ad14d5e949219ed2850832ad4f1d4f00fbb4c422fdd90431e404a2644282a29f790d4362c5505284d05f6e29902a8eeaf11536543554fd0ceb7bd737c31bd69447f3ad4b5b2b5ad7c515d3623c1cd3348a907637d805a65005774cad51475b5ea21d7a85014ecb52a7d7dc45fc51a516f9a95a7108d285edd2ad9c952962fa9f443598be050c35e2418e2a4c165f39059226cd60de9042c421b3bcc1384960ea31d4269db705ac592b30080dce96ad14acfbc56b6b7befd2d35a0961149d4b40d47bdc15cdfb0caa7cd548f6d61c155aff059ffdad21305c2cd834a1ff9dc71dab2013acdc15dd1d6d344f216b8e63d2f7a35515c361c17a9eb0c426c0d2a84f59ea1bdbc7c6fa2023b5e219a73bbafa4926ebd0880e9c2d4b101266779d3abe005335809f13dc36cb7690a70e1605d7fc8ee0d1e2c8608abd33a2e88ae15085c82f0720d051af6028797905c2f50580424664701300c5ec8ee978d096e308e73ac631c80b80aaf252d7e82705d40d8f7063da6c28f611be4fca65698943cc191a79064219cb80bcb2dc31b01105689d1f8b169dd3198c32c661f28303194a0af1844dc82a646f26a8d3cb37ebf19e70327f2046516838c571ae717cfa2000d28b20ff81c2b2fef76cc863e34a25d50d83700fffa085fa56b10160d87c4f640d2c6a5c4a3c540e91244590a6ad65c97bbe15fa9fa3586325c40036edbba509b1ab252b871a2632debdeb299b3935871458270e7336c5950a648718729c5e497aaf6c925a8b5692b816b2ef450d07e00400312d0682e47b4c66784f5acb3ad6da10e190e5356f223a61d4b546485a192a87217ecdbe9077cdac5ac1641b799789b5193c0d91b464ac602a0eac3bc9bbbae8eecb6032ef08113bce0063f38c213aef08533bce10e7f38c4232ef18953bce216bf38c633aef18d73bce31eff38c8432ef29193bce4263f39ca53aef295b3bce52e7f39cc632ef399d3bce636bf39ce73aef39df3bce73eff39d0832ef4a113bde8ff463f3ad293aef4a533bde94e7f3ad4a32ef5a953bdea56bf3ad6b3aef5ad73bdeb5eff3ad8c32ef6b193bdec663f3bdad3aef6b5b3bded6e7f3bdce32ef7b9d3bdee76bf3bdef3aef7bdf3bdef7eff3be0032ff8c113bef0863f3ce213aff8c533bef18e7f3ce4232ff9c953bef296bf3ce633aff9cd73bef39eff3ce8432ffad193bef4a63f3dea53affad5b3bef5ae7f3dec632ffbd9d3bef6b6bf3dee73affbddf3bef7beff3df0832ffce113bff8c63f3ef293affce533bff9ce7f3ef4a32ffde953bffad6bf3ef6b3affded73bffbdeff3ef8c32ffef193bffce63f3ffad3affef5b3bffdee7f3ffce32ffff9d3bffef6bf3ffef3affffdf3bffffeffff3f0006a0000e200116a0011e200226a0022e200336a0033e200446a0044e200556a0055e200666a0066e200776a0077e200886a0088e200996a0099e200aa6a00aae200bb6a00bbe200cc6a00cce200dd6a00dde200ee6a00eee200ff6a00ffe201006a1100e211116a1111e211226a1122e211336a1133e211446a1144e211556a1155e211666a1166e211776a1177e211886a1188e211996a1199e211aa6a11aae211bb6a11bbe211cc6a11cce211dd6a11dde211ee6a11eee211ff6a11ffe212006a2200e222116a2211e222226a2222e222336a2233e222446a2244e222556a2255e222666a2266e222776a2277e222886a2288e222996a2299e222aa6ffa22aae222bb6a22bbe222cc6a22cce222dd6a22dde222ee6a22eee222ff6a22ffe223006a3300e233116a3311e233226a3322e233336a3333e233446a3344e233556a3355e233666a3366e233776a3377e233886a3388e233996a3399e233aa6a33aae233bb6a33bbe233cc6a33cce233dd6a33dde233ee6a33eee233ff6a33ffe234006a4400e244116a4411e244226a4422e244336a4433e244446a4444e244556a4455e244666a4466e244776a4477e244886a4488e244996a4499e244aa6a44aae244bb6a44bbe244cc6a44cce244dd6a44dde244ee6a44eee244ff6a44ffe245006a5500e255116a5511e255226a5522e255336a5533e255446a5544eff255556a5555e255666a5566e255776a5577e255886a5588e255996a5599e255aa6a55aae255bb6a55bbe255cc6a55cce255dd6a55dde255ee6a55eee255ff6a55ffe256006a6600e266116a6611e266226a6622e266336a6633e266446a6644e266556a6655e266666a6666e266776a6677e266886a6688e266996a6699e266aa6a66aae266bb6a66bbe266cc6a66cce266dd6a66dde266ee6a66eee266ff6a66ffe267006a7700e277116a7711e277226a7722e277336a7733e277446a7744e277556a7755e277666a7766e277776a7777e277886a7788e277996a7799e277aa6a77aae277bb6a77bbe277cc6a77cce277dd6a77dde277ee6a77eee277ff6ffa77ffe278006a8800e288116a8811e288226a8822e288336a8833e288446a8844e288556a8855e288666a8866e288776a8877e288886a8888e288996a8899e288aa6a88aae288bb6a88bbe288cc6a88cce288dd6a88dde288ee6a88eee288ff6a88ffe289006a9900e299116a9911e299226a9922e299336a9933e299446a9944e299556a9955e299666a9966e299776a9977e299886a9988e299996a9999e299aa6a99aae299bb6a99bbe299cc6a99cce299dd6a99dde299ee6a99eee299ff6a99ffe29a006aaa00e2aa116aaa11e2aa226aaa22e2aa336aaa33e2aa446aaa44e2aa556aaa55e2aa666aaa66e2aa776aaa77e2aa886aaa88e2aa996aaa99eff2aaaa6aaaaae2aabb6aaabbe2aacc6aaacce2aadd6aaadde2aaee6aaaeee2aaff6aaaffe2ab006abb00e2bb116abb11e2bb226abb22e2bb336abb33e2bb446abb44e2bb556abb55e2bb666abb66e2bb776abb77e2bb886abb88e2bb996abb99e2bbaa6abbaae2bbbb6abbbbe2bbcc6abbcce2bbdd6abbdde2bbee6abbeee2bbff6abbffe2bc006acc00e2cc116acc11e2cc226acc22e2cc336acc33e2cc446acc44e2cc556acc55e2cc666acc66e2cc776acc77e2cc886acc88e2cc996acc99e2ccaa6accaae2ccbb6accbbe2cccc6acccce2ccdd6accdde2ccee6acceee2ccff6accffe2cd006add00e2dd116add11e2dd226add22e2dd336add33e2dd446ffadd44e2dd556add55e2dd666add66e2dd776add77e2dd886add88e2dd996add99e2ddaa6addaae2ddbb6addbbe2ddcc6addcce2dddd6adddde2ddee6addeee2ddff6addffe2de006aee00e2ee116aee11e2ee226aee22e2ee336aee33e2ee446aee44e2ee556aee55e2ee666aee66e2ee776aee77e2ee886aee88e2ee996aee99e2eeaa6aeeaae2eebb6aeebbe2eecc6aeecce2eedd6aeedde2eeee6aeeeee2eeff6aeeffe2ef006aff00e2ff116aff11e2ff226aff22e2ff336aff33e2ff446aff44e2ff556aff55e2ff666aff66e2ff776aff77e2ff886aff88e2ff996aff99e2ffaa6affaae2ffbb6affbbe2ffcc6affcce2ffdd6affdde2ffee6affeeeff2ffff6affffe2f0007b0000f300117b0011f300227b0022f300337b0033f300447b0044f300557b0055f300667b0066f300777b0077f300887b0088f300997b0099f300aa7b00aaf300bb7b00bbf300cc7b00ccf300dd7b00ddf300ee7b00eef300ff7b00fff301007b1100f311117b1111f311227b1122f311337b1133f311447b1144f311557b1155f311667b1166f311777b1177f311887b1188f311997b1199f311aa7b11aaf311bb7b11bbf311cc7b11ccf311dd7b11ddf311ee7b11eef311ff7b11fff312007b2200f322117b2211f322227b2222f322337b2233f322447b2244f322557b2255f322667b2266f322777b2277f322887b2288f3229979fb2299f322aa7b22aaf322bb7b22bbf322cc7b22ccf322dd7b22ddf322ee7b22eef322ff7b22fff323007b3300f333117b3311f333227b3322f333337b3333f333447b3344f333557b3355f333667b3366f333777b3377f333887b3388f333997b3399f333aa7b33aaf333bb7b33bbf333cc7b33ccf333dd7b33ddf333ee7b33eef333ff7b33fff334007b4400f344117b4411f344227b4422f34433f6a0800003b, 4500.00, 1, NULL, NULL, '0', NULL);
INSERT INTO `wl_orders_products` (`orders_products_id`, `order_id`, `products_id`, `product_name`, `product_code`, `product_image`, `product_price`, `quantity`, `product_attributes`, `store`, `product_type`, `shipping_charge`) VALUES
(8, 4, 1, 'ASUS ZenWatch', '01', 0x474946383961d007d007c400003f3f3fbfbfbf7f7f7f0f0f0f5f5f5f1f1f1fcfcfcfdfdfdfefefef9f9f9f8f8f8f2f2f2f4f4f4f6f6f6fafafaf000000ffffff00000000000000000000000000000000000000000000000000000000000000000000000000000000000000000021f90400000000002c00000000d007d0070005ff20248e64699e68aaae6cebbe702ccf746ddf78aeef7cefffc0a070482c1a8fc8a472c96c3a9fd0a8744aad5aafd8ac76cbed7abfe0b0784c2e9bcfe8b47acd6ebbdff0b87c4eafdbeff8bc7ecfeffbff808182838485868788898a8b8c8d8e8f909192939495969798999a9b9c9d9e9fa0a1a2a3a4a5a6a7a8a9aaabacadaeafb0b1b2b3b4b5b6b7b8b9babbbcbdbebfc0c1c2c3c4c5c6c7c8c9cacbcccdcecfd0d1d2d3d4d5d6d7d8d9dadbdcdddedfe0e1e2e3e4e5e6e7e8e9eaebecedeeeff0f1f2f3f4f5f6f7f8f9fafbfcfdfeff00030a1c48b0a0c18308132a5cc8b0a1c38710234a9c48b1a2c58b18336adcc8b1a3c78f20438a1c49b2a4c9932853ffaa5cc9b2a5cb973063ca9c49b3a6cd9b3873eadcc9b3a7cf9f40830a1d4ab4a8d1a348932a5dcab4a9d3a750a34a9d4ab5aad5ab58b36addcab5abd7af60c38a1d4bb6acd9b368d3aa5dcbb6addbb770e3ca9d4bb7aeddbb78f3eaddcbb7afdfbf80030b1e4cb8b0e1c388132b5eccb8b1e3c790234b9e4cb9b2e5cb98336bdeccb9b3e7cfa0438b1e4dbab4e9d3a853ab5ecdbab5ebd7b063cb9e4dbbb6eddbb873ebdecdbbb7efdfc0830b1f4ebcb8f1e3c8932b5fcebcb9f3e7d0a34b9f4ebdbaf5ebd8b36bdfcebdbbf7efe0c38b1f4fbebcf9f3e8d3ab5fcfbebdfbf7f0e3cb9f4fbfbefdfbf8f3ebdfcfbfbfffff000628e080041668e0810826a8e0ff820c36e8e083104628e184145668e1851866a8e1861c76e8e187208628e288249668e28928a6a8e28a2cb6e8e28b30c628e38c34d668e38d38e6a8e38e3cf6e8e38f400629e490441669e4914826a9e4924c36e9e493504629e594545669e5955866a9e5965c76e9e597608629e698649669e69968a6a9e69a6cb6e9e69b70c629e79c74d669e79d78e6a9e79e7cf6e9e79f80062ae8a084166ae8a18826aae8a28c36eae8a390462ae9a494566ae9a59866aae9a69c76eae9a7a0862aeaa8a4966aeaa9a8a6aaeaaaacb6eaeaabb0c62aebacb4d66aebadb8e6aaebaebcf6eaebafc0062becb0c4166becb1c826abecb2cc36ebecb3d0462bedb4d4566bedffb5d866abedb6dc76ebedb7e0862beeb8e4966beeb9e8a6abeebaecb6ebeebbf0c62befbcf4d66befbdf8e6abefbefcf6ebefbf00072cf0c004176cf0c10827acf0c20c37ecf0c310472cf1c414576cf1c51867acf1c61c77ecf1c720872cf2c824976cf2c928a7acf2ca2cb7ecf2cb30c72cf3cc34d76cf3cd38e7acf3ce3cf7ecf3cf40072df4d044176df4d14827adf4d24c37edf4d350472df5d454576df5d55867adf5d65c77edf5d760872df6d864976df6d968a7adf6da6cb7edf6db70c72df7dc74d76df7dd78e7adf7de7cf7edf7df80072ef8e084176ef8e18827aef8e28c37eef8e390472ef9e494576ef9e59867aef9e69c77eef9e7a0872efaffe8a4976efae9a8a7aefaeaacb7eefaebb0c72efbecb4d76efbedb8e7aefbeebcf7eefbefc0072ffcf0c4176ffcf1c827affcf2cc37effcf3d0472ffdf4d4576ffdf5d867affdf6dc77effdf7e0872ffef8e4976ffef9e8a7affefaecb7effefbf0c72ffffcf4d76ffffdf8e7affffefcf7efffff000ca0000748c0021af080084ca00217c8c0063af081108ca0042748c10a5af08218cca00637c8c10e7af083200ca1084748c2129af084284ca10a57c8c216baf085308ca10c6748c31adaf08638cca10e77c8c31efaf087400ca2108748c4221af188484ca21297c8c4263af189508ca214a748c52a5af18a58cca216b7c8c52e7af18b600ca318c748c6ff329af18c684ca31ad7c8c636baf18d708ca31ce748c73adaf18e78cca31ef7c8c73efaf18f800ca4200749c8421af290884ca42217c9c8463af291908ca4242749c94a5af29298cca42637c9c94e7af293a00ca5284749ca529af294a84ca52a57c9ca56baf295b08ca52c6749cb5adaf296b8cca52e77c9cb5efaf297c00ca6308749cc621af398c84ca63297c9cc663af399d08ca634a749cd6a5af39ad8cca636b7c9cd6e7af39be00ca738c749ce729af39ce84ca73ad7c9ce76baf39df08ca73ce749cf7adaf39ef8cca73ef7c9cf7efaf39f000da840074ad0821af4a0084da84217cad0863af4a1108da844274ad18a5af4a218cda84637cad18e7afff4a3200da948474ad2929af4a4284da94a57cad296baf4a5308da94c674ad39adaf4a638cda94e77cad39efaf4a7400daa50874ad4a21af5a8484daa5297cad4a63af5a9508daa54a74ad5aa5af5aa58cdaa56b7cad5ae7af5ab600dab58c74ad6b29af5ac684dab5ad7cad6b6baf5ad708dab5ce74ad7badaf5ae78cdab5ef7cad7befaf5af800dac60074bd8c21af6b0884dac6217cbd8c63af6b1908dac64274bd9ca5af6b298cdac6637cbd9ce7af6b3a00dad68474bdad29af6b4a84dad6a57cbdad6baf6b5b08dad6c674bdbdadaf6b6b8cdad6e77cbdbdefaf6b7c00dae70874bdce21af7b8c84dae7297cbdce63af7b9d08dae74a74bddea5af7baffd8cdae76b7cbddee7af7bbe00daf78c74bdef29af7bce84daf7ad7cbdef6baf7bdf08daf7ce74bdffadaf7bef8cdaf7ef7cbdffefaf7bf000eb080074ce0021bf8c0084eb08217cce0063bf8c1108eb084274ce10a5bf8c218ceb08637cce10e7bf8c3200eb188474ce2129bf8c4284eb18a57cce216bbf8c5308eb18c674ce31adbf8c638ceb18e77cce31efbf8c7400eb290874ce4221bf9c8484eb29297cce4263bf9c9508eb294a74ce52a5bf9ca58ceb296b7cce52e7bf9cb600eb398c74ce6329bf9cc684eb39ad7cce636bbf9cd708eb39ce74ce73adbf9ce78ceb39ef7cce73efbf9cf800eb4a0074de8421bfad0884eb4a217cde8463bfad1908effb4a4274de94a5bfad298ceb4a637cde94e7bfad3a00eb5a8474dea529bfad4a84eb5aa57cdea56bbfad5b08eb5ac674deb5adbfad6b8ceb5ae77cdeb5efbfad7c00eb6b0874dec621bfbd8c84eb6b297cdec663bfbd9d08eb6b4a74ded6a5bfbdad8ceb6b6b7cded6e7bfbdbe00eb7b8c74dee729bfbdce84eb7bad7cdee76bbfbddf08eb7bce74def7adbfbdef8ceb7bef7cdef7efbfbdf000fb8c0074ef0821bfce0084fb8c217cef0863bfce1108fb8c4274ef18a5bfce218cfb8c637cef18e7bfce3200fb9c8474ef2929bfce4284fb9ca572e9c033840000d0000001e40f39adb9ce60b00000304908000c0c8000910000100b0809b1b9de632dfb902ff028000d5064000333fbad4a7fe80053420014d2f11021cd080a253fdeb371f000004e080acd733e6324fbbdad7cef6b603c0004d4880dbe74e7799830101096000d8f73ef5050800ee993040dd07cf76c00341f0844f3cdd0d2f05c42bfef16b4fc0180e00f9c4f7e1000af03adf377f73ab335e0b68afbce8474f7ab77ffe8a51e7fcd709d00401a81eec5e7080de5f4f7b9c2bc0ec940840eda7eef320e87ef79c1740151400fce08f81f8c53f7aefef8080cc27fff50568c001b690fae75bfffacae762f5ad3ffd25b81efb5b4080000a807dd513a0fb93f8fdf597ff03f597dfe800a8c2ecdf6f74e18b61fed86fc01d0e408001d09ff300207958b07dffff5780afc77e584480c9c77ade577e59207efe67807cc700e80709eef77c08d80317688055108112f800f617061e887d0b5007fcf7819c57000258050a88822e68741968452d587c157804df777d58a00023f88254777e91b081c517833b0084ff27844b60002f18825f4084cf57836d80000dc0832968844c308352e88254284556b87b0c980437687d5660009a77855f37000a6081e5978537c084efa7844f807c28e8865d1085ffb7826e90003b48865fc700b8f7045ba88705a88650f487b5d78745f085cf570588088854b700a787086c487b82580391887df12705f8278172c80563587e5dc8060840888c587303e00052208aa3b87edaf77f9b3804ff8b587c5370009d988a53370076980895a87a934803b9888352908705d88a5970000638006ee000c0488b53f7894d808aca1884ab487f036088aee88051808ccfc87704408d84d08b9bb78b33e08d18180548988461900012f88865f08ad9d877dc7804ced88e92188df4278c40c08ebb170570288f5fb700ef1808e2b877e0280301597cf67804e8688e6090896da80608c090fce88e4e108f11f98df4f87ed38804f8587b50400015b97705a08e009986425090c077894fe0910af905c9787d25880608308b1f297505e084f0389324b94514697c36688d4da0923849750320927f6092543790316094f90805e4b7925d508e12f88f5d109341b977fe5885ff55697d48a9443bb979c6d893e0f79359598644d9074a29755bf90267497b654904c4c88307a98828688a65409563d98f5209045d799735979648b4977c778b42b091b427967c598b6da9076b098325298567e80409e9949c8882cc787732799836c7004b00987ce99747c49960570060e98b4ab08f98697419d98d3909048ba97a9ae90440e98271390508e082a24906a019918f8904b999959e6944bd497582798f3e89040e709a78a99ad8f79b2bd09a9cf7954dd09492a90591f98189690574889c54779d3b109c41c99c44e49d34690484f97a4a60002da99d0f50997ee09c7dd99852c89d3ef09670f905b12981bbf905d5a99e47f79237c99f7c079eff43249e52379c3e509eaa97047609a047979f45b99aed77850e8a04fb19872cf98228e90507909e003a9bddc9a002799105e89f83599c45909d201a76f22907ee4973028a022d3a8186599f4f2985794905041a9136a99729fa752f1a44399a7dd518964610a31549a2ed09a13e60a460079d4a209dd38905088a7d74d905a6d9a336c79e3c8aa56829a20598a1c449a444800050caa535e7a17310a33f6a024c0a762baa03f449a35c10a453a77f5db0a1667a743bea0374ca8f6bfa437d7a737f5a0253ba79a3898205c07697f97f03b0a777a0a6f0e9984b50a116ca05b52985b7c905f7f98139c7763ca8a57c9aa78ca993183aa4a43904782a8100b074ff2a007410f97eaf99a4cb19a99fba049b5aa95b709c57e8a88de7820c900044e9720d50a6f4c7ab3a10a8ed38a83d84ac36a7ac2250a87c6704b77a7d032000c64a027847ac4aaa98dbca036dfa75998a04dafa81680a9b6438a15610a805707b316000d36a7d763a04e2597af49a786fca95b51a04d0ba774510a76d78a328a0835ffaa0b3ea7b7a78ad3ce0af516a05e32a81b18a0550298de56a0207f0aac9e7a441209e98c4ac3687b033b0afb04704ef5a7c218903a11888b2aa8a064b86061a04948aab5910b152b805235b7c0be0b12a808def57a5196ba293c4b13507aa3800b25f37a6ff77953a50b3bbf7b0dc5ab0aca98742fb034acb8a5c70a5ff2fc8b355a0b0d717b5edcaa1b4c7b43fa0b19704b43587b33040b4544704689b9c3c30b5b467b66c00a92b7b85e15a040dab89730a88f16a056bbb7a3e809eef4704626b49644b735c4b037d7b744470b7b587b43de0b6aab7b77920b74f7bb047a0b5b2c9058c88a454c0b8b577b8e1b8b3f2eab39254b83407b72d90b8463704ba8a7d4319048bba7b188b07941ba17ad8b23ed0ba5738b14aa0bb6488ba4420b3d6c7b93ca0ba3727b9a12aa69464ba20f803c66b734300b99b87ae3b90aa54ca07b5bba48008ba3980a252c8bb49e0bd5788bb4d20be170bbc2fe0b99c47bc3c30b895c4bca959bca4cb035eab7aeccb03565b7cdcdb06d9ab818058b7ff4210bb78ab05ea6b80601b0505cc9342f0b2bb07b034e0becbab87e0bb02cf5b7342e0bbe3b8b8e537bb76d0bfdeca880e6c03972ac15a80b93cc8c14f20bcc907c04090c021dab3cafbb37a18bf3a50c1342704d2bb7760eab2a2dbb42a5bb97a88b54080c1727a05f92b85ce4a0347bc7be4bb03e6bb7b13ec02102cc3242cbf31cc032ebc774dbc03590c76c85b071e3c848cf8c53ef0c4999b05165bc451209e2c7c78d877c01f7ac591c4bc3487c23560c30f10042a0c7c6d0c044b4c7bf7cba2dd2ac68018c83b20c0038c05ca68c84a50bf0a6cb72e2904535cba8cb8c52f80c741f0c7af47c64030c2d717c26a10c63af0ad7c07ca32e0c96418c5ff4440caaa67ca7afc7ee83b03395cb4307caa11fcbf566ccb6d5b7ef76a03694c7b424c07a29c03ac0c76c1cc0344acc65460c6e33b050cdcb849f0ccaf17cb2b30c9733c8a969cbaf39b035d2c94a5597eaa4c06c38c03c5fc759cac03cc0cb35580c82fb8bf4390ce9b9c047b5c7bce6acd9044c735d7c73280c940507e702c04265c7b3b2ccc833ccaa3c8c837c0ce0618ce4110d05768c74a209e498c02d7bba5ba4cc9d85cc3dbbc86e547bd43d0cdb5e8c35a49ab7ae8ca2e80caa98c05d27c85bdec038ebc79266d030abd770c9d02f6fc48f85c7308adcd728c039aac8b4bf0cbaf17d3e25cd0c49c8ac79c03c9accc98d88e359d03e5b7d33d109cff4f7d0237ed4839fd9e43bbd136c0cf4a80c7136d05e3ccd1a378ce3700cfe48a052ffd752bcd77037d9efe6cabd757d52670d58d94d54897035e3dd5d8a7cf249d7cd91cca464dcea9f8d63930d3c17805ce09000ecd79446dd0d847d797bcb5b50c8663ab8cccb9d7ed6b894c30cfb527d95c30d63650ce21eb03289dd2d8697dc207d24697d408597e81bd03156cd83860d78c84d7797d039abd03e567d642e089933bd8643d8a83bad44c0d05887d941030cb52e7cece2bdccf6d7dff5cdb5c7dd7cff89bbbad03e0dc046b0d76b4fd06a24d89b408da1080d6695d05a7cd9110d0d620090560bd04071000f23ddff45ddff66ddfd4ac02b6bd48b86db8ffba5ddd3400dbcdc8d9b40bdde25dd83f90dc545b05eceddd22d0d89bd7d21addd381b0df8ad4dfa7dbd5004e90061eb67d1ddc4e6bbba968da24abda56c0dc471782ac7d731e6d0416be072f8e4818be9e1a4ee107fec34a80e25307e238aebdcf57002bbea6675900cf4bde37d0ddbc37023a7e73df2db81bce07317e4833fe00e89bdd841de25ef8e4828de5fefb7c00b0e492ddb70450e455e0d9093a020d5eda5869e37f10e58634e5ce3d02563edcd627e1ffcde6fcdbe1a1ebe5690e7f7cbd7b0eb0e43667e4776c7d190ae17ce7da4e8ee77de0e68534e5548eb85aae9693de03730e07e1cd8b869ede86ca03c577b2cf47e834a0e052e7862b6e73ffbe2dc9958e078e4e48903ec1977ee396cd04b1ee0699bee7170b01a4aed547bd7bf1d79ba27eca3d2ee8f93c91ab7e07ad3e48e289e4a8e9cab58eebb3de808cbe06b7cee160d8b72d1e037d2b7cc04e05c67de624f0ed9c97df3590ec7460ee8124d1a1feb1c7de9cedaed7ef3e06d59e943868e67b18c7b50777dd3e05c44e7360cbe9af97edaa3eed301eefe9ee80a049c32ef0ecd67ed1879a8805cee51f6cd9cc5ec7bc2dbb22b0ef5270ea3587aebb6e74d33dba04af07e80e481adb9abccbf0f43ef2966ef06130ef30e09e2220d4dbd9eb9f2b021c4f73c10e03f61ee12760de4d3ae02ccfea2eff4762fbf1a4b8cf455f0231ea042abfe53ddee5ffcfd7747dcee2f0cec42230d753f0d37b87c2e26e919bb9f46f50f2466f8d557f74b1fdf4943ef4b22df65d00f36b3f8e882e75212fc5c097755a7f8ad28d02001fb96beef08240f67e34b81cefd726a0f62ed0f4ade7f6a1ade70d9f7cbdf7f110fd02c0e79f790f057dcf791e8df43627d57f0ef815cef87a34b8676f74818df82da0f8b42efa5a00f789afb2407f74767e962178f94ff0f57c2792b1ff75e42e03823ff6e557afc20f00a99e80c559f8672bfaaa2feda00fde8ebff2198cfb5227f0140c7ccb67fb4eb0fb219d02d20f76b17dacacaf0690eee565e4bea57f73d98cfa2cb0fc5f1dfe58e0faa9ffc3c057f7d58cf122d0f37cb7f32e90f3ff0f00020c349225f2a0a9bab2ac58c2b13cd324d0e2f95af3bdff0383c09bae683c22932980b0e97c42a3d229b56abd62b3da2db7ebfd82c3e231b96c3ea3d3ea35bb4454166103786b0114d0e3d9405e97c6f7e1b489f105b60474151aa6289030040e4819be40282e3e08b01d5c32f22c703e4496bd810e9ada80a682329db6babec2c6caced2d6dadee2e6eaeef2ba9272c2002e22fa0897eea93efc25f73a5972126f3d1b668e28181e404d2b25906cf755ab5d831af034a49693fd5e367bad27c323b1b6d3d7dbdfe3e7ebeff3f7fbffe37b67080682398be6f130060c99aa650d017a4b164dcbb73ce13605eaf644219c6c232ad20997e6112751351cffa41219466020884f58c68bd902a1cb9a366fe2cca97327cf9e3e03320b06ad58502c20f3384c65f3289d890c39892c108800149845ec4404a5f24c2a4a344e80c23ac62a9d9f33c8ca4c4bd32cdbb66edfc28d2b772edd536895c4287869ad0c8e8b281635e377604da6709c1a4d598240a002500c35286118c9d632284135ea71f708027581dd6e4e0b8f6fddd2a64fa34ead7a356b5ea18ff41d9af07395c949921e73691b09e22bbb8b88bcdcc7a390df2b268e83bae61c28e23506e7d128e6b511b9d445af6aad7d3bf7eedebf83e77edd4f0c8c8ba8ce7e9858bd60dafe8c17e96d053e0e8460fb480f921c6909e821d748c589633ed0d7027ad3b967ffd678d81d149e830f4218a184135208cb8282c8c0d825cec5c6de7c0986e11f7fba4994482a342d78601024e5e11504222a51d918e65da2220fa998b412883e5dc8601fa45518a490431259a491e1f5c8c20c344e959e524fe5d69e87ff1488837cb59d08c37e700c288441796446028c49c8284602a9e4c7439229a4a3e394421c20809c73d259a79d77e299279d1c5ab1a68f4a0079a4a083125aa8a187dee3670a3468b8089ffdeda84da45e8c895761257251e50a3419808d109d06c261a5479419068b1bde914a9860288a82149a8272a514adfe6944a088e29aabaebbf2da6b15b4d2c0641f360af5e614b0ee80c6a8482c85a93459ca9191105b2ad1ffa5988aa5f1e522d6f6802c0ab762016c14de0eb305adb5ea00aeafebb2dbaebbef0a29ee0c8d7a3ac3b2b041b9d019f75677a92ab21e9b0ab710d00b47642b0672b01bd89e412eb137a6d2999b4f4a8aee21e65acca0baf072dcb1c71f83ace08ec896c9af1eeb512c65ca00918b02c0af4e79661f62fda02d1c0ec4a068a95f30c7499a9aa582f3c4513a93310b2fbf64b4681b87dcb4d34f431d752df29e75c90012c760327928134d86d63934fbaf892b43705f1e58f7006a1f688fa0731a9f3427c4d72c3c8cb1b140b41c08d24e9cabb40a4c4b1db8e083135e381554cb40b2bd93167d371873b710762a7b3fd1b20c70e721b40fd426c197db6708dbff5813e40ecc05e2a3fb9d02e542f49dfa03801b1ebbecb3d31ef5e9395bcdf608902b992f3bca327e4fdeaba34ef68b0903712a1caba2a2151a32735237c471b31a3c0d79f741fc10aec7037beddf831fbef886de0e83e2595b1f44deb8e90bd1f063775d492034f360b3126d2eecfc19051bf2b30f8a32cf74e94b1cf7b4f783d6a5ce7be35b20031be8c0ed940f060132448eaee5b88a194f0cbc4b1689c496290f466b6d3e501b1d4a070155ecac0bf60b951338d7071709f082dd2aa0ddb8a70a053e30873adc210f7712c11240af7fe89361e33218a201b6e37d1f9c9c0c94a704cdd5c08547a81b0acf40c26d3de18a7fa91e116b80bd3c18f07f364cff060e7b68c633a2318dbbf861092628ba6219715c48bcc2065520b958c14f363008a2c17ce0c42440b1045554d92514d68415f62190358c9ffa68a80504faad8c6a9c24252b69c951048f8ff881232361d6c52dd47151fe62e212f1589ef9f900919c99c120cb80b94b283279a930640ce348204766815600d8252f7be9cb5f023398c2f4252d2f69cc63223399b5ec640cdcd8076e85d255bedbe2bee6d80b253e8b943178251cd2864a56326c0c66bb84ee8020c51272d19633745d1881f64965c2339ef29c271bd808449f41ea9d78b36615a2a98c519a329ba08825047ad6141e9c13383468e51834f9cd2caae251e1e2e7477039517dd233a31add2847ffa3604f12e8651134f32760304a478aea029b25d55f0c84f39f1afc1109f8930c43c5c03fe445419574f0df45d5c9832f1ef49128ed28518b6a547a7ed482e5dadd500968522b9014a07a5ca972c099875be9540715a46938c5e04c43105496a080612e510ad4c32cb27d475d2b5bdbbad1a48e20a486984754b9a656af35f5162a9d6620ca14537c2da9493368590ab3a0454394533f38fa025c076bd12b34d6ad929d2c651f18d90d12a3aebec9eb46385b8bbdda7511654aa80eaee45024f0547e5d05036993403f271c566fee30eb63fbe4d9cae236b7ba055964e51a085668f6434fede76d6701dacdae9604a1a30ca358e8d8e4ce1614c57442569530ff5dc8d2969d69fddd6ebbebddef0e2eb2051d4a70b1345c2a94f73dcea2ea25c84a82afca8306f03dc26b4be0d24b14f60ae35c4458111696e8fad48bb5fd5571c16be003237842e25d2e1ca892de809d770a0fe6c771859b9de6f621b07db82e53a1cb85fb2e22b1d35285880f8752040420c52a5e318b57dc5a25b4534d054e308d6b6c63d58897609c885381d707bc08e7a2c2e6bdf00c409c84de9cf608b28a667ead70d3995521b69b5ce65dc120e459cdf8c65ade32977f9263062b810013962390a330667d5c19c24496c17ec994a13e6c9593f825c37cf3308061e2f997aa909e89cb5c3c6df694995d1e34a10b0d971cebf81275ce305f5bf2e300ffdb23cd9e5cb30cc6c39745ebc0bd4aad6a18a43c46ab7501d1930e68a0ab6ce853a33ad53841349895c65eee12d2d4145e6fa3f350df12bc98055b6db50e52db6196b2f6d332992976fd5c1c5adbd6d8aa5e36b39bed0b7efed5d5b51e51ac61cd326423d7969e2ec24c936c048992c0a0731643b4854d0d2a5b3b0c924e9ab29dedee77c37b68b25ee7a75feda8470b3a1febc660beab8b03e63dd90826cc1fb0bf60ee98dcbacf90ce36a98bbdf078433ce2120f354521496d0b377c0c67d637b6313eef1104bc082ec2740e38dcbc8277c1c807e744893d9a650183b0d4e99e38cd6b6e7387e71be663b4b721622c85905f9c4a1d1f72bebdadd512f03aff07fd6d5b4dbb20ee950f74bbd41cc3be9b20ea9b633deb37bf3a042cdecd6907d50c5c0ff2d0a9e0e31ab459a62430fad66ad0aa264f81e450a7039f5ddeee1f549d752fd73adffb4e68aeabdc685a48fa13d1d02a49a6b4ec6aa65e0db8998430013d079a2638a7bd40f8b9576b0b4f9f3a21145f95bdfb3df4a24ff0d8e5eea32d2403ee58307d7ca57a099fffd4f35aa304eb57104019d4de08aa8742ae319f0462a33719c0f742de8330f6d1233ff9351e3bdbff84faa68b818c779c2ad8d11a7b3b8fe0f22c183e0c526f2adf27e3f612f67cf5612c75c2283ffdea4ff5f1732f932d387eaea0f3beeb972ad08ccbc0df2d2847f35b30f0ee439f16e8ff1ff8b51e16f4de11f8dafd515fb23ddcfa39e003ead6f1f51f769c1f949941deec5e3314dfb1c51c0d945b0e7443e4e140dd9100fd111f012643cb1511ca7dc1061e10e841600ccae0311d1f04b85f3c6c81085a4a191ca011c01e2eb8e03e75e00c4ce00a50c50d3ec0d295600062c1e6a1602028e19f8d551904a13b35e00c62611666540df6200e6a813f715f17e8e0ef4ddfebe5d102ca80f6a94001a4dd2af980097641fc3de186694132245c29e19fc2e59c16f2611fc6530dfa96e06941e0f581f879811c3a5afdf5dc199aa10f202270fc0810c0e116a8e11ceac0ff41c100320b1954a18cdd9d1f8262282e500d1e4fea506232906016b4a1052affa26ce1211aca8013ca8421c6c0246a41115a621180dbe70de109f6a21e7e9c280ae3309a112906a2c570413260e22da2e24d7422bde5614ba14b1802a08759c107e62212d0e213c822387022f9f10d0c12e33892e3c79062294a9b50a9023566c1186aa3338263e5c463adc4d94231a1156862364a5e1674a10edc21cfb962597d623912644172cc391e63ad70813f999c00c663a43da414c26213fd492a2ea13552c1b6e9e36d608146d2c12e96df915520a31964499ae4ec9c63a209e2202a6343c1034e3ce3f5011a42fd490256230b9ed44636e215c0c3368696fdc91ce79de45012e5d3a464250e64d9c0c30fbea02a4cdeacfd22d14de429f9880a0affd23d52c123ea2412346438aac23232dc54dadd151665599ae5a1a4a44a2223ba35081878e4f2c0644472e04cf20012c2c13fd622564ac12a6e2512e06513f8d30330e52d45259625e5592266627e475a22e51e3e413f961618606347c465612e9e58c2803bf69510d8e215e0621114409e89e66826034836c15b024ae759262f92a562bae66b3e485aaaa542724163a64b0bc20358a2995c36d26ada1783104f673a992af82403e2d3eac1834d4ae54e0625fac1e6734267bc14986d0a25166865e61c223c74e53ec4a4ce45239b61473dd6807056413e729b0639653bc2c3d53c0e6f8ad16146677cca674fc866d7658c1740660e0c80694241373a173cfaff26bf61260c58dc53ca00794e016a1e81780224f6fd647b7d8182f2c64806dd7c5ae885e2d88c9d55db0d5e3c2c805536c167d2974e74e7f544647e22601320a81444938162817bd6805dea40060201025c67d835672262e88ef2685dd4a77da2cb174c668319564c282777c22861d2250f48e847aaa85eb226271427ce8d5b4e26271768e684aa636bf668977a693ffce88662082382020180a80f3880792ee84e94e8732d69fdc8c45fe6254642015fd2013b624134c969105067114ca91064a9960a24977e69a11a6a3bfc28903adf17c8a83ff2670fa0e88cb2699242e38066a64c6ce79ce2e41410221d30a80292937ac604039c690f20c090e22895ceffdca1b26aabe643a28aa8737241ac2ee89fa62102b1278952aa4c7e2711ca8401ad281404ea3e9641321c299fa6c5001c6b0d18c08d06648e92a4ab4aebb4d243a2da206d326a5a14c0b266dfb0bad9a406a83c862b48bd9f1304eb1334aaed89dd9e6901aada1ab7229db78ae4966a859ed8ebbde2ebbd0e26b5f2eb7c5a2bad5628338a460134c0cb1c4002785daeeaeab84a24730281b3c2818b1e28949ea6f0551b0575687812800380a8012800c402a5aaf6650ed068bf9a2c865aebb59e9ebca98598d90900a4ebe3f5449b3ad59b3a09713ec1b93641a4ae61c358aca8fac80200409e0000c872c29e5addc832d7c9322db5a62cc07e9d5b2aed88ceffecae7aa7a59a4f3c3caaa6569e71d6081ae8ac1024e4d4ea009eb21bd9926cd3aaadaba6acca52a018f8e7d49aad7a31ec5cf62a0da8e9253e06c572a62ac0abd7b6253fa2ed3bb2e5e0a240c9ae6de22666db06e698820102c4acef21aef058ad89d6ed08b8ab1164eac4d2691374aa9356138951e8e04a6c941aae0a4caee2aa2e51b6edd88a230934a925222ddddaacd9b927d4b240145ad5a6f6e757a641dee86e13b8eee07e28809d2eeaae6ef2a2ac38366eef8c01cf42dd7e9a05cdc64010f6290b94ea4d762d15442e0a586432b22ba89eaef41aeff11eaef2a2af7cb66dd9e4ed0e8e81bc625ef05edbe50a61ed7a02b4e42cdffec0f5aec0df5eff41e6ea2d17402fe60dc0dc8ea5f99e6ffa2a306cae2f3a962b19d8e8e0fa2f54daefa8616d0cc4adccee6de72a564489c3cfe6a0f91630cb1e6fea2ef009fb6103dbe9aa7e41044fedf776500593990c17193a4441d8fe0000e7806e7641ecea80ad3a810e83df0893f0e99a300a23311636f06cbea415b5afb9c1700cdfed0c4fb13d2a9a24e8ef1b86af1a3cb10b78810b932d1117b1e11e71129bf1032e31ff722819184017db50144bf105376cc80a8110ab001c6b6f95daaedfb2811d47ce17fbb1b92dc0d6121802a740199f71222bdf1233317ca68dd142715c506fd6d2af357082fc722eef3641062b01210b703260f213c0efa7912a261972022bff722a132323abb1e39e01185b221097211d87a5c3c209cb613107ff002407f01af870c91dd15622b2f19d322aabf23183222337b2637601028cb2c50c4028cff222bea22d0b41a3ce6e266f2f14b4b2f70e821bf76c182400381bcd00ecabde15f33023f33ad79c32ff72bfb0c10033c80218704e4c3257d130866d662e6b7210e06eff0e4220af80274741b3e662291b5e3163023b3374162ab3a2beee08f1b2c56c2e4fdc7356e4730d1b423d6bb31e4b8140ab00417f32ce6adc1346f31a78dda7a97343b3b4bb3d3450b542f38242019c733f5c744555725c61ec14e0309c0a8c29bc730b94ae1518b4ef21b41aa4f418ad744b33b5aa3d3444132a2526ffb5120cc0525370158b6b4657cdb050414f5b6e2ae0b10aa9c2a7ce6af7c2c302d4b4e99aaf5537755bff5d44e3b3236bc3546b6ef6fac44dab9656cb00644ef055eaf2cd1e674057aef00a00390b4c5fd32b02b3b55b33b6963d35044cf41a9f4200d0b5ae098048dff560d72c56d3c02f63761e8b561544360e7cf616c8f30354b42a268059ff16628feed42e7663cb36e9c1f53dd5366c118061fb6502d8355be07577aa6936efee360b6f4b9e4250b38070efc133db1901703482a4f36c4bb7cd3db6db32f31a240003e8761d3440694faf6657afd5066a6a5b713ffbc03fdfb12b6cb7775b010264f776e340016cec2c5476eac4f674e3777e576f03b4ff4a01304002b0b77eeb86009c8b7f2bc0730b78822b78d30440021038c8de99980540802ff84d188083330075086d03084000f47685837888874c8bb518858bb8591c0089b318829f788bbbf88bc3788ccbf88cd3788ddbf88de3788eebf88ef3788ffbf88f0379900bf9901379911bf9912379922bf9923379933bf9934379944bf9945379955bf9956379966bf9967379977bf9978379988bf9989379999bf999a3799aabf99ab3799bbbf99bc3799ccbf99cd3799ddbf99de3799eebf99ef3799ffbf99f037aa00bfaa0137aa11bfaa1237aa22bfaa2337aa33bfaa3437aa44bfaa4537aa55bfaa5637aa66bfaa6737aa77bfaa7837aa88bfaa8937aa99bfffaa9a37aaaabfaaab37aabbbfaabc37aaccbfaacd37aaddbfaade37aaeebfaaef37aaffbfaaf037bb00bfbb0137bb11bfbb1237bb22bfbb2337bb33bfbb3437bb44bfbb4537bb55bfbb5637bb66bfbb6737bb77bfbb7837bb88bfbb8937bb99bfbb9a37bbaabfbbab37bbbbbfbbbc37bbccbfbbcd37bbddbfbbde37bbeebfbbef37bbffbfbbf037cc00bfcc0137cc11bfcc1237cc22bfcc2337cc33bfcc3437cc44bfcc4537cc55bfcc5637cc66bfcc6737cc77bfcc7837cc88bfcc8937cc99bfcc9a3bc901cc068b2fc2e710102b43ccb7f3845c4bc680ef513ac7ccde7992b1880ce0f138b8f007ffb7c30bd45ce0f3dd19b82d01ffdd2f7929c28400000ff3ddc32bd2ff182d24ffdd5633d30457dcad7f869bb0c17b076120e022787d91778bd60b6c23356372c9c7d5aabf518f9b70070ecb3c9f56b2baddb73bd8883f40a9037103037f2b6c1b9b8760fecbd0af4bd2fea3581def62c147e0a1cbeddbb8e7ccf7de02f3e309a2fdee73d88c3f70328379a8ec620c4c3cc03c1e6777e35d33231d73d2e90be29d4777bf1364a57fe14b4bed2607ee62bf85999384178e11a604fe9e39d4ce4fe1e273ee50523806aed20cc7ef4d4be2746754217f3f2dbbe7e93fd4e15ee46c7b376f28c4c0c7e2d9ffef6a4be2d4c3f1c6cbfe5cfe1028c3f3a37ff19247fc6407ff4e3f7681741586f4e4ff6f1527e01fceb80fc8bff2f35bf3d083ce24896e603a5eacab6ee0bc7f24ccbcb89e73951f77e0bd00987c422b190f8295d412371098dc29aceaaf5ea0c48b7dcaef70b0e8bc7e4b2f98c4eabd7ecb6fb0d8fcbe7f4bafd0e3d608b83b261bf53570078d277a647a86378179058a22545e5888247873869b2482789d9e90460c0c69958e933ea894a0859cadaeafa0a1b2b3b4b5b6b7b8b9babbb0b9b904a124a36e0596089ca80e6fb2b126cd7d8b90a750ac82ba6bcdc3c37bdcc2d22b0b68da51bde5d7e125d9daebecedeeefe0e1f2f3f4f5f3fc3d0fd4d46808a30e7804a011a7cdcf439f3844e09392bf67a105c66509bb9892316642bb3b0ca388a1c73246c0832a4c891244bff9a3c893265ca61dc1694b986c9c19c06a80ea061b9cc2523845b323a51a902e72f9d9b3a4e1c90e48c4f231b8d3a15f111a8d4a954ab5abd8a35abd66a7fcaf91b830055c4374b8b143bd3b5dbd73acf3045ed51f609d0b4dcd6ca89fb144b03a59e9ae6edf876abe0c1840b1b3e8c38314801e66492b9d109c01c547bcf302ee7982dcf487d815eee96f9eedf723c3076c68577b42ac5ac5bbb7e0d3bb6ecd93e20772b3d86e6e9376d63a2b1cd0d379dde8e02d348ad432af065c2e320576da43998e738fc422f679cb6f6eddcbb7bff0efe55587367c7107774918d025468c6972b3f7c7314ea2780baef06dff9f5e064e89bb0bedf32d985476081061eff886082e1c1d44d7a5f08e58840703c3489646730c88d83bcc927cd6e2761884d5101fe925418fe9500e088a80ca8608b2ebe08638c32d6c3cf44128e41a123d2ad314827379651a3393fca71de6a9c75025490e50c49968abf68782426293ae9d68c565e8965965a6e590784dc5838068880e4b7c6259840f9204560ce5124202c4ee1a1495e2eb3261c2752594201767571e70853e299c89b5c0e4a68a1861e0a235de6ecf9859993309a86987b902986a25e69064d4f719264a95a1201da49655ff429c29fa0ee2128a2aaaeca6aabae6ef5d944a185d1a36f6ee886c98e61c4da18a6554639894abc62f6e9a993a0a9d0a6b3907a6aaaaf3e0b6db4d24eff5b0db343882a06ae938ca5c67289cc3a86b542601b479ba86a8a644ae2ea40ae1beb525927ba52e6f2ae93ce528b6fbefaeecbaf19f74d44a9170045f6463f67fc4b9eaf93dcbb02b32921fc5eb1c61637aab2b2d4ab22c3fd6ecc71c71e6f3c70473691c15e1be66241541921733432911c2ee1304a2b53d4729313575871baa8dd4cf1c73eff0c74d0f82a4911935fe49808b2620c4b08b762106d637c9902eb484a500b295a64006ccd75d75c7bcb91d235c4bcb3d65e9f8d76da6aafcd362842bf0d77dc725f592b47c890b19e8f6d204d88d85bd44dd1dd2e4f3d9fc520013e91e036cffb4300093400762aba26abf32d64cf8d79e69a6fce71a713f9ffe1c9e4c274a209199e9b23f5af8557ce695e59339e8700887b52faeab0db7239e7baefce7bef5ce6ed14b85fcc3e291b8e2622ba17c01b253c1b275fa1710ab98fb47c47cda7313d140acc69abbcc1d26bb8efe28f4f7ef9b261cc2e909e404a86a4589468da53ed9afc32e5b78f847e0ef3ab917d1eef263fb6f0bda27fe62ba0010f8840aafc25656198d9b7d6a02d47d48c647961a01b9e6785e84180800d59a07e58c785ab3922603fe0202c4c98c014aa70852c4c87034546068801c2698fe98405c5f042960d4e751d0261487248333b095009224cc4046136c456a0b0854c6ca2139f3893d1c02f0c91c342bccae089fd812182469922fd08d7c3fbff85848b1df122ff92e80304108f10d7830b1a4bb14428ca718e74ac6314d698b832308d1a69c060153448033c9a437117ac5f09dff80e41968390e040640dfc68051a9ac2917788a31d2f89c94cd2f17846a9dd174e8705bf6d618f7b4003273be2c93540d2081ab4e43b4ec99154a2c1953e28e21eae78481f2e8b929aeca52f7f39beea3d059030e01e168c2606beed81916210a6538809855516a195bc5487338d02cd5c8ab10bd2340b176889077002739ce42c27dc94d9114986b01300ec8231af804c30a09323ea3c433787404d5dda639e14a9677faa39832a96d27b55039f3ecd89d0842af463d7b9a117dc67051236ca1347144343cb65c8491e94ff1e177517406540ca3d5454a3dbbcd847178ad294aa544bf75c06fbb8004b2cbcf4a19d90a8175afa8b999a01a71e21282948c25383b5419c8f5c914f09612a71ac74a94c6daaa1c8f814337a41a056686317a0aa173460b58b7008ea398ecac7916cb58c1edde8168c4ab59f96ada44e6dab5bdf4a20aa72a49d50186b15fcb905b93ac1aa5dd0eb44e82a06af9a209f6c9d875fcd01d89c1516ace74a2b520dba58b84a76b294454c4c3b5906c19200975e90e11e740ad300c9d29e1975a359e17159549635b251e0a715a46a5ad6b282a895adad6d6f4b12881a45944a782743324bb00b8d88b75fd02c0908fb3d91e8b623c4fde6496310d22be03506b4ff15916c718bddec6a371eae4d6719ba6b84e6f620ba5588e7d14634dd30187704c82da848c0dbcfa13e1706e4bd2b6395bad6e46e77bffced6f3b7c6b84e51281b35cb8e631e377ac9b4c42c043203070c188c4d3be03c04560b0101c2c86eacea0be4e48ef0b34fc3afdfa77c4242e312c8c0b80d41a01b47960671928ec4dd23a22c59860b17a4b1b4009b703c52a2e828dbd00e218ac57047c95419085a863132b79c94c26835d8bf00d4516a1c85090728c2be5e2333c9908519e0495c130e407b457ad20d9f210baec882ff369be2f08f3981f9b5ff73679ce74ae33180e2b042dd8d20989fd819989f0631f587808b0fd029e75a0e749f4999b383e0eff9b6b71e89eee393aa278740b068dcffb5e21a99bb6b3a73f0d6a1a78f6b798c6814da500c42ba8b907937642a097306a8d40a0d4273875601b3d8323d722d63f99f5246cad5811efca13e26d98a52b9de4502b7bd923a6b5092cd46322147b06bceef018229d038782c1d92580f699bec8c3085f571ddcde6c0aa23d8469db4fd860e0305334fddb389399d9f4aeb7895bcd6515587908e685b71130ac846a1bc1c350c0f799f53d897edf1ac2eb96b33d0c2e0483ec5b080a0fb6c3c300f121009bbac76e64b2ed0df290bb15c6994e41c6730070ed7d7c0643ce663117a68293e320e5c5c5b5913b0e0b92e739e6383be3ca633b63e7febc0eba16b9d18fffee4b50ca3a05e52601e8bedd6e4c8cd60b4aef35d3c7cd0537fbdbeaf6a8fabbafceee7f0e9d069e203813708e3db4237ded6c67a2bb2fbc02740b61d53e9838c54d8409660e3be82a90bb0ee82e05ad3b36acf678bb0ed6e4f71c005edc616734c31b3eef5a14bded94afbc0ab17d82b1d85d7fea537418742e84424f755b2cd83c0eb4681e9b737cecb8c0bc09343f09d44f07ed7f96cbd6bf6e39b55b7ef7bcd79dc089800e99d7fa2598d8380dbc6e84917ee1f725e7f9089da77a38b1de16ccdff90a846f02e30f7ea06300bd10f4aecdc6c762f2bd2fbff93397eaa5ab20fd4e50fe16aa2f8457c7a0e9154103fb719f82fb17c1fd377e3c49c5ef0efffa677beb8709fc076438477f24207a39867595a47be7078111c831d857028c047f39507150e07a26b0782e408125207b5df0812360819890818e176e90076734320925987069377d2f607a3a207f67178348d68012a8833b183433680246b38124007e5c60783a607630108424d0813de0832500842da84ad1f7610f88074d48024fe80843687191d7054528048b368537b83800c8836568863f837cd2e602b5970353270569d8609d258630008742e0206c88036e5873fe077417170f75a8037738097a287439180380d87cb757049c166f67e8888fe833065605a9248089f87986c802eba5855d20894e408929480682673b64b80e9d68049f08737c3187ff106000de077707b88ac8868990488bb5482877a27717787adf0575a36482b304852ea08b27108237258536388b92178c2d308c26508c8a38805cd08a68b566b1e871c9688bd9a88d30d28c4e888493a06d5c90800f7082ab274107f38b2f908422108e60768c40408575d08d57f88d8ed08ed5888d29b03da840738e668d3e978fdb289003191e9568873080873860802de6795ce08ac377060619880859807df48e2c407ead20913900250979020bb97df81578eba26ef0f88f3088096da3922bc936cf48902f09930de19125305a1b89030b1805ebf800dae70288880360e86783180336790238997517696c27590933490235890946398a7ed803089000ffef7284e6488a4ac433ff16935de995246185241803f328964e56635b608a46b08435109622308464e99616c9870c9895d5d0960ff09679a78ad715007da90090d30df7a88284873b5b5904fdf89589a998b7907838d06f3a49884b40941cb80523380235e8038d79028f299468208a615497bba0993f68039d896086e98920f97f526952a8f98a8b099bb1c90b695904c8c294c08045a427057789984b409b6a1803b739022549039fc978acc90ebf996e32209ccc6006f9331a03409cc8189a95009d1dd19bb2a99ddb2907f025046e389925709534e09d87270570498e03619a30109e24309e3d609c83c97df2509e6d3803ed3902ef996bae798ad3499dffc87942fc699edc49a0055a0a7a2903e829982a579d2c809fce7906083a9698b0a08187942a909107ba8c30a0a0cf29a043209da709a003f4a13367a0278aa271f0a0e9b99f8f4206a35902d3e68585607fe978732eba53172a3df128072b5a717d8299fe58a2b5e69f611890ab35a423909d29caa44d1a9493b090335a94657097e588910d6906cdf90051fa9432068aabc985eda0a55cba60229aa47819a47439a2ae709d1cb1a44e0aa771ea0277096ceb05943460990f70a75d7a06745a54581a8a3aba413c1a077e5a9cb962a6253a00560a9a6baa9567aaa4722aa993fa03304a028025752af36b50e0932790a63460a92380a9eb997a7329a40d6a0bffa12a02a3ea0891299fae49009fda8761da9a90fa006f4aa9b97aa2e308957d52a42c809e35a89c3a50a151c0abb3ba07bfda02f1197e8eaa0bc7aaa680a0ac187aa604a09af888aa76d0a66aa2abddeaad29509f39a09a524a9a62f74044147bea09a5e365a3a5faa5c84a98ee10ae0ac9ae2f182e67ba000d30add277a4f265abb7faad014ba90f997d3eb05eb82a03c39a034778972ef702049b27069b92396aaa2ddaafa500b124607c076bae675a000a20ab169bad44f7af002bb027eba476fa039d10b23dd9736944aaee8a3c2b7b96815ab1377ab178a0b23ec0b2f75ab20320002d6ba4236b5d908ab0288bb402a9a550b9a35ef6620dfaa09bc805ff4bdbac80b0964226a8196a07540ba67b70b5ff69ab8b9aa8f14a0bdb3a11479bb4695b8b3ab9a53f40ae2570a73390a7c4f5b623c0b41a58913e50b7a2fa60ef1aad2be80e6c7bad10b0b7abeab3255b1183fbb764bb4bff8ab66a0bb966a8aa3ba904ebc5933d9080567a278a5ba9c557b99e6bb37e7baaceca98a02bb19b9a61884b935f7ba54ab997461bb9b1ab98e308869dc0b9a206a864f77cc295bb3560bba19b8a5149abd540bb4bf0bb78a7ba2570b7224bbad659b28f2bbbd16b7e79fa00cb3ba8f67a6dbb5b039d0a826840bdd6db278cfaa7a2cbbcc3cb0bdf7b9c8020be389bbc763b7baeeba18e2bbdf34b90194b029cabb03920b55050b8ff3f96bf27c0ba3160bf2380bf12da7fe4cbbecd5b0b032c0205bca1b0d8be0ab88580ab8cf24bbf176c8bdc1bb14ba0c12802bc56cb6a44bbbda6fb031dec7432db33c24bc1ea60c22270b9ac188b66ab1afea9b5c068c1188cc38e58b80fe0922dc0c00f10c03eec08e9d596fb2b053bdcc32cf0c341ac02ccdab58c5b0d481c054b8cbc11acb1215bc3af7ba6d09bc35d5c6f6cdb81f34a8cbc980829a7aaeb5b1bdda30462ec8c281c28d03804f000c6ad8509495cbe4d230079acc77bccc77d4c005c530e760cb62bdcb829c992878cc80020c85eccc821879e0f10a4ff0b916192950fbaaf2bf0c8914cc27b88c058a9c0b290c95120c905fbbe016900ff0a70975f05c742c088ead7c8af0ca7e358ac2dd0c20dfca2093603c2f9c28246a16f78bcee78b39e6cbeb920cbbe9cb7102cc22e1000a96c6eab9c1c9095ccb02ccd2f49bd8b1c147c3a066df9a33ae2bd75bc053f6cbd32e0c4f03a9feb50cddf8ccdd8fac934a0a5121c929d266f843ccdf3ac9da9bc966c5c8165209cede4b47daac64b80cf42b8709dccafd15c0af6bc05015d96c8bcce34308e23b0cb4d9bb30069d0f46cd18f58cb908c96994a06f8796ac625b42f90d19f3aca3439d0c1dba8c37c0b23bdd131fbce8d982dd498bef23c7e847ad1375d79254d02b3ecb204ad04380a033afd003cad0442cd8ed218ccf099b5369d06463dd448edd3ff09acd22f5d05463cc8505cd3f08bd35b5d797d62cd2bf0c35f2d030a6d550aad9fa30b08629d02617dc0283dd3580dcd84a0d610c0d60c3dd55190d12210a4591cbf13cdd57f4d798ffcb50a7dd47833c432d09697ac0282dd0584fdd4c01cd526e9d770c0d85ce0d8443db40d1dc27a93d2341da05a0dd8a10d722baad105d6b36360c20416aaae0a05a41db24e5ddac698d4997dd7b3e0da9c78da8558d13030b922f0a67c3db6e52cdac3fd88d48bd9b4dc09e11c48c8899f715b03c64d75c90dd96efdaaf0ac0ed0dd0519addcad3bd92ac0b67addd9704da2a04ddce5fd69a93c0089ac3659360696d9918eb0dd6c2975ea9d36ec8d82d45db59e7d0bffe84ddf6863df54cd756500db401cdec25db64c6dde09ae6479ed24aced03f8194f2772bb3dc0e02ae2e0583bdb576de0ba50e12372e11a2e9265d0db3c5ce0215ec1ddade029de64034e25974c9693638f68c0e24e52a4e3bcb81b9e0b33ae22d309dc10c0cc4bdae387bbdb2a4ee475e6d88072d6058d0501a359733dd6569ce42960e368addfb570e47892e43d7ee5256edd8549de450ee6db65c58f3d067b0b2942edb02e30e6c7bdac4bfde568b0e6ea5cdb474c516f8de3598de261aee7d945daa012d22b60c2c213d01ffee0631edb5b30e5772cdeb4d0e78022ab3d9ee820dee5273ee47b6ee9fbd5cea0c2c4609d084e1396565d5786ceba912eccff553e0b990e28570be99e00be086ed7a67ee9b1de64cc0c2ace1d0323182fa18ac64c68e8b62ee56e9ee76a40eb8062eb3dfec80f7084419eba6f2eebcdbe52230e2a112d03f4d702f839e13500ed8022ed4d0cec950e07d98e27db1ee46567e7267ee0cceeece9ae503a8e27971caa17719bdb3e03ecdee2f79dc25c0ed3ba40ef34eecc39b006e45eddf97eeec1aeee05af50577e2abb5e9a84302449e8e43180f0a0a2f0bf9ee192eded6f10f180a2f0e3fedf376eee857cf1062ff228f5c313c3c52c709bcd91660a66e8268be8ddaed97850f2c682b01c3fb101efca941ef323cff34b156613f3e7dc4e08f0a1599ed9f297799415cfdd210f7d477fe8ff381fe066e009d9a9ec55ccf43d8ff5be84eac6b2e9d74c086b51b727bf864e4fe02faff44949f0594af64b68f30fecf1933ef0579ff5737f49df7d330fdf02019d19013df10145f66a4dea4a3ee7ad60f713f3d56d7fd8508f7f3a3ff874eff80805eea722ef2fa0d30661bf8a7d6e644fb9661fd94bbff3c640f6118df89d5eee700ff29ffff8a98f490fbd95d71e0396ea6d439f0c9adfb6167af6d48aee61c0fa3c33e1abde09c9eeea720eebaa4ffcc094f1c6d2f732f8534de7eb4faef90a1ff8b43dfcad70fc09afc28bde057d0efcb92ffcd85ffcdfdf4b33cf33a0ee03b7190ab719df3420fe3743fe9908f38d5f09eb3f31ed2fd1729f023b4c64ffa52ff0a70fff20008923599a279aaa2bdbba2f1ccb335ddb379eeb3bdffb3f30281c128bc62332a95c329b4ea6e1219d52abd62b36abdd72bbd4a0c3ab4d4000e22c62183db3dbeef7d7168063033733ddfac4adf3fe3f5c0d1ee083d120a09dcce1df9e20a15463a4e42465a5e52566a6e62667a7e72768a8e892c0a3e9695d905f0384df025129aa2c6a22cddc632dcda2dfe848ec2c30a2aea9d1e9c1cc6e5e6f325daff33374b4f43475b5f53576b6f676c942f0f76a10b318401f9c009137f8ba1b6bcd2d612e32b1b33afbbd97bb22fd50187fccb837cbfe712b68f020c2840a17326ce8f0612804f82676790544819f047e0c0c9148f123168bb64cffc9dbf7c89947902aa7880448100801532d61047433f024c49c3a77f2ece9f327d0a042816824540000d2a44a97326dea34a9a9633fccbd2990670091a2808e3eedead569d47724efbcfca4f50fd7af6abf86354988c881530c86e11455b3cdd0bc7af7f2edebf72fe0c03d62125270e4ee193240acaa9c3b843020c3861e299e014f980dc4679c41fe23b988662f9569961d7c0addbcbaa1427b11ecfa35ecd8b267d3ae6d69c0238e467efd71fca333c5d1407013d25d84b71fdf322eff29e9527528e2808cc37aa4fc05eb2e439863760be8e65bdbe2c7932f6ffe3c7aa154af22e14e072bd1955283ac7fdffe117ccb633397e6541f4e7e45b807606ae1ff01810063fdb1901d17e07d971e84114a382185155aa80472795c47c47e3ea444d14c3f6448c786437418c3807038471a749f8c084789429ce802835b0481803d8f00e0488b9ed4a8c585410a392491451a39de8f587c361921a8fd90233efa88f3c892a03de2248a337ac7c828495e5125115e5a81258d0ada80a32c606267662662ea71249c71ca39279d7556f3e11fd41df748883bbc08ce8a3be0b951127fbad1670b29be1168993d7232681e7a564708a22ab859c50f0148670c8f06aec6a69da18a3a2aa9a59a1a833f80046884a26ea431154844a4fac7aa029af26a96b890e5e826b3fa512b11adb6816ba39ee610c0a55954da42b25338c8e5a9d1ff4a3b2db5d516099c864b98221c0f9bb213230fd892a82d65fae9ca1faf9a880b23b98470bb42b3901cdb4082b3bcbb66ba9ac45b88b5fdfafb2fc001f755af1f6a86f9080141304091c13c109c47c342c49bf0725a3ed7a400196bbc31c71d7bfc31c820b7f0301d114f4908c5f8621cf2c7042445b22c0310bba51f2cdb7c33ce1c170b48ce3dfbcc32a3020b3d34d1451b6dc27f7048ba2721c0ea70163bf30191f41b4b4faaaab9f1ecba52302c50ed86d54318da86d329eccbf51929d385f62c3bb30d0c9947cb3d37dd75978a91514c08cb46d837c4854f0144e0bd95dea6f48dc2de6704bde0db6daf30385a85e7c662e3516f5d79be239c8d391571ffdbfd39e8a18b0ee1c44d98e2b90e507ea33610a533717ac5e776caf98396226cfa9594d33e0beb05eece0bb3bf9f363af1c51b7f7c60db3611ef8e4034808f031c96cb04f3b16b8daef0caaca03cf53aea9e7dd333fb0ebe4dc193ff07eac8abbf3efbed6be3ab1f52177a2b108913227e0ff0e7213f12630f9bebf566773e36ac407f74e0df11fcc706fca16073d94bdff7062806b749b00d10741f0633a8c10d5ae279796b82fdbc103d20dca37942f020e140688a11be20845d581cbc2a881715a030722a7c040b1927433a2c2b823b0492f97ec8860b72b088463c22127b00b337f42e09a668a20e16b60e93e560896e80e2119e08c0eeac4d88365281ff15db80c562dc8e825ee4c2000ea7b23366c18c6cc402119328c739d2b18e22f89bbb9e20c514fe0072c150a3dfb8d7843ddab08516f3e11b9d95023c02e25e4720a41f02e7c6445ac19134a3a4bc7488c92cc4d18e9efc242891e7c7f83d6194910202238151b61d98f280a5341c0c5cc80518da6e93984a412be1804024e4b26a93b4e5182f89c95f6eb293a13c263293593448e641924ef85a1ba85883300222983960261d9cd90468b2419a2390e5166869365bde1205d8848336a1600a6f3a9073d6bc1839f9a5c978764e99f6bc273e87a6c53d782b5b3001872575b0cf27f4735c86945d17c9a982813aa1a0ec0a223d1fb000060ad096c4c4a431f3ffa9d18d727448e01c4323ce19082018907e42f86816026a04910ae4a0014ca84511274827b0b47cf38c2703285ad14d5e949219ed2850832ad4f1d4f00fbb4c422fdd90431e404a2644282a29f790d4362c5505284d05f6e29902a8eeaf11536543554fd0ceb7bd737c31bd69447f3ad4b5b2b5ad7c515d3623c1cd3348a907637d805a65005774cad51475b5ea21d7a85014ecb52a7d7dc45fc51a516f9a95a7108d285edd2ad9c952962fa9f443598be050c35e2418e2a4c165f39059226cd60de9042c421b3bcc1384960ea31d4269db705ac592b30080dce96ad14acfbc56b6b7befd2d35a0961149d4b40d47bdc15cdfb0caa7cd548f6d61c155aff059ffdad21305c2cd834a1ff9dc71dab2013acdc15dd1d6d344f216b8e63d2f7a35515c361c17a9eb0c426c0d2a84f59ea1bdbc7c6fa2023b5e219a73bbafa4926ebd0880e9c2d4b101266779d3abe005335809f13dc36cb7690a70e1605d7fc8ee0d1e2c8608abd33a2e88ae15085c82f0720d051af6028797905c2f50580424664701300c5ec8ee978d096e308e73ac631c80b80aaf252d7e82705d40d8f7063da6c28f611be4fca65698943cc191a79064219cb80bcb2dc31b01105689d1f8b169dd3198c32c661f28303194a0af1844dc82a646f26a8d3cb37ebf19e70327f2046516838c571ae717cfa2000d28b20ff81c2b2fef76cc863e34a25d50d83700fffa085fa56b10160d87c4f640d2c6a5c4a3c540e91244590a6ad65c97bbe15fa9fa3586325c40036edbba509b1ab252b871a2632debdeb299b3935871458270e7336c5950a648718729c5e497aaf6c925a8b5692b816b2ef450d07e00400312d0682e47b4c66784f5acb3ad6da10e190e5356f223a61d4b546485a192a87217ecdbe9077cdac5ac1641b799789b5193c0d91b464ac602a0eac3bc9bbbae8eecb6032ef08113bce0063f38c213aef08533bce10e7f38c4232ef18953bce216bf38c633aef18d73bce31eff38c8432ef29193bce4263f39ca53aef295b3bce52e7f39cc632ef399d3bce636bf39ce73aef39df3bce73eff39d0832ef4a113bde8ff463f3ad293aef4a533bde94e7f3ad4a32ef5a953bdea56bf3ad6b3aef5ad73bdeb5eff3ad8c32ef6b193bdec663f3bdad3aef6b5b3bded6e7f3bdce32ef7b9d3bdee76bf3bdef3aef7bdf3bdef7eff3be0032ff8c113bef0863f3ce213aff8c533bef18e7f3ce4232ff9c953bef296bf3ce633aff9cd73bef39eff3ce8432ffad193bef4a63f3dea53affad5b3bef5ae7f3dec632ffbd9d3bef6b6bf3dee73affbddf3bef7beff3df0832ffce113bff8c63f3ef293affce533bff9ce7f3ef4a32ffde953bffad6bf3ef6b3affded73bffbdeff3ef8c32ffef193bffce63f3ffad3affef5b3bffdee7f3ffce32ffff9d3bffef6bf3ffef3affffdf3bffffeffff3f0006a0000e200116a0011e200226a0022e200336a0033e200446a0044e200556a0055e200666a0066e200776a0077e200886a0088e200996a0099e200aa6a00aae200bb6a00bbe200cc6a00cce200dd6a00dde200ee6a00eee200ff6a00ffe201006a1100e211116a1111e211226a1122e211336a1133e211446a1144e211556a1155e211666a1166e211776a1177e211886a1188e211996a1199e211aa6a11aae211bb6a11bbe211cc6a11cce211dd6a11dde211ee6a11eee211ff6a11ffe212006a2200e222116a2211e222226a2222e222336a2233e222446a2244e222556a2255e222666a2266e222776a2277e222886a2288e222996a2299e222aa6ffa22aae222bb6a22bbe222cc6a22cce222dd6a22dde222ee6a22eee222ff6a22ffe223006a3300e233116a3311e233226a3322e233336a3333e233446a3344e233556a3355e233666a3366e233776a3377e233886a3388e233996a3399e233aa6a33aae233bb6a33bbe233cc6a33cce233dd6a33dde233ee6a33eee233ff6a33ffe234006a4400e244116a4411e244226a4422e244336a4433e244446a4444e244556a4455e244666a4466e244776a4477e244886a4488e244996a4499e244aa6a44aae244bb6a44bbe244cc6a44cce244dd6a44dde244ee6a44eee244ff6a44ffe245006a5500e255116a5511e255226a5522e255336a5533e255446a5544eff255556a5555e255666a5566e255776a5577e255886a5588e255996a5599e255aa6a55aae255bb6a55bbe255cc6a55cce255dd6a55dde255ee6a55eee255ff6a55ffe256006a6600e266116a6611e266226a6622e266336a6633e266446a6644e266556a6655e266666a6666e266776a6677e266886a6688e266996a6699e266aa6a66aae266bb6a66bbe266cc6a66cce266dd6a66dde266ee6a66eee266ff6a66ffe267006a7700e277116a7711e277226a7722e277336a7733e277446a7744e277556a7755e277666a7766e277776a7777e277886a7788e277996a7799e277aa6a77aae277bb6a77bbe277cc6a77cce277dd6a77dde277ee6a77eee277ff6ffa77ffe278006a8800e288116a8811e288226a8822e288336a8833e288446a8844e288556a8855e288666a8866e288776a8877e288886a8888e288996a8899e288aa6a88aae288bb6a88bbe288cc6a88cce288dd6a88dde288ee6a88eee288ff6a88ffe289006a9900e299116a9911e299226a9922e299336a9933e299446a9944e299556a9955e299666a9966e299776a9977e299886a9988e299996a9999e299aa6a99aae299bb6a99bbe299cc6a99cce299dd6a99dde299ee6a99eee299ff6a99ffe29a006aaa00e2aa116aaa11e2aa226aaa22e2aa336aaa33e2aa446aaa44e2aa556aaa55e2aa666aaa66e2aa776aaa77e2aa886aaa88e2aa996aaa99eff2aaaa6aaaaae2aabb6aaabbe2aacc6aaacce2aadd6aaadde2aaee6aaaeee2aaff6aaaffe2ab006abb00e2bb116abb11e2bb226abb22e2bb336abb33e2bb446abb44e2bb556abb55e2bb666abb66e2bb776abb77e2bb886abb88e2bb996abb99e2bbaa6abbaae2bbbb6abbbbe2bbcc6abbcce2bbdd6abbdde2bbee6abbeee2bbff6abbffe2bc006acc00e2cc116acc11e2cc226acc22e2cc336acc33e2cc446acc44e2cc556acc55e2cc666acc66e2cc776acc77e2cc886acc88e2cc996acc99e2ccaa6accaae2ccbb6accbbe2cccc6acccce2ccdd6accdde2ccee6acceee2ccff6accffe2cd006add00e2dd116add11e2dd226add22e2dd336add33e2dd446ffadd44e2dd556add55e2dd666add66e2dd776add77e2dd886add88e2dd996add99e2ddaa6addaae2ddbb6addbbe2ddcc6addcce2dddd6adddde2ddee6addeee2ddff6addffe2de006aee00e2ee116aee11e2ee226aee22e2ee336aee33e2ee446aee44e2ee556aee55e2ee666aee66e2ee776aee77e2ee886aee88e2ee996aee99e2eeaa6aeeaae2eebb6aeebbe2eecc6aeecce2eedd6aeedde2eeee6aeeeee2eeff6aeeffe2ef006aff00e2ff116aff11e2ff226aff22e2ff336aff33e2ff446aff44e2ff556aff55e2ff666aff66e2ff776aff77e2ff886aff88e2ff996aff99e2ffaa6affaae2ffbb6affbbe2ffcc6affcce2ffdd6affdde2ffee6affeeeff2ffff6affffe2f0007b0000f300117b0011f300227b0022f300337b0033f300447b0044f300557b0055f300667b0066f300777b0077f300887b0088f300997b0099f300aa7b00aaf300bb7b00bbf300cc7b00ccf300dd7b00ddf300ee7b00eef300ff7b00fff301007b1100f311117b1111f311227b1122f311337b1133f311447b1144f311557b1155f311667b1166f311777b1177f311887b1188f311997b1199f311aa7b11aaf311bb7b11bbf311cc7b11ccf311dd7b11ddf311ee7b11eef311ff7b11fff312007b2200f322117b2211f322227b2222f322337b2233f322447b2244f322557b2255f322667b2266f322777b2277f322887b2288f3229979fb2299f322aa7b22aaf322bb7b22bbf322cc7b22ccf322dd7b22ddf322ee7b22eef322ff7b22fff323007b3300f333117b3311f333227b3322f333337b3333f333447b3344f333557b3355f333667b3366f333777b3377f333887b3388f333997b3399f333aa7b33aaf333bb7b33bbf333cc7b33ccf333dd7b33ddf333ee7b33eef333ff7b33fff334007b4400f344117b4411f344227b4422f34433f6a0800003b, 4500.00, 1, NULL, NULL, '0', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wl_otp`
--

CREATE TABLE `wl_otp` (
  `otpId` int(11) NOT NULL,
  `mobile_number` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `otp` int(10) NOT NULL,
  `status` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `wl_otp`
--

INSERT INTO `wl_otp` (`otpId`, `mobile_number`, `otp`, `status`) VALUES
(1, '9910505554', 21465, '1'),
(2, '9910505554', 723468, '1'),
(3, '9910505554', 26517, '1'),
(4, '9910505554', 163485, '1'),
(5, '9910505554', 347659, '1'),
(6, '9910505554', 821693, '1'),
(7, '9910505554', 364810, '0'),
(8, '9910505554', 982356, '1'),
(9, '9910505554', 196382, '1'),
(10, '9910505554', 931460, '1'),
(11, '9910505554', 192438, '0'),
(12, '9910505554', 458693, '0'),
(13, '9910505554', 645983, '0'),
(14, '9910505554', 279431, '0'),
(15, '9910505554', 678392, '0'),
(16, '9910505554', 849257, '0');

-- --------------------------------------------------------

--
-- Table structure for table `wl_payment_details`
--

CREATE TABLE `wl_payment_details` (
  `payment_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `phone` bigint(11) DEFAULT NULL,
  `address_line_1` text,
  `address_line_2` text,
  `country` text,
  `state` text,
  `city` text,
  `zipcode` int(11) DEFAULT NULL,
  `udf1` int(11) DEFAULT NULL,
  `udf2` int(11) DEFAULT NULL,
  `udf3` int(11) DEFAULT NULL,
  `udf4` int(11) DEFAULT NULL,
  `udf5` int(11) DEFAULT NULL,
  `busi_id` int(11) DEFAULT NULL,
  `response_message` varchar(100) DEFAULT NULL,
  `response_code` int(11) DEFAULT NULL,
  `transaction_id` varchar(100) DEFAULT NULL,
  `payment_method` text,
  `payment_datetime` text,
  `hash` text NOT NULL,
  `currency` text,
  `description` varchar(150) DEFAULT NULL,
  `amount` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wl_pick_point`
--

CREATE TABLE `wl_pick_point` (
  `setId` int(11) NOT NULL,
  `pickup_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `pickup_city` varchar(140) DEFAULT NULL,
  `pickup_address` text,
  `status` enum('0','1','2') NOT NULL DEFAULT '1' COMMENT '1=active,0=inactive,2=deleted',
  `added_date` datetime NOT NULL,
  `updated_date` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `wl_products`
--

CREATE TABLE `wl_products` (
  `products_id` int(11) NOT NULL,
  `category_id` varchar(80) NOT NULL COMMENT 'parent_id= last level of category ',
  `store_id` varchar(250) DEFAULT NULL,
  `category_links` varchar(80) NOT NULL,
  `product_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `product_name_p` varchar(220) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_alt` varchar(100) DEFAULT NULL,
  `friendly_url` varchar(110) DEFAULT NULL,
  `product_code` varchar(64) NOT NULL,
  `product_brand` int(11) DEFAULT NULL,
  `product_qty` decimal(10,0) NOT NULL DEFAULT '0',
  `color_ids` varchar(160) DEFAULT NULL,
  `size_ids` varchar(160) DEFAULT NULL,
  `products_attributes` text,
  `products_description` text NOT NULL COMMENT 'full description',
  `products_description_p` text,
  `products_custom_description` text,
  `products_custom_description_p` text,
  `products_size_chart` varbinary(200) DEFAULT NULL,
  `product_price` decimal(10,2) DEFAULT NULL,
  `product_discounted_price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `newarrival_product` enum('1','0') NOT NULL DEFAULT '0' COMMENT '1=Yes,0=No',
  `popular_product` enum('0','1') NOT NULL DEFAULT '0',
  `product_type` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 = product, 1 = catalog',
  `status` enum('0','1','2') NOT NULL DEFAULT '1' COMMENT '1=active,0=inactive,2=deleted',
  `product_added_date` datetime NOT NULL,
  `product_updated_date` datetime DEFAULT NULL,
  `products_viewed` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `bestseller_product` enum('0','1') NOT NULL DEFAULT '0',
  `special_product` enum('0','1') NOT NULL DEFAULT '0',
  `coming_product` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wl_products`
--

INSERT INTO `wl_products` (`products_id`, `category_id`, `store_id`, `category_links`, `product_name`, `product_name_p`, `product_alt`, `friendly_url`, `product_code`, `product_brand`, `product_qty`, `color_ids`, `size_ids`, `products_attributes`, `products_description`, `products_description_p`, `products_custom_description`, `products_custom_description_p`, `products_size_chart`, `product_price`, `product_discounted_price`, `newarrival_product`, `popular_product`, `product_type`, `status`, `product_added_date`, `product_updated_date`, `products_viewed`, `bestseller_product`, `special_product`, `coming_product`) VALUES
(4, '2', NULL, '2,1', 'Pen Making Machine', NULL, 'Pen Making Machine 1', 'pen-making-machine-1', '10', NULL, 0, NULL, NULL, 'false', '<p>Product Details:</p>\n\n<div>\n<table>\n	<tbody>\n		<tr>\n			<td>Minimum Order Quantity</td>\n			<td>1 Unit</td>\n		</tr>\n		<tr>\n			<td>Brand</td>\n			<td>BI</td>\n		</tr>\n		<tr>\n			<td>Production Capacity</td>\n			<td>10000</td>\n		</tr>\n		<tr>\n			<td>Power Consumption</td>\n			<td>320 V</td>\n		</tr>\n		<tr>\n			<td>Material of Construction</td>\n			<td>Stainless steel</td>\n		</tr>\n		<tr>\n			<td>Control Type</td>\n			<td>PLC</td>\n		</tr>\n	</tbody>\n</table>\n</div>', NULL, '', NULL, NULL, 450000.00, 0.00, '0', '0', '0', '1', '2019-04-06 08:00:51', NULL, 25, '0', '0', '0'),
(6, '2', NULL, '2,1', 'Automatic Pen Making Machine', NULL, 'Automatic Pen Making Machine', 'automatic-pen-making-machine', '0', NULL, 0, NULL, NULL, '\"\"', '<table>\n	<tbody>\n		<tr>\n			<td>Minimum Order Quantity</td>\n			<td>1 Piece</td>\n		</tr>\n		<tr>\n			<td>Driven Type</td>\n			<td>Electric</td>\n		</tr>\n		<tr>\n			<td>Power Source</td>\n			<td>2 Phase /220 V</td>\n		</tr>\n		<tr>\n			<td>Machine Material</td>\n			<td>Steel</td>\n		</tr>\n		<tr>\n			<td>Machine Type</td>\n			<td>Automatic</td>\n		</tr>\n	</tbody>\n</table>', NULL, '<p>Blu Impex is among the best Fully Automatic Pen Making Machine manufacturers. The equipment is the best for companies in the stationery industry. They would be manufacturing pens in large quantities. For those requirements, they would need an automatic machine that can manufacture pens without manual intervention.<br />\n<br />\nFeatures<br />\n<br />\nThis Fully Automatic Pen making machine in delhi is ideally suited for high volume production of quality pens. The entire process of manufacturing is automated. This makes it easy for mass production and the best equipment for top companies. The availability of a control panel for easy operations and durability are the key features.<br />\n<br />\nWhy buy from us?<br />\n<br />\nBlu Impex is the best Fully Automatic Pen making machine suppliers. The pen machine they supply is cost effective and ideal for mass production of quality pens. This is the ideal option for pen manufacturers. It is true value for money thanks to its superior quality.</p>', NULL, NULL, 420000.00, 0.00, '0', '0', '0', '1', '2019-04-06 08:08:13', NULL, 5, '0', '0', '0'),
(15, '5', NULL, '5,1', 'Automatic Noodles Making Machines', NULL, 'Automatic Noodles Making Machines', 'automatic-noodles-making-machines', '1', NULL, 0, NULL, NULL, 'false', '<p>Blu Impex is one of the top Automatic Noodles Making Machine manufacturers. Companies in the food product industry that make noodles and sell them in the market would find them handy. The top companies that mass produce noodles packets would find the automatic noodles maker a very apt product. These machines make the process of noodles preparation easy and convenient.</p>\n\n<p><strong>Features</strong></p>\n\n<table>\n	<tbody>\n		<tr>\n			<td>Minimum Order Quantity</td>\n			<td>1 Set</td>\n		</tr>\n		<tr>\n			<td>Dimension (Millimeter)</td>\n			<td>13.5</td>\n		</tr>\n		<tr>\n			<td>Automatic Grade</td>\n			<td>Automatic</td>\n		</tr>\n		<tr>\n			<td>Machine Power (kw)</td>\n			<td>0-40</td>\n		</tr>\n		<tr>\n			<td>Machine Type</td>\n			<td>7-Stage</td>\n		</tr>\n		<tr>\n			<td>Phase</td>\n			<td>single</td>\n		</tr>\n		<tr>\n			<td>Warranty</td>\n			<td>3years</td>\n		</tr>\n		<tr>\n			<td>Weight (kg)</td>\n			<td>790</td>\n		</tr>\n		<tr>\n			<td>Model Number</td>\n			<td>BIN 6-252</td>\n		</tr>\n		<tr>\n			<td>Number Of Roller</td>\n			<td>14</td>\n		</tr>\n		<tr>\n			<td>Motor</td>\n			<td>3HP</td>\n		</tr>\n		<tr>\n			<td>Output</td>\n			<td>300-350 kg/hr</td>\n		</tr>\n		<tr>\n			<td>I deal in</td>\n			<td>New Only</td>\n		</tr>\n		<tr>\n			<td>Condition</td>\n			<td>New</td>\n		</tr>\n	</tbody>\n</table>', NULL, '<div>\n<p>We are offering a wide range of<strong>&nbsp;Automatic Noodles Making Machine</strong>.</p>\n</div>\n\n<div>\n<p>Additional Information:</p>\n\n<ul>\n	<li><strong>Item Code:</strong>&nbsp;BIN6252</li>\n	<li><strong>Port of Dispatch:&nbsp;</strong>Chennai</li>\n	<li><strong>Packaging Details:&nbsp;</strong>Wooden Packing</li>\n</ul>\n</div>', NULL, NULL, 330000.00, 0.00, '0', '0', '0', '1', '2019-04-12 11:13:23', NULL, 3, '0', '0', '0'),
(10, '18', NULL, '18,15,1', 'Ultra Sonic Sealing Machine', NULL, 'Ultra Sonic Sealing Machine', 'ultra-sonic-sealing-machine', '0', NULL, 0, NULL, NULL, '\"\"', '<div>\n<div>\n<table>\n	<tbody>\n		<tr>\n			<td>Minimum Order Quantity</td>\n			<td>1 Unit</td>\n		</tr>\n		<tr>\n			<td>Brand</td>\n			<td>BI-515</td>\n		</tr>\n		<tr>\n			<td>Capacity</td>\n			<td>0-15mtr/min</td>\n		</tr>\n	</tbody>\n</table>\n</div>\n<br />\nUltrasonic Sewing Machine/ Lace Cutting<br />\nOutput: 1800w<br />\nVoltage: 220v<br />\nRoller Size: 0-60mmWorking Speed: 0-15mtr/min<br />\nNet Weight:90kg</div>\n\n<div>&nbsp;\n<p><br />\nAdditional Information:</p>\n\n<ul>\n	<li><strong>Delivery Time:&nbsp;</strong>3-4days</li>\n	<li><strong>Packaging Details:&nbsp;</strong>Cover Packaing</li>\n</ul>\n</div>', NULL, '', NULL, NULL, 70000.00, 0.00, '0', '0', '0', '1', '2019-04-10 08:48:58', NULL, 8, '0', '0', '0'),
(11, '17', NULL, '17,15,1', 'Automatic Non Woven Bag Making Machine', NULL, 'Automatic Non Woven Bag Making Machine', 'automatic-non-woven-bag-making-machine', '0', NULL, 0, NULL, NULL, '\"\"', '<table>\n	<tbody>\n		<tr>\n			<td>Minimum Order Quantity</td>\n			<td>1 Unit</td>\n		</tr>\n		<tr>\n			<td>Type Of Bag</td>\n			<td>Shopping Bag</td>\n		</tr>\n		<tr>\n			<td>Bag Material</td>\n			<td>Other</td>\n		</tr>\n		<tr>\n			<td>Capacity</td>\n			<td>100-120 (Pieces per hour)</td>\n		</tr>\n		<tr>\n			<td>Brand</td>\n			<td>Blu</td>\n		</tr>\n		<tr>\n			<td>Voltage</td>\n			<td>15Kw</td>\n		</tr>\n		<tr>\n			<td>Condition</td>\n			<td>New</td>\n		</tr>\n		<tr>\n			<td>Power</td>\n			<td>220v-380v</td>\n		</tr>\n		<tr>\n			<td>Max Bag Length</td>\n			<td>200-600mm</td>\n		</tr>\n		<tr>\n			<td>Max Bag Width</td>\n			<td>100-800mm</td>\n		</tr>\n		<tr>\n			<td>Bag Size</td>\n			<td>200-600mm</td>\n		</tr>\n		<tr>\n			<td>Machine Type</td>\n			<td>Fully Automatic</td>\n		</tr>\n		<tr>\n			<td>Model</td>\n			<td>BI-2013</td>\n		</tr>\n		<tr>\n			<td>Fabric</td>\n			<td>Non woven Bag</td>\n		</tr>\n	</tbody>\n</table>', NULL, '', NULL, NULL, 1150000.00, 0.00, '0', '0', '0', '1', '2019-04-10 08:52:49', NULL, 6, '0', '0', '0'),
(12, '16', NULL, '16,15,1', 'Semi Automatic Non-woven Bag Making Machine', NULL, 'Semi Automatic Non-woven Bag Making Machine', 'semi-automatic-non-woven-bag-making-machine', '0', NULL, 0, NULL, NULL, '\"\"', '<table>\n	<tbody>\n		<tr>\n			<td>Minimum Order Quantity</td>\n			<td>1 1 Set</td>\n		</tr>\n		<tr>\n			<td>Usage/Application</td>\n			<td>New</td>\n		</tr>\n		<tr>\n			<td>Type Of Bag</td>\n			<td>Shopping Bag</td>\n		</tr>\n		<tr>\n			<td>Max Bag Length</td>\n			<td>300-400 mm, 100-200 mm, 1-100 mm, 400-500 mm, 200-300 mm</td>\n		</tr>\n		<tr>\n			<td>Capacity(Pieces per hour)</td>\n			<td>80-100</td>\n		</tr>\n		<tr>\n			<td>Bag Size (inch)</td>\n			<td>100-200mm, 200-300mm, 300-400mm 400-500mm</td>\n		</tr>\n		<tr>\n			<td>Condition</td>\n			<td>New</td>\n		</tr>\n		<tr>\n			<td>Brand</td>\n			<td>BIu Impex</td>\n		</tr>\n		<tr>\n			<td>Model No.</td>\n			<td>BINW-212</td>\n		</tr>\n		<tr>\n			<td>Voltage</td>\n			<td>220v</td>\n		</tr>\n		<tr>\n			<td>Machine Weight</td>\n			<td>100</td>\n		</tr>\n	</tbody>\n</table>', NULL, '', NULL, NULL, 115000.00, 0.00, '0', '0', '0', '1', '2019-04-10 08:55:49', NULL, 0, '0', '0', '0'),
(13, '12', NULL, '12,9,1', 'Automatic Paper Pencil Making Machine', NULL, 'Automatic Paper Pencil Making Machine', 'automatic-paper-pencil-making-machine', '0', NULL, 0, NULL, NULL, '\"\"', '<p>Product Details:</p>\n\n<div>\n<table>\n	<tbody>\n		<tr>\n			<td>Minimum Order Quantity</td>\n			<td>1 Set</td>\n		</tr>\n		<tr>\n			<td>Power(W)</td>\n			<td>14.4</td>\n		</tr>\n		<tr>\n			<td>Driven Type</td>\n			<td>Electric</td>\n		</tr>\n		<tr>\n			<td>Cylinder Head Volume</td>\n			<td>95-130cm3</td>\n		</tr>\n		<tr>\n			<td>Machine Weight</td>\n			<td>550 Kg</td>\n		</tr>\n	</tbody>\n</table>\n</div>\n\n<p>Backed by a team of knowledgeable professionals, we are an identified firm in the market for providing an extensive range of&nbsp;<strong>Automatic Paper</strong><strong>Pencil Making Machine.</strong></p>', NULL, '', NULL, NULL, 400000.00, 0.00, '0', '0', '0', '1', '2019-04-11 07:26:36', NULL, 0, '0', '0', '0'),
(14, '14', NULL, '14,13,1', 'Pasta Making Machine', NULL, 'Pasta Making Machine', 'pasta-making-machine', '0', NULL, 0, NULL, NULL, '\"\"', '<div>\n<div>\n<table>\n	<tbody>\n		<tr>\n			<td>Minimum Order Quantity</td>\n			<td>1 Unit</td>\n		</tr>\n		<tr>\n			<td>Machine Type</td>\n			<td>Automatic</td>\n		</tr>\n		<tr>\n			<td>Capacity</td>\n			<td>150 kg/h</td>\n		</tr>\n		<tr>\n			<td>Power Consumption</td>\n			<td>10KW</td>\n		</tr>\n		<tr>\n			<td>Weight</td>\n			<td>1500 kg</td>\n		</tr>\n		<tr>\n			<td>Machine Material</td>\n			<td>Stainless Steel</td>\n		</tr>\n		<tr>\n			<td>Power</td>\n			<td>30 kW</td>\n		</tr>\n		<tr>\n			<td>Voltage</td>\n			<td>220 V</td>\n		</tr>\n		<tr>\n			<td>Driven Type</td>\n			<td>Electric</td>\n		</tr>\n	</tbody>\n</table>\n</div>\n<br />\nWe offer to our honored patrons the first-class range of&nbsp;<strong>Pasta Making Machine.</strong>&nbsp;Furthermore, our patrons can avail this product from us at affordable rates.</div>\n\n<div>&nbsp;\n<p><br />\nAdditional Information:</p>\n\n<ul>\n	<li><strong>Item Code:</strong>&nbsp;BI-989</li>\n	<li><strong>Pay Mode Terms:&nbsp;</strong>T/T (Bank Transfer)</li>\n	<li><strong>Delivery Time:&nbsp;</strong>30-45days</li>\n	<li><strong>Packaging Details:&nbsp;</strong>Wooden Packing</li>\n</ul>\n</div>', NULL, '', NULL, NULL, 390000.00, 0.00, '0', '0', '0', '1', '2019-04-11 07:53:03', NULL, 0, '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `wl_products_back`
--

CREATE TABLE `wl_products_back` (
  `products_id` int(11) NOT NULL,
  `category_id` varchar(80) NOT NULL COMMENT 'parent_id= last level of category ',
  `store_id` varchar(250) DEFAULT NULL,
  `category_links` varchar(80) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_name_p` varchar(220) DEFAULT NULL,
  `product_alt` varchar(100) DEFAULT NULL,
  `friendly_url` varchar(110) DEFAULT NULL,
  `product_code` varchar(64) NOT NULL,
  `product_brand` int(11) DEFAULT NULL,
  `product_qty` decimal(10,2) NOT NULL DEFAULT '0.00',
  `color_ids` varchar(160) DEFAULT NULL,
  `size_ids` varchar(160) DEFAULT NULL,
  `products_attributes` text,
  `products_description` text NOT NULL COMMENT 'full description',
  `products_description_p` text,
  `products_custom_description` text,
  `products_custom_description_p` text,
  `products_size_chart` varbinary(200) DEFAULT NULL,
  `product_price` decimal(10,2) DEFAULT NULL,
  `product_discounted_price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `newarrival_product` enum('1','0') NOT NULL DEFAULT '0' COMMENT '1=Yes,0=No',
  `popular_product` enum('0','1') NOT NULL DEFAULT '0',
  `product_type` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 = product, 1 = catalog',
  `status` enum('0','1','2') NOT NULL DEFAULT '1' COMMENT '1=active,0=inactive,2=deleted',
  `product_added_date` datetime NOT NULL,
  `product_updated_date` datetime DEFAULT NULL,
  `products_viewed` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `bestseller_product` enum('0','1') NOT NULL DEFAULT '0',
  `special_product` enum('0','1') NOT NULL DEFAULT '0',
  `coming_product` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `wl_products_media`
--

CREATE TABLE `wl_products_media` (
  `id` int(10) UNSIGNED NOT NULL,
  `products_id` int(10) UNSIGNED NOT NULL,
  `media_type` enum('photo','video','pdf') NOT NULL DEFAULT 'photo',
  `media` varchar(255) NOT NULL,
  `is_default` enum('Y','N') NOT NULL DEFAULT 'N',
  `sort_order` int(11) DEFAULT NULL,
  `media_date_added` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wl_products_media`
--

INSERT INTO `wl_products_media` (`id`, `products_id`, `media_type`, `media`, `is_default`, `sort_order`, `media_date_added`) VALUES
(1, 1, 'photo', 'comming_soong37v.jpg', 'Y', NULL, '2019-02-28 13:01:55'),
(2, 4, 'photo', 'pen-making-machine-1i3CC.png', 'Y', NULL, '2019-04-06 08:00:51'),
(3, 5, 'photo', 'Manuel_pen_making_machineKhE9.jpg', 'Y', NULL, '2019-04-06 08:04:51'),
(4, 6, 'photo', 'Automatic_Pen_Making_MachineXztf.jpg', 'Y', NULL, '2019-04-06 08:08:13'),
(5, 7, 'photo', 'Automatic_Noodles_Making_Machine_1WTUp.png', 'Y', NULL, '2019-04-06 08:13:17'),
(6, 7, 'photo', 'Automatic_Noodles_Making_Machine_3opKn.jpg', 'N', NULL, '2019-04-06 08:13:17'),
(7, 7, 'photo', 'Automatic_Noodles_Making_Machine_25QAe.jpg', 'N', NULL, '2019-04-06 08:13:17'),
(8, 8, 'photo', 'AM_Noodles_Making_Machine_230000_115cW.jpg', 'Y', NULL, '2019-04-06 08:17:12'),
(9, 8, 'photo', 'AM_Noodles_Making_Machine_230000jms3.jpg', 'N', NULL, '2019-04-06 08:17:12'),
(10, 9, 'photo', 'Semi_-_Automatic_Noodles_Making_MachineBdbl.jpg', 'Y', NULL, '2019-04-06 08:19:43'),
(11, 10, 'photo', 'Ultra_Sonic_Sealing_Machinefhtk.jpg', 'Y', NULL, '2019-04-10 08:48:58'),
(12, 11, 'photo', 'Automatic_Non_Woven_Bag_Making_MachinecycK.jpg', 'Y', NULL, '2019-04-10 08:52:49'),
(13, 12, 'photo', 'Automatic_Non-woven_Bag_Making_Machine_semii5Zf.jpg', 'Y', NULL, '2019-04-10 08:55:49'),
(14, 13, 'photo', 'paper-pencil-making-machineNSGh.jpg', 'Y', NULL, '2019-04-11 07:26:36'),
(15, 14, 'photo', 'pasta-machine-250x250JIL0.jpg', 'Y', NULL, '2019-04-11 07:53:03'),
(16, 15, 'photo', 'Automatic_Noodles_Making_Machine_1WTUp.png', 'Y', NULL, '2019-04-12 11:15:08'),
(17, 15, 'photo', 'Automatic_Noodles_Making_Machine_3opKn.jpg', 'N', NULL, '2019-04-12 11:15:08'),
(18, 15, 'photo', 'Automatic_Noodles_Making_Machine_25QAe.jpg', 'N', NULL, '2019-04-12 11:15:08');

-- --------------------------------------------------------

--
-- Table structure for table `wl_products_related`
--

CREATE TABLE `wl_products_related` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `related_id` int(11) NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1' COMMENT '1=active,0=inactive,2=deleted',
  `sort_order` int(11) DEFAULT NULL,
  `related_date_added` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wl_product_attributes`
--

CREATE TABLE `wl_product_attributes` (
  `attribute_id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `store_id` bigint(20) DEFAULT NULL,
  `quantity` bigint(20) DEFAULT NULL,
  `used_quantity` bigint(11) DEFAULT '0',
  `product_price` float(15,2) DEFAULT NULL,
  `product_discounted_price` float(15,2) DEFAULT NULL,
  `status` enum('0','1','2') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1' COMMENT '1=active,0=inactive,2=deleted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wl_product_comments`
--

CREATE TABLE `wl_product_comments` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `customers_id` int(11) NOT NULL,
  `comments` text COLLATE utf8_unicode_ci,
  `status` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `subscribed` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wl_product_enquiry`
--

CREATE TABLE `wl_product_enquiry` (
  `id` int(11) NOT NULL,
  `type` enum('1','2','3') NOT NULL DEFAULT '3' COMMENT '1=Enquiries,2=Suggestioin,3=Contact us',
  `customer_id` int(11) DEFAULT '0',
  `product_id` int(11) NOT NULL,
  `product_service` varchar(220) DEFAULT NULL,
  `email` varchar(80) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `company_name` varchar(60) DEFAULT NULL,
  `country` varchar(200) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `mobile_number` varchar(30) DEFAULT NULL,
  `address` varchar(220) DEFAULT NULL,
  `zipcode` varchar(10) DEFAULT NULL,
  `message` text NOT NULL,
  `status` enum('1','2') NOT NULL,
  `reply_status` enum('Y','N') NOT NULL DEFAULT 'N',
  `receive_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wl_review`
--

CREATE TABLE `wl_review` (
  `review_id` int(11) NOT NULL,
  `entity_id` int(11) NOT NULL,
  `entity_type` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  `customer_id` int(11) NOT NULL,
  `ads_rating` int(11) NOT NULL,
  `author` varchar(70) COLLATE utf8_bin DEFAULT NULL,
  `author_email` varchar(80) COLLATE utf8_bin DEFAULT NULL,
  `text` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('0','1','2') COLLATE utf8_bin NOT NULL DEFAULT '0',
  `review_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `wl_review`
--

INSERT INTO `wl_review` (`review_id`, `entity_id`, `entity_type`, `customer_id`, `ads_rating`, `author`, `author_email`, `text`, `status`, `review_date`) VALUES
(1, 1, 'product', 15, 1, 'John Martin', 'test@gmail.com', 'testfgfg', '1', '2017-10-17 15:54:45'),
(2, 1, 'product', 15, 2, 'John Martin', 'test@gmail.com', 'testfgfg', '1', '2017-10-17 15:54:47'),
(3, 4, 'product', 15, 3, 'tets', 'test@gmail.com', 'test', '1', '2017-10-17 17:07:56'),
(4, 2, 'product', 19, 4, 'Fedrish', 'fedrishp@gmail.com', 'vcbv dfbdb gdff ghdf', '1', '2017-10-17 19:33:19'),
(5, 797, 'product', 19, 3, 'Fedrish Popatiya', 'fedrishp@gmail.com', 'Best PDT', '1', '2017-12-01 13:28:20'),
(6, 795, 'product', 19, 1, 'Fedrish Popatiya', 'fedrishp@gmail.com', 'Best Pdt', '1', '2017-12-01 14:41:50'),
(7, 795, 'product', 19, 1, 'Fedrish Popatiya', 'fedrishp@gmail.com', 'bmbnkkln', '1', '2017-12-01 14:42:31'),
(8, 101, 'product', 19, 4, 'Fedrish Popatiya', 'fedrishp@gmail.com', 'Nice one', '1', '2017-12-02 13:18:12');

-- --------------------------------------------------------

--
-- Table structure for table `wl_shipping_cod`
--

CREATE TABLE `wl_shipping_cod` (
  `id` int(11) NOT NULL,
  `free_cod_amt` decimal(10,2) NOT NULL DEFAULT '0.00',
  `cod_amt` decimal(10,2) NOT NULL DEFAULT '0.00',
  `free_ship_amt` decimal(10,2) NOT NULL DEFAULT '0.00',
  `ship_amt` decimal(10,2) NOT NULL DEFAULT '0.00',
  `status` enum('N','Y') NOT NULL DEFAULT 'Y'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wl_sizes`
--

CREATE TABLE `wl_sizes` (
  `size_id` int(11) NOT NULL,
  `size_name` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `size_date_added` datetime DEFAULT NULL,
  `size_date_updated` datetime DEFAULT NULL,
  `sort_order` int(3) DEFAULT NULL,
  `status` enum('0','1','2') COLLATE latin1_general_ci NOT NULL DEFAULT '1' COMMENT '0=Inactive,1=Active,2=Delete'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wl_store`
--

CREATE TABLE `wl_store` (
  `setId` int(11) NOT NULL,
  `location_id` int(11) DEFAULT NULL,
  `store_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1' COMMENT '1=active,0=inactive,2=deleted',
  `added_date` datetime NOT NULL,
  `updated_date` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wl_store`
--

INSERT INTO `wl_store` (`setId`, `location_id`, `store_name`, `status`, `added_date`, `updated_date`) VALUES
(6, 1, 'test test', '1', '2017-12-29 10:52:00', '2017-12-29 14:47:23');

-- --------------------------------------------------------

--
-- Table structure for table `wl_subcontent`
--

CREATE TABLE `wl_subcontent` (
  `subcontentId` int(11) NOT NULL,
  `category_id` varchar(160) NOT NULL,
  `location_id` text,
  `page_heading` varchar(220) DEFAULT NULL,
  `description` text,
  `short_description` text,
  `meta_title` text,
  `meta_keyword` text,
  `meta_description` text,
  `meta_key1` varchar(160) DEFAULT NULL,
  `meta_key2` varchar(160) DEFAULT NULL,
  `meta_key3` varchar(160) DEFAULT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wl_subcontent`
--

INSERT INTO `wl_subcontent` (`subcontentId`, `category_id`, `location_id`, `page_heading`, `description`, `short_description`, `meta_title`, `meta_keyword`, `meta_description`, `meta_key1`, `meta_key2`, `meta_key3`, `status`) VALUES
(1, '2', '1425,1407,1418,1415,1430,1409,1416,1417,1408,1427,1428,1414,1421,1426,1413,1429,1412,1420,1423,1432,1434,1431,1422,1424,1433,1419', '', '<p>If you belong to the&nbsp;stationary&nbsp;industry and are looking for a {catname} manufacturer then we are the ones! We believe in&nbsp;quality&nbsp;of work and we prove that statement when we deliver our products to you. We have two types of {catname} in our inventory, one is fully Automatic {catname} and the other is Direct Filling {catname}. You can check the specifications from the page and decide upon which one to purchase.</p>', 'If you belong to the stationary industry and are looking for a {catname} manufacturer then we are the ones! We believe in quality of work and we prove that statement when we deliver our products to you.', '{catname} Manufacturers in {location}, {catname} Suppliers in {location}', '{catname} Manufacturers in {location}, Wholesale {catname} in {location}, {catname} Exporters India, {catname} Suppliers in {location}', '{catname} Manufacturers in {location} - blu impex Most Trusted {catname} wholesale suppliers, Best Quality {catname} exporters India. Leading Industry since 2016. Best Price.', '', '', '', '1'),
(2, '3', '1425,1407,1418,1415,1430,1409,1416,1417,1408,1427,1428,1414,1421,1426,1413,1429,1412,1420,1423,1432,1434,1431,1422,1424,1433,1419', '', '<p>manufacturing pens in large numbers and having a few machines in your work place can be a little clumsy. You need to employ one more machine if you feel that your work takes a little longer. You can buy the machine from Blu Impex, we are the leading <strong>{catname} in {location}</strong>.</p>\n\n<h2>We have been in this business for a long time</h2>\n\n<p>The <strong>{catname} in {location}</strong> are made by keeping the clients and his demands in mind. We have been in this business for 13 years and we know what is expected out of us in the first place.</p>\n\n<h2>Why us?</h2>\n\n<p>We provide our clients with the best machinery in the town. Being one of the best <strong>{catname}&nbsp;</strong>suppliers we understand the demands of our customers and utilize raw materials which are of super quality in nature.</p>', 'manufacturing pens in large numbers and having a few machines in your work place can be a little clumsy. You need to employ one more machine if you feel that your work takes a little longer.', '{catname} Manufacturers in {location}, {catname} Suppliers in {location}', '{catname} Manufacturers in {location}, Wholesale {catname} in {location}, {catname} Exporters India, {catname} Suppliers in {location}', '{catname} Manufacturers in {location} - blu impex Most Trusted {catname} wholesale suppliers, Best Quality {catname} exporters India. Leading Industry since 2016. Best Price.', '', '', '', '1'),
(3, '4', '1425,1407,1418,1415,1430,1409,1416,1417,1408,1427,1428,1414,1421,1426,1413,1429,1412,1420,1423,1432,1434,1431,1422,1424,1433,1419', '', '<p>If you wish for a machinery which gives you bulk output then you should definitely go for <strong>{catname} in {location}</strong>. We provide you with the best quality machinery and make sure that it provides you an amazing output during the production hours.</p>\n\n<h2>We are affordable</h2>\n\n<p>Production machinery are very important and that that is the reason they are very expensive to buy. We assure you superior quality machinery and that too at a very reasonable price. We are one of the leading <strong>{catname} manufacturers in {location}.</strong></p>\n\n<h2>We provide you the best quality</h2>\n\n<p>Machinery are the most important part of any production place and hence it is important that you buy a great product from a trusted {catname} supplier. We bring you the best quality machinery which is made of superior quality raw materials and gives you a great output during production.</p>', 'If you wish for a machinery which gives you bulk output then you should definitely go for {catname} in {location}. We provide you with the best quality machinery and make sure that it provides you an amazing output during the production hours.', '{catname} Manufacturers in {location}, {catname} Suppliers in {location}', '{catname} Manufacturers in {location}, Wholesale {catname} in {location}, {catname} Exporters India, {catname} Suppliers in {location}', '{catname} Manufacturers in {location} - blu impex Most Trusted {catname} wholesale suppliers, Best Quality {catname} exporters India. Leading Industry since 2016. Best Price.', '', '', '', '1'),
(4, '5', '1425,1407,1418,1415,1430,1409,1416,1417,1408,1427,1428,1414,1421,1426,1413,1429,1412,1420,1423,1432,1434,1431,1422,1424,1433,1419', '', '<p>Everyone loves to consume noodles and thus it is very important for the noodles to be similar and tasty every time they are produced. You can purchase a <strong>{catname} in {location}</strong> and make sure to provide you, customers, the best experience of having noodles. We have a lot of machinery displayed in our inventory like Automatic Noodles Making Machine, fully automatic Noodles/ Maggi Making Machine, Semi-automatic Noodles Making Machine.</p>', 'Everyone loves to consume noodles and thus it is very important for the noodles to be similar and tasty every time they are produced.', '{catname} Manufacturers in {location}, {catname} Suppliers in {location}', '{catname} Manufacturers in {location}, Wholesale {catname} in {location}, {catname} Exporters India, {catname} Suppliers in {location}', '{catname} Manufacturers in {location} - blu impex Most Trusted {catname} wholesale suppliers, Best Quality {catname} exporters India. Leading Industry since 2016. Best Price.', '', '', '', '1'),
(5, '6', '1425,1407,1418,1415,1430,1409,1416,1417,1408,1427,1428,1414,1421,1426,1413,1429,1412,1420,1423,1432,1434,1431,1422,1424,1433,1419', '', '<p>If you are amongst the top companies which produces noodles in a humongous amount then <strong>{catname} in {location} </strong>would be very helpful to you. Machinery like these make the process of making noodles very smooth, easy and convenient in nature.</p>\n\n<h2>Why us?</h2>\n\n<p>We are one of the leading {catname}<strong> manufacturers in {location} </strong>and provide you with the best quality product at your doorstep. If you associate with us, you will never be disappointed by our services. We produce products which are highly durable in nature.</p>\n\n<h2>Features we provide</h2>\n\n<p>Being one of the best <strong>{catname} supplier</strong> we know what our customers need. It provides you with an amazing output of 180-200 kg of noodles per hour and is very convenient to use and easy to install.</p>', 'If you are amongst the top companies which produces noodles in a humongous amount then {catname} in {location} would be very helpful to you. Machinery like these make the process of making noodles very smooth, easy and convenient in nature.', '{catname} Manufacturers in {location}, {catname} Suppliers in {location}', '{catname} Manufacturers in {location}, Wholesale {catname} in {location}, {catname} Exporters India, {catname} Suppliers in {location}', '{catname} Manufacturers in {location} - blu impex Most Trusted {catname} wholesale suppliers, Best Quality {catname} exporters India. Leading Industry since 2016. Best Price.', '', '', '', '1'),
(6, '7', '1425,1407,1418,1415,1430,1409,1416,1417,1408,1427,1428,1414,1421,1426,1413,1429,1412,1420,1423,1432,1434,1431,1422,1424,1433,1419', '', '<p>Companies often buy new machinery so that they could improve their productivity and help the workers be at ease. you should definitely go for <strong>{catname} in {location}</strong> to improve your performance and help grow your venture.</p>\n\n<h2>We provide you with the best machinery</h2>\n\n<p>If you trust us, we will never break it! We are the leading <strong>{catname} manufacturers</strong> and know the expectations of our clients. We make sure to produce the best quality machinery which uses the best quality raw materials.</p>\n\n<h2>Features</h2>\n\n<p>Being one of the best <strong>{catname} suppliers</strong> we provide our customers with the machinery with an output of 300-350 kg noodles per hour. This machine has a motor of 3HP and comes with a warranty of 2 years ensuring that using this machine is a trouble-free experience. The machine weighs 790 kg and it is supplied in wooden packing.</p>', 'Companies often buy new machinery so that they could improve their productivity and help the workers be at ease. you should definitely go for {catname} in {location} to improve your performance and help grow your venture.', '{catname} Manufacturers in {location}, {catname} Suppliers in {location}', '{catname} Manufacturers in {location}, Wholesale {catname} in {location}, {catname} Exporters India, {catname} Suppliers in {location}', '{catname} Manufacturers in {location} - blu impex Most Trusted {catname} wholesale suppliers, Best Quality {catname} exporters India. Leading Industry since 2016. Best Price.', '', '', '', '1'),
(7, '8', '1425,1407,1418,1415,1430,1409,1416,1417,1408,1427,1428,1414,1421,1426,1413,1429,1412,1420,1423,1432,1434,1431,1422,1424,1433,1419', '', '<p>If you wish to increase a machine in your factory then you should buy <strong>{catname} in {location}</strong>. This machine provides you the best output and helps you increase your productivity in no time.</p>\n\n<h2>We are very cost effective</h2>\n\n<p>Being one of the leading <strong>{catname} Manufacturers in {location}</strong>, we understand the demands of our clients. We have been in this business for a long time and thus know that it is important to keep the prices nominal for the consumers to consume. Afterall a happy customer is all we need!</p>\n\n<h2>Features of the machinery</h2>\n\n<p>We are the leading <strong>{catname} Suppliers in {location}</strong> and provide you the machinery which gives 60kg per hour of output. The machine weighs around 185 kgs and involves minimum use of man power making it more convenient to use.</p>', 'If you wish to increase a machine in your factory then you should buy {catname} in {location}. This machine provides you the best output and helps you increase your productivity in no time.', '{catname} Manufacturers in {location}, {catname} Suppliers in {location}', '{catname} Manufacturers in {location}, Wholesale {catname} in {location}, {catname} Exporters India, {catname} Suppliers in {location}', '{catname} Manufacturers in {location} - blu impex Most Trusted {catname} wholesale suppliers, Best Quality {catname} exporters India. Leading Industry since 2016. Best Price.', '', '', '', '1'),
(8, '9', '1425,1407,1418,1415,1430,1409,1416,1417,1408,1427,1428,1414,1421,1426,1413,1429,1412,1420,1423,1432,1434,1431,1422,1424,1433,1419', '', '<p>If you are increasing your machinery and looking for a paper pencil making machine, then we are the ones for you! We are one of the leading <strong>{catname} </strong>in the stationary industry. We value our customers the most and make sure that each machinery we design is made by keeping the client&rsquo;s point of view in mind. We create amazing quality machine which are made with high quality raw materials and makes it durable in nature.</p>', 'If you are increasing your machinery and looking for a paper pencil making machine, then we are the ones for you! We are one of the leading {catname} in the stationary industry.', '{catname} Manufacturers in {location}, {catname} Suppliers in {location}', '{catname} Manufacturers in {location}, Wholesale {catname} in {location}, {catname} Exporters India, {catname} Suppliers in {location}', '{catname} Manufacturers in {location} - blu impex Most Trusted {catname} wholesale suppliers, Best Quality {catname} exporters India. Leading Industry since 2016. Best Price.', '', '', '', '1'),
(9, '10', '1425,1407,1418,1415,1430,1409,1416,1417,1408,1427,1428,1414,1421,1426,1413,1429,1412,1420,1423,1432,1434,1431,1422,1424,1433,1419', '', '<p>These days every company is innovating the best out of waste and saving the mother earth from a lot of harm. If you wish to use the old newspapers and make pencils out of it then, you can buy the <strong>{catname} in {location}</strong> from blue Impex.</p>\n\n<h2>We provide you with the best quality machinery</h2>\n\n<p>We are one of the leading <strong>{catname}</strong> in {location} and make sure that our clients receive the best output of the machines we supply to them. These machines are provided by us at reasonable prices.</p>\n\n<h2>Features</h2>\n\n<p>Being one of the best <strong>{catname} </strong>we understand the demands of our clients. This machine is environment-friendly in nature. The speciality of this machine is that it can create wonderful pencils out of waste papers and newspapers, providing you with good quality pencils to write from.</p>', 'These days every company is innovating the best out of waste and saving the mother earth from a lot of harm. If you wish to use the old newspapers and make pencils out of it then, you can buy the {catname} in {location} from blue Impex.', '{catname} Manufacturers in {location}, {catname} Suppliers in {location}', '{catname} Manufacturers in {location}, Wholesale {catname} in {location}, {catname} Exporters India, {catname} Suppliers in {location}', '{catname} Manufacturers in {location} - blu impex Most Trusted {catname} wholesale suppliers, Best Quality {catname} exporters India. Leading Industry since 2016. Best Price.', '', '', '', '1'),
(10, '11', '1425,1407,1418,1415,1430,1409,1416,1417,1408,1427,1428,1414,1421,1426,1413,1429,1412,1420,1423,1432,1434,1431,1422,1424,1433,1419', '', '<p>Wandering around for a <strong>{catname} in {location}</strong>? your search seems to come to an end now, Blue Impex is here to provide you with all kinds of stationary machinery. We provide you with machinery which is made of good quality raw material and helps you boost your productivity to the maximum.</p>\n\n<h2>We offer you reasonable prices</h2>\n\n<p>We are one of those companies which have been working in the industry for a long time. We are known as one of the leading <strong>{catname} manufacturers</strong> only because we provide you with the best quality machinery at very reasonable prices.</p>\n\n<h2>Features</h2>\n\n<p>Being one of the best<strong> {catname} suppliers</strong>, we have to make sure that before the machine reaches the client, it is fully inspected so that there is no defect or damage found in the machine when it reaches to the client. Also, we make sure that the packaging of the machine is done properly to avoid any damage during transportation.</p>', 'Wandering around for a {catname} in {location}? your search seems to come to an end now, Blue Impex is here to provide you with all kinds of stationary machinery.', '{catname} Manufacturers in {location}, {catname} Suppliers in {location}', '{catname} Manufacturers in {location}, Wholesale {catname} in {location}, {catname} Exporters India, {catname} Suppliers in {location}', '{catname} Manufacturers in {location} - blu impex Most Trusted {catname} wholesale suppliers, Best Quality {catname} exporters India. Leading Industry since 2016. Best Price.', '', '', '', '1'),
(11, '12', '1425,1407,1418,1415,1430,1409,1416,1417,1408,1427,1428,1414,1421,1426,1413,1429,1412,1420,1423,1432,1434,1431,1422,1424,1433,1419', '', '<p>If you are searching for a machine which can increase your productivity and includes less manpower, then<strong> {catname} in {location}</strong> is the best for your use. This machine is very convenient for the companies who are looking to increase their machinery and decrease the efforts of the manpower.</p>\n\n<h2>Top notch quality machinery</h2>\n\n<p>Purchasing machinery from the best <strong>{catname} manufacturer </strong>can be a great deal for you! Companies like us provide you with the best quality machinery and also help you install it in the best way possible. We provide you with full assistance and are there to help you at any point in time.</p>\n\n<h2>Features</h2>\n\n<p>Being one of the leading<strong> {catname}</strong>, we make sure to know the latest trends and what our clients will like the most. This machinery is fully automatic and very convenient in nature. The machine uses 14.4 W of power and can be very useful to produce super quality pencils in a very short time.</p>', 'If you are searching for a machine which can increase your productivity and includes less manpower, then {catname} in {location} is the best for your use.', '{catname} Manufacturers in {location}, {catname} Suppliers in {location}', '{catname} Manufacturers in {location}, Wholesale {catname} in {location}, {catname} Exporters India, {catname} Suppliers in {location}', '{catname} Manufacturers in {location} - blu impex Most Trusted {catname} wholesale suppliers, Best Quality {catname} exporters India. Leading Industry since 2016. Best Price.', '', '', '', '1'),
(12, '13', '1425,1407,1418,1415,1430,1409,1416,1417,1408,1427,1428,1414,1421,1426,1413,1429,1412,1420,1423,1432,1434,1431,1422,1424,1433,1419', '', '<p>These days a lot of companies from the food industry are into manufacturing pasta and macaroni. If you are one of those companies then a <strong>{catname} in {location}</strong> is a must for you. We make superior quality machines which are easy to operate and install. These machinery help you increase the productivity of the product to the maximum. So, purchase the machine today and boost up productivity!</p>', 'These days a lot of companies from the food industry are into manufacturing pasta and macaroni. If you are one of those companies then a {catname} in {location} is a must for you.', '{catname} Manufacturers in {location}, {catname} Suppliers in {location}', '{catname} Manufacturers in {location}, Wholesale {catname} in {location}, {catname} Exporters India, {catname} Suppliers in {location}', '{catname} Manufacturers in {location} - blu impex Most Trusted {catname} wholesale suppliers, Best Quality {catname} exporters India. Leading Industry since 2016. Best Price.', '', '', '', '1'),
(13, '14', '1425,1407,1418,1415,1430,1409,1416,1417,1408,1427,1428,1414,1421,1426,1413,1429,1412,1420,1423,1432,1434,1431,1422,1424,1433,1419', '', '<p>If you wish to buy a pasta machine for your venture, then Blue Impex is just the right place to look for! We are one of the leading <strong>{catname} manufacturers in {location}</strong> and produce superior quality machinery just for you.</p>\n\n<h2>We are the best</h2>\n\n<p>There are several ventures which are machine producers, out of which we are the leading <strong>{catname} suppliers in {location}</strong>. We provide you with the machinery at a very reasonable cost and help you improve the productivity of your venture in the best way possible.</p>\n\n<h2>Features</h2>\n\n<p>This <strong>{catname} in {location}</strong> is the best way to produce pasta and macaroni in bulk. The machine has the capacity to produce 1150kg of pasta per hour and weighs around 1500kg. The machine is operated through electricity consuming 10 KW.</p>', 'If you wish to buy a pasta machine for your venture, then Blue Impex is just the right place to look for! We are one of the leading {catname} manufacturers in {location} and produce superior quality machinery just for you.', '{catname} Manufacturers in {location}, {catname} Suppliers in {location}', '{catname} Manufacturers in {location}, Wholesale {catname} in {location}, {catname} Exporters India, {catname} Suppliers in {location}', '{catname} Manufacturers in {location} - blu impex Most Trusted {catname} wholesale suppliers, Best Quality {catname} exporters India. Leading Industry since 2016. Best Price.', '', '', '', '1'),
(14, '15', '1425,1407,1418,1415,1430,1409,1416,1417,1408,1427,1428,1414,1421,1426,1413,1429,1412,1420,1423,1432,1434,1431,1422,1424,1433,1419', '', '<p>Nowadays most of the people have started to become environmentally friendly and restricted the use of plastic bags when they go out for shopping. Considering the increasing demand for shopping bags, many ventures have started buying <strong>{catname} in {location}</strong> to produce them. Blue Impex is one of those companies which helps other ventures produce these bags for customers by providing them with the best quality machinery.</p>', 'Nowadays most of the people have started to become environmentally friendly and restricted the use of plastic bags when they go out for shopping.', '{catname} Manufacturers in {location}, {catname} Suppliers in {location}', '{catname} Manufacturers in {location}, Wholesale {catname} in {location}, {catname} Exporters India, {catname} Suppliers in {location}', '{catname} Manufacturers in {location} - blu impex Most Trusted {catname} wholesale suppliers, Best Quality {catname} exporters India. Leading Industry since 2016. Best Price.', '', '', '', '1'),
(15, '16', '1425,1407,1418,1415,1430,1409,1416,1417,1408,1427,1428,1414,1421,1426,1413,1429,1412,1420,1423,1432,1434,1431,1422,1424,1433,1419', '', '<p>These days technology has become the most important part of any production unit. Ventures try to buy <strong>automatic non-woven bag making machine in {location}</strong> so that they can produce the bags in bulk and provide them at a reasonable cost to their customers.</p>\n\n<h2>We provide quality and durability</h2>\n\n<p>Being one of the leading <strong>{catname} manufacturer</strong>, we make sure that the machinery we produce is made of high-quality raw material and helps our client produce the best quality material and pass it on to their customers. We try to make the machinery in such a way that it is highly durable in nature and never lets you down.</p>\n\n<h2>Features we exhibit</h2>\n\n<p>This machine has got the capacity to produce 80 to 100 pieces of bags per hour. Being one of the leading <strong>{catname} supplier</strong> we make sure that the mechanism involves the minimum intervention of human power and saves money and efforts.</p>', 'These days technology has become the most important part of any production unit. Ventures try to buy automatic non-woven bag making machine in {location} so that they can produce the bags in bulk and provide them at a reasonable cost to their customers.', '{catname} Manufacturers in {location}, {catname} Suppliers in {location}', '{catname} Manufacturers in {location}, Wholesale {catname} in {location}, {catname} Exporters India, {catname} Suppliers in {location}', '{catname} Manufacturers in {location} - blu impex Most Trusted {catname} wholesale suppliers, Best Quality {catname} exporters India. Leading Industry since 2016. Best Price.', '', '', '', '1'),
(16, '17', '1425,1407,1418,1415,1430,1409,1416,1417,1408,1427,1428,1414,1421,1426,1413,1429,1412,1420,1423,1432,1434,1431,1422,1424,1433,1419', '', '<p>Blu Impex is referred to in the market as the best<strong> {catname} suppliers</strong>. The machines given by the organization are completely programmed and guarantees an extraordinary sparing in time, exertion and cost. The top-quality hardware can be utilized for making bags and boxes.</p>\n\n<h2>We offer machinery at a reasonable price</h2>\n\n<p>If you wish to buy a <strong>fully automatic non-woven box bag making machine in {location}</strong>, then Blue Impex is just the right choice for you. We incorporate price and quality together and make sure that you receive the best quality product at reasonable rates.</p>\n\n<h2>Features of the machinery</h2>\n\n<p>We are one of the leading <strong>{catname} {location}. </strong>the machine produces 100-120 pieces per hours and requires electricity of 15 KW to keep the machine working. The machine produces 200 to 600mm sized bags which are ideal to use as shopping bags.</p>', 'Blu Impex is referred to in the market as the best {catname} suppliers. The machines given by the organization are completely programmed and guarantees an extraordinary sparing in time, exertion and cost.', '{catname} Manufacturers in {location}, {catname} Suppliers in {location}', '{catname} Manufacturers in {location}, Wholesale {catname} in {location}, {catname} Exporters India, {catname} Suppliers in {location}', '{catname} Manufacturers in {location} - blu impex Most Trusted {catname} wholesale suppliers, Best Quality {catname} exporters India. Leading Industry since 2016. Best Price.', '', '', '', '1'),
(17, '18', '1425,1407,1418,1415,1430,1409,1416,1417,1408,1427,1428,1414,1421,1426,1413,1429,1412,1420,1423,1432,1434,1431,1422,1424,1433,1419', '', '<p>If you are looking for {catname} in {location}, then we are the ones! We produce the best quality machines in {location} and provide them at very reasonable prices. This machine is ideal for making bags in a quick and efficient way. The machine is also easy to operate and install.</p>\n\n<h2>Quality and price go hand in hand</h2>\n\n<p>If you purchase the machinery from Blue Impex, the leading<strong> {catname} manufacturers</strong> then, you will find the best quality machinery which is easy to operate and install at your doorstep. We provide you with reasonable prices and let you enjoy the ease of making bags.</p>\n\n<h2>Features</h2>\n\n<p>The machine has the capacity of manufacturing bags at 15 meters per minute. Being one of the leading <strong>{catname} suppliers</strong> we make sure that the machine increasing your productivity in the best way possible. The machine is 90 kg in weight and is convenient to use.</p>', 'If you are looking for {catname} in {location}, then we are the ones! We produce the best quality machines in {location} and provide them at very reasonable prices.', '{catname} Manufacturers in {location}, {catname} Suppliers in {location}', '{catname} Manufacturers in {location}, Wholesale {catname} in {location}, {catname} Exporters India, {catname} Suppliers in {location}', '{catname} Manufacturers in {location} - blu impex Most Trusted {catname} wholesale suppliers, Best Quality {catname} exporters India. Leading Industry since 2016. Best Price.', '', '', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `wl_subloccontent`
--

CREATE TABLE `wl_subloccontent` (
  `subcontentId` int(11) NOT NULL,
  `location_id` text NOT NULL,
  `page_heading` varchar(220) DEFAULT NULL,
  `description` text,
  `short_description` text,
  `meta_title` text,
  `meta_keyword` text,
  `meta_description` text,
  `meta_key1` varchar(160) DEFAULT NULL,
  `meta_key2` varchar(160) DEFAULT NULL,
  `meta_key3` varchar(160) DEFAULT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `wl_tax_rate`
--

CREATE TABLE `wl_tax_rate` (
  `id` int(11) NOT NULL,
  `tax_rate` varchar(100) DEFAULT NULL,
  `tax_name` text,
  `status` enum('1','0') NOT NULL DEFAULT '1' COMMENT '1=Active/0=Deactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wl_testimonial`
--

CREATE TABLE `wl_testimonial` (
  `testimonial_id` int(11) NOT NULL,
  `testimonial_title` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `testimonial_image` varchar(255) DEFAULT NULL,
  `poster_name` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `friendly_url` varchar(80) DEFAULT NULL,
  `email` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `testimonial_description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `testimonial_description_p` text,
  `photo` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `posted_date` datetime DEFAULT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '0' COMMENT '1=Actice,0=Inactive'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wl_videos`
--

CREATE TABLE `wl_videos` (
  `id` int(10) UNSIGNED NOT NULL,
  `link` varchar(300) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `type` enum('videos','our_appearance') DEFAULT 'videos',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0= deleted, 1 = active, 2= in-active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wl_videos`
--

INSERT INTO `wl_videos` (`id`, `link`, `title`, `type`, `status`) VALUES
(29, 'https://www.youtube.com/embed/4rQl9ZaHljs', 'Automatic Pen Making Machine', 'videos', 2),
(30, 'https://www.youtube.com/embed/4rQl9ZaHljs', 'Webpulse Solutions pvt. ltd.', 'videos', 2),
(31, 'https://www.youtube.com/embed/8jYdqpIEbp8', 'Automatic Pen Making Machine', 'videos', 1),
(32, 'https://www.youtube.com/embed/nOTeAROTI0A', 'Paper Pencil Making Machine', 'videos', 1),
(33, 'https://www.youtube.com/embed/09qQF570lRc', 'Manual Pen Making Machine', 'videos', 1),
(34, 'https://www.youtube.com/embed/LF2z7r95Dzg', 'Automatic Noodles Making Machine', 'videos', 1),
(35, 'https://www.youtube.com/embed/qP9_gQVAM0Y', 'Fully Automatic Pen Making Machine', 'videos', 1);

-- --------------------------------------------------------

--
-- Table structure for table `wl_wishlists`
--

CREATE TABLE `wl_wishlists` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `products_Id` int(11) NOT NULL,
  `wishlists_date_added` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wl_wishlists`
--

INSERT INTO `wl_wishlists` (`id`, `customer_id`, `products_Id`, `wishlists_date_added`) VALUES
(1, 2, 1, '2017-06-08 13:06:31'),
(2, 8, 79, '2017-09-29 23:08:41'),
(3, 8, 80, '2017-09-29 23:08:47'),
(4, 8, 81, '2017-09-29 23:08:57'),
(5, 8, 85, '2017-09-29 23:09:03'),
(6, 9, 26, '2017-10-03 22:38:54'),
(7, 9, 20, '2017-10-03 22:44:34'),
(8, 9, 78, '2017-10-03 22:45:54'),
(9, 9, 54, '2017-10-03 23:34:39'),
(11, 18, 1, '2017-10-17 01:21:54'),
(14, 19, 4, '2017-10-18 00:29:03'),
(15, 19, 1, '2017-10-18 01:20:36'),
(16, 15, 2, '2017-11-04 19:22:02'),
(17, 19, 10, '2017-11-15 00:09:26'),
(18, 23, 5, '2017-11-15 17:03:22'),
(22, 15, 797, '2017-12-02 07:21:59'),
(23, 15, 796, '2017-12-02 07:28:16'),
(24, 15, 795, '2017-12-02 17:15:39'),
(25, 25, 467, '2017-12-11 18:30:05'),
(26, 25, 958, '2017-12-11 18:30:16'),
(27, 25, 959, '2017-12-11 18:31:39'),
(29, 35, 707, '2017-12-21 01:12:50'),
(30, 34, 468, '2017-12-22 22:52:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `last_activity` (`last_activity`),
  ADD KEY `session_id` (`session_id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_city`
--
ALTER TABLE `tbl_city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_country`
--
ALTER TABLE `tbl_country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_courier_company`
--
ALTER TABLE `tbl_courier_company`
  ADD PRIMARY KEY (`company_id`),
  ADD KEY `idx_mfg_name_zen` (`company_name`);

--
-- Indexes for table `tbl_faq`
--
ALTER TABLE `tbl_faq`
  ADD PRIMARY KEY (`faq_id`);

--
-- Indexes for table `tbl_newsletters`
--
ALTER TABLE `tbl_newsletters`
  ADD PRIMARY KEY (`subscriber_id`);

--
-- Indexes for table `tbl_newsletter_groups`
--
ALTER TABLE `tbl_newsletter_groups`
  ADD PRIMARY KEY (`newsletter_groups_id`);

--
-- Indexes for table `tbl_newsletter_group_subscriber`
--
ALTER TABLE `tbl_newsletter_group_subscriber`
  ADD PRIMARY KEY (`group_subscriber_id`);

--
-- Indexes for table `tbl_states`
--
ALTER TABLE `tbl_states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_zip_location`
--
ALTER TABLE `tbl_zip_location`
  ADD PRIMARY KEY (`zip_location_id`),
  ADD KEY `idx_mfg_name_zen` (`location_name`);

--
-- Indexes for table `wl_auto_respond_mails`
--
ALTER TABLE `wl_auto_respond_mails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wl_banners`
--
ALTER TABLE `wl_banners`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `wl_blog`
--
ALTER TABLE `wl_blog`
  ADD PRIMARY KEY (`article_id`);

--
-- Indexes for table `wl_blog_comment`
--
ALTER TABLE `wl_blog_comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `wl_brands`
--
ALTER TABLE `wl_brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `wl_categories`
--
ALTER TABLE `wl_categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `wl_cms_pages`
--
ALTER TABLE `wl_cms_pages`
  ADD PRIMARY KEY (`page_id`),
  ADD KEY `friendly_url` (`friendly_url`);

--
-- Indexes for table `wl_colors`
--
ALTER TABLE `wl_colors`
  ADD PRIMARY KEY (`color_id`),
  ADD KEY `idx_mfg_name_zen` (`color_name`);

--
-- Indexes for table `wl_countries`
--
ALTER TABLE `wl_countries`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `wl_coupan_users`
--
ALTER TABLE `wl_coupan_users`
  ADD PRIMARY KEY (`cpn_usr_id`);

--
-- Indexes for table `wl_currencies`
--
ALTER TABLE `wl_currencies`
  ADD PRIMARY KEY (`currency_id`);

--
-- Indexes for table `wl_customers`
--
ALTER TABLE `wl_customers`
  ADD PRIMARY KEY (`customers_id`);

--
-- Indexes for table `wl_customers_address_book`
--
ALTER TABLE `wl_customers_address_book`
  ADD PRIMARY KEY (`address_id`);

--
-- Indexes for table `wl_customer_token`
--
ALTER TABLE `wl_customer_token`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wl_discount_coupans`
--
ALTER TABLE `wl_discount_coupans`
  ADD PRIMARY KEY (`cpn_id`);

--
-- Indexes for table `wl_enquiry`
--
ALTER TABLE `wl_enquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wl_enquiry1`
--
ALTER TABLE `wl_enquiry1`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `wl_fullset`
--
ALTER TABLE `wl_fullset`
  ADD PRIMARY KEY (`setId`),
  ADD KEY `status` (`status`),
  ADD KEY `products_id` (`setId`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `wl_fullset_media`
--
ALTER TABLE `wl_fullset_media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_products_images_products_id` (`fullset_id`),
  ADD KEY `products_id` (`fullset_id`);

--
-- Indexes for table `wl_ip_details`
--
ALTER TABLE `wl_ip_details`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `wl_meta_tags`
--
ALTER TABLE `wl_meta_tags`
  ADD PRIMARY KEY (`meta_id`),
  ADD KEY `page_url` (`page_url`),
  ADD KEY `entity_type` (`entity_type`),
  ADD KEY `entity_id` (`entity_id`);

--
-- Indexes for table `wl_meta_tags_old`
--
ALTER TABLE `wl_meta_tags_old`
  ADD PRIMARY KEY (`meta_id`),
  ADD KEY `page_url` (`page_url`),
  ADD KEY `entity_type` (`entity_type`),
  ADD KEY `entity_id` (`entity_id`);

--
-- Indexes for table `wl_notifications`
--
ALTER TABLE `wl_notifications`
  ADD PRIMARY KEY (`notifyId`);

--
-- Indexes for table `wl_order`
--
ALTER TABLE `wl_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `wl_orders_products`
--
ALTER TABLE `wl_orders_products`
  ADD PRIMARY KEY (`orders_products_id`),
  ADD KEY `order_id` (`orders_products_id`),
  ADD KEY `order_no` (`order_id`),
  ADD KEY `order_id_2` (`order_id`);

--
-- Indexes for table `wl_otp`
--
ALTER TABLE `wl_otp`
  ADD PRIMARY KEY (`otpId`);

--
-- Indexes for table `wl_payment_details`
--
ALTER TABLE `wl_payment_details`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `wl_pick_point`
--
ALTER TABLE `wl_pick_point`
  ADD PRIMARY KEY (`setId`),
  ADD KEY `status` (`status`),
  ADD KEY `products_id` (`setId`);

--
-- Indexes for table `wl_products`
--
ALTER TABLE `wl_products`
  ADD PRIMARY KEY (`products_id`),
  ADD KEY `status` (`status`),
  ADD KEY `featured_product` (`newarrival_product`),
  ADD KEY `products_id` (`products_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `wl_products_back`
--
ALTER TABLE `wl_products_back`
  ADD PRIMARY KEY (`products_id`),
  ADD KEY `status` (`status`),
  ADD KEY `featured_product` (`newarrival_product`),
  ADD KEY `products_id` (`products_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `wl_products_media`
--
ALTER TABLE `wl_products_media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_products_images_products_id` (`products_id`),
  ADD KEY `products_id` (`products_id`);

--
-- Indexes for table `wl_products_related`
--
ALTER TABLE `wl_products_related`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wl_product_attributes`
--
ALTER TABLE `wl_product_attributes`
  ADD PRIMARY KEY (`attribute_id`);

--
-- Indexes for table `wl_product_comments`
--
ALTER TABLE `wl_product_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wl_product_enquiry`
--
ALTER TABLE `wl_product_enquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wl_review`
--
ALTER TABLE `wl_review`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `product_id` (`entity_id`);

--
-- Indexes for table `wl_shipping_cod`
--
ALTER TABLE `wl_shipping_cod`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wl_sizes`
--
ALTER TABLE `wl_sizes`
  ADD PRIMARY KEY (`size_id`),
  ADD KEY `idx_mfg_name_zen` (`size_name`);

--
-- Indexes for table `wl_store`
--
ALTER TABLE `wl_store`
  ADD PRIMARY KEY (`setId`),
  ADD KEY `status` (`status`),
  ADD KEY `products_id` (`setId`);

--
-- Indexes for table `wl_subcontent`
--
ALTER TABLE `wl_subcontent`
  ADD PRIMARY KEY (`subcontentId`);

--
-- Indexes for table `wl_subloccontent`
--
ALTER TABLE `wl_subloccontent`
  ADD PRIMARY KEY (`subcontentId`);

--
-- Indexes for table `wl_tax_rate`
--
ALTER TABLE `wl_tax_rate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wl_testimonial`
--
ALTER TABLE `wl_testimonial`
  ADD PRIMARY KEY (`testimonial_id`);

--
-- Indexes for table `wl_videos`
--
ALTER TABLE `wl_videos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wl_wishlists`
--
ALTER TABLE `wl_wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_city`
--
ALTER TABLE `tbl_city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_country`
--
ALTER TABLE `tbl_country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_courier_company`
--
ALTER TABLE `tbl_courier_company`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_faq`
--
ALTER TABLE `tbl_faq`
  MODIFY `faq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `tbl_newsletters`
--
ALTER TABLE `tbl_newsletters`
  MODIFY `subscriber_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_newsletter_groups`
--
ALTER TABLE `tbl_newsletter_groups`
  MODIFY `newsletter_groups_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_newsletter_group_subscriber`
--
ALTER TABLE `tbl_newsletter_group_subscriber`
  MODIFY `group_subscriber_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_states`
--
ALTER TABLE `tbl_states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_zip_location`
--
ALTER TABLE `tbl_zip_location`
  MODIFY `zip_location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5215;

--
-- AUTO_INCREMENT for table `wl_auto_respond_mails`
--
ALTER TABLE `wl_auto_respond_mails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `wl_banners`
--
ALTER TABLE `wl_banners`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wl_blog`
--
ALTER TABLE `wl_blog`
  MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `wl_blog_comment`
--
ALTER TABLE `wl_blog_comment`
  MODIFY `comment_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wl_brands`
--
ALTER TABLE `wl_brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `wl_categories`
--
ALTER TABLE `wl_categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `wl_cms_pages`
--
ALTER TABLE `wl_cms_pages`
  MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `wl_colors`
--
ALTER TABLE `wl_colors`
  MODIFY `color_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `wl_countries`
--
ALTER TABLE `wl_countries`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;

--
-- AUTO_INCREMENT for table `wl_coupan_users`
--
ALTER TABLE `wl_coupan_users`
  MODIFY `cpn_usr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wl_currencies`
--
ALTER TABLE `wl_currencies`
  MODIFY `currency_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wl_customers`
--
ALTER TABLE `wl_customers`
  MODIFY `customers_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wl_customers_address_book`
--
ALTER TABLE `wl_customers_address_book`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wl_customer_token`
--
ALTER TABLE `wl_customer_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wl_discount_coupans`
--
ALTER TABLE `wl_discount_coupans`
  MODIFY `cpn_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wl_enquiry`
--
ALTER TABLE `wl_enquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `wl_enquiry1`
--
ALTER TABLE `wl_enquiry1`
  MODIFY `ID` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wl_fullset`
--
ALTER TABLE `wl_fullset`
  MODIFY `setId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `wl_fullset_media`
--
ALTER TABLE `wl_fullset_media`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `wl_ip_details`
--
ALTER TABLE `wl_ip_details`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `wl_meta_tags`
--
ALTER TABLE `wl_meta_tags`
  MODIFY `meta_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1459;

--
-- AUTO_INCREMENT for table `wl_meta_tags_old`
--
ALTER TABLE `wl_meta_tags_old`
  MODIFY `meta_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3634;

--
-- AUTO_INCREMENT for table `wl_notifications`
--
ALTER TABLE `wl_notifications`
  MODIFY `notifyId` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wl_order`
--
ALTER TABLE `wl_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `wl_orders_products`
--
ALTER TABLE `wl_orders_products`
  MODIFY `orders_products_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `wl_otp`
--
ALTER TABLE `wl_otp`
  MODIFY `otpId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `wl_payment_details`
--
ALTER TABLE `wl_payment_details`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wl_pick_point`
--
ALTER TABLE `wl_pick_point`
  MODIFY `setId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wl_products`
--
ALTER TABLE `wl_products`
  MODIFY `products_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `wl_products_back`
--
ALTER TABLE `wl_products_back`
  MODIFY `products_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wl_products_media`
--
ALTER TABLE `wl_products_media`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `wl_products_related`
--
ALTER TABLE `wl_products_related`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wl_product_attributes`
--
ALTER TABLE `wl_product_attributes`
  MODIFY `attribute_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wl_product_comments`
--
ALTER TABLE `wl_product_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wl_product_enquiry`
--
ALTER TABLE `wl_product_enquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wl_review`
--
ALTER TABLE `wl_review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `wl_shipping_cod`
--
ALTER TABLE `wl_shipping_cod`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wl_sizes`
--
ALTER TABLE `wl_sizes`
  MODIFY `size_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wl_store`
--
ALTER TABLE `wl_store`
  MODIFY `setId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `wl_subcontent`
--
ALTER TABLE `wl_subcontent`
  MODIFY `subcontentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `wl_subloccontent`
--
ALTER TABLE `wl_subloccontent`
  MODIFY `subcontentId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wl_testimonial`
--
ALTER TABLE `wl_testimonial`
  MODIFY `testimonial_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wl_videos`
--
ALTER TABLE `wl_videos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `wl_wishlists`
--
ALTER TABLE `wl_wishlists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
