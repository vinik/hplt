CREATE TABLE `configs` (
  `id` int(11) NOT NULL auto_increment,
  `nome` varchar(128) NOT NULL,
  `tipo` int(2) default NULL,
  `valor` text default NULL,
  `cdate` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1

