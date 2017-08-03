-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2017-08-03 12:53:28
-- 服务器版本： 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `daydaylearn`
--

-- --------------------------------------------------------

--
-- 表的结构 `article`
--

CREATE TABLE `article` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(256) NOT NULL COMMENT '文章标题',
  `catid` smallint(11) NOT NULL DEFAULT '0' COMMENT '分类id',
  `thumbnail` varchar(255) NOT NULL DEFAULT '' COMMENT '文章题图缩略图',
  `keywords` varchar(255) NOT NULL DEFAULT '' COMMENT '关键词',
  `tag_ids` char(20) NOT NULL DEFAULT '' COMMENT '标签id列表',
  `abstract` varchar(255) NOT NULL DEFAULT '' COMMENT '内容简介、摘要',
  `text` text NOT NULL COMMENT '正文内容',
  `author` varchar(20) NOT NULL DEFAULT '' COMMENT '作者',
  `hits` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '点击量',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '文章状态',
  `createtime` int(11) NOT NULL COMMENT '创建时间',
  `updatetime` int(11) NOT NULL COMMENT '更新时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='文章表';

--
-- 转存表中的数据 `article`
--

INSERT INTO `article` (`id`, `title`, `catid`, `thumbnail`, `keywords`, `tag_ids`, `abstract`, `text`, `author`, `hits`, `status`, `createtime`, `updatetime`) VALUES
(1, 'Sublime Text 3 快捷键总结', 6, '/uploads/pictures/201708/20170802110449_23049.jpg', '', '1,2', '以下是经过本人搜集资料，并且逐个测试完毕的快捷键操作命令和方式汇总，希望解放大家的鼠标。', '<h1 style="text-align:center;margin-left:0pt;text-indent:0pt;background:#FFFFFF;">\r\n	Sublime Text 3 快捷键总结\r\n</h1>\r\n<p class="MsoNormal" style="text-indent:21.0000pt;">\r\n	以下是经过本人搜集资料，并且逐个测试完毕的快捷键操作命令和方式汇总，希望解放大家的鼠标。\r\n</p>\r\n<p class="MsoNormal" style="text-indent:21.0000pt;">\r\n	<strong>选择类</strong> \r\n</p>\r\n<p class="MsoNormal">\r\n	&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ctrl+D <span>选中光标所占的文本，继续操作则会选中下一个相同的文本。</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Alt+F3 <span>选中文本按下快捷键，即可一次性选择全部的相同文本进行同时编辑。</span><span>例子</span><span>：快速选中并更改所有相同的变量名、函数名等。</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ctrl+L <span>选中整行，继续操作则继续选择下一行，效果和 </span><span>Shift+↓ </span><span>效果一样。</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ctrl+Shift+L <span>先选中多行，再按下快捷键，会在每行行尾插入光标，即可同时编辑这些行</span><span>（</span><span>按下快捷键后先按下键盘的左右键，再编辑；否则是直接编辑的话是全部删除进行编辑</span>-<span>）</span><span>。</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ctrl+Shift+M <span>选择括号内的内容（继续选择父括号）。</span><span>例子</span><span>：快速选中删除函数中的代码，重写函数体代码或重写括号内里的内容。</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ctrl+M <span>光标移动至括号内结束或开始的位置。</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ctrl+Enter <span>即使光标不在行尾的时候，也可以</span><span>在下一行插入新行</span><span>。</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ctrl+Shift+Enter <span>即使光标不在行尾的时候，也可以再上一行插入新行。&nbsp; &nbsp;&nbsp;</span> <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> <br />\r\n<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ctrl+Shift+[ <span>选中代码，按下快捷键，折叠代码</span> <span>。</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ctrl+Shift+] <span>选中代码，按下快捷键，展开代码。</span></span><br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;Ctrl+K+0 <span>展开所有折叠代码。</span><br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;Ctrl+← <span>向左单位性地移动光标，快速移动光标。</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ctrl+→ <span>向右单位性地移动光标，快速移动光标。</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;shift+↑ <span>向上选中多行。</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;shift+↓ <span>向下选中多行。</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Shift+← <span>向左选中文本。</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Shift+→ <span>向右选中文本。</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ctrl+Shift+← <span>向左单位性地选中文本。</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ctrl+Shift+→ <span>向右单位性地选中文本。</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ctrl+Shift+↑ <span>将光标所在行和上一行代码互换（将光标所在行</span><span>剪切</span><span>到上一行之前）。</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ctrl+Shift+↓ <span>将光标所在行和下一行代码互换（将光标所在行</span><span>剪切</span><span>到下一行之后）。</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ctrl+Alt+↑ <span>向上添加多行光标，可同时编辑多行。</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ctrl+Alt+↓ <span>向下添加多行光标，可同时编辑多行。</span> \r\n</p>\r\n<p class="MsoNormal">\r\n	<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>编辑类</strong></span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ctrl+J <span>合并选中的多行代码为一行。</span><span>例子</span><span>：将多行格式的</span>CSS<span>属性合并为一行。</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ctrl+Shift+D <span>复制光标所在整行，插入到下一行。</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tab <span>向右缩进。</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Shift+Tab <span>向左缩进。</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ctrl+K+K <span>从光标处开始删除代码至行尾。</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ctrl+Shift+K <span>删除整行。</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ctrl+/ <span>注释单行。</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ctrl+Shift+/ <span>注释多行。</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ctrl+K+U <span>转换大写。</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ctrl+K+L <span>转换小写。</span><span>（</span><span>这里按键的动作要快，否则就变成删除代码操作了</span><span>）</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ctrl+Z <span>撤销。</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ctrl+Y <span>恢复撤销。</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ctrl+U <span>软撤销，感觉和 </span><span>Gtrl+Z </span><span>一样。</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ctrl+F2 <span>设置书签</span><span>（</span><span>可以按</span>F2<span>快速回到设置书签的地方</span><span>）</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ctrl+T <span>左右字母互换。</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;F6 <span>单词检测拼写</span> \r\n</p>\r\n<p class="MsoNormal">\r\n	<span>&nbsp; &nbsp; &nbsp; &nbsp;<strong>搜索类</strong></span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ctrl+F <span>打开底部搜索框，查找关键字。</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ctrl+shift+F <span>在文件夹内查找，与普通编辑器不同的地方是</span><span>sublime</span><span>允许添加多个文件夹进行查找</span><span>。</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ctrl+G <span>打开搜索框，自动带：，输入数字跳转到该行代码。</span><span>例子</span><span>：在页面代码比较长的文件中快速定位。</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ctrl+R <span>打开搜索框，自动带</span><span>@</span><span>，输入关键字，查找文件中的函数名。</span><span>例子</span><span>：在函数较多的页面快速查找某个函数。</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ctrl+<span>： 打开搜索框，自动带</span><span>#</span><span>，输入关键字，查找文件中的变量名、属性名等。</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ctrl+Shift+P <span>打开命令框。场景栗子：打开命名框，输入关键字，调用</span><span>sublime text</span><span>或插件的功能，例如使用</span><span>package</span><span>安装插件。</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Esc <span>退出光标多行选择，退出搜索框，命令框等。</span> \r\n</p>\r\n<p class="MsoNormal">\r\n	<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>显示类</strong></span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ctrl+Tab <span>按文件浏览过的顺序，切换当前窗口的标签页。</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ctrl+PageDown <span>向左切换当前窗口的标签页。</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ctrl+PageUp <span>向右切换当前窗口的标签页。</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Alt+Shift+1 <span>窗口分屏，恢复默认</span><span>1</span><span>屏（非小键盘的数字）</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Alt+Shift+2 <span>左右分屏</span><span>-2</span><span>列</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Alt+Shift+3 <span>左右分屏</span><span>-3</span><span>列</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Alt+Shift+4 <span>左右分屏</span><span>-4</span><span>列</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Alt+Shift+5 <span>等分</span><span>4</span><span>屏</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Alt+Shift+8 <span>垂直分屏</span><span>-2</span><span>屏</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Alt+Shift+9 <span>垂直分屏</span><span>-3</span><span>屏</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ctrl+K+B <span>开启</span><span>/</span><span>关闭侧边栏。</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;F11 <span>全屏模式</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Shift+F11 <span>免打扰模式</span> \r\n</p>', '小名叫小明', 0, 1, 1501555436, 1501653161),
(2, 'Yii2.0表单详解', 1, '', '', '3', '', '<h1 style="text-align:center;">\r\n	yii2.0表单详解\r\n</h1>', '小名叫小明', 0, 1, 1501655257, 1501655257);

-- --------------------------------------------------------

--
-- 表的结构 `auth`
--

CREATE TABLE `auth` (
  `auth_id` smallint(5) UNSIGNED NOT NULL COMMENT '权限id',
  `auth_name` varchar(20) NOT NULL COMMENT '权限名称',
  `parent_id` smallint(5) UNSIGNED NOT NULL COMMENT '父级id',
  `auth_route` varchar(50) NOT NULL COMMENT '权限路由',
  `auth_type` smallint(6) NOT NULL COMMENT '权限类型 1为在左侧显示，2不显示'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='权限表';

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

CREATE TABLE `category` (
  `id` smallint(5) UNSIGNED NOT NULL COMMENT '分类id',
  `name` varchar(20) NOT NULL COMMENT '分类名称',
  `parent_id` smallint(5) UNSIGNED NOT NULL COMMENT '上级分类id',
  `introduction` text NOT NULL COMMENT '分类描述'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='分类表';

--
-- 转存表中的数据 `category`
--

INSERT INTO `category` (`id`, `name`, `parent_id`, `introduction`) VALUES
(1, 'PHP', 0, ''),
(2, 'Mysql', 0, ''),
(3, 'Linux', 0, ''),
(4, 'Html', 0, ''),
(5, '网络工具', 0, ''),
(6, '编辑器', 5, '');

-- --------------------------------------------------------

--
-- 表的结构 `nav`
--

CREATE TABLE `nav` (
  `id` smallint(5) UNSIGNED NOT NULL COMMENT '导航id',
  `nav_name` varchar(32) NOT NULL DEFAULT '' COMMENT '导航名称',
  `parent_id` smallint(6) NOT NULL DEFAULT '0' COMMENT '父级导航id',
  `position` tinyint(4) NOT NULL DEFAULT '0' COMMENT '导航位置，1为顶部，2为底部',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '导航状态，是否显示，1为显示，0为不显示'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='导航表';

-- --------------------------------------------------------

--
-- 表的结构 `role`
--

CREATE TABLE `role` (
  `role_id` smallint(5) UNSIGNED NOT NULL COMMENT '角色id',
  `role_name` varchar(20) NOT NULL COMMENT '角色名称',
  `role_desc` varchar(255) NOT NULL COMMENT '角色描述',
  `role_auth` text NOT NULL COMMENT '角色权限列表'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='角色表';

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

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL COMMENT '标签id',
  `tag_name` char(10) NOT NULL COMMENT '标签名称',
  `article_ids` varchar(1024) NOT NULL COMMENT '文章id列表'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='文章标签表';

--
-- 转存表中的数据 `tags`
--

INSERT INTO `tags` (`id`, `tag_name`, `article_ids`) VALUES
(1, 'sublime', '1'),
(2, '编辑器', '1'),
(3, 'yii', '2');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL COMMENT '用户名',
  `password_hash` varchar(100) NOT NULL COMMENT '哈希后的密码',
  `email` varchar(100) NOT NULL COMMENT '邮箱',
  `nickname` char(10) NOT NULL COMMENT '昵称',
  `role_id` tinyint(3) UNSIGNED NOT NULL COMMENT '角色id',
  `createtime` int(11) NOT NULL COMMENT '添加时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='后台管理员表';

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `username`, `password_hash`, `email`, `nickname`, `role_id`, `createtime`) VALUES
(1, 'chunming', '$2y$13$LRp86ZhZ0f1v/4tgx0yrOu1Yj3oML7gO7yryrwnfg6i4SzAd4.Pni', '328122186@qq.com', '小名叫小明', 1, 1498120185),
(10, '测试用户', '$2y$13$klJsJsZve03FxIIV9sbo4.Q3pCScYEelqvEq/2feESUYjRcEgLv1a', '123489@qq.com', '测试用', 2, 1501211781);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`auth_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nav`
--
ALTER TABLE `nav`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`,`email`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `article`
--
ALTER TABLE `article`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 使用表AUTO_INCREMENT `auth`
--
ALTER TABLE `auth`
  MODIFY `auth_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '权限id', AUTO_INCREMENT=15;
--
-- 使用表AUTO_INCREMENT `category`
--
ALTER TABLE `category`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '分类id', AUTO_INCREMENT=7;
--
-- 使用表AUTO_INCREMENT `nav`
--
ALTER TABLE `nav`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '导航id';
--
-- 使用表AUTO_INCREMENT `role`
--
ALTER TABLE `role`
  MODIFY `role_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '角色id', AUTO_INCREMENT=3;
--
-- 使用表AUTO_INCREMENT `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '标签id', AUTO_INCREMENT=4;
--
-- 使用表AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
