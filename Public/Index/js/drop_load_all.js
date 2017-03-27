var itemIndex = 0;
var loadEnd = false;

var p = 0;
// 每页展示4个
var pageSize = 4;

// dropload
$('.loadFather').dropload({
    scrollArea: window,
    loadDownFn: function (me) {
        p++;
        // 加载菜单一的数据
        $.ajax({
            type: 'GET',
            url: SCOPE.drop_load_url + '&pageSize=' + pageSize + '&p=' + p,
            dataType: 'json',
            success: function (data) {
                //调用页面JS
                var result = dataLoad(data)

                if (data.length < pageSize || data.length == 0) {
                    // 数据加载完
                    loadEnd = true;
                    // 锁定
                    me.lock();
                    // 无数据
                    me.noData();
                    // break;
                }
                // 为了测试，延迟1秒加载
                setTimeout(function () {
                    $('.loadSon').eq(itemIndex).append(result);
                    // 每次数据加载完，必须重置
                    me.resetload();
                }, 500);

            },
            error: function (xhr, type) {
                alert('Ajax error!');
                // 即使加载出错，也得重置
                me.resetload();
            }
        });
    }
});
