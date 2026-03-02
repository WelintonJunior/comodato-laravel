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
-- Table structure for table `tblMaquinetas`
--

DROP TABLE IF EXISTS `tblMaquinetas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblMaquinetas` (
  `idMaquineta` int(11) NOT NULL AUTO_INCREMENT,
  `maqSerie` char(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `maqAtivoSN` char(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `maqObservacoes` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `maqEmUso'` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`idMaquineta`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblMaquinetas`
--

LOCK TABLES `tblMaquinetas` WRITE;
/*!40000 ALTER TABLE `tblMaquinetas` DISABLE KEYS */;
INSERT INTO `tblMaquinetas` VALUES (1,'J9BC08092184','S','Maquinas Adquiridas e em Uso pelo Vendedor',NULL),(2,'J9BC08092159','S','Maquinas Adquiridas e em Uso pelo Vendedor',NULL),(3,'J9BC08082143','S','Maquinas Adquiridas e em Uso pelo Vendedor',NULL),(4,'J9BC08092129','S','Maquinas Adquiridas e em Uso pelo Vendedor',NULL),(5,'J9BC08094499','S','Maquinas Adquiridas e em Uso pelo Vendedor',NULL),(6,'J9C108346853','S','Maquinas Adquiridas e em Uso pelo Vendedor',NULL),(7,'J9C108346715','S','Maquinas Adquiridas e em Uso pelo Vendedor',NULL),(8,'J9C108346730','S','Maquinas Adquiridas e em Uso pelo Vendedor',NULL),(9,'J9C108346457','S','Maquinas Adquiridas e em Uso pelo Vendedor',NULL),(10,'J9C108343663','S','Maquinas Adquiridas e em Uso pelo Vendedor',NULL),(11,'J9BC08094468','S','Maquinas Adquiridas e em Uso pelo Vendedor',NULL),(12,'J9BC08094471','S','Maquinas Adquiridas e em Uso pelo Vendedor',NULL),(13,'J9C108293937','S','Maquinas Adquiridas e em Uso pelo Vendedor',NULL),(14,'J9C108346915','S','Maquinas Adquiridas e em Uso pelo Vendedor',NULL),(15,'J9C108343771','S','Maquinas Adquiridas e em Uso pelo Vendedor',NULL),(16,'J9C108343702','S','Maquinas Adquiridas e em Uso pelo Vendedor',NULL),(17,'J9C108343547','S','Maquinas Adquiridas e em Uso pelo Vendedor',NULL),(18,'J9C108346863','S','Maquinas Adquiridas e em Uso pelo Vendedor',NULL),(19,'J9C108346883','S','Maquinas Adquiridas e em Uso pelo Vendedor',NULL),(20,'J9C108346449','S','Maquinas Adquiridas e em Uso pelo Vendedor',NULL),(21,'J9C108346858','S','Maquinas Adquiridas e em Uso pelo Vendedor',NULL),(22,'J9BC08094495','S','Maquinas Adquiridas e em Uso pelo Vendedor',NULL),(23,'J9BC08094501','S','Maquinas Adquiridas e em Uso pelo Vendedor',NULL),(24,'J9C108346467','S','Maquinas Adquiridas e em Uso pelo Vendedor',NULL),(25,'J9C108346460','S','Maquinas Adquiridas e em Uso pelo Vendedor',NULL),(26,'J9C108346465','S','Maquinas Adquiridas e em Uso pelo Vendedor',NULL),(27,'J9C108346451','S','Maquinas Adquiridas e em Uso pelo Vendedor',NULL),(28,'J9C108346481','S','Maquinas Adquiridas e em Uso pelo Vendedor',NULL),(29,'J9C108346463','S','Maquinas Adquiridas e em Uso pelo Vendedor',NULL),(30,'J9C108344554','S','Maquinas Adquiridas e em Uso pelo Vendedor',NULL),(31,'1732250501','S','COMODATO',NULL),(32,'1732250486','S','COMODATO',NULL),(33,'1732250450','S','COMODATO',NULL),(34,'1732250266','S','COMODATO',NULL),(35,'1732250414','S','COMODATO',NULL),(36,'1732250500','S','COMODATO',NULL),(37,'1732250321','S','COMODATO',NULL),(38,'1732250545','S','COMODATO',NULL),(39,'1732250488','S','COMODATO',NULL),(40,'1732250456','S','COMODATO',NULL),(41,'1732250456','S',NULL,NULL),(42,'1732250456','S',NULL,NULL);
/*!40000 ALTER TABLE `tblMaquinetas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-12-01 14:50:57
