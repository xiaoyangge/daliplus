<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><input type="hidden" name="ext_form_id" id="ext_form_id" value="form_pid,form_field_used,form_show_editing,form_true_delete,form_is_single,form_maxcount,form_input_val" />
<div class="table">
	<div class="title"><?php echo P_Lang("选择关联的项目");?>：</div>
	<div class="content">
		<select id="form_pid" name="form_pid" onchange="$._configForm.extitle('form_pid',this.value,'<?php echo $eid;?>','<?php echo $etype;?>')">
			<option value=""><?php echo P_Lang("请选择…");?></option>
			<?php $tmpid["num"] = 0;$opt_list=is_array($opt_list) ? $opt_list : array();$tmpid = array();$tmpid["total"] = count($opt_list);$tmpid["index"] = -1;foreach($opt_list as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
			<option value="<?php echo $value['id'];?>"<?php if($value['id'] == $rs['form_pid']){ ?> selected<?php } ?>><?php echo $value['title'];?></option>
			<?php } ?>
		</select>
	</div>
</div>
<div class="table<?php if(!$rs || !$rs['form_pid']){ ?> hide<?php } ?>" id="true_delete_html">
	<div class="title">
		<?php echo P_Lang("真实删除");?>：<span class="note"><?php echo P_Lang("启用此项，将不提供选择功能，请将绑定的项目隐藏");?></span>
	</div>
	<div class="content">
		<ul class="layout">
			<li><label><input type="radio" name="form_true_delete" value="1"<?php if($rs['form_true_delete']){ ?> checked<?php } ?> />启用</label></li>
			<li><label><input type="radio" name="form_true_delete" value="0"<?php if(!$rs['form_true_delete']){ ?> checked<?php } ?> />禁用</label></li>
		</ul>
	</div>
</div>
<div class="table<?php if(!$rs || !$rs['form_pid']){ ?> hide<?php } ?>" id="fields_show_html">
	<div class="title">
		<?php echo P_Lang("后台显示字段");?>：<span class="note"><?php echo P_Lang("建议不超过5个字段");?></span>
	</div>
	<div class="content" id="fields_show">
		<ul class="layout">
			<?php $tmpid["num"] = 0;$fields_list=is_array($fields_list) ? $fields_list : array();$tmpid = array();$tmpid["total"] = count($fields_list);$tmpid["index"] = -1;foreach($fields_list as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
			<li><label><input type="checkbox" name="form_show_editing[]" value="<?php echo $key;?>"<?php if($form_show_editing && in_array($key,$form_show_editing)){ ?> checked<?php } ?> /><?php echo $value['title'];?></label></li>
			<?php } ?>
		</ul>
	</div>
</div>
<div class="table<?php if(!$rs || !$rs['form_pid']){ ?> hide<?php } ?>" id="fields_used_html">
	<div class="title">
		<?php echo P_Lang("有效数据字段");?>：<span class="note"><?php echo P_Lang("请注意选择，以防止出现死循环（您需要懂一点点PHPOK，嘿嘿）");?></span>
	</div>
	<div class="content" id="fields_used">
		<ul class="layout">
			<?php $tmpid["num"] = 0;$fields_list=is_array($fields_list) ? $fields_list : array();$tmpid = array();$tmpid["total"] = count($fields_list);$tmpid["index"] = -1;foreach($fields_list as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
			<li><label><input type="checkbox" name="form_field_used[]" value="<?php echo $key;?>"<?php if($form_field_used && in_array($key,$form_field_used)){ ?> checked<?php } ?> /><?php echo $value['title'];?></label></li>
			<?php } ?>
		</ul>
	</div>
</div>
<div class="table">
	<div class="title">
		<?php echo P_Lang("主题模式");?>：<span class="note"><?php echo P_Lang("单选模式仅支持一条且不用循环读取，列表模式需要设置数量且只能循环读取");?></span>
	</div>
	<div class="content">
		<ul class="layout">
			<li><label><input type="radio" name="form_is_single" value="1"<?php if($rs['form_is_single']){ ?> checked<?php } ?> onclick="$._configForm.extitle('form_is_single',this.value,'<?php echo $eid;?>','<?php echo $etype;?>')" /><?php echo P_Lang("单选模式");?></label></li>
			<li><label><input type="radio" name="form_is_single" value="0"<?php if(!$rs['form_is_single']){ ?> checked<?php } ?> onclick="$._configForm.extitle('form_is_single',this.value,'<?php echo $eid;?>','<?php echo $etype;?>')" /><?php echo P_Lang("列表模式");?></label></li>
			<li id="form_maxcount_li"<?php if($rs['form_is_single']){ ?> class="hide"<?php } ?>><input type="text" name="form_maxcount" id="form_maxcount" value="<?php echo $rs['form_maxcount'] ? $rs['form_maxcount'] : 20;?>" class="short center" /></li>
		</ul>
	</div>
</div>
<div class="table">
	<div class="title">
		<?php echo P_Lang("筛选参数字段");?>：<span class="note"><?php echo P_Lang("仅限单选及单选下拉，不支持模糊搜索，多个字段用英文逗号隔开");?></span>
	</div>
	<div class="content">
		<input type="text" name="form_input_val" id="form_input_val" value="<?php echo $rs['form_input_val'];?>" class="w99" />
	</div>
</div>
