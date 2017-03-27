<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Exception;

/**
 * use Common\Model 这块可以不需要使用，框架默认会加载里面的内容
 */
class LogisticsController extends CommonController  {
    public function add()
    {
        if($_POST){
            if(!isset($_POST['typeId']) || !$_POST['typeId']){
                return show(0,'请选择货物类别');
            }
            if(!isset($_POST['release']) || !$_POST['release']){
                return show(0,'发布人不能为空');
            }
            if(!isset($_POST['goodsName']) || !$_POST['goodsName']){
                return show(0,'货物名称不能为空');
            }
            if(!isset($_POST['loadingAddr']) || !$_POST['loadingAddr']){
                return show(0,'装货地不能为空');
            }
            if(!isset($_POST['unloadingAddr']) || !$_POST['unloadingAddr']){
                return show(0,'卸货地不能为空');
            }
            if(!isset($_POST['Price']) || !$_POST['Price']){
                return show(0,'价钱不能为空');
            }
            if(!isset($_POST['surplus']) || !$_POST['surplus']){
                return show(0,'剩余量不能为空');
            }
            if(!isset($_POST['allowProportion']) || !$_POST['allowProportion']){
                return show(0,'允亏比例不能为空');
            }
            if(!isset($_POST['lackPrice']) || !$_POST['lackPrice']){
                return show(0,'亏扣单价不能为空');
            }
            if(!isset($_POST['payWay']) || !$_POST['payWay']){
                return show(0,'请选择支付方式');
            }
            $_POST['allNo'] = $_POST['surplus'];
            if($_POST['Id']){
                return $this->save($_POST);
            }

            $LogisticsId = D('Logistics')->insert($_POST);
            if($LogisticsId){
                return show(1,'添加成功',$LogisticsId);
            }
            return show(0 ,'添加失败',$LogisticsId);
        }else{
            $this->display();
        }
    }

    public function index()
    {
        $data = array();

        $search = array();
        if(isset($_REQUEST['searchTypeId']) && $_REQUEST['searchTypeId']!=""){
            $data['typeId'] = intval($_REQUEST['searchTypeId']);
            $search['searchTypeId'] = $data['typeId'];

        }
        if(isset($_REQUEST['searchRelease']) && $_REQUEST['searchRelease']!=""){
            $data['release'] = array('LIKE','%'.$_REQUEST['searchRelease'].'%');
            $search['searchRelease'] = $_REQUEST['searchRelease'];
        }
        $this->assign('search',$search);
        //分页
        $page =  $_REQUEST['p'] ? $_REQUEST['p'] : 1;
        $pageSize =  $_REQUEST['pageSize'] ? $_REQUEST['pageSize'] : 10;
        $Logistics = D('Logistics')->getLogistics($data,$page,$pageSize);
        $LogisticsCount = D('Logistics')->getLogisticsCount($data);

        $res = new \Think\Page($LogisticsCount,$pageSize);
        $pageRes = $res->show();

        $this->assign('pageRes',$pageRes);
        $this->assign('Logistics',$Logistics);

        $this->display();
    }

    public function modify()
    {
        $LogisticsId = $_GET['id'];
        $Logistics = D('Logistics')->find($LogisticsId);
        $this->assign('Logistics',$Logistics);
        $this->display();
    }

    public function save($data)
    {
        $menuId = $data['Id'];
        unset($data['Id']);

        try{
            $id = D('Logistics')->updateMenuById($menuId,$data);
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
                $res = D('Logistics')->delById($id);
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