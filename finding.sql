-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2017-09-22 16:29:35
-- 服务器版本： 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `finding`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

CREATE TABLE `admin` (
  `id` int(8) NOT NULL,
  `username` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 转存表中的数据 `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- 表的结构 `finder`
--

CREATE TABLE `finder` (
  `id` int(10) UNSIGNED NOT NULL COMMENT '主键，索引根据',
  `username` varchar(24) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '用户名',
  `name` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '拾主姓名',
  `gender` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '性别',
  `contactway` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'QQ/微信/手机号',
  `contact` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '联系方式',
  `thing` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '捡拾物品',
  `class` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '分类',
  `picture` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '物品图片',
  `time` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '捡拾时间',
  `locale` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '捡拾地点',
  `description` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '详细描述'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 转存表中的数据 `finder`
--

INSERT INTO `finder` (`id`, `username`, `name`, `gender`, `contactway`, `contact`, `thing`, `class`, `picture`, `time`, `locale`, `description`) VALUES
(1, 'guest', '陈咬金', '男', 'QQ', '1360000', '钱包', '钱包', 'uploadimg/1506093956.jpg', '2017/8/26', '体育馆', '本人昨天于校羽毛球馆发现一个黑色钱包，里面有大量证件及若干现金，失主看到后请迅速与我联系，核实身份后本人可以归还。'),
(2, 'guest', '妲己', '女', '手机号', '17200000001', '钥匙串', '钥匙', 'uploadimg/1506094218.jpg', '2017/9/16', '益新食堂', '我晚上在益新二楼发现一串钥匙（图片中钥匙已被我取下，用于核实失主身份），请失主看到这条信息后到南6宿舍找我归还，或直接打我手机联系。');

-- --------------------------------------------------------

--
-- 表的结构 `loser`
--

CREATE TABLE `loser` (
  `id` int(10) UNSIGNED NOT NULL COMMENT '主键，索引根据',
  `username` varchar(24) COLLATE utf8_unicode_ci NOT NULL COMMENT '用户名',
  `name` varchar(32) COLLATE utf8_unicode_ci NOT NULL COMMENT '失主姓名',
  `gender` varchar(16) COLLATE utf8_unicode_ci NOT NULL COMMENT '性别',
  `contactway` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'QQ/微信/手机号',
  `contact` varchar(32) COLLATE utf8_unicode_ci NOT NULL COMMENT '联系方式',
  `thing` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT '丢失物品',
  `class` varchar(32) COLLATE utf8_unicode_ci NOT NULL COMMENT '分类',
  `picture` varchar(32) COLLATE utf8_unicode_ci NOT NULL COMMENT '物品图片',
  `time` varchar(16) COLLATE utf8_unicode_ci NOT NULL COMMENT '丢失时间',
  `locale` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT '丢失地点',
  `description` varchar(128) COLLATE utf8_unicode_ci NOT NULL COMMENT '详细描述'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `loser`
--

INSERT INTO `loser` (`id`, `username`, `name`, `gender`, `contactway`, `contact`, `thing`, `class`, `picture`, `time`, `locale`, `description`) VALUES
(27, 'test', '张晓明', '男', 'QQ', '123456789', 'U盘', '数码产品', 'uploadimg/1506076919.jpg', '2017/8/12', '图书馆三楼', '本人昨天于图书馆三楼丢失一个U盘，黑色，金士顿32G，内有大量学习资料和作业文档。希望好心人拾到后能及时归还本人，不胜感激！！'),
(28, 'test', '李晓红', '女', '微信', 'Li_Xiaohong', '雨伞', '生活用品', 'uploadimg/1506078316.jpg', '2017/8/20', 'D楼', '在D楼自习室丢失一把黑色雨伞，上面带有金色花纹，如果有人拿错了请及时和我换回来，谢谢！'),
(30, 'guest', '李丽', '男', '手机号', '18800001111', '学生证', '学生证', 'uploadimg/1506092287.gif', '2017/8/22', '新世纪', '我的学号为1512****，丢失地点在新世纪主干道的大门口附近，希望捡到的同学及时联系我，没有学生证真的很不方便啊！！'),
(31, 'guest', '陈小胜', '男', 'QQ', '23452356', '钥匙串', '钥匙', 'uploadimg/1506092777.jpg', '2017/8/26', '弘基广场', '本人于弘基广场丢失一串钥匙，上面有一三星优盘，请捡到的同学归还我，请你吃饭都行！'),
(32, 'guest', '吴五', '男', '微信', 'F417fsjsfdfj', '钱包', '钱包', 'uploadimg/1506093043.jpg', '2017/8/28', '东区', '本人于东区丢失一个黑色钱包，里面有本人身份证、银行卡等重要证件，现金若干，对本人十分重要。若捡到能及时归还，必当面重谢！！'),
(33, 'guest', '诸葛孔', '男', '手机号', '18800000000', '鼠标', '数码产品', 'uploadimg/1506093342.jpg', '2017/8/29', '图书馆', '本人于今天上午在图书馆五楼遗失一个黑色无线鼠标，望发现的同学及时联系我归还。感谢！！！'),
(34, 'guest', '王昭君', '女', '微信', 'WangZhaojun', '雨伞', '生活用品', 'uploadimg/1506093552.jpg', '2017/8/30', '南区宿舍', '本人在南区食堂三楼自习室遗失一把白色雨伞，具体样式见图片，望发现的同学能及时联系我，十分感谢！！！');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(24) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(24) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `status`) VALUES
(6, 'test1', '123', 1),
(8, 'test2', '123', 1),
(9, 'test3', '123', 1),
(10, 'test4', '123', 1),
(12, 'test5', '123', 1),
(33, 'zxc', 'zxc', 1),
(36, 'guest', 'guest', 1),
(37, 'è¯¾å¤–åª’ä½“', 'kewaimeiti', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `finder`
--
ALTER TABLE `finder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loser`
--
ALTER TABLE `loser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `finder`
--
ALTER TABLE `finder`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '主键，索引根据', AUTO_INCREMENT=3;
--
-- 使用表AUTO_INCREMENT `loser`
--
ALTER TABLE `loser`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '主键，索引根据', AUTO_INCREMENT=35;
--
-- 使用表AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
