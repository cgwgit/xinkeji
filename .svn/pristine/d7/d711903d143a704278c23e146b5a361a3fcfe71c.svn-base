<?php
/**
 * Created by PhpStorm.
 * User: TDSA
 * Date: 2016/11/3
 * Time: 13:29
 */
namespace Admin\Model;
use Think\Model;

class LoginModel extends Model {

    private $_db = '';

    public function __construct()
    {
        $this->_db = M('admin');
    }
    public function getAdminByUsername($admin_login_name)
    {
        $admin_map['admin_login_name'] = $admin_login_name;
        $ret = $this->_db->where($admin_map)->find();
        return $ret;
    }
}