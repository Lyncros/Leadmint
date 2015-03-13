/*
Navicat MySQL Data Transfer

Source Server         : FrubisTech
Source Server Version : 50141
Source Host           : frubistech.com.ar:3306
Source Database       : leadmint

Target Server Type    : MYSQL
Target Server Version : 50141
File Encoding         : 65001

Date: 2012-07-19 11:55:41
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `campaign`
-- ----------------------------
DROP TABLE IF EXISTS `campaign`;
CREATE TABLE `campaign` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `description` text,
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
  `activation_requested` tinyint(4) DEFAULT NULL,
  `active` tinyint(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_campaign_campaign_type` (`app_type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of campaign
-- ----------------------------
INSERT INTO `campaign` VALUES ('1', null, null, '1', '15', '320254011320287', '631995560', 'Pablo Szachtman Test Page', '', 'http://www.facebook.com/pages/Pablo-Szachtman-Test-Page/320254011320287', '2012-05-11 19:05:04', '2012-05-11 19:14:35', '-1', null, '0');
INSERT INTO `campaign` VALUES ('2', null, null, '1', '15', '320254011320287', '631995560', 'Pablo Szachtman Test Page', '', 'http://www.facebook.com/pages/Pablo-Szachtman-Test-Page/320254011320287', '2012-05-11 19:44:38', '2012-05-21 13:49:34', '-1', null, '1');
INSERT INTO `campaign` VALUES ('3', null, null, '1', '1', '223391937721128', '100000365619835', 'House_development', '', 'http://www.facebook.com/pages/House_development/223391937721128', '2012-05-18 18:03:23', '2012-05-18 19:18:11', '-1', null, '0');
INSERT INTO `campaign` VALUES ('4', null, null, '1', '1', '', '', '', '', '', '2012-05-18 23:37:36', '2012-05-18 23:38:12', '-1', null, '0');
INSERT INTO `campaign` VALUES ('5', 'Test Override', 'Overrride', '1', '1', '223391937721128', '100000365619835', 'House_development', '', 'http://www.facebook.com/pages/House_development/223391937721128', '2012-05-18 23:40:06', '2012-06-24 18:03:12', '-1', null, '1');
INSERT INTO `campaign` VALUES ('6', null, null, '1', '13', '', '', '', '', '', '2012-05-21 12:56:26', '2012-05-21 12:56:26', '0', null, '0');
INSERT INTO `campaign` VALUES ('7', null, null, '1', '13', '341389082582132', '100003402403277', 'Test2', '', 'http://www.facebook.com/pages/Test2/341389082582132', '2012-05-21 13:05:14', '2012-05-21 13:09:59', '-1', null, '1');
INSERT INTO `campaign` VALUES ('8', null, null, '1', '15', '150159241773152', '631995560', 'Timeline page', '', 'http://www.facebook.com/pages/Timeline-page/150159241773152', '2012-05-21 13:14:20', '2012-05-21 13:44:07', '-1', null, '1');
INSERT INTO `campaign` VALUES ('9', null, null, '1', '15', '', '', '', '', '', '2012-05-24 13:01:18', '2012-05-24 13:01:18', '0', null, null);
INSERT INTO `campaign` VALUES ('10', null, null, '1', '15', '200950979970702', '100000365619835', 'Fran Nadamas', '', 'http://www.facebook.com/pages/Fran-Nadamas/200950979970702', '2012-05-24 15:36:35', '2012-05-24 15:38:15', '-1', null, '0');
INSERT INTO `campaign` VALUES ('11', null, null, '1', '15', '200950979970702', '100000365619835', 'Fran Nadamas', '', 'http://www.facebook.com/pages/Fran-Nadamas/200950979970702', '2012-05-24 15:42:10', '2012-05-24 15:43:48', '-1', null, '1');
INSERT INTO `campaign` VALUES ('12', null, null, '1', '13', '167746906685364', '100003402403277', 'Test6', '', 'http://www.facebook.com/pages/Test6/167746906685364', '2012-05-24 17:45:32', '2012-05-24 17:52:25', '-1', null, '1');
INSERT INTO `campaign` VALUES ('13', 'test', 'test', '1', '1', '', '', '', '', '', '2012-05-29 20:12:58', '2012-06-24 18:03:25', '0', null, null);
INSERT INTO `campaign` VALUES ('14', null, null, '1', '13', '', '', '', '', '', '2012-05-31 18:18:13', '2012-05-31 18:18:13', '0', null, null);
INSERT INTO `campaign` VALUES ('15', null, null, '1', '13', '', '', '', '', '', '2012-06-04 20:12:28', '2012-06-04 20:12:28', '0', null, null);
INSERT INTO `campaign` VALUES ('16', null, null, '1', '15', '', '', '', '', '', '2012-06-08 16:41:53', '2012-06-08 16:41:53', '0', null, null);
INSERT INTO `campaign` VALUES ('17', null, null, '1', '1', '', '', '', '', '', '2012-06-15 15:46:09', '2012-06-15 15:46:09', '0', null, null);
INSERT INTO `campaign` VALUES ('18', null, null, '1', '15', '', '', '', '', '', '2012-06-18 12:14:14', '2012-06-18 12:14:14', '0', null, null);
INSERT INTO `campaign` VALUES ('19', '', '', '1', '6', '', '', '', '', '', '2012-06-25 11:40:23', '2012-06-25 11:40:23', '0', '0', '0');
INSERT INTO `campaign` VALUES ('20', 'Sorteo Leadmint 10', 'Sorteo de Prueba', '1', '6', '136607469773513', '689991521', 'App Dev', '', 'http://www.facebook.com/pages/App-Dev/136607469773513', '2012-06-25 17:20:50', '2012-06-25 18:19:15', '-1', '0', '1');
INSERT INTO `campaign` VALUES ('21', 'fgsagta', 'bagagh', '1', '8', '', '', '', '', '', '2012-07-12 16:30:04', '2012-07-12 16:30:30', '0', '0', '0');
INSERT INTO `campaign` VALUES ('22', '', '', '1', '8', '', '', '', '', '', '2012-07-12 17:43:06', '2012-07-12 17:43:06', '0', '0', '0');

-- ----------------------------
-- Table structure for `campaign_configuration`
-- ----------------------------
DROP TABLE IF EXISTS `campaign_configuration`;
CREATE TABLE `campaign_configuration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `campaign_id` int(11) NOT NULL,
  `field_name` varchar(45) DEFAULT NULL,
  `field_value` blob,
  PRIMARY KEY (`id`),
  UNIQUE KEY `index3` (`campaign_id`,`field_name`),
  KEY `fk_campaing_configuration_campaign1` (`campaign_id`)
) ENGINE=MyISAM AUTO_INCREMENT=857 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of campaign_configuration
-- ----------------------------
INSERT INTO `campaign_configuration` VALUES ('1', '1', 'app_features', 0x66756C6C);
INSERT INTO `campaign_configuration` VALUES ('2', '1', 'app_title', 0x546974756C6F206465206D692063616D7061C3B16120646520707275656261);
INSERT INTO `campaign_configuration` VALUES ('3', '1', 'app_description', 0x4D692063616D7061C3B1612064652070727565626120766120612070726574656E64657220726F6D70657220746F6461206C612061706C6963616369C3B36E20706172612076657220736920657374C3A1206269656E2068656368612E2054656E6472C3A120C3A97869746F3F4D692063616D7061C3B1612064652070727565626120766120612070726574656E64657220726F6D70657220746F6461206C612061706C6963616369C3B36E20706172612076657220736920657374C3A1206269656E2068656368612E2054656E6472C3A120C3A97869746F3F4D692063616D7061C3B1612064652070727565626120766120612070726574656E64657220726F6D70657220746F6461206C612061706C6963616369C3B36E20706172612076657220736920657374C3A1206269656E2068656368612E2054656E6472C3A120C3A97869746F3F4D692063616D7061C3B1612064652070727565626120766120612070726574656E64657220726F6D70657220746F6461206C612061706C6963616369C3B36E20706172612076657220736920657374C3A1206269656E2068656368612E2054656E6472C3A120C3A97869746F3F);
INSERT INTO `campaign_configuration` VALUES ('4', '1', 'app_language', 0x6573);
INSERT INTO `campaign_configuration` VALUES ('5', '1', 'app_wall_title', 0x45737461206573206D69207075626C6963616369C3B36E20656E20656C206D75726F);
INSERT INTO `campaign_configuration` VALUES ('6', '1', 'app_wall_description', 0x592065737465206573206D6920706F737420656E20656C206D75726F2E);
INSERT INTO `campaign_configuration` VALUES ('7', '1', 'app_timer', 0x31);
INSERT INTO `campaign_configuration` VALUES ('8', '1', 'app_embedded_wall', 0x31);
INSERT INTO `campaign_configuration` VALUES ('9', '1', 'app_avatar', 0x6D75726F2E6A7067);
INSERT INTO `campaign_configuration` VALUES ('10', '1', 'app_date_teaser', 0x31333337333637393034);
INSERT INTO `campaign_configuration` VALUES ('11', '1', 'app_date_campaign', 0x31333235343434373030);
INSERT INTO `campaign_configuration` VALUES ('12', '1', 'app_date_close', 0x31333336353930333030);
INSERT INTO `campaign_configuration` VALUES ('13', '1', 'app_date_winners', 0x31333431303833313030);
INSERT INTO `campaign_configuration` VALUES ('14', '1', 'app_timezone', 0x554D33);
INSERT INTO `campaign_configuration` VALUES ('15', '1', 'app_user_requirements', 0x2C6E616D652C656D61696C2C70686F6E652C62697274686461792C67656E6465722C636F756E7472792C637573746F6D);
INSERT INTO `campaign_configuration` VALUES ('16', '1', 'app_user_requirements_custom_label', 0x517565206F70696EC3A1732064652052656E61756C743F);
INSERT INTO `campaign_configuration` VALUES ('17', '1', 'app_rules', 0x446F6E646520667565726F6E2061207061726172206D69732074C3A9726D696E6F73207920636F6E646963696F6E65733F0A446F6E646520667565726F6E2061207061726172206D69732074C3A9726D696E6F73207920636F6E646963696F6E65733F0A0A0A446F6E646520667565726F6E2061207061726172206D69732074C3A9726D696E6F73207920636F6E646963696F6E65733F0A446F6E646520667565726F6E2061207061726172206D69732074C3A9726D696E6F73207920636F6E646963696F6E65733F0A0A446F6E646520667565726F6E2061207061726172206D69732074C3A9726D696E6F73207920636F6E646963696F6E65733F0A446F6E646520667565726F6E2061207061726172206D69732074C3A9726D696E6F73207920636F6E646963696F6E65733F0A0A446F6E646520667565726F6E2061207061726172206D69732074C3A9726D696E6F73207920636F6E646963696F6E65733F0A446F6E646520667565726F6E2061207061726172206D69732074C3A9726D696E6F73207920636F6E646963696F6E65733F0A0A5920636F6E20C3A96C207465C3B1612064656C20656E636F64696E673F2056C3B37320C2BF646563C3AD733F207175652066756E63696F6E613F0A);
INSERT INTO `campaign_configuration` VALUES ('18', '1', 'look_no_fan_mode', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('19', '1', 'look_no_fan_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('20', '1', 'look_no_fan_html', '');
INSERT INTO `campaign_configuration` VALUES ('21', '1', 'look_teaser_mode', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('22', '1', 'look_teaser_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('23', '1', 'look_teaser_html', '');
INSERT INTO `campaign_configuration` VALUES ('24', '1', 'look_campaign_mode', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('25', '1', 'look_campaign_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('26', '1', 'look_campaign_html', '');
INSERT INTO `campaign_configuration` VALUES ('27', '1', 'look_close_mode', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('28', '1', 'look_close_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('29', '1', 'look_close_html', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('30', '1', 'look_winners_mode', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('31', '1', 'look_winners_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('32', '1', 'look_winners_html', '');
INSERT INTO `campaign_configuration` VALUES ('33', '1', 'look_css', '');
INSERT INTO `campaign_configuration` VALUES ('34', '1', 'fb_agreement', 0x31);
INSERT INTO `campaign_configuration` VALUES ('35', '1', 'google_analytics', 0x55412D31303436383239372D31);
INSERT INTO `campaign_configuration` VALUES ('36', '1', 'tab_1_configured', 0x31);
INSERT INTO `campaign_configuration` VALUES ('37', '1', 'tab_2_configured', 0x31);
INSERT INTO `campaign_configuration` VALUES ('38', '1', 'tab_3_configured', 0x31);
INSERT INTO `campaign_configuration` VALUES ('39', '2', 'app_features', 0x66756C6C);
INSERT INTO `campaign_configuration` VALUES ('40', '2', 'app_title', 0x5072756562612064652063616D7061C3B161207375706572707565737461);
INSERT INTO `campaign_configuration` VALUES ('41', '2', 'app_description', 0x51756965726F20686163657220756E612063616D7061C3B16120792076657220736920696E7374616C616E646F20656E206C61206D69736D612066616E706167652C206D65207069736120746F646F2C206578706C6F746120656C206D756E646F206F20717565206F63757272652E);
INSERT INTO `campaign_configuration` VALUES ('42', '2', 'app_language', 0x6573);
INSERT INTO `campaign_configuration` VALUES ('43', '2', 'app_wall_title', 0x617373617373);
INSERT INTO `campaign_configuration` VALUES ('44', '2', 'app_wall_description', 0x517565206F637572726972C3A13F);
INSERT INTO `campaign_configuration` VALUES ('45', '2', 'app_timer', 0x31);
INSERT INTO `campaign_configuration` VALUES ('46', '2', 'app_embedded_wall', 0x31);
INSERT INTO `campaign_configuration` VALUES ('47', '2', 'app_avatar', 0x30);
INSERT INTO `campaign_configuration` VALUES ('48', '2', 'app_date_teaser', 0x31333337333730323738);
INSERT INTO `campaign_configuration` VALUES ('49', '2', 'app_date_campaign', 0x31333335393031343430);
INSERT INTO `campaign_configuration` VALUES ('50', '2', 'app_date_close', 0x31333339313834363430);
INSERT INTO `campaign_configuration` VALUES ('51', '2', 'app_date_winners', 0x31333339373839343430);
INSERT INTO `campaign_configuration` VALUES ('52', '2', 'app_timezone', 0x554D33);
INSERT INTO `campaign_configuration` VALUES ('53', '2', 'app_user_requirements', 0x2C6E616D652C656D61696C2C70686F6E652C62697274686461792C67656E6465722C636F756E7472792C637573746F6D);
INSERT INTO `campaign_configuration` VALUES ('54', '2', 'app_user_requirements_custom_label', 0x5175652074652067757374613F66);
INSERT INTO `campaign_configuration` VALUES ('55', '2', 'app_rules', 0x6166736466);
INSERT INTO `campaign_configuration` VALUES ('56', '2', 'look_no_fan_mode', 0x64697361626C6564);
INSERT INTO `campaign_configuration` VALUES ('57', '2', 'look_no_fan_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('58', '2', 'look_no_fan_html', '');
INSERT INTO `campaign_configuration` VALUES ('59', '2', 'look_teaser_mode', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('60', '2', 'look_teaser_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('61', '2', 'look_teaser_html', '');
INSERT INTO `campaign_configuration` VALUES ('62', '2', 'look_campaign_mode', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('63', '2', 'look_campaign_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('64', '2', 'look_campaign_html', '');
INSERT INTO `campaign_configuration` VALUES ('65', '2', 'look_close_mode', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('66', '2', 'look_close_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('67', '2', 'look_close_html', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('68', '2', 'look_winners_mode', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('69', '2', 'look_winners_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('70', '2', 'look_winners_html', '');
INSERT INTO `campaign_configuration` VALUES ('71', '2', 'look_css', '');
INSERT INTO `campaign_configuration` VALUES ('72', '2', 'fb_agreement', 0x31);
INSERT INTO `campaign_configuration` VALUES ('73', '2', 'google_analytics', 0x61736173);
INSERT INTO `campaign_configuration` VALUES ('74', '2', 'tab_1_configured', 0x31);
INSERT INTO `campaign_configuration` VALUES ('75', '2', 'tab_2_configured', 0x31);
INSERT INTO `campaign_configuration` VALUES ('76', '2', 'tab_3_configured', 0x31);
INSERT INTO `campaign_configuration` VALUES ('77', '3', 'app_features', 0x6C697465);
INSERT INTO `campaign_configuration` VALUES ('78', '3', 'app_title', 0x4D79204E65772043616D706174696E);
INSERT INTO `campaign_configuration` VALUES ('79', '3', 'app_description', 0x546865204465736372697074696F6E);
INSERT INTO `campaign_configuration` VALUES ('80', '3', 'app_language', '');
INSERT INTO `campaign_configuration` VALUES ('81', '3', 'app_wall_title', 0x54686973206973206D792077616C6C207469746C65);
INSERT INTO `campaign_configuration` VALUES ('82', '3', 'app_wall_description', 0x54686973206973206D792077616C6C206465736372697074696F6E);
INSERT INTO `campaign_configuration` VALUES ('83', '3', 'app_timer', 0x30);
INSERT INTO `campaign_configuration` VALUES ('84', '3', 'app_embedded_wall', 0x30);
INSERT INTO `campaign_configuration` VALUES ('85', '3', 'app_avatar', 0x30);
INSERT INTO `campaign_configuration` VALUES ('86', '3', 'app_date_teaser', 0x31333337393639303033);
INSERT INTO `campaign_configuration` VALUES ('87', '3', 'app_date_campaign', 0x31333335383935333830);
INSERT INTO `campaign_configuration` VALUES ('88', '3', 'app_date_close', 0x31333338343837333830);
INSERT INTO `campaign_configuration` VALUES ('89', '3', 'app_date_winners', 0x31333430333838313830);
INSERT INTO `campaign_configuration` VALUES ('90', '3', 'app_timezone', 0x554D33);
INSERT INTO `campaign_configuration` VALUES ('91', '3', 'app_user_requirements', 0x2C6E616D652C656D61696C2C70686F6E652C62697274686461792C67656E6465722C636F756E7472792C637573746F6D);
INSERT INTO `campaign_configuration` VALUES ('92', '3', 'app_user_requirements_custom_label', 0x74686520637573746F6D206669656C64206C6162656C);
INSERT INTO `campaign_configuration` VALUES ('93', '3', 'app_rules', '');
INSERT INTO `campaign_configuration` VALUES ('94', '3', 'look_no_fan_mode', 0x64697361626C6564);
INSERT INTO `campaign_configuration` VALUES ('95', '3', 'look_no_fan_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('96', '3', 'look_no_fan_html', '');
INSERT INTO `campaign_configuration` VALUES ('97', '3', 'look_teaser_mode', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('98', '3', 'look_teaser_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('99', '3', 'look_teaser_html', '');
INSERT INTO `campaign_configuration` VALUES ('100', '3', 'look_campaign_mode', 0x68746D6C);
INSERT INTO `campaign_configuration` VALUES ('101', '3', 'look_campaign_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('102', '3', 'look_campaign_html', 0x3C68313E54686973206973206D792063616D706169676E3C2F68313E656A6579213C62723E);
INSERT INTO `campaign_configuration` VALUES ('103', '3', 'look_close_mode', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('104', '3', 'look_close_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('105', '3', 'look_close_html', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('106', '3', 'look_winners_mode', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('107', '3', 'look_winners_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('108', '3', 'look_winners_html', '');
INSERT INTO `campaign_configuration` VALUES ('109', '3', 'look_css', 0x626F647920207B6261636B67726F756E643A20234646303030307D);
INSERT INTO `campaign_configuration` VALUES ('110', '3', 'fb_agreement', 0x31);
INSERT INTO `campaign_configuration` VALUES ('111', '3', 'google_analytics', '');
INSERT INTO `campaign_configuration` VALUES ('112', '3', 'tab_1_configured', 0x31);
INSERT INTO `campaign_configuration` VALUES ('113', '3', 'tab_2_configured', 0x31);
INSERT INTO `campaign_configuration` VALUES ('114', '3', 'tab_3_configured', 0x31);
INSERT INTO `campaign_configuration` VALUES ('115', '3', 'app_winners_extract_mode', 0x62616C6C6F74);
INSERT INTO `campaign_configuration` VALUES ('116', '4', 'app_features', 0x6C697465);
INSERT INTO `campaign_configuration` VALUES ('117', '4', 'app_title', 0x4F766572726964652063616D706169676E);
INSERT INTO `campaign_configuration` VALUES ('118', '4', 'app_description', 0x4F76657272696465204465736372697074696F6E);
INSERT INTO `campaign_configuration` VALUES ('119', '4', 'app_language', '');
INSERT INTO `campaign_configuration` VALUES ('120', '4', 'app_wall_title', 0x61736466);
INSERT INTO `campaign_configuration` VALUES ('121', '4', 'app_wall_description', 0x61736466);
INSERT INTO `campaign_configuration` VALUES ('122', '4', 'app_timer', 0x30);
INSERT INTO `campaign_configuration` VALUES ('123', '4', 'app_embedded_wall', 0x30);
INSERT INTO `campaign_configuration` VALUES ('124', '4', 'app_avatar', 0x30);
INSERT INTO `campaign_configuration` VALUES ('125', '4', 'app_date_teaser', 0x31333337393839303536);
INSERT INTO `campaign_configuration` VALUES ('126', '4', 'app_date_campaign', 0x31333335393135343230);
INSERT INTO `campaign_configuration` VALUES ('127', '4', 'app_date_close', 0x31333338353037343230);
INSERT INTO `campaign_configuration` VALUES ('128', '4', 'app_date_winners', 0x31333431303939343230);
INSERT INTO `campaign_configuration` VALUES ('129', '4', 'app_timezone', 0x554D33);
INSERT INTO `campaign_configuration` VALUES ('130', '4', 'app_user_requirements', '');
INSERT INTO `campaign_configuration` VALUES ('131', '4', 'app_user_requirements_custom_label', '');
INSERT INTO `campaign_configuration` VALUES ('132', '4', 'app_rules', '');
INSERT INTO `campaign_configuration` VALUES ('133', '4', 'look_no_fan_mode', 0x64697361626C6564);
INSERT INTO `campaign_configuration` VALUES ('134', '4', 'look_no_fan_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('135', '4', 'look_no_fan_html', '');
INSERT INTO `campaign_configuration` VALUES ('136', '4', 'look_teaser_mode', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('137', '4', 'look_teaser_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('138', '4', 'look_teaser_html', '');
INSERT INTO `campaign_configuration` VALUES ('139', '4', 'look_campaign_mode', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('140', '4', 'look_campaign_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('141', '4', 'look_campaign_html', '');
INSERT INTO `campaign_configuration` VALUES ('142', '4', 'look_close_mode', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('143', '4', 'look_close_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('144', '4', 'look_close_html', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('145', '4', 'look_winners_mode', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('146', '4', 'look_winners_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('147', '4', 'look_winners_html', '');
INSERT INTO `campaign_configuration` VALUES ('148', '4', 'look_css', '');
INSERT INTO `campaign_configuration` VALUES ('149', '4', 'fb_agreement', 0x31);
INSERT INTO `campaign_configuration` VALUES ('150', '4', 'google_analytics', '');
INSERT INTO `campaign_configuration` VALUES ('151', '4', 'tab_1_configured', 0x31);
INSERT INTO `campaign_configuration` VALUES ('152', '4', 'tab_2_configured', 0x31);
INSERT INTO `campaign_configuration` VALUES ('153', '4', 'tab_3_configured', 0x31);
INSERT INTO `campaign_configuration` VALUES ('154', '4', 'app_winners_extract_mode', 0x62616C6C6F74);
INSERT INTO `campaign_configuration` VALUES ('155', '5', 'app_features', 0x66756C6C);
INSERT INTO `campaign_configuration` VALUES ('156', '5', 'app_title', 0x54657374204F76657272696465);
INSERT INTO `campaign_configuration` VALUES ('157', '5', 'app_description', 0x4F7665727272696465);
INSERT INTO `campaign_configuration` VALUES ('158', '5', 'app_language', '');
INSERT INTO `campaign_configuration` VALUES ('159', '5', 'app_wall_title', 0x6173646661736466);
INSERT INTO `campaign_configuration` VALUES ('160', '5', 'app_wall_description', 0x6173646661736466);
INSERT INTO `campaign_configuration` VALUES ('161', '5', 'app_timer', 0x31);
INSERT INTO `campaign_configuration` VALUES ('162', '5', 'app_embedded_wall', 0x31);
INSERT INTO `campaign_configuration` VALUES ('163', '5', 'app_avatar', 0x30);
INSERT INTO `campaign_configuration` VALUES ('164', '5', 'app_date_teaser', 0x31333337393839323036);
INSERT INTO `campaign_configuration` VALUES ('165', '5', 'app_date_campaign', 0x31333337313235323030);
INSERT INTO `campaign_configuration` VALUES ('166', '5', 'app_date_close', 0x31333339383033363030);
INSERT INTO `campaign_configuration` VALUES ('167', '5', 'app_date_winners', 0x31333431303939363030);
INSERT INTO `campaign_configuration` VALUES ('168', '5', 'app_timezone', 0x554D33);
INSERT INTO `campaign_configuration` VALUES ('169', '5', 'app_user_requirements', 0x2C6E616D652C656D61696C2C70686F6E652C62697274686461792C67656E6465722C636F756E7472792C637573746F6D);
INSERT INTO `campaign_configuration` VALUES ('170', '5', 'app_user_requirements_custom_label', 0x637573746F6D206669656C64);
INSERT INTO `campaign_configuration` VALUES ('171', '5', 'app_rules', '');
INSERT INTO `campaign_configuration` VALUES ('172', '5', 'look_no_fan_mode', 0x64697361626C6564);
INSERT INTO `campaign_configuration` VALUES ('173', '5', 'look_no_fan_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('174', '5', 'look_no_fan_html', '');
INSERT INTO `campaign_configuration` VALUES ('175', '5', 'look_teaser_mode', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('176', '5', 'look_teaser_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('177', '5', 'look_teaser_html', '');
INSERT INTO `campaign_configuration` VALUES ('178', '5', 'look_campaign_mode', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('179', '5', 'look_campaign_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('180', '5', 'look_campaign_html', '');
INSERT INTO `campaign_configuration` VALUES ('181', '5', 'look_close_mode', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('182', '5', 'look_close_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('183', '5', 'look_close_html', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('184', '5', 'look_winners_mode', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('185', '5', 'look_winners_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('186', '5', 'look_winners_html', '');
INSERT INTO `campaign_configuration` VALUES ('187', '5', 'look_css', '');
INSERT INTO `campaign_configuration` VALUES ('188', '5', 'fb_agreement', 0x31);
INSERT INTO `campaign_configuration` VALUES ('189', '5', 'google_analytics', '');
INSERT INTO `campaign_configuration` VALUES ('190', '5', 'tab_1_configured', 0x31);
INSERT INTO `campaign_configuration` VALUES ('191', '5', 'tab_2_configured', 0x31);
INSERT INTO `campaign_configuration` VALUES ('192', '5', 'tab_3_configured', 0x31);
INSERT INTO `campaign_configuration` VALUES ('193', '5', 'app_winners_extract_mode', 0x62616C6C6F74);
INSERT INTO `campaign_configuration` VALUES ('194', '6', 'app_features', 0x6C697465);
INSERT INTO `campaign_configuration` VALUES ('195', '6', 'app_title', '');
INSERT INTO `campaign_configuration` VALUES ('196', '6', 'app_description', '');
INSERT INTO `campaign_configuration` VALUES ('197', '6', 'app_language', '');
INSERT INTO `campaign_configuration` VALUES ('198', '6', 'app_wall_title', '');
INSERT INTO `campaign_configuration` VALUES ('199', '6', 'app_wall_description', '');
INSERT INTO `campaign_configuration` VALUES ('200', '6', 'app_timer', 0x30);
INSERT INTO `campaign_configuration` VALUES ('201', '6', 'app_embedded_wall', 0x30);
INSERT INTO `campaign_configuration` VALUES ('202', '6', 'app_avatar', 0x30);
INSERT INTO `campaign_configuration` VALUES ('203', '6', 'app_date_teaser', 0x31333338323039373836);
INSERT INTO `campaign_configuration` VALUES ('204', '6', 'app_date_campaign', 0x31333338383134353836);
INSERT INTO `campaign_configuration` VALUES ('205', '6', 'app_date_close', 0x31333430303234313836);
INSERT INTO `campaign_configuration` VALUES ('206', '6', 'app_date_winners', 0x31333430363238393836);
INSERT INTO `campaign_configuration` VALUES ('207', '6', 'app_timezone', 0x554D33);
INSERT INTO `campaign_configuration` VALUES ('208', '6', 'app_user_requirements', '');
INSERT INTO `campaign_configuration` VALUES ('209', '6', 'app_user_requirements_custom_label', '');
INSERT INTO `campaign_configuration` VALUES ('210', '6', 'app_rules', '');
INSERT INTO `campaign_configuration` VALUES ('211', '6', 'look_no_fan_mode', 0x64697361626C6564);
INSERT INTO `campaign_configuration` VALUES ('212', '6', 'look_no_fan_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('213', '6', 'look_no_fan_html', '');
INSERT INTO `campaign_configuration` VALUES ('214', '6', 'look_teaser_mode', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('215', '6', 'look_teaser_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('216', '6', 'look_teaser_html', '');
INSERT INTO `campaign_configuration` VALUES ('217', '6', 'look_campaign_mode', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('218', '6', 'look_campaign_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('219', '6', 'look_campaign_html', '');
INSERT INTO `campaign_configuration` VALUES ('220', '6', 'look_close_mode', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('221', '6', 'look_close_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('222', '6', 'look_close_html', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('223', '6', 'look_winners_mode', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('224', '6', 'look_winners_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('225', '6', 'look_winners_html', '');
INSERT INTO `campaign_configuration` VALUES ('226', '6', 'look_css', '');
INSERT INTO `campaign_configuration` VALUES ('227', '6', 'fb_agreement', '');
INSERT INTO `campaign_configuration` VALUES ('228', '6', 'google_analytics', '');
INSERT INTO `campaign_configuration` VALUES ('229', '6', 'tab_1_configured', '');
INSERT INTO `campaign_configuration` VALUES ('230', '6', 'tab_2_configured', '');
INSERT INTO `campaign_configuration` VALUES ('231', '6', 'tab_3_configured', '');
INSERT INTO `campaign_configuration` VALUES ('232', '6', 'app_winners_extract_mode', 0x62616C6C6F74);
INSERT INTO `campaign_configuration` VALUES ('233', '7', 'app_features', 0x66756C6C);
INSERT INTO `campaign_configuration` VALUES ('234', '7', 'app_title', 0x4E756576612063616D7061C3B161);
INSERT INTO `campaign_configuration` VALUES ('235', '7', 'app_description', 0x6C6C616C616C616C61);
INSERT INTO `campaign_configuration` VALUES ('236', '7', 'app_language', 0x6573);
INSERT INTO `campaign_configuration` VALUES ('237', '7', 'app_wall_title', 0x4772616369617321);
INSERT INTO `campaign_configuration` VALUES ('238', '7', 'app_wall_description', 0x6C616C616C616C6C616C61);
INSERT INTO `campaign_configuration` VALUES ('239', '7', 'app_timer', 0x31);
INSERT INTO `campaign_configuration` VALUES ('240', '7', 'app_embedded_wall', 0x31);
INSERT INTO `campaign_configuration` VALUES ('241', '7', 'app_avatar', 0x4176617461722E6A7067);
INSERT INTO `campaign_configuration` VALUES ('242', '7', 'app_date_teaser', 0x31333338323130333134);
INSERT INTO `campaign_configuration` VALUES ('243', '7', 'app_date_campaign', 0x31333337313733353030);
INSERT INTO `campaign_configuration` VALUES ('244', '7', 'app_date_close', 0x31333430303234373030);
INSERT INTO `campaign_configuration` VALUES ('245', '7', 'app_date_winners', 0x31333430363239353030);
INSERT INTO `campaign_configuration` VALUES ('246', '7', 'app_timezone', 0x554D33);
INSERT INTO `campaign_configuration` VALUES ('247', '7', 'app_user_requirements', 0x2C6E616D652C656D61696C2C70686F6E652C62697274686461792C67656E6465722C636F756E7472792C637573746F6D);
INSERT INTO `campaign_configuration` VALUES ('248', '7', 'app_user_requirements_custom_label', 0x4F74726F73);
INSERT INTO `campaign_configuration` VALUES ('249', '7', 'app_rules', 0x4261736573207920636F6E646963696F6E657321);
INSERT INTO `campaign_configuration` VALUES ('250', '7', 'look_no_fan_mode', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('251', '7', 'look_no_fan_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('252', '7', 'look_no_fan_html', '');
INSERT INTO `campaign_configuration` VALUES ('253', '7', 'look_teaser_mode', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('254', '7', 'look_teaser_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('255', '7', 'look_teaser_html', '');
INSERT INTO `campaign_configuration` VALUES ('256', '7', 'look_campaign_mode', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('257', '7', 'look_campaign_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('258', '7', 'look_campaign_html', '');
INSERT INTO `campaign_configuration` VALUES ('259', '7', 'look_close_mode', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('260', '7', 'look_close_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('261', '7', 'look_close_html', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('262', '7', 'look_winners_mode', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('263', '7', 'look_winners_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('264', '7', 'look_winners_html', '');
INSERT INTO `campaign_configuration` VALUES ('265', '7', 'look_css', '');
INSERT INTO `campaign_configuration` VALUES ('266', '7', 'fb_agreement', 0x31);
INSERT INTO `campaign_configuration` VALUES ('267', '7', 'google_analytics', '');
INSERT INTO `campaign_configuration` VALUES ('268', '7', 'tab_1_configured', 0x31);
INSERT INTO `campaign_configuration` VALUES ('269', '7', 'tab_2_configured', 0x31);
INSERT INTO `campaign_configuration` VALUES ('270', '7', 'tab_3_configured', 0x31);
INSERT INTO `campaign_configuration` VALUES ('271', '7', 'app_winners_extract_mode', 0x62616C6C6F74);
INSERT INTO `campaign_configuration` VALUES ('272', '8', 'app_features', 0x6C697465);
INSERT INTO `campaign_configuration` VALUES ('273', '8', 'app_title', 0x50727565626120646520677561726461646F206465207465726D696E6F73207920636F6E646963696F6E6573);
INSERT INTO `campaign_configuration` VALUES ('274', '8', 'app_description', 0x646173646173);
INSERT INTO `campaign_configuration` VALUES ('275', '8', 'app_language', 0x6573);
INSERT INTO `campaign_configuration` VALUES ('276', '8', 'app_wall_title', 0x646173646173);
INSERT INTO `campaign_configuration` VALUES ('277', '8', 'app_wall_description', 0x6461736461);
INSERT INTO `campaign_configuration` VALUES ('278', '8', 'app_timer', 0x30);
INSERT INTO `campaign_configuration` VALUES ('279', '8', 'app_embedded_wall', 0x30);
INSERT INTO `campaign_configuration` VALUES ('280', '8', 'app_avatar', 0x30);
INSERT INTO `campaign_configuration` VALUES ('281', '8', 'app_date_teaser', 0x31333338323130383630);
INSERT INTO `campaign_configuration` VALUES ('282', '8', 'app_date_campaign', 0x31333335383738303430);
INSERT INTO `campaign_configuration` VALUES ('283', '8', 'app_date_close', 0x31333430303235323430);
INSERT INTO `campaign_configuration` VALUES ('284', '8', 'app_date_winners', 0x31333430363330303430);
INSERT INTO `campaign_configuration` VALUES ('285', '8', 'app_timezone', 0x554D33);
INSERT INTO `campaign_configuration` VALUES ('286', '8', 'app_user_requirements', 0x2C6E616D652C656D61696C2C70686F6E652C62697274686461792C67656E6465722C636F756E747279);
INSERT INTO `campaign_configuration` VALUES ('287', '8', 'app_user_requirements_custom_label', '');
INSERT INTO `campaign_configuration` VALUES ('288', '8', 'app_rules', 0x505255454241210A41207665722073692061686F726120736520677561726461);
INSERT INTO `campaign_configuration` VALUES ('289', '8', 'look_no_fan_mode', 0x64697361626C6564);
INSERT INTO `campaign_configuration` VALUES ('290', '8', 'look_no_fan_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('291', '8', 'look_no_fan_html', '');
INSERT INTO `campaign_configuration` VALUES ('292', '8', 'look_teaser_mode', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('293', '8', 'look_teaser_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('294', '8', 'look_teaser_html', '');
INSERT INTO `campaign_configuration` VALUES ('295', '8', 'look_campaign_mode', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('296', '8', 'look_campaign_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('297', '8', 'look_campaign_html', '');
INSERT INTO `campaign_configuration` VALUES ('298', '8', 'look_close_mode', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('299', '8', 'look_close_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('300', '8', 'look_close_html', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('301', '8', 'look_winners_mode', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('302', '8', 'look_winners_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('303', '8', 'look_winners_html', '');
INSERT INTO `campaign_configuration` VALUES ('304', '8', 'look_css', '');
INSERT INTO `campaign_configuration` VALUES ('305', '8', 'fb_agreement', 0x31);
INSERT INTO `campaign_configuration` VALUES ('306', '8', 'google_analytics', '');
INSERT INTO `campaign_configuration` VALUES ('307', '8', 'tab_1_configured', 0x31);
INSERT INTO `campaign_configuration` VALUES ('308', '8', 'tab_2_configured', 0x31);
INSERT INTO `campaign_configuration` VALUES ('309', '8', 'tab_3_configured', 0x31);
INSERT INTO `campaign_configuration` VALUES ('310', '8', 'app_winners_extract_mode', 0x62616C6C6F74);
INSERT INTO `campaign_configuration` VALUES ('311', '9', 'app_features', 0x6C697465);
INSERT INTO `campaign_configuration` VALUES ('312', '9', 'app_title', '');
INSERT INTO `campaign_configuration` VALUES ('313', '9', 'app_description', '');
INSERT INTO `campaign_configuration` VALUES ('314', '9', 'app_language', '');
INSERT INTO `campaign_configuration` VALUES ('315', '9', 'app_wall_title', '');
INSERT INTO `campaign_configuration` VALUES ('316', '9', 'app_wall_description', '');
INSERT INTO `campaign_configuration` VALUES ('317', '9', 'app_timer', 0x30);
INSERT INTO `campaign_configuration` VALUES ('318', '9', 'app_embedded_wall', 0x30);
INSERT INTO `campaign_configuration` VALUES ('319', '9', 'app_avatar', 0x30);
INSERT INTO `campaign_configuration` VALUES ('320', '9', 'app_date_teaser', 0x31333338343639323738);
INSERT INTO `campaign_configuration` VALUES ('321', '9', 'app_date_campaign', 0x31333339303734303738);
INSERT INTO `campaign_configuration` VALUES ('322', '9', 'app_date_close', 0x31333430323833363738);
INSERT INTO `campaign_configuration` VALUES ('323', '9', 'app_date_winners', 0x31333430383838343738);
INSERT INTO `campaign_configuration` VALUES ('324', '9', 'app_timezone', 0x554D33);
INSERT INTO `campaign_configuration` VALUES ('325', '9', 'app_user_requirements', '');
INSERT INTO `campaign_configuration` VALUES ('326', '9', 'app_user_requirements_custom_label', '');
INSERT INTO `campaign_configuration` VALUES ('327', '9', 'app_rules', '');
INSERT INTO `campaign_configuration` VALUES ('328', '9', 'look_no_fan_mode', 0x64697361626C6564);
INSERT INTO `campaign_configuration` VALUES ('329', '9', 'look_no_fan_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('330', '9', 'look_no_fan_html', '');
INSERT INTO `campaign_configuration` VALUES ('331', '9', 'look_teaser_mode', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('332', '9', 'look_teaser_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('333', '9', 'look_teaser_html', '');
INSERT INTO `campaign_configuration` VALUES ('334', '9', 'look_campaign_mode', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('335', '9', 'look_campaign_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('336', '9', 'look_campaign_html', '');
INSERT INTO `campaign_configuration` VALUES ('337', '9', 'look_close_mode', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('338', '9', 'look_close_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('339', '9', 'look_close_html', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('340', '9', 'look_winners_mode', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('341', '9', 'look_winners_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('342', '9', 'look_winners_html', '');
INSERT INTO `campaign_configuration` VALUES ('343', '9', 'look_css', '');
INSERT INTO `campaign_configuration` VALUES ('344', '9', 'fb_agreement', '');
INSERT INTO `campaign_configuration` VALUES ('345', '9', 'google_analytics', '');
INSERT INTO `campaign_configuration` VALUES ('346', '9', 'tab_1_configured', '');
INSERT INTO `campaign_configuration` VALUES ('347', '9', 'tab_2_configured', '');
INSERT INTO `campaign_configuration` VALUES ('348', '9', 'tab_3_configured', '');
INSERT INTO `campaign_configuration` VALUES ('349', '9', 'app_winners_extract_mode', 0x62616C6C6F74);
INSERT INTO `campaign_configuration` VALUES ('350', '10', 'app_features', 0x6C697465);
INSERT INTO `campaign_configuration` VALUES ('351', '10', 'app_title', 0x43616D7061C3B1612043726561646120506F722053616E746961676F);
INSERT INTO `campaign_configuration` VALUES ('352', '10', 'app_description', 0x4C6120646573637269706369C3B36E);
INSERT INTO `campaign_configuration` VALUES ('353', '10', 'app_language', 0x6573);
INSERT INTO `campaign_configuration` VALUES ('354', '10', 'app_wall_title', 0x5075626C6963612053616E746961676F);
INSERT INTO `campaign_configuration` VALUES ('355', '10', 'app_wall_description', 0x44657363726962652053616E746961676F);
INSERT INTO `campaign_configuration` VALUES ('356', '10', 'app_timer', 0x30);
INSERT INTO `campaign_configuration` VALUES ('357', '10', 'app_embedded_wall', 0x30);
INSERT INTO `campaign_configuration` VALUES ('358', '10', 'app_avatar', 0x30);
INSERT INTO `campaign_configuration` VALUES ('359', '10', 'app_date_teaser', 0x31333338343738353935);
INSERT INTO `campaign_configuration` VALUES ('360', '10', 'app_date_campaign', 0x31333339303833333630);
INSERT INTO `campaign_configuration` VALUES ('361', '10', 'app_date_close', 0x31333430323932393630);
INSERT INTO `campaign_configuration` VALUES ('362', '10', 'app_date_winners', 0x31333430383937373630);
INSERT INTO `campaign_configuration` VALUES ('363', '10', 'app_timezone', 0x554D33);
INSERT INTO `campaign_configuration` VALUES ('364', '10', 'app_user_requirements', '');
INSERT INTO `campaign_configuration` VALUES ('365', '10', 'app_user_requirements_custom_label', '');
INSERT INTO `campaign_configuration` VALUES ('366', '10', 'app_rules', '');
INSERT INTO `campaign_configuration` VALUES ('367', '10', 'look_no_fan_mode', 0x64697361626C6564);
INSERT INTO `campaign_configuration` VALUES ('368', '10', 'look_no_fan_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('369', '10', 'look_no_fan_html', '');
INSERT INTO `campaign_configuration` VALUES ('370', '10', 'look_teaser_mode', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('371', '10', 'look_teaser_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('372', '10', 'look_teaser_html', '');
INSERT INTO `campaign_configuration` VALUES ('373', '10', 'look_campaign_mode', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('374', '10', 'look_campaign_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('375', '10', 'look_campaign_html', '');
INSERT INTO `campaign_configuration` VALUES ('376', '10', 'look_close_mode', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('377', '10', 'look_close_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('378', '10', 'look_close_html', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('379', '10', 'look_winners_mode', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('380', '10', 'look_winners_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('381', '10', 'look_winners_html', '');
INSERT INTO `campaign_configuration` VALUES ('382', '10', 'look_css', '');
INSERT INTO `campaign_configuration` VALUES ('383', '10', 'fb_agreement', 0x31);
INSERT INTO `campaign_configuration` VALUES ('384', '10', 'google_analytics', '');
INSERT INTO `campaign_configuration` VALUES ('385', '10', 'tab_1_configured', 0x31);
INSERT INTO `campaign_configuration` VALUES ('386', '10', 'tab_2_configured', 0x31);
INSERT INTO `campaign_configuration` VALUES ('387', '10', 'tab_3_configured', 0x31);
INSERT INTO `campaign_configuration` VALUES ('388', '10', 'app_winners_extract_mode', 0x62616C6C6F74);
INSERT INTO `campaign_configuration` VALUES ('389', '11', 'app_features', 0x6C697465);
INSERT INTO `campaign_configuration` VALUES ('390', '11', 'app_title', 0x43616D7061C3B161204F766572726964652053616E746961676F);
INSERT INTO `campaign_configuration` VALUES ('391', '11', 'app_description', 0x4F766572726964652053616E746961676F);
INSERT INTO `campaign_configuration` VALUES ('392', '11', 'app_language', '');
INSERT INTO `campaign_configuration` VALUES ('393', '11', 'app_wall_title', 0x4F766572726964652053616E746961676F);
INSERT INTO `campaign_configuration` VALUES ('394', '11', 'app_wall_description', 0x4F766572726964652053616E746961676F);
INSERT INTO `campaign_configuration` VALUES ('395', '11', 'app_timer', 0x30);
INSERT INTO `campaign_configuration` VALUES ('396', '11', 'app_embedded_wall', 0x30);
INSERT INTO `campaign_configuration` VALUES ('397', '11', 'app_avatar', 0x30);
INSERT INTO `campaign_configuration` VALUES ('398', '11', 'app_date_teaser', 0x31333338343738393330);
INSERT INTO `campaign_configuration` VALUES ('399', '11', 'app_date_campaign', 0x31333339303833373230);
INSERT INTO `campaign_configuration` VALUES ('400', '11', 'app_date_close', 0x31333430323933333230);
INSERT INTO `campaign_configuration` VALUES ('401', '11', 'app_date_winners', 0x31333430383938313230);
INSERT INTO `campaign_configuration` VALUES ('402', '11', 'app_timezone', 0x554D33);
INSERT INTO `campaign_configuration` VALUES ('403', '11', 'app_user_requirements', '');
INSERT INTO `campaign_configuration` VALUES ('404', '11', 'app_user_requirements_custom_label', '');
INSERT INTO `campaign_configuration` VALUES ('405', '11', 'app_rules', '');
INSERT INTO `campaign_configuration` VALUES ('406', '11', 'look_no_fan_mode', 0x64697361626C6564);
INSERT INTO `campaign_configuration` VALUES ('407', '11', 'look_no_fan_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('408', '11', 'look_no_fan_html', '');
INSERT INTO `campaign_configuration` VALUES ('409', '11', 'look_teaser_mode', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('410', '11', 'look_teaser_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('411', '11', 'look_teaser_html', '');
INSERT INTO `campaign_configuration` VALUES ('412', '11', 'look_campaign_mode', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('413', '11', 'look_campaign_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('414', '11', 'look_campaign_html', '');
INSERT INTO `campaign_configuration` VALUES ('415', '11', 'look_close_mode', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('416', '11', 'look_close_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('417', '11', 'look_close_html', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('418', '11', 'look_winners_mode', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('419', '11', 'look_winners_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('420', '11', 'look_winners_html', '');
INSERT INTO `campaign_configuration` VALUES ('421', '11', 'look_css', '');
INSERT INTO `campaign_configuration` VALUES ('422', '11', 'fb_agreement', 0x31);
INSERT INTO `campaign_configuration` VALUES ('423', '11', 'google_analytics', '');
INSERT INTO `campaign_configuration` VALUES ('424', '11', 'tab_1_configured', 0x31);
INSERT INTO `campaign_configuration` VALUES ('425', '11', 'tab_2_configured', 0x31);
INSERT INTO `campaign_configuration` VALUES ('426', '11', 'tab_3_configured', 0x31);
INSERT INTO `campaign_configuration` VALUES ('427', '11', 'app_winners_extract_mode', 0x62616C6C6F74);
INSERT INTO `campaign_configuration` VALUES ('428', '12', 'app_features', 0x6C697465);
INSERT INTO `campaign_configuration` VALUES ('429', '12', 'app_title', 0x4C454E4F564F);
INSERT INTO `campaign_configuration` VALUES ('430', '12', 'app_description', 0x6C616C616C6C6120);
INSERT INTO `campaign_configuration` VALUES ('431', '12', 'app_language', 0x6573);
INSERT INTO `campaign_configuration` VALUES ('432', '12', 'app_wall_title', 0xC2A14772616369617320706F72207061727469636970617221);
INSERT INTO `campaign_configuration` VALUES ('433', '12', 'app_wall_description', 0x616A6A616A616A61);
INSERT INTO `campaign_configuration` VALUES ('434', '12', 'app_timer', 0x31);
INSERT INTO `campaign_configuration` VALUES ('435', '12', 'app_embedded_wall', 0x31);
INSERT INTO `campaign_configuration` VALUES ('436', '12', 'app_avatar', 0x4176617461722E6A7067);
INSERT INTO `campaign_configuration` VALUES ('437', '12', 'app_date_teaser', 0x31333338343836333332);
INSERT INTO `campaign_configuration` VALUES ('438', '12', 'app_date_campaign', 0x31333336353734393430);
INSERT INTO `campaign_configuration` VALUES ('439', '12', 'app_date_close', 0x31333430333030373030);
INSERT INTO `campaign_configuration` VALUES ('440', '12', 'app_date_winners', 0x31333430393035353030);
INSERT INTO `campaign_configuration` VALUES ('441', '12', 'app_timezone', 0x554D33);
INSERT INTO `campaign_configuration` VALUES ('442', '12', 'app_user_requirements', 0x2C6E616D652C656D61696C2C70686F6E652C62697274686461792C67656E6465722C636F756E747279);
INSERT INTO `campaign_configuration` VALUES ('443', '12', 'app_user_requirements_custom_label', 0x4F74726F73);
INSERT INTO `campaign_configuration` VALUES ('444', '12', 'app_rules', 0x3C68333E4261736573207920436F6E646963696F6E6573206465206C612050726F6D6F6369C3B36E20E2809C5061727469636970612070617261206C6C65766172746520756E61205461626C6574204C656E6F766F20646520726567616C6FE2809D2E2053696E206F626C6967616369C3B36E20646520636F6D7072612E203C2F68333E0A0A3C68343E312E204F7267616E697A61646F722C20566967656E636961207920416C63616E63652E3C2F68343E0A0A3C68353EE2809C5061727469636970612070617261206C6C65766172746520756E61205461626C6574204C656E6F766F20646520726567616C6FE2809D20286C6120E2809C50726F6D6F6369C3B36EE2809D292C206F7267616E697A61646120706F72204C656E6F766F2028537061696E2920532E4C2E20537563757273616C20417267656E74696E612028656C20E2809C4F7267616E697A61646F72E2809D292C2043554954204EC2B02033302D37303932333736342D372C20636F6E737469747579656E646F20646F6D6963696C696F2061206C6F732065666563746F73206465206C612050726F6D6F6369C3B36E20656E204DC3A97869636F20323035312C204D617274C3AD6E657A2C205061727469646F2064652053616E2049736964726F2C2050726F76696E636961206465204275656E6F732041697265732C20417267656E74696E612C20736572C3A1206C6C65766164612061206361626F20646573646520656C203231206465206E6F7669656D627265206465203230313120686173746120656C2032352064652064696369656D627265206465203230313120696E636C75736976652028656C20E2809C506572C3AD6F646F20646520566967656E636961E2809D292E204C61207061727469636970616369C3B36E20656E206C612070726573656E74652050726F6D6F6369C3B36E20696D706C69636120656C20636F6E6F63696D69656E746F2079206C61206163657074616369C3B36E206465206573746173206261736573207920636F6E646963696F6E657320286C617320E2809C4261736573E2809D292C20636F6D6F206173C3AD2074616D6269C3A96E206C6F732070726F636564696D69656E746F7320792F6F2073697374656D61732065737461626C656369646F7320706F7220656C204F7267616E697A61646F722070617261206C61207061727469636970616369C3B36E2E3C2F68353E0A0A3C68343E322E204F7267616E697A61646F722C20566967656E636961207920416C63616E63652E3C2F68343E0A0A3C68353EE2809C5061727469636970612070617261206C6C65766172746520756E61205461626C6574204C656E6F766F20646520726567616C6FE2809D20286C6120E2809C50726F6D6F6369C3B36EE2809D292C206F7267616E697A61646120706F72204C656E6F766F2028537061696E2920532E4C2E20537563757273616C20417267656E74696E612028656C20E2809C4F7267616E697A61646F72E2809D292C2043554954204EC2B02033302D37303932333736342D372C20636F6E737469747579656E646F20646F6D6963696C696F2061206C6F732065666563746F73206465206C612050726F6D6F6369C3B36E20656E204DC3A97869636F20323035312C204D617274C3AD6E657A2C205061727469646F2064652053616E2049736964726F2C2050726F76696E636961206465204275656E6F732041697265732C20417267656E74696E612C20736572C3A1206C6C65766164612061206361626F20646573646520656C203231206465206E6F7669656D627265206465203230313120686173746120656C2032352064652064696369656D627265206465203230313120696E636C75736976652028656C20E2809C506572C3AD6F646F20646520566967656E636961E2809D292E204C61207061727469636970616369C3B36E20656E206C612070726573656E74652050726F6D6F6369C3B36E20696D706C69636120656C20636F6E6F63696D69656E746F2079206C61206163657074616369C3B36E206465206573746173206261736573207920636F6E646963696F6E657320286C617320E2809C4261736573E2809D292C20636F6D6F206173C3AD2074616D6269C3A96E206C6F732070726F636564696D69656E746F7320792F6F2073697374656D61732065737461626C656369646F7320706F7220656C204F7267616E697A61646F722070617261206C61207061727469636970616369C3B36E2E3C2F68353E0A0A3C68343E332E204F7267616E697A61646F722C20566967656E636961207920416C63616E63652E3C2F68343E0A0A3C68353EE2809C5061727469636970612070617261206C6C65766172746520756E61205461626C6574204C656E6F766F20646520726567616C6FE2809D20286C6120E2809C50726F6D6F6369C3B36EE2809D292C206F7267616E697A61646120706F72204C656E6F766F2028537061696E2920532E4C2E20537563757273616C20417267656E74696E612028656C20E2809C4F7267616E697A61646F72E2809D292C2043554954204EC2B02033302D37303932333736342D372C20636F6E737469747579656E646F20646F6D6963696C696F2061206C6F732065666563746F73206465206C612050726F6D6F6369C3B36E20656E204DC3A97869636F20323035312C204D617274C3AD6E657A2C205061727469646F2064652053616E2049736964726F2C2050726F76696E636961206465204275656E6F732041697265732C20417267656E74696E612C20736572C3A1206C6C65766164612061206361626F20646573646520656C203231206465206E6F7669656D627265206465203230313120686173746120656C2032352064652064696369656D627265206465203230313120696E636C75736976652028656C20E2809C506572C3AD6F646F20646520566967656E636961E2809D292E204C61207061727469636970616369C3B36E20656E206C612070726573656E74652050726F6D6F6369C3B36E20696D706C69636120656C20636F6E6F63696D69656E746F2079206C61206163657074616369C3B36E206465206573746173206261736573207920636F6E646963696F6E657320286C617320E2809C4261736573E2809D292C20636F6D6F206173C3AD2074616D6269C3A96E206C6F732070726F636564696D69656E746F7320792F6F2073697374656D61732065737461626C656369646F7320706F7220656C204F7267616E697A61646F722070617261206C61207061727469636970616369C3B36E2E3C2F68353E);
INSERT INTO `campaign_configuration` VALUES ('445', '12', 'look_no_fan_mode', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('446', '12', 'look_no_fan_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('447', '12', 'look_no_fan_html', '');
INSERT INTO `campaign_configuration` VALUES ('448', '12', 'look_teaser_mode', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('449', '12', 'look_teaser_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('450', '12', 'look_teaser_html', '');
INSERT INTO `campaign_configuration` VALUES ('451', '12', 'look_campaign_mode', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('452', '12', 'look_campaign_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('453', '12', 'look_campaign_html', '');
INSERT INTO `campaign_configuration` VALUES ('454', '12', 'look_close_mode', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('455', '12', 'look_close_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('456', '12', 'look_close_html', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('457', '12', 'look_winners_mode', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('458', '12', 'look_winners_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('459', '12', 'look_winners_html', '');
INSERT INTO `campaign_configuration` VALUES ('460', '12', 'look_css', '');
INSERT INTO `campaign_configuration` VALUES ('545', '15', 'app_features', 0x66756C6C);
INSERT INTO `campaign_configuration` VALUES ('546', '15', 'app_title', 0x4E7565766120342F3620);
INSERT INTO `campaign_configuration` VALUES ('547', '15', 'app_description', 0x4C414C414C41);
INSERT INTO `campaign_configuration` VALUES ('461', '12', 'fb_agreement', 0x31);
INSERT INTO `campaign_configuration` VALUES ('462', '12', 'google_analytics', '');
INSERT INTO `campaign_configuration` VALUES ('463', '12', 'tab_1_configured', 0x31);
INSERT INTO `campaign_configuration` VALUES ('464', '12', 'tab_2_configured', 0x31);
INSERT INTO `campaign_configuration` VALUES ('465', '12', 'tab_3_configured', 0x31);
INSERT INTO `campaign_configuration` VALUES ('466', '12', 'app_winners_extract_mode', 0x62616C6C6F74);
INSERT INTO `campaign_configuration` VALUES ('467', '13', 'app_features', 0x6C697465);
INSERT INTO `campaign_configuration` VALUES ('468', '13', 'app_title', 0x74657374);
INSERT INTO `campaign_configuration` VALUES ('469', '13', 'app_description', 0x74657374);
INSERT INTO `campaign_configuration` VALUES ('470', '13', 'app_language', '');
INSERT INTO `campaign_configuration` VALUES ('471', '13', 'app_wall_title', 0x74657374);
INSERT INTO `campaign_configuration` VALUES ('472', '13', 'app_wall_description', 0x74657374);
INSERT INTO `campaign_configuration` VALUES ('473', '13', 'app_timer', 0x30);
INSERT INTO `campaign_configuration` VALUES ('474', '13', 'app_embedded_wall', 0x30);
INSERT INTO `campaign_configuration` VALUES ('475', '13', 'app_avatar', 0x30);
INSERT INTO `campaign_configuration` VALUES ('476', '13', 'app_date_teaser', 0x31333338393237313738);
INSERT INTO `campaign_configuration` VALUES ('477', '13', 'app_date_campaign', 0x31333339353331393230);
INSERT INTO `campaign_configuration` VALUES ('478', '13', 'app_date_close', 0x31333430373431353230);
INSERT INTO `campaign_configuration` VALUES ('479', '13', 'app_date_winners', 0x31333431333436333230);
INSERT INTO `campaign_configuration` VALUES ('480', '13', 'app_timezone', 0x554D33);
INSERT INTO `campaign_configuration` VALUES ('481', '13', 'app_user_requirements', '');
INSERT INTO `campaign_configuration` VALUES ('482', '13', 'app_user_requirements_custom_label', '');
INSERT INTO `campaign_configuration` VALUES ('483', '13', 'app_rules', '');
INSERT INTO `campaign_configuration` VALUES ('484', '13', 'look_no_fan_mode', 0x64697361626C6564);
INSERT INTO `campaign_configuration` VALUES ('485', '13', 'look_no_fan_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('486', '13', 'look_no_fan_html', '');
INSERT INTO `campaign_configuration` VALUES ('487', '13', 'look_teaser_mode', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('488', '13', 'look_teaser_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('489', '13', 'look_teaser_html', '');
INSERT INTO `campaign_configuration` VALUES ('490', '13', 'look_campaign_mode', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('491', '13', 'look_campaign_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('492', '13', 'look_campaign_html', '');
INSERT INTO `campaign_configuration` VALUES ('493', '13', 'look_close_mode', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('494', '13', 'look_close_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('495', '13', 'look_close_html', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('496', '13', 'look_winners_mode', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('497', '13', 'look_winners_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('498', '13', 'look_winners_html', '');
INSERT INTO `campaign_configuration` VALUES ('499', '13', 'look_css', '');
INSERT INTO `campaign_configuration` VALUES ('500', '13', 'fb_agreement', 0x31);
INSERT INTO `campaign_configuration` VALUES ('501', '13', 'google_analytics', '');
INSERT INTO `campaign_configuration` VALUES ('502', '13', 'tab_1_configured', 0x31);
INSERT INTO `campaign_configuration` VALUES ('503', '13', 'tab_2_configured', 0x31);
INSERT INTO `campaign_configuration` VALUES ('504', '13', 'tab_3_configured', 0x31);
INSERT INTO `campaign_configuration` VALUES ('505', '13', 'app_winners_extract_mode', 0x62616C6C6F74);
INSERT INTO `campaign_configuration` VALUES ('506', '14', 'app_features', 0x6C697465);
INSERT INTO `campaign_configuration` VALUES ('507', '14', 'app_title', 0x4E756576612063616D7061C3B1612032);
INSERT INTO `campaign_configuration` VALUES ('508', '14', 'app_description', 0x4C616C6C616C616C61);
INSERT INTO `campaign_configuration` VALUES ('509', '14', 'app_language', 0x6573);
INSERT INTO `campaign_configuration` VALUES ('510', '14', 'app_wall_title', 0xC2A14772616369617321);
INSERT INTO `campaign_configuration` VALUES ('511', '14', 'app_wall_description', 0x616C616C616C61);
INSERT INTO `campaign_configuration` VALUES ('512', '14', 'app_timer', 0x30);
INSERT INTO `campaign_configuration` VALUES ('513', '14', 'app_embedded_wall', 0x30);
INSERT INTO `campaign_configuration` VALUES ('514', '14', 'app_avatar', 0x30);
INSERT INTO `campaign_configuration` VALUES ('515', '14', 'app_date_teaser', 0x31333339303933303933);
INSERT INTO `campaign_configuration` VALUES ('516', '14', 'app_date_campaign', 0x31333338343031383830);
INSERT INTO `campaign_configuration` VALUES ('517', '14', 'app_date_close', 0x31333430393037343830);
INSERT INTO `campaign_configuration` VALUES ('518', '14', 'app_date_winners', 0x31333431353132323830);
INSERT INTO `campaign_configuration` VALUES ('519', '14', 'app_timezone', 0x554D33);
INSERT INTO `campaign_configuration` VALUES ('520', '14', 'app_user_requirements', 0x2C6E616D652C656D61696C2C70686F6E652C62697274686461792C67656E6465722C636F756E747279);
INSERT INTO `campaign_configuration` VALUES ('521', '14', 'app_user_requirements_custom_label', '');
INSERT INTO `campaign_configuration` VALUES ('522', '14', 'app_rules', 0x4261736573);
INSERT INTO `campaign_configuration` VALUES ('523', '14', 'look_no_fan_mode', 0x64697361626C6564);
INSERT INTO `campaign_configuration` VALUES ('524', '14', 'look_no_fan_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('525', '14', 'look_no_fan_html', '');
INSERT INTO `campaign_configuration` VALUES ('526', '14', 'look_teaser_mode', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('527', '14', 'look_teaser_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('528', '14', 'look_teaser_html', '');
INSERT INTO `campaign_configuration` VALUES ('529', '14', 'look_campaign_mode', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('530', '14', 'look_campaign_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('531', '14', 'look_campaign_html', '');
INSERT INTO `campaign_configuration` VALUES ('532', '14', 'look_close_mode', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('533', '14', 'look_close_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('534', '14', 'look_close_html', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('535', '14', 'look_winners_mode', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('536', '14', 'look_winners_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('537', '14', 'look_winners_html', '');
INSERT INTO `campaign_configuration` VALUES ('538', '14', 'look_css', '');
INSERT INTO `campaign_configuration` VALUES ('539', '14', 'fb_agreement', 0x31);
INSERT INTO `campaign_configuration` VALUES ('540', '14', 'google_analytics', '');
INSERT INTO `campaign_configuration` VALUES ('541', '14', 'tab_1_configured', 0x31);
INSERT INTO `campaign_configuration` VALUES ('542', '14', 'tab_2_configured', 0x31);
INSERT INTO `campaign_configuration` VALUES ('543', '14', 'tab_3_configured', 0x31);
INSERT INTO `campaign_configuration` VALUES ('544', '14', 'app_winners_extract_mode', 0x62616C6C6F74);
INSERT INTO `campaign_configuration` VALUES ('548', '15', 'app_language', 0x6573);
INSERT INTO `campaign_configuration` VALUES ('549', '15', 'app_wall_title', 0xC2A14772616369617321);
INSERT INTO `campaign_configuration` VALUES ('550', '15', 'app_wall_description', 0x6C616C616C616C616C616C6C616C61);
INSERT INTO `campaign_configuration` VALUES ('551', '15', 'app_timer', 0x31);
INSERT INTO `campaign_configuration` VALUES ('552', '15', 'app_embedded_wall', 0x31);
INSERT INTO `campaign_configuration` VALUES ('553', '15', 'app_avatar', 0x4176617461722E6A7067);
INSERT INTO `campaign_configuration` VALUES ('554', '15', 'app_date_teaser', 0x31333339343435353438);
INSERT INTO `campaign_configuration` VALUES ('555', '15', 'app_date_campaign', 0x31333335393839353230);
INSERT INTO `campaign_configuration` VALUES ('556', '15', 'app_date_close', 0x31333338363637393230);
INSERT INTO `campaign_configuration` VALUES ('557', '15', 'app_date_winners', 0x31333431383634373230);
INSERT INTO `campaign_configuration` VALUES ('558', '15', 'app_timezone', 0x554D33);
INSERT INTO `campaign_configuration` VALUES ('559', '15', 'app_user_requirements', 0x2C6E616D652C656D61696C2C70686F6E652C62697274686461792C67656E6465722C636F756E7472792C637573746F6D);
INSERT INTO `campaign_configuration` VALUES ('560', '15', 'app_user_requirements_custom_label', 0x4F74726F73);
INSERT INTO `campaign_configuration` VALUES ('561', '15', 'app_rules', 0x4261736573207920636F6E646963696F6E65732E2E2E2E2E);
INSERT INTO `campaign_configuration` VALUES ('562', '15', 'look_no_fan_mode', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('563', '15', 'look_no_fan_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('564', '15', 'look_no_fan_html', '');
INSERT INTO `campaign_configuration` VALUES ('565', '15', 'look_teaser_mode', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('566', '15', 'look_teaser_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('567', '15', 'look_teaser_html', '');
INSERT INTO `campaign_configuration` VALUES ('568', '15', 'look_campaign_mode', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('569', '15', 'look_campaign_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('570', '15', 'look_campaign_html', '');
INSERT INTO `campaign_configuration` VALUES ('571', '15', 'look_close_mode', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('572', '15', 'look_close_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('573', '15', 'look_close_html', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('574', '15', 'look_winners_mode', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('575', '15', 'look_winners_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('576', '15', 'look_winners_html', '');
INSERT INTO `campaign_configuration` VALUES ('577', '15', 'look_css', '');
INSERT INTO `campaign_configuration` VALUES ('578', '15', 'fb_agreement', 0x31);
INSERT INTO `campaign_configuration` VALUES ('579', '15', 'google_analytics', '');
INSERT INTO `campaign_configuration` VALUES ('580', '15', 'tab_1_configured', 0x31);
INSERT INTO `campaign_configuration` VALUES ('581', '15', 'tab_2_configured', 0x31);
INSERT INTO `campaign_configuration` VALUES ('582', '15', 'tab_3_configured', 0x31);
INSERT INTO `campaign_configuration` VALUES ('583', '15', 'app_winners_extract_mode', 0x62616C6C6F74);
INSERT INTO `campaign_configuration` VALUES ('584', '16', 'app_features', 0x6C697465);
INSERT INTO `campaign_configuration` VALUES ('585', '16', 'app_title', 0x736164);
INSERT INTO `campaign_configuration` VALUES ('586', '16', 'app_description', 0x667364);
INSERT INTO `campaign_configuration` VALUES ('587', '16', 'app_language', '');
INSERT INTO `campaign_configuration` VALUES ('588', '16', 'app_wall_title', 0x666473);
INSERT INTO `campaign_configuration` VALUES ('589', '16', 'app_wall_description', 0x667364);
INSERT INTO `campaign_configuration` VALUES ('590', '16', 'app_timer', 0x30);
INSERT INTO `campaign_configuration` VALUES ('591', '16', 'app_embedded_wall', 0x30);
INSERT INTO `campaign_configuration` VALUES ('592', '16', 'app_avatar', 0x30);
INSERT INTO `campaign_configuration` VALUES ('593', '16', 'app_date_teaser', 0x31333339373738353133);
INSERT INTO `campaign_configuration` VALUES ('594', '16', 'app_date_campaign', 0x31333430333833323630);
INSERT INTO `campaign_configuration` VALUES ('595', '16', 'app_date_close', 0x31333431353932383630);
INSERT INTO `campaign_configuration` VALUES ('596', '16', 'app_date_winners', 0x31333432313937363630);
INSERT INTO `campaign_configuration` VALUES ('597', '16', 'app_timezone', 0x554D33);
INSERT INTO `campaign_configuration` VALUES ('598', '16', 'app_user_requirements', '');
INSERT INTO `campaign_configuration` VALUES ('599', '16', 'app_user_requirements_custom_label', '');
INSERT INTO `campaign_configuration` VALUES ('600', '16', 'app_rules', 0x667364);
INSERT INTO `campaign_configuration` VALUES ('601', '16', 'look_no_fan_mode', 0x64697361626C6564);
INSERT INTO `campaign_configuration` VALUES ('602', '16', 'look_no_fan_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('603', '16', 'look_no_fan_html', '');
INSERT INTO `campaign_configuration` VALUES ('604', '16', 'look_teaser_mode', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('605', '16', 'look_teaser_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('606', '16', 'look_teaser_html', '');
INSERT INTO `campaign_configuration` VALUES ('607', '16', 'look_campaign_mode', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('608', '16', 'look_campaign_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('609', '16', 'look_campaign_html', '');
INSERT INTO `campaign_configuration` VALUES ('610', '16', 'look_close_mode', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('611', '16', 'look_close_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('612', '16', 'look_close_html', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('613', '16', 'look_winners_mode', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('614', '16', 'look_winners_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('615', '16', 'look_winners_html', '');
INSERT INTO `campaign_configuration` VALUES ('616', '16', 'look_css', '');
INSERT INTO `campaign_configuration` VALUES ('617', '16', 'fb_agreement', 0x31);
INSERT INTO `campaign_configuration` VALUES ('618', '16', 'google_analytics', '');
INSERT INTO `campaign_configuration` VALUES ('619', '16', 'tab_1_configured', 0x31);
INSERT INTO `campaign_configuration` VALUES ('620', '16', 'tab_2_configured', 0x31);
INSERT INTO `campaign_configuration` VALUES ('621', '16', 'tab_3_configured', 0x31);
INSERT INTO `campaign_configuration` VALUES ('622', '16', 'app_winners_extract_mode', 0x62616C6C6F74);
INSERT INTO `campaign_configuration` VALUES ('623', '17', 'app_features', 0x6C697465);
INSERT INTO `campaign_configuration` VALUES ('624', '17', 'app_title', '');
INSERT INTO `campaign_configuration` VALUES ('625', '17', 'app_description', '');
INSERT INTO `campaign_configuration` VALUES ('626', '17', 'app_language', '');
INSERT INTO `campaign_configuration` VALUES ('627', '17', 'app_wall_title', '');
INSERT INTO `campaign_configuration` VALUES ('628', '17', 'app_wall_description', '');
INSERT INTO `campaign_configuration` VALUES ('629', '17', 'app_timer', 0x30);
INSERT INTO `campaign_configuration` VALUES ('630', '17', 'app_embedded_wall', 0x30);
INSERT INTO `campaign_configuration` VALUES ('631', '17', 'app_avatar', 0x30);
INSERT INTO `campaign_configuration` VALUES ('632', '17', 'app_date_teaser', 0x31333430333930373639);
INSERT INTO `campaign_configuration` VALUES ('633', '17', 'app_date_campaign', 0x31333430393935353639);
INSERT INTO `campaign_configuration` VALUES ('634', '17', 'app_date_close', 0x31333432323035313639);
INSERT INTO `campaign_configuration` VALUES ('635', '17', 'app_date_winners', 0x31333432383039393639);
INSERT INTO `campaign_configuration` VALUES ('636', '17', 'app_timezone', 0x554D33);
INSERT INTO `campaign_configuration` VALUES ('637', '17', 'app_user_requirements', '');
INSERT INTO `campaign_configuration` VALUES ('638', '17', 'app_user_requirements_custom_label', '');
INSERT INTO `campaign_configuration` VALUES ('639', '17', 'app_rules', '');
INSERT INTO `campaign_configuration` VALUES ('640', '17', 'look_no_fan_mode', 0x64697361626C6564);
INSERT INTO `campaign_configuration` VALUES ('641', '17', 'look_no_fan_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('642', '17', 'look_no_fan_html', '');
INSERT INTO `campaign_configuration` VALUES ('643', '17', 'look_teaser_mode', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('644', '17', 'look_teaser_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('645', '17', 'look_teaser_html', '');
INSERT INTO `campaign_configuration` VALUES ('646', '17', 'look_campaign_mode', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('647', '17', 'look_campaign_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('648', '17', 'look_campaign_html', '');
INSERT INTO `campaign_configuration` VALUES ('649', '17', 'look_close_mode', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('650', '17', 'look_close_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('651', '17', 'look_close_html', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('652', '17', 'look_winners_mode', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('653', '17', 'look_winners_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('654', '17', 'look_winners_html', '');
INSERT INTO `campaign_configuration` VALUES ('655', '17', 'look_css', '');
INSERT INTO `campaign_configuration` VALUES ('656', '17', 'fb_agreement', '');
INSERT INTO `campaign_configuration` VALUES ('657', '17', 'google_analytics', '');
INSERT INTO `campaign_configuration` VALUES ('658', '17', 'tab_1_configured', '');
INSERT INTO `campaign_configuration` VALUES ('659', '17', 'tab_2_configured', '');
INSERT INTO `campaign_configuration` VALUES ('660', '17', 'tab_3_configured', '');
INSERT INTO `campaign_configuration` VALUES ('661', '17', 'app_winners_extract_mode', 0x62616C6C6F74);
INSERT INTO `campaign_configuration` VALUES ('662', '18', 'app_features', 0x66756C6C);
INSERT INTO `campaign_configuration` VALUES ('663', '18', 'app_title', 0x63);
INSERT INTO `campaign_configuration` VALUES ('664', '18', 'app_description', 0x7A7A6466766673646673);
INSERT INTO `campaign_configuration` VALUES ('665', '18', 'app_language', '');
INSERT INTO `campaign_configuration` VALUES ('666', '18', 'app_wall_title', 0x736466);
INSERT INTO `campaign_configuration` VALUES ('667', '18', 'app_wall_description', 0x66647366);
INSERT INTO `campaign_configuration` VALUES ('668', '18', 'app_timer', 0x31);
INSERT INTO `campaign_configuration` VALUES ('669', '18', 'app_embedded_wall', 0x31);
INSERT INTO `campaign_configuration` VALUES ('670', '18', 'app_avatar', 0x30);
INSERT INTO `campaign_configuration` VALUES ('671', '18', 'app_date_teaser', 0x31333430363337323534);
INSERT INTO `campaign_configuration` VALUES ('672', '18', 'app_date_campaign', 0x31333431323432303430);
INSERT INTO `campaign_configuration` VALUES ('673', '18', 'app_date_close', 0x31333432343531363430);
INSERT INTO `campaign_configuration` VALUES ('674', '18', 'app_date_winners', 0x31333433303536343430);
INSERT INTO `campaign_configuration` VALUES ('675', '18', 'app_timezone', 0x554D33);
INSERT INTO `campaign_configuration` VALUES ('676', '18', 'app_user_requirements', 0x2C70686F6E652C6269727468646179);
INSERT INTO `campaign_configuration` VALUES ('677', '18', 'app_user_requirements_custom_label', '');
INSERT INTO `campaign_configuration` VALUES ('678', '18', 'app_rules', '');
INSERT INTO `campaign_configuration` VALUES ('679', '18', 'look_no_fan_mode', 0x64697361626C6564);
INSERT INTO `campaign_configuration` VALUES ('680', '18', 'look_no_fan_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('681', '18', 'look_no_fan_html', '');
INSERT INTO `campaign_configuration` VALUES ('682', '18', 'look_teaser_mode', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('683', '18', 'look_teaser_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('684', '18', 'look_teaser_html', '');
INSERT INTO `campaign_configuration` VALUES ('685', '18', 'look_campaign_mode', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('686', '18', 'look_campaign_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('687', '18', 'look_campaign_html', '');
INSERT INTO `campaign_configuration` VALUES ('688', '18', 'look_close_mode', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('689', '18', 'look_close_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('690', '18', 'look_close_html', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('691', '18', 'look_winners_mode', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('692', '18', 'look_winners_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('693', '18', 'look_winners_html', '');
INSERT INTO `campaign_configuration` VALUES ('694', '18', 'look_css', '');
INSERT INTO `campaign_configuration` VALUES ('695', '18', 'fb_agreement', 0x31);
INSERT INTO `campaign_configuration` VALUES ('696', '18', 'google_analytics', 0x667364);
INSERT INTO `campaign_configuration` VALUES ('697', '18', 'tab_1_configured', 0x31);
INSERT INTO `campaign_configuration` VALUES ('698', '18', 'tab_2_configured', 0x31);
INSERT INTO `campaign_configuration` VALUES ('699', '18', 'tab_3_configured', '');
INSERT INTO `campaign_configuration` VALUES ('700', '18', 'app_winners_extract_mode', 0x62616C6C6F74);
INSERT INTO `campaign_configuration` VALUES ('701', '19', 'app_features', 0x6C697465);
INSERT INTO `campaign_configuration` VALUES ('702', '19', 'app_title', '');
INSERT INTO `campaign_configuration` VALUES ('703', '19', 'app_description', '');
INSERT INTO `campaign_configuration` VALUES ('704', '19', 'app_language', '');
INSERT INTO `campaign_configuration` VALUES ('705', '19', 'app_wall_title', '');
INSERT INTO `campaign_configuration` VALUES ('706', '19', 'app_wall_description', '');
INSERT INTO `campaign_configuration` VALUES ('707', '19', 'app_timer', 0x30);
INSERT INTO `campaign_configuration` VALUES ('708', '19', 'app_embedded_wall', 0x30);
INSERT INTO `campaign_configuration` VALUES ('709', '19', 'app_avatar', 0x30);
INSERT INTO `campaign_configuration` VALUES ('710', '19', 'app_date_teaser', 0x31333431323430303233);
INSERT INTO `campaign_configuration` VALUES ('711', '19', 'app_date_campaign', 0x31333431383434383233);
INSERT INTO `campaign_configuration` VALUES ('712', '19', 'app_date_close', 0x31333433303534343233);
INSERT INTO `campaign_configuration` VALUES ('713', '19', 'app_date_winners', 0x31333433363539323233);
INSERT INTO `campaign_configuration` VALUES ('714', '19', 'app_timezone', 0x554D33);
INSERT INTO `campaign_configuration` VALUES ('715', '19', 'app_user_requirements', '');
INSERT INTO `campaign_configuration` VALUES ('716', '19', 'app_user_requirements_custom_label', '');
INSERT INTO `campaign_configuration` VALUES ('717', '19', 'app_rules', '');
INSERT INTO `campaign_configuration` VALUES ('718', '19', 'look_no_fan_mode', 0x64697361626C6564);
INSERT INTO `campaign_configuration` VALUES ('719', '19', 'look_no_fan_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('720', '19', 'look_no_fan_html', '');
INSERT INTO `campaign_configuration` VALUES ('721', '19', 'look_teaser_mode', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('722', '19', 'look_teaser_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('723', '19', 'look_teaser_html', '');
INSERT INTO `campaign_configuration` VALUES ('724', '19', 'look_campaign_mode', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('725', '19', 'look_campaign_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('726', '19', 'look_campaign_html', '');
INSERT INTO `campaign_configuration` VALUES ('727', '19', 'look_close_mode', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('728', '19', 'look_close_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('729', '19', 'look_close_html', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('730', '19', 'look_winners_mode', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('731', '19', 'look_winners_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('732', '19', 'look_winners_html', '');
INSERT INTO `campaign_configuration` VALUES ('733', '19', 'look_css', '');
INSERT INTO `campaign_configuration` VALUES ('734', '19', 'fb_agreement', '');
INSERT INTO `campaign_configuration` VALUES ('735', '19', 'google_analytics', '');
INSERT INTO `campaign_configuration` VALUES ('736', '19', 'tab_1_configured', '');
INSERT INTO `campaign_configuration` VALUES ('737', '19', 'tab_2_configured', '');
INSERT INTO `campaign_configuration` VALUES ('738', '19', 'tab_3_configured', '');
INSERT INTO `campaign_configuration` VALUES ('739', '19', 'app_winners_extract_mode', 0x62616C6C6F74);
INSERT INTO `campaign_configuration` VALUES ('740', '20', 'app_features', 0x66756C6C);
INSERT INTO `campaign_configuration` VALUES ('741', '20', 'app_title', 0x536F7274656F204C6561646D696E74203130);
INSERT INTO `campaign_configuration` VALUES ('742', '20', 'app_description', 0x536F7274656F20646520507275656261);
INSERT INTO `campaign_configuration` VALUES ('743', '20', 'app_language', 0x6573);
INSERT INTO `campaign_configuration` VALUES ('744', '20', 'app_wall_title', 0x47616E61746520756E61205461626C6574204C656E6F766F21);
INSERT INTO `campaign_configuration` VALUES ('745', '20', 'app_wall_description', 0x4573746520657320756E20706F737420646520507275656261);
INSERT INTO `campaign_configuration` VALUES ('746', '20', 'app_timer', 0x31);
INSERT INTO `campaign_configuration` VALUES ('747', '20', 'app_embedded_wall', 0x31);
INSERT INTO `campaign_configuration` VALUES ('748', '20', 'app_avatar', 0x2D504158502D6465696A452E676966);
INSERT INTO `campaign_configuration` VALUES ('749', '20', 'app_date_teaser', 0x31333431323630343530);
INSERT INTO `campaign_configuration` VALUES ('750', '20', 'app_date_campaign', 0x31333430363535363030);
INSERT INTO `campaign_configuration` VALUES ('751', '20', 'app_date_close', 0x31333433303734383030);
INSERT INTO `campaign_configuration` VALUES ('752', '20', 'app_date_winners', 0x31333433363739363030);
INSERT INTO `campaign_configuration` VALUES ('753', '20', 'app_timezone', 0x554D33);
INSERT INTO `campaign_configuration` VALUES ('754', '20', 'app_user_requirements', 0x2C6E616D652C656D61696C2C67656E6465722C637573746F6D);
INSERT INTO `campaign_configuration` VALUES ('755', '20', 'app_user_requirements_custom_label', 0x444E49);
INSERT INTO `campaign_configuration` VALUES ('756', '20', 'app_rules', 0x5426616D703B43);
INSERT INTO `campaign_configuration` VALUES ('757', '20', 'look_no_fan_mode', 0x64697361626C6564);
INSERT INTO `campaign_configuration` VALUES ('758', '20', 'look_no_fan_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('759', '20', 'look_no_fan_html', '');
INSERT INTO `campaign_configuration` VALUES ('760', '20', 'look_teaser_mode', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('761', '20', 'look_teaser_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('762', '20', 'look_teaser_html', '');
INSERT INTO `campaign_configuration` VALUES ('763', '20', 'look_campaign_mode', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('764', '20', 'look_campaign_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('765', '20', 'look_campaign_html', '');
INSERT INTO `campaign_configuration` VALUES ('766', '20', 'look_close_mode', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('767', '20', 'look_close_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('768', '20', 'look_close_html', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('769', '20', 'look_winners_mode', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('770', '20', 'look_winners_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('771', '20', 'look_winners_html', '');
INSERT INTO `campaign_configuration` VALUES ('772', '20', 'look_css', 0x2E72657175697265647B626F726465723A2031707820736F6C6964207265643B7D);
INSERT INTO `campaign_configuration` VALUES ('773', '20', 'fb_agreement', 0x31);
INSERT INTO `campaign_configuration` VALUES ('774', '20', 'google_analytics', 0x55412D323336303630382D3130);
INSERT INTO `campaign_configuration` VALUES ('775', '20', 'tab_1_configured', 0x31);
INSERT INTO `campaign_configuration` VALUES ('776', '20', 'tab_2_configured', 0x31);
INSERT INTO `campaign_configuration` VALUES ('777', '20', 'tab_3_configured', 0x31);
INSERT INTO `campaign_configuration` VALUES ('778', '20', 'app_winners_extract_mode', 0x62616C6C6F74);
INSERT INTO `campaign_configuration` VALUES ('779', '21', 'app_features', 0x66756C6C);
INSERT INTO `campaign_configuration` VALUES ('780', '21', 'app_title', 0x66677361677461);
INSERT INTO `campaign_configuration` VALUES ('781', '21', 'app_description', 0x626167616768);
INSERT INTO `campaign_configuration` VALUES ('782', '21', 'app_language', 0x6573);
INSERT INTO `campaign_configuration` VALUES ('783', '21', 'app_wall_title', 0x7A3C646766764156);
INSERT INTO `campaign_configuration` VALUES ('784', '21', 'app_wall_description', 0x3C5347564253);
INSERT INTO `campaign_configuration` VALUES ('785', '21', 'app_timer', 0x30);
INSERT INTO `campaign_configuration` VALUES ('786', '21', 'app_embedded_wall', 0x30);
INSERT INTO `campaign_configuration` VALUES ('787', '21', 'app_avatar', 0x30);
INSERT INTO `campaign_configuration` VALUES ('788', '21', 'app_date_teaser', 0x31333432373236323034);
INSERT INTO `campaign_configuration` VALUES ('789', '21', 'app_date_campaign', 0x31333433333331303034);
INSERT INTO `campaign_configuration` VALUES ('790', '21', 'app_date_close', 0x31333434353430363034);
INSERT INTO `campaign_configuration` VALUES ('791', '21', 'app_date_winners', 0x31333435313435343034);
INSERT INTO `campaign_configuration` VALUES ('792', '21', 'app_timezone', 0x554D33);
INSERT INTO `campaign_configuration` VALUES ('793', '21', 'app_user_requirements', '');
INSERT INTO `campaign_configuration` VALUES ('794', '21', 'app_user_requirements_custom_label', '');
INSERT INTO `campaign_configuration` VALUES ('795', '21', 'app_rules', '');
INSERT INTO `campaign_configuration` VALUES ('796', '21', 'look_no_fan_mode', 0x64697361626C6564);
INSERT INTO `campaign_configuration` VALUES ('797', '21', 'look_no_fan_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('798', '21', 'look_no_fan_html', '');
INSERT INTO `campaign_configuration` VALUES ('799', '21', 'look_teaser_mode', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('800', '21', 'look_teaser_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('801', '21', 'look_teaser_html', '');
INSERT INTO `campaign_configuration` VALUES ('802', '21', 'look_campaign_mode', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('803', '21', 'look_campaign_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('804', '21', 'look_campaign_html', '');
INSERT INTO `campaign_configuration` VALUES ('805', '21', 'look_close_mode', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('806', '21', 'look_close_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('807', '21', 'look_close_html', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('808', '21', 'look_winners_mode', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('809', '21', 'look_winners_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('810', '21', 'look_winners_html', '');
INSERT INTO `campaign_configuration` VALUES ('811', '21', 'look_css', '');
INSERT INTO `campaign_configuration` VALUES ('812', '21', 'fb_agreement', 0x31);
INSERT INTO `campaign_configuration` VALUES ('813', '21', 'google_analytics', '');
INSERT INTO `campaign_configuration` VALUES ('814', '21', 'tab_1_configured', 0x31);
INSERT INTO `campaign_configuration` VALUES ('815', '21', 'tab_2_configured', '');
INSERT INTO `campaign_configuration` VALUES ('816', '21', 'tab_3_configured', '');
INSERT INTO `campaign_configuration` VALUES ('817', '21', 'app_winners_extract_mode', 0x62616C6C6F74);
INSERT INTO `campaign_configuration` VALUES ('818', '22', 'app_features', 0x6C697465);
INSERT INTO `campaign_configuration` VALUES ('819', '22', 'app_title', '');
INSERT INTO `campaign_configuration` VALUES ('820', '22', 'app_description', '');
INSERT INTO `campaign_configuration` VALUES ('821', '22', 'app_language', '');
INSERT INTO `campaign_configuration` VALUES ('822', '22', 'app_wall_title', '');
INSERT INTO `campaign_configuration` VALUES ('823', '22', 'app_wall_description', '');
INSERT INTO `campaign_configuration` VALUES ('824', '22', 'app_timer', 0x30);
INSERT INTO `campaign_configuration` VALUES ('825', '22', 'app_embedded_wall', 0x30);
INSERT INTO `campaign_configuration` VALUES ('826', '22', 'app_avatar', 0x30);
INSERT INTO `campaign_configuration` VALUES ('827', '22', 'app_date_teaser', 0x31333432373330353836);
INSERT INTO `campaign_configuration` VALUES ('828', '22', 'app_date_campaign', 0x31333433333335333836);
INSERT INTO `campaign_configuration` VALUES ('829', '22', 'app_date_close', 0x31333434353434393836);
INSERT INTO `campaign_configuration` VALUES ('830', '22', 'app_date_winners', 0x31333435313439373836);
INSERT INTO `campaign_configuration` VALUES ('831', '22', 'app_timezone', 0x554D33);
INSERT INTO `campaign_configuration` VALUES ('832', '22', 'app_user_requirements', '');
INSERT INTO `campaign_configuration` VALUES ('833', '22', 'app_user_requirements_custom_label', '');
INSERT INTO `campaign_configuration` VALUES ('834', '22', 'app_rules', '');
INSERT INTO `campaign_configuration` VALUES ('835', '22', 'look_no_fan_mode', 0x64697361626C6564);
INSERT INTO `campaign_configuration` VALUES ('836', '22', 'look_no_fan_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('837', '22', 'look_no_fan_html', '');
INSERT INTO `campaign_configuration` VALUES ('838', '22', 'look_teaser_mode', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('839', '22', 'look_teaser_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('840', '22', 'look_teaser_html', '');
INSERT INTO `campaign_configuration` VALUES ('841', '22', 'look_campaign_mode', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('842', '22', 'look_campaign_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('843', '22', 'look_campaign_html', '');
INSERT INTO `campaign_configuration` VALUES ('844', '22', 'look_close_mode', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('845', '22', 'look_close_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('846', '22', 'look_close_html', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('847', '22', 'look_winners_mode', 0x64656661756C74);
INSERT INTO `campaign_configuration` VALUES ('848', '22', 'look_winners_image', 0x30);
INSERT INTO `campaign_configuration` VALUES ('849', '22', 'look_winners_html', '');
INSERT INTO `campaign_configuration` VALUES ('850', '22', 'look_css', '');
INSERT INTO `campaign_configuration` VALUES ('851', '22', 'fb_agreement', '');
INSERT INTO `campaign_configuration` VALUES ('852', '22', 'google_analytics', '');
INSERT INTO `campaign_configuration` VALUES ('853', '22', 'tab_1_configured', '');
INSERT INTO `campaign_configuration` VALUES ('854', '22', 'tab_2_configured', '');
INSERT INTO `campaign_configuration` VALUES ('855', '22', 'tab_3_configured', '');
INSERT INTO `campaign_configuration` VALUES ('856', '22', 'app_winners_extract_mode', 0x62616C6C6F74);

-- ----------------------------
-- Table structure for `facebook_user`
-- ----------------------------
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
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of facebook_user
-- ----------------------------
INSERT INTO `facebook_user` VALUES ('5', '100000365619835', 'House Gregory', 'House', '', 'Gregory', 'http://www.facebook.com/profile.php?id=100000365619835', '0000-00-00', 'sfarsuau@hotmail.com', '-3', 'en_US', '1', '2012-04-18 20:08:57');
INSERT INTO `facebook_user` VALUES ('6', '1378190638', 'Santiago Far Suau', 'Santiago', '', 'Suau', 'http://www.facebook.com/santiagofs', '0000-00-00', 'santiagofs@gmail.com', '-3', 'en_US', '1', '2012-04-19 19:37:27');
INSERT INTO `facebook_user` VALUES ('7', '100001952113675', 'Enzo Sifrub', 'Enzo', '', 'Sifrub', 'http://www.facebook.com/enzo.sifrub', '0000-00-00', 'francisco.valenzuela@frubis.com', '-3', 'en_US', '1', '2012-04-19 20:45:05');
INSERT INTO `facebook_user` VALUES ('8', '100003402403277', 'Demo Frubis', 'Demo', '', 'Frubis', 'http://www.facebook.com/profile.php?id=100003402403277', '0000-00-00', 'demofrubis@gmail.com', '-3', 'en_US', '0', '2012-04-19 20:51:41');
INSERT INTO `facebook_user` VALUES ('9', '631995560', 'Pablo Szachtman', 'Pablo', '', 'Szachtman', 'http://www.facebook.com/szachtman', '0000-00-00', 'paszachtman@hotmail.com', '-3', 'en_US', '1', '2012-05-02 13:53:06');
INSERT INTO `facebook_user` VALUES ('10', '100003042458475', 'Efsfbone Development', 'Efsfbone', '', 'Development', 'http://www.facebook.com/profile.php?id=100003042458475', '0000-00-00', 'efsfbdev1@gmail.com', '-3', 'en_US', '0', '2012-05-02 19:16:17');
INSERT INTO `facebook_user` VALUES ('11', '689991521', 'Matias O\'Keefe', 'Matias', '', 'O\'Keefe', 'http://www.facebook.com/matias.okeefe', '0000-00-00', 'matias.okeefe@gmail.com', '-3', 'es_LA', '1', '2012-06-25 18:19:13');

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
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
  `active` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'Santiago', 'Far Suau', 'santiagofs@gmail.com', 'f8ad6119ed49b17bad5ec3e0ba7d967cd91be535', '1', '2012-07-12 09:12:52', '190.244.20.78', '2012-03-20 14:40:42', '2012-07-12 09:12:52', '26e1c567a525192f6dcb8bfbfe2e714e488a84bf', 'es_US', '1');
INSERT INTO `user` VALUES ('2', 'Pablo', 'Szachtman', 'pablo.szachtman@frubis.com', 'a234b55247d8ce0340521a3ae209dd3f8480198a', '0', '2012-03-27 21:18:10', '186.22.142.214', '2012-03-27 16:06:31', '2012-03-27 21:18:10', '', 'en_GB', '1');
INSERT INTO `user` VALUES ('3', 'Agustin', 'Rinaldi', 'agustin@frubis.com', 'abf8ba26166e7358bda3b6020e3444835c931dc5', '0', '2012-03-29 19:38:22', '186.22.142.214', '2012-03-29 19:38:22', '2012-03-29 19:38:22', '', 'es_AR', '1');
INSERT INTO `user` VALUES ('4', 'Ezequiel', 'Szachtman', 'batman@frubis.com', 'a234b55247d8ce0340521a3ae209dd3f8480198a', '0', '2012-04-17 14:07:57', '186.22.142.214', '2012-04-17 14:07:56', '2012-04-17 14:07:57', '', 'es_AR', '1');
INSERT INTO `user` VALUES ('5', 'Frubis', 'Demo', 'demofrubis@gmail.com', 'cb7761e333aa80ea638dd6d5a9c286fce6ed57ab', '0', '2012-04-20 19:05:03', '186.22.142.214', '2012-04-19 20:41:59', '2012-04-20 19:05:03', '', 'es_AR', '1');
INSERT INTO `user` VALUES ('6', 'Matias', 'O\'Keefe', 'matias@frubis.com', 'ec48bd5cd9a886277daad638c988767ee2261d2f', '0', '2012-06-25 11:39:37', '190.55.118.132', '2012-04-19 20:42:50', '2012-06-25 11:39:37', '', 'es_AR', '1');
INSERT INTO `user` VALUES ('7', 'Lucas', 'lopez', 'lopez.lucas.arg@gmail.com', 'a234b55247d8ce0340521a3ae209dd3f8480198a', '0', '2012-04-20 19:25:51', '186.22.142.214', '2012-04-20 19:25:51', '2012-04-20 19:25:51', '', 'es_AR', '1');
INSERT INTO `user` VALUES ('8', 'valeria', 'orlando', 'vale@leadmint.com', 'a234b55247d8ce0340521a3ae209dd3f8480198a', '0', '2012-07-12 15:53:50', '186.23.90.125', '2012-04-23 12:40:06', '2012-07-12 15:53:50', '', 'es_AR', '1');
INSERT INTO `user` VALUES ('9', 'valeria', 'orlando', 'valeria@leadmint.com', 'a234b55247d8ce0340521a3ae209dd3f8480198a', '0', '2012-07-16 09:38:19', '186.23.90.125', '2012-04-25 15:04:31', '2012-07-16 09:38:19', '', 'es_AR', '1');
INSERT INTO `user` VALUES ('10', 'test', 'campaña', 'test@leadmint.com', 'a234b55247d8ce0340521a3ae209dd3f8480198a', '0', '2012-04-25 17:40:44', '186.22.142.214', '2012-04-25 15:17:53', '2012-04-25 17:40:44', '', 'es_AR', '1');
INSERT INTO `user` VALUES ('11', 'Testnuevo', 'nuevo', 'testnuevo@leadmint.com', 'a234b55247d8ce0340521a3ae209dd3f8480198a', '0', '2012-04-25 15:49:21', '186.22.142.214', '2012-04-25 15:49:21', '2012-04-25 15:49:21', '', 'es_AR', '1');
INSERT INTO `user` VALUES ('12', 'Valeria', 'test', 'test_nuevo@leadmint.com', 'a234b55247d8ce0340521a3ae209dd3f8480198a', '0', '2012-04-25 18:04:36', '186.22.142.214', '2012-04-25 17:54:31', '2012-04-25 18:04:36', '', 'es_AR', '1');
INSERT INTO `user` VALUES ('13', 'Valeria', 'test', 'valeria_test@gmail.com', 'a234b55247d8ce0340521a3ae209dd3f8480198a', '0', '2012-06-06 20:38:53', '190.55.118.132', '2012-04-26 14:00:04', '2012-06-06 20:38:53', '', 'es', '1');
INSERT INTO `user` VALUES ('14', 'valeria', 'test_2', 'valeria_test2@gmail.com', 'a234b55247d8ce0340521a3ae209dd3f8480198a', '0', '2012-04-26 17:57:01', '186.22.142.214', '2012-04-26 17:57:01', '2012-04-26 17:57:01', '', 'es', '1');
INSERT INTO `user` VALUES ('15', 'Pablo', 'Szachtman', 'pablos@frubis.com', '86e0596dce10dee7e61dfbbdbae08f5535225173', '1', '2012-07-12 12:42:41', '186.23.90.125', '2012-05-03 18:03:22', '2012-07-12 12:42:41', '', 'es', '1');
INSERT INTO `user` VALUES ('16', 'Nicolas', 'Buttarelli', 'nbuttarelli@gmail.com', '790fa14e79aff1d921339ee45be74f670cf467ab', '1', '2012-06-15 15:37:49', '201.252.37.73', '2012-06-15 15:35:54', '2012-06-15 15:38:42', '', 'es_AR', '1');

-- ----------------------------
-- Table structure for `user_content`
-- ----------------------------
DROP TABLE IF EXISTS `user_content`;
CREATE TABLE `user_content` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `campaign_id` int(11) DEFAULT NULL,
  `facebook_user_id` bigint(11) DEFAULT NULL,
  `category` varchar(20) DEFAULT NULL,
  `content` text,
  `votes` int(11) DEFAULT NULL,
  `winner` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `reported` int(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user_content
-- ----------------------------
INSERT INTO `user_content` VALUES ('1', '1', '631995560', 'comment', 'Prueba de mi comentario, decís que funciona?', null, null, '2012-05-11 19:21:34', null);
INSERT INTO `user_content` VALUES ('2', '1', '631995560', 'comment', 'Parece que si!', null, null, '2012-05-11 19:21:46', null);
INSERT INTO `user_content` VALUES ('3', '1', '631995560', 'sweepstakes', 'a:6:{s:5:\"email\";s:23:\"paszachtman@hotmail.com\";s:5:\"phone\";s:3:\"123\";s:8:\"birthday\";s:10:\"2012-05-03\";s:6:\"gender\";s:4:\"male\";s:7:\"country\";s:2:\"AR\";s:6:\"custom\";s:23:\"Es una excelente marca!\";}', null, null, '2012-05-11 19:36:38', null);
INSERT INTO `user_content` VALUES ('4', '1', '631995560', 'comment', 'Puedo seguir publicando una vez que finalizó?', null, null, '2012-05-11 19:39:42', null);
INSERT INTO `user_content` VALUES ('5', '3', '100000365619835', 'sweepstakes', 'a:9:{s:5:\"email\";s:20:\"sfarsuau@hotmail.com\";s:5:\"phone\";s:4:\"test\";s:12:\"birthday-day\";s:2:\"31\";s:14:\"birthday-month\";s:2:\"12\";s:13:\"birthday-year\";s:4:\"2012\";s:8:\"birthday\";s:10:\"2012-12-31\";s:6:\"gender\";s:4:\"male\";s:7:\"country\";s:2:\"AF\";s:6:\"custom\";s:4:\"test\";}', null, '1', '2012-05-18 19:20:20', null);
INSERT INTO `user_content` VALUES ('6', '7', '100003402403277', 'sweepstakes', 'a:9:{s:5:\"email\";s:20:\"demofrubis@gmail.com\";s:5:\"phone\";s:8:\"22222222\";s:12:\"birthday-day\";s:2:\"21\";s:14:\"birthday-month\";s:1:\"5\";s:13:\"birthday-year\";s:4:\"2012\";s:8:\"birthday\";s:10:\"2012-05-21\";s:6:\"gender\";s:6:\"female\";s:7:\"country\";s:2:\"AF\";s:6:\"custom\";s:7:\"dqasdaf\";}', null, null, '2012-05-21 13:18:33', null);
INSERT INTO `user_content` VALUES ('7', '1', '631995560', 'comment', 'Quiero ver como deja el comentario en mi muro.', null, null, '2012-05-21 13:29:52', null);
INSERT INTO `user_content` VALUES ('8', '8', '631995560', 'sweepstakes', 'a:8:{s:5:\"email\";s:0:\"\";s:5:\"phone\";s:4:\"fdsf\";s:12:\"birthday-day\";s:2:\"21\";s:14:\"birthday-month\";s:1:\"5\";s:13:\"birthday-year\";s:4:\"2012\";s:8:\"birthday\";s:10:\"2012-05-21\";s:6:\"gender\";s:4:\"male\";s:7:\"country\";s:2:\"AF\";}', null, null, '2012-05-21 13:45:43', null);
INSERT INTO `user_content` VALUES ('9', '5', '100000365619835', 'sweepstakes', 'a:0:{}', null, '2', '2012-05-21 13:59:45', null);
INSERT INTO `user_content` VALUES ('10', '5', '631995560', 'sweepstakes', 'a:0:{}', null, '1', '2012-05-21 14:26:04', null);
INSERT INTO `user_content` VALUES ('11', '5', '100000365619835', 'comment', 'my great comment', null, null, '2012-05-21 14:38:53', '1');
INSERT INTO `user_content` VALUES ('12', '5', '100000365619835', 'comment', 'another comment', null, null, '2012-05-29 19:54:06', '0');
INSERT INTO `user_content` VALUES ('13', '5', '100000365619835', 'comment', 'another comment!!!', null, null, '2012-05-29 19:54:14', '-1');
INSERT INTO `user_content` VALUES ('14', '5', '100000365619835', 'comment', 'online comment', null, null, '2012-05-29 20:06:45', '-1');
INSERT INTO `user_content` VALUES ('15', '2', '631995560', 'comment', 'fhghgf', null, null, '2012-06-01 14:53:32', '1');
INSERT INTO `user_content` VALUES ('16', '20', '689991521', 'comment', 'Pregunta sin respuesta', null, null, '2012-06-25 18:21:45', '0');
INSERT INTO `user_content` VALUES ('17', '20', '689991521', 'sweepstakes', 'a:4:{s:4:\"name\";s:14:\"Matias O\'Keefe\";s:5:\"email\";s:23:\"matias.okeefe@gmail.com\";s:6:\"gender\";s:4:\"male\";s:6:\"custom\";s:8:\"24439999\";}', null, null, '2012-06-25 18:22:07', '0');
