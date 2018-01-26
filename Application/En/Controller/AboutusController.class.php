<?php
namespace En\Controller;
//方案页面控制器
class AboutusController extends CommonController {
    public function index(){
        $Aboutus = M('aboutus');
        $where= array('status' => '1');
        $data = $Aboutus->where($where)->select();
        $this->assign("title","About Us");
        $this->assign("aboutus",$data);
        $this->display("Aboutus/index");
    }
}