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
-- Table structure for table `tblModulos`
--

DROP TABLE IF EXISTS `tblModulos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblModulos` (
  `idModulo` int(11) NOT NULL AUTO_INCREMENT,
  `modNome` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modAtivo` char(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`idModulo`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblModulos`
--

LOCK TABLES `tblModulos` WRITE;
/*!40000 ALTER TABLE `tblModulos` DISABLE KEYS */;
INSERT INTO `tblModulos` VALUES (1,'frm_movimento_main','1'),(2,'frm_sorteio_main','1'),(3,'frm_vendedor_CRUD','1'),(4,'frm_produto_CRUD','1'),(5,'frm_pdv_CRUD','1'),(6,'frm_fornecedor_CRUD','1'),(7,'frm_entradas_CRUD','1'),(8,'frm_dashboard_main','1'),(9,'frm_maquineta_CRUD','1'),(10,'frm_pedidoVendedor_CRUD','1'),(11,'frm_vendedor_main','1');
/*!40000 ALTER TABLE `tblModulos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-12-01 14:49:39
