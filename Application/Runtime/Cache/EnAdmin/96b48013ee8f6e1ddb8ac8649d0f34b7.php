<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
<title>深圳市飞宇集团有源部(英文后台)</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="/Public/bs/css/bootstrap.min.css" />
<link rel="stylesheet" href="/Public/bs/css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="/Public/bs/css/fullcalendar.css" />
<link rel="stylesheet" href="/Public/bs/css/matrix-style.css" />
<link rel="stylesheet" href="/Public/bs/css/matrix-media.css" />
<link  rel="stylesheet"  href="/Public/bs/font-awesome/css/font-awesome.css"/>

<link rel="stylesheet" href="/Public/bs/css/uniform.css">
<link rel="stylesheet" href="/Public/bs/css/select2.css">
<script type="text/javascript" src="/Public/Admin/js/jquery.js"></script><!--这是鼠标移入放大效果后台使用的-->
  <script src="/Public/Home/js/jquery-1.11.0.min.js" type="text/javascript"></script>
  
</head>
<body>

<!--Header2ader-part-->
<div id="header">
  <h1><a href="dashboard.html">flyindata</a></h1>
</div>
<!--clHeader2ader-part-->
<!--Header2ader-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">欢迎<?php echo ($admin_name); ?></span><b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a href="#"><i class="icon-user"></i> My Profile</a></li>
        <li class="divider"></li>
        <li><a href="<?php echo U('Login/logout');?>"><i class="icon-key"></i> Log Out</a></li>
      </ul>
    </li>

    <li class=""><a title="" href="#"><i class="icon icon-cog"></i> <span class="text">设置</span></a></li>
    <li class=""><a title="" href="<?php echo U('Login/index');?>"><i class="icon icon-signout"></i> <span class="text">首页</span></a></li>
    <li class=""><a href="/En" target="_blank"><i class="icon icon-share-alt"></i><span class="text">前台</span></a></li>
    <li class=""><a title="" href="<?php echo U('Login/Logout');?>"><i class="icon icon-off"></i> <span class="text">退出</span></a></li>
  </ul>
</div>
<!--close-Header2ader-menu-->
<!--start-top-serch-->
<div id="search">
  <form action="<?php echo U('Goods/index');?>" method="post">
    <input type="search" name="keywords"  placeholder="请输入产品名字..." />
    <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
  </form>
</div>
<!--close-top-serch-->
<!--sidebar-menu-->
<!--左侧菜单栏目-->
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> 网站</a>
  <ul>
    <li class="active"><a href="<?php echo U('Index/index');?>"><i class="icon icon-home"></i> <span>英文后台首页</span></a> </li>

    <li class="submenu"> <a href="#"><i class="icon  icon-picture"></i> <span>banner管理</span>
      <span class="label label-important"  id="myspan"></span>
    </a>

      <ul class="a br">
        <li><a href="<?php echo U('Banners/index');?>">banner列表</a></li>
        <li><a href="<?php echo U('Banners/add');?>">banner添加</a></li>
        <li><a href="<?php echo U('Bannercategory/add');?>">分类添加</a></li>
        <li><a href="<?php echo U('Bannercategory/index');?>">分类列表</a></li>
        <li><a href="<?php echo U('Bannerrecycle/index');?>">banner回收站</a></li>
      </ul>
    </li>

    <li class="submenu"> <a href="#"><i class="icon  icon-th-large"></i> <span>产品管理</span> <span class="label label-important" id="myspan1"></span></a>
      <ul class="gr">
        <li><a href="<?php echo U('Goods/add');?>">商品添加</a></li>
        <li><a href="<?php echo U('Goods/view');?>">商品列表</a></li>
        <li><a href="<?php echo U('Category/add');?>">分类添加</a></li>
        <li><a href="<?php echo U('Category/view');?>">分类列表</a></li>
      </ul>
    </li>

    <li class="submenu"> <a href="#"><i class="icon icon-bar-chart"></i> <span>新闻管理</span> <span class="label label-important" id="myspan2"></span></a>
      <ul class="xr">
        <li><a href="<?php echo U('News/add');?>">新闻添加</a></li>
        <li><a href="<?php echo U('News/index');?>">新闻列表</a></li>
        <li><a href="<?php echo U('Newcategory/add');?>">新闻分类添加</a></li>
        <li><a href="<?php echo U('Newcategory/index');?>">新闻分类列表</a></li>
        <li><a href="<?php echo U('Newrecycle/index');?>">新闻回收站</a></li>
      </ul>
    </li>

    <li class="submenu"> <a href="#"><i class="icon  icon-picture"></i> <span>方案支持</span> <span class="label label-important" id="myspan3"></span></a>
      <ul class="ffr">
        <li><a href="<?php echo U('Services/index');?>">方案支持列表</a></li>
        <li><a href="<?php echo U('Services/add');?>">方案添加</a></li>
        <li><a href="<?php echo U('Servicecategory/add');?>">分类添加</a></li>
        <li><a href="<?php echo U('Servicecategory/index');?>">分类列表</a></li>
        <li><a href="<?php echo U('Servicerecycle/index');?>">方案回收站</a></li>
      </ul>
    </li>

    <li class="submenu"> <a href="#"><i class="icon icon-info-sign"></i> <span>管理员管理</span> <span class="label label-important" id="myspan5">3</span></a>
      <ul class="yh">
        <li><a href="<?php echo U('Admin/lst');?>">管理员列表</a></li>
      </ul>
    <li class="submenu"> <a href="#"><i class="icon icon-info-sign"></i> <span>关于我们</span> <span class="label label-important" id="myspan5">3</span></a>
      <ul class="">
        <li><a href="<?php echo U('AboutUs/index');?>">关于我们</a></li>
      </ul>

    <li class="submenu"> <a href="#"><i class="icon  icon-cogs"></i> <span>系统配置</span> <span class="label label-important" id="myspan4"></span></a>
      <ul class="wr">
       <!-- <li><a href="<?php echo U('User/index');?>">网站结构</a></li>
        <li><a href="<?php echo U('Config/email');?>">邮箱配置</a></li>-->
        <li><a href="<?php echo U('WebSet/index');?>">网站配置</a></li>
        <li><a href="<?php echo U('FriendLink/index');?>">友情链接</a></li>
        <li><a href="<?php echo U('Bak/index');?>">数据库备份</a></li>
      <!--  <li><a href="<?php echo U('Mail/index');?>">邮件发送链接</a></li>-->
      </ul>
    </li>
    <li class="submenu"> <a href="#"><i class="icon icon-info-sign"></i> <span>管理员管理</span> <span class="label label-important" id="myspan5">1</span></a>
      <ul class="yh">
        <li><a href="<?php echo U('Admin/lst');?>">管理员列表</a></li>
      </ul>

    <li class="submenu"> <a href="#"><i class="icon  icon-cogs"></i> <span>互动</span> <span class="label label-important" id=""></span></a>
      <ul class="wr">
       <!-- <li><a href="">客户询盘</a></li>-->
        <li><a href="<?php echo U('Message/index');?>">网站留言</a></li>
        <li><a href="<?php echo U('Searchkeyword/index');?>">关键字记录</a></li>
        <li><a href="<?php echo U('Ipdb/index');?>">访客日志</a></li>
      </ul>
    </li>

    <li><a href="<?php echo U('Pdf/index');?>"><i class="icon icon-home"></i> <span>PDF查询系统</span></a> </li>

    <li><a href="<?php echo U('Map/index');?>"><i class="icon  icon-globe"></i> <span>地图</span></a> </li>


    <li class="content">
      <span><a style="size:40px;" href="/Admin">切换到中文后台</a></span>
    </li>

    <li class="content">
      <span><a href="<?php echo U('Common/makeurl');?>">生成网站快捷方式</a></span>
    </li>

  </ul>
</div>
<!--sidebar-menu-->

<!--main-container-part-->
<div id="content">
  <div class="item">

<!--面包屑和标题--->
<div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> 管理员</a> <a href="#" class="current">管理员添加</a> </div>
    <h1>管理员添加</h1>
</div>

<div class="container-fluid">
    <hr>
    <div class="row-fluid">
        <div class="span12">
            <div class="top-button">
               <a href="<?php echo U('Admin/add');?>" class="btn btn-primary">添加管理员</a>
            </div>

                    <table class="table table-bordered table-striped">
                        <thead class="">
                        <tr>
                            <th class="text-center">ID</th>
                            <th class="text-center">用户名称</th>
                            <th class="text-center">密码</th>
                            <th class="text-center">添加时间</th>
                            <th class="text-center">操作</th>

                        </tr>
                        </thead>
                        <tbody>

                        <?php if(is_array($adminres)): $i = 0; $__LIST__ = $adminres;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                                <td align="center"><?php echo ($vo["id"]); ?></td>
                                <td align="center"><?php echo ($vo["username"]); ?></td>
                                <td align="center"><?php echo ($vo["password"]); ?></td>
                                <td align="center"><?php echo ($vo["add_time"]); ?></td>
                                <td align="center">
                                    <a href="/EnAdmin/Admin/edit/id/<?php echo ($vo["id"]); ?>" class="btn btn-primary btn-sm shiny">
                                        <i class="fa fa-edit"></i> 编辑
                                    </a>
                                    <a href="/EnAdmin/Admin/del/id/<?php echo ($vo["id"]); ?>" class="btn btn-danger btn-sm shiny">
                                        <i class="fa fa-trash-o"></i> 删除
                                    </a>
                                </td>
                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                    </table>
                    <div style="height:40px;">
                        <ul class="pagination" style="float:right; margin:10px 0 0 0; ">
                            <?php echo ($page); ?>
                        </ul>
                    </div>
                </div>
                <div>

</div>
    </div>
    </div></div>

<!--面板屑 breadcrumbs
  <div id="content-header">
    <div id="breadcrumb"> <a hrindex1.htmlhtml" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
  </div>
  -->
<!--End-breadcrumbs-->

<!--Action boxes-->
  <div class="container-fluid">

<!--End-Chart-box-->
    <hr/>
    <div class="row-fluid">
      <div class="span12">


      </div>
    </div>
  </div>
</div>

<!--Footer-part-->
<div class="row-fluid">
  <div id="footer" class="span12"> Copyright@ 2013-2018 深圳市飞宇集团有源部 版权所有：飞宇集团<a href="http://flyindata.com.cn/">flyindata.com.cn</a> </div>
</div>
<!--end-Footer-part-->


</body>
</html>


<script src="/Public/bs/js/jquery.min.js"></script>
<script src="/Public/bs/js/jquery.ui.custom.js"></script>
<script src="/Public/bs/js/bootstrap.min.js"></script>
<script src="/Public/bs/js/jquery.peity.min.js"></script>
<script src="/Public/bs/js/fullcalendar.min.js"></script>
<script src="/Public/bs/js/matrix.js"></script>
<script src="/Public/bs/js/matrix.dashboard.js"></script>

<script src="/Public/bs/js/matrix.interface.js"></script>
<script src="/Public/bs/js/matrix.chat.js"></script>


<script src="/Public/bs/js/jquery.wizard.js"></script>
<script src="/Public/bs/js/jquery.uniform.js"></script>
<script src="/Public/bs/js/select2.min.js"></script>
<script src="/Public/bs/js/matrix.popover.js"></script>
<script src="/Public/bs/js/jquery.dataTables.min.js"></script>
<script src="/Public/bs/js/matrix.tables.js"></script>




<script type="text/javascript">
    // This function is called from the pop-up menus to transfer to
    // a different page. Ignore if the value returned is a null string:
    function goPage (newURL) {

        // if url is empty, skip the menu dividers and reset the menu selection to default
        if (newURL != "") {

            // if url is "-", it is this page -- reset the menu:
            if (newURL == "-" ) {
                resetMenu();
            }
            // else, send page to designated URL
            else {
                document.location.href = newURL;
            }
        }
    }

    // resets the menu selection upon entry to this page:
    function resetMenu() {
        document.gomenu.selector.selectedIndex = 2;
    }


// 获取长度
    $('.a').children().length;
</script>



<!-- Admin页面 li个数计算 -->
<script src="/Public/Common/js/jquery.min.js"></script>
<script  language="javascript" type="text/javascript">
    $(document).ready(function(){
        var j=$('.br li').size();//获得class为mm的font标签的数目      banner部分
        var g=$('.gr li').size();//获得class为mm的font标签的数目      商品部分
        var x=$('.xr li').size();//获得class为mm的font标签的数目     新闻部分
        var f=$('.ffr li').size();//获得class为mm的font标签的数目     方案部分
        var w=$('.wr li').size();//获得class为mm的font标签的数目      网站部分
        var h=$('.yh li').size();//获得class为mm的font标签的数目      用户部分
        $('#myspan').html(j);
        $('#myspan1').html(g);
        $('#myspan2').html(x);
        $('#myspan3').html(f);
        $('#myspan4').html(w);
        $('#myspan5').html(h);

    })

</script>