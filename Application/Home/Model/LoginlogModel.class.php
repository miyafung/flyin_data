<?php
namespace Home\Model;
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

