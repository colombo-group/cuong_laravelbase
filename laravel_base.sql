/*
Navicat MySQL Data Transfer

Source Server         : Homestead
Source Server Version : 50717
Source Host           : 192.168.10.10:3306
Source Database       : laravel_base

Target Server Type    : MYSQL
Target Server Version : 50717
File Encoding         : 65001

Date: 2017-07-13 11:46:39
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `migrations`
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('1', '2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('2', '2014_10_12_100000_create_password_resets_table', '1');

-- ----------------------------
-- Table structure for `password_resets`
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `sex` tinyint(4) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `slogan` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'Lê Cường', 'lecuong732@gmail.com', '$2y$10$HlhMXmxHhR/Jzb6cZ29PZuxKKqZAxjSogxA9kHAE5PMpABk4pEujK', '1', '2017-07-29', 'hà tây', 'như vậy nhé', '4zn60ekmKMzyhkuOQokELQLQx6otbjkunP8Sosrmzn6t967CQRsPNYQ3cA1L', '2017-07-12 09:26:47', '2017-07-13 09:39:53');
INSERT INTO `users` VALUES ('2', 'abc', 'avc@gmail.com', '$2y$10$ZNxuTVcIhitUfvywOjnVbuF7oszSE8wCHUwQBy7C4ZrG6DbbrJU4m', null, null, null, null, null, '2017-07-12 12:07:43', '2017-07-12 12:07:43');
INSERT INTO `users` VALUES ('3', 'lecuong', 'lecuong123@gmail.com', '$2y$10$gCwhgl.xFEyuuY3IYiGN8.9PyRNzHw2Buqs9Qz35.VHou4IVijlJe', null, null, null, null, 'rDOb3mIdqnASmN4AdveCmdxjjeawZmxkJkZfh1ZH0yGfSJn5l5pG4WahrNRa', '2017-07-12 22:31:11', '2017-07-12 22:31:11');
INSERT INTO `users` VALUES ('4', 'xyz', 'xyz@gmail.com', '$2y$10$B9IRFpkGMhLIN0nLHDCurepuwUikTItgLCR.IYVFbecZjqVbOXSY6', null, null, null, null, 'fUpmQkpiPabWqbRzr0OvhNGW74B0KluMfsAo54GxktYTtyhRaKx42kglJd7x', '2017-07-12 22:31:47', '2017-07-12 22:31:47');
INSERT INTO `users` VALUES ('5', 'qaz', 'qaz@gmail.com', '$2y$10$ZJN.9BsDJmVXGjUW3qiPkezg0Sdfrmk4Ngfh8KFSs6eHTC5BvuDZe', null, null, null, null, 'bB2NThKoF61KAdTyZbpasqSM2MO1gO5vm1QBppyvJSceF7TzvhCzWuFXn9En', '2017-07-12 22:32:59', '2017-07-12 22:32:59');
INSERT INTO `users` VALUES ('6', 'plm', 'plm@gmail.com', '$2y$10$3YTUOuA3oxnLJng4HodWBO1HR1omU/.AegJpHyc1FHrrY5P2WSKkq', null, null, null, null, 'czn1MO6lXasVjYY4Sdzb8wNHt2HbE7LMuFWifQLkbkwxxwXbDxRBps6r6OHU', '2017-07-12 22:35:10', '2017-07-12 22:35:10');
