<?php
/**
 * Created by PhpStorm.
 * User: TDSA
 * Date: 2016/11/3
 * Time: 13:29
 */
namespace Admin\Model;
use Think\Model;

class LogisticsReceiptModel extends Model {
    private $_db = '';

    public function __construct()
    {
        $this->_db = M('logistics_receipt'); //实例化表
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

    public function findLinkageById($id,$table)
    {
        if(!$table || !$id || !is_numeric($id)){
            throw_exception('参数错误');
        }
//        return $this->M($table)->where('Id='.$id)->find();
        return $table.'<BR>'.$id;
    }

}