<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->output("head_lay","file",true,false); ?>
<form method="post" class="layui-form" id="post_save" onsubmit="return $.admin_usergroup.setok();">
<?php if($id){ ?><input type="hidden" name="id" id="id" value="<?php echo $id;?>" /><?php } ?>
<div class="layui-card">
	<div class="layui-card-header">
		<?php echo P_Lang("会员组基本信息");?>
	</div>
	<div class="layui-card-body">
		<?php if($reglist){ ?>
		<blockquote class="layui-elem-quote">
			<?php echo P_Lang("要启用【邀请码注册】和【邮箱验证注册】功能，您需要");?>
			<ol style="margin-left:2em">
				<li><?php echo P_Lang("创建一个项目（假设为regcheck）");?></li>
				<li><?php echo P_Lang("项目必须绑定一个独立模块【假设为注册验证】");?></li>
				<li><?php echo P_Lang("绑定的模块里必须有字段");?> <span class="red">code</span> <span class="red">user_id</span> <span class="red">active_time</span>
			</ol>
		</blockquote>
		<?php } ?>
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("名称");?>
			</label>
			<div class="layui-input-inline default-auto">
				<input type="text" id="title" required lay-verify="required" name="title" value="<?php echo $rs['title'];?>" autocomplete="off" class="layui-input" />
			</div>
			<div class="layui-input-inline auto gray lh38">
				<?php echo P_Lang("设置会员组的名称");?>
			</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("注册审核");?>
			</label>
			<div class="layui-input-inline auto">
				<input type="radio" name="register_status" lay-filter="register_status" title="<?php echo P_Lang("免审核");?>" value="1" <?php if($rs['register_status'] == '1'){ ?> checked<?php } ?> />
				<input type="radio" name="register_status" lay-filter="register_status" title="<?php echo P_Lang("邮箱验证");?>" value="email" <?php if($rs['register_status'] == 'email'){ ?> checked<?php } ?> />
				<input type="radio" name="register_status" lay-filter="register_status" title="<?php echo P_Lang("手机号验证");?>" value="mobile" <?php if($rs['register_status'] == 'mobile'){ ?> checked<?php } ?> />
				<input type="radio" name="register_status" lay-filter="register_status" title="<?php echo P_Lang("邀请码");?>" value="code" <?php if($rs['register_status'] == 'code'){ ?> checked<?php } ?> />
				<input type="radio" name="register_status" lay-filter="register_status" title="<?php echo P_Lang("人工审核");?>" value="0" <?php if(!$rs['register_status']){ ?> checked<?php } ?> />
			</div>
			<div class="layui-input-inline auto gray lh38"><?php echo P_Lang("请根据您的业务需求实现不同注册方式");?></div>
		</div>
		<div class="layui-form-item<?php if($rs['register_status'] != 'email' && $rs['register_status'] != 'mobile'){ ?> hide<?php } ?>" id="register_status_notice">
			<label class="layui-form-label">
				<?php echo P_Lang("通知模板");?>
			</label>
			<div class="layui-input-block">
				<select name="tpl_id">
					<option value=""><?php echo P_Lang("请选择…");?></option>
					<?php $idx["num"] = 0;$notice_list=is_array($notice_list) ? $notice_list : array();$idx = array();$idx["total"] = count($notice_list);$idx["index"] = -1;foreach($notice_list as $k=>$v){ $idx["num"]++;$idx["index"]++; ?>
					<optgroup label="<?php echo $v['title'];?>">
						<?php $tmpid["num"] = 0;$v['rslist']=is_array($v['rslist']) ? $v['rslist'] : array();$tmpid = array();$tmpid["total"] = count($v['rslist']);$tmpid["index"] = -1;foreach($v['rslist'] as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
						<option value="<?php echo $value['id'];?>" <?php if($rs['tpl_id']==$value['id']){ ?> selected<?php } ?>><?php echo $value['title'];?> <?php if($value['note']){ ?>_<?php echo $value['note'];?><?php } ?> / <?php echo $v['title'];?></option>
						<?php } ?>
					</optgroup>
					<?php } ?>
				</select>
			</div>
			<div class="layui-input-block mtop">
				<?php echo P_Lang("选择通知模板，注意邮件模板和短信模板的区别");?>
			</div>
		</div>

		<?php if($reglist){ ?>
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("验证库");?>
			</label>
			<div class="layui-input-block">
				<?php $reglist_id["num"] = 0;$reglist=is_array($reglist) ? $reglist : array();$reglist_id = array();$reglist_id["total"] = count($reglist);$reglist_id["index"] = -1;foreach($reglist as $key=>$value){ $reglist_id["num"]++;$reglist_id["index"]++; ?>
				<input type="radio" name="tbl_id" title="<?php echo $value['title'];?>" value="<?php echo $value['id'];?>"<?php if($rs['tbl_id'] == $value['id']){ ?> checked<?php } ?>>
				<?php } ?>
				<input type="radio" name="tbl_id" title="<?php echo P_Lang("不使用");?>" value="0"<?php if(!$rs['tbl_id']){ ?> checked<?php } ?> />
			</div>
			<div class="layui-input-block mtop"><?php echo P_Lang("仅限启用验证后才有效");?></div>
		</div>
		
		<?php } ?>
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("开放选择");?>
			</label>
			<div class="layui-input-inline auto">
				<input type="radio" name="is_open" title="<?php echo P_Lang("禁用");?>" value="0"<?php if(!$rs['is_open']){ ?> checked<?php } ?>>
				<input type="radio" name="is_open" title="<?php echo P_Lang("启用");?>" value="1"<?php if($rs['is_open']){ ?> checked<?php } ?>>
			</div>
			<div class="layui-input-inline auto gray lh38">
				<?php echo P_Lang("设置是否开放此组供用户选择（启用后允许用户自行选择会员组）");?>
			</div>
		</div>
		<?php if($id && !$rs['is_guest'] && $all_fields_list){ ?>
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("字段");?>
			</label>
			<div class="layui-input-block" id="user_fields_ul">
				<?php $all_fields_list_id["num"] = 0;$all_fields_list=is_array($all_fields_list) ? $all_fields_list : array();$all_fields_list_id = array();$all_fields_list_id["total"] = count($all_fields_list);$all_fields_list_id["index"] = -1;foreach($all_fields_list as $key=>$value){ $all_fields_list_id["num"]++;$all_fields_list_id["index"]++; ?>
				<input type="checkbox" name="fields_list[]" title="<?php echo $value['title'];?>" value="<?php echo $value['identifier'];?>"<?php if($fields_list && in_array($value['identifier'],$fields_list)){ ?> checked<?php } ?> />
				<?php } ?>
			</div>
			<div class="layui-input-block mtop">
				<div class="layui-btn-group">
					<input type="button" class="layui-btn layui-btn-sm" value="全选" onclick="$.input.checkbox_all('user_fields_ul');layui.form.render('checkbox')"/>
					<input type="button" class="layui-btn layui-btn-sm" value="全不选" onclick="$.input.checkbox_none('user_fields_ul');layui.form.render('checkbox')"/>
					<input type="button" class="layui-btn layui-btn-sm" value="反选" onclick="$.input.checkbox_anti('user_fields_ul');layui.form.render('checkbox')"/>
				</div>
			</div>
		</div>
		<?php } ?>
		
		
		<div class="layui-form-item">
			<label class="layui-form-label"><?php echo P_Lang("排序");?></label>
			<div class="layui-input-inline short">
				<input type="text" id="taxis" name="taxis" value="<?php echo $rs['taxis'] ? $rs['taxis'] : 255;?>" autocomplete="off" class="layui-input" />
			</div>
			<div class="layui-form-mid layui-word-aux">
				<?php echo P_Lang("设置排序，最大值不超过255，最小值为0，值越小越往前靠");?>
			</div>
		</div>
	</div>
</div>
<div class="layui-card">
	<div class="layui-card-header">
		<?php echo P_Lang("权限设置");?>
		<div class="layui-btn-group fr">
			<input type="button" class="layui-btn layui-btn-sm" value="全部可读" onclick="$('input[data=read]').prop('checked',true);layui.form.render('checkbox')" />
			<input type="button" class="layui-btn layui-btn-sm" value="全部不可读" onclick="$('input[data=read]').prop('checked',false);layui.form.render('checkbox')" />
		</div>
	</div>
	<div class="layui-card-body">
		<?php $project_list_id["num"] = 0;$project_list=is_array($project_list) ? $project_list : array();$project_list_id = array();$project_list_id["total"] = count($project_list);$project_list_id["index"] = -1;foreach($project_list as $key=>$value){ $project_list_id["num"]++;$project_list_id["index"]++; ?>
		<div class="layui-form-item" id="project_<?php echo $value['id'];?>">
			<label class="layui-form-label" style="width:auto;min-width:150px;text-align: left;"><?php echo $value['space'];?><?php echo $value['title'];?></label>
			<div class="layui-input-inline default-auto">
				<div class="layui-btn-group">
					<input type="button" class="layui-btn layui-btn-sm" value="<?php echo P_Lang("全选");?>" onclick="$.input.checkbox_all('project_<?php echo $value['id'];?>');layui.form.render('checkbox')" />
					<input type="button" class="layui-btn layui-btn-sm" value="<?php echo P_Lang("全不选");?>" onclick="$.input.checkbox_none('project_<?php echo $value['id'];?>');layui.form.render('checkbox')" />
					<input type="button" class="layui-btn layui-btn-sm" value="<?php echo P_Lang("反选");?>" onclick="$.input.checkbox_anti('project_<?php echo $value['id'];?>');layui.form.render('checkbox')" />
				</div>
				<input type="checkbox" name="popedom[]" data="read" title="阅读"  value="read:<?php echo $value['id'];?>"<?php if($popedom_users && in_array('read:'.$value['id'],$popedom_users)){ ?> checked<?php } ?> />
				<?php if($value['module']){ ?>
				<?php if($value['post_status']){ ?>
				<input type="checkbox" name="popedom[]" title="发布" value="post:<?php echo $value['id'];?>"<?php if($popedom_users && in_array('post:'.$value['id'],$popedom_users)){ ?> checked<?php } ?> />
				<input type="checkbox" name="popedom[]" title="发布免审核" value="post1:<?php echo $value['id'];?>"<?php if($popedom_users && in_array('post1:'.$value['id'],$popedom_users)){ ?> checked<?php } ?> />
				<?php } ?>
				<?php if($value['comment_status']){ ?>
				<input type="checkbox" name="popedom[]" title="回复" value="reply:<?php echo $value['id'];?>"<?php if($popedom_users && in_array('reply:'.$value['id'],$popedom_users)){ ?> checked<?php } ?> />
				<input type="checkbox" name="popedom[]" title="回复免审核" value="reply1:<?php echo $value['id'];?>"<?php if($popedom_users && in_array('reply1:'.$value['id'],$popedom_users)){ ?> checked<?php } ?> />
				<?php } ?>
				<?php } ?>
			</div>
		</div>
		<?php } ?>
	</div>
</div>
<div class="submit-info-clear"></div>
<div class="submit-info">
	<div class="layui-container center">
		<input type="submit" value="<?php echo P_Lang("提交");?>" class="layui-btn layui-btn-lg layui-btn-danger" />
		<input type="button" value="<?php echo P_Lang("取消关闭");?>" class="layui-btn layui-btn-lg layui-btn-primary" onclick="$.admin.close()" />
	</div>
</div>
</form>
<?php $this->output("foot_lay","file",true,false); ?>