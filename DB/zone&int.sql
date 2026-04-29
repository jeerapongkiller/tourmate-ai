-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2026 at 06:53 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `love.andaman`
--

-- --------------------------------------------------------

--
-- Table structure for table `nationalitys`
--

CREATE TABLE `nationalitys` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `country_code` varchar(5) DEFAULT NULL,
  `is_approved` int(11) DEFAULT 1,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nationalitys`
--

INSERT INTO `nationalitys` (`id`, `name`, `country_code`, `is_approved`, `created_at`) VALUES
(1, 'Aruba', NULL, 1, '2021-09-15 15:37:35'),
(2, 'Afghanistan', NULL, 1, '2021-09-15 15:37:35'),
(3, 'Angola', NULL, 1, '2021-09-15 15:37:35'),
(4, 'Anguilla', NULL, 1, '2021-09-15 15:37:35'),
(5, 'land Islands', NULL, 1, '2021-09-15 15:37:35'),
(6, 'Albania', NULL, 1, '2021-09-15 15:37:35'),
(7, 'Andorra', NULL, 1, '2021-09-15 15:37:35'),
(8, 'Netherlands Antilles', NULL, 1, '2021-09-15 15:37:35'),
(9, 'United Arab Emirates', NULL, 1, '2021-09-15 15:37:35'),
(10, 'Argentina', NULL, 1, '2021-09-15 15:37:35'),
(11, 'Armenia', NULL, 1, '2021-09-15 15:37:35'),
(12, 'American Samoa', 'us', 1, '2021-09-15 15:37:35'),
(13, 'Antarctica', NULL, 1, '2021-09-15 15:37:35'),
(14, 'French Southern and Antarctic Lands', 'fr', 1, '2021-09-15 15:37:35'),
(15, 'Antigua and Barbuda', NULL, 1, '2021-09-15 15:37:35'),
(16, 'Australia', NULL, 1, '2021-09-15 15:37:35'),
(17, 'Austria', NULL, 1, '2021-09-15 15:37:35'),
(18, 'Azerbaijan', NULL, 1, '2021-09-15 15:37:35'),
(19, 'Burundi', NULL, 1, '2021-09-15 15:37:35'),
(20, 'Belgium', NULL, 1, '2021-09-15 15:37:35'),
(21, 'Benin', NULL, 1, '2021-09-15 15:37:35'),
(22, 'Burkina Faso', NULL, 1, '2021-09-15 15:37:35'),
(23, 'Bangladesh', NULL, 1, '2021-09-15 15:37:35'),
(24, 'Bulgaria', NULL, 1, '2021-09-15 15:37:35'),
(25, 'Bahrain', NULL, 1, '2021-09-15 15:37:35'),
(26, 'Bahamas', NULL, 1, '2021-09-15 15:37:35'),
(27, 'Bosnia and Herzegovina', NULL, 1, '2021-09-15 15:37:35'),
(28, 'Belarus', NULL, 1, '2021-09-15 15:37:35'),
(29, 'Bermuda', NULL, 1, '2021-09-15 15:37:35'),
(30, 'Brazil', NULL, 1, '2021-09-15 15:37:35'),
(31, 'Barbados', NULL, 1, '2021-09-15 15:37:35'),
(32, 'Bhutan', NULL, 1, '2021-09-15 15:37:35'),
(33, 'Bouvet Island', NULL, 1, '2021-09-15 15:37:35'),
(34, 'Botswana', NULL, 1, '2021-09-15 15:37:35'),
(35, 'Central African Republic', NULL, 1, '2021-09-15 15:37:35'),
(36, 'The Territory of Cocos (Keeling) Islands', NULL, 1, '2021-09-15 15:37:35'),
(37, 'Switzerland', NULL, 1, '2021-09-15 15:37:35'),
(38, 'Chile', NULL, 1, '2021-09-15 15:37:35'),
(39, 'China', 'cn', 1, '2021-09-15 15:37:35'),
(41, 'Cameroon', NULL, 1, '2021-09-15 15:37:35'),
(42, 'The Democratic Republic of the Congo', NULL, 1, '2021-09-15 15:37:35'),
(43, 'Cook Islands', NULL, 1, '2021-09-15 15:37:35'),
(44, 'Colombia', NULL, 1, '2021-09-15 15:37:35'),
(45, 'Comoros', NULL, 1, '2021-09-15 15:37:35'),
(46, 'Cabo Verde', NULL, 1, '2021-09-15 15:37:35'),
(47, 'Costa Rica', NULL, 1, '2021-09-15 15:37:35'),
(48, 'Cuba', NULL, 1, '2021-09-15 15:37:35'),
(49, 'Christmas Island', NULL, 1, '2021-09-15 15:37:35'),
(50, 'Cayman Islands', NULL, 1, '2021-09-15 15:37:35'),
(51, 'Cyprus', NULL, 1, '2021-09-15 15:37:35'),
(52, 'Czech Republic', NULL, 1, '2021-09-15 15:37:35'),
(53, 'Germany', 'de', 1, '2021-09-15 15:37:35'),
(54, 'Djibouti', NULL, 1, '2021-09-15 15:37:35'),
(55, 'Danmark', NULL, 1, '2021-09-15 15:37:35'),
(56, 'Algeria', NULL, 1, '2021-09-15 15:37:35'),
(57, 'Ecuador', NULL, 1, '2021-09-15 15:37:35'),
(58, 'Egypt', NULL, 1, '2021-09-15 15:37:35'),
(59, 'Eritrea', NULL, 1, '2021-09-15 15:37:35'),
(60, 'Western Sahara', NULL, 1, '2021-09-15 15:37:35'),
(61, 'Spain', NULL, 1, '2021-09-15 15:37:35'),
(62, 'Estonia', NULL, 1, '2021-09-15 15:37:35'),
(63, 'Ethiopia', NULL, 1, '2021-09-15 15:37:35'),
(64, 'Finland', NULL, 1, '2021-09-15 15:37:35'),
(65, 'Fiji', NULL, 1, '2021-09-15 15:37:35'),
(66, 'Falkland Islands (Malvinas)', NULL, 1, '2021-09-15 15:37:35'),
(67, 'France', NULL, 1, '2021-09-15 15:37:35'),
(68, 'Faroe Islands', NULL, 1, '2021-09-15 15:37:35'),
(69, 'Micronesia', NULL, 1, '2021-09-15 15:37:35'),
(70, 'Gabon', NULL, 1, '2021-09-15 15:37:35'),
(71, 'United Kingdom', 'gb', 1, '2021-09-15 15:37:35'),
(72, 'Georgia', NULL, 1, '2021-09-15 15:37:35'),
(73, 'Ghana', NULL, 1, '2021-09-15 15:37:35'),
(74, 'Gibraltar', NULL, 1, '2021-09-15 15:37:35'),
(75, 'Guinea', NULL, 1, '2021-09-15 15:37:35'),
(76, 'Guadeloupe', NULL, 1, '2021-09-15 15:37:35'),
(77, 'Gambia', NULL, 1, '2021-09-15 15:37:35'),
(78, 'Equatorial Guinea', NULL, 1, '2021-09-15 15:37:35'),
(79, 'Greece', NULL, 1, '2021-09-15 15:37:35'),
(80, 'Grenada', NULL, 1, '2021-09-15 15:37:35'),
(81, 'Greenland', NULL, 1, '2021-09-15 15:37:35'),
(82, 'Guatemala', NULL, 1, '2021-09-15 15:37:35'),
(83, 'French Guiana', 'fr', 1, '2021-09-15 15:37:35'),
(84, 'Guam', NULL, 1, '2021-09-15 15:37:35'),
(85, 'Guyana', NULL, 1, '2021-09-15 15:37:35'),
(86, 'Hong Kong', NULL, 1, '2021-09-15 15:37:35'),
(87, 'Heard and McDonald Islands', NULL, 1, '2021-09-15 15:37:35'),
(88, 'Honduras', NULL, 1, '2021-09-15 15:37:35'),
(89, 'Haiti', NULL, 1, '2021-09-15 15:37:35'),
(90, 'Hungary', NULL, 1, '2021-09-15 15:37:35'),
(91, 'Indonesia', NULL, 1, '2021-09-15 15:37:35'),
(92, 'India', NULL, 1, '2021-09-15 15:37:35'),
(93, 'British Indian Ocean Territory', 'in', 1, '2021-09-15 15:37:35'),
(94, 'Ireland', NULL, 1, '2021-09-15 15:37:35'),
(95, 'Iraq', NULL, 1, '2021-09-15 15:37:35'),
(96, 'Iceland', NULL, 1, '2021-09-15 15:37:35'),
(97, 'Israel', NULL, 1, '2021-09-15 15:37:35'),
(98, 'Italy', NULL, 1, '2021-09-15 15:37:35'),
(99, 'Jamaica', NULL, 1, '2021-09-15 15:37:35'),
(100, 'Jordan', NULL, 1, '2021-09-15 15:37:35'),
(101, 'Japan', NULL, 1, '2021-09-15 15:37:35'),
(102, 'Kazakhstan', NULL, 1, '2021-09-15 15:37:35'),
(103, 'Kenya', NULL, 1, '2021-09-15 15:37:35'),
(104, 'Kyrgyzstan', NULL, 1, '2021-09-15 15:37:35'),
(105, 'Cambodia', NULL, 1, '2021-09-15 15:37:35'),
(106, 'Republic of Korea', NULL, 1, '2021-09-15 15:37:35'),
(107, 'Kuwait', NULL, 1, '2021-09-15 15:37:35'),
(108, 'Lebanon', NULL, 1, '2021-09-15 15:37:35'),
(109, 'Liberia', NULL, 1, '2021-09-15 15:37:35'),
(110, 'Libya', NULL, 1, '2021-09-15 15:37:35'),
(111, 'Saint Lucia', NULL, 1, '2021-09-15 15:37:35'),
(112, 'Sri Lanka', NULL, 1, '2021-09-15 15:37:35'),
(113, 'Lesotho', NULL, 1, '2021-09-15 15:37:35'),
(114, 'Lithuania', NULL, 1, '2021-09-15 15:37:35'),
(115, 'Luxembourg', NULL, 1, '2021-09-15 15:37:35'),
(116, 'Latvia', NULL, 1, '2021-09-15 15:37:35'),
(117, 'Macao', NULL, 1, '2021-09-15 15:37:35'),
(118, 'Morocco', NULL, 1, '2021-09-15 15:37:35'),
(119, 'Monaco', NULL, 1, '2021-09-15 15:37:35'),
(120, 'Madagascar', NULL, 1, '2021-09-15 15:37:35'),
(121, 'Maldives', NULL, 1, '2021-09-15 15:37:35'),
(122, 'Mexico', NULL, 1, '2021-09-15 15:37:35'),
(123, 'Republic of Macedonia', NULL, 1, '2021-09-15 15:37:35'),
(124, 'Mali', NULL, 1, '2021-09-15 15:37:35'),
(125, 'Malta', NULL, 1, '2021-09-15 15:37:35'),
(126, 'Myanmar', NULL, 1, '2021-09-15 15:37:35'),
(127, 'Montenegro', NULL, 1, '2021-09-15 15:37:35'),
(128, 'Mongolia', NULL, 1, '2021-09-15 15:37:35'),
(129, 'Northern Mariana Islands', NULL, 1, '2021-09-15 15:37:35'),
(130, 'Mozambique', NULL, 1, '2021-09-15 15:37:35'),
(131, 'Mauritania', NULL, 1, '2021-09-15 15:37:35'),
(132, 'Montserrat', NULL, 1, '2021-09-15 15:37:35'),
(133, 'Martinique', NULL, 1, '2021-09-15 15:37:35'),
(134, 'Malaysia', NULL, 1, '2021-09-15 15:37:35'),
(135, 'Mayotte', NULL, 1, '2021-09-15 15:37:35'),
(136, 'Namibia', NULL, 1, '2021-09-15 15:37:35'),
(137, 'New Caledonia', NULL, 1, '2021-09-15 15:37:35'),
(138, 'Niger', NULL, 1, '2021-09-15 15:37:35'),
(139, 'Norfolk Island', NULL, 1, '2021-09-15 15:37:35'),
(140, 'Nigeria', NULL, 1, '2021-09-15 15:37:35'),
(141, 'Nicaragua', NULL, 1, '2021-09-15 15:37:35'),
(142, 'Niue', NULL, 1, '2021-09-15 15:37:35'),
(143, 'Norway', NULL, 1, '2021-09-15 15:37:35'),
(144, 'Nauru', NULL, 1, '2021-09-15 15:37:35'),
(145, 'New Zealand', NULL, 1, '2021-09-15 15:37:35'),
(146, 'Oman', NULL, 1, '2021-09-15 15:37:35'),
(147, 'Pakistan', NULL, 1, '2021-09-15 15:37:35'),
(148, 'Panama', NULL, 1, '2021-09-15 15:37:35'),
(149, 'Pitcairn Islands', NULL, 1, '2021-09-15 15:37:35'),
(150, 'Peru', NULL, 1, '2021-09-15 15:37:35'),
(151, 'Philippines', NULL, 1, '2021-09-15 15:37:35'),
(152, 'Palau', NULL, 1, '2021-09-15 15:37:35'),
(153, 'Papua New Guinea', NULL, 1, '2021-09-15 15:37:35'),
(154, 'Puerto Rico', NULL, 1, '2021-09-15 15:37:35'),
(155, 'Portugal', NULL, 1, '2021-09-15 15:37:35'),
(156, 'Paraguay', NULL, 1, '2021-09-15 15:37:35'),
(157, 'French Polynesia', 'fr', 1, '2021-09-15 15:37:35'),
(158, 'Qatar', NULL, 1, '2021-09-15 15:37:35'),
(159, 'R้union', NULL, 1, '2021-09-15 15:37:35'),
(160, 'Romania', NULL, 1, '2021-09-15 15:37:35'),
(161, 'Rwanda', NULL, 1, '2021-09-15 15:37:35'),
(162, 'Sudan', NULL, 1, '2021-09-15 15:37:35'),
(163, 'Senegal', NULL, 1, '2021-09-15 15:37:35'),
(164, 'Singapore', 'sg', 1, '2021-09-15 15:37:35'),
(165, 'South Georgia and the South Sandwich Islands', NULL, 1, '2021-09-15 15:37:35'),
(166, 'Saint Helena', NULL, 1, '2021-09-15 15:37:35'),
(167, 'Svalbard and Jan Mayen', NULL, 1, '2021-09-15 15:37:35'),
(168, 'Solomon Islands', NULL, 1, '2021-09-15 15:37:35'),
(169, 'Sierra Leone', NULL, 1, '2021-09-15 15:37:35'),
(170, 'El Salvador', NULL, 1, '2021-09-15 15:37:35'),
(171, 'San Marino', NULL, 1, '2021-09-15 15:37:35'),
(172, 'Somalia', NULL, 1, '2021-09-15 15:37:35'),
(173, 'Saint Pierre and Miquelon', NULL, 1, '2021-09-15 15:37:35'),
(174, 'Serbia', NULL, 1, '2021-09-15 15:37:35'),
(175, 'Sao Tome and Principe', NULL, 1, '2021-09-15 15:37:35'),
(176, 'Slovenia', NULL, 1, '2021-09-15 15:37:35'),
(177, 'Sweden', NULL, 1, '2021-09-15 15:37:35'),
(178, 'Swaziland', NULL, 1, '2021-09-15 15:37:35'),
(179, 'Turks and Caicos Islands', NULL, 1, '2021-09-15 15:37:35'),
(180, 'Tchad', NULL, 1, '2021-09-15 15:37:35'),
(181, 'Togo', NULL, 1, '2021-09-15 15:37:35'),
(182, 'Thailand', 'th', 1, '2021-09-15 15:37:35'),
(183, 'Tajikistan', NULL, 1, '2021-09-15 15:37:35'),
(184, 'Tokelau', NULL, 1, '2021-09-15 15:37:35'),
(185, 'Turkmenistan', NULL, 1, '2021-09-15 15:37:35'),
(186, 'Timor-Leste', NULL, 1, '2021-09-15 15:37:35'),
(187, 'Trinidad and Tobago', NULL, 1, '2021-09-15 15:37:35'),
(188, 'Tunisia', NULL, 1, '2021-09-15 15:37:35'),
(189, 'Turkey', NULL, 1, '2021-09-15 15:37:35'),
(190, 'Tuvalu', NULL, 1, '2021-09-15 15:37:35'),
(191, 'Uganda', NULL, 1, '2021-09-15 15:37:35'),
(192, 'Ukraine', NULL, 1, '2021-09-15 15:37:35'),
(193, 'United States Minor Outlying Islands', NULL, 1, '2021-09-15 15:37:35'),
(194, 'Uruguay', NULL, 1, '2021-09-15 15:37:35'),
(195, 'United States of America', NULL, 1, '2021-09-15 15:37:35'),
(196, 'Uzbekistan', NULL, 1, '2021-09-15 15:37:35'),
(197, 'State of the Vatican City', NULL, 1, '2021-09-15 15:37:35'),
(198, 'Saint Vincent and the Grenadines', NULL, 1, '2021-09-15 15:37:35'),
(199, 'British Virgin Islands', 'gb', 1, '2021-09-15 15:37:35'),
(200, 'United States Virgin Islands', NULL, 1, '2021-09-15 15:37:35'),
(201, 'Viet Nam', NULL, 1, '2021-09-15 15:37:35'),
(202, 'Vanuatu', NULL, 1, '2021-09-15 15:37:35'),
(203, 'Wallis and Futuna', NULL, 1, '2021-09-15 15:37:35'),
(204, 'Samoa', NULL, 1, '2021-09-15 15:37:35'),
(205, 'Yemen', NULL, 1, '2021-09-15 15:37:35'),
(206, 'Zambia', NULL, 1, '2021-09-15 15:37:35'),
(207, 'Zimbabwe', NULL, 1, '2021-09-15 15:37:35'),
(208, 'Negara Brunei Darussalam', NULL, 1, '2021-09-15 15:37:35'),
(209, 'Plurinational State of Bolivia', NULL, 1, '2021-09-15 15:37:35'),
(210, 'Belize', NULL, 1, '2021-09-15 15:37:35'),
(211, 'Canada', NULL, 1, '2021-09-15 15:37:35'),
(212, 'Congo', NULL, 1, '2021-09-15 15:37:35'),
(213, 'Dominica', NULL, 1, '2021-09-15 15:37:35'),
(214, 'Dominican Republic', NULL, 1, '2021-09-15 15:37:35'),
(215, 'Guinea-Bissau', NULL, 1, '2021-09-15 15:37:35'),
(216, 'Croatia', NULL, 1, '2021-09-15 15:37:35'),
(217, 'Islamic Republic of Iran', NULL, 1, '2021-09-15 15:37:35'),
(218, 'Kiribati', NULL, 1, '2021-09-15 15:37:35'),
(219, 'Saint Kitts and Nevis', NULL, 1, '2021-09-15 15:37:35'),
(220, 'Democratic People`s Republic of Korea', NULL, 1, '2021-09-15 15:37:35'),
(221, 'Lao People`s Democratic Republic', NULL, 1, '2021-09-15 15:37:35'),
(222, 'Liechtenstein', NULL, 1, '2021-09-15 15:37:35'),
(223, 'Republic of Moldova', NULL, 1, '2021-09-15 15:37:35'),
(224, 'Marshall Islands', NULL, 1, '2021-09-15 15:37:35'),
(225, 'Mauritius', NULL, 1, '2021-09-15 15:37:35'),
(226, 'Republic of Malawi', NULL, 1, '2021-09-15 15:37:35'),
(227, 'Netherlands', NULL, 1, '2021-09-15 15:37:35'),
(228, 'Federal Democratic Republic of Nepal', NULL, 1, '2021-09-15 15:37:35'),
(229, 'Republic of Poland', NULL, 1, '2021-09-15 15:37:35'),
(230, 'State of Palestine', NULL, 1, '2021-09-15 15:37:35'),
(231, 'Russian Federation', 'ru', 1, '2021-09-15 15:37:35'),
(232, 'Saudi Arabia', NULL, 1, '2021-09-15 15:37:35'),
(233, 'Seychelles', NULL, 1, '2021-09-15 15:37:35'),
(234, 'Slovakia', NULL, 1, '2021-09-15 15:37:35'),
(235, 'Suriname', NULL, 1, '2021-09-15 15:37:35'),
(236, 'Syrian Arab Republic', NULL, 1, '2021-09-15 15:37:35'),
(237, 'Tonga', NULL, 1, '2021-09-15 15:37:35'),
(238, 'Taiwan', NULL, 1, '2021-09-15 15:37:35'),
(239, 'United Republic of Tanzania', NULL, 1, '2021-09-15 15:37:35'),
(240, 'Bolivarian Republic of Venezuela', NULL, 1, '2021-09-15 15:37:35'),
(241, 'Republic of South Africa', NULL, 1, '2021-09-15 15:37:35'),
(242, 'Republic of Kosovo', NULL, 1, '2021-09-15 15:37:35');

-- --------------------------------------------------------

--
-- Table structure for table `zones`
--

CREATE TABLE `zones` (
  `id` int(11) NOT NULL,
  `provinces` int(11) NOT NULL,
  `route_order` int(11) NOT NULL DEFAULT 999,
  `name` varchar(150) NOT NULL,
  `name_th` varchar(150) NOT NULL,
  `color_hex` varchar(10) NOT NULL DEFAULT '#F3F4F6',
  `start_pickup` time NOT NULL,
  `end_pickup` time NOT NULL,
  `pickup` int(11) NOT NULL,
  `dropoff` int(11) NOT NULL,
  `is_approved` int(11) NOT NULL DEFAULT 0,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `zones`
--

INSERT INTO `zones` (`id`, `provinces`, `route_order`, `name`, `name_th`, `color_hex`, `start_pickup`, `end_pickup`, `pickup`, `dropoff`, `is_approved`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 66, 90, 'Panwa Cape', 'พันวา', '#D1FAE5', '05:30:00', '05:30:00', 1, 1, 1, 0, '2024-09-02 08:36:56', '2024-09-02 08:36:56'),
(2, 66, 120, 'Rawai Beach', 'หาดราไวย์', '#D1FAE5', '05:30:00', '05:30:00', 1, 1, 1, 0, '2024-09-02 08:37:45', '2024-09-02 08:37:45'),
(3, 66, 100, 'Kata, Karon Beach', 'หาดกะตะ, กะรน', '#D1FAE5', '05:45:00', '06:00:00', 1, 1, 1, 0, '2024-09-02 08:38:34', '2024-09-02 08:38:34'),
(4, 66, 80, 'Koh Sire', 'เกาะสิเหร่', '#FEF3C7', '05:30:00', '05:45:00', 1, 1, 1, 0, '2024-09-02 08:39:23', '2024-09-02 08:39:23'),
(5, 66, 70, 'Phuket town', 'เมืองภูเก็ต', '#FEF3C7', '06:00:00', '06:15:00', 1, 1, 1, 0, '2024-09-02 08:39:52', '2024-09-02 08:39:52'),
(6, 66, 50, 'Patong Beach', 'หาดป่าตอง', '#EDE9FE', '06:00:00', '06:15:00', 1, 1, 1, 0, '2024-09-02 08:40:23', '2024-09-02 08:40:23'),
(7, 66, 40, 'Kamala Beach', 'หาดกมลา', '#EDE9FE', '06:00:00', '06:15:00', 1, 1, 1, 0, '2024-09-02 08:41:14', '2024-09-02 08:41:14'),
(8, 66, 30, 'Bang tao Beach, Surin Beach', 'หาดบางเทา, หาดสุรินทร์', '#EDE9FE', '06:15:00', '06:30:00', 1, 1, 1, 0, '2024-09-02 08:42:07', '2024-10-08 09:26:01'),
(9, 66, 20, 'Nai Thon, Nai yang, Phuket Airport', 'ในทอน, ในยาง, สนามบิน', '#EDE9FE', '06:30:00', '06:45:00', 1, 1, 1, 0, '2024-09-02 08:45:25', '2024-10-19 08:17:53'),
(10, 66, 10, 'Mai Khao Beach', 'หาดไม้ขาว', '#DBEAFE', '07:00:00', '07:15:00', 1, 1, 1, 0, '2024-09-02 08:45:54', '2024-09-02 08:45:54'),
(11, 66, 330, 'Klok Kloy Beach', '', '#DBEAFE', '07:15:00', '07:30:00', 1, 1, 1, 0, '2024-09-02 08:46:57', '2024-09-02 08:46:57'),
(12, 65, 370, 'Nam khem pier', 'ท่าเรือน้ำเค็ม', '#DBEAFE', '06:45:00', '07:00:00', 1, 1, 1, 0, '2024-09-02 08:49:12', '2024-09-02 08:49:12'),
(13, 65, 380, 'Bang Sak Beach', 'หาดบางสัก', '#DBEAFE', '07:00:00', '07:15:00', 1, 1, 1, 0, '2024-09-02 08:49:37', '2024-09-02 08:49:37'),
(14, 65, 390, 'Pakarang, Pakweeb Beach', 'แหลมปะการัง, หาดปากวีป', '#FCE7F3', '07:00:00', '07:15:00', 1, 1, 1, 0, '2024-09-02 08:50:27', '2024-09-02 08:50:27'),
(15, 65, 400, 'Khuk-Khak Beach', 'หาดคึกคัก', '#FCE7F3', '07:15:00', '07:30:00', 1, 1, 1, 0, '2024-09-02 08:51:03', '2024-09-02 08:51:03'),
(16, 65, 410, 'Bang nieang Beach', 'หาดบางเนียง', '#FCE7F3', '07:30:00', '07:45:00', 1, 1, 1, 0, '2024-09-02 08:51:43', '2024-09-02 08:51:43'),
(17, 65, 290, 'Nang Thong Beach', 'หาดนางทอง', '#DBEAFE', '07:45:00', '08:00:00', 1, 1, 1, 0, '2024-09-02 08:52:26', '2024-09-02 08:52:26'),
(18, 65, 420, 'Merlin Beach, Lam kan, Thaplamu', 'ทับละมุ', '#FCE7F3', '08:00:00', '08:15:00', 1, 1, 1, 0, '2024-09-02 08:54:25', '2024-09-02 08:54:25'),
(19, 64, 280, 'Krabi town', 'เมืองกระบี่', '#FCE7F3', '05:45:00', '06:00:00', 1, 1, 1, 0, '2024-09-18 02:40:39', '2025-03-01 14:32:56'),
(20, 64, 270, 'Ao-nang Beach', 'หาดอ่าวนาง', '#FCE7F3', '05:30:00', '05:45:00', 1, 1, 1, 0, '2024-09-18 02:41:17', '2024-09-18 02:41:17'),
(21, 64, 260, 'Klong-moung', 'หาดคลองม่วง', '#FCE7F3', '05:30:00', '05:45:00', 1, 1, 1, 0, '2024-09-18 02:42:08', '2024-09-18 02:42:08'),
(22, 66, 110, 'Chalong ', 'ฉลอง', '#FCE7F3', '05:45:00', '06:00:00', 1, 1, 1, 0, '2024-10-09 03:03:15', '2024-10-09 03:03:15'),
(23, 66, 230, ' Koh Keaw', 'เกาะแก้ว', '#FCE7F3', '06:15:00', '06:30:00', 1, 1, 1, 0, '2024-10-12 11:50:41', '2024-10-15 13:26:05'),
(24, 66, 220, 'Ao Por', 'อ่าวปอ', '#FCE7F3', '06:00:00', '06:00:00', 1, 1, 1, 0, '2024-10-14 01:42:56', '2024-10-14 01:42:56'),
(25, 66, 60, 'Kathu', 'กระทู้', '#FEE2E2', '06:15:00', '06:30:00', 1, 1, 1, 0, '2024-10-15 06:18:16', '2024-10-15 06:18:16'),
(26, 66, 130, 'Nai Harn', 'ในหาน', '#FEE2E2', '05:30:00', '00:00:00', 1, 1, 1, 0, '2024-10-15 14:14:15', '2024-10-15 14:14:15'),
(27, 66, 200, 'Lame Hin', 'แหลมหิน', '#FEE2E2', '06:15:00', '06:30:00', 1, 1, 1, 0, '2024-10-17 07:32:47', '2024-10-17 07:37:07'),
(28, 66, 190, 'Ao Yon', 'อ่าวยน', '#FEE2E2', '05:30:00', '00:00:00', 1, 1, 1, 0, '2024-10-19 14:08:23', '2024-10-19 14:08:23'),
(29, 66, 180, 'Natai', 'นาใต้', '#D1FAE5', '07:15:00', '07:30:00', 1, 1, 1, 0, '2024-11-04 10:23:20', '2024-11-04 10:23:20'),
(30, 66, 20, 'Thalang', 'ถลาง', '#FFEDD5', '06:30:00', '06:45:00', 1, 1, 1, 0, '2024-11-12 09:28:17', '2024-11-12 09:28:17'),
(31, 65, 350, 'Phang Nga Town', 'เมืองพังงา', '#FFEDD5', '00:00:00', '00:00:00', 1, 1, 1, 0, '2024-11-27 09:13:42', '2024-11-27 09:13:42'),
(32, 66, 170, 'Pa Klok', 'ป่าคลอก', '#FFEDD5', '06:00:00', '06:15:00', 1, 1, 1, 0, '2024-12-12 11:23:38', '2024-12-12 11:23:38'),
(33, 65, 340, 'Khaosok', 'เขาสก', '#FFEDD5', '06:00:00', '06:15:00', 1, 1, 1, 0, '2024-12-17 11:12:24', '2024-12-17 11:12:24'),
(34, 64, 160, 'Ao-Nam Mao', '', '#CFFAFE', '05:30:00', '05:45:00', 1, 1, 1, 0, '2024-12-31 09:38:54', '2024-12-31 09:38:54'),
(35, 65, 360, 'Mueang Phang Nga ', 'เมืองพังงา', '#CFFAFE', '06:15:00', '06:30:00', 1, 1, 1, 0, '2025-01-10 07:55:27', '2025-01-10 07:59:47'),
(36, 66, 150, 'Khok Kloi', 'โคกกลอย', '#CFFAFE', '07:15:00', '07:30:00', 1, 1, 1, 0, '2025-01-16 07:18:33', '2025-01-16 07:18:38'),
(37, 66, 140, 'Laemsai pier', 'ท่าเรือแหลมทราย', '#CFFAFE', '06:00:00', '06:15:00', 1, 1, 1, 0, '2025-01-23 07:27:34', '2025-01-23 07:27:34'),
(38, 66, 130, 'Thai Mueang ', 'ท้ายเหมือง', '#CFFAFE', '07:15:00', '07:30:00', 1, 1, 1, 0, '2025-01-27 11:28:12', '2025-01-27 11:28:18'),
(39, 0, 100, 'Si Sunthon', 'Si Sunthon', '#CFFAFE', '00:00:00', '00:00:00', 0, 0, 1, 0, '2026-03-27 23:15:21', '2026-03-27 23:15:21'),
(40, 0, 115, 'Wichit', 'Wichit', '#CCFBF1', '00:00:00', '00:00:00', 0, 0, 1, 0, '2026-04-08 11:56:03', '2026-04-08 11:56:03'),
(41, 0, 75, 'Amphur Muang', 'Amphur Muang', '#CCFBF1', '00:00:00', '00:00:00', 0, 0, 1, 0, '2026-04-08 11:58:37', '2026-04-08 11:58:37'),
(42, 0, 125, 'ราไวย์', 'ราไวย์', '#CCFBF1', '00:00:00', '00:00:00', 0, 0, 1, 0, '2026-04-08 12:00:20', '2026-04-08 12:00:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `nationalitys`
--
ALTER TABLE `nationalitys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zones`
--
ALTER TABLE `zones`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `nationalitys`
--
ALTER TABLE `nationalitys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=243;

--
-- AUTO_INCREMENT for table `zones`
--
ALTER TABLE `zones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
