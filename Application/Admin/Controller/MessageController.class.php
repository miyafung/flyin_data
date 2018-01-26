<?php
namespace Admin\Controller;
class MessageController extends CommonController
{
    //后台首页，显示访客日志基本信息
    public function index(){
        $data=D('Message')->order('time desc')->page($_GET['p'].',10')->select();
        $count      = D('Message')->count();
        $Page       = new \Think\Page($count,10);
        $show       = $Page->show();
        $this->assign('dataip',$data);
        $this->assign('page',$show);
        $this->assign('count',$count);
        $this->display();
    }

}