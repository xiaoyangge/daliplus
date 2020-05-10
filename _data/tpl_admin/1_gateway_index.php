<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->output("head_lay","file",true,false); ?>
<?php $tmpid["num"] = 0;$rslist=is_array($rslist) ? $rslist : array();$tmpid = array();$tmpid["total"] = count($rslist);$tmpid["index"] = -1;foreach($rslist as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
<div class="layui-card">
	<div class="layui-card-header">
		<?php echo $value['title'];?>
		<div class="fr">
			<input type="button" value="<?php echo P_Lang("添加");?>" onclick="$.admin_gateway.add('<?php echo $key;?>')" class="layui-btn layui-btn-sm" />
		</div>
	</div>
	<div class="layui-card-body">
		<table class="layui-table">
			<thead>
			<tr>
				<th>ID</th>
				<th><?php echo P_Lang("标题");?></th>
				<th><?php echo P_Lang("默认");?></th>
				<th><?php echo P_Lang("状态");?></th>
				<th><?php echo P_Lang("排序");?></th>
				<th width="100px"><?php echo P_Lang("操作");?></th>
			</tr>
			</thead>
			<tbody>
			<?php $value_list_id["num"] = 0;$value['list']=is_array($value['list']) ? $value['list'] : array();$value_list_id = array();$value_list_id["total"] = count($value['list']);$value_list_id["index"] = -1;foreach($value['list'] as $k=>$v){ $value_list_id["num"]++;$value_list_id["index"]++; ?>
			<tr>
				<td><?php echo $v['id'];?></td>
				<td>
					<?php echo $v['title'];?>
					<?php if($v['extbtn']){ ?>
					<div style="margin-top:3px;">
						<?php $tmpid3["num"] = 0;$v['extbtn']=is_array($v['extbtn']) ? $v['extbtn'] : array();$tmpid3 = array();$tmpid3["total"] = count($v['extbtn']);$tmpid3["index"] = -1;foreach($v['extbtn'] as $kk=>$vv){ $tmpid3["num"]++;$tmpid3["index"]++; ?>
						<input type="button" value="<?php echo $vv['title'];?>" onclick="gateway_extmanage('<?php echo $v['id'];?>','<?php echo $kk;?>','<?php echo $vv['type'];?>')" class="layui-btn layui-btn-xs" />
						<?php } ?>
					</div>
					<?php } ?>
				</td>
				<td>
					<?php if($v['is_default']){ ?>
					<span class="darkblue"><?php echo P_Lang("是");?></span>
					<?php } else { ?>
					<input type="button" value="<?php echo P_Lang("设为默认");?>" onclick="$.admin_gateway.set_default(<?php echo $v['id'];?>)" class="phpok-btn" />
					<?php } ?>
				</td>
				<td>
					<input type="button" value="<?php if($v['status']){ ?><?php echo P_Lang("启用中");?><?php } else { ?><?php echo P_Lang("已禁用");?><?php } ?>" onclick="update_status(<?php echo $v['id'];?>,<?php echo $v['status'];?>)" class="layui-btn layui-btn-sm <?php if(!$v['status']){ ?> layui-btn-danger<?php } ?>" />
				</td>
				<td><div class="gray i hand center" title="<?php echo P_Lang("点击调整排序");?>" name="taxis" data="<?php echo $v['id'];?>"><?php echo $v['taxis'];?></div></td>
				<td>
					<div class="layui-btn-group">
						<input type="button" value="<?php echo P_Lang("编辑");?>" onclick="$.win('<?php echo P_Lang("编辑");?>_#<?php echo $v['id'];?>','<?php echo phpok_url(array('ctrl'=>'gateway','func'=>'set','id'=>$v['id']));?>')" class="layui-btn layui-btn-sm" />
						<input type="button" value="<?php echo P_Lang("删除");?>" onclick="delete_it('<?php echo $v['id'];?>','<?php echo $v['title'];?>')" class="layui-btn layui-btn-sm layui-btn-danger" />
					</div>
				</td>
			</tr>
			<?php } ?>
			</tbody>
		</table>
	</div>
</div>
<?php } ?>

<?php $this->output("foot_lay","file",true,false); ?>