<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends CommonController {
    public function index(){
        $adminUser = session('adminUser');
        switch ($adminUser['admin_type']){
            case 0:
                $adminUser['admin_type_name'] = '超级管理员';
                $adminUser['url'] = U('logistics/index');
                break;
            case 1:
                $adminUser['admin_type_name'] = '业务员';
                $adminUser['url'] = U('logisticsOrder/index');
                break;
            case 2:
                $adminUser['admin_type_name'] = '财务员';
                $adminUser['url'] = U('logisticsOrder/index');
                break;
        }

        $this->assign('adminUser',$adminUser);
        $this->display();
    }
}