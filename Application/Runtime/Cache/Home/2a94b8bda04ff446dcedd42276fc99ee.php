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
<form action="<?php echo U('Index/index');?>" method="post">
    <header class="top_blue">

        <?php if(empty($search["typeName"])): ?><a class="top_logo" href="<?php echo U('Index/index');?>">
            <img src="/dswiliu/Public/Index/images/Logo.png">
            青岛东升超越物流
            </a>
            <?php else: ?>
            <a class="top_logo top_center" href="<?php echo U('Index/index');?>">
            <?php echo ($search["typeName"]); ?>
            </a><?php endif; ?>

        <div>
            <input type="text" name="title" placeholder="请输入关键字">
        </div>

        <a class="top_search J_default">
            <i class="iconfont">&#xe604;</i>
        </a>
    </header>
</form>

<section class="index loadFather">
    <div class="loadSon"></div>
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
        'logistics_order_url': '/dswiliu/index.php?c=index&a=logisticsOrder',
        'jump_url': '/dswiliu/index.php?c=index.php&a=datum',
        'drop_load_url': '/dswiliu/index.php?a=indexLoad&typeId=<?php echo ($search["typeId"]); ?>&title=<?php echo ($search["title"]); ?>',
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
            result += '<ul class="J_logistics">'
                    + '<li><i class="iconfont">&#xe60a;</i>' + data[i].release.substr(0 ,10)
                    + '<span>' + data[i].releaseDateTime.substr(0 ,10) + '</span></li>'
                    + '<li><i class="iconBlue iconfont">&#xe603;</i><b>货&nbsp;&nbsp;&nbsp;名：</b>' + data[i].goodsName + '</li>'
                    + '<li><i class="iconBlue iconfont">&#xe603;</i><b>剩余量：</b>' + data[i].surplus + '吨</li>'
                    + '<li><i class="iconYellow iconfont">&#xe603;</i><b>装货地：</b>' + data[i].loadingAddr + '</li>'
                    + '<li><i class="iconOrange iconfont">&#xe603;</i><b>卸货地：</b>' + data[i].unloadingAddr + '</li>'
                    + '<li><i class="iconPurple iconfont">&#xe603;</i><b>价&nbsp;&nbsp;&nbsp;格：</b>' + parseFloat(data[i].Price) + '元/吨</li>'
                    + '<li><i class="iconBlue iconfont">&#xe603;</i><b>装货数：</b>' + parseFloat(data[i].tonnage) + '吨</li>'
                    + '<li><a id="logistics-placeOrder" attr-id="' + data[i].Id + '" attr-payWay="' + data[i].payWay
                    + '" attr-tonnage="' + data[i].tonnage
                    + '" attr-message="立即下单">立即下单</a></li>'
                    + '</ul>';
        }
        return result;
    }
</script>