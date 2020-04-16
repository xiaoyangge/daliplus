<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->output("head_lay","file",true,false); ?>
<div class="layui-card">
	<div class="layui-card-header">
		<?php echo P_Lang("表单选项");?>
		<div class="layui-btn-group fr">
			<input type="button" value="<?php echo P_Lang("添加新组");?>" onclick="$.admin_opt.group_add()" class="layui-btn layui-btn-sm" />
			<input type="button" value="<?php echo P_Lang("导入项目");?>" onclick="$.admin_opt.opt_import()" class="layui-btn layui-btn-sm" />
		</div>
	</div>
	<div class="layui-card-body">
		<table lay-even class="layui-table">
		<thead>
		<tr>
			<th width="30">ID</th>
			<th><?php echo P_Lang("名称");?></th>
			<th><i class="layui-icon layui-tips" lay-tips="<?php echo P_Lang("仅限用户自定义字段使用多选时有效，留空使用英文竖线");?>">&#xe702;</i> <?php echo P_Lang("连字符");?></th>
			<th></th>
		</tr>
		</thead>
		<?php $tmpid["num"] = 0;$rslist=is_array($rslist) ? $rslist : array();$tmpid = array();$tmpid["total"] = count($rslist);$tmpid["index"] = -1;foreach($rslist as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
		<tr>
			<td><?php echo $value['id'];?></td>
			<td><?php echo $value['title'];?></td>
			<td><?php if($value['link_symbol']){ ?><?php echo $value['link_symbol'];?><?php } ?></td>
			<td>
				<div class="layui-btn-group">
					<input type="button" value="<?php echo P_Lang("内容");?>" onclick="$.win('<?php echo P_Lang("内容");?>_<?php echo $value['title'];?>','<?php echo phpok_url(array('ctrl'=>'opt','func'=>'list','group_id'=>$value['id']));?>');" class="layui-btn  layui-btn-sm" />
					<?php if($popedom['set']){ ?>
					<input type="button" value="<?php echo P_Lang("导入");?>" onclick="$.admin_opt.opt_import('<?php echo $value['id'];?>')" class="layui-btn  layui-btn-sm" />
					<?php if($value['_export']){ ?><input type="button" value="<?php echo P_Lang("导出");?>" onclick="$.admin_opt.opt_export('<?php echo $value['id'];?>',true)" class="layui-btn  layui-btn-sm" /><?php } ?>
					<input type="button" value="<?php echo P_Lang("编辑");?>" onclick="$.admin_opt.group_edit('<?php echo $value['id'];?>','<?php echo $value['title'];?>')" class="layui-btn  layui-btn-sm" />
					<input type="button" value="<?php echo P_Lang("删除");?>" onclick="$.admin_opt.group_delete('<?php echo $value['id'];?>','<?php echo $value['title'];?>')" class="layui-btn  layui-btn-sm" />
					<?php } ?>
				</div>
			</td>
		</tr>
		<?php } ?>
		</table>
	</div>
</div>
<?php $this->output("foot_lay","file",true,false); ?>