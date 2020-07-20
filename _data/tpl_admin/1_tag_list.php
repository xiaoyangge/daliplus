<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->output("head_lay","file",true,false); ?>
<div class="layui-card">
	<div class="layui-card-header">
		<?php echo P_Lang("列表");?>
		<div class="layui-btn-group fr">
			<button type="button" onclick="$.admin_tag.add_title('<?php echo $rs['id'];?>','<?php echo $rs['title'];?>')" class="layui-btn layui-btn-sm">
				<i class="layui-icon layui-icon-add-1"></i> <?php echo P_Lang("添加主题");?>
			</button>
			<button type="button" onclick="$.admin_tag.add_cate('<?php echo $rs['id'];?>','<?php echo $rs['title'];?>')" class="layui-btn layui-btn-sm">
				<i class="layui-icon layui-icon-add-1"></i> <?php echo P_Lang("添加分类");?>
			</button>
			<button type="button" onclick="$.admin_tag.add_project('<?php echo $rs['id'];?>','<?php echo $rs['title'];?>')" class="layui-btn layui-btn-sm">
				<i class="layui-icon layui-icon-add-1"></i> <?php echo P_Lang("添加项目");?>
			</button>
		</div>
	</div>
	<div class="layui-card-body">
		<table class="layui-table">
		<thead>
		<tr>
			<th>&nbsp;</th>
			<th>ID</th>
			<th><?php echo P_Lang("类型");?></th>
			<th><?php echo P_Lang("状态");?></th>
			<th><?php echo P_Lang("标题");?></th>
			<th><?php echo P_Lang("操作");?></th>
		</tr>
		</thead>
		<?php $tmpid["num"] = 0;$rslist=is_array($rslist) ? $rslist : array();$tmpid = array();$tmpid["total"] = count($rslist);$tmpid["index"] = -1;foreach($rslist as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
		<tr id="tag_<?php echo $value['id'];?>">
			<td class="center"><input type="checkbox" name="id[]" value="<?php echo $value['id'];?>" /></td>
			<td><?php echo $value['id'];?></td>
			<td><?php echo $value['type'];?></td>
			<td><?php if($value['status']){ ?><?php echo P_Lang("正常");?><?php } else { ?><span class="red"><?php echo P_Lang("异常");?></span><?php } ?></td>
			<td><?php echo $value['title'];?></td>
			<td>
				<input type="button" value="<?php echo P_Lang("删除");?>" onclick="$.admin_tag.delete_title('<?php echo $rs['id'];?>','<?php echo $value['id'];?>')" class="layui-btn layui-btn-sm layui-btn-danger" />
				<?php if($value['manage']){ ?>
				<input type="button" value="<?php echo P_Lang("编辑");?>" onclick="$.win('<?php echo P_Lang("编辑");?>_#<?php echo $value['id'];?>','<?php echo $value['manage'];?>')" class="layui-btn layui-btn-sm" />
				<?php } ?>
			</td>
		</tr>
		<?php } ?>
		</table>
		<ul class="layout">
			<li>
				<div class="layui-btn-group">
					<input type="button" value="<?php echo P_Lang("全选");?>" class="layui-btn layui-btn-primary layui-btn-sm" onclick="$.input.checkbox_all()" />
					<input type="button" value="<?php echo P_Lang("全不选");?>" class="layui-btn layui-btn-primary layui-btn-sm" onclick="$.input.checkbox_none()" />
					<input type="button" value="<?php echo P_Lang("反选");?>" class="layui-btn layui-btn-primary layui-btn-sm" onclick="$.input.checkbox_anti()" />
				</div>
			</li>
			<li id="plugin_button">
				<input type="button" value="<?php echo P_Lang("删除");?>" onclick="$.admin_tag.delete_title2('<?php echo $rs['id'];?>')" class="layui-btn layui-btn-sm layui-btn-danger" />
			</li>
		</ul>
		<div align="center"><?php $this->output("pagelist","file",true,false); ?></div>
	</div>
</div>

<?php $this->output("foot_lay","file",true,false); ?>