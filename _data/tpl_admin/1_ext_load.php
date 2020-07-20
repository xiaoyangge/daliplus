<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $tmpid["num"] = 0;$extlist=is_array($extlist) ? $extlist : array();$tmpid = array();$tmpid["total"] = count($extlist);$tmpid["index"] = -1;foreach($extlist as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
<div class="table">
	<div class="title">
		<table>
		<tr>
			<td><?php echo $value['title'];?><span class="darkblue">[<?php echo $value['identifier'];?>]</span>：</td>
			<td><span class="note"><?php echo $value['note'];?></span></td>
			<?php if($show_edit){ ?>
			<td><a class="icon edit" onclick="ext_edit('<?php echo $value['id'];?>','<?php echo $module;?>')" title="编辑"></a></td>
			<?php } ?>
			<td><a class="icon delete" onclick="ext_delete('<?php echo $value['id'];?>','<?php echo $module;?>','<?php echo $value['title'];?>')" title="删除"></a></td>
		</tr>
		</table>
	</div>
	<div class="content"><?php echo $value['html'];?><?php if($value['form_type'] == "hidden"){ ?><span class="gray i">隐藏字段，仅显示提示</span><?php } ?></div>
</div>
<?php } ?>