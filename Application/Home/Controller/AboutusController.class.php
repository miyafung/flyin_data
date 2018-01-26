<?php
namespace Home\Controller;
//方案页面控制器
class AboutusController extends CommonController {
    public function index(){
        $Aboutus = M('aboutus');
        $where= array('status' => '1');
        $data = $Aboutus->where($where)->select();
        $this->assign("title","关于我们");
        $this->assign('keywords',"百兆单模单纤收发器,百兆单模双纤收发器,光纤收发器,工业以太网交换机,工业以太网收发器,工业级POE交换机,光电转换器,网管收发器,网管机架");
        $this->assign('description',"百兆单模单纤收发器,百兆单模双纤收发器,光纤收发器,工业以太网交换机,工业以太网收发器,工业级POE交换机,光电转换器,网管收发器,网管机架");
        $this->assign("aboutus",$data);
        $this->display("Aboutus/index");
    }
}