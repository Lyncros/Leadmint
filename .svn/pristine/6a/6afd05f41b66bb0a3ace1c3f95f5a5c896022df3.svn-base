# ************************************************************
# Sequel Pro SQL dump
# Version 3348
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: localhost (MySQL 5.1.44)
# Database: leadmint
# Generation Time: 2012-04-17 16:41:07 -0300
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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

LOCK TABLES `campaign` WRITE;
/*!40000 ALTER TABLE `campaign` DISABLE KEYS */;

INSERT INTO `campaign` (`id`, `app_type_id`, `user_id`, `fb_page_id`, `fb_user_id`, `fb_page_title`, `fb_page_description`, `fb_page_link`, `created_at`, `updated_at`, `valid_date`)
VALUES
	(1,1,1,'223391937721128','100000365619835','House_development','','http://www.facebook.com/pages/House_development/223391937721128','2012-04-04 13:43:46','2012-04-06 15:26:52',-1),
	(2,1,1,'223391937721128','100000365619835','House_development','','http://www.facebook.com/pages/House_development/223391937721128','2012-04-09 12:20:02','2012-04-09 12:37:30',-1),
	(4,1,1,'','','','','','2012-04-15 22:30:46','2012-04-15 22:30:46',0);

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
) ENGINE=MyISAM AUTO_INCREMENT=145 DEFAULT CHARSET=latin1;

LOCK TABLES `campaign_configuration` WRITE;
/*!40000 ALTER TABLE `campaign_configuration` DISABLE KEYS */;

INSERT INTO `campaign_configuration` (`id`, `campaign_id`, `field_name`, `field_value`)
VALUES
	(1,1,'app_features',X'6C697465'),
	(2,1,'app_title',X'54686520617070205469746C65'),
	(3,1,'app_description',X'54686520617070206465736372697074696F6E'),
	(4,1,'app_language',X'6573'),
	(5,1,'app_wall_title',X'5468652063617074696F6E206F66207468652077616C6C'),
	(6,1,'app_wall_description',X'546865206465736372697074696F6E206F66207468652077616C6C'),
	(7,1,'app_timer',X'30'),
	(8,1,'app_embedded_wall',X'30'),
	(9,1,'app_avatar',X'30315F686F6D652E6A7067'),
	(10,1,'app_date_teaser',X'31333334313632363236'),
	(11,1,'app_date_campaign',X'31333333393839373830'),
	(12,1,'app_date_close',X'31333337313030313830'),
	(13,1,'app_date_winners',X'31333334313736393830'),
	(14,1,'app_timezone',X'554D33'),
	(15,1,'app_user_requirements',X'6E616D652C656D61696C2C70686F6E652C62697274686461792C67656E6465722C636F756E747279'),
	(16,1,'app_rules',X''),
	(17,1,'look_no_fan_mode',X'68746D6C'),
	(18,1,'look_no_fan_image',X'30315F686F6D652E6A7067'),
	(19,1,'look_no_fan_html',X'3C68313E5468697320697320746865204E6F2046616E2076696577203C2F68313E'),
	(20,1,'look_teaser_mode',X'68746D6C'),
	(21,1,'look_teaser_image',X'30315F686F6D652E6A7067'),
	(22,1,'look_teaser_html',X'3C68313E205468697320697320746865207465617365722076696577203C2F68313E'),
	(23,1,'look_campaign_mode',X'696D616765'),
	(24,1,'look_campaign_image',X'30315F686F6D652E6A7067'),
	(25,1,'look_campaign_html',X'3C68313E54686973206973207468652063616D706169676E20696E2048544D4C206D6F6465203C2F68313E0A0A74686520636F6E74656E742068657265'),
	(26,1,'look_close_mode',X'696D616765'),
	(27,1,'look_close_image',X'7777772E637435746864697374726963742E636F6D202D20323031322D30342D3131202D203133682D34326D2D3437732E706E67'),
	(28,1,'look_close_html',X'3C68313E546869732069732074686520434C4F53454420766965773C2F68313E'),
	(29,1,'look_winners_mode',X'68746D6C'),
	(30,1,'look_winners_image',X'30315F686F6D652E6A7067'),
	(31,1,'look_winners_html',X'3C68313E54686973206973207468652057696E6E65727320566965773C2F68313E'),
	(32,1,'look_css',X'626F6479207B6261636B67726F756E643A234646303030307D'),
	(33,1,'fb_agreement',X'31'),
	(34,1,'tab_1_configured',X'31'),
	(35,1,'tab_2_configured',X'31'),
	(36,1,'tab_3_configured',X'31'),
	(37,2,'app_features',X'6C697465'),
	(38,2,'app_title',X'546573742032'),
	(39,2,'app_description',X'546573742032'),
	(40,2,'app_language',X'65735F4152'),
	(41,2,'app_wall_title',X''),
	(42,2,'app_wall_description',X''),
	(43,2,'app_timer',X'30'),
	(44,2,'app_embedded_wall',X'30'),
	(45,2,'app_avatar',X'30'),
	(46,2,'app_date_teaser',X'31333334353839363032'),
	(47,2,'app_date_campaign',X'31333335313934343030'),
	(48,2,'app_date_close',X'31333336343034303030'),
	(49,2,'app_date_winners',X'31333337303038383030'),
	(50,2,'app_timezone',X'554D33'),
	(51,2,'app_user_requirements',X''),
	(52,2,'app_rules',X''),
	(53,2,'look_no_fan_mode',X'64697361626C6564'),
	(54,2,'look_no_fan_image',X'30'),
	(55,2,'look_no_fan_html',X''),
	(56,2,'look_teaser_mode',X''),
	(57,2,'look_teaser_image',X'30'),
	(58,2,'look_teaser_html',X''),
	(59,2,'look_campaign_mode',X''),
	(60,2,'look_campaign_image',X'30'),
	(61,2,'look_campaign_html',X''),
	(62,2,'look_close_mode',X''),
	(63,2,'look_close_image',X'30'),
	(64,2,'look_close_html',X''),
	(65,2,'look_winners_mode',X''),
	(66,2,'look_winners_image',X'30'),
	(67,2,'look_winners_html',X''),
	(68,2,'look_css',X''),
	(69,2,'fb_agreement',X''),
	(70,2,'tab_1_configured',X'31'),
	(71,2,'tab_2_configured',X'31'),
	(72,2,'tab_3_configured',X'31'),
	(134,4,'look_close_mode',X'64656661756C74'),
	(133,4,'look_campaign_html',X''),
	(132,4,'look_campaign_image',X'30'),
	(131,4,'look_campaign_mode',X'64656661756C74'),
	(130,4,'look_teaser_html',X''),
	(129,4,'look_teaser_image',X'30'),
	(128,4,'look_teaser_mode',X'64656661756C74'),
	(127,4,'look_no_fan_html',X''),
	(126,4,'look_no_fan_image',X'30'),
	(125,4,'look_no_fan_mode',X'64697361626C6564'),
	(124,4,'app_rules',X''),
	(123,4,'app_user_requirements',X'6269727468646179'),
	(122,4,'app_timezone',X'554D33'),
	(121,4,'app_date_winners',X'31333337353633383030'),
	(120,4,'app_date_close',X'31333336393539303030'),
	(119,4,'app_date_campaign',X'31333335373439343030'),
	(118,4,'app_date_teaser',X'31333335313434363436'),
	(117,4,'app_avatar',X'30'),
	(115,4,'app_timer',X'30'),
	(113,4,'app_wall_title',X'4170702077616C6C207469746C65'),
	(110,4,'app_title',X'617070207469746C65'),
	(111,4,'app_description',X'617070206465736372697074696F6E'),
	(114,4,'app_wall_description',X'4170702077616C6C206465736372697074696F6E'),
	(112,4,'app_language',X''),
	(109,4,'app_features',X'6C697465'),
	(116,4,'app_embedded_wall',X'30'),
	(135,4,'look_close_image',X'30'),
	(136,4,'look_close_html',X'64656661756C74'),
	(137,4,'look_winners_mode',X'64656661756C74'),
	(138,4,'look_winners_image',X'30'),
	(139,4,'look_winners_html',X''),
	(140,4,'look_css',X''),
	(141,4,'fb_agreement',X'31'),
	(142,4,'tab_1_configured',X'31'),
	(143,4,'tab_2_configured',X'31'),
	(144,4,'tab_3_configured',X'31');

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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

LOCK TABLES `facebook_user` WRITE;
/*!40000 ALTER TABLE `facebook_user` DISABLE KEYS */;

INSERT INTO `facebook_user` (`id`, `facebook_user_id`, `name`, `first_name`, `middle_name`, `last_name`, `link`, `birthday`, `email`, `timezone`, `locale`, `verified`, `created_at`)
VALUES
	(1,100000365619835,'House Gregory','House','','Gregory','http://www.facebook.com/profile.php?id=100000365619835','0000-00-00','sfarsuau@hotmail.com',-3,'en_US',1,'2012-04-05 21:45:06'),
	(2,0,'','','','','','0000-00-00','',0,'',0,'2012-04-10 10:52:45'),
	(3,100003042458475,'','','','','','0000-00-00','',0,'en_US',0,'2012-04-15 21:15:13'),
	(4,1378190638,'','','','','','0000-00-00','',0,'en_US',0,'2012-04-15 21:18:28');

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
	(1,'Santiago','Far Suau','santiagofs@gmail.com','f8ad6119ed49b17bad5ec3e0ba7d967cd91be535',0,'2012-04-16 16:33:38','127.0.0.1','2012-03-20 14:40:42','2012-04-16 16:33:38','26e1c567a525192f6dcb8bfbfe2e714e488a84bf','en_US'),
	(7,'test','test','santiagofs4@gmail.com','f8ad6119ed49b17bad5ec3e0ba7d967cd91be535',0,'2012-03-27 13:47:06','127.0.0.1','2012-03-27 13:47:06','2012-03-27 13:47:06','','es_AR'),
	(6,'test','test','santiagofs3@gmail.com','f8ad6119ed49b17bad5ec3e0ba7d967cd91be535',0,'2012-03-27 13:46:16','127.0.0.1','2012-03-27 13:46:16','2012-03-27 13:46:16','','es_AR'),
	(5,'test','test','santiagofs2@gmail.com','f8ad6119ed49b17bad5ec3e0ba7d967cd91be535',0,'2012-03-27 13:45:48','127.0.0.1','2012-03-27 13:45:48','2012-03-27 13:45:48','','es_AR'),
	(8,'test','test','santiagofs5@gmail.com','f8ad6119ed49b17bad5ec3e0ba7d967cd91be535',0,'2012-03-27 13:47:32','127.0.0.1','2012-03-27 13:47:32','2012-03-27 13:47:32','','es_AR');

/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user_content
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user_content`;

CREATE TABLE `user_content` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `campaign_id` int(11) DEFAULT NULL,
  `facebook_user_id` bigint(11) DEFAULT NULL,
  `category` varchar(20) DEFAULT NULL,
  `content` text,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

LOCK TABLES `user_content` WRITE;
/*!40000 ALTER TABLE `user_content` DISABLE KEYS */;

INSERT INTO `user_content` (`id`, `campaign_id`, `facebook_user_id`, `category`, `content`, `created_at`)
VALUES
	(1,1,100000365619835,'sweepstakes','a:5:{s:5:\"email\";s:20:\"sfarsuau@hotmail.com\";s:5:\"phone\";s:9:\"the phone\";s:8:\"birthday\";s:12:\"the birthday\";s:6:\"gender\";s:4:\"male\";s:7:\"country\";s:2:\"AF\";}',NULL),
	(2,1,100000365619835,'comment','test',NULL),
	(3,1,100000365619835,'comment','test','2012-04-15 19:23:35'),
	(4,1,100000365619835,'comment','test','2012-04-15 19:24:06'),
	(5,1,100000365619835,'comment','otro test','2012-04-15 19:46:57'),
	(6,1,100000365619835,'comment','new test','2012-04-15 19:47:36'),
	(7,1,100000365619835,'comment','caramba con los comments','2012-04-15 19:48:23'),
	(8,1,100000365619835,'comment','y seguimos comentando','2012-04-15 19:48:56'),
	(14,1,1378190638,'comment','el comentario','2012-04-16 16:29:05'),
	(13,1,1378190638,'sweepstakes','a:5:{s:5:\"email\";s:20:\"santiagofs@gmail.com\";s:5:\"phone\";s:12:\"45454 454545\";s:8:\"birthday\";s:10:\"2012-03-22\";s:6:\"gender\";s:4:\"male\";s:7:\"country\";s:2:\"AF\";}','2012-04-16 16:28:41');

/*!40000 ALTER TABLE `user_content` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
