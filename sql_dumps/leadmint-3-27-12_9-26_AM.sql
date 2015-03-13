# ************************************************************
# Sequel Pro SQL dump
# Version 3348
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: localhost (MySQL 5.1.44)
# Database: leadmint
# Generation Time: 2012-03-27 09:26:53 -0300
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table campaign
# ------------------------------------------------------------

DROP TABLE IF EXISTS `campaign`;

CREATE TABLE `campaign` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `app_type_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `fb_page_id` varchar(45) DEFAULT NULL,
  `fb_user_id` varchar(45) DEFAULT NULL,
  `fb_page_title` varchar(100) DEFAULT NULL,
  `fb_page_description` text,
  `fb_page_link` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `valid_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_campaign_campaign_type` (`app_type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

LOCK TABLES `campaign` WRITE;
/*!40000 ALTER TABLE `campaign` DISABLE KEYS */;

INSERT INTO `campaign` (`id`, `app_type_id`, `user_id`, `fb_page_id`, `fb_user_id`, `fb_page_title`, `fb_page_description`, `fb_page_link`, `created_at`, `updated_at`, `valid_date`)
VALUES
	(1,1,1,'','','','','','2012-03-26 16:10:41','2012-03-26 16:10:41',NULL);

/*!40000 ALTER TABLE `campaign` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table campaign_configuration
# ------------------------------------------------------------

DROP TABLE IF EXISTS `campaign_configuration`;

CREATE TABLE `campaign_configuration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `campaign_id` int(11) NOT NULL,
  `field_name` varchar(45) DEFAULT NULL,
  `field_value` blob,
  PRIMARY KEY (`id`),
  UNIQUE KEY `index3` (`campaign_id`,`field_name`),
  KEY `fk_campaing_configuration_campaign1` (`campaign_id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

LOCK TABLES `campaign_configuration` WRITE;
/*!40000 ALTER TABLE `campaign_configuration` DISABLE KEYS */;

INSERT INTO `campaign_configuration` (`id`, `campaign_id`, `field_name`, `field_value`)
VALUES
	(1,1,'app_features',X'6C697465'),
	(2,1,'app_title',X'74657374'),
	(3,1,'app_description',X'74657374'),
	(4,1,'app_language',X'65735F4152'),
	(5,1,'app_wall_title',X''),
	(6,1,'app_wall_description',X''),
	(7,1,'app_timer',X'30'),
	(8,1,'app_embedded_wall',X'30'),
	(9,1,'app_avatar',X'30315F686F6D652E6A7067'),
	(10,1,'app_date_teaser',X'31333333333933383431'),
	(11,1,'app_date_campaign',X'31333333393938363431'),
	(12,1,'app_date_close',X'31333335323038323431'),
	(13,1,'app_date_winners',X'31333335383133303431'),
	(14,1,'app_timezone',X'554D33'),
	(15,1,'app_user_requirements',X''),
	(16,1,'app_rules',X''),
	(17,1,'look_no_fan_mode',X'68746D6C'),
	(18,1,'look_no_fan_image',X'30315F686F6D652E6A7067'),
	(19,1,'look_no_fan_html',X'6E6F2066616E2074657874'),
	(20,1,'look_teaser_mode',X'68746D6C'),
	(21,1,'look_teaser_image',X'30'),
	(22,1,'look_teaser_html',X'74656173657220746578740A'),
	(23,1,'look_campaign_mode',X'68746D6C'),
	(24,1,'look_campaign_image',X'30'),
	(25,1,'look_campaign_html',X'63616D706169676E2074657874'),
	(26,1,'look_close_mode',X'68746D6C'),
	(27,1,'look_close_image',X'30'),
	(28,1,'look_close_html',X'636C6F73652074657874'),
	(29,1,'look_winners_mode',X'68746D6C'),
	(30,1,'look_winners_image',X'30'),
	(31,1,'look_winners_html',X'77696E6E6572732074657874'),
	(32,1,'look_css',X'6373732072756C6573'),
	(33,1,'fb_agreement',X'');

/*!40000 ALTER TABLE `campaign_configuration` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `is_super` tinyint(4) DEFAULT NULL,
  `last_login_date` datetime DEFAULT NULL,
  `last_login_ip` varchar(15) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `language` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;

INSERT INTO `user` (`id`, `firstname`, `lastname`, `email`, `password`, `is_super`, `last_login_date`, `last_login_ip`, `created_at`, `updated_at`, `forgotten_password_code`, `language`)
VALUES
	(1,'Santiago','Far Suau','santiagofs@gmail.com','f8ad6119ed49b17bad5ec3e0ba7d967cd91be535',0,'2012-03-26 08:46:27','127.0.0.1','2012-03-20 14:40:42','2012-03-26 09:49:43','26e1c567a525192f6dcb8bfbfe2e714e488a84bf','en_US');

/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
