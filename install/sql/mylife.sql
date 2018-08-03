/*
Navicat MySQL Data Transfer

Source Server         : vagrant
Source Server Version : 50557
Source Host           : 192.168.199.101:3306
Source Database       : mylife

Target Server Type    : MYSQL
Target Server Version : 50557
File Encoding         : 65001

Date: 2018-08-03 18:45:45
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
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8;

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

-- ----------------------------
-- Table structure for comment
-- ----------------------------
DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `content` varchar(255) NOT NULL DEFAULT '' COMMENT '评论内容',
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '评论的用户ID',
  `post_id` int(11) NOT NULL DEFAULT '0' COMMENT '文章ID',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `like` int(11) DEFAULT '0' COMMENT '点赞数',
  `pid` int(11) DEFAULT '0' COMMENT '子评论',
  `status` tinyint(4) DEFAULT '10' COMMENT '10正常 0删除',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of comment
-- ----------------------------
INSERT INTO `comment` VALUES ('1', '这是一个留言', '1', '1', '2018-07-23 16:49:22', '2018-07-23 16:49:25', '0', '0', '10');
INSERT INTO `comment` VALUES ('2', '这是一个留言', '1', '2', '2018-07-23 16:49:22', '2018-07-23 16:49:25', '0', '0', '10');
INSERT INTO `comment` VALUES ('3', '这是一个留言', '1', '3', '2018-07-23 16:49:22', '2018-07-23 16:49:25', '0', '0', '10');
INSERT INTO `comment` VALUES ('5', '这是一个留言', '1', '5', '2018-07-23 16:49:22', '2018-07-23 16:49:25', '0', '0', '10');
INSERT INTO `comment` VALUES ('6', '这是一个留言', '1', '6', '2018-07-23 16:49:22', '2018-07-23 16:49:25', '0', '0', '10');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fans
-- ----------------------------

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of favorite
-- ----------------------------

-- ----------------------------
-- Table structure for like
-- ----------------------------
DROP TABLE IF EXISTS `like`;
CREATE TABLE `like` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL COMMENT '点赞用户',
  `channel` tinyint(11) DEFAULT NULL COMMENT '点赞场景 1文章  2聊天室 ',
  `content_id` int(11) DEFAULT NULL COMMENT '内容id',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

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
  `sender` int(11) DEFAULT NULL,
  `receiver` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `read_status` tinyint(4) DEFAULT NULL COMMENT '//receiver 0 未读 1已读',
  `status` tinyint(4) DEFAULT NULL COMMENT '0 已删除 10正常',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of notice
-- ----------------------------

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
  `update_at` datetime DEFAULT NULL COMMENT '最后更新时间',
  `post_excellent` tinyint(255) DEFAULT NULL COMMENT '精品文章',
  `post_status` tinyint(4) DEFAULT NULL COMMENT '1 未解决 2已解决',
  `post_top` tinyint(2) NOT NULL DEFAULT '0' COMMENT '1文章置顶',
  `post_version` varchar(5) DEFAULT '0.0.0' COMMENT '讨论的版本 此字段有写冗余',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of post
-- ----------------------------
INSERT INTO `post` VALUES ('1', '10', '这是一个源码标题xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx', '这是一个描述', '这是一个内容', '1', '10', '1', '2018-07-01 10:43:52', '2018-07-23 10:43:56', '1', '1', '0', '0.00');
INSERT INTO `post` VALUES ('2', '10', '这是一个扩展标题xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx', '这是一个描述', '这是一个内容', '1', '10', '2', '2018-07-01 10:43:52', '2018-07-01 10:43:56', '1', '1', '0', '0.00');
INSERT INTO `post` VALUES ('3', '10', '这是一个教程标题xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx', '这是一个描述', '这是一个内容', '1', '10', '3', '2018-07-23 10:43:52', '2018-07-23 10:43:56', '1', '1', '0', '0.00');
INSERT INTO `post` VALUES ('4', '10', '这是一个问答标题', '这是一个描述', '这是一个内容', '1', '10', '4', '2018-07-23 10:43:52', '2018-07-23 10:43:56', '1', '1', '0', '0.00');
INSERT INTO `post` VALUES ('5', '10', '这是一个话题标题xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx', '这是一个描述', '这是一个内容', '1', '10', '5', '2018-07-23 10:43:52', '2018-07-23 10:43:56', '1', '1', '0', '0.00');
INSERT INTO `post` VALUES ('6', '10', '这是一个问答标题', '这是一个描述', '这是一个内容', '1', '10', '4', '2018-07-23 10:43:52', '2018-07-23 10:43:56', '1', '2', '0', '0.00');

-- ----------------------------
-- Table structure for score
-- ----------------------------
DROP TABLE IF EXISTS `score`;
CREATE TABLE `score` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `score` int(11) NOT NULL DEFAULT '0',
  `remark` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `category` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1.财富 2.威望 3.积分',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of score
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
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
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
INSERT INTO `user` VALUES ('1', 'ngyhd', 'LIe64fSes1nRpZ3Pky8w6er1Zivshr1s', '$2y$13$hvEidv2XtIxj.GFkOA3b/OkTUDGNVYWe8aKVQLpRyH8q1nvThfVIi', null, 'lkjh', '153622362@qq.com', '10', '1530154892', '1530160722', '/static/img/logo2.jpg');
INSERT INTO `user` VALUES ('2', 'ngyhd2', 'CVY4L0v9PG8DDzj8QTeCGR_pXBe2xbZy', '$2y$13$hvEidv2XtIxj.GFkOA3b/OkTUDGNVYWe8aKVQLpRyH8q1nvThfVIi', null, null, '1536223622@qq.com', '10', '0', '0', '/static/img/logo3.jpg');
INSERT INTO `user` VALUES ('3', '', '', '', null, null, '', '10', '1530236963', '1530236963', '/static/img/logo.png');
INSERT INTO `user` VALUES ('4', 'ngyhd3', 'A1EkLYjVsQXgZtg1nmu8ExZM7ivvH2vC', '$2y$13$hvEidv2XtIxj.GFkOA3b/OkTUDGNVYWe8aKVQLpRyH8q1nvThfVIi', null, null, '153622364@qq.com', '10', '1531972725', '1531972725', '/static/img/logo4.jpg');
