<?php
/**
 * Created by PhpStorm.
 * User: TDSA
 * Date: 2016/11/3
 * Time: 13:29
 */
namespace WeChat\Model;
use Think\Model;

class OpenIdModel extends Model {
    private $_token = ''; //令牌

    protected $_appId; //$appId
    protected $_appSecret; //$appSecret
    protected $_access_token; //$access_token

    public function __construct()
    {
        $this->_appId = C('WECHAT.APPID');
        $this->_appSecret = C('WECHAT.APPSECRET');

        // access_token 应该全局存储与更新，以下代码以写入到文件中做示例
        $json_file = dirname(__HOME__).'/access_token.json';
        $data = json_decode(file_get_contents($json_file));
        if ($data->expire_time < time()) {
            // 如果是企业号用以下URL获取access_token
            // $url = "https://qyapi.weixin.qq.com/cgi-bin/gettoken?corpid=$this->_appId&corpsecret=$this->_appSecret";
            $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=$this->_appId&secret=$this->_appSecret";
            $res = json_decode($this->httpGet($url));
            $access_token = $res->access_token;
            if ($access_token) {
                $data->expire_time = time() + 7000;
                $data->access_token = $access_token;
                $fp = fopen($json_file, "w");
                fwrite($fp, json_encode($data));
                fclose($fp);
            }
            print_r($data);
        } else {
            $access_token = $data->access_token;
        }
        $this->_access_token = $access_token;
    }

    public function snsapi_base($redirect_uri, $scope = "snsapi_base", $state = 0)
    {
        $appId = $this->_appId;
        $url = "https://open.weixin.qq.com/connect/oauth2/authorize";
        $url .= "?appid=$appId";
        $url .= "&redirect_uri=http://$redirect_uri";
        $url .= "&response_type=code";
        $url .= "&scope=$scope";
        $url .= "&state=$state#wechat_redirect";
        return $url;
    }

    /*
     * 根据$openid获取用户信息
     */
    public function openidUnionID($openid){
        $access_token = $this->_access_token;
        $url = "https://api.weixin.qq.com/cgi-bin/user/info?access_token=$access_token&openid=$openid&lang=zh_CN";
        return json_decode($this->httpGet($url),true);
    }
    /*
     * OAuth2.0鉴权
     * 网页获取Access_token
     * snsapi_base方式获取openid
     */
    public function openidAccess_token($code){
        $appId = $this->_appId;
        $appSecret= $this->_appSecret;
        $url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=$appId&secret=$appSecret&code=$code&grant_type=authorization_code";
        return json_decode($this->httpGet($url),true);
    }
    /*
     * OAuth2.0鉴权
     * 根据网页$access_token,$openid
     * snsapi_userinfo方式授权获取详细信息
     */
    public function snsapi_userinfo($access_token,$openid){
        $url = "https://api.weixin.qq.com/sns/userinfo?access_token=$access_token&openid=$openid&lang=zh_CN";
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

    protected function httpPost($url,$data)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)');
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($curl, CURLOPT_AUTOREFERER, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $res = curl_exec($curl);
        curl_close($curl);

        return $res;
    }

}