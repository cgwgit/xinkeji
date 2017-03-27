<?php
namespace Home\Controller;
use Think\Controller;
use Think\Exception;

/**
 * use Common\Model 这块可以不需要使用，框架默认会加载里面的内容
 */
class IntegralOrderController extends CommonController  {

    public function indexLoad()
    {
        $data = array();
        $dsUser = session("dsUser");
        $data['userId'] = $dsUser['Id'];

        switch ($_REQUEST['type'])
        {
            case 1:
                $data['handleState'] = 0;
                break;
            case 2:
                $data['handleState'] = -1;
                break;
            case 3:
                $data['handleState'] = 1;
                break;
            default:
        }

        //分页
        $page = $_REQUEST['p'] ? $_REQUEST['p'] : 1;
        $pageSize = $_REQUEST['pageSize'] ? $_REQUEST['pageSize'] : 5;

        $IntegralOrders = D('IntegralOrder')->getIntegralOrders($data,$page,$pageSize);

        foreach($IntegralOrders as $key=>$value){
            if($value['handleState'] == 0){
                $IntegralOrders[$key]['handleState'] = '待处理';
            }elseif ($value['handleState'] == -1){
                $IntegralOrders[$key]['handleState'] = '已发货';
            }elseif ($value['handleState'] == 1){
                $IntegralOrders[$key]['handleState'] = '已收货';
            }else{
                $IntegralOrders[$key]['handleState'] = '状态出错';
            }

            $Logistics = D('IntegralMall')->find($value['mallId']);

            $IntegralOrders[$key]['title'] = $Logistics['title'];
            $IntegralOrders[$key]['uploadImg'] = $Logistics['uploadImg'];
            $IntegralOrders[$key]['freight'] = $Logistics['freight'];
            $IntegralOrders[$key]['stock'] = $Logistics['stock'];
            $IntegralOrders[$key]['sales'] = $Logistics['sales'];
        }
        $IntegralOrdersJSON = json_encode($IntegralOrders);
        echo $IntegralOrdersJSON;
    }

    public function index()
    {
        $this->assign('type',$_REQUEST['type']);
        $this->assign('dsMenu', 4);
        $this->display();
    }

    public function see()
    {
        $IntegralOrderId = $_GET['id'];
        $IntegralOrder = D('IntegralOrder')->find($IntegralOrderId);
        if($IntegralOrder['handleState'] == 0){
            $IntegralOrder['handleState'] = '待处理';
        }elseif ($IntegralOrder['handleState'] == -1){
            $IntegralOrder['handleState'] = '已发货';
        }elseif ($IntegralOrder['handleState'] == 1){
            $IntegralOrder['handleState'] = '已收货';
        }else{
            $IntegralOrder['handleState'] = '状态出错';
        }
        $this->assign('IntegralOrders',$IntegralOrder);

        $UserDelivery = D('UserDelivery')->find($IntegralOrder['deliveryId']);
        $this->assign('UserDeliverys', $UserDelivery);
        $IntegralOrderUser = D('User')->find($IntegralOrder['userId']);
        $this->assign('IntegralOrderUser',$IntegralOrderUser);
        $IntegralOrderMall = D('IntegralMall')->find($IntegralOrder['mallId']);
        $this->assign('IntegralOrderMall',$IntegralOrderMall);
        $this->assign('dsMenu', 4);
        $this->display();
    }

}