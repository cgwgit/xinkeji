<?php
namespace WeChat\Controller;

use Think\Controller;

class OpenIdController extends Controller
{

    public function index()
    {
        $url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        if (!isset($_GET['code'])) {

            $openidUrl = D('OpenId')->snsapi_base($url);
            redirect($openidUrl);
        } else {
            $openidAccess_token = D('OpenId')->openidAccess_token($_GET['code']);
            print_r($openidAccess_token);
            $openid = $openidAccess_token['openid'];
            $access_token = $openidAccess_token['access_token'];
            $openidFind = D('User')->find($openid);//$this->M('user')->where('openid='.$openid)->find();

//            if($_GET['code']){//snsapi_userinfo授权拉取用户信息
//                echo $_GET['code'];
//                $snsapi_userinfo = $this->snsapi_userinfo($access_token,$openid);//snsapi_userinfo授权拉取用户信息
//
//                $data = array();
//                $data['openid'] = $snsapi_userinfo['openid'];
//                $data['nickname'] = $snsapi_userinfo['nickname'];
//                $data['sex'] = $snsapi_userinfo['sex'];
//                $data['country'] = $snsapi_userinfo['country'];
//                $data['province'] = $snsapi_userinfo['province'];
//                $data['city'] = $snsapi_userinfo['city'];
//                $data['headimgurl'] = $snsapi_userinfo['headimgurl'];
//                $data['subscribe'] = 0;
//
//                $openidAdd = D('User')->insert($data);//$this->M('user')->add($data);
//                if($openidAdd){
//                    print_r($openidAdd);
//                }
//            }

            if(!$openidFind){//判断是否存在数据库
                $nickname = D('OpenId')->openidUnionID($openid);
                print_r($nickname);
                if($nickname['subscribe']){//判断用户是否关注
                    //已关注直接存入数据库
                    $openidAdd = D('User')->insert($nickname);
                    $openidFind = D('User')->find($openid);
                }
            }
            print_r($openidFind);
//                else{
//                    //未关注 通过snsapi_userinfoc重定向查询
//                    $openidUrl = D('OpenId')->snsapi_base($url,'snsapi_userinfo',1);
//                    redirect($openidUrl);
//                }
//            echo $openidAccess_token;
            //return $openidAccess_token['openid'];
        }
    }

}