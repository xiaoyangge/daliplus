<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->assign("nopadding","true"); ?><?php $this->assign("overflowy","true"); ?><?php $this->output("head_lay","file",true,false); ?>
<script type="text/javascript">
function save()
{
	var opener = $.dialog.opener;
	$("#post_save").ajaxSubmit({
		'url':get_url('wealth','save_rule'),
		'type':'post',
		'dataType':'json',
		'success':function(rs){
			if(rs.status){
				$.dialog.tips('操作成功');
				opener.$.phpok.reload();
				return true;
			}
			$.dialog.alert(rs.info);
			return false;
		}
	});
	return false;
}
</script>
<form method="post" class="layui-form" id="post_save" onsubmit="return save()">
<?php if($id){ ?>
<input type="hidden" name="id" id="id" value="<?php echo $id;?>" />
<?php } else { ?>
<input type="hidden" name="wid" id="wid" value="<?php echo $wid;?>" />
<?php } ?>
<div class="layui-card">
	<div class="layui-card-body">
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("执行动作");?>
			</label>
			<div class="layui-input-block">
				<select name="action">
					<?php $tmpid["num"] = 0;$alist=is_array($alist) ? $alist : array();$tmpid = array();$tmpid["total"] = count($alist);$tmpid["index"] = -1;foreach($alist as $k=>$v){ $tmpid["num"]++;$tmpid["index"]++; ?>
					<option value="<?php echo $k;?>"<?php if($rs['action'] == $k){ ?> selected<?php } ?>><?php echo $v;?></option>
					<?php } ?>
				</select>
			</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("会员组");?>
			</label>
			<div class="layui-input-block">
				<select name="group_id">
					<option value="">请选择…</option>
					<?php $tmpid["num"] = 0;$usergroup=is_array($usergroup) ? $usergroup : array();$tmpid = array();$tmpid["total"] = count($usergroup);$tmpid["index"] = -1;foreach($usergroup as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
					<option value="<?php echo $value['id'];?>"<?php if($rs['group_id'] == $value['id']){ ?> selected<?php } ?>><?php echo $value['title'];?></option>
					<?php } ?>
				</select>
			</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("会员ID");?>
			</label>
			<div class="layui-input-inline">
				<input type="text" id="uids" name="uids" class="layui-input" value="<?php echo $rs['uids'];?>" />
			</div>
			<div class="layui-form-mid">
				<?php echo P_Lang("多个会员ID用英文逗号隔开");?>
			</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("项目");?>
			</label>
			<div class="layui-input-block">
				<select name="project_id">
					<option value="">请选择…</option>
					<?php $tmpid["num"] = 0;$projectlist=is_array($projectlist) ? $projectlist : array();$tmpid = array();$tmpid["total"] = count($projectlist);$tmpid["index"] = -1;foreach($projectlist as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
					<option value="<?php echo $value['id'];?>" <?php if($rs['project_id']==$value['id']){ ?> selected<?php } ?>><?php echo $value['title'];?> </option>
						<?php } ?>
				</select>
			</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("主题ID");?>
			</label>
			<div class="layui-input-inline">
				<input type="text" id="title_id" name="title_id" class="layui-input" value="<?php echo $rs['title_id'];?>" />
			</div>
			<div class="layui-form-mid">
				<?php echo P_Lang("多个主题ID用英文逗号隔开");?>
			</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("最小数量");?>
			</label>
			<div class="layui-input-inline short">
				<input type="text" id="qty" name="qty" class="layui-input" value="<?php echo $rs['qty'];?>" />
			</div>
			<div class="layui-input-inline short">
				<select name="qty_type">
					<option value="order"<?php if($rs['qty_type'] == 'order'){ ?> selected<?php } ?>><?php echo P_Lang("订单");?></option>
					<option value="product"<?php if($rs['qty_type'] == 'product'){ ?> selected<?php } ?>><?php echo P_Lang("产品");?></option>
					<option value="order2"<?php if($rs['qty_type'] == 'order2'){ ?> selected<?php } ?>><?php echo P_Lang("目标订单");?></option>
					<option value="product2"<?php if($rs['qty_type'] == 'product2'){ ?> selected<?php } ?>><?php echo P_Lang("目标产品");?></option>
					<option value="order3"<?php if($rs['qty_type'] == 'order3'){ ?> selected<?php } ?>><?php echo P_Lang("目标下线订单");?></option>
					<option value="product3"<?php if($rs['qty_type'] == 'product3'){ ?> selected<?php } ?>><?php echo P_Lang("目标下线产品");?></option>
				</select>
			</div>
			<div class="layui-form-mid">
				<?php echo P_Lang("请根据实际情况选择");?>
			</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("最小金额");?>
			</label>
			<div class="layui-input-inline short">
				<input type="text" id="price" name="price" class="layui-input" value="<?php echo $rs['price'];?>" />
			</div>
			<div class="layui-input-inline short">
				<select name="price_type">
					<option value="order"<?php if($rs['price_type'] == 'order'){ ?> selected<?php } ?>><?php echo P_Lang("订单");?></option>
					<option value="product"<?php if($rs['price_type'] == 'product'){ ?> selected<?php } ?>><?php echo P_Lang("产品");?></option>
					<option value="order2"<?php if($rs['price_type'] == 'order2'){ ?> selected<?php } ?>><?php echo P_Lang("目标订单");?></option>
					<option value="product2"<?php if($rs['price_type'] == 'product2'){ ?> selected<?php } ?>><?php echo P_Lang("目标产品");?></option>
					<option value="order3"<?php if($rs['price_type'] == 'order3'){ ?> selected<?php } ?>><?php echo P_Lang("目标下线订单");?></option>
					<option value="product3"<?php if($rs['price_type'] == 'product3'){ ?> selected<?php } ?>><?php echo P_Lang("目标下线产品");?></option>
				</select>
			</div>
			<div class="layui-form-mid">
				<?php echo P_Lang("请根据实际情况选择");?>
			</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("目标");?>
			</label>
			<div class="layui-input-block">
				<select name="goal">
					<option value=""><?php echo P_Lang("请选择…");?></option>
					<?php $tmpid["num"] = 0;$agentlist=is_array($agentlist) ? $agentlist : array();$tmpid = array();$tmpid["total"] = count($agentlist);$tmpid["index"] = -1;foreach($agentlist as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
					<option value="<?php echo $key;?>" <?php if($key==$rs['goal']){ ?> selected<?php } ?>><?php echo $value;?> </option>
					<?php } ?>
				</select>
			</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("目标会员组");?>
			</label>
			<div class="layui-input-block">
				<select name="goal_group_id">
					<option value="">请选择…</option>
					<?php $tmpid["num"] = 0;$usergroup=is_array($usergroup) ? $usergroup : array();$tmpid = array();$tmpid["total"] = count($usergroup);$tmpid["index"] = -1;foreach($usergroup as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
					<option value="<?php echo $value['id'];?>"<?php if($rs['goal_group_id'] == $value['id']){ ?> selected<?php } ?>><?php echo $value['title'];?></option>
					<?php } ?>
				</select>
			</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("目标会员ID");?>
			</label>
			<div class="layui-input-inline">
				<input type="text" id="goal_uids" name="goal_uids" class="layui-input" value="<?php echo $rs['goal_uids'];?>" />
			</div>
			<div class="layui-form-mid">
				<?php echo P_Lang("多个会员ID用英文逗号隔开");?>
			</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("值");?>
			</label>
			<div class="layui-input-block">
				<input type="text" id="val" name="val" class="layui-input" value="<?php echo $rs['val'];?>" />
			</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("是否中止");?>
			</label>
			<div class="layui-input-block">
				<input type="radio" name="if_stop" value="0" title="继续执行下一条"<?php if(!$rs['if_stop']){ ?> checked<?php } ?> />
				<input type="radio" name="if_stop" value="1" title="中止退出"<?php if($rs['if_stop']){ ?> checked<?php } ?> />
			</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("排序");?>
			</label>
			<div class="layui-input-inline short">
				<input type="text" id="taxis" name="taxis" class="layui-input" value="<?php echo $rs['taxis'];?>" />
			</div>
			<div class="layui-form-mid">
				<?php echo P_Lang("值越小越往前靠，优先级越高，只要一条规则符合，后续无效");?>
			</div>
		</div>
	</div>
</div>
</form>
<?php $this->assign("is_open","true"); ?><?php $this->output("foot_lay","file",true,false); ?>