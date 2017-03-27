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

<header class="top_white top_blue_goBack" onclick="javascript:history.go(-1);">我的货单</header>

<section class="logisticsOrder">

    <ul>
        <li class="logisticsOrderList">
            <table>
                <tr>
                    <th colspan="2">
                        <?php echo ($LogisticsOrderLogistics["release"]); ?>
                        <span><?php echo ($LogisticsOrders["handle"]); ?> </span>
                    </th>
                </tr>
                <tr>
                    <td><span>货物名称</span><?php echo ($LogisticsOrderLogistics["goodsName"]); ?></td>
                    <td>
                        <span>支付方式</span>
                        <?php if($LogisticsOrderLogistics["payWay"] == 1): ?>货到付款<?php endif; ?>
                        <?php if($LogisticsOrderLogistics["payWay"] == 2): ?>发货付款<?php endif; ?>
                        <?php if($LogisticsOrderLogistics["payWay"] == 3): ?>发货定金-货到结款<?php endif; ?>
						<?php if($LogisticsOrderLogistics["payWay"] == 4): ?>回单结算<?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <td><span>装货地</span><?php echo ($LogisticsOrderLogistics["loadingAddr"]); ?></td>
                    <td><span>卸货地</span><?php echo ($LogisticsOrderLogistics["unloadingAddr"]); ?></td>
                </tr>
                <tr>
                    <td><span>装货吨数</span><?php echo ($LogisticsOrders["tonnage"]); ?>吨</td>
                    <td><span>价钱</span><?php echo ($LogisticsOrderLogistics["Price"]); ?>元/吨</td>
                </tr>
                <tr>
                    <td colspan="2"><span>接单时间</span><?php echo ($LogisticsOrders["shippingDate"]); ?></td>
                </tr>
            </table>
        </li>
        <li class="logisticsOrderList">
            <table>
                <tr>
                    <th colspan="2">
                        回执单
                    </th>
                </tr>
                <tr>
                    <td colspan="2"><span>收单日期</span><?php echo ($LogisticsOrderReceipt["acquiringDate"]); ?></td>
                </tr>
                <tr>
                    <td colspan="2"><span>卸货日期</span><?php echo ($LogisticsOrderReceipt["dischargeData"]); ?></td>
                </tr>
                <tr>
                    <td><span>代理商</span><?php echo ($LogisticsOrderLogistics["goodsName"]); ?></td>
                    <td>
                        <span>是否加油卡</span>
                        <?php if($LogisticsOrderReceipt["petrolCard"] == 0): ?>是<?php endif; ?>
                        <?php if($LogisticsOrderReceipt["petrolCard"] == 1): ?>否<?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <td><span>卸重</span><?php echo ($LogisticsOrderReceipt["dischargeWeight"]); ?> 吨</td>
                    <td><span>亏吨</span><?php echo ($LogisticsOrderReceipt["lackWeight"]); ?> 吨</td><!--lackWeight-->
                </tr>
                <tr>
                    <td><span>允亏比例</span><?php echo ($LogisticsOrderLogistics["allowProportion"]); ?> 吨</td><!--allowProportion-->
                    <td><span>允亏吨数</span><?php echo ($LogisticsOrderReceipt["allowTonnage"]); ?> 吨</td><!--allowTonnage-->
                </tr>
                <tr>
                    <td></td>
                    <td><span>实际亏吨</span><?php echo ($LogisticsOrderReceipt["actualLackWeight"]); ?> 吨</td><!--actualLackWeight-->
                </tr>
                <tr>
                    <td><span>亏扣单价</span><?php echo ($LogisticsOrderLogistics["lackPrice"]); ?> 元/吨</td><!--lackPrice-->
                    <td><span>亏扣总额</span><?php echo ($LogisticsOrderReceipt["allLackPrice"]); ?> 元</td>
                </tr><!--allLackPrice-->
                <tr>
                    <td><span>运费总价</span><?php echo ($LogisticsOrderReceipt["allPrice"]); ?> 元</td><!--allPrice-->
                    <td><span>应付运费</span><?php echo ($LogisticsOrderReceipt["payPrice"]); ?> 元</td><!--prepaidMoney-->
                </tr>
                <tr>
                    <td><span>已付金额</span><?php echo ($LogisticsOrderReceipt["prepaidMoney"]); ?> 元</td><!--prepaidMoney-->
                    <td><span>欠车上</span><?php echo ($LogisticsOrderReceipt["arrearsPrice"]); ?> 元</td><!--arrearsPrice-->
                </tr>
                <!--<tr>-->
                    <!--<td><span>业务员</span><?php echo ($LogisticsOrderLogistics["tonnage"]); ?>吨</td>-->
                    <!--<td><span>财务员</span><?php echo ($LogisticsOrderLogistics["Price"]); ?>元/吨</td>-->
                <!--</tr>-->
            </table>
        </li>
    </ul>
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
    var SCOPE = {}
</script>
<script type="text/javascript" src="/dswiliu/Public/Index/js/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="/dswiliu/Public/layer/layer.js"></script>
<script type="text/javascript" src="/dswiliu/Public/layer/dialog.js"></script>

<script type="text/javascript" src="/dswiliu/Public/Index/js/common.js"></script>
</body>
</html>