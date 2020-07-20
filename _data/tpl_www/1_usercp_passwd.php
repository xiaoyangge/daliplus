<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $title = "修改个人密码 - 会员中心";?><?php $this->assign("title",$title); ?><?php $this->output("header","file",true,false); ?>
<script type="text/javascript">
$(document).ready(function(){
	$("#userinfo_password").submit(function(){
		$(this).ajaxSubmit({
			'type':'post',
			'dataType':'json',
			'url':api_url('usercp','passwd'),
			'success':function(rs){
				if(rs.status){
					$.dialog.alert("您的密码更新成功",function(){
						$.phpok.reload();
					},'succeed');
				}else{
					$.dialog.alert(rs.info);
					return false;
				}
			}
		});
		return false;
	});
});
</script>
<div class="main">
	<?php $this->output("block/breadcrumb","file",true,false); ?>
	<div class="left"><?php $this->output("block/usercp_nav","file",true,false); ?></div>
	<div class="right am-panel-group">
		<div class="am-panel am-panel-default">
			<div class="am-panel-hd">密码修改</div>
			<div class="am-panel-bd">
				<form method="post" id="userinfo_password" class="am-form am-form-horizontal">
				<?php if($rs['pass']){ ?>
				<div class="am-form-group">
					<label for="oldpass" class="am-u-sm-2 am-form-label">旧密码</label>
					<div class="am-u-sm-10"><input type="password" name="oldpass" id="oldpass" /></div>
				</div>
				<?php } ?>
				<div class="am-form-group">
					<label for="newpass" class="am-u-sm-2 am-form-label"> 新密码</label>
					<div class="am-u-sm-10"><input type="password" name="newpass" id="newpass" /></div>
				</div>
				<div class="am-form-group">
					<label for="chkpass" class="am-u-sm-2 am-form-label">确认新密码</label>
					<div class="am-u-sm-10"><input type="password" name="chkpass" id="chkpass" /></div>
				</div>
				<div class="am-form-group">
					<label class="am-u-sm-2 am-form-label"></label>
					<div class="am-u-sm-10"><input type="submit" id="phpok_submit" value="提 交" class="am-btn am-btn-primary"></div>
				</div>
				</form>
			</div>
		</div>
		<div class="am-panel am-panel-default">
			<div class="am-panel-hd">友情说明</div>
			<div class="am-panel-bd">
				<ul>
					<li>密码长度不能小于6位数</li>
					<li>为保证您数据的安全，密码建议您使用：字母+数字+大小写混合</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="clear"></div>
</div>

<?php $this->output("footer","file",true,false); ?>