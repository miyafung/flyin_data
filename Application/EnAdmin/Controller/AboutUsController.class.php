<?php
namespace EnAdmin\Controller;
use Think\Controller;
class AboutUsController extends Controller {

    //网站配置首页
    public function index() {
        $webset = M("aboutus");
        $res = $webset ->order('id') -> select();

        foreach ($res as $key => $value) {
            switch ($res[$key]['status']) {
                case 1:
                    $res[$key]['status'] = '是';
                    break;
                case 0:
                    $res[$key]['status'] = '否';
                    break;
            }
        }
        $this -> assign("setup",$res);
        $this -> display();
    }

    //添加网站配置
    public function addAboutUs() {
        $this -> display();
    }

    //添加网站配置操作
    public function addset() {
        $aboutus = M('aboutus');
        //添加logo图标
        if (!empty($_FILES['certification'])) {
            $config = array(
                'maxSize' => 10000000,
                'exts' => array('png','jpg','jpeg','gif'),
                'rootPath' => './',
                'savePath' => 'Public/Common/Uploads/Photos/Certification/',
                'autoSub' => false,
            );
            $upload = new \Think\Upload($config);
            $info = $upload -> upload();
            if ($info) {
                foreach ($info as $file) {
                    $_POST['certification'] = $file['savename'];
                }
            }

        }

        //写入数据到数据库中
        if ($aboutus -> create()) {
            $res = $aboutus -> add();
            if ($res) {
                $this -> success("配置添加成功",U("AboutUs/index"),0);
            } else {
                $this -> error("配置添加失败");
            }
        }

    }

    //修改网站配置
    public function updAboutUs() {
        $id = $_GET['id'];
        $aboutus = M('aboutus');
        $res = $aboutus -> where("id = {$id}") -> find();
        if ($res) {
            $this -> assign("setup",$res);
        }
        $this -> display("AboutUs/updAboutUs");
    }

    //修改网站配置操作
    public function upd() {
        $id = $_GET['id'];
        $aboutus = M("aboutus");
        //修改logo操作
        if (!empty($_FILES['certification'])) {
            $config = array(
                'maxSize' => 10000000,
                'exts' => array('png','jpg','jpeg','gif'),
                'rootPath' => './',
                'savePath' => 'Public/Common/Uploads/Certification/',
                'autoSub' => false,
            );
            $upload = new \Think\Upload($config);
            $info = $upload -> upload();
            if ($info) {
                foreach ($info as $file) {
                    $_POST['certification'] = $file['savename'];
                }
            }
        }
        //写入数据到数据库
        if ($aboutus -> create()) {
            $result = $aboutus -> where("id = {$id}") -> save();
            if ($result) {
                $this -> success("修改配置成功",U("AboutUs/index"),0);
            } else {
                $this -> error("修改配置失败");
            }
        }
    }

    //删除网站配置
    public function delAboutUs() {
        $id = $_GET['id'];
        $aboutus = M("aboutus");
        $res = $aboutus -> where("id = {$id}") -> delete();
        if ($res) {
            $this -> success("删除成功",U("AboutUs/index"),0);
        } else {
            $this -> error("删除失败");
        }
    }

}