/*
Navicat MySQL Data Transfer

Source Server         : localhost_7.3
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : rbt_system

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2020-10-21 16:27:05
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `aggregators`
-- ----------------------------
DROP TABLE IF EXISTS `aggregators`;
CREATE TABLE `aggregators` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of aggregators
-- ----------------------------
INSERT INTO `aggregators` VALUES ('1', 'Arpu', '2020-09-06 11:52:35', '2020-09-06 11:52:35');

-- ----------------------------
-- Table structure for `amount_revenu`
-- ----------------------------
DROP TABLE IF EXISTS `amount_revenu`;
CREATE TABLE `amount_revenu` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `contract_service_id` bigint(20) unsigned NOT NULL,
  `revenu_id` bigint(20) unsigned NOT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of amount_revenu
-- ----------------------------
INSERT INTO `amount_revenu` VALUES ('1', '31', '1', '50', null, null);
INSERT INTO `amount_revenu` VALUES ('2', '32', '1', '50', null, null);
INSERT INTO `amount_revenu` VALUES ('3', '31', '2', '50', null, null);
INSERT INTO `amount_revenu` VALUES ('4', '32', '2', '50', null, null);
INSERT INTO `amount_revenu` VALUES ('5', '31', '3', '50.59', null, null);
INSERT INTO `amount_revenu` VALUES ('6', '32', '3', '50', null, null);
INSERT INTO `amount_revenu` VALUES ('7', '29', '4', '100', null, null);
INSERT INTO `amount_revenu` VALUES ('8', '30', '4', '50.20', null, null);
INSERT INTO `amount_revenu` VALUES ('9', '31', '4', '40.70', null, null);

-- ----------------------------
-- Table structure for `attachments`
-- ----------------------------
DROP TABLE IF EXISTS `attachments`;
CREATE TABLE `attachments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `attachment_code` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#',
  `contract_id` bigint(20) unsigned NOT NULL,
  `attachment_type` tinyint(4) NOT NULL COMMENT '1:annex/2:authorization/3:copyright',
  `attachment_title` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attachment_date` date NOT NULL,
  `attachment_expiry_date` date NOT NULL,
  `contract_expiry_date` date NOT NULL,
  `attachment_pdf` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attachment_status` tinyint(1) NOT NULL COMMENT '1:Active/0:Expired',
  `notes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of attachments
-- ----------------------------
INSERT INTO `attachments` VALUES ('1', 'AL/C#2020/09/20/1600615407/1601285590', '1', '3', 'attachment1', '2020-09-23', '2020-10-03', '2021-07-09', 'uploads//attachments/pdf//2020/09/28/1601285590.pdf', '0', null, '2020-09-28 09:33:10', '2020-09-28 09:34:42');
INSERT INTO `attachments` VALUES ('2', 'AL/C#2020/09/20/1600615407/1602059164', '1', '1', 'rotana flatter auth', '2020-10-01', '2020-11-07', '2021-07-09', 'uploads//attachments/pdf//2020/10/07/1602059164.pdf', '0', null, '2020-10-07 08:26:04', '2020-10-07 08:28:05');
INSERT INTO `attachments` VALUES ('3', 'AL/C#2020/10/07/1602068481/1602071077', '4', '2', 'mishar auth', '2020-10-01', '2020-10-30', '2021-10-20', 'uploads//attachments/pdf//2020/10/07/1602071077.pdf', '1', null, '2020-10-07 11:44:37', '2020-10-07 11:44:37');
INSERT INTO `attachments` VALUES ('4', 'AN/C#2020/10/07/1602068481/1602071197', '4', '1', 'mishari annex', '2020-08-01', '2020-09-27', '2021-10-20', 'uploads//attachments/pdf//2020/10/07/1602071197.pdf', '0', null, '2020-10-07 11:46:37', '2020-10-07 11:46:37');
INSERT INTO `attachments` VALUES ('5', 'CR/C#2020/10/07/1602068481/1602418532', '4', '3', 'attachment_mishari4', '2020-10-10', '2021-10-23', '2021-10-20', 'uploads/attachments/pdf/2020/10/11/1602418562.png', '1', 'testggggggggggg', '2020-10-11 12:15:32', '2020-10-11 14:24:58');

-- ----------------------------
-- Table structure for `contents`
-- ----------------------------
DROP TABLE IF EXISTS `contents`;
CREATE TABLE `contents` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `content_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_preview` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `internal_coding` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` int(10) unsigned DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `occasion_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `contract_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `contents_provider_id_foreign` (`provider_id`),
  KEY `contents_user_id_foreign` (`user_id`),
  KEY `contents_occasion_id_foreign` (`occasion_id`),
  CONSTRAINT `contents_occasion_id_foreign` FOREIGN KEY (`occasion_id`) REFERENCES `occasions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `contents_provider_id_foreign` FOREIGN KEY (`provider_id`) REFERENCES `providers` (`id`) ON DELETE CASCADE,
  CONSTRAINT `contents_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of contents
-- ----------------------------
INSERT INTO `contents` VALUES ('10', 'لصار بعدك', 'audio', '/uploads/content/2020-09-17/1600338690450.mp3', null, 'Co/2020/09/20/1600606110', '2', null, '6', '2019-08-25 13:32:00', '2020-10-07 11:53:21', '2');
INSERT INTO `contents` VALUES ('34', 'اللهم تقبل شفاعة محمد الكبري', 'audio', '/uploads/content/2020-09-17/1600338594857.mp3', null, 'Co/2020/09/20/1600606111', '1', null, '16', '2020-09-17 10:29:54', '2020-10-07 11:49:59', '4');
INSERT INTO `contents` VALUES ('35', 'ولقد زينا السماء الدنيا', 'audio', '/uploads/content/2020-09-20/1600606119930.wav', null, 'Co/2020/09/20/1600606119', '1', null, '16', '2020-09-20 12:48:39', '2020-10-07 11:48:51', '4');
INSERT INTO `contents` VALUES ('36', 'شيرين 1', 'audio', '/uploads/content/2020-10-07/160207831345.wav', null, 'Co/2020/10/07/1602078313', '5', null, '9', '2020-10-07 13:45:14', '2020-10-07 13:45:32', '3');
INSERT INTO `contents` VALUES ('40', 'test12', 'audio', '/uploads/content/2020-10-12/1602500389611.wav', null, 'Co/2020/10/12/1602500389', '1', null, '21', '2020-10-12 10:59:50', '2020-10-12 10:59:50', '6');
INSERT INTO `contents` VALUES ('44', 'content12_1', 'audio', 'uploads/content/2020-10-12/content12_1.wav', null, 'Co/2020/10/12/5f843d76943dd', '8', '1', '21', '2020-10-12 11:26:46', '2020-10-12 11:26:46', '6');
INSERT INTO `contents` VALUES ('45', 'content12_2', 'audio', 'uploads/content/2020-10-12/content12_2.wav', null, 'Co/2020/10/12/5f843d769e6cc', '8', '1', '21', '2020-10-12 11:26:46', '2020-10-12 11:26:46', '6');
INSERT INTO `contents` VALUES ('46', 'content12_3', 'audio', 'uploads/content/2020-10-12/content12_3.wav', null, 'Co/2020/10/12/5f843d76a92f9', '8', '1', '21', '2020-10-12 11:26:46', '2020-10-12 11:26:46', '6');

-- ----------------------------
-- Table structure for `contracts`
-- ----------------------------
DROP TABLE IF EXISTS `contracts`;
CREATE TABLE `contracts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `contract_code` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#CODE',
  `service_type_id` bigint(20) unsigned NOT NULL,
  `contract_label` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'set contract name',
  `first_party_id` bigint(20) unsigned NOT NULL,
  `first_party_select` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0:no | 1:yes',
  `second_party_id` bigint(20) unsigned NOT NULL,
  `first_party` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `second_party` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_party_percentage` tinyint(1) NOT NULL,
  `second_party_percentage` tinyint(1) NOT NULL,
  `contract_date` date NOT NULL DEFAULT '2020-05-28',
  `contract_duration_id` bigint(20) unsigned NOT NULL,
  `renewal_status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0:no | 1:yes | 2:renewal by another one',
  `contract_status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0:terminated/1:active',
  `contract_expiry_date` date DEFAULT NULL,
  `country_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `operator_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `copies` tinyint(1) DEFAULT 2,
  `pages` tinyint(1) DEFAULT 10,
  `contract_pdf` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contract_notes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `btn_annex` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `btn_auturaisition` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `btn_copyrights` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `entry_by_details` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `entry_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `second_party_type_id` bigint(20) unsigned DEFAULT NULL,
  `contract_type` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1-new 2-draft',
  `full_approves` int(11) NOT NULL DEFAULT 0 COMMENT '1-allApproved 0-notApproved',
  `ceo_approve` tinyint(4) NOT NULL DEFAULT 0,
  `contract_signed_date` date DEFAULT NULL,
  `first_party_signature` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `second_party_signature` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_party_seal` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `second_party_seal` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `service_type_id` (`service_type_id`),
  KEY `contracts_first_party_id_foreign` (`first_party_id`),
  KEY `contracts_second_party_id_foreign` (`second_party_id`),
  KEY `contracts_contract_duration_id_foreign` (`contract_duration_id`),
  KEY `second_party_type_id` (`second_party_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of contracts
-- ----------------------------
INSERT INTO `contracts` VALUES ('1', 'C#2020/09/20/1600615407', '2', 'rotana - filters', '1', '1', '29', '', '', '2', '0', '2021-01-30', '1', '1', '1', '2021-07-09', 'Egypt,KSA,kuwait', 'etisalat,Vodafone,Orange', '1', '5', '1600096765.pdf', 'notes', null, null, null, 'super admin', '0', '2020-09-14 15:19:25', '2020-09-20 15:23:27', '2', '1', '0', '0', null, null, null, null, null);
INSERT INTO `contracts` VALUES ('2', 'C#2020/10/07/1602071568', '3', 'hamed', '1', '1', '28', '', '', '2', '0', '2020-09-24', '1', '1', '1', '2020-09-24', 'Egypt', 'Vodafone', '1', '5', '1600165586.pdf', null, null, null, null, 'super admin', '0', '2020-09-15 10:26:26', '2020-10-07 11:52:48', '2', '1', '0', '0', null, null, null, null, null);
INSERT INTO `contracts` VALUES ('3', 'C#2020/09/16/1600253892', '2', 'contract3', '1', '1', '24', '', '', '3', '0', '2020-10-08', '3', '0', '0', '2020-10-08', 'Egypt,KSA', 'etisalat,Vodafone', '1', '5', '1600252558.pdf', 'nnnnnnnnnnnn', null, null, null, 'super admin', '0', '2020-09-16 10:35:58', '2020-09-16 10:58:12', '1', '1', '0', '0', null, null, null, null, null);
INSERT INTO `contracts` VALUES ('4', 'C#2020/10/11/1602419536', '3', 'mishari', '1', '1', '28', '', '', '10', '0', '2021-10-01', '1', '1', '1', '2021-10-20', 'Egypt,KSA,kuwait,All countries', 'etisalat-Egypt,Vodafone-Egypt,Orange-Egypt', '3', '5', '1602068046.pdf', 'test', null, null, null, 'super admin', '0', '2020-10-07 10:54:06', '2020-10-11 12:32:16', '2', '1', '0', '0', null, null, null, null, null);
INSERT INTO `contracts` VALUES ('5', 'C#2020/10/11/1602427043', '3', 'melody', '1', '1', '29', '', '', '10', '0', '2020-10-11', '1', '0', '0', '2020-10-25', 'Egypt,KSA', 'etisalat-Egypt,zain-KSA', '2', '5', null, 'edits', null, null, null, 'super admin', '0', '2020-10-11 14:27:27', '2020-10-11 14:37:23', '2', '1', '0', '0', null, null, null, null, null);
INSERT INTO `contracts` VALUES ('6', 'C#2020/10/12/1602499991', '3', 'contract_12', '1', '1', '29', '', '', '6', '0', '2020-10-03', '2', '1', '1', '2022-10-02', 'Egypt,KSA', 'etisalat-Egypt,zain-KSA', '2', '5', '1602499991.pdf', 'notes', null, null, null, 'super admin', '0', '2020-10-12 10:52:40', '2020-10-12 10:53:11', '2', '1', '0', '0', null, null, null, null, null);
INSERT INTO `contracts` VALUES ('7', 'C#2020/10/20/1603188865', '3', 'contract_15 9999', '2', '1', '28', '', '', '5', '95', '2020-10-01', '1', '1', '1', null, 'Egypt,KSA,kuwait', 'etisalat,zain,zain', '2', '5', '1603188865.pdf', 'not', null, null, null, 'super admin', '0', '2020-10-15 09:23:51', '2020-10-20 10:14:25', '2', '1', '0', '0', null, null, null, null, null);

-- ----------------------------
-- Table structure for `contract_duration`
-- ----------------------------
DROP TABLE IF EXISTS `contract_duration`;
CREATE TABLE `contract_duration` (
  `contract_duration_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `contract_duration_title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'add a duration',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`contract_duration_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of contract_duration
-- ----------------------------
INSERT INTO `contract_duration` VALUES ('1', '1 Year', null, null);
INSERT INTO `contract_duration` VALUES ('2', '2 Years', null, null);
INSERT INTO `contract_duration` VALUES ('3', '3 Years', null, null);
INSERT INTO `contract_duration` VALUES ('4', '5 Years', null, null);

-- ----------------------------
-- Table structure for `contract_items`
-- ----------------------------
DROP TABLE IF EXISTS `contract_items`;
CREATE TABLE `contract_items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `item` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_ids` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contract_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `fullapproves` int(11) NOT NULL DEFAULT 0 COMMENT '1-allApproved 0-notApproved',
  PRIMARY KEY (`id`),
  KEY `contract_id` (`contract_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of contract_items
-- ----------------------------

-- ----------------------------
-- Table structure for `contract_items_approves`
-- ----------------------------
DROP TABLE IF EXISTS `contract_items_approves`;
CREATE TABLE `contract_items_approves` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned DEFAULT NULL,
  `contract_item_id` int(10) unsigned DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '2-approves 1-notapproves 0-notactions',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `contract_items_approves_user_id_foreign` (`user_id`),
  KEY `contract_items_approves_contract_item_id_foreign` (`contract_item_id`),
  CONSTRAINT `contract_items_approves_contract_item_id_foreign` FOREIGN KEY (`contract_item_id`) REFERENCES `contract_items` (`id`) ON DELETE CASCADE,
  CONSTRAINT `contract_items_approves_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of contract_items_approves
-- ----------------------------

-- ----------------------------
-- Table structure for `contract_services`
-- ----------------------------
DROP TABLE IF EXISTS `contract_services`;
CREATE TABLE `contract_services` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `contract_id` bigint(20) unsigned NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of contract_services
-- ----------------------------
INSERT INTO `contract_services` VALUES ('29', '4', 'mishri alert for zain kuwait', '2020-09-10 09:23:54', '2020-10-07 10:58:35');
INSERT INTO `contract_services` VALUES ('30', '4', 'mishri alert for ooredoo kuwait', '2020-09-10 09:23:58', '2020-10-07 10:58:35');
INSERT INTO `contract_services` VALUES ('31', '4', 'mishri alert for stc kuwait', '2020-09-14 15:20:31', '2020-10-07 10:58:35');
INSERT INTO `contract_services` VALUES ('32', '1', 'service2', '2020-09-14 15:20:44', '2020-09-14 15:20:44');
INSERT INTO `contract_services` VALUES ('33', '2', 'service3', '2020-09-15 12:10:27', '2020-09-15 12:10:27');
INSERT INTO `contract_services` VALUES ('34', '2', 'service4', '2020-09-15 12:10:38', '2020-09-15 12:10:38');
INSERT INTO `contract_services` VALUES ('35', '2', 'service5', '2020-09-15 15:28:11', '2020-09-15 15:28:11');
INSERT INTO `contract_services` VALUES ('36', '3', 'service1', '2020-09-16 11:26:22', '2020-09-16 11:26:22');
INSERT INTO `contract_services` VALUES ('37', '3', 'service2', '2020-09-16 11:26:22', '2020-09-16 11:26:22');
INSERT INTO `contract_services` VALUES ('38', '3', 'service3', '2020-09-16 11:26:22', '2020-09-16 11:26:22');

-- ----------------------------
-- Table structure for `countries`
-- ----------------------------
DROP TABLE IF EXISTS `countries`;
CREATE TABLE `countries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of countries
-- ----------------------------
INSERT INTO `countries` VALUES ('1', 'Egypt', '2019-02-11 13:12:04', '2019-02-11 13:12:04');
INSERT INTO `countries` VALUES ('2', 'KSA', '2019-02-11 13:12:10', '2019-02-11 13:12:10');
INSERT INTO `countries` VALUES ('3', 'kuwait', '2020-09-06 11:52:17', '2020-09-06 11:52:17');
INSERT INTO `countries` VALUES ('5', 'All countries', null, null);

-- ----------------------------
-- Table structure for `currencies`
-- ----------------------------
DROP TABLE IF EXISTS `currencies`;
CREATE TABLE `currencies` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of currencies
-- ----------------------------
INSERT INTO `currencies` VALUES ('1', 'USD', null, null);
INSERT INTO `currencies` VALUES ('2', 'SAR', null, null);
INSERT INTO `currencies` VALUES ('3', 'EGP', null, null);
INSERT INTO `currencies` VALUES ('5', 'KWD', '2020-10-07 08:35:07', '2020-10-07 08:35:07');

-- ----------------------------
-- Table structure for `departments`
-- ----------------------------
DROP TABLE IF EXISTS `departments`;
CREATE TABLE `departments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manager_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `departments_manager_id_foreign` (`manager_id`),
  CONSTRAINT `departments_manager_id_foreign` FOREIGN KEY (`manager_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of departments
-- ----------------------------
INSERT INTO `departments` VALUES ('1', 'operation', 'emad@ivas.com.eg', '1', '2020-09-06 11:51:58', '2020-09-06 11:51:58');
INSERT INTO `departments` VALUES ('2', 'Development', 'dev@ivas.com.eg', '2', '2020-10-07 08:30:12', '2020-10-07 08:30:30');

-- ----------------------------
-- Table structure for `first_parties`
-- ----------------------------
DROP TABLE IF EXISTS `first_parties`;
CREATE TABLE `first_parties` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `first_party_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_party_joining_date` date NOT NULL DEFAULT '2020-09-10',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of first_parties
-- ----------------------------
INSERT INTO `first_parties` VALUES ('1', 'iVAS', '2013-01-01', null, null);
INSERT INTO `first_parties` VALUES ('2', 'DigiZone', '2019-01-01', null, null);
INSERT INTO `first_parties` VALUES ('3', 'Scene Production', '2016-01-01', null, null);

-- ----------------------------
-- Table structure for `migrations`
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('1', '2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('2', '2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('3', '2017_08_01_141233_create_permission_tables', '1');
INSERT INTO `migrations` VALUES ('4', '2017_08_02_091157_aggregators', '1');
INSERT INTO `migrations` VALUES ('5', '2017_08_02_091356_countries', '1');
INSERT INTO `migrations` VALUES ('6', '2017_08_02_091457_operators', '1');
INSERT INTO `migrations` VALUES ('7', '2017_08_02_091531_providers', '1');
INSERT INTO `migrations` VALUES ('8', '2017_08_02_091653_occasions', '1');
INSERT INTO `migrations` VALUES ('9', '2017_08_02_092035_rbts', '1');
INSERT INTO `migrations` VALUES ('10', '2017_08_02_092417_currencies', '1');
INSERT INTO `migrations` VALUES ('11', '2017_08_02_092528_types', '1');
INSERT INTO `migrations` VALUES ('12', '2017_08_02_092853_reports', '1');
INSERT INTO `migrations` VALUES ('13', '2017_08_02_104125_add_profile_image_to_user', '1');
INSERT INTO `migrations` VALUES ('14', '2017_08_03_105704_remove_rbt_titke_ar_from_rbt', '1');
INSERT INTO `migrations` VALUES ('15', '2017_08_07_085506_drop_reports_table', '1');
INSERT INTO `migrations` VALUES ('16', '2017_08_07_085632_create_reports_table', '1');
INSERT INTO `migrations` VALUES ('17', '2017_09_17_092342_add_rbt_id_to_reports_table', '1');
INSERT INTO `migrations` VALUES ('18', '2017_09_17_115811_edit_reports_table_modify_total_and_share_revenue_by_sql', '1');
INSERT INTO `migrations` VALUES ('19', '2017_10_09_102906_add_some_columns_to_rbts_table_handle_nex_excel', '1');
INSERT INTO `migrations` VALUES ('20', '2017_10_16_135114_drop_provider_from_rbt', '1');
INSERT INTO `migrations` VALUES ('21', '2017_10_17_071338_return_back_provider_id_rbt', '1');
INSERT INTO `migrations` VALUES ('22', '2017_10_17_072304_drop_content_owner_from_rbts', '1');
INSERT INTO `migrations` VALUES ('23', '2017_10_18_083014_add_foreignkey_to_reports', '1');
INSERT INTO `migrations` VALUES ('24', '2017_10_22_145452_change_month_datatype', '1');
INSERT INTO `migrations` VALUES ('25', '2019_02_12_144858_add_aggregator_id_to_users', '1');
INSERT INTO `migrations` VALUES ('26', '2019_04_22_161443_create_permissions_table', '1');
INSERT INTO `migrations` VALUES ('27', '2019_04_22_161443_create_role_has_permissions_table', '1');
INSERT INTO `migrations` VALUES ('28', '2019_04_22_161443_create_roles_table', '1');
INSERT INTO `migrations` VALUES ('29', '2019_04_22_161443_create_user_has_permissions_table', '1');
INSERT INTO `migrations` VALUES ('30', '2019_04_22_161443_create_user_has_roles_table', '1');
INSERT INTO `migrations` VALUES ('31', '2019_04_22_161445_add_foreign_keys_to_role_has_permissions_table', '1');
INSERT INTO `migrations` VALUES ('32', '2019_04_22_161445_add_foreign_keys_to_user_has_permissions_table', '1');
INSERT INTO `migrations` VALUES ('33', '2019_04_22_161445_add_foreign_keys_to_user_has_roles_table', '1');
INSERT INTO `migrations` VALUES ('34', '2019_08_25_094545_create_contents_table', '1');
INSERT INTO `migrations` VALUES ('35', '2019_08_25_094920_add_content_id_fk_to_rbts', '1');
INSERT INTO `migrations` VALUES ('36', '2019_08_25_095042_add_internal_coding_to_rbts', '1');
INSERT INTO `migrations` VALUES ('37', '2019_08_25_095135_create_departments_table', '1');
INSERT INTO `migrations` VALUES ('38', '2019_08_25_095157_create_notifications_table', '1');
INSERT INTO `migrations` VALUES ('45', '2019_12_11_093741_create_roadmaps_table', '2');
INSERT INTO `migrations` VALUES ('46', '2020_09_10_092433_create_provider_contents_table', '2');
INSERT INTO `migrations` VALUES ('47', '2020_09_10_103857_add_country_id_to_occasions_table', '3');
INSERT INTO `migrations` VALUES ('48', '2020_09_14_111520_create_contract_duration_table', '4');
INSERT INTO `migrations` VALUES ('49', '2020_09_14_111520_create_contract_services_table', '4');
INSERT INTO `migrations` VALUES ('50', '2020_09_14_111520_create_contracts_table', '4');
INSERT INTO `migrations` VALUES ('51', '2020_09_14_111520_create_first_parties_table', '4');
INSERT INTO `migrations` VALUES ('52', '2020_09_14_111520_create_percentage_table', '4');
INSERT INTO `migrations` VALUES ('53', '2020_09_14_111520_create_second_parties_table', '4');
INSERT INTO `migrations` VALUES ('54', '2020_09_14_111520_create_second_party_types_table', '4');
INSERT INTO `migrations` VALUES ('55', '2020_09_14_111520_create_service_types_table', '4');
INSERT INTO `migrations` VALUES ('56', '2019_10_13_091104_add_second_parties', '5');
INSERT INTO `migrations` VALUES ('57', '2019_10_13_091104_add_second_party', '5');
INSERT INTO `migrations` VALUES ('58', '2019_10_13_091104_add_sql_seed', '6');
INSERT INTO `migrations` VALUES ('59', '2020_09_14_150218_add_currency_to_curruncies', '7');
INSERT INTO `migrations` VALUES ('60', '2020_09_14_145753_create_amount_revenu_table', '8');
INSERT INTO `migrations` VALUES ('61', '2020_09_14_145806_create_revenus_table', '8');
INSERT INTO `migrations` VALUES ('62', '2020_09_15_144447_drop_orgin_key_in_provider_contetns_table', '9');
INSERT INTO `migrations` VALUES ('63', '2019_04_22_161443_create_settings_table', '10');
INSERT INTO `migrations` VALUES ('64', '2020_09_16_132026_add_setting_type_data', '10');
INSERT INTO `migrations` VALUES ('65', '2020_09_16_131331_add_all_countries_to_country', '11');
INSERT INTO `migrations` VALUES ('66', '2019_08_25_094545_add_column_contents_table', '12');
INSERT INTO `migrations` VALUES ('67', '2020_05_17_012301_create_attachments_table', '13');
INSERT INTO `migrations` VALUES ('72', '2020_10_06_133624_create_templates_table', '14');
INSERT INTO `migrations` VALUES ('73', '2020_10_06_133626_create_contract_items_table', '14');
INSERT INTO `migrations` VALUES ('74', '2020_10_06_133627_create_contract_table_items_table', '14');
INSERT INTO `migrations` VALUES ('75', '2020_10_12_075210_add_contract_type_to_contracts_table', '15');
INSERT INTO `migrations` VALUES ('78', '2020_10_14_085731_contract_items_approves', '16');
INSERT INTO `migrations` VALUES ('79', '2020_10_12_075210_add_column_contract_items_table', '17');
INSERT INTO `migrations` VALUES ('80', '2020_10_11_145300_make_template_id_foriegn_key', '18');
INSERT INTO `migrations` VALUES ('81', '2020_10_11_150046_templates_seeder', '19');
INSERT INTO `migrations` VALUES ('82', '2020_10_11_150109_templates_item_seeder', '19');
INSERT INTO `migrations` VALUES ('83', '2020_10_14_120144_update_items_in_template_items_table', '19');
INSERT INTO `migrations` VALUES ('84', '2020_10_12_075210_add_column_contract_fullapproves_table', '20');
INSERT INTO `migrations` VALUES ('85', '2020_10_18_144210_add_ceo_approve_to_contracts_table', '21');
INSERT INTO `migrations` VALUES ('86', '2020_10_20_102421_add_contract_signed_date_in_contracts_table', '21');
INSERT INTO `migrations` VALUES ('87', '2020_10_21_080143_add_signature_image_to_contracts_table', '21');
INSERT INTO `migrations` VALUES ('88', '2020_10_21_133134_update_template_items_in_template_items_table', '22');

-- ----------------------------
-- Table structure for `notifications`
-- ----------------------------
DROP TABLE IF EXISTS `notifications`;
CREATE TABLE `notifications` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `notifier_id` int(11) NOT NULL,
  `notified_id` int(11) NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 =not seen , 1 = seen ',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of notifications
-- ----------------------------
INSERT INTO `notifications` VALUES ('1', '1', '1', 'Add New Content You Can Follow It From This Link', 'http://localhost/rbt_system_php7/content/3/edit', '1', '2020-09-14 12:57:34', '2020-10-11 12:14:03');
INSERT INTO `notifications` VALUES ('2', '1', '1', 'Add New Content You Can Follow It From This Link', 'http://localhost/rbt_system_php7/content/4/edit', '1', '2020-09-14 12:58:22', '2020-10-11 12:14:03');
INSERT INTO `notifications` VALUES ('3', '1', '1', 'Add New Content You Can Follow It From This Link', 'http://localhost/rbt_system_php7/content/5/edit', '1', '2020-09-14 12:58:48', '2020-10-11 12:14:03');
INSERT INTO `notifications` VALUES ('4', '1', '1', 'Add New Content You Can Follow It From This Link', 'http://localhost/rbt_system_php7/content/6/edit', '1', '2020-09-14 12:59:37', '2020-10-11 12:14:03');
INSERT INTO `notifications` VALUES ('5', '1', '1', 'Add New Content You Can Follow It From This Link', 'http://localhost/rbt_system_php7/content/34/edit', '1', '2020-09-17 10:29:54', '2020-10-11 12:14:03');
INSERT INTO `notifications` VALUES ('6', '1', '1', 'Add New Content You Can Follow It From This Link', 'http://localhost/rbt_system_php7/content//edit', '1', '2020-09-20 12:48:39', '2020-10-11 12:14:03');
INSERT INTO `notifications` VALUES ('7', '1', '1', 'Add New Content You Can Follow It From This Link', 'http://localhost/rbt_system_php7/content//edit', '1', '2020-10-07 13:45:14', '2020-10-11 12:14:03');
INSERT INTO `notifications` VALUES ('8', '1', '1', 'Add New Content You Can Follow It From This Link', 'http://localhost/rbt_system_php7/content//edit', '0', '2020-10-12 10:59:49', '2020-10-12 10:59:49');

-- ----------------------------
-- Table structure for `occasions`
-- ----------------------------
DROP TABLE IF EXISTS `occasions`;
CREATE TABLE `occasions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `country_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `occasions_country_id_foreign` (`country_id`),
  CONSTRAINT `occasions_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of occasions
-- ----------------------------
INSERT INTO `occasions` VALUES ('6', 'Nationali Ksa day', '2020-09-15 12:00:25', '2020-09-15 12:00:25', '2');
INSERT INTO `occasions` VALUES ('8', 'national Kuwait Day', '2020-09-15 12:00:59', '2020-09-15 12:00:59', '3');
INSERT INTO `occasions` VALUES ('9', 'National Egypt Day', '2020-09-15 12:03:45', '2020-09-15 12:03:45', '1');
INSERT INTO `occasions` VALUES ('16', 'islamic', '2020-09-17 09:37:44', '2020-09-17 09:37:44', '5');
INSERT INTO `occasions` VALUES ('21', 'entainment ', '2020-10-07 14:03:15', '2020-10-07 14:03:15', '5');

-- ----------------------------
-- Table structure for `operators`
-- ----------------------------
DROP TABLE IF EXISTS `operators`;
CREATE TABLE `operators` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `operators_country_id_foreign` (`country_id`),
  CONSTRAINT `operators_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of operators
-- ----------------------------
INSERT INTO `operators` VALUES ('1', 'etisalat', '1', '2019-02-11 13:12:35', '2019-03-14 08:35:40');
INSERT INTO `operators` VALUES ('4', 'Vodafone', '1', '2019-02-11 15:23:49', '2019-03-14 08:33:53');
INSERT INTO `operators` VALUES ('5', 'Orange', '1', '2019-03-14 08:36:10', '2019-03-14 08:36:10');
INSERT INTO `operators` VALUES ('6', 'zain', '3', '2020-09-06 11:53:15', '2020-09-06 11:53:15');
INSERT INTO `operators` VALUES ('7', 'ooredoo', '3', '2020-09-15 11:50:39', '2020-09-15 11:50:39');
INSERT INTO `operators` VALUES ('8', 'stc', '3', '2020-09-15 11:50:48', '2020-09-15 11:50:48');
INSERT INTO `operators` VALUES ('9', 'zain', '2', '2020-09-15 11:50:58', '2020-09-15 11:50:58');
INSERT INTO `operators` VALUES ('10', 'mobily', '2', '2020-09-15 11:51:07', '2020-09-15 11:51:07');

-- ----------------------------
-- Table structure for `password_resets`
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for `percentage`
-- ----------------------------
DROP TABLE IF EXISTS `percentage`;
CREATE TABLE `percentage` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `percentage` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of percentage
-- ----------------------------
INSERT INTO `percentage` VALUES ('1', '5');
INSERT INTO `percentage` VALUES ('2', '10');
INSERT INTO `percentage` VALUES ('3', '15');
INSERT INTO `percentage` VALUES ('4', '20');
INSERT INTO `percentage` VALUES ('5', '25');
INSERT INTO `percentage` VALUES ('6', '30');
INSERT INTO `percentage` VALUES ('7', '35');
INSERT INTO `percentage` VALUES ('8', '40');
INSERT INTO `percentage` VALUES ('9', '45');
INSERT INTO `percentage` VALUES ('10', '50');
INSERT INTO `percentage` VALUES ('11', '55');
INSERT INTO `percentage` VALUES ('12', '60');
INSERT INTO `percentage` VALUES ('13', '65');
INSERT INTO `percentage` VALUES ('14', '70');
INSERT INTO `percentage` VALUES ('15', '75');
INSERT INTO `percentage` VALUES ('16', '80');
INSERT INTO `percentage` VALUES ('17', '85');
INSERT INTO `percentage` VALUES ('18', '90');
INSERT INTO `percentage` VALUES ('19', '95');

-- ----------------------------
-- Table structure for `permissions`
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of permissions
-- ----------------------------

-- ----------------------------
-- Table structure for `providers`
-- ----------------------------
DROP TABLE IF EXISTS `providers`;
CREATE TABLE `providers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of providers
-- ----------------------------
INSERT INTO `providers` VALUES ('1', 'mishari', '2020-09-06 11:54:00', '2020-09-06 11:54:00');
INSERT INTO `providers` VALUES ('2', 'hamed', '2020-09-06 12:26:58', '2020-09-06 12:26:58');
INSERT INTO `providers` VALUES ('3', 'Arpu', '2020-09-06 13:16:50', '2020-09-06 13:16:50');
INSERT INTO `providers` VALUES ('4', 'مشارى', '2020-09-17 08:52:18', '2020-09-17 08:52:18');
INSERT INTO `providers` VALUES ('5', 'test provider', '2020-09-17 09:39:05', '2020-09-17 09:39:05');
INSERT INTO `providers` VALUES ('7', 'sherien', '2020-10-07 13:52:35', '2020-10-07 14:01:13');
INSERT INTO `providers` VALUES ('8', 'amr diab', '2020-10-12 11:11:14', '2020-10-12 11:11:14');

-- ----------------------------
-- Table structure for `provider_contents`
-- ----------------------------
DROP TABLE IF EXISTS `provider_contents`;
CREATE TABLE `provider_contents` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `roadmap_id` int(10) unsigned NOT NULL,
  `provider_id` int(10) unsigned NOT NULL,
  `content_id` int(10) unsigned NOT NULL,
  `rbt_track_specs` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `provider_contents_roadmap_id_foreign` (`roadmap_id`),
  KEY `provider_contents_provider_id_foreign` (`provider_id`),
  KEY `provider_contents_content_id_foreign` (`content_id`)
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of provider_contents
-- ----------------------------
INSERT INTO `provider_contents` VALUES ('52', '7', '1', '34', '26', null, null);
INSERT INTO `provider_contents` VALUES ('53', '7', '8', '44', '32,33', null, null);
INSERT INTO `provider_contents` VALUES ('56', '8', '1', '34', '26', null, null);
INSERT INTO `provider_contents` VALUES ('57', '8', '8', '44', '33', null, null);
INSERT INTO `provider_contents` VALUES ('58', '10', '1', '34', '26', null, null);
INSERT INTO `provider_contents` VALUES ('59', '10', '8', '44', '32', null, null);
INSERT INTO `provider_contents` VALUES ('79', '13', '8', '44', '33', null, null);
INSERT INTO `provider_contents` VALUES ('80', '13', '8', '44', '32,33', null, null);
INSERT INTO `provider_contents` VALUES ('81', '6', '1', '34', '26', null, null);
INSERT INTO `provider_contents` VALUES ('82', '6', '2', '10', '23', null, null);
INSERT INTO `provider_contents` VALUES ('83', '6', '8', '44', '32,33', null, null);

-- ----------------------------
-- Table structure for `rbts`
-- ----------------------------
DROP TABLE IF EXISTS `rbts`;
CREATE TABLE `rbts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `track_title_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `track_title_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `artist_name_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `artist_name_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `album_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `social_media_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `owner` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `track_file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `operator_id` int(10) unsigned DEFAULT NULL,
  `occasion_id` int(10) unsigned DEFAULT NULL,
  `aggregator_id` int(10) unsigned DEFAULT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=old excel , 1=new excel',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `provider_id` int(10) unsigned DEFAULT NULL,
  `content_id` int(10) unsigned DEFAULT NULL,
  `internal_coding` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `rbts_operator_id_foreign` (`operator_id`),
  KEY `rbts_occasion_id_foreign` (`occasion_id`),
  KEY `rbts_aggregator_id_foreign` (`aggregator_id`),
  KEY `rbts_provider_id_foreign` (`provider_id`),
  KEY `rbts_content_id_foreign` (`content_id`),
  CONSTRAINT `rbts_aggregator_id_foreign` FOREIGN KEY (`aggregator_id`) REFERENCES `aggregators` (`id`) ON DELETE CASCADE,
  CONSTRAINT `rbts_content_id_foreign` FOREIGN KEY (`content_id`) REFERENCES `contents` (`id`) ON DELETE CASCADE,
  CONSTRAINT `rbts_occasion_id_foreign` FOREIGN KEY (`occasion_id`) REFERENCES `occasions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `rbts_operator_id_foreign` FOREIGN KEY (`operator_id`) REFERENCES `operators` (`id`) ON DELETE CASCADE,
  CONSTRAINT `rbts_provider_id_foreign` FOREIGN KEY (`provider_id`) REFERENCES `providers` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of rbts
-- ----------------------------
INSERT INTO `rbts` VALUES ('23', 'hamed1', null, null, null, null, '555', null, null, 'uploads/2020-09-17/999hamed4.wav.wav', '4', '16', '1', '0', '2020-09-17 09:39:04', '2020-10-11 15:02:29', '1', '10', '23_1_5');
INSERT INTO `rbts` VALUES ('26', 'rbt1', null, null, null, null, '444', null, null, 'uploads/2020-09-17/rbt1.wav', '4', '16', '1', '0', '2020-09-17 10:35:14', '2020-10-07 14:31:25', '1', '34', '26_1_4');
INSERT INTO `rbts` VALUES ('32', 'rbt1_1', null, null, null, null, '111', null, null, 'uploads/rbts/2020-10-12/rbt1_1.wav', '9', '21', '1', '0', '2020-10-12 11:35:41', '2020-10-12 11:35:41', '1', '44', 'Rb/2020/10/12/5f843f8d3146a');
INSERT INTO `rbts` VALUES ('33', 'rbt1_2', null, null, null, null, '222', null, null, 'uploads/rbts/2020-10-12/rbt1_2.wav', '9', '21', '1', '0', '2020-10-12 11:35:41', '2020-10-12 11:35:41', '1', '44', 'Rb/2020/10/12/5f843f8d46ec3');
INSERT INTO `rbts` VALUES ('34', 'rbt2_1', null, null, null, null, '333', null, null, 'uploads/rbts/2020-10-12/rbt2_1.wav', '9', '21', '1', '0', '2020-10-12 11:35:41', '2020-10-12 11:35:41', '1', '45', 'Rb/2020/10/12/5f843f8d6c96d');

-- ----------------------------
-- Table structure for `reports`
-- ----------------------------
DROP TABLE IF EXISTS `reports`;
CREATE TABLE `reports` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `year` int(11) NOT NULL,
  `month` int(10) unsigned NOT NULL,
  `classification` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rbt_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rbt_id` int(10) unsigned DEFAULT NULL,
  `download_no` int(11) DEFAULT NULL,
  `total_revenue` decimal(10,2) NOT NULL,
  `revenue_share` decimal(10,2) NOT NULL,
  `operator_id` int(10) unsigned DEFAULT NULL,
  `provider_id` int(10) unsigned DEFAULT NULL,
  `aggregator_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `reports_operator_id_foreign` (`operator_id`),
  KEY `reports_provider_id_foreign` (`provider_id`),
  KEY `reports_aggregator_id_foreign` (`aggregator_id`),
  KEY `reports_rbt_id_foreign` (`rbt_id`),
  CONSTRAINT `reports_aggregator_id_foreign` FOREIGN KEY (`aggregator_id`) REFERENCES `aggregators` (`id`) ON DELETE CASCADE,
  CONSTRAINT `reports_operator_id_foreign` FOREIGN KEY (`operator_id`) REFERENCES `operators` (`id`) ON DELETE CASCADE,
  CONSTRAINT `reports_provider_id_foreign` FOREIGN KEY (`provider_id`) REFERENCES `providers` (`id`) ON DELETE CASCADE,
  CONSTRAINT `reports_rbt_id_foreign` FOREIGN KEY (`rbt_id`) REFERENCES `rbts` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of reports
-- ----------------------------
INSERT INTO `reports` VALUES ('3', '2020', '10', 'general', '111', 'rbt1_1', '32', '50', '100.00', '70.00', '9', '1', '1', '2020-10-12 11:56:15', '2020-10-12 11:56:15');
INSERT INTO `reports` VALUES ('4', '2020', '10', 'general', '222', 'rbt1_2', '33', '70', '200.00', '100.00', '9', '1', '1', '2020-10-12 11:56:15', '2020-10-12 11:56:15');
INSERT INTO `reports` VALUES ('5', '2020', '10', 'general', '333', 'rbt2_1', '34', '100', '400.00', '300.00', '9', '1', '1', '2020-10-12 11:56:15', '2020-10-12 11:56:15');

-- ----------------------------
-- Table structure for `revenus`
-- ----------------------------
DROP TABLE IF EXISTS `revenus`;
CREATE TABLE `revenus` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `contract_id` bigint(20) unsigned NOT NULL,
  `year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `month` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `source_type` tinyint(1) NOT NULL COMMENT '1- for operator , 2- for aggerator',
  `source_id` bigint(20) unsigned NOT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency_id` bigint(20) unsigned NOT NULL,
  `serivce_type_id` bigint(20) unsigned NOT NULL,
  `is_collected` tinyint(1) NOT NULL COMMENT '1- yes , 2- for no',
  `notes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reports` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of revenus
-- ----------------------------
INSERT INTO `revenus` VALUES ('2', '1', '2020', 'July', '1', '1', '100', '2', '5', '1', null, 'E8sXUg4fkjr0my8mT1mRCMlCGElynr3tMifFGdx6.xlsx', '2020-09-15 12:43:07', '2020-09-17 13:17:45');
INSERT INTO `revenus` VALUES ('3', '1', '2020', 'August', '1', '6', '100.59', '2', '6', '1', 'gggggggg', 'bPnhB3UWlPpKo5S3hfw22Ki2Whh6ISLvzH9E4fhg.xlsx', '2020-09-16 11:02:20', '2020-09-16 11:02:20');
INSERT INTO `revenus` VALUES ('4', '4', '2020', 'October', '1', '6', '190.90', '5', '3', '1', 'yes is collected', '40eImWKCtqfk1NlbMDazJiBuRfDqyFRIIM1f0XfB.pdf', '2020-10-07 14:27:23', '2020-10-07 14:28:44');

-- ----------------------------
-- Table structure for `roadmaps`
-- ----------------------------
DROP TABLE IF EXISTS `roadmaps`;
CREATE TABLE `roadmaps` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_title` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'set event name',
  `event_color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_start_date` date DEFAULT NULL,
  `event_end_date` date DEFAULT NULL,
  `event_status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0:working / 1:complete',
  `country_id` int(10) unsigned NOT NULL,
  `occasion_id` int(10) unsigned NOT NULL,
  `aggregator_id` int(10) unsigned NOT NULL,
  `operator_id` int(10) unsigned NOT NULL,
  `aggregator_support` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `operator_support` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `promotion_support` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `entry_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `roadmaps_country_id_foreign` (`country_id`),
  KEY `roadmaps_occasion_id_foreign` (`occasion_id`),
  KEY `roadmaps_aggregator_id_foreign` (`aggregator_id`),
  KEY `roadmaps_operator_id_foreign` (`operator_id`),
  CONSTRAINT `roadmaps_aggregator_id_foreign` FOREIGN KEY (`aggregator_id`) REFERENCES `aggregators` (`id`) ON DELETE CASCADE,
  CONSTRAINT `roadmaps_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE,
  CONSTRAINT `roadmaps_occasion_id_foreign` FOREIGN KEY (`occasion_id`) REFERENCES `occasions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `roadmaps_operator_id_foreign` FOREIGN KEY (`operator_id`) REFERENCES `operators` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of roadmaps
-- ----------------------------
INSERT INTO `roadmaps` VALUES ('6', 'العيد الوطني للسعودية', '#860591', '', '2020-10-20', '2020-10-24', '0', '5', '9', '1', '10', 'agg', 'op', 'p', '1', '2020-10-12 14:56:13', '2020-10-20 08:27:46');
INSERT INTO `roadmaps` VALUES ('7', 'event2', '#326e16', '', '2020-11-01', '2020-10-30', '0', '1', '9', '1', '1', 'agg', null, null, '1', '2020-10-14 13:45:58', '2020-10-14 13:46:32');
INSERT INTO `roadmaps` VALUES ('8', 'event3', '#27915e', '', '2020-10-15', '2020-10-17', '0', '3', '16', '1', '4', 's', 'op', 'pr', '1', '2020-10-15 09:18:59', '2020-10-15 09:19:19');
INSERT INTO `roadmaps` VALUES ('9', 'event3', '#3865a8', '', '2020-10-19', '2020-10-20', '0', '5', '6', '1', '1', null, null, null, '1', '2020-10-19 12:45:08', '2020-10-19 12:45:08');
INSERT INTO `roadmaps` VALUES ('10', 'event3', '#3865a8', '', '2020-10-19', '2020-10-20', '0', '5', '6', '1', '1', null, null, null, '1', '2020-10-19 12:50:17', '2020-10-19 12:50:17');
INSERT INTO `roadmaps` VALUES ('11', 'tttttttt', '#3865a8', '', '2020-10-19', '2020-10-20', '0', '5', '6', '1', '1', null, null, null, '1', '2020-10-19 12:54:07', '2020-10-19 12:54:07');
INSERT INTO `roadmaps` VALUES ('12', 'nnnnnnnnnnn', '#3865a8', '', '2020-10-19', '2020-10-20', '0', '5', '6', '1', '1', null, null, null, '1', '2020-10-19 12:56:29', '2020-10-19 12:56:29');
INSERT INTO `roadmaps` VALUES ('13', 'event55555', '#3865a8', '', '2020-10-19', '2020-10-20', '0', '5', '6', '1', '1', null, null, null, '1', '2020-10-19 14:50:15', '2020-10-20 09:33:33');

-- ----------------------------
-- Table structure for `roles`
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_priority` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES ('1', 'super_admin', '3', '2017-11-09 06:13:14', '2017-11-09 06:13:14');
INSERT INTO `roles` VALUES ('2', 'admin', '2', '2018-01-08 14:40:19', '2018-01-08 14:40:19');
INSERT INTO `roles` VALUES ('3', 'account', '0', '2018-01-08 14:40:19', '2018-01-08 14:40:19');
INSERT INTO `roles` VALUES ('4', 'test2', '0', '2020-09-06 11:50:38', '2020-09-06 11:50:46');

-- ----------------------------
-- Table structure for `role_has_permissions`
-- ----------------------------
DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of role_has_permissions
-- ----------------------------

-- ----------------------------
-- Table structure for `second_parties`
-- ----------------------------
DROP TABLE IF EXISTS `second_parties`;
CREATE TABLE `second_parties` (
  `second_party_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `second_party_type_id` bigint(20) unsigned NOT NULL,
  `second_party_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `second_party_joining_date` date NOT NULL DEFAULT '2020-05-28',
  `second_party_terminate_date` date DEFAULT NULL,
  `second_party_status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1:working|0:terminated',
  `second_party_identity` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `second_party_cr` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `second_party_tc` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `entry_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`second_party_id`),
  KEY `second_parties_second_party_type_id_foreign` (`second_party_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of second_parties
-- ----------------------------
INSERT INTO `second_parties` VALUES ('24', '1', 'Smart Technology', '2013-06-01', null, '1', '1', '1', '1', null, null, null);
INSERT INTO `second_parties` VALUES ('25', '1', 'EcoVas', '2014-05-01', null, '1', '1', '1', '1', null, null, null);
INSERT INTO `second_parties` VALUES ('26', '1', 'Qanawat', '2015-12-01', null, '1', '1', '1', '1', null, null, null);
INSERT INTO `second_parties` VALUES ('27', '1', 'Life Connection', '2020-05-28', null, '0', '1', '1', '1', null, null, null);
INSERT INTO `second_parties` VALUES ('28', '2', 'Mashary Rashed Al Afasy', '2014-09-01', null, '1', '1', '1', '1', null, null, null);
INSERT INTO `second_parties` VALUES ('29', '2', 'Melody Company', '2015-12-01', null, '1', '1', '1', '1', null, null, null);
INSERT INTO `second_parties` VALUES ('30', '4', 'The Wedding House', '2017-06-11', null, '0', '1', '1', '1', null, null, null);
INSERT INTO `second_parties` VALUES ('31', '2', 'hamed zaid', '2020-10-01', '2020-10-30', '0', 'uploads//secondparty/id//2020/10/06/1601985768.pdf', 'uploads//secondparty/cr//2020/10/06/1601985768.xlsb', 'uploads//secondparty/tc//2020/10/06/1601985768.pdf', '2020-10-06 12:02:48', '2020-10-06 12:02:48', null);
INSERT INTO `second_parties` VALUES ('32', '1', 'timwe', '2020-10-01', '2020-11-07', '1', 'uploads//secondparty/id//2020/10/07/1602058779.pdf', 'uploads//secondparty/cr//2020/10/07/1602058779.png', 'uploads//secondparty/tc//2020/10/07/1602058779.jpg', '2020-10-07 08:19:39', '2020-10-07 08:20:54', null);

-- ----------------------------
-- Table structure for `second_party_types`
-- ----------------------------
DROP TABLE IF EXISTS `second_party_types`;
CREATE TABLE `second_party_types` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `second_party_type_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `second_party_type_description` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'set second party type information here!',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of second_party_types
-- ----------------------------
INSERT INTO `second_party_types` VALUES ('1', 'Aggregator', 'set second party type information here!', '2020-05-11 22:58:55', null);
INSERT INTO `second_party_types` VALUES ('2', 'Provider', 'set second party type information here!', '2020-05-11 22:59:17', null);
INSERT INTO `second_party_types` VALUES ('3', 'Operator', 'set second party type information here!', '2020-05-14 03:34:57', null);
INSERT INTO `second_party_types` VALUES ('4', 'Content Provider', 'set second party type information here!', '2020-05-14 03:35:21', null);

-- ----------------------------
-- Table structure for `service_types`
-- ----------------------------
DROP TABLE IF EXISTS `service_types`;
CREATE TABLE `service_types` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `service_type_title` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of service_types
-- ----------------------------
INSERT INTO `service_types` VALUES ('1', 'VAS (RBT - Alert - IVR - SMS - MMS)', null, null);
INSERT INTO `service_types` VALUES ('2', 'RBT', null, null);
INSERT INTO `service_types` VALUES ('3', 'Subscription (Alert) included video - audio - gif - jpg', null, '2020-10-07 11:53:04');
INSERT INTO `service_types` VALUES ('4', 'SMS', null, null);
INSERT INTO `service_types` VALUES ('5', 'MMS', null, null);
INSERT INTO `service_types` VALUES ('6', 'IVR', null, null);
INSERT INTO `service_types` VALUES ('7', 'Social Media', null, null);
INSERT INTO `service_types` VALUES ('8', 'Website', null, null);
INSERT INTO `service_types` VALUES ('9', 'Web Application', null, null);
INSERT INTO `service_types` VALUES ('10', 'Mobile Application', null, null);
INSERT INTO `service_types` VALUES ('11', 'Maintenance', null, null);
INSERT INTO `service_types` VALUES ('12', 'Competition', null, null);
INSERT INTO `service_types` VALUES ('13', 'Streaming', null, null);

-- ----------------------------
-- Table structure for `settings`
-- ----------------------------
DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type_id` int(11) NOT NULL,
  `order` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `settings_type_id_foreign` (`type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of settings
-- ----------------------------
INSERT INTO `settings` VALUES ('1', 'super_email', 'emad@ivas.com.eg', '2020-10-07 14:28:14', '2020-10-07 14:28:14', '2', null);

-- ----------------------------
-- Table structure for `templates`
-- ----------------------------
DROP TABLE IF EXISTS `templates`;
CREATE TABLE `templates` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_type` tinyint(1) NOT NULL COMMENT '1:In / 2:Out',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of templates
-- ----------------------------
INSERT INTO `templates` VALUES ('1', 'عقد استغلال مصنفات فنية', '1', '2018-11-12 08:07:11', '2019-03-27 13:07:13');
INSERT INTO `templates` VALUES ('2', 'عقد استغلال محتوي لتقديم خدمات القيمة المضافة ', '2', '2018-10-25 09:36:19', '2019-03-27 13:07:22');

-- ----------------------------
-- Table structure for `template_items`
-- ----------------------------
DROP TABLE IF EXISTS `template_items`;
CREATE TABLE `template_items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `template_id` int(10) unsigned DEFAULT NULL,
  `item` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `contract_template_id` (`template_id`),
  CONSTRAINT `template_id` FOREIGN KEY (`template_id`) REFERENCES `templates` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of template_items
-- ----------------------------
INSERT INTO `template_items` VALUES ('1', '1', ' <p class=\"MsoNormal\" dir=\"RTL\" style=\"text-align: right; break-after: avoid;\"><b><span lang=\"AR-SA\" style=\"font-size:\r\n                14.0pt\"> أنه فى يوم <span id=\"signed_date\">...</span> الموافق </span></b><b><span lang=\"AR-SA\"\r\n                        style=\"font-size:14.0pt;mso-bidi-language:AR-SA;mso-no-proof:no\"> <span id=\"day_name\">......</span> تحرر هذا\r\n                        العقد بين كل من:<o:p></o:p></span></b></p>\r\n            <p class=\"MsoNormal\" dir=\"RTL\" style=\"mso-pagination:none;page-break-after:avoid;\r\n                tab-stops:60.7pt\"><b><span lang=\"AR-SA\" style=\"font-size:14.0pt;\">\r\n                        <o:p> </o:p>\r\n                    </span></b></p>\r\n            <p class=\"MsoNormal\" dir=\"RTL\"\r\n                style=\"text-align: right; margin-right: 40.2pt; text-indent: -20.1pt; line-height: 115%; break-after: avoid;\"><span\r\n                    lang=\"AR-SA\" style=\"font-size:14.0pt;line-height:115%;\"> أولا: السادة / شركة <span\r\n                        id=\"first_part_name\">....</span>\r\n                    .<o:p></o:p></span></p>\r\n            <p class=\"MsoNormal\" dir=\"RTL\"\r\n                style=\"text-align: right; margin-right: 40.2pt; text-indent: -20.1pt; line-height: 115%; break-after: avoid;\"><span\r\n                    lang=\"AR-SA\" style=\"font-size:14.0pt;line-height:115%;\"> الكائن مقرها في <span\r\n                        id=\"first_part_address\">...</span>\r\n                    و لها سجل تجارى رقم <span id=\"first_commercial_register_no\"> .................. </span> و\r\n                    بطاقة ضريبية رقم <span id=\"first_tax_card_no\"> ........................</span>، و يمثلها فى هذا العقد السيد\r\n                    <span id=\"first_part_person\">...................</span> بصفته <span\r\n                        id=\"first_part_character\">...................</span>.</span><span dir=\"LTR\"></span><span dir=\"LTR\"></span><span\r\n                    lang=\"AR-SA\" dir=\"LTR\" style=\"font-size:14.0pt;line-height:\r\n                115%;mso-no-proof:no\"><span dir=\"LTR\"></span><span dir=\"LTR\"></span> </span><span lang=\"AR-EG\"\r\n                    style=\"font-size:14.0pt;line-height:115%;mso-no-proof:no\">\r\n                    <o:p></o:p>\r\n                </span></p>\r\n            <p class=\"MsoNormal\" dir=\"RTL\" style=\"margin-right:40.2pt;text-indent:-20.1pt;\r\n                line-height:115%;mso-pagination:none;page-break-after:avoid;tab-stops:60.7pt\"><span lang=\"AR-EG\"\r\n                    style=\"font-size:14.0pt;line-height:115%;\"></span><span lang=\"AR-SA\" style=\"font-size:14.0pt;line-height:115%;\">\r\n                    (ويشار إليه بالطرف\r\n                    الأول)<o:p></o:p></span></p>\r\n            <p class=\"MsoNormal\" align=\"right\" dir=\"RTL\"\r\n                style=\"margin-right: 20.1pt; text-indent: -20.1pt; line-height: 115%; break-after: avoid;\"><span lang=\"AR-SA\" style=\"font-size:14.0pt;line-height:\r\n                115%;\">\r\n                    <o:p> </o:p>\r\n                </span></p>\r\n            <p class=\"MsoNormal\" dir=\"RTL\"\r\n                style=\"text-align: right; margin-right: 40.2pt; text-indent: -20.1pt; line-height: 115%; break-after: avoid;\"><span\r\n                    lang=\"AR-SA\" style=\"font-size:14.0pt;\r\n                line-height:115%;\">ثانيا: </span><span lang=\"AR-SA\"\r\n                    style=\"font-size:14.0pt;line-height:115%;mso-bidi-language:AR-SA;\"> السادة / شركة <span\r\n                        id=\"second_part_name\">...</span> .</span></p>\r\n            <p class=\"MsoNormal\" dir=\"RTL\"\r\n                style=\"text-align: right; margin-right: 40.2pt; text-indent: -20.1pt; line-height: 115%; break-after: avoid;\"><span\r\n                    lang=\"AR-SA\" style=\"font-size:14.0pt;line-height:115%;\"> الكائن مقرها في <span\r\n                        id=\"second_part_address\">.....</span> و لها سجل تجارى رقم <span\r\n                        id=\"second_commercial_register_no\">...................</span> و\r\n                    بطاقة ضريبية رقم <span id=\"second_tax_card_no\">...................</span>و يمثلها فى هذا العقد السيد\r\n                    <span id=\"second_part_person\">...................</span> بصفته <span\r\n                        id=\"second_part_character\">...................</span>.</span><span dir=\"LTR\"></span><span dir=\"LTR\"></span><span\r\n                    lang=\"AR-SA\" dir=\"LTR\" style=\"font-size:14.0pt;line-height:\r\n                115%;mso-no-proof:no\"><span dir=\"LTR\"></span><span dir=\"LTR\"></span> </span><span lang=\"AR-EG\"\r\n                    style=\"font-size:14.0pt;line-height:115%;\"></span></p>\r\n            <p class=\"MsoNormal\" dir=\"RTL\" style=\"margin-right:40.2pt;text-indent:-20.1pt;\r\n                line-height:115%;mso-pagination:none;page-break-after:avoid;tab-stops:60.7pt\"><span lang=\"AR-EG\"\r\n                    style=\"font-size:14.0pt;line-height:115%;mso-no-proof:no\"></span><span lang=\"AR-SA\"\r\n                    style=\"font-size:14.0pt;line-height:115%;mso-bidi-language:AR-SA;\"> (ويشار إليه بالطرف الثاني)<o:p></o:p></span>\r\n            </p>', '2018-11-12 08:08:21', '2019-05-05 11:42:39');
INSERT INTO `template_items` VALUES ('2', '1', '<div style=\"margin-right:-1.15pt;text-align: right;\">\r\n    <p class=\"MsoNormal\" align=\"center\" dir=\"RTL\" style=\"text-align:center;line-height:\r\n    150%\">\r\n    <b><u><span lang=\"AR-EG\" style=\"font-size:14.0pt;line-height:150%\">\r\n    تمهيـــــد</span></u></b>\r\n    </p>\r\n    <p class=\"MsoNormal\" align=\"right\" dir=\"RTL\" style=\"text-align: right; line-height: 150%;font-size:14.0pt;\">\r\n    الطرف الأول قدم نفسه على أنه هو حاصل على حقوق استغلال مجموعة من المصنفات الفنية والمدرج بيانها في ملاحق او تفويضات هذا العقد ، بما يمكنه من التعاقد عليها و منح الطرف الثانى حق إتاحتها عبر خدمة الـ <span id=\"services\"></span> بشكل حصرى على شبكة  <span id=\"operators\"></span>\r\n    </p>\r\n    <p class=\"MsoNormal\" align=\"right\" dir=\"RTL\" style=\"text-align: right; line-height: 150%;font-size:14.0pt;\">\r\n    وحيث أن الطرف الثاني يعمل فى مجال تقديم خدمات القيمة المضافة للهاتف المحمول .</p>\r\n    <p class=\"MsoNormal\" align=\"right\" dir=\"RTL\" style=\"text-align: right; line-height: 150%;font-size:14.0pt;\">\r\n    ولما رغب الطرفان فى التعاون فيما بينهما فقد إتفق وتراضى الطرفان بعد أن أقر كل منهما بأهليته القانونية للتعاقد وخلو إرادته من كافة عيوب الرضا على ما يلى:</p>\r\n    <div></div></div>', '2018-11-12 08:10:02', '2018-11-14 14:33:13');
INSERT INTO `template_items` VALUES ('3', '1', '<p class=\"MsoNormal\" align=\"center\" dir=\"RTL\" style=\"text-align:center;line-height:\r\n    150%\"><b><u><span lang=\"AR-EG\" style=\"font-size:14.0pt;line-height:150%\">البند\r\n    الأول<o:p></o:p></span></u></b></p>\r\n\r\n    <p class=\"MsoNormal\" dir=\"RTL\" style=\"margin-right:.25in;text-align:justify;\r\n    line-height:115%;mso-pagination:none;page-break-after:avoid;tab-stops:60.7pt\"><span lang=\"AR-SA\" style=\"font-size:14.0pt;line-height:115%;mso-bidi-language:AR-SA;\r\n    mso-no-proof:no\">يعتبر التمهيد السابق جزء لا يتجزأ من هذا العقد ومتمما له\r\n    ولأحكامة ولا يفسر بدونه.<o:p></o:p></span></p>', '2018-11-12 08:12:25', '2018-11-12 08:12:25');
INSERT INTO `template_items` VALUES ('4', '1', '<p class=\"MsoNormal\" align=\"center\" dir=\"RTL\" style=\"text-align:center;line-height:\r\n    150%\"><b><u><span lang=\"AR-EG\" style=\"font-size:14.0pt;line-height:150%\">البند\r\n    الثانى<o:p></o:p></span></u></b></p>\r\n\r\n    <p class=\"MsoNormal\" dir=\"RTL\" style=\"font-size:14.0pt;text-align: right; margin-right: 0.25in; line-height: 115%; break-after: avoid;\"><br></p><p class=\"MsoNormal\" dir=\"RTL\" style=\"text-align: right; margin-right: 0.25in; line-height: 115%; break-after: avoid;font-size:14.0pt;\">منح الطرف الأول الطرف الثانى بموجب هذا العقد الحق الحصرى في إستغلال والتراخيص باستغلال الأغاني والمصنفات الفنية المتضمنه فى ملاحق هذا العقد وكذا المقاطع الغنائية الخاصة بها وصور المطرب المؤدي لها للاستغلال عبر شبكة <span id=\"operators\"></span>             ، بحيث يقوم الطرف الثانى بإستغلالها بشكل حصرى على شبكة <span id=\"operators\"></span>                               بإستخدام خدمات التفاعل الصوتى عبر الهاتف ( خدمة رنين المتصل RBT ) لمستخدمى تلك الخدمات وبحيث يتمكن مستخدم الخدمة من إستغلال المصنفات الفنية بكافة أشكالها للاستماع  عبر الـ RBT  خدمة الكول تون .</p><div style=\"text-align: right;\"><br></div>', '2018-11-12 08:12:44', '2018-11-15 08:46:18');
INSERT INTO `template_items` VALUES ('5', '1', '<p class=\"MsoNormal\" align=\"center\" dir=\"RTL\" style=\"text-align:center;line-height:\r\n    150%\"><b><u><span lang=\"AR-EG\" style=\"font-size:14.0pt;line-height:150%\">البند\r\n    الثالث</span></u></b><span lang=\"AR-SA\" style=\"font-size:14.0pt;line-height:150%;\r\n    mso-bidi-language:AR-SA;mso-no-proof:no\"><o:p></o:p></span></p>\r\n\r\n    <p class=\"MsoNormal\" dir=\"RTL\" style=\"margin-right:.25in;text-align:justify;\r\n    line-height:115%;tab-stops:60.7pt\"><span lang=\"AR-SA\" style=\"font-size:14.0pt;\r\n    line-height:115%;mso-bidi-language:AR-SA;mso-no-proof:no\">مقابل الحقوق الممنوحة\r\n    من الطرف الأول للطرف الثانى فى البند الثانى أعلاه يقوم الطرف الثاني بإعطاء\r\n    الطرف الأول نسبة تعادل        % (          بالمائة) من صافى الدخل ويعتبر صافى\r\n    الدخل هو العائدات النقدية المحصلة والمحققة من تقديم الخدمات محل العقد بعد خصم\r\n    حصة شركات الاتصالات وأى مصاريف حكومية خاصة بنشاط خدمات القيمة المضافة على أن\r\n    تتم المحاسبة بصفة شهريه ، هذا ويتم إحتساب حصة الطرف الأول بناء على التقارير\r\n    التى تصدر عن شركات الاتصالات والتى تعتبر نهائية وملزمة للطرفين والتى يحق للطرف\r\n    الاول الاطلاع عليها ومراجعتها ، مع التزام الطرف الثانى بإرسال تقارير شهرية من\r\n    واقع التقارير المالية الصادره عن شركات الاتصالات خلال 10 ايام من تاريخ استلامها\r\n    حتى يتسنى للطرف الاول تقديم فاتورة مطالبة لإستلام حصته من صافى الايرادات .<o:p></o:p></span></p>', '2018-11-12 08:13:14', '2018-11-12 08:13:14');
INSERT INTO `template_items` VALUES ('6', '1', '<p class=\"MsoNormal\" align=\"center\" dir=\"RTL\" style=\"text-align:center;line-height:\r\n    150%\"><b><u><span lang=\"AR-EG\" style=\"font-size:14.0pt;line-height:150%\">البند\r\n    الرابع</span></u></b><span lang=\"AR-SA\" style=\"font-size:14.0pt;line-height:150%;\r\n    mso-bidi-language:AR-SA;mso-no-proof:no\"><o:p></o:p></span></p><p class=\"MsoNormal\" align=\"center\" dir=\"RTL\" style=\"text-align:center;line-height:\r\n    150%\">\r\n\r\n    </p><p class=\"MsoNormal\" dir=\"RTL\" style=\"margin-right:.25in;text-align:justify;\r\n    line-height:115%;mso-pagination:none;page-break-after:avoid;tab-stops:60.7pt\"><span lang=\"AR-SA\" style=\"font-size:14.0pt;line-height:115%;mso-bidi-language:AR-SA;\r\n    mso-no-proof:no\">يتعهد الطرف الأول بأنه يمتلك كافة حقوق استغلال المصنفات\r\n    المذكورة فى تمهيد هذا العقد بما فيها تحويلها وبثها واستخدامها للتليفون المحمول\r\n    وبأنه يمتلك الحق بترخيص تلك الحقوق للطرف الثانى ويتعهد بمسئوليته الكاملة أمام\r\n    أى طرف ثالث قد يدعى أى حقوق له على تلك المصنفات بما فيهم المؤلفين والملحنين\r\n    بحيث لا يكون الطرف الثاني مسؤولا عن أية قضايا أو منازعات تقام علي الطرف الأول\r\n    لأسباب  تتعلق بمنحه للطرف الثانى الحقوق\r\n    الواردة بهذا العقد، وبحيث يتحمل الطرف الأول المسئولية كاملة في كل قضايا أو\r\n    منازعات تقام علي الطرف الثاني لأسباب تتعلق بمضمون أو محتوى أو ملكية تلك\r\n    المصنفات.</span><span dir=\"LTR\" style=\"font-size:14.0pt;line-height:115%;\r\n    mso-bidi-language:AR-SA;mso-no-proof:no\"><o:p></o:p></span></p>', '2018-11-12 08:13:34', '2018-11-12 08:13:34');
INSERT INTO `template_items` VALUES ('7', '1', '<p class=\"MsoNormal\" align=\"center\" dir=\"RTL\" style=\"text-align:center;line-height:\r\n    150%\"><b><u><span lang=\"AR-EG\" style=\"font-size:14.0pt;line-height:150%\">البند\r\n    الخامس</span></u></b><span lang=\"AR-EG\" style=\"font-size:14.0pt;line-height:150%;\r\n    mso-no-proof:no\"><o:p></o:p></span></p>\r\n\r\n    <p class=\"MsoNormal\" dir=\"RTL\" style=\"margin-right:.25in;text-align:justify;\r\n    line-height:115%;mso-pagination:none;page-break-after:avoid;tab-stops:60.7pt\"><span lang=\"AR-SA\" style=\"font-size:14.0pt;line-height:115%;mso-bidi-language:AR-SA;\r\n    mso-no-proof:no\">مدة هذا العقد   <span id=\"peroid\"></span> سنه ميلادية وتتجدد تلقائيا ما لم يخطر أحد الطرفين الآخر\r\n    برغبته فى عدم التجديد قبل نهايتها بشهر على الأقل.<o:p></o:p></span></p>', '2018-11-12 08:13:50', '2018-11-13 09:36:33');
INSERT INTO `template_items` VALUES ('8', '1', '<p class=\"MsoNormal\" align=\"center\" dir=\"RTL\" style=\"text-align:center;line-height:150%\"><b><u><span style=\"font-size:14.0pt;line-height:150%\">البند\r\n    السادس</span></u></b><span lang=\"AR-SA\" style=\"font-size:14.0pt;line-height:150%;\"></span></p>\r\n\r\n    <p class=\"MsoNormal\" align=\"center\" dir=\"RTL\" style=\"text-align:center;line-height:\r\n    150%\"><b><u></u></b><b><u><span style=\"font-size:14.0pt;line-height:150%\">سرية المعلومات</span></u></b></p>\r\n\r\n    <p class=\"MsoNormal\" dir=\"RTL\" style=\"margin-right:.25in;text-align:justify;\r\n    line-height:115%;tab-stops:60.7pt\"><span lang=\"AR-SA\" style=\"font-size:14.0pt;line-height:115%;\">يلتزم كل طرف ويتعهد للطرف الآخر بالمحافظة على سرية جميع\r\n    المعلومات التى تصل إليه بصفته طرفاً فى هذا العقد ويتعهد بأن يبذل قصارى جهده لكي\r\n    يحافظ هو وموظفيه والأشخاص التابعين له على سرية هذه المعلومات ، ولا يجوز لأي من\r\n    طرفي العقد إفشاء أو إستخدام أي من الأسرار التى قد يطلع عليها بموجب هذا العقد\r\n    إلا بعد الحصول على الموافقة الكتابية المسبقة للطرف الآخر.</span></p>', '2018-11-12 08:14:00', '2018-11-12 09:38:33');
INSERT INTO `template_items` VALUES ('9', '1', '<p class=\"MsoNormal\" align=\"center\" dir=\"RTL\" style=\"text-align:center;line-height:\r\n    150%\"><b><u><span lang=\"AR-EG\" style=\"font-size:14.0pt;line-height:150%\">البند\r\n    السابع ( التنازل عن العقد )</span></u></b></p>\r\n\r\n    <p class=\"MsoNormal\" dir=\"RTL\" style=\"margin-right:.25in;text-align:justify;\r\n    line-height:115%;mso-pagination:none;page-break-after:avoid;tab-stops:60.7pt\"><span lang=\"AR-SA\" style=\"font-size:14.0pt;line-height:115%;mso-bidi-language:AR-SA;\r\n    mso-no-proof:no\">لا يحق للطرفين التنازل أو حوالة هذا العقد أو اي من حقوقه\r\n    الواردة فيه أو ملحقاته الي اى طرف آخر الا بعد موافقة الطرف الاخر كتابتة على ذلك\r\n    .<o:p></o:p></span></p>', '2018-11-12 08:14:08', '2018-11-12 13:06:16');
INSERT INTO `template_items` VALUES ('10', '1', '<p class=\"MsoNormal\" align=\"center\" dir=\"RTL\" style=\"text-align:center;line-height:\r\n    150%\"><b><u><span lang=\"AR-EG\" style=\"font-size:14.0pt;line-height:150%\">البند\r\n    الثامن ( انهاء العقد )<o:p></o:p></span></u></b></p>\r\n\r\n    <p class=\"MsoNormal\" dir=\"RTL\" style=\"margin-right:.25in;text-align:justify;\r\n    line-height:115%;mso-pagination:none;page-break-after:avoid;tab-stops:60.7pt\"><span lang=\"AR-SA\" style=\"font-size:14.0pt;line-height:115%;mso-bidi-language:AR-SA;\r\n    mso-no-proof:no\">1- عند إنتهاء العقد ، يتوقف الطرف الثانى عن إستغلال محتوى\r\n    الطرف الاول , وتقديم كشف الحساب الخاص بالخدمة إلى الطرف الاول حتى تاريخ إنتهاء\r\n    الخدمة .</span><span dir=\"LTR\" style=\"font-size:14.0pt;line-height:115%;\r\n    mso-bidi-language:AR-SA;mso-no-proof:no\"><o:p></o:p></span></p>\r\n\r\n    <p class=\"MsoNormal\" dir=\"RTL\" style=\"margin-right:.25in;text-align:justify;\r\n    line-height:115%;mso-pagination:none;page-break-after:avoid;tab-stops:60.7pt\"><span dir=\"RTL\"></span><span dir=\"RTL\"></span><span lang=\"AR-SA\" style=\"font-size:14.0pt;\r\n    line-height:115%;mso-bidi-language:AR-SA;mso-no-proof:no\"><span dir=\"RTL\"></span><span dir=\"RTL\"></span>2- إتفق الطرفان على أن الحالات التّالية تعتبر من قبيل الظّروف\r\n    الإستثنائيّة أو القوة القاهرة التى تبرّر الإنهاء السّابق من قبل الطّرف الآخر:\r\n    الإفلاس، خلال الفترات الإستثنائية كالحروب، الكوارث، الأضطرابات ، تعيين قيم أو\r\n    مصفى أو حارس قضائى.</span><span dir=\"LTR\" style=\"font-size:14.0pt;line-height:\r\n    115%;mso-bidi-language:AR-SA;mso-no-proof:no\"><o:p></o:p></span></p>\r\n\r\n    <p class=\"MsoNormal\" dir=\"RTL\" style=\"margin-right:.25in;text-align:justify;\r\n    line-height:115%;mso-pagination:none;page-break-after:avoid;tab-stops:60.7pt\"><span dir=\"RTL\"></span><span dir=\"RTL\"></span><span lang=\"AR-SA\" style=\"font-size:14.0pt;\r\n    line-height:115%;mso-bidi-language:AR-SA;mso-no-proof:no\"><span dir=\"RTL\"></span><span dir=\"RTL\"></span>3- يحق لأي من الطرفين إنهاء هذا العقد فوراً ودون الحاجة إلى\r\n    إنذار أو أعذار أو إتخاذ أي إجراء قانونى أو قضائى آخر فى حالة إخلال أي من\r\n    الطرفين بإلتزاماته او تعهداته الواردة فى هذا العقد ، وذلك شريطة إخطار الطرف\r\n    المخل بما وقع منه من إخلال والتنبيه عليه</span><span dir=\"LTR\"></span><span dir=\"LTR\"></span><span lang=\"AR-SA\" dir=\"LTR\" style=\"font-size:14.0pt;line-height:\r\n    115%;mso-bidi-language:AR-SA;mso-no-proof:no\"><span dir=\"LTR\"></span><span dir=\"LTR\"></span> </span><span lang=\"AR-SA\" style=\"font-size:14.0pt;line-height:\r\n    115%;mso-bidi-language:AR-SA;mso-no-proof:no\">بعلاجه خلال 15 يوماً من هذا\r\n    الإخطار ومرور تلك المدة دون علاج ما وقع منه من إخلال .<o:p></o:p></span></p>', '2018-11-12 08:14:16', '2018-11-12 08:14:16');
INSERT INTO `template_items` VALUES ('11', '1', '<p class=\"MsoNormal\" dir=\"RTL\" style=\"text-align: center;line-height: 115%; break-after: avoid;\"><b><u><span lang=\"AR-EG\" style=\"font-size:14.0pt;line-height:115%\">البند التاسع ( الأخطارات\r\n    والعناوين )</span></u></b></p>\r\n\r\n    <p class=\"MsoNormal\" dir=\"RTL\" style=\"margin-right:176.05pt;text-align:justify;\r\n    line-height:115%;mso-pagination:none;page-break-after:avoid;tab-stops:60.7pt 2.75in\"><span lang=\"AR-SA\" style=\"font-size:14.0pt;line-height:115%;mso-bidi-language:AR-SA;\r\n    mso-no-proof:no\">      </span><span lang=\"AR-SA\" style=\"font-size:6.0pt;line-height:115%;mso-bidi-language:AR-SA;\r\n    mso-no-proof:no\"><o:p></o:p></span></p>\r\n\r\n    <p class=\"MsoNormal\" dir=\"RTL\" style=\"margin-right:.25in;text-align:justify;\r\n    line-height:115%;mso-pagination:none;page-break-after:avoid;tab-stops:60.7pt\"><span lang=\"AR-SA\" style=\"font-size:14.0pt;line-height:115%;mso-bidi-language:AR-SA;\r\n    mso-no-proof:no\">كافة الاخطارات والمراسلات المتعلقة بهذا العقد تكون صحيحة\r\n    ومنتجة لاثارها القانونية إذا ما أرسلت بإنذار رسمي علي يد محضر او بالبريد المسجل\r\n    علي العناوين المذكورة اعلاه بالعقد أو أن تسلم إلي الشخص الموجه إليه باليد مقابل\r\n    إيصال بالاستلام ، وفي حالة تغيير عنوان المراسلات يلتزم كل طرف بإعلان الطرف\r\n    الاخر بعنوان مراسلاته الجديد ، كما اتفق الأطراف على استخدام الرسائل الالكترونية\r\n    (</span><span dir=\"LTR\" style=\"font-size:14.0pt;line-height:115%;mso-bidi-language:\r\n    AR-SA;mso-no-proof:no\">Emails </span><span dir=\"RTL\"></span><span dir=\"RTL\"></span><span lang=\"AR-SA\" style=\"font-size:14.0pt;line-height:115%;mso-bidi-language:AR-SA;\r\n    mso-no-proof:no\"><span dir=\"RTL\"></span><span dir=\"RTL\"></span> ) كوسيلة معتمدة للتخاطب بخصوص الاعمال اليومية\r\n    وتفاصيل العمل وتعتبر بمثابة الوثائق الخطية كما تعتبر الرسائل المرسلة من البريد\r\n    الالكتروني لأي فريق والمخزنة في نظام الفريق الآخر بمثابة موقعة وموثقة بمجرد إرسالها\r\n    دون الحاجة لتوثيقها بأي وسيلة أخرى او توقيعها بتوقيع الكتروني خاص او تخزينها\r\n    بشكل خاص.<o:p></o:p></span></p>', '2018-11-12 08:14:23', '2018-11-12 13:07:37');
INSERT INTO `template_items` VALUES ('12', '1', ' <p class=\"MsoNormal\" dir=\"RTL\" style=\"margin-right:-1.15pt\"><b><u><span lang=\"AR-EG\">البريد\r\n    الألكترونى للطرف الأول</span></u><span lang=\"AR-EG\"> :</span></b><span lang=\"AR-EG\">        <span id=\"first_part_email\"> </span></span></p>\r\n\r\n    <p class=\"MsoNormal\" dir=\"RTL\" style=\"margin-right:64.45pt;text-align:justify\"></p>\r\n\r\n    <p class=\"MsoNormal\" dir=\"RTL\" style=\"margin-right:64.45pt;text-align:justify\"><b></b></p>\r\n\r\n    <p class=\"MsoNormal\" dir=\"RTL\" style=\"margin-right:-1.15pt;text-align:justify\"><b><span lang=\"AR-EG\">الأسم:     <span id=\"first_part_name\">.....................</span>                رقم الموبيل: <span id=\"first_part_phone\"></span></span></b></p>\r\n\r\n    <p class=\"MsoNormal\" dir=\"RTL\" style=\"margin-right:64.45pt;text-align:justify\"></p>\r\n\r\n    <p class=\"MsoNormal\" dir=\"RTL\" style=\"margin-right:-1.15pt\"><b><u><span lang=\"AR-EG\">البريد\r\n    الألكترونى للطرف الثانى</span></u><span lang=\"AR-EG\"> :</span></b><span lang=\"AR-EG\">       <span id=\"second_part_email\"></span></span></p>\r\n\r\n    <p class=\"MsoNormal\" dir=\"RTL\" style=\"margin-right:-1.15pt;text-align:justify\"><b><span lang=\"AR-EG\">الأسم:     <span id=\"second_part_name\">.....................</span>                رقم الموبيل: <span id=\"second_part_phone\"></span></span></b></p>\r\n    ', '2018-11-12 08:14:42', '2019-05-05 11:46:51');
INSERT INTO `template_items` VALUES ('13', '1', '<p class=\"MsoNormal\" dir=\"RTL\" style=\"text-align: center;\"><b><span lang=\"AR-EG\" style=\"font-size:14.0pt\">\r\n    <u>البند العاشر<o:p></o:p></u></span></b>\r\n    </p>\r\n\r\n    <p class=\"MsoNormal\" dir=\"RTL\" style=\"margin-right:-1.15pt\"><span lang=\"AR-SA\" style=\"font-size:14.0pt;mso-bidi-language:AR-SA;mso-no-proof:no\">يخضع هذا العقد\r\n    لأحكام القوانين ونظام المحاكم المعمول بهما في جمهورية مصر العربية.</span></p>', '2018-11-12 08:14:58', '2018-11-12 13:32:22');
INSERT INTO `template_items` VALUES ('14', '1', '<blockquote style=\"margin: 0 0 0 40px; border: none; padding: 0px;\"><p dir=\"RTL\" style=\"text-align: center; margin: 0in 82.45pt 2pt 0in;\"><b><u><span style=\"font-size:\r\n    14.0pt\">البند الحادى عشر</span></u></b></p></blockquote>\r\n\r\n    <p dir=\"RTL\" style=\"margin-right:-1.15pt\"><span style=\"font-size:14.0pt;\">حرر هذا العقد\r\n    من نسختين أصليتين بيد كل طرف نسخة  و\r\n    النسخه مكونه من ثلاث ورقات للعمل بها عند الحاجة.<o:p></o:p></span></p>\r\n\r\n    <p dir=\"RTL\" style=\"margin-right:-1.15pt\"><span lang=\"AR-SA\" style=\"font-size:14.0pt;\"><o:p> </o:p></span></p>', '2018-11-12 08:15:18', '2018-11-12 13:34:07');
INSERT INTO `template_items` VALUES ('15', '1', '<blockquote style=\"margin: 0 0 0 40px; border: none; padding: 0px;\">\r\n              <p dir=\"RTL\" style=\"text-align: center; margin: 0in 82.45pt 2pt 0in;\"><b><u><span style=\"font-size:\r\n              14.0pt\">البند الثانى&nbsp;عشر</span></u></b></p>\r\n              </blockquote>\r\n\r\n              <p dir=\"RTL\" style=\"margin-right:-1.15pt\"><span style=\"font-size: 18.6667px;\">ينص هذا العقد على ان نسبة الطرف الاول <span id=\"first_part_percent\"> .....</span> ونسبة الطرف الثانى <span id=\"second_part_percent\"> .....</span></span></p>\r\n\r\n              <p dir=\"RTL\" style=\"margin-right:-1.15pt\"><span lang=\"AR-SA\" style=\"font-size:14.0pt;\"><o:p> </o:p></span></p>', '2018-11-12 08:19:31', '2018-11-13 09:43:02');
INSERT INTO `template_items` VALUES ('16', '1', '<table dir=\"rtl\" width=\"100%\">\r\n                <tbody>\r\n                  <tr>\r\n                    <td width=\"50%\">\r\n                    <h3><u>الطرف الاول</u></h3>\r\n                    </td>\r\n                    <td width=\"50%\">\r\n                    <h3><u>الطرف الثاني</u></h3>\r\n                    </td>\r\n                  </tr>\r\n                  <tr>\r\n                    <td>شركة/ <span id=\"first_part_name\">....</span></td>\r\n                    <td>شركة/ <span id=\"second_part_name\">....</span></td>\r\n                  </tr>\r\n                  <tr>\r\n                    <td>الاسم : <span id=\"first_part_person\">....</span></td>\r\n                    <td>الاسم : <span id=\"second_part_person\">....</span></td>\r\n                  </tr>\r\n                  <tr>\r\n                    <td>الصفة : <span id=\"first_part_character\">....</span></td>\r\n                    <td>الصفة : <span id=\"second_part_character\">....</span></td>\r\n                  </tr>\r\n                  <tr>\r\n                    <td>\r\n                    <p style=\"line-height:150%;vertical-align:bottom\"><br>\r\n                    التوقيع: <span id=\"first_party_signature\"></span></p>\r\n                    </td>\r\n                    <td>\r\n                    <p style=\"line-height:150%;vertical-align:bottom\"><br>\r\n                    التوقيع: <span id=\"second_party_signature\"></span></p>\r\n                    </td>\r\n                  </tr>\r\n                  <tr>\r\n                    <td>\r\n                    <p style=\"line-height:250%;vertical-align:bottom\"><br>\r\n                    خاتم الشركة : <span id=\"first_party_seal\"></span></p>\r\n                    </td>\r\n                    <td>\r\n                    <p style=\"line-height:250%;vertical-align:bottom\"><br>\r\n                    خاتم الشركة : <span id=\"second_party_seal\"></span></p>\r\n                    </td>\r\n                  </tr>\r\n                </tbody>\r\n              </table>', '2018-11-12 08:19:31', '2018-11-13 09:43:02');

-- ----------------------------
-- Table structure for `types`
-- ----------------------------
DROP TABLE IF EXISTS `types`;
CREATE TABLE `types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of types
-- ----------------------------
INSERT INTO `types` VALUES ('1', 'Advanced Editor', '2018-01-28 08:30:05', '2018-01-28 08:30:05');
INSERT INTO `types` VALUES ('2', 'Normal Editor', '2018-01-28 08:30:14', '2018-01-28 08:30:14');
INSERT INTO `types` VALUES ('3', 'Image', '2018-01-28 08:30:29', '2018-01-28 08:30:29');
INSERT INTO `types` VALUES ('4', 'Video', '2018-01-28 08:30:39', '2018-01-28 08:30:39');
INSERT INTO `types` VALUES ('5', 'Audio', '2018-01-28 08:30:47', '2018-01-28 08:30:47');
INSERT INTO `types` VALUES ('6', 'File Manager Uploads Extensions', '2018-01-28 08:30:57', '2018-01-28 08:30:57');
INSERT INTO `types` VALUES ('7', 'selector', '2019-02-11 13:18:52', '2019-02-11 13:18:52');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `profile_img` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aggregator_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'super admin', 'super_admin@ivas.com', '$2y$10$u2evAW530miwgUb2jcXkTuqIGswxnSQ3DSmX1Ji5rtO3Tx.MtVcX2', 'MjEJukEsbfuIOOe3J3Io6aySDH6P0I2D7jdUR9BCxyanm2NfbIzPZ8btCxRQ', '2017-11-09 06:13:14', '2018-11-26 08:11:50', '', null);
INSERT INTO `users` VALUES ('2', 'emad', 'emad@ivas.com.eg', '$2y$10$EDV2j1jHL0mnZx5Ltyz9qO5ww/U6XkdJgRTjxhlyMr7hx8q6sDQm2', null, '2020-09-06 11:49:37', '2020-09-06 11:51:13', '', null);
INSERT INTO `users` VALUES ('4', 'Arpu', 'arp@arpu.com', '$2y$10$DZ.WES.z0PXZrbA17GeQJujrlFWR7U3ZqCi.znYJ3im1jEgNzhKq.', null, '2020-09-06 11:52:56', '2020-09-06 11:52:56', '', '1');

-- ----------------------------
-- Table structure for `user_has_permissions`
-- ----------------------------
DROP TABLE IF EXISTS `user_has_permissions`;
CREATE TABLE `user_has_permissions` (
  `user_id` int(10) unsigned NOT NULL,
  `permission_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`permission_id`),
  KEY `user_has_permissions_permission_id_foreign` (`permission_id`),
  CONSTRAINT `user_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `user_has_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of user_has_permissions
-- ----------------------------

-- ----------------------------
-- Table structure for `user_has_roles`
-- ----------------------------
DROP TABLE IF EXISTS `user_has_roles`;
CREATE TABLE `user_has_roles` (
  `role_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`user_id`),
  KEY `user_has_roles_user_id_foreign` (`user_id`),
  CONSTRAINT `user_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `user_has_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of user_has_roles
-- ----------------------------
INSERT INTO `user_has_roles` VALUES ('1', '1');
INSERT INTO `user_has_roles` VALUES ('1', '2');
INSERT INTO `user_has_roles` VALUES ('3', '4');
