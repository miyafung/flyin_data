<?php
namespace Admin\Model;
use Think\Model;
class AdminlogModel extends Model {

    public function UserLoginLog($log, $id)
    {
        $logModel = M('Adminlog'); //实例化模型
        $data = array(
            'admin_id' => $id, //用户ID
            'op_log' => $log, //操作内容
            'op_time' => time() //操作时间(当前系统时间)
        );
        $logModel->add($data);

    }

}