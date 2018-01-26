<?php
namespace EnAdmin\Controller;
//回收站控制器
class TestmenuController extends CommonController{

    //显示回收站商品列表
    public function index(){
        //获取参数
        $p = I('get.p/d',0);  //当前页码
        //实例化模型
        $Goods = D('Goods');
        //查询商品列表
        $data['goods'] = $Goods->getList('recycle',-1,$p);
        //防止查询到空页
        if(empty($data['goods']['data']) && $p > 0){
            $this->redirect('Recycle/index');}
        $data['p'] = $p;
        $this->assign($data);
        $this->display();
    }

}