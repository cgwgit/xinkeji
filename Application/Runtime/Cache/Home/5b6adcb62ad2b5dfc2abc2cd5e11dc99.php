<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!--强制让文档的宽度与设备的宽度保持1:1，并且文档最大的宽度比例是1.0，且不允许用户点击屏幕放大浏览；-->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <!--iphone设备中的safari私有meta标签，它表示：允许全屏模式浏览；-->
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <!--iphone的私有标签，它指定的iphone中safari顶端的状态条的样式；-->
    <meta name="format-detection" content="telephone=no">
    <!--设备忽略将页面中的数字识别为电话号码；-->
    <meta charset="UTF-8">
    <meta name="author" content="MR.QI">
    <title>青岛东升超越物流</title>
    <meta name="keywords" content="青岛东升超越物流">
    <meta name="description" content="青岛东升超越物流">

    <link rel="stylesheet" type="text/css" href="/dswiliu/Public/Index/iconfont/iconFont.css" />
    <link rel="stylesheet" type="text/css" href="/dswiliu/Public/Index/css/reset.css" />

</head>
<body>
<header class="top_white">账号登陆</header>
<section class="user_form">

    <!--<div class="user_submit_hint hint_wrong">请输入账号密码</div>-->
    <form action="" method="post" name="ds_login">
        <ul class="user_form_group">
            <li>
                <span class="user_form_Login">账号</span>
                <span><input type="tel" placeholder="手机号" name="ds_login" promptNull="请填写账号" promptError="请输入正确手机号码"></span>
            </li>
            <li>
                <span class="user_form_Login">密码</span>
                <span><input type="password" placeholder="密码" name="ds_password" promptNull="请填写密码"></span>
            </li>
        </ul>

        <div class="user_form_hint"><a href="<?php echo U('register/index');?>">立即注册</a></div>

        <div class="user_form_button">
            <button type="button" onclick="login.check()">登陆</button>
        </div>
    </form>

</section>
<script type="text/javascript" src="/dswiliu/Public/Index/js/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="/dswiliu/Public/layer/layer.js"></script>
<script type="text/javascript" src="/dswiliu/Public/layer/dialog.js"></script>

<script type="text/javascript" src="/dswiliu/Public/Index/js/common.js"></script>
</body>
</html>

<script type="text/javascript" src="/dswiliu/Public/Index/js/login.js"></script>