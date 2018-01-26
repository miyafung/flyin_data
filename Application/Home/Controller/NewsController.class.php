<?php
namespace Home\Controller;
//商品主页控制器
class NewsController extends CommonController {
    //首页
    public function index(){

        $this->assign("title","新闻");
        $this->assign('keywords',"百兆单模单纤收发器,百兆单模双纤收发器,光纤收发器,工业以太网交换机,工业以太网收发器,工业级POE交换机,光电转换器,网管收发器,网管机架");
        $this->assign('description',"百兆单模单纤收发器,百兆单模双纤收发器,光纤收发器,工业以太网交换机,工业以太网收发器,工业级POE交换机,光电转换器,网管收发器,网管机架");
        $this->display();
        // 在index.html页面可以用的name有 best.data   category.data

    }
    //查找商品
    public function find(){
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
        //防止空页被访问
        //  if(empty($data['goods']['data']) && $p > 0){
        //      $this->redirect('Index/find',array('cid'=>$cid));
        //  }
        //查询分类列表
        // $data['category'] = $Category->getFamily($cid);

        $data['cid'] = $cid;
        $data['p'] = $p;


        $this->assign('title','新闻列表');
        //在find.html 可以使用的name 有category.data  cid.data  p.data  goods.data
        $this->assign($data);
        $this->display();
    }

    //商品详情页
    public function news(){
        $id = I('get.id/d',0); //商品ID
        $News = D('News');
        $Newcategory = D('Newcategory');
        //查找当前商品
        $data['news'] = $News->getNews(array('id'=>$id));
        if(empty($data['news'])){
            $this->error('您访问的商品不存在，已下架或删除！');
        }
        //查找推荐商品
        $cids = $Newcategory->getSubIds($data['news']['newcategory_id']);
        $where = array('recycle' => 'no','on_sale'=>'yes');
        $where['newcategory_id'] = array('in',$cids);
     //   $data['recommend'] = $News->getRecommend($where);

        //查找分类导航
        $data['path'] = $Newcategory->getPath($data['news']['newcategory_id']);

    //    print_r($data['news']['newcategory_id']);
       //  die();


       //print_r( $data['path']);
       // die();

        $this->assign('title',$data['news']['name'].' - flyindate');

        //视图页面调用  goods.html页面可以用的  name有  recommend.data  和 path.data  和goods.data


        $this->assign($data);
        $this->display(News/news_info);
    }


    //新闻归档
    public function newguidang(){
        if (!$_allContent = S('history_allContent')) {
            $_allContent = D('News');
            //定义一个年份,当前年
            for ($i = date('Y'); $i >= 2015; $i--) {
                for ($j = 12; $j >= 1; $j--) {
                    for ($k = 31; $k >= 1; $k--) {
                        $where['add_time'] = array('BETWEEN', array(strtotime($i . '-' . $j . '-' . $k . ' 00:00:00'),
                            strtotime($i . '-' . $j . '-' . $k . ' 23:59:59')));
                        $_allContent[$i][$j][$k] = M('news')->where($where)->field('id,name,add_time')->select();
                        //注销空的数组
                        if (empty($_allContent[$i][$j][$k])) {
                            unset($_allContent[$i][$j][$k]);
                            if (empty($_allContent[$i][$j])) {
                                unset($_allContent[$i][$j]);
                                if (empty($_allContent[$i])) {
                                    unset($_allContent[$i]);
                                }
                            }
                        }
                    }
                }
            }
            S('history_allContent', $_allContent);} else {$_allContent = S('history_allContent');}
        $this->allHistoryContent = $_allContent;
        //生成全静态(放在根目录)
        $source = './newguidang.html';

        echo(kkkkkkkkkkkkkkkkkkkkkkkkkkkk);
        if (!file_exists($source)) {
            $this->buildHtml('newguidang', './', 'newguidang', 'utf8');}
            $this->display();


    }
}