/*
 Navicat Premium Data Transfer

 Source Server         : dixon.dev
 Source Server Type    : MySQL
 Source Server Version : 50626
 Source Host           : 192.168.56.101
 Source Database       : co-space

 Target Server Type    : MySQL
 Target Server Version : 50626
 File Encoding         : utf-8

 Date: 08/10/2015 18:39:36 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `auth_assignment`
-- ----------------------------
DROP TABLE IF EXISTS `auth_assignment`;
CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Records of `auth_assignment`
-- ----------------------------
BEGIN;
INSERT INTO `auth_assignment` VALUES ('Administrator', '1', '1439095627'), ('Manager', '3', '1439095627'), ('Manager', '7', '1439107258'), ('User', '2', '1439095627'), ('User', '7', '1439107258');
COMMIT;

-- ----------------------------
--  Table structure for `auth_item`
-- ----------------------------
DROP TABLE IF EXISTS `auth_item`;
CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`),
  CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Records of `auth_item`
-- ----------------------------
BEGIN;
INSERT INTO `auth_item` VALUES ('Administrator', '1', null, null, null, '1439095627', '1439095627'), ('Country', '1', null, null, null, '1439095627', '1439095627'), ('Manager', '1', null, null, null, '1439095627', '1439095627'), ('Provinceial', '1', null, null, null, '1439095627', '1439095627'), ('Report1', '2', 'ดูรายงานส่วนที่ 1', null, null, '1439095627', '1439095627'), ('Reports', '1', null, null, null, '1439095627', '1439095627'), ('User', '1', null, null, null, '1439095627', '1439095627');
COMMIT;

-- ----------------------------
--  Table structure for `auth_item_child`
-- ----------------------------
DROP TABLE IF EXISTS `auth_item_child`;
CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Records of `auth_item_child`
-- ----------------------------
BEGIN;
INSERT INTO `auth_item_child` VALUES ('Administrator', 'Country'), ('Administrator', 'Manager'), ('Administrator', 'Provinceial'), ('User', 'Report1'), ('Administrator', 'Reports'), ('Administrator', 'User'), ('Manager', 'User');
COMMIT;

-- ----------------------------
--  Table structure for `auth_rule`
-- ----------------------------
DROP TABLE IF EXISTS `auth_rule`;
CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `budget_year`
-- ----------------------------
DROP TABLE IF EXISTS `budget_year`;
CREATE TABLE `budget_year` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `year` char(4) DEFAULT NULL,
  `description` text,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `year` (`year`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `budget_year`
-- ----------------------------
BEGIN;
INSERT INTO `budget_year` VALUES ('1', '2015', null, '2015-08-10 12:24:00', '2015-08-10 12:24:02', null, null, null, null);
COMMIT;

-- ----------------------------
--  Table structure for `evauate_score`
-- ----------------------------
DROP TABLE IF EXISTS `evauate_score`;
CREATE TABLE `evauate_score` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kpi_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `value` int(11) DEFAULT NULL,
  `year` varchar(4) DEFAULT NULL,
  `level` int(1) DEFAULT NULL,
  `hospital_id` varchar(6) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `kpi_id_2` (`kpi_id`,`user_id`,`year`,`level`,`hospital_id`),
  KEY `kpi_id` (`kpi_id`),
  KEY `user_id` (`user_id`),
  KEY `year` (`year`),
  KEY `value` (`value`),
  KEY `hospitall_code` (`hospital_id`),
  CONSTRAINT `evauate_score_ibfk_1` FOREIGN KEY (`kpi_id`) REFERENCES `kpi_item` (`id`),
  CONSTRAINT `evauate_score_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `evauate_score`
-- ----------------------------
BEGIN;
INSERT INTO `evauate_score` VALUES ('1', '1', '2', '1', '2558', null, '2', '1439199317', '1439203446'), ('2', '2', '2', '1', '2558', null, '2', '1439199317', '1439203446'), ('3', '3', '2', '1', '2558', null, '2', '1439200760', '1439200774'), ('4', '4', '2', '0', '2558', null, '2', '1439200760', '1439200774'), ('5', '5', '2', '9', '2558', null, '2', '1439200760', '1439200774');
COMMIT;

-- ----------------------------
--  Table structure for `group`
-- ----------------------------
DROP TABLE IF EXISTS `group`;
CREATE TABLE `group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `parent_id` (`parent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `group`
-- ----------------------------
BEGIN;
INSERT INTO `group` VALUES ('1', 'ความปลอดภัย', null), ('2', 'บริการรังสีวินิจฉัย', null), ('3', 'คุณภาพบริการ', null), ('4', 'เครื่องมือและอุปกรณ์', '1'), ('5', 'ผู้ให้บริการ', '1'), ('6', 'บุคลากร', '2'), ('7', 'สถานที่', '2'), ('8', 'สิ่งแวดล้อม', '2'), ('9', 'บริการังสีวินิจฉัย', '2'), ('10', 'สถานที่', '3'), ('11', 'ของที่ใช้', '3'), ('12', 'ส่ิงของที่ให้ไป', '3'), ('13', 'ผลของงานที่ทำให้', '3'), ('14', 'คุรภาพบริการ', '3');
COMMIT;

-- ----------------------------
--  Table structure for `hospital_assignment`
-- ----------------------------
DROP TABLE IF EXISTS `hospital_assignment`;
CREATE TABLE `hospital_assignment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL COMMENT 'รหัสผู้ใช้งาน',
  `hospital_id` int(11) DEFAULT NULL COMMENT 'รหัสสถานพยาบาล',
  `created_at` int(11) DEFAULT NULL COMMENT 'สร้างวันที่',
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL COMMENT 'ให้สิทธิโดยใคร',
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `hospital_id` (`hospital_id`),
  KEY `created_by` (`created_by`),
  KEY `updated_by` (`updated_by`),
  CONSTRAINT `hospital_assignment_ibfk_1` FOREIGN KEY (`hospital_id`) REFERENCES `lib_hospital` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `hospital_assignment`
-- ----------------------------
BEGIN;
INSERT INTO `hospital_assignment` VALUES ('1', '2', '2', '1439111173', '1439111362', '1', '1'), ('2', '1', '1', '1439112594', '1439112594', '1', '1');
COMMIT;

-- ----------------------------
--  Table structure for `kpi_item`
-- ----------------------------
DROP TABLE IF EXISTS `kpi_item`;
CREATE TABLE `kpi_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `the_must` text,
  `the_best` text,
  `group_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `group_id` (`group_id`),
  CONSTRAINT `kpi_item_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `group` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `kpi_item`
-- ----------------------------
BEGIN;
INSERT INTO `kpi_item` VALUES ('1', 'ข้อ 1', 'ข้อ 1', '4'), ('2', 'ข้อ 2', 'ข้อ 2', '5'), ('3', 'ข้อ 3', 'ข้อ 3', '6'), ('4', 'ข้อ 4', 'ข้อ 4', '7'), ('5', 'ข้อ 5', 'ข้อ 5', '8');
COMMIT;

-- ----------------------------
--  Table structure for `lib_hospital`
-- ----------------------------
DROP TABLE IF EXISTS `lib_hospital`;
CREATE TABLE `lib_hospital` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(6) DEFAULT NULL COMMENT 'รหัสพยาบาล',
  `name` varchar(255) DEFAULT NULL COMMENT 'ชื่อสถานพยาบาล',
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `lib_hospital`
-- ----------------------------
BEGIN;
INSERT INTO `lib_hospital` VALUES ('1', '10670', 'โรงพยาบาลขอนแก่น'), ('2', '11000', 'โรงพยาบาลน้ำพอง');
COMMIT;

-- ----------------------------
--  Table structure for `migration`
-- ----------------------------
DROP TABLE IF EXISTS `migration`;
CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `migration`
-- ----------------------------
BEGIN;
INSERT INTO `migration` VALUES ('m000000_000000_base', '1439020733'), ('m130524_201442_init', '1439020736'), ('m140506_102106_rbac_init', '1439083817');
COMMIT;

-- ----------------------------
--  Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `level` enum('0','1','2','3') COLLATE utf8_unicode_ci DEFAULT '1' COMMENT 'ระดับผู้ประเมิน',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Records of `user`
-- ----------------------------
BEGIN;
INSERT INTO `user` VALUES ('1', 'admin', 'nXgbCcT6L-4AGDYOClSQX9kVXp7KbolX', '$2y$13$IjcI6H2yigD34hqUJjRbdOSw/cW5gRP4Yih6XcmtjC9hemVgsjE8a', null, 'dixonsatit@gmail.com', '10', '1439025199', '1439116396', '1'), ('2', 'user', 'Y3DQpQd7nJD4O65GFurNU17DZjOdY37z', '$2y$13$LmbURyL6kRjfdn7f4Eka.euLS7A4ME1OQT1ltADx5p8EI.CE9blZa', null, 'user@gmail.com', '10', '1439093810', '1439093810', null), ('3', 'manager', 'qBaC5vm9YcZB-GL3C4TM8ZdvDuaRYGwK', '$2y$13$qFUeQvCji99kXwk298J9FulCZRrke09WHRupNOW7ScxevxhW5h2Ke', null, 'manager@gmail.com', '10', '1439095375', '1439095375', null), ('4', 'test', 'g--ZQWjOXnNx_MltxtzvTynEafaU8tXG', '$2y$13$N2F5ucDgM382EL/zZlfmbO2w7tQVly.072sKy2k/1rL7B40ZKS4IK', null, 'testdixon@gmail.com', '10', '1439105392', '1439105392', null), ('5', 'test2', 'aRveysOvP7-kTs_X0y0RyeeYzVFeO4KZ', '$2y$13$pGJBtXB5XgHrw56Qj6G9JuWMeyJGDI9VQrKhpfI7kkkSVr747xd/i', null, '11@gmail.com', '10', '1439106890', '1439106890', null), ('6', 'test3', 'tNJ7K5AZ-H6EXLijU8iF29EQKB1Rl5i1', '$2y$13$X9wDeL1iad7TxZFj0ITCiem/pTw2EwiPIcb2WfAcbs1nxJOSx1vDm', null, 'test3@gmail.com', '10', '1439107094', '1439107094', null), ('7', 'user4', 'GCJRgcaMgmzJ2rIgjO4tQNwgtbYWHcj4', '$2y$13$J2JAlKKbap/pILHL.Sq6jeeJeosTAAV3WBzDGc1.I068kGrs8s10y', null, 'dixon111@gmail.com', '10', '1439107258', '1439107258', null);
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
