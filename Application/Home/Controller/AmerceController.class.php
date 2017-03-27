<?php
namespace Home\Controller;

use Think\Controller;

class AmerceController extends CommonController
{
    public function add()
    {
        if ($_POST) {
            $dsUser = session("dsUser");
            $_POST['userId'] = $dsUser['Id'];
            $_POST['submitDateTime'] = Date('Y-m-d H:i:s');

            if (!isset($_POST['money']) || !$_POST['money']) {
                return show(0, '请填写处罚金额');
            }
            if (!isset($_POST['amerceDateTime']) || !$_POST['amerceDateTime']) {
                return show(0, '请选择处罚日期');
            }
            if (!isset($_POST['amerceNo']) || !$_POST['amerceNo']) {
                return show(0, '罚单单号不能为空');
            }

            if (!isset($_POST['amerceNoRepeat']) || !$_POST['amerceNoRepeat']) {
                return show(0, '单号审核不能为空');
            }
            if (trim($_POST['amerceNo']) != trim($_POST['amerceNoRepeat'])) {
                return show(0, '两次单号输入不一致');
            }
            if (!isset($_POST['moneyAll']) || !$_POST['moneyAll']) {
                return show(0, '正确使用本程序');
            }

            if ($_POST['Id']) {
                return $this->save($_POST);
            } else {
                $retAmerceNo = D('Amerce')->getAmerceByDatum('amerceNo', $_POST['amerceNo']);
                if ($retAmerceNo) {
                    return show(0, '罚单单号已提交<br>请不要重复提交');
                }
            }


            $AmerceId = D('Amerce')->insert($_POST);
            $dsUserIntegral = D('User')->integral($dsUser['mobileNo'], 'setInc', 20);
            if ($AmerceId && $dsUserIntegral) {

                return show(1, '下单成功，请付款', '&Id='.$AmerceId);
            }
            return show(0, '下单失败', $AmerceId);
        } else {
            $this->display();
        }
    }

    public function orderLoad()
    {
        $data = array();
        $dsUser = session("dsUser");
        $data['userId'] = $dsUser['Id'];

        switch ($_REQUEST['type']) {
            case 1:
                $data['financeHandle'] = 0;
                break;
            case 2:
                $data['financeHandle'] = -1;
                break;
            case 3:
                $data['financeHandle'] = 1;
                break;
            default:
        }

        //分页
        $page = $_REQUEST['p'] ? $_REQUEST['p'] : 1;
        $pageSize = $_REQUEST['pageSize'] ? $_REQUEST['pageSize'] : 5;

        $Amerce = D('Amerce')->getAmerce($data, $page, $pageSize);

        foreach ($Amerce as $key => $value) {
            if (!$value['financeHandle']) {
                $Amerce[$key]['status'] = '未处理';
            } elseif ($value['financeHandle'] == -1) {
                $Amerce[$key]['status'] = '已退回';
            } elseif ($value['financeHandle'] == 1) {
                $Amerce[$key]['status'] = '已处理';
            } else {
                $Amerce[$key]['status'] = '状态出错';
            }
        }
        $AmerceJSON = json_encode($Amerce);
        echo $AmerceJSON;
    }

    public function order()
    {
        $this->assign('type', $_REQUEST['type']);
        $this->assign('dsMenu', 4);
        $this->display();
    }

    public function orderSee()
    {
        $AmerceId = $_GET['id'];
        $Amerce = D('Amerce')->find($AmerceId);
        $this->assign('Amerces', $Amerce);
        $AmerceUser = D('User')->find($Amerce['userId']);
        $this->assign('AmerceUser', $AmerceUser);
        $AmerceLogistics = D('Logistics')->find($Amerce['logisticsId']);
        $this->assign('AmerceLogistics', $AmerceLogistics);
        $this->assign('dsMenu', 4);
        $this->display();
    }

    public function modify()
    {
        $AmerceId = $_GET['id'];
        $Amerce = D('Amerce')->find($AmerceId);
        $this->assign('Amerce', $Amerce);
        $this->display();
    }

    public function save($data)
    {
        $Id = $data['Id'];
        unset($data['Id']);

        try {
            $id = D('Amerce')->updateById($Id, $data);
            if ($id === false) {
                return show(0, '修改失败');
            }
            return show(1, '修改成功');
        } catch (Exception $e) {
            return show(0, $e->getMessage());
        }
    }

    public function del()
    {
        try {
            if ($_POST) {
                $id = $_POST['id'];
                //执行数据操作
                $res = D('Amerce')->delById($id);
                if ($res) {
                    return show(1, '操作成功' . $res);
                } else {
                    return show(0, '操作失败' . $res);
                }
            }
        } catch (Exception $e) {
            return show(0, $e->getMessage() . "异常");
        }
        return show(0, '没有提交的数据');
    }

    public function index()
    {
        $openid = D('WxGetOpenId')->getOpenId();
        session('openid',$openid);
        $this->display();
    }


}