-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2018-08-22 15:44:13
-- 服务器版本： 10.2.14-MariaDB-log
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dahuawulitou`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin_role`
--

CREATE TABLE `admin_role` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL COMMENT '角色名称',
  `status` tinyint(1) UNSIGNED DEFAULT 1 COMMENT '状态',
  `remark` varchar(255) DEFAULT NULL COMMENT '备注',
  `create_time` int(11) UNSIGNED NOT NULL DEFAULT 0 COMMENT '创建时间',
  `update_time` int(11) UNSIGNED NOT NULL DEFAULT 0 COMMENT '更新时间',
  `listorder` int(3) NOT NULL DEFAULT 0 COMMENT '排序，优先级，越小优先级越高'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='角色表';

--
-- 转存表中的数据 `admin_role`
--

INSERT INTO `admin_role` (`id`, `name`, `status`, `remark`, `create_time`, `update_time`, `listorder`) VALUES
(1, '超级管理员', 1, '最高管理权的管理员', 1533103855, 1534386447, 1),
(11, '文章管理员', 1, '管理文章的人', 1534470915, 1534470915, 2);

-- --------------------------------------------------------

--
-- 表的结构 `admin_role_rule`
--

CREATE TABLE `admin_role_rule` (
  `id` int(5) NOT NULL,
  `role_id` int(11) UNSIGNED NOT NULL COMMENT '角色',
  `rule_id` varchar(255) NOT NULL COMMENT '权限id'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='权限授权表';

--
-- 转存表中的数据 `admin_role_rule`
--

INSERT INTO `admin_role_rule` (`id`, `role_id`, `rule_id`) VALUES
(1, 1, '25,26,28,27,1,13,17,18,2,12,15,24'),
(5, 11, '25,26,28,27,2,12,15,24');

-- --------------------------------------------------------

--
-- 表的结构 `admin_rule`
--

CREATE TABLE `admin_rule` (
  `id` int(8) UNSIGNED NOT NULL COMMENT '菜单编号',
  `pid` int(11) DEFAULT 0 COMMENT '父级id',
  `type` int(1) NOT NULL DEFAULT 1 COMMENT '类型（1.菜单，2.操作）',
  `title` char(20) DEFAULT '' COMMENT '菜单中文名称',
  `status` tinyint(1) DEFAULT 1 COMMENT '状态：为1正常，为0禁用',
  `condition` char(100) DEFAULT '' COMMENT '规则表达式，为空表示存在就验证，不为空表示按照条件验证',
  `listorder` int(10) DEFAULT 0 COMMENT '排序，优先级，越小优先级越高',
  `create_time` int(11) DEFAULT 0 COMMENT '创建时间',
  `update_time` int(11) DEFAULT 0 COMMENT '更新时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='规则表';

--
-- 转存表中的数据 `admin_rule`
--

INSERT INTO `admin_rule` (`id`, `pid`, `type`, `title`, `status`, `condition`, `listorder`, `create_time`, `update_time`) VALUES
(1, 0, 1, '菜单管理', 1, '', 2, 1533104232, 1533867442),
(2, 0, 1, '角色管理', 1, '', 2, 1533110384, 1533110384),
(12, 2, 2, '新增角色', 1, '', 1, 1533867464, 1533867464),
(13, 1, 2, '新增菜单', 1, '', 1, 1533868203, 1533868437),
(15, 2, 2, '编辑角色', 1, '', 2, 1533877892, 1533877892),
(17, 1, 2, '编辑菜单', 1, '', 2, 1533877932, 1533877932),
(18, 1, 2, '删除菜单', 1, '', 3, 1533877939, 1533877939),
(24, 2, 2, '删除角色', 1, '', 3, 1533888939, 1533888939),
(25, 0, 1, '后台用户管理', 1, '', 0, 1533889189, 1533889193),
(26, 25, 2, '添加用户', 1, '', 1, 1533889208, 1533889208),
(27, 25, 2, '删除用户', 1, '', 3, 1533889216, 1533889226),
(28, 25, 2, '编辑用户', 1, '', 2, 1533889240, 1533889240);

-- --------------------------------------------------------

--
-- 表的结构 `admin_user`
--

CREATE TABLE `admin_user` (
  `id` int(10) NOT NULL COMMENT '用户id',
  `username` varchar(50) NOT NULL COMMENT '用户名',
  `password` varchar(100) NOT NULL COMMENT '密码',
  `nickname` varchar(50) NOT NULL COMMENT '昵称',
  `mobile` varchar(50) NOT NULL COMMENT '手机号',
  `email` varchar(50) NOT NULL COMMENT '邮箱',
  `avatar` varchar(255) NOT NULL COMMENT '头像',
  `role` int(1) NOT NULL COMMENT '角色',
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '状态',
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `last_login_ip` varchar(16) NOT NULL DEFAULT '127.0.0.1' COMMENT '最后登陆ip',
  `last_login_time` int(11) DEFAULT 0 COMMENT '最后登陆时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `admin_user`
--

INSERT INTO `admin_user` (`id`, `username`, `password`, `nickname`, `mobile`, `email`, `avatar`, `role`, `status`, `create_time`, `update_time`, `last_login_ip`, `last_login_time`) VALUES
(16, 'admin123', '0192023a7bbd73250516f069df18b500', 'ivIew', '13999999999', '13999999999@qq.com', '/uploads/avatar/20180822/bab57a537a24e779c183cf0718f29fb2.jpg', 1, 1, 1534923652, 1534923652, '127.0.0.1', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_role`
--
ALTER TABLE `admin_role`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `admin_role_rule`
--
ALTER TABLE `admin_role_rule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_rule`
--
ALTER TABLE `admin_rule`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`);

--
-- Indexes for table `admin_user`
--
ALTER TABLE `admin_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username_2` (`username`),
  ADD UNIQUE KEY `mobile` (`mobile`,`email`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `admin_role`
--
ALTER TABLE `admin_role`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- 使用表AUTO_INCREMENT `admin_role_rule`
--
ALTER TABLE `admin_role_rule`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 使用表AUTO_INCREMENT `admin_rule`
--
ALTER TABLE `admin_rule`
  MODIFY `id` int(8) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '菜单编号', AUTO_INCREMENT=29;

--
-- 使用表AUTO_INCREMENT `admin_user`
--
ALTER TABLE `admin_user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '用户id', AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
