<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><div class="layui-row layui-col-space10">
	<div class="layui-col-md6">
		<select id="_tmp_select_add" style="padding:3px">
			<option value="">请选择扩展字段…</option>
			<?php $rslist_id["num"] = 0;$rslist=is_array($rslist) ? $rslist : array();$rslist_id = array();$rslist_id["total"] = count($rslist);$rslist_id["index"] = -1;foreach($rslist as $key=>$value){ $rslist_id["num"]++;$rslist_id["index"]++; ?>
			<option value="<?php echo $value['identifier'];?>"><?php echo $value['title'];?> - <?php echo $value['identifier'];?></option>
			<?php } ?>
		</select>
	</div>
	<div class="layui-col-md6">
		<div class="layui-btn-group">
			<input type="button" value="<?php echo P_Lang("添加");?>" onclick="_update_select_add()" class="layui-btn" />
			<input type="button" value="<?php echo P_Lang("标准创建扩展字段");?>" onclick="ext_add('<?php echo $module;?>')" class="layui-btn" />
		</div>
	</div>
</div>
<script type="text/javascript">
function _update_select_add()
{
	var val = $("#_tmp_select_add").val();
	if(!val){
		$.dialog.alert('请选择要添加的扩展');
		return false;
	}
	ext_add2(val,'<?php echo $module;?>');
}
</script>