/*
Navicat MySQL Data Transfer

Source Server         : Localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : postifydb

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2021-01-11 23:01:17
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `category`
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `cat_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cat_title` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES ('1', 'del');
INSERT INTO `category` VALUES ('2', 'a4TECH');
INSERT INTO `category` VALUES ('3', 'apple');
INSERT INTO `category` VALUES ('17', 'Redragon');
INSERT INTO `category` VALUES ('18', 'HP');
INSERT INTO `category` VALUES ('19', 'Mobo');

-- ----------------------------
-- Table structure for `comments`
-- ----------------------------
DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `comment_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `comment_post_id` varchar(255) DEFAULT NULL,
  `comment_author` varchar(255) DEFAULT NULL,
  `comment_email` varchar(255) DEFAULT NULL,
  `comment_content` text DEFAULT NULL,
  `comment_status` varchar(255) DEFAULT NULL,
  `comment_date` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of comments
-- ----------------------------
INSERT INTO `comments` VALUES ('1', '1', 'aliyan khan', 'aliyan@gmail.com', 'Lorem ipsum dolor sit, amet consectetur adipisicing, elit. Quam quae quasi.', 'approve', null);
INSERT INTO `comments` VALUES ('2', '2', 'aahil ahmed', 'aahil@gmail.com', 'Lorem ipsum dolor sit, amet consectetur adipisicing, elit. Quam quae quasi.', 'unapprove', '');
INSERT INTO `comments` VALUES ('6', '1', 'Khurram', 'khurram@gmail.com', 'Lorem ipsum dolor sit, amet consectetur adipisicing, elit. Quam quae quasi.', 'approve', 'Saturday 9th of January 2021 10:47:15 PM');
INSERT INTO `comments` VALUES ('7', '2', 'Yaseen', 'yaseen@gmail.com', 'Lorem ipsum dolor sit, amet consectetur adipisicing, elit. Quam quae quasi, ipsam distinctio', 'approve', 'Saturday 9th of January 2021 11:36:47 PM');
INSERT INTO `comments` VALUES ('8', '2', 'Khan', 'khan@gmail.com', 'balah balah balah...', 'unapprove', 'Saturday 9th of January 2021 11:49:32 PM');
INSERT INTO `comments` VALUES ('9', '2', 'Khan', 'khan@gmail.com', 'balah balah balah...', 'unapprove', 'Saturday 9th of January 2021 11:50:13 PM');
INSERT INTO `comments` VALUES ('10', '2', 'Rehman', 'rehman@gmail.com', 'balah balah balah', 'unapprove', 'Saturday 9th of January 2021 11:51:12 PM');
INSERT INTO `comments` VALUES ('11', '2', 'Rehman', 'rehman@gmail.com', 'balah balah balah', 'unapprove', 'Saturday 9th of January 2021 11:52:59 PM');
INSERT INTO `comments` VALUES ('12', '2', 'Ahmed', 'ahmed@gmail.com', 'balah balah balah...', 'unapprove', 'Saturday 9th of January 2021 11:53:20 PM');
INSERT INTO `comments` VALUES ('13', '2', 'Ajmal', 'ajmal@gmail.com', 'balah balah', 'unapprove', 'Saturday 9th of January 2021 11:56:08 PM');
INSERT INTO `comments` VALUES ('14', '8', 'Danish Jawed', 'muhammadraza66786@gmail.com', 'balah balah...', 'unapprove', 'Saturday 9th of January 2021 11:57:02 PM');
INSERT INTO `comments` VALUES ('15', '8', 'Danish Jawed', 'muhammadraza66786@gmail.com', 'balah balah...', 'unapprove', 'Saturday 9th of January 2021 11:57:46 PM');
INSERT INTO `comments` VALUES ('16', '8', 'Danish Jawed', 'muhammadraza66786@gmail.com', 'balah balah...', 'approve', 'Saturday 9th of January 2021 11:57:57 PM');
INSERT INTO `comments` VALUES ('17', '8', 'Danish Jawed', 'muhammadraza66786@gmail.com', 'balah balah...', 'unapprove', 'Saturday 9th of January 2021 11:58:24 PM');
INSERT INTO `comments` VALUES ('19', '9', 'Hafeez', 'hafeez@gmail.com', 'nice!', 'unapprove', 'Sunday 10th of January 2021 12:43:26 AM');
INSERT INTO `comments` VALUES ('20', '9', 'Hafeez', 'hafeez@gmail.com', 'nice!', 'unapprove', 'Sunday 10th of January 2021 12:45:43 AM');
INSERT INTO `comments` VALUES ('21', '9', 'Faizan', 'faizan@gmail.com', 'balah balah...', 'unapprove', 'Sunday 10th of January 2021 12:48:45 AM');
INSERT INTO `comments` VALUES ('22', '9', 'Faizan', 'faizan@gmail.com', 'balah balah...', 'unapprove', 'Sunday 10th of January 2021 12:49:19 AM');
INSERT INTO `comments` VALUES ('23', '9', 'Faizan', 'faizan@gmail.com', 'balah balah...', 'unapprove', 'Sunday 10th of January 2021 12:50:28 AM');
INSERT INTO `comments` VALUES ('24', '10', 'kamal', 'kamal@gmail.com', 'nice!', 'approve', 'Sunday 10th of January 2021 03:01:19 PM');

-- ----------------------------
-- Table structure for `posts`
-- ----------------------------
DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `post_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `post_category_id` int(11) DEFAULT NULL,
  `post_title` varchar(255) DEFAULT NULL,
  `post_author` varchar(255) DEFAULT NULL,
  `post_date` varchar(255) DEFAULT NULL,
  `post_image` varchar(255) DEFAULT NULL,
  `post_content` text DEFAULT NULL,
  `post_tags` varchar(255) DEFAULT NULL,
  `post_comment_count` varchar(255) DEFAULT NULL,
  `post_status` varchar(255) DEFAULT NULL,
  `post_user` varchar(255) DEFAULT NULL,
  `post_view_count` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of posts
-- ----------------------------
INSERT INTO `posts` VALUES ('2', '1', 'Hp Laptop With Official Warranty', 'aahil ahmed', '', '5ffb093eb18bc.jpg', '<p>Lorem ipsum dolor sit, amet consectetur adipisicing, elit. Quam quae quasi, ipsam distinctio enim temporibus odio culpa optio saepe dolor recusandae deleniti sint autem eligendi ex iste quidem? Quibusdam, maxime!Lorem ipsum dolor sit, amet consectetur adipisicing, elit. Quam quae quasi, ipsam distinctio enim temporibus odio culpa optio saepe dolor recusandae deleniti sint autem eligendi ex iste quidem? Quibusdam, maxime!</p>\r\n', 'hp,laptop', '5', 'published', '6', '3');
INSERT INTO `posts` VALUES ('9', '1', 'Hp Laptop with official warranty', 'Rameez Ali', '2021-01-08', '5ffc91ec8430e.jpg', '<p>Lorem ipsum dolor sit, amet consectetur adipisicing, elit. Quam quae quasi, ipsam distinctio enim temporibus odio culpa optio saepe dolor recusandae deleniti sint autem eligendi ex iste quidem? Quibusdam, maxime!Lorem ipsum dolor sit, amet consectetur adipisicing, elit. Quam quae quasi, ipsam distinctio enim temporibus odio culpa optio saepe dolor recusandae deleniti sint autem eligendi ex iste quidem? Quibusdam, maxime!</p>\r\n', 'hp,laptop', '1', 'published', null, '1');
INSERT INTO `posts` VALUES ('10', '1', 'Dell 3545 Core i3 Laptop with Official Warranty', 'Admin', '2021-01-10', '5ffb086cda2eb.jpg', '<p><strong>Dell 3545 Core i3 Laptop with Official Warranty</strong></p>\r\n', 'dell,laptop', '1', 'published', null, '1');
INSERT INTO `posts` VALUES ('11', '18', 'HP 456 Core i5 4GB, 64GB 16\" Display Laptop with Official Warranty', 'Admin', '2021-01-10', '5ffb0e01f39d6.jpg', '<ul>\r\n	<li>HP 456 Core i5 4GB, 64GB 16&quot; Display Laptop with Official Warranty</li>\r\n	<li>HP 456 Core i5 4GB, 64GB 16&quot; Display Laptop with Official Warranty</li>\r\n	<li>HP 456 Core i5 4GB, 64GB 16&quot; Display Laptop with Official Warranty</li>\r\n	<li>HP 456 Core i5 4GB, 64GB 16&quot; Display Laptop with Official WarrantyHP 456 Core i5 4GB, 64GB 16&quot; Display Laptop with Official WarrantyHP 456 Core i5 4GB, 64GB 16&quot; Display Laptop with Official Warranty</li>\r\n	<li>HP 456 Core i5 4GB, 64GB 16&quot; Display Laptop with Official Warranty</li>\r\n</ul>\r\n', 'hp,laptop', null, 'published', null, '1');
INSERT INTO `posts` VALUES ('12', '1', 'Dell 3545 Core i3 Laptop with Official Warranty', 'Admin', '2021-01-10', '5ffb086cda2eb.jpg', '<p><strong>Dell 3545 Core i3 Laptop with Official Warranty</strong></p>\r\n', 'dell,laptop', null, 'published', null, null);
INSERT INTO `posts` VALUES ('13', '1', 'Hp Laptop With Official Warranty', 'aahil ahmed', '', '5ffb093eb18bc.jpg', '<p>Lorem ipsum dolor sit, amet consectetur adipisicing, elit. Quam quae quasi, ipsam distinctio enim temporibus odio culpa optio saepe dolor recusandae deleniti sint autem eligendi ex iste quidem? Quibusdam, maxime!Lorem ipsum dolor sit, amet consectetur adipisicing, elit. Quam quae quasi, ipsam distinctio enim temporibus odio culpa optio saepe dolor recusandae deleniti sint autem eligendi ex iste quidem? Quibusdam, maxime!</p>\r\n', 'hp,laptop', null, 'published', null, null);
INSERT INTO `posts` VALUES ('14', '1', 'Hp Laptop with official warranty', 'Rameez Ali', '2021-01-08', '5ffc91fcaab79.jpg', '<p>Lorem ipsum dolor sit, amet consectetur adipisicing, elit. Quam quae quasi, ipsam distinctio enim temporibus odio culpa optio saepe dolor recusandae deleniti sint autem eligendi ex iste quidem? Quibusdam, maxime!Lorem ipsum dolor sit, amet consectetur adipisicing, elit. Quam quae quasi, ipsam distinctio enim temporibus odio culpa optio saepe dolor recusandae deleniti sint autem eligendi ex iste quidem? Quibusdam, maxime!</p>\r\n', 'hp,laptop', null, 'published', null, '1');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `user_password` varchar(255) DEFAULT NULL,
  `user_first_name` varchar(255) DEFAULT NULL,
  `user_lastname` varchar(255) DEFAULT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `user_image` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `randSalt` varchar(255) DEFAULT '$y22$10thisismyuser',
  `user_date` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'admin', 'admin123', 'Raza', 'Bangi', 'raza@gmail.com', 'pic.jpg', 'admin', null, '5-12-2020');
INSERT INTO `users` VALUES ('2', 'raza', 'raza', 'Muhammad', 'Raza', 'muhammadraza66786@gmail.com', null, 'subscriber', null, 'Saturday 9th of January 2021 06:47:29 PM');
INSERT INTO `users` VALUES ('4', 'ahmed', 'ahmed', 'Ahmed', 'Khan', 'ahmedrauf@gmail.com', null, 'subscriber', null, 'Sunday 10th of January 2021 02:40:50 AM');
INSERT INTO `users` VALUES ('5', 'saeedajmal', 'ajmal', 'Saeed', 'Ajmal', 'saeed@gmail.com', null, 'subscriber', '$y22$10thisismyuser', 'Sunday 10th of January 2021 01:51:23 PM');
INSERT INTO `users` VALUES ('6', 'kamran', 'kamran', null, null, 'kamran@gmail.com', null, 'subscriber', '$y22$10thisismyuser', null);
INSERT INTO `users` VALUES ('7', 'umar', '$1$Yi.o7x8w$Go1uSSSsOZu0/S/z08NxC0', '', '', 'umar@gmail.com', null, 'subscriber', '$y22$10thisismyuser', 'Sunday 10th of January 2021 02:44:05 PM');
INSERT INTO `users` VALUES ('8', 'admin', '$1$cYCgmhfd$tb9UvoiOvE.Gs2cg94J160', 'Kamal', 'Ahmed', 'kamal@gmail.com', null, 'admin', '$y22$10thisismyuser', 'Sunday 10th of January 2021 02:46:23 PM');
INSERT INTO `users` VALUES ('9', 'admin', 'admin789', 'Jamal', 'Ahmed', 'jamal@gmail.com', null, 'admin', '$y22$10thisismyuser', 'Sunday 10th of January 2021 04:58:14 PM');

-- ----------------------------
-- Table structure for `user_online`
-- ----------------------------
DROP TABLE IF EXISTS `user_online`;
CREATE TABLE `user_online` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `session` varchar(255) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_online
-- ----------------------------
INSERT INTO `user_online` VALUES ('1', 'sk4uqfs9som4g42vso08rmtt8t', '1610356385');
