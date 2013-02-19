/*
SQLyog Community v10.5 
MySQL - 5.5.24-log : Database - users
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`users` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `users`;

/*Table structure for table `blog_posts` */

DROP TABLE IF EXISTS `blog_posts`;

CREATE TABLE `blog_posts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(45) DEFAULT NULL,
  `content` text,
  `create_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `blog_posts` */

insert  into `blog_posts`(`id`,`user_id`,`title`,`content`,`create_time`) values (1,1,'Webtech','Blablabla zever shit','2013-02-19 00:00:00');

/*Table structure for table `user_details` */

DROP TABLE IF EXISTS `user_details`;

CREATE TABLE `user_details` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `hobbies` varchar(255) DEFAULT NULL,
  `education` varchar(255) DEFAULT NULL,
  `birth_date` datetime DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `user_details` */

insert  into `user_details`(`id`,`user_id`,`picture`,`hobbies`,`education`,`birth_date`,`facebook`,`twitter`) values (1,1,'http://the4travelers.punt.nl/_files/2006-08-19/aap.jpg','lalala','niks','1990-01-01 00:00:00',NULL,'tweet');

/*Table structure for table `user_internships` */

DROP TABLE IF EXISTS `user_internships`;

CREATE TABLE `user_internships` (
  `id` int(11) unsigned NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `latitude` double DEFAULT NULL,
  `longitude` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `user_internships` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
