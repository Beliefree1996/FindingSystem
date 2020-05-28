//打开字滑入效果
window.onload = function(){
	$(".connect p").eq(0).animate({"left":"0%"}, 600);
	$(".connect p").eq(1).animate({"left":"0%"}, 400);
};
//jquery.validate表单验证
$(document).ready(function(){
	//登陆表单验证
	$("#loginForm").validate({
		rules:{
			username:{
				required:true,//必填
				minlength:3, //最少3个字符
				maxlength:16,//最多16个字符
				valied:true,
			},
			password:{
				required:true,
				minlength:3, 
				maxlength:16,
				valied:true,
			},
		},
		//错误信息提示
		messages:{
			username:{
				required:"必须填写用户名",
				minlength:"用户名至少为3个字符",
				maxlength:"用户名至多为16个字符",
			},
			password:{
				required:"必须填写密码",
				minlength:"密码至少为3个字符",
				maxlength:"密码至多为16个字符",
			},
		},

	});
	//注册表单验证
	$("#registerForm").validate({
		rules:{
			username:{
				required:true,//必填
				minlength:3, //最少3个字符
				maxlength:16,//最多16个字符
				valied:true,
			},
			password:{
				required:true,
				minlength:3, 
				maxlength:16,
				valied:true,
			},
		},
		//错误信息提示
		messages:{
			username:{
				required:"必须填写用户名",
				minlength:"用户名至少为3个字符",
				maxlength:"用户名至多为16个字符",
			},
			password:{
				required:"必须填写密码",
				minlength:"密码至少为3个字符",
				maxlength:"密码至多为16个字符",
			},
		
		},
	});
	//添加自定义验证规则


	jQuery.validator.addMethod("valied", function(value, element) {
		return this.optional(element) || /^[a-zA-Z0-9\u4e00-\u9fa5-_]+$/.test(value);
	}, "只能包含中文、英文字母、数字和下划线");

});
