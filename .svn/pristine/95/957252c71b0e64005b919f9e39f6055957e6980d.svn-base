<?php
namespace Home\Controller;
use Think\Controller;
class UserDeliveryController extends CommonController {
    public function add()
    {
        if($_POST){
            $dsUser = session("dsUser");
            $_POST['userId'] = $dsUser['Id'];
            $_POST['upDateTime'] = Date('Y-m-d H:i:s');

            if(!isset($_POST['consignee']) || !$_POST['consignee']){
                return show(0,'收货人不能为空');
            }
            if(!isset($_POST['mobileNo']) || !$_POST['mobileNo']){
                return show(0,'联系电话不能为空');
            }
            if(!isset($_POST['area']) || !$_POST['area']){
                return show(0,'所在地区不能为空');
            }
            if(!isset($_POST['address']) || !$_POST['address']){
                return show(0,'详细地址不能为空');
            }

            if($_POST['Id']){
                return $this->save($_POST);
            }

            $UserDeliveryId = D('UserDelivery')->insert($_POST);
            if($UserDeliveryId){
                return show(1,'添加成功');
            }
            return show(0 ,'添加失败');
        }else{
            $this->display();
        }
    }

    public function modify()
    {
        $UserDeliveryId = $_GET['id'];
        $UserDelivery = D('UserDelivery')->find($UserDeliveryId);
        $this->assign('UserDelivery',$UserDelivery);
        $this->display();
    }

    public function save($data)
    {
        $Id = $data['Id'];
        unset($data['Id']);

        try{
            $id = D('UserDelivery')->updateById($Id,$data);
            if($id === false){
                return show(0,'更新失败');
            }
            return show(1,'更新成功');
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
                $res = D('UserDelivery')->delById($id);
                if($res){
                    return show(1,'操作成功');
                }else{
                    return show(0,'操作失败');
                }
            }
        }catch (Exception $e){
            return show(0,$e->getMessage()."异常");
        }
        return show(0, '没有提交的数据');
    }

    public function index(){
        $data = array();

        $dsUser = session("dsUser");
        $data['userId'] = $dsUser['Id'];

        //分页
        $page =  $_REQUEST['p'] ? $_REQUEST['p'] : 1;
        $pageSize =  $_REQUEST['pageSize'] ? $_REQUEST['pageSize'] : 10;
        $UserDelivery = D('UserDelivery')->getUserDelivery($data,$page,$pageSize);
        $UserDeliveryCount = D('UserDelivery')->getUserDeliveryCount($data);

        $res = new \Think\Page($UserDeliveryCount,$pageSize);
        $pageRes = $res->show();

        $this->assign('pageRes',$pageRes);
        $this->assign('UserDeliverys',$UserDelivery);
        $this->display();
    }


}