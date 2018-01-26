<?php
namespace EnAdmin\Controller;
use Think\Controller;
//后台用户登录
class LoginController extends Controller {
	//登录页
    public function index(){
        $admin=D('admin');
        if(IS_POST){
            if($admin->create($_POST,4)){
                if($admin->login()){
                    $this->success('登录成功，跳转中...',U('Index/index'));
                }else{
                    $this->error('用户名或者密码错误！');
                }
            }else{
                $this->error($admin->getError());
            }

            return;
        }

        $this->display();
    }

    public function verify(){
        $Verify = new \Think\Verify();
        $Verify->length=2;
        $Verify->entry();
    }

    public function logout()
    {
        session(null);
        $this->success('退出成功！', U('Login/index'));

    }




}