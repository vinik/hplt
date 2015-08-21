CREATE TABLE `estudio` (
  `id` int(11) NOT NULL auto_increment,
  `nome` varchar(128) NOT NULL,
  `endereco` varchar(255) default NULL,
  `telefone` varchar(32) default NULL,
  `cdate` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1
