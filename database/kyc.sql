-- phpMyAdmin SQL Dump
-- version 4.0.10.18
-- https://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Mar 15, 2018 at 11:15 AM
-- Server version: 5.6.36-cll-lve
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `CloudStar-kyc`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE IF NOT EXISTS `blog` (
  `blog_id` int(11) NOT NULL AUTO_INCREMENT,
  `blog_image` varchar(255) NOT NULL,
  `blog_title` varchar(255) NOT NULL,
  `blog_content` longtext NOT NULL,
  `added_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL,
  PRIMARY KEY (`blog_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`blog_id`, `blog_image`, `blog_title`, `blog_content`, `added_date`, `updated_date`) VALUES
(4, '59df7a0c57b5f.png', 'How to upload softcopy of your documents?', 'CloudStar strongly believes eco-centric paperless office along with more self-service options. KYC tool is developed with that intention.  \r\n\r\nIt is pretty simple process, just provide your document number and click the blue button below and choose the softcopy of your document and upload.  If you need any assistance please contact us at support@cloudstartech.com or reach your support/administrator.', '2017-10-12 14:19:56', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `blog_comment`
--

CREATE TABLE IF NOT EXISTS `blog_comment` (
  `blog_comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `blog_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` longtext NOT NULL,
  `added_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL,
  PRIMARY KEY (`blog_comment_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE IF NOT EXISTS `contact_us` (
  `contact_us_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `comment` longtext NOT NULL,
  `added_date` datetime NOT NULL,
  PRIMARY KEY (`contact_us_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `country_id` int(11) NOT NULL AUTO_INCREMENT,
  `country_code` varchar(255) NOT NULL,
  `country_name` varchar(255) NOT NULL,
  PRIMARY KEY (`country_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=234 ;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`country_id`, `country_code`, `country_name`) VALUES
(1, 'AF', 'Afghanistan'),
(2, 'AL', 'Albania'),
(3, 'DZ', 'Algeria'),
(4, 'AS', 'American Samoa'),
(5, 'AD', 'Andorra'),
(6, 'AO', 'Angola'),
(7, 'AI', 'Anguilla'),
(8, 'AR', 'Argentina'),
(9, 'AM', 'Armenia'),
(10, 'AW', 'Aruba'),
(11, 'AU', 'Australia'),
(12, 'AT', 'Austria'),
(13, 'AZ', 'Azerbaijan'),
(14, 'BS', 'Bahamas'),
(15, 'BH', 'Bahrain'),
(16, 'BD', 'Bangladesh'),
(17, 'BB', 'Barbados'),
(18, 'BY', 'Belarus'),
(19, 'BE', 'Belgium'),
(20, 'BZ', 'Belize'),
(21, 'BJ', 'Benin'),
(22, 'BM', 'Bermuda'),
(23, 'BT', 'Bhutan'),
(24, 'BO', 'Bolivia'),
(25, 'BA', 'Bosnia and Herzegowina'),
(26, 'BW', 'Botswana'),
(27, 'BV', 'Bouvet Island'),
(28, 'BR', 'Brazil'),
(29, 'IO', 'British Indian Ocean Territory'),
(30, 'BN', 'Brunei Darussalam'),
(31, 'BG', 'Bulgaria'),
(32, 'BF', 'Burkina Faso'),
(33, 'BI', 'Burundi'),
(34, 'KH', 'Cambodia'),
(35, 'CM', 'Cameroon'),
(36, 'CA', 'Canada'),
(37, 'CV', 'Cape Verde'),
(38, 'KY', 'Cayman Islands'),
(39, 'CF', 'Central African Republic'),
(40, 'TD', 'Chad'),
(41, 'CL', 'Chile'),
(42, 'CN', 'China'),
(43, 'CX', 'Christmas Island'),
(44, 'CC', 'Cocos (Keeling) Islands'),
(45, 'CO', 'Colombia'),
(46, 'KM', 'Comoros'),
(47, 'CG', 'Congo'),
(48, 'CD', 'Congo, the Democratic Republic of the'),
(49, 'CK', 'Cook Islands'),
(50, 'CR', 'Costa Rica'),
(51, 'HR', 'Croatia (Hrvatska)'),
(52, 'CU', 'Cuba'),
(53, 'CY', 'Cyprus'),
(54, 'CZ', 'Czech Republic'),
(55, 'DK', 'Denmark'),
(56, 'DJ', 'Djibouti'),
(57, 'DM', 'Dominica'),
(58, 'DO', 'Dominican Republic'),
(59, 'EC', 'Ecuador'),
(60, 'EG', 'Egypt'),
(61, 'SV', 'El Salvador'),
(62, 'GQ', 'Equatorial Guinea'),
(63, 'ER', 'Eritrea'),
(64, 'EE', 'Estonia'),
(65, 'ET', 'Ethiopia'),
(66, 'FK', 'Falkland Islands (Malvinas)'),
(67, 'FO', 'Faroe Islands'),
(68, 'FJ', 'Fiji'),
(69, 'FI', 'Finland'),
(70, 'FR', 'France'),
(71, 'GF', 'French Guiana'),
(72, 'PF', 'French Polynesia'),
(73, 'TF', 'French Southern Territories'),
(74, 'GA', 'Gabon'),
(75, 'GM', 'Gambia'),
(76, 'GE', 'Georgia'),
(77, 'DE', 'Germany'),
(78, 'GH', 'Ghana'),
(79, 'GI', 'Gibraltar'),
(80, 'GR', 'Greece'),
(81, 'GL', 'Greenland'),
(82, 'GD', 'Grenada'),
(83, 'GP', 'Guadeloupe'),
(84, 'GU', 'Guam'),
(85, 'GT', 'Guatemala'),
(86, 'GN', 'Guinea'),
(87, 'GW', 'Guinea-Bissau'),
(88, 'GY', 'Guyana'),
(89, 'HT', 'Haiti'),
(90, 'HM', 'Heard and Mc Donald Islands'),
(91, 'VA', 'Holy See (Vatican City State)'),
(92, 'HN', 'Honduras'),
(93, 'HK', 'Hong Kong'),
(94, 'HU', 'Hungary'),
(95, 'IS', 'Iceland'),
(96, 'IN', 'India'),
(97, 'ID', 'Indonesia'),
(98, 'IR', 'Iran (Islamic Republic of)'),
(99, 'IQ', 'Iraq'),
(100, 'IE', 'Ireland'),
(101, 'IL', 'Israel'),
(102, 'IT', 'Italy'),
(103, 'JM', 'Jamaica'),
(104, 'JP', 'Japan'),
(105, 'JO', 'Jordan'),
(106, 'KZ', 'Kazakhstan'),
(107, 'KE', 'Kenya'),
(108, 'KI', 'Kiribati'),
(109, 'KP', 'Korea, Democratic Peoples Republic of'),
(110, 'KR', 'Korea, Republic of'),
(111, 'KW', 'Kuwait'),
(112, 'KG', 'Kyrgyzstan'),
(113, 'LA', 'Lao Peoples Democratic Republic'),
(114, 'LV', 'Latvia'),
(115, 'LB', 'Lebanon'),
(116, 'LS', 'Lesotho'),
(117, 'LR', 'Liberia'),
(118, 'LY', 'Libyan Arab Jamahiriya'),
(119, 'LI', 'Liechtenstein'),
(120, 'LT', 'Lithuania'),
(121, 'LU', 'Luxembourg'),
(122, 'MO', 'Macau'),
(123, 'MK', 'Macedonia, The Former Yugoslav Republic of'),
(124, 'MG', 'Madagascar'),
(125, 'MW', 'Malawi'),
(126, 'MY', 'Malaysia'),
(127, 'MV', 'Maldives'),
(128, 'ML', 'Mali'),
(129, 'MT', 'Malta'),
(130, 'MH', 'Marshall Islands'),
(131, 'MQ', 'Martinique'),
(132, 'MR', 'Mauritania'),
(133, 'MU', 'Mauritius'),
(134, 'YT', 'Mayotte'),
(135, 'MX', 'Mexico'),
(136, 'FM', 'Micronesia, Federated States of'),
(137, 'MD', 'Moldova, Republic of'),
(138, 'MC', 'Monaco'),
(139, 'MN', 'Mongolia'),
(140, 'MS', 'Montserrat'),
(141, 'MA', 'Morocco'),
(142, 'MZ', 'Mozambique'),
(143, 'MM', 'Myanmar'),
(144, 'NA', 'Namibia'),
(145, 'NR', 'Nauru'),
(146, 'NP', 'Nepal'),
(147, 'NL', 'Netherlands'),
(148, 'AN', 'Netherlands Antilles'),
(149, 'NC', 'New Caledonia'),
(150, 'NZ', 'New Zealand'),
(151, 'NI', 'Nicaragua'),
(152, 'NE', 'Niger'),
(153, 'NG', 'Nigeria'),
(154, 'NU', 'Niue'),
(155, 'NF', 'Norfolk Island'),
(156, 'MP', 'Northern Mariana Islands'),
(157, 'NO', 'Norway'),
(158, 'OM', 'Oman'),
(159, 'PK', 'Pakistan'),
(160, 'PW', 'Palau'),
(161, 'PA', 'Panama'),
(162, 'PG', 'Papua New Guinea'),
(163, 'PY', 'Paraguay'),
(164, 'PE', 'Peru'),
(165, 'PH', 'Philippines'),
(166, 'PN', 'Pitcairn'),
(167, 'PL', 'Poland'),
(168, 'PT', 'Portugal'),
(169, 'PR', 'Puerto Rico'),
(170, 'QA', 'Qatar'),
(171, 'RE', 'Reunion'),
(172, 'RO', 'Romania'),
(173, 'RU', 'Russian Federation'),
(174, 'RW', 'Rwanda'),
(175, 'KN', 'Saint Kitts and Nevis'),
(176, 'LC', 'Saint LUCIA'),
(177, 'VC', 'Saint Vincent and the Grenadines'),
(178, 'WS', 'Samoa'),
(179, 'SM', 'San Marino'),
(180, 'ST', 'Sao Tome and Principe'),
(181, 'SA', 'Saudi Arabia'),
(182, 'SN', 'Senegal'),
(183, 'SC', 'Seychelles'),
(184, 'SL', 'Sierra Leone'),
(185, 'SG', 'Singapore'),
(186, 'SK', 'Slovakia (Slovak Republic)'),
(187, 'SI', 'Slovenia'),
(188, 'SB', 'Solomon Islands'),
(189, 'SO', 'Somalia'),
(190, 'ZA', 'South Africa'),
(191, 'GS', 'South Georgia and the South Sandwich Islands'),
(192, 'ES', 'Spain'),
(193, 'LK', 'Sri Lanka'),
(194, 'SH', 'St. Helena'),
(195, 'PM', 'St. Pierre and Miquelon'),
(196, 'SD', 'Sudan'),
(197, 'SR', 'Suriname'),
(198, 'SJ', 'Svalbard and Jan Mayen Islands'),
(199, 'SZ', 'Swaziland'),
(200, 'SE', 'Sweden'),
(201, 'CH', 'Switzerland'),
(202, 'SY', 'Syrian Arab Republic'),
(203, 'TW', 'Taiwan, Province of China'),
(204, 'TJ', 'Tajikistan'),
(205, 'TZ', 'Tanzania, United Republic of'),
(206, 'TH', 'Thailand'),
(207, 'TG', 'Togo'),
(208, 'TK', 'Tokelau'),
(209, 'TO', 'Tonga'),
(210, 'TT', 'Trinidad and Tobago'),
(211, 'TN', 'Tunisia'),
(212, 'TR', 'Turkey'),
(213, 'TM', 'Turkmenistan'),
(214, 'TC', 'Turks and Caicos Islands'),
(215, 'TV', 'Tuvalu'),
(216, 'UG', 'Uganda'),
(217, 'UA', 'Ukraine'),
(218, 'AE', 'United Arab Emirates'),
(219, 'GB', 'United Kingdom'),
(220, 'US', 'United States'),
(221, 'UM', 'United States Minor Outlying Islands'),
(222, 'UY', 'Uruguay'),
(223, 'UZ', 'Uzbekistan'),
(224, 'VU', 'Vanuatu'),
(225, 'VE', 'Venezuela'),
(226, 'VN', 'Viet Nam'),
(227, 'VG', 'Virgin Islands (British)'),
(228, 'VI', 'Virgin Islands (U.S.)'),
(229, 'WF', 'Wallis and Futuna Islands'),
(230, 'EH', 'Western Sahara'),
(231, 'YE', 'Yemen'),
(232, 'ZM', 'Zambia'),
(233, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `dynamic_value`
--

CREATE TABLE IF NOT EXISTS `dynamic_value` (
  `dynamic_value_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `added_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL,
  PRIMARY KEY (`dynamic_value_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `dynamic_value`
--

INSERT INTO `dynamic_value` (`dynamic_value_id`, `user_id`, `type`, `name`, `value`, `added_date`, `updated_date`) VALUES
(7, 17, 1, 'radio1', 'Yes', '2017-10-11 09:57:21', '0000-00-00 00:00:00'),
(8, 17, 2, 'chk1', '1', '2017-10-11 09:57:21', '0000-00-00 00:00:00'),
(9, 17, 3, 'text1', 'sdsd', '2017-10-11 09:57:21', '0000-00-00 00:00:00'),
(15, 18, 3, 'Location', '', '2017-10-12 11:59:22', '0000-00-00 00:00:00'),
(14, 18, 2, 'Apple', '0', '2017-10-12 11:59:22', '0000-00-00 00:00:00'),
(13, 18, 2, 'Microsoft', '0', '2017-10-12 11:59:22', '0000-00-00 00:00:00'),
(16, 19, 1, 'Are you legally available to work in India?', 'Yes', '2017-10-12 13:40:25', '0000-00-00 00:00:00'),
(17, 19, 2, 'Microsoft', '1', '2017-10-12 13:40:25', '0000-00-00 00:00:00'),
(18, 19, 2, 'Cisco', '1', '2017-10-12 13:40:25', '0000-00-00 00:00:00'),
(19, 19, 2, 'CheckPoint', '0', '2017-10-12 13:40:25', '0000-00-00 00:00:00'),
(20, 19, 3, 'Tell more about yourself', 'Nothing more to pen about me', '2017-10-12 13:40:25', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `kyc_list`
--

CREATE TABLE IF NOT EXISTS `kyc_list` (
  `kyc_list_id` int(11) NOT NULL AUTO_INCREMENT,
  `country_id` int(11) NOT NULL,
  `region_name` varchar(255) NOT NULL,
  `document_list` varchar(255) NOT NULL,
  `radio_button` varchar(255) NOT NULL,
  `checkbox` varchar(255) NOT NULL,
  `text_field` varchar(255) NOT NULL,
  `checkbox_label` varchar(255) NOT NULL,
  `added_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL,
  PRIMARY KEY (`kyc_list_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `kyc_list`
--

INSERT INTO `kyc_list` (`kyc_list_id`, `country_id`, `region_name`, `document_list`, `radio_button`, `checkbox`, `text_field`, `checkbox_label`, `added_date`, `updated_date`) VALUES
(8, 96, 'Karnataka', 'Passport Document,Recent Degree Certificates (Convocation & Final Marklist),PAN Card,Relieving Orders (Zip it and attach here),Professional Certificates ( If you have more then 1 then zip it and attach it here),Recent Form 16 ,', 'Do you have a last company relieving order?,', '', 'Provide details if no,What is your date of join?,', '', '2017-10-12 14:29:25', '2017-10-12 14:35:54'),
(9, 218, 'Dubai', 'emirates id,visa number,passport number,', '', '', '', '', '2017-10-21 09:29:08', '0000-00-00 00:00:00'),
(10, 96, 'Rajastan', 'Aadhar,RRS Certificate,', 'Are you a private limited company?,', '', '', '', '2017-11-17 19:51:24', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `site_setting`
--

CREATE TABLE IF NOT EXISTS `site_setting` (
  `site_setting_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `sitekey` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`site_setting_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `site_setting`
--

INSERT INTO `site_setting` (`site_setting_id`, `name`, `status`, `sitekey`, `email`, `password`) VALUES
(1, 'Captcha', 0, '6LcJ7jMUAAAAANC_X4o8EckDZ5Gj3NL-5zQ3L_eo', '', ''),
(2, 'SMTP', 0, '', 'testadmin@gmail.com', 'Password123');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `region` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `country_id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `verify_reg_code` varchar(255) NOT NULL,
  `added_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `email`, `password`, `region`, `city`, `country_id`, `type`, `image`, `verify_reg_code`, `added_date`, `updated_date`) VALUES
(1, 'Admin', 'testadmin@gmail.com', '42f749ade7f9e195bf475f37a44cafcb', '', '', 0, 1, '59dcc57597d75.png', '5a341dd2c6537', '2017-10-04 00:00:00', '2018-03-15 22:11:38'),
(20, 'Krishnakumar M', 'mkk@cloudstartech.com', '133987b0b6ad0c01fc0ccbdae1b95449', 'Karnataka', 'Bangalore', 96, 0, '59e32866e0ab0.png', '59df7c82a48ed', '2017-10-12 14:30:26', '2017-10-15 09:20:39'),
(21, 'Sathya', 'nsathya@cloudstartech.com', '133987b0b6ad0c01fc0ccbdae1b95449', 'Karnataka', 'Bangalore', 96, 0, '59e327b1868bf.jpg', '59e327381b4f2', '2017-10-15 09:15:36', '2017-10-15 09:17:37');

-- --------------------------------------------------------

--
-- Table structure for table `user_documents`
--

CREATE TABLE IF NOT EXISTS `user_documents` (
  `user_document_id` int(11) NOT NULL AUTO_INCREMENT,
  `doc_name` varchar(255) NOT NULL,
  `doc_number` varchar(255) NOT NULL,
  `doc_file_name` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `added_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL,
  PRIMARY KEY (`user_document_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `user_documents`
--

INSERT INTO `user_documents` (`user_document_id`, `doc_name`, `doc_number`, `doc_file_name`, `user_id`, `added_date`, `updated_date`) VALUES
(1, 'Pan Card', '123', '59dc5f0fdd6e1.png', 2, '2017-10-10 05:47:59', '0000-00-00 00:00:00'),
(2, 'Aadhar Card', '456', '59dc5f0fe5595.png', 2, '2017-10-10 05:47:59', '0000-00-00 00:00:00'),
(3, 'Driving Licence', '123', '59dc642147a19.png', 14, '2017-10-10 06:09:37', '0000-00-00 00:00:00'),
(10, 'test1', 'test1', '59ddeb00e2e5d.png', 17, '2017-10-11 09:57:21', '0000-00-00 00:00:00'),
(11, 'test2', 'test', '59ddeb01002b1.png', 17, '2017-10-11 09:57:21', '0000-00-00 00:00:00'),
(13, 'Pancard', '123', '59df591a34195.jpg', 18, '2017-10-12 11:59:22', '0000-00-00 00:00:00'),
(14, 'Passport', 'M343897977', '59df70c747a0a.png', 19, '2017-10-12 13:40:25', '0000-00-00 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
