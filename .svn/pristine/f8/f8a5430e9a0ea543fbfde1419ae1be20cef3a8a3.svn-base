<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Exception;

/**
 * use Common\Model 这块可以不需要使用，框架默认会加载里面的内容
 */
class IntegralOrderController extends CommonController  {

    public function index()
    {
        $data = array();

        $search = array();
        if(isset($_REQUEST['handleState']) && $_REQUEST['handleState']!=""){
            $data['handleState'] = intval($_REQUEST['handleState']);
            $search['handleState'] = $data['handleState'];
        }
        if(isset($_REQUEST['orderNo']) && $_REQUEST['orderNo']!=""){
            $data['orderNo'] = array('LIKE','%'.$_REQUEST['orderNo'].'%');
            $search['orderNo'] = $_REQUEST['orderNo'];
        }
        $this->assign('search',$search);
        //分页
        $page =  $_REQUEST['p'] ? $_REQUEST['p'] : 1;
        $pageSize =  $_REQUEST['pageSize'] ? $_REQUEST['pageSize'] : 10;
        $IntegralOrders = D('IntegralOrder')->getIntegralOrders($data,$page,$pageSize);
        $IntegralOrdersCount = D('IntegralOrder')->getIntegralOrdersCount($data);

        $res = new \Think\Page($IntegralOrdersCount,$pageSize);
        $pageRes = $res->show();

        $this->assign('pageRes',$pageRes);
        $this->assign('IntegralOrders',$IntegralOrders);

        $this->display();
    }

    public function see()
    {
        $IntegralOrderId = $_GET['id'];
        $IntegralOrder = D('IntegralOrder')->find($IntegralOrderId);
        $this->assign('IntegralOrders',$IntegralOrder);
        $IntegralOrderUser = D('User')->find($IntegralOrder['userId']);
        $this->assign('IntegralOrderUser',$IntegralOrderUser);
        $IntegralOrderIntegral = D('IntegralMall')->find($IntegralOrder['mallId']);
        $this->assign('IntegralOrderIntegral',$IntegralOrderIntegral);

        $IntegralOrderDeliveryI = D('UserDelivery')->find($IntegralOrder['deliveryId']);
        $this->assign('IntegralOrderDeliveryI',$IntegralOrderDeliveryI);
        $this->display();
    }

    public function IntegralOrderModify()
    {
        $data = array();
        $IntegralOrderId = $_POST['id'];
        $message = $_POST['message'];
        if($_POST['statusAudit']){
            $data['handleState'] = $_POST['statusAudit'];
        }
        if($_POST['reason']){
            $data['reason'] = $_POST['reason'];
        }
        try{
            $id = D('IntegralOrder')->updateMenuById($IntegralOrderId,$data);
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