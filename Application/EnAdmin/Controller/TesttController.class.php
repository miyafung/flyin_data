<?php
namespace EnAdmin\Controller;
//前台会员控制器
class TesttController extends CommonController{

        public function upload(){
            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize   =     3145728 ;// 设置附件上传大小
            $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            $upload->rootPath  =     './Uploads/'; // 设置附件上传根目录
            $upload->savePath  =     ''; // 设置附件上传（子）目录

            //上传文件
            $info = $upload->upload();
            $galleryList = array();
            if(!empty($info)){
                $index=0;
                foreach ($info as $k =>$v){
                    //原图路径
                    $ori = $upload-rootPath . $v['savepath'].$v['savename'];
                    list($imgName,$imgType) = explode(".",$v[savename]);
                    //中图
                    $center = $upload->rootPath . $v['savepath'] . $v['savename'];
                    //小图
                    $small = $upload->rootPath . $v['savepath'] . $v['savename'];
                    $image = new\Think\Image();
                    $image->open($ori);
                    //按照原图的比例生成一个最大为600*600的所露天并保存为thumb.jpg
                    $image->thumb(350,350)->save($center);
                    $image->thumb(20,20)->save($small);

                    $galleryList[$index]['img_big']=$ori;
                    $galleryList[$index]['img_center']=$center;
                    $galleryList[$index]['img_small']=$small;
                }
            }


            // 上传文件
           // $info   =   $upload->upload();
          //  if(!$info) {// 上传错误提示错误信息
           //     $this->error($upload->getError());
          //  }else{// 上传成功
         //       $this->success('上传成功！');
          //  }

        $this->assign();
        $this->display();
    }
}