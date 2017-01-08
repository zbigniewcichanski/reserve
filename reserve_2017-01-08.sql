# ************************************************************
# Sequel Pro SQL dump
# Version 4529
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.13)
# Database: reserve
# Generation Time: 2017-01-08 13:19:45 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table service_category
# ------------------------------------------------------------

DROP TABLE IF EXISTS `service_category`;

CREATE TABLE `service_category` (
  `idCategory` char(32) COLLATE utf8_polish_ci NOT NULL DEFAULT '',
  `IdParentCategory` char(32) COLLATE utf8_polish_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`idCategory`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

LOCK TABLES `service_category` WRITE;
/*!40000 ALTER TABLE `service_category` DISABLE KEYS */;

INSERT INTO `service_category` (`idCategory`, `IdParentCategory`, `name`, `deleted`)
VALUES
	('1',NULL,'Korepetytor',0),
	('0e2e6f3514efd2376c6ddccfe3b5590f',NULL,'Anglik',1),
	('9c36407a802ceed7301eb87e621e3105','1','Niemiecki',0),
	('6ae5aa7d54365bd0cb80b8d290e5683c','1','Francus',0),
	('88735a8be62a9ca02ab87a8fa573faef',NULL,'Francuski',1),
	('36966a1402c73cabe1df8e75fb94d724',NULL,'Francuski',0);

/*!40000 ALTER TABLE `service_category` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table service_lesson
# ------------------------------------------------------------

DROP TABLE IF EXISTS `service_lesson`;

CREATE TABLE `service_lesson` (
  `idLesson` char(32) COLLATE utf8_polish_ci NOT NULL,
  `idTeacher` char(32) COLLATE utf8_polish_ci NOT NULL,
  `date` date NOT NULL,
  `startTime` datetime NOT NULL,
  `endTime` datetime DEFAULT NULL,
  `location` varchar(50) COLLATE utf8_polish_ci DEFAULT NULL,
  `idStudent` char(32) COLLATE utf8_polish_ci DEFAULT '0',
  `studentName` varchar(50) COLLATE utf8_polish_ci DEFAULT NULL,
  `description` varchar(100) COLLATE utf8_polish_ci DEFAULT NULL,
  `canceled` tinyint(1) DEFAULT '0',
  `canceledByStudent` tinyint(1) DEFAULT '0',
  `canceledByTeacher` tinyint(1) DEFAULT '0',
  `open` tinyint(1) DEFAULT '0',
  `atTeacherPlace` tinyint(1) DEFAULT '0',
  `atStudentPlace` tinyint(1) DEFAULT '0',
  `deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`idLesson`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

LOCK TABLES `service_lesson` WRITE;
/*!40000 ALTER TABLE `service_lesson` DISABLE KEYS */;

INSERT INTO `service_lesson` (`idLesson`, `idTeacher`, `date`, `startTime`, `endTime`, `location`, `idStudent`, `studentName`, `description`, `canceled`, `canceledByStudent`, `canceledByTeacher`, `open`, `atTeacherPlace`, `atStudentPlace`, `deleted`)
VALUES
	('1','1','2017-01-05','2017-01-05 09:46:25','2017-01-05 10:46:25','Olszówka','10','Zbyszek','Opis',0,0,0,0,1,0,0),
	('2','1','2017-01-05','2017-01-05 09:46:25','2017-01-05 10:46:25','Olszówka',NULL,'Zbyszek','Opis',0,0,0,1,1,0,0),
	('3','1','2017-01-05','2017-01-05 10:46:25','2017-01-05 11:46:25','Olszówka',NULL,'Zbyszek','Opis',0,0,0,1,1,0,0),
	('4','1','2017-01-05','2017-01-05 10:46:25','2017-01-05 11:46:25','Olszówka',NULL,'Zbyszek','Opis',0,0,0,1,0,1,0);

/*!40000 ALTER TABLE `service_lesson` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table service_range
# ------------------------------------------------------------

DROP TABLE IF EXISTS `service_range`;

CREATE TABLE `service_range` (
  `idRange` char(32) COLLATE utf8_polish_ci NOT NULL DEFAULT '',
  `name` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`idRange`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

LOCK TABLES `service_range` WRITE;
/*!40000 ALTER TABLE `service_range` DISABLE KEYS */;

INSERT INTO `service_range` (`idRange`, `name`, `deleted`)
VALUES
	('1','liceum',0),
	('4942bc3bc1a9105ffeeb4dd8576e8b16','studenci',1),
	('4952a784a90e4d551f2625637b8d8ed0','studia',0),
	('bf8f9e09b4d8c743a7dd53198680e9fe','podst',0);

/*!40000 ALTER TABLE `service_range` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table service_teacher
# ------------------------------------------------------------

DROP TABLE IF EXISTS `service_teacher`;

CREATE TABLE `service_teacher` (
  `idTeacher` char(32) COLLATE utf8_polish_ci NOT NULL DEFAULT '',
  `firstName` varchar(50) COLLATE utf8_polish_ci DEFAULT NULL,
  `lastName` varchar(50) COLLATE utf8_polish_ci DEFAULT NULL,
  `email` varchar(30) COLLATE utf8_polish_ci DEFAULT NULL,
  `city` varchar(50) COLLATE utf8_polish_ci DEFAULT NULL,
  `postCode` varchar(6) COLLATE utf8_polish_ci DEFAULT NULL,
  `driveToStudent` tinyint(1) DEFAULT '0',
  `deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`idTeacher`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

LOCK TABLES `service_teacher` WRITE;
/*!40000 ALTER TABLE `service_teacher` DISABLE KEYS */;

INSERT INTO `service_teacher` (`idTeacher`, `firstName`, `lastName`, `email`, `city`, `postCode`, `driveToStudent`, `deleted`)
VALUES
	('1','Zbyszek','Cichański','zbyszek@morele.net','Olszówka','34-730',1,1),
	('cc98bcb18d967952bbcbd3b3b6929b0b','Zbyszek','Cichański','mateusz@onet.pl','Olszówka','34-730',0,0),
	('92822d6df5d089a09c17eb6db4ae0619','Wojtek','Kowalski','wojtek@gmail.com',NULL,NULL,0,1),
	('a71e6cb9c2f2ede3694ddb9f9ac1d20e','Wojtek','Kowalski','wojtek@gmail.com',NULL,NULL,0,0);

/*!40000 ALTER TABLE `service_teacher` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
