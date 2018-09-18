/*
Navicat MySQL Data Transfer

Source Server         : vagrant
Source Server Version : 50557
Source Host           : 192.168.199.101:3306
Source Database       : mylife

Target Server Type    : MYSQL
Target Server Version : 50557
File Encoding         : 65001

Date: 2018-09-14 11:05:41
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for chat
-- ----------------------------
DROP TABLE IF EXISTS `chat`;
CREATE TABLE `chat` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `content` varchar(255) DEFAULT NULL COMMENT '内容',
  `user_id` int(11) DEFAULT NULL COMMENT '用户id',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `like` int(11) DEFAULT '0' COMMENT '赞同',
  `pid` int(11) DEFAULT '0' COMMENT '自评论',
  `deteled` tinyint(2) DEFAULT '0' COMMENT '评论是否被删除 0正常 1删除',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of chat
-- ----------------------------
INSERT INTO `chat` VALUES ('1', '头内容', '1', '2018-07-24 10:11:11', '2018-07-24 17:11:13', '0', '40', '0');
INSERT INTO `chat` VALUES ('2', '这是聊天室的内容xxxxxxxxxxxxxxxxxxx1213231241241241', '1', '2018-07-24 10:11:11', '2018-07-24 10:11:13', '0', '49', '0');
INSERT INTO `chat` VALUES ('3', '这是聊天室的内容xxxxxxxxxxxxxxxxxxx1213231241241241', '1', '2018-07-24 10:11:11', '2018-07-24 10:11:13', '0', '0', '0');
INSERT INTO `chat` VALUES ('4', '这是聊天室的内容xxxxxxxxxxxxxxxxxxx1213231241241241', '1', '2018-07-24 10:11:11', '2018-07-24 10:11:13', '0', '0', '0');
INSERT INTO `chat` VALUES ('5', '这是聊天室的内容xxxxxxxxxxxxxxxxxxx1213231241241241', '1', '2018-07-24 10:11:11', '2018-07-24 10:11:13', '0', '1', '0');
INSERT INTO `chat` VALUES ('6', '这是聊天室的内容xxxxxxxxxxxxxxxxxxx1213231241241241', '1', '2018-07-24 10:11:11', '2018-07-24 10:11:13', '0', '1', '0');
INSERT INTO `chat` VALUES ('7', '这是聊天室的内容xxxxxxxxxxxxxxxxxxx1213231241241241', '1', '2018-07-24 10:11:11', '2018-07-24 10:11:13', '0', '0', '0');
INSERT INTO `chat` VALUES ('8', '这是聊天室的内容xxxxxxxxxxxxxxxxxxx1213231241241241', '1', '2018-07-24 10:11:11', '2018-07-24 10:11:13', '0', '0', '0');
INSERT INTO `chat` VALUES ('9', '这是聊天室的内容xxxxxxxxxxxxxxxxxxx1213231241241241', '1', '2018-07-24 10:11:11', '2018-07-24 10:11:13', '0', '0', '0');
INSERT INTO `chat` VALUES ('36', 'xxx', '1', '2018-07-26 10:39:03', '2018-07-26 10:39:03', '0', '0', '0');
INSERT INTO `chat` VALUES ('37', 'xxx', '1', '2018-07-26 10:39:30', '2018-07-26 10:39:30', '0', '40', '0');
INSERT INTO `chat` VALUES ('38', 'xxx', '1', '2018-07-26 10:39:48', '2018-07-26 10:39:48', '0', '0', '0');
INSERT INTO `chat` VALUES ('39', 'ok', '1', '2018-07-26 10:40:05', '2018-07-26 10:40:05', '0', '0', '0');
INSERT INTO `chat` VALUES ('40', 'xxxx', '1', '2018-07-26 17:34:02', '2018-07-26 17:34:02', '0', '0', '0');
INSERT INTO `chat` VALUES ('41', 'xxxx', '1', '2018-07-27 12:10:06', '2018-07-27 12:10:06', '0', '0', '0');
INSERT INTO `chat` VALUES ('42', 'xxxx', '2', '2018-07-27 12:11:20', '2018-07-27 12:11:20', '0', '0', '0');
INSERT INTO `chat` VALUES ('43', 'xxxx', '1', '2018-07-27 12:11:50', '2018-07-27 12:11:50', '0', '0', '0');
INSERT INTO `chat` VALUES ('44', 'xxxx', '1', '2018-07-27 12:12:18', '2018-07-27 12:12:18', '0', '0', '0');
INSERT INTO `chat` VALUES ('45', 'xxx', '1', '2018-07-27 12:13:24', '2018-07-27 12:13:24', '0', '0', '0');
INSERT INTO `chat` VALUES ('46', 'xxx', '1', '2018-07-27 12:13:45', '2018-07-27 12:13:45', '0', '0', '0');
INSERT INTO `chat` VALUES ('47', 'xxxx', '1', '2018-07-27 12:15:58', '2018-07-27 12:15:58', '0', '0', '0');
INSERT INTO `chat` VALUES ('48', 'xxx', '1', '2018-07-27 12:16:11', '2018-07-27 12:16:11', '0', '0', '0');
INSERT INTO `chat` VALUES ('49', 'x', '1', '2018-07-27 12:16:55', '2018-07-27 12:16:55', '0', '0', '0');
INSERT INTO `chat` VALUES ('50', 'xxxx', '1', '2018-07-27 12:35:42', '2018-07-27 12:35:42', '0', '0', '0');
INSERT INTO `chat` VALUES ('51', 'xxx', '1', '2018-07-27 13:43:54', '2018-07-27 13:43:54', '0', '0', '0');
INSERT INTO `chat` VALUES ('52', 'xxxx', '1', '2018-07-27 13:44:24', '2018-07-27 13:44:24', '0', '0', '0');
INSERT INTO `chat` VALUES ('53', 'xxxx', '1', '2018-07-27 16:01:41', '2018-07-27 16:01:41', '0', '0', '0');
INSERT INTO `chat` VALUES ('54', 'xxx', '2', '2018-07-27 17:00:38', '2018-07-27 17:00:38', '0', '0', '0');
INSERT INTO `chat` VALUES ('55', 'xxx', '1', '2018-07-27 17:41:33', '2018-07-27 17:41:33', '0', '0', '0');
INSERT INTO `chat` VALUES ('56', 'lmlml', '1', '2018-08-03 13:15:12', '2018-08-03 13:15:12', '0', '0', '0');
INSERT INTO `chat` VALUES ('57', 'xxx', '1', '2018-08-24 10:20:30', '2018-08-24 10:20:30', '0', '0', '0');
INSERT INTO `chat` VALUES ('58', 'xxx', '1', '2018-08-24 10:31:00', '2018-08-24 10:31:00', '0', '0', '0');

-- ----------------------------
-- Table structure for comment
-- ----------------------------
DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `content` varchar(255) NOT NULL DEFAULT '' COMMENT '评论内容',
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '评论的用户ID',
  `post_id` int(11) NOT NULL DEFAULT '0' COMMENT '文章ID',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `unlike` int(11) NOT NULL DEFAULT '0',
  `like` int(11) NOT NULL DEFAULT '0' COMMENT '点赞数',
  `pid` int(11) NOT NULL DEFAULT '0' COMMENT '子评论',
  `status` tinyint(4) NOT NULL DEFAULT '10' COMMENT '10正常 0删除',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of comment
-- ----------------------------
INSERT INTO `comment` VALUES ('1', '这是一个留言', '1', '1', '2018-07-23 16:49:22', '2018-09-11 17:51:26', '1', '1', '0', '10');
INSERT INTO `comment` VALUES ('5', '这是一个留言', '1', '3', '2018-07-23 16:49:22', '2018-07-23 16:49:25', '1', '2', '0', '10');
INSERT INTO `comment` VALUES ('6', 'xxx', '1', '3', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1', '5', '10');
INSERT INTO `comment` VALUES ('13', '%E5%AD%98%E5%82%A8', '1', '3', '0000-00-00 00:00:00', '2018-09-07 16:33:01', '1', '1', '5', '10');
INSERT INTO `comment` VALUES ('14', '%E5%93%88%E5%93%88', '1', '3', '2018-09-07 16:32:29', '2018-09-07 16:32:35', '1', '1', '5', '10');
INSERT INTO `comment` VALUES ('15', '哈哈', '1', '3', '2018-09-07 17:18:52', '2018-09-07 17:19:10', '1', '1', '0', '10');
INSERT INTO `comment` VALUES ('18', '哈哈', '1', '3', '2018-09-07 17:21:18', '2018-09-08 09:56:12', '1', '1', '0', '10');
INSERT INTO `comment` VALUES ('19', 'xx', '1', '3', '2018-09-07 17:34:35', '2018-09-07 17:38:55', '1', '1', '15', '10');
INSERT INTO `comment` VALUES ('20', '%40ngyhd%20%20%E5%93%88%E5%93%88', '1', '3', '2018-09-08 11:01:30', '2018-09-08 11:18:36', '1', '1', '15', '10');
INSERT INTO `comment` VALUES ('21', '<a href=\'/user/center?id=\'></a>%E5%93%88%E5%93%88', '1', '3', '2018-09-08 11:54:05', '2018-09-08 11:54:05', '0', '0', '5', '10');
INSERT INTO `comment` VALUES ('22', '<a href=\'/user/center?id=\'></a>%E5%93%88%E5%93%88', '1', '3', '2018-09-08 11:55:04', '2018-09-08 11:55:04', '0', '0', '5', '10');
INSERT INTO `comment` VALUES ('23', '<a href=\'/user/center?id=\'></a>%E5%93%88%E5%93%88', '1', '3', '2018-09-08 11:55:13', '2018-09-08 11:55:13', '0', '0', '5', '10');
INSERT INTO `comment` VALUES ('24', '<a href=\'/user/center?id=1\'>ngyhd</a>%E5%A4%AA%E8%B5%9E%E4%BA%86', '1', '3', '2018-09-08 11:55:57', '2018-09-08 11:55:57', '0', '0', '5', '10');
INSERT INTO `comment` VALUES ('25', '<a href=\'/user/center?id=1\'>@ngyhd</a>%E9%9D%9E%E5%B8%B8%E5%A5%BD', '1', '3', '2018-09-08 11:56:20', '2018-09-08 11:56:20', '0', '0', '5', '10');
INSERT INTO `comment` VALUES ('26', '<a href=\'/user/center?id=\'>@</a>&nbsp;&nbsp;&nbsp;%E7%9C%9F%E6%A3%92', '1', '3', '2018-09-08 11:56:58', '2018-09-08 11:56:58', '0', '0', '5', '10');
INSERT INTO `comment` VALUES ('27', '<a href=\'/user/center?id=1\'>@ngyhd</a>%E5%93%88%E5%93%88', '1', '3', '2018-09-08 11:57:33', '2018-09-08 11:57:33', '0', '0', '5', '10');
INSERT INTO `comment` VALUES ('28', '<a href=\'/user/center?id=1\'>@ngyhd</a>&nbsp;&nbsp;&nbsp;%E5%A4%AA%E5%A5%BD%E4%BA%86', '1', '3', '2018-09-08 11:59:40', '2018-09-08 11:59:40', '0', '0', '5', '10');
INSERT INTO `comment` VALUES ('29', '<a href=\'/user/center?id=1\'>@ngyhd</a>&nbsp;&nbsp;%E5%A4%AA%E8%B5%9E%E4%BA%86', '1', '3', '2018-09-08 11:59:58', '2018-09-08 11:59:58', '0', '0', '5', '10');
INSERT INTO `comment` VALUES ('30', '很好', '1', '9', '2018-09-08 14:34:52', '2018-09-08 14:34:55', '1', '1', '0', '10');
INSERT INTO `comment` VALUES ('31', '<a href=\'/user/center?id=\'>@</a>&nbsp;&nbsp;%E4%B8%8D%E9%94%99', '1', '9', '2018-09-08 14:35:05', '2018-09-08 14:35:05', '0', '0', '30', '10');
INSERT INTO `comment` VALUES ('32', '<a href=\'/user/center?id=1\'>@ngyhd</a>&nbsp;&nbsp;%E5%BE%88%E5%A5%BD', '1', '9', '2018-09-08 14:38:08', '2018-09-08 14:38:08', '0', '0', '30', '10');
INSERT INTO `comment` VALUES ('33', '很好', '1', '9', '2018-09-08 14:40:32', '2018-09-08 14:40:32', '0', '0', '0', '10');
INSERT INTO `comment` VALUES ('34', '%E5%93%88%E5%93%88', '1', '9', '2018-09-08 14:40:36', '2018-09-08 14:40:36', '0', '0', '33', '10');
INSERT INTO `comment` VALUES ('35', '%E5%92%8C', '1', '3', '2018-09-12 10:32:55', '2018-09-12 10:32:55', '0', '0', '18', '10');
INSERT INTO `comment` VALUES ('36', '<a href=\'/user/center?id=1\'>@ngyhd</a>&nbsp;&nbsp;%E5%93%88%E5%93%88', '1', '3', '2018-09-12 15:09:45', '2018-09-12 15:09:45', '0', '0', '18', '10');
INSERT INTO `comment` VALUES ('37', '<a href=\'/user/center?id=1\'>@ngyhd</a>&nbsp;&nbsp;%E5%93%88%E5%93%88', '1', '3', '2018-09-12 15:10:07', '2018-09-12 15:10:07', '0', '0', '18', '10');
INSERT INTO `comment` VALUES ('38', '<a href=\'/user/center?id=1\'>@ngyhd</a>&nbsp;&nbsp;%E7%AE%80%E5%8D%95xxx', '1', '3', '2018-09-12 15:10:43', '2018-09-12 15:10:43', '0', '0', '18', '10');
INSERT INTO `comment` VALUES ('39', '<a href=\'/user/center?id=1\'>@ngyhd</a>&nbsp;&nbsp;%E7%AE%80%E5%8D%95xxx', '1', '3', '2018-09-12 15:11:00', '2018-09-12 15:11:00', '0', '0', '18', '10');
INSERT INTO `comment` VALUES ('40', '<a href=\'/user/center?id=1\'>@ngyhd</a>&nbsp;&nbsp;%E7%AE%80%E5%8D%95xxx', '1', '3', '2018-09-12 15:11:28', '2018-09-12 15:11:28', '0', '0', '18', '10');
INSERT INTO `comment` VALUES ('41', '<a href=\'/user/center?id=1\'>@ngyhd</a>&nbsp;&nbsp;简单xxx', '1', '3', '2018-09-12 15:12:02', '2018-09-12 15:12:02', '0', '0', '18', '10');

-- ----------------------------
-- Table structure for dynamic
-- ----------------------------
DROP TABLE IF EXISTS `dynamic`;
CREATE TABLE `dynamic` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL COMMENT '1.评论 2.赞 3.签到 4.收藏',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `other_category` int(11) DEFAULT '0' COMMENT '1.文章id 2.话题id',
  `other_id` int(255) DEFAULT '0' COMMENT 'id',
  `remark` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of dynamic
-- ----------------------------
INSERT INTO `dynamic` VALUES ('1', '1', '1', '2018-09-04 10:46:59', '2', '1', null);

-- ----------------------------
-- Table structure for fans
-- ----------------------------
DROP TABLE IF EXISTS `fans`;
CREATE TABLE `fans` (
  `id` int(255) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL COMMENT '被关注者',
  `fans_user_id` int(11) NOT NULL COMMENT '关注者',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fans
-- ----------------------------
INSERT INTO `fans` VALUES ('6', '1', '1', null, null);
INSERT INTO `fans` VALUES ('7', '1', '2', null, null);
INSERT INTO `fans` VALUES ('8', '2', '1', null, null);

-- ----------------------------
-- Table structure for favorite
-- ----------------------------
DROP TABLE IF EXISTS `favorite`;
CREATE TABLE `favorite` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL COMMENT '用户id',
  `post_id` int(11) DEFAULT NULL COMMENT '文章id',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of favorite
-- ----------------------------
INSERT INTO `favorite` VALUES ('4', '1', '3', '2018-09-07 11:41:56', '2018-09-07 11:41:56');
INSERT INTO `favorite` VALUES ('5', '1', '5', '2018-09-07 15:06:28', '2018-09-07 15:06:28');
INSERT INTO `favorite` VALUES ('6', '1', '9', '2018-09-08 14:25:20', '2018-09-08 14:25:20');

-- ----------------------------
-- Table structure for letter
-- ----------------------------
DROP TABLE IF EXISTS `letter`;
CREATE TABLE `letter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sender` int(11) NOT NULL,
  `receiver` int(11) NOT NULL,
  `content` varchar(255) NOT NULL DEFAULT '',
  `read_status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0 未读 1已读',
  `status` tinyint(4) NOT NULL DEFAULT '10' COMMENT '0 删除 10正常',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='私信表';

-- ----------------------------
-- Records of letter
-- ----------------------------
INSERT INTO `letter` VALUES ('1', '1', '2', '1', '1', '10', '2018-09-13 11:12:34', '0000-00-00 00:00:00');
INSERT INTO `letter` VALUES ('2', '2', '1', '2', '1', '10', '2018-09-13 11:14:48', '0000-00-00 00:00:00');
INSERT INTO `letter` VALUES ('3', '2', '1', '我有一些事跟你说', '1', '10', '2018-09-13 11:15:18', '0000-00-00 00:00:00');
INSERT INTO `letter` VALUES ('4', '1', '2', '学习系', '1', '10', '2018-09-13 16:24:36', '0000-00-00 00:00:00');
INSERT INTO `letter` VALUES ('5', '1', '2', '哈哈哈', '1', '10', '2018-09-13 16:24:56', '0000-00-00 00:00:00');
INSERT INTO `letter` VALUES ('6', '2', '1', '你是个逗比吧', '1', '10', '2018-09-13 16:25:53', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for like
-- ----------------------------
DROP TABLE IF EXISTS `like`;
CREATE TABLE `like` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL COMMENT '点赞用户',
  `channel` tinyint(11) DEFAULT NULL COMMENT '点赞场景 1文章赞  2聊天室 3.评论赞 4.评论踩',
  `content_id` int(11) DEFAULT NULL COMMENT '内容id',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of like
-- ----------------------------
INSERT INTO `like` VALUES ('1', '1', '2', '1', null, null);
INSERT INTO `like` VALUES ('2', '2', '2', '1', null, null);
INSERT INTO `like` VALUES ('3', '1', '2', '40', '2018-07-26 19:05:15', '2018-07-26 19:05:15');
INSERT INTO `like` VALUES ('5', '1', '2', '39', '2018-07-26 19:14:24', '2018-07-26 19:14:24');
INSERT INTO `like` VALUES ('6', '1', '2', '38', '2018-07-26 19:14:25', '2018-07-26 19:14:25');
INSERT INTO `like` VALUES ('7', '1', '2', '37', '2018-07-26 19:14:31', '2018-07-26 19:14:31');
INSERT INTO `like` VALUES ('8', '1', '2', '36', '2018-07-26 19:14:46', '2018-07-26 19:14:46');
INSERT INTO `like` VALUES ('9', '1', '2', '4', '2018-07-26 19:14:48', '2018-07-26 19:14:48');
INSERT INTO `like` VALUES ('10', '2', '2', '40', '2018-07-27 09:49:00', '2018-07-27 09:49:00');
INSERT INTO `like` VALUES ('11', '2', '2', '39', '2018-07-27 09:49:02', '2018-07-27 09:49:02');
INSERT INTO `like` VALUES ('12', '2', '2', '38', '2018-07-27 09:49:05', '2018-07-27 09:49:05');
INSERT INTO `like` VALUES ('13', '2', '2', '37', '2018-07-27 09:49:12', '2018-07-27 09:49:12');
INSERT INTO `like` VALUES ('14', '1', '2', '41', '2018-07-27 12:11:01', '2018-07-27 12:11:01');
INSERT INTO `like` VALUES ('15', '1', '2', '43', '2018-07-27 12:12:15', '2018-07-27 12:12:15');
INSERT INTO `like` VALUES ('16', '1', '2', '42', '2018-07-27 12:13:02', '2018-07-27 12:13:02');
INSERT INTO `like` VALUES ('17', '1', '2', '44', '2018-07-27 12:13:08', '2018-07-27 12:13:08');
INSERT INTO `like` VALUES ('18', '1', '2', '45', '2018-07-27 12:13:33', '2018-07-27 12:13:33');
INSERT INTO `like` VALUES ('19', '1', '2', '46', '2018-07-27 12:14:10', '2018-07-27 12:14:10');
INSERT INTO `like` VALUES ('20', '1', '2', '47', '2018-07-27 12:16:03', '2018-07-27 12:16:03');
INSERT INTO `like` VALUES ('21', '1', '2', '48', '2018-07-27 12:16:16', '2018-07-27 12:16:16');
INSERT INTO `like` VALUES ('22', '1', '2', '49', '2018-07-27 12:16:59', '2018-07-27 12:16:59');
INSERT INTO `like` VALUES ('23', '1', '2', '50', '2018-07-27 12:35:52', '2018-07-27 12:35:52');
INSERT INTO `like` VALUES ('24', '1', '2', '51', '2018-07-27 13:44:12', '2018-07-27 13:44:12');
INSERT INTO `like` VALUES ('25', '1', '2', '52', '2018-07-27 13:44:34', '2018-07-27 13:44:34');
INSERT INTO `like` VALUES ('26', '1', '2', '55', '2018-08-03 12:05:24', '2018-08-03 12:05:24');
INSERT INTO `like` VALUES ('27', '1', '2', '56', '2018-08-03 13:15:22', '2018-08-03 13:15:22');
INSERT INTO `like` VALUES ('28', '1', '2', '57', '2018-08-24 10:20:34', '2018-08-24 10:20:34');
INSERT INTO `like` VALUES ('29', '1', '2', '54', '2018-08-24 10:21:33', '2018-08-24 10:21:33');
INSERT INTO `like` VALUES ('30', '1', '2', '53', '2018-08-24 10:21:35', '2018-08-24 10:21:35');
INSERT INTO `like` VALUES ('32', '3', '1', '3', '2018-08-24 10:31:04', '2018-08-24 10:31:04');
INSERT INTO `like` VALUES ('33', '1', '1', '3', null, null);
INSERT INTO `like` VALUES ('40', '1', '3', '5', '2018-09-07 14:45:10', '2018-09-07 14:45:10');
INSERT INTO `like` VALUES ('42', '1', '4', '5', '2018-09-07 14:45:37', '2018-09-07 14:45:37');
INSERT INTO `like` VALUES ('43', '1', '3', '6', '2018-09-07 16:16:14', '2018-09-07 16:16:14');
INSERT INTO `like` VALUES ('44', '1', '4', '6', '2018-09-07 16:27:06', '2018-09-07 16:27:06');
INSERT INTO `like` VALUES ('45', '1', '3', '14', '2018-09-07 16:32:34', '2018-09-07 16:32:34');
INSERT INTO `like` VALUES ('46', '1', '4', '14', '2018-09-07 16:32:35', '2018-09-07 16:32:35');
INSERT INTO `like` VALUES ('47', '1', '3', '13', '2018-09-07 16:33:00', '2018-09-07 16:33:00');
INSERT INTO `like` VALUES ('48', '1', '4', '13', '2018-09-07 16:33:01', '2018-09-07 16:33:01');
INSERT INTO `like` VALUES ('49', '1', '3', '15', '2018-09-07 17:19:09', '2018-09-07 17:19:09');
INSERT INTO `like` VALUES ('50', '1', '4', '15', '2018-09-07 17:19:10', '2018-09-07 17:19:10');
INSERT INTO `like` VALUES ('51', '1', '1', '14', '2018-09-07 17:22:21', '2018-09-07 17:22:21');
INSERT INTO `like` VALUES ('52', '1', '3', '19', '2018-09-07 17:38:48', '2018-09-07 17:38:48');
INSERT INTO `like` VALUES ('53', '1', '4', '19', '2018-09-07 17:38:55', '2018-09-07 17:38:55');
INSERT INTO `like` VALUES ('54', '1', '3', '18', '2018-09-07 18:50:52', '2018-09-07 18:50:52');
INSERT INTO `like` VALUES ('55', '1', '4', '18', '2018-09-08 09:56:12', '2018-09-08 09:56:12');
INSERT INTO `like` VALUES ('56', '1', '3', '20', '2018-09-08 11:18:35', '2018-09-08 11:18:35');
INSERT INTO `like` VALUES ('57', '1', '4', '20', '2018-09-08 11:18:36', '2018-09-08 11:18:36');
INSERT INTO `like` VALUES ('58', '1', '1', '9', '2018-09-08 14:25:21', '2018-09-08 14:25:21');
INSERT INTO `like` VALUES ('59', '1', '3', '30', '2018-09-08 14:34:54', '2018-09-08 14:34:54');
INSERT INTO `like` VALUES ('60', '1', '4', '30', '2018-09-08 14:34:55', '2018-09-08 14:34:55');
INSERT INTO `like` VALUES ('61', '1', '4', '1', '2018-09-11 17:51:25', '2018-09-11 17:51:25');
INSERT INTO `like` VALUES ('62', '1', '3', '1', '2018-09-11 17:51:26', '2018-09-11 17:51:26');

-- ----------------------------
-- Table structure for login_info
-- ----------------------------
DROP TABLE IF EXISTS `login_info`;
CREATE TABLE `login_info` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of login_info
-- ----------------------------

-- ----------------------------
-- Table structure for migration
-- ----------------------------
DROP TABLE IF EXISTS `migration`;
CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of migration
-- ----------------------------
INSERT INTO `migration` VALUES ('m000000_000000_base', '1530154401');
INSERT INTO `migration` VALUES ('m130524_201442_init', '1530154507');

-- ----------------------------
-- Table structure for notice
-- ----------------------------
DROP TABLE IF EXISTS `notice`;
CREATE TABLE `notice` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sender` int(11) NOT NULL,
  `receiver` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `content_id` varchar(255) NOT NULL COMMENT '根据category字段分类不同表的id',
  `read_status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '//receiver 0 未读 1已读',
  `status` tinyint(4) NOT NULL DEFAULT '10' COMMENT '0 已删除 10正常',
  `category` tinyint(4) DEFAULT '0' COMMENT '通知类型 0 评论 1@ 2关注',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of notice
-- ----------------------------
INSERT INTO `notice` VALUES ('1', '1', '1', '2018-09-12 17:42:44', '2018-09-12 17:16:10', '1', '0', '10', '2');
INSERT INTO `notice` VALUES ('2', '2', '1', '2018-09-12 17:43:46', '2018-09-12 17:43:49', '1', '1', '10', '1');
INSERT INTO `notice` VALUES ('3', '2', '1', '2018-09-12 17:45:42', '0000-00-00 00:00:00', '1', '0', '10', '0');

-- ----------------------------
-- Table structure for post
-- ----------------------------
DROP TABLE IF EXISTS `post`;
CREATE TABLE `post` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '文章ID',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '10正常 0删除',
  `title` varchar(255) NOT NULL COMMENT '标题',
  `descript` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL DEFAULT '0' COMMENT '作者',
  `visitor` int(11) DEFAULT '0' COMMENT '访客数',
  `post_category` tinyint(4) DEFAULT NULL COMMENT '文章类型 0默认分类 1源码 2扩展 3教程 4问答 5话题',
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime DEFAULT NULL COMMENT '最后更新时间',
  `post_excellent` tinyint(255) DEFAULT NULL COMMENT '精品文章',
  `post_status` tinyint(4) DEFAULT NULL COMMENT '1 未解决 2已解决',
  `post_top` tinyint(2) NOT NULL DEFAULT '0' COMMENT '1文章置顶',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of post
-- ----------------------------
INSERT INTO `post` VALUES ('1', '10', '这是一个源码标题xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx', '这是一个描述', '这是一个内容', '1', '19', '1', '2018-07-01 10:43:53', '2018-07-23 10:43:56', '1', '1', '0', '0.00');
INSERT INTO `post` VALUES ('2', '10', '这是一个扩展标题xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx', '这是一个描述', '这是一个内容', '1', '10', '2', '2018-07-01 10:43:52', '2018-07-01 10:43:56', '1', '1', '0', '0.00');
INSERT INTO `post` VALUES ('3', '10', '这是一个教程标题xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx', '这是一个描述', '这是一个内容', '1', '56', '3', '2018-07-23 10:43:53', '2018-07-23 10:43:56', '1', '1', '0', '0.00');
INSERT INTO `post` VALUES ('4', '10', '这是一个问答标题', '这是一个描述', '这是一个内容', '1', '10', '4', '2018-07-23 10:43:52', '2018-07-23 10:43:56', '1', '1', '0', '0.00');
INSERT INTO `post` VALUES ('5', '10', '这是一个话题标题xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx', '这是一个描述', '这是一个内容', '1', '10', '5', '2018-07-23 10:43:52', '2018-07-23 10:43:56', '1', '1', '0', '0.00');
INSERT INTO `post` VALUES ('6', '10', '这是一个问答标题', '这是一个描述', '这是一个内容', '1', '10', '4', '2018-07-23 10:43:52', '2018-07-23 10:43:56', '1', '2', '0', '0.00');
INSERT INTO `post` VALUES ('7', '10', '这是一个问答标题', '这是一个描述', '这是一个内容', '1', '10', '4', '2018-07-23 10:43:52', '2018-07-23 10:43:56', '1', '2', '0', '0.00');
INSERT INTO `post` VALUES ('8', '10', '这是一个问答标题', '这是一个描述', '这是一个内容', '1', '10', '4', '2018-07-23 10:43:52', '2018-07-23 10:43:56', '1', '2', '0', '0.00');
INSERT INTO `post` VALUES ('9', '10', '这是一个问答标题', '这是一个描述', '这是一个内容', '1', '23', '4', '2018-07-23 10:43:52', '2018-07-23 10:43:56', '1', '2', '0', '0.00');
INSERT INTO `post` VALUES ('10', '10', '这是一个问答标题', '这是一个描述', '这是一个内容', '1', '11', '4', '2018-07-23 10:43:52', '2018-07-23 10:43:56', '1', '2', '0', '0.00');
INSERT INTO `post` VALUES ('11', '10', '这是一个问答标题', '这是一个描述', '这是一个内容', '1', '10', '4', '2018-07-23 10:43:52', '2018-07-23 10:43:56', '1', '2', '0', '0.00');
INSERT INTO `post` VALUES ('12', '10', '这是一个问答标题', '这是一个描述', '这是一个内容', '1', '10', '4', '2018-07-23 10:43:52', '2018-07-23 10:43:56', '1', '2', '0', '0.00');
INSERT INTO `post` VALUES ('13', '10', '这是一个问答标题', '这是一个描述', '这是一个内容', '1', '10', '4', '2018-07-23 10:43:52', '2018-07-23 10:43:56', '1', '2', '0', '0.00');
INSERT INTO `post` VALUES ('14', '10', '这是一个问答标题', '这是一个描述', '这是一个内容', '1', '12', '4', '2018-07-23 10:43:52', '2018-09-04 10:43:56', '1', '2', '0', '0.00');

-- ----------------------------
-- Table structure for score
-- ----------------------------
DROP TABLE IF EXISTS `score`;
CREATE TABLE `score` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '积分表',
  `score` int(11) NOT NULL DEFAULT '0',
  `remark` varchar(255) NOT NULL DEFAULT '',
  `user_id` int(11) NOT NULL DEFAULT '0',
  `category` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1.财富 2.威望 3.积分',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of score
-- ----------------------------
INSERT INTO `score` VALUES ('1', '5', '', '1', '1', '2018-09-12 18:11:34', '0000-00-00 00:00:00');
INSERT INTO `score` VALUES ('2', '5', 'xxx', '1', '2', '2018-09-12 18:12:30', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for sign
-- ----------------------------
DROP TABLE IF EXISTS `sign`;
CREATE TABLE `sign` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='签到表';

-- ----------------------------
-- Records of sign
-- ----------------------------

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `access_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT '' COMMENT '头像',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'ngyhd', 'LIe64fSes1nRpZ3Pky8w6er1Zivshr1s', '$2y$13$8xDjiU6Tp87uK66E.ki2.OZNmHOM0x6ALDlcDd7I4o/jZ8pRYTw1i', null, 'lkjh', '153622362@qq.com', '10', '1530154892', '1536818089', '/static/img/1/20180913135449_big.jpg');
INSERT INTO `user` VALUES ('2', 'ngyhd2', 'CVY4L0v9PG8DDzj8QTeCGR_pXBe2xbZy', '$2y$13$hvEidv2XtIxj.GFkOA3b/OkTUDGNVYWe8aKVQLpRyH8q1nvThfVIi', null, null, '1536223622@qq.com', '10', '0', '0', '/static/img/logo3.jpg');
INSERT INTO `user` VALUES ('4', 'ngyhd3', 'A1EkLYjVsQXgZtg1nmu8ExZM7ivvH2vC', '$2y$13$hvEidv2XtIxj.GFkOA3b/OkTUDGNVYWe8aKVQLpRyH8q1nvThfVIi', null, null, '153622364@qq.com', '10', '1531972725', '1531972725', '/static/img/logo4.jpg');

-- ----------------------------
-- Table structure for user_ext
-- ----------------------------
DROP TABLE IF EXISTS `user_ext`;
CREATE TABLE `user_ext` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `city` varchar(10) NOT NULL COMMENT '城市',
  `last_log_in` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `descript` varchar(60) NOT NULL DEFAULT '这个人很懒，什么都没有写',
  `wealth_score` int(11) NOT NULL DEFAULT '0' COMMENT '财富',
  `honor_score` int(11) NOT NULL DEFAULT '0' COMMENT '威望',
  `score` int(11) NOT NULL DEFAULT '0' COMMENT '积分',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_ext
-- ----------------------------
INSERT INTO `user_ext` VALUES ('1', '1', '广东', '2018-09-12 18:17:02', '这个人很懒，什么都没有留下~', '100', '100', '100');
INSERT INTO `user_ext` VALUES ('2', '2', '广东', '2018-09-12 18:35:30', '这个人很懒，什么都没有写', '0', '0', '0');

-- ----------------------------
-- Table structure for visitor
-- ----------------------------
DROP TABLE IF EXISTS `visitor`;
CREATE TABLE `visitor` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category` smallint(6) NOT NULL COMMENT '//1 用户中心',
  `user_id` int(11) NOT NULL COMMENT '被访问者id',
  `visitor_id` int(11) NOT NULL COMMENT '访问者id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of visitor
-- ----------------------------
INSERT INTO `visitor` VALUES ('1', '1', '1', '1');
INSERT INTO `visitor` VALUES ('2', '1', '1', '2');
