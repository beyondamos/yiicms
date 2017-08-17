-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2017 �?08 �?17 �?09:19
-- 服务器版本: 5.5.53
-- PHP 版本: 5.6.27

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `daydaylearn`
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
  `hits` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '点击量',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '文章状态',
  `createtime` int(11) NOT NULL COMMENT '创建时间',
  `updatetime` int(11) NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='文章表' AUTO_INCREMENT=10 ;

--
-- 转存表中的数据 `article`
--

INSERT INTO `article` (`id`, `title`, `catid`, `thumbnail`, `keywords`, `tag_ids`, `abstract`, `text`, `author`, `hits`, `status`, `createtime`, `updatetime`) VALUES
(1, 'Sublime Text 3 快捷键总结', 6, '/uploads/pictures/201708/20170802110449_23049.jpg', '', '1,2', '以下是经过本人搜集资料，并且逐个测试完毕的快捷键操作命令和方式汇总，希望解放大家的鼠标。', '<h1 style="text-align:center;margin-left:0pt;text-indent:0pt;background:#FFFFFF;">\r\n	Sublime Text 3 快捷键总结\r\n</h1>\r\n<p class="MsoNormal" style="text-indent:21.0000pt;">\r\n	以下是经过本人搜集资料，并且逐个测试完毕的快捷键操作命令和方式汇总，希望解放大家的鼠标。\r\n</p>\r\n<p class="MsoNormal" style="text-indent:21.0000pt;">\r\n	<strong>选择类</strong> \r\n</p>\r\n<p class="MsoNormal">\r\n	&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ctrl+D <span>选中光标所占的文本，继续操作则会选中下一个相同的文本。</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Alt+F3 <span>选中文本按下快捷键，即可一次性选择全部的相同文本进行同时编辑。</span><span>例子</span><span>：快速选中并更改所有相同的变量名、函数名等。</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ctrl+L <span>选中整行，继续操作则继续选择下一行，效果和 </span><span>Shift+↓ </span><span>效果一样。</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ctrl+Shift+L <span>先选中多行，再按下快捷键，会在每行行尾插入光标，即可同时编辑这些行</span><span>（</span><span>按下快捷键后先按下键盘的左右键，再编辑；否则是直接编辑的话是全部删除进行编辑</span>-<span>）</span><span>。</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ctrl+Shift+M <span>选择括号内的内容（继续选择父括号）。</span><span>例子</span><span>：快速选中删除函数中的代码，重写函数体代码或重写括号内里的内容。</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ctrl+M <span>光标移动至括号内结束或开始的位置。</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ctrl+Enter <span>即使光标不在行尾的时候，也可以</span><span>在下一行插入新行</span><span>。</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ctrl+Shift+Enter <span>即使光标不在行尾的时候，也可以再上一行插入新行。&nbsp; &nbsp;&nbsp;</span> <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> <br />\r\n<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ctrl+Shift+[ <span>选中代码，按下快捷键，折叠代码</span> <span>。</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ctrl+Shift+] <span>选中代码，按下快捷键，展开代码。</span></span><br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;Ctrl+K+0 <span>展开所有折叠代码。</span><br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;Ctrl+← <span>向左单位性地移动光标，快速移动光标。</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ctrl+→ <span>向右单位性地移动光标，快速移动光标。</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;shift+↑ <span>向上选中多行。</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;shift+↓ <span>向下选中多行。</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Shift+← <span>向左选中文本。</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Shift+→ <span>向右选中文本。</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ctrl+Shift+← <span>向左单位性地选中文本。</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ctrl+Shift+→ <span>向右单位性地选中文本。</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ctrl+Shift+↑ <span>将光标所在行和上一行代码互换（将光标所在行</span><span>剪切</span><span>到上一行之前）。</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ctrl+Shift+↓ <span>将光标所在行和下一行代码互换（将光标所在行</span><span>剪切</span><span>到下一行之后）。</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ctrl+Alt+↑ <span>向上添加多行光标，可同时编辑多行。</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ctrl+Alt+↓ <span>向下添加多行光标，可同时编辑多行。</span> \r\n</p>\r\n<p class="MsoNormal">\r\n	<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>编辑类</strong></span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ctrl+J <span>合并选中的多行代码为一行。</span><span>例子</span><span>：将多行格式的</span>CSS<span>属性合并为一行。</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ctrl+Shift+D <span>复制光标所在整行，插入到下一行。</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tab <span>向右缩进。</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Shift+Tab <span>向左缩进。</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ctrl+K+K <span>从光标处开始删除代码至行尾。</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ctrl+Shift+K <span>删除整行。</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ctrl+/ <span>注释单行。</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ctrl+Shift+/ <span>注释多行。</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ctrl+K+U <span>转换大写。</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ctrl+K+L <span>转换小写。</span><span>（</span><span>这里按键的动作要快，否则就变成删除代码操作了</span><span>）</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ctrl+Z <span>撤销。</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ctrl+Y <span>恢复撤销。</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ctrl+U <span>软撤销，感觉和 </span><span>Gtrl+Z </span><span>一样。</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ctrl+F2 <span>设置书签</span><span>（</span><span>可以按</span>F2<span>快速回到设置书签的地方</span><span>）</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ctrl+T <span>左右字母互换。</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;F6 <span>单词检测拼写</span> \r\n</p>\r\n<p class="MsoNormal">\r\n	<span>&nbsp; &nbsp; &nbsp; &nbsp;<strong>搜索类</strong></span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ctrl+F <span>打开底部搜索框，查找关键字。</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ctrl+shift+F <span>在文件夹内查找，与普通编辑器不同的地方是</span><span>sublime</span><span>允许添加多个文件夹进行查找</span><span>。</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ctrl+G <span>打开搜索框，自动带：，输入数字跳转到该行代码。</span><span>例子</span><span>：在页面代码比较长的文件中快速定位。</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ctrl+R <span>打开搜索框，自动带</span><span>@</span><span>，输入关键字，查找文件中的函数名。</span><span>例子</span><span>：在函数较多的页面快速查找某个函数。</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ctrl+<span>： 打开搜索框，自动带</span><span>#</span><span>，输入关键字，查找文件中的变量名、属性名等。</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ctrl+Shift+P <span>打开命令框。场景栗子：打开命名框，输入关键字，调用</span><span>sublime text</span><span>或插件的功能，例如使用</span><span>package</span><span>安装插件。</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Esc <span>退出光标多行选择，退出搜索框，命令框等。</span> \r\n</p>\r\n<p class="MsoNormal">\r\n	<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>显示类</strong></span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ctrl+Tab <span>按文件浏览过的顺序，切换当前窗口的标签页。</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ctrl+PageDown <span>向左切换当前窗口的标签页。</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ctrl+PageUp <span>向右切换当前窗口的标签页。</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Alt+Shift+1 <span>窗口分屏，恢复默认</span><span>1</span><span>屏（非小键盘的数字）</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Alt+Shift+2 <span>左右分屏</span><span>-2</span><span>列</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Alt+Shift+3 <span>左右分屏</span><span>-3</span><span>列</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Alt+Shift+4 <span>左右分屏</span><span>-4</span><span>列</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Alt+Shift+5 <span>等分</span><span>4</span><span>屏</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Alt+Shift+8 <span>垂直分屏</span><span>-2</span><span>屏</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Alt+Shift+9 <span>垂直分屏</span><span>-3</span><span>屏</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ctrl+K+B <span>开启</span><span>/</span><span>关闭侧边栏。</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;F11 <span>全屏模式</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Shift+F11 <span>免打扰模式</span> \r\n</p>', '小名叫小明', 0, 1, 1501555436, 1501653161),
(2, 'Yii2.0表单详解', 1, '', '', '3', '', '<h1 style="text-align:center;">\r\n	yii2.0表单详解\r\n</h1>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	备注：1、action属性不要设置，这样就默认使用当前请求的URL，自带有参数。这样控制器里通过获取id参数来实例化模型的代码只需要写一遍。\r\n</p>', '小名叫小明', 0, 1, 1501655257, 1502267525),
(3, 'Yii2.0视图详解', 1, '', '', '3', '', '<h1 style="text-align:center;">\r\n	Yii2.0视图详解\r\n</h1>', '小名叫小明', 0, 1, 1502176961, 1502176961),
(4, 'Yii2.0 URL美化', 1, '', '', '3', '', '<h1 style="text-align:center;">\r\n	Yii2.0 URL美化\r\n</h1>\r\n<p>\r\n	这里就拿yii2.0的basic版本举例子。\r\n</p>\r\n<p>\r\n	1、首先得在配置文件中启用配置。在config下的web.php中，components组件下添加 urlManager的配置。一般情况下，代码已经存在，只是被注释了，解开注释即可。\r\n</p>\r\n<pre class="prettyprint lang-php">        ''urlManager'' =&gt; [\r\n            ''enablePrettyUrl'' =&gt; true, //是否启用美化URL\r\n            ''suffix'' =&gt; ''.html'',    //URL后缀\r\n            ''showScriptName'' =&gt; false,  //是否显示脚本名字 index.php\r\n            ''rules'' =&gt; [\r\n            	''/blogs'' =&gt; ''/blog/index'',   //将 /blogs 路由映射到 /blog/index 路由上 \r\n            	''/blogs/&lt;id:\\d+&gt;'' =&gt; ''/blog/view'',     //可以将 /bolgs/1 路由映射到 /blog/view?id=1 路由上\r\n            	''&lt;controller:\\w+&gt;/&lt;id:\\d+&gt;'' =&gt; ''&lt;controller&gt;/view'', //将所有的 controller/id 映射到 controller/view 上\r\n            	''&lt;controller:\\w+&gt;/&lt;action:\\w+&gt;'' =&gt; ''&lt;controller&gt;/&lt;action&gt;'', \r\n\r\n            ],  //包含URL匹配规则的列表\r\n        ],</pre>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	2、如果使用URL美化功能，那么整站的URL必须使用 URL工具类来实现，否则会造成不必要的麻烦。\r\n</p>', '小名叫小明', 0, 1, 1502177009, 1502780685),
(5, 'PHP完善的分页类', 1, '', '', '', '', '<h1 style="text-align:center;">\r\n	PHP完善的分页类\r\n</h1>', '小名叫小明', 0, 1, 1502177072, 1502177072),
(6, 'PHP文件上传类', 1, '', '', '', '', '<h1 style="text-align:center;">\r\n	PHP文件上传类\r\n</h1>', '小名叫小明', 0, 1, 1502177103, 1502177103),
(7, 'Mysql优化指南', 2, '', '', '', '', '<h1 style="text-align:center;">\r\n	Mysql优化指南\r\n</h1>', '小名叫小明', 0, 1, 1502177140, 1502177140),
(8, 'Sublime Text 3 插件推荐', 6, '', '', '1,2', '', '<h1 style="text-align:center;">\r\n	Sublime Text 3 插件推荐\r\n</h1>', '小名叫小明', 0, 1, 1502177179, 1502353134),
(9, 'Yii2.0 Sessions 和 Cookies 的基本使用方法', 1, '', '', '3', '', '<h1 style="text-align:center;">\r\n	Yii2.0 Sessions 和 Cookies 的基本使用方法\r\n</h1>\r\n<p>\r\n	在纯PHP中，分别使用全局变量 $_SESSION 和 $_COOKIE 来访问，Yii 将 session 和 cookie 封装成对象并增加了一些功能，可通过面向对象方式访问它们。\r\n</p>\r\n<h2>\r\n	session\r\n</h2>\r\n<p>\r\n	和请求和相应类似，默认可通过 yii\\web\\Session 实例的 session 应用组件来访问 sessions.\r\n</p>\r\n<h3>\r\n	开启和关闭session\r\n</h3>\r\n<p>\r\n	可使用以下代码来开启和关闭session。\r\n</p>\r\n<pre class="prettyprint lang-php">$session = Yii::$app-&gt;session;\r\n\r\n// 检查session是否开启 \r\nif ($session-&gt;isActive) ...\r\n\r\n// 开启session\r\n$session-&gt;open();\r\n\r\n// 关闭session\r\n$session-&gt;close();\r\n\r\n// 销毁session中所有已注册的数据\r\n$session-&gt;destroy();</pre>\r\n<p>\r\n	多次调用open() 和close() 方法并不会产生错误， 因为方法内部会先检查session是否已经开启。\r\n</p>\r\n<h3>\r\n	访问Session数据\r\n</h3>\r\n可使用如下方式访问session中的数据：\r\n<pre class="prettyprint lang-php">$session = Yii::$app-&gt;session;\r\n\r\n// 获取session中的变量值，以下用法是相同的：\r\n$language = $session-&gt;get(''language'');\r\n$language = $session[''language''];\r\n$language = isset($_SESSION[''language'']) ? $_SESSION[''language''] : null;\r\n\r\n// 设置一个session变量，以下用法是相同的：\r\n$session-&gt;set(''language'', ''en-US'');\r\n$session[''language''] = ''en-US'';\r\n$_SESSION[''language''] = ''en-US'';\r\n\r\n// 删除一个session变量，以下用法是相同的：\r\n$session-&gt;remove(''language'');\r\nunset($session[''language'']);\r\nunset($_SESSION[''language'']);\r\n\r\n// 检查session变量是否已存在，以下用法是相同的：\r\nif ($session-&gt;has(''language'')) ...\r\nif (isset($session[''language''])) ...\r\nif (isset($_SESSION[''language''])) ...\r\n\r\n// 遍历所有session变量，以下用法是相同的：\r\nforeach ($session as $name =&gt; $value) ...\r\nforeach ($_SESSION as $name =&gt; $value) ...</pre>\r\n<p>\r\n	注意: 当使用session组件访问session数据时候， 如果session没有开启会自动开启， 这和通过$_SESSION不同，$_SESSION要求先执行session_start()。\r\n</p>\r\n<p>\r\n	当session数据为数组时，session组件会限制你直接修改数据中的单元项， 例如：\r\n</p>\r\n<pre class="prettyprint lang-php">$session = Yii::$app-&gt;session;\r\n\r\n// 如下代码不会生效\r\n$session[''captcha''][''number''] = 5;\r\n$session[''captcha''][''lifetime''] = 3600;\r\n\r\n// 如下代码会生效：\r\n$session[''captcha''] = [\r\n    ''number'' =&gt; 5,\r\n    ''lifetime'' =&gt; 3600,\r\n];\r\n\r\n// 如下代码也会生效：\r\necho $session[''captcha''][''lifetime''];</pre>\r\n可使用以下任意一个变通方法来解决这个问题：\r\n<p>\r\n	<br />\r\n</p>\r\n<pre class="prettyprint lang-php">$session = Yii::$app-&gt;session;\r\n\r\n// 直接使用$_SESSION (确保Yii::$app-&gt;session-&gt;open() 已经调用)\r\n$_SESSION[''captcha''][''number''] = 5;\r\n$_SESSION[''captcha''][''lifetime''] = 3600;\r\n\r\n// 先获取session数据到一个数组，修改数组的值，然后保存数组到session中\r\n$captcha = $session[''captcha''];\r\n$captcha[''number''] = 5;\r\n$captcha[''lifetime''] = 3600;\r\n$session[''captcha''] = $captcha;\r\n\r\n// 使用ArrayObject 数组对象代替数组\r\n$session[''captcha''] = new \\ArrayObject;\r\n...\r\n$session[''captcha''][''number''] = 5;\r\n$session[''captcha''][''lifetime''] = 3600;\r\n\r\n// 使用带通用前缀的键来存储数组\r\n$session[''captcha.number''] = 5;\r\n$session[''captcha.lifetime''] = 3600;</pre>\r\n<p>\r\n	为更好的性能和可读性，推荐最后一种方案， 也就是不用存储session变量为数组， 而是将每个数组项变成有相同键前缀的session变量。\r\n</p>\r\n<h2>\r\n	Flash 数据\r\n</h2>\r\n<p>\r\n	Flash数据是一种特别的session数据，它一旦在某个请求中设置后， 只会在下次请求中有效，然后该数据就会自动被删除。 常用于实现只需显示给终端用户一次的信息， 如用户提交一个表单后显示确认信息。<br />\r\n<br />\r\n可通过session应用组件设置或访问session，例如：\r\n</p>\r\n<pre class="prettyprint lang-php">$session = Yii::$app-&gt;session;\r\n\r\n// 请求 #1\r\n// 设置一个名为"postDeleted" flash 信息\r\n$session-&gt;setFlash(''postDeleted'', ''You have successfully deleted your post.'');\r\n\r\n// 请求 #2\r\n// 显示名为"postDeleted" flash 信息\r\necho $session-&gt;getFlash(''postDeleted'');\r\n\r\n// 请求 #3\r\n// $result 为 false，因为flash信息已被自动删除\r\n$result = $session-&gt;hasFlash(''postDeleted'');</pre>\r\n和普通session数据类似，可将任意数据存储为flash数据。<br />\r\n<br />\r\n当调用yii\\web\\Session::setFlash()时, 会自动覆盖相同名的已存在的任何数据， 为将数据追加到已存在的相同名flash中，可改为调用yii\\web\\Session::addFlash()。 例如:<br />\r\n<pre class="prettyprint lang-php">$session = Yii::$app-&gt;session;\r\n\r\n// 请求 #1\r\n// 在名称为"alerts"的flash信息增加数据\r\n$session-&gt;addFlash(''alerts'', ''You have successfully deleted your post.'');\r\n$session-&gt;addFlash(''alerts'', ''You have successfully added a new friend.'');\r\n$session-&gt;addFlash(''alerts'', ''You are promoted.'');\r\n\r\n// 请求 #2\r\n// $alerts 为名为''alerts''的flash信息，为数组格式\r\n$alerts = $session-&gt;getFlash(''alerts'');</pre>\r\n注意: 不要在相同名称的flash数据中使用yii\\web\\Session::setFlash() 的同时也使用yii\\web\\Session::addFlash()， 因为后一个防范会自动将flash信息转换为数组以使新的flash数据可追加进来，因此， 当你调用yii\\web\\Session::getFlash()时， 会发现有时获取到一个数组，有时获取到一个字符串， 取决于你调用这两个方法的顺序。\r\n<p>\r\n	<br />\r\n</p>\r\n<h2>\r\n	Cookies\r\n</h2>\r\n<p>\r\n	Yii使用 yii\\web\\Cookie对象来代表每个cookie，yii\\web\\Request 和 yii\\web\\Response 通过名为''cookies''的属性维护一个cookie集合， 前者的cookie 集合代表请求提交的cookies， 后者的cookie集合表示发送给用户的cookies。\r\n</p>\r\n<p>\r\n	<h3>\r\n		读取 Cookies\r\n	</h3>\r\n当前请求的cookie信息可通过如下代码获取：<br />\r\n<pre class="prettyprint lang-php">// 从 "request"组件中获取cookie集合(yii\\web\\CookieCollection)\r\n$cookies = Yii::$app-&gt;request-&gt;cookies;\r\n\r\n// 获取名为 "language" cookie 的值，如果不存在，返回默认值"en"\r\n$language = $cookies-&gt;getValue(''language'', ''en'');\r\n\r\n// 另一种方式获取名为 "language" cookie 的值\r\nif (($cookie = $cookies-&gt;get(''language'')) !== null) {\r\n    $language = $cookie-&gt;value;\r\n}\r\n\r\n// 可将 $cookies当作数组使用\r\nif (isset($cookies[''language''])) {\r\n    $language = $cookies[''language'']-&gt;value;\r\n}\r\n\r\n// 判断是否存在名为"language" 的 cookie\r\nif ($cookies-&gt;has(''language'')) ...\r\nif (isset($cookies[''language''])) ...</pre>\r\n	<h3>\r\n		发送 Cookies\r\n	</h3>\r\n可使用如下代码发送cookie到终端用户：<br />\r\n<pre class="prettyprint lang-php">// 从"response"组件中获取cookie 集合(yii\\web\\CookieCollection)\r\n$cookies = Yii::$app-&gt;response-&gt;cookies;\r\n\r\n// 在要发送的响应中添加一个新的cookie\r\n$cookies-&gt;add(new \\yii\\web\\Cookie([\r\n    ''name'' =&gt; ''language'',\r\n    ''value'' =&gt; ''zh-CN'',\r\n]));\r\n\r\n// 删除一个cookie\r\n$cookies-&gt;remove(''language'');\r\n// 等同于以下删除代码\r\nunset($cookies[''language'']);</pre>\r\n除了上述例子定义的 name 和 value 属性 yii\\web\\Cookie 类也定义了其他属性来实现cookie的各种信息，如 domain, expire 可配置这些属性到cookie中并添加到响应的cookie集合中。\r\n</p>\r\n<h3>\r\n	Cookie验证\r\n</h3>\r\n<p>\r\n	在上两节中，当通过request 和 response 组件读取和发送cookie时， 你会喜欢扩展的cookie验证的保障安全功能，它能 使cookie不被客户端修改。该功能通过给每个cookie签发一个 哈希字符串来告知服务端cookie是否在客户端被修改， 如果被修改，通过request组件的yii\\web\\Request::cookiescookie集合访问不到该cookie。\r\n</p>\r\n<p>\r\n	Cookie验证默认启用，可以设置yii\\web\\Request::$enableCookieValidation属性为false来禁用它， 尽管如此，我们强烈建议启用它。\r\n</p>\r\n<p>\r\n	注意: 直接通过$_COOKIE 和 setcookie() 读取和发送的Cookie不会被验证。\r\n</p>\r\n<p>\r\n	当使用cookie验证，必须指定yii\\web\\Request::$cookieValidationKey，它是用来生成s上述的哈希值， 可通过在应用配置中配置request 组件。\r\n<pre class="prettyprint lang-php">return [\r\n    ''components'' =&gt; [\r\n        ''request'' =&gt; [\r\n            ''cookieValidationKey'' =&gt; ''fill in a secret key here'',\r\n        ],\r\n    ],\r\n];</pre>\r\n</p>', '小名叫小明', 0, 1, 1502953179, 1502960222);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='分类表' AUTO_INCREMENT=7 ;

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

CREATE TABLE IF NOT EXISTS `nav` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '导航id',
  `nav_name` varchar(32) NOT NULL DEFAULT '' COMMENT '导航名称',
  `parent_id` smallint(6) NOT NULL DEFAULT '0' COMMENT '父级导航id',
  `nav_url` varchar(256) NOT NULL COMMENT '导航地址URL',
  `sort` tinyint(4) NOT NULL DEFAULT '50' COMMENT '导航排序',
  `is_blank` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否新窗口，1为新窗口，0为本页面',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '导航状态，是否显示，1为显示，0为不显示',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='导航表' AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `nav`
--

INSERT INTO `nav` (`id`, `nav_name`, `parent_id`, `nav_url`, `sort`, `is_blank`, `status`) VALUES
(1, '首页', 0, 'http://www.baidu.com', 50, 0, 1),
(2, 'PHP', 0, 'http://www.baidu.com', 50, 0, 1),
(3, 'YII', 2, 'http://www.baidu.com', 40, 0, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='角色表' AUTO_INCREMENT=3 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='文章标签表' AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `tags`
--

INSERT INTO `tags` (`id`, `tag_name`, `article_ids`) VALUES
(1, 'sublime', '1,8'),
(2, '编辑器', '1,8'),
(3, 'yii', '2,3,4,9');

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
(1, 'chunming', '$2y$13$LRp86ZhZ0f1v/4tgx0yrOu1Yj3oML7gO7yryrwnfg6i4SzAd4.Pni', '328122186@qq.com', '小名叫小明', 1, 1498120185),
(10, '测试用户', '$2y$13$klJsJsZve03FxIIV9sbo4.Q3pCScYEelqvEq/2feESUYjRcEgLv1a', '123489@qq.com', '测试用', 2, 1501211781);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
