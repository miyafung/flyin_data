<?php

namespace Home\Controller;

use Think\Controller;

class CategoryController extends  CommonController {

  //  public function _initialize() {
//        setcookie(session_name(), session_id(), time() + 24 * 3600);
  //      $this->assign("catList", D("category")->getCatList());
 //   }

    //放到CommonController
    public function view() {
            $this->assign("goodsList", D("category")->getCatGoodsList());
            $this->assign("title","产品分类");
             $this->display("Goods/index");

    }


}
