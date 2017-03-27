<?php
/**
 * Created by PhpStorm.
 * User: TDSA
 * Date: 2016/11/3
 * Time: 13:29
 */
namespace Admin\Model;
use Think\Model;

class UserModel extends Model {
    private $_db = '';

    public function __construct()
    {
        $this->_db = M('user'); //实例化表
    }

    public function getUsers($data,$page,$pageSize = 10){
//        $data['status'] = array('neq',-1);
        $offset = ($page-1)*$pageSize;
        $list = $this->_db->where($data)->order('Id desc')->limit($offset,$pageSize)->select();
        return $list;
    }

    public function getUsersCount($data = array())
    {
//        $data['status'] = array('neq',-1);
        return $this->_db->where($data)->count();
    }

    public function find($id)
    {
        if(!id || !is_numeric($id)){
            return array();
        }
        return $this->_db->where('Id='.$id)->find();
    }

    public function updateMenuById($id,$data)
    {
        if(!$id || !is_numeric($id)){
            throw_exception('ID不合法');
        }
        if(!$data || !is_array($data)){
            throw_exception('更新数据不合法');
        }

        return $this->_db->where('Id='.$id)->save($data);
    }

    //积分处理
    public function integral($Id,$operation,$integral){
        if(!$integral || !is_numeric($integral)){
            throw_exception('积分不合法');
        }
        if(!$Id){
            throw_exception('手机号不合法');
        }
        if($operation == 'setInc'){
            //增加积分
            return $this->_db->where('Id=\''.$Id.'\'')->setInc('integral',$integral);
        }elseif($operation == 'setDec'){
            //减少积分
            return $this->_db->where('Id=\''.$Id.'\'')->setDec('integral',$integral);
        }
    }

}