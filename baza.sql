/*
SQLyog Community v13.1.7 (64 bit)
MySQL - 10.4.21-MariaDB : Database - krofne
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`krofne` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `krofne`;

/*Table structure for table `kategorija` */

DROP TABLE IF EXISTS `kategorija`;

CREATE TABLE `kategorija` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `ime` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

/*Data for the table `kategorija` */

insert  into `kategorija`(`id`,`ime`) values 
(1,'cokolada'),
(2,'vanila');

/*Table structure for table `krofna` */

DROP TABLE IF EXISTS `krofna`;

CREATE TABLE `krofna` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `kategorija_id` bigint(20) DEFAULT NULL,
  `naziv` varchar(40) DEFAULT 'null',
  `recept` text DEFAULT NULL,
  `slika` text DEFAULT NULL,
  `kalorije` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `kategorija_id` (`kategorija_id`),
  CONSTRAINT `krofna_ibfk_1` FOREIGN KEY (`kategorija_id`) REFERENCES `kategorija` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

/*Data for the table `krofna` */

insert  into `krofna`(`id`,`kategorija_id`,`naziv`,`recept`,`slika`,`kalorije`) values 
(1,1,'Nutela','brasno, jaja, secer,cokolada','‰PNG\r\n\Z\n',20),
(2,2,'Vannilalalla','Jaja,Brasno,Cimet,Vanila','‰PNG\r\n\Z\n',30);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
