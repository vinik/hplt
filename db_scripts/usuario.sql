-- MySQL dump 10.13  Distrib 5.1.41, for debian-linux-gnu (i486)
--
-- Host: localhost    Database: hpilates2
-- ------------------------------------------------------
-- Server version	5.1.41-3ubuntu12

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `email` varchar(128) NOT NULL,
  `senha` varchar(128) NOT NULL,
  `nome` varchar(64) DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `cdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `nivel` int(11) NOT NULL DEFAULT '3',
  `avatar` blob,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'vinik','vinicius.kirst@gmail.com','1234','Vinicius','1981-07-31','2009-12-28 05:48:46',1,NULL),(2,'marc','healthpilates@terra.com.br','1234','Marc','1982-09-20','2009-12-16 22:58:58',1,NULL),(4,'aluno1','aluno1@email.com','1234','Aluno2','1964-12-18','2010-04-29 06:08:50',0,NULL),(5,'0','professor1@hpilates.com','0','Marc henri','1982-09-20','2010-01-13 14:25:22',0,NULL),(6,'','','12345','José da Silva','1982-01-09','2010-01-07 04:28:43',0,NULL),(7,'','mhaetinger@hotmail.com','','Marc henri','1982-09-20','2010-01-13 14:16:38',3,NULL),(8,'0','','0','Lia Begnini Vidal','1980-12-19','2010-01-20 11:22:00',0,NULL),(9,'0','tataspinelli@gmail.com','0','Thais Spinelli','1981-11-19','2010-01-13 14:24:37',2,NULL),(10,'0','','0','Fernanda Alves','0000-00-00','2010-01-13 14:25:40',2,NULL),(11,'0','','0','Fernanda Alves','1970-10-10','2010-01-13 14:26:23',2,NULL),(12,'lia','liaeaugusto@terra.com.br','isabela','Lia Begnini Vidal','0000-00-00','2010-01-20 11:27:56',2,NULL),(13,'0','kurt@nirvana.com','0','Kurt Cobain','1980-01-31','2010-05-14 01:27:20',3,NULL),(14,'0','aluno1@teste.com.br','0','Aluno teste com\'aspa','1977-11-20','2010-05-18 20:18:30',3,NULL);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2010-05-19 19:02:38
