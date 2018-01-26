<?php
namespace Admin\Model;
use Think\Model;
class TesttModel extends Model {

    //获得会员列表
    public function getList(){
        $field = 'id,username,phone,email';
        $where = array();
        $order = 'id desc';
        //查询数据
        $count = $this->where($where)->count();
        $Page = new \Think\Page($count,C('USER_CONFIG.pagesize'));
        $this->_customPage($Page); //定制分页类样式
        $limit = $Page->firstRow.','.$Page->listRows;


        //取得数据
        return array(
            'list' => $this->field($field)->where($where)->order($order)->limit($limit)->select(),
            'page' => $Page->show(),
        );
    }
}
