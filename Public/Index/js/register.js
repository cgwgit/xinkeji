/**
 * 前端登陆页面
 * @author QI
 */
var login = {
    check : function () {
        //获取登陆页面中用户名和密码
        var mobileNo = $('input[name="mobileNo"]').val();
        var password = $('input[name="password"]').val();
        var passwordRepeat = $('input[name="passwordRepeat"]').val();
        var fullName = $('input[name="fullName"]').val();
        var plateNo = $('input[name="plateNo"]').val();
        var carType = $('input[name="carType"]').val();
        var tonnage = $('input[name="tonnage"]').val();
        var inviteCode = $('input[name="inviteCode"]').val();

        var url = '/dswiliu/index.php?c=register&a=check';
        var data = {
            'mobileNo':mobileNo,
            'password':password,
            'passwordRepeat':passwordRepeat,
            'fullName':fullName,
            'plateNo':plateNo,
            'carType':carType,
            'tonnage':tonnage,
            'inviteCode':inviteCode
        };
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