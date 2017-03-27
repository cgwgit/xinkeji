<?php
namespace Home\Controller;

use Think\Controller;

class UserController extends CommonController
{
    public function index()
    {
        $dsUser = session("dsUser");
        $userCenter = D('Login')->getUserByLogin($dsUser['mobileNo']);
        $this->assign('userCenter', $userCenter);
        $this->assign('dsMenu', 4);
        $this->display();
    }

    public function datum()
    {
        $dsUser = session("dsUser");
        $userCenter = D('Login')->getUserByLogin($dsUser['mobileNo']);
        $this->assign('userCenter', $userCenter);
        $this->assign('dsMenu', 4);
        $this->display();
    }

    public function register($formPost)
    {
        if ($formPost['registerType'] == 'port') {
            if (!isset($formPost['portNo']) || !$formPost['portNo']) {
                return show(0, '请填写港口账号');
            }
            if (!isset($formPost['portPassword']) || !$formPost['portPassword']) {
                return show(0, '请填写港口密码');
            }
        } elseif ($formPost['registerType'] == 'bank') {
            if (!isset($formPost['bankCard']) || !$formPost['bankCard']) {
                return show(0, '请填写银行卡号');
            }
            if (!isset($formPost['bankName']) || !$formPost['bankName']) {
                return show(0, '请填写银行卡户名');
            }
            if (!isset($formPost['bankOpen']) || !$formPost['bankOpen']) {
                return show(0, '请填写银行卡开户行');
            }
        } elseif ($formPost['registerType'] == 'fullName') {
            if (!isset($formPost['fullName']) || !$formPost['fullName']) {
                return show(0, '请填写姓名');
            }
        } elseif ($formPost['registerType'] == 'carType') {
            if (!isset($formPost['carType']) || !$formPost['carType']) {
                return show(0, '请填写车型');
            }
        } else {
            return show(0, '操作错误');
        }

        try {
            $dsUser = session("dsUser");
            $id = D('User')->updateUserByMobileNo($dsUser['mobileNo'], $formPost);
            if ($id === false) {
                return show(0, '更新失败');
            }
            return show(1, '更新成功');
        } catch (Exception $e) {
            return show(0, $e->getMessage());
        }
    }

    public function passwordModify()
    {
        if ($_POST) {
            if (!isset($_POST['passwordOld']) || !$_POST['passwordOld']) {
                return show(0, '原始密码不能为空');
            }
            if (!isset($_POST['passwordNew']) || !$_POST['passwordNew']) {
                return show(0, '新密码不能为空');
            }
            if (!isset($_POST['passwordNewRepeat']) || !$_POST['passwordNewRepeat']) {
                return show(0, '确认密码不能为空');
            }
            $passwordOld = getMd5Password($_POST['passwordOld']);
            $passwordNew = getMd5Password($_POST['passwordNew']);
            $passwordNewRepeat = getMd5Password($_POST['passwordNewRepeat']);
            $dsUser = session("dsUser");
            $userCenter = D('Login')->getUserByLogin($dsUser['mobileNo']);
            if ($userCenter['password'] != $passwordOld) {
                return show(0, '原始密码错误');
            }
            if ($passwordNew != $passwordNewRepeat) {
                return show(0, '新密码两次输入不一致错误');
            }
            if ($userCenter['password'] == $passwordNew || $userCenter['password'] == $passwordNewRepeat) {
                return show(0, '新密码不能与原始密码一样');
            }
            try {
                $data = array();
                $data['password'] = $passwordNew;
                $id = D('User')->updateUserByMobileNo($dsUser['mobileNo'], $data);
                if ($id === false) {
                    return show(0, '密码修改失败');
                }
                return show(1, '密码修改成功<br>请重新登陆');
            } catch (Exception $e) {
                return show(0, $e->getMessage());
            }

        } else {
            $this->display();
        }

    }

    public function registerBank()
    {
        if ($_POST) {
            $this->register($_POST);
        } else {
            $dsUser = session("dsUser");
            $UserMobileNo = D('User')->find($dsUser['mobileNo']);
            $this->assign('UserMobileNo', $UserMobileNo);
            $this->display();
        }

    }

    public function registerPort()
    {
        if ($_POST) {
            $this->register($_POST);
        } else {
            $dsUser = session("dsUser");
            $UserMobileNo = D('User')->find($dsUser['mobileNo']);
            $this->assign('UserMobileNo', $UserMobileNo);
            $this->display();
        }
    }

    public function fullName()
    {
        if ($_POST) {
            $this->register($_POST);
        } else {
            $dsUser = session("dsUser");
            $UserMobileNo = D('User')->find($dsUser['mobileNo']);
            $this->assign('UserMobileNo', $UserMobileNo);
            $this->display();
        }
    }

    public function carType()
    {
        if ($_POST) {
            $this->register($_POST);
        } else {
            $dsUser = session("dsUser");
            $UserMobileNo = D('User')->find($dsUser['mobileNo']);
            $this->assign('UserMobileNo', $UserMobileNo);
            $this->display();
        }
    }

    public function loginOut()
    {
        session('dsUser', null);
        redirect('?c=login');
    }
}