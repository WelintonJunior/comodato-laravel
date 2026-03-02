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
-- Table structure for table `tblRecuperaSenha`
--

DROP TABLE IF EXISTS `tblRecuperaSenha`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblRecuperaSenha` (
  `idRecupera` int(11) NOT NULL AUTO_INCREMENT,
  `recData` datetime DEFAULT NULL,
  `recLink` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `recAtivo` char(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`idRecupera`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblRecuperaSenha`
--

LOCK TABLES `tblRecuperaSenha` WRITE;
/*!40000 ALTER TABLE `tblRecuperaSenha` DISABLE KEYS */;
INSERT INTO `tblRecuperaSenha` VALUES (1,'0000-00-00 00:00:00','www.comodatohub.com.br/frm_recuperasenha_main.php?id=90665383',''),(2,'0000-00-00 00:00:00','www.comodatohub.com.br/frm_recuperasenha_main.php?id=68903982',''),(3,'0000-00-00 00:00:00','www.comodatohub.com.br/frm_recuperasenha_main.php?id=49920396','S'),(4,'0000-00-00 00:00:00','www.comodatohub.com.br/frm_recuperasenha_main.php?id=62119959','S'),(5,'0000-00-00 00:00:00','www.comodatohub.com.br/frm_recuperasenha_main.php?id=61652699','S'),(6,'0000-00-00 00:00:00','www.comodatohub.com.br/frm_recuperasenha_main.php?id=90665383',''),(7,'0000-00-00 00:00:00','www.comodatohub.com.br/frm_recuperasenha_main.php?id=68903982',''),(8,'0000-00-00 00:00:00','www.comodatohub.com.br/frm_recuperasenha_main.php?id=49920396','S'),(9,'0000-00-00 00:00:00','www.comodatohub.com.br/frm_recuperasenha_main.php?id=62119959','S'),(10,'0000-00-00 00:00:00','www.comodatohub.com.br/frm_recuperasenha_main.php?id=61652699','S');
/*!40000 ALTER TABLE `tblRecuperaSenha` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-12-01 14:50:41
