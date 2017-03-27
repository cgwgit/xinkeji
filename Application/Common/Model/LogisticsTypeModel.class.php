<?php
/**
 * Created by PhpStorm.
 * User: TDSA
 * Date: 2016/11/3
 * Time: 13:29
 */
namespace Common\Model;
use Think\Model;

class LogisticsTypeModel extends Model {
    private $_db = '';

    public function __construct()
    {
        $this->_db = M('logistics_type'); //实例化表
    }

    public function insert($data = array())
    {
        if(!$data || !is_array($data)){
            return 0;
        }
        return $this->_db->add($data);
    }

    public function getLogisticsTypes($data,$page,$pageSize = 10){
//        $data['status'] = array('neq',-1);
        $offset = ($page-1)*$pageSize;
        $list = $this->_db->where($data)->order('Id desc')->limit($offset,$pageSize)->select();
        return $list;
    }

    public function getLogisticsTypesCount($data = array())
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

    public function delById($id)
    {
        if(!$id || !is_numeric($id)){
            throw_exception('ID不合法');
        }
        return $this->_db->delete($id);
    }

    public function getSelectLogisticsType()
    {
        $res = $this->_db->order('Id desc')->select();
        return $res;
    }

    public function getLogisticsTypeFind($id)
    {
        $res = $this->_db->where('Id='.$id)->Find();
        return $res['typeName'];
    }

}