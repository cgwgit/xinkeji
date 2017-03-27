<?php
namespace Home\Controller;
use Think\Controller;
/**
 * use Common\Model 这块可以不需要使用，框架默认会加载里面的内容
 */
class CommonController extends Controller {


    public function __construct() {

        parent::__construct();
        $this->_init();
    }
    /**
     * 初始化
     * @return
     */
    private function _init() {
        // 如果已经登录
        $isLogin = $this->isLogin();
        if(!$isLogin) {
            // 跳转到登录页面
            $this->redirect('/index.php?c=login');
        }
    }

    /**
     * 获取登录用户信息
     * @return array
     */
    public function getLoginUser() {
        return session("dsUser");
    }

    /**
     * 判定是否登录
     * @return boolean
     */
    public function isLogin() {
        $user = $this->getLoginUser();
        if($user && is_array($user) && $user['mobileNo']) {
            return true;
        }

        return false;
    }



}