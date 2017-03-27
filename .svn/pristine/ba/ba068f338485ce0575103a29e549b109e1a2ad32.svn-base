<?php
namespace Home\Controller;
use Think\Controller;
class RegisterController extends Controller {
    public function index(){
        if(session('dsUser')){
            redirect('/dswiliu/index.php?c=User');
        }else{
            $this->display();
        }

    }

    public function check()
    {

        $mobileNo = $_POST['mobileNo'];
        $password = $_POST['password'];
        $passwordRepeat = $_POST['passwordRepeat'];
        $fullName = $_POST['fullName'];
        $plateNo = $_POST['plateNo'];
        $carType = $_POST['carType'];
        $inviteCode = $_POST['inviteCode'];
        $_POST['registerDateTime'] = Date('Y-m-d H:i:s');

        if(!trim($mobileNo)){
            return show(0,'手机号不能为空');
        }

        $retMobileNo = D('Register')->getUserByDatum('mobileNo',$mobileNo);
        if($retMobileNo){
            return show(0, '该手机号已被注册');
        }

        if(!trim($password)){
            return show(0,'密码不能为空');
        }
        if(!trim($passwordRepeat)){
            return show(0,'确认密码不能为空');
        }
        if(trim($password) != trim($passwordRepeat)){
            return show(0,'两次密码输入不一致');
        }
        if(!trim($fullName)){
            return show(0,'姓名不能为空');
        }
        if(!trim($plateNo)){
            return show(0,'车牌号不能为空');
        }
        $retPlateNo = D('Register')->getUserByDatum('plateNo',$plateNo);
        if($retPlateNo){
            return show(0, '该车牌号已被注册');
        }
        if(!trim($carType)){
            return show(0,'车型不能为空');
        }
        if(trim($inviteCode)){
            $retInviteCode = D('Register')->getUserByDatum('inviteCode',$inviteCode);
            if(!$retInviteCode){
                return show(0, '邀请码不正确');
            }
            $_POST['inviteCode'] = $retInviteCode['Id'];
            D('Register')->addIntegral('Id',$retInviteCode['Id'],'integral',20);
        }

        $_POST['password'] = getMd5Password($_POST['password']);
        $LogisticsId = D('Register')->insert($_POST);
        if($LogisticsId){
            $inviteCode_10 = str_pad(rand(1,15).str_pad($LogisticsId,5,'0',STR_PAD_LEFT),7,'0',STR_PAD_LEFT);
            $inviteCode_36 = inviteCode($inviteCode_10);
            $data['inviteCode']=$inviteCode_36;
            D('Register')->save('Id',$LogisticsId,$data);
            $ret = D('Register')->getUserByDatum('Id',$LogisticsId);
            session('dsUser',$ret);
            return show(1,'注册成功');
        }
        return show(0 ,'注册失败',$LogisticsId);

    }

    public function loginOut()
    {
        session('dsUser',null);
        redirect('?c=login');
    }
}