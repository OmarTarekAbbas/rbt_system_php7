/*
Navicat MySQL Data Transfer

Source Server         : localhost_7.3
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : rbt_system

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2020-09-16 15:13:28
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of amount_revenu
-- ----------------------------
INSERT INTO `amount_revenu` VALUES ('1', '31', '1', '50', null, null);
INSERT INTO `amount_revenu` VALUES ('2', '32', '1', '50', null, null);
INSERT INTO `amount_revenu` VALUES ('3', '31', '2', '50', null, null);
INSERT INTO `amount_revenu` VALUES ('4', '32', '2', '50', null, null);
INSERT INTO `amount_revenu` VALUES ('5', '31', '3', '50.59', null, null);
INSERT INTO `amount_revenu` VALUES ('6', '32', '3', '50', null, null);

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
  `internal_coding` int(11) DEFAULT NULL,
  `provider_id` int(10) unsigned DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `occasion_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `contents_provider_id_foreign` (`provider_id`),
  KEY `contents_user_id_foreign` (`user_id`),
  KEY `contents_occasion_id_foreign` (`occasion_id`),
  CONSTRAINT `contents_occasion_id_foreign` FOREIGN KEY (`occasion_id`) REFERENCES `occasions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `contents_provider_id_foreign` FOREIGN KEY (`provider_id`) REFERENCES `providers` (`id`) ON DELETE CASCADE,
  CONSTRAINT `contents_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of contents
-- ----------------------------
INSERT INTO `contents` VALUES ('7', 'content1', 'audio', '/uploads/content/2020-09-15/1600192101583.wav', null, '7', '1', null, '5', '2019-08-25 13:32:00', '2020-09-15 17:48:21');
INSERT INTO `contents` VALUES ('10', 'content2', 'video', '/uploads/content/2019-08-26/1566824917306.mp4', null, '10', '2', null, '6', '2019-08-25 13:32:00', '2019-08-26 11:08:37');
INSERT INTO `contents` VALUES ('18', 'content3', 'audio', '/uploads/content/2019-08-26/1566824979385.wav', null, '18', '3', null, '7', '2019-08-26 07:18:21', '2019-08-26 11:09:39');

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
  PRIMARY KEY (`id`),
  KEY `service_type_id` (`service_type_id`),
  KEY `contracts_first_party_id_foreign` (`first_party_id`),
  KEY `contracts_second_party_id_foreign` (`second_party_id`),
  KEY `contracts_contract_duration_id_foreign` (`contract_duration_id`),
  KEY `second_party_type_id` (`second_party_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of contracts
-- ----------------------------
INSERT INTO `contracts` VALUES ('1', 'C#2020/09/14/1600096765', '2', 'rotana - filters', '1', '1', '28', '', '', '2', '0', '2020-09-09', '1', '1', '1', '2021-01-09', 'Egypt,KSA,kuwait', 'etisalat,Vodafone', '1', '5', '1600096765.pdf', 'notes', null, null, null, 'super admin', '0', '2020-09-14 15:19:25', '2020-09-14 15:19:25', '2');
INSERT INTO `contracts` VALUES ('2', 'C#2020/09/15/1600165586', '2', 'contact2', '1', '1', '28', '', '', '2', '0', '2020-09-17', '1', '1', '1', '2020-09-24', 'Egypt', 'Vodafone', '1', '5', '1600165586.pdf', null, null, null, null, 'super admin', '0', '2020-09-15 10:26:26', '2020-09-15 10:26:26', '2');
INSERT INTO `contracts` VALUES ('3', 'C#2020/09/16/1600253892', '2', 'contract3', '1', '1', '24', '', '', '3', '0', '2020-10-08', '3', '0', '0', '2020-10-08', 'Egypt,KSA', 'etisalat,Vodafone', '1', '5', '1600252558.pdf', 'nnnnnnnnnnnn', null, null, null, 'super admin', '0', '2020-09-16 10:35:58', '2020-09-16 10:58:12', '1');

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
INSERT INTO `contract_duration` VALUES ('5', '6 Months', null, null);
INSERT INTO `contract_duration` VALUES ('6', '1 Month', null, null);
INSERT INTO `contract_duration` VALUES ('7', '2 Months', null, null);

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
INSERT INTO `contract_services` VALUES ('29', '4', 'mishri', '2020-09-10 09:23:54', '2020-09-10 09:23:54');
INSERT INTO `contract_services` VALUES ('30', '7', 'hamed', '2020-09-10 09:23:58', '2020-09-10 09:23:58');
INSERT INTO `contract_services` VALUES ('31', '1', 'service1', '2020-09-14 15:20:31', '2020-09-14 15:20:31');
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of countries
-- ----------------------------
INSERT INTO `countries` VALUES ('1', 'Egypt', '2019-02-11 13:12:04', '2019-02-11 13:12:04');
INSERT INTO `countries` VALUES ('2', 'KSA', '2019-02-11 13:12:10', '2019-02-11 13:12:10');
INSERT INTO `countries` VALUES ('3', 'kuwait', '2020-09-06 11:52:17', '2020-09-06 11:52:17');
INSERT INTO `countries` VALUES ('4', 'All countries', '2020-09-15 11:55:46', '2020-09-15 11:55:46');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of currencies
-- ----------------------------
INSERT INTO `currencies` VALUES ('1', 'USD', null, null);
INSERT INTO `currencies` VALUES ('2', 'SAR', null, null);
INSERT INTO `currencies` VALUES ('3', 'EGP', null, null);

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of departments
-- ----------------------------
INSERT INTO `departments` VALUES ('1', 'operation', 'emad@ivas.com.eg', '1', '2020-09-06 11:51:58', '2020-09-06 11:51:58');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of notifications
-- ----------------------------
INSERT INTO `notifications` VALUES ('1', '1', '1', 'Add New Content You Can Follow It From This Link', 'http://localhost/rbt_system_php7/content/3/edit', '0', '2020-09-14 12:57:34', '2020-09-14 12:57:34');
INSERT INTO `notifications` VALUES ('2', '1', '1', 'Add New Content You Can Follow It From This Link', 'http://localhost/rbt_system_php7/content/4/edit', '0', '2020-09-14 12:58:22', '2020-09-14 12:58:22');
INSERT INTO `notifications` VALUES ('3', '1', '1', 'Add New Content You Can Follow It From This Link', 'http://localhost/rbt_system_php7/content/5/edit', '0', '2020-09-14 12:58:48', '2020-09-14 12:58:48');
INSERT INTO `notifications` VALUES ('4', '1', '1', 'Add New Content You Can Follow It From This Link', 'http://localhost/rbt_system_php7/content/6/edit', '0', '2020-09-14 12:59:37', '2020-09-14 12:59:37');

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of occasions
-- ----------------------------
INSERT INTO `occasions` VALUES ('5', 'hajj', '2020-09-15 12:00:06', '2020-09-15 12:00:06', '4');
INSERT INTO `occasions` VALUES ('6', 'Nationali Ksa day', '2020-09-15 12:00:25', '2020-09-15 12:00:25', '2');
INSERT INTO `occasions` VALUES ('7', 'Ramdan', '2020-09-15 12:00:37', '2020-09-15 12:00:37', '4');
INSERT INTO `occasions` VALUES ('8', 'national Kuwait Day', '2020-09-15 12:00:59', '2020-09-15 12:00:59', '3');
INSERT INTO `occasions` VALUES ('9', 'National Egypt Day', '2020-09-15 12:03:45', '2020-09-15 12:03:45', '1');

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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
INSERT INTO `percentage` VALUES ('20', '0');
INSERT INTO `percentage` VALUES ('21', '28');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of providers
-- ----------------------------
INSERT INTO `providers` VALUES ('1', 'mishari', '2020-09-06 11:54:00', '2020-09-06 11:54:00');
INSERT INTO `providers` VALUES ('2', 'hamed', '2020-09-06 12:26:58', '2020-09-06 12:26:58');
INSERT INTO `providers` VALUES ('3', 'Arpu', '2020-09-06 13:16:50', '2020-09-06 13:16:50');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of provider_contents
-- ----------------------------
INSERT INTO `provider_contents` VALUES ('1', '1', '1', '7', '18,19', null, null);
INSERT INTO `provider_contents` VALUES ('2', '2', '1', '10', '21', null, null);

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
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of rbts
-- ----------------------------
INSERT INTO `rbts` VALUES ('18', 'rbt1', null, null, null, null, '123', null, null, 'uploads/2020-09-15/rbt1.wav', '6', '5', '1', '0', '2020-09-15 17:51:58', '2020-09-15 17:51:58', '1', '7', '18_3_6');
INSERT INTO `rbts` VALUES ('19', 'rbt2', null, null, null, null, '456', null, null, 'uploads/2020-09-15/rbt2.wav', '6', '5', '1', '0', '2020-09-15 17:51:58', '2020-09-15 17:51:58', '1', '7', '19_3_6');
INSERT INTO `rbts` VALUES ('20', 'rbt3', null, null, null, null, '789', '4444', null, 'uploads/2020-09-15/rbt3.wav', '6', '5', '1', '0', '2020-09-15 17:51:58', '2020-09-16 09:28:53', '2', '10', '20_3_6');
INSERT INTO `rbts` VALUES ('21', 'rbt4', null, null, null, null, '4544', null, null, 'uploads/2020-09-15/rbt4.wav', '6', '5', '1', '0', '2020-09-15 17:51:58', '2020-09-15 17:51:58', '2', '10', '21_3_6');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of reports
-- ----------------------------

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of revenus
-- ----------------------------
INSERT INTO `revenus` VALUES ('2', '1', '2020', 'July', '2', '26', '100', '2', '5', '1', null, 'E8sXUg4fkjr0my8mT1mRCMlCGElynr3tMifFGdx6.xlsx', '2020-09-15 12:43:07', '2020-09-15 12:43:07');
INSERT INTO `revenus` VALUES ('3', '1', '2020', 'August', '1', '6', '100.59', '2', '6', '1', 'gggggggg', 'bPnhB3UWlPpKo5S3hfw22Ki2Whh6ISLvzH9E4fhg.xlsx', '2020-09-16 11:02:20', '2020-09-16 11:02:20');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of roadmaps
-- ----------------------------
INSERT INTO `roadmaps` VALUES ('1', 'event1', '#82128c', '', '2020-09-20', '2020-09-22', '0', '3', '8', '1', '6', null, null, null, '1', '2020-09-16 09:42:47', '2020-09-16 09:42:47');

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
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of second_parties
-- ----------------------------
INSERT INTO `second_parties` VALUES ('24', '1', 'Smart Technology', '2013-06-01', null, '1', null, null, null, null, null, null);
INSERT INTO `second_parties` VALUES ('25', '1', 'EcoVas', '2014-05-01', null, '1', null, null, null, null, null, null);
INSERT INTO `second_parties` VALUES ('26', '1', 'Qanawat', '2015-12-01', null, '1', null, null, null, null, null, null);
INSERT INTO `second_parties` VALUES ('27', '1', 'Life Connection', '2020-05-28', null, '0', null, null, null, null, null, null);
INSERT INTO `second_parties` VALUES ('28', '2', 'Mashary Rashed Al Afasy', '2014-09-01', null, '1', null, null, null, null, null, null);
INSERT INTO `second_parties` VALUES ('29', '2', 'Melody Company', '2015-12-01', null, '1', null, null, null, null, null, null);
INSERT INTO `second_parties` VALUES ('30', '4', 'The Wedding House', '2017-06-11', null, '0', null, null, null, null, null, null);

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
INSERT INTO `service_types` VALUES ('3', 'Subscription (Alert) included video - audio - gif - jpg - fi', null, null);
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
-- Table structure for `types`
-- ----------------------------
DROP TABLE IF EXISTS `types`;
CREATE TABLE `types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of types
-- ----------------------------

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
INSERT INTO `users` VALUES ('1', 'super admin', 'super_admin@ivas.com', '$2y$10$u2evAW530miwgUb2jcXkTuqIGswxnSQ3DSmX1Ji5rtO3Tx.MtVcX2', 'rZuEmD6bPlK8lMdaoIC1jRvzlLs17XOy5r6MTsGWA1ggFfMGCVaw7bYG3hBQ', '2017-11-09 06:13:14', '2018-11-26 08:11:50', '', null);
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
