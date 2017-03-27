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
    <h2>员工查看-<?php echo ($Admin["admin_name"]); ?></h2>
    <p><a href="javascript:history.go(-1);" class="btn btn-sm btn-info">返回</a></p>
    <div class="col-lg-12">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    员工基本信息
                </h3>
            </div>
            <table class="table user_table">
                <tr>
                    <td>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">员工账号:</label>
                            <div class="col-sm-8"><?php echo ($Admin["admin_login_name"]); ?></div>
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">员工姓名:</label>
                            <div class="col-sm-8"><?php echo ($Admin["admin_name"]); ?></div>
                        </div>
                    </td>
                    <td>
                        <div class="form-group has-error">
                            <label class="col-sm-4 control-label">员工密码:</label>
                            <div class="col-sm-8">
                                <button class="btn btn-sm btn-danger" attr-id="<?php echo ($Admin["Id"]); ?>" id="button-passwordReset">重置密码</button>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">员工类别:</label>
                            <div class="col-sm-8"><?php echo ($Admin["admin_type"]); ?></div>
                        </div>
                    </td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
        </div>

    </div>

</section>
<script>
    var SCOPE = {
        'audit_modify_url' : '/dswiliu/admin.php?c=admin&a=adminModify',
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