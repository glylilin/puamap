/*
Navicat MySQL Data Transfer

Source Server         : 本地
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : puamap

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2017-04-17 23:17:50
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

-- ----------------------------
-- Table structure for `puamap_friend_link`
-- ----------------------------
DROP TABLE IF EXISTS `puamap_friend_link`;
CREATE TABLE `puamap_friend_link` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `link` varchar(255) NOT NULL,
  `add_time` int(11) unsigned DEFAULT NULL,
  `is_use` int(1) unsigned DEFAULT '1' COMMENT '1表示启用0比启用',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of puamap_friend_link
-- ----------------------------
INSERT INTO `puamap_friend_link` VALUES ('1', '百度', 'http://www.baidu.com', '1492435838', '1');
INSERT INTO `puamap_friend_link` VALUES ('2', '优酷', 'http://www.youku.com/', '1492435838', '1');
INSERT INTO `puamap_friend_link` VALUES ('3', '阿里巴巴', 'https://www.1688.com/', '1492435838', '1');
INSERT INTO `puamap_friend_link` VALUES ('4', '腾讯', 'http://www.qq.com', '1492435838', '1');
INSERT INTO `puamap_friend_link` VALUES ('6', '坏男孩', 'http://www.puahome.com', '1492435838', '1');
INSERT INTO `puamap_friend_link` VALUES ('7', '舞步学院', 'http://www.wubupua.com', '1492435838', '1');
INSERT INTO `puamap_friend_link` VALUES ('8', '360', 'http://www.360.com', '1492435838', '1');
INSERT INTO `puamap_friend_link` VALUES ('9', '美丽说', 'http://www.meili.com', '1492435838', '1');
INSERT INTO `puamap_friend_link` VALUES ('10', '奇云测', 'http://ce.cloud.360.cn/', '1492435838', '1');
INSERT INTO `puamap_friend_link` VALUES ('11', '爱奇艺', 'http://www.iqiyi.com/', '1492435838', '1');

-- ----------------------------
-- Table structure for `puamap_setting`
-- ----------------------------
DROP TABLE IF EXISTS `puamap_setting`;
CREATE TABLE `puamap_setting` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `var` varchar(32) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of puamap_setting
-- ----------------------------
INSERT INTO `puamap_setting` VALUES ('2', 'website', 'http://www.puamap.com');
INSERT INTO `puamap_setting` VALUES ('3', 'webcdn', 'http://www.puamap.com');
INSERT INTO `puamap_setting` VALUES ('4', 'webcopy', 'Copyright(c) 2016 浪迹教育    蜀ICP备13017604号-1');
INSERT INTO `puamap_setting` VALUES ('5', 'webtitle', '浪迹PUA实战泡妞把妹社区 - 浪迹教育');
INSERT INTO `puamap_setting` VALUES ('6', 'webkwords', 'pua,浪迹pua,把妹,浪迹,浪迹教育,浪迹团队');
INSERT INTO `puamap_setting` VALUES ('7', 'webdesc', '浪迹教育是中国最具影响力的实战PUA泡妞把妹教育机构,浪迹PUA教学涵盖把妹、搭讪、聊天、视频等。经过五年的发展,浪迹教育已成为中国规模最大的实战PUA泡妞把妹培训平台');
INSERT INTO `puamap_setting` VALUES ('8', 'onoff', '1');
INSERT INTO `puamap_setting` VALUES ('9', 'webname', '浪迹教育');
INSERT INTO `puamap_setting` VALUES ('10', 'webemail', '380081006@qq.com');
INSERT INTO `puamap_setting` VALUES ('11', 'linkman', '张倩');
INSERT INTO `puamap_setting` VALUES ('12', 'webtel', '13408187117');
INSERT INTO `puamap_setting` VALUES ('13', 'address', '');
INSERT INTO `puamap_setting` VALUES ('14', 'images_allowext', 'jpg|jpeg|gif|png');
INSERT INTO `puamap_setting` VALUES ('15', 'upload_dir', 'Public/uploads');
INSERT INTO `puamap_setting` VALUES ('16', 'thumb_width', '300');
INSERT INTO `puamap_setting` VALUES ('17', 'thumb_height', '200');
INSERT INTO `puamap_setting` VALUES ('18', 'image_minwidth', '100');
INSERT INTO `puamap_setting` VALUES ('19', 'image_minheight', '100');
INSERT INTO `puamap_setting` VALUES ('20', 'water_trans', '50');
INSERT INTO `puamap_setting` VALUES ('21', 'water_path', 'Public/watermark.png');
INSERT INTO `puamap_setting` VALUES ('22', 'upload_water_place', '1');
INSERT INTO `puamap_setting` VALUES ('23', 'is_cut', '1');
INSERT INTO `puamap_setting` VALUES ('24', 'water_iswatermark', '1');
INSERT INTO `puamap_setting` VALUES ('25', 'name', 'dsDS');
INSERT INTO `puamap_setting` VALUES ('26', 'link', 'DSA');
