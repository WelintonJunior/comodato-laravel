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
-- Table structure for table `tblPedido`
--

DROP TABLE IF EXISTS `tblPedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblPedido` (
  `idPedido` int(11) NOT NULL AUTO_INCREMENT,
  `pedData` date NOT NULL,
  `pedIdVendedor` int(11) NOT NULL,
  `pedSorteio` int(11) NOT NULL,
  `pedHoraAbertura` time NOT NULL,
  `pedHoraFechamento` time NOT NULL,
  `pedTotalVenda` decimal(20,2) NOT NULL,
  `pedIdUsuario` int(11) NOT NULL,
  `pedEncerrado` date NOT NULL,
  `pedIdNucleo` int(11) DEFAULT NULL,
  `pedExecutado` char(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`idPedido`),
  KEY `fk_vendedor_pedido_idx` (`pedIdVendedor`),
  CONSTRAINT `fk_vendedor_pedido` FOREIGN KEY (`pedIdVendedor`) REFERENCES `tblVendedores` (`idVendedor`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblPedido`
--

LOCK TABLES `tblPedido` WRITE;
/*!40000 ALTER TABLE `tblPedido` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblPedido` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-12-01 14:49:27
