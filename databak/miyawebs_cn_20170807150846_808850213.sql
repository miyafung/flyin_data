/* This file is created by MySQLReback 2017-08-07 15:08:46 */
 /* 创建表结构 `flyin_admin` */
 DROP TABLE IF EXISTS `flyin_admin`;/* MySQLReback Separation */ CREATE TABLE `flyin_admin` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(10) NOT NULL COMMENT '用户名',
  `password` char(32) NOT NULL COMMENT '密码',
  `salt` char(6) NOT NULL COMMENT '密钥',
  `ip` varchar(255) NOT NULL,
  `lasttime` mediumint(9) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `flyin_admin` */
 INSERT INTO `flyin_admin` VALUES ('1','admin','56802b0058be8a26bd633d5f46760dfb','ItcAst','','0','0');/* MySQLReback Separation */
 /* 创建表结构 `flyin_bannercategory` */
 DROP TABLE IF EXISTS `flyin_bannercategory`;/* MySQLReback Separation */ CREATE TABLE `flyin_bannercategory` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL COMMENT '分类名',
  `pid` int(10) unsigned NOT NULL COMMENT '父分类ID',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `flyin_bannercategory` */
 INSERT INTO `flyin_bannercategory` VALUES ('4','首页大广告图','0'),('6','合作伙伴','0'),('7','tes','4');/* MySQLReback Separation */
 /* 创建表结构 `flyin_banners` */
 DROP TABLE IF EXISTS `flyin_banners`;/* MySQLReback Separation */ CREATE TABLE `flyin_banners` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bannercategory_id` int(10) unsigned NOT NULL COMMENT '所属分类ID',
  `sn` varchar(10) NOT NULL COMMENT 'banner编号',
  `name` varchar(255) NOT NULL COMMENT 'banner名',
  `thumb` varchar(255) NOT NULL COMMENT '预览图',
  `on_sale` enum('yes','no') NOT NULL COMMENT '是否上架',
  `recommend` enum('yes','no') NOT NULL COMMENT '是否推荐',
  `add_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '添加时间',
  `desc` text NOT NULL COMMENT 'banner描述',
  `recycle` enum('yes','no') NOT NULL COMMENT '是否删除',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `flyin_banners` */
 INSERT INTO `flyin_banners` VALUES ('1','4','001','提供工业级以太网交换机','2017-07/25/5976edc64bf29.jpg','yes','yes','2017-07-25 15:05:42','<p>请在此处输入banner详情。</p>','no'),('2','4','002','工业级光纤设备制造商','2017-07/25/5976ee7b61450.jpg','yes','yes','2017-07-25 15:08:43','<p>请在此处输入banner详情。</p>','no'),('3','4','003','安全稳定的交通监控环境','2017-07/25/5976eeb041565.jpeg','yes','yes','2017-07-25 15:09:17','<p>请在此处输入banner详情。</p>','no');/* MySQLReback Separation */
 /* 创建表结构 `flyin_cart` */
 DROP TABLE IF EXISTS `flyin_cart`;/* MySQLReback Separation */ CREATE TABLE `flyin_cart` (
  `cart_id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `goods_id` int(5) unsigned NOT NULL,
  `goods_num` int(5) unsigned NOT NULL,
  `goods_price` int(5) unsigned NOT NULL,
  `session_id` char(32) NOT NULL,
  `user_id` int(5) NOT NULL,
  PRIMARY KEY (`cart_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `flyin_cart` */
 INSERT INTO `flyin_cart` VALUES ('1','8','5','123','422f5o2qsm57piea3jshq3avd2','0'),('2','9','1','2','422f5o2qsm57piea3jshq3avd2','0'),('3','7','6','123','9ce9geb31cpcka8nvgp0tc0sf5','0'),('4','7','1','123','fo5h4ctsr77a10ji0t7nfbb3q5','0'),('5','6','1','123','htlns6pi8hijbn3el3mbop60g6','0'),('6','3','3','0','ust1k7hkgusciqi498odrfpfi2','0'),('7','4','3','0','ust1k7hkgusciqi498odrfpfi2','0');/* MySQLReback Separation */
 /* 创建表结构 `flyin_category` */
 DROP TABLE IF EXISTS `flyin_category`;/* MySQLReback Separation */ CREATE TABLE `flyin_category` (
  `cat_id` int(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '分类ID',
  `cat_name` varchar(100) NOT NULL COMMENT '分类名字',
  `pid` int(11) DEFAULT NULL COMMENT '层级',
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `flyin_category` */
 INSERT INTO `flyin_category` VALUES ('1','工业级以太网交换机','0'),('2','工业级POE交换机','0'),('3','工业级光纤交换机','0'),('4','电信级百兆光纤收发器','0'),('5','电信级千兆光纤收发器','0'),('6','2U收发器机架','');/* MySQLReback Separation */
 /* 创建表结构 `flyin_config` */
 DROP TABLE IF EXISTS `flyin_config`;/* MySQLReback Separation */ CREATE TABLE `flyin_config` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `field` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `mark` varchar(255) NOT NULL,
  `field_type` varchar(255) NOT NULL DEFAULT 'string',
  `config_type` varchar(255) NOT NULL DEFAULT 'site',
  `value` varchar(255) NOT NULL,
  `is_system` tinyint(1) NOT NULL DEFAULT '0',
  `is_required` tinyint(1) NOT NULL DEFAULT '0',
  `sort` int(10) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `add_time` datetime NOT NULL,
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `field` (`field`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 创建表结构 `flyin_friendlink` */
 DROP TABLE IF EXISTS `flyin_friendlink`;/* MySQLReback Separation */ CREATE TABLE `flyin_friendlink` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `linkname` varchar(255) NOT NULL COMMENT '网站名称',
  `url` char(255) NOT NULL COMMENT '网站URL',
  `introduction` text NOT NULL COMMENT '网站简介',
  `linktype` tinyint(1) NOT NULL DEFAULT '1' COMMENT '链接方式',
  `linkorder` smallint(5) NOT NULL COMMENT '排序值',
  `isshow` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否显示',
  `elite` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否推荐',
  `addtime` int(11) NOT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `flyin_friendlink` */
 INSERT INTO `flyin_friendlink` VALUES ('1','Flyindata Optronics Co.,Ltd','http://opticres.com/','飞宇集团','1','2','1','1','1494409875'),('2','Flyin fiber optic transceivers','http://www.flyinsfp.com','飞宇光模块','1','7','1','1','1494410158'),('5','飞宇国际专网','http://www.flyinoptronics.com','飞宇国际专网','1','8','1','1','1494466502'),('6','飞宇连接器类网站','http://www.flyinpatchcord.com','飞宇连接器类网站','1','9','1','1','1495696917'),('7','飞宇淘宝官方店','http://opticres.taobao.com','飞宇淘宝官方店','1','10','1','1','1495697442'),('8','飞宇光纤系统','http://www.flyinsystem.com','飞宇光纤系统','1','4','1','1','1495697597');/* MySQLReback Separation */
 /* 创建表结构 `flyin_gallery` */
 DROP TABLE IF EXISTS `flyin_gallery`;/* MySQLReback Separation */ CREATE TABLE `flyin_gallery` (
  `gallery_id` int(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '图片ID',
  `goods_id` int(5) unsigned NOT NULL COMMENT 'goods表的id',
  `img_center` varchar(100) DEFAULT NULL COMMENT '商品中图',
  PRIMARY KEY (`gallery_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `flyin_gallery` */
 INSERT INTO `flyin_gallery` VALUES ('1','1','5976f114d5338.png'),('2','1','5976f114d89e9.png'),('3','2','5976f2313a7b1.png'),('4','2','5976f2313ee02.png'),('6','4','5980267bc2c01.png'),('7','4','5980267bc3590.png');/* MySQLReback Separation */
 /* 创建表结构 `flyin_goods` */
 DROP TABLE IF EXISTS `flyin_goods`;/* MySQLReback Separation */ CREATE TABLE `flyin_goods` (
  `goods_id` int(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '商品ID',
  `goods_name` varchar(250) NOT NULL COMMENT '商品名称',
  `goods_price` int(5) unsigned NOT NULL COMMENT '商品价格',
  `goods_stock` int(5) unsigned NOT NULL COMMENT '商品库存',
  `cat_id` int(5) unsigned NOT NULL COMMENT '商品分类ID',
  `goods_sku` varchar(20) NOT NULL COMMENT '商品编号',
  `is_show` int(5) NOT NULL COMMENT '是否显示',
  `list_time` datetime NOT NULL COMMENT '最后时间',
  `list_date` int(10) NOT NULL,
  `goods_pdf` varchar(255) DEFAULT NULL COMMENT '商品PDF',
  `goods_desc` text NOT NULL COMMENT '商品描述',
  `goods_performance` text NOT NULL COMMENT '商品参数',
  `img_center` varchar(100) DEFAULT NULL COMMENT '商品中图',
  `parameter_name` varchar(255) DEFAULT NULL COMMENT '参数名',
  `parameter_value` varchar(255) DEFAULT NULL COMMENT '参数值',
  `hits` int(255) DEFAULT '0' COMMENT '浏览量',
  `pdfhits` int(255) NOT NULL DEFAULT '0' COMMENT 'pdf下载次数',
  `hot` enum('yes','no') NOT NULL,
  PRIMARY KEY (`goods_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `flyin_goods` */
 INSERT INTO `flyin_goods` VALUES ('1','FLY-IMC-2F4F4GT 工业级千兆2光4光4电交换机','13','1','1','123','1','2017-07-25 15:19:48','1500912000','Efficient 1100G.pdf','<p>44444444444444444444</p><p><img src=\"/ueditorProductsParameter/php/upload/image/20170807/1502078193697298.png\" alt=\"1502078193697298.png\" /></p>','<p>55555555555555555555555555555551111111</p><p><img src=\"/ueditorProductsParameter/php/upload/image/20170807/1502078193697298.png\" alt=\"1502078193697298.png\" width=\"363\" height=\"202\" style=\"width:363px;height:202px;\" /></p>','5976f114d5338.png','','','106','0','yes'),('2','FLY-IMC-P2F8T 工业级千兆2光8电交换机','123','1','2','123','1','2017-07-25 15:24:33','1500912000','d1x2.pdf','<p>123</p><p><img src=\"/ueditorProductsParameter/php/upload/image/20170807/1502078193697298.png\" alt=\"1502078193697298.png\" /></p>','<p>123</p>','5976f2313a7b1.png','参数名','参数信息...','32','1','yes');/* MySQLReback Separation */
 /* 插入数据 `flyin_goods` */
 INSERT INTO `flyin_goods` VALUES ('4','FLY-IMC-P2F6T 工业级百兆2光6电交换机','0','1','1','','1','2017-08-01 14:58:03','1501516800','161116 TEST 1x2 rev a1.pdf','&lt;span style=&quot;color:#41413E;font-family:Arial, Verdana, Helvetica, sans-serif;background-color:#FFFFFF;&quot;&gt;FLY-IMC系列百兆高级管理型冗余以太网交换机配有2个百兆光口，方便构建百兆冗余环网。支持“FLY Ring”冗余环网（自愈时间&amp;lt;20ms）、RSTP、STP以及MSTP协议，增强了网络系统的可靠性和实用性。FLY-IMC系列可应用于能源、交通以及工业自动化等各工业领域。支持POE供电，最大支持30W供电。&lt;/span&gt;','&lt;ul style=&quot;font-family:Arial, Verdana, Helvetica, sans-serif;background-color:#FFFFFF;color:#666666;&quot;&gt;
	&lt;li&gt;
		&lt;span style=&quot;color:#000000;&quot;&gt;支持命令行界面（CLI），方便快速配置主要管理功能&lt;/span&gt; 
	&lt;/li&gt;
	&lt;li&gt;
		&lt;span style=&quot;color:#000000;&quot;&gt;支持IEEE 1588 PTP V2（精密时间协议），实现精确的网络时间同步&lt;/span&gt; 
	&lt;/li&gt;
	&lt;li&gt;
		&lt;span style=&quot;color:#000000;&quot;&gt;DHCP Option 82用于以不同策略分配IP地址&lt;/span&gt; 
	&lt;/li&gt;
	&lt;li&gt;
		&lt;span style=&quot;color:#000000;&quot;&gt;支持飞宇环协议&quot;FLY Ring&quot;（自愈时间&amp;lt;20ms）、STP、RSTP以及MSTP以太网冗余&lt;/span&gt; 
	&lt;/li&gt;
	&lt;li&gt;
		&lt;span style=&quot;color:#000000;&quot;&gt;支持基于端口的VLAN，IEEE 802.1Q VLAN和GVRP协议，简易网络规划&lt;/span&gt; 
	&lt;/li&gt;
	&lt;li&gt;
		&lt;span style=&quot;color:#000000;&quot;&gt;支持Ethernet/IP 和 Modbus/TCP协议用于设备管理和控制&lt;/span&gt; 
	&lt;/li&gt;
	&lt;li&gt;
		&lt;span style=&quot;color:#000000;&quot;&gt;IGMP Snooping和GMRP过滤多播流量&lt;/span&gt; 
	&lt;/li&gt;
	&lt;li&gt;
		&lt;span style=&quot;color:#000000;&quot;&gt;支持端口镜像&lt;/span&gt; 
	&lt;/li&gt;
	&lt;li&gt;
		&lt;span style=&quot;color:#000000;&quot;&gt;支持多播、广播风暴控制&lt;/span&gt; 
	&lt;/li&gt;
	&lt;li&gt;
		&lt;span style=&quot;color:#000000;&quot;&gt;支持QoS和ToS/DiffServ，用于流量控制和管理&lt;/span&gt; 
	&lt;/li&gt;
	&lt;li&gt;
		&lt;span style=&quot;color:#000000;&quot;&gt;支持链路聚合，优化带宽利用率&lt;/span&gt; 
	&lt;/li&gt;
	&lt;li&gt;
		&lt;span style=&quot;color:#000000;&quot;&gt;支持SNMPv3、 IEEE 802.1X、 HTTPS和SSH，加强网络安全性&lt;/span&gt; 
	&lt;/li&gt;
	&lt;li&gt;
		&lt;span style=&quot;color:#000000;&quot;&gt;支持TACACS+&lt;/span&gt; 
	&lt;/li&gt;
	&lt;li&gt;
		&lt;span style=&quot;color:#000000;&quot;&gt;支持SNMPv1/v2c/v3 不同安全级别的网络管理&lt;/span&gt; 
	&lt;/li&gt;
	&lt;li&gt;
		&lt;span style=&quot;color:#000000;&quot;&gt;采用RMON有效提升网络监测和预测能力&lt;/span&gt; 
	&lt;/li&gt;
	&lt;li&gt;
		&lt;span style=&quot;color:#000000;&quot;&gt;支持带宽管理，确保网络稳定性&lt;/span&gt; 
	&lt;/li&gt;
	&lt;li&gt;
		&lt;span style=&quot;color:#000000;&quot;&gt;支持基于MAC地址的端口锁定，防止非法入侵&lt;/span&gt; 
	&lt;/li&gt;
	&lt;li&gt;
		&lt;span style=&quot;color:#000000;&quot;&gt;通过E-mail和继电器输出，实现自动报警&lt;/span&gt; 
	&lt;/li&gt;
	&lt;li&gt;
		&lt;span style=&quot;color:#000000;&quot;&gt;支持DDM（Digital Diagnostic Monitoring&lt;/span&gt; 
	&lt;/li&gt;
	&lt;li&gt;
		&lt;span style=&quot;color:#000000;&quot;&gt;优先级队列：4&lt;/span&gt; 
	&lt;/li&gt;
	&lt;li&gt;
		&lt;span style=&quot;color:#000000;&quot;&gt;可用VLAN 的最大数量：256&lt;/span&gt; 
	&lt;/li&gt;
	&lt;li&gt;
		&lt;span style=&quot;color:#000000;&quot;&gt;VLAN ID范围：VID1 ~ 4094&lt;/span&gt; 
	&lt;/li&gt;
	&lt;li&gt;
		&lt;span style=&quot;color:#000000;&quot;&gt;IGMP组：256&lt;/span&gt; 
	&lt;/li&gt;
	&lt;li&gt;
		&lt;span style=&quot;color:#000000;&quot;&gt;MAC地址表大小：8K&lt;/span&gt; 
	&lt;/li&gt;
	&lt;li&gt;
		&lt;span style=&quot;color:#000000;&quot;&gt;封包缓冲区大小：1 Mbit&lt;/span&gt; 
	&lt;/li&gt;
	&lt;li&gt;
		&lt;span style=&quot;color:#000000;&quot;&gt;支持POE at协议&lt;/span&gt; 
	&lt;/li&gt;
	&lt;li&gt;
		&lt;p&gt;
			&lt;strong&gt;&lt;span style=&quot;color:#000000;&quot;&gt;电源要求：&lt;/span&gt;&lt;/strong&gt; 
		&lt;/p&gt;
		&lt;ul&gt;
			&lt;li&gt;
				&lt;span style=&quot;color:#000000;&quot;&gt;输入电压：48&lt;/span&gt;&lt;span style=&quot;color:#000000;&quot;&gt;VDC&lt;/span&gt;&lt;span style=&quot;color:#000000;&quot;&gt;冗余双电源输入&lt;/span&gt; 
			&lt;/li&gt;
			&lt;li&gt;
				&lt;span style=&quot;color:#000000;&quot;&gt;输入电流：&lt;/span&gt; 
				&lt;ul&gt;
					&lt;li&gt;
						&lt;span style=&quot;color:#000000;&quot;&gt;FLY-IMC-2F6T：&amp;lt;0.51A@24VDC（非POE状态&lt;/span&gt;&lt;span style=&quot;color:#000000;&quot;&gt;）&lt;/span&gt; 
					&lt;/li&gt;
				&lt;/ul&gt;
			&lt;/li&gt;
			&lt;li&gt;
				&lt;span style=&quot;color:#000000;&quot;&gt;过电流保护：提供&lt;/span&gt; 
			&lt;/li&gt;
			&lt;li&gt;
				&lt;span style=&quot;color:#000000;&quot;&gt;反接保护：提供&lt;/span&gt; 
			&lt;/li&gt;
			&lt;li&gt;
				&lt;span style=&quot;color:#000000;&quot;&gt;连接器：6针接线端子&lt;/span&gt; 
			&lt;/li&gt;
		&lt;/ul&gt;
		&lt;p&gt;
			&lt;strong&gt;&lt;span style=&quot;color:#000000;&quot;&gt;机械特性：&lt;/span&gt;&lt;/strong&gt; 
		&lt;/p&gt;
		&lt;ul&gt;
			&lt;li&gt;
				&lt;span style=&quot;color:#000000;&quot;&gt;外壳：金属，IP40防护等级&lt;/span&gt; 
			&lt;/li&gt;
			&lt;li&gt;
				&lt;span style=&quot;color:#000000;&quot;&gt;尺寸：60.2 x 115.5 x 138.5 mm&lt;/span&gt; 
			&lt;/li&gt;
			&lt;li&gt;
				&lt;span style=&quot;color:#000000;&quot;&gt;重量：750g&lt;/span&gt; 
			&lt;/li&gt;
			&lt;li&gt;
				&lt;span style=&quot;color:#000000;&quot;&gt;安装方式：导轨安装、壁挂式安装&lt;/span&gt; 
			&lt;/li&gt;
		&lt;/ul&gt;
		&lt;p&gt;
			&lt;strong&gt;&lt;span style=&quot;color:#000000;&quot;&gt;工作温度：&lt;/span&gt;&lt;/strong&gt; 
		&lt;/p&gt;
		&lt;ul&gt;
			&lt;li&gt;
				&lt;span style=&quot;color:#000000;&quot;&gt;标准型：0 ~ +60°C (32 ~ 140°F )&lt;/span&gt; 
			&lt;/li&gt;
			&lt;li&gt;
				&lt;span style=&quot;color:#000000;&quot;&gt;宽温型：-40 ~ +75°C (-40 ~ 167°F )&lt;/span&gt; 
			&lt;/li&gt;
			&lt;li&gt;
				&lt;span style=&quot;color:#000000;&quot;&gt;储存温度：-40 ~ +85°C（-40 ~ 185°F ）&lt;/span&gt; 
			&lt;/li&gt;
			&lt;li&gt;
				&lt;span style=&quot;color:#000000;&quot;&gt;相对湿度： 5 ~ 95%（无凝露）&lt;/span&gt; 
			&lt;/li&gt;
		&lt;/ul&gt;
	&lt;/li&gt;
&lt;/ul&gt;','5980267bc2c01.png','','','6','0','no');/* MySQLReback Separation */
 /* 创建表结构 `flyin_ipcount` */
 DROP TABLE IF EXISTS `flyin_ipcount`;/* MySQLReback Separation */ CREATE TABLE `flyin_ipcount` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nowdate` varchar(255) DEFAULT NULL,
  `nowdatec` varchar(255) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `area` varchar(255) DEFAULT NULL COMMENT 'IP归属地',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `flyin_ipcount` */
 INSERT INTO `flyin_ipcount` VALUES ('1','2017-07-13','1','0.0.0.0',''),('2','2017-07-14','1','0.0.0.0',''),('3','2017-07-17','2','0.0.0.0127.0.0.1',''),('4','2017-07-18','1','0.0.0.0',''),('5','2017-07-19','1','0.0.0.0',''),('6','2017-07-20','1','0.0.0.0',''),('7','2017-07-21','1','0.0.0.0',''),('8','2017-07-24','1','0.0.0.0',''),('9','2017-07-25','3','0.0.0.059.40.64.10327.38.29.46',''),('10','2017-07-27','3','27.38.29.3759.40.64.10361.141.167.32',''),('11','2017-07-31','3','27.38.28.19627.38.28.23661.141.165.99',''),('12','2017-08-01','8','27.38.28.23659.40.65.13727.38.28.21161.141.174.20127.38.28.19727.38.28.24027.38.29.261.141.165.66',''),('13','2017-08-02','4','27.38.29.227.38.28.24061.141.165.6659.40.65.43',''),('14','2017-08-06','1','27.38.28.247',''),('15','2017-08-07','7','59.40.66.6261.141.155.17027.38.29.59183.61.51.19014.17.34.237223.104.63.3927.38.28.192','');/* MySQLReback Separation */
 /* 创建表结构 `flyin_mail` */
 DROP TABLE IF EXISTS `flyin_mail`;/* MySQLReback Separation */ CREATE TABLE `flyin_mail` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `field` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `mark` varchar(255) NOT NULL,
  `field_type` varchar(255) NOT NULL DEFAULT 'string',
  `config_type` varchar(255) NOT NULL DEFAULT 'site',
  `value` varchar(255) NOT NULL,
  `is_system` tinyint(1) NOT NULL DEFAULT '0',
  `is_required` tinyint(1) NOT NULL DEFAULT '0',
  `sort` int(10) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `add_time` datetime NOT NULL,
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `field` (`field`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 创建表结构 `flyin_newcategory` */
 DROP TABLE IF EXISTS `flyin_newcategory`;/* MySQLReback Separation */ CREATE TABLE `flyin_newcategory` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `pid` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `flyin_newcategory` */
 INSERT INTO `flyin_newcategory` VALUES ('15','公司新闻','0'),('16','行业新闻','0');/* MySQLReback Separation */
 /* 创建表结构 `flyin_news` */
 DROP TABLE IF EXISTS `flyin_news`;/* MySQLReback Separation */ CREATE TABLE `flyin_news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `newcategory_id` int(10) unsigned NOT NULL,
  `sn` varchar(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `thumb` varchar(150) NOT NULL,
  `on_sale` enum('yes','no') NOT NULL,
  `recommend` enum('yes','no') NOT NULL,
  `add_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `custom_time` varchar(30) NOT NULL COMMENT '自定义时间',
  `desc` text NOT NULL,
  `recycle` enum('yes','no') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `flyin_news` */
 INSERT INTO `flyin_news` VALUES ('1','15','001','飞宇集团张家界一周游','','yes','yes','2017-07-25 15:13:30','2012-08-23','<p>请在此处输入新闻详情。</p><p><img alt=\"\" src=\"http://www.flyinsystem.com/images/upload/day_121218/201212181609027957.jpg\" /></p>','yes'),('2','15','001','飞宇集团张家界一周游','','yes','yes','2017-07-25 15:14:22','2012-08-27','<p>请在此处输入新闻详情。</p><p><br /></p>','no'),('3','16','001','1111111112','','yes','yes','2017-08-01 16:53:15','2017-08-16','<p>了<img src=\"/ueditorNews/php/upload/image/20170807/1502089429553519.png\" alt=\"1502089429553519.png\" /></p><table><tbody><tr class=\"firstRow\"><td style=\"border:1px solid #ddd;\" width=\"114\" valign=\"top\"><br /></td><td style=\"border:1px solid #ddd;\" width=\"114\" valign=\"top\"><br /></td><td style=\"border:1px solid #ddd;\" width=\"114\" valign=\"top\"><br /></td><td style=\"border:1px solid #ddd;\" width=\"114\" valign=\"top\"><br /></td><td style=\"border:1px solid #ddd;\" width=\"114\" valign=\"top\"><br /></td><td style=\"border:1px solid #ddd;\" width=\"114\" valign=\"top\"><br /></td><td style=\"border:1px solid #ddd;\" width=\"114\" valign=\"top\"><br /></td></tr><tr><td style=\"border:1px solid #ddd;\" width=\"114\" valign=\"top\"><br /></td><td style=\"border:1px solid rgb(221,221,221);\" width=\"114\" valign=\"top\"><p><br /></p><p>dfgdgfd</p></td><td style=\"border:1px solid rgb(221,221,221);\" width=\"114\" valign=\"top\">dddd</td><td style=\"border:1px solid #ddd;\" width=\"114\" valign=\"top\"><br /></td><td style=\"border:1px solid #ddd;\" width=\"114\" valign=\"top\"><br /></td><td style=\"border:1px solid #ddd;\" width=\"114\" valign=\"top\"><br /></td><td style=\"border:1px solid #ddd;\" width=\"114\" valign=\"top\"><br /></td></tr><tr><td style=\"border:1px solid #ddd;\" width=\"114\" valign=\"top\"><br /></td><td style=\"border:1px solid #ddd;\" width=\"114\" valign=\"top\"><br /></td><td style=\"border:1px solid #ddd;\" width=\"114\" valign=\"top\"><br /></td><td style=\"border:1px solid #ddd;\" width=\"114\" valign=\"top\"><br /></td><td style=\"border:1px solid #ddd;\" width=\"114\" valign=\"top\"><br /></td><td style=\"border:1px solid #ddd;\" width=\"114\" valign=\"top\"><br /></td><td style=\"border:1px solid rgb(221,221,221);\" width=\"114\" valign=\"top\"><br /></td></tr></tbody></table>','no');/* MySQLReback Separation */
 /* 创建表结构 `flyin_order` */
 DROP TABLE IF EXISTS `flyin_order`;/* MySQLReback Separation */ CREATE TABLE `flyin_order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL COMMENT '购买者用户ID',
  `goods` text NOT NULL COMMENT '商品信息',
  `address` text NOT NULL COMMENT '收件人信息',
  `price` decimal(10,2) NOT NULL COMMENT '订单价格',
  `add_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '下单时间',
  `cancel` enum('yes','no') NOT NULL COMMENT '是否取消',
  `payment` enum('yes','no') NOT NULL COMMENT '是否支付',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 创建表结构 `flyin_parameter` */
 DROP TABLE IF EXISTS `flyin_parameter`;/* MySQLReback Separation */ CREATE TABLE `flyin_parameter` (
  `parameter_id` int(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '参数ID',
  `goods_id` int(5) unsigned NOT NULL COMMENT '商品ID',
  `parameter_name` varchar(255) DEFAULT NULL COMMENT '参数名',
  `parameter_value` varchar(255) DEFAULT NULL COMMENT '参数值',
  PRIMARY KEY (`parameter_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `flyin_parameter` */
 INSERT INTO `flyin_parameter` VALUES ('4','2','参数名','参数信息...');/* MySQLReback Separation */
 /* 创建表结构 `flyin_pdf` */
 DROP TABLE IF EXISTS `flyin_pdf`;/* MySQLReback Separation */ CREATE TABLE `flyin_pdf` (
  `pdf_id` int(5) NOT NULL AUTO_INCREMENT COMMENT 'PDF的ID',
  `goods_id` int(5) NOT NULL COMMENT '商品ID',
  `goods_pdf` varchar(255) NOT NULL COMMENT 'PDF的路径',
  PRIMARY KEY (`pdf_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `flyin_pdf` */
 INSERT INTO `flyin_pdf` VALUES ('1','1','Efficient 1100G.pdf'),('2','2','d1x2.pdf'),('3','4','161116 TEST 1x2 rev a1.pdf');/* MySQLReback Separation */
 /* 创建表结构 `flyin_servicecategory` */
 DROP TABLE IF EXISTS `flyin_servicecategory`;/* MySQLReback Separation */ CREATE TABLE `flyin_servicecategory` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(20) NOT NULL,
  `pid` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `flyin_servicecategory` */
 INSERT INTO `flyin_servicecategory` VALUES ('1','技术支持','0'),('2','解决方案','0');/* MySQLReback Separation */
 /* 创建表结构 `flyin_services` */
 DROP TABLE IF EXISTS `flyin_services`;/* MySQLReback Separation */ CREATE TABLE `flyin_services` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `servicecategory_id` int(10) unsigned NOT NULL,
  `sn` varchar(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `thumb` varchar(150) NOT NULL,
  `on_sale` enum('yes','no') NOT NULL,
  `recommend` enum('yes','no') NOT NULL,
  `date` varchar(30) NOT NULL,
  `add_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `custom_time` varchar(30) NOT NULL,
  `desc` text NOT NULL,
  `recycle` enum('yes','no') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `flyin_services` */
 INSERT INTO `flyin_services` VALUES ('1','1','01','数据堆积是由于交通捅塞造成的','','yes','no','2017-05-25','2017-05-26 13:52:05','','<p style=\"color:rgb(0,0,0);font-family:Arial, Helvetica, sans-serif;font-size:12px;line-height:normal;white-space:normal;\">一、 故障原因分析：</p><p style=\"color:rgb(0,0,0);font-family:Arial, Helvetica, sans-serif;font-size:12px;line-height:normal;white-space:normal;\">A点的有效数据发出后，在路途中的两个光纤收发器中不作差错校验，只有数据帧到达B点的交换核心时才做差错校验，将错误帧丢弃，而正确帧进入BUFFER，等待转发。但是，所有的差错校验过程都是一个程序控制过程，当某些特定的错误帧进入时，无论是帧长度检测还是CRC检验都不能查出错误，这种帧也被认为是正确帧进入BUFFER，但这类帧永远无法转发出去，进而在BUFFER中造成堆积，当BUFFER的占用量大到一定程度时，导致交换机无法继续运行。</p><p style=\"color:rgb(0,0,0);font-family:Arial, Helvetica, sans-serif;font-size:12px;line-height:normal;white-space:normal;\">二、FHC0110-XX的解决方案：</p><p style=\"color:rgb(0,0,0);font-family:Arial, Helvetica, sans-serif;font-size:12px;line-height:normal;white-space:normal;\">....法判断BUFFER中的数据堆积是由于交通捅塞造成的、错误帧造成的，还是其它原因造成的，因此对于一个复杂系统无法用简单的手段处理。但是，对于光纤收发器因为它只有两个端口，如果可以实现交换机的上述检测功能，又出现了BUFFER堆积的问题时，我们可以简单了判断为光纤收发器的状态不正常，因而可以将它Reset</p><p style=\"color:rgb(0,0,0);font-family:Arial, Helvetica, sans-serif;font-size:12px;line-height:normal;white-space:normal;\">针对这一理解，解决方案就是在FHC0110-XX系列光纤收发器中内置以太网交换核心及一个大BUFFER，使其具有差错校验功能（当然，这样设计还具有其它的功能，在此不多述），同时在系统的设计中加入自动Reset功能，当系统判定自身进入严重故障状态时，自动进行Reset，从而最大限度地避免上位系统的故障可能。</p><p style=\"color:rgb(0,0,0);font-family:Arial, Helvetica, sans-serif;font-size:12px;line-height:normal;white-space:normal;\">FHC0110-XX完成数据链路层的全部功能，对数据做帧级的差错校验及处理，同时FHC0110-XX具有2KMAC地址表，只有当一个数据帧具有确实存在的MAC地址，可以正确转发时，才将该帧发出，否则只能堆积在自身的BUFFER中，如果收发器也出现BUFFER大量堆积时，它认为自身状态严重故障，实施Reset动作，清除所有BUFFER中的数据，这样导致的结果是部分传输的数据丢失，但可以避免网络设备“死机\"。</p><p style=\"color:rgb(0,0,0);font-family:Arial, Helvetica, sans-serif;font-size:12px;line-height:normal;white-space:normal;\">在使用FHC0110-XX的系统环境中，只有当段的双绞线出现大量误码时，才可能导致交换机B的“死机”现象，而由光路上来的误码已由FHC0110-XX处理，有效地提高交换机的端口及整机交换效率，降低“死机”的风险。</p><p><br /></p>','no');/* MySQLReback Separation */
 /* 插入数据 `flyin_services` */
 INSERT INTO `flyin_services` VALUES ('2','1','002','光导纤维为传输介质的一种通信方式','','yes','no','2014-07-31','2017-05-26 11:14:48','','<p style=\"color:rgb(0,0,0);font-family:Arial, Helvetica, sans-serif;font-size:12px;line-height:normal;white-space:normal;\"> 一、 概述</p><p style=\"color:rgb(0,0,0);font-family:Arial, Helvetica, sans-serif;font-size:12px;line-height:normal;white-space:normal;\">当今世界，光纤通信已成为通信的主要手段。同时，光纤通讯技术也在飞速的发展，使得光纤传输系统以其众多的优点，赢得了大家的青睐。</p><p style=\"color:rgb(0,0,0);font-family:Arial, Helvetica, sans-serif;font-size:12px;line-height:normal;white-space:normal;\">光纤传输系统具有以下显著优点：容量大、传输距离远。光纤理论带宽可达20000GHz，无中继传输距离可达50-80公里。由玻璃制成，抗电磁干扰、传输质量好，可用于电力网和变电所内等强电磁环境中。光纤重量轻，可以弯曲，易于铺设。可节约贵重金属，且抗腐蚀能力很强。制作光纤的原料丰富，随着工艺的进步、规模的扩大，其成本进一步下降，整个传输系统的成本也低。</p><p style=\"color:rgb(0,0,0);font-family:Arial, Helvetica, sans-serif;font-size:12px;line-height:normal;white-space:normal;\">二、 光纤传输系统简介</p><p style=\"color:rgb(0,0,0);font-family:Arial, Helvetica, sans-serif;font-size:12px;line-height:normal;white-space:normal;\">光纤传输即是以光波为载频，以光导纤维为传输介质的一种通信方式，因其拥有传输频带宽、信号损耗低、抗干扰能力强、重量轻等优点。光纤通信在近二十年来得到了飞速的发展。</p><p style=\"color:rgb(0,0,0);font-family:Arial, Helvetica, sans-serif;font-size:12px;line-height:normal;white-space:normal;\">1、光纤的结构</p><p style=\"color:rgb(0,0,0);font-family:Arial, Helvetica, sans-serif;font-size:12px;line-height:normal;white-space:normal;\">当今世界，光纤通信已成为通信的主要手段。同时，光纤通讯技术也在飞速的发展，使得光纤传输系统以其众多的优点，赢得了大家的青睐。</p><p style=\"color:rgb(0,0,0);font-family:Arial, Helvetica, sans-serif;font-size:12px;line-height:normal;white-space:normal;\">光纤传输系统具有以下显著优点：容量大、传输距离远。光纤理论带宽可达20000GHz，无中继传输距离可达50-80公里。由玻璃制成，抗电磁干扰、传输质量好，可用于电力网和变电所内等强电磁环境中。光纤重量轻，可以弯曲，易于铺设。可节约贵重金属，且抗腐蚀能力很强。制作光纤的原料丰富，随着工艺的进步、规模的扩大，其成本进一步下降，整个传输系统的成本也低。</p><p style=\"color:rgb(0,0,0);font-family:Arial, Helvetica, sans-serif;font-size:12px;line-height:normal;white-space:normal;\">二、 光纤传输系统简介</p><p style=\"color:rgb(0,0,0);font-family:Arial, Helvetica, sans-serif;font-size:12px;line-height:normal;white-space:normal;\">光纤传输即是以光波为载频，以光导纤维为传输介质的一种通信方式，因其拥有传输频带宽、信号损耗低、抗干扰能力强、重量轻等优点。光纤通信在近二十年来得到了飞速的发展。</p><p style=\"color:rgb(0,0,0);font-family:Arial, Helvetica, sans-serif;font-size:12px;line-height:normal;white-space:normal;\">1、光纤的结构</p><p style=\"color:rgb(0,0,0);font-family:Arial, Helvetica, sans-serif;font-size:12px;line-height:normal;white-space:normal;\">光纤裸纤一般分为三层：中心高折射率玻璃芯(芯径一般为50或62.5μm)，中间为低折射率硅玻璃包层(直径一般为125μm)，最外是加强用的树脂涂层。</p><p><br /></p>','no');/* MySQLReback Separation */
 /* 插入数据 `flyin_services` */
 INSERT INTO `flyin_services` VALUES ('3','1','003','数字视频光端机的原理及其应用','','yes','yes','2014-07-31','2017-05-26 13:52:23','','<p style=\"color:rgb(0,0,0);font-family:Arial, Helvetica, sans-serif;font-size:12px;line-height:normal;white-space:normal;\">一、 概述</p><p style=\"color:rgb(0,0,0);font-family:Arial, Helvetica, sans-serif;font-size:12px;line-height:normal;white-space:normal;\">当今世界，光纤通信已成为通信的主要手段。同时，光纤通讯技术也在飞速的发展，使得光纤传输系统以其众多的优点，赢得了大家的青睐。</p><p style=\"color:rgb(0,0,0);font-family:Arial, Helvetica, sans-serif;font-size:12px;line-height:normal;white-space:normal;\">光纤传输系统具有以下显著优点：容量大、传输距离远。光纤理论带宽可达20000GHz，无中继传输距离可达50-80公里。由玻璃制成，抗电磁干扰、传输质量好，可用于电力网和变电所内等强电磁环境中。光纤重量轻，可以弯曲，易于铺设。可节约贵重金属，且抗腐蚀能力很强。制作光纤的原料丰富，随着工艺的进步、规模的扩大，其成本进一步下降，整个传输系统的成本也低。</p><p style=\"color:rgb(0,0,0);font-family:Arial, Helvetica, sans-serif;font-size:12px;line-height:normal;white-space:normal;\">二、 光纤传输系统简介</p><p style=\"color:rgb(0,0,0);font-family:Arial, Helvetica, sans-serif;font-size:12px;line-height:normal;white-space:normal;\">光纤传输即是以光波为载频，以光导纤维为传输介质的一种通信方式，因其拥有传输频带宽、信号损耗低、抗干扰能力强、重量轻等优点。光纤通信在近二十年来得到了飞速的发展。</p><p style=\"color:rgb(0,0,0);font-family:Arial, Helvetica, sans-serif;font-size:12px;line-height:normal;white-space:normal;\">1、光纤的结构</p><p style=\"color:rgb(0,0,0);font-family:Arial, Helvetica, sans-serif;font-size:12px;line-height:normal;white-space:normal;\">光纤裸纤一般分为三层：中心高折射率玻璃芯(芯径一般为50或62.5μm)，中间为低折射率硅玻璃包层(直径一般为125μm)，最外是加强用的树脂涂层。</p><p><br /></p>','no'),('4','2','001','光纤收发器解决方案','','yes','yes','2014-07-13','2017-08-07 15:05:59','','<p><span style=\"color:rgb(0,0,0);font-family:Arial, Helvetica, sans-serif;font-size:12px;line-height:normal;\">随着信息互联网的快速发展，人们对带宽的要求也越来越高，在传统的以太网中起连接作用的介质主要是双绞线。双绞线传输距离的极限大约为100米左右，如此短的传输距离制约了网络的发展，这也无疑使数据通讯质量受到影响。光纤收发器的运用，将以太网中的连接介质换为光纤。光纤的低损耗、高抗电磁干扰性，在使网络传输距离从200米扩展到2公里甚至几十公里，乃至于上百公里的同时，也使数据通讯质量有了较大提高。他使服务器、中继器、集线器、终端机与终端机之间的互联更加简捷。</span></p><p style=\"color:rgb(0,0,0);font-family:Arial, Helvetica, sans-serif;font-size:12px;line-height:normal;white-space:normal;\">在实际的应用中，光纤收发器主要有下面三种基本连接方式：</p><p style=\"color:rgb(0,0,0);font-family:Arial, Helvetica, sans-serif;font-size:12px;line-height:normal;white-space:normal;\">一、用户接入网</p><p style=\"color:rgb(0,0,0);font-family:Arial, Helvetica, sans-serif;font-size:12px;line-height:normal;white-space:normal;\">用户接入网利用光纤收发器带有的网管功能，可以对每一个分散用户点进行集中管理，光纤收发器的10Mbps/100Mbps自适应及10Mbps/100Mbps自动转换功能，为用户提供足够的带宽。也可以利用链路失败告警（LFA）功能，在点对点的传输中相互监控来代替集中网管功能，降低接入成本，同时利用半双工/全双工自适应及半双工/全双工自动转换功能，可以在用户端配置廉价的半双工HUB，几十倍的降低用户端的组网成本，提高网络运营商的竞争力。</p><p></p>','no'),('5','2','455','454','','yes','yes','','2017-06-28 09:33:07','','<p>请在此处输入技术支持详情。545</p>','yes'),('6','2','455','454','','yes','yes','','2017-06-28 09:33:04','','<p>请在此处输入技术支持详情。545</p>','yes'),('7','2','','','','yes','no','','2017-06-28 09:33:03','','<p>请在此处输入技术支持详情。</p>','yes'),('8','2','','','','yes','no','','2017-06-28 09:33:01','','<p>请在此处输入技术支持详情。</p>','yes'),('9','2','','','','yes','no','','2017-06-28 09:32:58','','<p>请在此处输入技术支持详情。</p>','yes');/* MySQLReback Separation */
 /* 创建表结构 `flyin_shopcart` */
 DROP TABLE IF EXISTS `flyin_shopcart`;/* MySQLReback Separation */ CREATE TABLE `flyin_shopcart` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL COMMENT '购买者ID',
  `add_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '加入购物车时间',
  `goods_id` int(10) unsigned NOT NULL COMMENT '购买商品ID',
  `num` tinyint(3) unsigned NOT NULL COMMENT '购买商品数量',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 创建表结构 `flyin_user` */
 DROP TABLE IF EXISTS `flyin_user`;/* MySQLReback Separation */ CREATE TABLE `flyin_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL COMMENT '用户名',
  `password` char(32) NOT NULL COMMENT '登录密码',
  `salt` char(6) NOT NULL COMMENT '密钥',
  `reg_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '注册时间',
  `phone` char(11) NOT NULL DEFAULT '' COMMENT '联系电话',
  `email` varchar(30) NOT NULL DEFAULT '' COMMENT '邮箱',
  `consignee` varchar(20) NOT NULL DEFAULT '' COMMENT '收件人',
  `address` varchar(255) NOT NULL DEFAULT '' COMMENT '收货地址',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `flyin_user` */
 INSERT INTO `flyin_user` VALUES ('1','hy','123456','1','2017-03-22 16:49:38','13570833720','752875397@qq.com','123','sssss');/* MySQLReback Separation */
 /* 创建表结构 `flyin_visitor` */
 DROP TABLE IF EXISTS `flyin_visitor`;/* MySQLReback Separation */ CREATE TABLE `flyin_visitor` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '访客编号',
  `goods_id` int(11) NOT NULL COMMENT '商品ID',
  `ip` int(11) NOT NULL COMMENT '访客IP',
  `address` int(11) NOT NULL COMMENT '地区',
  `visit_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 创建表结构 `flyin_website` */
 DROP TABLE IF EXISTS `flyin_website`;/* MySQLReback Separation */ CREATE TABLE `flyin_website` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL COMMENT '地址',
  `linkman` varchar(100) NOT NULL COMMENT '联系人',
  `cellphone` varchar(100) NOT NULL COMMENT '手机',
  `tel` varchar(100) NOT NULL COMMENT '电话',
  `fax` varchar(100) NOT NULL COMMENT '传真',
  `mail` varchar(100) NOT NULL COMMENT '邮件',
  `copy` varchar(255) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `keywords` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `hotsearch` varchar(255) NOT NULL,
  `author` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='9';/* MySQLReback Separation */
 /* 插入数据 `flyin_website` */
 INSERT INTO `flyin_website` VALUES ('1','深圳市飞宇集团有源部','深圳市宝安区龙华新区大浪南路德利威工业区四楼','刘飞','+86-15013592295','+86-755-32939630 / 32939629 / 32939631 / 32939632','+755-32939628','marketing@opticres.com','Copyright@ 2013-2018 深圳市飞宇集团有源部 版权所有：飞宇集团　','595e18d53545d.png','flyindata,工业级收发器,Fiber Ethernet Swicth, Industrial PoE Switches,Industrial Media converter,Video Optical Converter','Flyindata Optronics Co.,Ltd, created in 2005, located in Shenzhen, China, belongs to Flyin Optronics Co.,Ltd ,specialized in providing high performance fiber optic communication products, broadcast, CATV and network industry worldwide.','Add: 4F, Deliwei Industrial Park, Longhua ,Shenzhen ,China 518109','飞宇集团','1');/* MySQLReback Separation */