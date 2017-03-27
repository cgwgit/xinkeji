<?php
/**
 * Created by PhpStorm.
 * User: TDSA
 * Date: 2016/11/3
 * Time: 13:29
 */
namespace Home\Model;
use Think\Model;

class WxGetOpenIdModel extends Model {

    private $_APPID = '';
    private $_APPSECRET = '';

    public function __construct()
    {
        $this->_APPID = C('WECHAT.APPID'); //appid
        $this->_APPSECRET = C('WECHAT.APPSECRET'); //appsecret
    }

    public function getOpenId()
    {
        $url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        if (!isset($_GET['code'])) {
            $openidUrl = $this->snsapi_base($url);
            
            redirect($openidUrl);
        }else{
            $openidAccess_token = $this->openidAccess_token($_GET['code']);
            return $openidAccess_token['openid'];
        }
    }
    //获取OPEINID
    public function snsapi_base($redirect_uri, $scope = "snsapi_base", $state = 0)
    {
        $appId = $this->_APPID;
        $url = "https://open.weixin.qq.com/connect/oauth2/authorize";
        $url .= "?appid=$appId";
        $url .= "&redirect_uri=http://$redirect_uri";
        $url .= "&response_type=code";
        $url .= "&scope=$scope";
        $url .= "&state=$state#wechat_redirect";
        return $url;
    }
    /*
     * OAuth2.0鉴权
     * 网页获取Access_token
     * snsapi_base方式获取openid
     */
    public function openidAccess_token($code){
        $appId = $this->_APPID;
        $appSecret= $this->_APPSECRET;
        $url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=$appId&secret=$appSecret&code=$code&grant_type=authorization_code";
        return json_decode($this->httpGet($url),true);
    }
    protected function httpGet($url)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_TIMEOUT, 500);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_URL, $url);

        $res = curl_exec($curl);
        curl_close($curl);

        return $res;
    }
}