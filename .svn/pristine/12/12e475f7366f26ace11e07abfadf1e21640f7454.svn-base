<?php
/**
 * Created by PhpStorm.
 * User: TDSA
 * Date: 2016/11/3
 * Time: 13:29
 */
namespace WeChat\Model;
use Think\Model;

class JieShouModel extends Model {
    private $_postObj = ''; //接收信息

    public function __construct()
    {
        $postStr = file_get_contents("php://input"); //接收信息
        $this->_postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);//拆分信息
    }

    public function JieShou()
    {
        $FromUserName = (string)$this->_postObj->FromUserName;//开发者微信号
        $ToUserName = (string)$this->_postObj->ToUserName;//发送方帐号（一个OpenID）
        $CreateTime = (string)$this->_postObj->CreateTime;//消息创建时间 （整型）
        $MsgType = (string)$this->_postObj->MsgType;//消息类型
    }



}