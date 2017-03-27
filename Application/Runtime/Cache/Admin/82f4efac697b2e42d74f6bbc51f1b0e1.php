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
<section class="container">
    <h2>员工管理-添加员工</h2>
    <p><a href="javascript:history.go(-1);" class="btn btn-sm btn-info">返回</a></p>
    <div class="col-lg-6">

        <form class="form-horizontal" id="singcms-form">
            <div class="form-group">
                <label for="admin_name" class="col-sm-2 control-label">员工姓名:</label>
                <div class="col-sm-5">
                    <input type="text" name="admin_name" class="form-control" id="admin_name" placeholder="请输入员工姓名">
                </div>
            </div>
            <div class="form-group">
                <label for="admin_type" class="col-sm-2 control-label">员工类别:</label>
                <div class="col-sm-5">
                    <select class="form-control" name="admin_type" id="admin_type">
                        <option value="">请选择员工类别</option>
                        <option value="1">业务员</option>
                        <option value="2">财务员</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="admin_login_name" class="col-sm-2 control-label">员工账号:</label>
                <div class="col-sm-5">
                    <input type="text" name="admin_login_name" class="form-control" id="admin_login_name" placeholder="请输入员工账号">
                </div>
            </div>
            <div class="form-group">
                <label for="admin_password" class="col-sm-2 control-label">员工密码:</label>
                <div class="col-sm-5">
                    <input type="text" name="admin_password" class="form-control" id="admin_password" placeholder="请输入员工密码">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="button" class="btn btn-default" id="singcms-button-submit">提交</button>
                </div>
            </div>
        </form>

    </div>

</section>
<script>
    var SCOPE = {
        'save_url' : '/dswiliu/admin.php?c=Admin&a=add',
        'jump_url' : '/dswiliu/admin.php?c=Admin',
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