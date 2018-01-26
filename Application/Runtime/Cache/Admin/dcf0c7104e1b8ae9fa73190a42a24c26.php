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
	<div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> 服务</a> <a href="#" class="current">服务列表</a> </div>
	<h1>服务列表</h1>
</div>

<div class="container-fluid">
	<hr>
	<div class="row-fluid">
		<div class="span12">
			<!--分类-->
			<div class="top-button">
				选择服务分类：<select id="servicecategory">
				<option value="-1" >全部</option>
				<option value="0" <?php if(($cid) == "0"): ?>selected<?php endif; ?>>未分类</option>
				<?php if(is_array($servicecategory)): foreach($servicecategory as $key=>$v): ?><option value="<?php echo ($v["id"]); ?>" <?php if(($v["id"]) == $cid): ?>selected<?php endif; ?>><?php echo str_repeat('— ',$v['level']); echo ($v["name"]); ?></option><?php endforeach; endif; ?>
			</select>
				<a href="<?php echo U('Services/add',array('cid'=>$cid));?>" class="btn btn-primary">添加服务文章</a>
				<a href="<?php echo U('Servicecategory/add');?>" class="btn btn-primary">添加分类</a>
			</div>

			<!--banner列表-->
			<div class="widget-box">
				<div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
					<h5>格式建议 *服务建议规格1920px*474px,大小100kb以内</h5>
				</div>

				<div class="widget-content nopadding">
					<table class="table table-bordered table-striped">
						<thead>
						<tr>
							<th>日期date</th>
							<th>banner分类</th>
							<th>banner名称</th>
							<th>上线</th>
							<th>推荐</th>
							<th>操作</th>
						</tr>
						</thead>
						<tbody>

						<?php if(is_array($services["data"])): foreach($services["data"] as $key=>$v): ?><tr class="odd gradeX">
								<td><?php echo ($v["date"]); ?></td>
								<td>
									<?php if(empty($v["servicecategory_id"])): ?><a href="<?php echo U('Services/index','cid=0');?>">未分类</a>
										<?php else: ?>
										<a href="<?php echo U('Services/index',array('cid'=>$v['servicecategory_id']));?>"><?php echo ($v["servicecategory_name"]); ?></a><?php endif; ?>
								</td>
								<td><?php echo ($v["name"]); ?></td>
								<td><a href="#" class="act-onsale" data-id="<?php echo ($v["id"]); ?>" data-status="<?php echo ($v["on_sale"]); ?>"><?php if(($v["on_sale"]) == "yes"): ?>是<?php else: ?>否<?php endif; ?></a></td>
								<td><a href="#" class="act-recommend" data-id="<?php echo ($v["id"]); ?>" data-status="<?php echo ($v["recommend"]); ?>"><?php if(($v["recommend"]) == "yes"): ?>是<?php else: ?>否<?php endif; ?></a></td><td>
								<a href="<?php echo U('Services/edit',array('id'=>$v['id'],'cid'=>$v['servicecategory_id'],'p'=>$p));?>">修改</a>　
								<a href="#" class="act-del" data-id="<?php echo ($v["id"]); ?>">删除</a>
							</td>
							</tr><?php endforeach; endif; ?>
						</tbody>
					</table>
				</div>
			</div>
            
			<!--分页
			<div class="pagelist"><?php echo ($services["pagelist"]); ?></div>
			-->
			<div style="height:40px;">
				<ul class="pagination" style="float:right; margin:10px 0 0 0; ">
					<div style="height:40px;">
						<ul class="pagination" style="float:right; margin:10px 0 0 0; ">
							<?php echo ($services["pagelist"]); ?>
						</ul>
					</div>
				</ul>
			</div>
			<form method="post" id="form">
				<input type="hidden" name="id" id="target_id">
				<input type="hidden" name="field" id="target_field">
				<input type="hidden" name="status" id="target_status">
			</form>
		</div>
	</div>
</div>


<script>
    //下拉菜单跳转
    $("#servicecategory").change(function(){
        var url = "<?php echo U('Services/index',array('cid'=>'_ID_'));?>";
        location.href = url.replace("_ID_",$(this).val());
    });
    //快捷操作
    function change_status(obj,field){
        $("#target_id").val(obj.attr("data-id"));
        $("#target_field").attr("value",field)
        $("#target_status").attr("value",(obj.attr("data-status")=="yes") ? "no" : "yes");
        $("#form").attr("action","<?php echo U('Services/change',array('p'=>$p,'cid'=>$cid));?>").submit();
    }
    //快捷操作-上架
    $(".act-onsale").click(function(){
        change_status($(this),'on_sale');
    });
    //快捷操作-推荐
    $(".act-recommend").click(function(){
        change_status($(this),'recommend');
    });
    //快捷操作-删除
    $(".act-del").click(function(){
        if(confirm('确定要删除吗？')){
            $("#target_id").val($(this).attr("data-id"));
            $("#form").attr("action","<?php echo U('Services/del',array('p'=>$p,'cid'=>$cid));?>").submit();
        }
    });
</script>


<script type="text/javascript">
    //鼠标悬停头像,使之放大
    var x = 30;
    var y = 10;
    $("a.tooltip").mouseover(function(e){
        this.myTitle = this.title;
        this.title = "";
        var imgTitle = this.myTitle? "<br/>" + this.myTitle : "";
        var tooltip = "<div id='tooltip'><img src='"+ this.href +"' alt='精品预览图' width='350' height='300'>"+imgTitle+"<\/div>"; //创建 div 元素
        $("body").append(tooltip);  //把它追加到文档中
        $("#tooltip")
            .css({
                "top": (e.pageY-y) + "px",
                "left":  (e.pageX+x)  + "px"
            }).show("fast");    //设置x坐标和y坐标，并且显示
    }).mouseout(function(){
        this.title = this.myTitle;
        $("#tooltip").remove();  //移除
    }).mousemove(function(e){
        $("#tooltip")
            .css({
                "top": (e.pageY-y) + "px",
                "left":  (e.pageX+x)  + "px"
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