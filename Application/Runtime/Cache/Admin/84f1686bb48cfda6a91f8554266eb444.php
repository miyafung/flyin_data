<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <title>深圳市飞宇集团有源部(中文后台)</title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="/Public/bs/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="/Public/bs/css/bootstrap-responsive.min.css"/>
    <link rel="stylesheet" href="/Public/bs/css/fullcalendar.css"/>
    <link rel="stylesheet" href="/Public/bs/css/matrix-style.css"/>
    <link rel="stylesheet" href="/Public/bs/css/matrix-media.css"/>
    <link rel="stylesheet" href="/Public/bs/font-awesome/css/font-awesome.css"/>

    <link rel="stylesheet" href="/Public/bs/css/uniform.css">
    <link rel="stylesheet" href="/Public/bs/css/select2.css">
    <script type="text/javascript" src="/Public/Admin/js/jquery.js"></script><!--这是鼠标移入放大效果后台使用的-->
    <script src="/Public/Home/js/jquery-1.11.0.min.js" type="text/javascript"></script>

</head>
<body>

<!--Header2ader-part-->
<div id="header">
    <h1><a href="#">flyindata</a></h1>
</div>
<!--clHeader2ader-part-->
<!--Header2ader-menu-->
<div id="user-nav" class="navbar navbar-inverse">
    <ul class="nav">
        <li class="dropdown" id="profile-messages"><a title="" href="#" data-toggle="dropdown"
                                                      data-target="#profile-messages" class="dropdown-toggle"><i
                class="icon icon-user"></i> <span class="text">欢迎<?php echo ($admin_name); ?></span><b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="#"><i class="icon-user"></i> My Profile</a></li>
                <li class="divider"></li>
                <li><a href="<?php echo U('Login/logout');?>"><i class="icon-key"></i> Log Out</a></li>
            </ul>
        </li>

        <li class=""><a title="" href="#"><i class="icon icon-cog"></i> <span class="text">设置</span></a></li>
        <li class=""><a title="" href="<?php echo U('Login/index');?>"><i class="icon icon-signout"></i> <span
                class="text">首页</span></a></li>
        <li class=""><a href="/" target="_blank"><i class="icon icon-share-alt"></i><span class="text">前台</span></a>
        </li>
        <li class=""><a title="" href="<?php echo U('Login/Logout');?>"><i class="icon icon-off"></i> <span class="text">退出</span></a>
        </li>
    </ul>
</div>
<!--close-Header2ader-menu-->
<!--start-top-serch-->
<div id="search">
    <form action="<?php echo U('Goods/index');?>" method="post">
        <input type="search" name="keywords" placeholder="请输入产品名字..."/>
        <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
    </form>
</div>
<!--close-top-serch-->
<!--sidebar-menu-->
<!--左侧菜单栏目-->
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> 网站</a>
    <ul>
        <li class="active"><a href="<?php echo U('Index/index');?>"><i class="icon icon-home"></i> <span>中文后台首页</span></a></li>

        <li class="submenu"><a href="#"><i class="icon  icon-picture"></i> <span>banner管理</span>
            <span class="label label-important" id="myspan"></span>
        </a>

            <ul class="a br">
                <li><a href="<?php echo U('Banners/index');?>">banner列表</a></li>
                <li><a href="<?php echo U('Banners/add');?>">banner添加</a></li>
                <li><a href="<?php echo U('Bannercategory/add');?>">分类添加</a></li>
                <li><a href="<?php echo U('Bannercategory/index');?>">分类列表</a></li>
                <li><a href="<?php echo U('Bannerrecycle/index');?>">banner回收站</a></li>
            </ul>
        </li>

        <li class="submenu"><a href="#"><i class="icon  icon-th-large"></i> <span>产品管理</span> <span
                class="label label-important" id="myspan1"></span></a>
            <ul class="gr">
                <li><a href="<?php echo U('Goods/add');?>">商品添加</a></li>
                <li><a href="<?php echo U('Goods/view');?>">商品列表</a></li>
                <li><a href="<?php echo U('Category/add');?>">分类添加</a></li>
                <li><a href="<?php echo U('Category/view');?>">分类列表</a></li>
            </ul>
        </li>

        <li class="submenu"><a href="#"><i class="icon icon-bar-chart"></i> <span>新闻管理</span> <span
                class="label label-important" id="myspan2"></span></a>
            <ul class="xr">
                <li><a href="<?php echo U('News/add');?>">新闻添加</a></li>
                <li><a href="<?php echo U('News/index');?>">新闻列表</a></li>
                <li><a href="<?php echo U('Newcategory/add');?>">新闻分类添加</a></li>
                <li><a href="<?php echo U('Newcategory/index');?>">新闻分类列表</a></li>
                <li><a href="<?php echo U('Newrecycle/index');?>">新闻回收站</a></li>
            </ul>
        </li>

        <li class="submenu"><a href="#"><i class="icon  icon-picture"></i> <span>方案支持</span> <span
                class="label label-important" id="myspan3"></span></a>
            <ul class="ffr">
                <li><a href="<?php echo U('Services/index');?>">方案支持列表</a></li>
                <li><a href="<?php echo U('Services/add');?>">方案添加</a></li>
                <li><a href="<?php echo U('Servicecategory/add');?>">分类添加</a></li>
                <li><a href="<?php echo U('Servicecategory/index');?>">分类列表</a></li>
                <li><a href="<?php echo U('Servicerecycle/index');?>">方案回收站</a></li>
            </ul>
        </li>

        <li class="submenu"><a href="#"><i class="icon icon-info-sign"></i> <span>管理员管理</span> <span
                class="label label-important" id="myspan5">3</span></a>
            <ul class="yh">
                <li><a href="<?php echo U('Admin/lst');?>">管理员列表</a></li>
            </ul>
        <li class="submenu"><a href="#"><i class="icon icon-info-sign"></i> <span>关于我们</span> <span
                class="label label-important" id="myspan5">3</span></a>
            <ul class="">
                <li><a href="<?php echo U('AboutUs/index');?>">关于我们</a></li>
            </ul>

        <li class="submenu"><a href="#"><i class="icon  icon-cogs"></i> <span>系统配置</span> <span
                class="label label-important" id="myspan4"></span></a>
            <ul class="wr">
                <!--  <li><a href="<?php echo U('User/index');?>">网站结构</a></li>
                  <li><a href="<?php echo U('Config/email');?>">邮箱配置</a></li>-->
                <li><a href="<?php echo U('WebSet/index');?>">网站配置</a></li>
                <li><a href="<?php echo U('FriendLink/index');?>">友情链接</a></li>
                <li><a href="<?php echo U('Bak/index');?>">数据库备份</a></li>
               <!-- <li><a href="<?php echo U('Mail/index');?>">邮件发送链接</a></li>-->
            </ul>
        </li>
        <li class="submenu"><a href="#"><i class="icon icon-info-sign"></i> <span>管理员管理</span> <span
                class="label label-important" id="myspan5">3</span></a>
            <ul class="yh">
                <li><a href="<?php echo U('Admin/lst');?>">管理员列表</a></li>
            </ul>

        <li class="submenu"><a href="#"><i class="icon  icon-cogs"></i> <span>互动</span> <span
                class="label label-important" id=""></span></a>
            <ul class="wr">
               <!-- <li><a href="">客户询盘</a></li>-->
                <li><a href="<?php echo U('Message/index');?>">网站留言</a></li>
                <li><a href="<?php echo U('Searchkeyword/index');?>">关键字记录</a></li>
                <li><a href="<?php echo U('Ipdb/index');?>">访客日志</a></li>


            </ul>
        </li>

        <li><a href="<?php echo U('Pdf/index');?>"><i class="icon icon-home"></i> <span>PDF查询系统</span></a></li>

        <li><a href="<?php echo U('Map/index');?>"><i class="icon  icon-globe"></i> <span>地图</span></a></li>


        <li class="content">
            <span><a style="size:40px;" href="/EnAdmin">切换到英文后台</a></span>
        </li>

        <li class="content">
            <span><a href="<?php echo U('Common/makeurl');?>">生成网站快捷方式</a></span>
        </li>

    </ul>
</div>
<!--sidebar-menu-->

<!--main-container-part-->
<div id="content">
    <div class="item"><div id="content-header">
	<div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> banner</a> <a href="#" class="current">产品列表</a> </div>
	<h1>产品列表</h1>
	<ul class="stat-boxes2">
		<li>
			<div class="right"> 产品总数<strong><?php echo ($goodsCount); ?></strong> </div>
		</li>
		<li>
			<div class="right"> Hot!<strong><?php echo ($goodsHotCount); ?></strong> </div>
		</li>
	</ul>

	<ul class="stat-boxes2">
		<li>
			<div class="right">
				<h4>日期范围查询</h4>
				<form action="<?php echo U('Goods/goodstime');?>" method="post">
					<input name="datestart" type="date" value="2017-01-01">至
					<input name="dateend" type="date" value="2018-01-01">
					<button type="submit" class="tip-bottom"><i class="icon-search icon-white"></i></button>
					<a href="<?php echo U('Goods/view');?>"  class="btn btn-primary btn-lg">返回列表</a>
				</form>

			</div>
		</li>
	</ul>
</div>

<div class="container-fluid">
	<hr>
	<div class="row-fluid">
		<div class="span12">
			<div>
				<a href="<?php echo U('Goods/add');?>" class="btn btn-primary btn-lg">添加商品</a>
			</div>

			<div>
				<table class="table table-bordered table-hover table-striped">
					<thead>
					<th>序号</th>
					<th>HOT</th>
					<th>商品图片</th>
					<th>商品编号</th>
					<th>商品名称</th>
					<th>分类名称</th>
					<th>访问量</th>
					<th>预览&二维码</th>
					<th>操作</th>
					</thead>

					<?php if(is_array($goodsLi)): $k = 0; $__LIST__ = $goodsLi;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><tr>
							<!--<td><?php echo ($vo["goods_id"]); ?></td>-->
							<td><?php echo ($k); ?></td>
							<td width="20px;">
								<a href="#" class="act-hot" data-id="<?php echo ($vo["goods_id"]); ?>" data-status="<?php echo ($vo["hot"]); ?>"><?php if(($vo["hot"]) == "yes"): ?><i  class="icon-fire red" style=" font-size:20px;color:red;"></i><?php else: ?><i  class="icon-fire red" style=" font-size:20px;"></i><?php endif; ?></a>
							</td>
							<td><?php if(!empty($vo["img_center"])): ?><img src="/Public/Uploads/products/small/<?php echo ($vo["img_center"]); ?>" /><?php endif; ?></td>
							<td><?php echo ($vo["goods_price"]); ?></td>
							<td><?php echo ($vo["goods_name"]); ?></td>
							<td><?php echo ($vo["cat_name"]); ?></td>
							<td>
								<!--判断该$vo.hits 是否大于等于9999-->
								<?php if($vo["hits"] >= '9999'): ?>99999+
									<?php else: ?> <?php echo ($vo["hits"]); endif; ?>

							</td>
							<td>
								<a target="_blank" href="http://flyindata.com.cn/Goods/view/goods_id/<?php echo ($vo["goods_id"]); ?>.html"><i class="icon-eye-open" style=" font-size:18px;"></i></a>
								<!--
								<a target="_blank" href="<?php echo U('Goods/qrcode2?goods_id=' . $vo['goods_id']);?>"> <i class=" icon-barcode" style=" font-size:18px;"></i></a>
							    -->

								<!-- 按钮触发模态框 -->
								<a data-toggle="modal" data-target="#myModal<?php echo ($vo["goods_id"]); ?>"><i class=" icon-barcode" style=" font-size:18px;"></i></a>
								<!--
								<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal<?php echo ($vo["goods_id"]); ?>">点</button>-->
								<!-- 模态框（Modal） -->
								<div class="modal fade" id="myModal<?php echo ($vo["goods_id"]); ?>" tabindex="-1000" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
												<h4 class="modal-title" id="myModalLabel"><?php echo ($vo["goods_name"]); ?></h4>
											</div>
											<div class="modal-body">
												<img src="<?php echo U('Goods/qrcode2?goods_id=' . $vo['goods_id']);?>" />
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
												<!--<button type="button" class="btn btn-primary">提交更改</button>-->
											</div>
										</div><!-- /.modal-content -->
									</div><!-- /.modal -->
								</div>
								<!-- 按钮触发模态框 -->





							</td>
							<td>
								<a href="<?php echo U('Goods/edit?goods_id=' . $vo['goods_id']);?>">编辑</a>
								<a href="<?php echo U('Goods/delete?goods_id=' . $vo['goods_id']);?>">删除</a>
							</td>
						</tr><?php endforeach; endif; else: echo "" ;endif; ?>
				</table>
			</div>

			<!--分页
			<div class="pagelist"><?php echo ($goods["pagelist"]); ?></div>
			-->
			<div style="height:40px;">
				<ul class="pagination" style="float:right; margin:10px 0 0 0; ">
					<div style="height:40px;">
						<ul class="pagination" style="float:right; margin:10px 0 0 0; ">
							<?php echo ($goods["pagelist"]); ?>
						</ul>
					</div>
				</ul>
			</div>

		</div>
	</div>
</div>

<form method="post" id="form">
	<input type="hidden" name="goods_id" id="target_id">
	<input type="hidden" name="field" id="target_field">
	<input type="hidden" name="status" id="target_status">
</form>

<script>
    function change_status(obj,field){
        $("#target_id").val(obj.attr("data-id"));
        $("#target_field").attr("value",field)
        $("#target_status").attr("value",(obj.attr("data-status")=="yes") ? "no" : "yes");
        $("#form").attr("action","<?php echo U('Goods/change');?>").submit();
    }
    //快捷操作-上架
    $(".act-hot").click(function(){
        change_status($(this),'hot');
    });
</script>


<script type="text/javascript">
    $(function(){
        // dom加载完毕
        var $m_btn = $('#modalBtn');
        var $modal = $('#myModal');
        $m_btn.on('click', function(){
            $modal.modal({backdrop: 'static'});
        });
        // 测试 bootstrap 居中
        $modal.on('show.bs.modal', function(){
            var $this = $(this);
            var $modal_dialog = $this.find('.modal-dialog');
            // 关键代码，如没将modal设置为 block，则$modala_dialog.height() 为零
            $this.css('display', 'block');
            $modal_dialog.css({'margin-top': Math.max(0, ($(window).height() - $modal_dialog.height()) / 2) });
        });

    });
</script>

</div>
    
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
    <div id="footer" class="span12"> Copyright@ 2013-2018 深圳市飞宇集团有源部 版权所有：飞宇集团<a href="http://flyindata.com.cn/">flyindata.com.cn</a>
    </div>
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
    function goPage(newURL) {

        // if url is empty, skip the menu dividers and reset the menu selection to default
        if (newURL != "") {

            // if url is "-", it is this page -- reset the menu:
            if (newURL == "-") {
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
<script language="javascript" type="text/javascript">
    $(document).ready(function () {
        var j = $('.br li').size();//获得class为mm的font标签的数目      banner部分
        var g = $('.gr li').size();//获得class为mm的font标签的数目      商品部分
        var x = $('.xr li').size();//获得class为mm的font标签的数目     新闻部分
        var f = $('.ffr li').size();//获得class为mm的font标签的数目     方案部分
        var w = $('.wr li').size();//获得class为mm的font标签的数目      网站部分
        var h = $('.yh li').size();//获得class为mm的font标签的数目      用户部分
        $('#myspan').html(j);
        $('#myspan1').html(g);
        $('#myspan2').html(x);
        $('#myspan3').html(f);
        $('#myspan4').html(w);
        $('#myspan5').html(h);

    })

</script>