<?php
namespace Home\Controller;
use Think\Controller;
class CommonController extends Controller
{
    /**
     * protected $userinfo = false;  //用户登录信息（未登录为false）
     * //构造方法
     * public function __construct() {
     * parent::__construct();
     * //登录检查
     * $this->checkUser();
     * }
     * //检查登录
     * private function checkUser(){
     * if(session('?userinfo')){
     * $this->userinfo = session('userinfo');
     * $this->assign('userinfo',$this->userinfo);
     * }
     * }
     * public function _empty($name){
     * $this->error('无效的操作：'.$name);
     * }
     **/


    public function view()
    {
        $this->assign("goodsList", D("category")->getCatGoodsList());
        $this->assign("title", "产品分类");
        $this->display("Goods/index");

    }


    public function _initialize()
    {

        //产品目录
        setcookie(session_name(), session_id(), time() + 24 * 3600);
        $this->assign("catList", D("category")->getCatList());

        //产品的浏览记录
        $history = unserialize( $_COOKIE['history'] );    //当前已浏览过的商品二维数组
        $this->assign("history",$history);   //浏览商品show         【这三行主要跟商品浏览cookie有关】


        //友情链接
        $where = array('isshow' => '1');
        $frienddata = M('friendlink')->field('id,linkname,url')->order('linkorder')->where($where)->select();
        $this->assign('friendlink', $frienddata);


        //网站底部footer信息
        $where2 = array('status' => '1');
        $website= M('website')->field('id,title,copy,logo,description,hotsearch,keywords,address,linkman,cellphone,cellphone,tel,fax,mail,qq')->where($where2)->select();
        $this->assign('website', $website);

     //   dump($website);
      //  die();

        

        /************************ 服务支持导航目录**************************/
        //获得分类列表
        $data['servicecategory'] = D('Servicecategory')->getTree();
        //准备查询条件（推荐商品、已上架、不在回收站中）
        $where = array('recommend'=>'yes','on_sale'=>'yes','recycle'=>'no');
        //取出商品id，商品名，商品价格，商品图片
        $data['best'] = M('Services')->field('id,servicecategory_id,sn,name,thumb,on_sale,recommend,add_time,custom_time,desc,recycle')->where($where)->limit(4)->select();
        // 页面的name就是best.data

        //find()
        //获取参数
        $p = I('get.p/d',0);     //当前页码
        $cid = I('get.cid/d',-1); //分类ID
        //实例化模型
        $Services = D('Services');
        $Servicecategory = D('Servicecategory');
        //如果分类ID大于0，则取出所有子分类ID
        $cids = ($cid>0) ? $Servicecategory->getSubIds($cid) : $cid;
        //获取商品列表
        $data['services'] = $Services->getList($cids,$p);
        $data['cid'] = $cid;
        $data['p'] = $p;

        //查找分类导航
        $data['path'] = $Servicecategory->getPath($data['services']['cat_id']);
        $this->assign($data);


        /***********************  服务支持导航目录 END**************************/





        /************************ 新闻导航目录  START*************************/
        //获得分类列表
        $data['newcategory'] = D('Newcategory')->getTree();
        $where = array('recommend'=>'yes','on_sale'=>'yes','recycle'=>'no');
        //取出商品id，商品名，商品价格，商品图片
        $data['best'] = M('News')->field('id,newcategory_id,sn,name,thumb,on_sale,recommend,add_time,custom_time,desc,recycle')->where($where)->limit(4)->select();
        // 页面的name就是best.data
        //获取参数
        $p = I('get.p/d',0);     //当前页码
        $cid = I('get.cid/d',-1); //分类ID
        //实例化模型
        $News = D('News');
        $Newcategory = D('Newcategory');
        //如果分类ID大于0，则取出所有子分类ID
        $cids = ($cid>0) ? $Newcategory->getSubIds($cid) : $cid;
        //获取商品列表
        $data['news'] = $News->getList($cids,$p);
        $data['cid'] = $cid;
        $data['p'] = $p;
        //查找分类导航

        $data['path'] = $Newcategory->getPath($data['news']['cat_id']);
        $this->assign($data);
        // 在index.html页面可以用的name有 best.data   category.data
        /************************ 新闻导航目录  END*************************/







    }


    //*************商品的浏览历史 START
    public function goodshistory( $goods_id ){
        $goods = M('Goods');
        $goodsResult = $goods->where(" goods_id = '{$goods_id}' ")->find();   // 【通过传递过来的商品唯一的id号， 查找该商品信息】
        $current = unserialize( $_COOKIE['history'] );   // 【当前已浏览过的商品  二维数组】
        $temp_num=count(  $current  );     //  【计算里面记录的浏览过的商品的个数】
        if(  $temp_num > 2  ){                        // 【这里只记录最多6个足迹】
            $current=array_reverse($current);
            array_pop($current);                   // 【反转数组后弹出最后一个元素（也就是第一个元素）】
            $current=array_reverse($current);    //【再反转回正确的排序】
            $temp_num=2;
        }
        if( $_COOKIE['history']=="" ){      //【如果一个商品也没看过则存入】
            $current[0]['goods_id']=$goodsResult['goods_id'];  //id
           $current[0]['goods_name']=$goodsResult['goods_name'];    //商品名称 goodsname为商品名称在数据库字段，下同
            $current[0]['img_center']=$goodsResult['img_center'];   //商品缩略图
            cookie('history',serialize($current),array('expire'=>3600,'path'=>'/'));      // 【thinkphp特有的写cookie的函数方法】
          //  cookie('history',serialize($current));
        }else{     //【如果cookie有商品浏览历史记录】
            $temp_s=0;  //【临时变量,否则判断当前商品ID和数组中存的ID是否有一样,一样则$temp_s=1】
            foreach( $current as $key => $value ){
                    if( $value['goods_id'] == $goodsResult['goods_id'] ){     //有本产品的记录则不操作
                        $temp_s=1;
                    }
            }
            if(  $temp_s==0  )    //【如果没一样的则记录下来】
            {
                $current[$temp_num]['goods_id']=$goodsResult['goods_id'];
                $current[$temp_num]['goods_name']=$goodsResult['goods_name'];
                $current[$temp_num]['img_center']=$goodsResult['img_center'];
                cookie('history',serialize($current),array('expire'=>3600,'path'=>'/'));
               // cookie('history',serialize($current));
            }
        }
    }
    //*************商品的浏览历史 END




}
