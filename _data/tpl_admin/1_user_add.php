<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->output("head_lay","file",true,false); ?>
<form method="post" id="post_save" class="layui-form" onsubmit="return $.admin_user.save()">
<?php if($id){ ?><input type="hidden" name="id" id="id" value="<?php echo $id;?>" /><?php } ?>
<div class="layui-card">
	<div class="layui-card-body">
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("会员组");?>
			</label>
			<div class="layui-input-inline default-auto">
				<select id="group_id" name="group_id"  lay-filter="usergroup">
				<option value="0"><?php echo P_Lang("请选择会员组…");?></option>
				<?php $grouplist_id["num"] = 0;$grouplist=is_array($grouplist) ? $grouplist : array();$grouplist_id = array();$grouplist_id["total"] = count($grouplist);$grouplist_id["index"] = -1;foreach($grouplist as $key=>$value){ $grouplist_id["num"]++;$grouplist_id["index"]++; ?>
				<option value="<?php echo $value['id'];?>"<?php if($value['id'] == $group_id){ ?> selected<?php } ?> data-fields="<?php echo $value['fields'];?>"><?php echo $value['title'];?></option>
				<?php } ?>
				</select>
			</div>
			<div class="layui-input-inline auto gray lh38"><?php echo P_Lang("请选择会员所属主要身份");?></div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("会员账号");?>
			</label>
			<div class="layui-input-inline default-auto">
				<input type="text" id="user" name="user" class="layui-input" value="<?php echo $rs['user'];?>" />
			</div>
			<div class="layui-input-inline auto gray lh38">
				<input type="button" value="<?php echo P_Lang("随机生成");?>" onclick="$('#user').val($.phpok.rand(6,'letter'))" class="layui-btn layui-btn-sm" />
			</div>
			<div class="layui-input-inline auto gray lh38"><?php echo P_Lang("请填写会员账号，必须保证唯一，建议使用邮箱作为账号");?></div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("会员密码");?>
			</label>
			<div class="layui-input-inline default-auto">
				<input type="text" id="pass" name="pass" class="layui-input" value="" />
			</div>
			<div class="layui-input-inline auto gray lh38">
				<input type="button" value="<?php echo P_Lang("随机生成");?>" onclick="$('#pass').val($.phpok.rand(10,'fixed'))" class="layui-btn layui-btn-sm" />
			</div>
			<div class="layui-form-mid">
				<?php echo P_Lang("设置会员的密码，此项不能为空");?>
			</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("Email");?>
			</label>
			<div class="layui-input-block">
				<input type="text" id="email" name="email" class="layui-input" value="<?php echo $rs['email'];?>" />
			</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("手机");?>
			</label>
			<div class="layui-input-inline default-auto">
				<input type="text" id="mobile" name="mobile" class="layui-input" value="<?php echo $rs['mobile'];?>" />
			</div>
			<div class="layui-input-inline auto gray lh38"><?php echo P_Lang("如有手机号，请填写");?></div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("会员头像");?>
			</label>
			<div class="layui-input-block">
				<?php echo form_edit('avatar',$rs['avatar'],'text','form_btn=image&width=500');?>
			</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("状态");?>
			</label>
			<div class="layui-input-inline auto">
				<input type="radio" name="status" id="status_0" value="0"<?php if(!$rs['status']){ ?> checked<?php } ?> title="<?php echo P_Lang("未审核");?>" />
				<input type="radio" name="status" id="status_1" value="1"<?php if($rs['status'] == 1){ ?> checked<?php } ?> title="<?php echo P_Lang("正常");?>" />
				<input type="radio" name="status" id="status_2" value="2"<?php if($rs['status'] == 2){ ?> checked<?php } ?> title="<?php echo P_Lang("锁定");?>" />
			</div>
			<div class="layui-input-inline auto gray lh38"><?php echo P_Lang("设置会员状态，未审核及锁定会员不能登录");?></div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("注册时间");?>
			</label>
			<div class="layui-input-inline default-auto">
				<input type="text" id="regtime" name="regtime" class="layui-input"<?php if($rs['regtime']){ ?> value="<?php echo date('Y-m-d H:i:s',$rs['regtime']);?>"<?php } ?> />
			</div>
			<div class="layui-input-inline auto gray lh38"><?php echo P_Lang("人工设置会员的注册时间，默认使用当前时间");?></div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("邀请码");?>
			</label>
			<div class="layui-input-inline default-auto">
				<input type="text" id="code" name="code" class="layui-input" value="<?php echo $rs['code'];?>" />
			</div>
			<div class="layui-input-inline auto gray lh38">
				<input type="button" value="<?php echo P_Lang("随机生成");?>" onclick="$('#code').val($.phpok.rand(3,'letter')+$.phpok.rand(5,'fixed'))" class="layui-btn layui-btn-sm" />
			</div>
			<div class="layui-form-mid">
				<?php echo P_Lang("用于邀请会员注册的识别码，字母+数字组成");?>
			</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("推荐人");?>
			</label>
			<div class="layui-input-inline auto">
				<?php echo form_edit('relation_id',$relation_id,'user');?>
			</div>
			<div class="layui-input-inline auto gray lh38"><?php echo P_Lang("无推荐人请留空");?></div>
		</div>
		<?php $extlist_id["num"] = 0;$extlist=is_array($extlist) ? $extlist : array();$extlist_id = array();$extlist_id["total"] = count($extlist);$extlist_id["index"] = -1;foreach($extlist as $key=>$value){ $extlist_id["num"]++;$extlist_id["index"]++; ?>
		<div class="layui-form-item" id="userext_<?php echo $value['identifier'];?>" name="userext_html">
			<label class="layui-form-label">
				<?php if($value['note']){ ?><i class="layui-icon layui-tips" lay-tips="<?php echo $value['note'];?>">&#xe702;</i><?php } ?>
				<?php echo $value['title'];?>
			</label>
			<div class="layui-input-inline default-auto">
				<?php echo $value['html'];?>
			</div>
		</div>
		
		<?php } ?>	
	</div>
</div>
<?php echo $app->plugin_html_ap("userform");?>
<div class="submit-info-clear"></div>
<div class="submit-info">
	<div class="layui-container center">
		<input type="submit" value="<?php echo P_Lang("提交");?>" class="layui-btn layui-btn-lg layui-btn-danger" />
		<input type="button" value="<?php echo P_Lang("取消关闭");?>" class="layui-btn layui-btn-lg layui-btn-primary" onclick="$.admin.close()" />
	</div>
</div>

</form>
<?php $this->output("foot_lay","file",true,false); ?>