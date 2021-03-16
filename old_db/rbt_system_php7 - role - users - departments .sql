-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2020 at 04:40 PM
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
(3, 'superadmin', 'super_admin@ivas.com', 1, '2020-11-08 11:34:10', '2020-11-08 12:35:05'),
(4, 'RBT', 'rbt@ivas.com.eg', 13, '2020-11-08 12:33:23', '2020-11-08 12:33:23'),
(5, 'Subscriptions', 'Operations@ivas.com.eg', 15, '2020-11-08 12:36:10', '2020-11-08 12:38:20'),
(6, 'Digital Media', 'Operations@ivas.com.eg', 16, '2020-11-08 12:37:02', '2020-11-08 12:37:02'),
(7, 'Social Media', 'Social_Media@ivas.com.eg', 17, '2020-11-08 12:39:06', '2020-11-08 12:39:06'),
(8, 'Multimedia', 'Multimedia@ivas.com.eg', 18, '2020-11-08 12:39:38', '2020-11-08 12:39:38'),
(9, 'Development', 'Development@ivas.com.eg', 19, '2020-11-08 12:40:03', '2020-11-08 12:40:03'),
(10, 'IT', 'IT@ivas.com.eg', 20, '2020-11-08 12:40:36', '2020-11-08 12:40:36'),
(11, 'Legal', 'm.alqurashy@ivas.com.eg', 21, '2020-11-08 12:41:33', '2020-11-08 12:41:33'),
(12, 'CEO Assistant', 'dalia.soliman@ivas.com.eg', 22, '2020-11-08 12:42:21', '2020-11-08 12:42:21'),
(13, 'Content', 'Content@ivas.com.eg', 23, '2020-11-08 12:43:36', '2020-11-08 12:43:36'),
(14, 'Quality', 'cr@ivas.com.eg', 24, '2020-11-08 12:45:01', '2020-11-08 12:45:01'),
(15, 'RBT Upload', 'Uploading@ivas.com.eg', 25, '2020-11-08 12:46:02', '2020-11-08 12:46:02'),
(16, 'Reports', 'Financial.Reports@ivas.com.eg', 26, '2020-11-08 12:46:43', '2020-11-08 12:46:43'),
(17, 'Finance', 'finance@digizone.com.kw', 28, '2020-11-08 12:47:19', '2020-11-08 12:47:19');

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
(1, 'super_admin', 3, '2017-11-09 11:13:14', '2017-11-09 11:13:14'),
(8, 'RBT', 0, '2020-11-08 12:05:31', '2020-11-08 12:05:31'),
(9, 'Subscriptions', 0, '2020-11-08 12:05:38', '2020-11-08 12:05:38'),
(10, 'Digital Media', 0, NULL, NULL),
(11, 'Social Media', 0, NULL, NULL),
(12, 'Multimedia', 0, NULL, NULL),
(13, 'Development', 0, NULL, NULL),
(14, 'IT', 0, NULL, NULL),
(15, 'Legal', 0, NULL, NULL),
(16, 'CEO Assistant', 0, NULL, NULL),
(17, 'Content', 0, NULL, NULL),
(18, 'Quality', 0, NULL, NULL),
(19, 'RBT Upload', 0, NULL, NULL),
(20, 'Reports', 0, '2020-11-08 12:27:05', '2020-11-08 12:27:05'),
(21, 'Finance', 0, '2020-11-08 12:27:10', '2020-11-08 12:27:10');

-- --------------------------------------------------------

--
-- Table structure for table `role_route`
--

CREATE TABLE `role_route` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `route_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_route`
--

INSERT INTO `role_route` (`id`, `role_id`, `route_id`, `created_at`, `updated_at`) VALUES
(62, 8, 73, '2020-11-08 12:58:48', '2020-11-08 12:58:48'),
(63, 9, 73, '2020-11-08 12:58:48', '2020-11-08 12:58:48'),
(64, 10, 73, '2020-11-08 12:58:48', '2020-11-08 12:58:48'),
(65, 11, 73, '2020-11-08 12:58:48', '2020-11-08 12:58:48'),
(66, 12, 73, '2020-11-08 12:58:48', '2020-11-08 12:58:48'),
(67, 13, 73, '2020-11-08 12:58:48', '2020-11-08 12:58:48'),
(68, 14, 73, '2020-11-08 12:58:48', '2020-11-08 12:58:48'),
(69, 15, 73, '2020-11-08 12:58:48', '2020-11-08 12:58:48'),
(70, 16, 73, '2020-11-08 12:58:48', '2020-11-08 12:58:48'),
(71, 8, 83, '2020-11-08 12:58:48', '2020-11-08 12:58:48'),
(72, 9, 83, '2020-11-08 12:58:48', '2020-11-08 12:58:48'),
(73, 10, 83, '2020-11-08 12:58:48', '2020-11-08 12:58:48'),
(74, 11, 83, '2020-11-08 12:58:48', '2020-11-08 12:58:48'),
(75, 12, 83, '2020-11-08 12:58:48', '2020-11-08 12:58:48'),
(76, 13, 83, '2020-11-08 12:58:48', '2020-11-08 12:58:48'),
(77, 14, 83, '2020-11-08 12:58:48', '2020-11-08 12:58:48'),
(78, 15, 83, '2020-11-08 12:58:48', '2020-11-08 12:58:48'),
(79, 16, 83, '2020-11-08 12:58:48', '2020-11-08 12:58:48'),
(80, 8, 76, '2020-11-08 12:58:48', '2020-11-08 12:58:48'),
(81, 9, 76, '2020-11-08 12:58:49', '2020-11-08 12:58:49'),
(82, 10, 76, '2020-11-08 12:58:49', '2020-11-08 12:58:49'),
(83, 11, 76, '2020-11-08 12:58:49', '2020-11-08 12:58:49'),
(84, 12, 76, '2020-11-08 12:58:49', '2020-11-08 12:58:49'),
(85, 13, 76, '2020-11-08 12:58:49', '2020-11-08 12:58:49'),
(86, 14, 76, '2020-11-08 12:58:49', '2020-11-08 12:58:49'),
(87, 15, 76, '2020-11-08 12:58:49', '2020-11-08 12:58:49'),
(88, 16, 76, '2020-11-08 12:58:49', '2020-11-08 12:58:49'),
(89, 15, 74, '2020-11-08 12:58:49', '2020-11-08 12:58:49'),
(90, 15, 75, '2020-11-08 12:58:49', '2020-11-08 12:58:49'),
(91, 15, 77, '2020-11-08 12:58:49', '2020-11-08 12:58:49'),
(92, 15, 78, '2020-11-08 12:58:49', '2020-11-08 12:58:49'),
(133, 8, 147, '2020-11-08 13:09:16', '2020-11-08 13:09:16'),
(134, 9, 147, '2020-11-08 13:09:16', '2020-11-08 13:09:16'),
(135, 10, 147, '2020-11-08 13:09:16', '2020-11-08 13:09:16'),
(136, 11, 147, '2020-11-08 13:09:16', '2020-11-08 13:09:16'),
(137, 8, 150, '2020-11-08 13:09:16', '2020-11-08 13:09:16'),
(138, 9, 150, '2020-11-08 13:09:16', '2020-11-08 13:09:16'),
(139, 10, 150, '2020-11-08 13:09:16', '2020-11-08 13:09:16'),
(140, 11, 150, '2020-11-08 13:09:16', '2020-11-08 13:09:16'),
(141, 8, 154, '2020-11-08 13:11:02', '2020-11-08 13:11:02'),
(142, 9, 154, '2020-11-08 13:11:02', '2020-11-08 13:11:02'),
(143, 10, 154, '2020-11-08 13:11:02', '2020-11-08 13:11:02'),
(144, 11, 154, '2020-11-08 13:11:02', '2020-11-08 13:11:02'),
(145, 12, 154, '2020-11-08 13:11:02', '2020-11-08 13:11:02'),
(146, 13, 154, '2020-11-08 13:11:02', '2020-11-08 13:11:02'),
(147, 14, 154, '2020-11-08 13:11:02', '2020-11-08 13:11:02'),
(148, 15, 154, '2020-11-08 13:11:02', '2020-11-08 13:11:02'),
(149, 15, 155, '2020-11-08 13:11:02', '2020-11-08 13:11:02'),
(150, 15, 156, '2020-11-08 13:11:03', '2020-11-08 13:11:03'),
(151, 15, 158, '2020-11-08 13:11:03', '2020-11-08 13:11:03'),
(152, 15, 159, '2020-11-08 13:11:03', '2020-11-08 13:11:03'),
(153, 8, 161, '2020-11-08 13:11:03', '2020-11-08 13:11:03'),
(154, 9, 161, '2020-11-08 13:11:03', '2020-11-08 13:11:03'),
(155, 10, 161, '2020-11-08 13:11:03', '2020-11-08 13:11:03'),
(156, 11, 161, '2020-11-08 13:11:03', '2020-11-08 13:11:03'),
(157, 12, 161, '2020-11-08 13:11:03', '2020-11-08 13:11:03'),
(158, 13, 161, '2020-11-08 13:11:03', '2020-11-08 13:11:03'),
(159, 14, 161, '2020-11-08 13:11:03', '2020-11-08 13:11:03'),
(160, 15, 161, '2020-11-08 13:11:03', '2020-11-08 13:11:03'),
(161, 15, 163, '2020-11-08 13:11:03', '2020-11-08 13:11:03'),
(162, 15, 165, '2020-11-08 13:11:03', '2020-11-08 13:11:03'),
(163, 8, 162, '2020-11-08 13:11:03', '2020-11-08 13:11:03'),
(164, 9, 162, '2020-11-08 13:11:03', '2020-11-08 13:11:03'),
(165, 10, 162, '2020-11-08 13:11:03', '2020-11-08 13:11:03'),
(166, 11, 162, '2020-11-08 13:11:03', '2020-11-08 13:11:03'),
(167, 12, 162, '2020-11-08 13:11:03', '2020-11-08 13:11:03'),
(168, 13, 162, '2020-11-08 13:11:03', '2020-11-08 13:11:03'),
(169, 14, 162, '2020-11-08 13:11:03', '2020-11-08 13:11:03'),
(170, 15, 162, '2020-11-08 13:11:03', '2020-11-08 13:11:03'),
(171, 8, 124, '2020-11-08 13:11:56', '2020-11-08 13:11:56'),
(172, 9, 124, '2020-11-08 13:11:56', '2020-11-08 13:11:56'),
(173, 10, 124, '2020-11-08 13:11:56', '2020-11-08 13:11:56'),
(174, 11, 124, '2020-11-08 13:11:56', '2020-11-08 13:11:56'),
(175, 8, 127, '2020-11-08 13:11:56', '2020-11-08 13:11:56'),
(176, 9, 127, '2020-11-08 13:11:56', '2020-11-08 13:11:56'),
(177, 10, 127, '2020-11-08 13:11:56', '2020-11-08 13:11:56'),
(178, 11, 127, '2020-11-08 13:11:57', '2020-11-08 13:11:57'),
(182, 8, 108, '2020-11-08 13:13:00', '2020-11-08 13:13:00'),
(183, 9, 108, '2020-11-08 13:13:00', '2020-11-08 13:13:00'),
(184, 10, 108, '2020-11-08 13:13:00', '2020-11-08 13:13:00'),
(185, 8, 131, '2020-11-08 13:13:28', '2020-11-08 13:13:28'),
(186, 9, 131, '2020-11-08 13:13:28', '2020-11-08 13:13:28'),
(187, 10, 131, '2020-11-08 13:13:28', '2020-11-08 13:13:28'),
(188, 8, 116, '2020-11-08 13:14:15', '2020-11-08 13:14:15'),
(189, 9, 116, '2020-11-08 13:14:15', '2020-11-08 13:14:15'),
(190, 10, 116, '2020-11-08 13:14:15', '2020-11-08 13:14:15'),
(205, 8, 96, '2020-11-08 13:15:22', '2020-11-08 13:15:22'),
(206, 9, 96, '2020-11-08 13:15:22', '2020-11-08 13:15:22'),
(207, 10, 96, '2020-11-08 13:15:22', '2020-11-08 13:15:22'),
(208, 11, 96, '2020-11-08 13:15:22', '2020-11-08 13:15:22'),
(209, 12, 96, '2020-11-08 13:15:22', '2020-11-08 13:15:22'),
(210, 13, 96, '2020-11-08 13:15:22', '2020-11-08 13:15:22'),
(211, 14, 96, '2020-11-08 13:15:22', '2020-11-08 13:15:22'),
(212, 8, 99, '2020-11-08 13:15:23', '2020-11-08 13:15:23'),
(213, 9, 99, '2020-11-08 13:15:23', '2020-11-08 13:15:23'),
(214, 10, 99, '2020-11-08 13:15:23', '2020-11-08 13:15:23'),
(215, 11, 99, '2020-11-08 13:15:23', '2020-11-08 13:15:23'),
(216, 12, 99, '2020-11-08 13:15:23', '2020-11-08 13:15:23'),
(217, 13, 99, '2020-11-08 13:15:23', '2020-11-08 13:15:23'),
(218, 14, 99, '2020-11-08 13:15:23', '2020-11-08 13:15:23'),
(221, 8, 249, '2020-11-08 13:26:18', '2020-11-08 13:26:18'),
(222, 8, 257, '2020-11-08 13:26:18', '2020-11-08 13:26:18'),
(261, 1, 242, '2020-11-08 13:30:31', '2020-11-08 13:30:31'),
(262, 17, 242, '2020-11-08 13:30:31', '2020-11-08 13:30:31'),
(263, 18, 242, '2020-11-08 13:30:31', '2020-11-08 13:30:31'),
(264, 19, 242, '2020-11-08 13:30:32', '2020-11-08 13:30:32'),
(265, 20, 242, '2020-11-08 13:30:32', '2020-11-08 13:30:32'),
(266, 21, 242, '2020-11-08 13:30:32', '2020-11-08 13:30:32'),
(267, 1, 241, '2020-11-08 13:30:32', '2020-11-08 13:30:32'),
(268, 17, 241, '2020-11-08 13:30:32', '2020-11-08 13:30:32'),
(269, 18, 241, '2020-11-08 13:30:32', '2020-11-08 13:30:32'),
(270, 19, 241, '2020-11-08 13:30:32', '2020-11-08 13:30:32'),
(271, 20, 241, '2020-11-08 13:30:32', '2020-11-08 13:30:32'),
(272, 21, 241, '2020-11-08 13:30:32', '2020-11-08 13:30:32'),
(273, 17, 245, '2020-11-08 13:30:32', '2020-11-08 13:30:32'),
(274, 18, 245, '2020-11-08 13:30:32', '2020-11-08 13:30:32'),
(275, 19, 245, '2020-11-08 13:30:32', '2020-11-08 13:30:32'),
(276, 17, 246, '2020-11-08 13:30:33', '2020-11-08 13:30:33'),
(277, 18, 246, '2020-11-08 13:30:33', '2020-11-08 13:30:33'),
(278, 19, 246, '2020-11-08 13:30:33', '2020-11-08 13:30:33'),
(279, 17, 248, '2020-11-08 13:30:33', '2020-11-08 13:30:33'),
(280, 18, 248, '2020-11-08 13:30:33', '2020-11-08 13:30:33'),
(281, 19, 248, '2020-11-08 13:30:33', '2020-11-08 13:30:33'),
(282, 17, 234, '2020-11-08 13:30:33', '2020-11-08 13:30:33'),
(283, 18, 234, '2020-11-08 13:30:33', '2020-11-08 13:30:33'),
(284, 19, 234, '2020-11-08 13:30:33', '2020-11-08 13:30:33'),
(285, 17, 235, '2020-11-08 13:30:33', '2020-11-08 13:30:33'),
(286, 18, 235, '2020-11-08 13:30:33', '2020-11-08 13:30:33'),
(287, 19, 235, '2020-11-08 13:30:33', '2020-11-08 13:30:33'),
(288, 17, 243, '2020-11-08 13:30:33', '2020-11-08 13:30:33'),
(289, 18, 243, '2020-11-08 13:30:33', '2020-11-08 13:30:33'),
(290, 19, 243, '2020-11-08 13:30:33', '2020-11-08 13:30:33'),
(291, 17, 244, '2020-11-08 13:30:33', '2020-11-08 13:30:33'),
(292, 18, 244, '2020-11-08 13:30:33', '2020-11-08 13:30:33'),
(293, 19, 244, '2020-11-08 13:30:33', '2020-11-08 13:30:33'),
(294, 1, 237, '2020-11-08 13:30:34', '2020-11-08 13:30:34'),
(295, 17, 237, '2020-11-08 13:30:34', '2020-11-08 13:30:34'),
(296, 18, 237, '2020-11-08 13:30:34', '2020-11-08 13:30:34'),
(297, 19, 237, '2020-11-08 13:30:34', '2020-11-08 13:30:34'),
(298, 20, 237, '2020-11-08 13:30:34', '2020-11-08 13:30:34'),
(299, 21, 237, '2020-11-08 13:30:34', '2020-11-08 13:30:34'),
(300, 8, 197, '2020-11-08 13:34:46', '2020-11-08 13:34:46'),
(301, 17, 197, '2020-11-08 13:34:46', '2020-11-08 13:34:46'),
(302, 18, 197, '2020-11-08 13:34:46', '2020-11-08 13:34:46'),
(303, 19, 197, '2020-11-08 13:34:47', '2020-11-08 13:34:47'),
(304, 20, 197, '2020-11-08 13:34:47', '2020-11-08 13:34:47'),
(305, 21, 197, '2020-11-08 13:34:47', '2020-11-08 13:34:47'),
(306, 8, 213, '2020-11-08 13:34:47', '2020-11-08 13:34:47'),
(307, 17, 213, '2020-11-08 13:34:47', '2020-11-08 13:34:47'),
(308, 18, 213, '2020-11-08 13:34:47', '2020-11-08 13:34:47'),
(309, 19, 213, '2020-11-08 13:34:47', '2020-11-08 13:34:47'),
(310, 20, 213, '2020-11-08 13:34:47', '2020-11-08 13:34:47'),
(311, 21, 213, '2020-11-08 13:34:47', '2020-11-08 13:34:47'),
(312, 18, 223, '2020-11-08 13:34:47', '2020-11-08 13:34:47'),
(313, 19, 223, '2020-11-08 13:34:47', '2020-11-08 13:34:47'),
(314, 20, 223, '2020-11-08 13:34:47', '2020-11-08 13:34:47'),
(315, 18, 224, '2020-11-08 13:34:47', '2020-11-08 13:34:47'),
(316, 19, 224, '2020-11-08 13:34:47', '2020-11-08 13:34:47'),
(317, 20, 224, '2020-11-08 13:34:48', '2020-11-08 13:34:48'),
(318, 8, 225, '2020-11-08 13:34:48', '2020-11-08 13:34:48'),
(319, 17, 225, '2020-11-08 13:34:48', '2020-11-08 13:34:48'),
(320, 18, 225, '2020-11-08 13:34:48', '2020-11-08 13:34:48'),
(321, 19, 225, '2020-11-08 13:34:48', '2020-11-08 13:34:48'),
(322, 20, 225, '2020-11-08 13:34:48', '2020-11-08 13:34:48'),
(323, 21, 225, '2020-11-08 13:34:48', '2020-11-08 13:34:48'),
(324, 18, 206, '2020-11-08 13:34:48', '2020-11-08 13:34:48'),
(325, 19, 206, '2020-11-08 13:34:48', '2020-11-08 13:34:48'),
(326, 20, 206, '2020-11-08 13:34:48', '2020-11-08 13:34:48'),
(337, 8, 200, '2020-11-08 13:36:51', '2020-11-08 13:36:51'),
(338, 17, 200, '2020-11-08 13:36:52', '2020-11-08 13:36:52'),
(339, 18, 200, '2020-11-08 13:36:52', '2020-11-08 13:36:52'),
(340, 19, 200, '2020-11-08 13:36:52', '2020-11-08 13:36:52'),
(341, 20, 200, '2020-11-08 13:36:52', '2020-11-08 13:36:52'),
(342, 18, 260, '2020-11-08 13:36:52', '2020-11-08 13:36:52'),
(343, 19, 260, '2020-11-08 13:36:52', '2020-11-08 13:36:52'),
(344, 20, 260, '2020-11-08 13:36:52', '2020-11-08 13:36:52'),
(345, 18, 209, '2020-11-08 13:36:52', '2020-11-08 13:36:52'),
(346, 19, 209, '2020-11-08 13:36:52', '2020-11-08 13:36:52'),
(347, 20, 209, '2020-11-08 13:36:52', '2020-11-08 13:36:52'),
(348, 18, 211, '2020-11-08 13:36:52', '2020-11-08 13:36:52'),
(349, 19, 211, '2020-11-08 13:36:52', '2020-11-08 13:36:52'),
(350, 20, 211, '2020-11-08 13:36:52', '2020-11-08 13:36:52'),
(351, 18, 261, '2020-11-08 13:36:52', '2020-11-08 13:36:52'),
(352, 19, 261, '2020-11-08 13:36:52', '2020-11-08 13:36:52'),
(353, 20, 261, '2020-11-08 13:36:52', '2020-11-08 13:36:52'),
(354, 18, 262, '2020-11-08 13:36:52', '2020-11-08 13:36:52'),
(355, 19, 262, '2020-11-08 13:36:52', '2020-11-08 13:36:52'),
(356, 20, 262, '2020-11-08 13:36:52', '2020-11-08 13:36:52'),
(357, 18, 263, '2020-11-08 13:36:52', '2020-11-08 13:36:52'),
(358, 19, 263, '2020-11-08 13:36:52', '2020-11-08 13:36:52'),
(359, 20, 263, '2020-11-08 13:36:52', '2020-11-08 13:36:52'),
(360, 18, 230, '2020-11-08 13:36:52', '2020-11-08 13:36:52'),
(361, 19, 230, '2020-11-08 13:36:52', '2020-11-08 13:36:52'),
(362, 20, 230, '2020-11-08 13:36:52', '2020-11-08 13:36:52'),
(363, 18, 210, '2020-11-08 13:36:52', '2020-11-08 13:36:52'),
(364, 19, 210, '2020-11-08 13:36:53', '2020-11-08 13:36:53'),
(365, 20, 210, '2020-11-08 13:36:53', '2020-11-08 13:36:53'),
(366, 9, 201, '2020-11-08 13:36:53', '2020-11-08 13:36:53'),
(367, 17, 201, '2020-11-08 13:36:53', '2020-11-08 13:36:53'),
(368, 18, 201, '2020-11-08 13:36:53', '2020-11-08 13:36:53'),
(369, 19, 201, '2020-11-08 13:36:53', '2020-11-08 13:36:53'),
(370, 20, 201, '2020-11-08 13:36:53', '2020-11-08 13:36:53'),
(371, 9, 212, '2020-11-08 13:36:53', '2020-11-08 13:36:53'),
(372, 17, 212, '2020-11-08 13:36:53', '2020-11-08 13:36:53'),
(373, 18, 212, '2020-11-08 13:36:53', '2020-11-08 13:36:53'),
(374, 19, 212, '2020-11-08 13:36:53', '2020-11-08 13:36:53'),
(375, 20, 212, '2020-11-08 13:36:53', '2020-11-08 13:36:53');

-- --------------------------------------------------------

--
-- Table structure for table `routes`
--

CREATE TABLE `routes` (
  `id` int(10) UNSIGNED NOT NULL,
  `method` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `route` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `controller_name` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `function_name` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `route_name` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `routes`
--

INSERT INTO `routes` (`id`, `method`, `route`, `controller_name`, `function_name`, `route_name`, `created_at`, `updated_at`) VALUES
(1, 'get', 'broadcasting/auth', 'BroadcastController', 'authenticate', NULL, '2020-11-04 12:40:01', '2020-11-04 12:40:01'),
(2, 'get', 'api/user', 'BroadcastController', 'authenticate', NULL, '2020-11-04 12:40:01', '2020-11-04 12:40:01'),
(3, 'get', 'api/operators/{id?}', 'CountryController', 'getOperators', NULL, '2020-11-04 12:40:01', '2020-11-04 12:40:01'),
(4, 'get', 'api/occasions/{id?}', 'CountryController', 'getOccasions', NULL, '2020-11-04 12:40:01', '2020-11-04 12:40:01'),
(5, 'get', 'api/contents/{id}', 'ContentController', 'getContents', NULL, '2020-11-04 12:40:01', '2020-11-04 12:40:01'),
(6, 'get', 'api/tracks/{id}', 'ContentController', 'getTracks', NULL, '2020-11-04 12:40:01', '2020-11-04 12:40:01'),
(7, 'get', 'api/contracts/{seconde_party_id}', 'ContentController', 'getContracts', NULL, '2020-11-04 12:40:01', '2020-11-04 12:40:01'),
(8, 'get', 'providers_to_secondparty', 'SecondPartyController', 'providers_to_secondparty', NULL, '2020-11-04 12:40:02', '2020-11-04 12:40:02'),
(9, 'get', 'store_routes_in_database', 'RouteController', 'store_routes_in_database', NULL, '2020-11-04 12:40:02', '2020-11-04 12:40:02'),
(19, 'get', '/', 'HomeController', 'index', NULL, '2020-11-04 12:40:02', '2020-11-04 12:40:02'),
(20, 'get', 'user_profile', 'UserController', 'profile', NULL, '2020-11-04 12:40:02', '2020-11-05 08:06:27'),
(21, 'post', 'user_profile/updatepassword', 'UserController', 'UpdatePassword', NULL, '2020-11-04 12:40:02', '2020-11-05 08:06:27'),
(22, 'post', 'user_profile/updateprofilepic', 'UserController', 'UpdateProfilePicture', NULL, '2020-11-04 12:40:02', '2020-11-05 08:06:27'),
(23, 'post', 'user_profile/updateuserdata', 'UserController', 'UpdateNameAndEmail', NULL, '2020-11-04 12:40:03', '2020-11-05 08:06:27'),
(24, 'get', 'read_notify/{id}', 'UserController', 'UpdateNameAndEmail', NULL, '2020-11-04 12:40:03', '2020-11-04 12:40:03'),
(25, 'get', 'copy/signed/date', 'UserController', 'UpdateNameAndEmail', NULL, '2020-11-04 12:40:03', '2020-11-04 12:40:03'),
(26, 'get', 'search', 'SearchController', 'index', NULL, '2020-11-04 12:40:03', '2020-11-04 12:40:03'),
(27, 'post', 'delete_multiselect', 'SearchController', 'index', NULL, '2020-11-04 12:40:03', '2020-11-04 12:40:03'),
(28, 'post', 'country', 'CountryController', 'store', 'country.store', '2020-11-04 12:40:03', '2020-11-04 12:40:03'),
(29, 'post', 'country/update', 'CountryController', 'update', NULL, '2020-11-04 12:40:03', '2020-11-04 12:40:03'),
(30, 'get', 'country/{id}/delete', 'CountryController', 'destroy', NULL, '2020-11-04 12:40:03', '2020-11-04 12:40:03'),
(31, 'get', 'country', 'CountryController', 'index', 'country.index', '2020-11-04 12:40:03', '2020-11-04 12:40:03'),
(32, 'get', 'country/create', 'CountryController', 'create', 'country.create', '2020-11-04 12:40:03', '2020-11-04 12:40:03'),
(33, 'get', 'country/{country}', 'CountryController', 'show', 'country.show', '2020-11-04 12:40:03', '2020-11-04 12:40:03'),
(34, 'get', 'country/{country}/edit', 'CountryController', 'edit', 'country.edit', '2020-11-04 12:40:03', '2020-11-04 12:40:03'),
(35, 'put', 'country/{country}', 'CountryController', 'update', 'country.update', '2020-11-04 12:40:03', '2020-11-04 12:40:03'),
(36, 'delete', 'country/{country}', 'CountryController', 'destroy', 'country.destroy', '2020-11-04 12:40:03', '2020-11-04 12:40:03'),
(37, 'get', 'country/{id}/operator', 'CountryController', 'list_all_operator', NULL, '2020-11-04 12:40:04', '2020-11-04 12:40:04'),
(38, 'post', 'operator', 'OperatorController', 'store', 'operator.store', '2020-11-04 12:40:04', '2020-11-04 12:40:04'),
(39, 'post', 'operator/update', 'OperatorController', 'update', NULL, '2020-11-04 12:40:04', '2020-11-04 12:40:04'),
(40, 'get', 'operator/{id}/delete', 'OperatorController', 'destroy', NULL, '2020-11-04 12:40:04', '2020-11-04 12:40:04'),
(41, 'get', 'operator', 'OperatorController', 'index', 'operator.index', '2020-11-04 12:40:04', '2020-11-04 12:40:04'),
(42, 'get', 'operator/create', 'OperatorController', 'create', 'operator.create', '2020-11-04 12:40:04', '2020-11-04 12:40:04'),
(43, 'get', 'operator/{operator}', 'OperatorController', 'show', 'operator.show', '2020-11-04 12:40:04', '2020-11-04 12:40:04'),
(44, 'get', 'operator/{operator}/edit', 'OperatorController', 'edit', 'operator.edit', '2020-11-04 12:40:04', '2020-11-04 12:40:04'),
(45, 'put', 'operator/{operator}', 'OperatorController', 'update', 'operator.update', '2020-11-04 12:40:04', '2020-11-04 12:40:04'),
(46, 'delete', 'operator/{operator}', 'OperatorController', 'destroy', 'operator.destroy', '2020-11-04 12:40:04', '2020-11-04 12:40:04'),
(47, 'post', 'provider', 'ProviderController', 'store', 'provider.store', '2020-11-04 12:40:04', '2020-11-04 12:40:04'),
(48, 'post', 'provider/update', 'ProviderController', 'update', NULL, '2020-11-04 12:40:04', '2020-11-04 12:40:04'),
(49, 'get', 'provider/{id}/delete', 'ProviderController', 'destroy', NULL, '2020-11-04 12:40:04', '2020-11-04 12:40:04'),
(50, 'get', 'provider', 'ProviderController', 'index', 'provider.index', '2020-11-04 12:40:04', '2020-11-04 12:40:04'),
(51, 'get', 'provider/create', 'ProviderController', 'create', 'provider.create', '2020-11-04 12:40:04', '2020-11-04 12:40:04'),
(52, 'get', 'provider/{provider}', 'ProviderController', 'show', 'provider.show', '2020-11-04 12:40:04', '2020-11-04 12:40:04'),
(53, 'get', 'provider/{provider}/edit', 'ProviderController', 'edit', 'provider.edit', '2020-11-04 12:40:05', '2020-11-04 12:40:05'),
(54, 'put', 'provider/{provider}', 'ProviderController', 'update', 'provider.update', '2020-11-04 12:40:05', '2020-11-04 12:40:05'),
(55, 'delete', 'provider/{provider}', 'ProviderController', 'destroy', 'provider.destroy', '2020-11-04 12:40:05', '2020-11-04 12:40:05'),
(56, 'get', 'aggregator', 'AggregatorController', 'index', 'aggregator.index', '2020-11-04 12:40:05', '2020-11-04 12:40:05'),
(57, 'get', 'aggregator/create', 'AggregatorController', 'create', 'aggregator.create', '2020-11-04 12:40:05', '2020-11-04 12:40:05'),
(58, 'post', 'aggregator', 'AggregatorController', 'store', NULL, '2020-11-04 12:40:05', '2020-11-04 12:40:05'),
(59, 'get', 'aggregator/{aggregator}', 'AggregatorController', 'show', 'aggregator.show', '2020-11-04 12:40:05', '2020-11-04 12:40:05'),
(60, 'get', 'aggregator/{aggregator}/edit', 'AggregatorController', 'edit', 'aggregator.edit', '2020-11-04 12:40:05', '2020-11-04 12:40:05'),
(61, 'put', 'aggregator/{aggregator}', 'AggregatorController', 'update', 'aggregator.update', '2020-11-04 12:40:05', '2020-11-04 12:40:05'),
(62, 'delete', 'aggregator/{aggregator}', 'AggregatorController', 'destroy', 'aggregator.destroy', '2020-11-04 12:40:05', '2020-11-04 12:40:05'),
(63, 'post', 'aggregator/update', 'AggregatorController', 'update', NULL, '2020-11-04 12:40:05', '2020-11-04 12:40:05'),
(64, 'get', 'aggregator/{id}/delete', 'AggregatorController', 'destroy', NULL, '2020-11-04 12:40:05', '2020-11-04 12:40:05'),
(65, 'get', 'occasion', 'OccasionController', 'index', NULL, '2020-11-04 12:40:05', '2020-11-04 12:40:05'),
(66, 'post', 'occasion', 'OccasionController', 'store', NULL, '2020-11-04 12:40:05', '2020-11-04 12:40:05'),
(67, 'post', 'occasion/update', 'OccasionController', 'update', NULL, '2020-11-04 12:40:05', '2020-11-04 12:40:05'),
(68, 'get', 'occasion/{id}/delete', 'OccasionController', 'destroy', NULL, '2020-11-04 12:40:05', '2020-11-04 12:40:05'),
(69, 'get', 'currency', 'CurrencyController', 'index', NULL, '2020-11-04 12:40:05', '2020-11-04 12:40:05'),
(70, 'post', 'currency', 'CurrencyController', 'store', NULL, '2020-11-04 12:40:05', '2020-11-04 12:40:05'),
(71, 'post', 'currency/update', 'CurrencyController', 'update', NULL, '2020-11-04 12:40:05', '2020-11-04 12:40:05'),
(72, 'get', 'currency/{id}/delete', 'CurrencyController', 'destroy', NULL, '2020-11-04 12:40:05', '2020-11-04 12:40:05'),
(73, 'get', 'fullcontracts', 'FullcontractsController', 'index', 'fullcontracts.index', '2020-11-04 12:40:05', '2020-11-04 12:40:05'),
(74, 'get', 'fullcontracts/create', 'FullcontractsController', 'create', 'fullcontracts.create', '2020-11-04 12:40:05', '2020-11-04 12:40:05'),
(75, 'post', 'fullcontracts', 'FullcontractsController', 'store', 'fullcontracts.store', '2020-11-04 12:40:05', '2020-11-04 12:40:05'),
(76, 'get', 'fullcontracts/{fullcontract}', 'FullcontractsController', 'show', 'fullcontracts.show', '2020-11-04 12:40:06', '2020-11-04 12:40:06'),
(77, 'get', 'fullcontracts/{fullcontract}/edit', 'FullcontractsController', 'edit', 'fullcontracts.edit', '2020-11-04 12:40:06', '2020-11-04 12:40:06'),
(78, 'put', 'fullcontracts/{fullcontract}', 'FullcontractsController', 'update', 'fullcontracts.update', '2020-11-04 12:40:06', '2020-11-04 12:40:06'),
(79, 'delete', 'fullcontracts/{fullcontract}', 'FullcontractsController', 'destroy', 'fullcontracts.destroy', '2020-11-04 12:40:06', '2020-11-04 12:40:06'),
(80, 'post', 'fullcontracts/{id}/update', 'FullcontractsController', 'update', NULL, '2020-11-04 12:40:06', '2020-11-04 12:40:06'),
(81, 'get', 'fullcontracts/{id}/delete', 'FullcontractsController', 'destroy', NULL, '2020-11-04 12:40:06', '2020-11-04 12:40:06'),
(82, 'get', 'client_type', 'FullcontractsController', 'getClient', NULL, '2020-11-04 12:40:06', '2020-11-04 12:40:06'),
(83, 'get', 'contracts/allData', 'FullcontractsController', 'allData', NULL, '2020-11-04 12:40:06', '2020-11-04 12:40:06'),
(84, 'get', 'contract/an/{id}', 'FullcontractsController', 'annex', NULL, '2020-11-04 12:40:06', '2020-11-04 12:40:06'),
(85, 'get', 'contract/al/{id}', 'FullcontractsController', 'authorization', NULL, '2020-11-04 12:40:06', '2020-11-04 12:40:06'),
(86, 'get', 'contract/cr/{id}', 'FullcontractsController', 'copyright', NULL, '2020-11-04 12:40:06', '2020-11-04 12:40:06'),
(87, 'get', 'contractservice', 'ServicecontractsController', 'index', 'contractservice.index', '2020-11-04 12:40:06', '2020-11-04 12:40:06'),
(88, 'get', 'contractservice/create', 'ServicecontractsController', 'create', 'contractservice.create', '2020-11-04 12:40:06', '2020-11-04 12:40:06'),
(89, 'post', 'contractservice', 'ServicecontractsController', 'store', 'contractservice.store', '2020-11-04 12:40:06', '2020-11-04 12:40:06'),
(90, 'get', 'contractservice/{contractservice}', 'ServicecontractsController', 'show', 'contractservice.show', '2020-11-04 12:40:06', '2020-11-04 12:40:06'),
(91, 'get', 'contractservice/{contractservice}/edit', 'ServicecontractsController', 'edit', 'contractservice.edit', '2020-11-04 12:40:07', '2020-11-04 12:40:07'),
(92, 'put', 'contractservice/{contractservice}', 'ServicecontractsController', 'update', 'contractservice.update', '2020-11-04 12:40:07', '2020-11-04 12:40:07'),
(93, 'delete', 'contractservice/{contractservice}', 'ServicecontractsController', 'destroy', 'contractservice.destroy', '2020-11-04 12:40:07', '2020-11-04 12:40:07'),
(94, 'get', 'contractservice/{id}/delete', 'ServicecontractsController', 'destroy', NULL, '2020-11-04 12:40:07', '2020-11-04 12:40:07'),
(95, 'get', 'contractservice/create/{id}', 'ServicecontractsController', 'create', NULL, '2020-11-04 12:40:07', '2020-11-04 12:40:07'),
(96, 'get', 'revenue', 'RevenueController', 'index', 'revenue.index', '2020-11-04 12:40:07', '2020-11-04 12:40:07'),
(97, 'get', 'revenue/create', 'RevenueController', 'create', 'revenue.create', '2020-11-04 12:40:07', '2020-11-04 12:40:07'),
(98, 'post', 'revenue', 'RevenueController', 'store', 'revenue.store', '2020-11-04 12:40:07', '2020-11-04 12:40:07'),
(99, 'get', 'revenue/{revenue}', 'RevenueController', 'show', 'revenue.show', '2020-11-04 12:40:07', '2020-11-04 12:40:07'),
(100, 'get', 'revenue/{revenue}/edit', 'RevenueController', 'edit', 'revenue.edit', '2020-11-04 12:40:07', '2020-11-04 12:40:07'),
(101, 'put', 'revenue/{revenue}', 'RevenueController', 'update', 'revenue.update', '2020-11-04 12:40:07', '2020-11-04 12:40:07'),
(102, 'delete', 'revenue/{revenue}', 'RevenueController', 'destroy', 'revenue.destroy', '2020-11-04 12:40:07', '2020-11-04 12:40:07'),
(103, 'get', 'revenue/{id}/delete', 'RevenueController', 'destroy', NULL, '2020-11-04 12:40:07', '2020-11-04 12:40:07'),
(104, 'post', 'revenue/{id}/update', 'RevenueController', 'update', NULL, '2020-11-04 12:40:08', '2020-11-04 12:40:08'),
(105, 'post', 'comboselect/source_id', 'RevenueController', 'comboSelectSourceId', NULL, '2020-11-04 12:40:08', '2020-11-04 12:40:08'),
(106, 'post', 'comboselect/contract_services', 'RevenueController', 'comboSelectContractServices', NULL, '2020-11-04 12:40:08', '2020-11-04 12:40:08'),
(107, 'post', 'comboselect/remove_contract_services', 'RevenueController', 'comboSelectRemoveContractServices', NULL, '2020-11-04 12:40:08', '2020-11-04 12:40:08'),
(108, 'get', 'firstparties', 'FirstpartieController', 'index', 'admin.firstparties.index', '2020-11-04 12:40:08', '2020-11-04 12:40:08'),
(109, 'get', 'firstparties/create', 'FirstpartieController', 'create', 'admin.firstparties.create', '2020-11-04 12:40:08', '2020-11-04 12:40:08'),
(110, 'post', 'firstparties', 'FirstpartieController', 'store', 'admin.firstparties.store', '2020-11-04 12:40:08', '2020-11-04 12:40:08'),
(111, 'get', 'firstparties/{firstparty}', 'FirstpartieController', 'show', 'admin.firstparties.show', '2020-11-04 12:40:08', '2020-11-04 12:40:08'),
(112, 'get', 'firstparties/{firstparty}/edit', 'FirstpartieController', 'edit', 'admin.firstparties.edit', '2020-11-04 12:40:08', '2020-11-04 12:40:08'),
(113, 'put', 'firstparties/{firstparty}', 'FirstpartieController', 'update', 'admin.firstparties.update', '2020-11-04 12:40:08', '2020-11-04 12:40:08'),
(115, 'get', 'firstparties/{id}/delete', 'FirstpartieController', 'destroy', NULL, '2020-11-04 12:40:09', '2020-11-04 12:40:09'),
(116, 'get', 'percentages', 'PercentageController', 'index', 'admin.percentages.index', '2020-11-04 12:40:09', '2020-11-04 12:40:09'),
(117, 'get', 'percentages/create', 'PercentageController', 'create', 'admin.percentages.create', '2020-11-04 12:40:09', '2020-11-04 12:40:09'),
(118, 'post', 'percentages', 'PercentageController', 'store', 'admin.percentages.store', '2020-11-04 12:40:09', '2020-11-04 12:40:09'),
(119, 'get', 'percentages/{percentage}', 'PercentageController', 'show', 'admin.percentages.show', '2020-11-04 12:40:09', '2020-11-04 12:40:09'),
(120, 'get', 'percentages/{percentage}/edit', 'PercentageController', 'edit', 'admin.percentages.edit', '2020-11-04 12:40:09', '2020-11-04 12:40:09'),
(121, 'put', 'percentages/{percentage}', 'PercentageController', 'update', 'admin.percentages.update', '2020-11-04 12:40:09', '2020-11-04 12:40:09'),
(122, 'delete', 'percentages/{percentage}', 'PercentageController', 'destroy', 'admin.percentages.destroy', '2020-11-04 12:40:09', '2020-11-04 12:40:09'),
(123, 'get', 'percentages/{id}/delete', 'PercentageController', 'destroy', NULL, '2020-11-04 12:40:09', '2020-11-04 12:40:09'),
(124, 'get', 'ServiceTypes', 'ServiceTypesController', 'index', 'ServiceTypes.index', '2020-11-04 12:40:09', '2020-11-04 12:40:09'),
(125, 'get', 'ServiceTypes/create', 'ServiceTypesController', 'create', 'ServiceTypes.create', '2020-11-04 12:40:09', '2020-11-04 12:40:09'),
(126, 'post', 'ServiceTypes', 'ServiceTypesController', 'store', 'ServiceTypes.store', '2020-11-04 12:40:09', '2020-11-04 12:40:09'),
(127, 'get', 'ServiceTypes/{ServiceType}', 'ServiceTypesController', 'show', 'ServiceTypes.show', '2020-11-04 12:40:09', '2020-11-04 12:40:09'),
(128, 'get', 'ServiceTypes/{ServiceType}/edit', 'ServiceTypesController', 'edit', 'ServiceTypes.edit', '2020-11-04 12:40:10', '2020-11-04 12:40:10'),
(129, 'put', 'ServiceTypes/{ServiceType}', 'ServiceTypesController', 'update', 'ServiceTypes.update', '2020-11-04 12:40:10', '2020-11-04 12:40:10'),
(130, 'delete', 'ServiceTypes/{ServiceType}', 'ServiceTypesController', 'destroy', 'ServiceTypes.destroy', '2020-11-04 12:40:10', '2020-11-04 12:40:10'),
(131, 'get', 'SecondPartyType', 'SecondPartyTypeController', 'index', 'SecondPartyType.index', '2020-11-04 12:40:10', '2020-11-04 12:40:10'),
(132, 'get', 'SecondPartyType/create', 'SecondPartyTypeController', 'create', 'SecondPartyType.create', '2020-11-04 12:40:10', '2020-11-04 12:40:10'),
(133, 'post', 'SecondPartyType', 'SecondPartyTypeController', 'store', 'SecondPartyType.store', '2020-11-04 12:40:10', '2020-11-04 12:40:10'),
(134, 'get', 'SecondPartyType/{SecondPartyType}', 'SecondPartyTypeController', 'show', 'SecondPartyType.show', '2020-11-04 12:40:10', '2020-11-04 12:40:10'),
(135, 'get', 'SecondPartyType/{SecondPartyType}/edit', 'SecondPartyTypeController', 'edit', 'SecondPartyType.edit', '2020-11-04 12:40:10', '2020-11-04 12:40:10'),
(136, 'put', 'SecondPartyType/{SecondPartyType}', 'SecondPartyTypeController', 'update', 'SecondPartyType.update', '2020-11-04 12:40:10', '2020-11-04 12:40:10'),
(137, 'delete', 'SecondPartyType/{SecondPartyType}', 'SecondPartyTypeController', 'destroy', 'SecondPartyType.destroy', '2020-11-04 12:40:10', '2020-11-04 12:40:10'),
(138, 'get', 'SecondParty', 'SecondPartyController', 'index', 'SecondParty.index', '2020-11-04 12:40:10', '2020-11-04 12:40:10'),
(139, 'get', 'SecondParty/create', 'SecondPartyController', 'create', 'SecondParty.create', '2020-11-04 12:40:10', '2020-11-04 12:40:10'),
(140, 'post', 'SecondParty', 'SecondPartyController', 'store', 'SecondParty.store', '2020-11-04 12:40:10', '2020-11-04 12:40:10'),
(141, 'get', 'SecondParty/{SecondParty}', 'SecondPartyController', 'show', 'SecondParty.show', '2020-11-04 12:40:10', '2020-11-04 12:40:10'),
(142, 'get', 'SecondParty/{SecondParty}/edit', 'SecondPartyController', 'edit', 'SecondParty.edit', '2020-11-04 12:40:11', '2020-11-04 12:40:11'),
(143, 'put', 'SecondParty/{SecondParty}', 'SecondPartyController', 'update', 'SecondParty.update', '2020-11-04 12:40:11', '2020-11-04 12:40:11'),
(144, 'delete', 'SecondParty/{SecondParty}', 'SecondPartyController', 'destroy', 'SecondParty.destroy', '2020-11-04 12:40:11', '2020-11-04 12:40:11'),
(145, 'get', 'SecondParty/{id}/delete', 'SecondPartyController', 'destroy', NULL, '2020-11-04 12:40:11', '2020-11-04 12:40:11'),
(146, 'get', 'secondparty/allData', 'SecondPartyController', 'allData', NULL, '2020-11-04 12:40:11', '2020-11-04 12:40:11'),
(147, 'get', 'attachment', 'AttachmentController', 'index', 'attachment.index', '2020-11-04 12:40:11', '2020-11-04 12:40:11'),
(148, 'get', 'attachment/create', 'AttachmentController', 'create', 'attachment.create', '2020-11-04 12:40:11', '2020-11-04 12:40:11'),
(149, 'post', 'attachment', 'AttachmentController', 'store', 'attachment.store', '2020-11-04 12:40:11', '2020-11-04 12:40:11'),
(150, 'get', 'attachment/{attachment}', 'AttachmentController', 'show', 'attachment.show', '2020-11-04 12:40:11', '2020-11-04 12:40:11'),
(151, 'get', 'attachment/{attachment}/edit', 'AttachmentController', 'edit', 'attachment.edit', '2020-11-04 12:40:11', '2020-11-04 12:40:11'),
(152, 'put', 'attachment/{attachment}', 'AttachmentController', 'update', 'attachment.update', '2020-11-04 12:40:12', '2020-11-04 12:40:12'),
(153, 'delete', 'attachment/{attachment}', 'AttachmentController', 'destroy', 'attachment.destroy', '2020-11-04 12:40:12', '2020-11-04 12:40:12'),
(154, 'get', 'ContractTemplate', 'ContractTemplateController', 'index', 'ContractTemplate.index', '2020-11-04 12:40:12', '2020-11-05 08:05:10'),
(155, 'get', 'ContractTemplate/create', 'ContractTemplateController', 'create', 'ContractTemplate.create', '2020-11-04 12:40:12', '2020-11-05 08:05:11'),
(156, 'post', 'ContractTemplate', 'ContractTemplateController', 'store', 'ContractTemplate.store', '2020-11-04 12:40:13', '2020-11-05 08:05:11'),
(157, 'get', 'ContractTemplate/{ContractTemplate}', 'ContractTemplateController', 'show', 'ContractTemplate.show', '2020-11-04 12:40:13', '2020-11-04 12:40:13'),
(158, 'get', 'ContractTemplate/{ContractTemplate}/edit', 'ContractTemplateController', 'edit', 'ContractTemplate.edit', '2020-11-04 12:40:13', '2020-11-05 08:05:11'),
(159, 'put', 'ContractTemplate/{ContractTemplate}', 'ContractTemplateController', 'update', 'ContractTemplate.update', '2020-11-04 12:40:13', '2020-11-05 08:05:11'),
(160, 'delete', 'ContractTemplate/{ContractTemplate}', 'ContractTemplateController', 'destroy', 'ContractTemplate.destroy', '2020-11-04 12:40:13', '2020-11-05 08:05:11'),
(161, 'get', 'ContractTemplate/{id}/items', 'ContractTemplateController', 'showContractTerms', NULL, '2020-11-04 12:40:13', '2020-11-05 08:05:12'),
(162, 'get', 'ContractTemplate/{id}/items/download', 'ContractTemplateController', 'downloadContractTerms', NULL, '2020-11-04 12:40:13', '2020-11-05 08:05:12'),
(163, 'post', 'ContractTemplate/{id}/storeItem', 'ContractTemplateController', 'storeContractTerms', NULL, '2020-11-04 12:40:13', '2020-11-05 08:05:12'),
(164, 'post', 'ContractTemplate/{id}/removeItem', 'ContractTemplateController', 'destroyContractTerms', NULL, '2020-11-04 12:40:13', '2020-11-05 08:05:12'),
(165, 'post', 'ContractTemplate/{id}/editItem', 'ContractTemplateController', 'editContractTerms', NULL, '2020-11-04 12:40:13', '2020-11-05 08:05:12'),
(166, 'get', 'contract/template/create', 'ContractTemplateController', 'editContractTerms', NULL, '2020-11-04 12:40:13', '2020-11-04 12:40:13'),
(167, 'get', 'Contract/{id}/items/download', 'FullcontractsController', 'downloadContractItems', NULL, '2020-11-04 12:40:14', '2020-11-04 12:40:14'),
(168, 'get', 'template_items/{id}', 'FullcontractsController', 'template_items', NULL, '2020-11-04 12:40:14', '2020-11-04 12:40:14'),
(169, 'get', 'contract_items_send/{id}/edit', 'ContractItemsApprovidsController', 'edit', NULL, '2020-11-04 12:40:14', '2020-11-04 12:40:14'),
(170, 'post', 'fullcontracts/{id}/updateapprove', 'ContractItemsApprovidsController', 'update', NULL, '2020-11-04 12:40:14', '2020-11-04 12:40:14'),
(171, 'get', 'contract_items_send/{id}/approves', 'ContractItemsApprovidsController', 'index', NULL, '2020-11-04 12:40:14', '2020-11-04 12:40:14'),
(172, 'get', 'ceo/{id}/approve', 'FullcontractsController', 'getCeoApprovePage', NULL, '2020-11-04 12:40:14', '2020-11-04 12:40:14'),
(173, 'post', 'ceo/{id}/approve', 'FullcontractsController', 'saveCeoApprove', NULL, '2020-11-04 12:40:14', '2020-11-04 12:40:14'),
(174, 'get', 'contracts/{id}/renew', 'FullcontractsController', 'getContractRenewPage', NULL, '2020-11-04 12:40:15', '2020-11-04 12:40:15'),
(175, 'post', 'contracts/{id}/renew', 'FullcontractsController', 'saveContractRenew', NULL, '2020-11-04 12:40:15', '2020-11-04 12:40:15'),
(176, 'get', 'users', 'UserController', 'index', NULL, '2020-11-04 12:40:15', '2020-11-05 08:14:08'),
(177, 'get', 'users/{id}/delete', 'UserController', 'destroy', NULL, '2020-11-04 12:40:15', '2020-11-05 08:06:27'),
(178, 'get', 'users/{id}/edit', 'UserController', 'edit', NULL, '2020-11-04 12:40:16', '2020-11-05 08:06:26'),
(179, 'post', 'users/{id}/update', 'UserController', 'update', NULL, '2020-11-04 12:40:16', '2020-11-05 08:06:26'),
(180, 'get', 'users/new', 'UserController', 'create', NULL, '2020-11-04 12:40:16', '2020-11-05 08:06:26'),
(181, 'post', 'users', 'UserController', 'store', NULL, '2020-11-04 12:40:16', '2020-11-05 08:06:26'),
(182, 'get', 'elFinder/elfinder', 'HomeController', 'elFinderlEfinder', NULL, '2020-11-04 12:40:16', '2020-11-04 12:40:16'),
(183, 'get', 'roles', 'RoleController', 'index', NULL, '2020-11-04 12:40:16', '2020-11-04 12:40:16'),
(184, 'get', 'roles/new', 'RoleController', 'create', NULL, '2020-11-04 12:40:16', '2020-11-04 12:40:16'),
(185, 'post', 'roles', 'RoleController', 'store', NULL, '2020-11-04 12:40:16', '2020-11-04 12:40:16'),
(186, 'get', 'roles/{id}/delete', 'RoleController', 'destroy', NULL, '2020-11-04 12:40:17', '2020-11-04 12:40:17'),
(187, 'get', 'roles/{id}/edit', 'RoleController', 'edit', NULL, '2020-11-04 12:40:17', '2020-11-04 12:40:17'),
(188, 'post', 'roles/{id}/update', 'RoleController', 'update', NULL, '2020-11-04 12:40:17', '2020-11-04 12:40:17'),
(189, 'get', 'setting', 'SettingController', 'index', 'setting.index', '2020-11-04 12:40:17', '2020-11-04 12:40:17'),
(190, 'get', 'setting/create', 'SettingController', 'create', 'setting.create', '2020-11-04 12:40:17', '2020-11-04 12:40:17'),
(191, 'post', 'setting', 'SettingController', 'store', 'setting.store', '2020-11-04 12:40:17', '2020-11-04 12:40:17'),
(192, 'get', 'setting/{setting}', 'SettingController', 'show', 'setting.show', '2020-11-04 12:40:17', '2020-11-04 12:40:17'),
(193, 'get', 'setting/{setting}/edit', 'SettingController', 'edit', 'setting.edit', '2020-11-04 12:40:18', '2020-11-04 12:40:18'),
(194, 'put', 'setting/{setting}', 'SettingController', 'update', 'setting.update', '2020-11-04 12:40:18', '2020-11-04 12:40:18'),
(195, 'delete', 'setting/{setting}', 'SettingController', 'destroy', 'setting.destroy', '2020-11-04 12:40:18', '2020-11-04 12:40:18'),
(196, 'get', 'setting/{id}/delete', 'SettingController', 'destroy', NULL, '2020-11-04 12:40:18', '2020-11-04 12:40:18'),
(197, 'get', 'rbt', 'RbtController', 'index', 'rbt.index', '2020-11-04 12:40:18', '2020-11-04 12:40:18'),
(198, 'get', 'rbt/search', 'RbtController', 'search', NULL, '2020-11-04 12:40:18', '2020-11-04 12:40:18'),
(199, 'post', 'rbt/search', 'RbtController', 'search_result', NULL, '2020-11-04 12:40:18', '2020-11-04 12:40:18'),
(200, 'get', 'report', 'ReportController', 'index', 'report.index', '2020-11-04 12:40:18', '2020-11-04 12:40:18'),
(201, 'get', 'report/search', 'ReportController', 'search', NULL, '2020-11-04 12:40:18', '2020-11-04 12:40:18'),
(202, 'post', 'report/search', 'ReportController', 'search_result', NULL, '2020-11-04 12:40:18', '2020-11-04 12:40:18'),
(203, 'post', 'rbt/get_statistics', 'RbtController', 'get_statistics', NULL, '2020-11-04 12:40:18', '2020-11-04 12:40:18'),
(204, 'get', 'rbt/statistics', 'RbtController', 'statitics', NULL, '2020-11-04 12:40:18', '2020-11-04 12:40:18'),
(205, 'get', 'rbt/file_system', 'RbtController', 'list_file_system', NULL, '2020-11-04 12:40:18', '2020-11-04 12:40:18'),
(206, 'get', 'rbt/excel', 'RbtController', 'excel', NULL, '2020-11-04 12:40:18', '2020-11-04 12:40:18'),
(207, 'post', 'rbt/excel', 'RbtController', 'excelStore', NULL, '2020-11-04 12:40:19', '2020-11-04 12:40:19'),
(208, 'get', 'rbt/downloadSample', 'RbtController', 'getDownload', NULL, '2020-11-04 12:40:19', '2020-11-04 12:40:19'),
(209, 'get', 'report/excel', 'ReportController', 'excel', NULL, '2020-11-04 12:40:19', '2020-11-04 12:40:19'),
(210, 'get', 'report/downloadSample', 'ReportController', 'getDownload', NULL, '2020-11-04 12:40:19', '2020-11-04 12:40:19'),
(211, 'post', 'report/excel', 'ReportController', 'excelStore', NULL, '2020-11-04 12:40:19', '2020-11-04 12:40:19'),
(212, 'post', 'report/export_report', 'ReportController', 'export_report', NULL, '2020-11-04 12:40:19', '2020-11-04 12:40:19'),
(213, 'get', 'rbt/allData', 'RbtController', 'allData', NULL, '2020-11-04 12:40:19', '2020-11-04 12:40:19'),
(214, 'get', 'rbt/{id}/editNew', 'RbtController', 'editNew', NULL, '2020-11-04 12:40:19', '2020-11-04 12:40:19'),
(215, 'post', 'rbt/excelNew', 'RbtController', 'excelNewStore', NULL, '2020-11-04 12:40:20', '2020-11-04 12:40:20'),
(216, 'get', 'rbt/downloadSampleNew', 'RbtController', 'getDownloadNew', NULL, '2020-11-04 12:40:20', '2020-11-04 12:40:20'),
(217, 'get', 'rbt/upload_tracks', 'RbtController', 'multi_upload', NULL, '2020-11-04 12:40:20', '2020-11-04 12:40:20'),
(218, 'post', 'rbt/save_tracks', 'RbtController', 'save_tracks', NULL, '2020-11-04 12:40:20', '2020-11-04 12:40:20'),
(219, 'get', 'rbt/delete_track/{id}', 'RbtController', 'delete_track', NULL, '2020-11-04 12:40:20', '2020-11-04 12:40:20'),
(220, 'post', 'rbt/{id}/update', 'RbtController', 'update', NULL, '2020-11-04 12:40:20', '2020-11-04 12:40:20'),
(221, 'get', 'rbt/{id}/delete', 'RbtController', 'destroy', NULL, '2020-11-04 12:40:20', '2020-11-04 12:40:20'),
(222, 'get', 'rbt/{id}/deleteMsg', 'RbtController', 'DeleteMsg', NULL, '2020-11-04 12:40:20', '2020-11-04 12:40:20'),
(223, 'get', 'rbt/create', 'RbtController', 'create', 'rbt.create', '2020-11-04 12:40:20', '2020-11-04 12:40:20'),
(224, 'post', 'rbt', 'RbtController', 'store', 'rbt.store', '2020-11-04 12:40:20', '2020-11-04 12:40:20'),
(225, 'get', 'rbt/{rbt}', 'RbtController', 'show', 'rbt.show', '2020-11-04 12:40:21', '2020-11-04 12:40:21'),
(226, 'get', 'rbt/{rbt}/edit', 'RbtController', 'edit', 'rbt.edit', '2020-11-04 12:40:21', '2020-11-04 12:40:21'),
(227, 'put', 'rbt/{rbt}', 'RbtController', 'update', 'rbt.update', '2020-11-04 12:40:21', '2020-11-04 12:40:21'),
(228, 'delete', 'rbt/{rbt}', 'RbtController', 'destroy', 'rbt.destroy', '2020-11-04 12:40:21', '2020-11-04 12:40:21'),
(229, 'get', 'report/statistics', 'ReportController', 'statitics', NULL, '2020-11-04 12:40:21', '2020-11-04 12:40:21'),
(230, 'put', 'report/{id}/update', 'ReportController', 'update', NULL, '2020-11-04 12:40:21', '2020-11-08 13:36:08'),
(231, 'delete', 'report/{id}/delete', 'ReportController', 'destroy', NULL, '2020-11-04 12:40:21', '2020-11-08 13:36:08'),
(232, 'get', 'report/{id}/deleteMsg', 'ReportController', 'DeleteMsg', NULL, '2020-11-04 12:40:21', '2020-11-04 12:40:21'),
(233, 'post', 'report/get_statistics', 'ReportController', 'get_statistics', NULL, '2020-11-04 12:40:21', '2020-11-04 12:40:21'),
(234, 'get', 'contents/excel', 'ContentController', 'create_excel', NULL, '2020-11-04 12:40:22', '2020-11-04 12:40:22'),
(235, 'post', 'contents/excel', 'ContentController', 'excel_store', NULL, '2020-11-04 12:40:22', '2020-11-04 12:40:22'),
(236, 'get', 'content/{id}/delete', 'ContentController', 'destroy', NULL, '2020-11-04 12:40:22', '2020-11-04 12:40:22'),
(237, 'get', 'contents/downloadSample', 'ContentController', 'getDownload', NULL, '2020-11-04 12:40:23', '2020-11-04 12:40:23'),
(238, 'get', 'contents/file_system', 'ContentController', 'list_file_system', NULL, '2020-11-04 12:40:23', '2020-11-04 12:40:23'),
(239, 'get', 'contents/upload_tracks', 'ContentController', 'multi_upload', NULL, '2020-11-04 12:40:23', '2020-11-04 12:40:23'),
(240, 'post', 'contents/save_tracks', 'ContentController', 'save_tracks', NULL, '2020-11-04 12:40:23', '2020-11-04 12:40:23'),
(241, 'get', 'content/allData', 'ContentController', 'allData', NULL, '2020-11-04 12:40:23', '2020-11-04 12:40:23'),
(242, 'get', 'content', 'ContentController', 'index', NULL, '2020-11-04 12:40:23', '2020-11-04 12:40:23'),
(243, 'get', 'content/{id}/edit', 'ContentController', 'edit', NULL, '2020-11-04 12:40:23', '2020-11-04 12:40:23'),
(244, 'patch', 'content/{id}/update', 'ContentController', 'update', NULL, '2020-11-04 12:40:23', '2020-11-04 12:40:23'),
(245, 'get', 'content/create', 'ContentController', 'create', NULL, '2020-11-04 12:40:23', '2020-11-04 12:40:23'),
(246, 'post', 'content', 'ContentController', 'store', NULL, '2020-11-04 12:40:23', '2020-11-04 12:40:23'),
(247, 'get', 'content/{id}/rbts', 'ContentController', 'show_rbt', NULL, '2020-11-04 12:40:24', '2020-11-04 12:40:24'),
(248, 'get', 'content/{id}', 'ContentController', 'show', NULL, '2020-11-04 12:40:24', '2020-11-04 12:40:24'),
(249, 'get', 'roadmaps', 'RoadMapController', 'index', 'admin.roadmaps.index', '2020-11-04 12:40:24', '2020-11-04 12:40:24'),
(250, 'get', 'roadmaps/create', 'RoadMapController', 'create', 'admin.roadmaps.create', '2020-11-04 12:40:24', '2020-11-04 12:40:24'),
(251, 'post', 'roadmaps', 'RoadMapController', 'store', 'admin.roadmaps.store', '2020-11-04 12:40:24', '2020-11-04 12:40:24'),
(252, 'get', 'roadmaps/{roadmap}', 'RoadMapController', 'show', 'admin.roadmaps.show', '2020-11-04 12:40:24', '2020-11-04 12:40:24'),
(253, 'get', 'roadmaps/{roadmap}/edit', 'RoadMapController', 'edit', 'admin.roadmaps.edit', '2020-11-04 12:40:24', '2020-11-04 12:40:24'),
(254, 'put', 'roadmaps/{roadmap}', 'RoadMapController', 'update', 'admin.roadmaps.update', '2020-11-04 12:40:24', '2020-11-04 12:40:24'),
(255, 'delete', 'roadmaps/{roadmap}', 'RoadMapController', 'destroy', 'admin.roadmaps.destroy', '2020-11-04 12:40:24', '2020-11-04 12:40:24'),
(256, 'get', 'roadmaps/{id}/delete', 'RoadMapController', 'destroy', NULL, '2020-11-04 12:40:24', '2020-11-04 12:40:24'),
(257, 'get', 'roadmap/allData', 'RoadMapController', 'allData', NULL, '2020-11-04 12:40:25', '2020-11-04 12:40:25'),
(258, 'get', 'roadmaps/calendar/index', 'RoadMapController', 'calendarIndex', 'admin.roadmaps.calendar.index', '2020-11-04 12:40:25', '2020-11-04 12:40:25'),
(259, 'get', 'roadmaps/stop/{id}', 'RoadMapController', 'stop_roadmap', NULL, '2020-11-04 12:40:25', '2020-11-04 12:40:25'),
(260, 'get', 'report/create', 'ReportController', 'create', 'report.create', '2020-11-04 12:40:25', '2020-11-04 12:40:25'),
(261, 'post', 'report', 'ReportController', 'store', 'report.store', '2020-11-04 12:40:25', '2020-11-04 12:40:25'),
(262, 'get', 'report/{report}', 'ReportController', 'show', 'report.show', '2020-11-04 12:40:25', '2020-11-04 12:40:25'),
(263, 'get', 'report/{report}/edit', 'ReportController', 'edit', 'report.edit', '2020-11-04 12:40:25', '2020-11-04 12:40:25'),
(264, 'put', 'report/{report}', 'ReportController', 'update', 'report.update', '2020-11-04 12:40:25', '2020-11-04 12:40:25'),
(265, 'delete', 'report/{report}', 'ReportController', 'destroy', 'report.destroy', '2020-11-04 12:40:25', '2020-11-04 12:40:25'),
(266, 'get', 'employees', 'EmployeesController', 'index', 'employees.index', '2020-11-04 12:40:26', '2020-11-04 12:40:26'),
(267, 'get', 'employees/create', 'EmployeesController', 'create', 'employees.create', '2020-11-04 12:40:26', '2020-11-04 12:40:26'),
(268, 'post', 'employees', 'EmployeesController', 'store', 'employees.store', '2020-11-04 12:40:26', '2020-11-04 12:40:26'),
(269, 'get', 'employees/{employee}', 'EmployeesController', 'show', 'employees.show', '2020-11-04 12:40:26', '2020-11-04 12:40:26'),
(270, 'get', 'employees/{employee}/edit', 'EmployeesController', 'edit', 'employees.edit', '2020-11-04 12:40:26', '2020-11-04 12:40:26'),
(271, 'put', 'employees/{employee}', 'EmployeesController', 'update', 'employees.update', '2020-11-04 12:40:26', '2020-11-04 12:40:26'),
(272, 'delete', 'employees/{employee}', 'EmployeesController', 'destroy', 'employees.destroy', '2020-11-04 12:40:26', '2020-11-04 12:40:26'),
(273, 'get', 'employees/{id}/show', 'EmployeesController', 'show', NULL, '2020-11-04 12:40:26', '2020-11-04 12:40:26'),
(274, 'post', 'employees/{id}/update', 'EmployeesController', 'update', NULL, '2020-11-04 12:40:26', '2020-11-04 12:40:26'),
(275, 'get', 'employees/{id}/delete', 'EmployeesController', 'destroy', NULL, '2020-11-04 12:40:26', '2020-11-04 12:40:26'),
(276, 'get', 'employees/{id}/contracts', 'EmployeeContractsController', 'create', NULL, '2020-11-04 12:40:26', '2020-11-04 12:40:26'),
(277, 'post', 'employees/{id}/contracts', 'EmployeeContractsController', 'store', NULL, '2020-11-04 12:40:26', '2020-11-04 12:40:26'),
(278, 'get', 'employee_contract/{id}/delete', 'EmployeeContractsController', 'destroy', NULL, '2020-11-04 12:40:26', '2020-11-04 12:40:26'),
(279, 'get', 'employee_contract/{id}/edit', 'EmployeeContractsController', 'edit', NULL, '2020-11-04 12:40:27', '2020-11-04 12:40:27'),
(280, 'post', 'employee_contract/{id}/update', 'EmployeeContractsController', 'update', NULL, '2020-11-04 12:40:27', '2020-11-04 12:40:27'),
(281, 'get', 'department', 'DepartmentController', 'index', 'department.index', '2020-11-04 12:40:27', '2020-11-04 12:40:27'),
(282, 'get', 'department/create', 'DepartmentController', 'create', 'department.create', '2020-11-04 12:40:27', '2020-11-04 12:40:27'),
(283, 'post', 'department', 'DepartmentController', 'store', 'department.store', '2020-11-04 12:40:27', '2020-11-04 12:40:27'),
(284, 'get', 'department/{department}', 'DepartmentController', 'show', 'department.show', '2020-11-04 12:40:27', '2020-11-04 12:40:27'),
(285, 'get', 'department/{department}/edit', 'DepartmentController', 'edit', 'department.edit', '2020-11-04 12:40:27', '2020-11-04 12:40:27'),
(286, 'put', 'department/{department}', 'DepartmentController', 'update', 'department.update', '2020-11-04 12:40:27', '2020-11-04 12:40:27'),
(287, 'delete', 'department/{department}', 'DepartmentController', 'destroy', 'department.destroy', '2020-11-04 12:40:27', '2020-11-04 12:40:27'),
(288, 'get', 'department/{id}/delete', 'DepartmentController', 'destroy', NULL, '2020-11-04 12:40:27', '2020-11-04 12:40:27'),
(289, 'get', 'sendemail', 'DepartmentController', 'contract_items_send_email', NULL, '2020-11-04 12:40:27', '2020-11-04 12:40:27'),
(290, 'get', 'get_table_ids', 'HomeController', 'get_table_ids_list', NULL, '2020-11-04 12:40:28', '2020-11-04 12:40:28'),
(291, 'get', 'fix_date_for_content', 'ContentController', 'fix_date_for_content', NULL, '2020-11-04 12:40:28', '2020-11-04 12:40:28'),
(292, 'get', 'all_routes', 'RouteController', 'index', NULL, '2018-02-05 11:39:21', '2019-10-13 09:51:33'),
(293, 'post', 'routes', 'RouteController', 'store', NULL, '2018-02-05 11:39:21', '2018-02-05 11:39:21'),
(294, 'get', 'routes/{id}/edit', 'RouteController', 'edit', NULL, '2018-02-05 11:39:21', '2018-02-05 11:39:21'),
(295, 'post', 'routes/{id}/update', 'RouteController', 'update', NULL, '2018-02-05 11:39:21', '2018-01-28 07:25:29'),
(296, 'get', 'routes/{id}/delete', 'RouteController', 'destroy', NULL, '2018-02-05 11:39:21', '2018-02-05 11:39:21'),
(297, 'get', 'routes/create', 'RouteController', 'create', NULL, '2018-02-05 11:39:21', '2018-02-05 11:39:21'),
(298, 'get', 'routes/index_v2', 'RouteController', 'index_v2', NULL, '2017-11-12 11:45:15', '2017-11-12 12:04:53'),
(299, 'get', 'all_routes/{id}/edit', 'RouteController', 'edit', NULL, NULL, NULL),
(300, 'get', 'all_routes/{id}/delete', 'RouteController', 'destroy', NULL, NULL, NULL),
(301, 'get', 'routes_v2', 'RouteController', 'create_v2', NULL, NULL, NULL),
(302, 'get', 'get_controller_methods', 'RouteController', 'get_methods_for_selected_controller', NULL, NULL, NULL),
(303, 'post', 'routes/store_v2', 'RouteController', 'store_v2', NULL, NULL, NULL);

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
(1, 'super admin', 'super_admin@ivas.com', '$2y$10$u2evAW530miwgUb2jcXkTuqIGswxnSQ3DSmX1Ji5rtO3Tx.MtVcX2', 'q1oa8sGkSMRxvNiPEjncn20sCMFHlABLy6qR2qGwKCVHT0kZVtHfqh5xexCE', '2017-11-09 11:13:14', '2018-11-26 13:11:50', '', NULL),
(13, 'Radwa Elenany', 'radwa.elenany@ivas.com.eg', '$2y$10$/LdvWQ4se9HLmB/WDVQ1fOviZGr1szPVMrquyMOyUHnyDGZNEG1I.', 'KO8Gs6GzfwT9M1xmaGO1fpdR1Tr4GOwZRsgAyMogIfO7G2CMPnNP3kk1vwz3', '2020-11-08 12:10:13', '2020-11-08 12:10:13', '', NULL),
(14, 'Hazem Hossam', 'hazem.hossam@ivas.com.eg', '$2y$10$IPqvIuzOYgQOV/Q.KMprpuKBxfpCLihhIwxiHYIarDlzoIWyC0QtS', NULL, '2020-11-08 12:10:43', '2020-11-08 12:10:43', '', NULL),
(15, 'Mohamed Abdullah', 'm.abdallah@ivas.com.eg', '$2y$10$Mm3ov5Ciu.KTg9T769eNj.abrYfT4eCM/PtWy6q1vITX95iWH4OU6', NULL, '2020-11-08 12:12:32', '2020-11-08 12:12:32', '', NULL),
(16, 'Radwa Atef', 'radwa.atef@ivas.com.eg', '$2y$10$4ojYjqycO7C6XM5JPTnnWewIMjsSxgepoMB2UmRVGHxUYzO8Td3rK', NULL, '2020-11-08 12:17:54', '2020-11-08 12:35:19', '', NULL),
(17, 'Amir Ali', 'amirali@ivas.com.eg', '$2y$10$I9/DR9X90Vt5BCA7yHZ6tuqXrve8SS/5zCQbDuLICkMwP7FEQbU32', NULL, '2020-11-08 12:18:53', '2020-11-08 12:18:53', '', NULL),
(18, 'Sayed Aref', 'sayed@ivas.com.eg', '$2y$10$wlwCYJyDx0eoawpe9yGMbeWTZExtaR0lFhmdIFIkIzt74fPcRrwwi', NULL, '2020-11-08 12:19:28', '2020-11-08 12:19:28', '', NULL),
(19, 'Emad Mohamed', 'emad@ivas.com.eg', '$2y$10$X7rvLxDWJ4W/RdNadnDERepPbi2CXWBR15GtwPH5yf.TjuDMREtRC', NULL, '2020-11-08 12:19:59', '2020-11-08 12:19:59', '', NULL),
(20, 'Raafat Ahmed', 'raafat.ahmed@ivas.com.eg', '$2y$10$oqQv9djdC8.7utB6hjTFXu7u68ODi.LpYGc6kn5B1e0muSe7YFGPq', NULL, '2020-11-08 12:20:23', '2020-11-08 12:20:23', '', NULL),
(21, 'Mohamed Qurashy', 'm.alqurashy@ivas.com.eg', '$2y$10$gO7RmQMiofiUm9/EOg8nUuTHufgqDRDJFHVaRKMM0DaQ76I1nix/q', 'iRlYdvdIzV4CaNTWuGlDCoDfxL7z5xKeEMchPfQf3HiajvYLwNnfBjzdaVSV', '2020-11-08 12:20:55', '2020-11-08 12:20:55', '', NULL),
(22, 'Dalia Solaiman', 'dalia.soliman@ivas.com.eg', '$2y$10$P/C8qrv91p31W5Pp3CQ3re6BACKgCxiCGHFW6W.nMsHsNz./.IURW', NULL, '2020-11-08 12:21:26', '2020-11-08 12:21:26', '', NULL),
(23, 'Hussein Mohamed', 'hussein@ivas.com.eg', '$2y$10$zZQWH0ef2WsO0jP5TisRy.RyCO.DJGgEwR1w0BclRL8PVd00lSh0e', NULL, '2020-11-08 12:22:08', '2020-11-08 12:22:08', '', NULL),
(24, 'Mohamed Hamdy', 'mhamdy@ivas.com.eg', '$2y$10$.QRhJ2B3zVjpfEvOEplnZ.z5PiWcDxz3bUXC1CwNkfrCH42Z5KsKm', NULL, '2020-11-08 12:26:11', '2020-11-08 12:26:11', '', NULL),
(25, 'Tosson Talat', 'tosson@ivas.com.eg', '$2y$10$r4Pp6wng0OHgBKyCKCuxaueBHhTNxyNnCr5.UfRL6qpD9zfoWzan.', NULL, '2020-11-08 12:26:48', '2020-11-08 12:26:48', '', NULL),
(26, 'Ahmed Khattab', 'ahmed.khattab@ivas.com.eg', '$2y$10$HpovyX1.noeH54QqchlQOOU9bXqC9nCyWMcvN0neVrNA7oL.Zt2Zi', NULL, '2020-11-08 12:27:58', '2020-11-08 12:27:58', '', NULL),
(27, 'Mohamed Mostafa', 'm.mostafa@ivas.com.eg', '$2y$10$XjcphPu578UMogklBLm86et94ksXYZI5D/UngyxP2itoaPvIuo0DC', NULL, '2020-11-08 12:28:32', '2020-11-08 12:28:32', '', NULL),
(28, 'Hany Shaker', 'hany@digizone.com.kw', '$2y$10$6HQu5s7bDWM/m2LWORyVYu1fCpixrOQKp/KHAAQJniodb6IqMwJb6', NULL, '2020-11-08 12:30:12', '2020-11-08 12:30:12', '', NULL),
(29, 'Mohamed Falaky', 'mohamed.falaky@ivas.com.eg', '$2y$10$9mb3T0welBGeRYJhHYiFpOlEzpo3mtd32MtaeaCC/0ys.KU8nJzk6', NULL, '2020-11-08 12:31:01', '2020-11-08 12:31:01', '', NULL);

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
(1, 1),
(1, 2),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(3, 4),
(6, 10),
(7, 11),
(7, 12),
(8, 13),
(8, 14),
(9, 15),
(10, 16),
(11, 17),
(12, 18),
(13, 19),
(14, 20),
(15, 21),
(16, 22),
(17, 23),
(18, 24),
(19, 25),
(20, 26),
(20, 27),
(21, 28),
(21, 29);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `departments_manager_id_foreign` (`manager_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_route`
--
ALTER TABLE `role_route`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id_2` (`role_id`),
  ADD KEY `route_id_2` (`route_id`);

--
-- Indexes for table `routes`
--
ALTER TABLE `routes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

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
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `role_route`
--
ALTER TABLE `role_route`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=376;

--
-- AUTO_INCREMENT for table `routes`
--
ALTER TABLE `routes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=304;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `departments`
--
ALTER TABLE `departments`
  ADD CONSTRAINT `departments_manager_id_foreign` FOREIGN KEY (`manager_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_route`
--
ALTER TABLE `role_route`
  ADD CONSTRAINT `role_route_ibfk_1` FOREIGN KEY (`route_id`) REFERENCES `routes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_route_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
