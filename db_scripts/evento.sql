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
-- Table structure for table `evento`
--

DROP TABLE IF EXISTS `evento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `evento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_aluno1` int(11) NOT NULL,
  `id_aluno2` int(11) DEFAULT NULL,
  `inicio` date NOT NULL,
  `fim` date DEFAULT NULL,
  `iddiainteiro` enum('s','n') NOT NULL DEFAULT 'n',
  `iddupla` enum('s','n') NOT NULL,
  `idrepeticao` enum('s','n') NOT NULL DEFAULT 'n',
  `repeticaofim` date DEFAULT NULL,
  `id_estudio` int(11) NOT NULL,
  `id_professor` int(11) NOT NULL,
  `hora_inicio` time DEFAULT NULL,
  `hora_fim` time DEFAULT NULL,
  `id_tiporepeticao` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_evento_aluno1` (`id_aluno1`),
  KEY `fk_evento_aluno2` (`id_aluno2`),
  KEY `fk_evento_estudio` (`id_estudio`),
  CONSTRAINT `fk_evento_aluno1` FOREIGN KEY (`id_aluno1`) REFERENCES `aluno` (`id`),
  CONSTRAINT `fk_evento_aluno2` FOREIGN KEY (`id_aluno2`) REFERENCES `aluno` (`id`),
  CONSTRAINT `fk_evento_professor` FOREIGN KEY (`id_professor`) REFERENCES `professor` (`id`),
  CONSTRAINT `fk_evento_estudio` FOREIGN KEY (`id_estudio`) REFERENCES `estudio` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evento`
--

LOCK TABLES `evento` WRITE;
/*!40000 ALTER TABLE `evento` DISABLE KEYS */;
INSERT INTO `evento` VALUES (10,1,NULL,'2010-03-30','2010-03-30','s','s','','0000-00-00',1,'08:00:00','09:00:00',2),(11,2,NULL,'2010-03-31','2010-03-31','','','s','0000-00-00',1,'08:00:00','09:00:00',2),(12,1,NULL,'2010-04-07','2010-04-07','s','s','','0000-00-00',1,'08:00:00','09:00:00',2),(13,5,NULL,'2010-05-17','2010-05-17','s','','s','0000-00-00',1,'08:00:00','09:00:00',2);
/*!40000 ALTER TABLE `evento` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2010-05-19 19:01:26
