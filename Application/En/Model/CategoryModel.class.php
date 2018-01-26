<?php
namespace En\Model;
use Think\Model;
class CategoryModel extends Model {
	
	//查询分类数据
	private function getData(){
		static $data = null;  //缓存查询结果
		if(!$data) $data = M('Category')->field('cat_id,cat_name,pid')->select();
		return $data;
	}

	//获得分类列表
	public function getTree($level=3){
		return category_tree($this->getData(),0,$level);
	}
	
	//查找所有子孙分类ID
	public function getSubIds($cat_id){
		$data = array($cat_id); //将ID自身放入数组头部
		category_child($this->getData(),$data,$cat_id);
		return $data;
	}
	
	//查找分类家谱
	public function getFamily($cat_id){
		$id = max($cat_id,0);
		return category_family($this->getData(),$cat_id);
	}

	//查找分类面包屑导航
	public function getPath($cat_id){
		$rst = category_parent($this->getData(),$cat_id);
		return array_reverse($rst['pcat']);
	}


/** 20170612 目录测试**/
    public function getCatGoodsList () {
        $catId = I( "get.cat_id" );
        $map['cat_id'] = $catId;
       // return D("goods")->where( $map )->select();
        $count = D("goods")->where( $map )->count();// 查询满足要求的总记录数
        $Page  = new \Think\Page($count,6);
        $data = D("goods")->where( $map )->limit($Page->firstRow . ',' . $Page->listRows)
            ->select();
        return array(
            'data' => $data,              //商品列表数组
            'pagelist' => $Page->show(),  //分页链接HTML
        );
    }
    public function getCatList () {
        return $this->select();
    }

	
}