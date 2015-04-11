/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : navigation

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2015-03-22 22:23:31
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `area`
-- ----------------------------
DROP TABLE IF EXISTS `area`;
CREATE TABLE `area` (
  `areaId` int(11) NOT NULL AUTO_INCREMENT,
  `areaName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `letterIndex` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hot` int(11) DEFAULT NULL,
  PRIMARY KEY (`areaId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of area
-- ----------------------------
INSERT INTO `area` VALUES ('1', '北京市', 'B', '1');
INSERT INTO `area` VALUES ('2', '上海市', 'S', '1');
INSERT INTO `area` VALUES ('3', '广州市', 'G', '1');
INSERT INTO `area` VALUES ('4', '深圳市', 'S', '1');

-- ----------------------------
-- Table structure for `mainclassinfo`
-- ----------------------------
DROP TABLE IF EXISTS `mainclassinfo`;
CREATE TABLE `mainclassinfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mainType` int(11) DEFAULT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `priority` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`) USING BTREE,
  KEY `mainType` (`mainType`),
  KEY `id` (`id`,`name`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of mainclassinfo
-- ----------------------------
INSERT INTO `mainclassinfo` VALUES ('1', '1', '全部分类', '1');
INSERT INTO `mainclassinfo` VALUES ('2', '2', '我的收藏', '2');
INSERT INTO `mainclassinfo` VALUES ('3', '3', '优惠信息', '3');
INSERT INTO `mainclassinfo` VALUES ('4', '1', '外卖餐饮', '4');
INSERT INTO `mainclassinfo` VALUES ('5', '1', '汽车服务', '5');
INSERT INTO `mainclassinfo` VALUES ('6', '1', '生活购物', '6');
INSERT INTO `mainclassinfo` VALUES ('7', '1', '家居家政', '7');
INSERT INTO `mainclassinfo` VALUES ('8', '1', '团购汇总', '8');
INSERT INTO `mainclassinfo` VALUES ('9', '1', '医疗健康', '9');
INSERT INTO `mainclassinfo` VALUES ('10', '1', '生活休闲', '10');

-- ----------------------------
-- Table structure for `recommend`
-- ----------------------------
DROP TABLE IF EXISTS `recommend`;
CREATE TABLE `recommend` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `desc` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `img` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `time` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `endTime` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `count` int(11) NOT NULL,
  `priority` int(11) DEFAULT NULL,
  `fromWebId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fromWebId` (`fromWebId`),
  CONSTRAINT `fromWebId` FOREIGN KEY (`fromWebId`) REFERENCES `webinfo` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of recommend
-- ----------------------------
INSERT INTO `recommend` VALUES ('1', '订餐', '满20减10', 'http://www.ele.me/', 'eleme.jpg', '3/19', '3/22', '1', '1', '1');
INSERT INTO `recommend` VALUES ('2', '订餐', '满20减10', 'http://www.ele.me/', 'eleme.jpg', '3/19', '3/22', '1', '1', '1');
INSERT INTO `recommend` VALUES ('3', '订餐', '满20减10', 'http://www.ele.me/', 'eleme.jpg', '3/19', '3/22', '2', '1', '1');
INSERT INTO `recommend` VALUES ('4', '订餐', '满20减10', 'http://www.ele.me/', 'eleme.jpg', '3/19', '3/22', '3', '1', '1');
INSERT INTO `recommend` VALUES ('5', '订餐', '满20减10', 'http://www.ele.me/', 'eleme.jpg', '3/19', '3/22', '4', '1', '1');

-- ----------------------------
-- Table structure for `recommendarea`
-- ----------------------------
DROP TABLE IF EXISTS `recommendarea`;
CREATE TABLE `recommendarea` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `recId` int(11) DEFAULT NULL,
  `recAreaId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `recommendId` (`recId`),
  KEY `recommendAreaId` (`recAreaId`),
  CONSTRAINT `recommendAreaId` FOREIGN KEY (`recAreaId`) REFERENCES `area` (`areaId`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `recommendId` FOREIGN KEY (`recId`) REFERENCES `recommend` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of recommendarea
-- ----------------------------
INSERT INTO `recommendarea` VALUES ('1', '1', '1');

-- ----------------------------
-- Table structure for `secclassinfo`
-- ----------------------------
DROP TABLE IF EXISTS `secclassinfo`;
CREATE TABLE `secclassinfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `secType` int(11) DEFAULT NULL,
  `secName` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ownType` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `mainType` (`ownType`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of secclassinfo
-- ----------------------------

-- ----------------------------
-- Table structure for `storeaction`
-- ----------------------------
DROP TABLE IF EXISTS `storeaction`;
CREATE TABLE `storeaction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `store` int(11) DEFAULT NULL,
  `webId` int(11) DEFAULT NULL,
  `userId` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of storeaction
-- ----------------------------
INSERT INTO `storeaction` VALUES ('25', '1', '1', '550e53f6c7cd4');
INSERT INTO `storeaction` VALUES ('26', '1', '2', '550e53f6c7cd4');

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `account` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `userId` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cTime` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ip` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `userId` (`userId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('2', null, null, '55055eac4d4dc', '2015-03-15 06:27:56pm', null);
INSERT INTO `user` VALUES ('3', null, null, '550d70f4e138b', '2015-03-21 09:24:04pm', null);
INSERT INTO `user` VALUES ('4', null, null, '550e53f6c7cd4', '2015-03-22 01:32:38pm', null);

-- ----------------------------
-- Table structure for `useraction`
-- ----------------------------
DROP TABLE IF EXISTS `useraction`;
CREATE TABLE `useraction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `action` int(11) NOT NULL,
  `webId` int(11) NOT NULL,
  `userId` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `action_webid_usedid` (`action`,`webId`,`userId`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of useraction
-- ----------------------------
INSERT INTO `useraction` VALUES ('16', '2', '1', '550e53f6c7cd4');

-- ----------------------------
-- Table structure for `webinfo`
-- ----------------------------
DROP TABLE IF EXISTS `webinfo`;
CREATE TABLE `webinfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `desc` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `img` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `likeNum` bigint(20) DEFAULT NULL,
  `areaType` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mainType` int(11) DEFAULT NULL,
  `secType` int(11) DEFAULT NULL,
  `priority` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of webinfo
-- ----------------------------
INSERT INTO `webinfo` VALUES ('1', '饿了么', '订餐就来饿了么', 'http://www.ele.me/', 'eleme.jpg', '12', '', '1', '1', '1');
INSERT INTO `webinfo` VALUES ('2', '爱鲜蜂', '各种新鲜 闪电送达', 'http://www.beequick.cn/', 'axf.jpg', '8', '', '1', '1', '1');

-- ----------------------------
-- Table structure for `webmaparea`
-- ----------------------------
DROP TABLE IF EXISTS `webmaparea`;
CREATE TABLE `webmaparea` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `webId` int(11) DEFAULT NULL,
  `areaCode` int(11) DEFAULT NULL,
  `mainTypeId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `webId` (`webId`),
  KEY `areaCode` (`areaCode`),
  CONSTRAINT `areaCode` FOREIGN KEY (`areaCode`) REFERENCES `area` (`areaId`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `webId` FOREIGN KEY (`webId`) REFERENCES `webinfo` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of webmaparea
-- ----------------------------
INSERT INTO `webmaparea` VALUES ('1', '1', '1', '1');
INSERT INTO `webmaparea` VALUES ('2', '2', '1', '1');
