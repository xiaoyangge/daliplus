<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->output("head_lay","file",true,false); ?>
<div style="display:none" id="help_info">
	<ol>
		<li>值框支持填写负数，正数，负数表示扣除，当值为0时，不能再执行扣除操作</li>
		<li>登录获取财富同一天仅限第一次有效</li>
		<li>仅在订单中支持变量price支持数学计算，如-(price/10+10)</li>
		<li>对象：所有财富在未指定规则时，都计算到用户，除非您指定了介绍人（也就是推荐人）</li>
		<li>目前用户级别请到：<span class="red">data/xml/user_agent.xml</span> 修改</li>
		<li>主题支持变量integral，支持数学计算，如-(integral/10+10)，此参数也支持在订单中使用（仅限订单中有关联的产品）</li>
		<li class="red" style="font-size:2em;">注意，每一行都得单独提交！不然系统是不会保存数据的</li>
	</ol>
</div>
<div class="layui-card">
	<div class="layui-card-header">
		<?php echo $rs['title'];?>
		<div class="layui-btn-group fr">
			<input type="button" value="添加新规则" onclick="$.admin_wealth.rule_add('<?php echo $rs['id'];?>')" class="layui-btn layui-btn-sm" />
			<input type="button" value="帮助说明" onclick="$.admin_wealth.rule_help()" class="layui-btn layui-btn-sm layui-btn-normal" />
		</div>
		<div class="clear"></div>
	</div>
	<div class="layui-card-body">
		<table class="layui-table">
		<thead>
		<tr>
			<th width="75">ID</th>
			<th><?php echo P_Lang("执行动作");?></th>
			<th><?php echo P_Lang("限制");?></th>
			<th><?php echo P_Lang("值");?></th>
			<th><?php echo P_Lang("对象");?></th>
			<th width="75"><?php echo P_Lang("排序");?></th>
			<th><?php echo P_Lang("操作");?></th>
		</tr>
		</thead>
		<?php $rslist_id["num"] = 0;$rslist=is_array($rslist) ? $rslist : array();$rslist_id = array();$rslist_id["total"] = count($rslist);$rslist_id["index"] = -1;foreach($rslist as $key=>$value){ $rslist_id["num"]++;$rslist_id["index"]++; ?>
		<tr>
			<td><?php echo $value['id'];?></td>
			<td><?php echo $value['action_title'];?></td>
			<td>
				<?php if($value['group_id']){ ?>
				<div><?php echo P_Lang("会员组");?>_<?php echo $value['group_title'];?></div>
				<?php } ?>
				<?php if($value['uids']){ ?>
				<div><?php echo P_Lang("会员ID");?>_<?php echo $value['uids'];?></div>
				<?php } ?>
				<?php if($value['project_id']){ ?>
				<div><?php echo P_Lang("项目");?>_<?php echo $value['project_title'];?></div>
				<?php } ?>
				<?php if($value['title_id']){ ?>
				<div><?php echo P_Lang("主题ID");?>_<?php echo $value['title_id'];?></div>
				<?php } ?>
				<?php if($value['qty'] && $value['qty_type'] == 'order'){ ?>
				<div><?php echo P_Lang("会员订单数量最小限制");?>_<?php echo $value['qty'];?></div>
				<?php } ?>
				<?php if($value['qty'] && $value['qty_type'] == 'order2'){ ?>
				<div><?php echo P_Lang("目标会员订单数量最小限制");?>_<?php echo $value['qty'];?></div>
				<?php } ?>
				<?php if($value['qty'] && $value['qty_type'] == 'order3'){ ?>
				<div><?php echo P_Lang("目标会员下线订单数量最小限制");?>_<?php echo $value['qty'];?></div>
				<?php } ?>
				<?php if($value['qty'] && $value['qty_type'] == 'product'){ ?>
				<div><?php echo P_Lang("会员订单产品数量最小限制");?>_<?php echo $value['qty'];?></div>
				<?php } ?>
				<?php if($value['qty'] && $value['qty_type'] == 'product2'){ ?>
				<div><?php echo P_Lang("目标会员订单产品数量最小限制");?>_<?php echo $value['qty'];?></div>
				<?php } ?>
				<?php if($value['qty'] && $value['qty_type'] == 'product3'){ ?>
				<div><?php echo P_Lang("目标会员下线订单产品数量最小限制");?>_<?php echo $value['qty'];?></div>
				<?php } ?>
				<?php if($value['price'] && $value['price_type'] == 'order'){ ?>
				<div><?php echo P_Lang("会员订单金额最小限制");?>_<?php echo $value['price'];?></div>
				<?php } ?>
				<?php if($value['price'] && $value['price_type'] == 'order2'){ ?>
				<div><?php echo P_Lang("目标会员订单金额最小限制");?>_<?php echo $value['price'];?></div>
				<?php } ?>
				<?php if($value['price'] && $value['price_type'] == 'order3'){ ?>
				<div><?php echo P_Lang("目标会员下线订单金额最小限制");?>_<?php echo $value['price'];?></div>
				<?php } ?>
				<?php if($value['price'] && $value['price_type'] == 'product'){ ?>
				<div><?php echo P_Lang("会员产品金额最小限制");?>_<?php echo $value['price'];?></div>
				<?php } ?>
				<?php if($value['price'] && $value['price_type'] == 'product2'){ ?>
				<div><?php echo P_Lang("目标会员产品金额最小限制");?>_<?php echo $value['price'];?></div>
				<?php } ?>
				<?php if($value['price'] && $value['price_type'] == 'product3'){ ?>
				<div><?php echo P_Lang("目标会员下线产品金额最小限制");?>_<?php echo $value['price'];?></div>
				<?php } ?>
				<?php if(!$value['group_id'] && !$value['project_id'] && !$value['qty'] && !$value['price']){ ?>
				<div><?php echo P_Lang("暂无限制");?></div>
				<?php } ?>
			</td>
			<td><?php echo $value['val'];?></td>
			<td>
				<?php echo $value['goal_title'];?>
				<?php if($value['goal_group_id'] && $value['goal_group_title']){ ?>
				<div><?php echo P_Lang("限制会员组");?>_<?php echo $value['goal_group_title'];?></div>
				<?php } ?>
				<?php if($value['goal_uids']){ ?>
				<div><?php echo P_Lang("限制会员ID");?>_<?php echo $value['goal_uids'];?></div>
				<?php } ?>
			</td>
			<td><?php echo $value['taxis'];?></td>
			<td>
				<div class="layui-btn-group">
					<input type="button" value="<?php echo P_Lang("编辑");?>" class="layui-btn layui-btn-sm" onclick="$.admin_wealth.rule_edit('<?php echo $value['id'];?>')" />
					<input type="button" value="<?php echo P_Lang("删除");?>" onclick="$.admin_wealth.rule_delete('<?php echo $value['id'];?>')" class="layui-btn layui-btn-sm layui-btn-danger" />
				</div>
			</td>
		</tr>
		<?php } ?>
		</table>
	</div>
</div>
<?php $this->output("foot_lay","file",true,false); ?>