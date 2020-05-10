<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->output("head_lay","file",true,false); ?>
<div class="layui-card">
	<div class="layui-card-header">
		<?php echo P_Lang("会员组列表");?>
		<div class="fr">
			<button class="layui-btn layui-btn-sm" onclick="$.admin_usergroup.add()">
				<i class="layui-icon">&#xe608;</i> <?php echo P_Lang("添加会员组");?>
			</button>
		</div>
	</div>
	<div class="layui-card-body">
		<table class="layui-table">
		<thead>
		<tr>
			<th class="center">组ID</th>
			<th width="20px"></th>
			<th><?php echo P_Lang("组名称");?></th>
			<th><?php echo P_Lang("审核机制");?></th>
			<th class="center"><?php echo P_Lang("排序");?></th>
			<th<?php echo P_Lang(">操作");?></th>
		</tr>
		</thead>
		<?php $rslist_id["num"] = 0;$rslist=is_array($rslist) ? $rslist : array();$rslist_id = array();$rslist_id["total"] = count($rslist);$rslist_id["index"] = -1;foreach($rslist as $key=>$value){ $rslist_id["num"]++;$rslist_id["index"]++; ?>
		<tr>
			<td align='center'><?php echo $value['id'];?></td>
			<td><span class="status<?php echo $value['status'];?>" id="status_<?php echo $value['id'];?>" <?php if($popedom['status']){ ?>onclick="$.admin_usergroup.status(<?php echo $value['id'];?>)"<?php } else { ?>style="cursor: default;"<?php } ?> value="<?php echo $value['status'];?>"></span></td>
			<td>
				<?php echo $value['title'];?>
				<?php if($value['is_open']){ ?>
				/ <span class="darkblue i"><?php echo P_Lang("开放选择");?></span>
				<?php } ?>
				<?php if($value['is_default']){ ?>
				/ <span class="red"><?php echo P_Lang("默认会员组");?></span>
				<?php } ?>
				<?php if($value['is_guest']){ ?>
				/ <span class="red"><?php echo P_Lang("游客组");?></span>
				<?php } ?>
			</td>
			<td>
				<?php if($value['register_status'] == 'email'){ ?>
				<?php echo P_Lang("邮件验证");?>
				<?php }elseif($value['register_status'] == 'code'){ ?>
				<?php echo P_Lang("邀请码验证");?>
				<?php }elseif($value['register_status']){ ?>
				<?php echo P_Lang("自动审核");?>
				<?php } else { ?>
				<?php echo P_Lang("人工审核");?>
				<?php } ?>
			</td>
			<td align="center"><?php echo $value['taxis'];?></td>
			<td>
				<div class="layui-btn-group">
					<?php if($popedom['modify']){ ?>
					<input type="button" value="<?php echo P_Lang("编辑");?>" class="layui-btn layui-btn-sm" onclick="$.admin_usergroup.modify('<?php echo $value['id'];?>')" />
					<?php } ?>
					<?php if(!$value['is_default'] && !$value['is_guest'] && $session['admin_rs']['if_system']){ ?>
					<input type="button" value="<?php echo P_Lang("设默认组");?>" onclick="$.admin_usergroup.set_default('<?php echo $value['id'];?>','<?php echo $value['title'];?>')" class="layui-btn layui-btn-sm" />
					<input type="button" value="<?php echo P_Lang("设游客组");?>" onclick="$.admin_usergroup.guest('<?php echo $value['id'];?>','<?php echo $value['title'];?>')" class="layui-btn layui-btn-sm" />
					<?php } ?>
					<?php if($popedom['delete']){ ?>
					<input type="button" value="<?php echo P_Lang("删除");?>" class="layui-btn layui-btn-sm layui-btn-danger" onclick="$.admin_usergroup.del('<?php echo $value['id'];?>')" />
					<?php } ?>
				</div>
			</td>
		</tr>
		<?php } ?>
		</table>
		
	</div>
</div>
<?php $this->output("foot_lay","file",true,false); ?>