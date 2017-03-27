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
<link rel="stylesheet" type="text/css" href="/dswiliu/Public/admin/css/style.css" />
<?php
$LogisticsTypes = D('LogisticsType')->getSelectLogisticsType() ?>
<section class="container">
    <h2>修改密码</h2>
    <p><a href="javascript:history.go(-1);" class="btn btn-sm btn-info">返回</a></p>
    <div class="col-lg-6">

        <form class="form-horizontal" id="singcms-form">
            <div class="form-group">
                <label class="col-sm-2 control-label">原始密码:</label>
                <div class="col-sm-5">
                    <input type="password" name="passwordOld" class="form-control" placeholder="输入原始密码">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">新密码:</label>
                <div class="col-sm-5">
                    <input type="password" name="passwordNew" class="form-control" placeholder="输入新密码">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">确认密码:</label>
                <div class="col-sm-5">
                    <input type="password" name="passwordNewRepeat" class="form-control" placeholder="再次输入新密码">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="button" class="btn btn-default" id="singcms-button-submit">确认修改</button>
                </div>
            </div>
        </form>

    </div>

</section>
<script>
    var SCOPE = {
        'save_url' : '/dswiliu/admin.php?c=PasswordModify&a=Modify',
        'jump_url' : '/dswiliu/admin.php?c=Login&a=loginOut',
    }
</script>
<!-- 如果要使用Bootstrap的js插件，必须先调入jQuery -->
<script type="text/javascript" src="/dswiliu/Public/admin/js/jquery-1.11.0.min.js"></script>

 <!--包括所有bootstrap的js插件或者可以根据需要使用的js插件调用　-->
<script type="text/javascript" src="/dswiliu/Public/admin/bootstrap/js/bootstrap.min.js"></script>

<script type="text/javascript" src="/dswiliu/Public/layer/layer.js"></script>
<script type="text/javascript" src="/dswiliu/Public/layer/dialog.js"></script>

<script type="text/javascript" src="/dswiliu/Public/admin/js/common.js"></script>


</body>
</html>