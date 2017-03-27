<?php
namespace WeChat\Controller;
use Think\Controller;
class JieRuController extends Controller {
    public function index(){
        if (isset($_GET['echostr'])) {
            return D('JieRu')->JieRu();
        }
    }
}