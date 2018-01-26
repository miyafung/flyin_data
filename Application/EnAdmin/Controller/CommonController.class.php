<?php
namespace EnAdmin\Controller;
use Think\Controller;
//后台公共控制器
class CommonController extends Controller{
	//构造方法
  //  public function __construct() {
     //   parent::__construct(); //先执行父类构造方法
	//	$this->checkUser();    //登录检查
		//已经登录，为模板分配用户名变量
		//$this->assign('admin_name',session('userinfo.name'));

        public function __construct(){
            parent::__construct();
            if(!session('uid')){
                $this->error('请先登录系统',U('Login/index'));
            }


        //应用于 产品控制器 view方法
        $goodsModel = D( "goods" );
        //获取产品数：
        $goodsCount =$goodsModel->count();
        $goodsHotCount=$goodsModel->where(array('hot'=>yes))->count();
        $this->assign('goodsCount',  $goodsCount );
        $this->assign('goodsHotCount',  $goodsHotCount );
        //应用于 产品控制器 view方法


    }
	//检查用户是否已经登录
	//private function checkUser(){
	//	if(!session('?userinfo')){
			//未登录，请先登录
	//		$this->redirect('Login/index');
	//	}
	//}
	//public function _empty($name){
	//	$this->error('无效的操作：'.$name);
  //  }



    //生成网站快捷方式
    public function makeurl()
    {
        $filename = 'flyindate.url';
        $url = 'http://miya.date/';
        // $icon = 'http://www.dawnfly.cn/**************************/20151231/20151231150917_32569.ico';
       $icon = 'http://miya.date/598d48871d08064px.ico';
        //$icon = '__PUBLIC__/img/598d48871d08064px.ico';

        /**
         * 创建保存为桌面代码
         * @param String $filename 保存的文件名
         * @param String $url 访问的连接
         * @param String $icon 图标路径
         */

        // 创建基本代码
        $shortCut = "[InternetShortcut]\r\nIDList=[{000214A0-0000-0000-C000-000000000046}]\r\nProp3=19,2\r\n";
        $shortCut .= "URL=" . $url . "\r\n";
        if ($icon) {
            $shortCut .= "IconFile=" . $icon . "";
        }

        header("content-type:application/octet-stream");

        // 获取用户浏览器
        $user_agent = $_SERVER['HTTP_USER_AGENT'];
        $encode_filename = rawurlencode($filename);

        // 不同浏览器使用不同编码输出
        if (preg_match("/MSIE/", $user_agent)) {
            header('content-disposition:attachment; filename="' . $encode_filename . '"');
        } else if (preg_match("/Firefox/", $user_agent)) {
            header("content-disposition:attachment; filename*=\"utf8''" . $filename . '"');
        } else {
            header('content-disposition:attachment; filename="' . $filename . '"');
        }

        echo $shortCut;
    }
}
