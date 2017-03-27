var dialog = {
    // 错误弹出层
    error: function(message) {
        layer.open({
            content:message,
            icon:2,
            title : '错误提示',
        });
    },
    // 错误弹出层跳转
    errorJump: function(message,url) {
        layer.open({
            content:message,
            icon:2,
            title : '错误提示',
            yes : function(){
                location.href=url;
            },
        });
    },

    //成功弹出层
    success : function(message,url) {
        layer.open({
            content : message,
            icon : 1,
            yes : function(){
                location.href=url;
            },
        });
    },

    // 确认弹出层
    confirm : function(message, url) {
        layer.open({
            content : message,
            icon:3,
            btn : ['是','否'],
            yes : function(){
                location.href=url;
            },
        });
    },

    //无需跳转到指定页面的确认弹出层
    toconfirm : function(message) {
        layer.open({
            content : message,
            icon:3,
            btn : ['确定'],
        });
    },

    //输入弹出层
    inputfirm : function (message,url) {
        layer.prompt(
            {
            title: message,
            formType: 2
            },
            function(reason){
                location.href=url + '?reason=' + reason;
            }
        );
    }

}

