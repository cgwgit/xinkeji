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

<header class="top_white top_blue_goBack" onclick="javascript:history.go(-1);">确认兑换</header>

<section class="user integral">
    <table class="integralMallShopping">
        <tr>
            <td rowspan="3"><img src="/dswiliu/Public/Index/images/shangpin.jpg"></td>
            <td class="integralMallTitle"><?php echo ($IntegralMall["title"]); ?></td>
        </tr>
        <tr>
            <td class="integralMallParameter"><i class="iconfont">&#xe605;</i><?php echo ($IntegralMall["integral"]); ?></td>
        </tr>
        <tr>
            <td class="integralMallOther">
                <span>运费：<?php echo ($IntegralMall["freight"]); ?></span>
                <span>剩余：<?php echo ($IntegralMall["surplus"]); ?></span>
                <span>销量：<?php echo ($IntegralMall["sales"]); ?></span>
            </td>
        </tr>
    </table>

    <div class="integralDeliveryTitle">请选择地址</div>
<div class="integralDeliveryTitle">固定取货点：</div>
    <ul class="user_delivery checked" id="deliveryChecked" attr-id="1">
        <li><span><?php echo ($DsUser["fullName"]); ?></span><span><?php echo ($DsUser["mobileNo"]); ?></span></li>
        <li class="user_delivery_address">取货点：董家口港停车场15号东升超越物流 18853218203</li>
    </ul>
	<ul class="user_delivery" id="deliveryChecked" attr-id="2">
        <li><span><?php echo ($DsUser["fullName"]); ?></span><span><?php echo ($DsUser["mobileNo"]); ?></span></li>
        <li class="user_delivery_address">取货点：前湾港停车场司机之家饭店 15064834456</li>
    </ul>
<div class="integralDeliveryTitle">客户取货点：我们会为您发货但会产生快递费需自理  需到会员中心补添收货地址</div>
    <?php if(is_array($UserDeliverys)): $i = 0; $__LIST__ = $UserDeliverys;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$UserDelivery): $mod = ($i % 2 );++$i;?><ul class="user_delivery" id="deliveryChecked" attr-id="<?php echo ($UserDelivery["Id"]); ?>">
            <li><span><?php echo ($UserDelivery["consignee"]); ?></span><span><?php echo ($UserDelivery["mobileNo"]); ?></span></li>
            <li class="user_delivery_address"><?php echo ($UserDelivery["area"]); echo ($UserDelivery["address"]); ?></li>
        </ul><?php endforeach; endif; else: echo "" ;endif; ?>
    <button id="integralExchange" attr-id="<?php echo ($IntegralMall["Id"]); ?>" attr-deliveryId="" attr-payWay="<?php echo ($IntegralMall["title"]); ?>"
            attr-message="立即兑换">确认兑换
    </button>
</section>
<script>
    var SCOPE = {
        'exchange_url': '/dswiliu/index.php?c=IntegralMall&a=exchange',
        'jump_url': '/dswiliu/index.php?c=IntegralMall&a=exchange',
    }
</script>
<script type="text/javascript" src="/dswiliu/Public/Index/js/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="/dswiliu/Public/layer/layer.js"></script>
<script type="text/javascript" src="/dswiliu/Public/layer/dialog.js"></script>

<script type="text/javascript" src="/dswiliu/Public/Index/js/common.js"></script>
</body>
</html>