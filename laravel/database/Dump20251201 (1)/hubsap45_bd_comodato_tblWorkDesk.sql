-- MySQL dump 10.13  Distrib 8.0.42, for Win64 (x86_64)
--
-- Host: br612.hostgator.com.br    Database: hubsap45_bd_comodato
-- ------------------------------------------------------
-- Server version	5.7.23-23

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tblWorkDesk`
--

DROP TABLE IF EXISTS `tblWorkDesk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblWorkDesk` (
  `idWorkDesk` int(11) NOT NULL AUTO_INCREMENT,
  `idUsuario` int(11) DEFAULT NULL,
  `idModulo` int(11) DEFAULT NULL,
  `wrkAcesso` tinyint(4) DEFAULT NULL,
  `wrkSalvar` tinyint(4) DEFAULT NULL,
  `wrkImprimir` tinyint(4) DEFAULT NULL,
  `wrkDeletar` tinyint(4) DEFAULT NULL,
  `wrkEditar` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`idWorkDesk`),
  KEY `FK_USUARIO_idx` (`idUsuario`),
  KEY `fk_modulos_permissao_idx` (`idModulo`),
  CONSTRAINT `fk_modulos_permissao` FOREIGN KEY (`idModulo`) REFERENCES `tblModulos` (`idModulo`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_usuario_permissao` FOREIGN KEY (`idUsuario`) REFERENCES `tblUsuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=131 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblWorkDesk`
--

LOCK TABLES `tblWorkDesk` WRITE;
/*!40000 ALTER TABLE `tblWorkDesk` DISABLE KEYS */;
INSERT INTO `tblWorkDesk` VALUES (45,1,1,1,1,1,1,1),(46,1,2,1,1,1,1,1),(47,1,3,1,1,1,1,1),(48,1,4,1,1,1,1,1),(49,1,5,1,1,1,1,1),(50,1,6,1,1,1,1,1),(51,1,7,1,1,1,1,1),(52,1,8,1,1,1,1,1),(53,2,1,1,1,1,1,1),(54,2,2,1,1,1,1,1),(55,2,3,1,1,1,1,1),(56,2,4,1,1,1,1,1),(57,2,5,1,1,1,1,1),(58,2,6,1,1,1,1,1),(59,2,7,1,1,1,1,1),(60,2,8,1,1,1,1,1),(61,3,1,1,1,1,1,1),(62,3,2,1,1,1,1,1),(63,3,3,1,1,1,1,1),(64,3,4,1,1,1,1,1),(65,3,5,1,1,1,1,1),(66,3,6,1,1,1,1,1),(67,3,7,1,1,1,1,1),(68,3,8,1,1,1,1,1),(69,4,1,1,1,1,1,1),(70,4,2,1,1,1,1,1),(71,4,3,1,1,1,1,1),(72,4,4,1,1,1,1,1),(73,4,5,1,1,1,1,1),(74,4,6,1,1,1,1,1),(75,4,7,1,1,1,1,1),(76,4,8,1,1,1,1,1),(77,1,9,1,1,1,1,1),(78,1,11,1,1,1,1,1),(80,2,11,1,1,1,1,1),(81,3,11,1,1,1,1,1),(82,4,11,1,1,1,1,1),(83,5,11,1,1,1,1,1),(84,6,11,1,1,1,1,1),(85,7,11,1,1,1,1,1),(86,8,11,1,1,1,1,1),(87,9,11,1,1,1,1,1),(88,10,11,1,1,1,1,1),(89,11,11,1,1,1,1,1),(90,12,11,1,1,1,1,1),(91,13,11,1,1,1,1,1),(92,14,11,1,1,1,1,1),(93,15,11,1,1,1,1,1),(94,16,11,1,1,1,1,1),(95,17,11,1,1,1,1,1),(96,18,11,1,1,1,1,1),(97,19,11,1,1,1,1,1),(98,20,11,1,1,1,1,1),(99,21,11,1,1,1,1,1),(100,22,11,1,1,1,1,1),(101,23,11,1,1,1,1,1),(102,24,11,1,1,1,1,1),(103,25,11,1,1,1,1,1),(104,26,11,1,1,1,1,1),(105,27,11,1,1,1,1,1),(106,28,11,1,1,1,1,1),(107,29,11,1,1,1,1,1),(108,30,11,1,1,1,1,1),(109,31,11,1,1,1,1,1),(110,32,11,1,1,1,1,1),(111,33,11,1,1,1,1,1),(112,34,11,1,1,1,1,1),(113,35,11,1,1,1,1,1),(114,36,11,1,1,1,1,1),(115,37,11,1,1,1,1,1),(116,38,11,1,1,1,1,1),(117,39,11,1,1,1,1,1),(118,40,11,1,1,1,1,1),(119,41,11,1,1,1,1,1),(120,42,11,1,1,1,1,1),(121,43,11,1,1,1,1,1),(122,44,11,1,1,1,1,1),(123,45,11,1,1,1,1,1),(124,46,11,1,1,1,1,1),(125,47,11,1,1,1,1,1),(126,48,11,1,1,1,1,1),(127,49,11,1,1,1,1,1),(128,50,11,1,1,1,1,1),(129,51,11,1,1,1,1,1),(130,52,11,1,1,1,1,1);
/*!40000 ALTER TABLE `tblWorkDesk` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-12-01 14:49:34
