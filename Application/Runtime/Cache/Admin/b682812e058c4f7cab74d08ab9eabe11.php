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
    <h2>员工管理</h2>

    <div class="form-group">
        <div class="col-sm-1">
            <button id="button-add" class="btn btn-sm btn-success col-sm-12">添加</button>
        </div>
        <form action="/dswiliu/admin.php" method="get">
            <div class="col-md-offset-4 col-sm-2">
                <select class="form-control" name="admin_type">
                    <option value="">管理类别</option>
                    <option value="1" <?php if(($search["admin_type"]) == "1"): ?>selected="selected"<?php endif; ?>>业务员</option>
                    <option value="2" <?php if(($search["admin_type"]) == "2"): ?>selected="selected"<?php endif; ?>>财务员</option>
                    <option value="0" <?php if(($search["admin_type"]) == "0"): ?>selected="selected"<?php endif; ?>>超级管理员</option>
                </select>
            </div>
            <!--<div class="col-sm-2">-->
                <!--<select class="form-control" name="status">-->
                    <!--<option value="">员工状态</option>-->
                    <!--<option value="1" <?php if(($search["status"]) == "1"): ?>selected="selected"<?php endif; ?>>冻结</option>-->
                    <!--<option value="-1" <?php if(($search["status"]) == "-1"): ?>selected="selected"<?php endif; ?>>离职</option>-->
                    <!--<option value="0" <?php if(($search["status"]) == "0"): ?>selected="selected"<?php endif; ?>>在职</option>-->
                <!--</select>-->
            <!--</div>-->


            <div class="col-sm-2">
                <input type="text" name="admin_name" class="form-control" placeholder="员工姓名"
                       value="<?php echo ($search["admin_name"]); ?>">
            </div>
            <div class="col-sm-2">
                <input type="text" name="admin_login_name" class="form-control" placeholder="登陆账号"
                       value="<?php echo ($search["admin_login_name"]); ?>">
            </div>
            <input type="hidden" name="c" value="admin">
            <input type="hidden" name="a" value="index">
            <div class="col-sm-1">
                <button id="button-search" type="submit" class="btn btn-sm btn-info col-sm-12">搜索</button>
            </div>
        </form>
    </div>

    <table class="table table-hover">
        <thead>
        <tr>
            <th width="50">id</th>
            <th>登陆账号</th>
            <th width="150">员工姓名</th>
            <th width="150">管理类别</th>
            <th width="150">操作</th>
        </tr>
        </thead>
        <tbody>
        <?php if(is_array($Admins)): $i = 0; $__LIST__ = $Admins;if( count($__LIST__)==0 ) : echo "空" ;else: foreach($__LIST__ as $key=>$Admin): $mod = ($i % 2 );++$i;?><tr>
                <td><?php echo ($Admin["Id"]); ?></td>
                <td><?php echo ($Admin["admin_login_name"]); ?></td>
                <td><?php echo ($Admin["admin_name"]); ?></td>
                <td><?php echo ($Admin["admin_type"]); ?></td>
                <td>
                    <button attr-id="<?php echo ($Admin["Id"]); ?>" id="button-see" class="btn btn-sm btn-default">查看</button>
                    <button attr-id="<?php echo ($Admin["Id"]); ?>" attr-a="menu" attr-message="删除" id="button-del"
                            class="btn btn-sm btn-danger">删除
                    </button>
                </td>
            </tr><?php endforeach; endif; else: echo "空" ;endif; ?>

        </tbody>
    </table>
    <nav>
        <ul>
            <?php echo ($pageRes); ?>
        </ul>
    </nav>
</section>
<script>
    var SCOPE = {
        'add_url' : '/dswiliu/admin.php?c=Admin&a=add',
        'see_url': '/dswiliu/admin.php?c=Admin&a=see',
        'del_url': '/dswiliu/admin.php?c=Admin&a=del',
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