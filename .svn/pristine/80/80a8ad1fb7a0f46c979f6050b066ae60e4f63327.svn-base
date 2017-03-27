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
<header class="top_white top_blue_goBack" onclick="javascript:history.go(-1);">修改姓名</header>
<section class="user_form">

<!--    <div class="user_submit_hint hint_wrong">注册失败，请完善详细信息</div>-->
<!--    <div class="user_submit_hint hint_error">注册成功，请完善详细信息</div>-->
    <form name="register" method="post" id="register-form">
        <ul class="user_form_group">
            <li>
                <span>姓 名</span>
                <span><input type="text" name="fullName" placeholder="输入姓名" value="<?php echo ($UserMobileNo["fullName"]); ?>"></span>
            </li>
        </ul>
        <input type="hidden" name="registerType" value="fullName">
        <div class="user_form_button">
            <button type="button" id="register-submit">确认修改姓名</button>
        </div>
    </form>
</section>
<script>
    var SCOPE = {
        'save_url' : '/dswiliu/index.php?c=user&a=fullName',
        'jump_url' : '/dswiliu/index.php?c=user&a=datum',
    }
</script>
<script type="text/javascript" src="/dswiliu/Public/Index/js/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="/dswiliu/Public/layer/layer.js"></script>
<script type="text/javascript" src="/dswiliu/Public/layer/dialog.js"></script>

<script type="text/javascript" src="/dswiliu/Public/Index/js/common.js"></script>
</body>
</html>