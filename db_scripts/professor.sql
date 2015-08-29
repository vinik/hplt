/*
Navicat MySQL Data Transfer

Source Server         : Localhost
Source Server Version : 50624
Source Host           : localhost:3306
Source Database       : hpilates2

Target Server Type    : MYSQL
Target Server Version : 50624
File Encoding         : 65001

Date: 2015-08-29 03:59:42
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `professor`
-- ----------------------------
DROP TABLE IF EXISTS `professor`;
CREATE TABLE `professor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `endereco` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefone` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_usuario` int(11) NOT NULL DEFAULT '0',
  `deleted` enum('s','n') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'n',
  PRIMARY KEY (`id`),
  KEY `professor_usuario` (`id_usuario`),
  CONSTRAINT `professor_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of professor
-- ----------------------------
INSERT INTO `professor` VALUES ('1', 'rua itaborai, 220 Porto Alegre', '99037275', '2010-11-10 18:52:14', '5', 'n');
INSERT INTO `professor` VALUES ('2', '', '5481424620', '2010-01-13 14:23:42', '8', 'n');
INSERT INTO `professor` VALUES ('5', '', '92549090', '2010-01-13 14:26:23', '11', 'n');
INSERT INTO `professor` VALUES ('6', 'lucas de oliveira, 1853 / 401', '91449146 - 33334299', '2010-05-21 13:51:00', '56', 'n');
INSERT INTO `professor` VALUES ('7', '', '', '2010-10-23 17:21:19', '135', 'n');
INSERT INTO `professor` VALUES ('8', '', '', '2010-10-26 15:06:15', '136', 's');
INSERT INTO `professor` VALUES ('9', 'uahiauh', '054 96196498', '2010-10-26 15:06:09', '137', 'n');
INSERT INTO `professor` VALUES ('10', 'Rua Buenos Aires, Porto Alegre, RS', '94737022', '2013-08-02 00:00:33', '250', 'n');
INSERT INTO `professor` VALUES ('11', 'Rua Buenos Aires,', '94737022', '2013-08-02 00:00:00', '251', 's');
INSERT INTO `professor` VALUES ('12', 'Rua Buenos Aires,', '94737022', '2013-08-01 23:59:58', '252', 's');
INSERT INTO `professor` VALUES ('13', 'Rua Buenos Aires,', '94737022', '2013-08-01 23:59:55', '253', 's');
