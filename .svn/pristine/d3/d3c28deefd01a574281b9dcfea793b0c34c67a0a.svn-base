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
<header class="top_white top_blue_goBack" onclick="javascript:history.go(-1);">修改收货地址</header>
<form class="form-horizontal" id="singcms-form">
    <section class="user_form">
        <ul class="user_form_group">
            <li>
                <span>收 货 人</span>
                <span><input type="text" name="consignee" placeholder="请输入收货人姓名" value="<?php echo ($UserDelivery["consignee"]); ?>"></span>
            </li>
            <li>
                <span>联 系 电 话</span>
                <span><input type="tel" name="mobileNo" placeholder="请输入收货人联系电话" value="<?php echo ($UserDelivery["mobileNo"]); ?>"></span>
            </li>
            <li>
                <span>所 在 地 区</span>
                <span><input type="text" name="area" placeholder="请选择" value="<?php echo ($UserDelivery["area"]); ?>"></span>
            </li>
            <li>
                <span>详 细 地 址</span>
                <span><input type="text" name="address" placeholder="请填写详细地址" value="<?php echo ($UserDelivery["address"]); ?>"></span>
            </li>
        </ul>
        <input type="hidden" name="Id" value="<?php echo ($UserDelivery["Id"]); ?>">
        <button type="button" id="singcms-button-submit">确认修改地址</button>
    </section>
</form>
<script>
    var SCOPE = {
        'save_url': '/dswiliu/index.php?c=userDelivery&a=add',
        'jump_url': '/dswiliu/index.php?c=userDelivery',
    }
</script>
<script type="text/javascript" src="/dswiliu/Public/Index/js/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="/dswiliu/Public/layer/layer.js"></script>
<script type="text/javascript" src="/dswiliu/Public/layer/dialog.js"></script>

<script type="text/javascript" src="/dswiliu/Public/Index/js/common.js"></script>
</body>
</html>