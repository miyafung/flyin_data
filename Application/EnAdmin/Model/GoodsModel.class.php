<?php
namespace EnAdmin\Model;
use Think\Model;

class GoodsModel extends Model {

    protected $_auto = array (
        array( 'list_time', 'date', 1, 'function', 'Y-m-d H:i:s' ),
        //  array( 'list_date', 'date', 1, 'function', 'Y-m-d' ),

    );

    public function addGoods () {
        $goodsInfo = $this->create();
        if ( !$this->hasGoods( $goodsInfo['goods_name'] ) ) {
            $parameterList = $goodsInfo['parameter_name'];
            $comma_separated = implode(",", $parameterList);
            $goodsInfo['parameter_name']=$comma_separated;  //$goodsInfo['parameter_name'] 直接连接存入数据库
            $goodsInfo['list_date']=strtotime(date("Y-m-d")); //将日期转时间戳
            $goodsInfo['goods_desc']= I('post.goods_desc','','htmlpurifier'); //goods描述（富文本过滤）
            $goodsInfo['goods_performance']= I('post.goods_performance','','htmlpurifier'); //goods描述（富文本过滤）
            if ( $insertId = $this->add( $goodsInfo ) ) {
                //********************  参数表 STRAR
                if ( !empty( $goodsInfo[parameter_value] ) ) {
                    if ( !empty( $goodsInfo[parameter_value][0]) ) {
                        $goodsP =   M('goods');
                        $data['parameter_value'] = $goodsInfo[parameter_value][0];
                        //  $this->where( "goods_id = " . $insertId )->save($goodsInfo[parameter_value][0] );
                        $goodsP->where( "goods_id = " . $insertId )->save($data);
                    }
                    foreach ( $goodsInfo[parameter_value] as $k => $v ) {   //循环取值
                        $goodsInfo_t[$k]['goods_id'] = $insertId;
                        $goodsInfo_t[$k]['parameter_name']=$goodsInfo[parameter_name];
                        $goodsInfo_t[$k]['parameter_value']=$goodsInfo[parameter_value][$k];
                    }
                    $parameterModel = M( "parameter" );
                    $parameterModel->addAll( $goodsInfo_t);
                }
                //*********************  参数表 STRAR

                //*********************  相册STRAR
                // $goodsC = new \Admin\Controller\GoodsController();
                $goodsC = A( "Goods" );
                $galleryList = $goodsC->upload();
                if ( !empty( $galleryList ) ) {
                    if ( !empty( $galleryList[0]['img_center'] ) ) {
                        $this->where( "goods_id = " . $insertId )->save( $galleryList[0] );
                    }
                    foreach ( $galleryList as $k => $v ) {
                        $galleryList[$k]['goods_id'] = $insertId;
                    }
                    $galleryModel = M( "gallery" );
                    $galleryModel->addAll( $galleryList );
                }
                //*********************  END 相册

                //*********************  Pdf STRAR
                // $goodsA = new \Admin\Controller\GoodsController();
                $goodsP = A( "Goods" );
                //  $pdfList = $goodsP->uploadpdf();
                $pdfList = $goodsP->uploadpdf();
                if ( !empty( $pdfList ) ) {
                    if ( !empty( $pdfList[0]['goods_pdf'] ) ) {
                        $this->where( "goods_id = " . $insertId )->save( $pdfList[0] );
                    }
                    foreach ( $pdfList as $k => $v ) {
                        $pdfList[$k]['goods_id'] = $insertId;
                    }
                    $pdfModel = M( "pdf" );
                    $pdfModel->addAll( $pdfList );
                }
                //*********************  END STRAR
                return true;
            }else {
                return false;
            }
        }else {
            return false;
        }

    }

    public function hasGoods ( $goodsName ) {
        $map['goods_name'] = $goodsName;
        return $this->where( $map )->select();
    }

    public function getGoodsInfo ()
    {
        $goodsId = I("get.goods_id");
        $map["g.goods_id"] = $goodsId;

        $goodsInfo = $this->field("g.*,gg.*")
            ->table("__GOODS__ as g")
            ->join("JOIN __GALLERY__ as gg ON g.goods_id = gg.goods_id")
            //  ->join( "JOIN __PARAMETER__ as ggg ON g.goods_id = ggg.goods_id" )
            ->where($map)
            ->select();

        $newGoodsInfo = array();

        if (!empty($goodsInfo)) {
            foreach ($goodsInfo as $k => $v) {
                $newGoodsInfo["goods_id"] = $v["goods_id"];
                $newGoodsInfo["goods_name"] = $v["goods_name"];
                $newGoodsInfo["goods_title"] = $v["goods_title"];
                $newGoodsInfo["goods_price"] = $v["goods_price"];
                $newGoodsInfo["goods_stock"] = $v["goods_stock"];
                $newGoodsInfo["cat_id"] = $v["cat_id"];
                $newGoodsInfo["goods_sku"] = $v["goods_sku"];
                $newGoodsInfo["goods_pdf"] = $v["goods_pdf"];
                $newGoodsInfo["is_show"] = $v["is_show"];
                $newGoodsInfo["hot"] = $v["hot"];
                $newGoodsInfo["hits"] = $v["hits"];
                $newGoodsInfo["goods_desc"] = $v["goods_desc"];
                $newGoodsInfo["goods_performance"] = $v["goods_performance"];
                $newGoodsInfo["gallery_id"] = $v["gallery_id"];
                // $newGoodsInfo["gallery"][$k]["img_big"] = $v["img_big"];
                $newGoodsInfo["gallery"][$k]["img_center"] = $v["img_center"];
                //  $newGoodsInfo["gallery"][$k]["img_small"] = $v["img_small"];
                $newGoodsInfo["pdf"][$k]["goods_pdf"] = $v["goods_pdf"];
            }
        }
        unset($goodsInfo2);
        //   return $newGoodsInfo2;

        unset($goodsInfo);
        return $newGoodsInfo;


    }

    //参数表
    public function getGoodsInfo2 () {
        $goodsId = I( "get.goods_id" );
        $map["g.goods_id"] = $goodsId;
        $goodsInfo2 = $this->field( "g.*,gg.*" )
            ->table( "__GOODS__ as g" )
            ->join( "JOIN __PARAMETER__ as gg ON g.goods_id = gg.goods_id" )
            ->where( $map )
            ->select();
        $newGoodsInfo2 = array();
        if ( !empty( $goodsInfo2 ) ) {
            foreach ( $goodsInfo2 as $k => $v ) {
                $newGoodsInfo2["parameter_id"] = $v["parameter_id"];
                $newGoodsInfo2["parameter_name"] = $v["parameter_name"];
                $newGoodsInfo2["parameter"][$k]["parameter_name"] = $v["parameter_name"];
                $newGoodsInfo2["parameter"][$k]["parameter_value"] = $v["parameter_value"];
                $newGoodsInfo2["parameter_name2"]=explode(",", $newGoodsInfo2["parameter_name"]);
                $newGoodsInfo2["parameter_value2"][$k] =$v["parameter_value"];
            }
        }
        unset( $goodsInfo2);
        return $newGoodsInfo2;
    }

    //删除商品
    public function deleteGoodsInfo () {
        $goodsId = I( "get.goods_id" );
        $map["g.goods_id"] = $goodsId;
        $db=M('goods');
        $db2=M('gallery');
        $db3=M('pdf');
        $db4=M('parameter');
        $db->where("goods_id=$goodsId")->delete();
        $db2->where("goods_id=$goodsId")->delete();
        $db3->where("goods_id=$goodsId")->delete();
        $db4->where("goods_id=$goodsId")->delete();
    }



//根据$where条件删除商品图文件
    public function delThumbFile()
    {
        $goodsId = I("get.goods_id");
        $map["g.goods_id"] = $goodsId;

        //*******  删除多图片 start****
        $User = M("Gallery"); // 实例化User对象
        $condition['goods_id'] = $goodsId;
        // 把查询条件传入查询方法
        $thumb = $User->where($condition)->field('img_center')->select();
        //    foreach ($thumb as $k => $v) {
        //       print_r($v["img_small"]);
        //    }
        //    die();
        //将数组循环出来，删掉
        foreach ($thumb as $k => $v) {
            //   print_r($v["img_small"]);

            if (!$v["img_center"]) return;  //商品图片不存在时直接返回
            $path = "./Public/Uploads/products/center/{$v["img_center"]}";    //准备大图路径
            if (is_file($path)) unlink($path);           //删除大图文件
            $path2 = "./Public/Uploads/products/small/{$v["img_center"]}";  //准备小图路径
            if (is_file($path2)) unlink($path2);         //删除小图文件
            $path3 = "./Public/Uploads/products/water/{$v["img_center"]}";  //准备水印图路径
            if (is_file($path3)) unlink($path3);         //删除水印图文件
            $path4 = "./Public/Uploads/products/{$v["img_center"]}";
            if (is_file($path4)) unlink($path4);
            //会残留空目录，可以通过其它方式定期清理
        }
        //*******  删除多图片 end****


        //*******  删除PDF start****
        $pdf= $this->where("goods_id=$goodsId")->getField('goods_pdf');
        if (!$pdf) return;  //PDF不存在时直接返回
        $path = "./Public/Uploads/pdf/$pdf";    //准备pdf路径
        if (is_file($path)) unlink($path);           //删除pdf文件
        //会残留空目录，可以通过其它方式定期清理
        //***  删除PDF  end****
    }


    public function updateGoodsInfo () {
        $goodsInfo = $this->create();
        $goodsInfo['goods_desc']= I('post.goods_desc','','htmlpurifier'); //goods描述（富文本过滤）
        $goodsInfo['goods_performance']= I('post.goods_performance','','htmlpurifier'); //goods描述（富文本过滤）
        $res = $this->save( $goodsInfo );
        if ( $res !== false ) {
            $goodsC = A( "Goods" );
            $galleryList = $goodsC->upload();
            //********************  参数表 STRAR
            $parameterList = $goodsInfo['parameter_name'];
            $comma_separated = implode(",", $parameterList);
            $goodsInfo['parameter_name']=$comma_separated;  //$goodsInfo['parameter_name'] 直接连接存入数据库


            if ( !empty( $goodsInfo[parameter_value] ) ) {
                if ( !empty( $goodsInfo[parameter_value][0]) ) {
                    $goodsP =   M('goods');
                    $data['parameter_value'] = $goodsInfo[parameter_value][0];
                    $goodsP->where( "goods_id = " . $goodsInfo['goods_id'] )->save($data);
                }

                foreach ( $goodsInfo[parameter_value] as $k => $v ) {   //循环取值
                    $goodsInfo_t[$k]['goods_id'] = $goodsInfo['goods_id'];
                    $goodsInfo_t[$k]['parameter_name']=$goodsInfo[parameter_name];
                    $goodsInfo_t[$k]['parameter_value']=$goodsInfo[parameter_value][$k];
                }
                $parameterModel = M( "parameter" );
                $parameterModel->where( "goods_id = " . $goodsInfo['goods_id'] )->delete();
                $parameterModel->addAll( $goodsInfo_t);
            }
            //*********************  参数表 STRAR


            //********************* pdf 更新****
            $goodsP = A( "Goods" );
            $pdfList = $goodsP->uploadpdf();
            if ( !empty( $pdfList) ) {
                if ( !empty( $pdfList[0]['goods_pdf'] ) ) {
                    $this->where( "goods_id = " . $goodsInfo['goods_id'] )->save( $pdfList[0] );
                }
                foreach ( $pdfList as $k => $v ) {
                    $pdfList[$k]['goods_id'] = $goodsInfo['goods_id'];
                }
                $pdfModel = M( "pdf" );
                $oldPdfList = $pdfModel->where( "goods_id = " . $goodsInfo['goods_id'] )->select();
                if ( !empty( $oldPdfList ) ) {
                    foreach ( $oldPdfList as $k => $v ){
                        $realAppPath= "./Public/Uploads/pdf/";    //准备pdf路径
                        unlink( $realAppPath . $v['goods_pdf'] );

                    }
                }
                $pdfModel->where( "goods_id = " . $goodsInfo['goods_id'] )->delete();
                $pdfModel->addAll( $pdfList );
            }
            //*********** pdf end  ************

            //*********** 图片更新  ************
            if ( !empty( $galleryList ) ) {
                if ( !empty( $galleryList[0]['img_center'] ) ) {
                    $this->where( "goods_id = " . $goodsInfo['goods_id'] )->save( $galleryList[0] );
                }
                foreach ( $galleryList as $k => $v ) {
                    $galleryList[$k]['goods_id'] = $goodsInfo['goods_id'];
                }
                $galleryModel = M( "gallery" );
                $oldGalleryList = $galleryModel->where( "goods_id = " . $goodsInfo['goods_id'] )->select();
                if ( !empty( $oldGalleryList ) ) {
                    foreach ( $oldGalleryList as $k => $v ) {
                        $realAppPath= "./Public/Uploads/products/water/";    //准备pdf路径
                        $realAppPath1= "./Public/Uploads/products/center/";    //准备pdf路径
                        $realAppPath2= "./Public/Uploads/products/small/";    //准备pdf路径
                        $realAppPath3= "./Public/Uploads/products/";    //准备pdf路径
                        unlink( $realAppPath . $v['img_center'] );
                        unlink( $realAppPath1 . $v['img_center'] );
                        unlink( $realAppPath2 . $v['img_center'] );
                        unlink( $realAppPath3 . $v['img_center'] );

                        //$curPath = dirname( __FILE__ );
                        //$realAppPath = strstr( $curPath, "Application", true );
                        //unlink( $realAppPath . $v['img_big'] );
                        //unlink( $realAppPath . $v['img_center'] );
                        //unlink( $realAppPath . $v['img_small'] );
                    }
                }
                $galleryModel->where( "goods_id = " . $goodsInfo['goods_id'] )->delete();
                $galleryModel->addAll( $galleryList );
            }
            //*********** 图片 end  ************
            return true;
        }else {
            return false;
        }
    }

    public function getGoodsList ($type = 'goods', $p = 0) {
        //准备查询条件
        $order = 'g.hot asc';        //排序条件
        $field = 'g.*, c.cat_name';
        //准备分页查询
        $count = $count = $this->table("__GOODS__ as g")->count();
        $Page  = new \Think\Page($count,10);
        //查询数据
        $data = $this->table("__GOODS__ as g")->join("LEFT JOIN __CATEGORY__ as c ON g.cat_id = c.cat_id")->field($field)
            ->order($order)->limit($Page->firstRow . ',' . $Page->listRows)->select();
        //返回结果
        return array(
            'data' => $data,              //商品列表数组
            'pagelist' => $Page->show(),  //分页链接HTML
        );
    }
}


?>