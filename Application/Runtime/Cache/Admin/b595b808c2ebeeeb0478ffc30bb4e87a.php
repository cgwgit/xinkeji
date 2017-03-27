<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>鑫科技-后台首页</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="/dswiliu/Public/admin/bootstrap/css/bootstrap.min.css" />
    <!-- 以下两个插件用于在IE8以及以下版本浏览器支持HTML5元素和媒体查询，如果不需要用可以移除 -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<!--你自己的样式文件 -->
<link rel="stylesheet" type="text/css" href="/dswiliu/Public/admin/css/index.css" />
<header>
    <div class="logo">后台系统</div>
    <div class="account">

        欢迎 <?php echo ($adminUser["admin_name"]); ?> <?php echo ($adminUser["admin_type_name"]); ?>登陆
        <a href="/dswiliu/admin.php?c=PasswordModify" target="admin">修改密码</a>
        <a href="/dswiliu/admin.php?c=Login&a=loginOut">退出</a>

    </div>
</header>
<nav>
    <?php if($adminUser["admin_type"] == 0 ): ?><a href="<?php echo U('admin/index');?>" target="admin">员工管理</a>
        <a href="<?php echo U('logisticsType/index');?>" target="admin">货源分类</a>
        <a href="<?php echo U('logistics/index');?>" target="admin">货源信息</a>
        <a href="<?php echo U('user/index');?>" target="admin">会员管理</a>
        <a href="<?php echo U('logisticsOrder/index');?>" target="admin">订单管理</a>
        <a href="<?php echo U('amerce/index');?>" target="admin">罚款管理</a>
        <a href="<?php echo U('integralMall/index');?>" target="admin">商城管理</a>
        <a href="<?php echo U('integralOrder/index');?>" target="admin">商城订单</a>

        <?php elseif($adminUser["admin_type"] == 1): ?>

        <a href="<?php echo U('logisticsOrder/index');?>" target="admin">订单管理</a>

        <?php elseif($adminUser["admin_type"] == 2): ?>

        <a href="<?php echo U('logisticsOrder/index');?>" target="admin">订单管理</a>
        <a href="<?php echo U('amerce/index');?>" target="admin">罚款管理</a><?php endif; ?>

</nav>
<section>
    <iframe frameborder="0" src="<?php echo ($adminUser["url"]); ?>" name="admin"></iframe>
</section>

<!-- 如果要使用Bootstrap的js插件，必须先调入jQuery -->
<script type="text/javascript" src="/dswiliu/Public/admin/js/jquery-1.11.0.min.js"></script>

 <!--包括所有bootstrap的js插件或者可以根据需要使用的js插件调用　-->
<script type="text/javascript" src="/dswiliu/Public/admin/bootstrap/js/bootstrap.min.js"></script>

<script type="text/javascript" src="/dswiliu/Public/layer/layer.js"></script>
<script type="text/javascript" src="/dswiliu/Public/layer/dialog.js"></script>

<script type="text/javascript" src="/dswiliu/Public/admin/js/common.js"></script>


</body>
</html>