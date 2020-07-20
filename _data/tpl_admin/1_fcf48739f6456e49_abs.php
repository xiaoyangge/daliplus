<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php if($_ptype){ ?>
<div class="param">
	<div class="clearfix">
		<?php if($_param_edit){ ?>
			<?php if($_pname){ ?>
			<div style="margin-bottom:5px;float:left;">
				<select name="ele_<?php echo $_rs['identifier'];?>" id="ele_<?php echo $_rs['identifier'];?>">
					<option value="">请选择…</option>
					<?php $_pname_id["num"] = 0;$_pname=is_array($_pname) ? $_pname : array();$_pname_id = array();$_pname_id["total"] = count($_pname);$_pname_id["index"] = -1;foreach($_pname as $key=>$value){ $_pname_id["num"]++;$_pname_id["index"]++; ?>
					<option value="<?php echo $value;?>"><?php echo $value;?></option>
					<?php } ?>
				</select>
			</div>
			<?php } else { ?>
			<input type="hidden" name="ele_<?php echo $_rs['identifier'];?>" id="ele_<?php echo $_rs['identifier'];?>" value="" />
			<?php } ?>
			<div style="margin:3px 0 5px 5px;float:left;"><input type="button" value="添加一列" class="layui-btn layui-btn-sm" onclick="$.phpok_form_param.add_ele_mul('<?php echo $_rs['identifier'];?>','<?php echo $_rs['width'];?>')" /></div>
		<?php } ?>
		<?php if($_rs['p_line']){ ?>
		<div style="margin:3px 0 5px 5px;float:left;"><input type="button" value="添加一行" class="layui-btn layui-btn-sm" onclick="$.phpok_form_param.add_line('<?php echo $_rs['identifier'];?>','<?php echo $_rs['p_name_type'];?>','<?php echo $_rs['width'];?>')" /></div>
		<?php } ?>
	</div>
	<div id="list_<?php echo $_rs['identifier'];?>">
		<table class="layui-table" id="<?php echo $_rs['identifier'];?>_tbl">
		<thead>
		<tr>
			<?php if($_rs['p_line']){ ?><th width="50">操作</th><?php } ?>
			<?php $_rslist_title_id["num"] = 0;$_rslist['title']=is_array($_rslist['title']) ? $_rslist['title'] : array();$_rslist_title_id = array();$_rslist_title_id["total"] = count($_rslist['title']);$_rslist_title_id["index"] = -1;foreach($_rslist['title'] as $key=>$value){ $_rslist_title_id["num"]++;$_rslist_title_id["index"]++; ?>
				<?php if($_param_edit){ ?>
				<th>
					<input type="text" name="<?php echo $_rs['identifier'];?>_title[]" class="layui-input" value="<?php echo $value;?>" />
					<div style="position: absolute;top:5px;right:5px;" title="<?php echo P_Lang("删除");?>" onclick="$.phpok_form_param.delete_one('<?php echo $_rs['identifier'];?>',this)"><i class="layui-icon layui-icon-close-fill"></i></div>
				</th>
				<?php } else { ?>
				<th><?php echo $value;?><input type="hidden" name="<?php echo $_rs['identifier'];?>_title[]" value="<?php echo $value;?>" /></th>
				<?php } ?>
			<?php } ?>
		</tr>
		</thead>
		<?php $_rslist_content_id["num"] = 0;$_rslist['content']=is_array($_rslist['content']) ? $_rslist['content'] : array();$_rslist_content_id = array();$_rslist_content_id["total"] = count($_rslist['content']);$_rslist_content_id["index"] = -1;foreach($_rslist['content'] as $key=>$value){ $_rslist_content_id["num"]++;$_rslist_content_id["index"]++; ?>
		<tr>
			<?php if($_rs['p_line']){ ?><td><input type="button" value="<?php echo P_Lang("删除");?>" onclick="$.phpok_form_param.delete_line(this)" class="layui-btn layui-btn-sm layui-btn-danger" /></td><?php } ?>
			<?php $idxx["num"] = 0;$value=is_array($value) ? $value : array();$idxx = array();$idxx["total"] = count($value);$idxx["index"] = -1;foreach($value as $k=>$v){ $idxx["num"]++;$idxx["index"]++; ?>
			<td>
				<?php if($_rs['lock_row'] && $idxx['num'] == $_rs['lock_row']){ ?>
				<?php echo $v;?><input type="hidden" name="<?php echo $_rs['identifier'];?>_body[]" value="<?php echo $v;?>" />
				<?php } else { ?>
				<input type="text" name="<?php echo $_rs['identifier'];?>_body[]" class="layui-input" value="<?php echo $v;?>" />
				<?php } ?>
			</td>
			<?php } ?>
			<?php for($i=$idxx['total'];$i<$_rslist['count'];$i++){ ?>
			<td>
				<?php if($_rs['lock_row'] && ($i+1) != $_rs['lock_row']){ ?>
				<input type="text" name="<?php echo $_rs['identifier'];?>_body[]" class="layui-input" value="" />
				<?php } ?>
			</td>
			<?php } ?>
		</tr>
		<?php } ?>
		</table>
	</div>
	<div class="clear"></div>
</div>
<?php } else { ?>
<div class="param">
	<?php if($_param_edit){ ?>
	<div style="margin-bottom:10px;">
		<?php if($_pname){ ?>
		<select name="ele_<?php echo $_rs['identifier'];?>" id="ele_<?php echo $_rs['identifier'];?>" lay-ignore>
			<option value="">请选择…</option>
			<?php $_pname_id["num"] = 0;$_pname=is_array($_pname) ? $_pname : array();$_pname_id = array();$_pname_id["total"] = count($_pname);$_pname_id["index"] = -1;foreach($_pname as $key=>$value){ $_pname_id["num"]++;$_pname_id["index"]++; ?>
			<option value="<?php echo $value;?>"><?php echo $value;?></option>
			<?php } ?>
		</select>
		<?php } else { ?>
		<input type="hidden" name="ele_<?php echo $_rs['identifier'];?>" id="ele_<?php echo $_rs['identifier'];?>" value="" />
		<?php } ?>
		<input type="button" value="<?php echo P_Lang("添加属性");?>" class="layui-btn layui-btn-sm" onclick="$.phpok_form_param.add_ele_single('<?php echo $_rs['identifier'];?>','<?php echo $_rs['width'];?>')" />
	</div>
	<?php } ?>
	<div id="list_<?php echo $_rs['identifier'];?>">
		<?php $_rslist_title_id["num"] = 0;$_rslist['title']=is_array($_rslist['title']) ? $_rslist['title'] : array();$_rslist_title_id = array();$_rslist_title_id["total"] = count($_rslist['title']);$_rslist_title_id["index"] = -1;foreach($_rslist['title'] as $key=>$value){ $_rslist_title_id["num"]++;$_rslist_title_id["index"]++; ?>
		<div style="margin-bottom:10px;">
			<ul class="layout">
				<?php if($_param_edit){ ?>
				<li><input type="text" name="<?php echo $_rs['identifier'];?>_title[]" class="layui-input" value="<?php echo $value;?>"/></li>
				<?php } else { ?>
				<li><input type="text" value="<?php echo $value;?>" class="layui-input" disabled /><input type="hidden" name="<?php echo $_rs['identifier'];?>_title[]" id="" value="<?php echo $value;?>" /></li>
				<?php } ?>
				<li><input type="text" name="<?php echo $_rs['identifier'];?>_body[]" class="layui-input" value="<?php echo $_rslist['content'][$key];?>"/></li>
				<?php if($_param_edit){ ?><li><input type="button" value="<?php echo P_Lang("删除");?>" class="layui-btn layui-btn-sm layui-btn-danger" onclick="$.phpok_form_param.delete_line_single(this)" /></li><?php } ?>
			</ul>
			<div class="clear"></div>
		</div>
		<?php } ?>
	</div>
	<div class="clear"></div>
</div>
<?php } ?>