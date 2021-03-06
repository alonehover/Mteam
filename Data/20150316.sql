/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50540
Source Host           : 127.0.0.1:3306
Source Database       : mgroup

Target Server Type    : MYSQL
Target Server Version : 50540
File Encoding         : 65001

Date: 2015-03-16 17:24:55
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for mg_auther
-- ----------------------------
DROP TABLE IF EXISTS `mg_auther`;
CREATE TABLE `mg_auther` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stunum` varchar(255) DEFAULT NULL,
  `authername` varchar(255) DEFAULT NULL,
  `sex` varchar(255) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `qq` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `major` varchar(255) DEFAULT NULL,
  `skill` varchar(255) DEFAULT NULL,
  `info` varchar(255) DEFAULT NULL,
  `group` varchar(255) DEFAULT NULL,
  `jointime` int(11) DEFAULT NULL,
  `logintime` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mg_auther
-- ----------------------------
INSERT INTO `mg_auther` VALUES ('1', '201131104099', null, null, null, null, 'alonehover@qq.com', null, null, null, null, null, '1426477685', '1');
INSERT INTO `mg_auther` VALUES ('2', '201131104100', null, null, null, null, 'admin@qq.com', null, null, null, null, null, '1426477685', '1');
INSERT INTO `mg_auther` VALUES ('3', '201131103040', null, null, null, null, 'admin@11.COM', null, null, null, null, null, '1426477724', '1');

-- ----------------------------
-- Table structure for mg_auth_group
-- ----------------------------
DROP TABLE IF EXISTS `mg_auth_group`;
CREATE TABLE `mg_auth_group` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(100) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `rules` char(80) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mg_auth_group
-- ----------------------------

-- ----------------------------
-- Table structure for mg_auth_group_access
-- ----------------------------
DROP TABLE IF EXISTS `mg_auth_group_access`;
CREATE TABLE `mg_auth_group_access` (
  `uid` mediumint(8) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  UNIQUE KEY `uid_group_id` (`uid`,`group_id`),
  KEY `uid` (`uid`),
  KEY `group_id` (`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mg_auth_group_access
-- ----------------------------

-- ----------------------------
-- Table structure for mg_auth_rule
-- ----------------------------
DROP TABLE IF EXISTS `mg_auth_rule`;
CREATE TABLE `mg_auth_rule` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(80) NOT NULL DEFAULT '',
  `title` char(20) NOT NULL DEFAULT '',
  `type` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `condition` char(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mg_auth_rule
-- ----------------------------

-- ----------------------------
-- Table structure for mg_group
-- ----------------------------
DROP TABLE IF EXISTS `mg_group`;
CREATE TABLE `mg_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(255) DEFAULT NULL,
  `group_info` varchar(255) DEFAULT NULL,
  `group_declare` varchar(255) DEFAULT NULL,
  `group_praise` int(11) DEFAULT NULL,
  `group_img` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mg_group
-- ----------------------------

-- ----------------------------
-- Table structure for status_project
-- ----------------------------
DROP TABLE IF EXISTS `status_project`;
CREATE TABLE `status_project` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` tinyint(4) DEFAULT '1',
  `remark` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of status_project
-- ----------------------------
INSERT INTO `status_project` VALUES ('1', '1', '可申请');
INSERT INTO `status_project` VALUES ('2', '2', '已申请');
INSERT INTO `status_project` VALUES ('3', '3', '已过期');
