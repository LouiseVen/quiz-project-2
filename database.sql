-- MySQL dump 10.13  Distrib 8.0.32, for Win64 (x86_64)
--
-- Host: localhost    Database: quizz_project_2
-- ------------------------------------------------------
-- Server version	8.0.32

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
-- Table structure for table `answers`
--

DROP TABLE IF EXISTS `answers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `answers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `value` text NOT NULL,
  `is_true` tinyint(1) NOT NULL,
  `question_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_question_id` (`question_id`),
  CONSTRAINT `fk_question_id` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `answers`
--

LOCK TABLES `answers` WRITE;
/*!40000 ALTER TABLE `answers` DISABLE KEYS */;
INSERT INTO `answers` VALUES (1,'Victor Hugo',1,1),(2,'Gustave Flaubert',0,1),(3,'Emile Zola',0,1),(4,'Charles Baudelaire',0,1),(5,'D\'Artagnan',1,2),(6,'Cyrano de Bergerac',0,2),(7,'Don Quichotte',0,2),(8,'Gavroche',0,2),(9,'Antoine de Saint-Exupéry',1,3),(10,'Albert Camus',0,3),(11,'Marcel Proust',0,3),(12,'Jean-Paul Sartre',0,3),(13,'Gustave Flaubert',1,4),(14,'Honoré de Balzac',0,4),(15,'Guy de Maupassant',0,4),(16,'Stendhal',0,4),(17,'Mark Hamill',1,16),(18,'Harrison Ford',0,16),(19,'Tom Cruise',0,16),(20,'Brad Pitt',0,16),(25,'Mickael Jakson',1,20),(26,'Madonna',0,20),(27,'Whitney Houston',0,20),(28,'Prince',0,20),(29,'Adèle',1,21),(30,'Beyoncé',0,21),(31,'Rihanna',0,21),(32,'Taylor Swist',0,21),(33,'Bob Dylan',1,22),(34,'John Lennon',0,22),(35,'Paul McCartney',0,22),(36,'Mick Jagger',0,22),(37,'Michael Jackson',1,23),(38,'Stevie Wonder',0,23),(39,'Lionel Richie',0,23),(40,'Prince',0,23),(41,'Prince',1,24),(42,'Michael Jackson',0,24),(43,'Stevie Wonder',0,24),(44,'Lionel Richie',0,24);
/*!40000 ALTER TABLE `answers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `questions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `value` text NOT NULL,
  `theme_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_theme_id` (`theme_id`),
  CONSTRAINT `fk_theme_id` FOREIGN KEY (`theme_id`) REFERENCES `themes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questions`
--

LOCK TABLES `questions` WRITE;
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` VALUES (1,'Qui a écrit « Les Misérables » ?',1),(2,'Quel est le héros du roman « Les Trois Mousquetaires » ?',1),(3,'Qui a écrit « Le Petit Prince » ?',1),(4,'Qui est l\'auteur de « Madame Bovary » ?',1),(16,'Qui est l\'acteur principal de la saga \"Star Wars\" ?',3),(20,'Qui a chanté la chanson \"Thriller\"?',5),(21,'Qui est l\'interprète de la chanson « Hello » ?',5),(22,'Qui a écrit la chanson « Like a Rolling Stone » ?',5),(23,'Qui est le chanteur de la chanson « Billie Jean » ?',5),(24,'Qui a écrit la chanson « Purple Rain » ?',5);
/*!40000 ALTER TABLE `questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `themes`
--

DROP TABLE IF EXISTS `themes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `themes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `themes`
--

LOCK TABLES `themes` WRITE;
/*!40000 ALTER TABLE `themes` DISABLE KEYS */;
INSERT INTO `themes` VALUES (1,'littérature','description'),(2,'géographie','description géo'),(3,'cinéma','7ème art'),(4,'astronomie','vers l\'infini et au delà'),(5,'musique','music');
/*!40000 ALTER TABLE `themes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'quizz_project_2'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-04-13 16:38:31
