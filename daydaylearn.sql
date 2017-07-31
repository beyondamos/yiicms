-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2017-07-31 11:30:21
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `daydaylearn`
--

-- --------------------------------------------------------

--
-- 表的结构 `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(256) NOT NULL COMMENT '文章标题',
  `catid` smallint(11) NOT NULL DEFAULT '0' COMMENT '分类id',
  `thumbnail` varchar(255) NOT NULL DEFAULT '' COMMENT '文章题图缩略图',
  `keywords` varchar(255) NOT NULL DEFAULT '' COMMENT '关键词',
  `tag_ids` char(20) NOT NULL DEFAULT '' COMMENT '标签id列表',
  `abstract` varchar(255) NOT NULL DEFAULT '' COMMENT '内容简介、摘要',
  `text` text NOT NULL COMMENT '正文内容',
  `author` varchar(20) NOT NULL DEFAULT '' COMMENT '作者',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '文章状态',
  `createtime` int(11) NOT NULL COMMENT '创建时间',
  `updatetime` int(11) NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='文章表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `auth`
--

CREATE TABLE IF NOT EXISTS `auth` (
  `auth_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '权限id',
  `auth_name` varchar(20) NOT NULL COMMENT '权限名称',
  `parent_id` smallint(5) unsigned NOT NULL COMMENT '父级id',
  `auth_route` varchar(50) NOT NULL COMMENT '权限路由',
  `auth_type` smallint(6) NOT NULL COMMENT '权限类型 1为在左侧显示，2不显示',
  PRIMARY KEY (`auth_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='权限表' AUTO_INCREMENT=15 ;

--
-- 转存表中的数据 `auth`
--

INSERT INTO `auth` (`auth_id`, `auth_name`, `parent_id`, `auth_route`, `auth_type`) VALUES
(1, '信息中心', 0, '', 1),
(2, '文章管理', 1, 'article/index', 1),
(3, '文章添加', 1, 'article/add', 0),
(4, '文章编辑', 1, 'article/edit', 0),
(5, '文章删除', 1, 'article/delete', 0),
(6, '用户管理', 0, '', 1),
(7, '用户管理', 6, 'user/index', 1),
(8, '用户添加', 6, 'user/add', 0),
(9, '用户编辑', 6, 'user/edit', 0),
(10, '用户删除', 6, 'user/delete', 0),
(11, '角色管理', 6, 'role/index', 1),
(12, '角色添加', 6, 'role/add', 0),
(13, '角色编辑', 6, 'role/edit', 0),
(14, '角色删除', 6, 'role/delete', 0);

-- --------------------------------------------------------

--
-- 表的结构 `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '分类id',
  `name` varchar(20) NOT NULL COMMENT '分类名称',
  `parent_id` smallint(5) unsigned NOT NULL COMMENT '上级分类id',
  `introduction` text NOT NULL COMMENT '分类描述',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='分类表' AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `category`
--

INSERT INTO `category` (`id`, `name`, `parent_id`, `introduction`) VALUES
(1, 'PHP', 0, ''),
(2, 'Mysql', 0, '');

-- --------------------------------------------------------

--
-- 表的结构 `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `role_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '角色id',
  `role_name` varchar(20) NOT NULL COMMENT '角色名称',
  `role_desc` varchar(255) NOT NULL COMMENT '角色描述',
  `role_auth` text NOT NULL COMMENT '角色权限列表',
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='角色表' AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `role`
--

INSERT INTO `role` (`role_id`, `role_name`, `role_desc`, `role_auth`) VALUES
(1, '管理员', '拥有所有权限', 'all'),
(2, '信息管理员', '拥有发布编辑信息的权限', '2,3,4,5,7');

-- --------------------------------------------------------

--
-- 表的结构 `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '标签id',
  `tag_name` char(10) NOT NULL COMMENT '标签名称',
  `article_ids` varchar(1024) NOT NULL COMMENT '文章id列表',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='文章标签表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL COMMENT '用户名',
  `password_hash` varchar(100) NOT NULL COMMENT '哈希后的密码',
  `email` varchar(100) NOT NULL COMMENT '邮箱',
  `nickname` char(10) NOT NULL COMMENT '昵称',
  `role_id` tinyint(3) unsigned NOT NULL COMMENT '角色id',
  `createtime` int(11) NOT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`,`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='后台管理员表' AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `username`, `password_hash`, `email`, `nickname`, `role_id`, `createtime`) VALUES
(1, 'chunming', '$2y$13$LRp86ZhZ0f1v/4tgx0yrOu1Yj3oML7gO7yryrwnfg6i4SzAd4.Pni', '328122186@qq.com', '', 1, 1498120185),
(10, '测试用户', '$2y$13$klJsJsZve03FxIIV9sbo4.Q3pCScYEelqvEq/2feESUYjRcEgLv1a', '123489@qq.com', '测试用', 2, 1501211781);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
