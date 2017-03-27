/**
 * 前端登陆页面
 * @author QI
 */
var login = {
    check : function () {
        //获取登陆页面中用户名和密码
        var ds_login = $('input[name="ds_login"]').val();
        var ds_password = $('input[name="ds_password"]').val();

        if(!ds_login){
            dialog.error('用户名不能为空');
        }
        if(!ds_password){
            dialog.error('密码不能为空');
        }

        var url = '/dswiliu/index.php?c=Login&a=check';
        var data = {'ds_login':ds_login,'ds_password':ds_password};
        //执行异步请求 $.post
        $.post(url,data,function (result) {
            if(result.status == 0){
                return dialog.error(result.message);
            }
            if(result.status == 1){
                return dialog.success(result.message, '/dswiliu/index.php?c=User');
            }
        },'JSON');
    }
}