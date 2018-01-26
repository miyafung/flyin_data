<?php
namespace Home\Model;
use Think\Model;
class GoodsModel extends Model {

	/**
	 * 商品列表
	 * @param array|int $cids 分类ID数组
	 * @param int $p 当前页码
	 * @return array 查询结果
	 */

	//产品搜索
    public function index(){
        // 搜索关键字
        $keywords = trim($_POST['keywords']);
        // 实例化friendlink
        $fdpdf = M('goods');
        //搜索内容为链接名称与链接介绍

        $pdf = $fdpdf ->order('goods_id') ->where("goods_pdf like '%{$keywords}%' &&  goods_pdf!= ''  ") -> limit($page -> firstRow.','.$page -> listRows) -> select();
        $this -> assign('pdfsearch',$pdf);
        $this -> display();
    }

	public function getList($cids=0,$p=0){
		//准备查询条件
		$field = 'category_id,goods_id,goods_name,goods_pdf,img_center';
		$where = array('recycle' => 'no','on_sale'=>'yes');
		//查找分类ID数组

		if($cids > 0){
			$where['category_id'] = array('in',$cids);
		}
		$price_max = $this->where($where)->max('price');  //获取最大价格
		$recommend = $this->getRecommend($where);         //获取推荐商品
		//--------处理排序条件
		$order = 'goods_id desc';
		$allow_order = array(
			'price-desc' => 'price desc',
			'price-asc' => 'price asc',
		);
		$input_order = I('get.order');
		if(isset($allow_order[$input_order])){
			$order = $allow_order[$input_order];
		}
		//--------处理价格条件
		$price = explode('-',I('get.price'));
		if(count($price)==2){
			$where['price'] = array(
				array('EGT',(int)$price[0]), //大于等于
				array('ELT',(int)$price[1]), //小于等于
			);
		}
		//准备分页查询
		$pagesize = C('USER_CONFIG.pagesize');        //每页显示商品数
		$count = $this->where($where)->count();       //获取符合条件的商品总数
		$Page = new \Think\Page($count,$pagesize);    //实例化分页类
		$this->_customPage($Page);                    //定制分页类样式
		//查询商品数据
		$data = $this->field($field)->where($where)->order($order)->page($p,$pagesize)->select();
		//返回结果
		return array(
			'data' => $data,              //商品列表数组
			'price' => $this->getPriceDist($price_max), //计算商品价格
			'recommend' => $recommend,    //被推荐的商品
		);
	}
	

	
	//根据$where条件查询商品数据
	public function getGoods($where){
		//定义需要的字段
		$field = 'goods_id,goods_name,img_center,goods_pdf,cat_id';
		return $this->field($field)->where($where)->find();
	}

	//取出推荐商品
	public function getRecommend($where){
		//查询被推荐的商品
		$where['recommend'] = 'yes';
		$field = 'goods_id,goods_name,img_center';
		return $this->field($field)->where($where)->limit(6)->select();
	}

	//动态计算价格
	//（max最大价格，sum分配个数）
	private function getPriceDist($max, $sum = 5) {
		if($max<=0) return false;
		$end = $size = ceil($max / $sum);
		$start = 0;
		$rst = array();
		for ($i = 0; $i < $sum; $i++) {
			$rst[] = "$start-$end";
			$start = $end + 1;
			$end += $size;
		}
		return $rst;
	}

/**
    20170612 商品的获取
 */
    public function getGoodsList () {
     $admin = D("goods");
     $count = $admin->count();// 查询满足要求的总记录数
    $Page  = new \Think\Page($count,6);
    $data = $this->field( "g.*,c.cat_name" )->table( "__GOODS__ as g" )->join( "LEFT JOIN __CATEGORY__ as c ON g.cat_id = c.cat_id" ) ->limit($Page->firstRow . ',' . $Page->listRows)
        ->select();
        return array(
            'data' => $data,              //商品列表数组
            'pagelist' => $Page->show(),  //分页链接HTML
        );
}


    public function getGoodsHot () {
        return $this->field( "g.*,c.cat_name" )
            ->table( "__GOODS__ as g" )
            ->join( "LEFT JOIN __CATEGORY__ as c ON g.cat_id = c.cat_id" )
            ->where("g.hot='yes'")
            ->select();
    }



    public function getGoodsRemend() {
        return $this->field( "g.*,c.cat_name" )
            ->table( "__GOODS__ as g" )
            ->join( "LEFT JOIN __CATEGORY__ as c ON g.cat_id = c.cat_id" )
            ->where("g.hot='yes'")
            ->select();
    }


    public function getGoodsInfo () {
        $goodsId = I( "get.goods_id" );
        $map['g.goods_id'] = $goodsId;
        $goodsInfo = $this->field( "g.*, gg.*" )
            ->table( "__GOODS__ as g" )
            ->join( "LEFT JOIN __GALLERY__ as gg ON g.goods_id = gg.goods_id" )
            ->where( $map )
            ->select();
        $newGoodsInfo = array();
        if ( !empty( $goodsInfo ) ) {
            $index = 0;
            foreach ( $goodsInfo as $k => $v ) {
                $newGoodsInfo['goods_id'] = $v['goods_id'];
                $newGoodsInfo['goods_name'] = $v['goods_name'];
                $newGoodsInfo['goods_sku'] = $v['goods_sku'];
                $newGoodsInfo['goods_stock'] = $v['goods_stock'];
                $newGoodsInfo['goods_desc'] = $v['goods_desc'];
                $newGoodsInfo['goods_performance'] = $v['goods_performance'];
                $newGoodsInfo['is_show'] = $v['is_show'];
                $newGoodsInfo['hits'] = $v['hits'];
                $newGoodsInfo['cat_id'] = $v['cat_id'];
                $newGoodsInfo['goods_price'] = $v['goods_price'];
                $newGoodsInfo['goods_pdf'] = $v['goods_pdf'];

                // $newGoodsInfo['goods_pdf']=iconv("utf-8","gb2312", $newGoodsInfo['goods_pdf']);//将文件路径由utf8转gb2312
                //  print_r( $newGoodsInfo);
                // die();

                $newGoodsInfo['goods_id'] = $v['goods_id'];
                $newGoodsInfo['gallery'][$index]['img_big'] = $v['img_big'];
                $newGoodsInfo['gallery'][$index]['img_center'] = $v['img_center'];
                $newGoodsInfo['gallery'][$index]['img_small'] = $v['img_small'];
                $index++;
            }
        }
        unset( $goodsInfo );
        return $newGoodsInfo;
    }


    //参数表
    public function getGoodsInfo2 () {
        $goodsId = I( "get.goods_id" );
        $map["g.goods_id"] = $goodsId;
        $goodsInfo2 = $this->field( "g.*,gg.*" )
            ->table( "__GOODS__ as g" )
            ->join( "JOIN __PARAMETER__ as gg ON g.goods_id = gg.goods_id" )
            ->where( $map )
            ->select();
        $newGoodsInfo2 = array();
        if ( !empty( $goodsInfo2 ) ) {
            foreach ( $goodsInfo2 as $k => $v ) {

                $newGoodsInfo2["parameter_id"] = $v["parameter_id"];
                $newGoodsInfo2["parameter_name"] = $v["parameter_name"];
                $newGoodsInfo2["parameter"][$k]["parameter_name"] = $v["parameter_name"];
                $newGoodsInfo2["parameter"][$k]["parameter_value"] = $v["parameter_value"];

                //将parameter_name2数组，分隔
                $newGoodsInfo2["parameter_name2"]=explode(",", $newGoodsInfo2["parameter_name"]);
                //  $newGoodsInfo2["parameter_value"][$k] = $v["parameter_value"];
                $newGoodsInfo2["parameter_value2"][$k] = explode(",",$v["parameter_value"]);
            }
        }
        unset( $goodsInfo2);
        return $newGoodsInfo2;
    }


    //一下开始查询产品处理
    public function goodsSearch(){
        if ((I("post.keywords")) !== "") {
            $keywords = trim(I("post.keywords"));
            $fdpdf = M('goods');
            $where['goods_name|goods_desc|goods_performance'] = array('like', '%' . $keywords . '%');
            $goods = $fdpdf->join('LEFT JOIN flyin_category ON flyin_category.cat_id = flyin_goods.cat_id')->where($where)->select();
            $goodsSearch = $goods;
            //去除goods_desc 里面的标签
            foreach ($goodsSearch as $k => $v) {   //循环取值
                $goodsSearch[$k]['goods_desc'] = strip_tags($goodsSearch[$k]['goods_desc']);
                $goodsSearch[$k]['goods_performance'] = strip_tags($goodsSearch[$k]['goods_performance']);
                $goodsSearch[$k]['goods_name'] = str_replace($keywords, "<font color='yellow!important'>" . $keywords . "</font>", $goodsSearch[$k]['goods_name']);
            }
            unset($goods);
            return $goodsSearch;
        }
    }


    //一下新闻查询处理
    public function newsSearch()
    {
        if ((I("post.keywords")) != "") {
            $keywords = trim(I("post.keywords"));
            $fdpdf2 = M('news');
            $where2['name|desc'] = array('like', '%' . $keywords . '%');
            $news = $fdpdf2->where($where2)->select();
            $newsSearch = $news;
            //去除decs 里面的标签
            foreach ($newsSearch as $k => $v) {   //循环取值
                $newsSearch[$k]['desc'] = strip_tags($newsSearch[$k]['desc']);
                $newsSearch[$k]['name'] = str_replace($keywords, "<font color='yellow!important'>" . $keywords . "</font>", $newsSearch[$k]['name']);
            }
            unset($news);
            return $newsSearch;
        }
    }


    //一服务查询处理
    //方案支持
    public function serviceSearch(){
        if ((I("post.keywords")) != "") {
            $keywords = trim(I("post.keywords"));
            $fdpdf3 = M('services');
            $where3['name|desc'] = array('like', '%' . $keywords . '%');
            $services = $fdpdf3->where($where3)->select();
            $servicesSearch = $services;
            //去除decs 里面的标签
            foreach ($servicesSearch as $k => $v) {   //循环取值
                $servicesSearch[$k]['desc'] = strip_tags($servicesSearch[$k]['desc']);
                $servicesSearch[$k]['name'] = str_replace($keywords, "<font color='yellow!important'>" . $keywords . "</font>", $servicesSearch[$k]['name']);
            }
            unset($services);
            return $servicesSearch;
        }
    }


    //添加关键词到数据库
    public function addkeyword(){
        if ((I("post.keywords")) != "") {
            $keyname = trim(I("post.keywords"));
            $searchKey = M('Searchkeyword');
            $res = $searchKey->where("keywords = '{$keyname}'")->find();
            //判断关键词是否存在
            if ($res) {
                //"已经存在";
                $searchKey->where(array('keywords' => $keyname))->setInc('hits', 1);
            } else {
                if (!empty($searchKey)) {
                    $searchKey->keywords = $keyname;
                    $searchKey->add();
                }
            }
            return;
        }
    }
}