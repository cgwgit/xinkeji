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
<!--时间样式文件 -->
<link rel="stylesheet" type="text/css" href="/dswiliu/Public/admin/bootstrap/datetimepicker/css/bootstrap-datetimepicker.min.css" />
<section class="container">
    <h2>物流订单查看-<?php echo ($LogisticsOrders["orderNo"]); ?></h2>
    <p><a href="javascript:history.go(-1);" class="btn btn-sm btn-info">返回</a></p>
    <div class="col-lg-12">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    订单基本信息
                </h3>
            </div>
            <table class="table LogisticsOrder_table">
                <tr>
                    <td>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">订单号:</label>
                            <div class="col-sm-8"><?php echo ($LogisticsOrders["orderNo"]); ?></div>
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">接单时间:</label>
                            <div class="col-sm-8"><?php echo ($LogisticsOrders["shippingDate"]); ?></div>
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <div class="col-sm-6">装货<?php echo ($LogisticsOrders["tonnage"]); ?> 吨</div>
                            <div class="col-sm-6">
                                <?php if($LogisticsOrders["handleBusiness"] == 0): ?><button class="btn btn-sm btn-info" id="button-passed" attr-id="<?php echo ($LogisticsOrders["Id"]); ?>">点击处理</button>
                                    <?php else: ?>
                                    <span class="label label-info">已处理</span><?php endif; ?>
                            </div>
                        </div>
                    </td>
                </tr>

            </table>
        </div>
        <!--会员扩展信息/TAB切换-->
        <ul id="myTab" class="nav nav-tabs">
            <li class="active"><a href="#user" data-toggle="tab">会员信息</a></li>
            <li><a href="#logistics" data-toggle="tab">物流信息</a></li>

        </ul>
        <div id="myTabContent" class="tab-content">

            <div class="tab-pane fade in active" id="user">
                <table class="table user_table">
                    <tr>
                        <td>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">手机号:</label>
                                <div class="col-sm-8"><?php echo ($LogisticsOrderUser["mobileNo"]); ?></div>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">姓名:</label>
                                <div class="col-sm-8"><?php echo ($LogisticsOrderUser["fullName"]); ?></div>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">注册时间:</label>
                                <div class="col-sm-8"><?php echo ($LogisticsOrderUser["registerDateTime"]); ?></div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">车牌号:</label>
                                <div class="col-sm-8"><?php echo ($LogisticsOrderUser["plateNo"]); ?></div>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">车型:</label>
                                <div class="col-sm-8"><?php echo ($LogisticsOrderUser["carType"]); ?></div>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">载货量:</label>
                                <div class="col-sm-8"><?php echo ($LogisticsOrderUser["tonnage"]); ?> 吨</div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">港口账号:</label>
                                <div class="col-sm-8"><?php echo ((isset($LogisticsOrderUser["portNo"]) && ($LogisticsOrderUser["portNo"] !== ""))?($LogisticsOrderUser["portNo"]):"未填写"); ?></div>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">港口密码:</label>
                                <div class="col-sm-8"><?php echo ((isset($LogisticsOrderUser["portPassword"]) && ($LogisticsOrderUser["portPassword"] !== ""))?($LogisticsOrderUser["portPassword"]):"未填写"); ?></div>
                            </div>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">银行卡:</label>
                                <div class="col-sm-8"><?php echo ((isset($LogisticsOrderUser["bankCard"]) && ($LogisticsOrderUser["bankCard"] !== ""))?($LogisticsOrderUser["bankCard"]):"未填写"); ?></div>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">银行户名:</label>
                                <div class="col-sm-8"><?php echo ((isset($LogisticsOrderUser["bankName"]) && ($LogisticsOrderUser["bankName"] !== ""))?($LogisticsOrderUser["bankName"]):"未填写"); ?></div>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">开户行:</label>
                                <div class="col-sm-8"><?php echo ((isset($LogisticsOrderUser["bankOpen"]) && ($LogisticsOrderUser["bankOpen"] !== ""))?($LogisticsOrderUser["bankOpen"]):"未填写"); ?></div>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="tab-pane fade" id="logistics">
                <table class="table user_table">
                    <tr>
                        <td>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">货物类别:</label>
                                <div class="col-sm-8"><?php echo (getLogisticsTypeFind($LogisticsOrderLogistics["typeId"])); ?></div>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">货物名称:</label>
                                <div class="col-sm-8"><?php echo ($LogisticsOrderLogistics["goodsName"]); ?></div>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">发布人:</label>
                                <div class="col-sm-8"><?php echo ($LogisticsOrderLogistics["release"]); ?></div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">装货地:</label>
                                <div class="col-sm-8"><?php echo ($LogisticsOrderLogistics["loadingAddr"]); ?></div>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">卸货地:</label>
                                <div class="col-sm-8"><?php echo ($LogisticsOrderLogistics["unloadingAddr"]); ?></div>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">总吨数:</label>
                                <div class="col-sm-8"><?php echo ($LogisticsOrderLogistics["allNo"]); ?></div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">价钱:</label>
                                <div class="col-sm-8"><?php echo ($LogisticsOrderLogistics["Price"]); ?></div>
                            </div>
                        </td>
                        <td colspan="2">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">支付方式:</label>
                                <div class="col-sm-10">
                                    <?php if($LogisticsOrderLogistics["payWay"] == 1): ?>货到付款<?php endif; ?>
                                    <?php if($LogisticsOrderLogistics["payWay"] == 2): ?>发货付款<?php endif; ?>
                                    <?php if($LogisticsOrderLogistics["payWay"] == 3): ?>发货定金-货到结款<?php endif; ?>
									<?php if($LogisticsOrderLogistics["payWay"] == 4): ?>回单结算<?php endif; ?>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">亏扣单价:</label>
                                <div class="col-sm-8"><?php echo ($LogisticsOrderLogistics["lackPrice"]); ?></div>
                            </div>
                        </td>
                        <td colspan="2">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">允亏比例:</label>
                                <div class="col-sm-8"><?php echo ($LogisticsOrderLogistics["allowProportion"]); ?></div>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <!--回执单-->
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    回执单
                </h3>
            </div>
            <form ng-app="Logistics" id="singcms-form">
                <table class="table user_table" ng-controller="LogisticsOrder">
                    <tr>
                        <td>
                            <div class="form-group">
                                <?php if($adminUser["admin_type"] == 1): ?><label class="col-sm-4 control-label">处理业务员:</label>
                                    <div class="col-sm-8">
                                        <?php echo ($adminUser["admin_name"]); ?>
                                        <input type="hidden" name="businessId" value="<?php echo ($adminUser["Id"]); ?>"/>
                                    </div>
                                    <?php elseif($adminUser["admin_type"] == 2): ?>
                                    <label class="col-sm-4 control-label">结款财务员:</label>
                                    <div class="col-sm-8">
                                        <?php echo ($adminUser["admin_name"]); ?>
                                        <input type="hidden" name="financeId" value="<?php echo ($adminUser["Id"]); ?>"/>
                                    </div>
                                    <?php else: ?>
                                    <label class="col-sm-4 control-label"></label>
                                    <div class="col-sm-8">
                                        <?php echo ($adminUser["admin_name"]); ?>
                                    </div><?php endif; ?>
                            </div>
                        </td>
						<td>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">卸货日期:</label>
                                <div class="col-sm-8">
                                    <div class="input-group date form_datetime" data-date="1979-09-16T05:25:07Z"
                                         data-date-format="dd MM yyyy - HH:ii p" data-link-field="dischargeData">
                                        <input class="form-control" size="16" type="text" value="<?php echo ((isset($LogisticsOrderReceipt["dischargeData"]) && ($LogisticsOrderReceipt["dischargeData"] !== ""))?($LogisticsOrderReceipt["dischargeData"]):''); ?>"
                                               readonly>
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                        <span class="input-group-addon"><span
                                                class="glyphicon glyphicon-th"></span></span>
                                    </div>
                                    <input name="dischargeData" type="hidden" id="dischargeData" value="<?php echo ((isset($LogisticsOrderReceipt["dischargeData"]) && ($LogisticsOrderReceipt["dischargeData"] !== ""))?($LogisticsOrderReceipt["dischargeData"]):''); ?>"/><br/>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">收单日期:</label>
                                <div class="col-sm-8">
                                    <div class="input-group date form_datetime" data-date="1979-09-16T05:25:07Z"
                                         data-date-format="dd MM yyyy - HH:ii p" data-link-field="acquiringDate">
                                        <input class="form-control" size="16" type="text" value="<?php echo ((isset($LogisticsOrderReceipt["acquiringDate"]) && ($LogisticsOrderReceipt["acquiringDate"] !== ""))?($LogisticsOrderReceipt["acquiringDate"]):''); ?>"
                                               readonly>
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                        <span class="input-group-addon"><span
                                                class="glyphicon glyphicon-th"></span></span>
                                    </div>
                                    <input name="acquiringDate" type="hidden" id="acquiringDate" value="<?php echo ((isset($LogisticsOrderReceipt["acquiringDate"]) && ($LogisticsOrderReceipt["acquiringDate"] !== ""))?($LogisticsOrderReceipt["acquiringDate"]):''); ?>"/><br/>
                                </div>
                            </div>
                        </td>
                        
                    </tr>
                    <tr>
                        <td>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">代理商:</label>
                                <div class="col-sm-8"><?php echo ($LogisticsOrderLogistics["release"]); ?></div>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">货名:</label>
                                <div class="col-sm-8"><?php echo ($LogisticsOrderLogistics["goodsName"]); ?></div>
                            </div>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">车老板:</label>
                                <div class="col-sm-8"><?php echo ($LogisticsOrderUser["fullName"]); ?></div>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">车号:</label>
                                <div class="col-sm-8"><?php echo ($LogisticsOrderUser["plateNo"]); ?></div>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">是否加油卡:</label>
                                <div class="col-sm-8">
                                    <label><input type="radio" name="petrolCard" value="1" <?php if(($LogisticsOrderReceipt["petrolCard"]) == "1"): ?>checked="checked"<?php endif; ?> /> 是</label>
                                    <label><input type="radio" name="petrolCard" value="0" <?php if(($LogisticsOrderReceipt["petrolCard"]) == "0"): ?>checked="checked"<?php endif; ?> /> 否</label>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">装重:</label>
                                <div class="col-sm-8"><?php echo ($LogisticsOrders["tonnage"]); ?> 吨</div>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">运费单价:</label>
                                <div class="col-sm-8"><?php echo ($LogisticsOrderLogistics["Price"]); ?> 元/吨</div>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">运费总价:</label>
                                <div class="col-sm-8"><?php echo ($LogisticsOrders['tonnage'] * $LogisticsOrderLogistics['Price']); ?>
                                    元
                                </div>
                            </div>
                        </td>

                    </tr>
                    <tr>
                        <td>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">亏扣单价:</label>
                                <div class="col-sm-8"><?php echo ($LogisticsOrderLogistics["lackPrice"]); ?> 元/吨</div>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">允亏比例:</label>
                                <div class="col-sm-8"><?php echo ($LogisticsOrderLogistics["allowProportion"]); ?></div>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">可以亏吨:</label>
                                <div class="col-sm-8">
                                    <?php echo ($LogisticsOrders['tonnage'] * $LogisticsOrderLogistics['allowProportion']); ?> 吨
                                </div>
                            </div>
                        </td>

                    </tr>
                    <tr>
                        <td>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">卸重:</label>
                                <div class="col-sm-8">
                                    <div class="input-group input-group-sm">
                                        <input type="text" name="dischargeWeight" class="form-control"
                                               placeholder="请输入数字" ng-model="dischargeWeight" value="">
                                        <span class="input-group-addon">吨</span>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">亏吨:</label>
                                <div class="col-sm-8">{{lackWeight()}} 吨
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">实际亏吨:</label>
                                <div class="col-sm-8">{{actualLackWeight()}} 吨
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">亏扣总额:</label>
                                <div class="col-sm-8">{{allLackPrice()}} 元</div>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">应付运费:</label>
                                <div class="col-sm-8">{{payPrice()}} 元</div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">已付金额:</label>
                                <div class="col-sm-8">
                                    <div class="input-group input-group-sm">
                                        <input type="text" name="prepaidMoney" class="form-control" placeholder="请输入数字"
                                               ng-model="prepaidMoney">
                                        <span class="input-group-addon">元</span>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">欠车上:</label>
                                <div class="col-sm-8">{{arrearsPrice()}}</div>
                            </div>
                        </td>
                        <td></td>
                    </tr>
                    <?php if($adminUser["admin_type"] != 0): ?><tr>
                            <td></td>
                            <td><input type="hidden" name="logisticsOrderId" value="<?php echo ($LogisticsOrders["Id"]); ?>"></td>
                            <td>
                                <?php if($adminUser["admin_type"] == 1): ?><button class="btn btn-sm btn-warning" id="singcms-button-submit">确认处理</button>
                                    <?php elseif($adminUser["admin_type"] == 2): ?>
                                    <button class="btn btn-sm btn-danger" id="singcms-button-financeId">确认结款</button><?php endif; ?>
                            </td>
                        </tr><?php endif; ?>
                </table>
            </form>
        </div>

    </div>

</section>
<script>
    var SCOPE = {
        'save_url': '/dswiliu/admin.php?c=LogisticsOrder&a=LogisticsOrderReceipt',
        'jump_url': '/dswiliu/admin.php?c=LogisticsOrder&a=see&id=<?php echo ($LogisticsOrders["Id"]); ?>',
        'audit_modify_url': '/dswiliu/admin.php?c=LogisticsOrder&a=handleBusiness',
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
<script type="text/javascript" src="/dswiliu/Public/Index/js/angular.min.js"></script>
<!--计算JS文件 -->
<script>
    angular.module('Logistics', [])
            .controller('LogisticsOrder', function ($scope) {

                $scope.dischargeWeight = '<?php echo ((isset($LogisticsOrderReceipt["dischargeWeight"]) && ($LogisticsOrderReceipt["dischargeWeight"] !== ""))?($LogisticsOrderReceipt["dischargeWeight"]):""); ?>';//卸重
                $scope.prepaidMoney = '<?php echo ((isset($LogisticsOrderReceipt["prepaidMoney"]) && ($LogisticsOrderReceipt["prepaidMoney"] !== ""))?($LogisticsOrderReceipt["prepaidMoney"]):0); ?>';//已付金额
                $scope.allowWeight = "<?php echo ($LogisticsOrders['tonnage'] * $LogisticsOrderLogistics['allowProportion']); ?>";//允亏吨数
                $scope.lackPrice = "<?php echo ($LogisticsOrderLogistics["lackPrice"]); ?>";//亏扣单价
                $scope.allPrice = "<?php echo ($LogisticsOrders['tonnage'] * $LogisticsOrderLogistics['Price']); ?>";//运费总价

                $scope.lackWeight = function () {
                    var loadingWeight = <?php echo ($LogisticsOrders["tonnage"]); ?>
                    ;
                    var dischargeWeight = $scope.dischargeWeight;
                    if (dischargeWeight) {
                        var lackWeight = Math.round((loadingWeight - dischargeWeight) * 100) / 100;
                        return lackWeight;
                    }
                    return 0;
                };//亏吨
                $scope.actualLackWeight = function () {
                    var allowWeight = $scope.allowWeight;
                    var lackWeight = $scope.lackWeight();
                    if (lackWeight) {
                        var actualLackWeight = Math.round((lackWeight - allowWeight) * 100) / 100;
                        if (actualLackWeight > 0) {
                            return actualLackWeight;
                        }
                    }
                    return 0;
                };//实际亏吨
                $scope.allLackPrice = function () {
                    var lackPrice = $scope.lackPrice;
                    var actualLackWeight = $scope.actualLackWeight();
                    if (actualLackWeight) {
                        var allLackPrice = Math.round(lackPrice * actualLackWeight * 100) / 100;
                        return allLackPrice;
                    }
                    return 0;
                };//亏扣总额
                $scope.payPrice = function () {
                    var allPrice = $scope.allPrice;
                    var allLackPrice = $scope.allLackPrice();
                    var payPrice = allPrice - allLackPrice;
                    return payPrice;

                };//应付运费
                $scope.arrearsPrice = function () {
                    var payPrice = $scope.payPrice();
                    var prepaidMoney = $scope.prepaidMoney;
                    var arrearsPrice = payPrice - prepaidMoney;
                    return arrearsPrice;
                }
            })

</script>
<!--时间JS文件 -->
<script type="text/javascript" src="/dswiliu/Public/admin/bootstrap/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="/dswiliu/Public/admin/bootstrap/datetimepicker/js/locales/bootstrap-datetimepicker.zh-CN.js"></script>
<script>
    $('.form_datetime').datetimepicker({
        format: 'yyyy-mm-dd hh:ii:ss',
        language: 'zh-CN',
        weekStart: 1,
        todayBtn: 1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        forceParse: 0,
        showMeridian: 1
    });
</script>