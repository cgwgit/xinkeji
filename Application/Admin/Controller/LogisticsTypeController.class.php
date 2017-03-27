<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Exception;

/**
 * use Common\Model 这块可以不需要使用，框架默认会加载里面的内容
 */
class LogisticsTypeController extends CommonController  {
    public function add()
    {
        if($_POST){
            if(!isset($_POST['typeName']) || !$_POST['typeName']){
                return show(0,'类别名称不能为空');
            }

            if($_POST['Id']){
                return $this->save($_POST);
            }

            $LogisticsTypeId = D('LogisticsType')->insert($_POST);
            if($LogisticsTypeId){
                return show(1,'添加成功',$LogisticsTypeId);
            }
            return show(0 ,'添加失败',$LogisticsTypeId);
        }else{
            $this->display();
        }

    }

    public function index()
    {
        $data = array();
        //分页
        $page =  $_REQUEST['p'] ? $_REQUEST['p'] : 1;
        $pageSize =  $_REQUEST['pageSize'] ? $_REQUEST['pageSize'] : 10;
        $LogisticsTypes = D('LogisticsType')->getLogisticsTypes($data,$page,$pageSize);
        $LogisticsTypesCount = D('LogisticsType')->getLogisticsTypesCount($data);

        $res = new \Think\Page($LogisticsTypesCount,$pageSize);
        $pageRes = $res->show();

        $this->assign('pageRes',$pageRes);
        $this->assign('LogisticsTypes',$LogisticsTypes);

        $this->display();
    }

    public function modify()
    {
        $LogisticsTypeId = $_GET['id'];
        $LogisticsType = D('LogisticsType')->find($LogisticsTypeId);
        $this->assign('LogisticsType',$LogisticsType);
        $this->display();
    }

    public function save($data)
    {
        $menuId = $data['Id'];
        unset($data['Id']);

        try{
            $id = D('LogisticsType')->updateMenuById($menuId,$data);
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
                $res = D('LogisticsType')->delById($id);
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