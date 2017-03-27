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
    <h2>商城订单</h2>
    <div class="form-group">
        <form action="/dswiliu/admin.php" method="get">
            <div class="col-md-offset-6 col-sm-2">
                <select class="form-control" name="handleState">
                    <option value="">处理状态</option>
                    <option value="0"
                    <?php if(($search["handleState"]) == "0"): ?>selected="selected"<?php endif; ?>
                    >待处理</option>
                    <option value="-1"
                    <?php if(($search["handleState"]) == "-1"): ?>selected="selected"<?php endif; ?>
                    >已发货</option>
                    <option value="1"
                    <?php if(($search["handleState"]) == "1"): ?>selected="selected"<?php endif; ?>
                    >已收货</option>
                </select>
            </div>

            <div class="col-sm-3">
                <input type="text" name="orderNo" class="form-control" placeholder="订单号"
                       value="<?php echo ($search["orderNo"]); ?>">
            </div>
            <input type="hidden" name="c" value="IntegralOrder">
            <input type="hidden" name="a" value="index">
            <div class="col-sm-1">
                <button id="button-search" type="submit" class="btn btn-sm btn-info col-sm-12">搜索</button>
            </div>
        </form>
    </div>
    <table class="table table-hover">
        <thead>
        <tr>
            <th width="100">订单号</th>
            <th width="100">手机号</th>
            <th width="100">姓名</th>
            <th>商品</th>
            <th width="80">积分</th>
            <th width="80">处理状态</th>
            <th width="170">下单时间</th>
            <th width="80">操作</th>
        </tr>
        </thead>
        <tbody>
        <?php if(is_array($IntegralOrders)): $i = 0; $__LIST__ = $IntegralOrders;if( count($__LIST__)==0 ) : echo "空" ;else: foreach($__LIST__ as $key=>$IntegralOrder): $mod = ($i % 2 );++$i;?><tr>
                <td><?php echo ($IntegralOrder["orderNo"]); ?></td>
                <td><?php echo (findLinkageById($IntegralOrder["userId"],'user','mobileNo')); ?></td>
                <td><?php echo (findLinkageById($IntegralOrder["userId"],'user','fullName')); ?></td>
                <td><?php echo (findLinkageById($IntegralOrder["mallId"],'integral_mall','title')); ?></td>
                <td><?php echo ($IntegralOrder["integral"]); ?></td>
                <td>
                    <span class="label label-<?php echo (getStatus($IntegralOrder["handleState"],array('warning','success','default','danger'))); ?>"><?php echo (getStatus($IntegralOrder["handleState"],array('未处理','已收货','已发货','错误'))); ?></span>
                </td>
                <td><?php echo ($IntegralOrder["updateTime"]); ?></td>
                <td>
                    <button attr-id="<?php echo ($IntegralOrder["Id"]); ?>" id="button-see" class="btn btn-sm btn-default">查看</button>
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
        'see_url': '/dswiliu/admin.php?c=IntegralOrder&a=see',
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