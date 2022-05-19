-- MySQL dump 10.13  Distrib 8.0.29, for Win64 (x86_64)
--
-- Host: localhost    Database: laravel-projekt
-- ------------------------------------------------------
-- Server version	8.0.29

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
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` char(20) NOT NULL,
  `email` char(50) NOT NULL,
  `password` char(255) NOT NULL,
  `admin` tinyint NOT NULL,
  `active` tinyint NOT NULL,
  `status` varchar(20) NOT NULL,
  `api_key` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'ziga','ziga@gmail.com','$2y$10$kO3/Nait6nkHqkbd1rBkwejFXHYPodMYtEFqdanjtc6lPUKWGrDAK',0,1,'okay',''),(2,'Ziga','ziga2@gmail.com','$2y$10$aqil6kEteo8.y0UcUW71cOosR4ulTxYmL4AeWn.At846bp9sdnO0G',0,1,'okay',''),(3,'test','test@gmail.com','$2y$10$3m1JY8Eykz4kseUm9d0sZ.4cfsVMwoe0u8/c3zzID/3ia/bLIyVRm',0,1,'okay',''),(4,'test2','test2@gmail.com','$2y$10$kvUjzrLgv2OHZw9nx/geUuOQ78Y6hl1gGfer5Uu1J1b6gbPLIV9zS',1,1,'okay',''),(5,'test123','test123@gmail.com','$2y$10$P0N7gjia.oC213.KcPDVPeigSECqSQnbN7Q.xn4jZAuyYJDS4USLi',0,1,'okay',''),(6,'user','user@gmail.com','$2y$10$KAgotqLnz7Dlb7VlIKwOoeuVAjdKT/J6e90z6QUZ.hn4PivWZA/2m',0,1,'okay',''),(7,'admin','admin@gmail.com','$2y$10$UarPMfn9YAcJYHM64x21KuyzReaogSea/u8rz.rquZ1ikIjQ.E/f.',1,1,'okay',''),(8,'test150','test150@gmail.com','$2y$10$paDA.3O2mmCnejmW/iNNte63T299i31fTmPURmnXkj5iqeQ/B7IvS',0,1,'okay','43552dad9a4537300c9ff639e996a52216df8fc0'),(9,'aaaaa','zigaziga@gmail.com','$2y$10$NzT4hQ.ngop0ewfyYlSM..hjhqXvmTIggAXxqxxs9SeXuwMk6k1JK',0,0,'locked','4f67a3eae1ba06d065f6f15403ad94fa93d0ec7c');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-05-19 20:49:42
