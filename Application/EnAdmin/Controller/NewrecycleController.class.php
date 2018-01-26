<?php
namespace EnAdmin\Controller;
//回收站控制器
class NewrecycleController extends CommonController{
	
	//显示回收站商品列表
	public function index(){
		//获取参数
		$p = I('get.p/d',0);  //当前页码
		//实例化模型
		$News = D('News');
		//查询商品列表
		$data['news'] = $News->getList('recycle',-1,$p);
		//防止查询到空页
		if(empty($data['news']['data']) && $p > 0){
			$this->redirect('Newrecycle/index');
		}
		$data['p'] = $p;
		$this->assign($data);
		$this->display();
	}

	//恢复商品
	public function rec(){
		//阻止直接访问
		if(!IS_POST) $this->error('恢复失败：未选择商品');
		//获取参数
		$p = I('get.p/d',0);   //当前页码
		$id = I('post.id/d',0); //商品ID
		//生成跳转地址
		$jump = U('Newrecycle/index',array('p'=>$p));
		//实例化模型
		$News = M('News');
		//检查表单令牌
		if(!$News->autoCheckToken($_POST)){
			$this->error('表单已过期，请重新提交',$jump);
		}
		//将商品取消删除
		if(false === $News->where(array('id'=>$id))->save(array('recycle'=>'no'))){
			$this->error('恢复新闻失败',$jump);
		}
		redirect($jump); //恢复成功，跳转
	}
	
	//彻底删除商品
	public function del(){
		//阻止直接访问
		if(!IS_POST) $this->error('删除失败：未选择新闻');
		//获取参数
		$p = I('get.p/d',0);     //当前页码
		$id = I('post.id/d',0);  //商品ID
		//生成跳转地址
		$jump = U('Newrecycle/index',array('p'=>$p));
		//实例化模型
		$News = D('News');
		//检查表单令牌
		if(!$News->autoCheckToken($_POST)){
			$this->error('表单已过期，请重新提交',$jump);
		}
		//准备where条件
		$where = array('id'=>$id,'recycle'=>'yes');
		//删除商品图片
		$News->delThumbFile($where);
		//删除商品数据
		$News->where($where)->delete();
		//删除成功，跳转
		redirect($jump);
	}
}