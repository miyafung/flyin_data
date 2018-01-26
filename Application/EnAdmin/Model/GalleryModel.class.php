<?php
namespace EnAdmin\Model;
use Think\Model;
class GalleryModel extends Model {

//根据$where条件删除商品图文件
    public function delThumbFile(){
        $goodsId = I( "get.goods_id" );
        $map["g.goods_id"] = $goodsId;

        //准备where条件
        $where = array('goods_id'=> $goodsId);
        $thumb = $this->where($where)->getField('img_small');


        if(!$thumb) return ;  //商品图片不存在时直接返回
        $path = "./Public/Uploads/products/center/$thumb";    //准备大图路径
        if(is_file($path)) unlink($path);           //删除大图文件
        $path2 = "./Public/Uploads/products/small/$thumb";  //准备小图路径
        if(is_file($path2)) unlink($path2);         //删除小图文件
        //会残留空目录，可以通过其它方式定期清理
        $path3 = "./Public/Uploads/products/water/$thumb";  //准备水印图路径
        if(is_file($path3)) unlink($path3);         //删除水印图文件
        //会残留空目录，可以通过其它方式定期清理
    }
}
