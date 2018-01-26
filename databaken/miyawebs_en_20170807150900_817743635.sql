/* This file is created by MySQLReback 2017-08-07 15:09:00 */
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `flyin_banners` */
 INSERT INTO `flyin_banners` VALUES ('1','4','001','Industrial PoE Switches 2 SFP swithces with 8*10/100M UTP ports','2017-07/25/5976f38be0f16.jpg','yes','yes','2017-07-25 15:30:20','<p>Industrial PoE Switches 2 SFP swithces with 8*10/100M UTP ports</p>','no');/* MySQLReback Separation */
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `flyin_category` */
 INSERT INTO `flyin_category` VALUES ('1','Fiber Media Converter','0'),('2','Fiber Ethernet Swicth','0'),('3',' Industrial PoE Switches','0'),('4',' Industrial Media converter','0'),('5',' Video Optical Converter','0');/* MySQLReback Separation */
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
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `flyin_gallery` */
 INSERT INTO `flyin_gallery` VALUES ('44','18','5979626ca0577.jpg');/* MySQLReback Separation */
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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `flyin_goods` */
 INSERT INTO `flyin_goods` VALUES ('18','12345','12','77','1','12','1','2017-07-27 11:47:56','1501084800','','<p>12<img src=\"/ueditorProductsParameter/php/upload/image/20170807/1502078193697298.png\" alt=\"1502078193697298.png\" /></p>','<p>12</p>','5979626ca0577.jpg','参数名','参数信息...','26','0','no');/* MySQLReback Separation */
 /* 创建表结构 `flyin_ipcount` */
 DROP TABLE IF EXISTS `flyin_ipcount`;/* MySQLReback Separation */ CREATE TABLE `flyin_ipcount` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nowdate` varchar(255) DEFAULT NULL,
  `nowdatec` varchar(255) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `area` varchar(255) DEFAULT NULL COMMENT 'IP归属地',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `flyin_ipcount` */
 INSERT INTO `flyin_ipcount` VALUES ('1','2017-07-13','1','0.0.0.0',''),('2','2017-07-14','1','0.0.0.0',''),('3','2017-07-17','2','0.0.0.0127.0.0.1',''),('4','2017-07-18','1','0.0.0.0',''),('5','2017-07-19','1','0.0.0.0',''),('6','2017-07-20','1','0.0.0.0',''),('7','2017-07-21','1','0.0.0.0',''),('8','2017-07-24','1','0.0.0.0',''),('9','2017-07-25','2','0.0.0.059.40.64.103',''),('10','2017-07-27','2','27.38.29.827.38.29.37',''),('11','2017-07-31','2','27.38.28.23627.38.28.196',''),('12','2017-08-01','1','27.38.28.236',''),('13','2017-08-07','3','27.38.28.19227.38.29.5927.38.28.244','');/* MySQLReback Separation */
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
 INSERT INTO `flyin_newcategory` VALUES ('15','Company News','0'),('16','Industry News','0');/* MySQLReback Separation */
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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `flyin_news` */
 INSERT INTO `flyin_news` VALUES ('1','15','Date: 2014','Meet us at 2014 ECOC in Cannes France','','yes','yes','2017-05-10 15:24:20','2017-07-05','<h1>Meet us at 2014 ECOC in Cannes France</h1><p>	Flyin Optronics will attend 2014 ECOC. Welcome to our booth!</p><p>	 </p><p>	Exhibition Name: ECOC 2014</p><p>	Date: 22-24 Sep, 2014</p><p>	Address: Cannes, France</p><p>	Booth NO: 186 </p><p><br /></p>','yes'),('2','15','Date: 2015','Congratulations on moving to a new facto','','yes','yes','2017-05-10 15:25:42','2017-07-07','<p><span style=\"font-size:16px;\">With our utmost joy, we are glad to inform that we are moving to a new factory and our new address is: 4F, Deliwei Industrial Park,</span></p><div>	 Longhua, Shenzhen China  518109. Kindly contact us by our new address afterwards instead of our current one.</div><div>	 </div><div>	As our current factory can’t meet the requirements of our increasing business, we need to move to a bigger one. Our new factory is</div><div>	around 2500 square meters and 1500 square meters of it is a high cleanness level work shop focusing on manufacturing high quality</div><div>	fiber optic passive component. Believe it can help increase our production efficiency greatly and turn our new page of improvement.</div><div>	We will serve our customers with top class quality products and services and win more support and trust with our sincerity as always.</div><div>	 </div><div>	Please also be noted our moving date is from 23rd-Jan to 25th-Jan and our celebration of Moving&amp; New Year Gala will be on 28th-Jan.</div><div>	Welcome to join us for the celebration! </div><div>	 </div><div>	Thank you for your great support! </div><p><br /></p>','yes'),('3','16','Date: 2015','Meet Flyin Team at OFC 2015 in Californi','','yes','yes','2017-05-10 15:26:22','2017-06-14','<h1><span style=\"font-family:Arial;\">Meet Flyin Team at OFC 2015 in California USA</span> </h1><p><span style=\"font-family:Arial;font-size:12px;\">OFC is the largest global conferences and expositions for optical communications and networking professional. </span> </p><p><span style=\"font-family:Arial;font-size:12px;\">As a leading manufacturer and reliable expert of fiber optical product, Flyin Optronics Co., Ltd will be attend to </span> </p><p><span style=\"font-family:Arial;font-size:12px;\">the 40th OFC 2015 at California USA.</span> </p><p><span style=\"font-family:Arial;font-size:12px;\">With around 9 years’ stable growth, Flyin Optronics become one of the biggest suppliers of passive and active </span> </p><p><span style=\"font-family:Arial;font-size:12px;\">components all over the world. There are three main parts in our business range: Passive Components, Active </span> </p><p><span style=\"font-family:Arial;font-size:12px;\">Components and System Integrated solutions. If you want to know more detail information about them, welcome </span> </p><p><span style=\"font-family:Arial;font-size:12px;\">to meet us at the exhibition. It is our pleasure to show you more.</span> </p><p><span style=\"font-size:12px;\"> </span> </p><p><strong><span style=\"font-family:Arial;font-size:12px;\">OFC exhibition detail information of Flyin as follow:</span></strong> </p><p><span style=\"font-family:Arial;font-size:12px;\">Address:</span><strong><span style=\"font-family:Arial;font-size:12px;\"> Los Angeles Convention Center, California, USA</span></strong> </p><p><span style=\"font-family:Arial;font-size:12px;\">Time:</span><strong><span style=\"font-family:Arial;font-size:12px;\"> 24-26 March 2015</span></strong> </p><p><span style=\"font-family:Arial;font-size:12px;\">Booth NO.: </span><strong><span style=\"font-family:Arial;font-size:12px;\">1559</span></strong></p><p><br /></p>','yes'),('4','15','Date: 2015','Meet Flyin Team at EXPO COMM MOSCOW 2015','2017-06/07/59379e3cd8219.jpg','yes','yes','2017-05-10 15:27:19','2017-07-06','<p><img src=\"/enflyindata/Public/Uploads/news/desc/2017-05/10/14944014889589.jpg\" style=\"width:533px;height:168px;\" alt=\"14944014889589.jpg\" /></p><p>The past OFC turned out successful for Flyin on 26th March 2015, and now we are glad to inform that Flyin Optronics Co., Ltd</p><div>	 will be attend to the 27th International Exhibition for Telecommunications, Control Systems, IT and Communication Services</div><div>	 Sviaz-Expocomm 2015 at Moscow Exhibition Center, Russia.</div><div>	 </div><div><strong>Flyin will show following products in EXPO COMM Moscow 2015:</strong> </div><div>	1) WDM / CWDM / Mini CWDM / DWDM / AWG</div><div>	2) Fiber Optical Switch</div><div>	3) Optical Circulator</div><div>	4) Optical Isolator</div><div>	5) Fiber Optical Patch Cord (FC, SC, LC, ST, E2000, MTRJ, MPO type etc.)</div><div>	6) PLC Splitter, FBT Coupler</div><div>	 </div><div>	Flyin expect to meet our partners, customers, peers and friends in exhibition. Welcome to our booth:</div><div><strong>Address: Moscow Exhibition Center, Russia</strong> </div><div><strong>Time: 12-15 May, 2015</strong> </div><div><strong>Booth NO.: 21F33</strong></div><p><br /><br /></p>','yes');/* MySQLReback Separation */
 /* 插入数据 `flyin_news` */
 INSERT INTO `flyin_news` VALUES ('5','16','','26th-June Introduction to Flyin\'s PLC Splitter','','yes','no','2017-07-06 18:19:18','2015-06-27','<p style=\"padding:0px;margin-top:10px;margin-bottom:20px;list-style:none;border:none;line-height:22px;text-indent:2em;text-align:justify;color:rgb(51,51,51);font-family:Arial;font-size:12px;white-space:normal;\">Flyin Optronics Co.,LTD, a professional manufacturer of fiber optic passive components, offers a full range of PLC Spllitters(Planar lightwave circuit).</p><p style=\"padding:0px;margin-top:10px;margin-bottom:20px;list-style:none;border:none;line-height:22px;text-indent:2em;text-align:justify;color:rgb(51,51,51);font-family:Arial;font-size:12px;white-space:normal;\">PlC Splitter is a type of optical power management device that is fabricated using silica optical waveguide technology. It features small size, high reliability, wide operating wavelength range and good channel-to-channel uniformity, and is widely used in PON networks to realize optical signal power splitting. Flyin Optronics provides whole series of 1xN and 2xN splitter products that are tailored for specific applications. They can be applied FTTX systems, PON networks, CATV links and Optical Signal Distribution. All products meet GR-1209-CoRE and GR-1221-CORE requirements.</p><p style=\"padding:0px;margin-top:10px;margin-bottom:20px;list-style:none;border:none;line-height:22px;text-indent:2em;text-align:justify;color:rgb(51,51,51);font-family:Arial;font-size:12px;white-space:normal;\">Flyin are dedicated in producting quality PLC Splitters and we would keep our commitment of offering our best products to our customers. We are glad that our PLC Spitters enjoy a good reputation among our customers. Please feel free to contact us for more details.</p><p><br /></p>','yes');/* MySQLReback Separation */
 /* 插入数据 `flyin_news` */
 INSERT INTO `flyin_news` VALUES ('6','16','','ntroduction to Flyin\'s 2x2 Mechanical Fiber Optic Switch','','yes','yes','2017-07-06 18:20:42','2015-01-05','<p style=\"padding:0px;margin-top:10px;margin-bottom:20px;list-style:none;border:none;line-height:22px;text-indent:2em;text-align:justify;color:rgb(51,51,51);font-family:Arial;font-size:12px;white-space:normal;\">Dear Friends,</p><p style=\"padding:0px;margin-top:10px;margin-bottom:20px;list-style:none;border:none;line-height:22px;text-indent:2em;text-align:justify;color:rgb(51,51,51);font-family:Arial;font-size:12px;white-space:normal;\">As a professional manufacturer of fiber optic passive components, Flyin Optronics Co.,LTD offers a full range of Mechanical Optical Switch(Mechanical Fiber Optic Switch). Here we would like to recommend our 2×2 Mechanical Fiber Optic Switch.</p><p style=\"padding:0px;margin-top:10px;margin-bottom:20px;list-style:none;border:none;line-height:22px;text-indent:2em;text-align:justify;color:rgb(51,51,51);font-family:Arial;font-size:12px;white-space:normal;\">Flyin Optronics’ 2×2 Mechanical Fiber Optic Switch(2X2 Optical Switch) connects optical channels by redirecting an incoming optical signal into a selected output fiber. This is achieved using a patent pending opto-mechanical proprietary configuration and activated via an electrical control signal.</p><p style=\"padding:0px;margin-top:10px;margin-bottom:20px;list-style:none;border:none;line-height:22px;text-indent:2em;text-align:justify;color:rgb(51,51,51);font-family:Arial;font-size:12px;white-space:normal;\">All Flyin Optronics’ 2×2 Mechanical Fiber Optic Switch(2X2 Optical Switch) support all wavelength at 1260nm~1650nm, it offers ultra-high reliability, low insertion loss, fast switching speed as well as bi-directional performance. The optical switches are widely used for Optical Network, Protection, Transmitter and Receiver Protection,Network Test System and Instrumentations.</p><p style=\"padding:0px;margin-top:10px;margin-bottom:20px;list-style:none;border:none;line-height:22px;text-indent:2em;text-align:justify;color:rgb(51,51,51);font-family:Arial;font-size:12px;white-space:normal;\">Thanks to our strict quality supervision, our fiber optic switches are very well received among our customers. Please don\'t hesitate to contact us for more details!</p><p><br /></p>','yes');/* MySQLReback Separation */
 /* 插入数据 `flyin_news` */
 INSERT INTO `flyin_news` VALUES ('7','0','sss','ssssssss','2017-07/10/5962f48aa82da.png','yes','yes','2017-07-10 11:29:14','2017-07-13','<table width=\"668\"><tbody><tr class=\"firstRow\"><td valign=\"top\" width=\"74\" style=\"background-color:rgb(127,127,127);border-width:1px;border-style:solid;\"><br /></td><td valign=\"top\" width=\"74\" style=\"background-color:rgb(127,127,127);border-width:1px;border-style:solid;\"><br /></td><td valign=\"top\" width=\"74\" style=\"background-color:rgb(127,127,127);border-width:1px;border-style:solid;\"><br /></td><td valign=\"top\" width=\"74\" style=\"background-color:rgb(127,127,127);border-width:1px;border-style:solid;\"><br /></td><td valign=\"top\" width=\"74\" style=\"background-color:rgb(127,127,127);border-width:1px;border-style:solid;\"><br /></td><td valign=\"top\" width=\"74\" style=\"background-color:rgb(127,127,127);border-width:1px;border-style:solid;\"><br /></td><td valign=\"top\" width=\"74\" style=\"background-color:rgb(127,127,127);border-width:1px;border-style:solid;\"><br /></td><td valign=\"top\" width=\"74\" style=\"background-color:rgb(127,127,127);border-width:1px;border-style:solid;\"><br /></td><td valign=\"top\" width=\"75\" style=\"background-color:rgb(127,127,127);border-width:1px;border-style:solid;\"><br /></td></tr><tr><td valign=\"top\" width=\"74\" style=\"background-color:rgb(127,127,127);border-width:1px;border-style:solid;\"><br /></td><td valign=\"top\" width=\"74\" style=\"background-color:rgb(127,127,127);border-width:1px;border-style:solid;\"><br /></td><td valign=\"top\" width=\"74\" style=\"background-color:rgb(127,127,127);border-width:1px;border-style:solid;\"><br /></td><td valign=\"top\" width=\"74\" style=\"background-color:rgb(127,127,127);border-width:1px;border-style:solid;\"><br /></td><td valign=\"top\" width=\"74\" style=\"background-color:rgb(127,127,127);border-width:1px;border-style:solid;\"><br /></td><td valign=\"top\" width=\"74\" style=\"background-color:rgb(127,127,127);border-width:1px;border-style:solid;\"><br /></td><td valign=\"top\" width=\"74\" style=\"background-color:rgb(127,127,127);border-width:1px;border-style:solid;\"><br /></td><td valign=\"top\" width=\"74\" style=\"background-color:rgb(127,127,127);border-width:1px;border-style:solid;\"><br /></td><td valign=\"top\" width=\"75\" style=\"background-color:rgb(127,127,127);border-width:1px;border-style:solid;\"><br /></td></tr><tr><td valign=\"top\" width=\"74\" style=\"background-color:rgb(127,127,127);border-width:1px;border-style:solid;\"><br /></td><td valign=\"top\" width=\"74\" style=\"background-color:rgb(127,127,127);border-width:1px;border-style:solid;\"><br /></td><td valign=\"top\" width=\"74\" style=\"background-color:rgb(127,127,127);border-width:1px;border-style:solid;\"><br /></td><td valign=\"top\" width=\"74\" style=\"background-color:rgb(127,127,127);border-width:1px;border-style:solid;\"><br /></td><td valign=\"top\" width=\"74\" style=\"background-color:rgb(127,127,127);border-width:1px;border-style:solid;\"><br /></td><td valign=\"top\" width=\"74\" style=\"background-color:rgb(127,127,127);border-width:1px;border-style:solid;\"><br /></td><td valign=\"top\" width=\"74\" style=\"background-color:rgb(127,127,127);border-width:1px;border-style:solid;\"><br /></td><td valign=\"top\" width=\"74\" style=\"background-color:rgb(127,127,127);border-width:1px;border-style:solid;\"><br /></td><td valign=\"top\" width=\"75\" style=\"background-color:rgb(127,127,127);border-width:1px;border-style:solid;\"><br /></td></tr><tr><td valign=\"top\" width=\"74\" style=\"background-color:rgb(127,127,127);border-width:1px;border-style:solid;\"><br /></td><td valign=\"top\" width=\"74\" style=\"background-color:rgb(127,127,127);border-width:1px;border-style:solid;\"><br /></td><td valign=\"top\" width=\"74\" style=\"background-color:rgb(127,127,127);border-width:1px;border-style:solid;\"><br /></td><td valign=\"top\" width=\"74\" style=\"background-color:rgb(127,127,127);border-width:1px;border-style:solid;\"><br /></td><td valign=\"top\" width=\"74\" style=\"background-color:rgb(127,127,127);border-width:1px;border-style:solid;\"><br /></td><td valign=\"top\" width=\"74\" style=\"background-color:rgb(127,127,127);border-width:1px;border-style:solid;\"><br /></td><td valign=\"top\" width=\"74\" style=\"background-color:rgb(127,127,127);border-width:1px;border-style:solid;\"><br /></td><td valign=\"top\" width=\"74\" style=\"background-color:rgb(127,127,127);border-width:1px;border-style:solid;\"><br /></td><td valign=\"top\" width=\"75\" style=\"background-color:rgb(127,127,127);border-width:1px;border-style:solid;\"><br /></td></tr><tr><td valign=\"top\" width=\"74\" style=\"background-color:rgb(127,127,127);border-width:1px;border-style:solid;\"><br /></td><td valign=\"top\" width=\"74\" style=\"background-color:rgb(127,127,127);border-width:1px;border-style:solid;\"><br /></td><td valign=\"top\" width=\"74\" style=\"background-color:rgb(127,127,127);border-width:1px;border-style:solid;\"><br /></td><td valign=\"top\" width=\"74\" style=\"background-color:rgb(127,127,127);border-width:1px;border-style:solid;\"><br /></td><td valign=\"top\" width=\"74\" style=\"background-color:rgb(127,127,127);border-width:1px;border-style:solid;\"><br /></td><td valign=\"top\" width=\"74\" style=\"background-color:rgb(127,127,127);border-width:1px;border-style:solid;\"><br /></td><td valign=\"top\" width=\"74\" style=\"background-color:rgb(127,127,127);border-width:1px;border-style:solid;\"><br /></td><td valign=\"top\" width=\"74\" style=\"background-color:rgb(127,127,127);border-width:1px;border-style:solid;\"><br /></td><td valign=\"top\" width=\"75\" style=\"background-color:rgb(127,127,127);border-width:1px;border-style:solid;\"><br /></td></tr></tbody></table><p>请在此处输入新闻详情。sssssssssssssssssssssssss<br /></p><p style=\"text-align:center;\"><img src=\"/ueditor/php/upload/image/20170711/1499764739540522.png\" title=\"1499764739540522.png\" alt=\"1499764739540522.png\" /></p><p><br /></p><table><tbody><tr class=\"firstRow\"><td width=\"47\" valign=\"top\">1</td><td width=\"47\" valign=\"top\">1</td><td width=\"47\" valign=\"top\">1</td><td width=\"47\" valign=\"top\">1</td><td width=\"47\" valign=\"top\">1</td><td width=\"47\" valign=\"top\">1</td><td valign=\"top\" rowspan=\"6\" colspan=\"1\">11111111111111111111111111</td></tr><tr><td width=\"47\" valign=\"top\">1</td><td width=\"47\" valign=\"top\">1</td><td width=\"47\" valign=\"top\">1</td><td width=\"47\" valign=\"top\">1</td><td width=\"47\" valign=\"top\">1</td><td width=\"47\" valign=\"top\"><br /></td></tr><tr><td width=\"47\" valign=\"top\">1</td><td width=\"47\" valign=\"top\">1</td><td width=\"47\" valign=\"top\">1</td><td width=\"47\" valign=\"top\">1</td><td width=\"47\" valign=\"top\">1</td><td width=\"47\" valign=\"top\">1</td></tr><tr><td width=\"47\" valign=\"top\">1</td><td width=\"47\" valign=\"top\">1</td><td width=\"47\" valign=\"top\">1</td><td width=\"47\" valign=\"top\">1</td><td width=\"47\" valign=\"top\">1</td><td width=\"47\" valign=\"top\"><br /></td></tr><tr><td width=\"47\" valign=\"top\">1</td><td width=\"47\" valign=\"top\">1</td><td width=\"47\" valign=\"top\"><br /></td><td width=\"47\" valign=\"top\">1</td><td width=\"47\" valign=\"top\"><br /></td><td width=\"47\" valign=\"top\"><br /></td></tr><tr><td width=\"47\" valign=\"top\"><br /></td><td width=\"47\" valign=\"top\"><br /></td><td width=\"47\" valign=\"top\"><br /></td><td width=\"47\" valign=\"top\"><br /></td><td width=\"47\" valign=\"top\"><br /></td><td width=\"47\" valign=\"top\"><br /></td></tr></tbody></table><p><br /></p><table><tbody><tr class=\"firstRow\"><td width=\"207\" valign=\"top\">4444444444444</td><td width=\"207\" valign=\"top\">444444444444445</td><td width=\"207\" valign=\"top\">555555555555555555</td></tr><tr><td width=\"207\" valign=\"top\"><br /></td><td width=\"207\" valign=\"top\"><br /></td><td width=\"207\" valign=\"top\"><br /></td></tr></tbody></table><table><tbody><tr class=\"firstRow\"><td style=\"border:1px solid rgb(221,221,221);\" width=\"76\" valign=\"top\">555555555555555555</td><td style=\"border:1px solid #ddd;\" width=\"76\" valign=\"top\"><br /></td><td style=\"border:1px solid #ddd;\" width=\"76\" valign=\"top\"><br /></td><td style=\"border:1px solid #ddd;\" width=\"76\" valign=\"top\"><br /></td><td style=\"border:1px solid #ddd;\" width=\"76\" valign=\"top\"><br /></td><td style=\"border:1px solid #ddd;\" width=\"76\" valign=\"top\"><br /></td><td style=\"border:1px solid #ddd;\" width=\"76\" valign=\"top\"><br /></td></tr><tr><td style=\"border:1px solid #ddd;\" width=\"76\" valign=\"top\"><br /></td><td style=\"border:1px solid #ddd;\" width=\"76\" valign=\"top\"><br /></td><td style=\"border:1px solid #ddd;\" width=\"76\" valign=\"top\"><br /></td><td style=\"border:1px solid #ddd;\" width=\"76\" valign=\"top\"><br /></td><td style=\"border:1px solid #ddd;\" width=\"76\" valign=\"top\"><br /></td><td style=\"border:1px solid #ddd;\" width=\"76\" valign=\"top\"><br /></td><td style=\"border:1px solid #ddd;\" width=\"76\" valign=\"top\"><br /></td></tr><tr><td style=\"border:1px solid #ddd;\" width=\"76\" valign=\"top\"><br /></td><td style=\"border:1px solid #ddd;\" width=\"76\" valign=\"top\"><br /></td><td style=\"border:1px solid #ddd;\" width=\"76\" valign=\"top\"><br /></td><td style=\"border:1px solid #ddd;\" width=\"76\" valign=\"top\"><br /></td><td style=\"border:1px solid #ddd;\" width=\"76\" valign=\"top\"><br /></td><td style=\"border:1px solid #ddd;\" width=\"76\" valign=\"top\"><br /></td><td style=\"border:1px solid #ddd;\" width=\"76\" valign=\"top\"><br /></td></tr><tr><td style=\"border:1px solid #ddd;\" width=\"76\" valign=\"top\"><br /></td><td style=\"border:1px solid #ddd;\" width=\"76\" valign=\"top\"><br /></td><td style=\"border:1px solid #ddd;\" width=\"76\" valign=\"top\"><br /></td><td style=\"border:1px solid #ddd;\" width=\"76\" valign=\"top\"><br /></td><td style=\"border:1px solid #ddd;\" width=\"76\" valign=\"top\"><br /></td><td style=\"border:1px solid #ddd;\" width=\"76\" valign=\"top\"><br /></td><td style=\"border:1px solid #ddd;\" width=\"76\" valign=\"top\"><br /></td></tr><tr><td style=\"border:1px solid #ddd;\" width=\"76\" valign=\"top\"><br /></td><td style=\"border:1px solid #ddd;\" width=\"76\" valign=\"top\"><br /></td><td style=\"border:1px solid #ddd;\" width=\"76\" valign=\"top\"><br /></td><td style=\"border:1px solid #ddd;\" width=\"76\" valign=\"top\"><br /></td><td style=\"border:1px solid #ddd;\" width=\"76\" valign=\"top\"><br /></td><td style=\"border:1px solid #ddd;\" width=\"76\" valign=\"top\"><br /></td><td style=\"border:1px solid #ddd;\" width=\"76\" valign=\"top\"><br /></td></tr></tbody></table><p><img src=\"/ueditor/php/upload/image/20170719/1500455237123527.jpg\" alt=\"flyinlogo\" width=\"500\" height=\"500\" border=\"0\" vspace=\"0\" title=\"flyinlogo\" style=\"width:500px;height:500px;\" /></p><p><img src=\"/ueditor/php/upload/image/20170719/1500455237123527.jpg\" alt=\"1500455237123527.jpg\" /></p><p><br /></p>','yes');/* MySQLReback Separation */
 /* 插入数据 `flyin_news` */
 INSERT INTO `flyin_news` VALUES ('8','0','','ssss','','yes','no','2017-07-10 12:00:39','','<p style=\"text-align:center;\"><img src=\"/ueditor/php/upload/image/20170711/1499766908109404.png\" alt=\"1499766908109404.png\" width=\"292\" height=\"123\" style=\"width:292px;height:123px;\" /></p><h1 style=\"font-family:Arial, Helvetica, sans-serif;white-space:normal;background-color:rgb(255,255,255);\"><span style=\"font-family:Arial;\"></span></h1><h1 style=\"font-family:Arial, Helvetica, sans-serif;white-space:normal;background-color:rgb(255,255,255);text-align:left;\"><span style=\"font-family:Arial;\">Meet Flyin Team at OFC 2015 in California USA</span></h1><p style=\"font-family:Arial, Helvetica, sans-serif;font-size:12px;white-space:normal;background-color:rgb(255,255,255);text-align:left;\"><span style=\"font-family:Arial;\">OFC is the largest global conferences and expositions for optical communications and networking professional.</span></p><p style=\"font-family:Arial, Helvetica, sans-serif;font-size:12px;white-space:normal;background-color:rgb(255,255,255);text-align:left;\"><span style=\"font-family:Arial;\">As a leading manufacturer and reliable expert of fiber optical product, Flyin Optronics Co., Ltd will be attend to</span></p><p style=\"font-family:Arial, Helvetica, sans-serif;font-size:12px;white-space:normal;background-color:rgb(255,255,255);text-align:left;\"><span style=\"font-family:Arial;\">the 40th OFC 2015 at California USA.</span></p><p style=\"font-family:Arial, Helvetica, sans-serif;font-size:12px;white-space:normal;background-color:rgb(255,255,255);text-align:left;\"><span style=\"font-family:Arial;\">With around 9 years’ stable growth, Flyin Optronics become one of the biggest suppliers of passive and active</span></p><p style=\"font-family:Arial, Helvetica, sans-serif;font-size:12px;white-space:normal;background-color:rgb(255,255,255);text-align:left;\"><span style=\"font-family:Arial;\">components all over the world. There are three main parts in our business range: Passive Components, Active</span></p><p style=\"font-family:Arial, Helvetica, sans-serif;font-size:12px;white-space:normal;background-color:rgb(255,255,255);text-align:left;\"><span style=\"font-family:Arial;\">Components and System Integrated solutions. If you want to know more detail information about them, welcome</span></p><p style=\"font-family:Arial, Helvetica, sans-serif;font-size:12px;white-space:normal;background-color:rgb(255,255,255);text-align:left;\"><span style=\"font-family:Arial;\">to meet us at the exhibition. It is our pleasure to show you more.</span></p><p style=\"font-family:Arial, Helvetica, sans-serif;font-size:12px;white-space:normal;background-color:rgb(255,255,255);\"> </p><p style=\"font-family:Arial, Helvetica, sans-serif;font-size:12px;white-space:normal;background-color:rgb(255,255,255);text-align:left;\"><strong><span style=\"font-family:Arial;\">OFC exhibition detail information of Flyin as follow:</span></strong></p><p style=\"font-family:Arial, Helvetica, sans-serif;font-size:12px;white-space:normal;background-color:rgb(255,255,255);text-align:left;\"><span style=\"font-family:Arial;\">Address:</span><strong><span style=\"font-family:Arial;\"> Los Angeles Convention Center, California, USA</span></strong></p><p style=\"font-family:Arial, Helvetica, sans-serif;font-size:12px;white-space:normal;background-color:rgb(255,255,255);text-align:left;\"><span style=\"font-family:Arial;\">Time:</span><strong><span style=\"font-family:Arial;\"> 24-26 March 2015</span></strong></p><p style=\"font-family:Arial, Helvetica, sans-serif;font-size:12px;white-space:normal;background-color:rgb(255,255,255);text-align:left;\"><span style=\"font-family:Arial;\">Booth NO.: </span><strong><span style=\"font-family:Arial;\">1559</span></strong></p><p style=\"text-align:center;\"><br /></p>','yes'),('9','0','','9999999','','yes','no','2017-07-10 17:32:48','','<p>请在此处输入新闻详情。</p><p>11111111111</p><p>ll</p>','yes'),('10','0','','111111111111','','no','yes','2017-07-11 09:58:48','2017-07-13','<p style=\"text-align:center;\"><img src=\"/ueditor/php/upload/image/20170711/1499767082645691.png\" alt=\"1499767082645691.png\" /></p><p><br /></p>','yes'),('11','0','1','111','','no','no','2017-07-12 17:51:42','','<p><img src=\"/ueditor/php/upload/image/20170719/1500455237123527.jpg\" alt=\"1500455237123527.jpg\" />请在此处输入新闻详情。<img src=\"/ueditor/php/upload/image/20170713/1499913751514832.png\" title=\"1499913751514832.png\" alt=\"QQ截图20170509174704.png\" /></p>','yes'),('12','15','1200','111111111111','','yes','yes','2017-08-01 10:19:19','2017-08-09','<p>请在此处输入新闻详情。<img src=\"/ueditor/php/upload/image/20170727/1501126171462624.png\" alt=\"1501126171462624.png\" /></p>','no');/* MySQLReback Separation */
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
) ENGINE=InnoDB AUTO_INCREMENT=272 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `flyin_parameter` */
 INSERT INTO `flyin_parameter` VALUES ('271','18','参数名','参数信息...');/* MySQLReback Separation */
 /* 创建表结构 `flyin_pdf` */
 DROP TABLE IF EXISTS `flyin_pdf`;/* MySQLReback Separation */ CREATE TABLE `flyin_pdf` (
  `pdf_id` int(5) NOT NULL AUTO_INCREMENT COMMENT 'PDF的ID',
  `goods_id` int(5) NOT NULL COMMENT '商品ID',
  `goods_pdf` varchar(255) NOT NULL COMMENT 'PDF的路径',
  PRIMARY KEY (`pdf_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 创建表结构 `flyin_servicecategory` */
 DROP TABLE IF EXISTS `flyin_servicecategory`;/* MySQLReback Separation */ CREATE TABLE `flyin_servicecategory` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(20) NOT NULL,
  `pid` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `flyin_servicecategory` */
 INSERT INTO `flyin_servicecategory` VALUES ('1',' Technical Support','0'),('2','Solutions','0');/* MySQLReback Separation */
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
 INSERT INTO `flyin_services` VALUES ('3','1','003','数字视频光端机的原理及其应用','','yes','yes','2014-07-31','2017-05-26 13:52:23','','<p style=\"color:rgb(0,0,0);font-family:Arial, Helvetica, sans-serif;font-size:12px;line-height:normal;white-space:normal;\">一、 概述</p><p style=\"color:rgb(0,0,0);font-family:Arial, Helvetica, sans-serif;font-size:12px;line-height:normal;white-space:normal;\">当今世界，光纤通信已成为通信的主要手段。同时，光纤通讯技术也在飞速的发展，使得光纤传输系统以其众多的优点，赢得了大家的青睐。</p><p style=\"color:rgb(0,0,0);font-family:Arial, Helvetica, sans-serif;font-size:12px;line-height:normal;white-space:normal;\">光纤传输系统具有以下显著优点：容量大、传输距离远。光纤理论带宽可达20000GHz，无中继传输距离可达50-80公里。由玻璃制成，抗电磁干扰、传输质量好，可用于电力网和变电所内等强电磁环境中。光纤重量轻，可以弯曲，易于铺设。可节约贵重金属，且抗腐蚀能力很强。制作光纤的原料丰富，随着工艺的进步、规模的扩大，其成本进一步下降，整个传输系统的成本也低。</p><p style=\"color:rgb(0,0,0);font-family:Arial, Helvetica, sans-serif;font-size:12px;line-height:normal;white-space:normal;\">二、 光纤传输系统简介</p><p style=\"color:rgb(0,0,0);font-family:Arial, Helvetica, sans-serif;font-size:12px;line-height:normal;white-space:normal;\">光纤传输即是以光波为载频，以光导纤维为传输介质的一种通信方式，因其拥有传输频带宽、信号损耗低、抗干扰能力强、重量轻等优点。光纤通信在近二十年来得到了飞速的发展。</p><p style=\"color:rgb(0,0,0);font-family:Arial, Helvetica, sans-serif;font-size:12px;line-height:normal;white-space:normal;\">1、光纤的结构</p><p style=\"color:rgb(0,0,0);font-family:Arial, Helvetica, sans-serif;font-size:12px;line-height:normal;white-space:normal;\">光纤裸纤一般分为三层：中心高折射率玻璃芯(芯径一般为50或62.5μm)，中间为低折射率硅玻璃包层(直径一般为125μm)，最外是加强用的树脂涂层。</p><p><br /></p>','no'),('4','2','001','光纤收发器解决方案','','yes','yes','2014-07-13','2017-07-12 17:49:55','','<p><span style=\"color:rgb(0,0,0);font-family:Arial, Helvetica, sans-serif;font-size:12px;line-height:normal;\">随着信息互联网的快速发展，人们对带宽的要求也越来越高，在传统的以太网中起连接作用的介质主要是双绞线。双绞线传输距离的极限大约为100米左右，如此短的传输距离制约了网络的发展，这也无疑使数据通讯质量受到影响。光纤收发器的运用，将以太网中的连接介质换为光纤。光纤的低损耗、高抗电磁干扰性，在使网络传输距离从200米扩展到2公里甚至几十公里，乃至于上百公里的同时，也使数据通讯质量有了较大提高。他使服务器、中继器、集线器、终端机与终端机之间的互联更加简捷。</span></p><p style=\"color:rgb(0,0,0);font-family:Arial, Helvetica, sans-serif;font-size:12px;line-height:normal;white-space:normal;\">在实际的应用中，光纤收发器主要有下面三种基本连接方式：</p><p style=\"color:rgb(0,0,0);font-family:Arial, Helvetica, sans-serif;font-size:12px;line-height:normal;white-space:normal;\">一、用户接入网</p><p style=\"color:rgb(0,0,0);font-family:Arial, Helvetica, sans-serif;font-size:12px;line-height:normal;white-space:normal;\">用户接入网利用光纤收发器带有的网管功能，可以对每一个分散用户点进行集中管理，光纤收发器的10Mbps/100Mbps自适应及10Mbps/100Mbps自动转换功能，为用户提供足够的带宽。也可以利用链路失败告警（LFA）功能，在点对点的传输中相互监控来代替集中网管功能，降低接入成本，同时利用半双工/全双工自适应及半双工/全双工自动转换功能，可以在用户端配置廉价的半双工HUB，几十倍的降低用户端的组网成本，提高网络运营商的竞争力。</p><p><br /></p>','no'),('5','2','455','454','','yes','yes','','2017-06-28 09:33:07','','<p>请在此处输入技术支持详情。545</p>','yes'),('6','2','455','454','','yes','yes','','2017-06-28 09:33:04','','<p>请在此处输入技术支持详情。545</p>','yes'),('7','2','','','','yes','no','','2017-06-28 09:33:03','','<p>请在此处输入技术支持详情。</p>','yes'),('8','2','','','','yes','no','','2017-06-28 09:33:01','','<p>请在此处输入技术支持详情。</p>','yes'),('9','2','','','','yes','no','','2017-06-28 09:32:58','','<p>请在此处输入技术支持详情。</p>','yes');/* MySQLReback Separation */
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
 INSERT INTO `flyin_website` VALUES ('1','Shenzhen Flyindata Optronics Co.,Ltd','4F, Deliwei Industrial Park, Longhua ,Shenzhen ,China 518109','Active Dept. Manager:  Liu','+86-15013592295','+86-755-32939630 / 32939629 / 32939631 / 32939632','+755-32939628','marketing@opticres.com','Shenzhen Flyindata Optronics Co.,Ltd   ©2009-2015  Flyindata All Right Reserved.','595e18d53545d.png','flyindata,Fiber Media Converter,Fiber Ethernet Swicth, Industrial PoE Switches,Industrial Media converter,Video Optical Converter','Flyindata Optronics Co.,Ltd, created in 2005, located in Shenzhen, China, belongs to Flyin Optronics Co.,Ltd ,specialized in providing high performance fiber optic communication products, broadcast, CATV and network industry worldwide.','Add: 4F, Deliwei Industrial Park, Longhua ,Shenzhen ,China 518109','飞宇集团','1');/* MySQLReback Separation */