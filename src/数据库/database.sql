/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50724
Source Host           : localhost:3306
Source Database       : database

Target Server Type    : MYSQL
Target Server Version : 50724
File Encoding         : 65001

Date: 2020-06-05 17:13:32
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for allusers
-- ----------------------------
DROP TABLE IF EXISTS `allusers`;
CREATE TABLE `allusers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `pwd` varchar(255) DEFAULT NULL,
  `cx` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of allusers
-- ----------------------------
INSERT INTO `allusers` VALUES ('1', 'admin', 'admin', '管理员');
INSERT INTO `allusers` VALUES ('2', 'zzs', 'zzs', '管理员');
INSERT INTO `allusers` VALUES ('6', 'asdasd', 'asdasd', '管理员');
INSERT INTO `allusers` VALUES ('4', 'asd', 'asd', '协管员');

-- ----------------------------
-- Table structure for department
-- ----------------------------
DROP TABLE IF EXISTS `department`;
CREATE TABLE `department` (
  `dID` int(11) NOT NULL,
  `floor` varchar(255) DEFAULT NULL,
  `roomnumber` int(11) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`dID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of department
-- ----------------------------
INSERT INTO `department` VALUES ('3', '7', '140', '2017年9月1日');
INSERT INTO `department` VALUES ('4', '7', '140', '2017年9月1日');
INSERT INTO `department` VALUES ('8', '7', '140', '2017年6月1日');
INSERT INTO `department` VALUES ('10', '300', '400', '2017年6月1日');

-- ----------------------------
-- Table structure for room
-- ----------------------------
DROP TABLE IF EXISTS `room`;
CREATE TABLE `room` (
  `roomID` varchar(255) NOT NULL,
  `people` varchar(255) DEFAULT NULL,
  `fare` int(11) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `depid` int(11) DEFAULT NULL,
  PRIMARY KEY (`roomID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of room
-- ----------------------------
INSERT INTO `room` VALUES ('410', '4', '600', '071800', '3');
INSERT INTO `room` VALUES ('408', '4', '400', '071801', '3');
INSERT INTO `room` VALUES ('222', '4', '400', '13120401700', '3');
INSERT INTO `room` VALUES ('404', '4', '1600', '13120401700', '3');

-- ----------------------------
-- Table structure for student
-- ----------------------------
DROP TABLE IF EXISTS `student`;
CREATE TABLE `student` (
  `sno` varchar(255) NOT NULL,
  `sname` varchar(255) DEFAULT NULL,
  `sex` varchar(255) DEFAULT NULL,
  `nation` varchar(255) DEFAULT NULL,
  `master` varchar(255) DEFAULT NULL,
  `grade` varchar(255) DEFAULT NULL,
  `telephone` varchar(255) DEFAULT NULL,
  `dormitory` varchar(255) DEFAULT NULL,
  `room` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`sno`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of student
-- ----------------------------
INSERT INTO `student` VALUES ('2017040271', '赵振山', '男', '汉', '计算机科学与技术', '计科1701', '13120401700', '3', '410');
INSERT INTO `student` VALUES ('2017040272', '王小明', '女', '汉', '计算机科学与技术', '计科1702', '13120401700', '1', '410');
