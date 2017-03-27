<?php
/**
 * Created by PhpStorm.
 * User: TDSA
 * Date: 2016/11/3
 * Time: 13:29
 */
namespace Home\Model;
use Think\Model;

class AmerceModel extends Model {

    private $_db = '';

    public function __construct()
    {
        $this->_db = M('amerce');
    }
    public function getAmerce($data,$page,$pageSize = 10){
//        $data['status'] = array('neq',-1);
        $offset = ($page-1)*$pageSize;
        $list = $this->_db->where($data)->order('Id desc')->limit($offset,$pageSize)->select();
        return $list;
    }

    public function getAmerceCount($data = array())
    {
//        $data['status'] = array('neq',-1);
        return $this->_db->where($data)->count();
    }

    public function insert($data = array())
    {
        if(!$data || !is_array($data)){
            return 0;
        }
        return $this->_db->add($data);
    }

    public function find($id)
    {
        if(!id || !is_numeric($id)){
            return array();
        }
        return $this->_db->where('Id='.$id)->find();
    }

    public function getAmerceByDatum($field,$value)
    {
        $user_map[$field] = $value;
        $ret = $this->_db->where($user_map)->find();
        return $ret;
    }

    public function updateById($id,$data)
    {
        if(!$id || !is_numeric($id)){
            throw_exception('ID不合法');
        }
        if(!$data || !is_array($data)){
            throw_exception('更新数据不合法');
        }

        return $this->_db->where('Id='.$id)->save($data);
    }

    public function delById($id)
    {
        if(!$id || !is_numeric($id)){
            throw_exception('ID不合法');
        }
        return $this->_db->delete($id);
    }
}