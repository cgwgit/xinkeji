/**
 * Created by TDSA on 2016/11/3.
 */
//添加按钮操作
$('#button-add').click(function () {
    var url = SCOPE.add_url;
    window.location.href = url;
})

//提交from表单操作

$("#singcms-button-submit ,#singcms-button-financeId").click(function () {
    var data = $("#singcms-form").serializeArray();
    postData = {};
    $(data).each(function (i) {
        postData[this.name] = this.value;
    });
    console.log(postData);
    //将获取到的数据POST给服务器

    url = SCOPE.save_url;
    jump_url =  SCOPE.jump_url;;
    $.post(url,postData,function (result) {
        if(result.status == 1){
            return dialog.success(result.message,jump_url);
        }else if(result.status == 0){
            return dialog.error(result.message);
        }
    },"JSON");
});

//修改模式
$('.table-hover #button-modify').on('click',function () {
    var id = $(this).attr('attr-id');
    var url = SCOPE.modify_url + '&id=' + id;
    window.location.href = url;
})

//删除模式
$('.table-hover #button-del').on('click',function () {
    var id = $(this).attr('attr-id');
    var a = $(this).attr('attr-a');
    var message = $(this).attr('attr-message');
    var url = SCOPE.del_url;

    data = {};
    data['id'] = id;

    layer.open({
        type    :   0,
        title   :   '是否提交？',
        btn     :   ['yes', 'no'],
        icon    :   3,
        closeBtn:   2,
        content :   '是否确定'+message,
        scrollbar:  true,
        yes     :   function () {
            todelete(url, data);
        },
    })
});
function todelete(url, data) {
    $.post(
        url,
        data,
        function (s) {
            if(s.status == 1){
                return dialog.success(s.message,'');
            }else {
                return dialog.error(s.message);
            }
        },"JSON"
    );
}

//查看模式
$('.table-hover #button-see').on('click',function () {
    var id = $(this).attr('attr-id');
    var url = SCOPE.see_url + '&id=' + id;
    window.location.href = url;
});

//IntegralOrder_user_table
$('.IntegralOrder_user_table #button-passed').on('click',function () {
    var id = $(this).attr('attr-id');
    var url = SCOPE.audit_modify_url;

    data = {};
    data['id'] = id;
    data['statusAudit'] = -1;
    data['message'] = '处理';

    layer.open({
        type    :   0,
        title   :   '是否提交？',
        btn     :   ['yes', 'no'],
        icon    :   3,
        closeBtn:   2,
        content :   '是否确认处理',
        scrollbar:  true,
        yes     :   function () {
            todelete(url, data);
        },
    })
});

//通过审核
$('.user_table #button-passed').on('click',function () {
    var id = $(this).attr('attr-id');
    var url = SCOPE.audit_modify_url;

    data = {};
    data['id'] = id;
    data['statusAudit'] = 1;
    data['message'] = '处理';

    layer.open({
        type    :   0,
        title   :   '是否提交？',
        btn     :   ['yes', 'no'],
        icon    :   3,
        closeBtn:   2,
        content :   '是否确认处理',
        scrollbar:  true,
        yes     :   function () {
            todelete(url, data);
        },
    })
});
//未通过审核
$('.user_table #button-not-passed').on('click',function () {
    var id = $(this).attr('attr-id');
    var url = SCOPE.audit_modify_url;

    data = {};
    data['id'] = id;
    data['statusAudit'] = -1;
    data['message'] = '处理';

    layer.prompt(
        {
            title: '请填写未通过原因!',
            formType: 2
        },
        function(reason){
            data['reason'] = reason;
            todelete(url, data);
        }
    )
});

//重置密码 button-passwordReset
$('.user_table #button-passwordReset').on('click',function () {
    var id = $(this).attr('attr-id');
    var url = SCOPE.audit_modify_url;

    data = {};
    data['id'] = id;
    data['message'] = '重置';

    layer.prompt(
        {
            title: '请设定新密码!',
            formType: 1
        },
        function(password){
            data['password'] = password;
            todelete(url, data);
        }
    )
});

//增加积分 button-integral
$('.user_table #button-integral').on('click',function () {
    var id = $(this).attr('attr-id');
    var url = SCOPE.audit_modify_url;

    data = {};
    data['id'] = id;
    data['message'] = '增加';

    layer.prompt(
        {
            title: '请填写增加积分数额!',
            formType: 0
        },
        function(integral){
            data['integral'] = integral;
            todelete(url, data);
        }
    )
});

//会员查看模式
$('.table-hover #Logistics-see').on('click',function () {
    var id = $(this).attr('attr-id');
    var url = SCOPE.Logistics_see_url + '&id=' + id;
    window.location.href = url;
});
$('.table-hover #Amerce-see').on('click',function () {
    var id = $(this).attr('attr-id');
    var url = SCOPE.Amerce_see_url + '&id=' + id;
    window.location.href = url;
});
$('.table-hover #Integral-see').on('click',function () {
    var id = $(this).attr('attr-id');
    var url = SCOPE.Integral_see_url + '&id=' + id;
    window.location.href = url;
});

//物流订单确认处理
$('.LogisticsOrder_table #button-passed').on('click',function () {
    var id = $(this).attr('attr-id');
    var url = SCOPE.audit_modify_url;

    data = {};
    data['id'] = id;
    data['handleBusiness'] = 1;
    data['message'] = '处理';

    layer.open({
        type    :   0,
        title   :   '是否提交？',
        btn     :   ['yes', 'no'],
        icon    :   3,
        closeBtn:   2,
        content :   '是否确认处理',
        scrollbar:  true,
        yes     :   function () {
            todelete(url, data);
        },
    })
});