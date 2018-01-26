<?php
namespace EnAdmin\Controller;
//Banner控制器
class BannersController extends CommonController {
    //Banner列表
    public function index() {
        //获取参数
        $p = I('get.p/d',0);       //当前页码
        $cid = I('get.cid/d',-1);  //分类ID（0表示未分类，-1表示全部分类）
        //实例化模型
        $Banners = D('Banners');
        $Bannercategory = D('Bannercategory');
        //如果分类ID大于0，则取出所有子分类ID
        $cids = ($cid>0) ? $Bannercategory->getSubIds($cid) : $cid;

        //获取商品列表
        $data['banners'] = $Banners->getList('banners',$cids,$p);

        //防止空页被访问
        if(empty($data['banners']['data']) && $p > 0){
            $this->redirect('Banners/index',array('cid'=>$cid));
        }
        //查询分类列表
        $data['bannercategory'] = $Bannercategory->getList();
        $data['cid'] = $cid;
        $data['p'] = $p;
        $this->assign($data);
        $this->display();

    }

    //商品添加
    public function add(){
        //获取参数
        $cid = I('get.cid/d',0);  //分类ID
        if($cid < 0) $cid = 0;    //防止分类ID为负数
        //实例化模型
        $Banners = D('Banners');
        $Bannercategory = D('Bannercategory');
        if(IS_POST){
            //创建数据对象
            if(!$Banners->create(null,1)){
                $this->error('添加Banner失败：'.$Banners->getError());
            }

            //处理特殊字段
            $Banners->bannercategory_id = $cid; //banner分类
            $Banners->thumb = '';         //banner预览图
            $Banners->desc = I('post.desc','','htmlpurifier'); //banner描述（富文本过滤）
            //如果有图片上传，则上传并生成预览图
            if(isset($_FILES['thumb']) && $_FILES['thumb']['error']===0) {
                $rst = $Banners->uploadThumb('thumb');  //上传并生成预览图
                if(!$rst['flag']){					  //判断是否上传成功
                    $this->error('上传图片失败：'.$rst['error']);
                }
                $Banners->thumb = $rst['path'];  //上传成功，保存文件路径
            }
            //添加到数据库
            if(!$Banners->add()){
                $this->error('添加Banner失败！');
            }
            //添加图片成功
            if(isset($_POST['return'])) $this->redirect('Banners/index');
            $this->assign('success',true);
        }
        //查询分类列表
        $data['bannercategory'] = $Bannercategory->getList();
        $data['cid'] = $cid;
        $this->assign($data);
        $this->display();
    }

    //商品修改
    public function edit(){
        //获取参数
        $id = I('get.id/d',0);         //待修改商品ID
        $p = I('get.p/d',0);           //当前页码
        $cid = I('get.cid/d',0,'abs'); //待修改商品的分类ID
        //实例化模型
        $Bannercategory = D('Bannercategory');
        $Banners = D('Banners');



        //准备where条件
        $where = array('id'=>$id,'recycle'=>'no');
        if(IS_POST){
            //创建数据对象
            if(!$Banners->create(null,2)){
                $this->error('修改banner失败：'.$Banners->getError());
            }
            //处理特殊字段
            $Banners->bannercategory_id = $cid;    //保存商品分类

            $Banners->desc = I('post.desc','','htmlpurifier'); //商品描述（富文本过滤）
            //如果有预览图文件上传，则更新预览图
            if(isset($_FILES['thumb']) && $_FILES['thumb']['error']===0) {
                $rst = $Banners->uploadThumb('thumb');  //上传并生成预览图
                if(!$rst['flag']){					  //判断是否上传成功
                    $this->error('上传图片失败：'.$rst['error']);
                }
                $Banners->thumb = $rst['path'];  //上传成功，保存文件路径
                $Banners->delThumbFile($where);  //删除商品图片
            }
            //保存到数据库
            if(false === $Banners->where($where)->save()){
                $this->error('修改商品失败！');
            }
            //修改商品成功
            if(isset($_POST['return'])) $this->redirect('Banners/index',array('cid'=>$cid,'p'=>$p));
            $this->assign('success',true);
        }
        //查询商品数据
        $data['banners'] = $Banners->getBanners($where);
        if(!$data['banners']){
            $this->error('修改失败：banner不存在。');
        }

        //测试edit页面能否取得值
        //trace($data['banners']);

        //查询分类列表
        $data['bannercategory'] = $Bannercategory->getList();
        $data['cid'] = $cid;
        $data['id'] = $id;
        $data['p'] = $p;
        $this->assign($data);
        $this->display();
    }


    //删除banner（放入回收站）
    public function del() {
        //阻止直接访问
        if(!IS_POST) $this->error('删除失败：未选择商品');
        //获取参数
        $cid = I('get.cid/d',0); //分类ID
        $p = I('get.p/d',0);     //当前页码
        $id = I('post.id/d',0);  //待处理的商品ID
        //生成跳转地址
        $jump = U('Banners/index',array('cid'=>$cid,'p'=>$p));
        //实例化模型
        $Banners = M('Banners');
        //检查表单令牌
        if(!$Banners->autoCheckToken($_POST)){
            $this->error('表单已过期，请重新提交',$jump);
        }
        //将商品放入回收站
        if(false === $Banners->where(array('id'=>$id))->save(array('recycle'=>'yes'))){
            $this->error('删除商品失败',$jump);
        }
        redirect($jump); //删除成功，跳转
    }

    //banner列表快捷修改
    public function change(){
        //阻止直接访问
        if(!IS_POST) $this->error('操作失败：未选择商品');
        //获取参数
        $cid = I('get.cid/d',0);    //分类ID
        $p = I('get.p/d',0);        //当前页码
        $id = I('post.id/d',0);     //待处理商品ID
        $field = I('post.field');   //待处理字段
        $status = I('post.status');	//待处理字段值
        //生成跳转地址
        $jump = U('Banners/index',array('cid'=>$cid,'p'=>$p));
        //实例化模型
        $Banners = M('Banners');
        //检测输入变量
        if($field!='on_sale' && $field!='recommend'){
            $this->error('操作失败：非法字段');
        }
        if($status!='yes' && $status!='no'){
            $this->error('操作失败：非法状态值');
        }
        //检查表单令牌
        if(!$Banners->autoCheckToken($_POST)){
            $this->error('表单已过期，请重新提交',$jump);
        }
        //执行操作
        if(false === $Banners->where(array('id'=>$id,'recycle'=>'no'))->save(array($field=>$status))){
            $this->error('操作失败：数据库保存失败',$jump);
        }
        redirect($jump); //操作成功，跳转
    }

    //banner详情 在线编辑器 图片上传
    public function uploadImage(){
        //上传目录
        $savePath = './Public/Uploads/banner/desc';
        //上传配置
        $config = array(
            'savePath' => $savePath,     //存储文件夹
            'subPath' => date('Y-m/d'),  //子目录
            'allowFiles' => array('.gif','.png','.jpg','.jpeg','.bmp')  //允许的文件格式
        );
        //实例化UMEditor配套的文件上传类
        $Upload = new \Components\Uploader('upfile',$config);
        //返回JSON数据给UMEditor
        $type = $_REQUEST['type'];
        $callback=$_GET['callback'];
        $info = $Upload->getFileInfo();
        $info = $callback ? "<script>$callback(".json_encode($info).')</script>' : json_encode($info);
        $this->ajaxReturn($info,'EVAL');

    }
}