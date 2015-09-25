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

 Date: 08/15/2015 21:39:11 PM
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
INSERT INTO `auth_assignment` VALUES ('Administrator', '1', '1439376282'), ('Manager', '3', '1439376282'), ('Manager', '5', '1439377050'), ('User', '2', '1439376282');
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
INSERT INTO `auth_item` VALUES ('Administrator', '1', null, null, null, '1439376282', '1439376282'), ('Country', '1', null, null, null, '1439376282', '1439376282'), ('loginToBackend', '2', 'ยอมให้เข้าใช้งานหลังบ้าน', null, null, '1439376282', '1439376282'), ('Manager', '1', null, null, null, '1439376282', '1439376282'), ('Provinceial', '1', null, null, null, '1439376282', '1439376282'), ('Report1', '2', 'ดูรายงานส่วนที่ 1', null, null, '1439376282', '1439376282'), ('Reports', '1', null, null, null, '1439376282', '1439376282'), ('User', '1', null, null, null, '1439376282', '1439376282');
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
INSERT INTO `auth_item_child` VALUES ('Administrator', 'Country'), ('Manager', 'loginToBackend'), ('Administrator', 'Manager'), ('Administrator', 'Provinceial'), ('User', 'Report1'), ('Administrator', 'Reports'), ('Administrator', 'User'), ('Manager', 'User');
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
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `evauate_score`
-- ----------------------------
BEGIN;
INSERT INTO `evauate_score` VALUES ('1', '7', '2', '9', '2558', '1', '2', '1439392936', '1439399259'), ('2', '8', '2', '9', '2558', '1', '2', '1439392936', '1439399259'), ('3', '9', '2', '1', '2558', '1', '2', '1439392936', '1439399259'), ('4', '11', '2', '1', '2558', '1', '2', '1439392936', '1439399259'), ('5', '12', '2', '1', '2558', '1', '2', '1439392936', '1439399259'), ('6', '13', '2', '0', '2558', '1', '2', '1439392936', '1439399259'), ('7', '15', '2', '0', '2558', '1', '2', '1439392936', '1439399259'), ('8', '16', '2', '0', '2558', '1', '2', '1439392936', '1439399259'), ('9', '17', '2', '1', '2558', '1', '2', '1439392936', '1439399259'), ('10', '18', '2', '1', '2558', '1', '2', '1439392936', '1439399259'), ('11', '19', '2', '1', '2558', '1', '2', '1439392936', '1439399259'), ('12', '20', '2', '2', '2558', '1', '2', '1439392936', '1439399259'), ('13', '22', '2', '1', '2558', '1', '2', '1439392936', '1439399259'), ('14', '23', '2', '2', '2558', '1', '2', '1439392936', '1439399259'), ('15', '24', '2', '2', '2558', '1', '2', '1439392936', '1439399259'), ('16', '26', '2', '1', '2558', '1', '2', '1439392936', '1439399259'), ('17', '27', '2', '1', '2558', '1', '2', '1439392937', '1439399259'), ('18', '28', '2', '2', '2558', '1', '2', '1439392937', '1439399259'), ('19', '29', '2', '2', '2558', '1', '2', '1439392937', '1439399259'), ('20', '31', '2', '2', '2558', '1', '2', '1439392937', '1439399259'), ('21', '32', '2', '2', '2558', '1', '2', '1439392937', '1439399259'), ('22', '34', '2', '2', '2558', '1', '2', '1439392937', '1439399259'), ('23', '35', '2', '2', '2558', '1', '2', '1439392937', '1439399259'), ('24', '37', '2', '2', '2558', '1', '2', '1439392937', '1439399259'), ('25', '38', '2', '2', '2558', '1', '2', '1439392937', '1439399259'), ('26', '39', '2', '2', '2558', '1', '2', '1439392937', '1439399259'), ('27', '40', '2', '2', '2558', '1', '2', '1439392937', '1439399259'), ('28', '41', '2', '2', '2558', '1', '2', '1439392937', '1439399259'), ('29', '42', '2', '2', '2558', '1', '2', '1439392937', '1439399259'), ('30', '43', '2', '2', '2558', '1', '2', '1439392937', '1439399259'), ('31', '10', '2', '1', '2558', '1', '2', '1439392937', '1439399259'), ('32', '14', '2', '1', '2558', '1', '2', '1439399312', '1439399525'), ('33', '21', '2', '1', '2558', '1', '2', '1439399312', '1439399525'), ('34', '25', '2', '1', '2558', '1', '2', '1439399312', '1439399525'), ('35', '44', '2', '1', '2558', '1', '2', '1439399312', '1439399525'), ('36', '45', '2', '9', '2558', '1', '2', '1439399312', '1439399525'), ('37', '46', '2', '1', '2558', '1', '2', '1439399312', '1439399525'), ('38', '47', '2', '1', '2558', '1', '2', '1439399312', '1439399525'), ('39', '48', '2', '1', '2558', '1', '2', '1439399312', '1439399525'), ('40', '49', '2', '2', '2558', '1', '2', '1439399312', '1439399525'), ('41', '50', '2', '2', '2558', '1', '2', '1439399312', '1439399525'), ('42', '51', '2', '2', '2558', '1', '2', '1439399312', '1439399525'), ('43', '52', '2', '2', '2558', '1', '2', '1439399312', '1439399525'), ('44', '53', '2', '2', '2558', '1', '2', '1439399312', '1439399525'), ('45', '54', '2', '2', '2558', '1', '2', '1439399312', '1439399525'), ('46', '55', '2', '1', '2558', '1', '2', '1439399312', '1439399525'), ('47', '57', '2', '1', '2558', '1', '2', '1439399312', '1439399525'), ('48', '30', '2', '1', '2558', '1', '2', '1439399312', '1439399525'), ('49', '33', '2', '1', '2558', '1', '2', '1439399312', '1439399525'), ('50', '36', '2', '2', '2558', '1', '2', '1439399312', '1439399525'), ('51', '56', '2', '1', '2558', '1', '2', '1439399312', '1439399525'), ('52', '58', '2', '1', '2558', '1', '2', '1439399312', '1439399525'), ('53', '59', '2', '1', '2558', '1', '2', '1439399312', '1439399525'), ('54', '60', '2', '9', '2558', '1', '2', '1439399312', '1439399525'), ('55', '61', '2', '9', '2558', '1', '2', '1439399312', '1439399525'), ('56', '62', '2', '9', '2558', '1', '2', '1439399312', '1439399525'), ('57', '63', '2', '9', '2558', '1', '2', '1439399312', '1439399525'), ('58', '64', '2', '0', '2558', '1', '2', '1439399312', '1439399525'), ('59', '65', '2', '2', '2558', '1', '2', '1439399312', '1439399525'), ('60', '66', '2', '2', '2558', '1', '2', '1439399312', '1439399525'), ('61', '67', '2', '2', '2558', '1', '2', '1439399312', '1439399525');
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `hospital_assignment`
-- ----------------------------
BEGIN;
INSERT INTO `hospital_assignment` VALUES ('1', '2', '2', '1439111173', '1439111362', '1', '1'), ('3', '2', '1', '1439390254', '1439390254', '1', '1'), ('4', '3', '2', '1439390274', '1439390274', '1', '1');
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
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `kpi_item`
-- ----------------------------
BEGIN;
INSERT INTO `kpi_item` VALUES ('7', '1. มีรายงานผลการตรวจสอบคุณภาพเครื่องเอกซเรย์โดยหน่วยงานที่ได้รับการรับรอง มาตรฐานระบบ ISO/IEC 17025 อย่างน้อยปีละครั้ง', 'ผลการตรวจสอบ คุณภาพเครื่องเอกซเรย์ทุกเครื่องเข้ามาตรฐาน (ผลการตรวจสอบอยู่ในช่วงเกณฑ์ที่ยอมรับได้ทุกรายการ)', '4'), ('8', '2. มีเครื่องมือทางรังสีวิทยาและอุปกรณ์ พร้อมใช้งาน จำนวนเพียงพอตามความจำเป็นในการให้บริการดังนี้', '', '4'), ('9', '2.1 เครื่องเอกซเรย์ทั่วไป', 'ได้มาตรฐานทุกเครื่อง', '4'), ('10', '2.2 เครื่องเอกซเรย์ชนิดเคลื่อนที่', 'ได้มาตรฐานทุกเครื่อง', '5'), ('11', '2.3 เครื่องส่องตรวจทางรังสี  ', 'ได้มาตรฐานทุกเครื่อง', '4'), ('12', '2.4 เครื่องเอกซเรย์ฟัน  ', 'ได้มาตรฐานทุกเครื่อง', '4'), ('13', '2.5 เครื่องเอกซเรย์คอมพิวเตอร์ ', 'ได้มาตรฐานทุกเครื่อง', '4'), ('14', '2.6 เครื่องเอกซเรย์เต้านม', 'ได้มาตรฐานทุกเครื่อง', '6'), ('15', '2.7 เครื่องตรวจด้วยสนามแม่เหล็กแรงสูง (MRI)', 'ได้มาตรฐานทุกเครื่อง', '4'), ('16', '3. อุปกรณ์ป้องกันรังสี  สามารถป้องกันรังสีได้มีสภาพดี ', '', '4'), ('17', '3.1 เสื้อยางผสมตะกั่ว 1 ตัว/ห้องเอกซเรย์', '', '4'), ('18', '3.2 Thyroid Shield 1 อัน/ห้องเอกซเรย์', '', '4'), ('19', '3.3 Gonad Shield 1 อัน /ห้องเอกซเรย์', '', '4'), ('20', '', '3.4 ถุงมือยางผสมตะกั่ว ', '4'), ('21', '', '3.5 แว่นตากันรังสี', '6'), ('22', '', '3.6 ฉากตะกั่ว ', '4'), ('23', '4. มีคู่มือการใช้งานประจำเครื่องมือและอุปกรณ์ที่สำคัญ \r\n   และมีการจัดเก็บข้อมูลต่างๆของแต่ละเครื่องได้แก่\r\n    ราคาเครื่อง บริษัทผู้ผลิตและอื่นๆ', 'มีการบันทึกทุกครั้งและเป็นปัจจุบัน', '4'), ('24', '5. มีเอกสารบันทึกการบำรุงรักษา \r\n(Preventive maintenance) เครื่องมือที่สำคัญ \r\nตามระยะเวลาที่เหมาะสม\r\n', 'ดำเนินการได้ครบทั้ง 3 ระดับ ได้แก่\r\n- M1 บำรุงรักษาโดยนักรังสีเทคนิค\r\n- M2 บำรุงรักษาโดยช่างของหน่วยงาน\r\n- M3 บำรุงรักษาโดยช่างของบริษัทผลิต/\r\n  ผู้เชี่ยวชาญ,วิศวกร\r\n', '4'), ('25', '6. มีการติดตั้งสายดินเพื่อป้องกันไฟฟ้าดูด ไฟฟ้ารั่วของอุปกรณ์ เครื่องมือสำคัญ   \r\n- มีการติดตั้ง เครื่องควบคุมกระแสไฟฟ้า\r\n', 'มีระบบตัดกระแสลัดวงจรเฉพาะสำหรับ\r\n(breaker) แต่ละเครื่องเอกซเรย์\r\n', '6'), ('26', '7. ระบบไฟฟ้าสำหรับห้องตรวจทางรังสีต้องมีแผงควบคุม', 'มีมิเตอร์แสดงค่าความต่างศักย์ไฟฟ้า (V)', '4'), ('27', '8. มีหม้อแปลงไฟฟ้าที่สามารถรองรับ\r\nกำลังไฟฟ้าของแผนกเอกซเรย์ได้', 'มีหม้อแปลงไฟฟ้าแยกเฉพาะแผนกเอกซเรย์', '4'), ('28', '9. ติดตั้งเครื่องดับเพลิงที่เหมาะสม \r\n   - ถูกประเภท พร้อมใช้งาน\r\n   - การตรวจสอบตามเวลา\r\n   - มีการซ้อมดับเพลิงอย่างน้อยปีละหนึ่งครั้ง\r\n   - มีป้ายทางหนีไฟที่เห็นได้ชัดเจน\r\n', 'เจ้าหน้าที่งานรังสีวินิจฉัยสามารถใช้\r\nเครื่องดับเพลิงได้อย่างถูกต้อง\r\n', '4'), ('29', '10. มีระบบไฟฟ้าสำรองเพื่อให้แสงสว่างฉุกเฉิน \r\n    ตามทางเดิน อย่างน้อย 1 จุด ', 'มีระบบไฟฟ้าสำรองเพื่อให้แสงสว่างฉุกเฉิน เพียงพอสำหรับการปฏิบัติงาน', '4'), ('30', '11. มีเครื่องวัดรังสีประจำตัวบุคคล และบันทึกผลเครื่องวัดรังสีประจำตัวบุคคล ของผู้ปฏิบัติงานด้านรังสีครบทุกคน', 'มีการวิเคราะห์ข้อมูล พร้อมนำเสนอผู้บริหารของหน่วยงานเป็นลายลักษณ์อักษร', '7'), ('31', '12. มีมาตรการ/แผนงาน เพื่อลดความเสี่ยงจากการได้รับอันตรายจากรังสี และอื่นๆ ได้แก่\r\n -  มีแนวทางการปฏิบัติเมื่อได้รับรังสีเกิน\r\n    มาตรฐาน\r\n  - แผนปฏิบัติการเมื่อเกิดอุบัติเหตุทางรังสี\r\n   - แผนบริหารความเสี่ยง (Risk Management)\r\n', '- มาตรการ/แผนงาน ได้รับการทบทวนเป็น\r\n  ประจำทุกปี\r\n- มีการปฏิบัติตามแผนที่ได้วางไว้ และจัดทำ \r\n  รายงานสรุปผลการดำเนินงานตามแผน  \r\n  พร้อมเสนอผู้บริหารรับทราบ\r\n- มีเจ้าหน้าที่ที่รับผิดชอบด้านความปลอดภัย\r\n  ทางด้านรังสี\r\n', '4'), ('32', '13. มีวัสดุ  เวชภัณฑ์ และสิ่งที่จำเป็นด้านความปลอดภัย พร้อมใช้ในแผนกเช่น หน้ากากอนามัย ถุงมือ แอลกอฮอล์เช็ดมือ อ่างล้างมือ เป็นต้น ', 'มีประจำในทุกจุดที่จำเป็น เพื่อสามารถใช้ได้ทันท่วงที', '4'), ('33', '14. มีแนวทางในการทำงานเมื่อต้องสัมผัสสารเคมี อย่างถูกต้อง ปลอดภัย', 'มีจุดที่สามารถล้างตา ล้างมือ ได้ทันทีเมื่อเกิดอุบัติเหตุ', '7'), ('34', '15. มีระบบการป้องกันอันตรายจากรังสีแก่ผู้มารับบริการดังนี้', '', '4'), ('35', '15.1  มีการใช้อุปกรณ์จำกัดลำรังสี \r\n(Collimator) เฉพาะส่วนที่ต้องการตรวจ\r\n', 'ที่สามารถใช้งานได้ดี และได้มาตรฐาน', '4'), ('36', '15.2 มีการป้องกันรังสีให้ผู้รับบริการ ด้วยอุปกรณ์\r\nป้องกันรังสี เช่น Gonad shield, Thyroid shield หรือแผ่นตะกั่วกันรังสี\r\n', 'มีข้อมูลปริมาณรังสีเฉลี่ยที่ผู้ป่วยได้รับ ให้เป็นไปตามมาตรฐาน', '7'), ('37', '15.3 มีการป้องกันรังสีให้ญาติ หรือผู้ติดตาม ในกรณีที่ต้องให้จับผู้ป่วย ด้วยอุปกรณ์ เช่น เสื้อยางผสมตะกั่ว เป็นต้น', '', '4'), ('38', '15.4 มีการทวนสอบคำสั่งเอกซเรย์กับพยาธิสภาพของผู้ป่วยทุกครั้งก่อนให้บริการ', 'มีการระบุ R/O (Rule out) ของแพทย์ในใบสั่งเอกซเรย์ (x-ray request)', '4'), ('39', '16. มีมาตรการในการช่วยฟื้นคืนชีพอย่างมีประสิทธิภาพ และมีการซักซ้อมอย่างน้อยปีละ 1 ครั้ง', 'มี Emergency set ที่ห้องตรวจทางรังสี เพื่อช่วยเหลือผู้ป่วยเมื่อเกิดภาวะวิกฤต หรือระบบการช่วยเหลือฉุกเฉินอย่างมีประสิทธิภาพ', '4'), ('40', '17. มีระบบการเฝ้าระวังดูแลผู้ป่วยขณะรอรับบริการอยู่ในพื้นที่ ขณะให้บริการถ่ายภาพรังสี และขณะเคลื่อนย้ายส่งต่อผู้ป่วย ', 'ผู้ป่วยภาวะวิกฤติต้องมีพยาบาลติดตามดูแล และมีเจ้าหน้าที่ศูนย์เปลรอรับผู้ป่วยกลับได้ทันที', '4'), ('41', '18. เจ้าหน้าที่ได้รับการฝึกอบรม/ฝึกปฏิบัติ    ในการเคลื่อนย้ายผู้ป่วยตามหลักวิชาการ', 'มีอุปกรณ์ช่วยในการเคลื่อนย้ายผู้ป่วย เช่น Slide board ประจำแผนก', '4'), ('42', '19. มีแนวทางการปฏิบัติ/คู่มือการปฏิบัติงาน เกี่ยวกับ ความปลอดภัยจากการใช้สารเปรียบต่าง', 'มีหลักฐานการคัดกรองผู้ป่วยที่มีความเสี่ยงสูง เช่น ผู้ป่วยเบาหวาน ผู้ป่วยสูงอายุ และมีการวัดสัญญาณชีพ (Vital sign) ก่อนการตรวจพิเศษทางรังสีทุกครั้ง', '4'), ('43', '20. หน่วยงานต้องมีการบริหารความเสี่ยง (Risk Management) ที่ผู้ป่วยจะได้รับ เช่น ผู้ป่วยท้อง  การแพ้สารเปรียบต่าง เป็นต้น และจัดทำเป็นแผนบริหารความเสี่ยง', '- มีหลักฐานว่ามีระบบการเฝ้าระวังความเสี่ยง  \r\n  และบันทึกอุบัติการณ์\r\n- เจ้าหน้าที่ทุกคนสามารถปฏิบัติตามแผนบริหาร  \r\n  ความเสี่ยงได้อย่างถูกต้อง\r\n', '4'), ('44', '1. มีบุคลากรเพียงพอต่อการให้บริการดังนี้', '', '6'), ('45', '1.1 รังสีแพทย์ อย่างน้อย 1 คน', '', '6'), ('46', '1.2 มีบุคลากรทางด้านรังสีอย่างน้อยครึ่งหนึ่งของจำนวนที่ต้องมีเมื่อคิดตามภาระงาน ตามเกณฑ์กระทรวงสาธารณสุข ', '1.2 นักรังสีเทคนิคที่มีใบอนุญาตเป็นผู้ประกอบโรคศิลปะสาขารังสีเทคนิค เพียงพอตามภาระงาน ตามเกณฑ์กระทรวงสาธารณสุข', '6'), ('47', '2. มีการกำหนดหน้าที่ความรับผิดชอบของบุคลากรในหน่วยงาน (Job description)', 'มีหลักฐานแสดงว่าได้รับอนุมัติจากผู้บริหารระดับสูงสุดของหน่วยงาน', '6'), ('48', '3. มีบุคลากรทางด้านวิชาชีพรังสี ปฏิบัติงานได้ตลอดเวลาที่ให้บริการ (ตามภาระงาน)', 'บุคลากรทางด้านวิชาชีพรังสีขึ้นปฏิบัติงาน  ตลอด 24 ชั่วโมง', '6'), ('49', '4. บุคคลากรทางด้านรังสีต้องได้รับการพัฒนาโดยการรับการฝึกอบรมในเรื่องดังนี้ 1 ครั้ง/เรื่อง/ปี', 'บุคคลากรทางด้านรังสีได้รับการอบรมครบทุกเรื่องไม่น้อยกว่าร้อยละ 50 ของจำนวนบุคลากร ', '6'), ('50', '   4.1 ฟื้นฟูวิชาการทางรังสี / การป้องกันอันตรายจากรังสี', '', '6'), ('51', '   4.2 การช่วยฟื้นคืนชีพ', '', '6'), ('52', '   4.3 การป้องกันและบรรเทาการเกิดอัคคีภัย \r\nภัยธรรมชาติ และอุบัติภัย\r\n', '', '6'), ('53', '   4.4 การป้องกันการแพร่กระจายเชื้อใน\r\nโรงพยาบาล\r\n', '', '6'), ('54', '5. มีการแนะนำ/อบรม เรื่องกฎเกณฑ์มาตรฐาน บุคลากรที่เกี่ยวข้อง/เจ้าหน้าที่ใหม่ ในแผนก', 'มีการจัดทำคู่มือในการอบรม ที่เป็นรูปธรรม เช่น คู่มือบุคลากรใหม่', '6'), ('55', '6. บุคลากรอื่น เช่น พนักงานทำความสะอาด เจ้าหน้าที่ธุรการ ได้รับการแนะนำความรู้เรื่องการป้องกันอันตรายจากรังสี(โดยการซักถาม\r\nผู้เกี่ยวข้อง)\r\n', 'ได้รับการทบทวนความรู้เป็นประจำทุกปี', '6'), ('56', '7. มีพื้นที่เพียงพอต่อการให้บริการ อากาศถ่ายเทสะดวก  ป้องกันการแพร่กระจายของเชื้อโรค ดังนี้', '', '7'), ('57', '7.1 มีพื้นที่รอรับบริการ', 'เป็นสัดส่วน มีป้ายบอกชัดเจน เช่น ส่วนรอรับบริการ  ส่วนนัดผู้ป่วย', '6'), ('58', '7.3 มีพื้นที่เก็บเครื่องมือ เช่น เครื่องเอกซเรย์ชนิดเคลื่อนที่  เครื่องมือ/อุปกรณ์ในการถ่ายภาพรังสี  เครื่องมือ/อุปกรณ์ทำการควบคุมคุณภาพ เป็นต้น', 'แยกส่วนจากห้องถ่ายภาพทางรังสี', '7'), ('59', '7.4 มีพื้นที่เก็บภาพถ่ายทางรังสีของผู้ป่วย', '- แยกส่วนจากห้องถ่ายภาพทางรังสี\r\n- ป้องกันการเข้าถึงของผู้ไม่มีสิทธิ์\r\n', '7'), ('60', '7.5 มีพื้นที่ทำความสะอาดเครื่องมือ/อุปกรณ์ ตรวจพิเศษทางรังสี', 'แยกส่วนจากพื้นที่อื่นๆ', '7'), ('61', '7.6 มีพื้นที่พักเจ้าหน้าที่', 'แยกส่วนจากห้องถ่ายภาพทางรังสี', '7'), ('62', '7.7 มีพื้นที่เตรียมสารเปรียบต่าง', 'แยกส่วนจากห้องถ่ายภาพทางรังสี', '7'), ('63', '8. มีห้องถ่ายภาพรังสี ที่มีกำแพงทุกด้านสามารถป้องกันรังสีได้ในระดับที่ปลอดภัย', '- มีการแบ่งพื้นที่ควบคุม และพื้นที่ทั่วไปอย่าง  \r\n  ชัดเจน\r\n- มีการแสดงปริมาณรังสีเพื่อเตือนให้บุคคลทั่วไป \r\n  ได้รับทราบ\r\n', '7'), ('64', '9. มีห้องล้างฟิล์ม ที่แยกส่วนจากห้องถ่ายภาพทางรังสี', 'มีระบบระบายอากาศที่ดี', '7'), ('65', '  10.1 ผนังกั้นจุดควบคุมการฉายรังสี (Control booth)\r\n อยู่ในตำแหน่งที่เหมาะสม และสามารถป้องกันรังสีได้ในระดับที่ปลอดภัย\r\n มีช่องมองผู้ป่วยที่สามารถมองเห็นผู้ป่วยได้ชัดเจน และสามารถกันรังสีได้', 'มีพื้นที่ว่างเพียงพอ เพื่อให้ผู้ป่วยพร้อมอุปกรณ์สามารถหมุนรอบได้สะดวก และมีไฟแสงสว่างที่ให้แสงสว่างอย่างน้อย 2 จุด ได้แก่ แสงสว่างในพื้นที่ควบคุมการฉายรังสี  (Control booth) และแสงสว่างภายในห้อง ซึ่งผู้ปฏิบัติงานสามารถปิด-เปิดได้สะดวกขณะปฏิบัติงาน', '7'), ('66', '  10.3 ประตูเข้าออกห้องตรวจทางรังสีต้องมีขนาดกว้างเพียงพอ ให้ผู้ป่วยพร้อมอุปกรณ์ช่วยเหลือ เช่น รถนั่ง เปล สามารถผ่านเข้าออกได้สะดวก สามารถกันรังสีได้ในระดับที่ปลอดภัย\r\n- เปิด-ปิด ได้สะดวก\r\n', 'มีขนาดกว้างไม่น้อยกว่า 1.50 เมตร', '7'), ('67', '11. มีป้ายสัญลักษณ์ต่างๆ ที่จำเป็น ได้แก่', '', '7');
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
  `block` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Records of `user`
-- ----------------------------
BEGIN;
INSERT INTO `user` VALUES ('1', 'admin', 'nXgbCcT6L-4AGDYOClSQX9kVXp7KbolX', '$2y$13$IjcI6H2yigD34hqUJjRbdOSw/cW5gRP4Yih6XcmtjC9hemVgsjE8a', null, 'dixonsatit@gmail.com', '10', '1439025199', '1439116396', '0', null), ('2', 'user1', 'Y3DQpQd7nJD4O65GFurNU17DZjOdY37z', '$2y$13$LmbURyL6kRjfdn7f4Eka.euLS7A4ME1OQT1ltADx5p8EI.CE9blZa', null, 'user1@gmail.com', '10', '1439093810', '1439375580', '1', null), ('3', 'user2', 'qBaC5vm9YcZB-GL3C4TM8ZdvDuaRYGwK', '$2y$13$qFUeQvCji99kXwk298J9FulCZRrke09WHRupNOW7ScxevxhW5h2Ke', null, 'user2@gmail.com', '10', '1439095375', '1439226877', '2', null), ('4', 'user3', '4mqGrU0ac1Yj9CA1FqKQ0Eaa7-Fcg9PU', '$2y$13$q0xpkPXJTxax3A3yRlsPi.k6T769OsYgEdcFFSMab/SfnN5cNdWaq', null, 'user3@gmail.com', '10', '1439363501', '1439363501', '1', null), ('5', 'manage', 'MS8qWKI1HBFNamMc2SXqqn3SIH7V7yxT', '$2y$13$Bt3TJKoYGos5ujYAskdVVOCOLmDpGoG.7AYEnxIZzrrwbzE0XrvZu', null, 'manage@gmail.com', '0', '1439377050', '1439569296', '0', null);
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
