<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->assign("title","会员注册"); ?><?php $this->output("head","file",true,false); ?>
<div class="main main-single am-animation-scale-up">
	<div class="am-g">
		<div class="am-u-sm-6">
			<form class="am-form am-form-horizontal" method="post" id="register-form" onsubmit="return $.register.save('register-form')">
			<fieldset>
				<legend>会员注册</legend>
				<?php if($grouplist && count($grouplist) > 1){ ?>
				<div class="am-form-group">
					<label for="group_id" class="am-u-sm-3 am-form-label">会员组</label>
					<div class="am-u-sm-9">
						<select name="group_id" id="group_id" onchange="$.register.group(this.value)">
						<?php $grouplist_id["num"] = 0;$grouplist=is_array($grouplist) ? $grouplist : array();$grouplist_id = array();$grouplist_id["total"] = count($grouplist);$grouplist_id["index"] = -1;foreach($grouplist as $key=>$value){ $grouplist_id["num"]++;$grouplist_id["index"]++; ?>
						<option value="<?php echo $value['id'];?>"<?php if($group_id == $value['id']){ ?> selected<?php } ?>><?php echo $value['title'];?></option>
						<?php } ?>
						</select>
					</div>
				</div>
				<?php } else { ?>
				<input type="hidden" name="group_id" id="group_id" value="<?php echo $group_id;?>" />
				<?php } ?>
				<input type="hidden" name="_login" id="_login" value="1" title="注册成功后自动登录" />
				<input type="hidden" name="_back" id="_back" value="<?php echo $_back;?>" title="注册成功后跳转网址" />
				<div class="am-form-group">
					<label for="email" class="am-u-sm-3 am-form-label">手机号：</label>
					<div class="am-u-sm-9">
						<input type="text" name="mobile" id="mobile" placeholder="填写手机号，暂时仅支持中国大陆手机号">
					</div>
				</div>
				<div class="am-form-group">
					<label for="_chkcode" class="am-u-sm-3 am-form-label">验证码：</label>
					<div class="am-u-sm-5">
						<input type="text" name="_vcode" id="_vcode" />
					</div>	
					<div class="am-u-sm-4"><input type="button" value="获取验证码" onclick="$.register.sms_code('mobile','<?php echo $group_rs['tpl_id'];?>',this)" class="am-btn am-btn-default" id="mobile_send_status" /></div>
				</div>
				<div class="am-form-group">
					<label for="newpass" class="am-u-sm-3 am-form-label">密码：</label>
					<div class="am-u-sm-9">
						<input class="input" type="password" name="newpass" id="newpass" placeholder="设置密码，要求不少于6位，建议数字 + 字母" />
					</div>
				</div>
				<div class="am-form-group">
					<label for="chkpass" class="am-u-sm-3 am-form-label">确认密码：</label>
					<div class="am-u-sm-9">
						<input class="input" type="password" name="chkpass" id="chkpass" placeholder="再次输入上面的密码" />
					</div>
				</div>
				<?php if($is_vcode){ ?>
				<div class="am-form-group">
					<label for="_chkcode" class="am-u-sm-3 am-form-label">验证码：</label>
					<div class="am-u-sm-5">
						<input type="text" name="_chkcode" id="_chkcode" placeholder="填写右边图片上的数字" />
					</div>	
					<div class="am-u-sm-3" style="margin-top:5px;text-align:left;"><img src="" border="0" align="absmiddle" id="vcode" class="hand" /></div>
					<div class="am-u-sm-2"></div>
				</div>
				<script type="text/javascript">
				$(document).ready(function(){
					$("#vcode").phpok_vcode();
					$("#vcode").click(function(){
						$(this).phpok_vcode();
					});
				});
				</script>
				<?php } ?>
				<div class="am-form-group">
					<div class="am-u-sm-3"></div>
					<label class="am-u-sm-9"><input type="checkbox" id="is_ok" name="is_ok"> 我已阅读并完全同意阅读注册协议</label>
			    </div>
			    <div class="am-form-group">
					<div class="am-u-sm-3"></div>
					<div class="am-u-sm-9">
						<button type="submit" class="am-btn am-btn-primary">注册会员</button>
						<a href="<?php echo $sys['url'];?>" class="am-btn am-btn-default am-fr">返回首页</a>
					</div>
				</div>
			</fieldset>
			</form>
		</div>
		<div class="am-u-sm-6">
			<?php $this->output("block/protocol","file",true,false); ?>
		</div>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function(){
	$("body").css('background-color','#EFEFEF');
});
</script>
<?php $this->output("foot","file",true,false); ?>