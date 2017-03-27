<?php
/**
 * Created by PhpStorm.
 * User: TDSA
 * Date: 2016/11/3
 * Time: 13:29
 */
namespace Home\Model;
use Think\Model;

class RegisterModel extends Model {

    private $_db = '';

    public function __construct()
    {
        $this->_db = M('user');
    }
    public function getUserByDatum($field,$value)
    {
        $user_map[$field] = $value;
        $ret = $this->_db->where($user_map)->find();
        return $ret;
    }
    public function insert($data = array())
    {
        if(!$data || !is_array($data)){
            return 0;
        }
        return $this->_db->add($data);
    }
    public function save($field, $value, $data = array()){
        $user_map[$field] = $value;
        if(!$data || !is_array($data)){
            return 0;
        }
        return $this->_db->where($user_map)->save($data);
    }

    public function addIntegral($field, $value, $addField, $addNo)
    {
        $user_map[$field] = $value;
        return $this->_db->where($user_map)->setInc($addField,$addNo); // 用户的积分加3
        //$User->where('id=5')->setDec('score',5); // 用户的积分减5
    }
}