<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Exception;

/**
 * use Common\Model 这块可以不需要使用，框架默认会加载里面的内容
 */
class LogisticsOrderController extends CommonController  {

    public function index()
    {
        $data = array();

        $search = array();
        if(isset($_REQUEST['handle']) && $_REQUEST['handle']!=""){
            $data['handle'] = intval($_REQUEST['handle']);
            $search['handle'] = $data['handle'];
        }
        if(isset($_REQUEST['orderNo']) && $_REQUEST['orderNo']!=""){
            $data['orderNo'] = array('LIKE','%'.$_REQUEST['orderNo'].'%');
            $search['orderNo'] = $_REQUEST['orderNo'];
        }

        $adminUser = session('adminUser');
        if($adminUser['admin_type'] == 1){
            $data['handle'] = array('NEQ',1);
        }elseif ($adminUser['admin_type'] == 2){
            $data['handle'] = array('NEQ',0);
        }

        $this->assign('search',$search);
        //分页
        $page =  $_REQUEST['p'] ? $_REQUEST['p'] : 1;
        $pageSize =  $_REQUEST['pageSize'] ? $_REQUEST['pageSize'] : 10;
        $LogisticsOrders = D('LogisticsOrder')->getLogisticsOrders($data,$page,$pageSize);
        $LogisticsOrdersCount = D('LogisticsOrder')->getLogisticsOrdersCount($data);

        $res = new \Think\Page($LogisticsOrdersCount,$pageSize);
        $pageRes = $res->show();

        $this->assign('pageRes',$pageRes);
        $this->assign('LogisticsOrders',$LogisticsOrders);

        $this->display();
    }

    public function see()
    {
        $LogisticsOrderId = $_GET['id'];
        $LogisticsOrder = D('LogisticsOrder')->find($LogisticsOrderId);
        $this->assign('LogisticsOrders',$LogisticsOrder);
        $LogisticsOrderUser = D('User')->find($LogisticsOrder['userId']);
        $this->assign('LogisticsOrderUser',$LogisticsOrderUser);
        $LogisticsOrderLogistics = D('Logistics')->find($LogisticsOrder['logisticsId']);
        $this->assign('LogisticsOrderLogistics',$LogisticsOrderLogistics);
        if($LogisticsOrder['receiptId']){
            $LogisticsOrderReceipt = D('LogisticsReceipt')->find($LogisticsOrder['receiptId']);
            $this->assign('LogisticsOrderReceipt',$LogisticsOrderReceipt);
        }

        $adminUser = session('adminUser');
        $this->assign('adminUser',$adminUser);

        $this->display();
    }

    public function handleBusiness()
    {
        $message = $_POST['message'];
        if($_POST['handleBusiness']){
            $data['handleBusiness'] = $_POST['handleBusiness'];
        }
        try{
            $id = D('LogisticsOrder')->updateMenuById($_POST['id'],$data);
            if($id){
                return show(1,$message.'成功');
            }else{
                return show(0,$message.'失败');

            }
        }catch (Exception $e){
            return show(0,$e->getMessage());
        }
    }

    public function LogisticsOrderModify()
    {
        $data = array();
        $LogisticsOrderId = $_POST['id'];
        $message = $_POST['message'];
        if($_POST['statusAudit']){
            $data['statusAudit'] = $_POST['statusAudit'];
        }
        if($_POST['reason']){
            $data['reason'] = $_POST['reason'];
        }
        if($_POST['password']){
            $data['password'] = getMd5Password($_POST['password']);
        }
        try{
            $id = D('LogisticsOrder')->updateMenuById($LogisticsOrderId,$data);
            if($id){
                return show(1,$message.'成功');
            }else{
                return show(0,$message.'失败');

            }
        }catch (Exception $e){
            return show(0,$e->getMessage());
        }
    }

    public function LogisticsOrderReceipt()
    {
        if($_POST['logisticsOrderId']){

            $LogisticsOrder = D('LogisticsOrder')->find($_POST['logisticsOrderId']);
            $LogisticsOrderReceiptId = $LogisticsOrder['receiptId'];


            $ReceiptDate = array();
            $ReceiptDate['acquiringDate'] = $_POST['acquiringDate'];//收单日期
            $ReceiptDate['dischargeData'] = $_POST['dischargeData'];//卸货日期
            $ReceiptDate['petrolCard'] = $_POST['petrolCard'];//加油卡
            if($_POST['dischargeWeight']){
                $ReceiptDate['dischargeWeight'] = $_POST['dischargeWeight'];//卸重
            }

            $ReceiptDate['prepaidMoney'] = $_POST['prepaidMoney'];//已付金额

            $OrderData = array();
            $adminUser = session('adminUser');
            if($adminUser['admin_type'] == 1){
                $OrderData['businessId'] = $adminUser['Id'];
                $OrderData['handle'] = -1;
            }elseif ($adminUser['admin_type'] == 2){
                $OrderData['financeId'] = $adminUser['Id'];
                $OrderData['handle'] = 1;
            }

            if($LogisticsOrderReceiptId != 0){
                $LogisticsReceiptId = D('LogisticsReceipt')->updateMenuById($LogisticsOrderReceiptId,$ReceiptDate);
            }else{
                $LogisticsReceiptId = D('LogisticsReceipt')->insert($ReceiptDate);
            }
            if($LogisticsReceiptId != 1 && $LogisticsReceiptId != 0){
                $OrderData['receiptId'] = $LogisticsReceiptId;
            }

            $LogisticsOrderId = D('LogisticsOrder')->updateMenuById($_POST['logisticsOrderId'],$OrderData);
            if($LogisticsReceiptId !== false && $LogisticsOrderId !== false){
                return show(1,'提交成功'.$LogisticsReceiptId);
            }else{
                return show(0,'提交失败'.$LogisticsReceiptId);
            }

        }else{
            return show(0,'订单ID不正确!');
        }

    }
}