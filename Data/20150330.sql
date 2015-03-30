/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50540
Source Host           : 127.0.0.1:3306
Source Database       : mgroup

Target Server Type    : MYSQL
Target Server Version : 50540
File Encoding         : 65001

Date: 2015-03-30 10:59:08
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for mg_apply_group
-- ----------------------------
DROP TABLE IF EXISTS `mg_apply_group`;
CREATE TABLE `mg_apply_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stu` varchar(255) DEFAULT NULL,
  `gid` varchar(255) DEFAULT NULL,
  `status` tinyint(10) DEFAULT '0',
  `apply_time` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for mg_apply_project
-- ----------------------------
DROP TABLE IF EXISTS `mg_apply_project`;
CREATE TABLE `mg_apply_project` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gid` varchar(255) DEFAULT NULL,
  `pid` varchar(255) DEFAULT NULL,
  `status` tinyint(255) DEFAULT '0',
  `apply_time` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for mg_author
-- ----------------------------
DROP TABLE IF EXISTS `mg_author`;
CREATE TABLE `mg_author` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stunum` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `authorname` varchar(255) DEFAULT NULL,
  `sex` varchar(255) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `qq` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `major` varchar(255) DEFAULT NULL,
  `skill` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `info` varchar(255) DEFAULT NULL,
  `group` varchar(255) DEFAULT NULL,
  `jointime` int(11) DEFAULT NULL,
  `logintime` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `leader` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

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
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for mg_group
-- ----------------------------
DROP TABLE IF EXISTS `mg_group`;
CREATE TABLE `mg_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `info` varchar(255) DEFAULT NULL,
  `declare` varchar(255) DEFAULT NULL,
  `praise` int(11) DEFAULT '0',
  `img` varchar(255) DEFAULT NULL,
  `create_time` varchar(255) NOT NULL,
  `create_person` varchar(255) DEFAULT NULL,
  `skill` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for mg_menu
-- ----------------------------
DROP TABLE IF EXISTS `mg_menu`;
CREATE TABLE `mg_menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '文档ID',
  `title` varchar(50) NOT NULL DEFAULT '' COMMENT '标题',
  `pid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '上级分类ID',
  `sort` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '排序（同级有效）',
  `url` char(255) NOT NULL DEFAULT '' COMMENT '链接地址',
  `hide` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否隐藏',
  `tip` varchar(255) NOT NULL DEFAULT '' COMMENT '提示',
  `group` varchar(50) DEFAULT '' COMMENT '分组',
  `is_right` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '仅作为权限分类',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态',
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`),
  KEY `status` (`status`)
) ENGINE=MyISAM AUTO_INCREMENT=140 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for mg_praise
-- ----------------------------
DROP TABLE IF EXISTS `mg_praise`;
CREATE TABLE `mg_praise` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stu` varchar(255) DEFAULT NULL,
  `group` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for mg_project
-- ----------------------------
DROP TABLE IF EXISTS `mg_project`;
CREATE TABLE `mg_project` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `skill` varchar(255) DEFAULT NULL,
  `apply_endtime` varchar(255) DEFAULT NULL,
  `project_endtime` varchar(255) DEFAULT NULL,
  `public_time` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `desc` varchar(255) DEFAULT NULL,
  `group` varchar(255) DEFAULT NULL,
  `end_days` int(255) DEFAULT NULL,
  `evaluate` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for mg_skill
-- ----------------------------
DROP TABLE IF EXISTS `mg_skill`;
CREATE TABLE `mg_skill` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

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
-- Table structure for status_project
-- ----------------------------
DROP TABLE IF EXISTS `status_project`;
CREATE TABLE `status_project` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` tinyint(4) DEFAULT '1',
  `remark` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
