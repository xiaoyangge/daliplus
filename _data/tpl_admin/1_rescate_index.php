<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->output("head_lay","file",true,false); ?>
<div class="layui-card">
	<div class="layui-card-header">
		<?php echo P_Lang("资源分类列表");?>
		<div class="fr">
			<button class="layui-btn layui-btn-sm" onclick="$.win('<?php echo P_Lang("创建资源分类");?>','<?php echo phpok_url(array('ctrl'=>'rescate','func'=>'set'));?>');">
				<i class="layui-icon">&#xe608;</i> <?php echo P_Lang("创建资源分类");?>
			</button>
		</div>
	</div>
	<div class="layui-card-body">
		<table class="layui-table">
			<thead>
			<tr>
				<th>ID</th>
				<th><?php echo P_Lang("名称");?></th>
				<th><?php echo P_Lang("根目录");?></th>
				<th><?php echo P_Lang("子目录");?></th>
				<th><?php echo P_Lang("附件类型");?></th>
				<th><?php echo P_Lang("是否默认");?></th>
				<th><?php echo P_Lang("操作");?></th>
			</tr>
			</thead>
			<tbody>
			<?php $rslist_id["num"] = 0;$rslist=is_array($rslist) ? $rslist : array();$rslist_id = array();$rslist_id["total"] = count($rslist);$rslist_id["index"] = -1;foreach($rslist as $key=>$value){ $rslist_id["num"]++;$rslist_id["index"]++; ?>
			<tr>
				<td><?php echo $value['id'];?></td>
				<td><?php echo $value['title'];?></td>
				<td><?php echo $value['root'];?></td>
				<td><?php echo $value['folder'];?></td>
				<td><?php echo $value['filetypes'];?></td>
				<td><?php if($value['is_default']){ ?><span class="darkblue"><?php echo P_Lang("是");?></span><?php } else { ?><?php echo P_Lang("否");?><?php } ?></td>
				<td>
					<div class="layui-btn-group">
						<?php if($popedom['modify']){ ?><input type="button" value="<?php echo P_Lang("编辑");?>" onclick="$.win('<?php echo P_Lang("编辑附件分类");?>_#<?php echo $value['id'];?>','<?php echo phpok_url(array('ctrl'=>'rescate','func'=>'set','id'=>$value['id']));?>')" class="layui-btn layui-btn-sm" /><?php } ?>
						<?php if($popedom['delete']){ ?><input type="button" value="<?php echo P_Lang("删除");?>" onclick="$.admin_rescate.del('<?php echo $value['id'];?>','<?php echo $value['title'];?>')" class="layui-btn layui-btn-sm layui-btn-danger" /><?php } ?>
					</div>
				</td>
			</tr>
			<?php } ?>
			</tbody>
		</table>
	</div>
</div>
<?php $this->output("foot_lay","file",true,false); ?>