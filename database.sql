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
) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `answers`
--

LOCK TABLES `answers` WRITE;
/*!40000 ALTER TABLE `answers` DISABLE KEYS */;
INSERT INTO `answers` VALUES (1,'Victor Hugo',1,1),(2,'Gustave Flaubert',0,1),(3,'Emile Zola',0,1),(4,'Charles Baudelaire',0,1),(5,'D\'Artagnan',1,2),(6,'Cyrano de Bergerac',0,2),(7,'Don Quichotte',0,2),(8,'Gavroche',0,2),(9,'Antoine de Saint-Exupéry',1,3),(10,'Albert Camus',0,3),(11,'Marcel Proust',0,3),(12,'Jean-Paul Sartre',0,3),(13,'Gustave Flaubert',1,4),(14,'Honoré de Balzac',0,4),(15,'Guy de Maupassant',0,4),(16,'Stendhal',0,4),(17,'Mark Hamill',1,16),(18,'Harrison Ford',0,16),(19,'Tom Cruise',0,16),(20,'Brad Pitt',0,16),(25,'Mickael Jakson',1,20),(26,'Madonna',0,20),(27,'Whitney Houston',0,20),(28,'Prince',0,20),(29,'Adèle',1,21),(30,'Beyoncé',0,21),(31,'Rihanna',0,21),(32,'Taylor Swist',0,21),(33,'Bob Dylan',1,22),(34,'John Lennon',0,22),(35,'Paul McCartney',0,22),(36,'Mick Jagger',0,22),(37,'Michael Jackson',1,23),(38,'Stevie Wonder',0,23),(39,'Lionel Richie',0,23),(40,'Prince',0,23),(41,'Prince',1,24),(42,'Michael Jackson',0,24),(43,'Stevie Wonder',0,24),(44,'Lionel Richie',0,24),(45,' L\'expansion de l\'univers à partir d\'un point singulier',1,25),(46,' L\'explosion d\'une étoile',0,25),(47,' La formation de la Voie lactée',0,25),(48,'Une comète géante en collision avec la Terre',0,25),(49,'Un groupe de planètes situées entre Mars et Jupiter',1,26),(50,'Un anneau de débris autour de Saturne',0,26),(51,' Une ceinture de comètes entre Uranus et Neptune',0,26),(52,'Une région de l\'espace où l\'on trouve des étoiles binaires',0,26),(53,'Une étoile qui a épuisé tout son combustible et qui s\'est effondrée sur elle-même',1,27),(54,'Une étoile très jeune et brillante',0,27),(55,'Une étoile très massive qui explose en supernova',0,27),(56,'Une étoile qui tourne très rapidement sur elle-même',0,27),(57,'La couche la plus externe de l\'atmosphère du Soleil',1,28),(58,'La couche externe de l\'atmosphère d\'une planète',0,28),(59,' Une région de l\'espace où l\'on trouve des étoiles géantes rouges',0,28),(60,'Une région de l\'espace où l\'on trouve des trous noirs supermassifs',0,28),(61,'Une planète située en dehors de notre système solaire',1,29),(62,' Une planète qui orbite autour de la Lune',0,29),(63,'Une planète qui a une atmosphère très dense',0,29),(64,'Une planète qui a une orbite très excentrique',0,29),(65,'Madrid ',1,30),(66,'Barcelone',0,30),(67,'Paris',0,30),(68,'Lisbonne',0,30),(69,' Shanghai',1,31),(70,'Hong Kong',0,31),(71,'Tokyo',0,31),(72,'Pékin',0,31),(73,' Mont Everest',1,32),(74,'Mont Kilimandjaro',0,32),(75,'Mont Blanc',0,32),(76,'Mont Rushmore',0,32),(77,'Maroc ',1,33),(78,'Algérie',0,33),(79,'Tunisie',0,33),(80,'Égypte',0,33),(81,'Océan Pacifique',1,34),(82,'Océan Atlantique',0,34),(83,'Océan Indien',0,34),(84,'Océan Antarctique',0,34),(85,'JRR Tolkien',1,5),(86,'CS Lewis',0,5),(87,'George RR Martin',0,5),(88,'JK Rowling',0,5),(89,' Leonardo DiCaprio',1,35),(90,'Brad Pitt',0,35),(91,'Tom Cruise',0,35),(92,'George Clooney',0,35),(93,'Quentin Tarantino',1,36),(94,'Steven Spielberg',0,36),(95,'Martin Scorsese',0,36),(96,' Woody Allen',0,36),(97,' Cannes',1,37),(98,' Paris',0,37),(99,'Rome',0,37),(100,'New York',0,37),(101,'Christian Bale',1,38),(102,'Ben Affleck',0,38),(103,'George Clooney',0,38),(104,'Val Kilmer',0,38);
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
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questions`
--

LOCK TABLES `questions` WRITE;
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` VALUES (1,'Qui a écrit « Les Misérables » ?',1),(2,'Quel est le héros du roman « Les Trois Mousquetaires » ?',1),(3,'Qui a écrit « Le Petit Prince » ?',1),(4,'Qui est l\'auteur de « Madame Bovary » ?',1),(5,'Qui est l\'auteur de la trilogie \"Le Seigneur des anneaux\" ?',1),(16,'Qui est l\'acteur principal de la saga \"Star Wars\" ?',3),(20,'Qui a chanté la chanson \"Thriller\"?',5),(21,'Qui est l\'interprète de la chanson « Hello » ?',5),(22,'Qui a écrit la chanson « Like a Rolling Stone » ?',5),(23,'Qui est le chanteur de la chanson « Billie Jean » ?',5),(24,'Qui a écrit la chanson « Purple Rain » ?',5),(25,'Qu\'est-ce que le Big Bang?',4),(26,'Qu\'est-ce que la ceinture d\'astéroïdes?',4),(27,'Qu\'est-ce qu\'une étoile naine blanche?',4),(28,' Qu\'est-ce que la couronne solaire?',4),(29,'Qu\'est-ce qu\'une exoplanète?',4),(30,'Quelle est la capitale de l\'Espagne ?',2),(31,'Quelle est la plus grande ville de Chine ?',2),(32,'Quelle est la plus haute montagne du monde ?',2),(33,'Dans quel pays se trouve la ville de Marrakech ?',2),(34,'Quel est le plus grand océan du monde ?',2),(35,'Qui a joué le rôle de Jack dans le film Titanic ?',3),(36,'Qui a réalisé le film Pulp Fiction ?',3),(37,'Dans quelle ville est situé le célèbre festival de cinéma de Cannes ?',3),(38,'Qui a joué le rôle de Batman dans le film The Dark Knight ?',3);
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

-- Dump completed on 2023-04-25 12:12:20