function initField() {
	rowData.id && ($("#number").val(rowData.number), $("#name").val(rowData.name))
}
function initEvent() {
	var a = $("#number");
	Public.limitInput(a, /^[a-zA-Z0-9\-_]*$/), Public.bindEnterSkip($("#manage-wrap"), postData, oper, rowData.id), initValidator(), a.focus().select()
}
function initPopBtns() {
	var a = "add" == oper ? ["保存", "关闭"] : ["确定", "取消"];
	api.button({
		id: "confirm",
		name: a[0],
		focus: !0,
		callback: function() {
			return postData(oper, rowData.id), !1
		}
	}, {
		id: "cancel",
		name: a[1]
	})
}
function initValidator() {
	$.validator.addMethod("number", function(a) {
		return /^[a-zA-Z0-9\-_]*$/.test(a)
	}), $("#manage-form").validate({
		rules: {
			number: {
				required: !0,
				number: !0
			},
			name: {
				required: !0
			}
		},
		messages: {
			number: {
				required: "职员编号不能为空",
				number: "职员编号只能由数字、字母、-或_等字符组成"
			},
			name: {
				required: "职员名称不能为空"
			}
		},
		errorClass: "valid-error"
	})
}
function postData(a, b) {
	if (!$("#manage-form").validate().form()) return void $("#manage-form").find("input.valid-error").eq(0).focus();
	var c = $.trim($("#number").val()),
		d = $.trim($("#name").val()),
		e = "add" == a ? "新增职员" : "修改职员";
	params = rowData.id ? {
		id: b,
		number: c,
		name: d
	} : {
		number: c,
		name: d
	}, Public.ajaxPost("../basedata/employee?action=" + ("add" == a ? "add" : "update"), params, function(b) {
		200 == b.status ? (parent.parent.Public.tips({
			content: e + "成功！"
		}), callback && "function" == typeof callback && callback(b.data, a, window)) : parent.parent.Public.tips({
			type: 1,
			content: e + "失败！" + b.msg
		})
	})
}
function resetForm(a) {
	$("#manage-form").validate().resetForm(), $("#name").val(""), $("#number").val(Public.getSuggestNum(a.number)).focus().select()
}
var api = frameElement.api,
	oper = api.data.oper,
	rowData = api.data.rowData || {},
	callback = api.data.callback;
initPopBtns(), initField(), initEvent();