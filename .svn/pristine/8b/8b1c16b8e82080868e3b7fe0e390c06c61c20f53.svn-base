<?php
/**
 * Created by PhpStorm.
 * User: TDSA
 * Date: 2016/11/3
 * Time: 13:29
 */
namespace Home\Model;
use Think\Model;

class LogisticsModel extends Model {
    private $_db = '';

    public function __construct()
    {
        $this->_db = M('logistics'); //实例化表
    }

    public function insert($data = array())
    {
        if(!$data || !is_array($data)){
            return 0;
        }
        return $this->_db->add($data);
    }

    public function getLogistics($data,$page,$pageSize = 10){
        $offset = ($page-1)*$pageSize;

        $data['surplus'] = array('neq',0);
        $order['releaseDateTime']='DESC';
        $order['Id']='DESC';
        $list = $this->_db->where($data)->order($order)->limit($offset,$pageSize)->select();
        return $list;
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

    //剩余量处理
    public function surplus($Id,$surplus){
        if(!$surplus || !is_numeric($surplus)){
            throw_exception('剩余量不合法');
        }
        if(!$Id || !is_numeric($Id)){
            throw_exception('ID不合法');
        }
        return $this->_db->where('Id=\''.$Id.'\'')->setDec('surplus',$surplus);

    }

}