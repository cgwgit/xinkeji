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

<section class="user integral">
    <ul class="integralMall">
        <li>
            <img src="<?php echo ($IntegralMall["uploadImg"]); ?>">
        </li>
        <li class="integralMallTitle"><?php echo ($IntegralMall["title"]); ?></li>
        <li class="integralMallParameter"><i class="iconfont">&#xe605;</i><?php echo ($IntegralMall["integral"]); ?></li>
        <li class="integralMallOther">
            <span>运费：<?php echo ($IntegralMall["freight"]); ?></span>
            <span>剩余：<?php echo ($IntegralMall["surplus"]); ?></span>
            <span>销量：<?php echo ($IntegralMall["sales"]); ?></span>
        </li>
    </ul>

    <ul class="integralMallContent">
        <li class="integralMallContentTitle">商品详情</li>
        <li><?php echo ($IntegralMall["content"]); ?></li>
    </ul>

    <button id="integralShoppingCart" attr-id="<?php echo ($IntegralMall["Id"]); ?>" attr-payWay="<?php echo ($IntegralMall["title"]); ?>" attr-message="立即兑换">立即兑换</button>
</section>
<script>
    var SCOPE = {
        'exchange_url' : '/dswiliu/index.php?c=IntegralMall&a=judge',
        'jump_url' : '/dswiliu/index.php?c=IntegralMall&a=exchange',
    }
</script>
<script type="text/javascript" src="/dswiliu/Public/Index/js/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="/dswiliu/Public/layer/layer.js"></script>
<script type="text/javascript" src="/dswiliu/Public/layer/dialog.js"></script>

<script type="text/javascript" src="/dswiliu/Public/Index/js/common.js"></script>
</body>
</html>