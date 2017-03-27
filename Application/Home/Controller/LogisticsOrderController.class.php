<?php
namespace Home\Controller;
use Think\Controller;
use Think\Exception;

/**
 * use Common\Model 这块可以不需要使用，框架默认会加载里面的内容
 */
class LogisticsOrderController extends CommonController  {

    public function indexLoad()
    {
        $data = array();
        $dsUser = session("dsUser");
        $data['userId'] = $dsUser['Id'];

        switch ($_REQUEST['type'])
        {
            case 1:
                $data['handleBusiness'] = 0;
                break;
            case 2:
                $data['handleBusiness'] = 1;
                $handle['handle']= -1;
                $handle['handle']= 0;
                $handle['_logic'] = 'or';
                $data['_complex'] = $handle;
                break;
            case 3:
                $data['handleBusiness'] = 1;
                $data['handle'] = 1;
                break;
            default:
        }

        //分页
        $page = $_REQUEST['p'] ? $_REQUEST['p'] : 1;
        $pageSize = $_REQUEST['pageSize'] ? $_REQUEST['pageSize'] : 5;

        $LogisticsOrders = D('LogisticsOrder')->getLogisticsOrders($data,$page,$pageSize);

        foreach($LogisticsOrders as $key=>$value){
            if($value['handleBusiness'] == 0){
                $LogisticsOrders[$key]['handle'] = '待处理';
            }elseif (($value['handleBusiness'] == 1 && $value['handle'] == -1) || ($value['handleBusiness'] == 1 && $value['handle'] == 0)){
                $LogisticsOrders[$key]['handle'] = '未结款';
            }elseif ($value['handleBusiness'] == 1 && $value['handle'] == 1){
                $LogisticsOrders[$key]['handle'] = '已结款';
            }else{
                $LogisticsOrders[$key]['handle'] = '状态出错';
            }

            $Logistics = D('Logistics')->find($value['logisticsId']);

            $LogisticsOrders[$key]['release'] = $Logistics['release'];
            $LogisticsOrders[$key]['goodsName'] = $Logistics['goodsName'];
            $LogisticsOrders[$key]['Price'] = $Logistics['Price'];
            $LogisticsOrders[$key]['loadingAddr'] = $Logistics['loadingAddr'];
            $LogisticsOrders[$key]['unloadingAddr'] = $Logistics['unloadingAddr'];
        }
        $LogisticsOrdersJSON = json_encode($LogisticsOrders);
        echo $LogisticsOrdersJSON;
    }

    public function index()
    {
        $this->assign('type',$_REQUEST['type']);
        $this->assign('dsMenu', 4);
        $this->display();
    }

    public function see()
    {
        $LogisticsOrderId = $_GET['id'];
        $LogisticsOrder = D('LogisticsOrder')->find($LogisticsOrderId);
        if($LogisticsOrder['handleBusiness'] == 0){
            $LogisticsOrder['handle'] = '待处理';
        }elseif (($LogisticsOrder['handleBusiness'] == 1 && $LogisticsOrder['handle'] == -1) || ($LogisticsOrder['handleBusiness'] == 1 && $LogisticsOrder['handle'] == 0)){
            $LogisticsOrder['handle'] = '未结款';
        }elseif ($LogisticsOrder['handleBusiness'] == 1 && $LogisticsOrder['handle'] == 1){
            $LogisticsOrder['handle'] = '已结款';
        }else{
            $LogisticsOrder['handle'] = '状态出错';
        }
        $this->assign('LogisticsOrders',$LogisticsOrder);
        $LogisticsOrderUser = D('User')->find($LogisticsOrder['userId']);
        $this->assign('LogisticsOrderUser',$LogisticsOrderUser);

        $LogisticsOrderLogistics = D('Logistics')->find($LogisticsOrder['logisticsId']);
        $this->assign('LogisticsOrderLogistics',$LogisticsOrderLogistics);


        $LogisticsOrderReceipt = D('LogisticsReceipt')->find($LogisticsOrder['receiptId']);

        $LogisticsOrderReceipt['lackWeight'] = $LogisticsOrder['tonnage'] - $LogisticsOrderReceipt['dischargeWeight'];//亏吨
        $LogisticsOrderReceipt['allowTonnage'] = $LogisticsOrderLogistics['allowProportion'] * $LogisticsOrder['tonnage'];//允亏吨数
        $LogisticsOrderReceipt['actualLackWeight'] = $LogisticsOrderReceipt['lackWeight'] - $LogisticsOrderReceipt['allowTonnage'];//实际亏吨
        $LogisticsOrderReceipt['allLackPrice'] = $LogisticsOrderLogistics['lackPrice'] * $LogisticsOrderReceipt['lackWeight'];//亏扣总额
        $LogisticsOrderReceipt['allPrice'] = $LogisticsOrder['tonnage'] * $LogisticsOrderLogistics['Price'];//运费总价
        $LogisticsOrderReceipt['payPrice'] = $LogisticsOrderReceipt['allPrice'] - $LogisticsOrderReceipt['allLackPrice'];//计算运费
        $LogisticsOrderReceipt['arrearsPrice'] = $LogisticsOrderReceipt['payPrice'] - $LogisticsOrderReceipt['prepaidMoney'];//欠车上



        $this->assign('LogisticsOrderReceipt',$LogisticsOrderReceipt);


        $this->assign('dsMenu', 4);
        $this->display();
    }

}