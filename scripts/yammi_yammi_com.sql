-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013 年 08 月 17 日 20:05
-- 服务器版本: 5.5.31
-- PHP 版本: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `yammi_yammi_com`
--
CREATE DATABASE IF NOT EXISTS `yammi_yammi_com` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `yammi_yammi_com`;

-- --------------------------------------------------------

--
-- 表的结构 `yy_city`
--

CREATE TABLE IF NOT EXISTS `yy_city` (
  `city_ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `city_name` varchar(30) NOT NULL,
  `parentcity_id` bigint(20) NOT NULL,
  PRIMARY KEY (`city_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `yy_dishes`
--

CREATE TABLE IF NOT EXISTS `yy_dishes` (
  `dish_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `dish_name` varchar(128) NOT NULL,
  `dish_description` varchar(255) NOT NULL,
  `rest_ID` bigint(20) NOT NULL,
  `dish_vegi` tinyint(1) NOT NULL,
  `dish_price` decimal(4,2) NOT NULL,
  `dish_msgfree` tinyint(1) NOT NULL,
  `dish_ingredient` text NOT NULL,
  PRIMARY KEY (`dish_id`),
  KEY `rstr_ID` (`rest_ID`),
  KEY `dish_name` (`dish_name`),
  KEY `dish_name_2` (`dish_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `yy_dish_categories`
--

CREATE TABLE IF NOT EXISTS `yy_dish_categories` (
  `dishCate_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `description` varchar(255) NOT NULL,
  `parent_id` bigint(20) NOT NULL,
  PRIMARY KEY (`dishCate_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `yy_dish_cate_rel`
--

CREATE TABLE IF NOT EXISTS `yy_dish_cate_rel` (
  `dish_id` bigint(20) NOT NULL,
  `cate_id` bigint(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `yy_dish_comment`
--

CREATE TABLE IF NOT EXISTS `yy_dish_comment` (
  `id` bigint(20) NOT NULL,
  `dish_id` bigint(20) DEFAULT NULL,
  `user_id` bigint(20) NOT NULL,
  `score` tinyint(3) NOT NULL,
  `comment` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `yy_menu`
--

CREATE TABLE IF NOT EXISTS `yy_menu` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `rest_id` bigint(20) NOT NULL,
  `name` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `yy_menu_dish`
--

CREATE TABLE IF NOT EXISTS `yy_menu_dish` (
  `dish_id` bigint(20) NOT NULL,
  `menu_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `yy_openHours`
--

CREATE TABLE IF NOT EXISTS `yy_openHours` (
  `rest_ID` bigint(20) NOT NULL,
  `weekDay` tinyint(1) NOT NULL,
  `openTime` time NOT NULL,
  `closeTime` time NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `yy_restaurants`
--

CREATE TABLE IF NOT EXISTS `yy_restaurants` (
  `rest_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `rest_name` varchar(100) NOT NULL,
  `rest_parentRstr` bigint(20) unsigned NOT NULL,
  `rest_city_id` bigint(20) NOT NULL,
  `rest_street` varchar(120) NOT NULL,
  `rest_coordinate` varchar(25) DEFAULT NULL,
  `rest_zipCode` varchar(10) DEFAULT NULL,
  `rest_phone` varchar(20) NOT NULL,
  `rest_website` varchar(256) DEFAULT NULL,
  `rest_description` text NOT NULL,
  `rest_extra` varchar(256) NOT NULL,
  PRIMARY KEY (`rest_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `yy_restaurants`
--

INSERT INTO `yy_restaurants` (`rest_id`, `rest_name`, `rest_parentRstr`, `rest_city_id`, `rest_street`, `rest_coordinate`, `rest_zipCode`, `rest_phone`, `rest_website`, `rest_description`, `rest_extra`) VALUES
(1, '', 0, 0, '', NULL, NULL, '', '', '', '');

-- --------------------------------------------------------

--
-- 表的结构 `yy_rest_categories`
--

CREATE TABLE IF NOT EXISTS `yy_rest_categories` (
  `restcate_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `description` varchar(255) NOT NULL,
  `parent_id` bigint(20) NOT NULL,
  PRIMARY KEY (`restcate_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `yy_rest_cate_rel`
--

CREATE TABLE IF NOT EXISTS `yy_rest_cate_rel` (
  `rest_id` bigint(20) NOT NULL,
  `cate_id` bigint(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `yy_rest_comment`
--

CREATE TABLE IF NOT EXISTS `yy_rest_comment` (
  `id` bigint(20) NOT NULL,
  `rest_id` bigint(20) DEFAULT NULL,
  `user_id` bigint(20) NOT NULL,
  `score` tinyint(3) NOT NULL,
  `comment` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `yy_users`
--

CREATE TABLE IF NOT EXISTS `yy_users` (
  `user_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_name` varchar(60) NOT NULL,
  `user_password` varchar(64) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_registered` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_activation_key` varchar(60) NOT NULL,
  `user_type_id` tinyint(1) NOT NULL,
  `user_status` tinyint(1) NOT NULL,
  `user_firstName` varchar(50) DEFAULT NULL,
  `user_lastName` varchar(50) DEFAULT NULL,
  `user_street` varchar(128) DEFAULT NULL,
  `user_cityId` bigint(20) DEFAULT NULL,
  `user_zip` varchar(10) DEFAULT NULL,
  `user_countryId` bigint(20) DEFAULT NULL,
  `user_phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_name` (`user_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
