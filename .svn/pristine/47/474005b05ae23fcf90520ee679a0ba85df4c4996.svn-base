<?php
namespace Admin\Controller;
use Think\Controller;
class PasswordModifyController extends CommonController {
    public function index(){
        $this->display();
    }

    public function Modify()
    {
        if(!isset($_POST['passwordOld']) || !$_POST['passwordOld']){
            return show(0,'原始密码不能为空');
        }
        if(!isset($_POST['passwordNew']) || !$_POST['passwordNew']){
            return show(0,'新密码不能为空');
        }
        if(!isset($_POST['passwordNewRepeat']) || !$_POST['passwordNewRepeat']){
            return show(0,'确认密码不能为空');
        }
        $passwordOld = getMd5Password($_POST['passwordOld']);
        $passwordNew = getMd5Password($_POST['passwordNew']);
        $passwordNewRepeat = getMd5Password($_POST['passwordNewRepeat']);

        $adminUser = session('adminUser');

        $adminCenter = D('Admin')->find($adminUser['Id']);
        if($adminCenter['admin_password'] != $passwordOld){
            return show(0,'原始密码错误');
        }
        if($passwordNew != $passwordNewRepeat){
            return show(0,'新密码两次输入不一致错误');
        }
        if($adminCenter['admin_password'] == $passwordNew || $adminCenter['admin_password'] == $passwordNewRepeat){
            return show(0,'新密码不能与原始密码一样');
        }
        try{
            $data = array();
            $data['admin_password'] = $passwordNew;
            $id = D('Admin')->updateMenuById($adminUser['Id'],$data);
            if($id === false){
                return show(0,'密码修改失败');
            }
            return show(1,'密码修改成功<br>请重新登陆');
        }catch (Exception $e){
            return show(0,$e->getMessage());
        }
    }
}