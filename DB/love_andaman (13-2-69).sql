-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 13, 2026 at 12:21 PM
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
(1, '2025-11-13', '15:39:13', '990016/525', 1, 0.00, 'คุณยักษ์', 1, 1, 1, 1, 0, '2025-11-13 15:40:45', '2025-12-17 23:32:06'),
(2, '2025-11-13', '22:58:48', '4565', 1, 0.00, 'test', 1, 1, 1, 1, 0, '2025-11-13 22:59:21', '2025-11-13 23:20:18'),
(3, '2025-11-13', '23:03:53', '990344', 1, 0.00, 'คุณยักษ์', 1, 1, 1, 1, 0, '2025-11-13 23:04:39', '2025-11-13 23:04:39'),
(4, '2025-11-14', '12:34:40', '6876', 1, 3000.00, 'KunU', 1, 1, 1, 1, 0, '2025-11-14 12:38:41', '2025-11-14 13:36:13'),
(5, '2025-11-14', '12:53:39', '675', 1, 0.00, 'Kun V', 1, 1, 1, 1, 0, '2025-11-14 12:54:37', '2025-11-14 12:55:24'),
(6, '2025-11-14', '13:30:31', '686789', 1, 0.00, 'test', 1, 1, 1, 1, 0, '2025-11-14 13:31:30', '2025-11-14 13:31:30'),
(7, '2025-11-16', '09:43:13', '2352', 1, 0.00, 'KunU', 1, 2, 1, 1, 0, '2025-11-16 09:43:40', '2025-11-16 09:44:11'),
(8, '2025-11-16', '09:53:46', '6558', 1, 0.00, 'Kun V', 1, 1, 1, 1, 0, '2025-11-16 09:55:37', '2025-11-16 09:55:37'),
(9, '2025-11-16', '10:00:19', '5ll5345', 1, 0.00, 'Kun V', 1, 1, 1, 1, 0, '2025-11-16 10:01:07', '2025-11-16 10:01:07'),
(10, '2025-11-16', '10:01:08', 'h555643', 1, 0.00, 'Kun T', 1, 1, 1, 1, 0, '2025-11-16 10:01:42', '2025-11-16 10:01:54'),
(11, '2025-11-16', '10:23:45', 'h666', 1, 0.00, '345', 1, 2, 1, 1, 0, '2025-11-16 10:24:36', '2026-01-09 15:44:42'),
(12, '2025-11-19', '14:37:48', '5451', 1, 0.00, 'คุณยักษ์', 1, 3, 1, 1, 0, '2025-11-19 14:58:32', '2025-11-19 14:58:32'),
(13, '2025-11-19', '14:58:33', '45543', 1, 200.00, 'คุณยักษ์', 1, 2, 1, 1, 0, '2025-11-19 15:17:42', '2025-11-19 15:17:42'),
(14, '2025-11-19', '15:17:43', 'T884-59', 1, 300.00, 'KunU', 1, 4, 1, 1, 0, '2025-11-19 15:18:38', '2025-11-19 15:18:38'),
(15, '2025-11-19', '15:19:14', '99/9206', 1, 0.00, 'Kun V', 1, 1, 1, 1, 0, '2025-11-19 15:20:39', '2025-11-19 15:20:39'),
(16, '2025-11-19', '15:20:40', '54323', 1, 0.00, 'Kun C', 1, 3, 1, 1, 0, '2025-11-19 15:21:53', '2026-02-11 12:00:45'),
(17, '2025-11-19', '15:21:54', '545/676', 1, 0.00, 'คุณยักษ์', 1, 2, 1, 1, 0, '2025-11-19 15:23:41', '2025-11-19 15:23:41'),
(18, '2025-11-20', '09:45:35', '886/43', 1, 0.00, 'KunU', 1, 2, 1, 1, 0, '2025-11-20 09:46:23', '2026-02-03 14:44:23'),
(19, '2025-12-12', '13:17:33', '2334/88', 1, 500.00, 'คุณยักษ์', 1, 4, 1, 1, 0, '2025-12-12 13:22:38', '2025-12-12 13:22:38'),
(20, '2025-12-12', '13:35:07', '132/66', 1, 500.00, 'คุณยักษ์', 1, 2, 1, 1, 0, '2025-12-12 13:36:16', '2025-12-12 13:36:16'),
(21, '2025-12-12', '13:35:07', '132/66', 1, 500.00, 'คุณยักษ์', 1, 2, 1, 1, 0, '2025-12-12 13:38:18', '2026-01-26 11:22:28'),
(22, '2025-12-12', '13:45:55', '4242/88', 1, 500.00, 'Kun T', 1, 2, 1, 1, 0, '2025-12-12 13:47:16', '2025-12-23 10:24:25');

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
(1, 1, 2, 0, 18, '2026-02-03 14:44:23', '2026-01-29 12:24:27'),
(2, 1, 0, 0, 16, '2026-02-03 13:44:52', '2026-02-03 13:44:45');

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
(9, 'Cancel With Chrage 50% 1 pax', 3000.00, 16, '2026-02-11 12:00:45');

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
(22, '2025-12-12', 2025, 68, 12, 4, 'BO68120004', 22, '2025-12-12 13:47:16');

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
(1, '', 2, 1, 1, 1, 200.00, 100.00, 60.00, 4999.00, 11, 1, 2, 1, 0, '2026-01-09 15:43:27', '2026-01-11 01:02:40'),
(2, '', 0, 0, 0, 2, 0.00, 0.00, 0.00, 3000.00, 10, 1, 2, 1, 0, '2026-01-11 00:57:57', '2026-01-11 01:03:06'),
(3, '', 3, 0, 0, 0, 1000.00, 0.00, 0.00, 0.00, 5, 1, 1, 1, 0, '2026-01-11 14:50:07', '2026-01-11 14:50:07'),
(4, '', 3, 0, 0, 0, 1000.00, 0.00, 0.00, 0.00, 7, 1, 1, 1, 0, '2026-01-11 14:50:17', '2026-01-11 14:50:17'),
(5, '', 0, 0, 0, 1, 0.00, 0.00, 0.00, 2000.00, 21, 1, 2, 1, 0, '2026-01-11 15:52:54', '2026-01-26 11:22:28'),
(6, '', 2, 1, 0, 0, 300.00, 100.00, 0.00, 0.00, 16, 1, 1, 1, 0, '2026-02-11 12:00:45', '2026-02-11 12:00:45');

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

--
-- Dumping data for table `booking_manage_boat`
--

INSERT INTO `booking_manage_boat` (`id`, `status`, `arrange`, `booking_id`, `manage_id`, `created_at`) VALUES
(11, 1, 0, 16, 3, '2025-12-24 12:23:51'),
(12, 1, 0, 21, 3, '2025-12-24 12:23:51'),
(13, 1, 0, 13, 3, '2025-12-24 12:23:51'),
(14, 1, 0, 2, 3, '2025-12-24 12:23:51'),
(15, 1, 0, 14, 4, '2025-12-24 12:24:18'),
(16, 2, 0, 11, 5, '2025-12-24 12:25:53'),
(17, 1, 0, 8, 5, '2025-12-24 12:25:53'),
(18, 1, 0, 5, 5, '2025-12-24 12:25:53'),
(19, 1, 0, 6, 5, '2025-12-24 12:25:53'),
(20, 1, 0, 4, 5, '2025-12-24 12:25:53'),
(21, 1, 0, 3, 6, '2025-12-24 12:26:20'),
(22, 3, 0, 10, 6, '2025-12-24 12:26:20'),
(23, 1, 0, 7, 6, '2025-12-24 12:26:20'),
(24, 1, 0, 9, 6, '2025-12-24 12:26:20'),
(25, 1, 0, 15, 6, '2025-12-24 12:26:20'),
(26, 1, 0, 22, 1, '2026-02-04 13:12:38'),
(27, 1, 0, 17, 1, '2026-02-04 13:12:38'),
(28, 1, 0, 18, 1, '2026-02-04 13:12:38');

-- --------------------------------------------------------

--
-- Table structure for table `booking_manage_transfer`
--

CREATE TABLE `booking_manage_transfer` (
  `id` int(11) NOT NULL,
  `arrange` int(11) NOT NULL,
  `adult` int(11) NOT NULL,
  `child` int(11) NOT NULL,
  `infant` int(11) NOT NULL,
  `foc` int(11) NOT NULL,
  `manage_id` int(11) NOT NULL,
  `booking_transfer_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `booking_manage_transfer`
--

INSERT INTO `booking_manage_transfer` (`id`, `arrange`, `adult`, `child`, `infant`, `foc`, `manage_id`, `booking_transfer_id`, `created_at`) VALUES
(6, 1, 3, 0, 0, 0, 1, 11, '2025-12-18 10:44:38'),
(7, 2, 2, 0, 0, 0, 3, 7, '2025-12-18 10:44:38'),
(8, 1, 2, 0, 0, 0, 3, 3, '2025-12-18 10:46:57'),
(9, 2, 1, 0, 0, 0, 1, 10, '2025-12-18 10:46:57'),
(10, 1, 2, 1, 0, 1, 2, 14, '2025-12-18 10:47:12'),
(11, 2, 3, 0, 0, 0, 2, 19, '2025-12-18 10:47:12'),
(17, 3, 2, 0, 0, 0, 5, 13, '2025-12-20 10:50:39'),
(18, 2, 2, 0, 0, 0, 5, 20, '2025-12-20 10:50:39'),
(19, 1, 2, 0, 0, 0, 5, 9, '2025-12-20 10:50:39'),
(20, 0, 16, 0, 0, 0, 1, 4, '2026-01-19 14:03:53'),
(21, 3, 2, 0, 0, 0, 2, 17, '2026-02-05 13:18:35'),
(22, 4, 9, 1, 2, 1, 2, 18, '2026-02-05 13:18:35'),
(23, 5, 3, 3, 0, 0, 2, 12, '2026-02-05 13:18:51');

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
(4, 10000.00, 1, 4, 4, 1, '2025-11-14 13:36:13', '2025-11-14 12:38:41'),
(5, 0.00, 1, 2, 5, 1, '2025-11-14 12:54:37', '2025-11-14 12:54:37'),
(6, 0.00, 1, 2, 6, 1, '2025-11-14 13:31:30', '2025-11-14 13:31:30'),
(7, 0.00, 1, 6, 4, 1, '2025-11-14 14:40:32', '2025-11-14 14:40:32'),
(8, 0.00, 1, 6, 5, 1, '2025-11-14 14:40:32', '2025-11-14 14:40:32'),
(9, 0.00, 1, 2, 7, 1, '2025-11-16 09:43:40', '2025-11-16 09:43:40'),
(10, 1500.00, 3, 4, 8, 1, '2025-11-16 09:55:37', '2025-11-16 09:55:37'),
(11, 0.00, 1, 2, 9, 1, '2025-11-16 10:01:07', '2025-11-16 10:01:07'),
(12, 0.00, 1, 2, 10, 1, '2025-11-16 10:01:42', '2025-11-16 10:01:42'),
(13, 0.00, 1, 2, 11, 1, '2025-11-16 10:24:36', '2025-11-16 10:24:36'),
(14, 0.00, 1, 2, 12, 1, '2025-11-19 14:58:32', '2025-11-19 14:58:32'),
(15, 1000.00, 1, 4, 13, 1, '2025-11-19 15:17:42', '2025-11-19 15:17:42'),
(16, 0.00, 1, 2, 14, 1, '2025-11-19 15:18:38', '2025-11-19 15:18:38'),
(17, 0.00, 1, 2, 15, 1, '2025-11-19 15:20:39', '2025-11-19 15:20:39'),
(18, 1500.00, 1, 4, 16, 1, '2026-02-11 12:00:45', '2025-11-19 15:21:53'),
(19, 0.00, 1, 2, 17, 1, '2025-11-19 15:23:41', '2025-11-19 15:23:41'),
(20, 0.00, 1, 2, 18, 1, '2025-11-20 09:46:23', '2025-11-20 09:46:23'),
(21, 1000.00, 2, 4, 22, 1, '2025-12-23 10:24:25', '2025-12-12 13:47:16'),
(22, 400.00, 1, 4, 21, 1, '2026-01-26 11:22:28', '2026-01-26 11:22:28'),
(23, 0.00, 1, 6, 12, 1, '2026-02-12 10:53:03', '2026-02-12 10:53:03'),
(24, 0.00, 1, 6, 16, 1, '2026-02-12 10:53:03', '2026-02-12 10:53:03'),
(25, 0.00, 1, 6, 12, 1, '2026-02-12 12:20:24', '2026-02-12 12:20:24'),
(26, 0.00, 1, 6, 16, 1, '2026-02-12 12:20:24', '2026-02-12 12:20:24');

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
(1, '2025-12-11', '2025-12-12', '', 1, 1, 1, 0, '2025-11-13 15:40:45', '2025-12-17 23:32:06'),
(2, '2025-12-12', '0000-00-00', '', 2, 2, 1, 0, '2025-11-13 22:59:21', '2025-11-13 23:20:18'),
(3, '2025-12-12', '0000-00-00', '', 3, 1, 1, 0, '2025-11-13 23:04:39', '2025-11-13 23:04:39'),
(4, '2025-12-12', '0000-00-00', '', 4, 1, 1, 0, '2025-11-14 12:38:41', '2025-11-14 13:36:13'),
(5, '2025-12-12', '0000-00-00', '', 5, 1, 1, 0, '2025-11-14 12:54:37', '2025-11-14 12:55:24'),
(6, '2025-12-12', '0000-00-00', '', 6, 1, 1, 0, '2025-11-14 13:31:30', '2025-11-14 13:31:30'),
(7, '2025-12-12', '0000-00-00', '', 7, 1, 1, 0, '2025-11-16 09:43:40', '2025-11-16 09:44:11'),
(8, '2025-12-12', '2025-12-13', '', 8, 1, 1, 0, '2025-11-16 09:55:37', '2025-11-16 09:55:37'),
(9, '2025-12-12', '0000-00-00', '', 9, 2, 1, 0, '2025-11-16 10:01:07', '2025-11-16 10:01:07'),
(10, '2025-12-12', '2025-12-13', '', 10, 1, 1, 0, '2025-11-16 10:01:42', '2025-11-16 10:01:54'),
(11, '2025-12-12', '0000-00-00', 'Program (Tour Detail)\r\nTest', 11, 1, 1, 0, '2025-11-16 10:24:36', '2026-01-09 15:44:42'),
(12, '2025-12-12', '0000-00-00', '', 12, 3, 1, 0, '2025-11-19 14:58:32', '2025-11-19 14:58:32'),
(13, '2025-12-12', '0000-00-00', '', 13, 2, 1, 0, '2025-11-19 15:17:42', '2025-11-19 15:17:42'),
(14, '2025-12-12', '0000-00-00', '', 14, 3, 1, 0, '2025-11-19 15:18:38', '2025-11-19 15:18:38'),
(15, '2025-12-12', '0000-00-00', '', 15, 4, 1, 0, '2025-11-19 15:20:39', '2025-11-19 15:20:39'),
(16, '2025-12-12', '2025-12-13', '', 16, 2, 1, 0, '2025-11-19 15:21:53', '2026-02-11 12:00:45'),
(17, '2025-12-12', '2025-12-13', '', 17, 3, 1, 0, '2025-11-19 15:23:41', '2025-11-19 15:23:41'),
(18, '2025-12-12', '2025-12-13', '', 18, 3, 1, 0, '2025-11-20 09:46:23', '2026-02-03 14:44:23'),
(19, '2025-12-12', '0000-00-00', 'Test', 21, 2, 1, 0, '2025-12-12 13:38:18', '2026-01-26 11:22:28'),
(20, '2025-12-12', '0000-00-00', 'test', 22, 3, 1, 0, '2025-12-12 13:47:16', '2025-12-23 10:24:25');

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
(1, 2, 0, 0, 0, 2900.00, 2000.00, 100.00, 0.00, 1, 1, 2, '2025-11-13 15:40:45', '2025-12-17 23:32:06'),
(2, 2, 0, 0, 0, 3000.00, 0.00, 0.00, 0.00, 3, 2, 0, '2025-11-13 22:59:21', '2025-11-13 23:20:18'),
(3, 2, 0, 0, 0, 2900.00, 2000.00, 100.00, 0.00, 1, 3, 2, '2025-11-13 23:04:39', '2025-11-13 23:04:39'),
(4, 10, 0, 0, 0, 3300.00, 2300.00, 600.00, 0.00, 2, 4, 1, '2025-11-14 12:38:41', '2025-11-14 13:36:13'),
(5, 6, 0, 0, 0, 2900.00, 2000.00, 100.00, 0.00, 1, 4, 2, '2025-11-14 12:38:41', '2025-11-14 13:36:13'),
(6, 2, 2, 1, 0, 3300.00, 2300.00, 600.00, 0.00, 2, 5, 1, '2025-11-14 12:54:37', '2025-11-14 12:55:24'),
(7, 3, 1, 1, 0, 2900.00, 2000.00, 100.00, 0.00, 1, 5, 2, '2025-11-14 12:54:37', '2025-11-14 12:55:24'),
(8, 2, 1, 0, 0, 2900.00, 2000.00, 100.00, 0.00, 1, 6, 2, '2025-11-14 13:31:30', '2025-11-14 13:31:30'),
(9, 2, 0, 0, 0, 3000.00, 0.00, 0.00, 0.00, 2, 7, 0, '2025-11-16 09:43:40', '2025-11-16 09:44:11'),
(10, 3, 1, 0, 0, 2900.00, 2000.00, 100.00, 0.00, 1, 8, 2, '2025-11-16 09:55:37', '2025-11-16 09:55:37'),
(11, 2, 0, 0, 0, 1000.00, 0.00, 0.00, 0.00, 3, 9, 0, '2025-11-16 10:01:07', '2025-11-16 10:01:07'),
(12, 1, 0, 0, 0, 2900.00, 2000.00, 100.00, 0.00, 1, 10, 2, '2025-11-16 10:01:42', '2025-11-16 10:01:54'),
(13, 3, 0, 0, 0, 2333.00, 0.00, 0.00, 0.00, 1, 11, 0, '2025-11-16 10:24:36', '2026-01-09 15:44:42'),
(14, 2, 1, 0, 0, 2000.00, 500.00, 0.00, 0.00, 5, 12, 0, '2025-11-19 14:58:32', '2025-11-19 14:58:32'),
(15, 1, 2, 0, 0, 1200.00, 300.00, 0.00, 0.00, 4, 12, 0, '2025-11-19 14:58:32', '2025-11-19 14:58:32'),
(16, 2, 0, 0, 0, 3200.00, 0.00, 0.00, 0.00, 3, 13, 0, '2025-11-19 15:17:42', '2025-11-19 15:17:42'),
(17, 2, 1, 0, 1, 1400.00, 500.00, 0.00, 0.00, 4, 14, 0, '2025-11-19 15:18:38', '2025-11-19 15:18:38'),
(18, 2, 1, 0, 1, 2300.00, 400.00, 0.00, 0.00, 7, 15, 0, '2025-11-19 15:20:39', '2025-11-19 15:20:39'),
(19, 2, 0, 0, 0, 3000.00, 0.00, 0.00, 0.00, 3, 16, 0, '2025-11-19 15:21:53', '2026-02-11 12:00:45'),
(20, 3, 0, 0, 0, 2500.00, 0.00, 0.00, 0.00, 4, 17, 0, '2025-11-19 15:23:41', '2025-11-19 15:23:41'),
(21, 4, 2, 1, 1, 1699.00, 299.00, 199.00, 0.00, 5, 18, 0, '2025-11-20 09:46:23', '2026-02-03 14:44:23'),
(22, 2, 0, 0, 0, 3000.00, 0.00, 0.00, 0.00, 3, 19, 0, '2025-12-12 13:38:18', '2026-01-26 11:22:28'),
(23, 2, 0, 0, 0, 1000.00, 0.00, 0.00, 0.00, 5, 20, 0, '2025-12-12 13:47:16', '2025-12-23 10:24:25'),
(24, 1, 0, 0, 0, 500.00, 0.00, 0.00, 0.00, 4, 20, 0, '2025-12-12 13:47:16', '2025-12-23 10:24:25'),
(25, 6, 1, 1, 0, 3000.00, 500.00, 199.00, 0.00, 4, 18, 0, '2026-01-26 11:52:38', '2026-02-03 14:44:23');

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
(1, 1, '07:15:00', '07:30:00', 'Hotel Coke', 'Hotel Coke', 'A601', '', 2, 2, 0, 0, 1, 1, 1, '2025-11-13 15:40:45', '2025-12-17 23:32:06'),
(2, 1, '05:06:00', '04:06:00', 'Hotel Coke', 'Hotel Coke', 'A601', '', 13, 13, 0, 0, 1, 1, 2, '2025-11-13 22:59:21', '2025-11-13 23:20:18'),
(3, 1, '00:00:00', '00:00:00', 'Hotel Coke', 'Hotel Coke', 'A601', '', 14, 14, 0, 0, 1, 1, 3, '2025-11-13 23:04:39', '2025-11-13 23:04:39'),
(4, 1, '06:00:00', '06:30:00', 'Hotel Red', 'Hotel Green', 'A601', '', 1, 2, 0, 0, 1, 1, 4, '2025-11-14 12:38:41', '2025-11-14 13:36:13'),
(5, 1, '07:15:00', '07:30:00', 'Hotel Coke', 'Hotel Coke', 'A105', '', 2, 2, 0, 0, 1, 1, 5, '2025-11-14 12:54:37', '2025-11-14 12:55:24'),
(6, 1, '07:45:00', '08:00:00', 'Hotel Coke', 'Hotel Red', 'A108', '', 3, 6, 0, 0, 1, 1, 6, '2025-11-14 13:31:30', '2025-11-14 13:31:30'),
(7, 1, '04:46:00', '06:34:00', 'Hotel Blue', 'Hotel Blue', 'A105', '', 13, 13, 0, 0, 1, 1, 7, '2025-11-16 09:43:40', '2025-11-16 09:44:11'),
(8, 1, '04:55:00', '05:55:00', 'บขส. เก่าภูเก็ต', 'บขส. เก่าภูเก็ต', 'A302', '', 7, 7, 0, 0, 1, 1, 8, '2025-11-16 09:55:37', '2025-11-16 09:55:37'),
(9, 1, '12:00:00', '12:15:00', 'บขส. เก่าภูเก็ต', 'บขส. เก่าภูเก็ต', 'A102', '', 2, 2, 0, 0, 1, 1, 9, '2025-11-16 10:01:07', '2025-11-16 10:01:07'),
(10, 1, '04:52:00', '05:23:00', 'Hotel BBC', 'Hotel BBC', '', '', 14, 14, 0, 0, 1, 1, 10, '2025-11-16 10:01:42', '2025-11-16 10:01:54'),
(11, 2, '04:34:00', '04:56:00', 'Hotel Blue', 'Hotel Blue', '', '', 13, 13, 0, 0, 1, 1, 11, '2025-11-16 10:24:36', '2026-01-09 15:44:42'),
(12, 1, '05:13:00', '06:54:00', 'Hotel Green', 'Hotel Green', 'A601', '', 19, 19, 0, 0, 1, 1, 12, '2025-11-19 14:58:32', '2025-11-19 14:58:32'),
(13, 1, '05:43:00', '05:54:00', 'Hotel Coke', 'Hotel Coke', 'A102', '', 14, 14, 0, 0, 1, 1, 13, '2025-11-19 15:17:42', '2025-11-19 15:17:42'),
(14, 1, '04:34:00', '06:54:00', 'Hotel Red', 'Hotel Green', 'A601', '', 8, 2, 0, 0, 1, 1, 14, '2025-11-19 15:18:38', '2025-11-19 15:18:38'),
(15, 1, '00:00:00', '00:00:00', '', '', '', '', 0, 0, 0, 0, 1, 2, 15, '2025-11-19 15:20:39', '2025-11-19 15:20:39'),
(16, 1, '05:30:00', '06:00:00', 'บขส. เก่าภูเก็ต', 'บขส. เก่าภูเก็ต', 'A108', '', 14, 14, 0, 0, 1, 1, 16, '2025-11-19 15:21:53', '2026-02-11 12:00:45'),
(17, 3, '05:39:00', '06:09:00', 'Hotel Blue', 'Hotel Blue', 'A108', '', 28, 28, 0, 0, 1, 1, 17, '2025-11-19 15:23:41', '2025-11-19 15:23:41'),
(18, 5, '05:46:00', '07:56:00', 'Hotel Red', 'Hotel Red', 'A105', '', 3, 3, 0, 0, 1, 1, 18, '2025-11-20 09:46:23', '2026-02-03 14:44:23'),
(19, 3, '04:34:00', '06:54:00', 'Hotel Red', 'Hotel Red', 'A601', '', 2, 2, 0, 0, 1, 1, 20, '2025-12-12 13:47:16', '2025-12-23 10:24:25'),
(20, 1, '07:00:00', '07:15:00', 'Hotel Green', 'Hotel Green', 'A302', '', 13, 13, 0, 0, 1, 1, 19, '2025-12-12 18:45:43', '2026-01-26 11:22:28');

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
(1, '', 'Sup 2', '', 0, 0, 1, 0, '2025-11-16 15:06:57', '2025-11-16 15:06:57');

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
(5, '99/6477', 'Agent Z', 'Agent Zee', 'z@gmail.com', '0848928872', 'V8QQ+CRJ ตำบล กะทู้ อำเภอกะทู้ ภูเก็ต 83120', 'V8X9+P9P ตำบลป่าตอง อำเภอกะทู้ ภูเก็ต 83120', '', '', '', 2, 0, 0, 1, 0, '2026-02-09 12:19:34', '2026-02-09 12:27:37');

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
(1, 'Name F2', '0000-00-00', '', '084 515 0015', '', 1, 0, '', 1, 3, 182, '2025-11-13 23:04:39', '2025-11-13 23:04:39'),
(2, 'Name F4', '0000-00-00', '', '', '', 1, 0, '', 0, 3, 182, '2025-11-13 23:04:39', '2025-11-13 23:04:39'),
(3, 'Name A1', '1976-12-17', '6546558', '+77789288505', '', 1, 0, '', 0, 2, 182, '2025-11-13 23:09:59', '2025-11-13 23:20:18'),
(5, 'Name F2', '1945-03-12', '4362865576', '2564634', '', 1, 0, '', 0, 2, 182, '2025-11-13 23:18:03', '2025-11-13 23:20:18'),
(6, 'mr.kheradmand', '1994-09-12', '4123412', '089 456 2215', '', 1, 0, '', 0, 1, 182, '2025-11-13 23:21:22', '2025-11-13 23:21:22'),
(7, 'Name A1', '0000-00-00', '', '089 2165542', '', 1, 1, '', 1, 4, 71, '2025-11-14 12:38:41', '2025-11-14 13:36:13'),
(8, 'Name A2', '0000-00-00', '', '', '', 1, 0, '', 0, 4, 71, '2025-11-14 12:38:41', '2025-11-14 13:36:13'),
(9, 'Name A3', '0000-00-00', '', '', '', 1, 0, '', 0, 4, 231, '2025-11-14 12:38:41', '2025-11-14 13:36:13'),
(10, 'Name A4', '0000-00-00', '', '', '', 1, 0, '', 0, 4, 231, '2025-11-14 12:38:41', '2025-11-14 13:36:13'),
(11, 'Name A5', '0000-00-00', '', '', '', 1, 0, '', 0, 4, 92, '2025-11-14 12:38:41', '2025-11-14 13:36:13'),
(12, 'Name A6', '0000-00-00', '', '', '', 1, 0, '', 0, 4, 231, '2025-11-14 12:38:41', '2025-11-14 13:36:13'),
(13, 'Name A7', '0000-00-00', '', '', '', 1, 0, '', 0, 4, 92, '2025-11-14 12:38:41', '2025-11-14 13:36:13'),
(14, 'Name A8', '0000-00-00', '', '', '', 1, 0, '', 0, 4, 71, '2025-11-14 12:38:41', '2025-11-14 13:36:13'),
(15, 'Name A9', '0000-00-00', '', '', '', 1, 0, '', 0, 4, 2, '2025-11-14 12:38:41', '2025-11-14 13:36:13'),
(16, 'Name A10', '0000-00-00', '', '', '', 1, 0, '', 0, 4, 231, '2025-11-14 12:38:41', '2025-11-14 13:36:13'),
(17, 'Name A11', '0000-00-00', '', '', '', 1, 0, '', 0, 4, 182, '2025-11-14 12:38:41', '2025-11-14 13:36:13'),
(18, 'Name A12', '0000-00-00', '', '', '', 1, 0, '', 0, 4, 182, '2025-11-14 12:38:41', '2025-11-14 13:36:13'),
(19, 'Name A13', '0000-00-00', '', '', '', 1, 0, '', 0, 4, 182, '2025-11-14 12:38:41', '2025-11-14 13:36:13'),
(20, 'Name A14', '0000-00-00', '', '', '', 1, 0, '', 0, 4, 182, '2025-11-14 12:38:41', '2025-11-14 13:36:13'),
(21, 'Name A15', '0000-00-00', '', '', '', 1, 0, '', 0, 4, 182, '2025-11-14 12:38:41', '2025-11-14 13:36:13'),
(22, 'Name A16', '0000-00-00', '', '', '', 1, 0, '', 0, 4, 182, '2025-11-14 12:38:41', '2025-11-14 13:36:13'),
(23, 'Name F1', '0000-00-00', '', '089 456 2215', '', 1, 1, '', 1, 5, 101, '2025-11-14 12:54:37', '2025-11-14 12:55:24'),
(24, 'Name F2', '0000-00-00', '', '', '', 1, 0, '', 0, 5, 101, '2025-11-14 12:54:37', '2025-11-14 12:55:24'),
(25, 'Name F3', '0000-00-00', '', '', '', 1, 0, '', 0, 5, 101, '2025-11-14 12:54:37', '2025-11-14 12:55:24'),
(26, 'Name T7', '0000-00-00', '', '089 456 2215', '', 1, 0, '', 1, 6, 182, '2025-11-14 13:31:30', '2025-11-14 13:31:30'),
(27, 'Name A1', '0000-00-00', '', '089 2165542', '', 1, 1, '', 1, 7, 0, '2025-11-16 09:43:40', '2025-11-16 09:44:11'),
(28, 'Name A2', '0000-00-00', '', '', '', 1, 0, '', 0, 7, 0, '2025-11-16 09:43:40', '2025-11-16 09:44:11'),
(29, 'Name F1', '0000-00-00', '', '089 216 2241', '', 1, 0, '', 1, 8, 182, '2025-11-16 09:55:37', '2025-11-16 09:55:37'),
(30, 'Name F2', '0000-00-00', '', '', '', 1, 0, '', 0, 8, 182, '2025-11-16 09:55:37', '2025-11-16 09:55:37'),
(31, 'Name F3', '0000-00-00', '', '', '', 1, 0, '', 0, 8, 182, '2025-11-16 09:55:37', '2025-11-16 09:55:37'),
(32, 'Name F4', '0000-00-00', '', '', '', 2, 0, '', 0, 8, 182, '2025-11-16 09:55:37', '2025-11-16 09:55:37'),
(33, 'Name A665', '0000-00-00', '', '089 2165542', '', 1, 0, '', 1, 9, 231, '2025-11-16 10:01:07', '2025-11-16 10:01:07'),
(34, 'Name F2544', '0000-00-00', '', '', '', 1, 0, '', 0, 9, 231, '2025-11-16 10:01:07', '2025-11-16 10:01:07'),
(35, 'Name A334', '0000-00-00', '', '089 2165542', '', 1, 1, '', 1, 10, 0, '2025-11-16 10:01:42', '2025-11-16 10:01:54'),
(36, 'Name B1', '0000-00-00', '', '084 515 0015', '', 1, 0, '', 1, 11, 0, '2025-11-16 10:24:36', '2025-11-16 10:24:36'),
(37, 'Name B2', '0000-00-00', '', '', '', 1, 0, '', 0, 11, 0, '2025-11-16 10:24:36', '2025-11-16 10:24:36'),
(38, 'Name A1', '0000-00-00', '', '089 216 2241', '', 1, 0, '', 1, 12, 182, '2025-11-19 14:58:32', '2025-11-19 14:58:32'),
(39, 'Name A2', '0000-00-00', '', '', '', 1, 0, '', 0, 12, 182, '2025-11-19 14:58:32', '2025-11-19 14:58:32'),
(40, 'Name A3', '0000-00-00', '', '', '', 1, 0, '', 0, 12, 39, '2025-11-19 14:58:32', '2025-11-19 14:58:32'),
(41, 'Name A4', '0000-00-00', '', '', '', 2, 0, '', 0, 12, 39, '2025-11-19 14:58:32', '2025-11-19 14:58:32'),
(42, 'Name A5', '0000-00-00', '', '', '', 2, 0, '', 0, 12, 39, '2025-11-19 14:58:32', '2025-11-19 14:58:32'),
(43, 'Name B1', '0000-00-00', '', '089 2165542', '', 1, 0, '', 1, 13, 71, '2025-11-19 15:17:42', '2025-11-19 15:17:42'),
(44, 'Name B2', '0000-00-00', '', '', '', 1, 0, '', 0, 13, 71, '2025-11-19 15:17:42', '2025-11-19 15:17:42'),
(45, 'Name F2', '0000-00-00', '', '089 2165542', '', 1, 0, '', 1, 14, 0, '2025-11-19 15:18:38', '2025-11-19 15:18:38'),
(46, 'Name C1', '0000-00-00', '', '095 154 2306', '', 1, 0, '', 1, 15, 39, '2025-11-19 15:20:39', '2025-11-19 15:20:39'),
(47, 'Name C2', '0000-00-00', '', '', '', 1, 0, '', 0, 15, 39, '2025-11-19 15:20:39', '2025-11-19 15:20:39'),
(48, 'Name D1', '0000-00-00', '', '089 216 2241', '', 0, 1, '', 1, 16, 0, '2025-11-19 15:21:53', '2026-02-11 12:00:45'),
(49, 'Name E1', '0000-00-00', '', '089 216 2241', '', 1, 0, '', 1, 17, 182, '2025-11-19 15:23:41', '2025-11-19 15:23:41'),
(50, 'Name E1', '0000-00-00', '', '089 216 2241', '', 0, 1, '', 1, 18, 0, '2025-11-20 09:46:23', '2026-02-03 14:44:23'),
(51, 'Meetoo', '0000-00-00', '', '089 216 2241', '', 1, 0, '', 1, 22, 0, '2025-12-12 13:47:16', '2025-12-12 13:47:16'),
(52, 'Meedee', '0000-00-00', '', '', '', 1, 0, '', 0, 22, 101, '2025-12-12 13:47:16', '2025-12-12 13:47:16'),
(53, 'Name G8', '0000-00-00', '', '', '', 0, 0, '', 0, 21, 0, '2026-01-26 11:22:01', '2026-01-26 11:22:28');

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
(1, 'VAN 1', '089 216 2241', '30-9510', 0, 1, 0, '2025-11-13 15:41:09', '2025-11-13 15:41:09'),
(2, 'VAN2', '084 515 0015', '31-3744', 13, 1, 0, '2025-11-14 13:09:32', '2025-11-14 13:09:32'),
(3, 'โก้ดำ', '089 216 2241', 'กข 5921 กทม', 12, 1, 0, '2025-11-16 15:06:57', '2025-11-16 15:06:57'),
(4, 'VAN 3', '089 216 2241', '30-9710', 10, 1, 0, '2025-11-20 14:09:07', '2025-11-20 14:09:07');

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
  `manage_id` int(11) NOT NULL,
  `booking_transfer_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dropoff_transfers`
--

INSERT INTO `dropoff_transfers` (`id`, `manage_id`, `booking_transfer_id`, `created_at`) VALUES
(1, 2, 14, '2025-12-17 12:11:37'),
(2, 3, 6, '2025-12-17 23:24:52'),
(3, 3, 4, '2025-12-18 10:21:31');

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

INSERT INTO `hotel` (`id`, `name`, `name_th`, `address`, `telephone`, `email`, `zone_id`, `is_approved`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'WESTIN SIRAY BAY RESORT AND SPA PHUKET เดอะ เวสทิน สิเหร่ เบย์ รีสอร์ท แอนด์ สปา ภูเก็ต', 'WESTIN SIRAY BAY RESORT AND SPA PHUKET เดอะ เวสทิน สิเหร่ เบย์ รีสอร์ท แอนด์ สปา ภูเก็ต', '', '', '', 0, 1, 0, '2023-09-01 04:55:02', '2023-09-01 04:55:02'),
(2, 'The Tide Beachfront  Siray  Phuket เดอะ ไทย์', 'The Tide Beachfront  Siray  Phuket เดอะ ไทย์', '', '', '', 0, 1, 0, '2023-09-01 04:55:02', '2023-09-01 04:55:02'),
(3, 'BOAT LAGOON RESORT โบ๊ทลากูน ภูเก็ต รีสอร์ท', 'BOAT LAGOON RESORT โบ๊ทลากูน ภูเก็ต รีสอร์ท', '', '', '', 0, 1, 0, '2023-09-01 04:55:02', '2023-09-01 04:55:02'),
(4, 'CORAL ISLAND RESORT คอรัล ไอส์แลนด์ รีสอร์ท', 'CORAL ISLAND RESORT คอรัล ไอส์แลนด์ รีสอร์ท', '', '', '', 0, 0, 1, '2023-09-01 04:55:02', '2023-09-22 05:42:16'),
(5, 'METROPOLE HOTEL, PHUKET โรงแรมเมโทรโพลภูเก็ต', 'METROPOLE HOTEL, PHUKET โรงแรมเมโทรโพลภูเก็ต', '', '', '', 0, 0, 1, '2023-09-01 04:55:02', '2023-09-22 05:55:45'),
(6, 'MILLENNIUM AUTO GROUP CO.,LTD. มิลเลนเนียม ออโต้ กรุ๊ป สาขาภูเก็ต', 'MILLENNIUM AUTO GROUP CO.,LTD. มิลเลนเนียม ออโต้ กรุ๊ป สาขาภูเก็ต', '', '', '', 0, 0, 1, '2023-09-01 04:55:02', '2023-09-22 05:58:17'),
(7, 'NOVOTEL PHUKET CITY PHOKEETHRA โรงแรมโนโวเทล ภูเก็ต ซิตี้ โภคีธรา', 'NOVOTEL PHUKET CITY PHOKEETHRA โรงแรมโนโวเทล ภูเก็ต ซิตี้ โภคีธรา', '', '', '', 0, 1, 0, '2023-09-01 04:55:02', '2023-09-01 04:55:02'),
(8, 'THE PAGO DESIGN PHUKETโรงแรม เดอะ พาโก้ ดีไซด์ ภูเก็ต', 'THE PAGO DESIGN PHUKETโรงแรม เดอะ พาโก้ ดีไซด์ ภูเก็ต', '', '', '', 0, 0, 1, '2023-09-01 04:55:02', '2023-09-22 06:47:53'),
(9, 'PEARL HOTEL โรงแรมเพิร์ล', 'PEARL HOTEL โรงแรมเพิร์ล', '', '', '', 0, 1, 0, '2023-09-01 04:55:03', '2023-09-01 04:55:03'),
(10, 'PHUKET MERLIN HOTEL โรงแรม ภูเก็ตเมอร์ลิน', 'PHUKET MERLIN HOTEL โรงแรม ภูเก็ตเมอร์ลิน', '', '', '', 0, 0, 1, '2023-09-01 04:55:03', '2023-09-22 06:07:19'),
(11, 'RAMADA PLAZA CHAO FAH รามาดา พลาซ่า เจ้าฟ้า', 'RAMADA PLAZA CHAO FAH รามาดา พลาซ่า เจ้าฟ้า', '', '', '', 0, 1, 0, '2023-09-01 04:55:03', '2023-09-01 04:55:03'),
(12, 'RECENTA PHUKET SUANLUANG รีเซนต้า ภูเก็ต สวนหลวง', 'RECENTA PHUKET SUANLUANG รีเซนต้า ภูเก็ต สวนหลวง', '', '', '', 0, 1, 0, '2023-09-01 04:55:03', '2023-09-01 04:55:03'),
(13, 'RECENTA STYLE PHUKET TOWN รีเซนต้า สไตล์ ภูเก็ตทาวน์', 'RECENTA STYLE PHUKET TOWN รีเซนต้า สไตล์ ภูเก็ตทาวน์', '', '', '', 0, 1, 0, '2023-09-01 04:55:03', '2023-09-01 04:55:03'),
(14, 'RECENTA SUITE PHUKET SUANLUANG รีเซนต้า สวีท ภูเก็ต สวนหลวง', 'RECENTA SUITE PHUKET SUANLUANG รีเซนต้า สวีท ภูเก็ต สวนหลวง', '', '', '', 0, 1, 0, '2023-09-01 04:55:03', '2023-09-01 04:55:03'),
(15, 'ROYAL PHUKET CITY HOTEL โรงแรมรอยัลภูเก็ตซิตี้', 'ROYAL PHUKET CITY HOTEL โรงแรมรอยัลภูเก็ตซิตี้', '', '', '', 0, 1, 0, '2023-09-01 04:55:03', '2023-09-01 04:55:03'),
(16, 'SEABED GRAND HOTEL PHUKET โรงแรมซีเบด แกรนด์ ภูเก็ต ', 'SEABED GRAND HOTEL PHUKET โรงแรมซีเบด แกรนด์ ภูเก็ต ', '', '', '', 0, 0, 1, '2023-09-01 04:55:03', '2023-09-22 06:18:12'),
(17, 'SINO HOUSE ซิโนเฮาส์', 'SINO HOUSE ซิโนเฮาส์', '', '', '', 0, 0, 1, '2023-09-01 04:55:03', '2023-09-22 06:19:01'),
(18, 'TINT @ PHUKET TOWN เดอะ ทินท์ แอท ภูเก็ตทาวน์', 'TINT @ PHUKET TOWN เดอะ ทินท์ แอท ภูเก็ตทาวน์', '', '', '', 0, 1, 0, '2023-09-01 04:55:03', '2023-09-01 04:55:03'),
(19, 'VILLAGE COCONUT ISLAND เดอะ วิลเลจ โคโคนัท ไอส์แลนด์', 'VILLAGE COCONUT ISLAND เดอะ วิลเลจ โคโคนัท ไอส์แลนด์', '', '', '', 0, 0, 1, '2023-09-01 04:55:03', '2023-09-22 07:51:53'),
(20, 'WEB CONNECTION CO.,LTD. เว็บ คอนเน็คชั่น จำกัด', 'WEB CONNECTION CO.,LTD. เว็บ คอนเน็คชั่น จำกัด', '', '', '', 0, 0, 1, '2023-09-01 04:55:03', '2023-09-22 07:50:58'),
(21, '99 OLDTOWN BOUTIQUE GUESTHOUSE 99 โอลด์ทาวน์ บูติค เกสต์เฮ้าส์', '99 OLDTOWN BOUTIQUE GUESTHOUSE 99 โอลด์ทาวน์ บูติค เกสต์เฮ้าส์', '', '', '', 0, 1, 0, '2023-09-01 04:55:03', '2023-09-01 04:55:03'),
(22, 'Ang Pao Hotel อั่งเปา โฮเทล', 'Ang Pao Hotel อั่งเปา โฮเทล', '', '', '', 0, 0, 1, '2023-09-01 04:55:03', '2023-09-22 05:25:27'),
(23, 'Bhukitta Boutique Hotel บูกิตตา บูทีค โฮเทล', 'Bhukitta Boutique Hotel บูกิตตา บูทีค โฮเทล', '', '', '', 0, 1, 0, '2023-09-01 04:55:03', '2023-09-01 04:55:03'),
(24, 'Bloo Hostel Phuket บลู โฮสเทล ภูเก็ต', 'Bloo Hostel Phuket บลู โฮสเทล ภูเก็ต', '', '', '', 0, 1, 0, '2023-09-01 04:55:03', '2023-09-01 04:55:03'),
(25, 'Blu Monkey Bed & Breakfast บลู มังกี้ เบด แอนด์ เบรคฟาสต์ ภูเก็ต', 'Blu Monkey Bed & Breakfast บลู มังกี้ เบด แอนด์ เบรคฟาสต์ ภูเก็ต', '', '', '', 0, 1, 0, '2023-09-01 04:55:03', '2023-09-01 04:55:03'),
(26, 'Blu Monkey Boutique Phuket Town บลูมังกี้ บูทิก ภูเก็ตทาวน์', 'Blu Monkey Boutique Phuket Town บลูมังกี้ บูทิก ภูเก็ตทาวน์', '', '', '', 0, 1, 0, '2023-09-01 04:55:03', '2023-09-01 04:55:03'),
(27, 'Blu Monkey Hub & Hotel Phuket บลูมังกี้ ฮับ แอนด์ โฮเทล ภูเก็ต', 'Blu Monkey Hub & Hotel Phuket บลูมังกี้ ฮับ แอนด์ โฮเทล ภูเก็ต', '', '', '', 0, 1, 0, '2023-09-01 04:55:03', '2023-09-01 04:55:03'),
(28, 'BOAT LAGOON RESORT โบ๊ทลากูน ภูเก็ต รีสอร์ท', 'BOAT LAGOON RESORT โบ๊ทลากูน ภูเก็ต รีสอร์ท', '', '', '', 0, 0, 1, '2023-09-01 04:55:03', '2023-09-22 05:34:02'),
(29, 'Book a Bed Poshtel บุ๊ค อะ เบด พอช เทล', 'Book a Bed Poshtel บุ๊ค อะ เบด พอช เทล', '', '', '', 0, 1, 0, '2023-09-01 04:55:03', '2023-09-01 04:55:03'),
(30, 'CA Hotel and Residence ซีเอ โฮเทล แอนด์ เรสซิเดนซ์ ', 'CA Hotel and Residence ซีเอ โฮเทล แอนด์ เรสซิเดนซ์ ', '', '', '', 0, 1, 0, '2023-09-01 04:55:03', '2023-09-01 04:55:03'),
(31, 'Casa blanca Boutique hotel คาซาบลังกา บูติก โฮเต็ล', 'Casa blanca Boutique hotel คาซาบลังกา บูติก โฮเต็ล', '', '', '', 0, 1, 0, '2023-09-01 04:55:03', '2023-09-01 04:55:03'),
(32, 'Chino Town at Yaowarat Phuket ชิโนทาวน์ แอท เยาวราช ภูเก็ต', 'Chino Town at Yaowarat Phuket ชิโนทาวน์ แอท เยาวราช ภูเก็ต', '', '', '', 0, 1, 0, '2023-09-01 04:55:04', '2023-09-01 04:55:04'),
(33, 'Chino Town Gallery Alley ชิโนทาวน์ แกลเลอรี แอลลีย์', 'Chino Town Gallery Alley ชิโนทาวน์ แกลเลอรี แอลลีย์', '', '', '', 0, 1, 0, '2023-09-01 04:55:04', '2023-09-01 04:55:04'),
(34, 'CHINOTEL โรงแรม ชิโนเทล', 'CHINOTEL โรงแรม ชิโนเทล', '', '', '', 0, 1, 0, '2023-09-01 04:55:04', '2023-09-01 04:55:04'),
(35, 'Courtyard by Marriott Phuket Town คอร์ทยาร์ด แมริออท ภูเก็ต ทาวน์', 'Courtyard by Marriott Phuket Town คอร์ทยาร์ด แมริออท ภูเก็ต ทาวน์', '', '', '', 0, 1, 0, '2023-09-01 04:55:04', '2023-09-01 04:55:04'),
(36, 'Ecoloft Hotel อีโคลอฟต์ โฮเต็ล', 'Ecoloft Hotel อีโคลอฟต์ โฮเต็ล', '', '', '', 0, 1, 0, '2023-09-01 04:55:04', '2023-09-01 04:55:04'),
(37, 'FULFILL HOSTEL ฟูลฟิล ภูเก็ต โฮสเทล', 'FULFILL HOSTEL ฟูลฟิล ภูเก็ต โฮสเทล', '', '', '', 0, 1, 0, '2023-09-01 04:55:04', '2023-09-01 04:55:04'),
(38, 'Grand Supicha City Hotel โรงแรมแกรนด์ สุพิชฌาย์ ซิตี้ ', 'Grand Supicha City Hotel โรงแรมแกรนด์ สุพิชฌาย์ ซิตี้ ', '', '', '', 0, 1, 0, '2023-09-01 04:55:04', '2023-09-01 04:55:04'),
(39, 'Greenleaf Hostel กรีน ลีฟ โฮสเทล ', 'Greenleaf Hostel กรีน ลีฟ โฮสเทล ', '', '', '', 0, 1, 0, '2023-09-01 04:55:04', '2023-09-01 04:55:04'),
(40, 'I Pavilion Hotel Phuket โรงแรมไอ พาวิลเลี่ยน ภูเก็ต', 'I Pavilion Hotel Phuket โรงแรมไอ พาวิลเลี่ยน ภูเก็ต', '', '', '', 0, 1, 0, '2023-09-01 04:55:04', '2023-09-01 04:55:04'),
(41, 'ibis Styles Phuket City ไอบิส สไตล์ ภูเก็ต ซีตี้', 'ibis Styles Phuket City ไอบิส สไตล์ ภูเก็ต ซีตี้', '', '', '', 0, 1, 0, '2023-09-01 04:55:04', '2023-09-01 04:55:04'),
(42, 'Ideo Phuket Hotel โรงแรมไอดีโอ ภูเก็ต', 'Ideo Phuket Hotel โรงแรมไอดีโอ ภูเก็ต', '', '', '', 0, 1, 0, '2023-09-01 04:55:04', '2023-09-01 04:55:04'),
(43, 'lamoon resotel โรงแรมลามูนรีโซเทล', 'lamoon resotel โรงแรมลามูนรีโซเทล', '', '', '', 0, 1, 0, '2023-09-01 04:55:04', '2023-09-01 04:55:04'),
(44, 'Lub Sbuy House Hotel โรงแรม หลับสบายเฮ้าส์ โฮเทล', 'Lub Sbuy House Hotel โรงแรม หลับสบายเฮ้าส์ โฮเทล', '', '', '', 0, 1, 0, '2023-09-01 04:55:04', '2023-09-01 04:55:04'),
(45, 'Mayfa Hotel โรงแรมเมธ์ฟ้า', 'Mayfa Hotel โรงแรมเมธ์ฟ้า', '', '', '', 0, 0, 1, '2023-09-01 04:55:04', '2023-09-22 05:57:47'),
(46, 'MEI ZHOU PHUKET HOTEL โรงแรมเหม่ยโจว ภูเก็ต ', 'MEI ZHOU PHUKET HOTEL โรงแรมเหม่ยโจว ภูเก็ต ', '', '', '', 0, 1, 0, '2023-09-01 04:55:04', '2023-09-01 04:55:04'),
(47, 'Modern Thai Suites Hotel โมเดิร์นไทย สวีท', 'Modern Thai Suites Hotel โมเดิร์นไทย สวีท', '', '', '', 0, 1, 0, '2023-09-01 04:55:04', '2023-09-01 04:55:04'),
(48, 'My stays phuket มายสเตย์ ภูเก็ต ', 'My stays phuket มายสเตย์ ภูเก็ต ', '', '', '', 0, 1, 0, '2023-09-01 04:55:04', '2023-09-01 04:55:04'),
(49, 'Phuketa Hotel โรงแรมภูคีตา ', 'Phuketa Hotel โรงแรมภูคีตา ', '', '', '', 0, 1, 0, '2023-09-01 04:55:04', '2023-09-01 04:55:04'),
(50, 'PRIME TOWN POSH & PORT HOTEL PHUKET ไพรม์ ทาวน์ - พอร์ช แอนด์ พอร์ต โฮเต็ล ภูเก็ต ', 'PRIME TOWN POSH & PORT HOTEL PHUKET ไพรม์ ทาวน์ - พอร์ช แอนด์ พอร์ต โฮเต็ล ภูเก็ต ', '', '', '', 0, 1, 0, '2023-09-01 04:55:04', '2023-09-01 04:55:04'),
(51, 'Ratana Hotel Rassada โรงแรมรัตนา รัษฎา ', 'Ratana Hotel Rassada โรงแรมรัตนา รัษฎา ', '', '', '', 0, 1, 0, '2023-09-01 04:55:04', '2023-09-01 04:55:04'),
(52, 'Ratana Hotel Sakdidet โรงแรมรัตนา ศักดิเดช', 'Ratana Hotel Sakdidet โรงแรมรัตนา ศักดิเดช', '', '', '', 0, 1, 0, '2023-09-01 04:55:04', '2023-09-01 04:55:04'),
(53, 'Rome Place Hotel โรงแรมโรมเพลส ภูเก็ต', 'Rome Place Hotel โรงแรมโรมเพลส ภูเก็ต', '', '', '', 0, 0, 1, '2023-09-01 04:55:04', '2023-09-22 06:16:49'),
(54, 'Seabed Grand Hotel Phuket ซีเบด แกรนด์ โฮเทล ภูเก็ต', 'Seabed Grand Hotel Phuket ซีเบด แกรนด์ โฮเทล ภูเก็ต', '', '', '', 0, 1, 0, '2023-09-01 04:55:04', '2023-09-01 04:55:04'),
(55, 'Sino House Phuket โรงแรมชิโนเฮ้าส์ ', 'Sino House Phuket โรงแรมชิโนเฮ้าส์ ', '', '', '', 0, 1, 0, '2023-09-01 04:55:05', '2023-09-01 04:55:05'),
(56, 'Sino Imperial Phuket  Hotel ชิโน อิมพีเรียล ภูเก็ต โฮเทล', 'Sino Imperial Phuket  Hotel ชิโน อิมพีเรียล ภูเก็ต โฮเทล', '', '', '', 0, 1, 0, '2023-09-01 04:55:05', '2023-09-01 04:55:05'),
(57, 'Sino Inn Phuket Hotel โรงแรมชิโน อินน์', 'Sino Inn Phuket Hotel โรงแรมชิโน อินน์', '', '', '', 0, 1, 0, '2023-09-01 04:55:05', '2023-09-01 04:55:05'),
(58, 'Sleep Sheep Phuket สลีปชีป ภูเก็ต โฮสเทล', 'Sleep Sheep Phuket สลีปชีป ภูเก็ต โฮสเทล', '', '', '', 0, 1, 0, '2023-09-01 04:55:05', '2023-09-01 04:55:05'),
(59, 'Sound Gallery House ซาวด์ แกลเลอรี เฮาส์ ', 'Sound Gallery House ซาวด์ แกลเลอรี เฮาส์ ', '', '', '', 0, 0, 1, '2023-09-01 04:55:05', '2023-09-22 06:19:37'),
(60, 'SP Mansion Hotel โรงแรม เอสพี แมนชั่น', 'SP Mansion Hotel โรงแรม เอสพี แมนชั่น', '', '', '', 0, 1, 0, '2023-09-01 04:55:05', '2023-09-01 04:55:05'),
(61, 'Supicha pool access hotel สุพิชฌาย์ พูล แอคเซส โฮเต็ล ', 'Supicha pool access hotel สุพิชฌาย์ พูล แอคเซส โฮเต็ล ', '', '', '', 0, 1, 0, '2023-09-01 04:55:05', '2023-09-01 04:55:05'),
(62, 'The Arbern Hotel x Bistro ดิ อาร์เบิร์น โฮเทล x บิสโทร', 'The Arbern Hotel x Bistro ดิ อาร์เบิร์น โฮเทล x บิสโทร', '', '', '', 0, 1, 0, '2023-09-01 04:55:05', '2023-09-01 04:55:05'),
(63, 'The Besavana Phuket Hotel เดอะ บีสวาน่า ภูเก็ต ', 'The Besavana Phuket Hotel เดอะ บีสวาน่า ภูเก็ต ', '', '', '', 0, 1, 0, '2023-09-01 04:55:05', '2023-09-01 04:55:05'),
(64, 'The Blanket Hotel เดอะ แบล็งเก็ต โฮเต็ล ', 'The Blanket Hotel เดอะ แบล็งเก็ต โฮเต็ล ', '', '', '', 0, 1, 0, '2023-09-01 04:55:05', '2023-09-01 04:55:05'),
(65, 'The Malika Hotel โรงแรมเดอะ มาลิกา ', 'The Malika Hotel โรงแรมเดอะ มาลิกา ', '', '', '', 0, 1, 0, '2023-09-01 04:55:05', '2023-09-01 04:55:05'),
(66, 'The Memory At On On Hotel โรงแรมเดอะเมมโมรี แอท ออนออน ', 'The Memory At On On Hotel โรงแรมเดอะเมมโมรี แอท ออนออน ', '', '', '', 0, 1, 0, '2023-09-01 04:55:05', '2023-09-01 04:55:05'),
(67, 'The Pago Design Hotel โรงแรม เดอะ พาโก้ ดีไซด์ ภูเก็ต', 'The Pago Design Hotel โรงแรม เดอะ พาโก้ ดีไซด์ ภูเก็ต', '', '', '', 0, 1, 0, '2023-09-01 04:55:05', '2023-09-01 04:55:05'),
(68, 'The Topaz Residence เดอะ โทแพ็ส เรสซิเดนซ์', 'The Topaz Residence เดอะ โทแพ็ส เรสซิเดนซ์', '', '', '', 0, 1, 0, '2023-09-01 04:55:05', '2023-09-01 04:55:05'),
(69, 'VAPA HOTEL วาปา โฮเทล', 'VAPA HOTEL วาปา โฮเทล', '', '', '', 0, 1, 0, '2023-09-01 04:55:05', '2023-09-01 04:55:05'),
(70, 'Xinlor House ซินหล่อ เฮ้า', 'Xinlor House ซินหล่อ เฮ้า', '', '', '', 0, 1, 0, '2023-09-01 04:55:05', '2023-09-01 04:55:05'),
(71, 'ARECA RESORT & SPA อาริกา รีสอร์ต แอนด์ สปา', 'ARECA RESORT & SPA อาริกา รีสอร์ต แอนด์ สปา', '', '', '', 0, 1, 0, '2023-09-01 04:55:05', '2023-09-01 04:55:05'),
(72, 'PRINCE OF SONGKLA UNIVERSITY, PHUKET CAMPUS มหาวิทยาลัยสงขลานครินทร์ วิทยาเขตภูเก็ต', 'PRINCE OF SONGKLA UNIVERSITY, PHUKET CAMPUS มหาวิทยาลัยสงขลานครินทร์ วิทยาเขตภูเก็ต', '', '', '', 0, 1, 0, '2023-09-01 04:55:05', '2023-09-01 04:55:05'),
(73, 'The Palms Residence เดอะ ปาล์ม เรสซิเดนซ์ ', 'The Palms Residence เดอะ ปาล์ม เรสซิเดนซ์ ', '', '', '', 0, 1, 0, '2023-09-01 04:55:05', '2023-09-01 04:55:05'),
(74, 'The Par Phuket โรงแรมเดอะพาร์ ภูเก็ต', 'The Par Phuket โรงแรมเดอะพาร์ ภูเก็ต', '', '', '', 0, 1, 0, '2023-09-01 04:55:05', '2023-09-01 04:55:05'),
(75, 'THE RACHA เดอะ ราชา', 'THE RACHA เดอะ ราชา', '', '', '', 0, 0, 1, '2023-09-01 04:55:05', '2023-09-22 06:48:30'),
(76, 'Anchan Boutique Hotel อัญชัน บูติค โฮเทล', 'Anchan Boutique Hotel อัญชัน บูติค โฮเทล', '', '', '', 0, 1, 0, '2023-09-01 04:55:06', '2023-09-01 04:55:06'),
(77, 'Aochalong Villa Resort & Spa อ่าวฉลอง วิลล่า รีสอร์ท แอนด์ วิลล่า', 'Aochalong Villa Resort & Spa อ่าวฉลอง วิลล่า รีสอร์ท แอนด์ วิลล่า', '', '', '', 0, 1, 0, '2023-09-01 04:55:06', '2023-09-01 04:55:06'),
(78, 'Arch39 Beachfront Phuket อาร์ค39 ภูเก็ต บีชฟรอนต์ ภูเก็ต', 'Arch39 Beachfront Phuket อาร์ค39 ภูเก็ต บีชฟรอนต์ ภูเก็ต', '', '', '', 0, 1, 0, '2023-09-01 04:55:06', '2023-09-01 04:55:06'),
(79, 'Baba House Hotel โรงแรมบาบ๋าเฮ้าส์', 'Baba House Hotel โรงแรมบาบ๋าเฮ้าส์', '', '', '', 0, 1, 0, '2023-09-01 04:55:06', '2023-09-01 04:55:06'),
(80, 'COCO VILLE PHUKET RESORT โคโค่วิลล์ ภูเก็ต รีสอร์ท ', 'COCO VILLE PHUKET RESORT โคโค่วิลล์ ภูเก็ต รีสอร์ท ', '', '', '', 0, 0, 1, '2023-09-01 04:55:06', '2023-09-22 05:41:43'),
(81, 'Phuket Marine Poshtel ภูเก็ต มารีน พอชเทล', 'Phuket Marine Poshtel ภูเก็ต มารีน พอชเทล', '', '', '', 0, 0, 1, '2023-09-01 04:55:06', '2023-09-22 06:05:57'),
(82, 'The Blue Hotel โรงแรมเดอะ บลู ', 'The Blue Hotel โรงแรมเดอะ บลู ', '', '', '', 0, 1, 0, '2023-09-01 04:55:06', '2023-09-01 04:55:06'),
(83, 'THE ELYSIUM RESIDENCE ดิ เอลิเซียม เรสซิเดนซ์', 'THE ELYSIUM RESIDENCE ดิ เอลิเซียม เรสซิเดนซ์', '', '', '', 0, 0, 1, '2023-09-01 04:55:06', '2023-09-22 06:22:52'),
(84, 'The Lake Chalong Resort Phuket เดอะ เลค ฉลอง รีสอร์ท', 'The Lake Chalong Resort Phuket เดอะ เลค ฉลอง รีสอร์ท', '', '', '', 0, 1, 0, '2023-09-01 04:55:06', '2023-09-01 04:55:06'),
(85, 'The Racha เดอะราชา', 'The Racha เดอะราชา', '', '', '', 0, 0, 1, '2023-09-01 04:55:06', '2023-09-22 06:49:08'),
(86, 'The Thames Pool Access Resort   เดอะ เทมส์ พูลแอคเซส รีสอร์ท', 'The Thames Pool Access Resort   เดอะ เทมส์ พูลแอคเซส รีสอร์ท', '', '', '', 0, 0, 1, '2023-09-01 04:55:06', '2023-09-22 06:56:32'),
(87, 'Villa Zolitude Resort & Spa  วิลล่า โซนิจูด', 'Villa Zolitude Resort & Spa  วิลล่า โซนิจูด', '', '', '', 0, 1, 0, '2023-09-01 04:55:06', '2023-09-01 04:55:06'),
(88, 'Vipa House - Phuket  วิภา เฮ้า', 'Vipa House - Phuket  วิภา เฮ้า', '', '', '', 0, 0, 1, '2023-09-01 04:55:06', '2023-09-22 07:02:35'),
(89, 'Wanawalai Luxury Villa วนาวลัย ลักซ์ชัวรี วิลล่า', 'Wanawalai Luxury Villa วนาวลัย ลักซ์ชัวรี วิลล่า', '', '', '', 0, 0, 1, '2023-09-01 04:55:06', '2023-09-22 07:51:32'),
(90, 'MISSION HILLS PHUKET GOLF RESORT มิชชั่น ฮิลล์ ภูเก็ต กอล์ฟ รีสอร์ท', 'MISSION HILLS PHUKET GOLF RESORT มิชชั่น ฮิลล์ ภูเก็ต กอล์ฟ รีสอร์ท', '', '', '', 0, 0, 1, '2023-09-01 04:55:06', '2023-09-22 05:55:21'),
(91, 'NAKA ISLAND นาคา ไอส์แลนด์ ', 'NAKA ISLAND นาคา ไอส์แลนด์ ', '', '', '', 0, 0, 1, '2023-09-01 04:55:06', '2023-09-22 05:59:33'),
(92, 'SUPALAI SCENIC BAY RESORT & SPA ศุภาลัย ซีนิค เบย์ รีสอร์ท แอนด์ สปา', 'SUPALAI SCENIC BAY RESORT & SPA ศุภาลัย ซีนิค เบย์ รีสอร์ท แอนด์ สปา', '', '', '', 0, 0, 1, '2023-09-01 04:55:06', '2023-09-22 06:21:29'),
(93, 'THANYAPURA RETREAT ธัญญปุระ รีเทรด', 'THANYAPURA RETREAT ธัญญปุระ รีเทรด', '', '', '', 0, 1, 0, '2023-09-01 04:55:06', '2023-09-01 04:55:06'),
(94, 'THANYAPURA SPORTS HOTEL ธัญญปุระ สปอร์ต', 'THANYAPURA SPORTS HOTEL ธัญญปุระ สปอร์ต', '', '', '', 0, 1, 0, '2023-09-01 04:55:06', '2023-09-01 04:55:06'),
(95, '8IK88 RESORT 8IK88 รีสอร์ท', '8IK88 RESORT 8IK88 รีสอร์ท', '', '', '', 0, 0, 1, '2023-09-01 04:55:06', '2023-09-22 05:24:19'),
(96, 'Boutique Resort บูติค รีสอร์ท', 'Boutique Resort บูติค รีสอร์ท', '', '', '', 0, 0, 1, '2023-09-01 04:55:06', '2023-09-22 05:36:05'),
(97, 'CASADA SUITTE Pool Villas คาซาดา สวีท พูลวิลลา', 'CASADA SUITTE Pool Villas คาซาดา สวีท พูลวิลลา', '', '', '', 0, 0, 1, '2023-09-01 04:55:06', '2023-09-22 05:40:07'),
(98, 'Chandara Resort & Spa จันทร์ดารา รีสอร์ท แอนด์ สปา ', 'Chandara Resort & Spa จันทร์ดารา รีสอร์ท แอนด์ สปา ', '', '', '', 0, 0, 1, '2023-09-01 04:55:07', '2023-09-22 05:41:12'),
(99, 'COMO Point Yamu โคโม พอยท์ ยามู', 'COMO Point Yamu โคโม พอยท์ ยามู', '', '', '', 0, 1, 0, '2023-09-01 04:55:07', '2023-09-01 04:55:07'),
(100, 'Gold chariot โกลด์ ชาริออท', 'Gold chariot โกลด์ ชาริออท', '', '', '', 0, 0, 1, '2023-09-01 04:55:07', '2023-09-22 05:44:32'),
(101, 'Hanuman V.I.P Hostel หนุมาน วีไอพี โฮสเทล ', 'Hanuman V.I.P Hostel หนุมาน วีไอพี โฮสเทล ', '', '', '', 0, 0, 1, '2023-09-01 04:55:07', '2023-09-22 05:46:06'),
(102, 'Poolrada Boutique Hotel พูลรดา บูทีค โฮเทล ', 'Poolrada Boutique Hotel พูลรดา บูทีค โฮเทล ', '', '', '', 0, 0, 1, '2023-09-01 04:55:07', '2023-09-22 06:07:50'),
(103, 'Rattana Residence Thalang รัตนา เรสซิเดนซ์ ถลาง', 'Rattana Residence Thalang รัตนา เรสซิเดนซ์ ถลาง', '', '', '', 0, 0, 1, '2023-09-01 04:55:07', '2023-09-22 06:09:32'),
(104, 'Supalai Scenic Bay Resort And Spa ศุภาลัย ซีนิค เบย์ รีสอร์ท แอนด์ สปา ', 'Supalai Scenic Bay Resort And Spa ศุภาลัย ซีนิค เบย์ รีสอร์ท แอนด์ สปา ', '', '', '', 0, 1, 0, '2023-09-01 04:55:07', '2023-09-01 04:55:07'),
(105, 'Thanyapura Sports and Health Resort ธัญญปุระ สปอร์ต แอนด์ เฮลท์ รีสอร์ท ', 'Thanyapura Sports and Health Resort ธัญญปุระ สปอร์ต แอนด์ เฮลท์ รีสอร์ท ', '', '', '', 0, 1, 0, '2023-09-01 04:55:07', '2023-09-01 04:55:07'),
(106, 'The Naka Island, A Luxury Collection Resort & Spa, Phuket เดอะ นาคา ไอส์แลนด์ อะ ลักชัวรี คอลเลกชั่น รีสอร์ต แอนด์ สปา ภูเก็ต', 'The Naka Island, A Luxury Collection Resort & Spa, Phuket เดอะ นาคา ไอส์แลนด์ อะ ลักชัวรี คอลเลกชั่น รีสอร์ต แอนด์ สปา ภูเก็ต', '', '', '', 0, 0, 1, '2023-09-01 04:55:07', '2023-09-22 06:45:15'),
(107, 'The Rubber Hotel  เดอะ รับเบอร์ โฮเทล', 'The Rubber Hotel  เดอะ รับเบอร์ โฮเทล', '', '', '', 0, 0, 1, '2023-09-01 04:55:07', '2023-09-22 06:50:35'),
(108, 'Villa Amaravida  วิลล่า  อมาราวิดา', 'Villa Amaravida  วิลล่า  อมาราวิดา', '', '', '', 0, 0, 1, '2023-09-01 04:55:07', '2023-09-22 07:02:00'),
(109, 'Villa Leelawadee วิลล่า ลีลาวดี', 'Villa Leelawadee วิลล่า ลีลาวดี', '', '', '', 0, 0, 1, '2023-09-01 04:55:07', '2023-09-22 07:52:48'),
(110, 'Villa Padma  วิลล่า พาดม่า', 'Villa Padma  วิลล่า พาดม่า', '', '', '', 0, 0, 1, '2023-09-01 04:55:07', '2023-09-22 07:52:32'),
(111, 'Villa Sawarin   วิลล่า ซาวาริน', 'Villa Sawarin   วิลล่า ซาวาริน', '', '', '', 0, 0, 1, '2023-09-01 04:55:07', '2023-09-22 07:52:07'),
(112, 'Yipmunta  ยิปมันตรา', 'Yipmunta  ยิปมันตรา', '', '', '', 0, 0, 1, '2023-09-01 04:55:07', '2023-09-22 07:02:49'),
(113, 'V Villas Phuket  วี  วิลล่า ภูเก็ต', 'V Villas Phuket  วี  วิลล่า ภูเก็ต', '', '', '', 0, 1, 0, '2023-09-01 04:55:07', '2023-09-01 04:55:07'),
(114, 'ANDAMAN WHITE BEACH RESORT อันดามัน ไวท์ บีช รีสอร์ท', 'ANDAMAN WHITE BEACH RESORT อันดามัน ไวท์ บีช รีสอร์ท', '', '', '', 0, 1, 0, '2023-09-01 04:55:07', '2023-09-01 04:55:07'),
(115, 'DOUBLE TREE BY HILTON PHUKET BANTHAI RESORT ดับเบิ้ลทรี บาย ฮิลตัน ภูเก็ต บ้านไทย รีสอร์ท', 'DOUBLE TREE BY HILTON PHUKET BANTHAI RESORT ดับเบิ้ลทรี บาย ฮิลตัน ภูเก็ต บ้านไทย รีสอร์ท', '', '', '', 0, 0, 1, '2023-09-01 04:55:07', '2023-09-22 05:43:58'),
(116, 'Casa Sakoo Resort คาซา สาคู รีสอร์ท', 'Casa Sakoo Resort คาซา สาคู รีสอร์ท', '', '', '', 0, 0, 1, '2023-09-01 04:55:07', '2023-09-22 05:38:38'),
(117, 'Naithonburi Beach Resort ในทอน บุรี บีช รีสอร์ท ', 'Naithonburi Beach Resort ในทอน บุรี บีช รีสอร์ท ', '', '', '', 0, 1, 0, '2023-09-01 04:55:07', '2023-09-01 04:55:07'),
(118, 'PULLMAN PHUKET ARCADIA NAITHON BEACH พูลแมน ภูเก็ต อาเคเดีย ในทอน บีช รีสอร์ท', 'PULLMAN PHUKET ARCADIA NAITHON BEACH พูลแมน ภูเก็ต อาเคเดีย ในทอน บีช รีสอร์ท', '', '', '', 0, 1, 0, '2023-09-01 04:55:07', '2023-09-01 04:55:07'),
(119, 'The lifeco Phuket   เดอะ ลิฟีโก  ภูเก็ต', 'The lifeco Phuket   เดอะ ลิฟีโก  ภูเก็ต', '', '', '', 0, 0, 1, '2023-09-01 04:55:08', '2023-09-22 06:23:57'),
(120, 'Trisara Phuket', 'ตรีสรา ภูเก็ต', '', '', '', 0, 1, 0, '2023-09-01 04:55:08', '2023-09-22 07:01:28'),
(121, 'Villa Paradiso  วิลล่า พาราดิโซ', 'Villa Paradiso  วิลล่า พาราดิโซ', '', '', '', 0, 0, 1, '2023-09-01 04:55:08', '2023-09-22 07:52:21'),
(122, 'DEWA PHUKET RESORT & VILLAS  โรงแรมเดวาภูเก็ต รีสอร์ท แอนด์ วิลล่า', 'DEWA PHUKET RESORT & VILLAS  โรงแรมเดวาภูเก็ต รีสอร์ท แอนด์ วิลล่า', '', '', '', 0, 1, 0, '2023-09-01 04:55:08', '2023-09-01 04:55:08'),
(123, 'NAI YANG BEACH RESORT & SPA ในยางบีช รีสอร์ท แอนด์ สปา', 'NAI YANG BEACH RESORT & SPA ในยางบีช รีสอร์ท แอนด์ สปา', '', '', '', 0, 1, 0, '2023-09-01 04:55:08', '2023-09-01 04:55:08'),
(124, 'PHUKET MARRIOTT RESORT AND SPA NAI YANG BEACH โรงแรมภูเก็ต แมริออท รีสอร์ต แอนด์ สปา หาดในยาง', 'PHUKET MARRIOTT RESORT AND SPA NAI YANG BEACH โรงแรมภูเก็ต แมริออท รีสอร์ต แอนด์ สปา หาดในยาง', '', '', '', 0, 1, 0, '2023-09-01 04:55:08', '2023-09-01 04:55:08'),
(125, 'THE SLATE เดอะซเลท ภูเก็ต', 'THE SLATE เดอะซเลท ภูเก็ต', '', '', '', 0, 0, 1, '2023-09-01 04:55:08', '2023-09-22 06:52:19'),
(126, 'ATOM PHUKET HOTEL อะตอม ภูเก็ต โฮเทล', 'ATOM PHUKET HOTEL อะตอม ภูเก็ต โฮเทล', '', '', '', 0, 1, 0, '2023-09-01 04:55:08', '2023-09-01 04:55:08'),
(127, 'Lesprit de Naiyang เลสปรี เดอ ในยาง', 'Lesprit de Naiyang เลสปรี เดอ ในยาง', '', '', '', 0, 1, 0, '2023-09-01 04:55:08', '2023-09-01 04:55:08'),
(128, 'Marina Express Aviator Phuket Airport มารีนา เอ็กซ์เพรส เอวิเอเตอร์ ภูเก็ต แอร์พอร์ต ', 'Marina Express Aviator Phuket Airport มารีนา เอ็กซ์เพรส เอวิเอเตอร์ ภูเก็ต แอร์พอร์ต ', '', '', '', 0, 1, 0, '2023-09-01 04:55:08', '2023-09-01 04:55:08'),
(129, 'Maya Phuket มายา ภูเก็ต แอร์พอร์ต โฮเต็ล ', 'Maya Phuket มายา ภูเก็ต แอร์พอร์ต โฮเต็ล ', '', '', '', 0, 1, 0, '2023-09-01 04:55:08', '2023-09-01 04:55:08'),
(130, 'NAI YANG PARK RESORT ในยาง พาร์ค รีสอร์ท ', 'NAI YANG PARK RESORT ในยาง พาร์ค รีสอร์ท ', '', '', '', 0, 1, 0, '2023-09-01 04:55:08', '2023-09-22 05:56:42'),
(131, 'PENSIRI HOUSE เพ็ญศิริ เฮาส์ ', 'PENSIRI HOUSE เพ็ญศิริ เฮาส์ ', '', '', '', 0, 0, 1, '2023-09-01 04:55:08', '2023-09-22 06:03:32'),
(132, 'Phuket Airport Place ภูเก็ต แอร์พอร์ท เพลส ', 'Phuket Airport Place ภูเก็ต แอร์พอร์ท เพลส ', '', '', '', 0, 1, 0, '2023-09-01 04:55:08', '2023-09-01 04:55:08'),
(133, 'The Slate Phuket เดอะ ซเลท ภูเก็ต', 'The Slate Phuket เดอะ ซเลท ภูเก็ต', '', '', '', 0, 1, 0, '2023-09-01 04:55:08', '2023-09-01 04:55:08'),
(134, 'Hotel all seasons Naiharn Phuket โรงแรม ออล ซีซั่น ในหาน ภูเก็ต', 'Hotel all seasons Naiharn Phuket โรงแรม ออล ซีซั่น ในหาน ภูเก็ต', '', '', '', 0, 1, 0, '2023-09-01 04:55:08', '2023-09-01 04:55:08'),
(135, 'NAI HARN PHUKET ในหาน ภูเก็ต', 'NAI HARN PHUKET ในหาน ภูเก็ต', '', '', '', 0, 1, 0, '2023-09-01 04:55:08', '2023-09-01 04:55:08'),
(136, 'SUNSURI PHUKET HOTEL สันติ์สุริย์ ภูเก็ต', 'SUNSURI PHUKET HOTEL สันติ์สุริย์ ภูเก็ต', '', '', '', 0, 1, 0, '2023-09-01 04:55:08', '2023-09-01 04:55:08'),
(137, 'Naiharn Beach Resort ในหาน บีช รีสอร์ท ', 'Naiharn Beach Resort ในหาน บีช รีสอร์ท ', '', '', '', 0, 0, 1, '2023-09-01 04:55:08', '2023-09-22 05:55:03'),
(138, 'THE NAI HARN เดอะในหาน ', 'THE NAI HARN เดอะในหาน ', '', '', '', 0, 0, 1, '2023-09-01 04:55:08', '2023-09-22 06:44:07'),
(139, 'Wyndham Grand Nai Harn Beach Phuket วินดอม แกรน ในหาน ภูเก็ต ', 'Wyndham Grand Nai Harn Beach Phuket วินดอม แกรน ในหาน ภูเก็ต ', '', '', '', 0, 1, 0, '2023-09-01 04:55:08', '2023-09-01 04:55:08'),
(140, 'Baan Yin Dee Boutique Resort บ้านยินดี บูทิค รีสอร์ท', 'Baan Yin Dee Boutique Resort บ้านยินดี บูทิค รีสอร์ท', '', '', '', 0, 1, 0, '2023-09-01 04:55:09', '2023-09-01 04:55:09'),
(141, 'PHUKET MARRIOTT RESORT AND SPA , MERLIN BEACH โรงแรมภูเก็ต แมริออท รีสอร์ทแอนด์สปา เมอร์ลินบีช ', 'PHUKET MARRIOTT RESORT AND SPA , MERLIN BEACH โรงแรมภูเก็ต แมริออท รีสอร์ทแอนด์สปา เมอร์ลินบีช ', '', '', '', 0, 1, 0, '2023-09-01 04:55:09', '2023-09-01 04:55:09'),
(142, 'ROSEWOOD PHUKET โรสวูด ภูเก็ต', 'ROSEWOOD PHUKET โรสวูด ภูเก็ต', '', '', '', 0, 1, 0, '2023-09-01 04:55:09', '2023-09-01 04:55:09'),
(143, 'Avista Hideaway Phuket Patong, Mgallery อวิสต้า ไฮด์อเวย์ ภูเก็ต ป่าตอง - เอ็มแกลลอรี', 'Avista Hideaway Phuket Patong, Mgallery อวิสต้า ไฮด์อเวย์ ภูเก็ต ป่าตอง - เอ็มแกลลอรี', '', '', '', 0, 1, 0, '2023-09-01 04:55:09', '2023-09-01 04:55:09'),
(144, 'Baan Yuree Resort บ้าน ยุรี  รีสอร์ท ', 'Baan Yuree Resort บ้าน ยุรี  รีสอร์ท ', '', '', '', 0, 1, 0, '2023-09-01 04:55:09', '2023-09-01 04:55:09'),
(145, 'Crest resort and pool villas เครสท์ รีสอร์ท แอนด์ พูล วิลล่า', 'Crest resort and pool villas เครสท์ รีสอร์ท แอนด์ พูล วิลล่า', '', '', '', 0, 1, 0, '2023-09-01 04:55:09', '2023-09-01 04:55:09'),
(146, 'JW Marriott Phuket Resort & Spa เจดับบลิว แมริออท ภูเก็ต รีสอร์ท แอนด์ สปา', 'JW Marriott Phuket Resort & Spa เจดับบลิว แมริออท ภูเก็ต รีสอร์ท แอนด์ สปา', '', '', '', 0, 0, 1, '2023-09-01 04:55:09', '2023-09-22 05:49:14'),
(147, 'ANANTARA RESORT & SPA PHUKET อนันตรา  รีสอร์ท แอนด์ สปา ภูเก็ต ', 'ANANTARA RESORT & SPA PHUKET อนันตรา  รีสอร์ท แอนด์ สปา ภูเก็ต ', '', '', '', 0, 1, 0, '2023-09-01 04:55:09', '2023-09-01 04:55:09'),
(148, 'HOLIDAY INN RESORT PHUKET MAI KHAO BEACH ฮอลิเดย์ อินน์ รีสอร์ท ภูเก็ต ไม้ขาวบีช', 'HOLIDAY INN RESORT PHUKET MAI KHAO BEACH ฮอลิเดย์ อินน์ รีสอร์ท ภูเก็ต ไม้ขาวบีช', '', '', '', 0, 1, 0, '2023-09-01 04:55:09', '2023-09-01 04:55:09'),
(149, 'MAIKHAO DREAM VILLA RESORT & SPA ไม้ขาว ดรีม วิลลา รีสอร์ท แอนด์ สปา ', 'MAIKHAO DREAM VILLA RESORT & SPA ไม้ขาว ดรีม วิลลา รีสอร์ท แอนด์ สปา ', '', '', '', 0, 1, 0, '2023-09-01 04:55:09', '2023-09-01 04:55:09'),
(150, 'SALA PHUKET MAIKHAO BEACH RESORT ศาลาภูเก็ต ไม้ขาวบีช รีสอร์ท', 'SALA PHUKET MAIKHAO BEACH RESORT ศาลาภูเก็ต ไม้ขาวบีช รีสอร์ท', '', '', '', 0, 0, 1, '2023-09-01 04:55:09', '2023-09-22 06:17:40'),
(151, 'SPLASH BEACH RESORT สแปลช บีช รีสอร์ต ไม้ขาว ภูเก็ต', 'SPLASH BEACH RESORT สแปลช บีช รีสอร์ต ไม้ขาว ภูเก็ต', '', '', '', 0, 1, 0, '2023-09-01 04:55:09', '2023-09-01 04:55:09'),
(152, 'Anantara Vacation Club Mai Khao Phuket อนันตรา เวเคชั่น คลับ ไม้ขาว ภูเก็ต', 'Anantara Vacation Club Mai Khao Phuket อนันตรา เวเคชั่น คลับ ไม้ขาว ภูเก็ต', '', '', '', 0, 1, 0, '2023-09-01 04:55:09', '2023-09-01 04:55:09'),
(153, 'Avani+ Mai Khao Phuket Suites & Villas อวานี พลัส ไม้ขาว ภูเก็ต สวีท แอนด์ วิลล่า', 'Avani+ Mai Khao Phuket Suites & Villas อวานี พลัส ไม้ขาว ภูเก็ต สวีท แอนด์ วิลล่า', '', '', '', 0, 1, 0, '2023-09-01 04:55:09', '2023-09-01 04:55:09'),
(154, 'Coriacea Boutique Resort โคเรียซี บูติค รีสอร์ท', 'Coriacea Boutique Resort โคเรียซี บูติค รีสอร์ท', '', '', '', 0, 0, 1, '2023-09-01 04:55:09', '2023-09-22 05:42:46'),
(155, 'JW Marriott Phuket Resort & Spa เจดับบลิว แมริออท ภูเก็ต รีสอร์ท แอนด์ สปา', 'JW Marriott Phuket Resort & Spa เจดับบลิว แมริออท ภูเก็ต รีสอร์ท แอนด์ สปา', '', '', '', 0, 1, 0, '2023-09-01 04:55:09', '2023-09-01 04:55:09'),
(156, 'Maikhao Home Garden Bungalow ไม้ขาว โฮม การ์เด้น บังกะโล', 'Maikhao Home Garden Bungalow ไม้ขาว โฮม การ์เด้น บังกะโล', '', '', '', 0, 0, 1, '2023-09-01 04:55:09', '2023-09-22 05:54:04'),
(157, 'Maikhao Palm Beach Resort ไม้ขาว ปาล์ม บีช รีสอร์ท ', 'Maikhao Palm Beach Resort ไม้ขาว ปาล์ม บีช รีสอร์ท ', '', '', '', 0, 1, 0, '2023-09-01 04:55:09', '2023-09-01 04:55:09'),
(158, 'Renaissance Phuket Resort & Spa เรเนซองส์ ภูเก็ต รีสอร์ต แอนด์ สปา', 'Renaissance Phuket Resort & Spa เรเนซองส์ ภูเก็ต รีสอร์ต แอนด์ สปา', '', '', '', 0, 1, 0, '2023-09-01 04:55:09', '2023-09-01 04:55:09'),
(159, 'SALA Phuket Mai Khao Beach ศาลา ภูเก็ต ไม้ขาว บีช', 'SALA Phuket Mai Khao Beach ศาลา ภูเก็ต ไม้ขาว บีช', '', '', '', 0, 1, 0, '2023-09-01 04:55:09', '2023-09-01 04:55:09'),
(160, 'Hyatt Regency Phuket Resort ไฮแอท รีเจนซี่ ภูเก็ต รีสอร์ท', 'Hyatt Regency Phuket Resort ไฮแอท รีเจนซี่ ภูเก็ต รีสอร์ท', '', '', '', 0, 1, 0, '2023-09-01 04:55:10', '2023-09-01 04:55:10'),
(161, 'AQUAMARINE RESORT & VILLA อความารีน รีสอร์ท แอนด์ สปา', 'AQUAMARINE RESORT & VILLA อความารีน รีสอร์ท แอนด์ สปา', '', '', '', 0, 1, 0, '2023-09-01 04:55:10', '2023-09-01 04:55:10'),
(162, 'AYARA VILLAS ไอยรา วิลล่า', 'AYARA VILLAS ไอยรา วิลล่า', '', '', '', 0, 1, 0, '2023-09-01 04:55:10', '2023-09-01 04:55:10'),
(163, 'INTERCONTINENTAL PHUKET RESORT อินเตอร์คอนติเนนตัล ภูเก็ต รีสอร์ท', 'INTERCONTINENTAL PHUKET RESORT อินเตอร์คอนติเนนตัล ภูเก็ต รีสอร์ท', '', '', '', 0, 1, 0, '2023-09-01 04:55:10', '2023-09-01 04:55:10'),
(164, 'KEEMALA กีมาลา', 'KEEMALA กีมาลา', '', '', '', 0, 1, 0, '2023-09-01 04:55:10', '2023-09-01 04:55:10'),
(165, 'Andara Resort and Villas อันดาร่า รีสอร์ท แอนด์ วิลล่า', 'Andara Resort and Villas อันดาร่า รีสอร์ท แอนด์ วิลล่า', '', '', '', 0, 1, 0, '2023-09-01 04:55:10', '2023-09-01 04:55:10'),
(166, 'Ayara Kamala Resort & Spa โรงแรมไอยรา กมลา รีสอร์ท แอนด์ สปา', 'Ayara Kamala Resort & Spa โรงแรมไอยรา กมลา รีสอร์ท แอนด์ สปา', '', '', '', 0, 1, 0, '2023-09-01 04:55:10', '2023-09-01 04:55:10'),
(167, 'Baanchomview Kamala Hotel บ้านชมวิว กมลา ', 'Baanchomview Kamala Hotel บ้านชมวิว กมลา ', '', '', '', 0, 1, 0, '2023-09-01 04:55:10', '2023-09-01 04:55:10'),
(168, 'Buk inn Hotel โรงแรมบุ๊ค อินน์', 'Buk inn Hotel โรงแรมบุ๊ค อินน์', '', '', '', 0, 1, 0, '2023-09-01 04:55:10', '2023-09-01 04:55:10'),
(169, 'Cape Sienna Phuket Gourmet Hotel & Villas เคป เซียนนา กูร์เมต์ โฮเต็ล แอนด์ วิลลา', 'Cape Sienna Phuket Gourmet Hotel & Villas เคป เซียนนา กูร์เมต์ โฮเต็ล แอนด์ วิลลา', '', '', '', 0, 1, 0, '2023-09-01 04:55:10', '2023-09-01 04:55:10'),
(170, 'Chabana Resort ชบาน่า รีสอร์ท ', 'Chabana Resort ชบาน่า รีสอร์ท ', '', '', '', 0, 1, 0, '2023-09-01 04:55:10', '2023-09-01 04:55:10'),
(171, 'Hyatt Regency Phuket Resort ไฮแอท รีเจนซี่ ภูเก็ต รีสอร์ท', 'Hyatt Regency Phuket Resort ไฮแอท รีเจนซี่ ภูเก็ต รีสอร์ท', '', '', '', 0, 0, 1, '2023-09-01 04:55:10', '2023-09-22 05:48:37'),
(172, 'Kamala Beach Estate กมลา บีช เอสเตท', 'Kamala Beach Estate กมลา บีช เอสเตท', '', '', '', 0, 1, 0, '2023-09-01 04:55:10', '2023-09-01 04:55:10'),
(173, 'Kamala Beach Hotel กมลา บีช โฮเต็ล', 'Kamala Beach Hotel กมลา บีช โฮเต็ล', '', '', '', 0, 1, 0, '2023-09-01 04:55:10', '2023-09-01 04:55:10'),
(174, 'Kamala Beach Residence กมลา บีช เรสซิเดนซ์', 'Kamala Beach Residence กมลา บีช เรสซิเดนซ์', '', '', '', 0, 1, 0, '2023-09-01 04:55:10', '2023-09-01 04:55:10'),
(175, 'Kamala Resotel กมลา รีโซเทล', 'Kamala Resotel กมลา รีโซเทล', '', '', '', 0, 1, 0, '2023-09-01 04:55:10', '2023-09-01 04:55:10'),
(176, 'Namaka Resort Kamala นามาคา รีสอร์ท กมลา', 'Namaka Resort Kamala นามาคา รีสอร์ท กมลา', '', '', '', 0, 1, 0, '2023-09-01 04:55:10', '2023-09-01 04:55:10'),
(177, 'Novotel Phuket Kamala Beach โรงแรมโนโวเทล ภูเก็ต กมลา บีช', 'Novotel Phuket Kamala Beach โรงแรมโนโวเทล ภูเก็ต กมลา บีช', '', '', '', 0, 1, 0, '2023-09-01 04:55:10', '2023-09-01 04:55:10'),
(178, 'Paresa resort phuket ภารีสา รีสอร์ท ภูเก็ต', 'Paresa resort phuket ภารีสา รีสอร์ท ภูเก็ต', '', '', '', 0, 1, 0, '2023-09-01 04:55:10', '2023-09-01 04:55:10'),
(179, 'The Cool Water เดอะ คูลวอเตอร์ กมลา', 'The Cool Water เดอะ คูลวอเตอร์ กมลา', '', '', '', 0, 1, 0, '2023-09-01 04:55:10', '2023-09-01 04:55:10'),
(180, 'The Naka Phuket เดอะ นาคา ภูเก็ต วิลลา ', 'The Naka Phuket เดอะ นาคา ภูเก็ต วิลลา ', '', '', '', 0, 1, 0, '2023-09-01 04:55:10', '2023-09-01 04:55:10'),
(181, 'The Palms Kamala เดอะ ปาล์ม กมลา ', 'The Palms Kamala เดอะ ปาล์ม กมลา ', '', '', '', 0, 1, 0, '2023-09-01 04:55:10', '2023-09-01 04:55:10'),
(182, 'The Pe La Resort เดอะ เพ ลา รีสอร์ท ภูเก็ต ', 'The Pe La Resort เดอะ เพ ลา รีสอร์ท ภูเก็ต ', '', '', '', 0, 0, 1, '2023-09-01 04:55:11', '2023-09-22 06:46:33'),
(183, 'Villa Analaya  วิลล่า อันลายา', 'Villa Analaya  วิลล่า อันลายา', '', '', '', 0, 0, 1, '2023-09-01 04:55:11', '2023-09-22 07:02:21'),
(184, 'ANDAMAN CANNACIA RESORT & SPA อันดามัน คาเนเซีย รีสอร์ท แอนด์ สปา', 'ANDAMAN CANNACIA RESORT & SPA อันดามัน คาเนเซีย รีสอร์ท แอนด์ สปา', '', '', '', 0, 1, 0, '2023-09-01 04:55:11', '2023-09-01 04:55:11'),
(185, 'BEYOND RESORT KATA บียอนด์  รีสอร์ท กะตะ', 'BEYOND RESORT KATA บียอนด์  รีสอร์ท กะตะ', '', '', '', 0, 1, 0, '2023-09-01 04:55:11', '2023-09-01 04:55:11'),
(186, 'BOATHOUSE ON KATA BEACH โบทเฮ้าส์ ออน กะตะ บีช', 'BOATHOUSE ON KATA BEACH โบทเฮ้าส์ ออน กะตะ บีช', '', '', '', 0, 1, 0, '2023-09-01 04:55:11', '2023-09-01 04:55:11'),
(187, 'CENTARA KATA RESORT PHUKET เซ็นทารา กะตะ  รีสอร์ท ภูเก็ต', 'CENTARA KATA RESORT PHUKET เซ็นทารา กะตะ  รีสอร์ท ภูเก็ต', '', '', '', 0, 1, 0, '2023-09-01 04:55:11', '2023-09-01 04:55:11'),
(188, 'CLUB MEDITERRANEE คลับเมดิแตร์ราเน', 'CLUB MEDITERRANEE คลับเมดิแตร์ราเน', '', '', '', 0, 1, 0, '2023-09-01 04:55:11', '2023-09-01 04:55:11'),
(189, 'KATA ROCKS RESORT กะตะ ร็อค รีสอร์ท', 'KATA ROCKS RESORT กะตะ ร็อค รีสอร์ท', '', '', '', 0, 1, 0, '2023-09-01 04:55:11', '2023-09-01 04:55:11'),
(190, 'KATA SEA BREEZE RESORT กะตะ ซีบรีซ รีสอร์ท', 'KATA SEA BREEZE RESORT กะตะ ซีบรีซ รีสอร์ท', '', '', '', 0, 1, 0, '2023-09-01 04:55:11', '2023-09-01 04:55:11'),
(191, 'KATATHANI PHUKET BEACH RESORT กะตะธานี ภูเก็ต บีช รีสอร์ท', 'KATATHANI PHUKET BEACH RESORT กะตะธานี ภูเก็ต บีช รีสอร์ท', '', '', '', 0, 1, 0, '2023-09-01 04:55:11', '2023-09-01 04:55:11'),
(192, 'MALISA VILLA SUITES มะลิษา วิลล่า สวีท', 'MALISA VILLA SUITES มะลิษา วิลล่า สวีท', '', '', '', 0, 1, 0, '2023-09-01 04:55:11', '2023-09-01 04:55:11'),
(193, 'NOVOTEL PHUKET KATA AVISTA RESORT AND SPA โรงแรม โนโวเทล ภูเก็ต กะตะ อวิสต้า รีสอร์ท แอนด์ สปา', 'NOVOTEL PHUKET KATA AVISTA RESORT AND SPA โรงแรม โนโวเทล ภูเก็ต กะตะ อวิสต้า รีสอร์ท แอนด์ สปา', '', '', '', 0, 1, 0, '2023-09-01 04:55:11', '2023-09-01 04:55:11'),
(194, 'ORCHIDACEA RESORT ออร์คิดเดเซีย รีสอร์ท', 'ORCHIDACEA RESORT ออร์คิดเดเซีย รีสอร์ท', '', '', '', 0, 1, 0, '2023-09-01 04:55:11', '2023-09-01 04:55:11'),
(195, 'PEACH HILL RESORT พีช ฮิลล์ รีสอร์ท', 'PEACH HILL RESORT พีช ฮิลล์ รีสอร์ท', '', '', '', 0, 1, 0, '2023-09-01 04:55:11', '2023-09-01 04:55:11'),
(196, 'THE SIS KATA RESORT เดอะ ซิส กะตะ รีสอร์ท', 'THE SIS KATA RESORT เดอะ ซิส กะตะ รีสอร์ท', '', '', '', 0, 0, 1, '2023-09-01 04:55:11', '2023-09-22 06:51:06'),
(197, 'THE YAMA HOTEL PHUKET เดอะ ยามา โฮเทล ภูเก็ต', 'THE YAMA HOTEL PHUKET เดอะ ยามา โฮเทล ภูเก็ต', '', '', '', 0, 1, 0, '2023-09-01 04:55:11', '2023-09-01 04:55:11'),
(198, 'Aurico Kata Resort & Spa ออริโก้กะตะ รีสอร์ท แอนด์ สปา', 'Aurico Kata Resort & Spa ออริโก้กะตะ รีสอร์ท แอนด์ สปา', '', '', '', 0, 1, 0, '2023-09-01 04:55:11', '2023-09-01 04:55:11'),
(199, 'DOME KATA RESORT โดม กะตะ รีสอร์ท', 'DOME KATA RESORT โดม กะตะ รีสอร์ท', '', '', '', 0, 1, 0, '2023-09-01 04:55:11', '2023-09-01 04:55:11'),
(200, 'Ibis Phuket Kata ไอบิส ภูเก็ต กะตะ', 'Ibis Phuket Kata ไอบิส ภูเก็ต กะตะ', '', '', '', 0, 1, 0, '2023-09-01 04:55:11', '2023-09-01 04:55:11'),
(201, 'Impiana Private Villas Kata Noi อิมเพียน่า ไพรเวท วิลล่า กะตะน้อย', 'Impiana Private Villas Kata Noi อิมเพียน่า ไพรเวท วิลล่า กะตะน้อย', '', '', '', 0, 1, 0, '2023-09-01 04:55:11', '2023-09-01 04:55:11'),
(202, 'Kata Bai D กะตะ บายดี', 'Kata Bai D กะตะ บายดี', '', '', '', 0, 1, 0, '2023-09-01 04:55:11', '2023-09-01 04:55:11'),
(203, 'Kata hill sea view กะตะฮิลล์ ซีวิว', 'Kata hill sea view กะตะฮิลล์ ซีวิว', '', '', '', 0, 0, 1, '2023-09-01 04:55:12', '2023-09-22 05:50:06'),
(204, 'Kata Leaf Rerost กะตะ ลีฟ รีสอร์ท', 'Kata Leaf Rerost กะตะ ลีฟ รีสอร์ท', '', '', '', 0, 1, 0, '2023-09-01 04:55:12', '2023-09-01 04:55:12'),
(205, 'Kata Palm Resort & Spa กะตะ ปาล์ม รีสอร์ท แอนด์ สปา', 'Kata Palm Resort & Spa กะตะ ปาล์ม รีสอร์ท แอนด์ สปา', '', '', '', 0, 1, 0, '2023-09-01 04:55:12', '2023-09-01 04:55:12'),
(206, 'Kata Sun Beach โรงแรมกะตะ ซัน บีช', 'Kata Sun Beach โรงแรมกะตะ ซัน บีช', '', '', '', 0, 1, 0, '2023-09-01 04:55:12', '2023-09-01 04:55:12'),
(207, 'KATA TRANQUIL VILLA กะตะ ทรานควิล วิลล่า', 'KATA TRANQUIL VILLA กะตะ ทรานควิล วิลล่า', '', '', '', 0, 0, 1, '2023-09-01 04:55:12', '2023-09-22 05:50:45'),
(208, 'Katamanda - Villa Amanzi by Elite Havens กะตะมันดา - วิลล่า อะมันซี ', 'Katamanda - Villa Amanzi by Elite Havens กะตะมันดา - วิลล่า อะมันซี ', '', '', '', 0, 0, 1, '2023-09-01 04:55:12', '2023-09-22 05:51:35'),
(209, 'Kata pool side resort Kata beach กะตะ พูลไซด์ รีสอร์ท กะตะ บีช', 'Kata pool side resort Kata beach กะตะ พูลไซด์ รีสอร์ท กะตะ บีช', '', '', '', 0, 1, 0, '2023-09-01 04:55:12', '2023-09-01 04:55:12'),
(210, 'Metadee Concept Hotel โรงแรม เมธาดี คอนเซ็ปต์', 'Metadee Concept Hotel โรงแรม เมธาดี คอนเซ็ปต์', '', '', '', 0, 1, 0, '2023-09-01 04:55:12', '2023-09-01 04:55:12'),
(211, 'Oneloft Hotel โรงแรมวันลอฟต์ ', 'Oneloft Hotel โรงแรมวันลอฟต์ ', '', '', '', 0, 0, 1, '2023-09-01 04:55:12', '2023-09-22 05:58:42'),
(212, 'Sugar Marina Resort-Fashion-Kata Beach ชูการ์ มารีน่า รีสอร์ท แฟชั่น กะตะ บีช', 'Sugar Marina Resort-Fashion-Kata Beach ชูการ์ มารีน่า รีสอร์ท แฟชั่น กะตะ บีช', '', '', '', 0, 1, 0, '2023-09-01 04:55:12', '2023-09-01 04:55:12'),
(213, 'Sugar Marina Resort-Nautical-Kata Beach ชูการ์ มารีน่า รีสอร์ท นอติคอล กะตะ บีช', 'Sugar Marina Resort-Nautical-Kata Beach ชูการ์ มารีน่า รีสอร์ท นอติคอล กะตะ บีช', '', '', '', 0, 1, 0, '2023-09-01 04:55:12', '2023-09-01 04:55:12'),
(214, 'Sugar Marina Resort-Surf-Kata Beach Phuket ชูการ์ มารีน่า โฮเทล-เซิร์ฟ-กะตะบีช', 'Sugar Marina Resort-Surf-Kata Beach Phuket ชูการ์ มารีน่า โฮเทล-เซิร์ฟ-กะตะบีช', '', '', '', 0, 1, 0, '2023-09-01 04:55:12', '2023-09-01 04:55:12'),
(215, 'The Beach Boutique House โรงแรมเดอะ บีช บูติค เฮาส์ ', 'The Beach Boutique House โรงแรมเดอะ บีช บูติค เฮาส์ ', '', '', '', 0, 1, 0, '2023-09-01 04:55:12', '2023-09-01 04:55:12'),
(216, 'The Beach Heights Resort เดอะ บีช ไฮท์ รีสอร์ท ', 'The Beach Heights Resort เดอะ บีช ไฮท์ รีสอร์ท ', '', '', '', 0, 1, 0, '2023-09-01 04:55:12', '2023-09-01 04:55:12'),
(217, 'The Boathouse Phuket เดอะ โบทเฮ้าส์ ภูเก็ต ', 'The Boathouse Phuket เดอะ โบทเฮ้าส์ ภูเก็ต ', '', '', '', 0, 1, 0, '2023-09-01 04:55:12', '2023-09-01 04:55:12'),
(218, 'The Palmery Resort Phuket เดอะ ปาลเมอรี รีสอร์ท', 'The Palmery Resort Phuket เดอะ ปาลเมอรี รีสอร์ท', '', '', '', 0, 1, 0, '2023-09-01 04:55:12', '2023-09-01 04:55:12'),
(219, 'The Sea Galleri by Katathani  เดอะซี แกลอรี่ บาย กะตะธานี', 'The Sea Galleri by Katathani  เดอะซี แกลอรี่ บาย กะตะธานี', '', '', '', 0, 1, 0, '2023-09-01 04:55:12', '2023-09-01 04:55:12'),
(220, 'The Shore at Katathani  เดอะ ชอร์ แอท กะตะธานี', 'The Shore at Katathani  เดอะ ชอร์ แอท กะตะธานี', '', '', '', 0, 1, 0, '2023-09-01 04:55:12', '2023-09-01 04:55:12'),
(221, 'The SIS Kata  เดอะ ซิส กะตะ', 'The SIS Kata  เดอะ ซิส กะตะ', '', '', '', 0, 1, 0, '2023-09-01 04:55:12', '2023-09-01 04:55:12'),
(222, 'ACCESS RESORT & VILLAS   แอคเซส รีสอร์ท แอนด์ วิลล่า', 'ACCESS RESORT & VILLAS   แอคเซส รีสอร์ท แอนด์ วิลล่า', '', '', '', 0, 1, 0, '2023-09-01 04:55:12', '2023-09-01 04:55:12'),
(223, 'ANDAMAN SEAVIEW โรงแรมอันดามันซีวิว', 'ANDAMAN SEAVIEW โรงแรมอันดามันซีวิว', '', '', '', 0, 1, 0, '2023-09-01 04:55:12', '2023-09-01 04:55:12'),
(224, 'AVISTA GRANDE PHUKET KARON, M GALLERY  อวิสต้า แกรนด์ ภูเก็ต กะรน - เอ็มแกลลอรี', 'AVISTA GRANDE PHUKET KARON, M GALLERY  อวิสต้า แกรนด์ ภูเก็ต กะรน - เอ็มแกลลอรี', '', '', '', 0, 0, 1, '2023-09-01 04:55:12', '2023-09-22 05:28:10'),
(225, 'BAAN KARON RESORT บ้านกะรนรีสอร์ท', 'BAAN KARON RESORT บ้านกะรนรีสอร์ท', '', '', '', 0, 1, 0, '2023-09-01 04:55:12', '2023-09-01 04:55:12'),
(226, 'BEST WESTERN PHUKET OCEAN RESORT เบสท์เวสเทิร์น ภูเก็ต โอเชียน รีสอร์ท', 'BEST WESTERN PHUKET OCEAN RESORT เบสท์เวสเทิร์น ภูเก็ต โอเชียน รีสอร์ท', '', '', '', 0, 1, 0, '2023-09-01 04:55:13', '2023-09-01 04:55:13'),
(227, 'BEYOND RESORT KARON บียอนด์  รีสอร์ท กะรน', 'BEYOND RESORT KARON บียอนด์  รีสอร์ท กะรน', '', '', '', 0, 0, 1, '2023-09-01 04:55:13', '2023-09-22 05:31:27'),
(228, 'CENTARA GRAND BEACH RESORT PHUKET เซ็นทารา แกรนด์ บีช รีสอร์ท ภูเก็ต', 'CENTARA GRAND BEACH RESORT PHUKET เซ็นทารา แกรนด์ บีช รีสอร์ท ภูเก็ต', '', '', '', 0, 1, 0, '2023-09-01 04:55:13', '2023-09-01 04:55:13'),
(229, 'CENTARA KARON RESORT PHUKET เซ็นทารา กะรน  รีสอร์ท ภูเก็ต', 'CENTARA KARON RESORT PHUKET เซ็นทารา กะรน  รีสอร์ท ภูเก็ต', '', '', '', 0, 1, 0, '2023-09-01 04:55:13', '2023-09-01 04:55:13'),
(230, 'CENTARA VILLAS PHUKET เซ็นทารา วิลล่า ภูเก็ต', 'CENTARA VILLAS PHUKET เซ็นทารา วิลล่า ภูเก็ต', '', '', '', 0, 1, 0, '2023-09-01 04:55:13', '2023-09-01 04:55:13'),
(231, 'CHANALAI FLORA RESORT โรงแรมชนาลัย ฟลอร่า รีสอร์ท', 'CHANALAI FLORA RESORT โรงแรมชนาลัย ฟลอร่า รีสอร์ท', '', '', '', 0, 1, 0, '2023-09-01 04:55:13', '2023-09-01 04:55:13'),
(232, 'DIAMOND COTTAGE RESORT & SPA ไดมอนด์ คอทเทจ รีสอร์ท แอนด์ สปา ', 'DIAMOND COTTAGE RESORT & SPA ไดมอนด์ คอทเทจ รีสอร์ท แอนด์ สปา ', '', '', '', 0, 1, 0, '2023-09-01 04:55:13', '2023-09-01 04:55:13'),
(233, 'HILTON PHUKET ARCADIA RESORT & SPA โรงแรมฮิลตัน ภูเก็ต อาร์เคเดีย รีสอร์ท แอนด์ สปา', 'HILTON PHUKET ARCADIA RESORT & SPA โรงแรมฮิลตัน ภูเก็ต อาร์เคเดีย รีสอร์ท แอนด์ สปา', '', '', '', 0, 1, 0, '2023-09-01 04:55:13', '2023-09-01 04:55:13'),
(234, 'KARON PHUNAKA RESORT  กะรน ภูนาคา รีสอร์ท', 'KARON PHUNAKA RESORT  กะรน ภูนาคา รีสอร์ท', '', '', '', 0, 1, 0, '2023-09-01 04:55:13', '2023-09-01 04:55:13'),
(235, 'KARON PRINCESS HOTEL โรงแรมกะรน พริ้นเซส', 'KARON PRINCESS HOTEL โรงแรมกะรน พริ้นเซส', '', '', '', 0, 1, 0, '2023-09-01 04:55:13', '2023-09-01 04:55:13'),
(236, 'KARON SEA SANDS RESORT  กะรน ซีแซนด์ รีสอร์ท', 'KARON SEA SANDS RESORT  กะรน ซีแซนด์ รีสอร์ท', '', '', '', 0, 1, 0, '2023-09-01 04:55:13', '2023-09-01 04:55:13'),
(237, 'LE MERIDIEN PHUKET BEACH RESORT เลอ เมอริเดียน ภูเก็ต บีช รีสอร์ท', 'LE MERIDIEN PHUKET BEACH RESORT เลอ เมอริเดียน ภูเก็ต บีช รีสอร์ท', '', '', '', 0, 1, 0, '2023-09-01 04:55:13', '2023-09-01 04:55:13'),
(238, 'MOVENPICK RESORT & SPA KARON BEACH PHUKET เมอเวนพิค รีสอร์ท แอนด์ สปา กะรน บีช ภูเก็ต', 'MOVENPICK RESORT & SPA KARON BEACH PHUKET เมอเวนพิค รีสอร์ท แอนด์ สปา กะรน บีช ภูเก็ต', '', '', '', 0, 1, 0, '2023-09-01 04:55:13', '2023-09-01 04:55:13'),
(239, 'THE OLD PHUKET-KARON BEACH RESORT ดิ โอลด์ ภูเก็ต กะรน บีช รีสอร์ท', 'THE OLD PHUKET-KARON BEACH RESORT ดิ โอลด์ ภูเก็ต กะรน บีช รีสอร์ท', '', '', '', 0, 0, 1, '2023-09-01 04:55:13', '2023-09-22 06:46:04'),
(240, 'RAMADA PHUKET SOUTH SEA รามาดา  ภูเก็ต เซาท์ซี', 'RAMADA PHUKET SOUTH SEA รามาดา  ภูเก็ต เซาท์ซี', '', '', '', 0, 1, 0, '2023-09-01 04:55:13', '2023-09-01 04:55:13'),
(241, 'Avista Grande Phuket Karon Mgallery อวิสต้า แกรนด์ ภูเก็ต กะรน - เอ็มแกลเลอรี่', 'Avista Grande Phuket Karon Mgallery อวิสต้า แกรนด์ ภูเก็ต กะรน - เอ็มแกลเลอรี่', '', '', '', 0, 1, 0, '2023-09-01 04:55:13', '2023-09-01 04:55:13'),
(242, 'Baan Karonburi Resort บ้านกะรนบุรี รีสอร์ท', 'Baan Karonburi Resort บ้านกะรนบุรี รีสอร์ท', '', '', '', 0, 1, 0, '2023-09-01 04:55:13', '2023-09-01 04:55:13'),
(243, 'Dome Resort โดม  รีสอร์ท', 'Dome Resort โดม  รีสอร์ท', '', '', '', 0, 1, 0, '2023-09-01 04:55:13', '2023-09-01 04:55:13'),
(244, 'Hotel IKON Phuket โรงแรมไอคอน ภูเก็ต', 'Hotel IKON Phuket โรงแรมไอคอน ภูเก็ต', '', '', '', 0, 1, 0, '2023-09-01 04:55:13', '2023-09-01 04:55:13'),
(245, 'KARON LIVINGROOM กะรน ลิฟวิ่ง รูม ', 'KARON LIVINGROOM กะรน ลิฟวิ่ง รูม ', '', '', '', 0, 1, 0, '2023-09-01 04:55:13', '2023-09-01 04:55:13'),
(246, 'Mandarava Resort and Spa มันดาราวา รีสอร์ท แอนด์ สปา ', 'Mandarava Resort and Spa มันดาราวา รีสอร์ท แอนด์ สปา ', '', '', '', 0, 1, 0, '2023-09-01 04:55:13', '2023-09-01 04:55:13'),
(247, 'Phuket Golden Sand Inn โรงแรม ภูเก็ตโกลเด้นแซนด์อินน์', 'Phuket Golden Sand Inn โรงแรม ภูเก็ตโกลเด้นแซนด์อินน์', '', '', '', 0, 1, 0, '2023-09-01 04:55:13', '2023-09-01 04:55:13'),
(248, 'Phuket Island View Hotel ภูเก็ต ไอส์แลนด์ วิว รีสอร์ท', 'Phuket Island View Hotel ภูเก็ต ไอส์แลนด์ วิว รีสอร์ท', '', '', '', 0, 1, 0, '2023-09-01 04:55:13', '2023-09-01 04:55:13'),
(249, 'Phuket Orchid Resort and Spa ภูเก็ต ออร์คิด รีสอร์ท แอนด์ สปา', 'Phuket Orchid Resort and Spa ภูเก็ต ออร์คิด รีสอร์ท แอนด์ สปา', '', '', '', 0, 1, 0, '2023-09-01 04:55:14', '2023-09-01 04:55:14'),
(250, 'Sugar Marina Resort-ART-Karon Beach Phuket ชูการ์ มารีน่า รีสอร์ท อาร์ท กะรน บีช', 'Sugar Marina Resort-ART-Karon Beach Phuket ชูการ์ มารีน่า รีสอร์ท อาร์ท กะรน บีช', '', '', '', 0, 1, 0, '2023-09-01 04:55:14', '2023-09-01 04:55:14'),
(251, 'Sugar Palm Grand Hillside โรงแรมชูการ์ ปาล์ม แกรนด์ ฮิลล์ไซด์ ', 'Sugar Palm Grand Hillside โรงแรมชูการ์ ปาล์ม แกรนด์ ฮิลล์ไซด์ ', '', '', '', 0, 1, 0, '2023-09-01 04:55:14', '2023-09-01 04:55:14'),
(252, 'The Front Village โรงแรมเดอะฟรอนท์ วิลเลจ ', 'The Front Village โรงแรมเดอะฟรอนท์ วิลเลจ ', '', '', '', 0, 1, 0, '2023-09-01 04:55:14', '2023-09-01 04:55:14'),
(253, 'The Melody Phuket เดอะ เมโลดี้ ภูเก็ต โฮเทล ', 'The Melody Phuket เดอะ เมโลดี้ ภูเก็ต โฮเทล ', '', '', '', 0, 1, 0, '2023-09-01 04:55:14', '2023-09-01 04:55:14'),
(254, 'The Old Phuket Karon Beach Resort ดิ โอลด์ ภูเก็ต กะรน บีช รีสอร์ท', 'The Old Phuket Karon Beach Resort ดิ โอลด์ ภูเก็ต กะรน บีช รีสอร์ท', '', '', '', 0, 1, 0, '2023-09-01 04:55:14', '2023-09-01 04:55:14'),
(255, 'The Spa Resorts (The Village)  เดอะสปา รีสอร์ท', 'The Spa Resorts (The Village)  เดอะสปา รีสอร์ท', '', '', '', 0, 0, 1, '2023-09-01 04:55:14', '2023-09-22 06:55:53'),
(256, 'Woraburi Phuket Resort & Spa วรบุรี ภูเก็ต รีสอร์ท', 'Woraburi Phuket Resort & Spa วรบุรี ภูเก็ต รีสอร์ท', '', '', '', 0, 1, 0, '2023-09-01 04:55:14', '2023-09-01 04:55:14'),
(257, 'KALIMA RESORT & SPA คาลิมา รีสอร์ท แอนด์ สปา', 'KALIMA RESORT & SPA คาลิมา รีสอร์ท แอนด์ สปา', '', '', '', 0, 1, 0, '2023-09-01 04:55:14', '2023-09-01 04:55:14'),
(258, 'THE NATURE PHUKET โรงแรม เดอะเนเจอร์ ภูเก็ต', 'THE NATURE PHUKET โรงแรม เดอะเนเจอร์ ภูเก็ต', '', '', '', 0, 0, 1, '2023-09-01 04:55:14', '2023-09-22 06:45:41'),
(259, 'NOVOTEL PHUKET RESORT โนโวเทล ภูเก็ต รีสอร์ท', 'NOVOTEL PHUKET RESORT โนโวเทล ภูเก็ต รีสอร์ท', '', '', '', 0, 1, 0, '2023-09-01 04:55:14', '2023-09-01 04:55:14'),
(260, 'SUNSET BEACH RESORT ซันเซ็ท บีช รีสอร์ท', 'SUNSET BEACH RESORT ซันเซ็ท บีช รีสอร์ท', '', '', '', 0, 1, 0, '2023-09-01 04:55:14', '2023-09-01 04:55:14'),
(261, 'THAVORN BEACH VILLAGE & SPA ถาวร บีช วิลเลจ รีสอร์ท แอนด์ สปา', 'THAVORN BEACH VILLAGE & SPA ถาวร บีช วิลเลจ รีสอร์ท แอนด์ สปา', '', '', '', 0, 1, 0, '2023-09-01 04:55:14', '2023-09-01 04:55:14'),
(262, 'ZENMAYA OCEANFRONT PHUKET เซ็นมายา โอเชี่ยนฟรอนท์ ภูเก็ต', 'ZENMAYA OCEANFRONT PHUKET เซ็นมายา โอเชี่ยนฟรอนท์ ภูเก็ต', '', '', '', 0, 1, 0, '2023-09-01 04:55:14', '2023-09-01 04:55:14'),
(263, 'INDOCHINE RESORTS AND VILLAS อินโดจีนรีสอร์ทแอนด์วิลล่า', 'INDOCHINE RESORTS AND VILLAS อินโดจีนรีสอร์ทแอนด์วิลล่า', '', '', '', 0, 1, 0, '2023-09-01 04:55:14', '2023-09-01 04:55:14'),
(264, 'Marina Gallery Resort Kacha kalim Bay มารีนา แกลลอรี รีสอร์ต-คชา-กะหลิมเบย์ ภูเก็ต', 'Marina Gallery Resort Kacha kalim Bay มารีนา แกลลอรี รีสอร์ต-คชา-กะหลิมเบย์ ภูเก็ต', '', '', '', 0, 1, 0, '2023-09-01 04:55:14', '2023-09-01 04:55:14'),
(265, 'Wyndham Grand Kalim Bay วินดอม แกรน ภูเก็ต กะหลิ่ม เบย์', 'Wyndham Grand Kalim Bay วินดอม แกรน ภูเก็ต กะหลิ่ม เบย์', '', '', '', 0, 1, 0, '2023-09-01 04:55:14', '2023-09-22 07:50:33'),
(266, 'Angsana Laguna Phuket อังสนา ลากูน่า', 'Angsana Laguna Phuket อังสนา ลากูน่า', '', '', '', 0, 0, 1, '2023-09-01 04:55:14', '2023-09-22 05:25:45'),
(267, 'BANYAN TREE PHUKET บันยัน ทรีภูเก็ต ', 'BANYAN TREE PHUKET บันยัน ทรีภูเก็ต ', '', '', '', 0, 1, 0, '2023-09-01 04:55:14', '2023-09-01 04:55:14'),
(268, 'BEST WESTERN PREMIER BANGTAO BEACH RESORT & SPA เบสท์เวสเทิร์น พรีเมียร์ บางเทาบีช รีสอร์ท แอนด์ สปา', 'BEST WESTERN PREMIER BANGTAO BEACH RESORT & SPA เบสท์เวสเทิร์น พรีเมียร์ บางเทาบีช รีสอร์ท แอนด์ สปา', '', '', '', 0, 1, 0, '2023-09-01 04:55:14', '2023-09-01 04:55:14'),
(269, 'DREAM PHUKET HOTEL & SPA ดรีม ภูเก็ต โฮเต็ล แอนด์ สปา', 'DREAM PHUKET HOTEL & SPA ดรีม ภูเก็ต โฮเต็ล แอนด์ สปา', '', '', '', 0, 1, 0, '2023-09-01 04:55:14', '2023-09-01 04:55:14'),
(270, 'DUSIT THANI LAGUNA RESORT ดุสิตธานี ลากูน่า รีสอร์ท', 'DUSIT THANI LAGUNA RESORT ดุสิตธานี ลากูน่า รีสอร์ท', '', '', '', 0, 1, 0, '2023-09-01 04:55:15', '2023-09-01 04:55:15'),
(271, 'LAGUNA HOLIDAY CLUB PHUKET RESORT ลากูน่า ฮอลิเดย์ คลับ ภูเก็ต รีสอร์ท', 'LAGUNA HOLIDAY CLUB PHUKET RESORT ลากูน่า ฮอลิเดย์ คลับ ภูเก็ต รีสอร์ท', '', '', '', 0, 1, 0, '2023-09-01 04:55:15', '2023-09-01 04:55:15'),
(272, 'Outrigger laguna phuket beach resort เอาท์ทิกเกอร์ ลากูน่า ภูเก็ต บีช รีสอร์ท', 'Outrigger laguna phuket beach resort เอาท์ทิกเกอร์ ลากูน่า ภูเก็ต บีช รีสอร์ท', '', '', '', 0, 1, 0, '2023-09-01 04:55:15', '2023-09-01 04:55:15'),
(273, 'SUNWING RESORT & SPA ซันวิง รีสอร์ท & สปา', 'SUNWING RESORT & SPA ซันวิง รีสอร์ท & สปา', '', '', '', 0, 0, 1, '2023-09-01 04:55:15', '2023-09-22 06:20:37'),
(274, 'Allamanda Laguna Phuket อัลลามันดา ลากูนา ภูเก็ต', 'Allamanda Laguna Phuket อัลลามันดา ลากูนา ภูเก็ต', '', '', '', 0, 1, 0, '2023-09-01 04:55:15', '2023-09-01 04:55:15'),
(275, 'Angsana Laguna Phuket อังสนา ลากูน่า ภูเก็ต', 'Angsana Laguna Phuket อังสนา ลากูน่า ภูเก็ต', '', '', '', 0, 1, 0, '2023-09-01 04:55:15', '2023-09-01 04:55:15'),
(276, 'Angsana Villas Resort Phuket อังสนา วิลล่า รีสอร์ท ภูเก็ต', 'Angsana Villas Resort Phuket อังสนา วิลล่า รีสอร์ท ภูเก็ต', '', '', '', 0, 1, 0, '2023-09-01 04:55:15', '2023-09-01 04:55:15'),
(277, 'Areeca อารีคา', 'Areeca อารีคา', '', '', '', 0, 0, 1, '2023-09-01 04:55:15', '2023-09-22 05:26:08'),
(278, 'Cassia Hotel แคสเซีย ภูเก็ต', 'Cassia Hotel แคสเซีย ภูเก็ต', '', '', '', 0, 1, 0, '2023-09-01 04:55:15', '2023-09-01 04:55:15'),
(279, 'Casuarina Shores คาซัวรีนา ชอร์', 'Casuarina Shores คาซัวรีนา ชอร์', '', '', '', 0, 0, 1, '2023-09-01 04:55:15', '2023-09-22 05:40:43'),
(280, 'Grand Villa Luxury Time Phuket แกรนด์ วิลล่า ลักชัวรี่ ไทม์ ภูเก็ต', 'Grand Villa Luxury Time Phuket แกรนด์ วิลล่า ลักชัวรี่ ไทม์ ภูเก็ต', '', '', '', 0, 0, 1, '2023-09-01 04:55:15', '2023-09-22 05:45:25'),
(281, 'HOTEL COCO Phuket Beach โรงแรมโคโค่ ภูเก็ต บีช', 'HOTEL COCO Phuket Beach โรงแรมโคโค่ ภูเก็ต บีช', '', '', '', 0, 0, 1, '2023-09-01 04:55:15', '2023-09-22 05:48:09'),
(282, 'Mövenpick Resort Bangtao Beach Phuket เมอเวนพิค รีสอร์ต บางเทาบีช ภูเก็ต', 'Mövenpick Resort Bangtao Beach Phuket เมอเวนพิค รีสอร์ต บางเทาบีช ภูเก็ต', '', '', '', 0, 1, 0, '2023-09-01 04:55:15', '2023-09-01 04:55:15'),
(283, 'PAI TAN VILLAS ปายธาร วิลล่า ', 'PAI TAN VILLAS ปายธาร วิลล่า ', '', '', '', 0, 1, 0, '2023-09-01 04:55:15', '2023-09-01 04:55:15');
INSERT INTO `hotel` (`id`, `name`, `name_th`, `address`, `telephone`, `email`, `zone_id`, `is_approved`, `is_deleted`, `created_at`, `updated_at`) VALUES
(284, 'Pumeria Resort Phuket ภูมีเรีย รีสอร์ท ภูเก็ต ', 'Pumeria Resort Phuket ภูมีเรีย รีสอร์ท ภูเก็ต ', '', '', '', 0, 0, 1, '2023-09-01 04:55:15', '2023-09-22 06:16:16'),
(285, 'SAii Laguna Phuket ทราย ลากูน่า ภูเก็ต', 'SAii Laguna Phuket ทราย ลากูน่า ภูเก็ต', '', '', '', 0, 1, 0, '2023-09-01 04:55:15', '2023-09-01 04:55:15'),
(286, 'Sunwing Bangtao Beach ซันวิง บางเทาบีช ', 'Sunwing Bangtao Beach ซันวิง บางเทาบีช ', '', '', '', 0, 1, 0, '2023-09-01 04:55:15', '2023-09-01 04:55:15'),
(287, 'Holiday Inn Resort Phuket ฮอลิเดย์ อิน รีสอร์ท', 'Holiday Inn Resort Phuket ฮอลิเดย์ อิน รีสอร์ท', '', '', '', 0, 1, 0, '2023-09-01 04:55:15', '2023-09-01 04:55:15'),
(288, 'Hotel Clover Patong Phuket โรงแรมโคลเวอร์ ป่าตอง ภูเก็ต', 'Hotel Clover Patong Phuket โรงแรมโคลเวอร์ ป่าตอง ภูเก็ต', '', '', '', 0, 0, 1, '2023-09-01 04:55:15', '2023-09-22 05:47:18'),
(289, 'Wyndham Sea Pearl Resort Phuket วินด์แฮม ซีเพิร์ล รีสอร์ท ภูเก็ต', 'Wyndham Sea Pearl Resort Phuket วินด์แฮม ซีเพิร์ล รีสอร์ท ภูเก็ต', '', '', '', 0, 1, 0, '2023-09-01 04:55:15', '2023-09-01 04:55:15'),
(290, 'ALPINA PHUKET NALINA RESORT โรงแรม ออพินา ภูเก็ต นาลินา รีสอร์ท ', 'ALPINA PHUKET NALINA RESORT โรงแรม ออพินา ภูเก็ต นาลินา รีสอร์ท ', '', '', '', 0, 1, 0, '2023-09-01 04:55:15', '2023-09-01 04:55:15'),
(291, 'AMARI PHUKET โรงแรมอมารี ภูเก็ต', 'AMARI PHUKET โรงแรมอมารี ภูเก็ต', '', '', '', 0, 0, 1, '2023-09-01 04:55:15', '2023-09-22 05:24:57'),
(292, 'ANDAKIRA HOTEL โรงแรมอันดาคิรา', 'ANDAKIRA HOTEL โรงแรมอันดาคิรา', '', '', '', 0, 1, 0, '2023-09-01 04:55:16', '2023-09-01 04:55:16'),
(293, 'ANDAMAN BEACH SUITES HOTEL โรงแรม อันดามัน บีช สวีท', 'ANDAMAN BEACH SUITES HOTEL โรงแรม อันดามัน บีช สวีท', '', '', '', 0, 1, 0, '2023-09-01 04:55:16', '2023-09-01 04:55:16'),
(294, 'ANDAMAN EMBRACE PATONG อันดามัน เอมเบรส ป่าตอง', 'ANDAMAN EMBRACE PATONG อันดามัน เอมเบรส ป่าตอง', '', '', '', 0, 1, 0, '2023-09-01 04:55:16', '2023-09-01 04:55:16'),
(295, 'ANDAMANTRA RESORT & VILLA PHUKET อันดามันตรา รีสอร์ท แอนด์ วิลล่า ภูเก็ต', 'ANDAMANTRA RESORT & VILLA PHUKET อันดามันตรา รีสอร์ท แอนด์ วิลล่า ภูเก็ต', '', '', '', 0, 1, 0, '2023-09-01 04:55:16', '2023-09-01 04:55:16'),
(296, 'BURASARI บุราส่าหรี', 'BURASARI บุราส่าหรี', '', '', '', 0, 0, 1, '2023-09-01 04:55:16', '2023-09-22 05:36:49'),
(297, 'DAYS INN BY WYNDHAM PATONG BEACH เดย์ส อินน์ บาย วินด์แฮม ป่าตอง บีช ภูเก็ต', 'DAYS INN BY WYNDHAM PATONG BEACH เดย์ส อินน์ บาย วินด์แฮม ป่าตอง บีช ภูเก็ต', '', '', '', 0, 1, 0, '2023-09-01 04:55:16', '2023-09-01 04:55:16'),
(298, 'DEEVANA PATONG RESORT & SPA ดีวาน่า ป่าตอง รีสอร์ท แอนด์ สปา', 'DEEVANA PATONG RESORT & SPA ดีวาน่า ป่าตอง รีสอร์ท แอนด์ สปา', '', '', '', 0, 1, 0, '2023-09-01 04:55:16', '2023-09-01 04:55:16'),
(299, 'DEEVANA PLAZA PHUKET PATONG ดีวานา พลาซ่า ภูเก็ต ป่าตอง', 'DEEVANA PLAZA PHUKET PATONG ดีวานา พลาซ่า ภูเก็ต ป่าตอง', '', '', '', 0, 1, 0, '2023-09-01 04:55:16', '2023-09-01 04:55:16'),
(300, 'DIAMOND CLIFF RESORT & SPA ไดมอนด์คลิฟ รีสอร์ท แอนด์ สปา', 'DIAMOND CLIFF RESORT & SPA ไดมอนด์คลิฟ รีสอร์ท แอนด์ สปา', '', '', '', 0, 1, 0, '2023-09-01 04:55:16', '2023-09-01 04:55:16'),
(301, 'DUANGJITT RESORT  ดวงจิต รีสอร์ท', 'DUANGJITT RESORT  ดวงจิต รีสอร์ท', '', '', '', 0, 1, 0, '2023-09-01 04:55:16', '2023-09-01 04:55:16'),
(302, 'FOUR POINTS BY SHERATON PHUKET PATONG BEACH RESORT โฟร์พอยท์ส บาย เชอราตัน ภูเก็ต ป่าตองบีช รีสอร์ท', 'FOUR POINTS BY SHERATON PHUKET PATONG BEACH RESORT โฟร์พอยท์ส บาย เชอราตัน ภูเก็ต ป่าตองบีช รีสอร์ท', '', '', '', 0, 1, 0, '2023-09-01 04:55:16', '2023-09-01 04:55:16'),
(303, 'GRAND MERCURE PHUKET PATONG แกรนด์ เมอร์เคียว ภูเก็ต ป่าตอง', 'GRAND MERCURE PHUKET PATONG แกรนด์ เมอร์เคียว ภูเก็ต ป่าตอง', '', '', '', 0, 1, 0, '2023-09-01 04:55:16', '2023-09-01 04:55:16'),
(304, 'HOLIDAY INN EXPRESS PHUKET PATONG BEACH CENTRAL ฮอลิเดย์ อินน์ เอ็กซ์เพรส ภูเก็ต ป่าตองบีช เซ็นทรัล', 'HOLIDAY INN EXPRESS PHUKET PATONG BEACH CENTRAL ฮอลิเดย์ อินน์ เอ็กซ์เพรส ภูเก็ต ป่าตองบีช เซ็นทรัล', '', '', '', 0, 1, 0, '2023-09-01 04:55:16', '2023-09-01 04:55:16'),
(305, 'HOTEL INDIGO PHUKET PATONG โรงแรมโฮเทล อินดิโก ภูเก็ต ป่าตอง', 'HOTEL INDIGO PHUKET PATONG โรงแรมโฮเทล อินดิโก ภูเก็ต ป่าตอง', '', '', '', 0, 1, 0, '2023-09-01 04:55:16', '2023-09-01 04:55:16'),
(306, 'THE KEE RESORT & SPA เดอะ กี รีสอร์ท แอนด์ สปา', 'THE KEE RESORT & SPA เดอะ กี รีสอร์ท แอนด์ สปา', '', '', '', 0, 1, 0, '2023-09-01 04:55:16', '2023-09-01 04:55:16'),
(307, 'LA FLORA RESORT PATONG ลาฟลอร่ารีสอร์ท ป่าตอง', 'LA FLORA RESORT PATONG ลาฟลอร่ารีสอร์ท ป่าตอง', '', '', '', 0, 1, 0, '2023-09-01 04:55:16', '2023-09-01 04:55:16'),
(308, 'THE LANTERN RESORTS PATONG เดอะ แลนเทิร์น รีสอร์ท ป่าตอง', 'THE LANTERN RESORTS PATONG เดอะ แลนเทิร์น รีสอร์ท ป่าตอง', '', '', '', 0, 0, 1, '2023-09-01 04:55:16', '2023-09-22 06:25:30'),
(309, 'LIV HOTEL PHUKET PATHONG BEACHFRONT ลิฟ โฮเทล ภูเก็ต ป่าตอง บีชฟรอนต์', 'LIV HOTEL PHUKET PATHONG BEACHFRONT ลิฟ โฮเทล ภูเก็ต ป่าตอง บีชฟรอนต์', '', '', '', 0, 1, 0, '2023-09-01 04:55:16', '2023-09-01 04:55:16'),
(310, 'MAI HOUSE PATONG HILL มาย เฮาส์ ป่าตอง ฮิลล์', 'MAI HOUSE PATONG HILL มาย เฮาส์ ป่าตอง ฮิลล์', '', '', '', 0, 1, 0, '2023-09-01 04:55:16', '2023-09-01 04:55:16'),
(311, 'MILLENNIUM RESORT PATONG PHUKET มิลเลเนียม รีสอร์ท ป่าตอง ภูเก็ต', 'MILLENNIUM RESORT PATONG PHUKET มิลเลเนียม รีสอร์ท ป่าตอง ภูเก็ต', '', '', '', 0, 1, 0, '2023-09-01 04:55:16', '2023-09-01 04:55:16'),
(312, 'NOVOTEL PHUKET VINTAGE PARK RESORT โนโวเทล ภูเก็ต วินเทจ พาร์ค รีสอร์ท', 'NOVOTEL PHUKET VINTAGE PARK RESORT โนโวเทล ภูเก็ต วินเทจ พาร์ค รีสอร์ท', '', '', '', 0, 1, 0, '2023-09-01 04:55:16', '2023-09-01 04:55:16'),
(313, 'PATONG BAY GARDEN RESORT ป่าตอง เบย์ การ์เด้น รีสอร์ท', 'PATONG BAY GARDEN RESORT ป่าตอง เบย์ การ์เด้น รีสอร์ท', '', '', '', 0, 1, 0, '2023-09-01 04:55:16', '2023-09-01 04:55:16'),
(314, 'PATONG MERLIN HOTEL โรงแรมป่าตอง เมอร์ลิน', 'PATONG MERLIN HOTEL โรงแรมป่าตอง เมอร์ลิน', '', '', '', 0, 1, 0, '2023-09-01 04:55:16', '2023-09-01 04:55:16'),
(315, 'PATONG PALACE HOTEL โรงแรม ป่าตอง พาเลซ', 'PATONG PALACE HOTEL โรงแรม ป่าตอง พาเลซ', '', '', '', 0, 1, 0, '2023-09-01 04:55:17', '2023-09-01 04:55:17'),
(316, 'PATONG PARAGON RESORT & SPA ป่าตอง พารากอน รีสอร์ท แอนด์ สปา', 'PATONG PARAGON RESORT & SPA ป่าตอง พารากอน รีสอร์ท แอนด์ สปา', '', '', '', 0, 1, 0, '2023-09-01 04:55:17', '2023-09-01 04:55:17'),
(317, 'PATONG RESORT ป่าตอง รีสอร์ท ', 'PATONG RESORT ป่าตอง รีสอร์ท ', '', '', '', 0, 1, 0, '2023-09-01 04:55:17', '2023-09-01 04:55:17'),
(318, 'PHUKET GRACELAND RESORT & SPA ภูเก็ต เกรซแลนด์ รีสอร์ท แอนด์ สปา', 'PHUKET GRACELAND RESORT & SPA ภูเก็ต เกรซแลนด์ รีสอร์ท แอนด์ สปา', '', '', '', 0, 0, 1, '2023-09-01 04:55:17', '2023-09-22 06:04:30'),
(319, 'RAMADA PHUKET DEEVANA รามาด้า ภูเก็ต ดีวาน่า', 'RAMADA PHUKET DEEVANA รามาด้า ภูเก็ต ดีวาน่า', '', '', '', 0, 1, 0, '2023-09-01 04:55:17', '2023-09-01 04:55:17'),
(320, 'RED PLANET HOTELS (PATONG) โรงแรม เรด แพลนเนต ภูเก็ต ป่าตอง', 'RED PLANET HOTELS (PATONG) โรงแรม เรด แพลนเนต ภูเก็ต ป่าตอง', '', '', '', 0, 1, 0, '2023-09-01 04:55:17', '2023-09-01 04:55:17'),
(321, 'R-MAR RESORT AND SPA อาม่า รีสอร์ท แอนด์ สปา', 'R-MAR RESORT AND SPA อาม่า รีสอร์ท แอนด์ สปา', '', '', '', 0, 1, 0, '2023-09-01 04:55:17', '2023-09-01 04:55:17'),
(322, 'ROYAL PARADISE HOTEL & SPA โรงแรม เดอะรอยัล พาราไดซ์ แอนด์ สปา', 'ROYAL PARADISE HOTEL & SPA โรงแรม เดอะรอยัล พาราไดซ์ แอนด์ สปา', '', '', '', 0, 1, 0, '2023-09-01 04:55:17', '2023-09-01 04:55:17'),
(323, 'SAWADDI PATONG RESORT & SPA สวัสดี ป่าตอง รีสอร์ต แอนด์ สปา ', 'SAWADDI PATONG RESORT & SPA สวัสดี ป่าตอง รีสอร์ต แอนด์ สปา ', '', '', '', 0, 1, 0, '2023-09-01 04:55:17', '2023-09-01 04:55:17'),
(324, 'SEA SUN SAND RESORT & SPA ซี แซนด์ ซัน รีสอร์ท & สปา', 'SEA SUN SAND RESORT & SPA ซี แซนด์ ซัน รีสอร์ท & สปา', '', '', '', 0, 1, 0, '2023-09-01 04:55:17', '2023-09-01 04:55:17'),
(325, 'SLEEP WITH ME HOTEL design hotel @ patong สลีป วิธ มี โฮเทล ดีไซน์ โฮเทล แอท ป่าตอง', 'SLEEP WITH ME HOTEL design hotel @ patong สลีป วิธ มี โฮเทล ดีไซน์ โฮเทล แอท ป่าตอง', '', '', '', 0, 1, 0, '2023-09-01 04:55:17', '2023-09-01 04:55:17'),
(326, 'THARA PATONG BEACH RESORT  ธาราป่าตองบีชรีสอร์ท', 'THARA PATONG BEACH RESORT  ธาราป่าตองบีชรีสอร์ท', '', '', '', 0, 1, 0, '2023-09-01 04:55:17', '2023-09-01 04:55:17'),
(327, 'TROPICA BUNGALOW HOTEL ทรอปิคา บังกะโล โฮเทล', 'TROPICA BUNGALOW HOTEL ทรอปิคา บังกะโล โฮเทล', '', '', '', 0, 1, 0, '2023-09-01 04:55:17', '2023-09-01 04:55:17'),
(328, 'WYNDHAM SEA PEARL RESORT PHUKET วินด์แฮม ซีเพิร์ล รีสอร์ท ภูเก็ต', 'WYNDHAM SEA PEARL RESORT PHUKET วินด์แฮม ซีเพิร์ล รีสอร์ท ภูเก็ต', '', '', '', 0, 0, 1, '2023-09-01 04:55:17', '2023-09-22 07:03:02'),
(329, 'Amari Phuket โรงแรมอมารี ภูเก็ต', 'Amari Phuket โรงแรมอมารี ภูเก็ต', '', '', '', 0, 1, 0, '2023-09-01 04:55:17', '2023-09-01 04:55:17'),
(330, 'Amata Patong อมตะ ป่าตอง', 'Amata Patong อมตะ ป่าตอง', '', '', '', 0, 1, 0, '2023-09-01 04:55:17', '2023-09-01 04:55:17'),
(331, 'Amici miei Hotelโรงแรมอมิชี มิเอย์ ', 'Amici miei Hotelโรงแรมอมิชี มิเอย์ ', '', '', '', 0, 1, 0, '2023-09-01 04:55:17', '2023-09-01 04:55:17'),
(332, 'ASHLEE HUB HOTEL PATONG โรงแรมแอชลี ฮับ ป่าตอง ', 'ASHLEE HUB HOTEL PATONG โรงแรมแอชลี ฮับ ป่าตอง ', '', '', '', 0, 1, 0, '2023-09-01 04:55:17', '2023-09-01 04:55:17'),
(333, 'Baan Laimai Beach Resort บ้าน ลายไม้ บีช รีสอร์ท ', 'Baan Laimai Beach Resort บ้าน ลายไม้ บีช รีสอร์ท ', '', '', '', 0, 1, 0, '2023-09-01 04:55:17', '2023-09-01 04:55:17'),
(334, 'Best Western Patong Beach โรงแรมเบสท์เวสเทิร์น ป่าตอง บีช', 'Best Western Patong Beach โรงแรมเบสท์เวสเทิร์น ป่าตอง บีช', '', '', '', 0, 1, 0, '2023-09-01 04:55:17', '2023-09-01 04:55:17'),
(335, 'Breezotel บรีซโซเทล', 'Breezotel บรีซโซเทล', '', '', '', 0, 1, 0, '2023-09-01 04:55:17', '2023-09-01 04:55:17'),
(336, 'Burasari Phuket บุราสารี ภูเก็ต', 'Burasari Phuket บุราสารี ภูเก็ต', '', '', '', 0, 1, 0, '2023-09-01 04:55:17', '2023-09-01 04:55:17'),
(337, 'BYD  Lofts Boutique Hotel บีวายดี ลอฟต์ บูทิก โฮเต็ล', 'BYD  Lofts Boutique Hotel บีวายดี ลอฟต์ บูทิก โฮเต็ล', '', '', '', 0, 1, 0, '2023-09-01 04:55:18', '2023-09-01 04:55:18'),
(338, 'BYD Apartment บีวายดี อพาทเมนท์', 'BYD Apartment บีวายดี อพาทเมนท์', '', '', '', 0, 1, 0, '2023-09-01 04:55:18', '2023-09-01 04:55:18'),
(339, 'C & N Hotel ซี แอนด์ เอ็น โฮเต็ล', 'C & N Hotel ซี แอนด์ เอ็น โฮเต็ล', '', '', '', 0, 1, 0, '2023-09-01 04:55:18', '2023-09-01 04:55:18'),
(340, 'C&N Resort and Spa ซี แอนด์ เอ็น รีสอร์ท แอนด์ สปา', 'C&N Resort and Spa ซี แอนด์ เอ็น รีสอร์ท แอนด์ สปา', '', '', '', 0, 1, 0, '2023-09-01 04:55:18', '2023-09-01 04:55:18'),
(341, 'Coconut Village Resort โคโคนัทวิลเลจรีสอร์ท ภูเก็ต', 'Coconut Village Resort โคโคนัทวิลเลจรีสอร์ท ภูเก็ต', '', '', '', 0, 1, 0, '2023-09-01 04:55:18', '2023-09-01 04:55:18'),
(342, 'Dfeel Hostel ดีฟีล เฮาส์', 'Dfeel Hostel ดีฟีล เฮาส์', '', '', '', 0, 0, 1, '2023-09-01 04:55:18', '2023-09-22 05:43:18'),
(343, 'Dinso Resort ดินสอ รีสอร์ต แอนด์ วิลล่า ภูเก็ต', 'Dinso Resort ดินสอ รีสอร์ต แอนด์ วิลล่า ภูเก็ต', '', '', '', 0, 1, 0, '2023-09-01 04:55:18', '2023-09-01 04:55:18'),
(344, 'DoubleTree by Hilton Phuket banthai Resort ดับเบิ้ลทรีบายฮิลตันภูเก็ตบ้านไทยรีสอร์ท', 'DoubleTree by Hilton Phuket banthai Resort ดับเบิ้ลทรีบายฮิลตันภูเก็ตบ้านไทยรีสอร์ท', '', '', '', 0, 1, 0, '2023-09-01 04:55:18', '2023-09-01 04:55:18'),
(345, 'Harry’s restaurant bar and hotel แฮรี่ส์ เรสเตอรองท์บาร์ แอนด์ โฮเต็ล', 'Harry’s restaurant bar and hotel แฮรี่ส์ เรสเตอรองท์บาร์ แอนด์ โฮเต็ล', '', '', '', 0, 1, 0, '2023-09-01 04:55:18', '2023-09-01 04:55:18'),
(346, 'Hip Hostel ฮิป โฮสเทล', 'Hip Hostel ฮิป โฮสเทล', '', '', '', 0, 1, 0, '2023-09-01 04:55:18', '2023-09-01 04:55:18'),
(347, 'Hotel Clover Patong Phuket โรงแรมโคลเวอร์ ป่าตอง ภูเก็ต ', 'Hotel Clover Patong Phuket โรงแรมโคลเวอร์ ป่าตอง ภูเก็ต ', '', '', '', 0, 1, 0, '2023-09-01 04:55:18', '2023-09-01 04:55:18'),
(348, 'ibis Phuket Patong Hotel ไอบิส ภูเก็ต ป่าตอง โฮเต็ล', 'ibis Phuket Patong Hotel ไอบิส ภูเก็ต ป่าตอง โฮเต็ล', '', '', '', 0, 1, 0, '2023-09-01 04:55:18', '2023-09-01 04:55:18'),
(349, 'Impiana Resort Patong อิมเพียน่า รีสอร์ท ป่าตอง', 'Impiana Resort Patong อิมเพียน่า รีสอร์ท ป่าตอง', '', '', '', 0, 1, 0, '2023-09-01 04:55:18', '2023-09-01 04:55:18'),
(350, 'Jiraporn Hill Resort จิราภรณ์ ฮิลล์ รีสอร์ท', 'Jiraporn Hill Resort จิราภรณ์ ฮิลล์ รีสอร์ท', '', '', '', 0, 1, 0, '2023-09-01 04:55:18', '2023-09-01 04:55:18'),
(351, 'Kudo Hotel โรงแรมคูโด ', 'Kudo Hotel โรงแรมคูโด ', '', '', '', 0, 1, 0, '2023-09-01 04:55:18', '2023-09-01 04:55:18'),
(352, 'Lokal Hotel Phuket โลคัล โฮเต็ล ภูเก็ต', 'Lokal Hotel Phuket โลคัล โฮเต็ล ภูเก็ต', '', '', '', 0, 1, 0, '2023-09-01 04:55:18', '2023-09-01 04:55:18'),
(353, 'Mövenpick Myth Hotel Patong Phuket โรงแรมเมอเวนพิค มิธ ป่าตอง ภูเก็ต', 'Mövenpick Myth Hotel Patong Phuket โรงแรมเมอเวนพิค มิธ ป่าตอง ภูเก็ต', '', '', '', 0, 1, 0, '2023-09-01 04:55:18', '2023-09-01 04:55:18'),
(354, 'Nap Patong แนป ป่าตอง ', 'Nap Patong แนป ป่าตอง ', '', '', '', 0, 1, 0, '2023-09-01 04:55:18', '2023-09-01 04:55:18'),
(355, 'New Square Patong Hotel นิว สแควร์ ป่าตอง โฮเต็ล', 'New Square Patong Hotel นิว สแควร์ ป่าตอง โฮเต็ล', '', '', '', 0, 1, 0, '2023-09-01 04:55:18', '2023-09-01 04:55:18'),
(356, 'Nipa Resort Patong Beach นิภา รีสอร์ท ป่าตอง บีช', 'Nipa Resort Patong Beach นิภา รีสอร์ท ป่าตอง บีช', '', '', '', 0, 1, 0, '2023-09-01 04:55:18', '2023-09-01 04:55:18'),
(357, 'Oceanfront Beach Resort & Spa โอเชียนฟรอนต์ บีช รีสอร์ท แอนด์ สปา', 'Oceanfront Beach Resort & Spa โอเชียนฟรอนต์ บีช รีสอร์ท แอนด์ สปา', '', '', '', 0, 1, 0, '2023-09-01 04:55:18', '2023-09-01 04:55:18'),
(358, 'Palm View Resort ปาล์มวิวรีสอร์ท', 'Palm View Resort ปาล์มวิวรีสอร์ท', '', '', '', 0, 0, 1, '2023-09-01 04:55:19', '2023-09-22 06:00:28'),
(359, 'Palmyra Patong Resort ปาล์มไมร่า ป่าตอง รีสอร์ท ', 'Palmyra Patong Resort ปาล์มไมร่า ป่าตอง รีสอร์ท ', '', '', '', 0, 1, 0, '2023-09-01 04:55:19', '2023-09-01 04:55:19'),
(360, 'Paripas Patong Resort ปริภัส ป่าตอง รีสอร์ท ', 'Paripas Patong Resort ปริภัส ป่าตอง รีสอร์ท ', '', '', '', 0, 1, 0, '2023-09-01 04:55:19', '2023-09-01 04:55:19'),
(361, 'Patong Bay Hill ป่าตอง เบย์ ฮิลล์ ', 'Patong Bay Hill ป่าตอง เบย์ ฮิลล์ ', '', '', '', 0, 1, 0, '2023-09-01 04:55:19', '2023-09-01 04:55:19'),
(362, 'Patong Heritage Hotel ป่าตอง เฮอริเทจ โฮเทล', 'Patong Heritage Hotel ป่าตอง เฮอริเทจ โฮเทล', '', '', '', 0, 1, 0, '2023-09-01 04:55:19', '2023-09-01 04:55:19'),
(363, 'PATONG MANSION HOTEL ป่าตอง แมนชั่น โฮเทล', 'PATONG MANSION HOTEL ป่าตอง แมนชั่น โฮเทล', '', '', '', 0, 0, 1, '2023-09-01 04:55:19', '2023-09-22 06:02:29'),
(364, 'Phuket Graceland Resort & Spa ภูเก็ต เกรซแลนด์ รีสอร์ท แอนด์ สปา', 'Phuket Graceland Resort & Spa ภูเก็ต เกรซแลนด์ รีสอร์ท แอนด์ สปา', '', '', '', 0, 1, 0, '2023-09-01 04:55:19', '2023-09-01 04:55:19'),
(365, 'Prince Edouard Apartment & Resort ปริ้นซ์ เอดูอาร์ อพาร์ตเมนต์ แอนด์ รีสอร์ท', 'Prince Edouard Apartment & Resort ปริ้นซ์ เอดูอาร์ อพาร์ตเมนต์ แอนด์ รีสอร์ท', '', '', '', 0, 0, 1, '2023-09-01 04:55:19', '2023-09-22 06:12:14'),
(366, 'Rak Elegant Hotel Patong รัก เอลเลแกนต์ โฮเต็ล ป่าตอง', 'Rak Elegant Hotel Patong รัก เอลเลแกนต์ โฮเต็ล ป่าตอง', '', '', '', 0, 1, 0, '2023-09-01 04:55:19', '2023-09-01 04:55:19'),
(367, 'Ramaburin resort รามาบุรินทร์ รีสอร์ท ', 'Ramaburin resort รามาบุรินทร์ รีสอร์ท ', '', '', '', 0, 1, 0, '2023-09-01 04:55:19', '2023-09-01 04:55:19'),
(368, 'Royal Phawadee Village รอยัล ภาวดี วิลเลจ ป่าตอง บีช โฮเทล ', 'Royal Phawadee Village รอยัล ภาวดี วิลเลจ ป่าตอง บีช โฮเทล ', '', '', '', 0, 1, 0, '2023-09-01 04:55:19', '2023-09-01 04:55:19'),
(369, 'Safari Beach hotel โรงแรมซาฟารี บีช ', 'Safari Beach hotel โรงแรมซาฟารี บีช ', '', '', '', 0, 1, 0, '2023-09-01 04:55:19', '2023-09-01 04:55:19'),
(370, 'Seaview Patong Hotel โรงแรมซีวีว ป่าตอง ', 'Seaview Patong Hotel โรงแรมซีวีว ป่าตอง ', '', '', '', 0, 1, 0, '2023-09-01 04:55:19', '2023-09-01 04:55:19'),
(371, 'Skyview Resort Patong Beach Hotel สกายวิว รีสอร์ท ภูเก็ต ป่าตอง บีช ', 'Skyview Resort Patong Beach Hotel สกายวิว รีสอร์ท ภูเก็ต ป่าตอง บีช ', '', '', '', 0, 1, 0, '2023-09-01 04:55:19', '2023-09-01 04:55:19'),
(372, 'Thanthip Beach Resort ฐานทิพย์ บีช รีสอร์ท', 'Thanthip Beach Resort ฐานทิพย์ บีช รีสอร์ท', '', '', '', 0, 1, 0, '2023-09-01 04:55:19', '2023-09-01 04:55:19'),
(373, 'The Ashlee Heights Patong Hotel & Suites ดิ แอชลี ไฮท์ ป่าตอง โฮเทล แอนด์ สวีท', 'The Ashlee Heights Patong Hotel & Suites ดิ แอชลี ไฮท์ ป่าตอง โฮเทล แอนด์ สวีท', '', '', '', 0, 1, 0, '2023-09-01 04:55:19', '2023-09-01 04:55:19'),
(374, 'The Bliss Phuket เดอะ บลิส ภูเก็ต', 'The Bliss Phuket เดอะ บลิส ภูเก็ต', '', '', '', 0, 1, 0, '2023-09-01 04:55:19', '2023-09-01 04:55:19'),
(375, 'The Bloc Hotel โรงแรมเดอะบล็อค ', 'The Bloc Hotel โรงแรมเดอะบล็อค ', '', '', '', 0, 1, 0, '2023-09-01 04:55:19', '2023-09-01 04:55:19'),
(376, 'The Lantern Resorts Patong เดอะแลนเทิร์น รีสอร์ท ป่าตอง ', 'The Lantern Resorts Patong เดอะแลนเทิร์น รีสอร์ท ป่าตอง ', '', '', '', 0, 1, 0, '2023-09-01 04:55:19', '2023-09-01 04:55:19'),
(377, 'The Marina Phuket Hotel โรงแรมเดอะ มารีนา ภูเก็ต ', 'The Marina Phuket Hotel โรงแรมเดอะ มารีนา ภูเก็ต ', '', '', '', 0, 1, 0, '2023-09-01 04:55:19', '2023-09-01 04:55:19'),
(378, 'The Nature Phuket เดอะ เนเจอร์ ภูเก็ต', 'The Nature Phuket เดอะ เนเจอร์ ภูเก็ต', '', '', '', 0, 1, 0, '2023-09-01 04:55:19', '2023-09-22 06:53:40'),
(379, 'THE ROYAL PARADISE HOTEL & SPA เดอะรอยัล พาราไดซ์ โฮเต็ล แอนด์ สปา ', 'THE ROYAL PARADISE HOTEL & SPA เดอะรอยัล พาราไดซ์ โฮเต็ล แอนด์ สปา ', '', '', '', 0, 1, 0, '2023-09-01 04:55:19', '2023-09-01 04:55:19'),
(380, 'The Senses Resort & Pool Villas, PHUKET  เดอะ เซ็นเซ็ท ', 'The Senses Resort & Pool Villas, PHUKET  เดอะ เซ็นเซ็ท ', '', '', '', 0, 1, 0, '2023-09-01 04:55:19', '2023-09-01 04:55:19'),
(381, '7Q Bangla Hotel เซเว่นคิว บางลา', '7Q Bangla Hotel เซเว่นคิว บางลา', '', '', '', 0, 1, 0, '2023-09-01 04:55:19', '2023-09-28 07:19:10'),
(382, 'AMATARA WELLNESS RESORT อมาธารา เวลเลย์เซอร์ รีสอร์ท', 'AMATARA WELLNESS RESORT อมาธารา เวลเลย์เซอร์ รีสอร์ท', '', '', '', 0, 0, 1, '2023-09-01 04:55:20', '2023-09-22 05:25:06'),
(383, 'BANDARA PHUKET BEACH RESORT บัญดารา ภูเก็ต บีช รีสอร์ต', 'BANDARA PHUKET BEACH RESORT บัญดารา ภูเก็ต บีช รีสอร์ต', '', '', '', 0, 1, 0, '2023-09-01 04:55:20', '2023-09-01 04:55:20'),
(384, 'BANDARA VILLAS PHUKET บัญดารา วิลล่า ภูเก็ต ', 'BANDARA VILLAS PHUKET บัญดารา วิลล่า ภูเก็ต ', '', '', '', 0, 1, 0, '2023-09-01 04:55:20', '2023-09-01 04:55:20'),
(385, 'CAPE PANWA HOTEL โรงแรมเคปพันวา', 'CAPE PANWA HOTEL โรงแรมเคปพันวา', '', '', '', 0, 1, 0, '2023-09-01 04:55:20', '2023-09-01 04:55:20'),
(386, 'CROWNE PLAZA PHUKET PANWA BEACH คราวน์ พลาซา ภูเก็ต พันวา บีช', 'CROWNE PLAZA PHUKET PANWA BEACH คราวน์ พลาซา ภูเก็ต พันวา บีช', '', '', '', 0, 1, 0, '2023-09-01 04:55:20', '2023-09-01 04:55:20'),
(387, 'THE MANGROVE PANWA PHUKET RESORT เดอะ แมนกรูฟ พันวา ภูเก็ต  รีสอร์ท', 'THE MANGROVE PANWA PHUKET RESORT เดอะ แมนกรูฟ พันวา ภูเก็ต  รีสอร์ท', '', '', '', 0, 1, 0, '2023-09-01 04:55:20', '2023-09-01 04:55:20'),
(388, 'PANWA BOUTIQUE BEACHFRONT พันวา บูทิก บีชฟรอนต์', 'PANWA BOUTIQUE BEACHFRONT พันวา บูทิก บีชฟรอนต์', '', '', '', 0, 0, 1, '2023-09-01 04:55:20', '2023-09-22 06:00:57'),
(389, 'PULLMAN PHUKET PANWA BEACH RESORT พูลแมน ภูเก็ต พันวา บีช รีสอร์ท ', 'PULLMAN PHUKET PANWA BEACH RESORT พูลแมน ภูเก็ต พันวา บีช รีสอร์ท ', '', '', '', 0, 0, 1, '2023-09-01 04:55:20', '2023-09-22 06:15:30'),
(390, 'SRI PANWA PHUKET โรงแรมศรีพันวา ภูเก็ต', 'SRI PANWA PHUKET โรงแรมศรีพันวา ภูเก็ต', '', '', '', 0, 1, 0, '2023-09-01 04:55:20', '2023-09-01 04:55:20'),
(391, 'Amatara Wellness Resort อมาธารา เวลเลย์เซอร์ รีสอร์ท', 'Amatara Wellness Resort อมาธารา เวลเลย์เซอร์ รีสอร์ท', '', '', '', 0, 1, 0, '2023-09-01 04:55:20', '2023-09-01 04:55:20'),
(392, 'CAPE PANWA HOTEL โรงแรมเคปพันวา', 'CAPE PANWA HOTEL โรงแรมเคปพันวา', '', '', '', 0, 0, 1, '2023-09-01 04:55:20', '2023-09-22 05:38:12'),
(393, 'Cloud 19 Panwa คลาวด์ 19 พันวา', 'Cloud 19 Panwa คลาวด์ 19 พันวา', '', '', '', 0, 1, 0, '2023-09-01 04:55:20', '2023-09-01 04:55:20'),
(394, 'Goodnight Phuket Villa Hotel กู๊ดไนท์ ภูเก็ต วิลลา', 'Goodnight Phuket Villa Hotel กู๊ดไนท์ ภูเก็ต วิลลา', '', '', '', 0, 1, 0, '2023-09-01 04:55:20', '2023-09-01 04:55:20'),
(395, 'KantaryBay Hotel Phuket โรงแรมแคนทารี เบย์ ภูเก็ต', 'KantaryBay Hotel Phuket โรงแรมแคนทารี เบย์ ภูเก็ต', '', '', '', 0, 1, 0, '2023-09-01 04:55:20', '2023-09-01 04:55:20'),
(396, 'My Beach Resort Phuket มาย บีช รีสอร์ท ภูเก็ต', 'My Beach Resort Phuket มาย บีช รีสอร์ท ภูเก็ต', '', '', '', 0, 1, 0, '2023-09-01 04:55:20', '2023-09-01 04:55:20'),
(397, 'PULLMAN PHUKET PANWA BEACH RESORT พูลแมน ภูเก็ต พันวา บีช รีสอร์ท ', 'PULLMAN PHUKET PANWA BEACH RESORT พูลแมน ภูเก็ต พันวา บีช รีสอร์ท ', '', '', '', 0, 1, 0, '2023-09-01 04:55:20', '2023-09-01 04:55:20'),
(398, 'Sri panwa, Phuket ศรีพันวา ภูเก็ต ', 'Sri panwa, Phuket ศรีพันวา ภูเก็ต ', '', '', '', 0, 1, 0, '2023-09-01 04:55:20', '2023-09-01 04:55:20'),
(399, 'THE MANGROVE PANWA PHUKET RESORT เดอะ แมนกรูฟ พันวา ภูเก็ต  รีสอร์ท', 'THE MANGROVE PANWA PHUKET RESORT เดอะ แมนกรูฟ พันวา ภูเก็ต  รีสอร์ท', '', '', '', 0, 0, 1, '2023-09-01 04:55:20', '2023-09-22 06:23:20'),
(400, 'X10 Seaview Suites เอ็กเทน ซีวิว', 'X10 Seaview Suites เอ็กเทน ซีวิว', '', '', '', 0, 1, 0, '2023-09-01 04:55:20', '2023-09-01 04:55:20'),
(401, 'BLUE BEACH GRAND RESORT AND SPA บลู บีช แกรนด์ รีสอร์ท แอนด์ สปา', 'BLUE BEACH GRAND RESORT AND SPA บลู บีช แกรนด์ รีสอร์ท แอนด์ สปา', '', '', '', 0, 0, 1, '2023-09-01 04:55:20', '2023-09-22 05:32:46'),
(402, 'MANGOSTEEN RESORT & SPA แมงโก้สทีน รีสอร์ท แอนด์ สปา ', 'MANGOSTEEN RESORT & SPA แมงโก้สทีน รีสอร์ท แอนด์ สปา ', '', '', '', 0, 1, 0, '2023-09-01 04:55:20', '2023-09-01 04:55:20'),
(403, 'THE VIJITT RESORT PHUKET เดอะวิจิตรรีสอร์ทภูเก็ต', 'THE VIJITT RESORT PHUKET เดอะวิจิตรรีสอร์ทภูเก็ต', '', '', '', 0, 1, 0, '2023-09-01 04:55:21', '2023-09-01 04:55:21'),
(404, 'Babylon Pool Villas บาบิลอน พูล วิลล่า', 'Babylon Pool Villas บาบิลอน พูล วิลล่า', '', '', '', 0, 1, 0, '2023-09-01 04:55:21', '2023-09-01 04:55:21'),
(405, 'BLUE BEACH GRAND RESORT AND SPA บลู บีช แกรนด์ รีสอร์ท แอนด์ สปา', 'BLUE BEACH GRAND RESORT AND SPA บลู บีช แกรนด์ รีสอร์ท แอนด์ สปา', '', '', '', 0, 1, 0, '2023-09-01 04:55:21', '2023-09-01 04:55:21'),
(406, 'Casabay Luxury Pool Villas คาซาเบย์ ลักชัวรี พูลวิลล่า', 'Casabay Luxury Pool Villas คาซาเบย์ ลักชัวรี พูลวิลล่า', '', '', '', 0, 0, 1, '2023-09-01 04:55:21', '2023-09-22 05:39:14'),
(407, 'Friendship Beach Resort & Atmanjai Wellness Spa โรงแรมเฟรนด์ชิปบีช รีสอร์ท แอนด์ อัตมันไจ เวลเนส สปา', 'Friendship Beach Resort & Atmanjai Wellness Spa โรงแรมเฟรนด์ชิปบีช รีสอร์ท แอนด์ อัตมันไจ เวลเนส สปา', '', '', '', 0, 1, 0, '2023-09-01 04:55:21', '2023-09-01 04:55:21'),
(408, 'Lady Naya Villas เลดี้ นายะ วิลล่า', 'Lady Naya Villas เลดี้ นายะ วิลล่า', '', '', '', 0, 0, 1, '2023-09-01 04:55:21', '2023-09-22 05:51:58'),
(409, 'Le Resort and Villas เลอ รีสอร์ท แอนด์ วิลล่า', 'Le Resort and Villas เลอ รีสอร์ท แอนด์ วิลล่า', '', '', '', 0, 0, 1, '2023-09-01 04:55:21', '2023-09-22 05:52:30'),
(410, 'Navatara Phuket Resort นวธารา ภูเก็ต รีสอร์ท', 'Navatara Phuket Resort นวธารา ภูเก็ต รีสอร์ท', '', '', '', 0, 1, 0, '2023-09-01 04:55:21', '2023-09-01 04:55:21'),
(411, 'Phu NaNa Boutique Hotel ภู นานา บูทีค โฮเต็ล ', 'Phu NaNa Boutique Hotel ภู นานา บูทีค โฮเต็ล ', '', '', '', 0, 0, 1, '2023-09-01 04:55:21', '2023-09-22 06:03:59'),
(412, 'Rawai Palm Beach Resort ราไว ปาล์ม บีช รีสอร์ท ', 'Rawai Palm Beach Resort ราไว ปาล์ม บีช รีสอร์ท ', '', '', '', 0, 1, 0, '2023-09-01 04:55:21', '2023-09-01 04:55:21'),
(413, 'Serenity Resort & Residences Phuket เซลิน่า เซเรนิตี้ ราไวย์ ภูเก็ต', 'Serenity Resort & Residences Phuket เซลิน่า เซเรนิตี้ ราไวย์ ภูเก็ต', '', '', '', 0, 1, 0, '2023-09-01 04:55:21', '2023-09-01 04:55:21'),
(414, 'Stay Wellbeing & Lifestyle Resort สเตย์ เวลบีอิ้ง แอนด์ ไลฟ์สไตล์ รีสอร์ท', 'Stay Wellbeing & Lifestyle Resort สเตย์ เวลบีอิ้ง แอนด์ ไลฟ์สไตล์ รีสอร์ท', '', '', '', 0, 1, 0, '2023-09-01 04:55:21', '2023-09-01 04:55:21'),
(415, 'THAMES TARA POOL VILLA RAWAI เทมส์ ธารา พูลวิลล่า ราไวย์', 'THAMES TARA POOL VILLA RAWAI เทมส์ ธารา พูลวิลล่า ราไวย์', '', '', '', 0, 1, 0, '2023-09-01 04:55:21', '2023-09-01 04:55:21'),
(416, 'Tharawalai resort ธาราวาลัย รีสอร์ท ', 'Tharawalai resort ธาราวาลัย รีสอร์ท ', '', '', '', 0, 0, 1, '2023-09-01 04:55:21', '2023-09-22 06:22:07'),
(417, 'The Mangosteen Resort and Spa เดอะ แมงโก้สทีน รีสอร์ท แอนด์ สปา', 'The Mangosteen Resort and Spa เดอะ แมงโก้สทีน รีสอร์ท แอนด์ สปา', '', '', '', 0, 1, 0, '2023-09-01 04:55:21', '2023-09-01 04:55:21'),
(418, 'The View Rawada Phuket', 'เดอะ วิว ราวาดา ภูเก็ต', '', '', '', 0, 1, 0, '2023-09-01 04:55:21', '2023-09-22 07:53:54'),
(419, 'ANANTARA PHUKET LAYAN RESORT  อนันตรา ลายัน ภูเก็ต รีสอร์ท', 'ANANTARA PHUKET LAYAN RESORT  อนันตรา ลายัน ภูเก็ต รีสอร์ท', '', '', '', 0, 1, 0, '2023-09-01 04:55:21', '2023-09-01 04:55:21'),
(420, 'The Pavilions Phuket เดอะ พาวิลเลี่ยน ภูเก็ต', 'The Pavilions Phuket เดอะ พาวิลเลี่ยน ภูเก็ต', '', '', '', 0, 1, 0, '2023-09-01 04:55:21', '2023-09-01 04:55:21'),
(421, 'AYARA HILLTOPS ไอยรา ฮิลล์ทอปส์', 'AYARA HILLTOPS ไอยรา ฮิลล์ทอปส์', '', '', '', 0, 1, 0, '2023-09-01 04:55:21', '2023-09-01 04:55:21'),
(422, 'SURIN PHUKET สุรินทร์ ภูเก็ต', 'SURIN PHUKET สุรินทร์ ภูเก็ต', '', '', '', 0, 1, 0, '2023-09-01 04:55:21', '2023-09-01 04:55:21'),
(423, 'TWINPALMS PHUKET HOTEL โรงแรมทวินปาล์มส์ภูเก็ต', 'TWINPALMS PHUKET HOTEL โรงแรมทวินปาล์มส์ภูเก็ต', '', '', '', 0, 1, 0, '2023-09-01 04:55:22', '2023-09-01 04:55:22'),
(424, 'AMANPURI Resort อมันปุรี  รีสอร์ท', 'AMANPURI Resort อมันปุรี  รีสอร์ท', '', '', '', 0, 0, 1, '2023-09-01 04:55:22', '2023-09-22 05:24:38'),
(425, 'Ayara Hilltops Boutique Resort and Spa ไอยรา ฮิลล์ท็อป บูติก รีสอร์ท แอนด์ สปา ภูเก็ต', 'Ayara Hilltops Boutique Resort and Spa ไอยรา ฮิลล์ท็อป บูติก รีสอร์ท แอนด์ สปา ภูเก็ต', '', '', '', 0, 1, 0, '2023-09-01 04:55:22', '2023-09-01 04:55:22'),
(426, 'The Chava Resort เดอะ ชวา รีสอร์ท', 'The Chava Resort เดอะ ชวา รีสอร์ท', '', '', '', 0, 1, 0, '2023-09-01 04:55:22', '2023-09-01 04:55:22'),
(427, 'The Surin Phuket  เดอะ สุรินทร์', 'The Surin Phuket  เดอะ สุรินทร์', '', '', '', 0, 1, 0, '2023-09-01 04:55:22', '2023-09-01 04:55:22'),
(428, 'Absolute Twin Sand', 'แอปโซลูท ทวินน์ แซนด์', '', '', '', 0, 1, 0, '2023-09-18 07:30:46', '2023-09-18 07:30:46'),
(429, 'I Am O`Tel Patong', 'ไอแอม โอเทล ป่าตอง', '', '', '', 0, 1, 0, '2023-09-21 06:47:29', '2023-09-21 06:47:29'),
(430, 'Hotel A', 'โฮลเทล เอ', '', '', '', 0, 1, 0, '2023-09-21 10:59:55', '2023-09-21 11:05:27'),
(431, 'Hotel B', 'โฮลเทล บี', '', '', '', 0, 0, 1, '2023-09-21 11:05:57', '2023-09-21 11:07:28'),
(432, 'Hotel C', 'โฮลเทล ซี', '', '', '', 0, 0, 1, '2023-09-21 11:15:22', '2023-09-21 11:16:08'),
(433, 'The Natural Resort', 'เดอะ เนเชอรัล รีสอร์ท', '', '', '', 0, 1, 0, '2023-09-22 06:54:27', '2023-09-22 06:54:27'),
(434, 'Villa Sonata', 'วิลล่า โซนาต้า', ' 53/23 Moo 5, Chalong ซอย นากก ตำบล ฉลอง อำเภอเมืองภูเก็ต ภูเก็ต 83130\r\nhttps://maps.app.goo.gl/RtgA6Ypw2cGWH3kr7', '', '', 0, 1, 0, '2023-09-22 07:55:57', '2023-09-22 07:55:57'),
(435, 'Foto Hotel Phuket', 'โฟโต้โฮเทล ภูเก็ต', '', '076 601 398', '', 0, 1, 0, '2023-09-22 08:12:19', '2023-09-22 08:12:19'),
(436, 'GP House Phuket', 'จีพี เฮาส์ ภูเก็ต', '', '', '', 0, 1, 0, '2023-09-22 08:29:38', '2023-09-22 08:29:38'),
(437, 'Beehive Phuket Old Town', 'บึไฮฟ์ ภูเก็ต โอลด์ ทาวน์', '', '', '', 0, 1, 0, '2023-09-23 05:48:50', '2023-09-23 05:50:10'),
(438, 'Mirage Patong Phuket Hotel', 'มิราจ ป่าตอง ภูเก็ต โฮเทล', '', '', '', 0, 1, 0, '2023-09-23 06:03:34', '2023-09-23 06:03:34'),
(439, 'Isara Boutique Hotel and Café', 'ไอสรา บูทิก โฮเต็ล แอนด์ คาเฟ่ ', '', '', '', 0, 1, 0, '2023-09-23 06:05:04', '2023-09-23 06:05:04'),
(440, 'Garden Phuket Hotel', 'การ์เดน ภูเก็ต โฮเทล', '', '', '', 0, 1, 0, '2023-09-23 06:11:16', '2023-09-23 06:11:16'),
(441, 'The Crib Patong', 'เดอะคลิบ ป่าตอง', '', '', '', 0, 1, 0, '2023-10-04 05:36:56', '2023-10-04 05:36:56'),
(442, 'Hostel Our Nomad & โฮสเทล เอาเวอร์ โนแมด ', 'โฮสเทล เอาเวอร์ โนแมด ', '', '', '', 0, 1, 0, '2023-10-04 05:53:06', '2023-10-04 05:53:06'),
(443, 'Triple L Hotel Patong Beach Phuket & ทริปเปิ้ล แอล โฮเทล ป่าตอง บีช.', 'ทริปเปิ้ล แอล โฮเทล ป่าตอง บีช', '', '', '', 0, 1, 0, '2023-10-04 05:58:19', '2023-10-04 05:58:19'),
(444, 'The Charm Resort &  เดอะชาร์ม รีสอร์ท ภูเก็ต', ' เดอะชาร์ม รีสอร์ท ภูเก็ต', '', '', '', 0, 1, 0, '2023-10-04 06:13:22', '2023-10-04 06:13:22'),
(445, 'TBA', 'TBA', '', '', '', 0, 1, 0, '2023-11-08 06:09:47', '2023-11-08 06:09:47'),
(446, 'Princess Seaview Resort and Spa โรงแรมปรินเซสซีวิว รีสอร์ทแอนด์สปา', 'โรงแรมปรินเซสซีวิว รีสอร์ทแอนด์สปา', '', '', '', 0, 1, 0, '2023-11-08 06:15:14', '2023-11-08 06:15:14'),
(447, 'ASHLEE Plaza Hotel & Spa ดิ แอชลี พลาซ่า ป่าตอง โฮเทล แอนด์ สปา(', 'ดิ แอชลี พลาซ่า ป่าตอง โฮเทล แอนด์ สปา(', '', '', '', 0, 1, 0, '2023-11-08 06:34:38', '2023-11-08 06:34:38'),
(448, 'Panwaburi Beachfront Resort  พันวาบุรี บีชฟร้อนท์ รีสอร์ท', ' พันวาบุรี บีชฟร้อนท์ รีสอร์ท', '', '', '', 0, 1, 0, '2023-11-08 07:13:06', '2023-11-08 07:13:06'),
(449, 'เบล แอร์ ป่าตอง ภูเก็ต (Bel Aire Patong, Phuket)', 'เบล แอร์ ป่าตอง ภูเก็ต (Bel Aire Patong, Phuket)', '', '', '', 0, 1, 0, '2023-11-08 07:20:18', '2023-11-08 07:20:18'),
(450, 'โทนี่ รีสอร์ท TONY RESORT', 'โทนี่ รีสอร์ท', '', '', '', 0, 1, 0, '2023-11-10 05:53:11', '2023-11-10 05:53:11'),
(451, 'Oakwood Hotel Journeyhub Phuket โอ๊ควูด โฮเต็ล เจอร์นีย์ฮับ ภูเก็ต', 'โอ๊ควูด โฮเต็ล เจอร์นีย์ฮับ ภูเก็ต', '', '', '', 0, 1, 0, '2023-11-10 06:36:06', '2023-11-10 06:36:06'),
(452, 'Fishermen`s Harbour ฟิชเชอร์แมนส์ ฮาร์เบอร์ เออร์เบิน รีสอร์ต', 'ฟิชเชอร์แมนส์ ฮาร์เบอร์ เออร์เบิน รีสอร์ต', '', '', '', 0, 1, 0, '2023-11-10 06:41:58', '2023-11-10 06:41:58'),
(453, 'The Lunar Patong Phuket', '', '', '', '', 0, 1, 0, '2023-12-03 04:18:10', '2023-12-03 04:18:10'),
(454, 'Bedline Hotel เบดไลน์โฮเทล ', '', '', '', '', 0, 1, 0, '2023-12-06 06:09:43', '2023-12-06 06:09:43'),
(455, 'RK Fashions', '', '', '', '', 0, 1, 0, '2023-12-07 13:15:39', '2023-12-07 13:15:39'),
(456, 'ออร์คิด รีซอร์เทล (Orchid Resortel)', '', '', '', '', 0, 1, 0, '2023-12-12 04:26:35', '2023-12-12 04:26:35'),
(457, 'ป่าตองล็อจ (Patong Lodge Hotel)', '', '', '', '', 0, 1, 0, '2023-12-16 09:27:05', '2023-12-16 09:27:05'),
(458, 'JW Marriott Khao Lak Resort & Spa (เจดับบลิว แมริออท เขาหลัก รีสอร์ท แอนด์ สปา)', 'JW Marriott Khao Lak Resort & Spa (เจดับบลิว แมริออท เขาหลัก รีสอร์ท แอนด์ สปา)', '', '', '', 15, 1, 0, '2024-10-14 09:28:08', '2024-10-14 09:28:08'),
(459, 'Diamond Resort Phuket', 'Diamond Resort Phuket', '', '', '', 8, 1, 0, '2024-11-06 04:55:05', '2024-11-06 04:55:05');

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
(1, '2026-02-12', 1, 'IN-0000001', '2026-02-12', '2026-02-13', '2026-02-11', '2026-02-26', 3, 'test system', 0, 0, 1, 0, 1, 1, 1, 0, '2026-02-12 12:20:24', '2026-02-13 14:40:20');

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
(1, 1, 1, 12, '2026-02-12 12:20:24'),
(2, 2, 1, 16, '2026-02-12 12:20:24');

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
(57, 'แก้ใข Booking', '', 16, 1, 2, '2026-02-11 12:00:45');

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

--
-- Dumping data for table `manage_boat`
--

INSERT INTO `manage_boat` (`id`, `travel_date`, `time`, `counter`, `note`, `boat_id`, `guide_id`, `color_id`, `created_at`) VALUES
(1, '2025-12-12', '06:40:00', '', '', 2, 2, 0, '2025-12-22 09:57:04'),
(3, '2025-12-12', '00:00:00', '', '', 3, 0, 0, '2025-12-24 12:23:40'),
(4, '2025-12-12', '08:15:00', '', '', 7, 1, 0, '2025-12-24 12:24:04'),
(5, '2025-12-12', '10:30:00', '', '', 11, 1, 0, '2025-12-24 12:25:44'),
(6, '2025-12-12', '10:30:00', '', '', 12, 2, 0, '2025-12-24 12:26:14');

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
(1, '', '', '30-9510', '089 216 2241', '2025-12-12', '', 0, 1, 1, 1, '2025-12-14 11:45:06'),
(2, '', '', '30-9710', '089 216 2241', '2025-12-12', '', 10, 4, 0, 3, '2025-12-16 15:29:29'),
(3, '', '', '31-3744', '084 515 0015', '2025-12-12', '', 13, 2, 0, 1, '2025-12-18 10:21:03'),
(5, '', '', 'กข 5921 กทม', '089 216 2241', '2025-12-12', '', 12, 3, 0, 2, '2025-12-20 10:49:37');

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
  `manage_id` int(11) NOT NULL,
  `booking_transfer_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `overnight_transfers`
--

INSERT INTO `overnight_transfers` (`id`, `manage_id`, `booking_transfer_id`, `created_at`) VALUES
(1, 1, 1, '2025-12-17 23:37:37');

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
(7, 'Foreign', 'Foreign', '', 0, 1, 2, 4, 1, 0, '2025-11-19 14:35:54', '2025-11-19 15:19:05');

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
(6, '2025-01-01', '2026-01-31', 6, 1, 0, '2025-11-19 14:36:15', '2025-11-19 14:36:15');

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

INSERT INTO `zones` (`id`, `provinces`, `name`, `name_th`, `start_pickup`, `end_pickup`, `pickup`, `dropoff`, `is_approved`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 66, 'Panwa Cape', 'พันวา', '05:30:00', '05:30:00', 1, 1, 1, 0, '2024-09-02 08:36:56', '2024-09-02 08:36:56'),
(2, 66, 'Rawai Beach', 'หาดราไวย์', '05:30:00', '05:30:00', 1, 1, 1, 0, '2024-09-02 08:37:45', '2024-09-02 08:37:45'),
(3, 66, 'Kata, Karon Beach', 'หาดกะตะ, กะรน', '05:45:00', '06:00:00', 1, 1, 1, 0, '2024-09-02 08:38:34', '2024-09-02 08:38:34'),
(4, 66, 'Koh Sire', 'เกาะสิเหร่', '05:30:00', '05:45:00', 1, 1, 1, 0, '2024-09-02 08:39:23', '2024-09-02 08:39:23'),
(5, 66, 'Phuket town', 'เมืองภูเก็ต', '06:00:00', '06:15:00', 1, 1, 1, 0, '2024-09-02 08:39:52', '2024-09-02 08:39:52'),
(6, 66, 'Patong Beach', 'หาดป่าตอง', '06:00:00', '06:15:00', 1, 1, 1, 0, '2024-09-02 08:40:23', '2024-09-02 08:40:23'),
(7, 66, 'Kamala Beach', 'หาดกมลา', '06:00:00', '06:15:00', 1, 1, 1, 0, '2024-09-02 08:41:14', '2024-09-02 08:41:14'),
(8, 66, 'Bang tao Beach, Surin Beach', 'หาดบางเทา, หาดสุรินทร์', '06:15:00', '06:30:00', 1, 1, 1, 0, '2024-09-02 08:42:07', '2024-10-08 09:26:01'),
(9, 66, 'Nai Thon, Nai yang, Phuket Airport', 'ในทอน, ในยาง, สนามบิน', '06:30:00', '06:45:00', 1, 1, 1, 0, '2024-09-02 08:45:25', '2024-10-19 08:17:53'),
(10, 66, 'Mai Khao Beach', 'หาดไม้ขาว', '07:00:00', '07:15:00', 1, 1, 1, 0, '2024-09-02 08:45:54', '2024-09-02 08:45:54'),
(11, 66, 'Klok Kloy Beach', '', '07:15:00', '07:30:00', 1, 1, 1, 0, '2024-09-02 08:46:57', '2024-09-02 08:46:57'),
(12, 65, 'Nam khem pier', 'ท่าเรือน้ำเค็ม', '06:45:00', '07:00:00', 1, 1, 1, 0, '2024-09-02 08:49:12', '2024-09-02 08:49:12'),
(13, 65, 'Bang Sak Beach', 'หาดบางสัก', '07:00:00', '07:15:00', 1, 1, 1, 0, '2024-09-02 08:49:37', '2024-09-02 08:49:37'),
(14, 65, 'Pakarang, Pakweeb Beach', 'แหลมปะการัง, หาดปากวีป', '07:00:00', '07:15:00', 1, 1, 1, 0, '2024-09-02 08:50:27', '2024-09-02 08:50:27'),
(15, 65, 'Khuk-Khak Beach', 'หาดคึกคัก', '07:15:00', '07:30:00', 1, 1, 1, 0, '2024-09-02 08:51:03', '2024-09-02 08:51:03'),
(16, 65, 'Bang nieang Beach', 'หาดบางเนียง', '07:30:00', '07:45:00', 1, 1, 1, 0, '2024-09-02 08:51:43', '2024-09-02 08:51:43'),
(17, 65, 'Nang Thong Beach', 'หาดนางทอง', '07:45:00', '08:00:00', 1, 1, 1, 0, '2024-09-02 08:52:26', '2024-09-02 08:52:26'),
(18, 65, 'Merlin Beach, Lam kan, Thaplamu', 'ทับละมุ', '08:00:00', '08:15:00', 1, 1, 1, 0, '2024-09-02 08:54:25', '2024-09-02 08:54:25'),
(19, 64, 'Krabi town', 'เมืองกระบี่', '05:45:00', '06:00:00', 1, 1, 1, 0, '2024-09-18 02:40:39', '2025-03-01 14:32:56'),
(20, 64, 'Ao-nang Beach', 'หาดอ่าวนาง', '05:30:00', '05:45:00', 1, 1, 1, 0, '2024-09-18 02:41:17', '2024-09-18 02:41:17'),
(21, 64, 'Klong-moung', 'หาดคลองม่วง', '05:30:00', '05:45:00', 1, 1, 1, 0, '2024-09-18 02:42:08', '2024-09-18 02:42:08'),
(22, 66, 'Chalong ', 'ฉลอง', '05:45:00', '06:00:00', 1, 1, 1, 0, '2024-10-09 03:03:15', '2024-10-09 03:03:15'),
(23, 66, ' Koh Keaw', 'เกาะแก้ว', '06:15:00', '06:30:00', 1, 1, 1, 0, '2024-10-12 11:50:41', '2024-10-15 13:26:05'),
(24, 66, 'Ao Por', 'อ่าวปอ', '06:00:00', '06:00:00', 1, 1, 1, 0, '2024-10-14 01:42:56', '2024-10-14 01:42:56'),
(25, 66, 'Kathu', 'กระทู้', '06:15:00', '06:30:00', 1, 1, 1, 0, '2024-10-15 06:18:16', '2024-10-15 06:18:16'),
(26, 66, 'Nai Harn', 'ในหาน', '05:30:00', '00:00:00', 1, 1, 1, 0, '2024-10-15 14:14:15', '2024-10-15 14:14:15'),
(27, 66, 'Lame Hin', 'แหลมหิน', '06:15:00', '06:30:00', 1, 1, 1, 0, '2024-10-17 07:32:47', '2024-10-17 07:37:07'),
(28, 66, 'Ao Yon', 'อ่าวยน', '05:30:00', '00:00:00', 1, 1, 1, 0, '2024-10-19 14:08:23', '2024-10-19 14:08:23'),
(29, 66, 'Natai', 'นาใต้', '07:15:00', '07:30:00', 1, 1, 1, 0, '2024-11-04 10:23:20', '2024-11-04 10:23:20'),
(30, 66, 'Thalang', 'ถลาง', '06:30:00', '06:45:00', 1, 1, 1, 0, '2024-11-12 09:28:17', '2024-11-12 09:28:17'),
(31, 65, 'Phang Nga Town', 'เมืองพังงา', '00:00:00', '00:00:00', 1, 1, 1, 0, '2024-11-27 09:13:42', '2024-11-27 09:13:42'),
(32, 66, 'Pa Klok', 'ป่าคลอก', '06:00:00', '06:15:00', 1, 1, 1, 0, '2024-12-12 11:23:38', '2024-12-12 11:23:38'),
(33, 65, 'Khaosok', 'เขาสก', '06:00:00', '06:15:00', 1, 1, 1, 0, '2024-12-17 11:12:24', '2024-12-17 11:12:24'),
(34, 64, 'Ao-Nam Mao', '', '05:30:00', '05:45:00', 1, 1, 1, 0, '2024-12-31 09:38:54', '2024-12-31 09:38:54'),
(35, 65, 'Mueang Phang Nga ', 'เมืองพังงา', '06:15:00', '06:30:00', 1, 1, 1, 0, '2025-01-10 07:55:27', '2025-01-10 07:59:47'),
(36, 66, 'Khok Kloi', 'โคกกลอย', '07:15:00', '07:30:00', 1, 1, 1, 0, '2025-01-16 07:18:33', '2025-01-16 07:18:38'),
(37, 66, 'Laemsai pier', 'ท่าเรือแหลมทราย', '06:00:00', '06:15:00', 1, 1, 1, 0, '2025-01-23 07:27:34', '2025-01-23 07:27:34'),
(38, 66, 'Thai Mueang ', 'ท้ายเหมือง', '07:15:00', '07:30:00', 1, 1, 1, 0, '2025-01-27 11:28:12', '2025-01-27 11:28:18');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `bookings_chrage`
--
ALTER TABLE `bookings_chrage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bookings_discount`
--
ALTER TABLE `bookings_discount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `bookings_no`
--
ALTER TABLE `bookings_no`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `booking_extra_charge`
--
ALTER TABLE `booking_extra_charge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `booking_manage_boat`
--
ALTER TABLE `booking_manage_boat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `booking_manage_transfer`
--
ALTER TABLE `booking_manage_transfer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `booking_paid`
--
ALTER TABLE `booking_paid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `booking_payment`
--
ALTER TABLE `booking_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `booking_products`
--
ALTER TABLE `booking_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `booking_product_rates`
--
ALTER TABLE `booking_product_rates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `booking_status`
--
ALTER TABLE `booking_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `booking_transfer`
--
ALTER TABLE `booking_transfer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=460;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `invoice_bookings`
--
ALTER TABLE `invoice_bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `manage_boat`
--
ALTER TABLE `manage_boat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `manage_transfer`
--
ALTER TABLE `manage_transfer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product_periods`
--
ALTER TABLE `product_periods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
