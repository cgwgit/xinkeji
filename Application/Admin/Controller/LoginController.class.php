<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function index(){
        if(session('adminUser')){
            redirect('/dswiliu/admin.php?c=index');
        }else{
            $this->display();
        }
    }

    public function check()
    {
        $admin_login_name = $_POST['admin_login_name'];
        $admin_password = $_POST['admin_password'];
        if(!trim($admin_login_name)){
            show(0,'用户名不能为空');
        }
        if(!trim($admin_password)){
            show(0,'密码不能为空');
        }

        $ret = D('Login')->getAdminByUsername($admin_login_name);
        if(!$ret){
            return show(0, '该用户不存在');
        }
        if($ret['admin_password'] != getMd5Password($admin_password)){
            return show(0,'密码错误');
        }

        session('adminUser',$ret);
        return show(1,'登陆成功');
    }

    public function loginOut()
    {
        session('adminUser',null);
        redirect('?c=login');
    }
}