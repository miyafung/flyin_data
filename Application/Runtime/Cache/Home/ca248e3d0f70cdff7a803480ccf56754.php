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
    /* === Remove input autofocus webkit === */
    *:focus {outline: none;}
    /* === Form Typography === */
    body {font: 14px/21px "Lucida Sans", "Lucida Grande", "Lucida Sans Unicode", sans-serif;}
    .contact_form h2, .contact_form label {font-family:Georgia, Times, "Times New Roman", serif;}
    .form_hint, .required_notification {font-size: 11px;}

    /* === List Styles === */
    .contact_form ul {
        width:750px;
        list-style-type:none;
        list-style-position:outside;
        margin:0px;
        padding:0px;
    }
    .contact_form li{
        padding:12px;
        border-bottom:1px solid #eee;
        position:relative;
    }
    .contact_form li:first-child {
        border-bottom:1px solid #777;
    }

    /* === Form Header === */
    .contact_form h2 {
        margin:0;
        display: inline;
    }

    /* === Form Elements === */
    .contact_form label {
        width:80px;
        margin-top: 3px;
        display:inline-block;
        float:left;
        padding:3px;
    }
    .contact_form input {
        height:30px;
        width:220px;
        padding:5px 8px;
    }
    .contact_form textarea {padding:8px; width:80%;}
    .contact_form button {margin-left:150px;}

    /* form element visual styles */
    .contact_form input, .contact_form textarea {
        border:1px solid #aaa;
        box-shadow: 0px 0px 3px #ccc, 0 10px 15px #eee inset;
        border-radius:2px;
        padding-right:30px;
        -moz-transition: padding .25s;
        -webkit-transition: padding .25s;
        -o-transition: padding .25s;
        transition: padding .25s;
    }
    .contact_form input:focus, .contact_form textarea:focus {
        background: #fff;
        border:1px solid #555;
        box-shadow: 0 0 3px #aaa;
        padding-right:70px;
    }

    /* === HTML5 validation styles === */
    .contact_form input:required, .contact_form textarea:required {
        background: #fff url(images/red_asterisk.png) no-repeat 98% center;
    }
    .contact_form input:required:valid, .contact_form textarea:required:valid {
        background: #fff url(images/valid.png) no-repeat 98% center;
        box-shadow: 0 0 5px #5cd053;
        border-color: #28921f;
    }
    .contact_form input:focus:invalid, .contact_form textarea:focus:invalid {
        background: #fff url(images/invalid.png) no-repeat 98% center;
        box-shadow: 0 0 5px #d45252;
        border-color: #b03535
    }

    /* === Form hints === */
    .form_hint {
        background: #d45252;
        border-radius: 3px 3px 3px 3px;
        color: white;
        margin-left:8px;
        padding: 1px 6px;
        z-index: 999; /* hints stay above all other elements */
        position: absolute; /* allows proper formatting if hint is two lines */
        display: none;
    }
    .form_hint::before {
        content: "\25C0";
        color:#d45252;
        position: absolute;
        top:1px;
        left:-6px;
    }
    .contact_form input:focus + .form_hint {display: inline;}
    .contact_form input:required:valid + .form_hint {background: #28921f;}
    .contact_form input:required:valid + .form_hint::before {color:#28921f;}

    /* === Button Style === */
    button.submit {
        background-color: #1f3f81;
        color: white;
        font-weight: bold;
        padding: 6px 20px;
        text-align: center;
    }
    button.submit:hover {
        opacity:.85;
        cursor: pointer;
    }


    .contact_form{padding-top:60px;}

</style>


<section id="contact-us">

    <div align="center">
        <table border="1" width="47%" height="250" style="border-width: 0px" class="table-responsive">
            <!-- MSTableType="layout" -->

            <tr>
                <td style="border-style: none; border-width: medium">
                    　<form class="contact_form"  method="post" name="contact_form"  action="<?php echo U('Mail/send');?>" enctype="multipart/form-data">
                    <ul>
                        <li>
                            <h4>在线留言</h4>
                         <!--   <span>* 表示必填项</span>-->
                            <p>12小时内尽快给您回复</p>
                        </li>
                        <li>
                            <label for="name">姓名:</label>
                            <input name="name" type="text"  placeholder="name" required />
                        </li>

                        <li>
                            <label for="email">邮件:</label>
                            <input type="email" name="adress"  placeholder="123456@qq.com" required />
                            <span class="form_hint">格式：123456@qq.com</span>
                        </li>

                        <li>
                            <label for="country">国家:</label>
                            <input name="country" type="text"  placeholder="country" required />
                        </li>

                        <li>
                            <label for="Phone Number">电话:</label>
                            <input name="number"  type="text"  placeholder="Phone Number" required />
                        </li>

                        <li>
                            <label for="message">留言:</label>
                            <textarea name="message" cols="40" rows="6" placeholder="message" required ></textarea>
                        </li>

                        <li>
                            <label for="Comments Question">其他问题:</label>
                            <textarea name="com" cols="40" rows="4" placeholder="Comments /Question" ></textarea>
                        </li>


                        <li>
                            <button class="submit" type="submit">发送邮件</button>
                        </li>
                    </ul>
                </form></td>
            </tr>
        </table>
    </div>
</section>

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