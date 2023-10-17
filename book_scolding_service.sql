
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `library` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `library`;
DROP TABLE IF EXISTS `book`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `book` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `country_id` tinyint(3) unsigned DEFAULT NULL,
  `publisher_id` int(10) unsigned DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `price` decimal(10,0) DEFAULT NULL,
  `category_id` int(10) unsigned DEFAULT NULL,
  `annotation` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `country_id` (`country_id`),
  KEY `publisher_id` (`publisher_id`),
  CONSTRAINT `book_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`) ON DELETE SET NULL,
  CONSTRAINT `book_ibfk_2` FOREIGN KEY (`publisher_id`) REFERENCES `publisher` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `book` WRITE;
/*!40000 ALTER TABLE `book` DISABLE KEYS */;
INSERT INTO `book` VALUES (5,'233e',1,9,'2023-09-24',1000,4,''),(6,'m',3,9,'2023-09-10',1,4,''),(7,'книга 3',3,1,'2023-09-10',100,6,''),(8,'1122',3,10,'2023-09-08',1000,17,''),(9,'sgf',2,1,'2023-09-01',100,17,''),(10,'f',2,6,'2023-09-08',100,18,''),(11,'afdzsvd',4,6,'2023-09-22',1000,18,''),(17,'&lt;script&gt;alert(\'123\')&lt;/script&gt;',1,9,'2023-10-19',1000,9,''),(18,'<script>alert(\'123\')</script>',1,9,'2023-10-19',1000,9,''),(19,'<script>alert(\'123\')</script>',3,10,'2023-10-19',1000,18,''),(20,'<script>alert(\"123\")</script>',2,10,'2023-10-10',1000,8,''),(21,'m',2,6,'2023-10-21',100,8,''),(22,'m',2,6,'2023-10-21',100,8,''),(23,'f',1,6,'2023-10-07',100,3,''),(24,'f',2,10,'2023-10-22',1000,7,''),(25,'111',2,6,'2023-10-13',1000,9,''),(26,'m',2,1,'2023-10-20',1000,8,''),(27,'m',2,1,'2023-10-20',1000,8,''),(28,'111',2,6,'2023-10-19',1,13,''),(29,'category101',4,10,'2023-10-14',9,3,''),(30,'m',3,10,'2023-09-30',11,3,''),(31,'1',1,1,'2023-10-28',100,9,''),(34,'9876g',1,1,'1002-12-09',1000,1,'u'),(35,'ooo',1,12,'2023-10-20',1000,7,''),(36,'1111',1,1,'1002-12-09',1000,1,'u'),(37,'1112221',1,1,'1002-12-09',1000,1,'u'),(38,'1',1,1,'2023-10-20',1,7,''),(39,'111442221',1,1,'1002-12-09',1000,1,'u'),(40,'111442221',1,1,'1002-12-09',1000,1,'u'),(41,'111442221',1,1,'1002-12-09',1000,1,'u'),(42,'111442221',1,1,'1002-12-09',1000,1,'u'),(43,'111442221',1,1,'1002-12-09',1000,1,'u'),(44,'111442221',1,1,'1002-12-09',1000,1,'u'),(45,'111442221',1,1,'1002-12-09',1000,1,'u'),(46,'111442221',1,1,'1002-12-09',1000,1,'u'),(47,'111442221',1,1,'1002-12-09',1000,1,'u'),(48,'111442221',1,1,'1002-12-09',1000,1,'u'),(49,'111442221',1,1,'1002-12-09',1000,1,'u'),(50,'12221',1,1,'1002-12-09',1000,1,'u');
/*!40000 ALTER TABLE `book` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `book_copy`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `book_copy` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `book_id` int(10) unsigned NOT NULL,
  `copy_number` varchar(255) DEFAULT NULL,
  `bookcase_id` int(10) unsigned DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `book_id` (`book_id`),
  KEY `bookcase_id` (`bookcase_id`),
  CONSTRAINT `book_copy_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `book` (`id`) ON DELETE CASCADE,
  CONSTRAINT `book_copy_ibfk_2` FOREIGN KEY (`bookcase_id`) REFERENCES `bookcase` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `book_copy` WRITE;
/*!40000 ALTER TABLE `book_copy` DISABLE KEYS */;
INSERT INTO `book_copy` VALUES (1,5,'11111',2,8),(2,5,'jiyt',NULL,8),(3,5,'jiyt',6,8),(4,5,'jiythgr',5,2),(5,6,'111114ye',4,8),(6,6,'5ye',6,NULL),(7,6,'ey5ye5',2,8),(8,5,'jgfjd',NULL,8);
/*!40000 ALTER TABLE `book_copy` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `bookcase`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bookcase` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `number_rows` tinyint(3) unsigned DEFAULT '1',
  `library_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `library_id` (`library_id`),
  CONSTRAINT `bookcase_ibfk_1` FOREIGN KEY (`library_id`) REFERENCES `library` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `bookcase` WRITE;
/*!40000 ALTER TABLE `bookcase` DISABLE KEYS */;
INSERT INTO `bookcase` VALUES (2,'mуу',2,3),(3,'fh',1,2),(4,'category101',1,1),(5,'e',2,1),(6,'j',1,2),(7,'1',1,8);
/*!40000 ALTER TABLE `bookcase` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `parent_id` smallint(6) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `annotation` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,NULL,'category1',NULL),(2,NULL,'category2',NULL),(3,1,'category3q',''),(4,3,'category4',NULL),(5,2,'category5',NULL),(6,5,'category6',NULL),(7,4,'category7',NULL),(8,7,'category8',NULL),(9,8,'category9',NULL),(12,17,'category12',NULL),(13,6,'category13',''),(15,4,'Приключения',''),(16,17,'Боевик',NULL),(17,15,'Странствия по горам',NULL),(18,17,'j',NULL),(19,16,'11',''),(20,1,'k','');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `country`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `country` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `country` WRITE;
/*!40000 ALTER TABLE `country` DISABLE KEYS */;
INSERT INTO `country` VALUES (1,'usa'),(2,'russia'),(3,'country3'),(4,'country4');
/*!40000 ALTER TABLE `country` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `library`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `library` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT 'library',
  `address` varchar(255) NOT NULL,
  `founding_date` date DEFAULT NULL,
  `number_of_book` int(10) unsigned DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `address` (`address`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `library` WRITE;
/*!40000 ALTER TABLE `library` DISABLE KEYS */;
INSERT INTO `library` VALUES (1,'library 1233','address1','1009-02-09',0),(2,'library 2','address21','1019-02-09',0),(3,'library 3','address33','1012-02-09',0),(5,'hhhhh','ахахахаха','1111-11-23',0),(6,'1111','zcaf','2023-10-29',0),(7,'e','k,,','2023-10-28',0),(8,'1','11','2023-11-03',0),(10,'e','edfghkjlleres','2023-10-28',0);
/*!40000 ALTER TABLE `library` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `publisher`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `publisher` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `date_of_death` date DEFAULT NULL,
  `annotation` varchar(1000) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `publisher` WRITE;
/*!40000 ALTER TABLE `publisher` DISABLE KEYS */;
INSERT INTO `publisher` VALUES (1,'Алексей','Понамир','1002-10-13','1051-02-07','annotation',NULL),(6,'Терри','Гудкайнд','1948-01-11','2020-09-17','Американский писатель. Автор серии бестселлеров «Меч Истины» в жанре фэнтези, книги которой, согласно пресс-релизу издательства Tor Books, изданы суммарным тиражом более 25 миллионов экземпляров и переведены на 20 различных языков. По мотивам этой серии в 2008 году был снят сериал «Легенда об Искателе»',NULL),(9,'Аркадий','Акардий','1978-12-10','2023-09-30','',NULL),(10,'jjj','111','1990-08-12','2045-09-10','ii',NULL),(11,'nn','kk','2023-09-30','2023-10-29','',NULL),(12,'Экспонат','1111','2023-09-26','2023-10-29','',NULL),(14,'llll','Понамир','2023-10-29','2090-10-29','',NULL);
/*!40000 ALTER TABLE `publisher` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(30) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'login1','$2y$10$0Ek55TVjPfXyNmCltp8p6uFAM3lg46uFne2C/87xm4iTuCndm9td2'),(2,'login122','1111'),(3,'login12','$2y$10$XGzl02QxhiZG0AwWK84jtOsgHtN1ErbZmCuqp6pSqL45n1kwfTGti'),(4,'login1668','1111'),(5,'login1288','1111'),(6,'login','1111'),(7,'login0','1111'),(8,'log','$2y$10$WwiWPFxh/73MvD3SKty/KuXKjP6KZY.6X.Zb9fNNRK41nP5/Em5CK'),(9,'login10','$2y$10$EvKWVQ.L./XWtz/53LbMxeeMwD/i3hg0.wQ6xnqTCD.jjoyDxp1vO'),(10,'e','$2y$10$nzkXg0VdvRgDCHhIHt5OR.WnKbvVtRksYx7EPO2YGc7zkZc54JM/i'),(11,'a','$2y$10$4ll1oe2Vw647yEsQbPbvcO/pYd2ACpRUPj4pxp9OsuB7qsIJN0eji'),(12,'1','$2y$10$QdWjDxIDN3gP45UsezDOCe/6KmgJpWSlbbBTUkFj/XhuqENmHKESa'),(13,'1123','$2y$10$dIoFzj2d6QmKIMjyIKT2KeeCWR3qkzI6cSGg8iC.G9E4UIigFWxR2'),(14,'k','$2y$10$kgx.Tn2LUB6ToKcA/2bJ/.gvBOiDjwRXILWzQvz2XQJtgip0vWA7i'),(15,'kkkkk','111'),(16,'1','$2y$10$6jvJtpi95aluaXv7h0kgm.AJ4hkhgxc6Z8r83CjTzjfKKXzh1Pbt.'),(17,'1','$2y$10$cfIOLBttxrkN5bHR3pMzEeBwXnpPZu/kUYx7VcQlXGqJs3NCuGJ/e'),(18,'kll','$2y$10$L8VcRKs103SLRUPq9ckZWOd2UTOJ.QGLOmmoTHfrHHE5703vxmS2S'),(19,'kkkk','$2y$10$u4cjJzs4ucQuoP/vQm.3IuXvrr1mJHg4ZNV9JLWnmLXBkLPymSate');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

