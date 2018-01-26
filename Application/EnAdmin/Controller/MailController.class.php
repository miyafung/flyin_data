<?php
/**
 * alltosun.com  ConfigController.class.php
 * ============================================================================
 * 版权所有 (C) 2014-2016 GoCMS内容管理系统
 * 官方网站:   http://www.gouguoyin.cn
 * 联系方式:   QQ:245629560
 * ----------------------------------------------------------------------------
 * 许可声明：这是一个开源程序，未经许可不得将本软件的整体或任何部分用于商业用途及再发布。
 * ============================================================================
 * $Author: 勾国印 (phper@gouguoyin.cn) $
 * $Date: 2015-4-17 下午3:27:55 $
 * $Id$
 */
namespace EnAdmin\Controller;
use Think\Controller;
use Common\Helper\Theme;

class MailController extends Controller {

    //网站配置页面
    public function site()
    {
        if(IS_AJAX){
            $data = $_POST;
            foreach ($data as $k => $v) {
                $result = M('Mail')->where(array('field' => $k))->save(array('value' => $v));
            }
            $this->ajaxReturn(array('status' => 'ok', 'info' => '网站设置保存成功'));
        }
        //获取配置列表
        $config_list = M('Mail')->where(array('status' => 1, 'config_type' => 'site'))->order('sort asc,id asc')->select();
        //获取模板主题列表
        $theme_list = Theme::getAllTemplateTheme('home');

        $this->assign('config_list', $config_list);
        $this->assign('theme_list', $theme_list);
        $this->display('index');
    }

    //保存网站配置
    public function site_save()
    {
        $data = I('post.');



        foreach ($data as $k => $v) {
            $result = M('Mail')->where(array('field' => $k))->save(array('value' => $v));
        }
        $this->success('网站设置保存成功', U('Admin/Mail/site'));
    }


    //邮箱设置
    public function email()
    {
        if(IS_AJAX){
            $data = $_POST;
            foreach ($data as $k => $v) {
                $result = M('Mail')->where(array('field' => $k))->save(array('value' => $v));
            }
            $this->ajaxReturn(array('status' => 'ok', 'info' => '邮箱服务器配置成功'));
        }
        $this->display('index');
    }

    //邮箱设置
    public function email_test()
    {
        if(IS_AJAX){
            $content = I('content');

            $site_email = getConfigValue('site_email');

            $result = sendEmail($site_email, '邮件服务器连接测试', $content);


            if($result){
                $this->ajaxReturn(array('status' => 'ok', 'info' => '测试内容发送成功'));
            }else{
                $this->ajaxReturn(array('status' => 'error', 'info' => '测试内容发送错误，请检查邮箱配置是否正确'));
            }
        }
    }


    //上传设置
    public function upload()
    {

        $this->display('config_upload');
    }

    //保存上传配置
    public function upload_save()
    {
        $data = I('post.');

        //print_r($data);exit;

        foreach ($data as $k => $v) {
            $result = M('Mail')->where(array('field' => $k))->save(array('value' => $v));
        }
        $this->success('上传设置保存成功', U('Admin/Mail/upload'));
    }

    //wap(手机版)设置
    public function wap()
    {
        //获取模板主题列表
        $theme_list = Theme::getAllTemplateTheme('wap');

        $this->assign('theme_list', $theme_list);
        $this->display('config_wap');
    }

    //保存wap配置
    public function wap_save()
    {
        $data = I('post.');

        //上传手机站logo
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类
        $upload->savePath  =      '/'; // 设置附件上传目录
        $upload->saveName  =      'wap_logo';
        $upload->autoSub   =      false;
        // 上传文件
        $info   =   $upload->uploadOne($_FILES['wap_logo']);
        if($info){
            $data['wap_logo'] = 'Uploads'.$info['savepath'].$info['savename'];
        }

        foreach ($data as $k => $v) {
            $result = M('Mail')->where(array('field' => $k))->save(array('value' => $v));
        }
        $this->success('手机网站设置保存成功', U('Admin/Mail/wap'));
    }

    //配置字段列表页面
    public function field()
    {
        $config_list = M('Mail')->where(array('config_type' => 'site'))->order('sort ASC')->select();
        $this->assign('config_list', $config_list);
        $this->display('field_list');
    }

    //添加自定义系统字段页面
    public function field_add()
    {
        $this->display('field_add');
    }

    //修改自定义系统字段页面
    public function field_edit()
    {
        $id = I('id');
        $field_info = M('Mail')->find($id);
        $this->assign('field_info', $field_info);
        $this->display('field_add');
    }

    //保存新增字段信息
    public function field_save()
    {
        $id = I('id');
        $field_info = M('Mail')->find($id);

        $data['field'] = I('field');
        $data['title'] = I('title');
        $data['mark'] = I('mark');
        $data['sort'] = I('sort');
        $data['field_type'] = I('field_type');
        $data['config_type'] = 'site';
        $data['is_required'] = I('is_required');
        $data['add_time'] = date('Y-m-d H:i:s', time());

        //print_r($data);exit;

        if(!$field_info){
            //入库操作
            $field = M('Mail')->where(array('field' => I('field')))->find();
            if($field){
                $this->ajaxReturn(array('status' => 'error', 'info' => '该系统字段已存在'));
            }
            $result = M('Mail')->add($data);
            if($result){
                $this->ajaxReturn(array('status' => 'ok', 'info' => '系统字段添加成功,正在转跳到系统字段列表'));
            }else{
                $this->ajaxReturn(array('status' => 'error', 'info' => '系统字段添加失败'));
            }
        }else{
            //更新操作
            $result = M('Mail')->where(array('id' => $id))->save($data);
            if(false !== $result || 0 !== $result){
                $this->ajaxReturn(array('status' => 'ok', 'info' => '系统字段修改成功,正在转跳到系统字段列表'));
            }else{
                $this->ajaxReturn(array('status' => 'error', 'info' => '系统字段修改失败'));
            }
        }

    }

    //更新字段状态
    public function field_status()
    {
        $id = I('id');
        $config_info = M('Mail')->find($id);
        if(!$config_info){
            $this->ajaxReturn(array('info' => '该系统字段不存在'));
        }else{
            if($config_info['status']){
                $status = 0;
            }else{
                $status = 1;
            }
            $result = M('Mail')->where(array('id' => $id))->setField('status',$status);
            if(false != $result){
                $this->ajaxReturn(array('status' => 'ok', 'info' => '系统字段状态更新成功'));
            }else{
                $this->ajaxReturn(array('info' => '系统字段状态更新失败'));
            }
        }

    }

    //更新字段排序
    public function field_sort()
    {
        $id   = I('id');
        $sort = I('sort', 999);
        $result = M('Mail')->where(array('id' => $id))->setField('sort',$sort);
        if(false !== $result){
            $this->ajaxReturn(array('status' => 'ok', 'info' => '字段排序更新成功'));
        }else{
            $this->ajaxReturn(array('info' => '字段排序更新失败'));
        }
    }


    //删除字段
    public function field_delete()
    {
        $id = I('id');
        $config_info = M('Mail')->find($id);
        if(!$config_info){
            return array('info' => '该系统字段不存在');
        }else{
            $result = M('Mail')->delete($id);
            if($result){
                $this->ajaxReturn(array('status' => 'ok', 'info' => '系统字段状态删除成功'));
            }else if($config_info['is_system']){
                return array('info' => '系统字段不允许删除');
            }else{
                $this->ajaxReturn(array('info' => '系统字段状态删除失败'));
            }
        }
    }

}
