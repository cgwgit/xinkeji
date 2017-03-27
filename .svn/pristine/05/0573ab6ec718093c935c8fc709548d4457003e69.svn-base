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
<header class="top_white top_blue_goBack" onclick="javascript:history.go(-1);">账号详情</header>
<section class="user_form">

    <form action="registerPort.html" name="register" method="post">


        <ul class="user_form_group user_datum_group">
            <li>
                <span>手 机 号</span>
                <span><?php echo ($userCenter["mobileNo"]); ?></span>
            </li>
            <li id="ul-register" liHref="/dswiliu/index.php?c=User&a=fullName">
                <span>姓 名</span>
                <span><?php echo ($userCenter["fullName"]); ?></span>
            </li>
            <li>
                <span>车 牌 号</span>
                <span><?php echo ($userCenter["plateNo"]); ?></span>
            </li>
            <li id="ul-register" liHref="/dswiliu/index.php?c=User&a=carType">
                <span>车 型</span>
                <span><?php echo ($userCenter["carType"]); ?></span>
            </li>
            <li id="ul-register" class="user_datum_modify" liHref="/dswiliu/index.php?c=User&a=passwordModify">
                <span></span>
                <span>修改密码</span>
            </li>
        </ul>

        <ul class="user_form_group user_datum_group">
            <li>
                <span>积分</span>
                <span><?php echo ($userCenter["integral"]); ?></span>
            </li>
        </ul>

        <?php if($userCenter["portNo"] AND $userCenter["portPassword"] ): ?><ul class="user_form_group user_datum_group">
                <li>
                    <span>港 口 账 号</span>
                    <span><?php echo ($userCenter["portNo"]); ?></span>
                </li>
                <li>
                    <span>港 口 密 码</span>
                    <span><?php echo ($userCenter["portPassword"]); ?></span>
                </li>
                <li id="ul-register" class="user_datum_modify" liHref="/dswiliu/index.php?c=User&a=registerPort">
                    <span></span>
                    <span>修改港口信息</span>
                </li>
            </ul>
            <?php else: ?>
            <ul class="user_form_group user_datum_group">
                <li id="ul-register" liHref="/dswiliu/index.php?c=User&a=registerPort">
                    <span>港口信息</span>
                    <span>请完善港口信息</span>
                </li>
            </ul><?php endif; ?>

        <?php if($userCenter["bankCard"] AND $userCenter["bankName"] AND $userCenter["bankOpen"] ): ?><ul class="user_form_group user_datum_group">
                <li>
                    <span>银 行 卡</span>
                    <span><?php echo ($userCenter["bankCard"]); ?></span>
                </li>
                <li>
                    <span>银 行 户 名</span>
                    <span><?php echo ($userCenter["bankName"]); ?></span>
                </li>
                <li>
                    <span>开 户 行</span>
                    <span><?php echo ($userCenter["bankOpen"]); ?></span>
                </li>
                <li id="ul-register" class="user_datum_modify" liHref="/dswiliu/index.php?c=User&a=registerBank">
                    <span></span>
                    <span>修改银行信息</span>
                </li>
            </ul>

            <?php else: ?>
            <ul class="user_form_group user_datum_group">
                <li id="ul-register" liHref="/dswiliu/index.php?c=User&a=registerBank">
                    <span>银行信息</span>
                    <span>请完善银行信息</span>
                </li>
            </ul><?php endif; ?>
    </form>
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
<script type="text/javascript" src="/dswiliu/Public/Index/js/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="/dswiliu/Public/layer/layer.js"></script>
<script type="text/javascript" src="/dswiliu/Public/layer/dialog.js"></script>

<script type="text/javascript" src="/dswiliu/Public/Index/js/common.js"></script>
</body>
</html>