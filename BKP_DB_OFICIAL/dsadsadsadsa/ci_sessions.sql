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
-- Estrutura da tabela `ci_sessions`
-- 

CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL default '0',
  `ip_address` varchar(16) NOT NULL default '0',
  `user_agent` varchar(50) NOT NULL default '',
  `last_activity` int(10) unsigned NOT NULL default '0',
  `user_data` text NOT NULL,
  PRIMARY KEY  (`session_id`)
) ;

-- 
-- Extraindo dados da tabela `ci_sessions`
-- 

INSERT INTO `ci_sessions` VALUES ('800e4a6561dc96a0f7f9948aa76e7e02', '66.102.8.221', 'Mozilla/5.0 (Linux; Android 5.0.1; GT-I9515L Build', 1452098677, 'a:1:{s:14:"flash:old:erro";s:29:"VocÃª precisa realizar login.";}');
INSERT INTO `ci_sessions` VALUES ('3e56c9c5544d6bf4628b01c9d58c4e90', '179.219.105.113', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/53', 1452104289, 'a:1:{s:14:"flash:old:erro";s:29:"VocÃª precisa realizar login.";}');
