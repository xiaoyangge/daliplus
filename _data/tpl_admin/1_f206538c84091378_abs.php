<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><script type="text/javascript">
function vipext_data_move()
{
	var url = get_plugin_url('vipext','data_move');
	$.dialog.open(url,{
		'width':'700px',
		'height':'170px',
		'lock':true,
		'ok':function(){
			var iframe = this.iframe.contentWindow;
			if (!iframe.document.body) {
				alert('iframe还没加载完毕呢');
				return false;
			};
			iframe.save();
			return false;
		},
		'okVal':'开始迁移',
		'cancel':true
	})
}
function vipext_data_clear()
{
	var chkcode = "<?php echo $session['admin_rs']['vpass'];?>";
	if(!chkcode){
		$.dialog.alert('您还未设置二次密码，请先设置');
		return false;
	}
	$.dialog.prompt('请输入二次密码进行验证',function(val){
		var t = $.md5($.md5(val));
		if(t != chkcode){
			$.dialog.alert('密码不对，请填写新密码');
			return false
		}
		var url = get_plugin_url('vipext','data_clear');
		$.dialog.open(url,{
			'width':'700px',
			'height':'110px',
			'lock':true,
			'ok':function(){
				var iframe = this.iframe.contentWindow;
				if (!iframe.document.body) {
					alert('iframe还没加载完毕呢');
					return false;
				};
				iframe.save();
				return false;
			},
			'okVal':'开始清零',
			'cancel':true
		});
		return true;
	});
}
$(document).ready(function(){
	var btn = '<input type="button" value="数据迁移" onclick="vipext_data_move()" class="layui-btn layui-btn-sm layui-btn-normal" />';
	btn += '<input type="button" value="数据清零" onclick="vipext_data_clear()" class="layui-btn layui-btn-sm layui-btn-danger" />'
	$("div[phpok-id=JS_TITLE] .layui-btn-group").append(btn);
});
</script>