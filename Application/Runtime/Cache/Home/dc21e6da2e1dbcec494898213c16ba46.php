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


<!--载入头部导航文件-->
<!--

<link rel="stylesheet" href="/Public/Home/css/bootstrap.min.css"/>
<script src="/Public/Home/js/jquery.js"></script>
<input type="hidden" id="cur_control" name="cur_control" value="<?php echo (CONTROLLER_NAME); ?>">
-->

<!-- End Home -->
<div class="clearfix"></div>
<div class="container" style="margin-top: 100px;">
    <div class="row">
        <!-- News Start -->
        <div class="col-md-12" >
            匹配信息总数：<span id="allsore"></span></a></li>
            <ul id="myTab" class="nav nav-tabs">
                <li class="active"><a href="#goods_list" data-toggle="tab">产品  <span id="goodssore"></span></a></li>
                <li><a href="#news_list" data-toggle="tab">新闻 <span id="newssore"></span></a></li>
                <li><a href="#service_list" data-toggle="tab">服务支持<span id="servicesore"></span></a></li>
            </ul>
            <div id="myTabContent" class="tab-content  allli" style="padding-top:10px; ">
                <!--//产品-->
                <div class="tab-pane fade in active" id="goods_list">
                    <section class="property-details">
                        <div class="container property-details">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="row">
                                        <?php if(empty($goodssearch)): ?><div class="empty-tip">没有找到您需要的信息。</div>
                                            <?php else: ?>
                                            <ul class="br2">
                                            <?php if(is_array($goodssearch)): $i = 0; $__LIST__ = $goodssearch;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
                                                <div class="news-1-box clearfix">
                                                    <div class="col-md-2 col-sm-2 hidden-xs">
                                                        <div class="image-2">
                                                            <a href="">
                                                                <img src="<?php if(!empty($vo["img_center"])): ?>/Public/Uploads/products/center/<?php echo ($vo["img_center"]); endif; ?>" alt=""class="img-responsive">
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <!--产品-->
                                                    <div class="col-md-10 col-sm-10 col-xs-12 padding-left-25">
                                                        <h5><a href="<?php echo U('Goods/view?cat_id=' . $vo['cat_id'] . '&goods_id=' . $vo['goods_id']);?>" target="_blank"> <?php echo ($vo["goods_name"]); ?></a></h5>
                                                        <div class="news-details padding-b-10 margin-t-5">
                                                            <span><i class="icon-icons230"></i><?php echo ($vo["goods_name"]); ?></span>
                                                        </div>
                                                        <p class="p-font-15">
                                                            <script>document.write(csubstr("<?php echo ($vo["goods_name"]); ?>",100));</script>
                                                        </p>
                                                        <div class="pro-3-link padding-t-20">
                                                            <a class="btn-more" href="<?php echo U('Category/view?cat_id=' . $vo['cat_id']);?>" target="_blank">
                                                                <i><img alt="arrow" src="/Public/Home/images/arrowl.png"></i><span>来自：【产品】<?php echo ($vo["cat_name"]); ?></span><i> <img alt="arrow" src="/Public/Home/images/arrowr.png"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                    </li>
                                                <hr><?php endforeach; endif; else: echo "" ;endif; ?>
                                            </ul><?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <!--新闻-->
                <div class="tab-pane fade" id="news_list">
                    <section class="property-details">
                        <div class="container property-details">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="row">
                                        <?php if(empty($newssearch)): ?><div class="empty-tip">没有找到您需要的信息。</div>
                                            <?php else: ?>
                                            <ul class="xinwen">
                                                <?php if(is_array($newssearch)): $i = 0; $__LIST__ = $newssearch;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$newvo): $mod = ($i % 2 );++$i;?><li>
                                                        <div class="news-1-box clearfix">
                                                            <div class="col-md-2 col-sm-2 hidden-xs">
                                                                <div class="image-2">
                                                                    <a href=""> <img src="/Public/Uploads/news/small/<?php echo ($newvo["thumb"]); ?>"  class="img-responsive"></a>
                                                                </div>
                                                            </div>
                                                            <!--新闻-->
                                                            <div class="col-md-10 col-sm-10 col-xs-12 padding-left-25">
                                                                <h5><a href="<?php echo U('News/news',array('id'=>$newvo['id']));?>" target="_blank"><?php echo ($newvo["name"]); ?></a></h5>
                                                                <div class="news-details padding-b-10 margin-t-5">
                                                                    <span><i class="icon-icons230"></i><?php echo ($newvo["name"]); ?></span>
                                                                </div>
                                                                <div class="pro-3-link padding-t-20">
                                                                    <a class="btn-more" href="<?php echo U('News/index',array('cid'=>$newvo['newcategory_id'],'id'=>$newvo['id']));?>" target="_blank">
                                                                        <i><img alt="arrow" src="/Public/Home/images/arrowl.png"></i><span>类目：【新闻】<?php echo ($newvo["newcategory_id"]); ?></span><i> <img alt="arrow" src="/Public/Home/images/arrowr.png"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <hr><?php endforeach; endif; else: echo "" ;endif; ?>
                                            </ul><?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <!--方案支持-->
                <div class="tab-pane fade" id="service_list">
                    <section class="property-details">
                        <div class="container property-details">
                            <div class="row">
                                <div class="col-md-8">
                                    <div>
                                        <?php if(empty($servicessearch)): ?><div class="empty-tip">没有找到您需要的信息。</div>
                                            <?php else: ?>
                                            <ul class="fuwu">
                                                <?php if(is_array($servicessearch)): $i = 0; $__LIST__ = $servicessearch;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$servicevo): $mod = ($i % 2 );++$i;?><li>
                                                        <div class="news-1-box clearfix">
                                                            <!--方案支持-->
                                                            <div class="col-md-12 col-sm-12 col-xs-12 padding-left-25">
                                                                <h5><a href="<?php echo U('Services/services',array('id'=>$servicevo['id'],'cid'=>$servicevo['servicecategory_id']));?>" target="_blank"><?php echo ($servicevo["name"]); ?></a></h5>
                                                                <div class="news-details padding-b-10 margin-t-5">
                                                                    <span><i class="icon-icons230"></i><?php echo ($servicevo["name"]); ?></span>
                                                                </div>
                                                                <p class="p-font-15">
                                                                    <script>document.write(csubstr("<?php echo ($servicevo["name"]); ?>",100));</script>
                                                                </p>
                                                                <div class="pro-3-link padding-t-20">
                                                                    <a class="btn-more" href="<?php echo U('Services/index',array('cid'=>$servicevo['servicecategory_id'],'id'=>$servicevo['id']));?>" target="_blank">
                                                                        <i><img alt="arrow" src="/Public/Home/images/arrowl.png"></i><span>类目：【服务支持】<?php echo ($servicevo["servicecategory_id"]); ?></span><i> <img alt="arrow" src="/Public/Home/images/arrowr.png"></i>
                                                                    </a>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <hr><?php endforeach; endif; else: echo "" ;endif; ?>
                                            </ul><?php endif; ?>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <script>
                $(function () {
                    $('#myTab li:eq(0) a').tab('show');
                });
            </script>
        </div>
        <!-- News End -->
    </div>
</div>


<!-- 页面 数量个数计算 -->
<script  language="javascript" type="text/javascript">
    $(document).ready(function(){
        var j=$('.br2 li').size();//获得class为mm的font标签的数目      banner部分
        var aa=$('.allli li').size();//获得class为mm的li标签的数目
        var g=$('.xinwen li').size();//获得class为mm的font标签的数目     新闻部分
        var x=$('.fuwu li').size();//获得class为mm的font标签的数目     方案部分
        $('#allsore').html(aa);
        $('#goodssore').html(j);
        $('#newssore').html(g);
        $('#servicesore').html(x);
    })
</script>

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