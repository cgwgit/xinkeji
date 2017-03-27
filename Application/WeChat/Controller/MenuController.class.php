<?php
namespace WeChat\Controller;
use Think\Controller;
class MenuController extends WXAccessTokenController {
    public function index()
    {
        $access_token = $this->access_token;
        $data = '{'
            .'"button":[{'
            .''
            .'"type":"view",'
            .'"name":"在线下单",'
            .'"url":"http://jq.boo-wei.com/dswiliu/"'
            .'},{'
            .'"name":"积分商城",'
            .'"sub_button":[{'
            .'"type":"view",'
            .'"name":"代缴罚款",'
            .'"url":"http://jq.boo-wei.com/dswiliu/index.php?c=amerce"'
            .'},{'
            .'"type":"view",'
            .'"name":"积分商城",'
            .'"url":"http://jq.boo-wei.com/dswiliu/index.php?c=integralMall"'
            .'}]'
            .'},{'
            .'"type":"view",'
            .'"name":"会员信息",'
            .'"url":"http://jq.boo-wei.com/dswiliu/index.php?c=login"'
            .'}]'
            .'}';
        $url = "https://api.weixin.qq.com/cgi-bin/menu/create?access_token=$access_token";
        echo $this->httpPost($url, $data);
        return json_decode($this->httpPost($url, $data));
    }

    function menuQuery()
    {
        $access_token = $this->access_token;
        $url = "https://api.weixin.qq.com/cgi-bin/menu/get?access_token=$access_token";
        echo $this->httpGet($url);
        return json_decode($this->httpGet($url));
    }
}