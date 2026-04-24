-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 24, 2026 at 12:56 PM
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
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `slug` varchar(150) NOT NULL,
  `is_daleted` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `name`, `slug`, `is_daleted`, `created_at`, `updated_at`) VALUES
(1, 'ธนาคารกรุงเทพ จำกัด (มหาชน)', 'ธนาคารกรุงเทพ-จำกัด-(มหาชน)', 0, '2022-06-10 09:44:44', '2024-10-31 12:48:16'),
(2, 'ธนาคารกรุงไทย จำกัด (มหาชน)', 'ธนาคารกรุงไทย-จำกัด-(มหาชน)', 1, '2022-06-10 09:56:22', '2024-10-31 12:48:05'),
(3, 'ธนาคารกรุงศรีอยุธยา จำกัด (มหาชน)', 'ธนาคารกรุงศรีอยุธยา-จำกัด-(มหาชน)', 0, '2022-06-10 10:02:43', '2022-10-28 07:47:50'),
(4, 'ธนาคารกสิกรไทย (KBANK)', 'ธนาคารกสิกรไทย-(KBANK)', 0, '2023-09-08 04:45:41', '2023-09-08 04:45:41'),
(5, 'ธนาคารทหารไทยธนชาต จำกัด (มหาชน)', 'ธนาคารทหารไทยธนชาต-จำกัด-(มหาชน)', 0, '2024-10-14 09:25:32', '2024-10-14 09:25:32'),
(6, 'Kasikornbank', 'Kasikornbank', 0, '2024-10-20 07:52:12', '2024-10-20 07:52:12'),
(7, 'กรุงเทพ', 'กรุงเทพ', 1, '2024-10-31 12:47:46', '2024-10-31 12:47:52');

-- --------------------------------------------------------

--
-- Table structure for table `bank_account`
--

CREATE TABLE `bank_account` (
  `id` int(11) NOT NULL,
  `account_name` varchar(150) NOT NULL,
  `account_no` varchar(50) NOT NULL,
  `bank_id` int(11) NOT NULL,
  `is_approved` int(11) NOT NULL,
  `is_deleted` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bank_account`
--

INSERT INTO `bank_account` (`id`, `account_name`, `account_no`, `bank_id`, `is_approved`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'love andaman', '8190487884', 3, 1, 0, '2026-02-10 14:39:30', '2026-02-10 14:39:30');

-- --------------------------------------------------------

--
-- Table structure for table `boats`
--

CREATE TABLE `boats` (
  `id` int(11) NOT NULL,
  `refcode` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `capacity` int(11) NOT NULL,
  `color` varchar(20) NOT NULL,
  `background` varchar(20) NOT NULL,
  `boat_type_id` int(11) NOT NULL DEFAULT 0,
  `is_approved` int(11) NOT NULL DEFAULT 0,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `boats`
--

INSERT INTO `boats` (`id`, `refcode`, `name`, `slug`, `capacity`, `color`, `background`, `boat_type_id`, `is_approved`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, '', 'Romeo', '', 32, '#00B800', '#EBFCEB', 0, 1, 0, '2025-11-11 11:14:31', '2025-11-11 11:14:31'),
(2, '', 'Verona', '', 32, '#C900C9', '#FCEDFC', 0, 1, 0, '2025-11-11 11:14:40', '2025-11-11 11:14:40'),
(3, '', 'Zeus', '', 40, '#3B3B3B', '#EDEDED', 0, 1, 0, '2025-11-11 11:14:50', '2025-11-11 11:14:50'),
(4, '', 'Irena', '', 55, '#964F09', '#FFEDDB', 0, 1, 0, '2025-11-11 11:15:00', '2025-11-11 11:15:00'),
(5, '', 'Okeanos', '', 58, '#3B3B3B', '#EBEBEB', 0, 1, 0, '2025-11-11 11:15:08', '2025-11-11 11:15:08'),
(6, '', 'Achilles', '', 66, '', '', 0, 0, 1, '2025-11-11 11:15:19', '2025-11-11 11:15:19'),
(7, '', 'Artemis', '', 66, '#F23F5E', '#FFEDF0', 0, 1, 0, '2025-11-11 11:15:28', '2025-11-11 11:15:28'),
(8, '', 'Aluminous1', '', 65, '#00B0A5', '#E5FFFE', 0, 1, 0, '2025-11-11 11:15:36', '2025-11-11 11:15:36'),
(9, '', 'Achilles', '', 66, '#A15E1B', '#FFF1E5', 0, 1, 0, '2025-11-11 11:15:36', '2025-11-11 11:15:36'),
(10, '', 'Andaman Ryder', '', 0, '#C900C9', '#FFF0FF', 0, 1, 0, '2025-11-11 11:15:36', '2025-11-11 11:15:36'),
(11, '', 'Hermetis', '', 0, '#00B0A5', '#E8FFFF', 0, 1, 0, '2025-11-11 11:15:36', '2025-11-11 11:15:36'),
(12, '', 'Rolanda', '', 0, '#DAA520', '#FFFFDE', 0, 1, 0, '2025-11-11 11:15:36', '2025-11-11 11:15:36'),
(13, '', 'Oceanus', '', 0, '#008000', '#EDFFED', 0, 1, 0, '2025-11-11 11:15:36', '2025-11-11 11:15:36'),
(14, '', 'Aluminous2', '', 0, '#0000BD', '#EDEDFF', 0, 1, 0, '2025-11-11 11:15:36', '2025-11-11 11:15:36'),
(15, '', 'LKC66', '', 0, '#F23F5E', '#FFEBEF', 0, 1, 0, '2025-11-11 11:15:36', '2025-11-11 11:15:36'),
(16, '', 'Tadeo', '', 0, '#E3C300', '#FFFBE8', 0, 1, 0, '2025-11-11 11:15:36', '2025-11-11 11:15:36');

-- --------------------------------------------------------

--
-- Table structure for table `boats_type`
--

CREATE TABLE `boats_type` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `booking_date` date NOT NULL,
  `booking_time` time NOT NULL,
  `voucher_no_agent` varchar(150) NOT NULL,
  `discount_type` int(11) NOT NULL DEFAULT 1 COMMENT '1 : Baht\r\n2 : Percent',
  `discount` double(9,2) NOT NULL,
  `sender` varchar(150) NOT NULL,
  `booker_id` int(11) NOT NULL COMMENT 'user id',
  `company_id` int(11) NOT NULL DEFAULT 0,
  `booking_status_id` int(11) NOT NULL DEFAULT 0,
  `booking_type_id` int(11) NOT NULL DEFAULT 0,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `booking_date`, `booking_time`, `voucher_no_agent`, `discount_type`, `discount`, `sender`, `booker_id`, `company_id`, `booking_status_id`, `booking_type_id`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, '2025-11-13', '15:39:13', '990016/525', 1, 0.00, 'คุณยักษ์', 1, 1, 1, 1, 0, '2025-11-13 15:40:45', '2026-04-08 12:05:02'),
(2, '2025-11-13', '22:58:48', '4565', 1, 0.00, 'test', 1, 1, 1, 1, 0, '2025-11-13 22:59:21', '2026-04-08 12:04:48'),
(3, '2025-11-13', '23:03:53', '990344', 1, 0.00, 'คุณยักษ์', 1, 1, 1, 1, 0, '2025-11-13 23:04:39', '2026-04-08 12:04:30'),
(4, '2025-11-14', '12:34:40', '6876', 1, 0.00, 'KunU', 1, 1, 1, 1, 0, '2025-11-14 12:38:41', '2026-04-21 13:21:21'),
(5, '2025-11-14', '12:53:39', '675', 1, 0.00, 'Kun V', 1, 1, 1, 1, 0, '2025-11-14 12:54:37', '2026-04-08 11:58:53'),
(6, '2025-11-14', '13:30:31', '686789', 1, 0.00, 'test', 1, 1, 1, 1, 0, '2025-11-14 13:31:30', '2026-04-08 11:59:06'),
(7, '2025-11-16', '09:43:13', '2352', 1, 0.00, 'KunU', 1, 2, 1, 1, 0, '2025-11-16 09:43:40', '2026-04-08 11:59:21'),
(8, '2025-11-16', '09:53:46', '6558', 1, 0.00, 'Kun V', 1, 1, 1, 1, 0, '2025-11-16 09:55:37', '2026-04-08 11:59:44'),
(9, '2025-11-16', '10:00:19', '5ll5345', 1, 0.00, 'Kun V', 1, 1, 1, 1, 0, '2025-11-16 10:01:07', '2026-04-08 12:00:05'),
(10, '2025-11-16', '10:01:08', 'h555643', 1, 0.00, 'Kun T', 1, 1, 1, 1, 0, '2025-11-16 10:01:42', '2026-04-08 12:00:20'),
(11, '2025-11-16', '10:23:45', 'h666', 1, 0.00, '345', 1, 2, 1, 1, 0, '2025-11-16 10:24:36', '2026-04-08 12:00:38'),
(12, '2025-11-19', '14:37:48', '5451', 1, 0.00, 'คุณยักษ์', 1, 3, 1, 1, 0, '2025-11-19 14:58:32', '2026-04-08 12:00:55'),
(13, '2025-11-19', '14:58:33', '45543', 1, 0.00, 'คุณยักษ์', 1, 2, 1, 1, 0, '2025-11-19 15:17:42', '2026-04-08 12:01:09'),
(14, '2025-11-19', '15:17:43', 'T884-59', 1, 0.00, 'KunU', 1, 4, 1, 1, 0, '2025-11-19 15:18:38', '2026-04-08 11:52:29'),
(15, '2025-11-19', '15:19:14', '99/9206', 1, 0.00, 'Kun V', 1, 1, 1, 1, 0, '2025-11-19 15:20:39', '2025-11-19 15:20:39'),
(16, '2025-11-19', '15:20:40', '54323', 1, 0.00, 'Kun C', 1, 3, 1, 1, 0, '2025-11-19 15:21:53', '2026-04-08 11:53:28'),
(17, '2025-11-19', '15:21:54', '545/676', 1, 0.00, 'คุณยักษ์', 1, 2, 1, 1, 0, '2025-11-19 15:23:41', '2026-04-20 23:33:46'),
(18, '2025-11-20', '09:45:35', '886/43', 1, 0.00, 'KunU', 1, 2, 1, 1, 0, '2025-11-20 09:46:23', '2026-04-08 11:56:03'),
(19, '2025-12-12', '13:17:33', '2334/88', 1, 500.00, 'คุณยักษ์', 1, 4, 1, 1, 0, '2025-12-12 13:22:38', '2025-12-12 13:22:38'),
(20, '2025-12-12', '13:35:07', '132/66', 1, 500.00, 'คุณยักษ์', 1, 2, 1, 1, 0, '2025-12-12 13:36:16', '2025-12-12 13:36:16'),
(21, '2025-12-12', '13:35:07', '132/66', 1, 0.00, 'คุณยักษ์', 1, 2, 1, 1, 0, '2025-12-12 13:38:18', '2026-04-08 11:56:38'),
(22, '2025-12-12', '13:45:55', '4242/88', 1, 0.00, 'Kun T', 1, 2, 1, 1, 0, '2025-12-12 13:47:16', '2026-04-10 10:24:20'),
(23, '2026-02-21', '10:40:02', '99/482', 1, 0.00, 'คุณยักษ์', 1, 3, 1, 1, 0, '2026-02-21 10:41:00', '2026-04-08 11:51:55'),
(24, '2026-03-27', '13:36:19', '673/31', 1, 0.00, '', 1, 0, 1, 1, 1, '2026-03-27 13:37:47', '2026-04-08 11:04:14'),
(25, '2026-03-27', '13:45:28', 'YU321', 1, 0.00, '', 1, 0, 1, 1, 0, '2026-03-27 13:48:06', '2026-04-08 12:27:24'),
(26, '2026-04-08', '13:48:40', '5012', 1, 0.00, 'PN', 1, 3, 1, 1, 0, '2026-04-08 13:49:55', '2026-04-08 13:49:55');

-- --------------------------------------------------------

--
-- Table structure for table `bookings_chrage`
--

CREATE TABLE `bookings_chrage` (
  `id` int(11) NOT NULL,
  `adult` int(11) NOT NULL,
  `child` int(11) NOT NULL,
  `infant` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings_chrage`
--

INSERT INTO `bookings_chrage` (`id`, `adult`, `child`, `infant`, `booking_id`, `updated_at`, `created_at`) VALUES
(1, 1, 2, 0, 18, '2026-04-08 11:56:03', '2026-01-29 12:24:27'),
(2, 1, 0, 0, 16, '2026-04-08 11:53:28', '2026-02-03 13:44:45'),
(3, 4, 2, 0, 23, '2026-04-08 11:51:55', '2026-02-21 10:43:35');

-- --------------------------------------------------------

--
-- Table structure for table `bookings_discount`
--

CREATE TABLE `bookings_discount` (
  `id` int(11) NOT NULL,
  `detail` text NOT NULL,
  `rates` double(9,2) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings_discount`
--

INSERT INTO `bookings_discount` (`id`, `detail`, `rates`, `booking_id`, `created_at`) VALUES
(3, 'No Show 1 pax', 400.00, 17, '2026-01-31 12:06:46'),
(6, 'Cancel With Chrage 50% 1 pax', 300.00, 18, '2026-01-31 13:29:49'),
(7, 'No Show 2 pax', 3200.00, 18, '2026-01-31 13:36:34'),
(9, 'Cancel With Chrage 50% 1 pax', 3000.00, 16, '2026-02-11 12:00:45'),
(10, 'Cancel wiht Charge', 3000.00, 23, '2026-02-21 10:42:52'),
(11, 'Cancel wiht Charge 50%', 1200.00, 23, '2026-02-21 10:59:11'),
(12, '', 0.00, 24, '2026-03-27 23:15:21'),
(13, '', 0.00, 25, '2026-04-08 11:03:50'),
(14, '', 0.00, 14, '2026-04-08 11:52:29'),
(15, '', 0.00, 21, '2026-04-08 11:56:38'),
(16, '', 0.00, 22, '2026-04-08 11:57:04'),
(17, '', 0.00, 4, '2026-04-08 11:58:37'),
(18, '', 0.00, 5, '2026-04-08 11:58:53'),
(19, '', 0.00, 6, '2026-04-08 11:59:06'),
(20, '', 0.00, 7, '2026-04-08 11:59:21'),
(21, '', 0.00, 8, '2026-04-08 11:59:44'),
(22, '', 0.00, 9, '2026-04-08 12:00:05'),
(23, '', 0.00, 10, '2026-04-08 12:00:20'),
(24, '', 0.00, 11, '2026-04-08 12:00:38'),
(25, '', 0.00, 12, '2026-04-08 12:00:55'),
(26, '', 0.00, 13, '2026-04-08 12:01:09'),
(27, '', 0.00, 3, '2026-04-08 12:04:30'),
(28, '', 0.00, 2, '2026-04-08 12:04:48'),
(29, '', 0.00, 1, '2026-04-08 12:05:02');

-- --------------------------------------------------------

--
-- Table structure for table `bookings_no`
--

CREATE TABLE `bookings_no` (
  `id` int(11) NOT NULL,
  `bo_date` date NOT NULL,
  `bo_year` int(11) NOT NULL,
  `bo_year_th` int(11) NOT NULL,
  `bo_month` int(11) NOT NULL,
  `bo_no` int(11) NOT NULL,
  `bo_full` varchar(50) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings_no`
--

INSERT INTO `bookings_no` (`id`, `bo_date`, `bo_year`, `bo_year_th`, `bo_month`, `bo_no`, `bo_full`, `booking_id`, `created_at`) VALUES
(1, '2025-11-13', 2025, 68, 11, 1, 'BO68110001', 1, '2025-11-13 15:40:45'),
(2, '2025-11-13', 2025, 68, 11, 2, 'BO68110002', 2, '2025-11-13 22:59:21'),
(3, '2025-11-13', 2025, 68, 11, 3, 'BO68110003', 3, '2025-11-13 23:04:39'),
(4, '2025-11-14', 2025, 68, 11, 4, 'BO68110004', 4, '2025-11-14 12:38:41'),
(5, '2025-11-14', 2025, 68, 11, 5, 'BO68110005', 5, '2025-11-14 12:54:37'),
(6, '2025-11-14', 2025, 68, 11, 6, 'BO68110006', 6, '2025-11-14 13:31:30'),
(7, '2025-11-16', 2025, 68, 11, 7, 'BO68110007', 7, '2025-11-16 09:43:40'),
(8, '2025-11-16', 2025, 68, 11, 8, 'BO68110008', 8, '2025-11-16 09:55:37'),
(9, '2025-11-16', 2025, 68, 11, 9, 'BO68110009', 9, '2025-11-16 10:01:07'),
(10, '2025-11-16', 2025, 68, 11, 10, 'BO68110010', 10, '2025-11-16 10:01:42'),
(11, '2025-11-16', 2025, 68, 11, 11, 'BO68110011', 11, '2025-11-16 10:24:36'),
(12, '2025-11-19', 2025, 68, 11, 12, 'BO68110012', 12, '2025-11-19 14:58:32'),
(13, '2025-11-19', 2025, 68, 11, 13, 'BO68110013', 13, '2025-11-19 15:17:42'),
(14, '2025-11-19', 2025, 68, 11, 14, 'BO68110014', 14, '2025-11-19 15:18:38'),
(15, '2025-11-19', 2025, 68, 11, 15, 'BO68110015', 15, '2025-11-19 15:20:39'),
(16, '2025-11-19', 2025, 68, 11, 16, 'BO68110016', 16, '2025-11-19 15:21:53'),
(17, '2025-11-19', 2025, 68, 11, 17, 'BO68110017', 17, '2025-11-19 15:23:41'),
(18, '2025-11-20', 2025, 68, 11, 18, 'BO68110018', 18, '2025-11-20 09:46:23'),
(19, '2025-12-12', 2025, 68, 12, 1, 'BO68120001', 19, '2025-12-12 13:22:38'),
(20, '2025-12-12', 2025, 68, 12, 2, 'BO68120002', 20, '2025-12-12 13:36:16'),
(21, '2025-12-12', 2025, 68, 12, 3, 'BO68120003', 21, '2025-12-12 13:38:18'),
(22, '2025-12-12', 2025, 68, 12, 4, 'BO68120004', 22, '2025-12-12 13:47:16'),
(23, '2026-02-21', 2026, 69, 2, 1, 'BO69020001', 23, '2026-02-21 10:41:00'),
(24, '2026-03-27', 2026, 69, 3, 1, 'BO69030001', 24, '2026-03-27 13:37:47'),
(25, '2026-03-27', 2026, 69, 3, 2, 'BO69030002', 25, '2026-03-27 13:48:06'),
(26, '2026-04-08', 2026, 69, 4, 1, 'BO69040001', 26, '2026-04-08 13:49:55');

-- --------------------------------------------------------

--
-- Table structure for table `booking_extra_charge`
--

CREATE TABLE `booking_extra_charge` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `adult` int(11) NOT NULL,
  `child` int(11) NOT NULL,
  `infant` int(11) NOT NULL,
  `privates` int(11) NOT NULL,
  `rate_adult` double(9,2) NOT NULL,
  `rate_child` double(9,2) NOT NULL,
  `rate_infant` double(9,2) NOT NULL,
  `rate_private` double(9,2) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `extra_charge_id` int(11) NOT NULL,
  `type` int(11) NOT NULL DEFAULT 0 COMMENT 'Per Pax : 1\r\nTotal : 2',
  `is_approved` int(11) NOT NULL DEFAULT 0,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `booking_extra_charge`
--

INSERT INTO `booking_extra_charge` (`id`, `name`, `adult`, `child`, `infant`, `privates`, `rate_adult`, `rate_child`, `rate_infant`, `rate_private`, `booking_id`, `extra_charge_id`, `type`, `is_approved`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, '', 2, 1, 1, 1, 200.00, 100.00, 60.00, 4999.00, 11, 1, 2, 1, 0, '2026-01-09 15:43:27', '2026-04-08 12:00:38'),
(2, '', 0, 0, 0, 2, 0.00, 0.00, 0.00, 3000.00, 10, 1, 2, 1, 0, '2026-01-11 00:57:57', '2026-04-08 12:00:20'),
(3, '', 3, 0, 0, 0, 1000.00, 0.00, 0.00, 0.00, 5, 1, 1, 1, 0, '2026-01-11 14:50:07', '2026-04-08 11:58:53'),
(4, '', 3, 0, 0, 0, 1000.00, 0.00, 0.00, 0.00, 7, 1, 1, 1, 0, '2026-01-11 14:50:17', '2026-04-08 11:59:21'),
(5, '', 0, 0, 0, 1, 0.00, 0.00, 0.00, 2000.00, 21, 1, 2, 1, 0, '2026-01-11 15:52:54', '2026-04-08 11:56:38'),
(6, '', 2, 1, 0, 0, 300.00, 100.00, 0.00, 0.00, 16, 1, 1, 1, 0, '2026-02-11 12:00:45', '2026-04-08 11:53:28'),
(7, '', 0, 0, 0, 4, 0.00, 0.00, 0.00, 1400.00, 23, 1, 2, 1, 0, '2026-02-21 10:45:17', '2026-04-08 11:51:55');

-- --------------------------------------------------------

--
-- Table structure for table `booking_manage_boat`
--

CREATE TABLE `booking_manage_boat` (
  `id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `arrange` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `manage_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `booking_manage_transfer`
--

CREATE TABLE `booking_manage_transfer` (
  `id` int(11) NOT NULL,
  `arrange` int(11) NOT NULL,
  `pax` int(11) NOT NULL,
  `manage_id` int(11) NOT NULL,
  `booking_transfer_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `booking_manage_transfer`
--

INSERT INTO `booking_manage_transfer` (`id`, `arrange`, `pax`, `manage_id`, `booking_transfer_id`, `created_at`) VALUES
(124, 1, 3, 117, 6, '2026-04-24 15:08:00'),
(125, 2, 3, 117, 11, '2026-04-24 15:08:00'),
(126, 3, 6, 117, 12, '2026-04-24 15:08:00'),
(129, 1, 12, 119, 4, '2026-04-24 15:20:01'),
(130, 1, 4, 120, 4, '2026-04-24 15:20:10'),
(131, 2, 4, 120, 8, '2026-04-24 15:20:10'),
(132, 1, 3, 121, 19, '2026-04-24 16:04:34');

-- --------------------------------------------------------

--
-- Table structure for table `booking_paid`
--

CREATE TABLE `booking_paid` (
  `id` int(11) NOT NULL,
  `total_paid` double(9,2) NOT NULL,
  `status_cot` int(11) NOT NULL DEFAULT 1,
  `booking_payment_id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL COMMENT 'user_id',
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `booking_paid`
--

INSERT INTO `booking_paid` (`id`, `total_paid`, `status_cot`, `booking_payment_id`, `booking_id`, `user_id`, `updated_at`, `created_at`) VALUES
(1, 0.00, 1, 2, 1, 1, '2025-11-13 15:40:45', '2025-11-13 15:40:45'),
(2, 0.00, 1, 2, 2, 1, '2025-11-13 22:59:21', '2025-11-13 22:59:21'),
(3, 0.00, 1, 2, 3, 1, '2025-11-13 23:04:39', '2025-11-13 23:04:39'),
(4, 10000.00, 1, 4, 4, 1, '2026-04-21 13:21:21', '2025-11-14 12:38:41'),
(5, 0.00, 1, 2, 5, 1, '2025-11-14 12:54:37', '2025-11-14 12:54:37'),
(6, 0.00, 1, 2, 6, 1, '2025-11-14 13:31:30', '2025-11-14 13:31:30'),
(7, 0.00, 1, 3, 4, 1, '2026-02-23 13:37:01', '2025-11-14 14:40:32'),
(8, 0.00, 1, 3, 5, 1, '2026-02-23 13:37:01', '2025-11-14 14:40:32'),
(9, 0.00, 1, 2, 7, 1, '2025-11-16 09:43:40', '2025-11-16 09:43:40'),
(10, 1500.00, 3, 4, 8, 1, '2026-04-08 11:59:44', '2025-11-16 09:55:37'),
(11, 0.00, 1, 2, 9, 1, '2025-11-16 10:01:07', '2025-11-16 10:01:07'),
(12, 0.00, 1, 2, 10, 1, '2025-11-16 10:01:42', '2025-11-16 10:01:42'),
(13, 0.00, 1, 2, 11, 1, '2025-11-16 10:24:36', '2025-11-16 10:24:36'),
(14, 0.00, 1, 2, 12, 1, '2025-11-19 14:58:32', '2025-11-19 14:58:32'),
(15, 1000.00, 1, 4, 13, 1, '2026-04-08 12:01:09', '2025-11-19 15:17:42'),
(16, 0.00, 1, 2, 14, 1, '2025-11-19 15:18:38', '2025-11-19 15:18:38'),
(17, 0.00, 1, 2, 15, 1, '2025-11-19 15:20:39', '2025-11-19 15:20:39'),
(18, 1500.00, 1, 4, 16, 1, '2026-04-08 11:53:28', '2025-11-19 15:21:53'),
(19, 0.00, 1, 2, 17, 1, '2025-11-19 15:23:41', '2025-11-19 15:23:41'),
(20, 0.00, 1, 2, 18, 1, '2025-11-20 09:46:23', '2025-11-20 09:46:23'),
(21, 1000.00, 2, 4, 22, 1, '2026-04-10 10:24:20', '2025-12-12 13:47:16'),
(22, 400.00, 1, 4, 21, 1, '2026-04-08 11:56:38', '2026-01-26 11:22:28'),
(27, 0.00, 1, 6, 14, 1, '2026-02-20 15:46:28', '2026-02-20 15:46:28'),
(28, 2000.00, 1, 4, 23, 1, '2026-04-08 11:51:55', '2026-02-21 10:41:00'),
(29, 0.00, 1, 3, 23, 1, '2026-02-21 11:06:09', '2026-02-21 11:04:28'),
(30, 0.00, 1, 3, 3, 1, '2026-02-23 13:37:01', '2026-02-23 13:36:16'),
(31, 0.00, 1, 3, 2, 1, '2026-02-23 13:37:01', '2026-02-23 13:36:16'),
(32, 0.00, 1, 3, 4, 1, '2026-02-23 13:37:01', '2026-02-23 13:36:16'),
(33, 0.00, 1, 3, 5, 1, '2026-02-23 13:37:01', '2026-02-23 13:36:16'),
(34, 0.00, 1, 2, 24, 1, '2026-03-27 13:37:47', '2026-03-27 13:37:47'),
(35, 17988.00, 1, 4, 25, 1, '2026-04-08 12:27:24', '2026-03-27 13:48:06'),
(36, 0.00, 1, 2, 26, 1, '2026-04-08 13:49:55', '2026-04-08 13:49:55');

-- --------------------------------------------------------

--
-- Table structure for table `booking_payment`
--

CREATE TABLE `booking_payment` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `name_class` varchar(200) NOT NULL,
  `button_class` varchar(200) NOT NULL,
  `type` int(11) NOT NULL COMMENT '1 : select 2 : not select',
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `booking_payment`
--

INSERT INTO `booking_payment` (`id`, `name`, `name_class`, `button_class`, `type`, `created_at`) VALUES
(1, 'รอโอน', 'badge-light-info', 'btn-relief-info', 1, '2023-01-12 04:23:12'),
(2, 'วางบิล', 'badge-light-warning', 'btn-relief-warning', 1, '2023-01-12 04:23:12'),
(3, 'Paid', 'badge-light-success', 'btn-relief-success', 1, '2023-01-12 04:23:12'),
(4, 'Cash on tour', 'badge-light-danger', 'btn-relief-danger', 1, '2023-01-12 04:23:12'),
(5, 'Deposit', 'badge-light-secondary', 'btn-relief-secondary', 1, '2023-01-12 04:23:12'),
(6, 'Invoice', 'badge-light-info', 'btn-relief-info', 1, '2023-01-12 04:23:12');

-- --------------------------------------------------------

--
-- Table structure for table `booking_products`
--

CREATE TABLE `booking_products` (
  `id` int(11) NOT NULL,
  `travel_date` date NOT NULL,
  `overnight` date NOT NULL,
  `note` text NOT NULL,
  `booking_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `is_approved` int(11) NOT NULL DEFAULT 0,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `booking_products`
--

INSERT INTO `booking_products` (`id`, `travel_date`, `overnight`, `note`, `booking_id`, `product_id`, `is_approved`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, '2026-04-08', '2026-04-09', '', 1, 1, 1, 0, '2025-11-13 15:40:45', '2026-04-08 12:05:02'),
(2, '2026-04-08', '0000-00-00', '', 2, 2, 1, 0, '2025-11-13 22:59:21', '2026-04-08 12:04:48'),
(3, '2026-04-08', '0000-00-00', '', 3, 1, 1, 0, '2025-11-13 23:04:39', '2026-04-08 12:04:30'),
(4, '2026-04-08', '0000-00-00', '', 4, 1, 1, 0, '2025-11-14 12:38:41', '2026-04-21 13:21:21'),
(5, '2026-04-08', '0000-00-00', '', 5, 1, 1, 0, '2025-11-14 12:54:37', '2026-04-08 11:58:53'),
(6, '2026-04-08', '0000-00-00', '', 6, 1, 1, 0, '2025-11-14 13:31:30', '2026-04-08 11:59:06'),
(7, '2026-04-08', '0000-00-00', '', 7, 1, 1, 0, '2025-11-16 09:43:40', '2026-04-08 11:59:21'),
(8, '2026-04-08', '2026-04-09', '', 8, 1, 1, 0, '2025-11-16 09:55:37', '2026-04-08 11:59:44'),
(9, '2026-04-08', '0000-00-00', '', 9, 2, 1, 0, '2025-11-16 10:01:07', '2026-04-08 12:00:05'),
(10, '2026-04-08', '2026-04-09', '', 10, 1, 1, 0, '2025-11-16 10:01:42', '2026-04-08 12:00:20'),
(11, '2026-04-08', '0000-00-00', 'Program (Tour Detail)\r\nTest', 11, 1, 1, 0, '2025-11-16 10:24:36', '2026-04-08 12:00:38'),
(12, '2026-04-08', '0000-00-00', '', 12, 3, 1, 0, '2025-11-19 14:58:32', '2026-04-08 12:00:55'),
(13, '2026-04-08', '0000-00-00', '', 13, 2, 1, 0, '2025-11-19 15:17:42', '2026-04-08 12:01:09'),
(14, '2026-04-08', '0000-00-00', '', 14, 3, 1, 0, '2025-11-19 15:18:38', '2026-04-08 11:52:29'),
(15, '2026-04-08', '0000-00-00', '', 15, 4, 1, 0, '2025-11-19 15:20:39', '2025-11-19 15:20:39'),
(16, '2026-04-08', '2026-04-09', '', 16, 2, 1, 0, '2025-11-19 15:21:53', '2026-04-08 11:53:28'),
(17, '2026-04-08', '2026-04-09', '', 17, 3, 1, 0, '2025-11-19 15:23:41', '2026-04-20 23:33:46'),
(18, '2026-04-08', '2026-04-09', '', 18, 3, 1, 0, '2025-11-20 09:46:23', '2026-04-08 11:56:03'),
(19, '2026-04-08', '0000-00-00', 'Test', 21, 2, 1, 0, '2025-12-12 13:38:18', '2026-04-08 11:56:38'),
(20, '2026-04-08', '0000-00-00', 'test', 22, 3, 1, 0, '2025-12-12 13:47:16', '2026-04-10 10:24:20'),
(21, '2026-04-08', '0000-00-00', 'Test System', 23, 2, 1, 0, '2026-02-21 10:41:00', '2026-04-08 11:51:55'),
(22, '2026-04-08', '0000-00-00', 'เงื่อนไขการยกเลิก: NON REFUNDABLE. รายละเอียดการเลื่อนวันเดินทางที่ได้ระบุวันเดินทางแล้วและเก็บสิทธิ์ไว้ - สามารถเลื่อนวันเดินทางที่ได้ก่อนเดินทาง 3 วันก่อนเดินทาง - ระบุวันเดินทางภายหลังได้ - ตั๋วมีอายุ 1 ปี นับจากวันที่ทำการจอง - ไม่มีค่าใช้จ่ายในการเลื่อนตั๋ว', 24, 2, 1, 0, '2026-03-27 13:37:47', '2026-04-08 11:04:14'),
(23, '2026-04-08', '0000-00-00', 'เงื่อนไขการยกเลิก: NON REFUNDABLE. รายละเอียดการเลื่อนวันเดินทางที่ได้ระบุวันเดินทางแล้วและเก็บสิทธิ์ไว้. สามารถเลื่อนวันเดินทางที่ได้ก่อนเดินทาง 3 วันก่อนเดินทาง. ระบุวันเดินทางภายหลังได้. ตั๋วมีอายุ 1 ปี นับจากวันที่ทำการจอง. ไม่มีค่าใช้จ่ายในการเลื่อนตั๋ว.', 25, 2, 1, 0, '2026-03-27 13:48:06', '2026-04-08 12:27:24'),
(24, '2026-04-07', '2026-04-08', 'RUSSIAN SPEAKING GUIDE REQUIRED. Non Refundable (ไม่รับคืน)', 26, 1, 1, 0, '2026-04-08 13:49:55', '2026-04-08 13:49:55');

-- --------------------------------------------------------

--
-- Table structure for table `booking_product_rates`
--

CREATE TABLE `booking_product_rates` (
  `id` int(11) NOT NULL,
  `adult` int(11) NOT NULL,
  `child` int(11) NOT NULL,
  `infant` int(11) NOT NULL,
  `foc` int(11) NOT NULL,
  `rates_adult` double(9,2) NOT NULL,
  `rates_child` double(9,2) NOT NULL,
  `rates_infant` double(9,2) NOT NULL,
  `rates_private` double(9,2) NOT NULL,
  `category_id` int(11) NOT NULL,
  `booking_products_id` int(11) NOT NULL,
  `product_rates_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `booking_product_rates`
--

INSERT INTO `booking_product_rates` (`id`, `adult`, `child`, `infant`, `foc`, `rates_adult`, `rates_child`, `rates_infant`, `rates_private`, `category_id`, `booking_products_id`, `product_rates_id`, `created_at`, `updated_at`) VALUES
(1, 2, 0, 0, 0, 2900.00, 2000.00, 100.00, 0.00, 1, 1, 2, '2025-11-13 15:40:45', '2026-04-08 12:05:02'),
(2, 2, 0, 0, 0, 3000.00, 0.00, 0.00, 0.00, 3, 2, 0, '2025-11-13 22:59:21', '2026-04-08 12:04:48'),
(3, 2, 0, 0, 0, 2900.00, 2000.00, 100.00, 0.00, 1, 3, 2, '2025-11-13 23:04:39', '2026-04-08 12:04:30'),
(4, 10, 0, 0, 0, 3300.00, 2300.00, 600.00, 0.00, 2, 4, 1, '2025-11-14 12:38:41', '2026-04-21 13:21:21'),
(5, 6, 0, 0, 0, 2900.00, 2000.00, 100.00, 0.00, 1, 4, 2, '2025-11-14 12:38:41', '2026-04-21 13:21:21'),
(6, 2, 2, 1, 0, 3300.00, 2300.00, 600.00, 0.00, 2, 5, 1, '2025-11-14 12:54:37', '2026-04-08 11:58:53'),
(7, 3, 1, 1, 0, 2900.00, 2000.00, 100.00, 0.00, 1, 5, 2, '2025-11-14 12:54:37', '2026-04-08 11:58:53'),
(8, 2, 1, 0, 0, 2900.00, 2000.00, 100.00, 0.00, 1, 6, 2, '2025-11-14 13:31:30', '2026-04-08 11:59:06'),
(9, 2, 0, 0, 0, 3000.00, 0.00, 0.00, 0.00, 2, 7, 0, '2025-11-16 09:43:40', '2026-04-08 11:59:21'),
(10, 3, 1, 0, 0, 2900.00, 2000.00, 100.00, 0.00, 1, 8, 2, '2025-11-16 09:55:37', '2026-04-08 11:59:44'),
(11, 2, 0, 0, 0, 1000.00, 0.00, 0.00, 0.00, 3, 9, 0, '2025-11-16 10:01:07', '2026-04-08 12:00:05'),
(12, 1, 0, 0, 0, 2900.00, 2000.00, 100.00, 0.00, 1, 10, 2, '2025-11-16 10:01:42', '2026-04-08 12:00:20'),
(13, 3, 0, 0, 0, 2333.00, 0.00, 0.00, 0.00, 1, 11, 0, '2025-11-16 10:24:36', '2026-04-08 12:00:38'),
(14, 2, 1, 0, 0, 2000.00, 500.00, 0.00, 0.00, 5, 12, 0, '2025-11-19 14:58:32', '2026-04-08 12:00:55'),
(15, 1, 2, 0, 0, 1200.00, 300.00, 0.00, 0.00, 4, 12, 0, '2025-11-19 14:58:32', '2026-04-08 12:00:55'),
(16, 2, 0, 0, 0, 3200.00, 0.00, 0.00, 0.00, 3, 13, 0, '2025-11-19 15:17:42', '2026-04-08 12:01:09'),
(17, 2, 1, 0, 1, 1400.00, 500.00, 0.00, 0.00, 4, 14, 0, '2025-11-19 15:18:38', '2026-04-08 11:52:29'),
(18, 2, 1, 0, 1, 2300.00, 400.00, 0.00, 0.00, 7, 15, 0, '2025-11-19 15:20:39', '2025-11-19 15:20:39'),
(19, 2, 0, 0, 0, 3000.00, 0.00, 0.00, 0.00, 3, 16, 0, '2025-11-19 15:21:53', '2026-04-08 11:53:28'),
(20, 3, 0, 0, 0, 2500.00, 0.00, 0.00, 0.00, 4, 17, 0, '2025-11-19 15:23:41', '2026-04-20 23:33:46'),
(21, 4, 2, 1, 1, 1699.00, 299.00, 199.00, 0.00, 5, 18, 0, '2025-11-20 09:46:23', '2026-04-08 11:56:03'),
(22, 2, 0, 0, 0, 3000.00, 0.00, 0.00, 0.00, 3, 19, 0, '2025-12-12 13:38:18', '2026-04-08 11:56:38'),
(23, 2, 0, 0, 0, 1000.00, 0.00, 0.00, 0.00, 5, 20, 0, '2025-12-12 13:47:16', '2026-04-10 10:24:20'),
(24, 1, 0, 0, 0, 500.00, 0.00, 0.00, 0.00, 4, 20, 0, '2025-12-12 13:47:16', '2026-04-10 10:24:20'),
(25, 6, 1, 1, 0, 3000.00, 500.00, 199.00, 0.00, 4, 18, 0, '2026-01-26 11:52:38', '2026-04-08 11:56:03'),
(26, 16, 2, 0, 0, 2000.00, 300.00, 0.00, 0.00, 3, 21, 0, '2026-02-21 10:41:00', '2026-04-08 11:51:55'),
(27, 12, 0, 0, 0, 3200.00, 0.00, 0.00, 0.00, 8, 22, 0, '2026-03-27 13:37:47', '2026-04-08 11:04:14'),
(28, 12, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 8, 23, 0, '2026-03-27 13:48:06', '2026-04-08 12:27:24'),
(29, 3, 0, 0, 0, 3000.00, 0.00, 0.00, 0.00, 2, 24, 0, '2026-04-08 13:49:55', '2026-04-08 13:49:55');

-- --------------------------------------------------------

--
-- Table structure for table `booking_status`
--

CREATE TABLE `booking_status` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `name_class` varchar(100) NOT NULL,
  `button_class` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `booking_status`
--

INSERT INTO `booking_status` (`id`, `name`, `name_class`, `button_class`, `created_at`, `updated_at`) VALUES
(1, 'Confirm', 'badge-light-success', 'btn btn-relief-success', '2021-12-08 09:25:51', '2021-12-08 09:25:51'),
(2, 'Confirm Charge', 'badge-light-success', 'btn btn-relief-success', '2021-12-08 09:25:51', '2021-12-08 09:25:51'),
(3, 'Canceled', 'badge-light-danger', 'btn btn-relief-danger', '2021-12-08 09:25:51', '2021-12-08 09:25:51'),
(4, 'Canceled Charge', 'badge-light-danger', 'btn btn-relief-danger', '2021-12-08 09:25:51', '2021-12-08 09:25:51'),
(5, 'No Show', 'badge-light-secondary', 'btn btn-relief-secondary', '2021-12-08 09:25:51', '2021-12-08 09:25:51');

-- --------------------------------------------------------

--
-- Table structure for table `booking_transfer`
--

CREATE TABLE `booking_transfer` (
  `id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `start_pickup` time NOT NULL,
  `end_pickup` time NOT NULL,
  `hotel_pickup` varchar(200) NOT NULL,
  `hotel_dropoff` varchar(200) NOT NULL,
  `room_no` varchar(200) NOT NULL,
  `note` text NOT NULL,
  `pickup_id` int(11) NOT NULL,
  `dropoff_id` int(11) NOT NULL,
  `hotel_pickup_id` int(11) NOT NULL COMMENT 'table hotel',
  `hotel_dropoff_id` int(11) NOT NULL COMMENT 'table hotel',
  `transfer_type` int(11) NOT NULL COMMENT '0 : non \r\n1 : join \r\n2 : private',
  `pickup_type` int(11) NOT NULL COMMENT '1 : เอารถรับส่ง \r\n2 : มาเอง\r\n3 : เอารถขากลับ',
  `booking_products_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `booking_transfer`
--

INSERT INTO `booking_transfer` (`id`, `status`, `start_pickup`, `end_pickup`, `hotel_pickup`, `hotel_dropoff`, `room_no`, `note`, `pickup_id`, `dropoff_id`, `hotel_pickup_id`, `hotel_dropoff_id`, `transfer_type`, `pickup_type`, `booking_products_id`, `created_at`, `updated_at`) VALUES
(1, 1, '00:00:00', '00:00:00', '', '', 'A601', '', 40, 40, 23, 23, 1, 1, 1, '2025-11-13 15:40:45', '2026-04-08 12:05:02'),
(2, 1, '05:45:00', '06:00:00', '', '', 'A601', '', 3, 3, 22, 22, 1, 1, 2, '2025-11-13 22:59:21', '2026-04-08 12:04:48'),
(3, 1, '06:00:00', '06:15:00', '', '', 'A601', '', 6, 6, 21, 21, 1, 1, 3, '2025-11-13 23:04:39', '2026-04-08 12:04:30'),
(4, 1, '00:00:00', '00:00:00', '', '', 'A601', '', 41, 41, 12, 12, 1, 1, 4, '2025-11-14 12:38:41', '2026-04-21 13:21:21'),
(5, 1, '07:00:00', '07:15:00', '', '', 'A105', '', 10, 10, 7, 7, 1, 1, 5, '2025-11-14 12:54:37', '2026-04-08 11:58:53'),
(6, 1, '05:45:00', '06:00:00', '', '', 'A108', '', 3, 3, 13, 13, 1, 1, 6, '2025-11-14 13:31:30', '2026-04-08 11:59:06'),
(7, 1, '06:00:00', '06:15:00', '', '', 'A105', '', 6, 6, 14, 14, 1, 1, 7, '2025-11-16 09:43:40', '2026-04-08 11:59:21'),
(8, 1, '05:45:00', '06:00:00', '', '', 'A302', '', 3, 3, 15, 15, 1, 1, 8, '2025-11-16 09:55:37', '2026-04-08 11:59:44'),
(9, 1, '06:00:00', '06:15:00', '', '', 'A102', '', 6, 6, 16, 16, 1, 1, 9, '2025-11-16 10:01:07', '2026-04-08 12:00:05'),
(10, 1, '00:00:00', '00:00:00', '', '', '', '', 42, 42, 17, 17, 1, 1, 10, '2025-11-16 10:01:42', '2026-04-08 12:00:20'),
(11, 2, '05:45:00', '06:00:00', '', '', '', '', 3, 3, 18, 18, 1, 1, 11, '2025-11-16 10:24:36', '2026-04-08 12:00:38'),
(12, 1, '05:45:00', '06:00:00', '', '', 'A601', '', 3, 3, 19, 19, 1, 1, 12, '2025-11-19 14:58:32', '2026-04-08 12:00:55'),
(13, 1, '06:00:00', '06:15:00', '', '', 'A102', '', 6, 6, 20, 20, 1, 1, 13, '2025-11-19 15:17:42', '2026-04-08 12:01:09'),
(14, 1, '06:00:00', '06:15:00', '', '', 'A601', '', 6, 6, 6, 6, 1, 1, 14, '2025-11-19 15:18:38', '2026-04-08 11:52:29'),
(15, 1, '00:00:00', '00:00:00', '', '', '', '', 0, 0, 0, 0, 1, 2, 15, '2025-11-19 15:20:39', '2025-11-19 15:20:39'),
(16, 1, '07:00:00', '07:15:00', '', '', 'A108', '', 10, 10, 7, 7, 1, 1, 16, '2025-11-19 15:21:53', '2026-04-08 11:53:28'),
(17, 3, '07:00:00', '07:15:00', '', '', 'A108', '', 10, 10, 8, 8, 2, 1, 17, '2025-11-19 15:23:41', '2026-04-20 23:33:46'),
(18, 5, '00:00:00', '00:00:00', '', '', 'A105', '', 40, 40, 9, 9, 1, 1, 18, '2025-11-20 09:46:23', '2026-04-08 11:56:03'),
(19, 3, '06:00:00', '06:15:00', '', '', 'A601', '', 6, 3, 5, 15, 1, 1, 20, '2025-12-12 13:47:16', '2026-04-10 10:24:20'),
(20, 1, '06:00:00', '06:15:00', '', '', 'A302', '', 6, 32, 4, 10, 1, 1, 19, '2025-12-12 18:45:43', '2026-04-08 11:56:38'),
(21, 1, '06:00:00', '06:15:00', '', '', 'A302', '', 6, 6, 5, 5, 1, 1, 21, '2026-02-21 10:41:00', '2026-04-08 11:51:55'),
(22, 1, '06:30:00', '06:45:00', '', '', '', '', 9, 30, 1, 3, 1, 1, 22, '2026-03-27 13:37:47', '2026-04-08 11:04:14'),
(23, 1, '06:30:00', '06:45:00', '', '', '', '', 9, 9, 24, 24, 1, 1, 23, '2026-03-27 13:48:06', '2026-04-08 12:27:24'),
(24, 1, '00:00:00', '00:00:00', '', '', '405', '', 6, 6, 25, 25, 1, 1, 24, '2026-04-08 13:49:55', '2026-04-08 13:49:55');

-- --------------------------------------------------------

--
-- Table structure for table `booking_type`
--

CREATE TABLE `booking_type` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `booking_type`
--

INSERT INTO `booking_type` (`id`, `name`, `created_at`) VALUES
(1, 'Join', '2021-12-08 08:57:15'),
(2, 'Private', '2021-12-08 08:57:15');

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `is_approved` int(11) NOT NULL,
  `is_deleted` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `captains`
--

CREATE TABLE `captains` (
  `id` int(11) NOT NULL,
  `id_card` varchar(13) NOT NULL,
  `name` varchar(150) NOT NULL,
  `telephone` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `sex` int(11) NOT NULL,
  `birth_date` date NOT NULL,
  `pic` varchar(50) NOT NULL,
  `is_approved` int(11) NOT NULL DEFAULT 0,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `captains`
--

INSERT INTO `captains` (`id`, `id_card`, `name`, `telephone`, `address`, `sex`, `birth_date`, `pic`, `is_approved`, `is_deleted`, `created_at`, `updated_at`) VALUES
(5, '', 'กัปตันเอ', '', '', 1, '0000-00-00', '', 1, 0, '2024-09-04 03:11:04', '2024-09-04 13:07:39'),
(6, '0', 'กัปตันบี', '', '', 1, '2024-09-04', '', 1, 0, '2024-09-04 13:07:23', '2024-09-04 13:07:23'),
(7, '0', 'กัปตันซี', '', '', 1, '2024-09-04', '', 1, 0, '2024-09-04 13:07:32', '2024-09-04 13:07:32');

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` int(11) NOT NULL,
  `car_registration` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `capacity` int(11) NOT NULL DEFAULT 0,
  `cars_category_id` int(11) NOT NULL DEFAULT 0,
  `is_approved` int(11) NOT NULL DEFAULT 0,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `car_registration`, `name`, `slug`, `capacity`, `cars_category_id`, `is_approved`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, '', 'VAN 1', '', 12, 1, 1, 0, '2025-11-16 15:06:57', '2026-04-12 11:35:01'),
(2, '', 'VAN 2', '', 13, 1, 1, 0, '2026-04-12 11:35:13', '2026-04-12 11:35:13'),
(3, '', 'VAN 3', '', 0, 1, 1, 0, '2026-04-12 11:35:30', '2026-04-12 11:35:30'),
(4, '', 'VAN4', '', 12, 1, 1, 0, '2026-04-12 11:35:45', '2026-04-12 11:35:45');

-- --------------------------------------------------------

--
-- Table structure for table `cars_category`
--

CREATE TABLE `cars_category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `capacity` int(11) NOT NULL,
  `pic` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `is_approved` int(11) NOT NULL,
  `is_deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cars_category`
--

INSERT INTO `cars_category` (`id`, `name`, `slug`, `capacity`, `pic`, `created_at`, `updated_at`, `is_approved`, `is_deleted`) VALUES
(1, 'Van', 'Van', 0, '', '2023-02-23 01:57:20', '2023-02-23 01:57:20', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cars_type`
--

CREATE TABLE `cars_type` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `car_category_id` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `is_approved` int(11) NOT NULL,
  `is_deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `check_in`
--

CREATE TABLE `check_in` (
  `id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `type` int(11) NOT NULL COMMENT '1 : Job \r\n2 : guide\r\n3 : booking',
  `login_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `check_in`
--

INSERT INTO `check_in` (`id`, `booking_id`, `type`, `login_id`, `created_at`) VALUES
(1, 11, 3, 1, '0000-00-00 00:00:00'),
(2, 6, 3, 1, '0000-00-00 00:00:00'),
(3, 13, 3, 1, '0000-00-00 00:00:00'),
(4, 21, 3, 1, '0000-00-00 00:00:00'),
(5, 10, 3, 1, '0000-00-00 00:00:00'),
(6, 22, 2, 1, '2026-02-05 22:14:05');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `name_th` varchar(80) NOT NULL,
  `hex_code` varchar(80) NOT NULL,
  `text_color` varchar(20) NOT NULL,
  `is_approved` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `name`, `name_th`, `hex_code`, `text_color`, `is_approved`, `created_at`) VALUES
(1, 'Orange', 'สีส้ม', '#FF9F43', '', 1, '2023-10-18 08:57:12'),
(2, 'Red', 'สีแดง', '#EA5455', '', 1, '2023-10-18 08:57:12'),
(3, 'Pink', 'สีชมพู', '#FF69B4', '', 1, '2023-10-18 08:57:12'),
(4, 'Green', 'สีเขียว', '#c4df9a', '', 1, '2023-10-18 08:57:12'),
(5, 'Blue', 'สีน้ำเงิน', '#0019F0', '#FFFFFF', 1, '2023-10-18 08:57:12'),
(6, 'Brown', 'สีน้ำตาล', '#8B4513', '', 1, '2023-10-18 08:57:12'),
(7, 'Yellow', 'สีเหลือง', '#FFFF00', '', 1, '2023-10-18 08:57:12'),
(8, 'White', 'สีขาว', '#FFFFFF', '', 1, '2023-10-18 08:57:12'),
(9, 'Sky', 'สีฟ้า', '#00FFFF', '', 1, '2023-10-18 08:57:12'),
(10, 'Grey', 'สีเทา', '#818181', '', 1, '2023-10-18 08:57:12'),
(11, 'Black', 'สีดำ', '#000000', '#FFFFFF', 1, '2023-10-18 08:57:12'),
(12, 'Purple', 'สีม่วง', '#6610F2', '#FFFFFF', 1, '2023-10-18 08:57:12');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(11) NOT NULL,
  `tat_license` varchar(100) NOT NULL,
  `name` varchar(200) NOT NULL,
  `name_account` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telephone` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `address_account` text NOT NULL,
  `contact_person` text NOT NULL,
  `note` text NOT NULL,
  `logo` varchar(50) NOT NULL,
  `company_type_id` int(11) NOT NULL DEFAULT 0,
  `sale_id` int(11) NOT NULL COMMENT 'TB users',
  `market_id` int(11) NOT NULL,
  `is_approved` int(11) NOT NULL DEFAULT 0,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `tat_license`, `name`, `name_account`, `email`, `telephone`, `address`, `address_account`, `contact_person`, `note`, `logo`, `company_type_id`, `sale_id`, `market_id`, `is_approved`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, '99/99999', 'Shambhala', '', 'shambhala@gmail.com', '089 216 2241', '', '', '', '', '', 2, 0, 0, 1, 0, '2025-11-11 13:38:44', '2025-11-11 13:38:44'),
(2, '90/9989', 'Agent B', '', 'b@gmail.com', '084 515 0015', '', '', '', '', '', 2, 0, 3, 1, 0, '2025-11-14 16:25:12', '2025-11-19 13:53:25'),
(3, '89/9939', 'Agent A', '', 'a@email.com', '084 515 0015', '', '', '', '', '', 2, 0, 2, 1, 0, '2025-11-19 13:52:56', '2025-11-19 13:53:00'),
(4, '34/05094', 'Agent C', '', 'c@gmail.com', '089 456 2215', '', '', '', '', '', 2, 0, 5, 1, 0, '2025-11-19 13:53:57', '2025-11-19 13:53:57'),
(5, '99/6477', 'Agent Z', 'Agent Zee', 'z@gmail.com', '0848928872', 'V8QQ+CRJ ตำบล กะทู้ อำเภอกะทู้ ภูเก็ต 83120', 'V8X9+P9P ตำบลป่าตอง อำเภอกะทู้ ภูเก็ต 83120', '', '', '', 2, 0, 0, 1, 0, '2026-02-09 12:19:34', '2026-02-09 12:27:37'),
(6, '89/9939', 'Agent G', '', '', '', '', '', '', '', '', 2, 0, 0, 1, 0, '2026-04-01 09:22:33', '2026-04-01 09:22:33');

-- --------------------------------------------------------

--
-- Table structure for table `companies_type`
--

CREATE TABLE `companies_type` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies_type`
--

INSERT INTO `companies_type` (`id`, `name`) VALUES
(1, 'Supplier'),
(2, 'Agent'),
(3, 'Internet User');

-- --------------------------------------------------------

--
-- Table structure for table `company_market`
--

CREATE TABLE `company_market` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `company_market`
--

INSERT INTO `company_market` (`id`, `name`, `created_at`) VALUES
(2, 'ยุโรบ', '2025-11-14 16:14:31'),
(3, 'รัสเซีย', '2025-11-14 16:14:42'),
(4, 'จีน', '2025-11-14 16:14:47'),
(5, 'ไทย', '2025-11-14 16:14:53'),
(6, 'อาหรับ', '2025-11-14 16:15:04');

-- --------------------------------------------------------

--
-- Table structure for table `company_offices`
--

CREATE TABLE `company_offices` (
  `id` int(11) NOT NULL,
  `tat_license` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `telephone` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `company_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `company_offices`
--

INSERT INTO `company_offices` (`id`, `tat_license`, `name`, `telephone`, `address`, `company_id`, `created_at`) VALUES
(1, '98/6477', 'Agent Zee To', '097 124 57622', '59 Moo 2, Thepkrasattri Road T. Koh Kaew, A. Muang อำเภอเมืองภูเก็ต ภูเก็ต 83000', 5, '2026-02-09 12:19:34'),
(2, '97/6477', 'วงเวียนสะพานหิน', '', '447 ถ. ภูเก็ต ตำบลตลาดใหญ่ อำเภอเมืองภูเก็ต ภูเก็ต 83000', 5, '2026-02-09 12:19:34');

-- --------------------------------------------------------

--
-- Table structure for table `company_rate`
--

CREATE TABLE `company_rate` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL DEFAULT 0,
  `product_period_id` int(11) NOT NULL DEFAULT 0,
  `product_rate_id` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_rate`
--

INSERT INTO `company_rate` (`id`, `company_id`, `product_period_id`, `product_rate_id`, `created_at`) VALUES
(1, 1, 1, 1, '2025-11-11 13:39:12'),
(2, 1, 2, 2, '2025-11-11 13:39:12');

-- --------------------------------------------------------

--
-- Table structure for table `confirm_agent`
--

CREATE TABLE `confirm_agent` (
  `id` int(11) NOT NULL,
  `travel_date` date NOT NULL,
  `agent_id` int(11) NOT NULL,
  `login_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `code` varchar(50) NOT NULL,
  `name_th` varchar(100) NOT NULL,
  `name_en` varchar(100) NOT NULL,
  `initials` varchar(50) NOT NULL,
  `is_approved` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `code`, `name_th`, `name_en`, `initials`, `is_approved`, `created_at`) VALUES
(1, 'ABW', 'อารูบา', 'Aruba', 'AW', 1, '2021-09-28 04:17:05'),
(2, 'AFG', 'อัฟกานิสถาน', 'Afghanistan', 'AF', 1, '2021-09-28 04:17:05'),
(3, 'AGO', 'แองโกลา', 'Angola', 'AO', 1, '2021-09-28 04:17:05'),
(4, 'AIA', 'แองกวิลลา', 'Anguilla', 'AI', 1, '2021-09-28 04:17:05'),
(5, 'ALA', 'โอลันด์', 'Åland', 'AX', 1, '2021-09-28 04:17:05'),
(6, 'ALB', 'แอลเบเนีย', 'Albania', 'AL', 1, '2021-09-28 04:17:05'),
(7, 'AND', 'อันดอร์รา', 'Andorra', 'AD', 1, '2021-09-28 04:17:05'),
(8, 'ARE', 'สหรัฐอาหรับเอมิเรตส์\n', 'United Arab Emirates', 'AE', 1, '2021-09-28 04:17:05'),
(9, 'ARG', 'อาร์เจนตินา', 'Argentina', 'AR', 1, '2021-09-28 04:17:05'),
(10, 'ARM', 'อาร์เมเนีย', 'Armenia', 'AM', 1, '2021-09-28 04:17:05'),
(11, 'ASM', 'อเมริกันซามัว', 'American Samoa', 'AS', 1, '2021-09-28 04:17:05'),
(12, 'ATA', 'ทวิปแอนตาร์กติกา', 'Antarctica', 'AQ', 1, '2021-09-28 04:17:05'),
(13, 'ATF', 'ดินแดนทางตอนใต้ของฝรั่งเศส', 'French Southern Territories', 'TF', 1, '2021-09-28 04:17:05'),
(14, 'ATG', 'แอนติกาและบาร์บูดา', 'Antigua and Barbuda', 'AG', 1, '2021-09-28 04:17:05'),
(15, 'AUS', 'ออสเตรเลีย', 'Australia', 'AU', 1, '2021-09-28 04:17:05'),
(16, 'AUT', 'ออสเตรีย', 'Austria', 'AT', 1, '2021-09-28 04:17:05'),
(17, 'AZE', 'อาเซอร์ไบจาน', 'Azerbaijan', 'AZ', 1, '2021-09-28 04:17:05'),
(18, 'BDI', 'บุรุนดี', 'Burundi', 'BI', 1, '2021-09-28 04:17:05'),
(19, 'BEL', 'เบลเยียม', 'Belgium', 'BE', 1, '2021-09-28 04:17:05'),
(20, 'BEN', 'เบนิน', 'Benin', 'BJ', 1, '2021-09-28 04:17:05'),
(21, 'BES', 'โบแนร์', 'Bonaire', 'BQ', 1, '2021-09-28 04:17:05'),
(22, 'BFA', 'บูร์กินาฟาโซ', 'Burkina Faso', 'BF', 1, '2021-09-28 04:17:05'),
(23, 'BGD', 'บังคลาเทศ', 'Bangladesh', 'BD', 1, '2021-09-28 04:17:05'),
(24, 'BGR', 'บัลแกเรีย', 'Bulgaria', 'BG', 1, '2021-09-28 04:17:05'),
(25, 'BHR', 'บาห์เรน', 'Bahrain', 'BH', 1, '2021-09-28 04:17:05'),
(26, 'BHS', 'บาฮามาส', 'Bahamas', 'BS', 1, '2021-09-28 04:17:05'),
(27, 'BIH', 'บอสเนียและเฮอร์เซโก\n', 'Bosnia and Herzegovina', 'BA', 1, '2021-09-28 04:17:05'),
(28, 'BLM', 'Saint Barthélemy', 'Saint Barthélemy', 'BL', 1, '2021-09-28 04:17:05'),
(29, 'BLR', 'เบลารุส', 'Belarus', 'BY', 1, '2021-09-28 04:17:05'),
(30, 'BLZ', 'เบลีซ', 'Belize', 'BZ', 1, '2021-09-28 04:17:05'),
(31, 'BMU', 'เบอร์มิวดา', 'Bermuda', 'BM', 1, '2021-09-28 04:17:05'),
(32, 'BOL', 'โบลิเวีย', 'Bolivia', 'BO', 1, '2021-09-28 04:17:05'),
(33, 'BRA', 'บราซิล', 'Brazil', 'BR', 1, '2021-09-28 04:17:05'),
(34, 'BRB', 'บาร์เบโดส', 'Barbados', 'BB', 1, '2021-09-28 04:17:05'),
(35, 'BRN', 'บรูไน', 'Brunei', 'BN', 1, '2021-09-28 04:17:05'),
(36, 'BTN', 'ภูฏาน', 'Bhutan', 'BT', 1, '2021-09-28 04:17:05'),
(37, 'BVT', 'เกาะบูเว็ต', 'Bouvet Island', 'BV', 1, '2021-09-28 04:17:05'),
(38, 'BWA', 'บอตสวานา', 'Botswana', 'BW', 1, '2021-09-28 04:17:05'),
(39, 'CAF', 'สาธารณรัฐแอฟริกากลาง', 'Central African Republic', 'CF', 1, '2021-09-28 04:17:05'),
(40, 'CAN', 'แคนาดา', 'Canada', 'CA', 1, '2021-09-28 04:17:05'),
(41, 'CCK', 'เกาะโคโคส [คีลิง]', 'Cocos [Keeling] Islands', 'CC', 1, '2021-09-28 04:17:05'),
(42, 'CHE', 'สวิสเซอร์แลนด์', 'Switzerland', 'CH', 1, '2021-09-28 04:17:05'),
(43, 'CHL', 'ชิลี', 'Chile', 'CL', 1, '2021-09-28 04:17:05'),
(44, 'CHN', 'จีน', 'China', 'CN', 1, '2021-09-28 04:17:05'),
(45, 'CIV', 'ไอวอรี่โคสต์', 'Ivory Coast', 'CI', 1, '2021-09-28 04:17:05'),
(46, 'CMR', 'แคเมอรูน', 'Cameroon', 'CM', 1, '2021-09-28 04:17:05'),
(47, 'COD', 'สาธารณรัฐประชาธิปไตยคองโก', 'Democratic Republic of the Congo', 'CD', 1, '2021-09-28 04:17:05'),
(48, 'COG', 'สาธารณรัฐคองโก', 'Republic of the Congo', 'CG', 1, '2021-09-28 04:17:05'),
(49, 'COK', 'หมู่เกาะคุก', 'Cook Islands', 'CK', 1, '2021-09-28 04:17:05'),
(50, 'COL', 'โคลอมเบีย', 'Colombia', 'CO', 1, '2021-09-28 04:17:05'),
(51, 'COM', 'คอโมโรส', 'Comoros', 'KM', 1, '2021-09-28 04:17:05'),
(52, 'CPV', 'เคปเวิร์ด', 'Cape Verde', 'CV', 1, '2021-09-28 04:17:05'),
(53, 'CRI', 'คอสตาริกา\n', 'Costa Rica', 'CR', 1, '2021-09-28 04:17:05'),
(54, 'CUB', 'คิวบา', 'Cuba', 'CU', 1, '2021-09-28 04:17:05'),
(55, 'CUW', 'คูราเซา\n', 'Curacao', 'CW', 1, '2021-09-28 04:17:05'),
(56, 'CXR', 'เกาะคริสต์มาส', 'Christmas Island', 'CX', 1, '2021-09-28 04:17:05'),
(57, 'CYM', 'หมู่เกาะเคย์เเมน', 'Cayman Islands', 'KY', 1, '2021-09-28 04:17:05'),
(58, 'CYP', 'ไซปรัส', 'Cyprus', 'CY', 1, '2021-09-28 04:17:05'),
(59, 'CZE', 'สาธารณรัฐเช็ก', 'Czech Republic', 'CZ', 1, '2021-09-28 04:17:05'),
(60, 'DEU', 'เยอรมันนี', 'Germany', 'DE', 1, '2021-09-28 04:17:05'),
(61, 'DJI', 'จิบูตี', 'Djibouti', 'DJ', 1, '2021-09-28 04:17:05'),
(62, 'DMA', 'โดมินิกา', 'Dominica', 'DM', 1, '2021-09-28 04:17:05'),
(63, 'DNK', 'เดนมาร์ก', 'Denmark', 'DK', 1, '2021-09-28 04:17:05'),
(64, 'DOM', 'สาธารณรัฐโดมินิกัน\n', 'Dominican Republic', 'DO', 1, '2021-09-28 04:17:05'),
(65, 'DZA', 'แอลจีเรีย', 'Algeria', 'DZ', 1, '2021-09-28 04:17:05'),
(66, 'ECU', 'เอกวาดอร์', 'Ecuador', 'EC', 1, '2021-09-28 04:17:05'),
(67, 'EGY', 'อียิปต์', 'Egypt', 'EG', 1, '2021-09-28 04:17:05'),
(68, 'ERI', 'เอริเทรี', 'Eritrea', 'ER', 1, '2021-09-28 04:17:05'),
(69, 'ESH', 'ซาฮาร่าตะวันตก', 'Western Sahara', 'EH', 1, '2021-09-28 04:17:05'),
(70, 'ESP', 'สเปน', 'Spain', 'ES', 1, '2021-09-28 04:17:05'),
(71, 'EST', 'เอสโตเนีย', 'Estonia', 'EE', 1, '2021-09-28 04:17:05'),
(72, 'ETH', 'สาธารณรัฐเอธิโอเปีย', 'Ethiopia', 'ET', 1, '2021-09-28 04:17:05'),
(73, 'FIN', 'ฟินแลนด์', 'Finland', 'FI', 1, '2021-09-28 04:17:05'),
(74, 'FJI', 'ฟิจิ', 'Fiji', 'FJ', 1, '2021-09-28 04:17:05'),
(75, 'FLK', 'หมู่เกาะฟอล์คแลนด์', 'Falkland Islands', 'FK', 1, '2021-09-28 04:17:05'),
(76, 'FRA', 'ฝรั่งเศส', 'France', 'FR', 1, '2021-09-28 04:17:05'),
(77, 'FRO', 'หมู่เกาะแฟโร', 'Faroe Islands', 'FO', 1, '2021-09-28 04:17:05'),
(78, 'FSM', 'ไมโครนีเซีย', 'Micronesia', 'FM', 1, '2021-09-28 04:17:05'),
(79, 'GAB', 'กาบอง', 'Gabon', 'GA', 1, '2021-09-28 04:17:05'),
(80, 'GBR', 'อังกฤษ (สหราชอาณาจักร)', 'United Kingdom', 'GB', 1, '2021-09-28 04:17:05'),
(81, 'GEO', 'จอร์เจีย', 'Georgia', 'GE', 1, '2021-09-28 04:17:05'),
(82, 'GGY', 'เกิร์นซีย์', 'Guernsey', 'GG', 1, '2021-09-28 04:17:05'),
(83, 'GHA', 'เกิร์นซีย์', 'Ghana', 'GH', 1, '2021-09-28 04:17:05'),
(84, 'GIB', 'ยิบรอลตา', 'Gibraltar', 'GI', 1, '2021-09-28 04:17:05'),
(85, 'GIN', 'กินี', 'Guinea', 'GN', 1, '2021-09-28 04:17:05'),
(86, 'GLP', 'กัวเดลุฟ', 'Guadeloupe', 'GP', 1, '2021-09-28 04:17:05'),
(87, 'GMB', 'แกมเบีย', 'Gambia', 'GM', 1, '2021-09-28 04:17:05'),
(88, 'GNB', 'กินีบิสเซา', 'Guinea-Bissau', 'GW', 1, '2021-09-28 04:17:05'),
(89, 'GNQ', 'อิเควทอเรียลกินี', 'Equatorial Guinea', 'GQ', 1, '2021-09-28 04:17:05'),
(90, 'GRC', 'กรีซ', 'Greece', 'GR', 1, '2021-09-28 04:17:05'),
(91, 'GRD', 'เกรเนดา ', 'Grenada', 'GD', 1, '2021-09-28 04:17:05'),
(92, 'GRL', 'กรีนแลนด์', 'Greenland', 'GL', 1, '2021-09-28 04:17:05'),
(93, 'GTM', 'กัวเตมาลา', 'Guatemala', 'GT', 1, '2021-09-28 04:17:05'),
(94, 'GUF', 'เฟรนช์เกียนา', 'French Guiana', 'GF', 1, '2021-09-28 04:17:05'),
(95, 'GUM', 'เกาะกวม', 'Guam', 'GU', 1, '2021-09-28 04:17:05'),
(96, 'GUY', 'กายอานา', 'Guyana', 'GY', 1, '2021-09-28 04:17:05'),
(97, 'HKG', 'ฮ่องกง', 'Hong Kong', 'HK', 1, '2021-09-28 04:17:05'),
(98, 'HMD', 'เกาะเฮิร์ดและหมู่เกาะแมคโดนัลด์', 'Heard Island and McDonald Islands', 'HM', 1, '2021-09-28 04:17:05'),
(99, 'HND', 'ฮอนดูรัส', 'Honduras', 'HN', 1, '2021-09-28 04:17:05'),
(100, 'HRV', 'โครเอเชีย', 'Croatia', 'HR', 1, '2021-09-28 04:17:05'),
(101, 'HTI', 'เฮติ', 'Haiti', 'HT', 1, '2021-09-28 04:17:05'),
(102, 'HUN', 'ฮังการี', 'Hungary', 'HU', 1, '2021-09-28 04:17:05'),
(103, 'IDN', 'อินโดนีเซีย', 'Indonesia', 'ID', 1, '2021-09-28 04:17:05'),
(104, 'IMN', 'เกาะแมน', 'Isle of Man', 'IM', 1, '2021-09-28 04:17:05'),
(105, 'IND', 'อินเดีย', 'India', 'IN', 1, '2021-09-28 04:17:05'),
(106, 'IOT', 'หมู่เกาะบริติชเวอร์จิน', 'British Indian Ocean Territory', 'IO', 1, '2021-09-28 04:17:05'),
(107, 'IRL', 'ไอร์แลนด์', 'Ireland', 'IE', 1, '2021-09-28 04:17:05'),
(108, 'IRN', 'อิหร่าน', 'Iran', 'IR', 1, '2021-09-28 04:17:05'),
(109, 'IRQ', 'อิรัก', 'Iraq', 'IQ', 1, '2021-09-28 04:17:05'),
(110, 'ISL', 'ประเทศไอซ์แลนด์', 'Iceland', 'IS', 1, '2021-09-28 04:17:05'),
(111, 'ISR', 'อิสราเอล', 'Israel', 'IL', 1, '2021-09-28 04:17:05'),
(112, 'ITA', 'อิตาลี', 'Italy', 'IT', 1, '2021-09-28 04:17:05'),
(113, 'JAM', 'เกาะจาเมกา', 'Jamaica', 'JM', 1, '2021-09-28 04:17:05'),
(114, 'JEY', 'นิวเจอร์ซีย์', 'Jersey', 'JE', 1, '2021-09-28 04:17:05'),
(115, 'JOR', 'จอร์แดน', 'Jordan', 'JO', 1, '2021-09-28 04:17:05'),
(116, 'JPN', 'ญี่ปุ่น', 'Japan', 'JP', 1, '2021-09-28 04:17:05'),
(117, 'KAZ', 'คาซัคสถาน', 'Kazakhstan', 'KZ', 1, '2021-09-28 04:17:05'),
(118, 'KEN', 'เคนย่า', 'Kenya', 'KE', 1, '2021-09-28 04:17:05'),
(119, 'KGZ', 'คีร์กีสถาน', 'Kyrgyzstan', 'KG', 1, '2021-09-28 04:17:05'),
(120, 'KHM', 'กัมพูชา', 'Cambodia', 'KH', 1, '2021-09-28 04:17:05'),
(121, 'KIR', 'คิริบาส', 'Kiribati', 'KI', 1, '2021-09-28 04:17:05'),
(122, 'KNA', 'เซนต์คิตส์และเนวิส', 'Saint Kitts and Nevis', 'KN', 1, '2021-09-28 04:17:05'),
(123, 'KOR', 'เกาหลีใต้', 'South Korea', 'KR', 1, '2021-09-28 04:17:05'),
(124, 'KWT', 'คูเวต', 'Kuwait', 'KW', 1, '2021-09-28 04:17:05'),
(125, 'LAO', 'ลาว', 'Laos', 'LA', 1, '2021-09-28 04:17:05'),
(126, 'LBN', 'เลบานอน', 'Lebanon', 'LB', 1, '2021-09-28 04:17:05'),
(127, 'LBR', 'ประเทศไลบีเรีย', 'Liberia', 'LR', 1, '2021-09-28 04:17:05'),
(128, 'LBY', 'ลิบยา', 'Libya', 'LY', 1, '2021-09-28 04:17:05'),
(129, 'LCA', 'เซนต์ลูเซีย', 'Saint Lucia', 'LC', 1, '2021-09-28 04:17:05'),
(130, 'LIE', 'นสไตน์', 'Liechtenstein', 'LI', 1, '2021-09-28 04:17:05'),
(131, 'LKA', 'ศรีลังกา', 'Sri Lanka', 'LK', 1, '2021-09-28 04:17:05'),
(132, 'LSO', 'เลโซโท', 'Lesotho', 'LS', 1, '2021-09-28 04:17:05'),
(133, 'LTU', 'ลิธัวเนีย', 'Lithuania', 'LT', 1, '2021-09-28 04:17:05'),
(134, 'LUX', 'ลักเซมเบิร์ก', 'Luxembourg', 'LU', 1, '2021-09-28 04:17:05'),
(135, 'LVA', 'ลัตเวีย', 'Latvia', 'LV', 1, '2021-09-28 04:17:05'),
(136, 'MAC', 'มาเก๊า', 'Macao', 'MO', 1, '2021-09-28 04:17:05'),
(137, 'MAF', 'เซนต์มาร์ติน', 'Saint Martin', 'MF', 1, '2021-09-28 04:17:05'),
(138, 'MAR', 'โมร็อกโก', 'Morocco', 'MA', 1, '2021-09-28 04:17:05'),
(139, 'MCO', 'โมนาโก', 'Monaco', 'MC', 1, '2021-09-28 04:17:05'),
(140, 'MDA', 'มอลโดวา', 'Moldova', 'MD', 1, '2021-09-28 04:17:05'),
(141, 'MDG', 'มาดากัสการ์', 'Madagascar', 'MG', 1, '2021-09-28 04:17:05'),
(142, 'MDV', 'มัลดีฟส์', 'Maldives', 'MV', 1, '2021-09-28 04:17:05'),
(143, 'MEX', 'เม็กซิโก', 'Mexico', 'MX', 1, '2021-09-28 04:17:05'),
(144, 'MHL', 'หมู่เกาะมาร์แชลล์', 'Marshall Islands', 'MH', 1, '2021-09-28 04:17:05'),
(145, 'MKD', 'มาซิโดเนีย', 'Macedonia', 'MK', 1, '2021-09-28 04:17:05'),
(146, 'MLI', 'มาลี', 'Mali', 'ML', 1, '2021-09-28 04:17:05'),
(147, 'MLT', 'เกาะมอลตา', 'Malta', 'MT', 1, '2021-09-28 04:17:05'),
(148, 'MMR', 'พม่า', 'Myanmar [Burma]', 'MM', 1, '2021-09-28 04:17:05'),
(149, 'MNE', 'มอนเตเนโก', 'Montenegro', 'ME', 1, '2021-09-28 04:17:05'),
(150, 'MNG', 'มองโกเลีย', 'Mongolia', 'MN', 1, '2021-09-28 04:17:05'),
(151, 'MNP', 'หมู่เกาะนอร์เทิร์นมาเรียนา', 'Northern Mariana Islands', 'MP', 1, '2021-09-28 04:17:05'),
(152, 'MOZ', 'โมซัมบิก', 'Mozambique', 'MZ', 1, '2021-09-28 04:17:05'),
(153, 'MRT', 'มอริเตเนีย', 'Mauritania', 'MR', 1, '2021-09-28 04:17:05'),
(154, 'MSR', 'มอนต์เซอร์รัต', 'Montserrat', 'MS', 1, '2021-09-28 04:17:05'),
(155, 'MTQ', 'มาร์ตินีก', 'Martinique', 'MQ', 1, '2021-09-28 04:17:05'),
(156, 'MUS', 'มอริเชียส', 'Mauritius', 'MU', 1, '2021-09-28 04:17:05'),
(157, 'MWI', 'มาลาวี', 'Malawi', 'MW', 1, '2021-09-28 04:17:05'),
(158, 'MYS', 'มาเลเซีย', 'Malaysia', 'MY', 1, '2021-09-28 04:17:05'),
(159, 'MYT', 'มายอต', 'Mayotte', 'YT', 1, '2021-09-28 04:17:05'),
(160, 'NAM', 'นามิเบีย', 'Namibia', 'NA', 1, '2021-09-28 04:17:05'),
(161, 'NCL', 'นิวแคลิโดเนีย', 'New Caledonia', 'NC', 1, '2021-09-28 04:17:05'),
(162, 'NER', 'ไนเธอร์', 'Niger', 'NE', 1, '2021-09-28 04:17:05'),
(163, 'NFK', 'เกาะนอร์ฟอล์ก', 'Norfolk Island', 'NF', 1, '2021-09-28 04:17:05'),
(164, 'NGA', 'ไนจีเรีย', 'Nigeria', 'NG', 1, '2021-09-28 04:17:05'),
(165, 'NIC', 'นิการากัว', 'Nicaragua', 'NI', 1, '2021-09-28 04:17:05'),
(166, 'NIU', 'นีอูเอ', 'Niue', 'NU', 1, '2021-09-28 04:17:05'),
(167, 'NLD', 'เนเธอร์แลนด์', 'Netherlands', 'NL', 1, '2021-09-28 04:17:05'),
(168, 'NOR', 'นอร์เวย์', 'Norway', 'NO', 1, '2021-09-28 04:17:05'),
(169, 'NPL', 'เนปาล', 'Nepal', 'NP', 1, '2021-09-28 04:17:05'),
(170, 'NRU', 'นาอูรู', 'Nauru', 'NR', 1, '2021-09-28 04:17:05'),
(171, 'NZL', 'นิวซีแลนด์', 'New Zealand', 'NZ', 1, '2021-09-28 04:17:05'),
(172, 'OMN', 'โอมาน', 'Oman', 'OM', 1, '2021-09-28 04:17:05'),
(173, 'PAK', 'ปากีสถาน', 'Pakistan', 'PK', 1, '2021-09-28 04:17:05'),
(174, 'PAN', 'ปานามา', 'Panama', 'PA', 1, '2021-09-28 04:17:05'),
(175, 'PCN', 'หมู่เกาะพิตแคร์น', 'Pitcairn Islands', 'PN', 1, '2021-09-28 04:17:05'),
(176, 'PER', 'เปรู', 'Peru', 'PE', 1, '2021-09-28 04:17:05'),
(177, 'PHL', 'ฟิลิปปินส์', 'Philippines', 'PH', 1, '2021-09-28 04:17:05'),
(178, 'PLW', 'ปาเลา', 'Palau', 'PW', 1, '2021-09-28 04:17:05'),
(179, 'PNG', 'ปาปัวนิวกินี', 'Papua New Guinea', 'PG', 1, '2021-09-28 04:17:05'),
(180, 'POL', 'โปแลนด์', 'Poland', 'PL', 1, '2021-09-28 04:17:05'),
(181, 'PRI', 'เปอร์โตริโก', 'Puerto Rico', 'PR', 1, '2021-09-28 04:17:05'),
(182, 'PRK', 'เกาหลีเหนือ', 'North Korea', 'KP', 1, '2021-09-28 04:17:05'),
(183, 'PRT', 'โปรตุเกส', 'Portugal', 'PT', 1, '2021-09-28 04:17:05'),
(184, 'PRY', 'ปารากวัย', 'Paraguay', 'PY', 1, '2021-09-28 04:17:05'),
(185, 'PSE', 'ปาเลสไตน์', 'Palestine', 'PS', 1, '2021-09-28 04:17:05'),
(186, 'PYF', 'เฟรนช์โปลินีเซีย', 'French Polynesia', 'PF', 1, '2021-09-28 04:17:05'),
(187, 'QAT', 'กาตาร์', 'Qatar', 'QA', 1, '2021-09-28 04:17:05'),
(188, 'REU', 'เรอูนียง', 'Réunion', 'RE', 1, '2021-09-28 04:17:05'),
(189, 'ROU', 'โรมาเนีย', 'Romania', 'RO', 1, '2021-09-28 04:17:05'),
(190, 'RUS', 'รัสเซีย', 'Russia', 'RU', 1, '2021-09-28 04:17:05'),
(191, 'RWA', 'รวันดา', 'Rwanda', 'RW', 1, '2021-09-28 04:17:05'),
(192, 'SAU', 'ซาอุดิอาราเบีย', 'Saudi Arabia', 'SA', 1, '2021-09-28 04:17:05'),
(193, 'SDN', 'ซูดาน', 'Sudan', 'SD', 1, '2021-09-28 04:17:05'),
(194, 'SEN', 'เซเนกัล', 'Senegal', 'SN', 1, '2021-09-28 04:17:05'),
(195, 'SGP', 'สิงคโปร์', 'Singapore', 'SG', 1, '2021-09-28 04:17:05'),
(196, 'SGS', 'หมู่เกาะเซาท์จอร์เจียและหมู่เกาะเซาท์แซนด์วิช', 'South Georgia and the South Sandwich Islands', 'GS', 1, '2021-09-28 04:17:05'),
(197, 'SHN', 'เซนต์เฮเลนา', 'Saint Helena', 'SH', 1, '2021-09-28 04:17:05'),
(198, 'SJM', 'สฟาลบาร์และยานไมเอน', 'Svalbard and Jan Mayen', 'SJ', 1, '2021-09-28 04:17:05'),
(199, 'SLB', 'หมู่เกาะโซโลมอน', 'Solomon Islands', 'SB', 1, '2021-09-28 04:17:05'),
(200, 'SLE', 'เซียร์ราลีโอน', 'Sierra Leone', 'SL', 1, '2021-09-28 04:17:05'),
(201, 'SLV', 'เอลซัลวาดอร์', 'El Salvador', 'SV', 1, '2021-09-28 04:17:05'),
(202, 'SMR', 'ซานมาริโน', 'San Marino', 'SM', 1, '2021-09-28 04:17:05'),
(203, 'SOM', 'โซมาเลีย', 'Somalia', 'SO', 1, '2021-09-28 04:17:05'),
(204, 'SPM', 'เซนต์ปิแอร์และมีเกอลง', 'Saint Pierre and Miquelon', 'PM', 1, '2021-09-28 04:17:05'),
(205, 'SRB', 'เซอร์เบีย', 'Serbia', 'RS', 1, '2021-09-28 04:17:05'),
(206, 'SSD', 'ซูดานใต้', 'South Sudan', 'SS', 1, '2021-09-28 04:17:05'),
(207, 'STP', 'เซาตูเมและปรินซิปี', 'São Tomé and Príncipe', 'ST', 1, '2021-09-28 04:17:05'),
(208, 'SUR', 'ซูรินาเม', 'Suriname', 'SR', 1, '2021-09-28 04:17:05'),
(209, 'SVK', 'สโลวะเกีย', 'Slovakia', 'SK', 1, '2021-09-28 04:17:05'),
(210, 'SVN', 'สโลวีเนีย', 'Slovenia', 'SI', 1, '2021-09-28 04:17:05'),
(211, 'SWE', 'สวีเดน', 'Sweden', 'SE', 1, '2021-09-28 04:17:05'),
(212, 'SWZ', 'สวาซิแลนด์', 'Swaziland', 'SZ', 1, '2021-09-28 04:17:05'),
(213, 'SXM', 'เกาะเซนต์มาร์ติน', 'Sint Maarten', 'SX', 1, '2021-09-28 04:17:05'),
(214, 'SYC', 'เซเชลส์', 'Seychelles', 'SC', 1, '2021-09-28 04:17:05'),
(215, 'SYR', 'ซีเรีย', 'Syria', 'SY', 1, '2021-09-28 04:17:05'),
(216, 'TCA', 'หมู่เกาะเติกส์และหมู่เกาะเคคอส', 'Turks and Caicos Islands', 'TC', 1, '2021-09-28 04:17:05'),
(217, 'TCD', 'ชาด', 'Chad', 'TD', 1, '2021-09-28 04:17:05'),
(218, 'TGO', 'โตโก', 'Togo', 'TG', 1, '2021-09-28 04:17:05'),
(219, 'THA', 'ไทย', 'Thailand', 'TH', 1, '2021-09-28 04:17:05'),
(220, 'TJK', 'ทาจิกิสถาน', 'Tajikistan', 'TJ', 1, '2021-09-28 04:17:05'),
(221, 'TKL', 'โตเกเลา', 'Tokelau', 'TK', 1, '2021-09-28 04:17:05'),
(222, 'TKM', 'เติร์กเมนิสถาน', 'Turkmenistan', 'TM', 1, '2021-09-28 04:17:05'),
(223, 'TLS', 'ติมอร์ตะวันออก', 'East Timor', 'TL', 1, '2021-09-28 04:17:05'),
(224, 'TON', 'ตองกา', 'Tonga', 'TO', 1, '2021-09-28 04:17:05'),
(225, 'TTO', 'ตรินิแดดและโตเบโก', 'Trinidad and Tobago', 'TT', 1, '2021-09-28 04:17:05'),
(226, 'TUN', 'ตูนิเซีย', 'Tunisia', 'TN', 1, '2021-09-28 04:17:05'),
(227, 'TUR', 'ตุรกี', 'Turkey', 'TR', 1, '2021-09-28 04:17:05'),
(228, 'TUV', 'ตูวาลู', 'Tuvalu', 'TV', 1, '2021-09-28 04:17:05'),
(229, 'TWN', 'ไต้หวัน', 'Taiwan', 'TW', 1, '2021-09-28 04:17:05'),
(230, 'TZA', 'แทนซาเนีย', 'Tanzania', 'TZ', 1, '2021-09-28 04:17:05'),
(231, 'UGA', 'ยูกันดา', 'Uganda', 'UG', 1, '2021-09-28 04:17:05'),
(232, 'UKR', 'ยูเครน', 'Ukraine', 'UA', 1, '2021-09-28 04:17:05'),
(233, 'UMI', 'เกาะนอกรีตของสหรัฐฯ', 'U.S. Minor Outlying Islands', 'UM', 1, '2021-09-28 04:17:05'),
(234, 'URY', 'อุรุกวัย', 'Uruguay', 'UY', 1, '2021-09-28 04:17:05'),
(235, 'USA', 'สหรัฐอเมริกา', 'United States', 'US', 1, '2021-09-28 04:17:05'),
(236, 'UZB', 'อุซเบกิสถาน', 'Uzbekistan', 'UZ', 1, '2021-09-28 04:17:05'),
(237, 'VAT', 'เมืองวาติกัน', 'Vatican City', 'VA', 1, '2021-09-28 04:17:05'),
(238, 'VCT', 'เซนต์วินเซนต์และเกรนาดีนส์', 'Saint Vincent and the Grenadines', 'VC', 1, '2021-09-28 04:17:05'),
(239, 'VEN', 'เวเนซุเอลา', 'Venezuela', 'VE', 1, '2021-09-28 04:17:05'),
(240, 'VGB', 'หมู่เกาะบริติชเวอร์จิน', 'British Virgin Islands', 'VG', 1, '2021-09-28 04:17:05'),
(241, 'VIR', 'หมู่เกาะเวอร์จินของสหรัฐอเมริกา', 'U.S. Virgin Islands', 'VI', 1, '2021-09-28 04:17:05'),
(242, 'VNM', 'เวียดนาม', 'Vietnam', 'VN', 1, '2021-09-28 04:17:05'),
(243, 'VUT', 'วานูอาตู', 'Vanuatu', 'VU', 1, '2021-09-28 04:17:05'),
(244, 'WLF', 'วาลลิสและฟุตูนา', 'Wallis and Futuna', 'WF', 1, '2021-09-28 04:17:05'),
(245, 'WSM', 'ซามัว', 'Samoa', 'WS', 1, '2021-09-28 04:17:05'),
(246, 'XKX', 'โคโซโว', 'Kosovo', 'XK', 1, '2021-09-28 04:17:05'),
(247, 'YEM', 'เยเมน', 'Yemen', 'YE', 1, '2021-09-28 04:17:05'),
(248, 'ZAF', 'แอฟริกาใต้', 'South Africa', 'ZA', 1, '2021-09-28 04:17:05'),
(249, 'ZMB', 'แซมเบีย', 'Zambia', 'ZM', 1, '2021-09-28 04:17:05'),
(250, 'ZWE', 'ประเทศซิมบับเว', 'Zimbabwe', 'ZW', 1, '2021-09-28 04:17:05');

-- --------------------------------------------------------

--
-- Table structure for table `crews`
--

CREATE TABLE `crews` (
  `id` int(11) NOT NULL,
  `id_card` varchar(13) NOT NULL,
  `name` varchar(150) NOT NULL,
  `telephone` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `sex` int(11) NOT NULL,
  `birth_date` date NOT NULL,
  `pic` varchar(50) NOT NULL,
  `is_approved` int(11) NOT NULL DEFAULT 0,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `currencys`
--

CREATE TABLE `currencys` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currencys`
--

INSERT INTO `currencys` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'USD', '2022-06-10 08:43:27', '2022-06-10 08:43:27'),
(2, 'EUR', '2022-06-10 08:43:27', '2022-06-10 08:43:27'),
(3, 'JPY', '2022-06-10 08:43:27', '2022-06-10 08:43:27'),
(4, 'THB', '2022-06-10 08:43:27', '2022-06-10 08:43:27');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `birth_date` date NOT NULL,
  `id_card` varchar(50) NOT NULL,
  `telephone` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `age` int(11) NOT NULL COMMENT 'ad : 1 chd : 2 inf : 3 foc : 4',
  `type` int(11) NOT NULL COMMENT '1 : Thai 2 : Foreigner',
  `email` varchar(50) NOT NULL,
  `head` int(11) NOT NULL DEFAULT 0,
  `booking_id` int(11) NOT NULL DEFAULT 0,
  `nationality_id` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `birth_date`, `id_card`, `telephone`, `address`, `age`, `type`, `email`, `head`, `booking_id`, `nationality_id`, `created_at`, `updated_at`) VALUES
(1, 'Name F2', '0000-00-00', '', '084 515 0015', '', 1, 1, '', 1, 3, 0, '2025-11-13 23:04:39', '2026-04-08 12:04:30'),
(2, 'Name F4', '0000-00-00', '', '', '', 1, 0, '', 0, 3, 0, '2025-11-13 23:04:39', '2026-04-08 12:04:30'),
(3, 'Name A1', '0000-00-00', '', '+77789288505', '', 1, 0, '', 0, 2, 0, '2025-11-13 23:09:59', '2026-04-08 12:04:48'),
(5, 'Name F2', '0000-00-00', '', '2564634', '', 1, 0, '', 0, 2, 0, '2025-11-13 23:18:03', '2026-04-08 12:04:48'),
(6, 'mr.kheradmand', '0000-00-00', '', '089 456 2215', '', 1, 0, '', 0, 1, 0, '2025-11-13 23:21:22', '2026-04-08 12:05:02'),
(7, 'Name A1', '0000-00-00', '', '089 2165542', '', 1, 1, '', 1, 4, 182, '2025-11-14 12:38:41', '2026-04-21 13:21:21'),
(8, 'Name A2', '0000-00-00', '', '', '', 1, 0, '', 0, 4, 182, '2025-11-14 12:38:41', '2026-04-21 13:21:21'),
(9, 'Name A3', '0000-00-00', '', '', '', 1, 0, '', 0, 4, 0, '2025-11-14 12:38:41', '2026-04-21 13:21:21'),
(10, 'Name A4', '0000-00-00', '', '', '', 1, 0, '', 0, 4, 0, '2025-11-14 12:38:41', '2026-04-21 13:21:21'),
(11, 'Name A5', '0000-00-00', '', '', '', 1, 0, '', 0, 4, 0, '2025-11-14 12:38:41', '2026-04-21 13:21:21'),
(12, 'Name A6', '0000-00-00', '', '', '', 1, 0, '', 0, 4, 0, '2025-11-14 12:38:41', '2026-04-21 13:21:21'),
(13, 'Name A7', '0000-00-00', '', '', '', 1, 0, '', 0, 4, 0, '2025-11-14 12:38:41', '2026-04-21 13:21:21'),
(14, 'Name A8', '0000-00-00', '', '', '', 1, 0, '', 0, 4, 0, '2025-11-14 12:38:41', '2026-04-21 13:21:21'),
(15, 'Name A9', '0000-00-00', '', '', '', 1, 0, '', 0, 4, 0, '2025-11-14 12:38:41', '2026-04-21 13:21:21'),
(16, 'Name A10', '0000-00-00', '', '', '', 1, 0, '', 0, 4, 0, '2025-11-14 12:38:41', '2026-04-21 13:21:21'),
(17, 'Name A11', '0000-00-00', '', '', '', 1, 0, '', 0, 4, 0, '2025-11-14 12:38:41', '2026-04-21 13:21:21'),
(18, 'Name A12', '0000-00-00', '', '', '', 1, 0, '', 0, 4, 0, '2025-11-14 12:38:41', '2026-04-21 13:21:21'),
(19, 'Name A13', '0000-00-00', '', '', '', 1, 0, '', 0, 4, 0, '2025-11-14 12:38:41', '2026-04-21 13:21:21'),
(20, 'Name A14', '0000-00-00', '', '', '', 1, 0, '', 0, 4, 0, '2025-11-14 12:38:41', '2026-04-21 13:21:21'),
(21, 'Name A15', '0000-00-00', '', '', '', 1, 0, '', 0, 4, 0, '2025-11-14 12:38:41', '2026-04-21 13:21:21'),
(22, 'Name A16', '0000-00-00', '', '', '', 1, 0, '', 0, 4, 0, '2025-11-14 12:38:41', '2026-04-21 13:21:21'),
(23, 'Name F1', '0000-00-00', '', '089 456 2215', '', 1, 1, '', 1, 5, 0, '2025-11-14 12:54:37', '2026-04-08 11:58:53'),
(24, 'Name F2', '0000-00-00', '', '', '', 1, 0, '', 0, 5, 0, '2025-11-14 12:54:37', '2026-04-08 11:58:53'),
(25, 'Name F3', '0000-00-00', '', '', '', 1, 0, '', 0, 5, 0, '2025-11-14 12:54:37', '2026-04-08 11:58:53'),
(26, 'Name T7', '0000-00-00', '', '089 456 2215', '', 1, 1, '', 1, 6, 0, '2025-11-14 13:31:30', '2026-04-08 11:59:06'),
(27, 'Name A1', '0000-00-00', '', '089 2165542', '', 1, 1, '', 1, 7, 0, '2025-11-16 09:43:40', '2026-04-08 11:59:21'),
(28, 'Name A2', '0000-00-00', '', '', '', 1, 0, '', 0, 7, 0, '2025-11-16 09:43:40', '2026-04-08 11:59:21'),
(29, 'Name F1', '0000-00-00', '', '089 216 2241', '', 1, 1, '', 1, 8, 0, '2025-11-16 09:55:37', '2026-04-08 11:59:44'),
(30, 'Name F2', '0000-00-00', '', '', '', 1, 0, '', 0, 8, 0, '2025-11-16 09:55:37', '2026-04-08 11:59:44'),
(31, 'Name F3', '0000-00-00', '', '', '', 1, 0, '', 0, 8, 0, '2025-11-16 09:55:37', '2026-04-08 11:59:44'),
(32, 'Name F4', '0000-00-00', '', '', '', 2, 0, '', 0, 8, 0, '2025-11-16 09:55:37', '2026-04-08 11:59:44'),
(33, 'Name A665', '0000-00-00', '', '089 2165542', '', 1, 1, '', 1, 9, 0, '2025-11-16 10:01:07', '2026-04-08 12:00:05'),
(34, 'Name F2544', '0000-00-00', '', '', '', 1, 0, '', 0, 9, 0, '2025-11-16 10:01:07', '2026-04-08 12:00:05'),
(35, 'Name A334', '0000-00-00', '', '089 2165542', '', 1, 1, '', 1, 10, 0, '2025-11-16 10:01:42', '2026-04-08 12:00:20'),
(36, 'Name B1', '0000-00-00', '', '084 515 0015', '', 1, 1, '', 1, 11, 0, '2025-11-16 10:24:36', '2026-04-08 12:00:38'),
(37, 'Name B2', '0000-00-00', '', '', '', 1, 0, '', 0, 11, 0, '2025-11-16 10:24:36', '2026-04-08 12:00:38'),
(38, 'Name A1', '0000-00-00', '', '089 216 2241', '', 1, 1, '', 1, 12, 0, '2025-11-19 14:58:32', '2026-04-08 12:00:55'),
(39, 'Name A2', '0000-00-00', '', '', '', 1, 0, '', 0, 12, 0, '2025-11-19 14:58:32', '2026-04-08 12:00:55'),
(40, 'Name A3', '0000-00-00', '', '', '', 1, 0, '', 0, 12, 0, '2025-11-19 14:58:32', '2026-04-08 12:00:55'),
(41, 'Name A4', '0000-00-00', '', '', '', 2, 0, '', 0, 12, 0, '2025-11-19 14:58:32', '2026-04-08 12:00:55'),
(42, 'Name A5', '0000-00-00', '', '', '', 2, 0, '', 0, 12, 0, '2025-11-19 14:58:32', '2026-04-08 12:00:55'),
(43, 'Name B1', '0000-00-00', '', '089 2165542', '', 1, 1, '', 1, 13, 0, '2025-11-19 15:17:42', '2026-04-08 12:01:09'),
(44, 'Name B2', '0000-00-00', '', '', '', 1, 0, '', 0, 13, 0, '2025-11-19 15:17:42', '2026-04-08 12:01:09'),
(45, 'Name F2', '0000-00-00', '', '089 2165542', '', 1, 1, '', 1, 14, 0, '2025-11-19 15:18:38', '2026-04-08 11:52:29'),
(46, 'Name C1', '0000-00-00', '', '095 154 2306', '', 1, 0, '', 1, 15, 39, '2025-11-19 15:20:39', '2025-11-19 15:20:39'),
(47, 'Name C2', '0000-00-00', '', '', '', 1, 0, '', 0, 15, 39, '2025-11-19 15:20:39', '2025-11-19 15:20:39'),
(48, 'Name D1', '0000-00-00', '', '089 216 2241', '', 0, 1, '', 1, 16, 0, '2025-11-19 15:21:53', '2026-04-08 11:53:28'),
(49, 'Name E1', '0000-00-00', '', '089 216 2241', '', 1, 1, '', 1, 17, 0, '2025-11-19 15:23:41', '2026-04-20 23:33:46'),
(50, 'Name E1', '0000-00-00', '', '089 216 2241', '', 0, 1, '', 1, 18, 0, '2025-11-20 09:46:23', '2026-04-08 11:56:03'),
(51, 'Meetoo', '0000-00-00', '', '089 216 2241', '', 1, 1, '', 1, 22, 0, '2025-12-12 13:47:16', '2026-04-10 10:24:20'),
(52, 'Meedee', '0000-00-00', '', '', '', 1, 0, '', 0, 22, 0, '2025-12-12 13:47:16', '2026-04-10 10:24:20'),
(53, 'Name G8', '0000-00-00', '', '', '', 0, 0, '', 0, 21, 0, '2026-01-26 11:22:01', '2026-04-08 11:56:38'),
(54, 'Name A1', '0000-00-00', '', '084 515 0015', '', 1, 1, '', 1, 23, 0, '2026-02-21 10:41:00', '2026-04-08 11:51:55'),
(55, 'Rewadee Wanchid', '0000-00-00', '', '0613851000', '', 1, 1, '', 1, 24, 0, '2026-03-27 13:37:47', '2026-04-08 11:04:14'),
(56, 'เรวดี หวานชิด', '0000-00-00', '', '', '', 1, 1, '', 1, 25, 0, '2026-03-27 13:48:06', '2026-04-08 12:27:24'),
(57, 'Name A45', '0000-00-00', '', '', '', 1, 0, '', 1, 26, 0, '2026-04-08 13:49:55', '2026-04-08 13:49:55');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `refcode` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `is_approved` int(11) NOT NULL,
  `is_deleted` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`, `refcode`, `slug`, `is_approved`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'Sale', '001', '001', 1, 0, '2022-08-31 14:11:46', '2022-08-31 14:11:46'),
(2, 'Account', '002', '002', 1, 0, '2022-08-31 14:12:01', '2022-08-31 14:12:01'),
(3, 'Reservation', '003', '003', 1, 0, '2022-11-23 10:36:37', '2022-11-23 10:36:37'),
(4, 'Operator', '004', '004', 1, 0, '2022-11-23 10:36:37', '2022-11-23 10:36:37'),
(5, 'Guide', '005', '005', 1, 0, '2024-11-28 04:41:13', '2024-11-28 04:41:13');

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `number_plate` varchar(20) NOT NULL,
  `seat` int(11) NOT NULL,
  `is_approved` int(11) NOT NULL DEFAULT 0,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`id`, `name`, `telephone`, `number_plate`, `seat`, `is_approved`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'สมยศ', '089 216 2241', '30-9510', 0, 1, 0, '2025-11-13 15:41:09', '2026-04-12 11:36:27'),
(2, 'มีชัย', '084 515 0015', '31-3744', 13, 1, 0, '2025-11-14 13:09:32', '2026-04-12 11:36:34'),
(3, 'โก้ดำ', '089 216 2241', 'กข 5921 กทม', 12, 1, 0, '2025-11-16 15:06:57', '2025-11-16 15:06:57'),
(4, 'กันดี', '089 216 2241', '30-9710', 10, 1, 0, '2025-11-20 14:09:07', '2026-04-12 11:36:47');

-- --------------------------------------------------------

--
-- Table structure for table `drivers_assistant`
--

CREATE TABLE `drivers_assistant` (
  `id` int(11) NOT NULL,
  `id_card` varchar(13) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `nickname` varchar(50) NOT NULL,
  `telephone` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `sex` int(11) NOT NULL,
  `birth_date` date NOT NULL,
  `pic` varchar(50) NOT NULL,
  `is_approved` int(11) NOT NULL DEFAULT 0,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dropoff_transfers`
--

CREATE TABLE `dropoff_transfers` (
  `id` int(11) NOT NULL,
  `arrange` int(11) NOT NULL DEFAULT 0,
  `pax` int(11) NOT NULL,
  `manage_id` int(11) NOT NULL,
  `booking_transfer_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dropoff_transfers`
--

INSERT INTO `dropoff_transfers` (`id`, `arrange`, `pax`, `manage_id`, `booking_transfer_id`, `created_at`) VALUES
(18, 0, 3, 120, 19, '2026-04-24 15:20:10');

-- --------------------------------------------------------

--
-- Table structure for table `extra_charges`
--

CREATE TABLE `extra_charges` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `unit` varchar(50) NOT NULL,
  `rate_adult` double(9,2) NOT NULL,
  `rate_child` double(9,2) NOT NULL,
  `rate_infant` double(9,2) NOT NULL,
  `rate_total` double(9,2) NOT NULL,
  `detail` text NOT NULL,
  `pic` varchar(50) NOT NULL,
  `is_approved` int(11) NOT NULL DEFAULT 0,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `extra_charges`
--

INSERT INTO `extra_charges` (`id`, `name`, `unit`, `rate_adult`, `rate_child`, `rate_infant`, `rate_total`, `detail`, `pic`, `is_approved`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'เรือหางยาว', '', 0.00, 0.00, 0.00, 0.00, '', '', 1, 0, '2026-01-08 16:01:00', '2026-01-08 16:01:00');

-- --------------------------------------------------------

--
-- Table structure for table `guides`
--

CREATE TABLE `guides` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `telephone` varchar(50) NOT NULL,
  `pic` varchar(50) NOT NULL,
  `is_approved` int(11) NOT NULL DEFAULT 0,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `guides`
--

INSERT INTO `guides` (`id`, `name`, `telephone`, `pic`, `is_approved`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'Guide A', '089 2165542', '', 1, 0, '2025-11-14 14:04:16', '2025-11-14 14:04:16'),
(2, 'Guide B', '095 154 2306', '', 1, 0, '2025-11-14 14:04:24', '2025-11-14 14:04:24');

-- --------------------------------------------------------

--
-- Table structure for table `guide_language`
--

CREATE TABLE `guide_language` (
  `id` int(11) NOT NULL,
  `guide_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `guide_language`
--

INSERT INTO `guide_language` (`id`, `guide_id`, `language_id`, `created_at`) VALUES
(1, 1, 1, '2025-11-14 14:04:16'),
(2, 1, 2, '2025-11-14 14:04:16'),
(3, 1, 3, '2025-11-14 14:04:16'),
(4, 1, 4, '2025-11-14 14:04:16'),
(5, 2, 1, '2025-11-14 14:04:24'),
(6, 2, 2, '2025-11-14 14:04:24');

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `name_th` varchar(150) NOT NULL,
  `address` text NOT NULL,
  `lat` varchar(50) DEFAULT NULL,
  `lng` varchar(50) DEFAULT NULL,
  `is_from_google` tinyint(1) NOT NULL DEFAULT 0,
  `telephone` varchar(50) NOT NULL,
  `email` varchar(120) NOT NULL,
  `zone_id` int(11) NOT NULL,
  `is_approved` int(11) NOT NULL DEFAULT 1,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`id`, `name`, `name_th`, `address`, `lat`, `lng`, `is_from_google`, `telephone`, `email`, `zone_id`, `is_approved`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'Phuket International Airport (HKT)', '', 'หมู่ที่ 6 ตำบล ไม้ขาว อำเภอถลาง ภูเก็ต ประเทศไทย', '8.1090415', '98.3056157', 1, '', '', 10, 1, 0, '2026-03-27 13:48:06', '2026-03-27 13:48:06'),
(2, 'Ramada by Wyndham Phuket Deevana', '', 'ถนน ราษฏร์อุทิศ 200 ปี ตำบลป่าตอง อำเภอกะทู้ ภูเก็ต ประเทศไทย', '7.8967064', '98.3005471', 1, '', '', 6, 1, 0, '2026-03-27 13:48:06', '2026-03-27 13:48:06'),
(3, 'Robinson Lifestyle Thalang', '', 'ถนน เทพกระษัตรี ตำบล ศรีสุนทร อำเภอถลาง ภูเก็ต ประเทศไทย', '7.9791471', '98.3551323', 1, '', '', 39, 1, 0, '2026-03-27 23:15:21', '2026-03-27 23:15:21'),
(4, 'Phuket Marriott Resort & Spa', '', 'Merlin Beach, Muen-Ngoen Road, ตำบลป่าตอง Phuket, ภูเก็ต ประเทศไทย', '7.8837136', '98.2721115', 1, '', '', 6, 1, 0, '2026-04-08 11:50:34', '2026-04-08 11:50:34'),
(5, 'Kalima Resort & Spa', '', 'Phabaramee Road ตำบลป่าตอง อำเภอกะทู้ Phuket, ประเทศไทย', '7.9157258', '98.2974332', 1, '', '', 6, 1, 0, '2026-04-08 11:51:55', '2026-04-08 11:51:55'),
(6, 'Crest resort & pool villas', '', 'ถนนหมื่นเงิน ตำบลป่าตอง อำเภอกะทู้ ภูเก็ต ประเทศไทย', '7.8763523', '98.2728266', 1, '', '', 6, 1, 0, '2026-04-08 11:52:29', '2026-04-08 11:52:29'),
(7, 'JW Marriott Phuket Resort & Spa', '', 'ตำบล ไม้ขาว อำเภอถลาง ภูเก็ต ประเทศไทย', '8.1691157', '98.2987157', 1, '', '', 10, 1, 0, '2026-04-08 11:53:28', '2026-04-08 11:53:28'),
(8, 'Splash Beach Resort', '', 'Soi 4, ตำบล ไม้ขาว อำเภอถลาง ภูเก็ต ประเทศไทย', '8.1215165', '98.3061405', 1, '', '', 10, 1, 0, '2026-04-08 11:54:50', '2026-04-08 11:54:50'),
(9, 'Sunset Beach Bungalows', '', 'ซอย อ่าวยน-เขาขาด ตำบล วิชิต อำเภอเมืองภูเก็ต ภูเก็ต ประเทศไทย', '7.8105267', '98.3904663', 1, '', '', 40, 1, 0, '2026-04-08 11:56:03', '2026-04-08 11:56:03'),
(10, 'COMO Point Yamu', '', 'ป่าคลอก อำเภอถลาง ภูเก็ต ประเทศไทย', '8.0583742', '98.4418388', 1, '', '', 32, 1, 0, '2026-04-08 11:56:38', '2026-04-08 11:56:38'),
(11, 'Lub d Phuket Patong', '', 'ถนน สวัสดิ์รักษ์ ตำบลป่าตอง อำเภอกะทู้ ภูเก็ต ประเทศไทย', '7.8963212', '98.2982823', 1, '', '', 6, 1, 0, '2026-04-08 11:57:04', '2026-04-08 11:57:04'),
(12, 'Chanalai Garden Resort', '', 'Kata Beach, ถนน กะตะ Amphur Muang, ภูเก็ต ประเทศไทย', '7.8202021', '98.2995344', 1, '', '', 41, 1, 0, '2026-04-08 11:58:37', '2026-04-08 11:58:37'),
(13, 'Beyond Kata', '', 'ถนน ปากบาง ตำบล กะรน อำเภอเมืองภูเก็ต ภูเก็ต ประเทศไทย', '7.8205421', '98.2990664', 1, '', '', 3, 1, 0, '2026-04-08 11:59:06', '2026-04-08 11:59:06'),
(14, 'Skyview Resort Phuket Patong Beach', '', 'ถนน พิศิษฐ์กรณีย์ ตำบลป่าตอง อำเภอกะทู้ ภูเก็ต ประเทศไทย', '7.8943486', '98.3069106', 1, '', '', 6, 1, 0, '2026-04-08 11:59:21', '2026-04-08 11:59:21'),
(15, 'Katathani Phuket Beach Resort', '', 'ถนน กะตะน้อย ตำบล กะรน อำเภอเมืองภูเก็ต ภูเก็ต ประเทศไทย', '7.8117765', '98.3004381', 1, '', '', 3, 1, 0, '2026-04-08 11:59:44', '2026-04-08 11:59:44'),
(16, 'Novotel Phuket Resort', '', 'ถนน พระบารมี ตำบลป่าตอง อำเภอกะทู้ ภูเก็ต ประเทศไทย', '7.9069351', '98.3000574', 1, '', '', 6, 1, 0, '2026-04-08 12:00:05', '2026-04-08 12:00:05'),
(17, 'The Nai Harn', '', 'ตำบล ราไวย์ Muang, ภูเก็ต ประเทศไทย', '7.7753441', '98.3060592', 1, '', '', 42, 1, 0, '2026-04-08 12:00:20', '2026-04-08 12:00:20'),
(18, 'Novotel Phuket Kata Avista Resort And Spa', '', 'ซอย แหลมไทร ตำบล กะรน อำเภอเมืองภูเก็ต ภูเก็ต ประเทศไทย', '7.8239014', '98.3015671', 1, '', '', 3, 1, 0, '2026-04-08 12:00:38', '2026-04-08 12:00:38'),
(19, 'Sawasdee Village Resort & Spa', '', 'ถนน กะตะ ตำบล กะรน อำเภอเมืองภูเก็ต ภูเก็ต ประเทศไทย', '7.8258321', '98.3025684', 1, '', '', 3, 1, 0, '2026-04-08 12:00:55', '2026-04-08 12:00:55'),
(20, 'Duangjitt Resort & Spa', '', 'Prachanukroh Road, ตำบลป่าตอง อำเภอกะทู้ ภูเก็ต ประเทศไทย', '7.8864071', '98.2954157', 1, '', '', 6, 1, 0, '2026-04-08 12:01:09', '2026-04-08 12:01:09'),
(21, 'Anona Beachfront Phuket Resort', '', 'ถนนทวีวงศ์ ตำบลป่าตอง อำเภอกะทู้ ภูเก็ต ประเทศไทย', '7.8953154', '98.2962141', 1, '', '', 6, 1, 0, '2026-04-08 12:04:30', '2026-04-08 12:04:30'),
(22, 'Pullman Phuket Karon Beach Resort', '', 'ถนน ปฏัก ตำบล กะรน Muang, ภูเก็ต ประเทศไทย', '7.8447154', '98.2959141', 1, '', '', 3, 1, 0, '2026-04-08 12:04:48', '2026-04-08 12:04:48'),
(23, 'My Beach Resort Phuket', '', 'ซอย อ่าวยน-เขาขาด ตำบล วิชิต อำเภอเมืองภูเก็ต ภูเก็ต ประเทศไทย', '7.8106154', '98.3916141', 1, '', '', 40, 1, 0, '2026-04-08 12:05:02', '2026-04-08 12:05:02'),
(24, 'Phuket Marriott Resort and Spa', '', 'Nai Yang Beach, Tambol Sakoo Phuket Adamas Rd. ตำบลสาคู อำเภอถลาง ภูเก็ต ประเทศไทย', '8.081286799999999', '98.2886169', 1, '', '', 15, 1, 0, '2026-04-08 12:22:25', '2026-04-08 12:22:25'),
(25, 'Grand Mercure Phuket Patong', '', 'ซอย ราษฎร์อุทิศ 200 ปี 2 ตำบลป่าตอง อำเภอกะทู้ ภูเก็ต ประเทศไทย', '', '', 1, '', '', 6, 1, 0, '2026-04-08 13:49:55', '2026-04-08 13:49:55');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(11) NOT NULL,
  `inv_date` date NOT NULL,
  `inv_no` int(11) NOT NULL,
  `inv_full` varchar(100) NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `date_inv` date NOT NULL,
  `due_date` date NOT NULL,
  `withholding` int(11) NOT NULL COMMENT 'หัก ณ ที่จ่าย',
  `note` text NOT NULL,
  `office_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `vat_id` int(11) NOT NULL,
  `currency_id` int(11) NOT NULL,
  `bank_account_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL COMMENT 'invoice by',
  `is_approved` int(11) NOT NULL,
  `is_deleted` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `inv_date`, `inv_no`, `inv_full`, `date_from`, `date_to`, `date_inv`, `due_date`, `withholding`, `note`, `office_id`, `payment_id`, `vat_id`, `currency_id`, `bank_account_id`, `user_id`, `is_approved`, `is_deleted`, `created_at`, `updated_at`) VALUES
(2, '2026-02-20', 2, 'IN-0000002', '2025-12-11', '2025-12-12', '2026-02-20', '2026-03-06', 0, '', 0, 0, 0, 0, 1, 1, 1, 0, '2026-02-20 15:46:28', '2026-02-20 15:46:28'),
(3, '2026-02-21', 3, 'IN-0000003', '2026-02-21', '2026-02-22', '2026-02-21', '2026-03-06', 3, '', 0, 0, 1, 0, 1, 1, 1, 0, '2026-02-21 11:04:28', '2026-02-21 11:04:28'),
(4, '2026-02-23', 4, 'IN-0000004', '2025-12-12', '2025-12-13', '2026-02-23', '2026-03-05', 3, '', 0, 0, 1, 0, 1, 1, 1, 0, '2026-02-23 13:36:16', '2026-02-23 13:36:16');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_bookings`
--

CREATE TABLE `invoice_bookings` (
  `id` int(11) NOT NULL,
  `no` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `invoice_bookings`
--

INSERT INTO `invoice_bookings` (`id`, `no`, `invoice_id`, `booking_id`, `created_at`) VALUES
(3, 1, 2, 14, '2026-02-20 15:46:28'),
(4, 1, 3, 23, '2026-02-21 11:04:28'),
(5, 1, 4, 3, '2026-02-23 13:36:16'),
(6, 2, 4, 2, '2026-02-23 13:36:16'),
(7, 3, 4, 4, '2026-02-23 13:36:16'),
(8, 4, 4, 5, '2026-02-23 13:36:16');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(11) NOT NULL,
  `name_thai` varchar(50) NOT NULL,
  `name_eng` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name_thai`, `name_eng`, `created_at`) VALUES
(1, 'ภาษาไทย', 'Thai', '2021-07-29 14:29:02'),
(2, 'ภาษาอังกฤษ', 'English', '2021-07-29 14:29:05'),
(3, 'ภาษาจีน', 'Chinese', '2021-07-29 14:32:26'),
(4, 'ภาษาญี่ปุ่น', 'Japanese', '2021-07-29 14:32:28');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(65) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'solution', '$2y$10$89YIJ3hp.LYcBRZNaYb0FOSiTWIdLlt5PPrANo7VbjE4bImZvnjcm', 1, '2022-11-25 07:28:59', '2022-11-25 07:28:59');

-- --------------------------------------------------------

--
-- Table structure for table `log_booking`
--

CREATE TABLE `log_booking` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `detail` text NOT NULL,
  `booking_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `log_booking`
--

INSERT INTO `log_booking` (`id`, `name`, `detail`, `booking_id`, `user_id`, `type_id`, `created_at`) VALUES
(1, 'สร้าง Booking', 'หมายเลข booking no. BO68110001', 1, 1, 1, '2025-11-13 15:40:45'),
(2, 'สร้าง Booking', 'หมายเลข booking no. BO68110002', 2, 1, 1, '2025-11-13 22:59:21'),
(3, 'สร้าง Booking', 'หมายเลข booking no. BO68110003', 3, 1, 1, '2025-11-13 23:04:39'),
(4, 'แก้ใข Booking', '', 2, 1, 2, '2025-11-13 23:09:59'),
(5, 'แก้ใข Booking', '', 2, 1, 2, '2025-11-13 23:11:50'),
(6, 'แก้ใข Booking', '', 2, 1, 2, '2025-11-13 23:12:06'),
(7, 'แก้ใข Booking', '', 2, 1, 2, '2025-11-13 23:12:31'),
(8, 'แก้ใข Booking', '', 2, 1, 2, '2025-11-13 23:13:51'),
(9, 'แก้ใข Booking', '', 2, 1, 2, '2025-11-13 23:16:46'),
(10, 'แก้ใข Booking', '', 2, 1, 2, '2025-11-13 23:18:03'),
(11, 'แก้ใข Booking', '', 2, 1, 2, '2025-11-13 23:18:22'),
(12, 'แก้ใข Booking', '', 2, 1, 2, '2025-11-13 23:19:44'),
(13, 'แก้ใข Booking', '', 2, 1, 2, '2025-11-13 23:19:57'),
(14, 'แก้ใข Booking', '', 2, 1, 2, '2025-11-13 23:20:18'),
(15, 'แก้ใข Booking', '', 1, 1, 2, '2025-11-13 23:21:22'),
(16, 'สร้าง Booking', 'หมายเลข booking no. BO68110004', 4, 1, 1, '2025-11-14 12:38:41'),
(17, 'สร้าง Booking', 'หมายเลข booking no. BO68110005', 5, 1, 1, '2025-11-14 12:54:37'),
(18, 'แก้ใข Booking', '', 5, 1, 2, '2025-11-14 12:55:24'),
(19, 'สร้าง Booking', 'หมายเลข booking no. BO68110006', 6, 1, 1, '2025-11-14 13:31:30'),
(20, 'แก้ใข Booking', '', 4, 1, 2, '2025-11-14 13:36:13'),
(21, 'สร้าง Booking', 'หมายเลข booking no. BO68110007', 7, 1, 1, '2025-11-16 09:43:40'),
(22, 'แก้ใข Booking', '', 7, 1, 2, '2025-11-16 09:44:02'),
(23, 'แก้ใข Booking', '', 7, 1, 2, '2025-11-16 09:44:11'),
(24, 'สร้าง Booking', 'หมายเลข booking no. BO68110008', 8, 1, 1, '2025-11-16 09:55:37'),
(25, 'สร้าง Booking', 'หมายเลข booking no. BO68110009', 9, 1, 1, '2025-11-16 10:01:07'),
(26, 'สร้าง Booking', 'หมายเลข booking no. BO68110010', 10, 1, 1, '2025-11-16 10:01:42'),
(27, 'แก้ใข Booking', '', 10, 1, 2, '2025-11-16 10:01:54'),
(28, 'สร้าง Booking', 'หมายเลข booking no. BO68110011', 11, 1, 1, '2025-11-16 10:24:36'),
(29, 'สร้าง Booking', 'หมายเลข booking no. BO68110012', 12, 1, 1, '2025-11-19 14:58:32'),
(30, 'สร้าง Booking', 'หมายเลข booking no. BO68110013', 13, 1, 1, '2025-11-19 15:17:42'),
(31, 'สร้าง Booking', 'หมายเลข booking no. BO68110014', 14, 1, 1, '2025-11-19 15:18:38'),
(32, 'สร้าง Booking', 'หมายเลข booking no. BO68110015', 15, 1, 1, '2025-11-19 15:20:39'),
(33, 'สร้าง Booking', 'หมายเลข booking no. BO68110016', 16, 1, 1, '2025-11-19 15:21:53'),
(34, 'สร้าง Booking', 'หมายเลข booking no. BO68110017', 17, 1, 1, '2025-11-19 15:23:41'),
(35, 'สร้าง Booking', 'หมายเลข booking no. BO68110018', 18, 1, 1, '2025-11-20 09:46:23'),
(36, 'แก้ใข Booking', '', 18, 1, 2, '2025-12-10 22:56:44'),
(37, 'สร้าง Booking', 'หมายเลข booking no. BO68120001', 19, 1, 1, '2025-12-12 13:22:38'),
(38, 'สร้าง Booking', 'หมายเลข booking no. BO68120002', 20, 1, 1, '2025-12-12 13:36:16'),
(39, 'สร้าง Booking', 'หมายเลข booking no. BO68120003', 21, 1, 1, '2025-12-12 13:38:18'),
(40, 'สร้าง Booking', 'หมายเลข booking no. BO68120004', 22, 1, 1, '2025-12-12 13:47:16'),
(41, 'แก้ใข Booking', '', 21, 1, 2, '2025-12-12 18:45:43'),
(42, 'แก้ใข Booking', '', 1, 1, 2, '2025-12-17 23:27:38'),
(43, 'แก้ใข Booking', '', 1, 1, 2, '2025-12-17 23:27:55'),
(44, 'แก้ใข Booking', '', 1, 1, 2, '2025-12-17 23:31:26'),
(45, 'แก้ใข Booking', '', 1, 1, 2, '2025-12-17 23:32:06'),
(46, 'แก้ใข Booking', '', 22, 1, 2, '2025-12-23 10:24:25'),
(47, 'แก้ใข Booking', '', 11, 1, 2, '2026-01-09 15:44:42'),
(48, 'แก้ใข Booking', '', 21, 1, 2, '2026-01-26 11:22:01'),
(49, 'แก้ใข Booking', '', 21, 1, 2, '2026-01-26 11:22:28'),
(50, 'แก้ใข Booking', '', 18, 1, 2, '2026-01-26 11:23:36'),
(51, 'แก้ใข Booking', '', 18, 1, 2, '2026-01-26 11:52:38'),
(52, 'แก้ใข Booking', '', 18, 1, 2, '2026-02-03 14:42:49'),
(53, 'แก้ใข Booking', '', 18, 1, 2, '2026-02-03 14:43:08'),
(54, 'แก้ใข Booking', '', 18, 1, 2, '2026-02-03 14:43:40'),
(55, 'แก้ใข Booking', '', 18, 1, 2, '2026-02-03 14:43:54'),
(56, 'แก้ใข Booking', '', 18, 1, 2, '2026-02-03 14:44:23'),
(57, 'แก้ใข Booking', '', 16, 1, 2, '2026-02-11 12:00:45'),
(58, 'สร้าง Booking', 'หมายเลข booking no. BO69020001', 23, 1, 1, '2026-02-21 10:41:00'),
(59, 'แก้ใข Booking', '', 23, 1, 2, '2026-02-21 10:42:52'),
(60, 'แก้ใข Booking', '', 23, 1, 2, '2026-02-21 10:43:57'),
(61, 'แก้ใข Booking', '', 23, 1, 2, '2026-02-23 12:25:13'),
(62, 'แก้ใข Booking', '', 23, 1, 2, '2026-02-23 12:30:08'),
(63, 'แก้ใข Booking', '', 23, 1, 2, '2026-02-23 12:30:17'),
(64, 'แก้ใข Booking', '', 23, 1, 2, '2026-02-23 13:55:19'),
(65, 'สร้าง Booking', 'หมายเลข booking no. BO69030001', 24, 1, 1, '2026-03-27 13:37:47'),
(66, 'Delete Booking', '', 24, 1, 3, '2026-03-27 13:45:25'),
(67, 'สร้าง Booking', 'หมายเลข booking no. BO69030002', 25, 1, 1, '2026-03-27 13:48:06'),
(68, 'แก้ใข Booking', '', 24, 1, 2, '2026-03-27 23:14:11'),
(69, 'แก้ใข Booking', '', 24, 1, 2, '2026-03-27 23:14:51'),
(70, 'แก้ใข Booking', '', 24, 1, 2, '2026-03-27 23:15:21'),
(71, 'แก้ใข Booking', '', 24, 1, 2, '2026-03-27 23:24:23'),
(72, 'แก้ใข Booking', '', 24, 1, 2, '2026-03-27 23:29:20'),
(73, 'แก้ใข Booking', '', 24, 1, 2, '2026-03-27 23:33:31'),
(74, 'แก้ไข Booking', 'Voucher No.: \'FTT001684\' ➡️ \'YU321\'<br>Overnight: \'0000-00-00\' ➡️ \'\'', 25, 1, 2, '2026-04-08 11:03:50'),
(75, 'แก้ไข Booking', 'Voucher No.: \'FTT001684\' ➡️ \'673/31\'<br>Overnight: \'0000-00-00\' ➡️ \'\'', 24, 1, 2, '2026-04-08 11:04:14'),
(76, 'แก้ไข Booking', 'Overnight: \'0000-00-00\' ➡️ \'\'<br>เวลารับ: \'00:00\' ➡️ \'06:00\'<br>เวลาสิ้นสุดการรับ: \'00:00\' ➡️ \'06:15\'<br>โรงแรมที่รับ: \'Phuket International Airport (HKT)\' ➡️ \'Phuket Marriott Resort & Spa, Merlin Beach, Muen-Ngoen Road, ตำบลป่าตอง Phuket, ภูเก็ต ประเทศไทย\'<br>โรงแรมที่ส่ง: \'Ramada by Wyndham Phuket Deevana\' ➡️ \'Phuket Marriott Resort & Spa, Merlin Beach, Muen-Ngoen Road, ตำบลป่าตอง Phuket, ภูเก็ต ประเทศไทย\'<br>โซนที่รับ: \'10\' ➡️ \'6\'', 25, 1, 2, '2026-04-08 11:50:34'),
(77, 'แก้ไข Booking', 'Overnight: \'0000-00-00\' ➡️ \'\'<br>เวลารับ: \'05:55\' ➡️ \'06:00\'<br>เวลาสิ้นสุดการรับ: \'06:20\' ➡️ \'06:15\'<br>โรงแรมที่รับ: \'\' ➡️ \'Kalima Resort & Spa, Phabaramee Road ตำบลป่าตอง อำเภอกะทู้ Phuket, ประเทศไทย\'<br>โรงแรมที่ส่ง: \'\' ➡️ \'Kalima Resort & Spa, Phabaramee Road ตำบลป่าตอง อำเภอกะทู้ Phuket, ประเทศไทย\'<br>โซนที่รับ: \'13\' ➡️ \'6\'<br>โซนที่ส่ง: \'13\' ➡️ \'6\'', 23, 1, 2, '2026-04-08 11:51:55'),
(78, 'แก้ไข Booking', 'Overnight: \'0000-00-00\' ➡️ \'\'<br>เวลารับ: \'04:34\' ➡️ \'06:00\'<br>เวลาสิ้นสุดการรับ: \'06:54\' ➡️ \'06:15\'<br>โรงแรมที่รับ: \'\' ➡️ \'Crest resort & pool villas, ถนนหมื่นเงิน ตำบลป่าตอง อำเภอกะทู้ ภูเก็ต ประเทศไทย\'<br>โรงแรมที่ส่ง: \'\' ➡️ \'Crest resort & pool villas, ถนนหมื่นเงิน ตำบลป่าตอง อำเภอกะทู้ ภูเก็ต ประเทศไทย\'<br>โซนที่รับ: \'8\' ➡️ \'6\'<br>โซนที่ส่ง: \'2\' ➡️ \'6\'', 14, 1, 2, '2026-04-08 11:52:29'),
(79, 'แก้ไข Booking', 'เวลารับ: \'05:30\' ➡️ \'07:00\'<br>เวลาสิ้นสุดการรับ: \'06:00\' ➡️ \'07:15\'<br>โรงแรมที่รับ: \'\' ➡️ \'JW Marriott Phuket Resort & Spa, ตำบล ไม้ขาว อำเภอถลาง ภูเก็ต ประเทศไทย\'<br>โรงแรมที่ส่ง: \'\' ➡️ \'JW Marriott Phuket Resort & Spa, ตำบล ไม้ขาว อำเภอถลาง ภูเก็ต ประเทศไทย\'<br>โซนที่รับ: \'14\' ➡️ \'10\'<br>โซนที่ส่ง: \'14\' ➡️ \'10\'', 16, 1, 2, '2026-04-08 11:53:28'),
(80, 'แก้ไข Booking', 'เวลารับ: \'05:39\' ➡️ \'07:00\'<br>เวลาสิ้นสุดการรับ: \'06:09\' ➡️ \'07:15\'<br>โรงแรมที่รับ: \'\' ➡️ \'Splash Beach Resort, Soi 4, ตำบล ไม้ขาว อำเภอถลาง ภูเก็ต ประเทศไทย\'<br>โรงแรมที่ส่ง: \'\' ➡️ \'Splash Beach Resort, Soi 4, ตำบล ไม้ขาว อำเภอถลาง ภูเก็ต ประเทศไทย\'<br>โซนที่รับ: \'28\' ➡️ \'10\'<br>โซนที่ส่ง: \'28\' ➡️ \'10\'', 17, 1, 2, '2026-04-08 11:54:50'),
(81, 'แก้ไข Booking', 'เวลารับ: \'05:46\' ➡️ \'00:00\'<br>เวลาสิ้นสุดการรับ: \'07:56\' ➡️ \'00:00\'<br>โรงแรมที่รับ: \'\' ➡️ \'Sunset Beach Bungalows, ซอย อ่าวยน-เขาขาด ตำบล วิชิต อำเภอเมืองภูเก็ต ภูเก็ต ประเทศไทย\'<br>โรงแรมที่ส่ง: \'\' ➡️ \'Sunset Beach Bungalows, ซอย อ่าวยน-เขาขาด ตำบล วิชิต อำเภอเมืองภูเก็ต ภูเก็ต ประเทศไทย\'<br>โซนที่รับ: \'3\' ➡️ \'NEW|Wichit\'<br>โซนที่ส่ง: \'3\' ➡️ \'NEW|Wichit\'', 18, 1, 2, '2026-04-08 11:56:03'),
(82, 'แก้ไข Booking', 'Overnight: \'0000-00-00\' ➡️ \'\'<br>เวลารับ: \'07:00\' ➡️ \'06:00\'<br>เวลาสิ้นสุดการรับ: \'07:15\' ➡️ \'06:15\'<br>โรงแรมที่รับ: \'\' ➡️ \'Phuket Marriott Resort & Spa, Merlin Beach, Muen-Ngoen Road, ตำบลป่าตอง Phuket, ภูเก็ต ประเทศไทย\'<br>โรงแรมที่ส่ง: \'\' ➡️ \'COMO Point Yamu, ป่าคลอก อำเภอถลาง ภูเก็ต ประเทศไทย\'<br>โซนที่รับ: \'13\' ➡️ \'6\'<br>โซนที่ส่ง: \'13\' ➡️ \'32\'', 21, 1, 2, '2026-04-08 11:56:38'),
(83, 'แก้ไข Booking', 'Overnight: \'0000-00-00\' ➡️ \'\'<br>เวลารับ: \'04:34\' ➡️ \'06:00\'<br>เวลาสิ้นสุดการรับ: \'06:54\' ➡️ \'06:15\'<br>โรงแรมที่รับ: \'\' ➡️ \'Kalima Resort & Spa, Phabaramee Road ตำบลป่าตอง อำเภอกะทู้ Phuket, ประเทศไทย\'<br>โรงแรมที่ส่ง: \'\' ➡️ \'Lub d Phuket Patong, ถนน สวัสดิ์รักษ์ ตำบลป่าตอง อำเภอกะทู้ ภูเก็ต ประเทศไทย\'<br>โซนที่รับ: \'2\' ➡️ \'6\'<br>โซนที่ส่ง: \'2\' ➡️ \'6\'', 22, 1, 2, '2026-04-08 11:57:04'),
(84, 'แก้ไข Booking', 'Overnight: \'0000-00-00\' ➡️ \'\'<br>เวลารับ: \'06:00\' ➡️ \'00:00\'<br>เวลาสิ้นสุดการรับ: \'06:30\' ➡️ \'00:00\'<br>โรงแรมที่รับ: \'\' ➡️ \'Chanalai Garden Resort, Kata Beach, ถนน กะตะ Amphur Muang, ภูเก็ต ประเทศไทย\'<br>โรงแรมที่ส่ง: \'\' ➡️ \'Chanalai Garden Resort, Kata Beach, ถนน กะตะ Amphur Muang, ภูเก็ต ประเทศไทย\'<br>โซนที่รับ: \'1\' ➡️ \'NEW|Amphur Muang\'<br>โซนที่ส่ง: \'2\' ➡️ \'NEW|Amphur Muang\'', 4, 1, 2, '2026-04-08 11:58:37'),
(85, 'แก้ไข Booking', 'Overnight: \'0000-00-00\' ➡️ \'\'<br>เวลารับ: \'07:15\' ➡️ \'07:00\'<br>เวลาสิ้นสุดการรับ: \'07:30\' ➡️ \'07:15\'<br>โรงแรมที่รับ: \'\' ➡️ \'JW Marriott Phuket Resort & Spa, ตำบล ไม้ขาว อำเภอถลาง ภูเก็ต ประเทศไทย\'<br>โรงแรมที่ส่ง: \'\' ➡️ \'JW Marriott Phuket Resort & Spa, ตำบล ไม้ขาว อำเภอถลาง ภูเก็ต ประเทศไทย\'<br>โซนที่รับ: \'2\' ➡️ \'10\'<br>โซนที่ส่ง: \'2\' ➡️ \'10\'', 5, 1, 2, '2026-04-08 11:58:53'),
(86, 'แก้ไข Booking', 'Overnight: \'0000-00-00\' ➡️ \'\'<br>เวลารับ: \'07:45\' ➡️ \'05:45\'<br>เวลาสิ้นสุดการรับ: \'08:00\' ➡️ \'06:00\'<br>โรงแรมที่รับ: \'\' ➡️ \'Beyond Kata, ถนน ปากบาง ตำบล กะรน อำเภอเมืองภูเก็ต ภูเก็ต ประเทศไทย\'<br>โรงแรมที่ส่ง: \'\' ➡️ \'Beyond Kata, ถนน ปากบาง ตำบล กะรน อำเภอเมืองภูเก็ต ภูเก็ต ประเทศไทย\'<br>โซนที่ส่ง: \'6\' ➡️ \'3\'', 6, 1, 2, '2026-04-08 11:59:06'),
(87, 'แก้ไข Booking', 'Overnight: \'0000-00-00\' ➡️ \'\'<br>เวลารับ: \'04:46\' ➡️ \'06:00\'<br>เวลาสิ้นสุดการรับ: \'06:34\' ➡️ \'06:15\'<br>โรงแรมที่รับ: \'\' ➡️ \'Skyview Resort Phuket Patong Beach, ถนน พิศิษฐ์กรณีย์ ตำบลป่าตอง อำเภอกะทู้ ภูเก็ต ประเทศไทย\'<br>โรงแรมที่ส่ง: \'\' ➡️ \'Skyview Resort Phuket Patong Beach, ถนน พิศิษฐ์กรณีย์ ตำบลป่าตอง อำเภอกะทู้ ภูเก็ต ประเทศไทย\'<br>โซนที่รับ: \'13\' ➡️ \'6\'<br>โซนที่ส่ง: \'13\' ➡️ \'6\'', 7, 1, 2, '2026-04-08 11:59:21'),
(88, 'แก้ไข Booking', 'เวลารับ: \'04:55\' ➡️ \'05:45\'<br>เวลาสิ้นสุดการรับ: \'05:55\' ➡️ \'06:00\'<br>โรงแรมที่รับ: \'\' ➡️ \'Katathani Phuket Beach Resort, ถนน กะตะน้อย ตำบล กะรน อำเภอเมืองภูเก็ต ภูเก็ต ประเทศไทย\'<br>โรงแรมที่ส่ง: \'\' ➡️ \'Katathani Phuket Beach Resort, ถนน กะตะน้อย ตำบล กะรน อำเภอเมืองภูเก็ต ภูเก็ต ประเทศไทย\'<br>โซนที่รับ: \'7\' ➡️ \'3\'<br>โซนที่ส่ง: \'7\' ➡️ \'3\'', 8, 1, 2, '2026-04-08 11:59:44'),
(89, 'แก้ไข Booking', 'Overnight: \'0000-00-00\' ➡️ \'\'<br>เวลารับ: \'12:00\' ➡️ \'06:00\'<br>เวลาสิ้นสุดการรับ: \'12:15\' ➡️ \'06:15\'<br>โรงแรมที่รับ: \'\' ➡️ \'Novotel Phuket Resort, ถนน พระบารมี ตำบลป่าตอง อำเภอกะทู้ ภูเก็ต ประเทศไทย\'<br>โรงแรมที่ส่ง: \'\' ➡️ \'Novotel Phuket Resort, ถนน พระบารมี ตำบลป่าตอง อำเภอกะทู้ ภูเก็ต ประเทศไทย\'<br>โซนที่รับ: \'2\' ➡️ \'6\'<br>โซนที่ส่ง: \'2\' ➡️ \'6\'', 9, 1, 2, '2026-04-08 12:00:05'),
(90, 'แก้ไข Booking', 'เวลารับ: \'04:52\' ➡️ \'00:00\'<br>เวลาสิ้นสุดการรับ: \'05:23\' ➡️ \'00:00\'<br>โรงแรมที่รับ: \'\' ➡️ \'The Nai Harn, ตำบล ราไวย์ Muang, ภูเก็ต ประเทศไทย\'<br>โรงแรมที่ส่ง: \'\' ➡️ \'The Nai Harn, ตำบล ราไวย์ Muang, ภูเก็ต ประเทศไทย\'<br>โซนที่รับ: \'14\' ➡️ \'NEW|ราไวย์\'<br>โซนที่ส่ง: \'14\' ➡️ \'NEW|ราไวย์\'', 10, 1, 2, '2026-04-08 12:00:20'),
(91, 'แก้ไข Booking', 'Overnight: \'0000-00-00\' ➡️ \'\'<br>เวลารับ: \'04:34\' ➡️ \'05:45\'<br>เวลาสิ้นสุดการรับ: \'04:56\' ➡️ \'06:00\'<br>โรงแรมที่รับ: \'\' ➡️ \'Novotel Phuket Kata Avista Resort And Spa, ซอย แหลมไทร ตำบล กะรน อำเภอเมืองภูเก็ต ภูเก็ต ประเทศไทย\'<br>โรงแรมที่ส่ง: \'\' ➡️ \'Novotel Phuket Kata Avista Resort And Spa, ซอย แหลมไทร ตำบล กะรน อำเภอเมืองภูเก็ต ภูเก็ต ประเทศไทย\'<br>โซนที่รับ: \'13\' ➡️ \'3\'<br>โซนที่ส่ง: \'13\' ➡️ \'3\'', 11, 1, 2, '2026-04-08 12:00:38'),
(92, 'แก้ไข Booking', 'Overnight: \'0000-00-00\' ➡️ \'\'<br>เวลารับ: \'05:13\' ➡️ \'05:45\'<br>เวลาสิ้นสุดการรับ: \'06:54\' ➡️ \'06:00\'<br>โรงแรมที่รับ: \'\' ➡️ \'Sawasdee Village Resort & Spa, ถนน กะตะ ตำบล กะรน อำเภอเมืองภูเก็ต ภูเก็ต ประเทศไทย\'<br>โรงแรมที่ส่ง: \'\' ➡️ \'Sawasdee Village Resort & Spa, ถนน กะตะ ตำบล กะรน อำเภอเมืองภูเก็ต ภูเก็ต ประเทศไทย\'<br>โซนที่รับ: \'19\' ➡️ \'3\'<br>โซนที่ส่ง: \'19\' ➡️ \'3\'', 12, 1, 2, '2026-04-08 12:00:55'),
(93, 'แก้ไข Booking', 'Overnight: \'0000-00-00\' ➡️ \'\'<br>เวลารับ: \'05:43\' ➡️ \'06:00\'<br>เวลาสิ้นสุดการรับ: \'05:54\' ➡️ \'06:15\'<br>โรงแรมที่รับ: \'\' ➡️ \'Duangjitt Resort & Spa, Prachanukroh Road, ตำบลป่าตอง อำเภอกะทู้ ภูเก็ต ประเทศไทย\'<br>โรงแรมที่ส่ง: \'\' ➡️ \'Duangjitt Resort & Spa, Prachanukroh Road, ตำบลป่าตอง อำเภอกะทู้ ภูเก็ต ประเทศไทย\'<br>โซนที่รับ: \'14\' ➡️ \'6\'<br>โซนที่ส่ง: \'14\' ➡️ \'6\'', 13, 1, 2, '2026-04-08 12:01:09'),
(94, 'แก้ไข Booking', 'Overnight: \'0000-00-00\' ➡️ \'\'<br>เวลารับ: \'00:00\' ➡️ \'06:00\'<br>เวลาสิ้นสุดการรับ: \'00:00\' ➡️ \'06:15\'<br>โรงแรมที่รับ: \'\' ➡️ \'Anona Beachfront Phuket Resort, ถนนทวีวงศ์ ตำบลป่าตอง อำเภอกะทู้ ภูเก็ต ประเทศไทย\'<br>โรงแรมที่ส่ง: \'\' ➡️ \'Anona Beachfront Phuket Resort, ถนนทวีวงศ์ ตำบลป่าตอง อำเภอกะทู้ ภูเก็ต ประเทศไทย\'<br>โซนที่รับ: \'14\' ➡️ \'6\'<br>โซนที่ส่ง: \'14\' ➡️ \'6\'', 3, 1, 2, '2026-04-08 12:04:30'),
(95, 'แก้ไข Booking', 'Overnight: \'0000-00-00\' ➡️ \'\'<br>เวลารับ: \'05:06\' ➡️ \'05:45\'<br>เวลาสิ้นสุดการรับ: \'04:06\' ➡️ \'06:00\'<br>โรงแรมที่รับ: \'\' ➡️ \'Pullman Phuket Karon Beach Resort, ถนน ปฏัก ตำบล กะรน Muang, ภูเก็ต ประเทศไทย\'<br>โรงแรมที่ส่ง: \'\' ➡️ \'Pullman Phuket Karon Beach Resort, ถนน ปฏัก ตำบล กะรน Muang, ภูเก็ต ประเทศไทย\'<br>โซนที่รับ: \'13\' ➡️ \'3\'<br>โซนที่ส่ง: \'13\' ➡️ \'3\'', 2, 1, 2, '2026-04-08 12:04:48'),
(96, 'แก้ไข Booking', 'เวลารับ: \'07:15\' ➡️ \'00:00\'<br>เวลาสิ้นสุดการรับ: \'07:30\' ➡️ \'00:00\'<br>โรงแรมที่รับ: \'\' ➡️ \'My Beach Resort Phuket, ซอย อ่าวยน-เขาขาด ตำบล วิชิต อำเภอเมืองภูเก็ต ภูเก็ต ประเทศไทย\'<br>โรงแรมที่ส่ง: \'\' ➡️ \'My Beach Resort Phuket, ซอย อ่าวยน-เขาขาด ตำบล วิชิต อำเภอเมืองภูเก็ต ภูเก็ต ประเทศไทย\'<br>โซนที่รับ: \'2\' ➡️ \'40\'<br>โซนที่ส่ง: \'2\' ➡️ \'40\'', 1, 1, 2, '2026-04-08 12:05:02'),
(97, 'แก้ไข Booking', 'Overnight: \'0000-00-00\' ➡️ \'\'<br>เวลารับ: \'06:00\' ➡️ \'07:15\'<br>เวลาสิ้นสุดการรับ: \'06:15\' ➡️ \'07:30\'<br>โรงแรมที่รับ: \'Phuket Marriott Resort & Spa\' ➡️ \'Phuket Marriott Resort and Spa, Nai Yang Beach, Tambol Sakoo Phuket Adamas Rd. ตำบลสาคู อำเภอถลาง ภูเก็ต ประเทศไทย\'<br>โรงแรมที่ส่ง: \'Phuket Marriott Resort & Spa\' ➡️ \'Phuket Marriott Resort and Spa, Nai Yang Beach, Tambol Sakoo Phuket Adamas Rd. ตำบลสาคู อำเภอถลาง ภูเก็ต ประเทศไทย\'<br>โซนที่รับ: \'6\' ➡️ \'15\'<br>โซนที่ส่ง: \'6\' ➡️ \'15\'', 25, 1, 2, '2026-04-08 12:26:13'),
(98, 'แก้ไข Booking', 'Overnight: \'0000-00-00\' ➡️ \'\'', 25, 1, 2, '2026-04-08 12:26:21'),
(99, 'แก้ไข Booking', 'Overnight: \'0000-00-00\' ➡️ \'\'<br>เวลารับ: \'07:15\' ➡️ \'06:30\'<br>เวลาสิ้นสุดการรับ: \'07:30\' ➡️ \'06:45\'<br>โรงแรมที่รับ: \'Phuket Marriott Resort and Spa\' ➡️ \'Phuket Marriott Resort and Spa, Nai Yang Beach, Tambol Sakoo Phuket Adamas Rd. ตำบลสาคู อำเภอถลาง ภูเก็ต ประเทศไทย\'<br>โรงแรมที่ส่ง: \'Phuket Marriott Resort and Spa\' ➡️ \'Phuket Marriott Resort and Spa, Nai Yang Beach, Tambol Sakoo Phuket Adamas Rd. ตำบลสาคู อำเภอถลาง ภูเก็ต ประเทศไทย\'<br>โซนที่รับ: \'15\' ➡️ \'9\'<br>โซนที่ส่ง: \'15\' ➡️ \'9\'', 25, 1, 2, '2026-04-08 12:27:24'),
(100, 'สร้าง Booking', 'หมายเลข booking no. BO69040001', 26, 1, 1, '2026-04-08 13:49:55'),
(101, 'แก้ไข Booking', 'Overnight: \'0000-00-00\' ➡️ \'\'<br>โรงแรมที่ส่ง: \'Lub d Phuket Patong\' ➡️ \'Katathani Phuket Beach Resort, ถนน กะตะน้อย ตำบล กะรน อำเภอเมืองภูเก็ต ภูเก็ต ประเทศไทย\'<br>โซนที่ส่ง: \'6\' ➡️ \'3\'', 22, 1, 2, '2026-04-10 10:24:20'),
(102, 'แก้ไข Booking', 'ประเภท Transfer: \'1\' ➡️ \'2\'', 17, 1, 2, '2026-04-20 23:33:46'),
(103, 'แก้ไข Booking', 'Overnight: \'0000-00-00\' ➡️ \'\'', 4, 1, 2, '2026-04-21 13:21:21');

-- --------------------------------------------------------

--
-- Table structure for table `manage_boat`
--

CREATE TABLE `manage_boat` (
  `id` int(11) NOT NULL,
  `travel_date` date NOT NULL,
  `time` time NOT NULL,
  `counter` varchar(100) NOT NULL,
  `note` text NOT NULL,
  `boat_id` int(11) NOT NULL,
  `guide_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `manage_transfer`
--

CREATE TABLE `manage_transfer` (
  `id` int(11) NOT NULL,
  `outside_car` varchar(100) NOT NULL,
  `outside_driver` varchar(100) NOT NULL,
  `license` varchar(50) NOT NULL,
  `telephone` varchar(50) NOT NULL,
  `travel_date` date NOT NULL,
  `note` text NOT NULL,
  `seat` int(11) NOT NULL,
  `driver_id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `manage_transfer`
--

INSERT INTO `manage_transfer` (`id`, `outside_car`, `outside_driver`, `license`, `telephone`, `travel_date`, `note`, `seat`, `driver_id`, `car_id`, `product_id`, `created_at`) VALUES
(117, '', '', '', '', '2026-04-08', '', 12, 2, 4, 0, '2026-04-24 15:08:00'),
(119, '', '', '', '', '2026-04-08', '', 12, 1, 1, 0, '2026-04-24 15:20:01'),
(120, '', '', '', '', '2026-04-08', '', 13, 2, 2, 0, '2026-04-24 15:20:10'),
(121, '', '', '', '', '2026-04-08', '', 0, 3, 3, 0, '2026-04-24 16:04:34');

-- --------------------------------------------------------

--
-- Table structure for table `nationalitys`
--

CREATE TABLE `nationalitys` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `is_approved` int(11) DEFAULT 1,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nationalitys`
--

INSERT INTO `nationalitys` (`id`, `name`, `is_approved`, `created_at`) VALUES
(1, 'Aruba', 1, '2021-09-15 15:37:35'),
(2, 'Afghanistan', 1, '2021-09-15 15:37:35'),
(3, 'Angola', 1, '2021-09-15 15:37:35'),
(4, 'Anguilla', 1, '2021-09-15 15:37:35'),
(5, 'land Islands', 1, '2021-09-15 15:37:35'),
(6, 'Albania', 1, '2021-09-15 15:37:35'),
(7, 'Andorra', 1, '2021-09-15 15:37:35'),
(8, 'Netherlands Antilles', 1, '2021-09-15 15:37:35'),
(9, 'United Arab Emirates', 1, '2021-09-15 15:37:35'),
(10, 'Argentina', 1, '2021-09-15 15:37:35'),
(11, 'Armenia', 1, '2021-09-15 15:37:35'),
(12, 'American Samoa', 1, '2021-09-15 15:37:35'),
(13, 'Antarctica', 1, '2021-09-15 15:37:35'),
(14, 'French Southern and Antarctic Lands', 1, '2021-09-15 15:37:35'),
(15, 'Antigua and Barbuda', 1, '2021-09-15 15:37:35'),
(16, 'Australia', 1, '2021-09-15 15:37:35'),
(17, 'Austria', 1, '2021-09-15 15:37:35'),
(18, 'Azerbaijan', 1, '2021-09-15 15:37:35'),
(19, 'Burundi', 1, '2021-09-15 15:37:35'),
(20, 'Belgium', 1, '2021-09-15 15:37:35'),
(21, 'Benin', 1, '2021-09-15 15:37:35'),
(22, 'Burkina Faso', 1, '2021-09-15 15:37:35'),
(23, 'Bangladesh', 1, '2021-09-15 15:37:35'),
(24, 'Bulgaria', 1, '2021-09-15 15:37:35'),
(25, 'Bahrain', 1, '2021-09-15 15:37:35'),
(26, 'Bahamas', 1, '2021-09-15 15:37:35'),
(27, 'Bosnia and Herzegovina', 1, '2021-09-15 15:37:35'),
(28, 'Belarus', 1, '2021-09-15 15:37:35'),
(29, 'Bermuda', 1, '2021-09-15 15:37:35'),
(30, 'Brazil', 1, '2021-09-15 15:37:35'),
(31, 'Barbados', 1, '2021-09-15 15:37:35'),
(32, 'Bhutan', 1, '2021-09-15 15:37:35'),
(33, 'Bouvet Island', 1, '2021-09-15 15:37:35'),
(34, 'Botswana', 1, '2021-09-15 15:37:35'),
(35, 'Central African Republic', 1, '2021-09-15 15:37:35'),
(36, 'The Territory of Cocos (Keeling) Islands', 1, '2021-09-15 15:37:35'),
(37, 'Switzerland', 1, '2021-09-15 15:37:35'),
(38, 'Chile', 1, '2021-09-15 15:37:35'),
(39, 'China', 1, '2021-09-15 15:37:35'),
(41, 'Cameroon', 1, '2021-09-15 15:37:35'),
(42, 'The Democratic Republic of the Congo', 1, '2021-09-15 15:37:35'),
(43, 'Cook Islands', 1, '2021-09-15 15:37:35'),
(44, 'Colombia', 1, '2021-09-15 15:37:35'),
(45, 'Comoros', 1, '2021-09-15 15:37:35'),
(46, 'Cabo Verde', 1, '2021-09-15 15:37:35'),
(47, 'Costa Rica', 1, '2021-09-15 15:37:35'),
(48, 'Cuba', 1, '2021-09-15 15:37:35'),
(49, 'Christmas Island', 1, '2021-09-15 15:37:35'),
(50, 'Cayman Islands', 1, '2021-09-15 15:37:35'),
(51, 'Cyprus', 1, '2021-09-15 15:37:35'),
(52, 'Czech Republic', 1, '2021-09-15 15:37:35'),
(53, 'Germany', 1, '2021-09-15 15:37:35'),
(54, 'Djibouti', 1, '2021-09-15 15:37:35'),
(55, 'Danmark', 1, '2021-09-15 15:37:35'),
(56, 'Algeria', 1, '2021-09-15 15:37:35'),
(57, 'Ecuador', 1, '2021-09-15 15:37:35'),
(58, 'Egypt', 1, '2021-09-15 15:37:35'),
(59, 'Eritrea', 1, '2021-09-15 15:37:35'),
(60, 'Western Sahara', 1, '2021-09-15 15:37:35'),
(61, 'Spain', 1, '2021-09-15 15:37:35'),
(62, 'Estonia', 1, '2021-09-15 15:37:35'),
(63, 'Ethiopia', 1, '2021-09-15 15:37:35'),
(64, 'Finland', 1, '2021-09-15 15:37:35'),
(65, 'Fiji', 1, '2021-09-15 15:37:35'),
(66, 'Falkland Islands (Malvinas)', 1, '2021-09-15 15:37:35'),
(67, 'France', 1, '2021-09-15 15:37:35'),
(68, 'Faroe Islands', 1, '2021-09-15 15:37:35'),
(69, 'Micronesia', 1, '2021-09-15 15:37:35'),
(70, 'Gabon', 1, '2021-09-15 15:37:35'),
(71, 'United Kingdom', 1, '2021-09-15 15:37:35'),
(72, 'Georgia', 1, '2021-09-15 15:37:35'),
(73, 'Ghana', 1, '2021-09-15 15:37:35'),
(74, 'Gibraltar', 1, '2021-09-15 15:37:35'),
(75, 'Guinea', 1, '2021-09-15 15:37:35'),
(76, 'Guadeloupe', 1, '2021-09-15 15:37:35'),
(77, 'Gambia', 1, '2021-09-15 15:37:35'),
(78, 'Equatorial Guinea', 1, '2021-09-15 15:37:35'),
(79, 'Greece', 1, '2021-09-15 15:37:35'),
(80, 'Grenada', 1, '2021-09-15 15:37:35'),
(81, 'Greenland', 1, '2021-09-15 15:37:35'),
(82, 'Guatemala', 1, '2021-09-15 15:37:35'),
(83, 'French Guiana', 1, '2021-09-15 15:37:35'),
(84, 'Guam', 1, '2021-09-15 15:37:35'),
(85, 'Guyana', 1, '2021-09-15 15:37:35'),
(86, 'Hong Kong', 1, '2021-09-15 15:37:35'),
(87, 'Heard and McDonald Islands', 1, '2021-09-15 15:37:35'),
(88, 'Honduras', 1, '2021-09-15 15:37:35'),
(89, 'Haiti', 1, '2021-09-15 15:37:35'),
(90, 'Hungary', 1, '2021-09-15 15:37:35'),
(91, 'Indonesia', 1, '2021-09-15 15:37:35'),
(92, 'India', 1, '2021-09-15 15:37:35'),
(93, 'British Indian Ocean Territory', 1, '2021-09-15 15:37:35'),
(94, 'Ireland', 1, '2021-09-15 15:37:35'),
(95, 'Iraq', 1, '2021-09-15 15:37:35'),
(96, 'Iceland', 1, '2021-09-15 15:37:35'),
(97, 'Israel', 1, '2021-09-15 15:37:35'),
(98, 'Italy', 1, '2021-09-15 15:37:35'),
(99, 'Jamaica', 1, '2021-09-15 15:37:35'),
(100, 'Jordan', 1, '2021-09-15 15:37:35'),
(101, 'Japan', 1, '2021-09-15 15:37:35'),
(102, 'Kazakhstan', 1, '2021-09-15 15:37:35'),
(103, 'Kenya', 1, '2021-09-15 15:37:35'),
(104, 'Kyrgyzstan', 1, '2021-09-15 15:37:35'),
(105, 'Cambodia', 1, '2021-09-15 15:37:35'),
(106, 'Republic of Korea', 1, '2021-09-15 15:37:35'),
(107, 'Kuwait', 1, '2021-09-15 15:37:35'),
(108, 'Lebanon', 1, '2021-09-15 15:37:35'),
(109, 'Liberia', 1, '2021-09-15 15:37:35'),
(110, 'Libya', 1, '2021-09-15 15:37:35'),
(111, 'Saint Lucia', 1, '2021-09-15 15:37:35'),
(112, 'Sri Lanka', 1, '2021-09-15 15:37:35'),
(113, 'Lesotho', 1, '2021-09-15 15:37:35'),
(114, 'Lithuania', 1, '2021-09-15 15:37:35'),
(115, 'Luxembourg', 1, '2021-09-15 15:37:35'),
(116, 'Latvia', 1, '2021-09-15 15:37:35'),
(117, 'Macao', 1, '2021-09-15 15:37:35'),
(118, 'Morocco', 1, '2021-09-15 15:37:35'),
(119, 'Monaco', 1, '2021-09-15 15:37:35'),
(120, 'Madagascar', 1, '2021-09-15 15:37:35'),
(121, 'Maldives', 1, '2021-09-15 15:37:35'),
(122, 'Mexico', 1, '2021-09-15 15:37:35'),
(123, 'Republic of Macedonia', 1, '2021-09-15 15:37:35'),
(124, 'Mali', 1, '2021-09-15 15:37:35'),
(125, 'Malta', 1, '2021-09-15 15:37:35'),
(126, 'Myanmar', 1, '2021-09-15 15:37:35'),
(127, 'Montenegro', 1, '2021-09-15 15:37:35'),
(128, 'Mongolia', 1, '2021-09-15 15:37:35'),
(129, 'Northern Mariana Islands', 1, '2021-09-15 15:37:35'),
(130, 'Mozambique', 1, '2021-09-15 15:37:35'),
(131, 'Mauritania', 1, '2021-09-15 15:37:35'),
(132, 'Montserrat', 1, '2021-09-15 15:37:35'),
(133, 'Martinique', 1, '2021-09-15 15:37:35'),
(134, 'Malaysia', 1, '2021-09-15 15:37:35'),
(135, 'Mayotte', 1, '2021-09-15 15:37:35'),
(136, 'Namibia', 1, '2021-09-15 15:37:35'),
(137, 'New Caledonia', 1, '2021-09-15 15:37:35'),
(138, 'Niger', 1, '2021-09-15 15:37:35'),
(139, 'Norfolk Island', 1, '2021-09-15 15:37:35'),
(140, 'Nigeria', 1, '2021-09-15 15:37:35'),
(141, 'Nicaragua', 1, '2021-09-15 15:37:35'),
(142, 'Niue', 1, '2021-09-15 15:37:35'),
(143, 'Norway', 1, '2021-09-15 15:37:35'),
(144, 'Nauru', 1, '2021-09-15 15:37:35'),
(145, 'New Zealand', 1, '2021-09-15 15:37:35'),
(146, 'Oman', 1, '2021-09-15 15:37:35'),
(147, 'Pakistan', 1, '2021-09-15 15:37:35'),
(148, 'Panama', 1, '2021-09-15 15:37:35'),
(149, 'Pitcairn Islands', 1, '2021-09-15 15:37:35'),
(150, 'Peru', 1, '2021-09-15 15:37:35'),
(151, 'Philippines', 1, '2021-09-15 15:37:35'),
(152, 'Palau', 1, '2021-09-15 15:37:35'),
(153, 'Papua New Guinea', 1, '2021-09-15 15:37:35'),
(154, 'Puerto Rico', 1, '2021-09-15 15:37:35'),
(155, 'Portugal', 1, '2021-09-15 15:37:35'),
(156, 'Paraguay', 1, '2021-09-15 15:37:35'),
(157, 'French Polynesia', 1, '2021-09-15 15:37:35'),
(158, 'Qatar', 1, '2021-09-15 15:37:35'),
(159, 'R้union', 1, '2021-09-15 15:37:35'),
(160, 'Romania', 1, '2021-09-15 15:37:35'),
(161, 'Rwanda', 1, '2021-09-15 15:37:35'),
(162, 'Sudan', 1, '2021-09-15 15:37:35'),
(163, 'Senegal', 1, '2021-09-15 15:37:35'),
(164, 'Singapore', 1, '2021-09-15 15:37:35'),
(165, 'South Georgia and the South Sandwich Islands', 1, '2021-09-15 15:37:35'),
(166, 'Saint Helena', 1, '2021-09-15 15:37:35'),
(167, 'Svalbard and Jan Mayen', 1, '2021-09-15 15:37:35'),
(168, 'Solomon Islands', 1, '2021-09-15 15:37:35'),
(169, 'Sierra Leone', 1, '2021-09-15 15:37:35'),
(170, 'El Salvador', 1, '2021-09-15 15:37:35'),
(171, 'San Marino', 1, '2021-09-15 15:37:35'),
(172, 'Somalia', 1, '2021-09-15 15:37:35'),
(173, 'Saint Pierre and Miquelon', 1, '2021-09-15 15:37:35'),
(174, 'Serbia', 1, '2021-09-15 15:37:35'),
(175, 'Sao Tome and Principe', 1, '2021-09-15 15:37:35'),
(176, 'Slovenia', 1, '2021-09-15 15:37:35'),
(177, 'Sweden', 1, '2021-09-15 15:37:35'),
(178, 'Swaziland', 1, '2021-09-15 15:37:35'),
(179, 'Turks and Caicos Islands', 1, '2021-09-15 15:37:35'),
(180, 'Tchad', 1, '2021-09-15 15:37:35'),
(181, 'Togo', 1, '2021-09-15 15:37:35'),
(182, 'Thailand', 1, '2021-09-15 15:37:35'),
(183, 'Tajikistan', 1, '2021-09-15 15:37:35'),
(184, 'Tokelau', 1, '2021-09-15 15:37:35'),
(185, 'Turkmenistan', 1, '2021-09-15 15:37:35'),
(186, 'Timor-Leste', 1, '2021-09-15 15:37:35'),
(187, 'Trinidad and Tobago', 1, '2021-09-15 15:37:35'),
(188, 'Tunisia', 1, '2021-09-15 15:37:35'),
(189, 'Turkey', 1, '2021-09-15 15:37:35'),
(190, 'Tuvalu', 1, '2021-09-15 15:37:35'),
(191, 'Uganda', 1, '2021-09-15 15:37:35'),
(192, 'Ukraine', 1, '2021-09-15 15:37:35'),
(193, 'United States Minor Outlying Islands', 1, '2021-09-15 15:37:35'),
(194, 'Uruguay', 1, '2021-09-15 15:37:35'),
(195, 'United States of America', 1, '2021-09-15 15:37:35'),
(196, 'Uzbekistan', 1, '2021-09-15 15:37:35'),
(197, 'State of the Vatican City', 1, '2021-09-15 15:37:35'),
(198, 'Saint Vincent and the Grenadines', 1, '2021-09-15 15:37:35'),
(199, 'British Virgin Islands', 1, '2021-09-15 15:37:35'),
(200, 'United States Virgin Islands', 1, '2021-09-15 15:37:35'),
(201, 'Viet Nam', 1, '2021-09-15 15:37:35'),
(202, 'Vanuatu', 1, '2021-09-15 15:37:35'),
(203, 'Wallis and Futuna', 1, '2021-09-15 15:37:35'),
(204, 'Samoa', 1, '2021-09-15 15:37:35'),
(205, 'Yemen', 1, '2021-09-15 15:37:35'),
(206, 'Zambia', 1, '2021-09-15 15:37:35'),
(207, 'Zimbabwe', 1, '2021-09-15 15:37:35'),
(208, 'Negara Brunei Darussalam', 1, '2021-09-15 15:37:35'),
(209, 'Plurinational State of Bolivia', 1, '2021-09-15 15:37:35'),
(210, 'Belize', 1, '2021-09-15 15:37:35'),
(211, 'Canada', 1, '2021-09-15 15:37:35'),
(212, 'Congo', 1, '2021-09-15 15:37:35'),
(213, 'Dominica', 1, '2021-09-15 15:37:35'),
(214, 'Dominican Republic', 1, '2021-09-15 15:37:35'),
(215, 'Guinea-Bissau', 1, '2021-09-15 15:37:35'),
(216, 'Croatia', 1, '2021-09-15 15:37:35'),
(217, 'Islamic Republic of Iran', 1, '2021-09-15 15:37:35'),
(218, 'Kiribati', 1, '2021-09-15 15:37:35'),
(219, 'Saint Kitts and Nevis', 1, '2021-09-15 15:37:35'),
(220, 'Democratic People`s Republic of Korea', 1, '2021-09-15 15:37:35'),
(221, 'Lao People`s Democratic Republic', 1, '2021-09-15 15:37:35'),
(222, 'Liechtenstein', 1, '2021-09-15 15:37:35'),
(223, 'Republic of Moldova', 1, '2021-09-15 15:37:35'),
(224, 'Marshall Islands', 1, '2021-09-15 15:37:35'),
(225, 'Mauritius', 1, '2021-09-15 15:37:35'),
(226, 'Republic of Malawi', 1, '2021-09-15 15:37:35'),
(227, 'Netherlands', 1, '2021-09-15 15:37:35'),
(228, 'Federal Democratic Republic of Nepal', 1, '2021-09-15 15:37:35'),
(229, 'Republic of Poland', 1, '2021-09-15 15:37:35'),
(230, 'State of Palestine', 1, '2021-09-15 15:37:35'),
(231, 'Russian Federation', 1, '2021-09-15 15:37:35'),
(232, 'Saudi Arabia', 1, '2021-09-15 15:37:35'),
(233, 'Seychelles', 1, '2021-09-15 15:37:35'),
(234, 'Slovakia', 1, '2021-09-15 15:37:35'),
(235, 'Suriname', 1, '2021-09-15 15:37:35'),
(236, 'Syrian Arab Republic', 1, '2021-09-15 15:37:35'),
(237, 'Tonga', 1, '2021-09-15 15:37:35'),
(238, 'Taiwan', 1, '2021-09-15 15:37:35'),
(239, 'United Republic of Tanzania', 1, '2021-09-15 15:37:35'),
(240, 'Bolivarian Republic of Venezuela', 1, '2021-09-15 15:37:35'),
(241, 'Republic of South Africa', 1, '2021-09-15 15:37:35'),
(242, 'Republic of Kosovo', 1, '2021-09-15 15:37:35');

-- --------------------------------------------------------

--
-- Table structure for table `overnight_boat`
--

CREATE TABLE `overnight_boat` (
  `id` int(11) NOT NULL,
  `manage_id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `overnight_transfers`
--

CREATE TABLE `overnight_transfers` (
  `id` int(11) NOT NULL,
  `arrange` int(11) NOT NULL DEFAULT 0,
  `pax` int(11) NOT NULL,
  `manage_id` int(11) NOT NULL,
  `booking_transfer_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `overnight_transfers`
--

INSERT INTO `overnight_transfers` (`id`, `arrange`, `pax`, `manage_id`, `booking_transfer_id`, `created_at`) VALUES
(6, 0, 3, 121, 24, '2026-04-24 16:04:34');

-- --------------------------------------------------------

--
-- Table structure for table `park`
--

CREATE TABLE `park` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `rate_adult_eng` double(9,2) NOT NULL,
  `rate_child_eng` double(9,2) NOT NULL,
  `rate_adult_th` double(9,2) NOT NULL,
  `rate_child_th` double(9,2) NOT NULL,
  `is_approved` int(11) NOT NULL DEFAULT 1,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `park`
--

INSERT INTO `park` (`id`, `name`, `rate_adult_eng`, `rate_child_eng`, `rate_adult_th`, `rate_child_th`, `is_approved`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'SIMILAN', 0.00, 0.00, 0.00, 0.00, 1, 0, '2025-11-11 13:37:13', '2025-11-11 13:37:13'),
(2, 'SURIN ISLANDS', 0.00, 0.00, 0.00, 0.00, 1, 0, '2025-11-19 13:54:58', '2025-11-19 13:54:58'),
(3, 'PHI PHI ISLANDS', 0.00, 0.00, 0.00, 0.00, 1, 0, '2025-11-19 13:55:32', '2025-11-19 13:55:32');

-- --------------------------------------------------------

--
-- Table structure for table `payments_type`
--

CREATE TABLE `payments_type` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `type` int(11) NOT NULL COMMENT 'IN : 1\r\nBI : 2',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments_type`
--

INSERT INTO `payments_type` (`id`, `name`, `type`, `created_at`, `updated_at`) VALUES
(1, 'เก็บเต็มจำนวน', 1, '2022-06-10 08:45:28', '2022-06-10 08:45:28'),
(2, 'ชำระเงินเป็นงวด', 1, '2022-06-10 08:45:28', '2022-06-10 08:45:28'),
(3, 'เงินสด', 2, '2022-06-29 09:16:21', '2022-06-29 09:16:21'),
(4, 'โอนเงิน', 2, '2022-06-29 09:16:21', '2022-06-29 09:16:21'),
(5, 'เช็คธนาคาร', 2, '2022-06-29 09:16:21', '2022-06-29 09:16:21'),
(6, 'เงินสด', 3, '2022-06-29 09:16:21', '2022-06-29 09:16:21'),
(7, 'โอนเงิน', 3, '2022-06-29 09:16:21', '2022-06-29 09:16:21'),
(8, 'เช็คธนาคาร', 3, '2022-06-29 09:16:21', '2022-06-29 09:16:21');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `is_approved` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `is_approved`, `created_at`) VALUES
(1, 'Booking (บุ๊คกิ้ง)', 1, '2025-03-20 16:15:50'),
(2, 'Management (การจัดการ)', 1, '2025-03-20 16:15:50'),
(3, 'Work Sheet (ใบงาน)', 1, '2025-03-20 16:15:50'),
(4, 'Accounting (บัญชี)', 1, '2025-03-20 16:15:50'),
(5, 'Report (รายงาน)', 1, '2025-03-20 16:15:50'),
(6, 'Configuration (ตั้งค่า)', 1, '2025-03-20 16:15:50'),
(7, 'Dashboard (แดชบอร์ด)', 1, '2025-03-20 16:15:50');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission_user`
--

CREATE TABLE `permission_user` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_user`
--

INSERT INTO `permission_user` (`id`, `user_id`, `permission_id`, `created_at`) VALUES
(1, 1, 1, '2025-11-11 07:27:44'),
(2, 1, 2, '2025-11-11 07:27:44'),
(3, 1, 3, '2025-11-11 07:27:44'),
(4, 1, 4, '2025-11-11 07:27:44'),
(5, 1, 5, '2025-11-11 07:27:44'),
(6, 1, 6, '2025-11-11 07:27:44'),
(7, 1, 7, '2025-11-13 12:02:21');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `refcode` varchar(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `acronym` varchar(100) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `pax` int(11) NOT NULL,
  `note` text NOT NULL,
  `park_id` int(11) NOT NULL,
  `is_approved` int(11) NOT NULL DEFAULT 0,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `refcode`, `name`, `acronym`, `slug`, `pax`, `note`, `park_id`, `is_approved`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, '79757', 'SIMILAN ISLANDS', '', '79757', 0, '', 1, 1, 0, '2025-11-11 13:37:22', '2025-11-11 13:37:22'),
(2, '25188', 'SURIN ISLANDS', 'SIDT', 'SIMILAN ISLANDS DAY TRIP', 0, '', 2, 1, 0, '2025-11-13 12:56:14', '2025-11-19 13:55:40'),
(3, '39673', 'PHI PHI ISLANDS', 'PP', 'PHI PHI ISLANDS', 0, '', 3, 1, 0, '2025-11-19 13:55:55', '2025-11-19 13:55:55'),
(4, '52851', 'SIMILAN ISLANDS NO TRANSFER', 'SINO', 'SIMILAN ISLANDS NO TRANSFER', 0, '', 1, 1, 0, '2025-11-19 14:35:28', '2025-11-19 14:35:38');

-- --------------------------------------------------------

--
-- Table structure for table `products_type`
--

CREATE TABLE `products_type` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products_type`
--

INSERT INTO `products_type` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Tour', 'tour', '2021-07-19 03:51:23', '2021-07-19 03:51:23');

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `detail` text NOT NULL,
  `transfer` int(11) NOT NULL DEFAULT 0 COMMENT '0 : not included | 1 : included ',
  `boat` int(11) NOT NULL,
  `customer` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `is_approved` int(11) NOT NULL DEFAULT 0,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`id`, `name`, `slug`, `detail`, `transfer`, `boat`, `customer`, `product_id`, `is_approved`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'Thai', 'Thai', '', 1, 0, 0, 1, 1, 0, '2025-11-11 13:37:35', '2025-11-11 13:37:35'),
(2, 'Foreign', 'Foreign', '', 1, 0, 0, 1, 1, 0, '2025-11-11 13:37:42', '2025-11-11 13:37:42'),
(3, 'Foreign', 'Foreign', '', 1, 1, 2, 2, 1, 0, '2025-11-13 13:18:50', '2025-11-13 13:18:50'),
(4, 'Thai', 'Thai', '', 1, 1, 1, 3, 1, 0, '2025-11-19 14:34:25', '2025-11-19 14:34:25'),
(5, 'Foreign', 'Foreign', '', 1, 1, 2, 3, 1, 0, '2025-11-19 14:34:31', '2025-11-19 14:34:31'),
(6, 'Thai', 'Thai', '', 0, 1, 1, 4, 1, 0, '2025-11-19 14:35:47', '2025-11-19 14:35:47'),
(7, 'Foreign', 'Foreign', '', 0, 1, 2, 4, 1, 0, '2025-11-19 14:35:54', '2025-11-19 15:19:05'),
(8, 'Thai', 'Thai', '', 1, 1, 0, 2, 1, 0, '2026-03-26 10:59:38', '2026-03-26 10:59:38');

-- --------------------------------------------------------

--
-- Table structure for table `product_periods`
--

CREATE TABLE `product_periods` (
  `id` int(11) NOT NULL,
  `period_from` date NOT NULL,
  `period_to` date NOT NULL,
  `product_category_id` int(11) NOT NULL DEFAULT 0,
  `is_approved` int(11) NOT NULL DEFAULT 0,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_periods`
--

INSERT INTO `product_periods` (`id`, `period_from`, `period_to`, `product_category_id`, `is_approved`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, '2025-01-01', '2026-12-31', 2, 1, 0, '2025-11-11 13:38:01', '2025-11-11 13:38:01'),
(2, '2025-01-01', '2026-12-31', 1, 1, 0, '2025-11-11 13:38:13', '2025-11-11 13:38:13'),
(3, '2025-01-01', '2026-12-31', 5, 1, 0, '2025-11-19 14:34:50', '2025-11-19 14:34:50'),
(4, '2025-01-01', '2026-12-31', 4, 1, 0, '2025-11-19 14:35:00', '2025-11-19 14:35:00'),
(5, '2025-01-01', '2026-01-31', 7, 1, 0, '2025-11-19 14:36:06', '2025-11-19 14:36:06'),
(6, '2025-01-01', '2026-01-31', 6, 1, 0, '2025-11-19 14:36:15', '2025-11-19 14:36:15'),
(7, '2026-01-01', '2026-12-31', 3, 1, 0, '2026-03-26 10:59:47', '2026-03-26 10:59:47'),
(8, '2026-01-01', '2026-12-31', 8, 1, 0, '2026-03-26 10:59:59', '2026-03-26 10:59:59');

-- --------------------------------------------------------

--
-- Table structure for table `product_rates`
--

CREATE TABLE `product_rates` (
  `id` int(11) NOT NULL,
  `rate_adult` double(9,2) NOT NULL,
  `rate_child` double(9,2) NOT NULL,
  `rate_infant` double(9,2) NOT NULL,
  `rate_private` double(9,2) NOT NULL,
  `product_period_id` int(11) NOT NULL DEFAULT 0,
  `is_approved` int(11) NOT NULL DEFAULT 0,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_rates`
--

INSERT INTO `product_rates` (`id`, `rate_adult`, `rate_child`, `rate_infant`, `rate_private`, `product_period_id`, `is_approved`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 3300.00, 2300.00, 600.00, 0.00, 1, 1, 0, '2025-11-11 13:39:12', '2025-11-11 13:39:12'),
(2, 2900.00, 2000.00, 100.00, 0.00, 2, 1, 0, '2025-11-11 13:39:12', '2025-11-11 13:39:12');

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `id` int(11) NOT NULL,
  `is_approved` int(11) NOT NULL,
  `country` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `name_th` varchar(100) NOT NULL,
  `name_en` varchar(100) NOT NULL,
  `pic` varchar(220) NOT NULL,
  `geography_id` int(11) NOT NULL,
  `is_deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`id`, `is_approved`, `country`, `code`, `name_th`, `name_en`, `pic`, `geography_id`, `is_deleted`) VALUES
(1, 1, 219, 10, 'กรุงเทพมหานคร', 'Bangkok', '', 2, 0),
(2, 1, 219, 11, 'สมุทรปราการ', 'Samut Prakan', '', 2, 0),
(3, 1, 219, 12, 'นนทบุรี', 'Nonthaburi', '', 2, 0),
(4, 1, 219, 13, 'ปทุมธานี', 'Pathum Thani', '', 2, 0),
(5, 1, 219, 14, 'พระนครศรีอยุธยา', 'Phra Nakhon Si Ayutthaya', '', 2, 0),
(6, 1, 219, 15, 'อ่างทอง', 'Ang Thong', '', 2, 0),
(7, 1, 219, 16, 'ลพบุรี', 'Loburi', '', 2, 0),
(8, 1, 219, 17, 'สิงห์บุรี', 'Sing Buri', '', 2, 0),
(9, 1, 219, 18, 'ชัยนาท', 'Chai Nat', '', 2, 0),
(10, 1, 219, 19, 'สระบุรี', 'Saraburi', '', 2, 0),
(11, 1, 219, 20, 'ชลบุรี', 'Chon Buri', '', 5, 0),
(12, 1, 219, 21, 'ระยอง', 'Rayong', '', 5, 0),
(13, 1, 219, 22, 'จันทบุรี', 'Chanthaburi', '', 5, 0),
(14, 1, 219, 23, 'ตราด', 'Trat', '', 5, 0),
(15, 1, 219, 24, 'ฉะเชิงเทรา', 'Chachoengsao', '', 5, 0),
(16, 1, 219, 25, 'ปราจีนบุรี', 'Prachin Buri', '', 5, 0),
(17, 1, 219, 26, 'นครนายก', 'Nakhon Nayok', '', 2, 0),
(18, 1, 219, 27, 'สระแก้ว', 'Sa Kaeo', '', 5, 0),
(19, 1, 219, 30, 'นครราชสีมา', 'Nakhon Ratchasima', '', 3, 0),
(20, 1, 219, 31, 'บุรีรัมย์', 'Buri Ram', '', 3, 0),
(21, 1, 219, 32, 'สุรินทร์', 'Surin', '', 3, 0),
(22, 1, 219, 33, 'ศรีสะเกษ', 'Si Sa Ket', '', 3, 0),
(23, 1, 219, 34, 'อุบลราชธานี', 'Ubon Ratchathani', '', 3, 0),
(24, 1, 219, 35, 'ยโสธร', 'Yasothon', '', 3, 0),
(25, 1, 219, 36, 'ชัยภูมิ', 'Chaiyaphum', '', 3, 0),
(26, 1, 219, 37, 'อำนาจเจริญ', 'Amnat Charoen', '', 3, 0),
(27, 1, 219, 39, 'หนองบัวลำภู', 'Nong Bua Lam Phu', '', 3, 0),
(28, 1, 219, 40, 'ขอนแก่น', 'Khon Kaen', '', 3, 0),
(29, 1, 219, 41, 'อุดรธานี', 'Udon Thani', '', 3, 0),
(30, 1, 219, 42, 'เลย', 'Loei', '', 3, 0),
(31, 1, 219, 43, 'หนองคาย', 'Nong Khai', '', 3, 0),
(32, 1, 219, 44, 'มหาสารคาม', 'Maha Sarakham', '', 3, 0),
(33, 1, 219, 45, 'ร้อยเอ็ด', 'Roi Et', '', 3, 0),
(34, 1, 219, 46, 'กาฬสินธุ์', 'Kalasin', '', 3, 0),
(35, 1, 219, 47, 'สกลนคร', 'Sakon Nakhon', '', 3, 0),
(36, 1, 219, 48, 'นครพนม', 'Nakhon Phanom', '', 3, 0),
(37, 1, 219, 49, 'มุกดาหาร', 'Mukdahan', '', 3, 0),
(38, 1, 219, 50, 'เชียงใหม่', 'Chiang Mai', '', 1, 0),
(39, 1, 219, 51, 'ลำพูน', 'Lamphun', '', 1, 0),
(40, 1, 219, 52, 'ลำปาง', 'Lampang', '', 1, 0),
(41, 1, 219, 53, 'อุตรดิตถ์', 'Uttaradit', '', 1, 0),
(42, 1, 219, 54, 'แพร่', 'Phrae', '', 1, 0),
(43, 1, 219, 55, 'น่าน', 'Nan', '', 1, 0),
(44, 1, 219, 56, 'พะเยา', 'Phayao', '', 1, 0),
(45, 1, 219, 57, 'เชียงราย', 'Chiang Rai', '', 1, 0),
(46, 1, 219, 58, 'แม่ฮ่องสอน', 'Mae Hong Son', '', 1, 0),
(47, 1, 219, 60, 'นครสวรรค์', 'Nakhon Sawan', '', 2, 0),
(48, 1, 219, 61, 'อุทัยธานี', 'Uthai Thani', '', 2, 0),
(49, 1, 219, 62, 'กำแพงเพชร', 'Kamphaeng Phet', '', 2, 0),
(50, 1, 219, 63, 'ตาก', 'Tak', '', 4, 0),
(51, 1, 219, 64, 'สุโขทัย', 'Sukhothai', '', 2, 0),
(52, 1, 219, 65, 'พิษณุโลก', 'Phitsanulok', '', 2, 0),
(53, 1, 219, 66, 'พิจิตร', 'Phichit', '', 2, 0),
(54, 1, 219, 67, 'เพชรบูรณ์', 'Phetchabun', '', 2, 0),
(55, 1, 219, 70, 'ราชบุรี', 'Ratchaburi', '', 4, 0),
(56, 1, 219, 71, 'กาญจนบุรี', 'Kanchanaburi', '', 4, 0),
(57, 1, 219, 72, 'สุพรรณบุรี', 'Suphan Buri', '', 2, 0),
(58, 1, 219, 73, 'นครปฐม', 'Nakhon Pathom', '', 2, 0),
(59, 1, 219, 74, 'สมุทรสาคร', 'Samut Sakhon', '', 2, 0),
(60, 1, 219, 75, 'สมุทรสงคราม', 'Samut Songkhram', '', 2, 0),
(61, 1, 219, 76, 'เพชรบุรี', 'Phetchaburi', '', 4, 0),
(62, 1, 219, 77, 'ประจวบคีรีขันธ์', 'Prachuap Khiri Khan', '', 4, 0),
(63, 1, 219, 80, 'นครศรีธรรมราช', 'Nakhon Si Thammarat', '', 6, 0),
(64, 1, 219, 81, 'กระบี่', 'Krabi', '', 6, 0),
(65, 1, 219, 82, 'พังงา', 'Phangnga', '', 6, 0),
(66, 1, 219, 83, 'ภูเก็ต', 'Phuket', 'ee266753723ef57e28ca08e312b7620e.jpeg', 6, 0),
(67, 1, 219, 84, 'สุราษฎร์ธานี', 'Surat Thani', '', 6, 0),
(68, 1, 219, 85, 'ระนอง', 'Ranong', '', 6, 0),
(69, 1, 219, 86, 'ชุมพร', 'Chumphon', '', 6, 0),
(70, 1, 219, 90, 'สงขลา', 'Songkhla', '', 6, 0),
(71, 1, 219, 91, 'สตูล', 'Satun', '', 6, 0),
(72, 1, 219, 92, 'ตรัง', 'Trang', '', 6, 0),
(73, 1, 219, 93, 'พัทลุง', 'Phatthalung', '', 6, 0),
(74, 1, 219, 94, 'ปัตตานี', 'Pattani', '', 6, 0),
(75, 1, 219, 95, 'ยะลา', 'Yala', '', 6, 0),
(76, 1, 219, 96, 'นราธิวาส', 'Narathiwat', '', 6, 0),
(77, 1, 219, 97, 'บึงกาฬ', 'Buogkan', '', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `quotations`
--

CREATE TABLE `quotations` (
  `id` int(11) NOT NULL,
  `quo_no` int(11) NOT NULL,
  `quo_full` varchar(100) NOT NULL,
  `title` int(11) NOT NULL COMMENT '1:Q, 2:IN',
  `name` varchar(200) NOT NULL,
  `date_quo` date NOT NULL,
  `seller` varchar(150) NOT NULL,
  `cus_name` varchar(150) NOT NULL,
  `bank_id` int(11) NOT NULL COMMENT 'bank_account',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quotations`
--

INSERT INTO `quotations` (`id`, `quo_no`, `quo_full`, `title`, `name`, `date_quo`, `seller`, `cus_name`, `bank_id`, `created_at`, `updated_at`) VALUES
(3, 3, 'QT-0000003', 1, 'Name A', '2025-11-14', 'ฟาอัล', 'น้องชวนชมคนอุดร', 0, '2025-11-14 14:35:00', '2025-11-14 14:35:00');

-- --------------------------------------------------------

--
-- Table structure for table `quotation_detail`
--

CREATE TABLE `quotation_detail` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `detail` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `qty` int(11) NOT NULL,
  `cost` double(9,2) NOT NULL,
  `discount` double(9,2) NOT NULL,
  `quotation_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quotation_detail`
--

INSERT INTO `quotation_detail` (`id`, `name`, `detail`, `qty`, `cost`, `discount`, `quotation_id`, `created_at`) VALUES
(3, 'Similan one day trip', '', 1, 2000.00, 0.00, 3, '2025-11-14 14:35:00');

-- --------------------------------------------------------

--
-- Table structure for table `receipts`
--

CREATE TABLE `receipts` (
  `id` int(11) NOT NULL,
  `rec_no` int(11) NOT NULL,
  `rec_full` varchar(150) NOT NULL,
  `rec_date` date NOT NULL,
  `price` double(9,2) NOT NULL,
  `cheque_no` int(11) NOT NULL,
  `cheque_date` date NOT NULL,
  `file` text NOT NULL,
  `note` text NOT NULL,
  `bank_account_id` int(11) NOT NULL,
  `bank_cheque_id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `receipts_by` int(11) NOT NULL COMMENT 'user id',
  `is_approved` int(11) NOT NULL,
  `is_deleted` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `receipts`
--

INSERT INTO `receipts` (`id`, `rec_no`, `rec_full`, `rec_date`, `price`, `cheque_no`, `cheque_date`, `file`, `note`, `bank_account_id`, `bank_cheque_id`, `invoice_id`, `payment_id`, `receipts_by`, `is_approved`, `is_deleted`, `created_at`, `updated_at`) VALUES
(5, 2, 'REC-0000002', '2026-02-21', 0.00, 0, '0000-00-00', '', '', 1, 0, 3, 4, 1, 1, 0, '2026-02-21 11:06:09', '2026-02-21 11:06:09'),
(6, 3, 'REC-0000003', '2026-02-23', 0.00, 0, '0000-00-00', '', '', 1, 0, 4, 4, 1, 1, 0, '2026-02-23 13:37:01', '2026-02-23 13:37:01');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `is_approved` int(11) NOT NULL DEFAULT 0,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `is_approved`, `is_deleted`, `created_at`) VALUES
(1, 'Super-Admin', 1, 0, '2021-05-24 07:11:09'),
(2, 'Admin', 1, 0, '2021-05-24 07:11:29'),
(3, 'Agent', 1, 0, '2022-11-17 04:45:32'),
(4, 'User', 1, 0, '2022-11-23 10:43:50');

-- --------------------------------------------------------

--
-- Table structure for table `time_zone`
--

CREATE TABLE `time_zone` (
  `id` int(11) NOT NULL,
  `start_pickup` time NOT NULL,
  `end_pickup` time NOT NULL,
  `zone_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `time_zone`
--

INSERT INTO `time_zone` (`id`, `start_pickup`, `end_pickup`, `zone_id`, `product_id`, `updated_at`) VALUES
(1, '06:00:00', '06:30:00', 1, 1, '2025-11-11 14:48:51'),
(2, '07:15:00', '07:30:00', 2, 1, '2025-11-11 14:48:51'),
(3, '07:45:00', '08:00:00', 3, 1, '2025-11-11 14:48:51'),
(4, '09:00:00', '09:15:00', 4, 1, '2025-11-11 14:48:51'),
(5, '06:00:00', '06:30:00', 1, 2, '2025-11-13 13:20:29'),
(6, '12:00:00', '12:15:00', 2, 2, '2025-11-13 13:20:29'),
(7, '06:00:00', '06:30:00', 1, 3, '2025-11-19 14:34:19'),
(8, '04:34:00', '06:54:00', 2, 3, '2025-11-19 14:34:19'),
(9, '05:46:00', '07:56:00', 3, 3, '2025-11-19 14:34:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telephone` varchar(50) NOT NULL,
  `type` int(11) NOT NULL COMMENT '1 : admin\r\n2 : agent',
  `address` text NOT NULL,
  `contact_person` text NOT NULL,
  `note` text NOT NULL,
  `photo` varchar(100) NOT NULL,
  `department_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT 0,
  `companie_id` int(11) NOT NULL,
  `is_approved` int(11) NOT NULL DEFAULT 0,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `telephone`, `type`, `address`, `contact_person`, `note`, `photo`, `department_id`, `role_id`, `companie_id`, `is_approved`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'Shambhala', 'TMS', 'go@shambhala.travel', '0875694107', 1, '', '', '', '', 0, 1, 0, 1, 0, '2021-05-24 06:51:58', '2025-11-13 12:02:21');

-- --------------------------------------------------------

--
-- Table structure for table `vat_type`
--

CREATE TABLE `vat_type` (
  `id` int(11) NOT NULL,
  `name` varchar(120) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vat_type`
--

INSERT INTO `vat_type` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'รวมภาษี 7%', '2022-06-16 07:51:10', '2022-06-16 07:51:10'),
(2, 'แยกภาษี 7%', '2022-06-16 07:51:10', '2022-06-16 07:51:10');

-- --------------------------------------------------------

--
-- Table structure for table `zones`
--

CREATE TABLE `zones` (
  `id` int(11) NOT NULL,
  `provinces` int(11) NOT NULL,
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

INSERT INTO `zones` (`id`, `provinces`, `name`, `name_th`, `color_hex`, `start_pickup`, `end_pickup`, `pickup`, `dropoff`, `is_approved`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 66, 'Panwa Cape', 'พันวา', '#D1FAE5', '05:30:00', '05:30:00', 1, 1, 1, 0, '2024-09-02 08:36:56', '2024-09-02 08:36:56'),
(2, 66, 'Rawai Beach', 'หาดราไวย์', '#D1FAE5', '05:30:00', '05:30:00', 1, 1, 1, 0, '2024-09-02 08:37:45', '2024-09-02 08:37:45'),
(3, 66, 'Kata, Karon Beach', 'หาดกะตะ, กะรน', '#D1FAE5', '05:45:00', '06:00:00', 1, 1, 1, 0, '2024-09-02 08:38:34', '2024-09-02 08:38:34'),
(4, 66, 'Koh Sire', 'เกาะสิเหร่', '#FEF3C7', '05:30:00', '05:45:00', 1, 1, 1, 0, '2024-09-02 08:39:23', '2024-09-02 08:39:23'),
(5, 66, 'Phuket town', 'เมืองภูเก็ต', '#FEF3C7', '06:00:00', '06:15:00', 1, 1, 1, 0, '2024-09-02 08:39:52', '2024-09-02 08:39:52'),
(6, 66, 'Patong Beach', 'หาดป่าตอง', '#EDE9FE', '06:00:00', '06:15:00', 1, 1, 1, 0, '2024-09-02 08:40:23', '2024-09-02 08:40:23'),
(7, 66, 'Kamala Beach', 'หาดกมลา', '#EDE9FE', '06:00:00', '06:15:00', 1, 1, 1, 0, '2024-09-02 08:41:14', '2024-09-02 08:41:14'),
(8, 66, 'Bang tao Beach, Surin Beach', 'หาดบางเทา, หาดสุรินทร์', '#EDE9FE', '06:15:00', '06:30:00', 1, 1, 1, 0, '2024-09-02 08:42:07', '2024-10-08 09:26:01'),
(9, 66, 'Nai Thon, Nai yang, Phuket Airport', 'ในทอน, ในยาง, สนามบิน', '#EDE9FE', '06:30:00', '06:45:00', 1, 1, 1, 0, '2024-09-02 08:45:25', '2024-10-19 08:17:53'),
(10, 66, 'Mai Khao Beach', 'หาดไม้ขาว', '#DBEAFE', '07:00:00', '07:15:00', 1, 1, 1, 0, '2024-09-02 08:45:54', '2024-09-02 08:45:54'),
(11, 66, 'Klok Kloy Beach', '', '#DBEAFE', '07:15:00', '07:30:00', 1, 1, 1, 0, '2024-09-02 08:46:57', '2024-09-02 08:46:57'),
(12, 65, 'Nam khem pier', 'ท่าเรือน้ำเค็ม', '#DBEAFE', '06:45:00', '07:00:00', 1, 1, 1, 0, '2024-09-02 08:49:12', '2024-09-02 08:49:12'),
(13, 65, 'Bang Sak Beach', 'หาดบางสัก', '#DBEAFE', '07:00:00', '07:15:00', 1, 1, 1, 0, '2024-09-02 08:49:37', '2024-09-02 08:49:37'),
(14, 65, 'Pakarang, Pakweeb Beach', 'แหลมปะการัง, หาดปากวีป', '#FCE7F3', '07:00:00', '07:15:00', 1, 1, 1, 0, '2024-09-02 08:50:27', '2024-09-02 08:50:27'),
(15, 65, 'Khuk-Khak Beach', 'หาดคึกคัก', '#FCE7F3', '07:15:00', '07:30:00', 1, 1, 1, 0, '2024-09-02 08:51:03', '2024-09-02 08:51:03'),
(16, 65, 'Bang nieang Beach', 'หาดบางเนียง', '#FCE7F3', '07:30:00', '07:45:00', 1, 1, 1, 0, '2024-09-02 08:51:43', '2024-09-02 08:51:43'),
(17, 65, 'Nang Thong Beach', 'หาดนางทอง', '#DBEAFE', '07:45:00', '08:00:00', 1, 1, 1, 0, '2024-09-02 08:52:26', '2024-09-02 08:52:26'),
(18, 65, 'Merlin Beach, Lam kan, Thaplamu', 'ทับละมุ', '#FCE7F3', '08:00:00', '08:15:00', 1, 1, 1, 0, '2024-09-02 08:54:25', '2024-09-02 08:54:25'),
(19, 64, 'Krabi town', 'เมืองกระบี่', '#FCE7F3', '05:45:00', '06:00:00', 1, 1, 1, 0, '2024-09-18 02:40:39', '2025-03-01 14:32:56'),
(20, 64, 'Ao-nang Beach', 'หาดอ่าวนาง', '#FCE7F3', '05:30:00', '05:45:00', 1, 1, 1, 0, '2024-09-18 02:41:17', '2024-09-18 02:41:17'),
(21, 64, 'Klong-moung', 'หาดคลองม่วง', '#FCE7F3', '05:30:00', '05:45:00', 1, 1, 1, 0, '2024-09-18 02:42:08', '2024-09-18 02:42:08'),
(22, 66, 'Chalong ', 'ฉลอง', '#FCE7F3', '05:45:00', '06:00:00', 1, 1, 1, 0, '2024-10-09 03:03:15', '2024-10-09 03:03:15'),
(23, 66, ' Koh Keaw', 'เกาะแก้ว', '#FCE7F3', '06:15:00', '06:30:00', 1, 1, 1, 0, '2024-10-12 11:50:41', '2024-10-15 13:26:05'),
(24, 66, 'Ao Por', 'อ่าวปอ', '#FCE7F3', '06:00:00', '06:00:00', 1, 1, 1, 0, '2024-10-14 01:42:56', '2024-10-14 01:42:56'),
(25, 66, 'Kathu', 'กระทู้', '#FEE2E2', '06:15:00', '06:30:00', 1, 1, 1, 0, '2024-10-15 06:18:16', '2024-10-15 06:18:16'),
(26, 66, 'Nai Harn', 'ในหาน', '#FEE2E2', '05:30:00', '00:00:00', 1, 1, 1, 0, '2024-10-15 14:14:15', '2024-10-15 14:14:15'),
(27, 66, 'Lame Hin', 'แหลมหิน', '#FEE2E2', '06:15:00', '06:30:00', 1, 1, 1, 0, '2024-10-17 07:32:47', '2024-10-17 07:37:07'),
(28, 66, 'Ao Yon', 'อ่าวยน', '#FEE2E2', '05:30:00', '00:00:00', 1, 1, 1, 0, '2024-10-19 14:08:23', '2024-10-19 14:08:23'),
(29, 66, 'Natai', 'นาใต้', '#D1FAE5', '07:15:00', '07:30:00', 1, 1, 1, 0, '2024-11-04 10:23:20', '2024-11-04 10:23:20'),
(30, 66, 'Thalang', 'ถลาง', '#FFEDD5', '06:30:00', '06:45:00', 1, 1, 1, 0, '2024-11-12 09:28:17', '2024-11-12 09:28:17'),
(31, 65, 'Phang Nga Town', 'เมืองพังงา', '#FFEDD5', '00:00:00', '00:00:00', 1, 1, 1, 0, '2024-11-27 09:13:42', '2024-11-27 09:13:42'),
(32, 66, 'Pa Klok', 'ป่าคลอก', '#FFEDD5', '06:00:00', '06:15:00', 1, 1, 1, 0, '2024-12-12 11:23:38', '2024-12-12 11:23:38'),
(33, 65, 'Khaosok', 'เขาสก', '#FFEDD5', '06:00:00', '06:15:00', 1, 1, 1, 0, '2024-12-17 11:12:24', '2024-12-17 11:12:24'),
(34, 64, 'Ao-Nam Mao', '', '#CFFAFE', '05:30:00', '05:45:00', 1, 1, 1, 0, '2024-12-31 09:38:54', '2024-12-31 09:38:54'),
(35, 65, 'Mueang Phang Nga ', 'เมืองพังงา', '#CFFAFE', '06:15:00', '06:30:00', 1, 1, 1, 0, '2025-01-10 07:55:27', '2025-01-10 07:59:47'),
(36, 66, 'Khok Kloi', 'โคกกลอย', '#CFFAFE', '07:15:00', '07:30:00', 1, 1, 1, 0, '2025-01-16 07:18:33', '2025-01-16 07:18:38'),
(37, 66, 'Laemsai pier', 'ท่าเรือแหลมทราย', '#CFFAFE', '06:00:00', '06:15:00', 1, 1, 1, 0, '2025-01-23 07:27:34', '2025-01-23 07:27:34'),
(38, 66, 'Thai Mueang ', 'ท้ายเหมือง', '#CFFAFE', '07:15:00', '07:30:00', 1, 1, 1, 0, '2025-01-27 11:28:12', '2025-01-27 11:28:18'),
(39, 0, 'Si Sunthon', 'Si Sunthon', '#CFFAFE', '00:00:00', '00:00:00', 0, 0, 1, 0, '2026-03-27 23:15:21', '2026-03-27 23:15:21'),
(40, 0, 'Wichit', 'Wichit', '#CCFBF1', '00:00:00', '00:00:00', 0, 0, 1, 0, '2026-04-08 11:56:03', '2026-04-08 11:56:03'),
(41, 0, 'Amphur Muang', 'Amphur Muang', '#CCFBF1', '00:00:00', '00:00:00', 0, 0, 1, 0, '2026-04-08 11:58:37', '2026-04-08 11:58:37'),
(42, 0, 'ราไวย์', 'ราไวย์', '#CCFBF1', '00:00:00', '00:00:00', 0, 0, 1, 0, '2026-04-08 12:00:20', '2026-04-08 12:00:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_account`
--
ALTER TABLE `bank_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `boats`
--
ALTER TABLE `boats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `boats_type`
--
ALTER TABLE `boats_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings_chrage`
--
ALTER TABLE `bookings_chrage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings_discount`
--
ALTER TABLE `bookings_discount`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings_no`
--
ALTER TABLE `bookings_no`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_extra_charge`
--
ALTER TABLE `booking_extra_charge`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_manage_boat`
--
ALTER TABLE `booking_manage_boat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_manage_transfer`
--
ALTER TABLE `booking_manage_transfer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_paid`
--
ALTER TABLE `booking_paid`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_payment`
--
ALTER TABLE `booking_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_products`
--
ALTER TABLE `booking_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_product_rates`
--
ALTER TABLE `booking_product_rates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_status`
--
ALTER TABLE `booking_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_transfer`
--
ALTER TABLE `booking_transfer`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `booking_transfer` ADD FULLTEXT KEY `hotel_pickup` (`hotel_pickup`);

--
-- Indexes for table `booking_type`
--
ALTER TABLE `booking_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `captains`
--
ALTER TABLE `captains`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cars_category`
--
ALTER TABLE `cars_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cars_type`
--
ALTER TABLE `cars_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `check_in`
--
ALTER TABLE `check_in`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies_type`
--
ALTER TABLE `companies_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_market`
--
ALTER TABLE `company_market`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_offices`
--
ALTER TABLE `company_offices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_rate`
--
ALTER TABLE `company_rate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `confirm_agent`
--
ALTER TABLE `confirm_agent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crews`
--
ALTER TABLE `crews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currencys`
--
ALTER TABLE `currencys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `customers` ADD FULLTEXT KEY `name` (`name`);
ALTER TABLE `customers` ADD FULLTEXT KEY `name_2` (`name`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drivers_assistant`
--
ALTER TABLE `drivers_assistant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dropoff_transfers`
--
ALTER TABLE `dropoff_transfers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `extra_charges`
--
ALTER TABLE `extra_charges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guides`
--
ALTER TABLE `guides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guide_language`
--
ALTER TABLE `guide_language`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_bookings`
--
ALTER TABLE `invoice_bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_booking`
--
ALTER TABLE `log_booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manage_boat`
--
ALTER TABLE `manage_boat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manage_transfer`
--
ALTER TABLE `manage_transfer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nationalitys`
--
ALTER TABLE `nationalitys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `overnight_boat`
--
ALTER TABLE `overnight_boat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `overnight_transfers`
--
ALTER TABLE `overnight_transfers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `park`
--
ALTER TABLE `park`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments_type`
--
ALTER TABLE `payments_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_type`
--
ALTER TABLE `products_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_periods`
--
ALTER TABLE `product_periods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_rates`
--
ALTER TABLE `product_rates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quotations`
--
ALTER TABLE `quotations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quotation_detail`
--
ALTER TABLE `quotation_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receipts`
--
ALTER TABLE `receipts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `time_zone`
--
ALTER TABLE `time_zone`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vat_type`
--
ALTER TABLE `vat_type`
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
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `bank_account`
--
ALTER TABLE `bank_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `boats`
--
ALTER TABLE `boats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `boats_type`
--
ALTER TABLE `boats_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `bookings_chrage`
--
ALTER TABLE `bookings_chrage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bookings_discount`
--
ALTER TABLE `bookings_discount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `bookings_no`
--
ALTER TABLE `bookings_no`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `booking_extra_charge`
--
ALTER TABLE `booking_extra_charge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `booking_manage_boat`
--
ALTER TABLE `booking_manage_boat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `booking_manage_transfer`
--
ALTER TABLE `booking_manage_transfer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `booking_paid`
--
ALTER TABLE `booking_paid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `booking_payment`
--
ALTER TABLE `booking_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `booking_products`
--
ALTER TABLE `booking_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `booking_product_rates`
--
ALTER TABLE `booking_product_rates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `booking_status`
--
ALTER TABLE `booking_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `booking_transfer`
--
ALTER TABLE `booking_transfer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `booking_type`
--
ALTER TABLE `booking_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `captains`
--
ALTER TABLE `captains`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cars_category`
--
ALTER TABLE `cars_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cars_type`
--
ALTER TABLE `cars_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `check_in`
--
ALTER TABLE `check_in`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `companies_type`
--
ALTER TABLE `companies_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `company_market`
--
ALTER TABLE `company_market`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `company_offices`
--
ALTER TABLE `company_offices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `company_rate`
--
ALTER TABLE `company_rate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `confirm_agent`
--
ALTER TABLE `confirm_agent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251;

--
-- AUTO_INCREMENT for table `crews`
--
ALTER TABLE `crews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `currencys`
--
ALTER TABLE `currencys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `drivers_assistant`
--
ALTER TABLE `drivers_assistant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dropoff_transfers`
--
ALTER TABLE `dropoff_transfers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `extra_charges`
--
ALTER TABLE `extra_charges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `guides`
--
ALTER TABLE `guides`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `guide_language`
--
ALTER TABLE `guide_language`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `hotel`
--
ALTER TABLE `hotel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `invoice_bookings`
--
ALTER TABLE `invoice_bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `log_booking`
--
ALTER TABLE `log_booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `manage_boat`
--
ALTER TABLE `manage_boat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `manage_transfer`
--
ALTER TABLE `manage_transfer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `nationalitys`
--
ALTER TABLE `nationalitys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=243;

--
-- AUTO_INCREMENT for table `overnight_boat`
--
ALTER TABLE `overnight_boat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `overnight_transfers`
--
ALTER TABLE `overnight_transfers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `park`
--
ALTER TABLE `park`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payments_type`
--
ALTER TABLE `payments_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `permission_role`
--
ALTER TABLE `permission_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permission_user`
--
ALTER TABLE `permission_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products_type`
--
ALTER TABLE `products_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product_periods`
--
ALTER TABLE `product_periods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product_rates`
--
ALTER TABLE `product_rates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `quotations`
--
ALTER TABLE `quotations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `quotation_detail`
--
ALTER TABLE `quotation_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `receipts`
--
ALTER TABLE `receipts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `time_zone`
--
ALTER TABLE `time_zone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vat_type`
--
ALTER TABLE `vat_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `zones`
--
ALTER TABLE `zones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
