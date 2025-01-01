-- MySQL dump 10.13  Distrib 8.0.38, for Win64 (x86_64)
--
-- Host: localhost    Database: laptop
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.32-MariaDB

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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin` (
  `ADMIN_ID` varchar(255) NOT NULL,
  `ADMIN_PASSWORD` varchar(255) NOT NULL,
  PRIMARY KEY (`ADMIN_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES ('ADMIN','ADMIN');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `booking`
--

DROP TABLE IF EXISTS `booking`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `booking` (
  `BOOK_ID` int(11) NOT NULL AUTO_INCREMENT,
  `LAP_ID` int(11) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `BOOK_DATE` date NOT NULL,
  `DURATION` int(11) NOT NULL,
  `PHONE_NUMBER` bigint(20) NOT NULL,
  `RETURN_DATE` date NOT NULL,
  `PRICE` int(11) NOT NULL,
  `BOOK_STATUS` varchar(255) NOT NULL DEFAULT 'UNDER PROCESSING',
  PRIMARY KEY (`BOOK_ID`),
  KEY `CAR_ID` (`LAP_ID`),
  KEY `EMAIL` (`EMAIL`),
  CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`LAP_ID`) REFERENCES `laptops` (`LAP_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`EMAIL`) REFERENCES `users` (`EMAIL`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `booking`
--

LOCK TABLES `booking` WRITE;
/*!40000 ALTER TABLE `booking` DISABLE KEYS */;
INSERT INTO `booking` VALUES (94,27,'varunvishwanath1@gmail.com','2024-06-25',1,9513475397,'2024-06-26',1020,'UNDER PROCESSING'),(95,27,'varunvishwanath1@gmail.com','2024-06-25',1,9513475397,'2024-06-26',1020,'UNDER PROCESSING'),(96,27,'varunvishwanath1@gmail.com','2024-06-26',2,9513475397,'2024-06-28',2040,'RETURNED'),(98,36,'varunvishwanath1@gmail.com','2024-06-26',3,9513475397,'2024-06-29',750,'APPROVED'),(99,27,'varunvishwanath1@gmail.com','2024-06-28',2,9513475397,'2024-06-30',2040,'RETURNED'),(100,27,'varunvishwanath1@gmail.com','2024-07-05',1,9513475397,'2024-07-06',1020,'RETURNED'),(101,30,'varunvishwanath1@gmail.com','2024-07-08',2,9513475397,'2024-07-10',3000,'RETURNED'),(102,31,'varunvishwanath1@gmail.com','2024-07-11',1,9513475397,'2024-07-12',2500,'UNDER PROCESSING'),(103,27,'varunvishwanath1@gmail.com','2024-07-11',2,9513475397,'2024-07-13',2040,'UNDER PROCESSING'),(104,33,'varunvishwanath1@gmail.com','2024-07-15',2,9513475397,'2024-07-17',2400,'UNDER PROCESSING'),(105,27,'varunvishwanath1@gmail.com','2024-07-15',5,9513475397,'2024-07-20',5100,'RETURNED');
/*!40000 ALTER TABLE `booking` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `feedback` (
  `FED_ID` int(11) NOT NULL AUTO_INCREMENT,
  `EMAIL` varchar(255) NOT NULL,
  `COMMENT` text NOT NULL,
  PRIMARY KEY (`FED_ID`),
  KEY `TEST` (`EMAIL`),
  CONSTRAINT `TEST` FOREIGN KEY (`EMAIL`) REFERENCES `users` (`EMAIL`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feedback`
--

LOCK TABLES `feedback` WRITE;
/*!40000 ALTER TABLE `feedback` DISABLE KEYS */;
/*!40000 ALTER TABLE `feedback` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `laptops`
--

DROP TABLE IF EXISTS `laptops`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `laptops` (
  `LAP_ID` int(11) NOT NULL AUTO_INCREMENT,
  `LAP_NAME` varchar(255) NOT NULL,
  `COMPANY` varchar(255) NOT NULL,
  `RAM` varchar(11) NOT NULL,
  `PRICE` int(11) NOT NULL,
  `LAP_IMG` varchar(255) NOT NULL,
  `AVAILABLE` varchar(255) NOT NULL,
  `processor` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`LAP_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `laptops`
--

LOCK TABLES `laptops` WRITE;
/*!40000 ALTER TABLE `laptops` DISABLE KEYS */;
INSERT INTO `laptops` VALUES (27,'Dell Insprion','Dell','8',1020,'IMG-66757b01a2fa84.91742553.png','Y','i7'),(30,'HP OMEN','HP','8',1500,'IMG-66784f6107e040.91380420.png','Y','Ryzen 5'),(31,'ASUS Zephyrus Dual ','ASUS','8',2500,'IMG-6678538ec336c2.71356042.png','Y','Ryzen 7'),(32,'HP VICTUS ','HP','8',1900,'IMG-667853e48012a9.33123141.png','Y','i7'),(33,'Dell Vostro 14','Dell','12',1200,'IMG-6678542dd523d2.45639609.png','Y','i5'),(34,'HP Pavilion Plus','HP','16',1500,'IMG-66785466401458.62810158.png','Y','i7'),(35,'HP Pavilion Plus 360x','HP','16',2500,'IMG-66786d004e8062.35456545.png','Y','i7'),(36,'HP Pavilion Gaming','HP','16',250,'IMG-667b9fe609be85.78530739.png','N','Ryzen 7'),(37,'MAC 13','Apple','8',1020,'IMG-668b9933ef3359.35993592.jpg','Y','M3');
/*!40000 ALTER TABLE `laptops` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `payment` (
  `PAY_ID` int(11) NOT NULL AUTO_INCREMENT,
  `BOOK_ID` int(11) NOT NULL,
  `CARD_NO` varchar(255) NOT NULL,
  `EXP_DATE` varchar(255) NOT NULL,
  `CVV` int(11) NOT NULL,
  `PRICE` int(11) NOT NULL,
  PRIMARY KEY (`PAY_ID`),
  UNIQUE KEY `BOOK_ID` (`BOOK_ID`),
  CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`BOOK_ID`) REFERENCES `booking` (`BOOK_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment`
--

LOCK TABLES `payment` WRITE;
/*!40000 ALTER TABLE `payment` DISABLE KEYS */;
INSERT INTO `payment` VALUES (46,94,'1212121212121212','1211',121,1020),(47,95,'1111111111111111','1111',111,1020),(48,96,'1111111111111111','1111',111,2040),(49,98,'1212121212121212','1212',121,750),(50,99,'1111111111111111','1111',111,2040),(51,100,'1231231323132142','2323',232,1020),(52,101,'1231321211212121','1212',121,3000),(53,102,'1212121212121212','2121',212,2500),(54,103,'1212121212312313','1231',123,2040),(55,104,'1233123123123121','1231',132,2400),(56,105,'1415165151515151','5151',515,5100);
/*!40000 ALTER TABLE `payment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `service`
--

DROP TABLE IF EXISTS `service`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `service` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `req_type` varchar(50) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `req_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `service`
--

LOCK TABLES `service` WRITE;
/*!40000 ALTER TABLE `service` DISABLE KEYS */;
INSERT INTO `service` VALUES (8,'Varun Vishwanath','varunvishwanath1@gmail.com','Technical Support','Hardware Issues','Need to check the hardware','2024-06-28'),(9,'Varun Vishwanath','varunvishwanath1@gmail.com','Maintenance Services','Cleaning Service','sfdg','2024-07-05'),(10,'Varun Vishwanath','varunvishwanath1@gmail.com','Maintenance Services','Cleaning Service','ggdf','2024-07-05'),(11,'Varun Vishwanath','varunvishwanath1@gmail.com','Maintenance Services','Cleaning Service','sfsg','2024-07-08'),(12,'Varun Vishwanath','varunvishwanath1@gmail.com','Technical Support','Hardware Issues','Network card is not working.','2024-07-11');
/*!40000 ALTER TABLE `service` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `FNAME` varchar(255) NOT NULL,
  `LNAME` varchar(255) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `PHONE_NUMBER` bigint(11) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `GENDER` varchar(255) NOT NULL,
  PRIMARY KEY (`EMAIL`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES ('Varun','Vishwanath','varunvishwanath1@gmail.com',9513475397,'Varun123','male'),('Varun','K V','vv9991997@gmail.com',9448140164,'Varun123','male');
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

-- Dump completed on 2024-07-17 11:34:01
