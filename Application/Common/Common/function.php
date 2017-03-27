<?php
/**
 * 公用方法
 * User: TDSA
 * Date: 2016/11/3
 * Time: 13:21
 */

function show($status, $message, $data=array()){
    $reuslt = array(
        'status'=>$status,
        'message'=>$message,
        'data'=>$data
    );
    exit(json_encode($reuslt));
}

function getMd5Password($admin_password){
    return md5($admin_password.C('MD5_PRE'));
}

function getLogisticsTypeFind($id){
    return D('LogisticsType')->getLogisticsTypeFind($id);
}

function findLinkageById($id,$table,$field){
    $LinkageField = M($table)->where('Id='.$id)->find();
    return $LinkageField[$field];
}

function getStatus($status,$statusText){
    if($status == 0){
        $audit = $statusText[0];
    }elseif ($status == 1){
        $audit = $statusText[1];
    }elseif($status == -1){
        $audit = $statusText[2];
    }else{
        $audit = $statusText[3];
    }
    return $audit;
}

/**
 *   生成10位绝不重复订单号
 */
function order_number(){
    static $ORDERSN=array();                                        //静态变量
    $ors=date('ymd').substr(time(),-5).substr(microtime(),2,5);     //生成16位数字基本号
    if (isset($ORDERSN[$ors])) {                                    //判断是否有基本订单号
        $ORDERSN[$ors]++;                                           //如果存在,将值自增1
    }else{
        $ORDERSN[$ors]=1;
    }
    return $ors.str_pad($ORDERSN[$ors],2,'0',STR_PAD_LEFT);     //链接字符串
}



//十进制转换三十六进制
function inviteCode($int, $format = 8) {
    $dic = array(
        0 => '0', 1 => '1', 2 => '2', 3 => '3', 4 => '4', 5 => '5', 6 => '6', 7 => '7', 8 => '8', 9 => '9',
        10 => 'A', 11 => 'B', 12 => 'C', 13 => 'D', 14 => 'E', 15 => 'F', 16 => 'G', 17 => 'H', 18 => 'I',
        19 => 'J', 20 => 'K', 21 => 'L', 22 => 'M', 23 => 'N', 24 => 'O', 25 => 'P', 26 => 'Q', 27 => 'R',
        28 => 'S', 29 => 'T', 30 => 'U', 31 => 'V', 32 => 'W', 33 => 'X', 34 => 'Y', 35 => 'Z'
    );
    $arr = array();
    $loop = true;
    while ($loop)
    {
        $arr[] = $dic[bcmod($int, 36)];
        $int = floor(bcdiv($int, 36));
        if ($int == 0) {
            $loop = false;
        }
    }
    array_pad($arr, $format, $dic[0]);
    return implode('', array_reverse($arr));
}

////编辑器
function showKind($status,$data){
    header('Content-type:application/json;charset=UTF-8');
    if($status == 0){
        exit(json_encode(array('error'=>0,'url'=>$data)));
    }
    exit(json_encode(array('error'=>1,'url'=>'上传失败')));
}
