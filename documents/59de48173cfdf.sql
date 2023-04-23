-- phpMyAdmin SQL Dump
-- version 4.0.10.18
-- https://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Oct 11, 2017 at 08:29 AM
-- Server version: 5.6.36-cll-lve
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_kyc`
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`blog_id`, `blog_image`, `blog_title`, `blog_content`, `added_date`, `updated_date`) VALUES
(1, '59da0835d9a8a.', 'Metronic Blog Post', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit', '2017-10-08 11:12:54', '0000-00-00 00:00:00'),
(2, '59da089fba7a0.', 'New Metronic Features', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit ', '2017-10-08 11:14:39', '2017-10-08 11:27:04');

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

--
-- Dumping data for table `blog_comment`
--

INSERT INTO `blog_comment` (`blog_comment_id`, `blog_id`, `user_id`, `comment`, `added_date`, `updated_date`) VALUES
(1, 1, 2, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit', '2017-10-08 13:47:51', '0000-00-00 00:00:00'),
(4, 1, 5, 'Hello this is comment from Alpesh ..for test...', '2017-10-10 03:51:39', '0000-00-00 00:00:00'),
(3, 2, 2, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit', '2017-10-08 14:16:14', '0000-00-00 00:00:00');

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

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`contact_us_id`, `name`, `email`, `contact`, `comment`, `added_date`) VALUES
(1, 'vijay', 'pvijay372@gmail.com', '82386395987', 'hello its testing message...', '2017-10-07 14:04:52'),
(2, 'alpesh', 'alpesh@gmail.com', '9979988788', 'its comment', '2017-10-07 14:05:56'),
(3, 'Alpesh', 'alpesh@gmail.com', '7878787', '5454545454545', '2017-10-08 04:36:06'),
(4, 'Krishnakumar', 'mkk@asia.com', '2410984023840', 'ldsfahksae\nfjksdahfkjshnf\nkjhfajsdkhjfkjsdahfdjsak\nhfkjsahfksjdahfkjdashfk\njsdahfjksdahfjsdkhfkjsdhfjksd\nahfkjdsahfkjdshfkjsdhfkjsd\nhfkjsdahfkjsdhfkjdshfjksdha', '2017-10-08 06:37:10'),
(5, 'Krishnakumar', 'mkk@asia.com', '209318432809', 'fsdajkljsdfalkjfsdalkjdlskjflksjflkjfsalkjsdalfkjd', '2017-10-09 06:03:45');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `dynamic_value`
--

INSERT INTO `dynamic_value` (`dynamic_value_id`, `user_id`, `type`, `name`, `value`, `added_date`, `updated_date`) VALUES
(7, 17, 1, 'radio1', 'Yes', '2017-10-11 09:57:21', '0000-00-00 00:00:00'),
(8, 17, 2, 'chk1', '1', '2017-10-11 09:57:21', '0000-00-00 00:00:00'),
(9, 17, 3, 'text1', 'sdsd', '2017-10-11 09:57:21', '0000-00-00 00:00:00');

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
  `added_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL,
  PRIMARY KEY (`kyc_list_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `kyc_list`
--

INSERT INTO `kyc_list` (`kyc_list_id`, `country_id`, `region_name`, `document_list`, `radio_button`, `checkbox`, `text_field`, `added_date`, `updated_date`) VALUES
(1, 96, 'Gujarat', 'Pan Card,Aadhar Card,', '', '', '', '2017-10-10 05:43:51', '2017-10-11 12:59:55'),
(2, 96, 'Panjab', 'Driving Licence,Aadhar Card,', '', '', '', '2017-10-10 05:47:09', '2017-10-10 06:10:14'),
(3, 96, 'Tamil Nadu', 'Letter,Document,license,', '', '', '', '2017-10-10 06:36:39', '0000-00-00 00:00:00'),
(4, 96, 'Maharashtra', 'Pan Card,Aadhar Card,GST,', 'radio1,radio2,radio3,', 'checkbox1,checkbox2,checkbox3,', 'textfield1,textfield2,textfield3,', '2017-10-11 05:40:37', '2017-10-11 12:41:18'),
(5, 5, 'Test', 'test1,test2,', 'radio1,', 'chk1,', 'text1,', '2017-10-11 09:55:20', '0000-00-00 00:00:00');

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
(1, 'Captcha', 0, '6LelijMUAAAAAB8_zJ79c_-7ShwIRBxBFWnX7TuT', '', ''),
(2, 'SMTP', 0, '', 'alpeshtest2017@gmail.com', 'alpesh123');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `email`, `password`, `region`, `city`, `country_id`, `type`, `image`, `verify_reg_code`, `added_date`, `updated_date`) VALUES
(1, 'Admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '', '', 0, 1, '59dcc57597d75.png', '1', '2017-10-04 00:00:00', '2017-10-10 13:04:53'),
(2, 'vijay', 'pvijay372@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Gujarat', 'Surat', 96, 0, '59d71f3ace962.jpg', '59d9f54aa258b', '2017-10-05 14:56:59', '2017-10-08 09:52:10'),
(5, 'Alpesh', 'rajodiyaa2@gmail.com', 'e39e73694742e1ef38ae9d64845420c7', 'Gujarat', 'Surat', 96, 0, '59dc4387b46a0.jpg', '59dc434f98f63', '2017-10-08 04:34:46', '2017-10-10 03:50:31'),
(10, 'Krishnakumar', 'mkk@asia.com', 'e10adc3949ba59abbe56e057f20f883e', 'Gujarat', 'New Delhi', 96, 0, '59d9c6013d971.png', '59d9f2f73d145', '2017-10-08 06:28:50', '2017-10-08 06:30:25'),
(15, 'Sathya', 'nsathya@cloudstar.co.in', '133987b0b6ad0c01fc0ccbdae1b95449', 'Tamil Nadu', 'Chennai', 96, 0, '', '59dc7218357ad', '2017-10-10 06:54:38', '2017-10-10 07:09:12'),
(17, 'hiren', 'hirenmonpara9@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Test', 'Surat', 5, 0, '', '59ddeace5484a', '2017-10-11 09:56:30', '0000-00-00 00:00:00');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `user_documents`
--

INSERT INTO `user_documents` (`user_document_id`, `doc_name`, `doc_number`, `doc_file_name`, `user_id`, `added_date`, `updated_date`) VALUES
(1, 'Pan Card', '123', '59dc5f0fdd6e1.png', 2, '2017-10-10 05:47:59', '0000-00-00 00:00:00'),
(2, 'Aadhar Card', '456', '59dc5f0fe5595.png', 2, '2017-10-10 05:47:59', '0000-00-00 00:00:00'),
(3, 'Driving Licence', '123', '59dc642147a19.png', 14, '2017-10-10 06:09:37', '0000-00-00 00:00:00'),
(10, 'test1', 'test1', '59ddeb00e2e5d.png', 17, '2017-10-11 09:57:21', '0000-00-00 00:00:00'),
(11, 'test2', 'test', '59ddeb01002b1.png', 17, '2017-10-11 09:57:21', '0000-00-00 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
