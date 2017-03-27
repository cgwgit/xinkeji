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
    <h2>商城订单查看-<?php echo ($IntegralOrders["orderNo"]); ?></h2>
    <p><a href="javascript:history.go(-1);" class="btn btn-sm btn-info">返回</a></p>
    <div class="col-lg-12">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    订单基本信息
                </h3>
            </div>
            <table class="table IntegralOrder_table IntegralOrder_user_table">
                <tr>
                    <td>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">订单号:</label>
                            <div class="col-sm-8"><?php echo ($IntegralOrders["orderNo"]); ?></div>
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">积分:</label>
                            <div class="col-sm-8"><?php echo ($IntegralOrders["integral"]); ?></div>
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">下单时间:</label>
                            <div class="col-sm-8"><?php echo ($IntegralOrders["updateTime"]); ?></div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">收货地址:</label>

                            <ul class="col-sm-10 list-group">
                                <li class="list-group-item">收件人：<?php echo ($IntegralOrderDeliveryI["consignee"]); ?></li>
                                <li class="list-group-item">联系电话：<?php echo ($IntegralOrderDeliveryI["mobileNo"]); ?></li>
                                <li class="list-group-item">收件区域：<?php echo ($IntegralOrderDeliveryI["area"]); ?></li>
                                <li class="list-group-item">收件地址：<?php echo ($IntegralOrderDeliveryI["address"]); ?></li>
                            </ul>
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">处理状态:</label>
                            <div class="col-sm-8">
                                <?php if($IntegralOrders["handleState"] == 0): ?><button class="btn btn-sm btn-success" attr-id="<?php echo ($IntegralOrders["Id"]); ?>" arrt-val="-1"
                                            id="button-passed">发货
                                    </button>
                                    <?php else: ?>
                                    <span class="label label-<?php echo (getStatus($IntegralOrders["handleState"],array('warning','success','default','danger'))); ?>"><?php echo (getStatus($IntegralOrders["handleState"],array('未处理','已收货','已发货','错误'))); ?></span><?php endif; ?>
                            </div>
                        </div>
                    </td>
                </tr>

            </table>
        </div>
        <!--会员扩展信息/TAB切换-->
        <ul id="myTab" class="nav nav-tabs">
            <li class="active"><a href="#mall" data-toggle="tab">商品信息</a></li>
            <li><a href="#user" data-toggle="tab">会员信息</a></li>
        </ul>
        <div id="myTabContent" class="tab-content">
            <div class="tab-pane fade in active" id="mall">
                <table class="table IntegralOrder_user_table">
                    <tr>
                        <td colspan="2">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">商品标题:</label>
                                <div class="col-sm-10"><?php echo ($IntegralOrderIntegral["title"]); ?></div>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">商品ID:</label>
                                <div class="col-sm-8"><?php echo ($IntegralOrderIntegral["Id"]); ?></div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">积分:</label>
                                <div class="col-sm-8"><?php echo ($IntegralOrderIntegral["integral"]); ?></div>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">运费:</label>
                                <div class="col-sm-8"><?php echo ($IntegralOrderIntegral["freight"]); ?></div>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">库存总量:</label>
                                <div class="col-sm-8"><?php echo ($IntegralOrderIntegral["stock"]); ?></div>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">商品图片:</label>
                                <div class="col-sm-8"><img src="<?php echo ($IntegralOrderIntegral["uploadImg"]); ?>" width="100%"></div>
                            </div>
                        </td>
                        <td colspan="2">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">商品内容:</label>
                                <div class="col-sm-10"><?php echo ($IntegralOrderIntegral["content"]); ?></div>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="tab-pane fade" id="user">
                <table class="table IntegralOrder_user_table">
                    <tr>
                        <td>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">手机号:</label>
                                <div class="col-sm-8"><?php echo ($IntegralOrderUser["mobileNo"]); ?></div>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">姓名:</label>
                                <div class="col-sm-8"><?php echo ($IntegralOrderUser["fullName"]); ?></div>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">注册时间:</label>
                                <div class="col-sm-8"><?php echo ($IntegralOrderUser["registerDateTime"]); ?></div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">车牌号:</label>
                                <div class="col-sm-8"><?php echo ($IntegralOrderUser["plateNo"]); ?></div>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">车型:</label>
                                <div class="col-sm-8"><?php echo ($IntegralOrderUser["carType"]); ?></div>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">积分:</label>
                                <div class="col-sm-8"><?php echo ($IntegralOrderUser["integral"]); ?></div>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>

        </div>


    </div>

</section>
<script>
    var SCOPE = {
        'audit_modify_url': '/dswiliu/admin.php?c=IntegralOrder&a=IntegralOrderModify',
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