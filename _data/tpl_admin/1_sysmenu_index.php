<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->output("head_lay","file",true,false); ?>
<link rel="stylesheet" type="text/css" href="css/icomoon.css" />
<div class="layui-card">
	<div class="layui-card-header " style="visibility: visible;">
		<div>核心配置管理</div>
	</div>
	
	<div class="layui-card-body">
		<table class="layui-table">
			<thead>
				<tr style="color: #000;font-size : bottom;">
					<th><?php echo P_Lang("名称");?></th>
					<th><?php echo P_Lang("控制器");?></th>
					<th><?php echo P_Lang("状态");?></th>
					<th><?php echo P_Lang("桌面显示");?></th>
					<th><?php echo P_Lang("排序");?></th>
					<th><?php echo P_Lang("操作");?></th>
				</tr>
			</thead>
			    <?php $tmpid["num"] = 0;$rslist=is_array($rslist) ? $rslist : array();$tmpid = array();$tmpid["total"] = count($rslist);$tmpid["index"] = -1;foreach($rslist as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
				<thead>
					<tr class="list">
						<td>&nbsp;<?php echo $value['title'];?></td>
						<td>&nbsp;</td>
						<td>
							<input type="button" value="<?php echo $value['status'] ? '启用' : '禁用';?>" class="layui-btn  layui-btn-sm"<?php if($popedom['status']){ ?> onclick="$.admin_system.set_status(<?php echo $value['id'];?>,this)"<?php } else { ?> onclick="$.dialog.alert('<?php echo P_Lang("您没有权限执行此功能");?>')"<?php } ?> />
						</td>
						<td>&nbsp;</td>
						<td class="center"><div class="gray i hand center" title="<?php echo P_Lang("点击调整排序");?>" name="taxis" data="<?php echo $value['id'];?>"><?php echo $value['taxis'];?></div></td>
						<td>
							<div class="layui-btn-group">
							<?php if($popedom['modify']){ ?><input type="button" value="<?php echo P_Lang("编辑");?>" onclick="$.phpok.go('<?php echo phpok_url(array('ctrl'=>'system','func'=>'set','id'=>$value['id']));?>')" class="layui-btn  layui-btn-sm" /><?php } ?>
							<?php if($popedom['add']){ ?><input type="button" value="<?php echo P_Lang("添加子项");?>"  onclick="$.phpok.go('<?php echo phpok_url(array('ctrl'=>'system','func'=>'set','pid'=>$value['id']));?>')" class="layui-btn  layui-btn-sm" /><?php } ?>
							</div>
						</td>
					</tr>
				</thead>
				<?php $tmpid2["num"] = 0;$value['sublist']=is_array($value['sublist']) ? $value['sublist'] : array();$tmpid2 = array();$tmpid2["total"] = count($value['sublist']);$tmpid2["index"] = -1;foreach($value['sublist'] as $k=>$v){ $tmpid2["num"]++;$tmpid2["index"]++; ?>
				<tr class="sub">
					<td><div class="pleft"><?php echo $v['title'];?></div></td>
					<td>&nbsp;<?php echo $v['_ctrlfile'];?></td>
					<td><input type="button" value="<?php if($v['status']){ ?><?php echo P_Lang("启用");?><?php } else { ?><?php echo P_Lang("禁用");?><?php } ?>" class="layui-btn layui-btn-sm<?php if(!$v['status']){ ?> layui-btn-danger<?php } ?>"<?php if($popedom['status']){ ?> onclick="$.admin_system.set_status(<?php echo $v['id'];?>,this)"<?php } else { ?> onclick="$.dialog.alert('<?php echo P_Lang("您没有权限执行此功能");?>')"<?php } ?> /></td>
					<td><input type="button" class="layui-btn  layui-btn-sm" id="icon_status_<?php echo $v['id'];?>" value="<?php if($v['icon']){ ?><?php echo P_Lang("显示");?><?php } else { ?><?php echo P_Lang("隐藏");?><?php } ?>" data-icon="<?php echo $v['icon'];?>" onclick="$.admin_system.icon_hs('<?php echo $v['id'];?>')" /> <i<?php if($v['icon']){ ?> class="icon-<?php echo $v['icon'];?>"<?php } ?> id="icon_<?php echo $v['id'];?>" style="font-size:16px;" onclick="$.admin_system.set_icon('<?php echo $v['id'];?>')"></i></td>
					<td class="center"><div class="gray i hand center" title="<?php echo P_Lang("点击调整排序");?>" name="taxis" data="<?php echo $v['id'];?>"><?php echo $v['taxis'];?></div></td>
					<td>
						<div class="layui-btn-group">
							<?php if($popedom['modify']){ ?><input type="button" value="<?php echo P_Lang("编辑");?>" onclick="$.phpok.go('<?php echo phpok_url(array('ctrl'=>'system','func'=>'set','id'=>$v['id']));?>')" class="layui-btn  layui-btn-sm" /><?php } ?>
							<?php if($popedom['delete']){ ?><input type="button" value="<?php echo P_Lang("删除");?>" onclick="$.admin_system.delete_sysmenu('<?php echo $v['id'];?>','<?php echo $v['title'];?>')" class="layui-btn  layui-btn-sm layui-btn-danger" /><?php } ?>
						</div>
					</td>
				</tr>
				<?php } ?>
			<?php } ?>
		</table>
	</div>
</div>
<?php $this->output("foot_lay","file",true,false); ?>

