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
-- Table structure for table `tblPDV`
--

DROP TABLE IF EXISTS `tblPDV`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblPDV` (
  `idPDV` int(11) NOT NULL AUTO_INCREMENT,
  `pdvDesignacao` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `pdvLocalFixo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pdvCapacidade` int(2) NOT NULL,
  `pdvSuspenso` tinyint(1) NOT NULL,
  `pdvIdNucleo` int(11) DEFAULT NULL,
  `pdvMotivoSuspenso` blob,
  PRIMARY KEY (`idPDV`),
  KEY `FK_NUCLEO_PDV` (`pdvIdNucleo`),
  CONSTRAINT `FK_NUCLEO_PDV` FOREIGN KEY (`pdvIdNucleo`) REFERENCES `tblNucleo` (`idNucleo`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblPDV`
--

LOCK TABLES `tblPDV` WRITE;
/*!40000 ALTER TABLE `tblPDV` DISABLE KEYS */;
INSERT INTO `tblPDV` VALUES (1,'Rampa Sul','Setor Sul - Rampa de Acesso 1',2,0,1,NULL);
/*!40000 ALTER TABLE `tblPDV` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-12-01 14:49:44
