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
    <h2>货源信息-修改信息</h2>
    <p><a href="javascript:history.go(-1);" class="btn btn-sm btn-info">返回</a></p>
    <div class="col-lg-6">

        <form class="form-horizontal" id="singcms-form">
            <div class="form-group">
                <label class="col-sm-2 control-label">货物类别:</label>
                <div class="col-sm-5">
                    <select class="form-control" name="typeId">
                        <option value="">请选择货物类别</option>
                        <?php if(is_array($LogisticsTypes)): foreach($LogisticsTypes as $key=>$LogisticsType): ?><option value="<?php echo ($LogisticsType["Id"]); ?>" <?php if(($Logistics["typeId"]) == $LogisticsType["Id"]): ?>selected="selected"<?php endif; ?>><?php echo ($LogisticsType["typeName"]); ?></option><?php endforeach; endif; ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">发布人:</label>
                <div class="col-sm-8">
                    <input type="text" value="<?php echo ($Logistics["release"]); ?>" name="release" class="form-control" placeholder="请输入发布人">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">货物名称:</label>
                <div class="col-sm-5">
                    <input type="text" value="<?php echo ($Logistics["goodsName"]); ?>" name="goodsName" class="form-control" placeholder="请输入货物名称">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">装货地:</label>
                <div class="col-sm-5">
                    <input type="text" value="<?php echo ($Logistics["loadingAddr"]); ?>" name="loadingAddr" class="form-control" placeholder="请输入装货地">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">卸货地:</label>
                <div class="col-sm-5">
                    <input type="text" value="<?php echo ($Logistics["unloadingAddr"]); ?>" name="unloadingAddr" class="form-control" placeholder="请输入卸货地">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">价钱:</label>
                <div class="col-sm-4">
                    <div class="input-group">
                        <input type="text" value="<?php echo ($Logistics["Price"]); ?>" name="Price" class="form-control" placeholder="请输入数字">
                        <span class="input-group-addon">元/吨</span>
                    </div>

                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">剩余量:</label>
                <div class="col-sm-3">
                    <div class="input-group">
                        <input type="text" value="<?php echo ($Logistics["surplus"]); ?>" name="surplus"class="form-control" placeholder="请输入数字">
                        <span class="input-group-addon">吨</span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">允亏比例:</label>
                <div class="col-sm-4">
                    <div class="input-group">
                        <input type="text" value="<?php echo ($Logistics["allowProportion"]); ?>" name="allowProportion" class="form-control" placeholder="0.0028">
                        <span class="input-group-addon"></span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">亏扣单价:</label>
                <div class="col-sm-4">
                    <div class="input-group">
                        <input type="text" value="<?php echo ($Logistics["lackPrice"]); ?>" name="lackPrice" class="form-control" placeholder="请输入数字">
                        <span class="input-group-addon">元/吨</span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">支付方式:</label>
                <div class="col-sm-5">
                    <select class="form-control" name="payWay">
                        <option value="">请选择支付方式</option>
                        <option value="1" <?php if($Logistics["payWay"] == 1): ?>selected="selected"<?php endif; ?>>货到付款</option>
                        <option value="2" <?php if($Logistics["payWay"] == 2): ?>selected="selected"<?php endif; ?>>发货付款</option>
                        <option value="3" <?php if($Logistics["payWay"] == 3): ?>selected="selected"<?php endif; ?>>发货定金-货到结款</option>
						<option value="4" <?php if($Logistics["payWay"] == 4): ?>selected="selected"<?php endif; ?>>回单结算</option>
                    </select>
                </div>
            </div>

            <input type="hidden" name="Id" value="<?php echo ($Logistics["Id"]); ?>">
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="button" class="btn btn-default" id="singcms-button-submit">修改</button>
                </div>
            </div>
        </form>

    </div>

</section>
<script>
    var SCOPE = {
        'save_url' : '/dswiliu/admin.php?c=Logistics&a=add',
        'jump_url' : '/dswiliu/admin.php?c=Logistics',
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