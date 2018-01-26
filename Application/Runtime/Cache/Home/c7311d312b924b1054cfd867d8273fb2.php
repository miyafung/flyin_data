<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="keywords" content="<?php echo ($keywords); ?>"><!--网站关键词-->
    <meta name="description" content="<?php echo ($description); ?>"><!--公司简介-->
    <title><?php echo ($title); ?></title>
    <!--新样式-->
    <link rel="stylesheet" type="text/css" href="/Public/Home/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/Public/Home/css/reality-icon.css">
    <link rel="stylesheet" type="text/css" href="/Public/Home/css/jquery.fancybox.css">
    <link rel="stylesheet" type="text/css" href="/Public/Home/css/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="/Public/Home/css/owl.transitions.css">
    <link rel="stylesheet" type="text/css" href="/Public/Home/css/cubeportfolio.min.css">
    <link rel="stylesheet" type="text/css" href="/Public/Home/css/settings.css">
    <link rel="stylesheet" type="text/css" href="/Public/Home/css/range-Slider.min.css">
    <link rel="stylesheet" type="text/css" href="/Public/Home/css/search.css">
    <link rel="stylesheet" type="text/css" href="/Public/Home/css/style.css">

    <!--字体 -->
    <link  rel="stylesheet"  href="/Public/bs/font-awesome/css/font-awesome.css"/>
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <!--nav-- start-->
    <link href="/Public/Home/css/nav/bootstrap.min.css" rel="stylesheet">
    <link href="/Public/Home/css/nav/animate.css" rel="stylesheet">
    <link href="/Public/Home/css/nav/bootsnav.css" rel="stylesheet">
    <!--
    <link rel="stylesheet" type="text/css" href="/Public/Home/css/htmleaf-demo.css">
    -->
    <link href="/Public/Home/css/nav/overwrite.css" rel="stylesheet">
    <link href="/Public/Home/css/nav/style.css" rel="stylesheet">
    <link href="/Public/Home/skins/color.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="/Public/Home/js/nav/html5shiv.min.js"></script>
    <script src="/Public/Home/js/nav/respond.min.js"></script>
    <![endif]-->
    <!--nav-- END-->

    <!--nav--SATATR-->
    <script src="http://www.jq22.com/jquery/jquery-2.1.1.js"></script>
    <script src="http://www.jq22.com/jquery/jquery-migrate-1.2.1.min.js"></script>
    <script src="/Public/Home/js/nav/bootstrap.min.js"></script>
    <script src="/Public/Home/js/nav/bootsnav.js"></script> <!--控制左侧导航滑动速度-->
    <script src="/Public/Home/js/functions.js"></script>
    <!--nav-- end-->

    <!--banner start-->
    <script src="/Public/Home/nav/js/flickerplate.min.js" type="text/javascript"></script>
    <script src="/Public/Home/nav/js/jquery-finger-v0.1.0.min.js" type="text/javascript"></script>
    <script src="/Public/Home/nav/js/modernizr-custom-v2.7.1.min.js" type="text/javascript"></script>
    <link href="/Public/Home/nav/css/flickerplate.css"  type="text/css" rel="stylesheet">
    <!--banner end-->
</head>
<body>

<!-- Start Navigation -->
<nav class="navbar navbar-default navbar-fixed navbar-transparent dark bootsnav">
    <!-- Start Top Search -->
    <div class="top-search">
        <div class="container">
            <form action="<?php echo U('Goods/searchall');?>" method="post">
                <div class="input-group">
                    <span class="input-group-addon" type="submit"><i class="fa fa-search"></i></span>
                    <input type="text" name="keywords" class="form-control" placeholder="search..">
                    <span class="input-group-addon close-search" type="submit"><i class="fa fa-times"></i></span>
                </div>
            </form>
        </div>
    </div>
    <!-- End Top Search -->

    <div class="container">
        <!-- Start Atribute Navigation -->
        <!--购物车-->
        <div class="attr-nav">
            <ul>
                <!--
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" >
                        <i class="fa fa-clock-o fa-lg"></i>
                        <span id="myspan"></span>
                    </a>
                    <ul class="dropdown-menu cart-list">
                        <li><h6><a href="#">History</a></h6></li>
                        <?php if(is_array($history)): $i = 0; $__LIST__ = array_slice($history,0,5,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li class="jl">
                                <a   class="photo" href="<?php echo U('Goods/view',array('goods_id'=>$v['goods_id']));?>">
                                    <img src="/Public/Uploads/products/center/<?php echo ($v['img_center']); ?>" width="70px" height="68px" />
                                </a>
                                <p>
                                    <a href="<?php echo U('Goods/view',array('goods_id'=>$v['goods_id']));?>" title="<?php echo ($v["goods_name"]); ?>">
                                        <div style="width:140px; white-space:nowrap;overflow:hidden;text-overflow:ellipsis;"><?php echo ($v["goods_name"]); ?></div>
                                    </a>
                                </p>
                            </li><?php endforeach; endif; else: echo "" ;endif; ?>

                        <li class="total">
                            <span class="pull-right"><strong>总</strong>: $0.00</span>
                            <a href="#" class="btn btn-default btn-cart">KO</a>
                        </li>
                    </ul>
                </li>
                -->
                <li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
                <li class="side-menu"><a href="#"><i class="fa fa-bars"></i></a></li>
            </ul>
        </div>
        <!-- End Atribute Navigation -->
        <!--购物车-->

        <!--StHeader2ader Navigation-->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="<?php echo U('Home/index');?>">
                <img src="/Public/Home/images/brand/logo-white.png" class="logo logo-display" alt="深圳师飞宇集团有源部">
                <img src="/Public/Home/images/brand/logo-black.png" class="logo logo-scrolled" alt="深圳师飞宇集团有源部">
            </a>
        </div>
        <!--Header2ader Navigation-->

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-menu">
            <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
                <li><a href="<?php echo U('Index/index');?>">首页</a></li>
                <li class="dropdown">
                    <a href="<?php echo U('Goods/index');?>" class="dropdown-toggle" data-toggle="dropdown" >产品中心</a>
                    <ul class="dropdown-menu">
                        <?php if(is_array($catList)): $i = 0; $__LIST__ = $catList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('Common/view?cat_id=' . $vo['cat_id']);?>"><?php echo ($vo["cat_name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="<?php echo U('Services/index');?>" class="dropdown-toggle" data-toggle="dropdown" >服务支持</a>
                    <ul class="dropdown-menu">
                        <?php if(is_array($servicecategory)): $i = 0; $__LIST__ = array_slice($servicecategory,0,20,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v1): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('Services/index',array('cid'=>$v1['id']));?>"><?php echo ($v1["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="<?php echo U('News/index');?>" class="dropdown-toggle" data-toggle="dropdown" >新闻中心</a>
                    <ul class="dropdown-menu">
                        <?php if(is_array($newcategory)): $i = 0; $__LIST__ = array_slice($newcategory,0,20,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v1): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('News/index',array('cid'=>$v1['id']));?>"><?php echo ($v1["name"]); ?></a> </li><?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </li>
                <li> <a href="<?php echo U('Aboutus/index');?>">关于我们</a></li>
                <li><a href="<?php echo U('Contact/index');?>">联系我们</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div>

    <!-- Start Side Menu -->
    <div class="side">
        <a href="#" class="close-side"><i class="fa fa-times"></i></a>
        <div class="widget">
            <h6 class="title">Languages</h6>
            <ul class="link">
                <li><a href="/" target="_blank">中文/chinese</a></li>
                <li><a href="/En" target="_blank">英文/English</a></li>
                <li><a href="tencent://message/?uin=2747269014&Menu=yes">service QQ</a></li>
            </ul>
        </div>
        <div class="widget">
            <h6 class="title">Other website</h6>
            <ul class="link">
                <?php if(is_array($friendlink)): $i = 0; $__LIST__ = $friendlink;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$fk): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($fk["url"]); ?>" target="_blank"><?php echo ($fk["linkname"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
    </div>
    <!-- End Side Menu -->
</nav>
<!-- End Navigation -->
<!-- 头部-->


<style>
	/**产品详情页面的样式 START**/
	ul,li{list-style-type:none;padding:0; margin:0;}
	.tb-pic a{display:table-cell;text-align:center;vertical-align:middle;}
	.tb-pic a img{vertical-align:middle;}
	.tb-pic a{*display:block;*font-family:Arial;*line-height:1;}
	.tb-thumb{margin:10px 0 0;overflow:hidden;}
	.tb-thumb li{background:none repeat scroll 0 0 transparent;float:left;height:60px;width:60px;margin:0 6px 0 0;overflow:hidden;padding:1px;}
	.tb-s310, .tb-s310 a{height:310px;width:310px;border: 1px solid #ccc;}
	.tb-s310, .tb-s310 img{max-height:310px;max-width:310px;}
	.tb-s310 a{*font-size:271px;}
	.tb-s40 a{*font-size:35px;}
	.tb-s40, .tb-s40 a{height:58px;width:58px;}
	.tb-booth{
		/*border:1px solid #CDCDCD;*/
		position:relative;z-index:1;
	}
	.tb-thumb .tb-selected{background:none repeat scroll 0 0 #C30008;height:62px;width:62px;padding:2px;}
	.tb-thumb .tb-selected div{background-color:#FFFFFF;border:medium none;}
	.tb-thumb li div{border:1px solid #ccc;}

	/*
	div.zoomDiv{z-index:999;position:absolute;top:0px;left:0px;width:200px;height:200px;background:#ffffff;border:1px solid #CCCCCC;display:none;text-align:center;overflow:hidden;}
	div.zoomMask{position:absolute;background:url("/Public/img/mask.png") repeat scroll 0 0 transparent;cursor:move;z-index:1;}
	*/
	/**产品详情页面的样式 END**/
	/** 产品二级页面样式 START**/
	.jieduan {
		overflow: hidden; /*自动隐藏文字*/
		text-overflow: ellipsis;/*文字隐藏后添加省略号*/
		white-space: nowrap; /*强制不换行*/
		width: 22em;/*不允许出现半汉字截断*/
		/*color:#6699ff;border:1px #ff8000 dashed;*/
	}
	/** 产品页面样式 END**/
</style>
<!--放大镜图片切换-->
<script src="/Public/Home/js/jquery.js"></script>
<script src="/Public/Home/js/json2.js"></script>
<script src="/Public/Home/js/jquery.imagezoom.min.js"></script>
<!--放大镜图片切换-->
<div style="height: 100px;width: 100%;"></div>
		<section>
			<div class="container">
				<!--面包屑 START
				<div class="now_cat">当前位置：
					<?php echo ($goodsInfo["goods_name"]); ?>
					<ol class="breadcrumb">
						<li><a href="{U('Goods/view')}">Goods</a></li>
						<?php if(is_array($path)): foreach($path as $key=>$v): ?><li> <a href="<?php echo U('Goods/view',array('cat_id'=>$v['cat_id']));?>"><?php echo ($v["goods_name"]); ?></a></li><?php endforeach; endif; ?>&nbsp;
					</ol>
				</div>
				-->
				<!--面包屑 END-->
				<!--放大镜图片切换 START-->
				<div class="row">
					<div class="col-md-5">
						<div class="box">
							<div class="tb-booth tb-pic tb-s310">
								<?php if(!empty($goodsInfo['gallery'][0]["img_center"])): ?><a href=""><img style="height: 100%" class="img-responsive center-block" src="/Public/Uploads/products/center/<?php echo ($goodsInfo['gallery'][0]["img_center"]); ?>" class="jqzoom" rel="/<?php echo ($goodsInfo['gallery'][0]["img_big"]); ?>" /></a><?php endif; ?>
							</div>
							<ul class="tb-thumb" id="thumblist">
								<?php if(is_array($goodsInfo["gallery"])): $i = 0; $__LIST__ = $goodsInfo["gallery"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li <?php if(($key) == "0"): ?>class="tb-selected"<?php endif; ?> >
									<div class="tb-pic tb-s40">
										<a href="#">
									<!--	<img src="/Public/Uploads/products/small/<?php echo ($vo["img_center"]); ?>" mid="/Public/Uploads/products/center/<?php echo ($vo["img_center"]); ?>" big="/Public/Uploads/products/water/<?php echo ($vo["img_center"]); ?>">-->
											<img src="/Public/Uploads/products/small/<?php echo ($vo["img_center"]); ?>" mid="/Public/Uploads/products/center/<?php echo ($vo["img_center"]); ?>" >
									</a>
									</div>
									</li><?php endforeach; endif; else: echo "" ;endif; ?>
							</ul>
						</div>
						<!--放大镜图片切换 END-->
					</div>

					<!-- 参数模块 START -->
					<div class="col-md-7" style="padding:30px;">
						<form action="<?php echo U('Cart/insert');?>" method="post" class="form-horizontal">
							<h4 style="font-weight: bold"><?php echo ($goodsInfo["goods_name"]); ?></h4>
							<div class="form-group">
								<!-- 参数详情  START-->
								<?php if(!empty($goodsInfo2["parameter"])): if(is_array($goodsInfo2["parameter"])): $key = 0; $__LIST__ = $goodsInfo2["parameter"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vvo): $mod = ($key % 2 );++$key;?><div class="form-group">
											<label class="control-label col-md-2"><?php echo ($goodsInfo2['parameter_name2'][$key-1]); ?>:</label>
											<div class="col-md-10">
												<?php print_r($vvo['parameter_value2']); ?>
												<?php $temp2 = $goodsInfo2['parameter_value2'][$key-1]; ?>
												<?php foreach($temp2 as $vo ){ ?>
												<label style="font-weight: 400;color:#4c4d4d;border: 1px solid #c0c0c0;border-radius: 3px;
				b; margin: 4px 0px 4px 0px;padding: 2px 6px 2px 6px;"><?php echo ($vo); ?></label>
												<?php } ?>
											</div>
											<hr>
										</div><?php endforeach; endif; else: echo "" ;endif; endif; ?>
								<!-- 参数  END-->
								<!--
								<div class="form-group">
									<label class="control-label col-md-2">SKU型号:</label>
									<div class="col-md-10">
										<label class="text-danger"><?php echo ($goodsInfo["goods_sku"]); ?></label>
									</div>
								</div>
								-->
								<!--
								<div class="form-group">
									<label class="control-label col-md-2">购买数量:</label>
									<div class="col-md-4">
										<input type="text" name="goods_num" class="form-control" value="1">
									</div>
								</div>
								-->
								<div class="form-group">
									<div class="col-md-offset-2 col-md-10">
										<!--<button class="btn btn-primary">添加到购物车</button>-->
										<!--<a href="<?php echo U('Mail/index');?>" class="btn btn-primary" target="_blank">马上咨询</a>-->
										<a href="/Mail/index" class="btn btn-primary" target="_blank">马上咨询</a>
									</div>
								</div>

								<div class="form-group">
									<div class="col-md-offset-2 col-md-10">
										访问量：
										<!--判断该$vo.hits 是否大于等于9999-->
										<?php if($goodsInfo["hits"] >= '9999'): ?>99999+
											<?php else: ?> <?php echo ($goodsInfo["hits"]); endif; ?>
									</div>
								</div>
								<input type="hidden" name="goods_id" value="<?php echo ($goodsInfo["goods_id"]); ?>">
						</form>
					</div>
				</div>
			</div>
			<!-- 参数模块 END -->
			<!--详情 标签页 START-->
			<ul class="nav nav-tabs" role="tablist" id="tab-list">
				<li role="presentation" class="active"><a href="#diyizhang" role="tab" data-toggle="tab">Description</a></li>
				<li role="presentation"><a href="#dierzhang" role="tab" data-toggle="tab">Parameter</a></li>
				<li role="presentation"><a href="#disanzhang" role="tab" data-toggle="tab">PDF</a></li>
			</ul>

			<!-- 详情 标签页对应的内容 END-->
			<div class="tab-content">
				<div role="tabpanel" class="tab-pane active" id="diyizhang">
					<div class="col-md-12">
						<h5>description</h5>
					</div>
					<div class="col-md-12">
						<?php echo (htmlspecialchars_decode($goodsInfo["goods_desc"])); ?>
					</div>
				</div>
				<div role="tabpanel" class="tab-pane" id="dierzhang">
					<div class="col-md-12">
						<h5>performance</h5>
					</div>
					<div class="col-md-12">
						<?php echo (htmlspecialchars_decode($goodsInfo["goods_performance"])); ?>
					</div>
				</div>
				<div role="tabpanel" class="tab-pane" id="disanzhang">
					<div class="col-md-12">
						<?php echo rawurldecode('<?php echo ($goodsInfo["goods_pdf"]); ?>'); ?>
						<a href=" /Public/Uploads/pdf/<?php echo ($goodsInfo["goods_pdf"]); ?>" target="_blank">
							<img src="/Public/Home/images/PDF.png" border="0"/><?php echo ($goodsInfo["goods_pdf"]); ?>
						</a>
						<object type="application/pdf" data="/Public/Uploads/pdf/<?php echo ($goodsInfo["goods_pdf"]); ?>" width="100%" height="500">
						</object>
					</div>
				</div>
			</div>
	</section>

<!--放大镜 特效 START-->
<script>
    /**  写法修改
     $(function(){
        $(".jqzoom").imagezoom();
        $("#thumblist li a").click(function(){
            $(this).parents("li").addClass("tb-selected").siblings().removeClass("tb-selected");
            $(".jqzoom").attr('src',$(this).find("img").attr("mid"));
            $(".jqzoom").attr('rel',$(this).find("img").attr("big"));
        });
    });
     **/
    (function($){
        $(".jqzoom").imagezoom();
        $("#thumblist li a").click(function(){
            $(this).parents("li").addClass("tb-selected").siblings().removeClass("tb-selected");
            $(".jqzoom").attr('src',$(this).find("img").attr("mid"));
           $(".jqzoom").attr('rel',$(this).find("img").attr("big"));
        });
    })(jQuery);
</script>
<!--放大镜 特效 END-->

<!-- thinphp+ajax实现统计页面pv浏览量  -->
<script>
    var ajax;
    if(window.XMLHttpRequest){ ajax = new XMLHttpRequest();}else{ ajax = new ActiveXObject('Microsoft.XMLHTTP');}
    ajax.open('GET','/Home/Goods/set_hits/goods_id/<?php echo ($_GET['goods_id']); ?>',true); //注意路径问题 goods_id
    ajax.send();
</script>
<!-- thinphp+ajax实现统计页面pv浏览量  END-->
<!-- 给P标签下面的图片添加属性 让图片自适应 -->
<script>
    $(window).load(function(){
        $("p img").addClass("img-responsive");
    })
</script>

<!--百度画词分享-->
<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdPic":"","bdStyle":"0","bdSize":"16"},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["qzone","tsina","tqq","renren","weixin"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>

<!--Footer 新-->
<footer class="footer_third">
    <div class="container contacts">
        <div class="row">
            <div class="col-sm-4 text-center">
                <div class="info-box first">
                    <div class="icons">
                        <!--
                        <i class="icon-telephone114"></i>
                        -->
                    </div>
                    <ul class="text-center">
                        <li><strong>Phone</strong></li>
                        <?php if(is_array($website)): $i = 0; $__LIST__ = $website;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$wb): $mod = ($i % 2 );++$i;?><li><?php echo ($wb["tel"]); ?></li><?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </div>
            </div>
            <div class="col-sm-4 text-center">
                <div class="info-box">
                    <div class="icons">
                        <!--
                        <i class="icon-icons74"></i>
                        -->
                    </div>
                    <ul class="text-center">
                        <li><strong>Fax</strong></li>
                        <?php if(is_array($website)): $i = 0; $__LIST__ = $website;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$wb): $mod = ($i % 2 );++$i;?><li><?php echo ($wb["fax"]); ?></li><?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </div>
            </div>
            <div class="col-sm-4 text-center">
                <div class="info-box">
                    <div class="icons">
                        <!--
                        <i class="icon-icons142"></i>
                        -->
                    </div>
                    <ul class="text-center">
                        <li><strong>QQ</strong></li>
                        <li><?php echo ($wb["qq"]); ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container padding_top">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="footer_panel bottom30">
                    <?php if(is_array($website)): $i = 0; $__LIST__ = $website;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$wb): $mod = ($i % 2 );++$i;?><a href="#." class="logo bottom30"><img class="img-responsive center-block"style="width:150px;"src="/Public/Common/Uploads/Photos/<?php echo ($wb["logo"]); ?>" alt="logo"></a>
                        <p class="bottom15">地址:<?php echo ($wb["address"]); ?></p>
                        <p class="bottom12">如果您对我们的产品感兴趣请及时联系我们，竭诚为您服务</p><?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="footer_panel bottom30">
                    <h4 class="bottom30 heading">网站地图</h4>
                    <table style="width:100%;">
                        <tbody>
                        <tr>
                            <td>
                                <ul class="links">
                                    <li><a href="<?php echo U('Index/index');?>"><i></i>首页</a></li>
                                    <li><a href="<?php echo U('Goods/index');?>"><i></i>产品中心</a></li>
                                    <!--新闻-->
                                    <?php if(is_array($newcategory)): $i = 0; $__LIST__ = array_slice($newcategory,0,20,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v1): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('News/index',array('cid'=>$v1['id']));?>"><i></i><?php echo ($v1["name"]); ?></a> </li><?php endforeach; endif; else: echo "" ;endif; ?>

                                </ul>
                            </td>
                            <td class="text-right">
                                <ul class="links text-left">
                                    <!--服务支持-->
                                    <?php if(is_array($servicecategory)): $i = 0; $__LIST__ = array_slice($servicecategory,0,20,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v1): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('Services/index',array('cid'=>$v1['id']));?>"><i></i><?php echo ($v1["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                                    <li><a href="<?php echo U('Pdf/index');?>"><i></i>Products PDF</a></li>
                                </ul>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="footer_panel bottom30">
                    <h4 class="bottom30 heading">联系方式</h4>

                    <div class="media bottom30">
                        <div class="media-body">
                            <a href="#.">电话：</a>
                            <span><i class="icon-clock5"></i><?php echo ($wb["tel"]); ?></span>
                        </div>
                    </div>

                    <div class="media">
                        <div class="media-body">
                            <a href="#.">传真:</a>
                            <span><i class="icon-clock5"></i><?php echo ($wb["fax"]); ?></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="footer_panel bottom30">
                    <h4 class="bottom30 heading">其他</h4>
                    <div class="media bottom30">
                        <div class="media-body">
                            <a href="http://www.flyindata.com"><i class="fa fa-globe"></i> www.flyindata.com</a>
                            <span><i class="icon-clock5"></i></span>
                        </div>
                    </div>
                    <!--
                    <div class="media">
                        <div class="media-body">
                            <a href="#.">123456</a>
                            <span><i class="icon-clock5"></i>123456</span>
                        </div>
                    </div>
                    -->
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="footer_panel bottom30">
                    <h4 class="bottom30 heading"></h4>
                    <p>我们将会在12个小时内回复您</p>
                    <a style="text-decoration: none;" href="<?php echo U('Contact/index');?>" class="btn-yellow"><i></i>在线留言</a>
                    <!--
                    <form class="top30">
                        <input style="width: 220px;" class="search" placeholder="Enter your Email" type="search">
                        <a class="button_s" href="#">
                            <i class="fa fa-search"></i>
                        </a>
                    </form>
                    -->
                </div>
            </div>
            <!--
            <div class="col-md-3 col-sm-6">
                <div class="footer_panel bottom30">
                    <h4 class="bottom30 heading">在线留言</h4>
                    <p>24小时内回复</p>
                    <form class="top30">
                        <input style="width: 220px;" class="search" placeholder="Enter your Email" type="search">
                        <a class="button_s" href="#">
                            <i class="fa fa-search"></i>
                        </a>
                    </form>
                </div>
            </div>
            -->
        </div>
        <!--CopyRight-->
        <div class="copyright_simple">
            <div class="row">
                <div class="col-md-6 col-sm-5 top20 bottom20">
                    <?php if(is_array($website)): $i = 0; $__LIST__ = $website;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$wb): $mod = ($i % 2 );++$i;?><p><?php echo ($wb["copy"]); ?><a target="_blank" href="http://www.flyindata.com.cn"></a></p><?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
                <div class="col-md-6 col-sm-7 text-right top15 bottom10">
                    <ul class="social_share">
                       <!-- <li><a href="#." class="linkden"><i class="fa fa-linkedin"></i></a></li>-->
                        <li> <li><script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1262237262'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s19.cnzz.com/z_stat.php%3Fid%3D1262237262%26show%3Dpic1' type='text/javascript'%3E%3C/script%3E"));</script></li></li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</footer>



<!--新-->
<script src="/Public/Home/js/jquery.appear.js"></script>
<script src="/Public/Home/js/jquery.appear.js"></script>
<script src="/Public/Home/js/jquery-countTo.js"></script>
<script src="/Public/Home/js/masonry.pkgd.min.js"></script>
<script src="/Public/Home/js/jquery.parallax-1.1.3.js"></script>
<script src="/Public/Home/js/jquery.cubeportfolio.min.js"></script>
<script src="/Public/Home/js/range-Slider.min.js"></script>
<script src="/Public/Home/js/owl.carousel.min.js"></script>
<script src="/Public/Home/js/selectbox-0.2.min.js"></script>
<script src="/Public/Home/js/zelect.js"></script>
<script src="/Public/Home/js/jquery.fancybox.js"></script>
<script src="/Public/Home/js/jquery.themepunch.tools.min.js"></script>
<script src="/Public/Home/js/jquery.themepunch.revolution.min.js"></script>
<script src="/Public/Home/js/revolution.extension.actions.min.js"></script>
<script src="/Public/Home/js/revolution.extension.layeranimation.min.js"></script>
<script src="/Public/Home/js/revolution.extension.navigation.min.js"></script>
<script src="/Public/Home/js/revolution.extension.parallax.min.js"></script>
<script src="/Public/Home/js/revolution.extension.slideanims.min.js"></script>
<script src="/Public/Home/js/revolution.extension.video.min.js"></script>
<script src="/Public/Home/js/custom.js"></script>
<script src="/Public/Home/js/functions.js"></script>
<!--新 END-->




<!--计算浏览记录的个数-->
<script  language="javascript" type="text/javascript">
    $(document).ready(function(){
        var j=$('.jl').size();//获得class为mm的font标签的数目
        $('#myspan').html('<strong><font color=red>'+j+'</font></strong>');
    })
</script>
</body>
</html>