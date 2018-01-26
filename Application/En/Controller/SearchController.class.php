<?php
namespace En\Controller;
//方案页面控制器
class SearchController extends CommonController {

    // 产品搜索页面
    public function index() {
        // 搜索关键字
        $keywords = trim($_POST['keywords']);

        // 实例化goods
        $fdlink = M('goods');
        $count = $fdlink -> where("name like '%{$keywords}%'") -> count();
        $page = new \Think\Page($count,10);
        $show = $page -> show();

        //搜索内容产品名称与链接介绍
        $link = $fdlink ->order('id') ->where("name like '%{$keywords}%'") -> limit($page -> firstRow.','.$page -> listRows) -> select();

        foreach ($link as $key => $value) {

            // 判断产品是否显示
            switch($value['recycle']) {
                case 0:
                    $link[$key]['recycle'] = "no";
                    break;
                case 1:
                    $link[$key]['recycle'] = "yes";
                    break;
            }

        }
        $this -> assign('link',$link);
        $this -> display();

    }
}