<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Exception;

/**
 * use Common\Model 这块可以不需要使用，框架默认会加载里面的内容
 */
class AdminController extends CommonController  {
    public function add()
    {
        if($_POST){
            if(!isset($_POST['admin_name']) || !$_POST['admin_name']){
                return show(0,'员工姓名不能为空');
            }
            if(!isset($_POST['admin_type']) || !$_POST['admin_type']){
                return show(0,'请选择员工类别');
            }
            if(!isset($_POST['admin_login_name']) || !$_POST['admin_login_name']){
                return show(0,'员工账号不能为空');
            }
            if(!isset($_POST['admin_password']) || !$_POST['admin_password']){
                return show(0,'员工密码不能为空');
            }else{
                $_POST['admin_password'] = getMd5Password($_POST['admin_password']);
            }

            if($_POST['Id']){
                return $this->save($_POST);
            }

            $AdminId = D('Admin')->insert($_POST);
            if($AdminId){
                return show(1,'添加成功',$AdminId);
            }
            return show(0 ,'添加失败',$AdminId);
        }else{
            $this->display();
        }

    }

    public function index()
    {
        $data = array();


        $search = array();

        if(isset($_REQUEST['admin_type']) && $_REQUEST['admin_type']!=""){
            $data['admin_type'] = intval($_REQUEST['admin_type']);
            $search['admin_type'] = $data['admin_type'];

        }
        if(isset($_REQUEST['status']) && $_REQUEST['status']!=""){
            $data['status'] = intval($_REQUEST['status']);
            $search['status'] = $data['status'];
        }else{
            $data['status'] = array('neq',-1);
        }
        if(isset($_REQUEST['admin_name']) && $_REQUEST['admin_name']!=""){
            $data['admin_name'] = array('LIKE','%'.$_REQUEST['admin_name'].'%');
            $search['admin_name'] = $_REQUEST['admin_name'];
        }
        if(isset($_REQUEST['admin_login_name']) && $_REQUEST['admin_login_name']!=""){
            $data['admin_login_name'] = array('LIKE','%'.$_REQUEST['admin_login_name'].'%');
            $search['admin_login_name'] = $_REQUEST['admin_login_name'];
        }
        $this->assign('search',$search);
        //分页
        $page =  $_REQUEST['p'] ? $_REQUEST['p'] : 1;
        $pageSize =  $_REQUEST['pageSize'] ? $_REQUEST['pageSize'] : 10;
        $Admins = D('Admin')->getAdmins($data,$page,$pageSize);

        foreach($Admins as $key=>$value){
            switch ($value['admin_type']){
                case 0:
                    $Admins[$key]['admin_type'] = '超级管理员';
                    break;
                case 1:
                    $Admins[$key]['admin_type'] = '业务员';
                    break;
                case 2:
                    $Admins[$key]['admin_type'] = '财务员';
                    break;
                default:
                    $Admins[$key]['admin_type'] = '数据出错';

            }
        }

        $AdminsCount = D('Admin')->getAdminsCount($data);

        $res = new \Think\Page($AdminsCount,$pageSize);
        $pageRes = $res->show();

        $this->assign('pageRes',$pageRes);
        $this->assign('Admins',$Admins);

        $this->display();
    }

    public function see()
    {
        $AdminId = $_GET['id'];
        $Admin = D('Admin')->find($AdminId);

        switch ($Admin['admin_type']){
            case 0:
                $Admin['admin_type'] = '超级管理员';
                break;
            case 1:
                $Admin['admin_type'] = '业务员';
                break;
            case 2:
                $Admin['admin_type'] = '财务员';
                break;
            default:
                $Admin['admin_type'] = '数据出错';

        }

        $this->assign('Admin',$Admin);
        $this->display();
    }

    public function adminModify()
    {
        $data = array();
        $UserId = $_POST['id'];
        $message = $_POST['message'];
        if($_POST['statusAudit']){
            $data['status'] = $_POST['statusAudit'];
        }
        if($_POST['reason']){
            $data['reason'] = $_POST['reason'];
        }
        if($_POST['password']){
            $data['admin_password'] = getMd5Password($_POST['password']);
        }
        try{
            $id = D('Admin')->updateMenuById($UserId,$data);
            if($id){
                return show(1,$message.'成功');
            }else{
                return show(0,$message.'失败');

            }
        }catch (Exception $e){
            return show(0,$e->getMessage());
        }
    }

    public function del()
    {
        try{
            if($_POST){
                $id = $_POST['id'];
                //执行数据操作
                $res = D('Admin')->delById($id);
                if($res){
                    return show(1,'操作成功'.$res);
                }else{
                    return show(0,'操作失败'.$res);
                }
            }
        }catch (Exception $e){
            return show(0,$e->getMessage()."异常");
        }
        return show(0, '没有提交的数据');
    }
}