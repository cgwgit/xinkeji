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
    <h2>积分商品-添加商品</h2>
    <p><a href="javascript:history.go(-1);" class="btn btn-sm btn-info">返回</a></p>
    <div class="col-lg-6">

        <form class="form-horizontal" id="singcms-form">
            <div class="form-group">
                <label class="col-sm-2 control-label">标题:</label>
                <div class="col-sm-8">
                    <input type="text" name="title" class="form-control" placeholder="请输入标题">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">积分:</label>
                <div class="col-sm-4">
                    <div class="input-group">
                        <input type="text" name="integral" class="form-control" placeholder="请输入数字">
                        <span class="input-group-addon">分</span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">运费:</label>
                <div class="col-sm-4">
                    <div class="input-group">
                        <input type="text" name="freight" class="form-control" placeholder="请输入数字">
                        <span class="input-group-addon">元</span>
                    </div>
                </div>
                <label class="col-sm-4 control-label">"空"或"0"为包邮</label>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">库存:</label>
                <div class="col-sm-4">
                    <div class="input-group">
                        <input type="text" name="stock" class="form-control" placeholder="请输入数字">
                        <span class="input-group-addon">件</span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">内容:</label>
                <div class="col-sm-4">
                    <textarea name="content" style="width:800px;height:400px;visibility:hidden;"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">首页图片:</label>
                <div class="col-sm-6">
                    <div class="input-group">
                        <input type="text" name="uploadImg" class="form-control" id="urlUpLoad" placeholder="请上传图片">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button" id="imageUpLoad">上传</button>
                        </span>
                    </div>
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
        'save_url': '/dswiliu/admin.php?c=IntegralMall&a=add',
        'jump_url': '/dswiliu/admin.php?c=IntegralMall',
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

<link rel="stylesheet" type="text/css" href="/dswiliu/Public/kindeditor/themes/default/default.css" />
<link rel="stylesheet" type="text/css" href="/dswiliu/Public/kindeditor/plugins/code/prettify.css" />
<script type="text/javascript" src="/dswiliu/Public/kindeditor/kindeditor-min.js"></script>
<script type="text/javascript" src="/dswiliu/Public/kindeditor/lang/zh_CN.js"></script>
<script type="text/javascript" src="/dswiliu/Public/kindeditor/plugins/code/prettify.js"></script>
<script>
    KindEditor.ready(function(K) {
        var editor = K.create('textarea[name="content"]', {
            cssPath : '/dswiliu/Public/kindeditor/plugins/code/prettify.css',
            uploadJson : '/dswiliu/Public/kindeditor/php/upload_json.php',
            fileManagerJson : '/dswiliu/Public/kindeditor/php/file_manager_json.php',
            allowFileManager : true,
            resizeType:0,
            afterBlur:function(){
                this.sync();
            }
        });
        prettyPrint();
        K('#imageUpLoad').click(function() {
            editor.loadPlugin('image', function() {
                editor.plugin.imageDialog({
                    imageUrl : K('#urlUpLoad').val(),
                    clickFn : function(url, title, width, height, border, align) {
                        K('#urlUpLoad').val(url);
                        editor.hideDialog();
                    }
                });
            });
        });
    });
</script>