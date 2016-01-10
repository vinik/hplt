-- phpMyAdmin SQL Dump
-- version 2.6.2-pl1
-- http://www.phpmyadmin.net
-- 
-- Máquina: ldbpwb1.procempa.com.br
-- Data de Criação: 06-Jan-2016 às 19:50
-- Versão do servidor: 4.0.24
-- versão do PHP: 4.3.10-16
-- 
-- Base de Dados: `hpilatesbd`
-- 

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `professor`
-- 

CREATE TABLE `professor` (
  `id` int(11) NOT NULL auto_increment,
  `endereco` varchar(128) default NULL,
  `telefone` varchar(32) default NULL,
  `cdate` timestamp(0) NOT NULL,
  `id_usuario` int(11) NOT NULL default '0',
  `deleted` enum('s','n') NOT NULL default 'n',
  PRIMARY KEY  (`id`),
  KEY `professor_usuario` (`id_usuario`)
) AUTO_INCREMENT=16 ;

-- 
-- Extraindo dados da tabela `professor`
-- 

INSERT INTO `professor` VALUES (1, 'rua itaborai, 220 Porto Alegre', '99037275', '20101110185214', 5, 'n');
INSERT INTO `professor` VALUES (2, '', '5481424620', '20100113142342', 8, 'n');
INSERT INTO `professor` VALUES (5, '', '92549090', '20100113142623', 11, 'n');
INSERT INTO `professor` VALUES (6, 'lucas de oliveira, 1853 / 401', '91449146 - 33334299', '20100521135100', 56, 'n');
INSERT INTO `professor` VALUES (7, '', '', '20101023172119', 135, 'n');
INSERT INTO `professor` VALUES (8, '', '', '20101026150615', 136, 's');
INSERT INTO `professor` VALUES (9, 'uahiauh', '054 96196498', '20101026150609', 137, 'n');
INSERT INTO `professor` VALUES (10, 'Rua Buenos Aires, Porto Alegre, RS', '94737022', '20130802000033', 250, 'n');
INSERT INTO `professor` VALUES (11, 'Rua Buenos Aires,', '94737022', '20130802000000', 251, 's');
INSERT INTO `professor` VALUES (12, 'Rua Buenos Aires,', '94737022', '20130801235958', 252, 's');
INSERT INTO `professor` VALUES (13, 'Rua Buenos Aires,', '94737022', '20130801235955', 253, 's');
INSERT INTO `professor` VALUES (14, 'Rua Domingos Seguesio, 95 / 149', '91799735', '20151125155404', 574, 'n');
INSERT INTO `professor` VALUES (15, 'Rua Marechal Floriano, 524 / 31 - caxias do sul, rs', '54-99353767', '20160106154411', 576, 'n');

-- 
-- Constraints for dumped tables
-- 

-- 
-- Limitadores para a tabela `professor`
-- 
ALTER TABLE `professor`
  ADD CONSTRAINT `professor_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
