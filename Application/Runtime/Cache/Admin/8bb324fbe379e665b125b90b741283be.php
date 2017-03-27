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
    <h2>罚款处理-<?php echo ($Amerces["amerceNo"]); ?></h2>
    <p><a href="javascript:history.go(-1);" class="btn btn-sm btn-info">返回</a></p>
    <div class="col-lg-12">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    罚款信息
                </h3>
            </div>
            <table class="table user_table">
                <tr>
                    <td>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">罚款单号:</label>
                            <div class="col-sm-8"><?php echo ($Amerces["amerceNo"]); ?></div>
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">处罚日期:</label>
                            <div class="col-sm-8"><?php echo ($Amerces["amerceDateTime"]); ?></div>
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">提交时间:</label>
                            <div class="col-sm-8"><?php echo ($Amerces["submitDateTime"]); ?></div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">处罚金额:</label>
                            <div class="col-sm-8"><?php echo ($Amerces["money"]); ?></div>
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">滞纳金:</label>
                            <div class="col-sm-8"><?php echo ($Amerces["lateMoney"]); ?></div>
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">服务费:</label>
                            <div class="col-sm-8"><?php echo ($Amerces["serviceMoney"]); ?></div>
                        </div>
                    </td>
                </tr>
                <tr>

                    <td>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">状态:</label>
                            <div class="col-sm-8">
                                <?php if($Amerces["financeHandle"] == 0): ?><button class="btn btn-sm btn-success" attr-id="<?php echo ($Amerces["Id"]); ?>" arrt-val="1"
                                            id="button-passed">处理
                                    </button>
                                    <button class="btn btn-sm btn-default" attr-id="<?php echo ($Amerces["Id"]); ?>" arrt-val="-1"
                                            id="button-not-passed">退回
                                    </button>
                                    <?php else: ?>
                                    <span class="label label-<?php echo (getStatus($Amerces["financeHandle"],array('warning','success','default','danger'))); ?>"><?php echo (getStatus($Amerces["financeHandle"],array('待处理','已处理','已退回','错误'))); ?></span><?php endif; ?>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <?php if($Amerces["financeHandle"] == -1): ?><label class="col-sm-4 control-label">退回原因:</label>
                                <div class="col-sm-8"><?php echo ($Amerces["reason"]); ?></div>
                                <?php elseif($Amerces["financeHandle"] == 1): ?>
                                <label class="col-sm-4 control-label">处理时间:</label>
                                <div class="col-sm-8"><?php echo ($Amerces["disposeDateTime"]); ?></div><?php endif; ?>
                        </div>
                    </td>

                    <td>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">总金额:</label>
                            <div class="col-sm-8"><?php echo ($Amerces["allMoney"]); ?></div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" align="center"><img width="800" src="<?php echo ($Amerces["amerceImg"]); ?>"></td>
                </tr>
            </table>
        </div>


        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    会员信息
                </h3>
            </div>

            <table class="table user_table">
                <tr>
                    <td>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">手机号:</label>
                            <div class="col-sm-8"><?php echo ($AmerceUser["mobileNo"]); ?></div>
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">姓名:</label>
                            <div class="col-sm-8"><?php echo ($AmerceUser["fullName"]); ?></div>
                        </div>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">车牌号:</label>
                            <div class="col-sm-8"><?php echo ($AmerceUser["plateNo"]); ?></div>
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">车型:</label>
                            <div class="col-sm-8"><?php echo ($AmerceUser["carType"]); ?></div>
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">装货吨数:</label>
                            <div class="col-sm-8"><?php echo ($AmerceUser["tonnage"]); ?> 吨</div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">注册时间:</label>
                            <div class="col-sm-8"><?php echo ($AmerceUser["registerDateTime"]); ?></div>
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">积分:</label>
                            <div class="col-sm-8"><?php echo ($AmerceUser["integral"]); ?></div>
                        </div>
                    </td>
                    <td>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">港口账号:</label>
                            <div class="col-sm-8"><?php echo ((isset($AmerceUser["portNo"]) && ($AmerceUser["portNo"] !== ""))?($AmerceUser["portNo"]):"未填写"); ?></div>
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">港口密码:</label>
                            <div class="col-sm-8"><?php echo ((isset($AmerceUser["portPassword"]) && ($AmerceUser["portPassword"] !== ""))?($AmerceUser["portPassword"]):"未填写"); ?></div>
                        </div>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">银行卡:</label>
                            <div class="col-sm-8"><?php echo ((isset($AmerceUser["bankCard"]) && ($AmerceUser["bankCard"] !== ""))?($AmerceUser["bankCard"]):"未填写"); ?></div>
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">银行户名:</label>
                            <div class="col-sm-8"><?php echo ((isset($AmerceUser["bankName"]) && ($AmerceUser["bankName"] !== ""))?($AmerceUser["bankName"]):"未填写"); ?></div>
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">开户行:</label>
                            <div class="col-sm-8"><?php echo ((isset($AmerceUser["bankOpen"]) && ($AmerceUser["bankOpen"] !== ""))?($AmerceUser["bankOpen"]):"未填写"); ?></div>
                        </div>
                    </td>
                </tr>
            </table>
        </div>

    </div>

</section>
<script>
    var SCOPE = {
        'audit_modify_url': '/dswiliu/admin.php?c=Amerce&a=AmerceModify',
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