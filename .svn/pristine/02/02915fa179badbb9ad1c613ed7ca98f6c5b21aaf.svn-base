<?php
namespace Home\Controller;

use Think\Controller;

/**
 * use Common\Model 这块可以不需要使用，框架默认会加载里面的内容
 */
class IntegralMallController extends Controller
{
    public function indexLoad()
    {
        $data = array();
        //分页
        $page = $_REQUEST['p'] ? $_REQUEST['p'] : 1;
        $pageSize = $_REQUEST['pageSize'] ? $_REQUEST['pageSize'] : 5;

        $IntegralMall = D('IntegralMall')->getIntegralMall($data, $page, $pageSize);

        foreach ($IntegralMall as $key => $value) {
            $IntegralMall[$key]['surplus'] = $value['stock'] - $value['sales'];
        }
        $IntegralMallJSON = json_encode($IntegralMall);
        echo $IntegralMallJSON;
    }

    public function index()
    {
        $this->assign('dsMenu', 3);
        $this->display();
    }

    public function see()
    {
        $id = $_GET['id'];
        $IntegralMall = D('IntegralMall')->find($id);
        $IntegralMall['surplus'] = $IntegralMall['stock'] - $IntegralMall['sales'];
        $this->assign('IntegralMall', $IntegralMall);
        $this->display();
    }

    public function judge()
    {
        $dsUser = session("dsUser");
        if ($dsUser && is_array($dsUser) && $dsUser['mobileNo']) {
            $data['userId'] = $dsUser['Id'];
                $id = $_POST['id'];
                return show(1, '', '/dswiliu/index.php?c=IntegralMall&a=shoppingCart&id=' . $id);
        } else {
            return show(0, '请登陆会员', '/dswiliu/index.php?c=login');
        }
    }

    public function shoppingCart()
    {
        $dsUser = session("dsUser");
        $this->assign('DsUser', $dsUser);
        $data['userId'] = $dsUser['Id'];
        $id = $_GET['id'];
        $IntegralMall = D('IntegralMall')->find($id);
        $IntegralMall['surplus'] = $IntegralMall['stock'] - $IntegralMall['sales'];
        $this->assign('IntegralMall', $IntegralMall);
        $UserDelivery = D('UserDelivery')->getUserDelivery($data);
        $this->assign('UserDeliverys', $UserDelivery);
        $this->display();
    }

    public function exchange()
    {

        $dsUser = session("dsUser");
        $id = $_POST['id'];
        $deliveryId = $_POST['deliveryId'];
        $IntegralMall = D('IntegralMall')->find($id);
        $IntegralMallIntegral = $IntegralMall['integral'];

        $dsUserFind = D('User')->find($dsUser['mobileNo']);
        $UserIntegral = $dsUserFind['integral'];
        if ($UserIntegral < $IntegralMallIntegral) {
            return show(0, '积分不足，无法兑换<br>当前积分' . $UserIntegral);
        } else {
            $data = array();
            $data['orderNo'] = order_number();
            $data['userId'] = $dsUserFind['Id'];
            $data['deliveryId'] = $deliveryId;
            $data['mallId'] = $id;
            $data['integral'] = $IntegralMallIntegral;
            $data['updateTime'] = Date('Y-m-d H:i:s');
            $UserDeliveryId = D('IntegralOrder')->insert($data);

            $dsUserFind = D('User')->integral($dsUser['mobileNo'], 'setDec', $IntegralMallIntegral);

            if ($dsUserFind && $UserDeliveryId) {
                return show(1, '兑换成功', '/dswiliu/index.php?c=integralMall');
            }
            return show(0, '兑换失败');

        }
    }

    public function find($id)
    {
        if (!id || !is_numeric($id)) {
            return array();
        }
        return $this->_db->where('Id=' . $id)->find();
    }

}