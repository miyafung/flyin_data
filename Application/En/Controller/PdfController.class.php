<?php
namespace En\Controller;
//商品主页控制器
class PdfController extends CommonController {
    public function index(){
        // 搜索关键字
        $keywords = trim($_POST['keywords']);
        // 实例化friendlink
        $fdpdf = M('goods');
        //搜索内容为链接名称与链接介绍
      //  $pdf = $fdpdf ->order('goods_id') ->where("goods_pdf like '%{$keywords}%' &&  goods_pdf!= '' && recycle = 'no'  ") -> limit($page -> firstRow.','.$page -> listRows) -> select();
        $pdf = $fdpdf ->order('goods_id') ->where("goods_pdf like '%{$keywords}%' &&  goods_pdf!= ''  ")  -> select();
        $this -> assign('pdfsearch',$pdf);
        $this -> display();
    }

    //文件下载
    public function downloadFile(){
       $goods_id = I('goods_id');         //待修改商品ID
       $obj = M('goods');
       $where = array('goods_id'=>$goods_id);
       $list = $obj->where($where)->find();

        if(empty($list)){
            $this->success('文件不存在或者已经被删除',U('Pdf/index'));
        }else{

            M('goods')->where("goods_id = $goods_id")->setInc('pdfhits',1);//文件存在并下载PDF次数+1

            $file['path1'] = './Public/Uploads/pdf/';   //中图路径
            $path = $file['path1'].$list['goods_pdf'];//找到文件路径
            $file_name = $list['goods_pdf'];
            $path=iconv("utf-8","gb2312",$path);//将文件路径由utf8转gb2312

            if(!file_exists($path)){
                $this->error("文件不存在！",U('Pdf/index'));
            }

            $fp = fopen($path,'r');

        //    $path = urlencode( $path); //URL转16进码

        //    print_r($path);
         //   print_r($path2);
          //  die();
            $file_size=filesize($path);
            //下载文件需要用到的头
           Header("Content-type: application/octet-stream");
            Header("Accept-Ranges: bytes");
           Header("Accept-Length:".$file_size);
      //     $file_name = urldecode($file_name); //url解码
          Header("Content-Disposition: attachment; filename=".$file_name);
            $buffer=1024;
            $file_count=0;
            //向浏览器返回数据
            while(!feof($fp) && $file_count<$file_size){
                $file_con=fread($fp,$buffer);
                $file_count+=$buffer;
                echo $file_con;
            }
            fclose($fp);
        }
        
    }







//文件排序
  //  public function orderByName($userName){
    public function orderByName(){
        $pdf = M('goods');

        $userName = $pdf ->where('goods_pdf IS NOT NULL')->getField('goods_id,goods_pdf');//将读取数据库的内容直接转换为一维数组,该方法大多用于select标签
      // print_r($userName);
       // die;
       // $userName = array('张三','李四','王五','小二','猫蛋','狗蛋','王花','三毛','小明','Mary','李刚','张飞','Lucy');
        sort($userName);
       // print_r($userName);
        //die;
        foreach($userName as $name){
          //  $char = $this->getFirstChar($name);
            $char =D('Pdf')->getFirstChar($name); //调用 Pdf model里面的方法
            $nameArray = array();//按照首字母与相对的首字母键进行配对
            if(count($charArray[$char])!=0){
                $nameArray = $charArray[$char];
            }
            array_push($nameArray,$name);
            $charArray[$char] = $nameArray;
        }
      //  echo '按首字母排序前：<br>;
            //    dump($charArray);
               ksort($charArray);//根据键值对排序
             //   echo '按首字母排序后：<br>;
               // dump($charArray);
              //  return $charArray;

                $this -> assign('list',$charArray);
               // print_r( $charArray);
               // die();
                $this ->display("Pdf/rank");


}
}