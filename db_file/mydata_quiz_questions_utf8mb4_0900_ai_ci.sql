-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: mydata
-- ------------------------------------------------------
-- Server version	8.0.35

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
-- Table structure for table `quiz_questions`
--

DROP TABLE IF EXISTS `quiz_questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `quiz_questions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `question` text NOT NULL,
  `option_a` varchar(255) NOT NULL,
  `option_b` varchar(255) NOT NULL,
  `option_c` varchar(255) NOT NULL,
  `option_d` varchar(255) NOT NULL,
  `correct_answer` char(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quiz_questions`
--

LOCK TABLES `quiz_questions` WRITE;
/*!40000 ALTER TABLE `quiz_questions` DISABLE KEYS */;
INSERT INTO `quiz_questions` VALUES (1,'What was the charge Boeing agreed to plead guilty to in July?','Criminal negligence','Criminal fraud','Manslaughter','False advertising','B'),(2,'How much was the fine Boeing agreed to pay under the July plea deal?','$150 million','$200 million','$243 million','$300 million','C'),(3,'Why did Judge Reed OConnor reject the plea deal?','Boeing refused to plead guilty','It failed to address the public interest and lacked accountability measures','The Department of Justice withdrew the agreement','Family members of victims protested in court','B'),(4,'What aspect of the monitor hiring process did Judge OConnor criticize?','Lack of transparency in the selection','Inclusion of competency-based evaluation','Diversity requirements undermining confidence in selection','Insufficient funding for the monitoring program','C'),(5,'How did families of victims react to the ruling?','They were disappointed','They welcomed it and saw it as a step toward real justice','They remained neutral','They opposed the judge’s decision','B'),(6,'What major issue caused the 737 Max crashes?','Engine failure','Flight control system problems','Pilot error','Weather conditions','B'),(7,'What happened to a Boeing plane operated by Alaska Airlines in January?','A mid-air collision','A door panel blew out soon after take-off','A crash landing in the ocean',' A fuel leakage during flight','B'),(8,'What was Boeing accused of breaching as part of the 2021 agreement?','Environmental standards','Regulatory compliance on production timelines','Terms related to monitoring and reporting requirements','Contractual obligations to suppliers','C'),(9,'What was the Department of Justice’s response to the judge ruling?','It planned to appeal the decision','It immediately criticized the judge','It said it was reviewing the decision',' It terminated all agreements with Boeing','C'),(10,'What did Erin Appelbaum, representing victims families, say about the judge’s ruling?','It was a setback for justice','It was an excellent decision and a victory for the families','It failed to hold Boeing accountable','It was unfair to the Department of Justice','B');
/*!40000 ALTER TABLE `quiz_questions` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-12-20 22:24:40
