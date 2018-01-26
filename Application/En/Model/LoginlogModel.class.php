<?php
namespace En\Model;
use Think\Model;

class LoginlogModel extends Model
{

//ip获取存库
    public function getIp()
    {


           $Ip = new \Org\Net\IpLocation('qqwry.dat'); // 实例化类 参数表示IP地址库文件
           $area = $Ip->getlocation(); // 获取某个IP地址所在的位置
           $str=$area['country'].$area['area']; //合并位置
           $str=iconv("GB2312", "UTF-8",$str); //因为最新版为GBK 转为UTF8

        //  print_r($area['ip']);
        //  print_r($str);
        //    die();

        $logs = [
            'username' => '测试账号',
            "ip" => $area['ip'],
            'location' => $str,
            'area' => $str,
            'time' => date("Y-m-d H:i:s", time()),
        ];

      M('Loginlog')->add($logs);

      return;

    }

}

        /**
        $appkey = "b6f1f7ff71e746bd5a7ebd67be421936";
        //************1.根据IP/域名查询地址************
        $url = "http://apis.juhe.cn/ip/ip2addr";
        $params = array(
            //  "ip" => getIPaddress(),//需要查询的IP地址或域名
            "ip" => $ip,
            "key" => $appkey,//应用APPKEY(应用详细页查询)
            "dtype" => "",//返回数据的格式,xml或json，默认json
        );
        $paramstring = http_build_query($params);
        $content = juhecurl($url, $paramstring);
        $result = json_decode($content, true);
        $logs = [
            'username' => '测试账号',
            //'ip'=>getIPaddress(),
            "ip" => $ip,
            'location' => $result['result']['location'],
            'area' => $result['result']['area'],
            'time' => date("Y-m-d H:i:s", time()),
        ];
        return $result = M('Loginlog')->add($logs);
    }
       */

