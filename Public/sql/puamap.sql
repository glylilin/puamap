/*
Navicat MySQL Data Transfer

Source Server         : 本地
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : puamap

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2017-04-14 18:33:37
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `puamap_admin`
-- ----------------------------
DROP TABLE IF EXISTS `puamap_admin`;
CREATE TABLE `puamap_admin` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '后台管理id',
  `username` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `login_time` int(11) unsigned DEFAULT NULL COMMENT '注册时间',
  `regist_time` int(11) unsigned DEFAULT NULL COMMENT '注册时间',
  `typeid` int(2) unsigned DEFAULT NULL COMMENT '类型1默认为系统管理员',
  `login_ip` varchar(200) DEFAULT NULL COMMENT '登录ip',
  `regist_ip` varchar(200) DEFAULT NULL COMMENT '注册ip',
  `isdel` int(1) unsigned DEFAULT '0' COMMENT '1表示删除0表示正常',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of puamap_admin
-- ----------------------------
INSERT INTO `puamap_admin` VALUES ('1', 'admin', 'f277a8129dfe0a144e6090a0d8347889', null, null, '1', null, null, '0');
