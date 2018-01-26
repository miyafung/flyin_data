<?php
namespace En\Controller;
//方案页面控制器
class GoodsController extends CommonController {

    /****  产品关键字查询 START ***/
    public function searchall(){
        // 搜索关键字
        $this->assign('goodssearch',D("goods")->goodsSearch());
        $this->assign('newssearch',D("goods")->newsSearch());
        $this->assign('servicessearch',D("goods")->serviceSearch());
        $this->assign('addkeyword',D("goods")->addkeyword());
        $this->assign("title","Search All");
        $this -> display("Search/search");
    }

    /****  产品关键字查询 START ***/
    public function search(){
        // 搜索关键字
        $keywords = trim($_POST['keywords']);
        // 实例化friendlink
        $fdpdf = M('goods');
        //搜索内容为链接名称与链接介绍
        $goods = $fdpdf ->order('goods_id') ->where("goods_name like '%{$keywords}%'") -> limit($page -> firstRow.','.$page -> listRows) -> select();
        $this -> assign('goodssearch',$goods);
        $this->assign("title","商品查找");
        $this -> display("search");
    }

    /****  产品关键字查询 END ***/
    public function index(){
       $this->assign( "goodsList", D("goods")->getGoodsList() );
        $this->assign("title","Products List");
        $this->display();
    }

    /**20170612 产品**/
    public function view() {

        //**********浏览历史记录
        $goods_id = intval($_GET['goods_id']);   // 从前台传递过来的id号
        if(  isset($goods_id )  ){      //  如果该id号设置了
            $this->goodshistory($goods_id);         //  写入浏览历史cookie    调用写商品cookie的函数，并把该商品id号传递过去
            $history = unserialize( $_COOKIE['history'] );    //当前已浏览过的商品二维数组
            $this->assign("history",$history);   //浏览商品show         【这三行主要跟商品浏览cookie有关】
        }
        //*********** 浏览历史记录




        $this->assign("goodsInfo", D("goods")->getGoodsInfo());
        $this->assign( "goodsInfo2", D("goods")->getGoodsInfo2() );




        //*************友情网站
        $where = array('isshow'=>'1');
        $frienddata= M('friendlink')->field('id,linkname,url')->order('linkorder')->where($where)->select();
        $this->assign('friendlink',$frienddata );
        //*************友情网站

        //*******网站地图
        //import('Class.Sitemap',APP_PATH);
        import("Common.Org.sitemap");
        // import('Class.Sitemap',APP_PATH);
        $site = new \Sitemap();
        $cate = M('category')->field(array('cat_id'))->select();
        foreach ($cate as $v)
        {
            $site->AddItem(C('cfg_url').'/Category/view/cat_id/'.$v['cat_id'], 1);
        }
        $site->SaveToFile('sitemap.xml');
        //*******网站地图





        //这一步是为了 商品的title START
        $News = D('Goods');
        //查找当前商品
        $data['goods'] = $News->getGoods(array('goods_id'=>$goods_id));

        //查找推荐商品
        $this->assign('title',$data['goods']['goods_name']);
        //这一步是为了 商品的title end
        $this->assign('keywords',$data['goods']['goods_keyword']);
        $this->assign('description',$data['goods']['goods_name']);

        $this->display("goods_info");
    }

    // ajax设置点击量
    public function set_hits(){
        if(!$_GET['goods_id']){return;}
        M('goods')->where("goods_id = '{$_GET['goods_id']}'")->setInc('hits',1);
    }
    
}