# ************************************************************
# Sequel Pro SQL dump
# Version 3348
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: localhost (MySQL 5.1.44)
# Database: leadmint
# Generation Time: 2012-04-06 16:31:12 -0300
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
  `valid_date` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_campaign_campaign_type` (`app_type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

LOCK TABLES `campaign` WRITE;
/*!40000 ALTER TABLE `campaign` DISABLE KEYS */;

INSERT INTO `campaign` (`id`, `app_type_id`, `user_id`, `fb_page_id`, `fb_user_id`, `fb_page_title`, `fb_page_description`, `fb_page_link`, `created_at`, `updated_at`, `valid_date`)
VALUES
	(1,1,1,'223391937721128','100000365619835','House_development','','http://www.facebook.com/pages/House_development/223391937721128','2012-04-04 13:43:46','2012-04-06 15:26:52',-1);

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
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

LOCK TABLES `campaign_configuration` WRITE;
/*!40000 ALTER TABLE `campaign_configuration` DISABLE KEYS */;

INSERT INTO `campaign_configuration` (`id`, `campaign_id`, `field_name`, `field_value`)
VALUES
	(1,1,'app_features',X'6C697465'),
	(2,1,'app_title',X'54686520617070205469746C65'),
	(3,1,'app_description',X'54686520617070206465736372697074696F6E'),
	(4,1,'app_language',X'65735F4152'),
	(5,1,'app_wall_title',X''),
	(6,1,'app_wall_description',X''),
	(7,1,'app_timer',X'30'),
	(8,1,'app_embedded_wall',X'30'),
	(9,1,'app_avatar',X'30'),
	(10,1,'app_date_teaser',X'31333334313632363236'),
	(11,1,'app_date_campaign',X'31333334373637333830'),
	(12,1,'app_date_close',X'31333335393736393830'),
	(13,1,'app_date_winners',X'31333336353831373830'),
	(14,1,'app_timezone',X'554D33'),
	(15,1,'app_user_requirements',X''),
	(16,1,'app_rules',X''),
	(17,1,'look_no_fan_mode',X'64697361626C6564'),
	(18,1,'look_no_fan_image',X'30'),
	(19,1,'look_no_fan_html',X''),
	(20,1,'look_teaser_mode',X''),
	(21,1,'look_teaser_image',X'30'),
	(22,1,'look_teaser_html',X''),
	(23,1,'look_campaign_mode',X''),
	(24,1,'look_campaign_image',X'30'),
	(25,1,'look_campaign_html',X''),
	(26,1,'look_close_mode',X''),
	(27,1,'look_close_image',X'30'),
	(28,1,'look_close_html',X''),
	(29,1,'look_winners_mode',X''),
	(30,1,'look_winners_image',X'30'),
	(31,1,'look_winners_html',X''),
	(32,1,'look_css',X''),
	(33,1,'fb_agreement',X''),
	(34,1,'tab_1_configured',X'31'),
	(35,1,'tab_2_configured',X'31'),
	(36,1,'tab_3_configured',X'31');

/*!40000 ALTER TABLE `campaign_configuration` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table facebook_user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `facebook_user`;

CREATE TABLE `facebook_user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `facebook_user_id` bigint(11) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `first_name` varchar(45) DEFAULT NULL,
  `middle_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `timezone` int(11) DEFAULT NULL,
  `locale` varchar(10) DEFAULT NULL,
  `verified` tinyint(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `facebook_user_id` (`facebook_user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

LOCK TABLES `facebook_user` WRITE;
/*!40000 ALTER TABLE `facebook_user` DISABLE KEYS */;

INSERT INTO `facebook_user` (`id`, `facebook_user_id`, `name`, `first_name`, `middle_name`, `last_name`, `link`, `birthday`, `email`, `timezone`, `locale`, `verified`, `created_at`)
VALUES
	(1,100000365619835,'House Gregory','House','','Gregory','http://www.facebook.com/profile.php?id=100000365619835','0000-00-00','sfarsuau@hotmail.com',-3,'en_US',1,'2012-04-05 21:45:06');

/*!40000 ALTER TABLE `facebook_user` ENABLE KEYS */;
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
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;

INSERT INTO `user` (`id`, `firstname`, `lastname`, `email`, `password`, `is_super`, `last_login_date`, `last_login_ip`, `created_at`, `updated_at`, `forgotten_password_code`, `language`)
VALUES
	(1,'Santiago','Far Suau','santiagofs@gmail.com','f8ad6119ed49b17bad5ec3e0ba7d967cd91be535',0,'2012-04-06 13:11:04','127.0.0.1','2012-03-20 14:40:42','2012-04-06 13:11:04','26e1c567a525192f6dcb8bfbfe2e714e488a84bf','en_US'),
	(7,'test','test','santiagofs4@gmail.com','f8ad6119ed49b17bad5ec3e0ba7d967cd91be535',0,'2012-03-27 13:47:06','127.0.0.1','2012-03-27 13:47:06','2012-03-27 13:47:06','','es_AR'),
	(6,'test','test','santiagofs3@gmail.com','f8ad6119ed49b17bad5ec3e0ba7d967cd91be535',0,'2012-03-27 13:46:16','127.0.0.1','2012-03-27 13:46:16','2012-03-27 13:46:16','','es_AR'),
	(5,'test','test','santiagofs2@gmail.com','f8ad6119ed49b17bad5ec3e0ba7d967cd91be535',0,'2012-03-27 13:45:48','127.0.0.1','2012-03-27 13:45:48','2012-03-27 13:45:48','','es_AR'),
	(8,'test','test','santiagofs5@gmail.com','f8ad6119ed49b17bad5ec3e0ba7d967cd91be535',0,'2012-03-27 13:47:32','127.0.0.1','2012-03-27 13:47:32','2012-03-27 13:47:32','','es_AR');

/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
