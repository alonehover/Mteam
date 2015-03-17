/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50540
Source Host           : 127.0.0.1:3306
Source Database       : mgroup

Target Server Type    : MYSQL
Target Server Version : 50540
File Encoding         : 65001

Date: 2015-03-17 17:05:19
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
  `desc` varchar(255) DEFAULT NULL COMMENT '描述',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mg_auth_group
-- ----------------------------
INSERT INTO `mg_auth_group` VALUES ('1', '队长', '1', '', '团队负责人');
INSERT INTO `mg_auth_group` VALUES ('2', '队员', '1', '', '团队成员');
INSERT INTO `mg_auth_group` VALUES ('7', '游客', '1', '', '未加入团队的用户');

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
  `create_time` varchar(0) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mg_group
-- ----------------------------

-- ----------------------------
-- Table structure for mg_group_apply
-- ----------------------------
DROP TABLE IF EXISTS `mg_group_apply`;
CREATE TABLE `mg_group_apply` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `apply_name` varchar(255) DEFAULT NULL,
  `apply_auther` varchar(255) DEFAULT NULL,
  `apply_reason` varchar(255) DEFAULT NULL,
  `apply_time` varchar(255) DEFAULT NULL,
  `apply_status` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mg_group_apply
-- ----------------------------

-- ----------------------------
-- Table structure for mg_skill
-- ----------------------------
DROP TABLE IF EXISTS `mg_skill`;
CREATE TABLE `mg_skill` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `skill` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mg_skill
-- ----------------------------

-- ----------------------------
-- Table structure for mg_status_group
-- ----------------------------
DROP TABLE IF EXISTS `mg_status_group`;
CREATE TABLE `mg_status_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_status` varchar(255) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mg_status_group
-- ----------------------------

-- ----------------------------
-- Table structure for mg_status_project
-- ----------------------------
DROP TABLE IF EXISTS `mg_status_project`;
CREATE TABLE `mg_status_project` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` tinyint(4) DEFAULT '1',
  `remark` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mg_status_project
-- ----------------------------
INSERT INTO `mg_status_project` VALUES ('1', '1', '可申请');
INSERT INTO `mg_status_project` VALUES ('2', '2', '已申请');
INSERT INTO `mg_status_project` VALUES ('3', '3', '已过期');

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
