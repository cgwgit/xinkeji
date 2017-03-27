<?php
namespace Home\Controller;

use Think\Controller;


/**
 * use Common\Model 这块可以不需要使用，框架默认会加载里面的内容
 */
class IndexController extends Controller
{
    public function indexLoad()
    {
        $data = array();
        if ($_GET['typeId'] && is_numeric($_GET['typeId'])) {
            $data['typeId']= $_GET['typeId'];
        }
        if ($_GET['title']) {
            $title['release']= array('LIKE','%'.$_GET['title'].'%');
            $title['loadingAddr']= array('LIKE','%'.$_GET['title'].'%');
            $title['unloadingAddr']= array('LIKE','%'.$_GET['title'].'%');
            $title['_logic'] = 'or';
            $data['_complex'] = $title;
        }
        //分页
        $page = $_REQUEST['p'] ? $_REQUEST['p'] : 1;
        $pageSize = $_REQUEST['pageSize'] ? $_REQUEST['pageSize'] : 5;

        $Logistics = D('Logistics')->getLogistics($data, $page, $pageSize);

        $dsUser = session("dsUser");
        foreach($Logistics as $key=>$value){
            if($dsUser && is_array($dsUser) && $dsUser['mobileNo']) {
                $userCenter = D('Login')->getUserByLogin($dsUser['mobileNo']);
                if($value['surplus'] > $userCenter['tonnage']){
                    $Logistics[$key]['tonnage'] = $userCenter['tonnage'];
                }else{
                    $Logistics[$key]['tonnage'] = $value['surplus'];
                }
            }else{
                $Logistics[$key]['tonnage'] = 0;
            }
            switch ($value['payWay']){
                case 1:
                    $Logistics[$key]['payWay'] = '货到付款';
                    break;
                case 2:
                    $Logistics[$key]['payWay'] = '发货付款';
                    break;
                case 3:
                    $Logistics[$key]['payWay'] = '发货定金-货到结款';
                    break;
				case 4:
                    $Logistics[$key]['payWay'] = '回单结算';
                    break;	
                default:
                    $Logistics[$key]['payWay'] = '数据出错';

            }
        }

        $LogisticsJSON = json_encode($Logistics);
        echo $LogisticsJSON;
    }

    public function index()
    {
        $search = array();
        $this->assign('dsMenu', 1);
        if ($_GET['typeId'] && is_numeric($_GET['typeId'])) {
            $typeId = $_GET['typeId'];
            $search['typeId'] = $typeId;
            $LogisticsTypes = D('LogisticsType')->find($typeId);
            $search['typeName'] = $LogisticsTypes['typeName'];
            $this->assign('dsMenu', 2);
        }
        if ($_GET['title']) {
            $title = $_GET['title'];
            $search['title'] = $title;
        }
        $this->assign('search', $search);
        $this->display();
    }

    public function logisticsOrder()
    {
        $dsUser = session("dsUser");
        if ($dsUser && is_array($dsUser) && $dsUser['Id']) {

            $registerUser = D('Login')->getUserByLogin($dsUser['mobileNo']);
            if(!$registerUser['portNo'] || !$registerUser['portPassword']){
                return show(0, '请完善港口信息', '/dswiliu/index.php?c=User&a=registerPort');
            }
            if(!$registerUser['bankCard'] || !$registerUser['bankName'] || !$registerUser['bankOpen']){
                return show(0, '请完善银行信息', '/dswiliu/index.php?c=User&a=registerBank');
            }

            $dataCount['userId'] = $data['userId'] = $dsUser['Id'];
            $dataCount['handle'] = 0;

            if(is_numeric($_POST['tonnage'])){
                $dataUser['tonnage'] = $data['tonnage'] = $_POST['tonnage'];
            }else{
                return show(0, '请输入数字', '/dswiliu/index.php');
            }

            $count = D('LogisticsOrder')->getLogisticsOrderCount($dataCount);
            if ($count) {
                return show(0, '还有订单待处理', '/dswiliu/index.php?c=logisticsOrder&type=1');
            }


            $data['logisticsId'] = $_POST['id'];
            $data['shippingDate'] = Date('Y-m-d H:i:s');
            $data['orderNo'] = order_number();

            $surplus = D('Logistics')->surplus($data['logisticsId'],$data['tonnage']);
            $id = D('LogisticsOrder')->insert($data);
            $idUser = D('User')->updateUserByMobileNo($dsUser['mobileNo'],$dataUser);
            $dsUserIntegral = D('User')->integral($dsUser['mobileNo'], 'setInc', 20);
            if ($id === false || $idUser === false || $surplus === false || $dsUserIntegral === false) {
                return show(0, '下单失败', '/dswiliu/index.php');
            }
            return show(1, '下单成功', '/dswiliu/index.php?c=logisticsOrder&type=1');
        } else {
            return show(0, '请登陆后下单', '/dswiliu/index.php?c=login');
        }


    }
}