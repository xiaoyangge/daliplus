<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->output("head_lay","file",true,false); ?>
<div class="layui-card">
	<div class="layui-card-header">
		<?php echo P_Lang("常用字段管理");?>
		<div class="fr">
			<button type="button" class="layui-btn layui-btn-sm" onclick="$.admin_fields.set();"><i class="layui-icon">&#xe608;</i> <?php echo P_Lang("添加新字段");?></button>
		</div>
	</div>
	<div class="layui-card-body">
		<table class="layui-table">
			<thead>
			<tr>
				<th><?php echo P_Lang("名称");?></th>
				<th><?php echo P_Lang("字段名");?></th>
				<th><div><?php echo P_Lang("字段类型");?></div></th>
				<th><div><?php echo P_Lang("表单类型");?></div></th>
				<?php if($popedom['modify'] || $popedom['delete']){ ?><th class="action"><?php echo P_Lang("操作");?></th><?php } ?>
			</tr>
			</thead>
			<tbody>
			<?php $tmpid["num"] = 0;$rslist=is_array($rslist) ? $rslist : array();$tmpid = array();$tmpid["total"] = count($rslist);$tmpid["index"] = -1;foreach($rslist as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
			<tr id="admin_tr_<?php echo $value['id'];?>">
				<td><?php echo $value['title'];?></td>
				<td><?php echo $value['identifier'];?></td>
				<td><?php echo $value['field_type_name'];?></td>
				<td><?php echo $value['form_type_name'];?></td>
				<?php if($popedom['modify'] || $popedom['delete']){ ?>
				<td>
					<div class="layui-btn-group">
						<?php if($popedom['modify']){ ?><input type="button" value="<?php echo P_Lang("编辑");?>" onclick="$.admin_fields.set('<?php echo $value['identifier'];?>')" class="layui-btn layui-btn-sm" /><?php } ?>
						<?php if($popedom['delete']){ ?><input type="button" value="<?php echo P_Lang("删除");?>" onclick="$.admin_fields.del('<?php echo $value['identifier'];?>')" class="layui-btn layui-btn-sm layui-btn-danger" /><?php } ?>
					</div>
				</td>
				<?php } ?>
			</tr>
			<?php } ?>
			</tbody>
		</table>
	</div>
</div>
<?php $this->output("foot_lay","file",true,false); ?>