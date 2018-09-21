/*
Navicat MySQL Data Transfer

Source Server         : vagrant
Source Server Version : 50557
Source Host           : 192.168.199.101:3306
Source Database       : mylife

Target Server Type    : MYSQL
Target Server Version : 50557
File Encoding         : 65001

Date: 2018-09-21 18:35:16
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for category
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `is_nav` tinyint(4) DEFAULT '10' COMMENT '是否未导航栏  0不是 10是',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='分类表 1源码 2扩展 3教程 4问答 5话题'',';

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES ('1', '源码', null, null, '10');
INSERT INTO `category` VALUES ('2', '教程', null, null, '10');
INSERT INTO `category` VALUES ('3', '问答', null, null, '10');
INSERT INTO `category` VALUES ('4', '文档', null, null, '10');
INSERT INTO `category` VALUES ('5', '生活', null, '2018-09-21 15:06:13', '10');

-- ----------------------------
-- Table structure for category_union
-- ----------------------------
DROP TABLE IF EXISTS `category_union`;
CREATE TABLE `category_union` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `content_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COMMENT='分类关联表';

-- ----------------------------
-- Records of category_union
-- ----------------------------
INSERT INTO `category_union` VALUES ('1', '31', '1', '2018-09-21 15:30:17', '0000-00-00 00:00:00');

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
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8 COMMENT='聊天室表';

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
INSERT INTO `chat` VALUES ('59', 'xxxxxxxxx', '1', '2018-09-17 11:43:02', '2018-09-17 11:43:02', '0', '0', '0');
INSERT INTO `chat` VALUES ('60', 'alert(1)', '1', '2018-09-17 11:56:32', '2018-09-17 11:56:32', '0', '0', '0');
INSERT INTO `chat` VALUES ('61', 'xxx', '1', null, null, '0', '1', '0');
INSERT INTO `chat` VALUES ('62', 'xxx', '1', null, null, '0', '61', '0');
INSERT INTO `chat` VALUES ('63', 'xxxx', '1', null, null, '0', '5', '0');
INSERT INTO `chat` VALUES ('64', '@ngyhd@@xxx', '1', '2018-09-20 11:03:40', '2018-09-20 11:03:40', '0', '5', '0');
INSERT INTO `chat` VALUES ('65', '@ngyhd@@ngyhd@xxx', '1', '2018-09-20 11:08:21', '2018-09-20 11:08:21', '0', '5', '0');
INSERT INTO `chat` VALUES ('66', '@ngyhd@1@ngyhd@xxxxxxx', '1', '2018-09-20 11:08:47', '2018-09-20 11:08:47', '0', '5', '0');
INSERT INTO `chat` VALUES ('67', 'xxx', '1', '2018-09-20 11:21:31', '2018-09-20 11:21:31', '0', '5', '0');
INSERT INTO `chat` VALUES ('68', '@ngyhd@1@ngyhd@xxxx', '1', '2018-09-20 11:21:37', '2018-09-20 11:21:37', '0', '5', '0');
INSERT INTO `chat` VALUES ('69', 'xxx', '1', '2018-09-20 11:24:36', '2018-09-20 11:24:36', '0', '60', '0');
INSERT INTO `chat` VALUES ('70', '222', '1', '2018-09-20 11:24:40', '2018-09-20 11:24:40', '0', '60', '0');
INSERT INTO `chat` VALUES ('71', 'xxx', '1', '2018-09-20 11:36:22', '2018-09-20 11:36:22', '0', '59', '0');
INSERT INTO `chat` VALUES ('72', 'xxx', '1', '2018-09-20 11:36:49', '2018-09-20 11:36:49', '0', '71', '0');
INSERT INTO `chat` VALUES ('73', '<p></p><p><img src=\"http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/50/pcmoren_huaixiao_org.png\" alt=\"[坏笑]\" data-w-e=\"1\"><br></p>', '1', '2018-09-20 11:42:27', '2018-09-20 11:42:27', '0', '60', '0');
INSERT INTO `chat` VALUES ('74', 'xx', '1', '2018-09-20 15:48:59', '2018-09-20 15:48:59', '0', '69', '0');
INSERT INTO `chat` VALUES ('75', '<p></p><p><img src=\"http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/3c/pcmoren_wu_org.png\" alt=\"[污]\" data-w-e=\"1\"><br></p>', '1', '2018-09-21 12:04:49', '2018-09-21 12:04:49', '0', '60', '0');

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
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=utf8 COMMENT='评论表';

-- ----------------------------
-- Records of comment
-- ----------------------------
INSERT INTO `comment` VALUES ('63', '学习系', '1', '23', '2018-09-18 16:12:16', '2018-09-18 16:12:16', '0', '0', '0', '10');
INSERT INTO `comment` VALUES ('64', 'xxx', '1', '23', '2018-09-18 16:14:41', '2018-09-18 16:14:41', '0', '0', '63', '10');
INSERT INTO `comment` VALUES ('76', 'xxx', '2', '25', '2018-09-18 17:55:54', '2018-09-18 17:55:58', '1', '1', '0', '10');
INSERT INTO `comment` VALUES ('77', 'xxx', '1', '1', '2018-09-20 10:24:35', '2018-09-20 10:24:35', '0', '0', '6', '10');
INSERT INTO `comment` VALUES ('78', '@ngyhd@1@ngyhd@hhh', '2', '23', '2018-09-20 17:52:47', '2018-09-20 17:52:47', '0', '0', '63', '10');
INSERT INTO `comment` VALUES ('79', '@ngyhd@2@ngyhd@xxx', '1', '23', '2018-09-20 17:53:45', '2018-09-20 17:53:45', '0', '0', '63', '10');
INSERT INTO `comment` VALUES ('80', '<p></p><p><img src=\"http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/50/pcmoren_huaixiao_org.png\" alt=\"[坏笑]\" data-w-e=\"1\"><br></p>', '1', '29', '2018-09-21 11:38:37', '2018-09-21 11:38:37', '0', '0', '0', '10');
INSERT INTO `comment` VALUES ('81', 'xxx', '1', '29', '2018-09-21 11:39:04', '2018-09-21 11:58:48', '1', '1', '80', '10');
INSERT INTO `comment` VALUES ('82', 'xxx', '1', '23', '2018-09-21 14:17:38', '2018-09-21 14:17:38', '0', '0', '63', '10');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='动态表';

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='关注表';

-- ----------------------------
-- Records of fans
-- ----------------------------
INSERT INTO `fans` VALUES ('6', '1', '1', null, null);
INSERT INTO `fans` VALUES ('7', '1', '2', null, null);
INSERT INTO `fans` VALUES ('8', '2', '1', null, null);
INSERT INTO `fans` VALUES ('9', '2', '2', null, null);

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
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COMMENT='收藏表';

-- ----------------------------
-- Records of favorite
-- ----------------------------
INSERT INTO `favorite` VALUES ('4', '1', '3', '2018-09-07 11:41:56', '2018-09-07 11:41:56');
INSERT INTO `favorite` VALUES ('5', '1', '5', '2018-09-07 15:06:28', '2018-09-07 15:06:28');
INSERT INTO `favorite` VALUES ('6', '1', '9', '2018-09-08 14:25:20', '2018-09-08 14:25:20');
INSERT INTO `favorite` VALUES ('7', '1', '17', '2018-09-17 16:30:00', '2018-09-17 16:30:00');
INSERT INTO `favorite` VALUES ('8', '1', '23', '2018-09-18 10:59:48', '2018-09-18 10:59:48');
INSERT INTO `favorite` VALUES ('9', '1', '22', '2018-09-18 11:00:41', '2018-09-18 11:00:41');
INSERT INTO `favorite` VALUES ('10', '1', '21', '2018-09-18 11:00:54', '2018-09-18 11:00:54');
INSERT INTO `favorite` VALUES ('11', '1', '20', '2018-09-18 11:02:03', '2018-09-18 11:02:03');
INSERT INTO `favorite` VALUES ('12', '1', '19', '2018-09-18 11:04:49', '2018-09-18 11:04:49');
INSERT INTO `favorite` VALUES ('13', '1', '18', '2018-09-18 11:06:34', '2018-09-18 11:06:34');
INSERT INTO `favorite` VALUES ('14', '1', '6', '2018-09-18 11:07:33', '2018-09-18 11:07:33');
INSERT INTO `favorite` VALUES ('15', '1', '7', '2018-09-18 11:07:50', '2018-09-18 11:07:50');
INSERT INTO `favorite` VALUES ('16', '1', '8', '2018-09-18 11:08:44', '2018-09-18 11:08:44');
INSERT INTO `favorite` VALUES ('17', '1', '16', '2018-09-18 11:09:35', '2018-09-18 11:09:35');
INSERT INTO `favorite` VALUES ('18', '1', '15', '2018-09-18 11:10:04', '2018-09-18 11:10:04');
INSERT INTO `favorite` VALUES ('19', '1', '2', '2018-09-18 11:17:38', '2018-09-18 11:17:38');
INSERT INTO `favorite` VALUES ('20', null, '23', '2018-09-18 11:21:24', '2018-09-18 11:21:24');
INSERT INTO `favorite` VALUES ('21', '2', '25', '2018-09-18 17:55:41', '2018-09-18 17:55:41');

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='私信表';

-- ----------------------------
-- Records of letter
-- ----------------------------
INSERT INTO `letter` VALUES ('1', '1', '2', '1', '1', '10', '2018-09-13 11:12:34', '0000-00-00 00:00:00');
INSERT INTO `letter` VALUES ('2', '2', '1', '2', '1', '10', '2018-09-13 11:14:48', '0000-00-00 00:00:00');
INSERT INTO `letter` VALUES ('3', '2', '1', '我有一些事跟你说', '1', '10', '2018-09-13 11:15:18', '0000-00-00 00:00:00');
INSERT INTO `letter` VALUES ('4', '1', '2', '学习系', '1', '10', '2018-09-13 16:24:36', '0000-00-00 00:00:00');
INSERT INTO `letter` VALUES ('5', '1', '2', '哈哈哈', '1', '10', '2018-09-13 16:24:56', '0000-00-00 00:00:00');
INSERT INTO `letter` VALUES ('6', '2', '1', '你是个逗比吧', '1', '10', '2018-09-13 16:25:53', '0000-00-00 00:00:00');
INSERT INTO `letter` VALUES ('7', '2', '1', 'xxx', '1', '10', '2018-09-18 18:25:00', '0000-00-00 00:00:00');
INSERT INTO `letter` VALUES ('8', '2', '2', 'xxx', '1', '10', '2018-09-21 10:55:43', '0000-00-00 00:00:00');

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
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8 COMMENT='点赞表';

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
INSERT INTO `like` VALUES ('63', '1', '2', '59', '2018-09-17 11:55:59', '2018-09-17 11:55:59');
INSERT INTO `like` VALUES ('64', '1', '1', '17', '2018-09-17 16:01:00', '2018-09-17 16:01:00');
INSERT INTO `like` VALUES ('65', '1', '3', '43', '2018-09-17 16:30:55', '2018-09-17 16:30:55');
INSERT INTO `like` VALUES ('66', '1', '4', '43', '2018-09-17 16:30:55', '2018-09-17 16:30:55');
INSERT INTO `like` VALUES ('67', '1', '4', '45', '2018-09-17 16:30:56', '2018-09-17 16:30:56');
INSERT INTO `like` VALUES ('68', '1', '3', '45', '2018-09-17 16:30:57', '2018-09-17 16:30:57');
INSERT INTO `like` VALUES ('69', '1', '1', '5', '2018-09-17 16:52:46', '2018-09-17 16:52:46');
INSERT INTO `like` VALUES ('70', '1', '1', '23', '2018-09-18 11:00:02', '2018-09-18 11:00:02');
INSERT INTO `like` VALUES ('71', '1', '1', '20', '2018-09-18 11:02:55', '2018-09-18 11:02:55');
INSERT INTO `like` VALUES ('72', '2', '3', '76', '2018-09-18 17:55:58', '2018-09-18 17:55:58');
INSERT INTO `like` VALUES ('73', '2', '4', '76', '2018-09-18 17:55:58', '2018-09-18 17:55:58');
INSERT INTO `like` VALUES ('74', '2', '1', '25', '2018-09-18 17:55:59', '2018-09-18 17:55:59');
INSERT INTO `like` VALUES ('75', '2', '1', '27', '2018-09-18 18:58:56', '2018-09-18 18:58:56');
INSERT INTO `like` VALUES ('76', '1', '1', '27', '2018-09-20 17:08:07', '2018-09-20 17:08:07');
INSERT INTO `like` VALUES ('77', '1', '3', '81', '2018-09-21 11:58:47', '2018-09-21 11:58:47');
INSERT INTO `like` VALUES ('78', '1', '4', '81', '2018-09-21 11:58:48', '2018-09-21 11:58:48');
INSERT INTO `like` VALUES ('79', '1', '1', '29', '2018-09-21 15:01:58', '2018-09-21 15:01:58');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='登陆信息表';

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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COMMENT='通知表';

-- ----------------------------
-- Records of notice
-- ----------------------------
INSERT INTO `notice` VALUES ('1', '1', '1', '2018-09-12 17:42:44', '2018-09-12 17:16:10', '1', '0', '10', '2');
INSERT INTO `notice` VALUES ('2', '2', '1', '2018-09-12 17:43:46', '2018-09-12 17:43:49', '1', '1', '10', '1');
INSERT INTO `notice` VALUES ('3', '2', '1', '2018-09-12 17:45:42', '0000-00-00 00:00:00', '1', '0', '10', '0');
INSERT INTO `notice` VALUES ('4', '1', '1', '2018-09-18 15:44:09', '2018-09-18 15:44:09', '23', '0', '10', '1');
INSERT INTO `notice` VALUES ('5', '1', '1', '2018-09-18 16:14:41', '2018-09-18 16:14:41', '23', '0', '10', '0');
INSERT INTO `notice` VALUES ('6', '1', '1', '2018-09-18 16:19:04', '2018-09-18 16:19:04', '23', '0', '10', '1');
INSERT INTO `notice` VALUES ('7', '1', '1', '2018-09-18 16:22:57', '2018-09-18 16:22:57', 'content=xxx&pid=63', '0', '10', '1');
INSERT INTO `notice` VALUES ('8', '1', '1', '2018-09-18 16:24:59', '2018-09-18 16:24:59', '63', '0', '10', '1');
INSERT INTO `notice` VALUES ('9', '1', '1', '2018-09-18 16:38:27', '2018-09-18 16:38:27', '72', '0', '10', '1');
INSERT INTO `notice` VALUES ('10', '2', '1', '2018-09-18 17:32:46', '2018-09-18 17:32:46', '64', '0', '10', '1');
INSERT INTO `notice` VALUES ('11', '2', '1', '2018-09-18 17:33:05', '2018-09-18 17:33:05', '68', '0', '10', '1');
INSERT INTO `notice` VALUES ('12', '1', '1', '2018-09-20 10:24:35', '2018-09-20 10:24:35', '1', '0', '10', '0');
INSERT INTO `notice` VALUES ('13', '1', '1', '2018-09-20 17:52:47', '2018-09-20 17:52:47', '64', '0', '10', '1');
INSERT INTO `notice` VALUES ('14', '2', '2', '2018-09-20 17:53:45', '2018-09-20 17:53:45', '78', '0', '10', '1');
INSERT INTO `notice` VALUES ('15', '1', '1', '2018-09-21 11:39:04', '2018-09-21 11:39:04', '29', '0', '10', '0');
INSERT INTO `notice` VALUES ('16', '1', '1', '2018-09-21 14:17:38', '2018-09-21 14:17:38', '23', '0', '10', '0');

-- ----------------------------
-- Table structure for post
-- ----------------------------
DROP TABLE IF EXISTS `post`;
CREATE TABLE `post` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '文章ID',
  `status` tinyint(4) NOT NULL DEFAULT '10' COMMENT '10正常 0删除',
  `title` varchar(255) NOT NULL COMMENT '标题',
  `descript` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `author` int(255) NOT NULL DEFAULT '0' COMMENT '作者',
  `visitor` int(11) DEFAULT '0' COMMENT '访客数',
  `post_category` tinyint(4) DEFAULT '4',
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime DEFAULT NULL COMMENT '最后更新时间',
  `post_excellent` tinyint(255) DEFAULT '1' COMMENT '精品文章',
  `post_status` tinyint(4) DEFAULT '1' COMMENT '1 未解决 2已解决',
  `post_top` tinyint(2) NOT NULL DEFAULT '0' COMMENT '1文章置顶',
  `tag` varchar(255) NOT NULL DEFAULT '' COMMENT '标签',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COMMENT='文章表';

-- ----------------------------
-- Records of post
-- ----------------------------
INSERT INTO `post` VALUES ('1', '10', '这是一个源码标题xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx', '这是一个描述', '这是一个内容', '1', '25', '1', '2018-07-01 10:43:53', '2018-09-18 15:55:14', '1', '1', '0', '');
INSERT INTO `post` VALUES ('2', '10', '这是一个扩展标题xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx', '这是一个描述', '这是一个内容', '1', '14', '2', '2018-07-01 10:43:52', '2018-09-18 11:18:58', '1', '1', '0', '');
INSERT INTO `post` VALUES ('3', '10', '这是一个教程标题xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx', '这是一个描述', '这是一个内容', '1', '88', '3', '2018-07-23 10:43:53', '2018-09-18 13:58:20', '1', '1', '0', '');
INSERT INTO `post` VALUES ('4', '10', '这是一个问答标题', '这是一个描述', '这是一个内容', '1', '15', '4', '2018-07-23 10:43:52', '2018-09-18 17:06:27', '1', '1', '0', '');
INSERT INTO `post` VALUES ('5', '10', '这是一个话题标题xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx', '这是一个描述', '这是一个内容', '1', '18', '5', '2018-07-23 10:43:52', '2018-09-18 11:45:57', '1', '1', '0', '');
INSERT INTO `post` VALUES ('6', '10', '这是一个问答标题', '这是一个描述', '这是一个内容', '1', '12', '4', '2018-07-23 10:43:52', '2018-09-18 12:09:08', '1', '2', '0', '');
INSERT INTO `post` VALUES ('7', '10', '这是一个问答标题', '这是一个描述', '这是一个内容', '1', '11', '4', '2018-07-23 10:43:52', '2018-09-18 11:07:48', '1', '2', '0', '');
INSERT INTO `post` VALUES ('8', '10', '这是一个问答标题', '这是一个描述', '这是一个内容', '1', '12', '4', '2018-07-23 10:43:52', '2018-09-18 11:09:01', '1', '2', '0', '');
INSERT INTO `post` VALUES ('11', '10', '这是一个问答标题', '这是一个描述', '这是一个内容', '1', '11', '4', '2018-07-23 10:43:52', '2018-07-23 10:43:56', '1', '2', '0', '');
INSERT INTO `post` VALUES ('12', '10', '这是一个问答标题', '这是一个描述', '这是一个内容', '1', '11', '4', '2018-07-23 10:43:52', '2018-07-23 10:43:56', '1', '2', '0', '');
INSERT INTO `post` VALUES ('13', '10', '这是一个问答标题', '这是一个描述', '这是一个内容', '1', '11', '4', '2018-07-23 10:43:52', '2018-07-23 10:43:56', '1', '2', '0', '');
INSERT INTO `post` VALUES ('14', '10', '这是一个问答标题', '这是一个描述', '这是一个内容', '1', '14', '4', '2018-07-23 10:43:52', '2018-09-04 10:43:56', '1', '2', '0', '');
INSERT INTO `post` VALUES ('15', '10', 'xxxx', '<p></p><textarea id=\"text1\" name=\"content\" style=\"display: n...', '<p></p><textarea id=\"text1\" name=\"content\" style=\"display: none\"></textarea><p><img src=\"http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/3c/pcmoren_wu_org.png\" alt=\"[污]\"><br></p><p>《虽然和yii框架有点无关，但是我用到了yii框架哈，所以记录一下》</p><p>场景描述：</p><p>近期我被安排帮助楼上的同事开发一个后台系统和一个前台系统，后台系统放到他们已有的系统上就行，算是一个模块; 而前台系统，是一个新的独立的系统. 我平时都是组长让我完成一个功能或者接口什么的，我哪有做过这种表自己设计啊，系统系统自己搭建，然后全程了解所有的需求(必须全部了解流程), 像我这样笨笨的女生，表示这次我真是第一次做，虽然对于大神来说，简直是简单的不能再简单了，可是，我没弄过，我又害怕，我初始的时候理解错了，那么表设计错了，后续做的全都错了，所以我害怕啊，不过还好，这次在我们组几个哥的指导下，顺利完成了，现在在测试期，我想记录一下我本次的感想，是对我以后的成长留下一个印记吧....</p><p>步骤如下：</p><p>1： 了解全部需求，梳理流程，反复斟酌流程中涉及的功能点，我需要做什么准备，如果不懂，就多去问问产品，让他给你讲明白，别怕别人笑话你，会不会是你的，不要在乎别人的看法，只要自己懂了比什么都重要</p><p>2： 根据需求流程，可以自己按照理解，画一个思维导图，让相关人员帮忙看一下， 有没有问题，有理解不对的，他们正好可以给你指出来，这个过程比到最后你都做好了，人家说你的理解是错的强太多了</p><p>3： 设计表结构，记录创建表语句，为后续测试，正式数据库创建表，做个铺垫 图片如下:&nbsp;<a href=\"https://www.yiichina.com/uploads/images/201809/13174526883.jpeg\" title=\"WechatIMG485.jpeg\" box-sizing:=\"\" border-box;=\"\" color:=\"\" rgb(0,=\"\" 123,=\"\" 255);=\"\" text-decoration:=\"\" none;=\"\" background-color:=\"\" transparent;\"=\"\"><img src=\"https://www.yiichina.com/uploads/images/201809/13174526883.jpeg\" alt=\"WechatIMG485.jpeg\" title=\"WechatIMG485.jpeg\"></a></p><p>4： 对于比较复杂的表，可以用思维导图来帮助你理解，并且为后续其他人查看时，更容易查看（比如我，记性特别差，自己写的功能，过几天问我，我记不清楚我写到哪个文件了，因为这一点，我组长不知道说我多少次了，可是我忘记了咋办啊，真的，所以我靠着笔记或者思维导图来帮我这个忘性大王） 例如：我创建了一个用户表 图片如下：<a href=\"https://www.yiichina.com/uploads/images/201809/13174717628.jpeg\" title=\"1.jpeg\" box-sizing:=\"\" border-box;=\"\" color:=\"\" rgb(0,=\"\" 123,=\"\" 255);=\"\" text-decoration:=\"\" none;=\"\" background-color:=\"\" transparent;\"=\"\"><img src=\"https://www.yiichina.com/uploads/images/201809/13174717628.jpeg\" alt=\"1.jpeg\" title=\"1.jpeg\"></a><a href=\"https://www.yiichina.com/uploads/images/201809/13174731526.jpeg\" title=\"2.jpeg\" box-sizing:=\"\" border-box;=\"\" color:=\"\" rgb(0,=\"\" 123,=\"\" 255);=\"\" text-decoration:=\"\" none;=\"\" background-color:=\"\" transparent;\"=\"\"><img src=\"https://www.yiichina.com/uploads/images/201809/13174731526.jpeg\" alt=\"2.jpeg\" title=\"2.jpeg\"></a></p><p>5：因为是帮助楼上写系统，所以需要他们放到他们的服务器，表需要放到他们的数据库上，关于和他们合作我需要的大概分为三部分： 1）：测试数据库地址 正式数据库地址</p><blockquote><p>注意：包含账号和密码（正式数据库地址他们不给我，刚开始我表示不理解，我那几个哥说，这很正常，这种私密性的地址以及数据库，人家有保密措施的，不能是一个公司就给你啊，像那种大公司，哪怕你一个部门，有的库，人家也不给你.....）</p></blockquote><p>2）： 测试域名地址 和 正式域名地址 3）： 测试服务器地址 和 正式服务器地址</p><blockquote><p>注意：这两个是你回头代码完成后，需要将你的代码提交到对应的服务器上， 我们是通过ssh方式访问他们的服务器的，这里包含密码和端口的，因为有的可能不是用的默认端口号22922，所以此时你提前问一下</p></blockquote><p>6： 中间我涉及到需要他们在他们的订单表中创建几个字段，因为我做的系统需要读取那几个字段，这个过程，你要和跨部门同事，商量好，建什么字段，后续你方便读取，一般微信聊天说不清楚，像我这种莽莽撞撞的疯婆子，直接冲到了楼上，去找那个同事去了，我有什么不明白的，我都问他了，还好他脾气好，我们很顺利的沟通完毕，这个过程，可能一些人会取笑你，笑你啥都不懂，可是我不怕，我感觉我没弄过，当然不会了啊，等我做过了，我肯定会，我才不在乎别人对我的看法那，哼......只要我学会了，过程管他那....</p><p>感想：我感觉我一路走来，还挺幸运，一直都有组长带我，不会了，直接找组长了，不过这个还是需要自己储备知识，因为你不可能一直有领导的，也需要一直不断努力的，所以初学PHP的时候，别害怕，慢慢来，因为我这么笨笨的人，都干上了PHP，你说你们不行吗？......肯定行</p><p>&lt;script&gt;alert(1)&lt;/script&gt;</p>', '1', '9', null, null, '2018-09-18 11:16:17', null, null, '0', '');
INSERT INTO `post` VALUES ('16', '10', 'xxxx', '<p></p><textarea id=\"text1\" name=\"content\" style=\"display: n...', '<p></p><textarea id=\"text1\" name=\"content\" style=\"display: none\"></textarea><p><img src=\"http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/3c/pcmoren_wu_org.png\" alt=\"[污]\"><br></p><p>《虽然和yii框架有点无关，但是我用到了yii框架哈，所以记录一下》</p><p>场景描述：</p><p>近期我被安排帮助楼上的同事开发一个后台系统和一个前台系统，后台系统放到他们已有的系统上就行，算是一个模块; 而前台系统，是一个新的独立的系统. 我平时都是组长让我完成一个功能或者接口什么的，我哪有做过这种表自己设计啊，系统系统自己搭建，然后全程了解所有的需求(必须全部了解流程), 像我这样笨笨的女生，表示这次我真是第一次做，虽然对于大神来说，简直是简单的不能再简单了，可是，我没弄过，我又害怕，我初始的时候理解错了，那么表设计错了，后续做的全都错了，所以我害怕啊，不过还好，这次在我们组几个哥的指导下，顺利完成了，现在在测试期，我想记录一下我本次的感想，是对我以后的成长留下一个印记吧....</p><p>步骤如下：</p><p>1： 了解全部需求，梳理流程，反复斟酌流程中涉及的功能点，我需要做什么准备，如果不懂，就多去问问产品，让他给你讲明白，别怕别人笑话你，会不会是你的，不要在乎别人的看法，只要自己懂了比什么都重要</p><p>2： 根据需求流程，可以自己按照理解，画一个思维导图，让相关人员帮忙看一下， 有没有问题，有理解不对的，他们正好可以给你指出来，这个过程比到最后你都做好了，人家说你的理解是错的强太多了</p><p>3： 设计表结构，记录创建表语句，为后续测试，正式数据库创建表，做个铺垫 图片如下:&nbsp;<a href=\"https://www.yiichina.com/uploads/images/201809/13174526883.jpeg\" title=\"WechatIMG485.jpeg\" box-sizing:=\"\" border-box;=\"\" color:=\"\" rgb(0,=\"\" 123,=\"\" 255);=\"\" text-decoration:=\"\" none;=\"\" background-color:=\"\" transparent;\"=\"\"><img src=\"https://www.yiichina.com/uploads/images/201809/13174526883.jpeg\" alt=\"WechatIMG485.jpeg\" title=\"WechatIMG485.jpeg\"></a></p><p>4： 对于比较复杂的表，可以用思维导图来帮助你理解，并且为后续其他人查看时，更容易查看（比如我，记性特别差，自己写的功能，过几天问我，我记不清楚我写到哪个文件了，因为这一点，我组长不知道说我多少次了，可是我忘记了咋办啊，真的，所以我靠着笔记或者思维导图来帮我这个忘性大王） 例如：我创建了一个用户表 图片如下：<a href=\"https://www.yiichina.com/uploads/images/201809/13174717628.jpeg\" title=\"1.jpeg\" box-sizing:=\"\" border-box;=\"\" color:=\"\" rgb(0,=\"\" 123,=\"\" 255);=\"\" text-decoration:=\"\" none;=\"\" background-color:=\"\" transparent;\"=\"\"><img src=\"https://www.yiichina.com/uploads/images/201809/13174717628.jpeg\" alt=\"1.jpeg\" title=\"1.jpeg\"></a><a href=\"https://www.yiichina.com/uploads/images/201809/13174731526.jpeg\" title=\"2.jpeg\" box-sizing:=\"\" border-box;=\"\" color:=\"\" rgb(0,=\"\" 123,=\"\" 255);=\"\" text-decoration:=\"\" none;=\"\" background-color:=\"\" transparent;\"=\"\"><img src=\"https://www.yiichina.com/uploads/images/201809/13174731526.jpeg\" alt=\"2.jpeg\" title=\"2.jpeg\"></a></p><p>5：因为是帮助楼上写系统，所以需要他们放到他们的服务器，表需要放到他们的数据库上，关于和他们合作我需要的大概分为三部分： 1）：测试数据库地址 正式数据库地址</p><blockquote><p>注意：包含账号和密码（正式数据库地址他们不给我，刚开始我表示不理解，我那几个哥说，这很正常，这种私密性的地址以及数据库，人家有保密措施的，不能是一个公司就给你啊，像那种大公司，哪怕你一个部门，有的库，人家也不给你.....）</p></blockquote><p>2）： 测试域名地址 和 正式域名地址 3）： 测试服务器地址 和 正式服务器地址</p><blockquote><p>注意：这两个是你回头代码完成后，需要将你的代码提交到对应的服务器上， 我们是通过ssh方式访问他们的服务器的，这里包含密码和端口的，因为有的可能不是用的默认端口号22922，所以此时你提前问一下</p></blockquote><p>6： 中间我涉及到需要他们在他们的订单表中创建几个字段，因为我做的系统需要读取那几个字段，这个过程，你要和跨部门同事，商量好，建什么字段，后续你方便读取，一般微信聊天说不清楚，像我这种莽莽撞撞的疯婆子，直接冲到了楼上，去找那个同事去了，我有什么不明白的，我都问他了，还好他脾气好，我们很顺利的沟通完毕，这个过程，可能一些人会取笑你，笑你啥都不懂，可是我不怕，我感觉我没弄过，当然不会了啊，等我做过了，我肯定会，我才不在乎别人对我的看法那，哼......只要我学会了，过程管他那....</p><p>感想：我感觉我一路走来，还挺幸运，一直都有组长带我，不会了，直接找组长了，不过这个还是需要自己储备知识，因为你不可能一直有领导的，也需要一直不断努力的，所以初学PHP的时候，别害怕，慢慢来，因为我这么笨笨的人，都干上了PHP，你说你们不行吗？......肯定行</p><p>&lt;script&gt;alert(1)&lt;/script&gt;</p>', '1', '2', null, null, '2018-09-18 11:09:32', null, null, '0', '');
INSERT INTO `post` VALUES ('17', '10', '谢谢谢谢', '<p></p><textarea id=\"text1\" name=\"content\" style=\"display: n...', '<p></p><textarea id=\"text1\" name=\"content\" style=\"display: none\"></textarea><p><img src=\"http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/3c/pcmoren_wu_org.png\" alt=\"[污]\"><br></p><p>《虽然和yii框架有点无关，但是我用到了yii框架哈，所以记录一下》</p><p>场景描述：</p><p>近期我被安排帮助楼上的同事开发一个后台系统和一个前台系统，后台系统放到他们已有的系统上就行，算是一个模块; 而前台系统，是一个新的独立的系统. 我平时都是组长让我完成一个功能或者接口什么的，我哪有做过这种表自己设计啊，系统系统自己搭建，然后全程了解所有的需求(必须全部了解流程), 像我这样笨笨的女生，表示这次我真是第一次做，虽然对于大神来说，简直是简单的不能再简单了，可是，我没弄过，我又害怕，我初始的时候理解错了，那么表设计错了，后续做的全都错了，所以我害怕啊，不过还好，这次在我们组几个哥的指导下，顺利完成了，现在在测试期，我想记录一下我本次的感想，是对我以后的成长留下一个印记吧....</p><p>步骤如下：</p><p>1： 了解全部需求，梳理流程，反复斟酌流程中涉及的功能点，我需要做什么准备，如果不懂，就多去问问产品，让他给你讲明白，别怕别人笑话你，会不会是你的，不要在乎别人的看法，只要自己懂了比什么都重要</p><p>2： 根据需求流程，可以自己按照理解，画一个思维导图，让相关人员帮忙看一下， 有没有问题，有理解不对的，他们正好可以给你指出来，这个过程比到最后你都做好了，人家说你的理解是错的强太多了</p><p>3： 设计表结构，记录创建表语句，为后续测试，正式数据库创建表，做个铺垫 图片如下:&nbsp;<a href=\"https://www.yiichina.com/uploads/images/201809/13174526883.jpeg\" title=\"WechatIMG485.jpeg\" box-sizing:=\"\" border-box;=\"\" color:=\"\" rgb(0,=\"\" 123,=\"\" 255);=\"\" text-decoration:=\"\" none;=\"\" background-color:=\"\" transparent;\"=\"\"><img src=\"https://www.yiichina.com/uploads/images/201809/13174526883.jpeg\" alt=\"WechatIMG485.jpeg\" title=\"WechatIMG485.jpeg\"></a></p><p>4： 对于比较复杂的表，可以用思维导图来帮助你理解，并且为后续其他人查看时，更容易查看（比如我，记性特别差，自己写的功能，过几天问我，我记不清楚我写到哪个文件了，因为这一点，我组长不知道说我多少次了，可是我忘记了咋办啊，真的，所以我靠着笔记或者思维导图来帮我这个忘性大王） 例如：我创建了一个用户表 图片如下：<a href=\"https://www.yiichina.com/uploads/images/201809/13174717628.jpeg\" title=\"1.jpeg\" box-sizing:=\"\" border-box;=\"\" color:=\"\" rgb(0,=\"\" 123,=\"\" 255);=\"\" text-decoration:=\"\" none;=\"\" background-color:=\"\" transparent;\"=\"\"><img src=\"https://www.yiichina.com/uploads/images/201809/13174717628.jpeg\" alt=\"1.jpeg\" title=\"1.jpeg\"></a><a href=\"https://www.yiichina.com/uploads/images/201809/13174731526.jpeg\" title=\"2.jpeg\" box-sizing:=\"\" border-box;=\"\" color:=\"\" rgb(0,=\"\" 123,=\"\" 255);=\"\" text-decoration:=\"\" none;=\"\" background-color:=\"\" transparent;\"=\"\"><img src=\"https://www.yiichina.com/uploads/images/201809/13174731526.jpeg\" alt=\"2.jpeg\" title=\"2.jpeg\"></a></p><p>5：因为是帮助楼上写系统，所以需要他们放到他们的服务器，表需要放到他们的数据库上，关于和他们合作我需要的大概分为三部分： 1）：测试数据库地址 正式数据库地址</p><blockquote><p>注意：包含账号和密码（正式数据库地址他们不给我，刚开始我表示不理解，我那几个哥说，这很正常，这种私密性的地址以及数据库，人家有保密措施的，不能是一个公司就给你啊，像那种大公司，哪怕你一个部门，有的库，人家也不给你.....）</p></blockquote><p>2）： 测试域名地址 和 正式域名地址 3）： 测试服务器地址 和 正式服务器地址</p><blockquote><p>注意：这两个是你回头代码完成后，需要将你的代码提交到对应的服务器上， 我们是通过ssh方式访问他们的服务器的，这里包含密码和端口的，因为有的可能不是用的默认端口号22922，所以此时你提前问一下</p></blockquote><p>6： 中间我涉及到需要他们在他们的订单表中创建几个字段，因为我做的系统需要读取那几个字段，这个过程，你要和跨部门同事，商量好，建什么字段，后续你方便读取，一般微信聊天说不清楚，像我这种莽莽撞撞的疯婆子，直接冲到了楼上，去找那个同事去了，我有什么不明白的，我都问他了，还好他脾气好，我们很顺利的沟通完毕，这个过程，可能一些人会取笑你，笑你啥都不懂，可是我不怕，我感觉我没弄过，当然不会了啊，等我做过了，我肯定会，我才不在乎别人对我的看法那，哼......只要我学会了，过程管他那....</p><p>感想：我感觉我一路走来，还挺幸运，一直都有组长带我，不会了，直接找组长了，不过这个还是需要自己储备知识，因为你不可能一直有领导的，也需要一直不断努力的，所以初学PHP的时候，别害怕，慢慢来，因为我这么笨笨的人，都干上了PHP，你说你们不行吗？......肯定行</p><p>&lt;script&gt;alert(1)&lt;/script&gt;</p>', '1', '55', '4', '2018-09-17 15:59:36', '2018-09-18 11:07:19', '1', '1', '0', '');
INSERT INTO `post` VALUES ('18', '10', 'xxxx2', '这是一个描述', '这是一个内容', '1', '20', '4', '2018-07-23 10:43:52', '2018-09-18 14:54:34', '1', '2', '0', '');
INSERT INTO `post` VALUES ('19', '10', 'xxx24', 'xxxxxxxgahahahdaf哈哈哈哈哈...', 'xxxx', '1', '10', '4', '2018-09-17 16:37:07', '2018-09-18 16:24:47', '1', '1', '0', '');
INSERT INTO `post` VALUES ('20', '10', 'gagagag', 'hh哈哈哈哈哈...', '111', '1', '8', '1', '2018-09-17 16:39:35', '2018-09-18 11:04:38', '1', '1', '0', '');
INSERT INTO `post` VALUES ('21', '10', 'ggg', 'ggggggggggggggggggggg...', '<p></p><textarea id=\"text1\" name=\"content\" style=\"display: none\"></textarea><p><img src=\"http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/3c/pcmoren_wu_org.png\" alt=\"[污]\"><br></p><p>《虽然和yii框架有点无关，但是我用到了yii框架哈，所以记录一下》</p><p>场景描述：</p><p>近期我被安排帮助楼上的同事开发一个后台系统和一个前台系统，后台系统放到他们已有的系统上就行，算是一个模块; 而前台系统，是一个新的独立的系统. 我平时都是组长让我完成一个功能或者接口什么的，我哪有做过这种表自己设计啊，系统系统自己搭建，然后全程了解所有的需求(必须全部了解流程), 像我这样笨笨的女生，表示这次我真是第一次做，虽然对于大神来说，简直是简单的不能再简单了，可是，我没弄过，我又害怕，我初始的时候理解错了，那么表设计错了，后续做的全都错了，所以我害怕啊，不过还好，这次在我们组几个哥的指导下，顺利完成了，现在在测试期，我想记录一下我本次的感想，是对我以后的成长留下一个印记吧....</p><p>步骤如下：</p><p>1： 了解全部需求，梳理流程，反复斟酌流程中涉及的功能点，我需要做什么准备，如果不懂，就多去问问产品，让他给你讲明白，别怕别人笑话你，会不会是你的，不要在乎别人的看法，只要自己懂了比什么都重要</p><p>2： 根据需求流程，可以自己按照理解，画一个思维导图，让相关人员帮忙看一下， 有没有问题，有理解不对的，他们正好可以给你指出来，这个过程比到最后你都做好了，人家说你的理解是错的强太多了</p><p>3： 设计表结构，记录创建表语句，为后续测试，正式数据库创建表，做个铺垫 图片如下:&nbsp;<a href=\"https://www.yiichina.com/uploads/images/201809/13174526883.jpeg\" title=\"WechatIMG485.jpeg\" box-sizing:=\"\" border-box;=\"\" color:=\"\" rgb(0,=\"\" 123,=\"\" 255);=\"\" text-decoration:=\"\" none;=\"\" background-color:=\"\" transparent;\"=\"\"><img src=\"https://www.yiichina.com/uploads/images/201809/13174526883.jpeg\" alt=\"WechatIMG485.jpeg\" title=\"WechatIMG485.jpeg\"></a></p><p>4： 对于比较复杂的表，可以用思维导图来帮助你理解，并且为后续其他人查看时，更容易查看（比如我，记性特别差，自己写的功能，过几天问我，我记不清楚我写到哪个文件了，因为这一点，我组长不知道说我多少次了，可是我忘记了咋办啊，真的，所以我靠着笔记或者思维导图来帮我这个忘性大王） 例如：我创建了一个用户表 图片如下：<a href=\"https://www.yiichina.com/uploads/images/201809/13174717628.jpeg\" title=\"1.jpeg\" box-sizing:=\"\" border-box;=\"\" color:=\"\" rgb(0,=\"\" 123,=\"\" 255);=\"\" text-decoration:=\"\" none;=\"\" background-color:=\"\" transparent;\"=\"\"><img src=\"https://www.yiichina.com/uploads/images/201809/13174717628.jpeg\" alt=\"1.jpeg\" title=\"1.jpeg\"></a><a href=\"https://www.yiichina.com/uploads/images/201809/13174731526.jpeg\" title=\"2.jpeg\" box-sizing:=\"\" border-box;=\"\" color:=\"\" rgb(0,=\"\" 123,=\"\" 255);=\"\" text-decoration:=\"\" none;=\"\" background-color:=\"\" transparent;\"=\"\"><img src=\"https://www.yiichina.com/uploads/images/201809/13174731526.jpeg\" alt=\"2.jpeg\" title=\"2.jpeg\"></a></p><p>5：因为是帮助楼上写系统，所以需要他们放到他们的服务器，表需要放到他们的数据库上，关于和他们合作我需要的大概分为三部分： 1）：测试数据库地址 正式数据库地址</p><blockquote><p>注意：包含账号和密码（正式数据库地址他们不给我，刚开始我表示不理解，我那几个哥说，这很正常，这种私密性的地址以及数据库，人家有保密措施的，不能是一个公司就给你啊，像那种大公司，哪怕你一个部门，有的库，人家也不给你.....）</p></blockquote><p>2）： 测试域名地址 和 正式域名地址 3）： 测试服务器地址 和 正式服务器地址</p><blockquote><p>注意：这两个是你回头代码完成后，需要将你的代码提交到对应的服务器上， 我们是通过ssh方式访问他们的服务器的，这里包含密码和端口的，因为有的可能不是用的默认端口号22922，所以此时你提前问一下</p></blockquote><p>6： 中间我涉及到需要他们在他们的订单表中创建几个字段，因为我做的系统需要读取那几个字段，这个过程，你要和跨部门同事，商量好，建什么字段，后续你方便读取，一般微信聊天说不清楚，像我这种莽莽撞撞的疯婆子，直接冲到了楼上，去找那个同事去了，我有什么不明白的，我都问他了，还好他脾气好，我们很顺利的沟通完毕，这个过程，可能一些人会取笑你，笑你啥都不懂，可是我不怕，我感觉我没弄过，当然不会了啊，等我做过了，我肯定会，我才不在乎别人对我的看法那，哼......只要我学会了，过程管他那....</p><p>感想：我感觉我一路走来，还挺幸运，一直都有组长带我，不会了，直接找组长了，不过这个还是需要自己储备知识，因为你不可能一直有领导的，也需要一直不断努力的，所以初学PHP的时候，别害怕，慢慢来，因为我这么笨笨的人，都干上了PHP，你说你们不行吗？......肯定行</p><p>&lt;script&gt;alert(1)&lt;/script&gt;</p>', '1', '9', '4', '2018-09-17 16:41:38', '2018-09-18 11:01:55', '1', '1', '0', '');
INSERT INTO `post` VALUES ('22', '10', 'xxxx', 'xxxxx...', '<p></p><p>xxxxx</p>', '1', '16', '4', '2018-09-17 16:46:44', '2018-09-20 16:22:38', '1', '1', '0', '');
INSERT INTO `post` VALUES ('23', '10', 'xxx24', 'xxxxxx...', '<p></p><p>xxxxxx</p>', '1', '139', '4', '2018-09-17 17:29:13', '2018-09-20 16:16:30', '1', '1', '0', '');
INSERT INTO `post` VALUES ('24', '10', '哈哈', '...', '<p></p><p><br></p>', '2', '5', '4', '2018-09-18 17:42:43', '2018-09-20 16:15:26', '1', '1', '0', '');
INSERT INTO `post` VALUES ('25', '10', 'xxx', 'xxxx...', '<p></p><p>xxxx<br></p>', '2', '19', '4', '2018-09-18 17:44:46', '2018-09-20 16:35:52', '1', '1', '0', '');
INSERT INTO `post` VALUES ('26', '10', '烦烦烦', '烦烦烦...', '<p>烦烦烦</p>', '1', '7', null, '2018-09-18 18:41:04', '2018-09-20 11:57:14', '1', '1', '0', '');
INSERT INTO `post` VALUES ('27', '10', 'xxxx', 'xxxx...', '<p></p><p>xxxx</p>', '1', '55', '1', '2018-09-18 18:41:49', '2018-09-20 16:05:34', '1', '1', '0', 'composer,yii,yii2');
INSERT INTO `post` VALUES ('28', '10', 'xxx', 'xxx...', '<p></p><p>xxx</p>', '2', '10', '1', '2018-09-21 10:12:21', '2018-09-21 10:12:21', '1', '1', '0', '');
INSERT INTO `post` VALUES ('29', '10', '数组去重的方法', '数组去重，一般都是在面试的时候才会碰到，...', '<p></p><p>数组去重，一般都是在面试的时候才会碰到，一般是要求手写数组去重方法的代码。如果是被提问到，数组去重的方法有哪些？你能答出其中的10种，面试官很有可能对你刮目相看。<br>在真实的项目中碰到的数组去重，一般都是后台去处理，很少让前端处理数组去重。虽然日常项目用到的概率比较低，但还是需要了解一下，以防面试的时候可能回被问到。</p><p>注：写的匆忙，加上这几天有点忙，还没有非常认真核对过，不过思路是没有问题，可能一些小细节出错而已。</p><h2>数组去重的方法</h2><h3>一、利用ES6 Set去重（ES6中最常用）</h3><p></p><div id=\"crayon-5ba2653919fd6668038216\"><div><div><div title=\"切换是否显示行编号\"><div></div></div><div title=\"纯文本显示代码\"><div></div></div><div title=\"切换自动换行\"><div></div></div><div title=\"点击展开代码\"><div></div></div><div title=\"复制代码\"><div></div></div><div title=\"在新窗口中显示代码\"><div></div></div>JavaScript</div></div><div></div><div><div><div id=\"highlighter_75136\"><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\"><tbody><tr><td><div>1</div><div>2</div></td><td><div><div><code>function</code> <code>unique (arr) {</code></div><div><code>return</code> <code>Array.from(</code><code>new</code> <code>Set(arr))&nbsp; }&nbsp;&nbsp;</code><code>var</code> <code>arr = [1,1,</code><code>\'true\'</code><code>,</code><code>\'true\'</code><code>,</code><code>true</code><code>,</code><code>true</code><code>,15,15,</code><code>false</code><code>,</code><code>false</code><code>, undefined,undefined,&nbsp;</code><code>null</code><code>,</code><code>null</code><code>, NaN, NaN,</code><code>\'NaN\'</code><code>, 0, 0,&nbsp;</code><code>\'a\'</code><code>,&nbsp;</code><code>\'a\'</code><code>,{},{}];&nbsp; console.log(unique(arr))&nbsp; &nbsp;</code><code>//[1, \"true\", true, 15, false, undefined, null, NaN, \"NaN\", 0, \"a\", {}, {}]</code></div></div></td></tr></tbody></table></div></div></div><div></div></div><p>不考虑兼容性，这种去重的方法代码最少。这种方法还无法去掉“{}”空对象，后面的高阶方法会添加去掉重复“{}”的方法。</p><h3>二、利用for嵌套for，然后splice去重（ES5中最常用）</h3><p></p><div id=\"crayon-5ba2653919fdf073787854\"><div><div><div title=\"切换是否显示行编号\"><div></div></div><div title=\"纯文本显示代码\"><div></div></div><div title=\"切换自动换行\"><div></div></div><div title=\"点击展开代码\"><div></div></div><div title=\"复制代码\"><div></div></div><div title=\"在新窗口中显示代码\"><div></div></div>JavaScript</div></div><div></div><div><div><div id=\"highlighter_794952\"><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\"><tbody><tr><td><div>1</div><div>2</div><div>3</div><div>4</div><div>5</div><div>6</div><div>7</div><div>8</div><div>9</div><div>10</div><div>11</div><div>12</div><div>13</div><div>14</div><div>15</div><div>16</div><div>17</div><div>18</div><div>19</div><div>20</div><div>21</div><div>22</div><div>23</div><div>24</div><div>25</div><div>26</div><div>27</div><div>28</div><div>29</div><div>30</div><div>31</div><div>32</div><div>33</div><div>34</div><div>35</div><div>36</div><div>37</div></td><td><div><div><code>function</code> <code>unique(arr){</code></div><div>&nbsp;</div><div>&nbsp;</div><div>&nbsp;</div><div>&nbsp;</div><div><code>&nbsp;</code><code>for</code><code>(</code><code>var</code> <code>i=0; i&lt;arr.length; i++){</code></div><div>&nbsp;</div><div>&nbsp;</div><div><code>&nbsp;</code><code>for</code><code>(</code><code>var</code> <code>j=i+1; j&lt;arr.length; j++){</code></div><div>&nbsp;</div><div>&nbsp;</div><div>&nbsp;</div><div><code>&nbsp;</code><code>if</code><code>(arr[i]==arr[j]){</code></div><div>&nbsp;</div><div><code>//第一个等同于第二个，splice方法删除第二个</code></div><div>&nbsp;</div><div>&nbsp;</div><div>&nbsp;</div><div>&nbsp;</div><div><code>&nbsp;</code><code>arr.splice(j,1);</code></div><div>&nbsp;</div><div>&nbsp;</div><div>&nbsp;</div><div>&nbsp;</div><div><code>&nbsp;</code><code>j--;</code></div><div>&nbsp;</div><div>&nbsp;</div><div>&nbsp;</div><div><code>&nbsp;</code><code>}</code></div><div>&nbsp;</div><div>&nbsp;</div><div><code>&nbsp;</code><code>}</code></div><div>&nbsp;</div><div><code>&nbsp;</code><code>}&nbsp;&nbsp;</code><code>return</code> <code>arr;&nbsp; }&nbsp;&nbsp;</code><code>var</code> <code>arr = [1,1,</code><code>\'true\'</code><code>,</code><code>\'true\'</code><code>,</code><code>true</code><code>,</code><code>true</code><code>,15,15,</code><code>false</code><code>,</code><code>false</code><code>, undefined,undefined,&nbsp;</code><code>null</code><code>,</code><code>null</code><code>, NaN, NaN,</code><code>\'NaN\'</code><code>, 0, 0,&nbsp;</code><code>\'a\'</code><code>,&nbsp;</code><code>\'a\'</code><code>,{},{}];</code></div><div><code>&nbsp;</code><code>console.log(unique(arr))</code></div><div><code>&nbsp;</code><code>//[1, \"true\", 15, false, undefined, NaN, NaN, \"NaN\", \"a\", {…}, {…}]</code></div><div><code>//NaN和{}没有去重，两个null直接消失了</code></div></div></td></tr></tbody></table></div></div></div><div></div></div><p>双层循环，外层循环元素，内层循环时比较值。值相同时，则删去这个值。<br>想快速学习更多常用的ES6语法，可以看我之前的文章<a href=\"https://segmentfault.com/a/1190000016068235\" \"=\"\">《学习ES6笔记──工作中常用到的ES6语法》</a>。</p><h3>三、利用indexOf去重</h3><p></p><div id=\"crayon-5ba2653919fe4967240161\"><div><div><div title=\"切换是否显示行编号\"><div></div></div><div title=\"纯文本显示代码\"><div></div></div><div title=\"切换自动换行\"><div></div></div><div title=\"点击展开代码\"><div></div></div><div title=\"复制代码\"><div></div></div><div title=\"在新窗口中显示代码\"><div></div></div>JavaScript</div></div><div></div><div><div><div id=\"highlighter_127881\"><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\"><tbody><tr><td><div>1</div><div>2</div><div>3</div><div>4</div><div>5</div><div>6</div><div>7</div><div>8</div><div>9</div><div>10</div><div>11</div><div>12</div><div>13</div><div>14</div><div>15</div><div>16</div><div>17</div><div>18</div><div>19</div></td><td><div><div><code>function</code> <code>unique(arr) {</code></div><div><code>&nbsp;</code><code>if</code> <code>(!Array.isArray(arr)) {</code></div><div>&nbsp;</div><div><code>&nbsp;</code><code>console.log(</code><code>\'type error!\'</code><code>)</code></div><div>&nbsp;</div><div><code>&nbsp;</code><code>return</code></div><div><code>&nbsp;</code><code>}</code></div><div><code>&nbsp;</code><code>var</code> <code>array = [];</code></div><div><code>&nbsp;</code><code>for</code> <code>(</code><code>var</code> <code>i = 0; i &lt; arr.length; i++) {</code></div><div>&nbsp;</div><div><code>&nbsp;</code><code>if</code> <code>(array .indexOf(arr[i]) === -1) {</code></div><div>&nbsp;</div><div>&nbsp;</div><div><code>&nbsp;</code><code>array .push(arr[i])</code></div><div>&nbsp;</div><div><code>&nbsp;</code><code>}</code></div><div><code>&nbsp;</code><code>}</code></div><div><code>&nbsp;</code><code>return</code> <code>array;&nbsp; }&nbsp;&nbsp;</code><code>var</code> <code>arr = [1,1,</code><code>\'true\'</code><code>,</code><code>\'true\'</code><code>,</code><code>true</code><code>,</code><code>true</code><code>,15,15,</code><code>false</code><code>,</code><code>false</code><code>, undefined,undefined,&nbsp;</code><code>null</code><code>,</code><code>null</code><code>, NaN, NaN,</code><code>\'NaN\'</code><code>, 0, 0,&nbsp;</code><code>\'a\'</code><code>,&nbsp;</code><code>\'a\'</code><code>,{},{}];&nbsp; console.log(unique(arr))</code></div><div><code>// [1, \"true\", true, 15, false, undefined, null, NaN, NaN, \"NaN\", 0, \"a\", {…}, {…}]&nbsp; //NaN、{}没有去重</code></div></div></td></tr></tbody></table></div></div></div><div></div></div><p>新建一个空的结果数组，for 循环原数组，判断结果数组是否存在当前元素，如果有相同的值则跳过，不相同则push进数组。</p><h3>四、利用sort()</h3><p></p><div id=\"crayon-5ba2653919fe9178154551\"><div><div><div title=\"切换是否显示行编号\"><div></div></div><div title=\"纯文本显示代码\"><div></div></div><div title=\"切换自动换行\"><div></div></div><div title=\"点击展开代码\"><div></div></div><div title=\"复制代码\"><div></div></div><div title=\"在新窗口中显示代码\"><div></div></div>JavaScript</div></div><div></div><div><div><div id=\"highlighter_14227\"><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\"><tbody><tr><td><div>1</div><div>2</div><div>3</div><div>4</div><div>5</div><div>6</div><div>7</div><div>8</div><div>9</div><div>10</div><div>11</div><div>12</div><div>13</div><div>14</div><div>15</div><div>16</div><div>17</div><div>18</div><div>19</div><div>20</div><div>21</div><div>22</div><div>23</div></td><td><div><div><code>function</code> <code>unique(arr) {</code></div><div><code>&nbsp;</code><code>if</code> <code>(!Array.isArray(arr)) {</code></div><div>&nbsp;</div><div><code>&nbsp;</code><code>console.log(</code><code>\'type error!\'</code><code>)</code></div><div>&nbsp;</div><div><code>&nbsp;</code><code>return</code><code>;</code></div><div><code>&nbsp;</code><code>}</code></div><div><code>&nbsp;</code><code>arr = arr.sort()</code></div><div><code>&nbsp;</code><code>var</code> <code>arrry= [arr[0]];</code></div><div><code>&nbsp;</code><code>for</code> <code>(</code><code>var</code> <code>i = 1; i &lt; arr.length; i++) {</code></div><div>&nbsp;</div><div><code>&nbsp;</code><code>if</code> <code>(arr[i] !== arr[i-1]) {</code></div><div>&nbsp;</div><div>&nbsp;</div><div><code>&nbsp;</code><code>arrry.push(arr[i]);</code></div><div>&nbsp;</div><div><code>&nbsp;</code><code>}</code></div><div><code>&nbsp;</code><code>}</code></div><div><code>&nbsp;</code><code>return</code> <code>arrry;&nbsp; }</code></div><div><code>&nbsp;&nbsp;</code><code>var</code> <code>arr = [1,1,</code><code>\'true\'</code><code>,</code><code>\'true\'</code><code>,</code><code>true</code><code>,</code><code>true</code><code>,15,15,</code><code>false</code><code>,</code><code>false</code><code>, undefined,undefined,&nbsp;</code><code>null</code><code>,</code><code>null</code><code>, NaN, NaN,</code><code>\'NaN\'</code><code>, 0, 0,&nbsp;</code><code>\'a\'</code><code>,&nbsp;</code><code>\'a\'</code><code>,{},{}];</code></div><div>&nbsp;</div><div><code>&nbsp;</code><code>console.log(unique(arr))&nbsp;&nbsp;</code><code>// [0, 1, 15, \"NaN\", NaN, NaN, {…}, {…}, \"a\", false, null, true, \"true\", undefined]</code></div><div><code>&nbsp;</code><code>//NaN、{}没有去重</code></div></div></td></tr></tbody></table></div></div></div><div></div></div><p>利用sort()排序方法，然后根据排序后的结果进行遍历及相邻元素比对。</p><h3>五、利用对象的属性不能相同的特点进行去重</h3><p></p><div id=\"crayon-5ba2653919fed868929039\"><div><div><div title=\"切换是否显示行编号\"><div></div></div><div title=\"纯文本显示代码\"><div></div></div><div title=\"切换自动换行\"><div></div></div><div title=\"点击展开代码\"><div></div></div><div title=\"复制代码\"><div></div></div><div title=\"在新窗口中显示代码\"><div></div></div>JavaScript</div></div><div></div><div><div><div id=\"highlighter_19269\"><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\"><tbody><tr><td><div>1</div><div>2</div><div>3</div><div>4</div><div>5</div><div>6</div><div>7</div><div>8</div><div>9</div><div>10</div><div>11</div><div>12</div><div>13</div><div>14</div><div>15</div><div>16</div><div>17</div><div>18</div><div>19</div><div>20</div><div>21</div><div>22</div><div>23</div><div>24</div><div>25</div><div>26</div><div>27</div><div>28</div><div>29</div><div>30</div><div>31</div></td><td><div><div><code>function</code> <code>unique(arr) {</code></div><div><code>&nbsp;&nbsp;</code><code>if</code> <code>(!Array.isArray(arr)) {</code></div><div>&nbsp;</div><div><code>&nbsp;&nbsp;</code><code>console.log(</code><code>\'type error!\'</code><code>)</code></div><div>&nbsp;</div><div><code>&nbsp;&nbsp;</code><code>return</code></div><div><code>&nbsp;&nbsp;</code><code>}</code></div><div><code>&nbsp;&nbsp;</code><code>var</code> <code>arrry= [];</code></div><div><code>&nbsp;&nbsp;&nbsp;</code><code>var</code>&nbsp; <code>obj = {};</code></div><div><code>&nbsp;&nbsp;</code><code>for</code> <code>(</code><code>var</code> <code>i = 0; i &lt; arr.length; i++) {</code></div><div>&nbsp;</div><div><code>&nbsp;&nbsp;</code><code>if</code> <code>(!obj[arr[i]]) {</code></div><div>&nbsp;</div><div>&nbsp;</div><div><code>&nbsp;&nbsp;</code><code>arrry.push(arr[i])</code></div><div>&nbsp;</div><div>&nbsp;</div><div><code>&nbsp;&nbsp;</code><code>obj[arr[i]] = 1</code></div><div>&nbsp;</div><div><code>&nbsp;&nbsp;</code><code>}&nbsp;</code><code>else</code> <code>{</code></div><div>&nbsp;</div><div>&nbsp;</div><div><code>&nbsp;&nbsp;</code><code>obj[arr[i]]++</code></div><div>&nbsp;</div><div><code>&nbsp;&nbsp;</code><code>}</code></div><div><code>&nbsp;&nbsp;</code><code>}</code></div><div><code>&nbsp;&nbsp;</code><code>return</code> <code>arrry;&nbsp; }</code></div><div><code>&nbsp;&nbsp;</code><code>var</code> <code>arr = [1,1,</code><code>\'true\'</code><code>,</code><code>\'true\'</code><code>,</code><code>true</code><code>,</code><code>true</code><code>,15,15,</code><code>false</code><code>,</code><code>false</code><code>, undefined,undefined,&nbsp;</code><code>null</code><code>,</code><code>null</code><code>, NaN, NaN,</code><code>\'NaN\'</code><code>, 0, 0,&nbsp;</code><code>\'a\'</code><code>,&nbsp;</code><code>\'a\'</code><code>,{},{}];</code></div><div>&nbsp;</div><div><code>&nbsp;&nbsp;</code><code>console.log(unique(arr))&nbsp;&nbsp;</code><code>//[1, \"true\", 15, false, undefined, null, NaN, 0, \"a\", {…}]</code></div><div><code>//两个true直接去掉了，NaN和{}去重</code></div></div></td></tr></tbody></table></div></div></div><div></div></div><p></p><h3>六、利用includes</h3><p></p><div id=\"crayon-5ba2653919ff1893031742\"><div><div><div title=\"切换是否显示行编号\"><div></div></div><div title=\"纯文本显示代码\"><div></div></div><div title=\"切换自动换行\"><div></div></div><div title=\"点击展开代码\"><div></div></div><div title=\"复制代码\"><div></div></div><div title=\"在新窗口中显示代码\"><div></div></div>JavaScript</div></div><div></div><div><div><div id=\"highlighter_239153\"><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\"><tbody><tr><td><div>1</div><div>2</div><div>3</div><div>4</div><div>5</div><div>6</div><div>7</div><div>8</div><div>9</div><div>10</div><div>11</div><div>12</div><div>13</div><div>14</div><div>15</div><div>16</div><div>17</div><div>18</div><div>19</div><div>20</div><div>21</div><div>22</div><div>23</div><div>24</div><div>25</div><div>26</div></td><td><div><div><code>function</code> <code>unique(arr) {</code></div><div><code>&nbsp;&nbsp;</code><code>if</code> <code>(!Array.isArray(arr)) {</code></div><div>&nbsp;</div><div><code>&nbsp;&nbsp;</code><code>console.log(</code><code>\'type error!\'</code><code>)</code></div><div>&nbsp;</div><div><code>&nbsp;&nbsp;</code><code>return</code></div><div><code>&nbsp;&nbsp;</code><code>}</code></div><div><code>&nbsp;&nbsp;</code><code>var</code> <code>array =[];</code></div><div><code>&nbsp;&nbsp;</code><code>for</code><code>(</code><code>var</code> <code>i = 0; i &lt; arr.length; i++) {</code></div><div>&nbsp;</div><div>&nbsp;</div><div><code>&nbsp;&nbsp;</code><code>if</code><code>( !array.includes( arr[i]) ) {</code><code>//includes 检测数组是否有某个值</code></div><div>&nbsp;</div><div>&nbsp;</div><div>&nbsp;</div><div>&nbsp;</div><div><code>&nbsp;&nbsp;</code><code>array.push(arr[i]);</code></div><div>&nbsp;</div><div>&nbsp;</div><div>&nbsp;</div><div><code>}</code></div><div><code>&nbsp;&nbsp;</code><code>}</code></div><div><code>&nbsp;&nbsp;</code><code>return</code> <code>array&nbsp; }&nbsp;&nbsp;</code><code>var</code> <code>arr = [1,1,</code><code>\'true\'</code><code>,</code><code>\'true\'</code><code>,</code><code>true</code><code>,</code><code>true</code><code>,15,15,</code><code>false</code><code>,</code><code>false</code><code>, undefined,undefined,&nbsp;</code><code>null</code><code>,</code><code>null</code><code>, NaN, NaN,</code><code>\'NaN\'</code><code>, 0, 0,&nbsp;</code><code>\'a\'</code><code>,&nbsp;</code><code>\'a\'</code><code>,{},{}];</code></div><div><code>&nbsp;&nbsp;</code><code>console.log(unique(arr))</code></div><div><code>&nbsp;&nbsp;</code><code>//[1, \"true\", true, 15, false, undefined, null, NaN, \"NaN\", 0, \"a\", {…}, {…}]</code></div><div><code>&nbsp;</code><code>//{}没有去重</code></div></div></td></tr></tbody></table></div></div></div><div></div></div><p></p><h3>七、利用hasOwnProperty</h3><p></p><div id=\"crayon-5ba2653919ff5249971230\"><div><div><div title=\"切换是否显示行编号\"><div></div></div><div title=\"纯文本显示代码\"><div></div></div><div title=\"切换自动换行\"><div></div></div><div title=\"点击展开代码\"><div></div></div><div title=\"复制代码\"><div></div></div><div title=\"在新窗口中显示代码\"><div></div></div>JavaScript</div></div><div></div><div><div><div id=\"highlighter_403964\"><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\"><tbody><tr><td><div>1</div><div>2</div><div>3</div><div>4</div><div>5</div><div>6</div><div>7</div><div>8</div><div>9</div></td><td><div><div><code>function</code> <code>unique(arr) {</code></div><div><code>&nbsp;</code><code>var</code> <code>obj = {};</code></div><div><code>&nbsp;</code><code>return</code> <code>arr.filter(</code><code>function</code><code>(item, index, arr){</code></div><div>&nbsp;</div><div><code>&nbsp;</code><code>return</code> <code>obj.hasOwnProperty(</code><code>typeof</code> <code>item + item) ?&nbsp;</code><code>false</code> <code>: (obj[</code><code>typeof</code> <code>item + item] =&nbsp;</code><code>true</code><code>)</code></div><div><code>&nbsp;</code><code>})&nbsp; }</code></div><div><code>&nbsp;</code><code>var</code> <code>arr = [1,1,</code><code>\'true\'</code><code>,</code><code>\'true\'</code><code>,</code><code>true</code><code>,</code><code>true</code><code>,15,15,</code><code>false</code><code>,</code><code>false</code><code>, undefined,undefined,&nbsp;</code><code>null</code><code>,</code><code>null</code><code>, NaN, NaN,</code><code>\'NaN\'</code><code>, 0, 0,&nbsp;</code><code>\'a\'</code><code>,&nbsp;</code><code>\'a\'</code><code>,{},{}];</code></div><div>&nbsp;</div><div><code>&nbsp;</code><code>console.log(unique(arr))&nbsp;&nbsp;</code><code>//[1, \"true\", true, 15, false, undefined, null, NaN, \"NaN\", 0, \"a\", {…}]&nbsp;&nbsp; //所有的都去重了</code></div></div></td></tr></tbody></table></div></div></div><div></div></div><p>利用hasOwnProperty 判断是否存在对象属性</p><h3>八、利用filter</h3><p></p><div id=\"crayon-5ba2653919ff9978100192\"><div><div><div title=\"切换是否显示行编号\"><div></div></div><div title=\"纯文本显示代码\"><div></div></div><div title=\"切换自动换行\"><div></div></div><div title=\"点击展开代码\"><div></div></div><div title=\"复制代码\"><div></div></div><div title=\"在新窗口中显示代码\"><div></div></div>JavaScript</div></div><div></div><div><div><div id=\"highlighter_716080\"><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\"><tbody><tr><td><div>1</div><div>2</div><div>3</div><div>4</div><div>5</div><div>6</div><div>7</div><div>8</div></td><td><div><div><code>function</code> <code>unique(arr) {</code></div><div><code>return</code> <code>arr.filter(</code><code>function</code><code>(item, index, arr) {</code></div><div><code>&nbsp;&nbsp;</code><code>//当前元素，在原始数组中的第一个索引==当前索引值，否则返回当前元素</code></div><div><code>&nbsp;&nbsp;</code><code>return</code> <code>arr.indexOf(item, 0) === index;</code></div><div><code>});&nbsp; }</code></div><div><code>&nbsp;&nbsp;</code><code>var</code> <code>arr = [1,1,</code><code>\'true\'</code><code>,</code><code>\'true\'</code><code>,</code><code>true</code><code>,</code><code>true</code><code>,15,15,</code><code>false</code><code>,</code><code>false</code><code>, undefined,undefined,&nbsp;</code><code>null</code><code>,</code><code>null</code><code>, NaN, NaN,</code><code>\'NaN\'</code><code>, 0, 0,&nbsp;</code><code>\'a\'</code><code>,&nbsp;</code><code>\'a\'</code><code>,{},{}];</code></div><div>&nbsp;</div><div><code>&nbsp;&nbsp;</code><code>console.log(unique(arr))&nbsp;&nbsp;</code><code>//[1, \"true\", true, 15, false, undefined, null, \"NaN\", 0, \"a\", {…}, {…}]</code></div></div></td></tr></tbody></table></div></div></div><div></div></div><p></p><h3>九、利用递归去重</h3><p></p><div id=\"crayon-5ba2653919ffc341256622\"><div><div><div title=\"切换是否显示行编号\"><div></div></div><div title=\"纯文本显示代码\"><div></div></div><div title=\"切换自动换行\"><div></div></div><div title=\"点击展开代码\"><div></div></div><div title=\"复制代码\"><div></div></div><div title=\"在新窗口中显示代码\"><div></div></div>JavaScript</div></div><div></div><div><div><div id=\"highlighter_858552\"><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\"><tbody><tr><td><div>1</div><div>2</div><div>3</div><div>4</div><div>5</div><div>6</div><div>7</div><div>8</div><div>9</div><div>10</div><div>11</div><div>12</div><div>13</div><div>14</div><div>15</div><div>16</div><div>17</div><div>18</div><div>19</div><div>20</div><div>21</div><div>22</div><div>23</div><div>24</div><div>25</div><div>26</div><div>27</div><div>28</div><div>29</div><div>30</div><div>31</div><div>32</div><div>33</div></td><td><div><div><code>function</code> <code>unique(arr) {</code></div><div>&nbsp;</div><div><code>&nbsp;&nbsp;</code><code>var</code> <code>array= arr;</code></div><div>&nbsp;</div><div><code>&nbsp;&nbsp;</code><code>var</code> <code>len = array.length;</code></div><div>&nbsp;</div><div><code>array.sort(</code><code>function</code><code>(a,b){&nbsp;&nbsp;&nbsp;</code><code>//排序后更加方便去重</code></div><div>&nbsp;</div><div><code>&nbsp;&nbsp;</code><code>return</code> <code>a - b;</code></div><div><code>&nbsp;&nbsp;</code><code>})</code></div><div>&nbsp;</div><div><code>function</code> <code>loop(index){</code></div><div>&nbsp;</div><div><code>&nbsp;&nbsp;</code><code>if</code><code>(index &gt;= 1){</code></div><div>&nbsp;</div><div>&nbsp;</div><div><code>&nbsp;&nbsp;</code><code>if</code><code>(array[index] === array[index-1]){</code></div><div>&nbsp;</div><div>&nbsp;</div><div>&nbsp;</div><div><code>&nbsp;&nbsp;</code><code>array.splice(index,1);</code></div><div>&nbsp;</div><div>&nbsp;</div><div><code>&nbsp;&nbsp;</code><code>}</code></div><div>&nbsp;</div><div>&nbsp;</div><div><code>&nbsp;&nbsp;</code><code>loop(index - 1);</code></div><div><code>//递归loop，然后数组去重</code></div><div>&nbsp;</div><div><code>&nbsp;&nbsp;</code><code>}</code></div><div><code>&nbsp;&nbsp;</code><code>}</code></div><div><code>&nbsp;&nbsp;</code><code>loop(len-1);</code></div><div><code>&nbsp;&nbsp;</code><code>return</code> <code>array;&nbsp; }&nbsp;&nbsp;&nbsp;</code><code>var</code> <code>arr = [1,1,</code><code>\'true\'</code><code>,</code><code>\'true\'</code><code>,</code><code>true</code><code>,</code><code>true</code><code>,15,15,</code><code>false</code><code>,</code><code>false</code><code>, undefined,undefined,&nbsp;</code><code>null</code><code>,</code><code>null</code><code>, NaN, NaN,</code><code>\'NaN\'</code><code>, 0, 0,&nbsp;</code><code>\'a\'</code><code>,&nbsp;</code><code>\'a\'</code><code>,{},{}];&nbsp; console.log(unique(arr))&nbsp;&nbsp;</code><code>//[1, \"a\", \"true\", true, 15, false, 1, {…}, null, NaN, NaN, \"NaN\", 0, \"a\", {…}, undefined]</code></div></div></td></tr></tbody></table></div></div></div><div></div></div><p></p><h3>十、利用Map数据结构去重</h3><p></p><div id=\"crayon-5ba265391a000881598686\"><div><div><div title=\"切换是否显示行编号\"><div></div></div><div title=\"纯文本显示代码\"><div></div></div><div title=\"切换自动换行\"><div></div></div><div title=\"点击展开代码\"><div></div></div><div title=\"复制代码\"><div></div></div><div title=\"在新窗口中显示代码\"><div></div></div>JavaScript</div></div><div></div><div><div><div id=\"highlighter_253579\"><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\"><tbody><tr><td><div>1</div><div>2</div><div>3</div><div>4</div><div>5</div><div>6</div><div>7</div><div>8</div><div>9</div><div>10</div><div>11</div><div>12</div><div>13</div><div>14</div><div>15</div><div>16</div></td><td><div><div><code>function</code> <code>arrayNonRepeatfy(arr) {</code></div><div><code>let map =&nbsp;</code><code>new</code> <code>Map();</code></div><div><code>let array =&nbsp;</code><code>new</code> <code>Array();&nbsp;&nbsp;</code><code>// 数组用于返回结果</code></div><div><code>for</code> <code>(let i = 0; i &lt; arr.length; i++) {</code></div><div><code>&nbsp;&nbsp;</code><code>if</code><code>(map .has(arr[i])) {&nbsp;&nbsp;</code><code>// 如果有该key值</code></div><div>&nbsp;</div><div><code>map .set(arr[i],&nbsp;</code><code>true</code><code>);</code></div><div><code>&nbsp;&nbsp;&nbsp;</code><code>}&nbsp;</code><code>else</code> <code>{</code></div><div>&nbsp;</div><div><code>&nbsp;</code><code>map .set(arr[i],&nbsp;</code><code>false</code><code>);&nbsp;&nbsp;&nbsp;</code><code>// 如果没有该key值</code></div><div>&nbsp;</div><div><code>array .push(arr[i]);</code></div><div><code>&nbsp;&nbsp;</code><code>}</code></div><div><code>}</code></div><div><code>&nbsp;</code><code>return</code> <code>array ;&nbsp; }&nbsp;&nbsp;&nbsp;</code><code>var</code> <code>arr = [1,1,</code><code>\'true\'</code><code>,</code><code>\'true\'</code><code>,</code><code>true</code><code>,</code><code>true</code><code>,15,15,</code><code>false</code><code>,</code><code>false</code><code>, undefined,undefined,&nbsp;</code><code>null</code><code>,</code><code>null</code><code>, NaN, NaN,</code><code>\'NaN\'</code><code>, 0, 0,&nbsp;</code><code>\'a\'</code><code>,&nbsp;</code><code>\'a\'</code><code>,{},{}];</code></div><div><code>&nbsp;&nbsp;</code><code>console.log(unique(arr))&nbsp;&nbsp;</code><code>//[1, \"a\", \"true\", true, 15, false, 1, {…}, null, NaN, NaN, \"NaN\", 0, \"a\", {…}, undefined]</code></div></div></td></tr></tbody></table></div></div></div><div></div></div><p>创建一个空Map数据结构，遍历需要去重的数组，把数组的每一个元素作为key存到Map中。由于Map中不会出现相同的key值，所以最终得到的就是去重后的结果。</p><h3>十一、利用reduce+includes</h3><p></p><div id=\"crayon-5ba265391a004461443621\"><div><div><div title=\"切换是否显示行编号\"><div></div></div><div title=\"纯文本显示代码\"><div></div></div><div title=\"切换自动换行\"><div></div></div><div title=\"点击展开代码\"><div></div></div><div title=\"复制代码\"><div></div></div><div title=\"在新窗口中显示代码\"><div></div></div>JavaScript</div></div><div></div><div><div><div id=\"highlighter_167553\"><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\"><tbody><tr><td><div>1</div><div>2</div></td><td><div><div><code>function</code> <code>unique(arr){</code></div><div><code>&nbsp;</code><code>return</code> <code>arr.reduce((prev,cur) =&gt; prev.includes(cur) ? prev : [...prev,cur],[]);&nbsp; }&nbsp;&nbsp;</code><code>var</code> <code>arr = [1,1,</code><code>\'true\'</code><code>,</code><code>\'true\'</code><code>,</code><code>true</code><code>,</code><code>true</code><code>,15,15,</code><code>false</code><code>,</code><code>false</code><code>, undefined,undefined,&nbsp;</code><code>null</code><code>,</code><code>null</code><code>, NaN, NaN,</code><code>\'NaN\'</code><code>, 0, 0,&nbsp;</code><code>\'a\'</code><code>,&nbsp;</code><code>\'a\'</code><code>,{},{}];&nbsp; console.log(unique(arr));&nbsp;&nbsp;</code><code>// [1, \"true\", true, 15, false, undefined, null, NaN, \"NaN\", 0, \"a\", {…}, {…}]</code></div></div></td></tr></tbody></table></div></div></div><div></div></div><p></p><h3>十二、[…new Set(arr)]</h3><p></p><div id=\"crayon-5ba265391a008505823279\"><div><div><div title=\"切换是否显示行编号\"><div></div></div><div title=\"纯文本显示代码\"><div></div></div><div title=\"切换自动换行\"><div></div></div><div title=\"点击展开代码\"><div></div></div><div title=\"复制代码\"><div></div></div><div title=\"在新窗口中显示代码\"><div></div></div>JavaScript</div></div><div></div><div><div><div id=\"highlighter_769162\"><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\"><tbody><tr><td><div>1</div></td><td><div><div><code>[...</code><code>new</code> <code>Set(arr)]&nbsp;&nbsp;&nbsp;</code><code>//代码就是这么少----（其实，严格来说并不算是一种，相对于第一种方法来说只是简化了代码）</code></div></div></td></tr></tbody></table></div></div></div><div></div></div><p>PS：有些文章提到了foreach+indexOf数组去重的方法，个人觉得都是大同小异，所以没有写上去。</p>', '1', '29', '1', '2018-09-21 11:35:47', '2018-09-21 11:35:47', '1', '1', '0', '');
INSERT INTO `post` VALUES ('30', '10', 'xxxx', 'xxxx...', '<p></p><p>xxxx</p>', '1', '1', '1', '2018-09-21 15:29:22', '2018-09-21 15:29:22', '1', '1', '0', '');
INSERT INTO `post` VALUES ('31', '10', 'xxx', 'xxx...', '<p></p><p>xxx</p>', '1', '6', '1', '2018-09-21 15:30:17', '2018-09-21 15:30:17', '1', '1', '0', '');

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
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 COMMENT='积分表';

-- ----------------------------
-- Records of score
-- ----------------------------
INSERT INTO `score` VALUES ('1', '5', '', '1', '1', '2018-09-12 18:11:34', '0000-00-00 00:00:00');
INSERT INTO `score` VALUES ('2', '5', 'xxx', '1', '2', '2018-09-12 18:12:30', '0000-00-00 00:00:00');
INSERT INTO `score` VALUES ('3', '10', '2018-09-17 10:04:40签到', '0', '3', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `score` VALUES ('4', '10', '2018-09-14 00:00:00补签', '0', '3', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `score` VALUES ('5', '10', '2018-09-15 00:00:00补签', '0', '3', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `score` VALUES ('6', '10', '2018-09-17 10:39:33签到', '0', '3', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `score` VALUES ('7', '10', '2018-09-14 00:00:00补签', '0', '3', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `score` VALUES ('8', '10', '2018-09-15 00:00:00补签', '0', '3', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `score` VALUES ('9', '10', '2018-09-16 00:00:00补签', '0', '3', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `score` VALUES ('10', '10', '2018-09-17 10:50:57签到', '0', '3', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `score` VALUES ('11', '10', '2018-09-14 00:00:00补签', '1', '3', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `score` VALUES ('12', '10', '2018-09-14 00:00:00补签', '1', '3', '2018-09-17 11:28:12', '2018-09-17 11:28:12');
INSERT INTO `score` VALUES ('13', '10', '2018-09-17 18:27:11签到', '0', '3', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `score` VALUES ('14', '10', '2018-09-17 18:43:39签到', '1', '3', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `score` VALUES ('15', '10', '2018-09-17 18:47:02签到', '1', '3', '2018-09-17 18:47:02', '2018-09-17 18:47:02');
INSERT INTO `score` VALUES ('16', '10', '2018-09-18 10:38:30签到', '1', '3', '2018-09-18 10:38:30', '2018-09-18 10:38:30');
INSERT INTO `score` VALUES ('17', '10', '2018-09-15 00:00:00补签', '2', '3', '2018-09-18 18:00:42', '2018-09-18 18:00:42');
INSERT INTO `score` VALUES ('18', '10', '2018-09-15 00:00:00补签', '2', '3', '2018-09-18 18:00:48', '2018-09-18 18:00:48');
INSERT INTO `score` VALUES ('19', '10', '2018-09-15 00:00:00补签', '2', '3', '2018-09-18 18:00:49', '2018-09-18 18:00:49');
INSERT INTO `score` VALUES ('20', '10', '2018-09-15 00:00:00补签', '2', '3', '2018-09-18 18:00:52', '2018-09-18 18:00:52');
INSERT INTO `score` VALUES ('21', '10', '2018-09-15 00:00:00补签', '2', '3', '2018-09-18 18:01:56', '2018-09-18 18:01:56');
INSERT INTO `score` VALUES ('22', '10', '2018-09-15 00:00:00补签', '2', '3', '2018-09-18 18:02:19', '2018-09-18 18:02:19');
INSERT INTO `score` VALUES ('23', '10', '2018-09-17 00:00:00补签', '2', '3', '2018-09-18 18:02:23', '2018-09-18 18:02:23');
INSERT INTO `score` VALUES ('24', '10', '2018-09-16 00:00:00补签', '2', '3', '2018-09-18 18:02:26', '2018-09-18 18:02:26');
INSERT INTO `score` VALUES ('25', '10', '2018-09-15 00:00:00补签', '2', '3', '2018-09-18 18:03:59', '2018-09-18 18:03:59');
INSERT INTO `score` VALUES ('26', '10', '2018-09-15 00:00:00补签', '2', '3', '2018-09-18 18:05:00', '2018-09-18 18:05:00');
INSERT INTO `score` VALUES ('27', '10', '2018-09-15 00:00:00补签', '2', '3', '2018-09-18 18:07:15', '2018-09-18 18:07:15');
INSERT INTO `score` VALUES ('28', '10', '2018-09-16 00:00:00补签', '2', '3', '2018-09-18 18:07:35', '2018-09-18 18:07:35');
INSERT INTO `score` VALUES ('29', '10', '2018-09-17 00:00:00补签', '2', '3', '2018-09-18 18:51:41', '2018-09-18 18:51:41');
INSERT INTO `score` VALUES ('30', '10', '2018-09-19 09:25:22签到', '1', '3', '2018-09-19 09:25:22', '2018-09-19 09:25:22');
INSERT INTO `score` VALUES ('31', '10', '2018-09-20 10:09:51签到', '1', '3', '2018-09-20 10:09:51', '2018-09-20 10:09:51');
INSERT INTO `score` VALUES ('32', '10', '2018-09-19 00:00:00补签', '2', '3', '2018-09-20 18:08:33', '2018-09-20 18:08:33');
INSERT INTO `score` VALUES ('33', '10', '2018-09-20 18:08:38签到', '2', '3', '2018-09-20 18:08:38', '2018-09-20 18:08:38');
INSERT INTO `score` VALUES ('34', '10', '2018-09-21 09:55:17签到', '2', '3', '2018-09-21 09:55:17', '2018-09-21 09:55:17');
INSERT INTO `score` VALUES ('35', '10', '2018-09-21 12:01:57签到', '1', '3', '2018-09-21 12:01:57', '2018-09-21 12:01:57');

-- ----------------------------
-- Table structure for sign
-- ----------------------------
DROP TABLE IF EXISTS `sign`;
CREATE TABLE `sign` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8 COMMENT='签到表';

-- ----------------------------
-- Records of sign
-- ----------------------------
INSERT INTO `sign` VALUES ('12', '1', '2018-09-15 00:00:00', null);
INSERT INTO `sign` VALUES ('13', '1', '2018-09-16 00:00:00', null);
INSERT INTO `sign` VALUES ('16', '1', '2018-09-14 00:00:00', null);
INSERT INTO `sign` VALUES ('21', '1', '2018-09-17 18:47:02', '2018-09-17 18:47:02');
INSERT INTO `sign` VALUES ('22', '1', '2018-09-18 10:38:30', '2018-09-18 10:38:30');
INSERT INTO `sign` VALUES ('23', '2', '2018-09-18 18:00:42', '2018-09-18 18:00:42');
INSERT INTO `sign` VALUES ('24', '2', '2018-09-18 18:00:48', '2018-09-18 18:00:48');
INSERT INTO `sign` VALUES ('25', '2', '2018-09-18 18:00:49', '2018-09-18 18:00:49');
INSERT INTO `sign` VALUES ('26', '2', '2018-09-18 18:00:52', '2018-09-18 18:00:52');
INSERT INTO `sign` VALUES ('27', '2', '2018-09-18 18:01:56', '2018-09-18 18:01:56');
INSERT INTO `sign` VALUES ('28', '2', '2018-09-18 18:02:19', '2018-09-18 18:02:19');
INSERT INTO `sign` VALUES ('29', '2', '2018-09-18 18:02:23', '2018-09-18 18:02:23');
INSERT INTO `sign` VALUES ('30', '2', '2018-09-18 18:02:26', '2018-09-18 18:02:26');
INSERT INTO `sign` VALUES ('31', '2', '2018-09-18 18:03:59', '2018-09-18 18:03:59');
INSERT INTO `sign` VALUES ('32', '2', '2018-09-18 18:05:00', '2018-09-18 18:05:00');
INSERT INTO `sign` VALUES ('33', '2', '2018-09-18 18:06:07', '2018-09-18 18:06:07');
INSERT INTO `sign` VALUES ('34', '2', '2018-09-18 18:06:39', '2018-09-18 18:06:39');
INSERT INTO `sign` VALUES ('35', '2', '2018-09-15 00:00:00', null);
INSERT INTO `sign` VALUES ('36', '2', '2018-09-16 00:00:00', null);
INSERT INTO `sign` VALUES ('37', '2', '2018-09-17 00:00:00', null);
INSERT INTO `sign` VALUES ('38', '1', '2018-09-19 09:25:22', null);
INSERT INTO `sign` VALUES ('39', '1', '2018-09-20 10:09:51', null);
INSERT INTO `sign` VALUES ('40', '2', '2018-09-19 00:00:00', null);
INSERT INTO `sign` VALUES ('41', '2', '2018-09-20 18:08:38', null);
INSERT INTO `sign` VALUES ('42', '2', '2018-09-21 09:55:17', null);
INSERT INTO `sign` VALUES ('43', '1', '2018-09-21 12:01:57', null);

-- ----------------------------
-- Table structure for tag
-- ----------------------------
DROP TABLE IF EXISTS `tag`;
CREATE TABLE `tag` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tag_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='标签表';

-- ----------------------------
-- Records of tag
-- ----------------------------
INSERT INTO `tag` VALUES ('1', '问答', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `tag` VALUES ('2', 'composer', '2018-09-18 14:06:12', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for tag_union
-- ----------------------------
DROP TABLE IF EXISTS `tag_union`;
CREATE TABLE `tag_union` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `content_id` int(11) NOT NULL,
  `tag_id` int(255) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='内容与标签关联表';

-- ----------------------------
-- Records of tag_union
-- ----------------------------
INSERT INTO `tag_union` VALUES ('1', '27', '1', '2018-09-18 19:17:00', '0000-00-00 00:00:00');
INSERT INTO `tag_union` VALUES ('2', '27', '2', '2018-09-18 19:17:06', '0000-00-00 00:00:00');

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
  `tmp_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '临时邮箱，用作修改邮箱过渡使用',
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
INSERT INTO `user` VALUES ('1', 'ngyhd', 'LIe64fSes1nRpZ3Pky8w6er1Zivshr1s', '$2y$13$FhgT7LzlzyXpMVzinRSRGuelkKkZtWaEHx8djkOWlqPqwrOh.xEFy', null, 'lkjh', null, '164271849@qq.com', '10', '1530154892', '1537525789', '/static/img/1/20180913135449_big.jpg');
INSERT INTO `user` VALUES ('2', 'ngyhd2', 'CVY4L0v9PG8DDzj8QTeCGR_pXBe2xbZy', '$2y$13$hvEidv2XtIxj.GFkOA3b/OkTUDGNVYWe8aKVQLpRyH8q1nvThfVIi', null, null, null, '1536223622@qq.com', '10', '0', '0', '/static/img/logo3.jpg');
INSERT INTO `user` VALUES ('4', 'ngyhd3', 'A1EkLYjVsQXgZtg1nmu8ExZM7ivvH2vC', '$2y$13$hvEidv2XtIxj.GFkOA3b/OkTUDGNVYWe8aKVQLpRyH8q1nvThfVIi', null, null, null, '153622364@qq.com', '10', '1531972725', '1531972725', '/static/img/logo4.jpg');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='访客表';

-- ----------------------------
-- Records of visitor
-- ----------------------------
INSERT INTO `visitor` VALUES ('1', '1', '1', '1');
INSERT INTO `visitor` VALUES ('2', '1', '1', '2');
