<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->output("head_lay","file",true,false); ?>
<div class="layui-card">
	<div class="layui-card-header ">
		<?php echo P_Lang("管理员列表");?>
		<div class="fr">
			<a lay-href="<?php echo phpok_url(array('ctrl'=>'admin','func'=>'set'));?>" lay-text="<?php echo P_Lang("添加管理员");?>" class="layui-btn layui-btn-sm"><i class="layui-icon">&#xe608;</i> <?php echo P_Lang("添加管理员");?></a>
		</div>
	</div>

	<div class="layui-card-body">
		<table class="layui-table">
			<colgroup>
				<col>
				<col>
				<col>
				<col>
				<col width="140">
			</colgroup>
			<thead>
			<tr>
				<th><?php echo P_Lang("ID");?></th>
				<th><?php echo P_Lang("状态");?></th>
				<th><?php echo P_Lang("账号");?></th>
				<th><?php echo P_Lang("邮箱");?></th>
				<th><?php echo P_Lang("操作");?></th>
			</tr>
			</thead>
			<tbody>
			<?php $rslist_id["num"] = 0;$rslist=is_array($rslist) ? $rslist : array();$rslist_id = array();$rslist_id["total"] = count($rslist);$rslist_id["index"] = -1;foreach($rslist as $key=>$value){ $rslist_id["num"]++;$rslist_id["index"]++; ?>
			<tr id="admin_tr_<?php echo $value['id'];?>">
				<td><?php echo $value['id'];?></td>
				<td>
					<input type="button" id="status_<?php echo $value['id'];?>" value="<?php if($value['status']){ ?><?php echo P_Lang("启用");?><?php } else { ?><?php echo P_Lang("停用");?><?php } ?>" onclick="$.admin_admin.status(<?php echo $value['id'];?>)" class="layui-btn layui-btn-sm <?php if(!$value['status']){ ?> layui-btn-danger<?php } ?>" />
				</td>
				<td><div style="padding-left:7px"><?php echo $value['account'];?><?php if($value['if_system']){ ?><span class="red i"><?php echo P_Lang("（系统管理员）");?></span><?php } ?></div></td>
				<td><div style="padding-left:7px"><?php echo $value['email'];?></div></td>
				<td width="50">
					<?php if($popedom['modify']){ ?>
					<input type="button" value="<?php echo P_Lang("编辑");?>" class="layui-btn layui-btn-sm <?php if($value['id'] == $session['admin_id']){ ?> layui-btn-disabled<?php } ?>" <?php if($value['id'] == $session['admin_id']){ ?> disabled title="你不能编辑自己的信息"<?php } ?> onclick="$.admin_admin.set(<?php echo $value['id'];?>)" />
					<?php } ?>
					<?php if($popedom['delete']){ ?>
					<input type="button" value="<?php echo P_Lang("删除");?>" class="layui-btn layui-btn-sm <?php if($value['if_system'] && $value['id'] == $session['admin_id']){ ?> layui-btn-disabled<?php } ?>" <?php if($value['id'] != $session['admin_id']){ ?>onclick="$.admin_admin.del('<?php echo $value['id'];?>','<?php echo $value['account'];?>')"<?php } else { ?>disabled title="你不能删除管理员或自己的信息"<?php } ?> />
					<?php } ?>
				</td>
			</tr>
			<?php } ?>
			</tbody>
		</table>
	</div>

</div>
<?php $this->output("foot_lay","file",true,false); ?>