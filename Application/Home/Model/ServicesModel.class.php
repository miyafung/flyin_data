<?php
namespace Home\Model;
use Think\Model;
class ServicesModel extends Model {
    /**
     * @param array|int $cids 分类ID数组
     * @param int $p 当前页码
     * @return array 查询结果
     */
    public function getList($cids=0,$p=0){
        //准备查询条件
        $field = 'servicecategory_id,id,name,thumb,custom_time,date,add_time';
        $where = array('recycle' => 'no','on_sale'=>'yes');
        //查找分类ID数组
        if($cids > 0){
            $where['servicecategory_id'] = array('in',$cids);
        }
        $recommend = $this->getRecommend($where);         //获取推荐商品
        //--------处理排序条件
        $order = 'id desc';
        //--------处理价格条件
        //准备分页查询
        $count = $this->where($where)->count();       //获取符合条件的商品总数
        $Page  = new \Think\Page($count,6);

        //查询商品数据
        $data = $this->field($field)->where($where)->order($order)->limit($Page->firstRow . ',' . $Page->listRows)->select();
        //返回结果
        return array(
            'data' => $data,              //商品列表数组
            'pagelist' => $Page->show(),  //分页链接HTML
            'recommend' => $recommend,    //被推荐的商品
        );
    }
    //根据$where条件查询商品数据
    public function getServices($where){
        //定义需要的字段
        $field = 'id,servicecategory_id,sn,name,thumb,desc,custom_time,date,add_time';
        return $this->field($field)->where($where)->find();
    }

    //取出推荐商品
    public function getRecommend($where){
        //查询被推荐的商品
        $where['recommend'] = 'yes';
        $field = 'id,name,thumb';
        return $this->field($field)->where($where)->limit(6)->select();
    }
}