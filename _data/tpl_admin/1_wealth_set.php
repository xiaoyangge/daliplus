<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->output("head_lay","file",true,false); ?>
<script type="text/javascript">
$(document).ready(function(){
	$("#pay_submit").submit(function(){
		
	});
});
</script>
<form method="post" id="pay_submit" class="layui-form" onsubmit="return $.admin_wealth.save()">
<?php if($id){ ?><input type="hidden" name="id" id="id" value="<?php echo $id;?>" /><?php } ?>
<div class="layui-card">
	<div class="layui-card-body">
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("名称");?>
			</label>
			<div class="layui-input-inline default-auto">
				<input type="text" name="title" id="title" value="<?php echo $rs['title'];?>" class="layui-input" />
			</div>
			<div class="layui-form-mid">
				<?php echo P_Lang("给会员的财富取一个名称，如积分，收益，威望等");?>
			</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("标识");?>
			</label>
			<div class="layui-input-inline">
				<input type="text" name="identifier" class="layui-input" id="identifier" value="<?php echo $rs['identifier'];?>" />
			</div>
			<div class="layui-input-inline auto gray lh38" id="HTML-POINT-PHPOK-IDENTIFIER">
				<div class="layui-btn-group">
					<input type="button" value="随机" onclick="$.admin.rand()" class="layui-btn layui-btn-sm" />
					<input type="button" value="清空" onclick="$('#identifier').val('')" class="layui-btn layui-btn-sm layui-btn-danger" />
				</div>
			</div>
			<div class="layui-form-mid">
				<?php echo P_Lang("仅限字母、数字及下划线，且必须是字母开头");?>
			</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("计量单位");?>
			</label>
			<div class="layui-input-inline">
				<input type="text" name="unit" id="unit" value="<?php echo $rs['unit'];?>" class="layui-input" />
			</div>
			<div class="layui-form-mid">
				<?php echo P_Lang("如元，分，个等");?>
			</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("最低值");?>
			</label>
			<div class="layui-input-inline">
				<input type="text" class="layui-input" name="min_val" id="min_val" value="<?php echo floatval($rs['min_val']);?>">
			</div>
			<div class="layui-form-mid">
				<?php echo P_Lang("设置最低使用的值，低于此值的财富不可用，只能填写大于0的数值");?>
			</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("保留位数");?>
			</label>
			<div class="layui-input-inline auto">
				<input type="radio" name="dnum" value="0"<?php if(!$rs['dnum']){ ?> checked<?php } ?> title="<?php echo P_Lang("整数");?>" />
				<input type="radio" name="dnum" value="1"<?php if($rs['dnum'] == 1){ ?> checked<?php } ?> title="<?php echo P_Lang("一位小数");?>" />
				<input type="radio" name="dnum" value="2"<?php if($rs['dnum'] == 2){ ?> checked<?php } ?> title="<?php echo P_Lang("两位小数");?>" />
			</div>
			<div class="layui-form-mid">
				<?php echo P_Lang("定义财富的计量长度，整数还是浮点，保留几位数");?>
			</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("充值");?>
			</label>
			<div class="layui-input-inline auto">
				<input type="radio" name="ifpay" lay-filter="ifpay" value="0"<?php if(!$rs['ifpay']){ ?> checked<?php } ?> title="<?php echo P_Lang("禁用");?>" />
				<input type="radio" name="ifpay" lay-filter="ifpay" value="1"<?php if($rs['ifpay']){ ?> checked<?php } ?> title="<?php echo P_Lang("启用");?>" />
			</div>
			<div class="layui-form-mid">
				<?php echo P_Lang("请注意设置好兑换比例");?>
			</div>
		</div>
		<div class="layui-form-item" id="ratio_li" style="display:<?php echo $rs['ifpay'] ? 'block' : 'none';?>">
			<label class="layui-form-label">
				<?php echo P_Lang("充值比例");?>
			</label>
			<div class="layui-input-inline">
				<input type="text" name="pay_ratio" id="pay_ratio" value="<?php echo $rs['pay_ratio'];?>" class="layui-input" />
			</div>
			<div class="layui-form-mid">
				<?php echo P_Lang("即1元可兑换多少财富");?>
			</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("抵现");?>
			</label>
			<div class="layui-input-inline auto">
				<input type="radio" name="ifcash" lay-filter="ifcash" value="0"<?php if(!$rs['ifcash']){ ?> checked<?php } ?> title="<?php echo P_Lang("禁用");?>" />
				<input type="radio" name="ifcash" lay-filter="ifcash" value="1"<?php if($rs['ifcash']){ ?> checked<?php } ?> title="<?php echo P_Lang("启用");?>" />
			</div>
			<div class="layui-form-mid">
				<?php echo P_Lang("请注意设置好比例，启用后可直接当现金用");?>
			</div>
		</div>
		<div class="layui-form-item" id="ratio2_li" style="display:<?php echo $rs['ifcash'] ? 'block' : 'none';?>">
			<label class="layui-form-label">
				<?php echo P_Lang("抵现比例");?>
			</label>
			<div class="layui-input-inline">
				<input type="text" name="cash_ratio" id="cash_ratio" value="<?php echo $rs['cash_ratio'];?>" class="layui-input" />
			</div>
			<div class="layui-form-mid">
				<?php echo P_Lang("即100财富可抵用多少货币，货币直接使用当前站点的货币计算");?>
			</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("审核");?>
			</label>
			<div class="layui-input-inline auto">
				<input type="radio" name="ifcheck" lay-filter="ifcheck" value="0"<?php if(!$rs['ifcheck']){ ?> checked<?php } ?> title="<?php echo P_Lang("否");?>" />
				<input type="radio" name="ifcheck" lay-filter="ifcheck" value="1"<?php if($rs['ifcheck']){ ?> checked<?php } ?> title="<?php echo P_Lang("是");?>" />
			</div>
			<div class="layui-form-mid">
				<?php echo P_Lang("设置为是否，当前财富的行业都不需要审核直接通过，设为是则必须管理员审核");?>
			</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("排序");?>
			</label>
			<div class="layui-input-inline">
				<input type="text" name="taxis" id="taxis" value="<?php echo $rs['taxis'] ? $rs['taxis'] : 255;?>" class="layui-input" />
			</div>
			<div class="layui-form-mid">
				<?php echo P_Lang("定义排序，范围在1-255，值越小越往前靠");?>
			</div>
		</div>
	</div>
</div>
<div class="submit-info-clear"></div>
<div class="submit-info">
	<div class="layui-container center">
		<input type="submit" value="<?php echo P_Lang("提交");?>" class="layui-btn layui-btn-lg layui-btn-danger" />
		<input type="button" value="<?php echo P_Lang("取消关闭");?>" class="layui-btn layui-btn-lg layui-btn-primary" onclick="$.admin.close()" />
	</div>
</div>
</form>
<?php $this->output("foot_lay","file",true,false); ?>