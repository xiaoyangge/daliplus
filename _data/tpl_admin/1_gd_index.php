<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->output("head_lay","file",true,false); ?>
<script src="<?php echo add_js('admin.fields.js');?>"></script>
<div class="layui-card">
	<div class="layui-card-header">
		<?php echo P_Lang("图片方案");?>
		<div class="layui-btn-group fr">
			<input type="button" value="<?php echo P_Lang("编辑器使用原文件");?>" onclick="$.admin_gd.tofile()" class="layui-btn layui-btn-sm" />
			<input type="button" value="<?php echo P_Lang("添加GD方案");?>" onclick="$.win('<?php echo P_Lang("添加GD方案");?>','<?php echo phpok_url(array('ctrl'=>'gd','func'=>'set'));?>')" class="layui-btn layui-btn-sm" />
		</div>
	</div>
	<div class="layui-card-body">
		<table class="layui-table">
		<thead>
		<tr>
			<th>ID</th>
			<th><?php echo P_Lang("标识串");?></th>
			<th><?php echo P_Lang("宽");?> &#215; <?php echo P_Lang("高");?></th>
			<th><?php echo P_Lang("生成方式");?></th>
			<th><?php echo P_Lang("编辑器支持");?></th>
			<th><?php echo P_Lang("水印");?></th>
			<th width="140"><?php echo P_Lang("操作");?></th>
		</tr>
		</thead>
		<tbody>
		<?php $is_editor = false;?>
		<?php $tmpid["num"] = 0;$rslist=is_array($rslist) ? $rslist : array();$tmpid = array();$tmpid["total"] = count($rslist);$tmpid["index"] = -1;foreach($rslist as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
		<tr>
			<td><?php echo $value['id'];?></td>
			<td><?php echo $value['identifier'];?></td>
			<td>
				<?php if(!$value['width'] && !$value['height']){ ?>
				<?php echo P_Lang("保留原宽高");?>
				<?php } else { ?>
					<?php if($value['width']){ ?><?php echo $value['width'];?><?php } else { ?><?php echo P_Lang("默认");?><?php } ?> &#215;
					<?php if($value['height']){ ?><?php echo $value['height'];?><?php } else { ?><?php echo P_Lang("默认");?><?php } ?>
				<?php } ?>
			</td>
			<td><?php if($value['cut_type']){ ?><?php echo P_Lang("裁剪法");?><?php } else { ?><?php echo P_Lang("缩放法");?><?php } ?></td>
			<td>
				<?php if($value['editor']){ ?>
				<span class="red"><?php echo P_Lang("默认");?></span>
				<?php } else { ?>
				<input type="button" value="<?php echo P_Lang("设为默认");?>" class="layui-btn layui-btn-sm" onclick="$.admin_gd.editor('<?php echo $value['id'];?>')" />
				<?php } ?>
			</td>
			<td class="center"><?php if($value['mark_picture']){ ?><span class="darkblue"><?php echo P_Lang("有");?></span><?php } else { ?><?php echo P_Lang("无");?><?php } ?></td>
			<td>
				<?php if($popedom['modify'] || $popedom['delete']){ ?>
				<div class="layui-btn-group">
					<?php if($popedom['modify']){ ?><input type="button" value="<?php echo P_Lang("编辑");?>" onclick="parent.layui.index.openTabsPage('<?php echo phpok_url(array('ctrl'=>'gd','func'=>'set','id'=>$value['id']));?>','<?php echo P_Lang("编辑方案");?>');" class="layui-btn layui-btn-sm" /><?php } ?>
					<?php if($popedom['delete']){ ?><input type="button" value="<?php echo P_Lang("删除");?>" onclick="$.admin_gd.del('<?php echo $value['id'];?>')" class="layui-btn layui-btn-sm layui-btn-danger" /><?php } ?>
				</div>
				<?php } ?>
			</td>
		</tr>
		<?php } ?>
		</tbody>
		</table>		
	</div>
</div>

<?php $this->output("foot_lay","file",true,false); ?>