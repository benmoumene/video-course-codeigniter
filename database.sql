/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.1.25-MariaDB : Database - sea_piano
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`sea_piano` /*!40100 DEFAULT CHARACTER SET utf8 */;

/*Table structure for table `sea_course_detail` */

DROP TABLE IF EXISTS `sea_course_detail`;

CREATE TABLE `sea_course_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_course` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text,
  `thumbnail` varchar(255) DEFAULT NULL,
  `video_stream` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sea_course_detail_ibfk_1` (`id_course`),
  CONSTRAINT `sea_course_detail_ibfk_1` FOREIGN KEY (`id_course`) REFERENCES `sea_courses` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `sea_course_detail` */

insert  into `sea_course_detail`(`id`,`id_course`,`title`,`content`,`thumbnail`,`video_stream`,`video`,`status`,`created_time`) values (1,1,'Piano căn bản 1','<p><strong style=\"margin: 0px; padding: 0px; font-family: \'Open Sans\', Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: \'Open Sans\', Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</span></p>','public/uploads/courses/aBd40gko.jpg','public/uploads/courses/NcYz9fpD','public/uploads/courses/NcYz9fpD.mp4',1,'2017-12-10 10:34:40'),(2,1,'Piano cơ bản 2','<p><strong style=\"margin: 0px; padding: 0px; font-family: \'Open Sans\', Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: \'Open Sans\', Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</span></p>','public/uploads/courses/Fo4OVsq7.jpg','public/uploads/courses/loSbhLPa','public/uploads/courses/loSbhLPa.mp4',NULL,'2018-01-08 09:05:03');

/*Table structure for table `sea_courses` */

DROP TABLE IF EXISTS `sea_courses`;

CREATE TABLE `sea_courses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `content` text,
  `thumbnail` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `price_sale` varchar(255) DEFAULT NULL,
  `created_time` datetime DEFAULT NULL,
  `author` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `author` (`author`),
  CONSTRAINT `sea_courses_ibfk_1` FOREIGN KEY (`author`) REFERENCES `sea_users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `sea_courses` */

insert  into `sea_courses`(`id`,`title`,`slug`,`content`,`thumbnail`,`price`,`price_sale`,`created_time`,`author`) values (1,'Khóa học piano cơ bản','khoa-hoc-piano-co-ban','<p>Kh&ocirc;ng cần thiết phải d&agrave;nh ra nhiều thời gian (2-4 tiếng) một ng&agrave;y tập đ&agrave;n mới hiệu quả. Hiệu quả của mỗi lần tập đ&agrave;n phụ thuộc v&agrave;o: sự tập trung của bạn trong khoảng thời gian đ&oacute;, v&agrave; sự nhất qu&aacute;n duy tr&igrave; th&oacute;i quen tập đ&agrave;n</p>','public/uploads/courses/nDJiCbI6.jpg','2000000','1800000','2017-12-10 10:03:18',1);

/*Table structure for table `sea_posts` */

DROP TABLE IF EXISTS `sea_posts`;

CREATE TABLE `sea_posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `content` longtext,
  `short_desc` text,
  `thumbnail` varchar(255) DEFAULT NULL,
  `author` int(11) DEFAULT NULL,
  `created_time` datetime DEFAULT NULL,
  `updated_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `author` (`author`),
  CONSTRAINT `sea_posts_ibfk_1` FOREIGN KEY (`author`) REFERENCES `sea_users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `sea_posts` */

/*Table structure for table `sea_users` */

DROP TABLE IF EXISTS `sea_users`;

CREATE TABLE `sea_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `role` enum('student','editor','admin') DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_time` datetime DEFAULT NULL,
  `updated_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `sea_users` */

insert  into `sea_users`(`id`,`fullname`,`email`,`password`,`phone`,`role`,`status`,`created_time`,`updated_time`) values (1,'Hoang Bui','hoangict@hotmail.com','1bfe76a453e484de74a2cd5fc44bbb10b55b2f92','0978815214','admin',5,'2017-12-02 10:29:24',NULL);

/*Table structure for table `sea_users_courses` */

DROP TABLE IF EXISTS `sea_users_courses`;

CREATE TABLE `sea_users_courses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `course_id` (`course_id`),
  CONSTRAINT `sea_users_courses_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `sea_users` (`id`),
  CONSTRAINT `sea_users_courses_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `sea_courses` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `sea_users_courses` */

insert  into `sea_users_courses`(`id`,`user_id`,`course_id`) values (2,1,1);

/*Table structure for table `sea_users_video_views` */

DROP TABLE IF EXISTS `sea_users_video_views`;

CREATE TABLE `sea_users_video_views` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `video_id` int(11) DEFAULT NULL,
  `views` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `video_id` (`video_id`),
  CONSTRAINT `sea_users_video_views_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `sea_users` (`id`),
  CONSTRAINT `sea_users_video_views_ibfk_2` FOREIGN KEY (`video_id`) REFERENCES `sea_course_detail` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `sea_users_video_views` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
