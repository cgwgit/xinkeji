<?php
return array(
	//'配置项'=>'配置值'
    //URL地址不区分大小写
    'URL_CASE_INSENSITIVE' =>true,
    'URL_MODEL'=>0,
    //数据库配置信息
    'DB_TYPE'   => 'mysql', // 数据库类型
    'DB_HOST'   => '127.0.0.1', // 服务器地址qdm115937550.my3w.com
    'DB_NAME'   => 'dswiliu', // 数据库名qdm115937550_db
    'DB_USER'   => 'root', // 用户名qdm115937550
    'DB_PWD'    => 'root', // 密码1111406020
    'DB_PORT'   => 3306, // 端口
    'DB_PREFIX' => 'ds_', // 数据库表前缀
    'DB_PARAMS'    =>    array(PDO::ATTR_CASE => PDO::CASE_NATURAL),     //数据库字段大小写

    'MD5_PRE'   => 'ds_', //密码二次加密

    'WECHAT'   => array(
        'TOKEN' => 'DSwuliu', //微信TOKEN
        'APPID' => '', //微信APPID
        'APPSECRET' => '', //微信APPSECRET
        'MCHID' => '', //微信商户号
        'SIGN' => '', //微信支付签名
        //=======【curl代理设置】===================================
        /**
         * TODO：这里设置代理机器，只有需要代理的时候才设置，不需要代理，请设置为0.0.0.0和0
         * 本例程通过curl使用HTTP POST方法，此处可修改代理服务器，
         * 默认CURL_PROXY_HOST=0.0.0.0和CURL_PROXY_PORT=0，此时不开启代理（如有需要才设置）
         * @var unknown_type
         */
        'CURL_PROXY_HOST' => "0.0.0.0", //微信商户号
        'CURL_PROXY_PORT' => 0, //微信商户号
    ),


    'LOG_RECORD'            =>  true,  // 进行日志记录
    'LOG_EXCEPTION_RECORD'  =>  true,    // 是否记录异常信息日志
    'LOG_LEVEL'             =>  'EMERG,ALERT,CRIT,ERR,WARN,NOTIC,INFO,DEBUG,SQL',  // 允许记录的日志级别
    'DB_FIELDS_CACHE'       =>  false, // 字段缓存信息
    'DB_DEBUG'				=>  true, // 开启调试模式 记录SQL日志
    'TMPL_CACHE_ON'         =>  false,        // 是否开启模板编译缓存,设为false则每次都会重新编译
    'TMPL_STRIP_SPACE'      =>  false,       // 是否去除模板文件里面的html空格与换行
    'SHOW_ERROR_MSG'        =>  true,    // 显示错误信息
    'URL_CASE_INSENSITIVE'  =>  false,  // URL区分大小写
);
