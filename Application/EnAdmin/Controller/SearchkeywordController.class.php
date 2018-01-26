<?php
namespace EnAdmin\Controller;
class SearchkeywordController extends CommonController
{
    public function index(){
        $Search_keyword = D('searchkeyword');
        $count = $Search_keyword->count();// 查询满足要求的总记录数
        $Page = new \Think\Page($count, 10);// 实例化分页类 传入总记录数和每页显示的
        $Page->setConfig('prev', '上一页');
        $Page->setConfig('next', '下一页');
        $Page->setConfig('first', '首页');
        $Page->setConfig('last', '共%TOTAL_PAGE%页');
        $show = $Page->show();// 分页显示输出
        $Search_keywordres = $Search_keyword->order('hits desc')->limit($Page->firstRow . ',' . $Page->listRows)->select();
        $this->assign('page', $show);// 赋值分页输出
        $this->assign('Searchkeywordres', $Search_keywordres);
        $this->display();
    }



    public function del()
    {
        $Search_keyword = D('searchkeyword');
        if ($Search_keyword->delete(I('keywrod_id'))) {
            $this->success('删除成功！');
        } else {
            $this->error('删除失败！');
        }
    }

}