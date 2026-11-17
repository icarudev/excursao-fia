-- MySQL dump 10.13  Distrib 8.4.3, for Win64 (x86_64)
--
-- Host: localhost    Database: excursao_fia
-- ------------------------------------------------------
-- Server version	8.4.3

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `apartamentos`
--

DROP TABLE IF EXISTS `apartamentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `apartamentos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `modelos` enum('casal','duplo','triplo','quadriplo') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `apelido` varchar(50) NOT NULL,
  `viagem_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_viagem_id` (`viagem_id`),
  CONSTRAINT `fk_viagem_id` FOREIGN KEY (`viagem_id`) REFERENCES `viagens` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `apartamentos`
--

LOCK TABLES `apartamentos` WRITE;
/*!40000 ALTER TABLE `apartamentos` DISABLE KEYS */;
INSERT INTO `apartamentos` VALUES (1,'duplo','testeApelido',3),(2,'casal','GLICIA',1),(3,'casal','CÉIA',1),(4,'casal','ANDRÉA',1),(5,'','JACIRA',1);
/*!40000 ALTER TABLE `apartamentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pessoas`
--

DROP TABLE IF EXISTS `pessoas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pessoas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(55) DEFAULT NULL,
  `cpf` int unsigned DEFAULT NULL,
  `rg` varchar(20) DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `apartamento_id` int DEFAULT NULL,
  `poltrona` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_apartamento_id` (`apartamento_id`),
  CONSTRAINT `fk_apartamento_id` FOREIGN KEY (`apartamento_id`) REFERENCES `apartamentos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pessoas`
--

LOCK TABLES `pessoas` WRITE;
/*!40000 ALTER TABLE `pessoas` DISABLE KEYS */;
INSERT INTO `pessoas` VALUES (1,'sdadsad',4294967295,'5475743534','2026-11-15',8,3),(2,'dsada',88888888,'774735735','2026-11-14',8,6),(3,'edadsa',89765321,'3123131','2026-11-04',1,5),(4,'sdadsad',17626391,'9870921','2026-11-05',1,2),(5,'GLICIA NADJA BRAGA PICANÇO CASTRO',4294967295,'438283708','1970-05-19',2,60),(6,'PAULO SÉRGIO DE CASTRO',4294967295,'0829406140','1970-01-15',2,59),(7,'CÉIA DOS SANTOS SOUZA',4294967295,'00000000000','1969-03-08',3,1),(8,'ANDRÉ DOS SANTOS SOUZA',4294967295,'00000000000','1962-11-10',3,2),(9,'ANDRÉA DOS SANTOS SOUZA',2246145503,'1160701024','1986-01-09',4,5),(10,'ANDREY MIRANDA DE SOUZA',4294967295,'1683299302','2024-08-19',4,6),(11,'EUGLANTINA COSTA DE MATOS',4294967295,'0538963786','1977-06-13',5,25),(12,'ROSICLÉ DA COSTA BERNARDO',0,'0000000000','0001-01-01',5,26),(13,'MARIA PEREIRA SOUZA',1347205551,'0344404536','0001-01-18',5,11),(14,'JACIRA FERREIRA BRAGA',0,'000000000','0001-01-19',5,12);
/*!40000 ALTER TABLE `pessoas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `viagens`
--

DROP TABLE IF EXISTS `viagens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `viagens` (
  `id` int NOT NULL AUTO_INCREMENT,
  `local` varchar(50) DEFAULT NULL,
  `hotel` varchar(50) DEFAULT NULL,
  `guias` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `viagens`
--

LOCK TABLES `viagens` WRITE;
/*!40000 ALTER TABLE `viagens` DISABLE KEYS */;
INSERT INTO `viagens` VALUES (1,'JOÃO PESSOA- PB','HOTEL BESSA','FABIO/'),(2,'JERICOACOARA-CE','POUSADA MATUZA','THAIS'),(3,'teste','teste','teste');
/*!40000 ALTER TABLE `viagens` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-11-17  8:58:53
