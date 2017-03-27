<?php
namespace WeChat\Controller;
use Think\Controller;
class WXAccessTokenController extends Controller {

    protected $_appId; //$appId
    protected $_appSecret; //$appId
    protected $_access_token; //$appId

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
                $fp = fopen("/dswiliu/Public/access_token.json", "w");
                fwrite($fp, json_encode($data));
                fclose($fp);
            }
        } else {
            $access_token = $data->access_token;
        }
        $this->_access_token = $access_token;
    }

    public function index()
    {
        $access_token = $this->_access_token;
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

        echo $data.'<br>';
        echo $access_token;

        return json_decode($this->httpPost($url, $data));
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