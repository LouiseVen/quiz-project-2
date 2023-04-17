-- quizz_project_2.themes definition
CREATE DATABASE `quizz_project_2` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `quizz_project_2`;

CREATE TABLE `themes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


-- quizz_project_2.questions definition

CREATE TABLE `questions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `value` text NOT NULL,
  `theme_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_theme_id` (`theme_id`),
  CONSTRAINT `fk_theme_id` FOREIGN KEY (`theme_id`) REFERENCES `themes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


-- quizz_project_2.answers definition

CREATE TABLE `answers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `value` text NOT NULL,
  `is_true` tinyint(1) NOT NULL,
  `question_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_question_id` (`question_id`),
  CONSTRAINT `fk_question_id` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO quizz_project_2.questions
(id, value, theme_id)
VALUES(1, 'Qui a écrit « Les Misérables » ?', 1);
INSERT INTO quizz_project_2.questions
(id, value, theme_id)
VALUES(2, 'Quel est le héros du roman « Les Trois Mousquetaires » ?', 1);
INSERT INTO quizz_project_2.questions
(id, value, theme_id)
VALUES(3, 'Qui a écrit « Le Petit Prince » ?', 1);
INSERT INTO quizz_project_2.questions
(id, value, theme_id)
VALUES(4, 'Qui est l''auteur de « Madame Bovary » ?', 1);
INSERT INTO quizz_project_2.questions
(id, value, theme_id)
VALUES(16, 'Qui est l''acteur principal de la saga "Star Wars" ?', 3);

INSERT INTO quizz_project_2.themes
(id, name, description)
VALUES(1, 'littérature', 'description');
INSERT INTO quizz_project_2.themes
(id, name, description)
VALUES(2, 'géographie', 'description géo');
INSERT INTO quizz_project_2.themes
(id, name, description)
VALUES(3, 'cinéma', '7ème art');
INSERT INTO quizz_project_2.themes
(id, name, description)
VALUES(4, 'astronomie', 'vers l''infini et au delà');
