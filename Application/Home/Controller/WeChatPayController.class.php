<?php
namespace Home\Controller;

use Think\Controller;


/**
 * use Common\Model 这块可以不需要使用，框架默认会加载里面的内容
 */
class WeChatPayController extends Controller
{
    private $app_id = '';
    private $mch_id = '';                                   //商户号
    private $makesign = '0da73d6db1e15b63514354660b6eac52';                 //支付的签名
    private $app_secret = '';
    private $parameters;
    public $error = 0;
    public $orderid = null;
    public $openid = '';

    public function __construct()
    {
        $this->app_id = C('WECHAT.APPID'); //appid
        $this->mch_id = C('WECHAT.MCHID'); //商户号
        $this->app_secret = C('WECHAT.APPSECRET'); //appsecret

        $url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        if (!isset($_GET['code'])) {
            $openidUrl = $this->snsapi_base($url);
            redirect($openidUrl);
        }else{
            $openidAccess_token = $this->openidAccess_token($_GET['code']);
            $this->openid = $openidAccess_token['openid'];
        }
    }
    //获取OPEINID
    public function snsapi_base($redirect_uri, $scope = "snsapi_base", $state = 0)
    {
        $appId = $this->app_id;
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
        $appId = $this->app_id;
        $appSecret= $this->app_secret;
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


    #支付代码
    public function index(){

        #支付前的数据配置
        $reannumb = $this->randomkeys(8);
        $pays = 0.01;            //获取需要支付的价格

        $pay='0.1';
        $conf = $this->payconfig('Zl'.$reannumb,$pays * 100, '助力费用支付');
        if (!$conf || $conf['return_code'] == 'FAIL') exit("<script>alert('对不起，微信支付接口调用错误!" . $conf['return_msg'] . "');history.go(-1);</script>");
        $this->orderid = $conf['prepay_id'];
        //生成页面调用参数
        $jsApiObj["appId"] = $conf['appid'];
        $timeStamp = time();
        $jsApiObj["timeStamp"] = "$timeStamp";
        $jsApiObj["nonceStr"] = $this->createNoncestr();
        $jsApiObj["package"] = "prepay_id=" . $conf['prepay_id'];
        $jsApiObj["signType"] = "MD5";
        $jsApiObj["paySign"] = $this->MakeSign($jsApiObj);


        print_r($jsApiObj);

        echo $this->orderid;
        //$this->display();
        //$this->render('payyh',array('parameters' => json_encode($jsApiObj), 'msg' => $msg, 'vs' => $pays));  //发送支付数据
    }



    #微信JS支付参数获取#
    protected function payconfig($no, $fee, $body)
    {
        $url = "https://api.mch.weixin.qq.com/pay/unifiedorder";
        $data['appid'] = $this->app_id;
        $data['mch_id'] = $this->mch_id;        //商户号
        $data['device_info'] = 'WEB';
        $data['body'] = $body;
        $data['out_trade_no'] = $no;            //订单号
        $data['total_fee'] = $fee;              //金额
        $data['spbill_create_ip'] = $_SERVER["REMOTE_ADDR"];
        $data['notify_url'] = 'http://hd.yimeiq.cn/app/api/pays.php';
        $data['trade_type'] = 'JSAPI';
        $data['openid'] = $this->openid;   //获取openid
        $data['nonce_str'] = $this->createNoncestr();
        $data['sign'] = $this->MakeSign($data);
        //print_r($data);
        $xml = $this->ToXml($data);
        $curl = curl_init(); // 启动一个CURL会话
        curl_setopt($curl, CURLOPT_URL, $url); // 要访问的地址
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
        //设置header
        curl_setopt($curl, CURLOPT_HEADER, FALSE);
        //要求结果为字符串且输出到屏幕上
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($curl, CURLOPT_POST, TRUE); // 发送一个常规的Post请求
        curl_setopt($curl, CURLOPT_POSTFIELDS, $xml); // Post提交的数据包
        curl_setopt($curl, CURLOPT_TIMEOUT, 30); // 设置超时限制防止死循环
        $tmpInfo = curl_exec($curl); // 执行操作
        curl_close($curl); // 关闭CURL会话
        $arr = $this->FromXml($tmpInfo);
        return $arr;
    }



    /**
     *    作用：产生随机字符串，不长于32位
     */
    public function createNoncestr($length = 32)
    {
        $chars = "abcdefghijklmnopqrstuvwxyz0123456789";
        $str = "";
        for ($i = 0; $i < $length; $i++) {
            $str .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
        }
        return $str;
    }

    /**
     *    作用：产生随机字符串，不长于32位
     */
    public function randomkeys($length)
    {
        $pattern = '1234567890123456789012345678905678901234';
        $key = null;
        for ($i = 0; $i < $length; $i++) {
            $key .= $pattern{mt_rand(0, 30)};    //生成php随机数
        }
        return $key;
    }

    /**
     * 将xml转为array
     * @param string $xml
     * @throws WxPayException
     */
    public function FromXml($xml)
    {
        //将XML转为array
        return json_decode(json_encode(simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA)), true);
    }

    /**
     * 输出xml字符
     * @throws WxPayException
     **/
    public function ToXml($arr)
    {
        $xml = "<xml>";
        foreach ($arr as $key => $val) {
            if (is_numeric($val)) {
                $xml .= "<" . $key . ">" . $val . "</" . $key . ">";
            } else {
                $xml .= "<" . $key . "><![CDATA[" . $val . "]]></" . $key . ">";
            }
        }
        $xml .= "</xml>";
        return $xml;
    }

    /**
     * 生成签名
     * @return 签名，本函数不覆盖sign成员变量，如要设置签名需要调用SetSign方法赋值
     */
    protected function MakeSign($arr)
    {
        //签名步骤一：按字典序排序参数
        ksort($arr);
        $string = $this->ToUrlParams($arr);
        //签名步骤二：在string后加入KEY
        $string = $string . "&key=" . $this->makesign;
        //签名步骤三：MD5加密
        $string = md5($string);
        //签名步骤四：所有字符转为大写
        $result = strtoupper($string);
        return $result;
    }

    /**
     * 格式化参数格式化成url参数
     */
    protected function ToUrlParams($arr)
    {
        $buff = "";
        foreach ($arr as $k => $v) {
            if ($k != "sign" && $v != "" && !is_array($v)) {
                $buff .= $k . "=" . $v . "&";
            }
        }

        $buff = trim($buff, "&");
        return $buff;
    }
}