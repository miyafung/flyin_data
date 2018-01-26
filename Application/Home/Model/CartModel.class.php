<?php
	namespace Home\Model;
	use Think\Model;

	class CartModel extends Model {

		public function addGoodsToCart() {
			$goodsId = I( "post.goods_id" );
			$goodsNum = I( "post.goods_num" );
			$goodsInfo = $this->getCartGoods( $goodsId );
			$goodsInfo['goods_num'] = $goodsNum;
			$goodsInfo['session_id'] = session_id();
			$goodsInfo['user_id'] = 0;

			if ( $hasGoods = $this->hasCartGoods( $goodsId ) ) {
				$goodsInfo['goods_num'] += $hasGoods[0]['goods_num'];
				$map['goods_id'] = $goodsId;
				$map['session_id'] = session_id();
				$res = $this->where( $map )->save( $goodsInfo );
				if ( $res !== false ) {
					return true;
				}else {
					return false;
				}
			}else {
				if ( $this->add( $goodsInfo ) ) {
					return true;
				}else {
					return false;
				}	
			}
			
		}

		public function getCartGoodsList () {
			$map['session_id'] = session_id();
			$goodsList = $this->where( $map )->select();
			$totalPrice = 0;
			if ( !empty( $goodsList ) ) {
				foreach ( $goodsList as $k => $v ) {
					$goodsList[$k]['subtotal'] = $v['goods_num'] * $v['goods_price'];			
					$totalPrice += $goodsList[$k]['subtotal'];
				}				
			}
			array_push( $goodsList, $totalPrice );
			return $goodsList;
		}

		public function delGoods () {
			$map['goods_id'] = I( "goods_id" );
			$map['session_id'] = session_id();
			return $this->where( $map )->delete();	
		}


		public function hasCartGoods ( $goodsId ) {
			$map['goods_id'] = $goodsId;
			$map['session_id'] = session_id();
			return $this->where( $map )->select();
		}

		public function getCartGoods ( $goodsId ) {
			return D("goods")->field( "goods_id,goods_price,goods_name" )->find( $goodsId );
		}

		public function clearCart () {
			$map['session_id'] = session_id();
			return $this->where( $map )->delete();
		}

	}




?>