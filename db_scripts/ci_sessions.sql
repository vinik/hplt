/*
Navicat MySQL Data Transfer

Source Server         : Localhost
Source Server Version : 50624
Source Host           : localhost:3306
Source Database       : hpilates2

Target Server Type    : MYSQL
Target Server Version : 50624
File Encoding         : 65001

Date: 2015-08-29 03:59:09
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `ci_sessions`
-- ----------------------------
DROP TABLE IF EXISTS `ci_sessions`;
CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `ip_address` varchar(16) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `user_agent` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=MyISAM AUTO_INCREMENT=519 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of ci_sessions
-- ----------------------------
INSERT INTO `ci_sessions` VALUES ('59ae95028a919a66cf292eb67adbdf77', '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:40.0) G', '1440831458', 'a:10:{s:2:\"id\";s:3:\"553\";s:8:\"username\";s:7:\"eduardo\";s:5:\"email\";s:22:\"eduardo@eduardo.com.br\";s:4:\"nome\";s:9:\"Eduardo K\";s:15:\"data_nascimento\";s:10:\"1981-07-31\";s:5:\"cdate\";s:19:\"2015-08-29 00:16:05\";s:5:\"nivel\";s:1:\"1\";s:6:\"avatar\";s:0:\"\";s:7:\"enabled\";s:1:\"s\";s:9:\"logged_in\";s:1:\"1\";}');
INSERT INTO `ci_sessions` VALUES ('55c00ff88f8e88489d1411a760db620a', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36', '1440827430', 'a:10:{s:2:\"id\";s:3:\"553\";s:8:\"username\";s:7:\"eduardo\";s:5:\"email\";s:22:\"eduardo@eduardo.com.br\";s:4:\"nome\";s:9:\"Eduardo K\";s:15:\"data_nascimento\";s:10:\"1981-07-31\";s:5:\"cdate\";s:19:\"2015-08-29 00:16:05\";s:5:\"nivel\";s:1:\"1\";s:6:\"avatar\";s:0:\"\";s:7:\"enabled\";s:1:\"s\";s:9:\"logged_in\";s:1:\"1\";}');
