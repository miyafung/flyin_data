<?php
return array(
    /*
    //数据库配置
    'DB_TYPE' => 'MYSQL',       //数据库类型
    'DB_HOST' => '127.0.0.1',   //服务器地址
    'DB_NAME' => 'flyindata_cn', //数据库名
    'DB_USER' => 'root',        //用户名
    'DB_PWD' => 'root',       //密码
    'DB_PORT' => '3306',        //端口
    'DB_PREFIX' => 'flyin_',     //数据库表前缀
    'DB_CHARSET' => 'utf8',     //数据库编码
    */

    //模块
    'MODULE_ALLOW_LIST' => array('Home','Admin','En','EnAdmin'),
//  'DEFAULT_MODULE' => 'Home',
    //布局
    'LAYOUT_ON' => true,
    'LAYOUT_NAME' => 'layout',
    //输入过滤
    'DEFAULT_FILTER' =>  'htmlspecialchars,trim', //默认过滤函数
    'VAR_AUTO_STRING' => true,  //默认强制转换为字符串类型
    //其它配置

    // URL地址不区分大小写 miya
    'URL_CASE_INSENSITIVE' => true,

    // 'URL_MODEL' => 2,   //URL模式：Rewrite
    'URL_MODEL' => 2,   //URL模式：Rewrite

    //继续简化目录
    //  'URL_PATHINFO_DEPR' => '_',

    //'TOKEN_ON' => true, //开启表单令牌

   // 'SHOW_PAGE_TRACE' => APP_DEBUG, //显示调试信息

    // 'URL_PATHINFO_DEPR' => '_',

    // 'HTTP_CACHE_CONTROL' => 'private,no-transform', // 网页缓存控制  禁止转码

    //错误页面跳转404
    'TMPL_EXCEPTION_FILE' => '__PUBLIC__/404.html',

);
