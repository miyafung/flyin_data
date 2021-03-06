<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2014 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
// 应用入口文件

// 检测PHP环境
if(version_compare(PHP_VERSION,'5.3.0','<'))  die('require PHP > 5.3.0 !');

// 开启调试模式 建议开发阶段开启 部署阶段注释或者设为false
define('APP_DEBUG',True);
//define('APP_DEBUG',False);
//绑定默认入口模块为Admin,方便后台进入
//define('BIND_MODULE','Home','News');
//define('BIND_MODULE','Home');
//define('BIND_MODULE','Admin');

// 定义应用目录
define('APP_PATH','./Application/');

//开启Gzip压缩
define ( "GZIP_ENABLE", function_exists ( 'ob_gzhandler' ) );
ob_start ( GZIP_ENABLE ? 'ob_gzhandler' : null );

// 引入ThinkPHP入口文件
require './ThinkPHP/ThinkPHP.php';
const URL_COMPAT        =   3;  // 兼容模式
// 亲^_^ 后面不需要任何代码了 就是如此简单



