<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Exception;

/**
 * use Common\Model 这块可以不需要使用，框架默认会加载里面的内容
 */
class IntegralMallController extends CommonController  {
    public function add()
    {
        if($_POST){
            if(!isset($_POST['title']) || !$_POST['title']){
                return show(0,'标题不能为空');
            }
            if(!isset($_POST['uploadImg']) || !$_POST['uploadImg']){
                return show(0,'展示图片不能为空');
            }
            if(!isset($_POST['integral']) || !$_POST['integral']){
                return show(0,'积分不能为空');
            }
            if(!isset($_POST['stock']) || !$_POST['stock']){
                return show(0,'库存不能为空');
            }
            if(!isset($_POST['stock']) || !$_POST['stock']){
                return show(0,'库存不能为空');
            }

            if($_POST['Id']){
                return $this->save($_POST);
            }

            $IntegralMallId = D('IntegralMall')->insert($_POST);
            if($IntegralMallId){
                return show(1,'添加成功',$IntegralMallId);
            }
            return show(0 ,'添加失败',$IntegralMallId);
        }else{
            $this->display();
        }
    }

    public function index()
    {
        $data = array();

        $search = array();
        if(isset($_REQUEST['searchTitle']) && $_REQUEST['searchTitle']!=""){
            $data['title'] = array('LIKE','%'.$_REQUEST['searchTitle'].'%');
            $search['searchTitle'] = $_REQUEST['searchTitle'];
        }
        $this->assign('search',$search);
        //分页
        $page =  $_REQUEST['p'] ? $_REQUEST['p'] : 1;
        $pageSize =  $_REQUEST['pageSize'] ? $_REQUEST['pageSize'] : 10;
        $IntegralMall = D('IntegralMall')->getIntegralMall($data,$page,$pageSize);
        $IntegralMallCount = D('IntegralMall')->getIntegralMallCount($data);

        $res = new \Think\Page($IntegralMallCount,$pageSize);
        $pageRes = $res->show();

        $this->assign('pageRes',$pageRes);
        $this->assign('IntegralMalls',$IntegralMall);

        $this->display();
    }

    public function modify()
    {
        $IntegralMallId = $_GET['id'];
        $IntegralMall = D('IntegralMall')->find($IntegralMallId);
        $this->assign('IntegralMall',$IntegralMall);
        $this->display();
    }

    public function save($data)
    {
        $menuId = $data['Id'];
        unset($data['Id']);

        try{
            $id = D('IntegralMall')->updateMenuById($menuId,$data);
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
                $res = D('IntegralMall')->delById($id);
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