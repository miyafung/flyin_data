<?php
/**
 * 商品列表过滤项的URL生成
 * @param $type 生成的URL类型（cid, price, order)
 * @parma $data 相应的数据当前的值（为空表示清除该参数）
 * @return string 生成好的携带正确参数的URL
 */
function mkFilterURL($type, $data='') {
	$params = I('get.');
	unset($params['p']);  //先清除分页
	if($type=='cid') unset($params['price']); //切换分类时清除价格
	if($data){   //添加到参数
		$params[$type] = $data;
	}else{       //$data为空时清除参数
		unset($params[$type]);
	}
	return U('Products/index',$params);
}

//通过开源组件 HTML Purifier 过滤富文本
//该函数用于在后台编辑商品详情时过滤富文本，过滤后保存到数据库中。
function htmlpurifier($html){
	static $Purifier;
	if(empty($Purifier)){
		//载入第三方类库
		if(!Vendor('htmlpurifier.HTMLPurifier','','.standalone.php')){
			die('载入 HTMLPurifier 类库失败！');
		}
		$Purifier = new HTMLPurifier($html);
	}
	return $Purifier->purify($html);  
}

//---------分类处理函数

//获取一维数组分类列表
function category_list($data,&$rst,$pid=0,$level=0){
	foreach($data as $v){
		if($v['pid'] == $pid){
			$v['level'] = $level; //保存分类级别
			$rst[] = $v;          //保存符合条件的元素
			category_list($data,$rst,$v['id'],$level+1); //递归
		}
	}
}

//根据任意分类ID查找子孙分类ID
function category_child($data,&$rst,$id=0){
	foreach($data as $v){
		if($v['pid'] == $id){
			$rst[] = (int)$v['id'];
			category_child($data,$rst,$v['id']);
		}
	}
}

//按父子关系转换分类为多维数组
function category_tree($data,$pid=0,$level=0){
	$temp = $rst = array();
	foreach($data as $v) $temp[$v['id']] = $v;
	foreach($temp as $v){
		if(isset($temp[$v['pid']])){
			$temp[$v['pid']]['child'][] = &$temp[$v['id']];
		}else{
			$rst[] = &$temp[$v['id']];
		}
	}
    return $rst;
}

//查找分类的家谱
function category_family($data,$id){
	$rst = category_parent($data,$id);
	foreach(array_reverse($rst['pids']) as $v){
		foreach($data as $vv){
			($vv['pid']==$v) && $rst['parent'][$v][] = $vv;
		}
	}
	return $rst;
}


//根据任意分类ID查找父分类（包括自己）
function category_parent($data,$id=0){
	$rst = array('pcat'=>array(),'pids'=>array($id));
	for($i=0;$id && $i<10;++$i){  //最多10层，防止意外死循环
		foreach($data as $v){
			if($v['id']==$id){
				$rst['pcat'][] = $v;  //父分类
				$rst['pids'][] = $id = $v['pid']; //父分类ID
			}
		}
	}
	return $rst;
}




//**************************   产品的历史记录
/**
+----------------------------------------------------------
 * 浏览记录按照时间排序
+----------------------------------------------------------
 */
function my_sort($a, $b){
    $a = substr($a,1);
    $b = substr($b,1);
    if ($a == $b) return 0;
    return ($a > $b) ? -1 : 1;
}
/**
+----------------------------------------------------------
 * 网页浏览记录生成
+----------------------------------------------------------
 */
function cookie_history($id,$title,$img,$url){
    $dealinfo['title'] = $title;
    $dealinfo['img'] = $img;
    $dealinfo['url'] = $url;
    $time = 't'.NOW_TIME;
    $cookie_history = array($time => json_encode($dealinfo));  //设置cookie
    if (!cookie('history')){//cookie空，初始一个
        cookie('history',$cookie_history);
    }else{
        $new_history = array_merge(cookie('history'),$cookie_history);//添加新浏览数据
        uksort($new_history, "my_sort");//按照浏览时间排序
        $history = array_unique($new_history);
        if (count($history) > 4){
            $history = array_slice($history,0,4);
        }
        cookie('history',$history);
    }
}
/**
+----------------------------------------------------------
 * 网页浏览记录读取
+----------------------------------------------------------
 */
function cookie_history_read()
{
    $arr = cookie('history');
    foreach ((array)$arr as $k => $v) {
        $list[$k] = json_decode($v, true);
    }
    return $list;

}

//**************************   产品的历史记录 END



function alert($msg, $url, $time = 3)
{
    /*****meta部分主要是针对移动端，然后加载jquery和layer的js文件，顺序不能反*******/
    $str = '<meta name="viewport" content="initial-scale=1, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <meta http-equiv="Access-Control-Allow-Origin" content="*" />
    <meta http-equiv="pragma" content="no-cache" />
    <script src="__PUBLIC__/Common/layer/mobile/layer.js"></script>
';
    $str .= '<script>
        $(function(){          
            layer.open({
              content: "<span>'.$msg.'</span>",
              btn: "好的",
              time:'.$time.',
              //style: \'background-color:#09C1FF; color:#fff; border:none;\' //自定风格样式
            });
        });
        setTimeout(function(){self.location.href="' . $url . '"},2000);
        </script>';
    return $str;
}