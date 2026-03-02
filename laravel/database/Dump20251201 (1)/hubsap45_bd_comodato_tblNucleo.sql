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
-- Table structure for table `tblNucleo`
--

DROP TABLE IF EXISTS `tblNucleo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblNucleo` (
  `idNucleo` int(11) NOT NULL AUTO_INCREMENT,
  `nucRazaoSocial` varchar(70) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nucFantasia` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nucIE` char(16) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nucCNPJ` char(16) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nucEndereco` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nucNumero` char(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nucCep` int(11) DEFAULT NULL,
  `nucTelefone` char(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nucEmail` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nucSuspenso` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`idNucleo`),
  KEY `fk_cep_nucleo_idx` (`nucCep`),
  CONSTRAINT `fk_cep_nucleo` FOREIGN KEY (`nucCep`) REFERENCES `tblCep` (`idCep`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblNucleo`
--

LOCK TABLES `tblNucleo` WRITE;
/*!40000 ALTER TABLE `tblNucleo` DISABLE KEYS */;
INSERT INTO `tblNucleo` VALUES (1,'Jose Eiti Koyama','JEK - Invest -Pátio Basilica Nacional','1122222222222222','29056078/0001-00','Patio do Santuário Nacional Setor A','12345',1,'12991777777','sintecplan@gmail.com',0);
/*!40000 ALTER TABLE `tblNucleo` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-12-01 14:51:07
