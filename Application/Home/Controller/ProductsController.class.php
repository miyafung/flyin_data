<?php
namespace Home\Controller;
//商品主页控制器
class ProductsController extends CommonController {
    //首页
    public function index(){
        //获得分类列表
        $data['category'] = D('Category')->getTree();
        //准备查询条件（推荐商品、已上架、不在回收站中）
        $where = array('recommend'=>'yes','on_sale'=>'yes','recycle'=>'no');
        //取出商品id，商品名，商品价格，商品图片
        $data['best'] = M('Goods')->field('goods_id,goods_name,goods_pdf,img_center,hits')->where($where)->limit(4)->select();
        // 页面的name就是best.data



        //find()
        //获取参数
        $p = I('get.p/d',0);     //当前页码
        $cid = I('get.cid/d',-1); //分类ID
        //实例化模型
        $Goods = D('Goods');
        $Category = D('Category');
        //如果分类ID大于0，则取出所有子分类ID
        $cids = ($cid>0) ? $Category->getSubIds($cid) : $cid;
        //获取商品列表
        $data['goods'] = $Goods->getList($cids,$p);
        //防止空页被访问
        //  if(empty($data['goods']['data']) && $p > 0){
        //      $this->redirect('Index/find',array('cid'=>$cid));
        //  }
        //查询分类列表
        // $data['category'] = $Category->getFamily($cid);

        $data['cid'] = $cid;
        $data['p'] = $p;


        //查找分类导航
        $data['path'] = $Category->getPath($data['goods']['cat_id']);
        $this->assign('title',$data['goods']['goods_name'].' - flyin');

        $this->assign($data);
        $this->display();

       // 在index.html页面可以用的name有 best.data   category.data


    }
    //查找商品
    public function find(){
        //获取参数
        $p = I('get.p/d',0);     //当前页码
        $cid = I('get.cid/d',-1); //分类ID
        //实例化模型
        $Goods = D('Goods');
        $Category = D('Category');
        //如果分类ID大于0，则取出所有子分类ID
        $cids = ($cid>0) ? $Category->getSubIds($cid) : $cid;
        //获取商品列表
        $data['goods'] = $Goods->getList($cids,$p);
        //防止空页被访问
      //  if(empty($data['goods']['data']) && $p > 0){
      //      $this->redirect('Index/find',array('cid'=>$cid));
      //  }
        //查询分类列表
       // $data['category'] = $Category->getFamily($cid);

        $data['cid'] = $cid;
        $data['p'] = $p;
        $this->assign('title','商品列表');
        //在find.html 可以使用的name 有category.data  cid.data  p.data  goods.data
        $this->assign($data);
        $this->display();
    }

    //商品详情页
    public function goods(){
        $id = I('get.goods_id/d',0); //商品ID
        $Goods = D('Goods');
        $Category = D('Category');
        //查找当前商品
        $data['goods'] = $Goods->getGoods(array('goods_id'=>$id));
        if(empty($data['goods'])){
            $this->error('您访问的商品不存在，已下架或删除！');
        }
        //查找推荐商品
        $cids = $Category->getSubIds($data['goods']['category_id']);
        trace($cids);

        $where = array('recycle' => 'no','on_sale'=>'yes');
        $where['category_id'] = array('in',$cids);
        $data['recommend'] = $Goods->getRecommend($where);


        //查找分类导航
        $data['path'] = $Category->getPath($data['goods']['category_id']);
        $this->assign('title',$data['goods']['goods_name'].' - flyin');

        //视图页面调用  goods.html页面可以用的  name有  recommend.data  和 path.data  和goods.data
        $this->assign($data);
        $this->display(Goods/goods_info);
    }




    //数组分隔尝试
    public function  sz(){
        //$Model = M('Enbanners');
       // $where2 = array('shop_banners.recommend'=>'yes','shop_bannercategory.name'=>'bgbanner');
       // $Model=$Model->join('Shop_bannercategory ON Shop_bannercategory.id = Shop_banners.Bannercategory_id')->where($where2)->limit(1)
        $where = array('id'=>'24');
       // $Model= M('Enbanners')->field('id,name,sn')->where($where)->limit(3)->select();
        $Model['p']= M('Enbanners')->field('sn')->where($where)->find();
        $p=$Model['p']['sn'];
     //   trace($p);

       $Mo['p']=explode("，", $p);
        //$sz=$Mo['p'];
        trace($Mo);

        //$this->assign('sz', $Mo['p']);
        $this->assign('sz',$Mo['p']);
        $this->display();
      //  trace($sz);

    }
}