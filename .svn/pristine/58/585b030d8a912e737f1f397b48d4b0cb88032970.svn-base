<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Exception;

/**
 * use Common\Model 这块可以不需要使用，框架默认会加载里面的内容
 */
class AmerceController extends CommonController  {

    public function index()
    {
        $data = array();

        $search = array();
        if(isset($_REQUEST['searchFinanceHandle']) && $_REQUEST['searchFinanceHandle']!=""){
            $data['financeHandle'] = intval($_REQUEST['searchFinanceHandle']);
            $search['searchFinanceHandle'] = $data['financeHandle'];
        }
        if(isset($_REQUEST['searchAmerceNo']) && $_REQUEST['searchAmerceNo']!=""){
            $data['amerceNo'] = array('LIKE','%'.$_REQUEST['searchAmerceNo'].'%');
            $search['searchAmerceNo'] = $_REQUEST['searchAmerceNo'];
        }
        $this->assign('search',$search);
        //分页
        $page =  $_REQUEST['p'] ? $_REQUEST['p'] : 1;
        $pageSize =  $_REQUEST['pageSize'] ? $_REQUEST['pageSize'] : 10;
        $Amerces = D('Amerce')->getAmerces($data,$page,$pageSize);
        $AmercesCount = D('Amerce')->getAmercesCount($data);

        $res = new \Think\Page($AmercesCount,$pageSize);
        $pageRes = $res->show();

        $this->assign('pageRes',$pageRes);
        $this->assign('Amerces',$Amerces);

        $this->display();
    }

    public function see()
    {
        $AmerceId = $_GET['id'];
        $Amerce = D('Amerce')->find($AmerceId);
        $Amerce['allMoney'] = $Amerce['money'] + $Amerce['lateMoney'] + $Amerce['serviceMoney'];
        $this->assign('Amerces',$Amerce);
        $AmerceUser = D('User')->find($Amerce['userId']);
        $this->assign('AmerceUser',$AmerceUser);
        $AmerceLogistics = D('Logistics')->find($Amerce['logisticsId']);
        $this->assign('AmerceLogistics',$AmerceLogistics);
        $this->display();
    }

    public function AmerceModify()
    {
        $data = array();
        $AmerceId = $_POST['id'];
        $message = $_POST['message'];
        if($_POST['statusAudit']){
            $data['financeHandle'] = $_POST['statusAudit'];
        }
        if($_POST['reason']){
            $data['reason'] = $_POST['reason'];
        }
        try{
            $id = D('Amerce')->updateMenuById($AmerceId,$data);
            if($id){
                return show(1,$message.'成功');
            }else{
                return show(0,$message.'失败');

            }
        }catch (Exception $e){
            return show(0,$e->getMessage());
        }
    }
}