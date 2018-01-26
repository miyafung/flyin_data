<?php
namespace Home\Controller;
//商品主页控制器
class ServicesController extends CommonController {
    //首页
    public function index(){
        //获得分类列表
        $data['servicecategory'] = D('Servicecategory')->getTree();
        //准备查询条件（推荐商品、已上架、不在回收站中）
        $where = array('recommend'=>'yes','on_sale'=>'yes','recycle'=>'no');
        //取出商品id，商品名，商品价格，商品图片
        $data['best'] = M('Services')->field('id,servicecategory_id,sn,name,thumb,on_sale,recommend,add_time,custom_time,date,desc,recycle')->where($where)->limit(4)->select();
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
        //防止空页被访问
        //  if(empty($data['goods']['data']) && $p > 0){
        //      $this->redirect('Index/find',array('cid'=>$cid));
        //  }
        //查询分类列表
        // $data['category'] = $Category->getFamily($cid);

        $data['cid'] = $cid;
        $data['p'] = $p;


        //查找分类导航
        $data['path'] = $Servicecategory->getPath($data['services']['cat_id']);

        //归档
      //  $Services = M(services);
      //  $Servicesgui = $Services->query("select count(id) as num,FROM_UNIXTIME(date,'%Y年%m月') as t,FROM_UNIXTIME(date,'%Y/%m') as t1  from flyin_services group by t order by t desc");
        

        $User = A("Index");
        $y=$_GET['_URL_']['2'];//年
        $m=$_GET['_URL_']['3'];	//月
        if (in_array($m, array(1, 3, 5, 7, 8, 01, 03, 05, 07, 08, 10, 12)))
        {
            $e = 31;  //天数
        }elseif ($m == 02)
        {
            if ($y % 400 == 0 || ($y % 4 == 0 && $y % 100 !== 0))
            {
                $e = 29;  //天数
            } else {
                $e = 28;  //天数
            }
        } else {
            $e = 30;  //天数
        }
        $d=01;
        $a='00:00:00';
        $b='23:59:59';
       // $ks=$y.'-'.$m.'-'.$d.' '.$a;//开始时间
      //  $js=$y.'-'.$m.'-'.$e.' '.$b;//结束时间
        $ks='2015-01-01 00:00:00';
        $js='2019-01-01 00:00:00';
        $start=strtotime($ks);
        $end=strtotime($js);

       // print_r($start);
       // print_r($end);
     //   die();

        $da=M("Services");
        $rs=$da->table('flyin_servicecategory c,flyin_services a')->field('c.name,a.id,a.name,a.add_time,a.servicecategory_id')->where("c.id=a.servicecategory_id and a.add_time>= $start and a.add_time <= $end")
            ->order('id desc')->select();
        $cont=count($rs);
        $this->assign('cont',$cont);
        $this->assign('rs',$rs);
        $kw=$y."年".$m."月的文章";
        $this->assign('kw',$kw);
    //   trace($kw);
      //  print_r($kw);
      //  dump($kw);
      //  die();



       // $this->assign("servicesgui",$Servicesgui);
     //   $this->assign('title',$data['services']['name'].' - flyin');
        $this->assign($data);
        $this->assign("title","服务支持");
        $this->display();

        // 在index.html页面可以用的name有 best.data   category.data

    }
    //查找商品
    public function find(){
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
        //防止空页被访问
        //  if(empty($data['goods']['data']) && $p > 0){
        //      $this->redirect('Index/find',array('cid'=>$cid));
        //  }
        //查询分类列表
        // $data['category'] = $Category->getFamily($cid);

        $data['cid'] = $cid;
        $data['p'] = $p;
        $this->assign('title','服务支持列表');
        //在find.html 可以使用的name 有category.data  cid.data  p.data  goods.data
        $this->assign($data);
        $this->display();
    }

    //商品详情页
    public function services(){
        $id = I('get.id/d',0); //商品ID
        $Services = D('Services');
        $Servicecategory = D('Servicecategory');
        //查找当前商品
        $data['services'] = $Services->getServices(array('id'=>$id));
        if(empty($data['services'])){
            $this->error('您访问的方案不存在，已下架或删除！');
        }
        //查找推荐商品
        $cids = $Servicecategory->getSubIds($data['services']['servicecategory_id']);
        //trace($cids);

        $where = array('recycle' => 'no','on_sale'=>'yes');
        $where['servicecategory_id'] = array('in',$cids);
     //   $data['recommend'] = $Services->getRecommend($where);


        //查找分类导航
        $data['path'] = $Servicecategory->getPath($data['services']['servicecategory_id']);
        $this->assign('title',$data['services']['name'].' - flyin');
        //视图页面调用  goods.html页面可以用的  name有  recommend.data  和 path.data  和goods.data

        $this->assign($data);
        $this->display(Services/services_info);
    }


}