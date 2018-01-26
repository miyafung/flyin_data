<?php
namespace Home\Model;
use Think\Model;
class NewsModel extends Model {

    /**
     * 商品列表
     * @param array|int $cids 分类ID数组
     * @param int $p 当前页码
     * @return array 查询结果
     */
    public function getList($cids=0,$p=0){
        //准备查询条件
        $field = 'newcategory_id,id,name,thumb,custom_time,desc';
        $where = array('recycle' => 'no','on_sale'=>'yes');
        //查找分类ID数组
        if($cids > 0){
            $where['newcategory_id'] = array('in',$cids);
        }
        //--------处理排序条件
        $order = 'id desc';
        //准备分页查询
        $count = $this->where($where)->count();       //获取符合条件的商品总数
        $Page  = new \Think\Page($count,6);
        $Page->setConfig('prev', '上一页');
        $Page->setConfig('next', '下一页');
        $Page->setConfig('first', '首页');
        $Page->setConfig('last', '共%TOTAL_PAGE%页');
        //查询商品数据
        $data = $this->field($field)->where($where)->order($order)->limit($Page->firstRow . ',' . $Page->listRows)->select();
        //返回结果
        return array(
            'data' => $data,              //商品列表数组
            'pagelist' => $Page->show(),  //分页链接HTML
        );
    }
    
    //根据$where条件查询商品数据
    public function getNews($where){
        //定义需要的字段
        $field = 'id,newcategory_id,sn,name,thumb,desc,custom_time';
        return $this->field($field)->where($where)->find();
    }
}