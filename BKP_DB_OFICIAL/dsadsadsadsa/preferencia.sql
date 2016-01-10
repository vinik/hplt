-- phpMyAdmin SQL Dump
-- version 2.6.2-pl1
-- http://www.phpmyadmin.net
-- 
-- M�quina: ldbpwb1.procempa.com.br
-- Data de Cria��o: 06-Jan-2016 �s 19:50
-- Vers�o do servidor: 4.0.24
-- vers�o do PHP: 4.3.10-16
-- 
-- Base de Dados: `hpilatesbd`
-- 

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `preferencia`
-- 

CREATE TABLE `preferencia` (
  `id` int(11) NOT NULL auto_increment,
  `id_usuario` int(11) NOT NULL default '0',
  `tema` varchar(64) default NULL,
  PRIMARY KEY  (`id`),
  KEY `preferencia_usuario` (`id_usuario`)
) AUTO_INCREMENT=1 ;

-- 
-- Extraindo dados da tabela `preferencia`
-- 


-- 
-- Constraints for dumped tables
-- 

-- 
-- Limitadores para a tabela `preferencia`
-- 
ALTER TABLE `preferencia`
  ADD CONSTRAINT `preferencia_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
