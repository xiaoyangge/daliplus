<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->output("head_lay","file",true,false); ?>
<div class="layui-card">
	<div class="layui-card-header">
		<div class="layui-btn-group fr">
			<input type="button" value="<?php echo P_Lang("添加方案");?>" onclick="$.admin_wealth.set()" class="layui-btn layui-btn-sm" />
			<input type="button" value="<?php echo P_Lang("未审核财富");?>" onclick="$.win('<?php echo P_Lang("未审核财富");?>','<?php echo phpok_url(array('ctrl'=>'wealth','func'=>'notcheck'));?>')" class="layui-btn layui-btn-sm layui-btn-normal" />
		</div>
	</div>
	<div class="layui-card-body">
		<table class="layui-table">
		<thead>
		<tr>
			<th>ID</th>
			<th>&nbsp;</th>
			<th><?php echo P_Lang("名称");?></th>
			<th><?php echo P_Lang("标识");?></th>
			<th><?php echo P_Lang("计量单位");?></th>
			<th><?php echo P_Lang("在线支付");?></th>
			<th><?php echo P_Lang("抵现");?></th>
			<th>&nbsp;</th>
		</tr>
		</thead>
		<?php $rslist_id["num"] = 0;$rslist=is_array($rslist) ? $rslist : array();$rslist_id = array();$rslist_id["total"] = count($rslist);$rslist_id["index"] = -1;foreach($rslist as $key=>$value){ $rslist_id["num"]++;$rslist_id["index"]++; ?>
		<tr>
			<td><?php echo $value['id'];?></td>
			<td><span class="status<?php echo $value['status'];?>" id="status_<?php echo $value['id'];?>" <?php if($popedom['status']){ ?>onclick="$.admin_wealth.status(<?php echo $value['id'];?>)"<?php } else { ?> style="cursor: default;"<?php } ?> value="<?php echo $value['status'];?>"></span></td>
			<td><?php echo $value['title'];?></td>
			<td><?php echo $value['identifier'];?></td>
			<td><?php echo $value['unit'];?></td>
			<td><?php if($value['ifpay']){ ?><?php echo P_Lang("支持");?> <span class="gray i">（购买：1元=<?php echo $value['pay_ratio'];?><?php echo $value['unit'];?>）</span><?php } else { ?><?php echo P_Lang("不支持");?><?php } ?></td>
			<td><?php if($value['ifcash']){ ?><?php echo P_Lang("支持");?> <span class="gray i">（兑换：100<?php echo $value['unit'];?>=<?php echo $value['cash_ratio'];?>元）</span><?php } else { ?><?php echo P_Lang("不支持");?><?php } ?></td>
			<td>
				<div class="layui-btn-group">
					<input type="button" value="<?php echo P_Lang("编辑");?>" onclick="$.admin_wealth.set(<?php echo $value['id'];?>)" class="layui-btn layui-btn-sm" />
					<input type="button" value="<?php echo P_Lang("规则");?>" onclick="$.admin_wealth.rule(<?php echo $value['id'];?>)" class="layui-btn layui-btn-sm" />
					<input type="button" value="<?php echo P_Lang("记录");?>" onclick="$.admin_wealth.info(<?php echo $value['id'];?>)" class="layui-btn layui-btn-sm" />
					<input type="button" value="<?php echo P_Lang("删除");?>" onclick="$.admin_wealth.del('<?php echo $value['id'];?>')" class="layui-btn layui-btn-sm layui-btn-danger" />
				</div>
			</td>
		</tr>
		<?php } ?>
		</table>
	</div>
</div>
<script type="text/javascript">

</script>

<?php $this->output("foot_lay","file",true,false); ?>