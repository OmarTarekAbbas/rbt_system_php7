-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2020 at 12:30 PM
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
-- Database: `rbt_system`
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
  `internal_coding` int(11) DEFAULT NULL,
  `provider_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `occasion_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(6, 'C#2020/08/12/1597231823', 3, 'rotana - filters', 2, 0, 70, 'DigiZone', 'DigiZone', 60, 40, '2020-01-01', 1, 1, 1, '2020-12-31', 'Egypt,Kuwait,KSA,UAE,Jordan,Iraq', 'ooredoo - Kuwait,Mobinil - Egypt,Vodafone - Egypt,Zain - Kuwait,Zain - Iraq,STC - KSA,Zain - KSA,Mobily - KSA,Viva - Kuwait,korek tele - Iraq,du - UAE,etisalat - UAE,zain - Jordan,Umniah - Jordan,etisalat - Egypt', 2, 5, '1597231823-12008564.pdf', '25.000$ نسبه الطرف الاول هى 60% في حال تجاوزت ايرادات الخدمه للطرفين مبلغ \r\nو65% للطرف الاول في حال لم تتجاوز هذا المبلغ', '<a href=\"https://ccms.l-sh.me/annexes?search=contract_id:equal:6\"\' class=\"btn btn-default btn-sm\" role=\"button\" aria-disabled=\"true\"><i class=\"fa fa-paper-plane\"></i></a>', '<a href=\"https://ccms.l-sh.me/authorizations?search=contract_id:equal:6\"\' class=\"btn btn-default btn-sm\" role=\"button\" aria-disabled=\"true\"><i class=\"fa fa-paper-plane\"></i></a>', '<a href=\"https://ccms.l-sh.me/copyrights?search=contract_id:equal:6\"\' class=\"btn btn-default btn-sm\" role=\"button\" aria-disabled=\"true\"><i class=\"fa fa-paper-plane\"></i></a>', 'salma adel', 0, '2020-08-12 18:35:54', '2020-08-12 17:30:23', 1),
(4, 'C#2020/08/12/1597224538', 1, 'rebiana', 2, 0, 58, 'rebiana-libya', 'DigiZone', 50, 50, '2020-01-30', 1, 2, 1, '2021-01-29', 'libya', 'libyana - libya,libyana - libya', 2, 8, '1597240045-19013892.pdf', NULL, '<a href=\"https://ccms.l-sh.me/annexes?search=contract_id:equal:4\"\' class=\"btn btn-default btn-sm\" role=\"button\" aria-disabled=\"true\"><i class=\"fa fa-paper-plane\"></i></a>', '<a href=\"https://ccms.l-sh.me/authorizations?search=contract_id:equal:4\"\' class=\"btn btn-default btn-sm\" role=\"button\" aria-disabled=\"true\"><i class=\"fa fa-paper-plane\"></i></a>', '<a href=\"https://ccms.l-sh.me/copyrights?search=contract_id:equal:4\"\' class=\"btn btn-default btn-sm\" role=\"button\" aria-disabled=\"true\"><i class=\"fa fa-paper-plane\"></i></a>', 'salma adel', 0, '2020-08-12 19:47:25', '2020-08-12 15:28:58', 1),
(7, 'C#2020/08/12/1597239849', 9, 'takween - web streaming', 2, 1, 54, 'DigiZone', 'takween', 70, 30, '2020-01-15', 1, 0, 1, '2021-01-14', 'All countries', 'All - All', 2, 3, '1597239849-93653637.pdf', NULL, '<a href=\"https://ccms.l-sh.me/annexes?search=contract_id:equal:7\"\' class=\"btn btn-default btn-sm\" role=\"button\" aria-disabled=\"true\"><i class=\"fa fa-paper-plane\"></i></a>', '<a href=\"https://ccms.l-sh.me/authorizations?search=contract_id:equal:7\"\' class=\"btn btn-default btn-sm\" role=\"button\" aria-disabled=\"true\"><i class=\"fa fa-paper-plane\"></i></a>', '<a href=\"https://ccms.l-sh.me/copyrights?search=contract_id:equal:7\"\' class=\"btn btn-default btn-sm\" role=\"button\" aria-disabled=\"true\"><i class=\"fa fa-paper-plane\"></i></a>', 'salma adel', 0, '2020-08-12 19:44:09', '2020-08-12 19:44:09', 1);

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
-- Table structure for table `contract_services`
--

CREATE TABLE `contract_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `contract_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(2, 'KSA', '2019-02-11 11:12:10', '2019-02-11 11:12:10');

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

-- --------------------------------------------------------

--
-- Table structure for table `first_parties`
--

CREATE TABLE `first_parties` (
  `first_party_id` bigint(20) UNSIGNED NOT NULL,
  `first_party_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_party_joining_date` date NOT NULL DEFAULT '2020-09-10',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(49, '2020_08_27_120502_create_amount_revenu_table', 2);

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

-- --------------------------------------------------------

--
-- Table structure for table `occasions`
--

CREATE TABLE `occasions` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(3, 'Subscription (Alert) included video - audio - gif - jpg - fi', NULL, NULL),
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
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  ADD PRIMARY KEY (`first_party_id`);

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
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `tb_module`
--
ALTER TABLE `tb_module`
  ADD PRIMARY KEY (`module_id`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `amount_revenu`
--
ALTER TABLE `amount_revenu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contracts`
--
ALTER TABLE `contracts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `contract_duration`
--
ALTER TABLE `contract_duration`
  MODIFY `contract_duration_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contract_services`
--
ALTER TABLE `contract_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `first_parties`
--
ALTER TABLE `first_parties`
  MODIFY `first_party_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `occasions`
--
ALTER TABLE `occasions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `operators`
--
ALTER TABLE `operators`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `providers`
--
ALTER TABLE `providers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rbts`
--
ALTER TABLE `rbts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `revenus`
--
ALTER TABLE `revenus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `second_parties`
--
ALTER TABLE `second_parties`
  MODIFY `second_party_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `second_party_types`
--
ALTER TABLE `second_party_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `service_types`
--
ALTER TABLE `service_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_module`
--
ALTER TABLE `tb_module`
  MODIFY `module_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

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
-- Constraints for table `operators`
--
ALTER TABLE `operators`
  ADD CONSTRAINT `operators_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE;

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
