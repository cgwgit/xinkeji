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
<header class="top_white top_blue_goBack" headerHref="<?php echo U('User/index');?>">管理收货地址</header>
<section class="user_form">
    <?php if(is_array($UserDeliverys)): $i = 0; $__LIST__ = $UserDeliverys;if( count($__LIST__)==0 ) : echo "空" ;else: foreach($__LIST__ as $key=>$UserDelivery): $mod = ($i % 2 );++$i;?><ul class="user_delivery" id="ul-modify" attr-id="<?php echo ($UserDelivery["Id"]); ?>">
            <li><span><?php echo ($UserDelivery["consignee"]); ?></span><span><?php echo ($UserDelivery["mobileNo"]); ?></span></li>
            <li class="user_delivery_address"><?php echo ($UserDelivery["area"]); echo ($UserDelivery["address"]); ?></li>
            <li>
                <button attr-id="<?php echo ($UserDelivery["Id"]); ?>" id="button-del" type="button" attr-a="menu" attr-message="删除">删除地址
                </button>
            </li>
        </ul><?php endforeach; endif; else: echo "空" ;endif; ?>
    <nav>
        <ul>
            <?php echo ($pageRes); ?>
        </ul>
    </nav>

    <button id="button-add">增加新地址</button>
</section>

<script>
    var SCOPE = {
        'add_url' : '/dswiliu/index.php?c=userDelivery&a=add',
        'modify_url' : '/dswiliu/index.php?c=userDelivery&a=modify',
        'del_url': '/dswiliu/index.php?c=userDelivery&a=del',
    }
</script>
<script type="text/javascript" src="/dswiliu/Public/Index/js/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="/dswiliu/Public/layer/layer.js"></script>
<script type="text/javascript" src="/dswiliu/Public/layer/dialog.js"></script>

<script type="text/javascript" src="/dswiliu/Public/Index/js/common.js"></script>
</body>
</html>