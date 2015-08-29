/*
Navicat MySQL Data Transfer

Source Server         : Localhost
Source Server Version : 50624
Source Host           : localhost:3306
Source Database       : hpilates2

Target Server Type    : MYSQL
Target Server Version : 50624
File Encoding         : 65001

Date: 2015-08-29 03:59:46
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `professor_estudio_xref`
-- ----------------------------
DROP TABLE IF EXISTS `professor_estudio_xref`;
CREATE TABLE `professor_estudio_xref` (
  `id_professor` int(11) NOT NULL DEFAULT '0',
  `id_estudio` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_professor`,`id_estudio`),
  KEY `fk_professor_estudio_xref_estudio` (`id_estudio`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of professor_estudio_xref
-- ----------------------------
INSERT INTO `professor_estudio_xref` VALUES ('1', '1');
INSERT INTO `professor_estudio_xref` VALUES ('1', '3');
INSERT INTO `professor_estudio_xref` VALUES ('1', '4');
INSERT INTO `professor_estudio_xref` VALUES ('1', '5');
INSERT INTO `professor_estudio_xref` VALUES ('2', '3');
INSERT INTO `professor_estudio_xref` VALUES ('2', '5');
INSERT INTO `professor_estudio_xref` VALUES ('6', '8');
INSERT INTO `professor_estudio_xref` VALUES ('7', '5');
INSERT INTO `professor_estudio_xref` VALUES ('8', '5');
INSERT INTO `professor_estudio_xref` VALUES ('9', '5');
INSERT INTO `professor_estudio_xref` VALUES ('10', '7');
INSERT INTO `professor_estudio_xref` VALUES ('11', '7');
INSERT INTO `professor_estudio_xref` VALUES ('12', '7');
INSERT INTO `professor_estudio_xref` VALUES ('13', '7');
