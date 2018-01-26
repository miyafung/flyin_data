<?php
namespace Home\Controller;
//方案页面控制器
class MailController extends CommonController {
    public function index(){

        $this->assign();
        $this->display();
    }


    public function send()
    {
        $config['host'] = 'smtp.163.com';
       // $config['username'] = 'm13570833720@163.com';
        $config['username'] = 'flyindata@163.com';
        $config['password'] = 'wy123456';
      //  $config['from_email'] = 'm13570833720@163.com';
        $config['from_email'] = 'flyindata@163.com';
        $config['from_name'] = 'flyindata.com.cn';
        $config['default_subject'] = '飞宇集团有源部网站询盘';
        $receive_email = '2747269014@qq.com';
        $ip = get_client_ip();
        //$clientime = get_client_time();
       
        $clientime=date("Y-m-d H:i:s");
//获取index.html 表单的内容
        $content = '<div align="left" style="500px;">
            <ul>
                <li>客户IP：' .$ip . '</li>
                <li>询盘时间:' .$clientime. '</li>
                <li>姓名：' . $_POST['name'] . '</li>
                <li>邮箱地址：' . $_POST['adress'] . '</li>
                <li>国家：' . $_POST['country'] . '</li>
                <li>手机号码：' . $_POST['number'] . '</li>
                <li>产品信息：' . $_POST['message'] . '</li>
                <li>内容：' . $_POST['com'] . '</li>
            </ul>
        </div>';

        //$clientime=date();

        $logModel = M('inquiry'); //实例化模型
        $datainquiry= array(
            'ip' => $ip, //
            'clientime	'=>$clientime,
            'name'=>$_POST['name'],
            'adress'=>$_POST['adress'],
            'country'=> $_POST['country'],
            'number'=>$_POST['number'],
            'message'=>$_POST['message'],
            'contain'=> $_POST['com'],
            'time'=>time(), //操作时间(当前系统时间)
        );
       // print_r($datainquiry);
      //  die();
        $logModel->add($datainquiry);



        $Mail= D('Mail');
        //如果分类ID大于0，则取出所有子分类ID
        $res = $Mail->sendMail($config, $receive_email, $content);
        //print_r( $res);
        //die();

        if($res==1){
          //  alert('发送成功，即将返回页面。',U('Mail/index'));
           $this->success('发送成功，即将返回页面。',U('Mail/index'));
        } else {
            // 错误页面
            $this->success('发送失败，即将返回页面。',U('Mail/index'));
            //echo $res;
        }
        $this->assign();
      //  $this->display("index");
    }
}