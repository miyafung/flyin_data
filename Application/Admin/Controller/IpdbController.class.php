<?php
namespace Admin\Controller;
class IpdbController extends CommonController
{
    //后台首页，显示访客日志基本信息
    public function index(){
        $data=D('Ipdb')->order('time desc')->page($_GET['p'].',10')->select();
        $count      = D('Ipdb')->count();
        $Page       = new \Think\Page($count,10);
        $show       = $Page->show();
        $this->assign('dataip',$data);
        $this->assign('page',$show);
        $this->assign('count',$count);
        $this->display();
    }

}