/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50624
Source Host           : localhost:3306
Source Database       : hpilates2

Target Server Type    : MYSQL
Target Server Version : 50624
File Encoding         : 65001

Date: 2016-03-14 22:04:11
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of estudio
-- ----------------------------
INSERT INTO `estudio` VALUES ('1', 'Bela Vista', 'Lucas de Oliveira, 1081', '99037275', '2015-12-10 11:38:41', 's', null);
INSERT INTO `estudio` VALUES ('3', 'GRAMADO Vale do Quilombo', 'Av. das Hortências, 2676 - sala 01 Gramado', '54-81424620', '2015-09-01 23:38:05', 'n', null);
INSERT INTO `estudio` VALUES ('4', 'Chácara das Pedras', 'Rua João Paetzel, 915', '93306654 33349758', '2015-09-01 23:38:11', 'n', null);
INSERT INTO `estudio` VALUES ('5', 'GRAMADO São Pedro', 'Rua São Pedro, 501/ sala 301 Gramado RS', '54-81424620', '2015-09-01 23:38:13', 'n', null);
INSERT INTO `estudio` VALUES ('6', 'Las Dunas', 'Av. paraguassu, xangri-lá', '', '2015-09-01 23:38:18', 'n', null);
INSERT INTO `estudio` VALUES ('7', 'Anita', 'Rua Anita Garibaldi, 2120 Porto Alegre, RS', '', '2013-08-01 23:57:03', 'n', null);
INSERT INTO `estudio` VALUES ('8', 'Petropolis', 'Rua Alegrete, 460', '51-91499146', '0000-00-00 00:00:00', 'n', null);
INSERT INTO `estudio` VALUES ('9', 'saddada', 'asdasd', 'asdasdas', '2015-09-01 23:50:17', 's', null);
INSERT INTO `estudio` VALUES ('10', 'dsadasdsa', 'dsadsadasd', 'asdsadsadsa', '2015-09-07 02:37:16', 's', null);
INSERT INTO `estudio` VALUES ('11', 'Teste Estudio', 'Teste Estudio', 'Teste Estudio', '0000-00-00 00:00:00', 'n', null);
