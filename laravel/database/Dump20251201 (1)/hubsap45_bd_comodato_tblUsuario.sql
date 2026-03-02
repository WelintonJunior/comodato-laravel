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
-- Table structure for table `tblUsuario`
--

DROP TABLE IF EXISTS `tblUsuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblUsuario` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `usuNome` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `usuLogin` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `usuSenha` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `usuSuspenso` tinyint(1) NOT NULL,
  `usuCPF` char(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `usuEmail` varchar(70) COLLATE utf8_unicode_ci DEFAULT NULL,
  `usuIdRec` int(11) DEFAULT NULL,
  `usuIdNucleo` int(11) DEFAULT NULL,
  PRIMARY KEY (`idUsuario`),
  KEY `FK_NUCLEO_USUARIO` (`usuIdNucleo`),
  CONSTRAINT `FK_NUCLEO_USUARIO` FOREIGN KEY (`usuIdNucleo`) REFERENCES `tblNucleo` (`idNucleo`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblUsuario`
--

LOCK TABLES `tblUsuario` WRITE;
/*!40000 ALTER TABLE `tblUsuario` DISABLE KEYS */;
INSERT INTO `tblUsuario` VALUES (1,'Jonhson de Tarso Silva','jonhson.silva','123456',0,'57782106800','sintecplan@gmail.com',4,1),(2,'José Eity Koyama','jose.koyama','123456',0,'11111111111','sintecplan@gmail.com',2,1),(3,'Raccon Software','raccon.software','123456',0,'0','raccon.software@gmail.com',0,1),(4,'Karine Souza','karine.souza','!083V97o',0,'','karine.tclg@hotmail.com',0,1),(5,'João dos Santos Cavalca','joao.cavalca','464753',0,'46475315893','joaocavalca0@gmail.comm',4,1),(6,'Miguel Prata','miguel.prata','557030',0,'55703050847','migpratass26@gmail.com',4,1),(7,'Irenita Ribeiro Da Silva','irenita.silva','9552191',0,NULL,NULL,NULL,1),(8,'Paulo De Carvalho','paulo.carvalho','6129228',0,NULL,NULL,NULL,1),(9,'Maria Eliete De Oliveira','maria.oliveira','2696433',0,NULL,NULL,NULL,1),(10,'Sadia De Fatima Silva','sadia.silva','4578186',0,NULL,NULL,NULL,1),(11,'Flavia Elaine Ramos Pereira De Almeida','flavia.almeida','7498607',0,NULL,NULL,NULL,1),(12,'Patricia Aparecida Rocha Lopes Da Silva','patricia.silva','7397938',0,NULL,NULL,NULL,1),(13,'Maria Conceicao Aparecida Silva','maria.silva','6893722',0,NULL,NULL,NULL,1),(14,'Sandra Lucia Da Siva','sandra.siva','8231329',0,NULL,NULL,NULL,1),(15,'Jose Paulo De Freitas','jose.freitas','7652456',0,NULL,NULL,NULL,1),(16,'Romilda Aparecida Silva De Freitas','romilda.freitas','6533723',0,NULL,NULL,NULL,1),(17,'Carlos Rosario Arantes De Carvalho','carlos.carvalho','3554203',0,NULL,NULL,NULL,1),(18,'Celia Maria Dos Santos Faria','celia.faria','9052330',0,NULL,NULL,NULL,1),(19,'Joel Claudino De Faria','joel.faria','2657553',0,NULL,NULL,NULL,1),(20,'Cassia Aparecida Amato Dos Santos','cassia.santos','4523017',0,NULL,NULL,NULL,1),(21,'Cristiano Wilian Da Silva','cristiano.silva','6823929',0,NULL,NULL,NULL,1),(22,'Ana Maria Dos Santos','ana.santos','7486902',0,NULL,NULL,NULL,1),(23,'Maria Veronica De Oliveira','maria.oliveira','5578072',0,NULL,NULL,NULL,1),(24,'Rita De Cassia Domingos Gomes','rita.gomes','5528299',0,NULL,NULL,NULL,1),(25,'Carlos Matheus Lemes Dos Santos','carlos.santos','4845938',0,NULL,NULL,NULL,1),(26,'Linda Ines De Freitas Silva','linda.silva','6327629',0,NULL,NULL,NULL,1),(27,'Rosa Maria Gomes Da Paixao Correa','rosa.correa','9736576',0,NULL,NULL,NULL,1),(28,'Elaine Cristina Rocha Da Silva','elaine.silva','9196734',0,NULL,NULL,NULL,1),(29,'Regina Marcia Dos Santos','regina.santos','7896860',0,NULL,NULL,NULL,1),(30,'Everton De Almeida','everton.almeida','6549592',0,NULL,NULL,NULL,1),(31,'Maria Gorete Domingos Gomes','maria.gomes','5898885',0,NULL,NULL,NULL,1),(32,'Carlos Alberto Galhardo','carlos.galhardo','3046949',0,NULL,NULL,NULL,1),(33,'Jheniffer Siqueira Paulino Maciel','jheniffer.macie','9144676',0,NULL,NULL,NULL,1),(34,'Mariele Cristina Dos Santos Gouvea Muller Dutra','mariele.dutra','4670722',0,NULL,NULL,NULL,1),(35,'Diogo Aparecido Dos Santos','diogo.santos','8591038',0,NULL,NULL,NULL,1),(36,'Marcos Dos Santos Gouvea Muller Dutra','marcos.dutra','6839539',0,NULL,NULL,NULL,1),(37,'Rita De Fatima Da Silva Santos','rita.santos','2490209',0,NULL,NULL,NULL,1),(38,'Rosangela Maria Da Silva Souza','rosangela.souza','6845782',0,NULL,NULL,NULL,1),(39,'Adriano Luis De Morais','adriano.morais','6003672',0,NULL,NULL,NULL,1),(40,'Patricia Emilia De Oliveira','patricia.olivei','5532063',0,NULL,NULL,NULL,1),(41,'Herivan Da Silva Rodrigues','herivan.rodrigu','3724983',0,NULL,NULL,NULL,1),(42,'Ana Sandra Da Silva','ana.silva','5623583',0,NULL,NULL,NULL,1),(43,'Lucas Leonidas Ramos Pereira De Almeida','lucas.almeida','7337023',0,NULL,NULL,NULL,1),(44,'Dulcineia Aparecida De Oliveira','dulcineia.olive','4229112',0,NULL,NULL,NULL,1),(45,'Jueilson De Oliveira','jueilson.olivei','4186434',0,NULL,NULL,NULL,1),(46,'Rosenilda Paulino Andrini','rosenilda.andri','5557266',0,NULL,NULL,NULL,1),(47,'Thaina Filha Da Nida','thaina.nida','8990862',0,NULL,NULL,NULL,1),(48,'Rosa Maria Dos Santos Oliveira','rosa.oliveira','8838809',0,NULL,NULL,NULL,1),(49,'Carina Helena De Lima','carina.lima','9787451',0,NULL,NULL,NULL,1),(50,'Daiana Carolina Da Silva','daiana.silva','8336580',0,NULL,NULL,NULL,1),(51,'Isabel Cristina Da S Ribeiro','isabel.ribeiro','7048672',0,NULL,NULL,NULL,1),(52,'Fabiana Aparecida D O Chaves','fabiana.chaves','9012699',0,NULL,NULL,NULL,1);
/*!40000 ALTER TABLE `tblUsuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-12-01 14:50:10
