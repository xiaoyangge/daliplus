<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->output("head_lay","file",true,false); ?>
<div class="layui-card">
	<div class="layui-card-header">
		<?php echo P_Lang("已添加字段");?>
		<div class="fr">
			<input type="button" value="<?php echo P_Lang("添加会员字段");?>" onclick="$.admin_user.field_add()" class="layui-btn layui-btn-sm" />
		</div>
	</div>
	<div class="layui-card-body">
		<?php if($used_list){ ?>
		<table class="layui-table">
		<thead>
		<tr>
			<th><?php echo P_Lang("字段名");?></th>
			<th><?php echo P_Lang("名称");?></th>
			<th><?php echo P_Lang("字段类型");?></th>
			<th><?php echo P_Lang("表单类型");?></th>
			<th><?php echo P_Lang("备注");?></th>
			<th><?php echo P_Lang("排序");?></th>
			<?php if($popedom['set']){ ?><th style="text-align:center;width:120px;"><?php echo P_Lang("操作");?></th><?php } ?>
		</tr>
		</thead>
		<?php $tmpid["num"] = 0;$used_list=is_array($used_list) ? $used_list : array();$tmpid = array();$tmpid["total"] = count($used_list);$tmpid["index"] = -1;foreach($used_list as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
		<tr>
			<td><?php echo $value['identifier'];?></td>
			<td><?php echo $value['title'];?></td>
			<td><?php echo $value['field_type_name'];?></td>
			<td><?php echo $value['form_type_name'];?></td>
			<td><?php echo $value['note'];?></td>
			<td><?php echo $value['taxis'];?></td>
			<?php if($popedom['set']){ ?>
			<td align="center">
				<div class="layui-btn-group">
					<input type="button" value="<?php echo P_Lang("编辑");?>" onclick="$.admin_user.field_edit('<?php echo $value['id'];?>')" class="layui-btn layui-btn-sm" />
					<input type="button" value="<?php echo P_Lang("删除");?>" onclick="$.admin_user.field_delete('<?php echo $value['id'];?>','<?php echo $value['title'];?>')" class="layui-btn layui-btn-sm layui-btn-danger" />
				</div>
			</td>
			<?php } ?>
		</tr>
		<?php } ?>
		</table>
		<?php } ?>
	</div>
</div>
<?php if($fields_list){ ?>
<div class="layui-card">
	<div class="layui-card-header">
		<?php echo P_Lang("常见字段快速添加");?>
	</div>
	<div class="layui-card-body">
		<ul class="layout fields_quick_add">
			<?php $tmpid["num"] = 0;$fields_list=is_array($fields_list) ? $fields_list : array();$tmpid = array();$tmpid["total"] = count($fields_list);$tmpid["index"] = -1;foreach($fields_list as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
			<li>
				<div class="left">
					<div class="title"><?php echo $value['title'];?></div>
					<div class="gray i"><?php echo $value['identifier'];?></div>
				</div>
				<div class="right">
					<input type="button" value="<?php echo P_Lang("添加");?>" onclick="$.admin_user.field_quick_add('<?php echo $value['identifier'];?>')" class="layui-btn layui-btn-sm" />
				</div>
				<div class="clear"></div>
			</li>
			<?php } ?>
		</ul>
	</div>
</div>
<?php } ?>

<?php $this->output("foot_lay","file",true,false); ?>