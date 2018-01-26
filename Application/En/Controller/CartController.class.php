<?php

namespace En\Controller;
use Think\Controller;
class CartController extends Controller {

    public function _initialize() {
        setcookie(session_name(), session_id(), time() + 24 * 3600);
        $this->assign("catList", D("category")->getCatList());
    }

    public function insert() {
        if (D("cart")->addGoodsToCart()) {
            $this->success("购物车添加成功");
        } else {
            $this->error("购物车添加失败");
        }
    }

    public function view() {
        $cartGoodsList = D("cart")->getCartGoodsList();
        $totalPrice = array_pop($cartGoodsList);
        $this->assign("cartGoodsList", $cartGoodsList);
        $this->assign("totalPrice", $totalPrice);
        $this->display("cart_list");
    }

    public function delete() {
        if (D("cart")->delGoods()) {
            $this->success("商品删除成功");
        } else {
            $this->error("商品删除失败");
        }
    }

    public function clearCart() {
        if (D("cart")->clearCart()) {
            $this->success("购物车清空成功");
        } else {
            $this->error("购物车清空失败");
        }
    }

}

?>