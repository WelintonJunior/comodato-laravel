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
-- Table structure for table `tblMovimento`
--

DROP TABLE IF EXISTS `tblMovimento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblMovimento` (
  `idMovimento` int(11) NOT NULL AUTO_INCREMENT,
  `movData` date NOT NULL,
  `movIdVendedor` int(11) NOT NULL,
  `movSorteio` int(11) NOT NULL,
  `movHoraAbertura` time NOT NULL,
  `movHoraFechamento` time NOT NULL,
  `movTotalVenda` decimal(20,2) NOT NULL,
  `movIdUsuario` int(11) NOT NULL,
  `movEncerrado` date NOT NULL,
  `movIdNucleo` int(11) DEFAULT NULL,
  PRIMARY KEY (`idMovimento`),
  KEY `FK_VENDEDOR_idx` (`movIdVendedor`),
  KEY `FK_SORTEIO_idx` (`movSorteio`),
  KEY `FK_USUARIO_idx` (`movIdUsuario`),
  KEY `FK_NUCLEO_idx` (`movIdNucleo`),
  CONSTRAINT `FK_NUCLEO` FOREIGN KEY (`movIdNucleo`) REFERENCES `tblNucleo` (`idNucleo`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_SORTEIO` FOREIGN KEY (`movSorteio`) REFERENCES `tblSorteio` (`idSorteio`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_USUARIO` FOREIGN KEY (`movIdUsuario`) REFERENCES `tblUsuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_VENDEDOR` FOREIGN KEY (`movIdVendedor`) REFERENCES `tblVendedores` (`idVendedor`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblMovimento`
--

LOCK TABLES `tblMovimento` WRITE;
/*!40000 ALTER TABLE `tblMovimento` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblMovimento` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-12-01 14:50:46
