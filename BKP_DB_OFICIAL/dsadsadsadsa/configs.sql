-- phpMyAdmin SQL Dump
-- version 2.6.2-pl1
-- http://www.phpmyadmin.net
-- 
-- Máquina: ldbpwb1.procempa.com.br
-- Data de Criação: 06-Jan-2016 às 19:49
-- Versão do servidor: 4.0.24
-- versão do PHP: 4.3.10-16
-- 
-- Base de Dados: `hpilatesbd`
-- 

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `configs`
-- 

CREATE TABLE `configs` (
  `id` int(11) NOT NULL auto_increment,
  `nome` varchar(128) NOT NULL default '',
  `tipo` int(2) default NULL,
  `valor` text,
  `cdate` timestamp(14) NOT NULL,
  `ordem` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=5 ;

-- 
-- Extraindo dados da tabela `configs`
-- 

INSERT INTO `configs` VALUES (1, 'inicio_expediente', 1, '07:00', '20130801235236', 1);
INSERT INTO `configs` VALUES (2, 'intervalo_campo_horas', 2, '30', '20140310222824', 2);
INSERT INTO `configs` VALUES (3, 'valor_padrao_aula', 3, '60', '20160106111108', 3);
INSERT INTO `configs` VALUES (4, 'valor_padrao_aula_dupla', 4, '50', '20160106111108', 4);
