<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->output("head_open","file",true,false); ?>
<form method="post" id="post_save" onsubmit="return false">
<input type="hidden" name="id" id="id" value="<?php echo $id;?>" />
<div class="table">
	<div class="title">
		<?php echo P_Lang("会员");?> <span class="note"><?php echo P_Lang("请选择会员信息");?></span>
	</div>
	<div class="content"><?php echo form_edit('user_id',$rs['user_id'],'user');?></div>
</div>
<div class="table">
	<div class="title">
		<?php echo P_Lang("收件人姓名");?> <span class="note"><?php echo P_Lang("请填写收件人的真实姓名");?></span>
	</div>
	<div class="content">
		<input type="text" name="fullname" id="fullname" value="<?php echo $rs['fullname'];?>" class="w99" />
	</div>
</div>

<div class="table">
	<div class="title">
		<?php echo P_Lang("省市县");?> <span class="note"><?php echo P_Lang("请填写收件人地址");?></span>
	</div>
	<div class="content">
		<ul class="layout">
			<li><input type="text" name="country" id="country" value="<?php echo $rs['country'] ? $rs['country'] : '中国';?>" placeholder="<?php echo P_Lang("国家");?>" /></li>
			<li><input type="text" name="province" id="province" value="<?php echo $rs['province'];?>" placeholder="<?php echo P_Lang("省份");?>" /> <?php echo P_Lang("省");?></li>
		</ul>
		<ul class="layout" style="margin-top:10px;">
			<li><input type="text" name="city" id="city" value="<?php echo $rs['city'];?>" placeholder="<?php echo P_Lang("城市");?>" /> <?php echo P_Lang("市");?></li>
			<li><input type="text" name="county" id="county" value="<?php echo $rs['county'];?>" placeholder="<?php echo P_Lang("县区");?>" /> <?php echo P_Lang("县（区）");?></li>
		</ul>
	</div>
</div>
<div class="table">
	<div class="title">
		<?php echo P_Lang("地址");?> <span class="note"></span>
	</div>
	<div class="content">
		<input type="text" name="address" id="address" value="<?php echo $rs['address'];?>" class="w99" />
	</div>
</div>
<div class="table">
	<div class="title">
		<?php echo P_Lang("邮编");?> <span class="note"></span>
	</div>
	<div class="content">
		<input type="text" name="zipcode" id="zipcode" value="<?php echo $rs['zipcode'];?>" class="w99" />
	</div>
</div>
<div class="table">
	<div class="title">
		<?php echo P_Lang("邮箱Email");?> <span class="note"></span>
	</div>
	<div class="content">
		<input type="text" name="email" id="email" value="<?php echo $rs['email'];?>" class="w99" />
	</div>
</div>
<div class="table">
	<div class="title">
		<?php echo P_Lang("手机");?> <span class="note"></span>
	</div>
	<div class="content">
		<input type="text" name="mobile" id="mobile" value="<?php echo $rs['mobile'];?>" class="w99" />
	</div>
</div>
<div class="table">
	<div class="title">
		<?php echo P_Lang("固定电话");?> <span class="note"></span>
	</div>
	<div class="content">
		<input type="text" name="tel" id="tel" value="<?php echo $rs['tel'];?>" class="w99" />
	</div>
</div>
</form>
<?php $this->output("foot_open","file",true,false); ?>