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
                <li><a href="<?php echo U('Index/index');?>">Home</a></li>
                <li class="dropdown">
                    <a href="<?php echo U('Goods/index');?>" class="dropdown-toggle" data-toggle="dropdown" >Products</a>
                    <ul class="dropdown-menu">
                        <?php if(is_array($catList)): $i = 0; $__LIST__ = $catList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('Common/view?cat_id=' . $vo['cat_id']);?>"><?php echo ($vo["cat_name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="<?php echo U('Services/index');?>" class="dropdown-toggle" data-toggle="dropdown" >Support</a>
                    <ul class="dropdown-menu">
                        <?php if(is_array($servicecategory)): $i = 0; $__LIST__ = array_slice($servicecategory,0,20,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v1): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('Services/index',array('cid'=>$v1['id']));?>"><?php echo ($v1["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="<?php echo U('News/index');?>" class="dropdown-toggle" data-toggle="dropdown" >News</a>
                    <ul class="dropdown-menu">
                        <?php if(is_array($newcategory)): $i = 0; $__LIST__ = array_slice($newcategory,0,20,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v1): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('News/index',array('cid'=>$v1['id']));?>"><?php echo ($v1["name"]); ?></a> </li><?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </li>
                <li> <a href="<?php echo U('Aboutus/index');?>">About Us</a></li>
                <li><a href="<?php echo U('Contact/index');?>">Contuct Us</a></li>
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



<!--载入List文件-->
<!--
<script src="/Public/Home/js/jquery-v1.10.2.min.js" type="text/javascript"></script>
-->

    <script>
        /***修改jQuery写法
        $(document).ready(function(){
            $('.flicker-example').flicker();
        });
        **/
        jQuery(document).ready(function($){
            $('.flicker-example').flicker();
        });
    </script>


<div class="flicker-example" data-block-text="false">
    <ul>
        <?php if(is_array($bannerdata)): $i = 0; $__LIST__ = $bannerdata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$bn): $mod = ($i % 2 );++$i;?><li data-background="/Public/Uploads/banner/yuan/<?php echo ($bn["thumb"]); ?>">
                <div class="flick-title"><?php echo ($bn["banner_name"]); ?></div>
                <div class="flick-sub-text"><?php echo ($bn["desc"]); ?></div>
            </li><?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
</div>





<!--载入List文件-->
<script>
    function csubstr2(str,len){
        if(str.length>10){
            return str.substring(0,len)+"...";
        }else{
            return str;
        }
    }
</script>

<!-- Gallery -->
<section id="news-section-1" class="property-details  padding bg_gallery" >
    <div class="container property-details" >

        <div class="row">
            <div class="col-sm-12 text-center">
                <h4 class="uppercase">推荐产品</h4>
                <p class="heading_space">We have Properties in these Areas View a list of Featured Properties.</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <!--推荐产品-->
                    <?php if(is_array($remendgoods)): $i = 0; $__LIST__ = $remendgoods;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="col-sm-4">
                            <div class="property_item heading_space">
                                <div class="image">
                                    <a href="#.">
                                        <img src="/Public/Uploads/products/center/<?php echo ($vo["img_center"]); ?>" alt="<?php echo ($vo["goods_name"]); ?>" class="img-responsive" >
                                    </a>
                                    <div class="price clearfix">
                                        <span class="tag pull-right">浏览量：<?php echo ($vo["hits"]); ?></span>
                                    </div>

                                </div>
                                <div class="proerty_content">
                                    <div class="proerty_text">
                                        <h5 class="captlize">
                                            <!--   <a href="#."><?php echo ($vo["goods_name"]); ?></a>-->
                                            <a href="<?php echo U('Goods/view?cat_id=' . $vo['cat_id'] . '&goods_id=' . $vo['goods_id']);?>" target="_blank" data-toggle="tooltip" data-placement="right" title="<?php echo ($vo["goods_name"]); ?>">
                                                <script>document.write(csubstr2("<?php echo ($vo["goods_name"]); ?>",25));</script>
                                            </a>
                                        </h5>
                                        <p><?php echo ($vo["price"]); ?></p>
                                    </div>
                                    <div class="favroute clearfix">
                                        <p class="pull-md-left"><?php echo ($vo["list_time"]); ?><i class="icon-calendar2"></i></p>
                                    </div>
                                </div>
                            </div>
                        </div><?php endforeach; endif; else: echo "" ;endif; ?>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- Gallery End -->

<!--Deals-->
<section id="deal" class="padding_bottom_half padding_top">
    <div class="container">
        <div class="row">
            <div class="col-sm-10">
                <h3 class="uppercase">基础解决方案</h3>
                <p class="heading_space">专业的设计团队</p>
            </div>
        </div>
        <div class="row">
            <div id="two-col-slider" class="owl-carousel">
                <?php if(is_array($solvebannerdata)): $i = 0; $__LIST__ = $solvebannerdata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sobn): $mod = ($i % 2 );++$i;?><div class="item">
                    <div class="listing_full">
                        <div class="image">
                            <img alt="<?php echo ($sobn["banner_name"]); ?>" src="/Public/Uploads/banner/yuan/<?php echo ($sobn["thumb"]); ?>">
                           <!-- <span class="tag_t">3</span>-->
                        </div>
                        <div class="listing_full_bg">
                            <div class="listing_inner_full">
                                <span><a href="#"><i class="icon-like"></i></a></span>
                                <a href="#.">
                                    <h4>深圳大学软件院系</h4>
                                    <p>2017-08-15</p>
                                </a>
                                <div class="favroute clearfix">
                                    <div class="property_meta"><span><i class="icon-select-an-objecto-tool"></i>4800 sq ft</span><span><i class=" icon-bed"></i>3 Bedrooms</span><span><i class="icon-safety-shower"></i>2 Bedrooms</span><span class="border-l">$38,600 / pm</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
        </div>
    </div>
</section>
<!--Deals ends-->

<!--Parallax-->
<section id="parallax_four" class="padding">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 bottom30">
                <h2 class="uppercase">超过<strong>7000</strong>顾客选择飞宇</h2>
            </div>
            <div class="col-sm-8 col-md-10">
                <div class="row">
                    <div class="col-sm-6 margin40">
                        <i class="icon-presentation"></i>
                        <h4 class="bottom10">良好的售后服务</h4>
                        <p>一站式技术支持</p>
                    </div>
                    <div class="col-sm-6 margin40">
                        <i class="icon-icons215"></i>
                        <h4 class="bottom10">高品质的工业产品</h4>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam power nonummy nibh tempor cum soluta nobis eleifend.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--About Owner ends-->


<!--载入List文件-->

<script>
    function csubstr(str,len){
        if(str.length>10){
            return str.substring(0,len)+"...";
        }else{
            return str;
        }
    }
</script>



<!--Testinomials-->
        <section id="testinomialBg" class="padding bg_light">
            <div id="agent-2" class="padding_bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 text-center">
                            <h2 class="uppercase">Hot Products</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam nec viverra erat Aenean elit tellus.</p>
                        </div>
                    </div>
                    <div class="row">
                        <?php if(is_array($goodsList)): $i = 0; $__LIST__ = $goodsList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="col-sm-4 margin40">
                            <div class="agent_wrap">
                                <div class="image">
                                    <img src="/Public/Uploads/products/center/<?php echo ($vo["img_center"]); ?>" alt="<?php echo ($vo["goods_name"]); ?>">
                                    <div class="img-info">
                                        <a href="<?php echo U('Goods/view?cat_id=' . $vo['cat_id'] . '&goods_id=' . $vo['goods_id']);?>" target="_blank" data-toggle="tooltip" data-placement="right" title="<?php echo ($vo["goods_name"]); ?>">
                                            <h6><script>document.write(csubstr("<?php echo ($vo["goods_name"]); ?>",26));</script></h6>
                                        </a>

                                        <span>View | <?php echo ($vo["hits"]); ?></span>
                                        <p class="top20 bottom30"><?php echo ($vo["goods_name"]); ?></p>

                                        <!--
                                        <table class="agent_contact table">
                                            <tbody>
                                            <tr class="bottom10">
                                                <td><strong>Phone:</strong></td>
                                                <td class="text-right">(+01) 34 56 7890</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Email Adress:</strong></td>
                                                <td class="text-right"><a href="#.">bohdan@castle.com</a></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        -->
                                        <hr>
                                        <a STYLE="text-decoration: none;color: yellow" href="<?php echo U('Goods/view?cat_id=' . $vo['cat_id'] . '&goods_id=' . $vo['goods_id']);?>" target="_blank" >MORE >></a>
                                        <!--
                                        <a class="btn-more" href="javascript:void(0)">
                                            <i><img alt="arrow" src="/Public/Home/images/arrow-yellow.png"></i><span><a class="btn-more"href="<?php echo U('Goods/view?cat_id=' . $vo['cat_id'] . '&goods_id=' . $vo['goods_id']);?>" target="_blank" > Full Profile</a></span><i><img alt="arrow" src="/Public/Home/images/arrow-yellow.png"></i>
                                        </a>
                                        -->
                                    </div>
                                </div>
                            </div>
                        </div><?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                </div>
            </div>



            <!--
            <div class="container bg_white padding">
                <div class="row">
                    <div class="col-xs-12 text-center">
                        <h3 class="uppercase">顾客反应</h3>
                        <p class="heading_space">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam nec viverra erat Aenean elit tellus.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div id="testinomial-slider" class="owl-carousel display navigate">
                            <div class="item">
                                <div class="testinomial_content text-center">
                                    <img src="/Public/Home/images/author2.png" alt="happy client" class="bottom15">
                                    <h4 class="uppercase"> SAM NICHOLSON</h4>
                                    <span class="smmery bottom15">( NorthMarq Capital  )</span>
                                    <img src="/Public/Home/images/stars.png" alt="rating" class="bottom30">
                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh tempor cum soluta nobis consectetuer adipiscing. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel.</p>
                                </div>
                            </div>
                            <div class="item">
                                <div class="testinomial_content text-center">
                                    <img src="/Public/Home/images/author.png" alt="happy client" class="bottom15">
                                    <h4 class="uppercase"> SAM NICHOLSON</h4>
                                    <span class="smmery bottom15">( NorthMarq Capital  )</span>
                                    <img src="/Public/Home/images/stars.png" alt="rating" class="bottom30">
                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh tempor cum soluta nobis consectetuer adipiscing. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel.</p>
                                </div>
                            </div>
                            <div class="item">
                                <div class="testinomial_content text-center">
                                    <img src="/Public/Home/images/author2.png" alt="happy client" class="bottom15">
                                    <h4 class="uppercase"> SAM NICHOLSON</h4>
                                    <span class="smmery bottom15">( NorthMarq Capital  )</span>
                                    <img src="/Public/Home/images/stars.png" alt="rating" class="bottom30">
                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh tempor cum soluta nobis consectetuer adipiscing. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            -->
        </section>
<!--Testinomials ends-->

<!--载入Partner文件-->

 <!--Partners-->
 <section id="logos">
     <div class="container partner2 padding">
         <div class="row">
             <div class="col-sm-12 text-center">
                 <h3 class="uppercase">Partners</h3>
                 <p class="heading_space">Industrial optical fiber equipment manufacturer provides you with the most reasonable solutions, leading, safe and stable optical fiber equipment products, shenzhen feiyu active department can help you leap forward</p>
             </div>
         </div>
         <div class="row">
             <div id="partners" class="owl-carousel">
                 <?php if(is_array($partnerbannerdata)): $i = 0; $__LIST__ = $partnerbannerdata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pbn): $mod = ($i % 2 );++$i;?><div class="item">
                         <img src="/Public/Uploads/banner/yuan/<?php echo ($pbn["thumb"]); ?>" alt="<?php echo ($pbn["banner_name"]); ?>">
                     </div><?php endforeach; endif; else: echo "" ;endif; ?>
             </div>
         </div>
     </div>
 </section>
 <!--Partners Ends-->




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
                        <p class="bottom15">Address:<?php echo ($wb["address"]); ?></p>
                        <p class="bottom15">Please contact us if you are interested in our products</p><?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="footer_panel bottom30">
                    <h4 class="bottom30 heading">Map</h4>
                    <table style="width:100%;">
                        <tbody>
                        <tr>
                            <td>
                                <ul class="links">
                                    <li><a href="<?php echo U('Index/index');?>"><i></i>Phone</a></li>
                                    <li><a href="<?php echo U('Goods/index');?>"><i></i>Products</a></li>
                                    <!--新闻-->
                                    <?php if(is_array($newcategory)): $i = 0; $__LIST__ = array_slice($newcategory,0,20,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v1): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('News/index',array('cid'=>$v1['id']));?>"><i></i><?php echo ($v1["name"]); ?></a> </li><?php endforeach; endif; else: echo "" ;endif; ?>
                                    <li><a href="<?php echo U('Contact/index');?>"><i></i>Contact us</a></li>
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
                    <h4 class="bottom30 heading">Contact</h4>

                    <div class="media bottom30">
                        <div class="media-body">
                            <a href="#.">Phone：</a>
                            <span><i class="icon-clock5"></i><?php echo ($wb["tel"]); ?></span>
                        </div>
                    </div>

                    <div class="media">
                        <div class="media-body">
                            <a href="#.">Fax:</a>
                            <span><i class="icon-clock5"></i><?php echo ($wb["fax"]); ?></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="footer_panel bottom30">
                    <h4 class="bottom30 heading">Other</h4>
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
                    <h4 class="bottom30 heading">live message</h4>
                    <p>Our will contact you soon within next 12 hours.</p>
                    <a style="text-decoration: none;" href="<?php echo U('Contact/index');?>" class="btn-yellow"><i></i>Live Message</a>
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