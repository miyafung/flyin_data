<?php
namespace Admin\Controller;
//回收站控制器
class BannerrecycleController extends CommonController{

    //显示回收站banner列表
    public function index(){
        //获取参数
        $p = I('get.p/d',0);  //当前页码
        //实例化模型
        $News = D('Banners');
        //查询banner列表
        $data['banners'] = $News->getList('recycle',-1,$p);
        //防止查询到空页
        if(empty($data['banners']['data']) && $p > 0){
            $this->redirect('Bannerrecycle/index');
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
        $jump = U('Bannerrecycle/index',array('p'=>$p));
        //实例化模型
        $Banners = M('Banners');
        //检查表单令牌
        if(!$Banners->autoCheckToken($_POST)){
            $this->error('表单已过期，请重新提交',$jump);
        }
        //将Banners取消删除
        if(false === $Banners->where(array('id'=>$id))->save(array('recycle'=>'no'))){
            $this->error('恢复Banner失败',$jump);
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
        $jump = U('Bannerrecycle/index',array('p'=>$p));
        //实例化模型
        $Banners = D('Banners');
        //检查表单令牌
        if(!$Banners->autoCheckToken($_POST)){
            $this->error('表单已过期，请重新提交',$jump);
        }
        //准备where条件
        $where = array('id'=>$id,'recycle'=>'yes');
        //删除banner图片
        $Banners->delThumbFile($where);
        //删除banner数据
        $Banners->where($where)->delete();
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
        $jump = U('Bannerrecycle/index');
        //实例化模型
        $Banners = D('Banners');
        //检查表单令牌
        if(!$Banners->autoCheckToken($_POST)){
            $this->error('表单已过期，请重新提交',$jump);
        }
        //准备where条件
        $where = array('recycle'=>'yes');
        //删除banner图片
        $Banners->delThumbFile($where);
        //删除banner数据
        $Banners->where($where)->delete();
        //删除成功，跳转
        redirect($jump);
    }
}