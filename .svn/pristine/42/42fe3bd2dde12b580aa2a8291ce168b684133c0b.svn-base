<?php
/**
 * Created by PhpStorm.
 * User: TDSA
 * Date: 2016/11/3
 * Time: 13:29
 */
namespace WeChat\Model;
use Think\Model;

class JieRuModel extends Model {
    private $_token = ''; //令牌

    public function __construct()
    {
        $this->_token = C('WECHAT.TOKEN'); //实例令牌

    }

    public function JieRu()
    {
        if($this->checkSignature()){
            $echoStr = $_GET["echostr"];
            echo $echoStr;
            exit;
        }else{
            echo '失败';
        }
    }

    private function checkSignature()
    {
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];

        $token = $this->_token;
        $tmpArr = array($token, $timestamp, $nonce);
        sort($tmpArr, SORT_STRING);
        $tmpStr = implode($tmpArr);
        $tmpStr = sha1($tmpStr);

        if ($tmpStr == $signature) {
            return true;
        } else {
            return false;
        }
    }

}