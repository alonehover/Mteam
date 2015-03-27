/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50540
Source Host           : 127.0.0.1:3306
Source Database       : mgroup

Target Server Type    : MYSQL
Target Server Version : 50540
File Encoding         : 65001

Date: 2015-03-27 15:49:21
*/

SET FOREIGN_KEY_CHECKS=0;

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
-- Records of mg_author
-- ----------------------------
INSERT INTO `mg_author` VALUES ('7', '201131104099', '4297f44b13955235245b2497399d7a93', null, null, null, null, 'aaa@qq.com', null, null, '', null, '14', '1427439179', '1427424036', '1', '1');
INSERT INTO `mg_author` VALUES ('6', '201131104100', '4297f44b13955235245b2497399d7a93', 'weilanzhuan', '男', null, null, 'mgroup@mgroup.com', null, '1,5', null, 'ASD', '6', null, '1426843313', '1', '1');

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
INSERT INTO `mg_auth_group` VALUES ('1', '队长', '1', '1,2', '团队负责人');
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
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mg_auth_rule
-- ----------------------------
INSERT INTO `mg_auth_rule` VALUES ('1', 'User/Author', '用户管理', '1', '1', '');
INSERT INTO `mg_auth_rule` VALUES ('2', 'User/Author/list_user', '用户列表', '1', '1', '');
INSERT INTO `mg_auth_rule` VALUES ('13', 'User/Author/del_user', '删除用户', '1', '1', '');
INSERT INTO `mg_auth_rule` VALUES ('14', 'User/Team', '团队管理', '1', '1', '');

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
-- Records of mg_group
-- ----------------------------
INSERT INTO `mg_group` VALUES ('14', '阿斯顿', '阿斯顿', '阿斯顿', '0', '/Mteam/Uploads/Picture/2015-03-27/5514fe4713b12.jpg', '1427439179', '201131104099', 'html+css');

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
-- Records of mg_menu
-- ----------------------------
INSERT INTO `mg_menu` VALUES ('128', '用户列表', '127', '1', 'User/Author/list_user', '0', '用户列表', '', '0', '0');
INSERT INTO `mg_menu` VALUES ('127', '用户管理', '0', '0', 'User/Author', '0', '用户管理', '', '0', '0');
INSERT INTO `mg_menu` VALUES ('138', '删除用户', '127', '3', 'User/Author/del_user', '1', '', '', '0', '0');
INSERT INTO `mg_menu` VALUES ('139', '团队管理', '0', '0', 'User/Team', '0', '', '', '0', '0');

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
-- Records of mg_project
-- ----------------------------
INSERT INTO `mg_project` VALUES ('6', '撒', 'c#,html+css', '1427731200', '1432051200', '1427440217', '1', '啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊撒大苏打实打实的\r\nasda盛大的\r\nasdasd \r\nsadadsdas的a十大\r\nsda sdasd asd ', null, null, null);

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
-- Records of mg_skill
-- ----------------------------
INSERT INTO `mg_skill` VALUES ('1', 'php');
INSERT INTO `mg_skill` VALUES ('3', 'c#');
INSERT INTO `mg_skill` VALUES ('4', 'html+css');
INSERT INTO `mg_skill` VALUES ('5', 'javascript');
INSERT INTO `mg_skill` VALUES ('6', 'c');
INSERT INTO `mg_skill` VALUES ('7', 'c++');
INSERT INTO `mg_skill` VALUES ('8', 'java');
INSERT INTO `mg_skill` VALUES ('9', 'python');

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
