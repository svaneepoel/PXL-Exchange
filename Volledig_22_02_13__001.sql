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

/*Table structure for table `points` */

DROP TABLE IF EXISTS `points`;

CREATE TABLE `points` (
  `id` int(11) NOT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `information` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `points` */

insert  into `points`(`id`,`longitude`,`latitude`,`information`) values (0,'5.311006','51.230419','Lommel');

/*Table structure for table `user_details` */

DROP TABLE IF EXISTS `user_details`;

CREATE TABLE `user_details` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `picture` varchar(255) DEFAULT '',
  `hobbies` varchar(255) DEFAULT 'No hobbies entered yet',
  `education` varchar(255) DEFAULT 'No education information added yet',
  `birth_date` datetime DEFAULT NULL,
  `facebook` varchar(255) DEFAULT '',
  `twitter` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `user_details` */

insert  into `user_details`(`id`,`user_id`,`picture`,`hobbies`,`education`,`birth_date`,`facebook`,`twitter`) values (1,1,'http://the4travelers.punt.nl/_files/2006-08-19/aap.jpg','lalala','niks','1990-01-01 00:00:00',NULL,'tweet'),(4,18,'','No hobbies entered yet','No education information added yet',NULL,'','');

/*Table structure for table `user_internships` */

DROP TABLE IF EXISTS `user_internships`;

CREATE TABLE `user_internships` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `company_name` varchar(255) DEFAULT '',
  `location` varchar(255) DEFAULT '',
  `latitude` double DEFAULT '0',
  `longitude` double DEFAULT '0',
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `user_internships` */

insert  into `user_internships`(`id`,`user_id`,`company_name`,`location`,`latitude`,`longitude`,`description`) values (1,1,'Test','Niemandsland',5.311006,51.230419,'Apenkwekerij gevestigd in Niemandsland'),(4,18,'','',0,0,NULL);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `anaam` varchar(50) NOT NULL,
  `vnaam` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_active` int(2) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`id`,`anaam`,`vnaam`,`email`,`password`,`is_active`) values (1,'Laermans','Lucas','lucaslaermans@msn.com','cc03e747a6afbbcbf8be7668acfebee5',1),(8,'Laermans','Joske','joslaermans@gmail.com','cc03e747a6afbbcbf8be7668acfebee5',1),(9,'Van Eepoel','Stef','stefve@gmail.com','cc03e747a6afbbcbf8be7668acfebee5',1),(10,'MitchFridge','Dries','frigo@gmail.com','cc03e747a6afbbcbf8be7668acfebee5',1),(11,'Mitch','Dries','mitchie@gmail.com','cc03e747a6afbbcbf8be7668acfebee5',0),(12,'Janssen','Greta','bigboobs@hotmail.com','cc03e747a6afbbcbf8be7668acfebee5',0),(13,'Raeymaekers','Josepha','schoenmaat36@Csharp.net','cc03e747a6afbbcbf8be7668acfebee5',1),(18,'Test','Mitch','mitch.dries@gmail.com','cc03e747a6afbbcbf8be7668acfebee5',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
