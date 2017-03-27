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
    <h2>积分商品</h2>
    <div class="form-group">
        <div class="col-sm-1">
            <button id="button-add" class="btn btn-sm btn-success col-sm-12">添加</button>
        </div>
        <form action="/dswiliu/admin.php" method="get">
            <div class="col-md-offset-7 col-sm-3">
                <input type="text" name="searchTitle" class="form-control" placeholder="商品标题关键字"
                       value="<?php echo ($search["searchTitle"]); ?>">
            </div>
            <input type="hidden" name="c" value="IntegralMall">
            <input type="hidden" name="a" value="index">
            <div class="col-sm-1">
                <button id="button-search" type="submit" class="btn btn-sm btn-info col-sm-12">搜索</button>
            </div>
        </form>
    </div>


    <table class="table table-hover">
        <thead>
        <tr>
            <th>id</th>
            <th>标题</th>
            <th>积分</th>
            <th>运费</th>
            <th>库存</th>
            <th>销量</th>
            <th>更新时间</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php if(is_array($IntegralMalls)): $i = 0; $__LIST__ = $IntegralMalls;if( count($__LIST__)==0 ) : echo "空" ;else: foreach($__LIST__ as $key=>$IntegralMall): $mod = ($i % 2 );++$i;?><tr>
                <td width="50"><?php echo ($IntegralMall["Id"]); ?></td>
                <td><?php echo ($IntegralMall["title"]); ?></td>
                <td><?php echo ($IntegralMall["integral"]); ?></td>
                <td><?php echo ($IntegralMall["freight"]); ?></td>
                <td><?php echo ($IntegralMall["stock"]); ?></td>
                <td><?php echo ($IntegralMall["sales"]); ?></td>
                <td><?php echo ($IntegralMall["updateTime"]); ?></td>
                <td>
                    <button attr-id="<?php echo ($IntegralMall["Id"]); ?>" id="button-modify" class="btn btn-sm btn-info">修改</button>
                    <button attr-id="<?php echo ($IntegralMall["Id"]); ?>" attr-a="menu" attr-message="删除" id="button-del"
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
        'add_url': '/dswiliu/admin.php?c=IntegralMall&a=add',
        'modify_url': '/dswiliu/admin.php?c=IntegralMall&a=modify',
        'del_url': '/dswiliu/admin.php?c=IntegralMall&a=del',
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