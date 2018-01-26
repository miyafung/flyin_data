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
    <div class="item">

<div id="content-header">
	<div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> banner</a> <a href="#" class="current">商品添加&编辑</a> </div>
	<h1>商品添加&编辑</h1>
</div>

<div class="container-fluid">
	<hr>
	<div class="row-fluid">
		<div class="span12">

			<div >
				<form action="<?php echo ($act); ?>" class="form-horizontal" method="post" enctype="multipart/form-data"  onsubmit="return validate_form(this)">


                <div class="form-group">
					商品编号:
                    <div>
                        <input type="text" name="goods_price" id="goods-price" class="form-control" value="<?php if(!empty($goodsInfo["goods_price"])): echo ($goodsInfo["goods_price"]); endif; ?>" >
                    </div>
                </div>



					<div class="form-group">
							商品名称:
						<div>
							<input type="text" name="goods_name" id="goods-name" class="form-control" value="<?php if(!empty($goodsInfo["goods_name"])): echo ($goodsInfo["goods_name"]); endif; ?>">
						</div>
					</div>
					<div class="form-group">
						商品描述:
						<div>
							<input type="text" name="goods_title" id="goods-title" class="form-control" value="<?php if(!empty($goodsInfo["goods_title"])): echo ($goodsInfo["goods_title"]); endif; ?>">
						</div>

					</div>
						<!--
					<div class="form-group">
							商品库存:
						<div>
							<input type="text" name="goods_stock" id="goods-stock" class="form-control" value="<?php if(!empty($goodsInfo["goods_stock"])): echo ($goodsInfo["goods_stock"]); endif; ?>">
						</div>
					</div>
					<hr>
-->
					<div class="form-group">
						 <i class="icon-picture" style="font-size: 22px"></i>
						上传图片:
						<input type="button" onclick="add1();" value="添加"/>
						<div id="org"></div>
					</div>
					<div class="form-group">
						已上传图片:
						<div>
							<?php if(!empty($goodsInfo["gallery"])): if(is_array($goodsInfo["gallery"])): $i = 0; $__LIST__ = $goodsInfo["gallery"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><img src="/Public/Uploads/products/small/<?php echo ($vo["img_center"]); ?>" alt="" class="thumbnail" style="display: inline-block;width: 60px;height: 60px;"><?php endforeach; endif; else: echo "" ;endif; endif; ?>
						</div>
					</div>
					<hr>
					<div class="form-group">
							上传PDF: <span style="color: red;">注意PDF文档名字需为英文命名！！</span>
						<br>
						<input type='file' name='pdf[]'>
					</div>

					<div class="form-group">
						已上传pdf:
						<div>
							<!--判断该 $v.pdfthumb 是否为空-->
							<?php if($goodsInfo["goods_pdf"] != ''): ?><a href="/Public/Uploads/pdf/<?php echo ($goodsInfo["goods_pdf"]); ?>" target="_blank">
									<img src="/Public/Home/images/PDF.png" border="0"/>
									<?php echo ($goodsInfo["goods_pdf"]); ?>
								</a>
								<?php else: ?> 待上传<?php endif; ?>
						</div>
					</div>
					<hr>

					<div class="form-group">
							商品SKU:
						<div>
							<input type="text" name="goods_sku" id="goods-sku" class="form-control" value="<?php if(!empty($goodsInfo["goods_sku"])): echo ($goodsInfo["goods_sku"]); endif; ?>">
						</div>
					</div>


					<div class="form-group">
							商品分类:
						<div>
							<select name="cat_id" id="cat_id">
								<option value="0">请选择分类</option>
								<?php if(is_array($catList)): $i = 0; $__LIST__ = $catList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["cat_id"]); ?>"
									<?php if(($vo["cat_id"]) == $goodsInfo["cat_id"]): ?>selected<?php endif; ?> ><?php echo ($vo["cat_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
							</select>
						</div>
					</div>


					<hr>
					<div class="form-group" style="border:1px dashed #ccc;padding: 20px 0 20px 0;">
						<h5>商品参数表:</h5>
						<!--
						<div id="spots">
							<input type="button" id="add" name="add" value="add" /><br />
							<input type="text" name="parameter_name[]" value="参数名" />
							<input type="text" name="parameter_value[]" value="参数信息..." />
							<input type="button" class="remove" value="Delete" />
						</div>
						-->
						<div id="spots">
							<input type="button" id="add" name="add" value="add" /><br />
								<?php if(!empty($goodsInfo2["parameter"])): if(is_array($goodsInfo2["parameter"])): $key = 0; $__LIST__ = $goodsInfo2["parameter"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vvo): $mod = ($key % 2 );++$key;?><input type="text" name="parameter_name[]" value="<?php echo $goodsInfo2['parameter_name2'][$key-1]; ?>" />
										<input type="text" style="width: 400px" name="parameter_value[]" value="<?php echo $goodsInfo2['parameter_value2'][$key-1]; ?>" /><br><?php endforeach; endif; else: echo "" ;endif; endif; ?>
							<!--<input type="button" class="remove" value="Delete" />-->
						</div>

                            <!--	<input type="button" name="Submit" value="Submit" id="send" />-->
					</div>
					<hr>

					<!--编辑器-->
					<div class="editor">
						
<script type="text/javascript" charset="utf-8" src="/Public/ueditor/ProductsUeditorParameter/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/ueditor/ProductsUeditorParameter/ueditor.all.js"> </script>
<script type="text/javascript" charset="utf-8" src="/Public/ueditor/ProductsUeditorParameter/lang/zh-cn/zh-cn.js"></script>



<script type="text/javascript">
    //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    //  UE.getEditor('content',{initialFrameWidth:100%,initialFrameHeight:400,});
    UE.getEditor('myEditor',{
        initialFrameWidth:"100%",
        initialFrameHeight:300,
        //    "imageUrl":"<?php echo U('News/uploadImage');?>", //图片上传提交地址
        //    "imagePath":"/Public/Uploads/news/desc/"  //图片显示地址
    });
</script>

<script type="text/javascript">
    //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    //  UE.getEditor('content',{initialFrameWidth:100%,initialFrameHeight:400,});
    UE.getEditor('myEditor2',{
        initialFrameWidth:"100%",
        initialFrameHeight:300,
        //    "imageUrl":"<?php echo U('News/uploadImage');?>", //图片上传提交地址
        //    "imagePath":"/Public/Uploads/news/desc/"  //图片显示地址
    });

</script>

						商品描述:
						<script type="text/plain" id="myEditor2" name="goods_desc"><?php echo ($goodsInfo["goods_desc"]); ?></script>
						商品参数:
						<script type="text/plain" id="myEditor" name="goods_performance"><?php echo ($goodsInfo["goods_performance"]); ?></script>
					</div>
					<div class="form-group">
							是否显示:
						<div>
							<input type="radio" name="is_show" value="1"<?php if(($goodsInfo["is_show"]) == "1"): endif; ?> checked="checked">是
							<input type="radio" name="is_show" value="0" <?php if(($goodsInfo["is_show"]) == "0"): endif; ?> >否
						</div>
					</div>
					<hr>
					<div class="form-group">
						<div>
							<!--
							<input type="radio" name="hot" value="2"<?php if(($goodsInfo["hot"]) == "2"): endif; ?> checked="checked">YES
							<input type="radio" name="hot" value="3" <?php if(($goodsInfo["hot"]) == "3"): endif; ?> >NO
							-->
							目前热销状态:
							<font style="color:red;font-size:16px;"><?php echo ($goodsInfo["hot"]); ?>!</font>
							<br>
							修改状态：
						<select name="hot">
							<option value="no" <?php if(($goodsInfo["is_show"]) == "no"): ?>selected<?php endif; ?>>否</option>
							<option value="yes" <?php if(($goodsInfo["is_show"]) == "yes"): ?>selected<?php endif; ?>>是</option>
						</select>

						</div>
					</div>
					<div class="form-group">
						<div>
							<input type="submit" value="<?php echo ($actInfo); ?>" class="btn btn-primary">
						</div>
					</div>
					<!--<input type="hidden" name="goods_id" value="<?php if(!empty($goodsInfo["goods_id"])): echo ($goodsInfo["goods_id"]); endif; ?>">-->
					<input type="hidden" name="goods_id" value="<?php echo ($goodsInfo["goods_id"]); ?>">
				</form>
			</div>
		</div>
	</div>
</div>


<!--点击添加参数表-->
	<script type="text/javascript">
        function add1(){
            var input1 = document.createElement('input');
            input1.setAttribute('type', 'file');
            input1.setAttribute('name', 'organizers[]');
            input1.setAttribute('class', 'git');

            var btn1 = document.getElementById("org");
            btn1.insertBefore(input1,null);
        }
	</script>

	<script type="text/javascript">
		function add2(){
			var input2 = document.createElement('input');
			input2.setAttribute('type', 'text');
            input2.setAttribute('value', 'text');
			input2.setAttribute('name', 'organizers[]');
			input2.setAttribute('class', 'git');

			var btn1 = document.getElementById("org2");
			btn1.insertBefore(input2,null);
		}
	</script>

<!--点击添加参考框-->
<script type="text/javascript">
    $(document).ready(function(){
        var spotMax = 20;
        if($('div.spot').size() >= spotMax) {$(obj).hide();}
        $("input#add").click(function(){     addSpot(this, spotMax);
        });
    });

    function addSpot(obj, sm) {
        $('div#spots').append(
            '<div class="spot">' +
            '<input type="text" name="parameter_name[]" value="参数名" /> ' +
            '<input type="text" style="width: 400px"  name="parameter_value[]" value="参数信息..." />  ' +
            '<input type="button" class="remove" value="Delete" /></div>')
            .find("input.remove").click(function(){
            $(this).parent().remove();
            $('input#add').show();
        });

        if($('div.spot').size() >= sm) {$(obj).hide();}
    };
</script>

<script>
    $('#send').click(function(){
        alert('Demonstration Only: submit disabled');
    });
</script>

<!-- 商品名称不能为空 -->
<script type="text/javascript">
    function validate_required(field,alerttxt)
    {
        with (field)
        {
            if (value==null||value=="")
            {alert(alerttxt);return false}
            else {return true}
        }
    }
    function validate_form(thisform)
    {
        with (thisform)
        {
            if (validate_required(goods_name,"商品名称不能为空")==false)
            {goods_name.focus();return false}
            if (validate_required(goods_name,"商品图片不能为空")==false)
            {goods_name.focus();return false}

        }
    }
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