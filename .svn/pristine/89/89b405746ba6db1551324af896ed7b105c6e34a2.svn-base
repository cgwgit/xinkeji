<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function index(){
        if(session('dsUser')){
            redirect('/dswiliu/index.php?c=User');
        }else{
            $this->display();
        }

    }

    public function check()
    {
        $ds_login = $_POST['ds_login'];
        $ds_password = $_POST['ds_password'];
        if(!trim($ds_login)){
            show(0,'用户名不能为空');
        }
        if(!trim($ds_password)){
            show(0,'密码不能为空');
        }

        $ret = D('Login')->getUserByLogin($ds_login);
        if(!$ret){
            return show(0, '该用户不存在');
        }

        if($ret['password'] != getMd5Password($ds_password)){
            return show(0,'密码错误');
        }
        session(array('name'=>'dsUser','expire'=>3600 * 24 * 2));
        session('dsUser',$ret);
        return show(1,'登陆成功');
    }

    public function loginOut()
    {
        session('dsUser',null);
        redirect('?c=index');
    }
}