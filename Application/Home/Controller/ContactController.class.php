<?php
namespace Home\Controller;
//联系我们页面控制器
class ContactController extends CommonController {
    public function index(){
        $ip = get_client_ip();
        $clientime=date("Y-m-d H:i:s");
        //获取index.html 表单的内容
        $logModel = M('message'); //实例化模型
        if (IS_POST) {
            if ($_POST['name'] != "") {
            if ($logModel->create()) {
                //$logModel->password = md5($admin->password);
                $datainquiry= array(
                    'ip' => $ip, //
                    'name'=>$_POST['name'],
                    'phone'=>$_POST['phone'],
                    'email_adress'=>$_POST['email_adress'],
                    'message'=>$_POST['message'],
                    'current_time'=>$clientime,
                    'time'=>time(), //操作时间(当前系统时间)
                );
                if ($logModel->add($datainquiry)) {
                  $this->success('留言成功！', U('index'));
                 //   return alert('用户名或者密码错误', U('index'), 5);
                } else {
                    $this->error('留言失败！');
                }
            } else {
                $this->error($logModel->getError());
            }
            return;
            }
        }

        $this->assign("title","联系我们");
        $this->assign('keywords',"百兆单模单纤收发器,百兆单模双纤收发器,光纤收发器,工业以太网交换机,工业以太网收发器,工业级POE交换机,光电转换器,网管收发器,网管机架");
        $this->assign('description',"百兆单模单纤收发器,百兆单模双纤收发器,光纤收发器,工业以太网交换机,工业以太网收发器,工业级POE交换机,光电转换器,网管收发器,网管机架");
        $this->assign();
        $this->display();
    }
}