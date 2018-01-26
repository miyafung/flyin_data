<?php
namespace En\Controller;
//前台主页控制器
class IndexController extends CommonController
{
    public function index()
    {

        //==友情网站连接部分 ==
     //   $this->assign("getIp", D("Loginlog")->getIp());
        // ==Home页面big banner部分== 的获取
        $this->assign('bannerdata',D("banners")->getHomebigBanner());
        // ==Home页面基础解决方案 banner部分== 的获取
        $this->assign('solvebannerdata',D("banners")->getHomeSolveBanner());
        // ==Home页面partner banner部分== 的获取
        $this->assign('partnerbannerdata',D("banners")->getHomePartnerBanner());
        // ==hot 商品部分==  取得goods里面的  D("goods")->getGoodsHot()
        $this->assign("remendgoods", D("goods")->getGoodsRemend());
        // ==hot 商品部分==  取得goods里面的  D("goods")->getGoodsHot()
        $this->assign("goodsList", D("goods")->getGoodsHot());
        //==友情网站连接部分 ==
        $this->assign("catList", D("category")->getCatList());
        $this->assign("title","Shenzhen Flyindata Optronics Co.,Ltd");

        //  $urlSina = 'http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=json&ip='.$ip;  //新浪的IP接口
        //  $json = file_get_contents($urlSina);
        //   $jsonDecode = json_decode($json);
        //   dump($jsonDecode);
        //   print_r($jsonDecode);
       // $ip=get_client_ip();
      //  $num = count(explode('.', $ip));//有将IP分成4个
        // print_r($num);
        // die($num);
     //   file_put_contents('test1.txt',$ip);

      //  if ($num > 2) {//不是空
       // if($ip!=""){
        //    $url="http://ip.taobao.com/service/getIpInfo.php?ip=".$ip; //淘宝的IP接口
        //    $ipinfo=json_decode(file_get_contents($url));
       //     $city = $ipinfo->data->region.$ipinfo->data->city;
        //    ini_set('date.timezone','Asia/Shanghai');//设置时区
         //   $date=date('Y-m-d');//获取当前时间
//            $iprow=M('Ipdb')->field('ip')->where('ip like "%'.$ip.'%" and ipdate="'.$date.'"')->select();//查找今天的ip记录  同一个IP一天只记录一次



//            if(empty($iprow)){
                //  $str=iconv("GB2312", "UTF-8",$city); //因为最新版为GBK 转为UTF8
        //        $logModel = M('Ipdb'); //实例化模型
         //       file_put_contents('test2.txt',$ip);
         //       $dataip = array(
                   //'ip' => $ipinfo->data->ip, //用户ID
         //           'ip' => $ip->data->ip, //用户ID
          //          'country'=> $ipinfo->data->country,
           //         'district'=>$city,
           //         'ipdate'=>$date, //操作时间(当前系统时间)
           //         'isp'=>$ipinfo->data->isp, //操作时间(当前系统时间)
           //         'current_date'=>date('Y-m-d H:i:s'), //操作时间(当前系统时间)
         //           'time'=>time(), //操作时间(当前系统时间)
           //     );
          //      $logModel->add($dataip);
//            }
       // }//这里是插入数据IP库
        //产品导航目录


        $ip = get_client_ip();
        if($ip !=""){
            // $num = count(explode('.', $ip));//有将IP分成4个
            //     file_put_contents('test1.txt', $ip . '##', FILE_APPEND);
            //if ($num > 2) {//不是空
            $url = "http://ip.taobao.com/service/getIpInfo.php?ip=" . $ip; //淘宝的IP接口
            $ipinfo = json_decode(file_get_contents($url));
            $city = $ipinfo->data->region . $ipinfo->data->city;
            ini_set('date.timezone', 'Asia/Shanghai');//设置时区
            $date = date('Y-m-d');//获取当前时间
            $iprow = M('Ipdb')->field('ip')->where('ip like "%' . $ip . '%" and ipdate="' . $date . '"')->select();//查找今天的ip记录  同一个IP一天只记录一次
            if (empty($iprow)) {
                //  $str=iconv("GB2312", "UTF-8",$city); //因为最新版为GBK 转为UTF8
                $logModel = M('Ipdb'); //实例化模型
                //     file_put_contents('test2.txt', $ip . '##', FILE_APPEND);
                $dataip = array(
                    'ip' => $ip, //用户ID
                    // 'ip' => $ip->data->ip, //用户ID
                    'country' => $ipinfo->data->country,
                    'district' => $city,
                    'ipdate' => $date, //操作时间(当前系统时间)
                    'isp' => $ipinfo->data->isp, //操作时间(当前系统时间)
                    'current_date' => date('Y-m-d H:i:s'), //操作时间(当前系统时间)
                    'time' => time(), //操作时间(当前系统时间)
                );
                $logModel->add($dataip);
            }
        }
        


        $this->display();
    }
}