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
-- Estrutura da tabela `professor_estudio_xref`
-- 

CREATE TABLE `professor_estudio_xref` (
  `id_professor` int(11) NOT NULL default '0',
  `id_estudio` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id_professor`,`id_estudio`),
  KEY `fk_professor_estudio_xref_estudio` (`id_estudio`)
) ;

-- 
-- Extraindo dados da tabela `professor_estudio_xref`
-- 

INSERT INTO `professor_estudio_xref` VALUES (1, 1);
INSERT INTO `professor_estudio_xref` VALUES (2, 3);
INSERT INTO `professor_estudio_xref` VALUES (2, 5);
INSERT INTO `professor_estudio_xref` VALUES (6, 8);
INSERT INTO `professor_estudio_xref` VALUES (7, 5);
INSERT INTO `professor_estudio_xref` VALUES (8, 5);
INSERT INTO `professor_estudio_xref` VALUES (9, 5);
INSERT INTO `professor_estudio_xref` VALUES (10, 7);
INSERT INTO `professor_estudio_xref` VALUES (10, 9);
INSERT INTO `professor_estudio_xref` VALUES (11, 7);
INSERT INTO `professor_estudio_xref` VALUES (12, 7);
INSERT INTO `professor_estudio_xref` VALUES (13, 7);
INSERT INTO `professor_estudio_xref` VALUES (14, 9);
INSERT INTO `professor_estudio_xref` VALUES (15, 10);
