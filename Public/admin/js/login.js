/**
 * 后台登陆业务类
 * Created by TDSA on 2016/11/3.
 */

var login = {
    check : function () {
        //获取登陆页面中用户名和密码
        var admin_login_name = $('input[name="admin_login_name"]').val();
        var admin_password = $('input[name="admin_password"]').val();

        if(!admin_login_name){
            dialog.error('用户名不能为空');
        }
        if(!admin_password){
            dialog.error('密码不能为空');
        }

        var url = '/dswiliu/admin.php?c=Login&a=check';
        var data = {'admin_login_name':admin_login_name,'admin_password':admin_password};
        //执行异步请求 $.post
        $.post(url,data,function (result) {
            if(result.status == 0){
                return dialog.error(result.message);
            }
            if(result.status == 1){
                return dialog.success(result.message, '/dswiliu/admin.php?a=index');
            }
        },'JSON');
    }
}
