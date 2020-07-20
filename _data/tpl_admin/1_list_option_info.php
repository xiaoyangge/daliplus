<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><div class="list">
<table class="layui-table" lay-size="sm">
<thead>
<tr>
	<th class="center" style="min-width:120px;"><?php echo $rs['title'];?></th>
	<th colspan="4" class="center">
		<select id="attr_<?php echo $rs['id'];?>_opt" lay-ignore style="width:90%" onchange="$.admin_list_edit.attr_option_quickadd('<?php echo $rs['id'];?>',this.value)">
			<option value=""><?php echo P_Lang("请选择…");?></option>
			<?php $tmpid["num"] = 0;$optlist=is_array($optlist) ? $optlist : array();$tmpid = array();$tmpid["total"] = count($optlist);$tmpid["index"] = -1;foreach($optlist as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
			<option value="<?php echo $value['id'];?>"><?php echo $value['title'];?></option>
			<?php } ?>
		</select>
	</th>
	<th class="center" style="min-width:120px;">
		<div class="layui-btn-group">
			<input type="button" value="<?php echo P_Lang("添加");?>" onclick="$.admin_list_edit.attr_option_add('<?php echo $rs['id'];?>')" class="layui-btn layui-btn-sm" />
			<input type="button" value="<?php echo P_Lang("删除");?>" onclick="$.admin_list_edit.attr_remove('<?php echo $rs['id'];?>')" class="layui-btn layui-btn-sm" />
		</div>
	</th>
</tr>
<tr name="attr_<?php echo $rs['id'];?>_thead">
	<th class="center"><?php echo P_Lang("属性名称");?></th>
	<th class="center"><?php echo P_Lang("重量加减");?> Kg</th>
	<th class="center"><?php echo P_Lang("体积加减");?> M<sup>3</sup></th>
	<th class="center"><?php echo P_Lang("价格加减");?></th>
	<th class="center"><?php echo P_Lang("排序");?></th>
	<th class="center"><?php echo P_Lang("操作");?></th>
</tr>
</thead>
<tbody>
<?php $idx["num"] = 0;$rslist=is_array($rslist) ? $rslist : array();$idx = array();$idx["total"] = count($rslist);$idx["index"] = -1;foreach($rslist as $key=>$value){ $idx["num"]++;$idx["index"]++; ?>
<tr name="attr_<?php echo $rs['id'];?>" id="attr_<?php echo $rs['id'];?>_<?php echo $value['vid'];?>" data-name="<?php echo $value['title'];?>">
	<td class="center">
		<input type="hidden" name="_attr_<?php echo $rs['id'];?>[]" value="<?php echo $value['vid'];?>" />
		<?php echo $value['title'];?>
	</td>
	<td class="center"><input type="text" name="_attr_weight_<?php echo $rs['id'];?>[<?php echo $value['vid'];?>]" value="<?php echo $value['weight'];?>" class="layui-input" /></td>
	<td class="center"><input type="text" name="_attr_volume_<?php echo $rs['id'];?>[<?php echo $value['vid'];?>]" value="<?php echo $value['volume'];?>" class="layui-input" /></td>
	<td class="center"><input type="text" name="_attr_price_<?php echo $rs['id'];?>[<?php echo $value['vid'];?>]" value="<?php echo round($value['price'],'2');?>" class="layui-input" /></td>
	<td class="center"><input type="text" name="_attr_taxis_<?php echo $rs['id'];?>[<?php echo $value['vid'];?>]" value="<?php echo $value['taxis'];?>" class="layui-input" /></td>
	<td class="center"><input type="button" value="<?php echo P_Lang("删除");?>" onclick="$.admin_list_edit.attr_option_delete('<?php echo $rs['id'];?>','<?php echo $value['vid'];?>')" class="layui-btn layui-btn-sm" /></td>
</tr>
<?php } ?>
</tbody>
</table>
</div>