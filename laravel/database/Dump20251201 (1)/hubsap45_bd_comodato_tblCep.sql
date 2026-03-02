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
-- Table structure for table `tblCep`
--

DROP TABLE IF EXISTS `tblCep`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblCep` (
  `idCep` int(8) NOT NULL AUTO_INCREMENT,
  `cepBairro` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `cepEndereco` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cep` int(11) DEFAULT NULL,
  `cepCidade` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cepUf` char(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`idCep`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblCep`
--

LOCK TABLES `tblCep` WRITE;
/*!40000 ALTER TABLE `tblCep` DISABLE KEYS */;
INSERT INTO `tblCep` VALUES (1,'Residencial Califórnia','Rua Percival Cozza',12525618,'Potim','SP'),(2,'Residencial Califórnia','Rua Percival Cozza',12525618,'Potim','SP'),(3,'','',0,'',''),(4,'0000000000000','000000000000000000000000000000000000000000000000000000000000000000000000000000000000000',0,'',''),(5,'00000000000000000000000000000','000000000000000000000000000000000000000000000000000000000',0,'00000000000000000000000000000000000000000000000000','00'),(6,'','',0,'',''),(7,'','',0,'',''),(8,'','',0,'',''),(9,'','',0,'',''),(10,'','',0,'',''),(11,'','',0,'',''),(12,'','',0,'',''),(13,'','',0,'',''),(14,'','',0,'',''),(15,'','',0,'',''),(16,'','',0,'',''),(17,'','',0,'',''),(18,'','',0,'',''),(19,'','',0,'',''),(20,'','',0,'',''),(21,'','',0,'',''),(22,'','',0,'',''),(23,'','',0,'',''),(24,'','',0,'',''),(25,'','',0,'',''),(26,'','',0,'',''),(27,'','',0,'',''),(28,'','',0,'',''),(29,'','',0,'',''),(30,'','',0,'',''),(31,'','',0,'',''),(32,'','',0,'',''),(33,'','',0,'',''),(34,'','',0,'',''),(35,'','',0,'',''),(36,'','',0,'',''),(37,'','',0,'',''),(38,'','',0,'',''),(39,'','',0,'',''),(40,'','',0,'',''),(41,'','',0,'',''),(42,'','',0,'',''),(43,'','',0,'',''),(44,'','',0,'',''),(45,'','',0,'',''),(46,'','',0,'',''),(47,'','',0,'',''),(48,'','',0,'',''),(49,'Residencial Califórnia','Rua Percival Cozza',12525618,'Potim','SP');
/*!40000 ALTER TABLE `tblCep` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-12-01 14:51:12
