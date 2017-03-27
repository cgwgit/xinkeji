<?php
/**
 * Created by PhpStorm.
 * User: TDSA
 * Date: 2016/11/3
 * Time: 13:29
 */
namespace Home\Model;
use Think\Model;

class UserModel extends Model {

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

    public function updateUserByMobileNo($mobileNo,$data)
    {
        if(!$mobileNo || !is_numeric($mobileNo)){
            throw_exception('mobileNo不合法');
        }
        if(!$data || !is_array($data)){
            throw_exception('更新数据不合法');
        }

        return $this->_db->where('mobileNo=\''.$mobileNo.'\'')->save($data);
    }
    public function find($mobileNo)
    {
        if(!$mobileNo || !is_numeric($mobileNo)){
            return array();
        }
        return $this->_db->where('mobileNo=\''.$mobileNo.'\'')->find();
    }
    //积分处理
    public function integral($mobileNo,$operation,$integral){
        if(!$integral || !is_numeric($integral)){
            throw_exception('积分不合法');
        }
        if(!$mobileNo){
            throw_exception('手机号不合法');
        }
        if($operation == 'setInc'){
            //增加积分
            return $this->_db->where('mobileNo=\''.$mobileNo.'\'')->setInc('integral',$integral);
        }elseif($operation == 'setDec'){
            //减少积分
            return $this->_db->where('mobileNo=\''.$mobileNo.'\'')->setDec('integral',$integral);
        }
    }
}