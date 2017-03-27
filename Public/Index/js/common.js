/**
 * Created by TDSA on 2016/11/3.
 */
//首页搜索
$('.top_blue .J_default').click(function () {
    $('a.top_logo').css("display","none");
    $(this).removeClass('J_default');
    $(this).addClass('J_search');
    $(this).prev('div').css("display","block");
    $(this).prev('div').children('input').focus()
})

$('.top_blue').on('click','.J_search',function () {
    var title = $('input[name="title"]').val();
    if(title){
        var url = '/dswiliu/index.php';
        window.location.href = url + '?title=' + title;
    }
})
//顶部返回链接
$('header[headerHref]').click(function () {
    var url = $(this).attr('headerHref');
    window.location.href = url;
})
//会员完善信息
$('.user_datum_group #ul-register, #li-logisticsOrder, .user_menu li').click(function () {
    var url = $(this).attr('liHref');
    window.location.href = url;
})
//会员退出
$('.user_out button').click(function () {
    var url = $(this).attr('liHref');
    window.location.href = url;
})
//提交会员完善信息
$("#register-submit").click(function () {
    var data = $("#register-form").serializeArray();
    postData = {};
    $(data).each(function (i) {
        postData[this.name] = this.value;
    });
    console.log(postData);

    //将获取到的数据POST给服务器
    url = SCOPE.save_url;
    jump_url = SCOPE.jump_url;
    $.post(url, postData, function (result) {
        if (result.status == 1) {
            return dialog.success(result.message, jump_url);
        } else if (result.status == 0) {
            return dialog.error(result.message);
        }
    }, "JSON");
})
// 物流订购按钮
$('.loadSon').on('click','.J_logistics #logistics-placeOrder',function () {

    var id = $(this).attr('attr-id');
    var payWay = $(this).attr('attr-payWay');
    var tonnage = $(this).attr('attr-tonnage');
    var message = $(this).attr('attr-message');
    var url = SCOPE.logistics_order_url;

    data = {};
    data['id'] = id;



    layer.open({
        type    :   0,
        title   :   '是否下单？',
        btn     :   ['是', '否'],
        icon    :   3,
        closeBtn:   2,
        content :   '付款方式：'+payWay+'<br>是否确定'+message,
        scrollbar:  true,
        yes: function () {
            layer.prompt(
                {
                    title: '请填写拉货吨数!',
                    formType: 0,
                    value: tonnage, //初始时的值，默认空字符
                },
                function(tonnage){
                    data['tonnage'] = tonnage;
                    todeleteJump(url, data);
                }
            )
        },
    })
});

//删除等其他调用
function todelete(url, data) {
    $.post(
        url,
        data,
        function (s) {
            if (s.status == 1) {
                return dialog.success(s.message, s.data);
            } else {
                return dialog.error(s.message);
            }
        }, "JSON"
    );
}

//删除等其他调用跳转
function todeleteJump(url, data) {
    $.post(
        url,
        data,
        function (s) {
            if (s.status == 1) {
                return dialog.success(s.message, s.data);
            } else {
                return dialog.errorJump(s.message, s.data);
            }
        }, "JSON"
    );
}


//提交from表单操作

$("#singcms-button-submit").click(function () {
    var data = $("#singcms-form").serializeArray();
    postData = {};
    $(data).each(function (i) {
        postData[this.name] = this.value;
    });
    console.log(postData);
    //将获取到的数据POST给服务器

    url = SCOPE.save_url;
    jump_url = SCOPE.jump_url;
    $.post(url, postData, function (result) {
        if (result.status == 1) {
            return dialog.success(result.message, jump_url + result.data);
        } else if (result.status == 0) {
            return dialog.error(result.message);
        }
    }, "JSON");
});
//订单类别
$('.logisticsOrderType li,.IntegralsOrderType li').click(function () {
    var attrType = $(this).attr('attr-type');
    var url = SCOPE.order_type_url;
    window.location.href = url + '&type=' + attrType;
})

//物流订单/积分商城详情
$('.loadSon').on('click','#IntegralMallShow, .logisticsOrderList #logisticsOrderShow,.IntegralsOrderList #IntegralsOrderShow',function () {
//$('.logisticsOrderList #logisticsOrderShow,.integralMallList #IntegralMallShow,.IntegralsOrderList #IntegralsOrderShow').click(function () {
    var attrId = $(this).attr('attr-id');
    var url = SCOPE.show_url;
    window.location.href = url + '&id=' + attrId;
})

//物流分类

$('#logisticsType').on('click', function () {
    $(this).find('ul').fadeToggle();
})
$('#logisticsType .J_typeId').on('click', function () {
    var id = $(this).attr('attr-id');
    var url = '/dswiliu/index.php?c=index';
    window.location.href = url + '&typeId=' + id;
})

//添加按钮操作
$('.user_form #button-add').on('click', function () {
    var url = SCOPE.add_url;
    window.location.href = url;
})

//修改模式
$('.user_form #ul-modify, #td-modify').on('click', function () {

    var id = $(this).attr('attr-id');
    var url = SCOPE.modify_url + '&id=' + id;
    window.location.href = url;

})


//删除模式
$('.user_delivery #button-del').on('click', function () {

    var id = $(this).attr('attr-id');
    var a = $(this).attr('attr-a');
    var message = $(this).attr('attr-message');
    var url = SCOPE.del_url;

    data = {};
    data['id'] = id;

    layer.open({
        type: 0,
        title: '是否提交？',
        btn: ['是', '否'],
        icon: 3,
        closeBtn: 2,
        content: '是否确定' + message,
        scrollbar: true,
        yes: function () {
            todelete(url, data);
        },
    })
    return false;
});

//积分兑换购物车
$('.integral #integralShoppingCart').on('click', function () {
    data = {};
    data['id'] = $(this).attr('attr-id');

    var url = SCOPE.exchange_url;

    $.post(
        url,
        data,
        function (s) {
            if (s.status == 0) {
                return dialog.errorJump(s.message, s.data);
            }
            if (s.status == 1) {
                window.location.href = s.data;
            }
        }, "JSON"
    );


})
//积分商品选择地址
$('.integral #deliveryChecked').on('click', function () {
    $(this).siblings('ul').removeClass('checked');
    $(this).addClass('checked');
    var id = $(this).attr('attr-id');
    $(this).siblings('#integralExchange').attr('attr-deliveryId', id);
})
//积分兑换按钮
$('.integral #integralExchange').on('click', function () {

    var id = $(this).attr('attr-id');
    var deliveryId = $(this).attr('attr-deliveryId');
    var payWay = $(this).attr('attr-payWay');
    var message = $(this).attr('attr-message');
    var url = SCOPE.exchange_url;
    if (!deliveryId) {
        deliveryId = 0;
    }

    data = {};
    data['id'] = id;
    data['deliveryId'] = deliveryId;

    layer.open({
        type: 0,
        title: '是否兑换？',
        btn: ['是', '否'],
        icon: 3,
        closeBtn: 2,
        content: '兑换物品：' + payWay + '<br>是否确定' + message,
        scrollbar: true,
        yes: function () {
            todelete(url, data);
        },
    })
});
//======================================================================


//查看模式
$('.table-hover #button-see').on('click', function () {
    var id = $(this).attr('attr-id');
    var url = SCOPE.see_url + '&id=' + id;
    window.location.href = url;
});

//通过审核
$('.user_table #button-passed').on('click', function () {
    var id = $(this).attr('attr-id');
    var url = SCOPE.audit_modify_url;

    data = {};
    data['id'] = id;
    data['statusAudit'] = 1;
    data['message'] = '审核';

    layer.open({
        type: 0,
        title: '是否提交？',
        btn: ['是', '否'],
        icon: 3,
        closeBtn: 2,
        content: '是否通过审核',
        scrollbar: true,
        yes: function () {
            todelete(url, data);
        },
    })


});
//未通过审核
$('.user_table #button-not-passed').on('click', function () {
    var id = $(this).attr('attr-id');
    var url = SCOPE.audit_modify_url;

    data = {};
    data['id'] = id;
    data['statusAudit'] = -1;
    data['message'] = '审核';

    layer.prompt(
        {
            title: '请填写未通过原因!',
            formType: 2
        },
        function (reason) {
            data['reason'] = reason;
            todelete(url, data);
        }
    )
});

//重置密码 button-passwordReset
$('.user_table #button-passwordReset').on('click', function () {
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
        function (password) {
            data['password'] = password;
            todelete(url, data);
        }
    )
});

