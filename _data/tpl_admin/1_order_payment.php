<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->output("head_lay","file",true,false); ?>
<div class="layui-card">
	<div class="layui-card-header" style="padding:5px 5px 0 5px;">
		<form method="post" id="postsave" class="layui-form" onsubmit="return $.admin_order_payment.add()">
		<ul class="layout">
			<li>
				<div class="layui-form-item">
					<div class="layui-input-inline auto gray lh38">&nbsp; <?php echo P_Lang("添加支付记录");?></div>
				</div>
			</li>
			<li>
				<select name="payment_id" lay-filter="payment">
				<option value=""><?php echo P_Lang("支付方式…");?></option>
				<option value="other"><?php echo P_Lang("自定义支付名称");?></option>
				<?php $tmpid["num"] = 0;$paylist=is_array($paylist) ? $paylist : array();$tmpid = array();$tmpid["total"] = count($paylist);$tmpid["index"] = -1;foreach($paylist as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
				<optgroup label="<?php echo $value['title'];?><?php if($value['wap']){ ?>_<?php echo P_Lang("手机端");?><?php } ?>">
					<?php $idxx["num"] = 0;$value['rslist']=is_array($value['rslist']) ? $value['rslist'] : array();$idxx = array();$idxx["total"] = count($value['rslist']);$idxx["index"] = -1;foreach($value['rslist'] as $k=>$v){ $idxx["num"]++;$idxx["index"]++; ?>
					<option value="<?php echo $v['id'];?>"<?php if($paytype == $v['id']){ ?> selected<?php } ?>><?php echo $v['title'];?><?php if($v['wap']){ ?>_<?php echo P_Lang("手机端");?><?php } ?></option>
					<?php } ?>
				</optgroup>
				<?php } ?>
				</select>
			</li>
			<li class="hide"><input type="text" name="title" value="" placeholder='<?php echo P_Lang("支付名称");?>' class="layui-input" /></li>
			<li>
				<div class="layui-form-item">
					<label class="layui-form-label">
						<?php echo $currency['title'];?> <?php echo $currency['symbol_left'];?>
					</label>
					<div class="layui-input-inline">
						<input type="text" name="price" id="price" value="<?php echo $unpaid_price;?>" placeholder='<?php echo P_Lang("支付金额");?>' class="layui-input" />
					</div>
					<div class="layui-input-inline auto gray lh38"><?php echo $currency['symbol_right'];?></div>
				</div>
				
			</li>
			<li><input type="text" name="dateline" id="dateline" placeholder='<?php echo P_Lang("支付时间");?>' class="layui-input" readonly /></li>
			<li><input type="text" name="note" placeholder="<?php echo P_Lang("备注");?>" class="layui-input" /></li>
			<li>
				<div class="layui-form-item">
					<input type="submit" value="<?php echo P_Lang("添加");?>" class="layui-btn layui-btn-sm" />
				</div>
			</li>
		</ul>
		</form>
	</div>
	<div class="layui-card-body">
		<table class="layui-table">
			<thead>
			<tr>
				<th>ID</th>
				<th><?php echo P_Lang("支付方式");?></th>
				<th><?php echo P_Lang("支付金额");?></th>
				<th><?php echo P_Lang("支付时间");?></th>
				<th><?php echo P_Lang("其他");?></th>
				<th>&nbsp;</th>
			</tr>
			</thead>
			<?php $tmpid["num"] = 0;$loglist=is_array($loglist) ? $loglist : array();$tmpid = array();$tmpid["total"] = count($loglist);$tmpid["index"] = -1;foreach($loglist as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
			<tr>
				<td><?php echo $value['id'];?></td>
				<td><?php echo $value['title'];?></td>
				<td><?php echo price_format($value['price'],$rs['currency_id'],$rs['currency_id']);?></td>
				<td><?php if($value['dateline']){ ?><?php echo time_format($value['dateline']);?><?php } else { ?><?php echo time_format($value['startdate']);?><?php } ?></td>
				<td>
					<?php if($value['ext'] && is_array($value['ext'])){ ?>
					<?php $tmpid2["num"] = 0;$value['ext']=is_array($value['ext']) ? $value['ext'] : array();$tmpid2 = array();$tmpid2["total"] = count($value['ext']);$tmpid2["index"] = -1;foreach($value['ext'] as $k=>$v){ $tmpid2["num"]++;$tmpid2["index"]++; ?>
					<div><?php echo $k;?>：<?php echo $v;?></div>
					<?php } ?>
					<?php } else { ?>
					<?php echo $value['ext'];?>
					<?php } ?>
				</td>
				<td><input type="button" value="<?php echo P_Lang("删除");?>" class="layui-btn layui-btn-danger" onclick="$.admin_order_payment.del('<?php echo $value['id'];?>','<?php echo $rs['id'];?>')" /></td>
			</tr>
			<?php } ?>
		</table>	
	</div>
</div>

<?php $this->output("foot_lay","file",true,false); ?>