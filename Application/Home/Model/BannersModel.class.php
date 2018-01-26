<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 2017/7/21/0021
 * Time: 8:53
 */
namespace Home\Model;
use Think\Model;
class BannersModel extends Model {

    //Home 页面big banner的获取
    public function getHomebigBanner() {
        //准备查询条件（推荐banner、已上架、不在回收站中)
        $Banners = M('banners');
        $where3 = array('flyin_banners.recommend' => 'yes', 'flyin_banners.recycle' => 'no', 'flyin_bannercategory.name' => '首页大广告图');
        $data = $Banners->join('flyin_bannercategory ON flyin_bannercategory.id = flyin_banners.Bannercategory_id')->order('flyin_banners.rank desc') ->where($where3)->select();
        return $data;
    }

    //Home 页面partner banner的获取
    public function getHomePartnerBanner() {
        $Banners = M('banners');
        $where3 = array('flyin_bannercategory.name' => '合作伙伴');
        $partnerdata = $Banners->join('flyin_bannercategory ON flyin_bannercategory.id = flyin_banners.Bannercategory_id')->where($where3)->select();
        return $partnerdata;
    }

    //Home 页面基础方案 banner的获取
    public function getHomeSolveBanner() {
        $Banners = M('banners');
        $where3 = array('flyin_bannercategory.name' => '基础方案');
        $solvedata = $Banners->join('LEFT JOIN flyin_bannercategory ON flyin_bannercategory.id = flyin_banners.Bannercategory_id')->where($where3)->select();
        //去除decs 里面的标签
        foreach ( $solvedata as $k => $v ) {   //循环取值
           $solvedata[$k]['desc'] = strip_tags($solvedata[$k]['desc']);
      }
        return $solvedata;
    }




}
