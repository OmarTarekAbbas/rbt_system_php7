-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Oct 11, 2020 at 03:38 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rbt_system_php7`
--

-- --------------------------------------------------------

--
-- Table structure for table `aggregators`
--

CREATE TABLE `aggregators` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aggregators`
--

INSERT INTO `aggregators` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'agg', '2020-09-14 06:50:31', '2020-09-14 06:50:31');

-- --------------------------------------------------------

--
-- Table structure for table `amount_revenu`
--

CREATE TABLE `amount_revenu` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `contract_service_id` bigint(20) UNSIGNED NOT NULL,
  `revenu_id` bigint(20) UNSIGNED NOT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `amount_revenu`
--

INSERT INTO `amount_revenu` (`id`, `contract_service_id`, `revenu_id`, `amount`, `created_at`, `updated_at`) VALUES
(43, 7, 17, '500', NULL, NULL),
(44, 8, 17, '500', NULL, NULL),
(45, 5, 18, '500', NULL, NULL),
(46, 6, 18, '500', NULL, NULL),
(47, 5, 19, '500', NULL, NULL),
(48, 6, 19, '500', NULL, NULL),
(49, 27, 20, '200', NULL, NULL),
(50, 34, 20, '200', NULL, NULL),
(51, 35, 20, '200', NULL, NULL),
(52, 36, 20, '400', NULL, NULL),
(53, 27, 21, '200', NULL, NULL),
(54, 34, 21, '200', NULL, NULL),
(55, 35, 21, '200', NULL, NULL),
(56, 36, 21, '400', NULL, NULL),
(57, 27, 22, '200', NULL, NULL),
(58, 34, 22, '200', NULL, NULL),
(59, 35, 22, '200', NULL, NULL),
(60, 36, 22, '400', NULL, NULL),
(61, 27, 23, '200', NULL, NULL),
(62, 34, 23, '200', NULL, NULL),
(63, 35, 23, '200', NULL, NULL),
(64, 36, 23, '400', NULL, NULL),
(65, 27, 24, '200', NULL, NULL),
(66, 34, 24, '200', NULL, NULL),
(67, 35, 24, '200', NULL, NULL),
(68, 39, 24, '400', NULL, NULL),
(69, 27, 25, '200', NULL, NULL),
(70, 34, 25, '200', NULL, NULL),
(71, 35, 25, '200', NULL, NULL),
(72, 39, 25, '400', NULL, NULL),
(73, 27, 26, '200', NULL, NULL),
(74, 34, 26, '200', NULL, NULL),
(75, 35, 26, '200', NULL, NULL),
(76, 39, 26, '400', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `attachments`
--

CREATE TABLE `attachments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `attachment_code` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#',
  `contract_id` bigint(20) UNSIGNED NOT NULL,
  `attachment_type` tinyint(4) NOT NULL COMMENT '1:annex/2:authorization/3:copyright',
  `attachment_title` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attachment_date` date NOT NULL,
  `attachment_expiry_date` date NOT NULL,
  `contract_expiry_date` date NOT NULL,
  `attachment_pdf` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attachment_status` tinyint(1) NOT NULL COMMENT '1:Active/0:Expired',
  `notes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attachments`
--

INSERT INTO `attachments` (`id`, `attachment_code`, `contract_id`, `attachment_type`, `attachment_title`, `attachment_date`, `attachment_expiry_date`, `contract_expiry_date`, `attachment_pdf`, `attachment_status`, `notes`, `created_at`, `updated_at`) VALUES
(1, 'ALC#2020/08/12/1597231823/1597846560', 6, 2, 'Exclusive content for Rotana flater', '2020-01-01', '2020-12-31', '2020-12-31', 'uploads//attachments/pdf//2020/10/07/1602059725.pdf', 1, NULL, '2020-08-19 14:16:00', '2020-10-07 06:35:25'),
(2, 'ANC#2020/08/12/1597239849/1597242254', 7, 1, 'Adding Chef Ahmed Maghazi\'s channel management', '2020-01-15', '2021-01-14', '2021-01-14', '1597242254-35754824.pdf', 1, NULL, '2020-08-12 20:24:14', NULL),
(3, 'ANC#2020/08/12/1597239849/1597242328', 7, 1, 'Add Hamid Zaid channel management', '2020-01-15', '2021-01-14', '2021-01-14', '1597242328-34879260.pdf', 1, NULL, '2020-08-12 20:25:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE `contents` (
  `id` int(10) UNSIGNED NOT NULL,
  `content_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_preview` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `internal_coding` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `occasion_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `contract_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`id`, `content_title`, `content_type`, `path`, `image_preview`, `internal_coding`, `provider_id`, `user_id`, `occasion_id`, `created_at`, `updated_at`, `contract_id`) VALUES
(1, 'yousef', 'audio', 'uploads/content/2020-09-16/1.wav', NULL, '1', 2, 1, 7, '2020-09-16 11:44:44', '2020-09-16 11:44:44', NULL),
(2, 'ashraf', 'audio', 'uploads/content/2020-09-16/2.wav', NULL, '2', 3, 1, 8, '2020-09-16 11:44:44', '2020-09-16 11:44:44', 8),
(10, 'content7', 'audio', 'uploads/content/2020-09-17/1.mp3.wav', NULL, '10', 5, 1, 15, '2020-09-17 07:13:41', '2020-09-17 07:13:42', NULL),
(11, 'content8', 'audio', 'uploads/content/2020-09-17/1.mp3.wav', NULL, '11', 5, 1, 15, '2020-09-17 07:13:42', '2020-09-17 07:13:42', NULL),
(12, 'content9', 'audio', 'uploads/content/2020-09-17/1.mp3.wav', NULL, '12', 5, 1, 15, '2020-09-17 07:13:42', '2020-09-17 07:13:42', NULL),
(13, 'content7', 'audio', 'uploads/content/2020-09-17/1.mp3.wav', NULL, '13', 5, 1, 15, '2020-09-17 07:13:52', '2020-09-17 07:13:52', NULL),
(14, 'content8', 'audio', 'uploads/content/2020-09-17/1.mp3.wav', NULL, '14', 5, 1, 15, '2020-09-17 07:13:52', '2020-09-17 07:13:52', 6),
(15, 'content9', 'audio', 'uploads/content/2020-09-17/1.mp3.wav', NULL, '15', 5, 1, 15, '2020-09-17 07:13:52', '2020-09-17 07:13:52', 6),
(16, 'test single', 'audio', '/uploads/content/2020-09-17/1600345528768.wav', NULL, NULL, 2, NULL, 3, '2020-09-17 10:25:28', '2020-09-17 10:25:28', 7);

-- --------------------------------------------------------

--
-- Table structure for table `contracts`
--

CREATE TABLE `contracts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `contract_code` varchar(60) CHARACTER SET latin1 NOT NULL DEFAULT '#CODE',
  `service_type_id` bigint(20) UNSIGNED NOT NULL,
  `contract_label` varchar(250) NOT NULL DEFAULT 'set contract name',
  `first_party_id` bigint(20) UNSIGNED NOT NULL,
  `first_party_select` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0:no | 1:yes',
  `second_party_id` bigint(20) UNSIGNED NOT NULL,
  `first_party` varchar(255) CHARACTER SET latin1 NOT NULL,
  `second_party` varchar(255) CHARACTER SET latin1 NOT NULL,
  `first_party_percentage` tinyint(4) NOT NULL,
  `second_party_percentage` tinyint(4) NOT NULL,
  `contract_date` date NOT NULL DEFAULT '2020-05-28',
  `contract_duration_id` bigint(20) UNSIGNED NOT NULL,
  `renewal_status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0:no | 1:yes | 2:renewal by another one',
  `contract_status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0:terminated/1:active',
  `contract_expiry_date` date DEFAULT NULL,
  `country_title` varchar(255) CHARACTER SET latin1 NOT NULL,
  `operator_title` varchar(255) CHARACTER SET latin1 NOT NULL,
  `copies` tinyint(4) DEFAULT 2,
  `pages` tinyint(4) DEFAULT 10,
  `contract_pdf` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `contract_notes` text DEFAULT NULL,
  `btn_annex` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `btn_auturaisition` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `btn_copyrights` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `entry_by_details` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `entry_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `second_party_type_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contracts`
--

INSERT INTO `contracts` (`id`, `contract_code`, `service_type_id`, `contract_label`, `first_party_id`, `first_party_select`, `second_party_id`, `first_party`, `second_party`, `first_party_percentage`, `second_party_percentage`, `contract_date`, `contract_duration_id`, `renewal_status`, `contract_status`, `contract_expiry_date`, `country_title`, `operator_title`, `copies`, `pages`, `contract_pdf`, `contract_notes`, `btn_annex`, `btn_auturaisition`, `btn_copyrights`, `entry_by_details`, `entry_by`, `created_at`, `updated_at`, `second_party_type_id`) VALUES
(6, 'C#2020/08/12/1597231823', 3, 'rotana - filters', 2, 0, 70, 'DigiZone', 'DigiZone', 60, 40, '2020-01-01', 1, 2, 1, '2020-12-31', 'Egypt,Kuwait,KSA,UAE,Jordan,Iraq', 'ooredoo - Kuwait,Mobinil - Egypt,Vodafone - Egypt,Zain - Kuwait,Zain - Iraq,STC - KSA,Zain - KSA,Mobily - KSA,Viva - Kuwait,korek tele - Iraq,du - UAE,etisalat - UAE,zain - Jordan,Umniah - Jordan,etisalat - Egypt', 2, 5, '1597231823-12008564.pdf', '25.000$ نسبه الطرف الاول هى 60% في حال تجاوزت ايرادات الخدمه للطرفين مبلغ \r\nو65% للطرف الاول في حال لم تتجاوز هذا المبلغ', '<a href=\"https://ccms.l-sh.me/annexes?search=contract_id:equal:6\"\' class=\"btn btn-default btn-sm\" role=\"button\" aria-disabled=\"true\"><i class=\"fa fa-paper-plane\"></i></a>', '<a href=\"https://ccms.l-sh.me/authorizations?search=contract_id:equal:6\"\' class=\"btn btn-default btn-sm\" role=\"button\" aria-disabled=\"true\"><i class=\"fa fa-paper-plane\"></i></a>', '<a href=\"https://ccms.l-sh.me/copyrights?search=contract_id:equal:6\"\' class=\"btn btn-default btn-sm\" role=\"button\" aria-disabled=\"true\"><i class=\"fa fa-paper-plane\"></i></a>', 'salma adel', 0, '2020-08-12 18:35:54', '2020-08-12 17:30:23', 1),
(7, 'C#2020/08/12/1597239849', 9, 'takween - web streaming', 2, 1, 54, 'DigiZone', 'takween', 70, 30, '2020-01-15', 1, 0, 1, '2021-01-14', 'All countries', 'All - All', 2, 3, '1597239849-93653637.pdf', NULL, '<a href=\"https://ccms.l-sh.me/annexes?search=contract_id:equal:7\"\' class=\"btn btn-default btn-sm\" role=\"button\" aria-disabled=\"true\"><i class=\"fa fa-paper-plane\"></i></a>', '<a href=\"https://ccms.l-sh.me/authorizations?search=contract_id:equal:7\"\' class=\"btn btn-default btn-sm\" role=\"button\" aria-disabled=\"true\"><i class=\"fa fa-paper-plane\"></i></a>', '<a href=\"https://ccms.l-sh.me/copyrights?search=contract_id:equal:7\"\' class=\"btn btn-default btn-sm\" role=\"button\" aria-disabled=\"true\"><i class=\"fa fa-paper-plane\"></i></a>', 'salma adel', 0, '2020-08-12 19:44:09', '2020-08-12 19:44:09', 1),
(8, 'C#2020/08/12/1597224538', 1, 'rebiana', 2, 0, 58, 'rebiana-libya', 'DigiZone', 50, 50, '2020-01-30', 1, 2, 1, '2021-01-29', 'libya', 'libyana - libya,libyana - libya', 2, 8, '1597240045-19013892.pdf', NULL, '<a href=\"https://ccms.l-sh.me/annexes?search=contract_id:equal:4\"\' class=\"btn btn-default btn-sm\" role=\"button\" aria-disabled=\"true\"><i class=\"fa fa-paper-plane\"></i></a>', '<a href=\"https://ccms.l-sh.me/authorizations?search=contract_id:equal:4\"\' class=\"btn btn-default btn-sm\" role=\"button\" aria-disabled=\"true\"><i class=\"fa fa-paper-plane\"></i></a>', '<a href=\"https://ccms.l-sh.me/copyrights?search=contract_id:equal:4\"\' class=\"btn btn-default btn-sm\" role=\"button\" aria-disabled=\"true\"><i class=\"fa fa-paper-plane\"></i></a>', 'salma adel', 0, '2020-08-12 19:47:25', '2020-08-12 15:28:58', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contract_duration`
--

CREATE TABLE `contract_duration` (
  `contract_duration_id` bigint(20) UNSIGNED NOT NULL,
  `contract_duration_title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'add a duration',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contract_items`
--

CREATE TABLE `contract_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `item` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_ids` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contract_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contract_services`
--

CREATE TABLE `contract_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `contract_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contract_services`
--

INSERT INTO `contract_services` (`id`, `contract_id`, `title`, `created_at`, `updated_at`) VALUES
(5, 7, 'rebiana 1', '2020-08-30 12:02:32', '2020-09-16 08:54:51'),
(8, 8, 'rotana 2', '2020-08-30 13:23:41', '2020-09-17 10:22:54'),
(27, 6, 'web s 1', '2020-09-16 08:52:35', '2020-09-16 08:52:35'),
(34, 6, 'web s 2', '2020-09-16 09:11:49', '2020-09-16 09:11:49'),
(37, 7, 'service 12', '2020-09-16 11:17:58', '2020-09-16 11:17:58'),
(38, 7, 'sadasda', '2020-09-17 10:23:07', '2020-09-17 10:23:07');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'Egypt', '2019-02-11 11:12:04', '2019-02-11 11:12:04'),
(2, 'KSA', '2019-02-11 11:12:10', '2019-02-11 11:12:10'),
(3, 'All countries', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'USD', '2020-09-13 09:25:52', '2020-09-13 09:25:52'),
(3, 'EGP', '2020-09-13 09:25:59', '2020-09-13 09:25:59'),
(4, 'SAR', '2020-09-13 09:26:05', '2020-09-13 09:29:20');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manager_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `title`, `email`, `manager_id`, `created_at`, `updated_at`) VALUES
(1, 'Dev', 'Dev@i.c', 1, '2020-09-13 09:55:14', '2020-09-13 09:55:14');

-- --------------------------------------------------------

--
-- Table structure for table `first_parties`
--

CREATE TABLE `first_parties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_party_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_party_joining_date` date NOT NULL DEFAULT '2020-09-10',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `first_parties`
--

INSERT INTO `first_parties` (`id`, `first_party_title`, `first_party_joining_date`, `created_at`, `updated_at`) VALUES
(1, 'iVAS', '2013-01-01', NULL, NULL),
(2, 'DigiZone', '2019-01-01', NULL, NULL),
(3, 'Scene Production', '2016-01-01', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_08_01_141233_create_permission_tables', 1),
(4, '2017_08_02_091157_aggregators', 1),
(5, '2017_08_02_091356_countries', 1),
(6, '2017_08_02_091457_operators', 1),
(7, '2017_08_02_091531_providers', 1),
(8, '2017_08_02_091653_occasions', 1),
(9, '2017_08_02_092035_rbts', 1),
(10, '2017_08_02_092417_currencies', 1),
(11, '2017_08_02_092528_types', 1),
(12, '2017_08_02_092853_reports', 1),
(13, '2017_08_02_104125_add_profile_image_to_user', 1),
(14, '2017_08_03_105704_remove_rbt_titke_ar_from_rbt', 1),
(15, '2017_08_07_085506_drop_reports_table', 1),
(16, '2017_08_07_085632_create_reports_table', 1),
(17, '2017_09_17_092342_add_rbt_id_to_reports_table', 1),
(18, '2017_09_17_115811_edit_reports_table_modify_total_and_share_revenue_by_sql', 1),
(19, '2017_10_09_102906_add_some_columns_to_rbts_table_handle_nex_excel', 1),
(20, '2017_10_16_135114_drop_provider_from_rbt', 1),
(21, '2017_10_17_071338_return_back_provider_id_rbt', 1),
(22, '2017_10_17_072304_drop_content_owner_from_rbts', 1),
(23, '2017_10_18_083014_add_foreignkey_to_reports', 1),
(24, '2017_10_22_145452_change_month_datatype', 1),
(25, '2019_02_12_144858_add_aggregator_id_to_users', 1),
(26, '2019_04_22_161443_create_permissions_table', 1),
(27, '2019_04_22_161443_create_role_has_permissions_table', 1),
(28, '2019_04_22_161443_create_roles_table', 1),
(29, '2019_04_22_161443_create_user_has_permissions_table', 1),
(30, '2019_04_22_161443_create_user_has_roles_table', 1),
(31, '2019_04_22_161445_add_foreign_keys_to_role_has_permissions_table', 1),
(32, '2019_04_22_161445_add_foreign_keys_to_user_has_permissions_table', 1),
(33, '2019_04_22_161445_add_foreign_keys_to_user_has_roles_table', 1),
(34, '2019_08_25_094545_create_contents_table', 1),
(35, '2019_08_25_094920_add_content_id_fk_to_rbts', 1),
(36, '2019_08_25_095042_add_internal_coding_to_rbts', 1),
(37, '2019_08_25_095135_create_departments_table', 1),
(38, '2019_08_25_095157_create_notifications_table', 1),
(39, '2020_05_11_214441_create_second_party_types_table', 2),
(40, '2020_05_11_230211_create_second_parties', 2),
(41, '2020_05_14_030552_create_first_parties_table', 2),
(42, '2020_05_14_182622_create_contract_duration_table', 2),
(43, '2020_05_14_222151_create_service_types_table', 2),
(44, '2020_05_14_222152_create_contracts_table', 2),
(45, '2020_08_18_131641_create_revenus_table', 2),
(46, '2020_08_19_103847_add_contracts_module', 2),
(47, '2020_08_26_151035_create_contract_services_table', 2),
(48, '2020_08_27_115354_change_amount_column_in_revenus_table', 2),
(49, '2020_08_27_120502_create_amount_revenu_table', 2),
(50, '2020_05_11_212258_create_percentage_table', 3),
(51, '2019_12_11_093741_create_roadmaps_table', 4),
(52, '2020_09_10_092433_create_provider_contents_table', 4),
(53, '2020_09_10_103857_add_country_id_to_occasions_table', 4),
(54, '2020_09_14_145753_create_amount_revenu_table', 0),
(55, '2020_09_14_145806_create_revenus_table', 0),
(56, '2020_09_16_131331_add_all_countries_to_country', 5),
(57, '2019_04_22_161443_create_settings_table', 6),
(58, '2019_08_25_094545_add_column_contents_table', 7),
(59, '2020_05_17_012301_create_attachments_table', 8),
(71, '2020_10_06_133624_create_templates_table', 9),
(72, '2020_10_06_133626_create_contract_items_table', 9),
(73, '2020_10_06_133627_create_contract_table_items_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `notifier_id` int(11) NOT NULL,
  `notified_id` int(11) NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 =not seen , 1 = seen ',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `notifier_id`, `notified_id`, `subject`, `link`, `seen`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Add New Content You Can Follow It From This Link', 'http://localhost:8080/rbt_system_php7/content/16/edit', 1, '2020-09-17 10:25:28', '2020-10-06 13:00:27');

-- --------------------------------------------------------

--
-- Table structure for table `occasions`
--

CREATE TABLE `occasions` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `country_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `occasions`
--

INSERT INTO `occasions` (`id`, `title`, `created_at`, `updated_at`, `country_id`) VALUES
(2, '10 octoberrrrrrrrr', '2020-09-14 06:52:50', '2020-09-17 07:48:52', 1),
(3, '6 october', '2020-09-16 10:33:26', '2020-09-16 10:33:26', 1),
(7, 'youseffffff', '2020-09-16 11:44:44', '2020-09-17 07:48:45', 1),
(8, 'ashraf', '2020-09-16 11:44:44', '2020-09-16 11:44:44', 2),
(15, 'emaddddddddd', '2020-09-17 07:13:41', '2020-09-17 07:48:58', 2);

-- --------------------------------------------------------

--
-- Table structure for table `operators`
--

CREATE TABLE `operators` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `operators`
--

INSERT INTO `operators` (`id`, `title`, `country_id`, `created_at`, `updated_at`) VALUES
(1, 'etisalat', 1, '2019-02-11 11:12:35', '2019-03-14 06:35:40'),
(4, 'Vodafone', 1, '2019-02-11 13:23:49', '2019-03-14 06:33:53'),
(5, 'Orange', 1, '2019-03-14 06:36:10', '2019-03-14 06:36:10');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `percentage`
--

CREATE TABLE `percentage` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `percentage` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `providers`
--

CREATE TABLE `providers` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `providers`
--

INSERT INTO `providers` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'yosuef', '2020-09-14 06:50:23', '2020-09-14 06:50:23'),
(2, 'yousef', '2020-09-16 11:44:44', '2020-09-16 11:44:44'),
(3, 'ashraf', '2020-09-16 11:44:44', '2020-09-16 11:44:44'),
(4, 'mostafa', '2020-09-16 11:44:44', '2020-09-16 11:44:44'),
(5, 'مشارى', '2020-09-17 06:23:41', '2020-09-17 06:23:41');

-- --------------------------------------------------------

--
-- Table structure for table `provider_contents`
--

CREATE TABLE `provider_contents` (
  `id` int(10) UNSIGNED NOT NULL,
  `roadmap_id` int(10) UNSIGNED NOT NULL,
  `provider_id` int(10) UNSIGNED NOT NULL,
  `content_id` int(10) UNSIGNED NOT NULL,
  `rbt_track_specs` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rbts`
--

CREATE TABLE `rbts` (
  `id` int(10) UNSIGNED NOT NULL,
  `track_title_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `track_title_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `artist_name_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `artist_name_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `album_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `social_media_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `owner` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `track_file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `operator_id` int(10) UNSIGNED DEFAULT NULL,
  `occasion_id` int(10) UNSIGNED DEFAULT NULL,
  `aggregator_id` int(10) UNSIGNED DEFAULT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=old excel , 1=new excel',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `provider_id` int(10) UNSIGNED DEFAULT NULL,
  `content_id` int(10) UNSIGNED DEFAULT NULL,
  `internal_coding` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rbts`
--

INSERT INTO `rbts` (`id`, `track_title_en`, `track_title_ar`, `artist_name_en`, `artist_name_ar`, `album_name`, `code`, `social_media_code`, `owner`, `track_file`, `operator_id`, `occasion_id`, `aggregator_id`, `type`, `created_at`, `updated_at`, `provider_id`, `content_id`, `internal_coding`) VALUES
(1, 'yousef', NULL, NULL, NULL, NULL, '123', NULL, NULL, 'uploads/2020-09-16/9993.wav.wav', 4, 8, 1, 0, '2020-09-16 11:58:48', '2020-09-17 10:06:15', 3, 10, ''),
(2, 'asd', 'asd', 'asd', 'asd', 'asd', '21344', NULL, 'asd', 'uploads/2020-09-20/asd.wav', 5, 3, 1, 1, '2020-09-20 13:29:59', '2020-09-20 13:29:59', 1, 11, '');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(10) UNSIGNED NOT NULL,
  `year` int(11) NOT NULL,
  `month` int(10) UNSIGNED NOT NULL,
  `classification` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rbt_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rbt_id` int(10) UNSIGNED DEFAULT NULL,
  `download_no` int(11) DEFAULT NULL,
  `total_revenue` decimal(10,2) NOT NULL,
  `revenue_share` decimal(10,2) NOT NULL,
  `operator_id` int(10) UNSIGNED DEFAULT NULL,
  `provider_id` int(10) UNSIGNED DEFAULT NULL,
  `aggregator_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `revenus`
--

CREATE TABLE `revenus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `contract_id` bigint(20) UNSIGNED NOT NULL,
  `year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `month` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `source_type` tinyint(4) NOT NULL COMMENT '1- for operator , 2- for aggerator',
  `source_id` bigint(20) UNSIGNED NOT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency_id` bigint(20) UNSIGNED NOT NULL,
  `serivce_type_id` bigint(20) UNSIGNED NOT NULL,
  `is_collected` tinyint(4) NOT NULL,
  `notes` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reports` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `revenus`
--

INSERT INTO `revenus` (`id`, `contract_id`, `year`, `month`, `source_type`, `source_id`, `amount`, `currency_id`, `serivce_type_id`, `is_collected`, `notes`, `reports`, `created_at`, `updated_at`) VALUES
(17, 8, '2020', 'May', 1, 4, '1000', 3, 2, 1, NULL, '4xrTGtUcAoNkQ7WuDbiSac15nsnFmsasEM3GQUsV.pdf', '2020-09-15 09:38:42', '2020-09-15 12:33:02'),
(18, 7, '2015', 'January', 1, 1, '1000', 4, 1, 1, NULL, 'OGFvXM99OnwdVKE43cmrosvSt4WXB3kky0xuGt7F.docx', '2020-09-15 11:25:53', '2020-09-15 12:34:12'),
(19, 7, '2019', 'July', 1, 4, '1000', 4, 4, 2, 'TEST', 'Wzg78kIoP0LIWAG0K6zU4VyELYeUgJJ8TJ1cfIaR.html', '2020-09-15 12:21:19', '2020-09-15 12:21:19'),
(20, 6, '2019', 'June', 2, 26, '1000', 1, 6, 2, 'test', 'OPkaMZyxVmraVdT1qOuPRGzq8iwNzdaLgVJiiE8y.pdf', '2020-09-16 09:31:26', '2020-09-16 09:31:26'),
(21, 6, '2019', 'June', 2, 26, '1000', 1, 6, 2, 'test', 'BMbTkKCEJjTD2PSVRIXlA1x030Y4jp5j43Nu6wtN.pdf', '2020-09-16 09:32:50', '2020-09-16 09:32:50'),
(22, 6, '2019', 'June', 2, 26, '1000', 1, 6, 2, 'test', 'bNH0rnflUhrVgRSxRZMY2xEKpHRG3lucF5V6qLcQ.pdf', '2020-09-16 09:33:02', '2020-09-16 09:33:02'),
(23, 6, '2019', 'June', 2, 26, '1000', 1, 6, 2, 'test', 'H4Nnxm0vZQe2MpBwTERdc22L6O2jIu0HtTrz1SAW.pdf', '2020-09-16 09:35:48', '2020-09-16 09:35:48'),
(24, 6, '2019', 'May', 1, 4, '1000', 3, 9, 1, 'test', 'pfVZTkhhArIuVOXjXtLb4BLEkRey1vYd1NIL0RyZ.pdf', '2020-09-17 11:14:29', '2020-09-17 11:14:29'),
(25, 6, '2019', 'May', 1, 4, '1000', 3, 9, 1, 'test', 'wV7X7f2KYRZt2u2kxFh5Hdbbz6bc98wrwhqPuni3.pdf', '2020-09-17 11:14:29', '2020-09-17 11:14:29'),
(26, 6, '2019', 'May', 1, 5, '1000', 3, 9, 1, 'test', 'h4sfDblcbzc7IP1LARnr8SiQtkgZusI0lZRUF9mr.pdf', '2020-09-17 11:19:13', '2020-09-17 11:19:13');

-- --------------------------------------------------------

--
-- Table structure for table `roadmaps`
--

CREATE TABLE `roadmaps` (
  `id` int(10) UNSIGNED NOT NULL,
  `event_title` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'set event name',
  `event_color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_start_date` date DEFAULT NULL,
  `event_end_date` date DEFAULT NULL,
  `event_status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0:working / 1:complete',
  `country_id` int(10) UNSIGNED NOT NULL,
  `occasion_id` int(10) UNSIGNED NOT NULL,
  `aggregator_id` int(10) UNSIGNED NOT NULL,
  `operator_id` int(10) UNSIGNED NOT NULL,
  `aggregator_support` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `operator_support` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `promotion_support` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `entry_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_priority` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `role_priority`, `created_at`, `updated_at`) VALUES
(1, 'super_admin', 3, '2017-11-09 04:13:14', '2017-11-09 04:13:14'),
(2, 'admin', 2, '2018-01-08 12:40:19', '2018-01-08 12:40:19'),
(3, 'account', 0, '2018-01-08 12:40:19', '2018-01-08 12:40:19');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `second_parties`
--

CREATE TABLE `second_parties` (
  `second_party_id` bigint(20) UNSIGNED NOT NULL,
  `second_party_type_id` bigint(20) UNSIGNED NOT NULL,
  `second_party_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `second_party_joining_date` date NOT NULL DEFAULT '2020-09-10',
  `second_party_terminate_date` date DEFAULT NULL,
  `second_party_status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1:working|0:terminated',
  `second_party_identity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `second_party_cr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `second_party_tc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `second_parties`
--

INSERT INTO `second_parties` (`second_party_id`, `second_party_type_id`, `second_party_title`, `second_party_joining_date`, `second_party_terminate_date`, `second_party_status`, `second_party_identity`, `second_party_cr`, `second_party_tc`, `created_at`, `updated_at`) VALUES
(36, 7, 'yousefffff', '2020-09-01', '2020-09-02', 0, 'uploads//secondparty/id//2020/10/07/1602059564.pdf', 'uploads//secondparty/cr//2020/09/21/1600676555.pdf', 'uploads//secondparty/tc//2020/09/21/1600676555.pdf', '2020-09-21 06:22:35', '2020-10-07 06:32:44'),
(70, 1, 'yousef', '2020-10-01', '2020-10-31', 1, NULL, NULL, NULL, '2020-10-06 09:44:12', '2020-10-06 09:44:12');

-- --------------------------------------------------------

--
-- Table structure for table `second_party_types`
--

CREATE TABLE `second_party_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `second_party_type_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `second_party_type_description` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'set second party type information here!',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `second_party_types`
--

INSERT INTO `second_party_types` (`id`, `second_party_type_title`, `second_party_type_description`, `created_at`, `updated_at`) VALUES
(1, 'Aggregator', 'set second party type information here!', '2020-05-11 20:58:55', NULL),
(2, 'Provider', 'set second party type information here!', '2020-05-11 20:59:17', NULL),
(3, 'Operator', 'set second party type information here!', '2020-05-14 01:34:57', NULL),
(4, 'Content Provider', 'set second party type information here!', '2020-05-14 01:35:21', NULL),
(5, 'Suppliers', 'Sample, hotels,', '2020-05-18 12:04:58', NULL),
(6, 'Client', 'set second party type information here!', '2020-06-28 16:11:46', NULL),
(7, 'TV Channel', 'set second party type information here!', '2020-07-22 20:40:15', NULL),
(8, 'Radio', 'set second party type information here!', '2020-07-22 20:40:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `service_types`
--

CREATE TABLE `service_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_type_title` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_types`
--

INSERT INTO `service_types` (`id`, `service_type_title`, `created_at`, `updated_at`) VALUES
(1, 'VAS (RBT - Alert - IVR - SMS - MMS)', NULL, NULL),
(2, 'RBT', NULL, NULL),
(3, 'Subscription (Alert) included', NULL, '2020-09-17 12:31:15'),
(4, 'SMS', NULL, NULL),
(5, 'MMS', NULL, NULL),
(6, 'IVR', NULL, NULL),
(7, 'Social Media', NULL, NULL),
(8, 'Website', NULL, NULL),
(9, 'Web Application', NULL, NULL),
(10, 'Mobile Application', NULL, NULL),
(11, 'Maintenance', NULL, NULL),
(12, 'Competition', NULL, NULL),
(13, 'Streaming', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type_id` int(11) NOT NULL,
  `order` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_module`
--

CREATE TABLE `tb_module` (
  `module_id` bigint(20) UNSIGNED NOT NULL,
  `module_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `module_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `module_note` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `module_author` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `module_created` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `module_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `module_db` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `module_db_key` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `module_type` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `module_config` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `module_lang` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `templates`
--

CREATE TABLE `templates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_type` tinyint(1) NOT NULL COMMENT '1:In / 2:Out',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `templates`
--

INSERT INTO `templates` (`id`, `title`, `content_type`, `created_at`, `updated_at`) VALUES
(1, 'yosuef', 1, '2020-10-11 11:18:22', '2020-10-11 11:18:22'),
(2, 'عقد استغلال مصنفات فنية', 1, '2018-11-12 06:07:11', '2019-03-27 11:07:13'),
(3, 'عقد استغلال محتوي لتقديم خدمات القيمة المضافة ', 2, '2018-10-25 07:36:19', '2019-03-27 11:07:22'),
(4, 'TEST', 0, '2019-03-27 11:07:47', '2019-03-27 11:07:47'),
(5, 'TEST2', 0, '2019-03-27 11:08:38', '2019-03-27 11:08:38'),
(6, 'yosuef', 0, '2020-07-21 13:56:10', '2020-07-21 13:56:10');

-- --------------------------------------------------------

--
-- Table structure for table `template_items`
--

CREATE TABLE `template_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `template_id` bigint(20) UNSIGNED DEFAULT NULL,
  `item` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `template_items`
--

INSERT INTO `template_items` (`id`, `template_id`, `item`, `created_at`, `updated_at`) VALUES
(1, 1, ' <p class=\"MsoNormal\" dir=\"RTL\" style=\"text-align: right; break-after: avoid;\"><b><span lang=\"AR-SA\" style=\"font-size:\r\n 14.0pt\">   أنه فى يوم   <span id=\"signed_date\">...</span> الموافق </span></b><b><span lang=\"AR-SA\" style=\"font-size:14.0pt;mso-bidi-language:AR-SA;mso-no-proof:no\"> <span id=\"day_name\">......</span>  تحرر هذا العقد بين كل من:<o:p></o:p></span></b></p><p class=\"MsoNormal\" dir=\"RTL\" style=\"mso-pagination:none;page-break-after:avoid;\r\n tab-stops:60.7pt\"><b><span lang=\"AR-SA\" style=\"font-size:14.0pt;\"><o:p> </o:p></span></b></p><p class=\"MsoNormal\" dir=\"RTL\" style=\"text-align: right; margin-right: 40.2pt; text-indent: -20.1pt; line-height: 115%; break-after: avoid;\"><span lang=\"AR-SA\" style=\"font-size:14.0pt;line-height:115%;\"> أولا: السادة / شركة <span id=\"first_part_name\">....</span>\r\n .<o:p></o:p></span></p><p class=\"MsoNormal\" dir=\"RTL\" style=\"text-align: right; margin-right: 40.2pt; text-indent: -20.1pt; line-height: 115%; break-after: avoid;\"><span lang=\"AR-SA\" style=\"font-size:14.0pt;line-height:115%;\"> الكائن مقرها في <span id=\"first_part_address\">...</span>\r\n و لها سجل تجارى رقم <span id=\"first_commercial_register_no\"> .................. </span> و\r\n بطاقة ضريبية رقم <span id=\"first_tax_card_no\"> ........................</span>، و يمثلها فى هذا العقد السيد\r\n <span id=\"first_part_name\">...................</span> بصفته <span id=\"first_part_name\">...................</span>.</span><span dir=\"LTR\"></span><span dir=\"LTR\"></span><span lang=\"AR-SA\" dir=\"LTR\" style=\"font-size:14.0pt;line-height:\r\n 115%;mso-no-proof:no\"><span dir=\"LTR\"></span><span dir=\"LTR\"></span> </span><span lang=\"AR-EG\" style=\"font-size:14.0pt;line-height:115%;mso-no-proof:no\"><o:p></o:p></span></p><p class=\"MsoNormal\" dir=\"RTL\" style=\"margin-right:40.2pt;text-indent:-20.1pt;\r\n line-height:115%;mso-pagination:none;page-break-after:avoid;tab-stops:60.7pt\"><span lang=\"AR-EG\" style=\"font-size:14.0pt;line-height:115%;\"></span><span lang=\"AR-SA\" style=\"font-size:14.0pt;line-height:115%;\"> (ويشار إليه بالطرف\r\n الأول)<o:p></o:p></span></p><p class=\"MsoNormal\" align=\"right\" dir=\"RTL\" style=\"margin-right: 20.1pt; text-indent: -20.1pt; line-height: 115%; break-after: avoid;\"><span lang=\"AR-SA\" style=\"font-size:14.0pt;line-height:\r\n 115%;\"><o:p> </o:p></span></p><p class=\"MsoNormal\" dir=\"RTL\" style=\"text-align: right; margin-right: 40.2pt; text-indent: -20.1pt; line-height: 115%; break-after: avoid;\"><span lang=\"AR-SA\" style=\"font-size:14.0pt;\r\n line-height:115%;\">ثانيا: </span><span lang=\"AR-SA\" style=\"font-size:14.0pt;line-height:115%;mso-bidi-language:AR-SA;\"> السادة / شركة <span id=\"second_part_name\">...</span> .</span></p><p class=\"MsoNormal\" dir=\"RTL\" style=\"text-align: right; margin-right: 40.2pt; text-indent: -20.1pt; line-height: 115%; break-after: avoid;\"><span lang=\"AR-SA\" style=\"font-size:14.0pt;line-height:115%;\"> الكائن مقرها في <span id=\"second_part_address\">.....</span> و لها سجل تجارى رقم <span id=\"second_commercial_register_no\">...................</span> و\r\n بطاقة ضريبية رقم <span id=\"second_tax_card_no\">...................</span>و يمثلها فى هذا العقد السيد\r\n <span id=\"second_part_name\">...................</span> بصفته <span id=\"second_part_name\">...................</span>.</span><span dir=\"LTR\"></span><span dir=\"LTR\"></span><span lang=\"AR-SA\" dir=\"LTR\" style=\"font-size:14.0pt;line-height:\r\n 115%;mso-no-proof:no\"><span dir=\"LTR\"></span><span dir=\"LTR\"></span> </span><span lang=\"AR-EG\" style=\"font-size:14.0pt;line-height:115%;\"></span></p><p class=\"MsoNormal\" dir=\"RTL\" style=\"margin-right:40.2pt;text-indent:-20.1pt;\r\n line-height:115%;mso-pagination:none;page-break-after:avoid;tab-stops:60.7pt\"><span lang=\"AR-EG\" style=\"font-size:14.0pt;line-height:115%;mso-no-proof:no\"></span><span lang=\"AR-SA\" style=\"font-size:14.0pt;line-height:115%;mso-bidi-language:AR-SA;\"> (ويشار إليه بالطرف الثاني)<o:p></o:p></span>\r\n </p>', '2018-11-12 06:08:21', '2019-05-05 09:42:39'),
(2, 1, '<div style=\"margin-right:-1.15pt;text-align: right;\">\r\n<p class=\"MsoNormal\" align=\"center\" dir=\"RTL\" style=\"text-align:center;line-height:\r\n150%\">\r\n<b><u><span lang=\"AR-EG\" style=\"font-size:14.0pt;line-height:150%\">\r\nتمهيـــــد</span></u></b>\r\n</p>\r\n<p class=\"MsoNormal\" align=\"right\" dir=\"RTL\" style=\"text-align: right; line-height: 150%;font-size:14.0pt;\">\r\nالطرف الأول قدم نفسه على أنه هو حاصل على حقوق استغلال مجموعة من المصنفات الفنية والمدرج بيانها في ملاحق او تفويضات هذا العقد ، بما يمكنه من التعاقد عليها و منح الطرف الثانى حق إتاحتها عبر خدمة الـ <span id=\"services\"></span> بشكل حصرى على شبكة  <span id=\"operators\"></span>     \r\n</p>\r\n<p class=\"MsoNormal\" align=\"right\" dir=\"RTL\" style=\"text-align: right; line-height: 150%;font-size:14.0pt;\">\r\nوحيث أن الطرف الثاني يعمل فى مجال تقديم خدمات القيمة المضافة للهاتف المحمول .</p>\r\n<p class=\"MsoNormal\" align=\"right\" dir=\"RTL\" style=\"text-align: right; line-height: 150%;font-size:14.0pt;\">\r\nولما رغب الطرفان فى التعاون فيما بينهما فقد إتفق وتراضى الطرفان بعد أن أقر كل منهما بأهليته القانونية للتعاقد وخلو إرادته من كافة عيوب الرضا على ما يلى:</p>\r\n<div></div></div>', '2018-11-12 06:10:02', '2018-11-14 12:33:13'),
(3, 1, '<p class=\"MsoNormal\" align=\"center\" dir=\"RTL\" style=\"text-align:center;line-height:\r\n150%\"><b><u><span lang=\"AR-EG\" style=\"font-size:14.0pt;line-height:150%\">البند\r\nالأول<o:p></o:p></span></u></b></p>\r\n\r\n<p class=\"MsoNormal\" dir=\"RTL\" style=\"margin-right:.25in;text-align:justify;\r\nline-height:115%;mso-pagination:none;page-break-after:avoid;tab-stops:60.7pt\"><span lang=\"AR-SA\" style=\"font-size:14.0pt;line-height:115%;mso-bidi-language:AR-SA;\r\nmso-no-proof:no\">يعتبر التمهيد السابق جزء لا يتجزأ من هذا العقد ومتمما له\r\nولأحكامة ولا يفسر بدونه.<o:p></o:p></span></p>', '2018-11-12 06:12:25', '2018-11-12 06:12:25'),
(4, 1, '<p class=\"MsoNormal\" align=\"center\" dir=\"RTL\" style=\"text-align:center;line-height:\r\n150%\"><b><u><span lang=\"AR-EG\" style=\"font-size:14.0pt;line-height:150%\">البند\r\nالثانى<o:p></o:p></span></u></b></p>\r\n\r\n<p class=\"MsoNormal\" dir=\"RTL\" style=\"font-size:14.0pt;text-align: right; margin-right: 0.25in; line-height: 115%; break-after: avoid;\"><br></p><p class=\"MsoNormal\" dir=\"RTL\" style=\"text-align: right; margin-right: 0.25in; line-height: 115%; break-after: avoid;font-size:14.0pt;\">منح الطرف الأول الطرف الثانى بموجب هذا العقد الحق الحصرى في إستغلال والتراخيص باستغلال الأغاني والمصنفات الفنية المتضمنه فى ملاحق هذا العقد وكذا المقاطع الغنائية الخاصة بها وصور المطرب المؤدي لها للاستغلال عبر شبكة <span id=\"operators\"></span>             ، بحيث يقوم الطرف الثانى بإستغلالها بشكل حصرى على شبكة <span id=\"operators\"></span>                               بإستخدام خدمات التفاعل الصوتى عبر الهاتف ( خدمة رنين المتصل RBT ) لمستخدمى تلك الخدمات وبحيث يتمكن مستخدم الخدمة من إستغلال المصنفات الفنية بكافة أشكالها للاستماع  عبر الـ RBT  خدمة الكول تون .</p><div style=\"text-align: right;\"><br></div>', '2018-11-12 06:12:44', '2018-11-15 06:46:18'),
(5, 1, '<p class=\"MsoNormal\" align=\"center\" dir=\"RTL\" style=\"text-align:center;line-height:\r\n150%\"><b><u><span lang=\"AR-EG\" style=\"font-size:14.0pt;line-height:150%\">البند\r\nالثالث</span></u></b><span lang=\"AR-SA\" style=\"font-size:14.0pt;line-height:150%;\r\nmso-bidi-language:AR-SA;mso-no-proof:no\"><o:p></o:p></span></p>\r\n\r\n<p class=\"MsoNormal\" dir=\"RTL\" style=\"margin-right:.25in;text-align:justify;\r\nline-height:115%;tab-stops:60.7pt\"><span lang=\"AR-SA\" style=\"font-size:14.0pt;\r\nline-height:115%;mso-bidi-language:AR-SA;mso-no-proof:no\">مقابل الحقوق الممنوحة\r\nمن الطرف الأول للطرف الثانى فى البند الثانى أعلاه يقوم الطرف الثاني بإعطاء\r\nالطرف الأول نسبة تعادل        % (          بالمائة) من صافى الدخل ويعتبر صافى\r\nالدخل هو العائدات النقدية المحصلة والمحققة من تقديم الخدمات محل العقد بعد خصم\r\nحصة شركات الاتصالات وأى مصاريف حكومية خاصة بنشاط خدمات القيمة المضافة على أن\r\nتتم المحاسبة بصفة شهريه ، هذا ويتم إحتساب حصة الطرف الأول بناء على التقارير\r\nالتى تصدر عن شركات الاتصالات والتى تعتبر نهائية وملزمة للطرفين والتى يحق للطرف\r\nالاول الاطلاع عليها ومراجعتها ، مع التزام الطرف الثانى بإرسال تقارير شهرية من\r\nواقع التقارير المالية الصادره عن شركات الاتصالات خلال 10 ايام من تاريخ استلامها\r\nحتى يتسنى للطرف الاول تقديم فاتورة مطالبة لإستلام حصته من صافى الايرادات .<o:p></o:p></span></p>', '2018-11-12 06:13:14', '2018-11-12 06:13:14'),
(6, 1, '<p class=\"MsoNormal\" align=\"center\" dir=\"RTL\" style=\"text-align:center;line-height:\r\n150%\"><b><u><span lang=\"AR-EG\" style=\"font-size:14.0pt;line-height:150%\">البند\r\nالرابع</span></u></b><span lang=\"AR-SA\" style=\"font-size:14.0pt;line-height:150%;\r\nmso-bidi-language:AR-SA;mso-no-proof:no\"><o:p></o:p></span></p><p class=\"MsoNormal\" align=\"center\" dir=\"RTL\" style=\"text-align:center;line-height:\r\n150%\">\r\n\r\n</p><p class=\"MsoNormal\" dir=\"RTL\" style=\"margin-right:.25in;text-align:justify;\r\nline-height:115%;mso-pagination:none;page-break-after:avoid;tab-stops:60.7pt\"><span lang=\"AR-SA\" style=\"font-size:14.0pt;line-height:115%;mso-bidi-language:AR-SA;\r\nmso-no-proof:no\">يتعهد الطرف الأول بأنه يمتلك كافة حقوق استغلال المصنفات\r\nالمذكورة فى تمهيد هذا العقد بما فيها تحويلها وبثها واستخدامها للتليفون المحمول\r\nوبأنه يمتلك الحق بترخيص تلك الحقوق للطرف الثانى ويتعهد بمسئوليته الكاملة أمام\r\nأى طرف ثالث قد يدعى أى حقوق له على تلك المصنفات بما فيهم المؤلفين والملحنين\r\nبحيث لا يكون الطرف الثاني مسؤولا عن أية قضايا أو منازعات تقام علي الطرف الأول\r\nلأسباب  تتعلق بمنحه للطرف الثانى الحقوق\r\nالواردة بهذا العقد، وبحيث يتحمل الطرف الأول المسئولية كاملة في كل قضايا أو\r\nمنازعات تقام علي الطرف الثاني لأسباب تتعلق بمضمون أو محتوى أو ملكية تلك\r\nالمصنفات.</span><span dir=\"LTR\" style=\"font-size:14.0pt;line-height:115%;\r\nmso-bidi-language:AR-SA;mso-no-proof:no\"><o:p></o:p></span></p>', '2018-11-12 06:13:34', '2018-11-12 06:13:34'),
(7, 1, '<p class=\"MsoNormal\" align=\"center\" dir=\"RTL\" style=\"text-align:center;line-height:\r\n150%\"><b><u><span lang=\"AR-EG\" style=\"font-size:14.0pt;line-height:150%\">البند\r\nالخامس</span></u></b><span lang=\"AR-EG\" style=\"font-size:14.0pt;line-height:150%;\r\nmso-no-proof:no\"><o:p></o:p></span></p>\r\n\r\n<p class=\"MsoNormal\" dir=\"RTL\" style=\"margin-right:.25in;text-align:justify;\r\nline-height:115%;mso-pagination:none;page-break-after:avoid;tab-stops:60.7pt\"><span lang=\"AR-SA\" style=\"font-size:14.0pt;line-height:115%;mso-bidi-language:AR-SA;\r\nmso-no-proof:no\">مدة هذا العقد   <span id=\"peroid\"></span> سنه ميلادية وتتجدد تلقائيا ما لم يخطر أحد الطرفين الآخر\r\nبرغبته فى عدم التجديد قبل نهايتها بشهر على الأقل.<o:p></o:p></span></p>', '2018-11-12 06:13:50', '2018-11-13 07:36:33'),
(8, 1, '<p class=\"MsoNormal\" align=\"center\" dir=\"RTL\" style=\"text-align:center;line-height:150%\"><b><u><span style=\"font-size:14.0pt;line-height:150%\">البند\r\nالسادس</span></u></b><span lang=\"AR-SA\" style=\"font-size:14.0pt;line-height:150%;\"></span></p>\r\n\r\n<p class=\"MsoNormal\" align=\"center\" dir=\"RTL\" style=\"text-align:center;line-height:\r\n150%\"><b><u></u></b><b><u><span style=\"font-size:14.0pt;line-height:150%\">سرية المعلومات</span></u></b></p>\r\n\r\n<p class=\"MsoNormal\" dir=\"RTL\" style=\"margin-right:.25in;text-align:justify;\r\nline-height:115%;tab-stops:60.7pt\"><span lang=\"AR-SA\" style=\"font-size:14.0pt;line-height:115%;\">يلتزم كل طرف ويتعهد للطرف الآخر بالمحافظة على سرية جميع\r\nالمعلومات التى تصل إليه بصفته طرفاً فى هذا العقد ويتعهد بأن يبذل قصارى جهده لكي\r\nيحافظ هو وموظفيه والأشخاص التابعين له على سرية هذه المعلومات ، ولا يجوز لأي من\r\nطرفي العقد إفشاء أو إستخدام أي من الأسرار التى قد يطلع عليها بموجب هذا العقد\r\nإلا بعد الحصول على الموافقة الكتابية المسبقة للطرف الآخر.</span></p>', '2018-11-12 06:14:00', '2018-11-12 07:38:33'),
(9, 1, '<p class=\"MsoNormal\" align=\"center\" dir=\"RTL\" style=\"text-align:center;line-height:\r\n150%\"><b><u><span lang=\"AR-EG\" style=\"font-size:14.0pt;line-height:150%\">البند\r\nالسابع ( التنازل عن العقد )</span></u></b></p>\r\n\r\n<p class=\"MsoNormal\" dir=\"RTL\" style=\"margin-right:.25in;text-align:justify;\r\nline-height:115%;mso-pagination:none;page-break-after:avoid;tab-stops:60.7pt\"><span lang=\"AR-SA\" style=\"font-size:14.0pt;line-height:115%;mso-bidi-language:AR-SA;\r\nmso-no-proof:no\">لا يحق للطرفين التنازل أو حوالة هذا العقد أو اي من حقوقه\r\nالواردة فيه أو ملحقاته الي اى طرف آخر الا بعد موافقة الطرف الاخر كتابتة على ذلك\r\n.<o:p></o:p></span></p>', '2018-11-12 06:14:08', '2018-11-12 11:06:16'),
(10, 1, '<p class=\"MsoNormal\" align=\"center\" dir=\"RTL\" style=\"text-align:center;line-height:\r\n150%\"><b><u><span lang=\"AR-EG\" style=\"font-size:14.0pt;line-height:150%\">البند\r\nالثامن ( انهاء العقد )<o:p></o:p></span></u></b></p>\r\n\r\n<p class=\"MsoNormal\" dir=\"RTL\" style=\"margin-right:.25in;text-align:justify;\r\nline-height:115%;mso-pagination:none;page-break-after:avoid;tab-stops:60.7pt\"><span lang=\"AR-SA\" style=\"font-size:14.0pt;line-height:115%;mso-bidi-language:AR-SA;\r\nmso-no-proof:no\">1- عند إنتهاء العقد ، يتوقف الطرف الثانى عن إستغلال محتوى\r\nالطرف الاول , وتقديم كشف الحساب الخاص بالخدمة إلى الطرف الاول حتى تاريخ إنتهاء\r\nالخدمة .</span><span dir=\"LTR\" style=\"font-size:14.0pt;line-height:115%;\r\nmso-bidi-language:AR-SA;mso-no-proof:no\"><o:p></o:p></span></p>\r\n\r\n<p class=\"MsoNormal\" dir=\"RTL\" style=\"margin-right:.25in;text-align:justify;\r\nline-height:115%;mso-pagination:none;page-break-after:avoid;tab-stops:60.7pt\"><span dir=\"RTL\"></span><span dir=\"RTL\"></span><span lang=\"AR-SA\" style=\"font-size:14.0pt;\r\nline-height:115%;mso-bidi-language:AR-SA;mso-no-proof:no\"><span dir=\"RTL\"></span><span dir=\"RTL\"></span>2- إتفق الطرفان على أن الحالات التّالية تعتبر من قبيل الظّروف\r\nالإستثنائيّة أو القوة القاهرة التى تبرّر الإنهاء السّابق من قبل الطّرف الآخر:\r\nالإفلاس، خلال الفترات الإستثنائية كالحروب، الكوارث، الأضطرابات ، تعيين قيم أو\r\nمصفى أو حارس قضائى.</span><span dir=\"LTR\" style=\"font-size:14.0pt;line-height:\r\n115%;mso-bidi-language:AR-SA;mso-no-proof:no\"><o:p></o:p></span></p>\r\n\r\n<p class=\"MsoNormal\" dir=\"RTL\" style=\"margin-right:.25in;text-align:justify;\r\nline-height:115%;mso-pagination:none;page-break-after:avoid;tab-stops:60.7pt\"><span dir=\"RTL\"></span><span dir=\"RTL\"></span><span lang=\"AR-SA\" style=\"font-size:14.0pt;\r\nline-height:115%;mso-bidi-language:AR-SA;mso-no-proof:no\"><span dir=\"RTL\"></span><span dir=\"RTL\"></span>3- يحق لأي من الطرفين إنهاء هذا العقد فوراً ودون الحاجة إلى\r\nإنذار أو أعذار أو إتخاذ أي إجراء قانونى أو قضائى آخر فى حالة إخلال أي من\r\nالطرفين بإلتزاماته او تعهداته الواردة فى هذا العقد ، وذلك شريطة إخطار الطرف\r\nالمخل بما وقع منه من إخلال والتنبيه عليه</span><span dir=\"LTR\"></span><span dir=\"LTR\"></span><span lang=\"AR-SA\" dir=\"LTR\" style=\"font-size:14.0pt;line-height:\r\n115%;mso-bidi-language:AR-SA;mso-no-proof:no\"><span dir=\"LTR\"></span><span dir=\"LTR\"></span> </span><span lang=\"AR-SA\" style=\"font-size:14.0pt;line-height:\r\n115%;mso-bidi-language:AR-SA;mso-no-proof:no\">بعلاجه خلال 15 يوماً من هذا\r\nالإخطار ومرور تلك المدة دون علاج ما وقع منه من إخلال .<o:p></o:p></span></p>', '2018-11-12 06:14:16', '2018-11-12 06:14:16'),
(11, 1, '<p class=\"MsoNormal\" dir=\"RTL\" style=\"text-align: center;line-height: 115%; break-after: avoid;\"><b><u><span lang=\"AR-EG\" style=\"font-size:14.0pt;line-height:115%\">البند التاسع ( الأخطارات\r\nوالعناوين )</span></u></b></p>\r\n\r\n<p class=\"MsoNormal\" dir=\"RTL\" style=\"margin-right:176.05pt;text-align:justify;\r\nline-height:115%;mso-pagination:none;page-break-after:avoid;tab-stops:60.7pt 2.75in\"><span lang=\"AR-SA\" style=\"font-size:14.0pt;line-height:115%;mso-bidi-language:AR-SA;\r\nmso-no-proof:no\">      </span><span lang=\"AR-SA\" style=\"font-size:6.0pt;line-height:115%;mso-bidi-language:AR-SA;\r\nmso-no-proof:no\"><o:p></o:p></span></p>\r\n\r\n<p class=\"MsoNormal\" dir=\"RTL\" style=\"margin-right:.25in;text-align:justify;\r\nline-height:115%;mso-pagination:none;page-break-after:avoid;tab-stops:60.7pt\"><span lang=\"AR-SA\" style=\"font-size:14.0pt;line-height:115%;mso-bidi-language:AR-SA;\r\nmso-no-proof:no\">كافة الاخطارات والمراسلات المتعلقة بهذا العقد تكون صحيحة\r\nومنتجة لاثارها القانونية إذا ما أرسلت بإنذار رسمي علي يد محضر او بالبريد المسجل\r\nعلي العناوين المذكورة اعلاه بالعقد أو أن تسلم إلي الشخص الموجه إليه باليد مقابل\r\nإيصال بالاستلام ، وفي حالة تغيير عنوان المراسلات يلتزم كل طرف بإعلان الطرف\r\nالاخر بعنوان مراسلاته الجديد ، كما اتفق الأطراف على استخدام الرسائل الالكترونية\r\n(</span><span dir=\"LTR\" style=\"font-size:14.0pt;line-height:115%;mso-bidi-language:\r\nAR-SA;mso-no-proof:no\">Emails </span><span dir=\"RTL\"></span><span dir=\"RTL\"></span><span lang=\"AR-SA\" style=\"font-size:14.0pt;line-height:115%;mso-bidi-language:AR-SA;\r\nmso-no-proof:no\"><span dir=\"RTL\"></span><span dir=\"RTL\"></span> ) كوسيلة معتمدة للتخاطب بخصوص الاعمال اليومية\r\nوتفاصيل العمل وتعتبر بمثابة الوثائق الخطية كما تعتبر الرسائل المرسلة من البريد\r\nالالكتروني لأي فريق والمخزنة في نظام الفريق الآخر بمثابة موقعة وموثقة بمجرد إرسالها\r\nدون الحاجة لتوثيقها بأي وسيلة أخرى او توقيعها بتوقيع الكتروني خاص او تخزينها\r\nبشكل خاص.<o:p></o:p></span></p>', '2018-11-12 06:14:23', '2018-11-12 11:07:37'),
(12, 1, ' <p class=\"MsoNormal\" dir=\"RTL\" style=\"margin-right:-1.15pt\"><b><u><span lang=\"AR-EG\">البريد\r\n الألكترونى للطرف الأول</span></u><span lang=\"AR-EG\"> :</span></b><span lang=\"AR-EG\">        <span id=\"first_part_email\"> </span></span></p>\r\n\r\n <p class=\"MsoNormal\" dir=\"RTL\" style=\"margin-right:64.45pt;text-align:justify\"></p>\r\n\r\n <p class=\"MsoNormal\" dir=\"RTL\" style=\"margin-right:64.45pt;text-align:justify\"><b></b></p>\r\n\r\n <p class=\"MsoNormal\" dir=\"RTL\" style=\"margin-right:-1.15pt;text-align:justify\"><b><span lang=\"AR-EG\">الأسم:     <span id=\"first_part_name\">.....................</span>                رقم الموبيل: <span id=\"first_part_phone\"></span></span></b></p>\r\n\r\n <p class=\"MsoNormal\" dir=\"RTL\" style=\"margin-right:64.45pt;text-align:justify\"></p>\r\n\r\n <p class=\"MsoNormal\" dir=\"RTL\" style=\"margin-right:-1.15pt\"><b><u><span lang=\"AR-EG\">البريد\r\n الألكترونى للطرف الثانى</span></u><span lang=\"AR-EG\"> :</span></b><span lang=\"AR-EG\">       <span id=\"second_part_email\"></span></span></p>\r\n\r\n <p class=\"MsoNormal\" dir=\"RTL\" style=\"margin-right:-1.15pt;text-align:justify\"><b><span lang=\"AR-EG\">الأسم:     <span id=\"second_part_name\">.....................</span>                رقم الموبيل: <span id=\"second_part_phone\"></span></span></b></p>\r\n', '2018-11-12 06:14:42', '2019-05-05 09:46:51'),
(13, 1, '<p class=\"MsoNormal\" dir=\"RTL\" style=\"text-align: center;\"><b><span lang=\"AR-EG\" style=\"font-size:14.0pt\">\r\n      <u>البند العاشر<o:p></o:p></u></span></b>\r\n</p>\r\n\r\n<p class=\"MsoNormal\" dir=\"RTL\" style=\"margin-right:-1.15pt\"><span lang=\"AR-SA\" style=\"font-size:14.0pt;mso-bidi-language:AR-SA;mso-no-proof:no\">يخضع هذا العقد\r\nلأحكام القوانين ونظام المحاكم المعمول بهما في جمهورية مصر العربية.</span></p>', '2018-11-12 06:14:58', '2018-11-12 11:32:22'),
(14, 1, '<blockquote style=\"margin: 0 0 0 40px; border: none; padding: 0px;\"><p dir=\"RTL\" style=\"text-align: center; margin: 0in 82.45pt 2pt 0in;\"><b><u><span style=\"font-size:\r\n14.0pt\">البند الحادى عشر</span></u></b></p></blockquote>\r\n\r\n<p dir=\"RTL\" style=\"margin-right:-1.15pt\"><span style=\"font-size:14.0pt;\">حرر هذا العقد\r\nمن نسختين أصليتين بيد كل طرف نسخة  و\r\nالنسخه مكونه من ثلاث ورقات للعمل بها عند الحاجة.<o:p></o:p></span></p>\r\n\r\n<p dir=\"RTL\" style=\"margin-right:-1.15pt\"><span lang=\"AR-SA\" style=\"font-size:14.0pt;\"><o:p> </o:p></span></p>', '2018-11-12 06:15:18', '2018-11-12 11:34:07'),
(15, 1, '<table width=\"100%\" dir=\"rtl\">\r\n<tbody>\r\n<tr><td width=\"50%\"><h3><u>الطرف الاول</u></h3></td><td width=\"50%\"><h3><u>الطرف الثاني</u></h3></td></tr>\r\n<tr><td>شركة/ <span id=\"first_part_name\">....</span> </td><td>شركة/ <span id=\"second_part_name\">....</span> </td></tr>\r\n<tr><td>الاسم :</td><td>الاسم :</td></tr>\r\n<tr><td>الصفة :</td><td>الصفة :</td></tr>\r\n<tr><td><p style=\"line-height:150%;vertical-align:bottom\"><br>التوقيع:</p></td><td><p style=\"line-height:150%;vertical-align:bottom\"><br>التوقيع:</p></td></tr>\r\n<tr><td><p style=\"line-height:250%;vertical-align:bottom\"><br>خاتم الشركة : </p></td><td><p style=\"line-height:250%;vertical-align:bottom\"><br>خاتم الشركة : </p></td></tr>\r\n</tbody></table>', '2018-11-12 06:19:31', '2018-11-13 07:43:02');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'yosuef', '2020-09-17 11:05:42', '2020-09-17 11:05:42');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `profile_img` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aggregator_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `profile_img`, `aggregator_id`) VALUES
(1, 'super admin', 'super_admin@ivas.com', '$2y$10$u2evAW530miwgUb2jcXkTuqIGswxnSQ3DSmX1Ji5rtO3Tx.MtVcX2', 'rZuEmD6bPlK8lMdaoIC1jRvzlLs17XOy5r6MTsGWA1ggFfMGCVaw7bYG3hBQ', '2017-11-09 04:13:14', '2018-11-26 06:11:50', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_has_permissions`
--

CREATE TABLE `user_has_permissions` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_has_roles`
--

CREATE TABLE `user_has_roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_has_roles`
--

INSERT INTO `user_has_roles` (`role_id`, `user_id`) VALUES
(1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aggregators`
--
ALTER TABLE `aggregators`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `amount_revenu`
--
ALTER TABLE `amount_revenu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attachments`
--
ALTER TABLE `attachments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contents_provider_id_foreign` (`provider_id`),
  ADD KEY `contents_user_id_foreign` (`user_id`),
  ADD KEY `contents_occasion_id_foreign` (`occasion_id`);

--
-- Indexes for table `contracts`
--
ALTER TABLE `contracts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contracts_first_party_id_foreign` (`first_party_id`),
  ADD KEY `contracts_second_party_id_foreign` (`second_party_id`),
  ADD KEY `contracts_contract_duration_id_foreign` (`contract_duration_id`),
  ADD KEY `second_party_type_id` (`second_party_type_id`),
  ADD KEY `service_type_id` (`service_type_id`);

--
-- Indexes for table `contract_duration`
--
ALTER TABLE `contract_duration`
  ADD PRIMARY KEY (`contract_duration_id`);

--
-- Indexes for table `contract_items`
--
ALTER TABLE `contract_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contract_id` (`contract_id`);

--
-- Indexes for table `contract_services`
--
ALTER TABLE `contract_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `departments_manager_id_foreign` (`manager_id`);

--
-- Indexes for table `first_parties`
--
ALTER TABLE `first_parties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `occasions`
--
ALTER TABLE `occasions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `occasions_country_id_foreign` (`country_id`);

--
-- Indexes for table `operators`
--
ALTER TABLE `operators`
  ADD PRIMARY KEY (`id`),
  ADD KEY `operators_country_id_foreign` (`country_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `percentage`
--
ALTER TABLE `percentage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `providers`
--
ALTER TABLE `providers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `provider_contents`
--
ALTER TABLE `provider_contents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `provider_contents_roadmap_id_foreign` (`roadmap_id`),
  ADD KEY `provider_contents_provider_id_foreign` (`provider_id`),
  ADD KEY `provider_contents_content_id_foreign` (`content_id`);

--
-- Indexes for table `rbts`
--
ALTER TABLE `rbts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rbts_operator_id_foreign` (`operator_id`),
  ADD KEY `rbts_occasion_id_foreign` (`occasion_id`),
  ADD KEY `rbts_aggregator_id_foreign` (`aggregator_id`),
  ADD KEY `rbts_provider_id_foreign` (`provider_id`),
  ADD KEY `rbts_content_id_foreign` (`content_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reports_operator_id_foreign` (`operator_id`),
  ADD KEY `reports_provider_id_foreign` (`provider_id`),
  ADD KEY `reports_aggregator_id_foreign` (`aggregator_id`),
  ADD KEY `reports_rbt_id_foreign` (`rbt_id`);

--
-- Indexes for table `revenus`
--
ALTER TABLE `revenus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roadmaps`
--
ALTER TABLE `roadmaps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `roadmaps_country_id_foreign` (`country_id`),
  ADD KEY `roadmaps_occasion_id_foreign` (`occasion_id`),
  ADD KEY `roadmaps_aggregator_id_foreign` (`aggregator_id`),
  ADD KEY `roadmaps_operator_id_foreign` (`operator_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `second_parties`
--
ALTER TABLE `second_parties`
  ADD PRIMARY KEY (`second_party_id`),
  ADD KEY `second_parties_second_party_type_id_foreign` (`second_party_type_id`);

--
-- Indexes for table `second_party_types`
--
ALTER TABLE `second_party_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_types`
--
ALTER TABLE `service_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `settings_type_id_foreign` (`type_id`);

--
-- Indexes for table `tb_module`
--
ALTER TABLE `tb_module`
  ADD PRIMARY KEY (`module_id`);

--
-- Indexes for table `templates`
--
ALTER TABLE `templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `template_items`
--
ALTER TABLE `template_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contract_template_id` (`template_id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_has_permissions`
--
ALTER TABLE `user_has_permissions`
  ADD PRIMARY KEY (`user_id`,`permission_id`),
  ADD KEY `user_has_permissions_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `user_has_roles`
--
ALTER TABLE `user_has_roles`
  ADD PRIMARY KEY (`role_id`,`user_id`),
  ADD KEY `user_has_roles_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aggregators`
--
ALTER TABLE `aggregators`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `amount_revenu`
--
ALTER TABLE `amount_revenu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `attachments`
--
ALTER TABLE `attachments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `contracts`
--
ALTER TABLE `contracts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `contract_duration`
--
ALTER TABLE `contract_duration`
  MODIFY `contract_duration_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contract_items`
--
ALTER TABLE `contract_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contract_services`
--
ALTER TABLE `contract_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `first_parties`
--
ALTER TABLE `first_parties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `occasions`
--
ALTER TABLE `occasions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `operators`
--
ALTER TABLE `operators`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `percentage`
--
ALTER TABLE `percentage`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `providers`
--
ALTER TABLE `providers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `provider_contents`
--
ALTER TABLE `provider_contents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rbts`
--
ALTER TABLE `rbts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `revenus`
--
ALTER TABLE `revenus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `roadmaps`
--
ALTER TABLE `roadmaps`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `second_parties`
--
ALTER TABLE `second_parties`
  MODIFY `second_party_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `second_party_types`
--
ALTER TABLE `second_party_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `service_types`
--
ALTER TABLE `service_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_module`
--
ALTER TABLE `tb_module`
  MODIFY `module_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `templates`
--
ALTER TABLE `templates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `template_items`
--
ALTER TABLE `template_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contents`
--
ALTER TABLE `contents`
  ADD CONSTRAINT `contents_occasion_id_foreign` FOREIGN KEY (`occasion_id`) REFERENCES `occasions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `contents_provider_id_foreign` FOREIGN KEY (`provider_id`) REFERENCES `providers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `contents_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `departments`
--
ALTER TABLE `departments`
  ADD CONSTRAINT `departments_manager_id_foreign` FOREIGN KEY (`manager_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `occasions`
--
ALTER TABLE `occasions`
  ADD CONSTRAINT `occasions_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `operators`
--
ALTER TABLE `operators`
  ADD CONSTRAINT `operators_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `provider_contents`
--
ALTER TABLE `provider_contents`
  ADD CONSTRAINT `provider_contents_content_id_foreign` FOREIGN KEY (`content_id`) REFERENCES `contents` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `provider_contents_provider_id_foreign` FOREIGN KEY (`provider_id`) REFERENCES `providers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `provider_contents_roadmap_id_foreign` FOREIGN KEY (`roadmap_id`) REFERENCES `roadmaps` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `rbts`
--
ALTER TABLE `rbts`
  ADD CONSTRAINT `rbts_aggregator_id_foreign` FOREIGN KEY (`aggregator_id`) REFERENCES `aggregators` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rbts_content_id_foreign` FOREIGN KEY (`content_id`) REFERENCES `contents` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rbts_occasion_id_foreign` FOREIGN KEY (`occasion_id`) REFERENCES `occasions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rbts_operator_id_foreign` FOREIGN KEY (`operator_id`) REFERENCES `operators` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rbts_provider_id_foreign` FOREIGN KEY (`provider_id`) REFERENCES `providers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `reports_aggregator_id_foreign` FOREIGN KEY (`aggregator_id`) REFERENCES `aggregators` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reports_operator_id_foreign` FOREIGN KEY (`operator_id`) REFERENCES `operators` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reports_provider_id_foreign` FOREIGN KEY (`provider_id`) REFERENCES `providers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reports_rbt_id_foreign` FOREIGN KEY (`rbt_id`) REFERENCES `rbts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `roadmaps`
--
ALTER TABLE `roadmaps`
  ADD CONSTRAINT `roadmaps_aggregator_id_foreign` FOREIGN KEY (`aggregator_id`) REFERENCES `aggregators` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `roadmaps_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `roadmaps_occasion_id_foreign` FOREIGN KEY (`occasion_id`) REFERENCES `occasions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `roadmaps_operator_id_foreign` FOREIGN KEY (`operator_id`) REFERENCES `operators` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `second_parties`
--
ALTER TABLE `second_parties`
  ADD CONSTRAINT `second_parties_second_party_type_id_foreign` FOREIGN KEY (`second_party_type_id`) REFERENCES `second_party_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_has_permissions`
--
ALTER TABLE `user_has_permissions`
  ADD CONSTRAINT `user_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_has_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_has_roles`
--
ALTER TABLE `user_has_roles`
  ADD CONSTRAINT `user_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_has_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
