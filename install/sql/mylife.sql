/*
Navicat MySQL Data Transfer

Source Server         : vagrant
Source Server Version : 50557
Source Host           : 192.168.199.101:3306
Source Database       : mylife

Target Server Type    : MYSQL
Target Server Version : 50557
File Encoding         : 65001

Date: 2018-07-25 14:33:02
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of chat
-- ----------------------------
INSERT INTO `chat` VALUES ('1', '这是聊天室的内容xxxxxxxxxxxxxxxxxxx1213231241241241', '1', '2018-07-24 10:11:11', '2018-07-24 10:11:13', '0', '0', '0');
INSERT INTO `chat` VALUES ('2', '这是聊天室的内容xxxxxxxxxxxxxxxxxxx1213231241241241', '1', '2018-07-24 10:11:11', '2018-07-24 10:11:13', '0', '0', '0');
INSERT INTO `chat` VALUES ('3', '这是聊天室的内容xxxxxxxxxxxxxxxxxxx1213231241241241', '1', '2018-07-24 10:11:11', '2018-07-24 10:11:13', '0', '0', '0');
INSERT INTO `chat` VALUES ('4', '这是聊天室的内容xxxxxxxxxxxxxxxxxxx1213231241241241', '1', '2018-07-24 10:11:11', '2018-07-24 10:11:13', '0', '0', '0');
INSERT INTO `chat` VALUES ('5', '这是聊天室的内容xxxxxxxxxxxxxxxxxxx1213231241241241', '1', '2018-07-24 10:11:11', '2018-07-24 10:11:13', '0', '0', '0');
INSERT INTO `chat` VALUES ('6', '这是聊天室的内容xxxxxxxxxxxxxxxxxxx1213231241241241', '1', '2018-07-24 10:11:11', '2018-07-24 10:11:13', '0', '0', '0');
INSERT INTO `chat` VALUES ('7', '这是聊天室的内容xxxxxxxxxxxxxxxxxxx1213231241241241', '1', '2018-07-24 10:11:11', '2018-07-24 10:11:13', '0', '0', '0');
INSERT INTO `chat` VALUES ('8', '这是聊天室的内容xxxxxxxxxxxxxxxxxxx1213231241241241', '1', '2018-07-24 10:11:11', '2018-07-24 10:11:13', '0', '0', '0');
INSERT INTO `chat` VALUES ('9', '这是聊天室的内容xxxxxxxxxxxxxxxxxxx1213231241241241', '1', '2018-07-24 10:11:11', '2018-07-24 10:11:13', '0', '0', '0');

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
-- Table structure for like
-- ----------------------------
DROP TABLE IF EXISTS `like`;
CREATE TABLE `like` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL COMMENT '点赞用户',
  `post_id` int(11) DEFAULT NULL COMMENT '文章id',
  `chat_id` int(11) DEFAULT NULL COMMENT '聊天消息 id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of like
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
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'ngyhd', 'LIe64fSes1nRpZ3Pky8w6er1Zivshr1s', '$2y$13$hvEidv2XtIxj.GFkOA3b/OkTUDGNVYWe8aKVQLpRyH8q1nvThfVIi', null, 'lkjh', '153622362@qq.com', '10', '1530154892', '1530160722');
INSERT INTO `user` VALUES ('2', 'ngyhd2', 'CVY4L0v9PG8DDzj8QTeCGR_pXBe2xbZy', '$2y$13$hvEidv2XtIxj.GFkOA3b/OkTUDGNVYWe8aKVQLpRyH8q1nvThfVIi', null, null, '1536223622@qq.com', '10', '0', '0');
INSERT INTO `user` VALUES ('3', '', '', '', null, null, '', '10', '1530236963', '1530236963');
INSERT INTO `user` VALUES ('4', 'ngyhd3', 'A1EkLYjVsQXgZtg1nmu8ExZM7ivvH2vC', '$2y$13$hvEidv2XtIxj.GFkOA3b/OkTUDGNVYWe8aKVQLpRyH8q1nvThfVIi', null, null, '153622364@qq.com', '10', '1531972725', '1531972725');
