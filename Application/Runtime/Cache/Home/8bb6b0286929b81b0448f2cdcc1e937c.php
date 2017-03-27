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
<header class="top_white">立即注册</header>
<section class="user_form">

    <form name="register" method="post">

        <ul class="user_form_group">
            <li>
                <span>手 机 号</span>
                <span><input type="number" name="mobileNo" placeholder="请输入手机号(登陆账号)"></span>
            </li>
            <li>
                <span>密 码</span>
                <span><input type="password" name="password" placeholder="输入会员密码(登陆密码)"></span>
            </li>
            <li>
                <span>确 认 密 码</span>
                <span><input type="password" name="passwordRepeat" placeholder="输入重复会员密码"></span>
            </li>
            <li>
                <span>姓 名</span>
                <span><input type="text" name="fullName" placeholder="请输入自己真实姓名"></span>
            </li>
            <li>
                <span>车 牌 号</span>
                <!--<span class="carArea">辽A<b>&or;</b></span>-->
                <span><input type="email" name="plateNo" placeholder="请输入车牌号码"></span>
            </li>
            <li>
                <span>车 型</span>
                <span><input type="text" name="carType" placeholder="请输入车型"></span>
            </li>
            <li>
                <span>邀 请 码</span>
                <span><input type="email" name="inviteCode" placeholder="输入邀请码"></span>
            </li>
        </ul>
        <div class="user_form_hint"><span>注：</span>以上信息除邀请码均为必填项<br>除密码外均不许修改, 请认真填写</div>
        <div class="user_form_button"><button type="button"  onclick="login.check()">立即注册</button></div>
    </form>
</section>
<script type="text/javascript" src="/dswiliu/Public/Index/js/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="/dswiliu/Public/layer/layer.js"></script>
<script type="text/javascript" src="/dswiliu/Public/layer/dialog.js"></script>

<script type="text/javascript" src="/dswiliu/Public/Index/js/common.js"></script>
</body>
</html>

<script type="text/javascript" src="/dswiliu/Public/Index/js/register.js"></script>