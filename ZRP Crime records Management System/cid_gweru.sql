/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50051
Source Host           : localhost:3306
Source Database       : cid_gweru

Target Server Type    : MYSQL
Target Server Version : 50051
File Encoding         : 65001

Date: 2012-10-19 18:47:14
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `cbd_holder`
-- ----------------------------
DROP TABLE IF EXISTS `cbd_holder`;
CREATE TABLE `cbd_holder` (
  `id` bigint(20) NOT NULL auto_increment,
  `person_id` bigint(20) default NULL,
  `court` varchar(100) default NULL,
  `place_of_trial` varchar(250) default NULL,
  `trial_date` bigint(20) default NULL,
  `sentence` varchar(250) default NULL,
  `offence` varchar(250) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of cbd_holder
-- ----------------------------
INSERT INTO `cbd_holder` VALUES ('1', '1', 'Gweru Majistrate', '', '8', '10 Years', 'Pubic Urination');
INSERT INTO `cbd_holder` VALUES ('2', '1', 'Gweru Majistrate', 'Gweru', '1345593600', '10 Years', 'Pubic Urination');
INSERT INTO `cbd_holder` VALUES ('3', '1', '', '', '0', '', '');
INSERT INTO `cbd_holder` VALUES ('4', '6', 'Gweru Central', 'Gweru', '1350684000', 'Dearh', 'Killing');

-- ----------------------------
-- Table structure for `cellphone`
-- ----------------------------
DROP TABLE IF EXISTS `cellphone`;
CREATE TABLE `cellphone` (
  `id` bigint(20) NOT NULL auto_increment,
  `cr_no` varchar(250) NOT NULL,
  `item_name` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  `identity` varchar(250) NOT NULL,
  `registered_owner` varchar(250) NOT NULL,
  `contact_details` varchar(250) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of cellphone
-- ----------------------------
INSERT INTO `cellphone` VALUES ('1', '', '', '', '', '', '');

-- ----------------------------
-- Table structure for `electrical_item`
-- ----------------------------
DROP TABLE IF EXISTS `electrical_item`;
CREATE TABLE `electrical_item` (
  `id` bigint(20) NOT NULL auto_increment,
  `cr_no` varchar(250) NOT NULL,
  `item_name` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  `identity` varchar(250) NOT NULL,
  `registered_owner` varchar(250) NOT NULL,
  `contact_details` varchar(250) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of electrical_item
-- ----------------------------

-- ----------------------------
-- Table structure for `modules_operandi`
-- ----------------------------
DROP TABLE IF EXISTS `modules_operandi`;
CREATE TABLE `modules_operandi` (
  `id` bigint(20) NOT NULL auto_increment,
  `person_id` bigint(20) default NULL,
  `offence` varchar(250) default NULL,
  `mo` varchar(250) default NULL,
  `area` varchar(250) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of modules_operandi
-- ----------------------------
INSERT INTO `modules_operandi` VALUES ('1', '1', 'Pubic Urination', '2178', 'Gweru');

-- ----------------------------
-- Table structure for `motor_vehicle`
-- ----------------------------
DROP TABLE IF EXISTS `motor_vehicle`;
CREATE TABLE `motor_vehicle` (
  `id` bigint(20) NOT NULL auto_increment,
  `cr_no` varchar(250) NOT NULL,
  `registration_no` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  `engine_no` varchar(250) NOT NULL,
  `chasis_no` varchar(250) NOT NULL,
  `registered_owner` varchar(250) NOT NULL,
  `contact_details` varchar(250) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of motor_vehicle
-- ----------------------------

-- ----------------------------
-- Table structure for `person`
-- ----------------------------
DROP TABLE IF EXISTS `person`;
CREATE TABLE `person` (
  `id` bigint(20) NOT NULL auto_increment,
  `national_id` varchar(25) default NULL,
  `full_names` varchar(250) default NULL,
  `residental_address` varchar(250) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of person
-- ----------------------------
INSERT INTO `person` VALUES ('1', '29-249372-V-45', 'Gracious Farai Mashasha     ', '');
INSERT INTO `person` VALUES ('2', '66-1878787-D-28', 'Eric Cartman ', null);
INSERT INTO `person` VALUES ('3', '12-34555555-C-12', ' PHP', null);
INSERT INTO `person` VALUES ('4', '11-11111111-A-11', ' Brian Takunda', null);
INSERT INTO `person` VALUES ('5', '11-11111111-A-11', ' Brian Takunda', null);
INSERT INTO `person` VALUES ('6', '12-33333333-Q-23', ' Hondo', 'Gweru');
INSERT INTO `person` VALUES ('7', '12-22222222-B-12', ' fsdfdsfds', null);

-- ----------------------------
-- Table structure for `recent_releases`
-- ----------------------------
DROP TABLE IF EXISTS `recent_releases`;
CREATE TABLE `recent_releases` (
  `id` bigint(20) NOT NULL auto_increment,
  `person_id` bigint(20) default NULL,
  `prison_number` varchar(50) default NULL,
  `offence` varchar(250) default NULL,
  `cbr_number` varchar(50) default NULL,
  `edr` varchar(50) default NULL,
  `forwarding_address` varchar(250) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of recent_releases
-- ----------------------------
INSERT INTO `recent_releases` VALUES ('1', '1', '799', 'Pubic Urination', '890', '8980', '5364 Chitungwiza');
INSERT INTO `recent_releases` VALUES ('2', '2', '89', 'Pubic Urination', '890', '8980', '5364 Chitungwiza');

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` bigint(20) NOT NULL auto_increment,
  `full_name` varchar(250) default NULL,
  `username` varchar(250) default NULL,
  `password` varchar(250) default NULL,
  `level` varchar(250) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'admin', 'admin', 'admin', 'HQ');
INSERT INTO `user` VALUES ('2', 'Liberty', 'liberty', 'liberty', 'Substation');

-- ----------------------------
-- Table structure for `wanted_person`
-- ----------------------------
DROP TABLE IF EXISTS `wanted_person`;
CREATE TABLE `wanted_person` (
  `id` bigint(20) NOT NULL auto_increment,
  `person_id` bigint(20) default NULL,
  `station` varchar(50) default NULL,
  `cr_number` varchar(50) default NULL,
  `offence` varchar(250) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of wanted_person
-- ----------------------------
INSERT INTO `wanted_person` VALUES ('1', '1', 'Gweru Central', '3290', 'Pubic Urination');
INSERT INTO `wanted_person` VALUES ('2', '1', 'Gweru Central', '3291', 'Retard');
INSERT INTO `wanted_person` VALUES ('3', '2', 'Gweru Central', '3292', 'Jew');
INSERT INTO `wanted_person` VALUES ('4', '3', 'Gweru', '123', 'Murder');
INSERT INTO `wanted_person` VALUES ('5', '5', 'Gweru', '1232', 'Nthing bt in order');
INSERT INTO `wanted_person` VALUES ('6', '7', 'sdfdsf', 'dsfdsf', 'dsfdsfdsf');
