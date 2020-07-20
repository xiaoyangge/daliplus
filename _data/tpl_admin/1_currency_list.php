<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->output("head_lay","file",true,false); ?>
<script type="text/javascript">
</script>
<div class="layui-card">
	<div class="layui-card-header">
		<?php echo P_Lang("货币及汇率管理");?>
		<div class="layui-btn-group fr">
			<button class="layui-btn layui-btn-sm" onclick="$.phpok.go('<?php echo phpok_url(array('ctrl'=>'currency','func'=>'set'));?>');">
				<i class="layui-icon">&#xe608;</i> <?php echo P_Lang("添加货币");?>
			</button>
			<button class="layui-btn layui-btn-sm layui-btn-danger" onclick="$.admin.close()">
				<i class="layui-icon">&#x1006;</i> <?php echo P_Lang("关闭");?>
			</button>
		</div>
	</div>
	<div class="layui-card-body">
		<table class="layui-table">
		<thead>
		<tr>
			<th>ID</th>
			<th><?php echo P_Lang("货币代号");?></th>
			<th><?php echo P_Lang("数字代码");?></th>
			<th><?php echo P_Lang("状态");?></th>
			<th><?php echo P_Lang("名称");?></th>
			<th><?php echo P_Lang("汇率");?></th>
			<th><?php echo P_Lang("显示效果");?></th>
			<th><?php echo P_Lang("排序");?></th>
			<th><div><?php echo P_Lang("操作");?></div></th>
		</tr>
		</thead>
		<tbody>
		<?php $rslist_id["num"] = 0;$rslist=is_array($rslist) ? $rslist : array();$rslist_id = array();$rslist_id["total"] = count($rslist);$rslist_id["index"] = -1;foreach($rslist as $key=>$value){ $rslist_id["num"]++;$rslist_id["index"]++; ?>
		<tr>
			<td><?php echo $value['id'];?></td>
			<td><?php echo $value['code'];?></td>
			<td><?php echo $value['code_num'];?></td>
			<td>
				<span class="status<?php echo $value['status'];?>" id="status_<?php echo $value['id'];?>" <?php if($popedom['status']){ ?>onclick="$.admin_currency.status(<?php echo $value['id'];?>)"<?php } ?> value="<?php echo $value['status'];?>"></span>
			</td>
			<td><label for="id_<?php echo $value['id'];?>"><?php echo $value['title'];?></label></td>
			<td><?php echo $value['val'];?></td>
			<td><?php echo $value['symbol_left'];?><?php echo rand('10','99');?>.<?php echo rand('10','99');?><?php echo $value['symbol_right'];?></td>
			<td><div class="gray i hand center" title="<?php echo P_Lang("点击调整排序");?>" name="taxis" data="<?php echo $value['id'];?>"><?php echo $value['taxis'];?></div></td>
			<td>
				<div class="layui-btn-group">
					<?php if($popedom['modify']){ ?><input type="button" value="<?php echo P_Lang("编辑");?>" onclick="$.phpok.go('<?php echo phpok_url(array('ctrl'=>'currency','func'=>'set','id'=>$value['id']));?>')" class="layui-btn layui-btn-sm" /><?php } ?>
					<?php if($popedom['delete']){ ?><input type="button" value="<?php echo P_Lang("删除");?>" onclick="currency_del('<?php echo $value['id'];?>','<?php echo $value['title'];?>')" class="layui-btn layui-btn-sm layui-btn-danger" /><?php } ?>
				</div>
			</td>
		</tr>
		<?php } ?>
		</tbody>
		</table>
	</div>
</div>
<?php $this->output("foot_lay","file",true,false); ?>