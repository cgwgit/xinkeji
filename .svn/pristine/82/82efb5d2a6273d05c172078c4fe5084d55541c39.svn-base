<?php
/**
 * Created by PhpStorm.
 * User: TDSA
 * Date: 2016/11/3
 * Time: 13:29
 */
namespace WeChat\Model;
use Think\Model;

class UserModel extends Model {
    private $_db = '';

    public function __construct()
    {
        $this->_db = M('user');
    }

    public function find($openid)
    {
        if(!$openid){
            return array();
        }
        $data = array();
        $data['openid'] = $openid;

        return $this->_db->where($data)->find();
    }

    public function insert($data=array())
    {
        if(!$data || !is_array($data)){
            return 0;
        }
        return $this->_db->add($data);
    }

}