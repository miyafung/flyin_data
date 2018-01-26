<?php
namespace En\Model;
use Think\Model;

class IndexModel extends Model
{
    //产品目录
    public function getCatGoodsList()
    {
        $catId = I("get.cat_id");
        $map['cat_id'] = $catId;
        return D("goods")->where($map)->select();
    }

    public function getCatList(){
        return $this->select();
    }

    //淘宝IP地址
    public function taobaoIP($clientIP){
        $taobaoIP = 'http://ip.taobao.com/service/getIpInfo.php?ip='.$clientIP;
        $IPinfo = json_decode(file_get_contents($taobaoIP));
        $province = $IPinfo->data->region;
        $city = $IPinfo->data->city;
        $data = $province.$city;
        return $data;
    }
}

