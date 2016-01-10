-- phpMyAdmin SQL Dump
-- version 2.6.2-pl1
-- http://www.phpmyadmin.net
-- 
-- M·quina: ldbpwb1.procempa.com.br
-- Data de CriaÁ„o: 06-Jan-2016 ‡s 19:49
-- Vers„o do servidor: 4.0.24
-- vers„o do PHP: 4.3.10-16
-- 
-- Base de Dados: `hpilatesbd`
-- 

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `estudio`
-- 

CREATE TABLE `estudio` (
  `id` int(11) NOT NULL auto_increment,
  `nome` varchar(128) NOT NULL default '',
  `endereco` varchar(255) default NULL,
  `telefone` varchar(32) default NULL,
  `cdate` timestamp(14) NOT NULL,
  `deleted` enum('s','n') NOT NULL default 'n',
  `foto` blob,
  PRIMARY KEY  (`id`)
) TYPE=InnoDB AUTO_INCREMENT=11 ;

-- 
-- Extraindo dados da tabela `estudio`
-- 

INSERT INTO `estudio` VALUES (1, 'Bela Vista', 'Lucas de Oliveira, 1081', '99037275', '20100120112236', 'n', NULL);
INSERT INTO `estudio` VALUES (3, 'GRAMADO Vale do Quilombo', 'Av. das Hort√™ncias, 2676 - sala 01 Gramado', '54-81424620', '20101110184443', 'n', NULL);
INSERT INTO `estudio` VALUES (4, 'Ch√°cara das Pedras', 'Rua Jo√£o Paetzel, 915', '93306654 33349758', '20101110184006', 'n', NULL);
INSERT INTO `estudio` VALUES (5, 'GRAMADO S√£o Pedro', 'Rua S√£o Pedro, 501/ sala 301 Gramado RS', '54-81424620', '20101110184539', 'n', NULL);
INSERT INTO `estudio` VALUES (6, 'Las Dunas', 'Av. paraguassu, xangri-l√°', '', '00000000000000', 'n', NULL);
INSERT INTO `estudio` VALUES (7, 'Anita', 'Rua Anita Garibaldi, 2120 Porto Alegre, RS', '', '20130801235703', 'n', NULL);
INSERT INTO `estudio` VALUES (8, 'Petropolis', 'Rua Alegrete, 460', '51-91499146', '00000000000000', 'n', NULL);
INSERT INTO `estudio` VALUES (9, 'Jardim Europa', 'Av. Tulio de Rose, 200', '97562051', '00000000000000', 'n', NULL);
INSERT INTO `estudio` VALUES (10, 'Caxias', 'Rua Pinehiro Machado, 2425 , caxias do sul, rs', '54-99353767', '00000000000000', 'n', NULL);
