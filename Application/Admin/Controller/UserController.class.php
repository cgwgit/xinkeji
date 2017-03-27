<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Exception;

/**
 * use Common\Model 这块可以不需要使用，框架默认会加载里面的内容
 */
class UserController extends CommonController  {

    public function index()
    {
        $data = array();

        $search = array();
        if(isset($_REQUEST['searchStatusAudit']) && $_REQUEST['searchStatusAudit']!=""){
            $data['statusAudit'] = intval($_REQUEST['searchStatusAudit']);
            $search['searchStatusAudit'] = $data['statusAudit'];
        }
        if(isset($_REQUEST['searchMobileNo']) && $_REQUEST['searchMobileNo']!=""){
            $data['mobileNo'] = array('LIKE','%'.$_REQUEST['searchMobileNo'].'%');
            $search['searchMobileNo'] = $_REQUEST['searchMobileNo'];
        }

        if(isset($_REQUEST['searchPlateNo']) && $_REQUEST['searchPlateNo']!=""){
            $data['plateNo'] = array('LIKE','%'.$_REQUEST['searchPlateNo'].'%');
            $search['searchPlateNo'] = $_REQUEST['searchPlateNo'];
        }
        if(isset($_REQUEST['searchFullName']) && $_REQUEST['searchFullName']!=""){
            $data['fullName'] = array('LIKE','%'.$_REQUEST['searchFullName'].'%');
            $search['searchFullName'] = $_REQUEST['searchFullName'];
        }
        $this->assign('search',$search);
        //分页
        $page =  $_REQUEST['p'] ? $_REQUEST['p'] : 1;
        $pageSize =  $_REQUEST['pageSize'] ? $_REQUEST['pageSize'] : 10;
        $Users = D('User')->getUsers($data,$page,$pageSize);
        $UsersCount = D('User')->getUsersCount($data);

        $res = new \Think\Page($UsersCount,$pageSize);
        $pageRes = $res->show();

        $this->assign('pageRes',$pageRes);
        $this->assign('Users',$Users);

        $this->display();
    }

    public function see()
    {
        $UserId = $_GET['id'];
        $User = D('User')->find($UserId);
        $this->assign('Users',$User);

        $data = array();
        $data['userId'] = $UserId;
        //分页
        $page =  $_REQUEST['p'] ? $_REQUEST['p'] : 1;
        $pageSize =  $_REQUEST['pageSize'] ? $_REQUEST['pageSize'] : 10;

        $LogisticsOrders = D('LogisticsOrder')->getLogisticsOrders($data,$page,$pageSize);
        $this->assign('LogisticsOrders',$LogisticsOrders);

        $Amerces = D('Amerce')->getAmerces($data,$page,$pageSize);
        $this->assign('Amerces',$Amerces);

        $IntegralOrders = D('IntegralOrder')->getIntegralOrders($data,$page,$pageSize);
        $this->assign('IntegralOrders',$IntegralOrders);

        $this->display();
    }

    public function userModify()
    {
        $data = array();
        $UserId = $_POST['id'];
        $message = $_POST['message'];
        if($_POST['statusAudit']){
            $data['statusAudit'] = $_POST['statusAudit'];
        }
        if($_POST['reason']){
            $data['reason'] = $_POST['reason'];
        }
        if($_POST['integral']){
            $data['integral'] = $_POST['integral'];
        }
        if($_POST['password']){
            $data['password'] = getMd5Password($_POST['password']);
        }
        try{
            if($_POST['integral']){
                $id = D('User')->integral($UserId, 'setInc', $_POST['integral']);
            }else{
                $id = D('User')->updateMenuById($UserId,$data);
            }

            if($id){
                return show(1,$message.'成功');
            }else{
                return show(0,$message.'失败');

            }
        }catch (Exception $e){
            return show(0,$e->getMessage());
        }
    }

    public function passwordReset()
    {
        
    }
}