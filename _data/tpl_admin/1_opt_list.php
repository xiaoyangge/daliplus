<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->output("head_lay","file",true,false); ?>
<script type="text/javascript">
var optconfig = {
	'width':'400px',
	'taxis':parseInt('<?php echo $total+1;?>') * 10,
	'pid':'<?php echo $pid;?>',
	'group_id':'<?php echo $group_id;?>'
}
</script>
<div class="layui-card">
	<div class="layui-card-header">
		<?php echo P_Lang("维护");?>
		<?php if($popedom['set']){ ?>
		<div class="layui-btn-group fr">
			<input type="button" value="<?php echo P_Lang("添加内容");?>" onclick="$.phpok_opt(optconfig).create({'okVal':'<?php echo P_Lang("添加");?>'})" class="layui-btn layui-btn-sm" />
			<?php if($_export){ ?>
			<input type="button" value="<?php echo P_Lang("导出");?>" onclick="$.admin_opt.opt_export('<?php echo $group_id;?>','<?php echo $pid;?>',false)" class="layui-btn layui-btn-sm" />
			<?php } ?>
			<input type="button" value="<?php echo P_Lang("导入");?>" onclick="$.admin_opt.opt_import('<?php echo $group_id;?>','<?php echo $pid;?>',false)" class="layui-btn layui-btn-sm" />
		</div>
		<?php } ?>
	</div>
	<div class="layui-card-body">
		<table class="layui-table" lay-even>
		<thead>
			<tr>
				<th class="center" width="40">ID</th>
				<th><?php echo P_Lang("值");?></th>
				<th><?php echo P_Lang("显示");?></th>
				<th width="80"><?php echo P_Lang("排序");?></th>
				<th ></th>
				
			</tr>
		</thead>
		<?php $rslist_id["num"] = 0;$rslist=is_array($rslist) ? $rslist : array();$rslist_id = array();$rslist_id["total"] = count($rslist);$rslist_id["index"] = -1;foreach($rslist as $key=>$value){ $rslist_id["num"]++;$rslist_id["index"]++; ?>
		<tr id="opt_<?php echo $value['id'];?>">
			<td class="center"><?php echo $value['id'];?></td>
			<td><?php echo $value['val'];?></td>
			<td><?php echo $value['title'];?></td>
			<td><?php echo $value['taxis'];?></td>
			<td>
				<div class="layui-btn-group">
					<input type="button" value="<?php echo P_Lang("子项");?>" onclick="$.win('<?php echo P_Lang("子项");?>_<?php echo $value['title'];?>','<?php echo phpok_url(array('ctrl'=>'opt','func'=>'list','pid'=>$value['id']));?>');" class="layui-btn  layui-btn-sm" />
					<?php if($popedom['set']){ ?>
					<input type="button" value="<?php echo P_Lang("导入");?>"  onclick="$.admin_opt.opt_import('<?php echo $group_id;?>','<?php echo $value['id'];?>')" class="layui-btn  layui-btn-sm" />
					<?php if($value['_export']){ ?><input type="button" value="<?php echo P_Lang("导出");?>" onclick="$.admin_opt.opt_export('<?php echo $group_id;?>','<?php echo $value['id'];?>',true)" class="layui-btn  layui-btn-sm" /><?php } ?>
					<input type="button" value="<?php echo P_Lang("编辑");?>" onclick="$.phpok_opt(optconfig).edit(<?php echo $value['id'];?>,{'okVal':'<?php echo P_Lang("修改");?>'})" class="layui-btn  layui-btn-sm" />
					<input type="button" value="<?php echo P_Lang("删除");?>" onclick="$.admin_opt.opt_delete(<?php echo $value['id'];?>,'<?php echo $value['title'];?>')" class="layui-btn  layui-btn-sm" />
					<?php } ?>
				</div>
			</td>
		</tr>
		<?php } ?>
		</table>
	</div>
</div>
<div id="html-edit-content" class="hide">
	<div class="layui-form">
		<div class="layui-form-item">
			<label class="layui-form-label">
				<span class="red">*</span> <?php echo P_Lang("显示");?>
			</label>
			<div class="layui-input-inline">
				<input type="text" name="title" class="layui-input" id="opt_title" />
			</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">
				<span class="red">*</span> <?php echo P_Lang("值");?>
			</label>
			<div class="layui-input-inline">
				<input type="text" name="val" id="opt_val" class="layui-input" />
			</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label"><?php echo P_Lang("排序");?></label>
			<div class="layui-input-inline">
				<input type="text" name="taxis" id="opt_taxis" class="layui-input" />
			</div>
		</div>
	</div>
</div>
<input type="hidden" id="parent_0" value="<?php echo $pid;?>" />

<?php $this->output("foot_lay","file",true,false); ?>
