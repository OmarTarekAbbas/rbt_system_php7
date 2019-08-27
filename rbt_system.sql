-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Aug 27, 2019 at 11:29 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.2.15

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
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `aggregators`
--

INSERT INTO `aggregators` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'aggregator 1 ', '2017-10-16 08:15:37', '2017-10-16 08:15:37'),
(2, 'aggregator 2', '2019-02-12 07:39:57', '2019-02-12 07:39:57'),
(3, 'aggregator 3', '2019-02-13 08:20:15', '2019-02-13 08:20:15');

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

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`id`, `content_title`, `content_type`, `path`, `image_preview`, `internal_coding`, `provider_id`, `user_id`, `occasion_id`, `created_at`, `updated_at`) VALUES
(7, 'mashria', 'image', '/uploads/content/2019-08-26/1566824882203.jpg', NULL, 7, 3, NULL, 2, '2019-08-25 13:32:00', '2019-08-26 11:08:02'),
(8, 'mashria', 'image', 'uploads/content/2019-08-25/mashria.wav', NULL, 8, 2, NULL, 1, '2019-08-25 13:32:00', '2019-08-25 13:32:00'),
(10, 'mashria', 'video', '/uploads/content/2019-08-26/1566824917306.mp4', NULL, 10, 2, NULL, 2, '2019-08-25 13:32:00', '2019-08-26 11:08:37'),
(12, 'mashria', 'image', 'uploads/content/2019-08-26/mashria.wav', NULL, 12, 2, NULL, 1, '2019-08-26 07:18:21', '2019-08-26 07:18:21'),
(15, 'mashria', 'audio', '/uploads/content/2019-08-26/1566824971963.wav', NULL, 15, 2, NULL, 1, '2019-08-26 07:18:21', '2019-08-26 11:09:31'),
(18, 'mashria', 'audio', '/uploads/content/2019-08-26/1566824979385.wav', NULL, 18, 6, NULL, 3, '2019-08-26 07:18:21', '2019-08-26 11:09:39'),
(21, 'mashria', 'image', 'uploads/content/2019-08-26/mashria.wav', NULL, 21, 2, 1, 1, '2019-08-26 10:41:04', '2019-08-26 10:41:04'),
(22, 'mashria', 'image', 'uploads/content/2019-08-26/mashria.wav', NULL, 22, 2, 1, 1, '2019-08-26 10:41:04', '2019-08-26 10:41:04');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'Egypt', '2017-10-16 08:14:37', '2017-10-16 08:14:37');

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
(3, 'Category 2', 'nayeli33@example.com', 5, '2019-08-25 10:08:47', '2019-08-25 10:09:12');

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
(31, '2019_08_25_094545_create_contents_table', 2),
(32, '2019_08_25_094920_add_content_id_fk_to_rbts', 2),
(33, '2019_08_25_095042_add_internal_coding_to_rbts', 2),
(34, '2019_08_25_095135_create_departments_table', 2),
(35, '2019_08_25_095157_create_notifications_table', 2);

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
  `seen` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 =not seen , 1 = seen ',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `occasions`
--

CREATE TABLE `occasions` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `occasions`
--

INSERT INTO `occasions` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'occasion 1', '2017-10-16 08:16:15', '2017-10-16 08:16:15'),
(2, 'ramadan', '2017-10-16 13:04:52', '2017-10-16 13:04:52'),
(3, 'occasion 2', '2019-08-25 13:32:00', '2019-08-25 13:32:00');

-- --------------------------------------------------------

--
-- Table structure for table `operators`
--

CREATE TABLE `operators` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `operators`
--

INSERT INTO `operators` (`id`, `title`, `country_id`, `created_at`, `updated_at`) VALUES
(1, 'Etisalat', 1, '2017-10-16 08:15:45', '2017-10-16 08:15:45'),
(2, 'Vodafone', 1, '2017-10-16 08:15:55', '2017-10-16 08:15:55');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `providers`
--

CREATE TABLE `providers` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `providers`
--

INSERT INTO `providers` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'provider 1', '2017-10-16 08:16:03', '2017-10-16 08:16:03'),
(2, 'mishari', '2017-10-17 05:29:02', '2017-10-17 05:29:02'),
(3, 'مشاري العفاسي', '2019-03-13 09:24:33', '2019-03-13 09:24:33'),
(4, 'new', '2019-07-28 08:59:11', '2019-07-28 08:59:11'),
(5, 'Owner', '2019-08-25 13:29:55', '2019-08-25 13:29:55'),
(6, 'mishari2', '2019-08-25 13:32:00', '2019-08-25 13:32:00');

-- --------------------------------------------------------

--
-- Table structure for table `rbts`
--

CREATE TABLE `rbts` (
  `id` int(10) UNSIGNED NOT NULL,
  `track_title_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `track_title_ar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `artist_name_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `artist_name_ar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `album_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `social_media_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `owner` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `track_file` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `operator_id` int(10) UNSIGNED DEFAULT NULL,
  `occasion_id` int(10) UNSIGNED DEFAULT NULL,
  `aggregator_id` int(10) UNSIGNED DEFAULT NULL,
  `type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=old excel , 1=new excel',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `provider_id` int(10) UNSIGNED DEFAULT NULL,
  `content_id` int(10) UNSIGNED DEFAULT NULL,
  `internal_coding` varchar(191) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rbts`
--

INSERT INTO `rbts` (`id`, `track_title_en`, `track_title_ar`, `artist_name_en`, `artist_name_ar`, `album_name`, `code`, `social_media_code`, `owner`, `track_file`, `operator_id`, `occasion_id`, `aggregator_id`, `type`, `created_at`, `updated_at`, `provider_id`, `content_id`, `internal_coding`) VALUES
(1, 'AllahomBalghnaRamadan1438 ', NULL, NULL, NULL, NULL, '5282', NULL, NULL, 'uploads/2019-08-26/AllahomBalghnaRamadan1438 .wav', 1, NULL, 1, 0, '2019-08-26 11:30:02', '2019-08-26 11:30:02', 1, 15, '1_1_1'),
(2, 'AhlElqolobElRahema ', NULL, NULL, NULL, NULL, '5284', NULL, NULL, 'uploads/2019-08-26/AhlElqolobElRahema .wav', 1, NULL, 1, 0, '2019-08-26 11:30:02', '2019-08-26 11:30:02', 1, 15, '2_1_1'),
(3, 'YaOmy ', NULL, NULL, NULL, NULL, '5285', NULL, NULL, 'uploads/2019-08-26/YaOmy .wav', 1, NULL, 1, 0, '2019-08-26 11:30:02', '2019-08-26 11:30:02', 1, 15, '3_1_1'),
(4, 'Radya Any ', NULL, NULL, NULL, NULL, '5289', NULL, NULL, 'uploads/2019-08-26/Radya Any .wav', 1, NULL, 1, 0, '2019-08-26 11:30:02', '2019-08-26 11:30:02', 1, 15, '4_1_1'),
(5, 'ElDeenWassana ', NULL, NULL, NULL, NULL, '52812', NULL, NULL, 'uploads/2019-08-26/ElDeenWassana .wav', 1, NULL, 1, 0, '2019-08-26 11:30:02', '2019-08-26 11:30:02', 1, 15, '5_1_1'),
(6, 'HobElAytam ', NULL, NULL, NULL, NULL, '52814', NULL, NULL, 'uploads/2019-08-26/HobElAytam .wav', 1, NULL, 1, 0, '2019-08-26 11:30:02', '2019-08-26 11:30:02', 1, 15, '6_1_1'),
(7, 'MoushatAlTaraweh ', NULL, NULL, NULL, NULL, '52835', NULL, NULL, 'uploads/2019-08-26/MoushatAlTaraweh .wav', 1, NULL, 1, 0, '2019-08-26 11:30:02', '2019-08-26 11:30:03', 1, 15, '7_1_1'),
(8, 'NaeemElSalah ', NULL, NULL, NULL, NULL, '52836', NULL, NULL, 'uploads/2019-08-26/NaeemElSalah .wav', 1, NULL, 1, 0, '2019-08-26 11:30:03', '2019-08-26 11:30:03', 1, 15, '8_1_1'),
(9, 'SallyAlNaby ', NULL, NULL, NULL, NULL, '52837', NULL, NULL, 'uploads/2019-08-26/SallyAlNaby .wav', 1, NULL, 1, 0, '2019-08-26 11:30:03', '2019-08-26 11:30:03', 1, 15, '9_1_1'),
(10, 'YoumGomaa ', NULL, NULL, NULL, NULL, '52838', NULL, NULL, 'uploads/2019-08-26/YoumGomaa .wav', 1, NULL, 1, 0, '2019-08-26 11:30:03', '2019-08-26 11:30:03', 1, 15, '10_1_1'),
(11, 'SaatoElLayel ', NULL, NULL, NULL, NULL, '52839', NULL, NULL, 'uploads/2019-08-26/SaatoElLayel .wav', 1, NULL, 1, 0, '2019-08-26 11:30:03', '2019-08-26 11:30:03', 1, 15, '11_1_1'),
(12, 'KolohKhayr ', NULL, NULL, NULL, NULL, '52840', NULL, NULL, 'uploads/2019-08-26/KolohKhayr .wav', 1, NULL, 1, 0, '2019-08-26 11:30:03', '2019-08-26 11:30:03', 1, 15, '12_1_1'),
(13, 'KhayrAlSabah ', NULL, NULL, NULL, NULL, '52841', NULL, NULL, 'uploads/2019-08-26/KhayrAlSabah .wav', 1, NULL, 1, 0, '2019-08-26 11:30:03', '2019-08-26 11:30:03', 1, 15, '13_1_1'),
(14, 'BoyotKteer ', NULL, NULL, NULL, NULL, '52842', NULL, NULL, 'uploads/2019-08-26/BoyotKteer .wav', 1, NULL, 1, 0, '2019-08-26 11:30:03', '2019-08-26 11:30:03', 1, 15, '14_1_1'),
(15, 'GhyaboAlAhbab ', NULL, NULL, NULL, NULL, '52843', NULL, NULL, 'uploads/2019-08-26/GhyaboAlAhbab .wav', 1, NULL, 1, 0, '2019-08-26 11:30:03', '2019-08-26 11:30:03', 1, 15, '15_1_1'),
(16, 'MaAgmalAkwanak ', NULL, NULL, NULL, NULL, '52844', NULL, NULL, 'uploads/2019-08-26/MaAgmalAkwanak .wav', 1, NULL, 1, 0, '2019-08-26 11:30:03', '2019-08-26 11:30:03', 1, 15, '16_1_1'),
(17, 'SoubhanAllah ', NULL, NULL, NULL, NULL, '52845', NULL, NULL, 'uploads/2019-08-26/SoubhanAllah .wav', 1, NULL, 1, 0, '2019-08-26 11:30:03', '2019-08-26 11:30:03', 1, 15, '17_1_1'),
(18, 'YaRaeaa ', NULL, NULL, NULL, NULL, '52846', NULL, NULL, 'uploads/2019-08-26/YaRaeaa .wav', 1, NULL, 1, 0, '2019-08-26 11:30:03', '2019-08-26 11:30:03', 1, 15, '18_1_1'),
(19, 'TaqabalSeyamy ', NULL, NULL, NULL, NULL, '52847', NULL, NULL, 'uploads/2019-08-26/TaqabalSeyamy .wav', 1, NULL, 1, 0, '2019-08-26 11:30:03', '2019-08-26 11:30:03', 1, 15, '19_1_1'),
(20, 'AllahYaRAHMAN ', NULL, NULL, NULL, NULL, '52848', NULL, NULL, 'uploads/2019-08-26/AllahYaRAHMAN .wav', 1, NULL, 1, 0, '2019-08-26 11:30:03', '2019-08-26 11:30:03', 1, 15, '20_1_1'),
(21, 'Ewedeny ', NULL, NULL, NULL, NULL, '52849', NULL, NULL, 'uploads/2019-08-26/Ewedeny .wav', 1, NULL, 1, 0, '2019-08-26 11:30:03', '2019-08-26 11:30:03', 1, 15, '21_1_1'),
(22, 'AbelnySoudfa ', NULL, NULL, NULL, NULL, '52850', NULL, NULL, 'uploads/2019-08-26/AbelnySoudfa .wav', 1, NULL, 1, 0, '2019-08-26 11:30:03', '2019-08-26 11:30:04', 1, 15, '22_1_1'),
(23, 'AlShehadatan ', NULL, NULL, NULL, NULL, '52851', NULL, NULL, 'uploads/2019-08-26/AlShehadatan .wav', 1, NULL, 1, 0, '2019-08-26 11:30:04', '2019-08-26 11:30:04', 1, 15, '23_1_1'),
(24, 'LaHamMaaALLAH ', NULL, NULL, NULL, NULL, '52852', NULL, NULL, 'uploads/2019-08-26/LaHamMaaALLAH .wav', 1, NULL, 1, 0, '2019-08-26 11:30:04', '2019-08-26 11:30:04', 1, 15, '24_1_1'),
(25, 'EsmElnaby ', NULL, NULL, NULL, NULL, '52853', NULL, NULL, 'uploads/2019-08-26/EsmElnaby .wav', 1, NULL, 1, 0, '2019-08-26 11:30:04', '2019-08-26 11:30:04', 1, 15, '25_1_1'),
(26, 'HalLakSer ', NULL, NULL, NULL, NULL, '52854', NULL, NULL, 'uploads/2019-08-26/HalLakSer .wav', 1, NULL, 1, 0, '2019-08-26 11:30:04', '2019-08-26 11:30:04', 1, 15, '26_1_1'),
(27, 'EzkoroALLAH ', NULL, NULL, NULL, NULL, '52855', NULL, NULL, 'uploads/2019-08-26/EzkoroALLAH .wav', 1, NULL, 1, 0, '2019-08-26 11:30:04', '2019-08-26 11:30:04', 1, 15, '27_1_1'),
(28, 'FawadtoAmry ', NULL, NULL, NULL, NULL, '52856', NULL, NULL, 'uploads/2019-08-26/FawadtoAmry .wav', 1, NULL, 1, 0, '2019-08-26 11:30:04', '2019-08-26 11:30:04', 1, 15, '28_1_1'),
(29, 'Benty ', NULL, NULL, NULL, NULL, '52857', NULL, NULL, 'uploads/2019-08-26/Benty .wav', 1, NULL, 1, 0, '2019-08-26 11:30:04', '2019-08-26 11:30:04', 1, 15, '29_1_1'),
(30, 'AlMehrab ', NULL, NULL, NULL, NULL, '52858', NULL, NULL, 'uploads/2019-08-26/AlMehrab .wav', 1, NULL, 1, 0, '2019-08-26 11:30:04', '2019-08-26 11:30:04', 1, 15, '30_1_1'),
(31, 'Haqeqa ', NULL, NULL, NULL, NULL, '52859', NULL, NULL, 'uploads/2019-08-26/Haqeqa .wav', 1, NULL, 1, 0, '2019-08-26 11:30:04', '2019-08-26 11:30:04', 1, 15, '31_1_1'),
(32, 'AtterSyamak ', NULL, NULL, NULL, NULL, '52860', NULL, NULL, 'uploads/2019-08-26/AtterSyamak .wav', 1, NULL, 1, 0, '2019-08-26 11:30:04', '2019-08-26 11:30:04', 1, 15, '32_1_1'),
(33, 'AlHawqala ', NULL, NULL, NULL, NULL, '52861', NULL, NULL, 'uploads/2019-08-26/AlHawqala .wav', 1, NULL, 1, 0, '2019-08-26 11:30:04', '2019-08-26 11:30:04', 1, 15, '33_1_1'),
(34, 'AwelKalamy ', NULL, NULL, NULL, NULL, '52862', NULL, NULL, 'uploads/2019-08-26/AwelKalamy .wav', 1, NULL, 1, 0, '2019-08-26 11:30:04', '2019-08-26 11:30:04', 1, 15, '34_1_1'),
(35, 'WaAntaTasoum ', NULL, NULL, NULL, NULL, '52863', NULL, NULL, 'uploads/2019-08-26/WaAntaTasoum .wav', 1, NULL, 1, 0, '2019-08-26 11:30:05', '2019-08-26 11:30:05', 1, 15, '35_1_1'),
(36, 'WadaaRamadan ', NULL, NULL, NULL, NULL, '52864', NULL, NULL, 'uploads/2019-08-26/WadaaRamadan .wav', 1, NULL, 1, 0, '2019-08-26 11:30:05', '2019-08-26 11:30:05', 1, 15, '36_1_1'),
(37, 'AtrafAlKawn ', NULL, NULL, NULL, NULL, '52865', NULL, NULL, 'uploads/2019-08-26/AtrafAlKawn .wav', 1, NULL, 1, 0, '2019-08-26 11:30:05', '2019-08-26 11:30:05', 1, 15, '37_1_1'),
(38, 'HalnaMaaAlQuran ', NULL, NULL, NULL, NULL, '52866', NULL, NULL, 'uploads/2019-08-26/HalnaMaaAlQuran .wav', 1, NULL, 1, 0, '2019-08-26 11:30:05', '2019-08-26 11:30:05', 1, 15, '38_1_1'),
(39, 'AkherKalamElnaby ', NULL, NULL, NULL, NULL, '52867', NULL, NULL, 'uploads/2019-08-26/AkherKalamElnaby .wav', 1, NULL, 1, 0, '2019-08-26 11:30:05', '2019-08-26 11:30:05', 1, 15, '39_1_1'),
(40, 'GhmadEneyk ', NULL, NULL, NULL, NULL, '52868', NULL, NULL, 'uploads/2019-08-26/GhmadEneyk .wav', 1, NULL, 1, 0, '2019-08-26 11:30:05', '2019-08-26 11:30:05', 1, 15, '40_1_1'),
(41, 'RamadanAlTawba ', NULL, NULL, NULL, NULL, '52869', NULL, NULL, 'uploads/2019-08-26/RamadanAlTawba .wav', 1, NULL, 1, 0, '2019-08-26 11:30:05', '2019-08-26 11:30:05', 1, 15, '41_1_1'),
(42, 'TafadalElahey ', NULL, NULL, NULL, NULL, '52870', NULL, NULL, 'uploads/2019-08-26/TafadalElahey .wav', 1, NULL, 1, 0, '2019-08-26 11:30:05', '2019-08-26 11:30:05', 1, 15, '42_1_1'),
(43, 'AlHamdouLELLAH ', NULL, NULL, NULL, NULL, '52871', NULL, NULL, 'uploads/2019-08-26/AlHamdouLELLAH .wav', 1, NULL, 1, 0, '2019-08-26 11:30:05', '2019-08-26 11:30:05', 1, 15, '43_1_1'),
(44, 'AkremnaYaALLAH ', NULL, NULL, NULL, NULL, '52872', NULL, NULL, 'uploads/2019-08-26/AkremnaYaALLAH .wav', 1, NULL, 1, 0, '2019-08-26 11:30:05', '2019-08-26 11:30:05', 1, 15, '44_1_1'),
(45, 'Laylat Al Qadr khayron mn AlDahr ', NULL, NULL, NULL, NULL, '52888', NULL, NULL, 'uploads/2019-08-26/Laylat Al Qadr khayron mn AlDahr .wav', 1, NULL, 1, 0, '2019-08-26 11:30:05', '2019-08-26 11:30:05', 1, 15, '45_1_1');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(10) UNSIGNED NOT NULL,
  `year` int(11) NOT NULL,
  `month` int(10) UNSIGNED NOT NULL,
  `classification` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rbt_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rbt_id` int(10) UNSIGNED DEFAULT NULL,
  `download_no` int(11) DEFAULT NULL,
  `total_revenue` decimal(10,2) NOT NULL,
  `revenue_share` decimal(10,2) NOT NULL,
  `operator_id` int(10) UNSIGNED DEFAULT NULL,
  `provider_id` int(10) UNSIGNED DEFAULT NULL,
  `aggregator_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `year`, `month`, `classification`, `code`, `rbt_name`, `rbt_id`, `download_no`, `total_revenue`, `revenue_share`, `operator_id`, `provider_id`, `aggregator_id`, `created_at`, `updated_at`) VALUES
(1, 2014, 4, 'ay 7aga', '456', 'test 2', 26, 1, '100.00', '80.00', 2, 2, 1, '2017-10-22 06:04:14', '2017-10-22 06:04:14'),
(2, 2014, 4, 'ay 7aga', '456', 'test 2', 25, 1, '100.00', '90.00', 1, 2, 1, '2017-10-22 06:38:59', '2017-10-22 06:38:59'),
(5, 2017, 4, 'class 1', '678', 'test 2', 25, 2, '80.00', '70.00', 1, 1, 1, '2017-10-22 05:17:20', '2017-10-22 05:20:21'),
(6, 2019, 4, 'class 2', '789', 'test 2', 25, 5, '100.00', '80.00', 1, 1, 2, NULL, NULL),
(8, 2019, 3, 'class 1', '852', 'test 2', 25, 3, '60.00', '60.00', 2, 1, 2, '2017-10-23 07:26:23', '2017-10-23 07:21:19');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'super_admin', '2017-10-16 08:12:45', '2017-10-16 08:12:45'),
(2, 'uploader', '2017-10-22 05:37:00', '2017-10-22 05:37:00'),
(3, 'account', '2019-02-12 06:51:25', '2019-02-12 06:51:25');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `aggregator_id` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `profile_img` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `aggregator_id`, `remember_token`, `created_at`, `updated_at`, `profile_img`) VALUES
(1, 'super admin', 'super_admin@ivas.com', '$2y$10$yfLSAzl5/EBu7UuVmqkF5ez048BQ43HaaMzvgStj04vlWnS2R8H3q', NULL, '25ZIIrhkgYKNZFRdf7hzLOw0nNqWhRqwbpoSpmG6ObikTDJAg2AKOo8Lc47E', '2017-10-16 08:11:57', '2019-05-19 06:42:45', ''),
(2, 'uploader ', 'uploader@ivas.com', '$2y$10$sXdicmUu6kjky6OPdC5kouTJMbDM13Tua03Bth4IUZCu4Jn69X3/G', NULL, 'U18BWbn7kEngluKWnFXvluwBNSG3Xu1yMzW6Rllgot2AO8EuAYtFVLHjvwub', '2017-10-22 05:43:39', '2017-10-22 06:22:40', ''),
(3, 'mohamed mahmoud', 'mohamed@ivas.com', '$2y$10$yfLSAzl5/EBu7UuVmqkF5ez048BQ43HaaMzvgStj04vlWnS2R8H3q', 1, 'nJhT8r9RpQIx8yPSntTycrv0dawHfoKOfVwbsZBGpPBa9JR5iaXUcVRQNaRt', '2019-02-12 07:26:58', '2019-05-19 06:46:25', ''),
(5, 'ahmed@ivas.com', 'ahmed@ivas.com', '$2y$10$oD/gcyzcSGREMDvCleS0z.2mwtNHWp5lpHNiQBj65dtf8HMZSycti', 2, 'S59XirgzkN67irC9WSlvTO5jNiUnQsKjt3S83BdJYsBZR78EHbobvm1Fs5Bm', '2019-02-12 10:12:54', '2019-02-12 10:57:52', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_has_permissions`
--

CREATE TABLE `user_has_permissions` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_has_roles`
--

CREATE TABLE `user_has_roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_has_roles`
--

INSERT INTO `user_has_roles` (`role_id`, `user_id`) VALUES
(1, 1),
(2, 2),
(3, 3),
(3, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aggregators`
--
ALTER TABLE `aggregators`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `occasions`
--
ALTER TABLE `occasions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `operators`
--
ALTER TABLE `operators`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `providers`
--
ALTER TABLE `providers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rbts`
--
ALTER TABLE `rbts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
