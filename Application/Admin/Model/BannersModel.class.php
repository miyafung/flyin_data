<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 2017/4/11/0011
 * Time: 13:47
 */
namespace Admin\Model;
use Think\Model;
class BannersModel extends Model {
    /**
    //表单字段过滤
    protected $insertFields = 'sn,name,price,stock,on_sale,recommend';
    protected $updateFields = 'sn,name,price,stock,on_sale,recommend';
    //自动验证
    protected $_validate = array(
    array('name','1,40','商品名称不合法（1-40个字符）',self::MUST_VALIDATE,'length'),
    array('sn','/^[0-9A-Za-z]{1,10}$/','商品编号不合法（1-10个字符）',self::MUST_VALIDATE),
    array('on_sale',array('yes','no'),'on_sale字段填写错误',self::MUST_VALIDATE,'in'),
    array('recommend',array('yes','no'),'recommend字段填写错误',self::MUST_VALIDATE,'in'),
    array('price','0.01,100000','商品价格输入不合法（0.01~100000）',self::MUST_VALIDATE,'between'),
    array('stock','0,900000','商品库存输入不合法',self::MUST_VALIDATE,'between'),
    );

    /**
     * 商品列表
     * @param string $type 数据用途（商品列表或回收站列表）
     * @param array|int $cids 分类ID数组
     * @param int $p 当前页码
     * @return array 查询结果
     */
    public function getList($type='banners',$cids=0,$p=0){
        //准备查询条件
        $order = 'n.id desc';        //排序条件
        $field = 'c.name as bannercategory_name,n.bannercategory_id,n.id,n.rank,n.thumb,n.banner_name,n.on_sale,n.recommend';
        if($type=='banners'){          //新闻列表页取数据时
            $where = array('n.recycle' => 'no');
        }elseif($type=='recycle'){   //商品回收站取数据时
            $where = array('n.recycle' => 'yes');
        }
        //cids=0查找未分类商品，cid>0查找分类ID数组商品，cid<0查找全部商品
        if($cids == 0){      //查找未分类的商品
            $where['n.bannercategory_id'] = 0;
        }elseif($cids > 0){  //查找分类ID数组
            $where['n.bannercategory_id'] = array('in',$cids);
        }
        //准备分页查询

        //查询数据
        $count = $this->alias('n')->where($where)->count();
        $Page  = new \Think\Page($count,10);
        $Page->setConfig('prev', '上一页');
        $Page->setConfig('next', '下一页');
        $Page->setConfig('first', '首页');
        $Page->setConfig('last', '共%TOTAL_PAGE%页');
        $data = $this->alias('n')->join('flyin_bannercategory AS c ON c.id=n.bannercategory_id','LEFT')->field($field)
            ->where($where)->order($order)->limit($Page->firstRow . ',' . $Page->listRows)->select();
        //返回结果
        return array(
            'data' => $data,              //banner列表数组
            'pagelist' => $Page->show(),  //分页链接HTML
        );
    }

    //根据$where条件查询商品数据
    public function getBanners($where){
        //定义需要的字段
        $field = 'id,bannercategory_id,sn,banner_name,thumb,on_sale,rank,recommend,desc';
        return $this->field($field)->where($where)->find();
    }

    //根据$where条件删除商品预览图文件
    public function delThumbFile($where){
        //取出原图文件名
        $thumb = $this->where($where)->getField('thumb');
        if(!$thumb) return ;  //商品图片不存在时直接返回
        $path = "./Public/Uploads/banner/big/$thumb";    //准备大图路径
        if(is_file($path)) unlink($path);         //删除大图文件
        $path = "./Public/Uploads/banner/small/$thumb";  //准备小图路径
        if(is_file($path)) unlink($path);         //删除小图文件
        $path = "./Public/Uploads/banner/yuan/$thumb";  //准备原图路径
        if(is_file($path)) unlink($path);         //删除原图文件
        //会残留空目录，可以通过其它方式定期清理
    }

    //上传预览图文件并生成缩略图
    //返回数组（flag=是否执行成功，error=失败时的错误信息，path=成功时的保存路径）
    public function uploadThumb($upfile){
        //准备上传目录
        $file['temp'] = './Public/Uploads/banner/temp/';                       //准备临时目录
        file_exists($file['temp']) or mkdir($file['temp'],0777,true);   //自动创建临时目录
        //上传文件
        $Upload = new \Think\Upload(array(
            'exts' => array('jpg','jpeg','png','gif'), //允许的文件后缀
            'rootPath' => $file['temp'],               //文件保存路径
            'autoSub' => false,                        //不生成子目录
        ));
        if(false===($rst = $Upload->uploadOne($_FILES[$upfile]))){
            //上传失败时，返回错误信息
            return array('flag'=>false,'error'=>$Upload->getError());
        }
        //准备生成缩略图
        $file['name'] = $rst['savename'];						  //文件名
        $file['save'] = date('Y-m/d/');                           //子目录
        $file['path1'] = './Public/Uploads/banner/big/'.$file['save'];   //大图路径
        $file['path2'] = './Public/Uploads/banner/small/'.$file['save']; //小图路径
        $file['path3'] = './Public/Uploads/banner/yuan/'.$file['save'];   //大图路径
        //创建保存目录
        file_exists($file['path1']) or mkdir($file['path1'],0777,true);
        file_exists($file['path2']) or mkdir($file['path2'],0777,true);
        file_exists($file['path3']) or mkdir($file['path3'],0777,true);
        //生成缩略图
        $Image = new \Think\Image();                //实例化图像处理类
        $Image->open($file['temp'].$file['name']);  //打开文件
        $Image->thumb(350,300,2)->save($file['path1'].$file['name']);//保存大图
        $Image->open($file['temp'].$file['name']);  //再次打开文件
        $Image->thumb(220,220,2)->save($file['path2'].$file['name']);//保存小图
        $Image->open($file['temp'].$file['name']);  //打开文件

        $Image->save($file['path3'].$file['name']);//保存原图
        $Image->open($file['temp'].$file['name']);  //打开文件

        unlink($file['temp'].$file['name']);        //删除临时文件
        //返回文件路径
        return array('flag'=>true,'path'=>$file['save'].$file['name']);
    }
    //插入数据前置操作
    protected function _before_insert(&$data, $option){
        $data['recycle'] = 'no';                 //新商品是未删除的
        $data['add_time'] = date('Y-m-d H:i:s'); //新商品的添加时间
        //     $data['price'] = (float)$data['price'];  //商品价格为浮点型
    }
    //更新数据前置操作
    protected function _before_update(&$data, $option){
        //     $data['price'] = (float)$data['price'];  //商品价格为浮点型
    }
}