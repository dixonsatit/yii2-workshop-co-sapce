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

 Date: 08/12/2015 21:56:06 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

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

SET FOREIGN_KEY_CHECKS = 1;
