/*
Navicat MySQL Data Transfer

Source Server         : Localhost
Source Server Version : 50624
Source Host           : localhost:3306
Source Database       : hpilates2

Target Server Type    : MYSQL
Target Server Version : 50624
File Encoding         : 65001

Date: 2015-08-29 03:59:22
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `estudio`
-- ----------------------------
DROP TABLE IF EXISTS `estudio`;
CREATE TABLE `estudio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(128) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `endereco` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefone` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted` enum('s','n') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'n',
  `foto` blob,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of estudio
-- ----------------------------
INSERT INTO `estudio` VALUES ('1', 'Bela Vista', 'Lucas de Oliveira, 1081', '99037275', '2010-01-20 11:22:36', 'n', null);
INSERT INTO `estudio` VALUES ('3', 'GRAMADO Vale do Quilombo', 'Av. das HortÃªncias, 2676 - sala 01 Gramado', '54-81424620', '2010-11-10 18:44:43', 'n', null);
INSERT INTO `estudio` VALUES ('4', 'ChÃ¡cara das Pedras', 'Rua JoÃ£o Paetzel, 915', '93306654 33349758', '2010-11-10 18:40:06', 'n', null);
INSERT INTO `estudio` VALUES ('5', 'GRAMADO SÃ£o Pedro', 'Rua SÃ£o Pedro, 501/ sala 301 Gramado RS', '54-81424620', '2010-11-10 18:45:39', 'n', null);
INSERT INTO `estudio` VALUES ('6', 'Las Dunas', 'Av. paraguassu, xangri-lÃ¡', '', '0000-00-00 00:00:00', 'n', null);
INSERT INTO `estudio` VALUES ('7', 'Anita', 'Rua Anita Garibaldi, 2120 Porto Alegre, RS', '', '2013-08-01 23:57:03', 'n', null);
INSERT INTO `estudio` VALUES ('8', 'Petropolis', 'Rua Alegrete, 460', '51-91499146', '0000-00-00 00:00:00', 'n', null);
