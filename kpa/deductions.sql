/*
Navicat MySQL Data Transfer

Source Server         : mysql
Source Server Version : 50626
Source Host           : 127.0.0.1:3306
Source Database       : johari

Target Server Type    : MYSQL
Target Server Version : 50626
File Encoding         : 65001

Date: 2017-01-30 17:08:02
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for deductions
-- ----------------------------
DROP TABLE IF EXISTS `deductions`;
CREATE TABLE `deductions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tid` varchar(20) DEFAULT NULL,
  `tname` varchar(100) DEFAULT NULL,
  `rid` varchar(50) DEFAULT NULL,
  `rno` varchar(50) DEFAULT NULL,
  `hid` varchar(20) DEFAULT NULL,
  `hname` varchar(100) DEFAULT NULL,
  `categ` varchar(100) DEFAULT NULL,
  `amount` varchar(20) DEFAULT NULL,
  `description` text,
  `date` varchar(20) DEFAULT NULL,
  `stamp` varchar(20) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `status` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of deductions
-- ----------------------------
