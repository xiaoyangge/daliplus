<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->output("head_lay","file",true,false); ?>
<form method="post" class="layui-form" id="ordersave" onsubmit="return $.admin_order.save()">
<?php if($id){ ?>
<input type="hidden" name="id" id="id" value="<?php echo $id;?>" />
<input type="hidden" name="sn" id="sn" value="<?php echo $rs['sn'];?>" />
<?php } ?>
<div class="layui-card">
	<div class="layui-card-header">
		<?php echo P_Lang("主要信息");?>
	</div>
	<div class="layui-card-body">
		<div class="layui-form-item">
			<label class="layui-form-label">
				<i class="layui-icon layui-tips" lay-tips="<?php echo P_Lang("这里创建的订单编号不受网站信息里规则限制，是随机的，请慎用");?>">&#xe702;</i>
				<?php echo P_Lang("订单编号");?>
			</label>
			<div class="layui-input-inline default-auto">
				<input type="text" name="sn" id="sn"<?php if($id){ ?> value="<?php echo $rs['sn'];?>" disabled<?php } ?> class="layui-input" />
			</div>
			<?php if(!$id){ ?>
			<div class="layui-input-inline auto"><input type="button" value="<?php echo P_Lang("随机创建");?>" onclick="$.admin_order.sn()" class="layui-btn" /></div>
			<?php } ?>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("查看密码");?>
			</label>
			<div class="layui-input-block">
				<ul class="layout">
					<li><input type="text" id="passwd" name="passwd" class="layui-input long" value="<?php echo $rs['passwd'];?>" /></li>
					<li><input type="button" value="<?php echo P_Lang("随机生成");?>" onclick="$.admin_order.pass()" class="layui-btn" /></li>
				</ul>
			</div>
			<div class="layui-input-block mtop"><?php echo P_Lang("该项用于游客查看订单的凭证，无此凭证只能查看订单的状态（是否审核，是否付款）");?></div>
		</div>
		<?php if($id && $statuslist){ ?>
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("订单状态");?>
			</label>
			<div class="layui-input-inline default-auto">
				<select name="status">
					<?php $tmpid["num"] = 0;$statuslist=is_array($statuslist) ? $statuslist : array();$tmpid = array();$tmpid["total"] = count($statuslist);$tmpid["index"] = -1;foreach($statuslist as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
					<option value="<?php echo $value['identifier'];?>"<?php if($value['identifier'] == $rs['status']){ ?> selected<?php } ?>><?php echo $value['title'];?></option>
					<?php } ?>
				</select>
			</div>
			<div class="layui-input-inline auto gray lh38"><?php echo P_Lang("请选择订单当前的状态，不清楚请留空");?></div>
		</div>
		<?php } ?>
		<div class="layui-form-item">
			<label class="layui-form-label"><?php echo P_Lang("会员");?></label>
			<div class="layui-input-inline auto"><?php echo form_edit('user_id',$rs['user_id'],'user');?></div>
			<div class="layui-input-inline auto gray lh38"><?php echo P_Lang("指定会员ID，为空表示游客下单");?></div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("邮箱Email");?>
			</label>
			<div class="layui-input-inline default-auto">
				<input type="text" name="email" id="email" value="<?php echo $rs['email'];?>" class="layui-input" />
			</div>
			<div class="layui-input-inline auto"><input type="button" value="<?php echo P_Lang("会员邮箱");?>" onclick="$.admin_order.user('email')" class="layui-btn" /></div>
			<div class="layui-input-inline auto gray lh38"><?php echo P_Lang("用于接收邮件通知，为空不发送通知");?></div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("手机号");?>
			</label>
			<div class="layui-input-inline default-auto">
				<input type="text" name="mobile" value="<?php echo $rs['mobile'];?>" id="mobile" class="layui-input" />
			</div>
			<div class="layui-input-inline auto"><input type="button" value="<?php echo P_Lang("会员手机号");?>" onclick="$.admin_order.user('mobile')" class="layui-btn" /></div>
			<div class="layui-input-inline auto gray lh38"><?php echo P_Lang("用于接收短信通知，为空不发送通知");?></div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("货币");?>
			</label>
			<div class="layui-input-inline default-auto">
				<select name="currency_id" id="currency_id">
				<?php $currency_list_id["num"] = 0;$currency_list=is_array($currency_list) ? $currency_list : array();$currency_list_id = array();$currency_list_id["total"] = count($currency_list);$currency_list_id["index"] = -1;foreach($currency_list as $key=>$value){ $currency_list_id["num"]++;$currency_list_id["index"]++; ?>
				<option value="<?php echo $value['id'];?>"<?php if($rs['currency_id'] == $value['id']){ ?> selected<?php } ?>><?php echo $value['title'];?>_<?php echo P_Lang("汇率");?> <?php echo $value['val'];?>_<?php echo P_Lang("标识");?> <?php echo $value['code'];?></option>
				<?php } ?>
				</select>
			</div>
			<div class="layui-input-inline auto gray lh38"><?php echo P_Lang("设置该订单使用哪种货币汇率计算价格，推荐使用人民币");?></div>
		</div>
		
		<div class="layui-form-item">
			<label class="layui-form-label">
				<i class="layui-icon layui-tips" lay-tips="<?php echo P_Lang("请根据实际情况增加扩展字段，字段数据存储在主表中");?>">&#xe702;</i>
				<?php echo P_Lang("字段扩展");?>
			</label>
			<div class="layui-input-block" id="ext_html">
				<?php if(!$rs['ext']){ ?>
				<div style="margin:2px 0">
					<ul class="layout">
						<li><input type="text" name="extkey[]" class="layui-input" /></li>
						<li class="layui-form-mid">：</li>
						<li><input type="text" name="extval[]" class="layui-input default" /></li>
						<li><input type="button" value=" + " onclick="$.admin_order.ext_create()" class="layui-btn" /></li>
					</ul>
				</div>
				<?php } ?>
				<?php $tmpid["num"] = 0;$rs['ext']=is_array($rs['ext']) ? $rs['ext'] : array();$tmpid = array();$tmpid["total"] = count($rs['ext']);$tmpid["index"] = -1;foreach($rs['ext'] as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
				<div style="margin:2px 0">
					<ul class="layout">
						<li><input type="text" name="extkey[]" value="<?php echo $key;?>" class="layui-input" /></li>
						<li class="layui-form-mid">：</li>
						<li><input type="text" name="extval[]" value="<?php echo $value;?>" class="layui-input default" /></li>
						<?php if(!$tmpid['index']){ ?>
						<li><input type="button" value=" + " onclick="$.admin_order.ext_create()" class="layui-btn" /></li>
						<?php } else { ?>
						<li><input type="button" value=" - " onclick="$.admin_order.ext_delete(this)" class="layui-btn layui-btn-danger" /></li>
						<?php } ?>
					</ul>
				</div>
				<?php } ?>
			</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("订单备注");?>
			</label>
			<div class="layui-input-block">
				<textarea name="note" id="note" class="layui-textarea"><?php echo $rs['note'];?></textarea>
			</div>
			<div class="layui-input-block mtop"><?php echo P_Lang("填写一些客户的特殊要求说明，不支持HTML");?></div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("产品");?>
			</label>
			<div class="layui-input-block" id="product_info"></div>
		</div>
		<?php $tmpid["num"] = 0;$pricelist=is_array($pricelist) ? $pricelist : array();$tmpid = array();$tmpid["total"] = count($pricelist);$tmpid["index"] = -1;foreach($pricelist as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
		<?php if($value['status']){ ?>
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo $value['title'];?>
			</label>
			<div class="layui-input-block<?php if($tmpid['index']){ ?> mtop<?php } ?>">
				<ul class="layout">
					<li class="layui-tips center" style="width:50px" lay-tips="<?php echo P_Lang("仅限数字及点符号，用于数据计算，左侧的符号表示这个价格用于增加或减少");?>"><input type="button" value="<?php if($value['action'] == 'add'){ ?>+<?php } else { ?>-<?php } ?>" class="layui-btn layui-disabled" disabled /></li>
					<li><input type="text" ext="price" action="<?php echo $value['action'];?>" id="ext_price_<?php echo $value['identifier'];?>" name="ext_price[<?php echo $value['identifier'];?>]" class="layui-input" sign="ext_price" value="<?php echo $value['price'];?>" onchange="$.admin_order_set.total_price()" /></li>
					<?php if($value['identifier'] == 'product'){ ?>
					<li><input type="button" value="<?php echo P_Lang("获取产品价格");?>" onclick="$.admin_order_set.get_price()" class="layui-btn" /></li>
					<?php } ?>
				</ul>
			</div>
		</div>
		<?php } ?>
		<?php } ?>
		
		<div class="layui-form-item">
			<label class="layui-form-label">
				<?php echo P_Lang("订单价格");?>
			</label>
			<div class="layui-input-inline default-auto">
				<input type="text" class="layui-input" id="price" name="price" value="<?php echo $rs['price'];?>" />
			</div>
			
			<div class="layui-input-inline auto">
				<input type="button" value="<?php echo P_Lang("计算总价格");?>" onclick="$.admin_order_set.total_price()" class="layui-btn" />
			</div>
			<div class="clear"></div>
			<div class="layui-input-block gray mtop"><?php echo P_Lang("计算该订单涉及到的总金额费用，请一定要手动点击计算");?></div>
		</div>
	</div>
</div>


<div class="layui-row"<?php if($address){ ?> style="margin-bottom:15px"<?php } ?>>
	<?php $tmpid["num"] = 0;$address=is_array($address) ? $address : array();$tmpid = array();$tmpid["total"] = count($address);$tmpid["index"] = -1;foreach($address as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
	<div class="layui-col-md<?php echo 12/count($address);?>">
		<div class="layui-card">
			<div class="layui-card-header">
				<?php if($key == 'shipping'){ ?>
				<?php echo P_Lang("收货信息");?>
				<div class="fr">
					<div class="layui-btn-group">
						<?php if(count($address) > 1){ ?>
						<input type="button" value="<?php echo P_Lang("复制到账单地址");?>" onclick="$.admin_order_set.copy('shipping','billing')" class="layui-btn layui-btn-sm layui-btn-normal" />
						<?php } ?>
						<input type="button" value="<?php echo P_Lang("选择地址");?>" onclick="$.admin_order.address('<?php echo $key;?>')" class="layui-btn layui-btn-sm" />
					</div>
				</div>
				<?php } ?>
				<?php if($key == 'billing'){ ?>
				<?php echo P_Lang("账单地址");?>
				<div class="fr">
					<div class="layui-btn-group">
						<?php if(count($address) > 1){ ?>
						<input type="button" value="<?php echo P_Lang("复制到收货信息");?>" onclick="$.admin_order_set.copy('billing','shipping')" class="layui-btn layui-btn-sm layui-btn-normal" />
						<?php } ?>
						<input type="button" value="<?php echo P_Lang("选择地址");?>" onclick="$.admin_order.address('<?php echo $key;?>')" class="layui-btn layui-btn-sm" />
					</div>
				</div>
				<?php } ?>
				
			</div>
			<div class="layui-card-body">
				<input type="hidden" name="<?php echo $key;?>-id" value="<?php echo $value['id'];?>" />
				
				<div class="layui-form-item">
					<label class="layui-form-label">
						<?php echo P_Lang("姓名全称");?>
					</label>
					<div class="layui-input-block">
						<input type="text" name="<?php echo $key;?>-fullname" id="<?php echo $key;?>-fullname" class="layui-input" placeholder="<?php echo P_Lang("全名");?>" value="<?php echo $value['fullname'];?>" />
					</div>
					<div class="layui-input-inline auto"></div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">
						<i class="layui-icon layui-tips" lay-tips="<?php echo P_Lang("部分网站可能更喜欢姓与名分开写");?>">&#xe702;</i>
						<?php echo P_Lang("名/姓");?>
					</label>
					<div class="layui-input-inline">
						<input type="text" name="<?php echo $key;?>-firstname" id="<?php echo $key;?>-firstname" class="layui-input" placeholder="<?php echo P_Lang("名字");?>" value="<?php echo $value['firstname'];?>" />
					</div>
					<div class="layui-input-inline">
						<input type="text" name="<?php echo $key;?>-lastname" id="<?php echo $key;?>-lastname" class="layui-input" placeholder="<?php echo P_Lang("姓氏");?>" value="<?php echo $value['lastname'];?>" />
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">
						<?php echo P_Lang("国家");?>
					</label>
					<div class="layui-input-inline default-auto">
						<input type="text" id="<?php echo $key;?>-country" class="layui-input" name="<?php echo $key;?>-country" value="<?php echo $value['country'];?>" />
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">
						<?php echo P_Lang("省、州");?>
					</label>
					<div class="layui-input-inline default-auto">
						<input type="text" id="<?php echo $key;?>-province" class="layui-input" name="<?php echo $key;?>-province" value="<?php echo $value['province'];?>" />
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">
						<?php echo P_Lang("城市");?>
					</label>
					<div class="layui-input-inline default-auto">
						<input type="text" id="<?php echo $key;?>-city" class="layui-input" name="<?php echo $key;?>-city" value="<?php echo $value['city'];?>" />
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">
						<?php echo P_Lang("县、镇、区");?>
					</label>
					<div class="layui-input-inline default-auto">
						<input type="text" id="<?php echo $key;?>-county" class="layui-input" name="<?php echo $key;?>-county" value="<?php echo $value['county'];?>" />
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">
						<?php echo P_Lang("地址1");?>
					</label>
					<div class="layui-input-block">
						<input type="text" id="<?php echo $key;?>-address" class="layui-input" name="<?php echo $key;?>-address" value="<?php echo $value['address'];?>" />
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">
						<?php echo P_Lang("地址2");?>
					</label>
					<div class="layui-input-block">
						<input type="text" id="<?php echo $key;?>-address2" class="layui-input" name="<?php echo $key;?>-address2" value="<?php echo $value['address2'];?>" />
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">
						<i class="layui-icon layui-tips" lay-tips="<?php echo P_Lang("请填写有效的邮编号码，不清楚请留空");?>">&#xe702;</i>
						<?php echo P_Lang("邮编");?>
					</label>
					<div class="layui-input-inline default-auto">
						<input type="text" id="<?php echo $key;?>-zipcode" name="<?php echo $key;?>-zipcode" value="<?php echo $value['zipcode'];?>" class="layui-input" />
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">
						<i class="layui-icon layui-tips" lay-tips="<?php echo P_Lang("此处请填写固定电话号码，格式：0755-12345678");?>">&#xe702;</i>
						<?php echo P_Lang("联系电话");?>
					</label>
					<div class="layui-input-inline default-auto">
						<input type="text" name="<?php echo $key;?>-tel" id="<?php echo $key;?>-tel" value="<?php echo $value['tel'];?>" class="layui-input" />
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">
						<i class="layui-icon layui-tips" lay-tips="<?php echo P_Lang("此处请手机号，格式：13xxxxxxxxx，长度是11位");?>">&#xe702;</i>
						<?php echo P_Lang("手机号");?>
					</label>
					<div class="layui-input-inline default-auto">
						<input type="text" id="<?php echo $key;?>-mobile" name="<?php echo $key;?>-mobile" value="<?php echo $value['mobile'];?>" class="layui-input" />
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">
						<i class="layui-icon layui-tips" lay-tips="<?php echo P_Lang("此处填写的邮箱用于接收收货提醒，格式为：admin@admin.com");?>">&#xe702;</i>
						<?php echo P_Lang("邮箱");?>
					</label>
					<div class="layui-input-inline default-auto">
						<input type="text" id="<?php echo $key;?>-email" name="<?php echo $key;?>-email" value="<?php echo $value['email'];?>" class="layui-input" />
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php } ?>
</div>

<?php if($loglist){ ?>
<div class="layui-card">
	<div class="layui-card-header">
		<?php echo P_Lang("操作日志");?>
	</div>
	<div class="layui-card-body">
		<table class="layui-table">
			<thead>
			<tr>
				<th><?php echo P_Lang("时间");?></th>
				<th><?php echo P_Lang("内容");?></th>
				<th><?php echo P_Lang("操作人");?></th>
			</tr>
			</thead>
			<?php $tmpid["num"] = 0;$loglist=is_array($loglist) ? $loglist : array();$tmpid = array();$tmpid["total"] = count($loglist);$tmpid["index"] = -1;foreach($loglist as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
			<tr>
				<td><?php echo date('Y-m-d H:i:s',$value['addtime']);?></td>
				<td><?php echo $value['note'];?></td>
				<td><?php echo $value['who'];?></td>
			</tr>
			<?php } ?>
		</table>
	</div>
</div>
<?php } ?>
<div class="submit-info-clear"></div>
<div class="submit-info">
	<div class="layui-container center">
		<input type="submit" value="<?php echo P_Lang("提交保存");?>" class="layui-btn layui-btn-danger" id="save_button" />
		<input type="button" value="<?php echo P_Lang("关闭");?>" class="layui-btn layui-btn-primary" onclick="$.admin.close()" />
		<span style="padding-left:2em;color:#ccc;">保存不会关闭页面，请手动关闭</span>
	</div>
</div>

</form>
<?php $this->output("foot_lay","file",true,false); ?>