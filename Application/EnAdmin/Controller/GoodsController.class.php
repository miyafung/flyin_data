<?php
namespace EnAdmin\Controller;
use Think\Controller;

class GoodsController extends CommonController
{

    // public function _initialize() {
    // }
    //产品查询
    public function index()
    {
        // 搜索关键字
        $keywords = trim($_POST['keywords']);
        // 实例化friendlink
        $fdpdf = M('goods');
        $goods = $fdpdf->order('goods_id')->where("goods_name like '%{$keywords}%'")->select();
        $this->assign('goodssearch', $goods);
        $this->display("goods_search");
    }

    public function add()
    {
        $this->assign("catList", D("category")->getCatList());
        $this->assign("act", U("Goods/insert"));
        $this->assign("actInfo", "添加商品");
        $this->display("goods_info");
    }

    public function insert()
    {
        $goodsModel = D("goods");
        if ($goodsModel->addGoods()) {
            $this->success("商品添加成功");
        } else {
            $this->error("商品添加失败");
        }
    }

    public function edit()
    {
        $this->assign("catList", D("category")->getCatList());
        $this->assign("goodsInfo2", D("goods")->getGoodsInfo2());
        $this->assign("goodsInfo", D("goods")->getGoodsInfo());
        $this->assign("act", U("Goods/update"));
        $this->assign("actInfo", "更新商品");
        $this->display("goods_info");
    }


    public function update()
    {
        $goodsModel = D("goods");
        if ($goodsModel->updateGoodsInfo()) {
            $this->success("商品更新成功");
        } else {
            $this->error("商品更新失败");
        }
    }

    //删除商品
    public function delete()
    {
        $this->assign("catList", D("category")->getCatList());//获取
        $this->assign("goodsInfo", D("goods")->delThumbFile());//删除对应的商品文件
        $this->assign("goodsInfo", D("goods")->deleteGoodsInfo());//删除对应的商品的图片文件和数据库中的字段
        $goodsModel = D("goods");
        $goodsList = $goodsModel->getGoodsList();

        $this->assign("goodsList", $goodsList);
        $this->display("goods_list");
    }


    public function goodstime()
    {
        $t1 = $_POST['datestart'];
        $t2 = $_POST['dateend'];

        $timestart = strtotime($t1); //转为时间戳
        $timeend = strtotime($t2);

        $model = M("goods");
        $goodsList = $model->order('goods_id')->where("list_date >= $timestart  and list_date <= $timeend ")->select();
        $this->assign('goodssearch', $goodsList);
        $this->assign("goodsList", $goodsList);
        $this->display("goods_list");
    }


    public function view()
    {
        //获取参数
        $p = I('get.p/d', 0);       //当前页码
        //实例化模型
        $Goods = D('Goods');
        //获取商品列表
        $data['goods'] = $Goods->getGoodsList('goods', $p);
        // 防止空页被访问
        if (empty($data['goods']['data']) && $p > 0) {
            $this->redirect('Goods/view');
        }
        //查询分类列表
        $data['p'] = $p;
        $this->assign($data);
        // $this->assign('goodsLi',$data['goods']);
        $this->assign('goodsLi', $data['goods'] ['data']);
        $this->display("goods_list");
    }


    //Goods列表快捷修改 热销产品品
    public function change()
    {
        //阻止直接访问
        if (!IS_POST) $this->error('操作失败：未选择商品');
        //获取参数
        $goods_id = I('post.goods_id/d', 0);     //待处理商品ID
        $field = I('post.field');   //待处理字段
        $status = I('post.status');    //待处理字段值
        //生成跳转地址
        $jump = U('Goods/view');
        //实例化模型
        $Goods = M('Goods');
        //检测输入变量
        if ($field != 'hot') {
            $this->error('操作失败：非法字段');
        }
        if ($status != 'yes' && $status != 'no') {
            $this->error('操作失败：非法状态值');
        }
        //检查表单令牌
        if (!$Goods->autoCheckToken($_POST)) {
            $this->error('表单已过期，请重新提交', $jump);
        }
        //执行操作
        if (false === $Goods->where(array('goods_id' => $goods_id))->save(array($field => $status))) {
            $this->error('操作失败：数据库保存失败', $jump);
        }
        redirect($jump); //操作成功，跳转
    }


    //多图上传
    public function upload()
    {
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize = 10485760;// 设置附件上传大小
        $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath = './Public/Uploads/products/'; // 设置附件上传根目录
        $upload->savePath = ''; // 设置附件上传（子）目录

        // 上传文件
        $info = $upload->upload();
        $galleryList = array();
        if (!empty($info)) {
            $index = 0;
            foreach ($info as $k => $v) {
                //原图带路径
                $ori = $upload->rootPath . $v['savepath'] . $v['savename'];

                //中图路径创建
                $file['path1'] = './Public/Uploads/products/center/';   //中图路径
                file_exists($file['path1']) or mkdir($file['path1'], 0777, true);

                //小图路径创建
                $file['path2'] = './Public/Uploads/products/small/';   //中图路径
                file_exists($file['path2']) or mkdir($file['path2'], 0777, true);

                //水印图径创建
                $file['path3'] = './Public/Uploads/products/water/';   //中图路径
                file_exists($file['path3']) or mkdir($file['path3'], 0777, true);

                $image = new \Think\Image();
                $image->open($ori);
                // 按照原图的比例生成一个最大为150*150的缩略图并保存为thumb.jpg
                $image->thumb(700, 700)->save($file['path3'] . $v['savename']);
                $image->thumb(350, 350)->save($file['path1'] . $v['savename']);
                $image->thumb(54, 54)->save($file['path2'] . $v['savename']);
                //$galleryList[$index]['img_big'] = $ori;
                $galleryList[$index]['img_center'] = $v['savename'];
                //  $galleryList[$index]['img_small'] = $v['savename'];
                // $galleryList[$index]['img_small'] = $v['savename'];
                $index++;
            }
        }
        return $galleryList;

    }


    //PDF上传
    public function uploadpdf()
    {
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize = 6291456;// 设置附件上传大小  6291456=6M  3145728=3M   10485760=10   calc.itzmx.com
        $upload->exts = array('pdf', 'txt', 'doc');// 设置附件上传类型
        $upload->rootPath = './Public/Uploads/pdf/'; // 设置附件上传根目录
        //   $upload->rootPath = './Pdf/'; // 设置附件上传根目录
        // ./Public/Uploads/goods/temp/
        $upload->savePath = ''; // 设置附件上传（子）目录
        $upload->saveName = ''; // 设置附件上传（子）目录

        // 上传文件
        $info = $upload->upload();
        $pdfList = array();
        if (!empty($info)) {
            $index = 0;
            foreach ($info as $k => $v) {
                //原图路径
                //!!!!!!!!注意路径问题
                //  $ori = $upload->rootPath . $v['savepath'] . $v['savename'];
                // list( $imgName, $imgType ) = explode( ".", $v['savename'] );
                //中图
                // $center = $upload->rootPath . $v['savepath'] . $imgName . '_c.' . $imgType;
                //  $pdfList[$index]['goods_pdf'] = $ori;
                $pdfList[$index]['goods_pdf'] = $v['savename'];
                $index++;
            }
        }
        return $pdfList;

        //   if(!$info) {// 上传错误提示错误信息
        //      $this->error($upload->getError());
        //   }else{// 上传成功
        //       $this->success('上传成功！');
        //  }
    }


    //*********** 生成二维码
    /**
     * 调用phpqrcode生成二维码
     * @param string $url 二维码解析的地址
     * @param int $level 二维码容错级别
     * @param int $size 需要生成的图片大小
     */

    // function qrcode($url = "http://miya.date/test", $level = 3, $size = 4)
    //function qrcode($url='',$level = 3, $size = 4)
    function qrcode($level = 3, $size = 4)
    {
        $goodsId = I("get.goods_id");
        $url = 'http://localhost/zh/Goods/view/goods_id/' . $goodsId;
        // var_dump($url);die;
        //  print_r($url);
        //   die();

        Vendor('phpqrcode.phpqrcode');
        //容错级别
        $errorCorrectionLevel = intval($level);
        //生成图片大小
        $matrixPointSize = intval($size);
        //生成二维码图片
        $object = new \QRcode();
        //第二个参数false的意思是不生成图片文件，如果你写上‘picture.png’则会在根目录下生成一个png格式的图片文件
        $object->png($url, false, $errorCorrectionLevel, $matrixPointSize, 2);
    }

    //*********** 生成二维码
    function qrcode2($level = 3, $size = 4)
    {
        $goodsId = I("get.goods_id");
        $url = 'http://flyindata.com.cn/Goods/view/goods_id/' . $goodsId . '.html';
        // var_dump($url);die;
        //  print_r($url);
        //   die();

        Vendor('phpqrcode.phpqrcode');
        //容错级别
        $errorCorrectionLevel = intval($level);
        //生成图片大小
        $matrixPointSize = intval($size);
        //生成二维码图片
        $object = new \QRcode();
        //第二个参数false的意思是不生成图片文件，如果你写上‘picture.png’则会在根目录下生成一个png格式的图片文件
        $object->png($url, false, $errorCorrectionLevel, $matrixPointSize, 2);
    }

    //删除全站搜索关键词
    public function delkeyword()
    {
        $admin = D('searchkeyword');
        if ( $admin->delete(I('keyword_id'))) {
            $this->redirect('Searchkeyword/index');
        } else {
            $this->error('删除失败！');
        }
    }
}
