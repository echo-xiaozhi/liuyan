-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2017 年 08 月 13 日 07:26
-- 服务器版本: 5.5.53
-- PHP 版本: 5.4.45

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `liuyan`
--

-- --------------------------------------------------------

--
-- 表的结构 `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `id` int(12) unsigned NOT NULL AUTO_INCREMENT,
  `user_daihao` varchar(255) DEFAULT NULL COMMENT '用户代号',
  `project_id` int(12) NOT NULL COMMENT '项目id',
  `kh_name` varchar(255) NOT NULL COMMENT '姓名',
  `phone` int(13) NOT NULL,
  `info` text COMMENT '留言详细',
  `create_time` int(10) unsigned NOT NULL COMMENT '留言时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- 转存表中的数据 `message`
--

INSERT INTO `message` (`id`, `user_daihao`, `project_id`, `kh_name`, `phone`, `info`, `create_time`) VALUES
(1, '02', 1, '你造吗', 123213213, '规范的三个地方司法', 1502553598),
(2, '02', 11, 'gfsasdf', 12321321, 'fgdsafdsafd', 1502175406),
(3, '02', 11, 'gfsasdf', 12321321, 'fgdsafdsafd', 1502175408),
(4, '02', 11, 'gfsasdf', 12321321, 'fgdsafdsafd', 1502175408),
(5, '02', 11, 'gfsasdf', 12321321, 'fgdsafdsafd', 1502175409),
(6, '02', 11, 'gfsasdf', 12321321, 'fgdsafdsafd', 1502175410),
(7, '02', 11, 'gfsasdf', 12321321, 'fgdsafdsafd', 1502175410),
(8, '02', 11, 'gfsasdf', 12321321, 'fgdsafdsafd', 1502175411),
(9, '04', 5, 'fdsgfds', 2147483647, 'dfsgfdsgfdsfdsafdsa', 1502175436),
(11, '04', 5, 'fdsgfds', 2147483647, 'dfsgfdsgfdsfdsafdsa', 1502175439),
(12, '04', 5, 'fdsgfds', 2147483647, 'dfsgfdsgfdsfdsafdsa', 1502175440),
(13, '04', 5, 'fdsgfds', 2147483647, 'dfsgfdsgfdsfdsafdsa', 1502175440),
(14, '02', 12, 'fdsagfdsa', 12321321, 'dsafdsafdsafdsa', 1502175487),
(15, '02', 12, 'fdsagfdsa', 12321321, 'dsafdsafdsafdsa', 1502175489),
(16, '02', 12, 'fdsagfdsa', 12321321, 'dsafdsafdsafdsa', 1502175490),
(17, '02', 12, 'fdsagfdsa', 12321321, 'dsafdsafdsafdsa', 1502175490),
(18, '02', 12, 'fdsagfdsa', 12321321, 'dsafdsafdsafdsa', 1502175491);

-- --------------------------------------------------------

--
-- 表的结构 `project`
--

CREATE TABLE IF NOT EXISTS `project` (
  `id` int(12) NOT NULL AUTO_INCREMENT COMMENT '项目id',
  `content` varchar(255) NOT NULL COMMENT '项目名称',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- 转存表中的数据 `project`
--

INSERT INTO `project` (`id`, `content`) VALUES
(1, '贝克汉堡'),
(2, '柠檬工坊'),
(3, '排骨大包'),
(4, '致爱丽丝'),
(5, '蒸美味'),
(6, '勾馋'),
(7, '鱼的门'),
(8, '巴比酷'),
(9, '果然爱'),
(10, '馋虾'),
(11, 'Kiumi'),
(12, '芋上我们'),
(13, '七公主'),
(14, '比饺美'),
(15, '炉客比萨'),
(16, '三千茶农'),
(17, '汤烩面'),
(18, '微客泡芙'),
(19, 'BBQ'),
(20, '土豆心愿'),
(21, '无敌鸡排'),
(22, '瓦罐香沸'),
(23, '鱼火火'),
(24, '可素');

-- --------------------------------------------------------

--
-- 表的结构 `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `project_id` int(11) NOT NULL COMMENT '项目id',
  `user_daihao` varchar(4) NOT NULL COMMENT '用户代号',
  `yg_status` int(11) NOT NULL DEFAULT '0' COMMENT '组员状态',
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '主管状态'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `status`
--

INSERT INTO `status` (`project_id`, `user_daihao`, `yg_status`, `status`) VALUES
(1, '02', 0, 1),
(11, '02', 0, 1),
(11, '02', 0, 1),
(11, '02', 0, 1),
(11, '02', 0, 1),
(11, '02', 0, 1),
(11, '02', 0, 1),
(11, '02', 0, 1),
(5, '04', 1, 1),
(5, '04', 1, 1),
(5, '04', 1, 1),
(5, '04', 1, 1),
(5, '04', 1, 1),
(12, '02', 0, 1),
(12, '02', 0, 1),
(12, '02', 0, 1),
(12, '02', 0, 1),
(12, '02', 0, 1);

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(12) NOT NULL AUTO_INCREMENT COMMENT '用户id',
  `pid` int(11) DEFAULT '1' COMMENT '父id',
  `username` varchar(36) NOT NULL COMMENT '用户名',
  `password` varchar(36) NOT NULL COMMENT '密码',
  `daihao` varchar(255) DEFAULT NULL COMMENT '员工代号',
  `name` varchar(10) DEFAULT NULL COMMENT '成员姓名',
  `quanxian` varchar(1) NOT NULL DEFAULT '2' COMMENT '权限',
  `last_login_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '最后登录时间',
  `create_time` int(11) unsigned NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `pid`, `username`, `password`, `daihao`, `name`, `quanxian`, `last_login_time`, `create_time`) VALUES
(1, NULL, 'liucuiyan', 'e10adc3949ba59abbe56e057f20f883e', '01', '刘翠燕', '0', 1502608322, 1502174428),
(2, 1, 'xiaozhi', 'e10adc3949ba59abbe56e057f20f883e', '02', '小智', '1', 1502519679, 1502174820),
(3, 2, 'zhanglong', 'e10adc3949ba59abbe56e057f20f883e', '03', '张龙', '2', 1502174847, 1502174847),
(4, 2, 'zhanhui', 'e10adc3949ba59abbe56e057f20f883e', '04', '展辉', '2', 1502520096, 1502174875),
(5, 1, 'wangxinye', 'e10adc3949ba59abbe56e057f20f883e', '05', '王新野', '1', 1502175033, 1502175033),
(6, 5, 'lihuan', 'e10adc3949ba59abbe56e057f20f883e', '06', '李欢', '2', 1502175055, 1502175055),
(7, 5, 'lijinman', 'e10adc3949ba59abbe56e057f20f883e', '07', '李金曼', '2', 1502175085, 1502175085),
(8, 5, 'kongmengmeng', 'e10adc3949ba59abbe56e057f20f883e', '08', '孔蒙蒙', '2', 1502175112, 1502175112);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
