<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->output("head_lay","file",true,false); ?>
<div class="layui-card">
	<div class="layui-card-header">
		数据库管理
		<div class="fr">
			<button type="button" class="layui-btn layui-btn-sm" onclick="$.win('<?php echo P_Lang("已备份列表");?>','<?php echo phpok_url(array('ctrl'=>'sql','func'=>'backlist'));?>')"><?php echo P_Lang("已备份列表");?></button>
		</div>
	</div>
	<div class="layui-card-body">
		<table class="layui-table layui-form">
				<thead>
				<tr>
					<th class="id"><?php echo P_Lang("选项");?></th>
					<th><?php echo P_Lang("表名");?></th>
					<th><?php echo P_Lang("引挈");?></th>
					<th><?php echo P_Lang("字符集");?></th>
					<th class="lft">&nbsp;<?php echo P_Lang("记录数");?></th>
					<th class="lft">&nbsp;<?php echo P_Lang("大小");?></th>
					<th><?php echo P_Lang("更新时间");?></th>
					<th class="lft">&nbsp;<?php echo P_Lang("碎片");?></th>
					<th>&nbsp;</th>
				</tr>
				</thead>
				<tbody>
				<?php $rslist_id["num"] = 0;$rslist=is_array($rslist) ? $rslist : array();$rslist_id = array();$rslist_id["total"] = count($rslist);$rslist_id["index"] = -1;foreach($rslist as $key=>$value){ $rslist_id["num"]++;$rslist_id["index"]++; ?>
				<tr id="edit_<?php echo $value['id'];?>">
					<td align="center">
						<input type="checkbox" id="tbl_<?php echo $value['Name'];?>" name="tbl[]" <?php if($value['free']){ ?> sign="free"<?php } ?> value="<?php echo $value['Name'];?>" lay-skin="primary"/></td>
					<td><?php echo $value['Name'];?><?php if($value['Comment']){ ?>（<?php echo $value['Comment'];?>)<?php } ?></td>
					<td><?php echo $value['Engine'];?></td>
					<td><?php echo $value['Collation'];?></td>
					<td><?php echo $value['Rows'];?></td>
					<td><?php echo $value['length'];?></td>
					<td ><?php echo $value['Update_time'] ? $value['Update_time'] : $value['Create_time'];?></td>
					<td<?php if($value['free']){ ?> style="background:red;"<?php } ?>><?php echo $value['free'];?></td>
					<td>
						<div class="layui-btn-group">
							<input type="button" value="<?php echo P_Lang("明细");?>" onclick="$.admin_sql.show('<?php echo $value['Name'];?>')" class="layui-btn  layui-btn-sm" />
							<?php if($value['delete']){ ?>
							<input type="button" value="<?php echo P_Lang("删除");?>" onclick="$.admin_rewrite.del('<?php echo $value['id'];?>','<?php echo $value['title'];?>')" class="layui-btn  layui-btn-sm" />
							<?php } ?>
						</div>
					</td>
				</tr>
				<?php } ?>
				</tbody>
			</table>

		<div style="margin:10px;">
			<div class="layui-btn-group test-table-operate-btn">
				<input type="button" value="<?php echo P_Lang("全选");?>" onclick="$.input.checkbox_all()" class="layui-btn  layui-btn-sm" />
				<input type="button" value="<?php echo P_Lang("全不选");?>" onclick="$.input.checkbox_none()" class="layui-btn  layui-btn-sm" />
				<input type="button" value="<?php echo P_Lang("反选");?>" onclick="$.input.checkbox_anti()" class="layui-btn  layui-btn-sm" />
				<input type="button" value="<?php echo P_Lang("只选择有碎片");?>" onclick="$.admin_sql.select_free()" class="layui-btn  layui-btn-sm" />
			</div>
			<div class="layui-btn-group test-table-operate-btn">
				<?php if($popedom['optimize'] || $popedom['repair'] || $popedom['create']){ ?>
				<?php if($popedom['optimize']){ ?>
				<input type="button" value="<?php echo P_Lang("优化");?>" onclick="$.admin_sql.optimize()" class="layui-btn  layui-btn-sm" />
				<?php } ?>
				<?php if($popedom['repair']){ ?>
				<input type="button" value="<?php echo P_Lang("修复");?>" onclick="$.admin_sql.repair()" class="layui-btn  layui-btn-sm" />
				<?php } ?>
				<?php if($popedom['create']){ ?>
				<input type="button" value="<?php echo P_Lang("备份");?>" onclick="$.admin_sql.backup()" class="layui-btn  layui-btn-sm" />
				<?php } ?>
			</div>
			<?php } ?>
		</div>
	</div>
</div>
<?php $this->output("foot_lay","file",true,false); ?>