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
    <h2>会员查看-<?php echo ($Users["fullName"]); ?></h2>
    <p><a href="javascript:history.go(-1);" class="btn btn-sm btn-info">返回</a></p>
    <div class="col-lg-12">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    会员基本信息
                </h3>
            </div>
            <table class="table user_table">
                <tr>
                    <td>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">手机号:</label>
                            <div class="col-sm-8"><?php echo ($Users["mobileNo"]); ?></div>
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">姓名:</label>
                            <div class="col-sm-8"><?php echo ($Users["fullName"]); ?></div>
                        </div>
                    </td>
                    <td>
                        <div class="form-group has-error">
                            <label class="col-sm-4 control-label">密码:</label>
                            <div class="col-sm-8">
                                <button class="btn btn-sm btn-danger" attr-id="<?php echo ($Users["Id"]); ?>" id="button-passwordReset">重置密码</button>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">车牌号:</label>
                            <div class="col-sm-8"><?php echo ($Users["plateNo"]); ?></div>
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">车型:</label>
                            <div class="col-sm-8"><?php echo ($Users["carType"]); ?></div>
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">装货吨数:</label>
                            <div class="col-sm-8"><?php echo ($Users["tonnage"]); ?> 吨</div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">积分:</label>
                            <div class="col-sm-8">
                                <?php echo ($Users["integral"]); ?>
                                &nbsp;&nbsp;
                                <button class="btn btn-sm btn-danger" attr-id="<?php echo ($Users["Id"]); ?>" id="button-integral">增加积分</button>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">注册时间:</label>
                            <div class="col-sm-8"><?php echo ($Users["registerDateTime"]); ?></div>
                        </div>
                    </td>
                    <td></td>
                    <!--<td>-->
                        <!--<div class="form-group">-->
                            <!--<label class="col-sm-4 control-label">状态:</label>-->
                            <!--<div class="col-sm-8">-->
                                <!--<?php if($Users["statusAudit"] == 0): ?>-->
                                    <!--<button class="btn btn-sm btn-success" attr-id="<?php echo ($Users["Id"]); ?>" arrt-val="1" id="button-passed">通过</button>-->
                                    <!--<button class="btn btn-sm btn-default" attr-id="<?php echo ($Users["Id"]); ?>" arrt-val="-1" id="button-not-passed">不通过</button>-->
                                    <!--<?php else: ?>-->
                                    <!--<span class="label label-<?php echo (getStatus($Users['statusAudit'],array('warning','success','default','danger'))); ?>"><?php echo (getStatus($Users['statusAudit'],array('待审核','已通过','未通过','错误'))); ?></span>-->
                                <!--<?php endif; ?>-->
                            <!--</div>-->
                        <!--</div>-->
                    <!--</td>-->
                    <!--<td>-->
                        <!--<?php if($Users["statusAudit"] == -1): ?>-->
                            <!--<div class="form-group">-->
                                <!--<label class="col-sm-4 control-label">退回原因:</label>-->
                                <!--<div class="col-sm-8"><?php echo ($Users["reason"]); ?></div>-->
                            <!--</div>-->
                        <!--<?php endif; ?>-->
                    <!--</td>-->
                </tr>
            </table>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    会员其他信息
                </h3>
            </div>
            <table class="table user_table">
                <tr>
                    <td>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">港口账号:</label>
                            <div class="col-sm-8"><?php echo ((isset($Users["portNo"]) && ($Users["portNo"] !== ""))?($Users["portNo"]):"未填写"); ?></div>
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">港口密码:</label>
                            <div class="col-sm-8"><?php echo ((isset($Users["portPassword"]) && ($Users["portPassword"] !== ""))?($Users["portPassword"]):"未填写"); ?></div>
                        </div>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">银行卡:</label>
                            <div class="col-sm-8"><?php echo ((isset($Users["bankCard"]) && ($Users["bankCard"] !== ""))?($Users["bankCard"]):"未填写"); ?></div>
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">银行户名:</label>
                            <div class="col-sm-8"><?php echo ((isset($Users["bankName"]) && ($Users["bankName"] !== ""))?($Users["bankName"]):"未填写"); ?></div>
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">开户行:</label>
                            <div class="col-sm-8"><?php echo ((isset($Users["bankOpen"]) && ($Users["bankOpen"] !== ""))?($Users["bankOpen"]):"未填写"); ?></div>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <!--会员扩展信息/TAB切换-->
        <ul id="myTab" class="nav nav-tabs">
            <li class="active"><a href="#logistics" data-toggle="tab">物流订单</a></li>
            <li><a href="#amerce" data-toggle="tab">罚款订单</a></li>
            <li><a href="#shop" data-toggle="tab">商城订单</a></li>

        </ul>
        <div id="myTabContent" class="tab-content">

            <div class="tab-pane fade in active" id="logistics">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th width="150">订单号</th>
                        <th>任务发布人</th>
                        <th>装货地</th>
                        <th>卸货地</th>
                        <th>装货吨数</th>
                        <th width="80">处理状态</th>
                        <th width="170">接单时间</th>
                        <th width="80">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(is_array($LogisticsOrders)): $i = 0; $__LIST__ = $LogisticsOrders;if( count($__LIST__)==0 ) : echo "空" ;else: foreach($__LIST__ as $key=>$LogisticsOrder): $mod = ($i % 2 );++$i;?><tr>
                            <td><?php echo ($LogisticsOrder["orderNo"]); ?></td>
                            <td><?php echo (findLinkageById($LogisticsOrder["logisticsId"],'logistics','release')); ?></td>
                            <td><?php echo (findLinkageById($LogisticsOrder["logisticsId"],'logistics','loadingAddr')); ?></td>
                            <td><?php echo (findLinkageById($LogisticsOrder["logisticsId"],'logistics','unloadingAddr')); ?></td>
                            <td><?php echo ($LogisticsOrder["tonnage"]); ?> 吨</td>
                            <td>
                                <span class="label label-<?php echo (getStatus($LogisticsOrder["handle"],array('warning','success','info','danger'))); ?>"><?php echo (getStatus($LogisticsOrder["handle"],array('未处理','已结款','已处理','错误'))); ?></span>
                            </td>
                            <td><?php echo ($LogisticsOrder["shippingDate"]); ?></td>
                            <td>
                                <button attr-id="<?php echo ($LogisticsOrder["Id"]); ?>" id="Logistics-see" class="btn btn-sm btn-default">查看</button>
                            </td>
                        </tr><?php endforeach; endif; else: echo "空" ;endif; ?>

                    </tbody>
                </table>
            </div>
            <div class="tab-pane fade" id="amerce">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th width="50">id</th>
                        <th>罚单号</th>
                        <th>处罚金额</th>
                        <th>滞纳金</th>
                        <th>服务费</th>
                        <th width="170">罚款日期</th>
                        <th width="80">状态</th>
                        <th width="170">提交时间</th>
                        <th width="80">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(is_array($Amerces)): $i = 0; $__LIST__ = $Amerces;if( count($__LIST__)==0 ) : echo "空" ;else: foreach($__LIST__ as $key=>$Amerce): $mod = ($i % 2 );++$i;?><tr>
                            <td><?php echo ($Amerce["Id"]); ?></td>
                            <td><?php echo ($Amerce["amerceNo"]); ?></td>
                            <td><?php echo ($Amerce["money"]); ?> 元</td>
                            <td><?php echo ($Amerce["lateMoney"]); ?> 元</td>
                            <td><?php echo ($Amerce["serviceMoney"]); ?> 元</td>
                            <td><?php echo ($Amerce["amerceDateTime"]); ?></td>
                            <td>
                                <span class="label label-<?php echo (getStatus($Amerce["financeHandle"],array('warning','success','default','danger'))); ?>"><?php echo (getStatus($Amerce["financeHandle"],array('未处理','已处理','已退回','错误'))); ?></span>
                            </td>
                            <td><?php echo ($Amerce["submitDateTime"]); ?></td>
                            <td>
                                <button attr-id="<?php echo ($Amerce["Id"]); ?>" id="Amerce-see" class="btn btn-sm btn-default">查看</button>
                            </td>
                        </tr><?php endforeach; endif; else: echo "空" ;endif; ?>

                    </tbody>
                </table>
            </div>
            <div class="tab-pane fade" id="shop">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th width="100">订单号</th>
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
                            <td><?php echo (findLinkageById($IntegralOrder["mallId"],'integral_mall','title')); ?></td>
                            <td><?php echo ($IntegralOrder["integral"]); ?></td>
                            <td>
                                <span class="label label-<?php echo (getStatus($IntegralOrder["handleState"],array('warning','success','default','danger'))); ?>"><?php echo (getStatus($IntegralOrder["handleState"],array('未处理','已收货','已发货','错误'))); ?></span>
                            </td>
                            <td><?php echo ($IntegralOrder["updateTime"]); ?></td>
                            <td>
                                <button attr-id="<?php echo ($IntegralOrder["Id"]); ?>" id="Integral-see" class="btn btn-sm btn-default">查看</button>
                            </td>
                        </tr><?php endforeach; endif; else: echo "空" ;endif; ?>

                    </tbody>
                </table>
            </div>
        </div>

        <!--<form class="form-horizontal" id="singcms-form">-->
            <!--<div class="form-group">-->
                <!--<label class="col-sm-2 control-label">类别名称:</label>-->
                <!--<label class="col-sm-5 control-label">123123</label>-->
                <!--<div class="col-sm-5">-->
                    <!--123123-->
                <!--</div>-->
            <!--</div>-->
            <!--<input type="hidden" name="Id" value="<?php echo ($LogisticsType["Id"]); ?>">-->
            <!--<div class="form-group">-->
                <!--<div class="col-sm-offset-2 col-sm-10">-->
                    <!--<button type="button" class="btn btn-default" id="singcms-button-submit">修改</button>-->
                <!--</div>-->
            <!--</div>-->
        <!--</form>-->

    </div>

</section>
<script>
    var SCOPE = {
        'audit_modify_url' : '/dswiliu/admin.php?c=user&a=userModify',
        'Logistics_see_url': '/dswiliu/admin.php?c=LogisticsOrder&a=see',
        'Amerce_see_url': '/dswiliu/admin.php?c=Amerce&a=see',
        'Integral_see_url': '/dswiliu/admin.php?c=IntegralOrder&a=see',
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