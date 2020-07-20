<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->output("head_lay","file",true,false); ?>
<div class="layui-card">
	<div class="layui-card-header">
		<?php echo P_Lang("风格方案管理");?>
		<div class="fr">
		<button class="layui-btn layui-btn-sm" onclick="$.admin_tpl.add()">
			<i class="layui-icon">&#xe608;</i> <?php echo P_Lang("添加风格");?>
		</button>
		</div>
	</div>
	<div class="layui-card-body">
		<blockquote class="layui-elem-quote">
			<?php echo P_Lang("风格管理支持多站点运行，手机版请在此风格文件夹名称上输入_mobile");?>
		</blockquote>
		<table class="layui-table">
		<thead>
		<tr>
			<th>ID</th>
			<th><?php echo P_Lang("名称");?></th>
			<th><?php echo P_Lang("目录");?></th>
			<th><?php echo P_Lang("文件夹改写");?></th>
			<th width="190"><?php echo P_Lang("操作");?></th>
		</tr>
		</thead>
		<tbody>
		<?php $rslist_id["num"] = 0;$rslist=is_array($rslist) ? $rslist : array();$rslist_id = array();$rslist_id["total"] = count($rslist);$rslist_id["index"] = -1;foreach($rslist as $key=>$value){ $rslist_id["num"]++;$rslist_id["index"]++; ?>
		<tr>
			<td><?php echo $value['id'];?></td>
			<td><?php echo $value['title'];?><?php if($value['author']){ ?> <span class="gray i">（<?php echo $value['author'];?>）</span><?php } ?></td>
			<td>tpl/<?php echo $value['folder'];?>/</td>
			<td><?php echo $value['folder_change'] ? $value['folder_change'] : '空';?></td>
			<td>
				<div class="layui-btn-group">
					<?php if($popedom['filelist']){ ?>
					<input type="button" value="<?php echo P_Lang("文件管理");?>" onclick="$.admin_tpl.tpl_filelist('tpl/<?php echo $value['folder'];?>/')" class="layui-btn layui-btn-sm" />
					<?php } ?>
					<?php if($popedom['set']){ ?>
					<input type="button" value="<?php echo P_Lang("编辑");?>" onclick="$.admin_tpl.tpl_set(<?php echo $value['id'];?>)" class="layui-btn layui-btn-sm" />
					<?php } ?>
					<?php if($popedom['delete']){ ?>
					<input type="button" value="<?php echo P_Lang("删除");?>" onclick="$.admin_tpl.tpl_delete(<?php echo $value['id'];?>,'<?php echo $value['title'];?>')" class="layui-btn layui-btn-sm layui-btn-danger" />
					<?php } ?>
				</div>
			</td>
		</tr>
		<?php } ?>
		</tbody>
		</table>
	</div>
</div>
<?php $this->output("foot_lay","file",true,false); ?>