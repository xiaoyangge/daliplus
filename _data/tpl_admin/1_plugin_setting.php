<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->output("head_lay","file",true,false); ?>
<div class="layui-card">
	<div class="layui-card-header ">
		<?php echo P_Lang("插件快捷图标设置");?>
		<div class="fr">
		<button class="layui-btn layui-btn-sm" onclick="$.admin_plugin.icon('<?php echo $id;?>','','<?php echo P_Lang("添加图标");?>');">
			<i class="layui-icon">&#xe608;</i> <?php echo P_Lang("添加图标");?>
		</button>
		</div>
	</div>

	<div class="layui-card-body">

		<div class="layui-btn-group test-table-operate-btn" style="margin-bottom: 10px;">
			
		</div>

		<table class="layui-table">
			<thead>
			<tr>
				<th>标题</th>
				<th>显示区域</th>
				<th>执行方法</th>
				<th>排序</th>
				<th width="150px">操作</th>
			</tr>
			</thead>
			<tbody>
			<?php $idx["num"] = 0;$rslist=is_array($rslist) ? $rslist : array();$idx = array();$idx["total"] = count($rslist);$idx["index"] = -1;foreach($rslist as $key=>$value){ $idx["num"]++;$idx["index"]++; ?>
			<tr>
				<td><?php echo $value['title'];?></td>
				<td><?php echo $value['position'];?></td>
				<td><?php echo $value['efunc_title'];?><?php if($value['efunc_title'] != $value['efunc']){ ?> / <?php echo $value['efunc'];?><?php } ?></td>
				<td><?php echo $value['taxis'];?></td>
				<td>
					<div class="layui-btn-group">
						<input type="button" value="<?php echo P_Lang("修改");?>" onclick="$.admin_plugin.icon('<?php echo $id;?>','<?php echo $value['id'];?>','<?php echo P_Lang("修改");?>')" class="layui-btn layui-btn-sm" />
						<input type="button" value="<?php echo P_Lang("删除");?>" onclick="$.admin_plugin.icon_del('<?php echo $id;?>','<?php echo $value['id'];?>','<?php echo $value['title'];?>')" class="layui-btn layui-btn-sm layui-btn-danger" />
					</div>
				</td>
			</tr>
			<?php } ?>
			</tbody>
		</table>
	</div>

</div>
<?php $this->output("foot_lay","file",true,false); ?>