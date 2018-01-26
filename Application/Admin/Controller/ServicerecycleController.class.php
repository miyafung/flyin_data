<?php
namespace Admin\Controller;
//回收站控制器
class ServicerecycleController extends CommonController{

    //显示回收站banner列表
    public function index(){
        //获取参数
        $p = I('get.p/d',0);  //当前页码
        //实例化模型
        $News = D('Services');
        //查询banner列表
        $data['services'] = $News->getList('recycle',-1,$p);
        //防止查询到空页
        if(empty($data['services']['data']) && $p > 0){
            $this->redirect('Servicerecycle/index');
        }
        $data['p'] = $p;
        $this->assign($data);
        $this->display();
    }

    //恢复banner
    public function rec(){
        //阻止直接访问
        if(!IS_POST) $this->error('恢复失败：未选择banner');
        //获取参数
        $p = I('get.p/d',0);   //当前页码
        $id = I('post.id/d',0); //商品ID
        //生成跳转地址
        $jump = U('Servicerecycle/index',array('p'=>$p));
        //实例化模型
        $Services = M('Services');
        //检查表单令牌
        if(!$Services->autoCheckToken($_POST)){
            $this->error('表单已过期，请重新提交',$jump);
        }
        //将Banners取消删除
        if(false === $Services->where(array('id'=>$id))->save(array('recycle'=>'no'))){
            $this->error('恢复失败',$jump);
        }
        redirect($jump); //恢复成功，跳转
    }

    //彻底删除Banner
    public function del(){
        //阻止直接访问
        if(!IS_POST) $this->error('删除失败：未选择新闻');
        //获取参数
        $p = I('get.p/d',0);     //当前页码
        $id = I('post.id/d',0);  //商品ID
        //生成跳转地址
        $jump = U('Servicerecycle/index',array('p'=>$p));
        //实例化模型
        $Services = D('Services');
        //检查表单令牌
        if(!$Services->autoCheckToken($_POST)){
            $this->error('表单已过期，请重新提交',$jump);
        }
        //准备where条件
        $where = array('id'=>$id,'recycle'=>'yes');
        //删除banner图片
        $Services->delThumbFile($where);
        //删除banner数据
        $Services->where($where)->delete();
        //删除成功，跳转
        redirect($jump);
    }


    //清空回收站所有Banner
    public function delall(){
        //阻止直接访问
        if(!IS_POST) $this->error('删除失败：未选择新闻');
        //获取参数
        $p = I('get.p/d',0);     //当前页码
        //生成跳转地址
        $jump = U('Servicerecycle/index');
        //实例化模型
        $Services = D('Services');
        //检查表单令牌
        if(!$Services->autoCheckToken($_POST)){
            $this->error('表单已过期，请重新提交',$jump);
        }
        //准备where条件
        $where = array('recycle'=>'yes');
        //删除banner图片
        $Services->delThumbFile($where);
        //删除banner数据
        $Services->where($where)->delete();
        //删除成功，跳转
        redirect($jump);
    }
}