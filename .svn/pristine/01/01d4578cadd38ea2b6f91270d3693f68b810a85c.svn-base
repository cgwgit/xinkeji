<?php
/**
 * Created by PhpStorm.
 * User: TDSA
 * Date: 2016/11/3
 * Time: 13:29
 */
namespace Home\Model;
use Think\Model;

class LoginModel extends Model {

    private $_db = '';

    public function __construct()
    {
        $this->_db = M('user');
    }
    public function getUserByLogin($ds_login)
    {
        $user_map['mobileNo'] = $ds_login;
        $ret = $this->_db->where($user_map)->find();
        return $ret;
    }
}