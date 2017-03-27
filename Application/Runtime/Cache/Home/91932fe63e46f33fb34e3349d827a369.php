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

<link rel="stylesheet" type="text/css" href="/dswiliu/Public/Index/css/dropload.css" />
<header class="top_white top_blue_goBack" onclick="javascript:history.go(-1);">积分商城</header>

<section class="integralMall loadFather">
    <ul class="integralMallList loadSon"></ul>
</section>

<?php $LogisticsTypes = D('LogisticsType')->getSelectLogisticsType() ?>
<nav class="bottom_menu">
    <a href="<?php echo U('Index/index');?>" <?php if($dsMenu == 1): ?>class="bottom_menu_selected"<?php endif; ?>><i class="icon iconfont">&#xe607;</i><br>首页</a>
    <a id="logisticsType" <?php if($dsMenu == 2): ?>class="bottom_menu_selected"<?php endif; ?>>
        <i class="iconfont">&#xe60b;</i><br>分类
        <ul>
            <?php if(is_array($LogisticsTypes)): foreach($LogisticsTypes as $key=>$LogisticsType): ?><li class="J_typeId" attr-id="<?php echo ($LogisticsType["Id"]); ?>"><?php echo ($LogisticsType["typeName"]); ?></li><?php endforeach; endif; ?>
        </ul>
    </a>
    <a href="<?php echo U('integralMall/index');?>" <?php if($dsMenu == 3): ?>class="bottom_menu_selected"<?php endif; ?>><i class="iconfont">&#xe608;</i><br>积分商城</a>
    <a href="<?php echo U('user/index');?>" <?php if($dsMenu == 4): ?>class="bottom_menu_selected"<?php endif; ?>><i class="iconfont">&#xe600;</i><br>会员中心</a>
</nav>

<script>
    var SCOPE = {
        'type_url' : '/dswiliu/index.php?c=index',
    }
</script>
<script>
    var SCOPE = {
        'show_url' : '/dswiliu/index.php?c=IntegralMall&a=see',
        'drop_load_url': '/dswiliu/index.php?c=IntegralMall&a=indexLoad',
    }
</script>
<script type="text/javascript" src="/dswiliu/Public/Index/js/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="/dswiliu/Public/layer/layer.js"></script>
<script type="text/javascript" src="/dswiliu/Public/layer/dialog.js"></script>

<script type="text/javascript" src="/dswiliu/Public/Index/js/common.js"></script>
</body>
</html>

<script type="text/javascript" src="/dswiliu/Public/Index/js/dropload.min.js"></script>
<script type="text/javascript" src="/dswiliu/Public/Index/js/drop_load_all.js"></script>
<script>
    function dataLoad(data) {
        var result = '';

        for (var i = 0; i < data.length; i++) {
            result += '<li id="IntegralMallShow" attr-id="' + data[i].Id + '">'
                    + '<img src="' + data[i].uploadImg + '">'
                    + '<div class="integralMallTitle">' + data[i].title + '</div>'
                    + '<div class="integralMallParameter">'
                    + '<i class="iconfont">&#xe605;</i>' + data[i].integral + ''
                    + '<span>剩余数量：' + data[i].surplus + '</span>'
                    + '</div>'
                    + '</li>';
        }
        return result;
    }
</script>