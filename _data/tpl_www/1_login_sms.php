<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->assign("title","会员登录"); ?><?php $this->output("head","file",true,false); ?>
<script type="text/javascript">
var maxtime = 60;
var mobile_send_lock = false;
var win_time_out;
function update_send_sms_loading()
{
	maxtime--;
	if(maxtime < 1){
		$("#mobile_send_status").val('发送手机验证码');
		mobile_send_lock = false;
		maxtime = 60;
		window.clearInterval(win_time_out);
		return true;
	}
	var tips = "验证码已发送("+maxtime+")";
	$("#mobile_send_status").val(tips);
}

function check_input()
{
	$("#login_submit").attr("disabled",true);
	var act = $.dialog.tips('正在登录，请稍候…');
	var mobile = $("input[name=mobile]").val();
	if(!mobile){
		$("#login_submit").attr("disabled",false);
		act.close();
		$.dialog.alert('手机号不能为空','','error');
		return false;
	}
	var code = $("input[name=_chkcode]").val();
	if(!code){
		$("#login_submit").attr("disabled",false);
		act.close();
		$.dialog.alert('验证码不能为空','','error');
		return false;
	}
	var url = api_url('login','sms','mobile='+mobile+"&_chkcode="+code);
	$.phpok.json(url,function(rs){
		$("#login_submit").attr("disabled",false);
		act.close();
		if(rs.status){
			var backurl = $("input[name=_back]").val();
			if(!backurl){
				backurl = webroot;
			}
			$.phpok.go(backurl);
			return true;
		}
		$.dialog.alert(rs.info,true,'error');
		return false;
	});
	return false;
}

function send_sms()
{
	if(mobile_send_lock){
		$.dialog.alert('验证码已发送，请一分钟后再执行');
		return false;
	}
	var url = api_url('vcode','sms','act=login');
	var mobile = $("#mobile").val();
	if(!mobile){
		$.dialog.alert('手机号不能为空');
		return false;
	}
	url += "&mobile="+mobile;
	$.dialog.tips("请稍候…");
	update_send_sms_loading();
	$.phpok.json(url,function(rs){
		if(rs.status){
			maxtime = 60;
			mobile_send_lock = true;
			win_time_out = window.setInterval("update_send_sms_loading()",1000);
		}else{
			$.dialog.alert(rs.info);
			$("#mobile_send_status").val('发送手机验证码');
		}
	})
}
</script>
<div class="main main-single main-login am-animation-scale-up">
	<form class="am-form" onsubmit="return check_input()" method="post">
		<input type="hidden" name="_back" id="_back" value="<?php echo $_back;?>" />
		<fieldset>
			<legend>手机号验证登录</legend>
			<div class="am-form-group">
				<label for="mobile">手机号</label>
				<div class="am-g am-g-collapse">
					<div class="am-u-sm-6"><input type="text" id="mobile" name="mobile" placeholder="请输入手机号" /></div>
					<div class="am-u-sm-1"></div>
					<div class="am-u-sm-5"><input type="button" value="发送手机验证码" onclick="send_sms()" class="am-btn am-btn-primary" id="mobile_send_status" /></div>
				</div>
			</div>
			<div class="am-form-group">
				<label for="_chkcode">手机验证码</label>
				<input type="text" name="_chkcode" id="_chkcode" placeholder="请输入手机上收到的验证码" />
			</div>
			<div class="am-form-group">
				<button type="submit" class="am-btn am-btn-primary" id="login_submit">登录</button>
			</div>
			<div class="am-form-group">
				<a href="<?php echo $sys['url'];?>" class="am-btn am-btn-default am-btn-xs">返回首页</a>
				<a href="<?php echo phpok_url(array('ctrl'=>'login'));?>" class="am-btn am-btn-default am-btn-xs"><i class="am-icon-user"></i> 账号密码登录</a>
				<?php if($login_email){ ?><a href="<?php echo phpok_url(array('ctrl'=>'login','func'=>'email'));?>" class="am-btn am-btn-default am-btn-xs"><i class="am-icon-envelope-o am-icon-fw"></i> 邮件登录</a><?php } ?>
			</div>
		</fieldset>
	</form>
</div>
<script type="text/javascript">
$(document).ready(function(){
	$("body").css('background-color','#EFEFEF');
});
</script>
<?php $this->output("foot","file",true,false); ?>